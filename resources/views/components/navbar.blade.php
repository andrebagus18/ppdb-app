<nav class="fixed top-0 left-0 right-0 z-50 px-14 bg-[#eeeded]/90 border border-b-slate-300 shadow-xl">
    <div class="flex items-center justify-between py-2">
        <div class="flex flex-col">
            <h2 class="text-2xl text-black font-medium">SMKN 45 Merdeka</h2>
            <span class="text-teal-700 text-xs">PENERIMAAN PESERTA DIDIK BARU</span>
        </div>
        <div class="flex gap-5 justify-between items-center">
            <a href="#home" class="nav-link font-medium hover:text-primary">Home</a>
            <a href="#jalur" class="nav-link font-medium hover:text-primary">Jalur</a>
            <a href="#jadwal" class="nav-link font-medium hover:text-primary">Jadwal</a>
            <a href="#pengumuman" class="nav-link font-medium hover:text-primary">Pengumuman</a>
            <a href="#faq" class="nav-link font-medium hover:text-primary">FAQ</a>
        </div>
        <div class="flex gap-4">
            @auth
                <div class="flex gap-3 items-center">
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="cursor-pointer p-2 text-slate-600 text-lg rounded-lg hover:text-black hover:ring-2 hover:ring-teal-600">
                            <span>Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('siswa.dashboard') }}"
                            class="cursor-pointer p-2 text-slate-600 text-lg rounded-lg hover:text-black hover:ring-2 hover:ring-teal-600">
                            <span>Dashboard</span>
                        </a>
                    @endif
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex gap-2 text-lg px-4 py-2 bg-red-700 hover:bg-red-800 text-white rounded-lg cursor-pointer">
                            <i data-lucide="log-out"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
