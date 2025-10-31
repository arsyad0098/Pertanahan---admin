<nav id="sidebarMenu" class="sidebar d-lg-block text-white collapse" data-simplebar
    style="background-color: #0f172a;">
    <div class="sidebar-inner px-4 pt-4">

        <ul class="nav flex-column mt-3 pt-md-1">
            <!-- Judul Sidebar -->
            <li class="nav-item mb-4">
                <a href="#" class="nav-link d-flex align-items-center">
                    <span class="mt-1 ms-1 sidebar-text fs-6 fw-bold text-white">
                       
                    </span>
                </a>
            </li>

            <!-- Menu: Data Penggunaan -->
            <li class="nav-item mb-3">
                <a href="{{ route('jenis_penggunaan.index') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-speedometer2 me-2"></i>
                    <span>Data Penggunaan</span>
                </a>
            </li>

            <!-- Menu: Data Warga -->
            <li class="nav-item mb-3">
                <a href="{{ route('warga.index') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-people me-2"></i>
                    <span>Data Warga</span>
                </a>
            </li>

            <!-- Tombol Logout -->
            <li class="nav-item mt-5">
                <a href="{{ route('admin.login') }}"
                    class="btn btn-warning w-100 d-flex align-items-center justify-content-center fw-semibold"
                    style="border-radius: 8px;">
                    <i class="bi bi-box-arrow-right me-2"></i> Log Out
                </a>
            </li>
        </ul>
    </div>
</nav>
