<div class="p-6" id="verifikasi-content">
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-y-auto scrollbar-hide h-115 p-4">
        <table class="w-full text-md text-left">
            <thead class="bg-slate-50 text-slate-600 sticky top-0 z-10">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Nomor Pendaftaran</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations as $registration)
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
                            <span class="p-3 rounded-lg text-sm font-medium {{ statusSiswa($registration)['bg'] }}">
                                {{ statusSiswa($registration)['title'] }}
                            </span>
                        </td>
                        <td class="p-4">
                            <button onclick="openModalDoc({{ $registration->id }})"
                                class="p-2 px-4 bg-blue-500 hover:bg-blue-600 text-white text-md-center rounded-lg cursor-pointer">
                                Verifikasi Dokumen
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
<div id="detailModalDoc" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-white w-250 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-2">Data Pendaftar</h2>
        <button type="button" id="closeModalDoc" class="absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <div class="flex flex-col gap-4">
            <div>
                <div class="flex flex-col justify-center gap-1">
                    <div class="bg-slate-100/40 border border-slate-200 rounded-xl p-2">
                        <div class="flex gap-2">
                            <p><b>Nama :</b> </p>
                            <p class="uppercase" id="name"></p>
                        </div>
                        <div class="flex gap-2">
                            <p><b>No Pendaftaran :</b></p>
                            <p id="nod"></p>
                        </div>
                    </div>

                    <div class="w-full">
                        <h3 class="mb-1 text-xl font-bold">Dokumen</h3>
                        <div
                            class=" bg-white rounded-xl shadow-sm border border-slate-200 h-100 overflow-y-auto scrollbar-hide">
                            <table class="w-full text-md text-left">
                                <thead class="bg-slate-50 text-slate-600 sticky top-0 z-10">
                                    <tr class="border-b">
                                        <th class="p-4 pb-2">Nama</th>
                                        <th class="p-4 pb-2">Status</th>
                                        <th class="p-4 pb-2">Catatan</th>
                                        <th class="p-4 pb-2 text-center">aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="contentBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
