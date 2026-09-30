<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'product_name'     => 'required|string',
            'price'            => 'required|numeric',
            'customer_name'    => 'required|string',
            'customer_phone'   => 'required|string',
            'qty'              => 'required|integer|min:1',
            'customer_address' => 'required|string',
        ]);

        // 1. Simpan data ke Database
        Order::create($validated);

        // 2. Tentukan nomor WA Admin (Misal: 082294571789)
        $rawPhone = "082294571789"; 

        // Bersihkan nomor dari karakter non-angka
        $phoneAdmin = preg_replace('/[^0-9]/', '', $rawPhone);

        // Ubah awalan 0 menjadi 62
        if (str_starts_with($phoneAdmin, '0')) {
            $phoneAdmin = '62' . substr($phoneAdmin, 1);
        }

        $totalHarga = number_format($validated['price'] * $validated['qty'], 0, ',', '.');
        
        // 3. Susun pesan WhatsApp
        $message  = "Halo Admin Belleza Collection,\n\n";
        $message .= "Saya ingin mengonfirmasi pesanan baru:\n";
        $message .= "- Produk: " . $validated['product_name'] . "\n";
        $message .= "- Jumlah: " . $validated['qty'] . " pcs\n";
        $message .= "- Total: Rp " . $totalHarga . "\n\n";
        $message .= "Data Pembeli:\n";
        $message .= "- Nama: " . $validated['customer_name'] . "\n";
        $message .= "- WA: " . $validated['customer_phone'] . "\n";
        $message .= "- Alamat: " . $validated['customer_address'] . "\n\n";
        $message .= "Mohon diproses ya, terima kasih!";

        // 4. Redirect menggunakan URL standar api.whatsapp.com
        $targetUrl = "https://api.whatsapp.com/send?phone=" . $phoneAdmin . "&text=" . urlencode($message);

        return redirect()->away($targetUrl);
    }
}