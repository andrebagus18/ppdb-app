<div class="p-6" data-tab="dashboard">
    <div class="p-2 pt-0 flex gap-6">
        <div class="flex flex-col gap-2 p-4 pb-2 w-full">
            {{-- CARD  --}}
            <div class="grid grid-cols-5 gap-4">
                <div
                    class="bg-indigo-900/40 backdrop-blur-2xl text-indigo-500 border-2 border-indigo-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center font-bold gap-2">
                        <i data-lucide="users" class="w-8 h-8"></i>Total Pendaftar
                    </div>
                    <p class="text-3xl font-bold">{{ $stats['total'] }}</p>
                </div>
                <div
                    class="bg-yellow-900/40 backdrop-blur-2xl text-yellow-500 border-2 border-yellow-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center font-bold gap-2">
                        <i data-lucide="shield-alert" class="w-10 h-10"></i>Menunggu Verifikasi
                    </div>
                    <p class="text-3xl font-bold">{{ $stats['pending'] }}</p>
                </div>
                <div
                    class="bg-blue-900/40 backdrop-blur-2xl text-blue-500 border-2 border-blue-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center font-bold gap-2">
                        <i data-lucide="shield-check" class="w-8 h-8"></i>Terverifikasi
                    </div>
                    <p class="text-3xl font-bold">{{ $stats['terverifikasi'] }}</p>
                </div>
                <div
                    class="bg-green-900/40 backdrop-blur-2xl text-green-500 border-2 border-green-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center font-bold gap-2">
                        <i data-lucide="badge-check" class="w-7 h-7"></i>Diterima
                    </div>
                    <p class="text-3xl font-bold">{{ $stats['verified'] }}</p>
                </div>
                <div
                    class="bg-red-900/40 backdrop-blur-2xl text-red-500 border-2 border-red-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center font-bold gap-2">
                        <i data-lucide="badge-x" class="w-7 h-7"></i>Ditolak
                    </div>
                    <p class="text-3xl font-bold">{{ $stats['rejected'] }}</p>
                </div>
            </div>
            {{-- GRAFIK DAN RECENT --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-2 h-110">
                <div
                    class="lg:col-span-2 bg-slate-700/20 backdrop-blur-2xl rounded-2xl shadow-sm border border-slate-900 p-6 overflow-y-auto scrollbar-hide ">
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-lg font-semibold text-white">
                            Statistik Pendaftaran
                        </h2>
                    </div>
                    <div class="h-[350px] flex items-center justify-center text-slate-400">
                        {{-- grafik --}}
                        <canvas id="grafik"></canvas>
                        @push('scripts')
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const canvasElement = document.getElementById("grafik");
                                    if (!canvasElement) return;
                                    const chartCtx = canvasElement.getContext("2d");
                                    const grafik = @json($pendaftar ?? []);
                                    // 1. WARNA GRADASI
                                    const gradient = chartCtx.createLinearGradient(0, 0, 0, 300);
                                    gradient.addColorStop(0, "rgba(56, 189, 248, 0.4)");
                                    gradient.addColorStop(1, "rgba(56, 189, 248, 0.1)");

                                    new Chart(chartCtx, {
                                        type: "line",
                                        data: {
                                            labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
                                            datasets: [{
                                                data: grafik,
                                                borderColor: "#38bdf8",
                                                borderWidth: 3,
                                                fill: true,
                                                backgroundColor: gradient,
                                                pointBackgroundColor: "#ffffff",
                                                pointBorderColor: "#38bdf8",
                                                pointBorderWidth: 3,
                                                pointRadius: 6,
                                                pointHoverRadius: 8,
                                                tension: 0.35 // garis melengkung
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            plugins: {
                                                legend: {
                                                    display: false
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    min: 0,
                                                    max: 210,
                                                    ticks: {
                                                        stepSize: 20,
                                                        color: "#94a3b8"
                                                    },
                                                    grid: {
                                                        color: "#f1f5f9"
                                                    }
                                                },
                                                x: {
                                                    ticks: {
                                                        color: "#94a3b8"
                                                    },
                                                    grid: {
                                                        display: true
                                                    }
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>
                        @endpush
                    </div>
                </div>

                {{-- Pendaftaran Terbaru --}}
                <div
                    class="bg-slate-700/20 backdrop-blur-2xl rounded-2xl shadow-sm border border-slate-900 p-4 overflow-hidden">
                    <div class="flex items-center justify-between mb-4 border-b border-slate-900">
                        <h2 class="text-lg font-semibold text-white">
                            Terbaru
                        </h2>
                        <a href="{{ route('admin.seleksi') }}" class="text-sm text-slate-400 hover:text-emerald-700">
                            Lihat Semua
                        </a>
                    </div>
                    <div class="space-y-4 overflow-y-auto scrollbar-hide h-100">
                        @foreach ($latestRegistrations as $registration)
                            <div
                                class="flex items-start justify-between border-b border-slate-100 hover:bg-slate-800/30">
                                <div>
                                    <div class="w-35 h-8 overflow-x-auto scrollbar-hide whitespace-nowrap">
                                        <h3 class="font-medium text-white capitalize">
                                            {{ $registration->student->nama_lengkap }}
                                        </h3>
                                    </div>
                                    <p class="text-sm text-slate-400">
                                        {{ $registration->jalur->nama }}
                                    </p>
                                    <p class="text-xs text-slate-400 mb-1">
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
