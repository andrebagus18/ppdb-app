<div class="p-6" data-tab="dashboard">
    <div class="p-2 pt-0 flex gap-6">
        <div class="flex flex-col gap-2 bg-white p-4 pb-2 w-full">
            {{-- CARD  --}}
            <div class="grid grid-cols-4 gap-4">
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
                <div class="bg-red-500 p-4 rounded-lg flex flex-col gap-2 text-lg shadow-lg">
                    <div class="flex h-10 items-center text-white font-bold gap-2">
                        <i data-lucide="file-x-corner" class="w-7 h-7"></i>Dokumen Ditolak
                    </div>
                    <p class="text-3xl font-bold text-white">{{ $stats['rejected'] }}</p>
                </div>
            </div>
            {{-- GRAFIK DAN RECENT --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-2 h-110">
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-slate-800">
                            Statistik Status Siswa
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

                                    // WARNA GRADASI
                                    const gradient = chartCtx.createLinearGradient(0, 0, 0, 300);
                                    gradient.addColorStop(0, "rgba(16, 185, 129, 0.4)");
                                    gradient.addColorStop(1, "rgba(16, 185, 129, 0.0)");
                                    const data = {
                                        labels: [
                                            "Total",
                                            "Menunggu Verifikasi",
                                            "Terverifikasi",
                                            "Dokumen Ditolak",
                                        ],
                                        datasets: [{
                                            data: [
                                                {{ $stats['total'] }},
                                                {{ $stats['pending'] }},
                                                {{ $stats['terverifikasi'] }},
                                                {{ $stats['rejected'] }},
                                            ],
                                            borderColor: "#10b981",
                                            borderWidth: 3,
                                            fill: true,
                                            backgroundColor: gradient,
                                            pointBackgroundColor: "#ffffff",
                                            pointBorderColor: "#10b981",
                                            pointBorderWidth: 3,
                                            pointRadius: 6,
                                            pointHoverRadius: 8,
                                            tension: 0.35
                                        }],
                                    };

                                    new Chart(chartCtx, {
                                        type: "line",
                                        data: data,
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            plugins: {
                                                legend: {
                                                    display: false,
                                                },
                                                title: {
                                                    display: false,
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    min: 0,
                                                    max: 210,
                                                    ticks: {
                                                        stepSize: 1,
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
                                        },
                                    });
                                });
                            </script>
                        @endpush
                    </div>
                </div>

                {{-- Pendaftaran Terbaru --}}
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-4">
                    <div class="flex items-center justify-between mb-3 border-b border-slate-300">
                        <h2 class="text-lg font-semibold text-slate-800">
                            Terbaru
                        </h2>
                        <a href="{{ route('panitia.registrations') }}"
                            class="text-sm text-emerald-600 hover:text-emerald-700">
                            Lihat Semua
                        </a>
                    </div>
                    <div class="space-y-2 overflow-y-auto scrollbar-hide h-90">
                        @foreach ($latestRegistrations as $registration)
                            <div class="flex items-start justify-between border-b border-slate-300 hover:bg-slate-100">
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
