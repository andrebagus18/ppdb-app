@php
    $documentLabel = [
        'foto' => 'Foto 4x6',
        'kk' => 'Kartu Keluarga (KK)',
        'akta' => 'Akta Kelahiran',
        'ijazah' => 'Ijazah Terakhir',
        'surat_jalur' => 'Surat Jalur Pendidikan',
    ];
@endphp
<section data-tab="upload-berkas-content" class="w-full p-8 pt-6">
    <div class="w-full p-6 rounded-xl border-slate-200 bg-white shadow-sm h-120 overflow-y-auto scrollbar-hide">
        @if ($documents->isEmpty())
            <form action="{{ route('siswa.documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($documentLabel as $jenis => $label)
                    <div class="grid gap-2 grid-cols-1">
                        <div class="flex items-center justify-between p-2">
                            <div>
                                <label class="mb-2 block text-lg font-medium">
                                    {{ $label }} <span class="text-red-500">*</span>
                                    <span class="italic text-sm text-slate-400">Upload maksimal 10MB</span>
                                </label>
                                <input name="{{ $jenis }}" type="file"
                                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                            </div>
                            <div class="max-w-80 gap-2">
                                <span
                                    class="rounded-xl text-sm px-2 py-1 italic {{ $statusCard['bg'] }}">{{ $statusCard['title'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-3 flex justify-end">
                    <button type="submit"
                        class="btn-next rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer">
                        Kirim
                    </button>
                </div>
            </form>
        @else
            @foreach ($documentLabel as $jenis => $label)
                @php
                    $document = $documents->firstWhere('jenis_document', $jenis);
                @endphp
                @if ($document->status_verifikasi === 'rejected')
                    <form action="{{ route('siswa.documents.reupload', $document) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-2 grid-cols-1">
                            <div class="flex items-center justify-between p-2">
                                <div>
                                    <label class="mb-2 block text-lg font-medium">
                                        {{ $label }} <span class="text-red-500">*</span>
                                        <span class="italic text-sm text-slate-400">Upload maksimal 10MB</span>
                                    </label>
                                    <input name="file" type="file"
                                        class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                    <p class="text-sm italic text-red-500">{{ $document->catatan }}</p>
                                </div>
                                <div class="max-w-80 gap-2">
                                    <span
                                        class="rounded-xl text-sm px-2 py-1 italic {{ $statusCard['bg'] }}">{{ $statusCard['title'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 flex justify-end">
                            <button type="submit"
                                class="btn-next rounded-xl bg-green-500 px-8 py-3 font-medium text-white hover:bg-green-600 cursor-pointer">
                                Upload Ulang
                            </button>
                        </div>
                    </form>
                @elseif($document->status_verifikasi === 'pending')
                    <div class="grid gap-2 grid-cols-1">
                        <div class="flex items-center justify-between p-2">
                            <div>
                                <label class="mb-2 block text-lg font-medium">
                                    {{ $label }} <span class="text-red-500">*</span>
                                    <span class="italic text-sm text-slate-400">Upload maksimal 10MB</span>
                                </label>
                                <p class="text-lg text-black font-medium italic">{{ $document->jenis_document }}.file
                                </p>
                                <a href="{{ $document->cloudinary_url }}" target="blank"
                                    class="text-sm italic text-blue-500">Lihat
                                    file unggahan</a>
                            </div>
                            <div class="max-w-80 gap-2">
                                <span
                                    class="rounded-xl text-sm px-2 py-1 italic {{ $statusCard['bg'] }}">{{ $statusCard['title'] }}</span>
                            </div>
                        </div>
                    </div>
                @elseif($document->status_verifikasi === 'verified')
                    <div class="grid gap-2 grid-cols-1">
                        <div class="flex items-center justify-between p-2">
                            <div>
                                <label class="mb-2 block text-lg font-medium">
                                    {{ $label }} <span class="text-red-500">*</span>
                                    <span class="italic text-sm text-slate-400">Upload maksimal 10MB</span>
                                </label>
                                <p class="text-lg text-black font-medium italic">
                                    {{ $document->jenis_document }}_siswa.file
                                </p>
                                <a href="{{ $document->cloudinary_url }}" target="blank"
                                    class="text-sm italic text-blue-500">Lihat
                                    file unggahan</a>
                            </div>
                            <div class="max-w-80 gap-2">
                                <span
                                    class="rounded-xl text-sm px-2 py-1 italic {{ $statusCard['bg'] }}">{{ $statusCard['title'] }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</section>
