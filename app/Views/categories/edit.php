<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Edit Kategori</h2>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="<?= base_url('/categories/update/' . $category['id']) ?>" method="post">
    <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?= esc($category['nama_kategori']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('/categories') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>