<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $types = ['Gear', 'Non-Gear', 'Electric', 'Kids'];
        $stockStatuses = ['In Stock', 'Out of Stock'];

        return view('admin.products.create', compact('categories', 'types', 'stockStatuses'));
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

        $product = Product::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $product->addMedia($image)->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        $product->load('category');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $categories = Category::all();
        $types = ['Gear', 'Non-Gear', 'Electric', 'Kids'];
        $stockStatuses = ['In Stock', 'Out of Stock'];

        return view('admin.products.edit', compact('product', 'categories', 'types', 'stockStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
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

        $product->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $product->addMedia($image)->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    /**
     * Toggle publish status of the product.
     */
    public function togglePublish(Product $product): RedirectResponse
    {
        $product->update(['is_published' => !$product->is_published]);

        $status = $product->is_published ? 'published' : 'unpublished';
        return redirect()->route('admin.products.index')
            ->with('success', "Product {$status} successfully.");
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
