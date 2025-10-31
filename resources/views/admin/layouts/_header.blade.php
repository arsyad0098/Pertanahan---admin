<header class="navbar navbar-expand-lg px-4 py-3 sticky-top shadow-sm" style="background-color: #1E293B;">
    <div class="container-fluid">
        <!-- Judul halaman -->
        <h5 class="fw-semibold text-white mb-0">
            <i class="bi bi-grid me-2 text-warning"></i>@yield('title', 'Dashboard')
        </h5>

        <!-- Bagian kanan -->
        <div class="ms-auto d-flex align-items-center gap-3">
            <!-- Notifikasi -->
            <button class="btn btn-light border-0 position-relative">
                <i class="bi bi-bell fs-5 text-dark"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                </span>
            </button>

            <!-- Dropdown Profil -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                    id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=1E293B&color=fff"
                        alt="profile" width="36" height="36" class="rounded-circle me-2">
                    <span class="fw-semibold text-white">Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownUser">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="{{ route('admin.login') }}">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
