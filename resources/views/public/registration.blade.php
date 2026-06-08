@extends('layout.dashboard-siswa')
@section('content')

<div class="bg-teal-700 font-bold text-white text-xl w-full p-6 h-10 flex items-center justify-end">
        <h1>Selamat Datang Calon Siswa Baru</h1>
    </div>
    @include('partials.siswa')
    @include('partials.formulir')
    @include('partials.review')
    @include('partials.upload-berkas')
    @include('partials.pengumuman')

@endsection