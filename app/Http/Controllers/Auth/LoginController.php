<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $data = $request->only('email', 'password');
        if (auth()->attempt($data)) {
            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('/pegawai');
        }
        return redirect()->back()->withErrors(['error' => 'Username atau password salah']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}