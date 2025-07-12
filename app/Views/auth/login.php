<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Flow</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-red: #e74c3c;
            --dark-red: #c0392b;
            --light-red: #f8d7da;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-600: #6c757d;
            --gray-800: #343a40;
            --white: #ffffff;
            --success-green: #27ae60;
            --light-green: #d4edda;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--gray-100) 0%, var(--white) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .login-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            min-height: 600px;
        }

        .brand-section {
            background: linear-gradient(135deg, var(--primary-red) 0%, var(--dark-red) 100%);
            color: var(--white);
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .brand-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 8s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .brand-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .welcome-text {
            font-size: 1.8rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .tagline {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
            font-weight: 300;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .stat-item {
            text-align: center;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .form-section {
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-title {
            font-size: 2.2rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 10px;
            text-align: center;
        }

        .form-subtitle {
            color: var(--gray-600);
            text-align: center;
            margin-bottom: 40px;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            font-weight: 500;
            color: var(--gray-800);
            margin-bottom: 8px;
            display: block;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-red);
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
            transform: translateY(-2px);
        }

        .form-control:hover {
            border-color: var(--primary-red);
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary-red) 0%, var(--dark-red) 100%);
            border: none;
            border-radius: 10px;
            color: var(--white);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            color: var(--gray-600);
            font-size: 0.95rem;
        }

        .register-link a {
            color: var(--primary-red);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: var(--dark-red);
            text-decoration: underline;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: none;
            font-size: 0.9rem;
        }

        .alert-danger {
            background: rgba(231, 76, 60, 0.1);
            color: var(--dark-red);
            border-left: 4px solid var(--primary-red);
        }

        .alert-success {
            background: rgba(39, 174, 96, 0.1);
            color: var(--success-green);
            border-left: 4px solid var(--success-green);
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: var(--gray-600);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: var(--primary-red);
        }

        @media (max-width: 768px) {
            .login-card {
                margin: 10px;
            }
            
            .brand-section,
            .form-section {
                padding: 40px 30px;
            }
            
            .logo {
                font-size: 2.5rem;
            }
            
            .welcome-text {
                font-size: 1.5rem;
            }
            
            .tagline {
                font-size: 1.1rem;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="row g-0 h-100">
                <div class="col-lg-6">
                    <div class="brand-section h-100">
                        <div class="brand-content">
                            <div class="logo">
                                <i class="fas fa-chart-line"></i> Flow
                            </div>
                            <div class="welcome-text">
                                Selamat Datang Kembali!
                            </div>
                            <div class="tagline">
                                Lanjutkan perjalanan finansial Anda bersama Flow
                            </div>
                            
                            <div class="stats">
                                <div class="stat-item">
                                    <span class="stat-number">1000+</span>
                                    <span class="stat-label">Pengguna Aktif</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">50K+</span>
                                    <span class="stat-label">Transaksi Tercatat</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">95%</span>
                                    <span class="stat-label">Tingkat Kepuasan</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">24/7</span>
                                    <span class="stat-label">Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-section">
                        <h2 class="form-title">Masuk ke Akun</h2>
                        <p class="form-subtitle">Akses dashboard keuangan Anda</p>

                        <!-- PHP Error Message -->
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <!-- PHP Success Message -->
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i>
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('/auth/processLogin') ?>" method="post">
                            <div class="form-group">
                                <label class="form-label">Username atau Email</label>
                                <input type="text" name="username" class="form-control" required placeholder="Masukkan username atau email">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required placeholder="Masukkan password Anda">
                            </div>
                            
                            <button type="submit" class="btn-login">
                                <i class="fas fa-sign-in-alt"></i> Masuk
                            </button>
                        </form>

                        <div class="forgot-password">
                            <a href="#">Lupa password?</a>
                        </div>

                        <div class="register-link">
                            Belum punya akun? <a href="<?= base_url('/auth/register') ?>">Daftar sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>