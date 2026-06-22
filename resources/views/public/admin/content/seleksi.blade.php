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
                <button class="bg-blue-600 px-4 py-1.5 rounded disabled:opacity-50 cursor-pointer">
                    <a href="{{ route('admin.seleksi') }}">Jalankan Seleksi</a>
                </button>
                <button class="bg-emerald-600 px-4 py-1.5 rounded cursor-pointer">
                    <a href="{{ route('admin.publish-seleksi') }}">Publikasikan Hasil</a>
                </button>
                <button class="bg-red-600 px-4 py-1.5 rounded cursor-pointer">
                    <a href="{{ route('admin.batal-seleksi') }}">Batal Seleksi</a>
                </button>
            </div>
        </div>


        <!-- PREVIEW TABLE -->
        <div class="bg-white rounded-xl p-2 flex flex-col gap-4 overflow-y-auto scrollbar-hide h-80">
            {{-- reguler --}}
            @foreach ($jalurs as $jalur)
                
            <div class="flex flex-col gap-1 p-4 border border-slate-200 rounded-xl">
                <div class="flex items-center justify-between p-2">
                    <span class="text-slate-400 text-lg">Jalur {{ $jalur->nama }}</span>
                    <span class="text-slate-400 text-sm">Kuota {{ $jalur->kuota ?? '-' }} | Terverifikasi
                        {{ $jalur->registration->count() ?? '-' }}</span>
                </div>
                <table class="w-full text-md">
                    <thead>
                        <tr class="text-gray-500 border-b border-slate-700">
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
                    <tbody>
                        @forelse ($jalur->registration as $registration)
                            <tr @class(['border-b-2 border-green-800 bg-green-100' => session('seleksiRun') && $loop->iteration <= $jalur->kuota])>
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $registration->no_daftar ?? '-' }}</td>
                                <td class="p-2">{{ $registration->student->nama_lengkap }}</td>
                                @if ($jalur->nama === 'Zonasi')
                                <td class="p-2">{{ str_contains($registration->student->alamat, 'Kanantok') ? 'Kanantok' : $registration->student->alamat }}</td>
                                @endif
                                <td class="p-2">{{ $registration->student->nilai_rata_rata }}</td>
                                <td class="p-2"><span class="px-2 py-1 rounded-lg text-sm {{ statusSiswa($registration)['bg'] }}">{{ statusSiswa($registration)['title'] }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-slate-500">
                                    Belum ada data pengumuman
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @endforeach

            {{-- Prestasi --}}
            {{-- <div class="flex flex-col gap-1 p-4 border border-slate-200 rounded-xl">
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
                        @forelse ($registrations as $registration)
                            <tr class="border-b border-slate-200">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $registration->no_daftar ?? '-' }}</td>
                                <td class="p-2">{{ $registration->student->nama_lengkap }}</td>
                                <td class="p-2">{{ $registration->student->nilai_rata_rata }}</td>
                                <td class="p-2"><span class="px-2 py-1 rounded-lg text-sm {{ statusSiswa($registration)['bg'] }}">{{ statusSiswa($registration)['title'] }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-slate-500">
                                    Belum ada data pengumuman
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> --}}
            {{-- Zonasi --}}
            {{-- <div class="flex flex-col gap-1 p-4 border border-slate-200 rounded-xl">
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
                        @forelse ($registrations as $registration)
                            <tr class="border-b border-slate-200">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $registration->no_daftar ?? '-' }}</td>
                                <td class="p-2">{{ $registration->student->nama_lengkap }}</td>
                                <td class="p-2">{{ $registration->student->alamat }}</td>
                                <td class="p-2">{{ $registration->student->nilai_rata_rata }}</td>
                                <td class="p-2"><span class="px-2 py-1 rounded-lg text-sm {{ statusSiswa($registration)['bg'] }}">{{ statusSiswa($registration)['title'] }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-slate-500">
                                    Belum ada data pengumuman
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> --}}
            {{-- Afirmasi --}}
            {{-- <div class="flex flex-col gap-1 p-4 border border-slate-200 rounded-xl">
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
                        @forelse ($registrations as $registration)
                            <tr class="border-b border-slate-200">
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $registration->no_daftar ?? '-' }}</td>
                                <td class="p-2">{{ $registration->student->nama_lengkap }}</td>
                                <td class="p-2">{{ $registration->student->nilai_rata_rata }}</td>
                                <td class="p-2"><span class="px-2 py-1 rounded-lg text-sm {{ statusSiswa($registration)['bg'] }}">{{ statusSiswa($registration)['title'] }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-slate-500">
                                    Belum ada data pengumuman
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>
</section>
