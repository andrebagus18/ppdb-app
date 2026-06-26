{{-- siswa aside --}}
@if (auth()->user()->role === 'siswa')
    <aside class="w-64 bg-blue-700 p-4 flex flex-col justify-between">
        <div>
            <div class="w-full p-4 flex gap-3 items-center border-b-2 border-slate-300">
                <div class="w-20 h-20 rounded-full bg-white overflow-hidden mb-2">
                    <img src="{{ asset('/images/logo.png') }}" alt="logo">
                </div>
                <h2 class="font-bold text-white text-xl mb-3">
                    PPDB<br>SMKN 45<br>MERDEKA
                </h2>
            </div>
            <nav class="space-y-1 pt-4">
                <a href="{{ route('siswa.dashboard') }}" data-target="dashboard-content"
                    class="{{ request()->routeIs('siswa.dashboard') ? 'bg-blue-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-white hover:bg-blue-600">
                    <i data-lucide="chart-no-axes-combined"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('siswa.formulir') }}" data-target="formulir-content"
                    class="{{ request()->routeIs('siswa.formulir') ? 'bg-blue-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-white hover:bg-blue-600">
                    <i data-lucide="form"></i>
                    <span>Data Formulir</span>
                </a>
                <a href="{{ route('siswa.document') }}" data-target="upload-berkas-content"
                    class="{{ request()->routeIs('siswa.document') ? 'bg-blue-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-white hover:bg-blue-600">
                    <i data-lucide="upload"></i>
                    <span>Upload Dokumen</span>
                </a>
                <a href="{{ route('siswa.pengumuman') }}" data-target="pengumuman-content"
                    class="{{ request()->routeIs('siswa.pengumuman') ? 'bg-blue-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-white hover:bg-blue-600">
                    <i data-lucide="info"></i>
                    <span>Pengumuman</span>
                </a>
            </nav>
        </div>
        <div class="space-y-1 mb-4">
            <a href="{{ route('siswa.ppdb') }}"
                class="cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-white hover:bg-blue-500">
                <i data-lucide="home"></i>
                <span>Halaman Utama</span>
            </a>
            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex gap-3 text-md p-2 hover:bg-blue-500 hover:text-white text-slate-300 rounded cursor-pointer">
                    <i data-lucide="log-out"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- panitia aside --}}
@elseif (auth()->user()->role === 'panitia')
    <aside class="w-64 bg-emerald-900 p-4 flex flex-col justify-between">
        <div>
            <div class="w-full p-4 flex flex-col items-center border-b-2 border-slate-300">
                <div class="w-20 h-20 rounded-full bg-white overflow-hidden mb-2">
                    <img src="{{ asset('/images/logo.png') }}" alt="logo">
                </div>
                <p class="font-bold text-white text-xl uppercase">{{ Auth::user()->name }}</p>
            </div>
            <nav class="space-y-1 pt-4">
                <a href="{{ route('panitia.dashboard') }}"
                    class="{{ request()->routeIs('panitia.dashboard') ? 'bg-emerald-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-200 text-md rounded hover:text-black hover:bg-emerald-500">
                    <i data-lucide="chart-no-axes-combined"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('panitia.registrations') }}"
                    class="{{ request()->routeIs('panitia.registrations') ? 'bg-emerald-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-200 text-md rounded hover:text-black hover:bg-emerald-500">
                    <i data-lucide="form"></i>
                    <span>Daftar Pendaftaran</span>
                </a>
                <a href="{{ route('panitia.verifikasi') }}"
                    class="{{ request()->routeIs('panitia.verifikasi') ? 'bg-emerald-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-200 text-md rounded hover:text-black hover:bg-emerald-500">
                    <i data-lucide="upload"></i>
                    <span>Verifikasi Dokumen</span>
                </a>
            </nav>
        </div>
        <div class="space-y-1 mb-4">
            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex gap-3 text-md p-2 hover:bg-emerald-500 hover:text-white text-slate-300 rounded cursor-pointer">
                    <i data-lucide="log-out"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- admin aside --}}
@elseif (auth()->user()->role === 'admin')
    <aside class="w-64 bg-slate-900 p-4 flex flex-col justify-between">
        <div>
            <div class="w-full p-4 flex flex-col items-center border-b-2 border-slate-300">
                <div class="w-20 h-20 rounded-full bg-white overflow-hidden mb-2">
                    <img src="{{ asset('/images/logo.png') }}" alt="logo">
                </div>
                <p class="font-bold text-white text-xl uppercase">{{ Auth::user()->name }}</p>
            </div>
            <nav class="space-y-1 pt-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'bg-blue-500/20 backdrop-blur-2xl border-r-4 border-blue-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-black hover:bg-blue-500/20">
                    <i data-lucide="chart-no-axes-combined"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.seleksi') }}"
                    class="{{ request()->routeIs('admin.seleksi') ? 'bg-blue-500/20 backdrop-blur-2xl border-r-4 border-blue-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-black hover:bg-blue-500/20">
                    <i data-lucide="square-mouse-pointer"></i>
                    <span>Proses Seleksi</span>
                </a>
                <a href="{{ route('admin.announcement') }}"
                    class="{{ request()->routeIs('admin.announcement') ? 'bg-blue-500/20 backdrop-blur-2xl border-r-4 border-blue-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-black hover:bg-blue-500/20">
                    <i data-lucide="info"></i>
                    <span>Pengumuman</span>
                </a>
                <a href="{{ route('admin.manajemen') }}"
                    class="{{ request()->routeIs('admin.manajemen') ? 'bg-blue-500/20 backdrop-blur-2xl border-r-4 border-blue-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-black hover:bg-blue-500/20">
                    <i data-lucide="user-cog"></i>
                    <span>Manajemen Panitia</span>
                </a>
                <a href="{{ route('admin.laporan') }}"
                    class="{{ request()->routeIs('admin.laporan') ? 'bg-blue-500/20 backdrop-blur-2xl border-r-4 border-blue-500 text-white' : '' }} cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-black hover:bg-blue-500/20">
                    <i data-lucide="folder-up"></i>
                    <span>Laporan</span>
                </a>
            </nav>
        </div>
        <div class="space-y-1 mb-4">
            <a href="{{ route('siswa.ppdb') }}"
                class="menu-link cursor-pointer flex gap-3 p-2 text-slate-300 text-md rounded hover:text-black hover:bg-blue-500/20">
                <i data-lucide="home"></i>
                <span>Halaman Utama</span>
            </a>
            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex gap-3 text-md p-2 hover:text-black hover:bg-blue-500/20 text-slate-300 rounded cursor-pointer">
                    <i data-lucide="log-out"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>
@endif
