<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/admin.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body class="flex min-h-dvh">
    @include('components.aside')
    {{-- <button onclick="testAlert()" class="px-4 py-2 bg-blue-500 text-white">
    Test Alert
</button> --}}


    <main class="flex-1 bg-slate-950">
        @yield('content')
    </main>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script>
function testAlert() {
    Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: 'Testing',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            iconColor: '#ef4444',
            showClass: {
                popup: 'animate__animated animate__slideInRight'
            },
            hideClass: {
                popup: 'animate__animated animate__slideOutRight'
            },
            customClass: {
                popup: 'swal-error'
            }
        });
}
</script> --}}
    @stack('scripts')
    @include('partials.flash')
</body>

</html>
