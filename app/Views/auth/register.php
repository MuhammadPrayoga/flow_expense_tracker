<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Flow</title>
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

        .register-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .register-card {
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
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
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

        .tagline {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.9;
            font-weight: 300;
        }

        .features {
            list-style: none;
            padding: 0;
        }

        .features li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .features li i {
            margin-right: 15px;
            font-size: 1.2rem;
            width: 20px;
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

        .btn-register {
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

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: var(--gray-600);
            font-size: 0.95rem;
        }

        .login-link a {
            color: var(--primary-red);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
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

        @media (max-width: 768px) {
            .register-card {
                margin: 10px;
            }
            
            .brand-section,
            .form-section {
                padding: 40px 30px;
            }
            
            .logo {
                font-size: 2.5rem;
            }
            
            .tagline {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="row g-0 h-100">
                <div class="col-lg-6">
                    <div class="brand-section h-100">
                        <div class="brand-content">
                            <div class="logo">
                                <i class="fas fa-chart-line"></i> Flow
                            </div>
                            <div class="tagline">
                                Kelola Keuangan Anda dengan Mudah
                            </div>
                            <ul class="features">
                                <li>
                                    <i class="fas fa-wallet"></i>
                                    Lacak pengeluaran harian
                                </li>
                                <li>
                                    <i class="fas fa-chart-pie"></i>
                                    Analisis keuangan mendalam
                                </li>
                                <li>
                                    <i class="fas fa-target"></i>
                                    Capai target keuangan Anda
                                </li>
                                <li>
                                    <i class="fas fa-shield-alt"></i>
                                    Data aman dan terlindungi
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-section">
                        <h2 class="form-title">Daftar Akun</h2>
                        <p class="form-subtitle">Mulai perjalanan financial Anda bersama Flow</p>

                        <!-- PHP Error Message -->
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('/auth/processRegister') ?>" method="post">
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required placeholder="Masukkan username Anda">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="nama@email.com">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required placeholder="Minimal 8 karakter">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password2" class="form-control" required placeholder="Ulangi password Anda">
                            </div>
                            
                            <button type="submit" class="btn-register">
                                <i class="fas fa-user-plus"></i> Daftar Sekarang
                            </button>
                        </form>

                        <div class="login-link">
                            Sudah punya akun? <a href="<?= base_url('/auth/login') ?>">Masuk di sini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>