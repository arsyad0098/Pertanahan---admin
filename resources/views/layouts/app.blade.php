<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Dashboard | Sistem Pertanahan')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets-admin/pertanahan/pertanahan.jpg') }}">

    <!-- Bootstrap & Volt CSS -->
    <link href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-green: #10b981;
            --primary-dark: #059669;
            --dark-bg: #0f172a;
            --darker-bg: #020617;
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--darker-bg) 0%, var(--dark-bg) 100%);
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        .sidebar-logo {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar-logo h4 {
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-logo .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-green), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .sidebar-menu {
            padding: 1.5rem 1rem;
        }

        .menu-section-title {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0 0.75rem;
            margin-bottom: 0.75rem;
        }

        .sidebar .nav-link {
            color: #94a3b8;
            padding: 0.875rem 1rem;
            margin-bottom: 0.375rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.875rem;
            font-weight: 500;
            font-size: 0.9375rem;
            position: relative;
            overflow: hidden;
        }

        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: var(--primary-green);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(16, 185, 129, 0.1);
            color: var(--primary-green);
            transform: translateX(4px);
        }

        .sidebar .nav-link:hover::before,
        .sidebar .nav-link.active::before {
            transform: scaleY(1);
        }

        .sidebar .nav-link i {
            font-size: 1.25rem;
            width: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Header Styles */
        .main-header {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: 80px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid #e2e8f0;
            z-index: 999;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s ease;
        }

        .header-left h5 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-bg);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .header-left h5 i {
            color: var(--primary-green);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-search {
            position: relative;
        }

        .header-search input {
            width: 300px;
            padding: 0.625rem 1rem 0.625rem 2.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: white;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .header-search input:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .header-search i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }

        .header-icon-btn {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: white;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .header-icon-btn:hover {
            background: #f8fafc;
            border-color: var(--primary-green);
            transform: translateY(-2px);
        }

        .header-icon-btn i {
            font-size: 1.25rem;
            color: #475569;
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            width: 20px;
            height: 20px;
            background: #ef4444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.625rem;
            font-weight: 700;
            color: white;
            border: 2px solid white;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-dropdown:hover {
            border-color: var(--primary-green);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            overflow: hidden;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            line-height: 1.3;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--dark-bg);
        }

        .user-role {
            font-size: 0.75rem;
            color: #64748b;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: 80px;
            padding: 2rem;
            min-height: calc(100vh - 80px);
        }

        /* Footer */
        .main-footer {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            margin-top: 3rem;
            border: 1px solid #e2e8f0;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            padding: 0.625rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .dropdown-item:hover {
            background: #f8fafc;
            color: var(--primary-green);
        }

        .dropdown-divider {
            margin: 0.5rem 0;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-header {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .header-search {
                display: none;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .main-content > * {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
    <style>
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: #198754;
        border-radius: 8px;
        margin: 0 4px;
        border: 1px solid #19875433;
        padding: 6px 12px;
        transition: 0.2s ease;
        font-weight: 500;
    }

    .pagination .page-item.active .page-link {
        background-color: #198754;
        border-color: #198754;
        color: white;
        box-shadow: 0 0 6px rgba(25,135,84,0.4);
    }

    .pagination .page-item .page-link:hover {
        background-color: #198754;
        color: white;
        border-color: #198754;
    }

    .pagination .page-item.disabled .page-link {
        opacity: 0.5;
        pointer-events: none;
    }
</style>


</head>

<body>
    @include('layouts._sidebar')
    @include('layouts._header')

    <main class="main-content">
        @yield('content')
        @include('layouts._footer')
    </main>

    <!-- Mobile Menu Toggle -->
    <button class="btn btn-primary d-lg-none" id="sidebarToggle" style="position: fixed; bottom: 20px; right: 20px; z-index: 1001; border-radius: 50%; width: 56px; height: 56px;">
        <i class="bi bi-list fs-4"></i>
    </button>

    <!-- Script -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

    <script>
        // Sidebar Toggle for Mobile
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebarMenu').classList.toggle('show');
        });

        // Active Menu
        const currentPath = window.location.pathname;
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>
