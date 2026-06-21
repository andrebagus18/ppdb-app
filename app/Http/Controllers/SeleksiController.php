<?php

namespace App\Http\Controllers;

use App\Models\JalurPendaftaran;
use Illuminate\Http\Request;

class SeleksiController extends Controller
{
    public function seleksi()
    {
        $jalurs = JalurPendaftaran::withCount([
            'registration' => function ($query) {
                $query->where('status', 'terverifikasi');
            }
        ])->get();
        $reguler = $jalurs->firstWhere('nama', 'Reguler');
        $prestasi = $jalurs->firstWhere('nama', 'Prestasi');
        $zonasi = $jalurs->firstWhere('nama', 'Zonasi');
        $afirmasi = $jalurs->firstWhere('nama', 'Afirmasi');

        // foreach ($results as $jalur => $data) {
        //     $kuota = JalurPendaftaran::where('kuota', $kuota)->first()->jumlah;

        //     $accepted = $data->take($kuota);

        //     foreach ($data as $i => $row) {
        //         $row->status = $i < $kuota ? 'accepted' : 'not_accepted';
        //         $row->save();
        //     }
        // }

        return view('public.admin.admin-seleksi', compact(
            'jalurs',
            'reguler',
            'prestasi',
            'zonasi',
            'afirmasi'
        ));
    }
}
