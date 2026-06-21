<section id="pengumuman" class="p-6">
    <div class="p-4 bg-white rounded-xl">
        <div class="flex justify-end">
            <button onclick="openAdd()"
                class="flex gap-3 items-center bg-blue-600 hover:bg-blue-700 hover:text-white px-4 py-2 rounded-lg cursor-pointer">
                <i data-lucide="circle-plus" class="w-4 h-4"></i>
                Tambah Pengumuman</button>
        </div>
        <div>
            <div class="p-4 rounded-xl border border-slate-200 mt-4 overflow-y-auto scrollbar-hide h-100">
                <table class="w-full text-md">
                    <thead class="border-b border-slate-200 mb-1 sticky top-0 z-10">
                        <tr class="text-gray-500">
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
                            <tr>
                                <td class="p-2">{{ $loop->iteration }}</td>
                                <td class="p-2 capitalize">{{ $announcement->judul }}</td>
                                <td class="p-2 max-w-70 wrap-break-word">{{ $announcement->isi }}</td>
                                <td class="p-2">
                                    <span class="px-3 py-1 rounded-xl {{ $status['bg'] }}">{{ $status['title'] }}</span>
                                </td>
                                <td class="p-2">{{ $announcement->published_at?->format('d M Y H:i') ?? '-' }}</td>
                                <td class="px-2 py-1 flex justify-end gap-1">
                                    <button type="button" id="edit" data-id="{{ $announcement->id }}"
                                        data-judul="{{ $announcement->judul }}" data-isi="{{ $announcement->isi }}" @disabled($announcement->is_published)
                                        class="edit-btn bg-green-500 hover:bg-green-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer disabled:hidden">
                                        <i data-lucide="square-pen" class="w-4 h-4"></i>
                                        Edit</button>
                                    <form action="{{ route('admin.announcement.destroy', $announcement->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="delete"
                                            class="bg-red-500 hover:bg-red-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer">
                                            <i data-lucide="trash" class="w-4 h-4"></i>
                                            Delete
                                        </button>
                                    </form>
                                    <button data-judul="{{ $announcement->judul }}"
                                        data-isi="{{ $announcement->isi }}"
                                        data-status="{{ $announcement->is_published ? 'Published' : 'Draft' }}"
                                        data-published="{{ $announcement->published_at?->format('d M Y H:i') }}"
                                        class="detail-btn bg-yellow-500 hover:bg-yellow-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer">
                                        <i data-lucide="message-square-diff" class="w-4 h-4"></i>
                                        Detail
                                    </button>
                                    <form action="{{ route('admin.announcement.publish', $announcement->id) }}"
                                        method="POST">
                                        @csrf
                                        <button id="publish" type="submit" @disabled($announcement->is_published)
                                            class="bg-blue-500 hover:bg-blue-600 rounded-xl px-2 py-1 flex items-center gap-2 cursor-pointer disabled:hidden">
                                            <i data-lucide="rss" class="w-4 h-4"></i>
                                            Publish
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
    <div class="bg-white w-150 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-2">Tambah Pengumuman</h2>
        <button type="button" class="closePublish absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <form action="{{ route('admin.announcement.create') }}" method="POST">
            @csrf
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
                    <textarea type="text" id="isi" name="isi"
                        class="h-30 w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button"
                        class="closePublish bg-yellow-500 hover:bg-yellow-600 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer">Batal</button>
                    <button type="submit" id="simpan"
                        class="bg-blue-500 hover:bg-blue-600 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- modal detail --}}
<div id="modalDetail" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-white w-150 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-2">Detail Pengumuman</h2>
        <button type="button" class="closeDetail absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <div class="flex flex-col gap-4">
            <div>
                <label class="mb-1 block text-md text-slate-400">
                    Judul
                </label>
                <p class="tetx-black text-lg font-medium" id="detailJudul"></p>
            </div>
            <div>
                <label class="mb-1 block text-md text-slate-400">
                    Isi
                </label>
                <p class="tetx-black text-lg font-medium" id="detailIsi"></p>
            </div>
            <div>
                <label class="mb-1 block text-md text-slate-400">
                    Status
                </label>
                <p class="tetx-black text-lg font-medium" id="detailStatus"></p>
            </div>
            <div>
                <label class="mb-1 block text-md text-slate-400">
                    Publikasi
                </label>
                <p class="tetx-black text-lg font-medium" id="detailPublished"></p>
            </div>
            <div class="flex justify-end gap-3">
                <button
                    class="closeDetail bg-yellow-500 hover:bg-yellow-600 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer">Batal</button>
            </div>
        </div>
    </div>
</div>

{{-- modal edit --}}
<div id="modalEdit" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
    <div class="bg-white w-150 rounded-xl p-4 m-5 relative">
        <h2 class="text-xl font-bold mb-2">Edit Pengumuman/h2>
        <button type="button" class="closeEdit absolute top-3 right-3 text-red-500 cursor-pointer">
            <i data-lucide="x"></i>
        </button>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-4">
                <div>
                    <label class="mb-1 block text-md font-medium">
                        Judul
                    </label>
                    <input type="text" id="editJudul" name="editJudul"
                        class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium">
                        Isi Pengumuman
                    </label>
                    <textarea type="text" id="editIsi" name="editIsi"
                        class="h-30 w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button"
                        class="closeEdit bg-yellow-500 hover:bg-yellow-600 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer">Batal</button>
                    <button type="submit" id="update"
                        class="bg-blue-500 hover:bg-blue-600 rounded-xl px-4 py-2 flex items-center gap-2 cursor-pointer">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
