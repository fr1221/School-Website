@extends('layouts.app')

@section('title', $pengumuman->judul . ' - SMKN 2 Kudus')

@section('styles')
<style>
    .content-animation {
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
    .gradient-border {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        padding: 2px;
        border-radius: 20px;
    }
    .share-btn {
        transition: all 0.3s ease;
    }
    .share-btn:hover {
        transform: scale(1.1);
    }
</style>
@endsection

@section('content')
<!-- Breadcrumb -->
<section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-6 border-b border-blue-200">
    <div class="container mx-auto px-4">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                <i class="fas fa-home mr-2"></i>Beranda
            </a>
            <i class="fas fa-chevron-right text-blue-400 text-xs"></i>
            <a href="{{ route('pengumuman') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                <i class="fas fa-bullhorn mr-2"></i>Pengumuman
            </a>
            <i class="fas fa-chevron-right text-blue-400 text-xs"></i>
            <span class="text-gray-600 font-semibold truncate max-w-xs">{{ Str::limit($pengumuman->judul, 40) }}</span>
        </nav>
    </div>
</section>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main Content -->
        <article class="lg:col-span-3">
            <!-- Header -->
            <div class="gradient-border content-animation mb-8" style="animation-delay: 0.1s">
                <div class="bg-white rounded-[18px] p-8 shadow-2xl">
                    <!-- Badge & Title -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full font-bold text-sm shadow-lg">
                                <i class="fas fa-bullhorn mr-2"></i>PENGUMUMAN RESMI
                            </div>
                            <div class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">
                                <i class="fas fa-clock mr-1"></i>{{ $pengumuman->created_at->diffForHumans() }}
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <button onclick="window.print()" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-all duration-300 font-semibold text-sm">
                                <i class="fas fa-print mr-2"></i>Print
                            </button>
                            <button onclick="shareContent()" class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg hover:bg-blue-200 transition-all duration-300 font-semibold text-sm">
                                <i class="fas fa-share-alt mr-2"></i>Share
                            </button>
                        </div>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 leading-tight">
                        {{ $pengumuman->judul }}
                    </h1>

                    <!-- Meta Information -->
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-6">
                        <div class="flex items-center space-x-2 bg-blue-50 px-3 py-2 rounded-lg">
                            <i class="fas fa-calendar-alt text-blue-600"></i>
                            <span class="font-semibold">{{ $pengumuman->created_at->translatedFormat('l, d F Y') }}</span>
                        </div>
                        <div class="flex items-center space-x-2 bg-green-50 px-3 py-2 rounded-lg">
                            <i class="fas fa-clock text-green-600"></i>
                            <span class="font-semibold">{{ $pengumuman->created_at->format('H:i') }} WIB</span>
                        </div>
                        <div class="flex items-center space-x-2 bg-purple-50 px-3 py-2 rounded-lg">
                            <i class="fas fa-eye text-purple-600"></i>
                            <span class="font-semibold">{{ rand(150, 500) }}x Dilihat</span>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if($pengumuman->gambar)
                    <div class="mb-8 rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('storage/' . $pengumuman->gambar) }}" 
                             alt="{{ $pengumuman->judul }}" 
                             class="w-full h-64 md:h-96 object-cover hover:scale-105 transition-transform duration-700">
                    </div>
                    @else
                    <div class="mb-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-12 text-center text-white shadow-2xl">
                        <i class="fas fa-bullhorn text-6xl mb-4 opacity-80"></i>
                        <h3 class="text-2xl font-bold">Pengumuman Resmi SMKN 2 Kudus</h3>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Content -->
            <div class="content-animation mb-8" style="animation-delay: 0.3s">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="prose max-w-none text-gray-700 text-lg leading-relaxed">
                        {!! $pengumuman->konten !!}
                    </div>
                </div>
            </div>

            <!-- Lampiran -->
            @if($pengumuman->lampiran)
            <div class="content-animation mb-8" style="animation-delay: 0.5s">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-2xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="bg-white/20 p-4 rounded-2xl">
                                <i class="fas fa-paperclip text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-1">Lampiran Terkait</h3>
                                <p class="text-blue-100">Download file pendukung pengumuman ini</p>
                            </div>
                        </div>
                        <a href="{{ asset('storage/' . $pengumuman->lampiran) }}" 
                           class="bg-white text-blue-600 px-6 py-3 rounded-xl font-bold hover:bg-gray-100 transition-all duration-300 shadow-lg flex items-center space-x-2"
                           target="_blank" download>
                            <i class="fas fa-download"></i>
                            <span>Download</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Share Section -->
            <div class="content-animation" style="animation-delay: 0.7s">
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-6 border border-gray-200">
                    <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-share-alt text-blue-600 mr-3"></i>
                        Bagikan Pengumuman Ini
                    </h4>
                    <div class="flex space-x-4">
                        <button onclick="shareSocial('facebook')" class="share-btn bg-blue-600 text-white p-4 rounded-2xl hover:bg-blue-700 shadow-lg">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </button>
                        <button onclick="shareSocial('twitter')" class="share-btn bg-blue-400 text-white p-4 rounded-2xl hover:bg-blue-500 shadow-lg">
                            <i class="fab fa-twitter text-xl"></i>
                        </button>
                        <button onclick="shareSocial('whatsapp')" class="share-btn bg-green-500 text-white p-4 rounded-2xl hover:bg-green-600 shadow-lg">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </button>
                        <button onclick="shareSocial('telegram')" class="share-btn bg-blue-500 text-white p-4 rounded-2xl hover:bg-blue-600 shadow-lg">
                            <i class="fab fa-telegram text-xl"></i>
                        </button>
                        <button onclick="copyLink()" class="share-btn bg-purple-600 text-white p-4 rounded-2xl hover:bg-purple-700 shadow-lg">
                            <i class="fas fa-link text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </article>

        <!-- Sidebar -->
        <aside class="lg:col-span-1">
            <div class="sticky-sidebar space-y-6">
                <!-- CTA KontekAI -->
                <div class="content-animation" style="animation-delay: 0.2s">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 text-white shadow-2xl text-center">
                        <div class="bg-white/20 p-4 rounded-2xl inline-block mb-4">
                            <i class="fas fa-robot text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Butuh Bantuan?</h3>
                        <p class="text-blue-100 mb-4 text-sm">Tanya KontekAI untuk informasi lebih lanjut</p>
                        <a href="{{ route('kontekai') }}" class="bg-yellow-400 text-gray-900 px-6 py-3 rounded-xl font-bold hover:bg-yellow-300 transition-all duration-300 inline-flex items-center justify-center w-full shadow-lg">
                            <i class="fas fa-comments mr-2"></i>
                            Tanya KontekAI
                        </a>
                    </div>
                </div>

                <!-- Pengumuman Terbaru -->
                <div class="content-animation" style="animation-delay: 0.4s">
                    <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-fire text-red-500 mr-3"></i>
                            Pengumuman Terbaru
                        </h3>
                        <div class="space-y-4">
                            @php
                                $recentPengumuman = \App\Models\Pengumuman::active()
                                    ->where('id', '!=', $pengumuman->id)
                                    ->latest()
                                    ->take(5)
                                    ->get();
                            @endphp
                            
                            @foreach($recentPengumuman as $recent)
                            <a href="{{ route('pengumuman.detail', $recent->slug) }}" class="block group">
                                <div class="flex items-start space-x-3 p-3 rounded-xl hover:bg-blue-50 transition-all duration-300 border border-transparent hover:border-blue-200">
                                    <div class="bg-blue-100 text-blue-600 p-2 rounded-lg group-hover:scale-110 transition-transform">
                                        <i class="fas fa-bullhorn text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 text-sm leading-tight group-hover:text-blue-600 transition-colors mb-1">
                                            {{ Str::limit($recent->judul, 50) }}
                                        </h4>
                                        <p class="text-xs text-gray-500">
                                            {{ $recent->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Info Penting -->
                <div class="content-animation" style="animation-delay: 0.6s">
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white shadow-2xl">
                        <h3 class="text-xl font-bold mb-4 flex items-center">
                            <i class="fas fa-exclamation-circle mr-3"></i>
                            Info Penting
                        </h3>
                        <ul class="space-y-3 text-sm">
                            <li class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-yellow-300"></i>
                                <span>Periksa berkala untuk update</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-yellow-300"></i>
                                <span>Download lampiran jika tersedia</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-yellow-300"></i>
                                <span>Hubungi admin jika ada kendala</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
    </div>

    <!-- Navigation Buttons -->
    <div class="content-animation mt-12" style="animation-delay: 0.8s">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center shadow-lg">
                <i class="fas fa-arrow-left mr-3"></i>
                Kembali ke Daftar Pengumuman
            </a>
            
            <div class="flex items-center space-x-4 text-gray-600">
                <span class="text-sm font-semibold">Bagikan:</span>
                <div class="flex space-x-2">
                    <button onclick="shareSocial('whatsapp')" class="bg-green-500 text-white p-3 rounded-xl hover:bg-green-600 transition-all">
                        <i class="fab fa-whatsapp"></i>
                    </button>
                    <button onclick="shareSocial('telegram')" class="bg-blue-500 text-white p-3 rounded-xl hover:bg-blue-600 transition-all">
                        <i class="fab fa-telegram"></i>
                    </button>
                    <button onclick="copyLink()" class="bg-purple-500 text-white p-3 rounded-xl hover:bg-purple-600 transition-all">
                        <i class="fas fa-link"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Animasi saat scroll
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.content-animation').forEach(el => {
            el.style.animationPlayState = 'paused';
            observer.observe(el);
        });
    });

    // Share functionality
    function shareContent() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $pengumuman->judul }}',
                text: '{{ Str::limit(strip_tags($pengumuman->konten), 100) }}',
                url: window.location.href
            });
        } else {
            copyLink();
        }
    }

    function shareSocial(platform) {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent('{{ $pengumuman->judul }}');
        
        let shareUrl = '';
        switch(platform) {
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                break;
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                break;
            case 'whatsapp':
                shareUrl = `https://wa.me/?text=${title}%20${url}`;
                break;
            case 'telegram':
                shareUrl = `https://t.me/share/url?url=${url}&text=${title}`;
                break;
        }
        
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }

    function copyLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            // Show notification
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-xl shadow-2xl font-semibold z-50';
            notification.textContent = 'Link berhasil disalin!';
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        });
    }

    // Print functionality dengan styling
    function printContent() {
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>{{ $pengumuman->judul }}</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 40px; }
                    .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #1e3a8a; padding-bottom: 20px; }
                    .title { color: #1e3a8a; font-size: 24px; font-weight: bold; }
                    .meta { color: #666; margin: 10px 0; }
                    .content { line-height: 1.6; }
                </style>
            </head>
            <body>
                <div class="header">
                    <div class="title">{{ $pengumuman->judul }}</div>
                    <div class="meta">
                        SMKN 2 Kudus - {{ $pengumuman->created_at->translatedFormat('d F Y') }}
                    </div>
                </div>
                <div class="content">${document.querySelector('.prose').innerHTML}</div>
            </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    }
</script>
@endsection