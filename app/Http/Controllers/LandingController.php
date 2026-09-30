<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // Link Akun Toko (WhatsApp, Shopee, TikTok)
        $socialLinks = [
            'whatsapp' => 'https://wa.me/6281234567890?text=Halo%20Belleza%20Collection,%20saya%20ingin%20bertanya%20produk',
            'shopee'   => 'https://shopee.co.id/bellezacollection',
            'tiktok'   => 'https://tiktok.com/@bellezacollection',
        ];

        // Ambil data semua kategori dari database
        $categories = Category::all();

        // Ambil query filter kategori dari URL (jika ada)
        $category = $request->query('category');

        // Query mengambil data produk langsung dari database MySQL
        $query = Product::latest();

        if ($category) {
            $query->where('category', $category);
        }

        $products = $query->get();

        return view('landing', compact('products', 'categories', 'socialLinks'));
    }
}