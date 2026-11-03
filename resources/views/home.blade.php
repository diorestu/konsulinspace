@extends('layouts.app')

@section('title', 'KonsulinSpace - Co-Working Space & Virtual Office BSD, Tangerang')
@section('meta_description', 'KonsulinSpace menyediakan co-working space fleksibel, private office fully-furnished, meeting room 4K, dan virtual office resmi di Greenwich Business Park, BSD City, Tangerang.')
@section('meta_keywords', 'co-working space BSD, virtual office BSD, sewa kantor BSD City, private office Tangerang, meeting room BSD, alamat domisili PT Tangerang, izin PKP BSD, Greenwich Business Park, sewa ruangan BSD, KonsulinSpace')
@section('og_image', asset('images/og-image.jpg'))

@section('content')

<!-- Hero Carousel Section (Full-Width 21:9, Auto-Sliding 6s) -->
<section id="heroCarousel" class="relative w-full overflow-hidden bg-[#000814] select-none min-h-[460px] sm:min-h-[500px] md:min-h-0 md:aspect-[21/9]" aria-label="Hero Carousel">
    
    <!-- Slides Container -->
    <div class="relative w-full h-full">

        <!-- Slide 1: Ruang Kerja & Co-Working -->
        <div class="carousel-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 z-10" data-slide-index="0">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=2100&q=80" alt="Ruang Kerja KonsulinSpace Greenwich BSD" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#000814]/95 via-[#001845]/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#000814]/80 via-transparent to-transparent"></div>
            
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-12 py-10">
                    <div class="max-w-2xl space-y-4 sm:space-y-5 text-white">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-[#0353a4]/60 border border-[#75afee]/40 text-[#75afee] tracking-wide">
                            Greenwich Business Park, BSD City
                        </span>
                        <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
                            Ruang Kerja & <span class="text-[#75afee]">Virtual Office</span> di BSD, Tangerang
                        </h1>
                        <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-xl">
                            Co-working space fleksibel, private office siap pakai, dan legalitas domisili resmi untuk perizinan usaha Anda di kawasan bisnis terdepan.
                        </p>
                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            <a href="#ruangan" class="px-6 py-3 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs sm:text-sm text-center shadow-md shadow-[#0353a4]/30 transition">
                                Lihat Ruangan
                            </a>
                            <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl border border-white/30 hover:border-white text-white font-semibold text-xs sm:text-sm text-center backdrop-blur-sm transition">
                                Reservasi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2: Virtual Office & Legalitas PT/CV -->
        <div class="carousel-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-0 pointer-events-none" data-slide-index="1">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2100&q=80" alt="Virtual Office Gedung BSD Tangerang" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#000814]/95 via-[#001845]/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#000814]/80 via-transparent to-transparent"></div>
            
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-12 py-10">
                    <div class="max-w-2xl space-y-4 sm:space-y-5 text-white">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-[#0353a4]/60 border border-[#75afee]/40 text-[#75afee] tracking-wide">
                            Legalitas Usaha & PKP
                        </span>
                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
                            Alamat Domisili Resmi <span class="text-[#75afee]">PT & CV</span> di BSD Tangerang
                        </h2>
                        <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-xl">
                            Zonasi komersial perkantoran resmi untuk pengukuhan PKP, surat domisili gedung, penanganan surat masuk kilat, dan resepsionis representatif.
                        </p>
                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            <a href="#virtual-office" class="px-6 py-3 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs sm:text-sm text-center shadow-md shadow-[#0353a4]/30 transition">
                                Paket Virtual Office
                            </a>
                            <a href="https://wa.me/6281908797799?text=Halo%20Admin%20K-Space,%20saya%20tertarik%20dengan%20paket%20virtual%20office." target="_blank" rel="noopener noreferrer" class="px-6 py-3 rounded-xl border border-white/30 hover:border-white text-white font-semibold text-xs sm:text-sm text-center backdrop-blur-sm transition">
                                Tanya Admin K-Space
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3: Meeting Room & Konferensi 4K -->
        <div class="carousel-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-0 pointer-events-none" data-slide-index="2">
            <img src="https://images.unsplash.com/photo-1497215842964-222b430dc094?auto=format&fit=crop&w=2100&q=80" alt="Executive Meeting Room KonsulinSpace" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#000814]/95 via-[#001845]/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#000814]/80 via-transparent to-transparent"></div>
            
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-12 py-10">
                    <div class="max-w-2xl space-y-4 sm:space-y-5 text-white">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-[#0353a4]/60 border border-[#75afee]/40 text-[#75afee] tracking-wide">
                            Audio Visual 4K & Kedap Suara
                        </span>
                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
                            Meeting Room Profesional & <span class="text-[#75afee]">Video Conference</span>
                        </h2>
                        <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-xl">
                            Ruang rapat 4 hingga 20 orang dilengkapi monitor presentasi 4K, mikrofon konferensi jernih, whiteboard, dan free flow minuman.
                        </p>
                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            <a href="{{ route('home') }}?category=meeting_room#ruangan" class="px-6 py-3 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs sm:text-sm text-center shadow-md shadow-[#0353a4]/30 transition">
                                Sewa Ruang Rapat
                            </a>
                            <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl border border-white/30 hover:border-white text-white font-semibold text-xs sm:text-sm text-center backdrop-blur-sm transition">
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 4: Private Office Suites -->
        <div class="carousel-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-0 pointer-events-none" data-slide-index="3">
            <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=2100&q=80" alt="Private Office Suite KonsulinSpace" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#000814]/95 via-[#001845]/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#000814]/80 via-transparent to-transparent"></div>
            
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-12 py-10">
                    <div class="max-w-2xl space-y-4 sm:space-y-5 text-white">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-[#0353a4]/60 border border-[#75afee]/40 text-[#75afee] tracking-wide">
                            Akses Kunci Mandiri 24/7
                        </span>
                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
                            Private Office Siap Huni <span class="text-[#75afee]">Tim 2 - 20 Orang</span>
                        </h2>
                        <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-xl">
                            Ruangan kantor privat fully-furnished dengan meja ergonomis, akses kartu RFID mandiri, kuota print gratis, dan free-flow kopi harian.
                        </p>
                        <div class="pt-2 flex flex-wrap items-center gap-3">
                            <a href="{{ route('home') }}?category=private_office#ruangan" class="px-6 py-3 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs sm:text-sm text-center shadow-md shadow-[#0353a4]/30 transition">
                                Pilihan Unit Kantor
                            </a>
                            <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl border border-white/30 hover:border-white text-white font-semibold text-xs sm:text-sm text-center backdrop-blur-sm transition">
                                Jadwal Survei Gedung
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Navigation Arrows -->
    <button type="button" id="carouselPrevBtn" class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/35 hover:bg-[#0353a4] text-white border border-white/20 backdrop-blur-md flex items-center justify-center transition shadow-lg focus:outline-none" aria-label="Slide Sebelumnya">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button type="button" id="carouselNextBtn" class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/35 hover:bg-[#0353a4] text-white border border-white/20 backdrop-blur-md flex items-center justify-center transition shadow-lg focus:outline-none" aria-label="Slide Selanjutnya">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>

    <!-- Indicators (Dots / Pills) -->
    <div id="carouselIndicators" class="absolute bottom-5 sm:bottom-7 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2">
        <button type="button" data-slide-to="0" class="carousel-dot h-2 w-8 bg-[#75afee] rounded-full transition-all duration-300 focus:outline-none" aria-label="Ke Slide 1"></button>
        <button type="button" data-slide-to="1" class="carousel-dot h-2 w-2.5 bg-white/40 hover:bg-white/70 rounded-full transition-all duration-300 focus:outline-none" aria-label="Ke Slide 2"></button>
        <button type="button" data-slide-to="2" class="carousel-dot h-2 w-2.5 bg-white/40 hover:bg-white/70 rounded-full transition-all duration-300 focus:outline-none" aria-label="Ke Slide 3"></button>
        <button type="button" data-slide-to="3" class="carousel-dot h-2 w-2.5 bg-white/40 hover:bg-white/70 rounded-full transition-all duration-300 focus:outline-none" aria-label="Ke Slide 4"></button>
    </div>
</section>

<!-- Stats Bar below Carousel -->
<div class="bg-[#001845] border-b border-slate-800 py-6 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <p class="text-xl sm:text-2xl font-extrabold text-[#75afee]">Greenwich</p>
                <p class="text-xs text-slate-400 mt-0.5">Business Park BSD</p>
            </div>
            <div>
                <p class="text-xl sm:text-2xl font-extrabold text-white">4 Lantai</p>
                <p class="text-xs text-slate-400 mt-0.5">Fasilitas Lengkap</p>
            </div>
            <div>
                <p class="text-xl sm:text-2xl font-extrabold text-white">300 Mbps</p>
                <p class="text-xs text-slate-400 mt-0.5">Internet Fiber</p>
            </div>
            <div>
                <p class="text-xl sm:text-2xl font-extrabold text-white">24/7</p>
                <p class="text-xs text-slate-400 mt-0.5">Akses Member</p>
            </div>
        </div>
    </div>
</div>

<!-- Layanan -->
<section id="layanan" class="py-16 bg-white border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Layanan Kami</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- 1. Co-Working -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/70 hover:border-[#0353a4] transition group flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-[#edf4fc] text-[#0353a4] flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 group-hover:text-[#0353a4] transition">Co-Working Space</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Hot desk harian dan dedicated desk bulanan dengan kursi ergonomis dan free flow kopi.
                    </p>
                </div>
                <a href="#ruangan" class="inline-block text-xs font-semibold text-[#0353a4] hover:text-[#023e7d] mt-4">Pilih Meja</a>
            </div>

            <!-- 2. Virtual Office -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/70 hover:border-[#0353a4] transition group flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-[#edf4fc] text-[#023e7d] flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 group-hover:text-[#023e7d] transition">Virtual Office</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Alamat komersial resmi untuk legalitas PT, CV, dan PKP lengkap dengan surat domisili.
                    </p>
                </div>
                <a href="#virtual-office" class="inline-block text-xs font-semibold text-[#0353a4] hover:text-[#023e7d] mt-4">Pilih Paket</a>
            </div>

            <!-- 3. Meeting Rooms -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/70 hover:border-[#0353a4] transition group flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-[#edf4fc] text-[#0466c8] flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 group-hover:text-[#0466c8] transition">Meeting Room</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Ruang rapat kedap suara dengan display presentasi 4K dan fasilitas video conference.
                    </p>
                </div>
                <a href="#ruangan" class="inline-block text-xs font-semibold text-[#0353a4] hover:text-[#023e7d] mt-4">Sewa Ruangan</a>
            </div>

            <!-- 4. Private Office -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/70 hover:border-[#0353a4] transition group flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-[#edf4fc] text-[#002855] flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 group-hover:text-[#002855] transition">Private Office</h3>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Ruang kantor privat siap pakai untuk tim 2 hingga 20 orang dengan kunci RFID mandiri.
                    </p>
                </div>
                <a href="#ruangan" class="inline-block text-xs font-semibold text-[#0353a4] hover:text-[#023e7d] mt-4">Lihat Unit</a>
            </div>
        </div>
    </div>
</section>

<!-- Katalog Ruangan Tersedia (With Category Filter) -->
<section id="ruangan" class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Pilihan Ruangan</h2>
            </div>

            <!-- Minimal Category Tabs -->
            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0 scrollbar-none text-xs">
                <a href="{{ route('home') }}?category=all#ruangan" class="px-3 py-1.5 rounded-lg font-medium transition shrink-0 {{ $selectedCategory === 'all' ? 'bg-[#0353a4] text-white' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200' }}">
                    Semua
                </a>
                <a href="{{ route('home') }}?category=coworking#ruangan" class="px-3 py-1.5 rounded-lg font-medium transition shrink-0 {{ $selectedCategory === 'coworking' ? 'bg-[#0353a4] text-white' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200' }}">
                    Co-Working
                </a>
                <a href="{{ route('home') }}?category=meeting_room#ruangan" class="px-3 py-1.5 rounded-lg font-medium transition shrink-0 {{ $selectedCategory === 'meeting_room' ? 'bg-[#0353a4] text-white' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200' }}">
                    Meeting Room
                </a>
                <a href="{{ route('home') }}?category=private_office#ruangan" class="px-3 py-1.5 rounded-lg font-medium transition shrink-0 {{ $selectedCategory === 'private_office' ? 'bg-[#0353a4] text-white' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200' }}">
                    Private Office
                </a>
                <a href="{{ route('home') }}?category=virtual_office#ruangan" class="px-3 py-1.5 rounded-lg font-medium transition shrink-0 {{ $selectedCategory === 'virtual_office' ? 'bg-[#0353a4] text-white' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200' }}">
                    Virtual Office
                </a>
                <a href="{{ route('home') }}?category=event_space#ruangan" class="px-3 py-1.5 rounded-lg font-medium transition shrink-0 {{ $selectedCategory === 'event_space' ? 'bg-[#0353a4] text-white' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200' }}">
                    Event Hall
                </a>
            </div>
        </div>

        <!-- Rooms Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($rooms as $room)
            @php
                $videoMedia = $room->media->firstWhere('file_type', 'video');
            @endphp
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-xs hover:shadow-lg transition-shadow duration-200 flex flex-col group">
                <!-- Thumbnail -->
                <div class="relative aspect-[16/10] overflow-hidden bg-slate-900">
                    <img src="{{ $room->thumbnail_url }}" alt="{{ $room->name }}" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-300">
                    
                    @if($videoMedia)
                    <span class="absolute bottom-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-rose-600 text-white">
                        Video
                    </span>
                    @endif
                </div>

                <!-- Card Body -->
                <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <div class="text-[11px] font-medium text-slate-400 mb-1">
                            {{ $room->category_label }} @if($room->capacity) &bull; {{ $room->capacity }} @endif
                        </div>
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-[#0353a4] transition">
                            <a href="{{ route('rooms.show', $room->slug) }}">
                                {{ $room->name }}
                            </a>
                        </h3>
                        
                        <!-- Rating Star -->
                        <div class="flex items-center gap-1.5 mt-2.5">
                            <div class="flex items-center text-amber-400">
                                @for($i = 0; $i < 5; $i++)
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <span class="text-xs font-semibold text-slate-700">4.9</span>
                            <span class="text-[11px] text-slate-400">(48)</span>
                        </div>
                    </div>

                    <!-- Pricing & Button -->
                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-sm font-bold text-slate-900">{{ $room->formatted_price }}</span>
                        </div>
                        <a href="{{ route('rooms.show', $room->slug) }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-slate-900 hover:bg-[#0353a4] text-white text-xs font-semibold transition group/btn">
                            <span>Detail</span>
                            <svg class="w-3.5 h-3.5 transform group-hover/btn:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center bg-white rounded-2xl border border-slate-200">
                <p class="text-sm font-semibold text-slate-600">Tidak ada ruangan dalam kategori ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Paket Virtual Office -->
<section id="virtual-office" class="py-16 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center max-w-xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Paket Virtual Office</h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-2">Alamat domisili komersial resmi untuk legalitas perusahaan Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Plan 1: Silver -->
            <div class="rounded-2xl p-6 border border-slate-200 bg-white flex flex-col justify-between hover:border-[#0353a4] transition">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Silver Starter</h3>
                    <div class="mt-4 mb-5">
                        <span class="text-2xl font-bold text-slate-900">Rp 350.000</span>
                        <span class="text-xs text-slate-500">/ bulan</span>
                    </div>

                    <ul class="space-y-2.5 text-xs text-slate-600 border-t border-slate-100 pt-5">
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Alamat Bisnis Komersial BSD</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Penerimaan Surat & Paket</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Notifikasi WhatsApp Real-time</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Diskon Sewa Meeting Room</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-6">
                    <a href="{{ route('contact') }}" class="w-full block py-2.5 rounded-xl border border-slate-300 text-slate-800 font-semibold text-xs text-center hover:bg-slate-50 transition">
                        Pilih Silver
                    </a>
                </div>
            </div>

            <!-- Plan 2: Gold -->
            <div class="rounded-2xl p-6 border-2 border-[#0353a4] bg-[#edf4fc]/30 flex flex-col justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Gold Business</h3>
                    <div class="mt-4 mb-5">
                        <span class="text-2xl font-bold text-slate-900">Rp 450.000</span>
                        <span class="text-xs text-slate-500">/ bulan</span>
                    </div>

                    <ul class="space-y-2.5 text-xs text-slate-700 border-t border-[#b0d0f4] pt-5">
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Surat Keterangan Domisili Gedung</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Gratis 4 Jam Meeting Room / Bulan</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Layanan Resepsionis & Tamu</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Penerimaan & Scan Surat Digital</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-6">
                    <a href="{{ route('contact') }}" class="w-full block py-2.5 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs text-center transition">
                        Pilih Gold
                    </a>
                </div>
            </div>

            <!-- Plan 3: Platinum -->
            <div class="rounded-2xl p-6 border border-slate-200 bg-white flex flex-col justify-between hover:border-[#0353a4] transition">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Platinum Corporate</h3>
                    <div class="mt-4 mb-5">
                        <span class="text-2xl font-bold text-slate-900">Rp 650.000</span>
                        <span class="text-xs text-slate-500">/ bulan</span>
                    </div>

                    <ul class="space-y-2.5 text-xs text-slate-600 border-t border-slate-100 pt-5">
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Izin Zonasi PKP & Pendampingan</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Nomor Telepon Khusus (021)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Gratis 8 Jam Meeting Room / Bulan</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-[#0353a4]">&bull;</span>
                            <span>Signage Logo Perusahaan di Lobby</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-6">
                    <a href="{{ route('contact') }}" class="w-full block py-2.5 rounded-xl border border-slate-300 text-slate-800 font-semibold text-xs text-center hover:bg-slate-50 transition">
                        Pilih Platinum
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fasilitas -->
<section id="fasilitas" class="py-16 bg-[#001845] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Fasilitas Termasuk</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="p-4 rounded-xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-9 h-9 rounded-lg bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h4 class="text-xs font-bold">WiFi 300 Mbps</h4>
            </div>

            <div class="p-4 rounded-xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-9 h-9 rounded-lg bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h4 class="text-xs font-bold">Akses 24 Jam</h4>
            </div>

            <div class="p-4 rounded-xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-9 h-9 rounded-lg bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/></svg>
                </div>
                <h4 class="text-xs font-bold">Studio Podcast</h4>
            </div>

            <div class="p-4 rounded-xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-9 h-9 rounded-lg bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h4 class="text-xs font-bold">Kopi & Teh Gratis</h4>
            </div>

            <div class="p-4 rounded-xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-9 h-9 rounded-lg bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                </div>
                <h4 class="text-xs font-bold">Print & Scan</h4>
            </div>

            <div class="p-4 rounded-xl bg-[#002855] border border-[#023e7d] text-center">
                <div class="w-9 h-9 rounded-lg bg-[#0353a4]/40 text-[#75afee] flex items-center justify-center mx-auto mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h4 class="text-xs font-bold">Musholla</h4>
            </div>
        </div>
    </div>
</section>

<!-- FAQ (Accordion) -->
<section id="faq" class="py-16 bg-slate-50 border-t border-slate-200">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Pertanyaan Umum</h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-2">Jawaban seputar layanan sewa ruangan dan virtual office kami.</p>
        </div>

        <div class="space-y-3" id="faqAccordion">
            <!-- Item 1 -->
            <details class="group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs transition-all duration-200" open>
                <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none hover:bg-slate-50/60 transition font-bold text-slate-900 text-sm">
                    <span>Apakah alamat Virtual Office bisa digunakan untuk PKP dan izin resmi?</span>
                    <span class="w-7 h-7 rounded-lg bg-[#edf4fc] text-[#0353a4] flex items-center justify-center shrink-0 ml-3 transition-transform duration-200 group-open:rotate-180">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 pt-1 text-xs text-slate-600 leading-relaxed border-t border-slate-100">
                    Bisa. Gedung kami berlokasi di zonasi komersial perkantoran BSD, Tangerang yang memenuhi seluruh persyaratan domisili hukum untuk pendirian PT, CV, serta pengukuhan PKP (Pengusaha Kena Pajak). Kami juga menyediakan dokumen kelengkapan gedung seperti Surat Keterangan Domisili Gedung dan IMB.
                </div>
            </details>

            <!-- Item 2 -->
            <details class="group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs transition-all duration-200">
                <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none hover:bg-slate-50/60 transition font-bold text-slate-900 text-sm">
                    <span>Apakah bisa menyewa harian (Day Pass) tanpa komitmen bulanan?</span>
                    <span class="w-7 h-7 rounded-lg bg-[#edf4fc] text-[#0353a4] flex items-center justify-center shrink-0 ml-3 transition-transform duration-200 group-open:rotate-180">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 pt-1 text-xs text-slate-600 leading-relaxed border-t border-slate-100">
                    Bisa. Layanan Co-Working Hot Desk dapat disewa dengan sistem Day Pass harian langsung di front desk. Anda mendapatkan akses internet kecepatan tinggi 300 Mbps, free flow teh/kopi, dan area kerja ergonomis.
                </div>
            </details>

            <!-- Item 3 -->
            <details class="group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs transition-all duration-200">
                <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none hover:bg-slate-50/60 transition font-bold text-slate-900 text-sm">
                    <span>Bagaimana penanganan surat dan paket untuk pelanggan Virtual Office?</span>
                    <span class="w-7 h-7 rounded-lg bg-[#edf4fc] text-[#0353a4] flex items-center justify-center shrink-0 ml-3 transition-transform duration-200 group-open:rotate-180">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 pt-1 text-xs text-slate-600 leading-relaxed border-t border-slate-100">
                    Setiap surat atau paket yang tiba di alamat kantor Anda akan dicatat oleh resepsionis kami. Anda akan menerima notifikasi real-time via WhatsApp beserta foto resi, dan dapat meminta opsi scan dokumen atau pengambilan fisik.
                </div>
            </details>

            <!-- Item 4 -->
            <details class="group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs transition-all duration-200">
                <summary class="flex items-center justify-between p-5 cursor-pointer list-none select-none hover:bg-slate-50/60 transition font-bold text-slate-900 text-sm">
                    <span>Bagaimana cara melakukan pemesanan ruangan dan jadwal survei lokasi?</span>
                    <span class="w-7 h-7 rounded-lg bg-[#edf4fc] text-[#0353a4] flex items-center justify-center shrink-0 ml-3 transition-transform duration-200 group-open:rotate-180">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </span>
                </summary>
                <div class="px-5 pb-5 pt-1 text-xs text-slate-600 leading-relaxed border-t border-slate-100">
                    Anda dapat mengisi formulir reservasi di <a href="{{ route('contact') }}" class="text-[#0353a4] font-semibold hover:underline">halaman kontak kami</a> atau menghubungi WhatsApp resmi KonsulinSpace. Tim kami siap mengatur jadwal survei fisik gedung pada jam operasional kerja.
                </div>
            </details>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.getElementById('heroCarousel');
        if (!carousel) return;

        const slides = carousel.querySelectorAll('.carousel-slide');
        const dots = carousel.querySelectorAll('.carousel-dot');
        const prevBtn = document.getElementById('carouselPrevBtn');
        const nextBtn = document.getElementById('carouselNextBtn');
        const totalSlides = slides.length;
        let currentIndex = 0;
        let slideTimer = null;
        const SLIDE_INTERVAL = 6000; // Auto-sliding every 6 seconds (between 5 and 10 seconds)

        function goToSlide(index) {
            currentIndex = (index + totalSlides) % totalSlides;

            slides.forEach((slide, i) => {
                if (i === currentIndex) {
                    slide.classList.remove('opacity-0', 'pointer-events-none', 'z-0');
                    slide.classList.add('opacity-100', 'z-10');
                } else {
                    slide.classList.remove('opacity-100', 'z-10');
                    slide.classList.add('opacity-0', 'pointer-events-none', 'z-0');
                }
            });

            dots.forEach((dot, i) => {
                if (i === currentIndex) {
                    dot.classList.remove('w-2.5', 'bg-white/40');
                    dot.classList.add('w-8', 'bg-[#75afee]');
                } else {
                    dot.classList.remove('w-8', 'bg-[#75afee]');
                    dot.classList.add('w-2.5', 'bg-white/40');
                }
            });
        }

        function nextSlide() {
            goToSlide(currentIndex + 1);
        }

        function prevSlide() {
            goToSlide(currentIndex - 1);
        }

        function startAutoSlide() {
            stopAutoSlide();
            slideTimer = setInterval(nextSlide, SLIDE_INTERVAL);
        }

        function stopAutoSlide() {
            if (slideTimer) {
                clearInterval(slideTimer);
                slideTimer = null;
            }
        }

        function resetTimer() {
            stopAutoSlide();
            startAutoSlide();
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                nextSlide();
                resetTimer();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                prevSlide();
                resetTimer();
            });
        }

        dots.forEach((dot) => {
            dot.addEventListener('click', function () {
                const targetIndex = parseInt(this.getAttribute('data-slide-to'), 10);
                goToSlide(targetIndex);
                resetTimer();
            });
        });

        // Pause on hover
        carousel.addEventListener('mouseenter', stopAutoSlide);
        carousel.addEventListener('mouseleave', startAutoSlide);

        // Touch swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;
        carousel.addEventListener('touchstart', function (e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        carousel.addEventListener('touchend', function (e) {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchEndX - touchStartX;
            if (Math.abs(diff) > 40) {
                if (diff < 0) nextSlide();
                else prevSlide();
                resetTimer();
            }
        }, { passive: true });

        // Keyboard arrow navigation
        window.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowRight') {
                nextSlide();
                resetTimer();
            } else if (e.key === 'ArrowLeft') {
                prevSlide();
                resetTimer();
            }
        });

        // Start auto slide
        startAutoSlide();
    });
</script>
@endpush

@endsection
