@extends('layouts.app')

@section('title', 'KontekAI - Asisten Virtual SMKN 2 Kudus')

@section('content')
<div class="container mx-auto max-w-6xl px-4 py-8">
    <!-- Breadcumb -->
    <nav class="text-sm mb-6">
      <ol class="list-none p-0 inline-flex">
        <li class="flex items-center">
          <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Beranda</a>
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
        <div class="chat-container p-4 bg-gray-100">
          <div class="chat-bubble-ai">
            Halo! Saya KontekAI, asisten virtual SMKN 2 Kudus. Ada yang bisa saya bantu?
          </div>
          <div class="chat-bubble-user">
            Apa itu SMKN 2 Kudus?
          </div>
          <div class="chat-bubble-ai">
            SMKN 2 Kudus adalah Sekolah Menengah Kejuruan Negeri yang berlokasi di Ds. Rejosari, Kec. Dawe, Kab. Kudus. Sekolah ini menawarkan berbagai Paket Keahlian untuk membentuk siswa yang Unggul, Kompeten, dan Berkarakter.
          </div>
          <div class="chat-bubble-user">
            Jurusan apa saja yang ada?
          </div>
          <div class="chat-bubble-ai">
            SMKN 2 Kudus memiliki beberapa Paket Keahlian, seperti Teknik Jaringan dan Informatika (TJAT), Teknik Elektronika Industri (TELIN), dan lainnya. Anda bisa menanyakan lebih lanjut tentang setiap jurusan!
          </div>
        </div>
        <div class="p-4 bg-gray-50 border-t border-gray-200">
          <div class="flex">
            <input type="text" placeholder="Ketik pertanyaan Anda..." class="flex-grow px-4 py-3 rounded-l-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-r-full font-semibold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 ease-in-out">
              <i class="fas fa-paper-plane" aria-hidden="true"></i>
            </button>
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
</div>
@endsection

@section('scripts')
<script>
  // Script khusus untuk halaman KontekAI
  document.addEventListener('DOMContentLoaded', function() {
    // Implementasi chat functionality di sini
    console.log('KontekAI page loaded');
  });
</script>
@endsection