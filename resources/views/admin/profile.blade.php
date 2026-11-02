@extends('layouts.admin')

@section('title', 'Profil & Pengaturan Akun')
@section('page_title', 'Profil & Pengaturan Akun')
@section('page_subtitle', 'Perbarui informasi akun administrator dan kata sandi masuk')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
        <div class="border-b border-slate-100 pb-4 flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-[#0353a4] text-white font-black text-2xl flex items-center justify-center shadow-md shadow-[#0353a4]/30">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900">{{ $user->name }}</h3>
                <p class="text-xs text-slate-500">{{ $user->email }} &bull; Role: <span class="text-[#0353a4] font-semibold uppercase">{{ $user->role }}</span></p>
            </div>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Lengkap</label>
                <input type="text" name="name" id="name" required value="{{ old('name', $user->name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none">
            </div>

            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Alamat Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email', $user->email) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none">
            </div>

            <div>
                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nomor Handphone / WhatsApp</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" placeholder="Contoh: 0812-9876-5432" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none">
            </div>

            <div class="pt-4 border-t border-slate-100 space-y-4">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">Ubah Kata Sandi (Opsional)</h4>
                <p class="text-xs text-slate-400">Kosongkan kolom sandi jika Anda tidak ingin mengubahnya.</p>

                <div>
                    <label for="current_password" class="block text-xs font-medium text-slate-600 mb-1">Password Saat Ini</label>
                    <input type="password" name="current_password" id="current_password" class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none" placeholder="••••••••">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="new_password" class="block text-xs font-medium text-slate-600 mb-1">Password Baru</label>
                        <input type="password" name="new_password" id="new_password" class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none" placeholder="Minimal 6 karakter">
                    </div>
                    <div>
                        <label for="new_password_confirmation" class="block text-xs font-medium text-slate-600 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none" placeholder="Ulangi password baru">
                    </div>
                </div>
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-bold text-sm shadow-sm transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
