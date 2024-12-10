<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Cek apakah email ada di database
    $userExists = \App\Models\User::where('email', $request->email)->exists();

    if (! $userExists) {
        // Email tidak ditemukan
        return back()->with('error', 'Akun dengan email ini belum terdaftar.')
                     ->withInput(); // Menyimpan input email agar tetap terisi
    }

    // Cek kredensial
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        // Login berhasil, redirect ke halaman utama
        return redirect()->route('articles.index');
    } else {
        // Login gagal, kirim pesan error
        return back()->with('error', 'Email atau password salah.')
                     ->withInput(); // Menyimpan input email agar tetap terisi
    }
}

public function logout(Request $request)
{
    // Proses logout pengguna
    Auth::logout();

    // Menghapus session
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect ke halaman login atau halaman utama
    return redirect()->route('articles.index');
}



}
