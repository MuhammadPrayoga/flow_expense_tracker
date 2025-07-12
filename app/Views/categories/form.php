<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<h2 class="mb-4"><?= $title ?></h2>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="<?= $action ?>" method="post">
    <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
            value="<?= isset($kategori) ? esc($kategori['nama_kategori']) : old('nama_kategori') ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('/categories') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>