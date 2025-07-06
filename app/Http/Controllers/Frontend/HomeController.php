<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cycle;
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

        $categories = Category::withCount(['cycles' => function ($query) {
            $query->where('is_published', true);
        }])->get();

        return view('frontend.home', compact('featuredCycles', 'categories'));
    }

    public function about(): View
    {
        return view('frontend.about');
    }
}
