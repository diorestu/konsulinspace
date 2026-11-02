<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::with('media')->orderBy('order_position', 'asc')->latest('id');

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('location_floor', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->query('category') !== 'all') {
            $query->where('category', $request->query('category'));
        }

        if ($request->filled('status') && $request->query('status') !== 'all') {
            $query->where('status', $request->query('status'));
        }

        $rooms = $query->paginate(10)->withQueryString();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $categories = [
            'coworking' => 'Co-Working Space',
            'virtual_office' => 'Virtual Office',
            'meeting_room' => 'Meeting Room',
            'private_office' => 'Private Office',
            'event_space' => 'Event & Training Space',
        ];

        return view('admin.rooms.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'category' => 'required|string|in:coworking,virtual_office,meeting_room,private_office,event_space',
            'capacity' => 'nullable|string|max:100',
            'area_sqm' => 'nullable|string|max:100',
            'price_hourly' => 'nullable|numeric|min:0',
            'price_daily' => 'nullable|numeric|min:0',
            'price_monthly' => 'nullable|numeric|min:0',
            'location_floor' => 'nullable|string|max:150',
            'short_description' => 'nullable|string|max:300',
            'description' => 'nullable|string',
            'amenities_input' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|string|in:available,booked,maintenance',
            'order_position' => 'nullable|integer',
            'uploaded_media' => 'nullable|array',
            'uploaded_media.*' => 'nullable|string', // JSON string from Dropzone
            'fallback_files.*' => 'nullable|file|mimes:jpeg,png,jpg,webp,gif,mp4,mov,webm,m4v|max:51200',
        ]);

        // Process amenities (comma-separated or line breaks)
        $amenities = [];
        if (!empty($validated['amenities_input'])) {
            $lines = preg_split('/[\r\n,]+/', $validated['amenities_input']);
            foreach ($lines as $line) {
                $clean = trim($line);
                if (!empty($clean)) {
                    $amenities[] = $clean;
                }
            }
        }

        $room = Room::create([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'capacity' => $validated['capacity'] ?? null,
            'area_sqm' => $validated['area_sqm'] ?? null,
            'price_hourly' => $validated['price_hourly'] ?? null,
            'price_daily' => $validated['price_daily'] ?? null,
            'price_monthly' => $validated['price_monthly'] ?? null,
            'location_floor' => $validated['location_floor'] ?? null,
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['description'] ?? null,
            'amenities' => $amenities,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $validated['status'],
            'order_position' => $validated['order_position'] ?? 0,
        ]);

        $hasPrimary = false;
        $order = 0;

        // Process Dropzone uploaded media JSON
        if (!empty($validated['uploaded_media'])) {
            foreach ($validated['uploaded_media'] as $mediaJson) {
                $data = json_decode($mediaJson, true);
                if (is_array($data) && !empty($data['file_path'])) {
                    $isPrimary = (!$hasPrimary && ($data['file_type'] ?? '') === 'image');
                    if ($isPrimary) {
                        $hasPrimary = true;
                    }

                    $room->media()->create([
                        'file_path' => $data['file_path'],
                        'file_name' => $data['file_name'] ?? 'media-' . Str::random(8),
                        'file_type' => $data['file_type'] ?? 'image',
                        'mime_type' => $data['mime_type'] ?? null,
                        'file_size' => $data['file_size'] ?? null,
                        'is_primary' => $isPrimary,
                        'order_position' => $order++,
                    ]);
                }
            }
        }

        // Process standard fallback uploaded files
        if ($request->hasFile('fallback_files')) {
            foreach ($request->file('fallback_files') as $file) {
                if ($file->isValid()) {
                    $mime = $file->getMimeType();
                    $fileType = str_starts_with($mime, 'video/') ? 'video' : 'image';
                    $path = $file->store('rooms', 'public');

                    $isPrimary = (!$hasPrimary && $fileType === 'image');
                    if ($isPrimary) {
                        $hasPrimary = true;
                    }

                    $room->media()->create([
                        'file_path' => $path,
                        'file_name' => $file->getClientOriginalName(),
                        'file_type' => $fileType,
                        'mime_type' => $mime,
                        'file_size' => $file->getSize(),
                        'is_primary' => $isPrimary,
                        'order_position' => $order++,
                    ]);
                }
            }
        }

        return redirect()->route('admin.rooms.index')
            ->with('success', "Ruangan '{$room->name}' berhasil ditambahkan.");
    }

    public function edit(Room $room)
    {
        $room->load('media');

        $categories = [
            'coworking' => 'Co-Working Space',
            'virtual_office' => 'Virtual Office',
            'meeting_room' => 'Meeting Room',
            'private_office' => 'Private Office',
            'event_space' => 'Event & Training Space',
        ];

        $amenitiesText = is_array($room->amenities) ? implode("\n", $room->amenities) : '';

        return view('admin.rooms.edit', compact('room', 'categories', 'amenitiesText'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'category' => 'required|string|in:coworking,virtual_office,meeting_room,private_office,event_space',
            'capacity' => 'nullable|string|max:100',
            'area_sqm' => 'nullable|string|max:100',
            'price_hourly' => 'nullable|numeric|min:0',
            'price_daily' => 'nullable|numeric|min:0',
            'price_monthly' => 'nullable|numeric|min:0',
            'location_floor' => 'nullable|string|max:150',
            'short_description' => 'nullable|string|max:300',
            'description' => 'nullable|string',
            'amenities_input' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|string|in:available,booked,maintenance',
            'order_position' => 'nullable|integer',
            'primary_media_id' => 'nullable|exists:room_media,id',
            'uploaded_media' => 'nullable|array',
            'uploaded_media.*' => 'nullable|string',
            'fallback_files.*' => 'nullable|file|mimes:jpeg,png,jpg,webp,gif,mp4,mov,webm,m4v|max:51200',
        ]);

        $amenities = [];
        if (!empty($validated['amenities_input'])) {
            $lines = preg_split('/[\r\n,]+/', $validated['amenities_input']);
            foreach ($lines as $line) {
                $clean = trim($line);
                if (!empty($clean)) {
                    $amenities[] = $clean;
                }
            }
        }

        $room->update([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'capacity' => $validated['capacity'] ?? null,
            'area_sqm' => $validated['area_sqm'] ?? null,
            'price_hourly' => $validated['price_hourly'] ?? null,
            'price_daily' => $validated['price_daily'] ?? null,
            'price_monthly' => $validated['price_monthly'] ?? null,
            'location_floor' => $validated['location_floor'] ?? null,
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['description'] ?? null,
            'amenities' => $amenities,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $validated['status'],
            'order_position' => $validated['order_position'] ?? 0,
        ]);

        // Process additional Dropzone uploads if submitted via form
        if (!empty($validated['uploaded_media'])) {
            $maxOrder = $room->media()->max('order_position') ?? 0;
            foreach ($validated['uploaded_media'] as $mediaJson) {
                $data = json_decode($mediaJson, true);
                if (is_array($data) && !empty($data['file_path'])) {
                    $room->media()->create([
                        'file_path' => $data['file_path'],
                        'file_name' => $data['file_name'] ?? 'media-' . Str::random(8),
                        'file_type' => $data['file_type'] ?? 'image',
                        'mime_type' => $data['mime_type'] ?? null,
                        'file_size' => $data['file_size'] ?? null,
                        'is_primary' => false,
                        'order_position' => ++$maxOrder,
                    ]);
                }
            }
        }

        // Process fallback file upload
        if ($request->hasFile('fallback_files')) {
            $maxOrder = $room->media()->max('order_position') ?? 0;
            foreach ($request->file('fallback_files') as $file) {
                if ($file->isValid()) {
                    $mime = $file->getMimeType();
                    $fileType = str_starts_with($mime, 'video/') ? 'video' : 'image';
                    $path = $file->store('rooms', 'public');

                    $room->media()->create([
                        'file_path' => $path,
                        'file_name' => $file->getClientOriginalName(),
                        'file_type' => $fileType,
                        'mime_type' => $mime,
                        'file_size' => $file->getSize(),
                        'is_primary' => false,
                        'order_position' => ++$maxOrder,
                    ]);
                }
            }
        }

        // Update primary media if selected
        if (!empty($validated['primary_media_id'])) {
            $room->media()->update(['is_primary' => false]);
            $room->media()->where('id', $validated['primary_media_id'])->update(['is_primary' => true]);
        }

        return redirect()->route('admin.rooms.index')
            ->with('success', "Data ruangan '{$room->name}' berhasil diperbarui.");
    }

    public function destroy(Room $room)
    {
        $name = $room->name;
        
        // Remove media files
        foreach ($room->media as $media) {
            if (!str_starts_with($media->file_path, 'http')) {
                Storage::disk('public')->delete($media->file_path);
            }
        }

        $room->delete();

        return redirect()->route('admin.rooms.index')
            ->with('success', "Ruangan '{$name}' telah dihapus.");
    }

    /**
     * AJAX Endpoint: Upload temporary media using Dropzone
     */
    public function uploadTempMedia(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,webp,gif,mp4,mov,webm,m4v|max:51200', // max 50MB
        ]);

        $file = $request->file('file');
        $mime = $file->getMimeType();
        $fileType = str_starts_with($mime, 'video/') ? 'video' : 'image';
        
        $path = $file->store('rooms', 'public');

        return response()->json([
            'success' => true,
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'file_type' => $fileType,
            'mime_type' => $mime,
            'file_size' => $file->getSize(),
            'url' => Storage::url($path),
        ]);
    }

    /**
     * AJAX Endpoint: Upload media directly to an existing room using Dropzone
     */
    public function uploadRoomMedia(Request $request, Room $room)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,webp,gif,mp4,mov,webm,m4v|max:51200',
        ]);

        $file = $request->file('file');
        $mime = $file->getMimeType();
        $fileType = str_starts_with($mime, 'video/') ? 'video' : 'image';
        
        $path = $file->store('rooms', 'public');

        $hasPrimary = $room->media()->where('is_primary', true)->exists();
        $isPrimary = (!$hasPrimary && $fileType === 'image');
        $order = ($room->media()->max('order_position') ?? 0) + 1;

        $media = $room->media()->create([
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'file_type' => $fileType,
            'mime_type' => $mime,
            'file_size' => $file->getSize(),
            'is_primary' => $isPrimary,
            'order_position' => $order,
        ]);

        return response()->json([
            'success' => true,
            'media' => [
                'id' => $media->id,
                'file_name' => $media->file_name,
                'file_type' => $media->file_type,
                'is_primary' => $media->is_primary,
                'file_size' => $media->formatted_size,
                'url' => $media->url,
            ],
        ]);
    }

    /**
     * Delete single media item
     */
    public function deleteMedia(RoomMedia $media)
    {
        $room = $media->room;
        $wasPrimary = $media->is_primary;

        if (!str_starts_with($media->file_path, 'http')) {
            Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();

        // If it was primary, reassign to next image
        if ($wasPrimary && $room) {
            $nextImage = $room->media()->where('file_type', 'image')->first();
            if ($nextImage) {
                $nextImage->update(['is_primary' => true]);
            }
        }

        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Media berhasil dihapus.');
    }

    /**
     * Set a media item as primary thumbnail
     */
    public function setPrimaryMedia(RoomMedia $media)
    {
        $room = $media->room;
        if ($room) {
            $room->media()->update(['is_primary' => false]);
            $media->update(['is_primary' => true]);
        }

        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Media berhasil dijadikan thumbnail utama.');
    }
}
