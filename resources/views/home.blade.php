<x-layouts.app>
    <!-- Modern Hero Section -->
    <div class="relative min-h-screen overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500">
        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
            <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-32 text-center lg:pt-32 lg:pb-40">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 mb-6 bg-white/20 backdrop-blur-lg rounded-full border border-white/30 shadow-lg">
                <span class="text-white text-sm font-semibold">🎉 Platform Ticketing Terpercaya</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight">
                Amankan Tiketmu,
                <br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-pink-200">
                    Auto Asik!
                </span>
            </h1>

            <!-- Subheading -->
            <p class="max-w-2xl mx-auto text-xl md:text-2xl text-white/90 mb-10 leading-relaxed">
                Temukan dan pesan tiket event favoritmu dengan mudah. Konser, seminar, olahraga, dan masih banyak lagi!
            </p>

            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto mb-8">
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Cari event yang kamu inginkan..." 
                        class="w-full px-6 py-4 pl-14 text-gray-900 bg-white/95 backdrop-blur-lg rounded-2xl shadow-2xl focus:outline-none focus:ring-4 focus:ring-white/50 transition-all duration-300"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-5 top-1/2 transform -translate-y-1/2 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#events" class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-purple-600 bg-white rounded-xl overflow-hidden shadow-2xl transition-all duration-300 hover:scale-105 hover:shadow-white/50">
                    <span class="relative z-10">Jelajahi Event</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-white/20 backdrop-blur-lg rounded-xl border-2 border-white/30 shadow-xl transition-all duration-300 hover:bg-white/30 hover:scale-105">
                    Daftar Sekarang
                </a>
            </div>

            <!-- Stats -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="text-4xl font-bold text-white mb-2">{{ $events->count() }}+</div>
                    <div class="text-white/80 text-sm">Event Tersedia</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-white mb-2">{{ $categories->count() }}+</div>
                    <div class="text-white/80 text-sm">Kategori</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-white mb-2">10K+</div>
                    <div class="text-white/80 text-sm">Pengguna Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-white mb-2">4.9★</div>
                    <div class="text-white/80 text-sm">Rating</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Animations -->
    <style>
        @keyframes blob {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>

    <section id="events" class="max-w-7xl mx-auto py-12 px-6">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-black uppercase italic">Event</h2>
            <div class="flex gap-2">
                <a href="{{ route('home') }}">
                    <x-ui.category-pill :label="'Semua'" :active="!request('kategori')" />
                </a>
                @foreach ($categories as $kategori)
                    <a href="{{ route('home', ['kategori' => $kategori->id]) }}">
                        <x-ui.category-pill :label="$kategori->nama" :active="request('kategori') == $kategori->id" />
                    </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($events as $event)
                <x-event-card :title="$event->judul" :date="$event->tanggal_waktu" :location="$event->lokasi" :price="$event->min_price" :image="asset('storage/' . $event->gambar)" />
            @empty
                <div class="col-span-full text-center py-16">
                    <div class="flex flex-col items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Event</h3>
                        <p class="text-gray-500 mb-6">Tidak ada event yang tersedia untuk kategori ini saat ini.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            Lihat Semua Event
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
</x-layouts.app>
