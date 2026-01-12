<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;

class HistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = Order::latest()->get();
        return view('admin.history.index', compact('histories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $history)
    {
        $order = Order::findOrFail($history);
        return view('admin.history.show', compact('order'));
    }

}
