@extends('layouts.app') <!-- Gunakan layout utama Anda -->

@section('title', 'KontekAI - Asisten Virtual SMKN 2 Kudus')

@section('content')
<div class="pt-24 pb-16 bg-gray-50 min-h-screen">
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
                    <i class="fas fa-comments mr-2"></i> Coba Sekarang
                </a>
            </div>
        </section>

        <!-- ===== Fitur KontekAI ===== -->
        <section class="mb-16">
            <h2 class="section-title text-blue-800">Fitur Unggulan KontekAI</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Pencarian Cerdas</h3>
                    <p class="text-gray-600">Temukan informasi akademik, pengumuman, dan dokumen penting hanya dengan bertanya.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
                    <div class="feature-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">FAQ Otomatis</h3>
                    <p class="text-gray-600">Dapatkan jawaban atas pertanyaan umum seputar kebijakan, prosedur, dan kegiatan sekolah secara instan.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Kalender Interaktif</h3>
                    <p class="text-gray-600">Tanyakan jadwal ujian, kegiatan ekstrakurikuler, atau hari libur nasional.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
                    <div class="feature-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Info Jurusan</h3>
                    <p class="text-gray-600">Dapatkan penjelasan mendalam tentang Paket Keahlian yang tersedia di SMKN 2 Kudus.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
                    <div class="feature-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">KontekAI Edu</h3>
                    <p class="text-gray-600">Fitur khusus untuk membantu siswa dalam belajar dan memahami materi pelajaran.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center card-hover">
                    <div class="feature-icon">
                        <i class="fas fa-cogs"></i>
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
                    <h3 class="text-xl font-bold flex items-center gap-2"><i class="fas fa-robot mr-2"></i> KontekAI Chat</h3>
                </div>
                <div id="chat-messages" class="chat-container p-4 bg-gray-100" style="height: 50vh; overflow-y: auto;">
                    <!-- Pesan default akan ditambahkan oleh JavaScript -->
                </div>
                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    <form id="chat-form" class="flex">
                        <input id="chat-input" type="text" placeholder="Ketik pertanyaan Anda..." class="flex-grow px-4 py-3 rounded-l-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <button id="send-button" type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-r-full font-semibold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 ease-in-out">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                    <div class="mt-2 text-sm text-gray-500">
                        Coba tanyakan: "Apa itu SMKN 2 Kudus?" atau "Jurusan apa saja yang ada?"
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== CTA ===== -->
        <section class="text-center py-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Jelajahi Lebih Banyak dengan KontekAI</h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Temukan informasi, layanan, dan bantuan akademik secara instan dan interaktif.</p>
            <a href="#chat" class="btn-primary inline-flex items-center">
                <i class="fas fa-rocket mr-2"></i> Mulai Menggunakan Sekarang
            </a>
        </section>
    </div>
</div>

