<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root[data-theme="light"] {
            --bg: #f8fafc;
            --text: #1e293b;
            --text-secondary: #64748b;
            --sidebar: #ffffff;
            --content-bg: #ffffff;
            --border: #e2e8f0;
            --accent: #e74c3c;
            --accent-hover: #c0392b;
            --accent-light: rgba(231, 76, 60, 0.1);
            --success: #10b981;
            --warning: #f59e0b;
            --info: #06b6d4;
            --shadow: rgba(0, 0, 0, 0.1);
            --shadow-hover: rgba(0, 0, 0, 0.15);
        }

        :root[data-theme="dark"] {
            --bg: #0f172a;
            --text: #f1f5f9;
            --text-secondary: #94a3b8;
            --sidebar: #1e293b;
            --content-bg: #1e293b;
            --border: #334155;
            --accent: #ef4444;
            --accent-hover: #dc2626;
            --accent-light: rgba(239, 68, 68, 0.1);
            --success: #22c55e;
            --warning: #eab308;
            --info: #0ea5e9;
            --shadow: rgba(0, 0, 0, 0.3);
            --shadow-hover: rgba(0, 0, 0, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            background-color: var(--bg);
            color: var(--text);
            transition: all 0.3s ease;
            font-size: 14px;
            line-height: 1.6;
        }

        .sidebar {
            width: 280px;
            background-color: var(--sidebar);
            color: var(--text);
            padding: 0;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 30px 25px;
            border-bottom: 1px solid var(--border);
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 20px;
        }

        .logo i {
            margin-right: 10px;
            font-size: 1.8rem;
        }

        .user-info {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, var(--accent-light), transparent);
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent-hover));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .user-name {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 5px;
        }

        .user-role {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        .sidebar-nav {
            flex: 1;
            padding: 20px 0;
        }

        .nav-section {
            margin-bottom: 30px;
        }

        .nav-section-title {
            padding: 0 25px 10px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sidebar a {
            color: var(--text);
            text-decoration: none;
            display: flex;
            align-items: center;
            margin: 2px 15px;
            padding: 12px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 500;
        }

        .sidebar a i {
            margin-right: 15px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover {
            background-color: var(--accent-light);
            color: var(--accent);
            transform: translateX(5px);
        }

        .sidebar a.active {
            background-color: var(--accent);
            color: white;
            box-shadow: 0 4px 12px var(--shadow);
        }

        .sidebar a.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: white;
            border-radius: 0 3px 3px 0;
        }

        .sidebar-footer {
            padding: 20px 25px;
            border-top: 1px solid var(--border);
        }

        .theme-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 15px;
            background: var(--accent-light);
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .theme-toggle-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text);
        }

        .toggle-switch {
            position: relative;
            width: 50px;
            height: 26px;
            background: var(--border);
            border-radius: 13px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .toggle-switch::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 4px var(--shadow);
        }

        .toggle-switch.active {
            background: var(--accent);
        }

        .toggle-switch.active::before {
            transform: translateX(24px);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            background: transparent;
            border: 2px solid var(--accent);
            border-radius: 10px;
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: var(--accent);
            color: white;
            transform: translateY(-2px);
        }

        .logout-btn i {
            margin-right: 8px;
        }

        .content {
            flex: 1;
            background-color: var(--content-bg);
            transition: all 0.3s ease;
            overflow-x: hidden;
        }

        .content-header {
            background: var(--sidebar);
            padding: 20px 30px;
            border-bottom: 1px solid var(--border);
            box-shadow: 0 2px 4px var(--shadow);
        }

        .content-body {
            padding: 30px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .card {
            background: var(--content-bg);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 4px 6px var(--shadow);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 20px var(--shadow-hover);
            transform: translateY(-2px);
        }

        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--accent);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px;
            cursor: pointer;
            box-shadow: 0 4px 12px var(--shadow);
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -280px;
                height: 100vh;
                z-index: 1000;
                transition: left 0.3s ease;
            }

            .sidebar.active {
                left: 0;
            }

            .sidebar-overlay.active {
                display: block;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .content {
                padding-left: 0;
            }

            .content-header {
                padding-left: 70px;
            }

            .content-body {
                padding: 20px;
            }
        }

        .nav-badge {
            background: var(--accent);
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: auto;
        }

        .notification-dot {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            border: 2px solid var(--sidebar);
        }
    </style>
</head>

<body>
    <button class="mobile-menu-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-chart-line"></i>
                Flow
            </div>
            <div class="user-info">
                <div class="user-avatar">
                    <?= strtoupper(substr(session()->get('username'), 0, 1)) ?>
                </div>
                <div class="user-name"><?= esc(session()->get('username')) ?></div>
                <div class="user-role">Personal Account</div>
            </div>
        </div>

        <div class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Menu Utama</div>
                <a href="/dashboard" class="<?= current_url() == base_url('/dashboard') ? 'active' : '' ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a href="/expenses" class="<?= current_url() == base_url('/expenses') ? 'active' : '' ?>">
                    <i class="fas fa-wallet"></i>
                    Pengeluaran
                </a>
                <a href="/categories" class="<?= current_url() == base_url('/categories') ? 'active' : '' ?>">
                    <i class="fas fa-tags"></i>
                    Kategori
                </a>
                <a href="/analytics" class="<?= current_url() == base_url('/analytics') ? 'active' : '' ?>">
                    <i class="fas fa-chart-pie"></i>
                    Analisis
                </a>
            </div>
        </div>

        <div class="sidebar-footer">
            <div class="theme-toggle">
                <span class="theme-toggle-label">
                    <i class="fas fa-moon"></i>
                    Dark Mode
                </span>
                <div class="toggle-switch" id="themeToggle" onclick="toggleTheme()"></div>
            </div>
            <a href="/auth/logout" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </div>

    <div class="content">

        <div class="content-body">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const toggle = document.getElementById('themeToggle');
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            document.documentElement.setAttribute('data-theme', newTheme);
            toggle.classList.toggle('active');

            // Save theme preference
            localStorage.setItem('theme', newTheme);
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.sidebar-overlay');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Initialize theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            const toggle = document.getElementById('themeToggle');

            document.documentElement.setAttribute('data-theme', savedTheme);
            if (savedTheme === 'dark') {
                toggle.classList.add('active');
            }
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-menu-toggle');

            if (window.innerWidth <= 768 &&
                !sidebar.contains(e.target) &&
                !toggle.contains(e.target) &&
                sidebar.classList.contains('active')) {
                toggleSidebar();
            }
        });
    </script>
</body>

</html>