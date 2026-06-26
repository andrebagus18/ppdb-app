<section id="pengumuman" class="p-6">
    <div class="p-4 rounded-xl border-2 border-blue-500/40">
        <div class="flex justify-end">
            <button onclick="openAdd()"
                class="flex gap-3 items-center bg-blue-900/30 hover:bg-blue-900/20 text-blue-500 text-md px-4 py-2 rounded-lg cursor-pointer">
                <i data-lucide="circle-plus" class="w-4 h-4"></i>
                Tambah Pengumuman</button>
        </div>
        <div>
            <div class="p-4 rounded-xl overflow-y-auto scrollbar-hide h-85">
                <table class="w-full text-md">
                    <thead class="sticky top-0 z-10">
                        <tr class="text-white border-b-2 border-slate-400">
                            <th class="text-left p-2">No.</th>
                            <th class="text-left p-2">Judul</th>
                            <th class="text-left p-2">Isi</th>
                            <th class="text-left p-2">Status</th>
                            <th class="text-left p-2">Publikasi</th>
                            <th class="text-right p-2">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($announcements as $announcement)
                            @php
                                $status = statusPengumuman($announcement);
                            @endphp
                            <tr class="border-b border-slate-400 text-slate-300">
                                <td class="p-2 mb-2">{{ $loop->iteration }}</td>
                                <td class="p-2 capitalize mb-2">{{ $announcement->judul }}</td>
                                <td class="p-2 max-w-70 wrap-break-word mb-2">{{ $announcement->isi }}</td>
                                <td class="p-2 mb-2">
                                    <span class="px-3 py-1 rounded-xl {{ $status['bg'] }}">{{ $status['title'] }}</span>
                                </td>
                                <td class="p-2 mb-2">{{ $announcement->published_at?->format('d M Y H:i') ?? '-' }}</td>
                                <td class="p-2 flex justify-end gap-2">
                                    <button type="button" id="edit" title="edit"
                                        data-id="{{ $announcement->id }}" data-judul="{{ $announcement->judul }}"
                                        data-isi="{{ $announcement->isi }}" @disabled($announcement->is_published)
                                        class="edit-btn bg-green-900/40 hover:bg-green-900/20 border border-green-500 rounded-md p-2 flex items-center gap-2 cursor-pointer disabled:hidden">
                                        <i data-lucide="square-pen" class="w-4 h-4"></i>
                                    </button>
                                    <form action="{{ route('admin.announcement.destroy', $announcement->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="delete" title="delete"
                                            class="bg-red-900/40 hover:bg-red-900/20 rounded-md p-2 border border-red-500 flex items-center gap-2 cursor-pointer">
                                            <i data-lucide="trash" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                    <button data-judul="{{ $announcement->judul }}"
                                        data-isi="{{ $announcement->isi }}"
                                        data-status="{{ $announcement->is_published ? 'Published' : 'Draft' }}"
                                        data-published="{{ $announcement->published_at?->format('d M Y H:i') }}"
                                        title="detail"
                                        class="detail-btn bg-yellow-900/40 hover:bg-yellow-900/20 rounded-md p-2 border border-yellow-500 flex items-center gap-2 cursor-pointer">
                                        <i data-lucide="message-square-diff" class="w-4 h-4"></i>
                                    </button>
                                    <form action="{{ route('admin.announcement.publish', $announcement->id) }}"
                                        method="POST">
                                        @csrf
                                        <button title="publish" id="publish" type="submit"
                                            @disabled($announcement->is_published)
                                            class="bg-blue-900/40 hover:bg-blue-900/20 rounded-md p-2 border border-blue-500 flex items-center gap-2 cursor-pointer disabled:hidden">
                                            <i data-lucide="rss" class="w-4 h-4"></i>
                                        </button>
                                    </form>
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

{{-- modal add --}}
<div id="addPublish" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-slate-600/10 backdrop-blur-lg border border-slate-700 w-150 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-2 text-white">Tambah Pengumuman</h2>
        <button type="button" class="closePublish absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <form action="{{ route('admin.announcement.create') }}" method="POST">
            @csrf
            <div class="flex flex-col gap-4">
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Judul
                    </label>
                    <input type="text" id="judul" name="judul"
                        class="form-input w-full rounded-lg border text-slate-300 border-slate-700 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-slate-700">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Isi Pengumuman
                    </label>
                    <textarea type="text" id="isi" name="isi"
                        class="h-30 w-full rounded-lg border text-slate-300 border-slate-700 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-slate-700">
                </textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button"
                        class="closePublish bg-amber-900/30 hover:bg-amber-900/40 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer text-amber-500">Batal</button>
                    <button type="submit" id="simpan"
                        class="bg-blue-900/30 hover:bg-blue-900/40 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer text-blue-500">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- modal detail --}}
<div id="modalDetail" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-slate-600/10 backdrop-blur-lg border border-slate-700 w-150 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-2 text-white">Detail Pengumuman</h2>
        <button type="button" class="closeDetail absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <div class="flex flex-col gap-4">
            <div>
                <label class="mb-1 block text-md text-slate-300">
                    Judul
                </label>
                <p class="text-white text-lg font-medium" id="detailJudul"></p>
            </div>
            <div>
                <label class="mb-1 block text-md text-slate-300">
                    Isi
                </label>
                <p class="text-white text-lg font-medium" id="detailIsi"></p>
            </div>
            <div>
                <label class="mb-1 block text-md text-slate-300">
                    Status
                </label>
                <p class="text-white text-lg font-medium" id="detailStatus"></p>
            </div>
            <div>
                <label class="mb-1 block text-md text-slate-300">
                    Publikasi
                </label>
                <p class="text-white text-lg font-medium" id="detailPublished"></p>
            </div>
            <div class="flex justify-end gap-3">
                <button
                    class="closeDetail bg-amber-900/40 hover:bg-amber-900/30 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer text-amber-500">Batal</button>
            </div>
        </div>
    </div>
</div>

{{-- modal edit --}}
<div id="modalEdit" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-slate-600/10 backdrop-blur-lg border border-slate-700 w-150 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-2 text-white">Edit Pengumuman</h2>
        <button type="button" class="closeEdit absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-4">
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Judul
                    </label>
                    <input type="text" id="editJudul" name="editJudul"
                        class="form-input w-full rounded-lg border text-slate-300 border-slate-700 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-slate-700">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium text-slate-300">
                        Isi Pengumuman
                    </label>
                    <textarea type="text" id="editIsi" name="editIsi"
                        class="h-30 w-full rounded-lg border text-slate-300 border-slate-700 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-slate-700">
                </textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button"
                        class="closeEdit bg-amber-900/30 hover:bg-amber-900/40 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer text-amber-500">Batal</button>
                    <button type="submit" id="update"
                        class="bg-blue-900/30 hover:bg-blue-900/40 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer text-blue-500">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
