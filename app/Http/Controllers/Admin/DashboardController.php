<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_products' => Product::count(),
            'published_products' => Product::where('is_published', true)->count(),
            'total_categories' => Category::count(),
            'payment_gateways' => PaymentGateway::count(),
        ];

        if (Schema::hasTable('products')) {
            $recentProducts = Product::with('category')
                ->latest()
                ->take(5)
                ->get();
        } else {
            $recentProducts = collect();
        }

        return view('admin.dashboard', compact('stats', 'recentProducts'));
    }
}
