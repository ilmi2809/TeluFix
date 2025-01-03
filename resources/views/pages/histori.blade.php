@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="history-container">
            <h2>History Laporan</h2>
            
            <!-- Repeat this card for each history item -->
            <div class="history-card">
                <div class="history-header">
                    <h3 class="user-name">Ahmad Alifi</h3>
                    <div class="action-buttons">
                        <button class="btn-action info">
                            <i class='bx bx-info-circle'></i>
                        </button>
                        <button class="btn-action close">
                            <i class='bx bx-x'></i>
                        </button>
                    </div>
                </div>
                <div class="categories-grid">
                    <div class="category-item">
                        <div class="category-label">Category</div>
                        <div class="category-value">Fasilitas</div>
                    </div>
                    <div class="category-item">
                        <div class="category-label">Category</div>
                        <div class="category-value">Fasilitas</div>
                    </div>
                    <div class="category-item">
                        <div class="category-label">Category</div>
                        <div class="category-value">Fasilitas</div>
                    </div>
                    <div class="category-item">
                        <div class="category-label">Category</div>
                        <div class="category-value">Fasilitas</div>
                    </div>
                    <div class="category-item">
                        <div class="category-label">Category</div>
                        <div class="category-value">Fasilitas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection