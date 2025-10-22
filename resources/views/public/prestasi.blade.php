@extends('layouts.app')

@section('title', 'Prestasi - SMKN 2 Kudus')

@section('styles')
<style>
    .trophy-glow {
        filter: drop-shadow(0 0 20px rgba(255, 215, 0, 0.3));
    }
    .achievement-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .achievement-card:hover {
        transform: translateY(-10px) scale(1.02);
    }
    .category-badge {
        position: relative;
        overflow: hidden;
    }
    .category-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }
    .category-badge:hover::before {
        left: 100%;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-yellow-400 via-yellow-500 to-orange-600 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 opacity-20">
            <i class="fas fa-trophy text-6xl text-white floating" style="animation-delay: 0s"></i>
        </div>
        <div class="absolute top-20 right-20 opacity-20">
            <i class="fas fa-medal text-5xl text-white floating" style="animation-delay: 1s"></i>
        </div>
        <div class="absolute bottom-20 left-20 opacity-20">
            <i class="fas fa-award text-4xl text-white floating" style="animation-delay: 2s"></i>
        </div>
        <div class="absolute bottom-10 right-10 opacity-20">
            <i class="fas fa-star text-6xl text-white floating" style="animation-delay: 3s"></i>
        </div>
    </div>

    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                <span class="text-yellow-200">Prestasi</span> Gemilang
            </h1>
            <p class="text-xl md:text-2xl text-yellow-100 mb-8 leading-relaxed">
                Bukti nyata dedikasi dan kerja keras siswa-siswi SMKN 2 Kudus 
                dalam meraih prestasi di berbagai bidang kompetisi
            </p>
            
            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-2xl mx-auto">
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 text-white border border-white/30">
                    <div class="text-2xl md:text-3xl font-bold text-yellow-200 mb-1">{{ $prestasi->total() }}+</div>
                    <div class="text-sm text-yellow-100">Total Prestasi</div>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 text-white border border-white/30">
                    <div class="text-2xl md:text-3xl font-bold text-yellow-200 mb-1">25+</div>
                    <div class="text-sm text-yellow-100">Kejuaraan Nasional</div>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 text-white border border-white/30">
                    <div class="text-2xl md:text-3xl font-bold text-yellow-200 mb-1">15+</div>
                    <div class="text-sm text-yellow-100">Internasional</div>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 text-white border border-white/30">
                    <div class="text-2xl md:text-3xl font-bold text-yellow-200 mb-1">50+</div>
                    <div class="text-sm text-yellow-100">Wilayah & Provinsi</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-12 bg-white border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Galeri Prestasi</h2>
                <p class="text-gray-600">Telusuri berbagai prestasi yang telah kami raih</p>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <button class="category-badge bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg transition-all">
                    <i class="fas fa-filter mr-2"></i>Semua Kategori
                </button>
                <button class="category-badge bg-gray-100 text-gray-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition-all">
                    <i class="fas fa-laptop-code mr-2"></i>Teknologi
                </button>
                <button class="category-badge bg-gray-100 text-gray-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition-all">
                    <i class="fas fa-robot mr-2"></i>Robotik
                </button>
                <button class="category-badge bg-gray-100 text-gray-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition-all">
                    <i class="fas fa-cogs mr-2"></i>Engineering
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Prestasi Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($prestasi->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($prestasi as $item)
            <div class="achievement-card bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl group">
                <!-- Header dengan gradient -->
                <div class="bg-gradient-to-r from-yellow-500 to-orange-500 p-6 text-white relative overflow-hidden">
                    <div class="absolute top-4 right-4">
                        @switch($item->tingkat)
                            @case('nasional')
                                <div class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-flag mr-1"></i>NASIONAL
                                </div>
                                @break
                            @case('internasional')
                                <div class="bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-globe mr-1"></i>INTERNASIONAL
                                </div>
                                @break
                            @default
                                <div class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-map-marker-alt mr-1"></i>REGIONAL
                                </div>
                        @endswitch
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="bg-white/20 p-4 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-trophy text-2xl text-yellow-200"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-1">{{ $item->judul }}</h3>
                            <p class="text-yellow-100 text-sm opacity-90">
                                <i class="fas fa-calendar mr-1"></i>
                                {{ $item->created_at->format('M Y') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ Str::limit($item->deskripsi, 120) }}
                    </p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <div class="bg-blue-100 text-blue-600 px-2 py-1 rounded text-xs font-semibold">
                                <i class="fas fa-users mr-1"></i>{{ $item->peserta ?? 'Tim SMKN 2' }}
                            </div>
                            <div class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs font-semibold">
                                <i class="fas fa-medal mr-1"></i>{{ $item->peringkat ?? 'Juara' }}
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3">
                        <a href="{{ route('prestasi.detail', $item->slug) }}" 
                           class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-center py-2 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 group">
                            <span class="flex items-center justify-center">
                                Detail Prestasi
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </a>
                        <button class="bg-gray-100 text-gray-700 p-2 rounded-xl hover:bg-gray-200 transition-all duration-300">
                            <i class="fas fa-share-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <div class="bg-white rounded-2xl shadow-lg p-4 border border-gray-200">
                {{ $prestasi->links() }}
            </div>
        </div>

        @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl p-12 max-w-2xl mx-auto">
                <div class="trophy-glow mb-6">
                    <i class="fas fa-trophy text-6xl text-gray-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Belum Ada Prestasi</h3>
                <p class="text-gray-500 mb-6">Prestasi akan segera ditampilkan di sini. Stay tuned!</p>
                <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition-all inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-blue-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-12 border border-white/20">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Ingin Menjadi Bagian dari <span class="text-yellow-300">Prestasi Kami?</span>
                </h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Bergabunglah dengan SMKN 2 Kudus dan raih prestasi gemilang bersama kami. 
                    Kami siap membimbing Anda menuju kesuksesan.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <a href="{{ route('kontekai') }}" class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-yellow-300 transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center shadow-2xl">
                        <i class="fas fa-robot mr-3 text-xl"></i>
                        Konsultasi dengan KontekAI
                    </a>
                    <a href="#" class="bg-white/20 backdrop-blur-md text-white px-8 py-4 rounded-2xl font-bold text-lg border border-white/30 hover:bg-white/30 transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                        <i class="fas fa-info-circle mr-3 text-xl"></i>
                        Info PPDB
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Achievement Categories -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Bidang Prestasi</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Kami berprestasi di berbagai bidang kompetisi teknologi dan engineering
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach([
                ['icon' => 'laptop-code', 'title' => 'Programming', 'count' => '28', 'color' => 'blue'],
                ['icon' => 'robot', 'title' => 'Robotik', 'count' => '15', 'color' => 'purple'],
                ['icon' => 'network-wired', 'title' => 'Networking', 'count' => '12', 'color' => 'green'],
                ['icon' => 'microchip', 'title' => 'Electronics', 'count' => '18', 'color' => 'orange']
            ] as $category)
            <div class="bg-gradient-to-br from-{{ $category['color'] }}-50 to-{{ $category['color'] }}-100 rounded-2xl p-6 text-center border border-{{ $category['color'] }}-200 hover:shadow-xl transition-all duration-300 group">
                <div class="bg-{{ $category['color'] }}-500 text-white w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas fa-{{ $category['icon'] }} text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $category['title'] }}</h3>
                <div class="text-2xl font-bold text-{{ $category['color'] }}-600 mb-1">{{ $category['count'] }}</div>
                <p class="text-sm text-gray-600">Prestasi</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.category-badge');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-blue-700', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-700');
                });
                
                // Add active class to clicked button
                this.classList.remove('bg-gray-100', 'text-gray-700');
                this.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-blue-700', 'text-white');
                
                // Here you would typically filter the achievements
                // For now, we'll just show a notification
                const category = this.textContent.trim();
                showNotification(`Menampilkan prestasi: ${category}`);
            });
        });
        
        function showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-2xl font-semibold z-50 transform translate-x-full transition-transform duration-300';
            notification.textContent = message;
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
        
        // Add floating animation to trophy icons
        const trophies = document.querySelectorAll('.floating');
        trophies.forEach((trophy, index) => {
            trophy.style.animationDelay = `${index * 0.5}s`;
        });
    });
</script>
@endsection