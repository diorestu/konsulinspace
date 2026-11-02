@extends('layouts.app')

@section('title', 'KonsulinSpace - Co-Working Space & Virtual Office Jakarta')
@section('meta_description', 'KonsulinSpace menyediakan co-working space, private office, meeting room, dan virtual office resmi di Sudirman, Jakarta.')

@section('content')

<!-- Hero Section -->
<section class="relative bg-[#001845] text-white overflow-hidden py-16 lg:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Headline -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
                    Ruang Kerja & <span class="text-[#75afee]">Virtual Office</span> di Sudirman, Jakarta
                </h1>

                <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Co-working space fleksibel, private office siap pakai, dan alamat domisili resmi untuk perizinan usaha Anda.
                </p>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                    <a href="#ruangan" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-sm text-center shadow-sm transition">
                        Lihat Ruangan
                    </a>
                    <a href="#virtual-office" class="w-full sm:w-auto px-6 py-3 rounded-xl border border-slate-700 hover:border-slate-500 text-slate-200 font-semibold text-sm text-center transition">
                        Paket Virtual Office
                    </a>
                </div>

                <!-- Minimal Info Numbers -->
                <div class="pt-8 grid grid-cols-3 gap-6 border-t border-slate-800 text-left max-w-lg">
                    <div>
                        <p class="text-2xl font-bold text-white">3</p>
                        <p class="text-xs text-slate-400 mt-0.5">Lokasi Sudirman</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white">300 Mbps</p>
                        <p class="text-xs text-slate-400 mt-0.5">Internet Fiber</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white">24/7</p>
                        <p class="text-xs text-slate-400 mt-0.5">Akses Member</p>
                    </div>
                </div>
            </div>

            <!-- Right Hero Card / Visual Preview -->
            <div class="lg:col-span-5">
                <div class="relative rounded-2xl overflow-hidden shadow-xl border border-slate-800 bg-[#002855]">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1000&q=80" alt="KonsulinSpace Lounge" class="w-full h-80 sm:h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#001845]/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-5 left-5 right-5 text-white">
                        <h4 class="text-base font-bold">Artha Sudirman Suites</h4>
                        <p class="text-xs text-slate-300 mt-0.5">Jl. Jendral Sudirman Kav. 28, Jakarta Pusat</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($rooms as $room)
            @php
                $videoMedia = $room->media->firstWhere('file_type', 'video');
            @endphp
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-xs hover:border-[#0353a4] transition duration-200 flex flex-col group">
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
                            <span>Alamat Bisnis Komersial Sudirman</span>
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
                    Bisa. Gedung kami berlokasi di zonasi komersial perkantoran Sudirman yang memenuhi seluruh persyaratan domisili hukum untuk pendirian PT, CV, serta pengukuhan PKP (Pengusaha Kena Pajak). Kami juga menyediakan dokumen kelengkapan gedung seperti Surat Keterangan Domisili Gedung dan IMB.
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

<!-- Kontak & Lokasi Teaser -->
<section id="kontak" class="py-16 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="space-y-4">
                <h2 class="text-2xl font-bold text-slate-900">Lokasi & Kontak</h2>
                <div class="text-xs text-slate-600 space-y-2">
                    <p><strong>Alamat:</strong> Gedung Artha Sudirman Suites, Lt. 2-5, Jl. Jendral Sudirman Kav. 28, Jakarta Pusat</p>
                    <p><strong>WhatsApp:</strong> 0812-9876-5432</p>
                    <p><strong>Email:</strong> hello@konsulinspace.com</p>
                    <p><strong>Jam Operasional:</strong> Senin - Jumat 08:00 - 20:00 WIB (Akses 24/7 bagi member tetap)</p>
                </div>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs transition shadow-xs">
                        Kunjungi Halaman Kontak & Reservasi
                    </a>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden border border-slate-200 aspect-[16/9] bg-slate-100">
                <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=1000&q=80" alt="Sudirman Hub" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

@endsection
