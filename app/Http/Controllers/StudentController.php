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
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jalur = JalurPendaftaran::all();
        $student = Student::where('user_id', Auth::id())
            ->with('registration.documents')
            ->first();
        $documents = $student?->registration?->documents ?? collect();
        return view('public.siswa', compact(
            'jalur',
            'student',
            'documents'
        ));
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
