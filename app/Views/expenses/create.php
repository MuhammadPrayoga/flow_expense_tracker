<?php $this->extend('layout') ?>

<?php $this->section('content') ?>
<h2 class="mb-4">Tambah Pengeluaran</h2>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="<?= base_url('/expenses/store') ?>" method="post">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Pengeluaran</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select name="kategori_id" id="kategori_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($categories as $cat) : ?>
                <option value="<?= $cat['id'] ?>"><?= esc($cat['nama_kategori']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="nominal" class="form-label">Nominal (Rp)</label>
        <input type="number" class="form-control" id="nominal" name="nominal" required>
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
    </div>
    <div class="mb-3">
        <label for="catatan" class="form-label">Catatan</label>
        <textarea name="catatan" id="catatan" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('/expenses') ?>" class="btn btn-secondary">Batal</a>
</form>
<?php $this->endSection() ?>