<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.beranda');
    }

    public function siswa()
    {
        return view('pages.data-master.siswa.siswa');
    }

    public function kelas()
    {
        return view('add');
    }
}
