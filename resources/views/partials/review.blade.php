<form class="space-y-8">
<div x-show="currentStep === 5" class="form-step space-y-6">
    <!-- Biodata -->
    <div class="rounded-2xl border border-slate-200 bg-white p-6">
        <h3 class="mb-4 text-lg font-semibold text-slate-900">
            Biodata Diri
        </h3>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <p class="text-sm text-slate-500">NISN</p>
                <p id="review_nisn" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Nama Lengkap</p>
                <p id="review_nama_lengkap" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Jenis Kelamin</p>
                <p id="review_jenis_kelamin" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Agama</p>
                <p id="review_agama" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Tempat Lahir</p>
                <p id="review_tempat_lahir" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Tanggal Lahir</p>
                <p id="review_tanggal_lahir" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">No. HP / WhatsApp</p>
                <p id="review_telp" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Kode Pos</p>
                <p id="review_pos" class="font-medium text-slate-800">-</p>
            </div>
        </div>
        <div class="mt-4">
            <p class="text-sm text-slate-500">Alamat Lengkap</p>
            <p id="review_alamat" class="font-medium text-slate-800">-</p>
        </div>
        <div class="mt-4">
            <p class="text-sm text-slate-500">Asal Sekolah</p>
            <p id="review_asal_sekolah" class="font-medium text-slate-800">-</p>
        </div>
    </div>
    <!-- Orang Tua -->
    <div class="rounded-2xl border border-slate-200 bg-white p-6">
        <h3 class="mb-4 text-lg font-semibold text-slate-900">
            Data Orang Tua
        </h3>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <p class="text-sm text-slate-500">Nama Ayah</p>
                <p id="review_ayah" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Pekerjaan Ayah</p>
                <p id="review_kerjaAyah" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">No. HP Ayah</p>
                <p id="review_noAyah" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Nama Ibu</p>
                <p id="review_ibu" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Pekerjaan Ibu</p>
                <p id="review_kerjaIbu" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">No. HP Ibu</p>
                <p id="review_noIbu" class="font-medium text-slate-800">-</p>
            </div>
        </div>
    </div>

    <!-- Wali -->
    <div class="rounded-2xl border border-slate-200 bg-white p-6">
        <h3 class="mb-4 text-lg font-semibold text-slate-900">
            Data Wali (Opsional)
        </h3>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <p class="text-sm text-slate-500">Nama Wali</p>
                <p id="review_wali" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Hubungan dengan Siswa</p>
                <p id="review_hubWali" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Pekerjaan Wali</p>
                <p id="review_kerjaWali" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">No. HP Wali</p>
                <p id="review_noWali" class="font-medium text-slate-800">-</p>
            </div>
        </div>
    </div>

    <!-- Jalur dan Nilai -->
    <div class="rounded-2xl border border-slate-200 bg-white p-6">
        <h3 class="mb-4 text-lg font-semibold text-slate-900">
            Jalur dan Nilai Raport
        </h3>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <p class="text-sm text-slate-500">Jalur Pendaftaran</p>
                <p id="review_jalur" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Bahasa Indonesia</p>
                <p id="review_bIndo" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Matematika</p>
                <p id="review_mat" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">IPA</p>
                <p id="review_ipa" class="font-medium text-slate-800">-</p>
            </div>
            <div>
                <p class="text-sm text-slate-500">Bahasa Inggris</p>
                <p id="review_bIng" class="font-medium text-slate-800">-</p>
            </div>
        </div>
    </div>

    <!-- Berkas -->
    <div class="rounded-2xl border border-slate-200 bg-white p-6">
        <h3 class="mb-4 text-lg font-semibold text-slate-900">
            Upload Berkas
        </h3>
        <ul class="space-y-3">
            <li class="flex items-center gap-3">
                <span class="text-green-600">✓</span>
                <span id="review_foto">Pas Foto</span>
            </li>
            <li class="flex items-center gap-3">
                <span class="text-green-600">✓</span>
                <span id="review_kk">Kartu Keluarga (KK)</span>
            </li>
            <li class="flex items-center gap-3">
                <span class="text-green-600">✓</span>
                <span id="review_akta">Akta Kelahiran</span>
            </li>
            <li class="flex items-center gap-3">
                <span class="text-green-600">✓</span>
                <span id="review_ijazah">Raport Terakhir</span>
            </li>
            <li class="flex items-center gap-3">
                <span class="text-green-600">✓</span>
                <span id="review_jalur-file">Berkas Jalur</span>
            </li>
        </ul>
    </div>

    <!-- Persetujuan -->
        <div class="mt-8 p-4 bg-orange-300/60">
           <span class="text-black text-lg font-semibold">⚠️ Pastikan Data Anda sudah Benar dan Sesuai.</span>
        </div>
        <div class="rounded-xl border border-amber-200 bg-amber-50 p-5">
            <label class="flex items-start gap-3">
                <input
                    type="checkbox"
                    name="agree_terms"
                    required
                    class="mt-1 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                >
                <span class="text-sm text-slate-700">
                    Saya telah membaca dan menyetujui seluruh
                    <a href="#" class="font-medium text-blue-600 hover:underline">
                        syarat dan ketentuan
                    </a>
                    yang berlaku dalam proses Penerimaan Peserta Didik Baru (PPDB).
                </span>
            </label>
            <label class="flex items-start gap-3">
                <input
                    type="checkbox"
                    name="agree_data"
                    required
                    class="mt-1 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                >
                <span class="text-sm text-slate-700">
                    Saya menyatakan bahwa seluruh data dan dokumen yang saya unggah adalah benar, lengkap, dan dapat dipertanggungjawabkan. Apabila di kemudian hari ditemukan ketidaksesuaian data, maka saya bersedia menerima keputusan yang ditetapkan oleh panitia PPDB.
                </span>
            </label>
        </div>
        <div class="mt-8 flex justify-between">
            <button
                type="button"
                class="btn-prev rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer"
            >
                <- Kembali
            </button>
            <button
                type="submit"
                
                class="rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer"
            >
                Kirim ->
            </button>
        </div>
</div>
</form>