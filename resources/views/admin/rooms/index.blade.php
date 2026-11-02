@extends('layouts.admin')

@section('title', 'Daftar Ruangan')
@section('page_title', 'Kelola Ruangan & Ruang Kerja')
@section('page_subtitle', 'Atur seluruh data ruangan, harga, kapasitas, dan galeri media video & foto')

@section('topbar_actions')
<a href="{{ route('admin.rooms.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 text-white text-xs font-semibold hover:bg-emerald-700 transition shadow-sm shadow-emerald-600/30">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
    <span>Tambah Ruangan Baru</span>
</a>
@endsection

@section('content')
<div class="space-y-6">

    <!-- Filters & Search Toolbar -->
    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs">
        <form method="GET" action="{{ route('admin.rooms.index') }}" class="flex flex-col sm:flex-row gap-3 items-center justify-between">
            <div class="w-full sm:w-80 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau lantai..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <div class="w-full sm:w-auto flex flex-wrap items-center gap-3">
                <!-- Category Filter -->
                <select name="category" onchange="this.form.submit()" class="px-3 py-2.5 rounded-xl border border-slate-200 text-xs font-medium text-slate-700 bg-white focus:ring-2 focus:ring-emerald-500 outline-none">
                    <option value="all">Semua Kategori</option>
                    <option value="coworking" {{ request('category') === 'coworking' ? 'selected' : '' }}>Co-Working Space</option>
                    <option value="virtual_office" {{ request('category') === 'virtual_office' ? 'selected' : '' }}>Virtual Office</option>
                    <option value="meeting_room" {{ request('category') === 'meeting_room' ? 'selected' : '' }}>Meeting Room</option>
                    <option value="private_office" {{ request('category') === 'private_office' ? 'selected' : '' }}>Private Office</option>
                    <option value="event_space" {{ request('category') === 'event_space' ? 'selected' : '' }}>Event & Training Space</option>
                </select>

                <!-- Status Filter -->
                <select name="status" onchange="this.form.submit()" class="px-3 py-2.5 rounded-xl border border-slate-200 text-xs font-medium text-slate-700 bg-white focus:ring-2 focus:ring-emerald-500 outline-none">
                    <option value="all">Semua Status</option>
                    <option value="available" {{ request('status') === 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="booked" {{ request('status') === 'booked' ? 'selected' : '' }}>Booked / Terisi</option>
                    <option value="maintenance" {{ request('status') === 'maintenance' ? 'selected' : '' }}>Pemeliharaan</option>
                </select>

                @if(request('search') || request('category') || request('status'))
                <a href="{{ route('admin.rooms.index') }}" class="px-3 py-2 rounded-xl text-xs font-medium text-slate-500 hover:text-slate-800 transition">
                    Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Rooms Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-4 sm:px-6">Ruangan</th>
                        <th class="py-3.5 px-4">Kategori</th>
                        <th class="py-3.5 px-4">Kapasitas / Luas</th>
                        <th class="py-3.5 px-4">Harga Sewa</th>
                        <th class="py-3.5 px-4">Media (Dropzone)</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 sm:px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($rooms as $room)
                    @php
                        $imageCount = $room->media->where('file_type', 'image')->count();
                        $videoCount = $room->media->where('file_type', 'video')->count();
                    @endphp
                    <tr class="hover:bg-slate-50/75 transition">
                        <!-- Thumbnail & Title -->
                        <td class="py-4 px-4 sm:px-6">
                            <div class="flex items-center gap-3.5">
                                <div class="relative shrink-0">
                                    <img src="{{ $room->thumbnail_url }}" alt="{{ $room->name }}" class="w-14 h-14 rounded-xl object-cover bg-slate-100 border border-slate-200 shadow-xs">
                                    @if($room->is_featured)
                                    <span class="absolute -top-1.5 -right-1.5 bg-amber-500 text-white p-0.5 rounded-full shadow-xs" title="Featured Room">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    </span>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="font-bold text-slate-900 hover:text-emerald-600 transition block truncate">
                                        {{ $room->name }}
                                    </a>
                                    <p class="text-xs text-slate-400 truncate max-w-xs">{{ $room->location_floor ?: 'Lokasi belum diset' }}</p>
                                </div>
                            </div>
                        </td>

                        <!-- Category -->
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-slate-100 text-slate-700">
                                {{ $room->category_label }}
                            </span>
                        </td>

                        <!-- Capacity & Area -->
                        <td class="py-4 px-4 text-xs text-slate-600">
                            <div class="font-medium text-slate-800">{{ $room->capacity ?: '-' }}</div>
                            @if($room->area_sqm)
                            <div class="text-slate-400 mt-0.5">{{ $room->area_sqm }}</div>
                            @endif
                        </td>

                        <!-- Price -->
                        <td class="py-4 px-4 text-xs font-medium text-slate-900">
                            <div>{{ $room->formatted_price }}</div>
                            @if($room->price_daily)
                            <div class="text-slate-400 text-[11px] font-normal">Rp {{ number_format($room->price_daily, 0, ',', '.') }}/hari</div>
                            @endif
                        </td>

                        <!-- Media Badges -->
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-1.5 flex-wrap">
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $imageCount }} Foto
                                </span>
                                @if($videoCount > 0)
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    {{ $videoCount }} Video
                                </span>
                                @endif
                            </div>
                        </td>

                        <!-- Status -->
                        <td class="py-4 px-4">
                            @if($room->status === 'available')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Tersedia
                            </span>
                            @elseif($room->status === 'booked')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                Terisi
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                Pemeliharaan
                            </span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="py-4 px-4 sm:px-6 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('rooms.show', $room->slug) }}" target="_blank" title="Lihat di Website" class="p-2 rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                                <a href="{{ route('admin.rooms.edit', $room->id) }}" title="Edit Ruangan" class="p-2 rounded-lg text-emerald-600 hover:bg-emerald-50 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ruangan {{ $room->name }} beserta seluruh medianya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus Ruangan" class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-400">
                            <p class="text-base font-semibold text-slate-600">Tidak ada ruangan yang ditemukan</p>
                            <p class="text-xs text-slate-400 mt-1">Silakan sesuaikan filter pencarian atau tambahkan ruangan baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($rooms->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $rooms->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
