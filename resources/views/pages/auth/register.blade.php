<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Sistem Pertanahan</title>

    <!-- Bootstrap & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #1b8b4e;
            --primary-dark: #157c46;
            --primary-light: #e8f5ee;
            --accent-color: #ff7e5f;
            --text-dark: #1b1b1b;
            --text-light: #6c757d;
            --white: #ffffff;
            --light-gray: #f8f9fa;
            --border-radius: 16px;
            --box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f1f3f6 0%, #e1e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            display: flex;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Bagian kiri */
        .register-info {
            position: relative;
            color: var(--white);
            flex: 1;
            background: url('https://images.unsplash.com/photo-1603791440384-56cd371ee9a7?auto=format&fit=crop&w=900&q=80')
                center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 60px 40px;
            transition: var(--transition);
        }

        .register-info:hover {
            transform: scale(1.02);
        }

        /* Overlay gradien yang lebih menarik */
        .register-info::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(27, 139, 78, 0.85) 0%, rgba(40, 167, 69, 0.75) 50%, rgba(52, 183, 89, 0.9) 100%);
        }

        .register-info-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
        }

        .logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.8);
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .logo:hover {
            transform: rotate(5deg) scale(1.05);
        }

        .logo i {
            font-size: 50px;
            color: var(--primary-color);
        }

        .register-info h2 {
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 1.8rem;
        }

        .register-info p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 380px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Bagian kanan */
        .register-card {
            flex: 1;
            padding: 50px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
        }

        .register-card h3 {
            text-align: center;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 30px;
            font-size: 1.8rem;
            position: relative;
        }

        .register-card h3::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.2rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            transition: var(--transition);
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(27, 139, 78, 0.15);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--primary-color);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .btn-register {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
            font-weight: 600;
            border-radius: 12px;
            width: 100%;
            transition: var(--transition);
            padding: 12px 0;
            border: none;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(27, 139, 78, 0.3);
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(27, 139, 78, 0.4);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-register:hover::before {
            left: 100%;
        }

        .text-small {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 500;
            transition: var(--transition);
        }

        a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Alert styling */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-danger ul {
            margin-bottom: 0;
        }

        /* Password strength indicator */
        .password-strength {
            height: 4px;
            border-radius: 2px;
            margin-top: 5px;
            transition: var(--transition);
        }

        .strength-weak {
            background-color: #dc3545;
            width: 25%;
        }

        .strength-medium {
            background-color: #ffc107;
            width: 50%;
        }

        .strength-strong {
            background-color: #28a745;
            width: 100%;
        }

        /* Loading spinner */
        .spinner-border {
            width: 1rem;
            height: 1rem;
            margin-right: 8px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .register-card {
                padding: 45px 35px;
            }

            .register-info {
                padding: 50px 30px;
            }
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
                max-width: 500px;
            }

            .register-info {
                min-height: 250px;
                padding: 40px 25px;
                justify-content: center;
            }

            .register-card {
                padding: 40px 30px;
            }

            .logo {
                width: 100px;
                height: 100px;
            }

            .logo i {
                font-size: 40px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .register-card {
                padding: 35px 25px;
            }

            .register-info {
                padding: 35px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="register-container">
        <!-- Bagian kiri -->
        <div class="register-info">
            <div class="register-info-content">
                <div class="logo-container">
                    <div class="logo">
                        <i class="bi bi-house-check-fill"></i>
                    </div>
                </div>
                <h2>Pertanahan Admin</h2>
                <p>
                    Sistem Informasi Pertanahan membantu pengelolaan data warga dan persil tanah
                    secara efisien, transparan, dan terintegrasi.
                </p>
            </div>
        </div>

        <!-- Bagian kanan -->
        <div class="register-card">
            <h3>Registrasi Admin</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.register.submit') }}" id="registerForm">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <div class="input-group">
                        <input type="text" id="nama" name="nama" class="form-control"
                            placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
                        <span class="input-icon">
                            <i class="bi bi-person"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-group">
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Masukkan email" value="{{ old('email') }}" required>
                        <span class="input-icon">
                            <i class="bi bi-envelope"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Masukkan kata sandi" required>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength" id="passwordStrength"></div>
                    <small class="text-muted">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</small>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control" placeholder="Ulangi kata sandi" required>
                        <button type="button" class="password-toggle" id="togglePasswordConfirm">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div id="passwordMatch" class="mt-1"></div>
                </div>

                <button type="submit" class="btn btn-register" id="registerButton">
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    <span class="button-text">Daftar</span>
                </button>

                <p class="text-center text-small mt-4">
                    Sudah punya akun?
                    <a href="{{ route('admin.login') }}">Login</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
            const passwordInput = document.getElementById('password');
            const passwordConfirmInput = document.getElementById('password_confirmation');
            const passwordStrength = document.getElementById('passwordStrength');

            // Toggle untuk password utama
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle eye icon
                const eyeIcon = togglePassword.querySelector('i');
                if (type === 'password') {
                    eyeIcon.classList.remove('bi-eye-slash');
                    eyeIcon.classList.add('bi-eye');
                } else {
                    eyeIcon.classList.remove('bi-eye');
                    eyeIcon.classList.add('bi-eye-slash');
                }
            });

            // Toggle untuk konfirmasi password
            togglePasswordConfirm.addEventListener('click', function() {
                const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmInput.setAttribute('type', type);

                // Toggle eye icon
                const eyeIcon = togglePasswordConfirm.querySelector('i');
                if (type === 'password') {
                    eyeIcon.classList.remove('bi-eye-slash');
                    eyeIcon.classList.add('bi-eye');
                } else {
                    eyeIcon.classList.remove('bi-eye');
                    eyeIcon.classList.add('bi-eye-slash');
                }
            });

            // Password strength indicator
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;

                // Check password length
                if (password.length >= 8) strength += 1;

                // Check for mixed case
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;

                // Check for numbers
                if (password.match(/([0-9])/)) strength += 1;

                // Check for special characters
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;

                // Update strength indicator
                passwordStrength.className = 'password-strength';
                if (password.length === 0) {
                    passwordStrength.style.width = '0%';
                } else if (strength <= 1) {
                    passwordStrength.classList.add('strength-weak');
                } else if (strength <= 2) {
                    passwordStrength.classList.add('strength-medium');
                } else {
                    passwordStrength.classList.add('strength-strong');
                }

                // Check password match
                checkPasswordMatch();
            });

            // Check password confirmation
            passwordConfirmInput.addEventListener('input', checkPasswordMatch);

            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = passwordConfirmInput.value;
                const matchIndicator = document.getElementById('passwordMatch');

                if (confirmPassword.length === 0) {
                    matchIndicator.innerHTML = '';
                } else if (password === confirmPassword) {
                    matchIndicator.innerHTML = '<small class="text-success"><i class="bi bi-check-circle"></i> Kata sandi cocok</small>';
                } else {
                    matchIndicator.innerHTML = '<small class="text-danger"><i class="bi bi-x-circle"></i> Kata sandi tidak cocok</small>';
                }
            }

            // Form submission with loading state
            const registerForm = document.getElementById('registerForm');
            const registerButton = document.getElementById('registerButton');
            const buttonText = registerButton.querySelector('.button-text');
            const spinner = registerButton.querySelector('.spinner-border');

            registerForm.addEventListener('submit', function(e) {
                // Check if passwords match
                const password = passwordInput.value;
                const confirmPassword = passwordConfirmInput.value;

                if (password !== confirmPassword) {
                    e.preventDefault();
                    alert('Kata sandi tidak cocok. Silakan periksa kembali.');
                    return;
                }

                // Show loading state
                buttonText.textContent = 'Mendaftarkan...';
                spinner.classList.remove('d-none');
                registerButton.disabled = true;
            });

            // Add focus effects to form inputs
            const formInputs = document.querySelectorAll('.form-control');

            formInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });

                input.addEventListener('blur', function() {
                    if (this.value === '') {
                        this.parentElement.classList.remove('focused');
                    }
                });
            });
        });
    </script>

</body>
</html>
