<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pertahun;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.beranda', [
            'banyakSiswa' => Siswa::count(),
            'banyakPetugas' => Petugas::count(),
            'banyakKelas' => Kelas::count(), 
            'banyakSpp' => Spp::count(), 
            'dataPertahun' => Pertahun::all(),
        ]);
    }
    public function spp()
    {
        return view('pages.data-master.spp.spp');
    }
    public function kelas()
    {
        return view('pages.data-master.kelas.kelas');
    }
    public function petugas()
    {
        return view('pages.data-master.petugas.petugas');
    }
    public function siswa()
    {
        return view('pages.data-master.siswa.siswa');
    }
    public function pembayaran()
    {
        return view('pages.transaksi.pembayaran.pembayaran');
    }
    public function history_pembayaran()
    {
        return view('pages.transaksi.history.history-pembayaran');
    }
    public function laporan_pembayaran()
    {
        return view('pages.laporan.laporan');
    }
}
