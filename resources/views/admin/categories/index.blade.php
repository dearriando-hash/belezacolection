@extends('layouts.admin')

@section('content')
<!-- Wrapper Utama dengan Background Soft Pink & Ornamen Daun (Aksen Botani) -->
<div class="relative overflow-hidden bg-gradient-to-b from-pink-50/80 via-pink-50/40 to-white min-h-screen p-4 sm:p-6 rounded-3xl space-y-5 font-sans text-slate-700">

    <!-- ORNAMEN DAUN 1 (Pojok Kanan Atas Background) -->
    <div class="absolute -top-10 -right-10 w-48 h-48 opacity-20 pointer-events-none text-rose-400">
        <svg viewBox="0 0 200 200" fill="currentColor">
            <path d="M40,160 C10,120 10,60 50,20 C90,60 130,30 160,10 C140,50 170,100 130,130 C90,160 60,130 40,160 Z" />
            <path d="M50,150 C70,110 100,80 140,60" stroke="currentColor" stroke-width="3" fill="none"/>
        </svg>
    </div>

    <!-- ORNAMEN DAUN 2 (Pojok Kiri Bawah Background) -->
    <div class="absolute -bottom-10 -left-10 w-56 h-56 opacity-15 pointer-events-none text-pink-400 transform -rotate-45">
        <svg viewBox="0 0 200 200" fill="currentColor">
            <path d="M30,170 C10,110 30,50 80,30 C110,60 130,20 170,20 C150,70 180,120 130,150 C80,180 50,140 30,170 Z" />
            <path d="M40,160 C80,120 110,90 150,50" stroke="currentColor" stroke-width="2" fill="none"/>
        </svg>
    </div>

    <!-- 1. Header Section & Tombol Tambah -->
    <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="relative w-11 h-11 rounded-2xl bg-pink-100/80 text-pink-500 flex items-center justify-center text-lg shadow-2xs">
                <i class="fa-solid fa-border-all"></i>
                <!-- Aksen Daun Kecil pada Icon Header -->
                <span class="absolute -top-1 -right-1 text-xs text-emerald-400">
                    <i class="fa-solid fa-leaf"></i>
                </span>
            </div>
            <div>
                <h1 class="text-xl font-bold text-slate-800 tracking-tight flex items-center gap-2">
                    Kategori Produk
                    <span class="text-xs font-normal px-2.5 py-0.5 rounded-full bg-pink-100 text-pink-600 border border-pink-200">
                        <i class="fa-solid fa-leaf text-[10px] mr-1"></i>Botanic Theme
                    </span>
                </h1>
                <p class="text-xs text-slate-400 font-medium">Dashboard &gt; <span class="text-slate-500">Kategori Produk</span></p>
            </div>
        </div>

        <div>
            <button onclick="openModal('addModal')" class="inline-flex items-center gap-2 px-4 py-2.5 bg-rose-500 hover:bg-rose-600 text-white rounded-xl font-semibold text-xs shadow-sm hover:shadow transition-all cursor-pointer">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Tambah Kategori</span>
            </button>
        </div>
    </div>

    <!-- 2. Ringkasan Statistik Cards -->
    <div class="relative z-10 grid grid-cols-1 sm:grid-cols-3 gap-4">
        
        <!-- Card 1: Total Kategori -->
        <div class="relative overflow-hidden bg-pink-100/50 p-4 rounded-2xl border border-pink-200/50 flex items-center justify-between">
            <!-- Watermark Daun Card -->
            <i class="fa-solid fa-leaf absolute -bottom-3 -right-3 text-5xl text-pink-200/40 pointer-events-none transform -rotate-12"></i>
            <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-2xl bg-pink-200/60 text-pink-500 flex items-center justify-center text-sm font-bold">
                    <i class="fa-solid fa-border-all"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-slate-500">Total Kategori</p>
                    <p class="text-xl font-extrabold text-slate-800 mt-0.5">{{ count($categories) }}</p>
                </div>
            </div>
            <i class="fa-solid fa-chart-line text-pink-400 text-sm"></i>
        </div>

        <!-- Card 2: Kategori Aktif -->
        <div class="relative overflow-hidden bg-emerald-50/70 p-4 rounded-2xl border border-emerald-100/80 flex items-center justify-between">
            <!-- Watermark Daun Card -->
            <i class="fa-solid fa-leaf absolute -bottom-3 -right-3 text-5xl text-emerald-200/30 pointer-events-none transform rotate-45"></i>
            <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center text-sm font-bold shadow-xs">
                    <i class="fa-solid fa-check"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-slate-500">Kategori Aktif</p>
                    <p class="text-xl font-extrabold text-slate-800 mt-0.5">{{ count($categories) }}</p>
                </div>
            </div>
            <i class="fa-solid fa-chart-simple text-emerald-400 text-sm"></i>
        </div>

        <!-- Card 3: Kategori Tidak Aktif -->
        <div class="relative overflow-hidden bg-slate-100/70 p-4 rounded-2xl border border-slate-200/60 flex items-center justify-between">
            <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-full bg-slate-400 text-white flex items-center justify-center text-xs font-bold shadow-xs">
                    <i class="fa-solid fa-minus"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-slate-400">Kategori Tidak Aktif</p>
                    <p class="text-xl font-extrabold text-slate-800 mt-0.5">0</p>
                </div>
            </div>
            <i class="fa-solid fa-chart-simple text-slate-300 text-sm"></i>
        </div>

    </div>

    <!-- Flash Notification -->
    @if(session('success'))
        <div class="relative z-10 p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold rounded-xl flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-emerald-500 text-sm"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900 font-bold text-base cursor-pointer">&times;</button>
        </div>
    @endif

    <!-- 3. Table Container -->
    <div class="relative z-10 bg-white/90 backdrop-blur-xs rounded-2xl border border-slate-100 shadow-xs p-5 space-y-4">
        
        <!-- Search Bar & Filter Controls -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
            
            <!-- Search Box -->
            <div class="relative w-full sm:w-80">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400 text-xs">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" placeholder="Cari kategori produk..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200/70 rounded-xl text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:bg-white transition-all">
            </div>

            <!-- Dropdown Status & Toggle View -->
            <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-2">
                <select class="px-4 py-2 bg-slate-50 border border-slate-200/70 rounded-xl text-xs text-slate-600 font-medium focus:outline-none focus:ring-2 focus:ring-pink-300">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Tidak Aktif</option>
                </select>

                <div class="flex items-center bg-slate-100/80 p-1 rounded-xl">
                    <button class="w-7 h-7 bg-rose-500 text-white rounded-lg flex items-center justify-center text-xs shadow-2xs">
                        <i class="fa-solid fa-border-all"></i>
                    </button>
                    <button class="w-7 h-7 text-slate-400 hover:text-slate-600 rounded-lg flex items-center justify-center text-xs">
                        <i class="fa-solid fa-list"></i>
                    </button>
                </div>
            </div>

        </div>

        <!-- Tabel Kategori -->
        <div class="overflow-x-auto rounded-xl border border-pink-100/80">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="font-bold text-rose-500 bg-pink-50/80 border-b border-pink-100">
                        <th class="py-3 px-4 w-12 text-center">No</th>
                        <th class="py-3 px-4 w-52">Nama Kategori</th>
                        <th class="py-3 px-4">Deskripsi</th>
                        <th class="py-3 px-4 w-28">Status</th>
                        <th class="py-3 px-4 w-32 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse($categories as $key => $category)
                        <tr class="hover:bg-pink-50/30 transition-colors">
                            
                            <!-- No -->
                            <td class="py-3.5 px-4 text-center font-bold text-slate-500">
                                {{ $key + 1 }}
                            </td>
                            
                            <!-- Nama Kategori -->
                            <td class="py-3.5 px-4 font-bold text-slate-800 capitalize">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-leaf text-[10px] text-pink-400 opacity-60"></i>
                                    <span>{{ $category->name }}</span>
                                </div>
                            </td>

                            <!-- Deskripsi -->
                            <td class="py-3.5 px-4 text-slate-500 max-w-md truncate">
                                Koleksi {{ strtolower($category->name) }} busana fashion eksklusif dengan pilihan bahan alami & elegan...
                            </td>

                            <!-- Status -->
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100 inline-flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Aktif
                                </span>
                            </td>

                            <!-- Aksi (Tombol Bulat Pink Soft) -->
                            <td class="py-3.5 px-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    
                                    <!-- Edit -->
                                    <button onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->name) }}')" class="w-7 h-7 rounded-full bg-pink-100/60 hover:bg-rose-500 text-rose-500 hover:text-white flex items-center justify-center transition-all cursor-pointer" title="Edit">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                    </button>

                                    <!-- Detail -->
                                    <button class="w-7 h-7 rounded-full bg-pink-100/60 hover:bg-rose-500 text-rose-500 hover:text-white flex items-center justify-center transition-all cursor-pointer" title="Detail">
                                        <i class="fa-solid fa-eye text-[10px]"></i>
                                    </button>

                                    <!-- Hapus -->
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-7 h-7 rounded-full bg-pink-100/60 hover:bg-rose-600 text-rose-500 hover:text-white flex items-center justify-center transition-all cursor-pointer" title="Hapus">
                                            <i class="fa-solid fa-trash text-[10px]"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-10 text-center text-slate-400 font-medium">
                                <i class="fas fa-leaf text-2xl text-pink-200 mb-2 block"></i>
                                Belum ada data kategori produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- 4. Footer Pagination Info -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-2 text-xs text-slate-400">
            <p>Menampilkan 1 - {{ count($categories) }} dari {{ count($categories) }} data</p>
            <div class="flex items-center gap-1">
                <button class="w-6 h-6 rounded-lg bg-slate-100 text-slate-400 flex items-center justify-center text-[10px]" disabled>&lt;</button>
                <button class="w-6 h-6 rounded-lg bg-rose-500 text-white font-bold flex items-center justify-center text-[10px]">1</button>
                <button class="w-6 h-6 rounded-lg bg-slate-100 text-slate-400 flex items-center justify-center text-[10px]" disabled>&gt;</button>
            </div>
        </div>

    </div>

