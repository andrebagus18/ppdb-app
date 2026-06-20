<div class="p-6" data-tab="pendaftar-content">
    {{-- SEARCH & FILTER --}}
    <div>
        <form method="GET" action="" class="flex gap-3 mb-2 p-3 rounded-lg bg-white">
            <input type="text" id="search" name="search" value="{{ request('search') }}"
                placeholder="Cari nama / nomor pendaftaran..."
                class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-100">
            <select id="jalur_id" name="jalur_id"
                class="rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                <option value="">Semua Jalur</option>
                @foreach ($jalurs as $jalur)
                    <option value="{{ $jalur->id }}" @selected(request('jalur_id') == $jalur->id)>
                        {{ $jalur->nama }}
                    </option>
                @endforeach
            </select>
            <select id="status" name="status"
                class="rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                <option value="">Semua Status</option>
                <option value="menunggu_verifikasi" @selected(request('status' == 'menunggu_verifikasi'))>Menunggu Verifikasi</option>
                <option value="terverifikasi" @selected(request('status' == 'terverifikasi'))>Terverifikasi</option>
                <option value="rejected" @selected(request('status_verifikasi' == 'rejected'))>Dokumen Ditolak</option>
            </select>
            <button type="submit"
                class="bg-emerald-200 hover:bg-emerald-300 text-emerald-800 px-4 py-2 rounded-lg cursor-pointer">Cari</button>
        </form>
    </div>

    <div id="table-container" class="bg-white rounded-xl shadow-sm border border-slate-400 h-90 p-4">
        @include('partials.table-pendaftaran')
    </div>
    <div class="mt-1.5 paginator-class">
        {{ $registrations->links() }}
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
                {{-- @foreach ($registrations as $registration) --}}
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
                                        <th class="p-2">Tempat, Tanggal Lahir</th>
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
                                        <td class="p-2 uppercase" id="nama">
                                        </td>
                                        <td class="p-2" id="nik">
                                        </td>
                                        <td class="p-2 capitalize" id="tempat">
                                        </td>
                                        <td class="p-2" id="jk">
                                        </td>
                                        <td class="p-2" id="asal">
                                        </td>
                                        <td class="p-2" id="nilai">
                                        </td>
                                        <td class="p-2" id="agama">
                                        </td>
                                        <td class="p-2" id="alamat">
                                        </td>
                                        <td class="p-2" id="pos">
                                        </td>
                                        <td class="p-2" id="hp">
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
                                        <td class="p-2" id="ayah">
                                        </td>
                                        <td class="p-2" id="kayah">
                                        </td>
                                        <td class="p-2" id="ibu">
                                        </td>
                                        <td class="p-2" id="kibu">
                                        </td>
                                        <td class="p-2" id="wali">
                                        </td>
                                        <td class="p-2" id="hwali">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</div>
