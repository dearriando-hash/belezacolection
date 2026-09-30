<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Admin Belleza</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-slate-900 text-white flex flex-col justify-between p-4 min-h-screen">
            <div>
                <div class="flex items-center gap-3 px-3 py-4 border-b border-slate-800">
                    <div class="bg-pink-600 text-white font-bold rounded-xl w-10 h-10 flex items-center justify-center text-lg">B</div>
                    <div>
                        <h2 class="font-bold text-sm tracking-wide">BELLEZA</h2>
                        <p class="text-xs text-slate-400">Boutique Admin</p>
                    </div>
                </div>

                <nav class="mt-6 space-y-1">
                    <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl text-sm font-medium transition">
                        <i class="fa-solid fa-chart-pie w-5"></i> Dashboard
                    </a>
                    <a href="/admin/products" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl text-sm font-medium transition">
                        <i class="fa-solid fa-boxes-stacked w-5"></i> Kelola Produk
                    </a>
                    <a href="/admin/categories" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl text-sm font-medium transition">
                        <i class="fa-solid fa-tags w-5"></i> Kategori
                    </a>
                    <a href="/admin/orders" class="flex items-center gap-3 px-4 py-3 bg-pink-600 text-white rounded-xl text-sm font-medium shadow-lg shadow-pink-600/30">
                        <i class="fa-solid fa-bag-shopping w-5"></i> Pesanan
                    </a>
                    <a href="/admin/customers" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl text-sm font-medium transition">
                        <i class="fa-solid fa-users w-5"></i> Pelanggan
                    </a>
                    <a href="/admin/settings" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl text-sm font-medium transition">
                        <i class="fa-solid fa-sliders w-5"></i> Pengaturan
                    </a>
                </nav>
            </div>

            <div class="border-t border-slate-800 pt-4">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-xl text-sm font-medium transition">
                        <i class="fa-solid fa-arrow-right-from-bracket w-5"></i> Keluar Sistem
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-8">
            <!-- Header Bar -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Selamat Datang, Admin Belleza 👋</h1>
                    <p class="text-sm text-gray-500">Ringkasan performa penjualan dan statistik katalog toko kamu.</p>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Tombol Lonceng Notifikasi -->
                    <button class="relative bg-white p-2.5 rounded-2xl shadow-sm border border-gray-100 text-slate-500 hover:bg-gray-50 transition">
                        <i class="fa-regular fa-bell text-base"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-pink-500 rounded-full"></span>
                    </button>
                    <!-- Profil Admin -->
                    <div class="bg-white px-3.5 py-1.5 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs">
                            A
                        </div>
                        <div class="text-left">
                            <p class="text-xs font-bold text-gray-800 leading-tight">Admin Belleza</p>
                            <p class="text-[10px] text-gray-400 font-medium">Super Administrator</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Kartu Statistik (4 Kolom dengan Warna Berbeda) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                
                <!-- 1. Total Omzet (Hijau) -->
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Total Omzet</p>
                        @php
                            $omzet = 0;
                            foreach($orders as $o) {
                                $p = is_array($o) ? $o['price'] : $o->price;
                                $q = is_array($o) ? $o['qty'] : $o->qty;
                                $omzet += ($p * $q);
                            }
                        @endphp
                        <h3 class="text-xl font-extrabold text-gray-900 mt-1">Rp {{ number_format($omzet, 0, ',', '.') }}</h3>
                        <p class="text-xs font-semibold text-emerald-600 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-arrow-up text-[10px]"></i> Real-time
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-emerald-100/60 text-emerald-600 rounded-2xl flex items-center justify-center text-lg">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                </div>

                <!-- 2. Total Pesanan (Pink) -->
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Total Pesanan</p>
                        <h3 class="text-xl font-extrabold text-gray-900 mt-1">{{ count($orders) }}</h3>
                        <p class="text-xs font-semibold text-emerald-600 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-arrow-up text-[10px]"></i> Real-time
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-pink-100/60 text-pink-600 rounded-2xl flex items-center justify-center text-lg">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                </div>

                <!-- 3. Katalog Produk (Ungu) -->
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Katalog Produk</p>
                        <h3 class="text-xl font-extrabold text-gray-900 mt-1">2</h3>
                        <p class="text-xs font-medium text-gray-400 mt-1">
                            Aktif di storefront
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-indigo-100/60 text-indigo-600 rounded-2xl flex items-center justify-center text-lg">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                </div>

                <!-- 4. Total Pelanggan (Kuning/Oranye) -->
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Total Pelanggan</p>
                        <h3 class="text-xl font-extrabold text-gray-900 mt-1">3</h3>
                        <p class="text-xs font-semibold text-emerald-600 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-arrow-up text-[10px]"></i> Pelanggan unik
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-amber-100/60 text-amber-600 rounded-2xl flex items-center justify-center text-lg">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>

            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                    <div>
                        <h3 class="text-base font-bold text-gray-800">Daftar Transaksi / Pesanan</h3>
                        <p class="text-xs text-gray-500">Lihat dan kelola pesanan masuk dari pembeli.</p>
                    </div>

                    <!-- Pencarian Cepat -->
                    <div class="relative w-full md:w-64">
                        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari nama atau produk..." class="w-full pl-9 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-pink-500 outline-none transition">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400 text-xs"></i>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="ordersTable">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100 text-xs text-gray-500 uppercase font-semibold">
                                <th class="p-4">No</th>
                                <th class="p-4">Nama Pembeli</th>
                                <th class="p-4">WhatsApp</th>
                                <th class="p-4">Produk</th>
                                <th class="p-4">Qty</th>
                                <th class="p-4">Total Harga</th>
                                <th class="p-4">Alamat</th>
                                <th class="p-4">Tanggal</th>
                                <th class="p-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                            @forelse($orders as $index => $order)
                                @php
                                    $id = is_array($order) ? $order['id'] : $order->id;
                                    $customerName = is_array($order) ? $order['customer_name'] : $order->customer_name;
                                    $customerPhone = is_array($order) ? $order['customer_phone'] : $order->customer_phone;
                                    $productName = is_array($order) ? $order['product_name'] : $order->product_name;
                                    $qty = is_array($order) ? $order['qty'] : $order->qty;
                                    $price = is_array($order) ? $order['price'] : $order->price;
                                    $address = is_array($order) ? $order['customer_address'] : $order->customer_address;
                                    $createdAt = is_array($order) ? $order['created_at'] : $order->created_at;

                                    $total = $price * $qty;
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $customerPhone);
                                    if(str_starts_with($cleanPhone, '0')) {
                                        $cleanPhone = '62' . substr($cleanPhone, 1);
                                    }
                                @endphp
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="p-4 font-medium text-gray-400">{{ $index + 1 }}</td>
                                    <td class="p-4 font-bold text-gray-800">{{ $customerName }}</td>
                                    <td class="p-4">
                                        <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="text-green-600 font-semibold hover:underline flex items-center gap-1 text-xs bg-green-50 px-2.5 py-1 rounded-full w-fit border border-green-200">
                                            <i class="fa-brands fa-whatsapp"></i> {{ $customerPhone }}
                                        </a>
                                    </td>
                                    <td class="p-4 font-medium">{{ $productName }}</td>
                                    <td class="p-4"><span class="bg-gray-100 px-2 py-0.5 rounded text-xs font-bold">{{ $qty }}</span></td>
                                    <td class="p-4 font-bold text-pink-600">Rp {{ number_format($total, 0, ',', '.') }}</td>
                                    <td class="p-4 text-xs text-gray-500 max-w-xs truncate" title="{{ $address }}">{{ $address }}</td>
                                    <td class="p-4 text-xs text-gray-400">
                                        {{ $createdAt ? \Carbon\Carbon::parse($createdAt)->format('d M Y H:i') : '-' }}
                                    </td>
                                    <td class="p-4 text-center">
                                        <div class="flex justify-center items-center gap-2">
                                            <!-- Tombol Chat WA -->
                                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('Halo Kak ' . $customerName . ', terima kasih sudah memesan ' . $productName . ' di Belleza Collection!') }}" 
                                               target="_blank" 
                                               class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg text-xs transition shadow-sm"
                                               title="Chat Pelanggan">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </a>
                                            <!-- Tombol Hapus Pesanan -->
                                            <form action="{{ route('admin.orders.destroy', $id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-500 p-2 rounded-lg text-xs transition border border-red-200" title="Hapus Pesanan">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="p-12 text-center text-gray-400">
                                        <i class="fa-solid fa-inbox text-4xl mb-3 text-gray-300 block"></i>
                                        <p class="font-medium text-sm">Belum ada pesanan yang masuk.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Script Search Sederhana -->
    <script>
        function filterTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll("#ordersTable tbody tr");

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
    </script>
</body>
</html>