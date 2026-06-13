<section data-tab="formulir-content" class="w-full p-6 py-4">
    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
        <form action="{{ route('siswa.registration.store') }}" method="POST" class="rounded-2xl border border-slate-200 bg-white shadow-sm p-6 py-2" id="biodataForm">
            @csrf
            <h3 class="mb-2 text-lg font-semibold">
            Formulir Data Diri
            </h3>
            <div class="grid gap-2 grid-cols-3">
            <div>
                <label class="mb-1 block text-md font-medium">
                    NIK/NISN
                </label>
                <input type="text" id="nik" name="nik"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Nama Lengkap
                </label>
                <input type="text" id="nama_lengkap" name="nama_lengkap"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Jenis Kelamin
                </label>
                <select id="jenis_kelamin" name="jenis_kelamin"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Agama
                </label>
                <select id="agama" name="agama"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="buddha">Buddha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Tempat Lahir
                </label>
                <input type="text" id="tempat_lahir" name="tempat_lahir"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Tanggal Lahir
                </label>
                <input
                    type="text"
                    id="tanggal_lahir"
                    name="tanggal_lahir"
                    
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Nomor HP / WhatsApp
                </label>
                <input type="tel" id="telp"  name="no_hp" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Kode Pos
                </label>
                <input type="text" id="pos"  name="pos" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-md font-medium">
                Alamat Lengkap
            </label>
            <input type="text" id="alamat"  name="alamat" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-md font-medium">
                Asal Sekolah
            </label>
            <input type="text" id="asal_sekolah"  name="asal_sekolah" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-md font-medium">
            Pilih Jalur Pendaftaran
            </label>
            <select id="jalur" name="jalur_id"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="1">Jalur Reguler</option>
                <option value="2">Jalur Zonasi</option>
                <option value="3">Jalur Prestasi</option>
                <option value="4">Jalur Afirmasi</option>
            </select>
            </div>
            <div>
            <label class="mb-1 block text-md font-medium">
                Nilai Rata-Rata
            </label>
            <input id="nilai_rata" name="nilai_rata_rata"  type="number"
                class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Nama Ayah</label>
                <input id="ayah" name="ayah" type="text"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Pekerjaan Ayah</label>
                <input id="kerjaAyah" name="kerja_ayah" type="text"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Nama Ibu</label>
                <input id="ibu" name="ibu" type="text"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Pekerjaan Ibu</label>
                <input id="kerjaIbu" name="kerja_ibu" type="text"  class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-md font-medium">Nama Wali</label>
            <input id="wali" name="wali" type="text" 
                class="data-wali w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-md font-medium">Hubungan dengan siswa</label>
            <input id="hubWali" name="hubungan_wali" type="text"  class="data-wali w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            </div>
            <div class="mt-2 flex gap-3 justify-end">
            <button id="preview" type="button" @disabled($student) class="rounded-xl bg-yellow-500 px-8 py-3 font-medium text-white hover:bg-yellow-600 disabled:bg-gray-400 disabled:cursor-not-allowed cursor-pointer" onclick="reviewData()">
            Preview
            </button>
            <button
            type="submit" @disabled($student)
            class="rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed cursor-pointer">
            Kirim
            </button>
            </div>
        </form>
    </section>