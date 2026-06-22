<div class="p-6" data-tab="dashboard">
    <div class="p-2 pt-0 flex gap-6">
        <div class="flex flex-col gap-2 bg-white p-4 pb-2 w-full">
            {{-- CARD  --}}
            <div class="grid grid-cols-5 gap-4">
                <div class="bg-blue-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center text-white font-bold gap-2">
                        <i data-lucide="users" class="w-8 h-8"></i>Total Pendaftar
                    </div>
                    <p class="text-3xl font-bold text-white">{{ $stats['total'] }}</p>
                </div>
                <div class="bg-yellow-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center text-white font-bold gap-2">
                        <i data-lucide="shield-alert" class="w-10 h-10"></i>Menunggu Verifikasi
                    </div>
                    <p class="text-3xl font-bold text-white">{{ $stats['pending'] }}</p>
                </div>
                <div class="bg-green-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center text-white font-bold gap-2">
                        <i data-lucide="shield-check" class="w-8 h-8"></i>Terverifikasi
                    </div>
                    <p class="text-3xl font-bold text-white">{{ $stats['terverifikasi'] }}</p>
                </div>
                <div class="bg-green-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center text-white font-bold gap-2">
                        <i data-lucide="badge-check" class="w-7 h-7"></i>Diterima
                    </div>
                    <p class="text-3xl font-bold text-white">{{ $stats['verified'] }}</p>
                </div>
                <div class="bg-red-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center text-white font-bold gap-2">
                        <i data-lucide="badge-x" class="w-7 h-7"></i>Ditolak
                    </div>
                    <p class="text-3xl font-bold text-white">{{ $stats['rejected'] }}</p>
                </div>
            </div>
            {{-- GRAFIK DAN RECENT --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-2 h-80">
                <div
                    class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 p-6 overflow-y-auto scrollbar-hide ">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-slate-800">
                            Statistik Pendaftaran
                        </h2>
                    </div>
                    <div class="h-[350px] flex items-center justify-center text-slate-400">
                        {{-- grafik --}}
                        <canvas id="grafik"></canvas>
                        @push('scripts')
                            <script>
                                new Chart(document.getElementById('grafik'), {
                                    type: 'line',
                                    data: {
                                        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                                        datasets: [{
                                            // label: 'Pendaftaran',
                                            data: [10, 20, 15, 30, 25, 45, 50]
                                        }]
                                    }
                                });
                            </script>
                        @endpush
                    </div>
                </div>

                {{-- Pendaftaran Terbaru --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-4 overflow-hidden">
                    <div class="flex items-center justify-between mb-4 border-b border-slate-300">
                        <h2 class="text-lg font-semibold text-slate-800">
                            Terbaru
                        </h2>
                        <a href="{{ route('admin.seleksi') }}"
                            class="text-sm text-emerald-600 hover:text-emerald-700">
                            Lihat Semua
                        </a>
                    </div>
                    <div class="space-y-4 overflow-y-auto scrollbar-hide h-70">
                        @foreach ($latestRegistrations as $registration)
                            <div class="flex items-start justify-between border-b border-slate-100">
                                <div>
                                    <div class="w-35 h-8 overflow-x-auto scrollbar-hide whitespace-nowrap">
                                        <h3 class="font-medium text-slate-800 capitalize">
                                            {{ $registration->student->nama_lengkap }}
                                        </h3>
                                    </div>
                                    <p class="text-sm text-slate-500">
                                        {{ $registration->jalur->nama }}
                                    </p>
                                    <p class="text-xs text-slate-400">
                                        {{ $registration->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <span
                                    class="px-2 py-1 rounded-full text-xs font-medium wrap {{ statusSiswa($registration)['bg'] }}">
                                    {{ statusSiswa($registration)['title'] }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
