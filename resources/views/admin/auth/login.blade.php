<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - KonsulinSpace Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="bg-[#001845] min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Logo & Brand Header -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo-white.png') }}" alt="KonsulinSpace Logo" class="h-16 w-auto object-contain mx-auto mb-3">
            <p class="text-slate-400 text-sm">Portal Admin & Manajemen Ruangan</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 border border-slate-100">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-slate-900">Masuk ke Dashboard</h2>
                <p class="text-xs text-slate-500 mt-1">Masukkan kredensial administrator Anda untuk melanjutkan.</p>
            </div>

            <!-- Demo Credentials Helper -->
            <div class="mb-6 p-3.5 bg-[#edf4fc] rounded-xl border border-[#b0d0f4] text-xs text-[#023e7d]">
                <div class="flex items-center gap-1.5 font-bold mb-1 text-[#002855]">
                    <svg class="w-4 h-4 text-[#0353a4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Kredensial Default:
                </div>
                <div class="flex flex-col gap-0.5 text-slate-700">
                    <p><span class="font-medium">Email:</span> <code class="bg-[#d6e6f9] px-1.5 py-0.5 rounded text-[#002855] font-mono">admin@konsulinspace.com</code></p>
                    <p><span class="font-medium">Password:</span> <code class="bg-[#d6e6f9] px-1.5 py-0.5 rounded text-[#002855] font-mono">password</code></p>
                </div>
            </div>

            @if($errors->any())
            <div class="mb-4 p-3 bg-rose-50 border border-rose-200 rounded-xl text-xs text-rose-700">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf

                <x-input type="email" name="email" label="Email Administrator" required autofocus value="admin@konsulinspace.com" placeholder="admin@konsulinspace.com" />

                <x-input type="password" name="password" label="Password" required value="password" placeholder="••••••••" />

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 text-slate-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded text-[#0353a4] focus:ring-[#0353a4] border-slate-300" checked>
                        <span>Ingat Sesi Saya</span>
                    </label>
                    <a href="{{ route('home') }}" class="text-[#0353a4] hover:text-[#023e7d] font-medium">Kembali ke Web</a>
                </div>

                <div class="pt-2">
                    <x-button type="submit" variant="primary" class="w-full py-3">
                        Masuk ke Admin Panel
                    </x-button>
                </div>
            </form>
        </div>

        <p class="text-center text-xs text-slate-500 mt-6">&copy; {{ date('Y') }} KonsulinSpace Management System</p>
    </div>

</body>
</html>
