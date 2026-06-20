<section id="pengumuman" class="p-6">
    <div class="p-4 bg-white rounded-xl">
        <div class="flex justify-end">
            <button onclick="openAdd()"
                class="flex gap-3 items-center bg-blue-600 hover:bg-blue-700 hover:text-white px-4 py-2 rounded-lg cursor-pointer">
                <i data-lucide="circle-plus" class="w-4 h-4"></i>
                Tambah Pengumuman</button>
        </div>
        <div class="space-y-3">
            <div class="p-4 rounded-xl border border-slate-200 mt-4">
                <table class="w-full text-md">
                    <thead>
                        <tr class="text-gray-500">
                            <th class="text-left p-2">No.</th>
                            <th class="text-left p-2">Judul</th>
                            <th class="text-left p-2">Isi</th>
                            <th class="text-left p-2">Status</th>
                            <th class="text-left p-2">Publikasi</th>
                            <th class="text-center p-2">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengumumans as $pengumuman)
                            <tr>
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2">{{ $pengumuman->judul }}</td>
                                <td class="p-2 w-70">{{ $pengumuman->isi }}</td>
                                <td class="p-2">{{ $pengumuman->is_published }}</td>
                                <td class="p-2">{{ $pengumuman->published_at }}</td>
                                <td class="p-4 flex gap-1">
                                    <button
                                        class="bg-green-500 hover:bg-green-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer">
                                        <i data-lucide="square-pen" class="w-4 h-4"></i>
                                        Edit</button>
                                    <button
                                        class="bg-red-500 hover:bg-red-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer">
                                        <i data-lucide="trash" class="w-4 h-4"></i>
                                        Delete
                                    </button>
                                    <button
                                        class="bg-yellow-500 hover:bg-yellow-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer">
                                        <i data-lucide="message-square-diff" class="w-4 h-4"></i>
                                        Detail
                                    </button>
                                    <button id="publish" type="submit" @disabled($pengumuman)
                                        class="bg-blue-500 hover:bg-blue-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer">
                                        <i data-lucide="rss" class="w-4 h-4"></i>
                                        Publish
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-slate-500">
                                    Belum ada data pengumuman
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- modal --}}
<div id="addPublish" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-white w-150 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-2">Data Pendaftar</h2>
        <button type="button" id="closePublish" class="absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <div class="flex flex-col gap-4">
            <div>
                <label class="mb-1 block text-md font-medium">
                    Judul
                </label>
                <input type="text" id="judul" name="judul"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Isi Pengumuman
                </label>
                <textarea type="text" id="judul" name="judul"
                    class="h-30 w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </textarea>
            </div>
            <div class="flex justify-end gap-3">
                <button
                    class="bg-yellow-500 hover:bg-yellow-600 rounded-xl px-4 py-1 flex items-center gap-2 cursor-pointer">Batal</button>
                <button
                    class="bg-blue-500 hover:bg-blue-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer">Simpan</button>
            </div>
        </div>
    </div>
</div>
