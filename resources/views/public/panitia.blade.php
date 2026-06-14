@extends('layout.dashboard-panitia')
@section('content')
    <div class="bg-emerald-600 font-bold text-white text-xl w-full p-6 h-10 flex items-center justify-start">
        <h1>Panitia PPDB</h1>
    </div>
    <div id="dashboard-content" class="content">
        @include('panitia.info')
    </div>
    <div id="pendaftaran-content" class="content hidden">
        @include('panitia.pendaftaran')
    </div>
    <div id="verifikasi-content" class="content hidden">
        @include('panitia.verifikasi')
    </div>
@endsection
