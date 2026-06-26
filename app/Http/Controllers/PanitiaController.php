<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\JalurPendaftaran;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanitiaController extends Controller
{
    public function index(Request $request)
    {
        $registrations = Registration::with([
            'student',
            'jalur',
            'documents'
        ])->get();
        $documents = $student?->registration?->documents ?? collect();
        $status = getStatus($documents);


        return view('public.panitia.panitia-info', compact('registrations', 'documents',  'status',));
    }

    public function updateStatus(Registration $registration)
    {
        $verified = $registration->documents()->where('status_verifikasi', '!=', 'verified')->doesntExist();
        if (!$verified) {
            return;
        }
        $registration->update([
            'status' => 'terverifikasi',
            'hasil_seleksi' => 'pending'
        ]);
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
        return redirect('/panitia/verifikasi')->with('success', 'Dokumen disetujui');
    }

    public function dashboard()
    {
        $registrations = Registration::with([
            'student',
            'jalur',
            'documents'
        ])->get();
        $documents = $student?->registration?->documents ?? collect();
        $status = getStatus($documents);
        $latestRegistrations = Registration::with(['student', 'jalur'])
            ->latest()
            ->take(10)
            ->get();
        $stats = [
            'total' => Registration::count(),
            'pending' => Registration::where('status', 'menunggu_verifikasi')->count(),
            'terverifikasi' => Registration::where('status', 'terverifikasi')->count(),
            'rejected' => Document::where('status_verifikasi', 'rejected')->count(),
        ];
        $jalurs = JalurPendaftaran::withCount('registration')->get();

        return view('public.panitia.panitia-info', compact(
            'registrations',
            'documents',
            'status',
            'stats',
            'jalurs',
            'latestRegistrations'
        ));
    }

    public function registrations(Request $request)
    {
        $documents = $student?->registration?->documents ?? collect();
        $query = Registration::query()->with(['student', 'jalur', 'documents']);

        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('no_daftar', 'like', "%{$search}%")->orWhereHas('student', function ($student) use ($search) {
                    $student->where('nama_lengkap', 'like', "%{$search}%");
                });
            });
        }

        if ($request->status) {
            if ($request->status == 'rejected') {
                $query->whereHas('documents', function ($q) {
                    $q->where('status_verifikasi', 'rejected');
                });
            } else {
                $query->where('status', $request->status);
            }
        }

        if ($request->jalur_id) {
            $query->where('jalur_pendaftaran_id', $request->jalur_id);
        }

        $registrations = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $jalurs = JalurPendaftaran::all();

        if ($request->ajax()) {
            return view('partials.table-pendaftaran', compact('registrations'))->render();
        }

        return view('public.panitia.panitia-pendaftaran', compact('registrations', 'jalurs', 'documents'));
    }

    public function verifikasi()
    {
        $registrations = Registration::with([
            'student',
            'jalur',
            'documents'
        ])->latest()->get();
        $documents = Document::with([
            'registration.student'
        ])->latest()->get();

        return view('public.panitia.panitia-verifikasi', compact(
            'documents',
            'registrations'
        ));
    }
}
