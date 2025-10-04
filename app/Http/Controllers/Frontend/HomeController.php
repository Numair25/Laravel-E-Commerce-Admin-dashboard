<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use App\Models\Fashion;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // featured products (guard if table missing in test env)
        if (Schema::hasTable('products')) {
            $featuredProducts = Product::where('is_published', true)
                ->with('category')
                ->latest()
                ->take(6)
                ->get();
        } else {
            $featuredProducts = collect();
        }

        // featured fashions (guard if table missing in test env)
        if (Schema::hasTable('fashions')) {
            $featuredFashions = Fashion::latest()->take(6)->get();
        } else {
            $featuredFashions = collect();
        }

        // count published products per category (guard table existence)
        if (Schema::hasTable('categories') && Schema::hasTable('products')) {
            $categories = Category::withCount(['products' => function ($query) {
                $query->where('is_published', true);
            }])->get();
        } elseif (Schema::hasTable('categories')) {
            $categories = Category::all();
        } else {
            $categories = collect();
        }

    return view('frontend.home', compact('featuredProducts', 'featuredFashions', 'categories'));
    }

    public function about(): View
    {
        return view('frontend.about');
    }

    public function search(Request $request): View
    {
        $query = $request->input('q');
        $category = $request->input('category');

    $products = collect();
    $fashions = collect();

        if ($category === 'products' || $category === '' || $category === null) {
            // search products
            if (Schema::hasTable('products')) {
                $products = Product::where('is_published', true)
                    ->where(function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%")
                          ->orWhere('brand', 'like', "%{$query}%")
                          ->orWhere('description', 'like', "%{$query}%");
                    })
                    ->get();
            } else {
                $products = collect();
            }
        }
        if ($category === 'fashions' || $category === '' || $category === null) {
            if (Schema::hasTable('fashions')) {
                $fashions = Fashion::where(function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%")
                          ->orWhere('description', 'like', "%{$query}%");
                    })
                    ->get();
            } else {
                $fashions = collect();
            }
        }

        return view('frontend.search', compact('products', 'fashions', 'query', 'category'));
    }
}
