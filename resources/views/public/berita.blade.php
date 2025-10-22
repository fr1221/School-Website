@extends('layouts.app')

@section('title', 'Berita & Informasi Terbaru - SMKN 2 Kudus')

@section('styles')
<style>
    .news-hero {
        background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
        position: relative;
        overflow: hidden;
    }
    .news-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="%23ffffff" opacity="0.1"><rect x="10" y="10" width="80" height="60" rx="5"/><rect x="20" y="25" width="60" height="5"/><rect x="20" y="35" width="40" height="3"/><rect x="20" y="45" width="50" height="3"/></svg>');
        background-size: 300px;
        animation: floatBackground 30s linear infinite;
    }
    @keyframes floatBackground {
        0% { transform: translate(0, 0); }
        100% { transform: translate(-300px, -300px); }
    }
    .news-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    }
    .news-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }
    .category-tag {
        position: relative;
        overflow: hidden;
    }
    .category-tag::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: left 0.6s;
    }
    .category-tag:hover::before {
        left: 100%;
    }
    .news-image {
        transition: transform 0.6s ease;
    }
    .news-card:hover .news-image {
        transform: scale(1.1);
    }
    .trending-badge {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="news-hero text-white py-20 relative">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Animated Icons -->
            <div class="flex justify-center space-x-6 mb-6">
                <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md">
                    <i class="fas fa-newspaper text-3xl text-green-200"></i>
                </div>
                <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md">
                    <i class="fas fa-bullhorn text-3xl text-green-200"></i>
                </div>
                <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md">
                    <i class="fas fa-broadcast-tower text-3xl text-green-200"></i>
                </div>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                <span class="text-green-200">Berita</span> & Informasi
            </h1>
            <p class="text-xl md:text-2xl text-green-100 mb-8 leading-relaxed">
                Update terbaru seputar kegiatan, prestasi, dan perkembangan SMKN 2 Kudus
            </p>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto">
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 border border-white/30">
                    <div class="text-2xl font-bold text-green-200 mb-1">{{ $berita->total() }}+</div>
                    <div class="text-sm text-green-100">Total Berita</div>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 border border-white/30">
                    <div class="text-2xl font-bold text-green-200 mb-1">15+</div>
                    <div class="text-sm text-green-100">Bulan Ini</div>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 border border-white/30">
                    <div class="text-2xl font-bold text-green-200 mb-1">5K+</div>
                    <div class="text-sm text-green-100">Pembaca</div>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 border border-white/30">
                    <div class="text-2xl font-bold text-green-200 mb-1">24/7</div>
                    <div class="text-sm text-green-100">Update</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-10 left-10 opacity-20">
        <i class="fas fa-feather text-4xl text-green-200 floating" style="animation-delay: 0s"></i>
    </div>
    <div class="absolute bottom-20 right-20 opacity-20">
        <i class="fas fa-pen-fancy text-5xl text-green-200 floating" style="animation-delay: 1s"></i>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="py-12 bg-white border-b border-gray-200 sticky top-0 z-40 backdrop-blur-md bg-white/95">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
            <!-- Page Info -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Berita Terkini</h2>
                <p class="text-gray-600">Informasi terupdate dari SMKN 2 Kudus</p>
            </div>

            <!-- Search & Filter -->
            <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                <!-- Search -->
                <div class="relative flex-1 lg:w-80">
                    <input type="text" placeholder="Cari berita..." 
                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>

                <!-- Filter Buttons -->
                <div class="flex gap-2">
                    <button class="category-tag bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-2xl font-semibold hover:shadow-lg transition-all">
                        <i class="fas fa-filter mr-2"></i>Semua
                    </button>
                    <button class="category-tag bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-semibold hover:bg-gray-200 transition-all">
                        <i class="fas fa-graduation-cap mr-2"></i>Akademik
                    </button>
                    <button class="category-tag bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-semibold hover:bg-gray-200 transition-all">
                        <i class="fas fa-trophy mr-2"></i>Prestasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured News -->
<section class="py-12 bg-gradient-to-br from-green-50 to-emerald-100">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-fire text-red-500 mr-3"></i>
                Berita Utama
            </h2>
            <div class="trending-badge px-4 py-2 rounded-full text-white text-sm font-bold">
                <i class="fas fa-bolt mr-1"></i>TRENDING
            </div>
        </div>

        @if($berita->count() > 0)
            @php $featured = $berita->first(); @endphp
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Image -->
                    <div class="relative overflow-hidden h-80 lg:h-full">
                        <div class="absolute top-4 left-4 z-10">
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                <i class="fas fa-star mr-1"></i>FEATURED
                            </span>
                        </div>
                        <div class="w-full h-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-6xl opacity-50"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8 flex flex-col justify-center">
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-tag mr-1"></i>Headline
                            </span>
                            <span class="text-gray-500 text-sm">
                                <i class="fas fa-clock mr-1"></i>{{ $featured->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <h3 class="text-3xl font-bold text-gray-800 mb-4 leading-tight">
                            {{ $featured->judul }}
                        </h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ Str::limit(strip_tags($featured->konten), 200) }}
                        </p>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-eye mr-1"></i>
                                    <span>{{ rand(500, 2000) }} views</span>
                                </div>
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-comment mr-1"></i>
                                    <span>{{ rand(10, 50) }} comments</span>
                                </div>
                            </div>

                            <a href="{{ route('berita.detail', $featured->slug) }}" 
                               class="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 inline-flex items-center group">
                                Baca Lengkap
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- News Grid -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-list-alt text-blue-500 mr-3"></i>
                Semua Berita
            </h2>
            <div class="text-gray-600">
                Menampilkan <span class="font-bold text-green-600">{{ $berita->count() }}</span> berita
            </div>
        </div>

        @if($berita->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($berita->skip(1) as $item)
            <article class="news-card rounded-2xl shadow-xl overflow-hidden border border-gray-100 group">
                <!-- Image -->
                <div class="relative overflow-hidden h-48">
                    <div class="absolute top-4 left-4 z-10">
                        <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                            <i class="fas fa-newspaper mr-1"></i>Berita
                        </span>
                    </div>
                    <div class="w-full h-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center news-image">
                        <i class="fas fa-newspaper text-white text-4xl opacity-70"></i>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-gray-500 text-sm">
                            <i class="fas fa-calendar mr-1"></i>{{ $item->created_at->format('d M Y') }}
                        </span>
                        <span class="text-gray-500 text-sm">
                            <i class="fas fa-clock mr-1"></i>{{ $item->created_at->format('H:i') }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3 leading-tight group-hover:text-green-600 transition-colors">
                        {{ $item->judul }}
                    </h3>

                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                        {{ Str::limit(strip_tags($item->konten), 120) }}
                    </p>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-semibold">
                                <i class="fas fa-eye mr-1"></i>{{ rand(100, 500) }}
                            </div>
                            <div class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-semibold">
                                <i class="fas fa-comment mr-1"></i>{{ rand(5, 30) }}
                            </div>
                        </div>

                        <a href="{{ route('berita.detail', $item->slug) }}" 
                           class="text-green-600 hover:text-green-700 font-semibold text-sm inline-flex items-center group">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <div class="bg-white rounded-2xl shadow-lg p-4 border border-gray-200">
                {{ $berita->links() }}
            </div>
        </div>

        @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-12 max-w-2xl mx-auto border border-gray-200">
                <div class="bg-green-100 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-newspaper text-green-600 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Belum Ada Berita</h3>
                <p class="text-gray-500 mb-6">Berita terbaru akan segera ditampilkan di sini. Pantau terus untuk update informasi terbaru!</p>
                <a href="{{ route('home') }}" class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition-all inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-gradient-to-r from-green-600 to-green-700 text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-12 border border-white/20">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Tetap <span class="text-yellow-300">Update</span>
                </h2>
                <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Dapatkan notifikasi berita terbaru langsung ke email Anda. 
                    Jangan lewatkan informasi penting dari SMKN 2 Kudus.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Masukkan email Anda" 
                           class="flex-1 px-6 py-4 rounded-2xl border border-green-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 text-gray-800">
                    <button class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-2xl font-bold hover:bg-yellow-300 transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center shadow-2xl">
                        <i class="fas fa-bell mr-3"></i>
                        Berlangganan
                    </button>
                </div>
                
                <p class="text-green-200 text-sm mt-4">
                    <i class="fas fa-shield-alt mr-2"></i>Email Anda aman dan tidak akan disalahgunakan
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Quick Links -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bullhorn text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Pengumuman</h3>
                <p class="text-gray-600 mb-4">Informasi resmi dan pengumuman penting</p>
                <a href="{{ route('pengumuman') }}" class="text-blue-600 hover:text-blue-700 font-semibold inline-flex items-center">
                    Lihat Pengumuman <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="text-center">
                <div class="bg-yellow-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-trophy text-yellow-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Prestasi</h3>
                <p class="text-gray-600 mb-4">Pencapaian dan keberhasilan siswa</p>
                <a href="{{ route('prestasi') }}" class="text-yellow-600 hover:text-yellow-700 font-semibold inline-flex items-center">
                    Lihat Prestasi <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="text-center">
                <div class="bg-purple-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-robot text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">KontekAI</h3>
                <p class="text-gray-600 mb-4">Asisten virtual untuk informasi</p>
                <a href="{{ route('kontekai') }}" class="text-purple-600 hover:text-purple-700 font-semibold inline-flex items-center">
                    Tanya KontekAI <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add floating animation to icons
        const floatingIcons = document.querySelectorAll('.floating');
        floatingIcons.forEach((icon, index) => {
            icon.style.animationDelay = `${index * 0.5}s`;
        });

        // Search functionality
        const searchInput = document.querySelector('input[type="text"]');
        searchInput?.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const newsCards = document.querySelectorAll('.news-card');
            
            newsCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const content = card.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || content.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Category filter
        const filterButtons = document.querySelectorAll('.category-tag');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-gradient-to-r', 'from-green-600', 'to-green-700', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-700');
                });
                
                // Add active class to clicked button
                this.classList.remove('bg-gray-100', 'text-gray-700');
                this.classList.add('bg-gradient-to-r', 'from-green-600', 'to-green-700', 'text-white');
                
                // Show notification
                const category = this.textContent.trim();
                showNotification(`Menampilkan berita: ${category}`);
            });
        });

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-2xl font-semibold z-50 transform translate-x-full transition-transform duration-300';
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
    });
</script>
@endsection