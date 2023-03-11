<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.beranda');
    }
    public function spp()
    {
        return view('pages.data-master.spp.spp');
    }
    public function kelas()
    {
        return view('pages.data-master.kelas.kelas');
    }
    public function siswa()
    {
        return view('pages.data-master.siswa.siswa');
    }
    public function petugas()
    {
        return view('pages.data-master.petugas.petugas');
    }
    public function pembayaran()
    {
        return view('pages.transaksi.pembayaran.pembayaran');
    }
    public function history_pembayaran()
    {
        return view('pages.transaksi.history.history-pembayaran');
    }
}