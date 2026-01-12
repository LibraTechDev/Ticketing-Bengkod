<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Kategori::select('id', 'nama')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $payload = $request->validate([
                'nama' => 'required|string|max:255|unique:kategoris,nama',
            ]);
            if (!isset($payload['nama'])) {
                return redirect()->route('categories.index')->with('error', 'Nama kategori wajib diisi.');
            }
            Kategori::create([
                'nama' => $payload['nama'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menambahkan kategori: ' . $e->getMessage()]);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $payload = $request->validate([
                'nama' => 'required|string|max:255|unique:kategoris,nama,' . $id,
            ]);
            if (!isset($payload['nama'])) {
                return redirect()->route('categories.index')->with('error', 'Nama kategori wajib diisi.');
            }
            $category = Kategori::findOrFail($id);
            $category->update([
                'nama' => $payload['nama'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui kategori: ' . $e->getMessage()]);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Kategori::findOrFail($id);
            $category->delete();

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'Kategori tidak ditemukan.']);
        }
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}