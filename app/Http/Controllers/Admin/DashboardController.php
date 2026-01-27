<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Kategori;
use App\Models\Order;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $totalEvents = Event::count();
        $totalCategories = Kategori::count();
        $totalOrders = Order::count();
        $recents = Event::latest()->take(5)->get();
        $recentOrders = Order::with(['event', 'user'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalEvents',
            'totalCategories',
            'totalOrders',
            'recents',
            'recentOrders'
        ));
    }
}