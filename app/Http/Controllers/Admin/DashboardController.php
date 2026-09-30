<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Default nilai jika data belum tersedia
        $totalOmzet     = 0;
        $totalPesanan   = 0;
        $totalPelanggan = 0;
        $katalogProduk  = 0;
        $recentOrders   = collect([]);
        $monthlySales   = array_fill(0, 12, 0);

        try {
            if (Schema::hasTable('orders')) {
                // Menghitung Total Omzet dari perkalian price * qty
                $totalOmzet     = Order::sum(DB::raw('price * qty')) ?? 0;
                $totalPesanan   = Order::count();
                $totalPelanggan = Order::distinct('customer_phone')->count('customer_phone');
                $recentOrders   = Order::latest()->take(5)->get();

                // Mengambil Total Penjualan per Bulan dalam Rupiah penuh
                for ($month = 1; $month <= 12; $month++) {
                    $sum = Order::whereYear('created_at', date('Y'))
                        ->whereMonth('created_at', $month)
                        ->sum(DB::raw('price * qty'));

                    $monthlySales[$month - 1] = (float) ($sum ?? 0);
                }
            }
        } catch (\Exception $e) {
            // Biarkan menggunakan nilai default jika terjadi exception
        }

        try {
            if (Schema::hasTable('products')) {
                $katalogProduk = Product::count();
            }
        } catch (\Exception $e) {
            // Biarkan menggunakan nilai default jika terjadi exception
        }

        return view('admin.dashboard', compact(
            'totalOmzet',
            'totalPesanan',
            'katalogProduk',
            'totalPelanggan',
            'recentOrders',
            'monthlySales'
        ));
    }
}