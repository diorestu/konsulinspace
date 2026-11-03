@extends('layouts.admin')

@section('title', 'Tambah Slide Hero Carousel')
@section('page_title', 'Tambah Slide Hero Carousel')
@section('page_subtitle', 'Upload gambar banner rasio 21:9 dan pilih opsi tampilan dengan teks atau gambar saja')

@section('topbar_actions')
<a href="{{ route('admin.hero-slides.index') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl border border-slate-200 text-slate-700 text-xs font-semibold hover:bg-slate-50 transition">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
    <span>Kembali</span>
</a>
@endsection

@section('content')
<form action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl space-y-6">
    @csrf

    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
        
        <!-- Opsi Tampilan: Text vs Images Only -->
        <div class="border-b border-slate-100 pb-6">
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-3">
                Opsi Tampilan Carousel <span class="text-rose-500">*</span>
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <label class="relative flex items-start p-4 rounded-xl border-2 cursor-pointer transition has-[:checked]:border-[#0353a4] has-[:checked]:bg-[#edf4fc]/30 border-slate-200 hover:border-slate-300">
                    <input type="radio" name="slide_type" value="with_text" id="typeWithText" {{ old('slide_type', 'with_text') === 'with_text' ? 'checked' : '' }} class="mt-1 text-[#0353a4] focus:ring-[#0353a4]">
                    <div class="ml-3">
                        <span class="block text-sm font-bold text-slate-900">Dengan Teks & Tombol CTA</span>
                        <span class="block text-xs text-slate-500 mt-0.5">Menampilkan gradient overlay elegan, badge lokasi, judul, deskripsi, dan tombol aksi di atas gambar.</span>
                    </div>
                </label>

                <label class="relative flex items-start p-4 rounded-xl border-2 cursor-pointer transition has-[:checked]:border-[#0353a4] has-[:checked]:bg-[#edf4fc]/30 border-slate-200 hover:border-slate-300">
                    <input type="radio" name="slide_type" value="image_only" id="typeImageOnly" {{ old('slide_type') === 'image_only' ? 'checked' : '' }} class="mt-1 text-[#0353a4] focus:ring-[#0353a4]">
                    <div class="ml-3">
                        <span class="block text-sm font-bold text-slate-900">Images Only (Banner Bersih)</span>
                        <span class="block text-xs text-slate-500 mt-0.5">Hanya menampilkan gambar banner penuh (tanpa teks dan tombol overlay) dalam rasio 21:9.</span>
                    </div>
                </label>
            </div>
            @error('slide_type')
            <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Upload Gambar -->
        <div class="border-b border-slate-100 pb-6 space-y-4">
            <div>
                <h3 class="text-sm font-bold text-slate-900">Upload Gambar Banner (Rasio 21:9)</h3>
                <p class="text-xs text-slate-500 mt-0.5">Disarankan gambar beresolusi minimal 2100 &times; 900 piksel dengan rasio 21:9 agar tampilan tajam dan responsif di seluruh layar.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="image_file" class="block text-xs font-semibold text-slate-700 mb-1.5">
                        Pilih File Gambar dari Komputer
                    </label>
                    <input type="file" name="image_file" id="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#edf4fc] file:text-[#0353a4] hover:file:bg-[#d6e6f9] file:cursor-pointer border border-slate-200 rounded-xl p-2">
                    @error('image_file')
                    <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image_url_input" class="block text-xs font-semibold text-slate-700 mb-1.5">
                        Atau Gunakan Link / URL Gambar Eksternal
                    </label>
                    <input type="url" name="image_url_input" id="image_url_input" value="{{ old('image_url_input') }}" placeholder="https://images.unsplash.com/photo-..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                    @error('image_url_input')
                    <p class="text-xs text-rose-600 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Kolom Teks & CTA (Hanya untuk 'with_text') -->
        <div id="textContentSection" class="space-y-6">
            <div>
                <h3 class="text-sm font-bold text-slate-900">Konten Teks & Tombol Overlay</h3>
                <p class="text-xs text-slate-400 mt-0.5">Informasi yang akan tampil di atas slide carousel.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Badge Text -->
                <div>
                    <label for="badge_text" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Label / Badge Atas
                    </label>
                    <input type="text" name="badge_text" id="badge_text" value="{{ old('badge_text') }}" placeholder="Contoh: Greenwich Business Park, BSD City" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Judul Utama Slide
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Contoh: Ruang Kerja & Virtual Office di BSD" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                </div>

                <!-- Subtitle / Deskripsi -->
                <div class="sm:col-span-2">
                    <label for="subtitle" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Deskripsi / Subtitle Slide
                    </label>
                    <textarea name="subtitle" id="subtitle" rows="3" placeholder="Deskripsi ringkas yang menarik perhatian pengunjung..." class="w-full p-4 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">{{ old('subtitle') }}</textarea>
                </div>

                <!-- CTA Primary -->
                <div>
                    <label for="cta_primary_text" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Tombol Utama (CTA 1)
                    </label>
                    <div class="space-y-2">
                        <input type="text" name="cta_primary_text" id="cta_primary_text" value="{{ old('cta_primary_text', 'Lihat Ruangan') }}" placeholder="Teks tombol (e.g. Lihat Ruangan)" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                        <input type="text" name="cta_primary_link" id="cta_primary_link" value="{{ old('cta_primary_link', '#ruangan') }}" placeholder="Link tujuan (e.g. #ruangan atau /rooms)" class="w-full px-4 py-2 rounded-xl border border-slate-200 text-xs font-mono focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                    </div>
                </div>

                <!-- CTA Secondary -->
                <div>
                    <label for="cta_secondary_text" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Tombol Kedua (CTA 2)
                    </label>
                    <div class="space-y-2">
                        <input type="text" name="cta_secondary_text" id="cta_secondary_text" value="{{ old('cta_secondary_text', 'Reservasi Sekarang') }}" placeholder="Teks tombol kedua (e.g. Reservasi Sekarang)" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                        <input type="text" name="cta_secondary_link" id="cta_secondary_link" value="{{ old('cta_secondary_link', '/kontak') }}" placeholder="Link tujuan kedua (e.g. /kontak atau wa.me/...)" class="w-full px-4 py-2 rounded-xl border border-slate-200 text-xs font-mono focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengaturan Status & Urutan -->
        <div class="border-t border-slate-100 pt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Status -->
            <div>
                <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Status Slide <span class="text-rose-500">*</span>
                </label>
                <select name="status" id="status" class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none bg-white">
                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Aktif (Ditampilkan dalam Carousel)</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Nonaktif (Draft)</option>
                </select>
            </div>

            <!-- Urutan -->
            <div>
                <label for="order_position" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                    Urutan Slide
                </label>
                <input type="number" min="0" name="order_position" id="order_position" value="{{ old('order_position', 1) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                <p class="text-[10px] text-slate-400 mt-1">Nilai lebih kecil tampil lebih awal (slide pertama).</p>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex items-center justify-end gap-3">
        <a href="{{ route('admin.hero-slides.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition">
            Batal
        </a>
        <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs transition shadow-sm shadow-[#0353a4]/30">
            Simpan Slide Carousel
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textSection = document.getElementById('textContentSection');
        const radioWithText = document.getElementById('typeWithText');
        const radioImageOnly = document.getElementById('typeImageOnly');

        function toggleTextSection() {
            if (radioImageOnly.checked) {
                textSection.classList.add('opacity-40', 'pointer-events-none');
            } else {
                textSection.classList.remove('opacity-40', 'pointer-events-none');
            }
        }

        radioWithText.addEventListener('change', toggleTextSection);
        radioImageOnly.addEventListener('change', toggleTextSection);
        toggleTextSection();
    });
</script>
@endsection
