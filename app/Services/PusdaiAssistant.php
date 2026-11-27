<?php

namespace App\Services;

/**
 * Jawaban cadangan "Asisten PUSDAI" saat tidak ada API AI yang dikonfigurasi.
 *
 * Jawaban disusun dari data resmi PUSDAI (alamat, layanan, jadwal kajian,
 * jadwal shalat, kontak). Tujuannya agar widget chat tetap berguna tanpa
 * kunci API apa pun.
 */
class PusdaiAssistant
{
    /**
     * @param  array<int, array{role: string, text: string}>  $history
     */
    public function answer(string $message, array $history = []): string
    {
        $text = mb_strtolower(trim($message));

        foreach ($this->intents() as $intent) {
            foreach ($intent['keywords'] as $keyword) {
                if ($this->matches($text, $keyword)) {
                    return $intent['answer'];
                }
            }
        }

        return $this->fallback();
    }

    /**
     * @return array<int, array{keywords: array<int, string>, answer: string}>
     */
    private function intents(): array
    {
        return [
            [
                'keywords' => ['assalam', 'salam', 'halo', 'hai', 'hello', 'pagi', 'siang', 'sore', 'malam'],
                'answer' => "Wa'alaikumussalam warahmatullahi wabarakatuh. 🕌\n\nSaya Asisten PUSDAI. Silakan tanya soal jadwal shalat, jadwal kajian, layanan (akad nikah, mualaf, perpustakaan, KBIHU, jenazah, konsultasi syariah, faraid), donasi, atau alamat PUSDAI Jawa Barat.",
            ],
            [
                'keywords' => ['alamat', 'lokasi', 'dimana', 'di mana', 'maps', 'peta', 'diponegoro'],
                'answer' => "Masjid Raya PUSDAI Jawa Barat berada di Jl. Diponegoro No. 63, Cihaur Geulis, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40122.\n\nLokasinya bisa dibuka di Google Maps: https://maps.google.com/?q=Pusdai+Jawa+Barat",
            ],
            [
                'keywords' => ['telepon', 'telpon', 'nomor', 'kontak', 'hubungi', 'email', 'whatsapp', 'wa'],
                'answer' => "Kontak Sekretariat PUSDAI Jawa Barat:\n- Telepon: (022) 7217530 / 31\n- Email: pusdaijabar@gmail.com\n\nUntuk layanan jenazah/ambulans siaga 24 jam: 0812-3456-7890.",
            ],
            [
                'keywords' => ['jenazah', 'ambulans', 'wafat', 'meninggal', 'kafan', 'pemakaman'],
                'answer' => "Layanan Amil & Pengurusan Jenazah PUSDAI siaga 24 jam untuk ambulans, pemandian, kain kafan, pensholatan, dan pendampingan pemakaman. Bebas biaya bagi dhuafa.\n\nHotline: 0812-3456-7890. Formulir pengajuan bisa diisi di halaman Layanan Jenazah.",
            ],
            [
                'keywords' => ['jadwal shalat', 'jadwal salat', 'sholat', 'subuh', 'dzuhur', 'ashar', 'maghrib', 'isya', 'imsak'],
                'answer' => "Jadwal shalat Bandung (perkiraan): Imsak 04.30, Subuh 04.40, Dzuhur 11.55, Ashar 15.17, Maghrib 17.48, Isya 19.02.\n\nJadwal ini perkiraan; untuk ketepatan harian silakan cek papan jadwal di masjid.",
            ],
            [
                'keywords' => ['kajian', 'jadwal kajian', 'tahsin', 'fiqih', 'aqidah', 'akhlak', 'bahasa arab', 'talk show', 'tazkiyyah', 'academy', 'kelas'],
                'answer' => "Jadwal kajian rutin PUSDAI (gratis untuk umum):\n- Senin 09.00-11.30: Qur'an Tahsin (Ust. Denoi Abdul Aziz)\n- Selasa 10.00-11.30: Qur'an Essentia (Ust. Fajrin Nurul Haq)\n- Selasa 13.00-14.30: Qur'an Pra Tahsin (Ust. Eko Safar Hardianto)\n- Kamis 07.00-07.45: Talk Show Dhuha\n- Kamis 07.30-10.00: Fiqih Ibadah (Ust. Ramdan Fauzi)\n- Kamis pekan ke-3 09.00-11.00: Irsyad Tazkiyyah\n- Jum'at 08.30-10.00: Bahasa Arab Al-Qur'an (Ust. Fathurrahman M. Basyari)\n- Sabtu 09.00-11.00: Aqidah Akhlaq (Ust. Reza Noor Umboro)\n\nInfo: Sekretariat UPP. AQSA, Ruang Adum Lt. 2, 0851-4336-4323.",
            ],
            [
                'keywords' => ['akad', 'nikah', 'pernikahan', 'walimah'],
                'answer' => "Layanan Akad Nikah PUSDAI membantu pelaksanaan akad secara syar'i di Masjid Raya PUSDAI, termasuk ruang utama untuk prosesi. Untuk jadwal dan persyaratan, hubungi Sekretariat di (022) 7217530/31 atau halaman Kontak.",
            ],
            [
                'keywords' => ['mualaf', 'saudara baru', 'masuk islam'],
                'answer' => "PUSDAI menyediakan pembinaan mualaf: pendampingan keislaman berkelanjutan untuk memperkokoh akidah, termasuk bimbingan ibadah dasar. Silakan hubungi Sekretariat (022) 7217530/31 untuk jadwal pendampingan.",
            ],
            [
                'keywords' => ['perpustakaan', 'buku', 'literasi', 'kitab'],
                'answer' => "Perpustakaan PUSDAI adalah pusat literasi Islam dengan koleksi kitab dan buku keislaman. Silakan datang langsung ke area perpustakaan PUSDAI, atau lihat halaman Perpustakaan Digital di situs ini.",
            ],
            [
                'keywords' => ['haji', 'umrah', 'kbihu', 'manasik'],
                'answer' => "KBIHU PUSDAI melayani bimbingan manasik haji dan umrah secara terarah dan terakreditasi. Informasi pendaftaran dan jadwal manasik bisa ditanyakan ke Sekretariat (022) 7217530/31.",
            ],
            [
                'keywords' => ['waris', 'faraid', 'warisan', 'harta'],
                'answer' => "PUSDAI menyediakan Kalkulator Faraid untuk membantu menghitung pembagian warisan sesuai syariat. Buka halaman Kalkulator Faraid di situs ini.\n\nUntuk kasus yang rumit, silakan konsultasi langsung ke layanan Konsultasi Syariah PUSDAI.",
            ],
            [
                'keywords' => ['konsultasi', 'syariah', 'hukum', 'fatwa', 'tanya hukum'],
                'answer' => "Layanan Konsultasi Syariah PUSDAI melayani pertanyaan hukum Islam. Silakan isi permintaan lewat halaman Konsultasi atau hubungi Sekretariat (022) 7217530/31.\n\nCatatan: untuk fatwa yang mengikat, tetap rujuk kepada lembaga fatwa yang berwenang.",
            ],
            [
                'keywords' => ['donasi', 'donas', 'infaq', 'infak', 'sedekah', 'wakaf', 'pusdai care'],
                'answer' => "Donasi bisa disalurkan lewat program Pusdai Care: ZIS (zakat, infak, sedekah), zakat maal 2,5%, dan wakaf jariyah. Rincian rekening dan alur donasi ada di halaman Donasi.\n\nUntuk konfirmasi donasi, hubungi Sekretariat (022) 7217530/31.",
            ],
            [
                'keywords' => ['sewa', 'fasilitas', 'ruang', 'aula', 'seminar', 'plaza', 'multimedia', 'gedung'],
                'answer' => "PUSDAI menyewakan fasilitas untuk kegiatan keumatan: Masjid/ruang utama (4.000 orang, infaq sukarela untuk ibadah), Ruang Multimedia (60 orang, Rp 2.500.000/hari), Seminar Besar (100 orang, Rp 2.000.000/hari), Seminar Kecil A/B (40 orang, Rp 1.000.000/hari), dan Plaza (1.000 orang, Rp 10.000.000/hari).\n\nPengajuan lewat Sekretariat (022) 7217530/31 atau halaman Penggunaan Fasilitas.",
            ],
            [
                'keywords' => ['streaming', 'pusdai tv', 'youtube', 'live', 'podcast', 'siaran'],
                'answer' => "Siaran kajian dan kegiatan bisa disimak di kanal YouTube resmi PUSDAI Jawa Barat: https://www.youtube.com/@PusdaiJabar. Halaman Pusdai TV di situs ini juga menyediakan tombol langsung ke kanal tersebut.",
            ],
            [
                'keywords' => ['agenda', 'kegiatan', 'acara', 'event', 'jadwal acara'],
                'answer' => "Agenda kegiatan PUSDAI (tablig akbar, kajian akbar, santunan, manasik, dan kegiatan keumatan lain) ada di halaman Agenda di situs ini.\n\nUntuk kegiatan mingguan, lihat bagian Jadwal Kajian Rutin di halaman Pusdai Academy — gratis untuk umum.",
            ],
            [
                'keywords' => ['galeri', 'foto', 'gambar masjid', 'arsitektur'],
                'answer' => "Foto-foto masjid, arsitektur, dan kegiatan PUSDAI ada di halaman Galeri Foto. Untuk video dan siaran kajian, buka kanal YouTube resmi: https://www.youtube.com/@PusdaiJabar",
            ],
            [
                'keywords' => ['sejarah', 'berdiri', 'didirikan', 'tahun berapa'],
                'answer' => "Gagasan pendirian PUSDAI muncul pada 1982, dan kini Masjid Raya PUSDAI menjadi pusat pengembangan dakwah, pendidikan, ekonomi syariah, dan kegiatan keumatan di Jawa Barat. Cerita lengkapnya ada di halaman Sejarah.",
            ],
            [
                'keywords' => ['zakat fitrah', 'fitrah'],
                'answer' => "Zakat fitrah wajib bagi setiap muslim yang mampu, dikeluarkan menjelang Idul Fitri sebesar 1 sha' makanan pokok (kurang lebih 2,5–3 kg beras) per jiwa.\n\nPUSDAI menerima penyaluran zakat fitrah melalui program Pusdai Care; informasi waktu penyaluran diumumkan menjelang Ramadhan.",
            ],
            [
                'keywords' => ['zakat profesi', 'zakat penghasilan', 'zakat gaji'],
                'answer' => "Zakat profesi dihitung 2,5% dari penghasilan bulanan yang sudah mencapai nisab (setara 85 gram emas per tahun, kisaran Rp 7.500.000 per bulan).\n\nHalaman Donasi menyediakan kalkulator zakat instan untuk menghitungnya.",
            ],
            [
                'keywords' => ['zakat maal', 'zakat harta', 'nisab', 'haul'],
                'answer' => "Zakat maal dikenakan 2,5% atas harta (tabungan, emas, investasi) yang mencapai nisab 85 gram emas dan telah dimiliki satu tahun (haul).\n\nCoba kalkulator zakat di halaman Donasi untuk perkiraan cepat.",
            ],
            [
                'keywords' => ['zakat'],
                'answer' => "Zakat terbagi dua: zakat fitrah (menjelang Idul Fitri) dan zakat harta/maal (2,5% dari harta yang mencapai nisab dan sudah dimiliki setahun). Untuk penghasilan, ada zakat profesi 2,5% dari penghasilan bulanan yang mencapai nisab.\n\nHalaman Donasi PUSDAI punya kalkulator zakat instan untuk menghitung keduanya, lalu konfirmasi penyaluran lewat petugas.",
            ],
            [
                'keywords' => ['doa', 'berdoa', 'dzikir', 'wirid'],
                'answer' => "Doa adalah inti ibadah. Untuk doa harian, PUSDAI membahasnya dalam kajian rutin (Aqidah Akhlaq, Fiqih Ibadah, dan Irsyad Tazkiyyah).\n\nKalau yang Anda maksud doa untuk hajat tertentu, sebutkan saja jenisnya, atau tanyakan ke asatidzah lewat Sekretariat (022) 7217530/31.",
            ],
            [
                'keywords' => ['puasa', 'ramadhan', 'ramadan', 'shaum'],
                'answer' => "Puasa Ramadhan wajib bagi muslim yang balig, sehat, dan mampu. Puasa sunnah yang dianjurkan antara lain Senin–Kamis, Ayyamul Bidh, dan puasa Daud.\n\nPUSDAI biasa menggelar kajian Ramadhan dan buka bersama; pantau halaman Agenda.",
            ],
            [
                'keywords' => ['sholat', 'salat', 'shalat lima waktu', 'wajib sholat'],
                'answer' => "Shalat lima waktu (Subuh, Dzuhur, Ashar, Maghrib, Isya) adalah kewajiban utama setiap muslim. Masjid PUSDAI membuka shalat berjamaah harian, dan jadwal shalat Bandung bisa dilihat di beranda situs ini.\n\nUntuk tata cara atau pertanyaan fiqih shalat, silakan ikut kajian Fiqih Ibadah atau Konsultasi Syariah.",
            ],
            [
                'keywords' => ['wudhu', 'wudu', 'bersuci', 'tayamum'],
                'answer' => "Wudhu dilakukan sebelum shalat: membasuh wajah, kedua tangan, mengusap kepala, dan membasuh kaki, dengan niat dan tertib. Jika tidak ada air atau sakit, bisa tayamum.\n\nPembahasan rinci ada di kajian Fiqih Ibadah PUSDAI (Kamis, 07.30 WIB).",
            ],
            [
                'keywords' => ['rukun islam', 'rukun iman', 'dasar agama', 'belajar islam', 'mualaf belajar'],
                'answer' => "Rukun Islam: syahadat, shalat, zakat, puasa Ramadhan, dan haji. Rukun iman: iman kepada Allah, malaikat, kitab-kitab, rasul, hari akhir, dan qadar.\n\nBagi saudara baru atau yang ingin belajar dasar-dasar Islam, PUSDAI punya program pembinaan mualaf dan kajian rutin gratis setiap pekan.",
            ],
            [
                'keywords' => ['sabar', 'syukur', 'akhlak', 'akhlaq', 'tazkiyah', 'hati'],
                'answer' => "Sabar dan syukur adalah kunci ketenangan hati; keduanya dibahas rutin dalam kajian Aqidah Akhlaq (Sabtu 09.00 WIB) dan Irsyad Tazkiyyah (Kamis pekan ke-3, 09.00 WIB) di PUSDAI.\n\nUntuk persoalan pribadi yang berat, silakan konsultasi langsung dengan asatidzah.",
            ],
            [
                'keywords' => ['tahajud', 'dhuha', 'sholat sunnah', 'qiyamul lail'],
                'answer' => "Shalat sunnah yang biasa diamalkan antara lain Tahajud (malam), Dhuha (pagi), dan rawatib pengiring shalat wajib.\n\nPUSDAI menggelar Talk Show Dhuha setiap Kamis 07.00 WIB — cocok untuk memulai pagi dengan ilmu.",
            ],
            [
                'keywords' => ['apa itu pusdai', 'pusdai itu', 'tentang pusdai', 'masjid pusdai'],
                'answer' => "PUSDAI (Pusat Dakwah Islam) Jawa Barat adalah masjid raya dan pusat pengembangan dakwah, pendidikan, ekonomi syariah, serta kegiatan keumatan di Bandung. Gagasan pendiriannya muncul pada 1982.\n\nLayanan: akad nikah, pembinaan mualaf, perpustakaan, KBIHU haji-umrah, seminar, layanan jenazah, konsultasi syariah, kalkulator faraid, dan donasi Pusdai Care.",
            ],
            [
                'keywords' => ['cara daftar', 'pendaftaran', 'ikut kajian', 'daftar kajian', 'gratis'],
                'answer' => "Kajian rutin PUSDAI gratis untuk umum — cukup datang ke Ruang Multimedia PUSDAI sesuai jadwal di halaman Pusdai Academy, tanpa pendaftaran.\n\nUntuk kelas Academy berbayar atau program khusus, informasi ada di Sekretariat UPP. AQSA: 0851-4336-4323.",
            ],
            [
                'keywords' => ['terima kasih', 'makasih', 'thanks', 'syukron'],
                'answer' => "Afwan, sama-sama. Semoga Allah memudahkan urusan Anda. Jika ada yang ingin ditanyakan lagi soal PUSDAI atau ibadah, silakan sampaikan. 🕌",
            ],
            [
                'keywords' => ['profil', 'dkm', 'pengurus', 'ketua', 'struktur', 'imam besar'],
                'answer' => "Struktur DKM PUSDAI: Imam Besar Prof. Dr. KH. Rahmat Syafei (wakil: Prof. Dr. H. Rosihon Anwar, M.Ag), Ketua DKM Dr. KH. Jujun Junaedi, M.A, Sekretaris Dr. H. Ijang Falsal, Bendahara H. Agus Salman, M.Ag, dengan tiga bidang kerja: Idarah, Imarah, dan Riayah.\n\nSusunan lengkap dan tupoksi ada di halaman Profil & Struktur DKM.",
            ],
        ];
    }

