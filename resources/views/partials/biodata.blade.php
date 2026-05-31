<form class="space-y-8" id="biodataForm">
    <section x-show="currentStep === 1" class="form-step rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="mb-6 text-xl font-semibold text-slate-900">
            Biodata Diri
        </h2>
        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-medium">
                    NISN
                </label>
                <input type="text" id="nisn" name="nisn" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">
                    Nama Lengkap
                </label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">
                    Jenis Kelamin
                </label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="laki_laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">
                    Agama
                </label>
                <select id="agama" name="agama" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="buddha">Buddha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">
                    Tempat Lahir
                </label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">
                    Tanggal Lahir
                </label>
                <input
                    type="text"
                    id="tanggal_lahir"
                    name="tanggal_lahir"
                    class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">
                    Nomor HP / WhatsApp
                </label>
                <input type="tel" id="telp" name="telp" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium">
                    Kode Pos
                </label>
                <input type="text" id="pos" name="pos" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="mt-3">
            <label class="mb-2 block text-sm font-medium">
                Alamat Lengkap
            </label>
            <textarea rows="4" id="alamat" name="alamat" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <div class="mt-3">
            <label class="mb-2 block text-sm font-medium">
                Asal Sekolah
            </label>
            <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mt-10 flex justify-end">
        <button
            type="button"
            class="btn-next rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer"
        >
            Simpan & Lanjutkan ->
        </button>
    </div>
    </section>
</form>