@extends('layouts.admin')

@section('title', 'Data Reservasi & Leads')
@section('page_title', 'Data Reservasi & Permintaan Masuk')
@section('page_subtitle', 'Kelola prospek calon klien dan status tindak lanjut penyewaan ruangan KonsulinSpace')

@section('content')
<div class="space-y-6">

    <!-- Metric Status Filter Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
        <a href="{{ route('admin.inquiries.index') }}" class="p-4 rounded-2xl bg-white border {{ !request('status') || request('status') === 'all' ? 'border-[#0353a4] ring-2 ring-[#0353a4]/20' : 'border-slate-200/80' }} shadow-xs transition hover:bg-slate-50">
            <span class="text-xs text-slate-500 font-medium">Semua Data</span>
            <span class="text-xl font-bold text-slate-900 block mt-1">{{ $stats['total'] }}</span>
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="p-4 rounded-2xl bg-white border {{ request('status') === 'new' ? 'border-amber-500 ring-2 ring-amber-500/20' : 'border-slate-200/80' }} shadow-xs transition hover:bg-slate-50">
            <span class="text-xs text-amber-600 font-semibold">Baru Masuk</span>
            <span class="text-xl font-bold text-amber-700 block mt-1">{{ $stats['new'] }}</span>
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'contacted']) }}" class="p-4 rounded-2xl bg-white border {{ request('status') === 'contacted' ? 'border-sky-500 ring-2 ring-sky-500/20' : 'border-slate-200/80' }} shadow-xs transition hover:bg-slate-50">
            <span class="text-xs text-sky-600 font-semibold">Sudah Dihubungi</span>
            <span class="text-xl font-bold text-sky-700 block mt-1">{{ $stats['contacted'] }}</span>
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'dealing']) }}" class="p-4 rounded-2xl bg-white border {{ request('status') === 'dealing' ? 'border-purple-500 ring-2 ring-purple-500/20' : 'border-slate-200/80' }} shadow-xs transition hover:bg-slate-50">
            <span class="text-xs text-purple-600 font-semibold">Proses Diskusi</span>
            <span class="text-xl font-bold text-purple-700 block mt-1">{{ $stats['dealing'] }}</span>
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'completed']) }}" class="p-4 rounded-2xl bg-white border {{ request('status') === 'completed' ? 'border-[#0353a4] ring-2 ring-[#0353a4]/20' : 'border-slate-200/80' }} shadow-xs transition hover:bg-slate-50">
            <span class="text-xs text-[#0353a4] font-semibold">Deal / Selesai</span>
            <span class="text-xl font-bold text-[#023e7d] block mt-1">{{ $stats['completed'] }}</span>
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs flex flex-col sm:flex-row items-center justify-between gap-3">
        <form method="GET" action="{{ route('admin.inquiries.index') }}" class="w-full flex flex-col sm:flex-row items-center gap-3">
            <div class="w-full sm:w-80 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, hp, perusahaan..." class="w-full pl-10 pr-4 py-2 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] outline-none">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <div class="w-full sm:w-48">
                <x-select name="status" onchange="this.form.submit()">
                    <option value="all">Semua Status</option>
                    <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>Baru</option>
                    <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Sudah Dihubungi</option>
                    <option value="dealing" {{ request('status') === 'dealing' ? 'selected' : '' }}>Proses Diskusi</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Deal / Selesai</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Batal</option>
                </x-select>
            </div>

            @if(request('search') || (request('status') && request('status') !== 'all'))
            <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-medium text-slate-500 hover:text-slate-800">Reset</a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-4 sm:px-6">Kontak Calon Klien</th>
                        <th class="py-3.5 px-4">Layanan / Ruangan</th>
                        <th class="py-3.5 px-4">Waktu & Durasi</th>
                        <th class="py-3.5 px-4">Catatan Kebutuhan</th>
                        <th class="py-3.5 px-4">Status Prospek</th>
                        <th class="py-3.5 px-4 sm:px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($inquiries as $inq)
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $inq->phone);
                        if (str_starts_with($cleanPhone, '0')) {
                            $cleanPhone = '62' . substr($cleanPhone, 1);
                        }
                    @endphp
                    <tr class="hover:bg-slate-50/75 transition">
                        <!-- Contact -->
                        <td class="py-4 px-4 sm:px-6">
                            <div>
                                <h4 class="font-bold text-slate-900">{{ $inq->name }}</h4>
                                @if($inq->company_name)
                                <p class="text-xs text-slate-500 font-medium">{{ $inq->company_name }}</p>
                                @endif
                                <div class="text-xs text-slate-500 space-y-0.5 mt-1">
                                    <p class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        {{ $inq->email }}
                                    </p>
                                    <p class="flex items-center gap-1.5 font-semibold text-[#023e7d]">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                        {{ $inq->phone }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <!-- Service / Room -->
                        <td class="py-4 px-4 text-xs">
                            <span class="font-bold text-slate-800 block">{{ $inq->service_label }}</span>
                            @if($inq->room)
                            <a href="{{ route('rooms.show', $inq->room->slug) }}" target="_blank" class="text-[#0353a4] hover:underline mt-0.5 inline-block">Lihat Ruangan &rarr;</a>
                            @endif
                        </td>

                        <!-- Date & Duration -->
                        <td class="py-4 px-4 text-xs text-slate-600">
                            <div><strong>Mulai:</strong> {{ $inq->start_date ? $inq->start_date->format('d M Y') : 'Segera' }}</div>
                            <div><strong>Durasi:</strong> {{ $inq->duration ?: '-' }}</div>
                            <div class="text-[10px] text-slate-400 mt-1">{{ $inq->created_at->format('d M Y, H:i') }} WIB</div>
                        </td>

                        <!-- Notes -->
                        <td class="py-4 px-4 text-xs text-slate-600 max-w-xs">
                            <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-200/60 leading-relaxed italic">
                                "{{ $inq->notes ?: 'Tidak ada pesan khusus.' }}"
                            </div>
                        </td>

                        <!-- Status Select -->
                        <td class="py-4 px-4 w-44">
                            <form action="{{ route('admin.inquiries.update_status', $inq->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <x-select name="status" size="sm" onchange="this.form.submit()">
                                    <option value="new" {{ $inq->status === 'new' ? 'selected' : '' }}>Baru</option>
                                    <option value="contacted" {{ $inq->status === 'contacted' ? 'selected' : '' }}>Dihubungi</option>
                                    <option value="dealing" {{ $inq->status === 'dealing' ? 'selected' : '' }}>Proses Diskusi</option>
                                    <option value="completed" {{ $inq->status === 'completed' ? 'selected' : '' }}>Deal / Selesai</option>
                                    <option value="cancelled" {{ $inq->status === 'cancelled' ? 'selected' : '' }}>Batal</option>
                                </x-select>
                            </form>
                        </td>

                        <!-- Actions -->
                        <td class="py-4 px-4 sm:px-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="https://wa.me/{{ $cleanPhone }}?text=Halo%20{{ rawurlencode($inq->name) }},%20kami%20dari%20tim%20KonsulinSpace%20menindaklanjuti%20reservasi%20{{ rawurlencode($inq->service_label) }}." target="_blank" title="Kirim Pesan WhatsApp" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-[#0353a4] hover:bg-[#023e7d] text-white text-xs font-semibold shadow-xs transition">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    <span>WA</span>
                                </a>

                                <form action="{{ route('admin.inquiries.destroy', $inq->id) }}" method="POST" onsubmit="return confirm('Hapus data reservasi dari {{ $inq->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus Data" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">
                            <p class="text-sm font-semibold text-slate-600">Belum ada data reservasi yang cocok</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($inquiries->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $inquiries->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
