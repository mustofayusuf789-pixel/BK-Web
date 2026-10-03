<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggaran'); // Contoh: Datang Terlambat, Membolos
            $table->enum('kategori', ['Ringan', 'Sedang', 'Berat']);
            $table->integer('bobot_poin'); // Contoh: 10, 25, 50
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_pelanggarans');
    }
};