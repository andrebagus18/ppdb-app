<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard Calon Siswa')</title>
      @vite(['resources/css/app.css', 'resources/js/registration.js'])
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-[#eeeded] flex">
<aside class="w-64 bg-teal-950/90 p-4">
    <div class="p-4 pb-0 text-left border-b">
        <h2 class="font-bold text-white text-2xl mb-3">
            PPDB<br>SMKN 45<br>MERDEKA
        </h2>
    </div>
    <nav class="space-y-2 pt-4">
        <a
            class="cursor-pointer block p-2 text-slate-200 rounded hover:text-black hover:bg-gray-100">
            Dashboard
        </a>
        <a 
            class="cursor-pointer block p-2 text-slate-200 rounded hover:text-black hover:bg-gray-100">
            Data Formulir
        </a>
        <a 
            class="cursor-pointer block p-2 text-slate-200 rounded hover:text-black hover:bg-gray-100">
            Upload Dokumen
        </a>
        <a 
            class="cursor-pointer block p-2 text-slate-200 rounded hover:text-black hover:bg-gray-100">
            Pengumuman
        </a>
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"
        class="px-4 py-2 bg-red-800 text-white rounded">
        Logout
    </button>
</form>
    </nav>
</aside>

<main class="flex-1 bg-gray-300/70">
    <div class="bg-teal-700 w-full p-6 h-10 flex items-center justify-end">
        <h1>Selamat Datang!</h1>
    </div>

    <div class="p-6">
        <div class="p-2 bg-teal-500/70">
            <h2>Hasil Seleksi</h2>
            <p>Sedang dalam peninjauan oleh Panitia</p>
        </div>
        <div class="p-8 flex gap-6 mt-8">
            <div class="bg-white p-10 flex flex-col items-center">
                <img src="" alt="profil">
                <p class="text-lg text-slate-400">PPDB202606070013</p>
                <p class="font-bold text-black text-xl">Budi Harka</p>
            </div>
            <div class="bg-white p-4 w-full ">
                <table class="flex gap-4 border border-slate-300 p-4 rounded-lg">
                    <thead>
                        <tr class="flex flex-col text-left">
                        <th>Nama :</th>
                        <th>NIK/NISN :</th>
                        <th>Nilai Rata-Rata :</th>
                        <th>No. Pendaftaran :</th>
                        <th>Alamat :</th>
                        <th>Asal Sekolah :</th>
                        <th>Status :</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="flex flex-col">
                        <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                        <td>Malcolm Lockyer</td>
                        <td>1961</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <section x-show="currentStep === 1"  class="form-step w-full p-6 py-4">
        <form class="rounded-2xl border border-slate-200 bg-white shadow-sm p-6 py-3" id="biodataForm">
            <h3 class="mb-2 text-lg font-semibold">
            Formulir Data Diri
            </h3>
            <div class="grid gap-2 grid-cols-3">
            <div>
                <label class="mb-1 block text-sm font-medium">
                    NIK/NISN
                </label>
                <input type="text" id="nik" name="nik" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">
                    Nama Lengkap
                </label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">
                    Jenis Kelamin
                </label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="laki_laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">
                    Agama
                </label>
                <select id="agama" name="agama" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="buddha">Buddha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">
                    Tempat Lahir
                </label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">
                    Tanggal Lahir
                </label>
                <input
                    type="text"
                    id="tanggal_lahir"
                    name="tanggal_lahir"
                    class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">
                    Nomor HP / WhatsApp
                </label>
                <input type="tel" id="telp" name="telp" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">
                    Kode Pos
                </label>
                <input type="text" id="pos" name="pos" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-sm font-medium">
                Alamat Lengkap
            </label>
            <input type="text" id="alamat" name="alamat" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-sm font-medium">
                Asal Sekolah
            </label>
            <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-sm font-medium">
                Nilai Rata-Rata
            </label>
            <input id="bIndo" name="bIndo" type="number"
                class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">Nama Ayah</label>
                <input id="ayah" name="ayah" type="text" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">Pekerjaan Ayah</label>
                <input id="kerjaAyah" name="kerjaAyah" type="text" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">Nama Ibu</label>
                <input id="ibu" name="ibu" type="text" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">Pekerjaan Ibu</label>
                <input id="kerjaIbu" name="kerjaIbu" type="text" class="form-input w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-sm font-medium">Nama Wali</label>
            <input id="wali" name="wali" type="text"
                class="data-wali w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
            <label class="mb-1 block text-sm font-medium">Hubungan dengan siswa</label>
            <input id="hubWali" name="hubWali" type="text"
                class="data-wali w-full rounded-lg border border-slate-300 px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            </div>
            <div class="mt-4 flex gap-4 justify-end">
            <button
            type="button"
            class="btn-next rounded-xl bg-yellow-500 px-8 py-3 font-medium text-white hover:bg-yellow-600 cursor-pointer">
            Preview
            </button>
            <button
            type="button"
            class="btn-next rounded-xl bg-blue-600 px-8 py-3 font-medium text-white hover:bg-blue-700 cursor-pointer">
            Simpan & Lanjutkan ->
            </button>
            </div>
        </form>
    </section> --}}

    {{-- <section x-show="currentStep === 4" class="form-step w-full p-6">
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
            Submit
        </button>
        </div>
    </form>
</section>

    <section class="container mx-auto p-6" id="pengumuman">
    <div class="flex flex-col items-center justify-center mb-5">
        <h2 class="text-3xl font-semibold text-black mb-2">Pengumuman PPDB</h2>
        <p class="w-[35em] text-slate-600 text-md text-center">Temukan informasi terbaru mengenai jadwal, tahapan, dan hasil seleksi Penerimaan Peserta Didik Baru PPDB.</p>
    </div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2 p-5 text-center bg-white shadow rounded-xl">
            <h4 class="text-black text-2xl font-bold">📢 PENGUMUMAN TERBARU</h4>
            <div class="p-4">
                <p class="bg-teal-500/40 rounded-md text-black font-bold py-4">HASIL SELEKSI PPDB 2027 TELAH DIUMUMKAN</p>
                <p class="my-4 text-black font-medium">Silakan cek status kelulusan melalui <span class="font-bold text-black">Dashboard</span> menu untuk mengetahui hasil seleksi.</p>
            </div>
        </div>
        <div class="flex flex-col gap-4 p-6 bg-white rounded-lg">
            <div class="bg-teal-500/60 rounded-lg p-4">
                <div class="flex flex-col items-center justify-center">
                    <h4 class="text-white text-xl font-bold mb-3">Status</h4>
                    <p class="text-white text-lg font-medium">Pending</p>
                </div>
            </div>
            <div class="bg-teal-500/70 rounded-lg p-4">
                <div class="flex flex-col items-center justify-center">
                    <h4 class="text-white text-xl font-bold mb-3">Hasil Seleksi</h4>
                    <p class="text-white text-lg font-medium">Menunggu Verifikasi</p>
                </div></div>
            <div class="bg-teal-700/70 rounded-lg p-4">
                <div class="flex flex-col items-center justify-center">
                    <h4 class="text-white text-xl font-bold mb-3">Catatan</h4>
                    <p class="text-white text-lg font-medium">Belum Ada Catatan</p>
                </div></div>
        </div>
    </div>
</section> --}}

</main>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>
</html>























