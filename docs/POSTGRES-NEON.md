# Pindah Database ke Postgres Gratis (Neon)

Tujuan: data admin (berita, agenda, foto galeri, pengumuman) tidak hilang
setiap Render melakukan deploy ulang. Dengan Postgres, database hidup di
luar container, jadi aman.

## Langkah

1. Buka neon.com, daftar gratis (bisa pakai akun GitHub/Google).
2. Buat project baru. Pilih region Singapore bila tersedia, nama bebas
   (misal `pusdai`).
3. Setelah project jadi, buka menu **Connect** dan salin **connection
   string** yang bentuknya seperti:

   ```
   postgresql://user:password@ep-xxxx.ap-southeast-1.aws.neon.tech/neondb?sslmode=require
   ```

4. Buka Render → service `pusdai` → tab **Environment** → **Add Environment
   Variable**:
   - Key: `DATABASE_URL`
   - Value: tempel connection string dari Neon

5. Simpan. Render akan deploy ulang otomatis. Saat container start,
   entrypoint mendeteksi `DATABASE_URL`, memakai Postgres, menjalankan
   migrasi, dan mengisi data awal (admin, jadwal kajian, berita contoh,
   foto galeri) karena database baru masih kosong.

6. Buka `/admin`, login `admin@pusdai.com`. Tambah satu berita, lalu
   lakukan "Manual Deploy" di Render sekali untuk memastikan berita tadi
   masih ada setelah deploy.

## Yang perlu diketahui

- Isi database sekarang permanen. Tapi foto yang diunggah lewat admin
  masih disimpan di container Render, jadi tetap hilang saat deploy ulang.
  Solusinya nanti memakai penyimpanan gambar online (mis. Cloudinary
  gratis) atau disk berbayar di Render.
- Neon gratis: 0,5 GB penyimpanan, cukup untuk situs sekecil ini.
- Kalau ingin kembali ke SQLite, hapus variabel `DATABASE_URL` di Render.
