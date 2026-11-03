@extends('layouts.admin')

@section('title', 'Edit Paket ' . $package->name)
@section('page_title', 'Edit Paket Virtual Office')
@section('page_subtitle', 'Perbarui informasi harga, fasilitas, urutan, atau status ketersediaan paket ' . $package->name)

@section('topbar_actions')
<div class="flex items-center gap-2">
    <a href="{{ route('admin.virtual-offices.index') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl border border-slate-200 text-slate-700 text-xs font-semibold hover:bg-slate-50 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        <span>Kembali</span>
    </a>
</div>
@endsection

@section('content')
<form action="{{ route('admin.virtual-offices.update', $package->id) }}" method="POST" class="max-w-4xl space-y-6">
    @csrf
    @method('PUT')

    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
        <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-slate-900">Detail Paket: {{ $package->name }}</h2>
                <p class="text-xs text-slate-400 mt-0.5">Ubah nama paket, harga, dan daftar fasilitas yang disediakan.</p>
            </div>
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $package->status === 'active' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600' }}">
                {{ $package->status === 'active' ? 'Aktif' : 'Nonaktif' }}
            </span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Nama Paket -->
            <div class="sm:col-span-2">
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Nama Paket <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $package->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                @error('name')
                <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tagline / Ringkasan -->
            <div class="sm:col-span-2">
                <label for="tagline" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Tagline / Deskripsi Singkat
                </label>
                <input type="text" name="tagline" id="tagline" value="{{ old('tagline', $package->tagline) }}" placeholder="Contoh: Solusi alamat legalitas resmi untuk PT & CV berkembang" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                @error('tagline')
                <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <!-- Harga Bulanan -->
            <div>
                <label for="price_monthly" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Harga Per Bulan (Rp) <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-3.5 top-2.5 text-xs font-bold text-slate-400">Rp</span>
                    <input type="number" step="1000" min="0" name="price_monthly" id="price_monthly" value="{{ old('price_monthly', (int)$package->price_monthly) }}" required class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                </div>
                @error('price_monthly')
                <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <!-- Harga Tahunan -->
            <div>
                <label for="price_yearly" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Harga Per Tahun (Rp) <span class="text-xs font-normal text-slate-400 lowercase">(opsional)</span>
                </label>
                <div class="relative">
                    <span class="absolute left-3.5 top-2.5 text-xs font-bold text-slate-400">Rp</span>
                    <input type="number" step="1000" min="0" name="price_yearly" id="price_yearly" value="{{ old('price_yearly', $package->price_yearly ? (int)$package->price_yearly : '') }}" placeholder="4800000" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                </div>
                @error('price_yearly')
                <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Fasilitas Textarea -->
        <div class="border-t border-slate-100 pt-6">
            <div class="flex items-center justify-between mb-2">
                <label for="features_text" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                    Fasilitas yang Didapat <span class="text-rose-500">*</span>
                </label>
                <span class="text-xs text-slate-400 font-mono">
                    {{ is_array($package->features) ? count($package->features) : 0 }} fasilitas aktif
                </span>
            </div>
            <textarea name="features_text" id="features_text" rows="6" class="w-full p-4 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none font-mono text-xs leading-relaxed">{{ old('features_text', $featuresText) }}</textarea>
            <p class="text-[11px] text-slate-400 mt-1.5 flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#0353a4] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Tuliskan <strong>satu fasilitas per baris</strong>. Format bullet / strip otomatis dirapikan oleh sistem.</span>
            </p>
            @error('features_text')
            <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div class="border-t border-slate-100 pt-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
            <!-- Status -->
            <div>
                <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Status Publikasi <span class="text-rose-500">*</span>
                </label>
                <select name="status" id="status" class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none bg-white">
                    <option value="active" {{ old('status', $package->status) === 'active' ? 'selected' : '' }}>Aktif (Ditampilkan)</option>
                    <option value="inactive" {{ old('status', $package->status) === 'inactive' ? 'selected' : '' }}>Nonaktif (Draft)</option>
                </select>
                @error('status')
                <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order Position -->
            <div>
                <label for="order_position" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Urutan Tampilan
                </label>
                <input type="number" min="0" name="order_position" id="order_position" value="{{ old('order_position', $package->order_position) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                <p class="text-[10px] text-slate-400 mt-1">Nilai lebih kecil tampil paling kiri/pertama.</p>
                @error('order_position')
                <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Popular Toggle -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Badge & Penekanan
                </label>
                <label class="flex items-center gap-3 p-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer">
                    <input type="checkbox" name="is_popular" value="1" {{ old('is_popular', $package->is_popular) ? 'checked' : '' }} class="w-4 h-4 text-[#0353a4] rounded focus:ring-[#0353a4] border-slate-300">
                    <span class="text-xs font-semibold text-slate-800">Paket Paling Populer</span>
                </label>
                <p class="text-[10px] text-slate-400 mt-1">Akan diberi bingkai aksen dan badge 'Paling Populer'.</p>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- CTA Text -->
            <div>
                <label for="cta_text" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Teks Tombol Aksi (CTA)
                </label>
                <input type="text" name="cta_text" id="cta_text" value="{{ old('cta_text', $package->cta_text) }}" placeholder="Contoh: Pilih Gold / Hubungi Sales" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
            </div>

            <!-- CTA Link -->
            <div>
                <label for="cta_link" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Link Tujuan Tombol (Opsional)
                </label>
                <input type="text" name="cta_link" id="cta_link" value="{{ old('cta_link', $package->cta_link) }}" placeholder="Kosongkan untuk otomatis mengarah ke kontak" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex items-center justify-between">
        <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus paket Virtual Office ini?')) { document.getElementById('deleteForm').submit(); }" class="px-4 py-2 rounded-xl text-rose-600 hover:text-rose-700 hover:bg-rose-50 text-xs font-semibold transition">
            Hapus Paket Ini
        </button>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.virtual-offices.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs transition shadow-sm shadow-[#0353a4]/30">
                Simpan Perubahan
            </button>
        </div>
    </div>
</form>

<form id="deleteForm" action="{{ route('admin.virtual-offices.destroy', $package->id) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>
@endsection
