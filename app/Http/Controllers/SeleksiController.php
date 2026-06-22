<?php

namespace App\Http\Controllers;

use App\Models\JalurPendaftaran;
use App\Models\Registration;
use Illuminate\Http\Request;

class SeleksiController extends Controller
{
    public function index()
    {
        session(['seleksiRun' => false]);
        $jalurs = JalurPendaftaran::with([
            'registration' => function ($query) {
                $query->where('status', 'terverifikasi')->with('student');
            }
        ])->withCount([
            'registration' => function ($query) {
                $query->where('status', 'terverifikasi');
            }
        ])->get();
        $registrations = Registration::with([
            'student',
            'jalur',
            'documents'
        ])->get();

        return view('public.admin.admin-seleksi', compact(
            'jalurs',
            'registrations',
        ));
    }

    public function seleksi()
    {
        session(['seleksiRun' => true]);
        $jalurs = JalurPendaftaran::with([
            'registration' => function ($query) {
                $query->where('status', 'terverifikasi')->with('student');
            }
        ])->get();
        foreach ($jalurs as $jalur) {
            $jalur->setRelation('registration', $jalur->registration->sortByDesc(fn($r) => $r->student->nilai_rata_rata));
        }

        return view('public.admin.admin-seleksi', compact('jalurs'))->with('success', 'Seleksi berhasil dijalankan!');
    }

    public function publishSeleksi()
    {
        $jalurs = JalurPendaftaran::all();

        foreach ($jalurs as $jalur) {

            $registrations = Registration::where(
                'jalur_id',
                $jalur->id
            )
                ->where('status', 'terverifikasi')
                ->orderByDesc('nilai_rata_rata')
                ->get();

            foreach ($registrations as $index => $registration) {

                $registration->hasil_seleksi =
                    $index < $jalur->kuota
                    ? 'diterima'
                    : 'tidak_diterima';

                $registration->save();
            }
        }

        session()->forget('seleksiRun');

        return redirect('/admin/seleksi')->with(
            'success',
            'Hasil seleksi berhasil dipublikasikan.'
        );
    }

    public function batalSeleksi()
    {
        session()->forget('seleksiRuns');

        return redirect('/admin/seleksi')->with('success', 'Seleksi dibatalkan!');
    }
}
