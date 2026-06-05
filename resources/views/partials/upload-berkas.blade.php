<form class="space-y-8">
<section x-show="currentStep === 4" class="form-step rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
         <h3 class="mt-8 mb-4 text-lg font-semibold">
            Upload Berkas
        </h3>
        <div class="grid gap-5 md:grid-cols-2">
            <div>
             <label class="mb-2 block text-sm font-medium">
                Pass Foto
            </label>
            <input id="foto" name="foto" type="file" class="form-input w-full rounded-xl border border-slate-300 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            </div>
            <div>
             <label class="mb-2 block text-sm font-medium">
                Kartu Keluarga
            </label>
            <input id="kk" name="kk" type="file" class="form-input w-full rounded-xl border border-slate-300 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            </div>
            <div>
             <label class="mb-2 block text-sm font-medium">
                Akta Kelahiran
            </label>
            <input id="akta" name="akta" type="file" class="form-input w-full rounded-xl border border-slate-300 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            </div>
            <div>
             <label class="mb-2 block text-sm font-medium">
                Ijazah Terakhir
            </label>
            <input id="ijazah" name="ijazah" type="file" class="form-input w-full rounded-xl border border-slate-300 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
            </div>
        </div>
        <!-- Berkas Jalur -->
        <h3 class="mt-8 mb-4 text-lg font-semibold">
            Upload Berkas Jalur
        </h3>
        <input id="jalur-file" name="jalur-file"
            type="file"
            class="form-input w-full rounded-xl border border-slate-300 p-3 cursor-pointer">
        <p class="mt-2 text-sm text-slate-500">
            Upload berkas atau sertifikat pendukung sesuai jalur yang dipilih (Reguler, Zonasi, Prestasi, atau Afirmasi).
        </p>
         <div class="mt-5 flex justify-between">
        <button
            type="button"
            class="btn-prev rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer"
        >
            <- Kembali
        </button>
        <button
            type="button"
            class="btn-next rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer"
        >
            Simpan & Lanjutkan ->
        </button>
    </div>
    </section>
</form>