</div>

<!-- Modal 1: Tambah Kategori -->
<div id="addModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full overflow-hidden shadow-xl border border-slate-100">
        <div class="bg-rose-500 p-4 text-white flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-leaf text-xs"></i>
                <h3 class="text-xs font-bold">Tambah Kategori Baru</h3>
            </div>
            <button type="button" onclick="closeModal('addModal')" class="text-white hover:text-pink-100 font-bold text-lg cursor-pointer">&times;</button>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="p-5 space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">NAMA KATEGORI</label>
                <input type="text" name="name" required placeholder="Contoh: Gaun Malam, Aksesoris, Sepatu" class="w-full border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:ring-2 focus:ring-pink-300 focus:border-rose-500 outline-none">
            </div>

            <div class="flex items-center gap-2.5 pt-2">
                <button type="button" onclick="closeModal('addModal')" class="w-1/2 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-xl text-xs transition-all cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="w-1/2 bg-rose-500 hover:bg-rose-600 text-white font-semibold py-2 rounded-xl text-xs transition-all cursor-pointer shadow-xs">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal 2: Edit Kategori -->
<div id="editModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full overflow-hidden shadow-xl border border-slate-100">
        <div class="bg-rose-500 p-4 text-white flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-xs"></i>
                <h3 class="text-xs font-bold">Edit Kategori</h3>
            </div>
            <button type="button" onclick="closeModal('editModal')" class="text-white hover:text-pink-100 font-bold text-lg cursor-pointer">&times;</button>
        </div>

        <form id="editForm" method="POST" class="p-5 space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">NAMA KATEGORI</label>
                <input type="text" id="edit_name" name="name" required class="w-full border border-slate-200 rounded-xl px-3.5 py-2 text-xs focus:ring-2 focus:ring-pink-300 focus:border-rose-500 outline-none">
            </div>

            <div class="flex items-center gap-2.5 pt-2">
                <button type="button" onclick="closeModal('editModal')" class="w-1/2 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-xl text-xs transition-all cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="w-1/2 bg-rose-500 hover:bg-rose-600 text-white font-semibold py-2 rounded-xl text-xs transition-all cursor-pointer shadow-xs">
                    Perbarui Kategori
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
    function openEditModal(id, name) {
        document.getElementById('edit_name').value = name;
        document.getElementById('editForm').action = '/admin/categories/' + id;
        openModal('editModal');
    }
</script>
@endsection