<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanitiaController extends Controller
{
    public function index()
    {
        $registrations = Registration::with([
            'student',
            'jalur',
            'documents'
        ])->get();
        $stats = [
            'total' => Registration::count(),
            'pending' => Registration::where('status', 'menunggu_verifikasi')->count(),
            'verified' => Registration::where('status', 'verified')->count(),
            'rejected' => Document::where('status_verifikasi', 'rejected')->count(),
        ];

        return view('public.panitia', compact('registrations', 'stats'));
    }
    public function updateStatus(Registration $registration)
    {
        $verified = $registration->documents()->where('status_verifikasi', '!=', 'verified')->doesntExist();
        if (!$verified) {
            return;
        }
        $jalur = $registration->jalur;
        $jumlahDiterima = Registration::where('jalur_pendaftaran_id', $jalur->id)
            ->where('hasil_seleksi', 'diterima')
            ->count();
        if ($jumlahDiterima < $jalur->kuota) {
            $registration->update([
                'status' => 'terverifikasi',
                'hasil_seleksi' => 'diterima'
            ]);
        } else {
            $registration->update([
                'status' => 'terverifikasi',
                'hasil_seleksi' => 'tidak_diterima'
            ]);
        }
    }
    public function reject(Request $request, Document $document)
    {
        $request->validate([
            'catatan' => 'required'
        ]);
        if ($document->status_verifikasi !== 'pending') {
            return back()->with('error', 'Dokumen sedang diproses!');
        }
        DB::transaction(function () use ($document, $request) {
            $document->update([
                'status_verifikasi' => 'rejected',
                'catatan' => $request->catatan
            ]);
            $document->registration->update([
                'status' => 'menunggu_verifikasi'
            ]);
        });
        return back()->with('success', 'Dokumen berhasil Ditolak!');
    }
    public function approve(Document $document)
    {
        if ($document->status_verifikasi !== 'pending') {
            return back()->with('error', 'Dokumen sedang diproses!');
        }
        DB::transaction(function () use ($document) {
            $document->update([
                'status_verifikasi' => 'verified',
                'catatan' => null
            ]);
            $this->updateStatus($document->registration);
        });
        return back()->with('success', 'Dokumen disetujui');
    }
}
