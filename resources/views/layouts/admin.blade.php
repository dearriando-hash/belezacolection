<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Belleza Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between shadow-2xl z-20">
            <div>
                <div class="p-6 border-b border-slate-800 flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-tr from-pink-500 to-rose-400 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-pink-500/30">
                        B
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white tracking-wider">BELLEZA</h1>
                        <p class="text-xs text-slate-500 font-medium">Boutique Admin</p>
                    </div>
                </div>

                <nav class="p-4 space-y-1">
                    
                    <!-- KELOMPOK: UTAMA -->
                    <div class="px-3 pt-2 pb-1 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                        UTAMA
                    </div>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center space-x-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-pink-600 to-rose-500 text-white font-medium shadow-md shadow-pink-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition group' }}">
                        <i class="fas fa-chart-pie w-5 {{ request()->routeIs('admin.dashboard') ? '' : 'text-slate-500 group-hover:text-pink-400' }}"></i>
                        <span>Dashboard</span>
                    </a>

                    <!-- KELOMPOK: KATALOG -->
                    <div class="px-3 pt-4 pb-1 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                        KATALOG
                    </div>
                    <a href="{{ route('admin.products.index') }}" 
                       class="flex items-center space-x-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.products.*') ? 'bg-gradient-to-r from-pink-600 to-rose-500 text-white font-medium shadow-md shadow-pink-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition group' }}">
                        <i class="fas fa-boxes-stacked w-5 {{ request()->routeIs('admin.products.*') ? '' : 'text-slate-500 group-hover:text-pink-400' }}"></i>
                        <span>Kelola Produk</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" 
                       class="flex items-center space-x-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-pink-600 to-rose-500 text-white font-medium shadow-md shadow-pink-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition group' }}">
                        <i class="fas fa-tags w-5 {{ request()->routeIs('admin.categories.*') ? '' : 'text-slate-500 group-hover:text-pink-400' }}"></i>
                        <span>Kategori</span>
                    </a>

                    <!-- KELOMPOK: TRANSAKSI -->
                    <div class="px-3 pt-4 pb-1 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                        TRANSAKSI
                    </div>
                    <a href="{{ route('admin.orders.index') }}" 
                       class="flex items-center space-x-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.orders.*') ? 'bg-gradient-to-r from-pink-600 to-rose-500 text-white font-medium shadow-md shadow-pink-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition group' }}">
                        <i class="fas fa-shopping-bag w-5 {{ request()->routeIs('admin.orders.*') ? '' : 'text-slate-500 group-hover:text-pink-400' }}"></i>
                        <span>Pesanan</span>
                    </a>
                    <a href="{{ route('admin.customers.index') }}" 
                       class="flex items-center space-x-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.customers.*') ? 'bg-gradient-to-r from-pink-600 to-rose-500 text-white font-medium shadow-md shadow-pink-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition group' }}">
                        <i class="fas fa-users w-5 {{ request()->routeIs('admin.customers.*') ? '' : 'text-slate-500 group-hover:text-pink-400' }}"></i>
                        <span>Pelanggan</span>
                    </a>

                    <!-- KELOMPOK: SISTEM -->
                    <div class="px-3 pt-4 pb-1 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                        SISTEM
                    </div>
                    <a href="{{ route('admin.settings.index') }}" 
                       class="flex items-center space-x-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-pink-600 to-rose-500 text-white font-medium shadow-md shadow-pink-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition group' }}">
                        <i class="fas fa-sliders w-5 {{ request()->routeIs('admin.settings.*') ? '' : 'text-slate-500 group-hover:text-pink-400' }}"></i>
                        <span>Pengaturan</span>
                    </a>
                </nav>
            </div>
<!-- Logout Link -->
<div class="border-t border-slate-800 pt-4">
    <a href="{{ route('admin.logout') }}" class="w-full flex items-center gap-3 px-4 py-2.5 text-rose-400 hover:bg-rose-500/10 rounded-xl text-sm font-medium transition">
        <i class="fa-solid fa-right-from-bracket w-5"></i>
        <span>Keluar Sistem</span>
    </a>
</div>

    @stack('scripts')
</body>
</html>