<section data-tab="formulir-content" class="w-full p-6 py-4">
    <form action="{{ route('siswa.registration.store') }}" method="POST"
        class="rounded-2xl border border-slate-200 bg-white shadow-sm p-6 py-4" id="biodataForm">
        @csrf
        <div class="grid gap-2 grid-cols-3">
            <div>
                <label class="mb-1 block text-md font-medium">
                    NIK/NISN <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Jenis Kelamin <span class="text-red-500">*</span>
                </label>
                <select id="jenis_kelamin" name="jenis_kelamin"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" @selected(old('jenis_kelamin') == 'Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected(old('jenis_kelamin') == 'Perempuan')>Perempuan</option>
                </select>
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Agama <span class="text-red-500">*</span>
                </label>
                <select id="agama" name="agama"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Agama</option>
                    <option value="Islam" @selected(old('agama') == 'Islam')>Islam</option>
                    <option value="Kristen" @selected(old('agama') == 'Kristen')>Kristen</option>
                    <option value="Katolik" @selected(old('agama') == 'Katolik')>Katolik</option>
                    <option value="Hindu" @selected(old('agama') == 'Hindu')>Hindu</option>
                    <option value="Buddha" @selected(old('agama') == 'Buddha')>Buddha</option>
                    <option value="Konghucu" @selected(old('agama') == 'Konghucu')>Konghucu</option>
                </select>
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Tempat Lahir <span class="text-red-500">*</span>
                </label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Tanggal Lahir <span class="text-red-500">*</span>
                </label>
                <input type="text" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Nomor HP / WhatsApp <span class="text-red-500">*</span>
                </label>
                <input type="tel" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Kode Pos <span class="text-red-500">*</span>
                </label>
                <input type="text" id="pos" name="pos" value="{{ old('pos') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Alamat Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Asal Sekolah <span class="text-red-500">*</span>
                </label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Pilih Jalur Pendaftaran <span class="text-red-500">*</span>
                </label>
                <select id="jalur_id" name="jalur_id"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($jalurs as $jalur)
                        <option value="{{ $jalur->id }}" @selected(old('jalur_id') == $jalur->id) @disabled($jalur->registrations_count >= $jalur->kuota)>
                            {{ $jalur->nama }} ({{ $jalur->registration_count }}/{{ $jalur->kuota }})
                            @if ($jalur->registration_count >= $jalur->kuota)
                                - Penuh
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">
                    Nilai Rata-Rata <span class="text-red-500">*</span>
                </label>
                <input id="nilai_rata_rata" name="nilai_rata_rata" type="number" value="{{ old('nilai_rata_rata') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Nama Ayah <span class="text-red-500">*</span></label>
                <input id="ayah" name="ayah" type="text" value="{{ old('ayah') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Pekerjaan Ayah <span
                        class="text-red-500">*</span></label>
                <input id="kerja_ayah" name="kerja_ayah" type="text" value="{{ old('kerja_ayah') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Nama Ibu <span class="text-red-500">*</span></label>
                <input id="ibu" name="ibu" type="text" value="{{ old('ibu') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Pekerjaan Ibu <span
                        class="text-red-500">*</span></label>
                <input id="kerja_ibu" name="kerja_ibu" type="text" value="{{ old('kerja_ibu') }}"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Nama Wali (Opsional)</label>
                <input id="wali" name="wali" type="text" value="{{ old('wali') }}"
                    class="data-wali w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-md font-medium">Hubungan dengan siswa (Opsional)</label>
                <input id="hubungan_wali" name="hubungan_wali" type="text" value="{{ old('hubungan_wali') }}"
                    class="data-wali w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="mt-2 flex gap-3 justify-end">
            <button id="preview" type="button" @disabled($student)
                class="rounded-xl bg-yellow-500 px-8 py-3 font-medium text-white hover:bg-yellow-600 disabled:bg-gray-400 disabled:cursor-not-allowed cursor-pointer"
                onclick="reviewData()">
                Preview
            </button>
            <button type="submit" @disabled($student)
                class="rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed cursor-pointer">
                Kirim
            </button>
        </div>
    </form>
</section>
