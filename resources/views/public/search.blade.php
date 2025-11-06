@extends('layouts.app') <!-- Gunakan layout utama Anda -->

@section('title', 'Hasil Pencarian - SMKN 2 Kudus')

@section('content')
<div class="pt-24 pb-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6">
        <!-- Section Header dengan Search Bar -->
        <section class="mb-8">
            <div class="bg-gradient-to-r from-blue-800 to-blue-900 rounded-xl p-6 text-white shadow-lg">
                <h1 class="text-2xl md:text-3xl font-bold mb-4 text-center">Pencarian</h1>
                <form action="{{ route('search') }}" method="GET" class="max-w-2xl mx-auto">
                    <div class="flex gap-2">
                        <input
                            type="text"
                            name="q"
                            placeholder="Cari berita, pengumuman, prestasi..."
                            class="flex-grow px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300 shadow"
                            value="{{ $query ?? '' }}">
                        <button
                            type="submit"
                            class="btn-primary px-6 py-3 rounded-lg font-semibold shadow hover:shadow-md transition-shadow duration-200 whitespace-nowrap"
                        >
                            <i class="fas fa-search mr-2"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Section Hasil Pencarian -->
        <section class="mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <!-- Informasi Query dan Jumlah Hasil -->
                @if($query)
                    @php
                        $totalResults = $pengumuman->count() + $berita->count() + $prestasi->count();
                    @endphp
                    <div class="mb-6 pb-3 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800">Hasil pencarian untuk: "<span class="text-blue-600">{{ $query }}</span>"</h2>
                        <p class="text-sm text-gray-600 mt-1">{{ $totalResults }} hasil ditemukan</p>
                    </div>
                @endif

                <!-- Loop Hasil Pencarian dari Controller -->
                @if(($pengumuman && $pengumuman->count() > 0) || ($berita && $berita->count() > 0) || ($prestasi && $prestasi->count() > 0))
                    <div class="space-y-6">
                        <!-- Loop Pengumuman -->
                        @if($pengumuman && $pengumuman->count() > 0)
                            @foreach($pengumuman as $item)
                                <article class="border-l-4 border-blue-500 pl-4 py-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">
                                        <a href="{{ route('pengumuman.detail', $item->slug) }}" class="hover:text-blue-600">{{ $item->judul }}</a>
                                    </h3>
                                    <div class="flex flex-wrap items-center text-xs text-gray-500 mb-2 gap-x-3 gap-y-1">
                                        <span class="flex items-center"><i class="far fa-calendar-alt mr-1 text-[10px]"></i> {{ $item->created_at->translatedFormat('d M Y') }}</span>
                                        <span class="flex items-center"><i class="fas fa-tag mr-1 text-[10px]"></i> Pengumuman</span>
                                    </div>
                                    <p class="text-gray-700 text-sm line-clamp-2">
                                        {!! Str::limit(strip_tags($item->konten), 150) !!}
                                    </p>
                                </article>
                            @endforeach
                        @endif

                        <!-- Loop Berita -->
                        @if($berita && $berita->count() > 0)
                            @foreach($berita as $item)
                                <article class="border-l-4 border-blue-500 pl-4 py-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">
                                        <a href="{{ route('berita.detail', $item->slug) }}" class="hover:text-blue-600">{{ $item->judul }}</a>
                                    </h3>
                                    <div class="flex flex-wrap items-center text-xs text-gray-500 mb-2 gap-x-3 gap-y-1">
                                        <span class="flex items-center"><i class="far fa-calendar-alt mr-1 text-[10px]"></i> {{ $item->created_at->translatedFormat('d M Y') }}</span>
                                        <span class="flex items-center"><i class="fas fa-tag mr-1 text-[10px]"></i> Berita</span>
                                    </div>
                                    <p class="text-gray-700 text-sm line-clamp-2">
                                        {!! Str::limit(strip_tags($item->konten), 150) !!}
                                    </p>
                                </article>
                            @endforeach
                        @endif

                        <!-- Loop Prestasi -->
                        @if($prestasi && $prestasi->count() > 0)
                            @foreach($prestasi as $item)
                                <article class="border-l-4 border-blue-500 pl-4 py-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">
                                        <a href="{{ route('prestasi.detail', $item->slug) }}" class="hover:text-blue-600">{{ $item->judul }}</a>
                                    </h3>
                                    <div class="flex flex-wrap items-center text-xs text-gray-500 mb-2 gap-x-3 gap-y-1">
                                        <span class="flex items-center"><i class="far fa-calendar-alt mr-1 text-[10px]"></i> {{ $item->created_at->translatedFormat('d M Y') }}</span>
                                        <span class="flex items-center"><i class="fas fa-tag mr-1 text-[10px]"></i> Prestasi</span>
                                    </div>
                                    <p class="text-gray-700 text-sm line-clamp-2">
                                        {{ Str::limit($item->deskripsi, 150) }}
                                    </p>
                                </article>
                            @endforeach
                        @endif

                    </div>
                @else
                    <!-- Pesan Jika Tidak Ada Hasil -->
                    @if($query)
                        <div class="text-center py-10">
                            <i class="fas fa-search text-gray-400 text-5xl mb-3"></i>
                            <h3 class="text-lg font-semibold text-gray-700 mb-1">Pencarian Tidak Ditemukan</h3>
                            <p class="text-gray-600 text-sm">Kata kunci "{{ $query }}" tidak ditemukan dalam database kami.</p>
                        </div>
                    @endif
                @endif

            </div>
        </section>
    </div>
</div>
@endsection