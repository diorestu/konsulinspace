@extends('layouts.app')

@section('title', 'Katalog Ruangan - Co-Working & Meeting Room KonsulinSpace BSD')
@section('meta_description', 'Lihat katalog lengkap pilihan co-working space, private office siap huni, meeting room 4K, dan event hall di Greenwich Business Park, BSD City, Tangerang.')
@section('meta_keywords', 'katalog ruangan konsulinspace, sewa coworking space BSD, sewa private office Tangerang, ruang rapat BSD, event hall BSD City')

@section('content')

<!-- Header Banner -->
<section class="bg-[#001845] text-white py-14 sm:py-16 border-b border-[#002855]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-[#0353a4]/60 border border-[#75afee]/40 text-[#75afee] tracking-wide mb-3">
                Katalog Lengkap Ruangan
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                Pilihan Ruang Kerja & Meeting Room di BSD
            </h1>
            <p class="text-sm sm:text-base text-slate-300 mt-3 leading-relaxed">
                Temukan ruang kerja yang paling sesuai dengan kebutuhan produktivitas dan pertumbuhan tim Anda di Greenwich Business Park, BSD City.
            </p>
        </div>
    </div>
</section>

<!-- Filter & Search Toolbar -->
<section class="py-8 bg-white border-b border-slate-200 sticky top-20 z-30 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            
            <!-- Category Tabs -->
            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0 scrollbar-none text-xs">
                <a href="{{ route('rooms.catalog', ['category' => 'all']) }}" class="px-3.5 py-2 rounded-xl font-medium transition shrink-0 {{ ($selectedCategory ?? 'all') === 'all' ? 'bg-[#0353a4] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:text-slate-900' }}">
                    Semua Ruangan
                </a>
                <a href="{{ route('rooms.catalog', ['category' => 'coworking']) }}" class="px-3.5 py-2 rounded-xl font-medium transition shrink-0 {{ ($selectedCategory ?? '') === 'coworking' ? 'bg-[#0353a4] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:text-slate-900' }}">
                    Co-Working Space
                </a>
                <a href="{{ route('rooms.catalog', ['category' => 'meeting_room']) }}" class="px-3.5 py-2 rounded-xl font-medium transition shrink-0 {{ ($selectedCategory ?? '') === 'meeting_room' ? 'bg-[#0353a4] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:text-slate-900' }}">
                    Meeting Room
                </a>
                <a href="{{ route('rooms.catalog', ['category' => 'private_office']) }}" class="px-3.5 py-2 rounded-xl font-medium transition shrink-0 {{ ($selectedCategory ?? '') === 'private_office' ? 'bg-[#0353a4] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:text-slate-900' }}">
                    Private Office
                </a>
                <a href="{{ route('rooms.catalog', ['category' => 'virtual_office']) }}" class="px-3.5 py-2 rounded-xl font-medium transition shrink-0 {{ ($selectedCategory ?? '') === 'virtual_office' ? 'bg-[#0353a4] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:text-slate-900' }}">
                    Virtual Office
                </a>
                <a href="{{ route('rooms.catalog', ['category' => 'event_space']) }}" class="px-3.5 py-2 rounded-xl font-medium transition shrink-0 {{ ($selectedCategory ?? '') === 'event_space' ? 'bg-[#0353a4] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:text-slate-900' }}">
                    Event Hall
                </a>
            </div>

            <!-- Search Input -->
            <form action="{{ route('rooms.catalog') }}" method="GET" class="w-full md:w-72 relative">
                @if(($selectedCategory ?? 'all') !== 'all')
                <input type="hidden" name="category" value="{{ $selectedCategory }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama ruangan..." class="w-full pl-9 pr-4 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </form>
        </div>
    </div>
</section>

<!-- Rooms Grid Catalog -->
<section class="py-16 bg-slate-50 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($rooms as $room)
            @php
                $videoMedia = $room->media->firstWhere('file_type', 'video');
                $waMessage = rawurlencode("Halo Admin K-Space, saya tertarik ingin memesan ruangan '{$room->name}' ({$room->formatted_price}) di KonsulinSpace.");
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

                    @if($room->is_featured)
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#0353a4] text-white shadow-xs">
                        Terpopuler
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
                            <span class="text-[11px] text-slate-400">(48 ulasan)</span>
                        </div>
                    </div>

                    <!-- Pricing & Buttons with Call Icon -->
                    <div class="pt-3 border-t border-slate-100 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-400">Mulai dari</span>
                            <span class="text-sm font-bold text-slate-900">{{ $room->formatted_price }}</span>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <a href="{{ route('rooms.show', $room->slug) }}" class="inline-flex items-center justify-center gap-1 py-2 px-3 rounded-xl border border-slate-200 text-slate-700 hover:bg-slate-50 text-xs font-semibold transition">
                                <span>Detail</span>
                            </a>
                            <a href="https://wa.me/6281908797799?text={{ $waMessage }}" target="_blank" rel="noopener noreferrer" data-track-cta="whatsapp" data-cta-label="catalog_pesan_ruangan_{{ $room->slug }}" class="inline-flex items-center justify-center gap-1.5 py-2 px-3 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white text-xs font-semibold transition shadow-xs">
                                <svg class="w-3.5 h-3.5 shrink-0 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span>Pesan</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-slate-200">
                <svg class="w-12 h-12 mx-auto text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                <p class="text-base font-bold text-slate-800 mt-3">Tidak ada ruangan yang ditemukan</p>
                <p class="text-xs text-slate-500 mt-1">Coba gunakan kata kunci pencarian lain atau pilih kategori berbeda.</p>
                <a href="{{ route('rooms.catalog') }}" class="inline-block mt-4 px-4 py-2 rounded-xl bg-[#0353a4] text-white text-xs font-semibold">
                    Reset Filter
                </a>
            </div>
            @endforelse
        </div>

        @if($rooms->hasPages())
        <div class="mt-10">
            {{ $rooms->links() }}
        </div>
        @endif

    </div>
</section>

@endsection
