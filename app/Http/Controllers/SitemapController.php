<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
    // Prefer products for sitemap (guard table existence)
    if (Schema::hasTable('products')) {
        $products = Product::where('is_published', true)->get();
    } else {
        $products = collect();
    }
    $categories = Category::all();

    $content = view('sitemap.index', compact('products', 'categories'));
        
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
