@extends('layout.app')
@section('content')
    {{-- section home --}}
    <section class="container min-h-dvh mx-auto pt-32 scroll-mt-16 flex gap-5" id="home">
        <div class="w-[35em] flex flex-col mr-10">
            <h1 class="text-5xl font-bold text-teal-700 mb-2">
                Selamat Datang Di PPDB Online
            </h1>
            <span class="text-4xl text-black font-bold">SMKN 45 Merdeka</span>
            <span class="text-black mt-4">
                SMK Negeri 45 Merdeka merupakan sekolah yang berkomitmen memberikan pendidikan berkualitas, membentuk
                karakter yang unggul, serta mengembangkan potensi akademik dan non-akademik peserta didik. Melalui sistem
                PPDB Online, proses pendaftaran dapat dilakukan dengan mudah, cepat, dan transparan dari mana saja.
            </span>
            @auth
                <a href="{{ route('siswa.dashboard.siswa') }}"
                    class="inline-block mt-6 rounded-lg bg-teal-500 hover:bg-teal-600 cursor-pointer px-6 py-3 text-white w-[15em]">
                    Daftar Sekarang ➜
                </a>
            @else
                <a href="{{ route('auth') }}"
                    class="inline-block mt-6 rounded-lg bg-teal-500 hover:bg-teal-600 cursor-pointer px-6 py-3 text-white w-[15em]">
                    Daftar Sekarang ➜
                </a>
            @endauth
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('images/image 9.png') }}" alt="logo" class="w-[25em] h-[20em]">
        </div>
    </section>

    {{-- section jalur pendidikan --}}
    <section class="container mx-auto py-12 scroll-mt-10" id="jalur">
        <div class="flex flex-col items-center justify-center mb-10">
            <h2 class="text-3xl font-semibold text-black mb-2">Jalur Pendidikan</h2>
            <p class="w-[35em] text-slate-600 text-md text-center">Pilih jalur penerimaan yang sesuai dengan kriteria dan
                potensi Anda untuk memulai perjalanan pendidikan bersama kami.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-xl shadow">
                <div class="flex justify-between mb-4">
                    <h3 class="font-semibold text-xl">Jalur Reguler 💡</h3>
                    <span class="w-auto bg-teal-700 text-white text-md rounded-full py-1 px-3">Kuota:
                        {{ $reguler->registration_count }}/{{ $reguler->kuota }}</span>
                </div>
                <p class="mt-2 text-slate-600">
                    Peserta didik diterima berdasarkan nilai melalui sistem seleksi umum, seperti tes ujian saringan masuk
                    (tertulis/berbasis komputer), seleksi nilai rapor.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <div class="flex justify-between mb-4">
                    <h3 class="font-semibold text-xl">Jalur Zonasi 🗺️</h3>
                    <span class="w-auto bg-teal-700 text-white text-md rounded-full py-1 px-3">Kuota:
                        {{ $prestasi->registration_count }}/{{ $prestasi->kuota }}</span>
                </div>
                <p class="mt-2 text-slate-600">
                    Peserta didik diterima berdasarkan jarak tempat tinggal ke sekolah sesuai ketentuan wilayah yang
                    berlaku.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <div class="flex justify-between mb-4">
                    <h3 class="font-semibold text-xl">Jalur Prestasi 🎓</h3>
                    <span class="w-auto bg-teal-700 text-white text-md rounded-full py-1 px-3">Kuota:
                        {{ $zonasi->registration_count }}/{{ $zonasi->kuota }}</span>
                </div>
                <p class="mt-2 text-slate-600">
                    Diperuntukkan bagi calon peserta didik yang memiliki prestasi akademik maupun non-akademik yang
                    dibuktikan dengan sertifikat atau dokumen pendukung.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <div class="flex justify-between mb-4">
                    <h3 class="font-semibold text-xl">Jalur Afirmasi ✨</h3>
                    <span class="w-auto bg-teal-700 text-white text-md rounded-full py-1 px-3">Kuota:
                        {{ $afirmasi->registration_count }}/{{ $afirmasi->kuota }}</span>
                </div>
                <p class="mt-2 text-slate-600">
                    Dikhususkan bagi peserta didik dari keluarga kurang mampu atau penerima program bantuan pemerintah
                    sesuai persyaratan yang ditetapkan.
                </p>
            </div>
        </div>
    </section>

    {{-- section jadwal --}}
    <section class="container mx-auto py-12 scroll-mt-10" id="jadwal">
        <div class="flex flex-col items-center justify-center mb-10">
            <h2 class="text-3xl font-semibold text-black mb-2">JADWAL PPDB</h2>
            <p class="w-[35em] text-slate-600 text-md text-center">Informasi tahapan dan waktu pelaksanaan Penerimaan
                Peserta Didik Baru PPDB. Pastikan mengikuti setiap jadwal yang telah ditentukan agar proses pendaftaran
                berjalan lancar.</p>
        </div>
        <div class="max-w-3xl mx-auto grid grid-row-7 gap-4 py-5">
            <div class="relative pl-10">
                <!-- garis -->
                <div class="absolute left-3 top-3 h-full w-0.5 bg-slate-300"></div>
                <!-- titik -->
                <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-teal-400 border-4 border-white shadow"></div>
                <div class="bg-white rounded-xl p-5 shadow">
                    <span class="text-sm text-teal-700 font-medium">
                        01 Januari 2027
                    </span>
                    <h3 class="text-lg font-semibold mt-1">
                        Pengumuman PPDB
                    </h3>
                    <p class="text-slate-600 mt-2">
                        Informasi resmi pembukaan penerimaan peserta didik baru.
                    </p>
                </div>
            </div>
            <div class="relative pl-10">
                <div class="absolute left-3 top-3 h-full w-0.5 bg-slate-300"></div>
                <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-teal-400 border-4 border-white shadow"></div>
                <div class="bg-white rounded-xl p-5 shadow">
                    <span class="text-sm text-teal-700 font-medium">
                        02 - 31 Januari 2027
                    </span>
                    <h3 class="text-lg font-semibold mt-1">
                        Pendaftaran Online
                    </h3>
                    <p class="text-slate-600 mt-2">
                        Pengisian formulir dan unggah berkas persyaratan.
                    </p>
                </div>
            </div>
            <div class="relative pl-10">
                <div class="absolute left-3 top-3 h-full w-0.5 bg-slate-300"></div>
                <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-teal-400 border-4 border-white shadow"></div>
                <div class="bg-white rounded-xl p-5 shadow">
                    <span class="text-sm text-teal-700 font-medium">
                        01 - 05 Februari 2027
                    </span>
                    <h3 class="text-lg font-semibold mt-1">
                        Verifikasi Berkas
                    </h3>
                    <p class="text-slate-600 mt-2">
                        Pemeriksaan dokumen oleh panitia PPDB.
                    </p>
                </div>
            </div>
            <div class="relative pl-10">
                <div class="absolute left-3 top-3 h-full w-0.5 bg-slate-300"></div>
                <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-teal-400 border-4 border-white shadow"></div>
                <div class="bg-white rounded-xl p-5 shadow">
                    <span class="text-sm text-teal-700 font-medium">
                        06 - 10 Februari 2027
                    </span>
                    <h3 class="text-lg font-semibold mt-1">
                        Proses Seleksi
                    </h3>
                    <p class="text-slate-600 mt-2">
                        Proses penilaian sesuai jalur pendaftaran.
                    </p>
                </div>
            </div>
            <div class="relative pl-10">
                <div class="absolute left-3 top-3 h-full w-0.5 bg-slate-300"></div>
                <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-teal-400 border-4 border-white shadow"></div>
                <div class="bg-white rounded-xl p-5 shadow">
                    <span class="text-sm text-teal-700 font-medium">
                        12 Februari 2027
                    </span>
                    <h3 class="text-lg font-semibold mt-1">
                        Pengumuman Hasil
                    </h3>
                    <p class="text-slate-600 mt-2">
                        Hasil seleksi dapat dilihat melalui website sekolah.
                    </p>
                </div>
            </div>
            <div class="relative pl-10">
                <div class="absolute left-3 top-3 h-full w-0.5 bg-slate-300"></div>
                <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-teal-400 border-4 border-white shadow"></div>
                <div class="bg-white rounded-xl p-5 shadow">
                    <span class="text-sm text-teal-700 font-medium">
                        13 - 17 Februari 2027
                    </span>
                    <h3 class="text-lg font-semibold mt-1">
                        Daftar Ulang
                    </h3>
                    <p class="text-slate-600 mt-2">
                        Konfirmasi dan melengkapi administrasi.
                    </p>
                </div>
            </div>
            <div class="relative pl-10">
                <div class="absolute left-3 top-3 h-full w-0.5 bg-slate-300"></div>
                <div class="absolute left-0 top-1 w-6 h-6 rounded-full bg-teal-400 border-4 border-white shadow"></div>
                <div class="bg-white rounded-xl p-5 shadow">
                    <span class="text-sm text-teal-700 font-medium">
                        Juli 2027
                    </span>
                    <h3 class="text-lg font-semibold mt-1">
                        Awal Tahun Ajaran Baru
                    </h3>
                    <p class="text-slate-600 mt-2">
                        Kegiatan belajar dimulai.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- section pengumuman --}}
    <section class="container mx-auto py-12 scroll-mt-10" id="pengumuman">
        <div class="flex flex-col items-center justify-center mb-10">
            <h2 class="text-3xl font-semibold text-black mb-2">Pengumuman PPDB</h2>
            <p class="w-[35em] text-slate-600 text-md text-center">Temukan informasi terbaru mengenai jadwal, tahapan, dan
                hasil seleksi Penerimaan Peserta Didik Baru PPDB.</p>
        </div>
        <div class="max-w-3xl mx-auto flex justify-center gap-4">
            <div class="p-5 text-center bg-white shadow rounded-xl">
                <h4 class="text-black text-2xl font-bold">📢 PENGUMUMAN TERBARU</h4>
                <div class="p-4">
                    <p class="bg-teal-500/40 rounded-md text-black font-bold py-4">HASIL SELEKSI PPDB 2027 TELAH DIUMUMKAN
                    </p>
                    <p class="my-4 text-black font-medium">Silakan cek status kelulusan melalui <span
                            class="font-bold text-black">Dashboard</span> menu untuk mengetahui hasil seleksi.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- section FAQ --}}
    <section class="container mx-auto py-12 scroll-mt-10" id="faq">
        <div class="flex flex-col items-center justify-center mb-10">
            <h2 class="text-3xl font-semibold text-black mb-2">FAQ</h2>
            <p class="w-[35em] text-slate-600 text-md text-center">Jawaban cepat untuk berbagai pertanyaan umum seputar
                pendaftaran, persyaratan, seleksi, dan daftar ulang peserta didik baru.</p>
        </div>
        <div class="max-w-3xl mx-auto flex justify-center gap-4">
            <div class="w-2xl grid grid-row-8 gap-4">
                <details class="faq bg-white border border-slate-200 py-2 px-4">
                    <summary>▶ Apakah pendaftaran PPDB dikenakan biaya?</summary>
                    <div class="content p-3">
                        <p class="text-slate-600 text-md">Tidak, proses pendaftaran PPDB tidak dipungut biaya sesuai dengan
                            ketentuan yang berlaku.</p>
                    </div>
                </details>
                <details class="faq bg-white border border-slate-200 py-2 px-4">
                    <summary>▶ Bagaimana cara melakukan pendaftaran?</summary>
                    <div class="content p-3">
                        <p class="text-slate-600 text-md">Calon peserta didik dapat mendaftar secara online melalui website
                            PPDB dengan mengisi formulir dan mengunggah dokumen yang diperlukan.</p>
                    </div>
                </details>
                <details class="faq bg-white border border-slate-200 py-2 px-4">
                    <summary>▶ Dokumen apa saja yang harus disiapkan?</summary>
                    <div class="content p-3">
                        <p class="text-slate-600 text-md">Umumnya meliputi Kartu Keluarga, Akta Kelahiran, rapor, pas foto,
                            dan dokumen pendukung lainnya sesuai jalur pendaftaran.</p>
                    </div>
                </details>
                <details class="faq bg-white border border-slate-200 py-2 px-4">
                    <summary>▶ Bagaimana cara mengetahui hasil seleksi?</summary>
                    <div class="content p-3">
                        <p class="text-slate-600 text-md">Hasil seleksi dapat dilihat melalui halaman pengumuman pada
                            website PPDB sesuai jadwal yang telah ditentukan.</p>
                    </div>
                </details>
                <details class="faq bg-white border border-slate-200 py-2 px-4">
                    <summary>▶ Bagaimana jika mengalami kendala saat pendaftaran?</summary>
                    <div class="content p-3">
                        <p class="text-slate-600 text-md">Silakan menghubungi panitia PPDB melalui kontak yang tersedia
                            pada website untuk mendapatkan bantuan.</p>
                    </div>
                </details>
            </div>
        </div>
    </section>
@endsection
