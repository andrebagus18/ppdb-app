<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Models\JalurPendaftaran;
use App\Models\Registration;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $jalurs = JalurPendaftaran::all();
        $totalJalur = JalurPendaftaran::withCount([
            'registration as total_diterima' => function ($q) {
                $q->where('hasil_seleksi', 'diterima');
            }
        ])->get();
        $statsDiterima = Registration::where('hasil_seleksi', 'diterima')->count();
        $statsDitolak = Registration::where('hasil_seleksi', 'tidak_diterima')->count();
        $query = Registration::with('student', 'jalur');
        if ($request->jalur_id) {
            $query->where('jalue_pendaftaran_id', $request->jalur_id);
        }
        $registrations = $query->get();
        return view('public.admin.admin-laporan', compact(
            'jalurs',
            'statsDiterima',
            'statsDitolak',
            'registrations',
            'totalJalur'
        ));
    }

    public function export(Request $request)
    {
        $jalurId = $request->jalur_id;
        if ($jalurId) {
            $jalur = JalurPendaftaran::find($jalurId);
            $jalurName = $jalur ? str_replace(' ', '_', $jalur->nama) : 'Jalur_Pilihan';
            $namaFile = 'Jalur_' . $jalurName . '.xlsx';
        } else {
            $namaFile = 'Semua_Jalur.xlsx';
        }
        return Excel::download(
            new ReportExport($jalurId),
            $namaFile
        );
    }
}
