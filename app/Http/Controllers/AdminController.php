<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Document;
use App\Models\JalurPendaftaran;
use App\Models\Registration;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $registrations = Registration::with([
            'student',
            'jalur',
            'documents'
        ])->get();
        $stats = [
            'total' => Registration::count(),
            'pending' => Registration::where('status', 'menunggu_verifikasi')->count(),
            'terverifikasi' => Registration::where('status', 'terverifikasi')->count(),
            'rejected' => Document::where('status_verifikasi', 'rejected')->count(),
            'verified' => Document::where('status_verifikasi', 'verified')->count(),
        ];
        $latestRegistrations = Registration::with(['student', 'jalur'])
            ->latest()
            ->take(5)
            ->get();

        return view('public.admin.admin-info', compact(
            'registrations',
            'stats',
            'latestRegistrations'
        ));
    }

    public function seleksi()
    {
        $jalurs = JalurPendaftaran::withCount([
            'registration' => function ($query) {
                $query->where('status', 'terverifikasi');
            }
        ])->get();
        $reguler = $jalurs->firstWhere('nama', 'Reguler');
        $prestasi = $jalurs->firstWhere('nama', 'Prestasi');
        $zonasi = $jalurs->firstWhere('nama', 'Zonasi');
        $afirmasi = $jalurs->firstWhere('nama', 'Afirmasi');

        // foreach ($results as $jalur => $data) {
        //     $kuota = JalurPendaftaran::where('kuota', $kuota)->first()->jumlah;

        //     $accepted = $data->take($kuota);

        //     foreach ($data as $i => $row) {
        //         $row->status = $i < $kuota ? 'accepted' : 'not_accepted';
        //         $row->save();
        //     }
        // }

        return view('public.admin.admin-seleksi', compact(
            'jalurs',
            'reguler',
            'prestasi',
            'zonasi',
            'afirmasi'
        ));
    }

    public function pengumuman()
    {
        $pengumumans = Announcement::where('is_published', true)->latest()->get();

        return view('public.admin.admin-pengumuman', compact(
            'pengumumans'
        ));
    }
}
