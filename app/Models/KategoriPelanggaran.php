<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggaran',
        'kategori',
        'bobot_poin',
    ];

    // Relasi: 1 Jenis Pelanggaran bisa dicatat di banyak Transaksi
    public function transaksiPelanggarans()
    {
        return $this->hasMany(TransaksiPelanggaran::class);
    }
}