    /**
     * Cocokkan kata utuh (bukan potongan), supaya "wa" tidak ikut
     * menangkap kata seperti "jadwal".
     */
    private function matches(string $text, string $keyword): bool
    {
        $keyword = mb_strtolower($keyword);

        if (str_contains($keyword, ' ')) {
            return str_contains($text, $keyword);
        }

        return (bool) preg_match('/(?<![a-z0-9])'.preg_quote($keyword, '/').'(?![a-z0-9])/u', $text);
    }

    private function fallback(): string
    {
        return "Saya belum sepenuhnya paham maksud pertanyaannya. Coba tanya dengan kata kunci yang lebih spesifik, misalnya:\n- Jadwal shalat / jadwal kajian / agenda\n- Layanan: akad nikah, mualaf, perpustakaan, KBIHU, jenazah, konsultasi syariah, faraid\n- Zakat, infak, sedekah, atau donasi Pusdai Care\n- Alamat, kontak, atau fasilitas\n- Dasar ibadah: shalat, wudhu, puasa, doa, rukun islam\n\nKalau pertanyaannya soal hukum atau kasus pribadi, lebih tepat disampaikan ke Konsultasi Syariah PUSDAI; untuk hal lain, hubungi Sekretariat (022) 7217530/31 atau pusdaijabar@gmail.com.";
    }
}
