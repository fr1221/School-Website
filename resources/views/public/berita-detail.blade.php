@extends('layouts.app')

@section('title', $berita->judul . ' - Berita SMKN 2 Kudus')

@section('styles')
<style>
    .news-detail-hero {
        background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
        position: relative;
        overflow: hidden;
    }
    .news-detail-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="%23ffffff" opacity="0.1"><path d="M10 10h80v80H10z"/><circle cx="50" cy="50" r="20"/></svg>');
        background-size: 200px;
        animation: floatBackground 20s linear infinite;
    }
    @keyframes floatBackground {
        0% { transform: translate(0, 0); }
        100% { transform: translate(-200px, -200px); }
    }
    .news-glow {
        filter: drop-shadow(0 0 30px rgba(5, 150, 105, 0.3));
        animation: pulseGlow 2s ease-in-out infinite alternate;
    }
    @keyframes pulseGlow {
        from { filter: drop-shadow(0 0 20px rgba(5, 150, 105, 0.2)); }
        to { filter: drop-shadow(0 0 40px rgba(5, 150, 105, 0.4)); }
    }
    .content-stagger {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .sticky-sidebar {
        position: sticky;
        top: 100px;
    }
    .share-btn {
        transition: all 0.3s ease;
    }
    .share-btn:hover {
        transform: scale(1.1);
    }
    .news-image {
        transition: transform 0.6s ease;
    }
    .news-image:hover {
        transform: scale(1.05);
    }
</style>
@endsection

@section('content')
<!-- Breadcrumb -->
<section class="bg-gradient-to-r from-green-50 to-emerald-100 py-6 border-b border-green-200">
    <div class="container mx-auto px-4">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="{{ route('home') }}" class="text-green-600 hover:text-green-800 font-semibold flex items-center group">
                <i class="fas fa-home mr-2 group-hover:scale-110 transition-transform"></i>Beranda
            </a>
            <i class="fas fa-chevron-right text-green-400 text-xs"></i>
            <a href="{{ route('berita') }}" class="text-green-600 hover:text-green-800 font-semibold flex items-center group">
                <i class="fas fa-newspaper mr-2 group-hover:scale-110 transition-transform"></i>Berita
            </a>
            <i class="fas fa-chevron-right text-green-400 text-xs"></i>
            <span class="text-gray-600 font-semibold truncate max-w-xs">{{ Str::limit($berita->judul, 40) }}</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="news-detail-hero text-white py-16 relative">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-8">
                <div class="news-glow inline-block mb-6">
                    <i class="fas fa-newspaper text-6xl text-green-200"></i>
                </div>
                
                <div class="flex flex-wrap justify-center gap-3 mb-6">
                    <span class="bg-white/20 backdrop-blur-md px-4 py-2 rounded-full text-green-100 font-semibold">
                        <i class="fas fa-calendar mr-2"></i>{{ $berita->created_at->translatedFormat('d F Y') }}
                    </span>
                    <span class="bg-white/20 backdrop-blur-md px-4 py-2 rounded-full text-green-100 font-semibold">
                        <i class="fas fa-clock mr-2"></i>{{ $berita->created_at->format('H:i') }} WIB
                    </span>
                    <span class="bg-white/20 backdrop-blur-md px-4 py-2 rounded-full text-green-100 font-semibold">
                        <i class="fas fa-eye mr-2"></i>{{ rand(500, 2000) }} Dilihat
                    </span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">{{ $berita->judul }}</h1>
                
                <p class="text-xl text-green-100 mb-8 leading-relaxed max-w-3xl mx-auto">
                    {{ Str::limit(strip_tags($berita->konten), 200) }}
                </p>

                <!-- Author & Meta -->
                <div class="flex items-center justify-center space-x-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-edit text-green-700"></i>
                        </div>
                        <div>
                            <div class="font-semibold">Tim Redaksi SMKN 2</div>
                            <div class="text-green-200 text-sm">Jurnalis Sekolah</div>
                        </div>
                    </div>
                    <div class="h-8 w-px bg-green-400"></div>
                    <div class="text-green-200">
                        <div class="text-sm">Waktu Baca</div>
                        <div class="font-semibold">5 Menit</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute bottom-10 left-10 opacity-20">
        <i class="fas fa-feather text-4xl text-green-200 floating" style="animation-delay: 0s"></i>
    </div>
    <div class="absolute top-10 right-10 opacity-20">
        <i class="fas fa-pen-nib text-5xl text-green-200 floating" style="animation-delay: 1s"></i>
    </div>
</section>

<!-- Main Content -->
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
        <!-- Article Content -->
        <article class="lg:col-span-3 space-y-8">
            <!-- Featured Image -->
            <div class="content-stagger" style="animation-delay: 0.1s">
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-3xl p-12 text-center text-white shadow-2xl news-image">
                    <i class="fas fa-newspaper text-8xl opacity-50 mb-4"></i>
                    <h3 class="text-2xl font-bold">Berita SMKN 2 Kudus</h3>
                    <p class="text-green-100 mt-2">Informasi Terkini dan Terpercaya</p>
                </div>
            </div>

            <!-- Article Body -->
            <div class="content-stagger" style="animation-delay: 0.3s">
                <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
                    <div class="prose max-w-none text-gray-700 text-lg leading-relaxed">
                        {!! $berita->konten !!}
                    </div>

                    <!-- Article Footer -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-tag mr-1"></i>Berita Sekolah
                            </span>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-graduation-cap mr-1"></i>Pendidikan
                            </span>
                            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-users mr-1"></i>Komunitas
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="content-stagger" style="animation-delay: 0.5s">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-share-alt text-green-600 mr-3"></i>
                        Bagikan Berita Ini
                    </h3>
                    <div class="flex flex-wrap gap-4">
                        <button onclick="shareSocial('whatsapp')" class="share-btn bg-green-500 text-white px-6 py-3 rounded-xl hover:bg-green-600 transition-all duration-300 font-semibold flex items-center">
                            <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                        </button>
                        <button onclick="shareSocial('facebook')" class="share-btn bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all duration-300 font-semibold flex items-center">
                            <i class="fab fa-facebook mr-2"></i>Facebook
                        </button>
                        <button onclick="shareSocial('twitter')" class="share-btn bg-blue-400 text-white px-6 py-3 rounded-xl hover:bg-blue-500 transition-all duration-300 font-semibold flex items-center">
                            <i class="fab fa-twitter mr-2"></i>Twitter
                        </button>
                        <button onclick="copyLink()" class="share-btn bg-purple-600 text-white px-6 py-3 rounded-xl hover:bg-purple-700 transition-all duration-300 font-semibold flex items-center">
                            <i class="fas fa-link mr-2"></i>Copy Link
                        </button>
                    </div>
                </div>
            </div>

            <!-- Author Bio -->
            <div class="content-stagger" style="animation-delay: 0.7s">
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-user-edit text-green-600 text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Tim Redaksi SMKN 2 Kudus</h3>
                            <p class="text-gray-600 mb-3">
                                Tim jurnalistik profesional yang bertugas menyampaikan informasi 
                                terbaru dan terpercaya seputar kegiatan SMKN 2 Kudus.
                            </p>
                            <div class="flex space-x-4 text-sm text-gray-500">
                                <span class="flex items-center">
                                    <i class="fas fa-newspaper mr-1"></i> 50+ Artikel
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-star mr-1"></i> Terverifikasi
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Sidebar -->
        <aside class="lg:col-span-1">
            <div class="sticky-sidebar space-y-6">
                <!-- Action Card -->
                <div class="content-stagger" style="animation-delay: 0.2s">
                    <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-2xl p-6 text-white text-center">
                        <div class="bg-white/20 p-4 rounded-2xl inline-block mb-4">
                            <i class="fas fa-robot text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Butuh Informasi?</h3>
                        <p class="text-green-100 text-sm mb-4">Tanya KontekAI tentang berita dan informasi lainnya</p>
                        <a href="{{ route('kontekai') }}" class="bg-yellow-400 text-gray-900 px-6 py-3 rounded-xl font-bold hover:bg-yellow-300 transition-all duration-300 inline-flex items-center justify-center w-full shadow-lg">
                            <i class="fas fa-comments mr-2"></i>
                            Tanya KontekAI
                        </a>
                    </div>
                </div>

                <!-- Recent News -->
                <div class="content-stagger" style="animation-delay: 0.4s">
                    <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-fire text-red-500 mr-3"></i>
                            Berita Terbaru
                        </h3>
                        <div class="space-y-4">
                            @foreach($beritaTerbaru as $item)
                            <a href="{{ route('berita.detail', $item->slug) }}" class="block group">
                                <div class="flex items-start space-x-3 p-3 rounded-xl hover:bg-green-50 transition-all duration-300 border border-transparent hover:border-green-200">
                                    <div class="bg-green-100 text-green-600 p-2 rounded-lg group-hover:scale-110 transition-transform flex-shrink-0">
                                        <i class="fas fa-newspaper text-sm"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-gray-800 text-sm leading-tight group-hover:text-green-600 transition-colors mb-1 line-clamp-2">
                                            {{ $item->judul }}
                                        </h4>
                                        <p class="text-xs text-gray-500">
                                            {{ $item->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="content-stagger" style="animation-delay: 0.6s">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 text-white">
                        <h3 class="text-xl font-bold mb-3 flex items-center">
                            <i class="fas fa-bell mr-3"></i>
                            Newsletter
                        </h3>
                        <p class="text-blue-100 text-sm mb-4">
                            Dapatkan update berita terbaru langsung ke email Anda
                        </p>
                        <div class="space-y-3">
                            <input type="email" placeholder="Email Anda" 
                                   class="w-full px-4 py-3 rounded-xl border border-blue-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 text-gray-800">
                            <button class="w-full bg-yellow-400 text-gray-900 py-3 rounded-xl font-bold hover:bg-yellow-300 transition-all duration-300">
                                Berlangganan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="content-stagger" style="animation-delay: 0.8s">
                    <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-chart-bar text-purple-500 mr-3"></i>
                            Statistik Berita
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Total Dilihat</span>
                                <span class="font-semibold text-green-600">{{ rand(500, 2000) }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Waktu Baca</span>
                                <span class="font-semibold text-blue-600">5 Menit</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Kategori</span>
                                <span class="font-semibold text-purple-600">Berita</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600">Status</span>
                                <span class="font-semibold text-green-600">Published</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>

    <!-- Navigation -->
    <div class="content-stagger mt-12" style="animation-delay: 1s">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 max-w-6xl mx-auto">
            <a href="{{ route('berita') }}" class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center shadow-lg">
                <i class="fas fa-arrow-left mr-3"></i>
                Kembali ke Daftar Berita
            </a>
            
            <div class="flex items-center space-x-4 text-gray-600">
                <span class="text-sm font-semibold">Bagikan:</span>
                <div class="flex space-x-2">
                    <button onclick="shareSocial('whatsapp')" class="share-btn bg-green-500 text-white p-3 rounded-xl hover:bg-green-600 transition-all">
                        <i class="fab fa-whatsapp"></i>
                    </button>
                    <button onclick="shareSocial('facebook')" class="share-btn bg-blue-600 text-white p-3 rounded-xl hover:bg-blue-700 transition-all">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button onclick="copyLink()" class="share-btn bg-purple-500 text-white p-3 rounded-xl hover:bg-purple-600 transition-all">
                        <i class="fas fa-link"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Related News -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                <i class="fas fa-star text-yellow-500 mr-3"></i>
                Berita Terkait
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($beritaTerbaru->take(3) as $item)
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="h-40 bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-4xl opacity-70"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-gray-800 mb-3 leading-tight group-hover:text-green-600 transition-colors line-clamp-2">
                            {{ $item->judul }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ Str::limit(strip_tags($item->konten), 80) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 text-xs">
                                {{ $item->created_at->diffForHumans() }}
                            </span>
                            <a href="{{ route('berita.detail', $item->slug) }}" class="text-green-600 hover:text-green-700 font-semibold text-sm inline-flex items-center">
                                Baca
                                <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Share functionality
    function shareSocial(platform) {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent('{{ $berita->judul }}');
        const text = encodeURIComponent('{{ Str::limit(strip_tags($berita->konten), 100) }}');
        
        let shareUrl = '';
        switch(platform) {
            case 'whatsapp':
                shareUrl = `https://wa.me/?text=${title}%20${url}`;
                break;
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                break;
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                break;
        }
        
        if (shareUrl) {
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    }

    function copyLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            showNotification('Link berhasil disalin!');
        });
    }

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

    // Stagger animation
    document.addEventListener('DOMContentLoaded', function() {
        const staggerElements = document.querySelectorAll('.content-stagger');
        const floatingElements = document.querySelectorAll('.floating');
        
        // Set floating animation delays
        floatingElements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.5}s`;
        });

        // Intersection Observer for stagger animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.style.animationDelay || '0s';
                    entry.target.style.animationDelay = delay;
                }
            });
        }, { threshold: 0.1 });

        staggerElements.forEach(el => {
            observer.observe(el);
        });
    });
</script>
@endsection