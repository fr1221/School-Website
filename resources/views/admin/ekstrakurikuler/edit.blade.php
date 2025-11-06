@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')
@section('page_title', 'Ekstrakurikuler')

@section('content')
<div class="card">
    <h3 class="mb-4">Edit Ekstrakurikuler</h3>
    <form action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama *</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $ekstrakurikuler->nama) }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi *</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" required>{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pembina">Pembina (Opsional)</label>
            <input type="text" name="pembina" id="pembina" class="form-control @error('pembina') is-invalid @enderror" value="{{ old('pembina', $ekstrakurikuler->pembina) }}">
            @error('pembina')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gambar">Gambar Saat Ini</label><br>
            @if($ekstrakurikuler->gambar)
                <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="Gambar Ekstrakurikuler" class="img-preview mb-2">
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
            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection