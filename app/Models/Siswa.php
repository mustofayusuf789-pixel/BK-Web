<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'kelas',
        'jenis_kelamin',
        'no_hp_ortu',
        'total_poin',
    ];

    // Relasi: 1 Siswa bisa punya banyak Transaksi Pelanggaran
    public function transaksiPelanggarans()
    {
        return $this->hasMany(TransaksiPelanggaran::class);
    }
}