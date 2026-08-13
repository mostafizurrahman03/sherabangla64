<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | MyApp</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: linear-gradient(135deg, #0f1720 0%, #252b33 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            animation: fadeInUp 0.6s ease;
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

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo a {
            color: #fff;
            font-size: 40px;
            font-weight: 300;
            text-decoration: none;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .login-logo a b {
            font-weight: 700;
        }

        .login-logo .logo-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin-top: 5px;
            font-weight: 300;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            background: #fff;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 30px 20px;
            border: none;
            text-align: center;
        }

        .card-header h3 {
            color: #fff;
            font-weight: 600;
            margin: 0;
            font-size: 24px;
        }

        .card-header p {
            color: rgba(255, 255, 255, 0.85);
            margin: 5px 0 0;
            font-size: 14px;
        }

        .card-body {
            padding: 30px 30px 35px;
        }

        .alert {
            border-radius: 8px;
            padding: 12px 18px;
            font-size: 14px;
            margin-bottom: 20px;
            border: none;
            animation: slideDown 0.4s ease;
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

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .alert-danger ul {
            list-style: none;
            padding: 0;
            margin: 5px 0 0;
        }

        .alert-danger ul li {
            padding: 2px 0;
        }

        .input-group {
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s;
            background: #f8f9fa;
        }

        .input-group:focus-within {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.3);
            background: #fff;
        }

        .input-group-text {
            background: #f8f9fa;
            border: none;
            color: #6c757d;
            padding: 0 15px;
            font-size: 18px;
            min-width: 45px;
            justify-content: center;
        }

        .input-group:focus-within .input-group-text {
            color: #667eea;
        }

        .form-control {
            border: none;
            padding: 12px 15px;
            font-size: 15px;
            background: #f8f9fa;
            height: auto;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: #fff;
            box-shadow: none;
            border-color: none;
        }

        .form-control.is-invalid {
            border: 2px solid #dc3545;
            background: #fff;
        }

        .invalid-feedback {
            display: block;
            font-size: 13px;
            color: #dc3545;
            margin-top: 5px;
            padding-left: 5px;
        }

        .form-control.is-invalid:focus {
            border-color: #dc3545;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            margin: 5px 0 20px;
        }

        .checkbox-wrapper input[type="checkbox"] {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .checkbox-wrapper label {
            margin: 0;
            cursor: pointer;
            color: #495057;
            font-size: 14px;
            user-select: none;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            color: #fff;
            width: 100%;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: #fff;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login i {
            margin-right: 8px;
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 25px 0 20px;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #e9ecef;
        }

        .divider span {
            background: #fff;
            padding: 0 15px;
            position: relative;
            color: #6c757d;
            font-size: 14px;
        }

        .social-login {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .social-login .btn {
            flex: 1;
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            color: #fff;
        }

        .social-login .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .social-login .btn-facebook {
            background: #3b5998;
        }

        .social-login .btn-google {
            background: #dd4b39;
        }

        .social-login .btn i {
            margin-right: 8px;
        }

        .auth-links {
            margin-top: 20px;
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        .auth-links a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
            display: inline-block;
            margin: 0 10px;
        }

        .auth-links a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .auth-links .separator {
            color: #dee2e6;
            font-weight: 300;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                max-width: 100%;
            }

            .card-body {
                padding: 20px;
            }

            .card-header {
                padding: 25px 20px 15px;
            }

            .social-login {
                flex-direction: column;
            }

            .auth-links a {
                display: block;
                margin: 5px 0;
            }

            .auth-links .separator {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Logo -->
        <div class="login-logo">
            <a href="#"><b>My</b>App</a>
            <div class="logo-subtitle">Secure &amp; Modern Authentication</div>
        </div>

        <!-- Login Card -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-lock mr-2"></i>Welcome Back</h3>
                <p>Sign in to access your dashboard</p>
            </div>

            <div class="card-body">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <strong>Please fix the following errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-chevron-right mr-1" style="font-size: 10px;"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email Address"
                            value="{{ old('email') }}" required autofocus autocomplete="username">
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Password -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password" required
                            autocomplete="current-password">
                        <div class="input-group-append" style="cursor: pointer;" onclick="togglePassword()">
                            <span class="input-group-text">
                                <i class="fas fa-eye" id="togglePasswordIcon"></i>
                            </span>
                        </div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Remember Me -->
                    <div class="checkbox-wrapper">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            <i class="fas fa-check-circle mr-1" style="color: #667eea;"></i>
                            Remember me
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Sign In
                    </button>
                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>Or continue with</span>
                </div>

                <!-- Social Login -->
                <div class="social-login">
                    <a href="#" class="btn btn-facebook">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="#" class="btn btn-google">
                        <i class="fab fa-google"></i> Google
                    </a>
                </div>

                <!-- Auth Links -->
                <div class="auth-links">
                    <a href="{{ route('password.request') }}">
                        <i class="fas fa-key mr-1"></i> Forgot Password?
                    </a>
                    <span class="separator">|</span>
                    <a href="{{ route('register') }}">
                        <i class="fas fa-user-plus mr-1"></i> Create Account
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Auto-hide alerts after 5 seconds
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert').fadeOut('slow', function () {
                    $(this).remove();
                });
            }, 5000);

            // Add focus animation to input groups
            $('.input-group input').on('focus', function () {
                $(this).closest('.input-group').addClass('focused');
            }).on('blur', function () {
                $(this).closest('.input-group').removeClass('focused');
            });
        });

        // Handle enter key for form submission
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                const form = document.querySelector('form');
                if (form) {
                    event.preventDefault();
                    form.submit();
                }
            }
        });
    </script>
</body>

</html>