<nav id="sidebarMenu" class="sidebar d-lg-block text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item mb-2">
                <a href="#" class="nav-link d-flex align-items-center">
                    <span class="mt-1 ms-1 sidebar-text fs-6 fw-bold text-white">Data Penggunaan Tanah</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('jenis_penggunaan.index') }}" class="nav-link text-white">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('warga.index') }}" class="nav-link text-white">
                    <i class="bi bi-people me-2"></i> Pelanggan
                </a>
            </li>
            <li class="nav-item mt-4">
                <a href="{{ route('admin.login') }}" class="btn btn-warning w-100 d-flex align-items-center justify-content-center btn-custom">
                    <i class="bi bi-box-arrow-right me-2"></i> Log Out
                </a>
            </li>
        </ul>
    </div>
</nav>
