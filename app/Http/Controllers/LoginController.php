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
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        return redirect()->intended('dashboard');
    } else {
        // Kirim pesan error ke sesi jika login gagal
        return back()->with('error', 'Email atau password salah.');
    }
}

}
