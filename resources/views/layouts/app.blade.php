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
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.png'))">
    <meta property="og:image:width" content="982">
    <meta property="og:image:height" content="972">
    <meta property="og:site_name" content="KonsulinSpace">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter / X Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'KonsulinSpace - Co-Working Space & Virtual Office BSD, Tangerang')">
    <meta name="twitter:description" content="@yield('meta_description', 'Penyedia co-working space, private office siap huni, dan alamat domisili virtual office resmi di Greenwich Business Park, BSD City, Tangerang.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.png'))">

    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#001845">

    <!-- Google Search Console Verification -->
    @if(config('services.google.site_verification'))
    <meta name="google-site-verification" content="{{ config('services.google.site_verification') }}">
    @endif

    <!-- Google Tag Manager -->
    @if(config('services.google.gtm_id'))
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ config('services.google.gtm_id') }}');</script>
    @endif
    <!-- End Google Tag Manager -->

    <!-- Google Analytics 4 (GA4 / gtag.js) -->
    @if(config('services.google.ga4_id'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.ga4_id') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ config('services.google.ga4_id') }}');
    </script>
    @endif

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

    <!-- Google Tag Manager (noscript) -->
    @if(config('services.google.gtm_id'))
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('services.google.gtm_id') }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif
    <!-- End Google Tag Manager (noscript) -->

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200 transition-all shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo-transparent.png') }}" alt="KonsulinSpace Logo" class="h-12 w-auto object-contain group-hover:opacity-90 transition">
                </a>

                <!-- Desktop Nav Items: Beranda, Virtual Office, Co-working Space, Kontak -->
                <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                    <a href="{{ route('home') }}" class="hover:text-[#0353a4] transition {{ request()->routeIs('home') && !request('category') ? 'text-[#0353a4] font-semibold' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('home') }}#virtual-office" class="hover:text-[#0353a4] transition">
                        Virtual Office
                    </a>
                    <a href="{{ route('rooms.catalog') }}?category=coworking" class="hover:text-[#0353a4] transition {{ request('category') === 'coworking' ? 'text-[#0353a4] font-semibold' : '' }}">
                        Co-working Space
                    </a>
                    <a href="{{ route('contact') }}" class="hover:text-[#0353a4] transition {{ request()->routeIs('contact') ? 'text-[#0353a4] font-semibold' : '' }}">
                        Kontak
                    </a>
                </nav>

                <!-- Action Button: Pesan Ruangan with Call Icon -->
                <div class="hidden md:flex items-center gap-4">
                    <a href="{{ route('contact') }}" data-track-cta="whatsapp" data-cta-label="header_pesan_ruangan" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-[#0353a4] hover:bg-[#023e7d] text-white font-semibold text-sm active:scale-95 transition shadow-xs">
                        <svg class="w-4 h-4 shrink-0 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>Pesan Ruangan</span>
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

            <!-- Mobile Dropdown: Beranda, Virtual Office, Co-working Space, Kontak -->
            <div id="mobileMenu" class="hidden md:hidden pb-6 pt-2 border-t border-slate-100 flex flex-col gap-3 text-sm font-medium text-slate-700">
                <a href="{{ route('home') }}" class="py-2 hover:text-[#0353a4]">Beranda</a>
                <a href="{{ route('home') }}#virtual-office" class="py-2 hover:text-[#0353a4]">Virtual Office</a>
                <a href="{{ route('rooms.catalog') }}?category=coworking" class="py-2 hover:text-[#0353a4]">Co-working Space</a>
                <a href="{{ route('contact') }}" class="py-2 hover:text-[#0353a4]">Kontak</a>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" data-track-cta="whatsapp" data-cta-label="mobile_pesan_ruangan" class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-[#0353a4] text-white font-semibold">
                        <svg class="w-4 h-4 shrink-0 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>Pesan Ruangan</span>
                    </a>
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
                            <span class="text-[#75afee]">WA:</span> <a href="https://wa.me/6281908797799" target="_blank" rel="noopener noreferrer" data-track-cta="whatsapp" data-cta-label="footer_whatsapp_admin_kspace" class="hover:text-white transition">Admin K-Space: +6281908797799</a>
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
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Action Container (Scroll to Top & WhatsApp) -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3 select-none">
        
        <!-- Scroll to Top Button (Diatas Button WhatsApp) -->
        <button type="button" id="scrollToTopBtn" aria-label="Scroll ke Atas" title="Kembali ke atas" class="opacity-0 pointer-events-none translate-y-3 transition-all duration-300 w-11 h-11 rounded-full bg-white text-slate-700 hover:text-[#0353a4] hover:bg-slate-50 border border-slate-200 shadow-md flex items-center justify-center active:scale-95 group focus:outline-none cursor-pointer">
            <svg class="w-5 h-5 transform group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/>
            </svg>
        </button>

        <!-- Floating WhatsApp CTA Button -->
        <a href="https://wa.me/6281908797799?text=Halo%20Admin%20K-Space,%20saya%20tertarik%20dengan%20layanan%20co-working%20/%20virtual%20office." target="_blank" rel="noopener noreferrer" data-track-cta="whatsapp" data-cta-label="floating_whatsapp_admin_kspace" class="flex items-center gap-2.5 bg-[#0353a4] hover:bg-[#023e7d] text-white px-4 py-3 rounded-full shadow-lg shadow-[#0353a4]/40 hover:scale-105 active:scale-95 transition">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
            <span class="text-sm font-semibold hidden sm:inline">WhatsApp Admin K-Space</span>
        </a>
    </div>

    <!-- Universal WhatsApp CTA & Analytics Tracking -->
    <script>
        window.dataLayer = window.dataLayer || [];
        window.trackWhatsAppClick = function(label, href) {
            const eventData = {
                'event': 'whatsapp_cta_click',
                'event_category': 'Conversion',
                'event_action': 'Click WhatsApp CTA',
                'event_label': label || 'WhatsApp CTA',
                'target_url': href || '',
                'page_location': window.location.href,
                'page_path': window.location.pathname
            };
            window.dataLayer.push(eventData);
            if (typeof window.gtag === 'function') {
                window.gtag('event', 'whatsapp_click', {
                    'event_category': 'Engagement',
                    'event_label': label,
                    'value': 1
                });
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(e) {
                const cta = e.target.closest('a[href*="wa.me"], [data-track-cta="whatsapp"]');
                if (cta) {
                    const label = cta.getAttribute('data-cta-label') || cta.innerText.trim() || 'WhatsApp CTA';
                    const href = cta.getAttribute('href') || '';
                    window.trackWhatsAppClick(label, href);
                }
            });
        });
    </script>

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
