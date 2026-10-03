<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_siswa',
        'kelas',
        'nama_pelanggaran',
        'bobot_poin',
        'tanggal_pelanggaran',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}