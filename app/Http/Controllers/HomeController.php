<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page with events and categories.
     */
    public function index(Request $request)
    {
        // Ambil semua kategori untuk filter
        $categories = Kategori::all();

        // Query events dengan filter kategori jika ada
        $eventsQuery = Event::with('kategori', 'tikets');

        // Filter berdasarkan kategori jika parameter 'kategori' ada
        if ($request->has('kategori') && $request->kategori) {
            $eventsQuery->where('kategori_id', $request->kategori);
        }

        // Ambil semua events yang sudah difilter
        $events = $eventsQuery->latest()->get();

        return view('home', compact('categories', 'events'));
    }
}
