<div id="modal" class="fixed w-full inset-0 bg-black/50 hidden z-50 justify-center items-center">
    <div class="bg-white flex flex-col max-w-4xl mx-auto p-4 rounded">
        <!-- Biodata -->
        <div class="rounded-2xl border border-slate-200 p-4">
            <h3 class="mb-1 text-lg font-semibold text-slate-900">
                Biodata Diri
            </h3>
            <div class="grid grid-cols-6 gap-3">
                <div>
                    <p class="text-sm text-slate-500">NIK/NISN</p>
                    <p id="review_nik" class="font-medium text-slate-800">-</p>
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
                    <p id="review_no_hp" class="font-medium text-slate-800">-</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Kode Pos</p>
                    <p id="review_pos" class="font-medium text-slate-800">-</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Alamat Lengkap</p>
                    <p id="review_alamat" class="font-medium text-slate-800">-</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Asal Sekolah</p>
                    <p id="review_asal_sekolah" class="font-medium text-slate-800">-</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Nilai Rata-Rata</p>
                    <p id="review_nilai_rata_rata" class="font-medium text-slate-800">-</p>
                </div>
            </div>
        </div>
        <!-- Orang Tua -->
        <div class="flex gap-8 rounded-2xl border border-slate-200 bg-white p-4">
            <div class="mr-20">
                <h3 class="mb-1 text-lg font-semibold text-slate-900">
                    Data Orang Tua
                </h3>
            </div>
            <div class="grid gap-4 grid-cols-4">
                <div>
                    <p class="text-sm text-slate-500">Nama Ayah</p>
                    <p id="review_ayah" class="font-medium text-slate-800">-</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Pekerjaan Ayah</p>
                    <p id="review_kerja_ayah" class="font-medium text-slate-800">-</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Nama Ibu</p>
                    <p id="review_ibu" class="font-medium text-slate-800">-</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Pekerjaan Ibu</p>
                    <p id="review_kerja_ibu" class="font-medium text-slate-800">-</p>
                </div>
            </div>
        </div>

        <!-- Wali -->
        <div class="flex gap-8 rounded-2xl border border-slate-200 bg-white p-4">
            <div class="mr-10">
                <h3 class="mb-1 text-lg font-semibold text-slate-900">
                    Data Wali (Opsional)
                </h3>
            </div>
            <div class="grid gap-4 grid-cols-2">
                <div>
                    <p class="text-sm text-slate-500">Nama Wali</p>
                    <p id="review_wali" class="font-medium text-slate-800">-</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Hubungan dengan Siswa</p>
                    <p id="review_hubungan_wali" class="font-medium text-slate-800">-</p>
                </div>
            </div>
        </div>

        <div class="mt-2 flex justify-end">
            <button id="close" type="button"
                class="rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer">
                Konfirmasi
            </button>
        </div>
    </div>
</div>
