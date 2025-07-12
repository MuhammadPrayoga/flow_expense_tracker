<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>
    .page-header {
        background: linear-gradient(135deg, var(--accent-light), transparent);
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 30px;
        border: 1px solid var(--border);
    }

    .page-title-main {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 8px;
    }

    .page-subtitle-main {
        color: var(--text-secondary);
        font-size: 1rem;
        margin-bottom: 0;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
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
    }

    .categories-card {
        background: var(--content-bg);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: 0 4px 6px var(--shadow);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .categories-card:hover {
        box-shadow: 0 8px 20px var(--shadow-hover);
        transform: translateY(-2px);
    }

    .card-header-modern {
        background: var(--sidebar);
        padding: 20px 30px;
        border-bottom: 1px solid var(--border);
    }

    .card-header-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .table-modern {
        margin: 0;
        background: transparent;
    }

    .table-modern th {
        background: var(--accent-light);
        color: var(--text);
        font-weight: 600;
        padding: 15px 20px;
        border: none;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern td {
        padding: 18px 20px;
        border: none;
        border-bottom: 1px solid var(--border);
        color: var(--text);
        vertical-align: middle;
    }

    .table-modern tbody tr:hover {
        background: var(--accent-light);
    }

    .table-modern tbody tr:last-child td {
        border-bottom: none;
    }

    .category-name {
        font-weight: 500;
        color: var(--text);
        font-size: 0.95rem;
    }

    .category-number {
        font-weight: 600;
        color: var(--accent);
        font-size: 0.9rem;
    }

    .action-buttons-table {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-edit {
        background: var(--warning);
        color: white;
    }

    .btn-edit:hover {
        background: #e67e22;
        transform: translateY(-1px);
        color: white;
    }

    .btn-delete {
        background: var(--accent);
        color: white;
    }

    .btn-delete:hover {
        background: var(--accent-hover);
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
        color: var(--accent);
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-state-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--text);
    }

    .empty-state-subtitle {
        font-size: 0.95rem;
        margin-bottom: 30px;
    }

    .alert-modern {
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border: none;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
    }

    .alert-success-modern {
        background: rgba(34, 197, 94, 0.1);
        color: var(--success);
        border-left: 4px solid var(--success);
    }

    .alert-danger-modern {
        background: rgba(239, 68, 68, 0.1);
        color: var(--accent);
        border-left: 4px solid var(--accent);
    }

    .stats-row {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .stat-card {
        background: var(--content-bg);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 20px;
        flex: 1;
        min-width: 200px;
        box-shadow: 0 2px 4px var(--shadow);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px var(--shadow-hover);
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 20px;
        }

        .page-title-main {
            font-size: 1.5rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-modern {
            justify-content: center;
        }

        .table-modern {
            font-size: 0.85rem;
        }

        .table-modern th,
        .table-modern td {
            padding: 12px 15px;
        }

        .action-buttons-table {
            flex-direction: column;
            gap: 6px;
        }

        .stats-row {
            flex-direction: column;
            gap: 15px;
        }
    }
</style>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
        <div>
            <h1 class="page-title-main">
                <i class="fas fa-tags"></i>
                Daftar Kategori
            </h1>
            <p class="page-subtitle-main">Kelola kategori pengeluaran Anda</p>
        </div>
        <div class="action-buttons">
            <a href="<?= base_url('/dashboard') ?>" class="btn-modern btn-secondary-modern">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>
            <a href="<?= base_url('/categories/create') ?>" class="btn-modern btn-primary-modern">
                <i class="fas fa-plus"></i>
                Tambah Kategori
            </a>
        </div>
    </div>
</div>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert-modern alert-success-modern">
        <i class="fas fa-check-circle"></i>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert-modern alert-danger-modern">
        <i class="fas fa-exclamation-triangle"></i>
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<div class="stats-row">
    <div class="stat-card">
        <div class="stat-value"><?= count($categories) ?></div>
        <div class="stat-label">Total Kategori</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-label">Kelola dengan Mudah</div>
    </div>
</div>

<div class="categories-card">
    <div class="card-header-modern">
        <h3 class="card-header-title">
            <i class="fas fa-list"></i>
            Daftar Kategori
        </h3>
    </div>
    <div class="card-body p-0">
        <?php if (empty($categories)) : ?>
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="empty-state-title">Belum Ada Kategori</div>
                <div class="empty-state-subtitle">
                    Mulai dengan menambahkan kategori pertama untuk mengorganisir pengeluaran Anda
                </div>
                <a href="<?= base_url('/categories/create') ?>" class="btn-modern btn-primary-modern">
                    <i class="fas fa-plus"></i>
                    Tambah Kategori Pertama
                </a>
            </div>
        <?php else : ?>
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th style="width: 80px;">
                            <i class="fas fa-hashtag"></i>
                            No
                        </th>
                        <th>
                            <i class="fas fa-tag"></i>
                            Nama Kategori
                        </th>
                        <th style="width: 200px;">
                            <i class="fas fa-cog"></i>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($categories as $cat) : ?>
                        <tr>
                            <td>
                                <span class="category-number"><?= $no++ ?></span>
                            </td>
                            <td>
                                <div class="category-name text-black"><?= esc($cat['nama_kategori']) ?></div>
                            </td>
                            <td>
                                <div class="action-buttons-table">
                                    <a href="<?= base_url('/categories/edit/' . $cat['id']) ?>" class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <a href="<?= base_url('/categories/delete/' . $cat['id']) ?>" 
                                       class="btn-action btn-delete" 
                                       onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>