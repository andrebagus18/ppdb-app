{{-- {{ dd($documents) }} --}}
@extends('layout.dashboard-siswa')
@section('content')
    <div class="bg-blue-800 font-bold text-white text-xl w-full p-6 h-10 flex items-center justify-start">
        <h1>Selamat Datang Calon Siswa Baru</h1>
    </div>
    <div id="dashboard-content" class="content">
        @include('siswa.info')
    </div>
    <div id="formulir-content" class="content hidden">
        @include('siswa.formulir')
    </div>
    <div id="review-content" class="content hidden">
        @include('siswa.review')
    </div>
    <div id="upload-berkas-content" class="content hidden">
        @include('siswa.upload-berkas')
    </div>
    <div id="pengumuman-content" class="content hidden">
        @include('siswa.pengumuman')
    </div>
@endsection
