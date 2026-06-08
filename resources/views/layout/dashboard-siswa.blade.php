<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard Calon Siswa')</title>
      @vite(['resources/css/app.css', 'resources/js/registration.js'])
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-[#eeeded] flex min-h-dvh">
    @include('components.aside')
<main class="flex-1 bg-gray-300/70">
    @yield('content')
</main>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://unpkg.com/lucide@latest"></script>
</body>
</html>