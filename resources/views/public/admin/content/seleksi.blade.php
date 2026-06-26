<section id="seleksi" class="p-6">
    <div class="p-2 pt-0">
        <div class="rounded-xl px-4 py-2 mb-2 border-2 border-blue-500/40">
            <div class="flex flex-col">
                <div class="text-amber-500 text-xl flex gap-3">
                    ⚠️
                    <h3 class="font-semibold text-amber-500 mb-2">
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
                <a class="bg-blue-900/30 backdrop-blur-2xl text-blue-500 px-4 py-1.5 rounded disabled:cursor-not-allowed cursor-pointer border-b-2 border-blue-500 hover:bg-blue-900/20"
                    href="{{ route('admin.seleksi') }}">Jalankan Seleksi
                </a>
                <a class="bg-green-900/30 backdrop-blur-2xl text-green-500 px-4 py-1.5 rounded disbled:cursor-not-allowed cursor-pointer border-b-2 border-green-500 hover:bg-green-900/20"
                    href="{{ route('admin.publish-seleksi') }}">Publikasikan Hasil
                </a>
                <a class="bg-red-900/30 backdrop-blur-2xl text-red-500 px-4 py-1.5 rounded disabled:cursor-not-allowed cursor-pointer border-b-2 border-red-500 hover:bg-red-900/20"
                    href="{{ route('admin.batal-seleksi') }}">Batal Seleksi
                </a>
            </div>
        </div>


        <!-- PREVIEW TABLE -->
        <div
            class="rounded-xl border-2 border-blue-500/40 p-2 flex flex-col gap-4 overflow-y-auto scrollbar-hide h-100">
            {{-- reguler --}}
            @foreach ($jalurs as $jalur)
                <div class="flex flex-col gap-1 px-4 rounded-xl">
                    <div class="flex items-center justify-between p-2">
                        <span class="text-slate-400 text-lg">Jalur {{ $jalur->nama }}</span>
                        <span class="text-slate-400 text-sm">Kuota {{ $jalur->kuota ?? '-' }} | Terverifikasi
                            {{ $jalur->registration->count() ?? '-' }}</span>
                    </div>
                    <table class="w-full text-md">
                        <thead>
                            <tr class="text-gray-500 border-b-2 border-slate-700">
                                <th class="text-left p-2">Rank</th>
                                <th class="text-left p-2">No. Pendaftaran</th>
                                <th class="text-left p-2">Nama</th>
                                @if ($jalur->nama === 'Zonasi')
                                    <th class="text-left p-2">Kecamatan</th>
                                @endif
                                <th class="text-left p-2">Nilai Rata Rata</th>
                                <th class="text-left p-2">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-slate-400">
                            @forelse ($jalur->registration as $registration)
                                <tr @class([
                                    'border-b-2 border-green-800/30 bg-green-900/30 text-white' =>
                                        session('seleksiRun') && $loop->iteration <= $jalur->kuota,
                                ])>
                                    <td class="p-2">{{ $loop->iteration }}</td>
                                    <td class="p-2">{{ $registration->no_daftar ?? '-' }}</td>
                                    <td class="p-2">{{ $registration->student->nama_lengkap }}</td>
                                    @if ($jalur->nama === 'Zonasi')
                                        <td class="p-2">
                                            {{ str_contains($registration->student->alamat, 'Kanantok') ? 'Kanantok' : $registration->student->alamat }}
                                        </td>
                                    @endif
                                    <td class="p-2">{{ $registration->student->nilai_rata_rata }}</td>
                                    <td class="p-2"><span
                                            class="px-2 py-1 rounded-lg text-sm {{ statusSiswa($registration)['bg'] }}">{{ statusSiswa($registration)['title'] }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-6 text-center text-slate-500">
                                        Belum ada data
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <hr class="h-1 bg-slate-400">
                </div>
            @endforeach
        </div>
    </div>
</section>
