<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belleza Boutique Admin - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-slate-50 font-sans antialiased">

    <div class="flex min-h-screen">
        <!-- Sidebar Navigation (Dipercantik dengan Gradien, Glow & Border Pink) -->
        <aside class="w-64 bg-gradient-to-b from-slate-900 via-slate-900 to-pink-950/80 text-white flex flex-col justify-between p-6 shrink-0 border-r border-pink-500/20 shadow-2xl relative">
            <div>
                <!-- Brand Logo dengan Efek Glow -->
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-10 h-10 bg-gradient-to-tr from-pink-600 to-rose-400 rounded-2xl flex items-center justify-center font-extrabold text-xl shadow-lg shadow-pink-500/50 ring-2 ring-pink-400/30">
                        B
                    </div>
                    <div>
                        <h1 class="font-extrabold text-lg tracking-wider bg-gradient-to-r from-white via-pink-100 to-pink-300 bg-clip-text text-transparent leading-tight">BELLEZA</h1>
                        <p class="text-[10px] text-pink-300/70 font-semibold tracking-wide">BOUTIQUE ADMIN</p>
                    </div>
                </div>

                <!-- Navigation Links dengan Efek Aktif Vibrant -->
                <nav class="space-y-2.5 text-sm font-medium">
                    <a href="/admin/dashboard" class="flex items-center gap-3.5 px-4 py-3 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-xl shadow-lg shadow-pink-500/40 font-semibold transition-all duration-300 ring-1 ring-white/20">
                        <i class="fas fa-chart-pie w-5 text-base drop-shadow"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/admin/products" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-boxes-stacked w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Kelola Produk</span>
                    </a>
                    <a href="/admin/categories" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-tags w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Kategori</span>
                    </a>
                    <a href="/admin/orders" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-shopping-bag w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Pesanan</span>
                    </a>
                    <a href="/admin/customers" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-users w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Pelanggan</span>
                    </a>
                    <a href="/admin/settings" class="flex items-center gap-3.5 px-4 py-3 text-slate-300 hover:text-white hover:bg-white/10 hover:translate-x-1 rounded-xl transition-all duration-200 group">
                        <i class="fas fa-sliders w-5 text-slate-400 group-hover:text-pink-400 transition-colors"></i>
                        <span>Pengaturan</span>
                    </a>
                </nav>
            </div>

            <!-- Logout Button -->
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-pink-300 hover:bg-pink-500/10 rounded-xl transition-all text-sm font-medium border border-transparent hover:border-pink-500/20">
                    <i class="fas fa-right-from-bracket w-5"></i>
                    <span>Keluar Sistem</span>
                </button>
            </form>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-8 overflow-y-auto">
            
            <!-- Hero Welcome Banner (Kolom Gede Warna Mewah) -->
            <div class="relative overflow-hidden bg-gradient-to-r from-pink-600 via-rose-500 to-fuchsia-600 rounded-3xl p-8 mb-8 text-white shadow-xl shadow-pink-500/20 border border-white/20">
                <!-- Elemen Aksesori Lingkaran Glow di Background -->
                <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute right-40 -top-10 w-40 h-40 bg-fuchsia-400/20 rounded-full blur-xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold mb-3 border border-white/30 text-pink-50">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span> Panel Admin Online
                        </div>
                        <h2 class="text-3xl font-black tracking-tight text-white flex items-center gap-3">
                            Selamat Datang, Admin Belleza <span class="animate-bounce inline-block">👋</span>
                        </h2>
                        <p class="text-pink-100 text-sm mt-2 max-w-xl font-medium leading-relaxed">
                            Ringkasan performa penjualan dan statistik katalog toko kamu hari ini. Cek pesanan masuk dan atur produkmu dengan mudah!
                        </p>
                    </div>

                    <!-- Profil & Notifikasi Versi Glassmorphism -->
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

            <!-- Metric Cards (Warna Terang, Vibrant, & Pop-Out) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- 1. Total Omzet (Pink-Rose Vibrant) -->
                <div class="bg-gradient-to-br from-pink-100 via-rose-100 to-pink-50 p-6 rounded-2xl shadow-md shadow-pink-100/50 border border-pink-300 border-l-4 border-l-pink-500 flex items-center justify-between transition-all hover:-translate-y-1">
                    <div>
                        <p class="text-[11px] font-extrabold text-pink-700 uppercase tracking-wider">Total Omzet</p>
                        <h3 class="text-2xl font-black text-slate-900 mt-1">Rp {{ number_format($totalOmzet ?? 0, 0, ',', '.') }}</h3>
                        <p class="text-xs text-emerald-600 font-bold mt-1.5 flex items-center gap-1"><i class="fas fa-arrow-up text-[10px]"></i> Real-time</p>
                    </div>
                    <div class="w-12 h-12 bg-white text-pink-600 rounded-2xl flex items-center justify-center text-xl shadow-md shadow-pink-200 ring-2 ring-pink-200">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>

                <!-- 2. Total Pesanan (Fuchsia-Purple Vibrant) -->
                <div class="bg-gradient-to-br from-purple-100 via-fuchsia-100 to-purple-50 p-6 rounded-2xl shadow-md shadow-purple-100/50 border border-purple-300 border-l-4 border-l-purple-500 flex items-center justify-between transition-all hover:-translate-y-1">
                    <div>
                        <p class="text-[11px] font-extrabold text-purple-700 uppercase tracking-wider">Total Pesanan</p>
                        <h3 class="text-2xl font-black text-slate-900 mt-1">{{ number_format($totalPesanan ?? 0) }}</h3>
                        <p class="text-xs text-emerald-600 font-bold mt-1.5 flex items-center gap-1"><i class="fas fa-arrow-up text-[10px]"></i> Real-time</p>
                    </div>
                    <div class="w-12 h-12 bg-white text-purple-600 rounded-2xl flex items-center justify-center text-xl shadow-md shadow-purple-200 ring-2 ring-purple-200">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                </div>

                <!-- 3. Katalog Produk (Cyan-Sky Blue Terang) -->
                <div class="bg-gradient-to-br from-sky-100 via-cyan-100 to-sky-50 p-6 rounded-2xl shadow-md shadow-sky-100/50 border border-sky-300 border-l-4 border-l-sky-500 flex items-center justify-between transition-all hover:-translate-y-1">
                    <div>
                        <p class="text-[11px] font-extrabold text-sky-700 uppercase tracking-wider">Katalog Produk</p>
                        <h3 class="text-2xl font-black text-slate-900 mt-1">{{ number_format($katalogProduk ?? 0) }}</h3>
                        <p class="text-xs text-sky-700 font-bold mt-1.5">Aktif di storefront</p>
                    </div>
                    <div class="w-12 h-12 bg-white text-sky-600 rounded-2xl flex items-center justify-center text-xl shadow-md shadow-sky-200 ring-2 ring-sky-200">
                        <i class="fas fa-shirt"></i>
                    </div>
                </div>

                <!-- 4. Total Pelanggan (Amber-Yellow Terang) -->
                <div class="bg-gradient-to-br from-amber-100 via-yellow-100 to-amber-50 p-6 rounded-2xl shadow-md shadow-amber-100/50 border border-amber-300 border-l-4 border-l-amber-500 flex items-center justify-between transition-all hover:-translate-y-1">
                    <div>
                        <p class="text-[11px] font-extrabold text-amber-800 uppercase tracking-wider">Total Pelanggan</p>
                        <h3 class="text-2xl font-black text-slate-900 mt-1">{{ number_format($totalPelanggan ?? 0) }}</h3>
                        <p class="text-xs text-emerald-600 font-bold mt-1.5 flex items-center gap-1"><i class="fas fa-arrow-up text-[10px]"></i> Pelanggan unik</p>
                    </div>
                    <div class="w-12 h-12 bg-white text-amber-600 rounded-2xl flex items-center justify-center text-xl shadow-md shadow-amber-200 ring-2 ring-amber-200">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <div class="mb-6">
                        <h3 class="text-base font-bold text-slate-800">Grafik Penjualan</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Performa statistik penjualan tahun {{ date('Y') }}</p>
                    </div>
                    <div class="h-64">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <h3 class="text-base font-bold text-slate-800 mb-0.5">Kategori Terlaris</h3>
                    <p class="text-xs text-slate-400 mb-6">Persentase barang diminati</p>
                    <div class="h-64 flex items-center justify-center">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                    <div>
                        <h3 class="text-base font-bold text-slate-800">Transaksi Terbaru</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Daftar pesanan masuk dari pembeli</p>
                    </div>
                    <a href="/admin/orders" class="text-xs font-bold text-pink-500 hover:text-pink-600 transition-colors">Lihat Semua →</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-600">
                        <thead class="bg-slate-50 border-b border-slate-100 text-slate-400 uppercase font-semibold">
                            <tr>
                                <th class="p-4">ID Transaksi</th>
                                <th class="p-4">Pelanggan</th>
                                <th class="p-4">Produk</th>
                                <th class="p-4">Total</th>
                                <th class="p-4">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($recentOrders ?? [] as $index => $order)
                                @php
                                    $price = is_array($order) ? $order['price'] : $order->price;
                                    $qty = is_array($order) ? $order['qty'] : $order->qty;
                                    $total = $price * $qty;
                                    $name = is_array($order) ? $order['customer_name'] : $order->customer_name;
                                    $product = is_array($order) ? $order['product_name'] : $order->product_name;
                                    $createdAt = is_array($order) ? $order['created_at'] : $order->created_at;
                                @endphp
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="p-4 font-semibold text-slate-800">#TRX-00{{ $order->id ?? ($index + 1) }}</td>
                                    <td class="p-4 font-medium">{{ $name }}</td>
                                    <td class="p-4">{{ $product }} ({{ $qty }}x)</td>
                                    <td class="p-4 font-bold text-pink-600">Rp {{ number_format($total, 0, ',', '.') }}</td>
                                    <td class="p-4 text-slate-400">{{ $createdAt ? \Carbon\Carbon::parse($createdAt)->format('d M Y, H:i') : '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-slate-400 py-8">Belum ada transaksi masuk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts for Charts -->
    <script>
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Omzet Penjualan (Rp)',
                    data: @json($monthlySales ?? array_fill(0, 12, 0)),
                    borderColor: '#ec4899',
                    backgroundColor: 'rgba(236, 72, 153, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 4,
                    pointBackgroundColor: '#ec4899'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true,
                        grid: { borderDash: [4, 4] }, 
                        ticks: { 
                            font: { size: 10 },
                            callback: function(value) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        } 
                    },
                    x: { grid: { display: false }, ticks: { font: { size: 10 } } }
                }
            }
        });

        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Sepatu', 'Tas', 'Sandal', 'Aksesoris'],
                datasets: [{
                    data: [40, 30, 20, 10],
                    backgroundColor: ['#ec4899', '#a855f7', '#06b6d4', '#f59e0b'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 10 } } } }
            }
        });
    </script>
</body>
</html>