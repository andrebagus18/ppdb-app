{{-- {{ dd($documents) }} --}}
@extends('layout.dashboard-siswa')
@section('content')
    <div class="bg-blue-500 font-bold text-white text-xl w-full p-6 h-15 flex items-center justify-between">
        <h2 id="navbar-title" class="text-white text-2xl">Dashboard</h2>
        <div class="flex items-center justify-center gap-2">
            <div class="flex flex-col items-end">
                <h3 class="text-xl font-medium capitalize">{{ Auth::user()->name }}</h3>
                <p class="text-sm font-medium">{{ role(Auth::user()->role) }}</p>
            </div>
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-blue-500">
                {{ getInitial(Auth::user()->name) }}
            </div>
        </div>
    </div>
    <div id="dashboard-content" class="content">
        @include('siswa.info')
    </div>
    <div id="formulir-content" class="content hidden">
        @include('siswa.formulir')
    </div>
    <div id="upload-berkas-content" class="content hidden">
        @include('siswa.upload-berkas')
    </div>
    <div id="pengumuman-content" class="content hidden">
        @include('siswa.pengumuman')
    </div>
    @include('siswa.review')
@endsection
