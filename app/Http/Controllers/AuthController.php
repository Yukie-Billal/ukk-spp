<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }
    public function loginact(Request $request)
    {
        if ($request->has('role')) {
            if ($request->role == 'siswa') {
                $credentials = $request->validate([
                    'nisn' => 'required|min:3',
                    'nis' => 'required',
                ]);
                $credentials['password'] = $credentials['nis'];
                if (Auth::guard('siswa')->attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->intended('/beranda')->with('success','Login Berhasil');
                } else {
                    session()->flash('failed','NISN atau NIS Tidak Ditemukan');
                    return back()->withErrors([
                        'nisn' => 'NISN atau NIS Tidak Ditemukan',
                    ])->onlyInput('nisn');                    
                }
            } elseif ($request->role == 'petugas') {
                $credentials = $request->validate([
                    'username' => 'required|min:3',
                    'password' => 'required',
                ]);
                if (Auth::guard('petugas')->attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->intended('/beranda')->with('success','Login Berhasil');
                } else {
                    session()->flash('failed','Username atau Password salah');
                    return back()->withErrors([
                        'username' => 'Username Tidak Ditemukan',
                    ])->onlyInput('username');
                }
            } else {
                dd("gagal");
            }
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        } else {
            Auth::guard('petugas')->logout();
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function profile()
    {
        return view('pages.auth.profile');
    }
}
