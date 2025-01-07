@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="news-container">
            <h2>Berita</h2>

            <!-- December 25 Section -->
            <div class="date-header">25 Desember 2024</div>
            
            @foreach($news as $item)
            <!-- News Card -->
            <div class="news-card">
                <div class="news-content">
                    <img src="{{ $item->gambar }}" alt="Parkiran Asrama" class="news-image">
                    <div class="news-text">
                        <div class="news-title">
                            {{ $item->judul }}
                            <span class="news-time"></span>
                        </div>
                        <p class="news-description">{{ $item->deskripsi }}</p>
                        <a href="#" class="read-more">Baca Lebih Lengkap »</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection