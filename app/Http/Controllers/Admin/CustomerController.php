<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class CustomerController extends Controller
{
    /**
     * Menampilkan daftar pelanggan dari riwayat pesanan
     */
    public function index()
    {
        // Ambil data pelanggan unik berdasarkan customer_phone / customer_name
        $customers = Order::select('customer_name', 'customer_phone', 'customer_address')
            ->selectRaw('COUNT(*) as total_orders')
            ->selectRaw('MAX(created_at) as last_order')
            ->groupBy('customer_name', 'customer_phone', 'customer_address')
            ->latest('last_order')
            ->get();

        // Pastikan variabel $customers dikirim ke view via compact
        return view('admin.customers.index', compact('customers'));
    }
}