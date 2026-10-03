<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\KategoriPelanggaran;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data Dummy Siswa
        Siswa::create([
            'nisn' => '0051234561',
            'nama_siswa' => 'Ahmad Fauzi',
            'kelas' => 'XII IPA 1',
            'jenis_kelamin' => 'L',
            'total_poin' => 0,
        ]);

        Siswa::create([
            'nisn' => '0051234562',
            'nama_siswa' => 'Siti Nurhaliza',
            'kelas' => 'XI IPS 2',
            'jenis_kelamin' => 'P',
            'total_poin' => 0,
        ]);

        Siswa::create([
            'nisn' => '0051234563',
            'nama_siswa' => 'Budi Santoso',
            'kelas' => 'X MERDEKA 3',
            'jenis_kelamin' => 'L',
            'total_poin' => 0,
        ]);

        // 2. Data Dummy Kategori Pelanggaran
        KategoriPelanggaran::create([
            'nama_pelanggaran' => 'Datang Terlambat ke Sekolah',
            'kategori' => 'Ringan',
            'bobot_poin' => 5,
        ]);

        KategoriPelanggaran::create([
            'nama_pelanggaran' => 'Tidak Memakai Seragam Lengkap / Atribut',
            'kategori' => 'Ringan',
            'bobot_poin' => 10,
        ]);

        KategoriPelanggaran::create([
            'nama_pelanggaran' => 'Membangkang / Membolos Saat Jam Pelajaran',
            'kategori' => 'Sedang',
            'bobot_poin' => 20,
        ]);

        KategoriPelanggaran::create([
            'nama_pelanggaran' => 'Merokok di Lingkungan Sekolah',
            'kategori' => 'Berat',
            'bobot_poin' => 50,
        ]);
    }
}