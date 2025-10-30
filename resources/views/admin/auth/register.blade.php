<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Pertanahan</title>
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
        .register-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 40px 35px;
            width: 400px;
        }
        .register-card h3 {
            font-weight: 600;
            color: #212529;
            text-align: center;
        }
        .btn-register {
            background-color: #212529;
            color: #fff;
            border-radius: 10px;
            width: 100%;
            font-weight: 600;
            transition: 0.2s;
        }
        .btn-register:hover {
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

<div class="register-card">
    <h3>Registrasi Akun</h3>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form method="POST" action="{{ route('admin.register.submit') }}">
    @csrf
    <div class="mt-4 mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" value="{{ old('nama') }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password">
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Sandi</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ulangi password">
    </div>
    <button type="submit" class="btn btn-register mt-3">Daftar</button>

    <p class="text-center text-small mt-4">
        Sudah punya akun?
        <a href="{{ route('admin.login') }}">Login</a>
    </p>
</form>


</body>
</html>
