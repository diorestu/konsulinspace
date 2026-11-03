<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('order_position', 'asc')->latest('id')->paginate(10);

        return view('admin.hero_slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero_slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slide_type' => 'required|in:with_text,image_only',
            'title' => 'nullable|string|max:200',
            'badge_text' => 'nullable|string|max:100',
            'subtitle' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'image_url_input' => 'nullable|url|max:500',
            'cta_primary_text' => 'nullable|string|max:100',
            'cta_primary_link' => 'nullable|string|max:255',
            'cta_secondary_text' => 'nullable|string|max:100',
            'cta_secondary_link' => 'nullable|string|max:255',
            'order_position' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        // Validate image source
        if (!$request->hasFile('image_file') && empty($validated['image_url_input'])) {
            return back()->withInput()->withErrors(['image_file' => 'Silakan upload file gambar atau masukkan URL gambar.']);
        }

        $imagePath = '';
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('hero-carousel', 'public');
            $imagePath = $path;
        } else {
            $imagePath = $validated['image_url_input'];
        }

        $slide = new HeroSlide();
        $slide->slide_type = $validated['slide_type'];
        $slide->title = $validated['title'] ?? null;
        $slide->badge_text = $validated['badge_text'] ?? null;
        $slide->subtitle = $validated['subtitle'] ?? null;
        $slide->image_path = $imagePath;
        $slide->cta_primary_text = $validated['cta_primary_text'] ?? null;
        $slide->cta_primary_link = $validated['cta_primary_link'] ?? null;
        $slide->cta_secondary_text = $validated['cta_secondary_text'] ?? null;
        $slide->cta_secondary_link = $validated['cta_secondary_link'] ?? null;
        $slide->order_position = $validated['order_position'] ?? 0;
        $slide->status = $validated['status'];
        $slide->save();

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Slide Hero Carousel berhasil ditambahkan.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero_slides.edit', ['slide' => $heroSlide]);
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $validated = $request->validate([
            'slide_type' => 'required|in:with_text,image_only',
            'title' => 'nullable|string|max:200',
            'badge_text' => 'nullable|string|max:100',
            'subtitle' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'image_url_input' => 'nullable|url|max:500',
            'cta_primary_text' => 'nullable|string|max:100',
            'cta_primary_link' => 'nullable|string|max:255',
            'cta_secondary_text' => 'nullable|string|max:100',
            'cta_secondary_link' => 'nullable|string|max:255',
            'order_position' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image_file')) {
            // Delete old file if stored locally in public disk
            if (!str_starts_with($heroSlide->image_path, 'http') && Storage::disk('public')->exists($heroSlide->image_path)) {
                Storage::disk('public')->delete($heroSlide->image_path);
            }
            $path = $request->file('image_file')->store('hero-carousel', 'public');
            $heroSlide->image_path = $path;
        } elseif (!empty($validated['image_url_input'])) {
            $heroSlide->image_path = $validated['image_url_input'];
        }

        $heroSlide->slide_type = $validated['slide_type'];
        $heroSlide->title = $validated['title'] ?? null;
        $heroSlide->badge_text = $validated['badge_text'] ?? null;
        $heroSlide->subtitle = $validated['subtitle'] ?? null;
        $heroSlide->cta_primary_text = $validated['cta_primary_text'] ?? null;
        $heroSlide->cta_primary_link = $validated['cta_primary_link'] ?? null;
        $heroSlide->cta_secondary_text = $validated['cta_secondary_text'] ?? null;
        $heroSlide->cta_secondary_link = $validated['cta_secondary_link'] ?? null;
        $heroSlide->order_position = $validated['order_position'] ?? 0;
        $heroSlide->status = $validated['status'];
        $heroSlide->save();

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Slide Hero Carousel berhasil diperbarui.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        if (!str_starts_with($heroSlide->image_path, 'http') && Storage::disk('public')->exists($heroSlide->image_path)) {
            Storage::disk('public')->delete($heroSlide->image_path);
        }

        $heroSlide->delete();

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Slide Hero Carousel telah dihapus.');
    }
}
