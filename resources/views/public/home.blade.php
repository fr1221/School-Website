@extends('layouts.app')

@section('title', 'SMKN 2 Kudus - Beranda')

@section('content')

<style>
    /* Loading Screen Styles */
    #loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 0.8s ease-out, visibility 0.8s ease-out;
    }
    
    .loading-logo {
        width: 120px;
        height: 120px;
        margin-bottom: 30px;
        position: relative;
    }
    
    .loading-logo-inner {
        width: 100%;
        height: 100%;
        background: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2.5rem;
        font-weight: bold;
        color: #1e3c72;
        animation: pulse 2s infinite alternate;
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
    }
    
    .loading-text {
        color: white;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .loading-bar-container {
        width: 300px;
        height: 6px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        overflow: hidden;
    }
    
    .loading-bar {
        height: 100%;
        width: 0%;
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        border-radius: 10px;
        transition: width 0.3s ease;
    }
    
    @keyframes pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 20px rgba(255, 255, 255, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
    }
    
    /* Modern Search Bar */
    .modern-search {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    
    .modern-search:focus-within {
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }
    
    .modern-search input {
        background: transparent;
        color: white;
    }
    
    .modern-search input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }
    
    /* Animations */
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .slide-in-left {
        opacity: 0;
        transform: translateX(-50px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .slide-in-left.visible {
        opacity: 1;
        transform: translateX(0);
    }
    
    .slide-in-right {
        opacity: 0;
        transform: translateX(50px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .slide-in-right.visible {
        opacity: 1;
        transform: translateX(0);
    }
    
    .zoom-in {
        opacity: 0;
        transform: scale(0.9);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .zoom-in.visible {
        opacity: 1;
        transform: scale(1);
    }
    
    /* Card hover effects */
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    /* Jurusan card active state */
    .jurusan-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }
    
    .jurusan-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
        transition: left 0.6s ease;
    }
    
    .jurusan-card:hover::before {
        left: 100%;
    }
    
    .jurusan-card.active {
        border: 2px solid #3b82f6;
        box-shadow: 0 15px 35px rgba(59, 130, 246, 0.2);
        transform: translateY(-5px);
    }
    
    .jurusan-card.active .jurusan-icon {
        transform: scale(1.1) rotate(5deg);
        background: linear-gradient(135deg, #3b82f6, #1e40af);
    }
    
    .jurusan-card.active .jurusan-icon i {
        color: white;
    }
    
    .jurusan-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border: 3px solid #dbeafe;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }
    
    .jurusan-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
        transform: rotate(45deg);
        transition: all 0.6s ease;
    }
    
    .jurusan-card:hover .jurusan-icon::before {
        transform: rotate(45deg) translate(50%, 50%);
    }
    
    .jurusan-icon i {
        font-size: 2rem;
        color: #3b82f6;
        transition: all 0.4s ease;
        position: relative;
        z-index: 2;
    }
    
    /* Jurusan Description Animations */
    .jurusan-desc {
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        opacity: 0;
        transform: translateY(30px);
        max-height: 0;
        overflow: hidden;
    }
    
    .jurusan-desc.active {
        opacity: 1;
        transform: translateY(0);
        max-height: 1000px;
    }
    
    .jurusan-desc h3 {
        position: relative;
        display: inline-block;
    }
    
    .jurusan-desc h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #3b82f6, #1e40af);
        border-radius: 2px;
    }
    
    .jurusan-desc ul li {
        position: relative;
        padding-left: 10px;
        transition: all 0.3s ease;
    }
    
    .jurusan-desc ul li::before {
        content: '▸';
        position: absolute;
        left: -15px;
        color: #3b82f6;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    
    .jurusan-desc ul li:hover {
        transform: translateX(10px);
        color: #1e40af;
    }
    
    .jurusan-desc ul li:hover::before {
        transform: scale(1.5);
        color: #1e40af;
    }
    
    /* Scrollbar styling */
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    
    /* Improved Search Bar Styles */
    .search-container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .search-form {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    
    @media (min-width: 640px) {
        .search-form {
            flex-direction: row;
        }
    }
    
    .search-form:focus-within {
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }
    
    .search-input-container {
        position: relative;
        flex-grow: 1;
        display: flex;
        align-items: center;
    }
    
    .search-icon {
        position: absolute;
        left: 20px;
        color: rgba(255, 255, 255, 0.8);
        z-index: 1;
    }
    
    .search-input {
        width: 100%;
        padding: 16px 20px 16px 60px;
        background: transparent;
        border: none;
        color: white;
        font-size: 16px;
        outline: none;
    }
    
    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }
    
    .search-button {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        color: white;
        border: none;
        padding: 16px 30px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    @media (max-width: 639px) {
        .search-button {
            border-radius: 0 0 25px 25px;
        }
    }
    
    @media (min-width: 640px) {
        .search-button {
            border-radius: 0 25px 25px 0;
        }
    }
    
    .search-button:hover {
        background: linear-gradient(90deg, #00f2fe, #4facfe);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    /* Additional Animations */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    .float-animation {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes typewriter {
        from { width: 0; }
        to { width: 100%; }
    }
    
    .typewriter {
        overflow: hidden;
        white-space: nowrap;
        animation: typewriter 3s steps(40) 1s both;
    }
    
    /* Staggered animations for cards */
    .stagger-item {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
    
    .stagger-item.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Pulse animation for active jurusan */
    @keyframes pulse-glow {
        0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
        70% { box-shadow: 0 0 0 15px rgba(59, 130, 246, 0); }
        100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
    }
    
    .pulse-glow {
        animation: pulse-glow 2s infinite;
    }
</style>
</head>
<body class="font-sans">
    <!-- Loading Screen -->
    <div id="loading-screen">
        <div class="loading-logo">
            <div class="loading-logo-inner">S2K</div>
        </div>
        <div class="loading-text">SMKN 2 Kudus</div>
        <div class="loading-bar-container">
            <div class="loading-bar" id="loading-progress"></div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative flex flex-col justify-center items-center text-white text-center min-h-screen bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="relative z-10 container mx-auto px-4 sm:px-6">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-shadow leading-tight fade-in">
                SELAMAT DATANG<br>
                <span class="block text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-blue-100 typewriter">DI SMKN 2 KUDUS</span>
            </h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-10 text-shadow font-light max-w-3xl mx-auto fade-in" style="transition-delay: 0.2s">Maju Bersama, Unggul Berkarakter</p>
            <div class="flex flex-col sm:flex-row justify-center gap-6 mb-12 fade-in" style="transition-delay: 0.4s">
                <a href="/KontekAI" class="btn-primary text-white px-8 py-4 rounded-full font-semibold shadow-lg inline-flex items-center float-animation">
                    <i class="fas fa-robot mr-2"></i> KontekAI
                </a>
                <a href="{{ route('berita') }}" class="bg-white bg-opacity-20 text-white px-8 py-4 rounded-full font-semibold hover:bg-opacity-30 shadow-lg transition-all duration-300 border border-white border-opacity-30 inline-flex items-center float-animation" style="animation-delay: 0.5s">
                    <i class="fas fa-newspaper mr-2"></i> Berita Terbaru
                </a>
            </div>
            
            <!-- Improved Search Bar -->
            <div class="search-container fade-in" style="transition-delay: 0.6s">
                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <div class="search-input-container">
                        <div class="search-icon">
                            <i class="fas fa-search text-lg"></i>
                        </div>
                        <input type="search" name="q" placeholder="Cari informasi, berita, atau pengumuman..." class="search-input">
                    </div>
                    <button type="submit" class="search-button">
                        <span class="hidden sm:inline">Cari</span>
                        <i class="fas fa-arrow-right text-sm"></i>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Animated Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div class="absolute -top-10 -left-10 w-20 h-20 rounded-full bg-white opacity-10 float-animation" style="animation-delay: 0s"></div>
            <div class="absolute top-1/4 -right-5 w-16 h-16 rounded-full bg-white opacity-10 float-animation" style="animation-delay: 1s"></div>
            <div class="absolute bottom-1/3 left-1/4 w-12 h-12 rounded-full bg-white opacity-10 float-animation" style="animation-delay: 2s"></div>
            <div class="absolute bottom-1/4 right-1/3 w-14 h-14 rounded-full bg-white opacity-10 float-animation" style="animation-delay: 1.5s"></div>
        </div>
    </section>

    <!-- Profil & Pengumuman Section -->
    <section id="pengumuman" class="py-16 bg-gradient-to-b from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <h2 class="section-title text-blue-800 text-3xl md:text-4xl font-bold text-center mb-12 slide-in-left">Profil & Pengumuman</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Pengumuman -->
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg overflow-hidden card-hover slide-in-right">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-5">
                        <h2 class="text-2xl font-bold flex items-center gap-2">
                            <i class="fas fa-bullhorn"></i> Pengumuman Terbaru
                        </h2>
                    </div>
                    
                    <div class="p-6 space-y-6">
                        @foreach($pengumuman as $index => $item)
                        <article class="flex flex-col sm:flex-row items-start p-4 rounded-xl hover:bg-blue-50 transition-all duration-200 shadow-sm hover:shadow-md stagger-item" style="transition-delay: {{ $index * 0.1 }}s">
                            <div class="w-24 h-32 rounded-lg bg-blue-100 flex items-center justify-center mr-4 mb-4 sm:mb-0 flex-shrink-0">
                                <i class="fas fa-bullhorn text-blue-600 text-2xl"></i>
                            </div>
                            
                            <div class="flex flex-col justify-between w-full text-left">
                                <div>
                                    <h3 class="font-bold text-lg text-gray-800 leading-snug">{{ $item->judul }}</h3>
                                    <p class="text-sm text-gray-700 mt-2 text-justify leading-relaxed">
                                        {{ Str::limit(strip_tags($item->konten), 150) }}
                                    </p>
                                </div>
                                <div class="text-left mt-3">
                                    <a href="{{ route('pengumuman.detail', $item->slug) }}" class="text-blue-600 text-sm font-medium hover:text-blue-800 hover:underline transition-all duration-150">
                                        Detail &rarr;
                                    </a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
                
                <!-- Kepala Sekolah -->
                <div class="bg-white rounded-2xl shadow-lg p-6 card-hover zoom-in">
                    <div class="flex justify-center">
                        <div class="w-32 h-32 bg-blue-100 rounded-full mb-4 border-4 border-blue-200 flex items-center justify-center float-animation">
                            <i class="fas fa-user-tie text-blue-600 text-4xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-1 text-center">Sambutan Kepala Sekolah</h3>
                    <h4 class="text-lg font-semibold mb-3 text-blue-700 text-center">Budi Susanto, S.Pd., M.Pd.</h4>
                    <div class="prose prose-sm max-w-none">
                        <p class="text-sm mb-2">Assalamu'alaikum Warahmatullahi Wabarakatuh.</p>
                        <p class="text-sm mb-2">Puji syukur kita panjatkan kehadirat Allah SWT, Tuhan Yang Maha Pengasih lagi Maha Penyayang. Hanya dengan rahmat dan ridha-Nya kita dapat melaksanakan kegiatan pendidikan dalam rangka mencerdaskan generasi bangsa.</p>
                        <p class="text-sm">Pada kesempatan ini, kami mengajak seluruh warga sekolah untuk terus berinovasi dan berprestasi.</p>
                    </div>
                    <a href="#pengumuman" class="block mt-4 w-full text-center border-2 border-blue-600 text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-blue-600 hover:text-white transition duration-300">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Unggulan Section -->
    <section id="layanan" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="section-title text-white text-3xl md:text-4xl font-bold mb-12 slide-in-left">Fitur Unggulan</h2>
            
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="flex flex-col items-center w-full lg:w-1/2">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl shadow-lg w-full mt-6 zoom-in">
                        <div class="w-full h-64 bg-blue-500 rounded-lg shadow-md flex items-center justify-center float-animation">
                            <i class="fas fa-laptop-code text-white text-6xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/2 text-center lg:text-left slide-in-right">
                    <h3 class="text-2xl font-bold mb-4">MELPIN (Melu Pinter)</h3>
                    <p class="text-lg mb-6">MELPIN adalah platform E-Learning resmi dari jurusan Teknik Jaringan Komputer dan Telekomunikasi (TJKT) yang menyediakan materi interaktif dan E-BOOK untuk mendukung pembelajaran siswa.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="https://melupinter.com" target="_blank" class="btn-primary inline-flex items-center px-6 py-3 rounded-full text-white float-animation">
                            <i class="fas fa-chalkboard-teacher mr-2"></i>
                            Akses MELPIN
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jurusan Section -->
    <section id="jurusan" class="py-16 bg-gradient-to-b from-gray-50 to-blue-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="section-title text-blue-800 text-3xl md:text-4xl font-bold mb-12 slide-in-left">Paket Keahlian SKADAKU</h2>

            <!-- Jurusan Selector -->
            <div class="flex flex-wrap justify-center gap-6 mb-12 mt-12">
                <!-- TAV -->
                <div class="text-center max-w-xs cursor-pointer jurusan-card bg-white rounded-xl shadow-lg p-6 stagger-item" data-jurusan="tav" style="transition-delay: 0.1s">
                    <div class="jurusan-icon">
                        <i class="fas fa-tv"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Teknik Audio Video</h3>
                    <p class="text-sm text-gray-600">Spesialisasi dalam perangkat keras dan perangkat lunak audio video.</p>
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-600 text-xs font-semibold rounded-full">Klik untuk detail</span>
                    </div>
                </div>

                <!-- TJKT -->
                <div class="text-center max-w-xs cursor-pointer jurusan-card bg-white rounded-xl shadow-lg p-6 active pulse-glow stagger-item" data-jurusan="tjkt" style="transition-delay: 0.2s">
                    <div class="jurusan-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Teknik Jaringan Komputer & Telekomunikasi (TJKT)</h3>
                    <p class="text-sm text-gray-600">Menguasai jaringan komputer, server, dan teknologi informasi.</p>
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full">Sedang Aktif</span>
                    </div>
                </div>

                <!-- TKRO -->
                <div class="text-center max-w-xs cursor-pointer jurusan-card bg-white rounded-xl shadow-lg p-6 stagger-item" data-jurusan="tkro" style="transition-delay: 0.3s">
                    <div class="jurusan-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Teknik Kendaraan Ringan Otomotif (TKRO)</h3>
                    <p class="text-sm text-gray-600">Menguasai perawatan dan perbaikan kendaraan ringan.</p>
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-600 text-xs font-semibold rounded-full">Klik untuk detail</span>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Jurusan -->
            <div class="bg-white rounded-2xl shadow-xl p-8 max-w-4xl mx-auto relative overflow-hidden">
                <!-- Animated Background -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-purple-500"></div>
                
                <!-- TJKT -->
                <div id="desc-tjkt" class="jurusan-desc active">
                    <h3 class="text-2xl font-bold text-center mb-4 text-blue-800">Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</h3>
                    <div class="prose prose-blue max-w-none text-left">
                        <p class="text-base mb-4">Jurusan ini berfokus pada ilmu berbasis Teknologi Informasi dan Komunikasi,
                            mencakup kemampuan algoritma, pemrograman komputer, perakitan komputer dan jaringan, serta pengoperasian
                            perangkat lunak dan internet.</p>
                        <p class="text-base mb-4 font-medium">Kompetensi yang Dipelajari:</p>
                        <ul class="pl-5 mb-4 space-y-2">
                            <li>Perakitan, instalasi, dan perawatan komputer serta laptop</li>
                            <li>Instalasi dan konfigurasi sistem operasi (Windows, Linux, dan server)</li>
                            <li>Jaringan komputer (LAN, WLAN, WAN, router, switch)</li>
                            <li>Administrasi server (web server, mail server, DNS, DHCP, Mikrotik, Cisco)</li>
                            <li>Dasar keamanan jaringan (firewall, enkripsi, monitoring)</li>
                            <li>Pemrograman dasar (HTML, CSS, JavaScript, Python)</li>
                            <li>Teknologi fiber optik dan dasar Internet of Things (IoT)</li>
                            <li>Analisis dan penyelesaian permasalahan hardware maupun software</li>
                        </ul>
                    </div>
                </div>

                <!-- TAV -->
                <div id="desc-tav" class="jurusan-desc">
                    <h3 class="text-2xl font-bold text-center mb-4 text-blue-800">Teknik Audio Video (TAV)</h3>
                    <div class="prose prose-blue max-w-none text-left">
                        <p class="text-base mb-4">Jurusan TAV berfokus pada penguasaan teknologi audio dan video seperti televisi,
                            radio, perangkat digital, serta sistem kontrol elektronik.</p>
                        <p class="text-base mb-4 font-medium">Kompetensi yang Dipelajari:</p>
                        <ul class="pl-5 mb-4 space-y-2">
                            <li>Instalasi perangkat audio dan video</li>
                            <li>Pemrograman mikrokontroler dan sistem otomatisasi</li>
                            <li>Teknologi sistem multimedia dan broadcasting</li>
                            <li>Perawatan dan perbaikan alat elektronik</li>
                            <li>Dasar kelistrikan dan rangkaian elektronik</li>
                        </ul>
                    </div>
                </div>

                <!-- TKRO -->
                <div id="desc-tkro" class="jurusan-desc">
                    <h3 class="text-2xl font-bold text-center mb-4 text-blue-800">Teknik Kendaraan Ringan Otomotif (TKRO)</h3>
                    <div class="prose prose-blue max-w-none text-left">
                        <p class="text-base mb-4">Jurusan TKRO membekali siswa dengan keahlian dalam bidang otomotif, khususnya
                            kendaraan ringan seperti mobil pribadi.</p>
                        <p class="text-base mb-4 font-medium">Kompetensi yang Dipelajari:</p>
                        <ul class="pl-5 mb-4 space-y-2">
                            <li>Sistem mesin dan pemeliharaannya</li>
                            <li>Sistem kelistrikan kendaraan</li>
                            <li>Chassis, sistem suspensi dan rem</li>
                            <li>Perawatan dan perbaikan kendaraan ringan</li>
                            <li>Penggunaan alat ukur dan peralatan bengkel</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Sekolah -->
    <section id="statistik" class="py-16 bg-gradient-to-b from-blue-50 to-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="section-title text-blue-800 text-3xl md:text-4xl font-bold mb-12 slide-in-left">Statistik Sekolah</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="stats-card bg-white rounded-xl shadow-lg p-6 text-center hover:-translate-y-2 transition-all duration-300 stagger-item" style="transition-delay: 0.1s">
                    <div class="text-green-500 text-6xl mb-4 flex justify-center float-animation">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="font-bold text-3xl text-gray-800">A</h3>
                    <p class="text-gray-600 mt-1">Akreditasi</p>
                </div>
                
                <div class="stats-card bg-white rounded-xl shadow-lg p-6 text-center hover:-translate-y-2 transition-all duration-300 stagger-item" style="transition-delay: 0.2s">
                    <div class="text-blue-600 text-6xl mb-4 flex justify-center float-animation">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="font-bold text-3xl text-gray-800 counter" data-target="1374">0</h3>
                    <p class="text-gray-600 mt-1">Siswa Aktif</p>
                </div>
                
                <div class="stats-card bg-white rounded-xl shadow-lg p-6 text-center hover:-translate-y-2 transition-all duration-300 stagger-item" style="transition-delay: 0.3s">
                    <div class="text-purple-600 text-6xl mb-4 flex justify-center float-animation">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="font-bold text-3xl text-gray-800 counter" data-target="5000">0</h3>
                    <p class="text-gray-600 mt-1">Lulusan</p>
                </div>
                
                <div class="stats-card bg-white rounded-xl shadow-lg p-6 text-center hover:-translate-y-2 transition-all duration-300 stagger-item" style="transition-delay: 0.4s">
                    <div class="text-yellow-500 text-6xl mb-4 flex justify-center float-animation">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="font-bold text-3xl text-gray-800 counter" data-target="89">0</h3>
                    <p class="text-gray-600 mt-1">Guru & Staff</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi Terbaru -->
    <section id="prestasi" class="py-16 bg-gradient-to-b from-blue-50 to-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="section-title text-blue-800 text-3xl md:text-4xl font-bold mb-12 slide-in-left">Prestasi Terbaru</h2>
            
            <div class="space-y-8">
                @foreach($prestasi as $index => $item)
                <article onclick="window.location.href='{{ route('prestasi.detail', $item->slug) }}'" class="bg-white rounded-2xl shadow-lg p-6 flex flex-col md:flex-row gap-8 card-hover cursor-pointer hover:shadow-xl transition-shadow duration-300 text-left stagger-item" style="transition-delay: {{ $index * 0.1 }}s">
                    <div class="w-full md:w-1/3 rounded-xl bg-yellow-100 flex items-center justify-center h-48 float-animation">
                        <i class="fas fa-trophy text-yellow-600 text-4xl"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center mb-3">
                            <div class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold mr-3">{{ $item->peringkat }}</div>
                            <span class="text-sm text-gray-500">{{ $item->tingkat }}</span>
                        </div>
                        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $item->judul }}</h3>
                        <p class="text-base text-gray-600 mb-4">{{ Str::limit($item->deskripsi, 200) }}</p>
                    </div>
                </article>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('prestasi') }}" class="inline-block px-6 py-3 border border-blue-600 text-blue-600 font-semibold rounded-full hover:bg-blue-600 hover:text-white transition duration-300 float-animation">
                    <i class="fas fa-trophy mr-2"></i> Lihat Semua Prestasi
                </a>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section id="berita" class="py-16 bg-gradient-to-r from-blue-600 to-blue-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="section-title text-white text-3xl md:text-4xl font-bold mb-12 slide-in-left">Berita Terbaru</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($berita as $index => $item)
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover text-gray-800 stagger-item" style="transition-delay: {{ $index * 0.1 }}s">
                    <div class="w-full h-48 bg-blue-100 flex items-center justify-center float-animation">
                        <i class="fas fa-newspaper text-blue-600 text-4xl"></i>
                    </div>
                    <div class="p-6 text-left">
                        <span class="text-xs text-blue-600 font-semibold">{{ $item->kategori }}</span>
                        <h3 class="text-lg font-bold mb-2 mt-2">{{ $item->judul }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
                        <a href="{{ route('berita.detail', $item->slug) }}" class="text-blue-600 font-medium hover:underline text-sm">Baca selengkapnya &rarr;</a>
                    </div>
                </article>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('berita') }}" class="inline-block px-6 py-3 bg-white text-blue-700 font-semibold rounded-full hover:bg-blue-100 transition duration-300 float-animation">
                    <i class="fas fa-newspaper mr-2"></i> Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    <!-- Testimoni Alumni -->
    <section id="alumni" class="py-16 bg-gradient-to-b from-gray-50 to-blue-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="section-title text-blue-800 text-3xl md:text-4xl font-bold mb-12 slide-in-left">Testimoni Alumni</h2>
            
            <div class="relative">
                <div id="alumni-slider" class="flex overflow-x-auto pb-6 space-x-6 scrollbar-hide snap-x snap-mandatory scroll-smooth">
                    @foreach($alumni as $index => $item)
                    <article class="bg-white rounded-2xl shadow-lg p-6 min-w-[320px] max-w-md card-hover snap-start stagger-item" style="transition-delay: {{ $index * 0.1 }}s">
                        <div class="w-20 h-20 rounded-full mx-auto mb-4 bg-blue-100 flex items-center justify-center border-4 border-blue-200 float-animation">
                            <i class="fas fa-user-graduate text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-center">{{ $item->nama }}</h3>
                        <p class="text-sm text-blue-500 text-center mb-2">Alumni {{ $item->jurusan }} {{ $item->tahun_lulus }}</p>
                        <p class="text-sm text-gray-600 text-center italic">"{{ $item->testimoni }}"</p>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

<script>
    // Loading Screen Animation
    document.addEventListener('DOMContentLoaded', function() {
        const loadingScreen = document.getElementById('loading-screen');
        const loadingProgress = document.getElementById('loading-progress');
        
        // Simulate loading progress
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 15;
            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                
                // Hide loading screen after a short delay
                setTimeout(() => {
                    loadingScreen.style.opacity = '0';
                    loadingScreen.style.visibility = 'hidden';
                    
                    // Trigger scroll animations after loading
                    setTimeout(initScrollAnimations, 300);
                }, 500);
            }
            loadingProgress.style.width = `${progress}%`;
        }, 200);
    });

    // Counter Animation
    function animateCountUp(el, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                start = target;
                clearInterval(timer);
            }
            el.textContent = Math.floor(start).toLocaleString();
        }, 16);
    }

    // Scroll Animation Function
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all elements with animation classes
        document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right, .zoom-in, .stagger-item').forEach(el => {
            observer.observe(el);
        });
    }

    // Jurusan Card Animation
    function initJurusanAnimations() {
        const jurusanCards = document.querySelectorAll('.jurusan-card');
        const jurusanDescs = document.querySelectorAll('.jurusan-desc');

        jurusanCards.forEach(card => {
            card.addEventListener('click', () => {
                // Remove active class from all cards and descriptions
                jurusanCards.forEach(c => {
                    c.classList.remove('active');
                    c.classList.remove('pulse-glow');
                });
                jurusanDescs.forEach(d => d.classList.remove('active'));

                // Add active class to clicked card
                card.classList.add('active');
                card.classList.add('pulse-glow');

                // Show corresponding description with animation
                const target = card.getAttribute('data-jurusan');
                const targetDesc = document.getElementById(`desc-${target}`);
                
                // Add slight delay for better visual effect
                setTimeout(() => {
                    targetDesc.classList.add('active');
                }, 200);
            });
        });

        // Add hover effects
        jurusanCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                if (!card.classList.contains('active')) {
                    card.style.transform = 'translateY(-5px)';
                }
            });

            card.addEventListener('mouseleave', () => {
                if (!card.classList.contains('active')) {
                    card.style.transform = 'translateY(0)';
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Alumni Slider
        const alumniSlider = document.getElementById('alumni-slider');
        if (alumniSlider) {
            let index = 0;
            const cards = alumniSlider.querySelectorAll('article');
            const delay = 4000;
            
            setInterval(() => {
                index = (index + 1) % cards.length;
                const nextCard = cards[index];
                alumniSlider.scrollTo({
                    left: nextCard.offsetLeft - alumniSlider.offsetLeft,
                    behavior: 'smooth'
                });
            }, delay);
        }

        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        let animated = false;
        
        function handleScroll() {
            const section = document.querySelector('#statistik');
            if (!section) return;
            
            const sectionTop = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (sectionTop < windowHeight - 100 && !animated) {
                animated = true;
                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-target');
                    animateCountUp(counter, target);
                });
            }
        }
        
        window.addEventListener('scroll', handleScroll);
        handleScroll();

        // Initialize jurusan animations
        initJurusanAnimations();
    });
</script>
@endsection