<?php

namespace Tests\Feature;

use App\Models\HeroSlide;
use App\Models\Inquiry;
use App\Models\Room;
use App\Models\RoomMedia;
use App\Models\User;
use App\Models\VirtualOfficePackage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KonsulinSpaceTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin Konsulin',
            'email' => 'admin@konsulinspace.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }

    public function test_home_page_loads_successfully()
    {
        $room = Room::create([
            'name' => 'Hot Desk Test',
            'category' => 'coworking',
            'capacity' => '1 Orang',
            'price_hourly' => 50000,
            'status' => 'available',
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('KonsulinSpace');
        $response->assertSee('Hot Desk Test');
        // Product card has 4-column layout, shadow hover, rating star, and detail CTA
        $response->assertSee('lg:grid-cols-4');
        $response->assertSee('hover:shadow-lg');
        $response->assertSee('4.9');
        $response->assertSee('Detail');
        // FAQ accordion
        $response->assertSee('faqAccordion');
        $response->assertSee('<details', false);
        // Landing page location copywriting BSD, Tangerang
        $response->assertSee('BSD, Tangerang');
        $response->assertDontSee('Sudirman');
        $response->assertDontSee('Jakarta');
        // Hero 21:9 carousel and logo
        $response->assertSee('heroCarousel');
        $response->assertSee('aspect-[21/9]');
        $response->assertSee('carousel-slide');
        $response->assertSee('logo-transparent.png');
        // Meta tags, OG images, and Favicon
        $response->assertSee('og:image');
        $response->assertSee('og-image.png');
        $response->assertSee('favicon-32x32.png');
        $response->assertSee('apple-touch-icon.png');
        $response->assertSee('name="keywords"', false);
        $response->assertSee('rel="canonical"', false);
        // Landing page does not contain reservation form or location sections
        $response->assertDontSee('id="reservasi"', false);
        $response->assertDontSee('id="kontak"', false);
        $response->assertDontSee('Formulir Reservasi');
        // Portal Admin link is removed from public header and footer
        $response->assertDontSee('Portal Admin');
        // Studio Podcast facility is removed
        $response->assertDontSee('Studio Podcast');
        // Header menu items: Beranda, Virtual Office, Co-working Space, Kontak
        $response->assertSee('Beranda');
        $response->assertSee('Co-working Space');
        $response->assertSee('Kontak');
        // Pesan Ruangan CTA button with Call icon
        $response->assertSee('Pesan Ruangan');
        $response->assertSee('data-track-cta="whatsapp"', false);
        // Universal tracking script
        $response->assertSee('trackWhatsAppClick');
        // Landing page shows popular rooms and catalog link
        $response->assertSee('Pilihan Ruangan Terpopuler');
        $response->assertSee(route('rooms.catalog'));
        // Scroll to Top button above WhatsApp
        $response->assertSee('id="scrollToTopBtn"', false);
        $response->assertSee('aria-label="Scroll ke Atas"', false);
    }

    public function test_contact_page_loads_with_reservation_form_and_location()
    {
        $response = $this->get('/kontak');
        $response->assertStatus(200);
        $response->assertSee('Kontak & Reservasi Ruangan');
        $response->assertSee('Formulir Reservasi');
        $response->assertSee('Greenwich Business Park, Blok B1');
        $response->assertSee('Pagedangan');
        $response->assertSee('+6281908797799');
        $response->assertSee('Admin K-Space');
        $response->assertDontSee('Sudirman');
        $response->assertDontSee('Jakarta');
        $response->assertDontSee('Portal Admin');
        $response->assertSee('date-white-icon');
        $response->assertSee('pr-10');
        $response->assertSee('pr-3.5');
    }

    public function test_reusable_components_render_properly()
    {
        $renderedSelect = (string) $this->blade('<x-select name="test_select" theme="dark" label="Pilihan"><option value="1">Satu</option></x-select>');
        $this->assertStringContainsString('appearance-none', $renderedSelect);
        $this->assertStringContainsString('pr-10', $renderedSelect);
        $this->assertStringContainsString('pr-3.5', $renderedSelect);
        $this->assertStringContainsString('<svg', $renderedSelect);

        $renderedDateInput = (string) $this->blade('<x-input type="date" name="test_date" theme="dark" white-date-icon="true" />');
        $this->assertStringContainsString('type="date"', $renderedDateInput);
        $this->assertStringContainsString('date-white-icon', $renderedDateInput);
        $this->assertStringContainsString('brightness(0)_invert(1)', $renderedDateInput);
    }

    public function test_room_detail_page_loads_with_media()
    {
        $room = Room::create([
            'name' => 'Boardroom Test',
            'category' => 'meeting_room',
            'capacity' => '10 Orang',
            'price_hourly' => 300000,
            'status' => 'available',
        ]);

        $room->media()->create([
            'file_path' => 'https://example.com/test.jpg',
            'file_name' => 'test.jpg',
            'file_type' => 'image',
            'is_primary' => true,
        ]);

        $response = $this->get('/rooms/' . $room->slug);
        $response->assertStatus(200);
        $response->assertSee('Boardroom Test');
        $response->assertSee('10 Orang');
    }

    public function test_public_user_can_submit_inquiry()
    {
        $room = Room::create([
            'name' => 'Private Office Test',
            'category' => 'private_office',
            'price_monthly' => 10000000,
            'status' => 'available',
        ]);

        $response = $this->post('/inquiry', [
            'name' => 'Ahmad Fauzi',
            'email' => 'fauzi@example.com',
            'phone' => '08123456789',
            'company_name' => 'Startup Maju',
            'service_type' => 'private_office',
            'room_id' => $room->id,
            'notes' => 'Butuh ruangan untuk 5 orang',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('inquiries', [
            'name' => 'Ahmad Fauzi',
            'email' => 'fauzi@example.com',
            'company_name' => 'Startup Maju',
        ]);
    }

    public function test_admin_login_and_logout()
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);

        $loginResponse = $this->post('/admin/login', [
            'email' => 'admin@konsulinspace.com',
            'password' => 'password',
        ]);

        $loginResponse->assertRedirect('/admin');
        $this->assertAuthenticatedAs($this->admin);

        $logoutResponse = $this->post('/admin/logout');
        $logoutResponse->assertRedirect('/admin/login');
        $this->assertGuest();
    }

    public function test_admin_dashboard_requires_authentication()
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }

    public function test_authenticated_admin_can_view_dashboard_and_rooms()
    {
        $response = $this->actingAs($this->admin)->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Dashboard Overview');

        $roomsResponse = $this->actingAs($this->admin)->get('/admin/rooms');
        $roomsResponse->assertStatus(200);
        $roomsResponse->assertSee('Kelola Ruangan');

        $createResponse = $this->actingAs($this->admin)->get('/admin/rooms/create');
        $createResponse->assertStatus(200);
        $createResponse->assertSee('Tambah Ruangan');

        $room = Room::create([
            'name' => 'Sample Room',
            'category' => 'coworking',
            'status' => 'available',
        ]);
        $editResponse = $this->actingAs($this->admin)->get('/admin/rooms/' . $room->id . '/edit');
        $editResponse->assertStatus(200);
        $editResponse->assertSee('Edit Ruangan');
    }

    public function test_dropzone_temp_media_upload_endpoint_for_image_and_video()
    {
        Storage::fake('public');

        // Test Image Upload
        $fakeImage = UploadedFile::fake()->image('room-photo.jpg', 600, 400);
        $imageResponse = $this->actingAs($this->admin)->postJson('/admin/rooms/upload-temp-media', [
            'file' => $fakeImage,
        ]);

        $imageResponse->assertStatus(200);
        $imageResponse->assertJson([
            'success' => true,
            'file_name' => 'room-photo.jpg',
            'file_type' => 'image',
        ]);

        // Test Video Upload
        $fakeVideo = UploadedFile::fake()->create('virtual-tour.mp4', 2048, 'video/mp4');
        $videoResponse = $this->actingAs($this->admin)->postJson('/admin/rooms/upload-temp-media', [
            'file' => $fakeVideo,
        ]);

        $videoResponse->assertStatus(200);
        $videoResponse->assertJson([
            'success' => true,
            'file_name' => 'virtual-tour.mp4',
            'file_type' => 'video',
        ]);
    }

    public function test_admin_can_create_room_with_dropzone_media()
    {
        Storage::fake('public');

        $mediaData = [
            'file_path' => 'rooms/sample.jpg',
            'file_name' => 'sample.jpg',
            'file_type' => 'image',
            'mime_type' => 'image/jpeg',
            'file_size' => 12345,
        ];

        $response = $this->actingAs($this->admin)->post('/admin/rooms', [
            'name' => 'Studio Creator Pod',
            'category' => 'meeting_room',
            'capacity' => '4 Orang',
            'area_sqm' => '20 m²',
            'price_hourly' => 200000,
            'status' => 'available',
            'amenities_input' => "WiFi 300 Mbps\nMicrophone Shure",
            'uploaded_media' => [
                json_encode($mediaData),
            ],
        ]);

        $response->assertRedirect('/admin/rooms');
        $this->assertDatabaseHas('rooms', [
            'name' => 'Studio Creator Pod',
            'category' => 'meeting_room',
        ]);

        $room = Room::where('name', 'Studio Creator Pod')->first();
        $this->assertNotNull($room);
        $this->assertCount(1, $room->media);
        $this->assertTrue($room->media->first()->is_primary);
    }

    public function test_admin_can_update_room_and_delete_room()
    {
        $room = Room::create([
            'name' => 'Old Room Name',
            'category' => 'coworking',
            'price_hourly' => 45000,
            'status' => 'available',
        ]);

        $response = $this->actingAs($this->admin)->put('/admin/rooms/' . $room->id, [
            'name' => 'Updated Room Name',
            'category' => 'coworking',
            'price_hourly' => 55000,
            'status' => 'booked',
        ]);

        $response->assertRedirect('/admin/rooms');
        $this->assertDatabaseHas('rooms', [
            'id' => $room->id,
            'name' => 'Updated Room Name',
            'status' => 'booked',
        ]);

        $deleteResponse = $this->actingAs($this->admin)->delete('/admin/rooms/' . $room->id);
        $deleteResponse->assertRedirect('/admin/rooms');
        $this->assertDatabaseMissing('rooms', ['id' => $room->id]);
    }

    public function test_admin_can_manage_inquiries()
    {
        $inquiry = Inquiry::create([
            'name' => 'Budi Client',
            'email' => 'budi@test.com',
            'phone' => '081299998888',
            'service_type' => 'virtual_office',
            'status' => 'new',
        ]);

        $indexResponse = $this->actingAs($this->admin)->get('/admin/inquiries');
        $indexResponse->assertStatus(200);
        $indexResponse->assertSee('Budi Client');

        $statusResponse = $this->actingAs($this->admin)->patch('/admin/inquiries/' . $inquiry->id . '/status', [
            'status' => 'contacted',
        ]);
        $statusResponse->assertRedirect();
        $this->assertDatabaseHas('inquiries', [
            'id' => $inquiry->id,
            'status' => 'contacted',
        ]);
    }

    public function test_guest_cannot_access_virtual_offices_admin()
    {
        $response = $this->get('/admin/virtual-offices');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_sidebar_contains_virtual_office_menu()
    {
        $response = $this->actingAs($this->admin)->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Kelola Virtual Office');
        $response->assertSee(route('admin.virtual-offices.index'));
    }

    public function test_admin_can_view_virtual_offices_list()
    {
        VirtualOfficePackage::create([
            'name' => 'Diamond Elite',
            'slug' => 'diamond-elite',
            'tagline' => 'Paket kantor virtual eksekutif',
            'price_monthly' => 950000,
            'features' => ['Layanan Resepsionis', 'Ruang Rapat 12 Jam'],
            'status' => 'active',
            'order_position' => 1,
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/virtual-offices');
        $response->assertStatus(200);
        $response->assertSee('Kelola Paket Virtual Office');
        $response->assertSee('Diamond Elite');
        $response->assertSee('Rp 950.000');
        $response->assertSee('2 Fasilitas');
    }

    public function test_admin_can_create_virtual_office_package()
    {
        $response = $this->actingAs($this->admin)->post('/admin/virtual-offices', [
            'name' => 'Custom Executive VO',
            'tagline' => 'Alamat prestisius BSD',
            'price_monthly' => 500000,
            'price_yearly' => 5500000,
            'features_text' => "- Alamat Bisnis Resmi\n- Resepsionis Tamu\n- Surat & Paket",
            'is_popular' => 1,
            'status' => 'active',
            'order_position' => 2,
            'cta_text' => 'Pilih Executive',
        ]);

        $response->assertRedirect('/admin/virtual-offices');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('virtual_office_packages', [
            'name' => 'Custom Executive VO',
            'price_monthly' => 500000,
            'is_popular' => 1,
            'status' => 'active',
        ]);

        $package = VirtualOfficePackage::where('name', 'Custom Executive VO')->first();
        $this->assertCount(3, $package->features);
        $this->assertEquals(['Alamat Bisnis Resmi', 'Resepsionis Tamu', 'Surat & Paket'], $package->features);
    }

    public function test_admin_can_edit_and_update_virtual_office_package()
    {
        $package = VirtualOfficePackage::create([
            'name' => 'Starter Pack VO',
            'price_monthly' => 300000,
            'features' => ['Alamat Surat'],
            'status' => 'active',
        ]);

        $editPage = $this->actingAs($this->admin)->get('/admin/virtual-offices/' . $package->id . '/edit');
        $editPage->assertStatus(200);
        $editPage->assertSee('Starter Pack VO');

        $updateResponse = $this->actingAs($this->admin)->put('/admin/virtual-offices/' . $package->id, [
            'name' => 'Starter Pack VO Revised',
            'tagline' => 'Tagline baru',
            'price_monthly' => 380000,
            'features_text' => "Alamat Surat\nNotifikasi WhatsApp",
            'is_popular' => 0,
            'status' => 'active',
            'order_position' => 5,
        ]);

        $updateResponse->assertRedirect('/admin/virtual-offices');
        $this->assertDatabaseHas('virtual_office_packages', [
            'id' => $package->id,
            'name' => 'Starter Pack VO Revised',
            'price_monthly' => 380000,
        ]);

        $package->refresh();
        $this->assertCount(2, $package->features);
    }

    public function test_admin_can_delete_virtual_office_package()
    {
        $package = VirtualOfficePackage::create([
            'name' => 'Temporary VO Package',
            'price_monthly' => 250000,
            'status' => 'inactive',
        ]);

        $response = $this->actingAs($this->admin)->delete('/admin/virtual-offices/' . $package->id);
        $response->assertRedirect('/admin/virtual-offices');
        $this->assertDatabaseMissing('virtual_office_packages', ['id' => $package->id]);
    }

    public function test_home_page_displays_active_virtual_office_packages()
    {
        VirtualOfficePackage::create([
            'name' => 'Paket Alpha Dynamic',
            'price_monthly' => 420000,
            'features' => ['Fitur Khusus Alpha 1', 'Fitur Khusus Alpha 2'],
            'status' => 'active',
            'order_position' => 1,
        ]);

        VirtualOfficePackage::create([
            'name' => 'Paket Hidden Dynamic',
            'price_monthly' => 990000,
            'features' => ['Fitur Tersembunyi'],
            'status' => 'inactive',
            'order_position' => 2,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Paket Alpha Dynamic');
        $response->assertSee('Rp 420.000');
        $response->assertSee('Fitur Khusus Alpha 1');
        $response->assertDontSee('Paket Hidden Dynamic');
    }

    public function test_header_menu_contains_only_specified_items_and_no_faq()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Header must not have #faq link in its nav
        $headerHtml = '';
        if (preg_match('/<header.*?<\/header>/s', $response->getContent(), $matches)) {
            $headerHtml = $matches[0];
        }

        $this->assertNotEmpty($headerHtml);
        $this->assertStringContainsString('Beranda', $headerHtml);
        $this->assertStringContainsString('Virtual Office', $headerHtml);
        $this->assertStringContainsString('Co-working Space', $headerHtml);
        $this->assertStringContainsString('Kontak', $headerHtml);
        $this->assertStringContainsString('Pesan Ruangan', $headerHtml);
        // FAQ must be removed from header
        $this->assertStringNotContainsString('#faq', $headerHtml);
        $this->assertStringNotContainsString('>FAQ<', $headerHtml);
    }

    public function test_landing_page_shows_only_4_popular_rooms()
    {
        // Create 6 rooms
        for ($i = 1; $i <= 6; $i++) {
            Room::create([
                'name' => "Room {$i}",
                'category' => 'coworking',
                'capacity' => '1 Orang',
                'price_hourly' => 50000 * $i,
                'status' => 'available',
                'order_position' => $i,
            ]);
        }

        $response = $this->get('/');
        $response->assertStatus(200);

        // Should see Room 1, 2, 3, 4
        $response->assertSee('Room 1');
        $response->assertSee('Room 2');
        $response->assertSee('Room 3');
        $response->assertSee('Room 4');
        // Section #ruangan should not contain Room 5 and Room 6
        if (preg_match('/<section id="ruangan".*?<\/section>/s', $response->getContent(), $matches)) {
            $ruanganHtml = $matches[0];
            $this->assertStringContainsString('Room 1', $ruanganHtml);
            $this->assertStringContainsString('Room 4', $ruanganHtml);
            $this->assertStringNotContainsString('Room 5', $ruanganHtml);
            $this->assertStringNotContainsString('Room 6', $ruanganHtml);
        }
    }

    public function test_dedicated_rooms_catalog_page_loads_and_filters()
    {
        $cowork = Room::create([
            'name' => 'Cowork Room Special',
            'category' => 'coworking',
            'status' => 'available',
        ]);

        $meeting = Room::create([
            'name' => 'Meeting Room Elite',
            'category' => 'meeting_room',
            'status' => 'available',
        ]);

        // General catalog
        $response = $this->get('/rooms');
        $response->assertStatus(200);
        $response->assertSee('Katalog Lengkap Ruangan');
        $response->assertSee('Cowork Room Special');
        $response->assertSee('Meeting Room Elite');

        // Filter by category coworking
        $filterResponse = $this->get('/rooms?category=coworking');
        $filterResponse->assertStatus(200);
        $filterResponse->assertSee('Cowork Room Special');
        $filterResponse->assertDontSee('Meeting Room Elite');
    }

    public function test_google_tracking_tags_render_when_configured()
    {
        config([
            'services.google.site_verification' => 'test-gsc-verification-code',
            'services.google.gtm_id' => 'GTM-TEST1234',
            'services.google.ga4_id' => 'G-TESTGA456',
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('name="google-site-verification" content="test-gsc-verification-code"', false);
        $response->assertSee('GTM-TEST1234');
        $response->assertSee('G-TESTGA456');
    }

    public function test_admin_can_manage_hero_slides()
    {
        // 1. Admin views hero slides
        $indexResponse = $this->actingAs($this->admin)->get('/admin/hero-slides');
        $indexResponse->assertStatus(200);
        $indexResponse->assertSee('Kelola Hero Carousel');

        // 2. Admin creates with_text slide
        $createResponse = $this->actingAs($this->admin)->post('/admin/hero-slides', [
            'slide_type' => 'with_text',
            'title' => 'New Awesome Slide',
            'badge_text' => 'Greenwich BSD',
            'subtitle' => 'Deskripsi slide baru',
            'image_url_input' => 'https://images.unsplash.com/photo-12345678',
            'cta_primary_text' => 'Lihat Sekarang',
            'cta_primary_link' => '#ruangan',
            'status' => 'active',
            'order_position' => 1,
        ]);
        $createResponse->assertRedirect('/admin/hero-slides');
        $this->assertDatabaseHas('hero_slides', [
            'title' => 'New Awesome Slide',
            'slide_type' => 'with_text',
        ]);

        // 3. Admin creates image_only slide
        $imageOnlyResponse = $this->actingAs($this->admin)->post('/admin/hero-slides', [
            'slide_type' => 'image_only',
            'image_url_input' => 'https://images.unsplash.com/photo-banner-only',
            'status' => 'active',
            'order_position' => 2,
        ]);
        $imageOnlyResponse->assertRedirect('/admin/hero-slides');
        $this->assertDatabaseHas('hero_slides', [
            'slide_type' => 'image_only',
            'image_path' => 'https://images.unsplash.com/photo-banner-only',
        ]);

        // 4. Admin edits slide
        $slide = HeroSlide::where('title', 'New Awesome Slide')->first();
        $editPage = $this->actingAs($this->admin)->get('/admin/hero-slides/' . $slide->id . '/edit');
        $editPage->assertStatus(200);
        $editPage->assertSee('New Awesome Slide');

        $updateResponse = $this->actingAs($this->admin)->put('/admin/hero-slides/' . $slide->id, [
            'slide_type' => 'with_text',
            'title' => 'New Awesome Slide Updated',
            'image_url_input' => 'https://images.unsplash.com/photo-12345678',
            'status' => 'active',
            'order_position' => 3,
        ]);
        $updateResponse->assertRedirect('/admin/hero-slides');
        $this->assertDatabaseHas('hero_slides', [
            'id' => $slide->id,
            'title' => 'New Awesome Slide Updated',
        ]);

        // 5. Admin deletes slide
        $deleteResponse = $this->actingAs($this->admin)->delete('/admin/hero-slides/' . $slide->id);
        $deleteResponse->assertRedirect('/admin/hero-slides');
        $this->assertDatabaseMissing('hero_slides', ['id' => $slide->id]);
    }
}
