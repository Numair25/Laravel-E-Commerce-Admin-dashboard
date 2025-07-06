<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cycle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $cycles = Cycle::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.cycles.index', compact('cycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $types = ['Gear', 'Non-Gear', 'Electric', 'Kids'];
        $stockStatuses = ['In Stock', 'Out of Stock'];

        return view('admin.cycles.create', compact('categories', 'types', 'stockStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'type' => 'required|in:Gear,Non-Gear,Electric,Kids',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'specifications' => 'nullable|string',
            'stock_status' => 'required|in:In Stock,Out of Stock',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $cycle = Cycle::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $cycle->addMedia($image)->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.cycles.index')
            ->with('success', 'Cycle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cycle $cycle): View
    {
        $cycle->load('category');
        return view('admin.cycles.show', compact('cycle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cycle $cycle): View
    {
        $categories = Category::all();
        $types = ['Gear', 'Non-Gear', 'Electric', 'Kids'];
        $stockStatuses = ['In Stock', 'Out of Stock'];

        return view('admin.cycles.edit', compact('cycle', 'categories', 'types', 'stockStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cycle $cycle): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'type' => 'required|in:Gear,Non-Gear,Electric,Kids',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'specifications' => 'nullable|string',
            'stock_status' => 'required|in:In Stock,Out of Stock',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $cycle->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $cycle->addMedia($image)->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.cycles.index')
            ->with('success', 'Cycle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cycle $cycle): RedirectResponse
    {
        $cycle->delete();

        return redirect()->route('admin.cycles.index')
            ->with('success', 'Cycle deleted successfully.');
    }

    /**
     * Toggle publish status of the cycle.
     */
    public function togglePublish(Cycle $cycle): RedirectResponse
    {
        $cycle->update(['is_published' => !$cycle->is_published]);

        $status = $cycle->is_published ? 'published' : 'unpublished';
        return redirect()->route('admin.cycles.index')
            ->with('success', "Cycle {$status} successfully.");
    }

    /**
     * Delete a media file.
     */
    public function deleteMedia($mediaId)
    {
        try {
            $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::findOrFail($mediaId);
            $media->delete();
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting media']);
        }
    }
}
