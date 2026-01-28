<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Lokasi::select('id', 'nama_lokasi')->get();
        return view('admin.lokasi.index', compact('location'));
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
                'nama_lokasi' => 'required|string|max:255|unique:Lokasis,nama_lokasi',
            ]);
            if (!isset($payload['nama_lokasi'])) {
                return redirect()->route('location.index')->with('error', 'Nama Lokasi wajib diisi.');
            }
            Lokasi::create([
                'nama_lokasi' => $payload['nama_lokasi'],
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menambahkan Lokasi: ' . $e->getMessage()]);
        }

        return redirect()->route('admin.location.index')->with('success', 'Lokasi berhasil ditambahkan.');
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
                'nama_lokasi' => 'required|string|max:255|unique:Lokasis,nama_lokasi,' . $id,
            ]);
            if (!isset($payload['nama_lokasi'])) {
                return redirect()->route('location.index')->with('error', 'Nama Lokasi wajib diisi.');
            }
            $lokasi = Lokasi::findOrFail($id);
            $lokasi->update([
                'nama_lokasi' => $payload['nama_lokasi'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui Lokasi: ' . $e->getMessage()]);
        }

        return redirect()->route('admin.location.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $lokasi = Lokasi::findOrFail($id);
            $lokasi->delete();

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'Lokasi tidak ditemukan.']);
        }
        return redirect()->route('admin.location.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}