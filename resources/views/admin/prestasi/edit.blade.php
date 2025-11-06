@extends('layouts.admin')

@section('title', 'Edit Prestasi')
@section('page_title', 'Prestasi')

@section('content')
<div class="card">
    <h3 class="mb-4">Edit Prestasi</h3>
    <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul *</label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $prestasi->judul) }}" required>
            @error('judul')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi *</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="peringkat">Peringkat *</label>
            <input type="text" name="peringkat" id="peringkat" class="form-control @error('peringkat') is-invalid @enderror" value="{{ old('peringkat', $prestasi->peringkat) }}" required>
            @error('peringkat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tingkat">Tingkat *</label>
            <select name="tingkat" id="tingkat" class="form-control @error('tingkat') is-invalid @enderror" required>
                <option value="">Pilih Tingkat</option>
                <option value="Sekolah" {{ old('tingkat', $prestasi->tingkat) == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                <option value="Kabupaten/Kota" {{ old('tingkat', $prestasi->tingkat) == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                <option value="Provinsi" {{ old('tingkat', $prestasi->tingkat) == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                <option value="Nasional" {{ old('tingkat', $prestasi->tingkat) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                <option value="Internasional" {{ old('tingkat', $prestasi->tingkat) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
            </select>
            @error('tingkat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gambar">Gambar Saat Ini</label><br>
            @if($prestasi->gambar)
                <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="Gambar Prestasi" class="img-preview mb-2">
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
            <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection