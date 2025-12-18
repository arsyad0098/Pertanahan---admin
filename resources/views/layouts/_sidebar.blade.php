<nav id="sidebarMenu" class="sidebar">
    <!-- Logo Section -->
    <div class="sidebar-logo">
        <div class="logo-wrapper">
            <img src="{{ asset('images/logo2.jpg') }}">
            <!-- <h1>Sistem Pertanahan</h1>
        <span>Admin Panel</span> -->
        </div>
    </div>


    <!-- Menu Section -->
    <div class="sidebar-menu">
        <!-- Main Menu -->
        <div class="menu-section-title">Menu Utama</div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('jenis_penggunaan.index') }}" class="nav-link">
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Data Penggunaan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('warga.index') }}" class="nav-link">
                    <i class="bi bi-people-fill"></i>
                    <span>Data Warga</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('data_user.index') }}" class="nav-link">
                    <i class="bi bi-people-fill"></i>
                    <span>Data User</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('persil.index') }}" class="nav-link">
                    <i class="bi bi-map-fill"></i>
                    <span>Data Persil</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pengembang.index') }}" class="nav-link">
                    <i class="bi bi-person-badge me-2"></i>
                    Identitas Pengembang
                </a>
            </li>


        </ul>

        <!-- Management Menu -->
        <div class="menu-section-title mt-4">Manajemen</div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dokumentasi.index') }}" class="nav-link">
                    <i class="bi bi-camera-fill"></i>
                    <span>Dokumentasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-gear-fill"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>

        <!-- System Info -->
        <div style="margin-top: 3rem; padding: 1rem; background: rgba(16, 185, 129, 0.1); border-radius: 12px; border: 1px solid rgba(16, 185, 129, 0.2);">
            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-green), var(--primary-dark)); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-building" style="color: white; font-size: 1.25rem;"></i>
                </div>
                <div style="flex: 1;">
                    <div style="color: white; font-weight: 600; font-size: 0.875rem;">Kel. Bina Dera</div>
                    <div style="color: #64748b; font-size: 0.75rem;">Pekanbaru, Riau</div>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem; background: rgba(0, 0, 0, 0.2); border-radius: 8px;">
                <i class="bi bi-circle-fill" style="color: var(--primary-green); font-size: 0.5rem;"></i>
                <span style="color: #94a3b8; font-size: 0.8125rem;">System Active</span>
                <span style="margin-left: auto; color: #64748b; font-size: 0.75rem;">v1.0.0</span>
            </div>
        </div>

        <!-- Logout Button -->
        <a href="{{ route('admin.login') }}"
            style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; margin-top: 1.5rem; padding: 1rem; background: linear-gradient(135deg, #ef4444, #dc2626); color: white; border-radius: 12px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; border: none;">
            <i class="bi bi-box-arrow-right" style="font-size: 1.25rem;"></i>
            <span>Keluar Sistem</span>
        </a>
    </div>
</nav>
<style>
    /* ===== Sidebar Logo ===== */
    .sidebar-logo {
        padding: 2rem 1rem 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.6rem;
    }

    /* LOGO */
    .logo-wrapper img {
        width: 200px;
        /* 👈 DIBESARKAN */
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 4px 12px rgba(0, 0, 0, .35));
        /* biar nongol */
    }

    /* JUDUL */
    .logo-wrapper h1 {
        font-size: 1.05rem;
        /* lebih kebaca */
        font-weight: 700;
        color: #22c55e;
        margin: 0;
        text-align: center;
        line-height: 1.2;
    }

    /* SUBTITLE */
    .logo-wrapper span {
        font-size: 0.72rem;
        color: #cbd5f5;
        /* lebih terang */
        letter-spacing: 0.6px;
        text-transform: uppercase;
    }
</style>