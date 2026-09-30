<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belleza Boutique Admin - Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">

    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-slate-900 text-white flex flex-col justify-between p-6 shrink-0">
            <div>
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-10 h-10 bg-pink-500 rounded-2xl flex items-center justify-center font-bold text-xl shadow-lg shadow-pink-500/30">
                        B
                    </div>
                    <div>
                        <h1 class="font-bold text-lg tracking-wide uppercase leading-tight">BELLEZA</h1>
                        <p class="text-[10px] text-slate-400 font-medium">Boutique Admin</p>
                    </div>
                </div>

                <nav class="space-y-2 text-sm font-medium">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition-all">
                        <i class="fas fa-chart-pie w-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 bg-pink-500 text-white rounded-xl shadow-lg shadow-pink-500/25 transition-all">
                        <i class="fas fa-boxes-stacked w-5"></i>
                        <span>Kelola Produk</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition-all">
                        <i class="fas fa-tags w-5"></i>
                        <span>Kategori</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition-all">
                        <i class="fas fa-shopping-bag w-5"></i>
                        <span>Pesanan</span>
                    </a>
                    <a href="{{ route('admin.customers.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition-all">
                        <i class="fas fa-users w-5"></i>
                        <span>Pelanggan</span>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition-all">
                        <i class="fas fa-sliders w-5"></i>
                        <span>Pengaturan</span>
                    </a>
                </nav>
            </div>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-pink-400 hover:bg-slate-800 rounded-xl transition-all text-sm font-medium">
                    <i class="fas fa-right-from-bracket w-5"></i>
                    <span>Keluar Sistem</span>
                </button>
            </form>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-8 overflow-y-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">Edit Produk</h2>
                    <p class="text-xs text-slate-500 mt-1">Ubah rincian informasi dan stok produk.</p>
                </div>
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl font-semibold text-xs hover:bg-slate-50 hover:text-slate-900 transition-all shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            <!-- Form Card -->
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <!-- Sisi Kiri: Detail Produk -->
                    <div class="lg:col-span-2 space-y-6 bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
                        <h3 class="text-base font-bold text-slate-800 border-b border-slate-100 pb-4 mb-6">Informasi Utama</h3>
                        
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Nama Produk</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-3 text-sm bg-slate-50/50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Kategori</label>
                                <select name="category" required class="w-full px-4 py-3 text-sm bg-slate-50/50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all text-slate-700">
                                    <option value="Sepatu" {{ $product->category == 'Sepatu' ? 'selected' : '' }}>Sepatu</option>
                                    <option value="Tas" {{ $product->category == 'Tas' ? 'selected' : '' }}>Tas</option>
                                    <option value="Sandal" {{ $product->category == 'Sandal' ? 'selected' : '' }}>Sandal</option>
                                    <option value="Aksesoris" {{ $product->category == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Harga (Rp)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-3.5 text-xs font-bold text-slate-400">Rp</span>
                                    <input type="number" name="price" value="{{ old('price', $product->price) }}" required class="w-full pl-11 pr-4 py-3 text-sm bg-slate-50/50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Stok Produk</label>
                                <input type="number" name="stock" value="{{ old('stock', $product->stock ?? 0) }}" required min="0" class="w-full px-4 py-3 text-sm bg-slate-50/50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Deskripsi Produk</label>
                            <textarea name="description" rows="5" class="w-full px-4 py-3 text-sm bg-slate-50/50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all">{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>

                    <!-- Sisi Kanan: Upload Foto & Aksi -->
                    <div class="space-y-6">
                        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
                            <h3 class="text-base font-bold text-slate-800 border-b border-slate-100 pb-4 mb-6">Gambar Produk</h3>
                            
                            <div class="border-2 border-dashed border-slate-200 rounded-2xl p-6 text-center hover:border-pink-500 transition-all bg-slate-50/50 group cursor-pointer relative">
                                <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="previewImage(event)">
                                <div id="upload-placeholder" class="space-y-3 {{ $product->image ? 'hidden' : '' }}">
                                    <div class="w-12 h-12 bg-pink-50 text-pink-500 rounded-2xl flex items-center justify-center mx-auto text-xl group-hover:scale-110 transition-transform">
                                        <i class="fas fa-cloud-arrow-up"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-slate-700">Ganti foto produk</p>
                                        <p class="text-[10px] text-slate-400 mt-1">PNG, JPG, JPEG (Maks. 2MB)</p>
                                    </div>
                                </div>
                                <img id="image-preview" src="{{ $product->image ? asset('storage/' . $product->image) : '' }}" class="{{ $product->image ? '' : 'hidden' }} w-full h-48 object-cover rounded-xl mx-auto">
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col gap-3">
                            <button type="submit" class="w-full py-3.5 bg-pink-500 hover:bg-pink-600 text-white font-bold text-xs rounded-xl shadow-lg shadow-pink-500/30 transition-all flex items-center justify-center gap-2">
                                <i class="fas fa-save"></i> Perbarui Produk
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="w-full py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl text-center transition-all">
                                Batal
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        </main>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('upload-placeholder');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>