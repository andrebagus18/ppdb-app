<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email belum terdaftar',
            ])->withInput();
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah',
            ])->withInput();
        }
        Auth::login($user);
        $request->session()->regenerate();
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard')->with('success', 'Selamat datang, Admin!');
        }
        if ($user->role === 'panitia') {
            return redirect('/panitia/dashboard')->with('success', 'Selamat datang, Panitia!');
        }

        return redirect('/siswa/ppdb')->with('success', 'Login berhasil.');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email',  'unique:users'],
            'password' => ['required', 'min:8'],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);

        return redirect('/auth/login')->with('success', 'Berhasil, silahkan login!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
    public function showLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }
            if (Auth::user()->role === 'panitia') {
                return redirect('/panitia/dashboard');
            }
            return redirect('/siswa/ppdb');
        }
        return view('auth.page');
    }
}
