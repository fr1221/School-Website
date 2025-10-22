@extends('layouts.app')

@section('title', $prestasi->judul . ' - Prestasi SMKN 2 Kudus')

@section('styles')
<style>
    .achievement-hero {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #b45309 100%);
        position: relative;
        overflow: hidden;
    }
    .achievement-hero::before {
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
    .medal-glow {
        filter: drop-shadow(0 0 40px rgba(255, 215, 0, 0.7));
        animation: pulseGlow 2s ease-in-out infinite alternate;
    }
    @keyframes pulseGlow {
        from { filter: drop-shadow(0 0 30px rgba(255, 215, 0, 0.5)); }
        to { filter: drop-shadow(0 0 50px rgba(255, 215, 0, 0.8)); }
    }
    .achievement-badge {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        transform: rotate(-5deg);
        box-shadow: 0 20px 40px rgba(245, 158, 11, 0.3);
    }
    .timeline-item {
        position: relative;
        padding-left: 2rem;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.5rem;
        width: 12px;
        height: 12px;
        background: #f59e0b;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 3px #f59e0b;
    }
    .stats-card {
        background: linear-gradient(135deg, #ffffff 0%, #fefce8 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(254, 243, 199, 0.5);
    }
</style>
@endsection

@section('content')
<!-- Breadcrumb -->
<section class="bg-gradient-to-r from-yellow-50 to-orange-50 py-6 border-b border-yellow-200">
    <div class="container mx-auto px-4">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="{{ route('home') }}" class="text-yellow-600 hover:text-yellow-800 font-semibold flex items-center group">
                <i class="fas fa-home mr-2 group-hover:scale-110 transition-transform"></i>Beranda
            </a>
            <i class="fas fa-chevron-right text-yellow-400 text-xs"></i>
            <a href="{{ route('prestasi') }}" class="text-yellow-600 hover:text-yellow-800 font-semibold flex items-center group">
                <i class="fas fa-trophy mr-2 group-hover:scale-110 transition-transform"></i>Prestasi
            </a>
            <i class="fas fa-chevron-right text-yellow-400 text-xs"></i>
            <span class="text-gray-600 font-semibold truncate max-w-xs">{{ Str::limit($prestasi->judul, 40) }}</span>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="achievement-hero text-white py-20 relative">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-8">
                <div class="medal-glow inline-block mb-6">
                    <i class="fas fa-trophy text-8xl text-yellow-200"></i>
                </div>
                <div class="achievement-badge inline-block px-6 py-2 rounded-full text-yellow-900 font-bold text-lg mb-6">
                    🏆 PRESTASI GEMILANG 🏆
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">{{ $prestasi->judul }}</h1>
                <p class="text-2xl text-yellow-100 mb-8 leading-relaxed max-w-3xl mx-auto">
                    {{ $prestasi->deskripsi }}
                </p>
            </div>

            <!-- Achievement Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="stats-card rounded-2xl p-6 text-center backdrop-blur-md border border-yellow-200">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">
                        <i class="fas fa-calendar-star"></i>
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-1">{{ $prestasi->created_at->format('Y') }}</div>
                    <div class="text-sm text-gray-600">Tahun</div>
                </div>
                <div class="stats-card rounded-2xl p-6 text-center backdrop-blur-md border border-yellow-200">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="text-lg font-bold text-gray-800 mb-1">{{ $prestasi->lokasi ?? 'Nasional' }}</div>
                    <div class="text-sm text-gray-600">Lokasi</div>
                </div>
                <div class="stats-card rounded-2xl p-6 text-center backdrop-blur-md border border-yellow-200">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-1">{{ $prestasi->peserta_count ?? 'Team' }}</div>
                    <div class="text-sm text-gray-600">Peserta</div>
                </div>
                <div class="stats-card rounded-2xl p-6 text-center backdrop-blur-md border border-yellow-200">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-1">{{ $prestasi->peringkat ?? 'Juara' }}</div>
                    <div class="text-sm text-gray-600">Peringkat</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute bottom-10 left-10 opacity-20">
        <i class="fas fa-star text-4xl text-yellow-200 floating" style="animation-delay: 0s"></i>
    </div>
    <div class="absolute top-10 right-10 opacity-20">
        <i class="fas fa-award text-5xl text-yellow-200 floating" style="animation-delay: 1s"></i>
    </div>
</section>

<!-- Main Content -->
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Achievement Details -->
            <section class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-info-circle text-yellow-500 mr-4"></i>
                        Detail Prestasi
                    </h2>
                    <div class="flex space-x-3">
                        <button onclick="window.print()" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-200 transition-all duration-300 font-semibold">
                            <i class="fas fa-print mr-2"></i>Print
                        </button>
                        <button onclick="shareAchievement()" class="bg-yellow-500 text-white px-4 py-2 rounded-xl hover:bg-yellow-600 transition-all duration-300 font-semibold">
                            <i class="fas fa-share-alt mr-2"></i>Share
                        </button>
                    </div>
                </div>

                <div class="prose max-w-none text-gray-700 text-lg leading-relaxed">
                    <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl p-6 mb-8 border border-yellow-200">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-trophy text-yellow-500 mr-3"></i>
                            Tentang Prestasi Ini
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $prestasi->deskripsi_lengkap ?? 'Prestasi ini merupakan bukti nyata dedikasi dan kerja keras siswa-siswi SMKN 2 Kudus dalam mengukir prestasi di kancah kompetisi. Dengan semangat pantang menyerah dan inovasi tiada henti, tim berhasil mengharumkan nama sekolah di tingkat nasional.' }}
                        </p>
                    </div>

                    <!-- Timeline -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-history text-yellow-500 mr-3"></i>
                            Timeline Pencapaian
                        </h3>
                        <div class="space-y-4">
                            <div class="timeline-item">
                                <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                                    <h4 class="font-bold text-gray-800 text-lg mb-2">Pendaftaran & Seleksi</h4>
                                    <p class="text-gray-600">Proses seleksi internal dan persiapan tim</p>
                                    <span class="text-sm text-yellow-600 font-semibold">2 Bulan Sebelum</span>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                                    <h4 class="font-bold text-gray-800 text-lg mb-2">Pelatihan Intensif</h4>
                                    <p class="text-gray-600">Sesi latihan dan persiapan teknis</p>
                                    <span class="text-sm text-yellow-600 font-semibold">1 Bulan Sebelum</span>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="bg-white border border-yellow-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 bg-yellow-50">
                                    <h4 class="font-bold text-gray-800 text-lg mb-2">Kompetisi Utama</h4>
                                    <p class="text-gray-600">Pelaksanaan kompetisi dan presentasi</p>
                                    <span class="text-sm text-yellow-600 font-semibold">Hari-H</span>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="bg-white border border-green-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 bg-green-50">
                                    <h4 class="font-bold text-gray-800 text-lg mb-2">Pengumuman Pemenang</h4>
                                    <p class="text-gray-600">Pengumuman hasil dan penyerahan penghargaan</p>
                                    <span class="text-sm text-green-600 font-semibold">Selesai</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Impact Section -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-200">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-chart-line text-blue-500 mr-3"></i>
                            Dampak & Pencapaian
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-start space-x-4">
                                <div class="bg-blue-500 text-white p-3 rounded-xl">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-2">Pengakuan Nasional</h4>
                                    <p class="text-gray-600 text-sm">Mendapat pengakuan dari Kementerian Pendidikan dan dunia industri</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="bg-green-500 text-white p-3 rounded-xl">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-2">Peluang Karir</h4>
                                    <p class="text-gray-600 text-sm">Membuka kesempatan magang dan kerja di perusahaan ternama</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="bg-purple-500 text-white p-3 rounded-xl">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-2">Inspirasi</h4>
                                    <p class="text-gray-600 text-sm">Menjadi inspirasi bagi siswa lainnya untuk berprestasi</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="bg-orange-500 text-white p-3 rounded-xl">
                                    <i class="fas fa-school"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-2">Reputasi Sekolah</h4>
                                    <p class="text-gray-600 text-sm">Meningkatkan reputasi SMKN 2 Kudus di tingkat nasional</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Team Members -->
            <section class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center">
                    <i class="fas fa-users text-yellow-500 mr-4"></i>
                    Tim Peraih Prestasi
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach(['Muhammad Rizki', 'Siti Aisyah', 'Ahmad Fauzi', 'Dewi Sartika', 'Budi Santoso'] as $member)
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 text-center border border-gray-200 hover:shadow-lg transition-all duration-300 group">
                        <div class="w-20 h-20 bg-yellow-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-user-graduate text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">{{ $member }}</h3>
                        <p class="text-gray-600 text-sm mb-3">Siswa Berprestasi</p>
                        <div class="flex justify-center space-x-2">
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-semibold">XI TJAT</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Quick Info -->
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-blue-500 mr-3"></i>
                    Info Cepat
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Tingkat</span>
                        <span class="font-semibold text-blue-600">Nasional</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Kategori</span>
                        <span class="font-semibold text-green-600">Teknologi</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Peringkat</span>
                        <span class="font-semibold text-yellow-600">Juara 1</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600">Tahun</span>
                        <span class="font-semibold text-purple-600">2024</span>
                    </div>
                </div>
            </div>

            <!-- Related Achievements -->
            <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl p-6 text-white">
                <h3 class="text-xl font-bold mb-4 flex items-center">
                    <i class="fas fa-trophy mr-3"></i>
                    Prestasi Lainnya
                </h3>
                <div class="space-y-3">
                    @foreach(['Juara 1 Lomba Robotik Nasional', 'Finalis Kompetisi Programming', 'Medali Emas Olimpiade Sains'] as $achievement)
                    <a href="#" class="block bg-white/20 backdrop-blur-md rounded-xl p-3 hover:bg-white/30 transition-all duration-300 group">
                        <div class="flex items-center space-x-3">
                            <div class="bg-white/30 p-2 rounded-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-medal text-yellow-200"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-sm">{{ $achievement }}</h4>
                                <p class="text-yellow-100 text-xs">2024</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- CTA KontekAI -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 text-white text-center">
                <div class="bg-white/20 p-4 rounded-2xl inline-block mb-4">
                    <i class="fas fa-robot text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Butuh Informasi?</h3>
                <p class="text-blue-100 text-sm mb-4">Tanya KontekAI tentang prestasi dan program kami</p>
                <a href="{{ route('kontekai') }}" class="bg-yellow-400 text-gray-900 px-6 py-3 rounded-xl font-bold hover:bg-yellow-300 transition-all duration-300 inline-flex items-center justify-center w-full shadow-lg">
                    <i class="fas fa-comments mr-2"></i>
                    Tanya KontekAI
                </a>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-gray-900 to-gray-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Terinspirasi oleh <span class="text-yellow-300">Prestasi Kami?</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                Bergabunglah dengan SMKN 2 Kudus dan jadilah bagian dari generasi penerus 
                yang akan mengukir prestasi gemilang berikutnya.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="{{ route('kontekai') }}" class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-yellow-300 transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center shadow-2xl">
                    <i class="fas fa-robot mr-3 text-xl"></i>
                    Konsultasi dengan KontekAI
                </a>
                <a href="{{ route('prestasi') }}" class="bg-white/20 backdrop-blur-md text-white px-8 py-4 rounded-2xl font-bold text-lg border border-white/30 hover:bg-white/30 transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                    <i class="fas fa-trophy mr-3 text-xl"></i>
                    Lihat Prestasi Lainnya
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function shareAchievement() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $prestasi->judul }} - SMKN 2 Kudus',
                text: '{{ $prestasi->deskripsi }}',
                url: window.location.href
            });
        } else {
            // Fallback untuk browser yang tidak support Web Share API
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent('Lihat prestasi kami: {{ $prestasi->judul }}');
            window.open(`https://wa.me/?text=${text}%20${url}`, '_blank');
        }
    }

    // Add floating animation
    document.addEventListener('DOMContentLoaded', function() {
        const floatingElements = document.querySelectorAll('.floating');
        floatingElements.forEach((el, index) => {
            el.style.animationDelay = `${index * 0.5}s`;
        });
    });
</script>
@endsection