<?php

namespace App\Http\Controllers;

use App\Models\JalurPendaftaran;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $jalur = JalurPendaftaran::all();
        $student = Student::where('user_id', Auth::id())
            ->with('registration.documents')
            ->first();
        $documents = $student?->registration?->documents ?? collect();
        $catatanReject = $documents->where('status_verifikasi', 'rejected');
        $statusCard = $this->getStatus($documents);
        $registration = $student?->registration;
        $hasilSeleksi = $registration?->hasil_seleksi;
        $jalurs = JalurPendaftaran::withCount('registration')->get();

        return view('public.siswa', compact(
            'jalur',
            'student',
            'documents',
            'catatanReject',
            'statusCard',
            'hasilSeleksi',
            'jalurs'
        ));
    }

    public function home()
    {
        $reguler = $this->kuotaJalur('Reguler');
        $prestasi = $this->kuotaJalur('Prestasi');
        $zonasi = $this->kuotaJalur('Zonasi');
        $afirmasi = $this->kuotaJalur('Afirmasi');
        return view('public.home', compact(
            'reguler',
            'prestasi',
            'zonasi',
            'afirmasi'
        ));
    }

    public function kuotaJalur($namaJalur)
    {
        return
            JalurPendaftaran::where('nama', $namaJalur)
            ->withCount('registration')->first();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['required'],
            'nama_lengkap' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required'],
            'agama' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'pos' => ['required'],
            'ayah' => ['required'],
            'kerja_ayah' => ['required'],
            'ibu' => ['required'],
            'kerja_ibu' => ['required'],
            'wali' => ['nullable'],
            'hubungan_wali' => ['nullable'],
            'asal_sekolah' => ['required'],
            'nilai_rata_rata' => ['required', 'numeric'],
            'jalur_id' => ['required', 'exists:jalur_pendaftarans,id'],
        ]);
        DB::transaction(function () use ($request) {
            $student = Student::create([
                'user_id' => Auth::id(),
                'nik/nisn' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'pos' => $request->pos,
                'ayah' => $request->ayah,
                'kerja_ayah' => $request->kerja_ayah,
                'ibu' => $request->ibu,
                'kerja_ibu' => $request->kerja_ibu,
                'wali' => $request->wali,
                'hubungan_wali' => $request->hubungan_wali,
                'asal_sekolah' => $request->asal_sekolah,
                'nilai_rata_rata' => $request->nilai_rata_rata,
            ]);
            $jalur = JalurPendaftaran::findOrfail($request->jalur_pendaftaran_id);
            $sisa = $jalur->kuota - $jalur->registration()->count();
            if ($sisa <= 0) {
                return back()->with('error', 'Kuota Jalur Pendaftaran Penuh.');
            }
            Registration::create([
                'student_id' => $student->id,
                'jalur_pendaftaran_id' => $request->jalur_id,
                'no_daftar' => 'PPDB' . '-' . date('Ymd') . str_pad($student->id, 3, '0', STR_PAD_LEFT),
                'status' => 'menunggu_verifikasi',
                'hasil_seleksi' => 'pending',
            ]);
        });
        return redirect('/dashboard')->with('success', 'Pendaftaran berhasil');
    }

    public function getStatus($documents)
    {
        if ($documents->isEmpty()) {
            return [
                'bg' => 'bg-gray-500',
                'title' => 'Anda Belum Mengunggah Dokumen'
            ];
        }
        if ($documents->contains('status_verifikasi', 'rejected')) {
            return [
                'bg' => 'bg-red-500',
                'title' => 'Berkas Anda Ditolak'
            ];
        }
        if ($documents->every(fn($doc) => $doc->status_verifikasi === 'verified')) {
            return [
                'bg' => 'bg-green-500',
                'title' => 'Selamat! Berkas Anda Diterima'
            ];
        }
        return [
            'bg' => 'bg-yellow-500',
            'title' => 'Berkas Anda Sedang Diverifikasi'
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
