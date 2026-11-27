<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\PusdaiAssistant;
use Illuminate\Support\Facades\Log;

class ChatAiController extends Controller
{
    /**
     * Konteks pengetahuan tentang PUSDAI Jawa Barat
     * yang akan diberikan ke AI sebagai system prompt.
     */
    private function getSystemPrompt(): string
    {
        return <<<'PROMPT'
Kamu adalah asisten virtual resmi Masjid Raya PUSDAI (Pusat Dakwah Islam) Jawa Barat. Namamu "Asisten PUSDAI".

## Peran
Bantu pengunjung situs dengan dua hal:
1. Informasi tentang PUSDAI Jawa Barat dan layanannya.
2. Pertanyaan umum seputar ibadah dan ajaran Islam dasar, dijawab dengan ringkas, sopan, dan sesuai Al-Qur'an serta Sunnah.

## Informasi Umum PUSDAI
- Nama lengkap: Masjid Raya Pusat Dakwah Islam (PUSDAI) Jawa Barat
- Alamat: Jl. Diponegoro No. 63, Cihaur Geulis, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40122
- Telepon: (022) 7217530/31
- Email: pusdaijabar@gmail.com
- Gagasan pendirian: 1982
- Media sosial: Instagram/YouTube/Facebook @pusdaijabar (YouTube: https://www.youtube.com/@PusdaiJabar)
- Hotline layanan jenazah/ambulans 24 jam: 0812-3456-7890

## Layanan
1. Layanan Akad Nikah
2. Pembinaan Mualaf
3. Perpustakaan PUSDAI
4. KBIHU Haji & Umrah
5. Seminar & Kajian Islam
6. Layanan Jenazah (ambulans siaga 24 jam, bebas biaya untuk dhuafa)
7. Konsultasi Syariah
8. Kalkulator Faraid
9. Donasi Pusdai Care (ZIS, zakat maal 2,5%, wakaf jariyah)

## Fasilitas yang dapat digunakan
Masjid/ruang utama (4.000 orang, infaq sukarela untuk ibadah), Ruang Multimedia (60 orang, Rp 2.500.000/hari), Ruang Seminar Besar (100 orang, Rp 2.000.000/hari), Ruang Seminar Kecil A/B (40 orang, Rp 1.000.000/hari), Plaza (1.000 orang, Rp 10.000.000/hari).

## Jadwal Shalat Bandung (perkiraan)
Imsak 04.30, Subuh 04.40, Dzuhur 11.55, Ashar 15.17, Maghrib 17.48, Isya 19.02.

## Jadwal Kajian Rutin (gratis untuk umum)
- Senin 09.00-11.30: Qur'an Tahsin (Ust. Denoi Abdul Aziz)
- Selasa 10.00-11.30: Qur'an Essentia (Ust. Fajrin Nurul Haq)
- Selasa 13.00-14.30: Qur'an Pra Tahsin (Ust. Eko Safar Hardianto)
- Kamis 07.00-07.45: Talk Show Dhuha
- Kamis 07.30-10.00: Fiqih Ibadah (Ust. Ramdan Fauzi)
- Kamis pekan ke-3 09.00-11.00: Irsyad Tazkiyyah
- Jum'at 08.30-10.00: Bahasa Arab Al-Qur'an (Ust. Fathurrahman M. Basyari)
- Sabtu 09.00-11.00: Aqidah Akhlaq (Ust. Reza Noor Umboro)
Info: Sekretariat UPP. AQSA, Ruang Adum Lt. 2, 0851-4336-4323.

## Halaman situs
Beranda, Sejarah, Profil & Struktur DKM, Layanan, Penggunaan Fasilitas, Konsultasi Syariah, Pusdai TV, Perpustakaan Digital, Kalkulator Faraid, Layanan Jenazah, Galeri, Agenda, Pusdai Academy, Kontak, Donasi.

## Panduan Menjawab
- Bahasa Indonesia yang sopan, ramah, dan islami; sebutkan salam bila sesuai konteks.
- Untuk pertanyaan tentang PUSDAI, gunakan data di atas dan arahkan ke halaman yang relevan.
- Untuk pertanyaan agama umum (rukun islam/iman, shalat, wudhu, puasa, zakat, doa, akhlak, dll.), jawab ringkas dan berdasar Al-Qur'an dan Sunnah; sebutkan dalil secara singkat bila yakin.
- Jangan memberikan fatwa definitif untuk kasus hukum yang rumit (waris, talak, transaksi, kasus pribadi): arahkan ke Konsultasi Syariah PUSDAI.
- Jangan mengarang nomor rekening, jadwal, harga, atau nama pengurus yang tidak ada di data ini.
- Jika pertanyaan di luar topik, jawab sekadarnya lalu arahkan kembali ke layanan PUSDAI.
- Maksimal 2-4 paragraf pendek; gunakan emoji secukupnya. 🕌
PROMPT;
    }

    /**
     * Mengirim pesan ke AI dan mendapatkan balasan.
     */
    public function chat(Request $request, PusdaiAssistant $assistant)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'history' => 'nullable|array|max:20',
            'history.*.role' => 'required_with:history|string|in:user,model,assistant',
            'history.*.text' => 'required_with:history|string|max:2000',
        ]);

        $message = (string) $request->input('message');

        $history = collect($request->input('history', []))
            ->map(fn (array $item) => [
                'role' => $item['role'],
                'text' => (string) $item['text'],
            ])
            ->values()
            ->all();

        $provider = $this->resolveProvider();
        $reply = null;

        try {
            $reply = match ($provider) {
                'gemini' => $this->askGemini($message, $history),
                'openai' => $this->askOpenAiCompatible($message, $history),
                default => null,
            };
        } catch (\Throwable $e) {
            Log::warning('Chat AI provider gagal', [
                'provider' => $provider,
                'message' => preg_replace('/key=[^&\s]+/', 'key=***', $e->getMessage()),
            ]);
            $reply = null;
        }

        $usedFallback = $reply === null;

        if ($usedFallback) {
            $reply = $assistant->answer($message, $history);
        }

        return response()->json([
            'success' => true,
            'reply' => $reply,
            'source' => $usedFallback ? 'lokal' : $provider,
        ]);
    }

    /**
     * Provider aktif: AI_PROVIDER bila diisi, selain itu pilih otomatis
     * dari kunci API yang tersedia, dan "local" bila tidak ada kunci.
     */
    private function resolveProvider(): string
    {
        $explicit = strtolower((string) config('services.ai.provider'));

        if (in_array($explicit, ['gemini', 'openai', 'local'], true)) {
            if ($explicit === 'gemini' && empty(config('services.gemini.api_key'))) {
                return 'local';
            }

            if ($explicit === 'openai' && empty(config('services.ai.api_key'))) {
                return 'local';
            }

            return $explicit;
        }

        if (! empty(config('services.gemini.api_key'))) {
            return 'gemini';
        }

        if (! empty(config('services.ai.api_key'))) {
            return 'openai';
        }

        return 'local';
    }

    /**
     * @param  array<int, array{role: string, text: string}>  $history
     */
    private function askGemini(string $message, array $history): ?string
    {
        $apiKey = (string) config('services.gemini.api_key');

        if ($apiKey === '') {
            return null;
        }

        $contents = [];

        foreach ($history as $item) {
            $contents[] = [
                'role' => $item['role'] === 'user' ? 'user' : 'model',
                'parts' => [['text' => $item['text']]],
            ];
        }

        $contents[] = [
            'role' => 'user',
            'parts' => [['text' => $message]],
        ];

        $model = (string) config('services.gemini.model', 'gemini-2.0-flash');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->timeout(30)->post(
            "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}",
            [
                'system_instruction' => [
                    'parts' => [['text' => $this->getSystemPrompt()]],
                ],
                'contents' => $contents,
                'generationConfig' => [
                    'temperature' => 0.7,
                    'topP' => 0.95,
                    'topK' => 40,
                    'maxOutputTokens' => 800,
                ],
            ]
        );

        if (! $response->successful()) {
            Log::warning('Gemini API Error', [
                'status' => $response->status(),
                'body' => \Illuminate\Support\Str::limit($response->body(), 200),
            ]);

            return null;
        }

        return $response->json('candidates.0.content.parts.0.text');
    }

    /**
     * Provider apa pun yang kompatibel dengan endpoint /chat/completions
     * (Groq, OpenRouter, Together, DeepSeek, OpenAI, dan sejenisnya).
     *
     * @param  array<int, array{role: string, text: string}>  $history
     */
    private function askOpenAiCompatible(string $message, array $history): ?string
    {
        $apiKey = (string) config('services.ai.api_key');
        $baseUrl = rtrim((string) config('services.ai.base_url'), '/');

        if ($apiKey === '' || $baseUrl === '') {
            return null;
        }

        $messages = [
            ['role' => 'system', 'content' => $this->getSystemPrompt()],
        ];

        foreach ($history as $item) {
            $messages[] = [
                'role' => $item['role'] === 'model' ? 'assistant' : $item['role'],
                'content' => $item['text'],
            ];
        }

        $messages[] = ['role' => 'user', 'content' => $message];

        $response = Http::withToken($apiKey)
            ->acceptJson()
            ->timeout(30)
            ->post($baseUrl.'/chat/completions', [
                'model' => (string) config('services.ai.model'),
                'messages' => $messages,
                'temperature' => 0.7,
                'max_tokens' => 800,
            ]);

        if (! $response->successful()) {
            Log::warning('AI provider error', [
                'status' => $response->status(),
                'body' => \Illuminate\Support\Str::limit($response->body(), 200),
            ]);

            return null;
        }

        return $response->json('choices.0.message.content');
    }
}
