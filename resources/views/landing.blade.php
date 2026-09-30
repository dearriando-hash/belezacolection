<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belleza Collection - Fashion Wanita Elegan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-6deg); }
            75% { transform: rotate(6deg); }
        }
        .hover-wiggle:hover {
            animation: wiggle 0.3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-pink-50 font-sans text-gray-700 min-h-screen flex flex-col justify-between">

    <!-- Header Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50 border-b-2 border-pink-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <h1 class="text-2xl font-bold text-pink-600 tracking-wide transition-transform duration-300 hover:scale-105 cursor-pointer">
                Belleza Collection
            </h1>
            
            <!-- Menu Navigasi -->
            <div class="space-x-4 text-sm font-semibold flex items-center flex-wrap">
                <a href="#tentang" class="hover:text-pink-500 text-gray-600 transition-colors duration-200">Tentang Kami</a>
                <a href="#keunggulan" class="hover:text-pink-500 text-gray-600 transition-colors duration-200">Keunggulan</a>
                <a href="{{ route('home') }}#katalog" class="hover:text-pink-500 transition-colors duration-200 {{ !request('category') ? 'text-pink-600 font-bold' : 'text-gray-600' }}">Semua</a>
                
                @foreach($categories as $cat)
                    <a href="{{ route('home', ['category' => is_array($cat) ? $cat['name'] : $cat->name]) }}#katalog" 
                       class="hover:text-pink-500 transition-colors duration-200 capitalize {{ request('category') == (is_array($cat) ? $cat['name'] : $cat->name) ? 'text-pink-600 font-bold' : 'text-gray-600' }}">
                        {{ is_array($cat) ? $cat['name'] : $cat->name }}
                    </a>
                @endforeach
            </div>

            <!-- Tombol Marketplace & Admin -->
            <div class="flex items-center space-x-2 text-sm flex-wrap justify-center">
                <a href="{{ $socialLinks['shopee'] ?? '#' }}" target="_blank" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-full font-medium transition-all duration-300 hover:scale-105 hover-wiggle flex items-center gap-1 shadow">
                    <i class="fa-solid fa-bag-shopping"></i> Shopee
                </a>
                <a href="{{ $socialLinks['tiktok'] ?? '#' }}" target="_blank" class="bg-black hover:bg-gray-800 text-white px-3 py-1.5 rounded-full font-medium transition-all duration-300 hover:scale-105 hover-wiggle flex items-center gap-1 shadow">
                    <i class="fab fa-tiktok"></i> TikTok
                </a>
                
                <a href="/admin" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-full font-medium transition-all duration-300 hover:scale-105 flex items-center gap-1 shadow ml-1 border border-green-400">
                    <i class="fa-solid fa-user-lock text-xs"></i> Admin
                </a>
            </div>
        </div>
    </nav>

    <!-- Banner Utama -->
    <section class="relative bg-cover bg-center py-28 text-center overflow-hidden" style="background-image: url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=1920');">
        <div class="absolute inset-0 bg-gradient-to-r from-pink-950/80 via-black/70 to-pink-950/80 backdrop-blur-[2px]"></div>

        <div class="relative max-w-4xl mx-auto px-6 z-10">
            <span class="inline-block bg-pink-500/20 text-pink-300 border border-pink-400/40 px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-widest mb-4 backdrop-blur-md">
                New Elegant Collection
            </span>

            <h2 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-4 drop-shadow-md leading-tight">
                Tampil Feminin & <span class="text-pink-400 italic">Elegan</span> Setiap Hari
            </h2>

            <p class="text-gray-200 text-base md:text-xl max-w-2xl mx-auto mb-8 font-light leading-relaxed drop-shadow-sm">
                Pilihan fashion terkini untuk wanita modern. Temukan koleksi Sendal, Sepatu, dan Tas berkualitas premium dengan harga bersahabat.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="#katalog" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3.5 px-8 rounded-full shadow-lg transition-all duration-300 hover:-translate-y-1 inline-flex items-center gap-2">
                    <i class="fa-solid fa-store"></i> 
                    <span>Lihat Katalog Produk</span>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 1: TENTANG KAMI -->
    <section id="tentang" class="py-16 bg-white border-b border-pink-100">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-pink-600 font-bold uppercase tracking-wider text-xs bg-pink-100 px-3 py-1 rounded-full">Tentang Kami</span>
                <h3 class="text-3xl font-extrabold text-gray-800 mt-3 mb-4">Selamat Datang di Belleza Collection</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Belleza Collection adalah destinasi fashion wanita yang menghadirkan perpaduan sempurna antara kenyamanan, gaya modern, dan keanggunan. Kami percaya bahwa setiap wanita berhak tampil percaya diri dengan pilihan busana dan aksesori yang berkualitas.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Kami menghadirkan ragam pilihan Sendal, Sepatu, dan Tas yang dirancang khusus untuk melengkapi berbagai momen berharga Anda — mulai dari aktivitas harian hingga acara formal.
                </p>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=800" alt="Tentang Belleza" class="rounded-2xl shadow-xl w-full object-cover h-80 border-2 border-pink-100">
            </div>
        </div>
    </section>

    <!-- SECTION 2: KEUNGGULAN / KAMI MENGHADIRKAN -->
    <section id="keunggulan" class="py-16 bg-pink-50/60">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-pink-600 font-bold uppercase tracking-wider text-xs bg-pink-100 px-3 py-1 rounded-full">Mengapa Memilih Kami</span>
                <h3 class="text-3xl font-extrabold text-gray-800 mt-3">Kami Menghadirkan Yang Terbaik Untuk Anda</h3>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-md border border-pink-100 text-center hover:-translate-y-1 transition-all">
                    <div class="w-14 h-14 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fa-solid fa-gem"></i>
                    </div>
                    <h4 class="font-bold text-lg text-gray-800 mb-2">Kualitas Premium</h4>
                    <p class="text-sm text-gray-500">Bahan pilihan yang nyaman dipakai sepanjang hari dengan daya tahan material yang terjamin.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md border border-pink-100 text-center hover:-translate-y-1 transition-all">
                    <div class="w-14 h-14 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </div>
                    <h4 class="font-bold text-lg text-gray-800 mb-2">Desain Trendy & Elegan</h4>
                    <p class="text-sm text-gray-500">Koleksi yang selalu diperbarui mengikuti tren fashion terkini tanpa mengabaikan kesan klasik.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md border border-pink-100 text-center hover:-translate-y-1 transition-all">
                    <div class="w-14 h-14 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fa-solid fa-tags"></i>
                    </div>
                    <h4 class="font-bold text-lg text-gray-800 mb-2">Harga Terjangkau</h4>
                    <p class="text-sm text-gray-500">Mendapatkan tampilan elegan dan mewah tanpa harus menguras dompet Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: KATALOG PRODUK -->
    <section id="katalog" class="max-w-7xl mx-auto px-6 py-16 flex-grow">
        <h3 class="text-2xl font-bold text-center text-pink-600 mb-2 uppercase tracking-wider">Koleksi Produk</h3>
        <p class="text-center text-gray-500 mb-10">Pilih produk favorit Anda dan lakukan pemesanan secara langsung</p>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($products as $product)
                @php
                    $name = is_array($product) ? $product['name'] : $product->name;
                    $price = is_array($product) ? $product['price'] : $product->price;
                    $category = is_array($product) ? $product['category'] : $product->category;
                    $description = is_array($product) ? $product['description'] : ($product->description ?? '');
                    $image = is_array($product) ? $product['image'] : $product->image;

                    // Mengatur URL Gambar (URL Unsplash vs Storage Lokal Admin)
                    if ($image) {
                        if (str_starts_with($image, 'http')) {
                            $imageUrl = $image;
                        } elseif (str_starts_with($image, 'storage/')) {
                            $imageUrl = asset($image);
                        } else {
                            $imageUrl = asset('storage/' . $image);
                        }
                    } else {
                        $imageUrl = 'https://via.placeholder.com/500x500?text=No+Image';
                    }
                @endphp

                <div class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl border border-pink-100 flex flex-col justify-between group">
                    <div>
                        <div class="overflow-hidden h-64 bg-slate-100">
                            <img src="{{ $imageUrl }}" alt="{{ $name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <div class="p-5">
                            <span class="text-xs uppercase bg-pink-100 text-pink-600 font-bold px-3 py-1 rounded-full">
                                {{ $category }}
                            </span>
                            <h4 class="text-lg font-bold mt-3 text-gray-800">{{ $name }}</h4>
                            <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $description }}</p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <p class="text-xl font-extrabold text-pink-600 mt-2">
                            Rp {{ number_format($price, 0, ',', '.') }}
                        </p>

                        <button onclick="openOrderModal('{{ addslashes($name) }}', {{ $price }})" 
                            class="mt-4 w-full bg-pink-600 hover:bg-pink-700 text-white text-sm font-bold py-2.5 rounded-xl shadow transition-all duration-300 hover:scale-[1.02] flex justify-center items-center gap-2">
                            <i class="fa-solid fa-cart-shopping"></i> Beli Langsung
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-gray-500">
                    <p>Produk untuk kategori ini belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Modal Form Pemesanan -->
    <div id="orderModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl border border-pink-100">
            <div class="flex justify-between items-center mb-4 border-b pb-3">
                <h3 class="text-lg font-bold text-gray-800">Formulir Pemesanan</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-xl font-bold">&times;</button>
            </div>

            <form action="{{ route('order.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" id="product_name_input" name="product_name">
                <input type="hidden" id="product_price_input" name="price">

                <div>
                    <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Produk Dipesan</label>
                    <input type="text" id="display_product_name" class="w-full bg-gray-100 border border-gray-200 rounded-xl p-2.5 text-sm font-semibold text-gray-700" readonly>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Nama Pembeli</label>
                        <input type="text" name="customer_name" required placeholder="Nama Lengkap" class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-pink-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase mb-1">No. WhatsApp</label>
                        <input type="tel" name="customer_phone" required placeholder="08xxxxxxxx" class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-pink-500 outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Jumlah (Qty)</label>
                        <input type="number" name="qty" id="qty_input" min="1" value="1" required class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-pink-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Harga Satuan</label>
                        <input type="text" id="display_price" class="w-full bg-gray-100 border border-gray-200 rounded-xl p-2.5 text-sm font-bold text-pink-600" readonly>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Alamat Lengkap Pengiriman</label>
                    <textarea name="customer_address" rows="3" required placeholder="Jalan, No. Rumah, Kecamatan, Kota..." class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:ring-2 focus:ring-pink-500 outline-none"></textarea>
                </div>

                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-xl shadow-lg shadow-green-500/30 flex items-center justify-center gap-2 transition-all">
                    <i class="fa-brands fa-whatsapp text-lg"></i> Proses Pesanan via WhatsApp
                </button>
            </form>
        </div>
    </div>

    <!-- Footer Lengkap & Elegan -->
    <footer class="bg-pink-600 text-white pt-12 pb-6 border-t border-pink-500">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            
            <!-- Kolom 1: Tentang Toko -->
            <div>
                <h4 class="text-xl font-bold mb-3 tracking-wide">Belleza Collection</h4>
                <p class="text-pink-100 text-sm leading-relaxed">
                    Pusat fashion wanita terpercaya. Kami menghadirkan koleksi Sendal, Sepatu, dan Tas berkualitas premium dengan harga yang bersahabat untuk menyempurnakan gaya harianmu.
                </p>
            </div>

            <!-- Kolom 2: Navigasi Cepat -->
            <div>
                <h4 class="text-lg font-bold mb-3">Navigasi Cepat</h4>
                <ul class="space-y-2 text-sm text-pink-100">
                    <li><a href="#tentang" class="hover:text-white transition-colors">Tentang Kami</a></li>
                    <li><a href="#keunggulan" class="hover:text-white transition-colors">Keunggulan</a></li>
                    <li><a href="#katalog" class="hover:text-white transition-colors">Katalog Produk</a></li>
                    <li><a href="/admin" class="hover:text-white transition-colors">Akses Admin</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Hubungi Kami -->
            <div>
                <h4 class="text-lg font-bold mb-3">Hubungi Kami</h4>
                <ul class="space-y-2 text-sm text-pink-100">
                    <li class="flex items-center gap-2">
                        <i class="fa-brands fa-whatsapp text-base"></i>
                        <span>0812-3456-7890</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-envelope text-base"></i>
                        <span>info@bellezacollection.com</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-location-dot text-base"></i>
                        <span>Jakarta, Indonesia</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Garis Pembatas & Copyright -->
        <div class="border-t border-pink-500/60 pt-6 text-center text-xs text-pink-200">
            <p>&copy; {{ date('Y') }} Belleza Collection. All rights reserved.</p>
        </div>
    </footer>

    <!-- Script Modal Javascript -->
    <script>
        function openOrderModal(name, price) {
            document.getElementById('product_name_input').value = name;
            document.getElementById('product_price_input').value = price;
            document.getElementById('display_product_name').value = name;
            document.getElementById('display_price').value = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
            document.getElementById('orderModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('orderModal').classList.add('hidden');
        }
    </script>

</body>
</html>