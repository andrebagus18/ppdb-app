<form class="space-y-8">
<section x-show="currentStep === 3" class="form-step rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="mb-6 text-xl font-semibold text-slate-900">
            Nilai Raport dan Pemilihan Jalur
        </h2>
        <!-- Jalur -->
        <div>
            <label class="mb-2 block text-sm font-medium">
                Pilihan Jalur
            </label>
            <select id="jalur" name="jalur" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="zonasi">Jalur Zonasi</option>
                <option value="prestasi">Jalur Prestasi</option>
                <option value="afirmasi">Jalur Afirmasi</option>
                <option value="pindah">Jalur Perpindahan Orang Tua</option>
            </select>
        </div>
        <!-- Nilai -->
        <div class="mt-4 grid gap-5 md:grid-cols-2">
            <div>
            <label class="mb-2 block text-sm font-medium">
                Bahasa Indonesia
            </label>
            <input id="bIndo" name="bIndo" type="number"
                class="form-input rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
             <label class="mb-2 block text-sm font-medium">
                Matematika
            </label>
            <input id="mat" name="mat" type="number"
                class="form-input rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-2 block text-sm font-medium">
                IPA
            </label>
            <input id="ipa" name="ipa" type="number"
                class="form-input rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-2 block text-sm font-medium">
                Bahasa Iggris
            </label>
            <input id="bIng" name="bIng" type="number"
                class="form-input rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
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
