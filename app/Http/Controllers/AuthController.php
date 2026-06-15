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
            return redirect('/auth')->withErrors([
                'email' => 'Email belum terdaftar',
            ]);
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect('/auth')->withErrors([
                'password' => 'Password salah',
            ]);
        }
        if (Auth::login($user)) {
            $request->session()->regenerate();
            if ($user->role === 'admin') {
                return redirect('/admin');
            }
            if ($user->role === 'panitia') {
                return redirect('/panitia');
            }
            return redirect('/siswa/ppdb')->with('success', 'Registrasi berhasil.');
        }
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email',  'unique:users'],
            'password' => ['required', 'min:8'],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/auth')->with('success', 'Registrasi berhasil, silakan login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth');
    }
    public function showLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin');
            }
            if (Auth::user()->role === 'panitia') {
                return redirect('/panitia');
            }
            return redirect('/siswa/ppdb');
        }
        return view('auth.page');
    }
}
