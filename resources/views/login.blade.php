
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pertanahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f8fd;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            background-color: #1fa2ff;
            background-image: linear-gradient(120deg, #1fa2ff, #12d8fa, #a6ffcb);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 40%;
        }
        .sidebar h2 {
            font-weight: 700;
            font-size: 2rem;
        }
        .form-container {
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            width: 400px;
            padding: 30px;
        }
        .login-card h3 {
            text-align: center;
            font-weight: 600;
            color: #333;
        }
        .btn-login {
            background-color: #1fa2ff;
            border: none;
            color: white;
            font-weight: 600;
            width: 100%;
            border-radius: 10px;
        }
        .btn-login:hover {
            background-color: #12d8fa;
        }
        .form-control {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <!-- Sidebar kiri -->
    <div class="sidebar">
        <h2>Pertanahan</h2>
        <p style="max-width: 250px; text-align:center;">Sistem Informasi Data Tanah</p>
    </div>

    <!-- Form kanan -->
    <div class="form-container">
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

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3 mt-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="{{ old('username') }}" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" >
        </div>
        <button type="submit" class="btn btn-login mt-3">Masuk</button>
    </form>
</div>      

</body>
</html>
