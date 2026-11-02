@extends('layouts.app')

@section('title', 'Kontak & Reservasi Ruangan - KonsulinSpace')
@section('meta_description', 'Hubungi tim KonsulinSpace untuk konsultasi sewa co-working space, meeting room, private office, dan pendaftaran alamat virtual office di BSD, Tangerang.')

@section('content')

<!-- Breadcrumb -->
<div class="bg-white border-b border-slate-200/80 py-3 text-xs text-slate-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-[#0353a4] transition">Beranda</a>
        <span>/</span>
        <span class="text-slate-800 font-semibold">Kontak & Reservasi</span>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
    <div class="mb-10 text-center max-w-2xl mx-auto">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Kontak & Reservasi Ruangan</h1>
        <p class="text-xs sm:text-sm text-slate-500 mt-2">
            Isi formulir reservasi di bawah ini atau hubungi tim representatif kami secara langsung melalui WhatsApp dan telepon.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

        <!-- Left 7 Columns: Reservation Form Card -->
        <div class="lg:col-span-7">
            <div class="bg-[#001845] rounded-3xl p-6 sm:p-10 text-white border border-[#023e7d] shadow-xl">
                <div class="mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold tracking-tight">Formulir Reservasi</h2>
                    <p class="text-xs text-slate-300 mt-1">Kami akan mengonfirmasi ketersediaan dan detail harga dalam waktu 15 menit.</p>
                </div>

                <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <x-input name="name" id="contact_name" label="Nama Lengkap" theme="dark" required placeholder="Nama Anda" />
                        <x-input type="email" name="email" id="contact_email" label="Email" theme="dark" required placeholder="email@perusahaan.com" />
                        <x-input type="tel" name="phone" id="contact_phone" label="No. WhatsApp" theme="dark" required placeholder="0812-xxxx-xxxx" />
                        <x-input name="company_name" id="contact_company" label="Perusahaan (Opsional)" theme="dark" placeholder="Nama PT / CV" />

                        <x-select name="room_id" id="contact_room" label="Ruangan Tertentu" theme="dark" placeholder="-- Pilih Ruangan (Opsional) --">
                            @foreach($rooms as $r)
                            <option value="{{ $r->id }}" {{ old('room_id') == $r->id ? 'selected' : '' }}>
                                {{ $r->name }} ({{ $r->category_label }})
                            </option>
                            @endforeach
                        </x-select>

                        <x-select name="service_type" id="contact_service" label="Layanan" theme="dark">
                            <option value="coworking" {{ old('service_type') == 'coworking' ? 'selected' : '' }}>Co-Working Space</option>
                            <option value="virtual_office" {{ old('service_type') == 'virtual_office' ? 'selected' : '' }}>Virtual Office</option>
                            <option value="meeting_room" {{ old('service_type') == 'meeting_room' ? 'selected' : '' }}>Meeting Room</option>
                            <option value="private_office" {{ old('service_type') == 'private_office' ? 'selected' : '' }}>Private Office</option>
                            <option value="event_space" {{ old('service_type') == 'event_space' ? 'selected' : '' }}>Event Hall</option>
                        </x-select>

                        <x-input type="date" name="start_date" id="contact_start_date" label="Tanggal Mulai" theme="dark" white-date-icon="true" />
                        <x-input name="duration" id="contact_duration" label="Perkiraan Durasi" theme="dark" placeholder="Contoh: 1 Hari, 1 Bulan, 1 Tahun" />
                    </div>

                    <x-textarea name="notes" id="contact_notes" label="Catatan Tambahan" theme="dark" :rows="3" placeholder="Kebutuhan khusus seperti jumlah kursi, screen proyektor, atau konsultasi legalitas domisili..." />

                    <div class="pt-3">
                        <x-button type="submit" variant="secondary" size="lg" class="w-full sm:w-auto">
                            Kirim Permintaan Reservasi
                        </x-button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right 5 Columns: Direct Contact & Office Info -->
        <div class="lg:col-span-5 space-y-6">

            <!-- WhatsApp & Phone Box -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs space-y-5">
                <h3 class="text-base font-bold text-slate-900">Hubungi Langsung</h3>
                
                <div class="space-y-4 text-xs">
                    <a href="https://wa.me/6281298765432?text=Halo%20KonsulinSpace,%20saya%20ingin%20konsultasi%20mengenai%20sewa%20ruangan%20atau%20virtual%20office." target="_blank" rel="noopener noreferrer" class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-[#edf4fc] border border-[#b0d0f4] hover:bg-[#d6e6f9] transition group">
                        <div class="w-10 h-10 rounded-xl bg-[#0353a4] text-white flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </div>
                        <div>
                            <span class="font-bold text-slate-900 block group-hover:text-[#0353a4]">WhatsApp Fast Response</span>
                            <span class="text-slate-500">0812-9876-5432</span>
                        </div>
                    </a>

                    <a href="mailto:hello@konsulinspace.com" class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-slate-300 transition group">
                        <div class="w-10 h-10 rounded-xl bg-slate-200 text-slate-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="font-bold text-slate-900 block group-hover:text-[#0353a4]">Email Inquiries</span>
                            <span class="text-slate-500">hello@konsulinspace.com</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Office Location & Building Map -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-xs space-y-4">
                <h3 class="text-base font-bold text-slate-900">Lokasi Gedung & Operasional</h3>

                <div class="text-xs text-slate-600 space-y-2.5">
                    <div>
                        <p class="font-bold text-slate-800">Gedung Konsulin BSD Green Office</p>
                        <p class="text-slate-500 mt-0.5 leading-relaxed">
                            Lantai 2 - 5, BSD Green Office Park, Jl. BSD Grand Boulevard, BSD City, Tangerang 15345
                        </p>
                    </div>

                    <div class="pt-2 border-t border-slate-100">
                        <p class="font-bold text-slate-800">Jam Layanan Front Desk:</p>
                        <p class="text-slate-500 mt-0.5">Senin - Jumat: 08:00 - 20:00 WIB</p>
                        <p class="text-slate-400 mt-0.5">(Member Dedicated & Private Office memiliki akses kartu 24/7)</p>
                    </div>
                </div>

                <div class="rounded-2xl overflow-hidden border border-slate-200 aspect-[16/9] bg-slate-100 relative group">
                    <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=1000&q=80" alt="KonsulinSpace BSD Hub" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-300">
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
