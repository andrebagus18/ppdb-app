@php
        $reject = $documents->contains('status_verifikasi', 'rejected');
        $verify = $documents->every(fn($doc) => $doc->status_verifikasi === 'verified');
            $bg = $reject ? 'bg-red-500' : ($verify ? 'bg-green-500' : 'bg-yellow-500');
            
            $title = $reject ? 'Berkas Anda Ditolak' : ($verify ? 'Selamat! Berkas Anda Diterima' : 'Berkas Anda Sedang Diverifikasi');
@endphp
<section class="container mx-auto p-6" data-tab="pengumuman-content">
    <div class="flex flex-col items-center justify-center mb-5">
        <h2 class="text-3xl font-semibold text-black mb-2">Pengumuman PPDB</h2>
        <p class="w-[35em] text-slate-600 text-md text-center">Temukan informasi terbaru mengenai jadwal, tahapan, dan hasil seleksi Penerimaan Peserta Didik Baru PPDB.</p>
    </div>
    <div class="max-w-3xl mx-auto">
        <div class="p-5 text-center bg-white shadow rounded-xl">
            <h4 class="text-black text-2xl font-bold">📢 PENGUMUMAN TERBARU</h4>
            <div class="p-4">
                <p class="bg-teal-500/40 rounded-md text-black font-bold py-4">HASIL SELEKSI PPDB 2027 TELAH DIUMUMKAN</p>
                <p class="my-4 text-black font-medium">Silakan cek status kelulusan melalui <span class="font-bold text-black">Dashboard</span> menu untuk mengetahui hasil seleksi.</p>
            </div>
            <div class="max-w-lg mx-auto text-left flex flex-col border-2">
                <p>Hasil Seleksi : <span class=""></span></p>
                <p>Catatan :</p>
            </div>
        </div>
    </div>
</section>