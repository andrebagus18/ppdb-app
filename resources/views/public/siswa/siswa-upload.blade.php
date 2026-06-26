@extends('layout.dashboard-siswa')
@section('content')
    <div class="bg-blue-500 font-bold text-white text-xl w-full p-6 h-15 flex items-center justify-between">
        <h2 class="text-white text-xl">Dashboard</h2>
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
    <div id="upload-berkas-content" class="content">
        @include('public.siswa.content.upload-berkas')
    </div>
@endsection
