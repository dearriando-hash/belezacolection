<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil data admin yang sedang login untuk ditampilkan di form
        $user = Auth::user();
        return view('admin.settings.index', compact('user'));
    }

    public function update(Request $request)
    {
        // 1. Validasi input data dari form pengaturan
        $request->validate([
            'shop_name'    => 'nullable|string|max:255',
            'shop_phone'   => 'nullable|string|max:50',
            'shop_tagline' => 'nullable|string|max:255',
            'shop_address' => 'nullable|string',
            'email'        => 'required|email|max:255',
            'password'     => 'nullable|string|min:6',
        ]);

        // 2. Simpan/Update data ke tabel users (untuk akun admin aktif)
        $user = Auth::user();
        if ($user) {
            $user->email = $request->email;

            // Jika kolom password diisi, lakukan update password
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();
        }

        // 3. Kembali ke halaman pengaturan dengan pesan sukses
        return redirect()->back()->with('success', 'Perubahan berhasil disimpan!');
    }
}