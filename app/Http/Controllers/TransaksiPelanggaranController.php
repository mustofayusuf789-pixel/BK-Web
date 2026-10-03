<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPelanggaran;
use App\Exports\RekapPelanggaranExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiPelanggaranController extends Controller
{
    /**
     * Menampilkan daftar transaksi pelanggaran.
     */
    public function index()
    {
        $transaksis = TransaksiPelanggaran::with('user')
            ->latest()
            ->paginate(10);

        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Menampilkan form input pencatatan pelanggaran manual.
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Menyimpan data transaksi pelanggaran ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'nama_pelanggaran' => 'required|string|max:255',
            'bobot_poin' => 'required|integer|min:1',
            'tanggal_pelanggaran' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        TransaksiPelanggaran::create([
            'user_id' => auth()->id() ?? 1,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'nama_pelanggaran' => $request->nama_pelanggaran,
            'bobot_poin' => $request->bobot_poin,
            'tanggal_pelanggaran' => $request->tanggal_pelanggaran,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Data pelanggaran siswa berhasil dicatat!');
    }

    /**
     * Mengunduh rekapitulasi data pelanggaran bulanan dalam format Excel.
     */
    public function exportExcel(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer|min:2020',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $namaFile = "Rekap_Pelanggaran_Bulan_{$bulan}_{$tahun}.xlsx";

        return Excel::download(new RekapPelanggaranExport($bulan, $tahun), $namaFile);
    }
}