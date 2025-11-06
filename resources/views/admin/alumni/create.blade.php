@extends('layouts.admin')

@section('title', 'Tambah Alumni')
@section('page_title', 'Alumni')

@section('content')
<div class="card">
    <h3 class="mb-4">Tambah Alumni Baru</h3>
    <form action="{{ route('admin.alumni.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama *</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan *</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan') }}" required>
            @error('jurusan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tahun_lulus">Tahun Lulus *</label>
            <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" value="{{ old('tahun_lulus') }}" min="1990" max="{{ date('Y') + 1 }}" required>
            @error('tahun_lulus')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="testimoni">Testimoni *</label>
            <textarea name="testimoni" id="testimoni" class="form-control" rows="4" required>{{ old('testimoni') }}</textarea>
            @error('testimoni')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="foto">Foto (Opsional)</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection