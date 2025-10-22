@extends('layouts.app')

@section('title', 'Pengumuman Resmi - SMKN 2 Kudus')

@section('styles')
<style>
    .announcement-hero {
        background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 50%, #5b21b6 100%);
        position: relative;
        overflow: hidden;
    }
    .announcement-hero::before {
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
    .announcement-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
    }
    .announcement-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }
    .urgent-badge {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        animation: pulse 2s infinite;
        box-shadow: 0 0 20px rgba(220, 38, 38, 0.4);
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    .priority-high {
        border-left: 6px solid #dc2626;
        background: linear-gradient(135deg, #fef2f2, #fecaca);
    }
    .priority-medium {
        border-left: 6px solid #d97706;
        background: linear-gradient(135deg, #fffbeb, #fed7aa);
    }
    .priority-low {
        border-left: 6px solid #059669;
        background: linear-gradient(135deg, #f0fdf4, #bbf7d0);
    }
    .filter-btn {
        transition: all 0.3s ease;
    }
    .filter-btn.active {
        background: linear-gradient(135deg, #7c3aed, #6d28d9);
        color: white;
        box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
    }
    .floating {
        animation: floating 3s ease-in-out infinite;
    }
    @keyframes floating {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="announcement-hero text-white py-20 relative">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Animated Icons -->
            <div class="flex justify-center space-x-6 mb-6">
                <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md">
                    <i class="fas fa-bullhorn text-3xl text-purple-200"></i>
                </div>
                <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md">
                    <i class="fas fa-bell text-3xl text-purple-200"></i>
                </div>
                <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-md">
                    <i class="fas fa-megaphone text-3xl text-purple-200"></i>
                </div>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                <span class="text-purple-200">Pengumuman</span> Resmi
            </h1>
            <p class="text-xl md:text-2xl text-purple-100 mb-8 leading-relaxed">
                Informasi penting dan pengumuman resmi dari SMKN 2 Kudus
            </p>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto">
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 border border-white/30">
                    <div class="text-2xl font-bold text-purple-200 mb-1">{{ $pengumuman->total() }}+</div>
                    <div class="text-sm text-purple-100">Total Pengumuman</div>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 border border-white/30">
                    <div class="text-2xl font-bold text-purple-200 mb-1">{{ rand(5, 15) }}</div>
                    <div class="text-sm text-purple-100">Bulan Ini</div>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 border border-white/30">
                    <div class="text-2xl font-bold text-purple-200 mb-1">{{ rand(3, 8) }}</div>
                    <div class="text-sm text-purple-100">Penting</div>
                </div>
                <div class="bg-white/20 backdrop-blur-md rounded-2xl p-4 border border-white/30">
                    <div class="text-2xl font-bold text-purple-200 mb-1">24/7</div>
                    <div class="text-sm text-purple-100">Update</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-10 left-10 opacity-20">
        <i class="fas fa-bullhorn text-4xl text-purple-200 floating" style="animation-delay: 0s"></i>
    </div>
    <div class="absolute bottom-20 right-20 opacity-20">
        <i class="fas fa-bell text-5xl text-purple-200 floating" style="animation-delay: 1s"></i>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="py-12 bg-white border-b border-gray-200 sticky top-0 z-40 backdrop-blur-md bg-white/95">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
            <!-- Page Info -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar Pengumuman</h2>
                <p class="text-gray-600">Informasi resmi dan penting dari sekolah</p>
            </div>

            <!-- Search & Filter -->
            <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                <!-- Search -->
                <div class="relative flex-1 lg:w-80">
                    <input type="text" placeholder="Cari pengumuman..." 
                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>

                <!-- Filter Buttons -->
                <div class="flex gap-2">
                    <button class="filter-btn active bg-gradient-to-r from-purple-600 to-purple-700 text-white px-6 py-3 rounded-2xl font-semibold hover:shadow-lg transition-all">
                        <i class="fas fa-filter mr-2"></i>Semua
                    </button>
                    <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-semibold hover:bg-gray-200 transition-all">
                        <i class="fas fa-exclamation-circle mr-2"></i>Penting
                    </button>
                    <button class="filter-btn bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-semibold hover:bg-gray-200 transition-all">
                        <i class="fas fa-info-circle mr-2"></i>Informasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Urgent Announcements -->
<section class="py-12 bg-gradient-to-br from-red-50 to-orange-100 border-b border-red-200">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
                Pengumuman Penting
            </h2>
            <div class="urgent-badge px-4 py-2 rounded-full text-white text-sm font-bold">
                <i class="fas fa-bolt mr-1"></i>URGENT
            </div>
        </div>

        @if($pengumuman->count() > 0)
            @php $urgent = $pengumuman->first(); @endphp
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-red-200 priority-high">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Icon Section -->
                    <div class="bg-gradient-to-r from-red-500 to-red-600 p-8 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-exclamation-circle text-white text-6xl mb-4"></i>
                            <h3 class="text-2xl font-bold text-white">Penting!</h3>
                            <p class="text-red-100">Segera dibaca</p>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8 flex flex-col justify-center">
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-fire mr-1"></i>Urgent
                            </span>
                            <span class="text-gray-500 text-sm">
                                <i class="fas fa-clock mr-1"></i>{{ $urgent->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <h3 class="text-3xl font-bold text-gray-800 mb-4 leading-tight">
                            {{ $urgent->judul }}
                        </h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ Str::limit(strip_tags($urgent->konten), 200) }}
                        </p>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-eye mr-1"></i>
                                    <span>{{ rand(1000, 5000) }} views</span>
                                </div>
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-download mr-1"></i>
                                    <span>{{ rand(50, 200) }} downloads</span>
                                </div>
                            </div>

                            <a href="{{ route('pengumuman.detail', $urgent->slug) }}" 
                               class="bg-gradient-to-r from-red-600 to-red-700 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 inline-flex items-center group">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Announcements Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-list-ol text-purple-500 mr-3"></i>
                Semua Pengumuman
            </h2>
            <div class="text-gray-600">
                Menampilkan <span class="font-bold text-purple-600">{{ $pengumuman->count() }}</span> pengumuman
            </div>
        </div>

        @if($pengumuman->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($pengumuman->skip(1) as $item)
            @php
                $priority = ['priority-high', 'priority-medium', 'priority-low'][rand(0, 2)];
                $icons = ['bullhorn', 'bell', 'info-circle', 'exclamation-triangle', 'calendar-alt'];
                $icon = $icons[rand(0, 4)];
            @endphp
            
            <article class="announcement-card rounded-2xl shadow-xl overflow-hidden border border-gray-100 group {{ $priority }}">
                <!-- Header -->
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-purple-100 text-purple-600 p-3 rounded-xl">
                                <i class="fas fa-{{ $icon }}"></i>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500">Pengumuman</span>
                                <div class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        @if($priority == 'priority-high')
                        <span class="bg-red-500 text-white px-2 py-1 rounded text-xs font-bold">
                            <i class="fas fa-exclamation mr-1"></i>Penting
                        </span>
                        @elseif($priority == 'priority-medium')
                        <span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs font-bold">
                            <i class="fas fa-info mr-1"></i>Info
                        </span>
                        @else
                        <span class="bg-green-500 text-white px-2 py-1 rounded text-xs font-bold">
                            <i class="fas fa-check mr-1"></i>Biasa
                        </span>
                        @endif
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3 leading-tight group-hover:text-purple-600 transition-colors">
                        {{ $item->judul }}
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                        {{ Str::limit(strip_tags($item->konten), 120) }}
                    </p>
                </div>

                <!-- Footer -->
                <div class="p-6 bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span class="flex items-center">
                                <i class="fas fa-eye mr-1"></i>{{ rand(100, 800) }}
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-calendar mr-1"></i>{{ $item->created_at->format('d/m/Y') }}
                            </span>
                        </div>

                        <a href="{{ route('pengumuman.detail', $item->slug) }}" 
                           class="text-purple-600 hover:text-purple-700 font-semibold text-sm inline-flex items-center group">
                            Baca Detail
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
                {{ $pengumuman->links() }}
            </div>
        </div>

        @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl p-12 max-w-2xl mx-auto border border-gray-200">
                <div class="bg-purple-100 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-bullhorn text-purple-600 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Belum Ada Pengumuman</h3>
                <p class="text-gray-500 mb-6">Pengumuman resmi akan ditampilkan di sini. Pantau terus untuk informasi terbaru!</p>
                <a href="{{ route('home') }}" class="bg-gradient-to-r from-purple-600 to-purple-700 text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition-all inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Info Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">
                Mengapa <span class="text-purple-600">Pengumuman Resmi</span> Penting?
            </h2>
            <p class="text-xl text-gray-600 mb-12 max-w-2xl mx-auto leading-relaxed">
                Pengumuman resmi memastikan informasi yang akurat dan terpercaya 
                sampai kepada seluruh warga sekolah secara tepat waktu.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Terpercaya</h3>
                    <p class="text-gray-600">Informasi langsung dari sumber resmi sekolah</p>
                </div>

                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bolt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Tepat Waktu</h3>
                    <p class="text-gray-600">Update informasi secara real-time dan cepat</p>
                </div>

                <div class="text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check-circle text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Akurat</h3>
                    <p class="text-gray-600">Data yang valid dan dapat dipertanggungjawabkan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-purple-600 to-purple-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-12 border border-white/20">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Tidak Ingin <span class="text-yellow-300">Ketinggalan</span> Info?
                </h2>
                <p class="text-xl text-purple-100 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Aktifkan notifikasi dan dapatkan pengumuman terbaru langsung 
                    di perangkat Anda. Informasi penting tidak akan terlewat.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <a href="{{ route('kontekai') }}" class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-yellow-300 transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center shadow-2xl">
                        <i class="fas fa-robot mr-3 text-xl"></i>
                        Tanya KontekAI
                    </a>
                    <button class="bg-white/20 backdrop-blur-md text-white px-8 py-4 rounded-2xl font-bold text-lg border border-white/30 hover:bg-white/30 transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                        <i class="fas fa-bell mr-3 text-xl"></i>
                        Aktifkan Notifikasi
                    </button>
                </div>
                
                <p class="text-purple-200 text-sm mt-6">
                    <i class="fas fa-shield-alt mr-2"></i>Notifikasi aman dan tidak mengganggu
                </p>
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
            const announcementCards = document.querySelectorAll('.announcement-card');
            
            announcementCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const content = card.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || content.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Filter functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-gradient-to-r', 'from-purple-600', 'to-purple-700', 'text-white');
                    btn.classList.add('bg-gray-100', 'text-gray-700');
                });
                
                // Add active class to clicked button
                this.classList.remove('bg-gray-100', 'text-gray-700');
                this.classList.add('active', 'bg-gradient-to-r', 'from-purple-600', 'to-purple-700', 'text-white');
                
                // Show notification
                const filter = this.textContent.trim();
                showNotification(`Menampilkan: ${filter}`);
            });
        });

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-purple-500 text-white px-6 py-3 rounded-xl shadow-2xl font-semibold z-50 transform translate-x-full transition-transform duration-300';
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

        // Priority highlighting
        const highPriorityCards = document.querySelectorAll('.priority-high');
        highPriorityCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.03)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    });
</script>
@endsection