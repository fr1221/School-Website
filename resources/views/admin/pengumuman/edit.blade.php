@extends('layouts.admin')

@section('title', 'Edit Pengumuman')
@section('page_title', 'Pengumuman')

@section('content')
<div class="card">
    <h3 class="mb-4">Edit Pengumuman</h3>
    <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul *</label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $pengumuman->judul) }}" required>
            @error('judul')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="konten">Konten *</label>
            <textarea name="konten" id="konten" class="form-control @error('konten') is-invalid @enderror" rows="5" required>{{ old('konten', $pengumuman->konten) }}</textarea>
            @error('konten')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gambar">Gambar Saat Ini</label><br>
            @if($pengumuman->gambar)
                <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="Gambar Pengumuman" class="img-preview mb-2">
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
        </div>

        <div class="form-group">
            <label for="gambar">Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
            @error('gambar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection