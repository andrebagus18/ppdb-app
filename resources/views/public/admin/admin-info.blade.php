@extends('layout.dashboard-admin')
@section('content')
    <div
        class="bg-sky-900/30 border-b-2 border-b-sky-700 font-bold text-white text-xl w-full p-6 h-15 flex items-center justify-between backdrop-blur-2xl">
        <h2 id="navbar-title" class="text-white text-xl">Dashboard</h2>
        <div class="flex items-center justify-center gap-2">
            <div class="flex flex-col items-end">
                <h3 class="text-xl font-medium capitalize">{{ Auth::user()->name }}</h3>
                <p class="text-sm font-medium">{{ role(Auth::user()->role) }}</p>
            </div>
            <div
                class="flex items-center justify-center w-10 h-10 rounded-full bg-sky-900/50 text-white border-2 border-sky-700">
                {{ getInitial(Auth::user()->name) }}
            </div>
        </div>
    </div>
    <div id="dashboard-content" class="content">
        @include('public.admin.content.info')
    </div>
@endsection
