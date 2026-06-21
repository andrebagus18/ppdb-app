<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view('public.admin.admin-pengumuman', compact(
            'announcements'
        ));
    }

    public function show(Announcement $announcement)
    {
        return response()->json($announcement);
    }

    public function create(Request $request)
    {
        Announcement::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return back()->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function update(Request $request, Announcement $announcement)
    {
        $announcement->update([
            'judul' => $request->editJudul,
            'isi' => $request->editIsi,
        ]);
        return redirect('/admin/announcement')->with('success', 'Pengumuman berhasil di update!');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect('/admin/announcement')->with('success', 'Pengumuman berhasil dihapus!');
    }

    public function publish(Announcement $announcement)
    {
        $announcement->update([
            'is_published' => true,
            'published_at' => now(),
        ]);
        return redirect('/admin/announcement')->with('success', 'Pengumuman berhasil di publish!');
    }
}
