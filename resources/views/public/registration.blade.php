<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Pendaftaran')</title>
      @vite(['resources/css/app.css', 'resources/js/registration.js'])
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-[#eeeded]">
        <div id="alertBox" class="hidden">
            <div>
                <p id="alertMessage" class="text-xl"></p>
            </div>
        </div>
    <div class="max-w-3xl mx-auto rounded-xl pb-8 pt-6">
        <div class="flex bg-teal-700 items-center justify-start p-8 shadow-xl">
            <div class="relatif bg-white flex items-center">
            <div class="step-number absolute flex items-center justify-center w-10 h-10 rounded-full border-2 border-white text-black text-xl font-bold shadow">1</div>
            <div class="h-0.5 w-42 bg-slate-300"></div>
            </div>
            <div class="relatif bg-white flex items-center">
            <div class="step-number absolute flex items-center justify-center w-10 h-10 rounded-full border-2 border-white text-black text-xl font-bold shadow">2</div>
            <div class="h-0.5 w-42 bg-slate-300"></div>
            </div>
            <div class="relatif bg-white flex items-center">
            <div class="step-number absolute flex items-center justify-center w-10 h-10 rounded-full border-2 border-white text-black text-xl font-bold shadow">3</div>
            <div class="h-0.5 w-42 bg-slate-300"></div>
            </div>
            <div class="relatif bg-white flex items-center">
            <div class="step-number absolute flex items-center justify-center w-10 h-10 rounded-full border-2 border-white text-black text-xl font-bold shadow">4</div>
            <div class="h-0.5 w-42 bg-slate-300"></div>
            </div>
            <div class="relatif bg-white flex items-center">
            <div class="step-number absolute flex items-center justify-center w-10 h-10 rounded-full border-2 border-white text-black text-xl font-bold shadow">5</div>
            </div>
        </div>
        <div class="w-full bg-white p-5">
            <div class="flex items-center justify-center mb-5">
                <h2 class="text-3xl font-semibold text-black mb-2">Formulir Pendaftaran</h2>
            </div>
            @csrf
            @include('partials.biodata')
            @include('partials.orang-tua')
            @include('partials.nilai-jalur')
            @include('partials.upload-berkas')
            @include('partials.review')
        </div>
    </div>
    <!-- MODAL ALERT -->
{{-- <div id="modal" class=" inset-0 hidden items-center justify-center z-50"> --}}
    
{{-- </div> --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>
</html>