@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-gauge me-2"></i>Dashboard</h1>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card border-primary shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title text-muted mb-2">Pengumuman</h6>
                        <h3 class="fw-bold text-primary">{{ $stats['pengumuman'] }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-bullhorn fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card border-success shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title text-muted mb-2">Berita</h6>
                        <h3 class="fw-bold text-success">{{ $stats['berita'] }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-newspaper fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card border-warning shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title text-muted mb-2">Prestasi</h6>
                        <h3 class="fw-bold text-warning">{{ $stats['prestasi'] }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-trophy fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card border-info shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title text-muted mb-2">Alumni</h6>
                        <h3 class="fw-bold text-info">{{ $stats['alumni'] }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-user-graduate fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card border-secondary shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title text-muted mb-2">Ekstrakurikuler</h6>
                        <h3 class="fw-bold text-secondary">{{ $stats['ekstrakurikuler'] }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-star fa-2x text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
        <div class="card border-danger shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title text-muted mb-2">Pesan Baru</h6>
                        <h3 class="fw-bold text-danger">{{ $stats['contacts'] }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-envelope fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Pengumuman -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0"><i class="fas fa-bullhorn me-2"></i>Pengumuman Terbaru</h5>
            </div>
            <div class="card-body">
                @if($recentPengumuman->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentPengumuman as $pengumuman)
                            <div class="list-group-item px-0">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ Str::limit($pengumuman->judul, 50) }}</h6>
                                    <small class="text-muted">{{ $pengumuman->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1 text-muted small">{{ Str::limit(strip_tags($pengumuman->konten), 80) }}</p>
                                <small class="text-muted">Oleh: {{ $pengumuman->user->name }}</small>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center py-3">Belum ada pengumuman.</p>
                @endif
            </div>
            <div class="card-footer bg-white">
                <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
        </div>
    </div>

    <!-- Recent Berita -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0"><i class="fas fa-newspaper me-2"></i>Berita Terbaru</h5>
            </div>
            <div class="card-body">
                @if($recentBerita->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentBerita as $berita)
                            <div class="list-group-item px-0">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ Str::limit($berita->judul, 50) }}</h6>
                                    <small class="text-muted">{{ $berita->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1 text-muted small">{{ Str::limit(strip_tags($berita->konten), 80) }}</p>
                                <small class="text-muted">Kategori: {{ $berita->kategori }}</small>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center py-3">Belum ada berita.</p>
                @endif
            </div>
            <div class="card-footer bg-white">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
@endsection