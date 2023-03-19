<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class PembayaransExport implements FromQuery
{
    use Exportable;

    protected $tglAwal;
    protected $tglAkhir;
    public function __construct($tglAwal, $tglAkhir)
    {
        $this->tglAwal = $tglAwal;
        $this->tglAkhir = $tglAkhir;
    }

    public function query()
    {
        return Pembayaran::query()->where('tgl_bayar', '>=', $this->tglAwal)->where('tgl_bayar', '<=', $this->tglAkhir);
    }
}
