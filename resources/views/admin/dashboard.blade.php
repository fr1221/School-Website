<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #eef2ff;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #f72585;
            --danger: #e63946;
            --dark: #1e1e2d;
            --light: #f8f9fa;
            --gray: #6c757d;
            --gray-light: #e9ecef;
            --border-radius: 12px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fb;
            color: #333;
            line-height: 1.6;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-header {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .dashboard-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .dashboard-header p {
            color: var(--gray);
            font-size: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info p {
            margin: 0;
        }

        .logout-btn {
            background-color: var(--danger);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .logout-btn:hover {
            background-color: #c1121f; /* Sedikit lebih gelap dari danger */
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 24px;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border-left: 4px solid;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-card.primary {
            border-left-color: var(--primary);
        }

        .stat-card.success {
            border-left-color: var(--success);
        }

        .stat-card.info {
            border-left-color: var(--info);
        }

        .stat-card.warning {
            border-left-color: var(--warning);
        }

        .stat-card.secondary {
            border-left-color: var(--secondary);
        }

        .stat-card.danger {
            border-left-color: var(--danger);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            opacity: 0.1;
            transform: translate(30px, -30px);
        }

        .stat-card.primary::before {
            background-color: var(--primary);
        }

        .stat-card.success::before {
            background-color: var(--success);
        }

        .stat-card.info::before {
            background-color: var(--info);
        }

        .stat-card.warning::before {
            background-color: var(--warning);
        }

        .stat-card.secondary::before {
            background-color: var(--secondary);
        }

        .stat-card.danger::before {
            background-color: var(--danger);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .stat-card.primary .stat-icon {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .stat-card.success .stat-icon {
            background-color: rgba(76, 201, 240, 0.15);
            color: var(--success);
        }

        .stat-card.info .stat-icon {
            background-color: rgba(72, 149, 239, 0.15);
            color: var(--info);
        }

        .stat-card.warning .stat-icon {
            background-color: rgba(247, 37, 133, 0.15);
            color: var(--warning);
        }

        .stat-card.secondary .stat-icon {
            background-color: rgba(63, 55, 201, 0.15);
            color: var(--secondary);
        }

        .stat-card.danger .stat-icon {
            background-color: rgba(230, 57, 70, 0.15);
            color: var(--danger);
        }

        .stat-content h3 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-content p {
            color: var(--gray);
            font-size: 14px;
            font-weight: 500;
        }

        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 25px;
        }

        .content-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 25px;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            font-size: 18px;
            font-weight: 600;
        }

        .card-header.primary h3 {
            color: var(--primary);
        }

        .card-header.success h3 {
            color: var(--success);
        }

        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--secondary);
        }

        .btn-success {
            background-color: var(--success);
            color: white;
        }

        .btn-success:hover {
            background-color: #3aa8d4;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        .card-body {
            padding: 0;
        }

        .list-item {
            padding: 20px 25px;
            border-bottom: 1px solid var(--gray-light);
            transition: var(--transition);
            cursor: pointer;
        }

        .list-item:hover {
            background-color: var(--light);
        }

        .list-item:last-child {
            border-bottom: none;
        }

        .list-item-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .list-item-title {
            font-weight: 600;
            font-size: 16px;
            color: var(--dark);
        }

        .list-item-time {
            font-size: 12px;
            color: var(--gray);
        }

        .list-item-content {
            font-size: 14px;
            color: var(--gray);
            margin-bottom: 8px;
            line-height: 1.5;
        }

        .list-item-author {
            font-size: 12px;
            color: var(--gray);
        }

        .empty-state {
            padding: 40px 20px;
            text-align: center;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        @media (max-width: 992px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-container {
                padding: 15px;
            }
            
            .card-header {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div>
                <h1>Dashboard Admin</h1>
                <p>Selamat datang! Berikut adalah ringkasan aktivitas terbaru.</p>
            </div>
            <div class="user-info">
                <p>Halo, <strong>{{ Auth::user()->name ?? 'Administrator' }}</strong></p>
                <!-- Form Logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card primary">
                <div class="stat-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats['pengumuman'] }}</h3>
                    <p>Pengumuman</p>
                </div>
            </div>
            
            <div class="stat-card success">
                <div class="stat-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats['berita'] }}</h3>
                    <p>Berita</p>
                </div>
            </div>
            
            <div class="stat-card info">
                <div class="stat-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats['prestasi'] }}</h3>
                    <p>Prestasi</p>
                </div>
            </div>
            
            <div class="stat-card warning">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats['alumni'] }}</h3>
                    <p>Alumni</p>
                </div>
            </div>
            
            <div class="stat-card secondary">
                <div class="stat-icon">
                    <i class="fas fa-futbol"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats['ekstrakurikuler'] }}</h3>
                    <p>Ekstrakurikuler</p>
                </div>
            </div>
            
            <div class="stat-card danger">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $stats['contacts'] }}</h3>
                    <p>Pesan Baru</p>
                </div>
            </div>
        </div>
        
        <div class="content-grid">
            <div class="content-card">
                <div class="card-header primary">
                    <h3>Pengumuman Terbaru</h3>
                    <div>
                        <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-list"></i> Semua
                        </a>
                        <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($recentPengumuman->count() > 0)
                        @foreach($recentPengumuman as $item)
                            <div class="list-item">
                                <div class="list-item-header">
                                    <div class="list-item-title">{{ $item->judul }}</div>
                                    <div class="list-item-time">{{ $item->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="list-item-content">
                                    {{ Str::limit(strip_tags($item->konten), 100) }}
                                </div>
                                <div class="list-item-author">Oleh {{ $item->user->name ?? 'Tidak Diketahui' }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="fas fa-bullhorn"></i>
                            <p>Tidak ada pengumuman terbaru.</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="content-card">
                <div class="card-header success">
                    <h3>Berita Terbaru</h3>
                    <div>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-list"></i> Semua
                        </a>
                        <a href="{{ route('admin.berita.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($recentBerita->count() > 0)
                        @foreach($recentBerita as $item)
                            <div class="list-item">
                                <div class="list-item-header">
                                    <div class="list-item-title">{{ $item->judul }}</div>
                                    <div class="list-item-time">{{ $item->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="list-item-content">
                                    {{ Str::limit(strip_tags($item->konten), 100) }}
                                </div>
                                <div class="list-item-author">Oleh {{ $item->user->name ?? 'Tidak Diketahui' }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="fas fa-newspaper"></i>
                            <p>Tidak ada berita terbaru.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Card Prestasi -->
            <div class="content-card">
                <div class="card-header info">
                    <h3>Prestasi Terbaru</h3>
                    <div>
                        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-list"></i> Semua
                        </a>
                        <a href="{{ route('admin.prestasi.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($prestasi = App\Models\Prestasi::latest()->take(5)->get() and $prestasi->count() > 0)
                        @foreach($prestasi as $item)
                            <div class="list-item">
                                <div class="list-item-header">
                                    <div class="list-item-title">{{ $item->judul }}</div>
                                    <div class="list-item-time">{{ $item->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="list-item-content">
                                    {{ Str::limit(strip_tags($item->deskripsi), 100) }}
                                </div>
                                <div class="list-item-author">{{ $item->peringkat }} - {{ $item->tingkat }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="fas fa-trophy"></i>
                            <p>Tidak ada prestasi terbaru.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Card Alumni -->
            <div class="content-card">
                <div class="card-header warning">
                    <h3>Alumni Terbaru</h3>
                    <div>
                        <a href="{{ route('admin.alumni.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-list"></i> Semua
                        </a>
                        <a href="{{ route('admin.alumni.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($alumni = App\Models\Alumni::latest()->take(5)->get() and $alumni->count() > 0)
                        @foreach($alumni as $item)
                            <div class="list-item">
                                <div class="list-item-header">
                                    <div class="list-item-title">{{ $item->nama }}</div>
                                    <div class="list-item-time">{{ $item->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="list-item-content">
                                    {{ Str::limit(strip_tags($item->testimoni), 100) }}
                                </div>
                                <div class="list-item-author">{{ $item->jurusan }} - {{ $item->tahun_lulus }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="fas fa-users"></i>
                            <p>Tidak ada alumni terbaru.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Card Ekstrakurikuler -->
            <div class="content-card">
                <div class="card-header secondary">
                    <h3>Ekstrakurikuler Terbaru</h3>
                    <div>
                        <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-list"></i> Semua
                        </a>
                        <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($ekstrakurikuler = App\Models\Ekstrakurikuler::latest()->take(5)->get() and $ekstrakurikuler->count() > 0)
                        @foreach($ekstrakurikuler as $item)
                            <div class="list-item">
                                <div class="list-item-header">
                                    <div class="list-item-title">{{ $item->nama }}</div>
                                    <div class="list-item-time">{{ $item->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="list-item-content">
                                    {{ Str::limit(strip_tags($item->deskripsi), 100) }}
                                </div>
                                <div class="list-item-author">Pembina: {{ $item->pembina ?? 'Belum Ada' }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="fas fa-futbol"></i>
                            <p>Tidak ada ekstrakurikuler terbaru.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Card Pesan Kontak -->
            <div class="content-card">
                <div class="card-header danger">
                    <h3>Pesan Kontak Baru</h3>
                    <div>
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-list"></i> Semua
                        </a>
                        <!-- Tidak ada tombol tambah untuk pesan kontak -->
                    </div>
                </div>
                <div class="card-body">
                    @if($contacts = App\Models\Contact::where('dibaca', false)->latest()->take(5)->get() and $contacts->count() > 0)
                        @foreach($contacts as $item)
                            <div class="list-item">
                                <div class="list-item-header">
                                    <div class="list-item-title">{{ $item->nama }}</div>
                                    <div class="list-item-time">{{ $item->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="list-item-content">
                                    {{ Str::limit(strip_tags($item->pesan), 100) }}
                                </div>
                                <div class="list-item-author">{{ $item->email }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="fas fa-envelope"></i>
                            <p>Tidak ada pesan baru.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <script>
        // Menambahkan efek interaktif pada card statistik
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Menambahkan efek hover pada list item
        document.querySelectorAll('.list-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#f8f9fa';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });

        // Konfirmasi logout (opsional)
        document.getElementById('logout-form').addEventListener('submit', function(e) {
            if (!confirm('Anda yakin ingin keluar?')) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>