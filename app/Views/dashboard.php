<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>
    .stats-card {
        background: var(--content-bg);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 25px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--accent), var(--accent-hover));
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px var(--shadow-hover);
    }

    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 20px;
    }

    .stats-icon.expense {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .stats-icon.transaction {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    .stats-icon.category {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .stats-icon.budget {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .stats-value {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 5px;
        line-height: 1.2;
    }

    .stats-label {
        color: var(--text-secondary);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .stats-trend {
        display: flex;
        align-items: center;
        margin-top: 10px;
        font-size: 0.85rem;
    }

    .trend-up {
        color: var(--success);
    }

    .trend-down {
        color: var(--accent);
    }

    .trend-icon {
        margin-right: 5px;
    }

    .chart-container {
        background: var(--content-bg);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 30px;
    }

    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .chart-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text);
    }

    .chart-subtitle {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-top: 5px;
    }

    .chart-filters {
        display: flex;
        gap: 10px;
    }

    .filter-btn {
        padding: 8px 16px;
        border: 1px solid var(--border);
        border-radius: 8px;
        background: transparent;
        color: var(--text-secondary);
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: var(--accent);
        color: white;
        border-color: var(--accent);
    }

    .welcome-section {
        background: linear-gradient(135deg, var(--accent-light), transparent);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        border: 1px solid var(--border);
    }

    .welcome-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 8px;
    }

    .welcome-subtitle {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin-bottom: 20px;
    }

    .quick-actions {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .quick-action-btn {
        display: flex;
        align-items: center;
        padding: 12px 18px;
        background: var(--accent);
        color: white;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .quick-action-btn:hover {
        background: var(--accent-hover);
        transform: translateY(-2px);
        color: white;
    }

    .quick-action-btn i {
        margin-right: 8px;
    }

    .recent-transactions {
        background: var(--content-bg);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 25px;
    }

    .transaction-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid var(--border);
    }

    .transaction-item:last-child {
        border-bottom: none;
    }

    .transaction-info {
        display: flex;
        align-items: center;
    }

    .transaction-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--accent-light);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: var(--accent);
    }

    .transaction-details h6 {
        margin: 0;
        font-size: 0.95rem;
        font-weight: 500;
        color: var(--text);
    }

    .transaction-details p {
        margin: 0;
        font-size: 0.8rem;
        color: var(--text-secondary);
    }

    .transaction-amount {
        font-size: 1rem;
        font-weight: 600;
        color: var(--accent);
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .brand-text {
        font-family: 'Inter', sans-serif;
        font-weight: 700;
        background: linear-gradient(135deg, var(--accent), var(--accent-hover));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    @media (max-width: 768px) {
        .chart-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .chart-filters {
            width: 100%;
            justify-content: center;
        }

        .quick-actions {
            justify-content: center;
        }

        .stats-value {
            font-size: 1.8rem;
        }
    }
</style>

<div class="welcome-section">
    <h1 class="welcome-title">
        Selamat Datang di <span class="brand-text">Flow</span>
    </h1>
    <p class="welcome-subtitle">
        Pantau keuangan Anda dengan mudah dan dapatkan insight yang berharga
    </p>
    <div class="quick-actions">
        <a href="/expenses/create" class="quick-action-btn">
            <i class="fas fa-plus"></i>
            Tambah Pengeluaran
        </a>
        <a href="/expenses" class="quick-action-btn">
            <i class="fas fa-list"></i>
            Lihat Semua Transaksi
        </a>
        <a href="/reports" class="quick-action-btn">
            <i class="fas fa-chart-bar"></i>
            Laporan Lengkap
        </a>
    </div>
</div>

<div class="summary-grid">
    <div class="stats-card">
        <div class="stats-icon expense">
            <i class="fas fa-wallet"></i>
        </div>
        <div class="stats-value">Rp <?= number_format($totalBulanIni, 0, ',', '.') ?></div>
        <div class="stats-label">Total Pengeluaran Bulan Ini</div>
    </div>

    <div class="stats-card">
        <div class="stats-icon transaction">
            <i class="fas fa-exchange-alt"></i>
        </div>
        <div class="stats-value"><?= $totalTransaksi ?></div>
        <div class="stats-label">Total Transaksi</div>
    </div>

    <div class="stats-card">
        <div class="stats-icon category">
            <i class="fas fa-tags"></i>
        </div>
        <div class="stats-value"><?= $totalKategori ?></div>
        <div class="stats-label">Kategori Tersedia</div>
        <div class="stats-trend">
            <i class="fas fa-info-circle trend-icon"></i>
            <span>Kategori aktif</span>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="chart-container">
            <div class="chart-header">
                <div>
                    <h3 class="chart-title">Tren Pengeluaran</h3>
                    <p class="chart-subtitle">Analisis pengeluaran bulanan Anda</p>
                </div>
                <div class="chart-filters">
                    <button class="filter-btn active" onclick="updateChart('month')">Bulanan</button>
                    <button class="filter-btn" onclick="updateChart('week')">Mingguan</button>
                    <button class="filter-btn" onclick="updateChart('year')">Tahunan</button>
                </div>
            </div>
            <canvas id="pengeluaranChart" style="max-height: 400px;"></canvas>
        </div>
    </div>


</div>

<script>
    // Chart Configuration
    const ctx = document.getElementById('pengeluaranChart').getContext('2d');

    const chartData = {
        labels: <?= json_encode($bulan) ?>,
        datasets: [{
            label: 'Total Pengeluaran',
            data: <?= json_encode($totalPerBulan) ?>,
            backgroundColor: function(context) {
                const chart = context.chart;
                const {
                    ctx,
                    chartArea
                } = chart;
                if (!chartArea) return null;

                const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
                gradient.addColorStop(0, 'rgba(231, 76, 60, 0.1)');
                gradient.addColorStop(1, 'rgba(231, 76, 60, 0.8)');
                return gradient;
            },
            borderColor: '#e74c3c',
            borderWidth: 2,
            borderRadius: 8,
            borderSkipped: false,
        }]
    };

    const chartConfig = {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: 'white',
                    bodyColor: 'white',
                    borderColor: '#e74c3c',
                    borderWidth: 1,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false,
                    },
                    ticks: {
                        color: '#64748b',
                        font: {
                            size: 12
                        },
                        callback: function(value) {
                            return 'Rp ' + (value / 1000000).toFixed(1) + 'M';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        color: '#64748b',
                        font: {
                            size: 12
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            animation: {
                duration: 1000,
                easing: 'easeInOutQuart'
            }
        }
    };

    const expenseChart = new Chart(ctx, chartConfig);

    // Update chart function
    function updateChart(period) {
        // Remove active class from all buttons
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        // Add active class to clicked button
        event.target.classList.add('active');

        // Here you would typically fetch new data based on the period
        // For now, we'll just update the chart with the same data
        expenseChart.update();
    }

    // Theme handling
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
    });
</script>

<?= $this->endSection() ?>