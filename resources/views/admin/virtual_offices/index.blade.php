@extends('layouts.admin')

@section('title', 'Kelola Virtual Office')
@section('page_title', 'Kelola Paket Virtual Office')
@section('page_subtitle', 'Atur harga paket domisili, daftar fasilitas yang didapat, status paket, dan badge populer')

@section('topbar_actions')
<a href="{{ route('admin.virtual-offices.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#0353a4] text-white text-xs font-semibold hover:bg-[#023e7d] transition shadow-sm shadow-[#0353a4]/30">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
    <span>Tambah Paket Baru</span>
</a>
@endsection

@section('content')
<div class="space-y-6">

    <!-- Filters & Search Toolbar -->
    <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs">
        <form method="GET" action="{{ route('admin.virtual-offices.index') }}" class="flex flex-col sm:flex-row gap-3 items-center justify-between">
            <div class="w-full sm:w-80 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau tagline paket..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] outline-none">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <div class="w-full sm:w-auto flex flex-wrap items-center gap-3">
                <!-- Status Filter -->
                <div class="w-40">
                    <x-select name="status" onchange="this.form.submit()">
                        <option value="all">Semua Status</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif (Tampil)</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Nonaktif (Draft)</option>
                    </x-select>
                </div>

                @if(request('search') || request('status'))
                <a href="{{ route('admin.virtual-offices.index') }}" class="px-3 py-2 rounded-xl text-xs font-medium text-slate-500 hover:text-slate-800 transition">
                    Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Virtual Office Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3.5 px-4 sm:px-6">Nama Paket</th>
                        <th class="py-3.5 px-4">Harga Paket</th>
                        <th class="py-3.5 px-4">Keterangan</th>
                        <th class="py-3.5 px-4">Fasilitas Termasuk</th>
                        <th class="py-3.5 px-4">Urutan</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 sm:px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($packages as $package)
                    <tr class="hover:bg-slate-50/75 transition">
                        <!-- Package Name & Badges -->
                        <td class="py-4 px-4 sm:px-6">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-xl bg-[#edf4fc] text-[#0353a4] flex items-center justify-center font-bold text-sm shrink-0 border border-[#b0d0f4]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.virtual-offices.edit', $package->id) }}" class="font-bold text-slate-900 hover:text-[#0353a4] transition block truncate">
                                            {{ $package->name }}
                                        </a>
                                        @if($package->is_popular)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#0353a4] text-white">
                                            Populer
                                        </span>
                                        @endif
                                    </div>
                                    <p class="text-xs text-slate-400 truncate max-w-xs mt-0.5">
                                        {{ $package->tagline ?: 'Tidak ada deskripsi singkat' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <!-- Price -->
                        <td class="py-4 px-4">
                            <span class="font-bold text-slate-900">{{ $package->formatted_price_monthly }}</span>
                            <span class="text-xs text-slate-400 block">/ {{ $package->billing_period ?: 'tahun' }}</span>
                        </td>

                        <!-- Note -->
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                {{ $package->price_note ?: 'exclude PPn' }}
                            </span>
                        </td>

                        <!-- Features Preview -->
                        <td class="py-4 px-4">
                            @php
                                $featuresCount = is_array($package->features) ? count($package->features) : 0;
                            @endphp
                            @if($featuresCount > 0)
                            <div class="space-y-1 max-w-xs">
                                <div class="flex items-center gap-1.5">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-semibold bg-[#edf4fc] text-[#023e7d] border border-[#b0d0f4]">
                                        {{ $featuresCount }} Fasilitas
                                    </span>
                                </div>
                                <ul class="text-xs text-slate-500 line-clamp-2 list-disc list-inside">
                                    @foreach(array_slice($package->features, 0, 2) as $feat)
                                    <li class="truncate">{{ $feat }}</li>
                                    @endforeach
                                    @if($featuresCount > 2)
                                    <li class="text-[11px] text-slate-400 italic list-none">+{{ $featuresCount - 2 }} fasilitas lainnya</li>
                                    @endif
                                </ul>
                            </div>
                            @else
                            <span class="text-xs text-slate-400 italic">Belum ada fasilitas</span>
                            @endif
                        </td>

                        <!-- Order Position -->
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-100 text-slate-700 text-xs font-bold">
                                {{ $package->order_position }}
                            </span>
                        </td>

                        <!-- Status -->
                        <td class="py-4 px-4">
                            @if($package->status === 'active')
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
                                <a href="{{ route('admin.virtual-offices.edit', $package->id) }}" class="p-2 rounded-lg text-slate-500 hover:text-[#0353a4] hover:bg-[#edf4fc] transition" title="Edit Paket">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>

                                <form action="{{ route('admin.virtual-offices.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket Virtual Office ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition" title="Hapus Paket">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-400">
                            <div class="max-w-xs mx-auto space-y-3">
                                <svg class="w-10 h-10 mx-auto text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                <p class="text-sm font-semibold text-slate-600">Tidak ada paket Virtual Office yang ditemukan</p>
                                <a href="{{ route('admin.virtual-offices.create') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#0353a4] text-white text-xs font-semibold hover:bg-[#023e7d] transition">
                                    Tambah Paket Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($packages->hasPages())
        <div class="p-4 border-t border-slate-200">
            {{ $packages->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
