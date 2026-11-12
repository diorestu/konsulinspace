<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\Inquiry;
use App\Models\Room;
use App\Models\VirtualOfficePackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Pilihan Ruangan: hanya tampil 4 terpopuler saja pada landing page
        $popularRooms = Room::with('media')
            ->where('status', 'available')
            ->orderBy('is_featured', 'desc')
            ->orderBy('order_position', 'asc')
            ->take(4)
            ->get();

        $rooms = $popularRooms;

        $featuredRooms = Room::with('media')
            ->where('is_featured', true)
            ->where('status', 'available')
            ->take(4)
            ->get();

        $stats = [
            'locations' => '3 Lokasi Strategis',
            'rooms_count' => Room::count(),
            'active_members' => '1.500+ Member',
            'uptime' => '99.9% Internet Uptime',
        ];

        $virtualOfficePackages = VirtualOfficePackage::active()->get();
        $heroSlides = HeroSlide::active()->get();

        return view('home', compact('popularRooms', 'rooms', 'featuredRooms', 'stats', 'virtualOfficePackages', 'heroSlides'));
    }

    public function roomsCatalog(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');

        $allowedCategories = ['private_office', 'meeting_room'];

        $query = Room::with('media')
            ->where('status', 'available')
            ->orderBy('is_featured', 'desc')
            ->orderBy('order_position', 'asc');

        if ($selectedCategory === 'virtual_office') {
            // Virtual Office packages will be rendered from $virtualOfficePackages
            $rooms = Room::whereRaw('1 = 0')->paginate(12)->withQueryString();
        } elseif ($selectedCategory === 'private_office' || $selectedCategory === 'meeting_room') {
            $query->where('category', $selectedCategory);
            if ($request->filled('search')) {
                $search = $request->query('search');
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('short_description', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            $rooms = $query->paginate(12)->withQueryString();
        } else {
            // 'all': only private_office and meeting_room
            $query->whereIn('category', $allowedCategories);
            if ($request->filled('search')) {
                $search = $request->query('search');
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('short_description', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            $rooms = $query->paginate(12)->withQueryString();
        }

        $virtualOfficePackages = VirtualOfficePackage::active()->get();

        return view('rooms.index', compact('rooms', 'selectedCategory', 'virtualOfficePackages'));
    }

    public function roomDetail(string $slug)
    {
        $room = Room::with('media')->where('slug', $slug)->firstOrFail();
        
        $relatedRooms = Room::with('media')
            ->where('id', '!=', $room->id)
            ->where('status', 'available')
            ->take(3)
            ->get();

        return view('rooms.show', compact('room', 'relatedRooms'));
    }

    public function contact()
    {
        $rooms = Room::where('status', 'available')
            ->orderBy('order_position', 'asc')
            ->get();

        return view('contact', compact('rooms'));
    }

    public function storeInquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:30',
            'company_name' => 'nullable|string|max:150',
            'service_type' => 'nullable|string|max:50',
            'room_id' => 'nullable|exists:rooms,id',
            'start_date' => 'nullable|date',
            'duration' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:1000',
        ]);

        $inquiry = Inquiry::create($validated);

        // Prepare WhatsApp link if user wants to follow up directly
        $phoneTarget = '6281908797799';
        $serviceText = $inquiry->room ? $inquiry->room->name : ($inquiry->service_type ?? 'Layanan Umum');
        $waMessage = rawurlencode(
            "Halo Tim KonsulinSpace, saya telah mengisi formulir reservasi di website.\n\n" .
            "Nama: {$inquiry->name}\n" .
            "Email: {$inquiry->email}\n" .
            "No. HP: {$inquiry->phone}\n" .
            "Layanan/Ruangan: {$serviceText}\n" .
            "Catatan: " . ($inquiry->notes ?: '-') . "\n\n" .
            "Mohon konfirmasi dan info ketersediaan. Terima kasih!"
        );
        $waUrl = "https://wa.me/{$phoneTarget}?text={$waMessage}";

        return back()
            ->with('success', 'Terima kasih! Permintaan reservasi Anda telah kami terima. Tim KonsulinSpace akan segera menghubungi Anda.')
            ->with('wa_url', $waUrl);
    }
}
