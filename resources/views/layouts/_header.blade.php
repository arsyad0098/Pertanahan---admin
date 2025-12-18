<header class="main-header">
    <!-- Left Section -->
    <div class="header-left">
        <h5>
            <i class="bi bi-grid-3x3-gap-fill"></i>
            @yield('title', 'Dashboard')
        </h5>
    </div>

    <!-- Right Section -->
    <div class="header-right">
        <!-- Search Bar -->
        <div class="header-search d-none d-md-block">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Cari data, warga, atau laporan..." />
        </div>

        <!-- Notification Button -->
        <div class="header-icon-btn" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell-fill"></i>
            <span class="notification-badge">3</span>
        </div>
        <ul class="dropdown-menu dropdown-menu-end" style="width: 320px;">
            <li class="px-3 py-2">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <h6 class="mb-0 fw-bold">Notifikasi</h6>
                    <span class="badge bg-primary rounded-pill">3 Baru</span>
                </div>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="#">
                    <div style="display: flex; gap: 0.75rem;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #3b82f6, #2563eb); border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-person-plus-fill text-white"></i>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-weight: 600; font-size: 0.875rem; color: #0f172a;">Warga Baru Terdaftar</div>
                            <div style="font-size: 0.75rem; color: #64748b;">Budi Santoso telah ditambahkan</div>
                            <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 0.25rem;">5 menit yang lalu</div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <div style="display: flex; gap: 0.75rem;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-file-earmark-check-fill text-white"></i>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-weight: 600; font-size: 0.875rem; color: #0f172a;">Laporan Disetujui</div>
                            <div style="font-size: 0.75rem; color: #64748b;">Laporan penggunaan tanah RT 03</div>
                            <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 0.25rem;">1 jam yang lalu</div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <div style="display: flex; gap: 0.75rem;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-exclamation-triangle-fill text-white"></i>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-weight: 600; font-size: 0.875rem; color: #0f172a;">Perhatian Diperlukan</div>
                            <div style="font-size: 0.75rem; color: #64748b;">Data tanah perlu diperbarui</div>
                            <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 0.25rem;">2 jam yang lalu</div>
                        </div>
                    </div>
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item text-center" href="#" style="color: var(--primary-green); font-weight: 600;">
                    Lihat Semua Notifikasi
                </a>
            </li>
        </ul>

        <!-- Settings Button -->
        <div class="header-icon-btn">
            <i class="bi bi-gear-fill"></i>
        </div>

        <!-- User Dropdown -->
        <div class="dropdown">
            <div class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::check())
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=10b981&color=fff&bold=true"
                         alt="{{ Auth::user()->nama }}"
                         class="user-avatar" />
                    <div class="user-info d-none d-lg-block">
                        <div class="user-name">{{ Auth::user()->nama }}</div>
                        <div class="user-role">Administrator</div>
                    </div>
                @else
                    <img src="https://ui-avatars.com/api/?name=Admin&background=10b981&color=fff&bold=true"
                         alt="Admin"
                         class="user-avatar" />
                    <div class="user-info d-none d-lg-block">
                        <div class="user-name">Admin System</div>
                        <div class="user-role">Administrator</div>
                    </div>
                @endif
                <i class="bi bi-chevron-down d-none d-lg-block" style="color: #64748b; font-size: 0.875rem;"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-person-fill"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-gear-fill"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-shield-fill-check"></i>
                        <span>Keamanan</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="#" style="color: #64748b;">
                        <i class="bi bi-clock-fill"></i>
                        <span>Login Terakhir: {{ session('last_login') ?? '-' }}</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="dropdown-item" style="color: #ef4444; border: none; background: none; width: 100%; text-align: left; cursor: pointer; padding: 0.5rem 1rem;">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar Sistem</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

<style>
    /* Additional Header Dropdown Styles */
    .dropdown-menu {
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-item:active {
        background-color: rgba(16, 185, 129, 0.1) !important;
        color: var(--primary-green) !important;
    }
    
    /* Style untuk logout button */
    .dropdown-item button:hover {
        background-color: transparent !important;
    }
</style>