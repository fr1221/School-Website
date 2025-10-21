<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KontekAI - Asisten Virtual SMKN 2 Kudus</title>
  <!-- Tailwind CSS v3 CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
    // Konfigurasi Tailwind
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#1e3a8a', // Biru gelap
            secondary: '#3b82f6', // Biru muda
          },
          fontFamily: {
            sans: ['Inter', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
          }
        }
      }
    }
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
      .text-shadow {
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
      }
      .card-hover {
        @apply transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl;
      }
      .nav-link {
        @apply transition-colors duration-300 ease-in-out relative;
      }
      .nav-link::after {
        content: '';
        @apply absolute bottom-0 left-0 w-0 h-0.5 bg-blue-400 transition-all duration-300 ease-in-out;
      }
      .nav-link:hover::after,
      .nav-link.active::after {
         @apply w-full;
      }
      .nav-link.active,
      .nav-link:hover {
        @apply text-blue-400;
      }
      .btn-primary {
        @apply bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 ease-in-out hover:from-blue-700 hover:to-blue-800 hover:shadow-lg;
      }
      .btn-outline {
        @apply border-2 border-blue-600 text-blue-600 px-6 py-3 rounded-full font-semibold transition-all duration-300 ease-in-out hover:bg-blue-600 hover:text-white hover:shadow-lg;
      }
      .section-title {
        @apply text-3xl md:text-4xl font-bold text-center mb-8 relative inline-block;
      }
      .section-title::after {
        content: '';
        @apply absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent;
      }
      .ai-bg {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        background-size: 400% 400%;
        animation: gradientAnimation 8s ease infinite;
      }
      @keyframes gradientAnimation {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
      }
      .chat-container {
        height: 60vh;
        overflow-y: auto;
      }
      .chat-bubble-user {
        @apply bg-blue-500 text-white rounded-2xl rounded-br-none px-4 py-3 mb-4 max-w-xs md:max-w-md ml-auto;
      }
      .chat-bubble-ai {
        @apply bg-gray-200 text-gray-800 rounded-2xl rounded-bl-none px-4 py-3 mb-4 max-w-xs md:max-w-md mr-auto;
      }
      .feature-icon {
        @apply w-16 h-16 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-2xl mb-4 mx-auto;
      }
      .typing-indicator {
        @apply bg-gray-200 text-gray-800 rounded-2xl rounded-bl-none px-4 py-3 mb-4 max-w-xs md:max-w-md mr-auto;
      }
      .typing-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #6b7280;
        margin-right: 4px;
        animation: typingAnimation 1.4s infinite ease-in-out;
      }
      .typing-dot:nth-child(1) {
        animation-delay: -0.32s;
      }
      .typing-dot:nth-child(2) {
        animation-delay: -0.16s;
      }
      @keyframes typingAnimation {
        0%, 80%, 100% {
          transform: scale(0.8);
          opacity: 0.5;
        }
        40% {
          transform: scale(1);
          opacity: 1;
        }
      }
      .fade-in {
        animation: fadeIn 0.3s ease-in-out;
      }
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
      }
    }
  </style>
  <!-- Inter Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-800">
  <!-- ===== Header ===== -->
  <header id="navbar" class="sticky top-0 left-0 w-full z-50 bg-white shadow-md transition-all duration-300">
    <div class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
      <!-- Logo + Nama SMK -->
      <div class="flex items-center space-x-3">
        <img src="SMK Nyu.png" alt="Logo SMKN 2 Kudus"
          class="h-12 w-12 rounded-full border-2 border-transparent border-opacity-50">
        <div class="flex flex-col leading-tight">
          <span class="school-name text-xl md:text-2xl font-bold text-blue-800 tracking-wide">SMK NEGERI 2 KUDUS</span>
          <span class="school-sub text-sm text-gray-600 -mt-0.5">Unggul • Kompeten • Berkarakter</span>
        </div>
      </div>
      <!-- Menu Desktop -->
      <nav class="hidden md:flex space-x-6 lg:space-x-8">
        <a href="index.html" class="nav-link text-blue-800 font-medium">Beranda</a>
        <a href="index.html#pengumuman" class="nav-link text-blue-800 font-medium">Profil</a>
        <a href="index.html#berita" class="nav-link text-blue-800 font-medium">Berita</a>
        <a href="index.html#prestasi" class="nav-link text-blue-800 font-medium">Prestasi</a>
        <a href="ekstrakurikuler.html" class="nav-link text-blue-800 font-medium">Ekstrakurikuler</a>
        <a href="index.html#kontekai" class="nav-link text-blue-800 font-medium active" aria-current="page">KontekAI</a>
        <a href="index.html#alumni" class="nav-link text-blue-800 font-medium">Alumni</a>
      </nav>
      <!-- Tombol Menu Mobile -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="text-blue-800 bg-blue-100 p-2 rounded-lg">
          <i class="fas fa-bars text-xl"></i>
        </button>
      </div>
    </div>
    <!-- Menu Mobile -->
    <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg px-4 py-2">
      <a href="index.html" class="block py-2 text-blue-800 font-medium">Beranda</a>
      <a href="index.html#pengumuman" class="block py-2 text-blue-800 font-medium">Profil</a>
      <a href="index.html#berita" class="block py-2 text-blue-800 font-medium">Berita</a>
      <a href="index.html#prestasi" class="block py-2 text-blue-800 font-medium">Prestasi</a>
      <a href="ekstrakurikuler.html" class="block py-2 text-blue-800 font-medium">Ekstrakurikuler</a>
      <a href="index.html#kontekai" class="block py-2 text-blue-800 font-medium active" aria-current="page">KontekAI</a>
      <a href="index.html#alumni" class="block py-2 text-blue-800 font-medium">Alumni</a>
    </div>
  </header>

  <!-- ===== Main Content ===== -->
  <main class="container mx-auto max-w-6xl px-4 py-8">
    <!-- Breadcumb -->
    <nav class="text-sm mb-6">
      <ol class="list-none p-0 inline-flex">
        <li class="flex items-center">
          <a href="index.html" class="text-blue-600 hover:underline">Beranda</a>
          <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </li>
        <li class="flex items-center text-gray-500">
          KontekAI
        </li>
      </ol>
    </nav>

    <!-- ===== Hero KontekAI ===== -->
    <section class="ai-bg text-white rounded-3xl p-8 md:p-12 mb-16 relative overflow-hidden">
      <div class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>
      <div class="relative z-10 max-w-3xl">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 text-shadow">KontekAI</h1>
        <p class="text-xl md:text-2xl mb-6 text-shadow">Asisten Virtual SMKN 2 Kudus</p>
        <p class="text-lg mb-8 text-shadow">KontekAI siap membantu Anda menemukan informasi seputar sekolah, jadwal, pengumuman, dan layanan lainnya dengan cepat dan mudah melalui percakapan alami.</p>
        <a href="#chat" class="btn-primary inline-flex items-center">
          <i class="fas fa-comments mr-2" aria-hidden="true"></i> Coba Sekarang
        </a>
      </div>
    </section>

    <!-- ===== Fitur KontekAI ===== -->
    <section class="mb-16">
      <h2 class="section-title text-blue-800">Fitur Unggulan KontekAI</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
        <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
          <div class="feature-icon">
            <i class="fas fa-search" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">Pencarian Cerdas</h3>
          <p class="text-gray-600">Temukan informasi akademik, pengumuman, dan dokumen penting hanya dengan bertanya.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
          <div class="feature-icon">
            <i class="fas fa-question-circle" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">FAQ Otomatis</h3>
          <p class="text-gray-600">Dapatkan jawaban atas pertanyaan umum seputar kebijakan, prosedur, dan kegiatan sekolah secara instan.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
          <div class="feature-icon">
            <i class="fas fa-calendar-alt" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">Kalender Interaktif</h3>
          <p class="text-gray-600">Tanyakan jadwal ujian, kegiatan ekstrakurikuler, atau hari libur nasional.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
          <div class="feature-icon">
            <i class="fas fa-user-graduate" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">Info Jurusan</h3>
          <p class="text-gray-600">Dapatkan penjelasan mendalam tentang Paket Keahlian yang tersedia di SMKN 2 Kudus.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
          <div class="feature-icon">
            <i class="fas fa-lightbulb" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">KontekAI Edu</h3>
          <p class="text-gray-600">Fitur khusus untuk membantu siswa dalam belajar dan memahami materi pelajaran.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
          <div class="feature-icon">
            <i class="fas fa-cogs" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-3">Integrasi Layanan</h3>
          <p class="text-gray-600">Terhubung langsung dengan sistem informasi sekolah untuk data yang akurat dan terbaru.</p>
        </div>
      </div>
    </section>

    <!-- ===== Demo Chat ===== -->
    <section id="chat" class="mb-16">
      <h2 class="section-title text-blue-800">Coba KontekAI</h2>
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-4">
          <h3 class="text-xl font-bold flex items-center gap-2"><i class="fas fa-robot mr-2" aria-hidden="true"></i> KontekAI Chat</h3>
        </div>
        <div id="chat-messages" class="chat-container p-4 bg-gray-100">
          <div class="chat-bubble-ai fade-in">
            Halo! Saya KontekAI, asisten virtual SMKN 2 Kudus. Ada yang bisa saya bantu?
          </div>
          <div class="chat-bubble-user fade-in">
            Apa itu SMKN 2 Kudus?
          </div>
          <div class="chat-bubble-ai fade-in">
            SMKN 2 Kudus adalah Sekolah Menengah Kejuruan Negeri yang berlokasi di Ds. Rejosari, Kec. Dawe, Kab. Kudus. Sekolah ini menawarkan berbagai Paket Keahlian untuk membentuk siswa yang Unggul, Kompeten, dan Berkarakter.
          </div>
          <div class="chat-bubble-user fade-in">
            Jurusan apa saja yang ada?
          </div>
          <div class="chat-bubble-ai fade-in">
            SMKN 2 Kudus memiliki beberapa Paket Keahlian, seperti Teknik Jaringan dan Informatika (TJAT), Teknik Elektronika Industri (TELIN), dan lainnya. Anda bisa menanyakan lebih lanjut tentang setiap jurusan!
          </div>
        </div>
        <div class="p-4 bg-gray-50 border-t border-gray-200">
          <div class="flex">
            <input id="chat-input" type="text" placeholder="Ketik pertanyaan Anda..." class="flex-grow px-4 py-3 rounded-l-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button id="send-button" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-r-full font-semibold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 ease-in-out">
              <i class="fas fa-paper-plane" aria-hidden="true"></i>
            </button>
          </div>
          <div class="mt-2 text-sm text-gray-500">
            Coba tanyakan: "Apa itu TJAT?" atau "Kapan jadwal ujian semester?"
          </div>
        </div>
      </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="text-center py-12">
      <h2 class="text-3xl font-bold text-gray-800 mb-6">Jelajahi Lebih Banyak dengan KontekAI</h2>
      <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Temukan informasi, layanan, dan bantuan akademik secara instan dan interaktif.</p>
      <a href="#chat" class="btn-primary inline-flex items-center">
        <i class="fas fa-rocket mr-2" aria-hidden="true"></i> Mulai Menggunakan Sekarang
      </a>
    </section>

  </main>

  <!-- ===== Footer ===== -->
  <footer class="bg-gradient-to-r from-blue-800 to-blue-900 text-white py-12 mt-16">
    <div class="container mx-auto px-4 text-center">
      <p>&copy; 2025 SMKN 2 Kudus. Hak Cipta Dilindungi.</p>
    </div>
  </footer>

  <script>
    // Mobile Menu Toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });

    // Chat Functionality
    document.addEventListener('DOMContentLoaded', function() {
      const chatMessages = document.getElementById('chat-messages');
      const chatInput = document.getElementById('chat-input');
      const sendButton = document.getElementById('send-button');
      
      // Auto-scroll to bottom of chat
      function scrollToBottom() {
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }
      
      // Add message to chat
      function addMessage(message, isUser) {
        const messageDiv = document.createElement('div');
        messageDiv.className = isUser ? 'chat-bubble-user fade-in' : 'chat-bubble-ai fade-in';
        messageDiv.textContent = message;
        chatMessages.appendChild(messageDiv);
        scrollToBottom();
      }
      
      // Show typing indicator
      function showTypingIndicator() {
        const typingDiv = document.createElement('div');
        typingDiv.id = 'typing-indicator';
        typingDiv.className = 'typing-indicator';
        typingDiv.innerHTML = '<span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span>';
        chatMessages.appendChild(typingDiv);
        scrollToBottom();
      }
      
      // Hide typing indicator
      function hideTypingIndicator() {
        const typingIndicator = document.getElementById('typing-indicator');
        if (typingIndicator) {
          typingIndicator.remove();
        }
      }
      
      // Process user message
      function processUserMessage(message) {
        addMessage(message, true);
        chatInput.value = '';
        
        // Show typing indicator
        showTypingIndicator();
        
        // Simulate AI response after a delay
        setTimeout(() => {
          hideTypingIndicator();
          const response = generateAIResponse(message);
          addMessage(response, false);
        }, 1500);
      }
      
      // Generate AI response based on user message
      function generateAIResponse(message) {
        const lowerMessage = message.toLowerCase();
        
        if (lowerMessage.includes('jurusan') || lowerMessage.includes('program') || lowerMessage.includes('keahlian')) {
          return "SMKN 2 Kudus memiliki beberapa Paket Keahlian, antara lain:\n- Teknik Jaringan dan Informatika (TJAT)\n- Teknik Elektronika Industri (TELIN)\n- Teknik Pemesinan (TP)\n- Teknik Kendaraan Ringan (TKR)\n- Teknik dan Bisnis Sepeda Motor (TBSM)\n\nMau tahu lebih detail tentang salah satu jurusan?";
        } else if (lowerMessage.includes('tjat') || lowerMessage.includes('teknik jaringan')) {
          return "Teknik Jaringan dan Informatika (TJAT) adalah program keahlian yang mempelajari tentang jaringan komputer, pemrograman, dan teknologi informasi. Lulusan TJAT dapat bekerja sebagai network administrator, programmer, atau teknisi IT.";
        } else if (lowerMessage.includes('telin') || lowerMessage.includes('elektronika')) {
          return "Teknik Elektronika Industri (TELIN) fokus pada sistem kontrol, robotika, dan otomasi industri. Lulusan TELIN dapat bekerja di bidang industri manufaktur, maintenance, atau sebagai teknisi elektronika.";
        } else if (lowerMessage.includes('alamat') || lowerMessage.includes('lokasi')) {
          return "SMKN 2 Kudus berlokasi di Ds. Rejosari, Kec. Dawe, Kab. Kudus, Jawa Tengah. Untuk informasi lebih lanjut, Anda bisa menghubungi (0291) 1234567.";
        } else if (lowerMessage.includes('jadwal') || lowerMessage.includes('ujian') || lowerMessage.includes('kalender')) {
          return "Jadwal ujian semester ganjil 2024/2025 akan dilaksanakan pada tanggal 2-10 Desember 2024. Untuk kalender akademik lengkap, silakan kunjungi halaman pengumuman di website sekolah.";
        } else if (lowerMessage.includes('ekstrakurikuler') || lowerMessage.includes('ekskul')) {
          return "SMKN 2 Kudus memiliki berbagai ekstrakurikuler seperti Pramuka, Paskibra, KIR, Olahraga, Seni, dan banyak lagi. Untuk informasi lengkap, kunjungi halaman ekstrakurikuler di website sekolah.";
        } else if (lowerMessage.includes('pendaftaran') || lowerMessage.includes('ppdb')) {
          return "Pendaftaran Peserta Didik Baru (PPDB) SMKN 2 Kudus biasanya dibuka pada bulan Mei-Juli setiap tahunnya. Informasi lengkap tentang persyaratan dan jadwal akan diumumkan di website resmi sekolah.";
        } else {
          return "Maaf, saya belum memahami pertanyaan Anda. Coba tanyakan tentang jurusan, jadwal, ekstrakurikuler, atau informasi umum lainnya tentang SMKN 2 Kudus.";
        }
      }
      
      // Send message when button is clicked
      sendButton.addEventListener('click', function() {
        const message = chatInput.value.trim();
        if (message) {
          processUserMessage(message);
        }
      });
      
      // Send message when Enter key is pressed
      chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          const message = chatInput.value.trim();
          if (message) {
            processUserMessage(message);
          }
        }
      });
      
      // Initial scroll to bottom
      scrollToBottom();
    });
  </script>
</body>
</html>