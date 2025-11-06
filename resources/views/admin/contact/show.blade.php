@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')
@section('page_title', 'Pesan Kontak')

@section('content')
<div class="card">
    <h3 class="mb-4">Detail Pesan Kontak</h3>
    <div class="mb-3">
        <strong>Nama:</strong>
        <p>{{ $contact->nama }}</p>
    </div>
    <div class="mb-3">
        <strong>Email:</strong>
        <p>{{ $contact->email }}</p>
    </div>
    <div class="mb-3">
        <strong>Tanggal:</strong>
        <p>{{ $contact->created_at->format('d M Y H:i') }}</p>
    </div>
    <div class="mb-4">
        <strong>Pesan:</strong>
        <p>{{ $contact->pesan }}</p>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>
</div>
@endsection