<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Models\Room;
use App\Models\RoomMedia;
use App\Models\User;
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
    }

    public function test_contact_page_loads_with_reservation_form_and_location()
    {
        $response = $this->get('/kontak');
        $response->assertStatus(200);
        $response->assertSee('Kontak & Reservasi Ruangan');
        $response->assertSee('Formulir Reservasi');
        $response->assertSee('Gedung Artha Sudirman Suites');
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
}
