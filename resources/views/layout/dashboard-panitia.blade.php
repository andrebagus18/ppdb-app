<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard Panitia')</title>
    @vite(['resources/css/app.css', 'resources/js/panitia.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

</head>

<body class="bg-[#eeeded] flex min-h-dvh">
    @include('components.aside')
    <main class="flex-1 bg-gray-300/70">
        @yield('content')
    </main>
    <script>
        const registrations = @json($registrations->values());
        const csrf = '{{ csrf_token() }}';
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
    @include('partials.flash')
</body>

</html>
