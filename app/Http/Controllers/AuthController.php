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
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('petugas')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/beranda')->with('success','Login Berhasil');
        } else {
            if (Auth::guard('siswa')->attempt(['nisn' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->intended('/beranda')->with('success','Login Berhasil');
            } else {
                return redirect('/')->with('failed','username atau password salah');
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
