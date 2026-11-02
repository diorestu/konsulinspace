@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('page_title', 'Dashboard Overview')
@section('page_subtitle', 'Ringkasan operasional ruangan dan prospek klien KonsulinSpace')

@section('topbar_actions')
<a href="{{ route('admin.rooms.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-600 text-white text-xs font-semibold hover:bg-emerald-700 transition shadow-sm shadow-emerald-600/30">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
    <span>Tambah Ruangan</span>
</a>
@endsection

@section('content')
<div class="space-y-8">

    <!-- KPI Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Total Rooms -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Ruangan</p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalRooms }}</h3>
                <p class="text-xs text-emerald-600 font-medium mt-1 flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    {{ $availableRooms }} ruangan aktif tersedia
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
        </div>

        <!-- Total Media (Gambar & Video) -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Media Ruangan</p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalImages + $totalVideos }}</h3>
                <p class="text-xs text-slate-500 mt-1 flex items-center gap-1.5">
                    <span class="text-emerald-600 font-semibold">{{ $totalImages }} Foto</span> &bull;
                    <span class="text-rose-600 font-semibold">{{ $totalVideos }} Video</span>
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>

        <!-- Total Inquiries -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Reservasi</p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalInquiries }}</h3>
                <p class="text-xs text-amber-600 font-medium mt-1">
                    {{ $newInquiriesCount }} prospek baru menunggu
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>

        <!-- Virtual Office & Spaces -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Kategori Terbanyak</p>
                <h3 class="text-xl font-bold text-slate-900 mt-1 truncate">
                    Co-Working & Office
                </h3>
                <p class="text-xs text-slate-500 mt-1">
                    {{ $categoryStats['coworking'] }} Coworking &bull; {{ $categoryStats['virtual_office'] }} Virtual Office
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
        </div>
    </div>

    <!-- Category Distribution Pills -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs">
        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4">Distribusi Unit Ruangan</h3>
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-center">
                <span class="text-xs font-medium text-slate-500 block">Co-Working</span>
                <span class="text-xl font-extrabold text-slate-900 mt-1 block">{{ $categoryStats['coworking'] }}</span>
            </div>
            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-center">
                <span class="text-xs font-medium text-slate-500 block">Virtual Office</span>
                <span class="text-xl font-extrabold text-slate-900 mt-1 block">{{ $categoryStats['virtual_office'] }}</span>
            </div>
            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-center">
                <span class="text-xs font-medium text-slate-500 block">Meeting Room</span>
                <span class="text-xl font-extrabold text-slate-900 mt-1 block">{{ $categoryStats['meeting_room'] }}</span>
            </div>
            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-center">
                <span class="text-xs font-medium text-slate-500 block">Private Office</span>
                <span class="text-xl font-extrabold text-slate-900 mt-1 block">{{ $categoryStats['private_office'] }}</span>
            </div>
            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-center">
                <span class="text-xs font-medium text-slate-500 block">Event Space</span>
                <span class="text-xl font-extrabold text-slate-900 mt-1 block">{{ $categoryStats['event_space'] }}</span>
            </div>
        </div>
    </div>

    <!-- Two-column Section: Recent Inquiries & Recent Rooms -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Recent Inquiries -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Reservasi & Permintaan Terbaru</h3>
                    <p class="text-xs text-slate-500">Pesan dari prospek pelanggan website</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700">Lihat Semua &rarr;</a>
            </div>

            <div class="divide-y divide-slate-100 flex-1 overflow-x-auto">
                @forelse($recentInquiries as $inq)
                <div class="p-4 hover:bg-slate-50/80 transition flex items-start justify-between gap-4">
                    <div class="min-w-0">
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-sm text-slate-900 truncate">{{ $inq->name }}</span>
                            @if($inq->company_name)
                            <span class="text-xs text-slate-400">({{ $inq->company_name }})</span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-500 mt-0.5">
                            <span class="font-medium text-slate-700">{{ $inq->service_label }}</span>
                            @if($inq->duration) &bull; {{ $inq->duration }} @endif
                        </p>
                        <p class="text-xs text-slate-600 mt-1 line-clamp-1 italic">"{{ $inq->notes ?: 'Tanpa catatan' }}"</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">{{ $inq->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="shrink-0 flex flex-col items-end gap-2">
                        @if($inq->status === 'new')
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">Baru</span>
                        @elseif($inq->status === 'contacted')
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-sky-100 text-sky-800">Dihubungi</span>
                        @elseif($inq->status === 'dealing')
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-100 text-purple-800">Diskusi</span>
                        @elseif($inq->status === 'completed')
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Deal</span>
                        @else
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-800">Batal</span>
                        @endif

                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inq->phone) }}" target="_blank" class="text-xs text-emerald-600 hover:text-emerald-700 font-semibold flex items-center gap-1">
                            <span>Hubungi WA</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center text-slate-400 text-sm">
                    Belum ada reservasi masuk saat ini.
                </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Rooms -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Daftar Ruangan Terdaftar</h3>
                    <p class="text-xs text-slate-500">Koleksi ruang kerja KonsulinSpace</p>
                </div>
                <a href="{{ route('admin.rooms.index') }}" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700">Kelola Semua &rarr;</a>
            </div>

            <div class="divide-y divide-slate-100 flex-1">
                @foreach($recentRooms as $room)
                <div class="p-4 hover:bg-slate-50/80 transition flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3 min-w-0">
                        <img src="{{ $room->thumbnail_url }}" alt="{{ $room->name }}" class="w-12 h-12 rounded-xl object-cover shrink-0 bg-slate-100 border border-slate-200">
                        <div class="min-w-0">
                            <h4 class="text-sm font-semibold text-slate-900 truncate">{{ $room->name }}</h4>
                            <p class="text-xs text-slate-500 truncate">
                                <span class="text-emerald-600 font-medium">{{ $room->category_label }}</span>
                                &bull; {{ $room->capacity ?: '-' }}
                            </p>
                            <p class="text-xs font-semibold text-slate-700 mt-0.5">{{ $room->formatted_price }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <a href="{{ route('rooms.show', $room->slug) }}" target="_blank" title="Lihat di Web" class="p-2 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </a>
                        <a href="{{ route('admin.rooms.edit', $room->id) }}" class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 text-xs font-medium transition">
                            Edit
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection
