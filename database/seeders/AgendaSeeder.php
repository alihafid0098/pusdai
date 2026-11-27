<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $kajian = [
            ['Qur\'an Tahsin', 'Ust. Denoi Abdul Aziz', 'Senin', '09.00 – 11.30 WIB', 'Ruang Multimedia PUSDAI'],
            ['Qur\'an Essentia', 'Ust. Fajrin Nurul Haq', 'Selasa', '10.00 – 11.30 WIB', 'Ruang Multimedia PUSDAI'],
            ['Qur\'an Pra Tahsin', 'Ust. Eko Safar Hardianto', 'Selasa', '13.00 – 14.30 WIB (Multimedia) & 15.00 – 16.00 WIB (Ruang Kecil Lt. 3)', 'Ruang Multimedia PUSDAI'],
            ['Talk Show Dhuha', 'Kajian Dhuha interaktif', 'Kamis', '07.00 – 07.45 WIB', 'Ruang Multimedia PUSDAI'],
            ['Fiqih Ibadah', 'Ust. Ramdan Fauzi', 'Kamis', '07.30 – 10.00 WIB', 'Ruang Multimedia PUSDAI'],
            ['Irsyad Tazkiyyah', 'Kajian tazkiyah (pekan ke-3)', 'Kamis', '09.00 – 11.00 WIB', 'Ruang PUSDAI Jawa Barat'],
            ['Bahasa Arab Al-Qur\'an', 'Ust. Fathurrahman M. Basyari', 'Jum\'at', '08.30 – 10.00 WIB', 'Ruang Multimedia PUSDAI'],
            ['Aqidah Akhlaq', 'Ust. Reza Noor Umboro', 'Sabtu', '09.00 – 11.00 WIB', 'Ruang Multimedia PUSDAI'],
        ];

        foreach ($kajian as [$judul, $pemateri, $hari, $waktu, $lokasi]) {
            Agenda::updateOrCreate(
                ['judul' => $judul, 'is_rutin' => true],
                [
                    'kategori' => 'Kajian Rutin',
                    'pemateri' => $pemateri,
                    'hari' => $hari,
                    'waktu' => $waktu,
                    'lokasi' => $lokasi,
                    'ringkasan' => 'Kajian rutin PUSDAI Jawa Barat, terbuka untuk umum dan gratis.',
                    'is_published' => true,
                ]
            );
        }
    }
}
