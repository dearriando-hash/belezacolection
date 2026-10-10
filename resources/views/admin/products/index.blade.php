<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belleza Boutique Admin - Kelola Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">

    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-gradient-to-b from-slate-900 via-slate-900 to-pink-950/80 text-white flex flex-col justify-between p-6 shrink-0 border-r border-pink-500/20 shadow-2xl relative">
            <div>
                <!-- Brand Logo -->
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-10 h-10 bg-gradient-to-tr from-pink-600 to-rose-400 rounded-2xl flex items-center justify-center font-extrabold text-xl shadow-lg shadow-pink-500/50 ring-2 ring-pink-400/30">
                        B
                    </div>
                    <div>
                        <h1 class="font-extrabold text-lg tracking-wider bg-gradient-to-r from-white via-pink-100 to-pink-300 bg-clip-text text-transparent leading-tight">BELLEZA</h1>
                        <p class="text-[10px] text-pink-300/70 font-semibold tracking-wide">BOUTIQUE ADMIN</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="space-y-2.5 text-sm font-medium">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-chart-pie w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Dashboard</span>
                    </a>
                    <!-- Kelola Produk (State Aktif) -->
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3.5 px-4 py-3 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl shadow-lg shadow-pink-500/40 font-semibold transition-all duration-300 ring-1 ring-white/20">
                        <i class="fas fa-boxes-stacked w-5 text-base drop-shadow"></i>
                        <span>Kelola Produk</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-tags w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Kategori</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-shopping-bag w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Pesanan</span>
                    </a>
                    <a href="{{ route('admin.customers.index') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-users w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Pelanggan</span>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-sliders w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Pengaturan</span>
                    </a>
                </nav>
            </div>

            <!-- Logout Button -->
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-pink-300 hover:bg-pink-500/10 rounded-xl transition-all text-sm font-medium border border-transparent hover:border-pink-500/20">
                    <i class="fas fa-right-from-bracket w-5"></i>
                    <span>Keluar Sistem</span>
                </button>
            </form>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-8 overflow-y-auto">
            
            <!-- Hero Header Banner -->
            <div class="relative overflow-hidden bg-gradient-to-r from-pink-600 via-rose-500 to-fuchsia-600 rounded-3xl p-8 mb-8 text-white shadow-xl shadow-pink-500/20 border border-white/20">
                <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute right-40 -top-10 w-40 h-40 bg-fuchsia-400/20 rounded-full blur-xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold mb-3 border border-white/30 text-pink-50">
                            <i class="fas fa-boxes-stacked text-xs"></i> Manajemen Katalog
                        </div>
                        <h2 class="text-3xl font-black tracking-tight text-white flex items-center gap-3">
                            Kelola Produk 🛍️
                        </h2>
                        <p class="text-pink-100 text-sm mt-2 max-w-xl font-medium leading-relaxed">
                            Tambah, edit, dan atur daftar stok produk busana toko kamu dengan cepat dan terorganisir.
                        </p>
                    </div>

                    <!-- Profil Ringkas -->
                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur-md p-2.5 pr-5 rounded-2xl border border-white/20 shadow-inner">
                        <button class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-xl flex items-center justify-center text-white transition-all relative">
                            <i class="far fa-bell text-lg"></i>
                            <span class="w-2.5 h-2.5 bg-amber-300 rounded-full absolute top-2 right-2 ring-2 ring-rose-500"></span>
                        </button>
                        <div class="h-8 w-[1px] bg-white/20"></div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white text-pink-600 rounded-xl flex items-center justify-center font-extrabold text-base shadow-md">
                                A
                            </div>
                            <div class="text-left">
                                <p class="text-xs font-bold text-white leading-tight">Admin Belleza</p>
                                <p class="text-[10px] text-pink-200 font-medium">Super Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flash Session Success Alert -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 text-xs font-semibold rounded-2xl flex items-center gap-3 shadow-sm">
                    <i class="fas fa-check-circle text-base text-emerald-500"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Table Card -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">Daftar Produk</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Total item tersedia di katalog online</p>
                    </div>
                    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl font-bold text-xs shadow-lg shadow-pink-500/30 hover:shadow-pink-500/50 hover:opacity-95 transition-all">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Produk Baru</span>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-600 border-collapse">
                        <thead class="bg-slate-50/80 border-b border-slate-100 text-slate-400 uppercase font-semibold">
                            <tr>
                                <th class="p-4 pl-6">Produk</th>
                                <th class="p-4">Kategori</th>
                                <th class="p-4">Harga</th>
                                <th class="p-4">Stok</th>
                                <th class="p-4 text-center pr-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium">
                            @forelse($products as $product)
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <td class="p-4 pl-6">
                                        <div class="flex items-center gap-3">
                                            @if($product->image)
                                               <img src="{{ asset($product->image) }}" class="w-12 h-12 object-cover rounded-xl border border-slate-200 shadow-sm">
                                            @else
                                                <div class="w-12 h-12 bg-slate-100 rounded-xl border border-slate-200 flex items-center justify-center text-slate-400 shadow-sm">
                                                    <i class="fas fa-image text-lg"></i>
                                                </div>
                                            @endif
                                            <span class="font-bold text-slate-800 text-sm capitalize">{{ $product->name }}</span>
                                        </div>
                                    </td>
                                    <td class="p-4 font-medium text-slate-600 capitalize">
                                        {{ $product->category->name ?? $product->category }}
                                    </td>
                                    <td class="p-4 font-bold text-slate-800">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="p-4">
                                        @if(($product->stock ?? 0) > 0)
                                            <span class="inline-flex items-center px-3 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200 font-bold text-[11px] rounded-full">
                                                {{ $product->stock }} item
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 bg-rose-50 text-rose-500 border border-rose-200 font-bold text-[11px] rounded-full">
                                                0 item
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-4 pr-6 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="w-8 h-8 rounded-lg border border-slate-200 flex items-center justify-center text-slate-500 hover:text-pink-600 hover:border-pink-300 hover:bg-pink-50 transition-all" title="Edit Produk">
                                                <i class="far fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-8 h-8 rounded-lg border border-slate-200 flex items-center justify-center text-slate-500 hover:text-rose-600 hover:border-rose-300 hover:bg-rose-50 transition-all" title="Hapus Produk">
                                                    <i class="far fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center text-slate-400 font-medium">
                                        <div class="max-w-xs mx-auto">
                                            <i class="fas fa-box-open text-3xl mb-3 text-slate-300"></i>
                                            <p>Belum ada produk. Klik tombol "Tambah Produk Baru" untuk menambahkan.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>