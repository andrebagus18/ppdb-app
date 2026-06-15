<div class="p-6" data-tab="dashboard">
    <div class="py-8 flex gap-6">
        <div class="bg-white px-12 py-10 flex flex-col items-center">
            <div class="w-40 h-40 rounded-full border-8 border-teal-600 bg-white overflow-hidden mb-2">
                <img src="{{ asset('/images/profile.png') }}" alt="profile">
            </div>
            <p class="text-md text-slate-400">{{ $student?->registration?->no_daftar ?? '-' }}</p>
            <p class="font-bold text-black text-xl uppercase">{{ Auth::user()->name }}</p>
        </div>
        <div class="flex flex-col gap-2 bg-white p-4 w-full ">
            <div class="grid grid-cols-2 gap-4">
                <div class="{{ $statusCard['bg'] }} p-4 rounded-lg flex flex-col gap-2 text-xl">
                    <div class="flex items-center text-white gap-2">
                        <i data-lucide="badge-info"></i>Status
                    </div>
                    <p class="text-md font-bold text-white">{{ $statusCard['title'] }}</p>
                </div>
                <div class="bg-blue-500 p-4 rounded-lg flex flex-col text-xl">
                    <div class="flex items-center text-white gap-2 mb-1">
                        <i data-lucide="notebook-text"></i>Catatan
                    </div>
                    @if ($catatanReject)
                        <p class="text-md text-white font-bold">Jumlah Dokumen Ditolak: {{ $catatanReject->count() }}
                        </p>
                    @else
                        <p class="text-md text-white">Belum Ada Catatan</p>
                    @endif
                </div>
            </div>
            <div class="{{ $student ? 'bg-green-500' : 'bg-yellow-500' }} rounded-lg p-2 mt-2">
                <div class="flex flex-col items-center justify-center">
                    <p class="text-white text-2xl font-medium">
                        {{ $student ? 'Selamat! Anda Sudah Terdaftar. 🎉' : 'Anda Belum Mendaftar!' }}</p>
                </div>
            </div>
            <table class="w-full flex gap-4 border border-slate-300 p-4 mt-2 rounded-lg">
                <thead>
                    <tr class="flex flex-col text-left gap-4">
                        <th>Nama</th>
                        <th>NIK/NISN</th>
                        <th>No. Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="flex flex-col gap-4">
                        <td class="uppercase font-medium">{{ $student?->nama_lengkap ?? '-' }}</td>
                        <td>{{ $student?->{'nik/nisn'} ?? '-' }}</td>
                        <td>{{ $student?->registration?->no_daftar ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
