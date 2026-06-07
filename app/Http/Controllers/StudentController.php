<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\JalurPendaftaran;
use App\Models\Registration;
use App\Models\Student;
use Cloudinary\Cloudinary;
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
        return view('public.registration', compact('jalur'));
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
            'nama_ayah' => ['required'],
            'kerja_ayah' => ['required'],
            'nama_ibu' => ['required'],
            'kerja_ibu' => ['required'],
            'nama_wali' => ['nullable'],
            'kerja_wali' => ['nullable'],
            'asal_sekolah' => ['required'],
            'nilai_rata_rata' => ['required', 'numeric'],
            'jalur_id' => ['required', 'exists:jalur_pendaftarans,id'],
            'foto' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'akta' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'ijazah' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'surat_jalur' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        DB::transaction(function () use ($request) {
            $student = Student::create([
                'user_id' => Auth::id(),
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'nama_ayah' => $request->nama_ayah,
                'kerja_ayah' => $request->kerja_ayah,
                'nama_ibu' => $request->nama_ibu,
                'kerja_ibu' => $request->kerja_ibu,
                'nama_wali' => $request->nama_wali,
                'kerja_wali' => $request->kerja_wali,
                'asal_sekolah' => $request->asal_sekolah,
                'nilai_rata_rata' => $request->nilai_rata_rata,
            ]);
            $registration = Registration::create([
                'student_id' => $student->id,
                'jalur_id' => $request->jalur_id,
                'no_daftar' => 'PPDB' . date('Ymd') . str_pad($student->id, 4, '0', STR_PAD_LEFT),
                'status' => 'pending',
                'hasil_seleksi' => null,
            ]);
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);
            $documents = [
                'foto',
                'akta',
                'kk',
                'ijazah',
                'surat_jalur'
            ];
            foreach ($documents as $docType) {
                if ($request->hasFile($docType)) {
                    $result = $cloudinary->uploadApi()->upload($request->file($docType)->getRealPath(), [
                        'folder' => 'ppdb/' . $student->id,
                        'public_id' => $docType,
                        'overwrite' => true,
                    ]);
                    Document::create([
                        'registration_id' => $registration->id,
                        'jenis_document' => $docType,
                        'cloudinary_url' => $result['secure_url'],
                        'cloudinary_public_id' => $result['public_id'],
                        'status_verifikasi' => 'pending',
                        'catatan' => null,
                    ]);
                }
            }
        });
        return back()->with('success', 'Pendaftaran berhasil');
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
