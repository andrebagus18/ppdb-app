<section id="panitia" class="p-6">
    <div class="p-4 rounded-xl border-2 border-blue-500/40">
        <div class="flex justify-end">
            <button onclick="openAdd()"
                class="flex gap-3 items-center bg-green-900/30 hover:bg-green-900/20 text-green-500 text-md px-4 py-2 rounded-lg cursor-pointer">
                <i data-lucide="circle-plus" class="w-4 h-4"></i>
                Tambah Panitia</button>
        </div>
        <div class="rounded-xl p-4 overflow-y-auto scrollbar-hide h-100">
            <table class="w-full text-md">
                <thead class="sticky top-0 z-10">
                    <tr class="text-white border-b-2 border-slate-400">
                        <th class="text-left p-2">No.</th>
                        <th class="text-left p-2">Nama</th>
                        <th class="text-left p-2">Email</th>
                        <th class="text-left p-2">Bergabung</th>
                        <th class="text-right p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($panitias as $panitia)
                        <tr class="border-b border-slate-400 text-slate-300">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $panitia->name }}</td>
                            <td class="p-2">{{ $panitia->email }}</td>
                            <td class="p-2">{{ $panitia->created_at->format('d M Y H:i') }}</td>
                            <td class="p-2 flex gap-2 justify-end">
                                <button data-id="{{ $panitia->id }}" data-name="{{ $panitia->name }}"
                                    data-email="{{ $panitia->email }}" title="edit"
                                    class="editUser bg-green-900/40 hover:bg-green-900/20 border border-green-500 rounded-md p-2 flex items-center gap-2 cursor-pointer">
                                    <i data-lucide="square-pen" class="w-4 h-4"></i>
                                </button>
                                <form action="{{ route('admin.manajemen.destroy', $panitia->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="delete" title="delete"
                                        class="bg-red-900/40 hover:bg-red-900/20 rounded-md p-2 border border-red-500 flex items-center gap-2 cursor-pointer">
                                        <i data-lucide="trash" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-slate-500">
                                Belum ada data panitia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>


{{-- modal add user --}}
<div id="addUser" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-slate-600/10 backdrop-blur-lg border border-slate-700 w-150 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-2 text-white">Tambah Pengumuman</h2>
        <button type="button" class="closeAddUser absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <form action="{{ route('admin.manajemen.create') }}" method="POST" autocomplete="off">
            @csrf
            <input type="hidden" name="role" value="panitia">
            <div class="flex flex-col gap-4">
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Nama Lengkap
                    </label>
                    <input type="text" name="name"
                        class="form-input w-full rounded-lg border border-slate-700 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-slate-700 text-slate-300">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Email
                    </label>
                    <input type="email" name="email" placeholder="Masukkan email" autocomplete="off"
                        class="form-input w-full rounded-lg border border-slate-700 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-slate-700 text-slate-300">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Password
                    </label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                            class="w-full rounded-xl border border-slate-700 px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-slate-700 text-slate-300"
                            placeholder="Minimal 8 karakter">
                        <button type="button"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-300 cursor-pointer"
                            onclick="togglePassword('password', this)">
                            🔓
                        </button>
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button"
                        class="closeAddUser bg-amber-900/30 hover:bg-amber-900/40 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer text-amber-500">Batal</button>
                    <button type="submit" id="simpan"
                        class="bg-blue-900/30 hover:bg-blue-900/40 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer text-blue-500">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- modal edit --}}
<div id="modalEditUser" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-slate-600/10 backdrop-blur-lg border border-slate-700 w-150 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-4 text-white">Edit Pengumuman</h2>
        <button type="button" class="closeEditUser absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <form id="editFormUser" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-4">
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Nama Lengkap
                    </label>
                    <input type="text" id="editName" name="editName"
                        class="form-input w-full rounded-lg border border-slate-700 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-slate-700 text-slate-300">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Email
                    </label>
                    <input type="text" id="editEmail" name="editEmail"
                        class="form-input w-full rounded-lg border border-slate-700 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-slate-700 text-slate-300">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Password Baru
                    </label>
                    <input type="text" id="password" name="password" placeholder="Kosongkan jika tidak diubah"
                        class="form-input w-full rounded-lg border border-slate-700 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-slate-700 text-slate-300">
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button"
                        class="closeEditUser bg-amber-900/30 hover:bg-amber-900/40 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer text-amber-500">Batal</button>
                    <button type="submit" id="update"
                        class="bg-blue-900/30 hover:bg-blue-900/40 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer text-blue-500">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
