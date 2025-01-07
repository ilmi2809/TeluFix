@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="dashboard-container">
        <h2><b>Dashboard</b></h2>
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
    <div class="notification-section mt-4">
        <h3><b>Notifikasi</b></h3>
        <div class="notification-list">
            @if($notifications->isEmpty())
                <div class="empty-state p-4 text-center text-muted">
                    Belum ada notifikasi
                </div>
            @else
                @foreach($notifications as $notification)
                    <div class="notification-item {{ is_null($notification->read_at) ? 'unread' : '' }} p-3">
                        <div class="notification-content">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge
                                        {{ $notification->status === 'belum_verifikasi' ? 'bg-warning' : '' }}
                                        {{ $notification->status === 'dalam_pengerjaan' ? 'bg-primary' : '' }}
                                        {{ $notification->status === 'selesai' ? 'bg-success' : '' }}">
                                        {{ str_replace('_', ' ', ucfirst($notification->status)) }}
                                    </span>
                                    <p class="notification-message mt-2 mb-1">{{ $notification->message }}</p>
                                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                                @if(is_null($notification->read_at))
                                    <button class="btn btn-sm btn-light mark-as-read" data-id="{{ $notification->id }}">
                                        <i class='bx bx-x'></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<script>
    // public/js/notifications.js
document.addEventListener('DOMContentLoaded', function() {
    // Mark notification as read
    document.querySelectorAll('.mark-as-read').forEach(button => {
        button.addEventListener('click', function() {
            const notificationId = this.dataset.id;
            fetch(`/notifications/${notificationId}/mark-as-read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.closest('.notification-item').classList.remove('unread');
                    this.remove();
                    updateUnreadCount();
                }
            });
        });
    });

    // Update unread count
    function updateUnreadCount() {
        fetch('/notifications/unread-count')
            .then(response => response.json())
            .then(data => {
                const badge = document.querySelector('.notification-badge');
                if (badge) {
                    badge.textContent = data.count;
                    badge.style.display = data.count > 0 ? 'block' : 'none';
                }
            });
    }

    // Update count periodically
    setInterval(updateUnreadCount, 60000); // Check every minute
});
</script>
@endsection
