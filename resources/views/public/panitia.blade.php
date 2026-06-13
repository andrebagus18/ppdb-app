<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home | PPDB Online')</title>
      @vite(['resources/css/app.css', 'resources/js/panitia.js'])
      <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
    <h1>Selamat Datang Panitia</h1>
    <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit"
                class="w-full flex gap-3 text-lg px-4 py-2 bg-red-700 hover:bg-red-800 text-white rounded cursor-pointer">
                <i data-lucide="log-out"></i>
                <span>Logout</span>
            </button>
        </form>
    {{-- @extends('layouts.app') --}}
{{-- @section('content') --}}
<div class="p-6">
    <h1 class="text-2xl font-bold text-slate-800 mb-6">
        Daftar Pendaftar PPDB
    </h1>

    {{-- SEARCH & FILTER (nanti bisa kita aktifkan logicnya) --}}
    <div class="flex gap-3 mb-4">
        <input
            type="text"
            placeholder="Cari nama / nomor pendaftaran..."
            class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2 focus:ring-indigo-500">
        <select class="rounded-lg border border-slate-300 px-3 py-2">
            <option>Semua Jalur</option>
        </select>
        <select class="rounded-lg border border-slate-300 px-3 py-2">
            <option>Semua Status</option>
        </select>
    </div>
    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Nomor Pendaftaran</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Jalur</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations as $registration)
                    @php
                        $statusColor = match($registration->status) {
                            'terverifikasi' => 'bg-green-100 text-green-700',
                            'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
                            'ditolak' => 'bg-red-100 text-red-700',
                            default => 'bg-slate-100 text-slate-600'
                        };
                    @endphp
                    <tr class="border-t">
                        <td class="p-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="p-4 font-medium text-slate-700">
                            {{ $registration->no_daftar }}
                        </td>
                        <td class="p-4">
                            {{ $registration->student->nama_lengkap ?? '-' }}
                        </td>
                        <td class="p-4">
                            {{ $registration->jalur->nama ?? '-' }}
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                                {{ $registration->status }}
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            {{-- <a href="{{ route('panitia.show', $registration->id) }}"
                               class="text-indigo-600 hover:underline">
                                Detail
                            </a> --}}
                            <button type="button"
                                onclick="openModal({{ $registration->id }})"
                                class="text-indigo-600 hover:underline">
                                Detail
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-slate-500">
                            Belum ada data pendaftar
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{-- @endsection --}}
<div id="detailModal"
     class="hidden flex fixed inset-0 bg-black/50 items-center justify-center z-50">

    <div class="bg-white w-[750px] rounded-xl p-6 relative">

        {{-- CLOSE --}}
        {{-- <a href="{{ route('panitia.dashboard') }}"
           class="absolute top-3 right-3 text-red-500">
            ✕
        </a> --}}
        <button type="button" id="closeModal"
            class="absolute top-3 right-3 text-red-500">
            ✕
        </button>

        {{-- ISI MODAL --}}
        @if(isset($registration))

            <h2 class="text-xl font-bold mb-4">Data Pendaftar</h2>

            <p><b>Nama:</b> {{ $registration->student->nama_lengkap }}</p>
            <p><b>No:</b> {{ $registration->no_daftar }}</p>
            <p><b>Jalur:</b> {{ $registration->jalur->nama ?? '-' }}</p>
            <p><b>Status:</b> {{ $registration->status }}</p>

            <hr class="my-4">

            <h3 class="font-semibold mb-2">Dokumen</h3>

            @foreach($registration->documents as $doc)

                <div class="border p-3 rounded mb-2 flex justify-between items-center">

                    <div>
                        <p class="font-medium">{{ $doc->jenis_document }}</p>
                        <p class="text-xs">{{ $doc->status_verifikasi }}</p>

                        @if($doc->catatan)
                            <p class="text-xs text-red-500">
                                {{ $doc->catatan }}
                            </p>
                        @endif
                    </div>

                    <div class="flex gap-2">

                        <a href="{{ $doc->cloudinary_url }}"
                           target="_blank"
                           class="text-blue-600 text-sm">
                            View
                        </a>

                        {{-- APPROVE --}}
                        <form method="POST" action="{{ route('panitia.approve', $doc) }}">
                            @csrf
                            @method('PUT')
                            <button class="text-green-600 text-sm">
                                Approve
                            </button>
                        </form>

                        {{-- REJECT --}}
                        <form method="POST" action="{{ route('panitia.reject', $doc) }}">
                            @csrf
                            @method('PUT')

                            <input name="catatan"
                                   placeholder="Alasan..."
                                   class="border text-xs px-2 w-28">

                            <button class="text-red-600 text-sm">
                                Reject
                            </button>
                        </form>

                    </div>

                </div>

            @endforeach

        @endif

    </div>

</div>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('partials.flash')
</body>
</html>