<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Room;
use App\Models\RoomMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRooms = Room::count();
        $availableRooms = Room::where('status', 'available')->count();
        $totalImages = RoomMedia::where('file_type', 'image')->count();
        $totalVideos = RoomMedia::where('file_type', 'video')->count();
        $totalInquiries = Inquiry::count();
        $newInquiriesCount = Inquiry::where('status', 'new')->count();

        $recentInquiries = Inquiry::with('room')->latest()->take(6)->get();
        $recentRooms = Room::with('media')->latest()->take(5)->get();

        $categoryStats = [
            'coworking' => Room::where('category', 'coworking')->count(),
            'virtual_office' => Room::where('category', 'virtual_office')->count(),
            'meeting_room' => Room::where('category', 'meeting_room')->count(),
            'private_office' => Room::where('category', 'private_office')->count(),
            'event_space' => Room::where('category', 'event_space')->count(),
        ];

        return view('admin.dashboard', compact(
            'totalRooms',
            'availableRooms',
            'totalImages',
            'totalVideos',
            'totalInquiries',
            'newInquiriesCount',
            'recentInquiries',
            'recentRooms',
            'categoryStats'
        ));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:30',
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => ['nullable', Password::min(6), 'confirmed'],
        ]);

        if (!empty($validated['new_password'])) {
            if (!Hash::check($validated['current_password'], $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
            }
            $user->password = Hash::make($validated['new_password']);
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? null;
        $user->save();

        return back()->with('success', 'Profil dan akun berhasil diperbarui.');
    }
}
