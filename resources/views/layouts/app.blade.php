<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KonsulinSpace - Co-Working Space & Virtual Office BSD, Tangerang')</title>
    <meta name="description" content="@yield('meta_description', 'KonsulinSpace menyediakan ruang kerja fleksibel, private office, meeting room 4K, dan virtual office legalitas resmi di Greenwich Business Park, BSD City, Tangerang.')">
    <meta name="keywords" content="@yield('meta_keywords', 'co-working space BSD, virtual office BSD, sewa kantor Tangerang, private office BSD City, meeting room BSD, alamat domisili PT Tangerang, izin PKP BSD, Greenwich Business Park, KonsulinSpace')">
    <meta name="author" content="KonsulinSpace">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook / LinkedIn / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'KonsulinSpace - Co-Working Space & Virtual Office BSD, Tangerang')">
    <meta property="og:description" content="@yield('meta_description', 'Penyedia co-working space, private office siap huni, dan alamat domisili virtual office resmi di Greenwich Business Park, BSD City, Tangerang.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="KonsulinSpace">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter / X Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'KonsulinSpace - Co-Working Space & Virtual Office BSD, Tangerang')">
    <meta name="twitter:description" content="@yield('meta_description', 'Penyedia co-working space, private office siap huni, dan alamat domisili virtual office resmi di Greenwich Business Park, BSD City, Tangerang.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">

    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#001845">

    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200 transition-all shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo-transparent.png') }}" alt="KonsulinSpace Logo" class="h-12 w-auto object-contain group-hover:opacity-90 transition">
                </a>

                <!-- Desktop Nav Items -->
                <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-slate-600">
                    <a href="{{ route('home') }}#ruangan" class="hover:text-[#0353a4] transition">Ruangan</a>
                    <a href="{{ route('home') }}#layanan" class="hover:text-[#0353a4] transition">Layanan</a>
                    <a href="{{ route('home') }}#virtual-office" class="hover:text-[#0353a4] transition">Virtual Office</a>
                    <a href="{{ route('home') }}#fasilitas" class="hover:text-[#0353a4] transition">Fasilitas</a>
                    <a href="{{ route('home') }}#faq" class="hover:text-[#0353a4] transition">FAQ</a>
                    <a href="{{ route('contact') }}" class="hover:text-[#0353a4] transition {{ request()->routeIs('contact') ? 'text-[#0353a4] font-semibold' : '' }}">Kontak</a>
                </nav>

                <!-- Action Button -->
                <div class="hidden md:flex items-center gap-4">
                    <a href="{{ route('admin.login') }}" class="text-xs font-semibold text-slate-500 hover:text-[#0353a4] transition">
                        Portal Admin
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-[#0353a4] text-white font-semibold text-sm hover:bg-[#023e7d] active:scale-95 transition shadow-xs">
                        Pesan Ruangan
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobileMenuBtn" type="button" class="p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none">
                        <svg id="hamburgerIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Dropdown -->
            <div id="mobileMenu" class="hidden md:hidden pb-6 pt-2 border-t border-slate-100 flex flex-col gap-3 text-sm font-medium text-slate-700">
                <a href="{{ route('home') }}#ruangan" class="py-2 hover:text-[#0353a4]">Ruangan</a>
                <a href="{{ route('home') }}#layanan" class="py-2 hover:text-[#0353a4]">Layanan</a>
                <a href="{{ route('home') }}#virtual-office" class="py-2 hover:text-[#0353a4]">Virtual Office</a>
                <a href="{{ route('home') }}#fasilitas" class="py-2 hover:text-[#0353a4]">Fasilitas</a>
                <a href="{{ route('home') }}#faq" class="py-2 hover:text-[#0353a4]">FAQ</a>
                <a href="{{ route('contact') }}" class="py-2 hover:text-[#0353a4]">Kontak & Reservasi</a>
                <div class="pt-2 flex flex-col gap-2">
                    <a href="{{ route('contact') }}" class="w-full text-center py-2.5 px-4 rounded-xl bg-[#0353a4] text-white font-semibold">Pesan Ruangan</a>
                    <a href="{{ route('admin.login') }}" class="w-full text-center py-2.5 px-4 rounded-xl border border-slate-300 text-slate-700 font-semibold">Portal Admin</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Global Alert / Flash Messages -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-[#edf4fc] border border-[#b0d0f4] text-[#023e7d] px-5 py-4 rounded-xl shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-[#d6e6f9] flex items-center justify-center text-[#0353a4] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <div>
                    <p class="font-semibold text-[#002855]">{{ session('success') }}</p>
                    <p class="text-xs text-[#023e7d]">Reservasi Anda telah tersimpan ke sistem kami.</p>
                </div>
            </div>
            @if(session('wa_url'))
            <a href="{{ session('wa_url') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-xs transition shrink-0">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                Chat WhatsApp Sekarang
            </a>
            @endif
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#001845] text-slate-400 pt-16 pb-12 border-t border-[#002855]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">
                <!-- Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo-white.png') }}" alt="KonsulinSpace Logo" class="h-12 w-auto object-contain">
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                        Penyedia co-working space, private office, meeting room, dan legalitas alamat virtual office di BSD, Tangerang.
                    </p>
                    <div class="pt-2 flex items-center gap-2.5 text-slate-400">
                        <span class="w-2 h-2 rounded-full bg-[#0466c8]"></span>
                        <span class="text-xs text-slate-300">Jam Operasional: 08:00 - 20:00 WIB</span>
                    </div>
                </div>

                <!-- Nav Column 1 -->
                <div>
                    <h4 class="text-white text-sm font-semibold tracking-wider uppercase mb-4">Layanan Ruangan</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}?category=coworking#ruangan" class="hover:text-[#75afee] transition">Hot Desk Co-Working</a></li>
                        <li><a href="{{ route('home') }}?category=coworking#ruangan" class="hover:text-[#75afee] transition">Dedicated Desk</a></li>
                        <li><a href="{{ route('home') }}?category=private_office#ruangan" class="hover:text-[#75afee] transition">Private Office Suite</a></li>
                        <li><a href="{{ route('home') }}?category=meeting_room#ruangan" class="hover:text-[#75afee] transition">Meeting Room & Pod</a></li>
                        <li><a href="{{ route('home') }}?category=event_space#ruangan" class="hover:text-[#75afee] transition">Event Space & Hall</a></li>
                    </ul>
                </div>

                <!-- Nav Column 2 -->
                <div>
                    <h4 class="text-white text-sm font-semibold tracking-wider uppercase mb-4">Virtual Office</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}#virtual-office" class="hover:text-[#75afee] transition">Alamat Domisili PT & CV</a></li>
                        <li><a href="{{ route('home') }}#virtual-office" class="hover:text-[#75afee] transition">Pengurusan Zonasi PKP</a></li>
                        <li><a href="{{ route('home') }}#virtual-office" class="hover:text-[#75afee] transition">Layanan Penanganan Surat</a></li>
                        <li><a href="{{ route('home') }}#virtual-office" class="hover:text-[#75afee] transition">Nomor Telepon Khusus & Kuota</a></li>
                    </ul>
                </div>

                <!-- Contact & Office -->
                <div>
                    <h4 class="text-white text-sm font-semibold tracking-wider uppercase mb-4">Hubungi Kami</h4>
                    <p class="text-sm text-slate-300 mb-2"><strong>KonsulinSpace Hub:</strong></p>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Greenwich Business Park, Blok B1<br>
                        Kec. Pagedangan, Kabupaten Tangerang, Banten 15331
                    </p>
                    <div class="space-y-1.5 text-xs">
                        <p class="flex items-center gap-2 text-slate-300">
                            <span class="text-[#75afee]">WA:</span> <a href="https://wa.me/6281908797799" target="_blank" rel="noopener noreferrer" class="hover:text-white transition">Admin K-Space: +6281908797799</a>
                        </p>
                        <p class="flex items-center gap-2 text-slate-300">
                            <span class="text-[#75afee]">Email:</span> hello@konsulinspace.com
                        </p>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-[#002855] text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p>&copy; {{ date('Y') }} KonsulinSpace. Hak Cipta Dilindungi Undang-Undang.</p>
                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}#faq" class="hover:text-slate-400 transition">FAQ</a>
                    <a href="{{ route('contact') }}" class="hover:text-slate-400 transition">Kontak & Reservasi</a>
                    <a href="{{ route('admin.login') }}" class="text-slate-400 hover:text-[#75afee] transition font-medium">Portal Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp CTA Button -->
    <a href="https://wa.me/6281908797799?text=Halo%20Admin%20K-Space,%20saya%20tertarik%20dengan%20layanan%20co-working%20/%20virtual%20office." target="_blank" rel="noopener noreferrer" class="fixed bottom-6 right-6 z-50 flex items-center gap-2.5 bg-[#0353a4] hover:bg-[#023e7d] text-white px-4 py-3 rounded-full shadow-lg shadow-[#0353a4]/40 hover:scale-105 active:scale-95 transition">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        <span class="text-sm font-semibold hidden sm:inline">WhatsApp Admin K-Space</span>
    </a>

    <!-- Mobile menu toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('mobileMenuBtn');
            const menu = document.getElementById('mobileMenu');
            const hamburger = document.getElementById('hamburgerIcon');
            const close = document.getElementById('closeIcon');

            if (btn && menu) {
                btn.addEventListener('click', function() {
                    const isExpanded = !menu.classList.contains('hidden');
                    if (isExpanded) {
                        menu.classList.add('hidden');
                        hamburger.classList.remove('hidden');
                        close.classList.add('hidden');
                    } else {
                        menu.classList.remove('hidden');
                        hamburger.classList.add('hidden');
                        close.classList.remove('hidden');
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
