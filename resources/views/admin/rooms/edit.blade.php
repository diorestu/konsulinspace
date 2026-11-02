@extends('layouts.admin')

@section('title', 'Edit Ruangan - ' . $room->name)
@section('page_title', 'Edit Ruangan')
@section('page_subtitle', 'Perbarui detail, harga, fasilitas, dan kelola galeri foto & video untuk ' . $room->name)

@section('topbar_actions')
<a href="{{ route('rooms.show', $room->slug) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
    <span>Pratinjau di Web</span>
</a>
@endsection

@section('content')
<div class="max-w-5xl mx-auto space-y-8">

    <!-- Section 1: Galeri Media Saat Ini & Dropzone Uploader -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
        <div class="border-b border-slate-100 pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <div>
                <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                    <span>Kelola Media Ruangan</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800 uppercase">Foto & Video</span>
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">Media yang ditampilkan kepada pengunjung di halaman detail ruangan</p>
            </div>
            <div class="text-xs text-slate-500">
                Total Media: <strong class="text-slate-800" id="mediaCountText">{{ $room->media->count() }} file</strong>
            </div>
        </div>

        <!-- Existing Media Grid -->
        <div id="existingMediaGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @forelse($room->media as $item)
            <div id="media-card-{{ $item->id }}" class="relative rounded-xl border border-slate-200 overflow-hidden bg-slate-50 flex flex-col group">
                <!-- Media Preview -->
                <div class="aspect-video w-full bg-slate-900 relative flex items-center justify-center overflow-hidden">
                    @if($item->file_type === 'video')
                        <video src="{{ $item->url }}" controls preload="metadata" class="w-full h-full object-cover"></video>
                        <span class="absolute top-2 left-2 px-2 py-0.5 rounded bg-rose-600 text-white text-[10px] font-bold tracking-wider uppercase pointer-events-none z-10">Video</span>
                    @else
                        <img src="{{ $item->url }}" alt="{{ $item->file_name }}" class="w-full h-full object-cover">
                        <span class="absolute top-2 left-2 px-2 py-0.5 rounded bg-slate-800/80 backdrop-blur-xs text-white text-[10px] font-semibold pointer-events-none">Foto</span>
                    @endif

                    @if($item->is_primary)
                    <span class="absolute top-2 right-2 px-2 py-0.5 rounded-full bg-emerald-500 text-white text-[10px] font-bold tracking-wide shadow-xs flex items-center gap-1 z-10">
                        <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        Utama
                    </span>
                    @endif
                </div>

                <!-- Footer details & actions -->
                <div class="p-3 bg-white flex items-center justify-between gap-2 border-t border-slate-100">
                    <div class="min-w-0">
                        <p class="text-xs font-semibold text-slate-800 truncate" title="{{ $item->file_name }}">{{ $item->file_name }}</p>
                        <p class="text-[10px] text-slate-400">{{ $item->formatted_size }}</p>
                    </div>

                    <div class="flex items-center gap-1 shrink-0">
                        @if($item->file_type === 'image' && !$item->is_primary)
                        <button type="button" onclick="setPrimaryMedia({{ $item->id }})" title="Jadikan Thumbnail Utama" class="px-2 py-1 rounded-md text-[11px] font-medium bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 transition">
                            Jadikan Utama
                        </button>
                        @endif

                        <button type="button" onclick="deleteMedia({{ $item->id }})" title="Hapus Media" class="p-1.5 rounded-md text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div id="noMediaAlert" class="col-span-full p-8 text-center bg-slate-50 rounded-xl border border-dashed border-slate-200 text-slate-400 text-xs">
                Belum ada media tersimpan untuk ruangan ini. Silakan gunakan Dropzone di bawah untuk mengunggah gambar/video.
            </div>
            @endforelse
        </div>

        <!-- Dropzone File Uploader to add new media directly -->
        <div class="pt-4 border-t border-slate-100">
            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Tambah Media Baru (Tarik & Lepas File Dropzone)</h4>
            <div id="roomEditDropzone" class="dropzone custom-dropzone">
                <div class="dz-message flex flex-col items-center justify-center p-6 cursor-pointer">
                    <div class="w-14 h-14 mb-3 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100 shadow-xs">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                    </div>
                    <p class="text-sm font-bold text-slate-800">Tarik & Lepas Gambar atau Video ke sini untuk langsung menambahkan</p>
                    <p class="text-xs text-slate-500 mt-1">Mendukung JPG, PNG, WEBP, MP4, MOV, WEBM (Maks. 50MB per file)</p>
                    <button type="button" class="mt-3 px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs transition">
                        Pilih File
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Form Edit Data Ruangan -->
    <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Informasi Detail Ruangan -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-slate-900">Informasi Ruangan</h3>
                <p class="text-xs text-slate-500">Edit spesifikasi, peruntukan kapasitas, dan status ketersediaan</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Nama Ruangan -->
                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Nama Ruangan / Paket <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" required value="{{ old('name', $room->name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm outline-none">
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Kategori Layanan <span class="text-rose-500">*</span>
                    </label>
                    <select name="category" id="category" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 text-sm outline-none bg-white">
                        @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $room->category) === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Kapasitas -->
                <div>
                    <label for="capacity" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Kapasitas Orang
                    </label>
                    <input type="text" name="capacity" id="capacity" value="{{ old('capacity', $room->capacity) }}" placeholder="Contoh: 1 Orang, 4-6 Orang, 50-80 Pax" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none">
                </div>

                <!-- Luas Area -->
                <div>
                    <label for="area_sqm" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Luas Area / Dimensi
                    </label>
                    <input type="text" name="area_sqm" id="area_sqm" value="{{ old('area_sqm', $room->area_sqm) }}" placeholder="Contoh: 28 m², 120 m² (Shared)" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none">
                </div>

                <!-- Lokasi Lantai -->
                <div>
                    <label for="location_floor" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Lokasi / Posisi Lantai
                    </label>
                    <input type="text" name="location_floor" id="location_floor" value="{{ old('location_floor', $room->location_floor) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none">
                </div>

                <!-- Status Ketersediaan -->
                <div>
                    <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Status Ketersediaan <span class="text-rose-500">*</span>
                    </label>
                    <select name="status" id="status" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none bg-white">
                        <option value="available" {{ old('status', $room->status) === 'available' ? 'selected' : '' }}>Tersedia (Bisa Dipesan)</option>
                        <option value="booked" {{ old('status', $room->status) === 'booked' ? 'selected' : '' }}>Terisi / Booked</option>
                        <option value="maintenance" {{ old('status', $room->status) === 'maintenance' ? 'selected' : '' }}>Dalam Pemeliharaan</option>
                    </select>
                </div>

                <!-- Urutan & Featured -->
                <div class="flex items-center gap-6 pt-3">
                    <div class="flex-1">
                        <label for="order_position" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Urutan Tampilan
                        </label>
                        <input type="number" name="order_position" id="order_position" value="{{ old('order_position', $room->order_position) }}" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm">
                    </div>
                    <div class="pt-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $room->is_featured) ? 'checked' : '' }} class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500 border-slate-300">
                            <span class="text-xs font-bold text-slate-800">Tampilkan di Beranda (Featured)</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Skema Tarif -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-slate-900">Skema Harga Sewa</h3>
                <p class="text-xs text-slate-500">Harga per jam, hari, atau bulan</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label for="price_hourly" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Harga Per Jam (Rp)
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-2.5 text-xs font-bold text-slate-400">Rp</span>
                        <input type="number" name="price_hourly" id="price_hourly" value="{{ old('price_hourly', $room->price_hourly) }}" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none">
                    </div>
                </div>

                <div>
                    <label for="price_daily" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Harga Per Hari (Rp)
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-2.5 text-xs font-bold text-slate-400">Rp</span>
                        <input type="number" name="price_daily" id="price_daily" value="{{ old('price_daily', $room->price_daily) }}" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none">
                    </div>
                </div>

                <div>
                    <label for="price_monthly" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Harga Per Bulan (Rp)
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-2.5 text-xs font-bold text-slate-400">Rp</span>
                        <input type="number" name="price_monthly" id="price_monthly" value="{{ old('price_monthly', $room->price_monthly) }}" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none">
                    </div>
                </div>
            </div>
        </div>

        <!-- Fasilitas & Deskripsi -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-slate-900">Fasilitas & Deskripsi</h3>
                <p class="text-xs text-slate-500">Daftar fasilitas yang didapatkan pelanggan</p>
            </div>

            <div class="space-y-5">
                <div>
                    <label for="amenities_input" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Daftar Fasilitas Ruangan
                    </label>
                    <textarea name="amenities_input" id="amenities_input" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none">{{ old('amenities_input', $amenitiesText) }}</textarea>
                </div>

                <div>
                    <label for="short_description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Deskripsi Singkat
                    </label>
                    <input type="text" name="short_description" id="short_description" value="{{ old('short_description', $room->short_description) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none">
                </div>

                <div>
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Deskripsi Lengkap
                    </label>
                    <textarea name="description" id="description" rows="5" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 text-sm outline-none">{{ old('description', $room->description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Submit Bar -->
        <div class="flex items-center justify-end gap-4 pt-2">
            <a href="{{ route('admin.rooms.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-100 transition">
                Batal
            </a>
            <button type="submit" class="px-7 py-2.5 rounded-xl bg-emerald-600 text-white font-bold text-sm hover:bg-emerald-700 active:scale-95 transition shadow-md shadow-emerald-600/30">
                Perbarui Data Ruangan
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Handle AJAX set primary media
    async function setPrimaryMedia(mediaId) {
        try {
            const res = await fetch(`/admin/media/${mediaId}/primary`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });
            if (res.ok) {
                window.location.reload();
            } else {
                alert('Gagal mengubah thumbnail utama.');
            }
        } catch (e) {
            console.error(e);
            alert('Terjadi kesalahan jaringan.');
        }
    }

    // Handle AJAX delete media
    async function deleteMedia(mediaId) {
        if (!confirm('Apakah Anda yakin ingin menghapus file media ini?')) return;

        try {
            const res = await fetch(`/admin/media/${mediaId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });
            if (res.ok) {
                const card = document.getElementById(`media-card-${mediaId}`);
                if (card) card.remove();
                window.location.reload();
            } else {
                alert('Gagal menghapus file.');
            }
        } catch (e) {
            console.error(e);
            alert('Terjadi kesalahan koneksi.');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const dropzoneEl = document.querySelector("#roomEditDropzone");
        if (!dropzoneEl) return;

        const DropzoneClass = window.Dropzone || Dropzone;
        if (!DropzoneClass) return;

        const editDropzone = new DropzoneClass(dropzoneEl, {
            url: "{{ route('admin.rooms.upload_media', $room->id) }}",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            paramName: "file",
            maxFilesize: 50,
            acceptedFiles: "image/*,video/*",
            addRemoveLinks: false,
            init: function() {
                this.on("success", function(file, response) {
                    if (response.success && response.media) {
                        // Dynamically append new card to grid or reload to reflect state
                        setTimeout(() => {
                            window.location.reload();
                        }, 600);
                    }
                });

                this.on("error", function(file, errorMsg) {
                    console.error("Dropzone upload error:", errorMsg);
                    alert("Upload gagal: " + (typeof errorMsg === 'string' ? errorMsg : 'Format/ukuran file tidak sesuai'));
                });
            }
        });
    });
</script>
@endpush
