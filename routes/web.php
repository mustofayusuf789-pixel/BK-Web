<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiPelanggaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Export Excel (Harus ditaruh SEBELUM resource transaksi)
    Route::get('/transaksi/export', [TransaksiPelanggaranController::class, 'exportExcel'])->name('transaksi.export');

    // Route Resource Transaksi Pelanggaran
    Route::resource('transaksi', TransaksiPelanggaranController::class);
});

require __DIR__.'/auth.php';