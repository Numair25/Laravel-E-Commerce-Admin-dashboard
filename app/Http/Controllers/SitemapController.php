<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Category;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $cycles = Cycle::where('is_published', true)->get();
        $categories = Category::all();

        $content = view('sitemap.index', compact('cycles', 'categories'));
        
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
