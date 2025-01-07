@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="history-container">
            <h2><b>History Aspirasi</b></h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($aspirasi->isEmpty())
                <div class="alert alert-info">
                    Belum ada aspirasi yang disubmit.
                </div>
            @else
                @foreach ($aspirasi as $item)
                    <div class="history-card">
                        <div class="categories-grid" style="grid-template-columns: repeat(5, 1fr);">
                            <div class="category-item">
                                <div class="category-label">Jenis Masalah</div>
                                <div class="category-value">{{ $item->jenis_masalah }}</div>
                            </div>
                            <div class="category-item">
                                <div class="category-label">Deskripsi Aspirasi</div>
                                <div class="category-value">{{ $item->deskripsi }}</div>
                            </div>
                            <div class="category-item">
                                <div class="category-label">Bersedia di publikasi</div>
                                <div class="category-value">{{ $item->publikasi }}</div>
                            </div>
                            @if($item->gambar)
                            <div class="category-item">
                                <div class="category-label">Bukti Foto/Video</div>
                                <div class="category-value">
                                    <a href="{{ asset('storage/reports/' . $item->gambar) }}" target="_blank">
                                        <button class="btn btn-outline-secondary">Lihat</button>
                                    </a>
                                </div>
                            </div>
                            @endif
                            <div class="category-item">
                                <div class="category-label">Aksi</div>
                                <div class="category-value d-flex gap-2">
                                    <a href="{{ route('aspirasi.update', $item->id) }}" class="btn btn-outline-primary">Edit</a>
                                    <form action="{{ route('aspirasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus aspirasi ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
