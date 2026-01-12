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
        // Data Statistik Utama
        $totalEvents = Event::count();
        // Pastikan nama Model sesuai (Category atau Kategori)
        $totalCategories = Kategori::count();
        $totalOrders = Order::count();

        // Data Tambahan untuk Tabel "Aktivitas Terbaru"
        // Mengambil 5 event yang baru saja dibuat
        $recents = Event::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalEvents',
            'totalCategories',
            'totalOrders',
            'recents'
        ));
    }
}