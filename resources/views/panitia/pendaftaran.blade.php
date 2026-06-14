<div class="px-6 py-4" data-tab="pendaftar-content">
    <h1 class="text-2xl font-bold text-slate-800 mb-2">
        Daftar Pendaftaran PPDB
    </h1>
    {{-- SEARCH & FILTER --}}
    <div class="flex gap-3 mb-2 p-3 rounded-lg bg-white">
        <input type="text" placeholder="Cari nama / nomor pendaftaran..."
            class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <select class="rounded-lg border border-slate-300 px-3 py-2">
            <option>Semua Jalur</option>
            <option value="1">Jalur Reguler</option>
            <option value="2">Jalur Zonasi</option>
            <option value="3">Jalur Prestasi</option>
            <option value="4">Jalur Afirmasi</option>
        </select>
        <select class="rounded-lg border border-slate-300 px-3 py-2">
            <option>Semua Status</option>
            <option value="menunggu_verifikasi">Menunggu Verifikasi</option>
            <option value="verified">Terverifikasi</option>
            <option value="rejected">Dokumen Ditolak</option>
        </select>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-y-auto scrollbar-hide h-100 p-4">
        <table class="w-full text-md text-left">
            <thead class="bg-slate-50 text-slate-600 sticky top-0 z-10">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Nomor Pendaftaran</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">NIK/NISN</th>
                    <th class="p-4">Jalur Pendaftaran</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations as $registration)
                    @php
                        $statusColor = match ($registration->status) {
                            'terverifikasi' => 'bg-green-100 text-green-700',
                            'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
                            'ditolak' => 'bg-red-100 text-red-700',
                            default => 'bg-slate-100 text-slate-600',
                        };
                    @endphp
                    <tr class="border-t">
                        <td class="p-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="p-4 font-medium text-slate-700">
                            {{ $registration->no_daftar }}
                        </td>
                        <td class="p-4 uppercase">
                            {{ $registration->student->nama_lengkap ?? '-' }}
                        </td>
                        <td class="p-4">
                            {{ $registration->student->{'nik/nisn'} ?? '-' }}
                        </td>
                        <td class="p-4">
                            {{ $registration->jalur->nama ?? '-' }}
                        </td>
                        <td class="p-4">
                            <span class="p-3 rounded-lg text-sm font-medium {{ $statusColor }}">
                                {{ $registration->status }}
                            </span>
                        </td>
                        <td class="p-4">
                            <button onclick="openModalSiswa({{ $registration->id }})"
                                class="p-2 px-4 bg-blue-500 hover:bg-blue-600 text-white text-md-center rounded-lg cursor-pointer">
                                Preview
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-slate-500">
                            Belum ada data pendaftar
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- modal --}}
<div id="detailModalSiswa" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-white w-250 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-3">Data Pendaftar</h2>
        <button type="button" id="closeModalSiswa" class="absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <div class="flex flex-col gap-4">
            <div>
                @foreach ($registrations as $registration)
                    <div class="flex gap-4">
                        <div class="w-full">
                            <h2 class="text-xl font-bold mb-1">Biodata Siswa</h2>
                            <div
                                class="bg-white rounded-xl shadow-sm border border-slate-100 h-100 overflow-y-auto scrollbar-hide">
                                <table class="w-full flex gap-4 text-md text-left border border-slate-300">
                                    <thead class="bg-slate-50 text-slate-600 sticky top-0 z-10">
                                        <tr class="flex flex-col text-left gap-4">
                                            <th class="p-2">Nama</th>
                                            <th class="p-2">NIK/NISN</th>
                                            <th class="p-2">Tempat Tanggal Lahir</th>
                                            <th class="p-2">Jenis Kelamin</th>
                                            <th class="p-2">Asal Sekolah</th>
                                            <th class="p-2">Nilai Rata-Rata</th>
                                            <th class="p-2">Agama</th>
                                            <th class="p-2">Alamat</th>
                                            <th class="p-2">Kode Pos</th>
                                            <th class="p-2">No HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="flex flex-col gap-4">
                                            <td class="p-2 uppercase">
                                                {{ $registration->student->nama_lengkap ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->{'nik/nisn'} ?? '-' }}
                                            </td>
                                            <td class="p-2 capitalize">
                                                {{ $registration->student->tempat_lahir ?? '-' }}
                                                {{ $registration->student->tanggal_lahir ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->jenis_kelamin ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->asal_sekolah ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->nilai_rata_rata ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->agama ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->alamat ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->pos ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->no_hp ?? '-' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="w-full">
                            <h2 class="text-xl font-bold mb-1">Data Orang Tua</h2>
                            <div
                                class="bg-white rounded-xl shadow-sm border border-slate-100 h-100 overflow-y-auto scrollbar-hide">
                                <table class="w-full flex gap-4 text-md text-left border border-slate-300">
                                    <thead class="bg-slate-50 text-slate-600 sticky top-0 z-10">
                                        <tr class="flex flex-col text-left gap-4">
                                            <th class="p-2">Nama Ayah</th>
                                            <th class="p-2">Pekerjaan Ayah</th>
                                            <th class="p-2">Nama Ibu</th>
                                            <th class="p-2">Pekerjaan Ibu</th>
                                            <th class="p-2">Nama Wali</th>
                                            <th class="p-2">Hubungan Wali</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="flex flex-col gap-4">
                                            <td class="p-2">
                                                {{ $registration->student->ayah ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->kerja_ayah ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->ibu ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->kerja_ibu ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->wali ?? '-' }}
                                            </td>
                                            <td class="p-2">
                                                {{ $registration->student->hubungan_wali ?? '-' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
