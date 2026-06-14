<div class="px-6 py-4" data-tab="verifikasi-content">
    <h1 class="text-2xl font-bold text-slate-800 mb-2">
        Verifikasi Dokumen Peserta PPDB
    </h1>
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
                            <span class="p-3 rounded-lg text-sm font-medium {{ $statusColor }}">
                                {{ $registration->status }}
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
                @foreach ($registrations as $registration)
                    <div class="flex flex-col justify-center gap-1">
                        <div class="bg-slate-100/40 border border-slate-200 rounded-xl p-2">
                            <div class="flex gap-2">
                                <p><b>Nama :</b> </p>
                                <p class="uppercase">{{ $registration->student->nama_lengkap }}</p>
                            </div>
                            <div class="flex gap-2">
                                <p><b>No Pendaftaran :</b></p>
                                <p> {{ $registration->no_daftar }}</p>
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
                                    <tbody>
                                        @foreach ($registration->documents as $doc)
                                            @php
                                                $statusColor = match ($doc->status) {
                                                    'terverifikasi' => 'bg-green-100 text-green-700',
                                                    'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
                                                    'ditolak' => 'bg-red-100 text-red-700',
                                                    default => 'bg-slate-100 text-slate-600',
                                                };
                                                $namaDokumen = match ($doc->jenis_document) {
                                                    'foto' => 'Foto',
                                                    'kk' => 'Kartu Keluarga',
                                                    'akta' => 'Akta Lahir',
                                                    'ijazah' => 'Ijazah Terakhir',
                                                    'surat_jalur' => 'Surat Jalur',
                                                };
                                            @endphp
                                            <tr class="border-t">
                                                <td class="p-4">
                                                    {{ $namaDokumen }}
                                                </td>
                                                <td class="p-4 font-medium text-slate-700">
                                                    {{ $doc->status_verifikasi }}
                                                </td>
                                                <td class="p-4">
                                                    {{ $doc->catatan ?? '-' }}
                                                </td>
                                                <td class="p-4">
                                                    <div class="flex gap-2 justify-between">
                                                        <a href="{{ $doc->cloudinary_url }}" target="_blank"
                                                            class="bg-blue-600 text-sm text-center text-white px-8 py-2 rounded-lg cursor-pointer">
                                                            View
                                                        </a>
                                                        {{-- APPROVE --}}
                                                        <form method="POST"
                                                            action="{{ route('panitia.approve', $doc) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button
                                                                class="bg-green-600 text-sm text-center text-white px-6 py-2 rounded-lg cursor-pointer">
                                                                Approve
                                                            </button>
                                                        </form>
                                                        {{-- REJECT --}}
                                                        <form method="POST"
                                                            action="{{ route('panitia.reject', $doc) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button
                                                                class="bg-red-500 text-sm text-white px-6 py-2 mb-1 rounded-lg cursor-pointer">
                                                                Reject
                                                            </button>
                                                            <input name="catatan" placeholder="Alasan Ditolak"
                                                                class="border rounded-lg text-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
