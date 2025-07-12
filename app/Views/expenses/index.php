<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>
    .page-header {
        background: var(--content-bg);
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 30px;
        border: 1px solid var(--border);
        box-shadow: 0 4px 6px var(--shadow);
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 8px;
    }

    .page-subtitle {
        color: var(--text-secondary);
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .actions-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 30px;
    }

    .btn-group-custom {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-custom {
        padding: 12px 20px;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary-custom {
        background: var(--accent);
        color: white;
    }

    .btn-primary-custom:hover {
        background: var(--accent-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px var(--shadow-hover);
        color: white;
    }

    .btn-secondary-custom {
        background: var(--border);
        color: var(--text);
    }

    .btn-secondary-custom:hover {
        background: var(--text-secondary);
        color: white;
        transform: translateY(-2px);
    }

    .btn-success-custom {
        background: var(--success);
        color: white;
    }

    .btn-success-custom:hover {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(16, 185, 129, 0.3);
        color: white;
    }

    .btn-danger-custom {
        background: #dc3545;
        color: white;
    }

    .btn-danger-custom:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(220, 53, 69, 0.3);
        color: white;
    }

    .expenses-card {
        background: var(--content-bg);
        border: 1px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 6px var(--shadow);
    }

    .expenses-card-header {
        padding: 25px 30px;
        background: linear-gradient(135deg, var(--accent-light), transparent);
        border-bottom: 1px solid var(--border);
    }

    .expenses-card-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .expenses-table {
        width: 100%;
        border-collapse: collapse;
        background: var(--content-bg);
    }

    .expenses-table th {
        background: var(--sidebar);
        color: var(--text);
        font-weight: 600;
        padding: 18px 20px;
        text-align: left;
        border-bottom: 2px solid var(--border);
        font-size: 0.9rem;
    }

    .expenses-table td {
        padding: 20px;
        border-bottom: 1px solid var(--border);
        color: var(--text);
    }

    .expenses-table tbody tr {
        transition: all 0.3s ease;
    }

    .expenses-table tbody tr:hover {
        background: var(--accent-light);
        transform: scale(1.01);
    }

    .expense-amount {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--accent);
    }

    .expense-category {
        display: inline-block;
        background: var(--accent-light);
        color: var(--accent);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .expense-date {
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    .expense-name {
        font-weight: 500;
        color: var(--text);
        margin-bottom: 4px;
    }

    .expense-note {
        color: var(--text-secondary);
        font-size: 0.85rem;
        font-style: italic;
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-sm-custom {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
        border: none;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-warning-custom {
        background: var(--warning);
        color: white;
    }

    .btn-warning-custom:hover {
        background: #d97706;
        transform: translateY(-1px);
        color: white;
    }

    .btn-danger-sm-custom {
        background: #dc3545;
        color: white;
    }

    .btn-danger-sm-custom:hover {
        background: #c82333;
        transform: translateY(-1px);
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-secondary);
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 20px;
        color: var(--accent-light);
    }

    .empty-state-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--text);
    }

    .empty-state-text {
        font-size: 1rem;
        margin-bottom: 25px;
    }

    .alert-custom {
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        border: none;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-success-custom {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success);
        border-left: 4px solid var(--success);
    }

    .alert-danger-custom {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border-left: 4px solid #dc3545;
    }

    .stats-mini {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .stat-mini {
        flex: 1;
        text-align: center;
        padding: 15px;
        background: var(--accent-light);
        border-radius: 10px;
    }

    .stat-mini-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--accent);
    }

    .stat-mini-label {
        font-size: 0.8rem;
        color: var(--text-secondary);
        margin-top: 4px;
    }

    @media (max-width: 768px) {
        .actions-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-group-custom {
            justify-content: center;
        }

        .expenses-table {
            font-size: 0.85rem;
        }

        .expenses-table th,
        .expenses-table td {
            padding: 12px 10px;
        }

        .expense-note {
            max-width: 120px;
        }

        .action-buttons {
            flex-direction: column;
            gap: 4px;
        }
    }
</style>

<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-wallet"></i>
        Daftar Pengeluaran
    </h1>
    <p class="page-subtitle">Kelola dan pantau semua pengeluaran Anda dengan mudah</p>
    
    <div class="stats-mini">
        <div class="stat-mini">
            <div class="stat-mini-value"><?= count($expenses) ?></div>
            <div class="stat-mini-label">Total Transaksi</div>
        </div>
        <div class="stat-mini">
            <div class="stat-mini-value">
                Rp <?= number_format(array_sum(array_column($expenses, 'nominal')), 0, ',', '.') ?>
            </div>
            <div class="stat-mini-label">Total Pengeluaran</div>
        </div>
    </div>
</div>

<!-- Alert Messages -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert-custom alert-success-custom">
        <i class="fas fa-check-circle"></i>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert-custom alert-danger-custom">
        <i class="fas fa-exclamation-triangle"></i>
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Action Bar -->
<div class="actions-bar">
    <div class="btn-group-custom">
        <a href="/dashboard" class="btn-custom btn-secondary-custom">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Dashboard
        </a>
        <a href="<?= base_url('/expenses/create') ?>" class="btn-custom btn-success-custom">
            <i class="fas fa-plus"></i>
            Tambah Pengeluaran
        </a>
    </div>
    <div class="btn-group-custom">
        <a href="<?= base_url('/expenses/export-pdf') ?>" class="btn-custom btn-danger-custom">
            <i class="fas fa-file-pdf"></i>
            Export PDF
        </a>
    </div>
</div>

<!-- Expenses Table -->
<div class="expenses-card">
    <div class="expenses-card-header">
        <h3 class="expenses-card-title">
            <i class="fas fa-list"></i>
            Daftar Transaksi
        </h3>
    </div>
    
    <div class="table-responsive">
        <table class="expenses-table">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Transaksi</th>
                    <th>Kategori</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                    <th>Catatan</th>
                    <th style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($expenses)) : ?>
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="fas fa-wallet"></i>
                                </div>
                                <div class="empty-state-title">Belum Ada Pengeluaran</div>
                                <div class="empty-state-text">
                                    Mulai catat pengeluaran pertama Anda untuk melacak keuangan dengan lebih baik
                                </div>
                                <a href="<?= base_url('/expenses/create') ?>" class="btn-custom btn-success-custom">
                                    <i class="fas fa-plus"></i>
                                    Tambah Pengeluaran Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php else : ?>
                    <?php $no = 1;
                    foreach ($expenses as $exp) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <div class="expense-name"><?= esc($exp['nama_pengeluaran']) ?></div>
                            </td>
                            <td>
                                <span class="expense-category"><?= esc($exp['nama_kategori']) ?></span>
                            </td>
                            <td>
                                <span class="expense-amount">Rp <?= number_format($exp['nominal'], 0, ',', '.') ?></span>
                            </td>
                            <td>
                                <span class="expense-date"><?= date('d M Y', strtotime($exp['tanggal'])) ?></span>
                            </td>
                            <td>
                                <div class="expense-note" title="<?= esc($exp['catatan']) ?>">
                                    <?= esc($exp['catatan']) ?: '-' ?>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?= base_url('/expenses/edit/' . $exp['id']) ?>" 
                                       class="btn-sm-custom btn-warning-custom" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('/expenses/delete/' . $exp['id']) ?>" 
                                       class="btn-sm-custom btn-danger-sm-custom" 
                                       title="Hapus"
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus pengeluaran ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Add some interactivity
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effect to table rows
        const rows = document.querySelectorAll('.expenses-table tbody tr');
        rows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = 'var(--accent-light)';
            });
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });

        // Auto-hide alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert-custom');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }, 5000);
        });
    });
</script>

<?= $this->endSection() ?>