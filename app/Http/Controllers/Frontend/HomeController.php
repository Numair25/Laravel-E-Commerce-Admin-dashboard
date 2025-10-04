<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cycle;
use App\Models\Fashion;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredCycles = Cycle::where('is_published', true)
            ->with('category')
            ->latest()
            ->take(6)
            ->get();

        $featuredFashions = Fashion::latest()->take(6)->get();

        $categories = Category::withCount(['cycles' => function ($query) {
            $query->where('is_published', true);
        }])->get();

        return view('frontend.home', compact('featuredCycles', 'featuredFashions', 'categories'));
    }

    public function about(): View
    {
        return view('frontend.about');
    }

    public function search(Request $request): View
    {
        $query = $request->input('q');
        $category = $request->input('category');

        $cycles = collect();
        $fashions = collect();

        if ($category === 'cycles' || $category === '' || $category === null) {
            $cycles = Cycle::where('is_published', true)
                ->where(function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                      ->orWhere('brand', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%");
                })
                ->get();
        }
        if ($category === 'fashions' || $category === '' || $category === null) {
            $fashions = Fashion::where(function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%");
                })
                ->get();
        }

        return view('frontend.search', compact('cycles', 'fashions', 'query', 'category'));
    }
}
