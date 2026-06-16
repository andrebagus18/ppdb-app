<div class="p-6" data-tab="dashboard">
    <div class="bg-white rounded-lg p-6 flex flex-col shadow-lg">
        <span class="text-xl text-black capitalize">Halo, {{ Auth::user()->name }} 👋</span>
        <span class="text-md font-medium text-slate-400">Selamat Datang di Dashboard PPDB SMKN 45 Merdeka tahun ajaran
            2026/2027</span>
    </div>
    <div class="py-4 flex gap-4">
        {{-- profile --}}
        <div class="w-xl bg-white p-4 flex flex-col items-center">
            <div class="w-40 h-40 flex items-center rounded-full border-8 border-blue-200 bg-white overflow-hidden mb-2">
                <img src="{{ asset('/images/profile.png') }}" alt="profile">
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
                    <p class="text-lg text-black font-bold">{{ $student?->registration?->jalur->name ?? '-' }}</p>
                </div>
                <div class="flex items-center justify-between p-2">
                    <span class="text-lg font-medium text-slate-400">Status :</span>
                    <p class="text-sm italic font-medium rounded-md px-4 py-1 {{ $status['bg'] }}">
                        {{ $status['title'] ?? '-' }}</p>
                </div>
            </div>
        </div>
        <div class="max-w-2xl w-full flex flex-col gap-2 bg-white p-4">
            <div class="{{ $student ? 'bg-green-500' : 'bg-yellow-500' }} rounded-lg p-2">
                <div class="flex flex-col items-center justify-center">
                    <p class="text-white text-2xl font-medium">
                        {{ $student ? 'Selamat! Anda Sudah Terdaftar. 🎉' : 'Anda Belum Mendaftar!' }}</p>
                </div>
            </div>
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
