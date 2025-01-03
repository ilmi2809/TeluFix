@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="dashboard-container">
        <h2>Dashboard</h2>
        <div class="metrics-container">
            <div class="metric-card">
                <div class="metric-title">Total Laporan</div>
                <div class="metric-value">{{ $reports }}</div>
            </div>
            <div class="metric-card">
                <div class="metric-title">Belum Terverifikasi</div>
                <div class="metric-value">{{ $unverified }}</div>
                <div class="status-icon status-warning">
                    <i class='bx bx-time'></i>
                </div>
            </div>
            <div class="metric-card">
                <div class="metric-title">Dalam Pengerjaan</div>
                <div class="metric-value">{{ $inProgress }}</div>
                <div class="status-icon status-progress">
                    <i class='bx bx-loader'></i>
                </div>
            </div>
            <div class="metric-card">
                <div class="metric-title">Laporan Selesai</div>
                <div class="metric-value">{{ $completed }}</div>
                <div class="status-icon status-success">
                    <i class='bx bx-check'></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection