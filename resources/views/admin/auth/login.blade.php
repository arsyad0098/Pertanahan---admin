<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pertanahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 40px 35px;
            width: 400px;
        }

        .login-card h3 {
            font-weight: 600;
            color: #212529;
            text-align: center;
        }

        .btn-login {
            background-color: #212529;
            color: #fff;
            border-radius: 10px;
            width: 100%;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-login:hover {
            background-color: #343a40;
        }

        .form-control {
            border-radius: 10px;
        }

        .text-small {
            font-size: 0.9rem;
            color: #6c757d;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <h3>Login Admin</h3>

        {{-- Pesan Error --}}
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn btn-login mt-3">Masuk</button>

            <p class="text-center text-small mt-4">
                Belum punya akun?
                <a href="{{ route('admin.register') }}">Daftar</a>
            </p>
        </form>
    </div>

</body>

</html>