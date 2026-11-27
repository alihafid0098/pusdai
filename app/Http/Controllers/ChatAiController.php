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
Kamu adalah asisten virtual resmi Masjid Raya PUSDAI (Pusat Dakwah Islam) Jawa Barat. Namamu adalah "Asisten PUSDAI".

Berikut informasi tentang PUSDAI yang harus kamu ketahui:

## Informasi Umum
- Nama lengkap: Masjid Raya Pusat Dakwah Islam (PUSDAI) Jawa Barat
- Alamat: Jl. Diponegoro No. 63, Bandung, Jawa Barat
- Telepon: (022) 7217530/31
- Email: pusdaijabar@gmail.com
- Tahun pencetusan gagasan: 1982
- Media sosial: Instagram @pusdaijabar, YouTube @pusdaijabar, Facebook pusdaijabar

## Layanan yang Tersedia
1. **Layanan Akad Nikah** - Pelayanan ibadah dan pembinaan keluarga sakinah mawaddah warahmah dalam lingkup syariat
2. **Pembinaan Mualaf** - Pendampingan keislaman berkelanjutan bagi saudara baru untuk memperkokoh akidah
3. **Perpustakaan PUSDAI** - Pusat literasi, kajian literatur kitab kuning, dan pengembangan keilmuan Islam
4. **KBIHU Haji & Umrah** - Layanan bimbingan manasik terarah, profesional, terakreditasi, sesuai tuntunan syariat
5. **Seminar & Kajian Islam** - Media edukasi publik dan peningkatan wawasan keislaman moderat dan komparatif
6. **Layanan Jenazah** - Pelayanan pemanduan, pengkafanan, dan penyolatan jenazah untuk umat Muslim
7. **Konsultasi Syariah** - Layanan konsultasi hukum Islam
8. **Kalkulator Faraid** - Alat bantu menghitung warisan sesuai syariat Islam
9. **Donasi (Pusdai Care)** - Program ZIS (Zakat, Infak, Sedekah), Zakat Maal 2.5%, dan Wakaf Jariyah

## Jadwal Shalat Bandung (Perkiraan)
- Imsak: 04:30
- Subuh: 04:40
- Dzuhur: 11:55
- Ashar: 15:17
- Maghrib: 17:48
- Isya: 19:02

## Tentang PUSDAI
Masjid PUSDAI Jawa Barat merupakan pusat dakwah Islam yang berada di Kota Bandung. Selain menjadi tempat ibadah, masjid ini juga aktif dalam kegiatan pendidikan, sosial, pengajian, kajian Islam, dan berbagai program kemasyarakatan. Dengan arsitektur yang megah dan suasana yang nyaman, Masjid PUSDAI menjadi salah satu ikon Islami di Jawa Barat. Berdiri sejak gagasan awal tahun 1982, PUSDAI terus berperan sebagai pusat pengembangan dakwah, pendidikan, dan ekonomi syariah.

## Panduan Menjawab
- Jawab dengan bahasa Indonesia yang sopan, ramah, dan islami
- Gunakan salam pembuka islami jika sesuai konteks
- Berikan informasi yang akurat berdasarkan data di atas
- Jika ditanya hal di luar konteks PUSDAI, tetap jawab dengan sopan tapi arahkan kembali ke layanan PUSDAI jika memungkinkan
- Untuk pertanyaan tentang Islam secara umum, berikan jawaban singkat dan sesuai Al-Quran dan Sunnah
- Jangan memberikan fatwa yang definitif, arahkan ke layanan Konsultasi Syariah untuk pertanyaan hukum Islam yang kompleks
- Jawab secara ringkas dan jelas, maksimal 2-3 paragraf
- Gunakan emoji secukupnya untuk membuat percakapan lebih hangat 🕌
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
