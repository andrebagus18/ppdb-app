<section data-tab="upload-berkas-content" class="w-full p-6">
    @if ($documents->isEmpty())
        <form action="{{ route('siswa.documents.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full p-6 rounded-xl border-slate-200 bg-white shadow-sm">
            @csrf
            <h3 class="mt-4 mb-2 text-lg font-semibold">
                Upload Berkas
            </h3>
            <div class="grid gap-4 grid-cols-2">
                <div>
                    <label class="mb-1 block text-md font-medium">
                        Pass Foto
                    </label>
                    <input id="foto" name="foto" type="file"
                        class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium">
                        Kartu Keluarga
                    </label>
                    <input id="kk" name="kk" type="file"
                        class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium">
                        Akta Kelahiran
                    </label>
                    <input id="akta" name="akta" type="file"
                        class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                </div>
                <div>
                    <label class="mb-1 block text-md font-medium">
                        Ijazah Terakhir
                    </label>
                    <input id="ijazah" name="ijazah" type="file"
                        class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                </div>
            </div>
            <!-- Berkas Jalur -->
            <h3 class="mt-4 mb-2 text-lg font-semibold">
                Upload Berkas Jalur Pendaftaran
            </h3>
            <input id="surat_jalur" name="surat_jalur" type="file"
                class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 cursor-pointer">
            <p class="mt-2 text-sm text-slate-400">
                Upload berkas atau sertifikat pendukung sesuai jalur yang dipilih (Reguler, Zonasi, Prestasi, atau
                Afirmasi).
            </p>
            <div class="mt-3 flex justify-end">
                <button type="submit"
                    class="btn-next rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer">
                    Kirim
                </button>
            </div>
        </form>
    @else
        <div class="px-10">
            <div class="bg-white flex flex-col gap-4 border border-slate-300 rounded-xl p-4">
                <div class="flex gap-8">
                    <div class="flex flex-col gap-4">
                        @foreach ($documents as $document)
                            @if ($document->status_verifikasi === 'rejected')
                                <form action="{{ route('siswa.documents.reupload', $document) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="file" name="file" required>
                                    <button type="submit"
                                        class="btn-next rounded-xl bg-green-600 px-8 py-3 font-medium text-white hover:bg-green-700 cursor-pointer">Upload
                                        Ulang</button>
                                </form>
                            @endif
                        @endforeach
                    </div>
                    <div class="flex flex-col bg-blue-400 p-5 rounded-lg">
                        <div class="flex text-xl font-medium items-center text-white gap-2 mb-2 border-b border-black">
                            <i data-lucide="notebook-text"></i>Catatan
                        </div>
                        @if ($catatanReject)
                            @foreach ($catatanReject as $doc)
                                <p class="text-md text-white font-bold">Dokumen {{ $doc->jenis_document }} ditolak:
                                    {{ $doc->catatan }}
                                </p>
                            @endforeach
                        @else
                            <p class="text-md text-white">Belum Ada Catatan</p>
                        @endif
                    </div>
                </div>
                <div class="px-20 py-5 bg-yellow-200 rounded-lg">
                    <div class="py-3 mb-2 flex items-center justify-center rounded-lg bg-amber-300">
                        <h3 class="text-2xl font-bold text-red-700">⚠️ PERHATIAN!!!</h3>
                    </div>
                    <div class="tex-lg text-yellow-800 font-medium">
                        <ul class="list-disc pl-5">
                            <li class="">Beberapa dokumen Anda belum dapat diverifikasi.</li>
                            <li>Silakan periksa catatan yang diberikan oleh panitia pada setiap dokumen yang ditolak.
                            </li>
                            <li>Lakukan perbaikan dan unggah ulang dokumen tersebut. Pastikan file yang diunggah jelas,
                                lengkap,
                                dan sesuai dengan persyaratan PPDB.</li>
                            <li>Unggah file atau dokumen dengan format <span class="italic">jpg,jpeg,png,pdf
                                    max:2kb</span></li>
                            <li>Setelah dokumen diperbarui, panitia akan melakukan verifikasi kembali.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
