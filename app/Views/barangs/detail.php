<?= $this->extend('templeates/master'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="mt-4 mb-3"><?= $header; ?></h1>
    <div class="card mb-3">
        <img src="/img/<?= $barang['foto_barang']; ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?= $barang['nama_barang']; ?></h5>
            <p class="card-text">Harga : <?= $barang['harga_barang']; ?></p>
            <p class="card-text"><small class="text-muted">Stok : <?= $barang['stok']; ?></small></p>
            <a href="/barang" class="btn btn-primary btn-sm">Kembali</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>