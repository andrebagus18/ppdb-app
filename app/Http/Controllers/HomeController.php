<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\JalurPendaftaran;
use App\Models\Registration;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $reguler = $this->kuotaJalur('Reguler');
        $prestasi = $this->kuotaJalur('Prestasi');
        $zonasi = $this->kuotaJalur('Zonasi');
        $afirmasi = $this->kuotaJalur('Afirmasi');
        $pengumuman = Announcement::where('is_published', true)->latest('published_at')->first();
        return view('public.home', compact(
            'reguler',
            'prestasi',
            'zonasi',
            'afirmasi',
            'pengumuman'
        ));
    }

    public function kuotaJalur($namaJalur)
    {
        return
            JalurPendaftaran::where('nama', $namaJalur)
            ->withCount('registration')->first();
    }

    public function searchRegistration(Request $request)
    {
        $request->validate([
            'no_daftar' => 'required'
        ]);
        $registration = Registration::with([
            'student',
            'jalur'
        ])->where(
            'no_daftar',
            $request->no_daftar
        )->first();
        if (!$registration) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor pendaftaran tidak ditemukan.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'nama' => $registration->student->nama_lengkap,
                'nomor' => $registration->no_daftar,
                'jalurNama' => $registration->jalur->nama,
                'status' => statusSiswa($registration),
                'hasil' => hasilSeleksi($registration),
            ]
        ]);
    }
}
