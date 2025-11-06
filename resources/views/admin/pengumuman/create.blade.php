@extends('layouts.admin')

@section('title', 'Tambah Pengumuman')
@section('page_title', 'Pengumuman')

@section('content')
<div class="card">
    <h3 class="mb-4">Tambah Pengumuman Baru</h3>
    <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul *</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="konten">Konten *</label>
            <textarea name="konten" id="konten" class="form-control" rows="5" required>{{ old('konten') }}</textarea>
            @error('konten')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gambar">Gambar (Opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            @error('gambar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection