@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="news-container">
            <h2><b>Berita</b></h2>

            @foreach($news as $item)
            <div class="news-card">
                <div class="news-content">
                    <img src="{{ asset('storage/news') . '/' . $item->gambar }}" class="news-image">
                    <div class="news-text">
                        <div class="news-title">
                            {{ $item->judul }}
                            <span class="news-time"></span>
                        </div>
                        <p class="news-description">{{ $item->deskripsi }}</p>
                        <a href=" " class="read-more">Baca Lebih Lengkap »</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
