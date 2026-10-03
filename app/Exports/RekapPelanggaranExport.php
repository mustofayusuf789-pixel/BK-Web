<?php

namespace App\Exports;

use App\Models\TransaksiPelanggaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class RekapPelanggaranExport implements FromCollection, WithHeadings, WithMapping
{
    protected $bulan;
    protected $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection()
    {
        return TransaksiPelanggaran::with('user')
            ->whereMonth('tanggal_pelanggaran', $this->bulan)
            ->whereYear('tanggal_pelanggaran', $this->tahun)
            ->latest()
            ->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal Kejadian',
            'Nama Siswa',
            'Kelas',
            'Bentuk Pelanggaran',
            'Poin',
            'Catatan / Lokasi',
            'Petugas BK',
        ];
    }

    public function map($transaksi): array
    {
        return [
            Carbon::parse($transaksi->tanggal_pelanggaran)->format('d-m-Y'),
            $transaksi->nama_siswa,
            $transaksi->kelas,
            $transaksi->nama_pelanggaran,
            $transaksi->bobot_poin,
            $transaksi->catatan ?? '-',
            $transaksi->user->name ?? '-',
        ];
    }
}