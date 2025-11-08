@extends('layouts.app')

@section('title', 'Berita & Informasi Terbaru - SMKN 2 Kudus')

@section('styles')
<style>
    /* CSS Variables untuk konsistensi */
    :root {
        --primary-green: #059669;
        --secondary-green: #047857;
        --dark-green: #065f46;
        --light-green: #d1fae5;
        --accent-blue: #3b82f6;
        --accent-red: #dc2626;
        --text-dark: #1f2937;
        --text-light: #6b7280;
        --shadow-lg: 0 25px 50px rgba(0, 0, 0, 0.15);
        --transition-smooth: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    /* Base Styles */
    .news-hero {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 50%, var(--dark-green) 100%);
        position: relative;
        overflow: hidden;
        padding-top: 5rem; /* 80px */
    }

    @media (min-width: 1024px) {
        .news-hero {
            padding-top: 5.625rem; /* 90px */
        }
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

    /* Component Styles */
    .news-card {
        transition: var(--transition-smooth);
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        container-type: inline-size;
    }

    .news-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--shadow-lg);
    }

    @container (max-width: 400px) {
        .news-card {
            margin: 0 1rem;
        }
    }

    .category-tag {
        position: relative;
        overflow: hidden;
        transition: var(--transition-smooth);
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
        background: linear-gradient(135deg, var(--accent-red), #b91c1c);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .sticky-filter {
        position: sticky;
        top: 5rem; /* 80px */
        z-index: 40;
        backdrop-filter: blur(8px);
        background: rgba(255, 255, 255, 0.95);
    }

    /* Utility Classes */
    .text-shadow-sm {
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .text-shadow-lg {
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .backdrop-blur-lg {
        backdrop-filter: blur(16px);
    }

    .gradient-primary {
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    }

    .gradient-accent {
        background: linear-gradient(135deg, var(--accent-blue), #2563eb);
    }

    /* Loading States */
    .skeleton-loader {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* Focus States untuk Accessibility */
    .focus-ring:focus {
        outline: 2px solid var(--primary-green);
        outline-offset: 2px;
    }

    /* Reduced Motion Support */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="news-hero text-white py-20 relative" aria-labelledby="hero-title">
    <div class="absolute inset-0 bg-black/30" aria-hidden="true"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Animated Icons -->
            <div class="flex justify-center space-x-6 mb-6" role="presentation">
                <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md" aria-hidden="true">
                    <i class="fas fa-newspaper text-3xl text-green-200"></i>
                </div>
                <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md" aria-hidden="true">
                    <i class="fas fa-bullhorn text-3xl text-green-200"></i>
                </div>
                <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md" aria-hidden="true">
                    <i class="fas fa-broadcast-tower text-3xl text-green-200"></i>
                </div>
            </div>

            <h1 id="hero-title" class="text-5xl md:text-7xl font-bold mb-6">
                <span class="text-green-200">Berita</span> & Informasi
            </h1>
            <p class="text-xl md:text-2xl text-green-100 mb-8 leading-relaxed">
                Update terbaru seputar kegiatan, prestasi, dan perkembangan SMKN 2 Kudus
            </p>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto" role="group" aria-label="Statistik Berita">
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 border border-white/30">
                    <div class="text-2xl font-bold text-green-200 mb-1" id="total-news">{{ $berita->total() }}+</div>
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
    <div class="absolute top-10 left-10 opacity-20" aria-hidden="true">
        <i class="fas fa-feather text-4xl text-green-200 floating"></i>
    </div>
    <div class="absolute bottom-20 right-20 opacity-20" aria-hidden="true">
        <i class="fas fa-pen-fancy text-5xl text-green-200 floating" style="animation-delay: 1s"></i>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="py-12 bg-white border-b border-gray-200 sticky-filter" aria-labelledby="filter-title">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
            <!-- Page Info -->
            <div>
                <h2 id="filter-title" class="text-3xl font-bold text-gray-800 mb-2">Berita Terkini</h2>
                <p class="text-gray-600">Informasi terupdate dari SMKN 2 Kudus</p>
            </div>

            <!-- Search & Filter -->
            <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                <!-- Search -->
                <div class="relative flex-1 lg:w-80">
                    <label for="search-input" class="sr-only">Cari berita</label>
                    <input 
                        id="search-input"
                        type="text" 
                        placeholder="Cari berita..." 
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all focus-ring"
                        aria-describedby="search-help"
                    >
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400" aria-hidden="true"></i>
                </div>
                <div id="search-help" class="sr-only">
                    Ketik kata kunci untuk mencari berita berdasarkan judul atau konten
                </div>

                <!-- Filter Buttons -->
                <div class="flex gap-2" role="group" aria-label="Filter Kategori Berita">
                    <button 
                        class="category-tag bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-2xl font-semibold hover:shadow-lg transition-all focus-ring"
                        data-category="all"
                        aria-pressed="true"
                    >
                        <i class="fas fa-filter mr-2" aria-hidden="true"></i>Semua
                    </button>
                    <button 
                        class="category-tag bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-semibold hover:bg-gray-200 transition-all focus-ring"
                        data-category="akademik"
                        aria-pressed="false"
                    >
                        <i class="fas fa-graduation-cap mr-2" aria-hidden="true"></i>Akademik
                    </button>
                    <button 
                        class="category-tag bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-semibold hover:bg-gray-200 transition-all focus-ring"
                        data-category="prestasi"
                        aria-pressed="false"
                    >
                        <i class="fas fa-trophy mr-2" aria-hidden="true"></i>Prestasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured News -->
<section class="py-12 bg-gradient-to-br from-green-50 to-emerald-100" aria-labelledby="featured-title">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 id="featured-title" class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-fire text-red-500 mr-3" aria-hidden="true"></i>
                Berita Utama
            </h2>
            <div class="trending-badge px-4 py-2 rounded-full text-white text-sm font-bold" aria-hidden="true">
                <i class="fas fa-bolt mr-1"></i>TRENDING
            </div>
        </div>

        @if($berita->count() > 0)
            @php $featured = $berita->first(); @endphp
            <article class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200" aria-labelledby="featured-news-title">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Image -->
                    <div class="relative overflow-hidden h-80 lg:h-full">
                        <div class="absolute top-4 left-4 z-10">
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                <i class="fas fa-star mr-1" aria-hidden="true"></i>FEATURED
                            </span>
                        </div>
                        <div class="w-full h-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-6xl opacity-50" aria-hidden="true"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8 flex flex-col justify-center">
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-tag mr-1" aria-hidden="true"></i>Headline
                            </span>
                            <time class="text-gray-500 text-sm" datetime="{{ $featured->created_at->toIso8601String() }}">
                                <i class="fas fa-clock mr-1" aria-hidden="true"></i>{{ $featured->created_at->diffForHumans() }}
                            </time>
                        </div>

                        <h3 id="featured-news-title" class="text-3xl font-bold text-gray-800 mb-4 leading-tight">
                            {{ $featured->judul }}
                        </h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ Str::limit(strip_tags($featured->konten), 200) }}
                        </p>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4" aria-label="Statistik Berita">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-eye mr-1" aria-hidden="true"></i>
                                    <span>{{ rand(500, 2000) }} views</span>
                                </div>
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-comment mr-1" aria-hidden="true"></i>
                                    <span>{{ rand(10, 50) }} comments</span>
                                </div>
                            </div>

                            <a 
                                href="{{ route('berita.detail', $featured->slug) }}" 
                                class="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 inline-flex items-center group focus-ring"
                                aria-label="Baca lengkap berita: {{ $featured->judul }}"
                            >
                                Baca Lengkap
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        @endif
    </div>
</section>

<!-- News Grid -->
<section class="py-16 bg-white" aria-labelledby="news-grid-title">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 id="news-grid-title" class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-list-alt text-blue-500 mr-3" aria-hidden="true"></i>
                Semua Berita
            </h2>
            <div class="text-gray-600">
                Menampilkan <span class="font-bold text-green-600">{{ $berita->count() }}</span> berita
            </div>
        </div>

        @if($berita->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="news-grid">
            @foreach($berita->skip(1) as $item)
            <article class="news-card rounded-2xl shadow-xl overflow-hidden border border-gray-100 group" aria-labelledby="news-title-{{ $item->id }}">
                <!-- Image -->
                <div class="relative overflow-hidden h-48">
                    <div class="absolute top-4 left-4 z-10">
                        <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                            <i class="fas fa-newspaper mr-1" aria-hidden="true"></i>Berita
                        </span>
                    </div>
                    <div class="w-full h-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center news-image">
                        <i class="fas fa-newspaper text-white text-4xl opacity-70" aria-hidden="true"></i>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <time class="text-gray-500 text-sm" datetime="{{ $item->created_at->toIso8601String() }}">
                            <i class="fas fa-calendar mr-1" aria-hidden="true"></i>{{ $item->created_at->format('d M Y') }}
                        </time>
                        <span class="text-gray-500 text-sm">
                            <i class="fas fa-clock mr-1" aria-hidden="true"></i>{{ $item->created_at->format('H:i') }}
                        </span>
                    </div>

                    <h3 id="news-title-{{ $item->id }}" class="text-xl font-bold text-gray-800 mb-3 leading-tight group-hover:text-green-600 transition-colors">
                        {{ $item->judul }}
                    </h3>

                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                        {{ Str::limit(strip_tags($item->konten), 120) }}
                    </p>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2" aria-label="Interaksi Berita">
                            <div class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-semibold">
                                <i class="fas fa-eye mr-1" aria-hidden="true"></i>{{ rand(100, 500) }}
                            </div>
                            <div class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-semibold">
                                <i class="fas fa-comment mr-1" aria-hidden="true"></i>{{ rand(5, 30) }}
                            </div>
                        </div>

                        <a 
                            href="{{ route('berita.detail', $item->slug) }}" 
                            class="text-green-600 hover:text-green-700 font-semibold text-sm inline-flex items-center group focus-ring"
                            aria-label="Baca selengkapnya berita: {{ $item->judul }}"
                        >
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav aria-label="Navigasi halaman berita">
                <div class="bg-white rounded-2xl shadow-lg p-4 border border-gray-200">
                    {{ $berita->links() }}
                </div>
            </nav>
        </div>

        @else
        <!-- Empty State -->
        <div class="text-center py-16" aria-live="polite">
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-12 max-w-2xl mx-auto border border-gray-200">
                <div class="bg-green-100 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6" aria-hidden="true">
                    <i class="fas fa-newspaper text-green-600 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Belum Ada Berita</h3>
                <p class="text-gray-500 mb-6">Berita terbaru akan segera ditampilkan di sini. Pantau terus untuk update informasi terbaru!</p>
                <a 
                    href="{{ route('home') }}" 
                    class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition-all inline-flex items-center focus-ring"
                >
                    <i class="fas fa-arrow-left mr-2" aria-hidden="true"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-gradient-to-r from-green-600 to-green-700 text-white" aria-labelledby="newsletter-title">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-12 border border-white/20">
                <h2 id="newsletter-title" class="text-4xl md:text-5xl font-bold mb-6">
                    Tetap <span class="text-yellow-300">Update</span>
                </h2>
                <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Dapatkan notifikasi berita terbaru langsung ke email Anda. 
                    Jangan lewatkan informasi penting dari SMKN 2 Kudus.
                </p>
                
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto" aria-labelledby="newsletter-title">
                    <label for="newsletter-email" class="sr-only">Email untuk berlangganan</label>
                    <input 
                        id="newsletter-email"
                        type="email" 
                        placeholder="Masukkan email Anda" 
                        class="flex-1 px-6 py-4 rounded-2xl border border-green-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 text-gray-800 focus-ring"
                        required
                    >
                    <button 
                        type="submit"
                        class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-2xl font-bold hover:bg-yellow-300 transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center shadow-2xl focus-ring"
                    >
                        <i class="fas fa-bell mr-3" aria-hidden="true"></i>
                        Berlangganan
                    </button>
                </form>
                
                <p class="text-green-200 text-sm mt-4">
                    <i class="fas fa-shield-alt mr-2" aria-hidden="true"></i>Email Anda aman dan tidak akan disalahgunakan
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Quick Links -->
<section class="py-16 bg-gray-50" aria-labelledby="quick-links-title">
    <div class="container mx-auto px-4">
        <h2 id="quick-links-title" class="sr-only">Tautan Cepat</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4" aria-hidden="true">
                    <i class="fas fa-bullhorn text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Pengumuman</h3>
                <p class="text-gray-600 mb-4">Informasi resmi dan pengumuman penting</p>
                <a 
                    href="{{ route('pengumuman') }}" 
                    class="text-blue-600 hover:text-blue-700 font-semibold inline-flex items-center focus-ring"
                >
                    Lihat Pengumuman <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
                </a>
            </div>

            <div class="text-center">
                <div class="bg-yellow-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4" aria-hidden="true">
                    <i class="fas fa-trophy text-yellow-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Prestasi</h3>
                <p class="text-gray-600 mb-4">Pencapaian dan keberhasilan siswa</p>
                <a 
                    href="{{ route('prestasi') }}" 
                    class="text-yellow-600 hover:text-yellow-700 font-semibold inline-flex items-center focus-ring"
                >
                    Lihat Prestasi <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
                </a>
            </div>

            <div class="text-center">
                <div class="bg-purple-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4" aria-hidden="true">
                    <i class="fas fa-robot text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">KontekAI</h3>
                <p class="text-gray-600 mb-4">Asisten virtual untuk informasi</p>
                <a 
                    href="{{ route('kontekai') }}" 
                    class="text-purple-600 hover:text-purple-700 font-semibold inline-flex items-center focus-ring"
                >
                    Tanya KontekAI <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // NewsApp Module Pattern untuk organisasi kode yang lebih baik
    const NewsApp = (() => {
        // Configuration
        const config = {
            selectors: {
                searchInput: '#search-input',
                newsGrid: '#news-grid',
                newsCards: '.news-card',
                categoryTags: '.category-tag',
                filterButtons: '[data-category]'
            },
            classes: {
                activeCategory: 'bg-gradient-to-r from-green-600 to-green-700 text-white',
                inactiveCategory: 'bg-gray-100 text-gray-700',
                hidden: 'hidden'
            },
            animation: {
                notificationDuration: 3000
            }
        };

        // State Management
        let state = {
            currentCategory: 'all',
            searchTerm: '',
            isLoading: false
        };

        // DOM Elements Cache
        const elements = {};

        // Initialize the application
        function init() {
            cacheElements();
            bindEvents();
            initAnimations();
        }

        // Cache DOM elements for better performance
        function cacheElements() {
            elements.searchInput = document.querySelector(config.selectors.searchInput);
            elements.newsGrid = document.querySelector(config.selectors.newsGrid);
            elements.newsCards = document.querySelectorAll(config.selectors.newsCards);
            elements.categoryTags = document.querySelectorAll(config.selectors.categoryTags);
            elements.filterButtons = document.querySelectorAll(config.selectors.filterButtons);
        }

        // Bind event listeners
        function bindEvents() {
            // Search functionality with debouncing
            if (elements.searchInput) {
                elements.searchInput.addEventListener('input', debounce(handleSearch, 300));
            }

            // Category filter
            elements.filterButtons.forEach(button => {
                button.addEventListener('click', () => handleCategoryFilter(button));
            });

            // Keyboard navigation
            document.addEventListener('keydown', handleKeyboardNavigation);
        }

        // Initialize animations
        function initAnimations() {
            const floatingIcons = document.querySelectorAll('.floating');
            floatingIcons.forEach((icon, index) => {
                icon.style.animationDelay = `${index * 0.5}s`;
            });
        }

        // Search handler
        function handleSearch(event) {
            state.searchTerm = event.target.value.toLowerCase().trim();
            filterNews();
        }

        // Category filter handler
        function handleCategoryFilter(button) {
            const category = button.dataset.category;
            
            // Update state
            state.currentCategory = category;
            
            // Update UI
            updateCategoryButtons(button);
            
            // Filter news
            filterNews();
            
            // Show notification
            showNotification(`Menampilkan berita: ${getCategoryName(category)}`);
        }

        // Filter news based on current state
        function filterNews() {
            if (!elements.newsCards.length) return;

            elements.newsCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const content = card.querySelector('p').textContent.toLowerCase();
                const category = card.dataset.category || 'all';
                
                const matchesSearch = !state.searchTerm || 
                    title.includes(state.searchTerm) || 
                    content.includes(state.searchTerm);
                
                const matchesCategory = state.currentCategory === 'all' || 
                    category === state.currentCategory;
                
                if (matchesSearch && matchesCategory) {
                    card.style.display = 'block';
                    // Add fade-in animation
                    card.style.animation = 'fadeIn 0.3s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });

            // Update results count
            updateResultsCount();
        }

        // Update category buttons state
        function updateCategoryButtons(activeButton) {
            elements.filterButtons.forEach(button => {
                const isActive = button === activeButton;
                button.setAttribute('aria-pressed', isActive);
                
                if (isActive) {
                    button.classList.remove(...config.classes.inactiveCategory.split(' '));
                    button.classList.add(...config.classes.activeCategory.split(' '));
                } else {
                    button.classList.remove(...config.classes.activeCategory.split(' '));
                    button.classList.add(...config.classes.inactiveCategory.split(' '));
                }
            });
        }

        // Update results count
        function updateResultsCount() {
            const visibleCards = Array.from(elements.newsCards).filter(card => 
                card.style.display !== 'none'
            ).length;
            
            // You can update a results counter element here if needed
            console.log(`Visible news: ${visibleCards}`);
        }

        // Get category display name
        function getCategoryName(category) {
            const categories = {
                'all': 'Semua',
                'akademik': 'Akademik',
                'prestasi': 'Prestasi'
            };
            return categories[category] || category;
        }

        // Show notification
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-2xl font-semibold z-50 transform translate-x-full transition-transform duration-300';
            notification.textContent = message;
            notification.setAttribute('role', 'alert');
            notification.setAttribute('aria-live', 'polite');
            
            document.body.appendChild(notification);
            
            // Animate in
            requestAnimationFrame(() => {
                notification.classList.remove('translate-x-full');
            });
            
            // Remove after delay
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, config.animation.notificationDuration);
        }

        // Keyboard navigation handler
        function handleKeyboardNavigation(event) {
            // ESC key to clear search
            if (event.key === 'Escape' && elements.searchInput) {
                elements.searchInput.value = '';
                state.searchTerm = '';
                filterNews();
                elements.searchInput.blur();
            }
            
            // Tab key handling for accessibility
            if (event.key === 'Tab') {
                // Add focus styles dynamically if needed
            }
        }

        // Utility function: Debounce
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Public API
        return {
            init,
            getState: () => ({ ...state }),
            filterNews
        };
    })();

    // Initialize the application when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        NewsApp.init();
        
        // Add any additional initialization here
        console.log('News application initialized');
    });

    // Error boundary for JavaScript errors
    window.addEventListener('error', (event) => {
        console.error('JavaScript Error:', event.error);
        // You can show a user-friendly error message here
    });
</script>
@endsection