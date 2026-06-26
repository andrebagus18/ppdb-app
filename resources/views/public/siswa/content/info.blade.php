@php
    $active = 'bg-blue-600 text-white';
    $inactive = 'bg-gray-200 text-gray-500';

    $activeLine = 'bg-blue-600';
    $inactiveLine = 'bg-gray-200';
@endphp

<div class="p-6" data-tab="dashboard">
    <div class="bg-white rounded-lg p-6 flex flex-col shadow-lg relative">
        <div class="{{ $student ? 'bg-green-500' : 'bg-yellow-500' }} rounded-lg p-2 absolute top-2 right-2 shadow-lg">
            <div class="flex flex-col items-center justify-center">
                <p class="text-white text-lg font-medium">
                    {{ $student ? 'Anda Sudah Terdaftar!' : 'Anda Belum Mendaftar!' }}</p>
            </div>
        </div>
        <span class="text-xl text-black capitalize font-semibold">Halo, {{ Auth::user()->name }} 👋</span>
        <span class="text-md font-medium text-slate-500">Selamat Datang di Dashboard PPDB SMKN 45 Merdeka tahun ajaran
            2026/2027</span>
    </div>

    <div class="bg-white rounded-xl p-4 mt-4 shadow-lg">
        <h2 class="text-lg font-semibold mb-2">
            Progress Pendaftaran
        </h2>
        <div class="overflow-x-auto">
            <div class="flex items-start w-full">
                {{-- Siswa Baru --}}
                <div class="flex flex-col items-center flex-1 relative">
                    <div
                        class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold z-1">
                        1
                    </div>
                    <span class="mt-3 text-sm font-medium text-center">
                        Calon Siswa
                    </span>
                    <div class="absolute top-6 left-1/2 w-full h-1 bg-blue-500"></div>
                </div>
                {{-- Formulir --}}
                <div class="flex flex-col items-center flex-1 relative">
                    <div
                        class="{{ $step >= 2 ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-500' }} w-12 h-12 rounded-full flex items-center justify-center font-semibold z-1">
                        2
                    </div>
                    <span class="mt-3 text-sm font-medium text-center">
                        Formulir Pendaftaran
                    </span>
                    <div class="absolute top-6 left-1/2 w-full h-1 {{ $registration ? 'bg-blue-600' : 'bg-gray-200' }}">
                    </div>
                </div>
                {{-- Dokumen --}}
                <div class="flex flex-col items-center flex-1 relative">
                    <div
                        class="w-12 h-12 rounded-full {{ $documents->isNotEmpty() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-500' }} flex items-center justify-center font-semibold z-1">
                        3
                    </div>
                    <span class="mt-3 text-sm font-medium text-center">
                        Dokumen
                    </span>
                    <div
                        class="absolute top-6 left-1/2 w-full h-1
                    {{ $documents->isNotEmpty() ? 'bg-blue-500' : 'bg-gray-200' }}">
                    </div>
                </div>
                {{-- Verifikasi --}}
                <div class="flex flex-col items-center flex-1 relative">
                    <div
                        class="w-12 h-12 rounded-full
                    {{ $registration?->status === 'terverifikasi' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-500' }}
                    flex items-center justify-center font-semibold z-1">
                        4
                    </div>
                    <span class="mt-3 text-sm font-medium text-center">
                        Verifikasi
                    </span>
                    <div
                        class="absolute top-6 left-1/2 w-full h-1
                    {{ $registration?->status === 'terverifikasi' ? 'bg-blue-500' : 'bg-gray-200' }}">
                    </div>
                </div>
                {{-- Hasil --}}
                <div class="flex flex-col items-center flex-1">
                    <div
                        class="w-12 h-12 rounded-full
                    {{ $step >= 5 ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-500' }}
                    flex items-center justify-center font-semibold z-1">
                        5
                    </div>
                    <span class="mt-3 text-sm font-medium text-center">
                        Hasil Seleksi
                    </span>
                </div>
            </div>
        </div>
        <div class="flex flex-col p-2 mt-4">
            <span class="text-black font-bold text-lg">Status saat ini:</span>
            @if ($step === 5)
                @if ($registration?->hasil_seleksi === 'diterima')
                    <div class="p-4 bg-green-200 text-green-800 font-bold rounded-lg">
                        <span class="text-lg">Selamat! Anda Diterima 🎉</span>
                    </div>
                @elseif ($registration?->hasil_seleksi === 'tidak_diterima')
                    <div class="p-4 bg-red-200 text-red-800 font-bold rounded-lg">
                        <span class="text-lg">Maaf! Anda Ditolak.</span>
                    </div>
                @endif
            @else
                <span class="text-slate-500 font-medium text-lg">{{ $process['desc'] }}</span>
            @endif
        </div>
    </div>

    <div class="py-4 flex gap-4">
        {{-- profile --}}
        <div class="w-xl bg-white p-4 flex flex-col items-center">
            <div class="flex items-center rounded-full border-4 border-blue-200 bg-white overflow-hidden mb-2">
                <img src="{{ $photo->cloudinary_url ?? asset('images/profile.png') }}" alt="profile"
                    class="object-cover w-20 h-20">
            </div>
            <div class="w-full">
                <div class="flex items-center justify-between p-2">
                    <span class="text-lg font-medium text-slate-400">Nama :</span>
                    <p class="font-bold text-black text-lg uppercase">{{ Auth::user()->name }}</p>
                </div>
                <div class="flex items-center justify-between p-2">
                    <span class="text-lg font-medium text-slate-400">No Pendaftaran :</span>
                    <p class="text-lg text-black font-bold">{{ $student?->registration?->no_daftar ?? '-' }}</p>
                </div>
                <div class="flex items-center justify-between p-2">
                    <span class="text-lg font-medium text-slate-400">Jalur Pendaftaran :</span>
                    <p class="text-lg text-black font-bold">{{ $student?->registration?->jalur->nama ?? '-' }}</p>
                </div>
            </div>
        </div>
        <div class="max-w-2xl w-full flex flex-col gap-2 bg-white p-4">
            {{-- card document --}}
            <div class="bg-white rounded-xl mt-2 shadow-lg grid grid-cols-2 gap-4">
                <div class="w-full border border-slate-200 rounded-lg p-6 shadow-md">
                    <span class="text-xl text-slate-400 mr-4">Dokumen</span>
                    <p class="text-slate-500 font-bold text-5xl mt-4">{{ $documents->count() }}</p>
                </div>
                <div class="w-full border border-slate-200 rounded-lg p-6 shadow-md">
                    <span class="text-xl text-slate-400 mr-4">Pending</span>
                    <p class="text-slate-500 font-bold text-5xl mt-4">
                        {{ $documents->where('status_verifikasi', 'pending')->count() }}</p>
                </div>
                <div class="w-full border border-slate-200 rounded-lg p-6 shadow-md">
                    <span class="text-xl text-slate-400 mr-4">Diterima</span>
                    <p class="text-slate-500 font-bold text-5xl mt-4">
                        {{ $documents->where('status_verifikasi', 'verified')->count() }}</p>
                </div>
                <div class="w-full border border-slate-200 rounded-lg p-6 shadow-md">
                    <span class="text-xl text-slate-400 mr-4">Ditolak</span>
                    <p class="text-slate-500 font-bold text-5xl mt-4">
                        {{ $documents->where('status_verifikasi', 'rejected')->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
