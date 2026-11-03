<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VirtualOfficePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VirtualOfficePackageController extends Controller
{
    public function index(Request $request)
    {
        $query = VirtualOfficePackage::orderBy('order_position', 'asc')->latest('id');

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('tagline', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status') && $request->query('status') !== 'all') {
            $query->where('status', $request->query('status'));
        }

        $packages = $query->paginate(10)->withQueryString();

        return view('admin.virtual_offices.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.virtual_offices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'tagline' => 'nullable|string|max:255',
            'price_monthly' => 'required|numeric|min:0',
            'price_yearly' => 'nullable|numeric|min:0',
            'features_text' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
            'order_position' => 'nullable|integer|min:0',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:255',
        ]);

        $features = $this->parseFeatures($request->input('features_text'));

        $package = new VirtualOfficePackage();
        $package->name = $validated['name'];
        $package->slug = Str::slug($validated['name']);
        
        // Ensure unique slug
        $counter = 1;
        $originalSlug = $package->slug;
        while (VirtualOfficePackage::where('slug', $package->slug)->exists()) {
            $package->slug = $originalSlug . '-' . $counter++;
        }

        $package->tagline = $validated['tagline'] ?? null;
        $package->price_monthly = $validated['price_monthly'];
        $package->price_yearly = $validated['price_yearly'] ?? null;
        $package->features = $features;
        $package->is_popular = $request->boolean('is_popular');
        $package->status = $validated['status'];
        $package->order_position = $validated['order_position'] ?? 0;
        $package->cta_text = !empty($validated['cta_text']) ? $validated['cta_text'] : 'Pilih Paket';
        $package->cta_link = $validated['cta_link'] ?? null;
        $package->save();

        return redirect()->route('admin.virtual-offices.index')
            ->with('success', "Paket Virtual Office '{$package->name}' berhasil ditambahkan.");
    }

    public function edit(VirtualOfficePackage $virtualOffice)
    {
        $featuresText = !empty($virtualOffice->features) && is_array($virtualOffice->features) 
            ? implode("\n", $virtualOffice->features) 
            : '';

        return view('admin.virtual_offices.edit', [
            'package' => $virtualOffice,
            'featuresText' => $featuresText,
        ]);
    }

    public function update(Request $request, VirtualOfficePackage $virtualOffice)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'tagline' => 'nullable|string|max:255',
            'price_monthly' => 'required|numeric|min:0',
            'price_yearly' => 'nullable|numeric|min:0',
            'features_text' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
            'order_position' => 'nullable|integer|min:0',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:255',
        ]);

        $features = $this->parseFeatures($request->input('features_text'));

        $virtualOffice->name = $validated['name'];
        $virtualOffice->tagline = $validated['tagline'] ?? null;
        $virtualOffice->price_monthly = $validated['price_monthly'];
        $virtualOffice->price_yearly = $validated['price_yearly'] ?? null;
        $virtualOffice->features = $features;
        $virtualOffice->is_popular = $request->boolean('is_popular');
        $virtualOffice->status = $validated['status'];
        $virtualOffice->order_position = $validated['order_position'] ?? 0;
        $virtualOffice->cta_text = !empty($validated['cta_text']) ? $validated['cta_text'] : 'Pilih Paket';
        $virtualOffice->cta_link = $validated['cta_link'] ?? null;
        $virtualOffice->save();

        return redirect()->route('admin.virtual-offices.index')
            ->with('success', "Paket Virtual Office '{$virtualOffice->name}' berhasil diperbarui.");
    }

    public function destroy(VirtualOfficePackage $virtualOffice)
    {
        $name = $virtualOffice->name;
        $virtualOffice->delete();

        return redirect()->route('admin.virtual-offices.index')
            ->with('success', "Paket Virtual Office '{$name}' telah dihapus.");
    }

    /**
     * Parse multiline text into array of clean feature strings.
     */
    private function parseFeatures(?string $text): array
    {
        if (empty($text)) {
            return [];
        }

        $lines = preg_split('/\r\n|\r|\n/', $text);
        $features = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            // Strip leading bullets if entered by user (e.g. "- ", "* ", "• ")
            $trimmed = preg_replace('/^[-*•\x{2022}]\s*/u', '', $trimmed);
            if ($trimmed !== '') {
                $features[] = $trimmed;
            }
        }

        return $features;
    }
}
