<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home | PPDB Online')</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#eeeded]">
    @include('components.navbar')
    <main class="px-16">
        @yield('content')
    </main>
    @include('components.footer')
</body>
</html>