<script>
    // Chat Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const chatMessages = document.getElementById('chat-messages');
        const chatForm = document.getElementById('chat-form');
        const chatInput = document.getElementById('chat-input');
        const sendButton = document.getElementById('send-button');

        // Tambahkan pesan selamat datang
        const welcomeMessage = document.createElement('div');
        welcomeMessage.className = 'chat-bubble-ai fade-in';
        welcomeMessage.textContent = 'Halo! Saya KontekAI, asisten virtual SMKN 2 Kudus. Ada yang bisa saya bantu?';
        chatMessages.appendChild(welcomeMessage);

        // Auto-scroll ke bawah
        function scrollToBottom() {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
        scrollToBottom(); // Scroll ke bawah saat halaman dimuat

        // Fungsi untuk menambahkan pesan
        function addMessage(text, isUser) {
            const messageDiv = document.createElement('div');
            messageDiv.className = isUser ? 'chat-bubble-user fade-in' : 'chat-bubble-ai fade-in';
            messageDiv.textContent = text;
            chatMessages.appendChild(messageDiv);
            scrollToBottom();
        }

        // Fungsi untuk menampilkan indikator mengetik
        function showTypingIndicator() {
            const typingDiv = document.createElement('div');
            typingDiv.id = 'typing-indicator';
            typingDiv.className = 'typing-indicator';
            typingDiv.innerHTML = '<span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span>';
            chatMessages.appendChild(typingDiv);
            scrollToBottom();
        }

        // Fungsi untuk menyembunyikan indikator mengetik
        function hideTypingIndicator() {
            const typingIndicator = document.getElementById('typing-indicator');
            if (typingIndicator) {profil
                typingIndicator.remove();
            }
        }

        // Fungsi untuk menangani pengiriman pesan
        function handleUserMessage(userMessage) {
            // Tambahkan pesan pengguna
            addMessage(userMessage, true);

            // Tampilkan indikator mengetik
            showTypingIndicator();

            // Simulasikan respon AI (ganti ini dengan panggilan API ke backend AI Anda nanti)
            setTimeout(() => {
                hideTypingIndicator();
                const aiResponse = generateAIResponse(userMessage);
                addMessage(aiResponse, false);
            }, 1500);
        }

        // Fungsi untuk menghasilkan respon (ini hanya simulasi, ganti dengan logika AI sebenarnya)
        function generateAIResponse(message) {
            const lowerMessage = message.toLowerCase();

            // Contoh data statis yang bisa digunakan oleh AI
            const dataSekolah = {
                nama: "SMK Negeri 2 Kudus",
                alamat: "Ds. Rejosari, Kec. Dawe, Kab. Kudus, Jawa Tengah",
                visi: "Unggul dalam prestasi, kompeten dalam keterampilan, dan berkarakter dalam budi pekerti",
                tujuan: "Mencetak lulusan yang siap kerja, wirausaha, dan melanjutkan ke jenjang pendidikan yang lebih tinggi"
            };

            // Contoh data jurusan (ini seharusnya diambil dari database)
            const dataJurusan = [
                { kode: "TJKT", nama: "Teknik Jaringan dan Komputer", deskripsi: "Mempelajari instalasi, konfigurasi, dan manajemen jaringan komputer." },
                { kode: "TAV", nama: "Teknik Audio Video", deskripsi: "Mempelajari sistem audio dan video, termasuk perawatan dan perbaikan peralatannya." },
                { kode: "TKR", nama: "Teknik Kendaraan Ringan", deskripsi: "Mempelajari perawatan dan perbaikan kendaraan ringan seperti mobil." }
            ];

            if (lowerMessage.includes('selamat datang') || lowerMessage.includes('halo') || lowerMessage.includes('hai')) {
                return "Halo kembali! Ada yang bisa saya bantu?";
            } else if (lowerMessage.includes('nama') && lowerMessage.includes('sekolah')) {
                return `Nama sekolah ini adalah ${dataSekolah.nama}.`;
            } else if (lowerMessage.includes('alamat') || lowerMessage.includes('lokasi')) {
                return `SMKN 2 Kudus berlokasi di ${dataSekolah.alamat}.`;
            } else if (lowerMessage.includes('visi')) {
                return `Visi SMKN 2 Kudus adalah "${dataSekolah.visi}".`;
            } else if (lowerMessage.includes('tujuan')) {
                return `Tujuan SMKN 2 Kudus adalah "${dataSekolah.tujuan}".`;
            } else if (lowerMessage.includes('jurusan') || lowerMessage.includes('program') || lowerMessage.includes('keahlian')) {
                let response = "SMKN 2 Kudus memiliki beberapa Paket Keahlian, antara lain:\n";
                dataJurusan.forEach(jurusan => {
                    response += `- ${jurusan.kode}: ${jurusan.nama}\n`;
                });
                response += "\nMau tahu lebih detail tentang salah satu jurusan?";
                return response;
            } else if (dataJurusan.some(j => lowerMessage.includes(j.kode.toLowerCase()) || lowerMessage.includes(j.nama.toLowerCase()))) {
                const jurusanMatch = dataJurusan.find(j => lowerMessage.includes(j.kode.toLowerCase()) || lowerMessage.includes(j.nama.toLowerCase()));
                if (jurusanMatch) {
                    return `${jurusanMatch.kode} (${jurusanMatch.nama}) adalah program keahlian yang ${jurusanMatch.deskripsi}`;
                }
            } else {
                return "Maaf, saya belum memahami pertanyaan Anda. Coba tanyakan tentang nama sekolah, alamat, visi, tujuan, jurusan, atau informasi umum lainnya tentang SMKN 2 Kudus.";
            }
        }

        // Event listener untuk form (mencegah reload halaman)
        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = chatInput.value.trim();
            if (message) {
                handleUserMessage(message);
                chatInput.value = ''; // Kosongkan input setelah mengirim
            }
        });

        // Event listener untuk tombol kirim (jika diperlukan, meskipun form sudah menanganinya)
        sendButton.addEventListener('click', function(e) {
             e.preventDefault(); // Mencegah perilaku default tombol submit di dalam form
             const message = chatInput.value.trim();
             if (message) {
                 handleUserMessage(message);
                 chatInput.value = '';
             }
        });
    });
