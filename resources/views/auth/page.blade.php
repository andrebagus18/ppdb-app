<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Login | Register')</title>
    @vite(['resources/css/app.css', 'resources/js/auth.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body class="bg-[#eeeded]">
    <div class="max-w-2xl mx-auto rounded-xl pb-8 pt-6">
        <div class="mx-auto mt-10 max-w-md overflow-hidden rounded-3xl shadow-xl backdrop-blur-sm bg-slate/90">
            <!-- HEADER -->
            <div id="header" class="bg-green-500 px-8 py-8 text-center transition-all duration-500">
                <img src="{{ asset('images/login.png') }}" alt="Logo"
                    class="mx-auto mb-3 h-20 w-20 rounded-full bg-white p-2 shadow-lg">
                <h1 class="text-4xl font-bold text-white">
                    PPDB SMKN 45 MERDEKA
                </h1>
                <p id="subtitle" class="mt-2 text-md text-white/90">
                    Masuk untuk melanjutkan pendaftaran
                </p>
                <!-- TOGGLE -->
                <div class="relative mx-auto mt-6 flex h-14 w-72 rounded-full bg-black/10 p-1">
                    <div id="slider"
                        class="absolute left-1 top-1 h-12 w-[calc(50%-4px)] rounded-full bg-white shadow-md transition-all duration-500">
                    </div>
                    <button id="loginTab" type="button"
                        class="relative z-10 flex-1 font-semibold text-green-700 cursor-pointer">
                        Login
                    </button>
                    <button id="registerTab" type="button"
                        class="relative z-10 flex-1 font-semibold text-white cursor-pointer">
                        Register
                    </button>
                </div>
            </div>
            <div id="formContainer" class="overflow-hidden transition-all duration-500">
                <div id="formWrapper" class="flex w-[200%] items-start transition-all duration-500 ease-in-out">
                    <!-- LOGIN -->
                    <div id="loginForm" class="w-1/2 p-8 pt-6">
                        <h2 class="mb-2 text-center text-2xl font-bold">
                            Login
                        </h2>
                        <p class="mb-6 text-center text-slate-500">
                            Silakan login untuk melanjutkan
                        </p>
                        <form action="/auth/login" method="POST">
                            @csrf
                            <input type="hiden" name="form_type" value="login">
                            <div class="mb-4">
                                <label class="mb-2 block font-medium">
                                    📧 Email
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                                    placeholder="Masukkan email">
                            </div>
                            <div class="mb-6">
                                <label class="mb-2 block font-medium">
                                    🔒 Password
                                </label>
                                <div class="relative">
                                    <input id="loginPassword" type="password" name="password"
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 pr-12"
                                        placeholder="Masukkan password">
                                    <button type="button"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 cursor-pointer"
                                        onclick="togglePassword('loginPassword', this)">
                                        🔓
                                    </button>
                                </div>
                                <div class="mt-2 flex justify-end">
                                    <a href="#" class="text-sm text-blue-600 hover:underline">
                                        Lupa Password?
                                    </a>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full rounded-xl bg-green-500 py-3 font-semibold text-white hover:bg-green-600 cursor-pointer">
                                Login
                            </button>
                        </form>
                    </div>
                    <!-- REGISTER -->
                    <div id="registerForm" class="w-1/2 p-8 pt-6">
                        <h2 class="mb-2 text-center text-2xl font-bold">
                            Register
                        </h2>
                        <p class="mb-6 text-center text-slate-500">
                            Buat akun untuk memulai pendaftaran
                        </p>
                        <form action="/auth/register" method="POST">
                            @csrf
                            <input type="hiden" name="form_type" value="register">
                            <div class="mb-4">
                                <label class="mb-2 block font-medium">
                                    👤 Nama Lengkap
                                </label>
                                <input type="text" name="name"
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                                    placeholder="Masukkan nama lengkap">
                            </div>
                            <div class="mb-4">
                                <label class="mb-2 block font-medium">
                                    📧 Email
                                </label>
                                <input type="email" name="email"
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                                    placeholder="Masukkan email">
                            </div>
                            <div class="mb-6">
                                <label class="mb-2 block font-medium">
                                    🔒 Password
                                </label>
                                <div class="relative">
                                    <input id="registerPassword" type="password" name="password"
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 pr-12"
                                        placeholder="Minimal 8 karakter">
                                    <button type="button"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 cursor-pointer"
                                        onclick="togglePassword('registerPassword', this)">
                                        🔓
                                    </button>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label class="flex items-start gap-3">
                                    <input type="checkbox" required class="mt-1 h-4 w-4 cursor-pointer">
                                    <span class="text-sm text-slate-600">
                                        Saya menyetujui <span class="text-blue-600">syarat dan ketentuan PPDB</span>
                                        serta menyatakan bahwa data yang saya masukkan adalah benar.
                                    </span>
                                </label>
                            </div>
                            <button type="submit"
                                class="w-full rounded-xl bg-blue-500 py-3 font-semibold text-white hover:bg-blue-600 cursor-pointer">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('partials.flash')
</body>

</html>
