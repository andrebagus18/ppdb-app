<section class="container mx-auto p-6" data-tab="pengumuman-content">
    <div class="flex flex-col items-center justify-center mb-2">
        <h2 class="text-3xl font-semibold text-black mb-2">Pengumuman PPDB</h2>
        <p class="w-[35em] text-slate-600 text-md text-center">Temukan informasi terbaru mengenai jadwal, tahapan, dan
            hasil seleksi Penerimaan Peserta Didik Baru PPDB.</p>
    </div>
    <div class="max-w-3xl mx-auto">
        <div class="p-5 text-center bg-white shadow rounded-xl">
            <h4 class="text-black text-2xl font-bold">📢 PENGUMUMAN TERBARU</h4>
            <div class="p-4">
                <p class="bg-blue-500/40 rounded-md text-black font-bold py-2">PENGUMUMAN PPDB 2026/2027 SMKN 45 MERDEKA
                </p>
                @if ($hasilStatus === 'terverifikasi')
                    <div class="bg-green-200 text-green-800 text-xl p-4 rounded-lg mt-4">
                        <b>🎉Selamat! Berkas Anda Terverifikasi🎉</b><br>Silahkan pantau terus <b
                            class="text-black">Dashboard</b> Anda untuk mengetahui pengumuman dan hasil seleksi oleh
                        Admin.
                    </div>
                @else
                    <p class="my-4 text-black font-medium">Silakan cek status kelulusan melalui <span
                            class="font-bold text-black">Dashboard</span> menu untuk mengetahui hasil seleksi.
                    </p>
                @endif
                @if ($pengumuman)
                    <div class="bg-green-200 text-green-800 p-4 rounded-lg mt-2 text-center">
                        <p class="font-bold text-xl"> {{ $pengumuman->judul }}</p>
                        <p class="font-medium text-md"> {{ $pengumuman->isi }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
