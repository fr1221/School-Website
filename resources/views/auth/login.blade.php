<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SMKN 2 Kudus</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0062ff, #4b0082);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Poppins", sans-serif;
            overflow: hidden;
        }

        .login-wrapper {
            position: relative;
            width: 100%;
            max-width: 480px;
            background: #ffffff;
            border-radius: 1.2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 3rem 2.5rem;
            animation: fadeInUp 0.8s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header .logo {
            font-size: 3.5rem;
            color: #0d6efd;
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-header h3 {
            font-weight: 700;
            margin-top: 0.5rem;
            color: #212529;
        }

        .login-header p {
            color: #6c757d;
            font-size: 0.95rem;
        }

        .form-control {
            border-radius: 0.6rem;
            padding: 0.75rem 1rem;
            border: 1.5px solid #e0e0e0;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.2);
        }

        .btn-login {
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            border: none;
            border-radius: 0.6rem;
            padding: 0.8rem;
            color: white;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: transform 0.2s ease, box-shadow 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .footer {
            text-align: center;
            font-size: 0.9rem;
            color: #adb5bd;
            margin-top: 2rem;
        }

        .alert {
            border-radius: 0.6rem;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-header">
            <i class="fa-solid fa-school logo"></i>
            <h3>SMKN 2 Kudus</h3>
            <p>Silakan masuk untuk mengelola sistem sekolah</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center fade show">
                <i class="fa-solid fa-circle-exclamation me-2"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="form-control" placeholder="Masukkan email Anda" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control" placeholder="Masukkan password" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Ingat saya</label>
                </div>
                <a href="#" class="text-decoration-none text-primary fw-semibold">Lupa Password?</a>
            </div>

            <button type="submit" class="btn btn-login w-100">
                <i class="fa-solid fa-right-to-bracket me-2"></i> Masuk
            </button>
        </form>

        <div class="footer">
            &copy; {{ date('Y') }} SMKN 2 Kudus <br>
            <small>Versi Sistem 1.0.0</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
