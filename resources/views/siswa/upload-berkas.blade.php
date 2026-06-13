<section data-tab="upload-berkas-content" class="w-full p-6">
    @if ($documents->isEmpty())
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="w-full p-6 rounded-xl border-slate-200 bg-white shadow-sm">
            @csrf
         <h3 class="mt-4 mb-2 text-lg font-semibold">
            Upload Berkas
        </h3>
        <div class="grid gap-4 grid-cols-2">
            <div>
             <label class="mb-1 block text-md font-medium">
                Pass Foto
            </label>
            <input id="foto" name="foto" type="file" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            </div>
            <div>
             <label class="mb-1 block text-md font-medium">
                Kartu Keluarga
            </label>
            <input id="kk" name="kk" type="file" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            </div>
            <div>
             <label class="mb-1 block text-md font-medium">
                Akta Kelahiran
            </label>
            <input id="akta" name="akta" type="file" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            </div>
            <div>
             <label class="mb-1 block text-md font-medium">
                Ijazah Terakhir
            </label>
            <input id="ijazah" name="ijazah" type="file" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            </div>
        </div>
        <!-- Berkas Jalur -->
        <h3 class="mt-4 mb-2 text-lg font-semibold">
            Upload Berkas Jalur Pendaftaran
        </h3>
        <input id="surat_jalur" name="surat_jalur"
            type="file"
            class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 cursor-pointer">
        <p class="mt-2 text-sm text-slate-400">
            Upload berkas atau sertifikat pendukung sesuai jalur yang dipilih (Reguler, Zonasi, Prestasi, atau Afirmasi).
        </p>
         <div class="mt-3 flex justify-end">
        <button
            type="submit"
            class="btn-next rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer"
        >
            Kirim
        </button>
        </div>
    </form>
    @else
    @php
        $reject = $documents->contains('status_verifikasi', 'rejected');
        $verify = $documents->every(fn($doc) => $doc->status_verifikasi === 'verified');
            $bg = $reject ? 'bg-red-500' : ($verify ? 'bg-green-500' : 'bg-yellow-500');
            
            $title = $reject ? 'Berkas Anda Ditolak' : ($verify ? 'Selamat! Berkas Anda Diterima' : 'Berkas Anda Sedang Diverifikasi');
    @endphp
        <div class="{{ $bg }} rounded-lg p-2">
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-white text-2xl font-medium">{{ $title }}</p>
                        <p class="text-white italic text-xl font-medium">{{ $document?->catatan ?? 'Pending'}}</p>
                    </div>
        </div>
    @foreach ($documents as $document )
        @if ($document->status_verifikasi === 'rejected') 
        <form action="{{ route('siswa.documents.reupload', $document) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="file" name="file" required>
            <button type="submit" class="btn-next rounded-xl bg-green-600 px-8 py-3 font-medium text-white hover:bg-green-700 cursor-pointer">Upload Ulang</button>
        </form>
        @endif
    @endforeach
    @endif
</section>