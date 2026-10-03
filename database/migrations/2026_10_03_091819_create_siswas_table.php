<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('nama_siswa');
            $table->string('kelas'); // Contoh: X IPA 1, XII IPS 2
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_hp_ortu')->nullable();
            $table->integer('total_poin')->default(0); // Akumulasi poin otomatis
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};