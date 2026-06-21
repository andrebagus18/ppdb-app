<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManajemenController extends Controller
{
    public function index()
    {
        $panitias = User::where('role', 'panitia')
            ->latest()
            ->get();

        return view('public.admin.admin-manajemen', compact(
            'panitias'
        ));
    }

    public function create(Request $request)
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
            'role' => 'panitia',
        ]);
        return redirect('/admin/manajemen')->with('success', 'Panitia berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $data = [
            'name' => $request->editName,
            'email' => $request->editEmail,
        ];
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect('/admin/manajemen')->with('success', 'Panitia berhasil diupdate!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/manajemen')->with('success', 'Panitia berhasil dihapus!');
    }
}
