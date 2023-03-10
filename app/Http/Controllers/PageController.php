<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function siswa()
    {
        return view('pages.data-master.siswa');
    }
}
