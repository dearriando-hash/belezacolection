<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Belleza Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="relative min-h-screen flex items-center justify-center p-4 font-sans bg-pink-50 overflow-hidden">

    <!-- Background Gambar Fashion Terang & Elegan -->
    <div class="absolute inset-0 bg-cover bg-center opacity-40 scale-105" 
         style="background-image: url('https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=1920');">
    </div>

    <!-- Soft Pink Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-tr from-pink-300/60 via-pink-100/40 to-white/70 backdrop-blur-[3px]"></div>

    <!-- Card Login -->
    <div class="relative z-10 bg-white/95 backdrop-blur-md p-8 md:p-10 rounded-3xl shadow-2xl w-full max-w-md border border-pink-200">
        
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-sm border border-pink-200">
                <i class="fa-solid fa-user-gear text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Login Administrator</h2>
            <p class="text-xs font-medium text-pink-600 tracking-wider uppercase mt-1">Belleza Collection Portal</p>
        </div>

        <!-- Pesan Error Laravel -->
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation text-red-500"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
            @csrf
            
            <!-- Email Input -->
            <div>
                <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Email Admin</label>
                <div class="relative flex items-center">
                    <span class="absolute left-4 text-pink-500">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="admin@belleza.com" 
                        class="w-full pl-11 pr-4 py-3 bg-pink-50/50 border border-pink-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:border-pink-500 focus:bg-white focus:ring-2 focus:ring-pink-200 transition-all duration-200">
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Password</label>
                <div class="relative flex items-center">
                    <span class="absolute left-4 text-pink-500">
                        <i class="fa-solid fa-lock text-xs"></i>
                    </span>
                    <input type="password" name="password" required placeholder="••••••••" 
                        class="w-full pl-11 pr-4 py-3 bg-pink-50/50 border border-pink-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:border-pink-500 focus:bg-white focus:ring-2 focus:ring-pink-200 transition-all duration-200">
                </div>
            </div>

            <!-- Submit Button (Pink Utama) -->
            <button type="submit" 
                class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-pink-500/30 transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0">
                Masuk ke Dashboard
            </button>
        </form>

        <!-- Tombol Kotak Hijau Terang "Ke Halaman Utama Store" -->
        <div class="mt-6 border-t border-gray-100 pt-6">
            <a href="{{ route('home') }}" 
               class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-xl shadow-md shadow-green-500/20 transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                <i class="fa-solid fa-store"></i>
                <span>Ke Halaman Utama Store</span>
            </a>
        </div>

    </div>

</body>
</html>