</script>

<style>
    /* Tambahkan style ini ke bagian <style> atau file CSS Anda jika belum didefinisikan di layout */
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
    .card-hover {
        transition: all 0.3s ease-in-out;
    }
    .card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .section-title {
        position: relative;
        display: inline-block;
        font-weight: 700;
        margin-bottom: 2rem;
    }
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 50%;
        transform: translateX(-50%);
        width: 6rem;
        height: 0.25rem;
        background: linear-gradient(90deg, transparent, #3b82f6, transparent);
    }
    .btn-primary {
        background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 9999px; /* Membuat tombol bulat */
        font-weight: 600;
        transition: all 0.3s ease-in-out;
        display: inline-flex;
        align-items: center;
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    .chat-bubble-user {
        background-color: #3b82f6; /* Tailwind blue-500 */
        color: white;
        border-radius: 1rem;
        border-bottom-right-radius: 0.25rem;
        padding: 0.75rem 1rem;
        margin-bottom: 1rem;
        max-width: 80%;
        text-align: left;
        align-self: flex-end;
        word-wrap: break-word;
    }
    .chat-bubble-ai {
        background-color: #e5e7eb; /* Tailwind gray-200 */
        color: #374151; /* Tailwind gray-700 */
        border-radius: 1rem;
        border-bottom-left-radius: 0.25rem;
        padding: 0.75rem 1rem;
        margin-bottom: 1rem;
        max-width: 80%;
        text-align: left;
        align-self: flex-start;
        word-wrap: break-word;
    }
    .typing-indicator {
        background-color: #e5e7eb; /* Sama dengan chat-bubble-ai */
        color: #374151;
        border-radius: 1rem;
        border-bottom-left-radius: 0.25rem;
        padding: 0.75rem 1rem;
        margin-bottom: 1rem;
        max-width: 80%;
        text-align: left;
        align-self: flex-start;
        display: inline-flex;
        align-items: center;
    }
    .typing-dot {
        display: inline-block;
        width: 0.5rem;
        height: 0.5rem;
        border-radius: 50%;
        background-color: #6b7280; /* Tailwind gray-500 */
        margin-right: 0.25rem;
        animation: typingAnimation 1.4s infinite ease-in-out;
    }
    .typing-dot:nth-child(1) { animation-delay: -0.32s; }
    .typing-dot:nth-child(2) { animation-delay: -0.16s; }
    @keyframes typingAnimation {
        0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
        40% { transform: scale(1); opacity: 1; }
    }
    .fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(0.5rem); }
        to { opacity: 1; transform: translateY(0); }
    }
    .feature-icon {
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
        background-color: #dbeafe; /* Tailwind blue-100 */
        color: #2563eb; /* Tailwind blue-600 */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endsection