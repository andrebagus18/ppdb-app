<section id="seleksi" class="p-6">
    <div class="p-2 pt-0">
        <div class="bg-white rounded-xl px-4 py-2 mb-2">
            <div class="flex flex-col">
                <div class="text-amber-400 text-xl flex gap-3">
                    ⚠️
                    <h3 class="font-semibold text-amber-300 mb-2">
                        Perhatian Sebelum Menjalankan Seleksi
                    </h3>
                </div>
                <div>
                    <p class="text-slate-400 text-md">"Jalankan Seleksi" akan menghitung hasil sementara berdasarkan
                        kuota dan nilai rata-rata (jalur Zonasi memprioritaskan domisili kecamatan Merdeka). Periksa
                        hasil sebelum mempublikasikan — hasil yang sudah dipublikasikan bersifat final."</p>
                </div>
            </div>
            <div class="flex gap-3 mt-2">
                <button class="bg-blue-600 px-4 py-2 rounded disabled:opacity-50">
                    Jalankan Seleksi
                </button>
                <button class="bg-emerald-600 px-4 py-2 rounded">
                    Publikasikan Hasil
                </button>
                <button class="bg-red-600 px-4 py-2 rounded">
                    Batal Seleksi
                </button>
            </div>
        </div>


        <!-- PREVIEW TABLE -->
        <div class="bg-white rounded-xl p-2 flex flex-col gap-2  overflow-y-auto scrollbar-hide h-80">
            {{-- reguler --}}
            <div class="flex flex-col gap-1 p-4 border border-slate-200 rounded-xl">
                <div class="flex items-center justify-between p-2">
                    <span class="text-slate-400 text-lg">Jalur Reguler</span>
                    <span class="text-slate-400 text-sm">Kuota {{ $reguler?->kuota ?? '-' }} | Terverifikasi
                        {{ $reguler?->registration->count() ?? '-' }}</span>
                </div>
                <table class="w-full text-md">
                    <thead>
                        <tr class="text-gray-500 border-b border-slate-700">
                            <th class="text-left p-2">Rank</th>
                            <th class="text-left p-2">No. Pendaftaran</th>
                            <th class="text-left p-2">Nama</th>
                            <th class="text-left p-2">Nilai Rata Rata</th>
                            <th class="text-left p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-slate-200">
                            <td class="p-2">1</td>
                            <td class="p-2">PPDB-2026001</td>
                            <td class="p-2">Andi</td>
                            <td class="p-2 text-yellow-400">89.00</td>
                            <td class="p-2 text-yellow-400">terverifikasi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- Prestasi --}}
            <div class="flex flex-col gap-1 p-4 border border-slate-200 rounded-xl">
                <div class="flex items-center justify-between p-2">
                    <span class="text-slate-400 text-lg">Jalur Prestasi</span>
                    <span class="text-slate-400 text-sm">Kuota {{ $prestasi?->kuota ?? '-' }} | Terverifikasi
                        {{ $prestasi?->registration->count() ?? '-' }}</span>
                </div>
                <table class="w-full text-md">
                    <thead>
                        <tr class="text-gray-500 border-b border-slate-700">
                            <th class="text-left p-2">Rank</th>
                            <th class="text-left p-2">No. Pendaftaran</th>
                            <th class="text-left p-2">Nama</th>
                            <th class="text-left p-2">Nilai Rata Rata</th>
                            <th class="text-left p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-slate-200">
                            <td class="p-2">1</td>
                            <td class="p-2">PPDB-2026001</td>
                            <td class="p-2">Andi</td>
                            <td class="p-2 text-yellow-400">89.00</td>
                            <td class="p-2 text-yellow-400">terverifikasi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- Zonasi --}}
            <div class="flex flex-col gap-1 p-4 border border-slate-200 rounded-xl">
                <div class="flex items-center justify-between p-2">
                    <span class="text-slate-400 text-lg">Jalur Zonasi</span>
                    <span class="text-slate-400 text-sm">Kuota {{ $zonasi?->kuota ?? '-' }} | Terverifikasi
                        {{ $zonasi?->registration->count() ?? '-' }}</span>
                </div>
                <table class="w-full text-md">
                    <thead>
                        <tr class="text-gray-500 border-b border-slate-700">
                            <th class="text-left p-2">Rank</th>
                            <th class="text-left p-2">No. Pendaftaran</th>
                            <th class="text-left p-2">Nama</th>
                            <th class="text-left p-2">Kecamatan</th>
                            <th class="text-left p-2">Nilai Rata Rata</th>
                            <th class="text-left p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-slate-200">
                            <td class="p-2">1</td>
                            <td class="p-2">PPDB-2026001</td>
                            <td class="p-2">Andi</td>
                            <td class="p-2">Kelaran</td>
                            <td class="p-2 text-yellow-400">89.00</td>
                            <td class="p-2 text-yellow-400">terverifikasi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- Afirmasi --}}
            <div class="flex flex-col gap-1 p-4 border border-slate-200 rounded-xl">
                <div class="flex items-center justify-between p-2">
                    <span class="text-slate-400 text-lg">Jalur Afirmasi</span>
                    <span class="text-slate-400 text-sm">Kuota {{ $afirmasi?->kuota ?? '-' }} | Terverifikasi
                        {{ $afirmasi?->registration->count() ?? '-' }}</span>
                </div>
                <table class="w-full text-md">
                    <thead>
                        <tr class="text-gray-500 border-b border-slate-700">
                            <th class="text-left p-2">Rank</th>
                            <th class="text-left p-2">No. Pendaftaran</th>
                            <th class="text-left p-2">Nama</th>
                            <th class="text-left p-2">Nilai Rata Rata</th>
                            <th class="text-left p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-slate-200">
                            <td class="p-2">1</td>
                            <td class="p-2">PPDB-2026001</td>
                            <td class="p-2">Andi</td>
                            <td class="p-2 text-yellow-400">89.00</td>
                            <td class="p-2 text-yellow-400">terverifikasi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
