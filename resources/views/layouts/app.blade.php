<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMKN 2 Kudus - Official Website')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        .text-shadow { text-shadow: 1px 1px 2px rgba(0,0,0,0.5); }
        .card-hover { transition: all 0.3s ease-in-out; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); }
        .nav-link { position: relative; transition: color 0.3s ease-in-out; }
        .nav-link::after { content: ''; position: absolute; bottom: 0; left: 0; width: 0; height: 2px; background: #3b82f6; transition: all 0.3s ease-in-out; }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .btn-primary { background: linear-gradient(135deg, #1e40af, #3b82f6); transition: all 0.3s ease-in-out; }
        .btn-primary:hover { background: linear-gradient(135deg, #1e3a8a, #2563eb); transform: translateY(-2px); }
        .section-title { position: relative; display: inline-block; }
        .section-title::after { content: ''; position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 60px; height: 3px; background: linear-gradient(90deg, transparent, #3b82f6, transparent); }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="font-sans bg-gray-50 text-gray-800" style="font-family: 'Inter', sans-serif;">
    <!-- Header -->
    <header id="navbar" class="fixed top-0 left-0 w-full z-50 bg-transparent transition-all duration-500">
        <div class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="h-12 w-12 rounded-full border-2 border-white border-opacity-50 overflow-hidden">
    <img src="{{ asset('images/logo-smk.png') }}" alt="Logo SMKN 2 Kudus" class="w-full h-full object-cover">
</div>

         <div class="flex flex-col leading-tight">
                    <span class="school-name text-xl md:text-2xl font-bold text-white tracking-wide">SMK NEGERI 2 KUDUS</span>
                    <span class="school-sub text-sm text-white opacity-90 -mt-0.5">Unggul • Kompeten • Berkarakter</span>
                </div>
            </div>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-6 lg:space-x-8">
                <a href="{{ route('home') }}#" class="nav-link text-white font-medium {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('home') }}#pengumuman" class="nav-link text-white font-medium {{ request()->is('pengumuman') ? 'active' : '' }}">Profil</a>
                <a href="{{ route('berita') }}" class="nav-link text-white font-medium {{ request()->is('berita*') ? 'active' : '' }}">Berita</a>
                <a href="{{ route('home') }}#layanan" class="nav-link text-white font-medium">Layanan</a>
                <a href="{{ route('home') }}/kontekai" class="nav-link text-white font-medium">KontekAI</a>
                <a href="{{ route('prestasi') }}" class="nav-link text-white font-medium {{ request()->is('prestasi*') ? 'active' : '' }}">Prestasi</a>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white bg-blue-600 bg-opacity-50 p-2 rounded-lg transition-colors duration-300 hover:bg-opacity-100">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white bg-opacity-95 backdrop-blur-sm shadow-xl absolute top-16 left-0 w-full z-40">
        <div class="flex flex-col py-2">
            <a href="{{ route('home') }}#pengumuman" class="nav-link text-blue-800 font-medium py-3 px-6 hover:bg-blue-50 transition-colors duration-200">Profil</a>
            <a href="{{ route('berita') }}" class="nav-link text-blue-800 font-medium py-3 px-6 hover:bg-blue-50 transition-colors duration-200">Berita</a>
            <a href="{{ route('home') }}#layanan" class="nav-link text-blue-800 font-medium py-3 px-6 hover:bg-blue-50 transition-colors duration-200">Layanan</a>
            <a href="{{ route('home') }}#kontekai" class="nav-link text-blue-800 font-medium py-3 px-6 hover:bg-blue-50 transition-colors duration-200">KontekAI</a>
            <a href="{{ route('prestasi') }}" class="nav-link text-blue-800 font-medium py-3 px-6 hover:bg-blue-50 transition-colors duration-200">Prestasi</a>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-blue-800 to-blue-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <div class="flex items-center mb-6">
                       <div class="h-20 w-20 rounded-full border-2 border-white overflow-hidden">
    <img src="{{ asset('images/SMK-Nyu.png') }}" alt="Logo SMKN 2 Kudus" class="w-full h-full object-cover">
</div>

                        <h2 class="text-2xl font-bold ml-4">SMKN 2 KUDUS</h2>
                    </div>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>Ds. Rejosari Kecamatan Dawe kabupaten Kudus 59353</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone mr-3"></i>
                            <span>(0291)-4101149</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>smk2kudus@gmail.com</span>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/smkn2kudus/" class="text-white hover:text-blue-200 text-xl transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://x.com/smkn2kudus" class="text-white hover:text-blue-200 text-xl transition-colors duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/smkn2kudus/" class="text-white hover:text-blue-200 text-xl transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCkPqHxWlRJUVkGxy04VvVcQ" class="text-white hover:text-blue-200 text-xl transition-colors duration-300">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Link Terkait</h3>
                    <ul class="space-y-3">
                        <li><a href="https://kemdikbud.go.id/" class="hover:text-blue-200 transition-colors duration-300">Kementerian Pendidikan dan Kebudayaan</a></li>
                        <li><a href="https://psmk.kemdikbud.go.id/" class="hover:text-blue-200 transition-colors duration-300">Direktorat Pembinaan SMK | PSMK</a></li>
                        <li><a href="https://jatengprov.go.id/" class="hover:text-blue-200 transition-colors duration-300">Dinas Pendidikan Provinsi Jawa Tengah</a></li>
                        <li><a href="https://dapo.kemdikbud.go.id/" class="hover:text-blue-200 transition-colors duration-300">Data Pokok Pendidikan</a></li>
                        <li><a href="https://melupinter.com/" class="hover:text-blue-200 transition-colors duration-300">E-Learning SMKN 2 Kudus</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Hubungi Kami</h3>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="w-full px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white bg-opacity-90" required>
                        </div>
                        <div class="mb-4">
                            <input type="email" name="email" placeholder="Email" class="w-full px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white bg-opacity-90" required>
                        </div>
                        <div class="mb-4">
                            <textarea name="pesan" placeholder="Pesan Anda" rows="4" class="w-full px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white bg-opacity-90" required></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full text-white px-6 py-3 rounded-lg font-semibold">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-blue-700 mt-10 pt-6 text-center text-sm">
                <p>&copy; 2025 Copyright Skadaku. All rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            const schoolName = document.querySelector('.school-name');
            const schoolSub = document.querySelector('.school-sub');
            const iconMenu = document.querySelector('#mobile-menu-button i');
            
            if (window.scrollY > 80) {
                navbar.classList.add('bg-white', 'shadow-lg', 'bg-opacity-95', 'backdrop-blur-md');
                navbar.classList.remove('bg-transparent');
                navbar.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('text-white');
                    link.classList.add('text-blue-800');
                });
                schoolName.classList.remove('text-white');
                schoolName.classList.add('text-blue-800');
                schoolSub.classList.remove('text-white');
                schoolSub.classList.add('text-gray-600');
                iconMenu.classList.remove('text-white');
                iconMenu.classList.add('text-blue-800');
            } else {
                navbar.classList.remove('bg-white', 'shadow-lg', 'bg-opacity-95', 'backdrop-blur-md');
                navbar.classList.add('bg-transparent');
                navbar.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.add('text-white');
                    link.classList.remove('text-blue-800');
                });
                schoolName.classList.add('text-white');
                schoolName.classList.remove('text-blue-800');
                schoolSub.classList.add('text-white');
                schoolSub.classList.remove('text-gray-600');
                iconMenu.classList.add('text-white');
                iconMenu.classList.remove('text-blue-800');
            }
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

        // Initialize counters when in viewport
        function initCounters() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                animateCountUp(counter, target);
            });
        }

        // Jurusan Selection
        document.addEventListener('DOMContentLoaded', function() {
            const jurusanItems = document.querySelectorAll('.jurusan-item');
            const jurusanDescs = document.querySelectorAll('.jurusan-desc');
            
            jurusanItems.forEach(item => {
                item.addEventListener('click', () => {
                    const jurusan = item.getAttribute('data-jurusan');
                    
                    // Hide all descriptions
                    jurusanDescs.forEach(desc => desc.classList.add('hidden'));
                    
                    // Show selected description
                    document.getElementById('desc-' + jurusan).classList.remove('hidden');
                });
            });

            // Alumni Slider Auto-scroll
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

            // Counter Animation on scroll
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
            handleScroll(); // Check on load
        });
    </script>

    @stack('scripts')
</body>
</html>