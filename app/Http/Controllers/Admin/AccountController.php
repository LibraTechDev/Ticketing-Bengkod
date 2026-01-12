<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Update the user profile information.
     */
    public function update(Request $request)
    {
        try {
            $user = auth()->user();

            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'no_hp' => ['nullable', 'string', 'max:20'],
            ]);

            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->no_hp = $validatedData['no_hp'];

            $user->save();

            return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Gagal memperbarui profil: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Update the user password.
     */
    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $user = auth()->user();

            $user->update([
                'password' => Hash::make($validatedData['password'])
            ]);

            return redirect()->route('admin.profile.index')
                ->with('success', 'Password berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan server: ' . $e->getMessage());
        }
    }
}
