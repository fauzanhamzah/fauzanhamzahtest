<?= $this->extend('layouts/master'); ?>

<?= $this->section('content'); ?>
<!-- <div class="container-fluid">
    <h1 class="mt-4 mb-3"><?= $header; ?></h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> <?= session()->getFlashdata('pesan'); ?>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="card mb-4">
        <div class="card-header">
            <a href="/barang/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus mr-1"></i> Tambah Barang</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Foto Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barangs as $barang) : ?>
                            <tr>
                                <td><img class="foto_barang" src="/img/<?= $barang['foto_barang']; ?>"></td>
                                <td><?= $barang['nama_barang']; ?></td>
                                <td><?= $barang['harga_barang']; ?></td>
                                <td><?= $barang['harga_jual']; ?></td>
                                <td><?= $barang['stok']; ?></td>
                                <td>
                                    <a href="/barang/<?= $barang['alias_barang']; ?>" class="btn btn-info btn-sm">Detail</a>
                                    <a href="/barang/edit/<?= $barang['alias_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/barang/<?= $barang['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <Button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Menghapus Data Barang ???');">Delete</Button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->

<div class="card">
    <div class="card-header">
        <a href="/barang/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus mr-1"></i> Tambah Barang</a>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> <?= session()->getFlashdata('pesan'); ?>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Foto Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barangs as $barang) : ?>
                    <tr>
                        <td><img class="foto_barang" src="/img/<?= $barang['foto_barang']; ?>"></td>
                        <td><?= $barang['nama_barang']; ?></td>
                        <td><?= $barang['harga_barang']; ?></td>
                        <td><?= $barang['harga_jual']; ?></td>
                        <td><?= $barang['stok']; ?></td>
                        <td>
                            <a href="/barang/<?= $barang['alias_barang']; ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="/barang/edit/<?= $barang['alias_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/barang/<?= $barang['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <Button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Menghapus Data Barang ???');">Delete</Button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<?= $this->endSection(); ?>