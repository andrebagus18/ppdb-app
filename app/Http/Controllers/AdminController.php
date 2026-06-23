<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Document;
use App\Models\JalurPendaftaran;
use App\Models\Registration;
use Carbon\Carbon;
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

        $pendaftar = $this->getGrafikPendaftaran($registrations);

        return view('public.admin.admin-info', compact(
            'registrations',
            'stats',
            'latestRegistrations',
            'pendaftar'
        ));
    }

    private function getGrafikPendaftaran($registrations)
    {
        // Ambil range tanggal awal Senin dan akhir Minggu pada minggu berjalan ini
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Filter data siswa yang mendaftar KHUSUS minggu ini saja
        $week = $registrations->whereBetween('created_at', [$startOfWeek, $endOfWeek]);

        // Urutan nama hari untuk sumbu X grafik
        $namaHari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
        $AngkaGrafik = [];

        foreach ($namaHari as $index => $hari) {
            // dayOfWeekIso Carbon: Senin = 1, Selasa = 2, ..., Minggu = 7
            $targetDay = $index + 1;

            // Hitung berapa banyak siswa yang mendaftar cocok dengan urutan hari tersebut
            $AngkaGrafik[] = $week->filter(function ($item) use ($targetDay) {
                return Carbon::parse($item->created_at)->dayOfWeekIso === $targetDay;
            })->count();
        }

        return $AngkaGrafik; // Mengembalikan array angka [60, 70, 50, ...]
    }
}
