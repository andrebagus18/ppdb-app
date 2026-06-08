<aside class="w-64 bg-slate-900 p-4">
    <div class="p-4 pb-0 text-left border-b border-white">
        <h2 class="font-bold text-white text-2xl mb-3">
            PPDB<br>SMKN 45<br>MERDEKA
        </h2>
    </div>
    <nav class="space-y-2 pt-4">
        <a href="#" onclick="showTab('dashboard')" class="cursor-pointer flex gap-3 p-2 text-slate-200 text-lg rounded hover:text-black hover:bg-gray-100">
            <i data-lucide="home"></i>
            <span>Dashboard</span>
        </a>
        <a href="#" onclick="showTab('formulir')" class="cursor-pointer flex gap-3 p-2 text-slate-200 text-lg rounded hover:text-black hover:bg-gray-100">
            <i data-lucide="form"></i>
            <span>Data Formulir</span>
        </a>
        <a href="#" onclick="showTab('upload')" class="cursor-pointer flex gap-3 p-2 text-slate-200 text-lg rounded hover:text-black hover:bg-gray-100">
            <i data-lucide="upload"></i>
            <span>Upload Dokumen</span>
        </a>
        <a href="#" onclick="showTab('pengumuman')" class="cursor-pointer flex gap-3 p-2 text-slate-200 text-lg rounded hover:text-black hover:bg-gray-100">
            <i data-lucide="info"></i>
            <span>Pengumuman</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit"
                class="w-full flex gap-3 text-lg px-4 py-2 bg-red-700 hover:bg-red-800 text-white rounded cursor-pointer">
                <i data-lucide="log-out"></i>
                <span>Logout</span>
            </button>
        </form>
    </nav>
</aside>






















