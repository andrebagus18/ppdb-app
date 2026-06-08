<section data-tab="upload" class="hidden w-full p-6">
        <form class="w-full p-6 rounded-xl border-slate-200 bg-white shadow-sm">
            <div>
            <h3 class="mb-2 text-lg font-semibold">
            Pilih Jalur Pendaftaran
            </h3>
            <select id="jalur" name="jalur" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="reguler">Jalur Reguler</option>
                <option value="zonasi">Jalur Zonasi</option>
                <option value="prestasi">Jalur Prestasi</option>
                <option value="afirmasi">Jalur Afirmasi</option>
            </select>
            </div>
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
            type="button"
            class="btn-next rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer"
        >
            Kirim
        </button>
        </div>
    </form>
</section>