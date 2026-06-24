@extends('layout.dashboard-admin')
@section('content')
    <div
        class="bg-sky-900/30 border-b-2 border-b-sky-700 font-bold text-white text-xl w-full p-6 h-15 flex items-center justify-between">
        <h2 id="navbar-title" class="text-white text-xl">Laporan</h2>
        <div class="flex items-center justify-center gap-2">
            <div class="flex flex-col items-end">
                <h3 class="text-xl font-medium capitalize">{{ Auth::user()->name }}</h3>
                <p class="text-sm font-medium">{{ role(Auth::user()->role) }}</p>
            </div>
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-sky-900/50 text-white">
                {{ getInitial(Auth::user()->name) }}
            </div>
        </div>
    </div>
    <div id="dashboard-content" class="content">
        @include('public.admin.content.laporan')
    </div>
@endsection
