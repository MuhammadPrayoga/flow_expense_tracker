<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>
    .chart-header {
        background: linear-gradient(135deg, var(--accent-light), transparent);
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 30px;
        border: 1px solid var(--border);
    }

    .chart-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 8px;
    }

    .chart-subtitle {
        color: var(--text-secondary);
        font-size: 1rem;
        margin-bottom: 0;
    }

    .chart-container {
        background: var(--content-bg);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: 0 4px 6px var(--shadow);
        overflow: hidden;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }

    .chart-container:hover {
        box-shadow: 0 8px 20px var(--shadow-hover);
        transform: translateY(-2px);
    }

    .chart-card-header {
        background: var(--sidebar);
        padding: 20px 30px;
        border-bottom: 1px solid var(--border);
    }

    .chart-card-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chart-body {
        padding: 30px;
        background: var(--content-bg);
    }

    .chart-canvas-container {
        position: relative;
        height: 400px;
        margin-bottom: 20px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: var(--content-bg);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 4px var(--shadow);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px var(--shadow-hover);
    }

    .stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .chart-controls {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
        align-items: center;
    }

    .chart-control-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chart-control-label {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--text);
    }

    .chart-select {
        padding: 8px 12px;
        border: 2px solid var(--border);
        border-radius: 8px;
        background: var(--content-bg);
        color: var(--text);
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .chart-select:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
    }

    .btn-modern {
        padding: 12px 24px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        border: none;
        font-size: 0.9rem;
        cursor: pointer;
    }

    .btn-secondary-modern {
        background: var(--content-bg);
        color: var(--text);
        border: 2px solid var(--border);
    }

    .btn-secondary-modern:hover {
        background: var(--accent-light);
        color: var(--accent);
        border-color: var(--accent);
        transform: translateY(-2px);
        text-decoration: none;
    }

    .btn-primary-modern {
        background: var(--accent);
        color: white;
        box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
    }

    .btn-primary-modern:hover {
        background: var(--accent-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(231, 76, 60, 0.4);
        color: white;
        text-decoration: none;
    }

    .empty-chart {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-secondary);
    }

    .empty-chart-icon {
        font-size: 4rem;
        color: var(--accent);
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-chart-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--text);
    }

    .empty-chart-subtitle {
        font-size: 0.95rem;
        margin-bottom: 30px;
    }

    @media (max-width: 768px) {
        .chart-header {
            padding: 20px;
        }

        .chart-title {
            font-size: 1.5rem;
        }

        .chart-body {
            padding: 20px;
        }

        .chart-canvas-container {
            height: 300px;
        }

        .chart-controls {
            flex-direction: column;
            align-items: stretch;
        }

        .chart-control-group {
            justify-content: space-between;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="chart-header">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
        <div>
            <h1 class="chart-title">
                <i class="fas fa-chart-bar"></i>
                Grafik Pengeluaran
            </h1>
            <p class="chart-subtitle">Visualisasi pengeluaran bulanan tahun <?= date('Y') ?></p>
        </div>
        <div>
            <a href="<?= base_url('/dashboard') ?>" class="btn-modern btn-secondary-modern">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

<?php
// Calculate statistics
$totals = array_fill(1, 12, 0);
$totalYear = 0;
foreach ($grafik as $row) {
    $totals[$row['bulan']] = $row['total'];
    $totalYear += $row['total'];
}

$highestMonth = max($totals);
$lowestMonth = min(array_filter($totals)); // Exclude 0 values
$averageMonth = $totalYear > 0 ? $totalYear / count(array_filter($totals)) : 0;
?>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-value">Rp <?= number_format($totalYear, 0, ',', '.') ?></div>
        <div class="stat-label">Total Tahun Ini</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">Rp <?= number_format($highestMonth, 0, ',', '.') ?></div>
        <div class="stat-label">Pengeluaran Tertinggi</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">Rp <?= number_format($averageMonth, 0, ',', '.') ?></div>
        <div class="stat-label">Rata-rata Bulanan</div>
    </div>
    <div class="stat-card">
        <div class="stat-value"><?= count(array_filter($totals)) ?></div>
        <div class="stat-label">Bulan Aktif</div>
    </div>
</div>

<div class="chart-container">
    <div class="chart-card-header">
        <h3 class="chart-card-title">
            <i class="fas fa-chart-line"></i>
            Pengeluaran Bulanan <?= date('Y') ?>
        </h3>
    </div>
    <div class="chart-body">
        <div class="chart-controls">
            <div class="chart-control-group">
                <label class="chart-control-label">Jenis Grafik:</label>
                <select class="chart-select" id="chartType" onchange="updateChartType()">
                    <option value="bar">Bar Chart</option>
                    <option value="line">Line Chart</option>
                    <option value="area">Area Chart</option>
                </select>
            </div>
            <div class="chart-control-group">
                <button class="btn-modern btn-primary-modern" onclick="downloadChart()">
                    <i class="fas fa-download"></i>
                    Download Chart
                </button>
            </div>
        </div>

        <?php if ($totalYear > 0): ?>
            <div class="chart-canvas-container">
                <canvas id="pengeluaranChart"></canvas>
            </div>
        <?php else: ?>
            <div class="empty-chart">
                <div class="empty-chart-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="empty-chart-title">Belum Ada Data Pengeluaran</div>
                <div class="empty-chart-subtitle">
                    Mulai mencatat pengeluaran untuk melihat grafik yang menarik
                </div>
                <a href="<?= base_url('/expenses/create') ?>" class="btn-modern btn-primary-modern">
                    <i class="fas fa-plus"></i>
                    Tambah Pengeluaran
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    let chart;
    
    // Chart data
    const chartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Total Pengeluaran (Rp)',
            data: [<?= implode(',', $totals) ?>],
            backgroundColor: 'rgba(231, 76, 60, 0.1)',
            borderColor: 'rgba(231, 76, 60, 1)',
            borderWidth: 3,
            fill: false,
            tension: 0.4,
            pointBackgroundColor: 'rgba(231, 76, 60, 1)',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 6,
            pointHoverRadius: 8,
            pointHoverBackgroundColor: 'rgba(231, 76, 60, 1)',
            pointHoverBorderColor: '#fff',
            pointHoverBorderWidth: 3
        }]
    };

    // Chart configuration
    const chartConfig = {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: {
                            size: 14,
                            family: 'Inter'
                        },
                        color: getComputedStyle(document.documentElement).getPropertyValue('--text'),
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgba(231, 76, 60, 1)',
                    borderWidth: 1,
                    cornerRadius: 8,
                    titleFont: {
                        size: 14,
                        family: 'Inter'
                    },
                    bodyFont: {
                        size: 13,
                        family: 'Inter'
                    },
                    callbacks: {
                        label: function(context) {
                            return 'Pengeluaran: Rp ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        color: getComputedStyle(document.documentElement).getPropertyValue('--text-secondary'),
                        font: {
                            size: 12,
                            family: 'Inter'
                        },
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: getComputedStyle(document.documentElement).getPropertyValue('--text-secondary'),
                        font: {
                            size: 12,
                            family: 'Inter'
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            },
            elements: {
                bar: {
                    borderRadius: 8,
                    borderSkipped: false
                }
            }
        }
    };

    // Initialize chart
    <?php if ($totalYear > 0): ?>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('pengeluaranChart').getContext('2d');
        chart = new Chart(ctx, chartConfig);
        
        // Update chart colors based on theme
        updateChartColors();
    });

    // Update chart type
    function updateChartType() {
        const chartType = document.getElementById('chartType').value;
        
        if (chart) {
            chart.destroy();
        }
        
        // Update chart configuration based on type
        if (chartType === 'line') {
            chartConfig.type = 'line';
            chartConfig.data.datasets[0].fill = false;
            chartConfig.data.datasets[0].backgroundColor = 'rgba(231, 76, 60, 0.1)';
        } else if (chartType === 'area') {
            chartConfig.type = 'line';
            chartConfig.data.datasets[0].fill = true;
            chartConfig.data.datasets[0].backgroundColor = 'rgba(231, 76, 60, 0.1)';
        } else {
            chartConfig.type = 'bar';
            chartConfig.data.datasets[0].fill = false;
            chartConfig.data.datasets[0].backgroundColor = 'rgba(231, 76, 60, 0.8)';
        }
        
        const ctx = document.getElementById('pengeluaranChart').getContext('2d');
        chart = new Chart(ctx, chartConfig);
        updateChartColors();
    }

    // Update chart colors based on theme
    function updateChartColors() {
        if (chart) {
            const textColor = getComputedStyle(document.documentElement).getPropertyValue('--text').trim();
            const textSecondaryColor = getComputedStyle(document.documentElement).getPropertyValue('--text-secondary').trim();
            
            chart.options.plugins.legend.labels.color = textColor;
            chart.options.scales.y.ticks.color = textSecondaryColor;
            chart.options.scales.x.ticks.color = textSecondaryColor;
            chart.update();
        }
    }

    // Download chart
    function downloadChart() {
        if (chart) {
            const link = document.createElement('a');
            link.download = 'pengeluaran-chart-<?= date('Y') ?>.png';
            link.href = chart.toBase64Image();
            link.click();
        }
    }

    // Listen for theme changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                updateChartColors();
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['data-theme']
    });
    <?php endif; ?>
</script>

<?= $this->endSection() ?>