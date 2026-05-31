<form class="space-y-8">
<section x-show="currentStep === 2" class="form-step rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="mb-6 text-xl font-semibold text-slate-900">
            Data Orang Tua
        </h2>
        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-medium">Nama Ayah</label>
                <input id="ayah" name="ayah" type="text" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">Pekerjaan Ayah</label>
                <input id="kerjaAyah" name="kerjaAyah" type="text" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">Nomor HP Ayah</label>
                <input id="noAyah" name="noAyah" type="text" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">Nama Ibu</label>
                <input id="ibu" name="ibu" type="text" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">Pekerjaan Ibu</label>
                <input id="kerjaIbu" name="kerjaIbu" type="text" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">Nomor HP Ibu</label>
                <input id="noIbu" name="noIbu" type="text" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <h3 class="mt-8 mb-4 text-lg font-semibold">
            Data Wali (Opsional)
        </h3>
        <div class="grid gap-5 md:grid-cols-2">
            <div>
            <label class="mb-2 block text-sm font-medium">Nama Wali</label>
            <input id="wali" name="wali" type="text"
                class="data-wali w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-2 block text-sm font-medium">Hubungan dengan siswa</label>
            <input id="hubWali" name="hubWali" type="text"
                class="data-wali w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-2 block text-sm font-medium">Pekerjaan Wali</label>
            <input id="kerjaWali" name="kerjaWali" type="text"
                class="data-wali w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-2 block text-sm font-medium">Nomor HP Wali</label>
            <input id="noWali" name="noWali" type="text"
                class="data-wali w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
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
