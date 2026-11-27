# Panduan Hosting Gratis — PUSDAI Jabar

Website ini Laravel 12 (PHP 8.3). Supaya bisa online, hosting-nya harus
mendukung PHP 8.2+ dan Composer. Berikut pilihan gratis dan langkahnya.

## Pilihan hosting gratis

| Layanan | Cocok untuk | Catatan |
| --- | --- | --- |
| **Railway** (trial gratis / kredit) | paling cepat, deploy dari GitHub | pakai Dockerfile yang sudah ada di repo; kredit awal terbatas |
| **Render** (free web service) | demo dan uji publik | deploy Docker, layanan tidur setelah tidak dipakai |
| **Koyeb** (free tier) | alternatif Docker | perlu kartu untuk verifikasi |
| **InfinityFree / Hostinger free** (shared hosting) | tanpa Docker | PHP 8.2+ tersedia, tapi tanpa SSH; upload manual lewat File Manager |

Rekomendasi: **Render atau Railway dengan Dockerfile** di repo ini, karena
paling sedikit pengaturan dan otomatis jalan.

## Langkah deploy dengan Docker (Render / Railway)

1. Repo GitHub `alihafid0098/pusdai` sudah berisi `Dockerfile` dan
   `docker/entrypoint.sh`.
2. Buat akun di Render/Railway → **New Web Service** → pilih repo GitHub
   tersebut → environment **Docker**.
3. Isi environment variable (menu *Environment*), minimal:

   ```
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:...        # generate: php artisan key:generate --show
   APP_URL=https://nama-app.onrender.com
   DB_CONNECTION=sqlite
   SESSION_SECURE_COOKIE=true
   GEMINI_API_KEY=...        # kunci khusus produksi, jangan pakai kunci dev
   ```

4. Deploy. Entrypoint otomatis menjalankan `migrate` saat container start.
5. Isi data awal (admin + jadwal kajian) satu kali lewat terminal layanan:
   `php artisan db:seed --force`. Login panel di `/admin` dengan
   `ADMIN_EMAIL` / `ADMIN_PASSWORD` dari environment
   (default proyek: admin@pusdai.com / password1234 — ganti saat produksi).
5. Buka domain yang diberikan. Untuk domain sendiri, tambahkan custom domain
   di panel lalu arahkan DNS.

## Setelah online — daftar periksa

- `APP_DEBUG=false` (jangan sampai halaman error menampilkan isi kode).
- `APP_KEY` unik untuk produksi (`php artisan key:generate --show`).
- Kunci `GEMINI_API_KEY` produksi baru; kunci lama yang pernah dibagikan
  sebaiknya dihapus di Google AI Studio.
- HTTPS aktif (Render/Railway otomatis). Cookie sesi sudah `secure`.
- Jalankan `php artisan config:cache` dan `route:cache` (sudah dilakukan
  entrypoint Docker).
- Aktifkan backup database SQLite (file `database/database.sqlite`) atau
  pindah ke MySQL bila trafik sudah ramai.
- Ganti nomor hotline/formulir jenazah dan nomor WhatsApp di halaman
  Layanan Jenazah dengan nomor petugas yang benar.
- Chat AI: tanpa kunci API, widget tetap menjawab dari data PUSDAI
  (mode lokak). Untuk jawaban AI penuh, isi salah satu:
  `AI_PROVIDER=openai` + `AI_API_KEY` (Groq/OpenRouter, ada paket gratis)
  atau `AI_PROVIDER=gemini` + `GEMINI_API_KEY`.
- Isi `YOUTUBE_LIVE_EMBED` (misal `https://www.youtube.com/embed/VIDEO_ID`)
  bila ingin siaran langsung tampil langsung di halaman Pusdai TV.
- Kirim `sitemap.xml` ke Google Search Console agar halaman terindeks.
- Ganti `ADMIN_PASSWORD` sebelum situs dibuka ke publik, lalu login ke
  `/admin` untuk menambah agenda dan informasi beranda.
