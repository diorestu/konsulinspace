@extends('layouts.app')

@section('title', 'KonsulinSpace - Modern Co-Working Space & Virtual Office Jakarta')
@section('meta_description', 'KonsulinSpace menghadirkan ruang kerja bersama fleksibel, private office, meeting room, dan legalitas alamat virtual office prestisius di pusat bisnis Jakarta.')

@section('content')

<!-- Hero Section -->
<section class="relative bg-[#001845] text-white overflow-hidden pt-12 pb-24 lg:pt-20 lg:pb-32">
    <!-- Ambient Background Glows -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#0353a4]/25 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#0466c8]/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Headline -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#0353a4]/30 border border-[#0466c8]/40 text-[#b0d0f4] text-xs font-semibold tracking-wide">
                    <span class="w-2 h-2 rounded-full bg-[#0466c8] animate-pulse"></span>
                    Alamat Komersial Prestisius di Segitiga Emas Jakarta
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
                    Ruang Kerja & <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#75afee] via-[#388de6] to-[#b0d0f4]">Virtual Office</span> Masa Depan Bisnis Anda
                </h1>

                <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Kembangkan bisnis dan startup Anda dengan infrastruktur enterprise kelas dunia, legalitas domisili zonasi perkantoran komersial resmi, dan ruang kerja kolaboratif yang dirancang untuk produktivitas maksimal.
                </p>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="#ruangan" class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-bold text-sm text-center shadow-lg shadow-[#0353a4]/30 active:scale-95 transition">
                        Jelajahi Ruangan Tersedia
                    </a>
                    <a href="#virtual-office" class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-[#002855] hover:bg-[#023e7d] border border-[#0466c8]/40 text-slate-200 font-bold text-sm text-center transition">
                        Paket Virtual Office
                    </a>
                </div>

                <!-- Live stats -->
                <div class="pt-8 grid grid-cols-2 sm:grid-cols-4 gap-4 border-t border-[#023e7d]/60 text-left">
                    <div>
                        <p class="text-2xl font-bold text-white">3</p>
                        <p class="text-xs text-slate-400">Lokasi Prime Sudirman</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-[#75afee]">100%</p>
                        <p class="text-xs text-slate-400">Izin Domisili & PKP</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white">1.500+</p>
                        <p class="text-xs text-slate-400">Member Aktif</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white">300 Mbps</p>
                        <p class="text-xs text-slate-400">High-speed Internet</p>
                    </div>
                </div>
            </div>

            <!-- Right Hero Card / Visual Preview -->
            <div class="lg:col-span-5">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-[#023e7d] bg-[#002855]">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1000&q=80" alt="KonsulinSpace Coworking Lounge" class="w-full h-80 sm:h-96 object-cover hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#001845] via-[#002855]/40 to-transparent"></div>

                        <!-- Float Card Information -->
                        <div class="absolute bottom-6 left-6 right-6 p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-white">
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xs font-semibold uppercase tracking-wider text-[#75afee]">Hub Utama KonsulinSpace</span>
                                    <h4 class="text-base font-bold text-white">Artha Sudirman Suites</h4>
                                    <p class="text-xs text-slate-300 mt-0.5">Lantai 2-5, Jl. Jendral Sudirman Kav. 28</p>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-[#0466c8] text-white shadow-xs">
                                    Buka 24/7
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Layanan Unggulan -->
<section id="layanan" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-xs font-bold uppercase tracking-widest text-[#0353a4] block mb-2">Solusi Ruang Kerja Terpadu</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kebutuhan Bisnis Anda, Kami Sediakan</h2>
            <p class="text-sm text-slate-500 mt-3 leading-relaxed">
                Dari freelancer individu hingga tim korporat berskala puluhan orang, pilih fleksibilitas ruang kerja yang tepat untuk efisiensi operasional Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- 1. Co-Working Space -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-[#0353a4] hover:shadow-lg hover:-translate-y-1 transition duration-200 group">
                <div class="w-12 h-12 rounded-xl bg-[#edf4fc] text-[#0353a4] flex items-center justify-center mb-5 group-hover:bg-[#0353a4] group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#0353a4] transition">Co-Working Space</h3>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Hot desk fleksibel & dedicated desk pribadi dengan kursi ergonomis, stopkontak melimpah, dan kopi gratis sepuasnya.
                </p>
                <a href="#ruangan" class="inline-flex items-center gap-1 text-xs font-semibold text-[#0353a4] mt-4 group-hover:gap-2 transition-all">
                    Lihat Pilihan Hot Desk &rarr;
                </a>
            </div>

            <!-- 2. Virtual Office -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-[#0353a4] hover:shadow-lg hover:-translate-y-1 transition duration-200 group">
                <div class="w-12 h-12 rounded-xl bg-[#edf4fc] text-[#023e7d] flex items-center justify-center mb-5 group-hover:bg-[#023e7d] group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#023e7d] transition">Virtual Office</h3>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Alamat komersial resmi untuk perizinan PT, CV, dan PKP lengkap dengan layanan penerimaan surat serta nomor telepon eksklusif.
                </p>
                <a href="#virtual-office" class="inline-flex items-center gap-1 text-xs font-semibold text-[#023e7d] mt-4 group-hover:gap-2 transition-all">
                    Lihat Paket Virtual Office &rarr;
                </a>
            </div>

            <!-- 3. Meeting Room -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-[#0353a4] hover:shadow-lg hover:-translate-y-1 transition duration-200 group">
                <div class="w-12 h-12 rounded-xl bg-[#edf4fc] text-[#0466c8] flex items-center justify-center mb-5 group-hover:bg-[#0466c8] group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#0466c8] transition">Meeting Rooms</h3>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Ruang rapat modern berfasilitas video conference 4K, smart TV interaktif, acoustic wall kedap suara, dan butler presentation.
                </p>
                <a href="#ruangan" class="inline-flex items-center gap-1 text-xs font-semibold text-[#0466c8] mt-4 group-hover:gap-2 transition-all">
                    Sewa Meeting Room &rarr;
                </a>
            </div>

            <!-- 4. Private Office -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-[#0353a4] hover:shadow-lg hover:-translate-y-1 transition duration-200 group">
                <div class="w-12 h-12 rounded-xl bg-[#edf4fc] text-[#002855] flex items-center justify-center mb-5 group-hover:bg-[#002855] group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#002855] transition">Private Office Suite</h3>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Kantor privat siap huni untuk tim 2 hingga 20 orang dengan kunci RFID mandiri, pembersihan harian, dan gratis kuota rapat.
                </p>
                <a href="#ruangan" class="inline-flex items-center gap-1 text-xs font-semibold text-[#002855] mt-4 group-hover:gap-2 transition-all">
                    Lihat Unit Private Suite &rarr;
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Katalog Ruangan Tersedia (With Category Filter) -->
<section id="ruangan" class="py-20 bg-slate-100/60 border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-[#0353a4] block mb-1.5">Koleksi Ruangan & Paket</span>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Pilih Ruang Kerja Sesuai Kebutuhan Anda</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">Seluruh unit ruangan dilengkapi media foto & video informatif</p>
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 sm:pb-0 scrollbar-none">
                <a href="{{ route('home') }}?category=all#ruangan" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition shrink-0 {{ $selectedCategory === 'all' ? 'bg-[#0353a4] text-white shadow-sm shadow-[#0353a4]/30' : 'bg-white text-slate-700 hover:bg-slate-200' }}">
                    Semua ({{ \App\Models\Room::count() }})
                </a>
                <a href="{{ route('home') }}?category=coworking#ruangan" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition shrink-0 {{ $selectedCategory === 'coworking' ? 'bg-[#0353a4] text-white shadow-sm shadow-[#0353a4]/30' : 'bg-white text-slate-700 hover:bg-slate-200' }}">
                    Co-Working
                </a>
                <a href="{{ route('home') }}?category=meeting_room#ruangan" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition shrink-0 {{ $selectedCategory === 'meeting_room' ? 'bg-[#0353a4] text-white shadow-sm shadow-[#0353a4]/30' : 'bg-white text-slate-700 hover:bg-slate-200' }}">
                    Meeting Room
                </a>
                <a href="{{ route('home') }}?category=private_office#ruangan" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition shrink-0 {{ $selectedCategory === 'private_office' ? 'bg-[#0353a4] text-white shadow-sm shadow-[#0353a4]/30' : 'bg-white text-slate-700 hover:bg-slate-200' }}">
                    Private Office
                </a>
                <a href="{{ route('home') }}?category=virtual_office#ruangan" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition shrink-0 {{ $selectedCategory === 'virtual_office' ? 'bg-[#0353a4] text-white shadow-sm shadow-[#0353a4]/30' : 'bg-white text-slate-700 hover:bg-slate-200' }}">
                    Virtual Office
                </a>
                <a href="{{ route('home') }}?category=event_space#ruangan" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition shrink-0 {{ $selectedCategory === 'event_space' ? 'bg-[#0353a4] text-white shadow-sm shadow-[#0353a4]/30' : 'bg-white text-slate-700 hover:bg-slate-200' }}">
                    Event Hall
                </a>
            </div>
        </div>

        <!-- Rooms Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($rooms as $room)
            @php
                $videoMedia = $room->media->firstWhere('file_type', 'video');
                $totalMedia = $room->media->count();
            @endphp
            <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
                <!-- Thumbnail / Media Showcase -->
                <div class="relative aspect-[16/10] overflow-hidden bg-slate-900">
                    <img src="{{ $room->thumbnail_url }}" alt="{{ $room->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>

                    <!-- Category Badge -->
                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-bold bg-white/95 text-slate-900 shadow-xs backdrop-blur-xs">
                        {{ $room->category_label }}
                    </span>

                    <!-- Media Indicators (Video & Photo counter) -->
                    <div class="absolute bottom-3 left-3 flex items-center gap-1.5">
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-lg text-[11px] font-semibold bg-slate-900/80 backdrop-blur-xs text-white">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $totalMedia }} File
                        </span>
                        @if($videoMedia)
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg text-[11px] font-bold bg-rose-600 text-white shadow-xs">
                            <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4z"/></svg>
                            Video
                        </span>
                        @endif
                    </div>

                    <!-- Status Indicator -->
                    <span class="absolute top-3 right-3 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-[#0466c8] text-white shadow-xs">
                        Tersedia
                    </span>
                </div>

                <!-- Card Body -->
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <!-- Title & Location -->
                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#0353a4] transition">
                            <a href="{{ route('rooms.show', $room->slug) }}">
                                {{ $room->name }}
                            </a>
                        </h3>
                        <p class="text-xs text-slate-400 mt-1 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $room->location_floor ?: 'Gedung Konsulin Sudirman' }}
                        </p>

                        <!-- Capacity & Area pill -->
                        <div class="flex items-center gap-2 mt-3 text-xs text-slate-600">
                            @if($room->capacity)
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-slate-100 font-medium">
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                {{ $room->capacity }}
                            </span>
                            @endif
                            @if($room->area_sqm)
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-slate-100 font-medium">
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                                {{ $room->area_sqm }}
                            </span>
                            @endif
                        </div>

                        <!-- Amenities tags -->
                        @if(!empty($room->amenities) && is_array($room->amenities))
                        <div class="flex items-center gap-1.5 flex-wrap mt-3.5">
                            @foreach(array_slice($room->amenities, 0, 3) as $amenity)
                            <span class="px-2 py-0.5 rounded text-[11px] bg-[#edf4fc] text-[#023e7d] font-medium border border-[#b0d0f4]">
                                {{ $amenity }}
                            </span>
                            @endforeach
                            @if(count($room->amenities) > 3)
                            <span class="text-[10px] text-slate-400 font-medium">+{{ count($room->amenities) - 3 }} lainnya</span>
                            @endif
                        </div>
                        @endif
                    </div>

                    <!-- Pricing & Action Buttons -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block">Mulai Dari</span>
                            <span class="text-base font-extrabold text-slate-900">{{ $room->formatted_price }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('rooms.show', $room->slug) }}" class="px-4 py-2 rounded-xl bg-[#002855] hover:bg-[#0353a4] text-white text-xs font-bold transition">
                                Detail Ruangan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-slate-200">
                <p class="text-base font-bold text-slate-700">Tidak ada ruangan dalam kategori ini</p>
                <p class="text-xs text-slate-400 mt-1">Silakan pilih kategori lain atau hubungi admin untuk ketersediaan khusus.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Virtual Office Special Pricing Section -->
<section id="virtual-office" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-[#0353a4] block mb-2">Legalitas & Domisili Perusahaan</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Paket Jasa Virtual Office Prestisius</h2>
            <p class="text-sm text-slate-500 mt-3 leading-relaxed">
                Tingkatkan kepercayaan klien dan investor dengan alamat bisnis bergengsi di Jakarta Pusat tanpa biaya sewa gedung fisik konvensional yang mahal.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Plan 1: Silver Starter -->
            <div class="rounded-3xl p-8 border border-slate-200 bg-white shadow-xs flex flex-col justify-between hover:border-[#0353a4] transition duration-300">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Silver Starter</h3>
                    <p class="text-xs text-slate-500 mt-1">Cocok untuk freelancer, perintis usaha & kantor perwakilan cabang.</p>
                    <div class="mt-6 mb-6">
                        <span class="text-3xl font-extrabold text-slate-900">Rp 350.000</span>
                        <span class="text-xs text-slate-500">/ bulan (ditagih per tahun)</span>
                    </div>

                    <ul class="space-y-3 text-xs text-slate-600 border-t border-slate-100 pt-6">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Alamat Bisnis Komersial Bergengsi</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Layanan Penerimaan Surat & Dokumen</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Notifikasi Surat Masuk via WhatsApp Realtime</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Diskon 20% Sewa Meeting Room & Coworking</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-8">
                    <a href="#reservasi" class="w-full block py-3 rounded-xl border border-slate-300 text-slate-800 font-bold text-xs text-center hover:bg-slate-50 transition">
                        Pilih Silver Starter
                    </a>
                </div>
            </div>

            <!-- Plan 2: Gold Business (Most Popular) -->
            <div class="rounded-3xl p-8 border-2 border-[#0353a4] bg-[#edf4fc]/50 shadow-xl flex flex-col justify-between relative transform lg:-translate-y-2">
                <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full text-xs font-bold bg-[#0353a4] text-white uppercase tracking-wider shadow-sm">
                    Paling Diminati
                </span>

                <div>
                    <h3 class="text-lg font-bold text-slate-900">Gold Business</h3>
                    <p class="text-xs text-slate-600 mt-1">Lengkap untuk pembuatan PT / CV baru & izin domisili resmi.</p>
                    <div class="mt-6 mb-6">
                        <span class="text-3xl font-extrabold text-slate-900">Rp 450.000</span>
                        <span class="text-xs text-slate-500">/ bulan (ditagih per tahun)</span>
                    </div>

                    <ul class="space-y-3 text-xs text-slate-700 border-t border-[#b0d0f4] pt-6">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>Surat Keterangan Domisili Gedung</strong> (SKDU)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>Gratis 4 Jam</strong> Kuota Ruang Rapat / Bulan</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Layanan Resepsionis Profesional Penyambut Tamu</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Mail & Package Handling + Scan Surat Digital</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Akses 2 Hari Free Pass Coworking per Bulan</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-8">
                    <a href="#reservasi" class="w-full block py-3 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-bold text-xs text-center shadow-md shadow-[#0353a4]/30 transition">
                        Daftar Paket Gold
                    </a>
                </div>
            </div>

            <!-- Plan 3: Platinum Corporate -->
            <div class="rounded-3xl p-8 border border-slate-200 bg-white shadow-xs flex flex-col justify-between hover:border-[#0353a4] transition duration-300">
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Platinum Corporate</h3>
                    <p class="text-xs text-slate-500 mt-1">Dukungan penuh untuk zonasi PKP, survei pajak & nomor telepon pribadi.</p>
                    <div class="mt-6 mb-6">
                        <span class="text-3xl font-extrabold text-slate-900">Rp 650.000</span>
                        <span class="text-xs text-slate-500">/ bulan (ditagih per tahun)</span>
                    </div>

                    <ul class="space-y-3 text-xs text-slate-600 border-t border-slate-100 pt-6">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>Izin Zonasi PKP</strong> & Pendampingan Survei Pajak KPP</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>Dedicated Telephone Number (021)</strong> & Call Forwarding</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>Gratis 8 Jam</strong> Ruang Rapat Eksekutif Boardroom</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Signage Logo Perusahaan di Lobby Utama</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#0353a4] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Akses 4 Hari Coworking Hot Desk / Bulan</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-8">
                    <a href="#reservasi" class="w-full block py-3 rounded-xl border border-slate-300 text-slate-800 font-bold text-xs text-center hover:bg-slate-50 transition">
                        Pilih Platinum Corporate
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fasilitas Premium & Atmosphere Showcase -->
<section id="fasilitas" class="py-20 bg-[#001845] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-[#75afee] block mb-2">Fasilitas Berstandar Global</span>
            <h2 class="text-3xl font-extrabold text-white tracking-tight">Semua yang Anda Butuhkan untuk Bekerja Maksimal</h2>
            <p class="text-xs sm:text-sm text-slate-400 mt-2">Didesain dengan ergonomi, privasi, dan keandalan teknologi tingkat tinggi</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5">
            <div class="p-5 rounded-2xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-10 h-10 rounded-xl bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h4 class="text-sm font-bold">WiFi 300 Mbps</h4>
                <p class="text-[11px] text-slate-400 mt-1">Dual-ISP redundansi tanpa lemot</p>
            </div>

            <div class="p-5 rounded-2xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-10 h-10 rounded-xl bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h4 class="text-sm font-bold">Akses 24/7</h4>
                <p class="text-[11px] text-slate-400 mt-1">Smart lock RFID & fingerprint</p>
            </div>

            <div class="p-5 rounded-2xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-10 h-10 rounded-xl bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/></svg>
                </div>
                <h4 class="text-sm font-bold">Podcast Studio</h4>
                <p class="text-[11px] text-slate-400 mt-1">Kedap suara dengan mikrofon 4K</p>
            </div>

            <div class="p-5 rounded-2xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-10 h-10 rounded-xl bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h4 class="text-sm font-bold">Free Flow Kopi</h4>
                <p class="text-[11px] text-slate-400 mt-1">Espresso arabica & artisan tea</p>
            </div>

            <div class="p-5 rounded-2xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-10 h-10 rounded-xl bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                </div>
                <h4 class="text-sm font-bold">Printing Center</h4>
                <p class="text-[11px] text-slate-400 mt-1">Print, scan, & photocopy cepat</p>
            </div>

            <div class="p-5 rounded-2xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-10 h-10 rounded-xl bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h4 class="text-sm font-bold">Musholla & Shower</h4>
                <p class="text-[11px] text-slate-400 mt-1">Area ibadah bersih & shower room</p>
            </div>
        </div>
    </div>
</section>

<!-- Form Reservasi & Konsultasi Online -->
<section id="reservasi" class="py-24 bg-white relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-[#001845] via-[#002855] to-[#023e7d] rounded-3xl p-8 sm:p-12 text-white shadow-2xl border border-[#0466c8]/30 relative overflow-hidden">
            <!-- Glow effect -->
            <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-[#0466c8]/25 rounded-full blur-3xl pointer-events-none"></div>

            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="text-xs font-bold uppercase tracking-widest text-[#75afee] block mb-2">Formulir Pemesanan & Konsultasi</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Mulai Reservasi Ruangan Anda</h2>
                <p class="text-xs sm:text-sm text-slate-300 mt-2">
                    Isi detail kebutuhan Anda di bawah ini. Tim KonsulinSpace akan memproses ketersediaan dan menghubungi Anda dalam hitungan menit.
                </p>
            </div>

            <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="inq_name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Nama Lengkap <span class="text-[#75afee]">*</span></label>
                        <input type="text" name="name" id="inq_name" required value="{{ old('name') }}" placeholder="Contoh: Budi Santoso" class="w-full px-4 py-2.5 rounded-xl bg-[#001845]/80 border border-[#023e7d] text-white placeholder-slate-400 focus:ring-2 focus:ring-[#0466c8] outline-none text-sm">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="inq_email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Email Bisnis <span class="text-[#75afee]">*</span></label>
                        <input type="email" name="email" id="inq_email" required value="{{ old('email') }}" placeholder="nama@perusahaan.com" class="w-full px-4 py-2.5 rounded-xl bg-[#001845]/80 border border-[#023e7d] text-white placeholder-slate-400 focus:ring-2 focus:ring-[#0466c8] outline-none text-sm">
                    </div>

                    <!-- No. WhatsApp -->
                    <div>
                        <label for="inq_phone" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">No. WhatsApp Aktif <span class="text-[#75afee]">*</span></label>
                        <input type="tel" name="phone" id="inq_phone" required value="{{ old('phone') }}" placeholder="0812-xxxx-xxxx" class="w-full px-4 py-2.5 rounded-xl bg-[#001845]/80 border border-[#023e7d] text-white placeholder-slate-400 focus:ring-2 focus:ring-[#0466c8] outline-none text-sm">
                    </div>

                    <!-- Nama Perusahaan -->
                    <div>
                        <label for="inq_company" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Nama Perusahaan / Startup</label>
                        <input type="text" name="company_name" id="inq_company" value="{{ old('company_name') }}" placeholder="PT / CV / Brand Anda" class="w-full px-4 py-2.5 rounded-xl bg-[#001845]/80 border border-[#023e7d] text-white placeholder-slate-400 focus:ring-2 focus:ring-[#0466c8] outline-none text-sm">
                    </div>

                    <!-- Pilihan Ruangan -->
                    <div>
                        <label for="inq_room" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Pilih Ruangan yang Diminati</label>
                        <select name="room_id" id="inq_room" class="w-full px-4 py-2.5 rounded-xl bg-[#001845]/80 border border-[#023e7d] text-white focus:ring-2 focus:ring-[#0466c8] outline-none text-sm">
                            <option value="">-- Pilih Ruangan Tertentu (Opsional) --</option>
                            @foreach($rooms as $r)
                            <option value="{{ $r->id }}" {{ old('room_id') == $r->id ? 'selected' : '' }}>
                                {{ $r->name }} ({{ $r->category_label }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tipe Layanan Umum -->
                    <div>
                        <label for="inq_service" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Kategori Kebutuhan</label>
                        <select name="service_type" id="inq_service" class="w-full px-4 py-2.5 rounded-xl bg-[#001845]/80 border border-[#023e7d] text-white focus:ring-2 focus:ring-[#0466c8] outline-none text-sm">
                            <option value="coworking">Co-Working Space</option>
                            <option value="virtual_office">Virtual Office & PKP</option>
                            <option value="meeting_room">Meeting Room</option>
                            <option value="private_office">Private Office Suite</option>
                            <option value="event_space">Event Space & Hall</option>
                            <option value="consultation">Konsultasi Khusus</option>
                        </select>
                    </div>

                    <!-- Perkiraan Tanggal Mulai -->
                    <div>
                        <label for="inq_date" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Perkiraan Mulai</label>
                        <input type="date" name="start_date" id="inq_date" value="{{ old('start_date') }}" class="w-full px-4 py-2.5 rounded-xl bg-[#001845]/80 border border-[#023e7d] text-white focus:ring-2 focus:ring-[#0466c8] outline-none text-sm">
                    </div>

                    <!-- Durasi Sewa -->
                    <div>
                        <label for="inq_duration" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Rencana Durasi</label>
                        <input type="text" name="duration" id="inq_duration" value="{{ old('duration') }}" placeholder="Contoh: 1 Hari, 3 Jam, 6 Bulan, 1 Tahun" class="w-full px-4 py-2.5 rounded-xl bg-[#001845]/80 border border-[#023e7d] text-white placeholder-slate-400 focus:ring-2 focus:ring-[#0466c8] outline-none text-sm">
                    </div>
                </div>

                <!-- Catatan / Spesifikasi Tambahan -->
                <div>
                    <label for="inq_notes" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Catatan Tambahan atau Pertanyaan</label>
                    <textarea name="notes" id="inq_notes" rows="3" placeholder="Sebutkan jika ada kebutuhan khusus, seperti jumlah peserta rapat, kebutuhan catering kopi, dll." class="w-full px-4 py-2.5 rounded-xl bg-[#001845]/80 border border-[#023e7d] text-white placeholder-slate-400 focus:ring-2 focus:ring-[#0466c8] outline-none text-sm">{{ old('notes') }}</textarea>
                </div>

                <div class="pt-4 text-center">
                    <button type="submit" class="w-full sm:w-auto px-10 py-3.5 rounded-xl bg-[#0353a4] hover:bg-[#0466c8] active:scale-95 text-white font-bold text-sm shadow-lg shadow-[#0353a4]/40 transition">
                        Kirim Permintaan Reservasi
                    </button>
                    <p class="text-[11px] text-slate-400 mt-2.5">
                        Privasi data Anda terjaga dengan aman. Tim kami siap merespons via WhatsApp & Telepon.
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- FAQ Accordion -->
<section id="faq" class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-xs font-bold uppercase tracking-widest text-[#0353a4] block mb-1">Pertanyaan Umum</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4">
            <div class="p-6 bg-white rounded-2xl border border-slate-200">
                <h4 class="font-bold text-slate-900 text-base">Apakah alamat Virtual Office KonsulinSpace bisa untuk pendaftaran PKP?</h4>
                <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                    Ya, gedung KonsulinSpace berada pada zonasi komersial resmi perkantoran DKI Jakarta yang telah memenuhi syarat ketentuan perpajakan untuk pengukuhan Pengusaha Kena Pajak (PKP). Kami juga memfasilitasi pendampingan saat petugas KPP melakukan verifikasi lapangan.
                </p>
            </div>

            <div class="p-6 bg-white rounded-2xl border border-slate-200">
                <h4 class="font-bold text-slate-900 text-base">Apakah saya bisa langsung datang untuk co-working harian (Day Pass)?</h4>
                <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                    Sangat bisa! Anda cukup datang ke meja resepsionis di Lantai 2, memilih paket Day Pass, dan langsung dapat menikmati seluruh fasilitas lounge, meja kerja, free flow kopi/teh, serta koneksi internet 300 Mbps.
                </p>
            </div>

            <div class="p-6 bg-white rounded-2xl border border-slate-200">
                <h4 class="font-bold text-slate-900 text-base">Bagaimana proses penanganan surat dan paket untuk member Virtual Office?</h4>
                <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                    Setiap surat atau paket yang tiba di alamat kami akan dicatat oleh resepsionis, difoto sampulnya, dan langsung dinotifikasikan ke nomor WhatsApp Anda secara real-time. Anda bisa mengambilnya kapan saja atau meminta kami melakukan pemindaian (scan) isi surat.
                </p>
            </div>

            <div class="p-6 bg-white rounded-2xl border border-slate-200">
                <h4 class="font-bold text-slate-900 text-base">Fasilitas apa saja yang sudah include di dalam ruang rapat (Meeting Room)?</h4>
                <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                    Setiap sewa meeting room sudah termasuk Smart TV presentasi 4K, webcam conference Logitech, koneksi HDMI & Type-C wireless casting, whiteboard kaca magnetik, spidol, free flow infused water, kopi dan teh untuk seluruh peserta rapat.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Kontak & Lokasi Section -->
<section id="kontak" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="text-xs font-bold uppercase tracking-widest text-[#0353a4] block">Lokasi & Kontak Kami</span>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kunjungi Ruang Kerja KonsulinSpace</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Terletak strategis di Koridor Sudirman dengan akses langsung MRT Setiabudi Astra dan halte TransJakarta, memudahkan mobilitas tim dan klien bisnis Anda.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-[#edf4fc] text-[#0353a4] flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">Alamat Kantor</h4>
                            <p class="text-xs text-slate-500 mt-0.5">Gedung Artha Sudirman Suites, Lantai 2-5<br>Jl. Jendral Sudirman Kav. 28, Jakarta Pusat 10220</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-[#edf4fc] text-[#0353a4] flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">Telepon & WhatsApp</h4>
                            <p class="text-xs text-slate-500 mt-0.5">0812-9876-5432 / (021) 5790-2800</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-[#edf4fc] text-[#0353a4] flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">Jam Operasional Layanan</h4>
                            <p class="text-xs text-slate-500 mt-0.5">Senin - Jumat: 08:00 - 20:00 WIB<br>Sabtu: 09:00 - 17:00 WIB (Member Bulanan 24/7)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visual Map representation -->
            <div class="rounded-3xl overflow-hidden border border-slate-200 shadow-lg bg-slate-100 p-2">
                <div class="aspect-video w-full rounded-2xl bg-[#001845] relative flex items-center justify-center overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=1000&q=80" alt="Sudirman Hub" class="w-full h-full object-cover opacity-60">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#001845] via-[#002855]/60 to-transparent"></div>
                    <div class="absolute text-center p-6 text-white">
                        <div class="w-12 h-12 rounded-full bg-[#0353a4] text-white flex items-center justify-center mx-auto mb-3 shadow-lg shadow-[#0353a4]/50 animate-bounce">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h4 class="text-lg font-bold">KonsulinSpace Sudirman Central Hub</h4>
                        <p class="text-xs text-slate-300 mt-1">2 Menit Jalan Kaki dari Stasiun MRT Setiabudi</p>
                        <a href="https://maps.google.com/?q=Sudirman+Jakarta" target="_blank" class="inline-block mt-4 px-4 py-2 rounded-xl bg-white text-slate-900 font-bold text-xs hover:bg-slate-100 transition shadow-xs">
                            Buka Petunjuk Arah di Google Maps &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
