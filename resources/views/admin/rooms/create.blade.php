@extends('layouts.admin')

@section('title', 'Tambah Ruangan Baru')
@section('page_title', 'Tambah Ruangan Baru')
@section('page_subtitle', 'Lengkapi detail spesifikasi, harga, fasilitas, serta upload foto dan video ruangan')

@section('content')
<div class="max-w-5xl mx-auto">
    <form id="roomForm" action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- Card 1: Informasi Utama Ruangan -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-slate-900">Informasi Ruangan</h3>
                <p class="text-xs text-slate-500">Kategori, kapasitas, dan posisi lantai ruangan</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Nama Ruangan -->
                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Nama Ruangan / Paket <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Contoh: Dedicated Desk Creative Hive, Boardroom Alpha, Virtual Office Gold" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] text-sm outline-none">
                </div>

                <!-- Kategori -->
                <div>
                    <x-select name="category" label="Kategori Layanan" required placeholder="-- Pilih Kategori --">
                        @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ old('category') === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-select>
                </div>

                <!-- Kapasitas -->
                <div>
                    <label for="capacity" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Kapasitas Orang
                    </label>
                    <input type="text" name="capacity" id="capacity" value="{{ old('capacity') }}" placeholder="Contoh: 1 Orang, 4-6 Orang, 50-80 Pax" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] text-sm outline-none">
                </div>

                <!-- Luas Area -->
                <div>
                    <label for="area_sqm" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Luas Area / Dimensi
                    </label>
                    <input type="text" name="area_sqm" id="area_sqm" value="{{ old('area_sqm') }}" placeholder="Contoh: 28 m², 120 m² (Shared)" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] text-sm outline-none">
                </div>

                <!-- Lokasi Lantai -->
                <div>
                    <label for="location_floor" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Lokasi / Posisi Lantai
                    </label>
                    <input type="text" name="location_floor" id="location_floor" value="{{ old('location_floor') }}" placeholder="Contoh: Lantai 3 - BSD Hub West" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4] text-sm outline-none">
                </div>

                <!-- Status Ketersediaan -->
                <div>
                    <x-select name="status" label="Status Ketersediaan" required>
                        <option value="available" {{ old('status', 'available') === 'available' ? 'selected' : '' }}>Tersedia (Bisa Dipesan)</option>
                        <option value="booked" {{ old('status') === 'booked' ? 'selected' : '' }}>Terisi / Booked</option>
                        <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Dalam Pemeliharaan</option>
                    </x-select>
                </div>

                <!-- Urutan & Featured -->
                <div class="flex items-center gap-6 pt-3">
                    <div class="flex-1">
                        <label for="order_position" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Urutan Tampilan
                        </label>
                        <input type="number" name="order_position" id="order_position" value="{{ old('order_position', 0) }}" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm">
                    </div>
                    <div class="pt-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-4 h-4 rounded text-[#0353a4] focus:ring-[#0353a4] border-slate-300">
                            <span class="text-xs font-bold text-slate-800">Tampilkan di Beranda (Featured)</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Skema Harga Sewa -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-slate-900">Skema Harga Sewa</h3>
                <p class="text-xs text-slate-500">Isi sesuai opsi tarif yang berlaku untuk ruangan ini (kosongkan jika tidak tersedia)</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label for="price_hourly" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Harga Per Jam (Rp)
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-2.5 text-xs font-bold text-slate-400">Rp</span>
                        <input type="number" name="price_hourly" id="price_hourly" value="{{ old('price_hourly') }}" placeholder="Contoh: 50000" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none">
                    </div>
                </div>

                <div>
                    <label for="price_daily" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Harga Per Hari (Rp)
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-2.5 text-xs font-bold text-slate-400">Rp</span>
                        <input type="number" name="price_daily" id="price_daily" value="{{ old('price_daily') }}" placeholder="Contoh: 200000" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none">
                    </div>
                </div>

                <div>
                    <label for="price_monthly" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Harga Per Bulan (Rp)
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-2.5 text-xs font-bold text-slate-400">Rp</span>
                        <input type="number" name="price_monthly" id="price_monthly" value="{{ old('price_monthly') }}" placeholder="Contoh: 2500000" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none">
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Media Upload with DROPZONE (Images & Videos) -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <span>Upload Media Galeri (Dropzone)</span>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#edf4fc] text-[#023e7d] uppercase">Gambar & Video</span>
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">Unggah foto dan video promosi/virtual tour ruangan menggunakan Drag and Drop</p>
                </div>
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-[#0353a4]"></span> Gambar (JPG, PNG, WEBP)</span>
                    <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-rose-500"></span> Video (MP4, WEBM, MOV)</span>
                </div>
            </div>

            <!-- Dropzone Container -->
            <div>
                <div id="roomDropzone" class="dropzone custom-dropzone">
                    <div class="dz-message flex flex-col items-center justify-center p-6 cursor-pointer">
                        <div class="w-16 h-16 mb-4 rounded-2xl bg-[#edf4fc] text-[#0353a4] flex items-center justify-center border border-[#b0d0f4] shadow-xs">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                        </div>
                        <h4 class="text-base font-bold text-slate-800">Tarik & Lepas File Gambar atau Video di Sini</h4>
                        <p class="text-xs text-slate-500 mt-1 max-w-sm text-center">
                            Mendukung file gambar (<strong class="text-slate-700">JPG, PNG, WEBP</strong>) dan video (<strong class="text-slate-700">MP4, WEBM, MOV</strong>) hingga 50MB per file.
                        </p>
                        <button type="button" class="mt-4 px-4 py-2 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs shadow-sm transition">
                            Pilih File dari Perangkat
                        </button>
                    </div>
                </div>
                <p class="text-[11px] text-slate-400 mt-2 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    File yang diunggah akan otomatis terhubung saat form ruangan ini disimpan.
                </p>
            </div>

            <!-- Fallback Input -->
            <details class="text-xs text-slate-500 pt-2 border-t border-slate-100">
                <summary class="cursor-pointer font-medium hover:text-slate-700">Opsi input file manual (tanpa Dropzone)</summary>
                <div class="mt-3">
                    <input type="file" name="fallback_files[]" multiple accept="image/*,video/*" class="text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                </div>
            </details>
        </div>

        <!-- Card 4: Fasilitas & Deskripsi -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-slate-900">Fasilitas & Deskripsi</h3>
                <p class="text-xs text-slate-500">Jelaskan keunggulan dan kenyamanan yang didapatkan penyewa</p>
            </div>

            <div class="space-y-5">
                <!-- Fasilitas Input -->
                <div>
                    <label for="amenities_input" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Daftar Fasilitas Ruangan
                    </label>
                    <textarea name="amenities_input" id="amenities_input" rows="4" placeholder="Tuliskan tiap fasilitas per baris atau pisahkan dengan koma:&#10;WiFi High-Speed 300 Mbps&#10;Smart TV 4K 65 inch&#10;Free Flow Coffee & Tea&#10;Acoustic Soundproofing" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none">{{ old('amenities_input') }}</textarea>
                    
                    <!-- Quick Preset Badges -->
                    <div class="mt-2.5 flex items-center gap-1.5 flex-wrap">
                        <span class="text-[11px] text-slate-400 font-semibold mr-1">Klik untuk tambah cepat:</span>
                        <button type="button" onclick="addAmenity('WiFi 300 Mbps Dedicated')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#edf4fc] hover:text-[#0353a4] text-slate-700 text-[11px] font-medium transition">+ WiFi 300 Mbps</button>
                        <button type="button" onclick="addAmenity('Free Flow Artisanal Coffee & Tea')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#edf4fc] hover:text-[#0353a4] text-slate-700 text-[11px] font-medium transition">+ Free Coffee & Tea</button>
                        <button type="button" onclick="addAmenity('4K UHD Smart TV Presentation Screen')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#edf4fc] hover:text-[#0353a4] text-slate-700 text-[11px] font-medium transition">+ Smart TV 4K</button>
                        <button type="button" onclick="addAmenity('Ergonomic Herman Miller Style Chair')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#edf4fc] hover:text-[#0353a4] text-slate-700 text-[11px] font-medium transition">+ Kursi Ergonomis</button>
                        <button type="button" onclick="addAmenity('Magnetic Whiteboard & Markers')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#edf4fc] hover:text-[#0353a4] text-slate-700 text-[11px] font-medium transition">+ Whiteboard</button>
                        <button type="button" onclick="addAmenity('Acoustic Soundproofing Wall')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#edf4fc] hover:text-[#0353a4] text-slate-700 text-[11px] font-medium transition">+ Kedap Suara</button>
                        <button type="button" onclick="addAmenity('Smart Digital RFID Lock')" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#edf4fc] hover:text-[#0353a4] text-slate-700 text-[11px] font-medium transition">+ Smart Lock</button>
                    </div>
                </div>

                <!-- Deskripsi Singkat -->
                <div>
                    <label for="short_description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Deskripsi Singkat (Ringkasan Cuplikan)
                    </label>
                    <input type="text" name="short_description" id="short_description" value="{{ old('short_description') }}" placeholder="Ruang kerja kolaboratif berdaya tampung fleksibel dengan suasana produktif." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none">
                </div>

                <!-- Deskripsi Lengkap -->
                <div>
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Deskripsi Lengkap
                    </label>
                    <textarea name="description" id="description" rows="5" placeholder="Jelaskan spesifikasi mendalam, peruntukan ruangan, atmosfer kerja, dan fasilitas pendukung lainnya..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-[#0353a4] text-sm outline-none">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Form Submit Bar -->
        <div class="flex items-center justify-end gap-4 pt-2">
            <a href="{{ route('admin.rooms.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-100 transition">
                Batal
            </a>
            <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#0353a4] text-white font-bold text-sm hover:bg-[#023e7d] active:scale-95 transition shadow-md shadow-[#0353a4]/30">
                Simpan Ruangan Baru
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function addAmenity(text) {
        const textarea = document.getElementById('amenities_input');
        if (!textarea) return;
        const current = textarea.value.trim();
        if (current.length === 0) {
            textarea.value = text;
        } else {
            textarea.value = current + '\n' + text;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const dropzoneEl = document.querySelector("#roomDropzone");
        if (!dropzoneEl) return;

        const DropzoneClass = window.Dropzone || Dropzone;
        if (!DropzoneClass) {
            console.error('Dropzone is not loaded.');
            return;
        }

        const roomDropzone = new DropzoneClass(dropzoneEl, {
            url: "{{ route('admin.rooms.upload_temp_media') }}",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            paramName: "file",
            maxFilesize: 50, // MB
            acceptedFiles: "image/*,video/*",
            addRemoveLinks: true,
            dictRemoveFile: "× Hapus",
            dictFileTooBig: "File terlalu besar (@{{filesize}}MB). Maksimal: @{{maxFilesize}}MB.",
            dictInvalidFileType: "Tipe file tidak didukung. Harap pilih gambar atau video.",
            
            init: function() {
                this.on("success", function(file, response) {
                    file.uploadData = response;
                    
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'uploaded_media[]';
                    input.value = JSON.stringify(response);
                    input.id = 'media_token_' + (file.upload ? file.upload.uuid : Math.random().toString(36).substring(7));
                    document.getElementById('roomForm').appendChild(input);

                    const badgeContainer = document.createElement('div');
                    badgeContainer.className = 'mt-1 text-center';
                    if (response.file_type === 'video') {
                        badgeContainer.innerHTML = '<span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold bg-rose-500 text-white uppercase tracking-wider">Video</span>';
                    } else {
                        badgeContainer.innerHTML = '<span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold bg-[#0353a4] text-white uppercase tracking-wider">Foto</span>';
                    }
                    if (file.previewElement) {
                        file.previewElement.appendChild(badgeContainer);
                    }
                });

                this.on("removedfile", function(file) {
                    if (file.upload && file.upload.uuid) {
                        const input = document.getElementById('media_token_' + file.upload.uuid);
                        if (input) input.remove();
                    }
                });

                this.on("error", function(file, errorMessage) {
                    console.error("Dropzone upload error:", errorMessage);
                });
            }
        });
    });
</script>
@endpush
