<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">

    <!-- Volt & Bootstrap CSS -->
    <link href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Animasi Ringan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body { background-color: #f8fafc; }
        .sidebar { background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%); }
        .sidebar .nav-link.active { background-color: #334155 !important; border-radius: 10px; }
        .sidebar .nav-link:hover { background-color: #475569; transition: 0.2s; }
        .btn-custom { border-radius: 10px; font-weight: 600; }
        table th { white-space: nowrap; }
        .table td { vertical-align: middle; }
        footer { font-size: 14px; }
    </style>
</head>

<body>
    @include('admin.layouts._sidebar')

    <main class="content px-4 py-4 bg-light">
        @yield('content')
        @include('admin.layouts._footer')
    </main>

    <!-- JS -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>
</html>
