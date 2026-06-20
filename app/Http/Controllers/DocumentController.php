<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'akta' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'ijazah' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'surat_jalur' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        $registration = Auth::user()?->student?->registration;
        if (!$registration) {
            return back()
                ->with('error', ' Silahkan Lengkapi formulir pendaftaran dulu.');
        }
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
                    'folder' => 'ppdb/' . $registration->student_id,
                    'public_id' => $docType,
                    'overwrite' => true,
                ]);
                // dd($result);
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
        return redirect('/dashboard')->with('success', 'Dokumen berhasil diunggah');
    }

    // fungsi reupload dokumen jika ditolak
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,pdf|max:2048'
        ]);
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);
        if ($document->status_verifikasi !== 'rejected') {
            return back()->with('error', 'Dokumen tidak dapat di Upload ulang!');
        }
        $cloudinary->uploadApi()->destroy($document->cloudinary_public_id);
        $upload = $cloudinary->uploadApi()->upload($request->file('file')->getRealPath(), [
            'folder' => 'ppdb/' . $document->registration->student_id,
            'public_id' => $document->jenis_document,
            'overwrite' => true,
        ]);
        $document->update([
            'cloudinary_url' => $upload['secure_url'],
            'cloudinary_public_id' => $upload['public_id'],
            'status_verifikasi' => 'pending',
            'catatan' => null,
        ]);
        return redirect('/siswa/dashboard')->with('success', 'Dokumen berhasil di upload Ulang.');
    }
}
