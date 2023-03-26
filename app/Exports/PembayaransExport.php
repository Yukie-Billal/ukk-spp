<?php

namespace App\Exports;

use App\Models\ExportPembayaran;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PembayaransExport implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;

    protected $tglAwal;
    protected $tglAkhir;
    public function __construct($tglAwal, $tglAkhir)
    {
        $this->tglAwal = $tglAwal;
        $this->tglAkhir = $tglAkhir;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A2:J2');
                $event->sheet->getDelegate()->mergeCells('A1:J1');
            },
        ];
    }

    public function headings(): array
    {
        return [
            ['Laporan Pembayaran'],
            ['Laporan Pembayaran Spp Dari Tanggal '.$this->tglAwal.' Hingga Tanggal '.$this->tglAkhir],
            ['#',
            'Nama Petugas',
            'Nisn',
            'Nis',
            'Nama Siswa',
            'Tanggal Pembayaran',
            'Bulan Spp',
            'Tahun Spp',
            'Spp Siswa',
            'kelas'],
        ];
    }

    public function query()
    {
        return ExportPembayaran::query()->where('tgl_bayar', '>=', $this->tglAwal)->where('tgl_bayar', '<=', $this->tglAkhir);
    }
}
