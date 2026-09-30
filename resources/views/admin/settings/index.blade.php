<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Toko - Admin Belleza</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-slate-900 text-white flex flex-col justify-between p-4 shrink-0 min-h-screen">
            <div>
                <!-- Brand Logo -->
                <div class="flex items-center gap-3 px-3 py-4 border-b border-slate-800/80">
                    <div class="bg-gradient-to-tr from-pink-600 to-rose-400 text-white font-black rounded-xl w-10 h-10 flex items-center justify-center text-xl shadow-lg shadow-pink-500/30">
                        B
                    </div>
                    <div>
                        <h2 class="font-extrabold text-sm tracking-wider">BELLEZA</h2>
                        <p class="text-[11px] text-pink-400 font-medium">Boutique Admin</p>
                    </div>
                </div>

                <!-- Menu Item -->
                <nav class="mt-6 space-y-1.5">
                    <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800/60 rounded-xl text-xs font-semibold transition-all">
                        <i class="fa-solid fa-chart-pie w-5 text-base"></i> Dashboard
                    </a>
                    <a href="/admin/products" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800/60 rounded-xl text-xs font-semibold transition-all">
                        <i class="fa-solid fa-boxes-stacked w-5 text-base"></i> Kelola Produk
                    </a>
                    <a href="/admin/categories" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800/60 rounded-xl text-xs font-semibold transition-all">
                        <i class="fa-solid fa-tags w-5 text-base"></i> Kategori
                    </a>
                    <a href="/admin/orders" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800/60 rounded-xl text-xs font-semibold transition-all">
                        <i class="fa-solid fa-bag-shopping w-5 text-base"></i> Pesanan
                    </a>
                    <a href="/admin/customers" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800/60 rounded-xl text-xs font-semibold transition-all">
                        <i class="fa-solid fa-users w-5 text-base"></i> Pelanggan
                    </a>
                    <a href="/admin/settings" class="flex items-center gap-3 px-4 py-3 bg-gradient-to-r from-pink-600 to-rose-500 text-white rounded-xl text-xs font-semibold shadow-lg shadow-pink-600/30">
                        <i class="fa-solid fa-sliders w-5 text-base"></i> Pengaturan
                    </a>
                </nav>
            </div>

            <div class="border-t border-slate-800/80 pt-4">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-xl text-xs font-semibold transition-all">
                        <i class="fa-solid fa-arrow-right-from-bracket w-5 text-base"></i> Keluar Sistem
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-8 overflow-y-auto">
            
            <!-- Header Bar -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Pengaturan Sistem</h1>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Kelola konfigurasi umum toko, kontak WhatsApp, dan keamanan akun admin.</p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="bg-white px-4 py-2 rounded-2xl shadow-sm border border-slate-200/80 flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-xs font-bold text-slate-800">Admin Dear</p>
                            <p class="text-[10px] text-pink-600 font-semibold">Super Administrator</p>
                        </div>
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-pink-500 to-rose-400 text-white flex items-center justify-center font-bold text-xs shadow-sm">
                            A
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Container -->
            <form action="#" method="POST" class="space-y-6">
                @csrf

                <!-- Section 1: Profil Toko & Kontak WA -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/80">
                    <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-100">
                        <div class="w-10 h-10 bg-pink-50 text-pink-600 rounded-2xl flex items-center justify-center font-bold text-base">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-slate-800">Informasi Toko & WhatsApp</h3>
                            <p class="text-xs text-slate-400">Identitas utama toko yang akan ditampilkan di Landing Page dan WhatsApp.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2">Nama Toko / Brand</label>
                            <input type="text" name="shop_name" value="Belleza Collection" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-pink-500 focus:bg-white outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2">Nomor WhatsApp Admin (Order)</label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-2.5 text-xs font-bold text-slate-400"><i class="fa-brands fa-whatsapp text-emerald-500"></i></span>
                                <input type="text" name="shop_phone" value="6282294571789" class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-pink-500 focus:bg-white outline-none transition-all" placeholder="Contoh: 6282294571789">
                            </div>
                            <p class="text-[10px] text-slate-400 mt-1">Nomor tersimpan: **082294571789** (Diawali `62` untuk integrasi WA).</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-700 mb-2">Slogan / Deskripsi Singkat Toko</label>
                            <input type="text" name="shop_tagline" value="Pilihan Fashion Baju Wanita Elegan, Kekinian & Berkualitas." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-pink-500 focus:bg-white outline-none transition-all">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-700 mb-2">Alamat Fisik / Operasional Toko</label>
                            <textarea name="shop_address" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-pink-500 focus:bg-white outline-none transition-all">Jl. Fashion Boulevard No. 123, Medan, Sumatera Utara</textarea>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Keamanan Akun Admin -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/80">
                    <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-100">
                        <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center font-bold text-base">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-slate-800">Keamanan Akun Admin</h3>
                            <p class="text-xs text-slate-400">Ubah email dan kata sandi masuk ke Panel Admin.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2">Email Admin</label>
                            <input type="email" name="email" value="admin@belleza.com" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-pink-500 focus:bg-white outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2">Password Baru (Opsional)</label>
                            <input type="password" name="password" placeholder="Kosongkan jika tidak ingin diubah" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-pink-500 focus:bg-white outline-none transition-all">
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="flex justify-end gap-3">
                    <button type="reset" class="px-6 py-3 bg-white hover:bg-slate-100 text-slate-600 rounded-xl text-xs font-bold border border-slate-200 transition">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-pink-600 to-rose-500 hover:opacity-90 text-white rounded-xl text-xs font-bold shadow-lg shadow-pink-600/30 transition flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                </div>
            </form>

        </main>
    </div>

</body>
</html>