<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        // Validasi input data dari form pengaturan
        $request->validate([
            'shop_name'    => 'nullable|string|max:255',
            'shop_phone'   => 'nullable|string|max:50',
            'shop_tagline' => 'nullable|string|max:255',
            'shop_address' => 'nullable|string',
            'email'        => 'nullable|email|max:255',
            'password'     => 'nullable|string|min:6',
        ]);

        // Simpan atau proses logika pembaruan data di sini jika menggunakan database/model
        // Contoh: Setting::updateOrCreate([...]);

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}