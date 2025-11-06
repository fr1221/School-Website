@extends('layouts.admin')

@section('title', 'Edit Alumni')
@section('page_title', 'Alumni')

@section('content')
<div class="card">
    <h3 class="mb-4">Edit Alumni</h3>
    <form action="{{ route('admin.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama *</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $alumni->nama) }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan *</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan', $alumni->jurusan) }}" required>
            @error('jurusan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tahun_lulus">Tahun Lulus *</label>
            <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror" value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}" min="1990" max="{{ date('Y') + 1 }}" required>
            @error('tahun_lulus')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="testimoni">Testimoni *</label>
            <textarea name="testimoni" id="testimoni" class="form-control @error('testimoni') is-invalid @enderror" rows="4" required>{{ old('testimoni', $alumni->testimoni) }}</textarea>
            @error('testimoni')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="foto">Foto Saat Ini</label><br>
            @if($alumni->foto)
                <img src="{{ asset('storage/' . $alumni->foto) }}" alt="Foto Alumni" class="img-preview mb-2 rounded-full" style="width: 100px; height: 100px; object-fit: cover;">
            @else
                <p class="text-muted">Tidak ada foto</p>
            @endif
        </div>

        <div class="form-group">
            <label for="foto">Ganti Foto (Opsional)</label>
            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection