<div class="sidebar">
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
                    Lapor
                    <span class="notification-dot"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('histori') }}">
                    <i class='bx bx-history'></i>
                    History
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class='bx bx-cog'></i>
                    Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="#">
                    <i class='bx bx-log-out'></i>
                    Logout
                </a>
            </li>
        </ul>
        <!-- User Profile -->
        <div class="user-profile">
            <img src="https://via.placeholder.com/32" alt="User Avatar">
            <div class="user-info">
                <p class="name">Ilmi Syahbana Hasanudin</p>
                <p class="email">ilmisyahbana@gmail.com</p>
            </div>
        </div>
    </div>