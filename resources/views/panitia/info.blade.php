<div class="p-6 pt-4" data-tab="dashboard">
    <div class="p-2 pt-0 flex gap-6">
        <div class="flex flex-col gap-2 bg-white p-4 w-full">
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-blue-500 p-4 rounded-lg flex flex-col gap-2 text-xl">
                    <div class="flex h-15 items-center text-white font-bold gap-2">
                        <i data-lucide="users" class="w-10 h-10"></i>Total Pendaftar
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $stats['total'] }}</p>
                </div>
                <div class="bg-yellow-500 p-4 rounded-lg flex flex-col gap-2 text-xl">
                    <div class="flex h-15 items-center text-white font-bold gap-2">
                        <i data-lucide="shield-alert" class="w-15 h-15"></i>Menunggu Verifikasi
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $stats['pending'] }}</p>
                </div>
                <div class="bg-green-500 p-4 rounded-lg flex flex-col gap-2 text-xl">
                    <div class="flex h-15 items-center text-white font-bold gap-2">
                        <i data-lucide="shield-check" class="w-10 h-10"></i>Terverifikasi
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $stats['verified'] }}</p>
                </div>
                <div class="bg-red-500 p-4 rounded-lg flex flex-col gap-2 text-xl">
                    <div class="flex h-15 items-center text-white font-bold gap-2">
                        <i data-lucide="file-x-corner" class="w-10 h-10"></i>Dokumen Ditolak
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $stats['rejected'] }}</p>
                </div>
            </div>
            {{-- TABLE --}}

        </div>
    </div>
</div>
