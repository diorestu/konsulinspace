@extends('layouts.app')

@section('title', $room->name . ' - KonsulinSpace')
@section('meta_description', $room->short_description ?: 'Sewa ' . $room->name . ' di KonsulinSpace dengan fasilitas lengkap, koneksi internet cepat, dan lingkungan kerja profesional.')

@section('content')

<!-- Breadcrumb -->
<div class="bg-white border-b border-slate-200/80 py-3 text-xs text-slate-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-[#0353a4] transition">Beranda</a>
        <span>/</span>
        <a href="{{ route('home') }}?category={{ $room->category }}#ruangan" class="hover:text-[#0353a4] transition">{{ $room->category_label }}</a>
        <span>/</span>
        <span class="text-slate-800 font-semibold truncate">{{ $room->name }}</span>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

        <!-- Left 8 Columns: Media Gallery & Room Details -->
        <div class="lg:col-span-8 space-y-8">

            <!-- Title & Room Info -->
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-[#0353a4] mb-1.5">{{ $room->category_label }}</p>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">{{ $room->name }}</h1>
                <p class="text-xs sm:text-sm text-slate-500 mt-1 flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>{{ $room->location_floor ?: 'Gedung Konsulin Sudirman' }}</span>
                </p>
            </div>

            <!-- Interactive Media Showcase (Images & Videos) -->
            <div class="space-y-3">
                @php
                    $primaryMedia = $room->media->firstWhere('is_primary', true) ?: $room->media->first();
                @endphp

                <!-- Main Display Viewport -->
                <div id="mainMediaContainer" class="relative aspect-video w-full rounded-3xl overflow-hidden bg-slate-950 shadow-lg border border-slate-200">
                    @if($primaryMedia && $primaryMedia->file_type === 'video')
                        <video id="activeVideoPlayer" src="{{ $primaryMedia->url }}" controls class="w-full h-full object-contain"></video>
                        <img id="activeImageDisplay" src="" class="w-full h-full object-cover hidden" alt="{{ $room->name }}">
                    @else
                        <video id="activeVideoPlayer" src="" controls class="w-full h-full object-contain hidden"></video>
                        <img id="activeImageDisplay" src="{{ $room->thumbnail_url }}" alt="{{ $room->name }}" class="w-full h-full object-cover">
                    @endif
                </div>

                <!-- Thumbnails Strip (clickable to switch main viewer) -->
                @if($room->media->count() > 1)
                <div class="flex items-center gap-3 overflow-x-auto pb-2 scrollbar-none">
                    @foreach($room->media as $idx => $m)
                    <button type="button" onclick="switchMedia('{{ $m->url }}', '{{ $m->file_type }}', this)" class="media-thumb-btn relative w-24 h-16 rounded-xl overflow-hidden shrink-0 border-2 transition {{ ($primaryMedia && $primaryMedia->id === $m->id) ? 'border-[#0353a4] ring-2 ring-[#0353a4]/20' : 'border-slate-200 hover:border-slate-400' }}">
                        @if($m->file_type === 'video')
                        <div class="w-full h-full bg-[#001845] flex items-center justify-center">
                            <span class="w-6 h-6 rounded-full bg-rose-600 text-white flex items-center justify-center shadow-xs">
                                <svg class="w-3.5 h-3.5 fill-current ml-0.5" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6V4z"/></svg>
                            </span>
                        </div>
                        <span class="absolute bottom-1 right-1 px-1 rounded text-[9px] font-bold bg-rose-600 text-white uppercase">Video</span>
                        @else
                        <img src="{{ $m->url }}" alt="{{ $m->file_name }}" class="w-full h-full object-cover">
                        @endif
                    </button>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Room Specs Highlights -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 p-5 rounded-2xl bg-white border border-slate-200 shadow-xs text-xs">
                <div>
                    <span class="text-slate-400 block font-medium">Kapasitas</span>
                    <span class="font-bold text-slate-900 text-sm mt-0.5 block">{{ $room->capacity ?: 'Fleksibel' }}</span>
                </div>
                <div>
                    <span class="text-slate-400 block font-medium">Luas Ruangan</span>
                    <span class="font-bold text-slate-900 text-sm mt-0.5 block">{{ $room->area_sqm ?: '-' }}</span>
                </div>
                <div>
                    <span class="text-slate-400 block font-medium">Lantai / Posisi</span>
                    <span class="font-bold text-slate-900 text-sm mt-0.5 block truncate">{{ $room->location_floor ?: 'Hub Sudirman' }}</span>
                </div>
                <div>
                    <span class="text-slate-400 block font-medium">Kategori</span>
                    <span class="font-bold text-[#0353a4] text-sm mt-0.5 block">{{ $room->category_label }}</span>
                </div>
            </div>

            <!-- Deskripsi Lengkap -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-4">
                <h3 class="text-lg font-bold text-slate-900">Tentang Ruangan Ini</h3>
                <div class="text-sm text-slate-600 leading-relaxed space-y-3">
                    <p>{{ $room->description ?: $room->short_description ?: 'Ruangan berstandar tinggi yang didesain untuk kenyamanan, produktivitas, dan kolaborasi profesional Anda.' }}</p>
                </div>
            </div>

            <!-- Fasilitas Ruangan -->
            @if(!empty($room->amenities) && is_array($room->amenities))
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-5">
                <h3 class="text-lg font-bold text-slate-900">Fasilitas yang Termasuk</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    @foreach($room->amenities as $facility)
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs sm:text-sm text-slate-700">
                        <div class="w-6 h-6 rounded-lg bg-[#edf4fc] text-[#0353a4] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="font-medium">{{ $facility }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

        <!-- Right 4 Columns: Sticky Booking & Pricing Card -->
        <div class="lg:col-span-4">
            <div class="sticky top-28 space-y-6">

                <!-- Pricing Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-lg space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Pilihan Skema Tarif</span>
                        <div class="mt-2 space-y-2">
                            @if($room->price_hourly)
                            <div class="flex items-center justify-between text-xs sm:text-sm">
                                <span class="text-slate-600">Per Jam:</span>
                                <span class="font-bold text-slate-900">Rp {{ number_format($room->price_hourly, 0, ',', '.') }}</span>
                            </div>
                            @endif

                            @if($room->price_daily)
                            <div class="flex items-center justify-between text-xs sm:text-sm">
                                <span class="text-slate-600">Per Hari:</span>
                                <span class="font-bold text-slate-900">Rp {{ number_format($room->price_daily, 0, ',', '.') }}</span>
                            </div>
                            @endif

                            @if($room->price_monthly)
                            <div class="flex items-center justify-between text-xs sm:text-sm">
                                <span class="text-slate-600">Per Bulan:</span>
                                <span class="font-bold text-[#0353a4] text-base">Rp {{ number_format($room->price_monthly, 0, ',', '.') }}</span>
                            </div>
                            @endif

                            @if(!$room->price_hourly && !$room->price_daily && !$room->price_monthly)
                            <div class="text-slate-700 text-sm font-semibold">Hubungi Kami untuk Penawaran Khusus</div>
                            @endif
                        </div>
                    </div>

                    <!-- Direct Booking / Reservation Form -->
                    <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="service_type" value="{{ $room->category }}">

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap *</label>
                            <input type="text" name="name" required placeholder="Nama Anda" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#0353a4] outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor WhatsApp *</label>
                            <input type="tel" name="phone" required placeholder="0812-xxxx-xxxx" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#0353a4] outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Email *</label>
                            <input type="email" name="email" required placeholder="email@perusahaan.com" class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#0353a4] outline-none">
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Tgl Mulai</label>
                                <input type="date" name="start_date" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#0353a4] outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Durasi</label>
                                <input type="text" name="duration" placeholder="Contoh: 1 Bulan" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#0353a4] outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Catatan Tambahan</label>
                            <textarea name="notes" rows="2" placeholder="Jumlah pax, kebutuhan screen, dll." class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-[#0353a4] outline-none"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3 px-4 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] active:scale-95 text-white font-bold text-xs shadow-md shadow-[#0353a4]/30 transition">
                            Pesan Ruangan Ini
                        </button>
                    </form>

                    <!-- WhatsApp Direct Link -->
                    @php
                        $msg = rawurlencode("Halo KonsulinSpace, saya tertarik ingin menyewa ruangan '{$room->name}' ({$room->formatted_price}). Mohon info ketersediaan.");
                        $waDirect = "https://wa.me/6281298765432?text={$msg}";
                    @endphp
                    <div class="pt-2 text-center border-t border-slate-100">
                        <a href="{{ $waDirect }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-xl border border-[#0353a4] text-[#0353a4] font-semibold text-xs hover:bg-[#edf4fc] transition">
                            <svg class="w-4 h-4 fill-current text-[#0353a4]" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            <span>Chat Langsung via WhatsApp</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Related Rooms -->
    @if($relatedRooms->count() > 0)
    <div class="mt-20 pt-12 border-t border-slate-200">
        <h3 class="text-xl font-bold text-slate-900 mb-6">Pilihan Ruangan Lainnya</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedRooms as $rel)
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-xs hover:shadow-md transition">
                <img src="{{ $rel->thumbnail_url }}" alt="{{ $rel->name }}" class="w-full h-44 object-cover">
                <div class="p-5">
                    <span class="text-[11px] font-semibold text-[#0353a4] block">{{ $rel->category_label }}</span>
                    <h4 class="font-bold text-slate-900 mt-1">{{ $rel->name }}</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ $rel->capacity ?: '-' }}</p>
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-900">{{ $rel->formatted_price }}</span>
                        <a href="{{ route('rooms.show', $rel->slug) }}" class="text-xs font-semibold text-[#0353a4] hover:text-[#023e7d]">Detail &rarr;</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
    function switchMedia(url, type, clickedBtn) {
        const videoPlayer = document.getElementById('activeVideoPlayer');
        const imgDisplay = document.getElementById('activeImageDisplay');

        if (type === 'video') {
            imgDisplay.classList.add('hidden');
            imgDisplay.src = '';
            videoPlayer.classList.remove('hidden');
            videoPlayer.src = url;
            videoPlayer.play().catch(e => console.log('Autoplay blocked'));
        } else {
            videoPlayer.pause();
            videoPlayer.classList.add('hidden');
            videoPlayer.src = '';
            imgDisplay.classList.remove('hidden');
            imgDisplay.src = url;
        }

        document.querySelectorAll('.media-thumb-btn').forEach(btn => {
            btn.classList.remove('border-[#0353a4]', 'ring-2', 'ring-[#0353a4]/20');
            btn.classList.add('border-slate-200');
        });
        if (clickedBtn) {
            clickedBtn.classList.remove('border-slate-200');
            clickedBtn.classList.add('border-[#0353a4]', 'ring-2', 'ring-[#0353a4]/20');
        }
    }
</script>
@endpush

@endsection
