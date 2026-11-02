<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use App\Models\Room;
use App\Models\RoomMedia;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Default Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@konsulinspace.com'],
            [
                'name' => 'Administrator KonsulinSpace',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '0812-9876-5432',
            ]
        );

        // 2. Create Sample Rooms
        $roomsData = [
            [
                'name' => 'Flexi Hot Desk - Open Space',
                'category' => 'coworking',
                'capacity' => '1 Orang / Seat',
                'area_sqm' => '120 m² (Shared Area)',
                'price_hourly' => 50000,
                'price_daily' => 150000,
                'price_monthly' => 1750000,
                'location_floor' => 'Lantai 2 - Main Lounge',
                'short_description' => 'Akses fleksibel ke area open co-working dengan fasilitas lengkap, koneksi super cepat, dan free coffee.',
                'description' => 'Flexi Hot Desk di KonsulinSpace dirancang khusus bagi freelancer, digital nomad, dan profesional modern yang membutuhkan tempat kerja produktif dan fleksibel. Pilih meja mana saja di open space, nikmati koneksi WiFi gigabit, akses pantry, dan suasana kolaboratif yang inspiratif.',
                'amenities' => [
                    'WiFi High-Speed 300 Mbps',
                    'Free Flow Artisanal Coffee & Tea',
                    'Ergonomic Mesh Chair & Power Outlet',
                    'Akses Ruang Komunal & Lounge',
                    'Layanan Cetak / Print 20 lbr/hari',
                    'Biometric 24/7 Access (Bulanan)',
                ],
                'is_featured' => true,
                'status' => 'available',
                'order_position' => 1,
                'media' => [
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'coworking-hotdesk-1.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 450000,
                        'is_primary' => true,
                    ],
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'coworking-hotdesk-2.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 420000,
                        'is_primary' => false,
                    ],
                ],
            ],
            [
                'name' => 'Dedicated Desk - Creative Hive',
                'category' => 'coworking',
                'capacity' => '1 Orang (Meja Tetap Pribadi)',
                'area_sqm' => 'Area Semi-Private',
                'price_hourly' => null,
                'price_daily' => 200000,
                'price_monthly' => 2200000,
                'location_floor' => 'Lantai 2 - East Wing',
                'short_description' => 'Meja kerja tetap milik Anda sendiri dengan loker pribadi, monitor stand, dan privasi optimal.',
                'description' => 'Dedicated Desk memberikan kepastian meja tetap setiap hari tanpa perlu berebut tempat. Dilengkapi loker pribadi dengan kunci gembok digital, colokan eksklusif, ergonomic chair tier premium, dan kuota gratis ruang rapat 5 jam setiap bulan.',
                'amenities' => [
                    'Personal Dedicated Desk & Lockable Cabinet',
                    'Ergonomic Herman Miller Style Chair',
                    'WiFi Dedicated LAN Port & 300 Mbps',
                    'Free Flow Coffee, Tea & Mineral Water',
                    'Free Kuota Meeting Room 5 Jam/Bulan',
                    'Mail & Package Handling Support',
                ],
                'is_featured' => true,
                'status' => 'available',
                'order_position' => 2,
                'media' => [
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'dedicated-desk-1.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 480000,
                        'is_primary' => true,
                    ],
                ],
            ],
            [
                'name' => 'Executive Boardroom Alpha',
                'category' => 'meeting_room',
                'capacity' => '14 - 18 Orang',
                'area_sqm' => '42 m²',
                'price_hourly' => 350000,
                'price_daily' => 2500000,
                'price_monthly' => null,
                'location_floor' => 'Lantai 3 - Conference Hub',
                'short_description' => 'Ruang rapat mewah kedap suara dengan Smart TV 75 inch, video conference 4K, dan audio conference Polycom.',
                'description' => 'Ruang rapat prestisius dengan nuansa modern kontemporer yang cocok untuk pertemuan eksekutif, rapat pemegang saham, pitching investor, dan presentasi strategis. Dikelilingi dinding acoustic soundproof dengan pencahayaan ambient yang dapat disesuaikan.',
                'amenities' => [
                    '4K UHD Smart TV 75" with Wireless Casting',
                    'Logitech Rally Plus 4K Video Conference Bar',
                    'Glass Magnetic Whiteboard & Markers',
                    'Acoustic Soundproofing Wall (38 dB)',
                    'HDMI / Type-C Multi-dock Hub',
                    'Butler Service & Welcome Drink Presentation',
                ],
                'is_featured' => true,
                'status' => 'available',
                'order_position' => 3,
                'media' => [
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'boardroom-alpha-1.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 520000,
                        'is_primary' => true,
                    ],
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'boardroom-alpha-2.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 490000,
                        'is_primary' => false,
                    ],
                ],
            ],
            [
                'name' => 'Focus Meeting Pod Emerald',
                'category' => 'meeting_room',
                'capacity' => '4 - 6 Orang',
                'area_sqm' => '18 m²',
                'price_hourly' => 150000,
                'price_daily' => 1000000,
                'price_monthly' => null,
                'location_floor' => 'Lantai 2 - West Wing',
                'short_description' => 'Ruang diskusi intimate dan agile untuk sesi sprint, one-on-one, atau interview klien penting.',
                'description' => 'Ideal untuk tim kecil yang membutuhkan ruang fokus tanpa distraksi. Dilengkapi display 55 inch untuk presentasi cepat, whiteboard magnetic, dan pendingin ruangan independen.',
                'amenities' => [
                    '55" Ultra HD Presentation Screen',
                    'Jabra Speak Wireless Audio System',
                    'Magnetic Whiteboard & Note Pads',
                    'High-speed WiFi Dedicated SSID',
                    'Air Purifier HEPA Filter inside Room',
                ],
                'is_featured' => false,
                'status' => 'available',
                'order_position' => 4,
                'media' => [
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'meeting-pod-1.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 410000,
                        'is_primary' => true,
                    ],
                ],
            ],
            [
                'name' => 'Private Office Suite - Platinum Suite 302',
                'category' => 'private_office',
                'capacity' => '6 - 8 Orang',
                'area_sqm' => '28 m²',
                'price_hourly' => null,
                'price_daily' => null,
                'price_monthly' => 12500000,
                'location_floor' => 'Lantai 3 - Private Suites Corner',
                'short_description' => 'Kantor privat siap pakai lengkap dengan perabot mewah, akses smart lock mandiri, dan view kota.',
                'description' => 'Private Office Suite menghadirkan kebebasan penuh kantor korporat tanpa kerumitan sewa jangka panjang tradisional. Ruangan sudah full furnished dengan meja manajer dan staff, koneksi internet khusus berkecepatan tinggi, serta akses 24/7 dengan smart lock NFC.',
                'amenities' => [
                    'Fully Furnished (Meja, Kursi Ergonomis, Filing Cabinet)',
                    'Smart Digital Lock Access with RFID Keycard',
                    'Dedicated High-speed Internet & Static IP (Opsional)',
                    'Gratis 10 Jam Kuota Meeting Room / Bulan',
                    'Layanan Resepsionis & Surat-Menyurat Profesional',
                    'Cleaning Service Harian & Pemeliharaan AC Rutin',
                    'Akses Bebas Semua Fasilitas Lounge & Pantry',
                ],
                'is_featured' => true,
                'status' => 'available',
                'order_position' => 5,
                'media' => [
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'private-suite-1.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 510000,
                        'is_primary' => true,
                    ],
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'private-suite-2.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 480000,
                        'is_primary' => false,
                    ],
                ],
            ],
            [
                'name' => 'Virtual Office - Prestige Corporate Plan',
                'category' => 'virtual_office',
                'capacity' => 'Legalitas & Domisili Resmi Perusahaan',
                'area_sqm' => 'Layanan Virtual',
                'price_hourly' => null,
                'price_daily' => null,
                'price_monthly' => 650000,
                'location_floor' => 'Tower BSD Green Office Park',
                'short_description' => 'Alamat bisnis untuk PKP, izin domisili resmi, penerimaan surat, dan kuota ruang rapat.',
                'description' => 'Solusi legalitas terbaik untuk startup, konsultan, dan PT/CV yang membutuhkan alamat zonasi perkantoran komersial resmi di BSD, Tangerang. Termasuk nomor telepon khusus dengan sambungan profesional, notifikasi surat instan via WhatsApp, dan fasilitas ruang rapat.',
                'amenities' => [
                    'Alamat Bisnis Prestisius di Gedung Grade-A Komersial',
                    'Surat Keterangan Domisili Gedung (Bisa untuk PT / CV / PKP)',
                    'Layanan Penerimaan Surat & Paket dengan Notifikasi Real-time',
                    'Dedicated Local Telephone Number & Call Forwarding',
                    'Gratis 8 Jam Penggunaan Ruang Rapat per Bulan',
                    'Resepsionis Profesional Menyambut Tamu Perusahaan',
                    'Diskon Khusus 25% Sewa Coworking & Event Space',
                ],
                'is_featured' => true,
                'status' => 'available',
                'order_position' => 6,
                'media' => [
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'virtual-office-1.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 460000,
                        'is_primary' => true,
                    ],
                ],
            ],
            [
                'name' => 'Grand Auditorium & Event Hall',
                'category' => 'event_space',
                'capacity' => '60 - 100 Orang',
                'area_sqm' => '150 m²',
                'price_hourly' => 1250000,
                'price_daily' => 8000000,
                'price_monthly' => null,
                'location_floor' => 'Lantai 4 - Event & Workshop Hall',
                'short_description' => 'Ruang serbaguna modular untuk seminar, workshop teknologi, konferensi pers, dan networking night.',
                'description' => 'Event hall dengan layout fleksibel (theater, classroom, banquet, or U-shape). Dilengkapi sound system profesional line-array, wireless mics, dual laser projector, lighting panggung, dan area registrasi tamu yang luas.',
                'amenities' => [
                    'Dual Laser Projector 6500 Lumens + Motorized Screen',
                    'Professional Sound System & 4 Wireless Handheld Mics',
                    'Stage Podium & Modular Stage Platform',
                    'High-speed WiFi Multi-AP up to 150 Devices concurrent',
                    'Live Streaming Setup & Fiber Connection Ready',
                    'Dedicated Event Coordinator & Sound Engineer on Duty',
                ],
                'is_featured' => true,
                'status' => 'available',
                'order_position' => 7,
                'media' => [
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'event-hall-1.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 550000,
                        'is_primary' => true,
                    ],
                ],
            ],
            [
                'name' => 'Podcast & Recording Studio Pro',
                'category' => 'meeting_room',
                'capacity' => '4 Orang',
                'area_sqm' => '16 m²',
                'price_hourly' => 250000,
                'price_daily' => 1750000,
                'price_monthly' => null,
                'location_floor' => 'Lantai 2 - Creator Wing',
                'short_description' => 'Studio podcast kedap suara akustik dengan mikrofon Shure SM7B, mixer Rodecaster Pro II, dan studio lighting.',
                'description' => 'Studio rekaman modern siap pakai untuk pembuatan konten podcast, voice over, webinar, dan video shooting. Ruangan dilapisi foam akustik premium dengan kamera 4K dan ring light RGB.',
                'amenities' => [
                    '4x Shure SM7B Microphones + Cloudlifter',
                    'Rodecaster Pro II Audio Production Console',
                    '2x Sony 4K Cameras with HDMI Capture Card',
                    'Aputure Keylight & RGB Ambient Lighting',
                    'Soundproofed Acoustic Treatment Room',
                    'Headphones Monitoring Audio-Technica ATH-M50x',
                ],
                'is_featured' => false,
                'status' => 'available',
                'order_position' => 8,
                'media' => [
                    [
                        'file_path' => 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?auto=format&fit=crop&w=1200&q=80',
                        'file_name' => 'podcast-studio-1.jpg',
                        'file_type' => 'image',
                        'mime_type' => 'image/jpeg',
                        'file_size' => 430000,
                        'is_primary' => true,
                    ],
                ],
            ],
        ];

        foreach ($roomsData as $data) {
            $mediaList = $data['media'] ?? [];
            unset($data['media']);

            $data['slug'] = Str::slug($data['name']);
            $room = Room::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );

            // Re-seed media
            $room->media()->delete();
            foreach ($mediaList as $index => $media) {
                $room->media()->create([
                    'file_path' => $media['file_path'],
                    'file_name' => $media['file_name'],
                    'file_type' => $media['file_type'],
                    'mime_type' => $media['mime_type'],
                    'file_size' => $media['file_size'],
                    'is_primary' => $media['is_primary'] ?? ($index === 0),
                    'order_position' => $index,
                ]);
            }
        }

        // 3. Create Sample Inquiries
        $firstRoom = Room::where('category', 'coworking')->first();
        $meetingRoom = Room::where('category', 'meeting_room')->first();
        $virtualOffice = Room::where('category', 'virtual_office')->first();

        $sampleInquiries = [
            [
                'room_id' => $firstRoom?->id,
                'service_type' => 'coworking',
                'name' => 'Rian Pratama',
                'email' => 'rian.pratama@techinnovasi.id',
                'phone' => '0813-1122-3344',
                'company_name' => 'PT Tech Inovasi Nusantara',
                'start_date' => now()->addDays(2)->format('Y-m-d'),
                'duration' => '3 Bulan',
                'notes' => 'Halo tim KonsulinSpace, kami membutuhkan 4 dedicated desk untuk tim developer kami mulai awal bulan depan.',
                'status' => 'new',
            ],
            [
                'room_id' => $meetingRoom?->id,
                'service_type' => 'meeting_room',
                'name' => 'Dian Sastrawan',
                'email' => 'dian@kreasiaruna.com',
                'phone' => '0812-5566-7788',
                'company_name' => 'Aruna Creative Agency',
                'start_date' => now()->addDays(5)->format('Y-m-d'),
                'duration' => '1 Hari Penuh (8 Jam)',
                'notes' => 'Ingin sewa Boardroom Alpha untuk presentasi pitch deck investor. Butuh catering kopi dan snack.',
                'status' => 'contacted',
            ],
            [
                'room_id' => $virtualOffice?->id,
                'service_type' => 'virtual_office',
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@nusantaracipta.co.id',
                'phone' => '0818-7788-9900',
                'company_name' => 'PT Nusantara Cipta Makmur',
                'start_date' => now()->addDays(7)->format('Y-m-d'),
                'duration' => '1 Tahun',
                'notes' => 'Mau konsultasi paket Virtual Office untuk pendirian PT baru sekaligus pengurusan PKP.',
                'status' => 'dealing',
            ],
        ];

        foreach ($sampleInquiries as $inq) {
            Inquiry::create($inq);
        }
    }
}
