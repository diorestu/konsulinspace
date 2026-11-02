<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - KonsulinSpace Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Logo & Brand Header -->
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-400 flex items-center justify-center text-white font-black text-2xl mx-auto mb-3 shadow-lg shadow-emerald-500/30">
                K
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Konsulin<span class="text-emerald-400">Space</span></h1>
            <p class="text-slate-400 text-sm mt-1">Portal Admin & Manajemen Ruangan</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 border border-slate-100">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-slate-900">Masuk ke Dashboard</h2>
                <p class="text-xs text-slate-500 mt-1">Masukkan kredensial administrator Anda untuk melanjutkan.</p>
            </div>

            <!-- Demo Credentials Helper -->
            <div class="mb-6 p-3.5 bg-emerald-50 rounded-xl border border-emerald-200 text-xs text-emerald-800">
                <div class="flex items-center gap-1.5 font-bold mb-1 text-emerald-900">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Kredensial Default:
                </div>
                <div class="flex flex-col gap-0.5 text-slate-700">
                    <p><span class="font-medium">Email:</span> <code class="bg-emerald-100/60 px-1.5 py-0.5 rounded text-emerald-900 font-mono">admin@konsulinspace.com</code></p>
                    <p><span class="font-medium">Password:</span> <code class="bg-emerald-100/60 px-1.5 py-0.5 rounded text-emerald-900 font-mono">password</code></p>
                </div>
            </div>

            @if($errors->any())
            <div class="mb-4 p-3 bg-rose-50 border border-rose-200 rounded-xl text-xs text-rose-700">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Email Administrator</label>
                    <input type="email" name="email" id="email" required autofocus value="{{ old('email', 'admin@konsulinspace.com') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm outline-none transition" placeholder="admin@konsulinspace.com">
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">Password</label>
                    <input type="password" name="password" id="password" required value="password" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm outline-none transition" placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 text-slate-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300" checked>
                        <span>Ingat Sesi Saya</span>
                    </label>
                    <a href="{{ route('home') }}" class="text-emerald-600 hover:text-emerald-700 font-medium">Kembali ke Web</a>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 px-4 rounded-xl bg-emerald-600 text-white font-semibold text-sm hover:bg-emerald-700 active:scale-98 transition shadow-md shadow-emerald-600/30">
                        Masuk ke Admin Panel
                    </button>
                </div>
            </form>
        </div>

        <p class="text-center text-xs text-slate-500 mt-6">&copy; {{ date('Y') }} KonsulinSpace Management System</p>
    </div>

</body>
</html>
