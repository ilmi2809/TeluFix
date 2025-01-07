<div class="sidebar d-flex flex-column h-100">
    <div class="flex-grow-1">
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo.png') }}" alt="UFix Logo">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class='bx bx-grid-alt'></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('berita') }}">
                    <i class='bx bx-line-chart'></i>
                    Berita
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lapor') }}">
                    <i class='bx bx-file'></i>
                    Tambah Lapor
                    <span class="notification-dot"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('aspirasi') }}">
                    <i class='bx bx-file'></i>
                    Tambah Aspirasi
                    <span class="notification-dot"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('histori') }}">
                    <i class='bx bx-history'></i>
                    Histori Lapor
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('histori_aspirasi') }}">
                    <i class='bx bx-history'></i>
                    Histori Aspirasi
                </a>
            </li>
        </ul>
    </div>

    <!-- User Profile di bagian bawah -->
    <div class="user-profile mt-auto p-3">
        <a href="{{ route('profile') }}" class="text-decoration-none">
            <div class="d-flex align-items-center">
                <img src="{{ asset('storage/assets/images/' . auth()->user()->foto) }}"
                     alt="User Avatar"
                     class="profile-image">
                <div class="user-info ms-3">
                    <p class="name mb-0">{{ auth()->user()->name }}</p>
                    <small class="email text-muted">{{ auth()->user()->email }}</small>
                </div>
            </div>
        </a>
    </div>
</div>
