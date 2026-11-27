<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'history' => 'nullable|array|max:20',
            'history.*.role' => 'required_with:history|string|in:user,model',
            'history.*.text' => 'required_with:history|string|max:2000',
        ]);

        $apiKey = config('services.gemini.api_key');

        if (empty($apiKey)) {
            return response()->json([
                'success' => false,
                'reply' => 'Maaf, layanan chat AI belum dikonfigurasi. Silakan hubungi administrator.',
            ], 503);
        }

        try {
            // Bangun array contents untuk Gemini API
            $contents = [];

            // Tambahkan riwayat percakapan jika ada
            if ($request->has('history') && is_array($request->history)) {
                foreach ($request->history as $msg) {
                    $contents[] = [
                        'role' => $msg['role'],
                        'parts' => [['text' => $msg['text']]],
                    ];
                }
            }

            // Tambahkan pesan pengguna saat ini
            $contents[] = [
                'role' => 'user',
                'parts' => [['text' => $request->message]],
            ];

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(30)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}",
                [
                    'system_instruction' => [
                        'parts' => [
                            ['text' => $this->getSystemPrompt()],
                        ],
                    ],
                    'contents' => $contents,
                    'generationConfig' => [
                        'temperature' => 0.7,
                        'topP' => 0.95,
                        'topK' => 40,
                        'maxOutputTokens' => 800,
                    ],
                    'safetySettings' => [
                        [
                            'category' => 'HARM_CATEGORY_HARASSMENT',
                            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE',
                        ],
                        [
                            'category' => 'HARM_CATEGORY_HATE_SPEECH',
                            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE',
                        ],
                        [
                            'category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT',
                            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE',
                        ],
                        [
                            'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT',
                            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE',
                        ],
                    ],
                ]
            );

            if ($response->successful()) {
                $data = $response->json();

                $reply = $data['candidates'][0]['content']['parts'][0]['text']
                    ?? 'Maaf, saya tidak dapat memproses permintaan Anda saat ini.';

                return response()->json([
                    'success' => true,
                    'reply' => $reply,
                ]);
            }

            Log::error('Gemini API Error', [
                'status' => $response->status(),
                'body' => \Illuminate\Support\Str::limit($response->body(), 300),
            ]);

            return response()->json([
                'success' => false,
                'reply' => 'Maaf, terjadi kendala dalam memproses permintaan Anda. Silakan coba lagi.',
            ], 500);

        } catch (\Exception $e) {
            Log::error('Chat AI Exception', [
                'message' => preg_replace('/key=[^&\s]+/', 'key=***', $e->getMessage()),
            ]);

            return response()->json([
                'success' => false,
                'reply' => 'Maaf, layanan sedang mengalami gangguan. Silakan coba beberapa saat lagi.',
            ], 500);
        }
    }
}
