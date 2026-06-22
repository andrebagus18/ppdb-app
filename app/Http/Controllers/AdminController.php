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
            ->take(10)
            ->get();

        return view('public.admin.admin-info', compact(
            'registrations',
            'stats',
            'latestRegistrations'
        ));
    }
}
