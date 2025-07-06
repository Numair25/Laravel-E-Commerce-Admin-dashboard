<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cycle;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_cycles' => Cycle::count(),
            'published_cycles' => Cycle::where('is_published', true)->count(),
            'total_categories' => Category::count(),
            'payment_gateways' => PaymentGateway::count(),
        ];

        $recentCycles = Cycle::with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentCycles'));
    }
}
