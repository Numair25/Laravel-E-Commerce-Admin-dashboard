<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cycle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CycleController extends Controller
{
    public function index(Request $request): View
    {
        $query = Cycle::where('is_published', true)
            ->with('category');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Type filter
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Brand filter
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Price range filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sorting
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $cycles = $query->paginate(12)->withQueryString();

        // Get filter options
        $categories = Category::all();
        $brands = Cycle::where('is_published', true)->distinct()->pluck('brand');
        $types = ['Gear', 'Non-Gear', 'Electric', 'Kids'];

        return view('frontend.cycles.index', compact('cycles', 'categories', 'brands', 'types'));
    }

    public function show(Cycle $cycle): View
    {
        if (!$cycle->is_published) {
            abort(404);
        }

        $cycle->load('category');
        
        // Get related cycles
        $relatedCycles = Cycle::where('is_published', true)
            ->where('id', '!=', $cycle->id)
            ->where('category_id', $cycle->category_id)
            ->with('category')
            ->take(4)
            ->get();

        return view('frontend.cycles.show', compact('cycle', 'relatedCycles'));
    }
}
