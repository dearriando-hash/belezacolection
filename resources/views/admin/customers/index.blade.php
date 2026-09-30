<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Pelanggan - Admin Belleza</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    @php
        // Proteksi variabel $customers agar tidak pernah bernilai null
        $customerList = collect($customers ?? []);
    @endphp

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
                    <a href="/admin/customers" class="flex items-center gap-3 px-4 py-3 bg-gradient-to-r from-pink-600 to-rose-500 text-white rounded-xl text-xs font-semibold shadow-lg shadow-pink-600/30">
                        <i class="fa-solid fa-users w-5 text-base"></i> Pelanggan
                    </a>
                    <a href="/admin/settings" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800/60 rounded-xl text-xs font-semibold transition-all">
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
                    <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Manajemen Pelanggan</h1>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Pantau loyalitas pelanggan, histori pembelian, dan kontak langsung via WhatsApp.</p>
                </div>

                <div class="flex items-center gap-3">
                    <button onclick="window.print()" class="bg-white hover:bg-slate-50 text-slate-700 px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-bold shadow-sm transition flex items-center gap-2">
                        <i class="fa-solid fa-print text-slate-400"></i> Cetak Laporan
                    </button>
                    
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

            <!-- Stats Widgets -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Pelanggan</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">{{ count($customerList) }}</h3>
                        <p class="text-[10px] text-emerald-600 font-bold mt-1"><i class="fa-solid fa-arrow-trend-up"></i> Terdata dari Database</p>
                    </div>
                    <div class="w-12 h-12 bg-pink-50 text-pink-600 rounded-2xl flex items-center justify-center text-lg shadow-sm border border-pink-100">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Pelanggan VIP</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">
                            @php
                                $vipCount = 0;
                                foreach($customerList as $c) {
                                    $ordersCount = is_array($c) ? ($c['total_orders'] ?? 0) : ($c->total_orders ?? 0);
                                    if($ordersCount > 1) $vipCount++;
                                }
                            @endphp
                            {{ $vipCount }}
                        </h3>
                        <p class="text-[10px] text-amber-600 font-bold mt-1"><i class="fa-solid fa-crown"></i> > 1 kali pemesanan</p>
                    </div>
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center text-lg shadow-sm border border-amber-100">
                        <i class="fa-solid fa-award"></i>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Pelanggan Baru</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">
                            {{ count($customerList) - $vipCount }}
                        </h3>
                        <p class="text-[10px] text-blue-600 font-bold mt-1"><i class="fa-solid fa-user-plus"></i> Transaksi Pertama</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-lg shadow-sm border border-blue-100">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Koneksi Sistem</p>
                        <h3 class="text-base font-extrabold text-emerald-600 mt-2 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-ping"></span> WA Gateway Ready
                        </h3>
                        <p class="text-[10px] text-slate-400 font-medium mt-1">Siap untuk Follow-up</p>
                    </div>
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-lg shadow-sm border border-emerald-100">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/80">
                <!-- Toolbar & Search -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 pb-6 border-b border-slate-100">
                    <div>
                        <h3 class="text-base font-bold text-slate-800">Daftar Pelanggan Terdaftar</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Menampilkan total pelanggan unik berdasarkan riwayat transaksi pesanan.</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="relative w-full md:w-72">
                            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari nama, WA, atau alamat..." class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium focus:ring-2 focus:ring-pink-500 focus:bg-white outline-none transition-all">
                            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                        </div>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="customersTable">
                        <thead>
                            <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] text-slate-400 uppercase tracking-wider font-extrabold">
                                <th class="p-4 rounded-l-xl">Pelanggan</th>
                                <th class="p-4">WhatsApp</th>
                                <th class="p-4">Alamat Pengiriman</th>
                                <th class="p-4 text-center">Tingkat Klasifikasi</th>
                                <th class="p-4 text-center">Total Order</th>
                                <th class="p-4">Order Terakhir</th>
                                <th class="p-4 text-center rounded-r-xl">Aksi Cepat</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-700">
                            @forelse($customerList as $index => $customer)
                                @php
                                    $phone = is_array($customer) ? $customer['customer_phone'] : $customer->customer_phone;
                                    $name = is_array($customer) ? $customer['customer_name'] : $customer->customer_name;
                                    $address = is_array($customer) ? $customer['customer_address'] : $customer->customer_address;
                                    $ordersCount = is_array($customer) ? ($customer['total_orders'] ?? 1) : ($customer->total_orders ?? 1);
                                    $lastOrder = is_array($customer) ? ($customer['last_order'] ?? null) : ($customer->last_order ?? null);

                                    $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
                                    if(str_starts_with($cleanPhone, '0')) {
                                        $cleanPhone = '62' . substr($cleanPhone, 1);
                                    }
                                @endphp
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="p-4 font-bold text-slate-800">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center font-extrabold text-xs uppercase border border-slate-200 shrink-0">
                                                {{ substr($name, 0, 2) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-800">{{ $name }}</p>
                                                <p class="text-[10px] text-slate-400 font-normal">ID: CUST-00{{ $index + 1 }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 font-bold hover:bg-emerald-100 transition border border-emerald-200/60 text-[11px]">
                                            <i class="fa-brands fa-whatsapp text-emerald-600 text-sm"></i> {{ $phone }}
                                        </a>
                                    </td>
                                    <td class="p-4 max-w-xs">
                                        <p class="truncate text-slate-500" title="{{ $address }}">{{ $address }}</p>
                                    </td>
                                    <td class="p-4 text-center">
                                        @if($ordersCount > 1)
                                            <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-700 font-extrabold px-2.5 py-1 rounded-full text-[10px] border border-amber-200">
                                                <i class="fa-solid fa-crown text-amber-500"></i> VIP Member
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 bg-slate-100 text-slate-600 font-bold px-2.5 py-1 rounded-full text-[10px] border border-slate-200">
                                                <i class="fa-solid fa-user text-slate-400"></i> New Buyer
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-center">
                                        <span class="bg-pink-50 text-pink-600 font-extrabold px-3 py-1 rounded-xl text-xs border border-pink-100">
                                            {{ $ordersCount }}x Transaksi
                                        </span>
                                    </td>
                                    <td class="p-4 text-slate-400 text-[11px] font-semibold">
                                        {{ $lastOrder ? \Carbon\Carbon::parse($lastOrder)->format('d M Y, H:i') : '-' }}
                                    </td>
                                    <td class="p-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('Halo Kak ' . $name . ', terima kasih sudah memilih Belleza Collection! Apakah ada katalog produk baru yang sedang Kakak cari?') }}" 
                                               target="_blank" 
                                               class="bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-1.5 rounded-xl text-xs font-bold transition inline-flex items-center gap-1.5 shadow-sm shadow-emerald-500/20"
                                               title="Hubungi Via WhatsApp">
                                                <i class="fa-brands fa-whatsapp"></i> Chat WA
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-16 text-center text-slate-400">
                                        <div class="w-16 h-16 bg-slate-100 text-slate-300 rounded-3xl flex items-center justify-center mx-auto mb-3 text-2xl">
                                            <i class="fa-solid fa-users-slash"></i>
                                        </div>
                                        <p class="font-bold text-sm text-slate-600">Belum ada data pelanggan</p>
                                        <p class="text-xs text-slate-400 mt-1">Data pelanggan akan otomatis muncul ketika ada pesanan baru di web.</p>
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
            let rows = document.querySelectorAll("#customersTable tbody tr");

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
    </script>
</body>
</html>