@extends('layouts.admin')

@section('title', 'Kelola Hero Carousel')
@section('page_title', 'Kelola Hero Carousel')
@section('page_subtitle', 'Atur gambar banner carousel 21:9 di halaman depan, pilih opsi tampilan teks atau gambar saja')

@section('topbar_actions')
<a href="{{ route('admin.hero-slides.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#0353a4] text-white text-xs font-semibold hover:bg-[#023e7d] transition shadow-sm shadow-[#0353a4]/30">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
    <span>Tambah Slide Baru</span>
</a>
@endsection

@section('content')
<div class="space-y-6">

    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-4 sm:px-6">Preview Gambar (21:9)</th>
                        <th class="py-3.5 px-4">Tipe Slide</th>
                        <th class="py-3.5 px-4">Judul & Konten</th>
                        <th class="py-3.5 px-4">Urutan</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 sm:px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($slides as $slide)
                    <tr class="hover:bg-slate-50/75 transition">
                        <!-- Preview -->
                        <td class="py-4 px-4 sm:px-6">
                            <div class="w-36 aspect-[21/9] rounded-xl overflow-hidden bg-slate-900 border border-slate-200 shadow-xs relative shrink-0">
                                <img src="{{ $slide->image_url }}" alt="{{ $slide->title ?: 'Slide' }}" class="w-full h-full object-cover">
                            </div>
                        </td>

                        <!-- Tipe Slide -->
                        <td class="py-4 px-4">
                            @if($slide->slide_type === 'image_only')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-700 border border-purple-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Images Only
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-sky-50 text-sky-700 border border-sky-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                Dengan Text & CTA
                            </span>
                            @endif
                        </td>

                        <!-- Judul & Konten -->
                        <td class="py-4 px-4">
                            <div class="max-w-md">
                                @if($slide->slide_type === 'with_text')
                                    @if($slide->badge_text)
                                    <span class="text-[10px] font-semibold text-[#0353a4] uppercase tracking-wider block mb-0.5">{{ $slide->badge_text }}</span>
                                    @endif
                                    <h4 class="font-bold text-slate-900 truncate">{{ $slide->title }}</h4>
                                    <p class="text-xs text-slate-500 line-clamp-1 mt-0.5">{{ $slide->subtitle }}</p>
                                @else
                                    <p class="text-xs text-slate-400 italic">Hanya menampilkan gambar banner penuh (tanpa teks overlay).</p>
                                    @if($slide->cta_primary_link)
                                    <p class="text-[11px] text-slate-500 mt-1">Link tujuan: <span class="font-mono text-slate-700">{{ $slide->cta_primary_link }}</span></p>
                                    @endif
                                @endif
                            </div>
                        </td>

                        <!-- Urutan -->
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-100 text-slate-700 text-xs font-bold">
                                {{ $slide->order_position }}
                            </span>
                        </td>

                        <!-- Status -->
                        <td class="py-4 px-4">
                            @if($slide->status === 'active')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Aktif
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                Nonaktif
                            </span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="py-4 px-4 sm:px-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.hero-slides.edit', $slide->id) }}" class="p-2 rounded-lg text-slate-500 hover:text-[#0353a4] hover:bg-[#edf4fc] transition" title="Edit Slide">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>

                                <form action="{{ route('admin.hero-slides.destroy', $slide->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Hapus Slide">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">
                            <div class="max-w-xs mx-auto space-y-3">
                                <p class="text-sm font-semibold text-slate-600">Belum ada slide hero carousel</p>
                                <a href="{{ route('admin.hero-slides.create') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#0353a4] text-white text-xs font-semibold hover:bg-[#023e7d] transition">
                                    Tambah Slide Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($slides->hasPages())
        <div class="p-4 border-t border-slate-200">
            {{ $slides->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
