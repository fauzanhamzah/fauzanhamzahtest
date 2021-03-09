<?= $this->extend('templeates/master'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-4 mb-3"><?= $header; ?></h1>
            <form action="<?= route_to('simpan_barang') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" id="nama_barang" name="nama_barang" value="<?= old('nama_barang'); ?>">
                        <div id="nama_barangfeedback" class="invalid-feedback">
                            <?= $validation->getError('nama_barang'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_barang" class="col-sm-3 col-form-label">Harga Barang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('harga_barang')) ? 'is-invalid' : ''; ?>" id="harga_barang" name="harga_barang" value="<?= old('harga_barang'); ?>">
                        <div id="harga_barangfeedback" class="invalid-feedback">
                            <?= $validation->getError('harga_barang'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_jual" class="col-sm-3 col-form-label">Harga Jual</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('harga_jual')) ? 'is-invalid' : ''; ?>" id="harga_jual" name="harga_jual" value="<?= old('harga_jual'); ?>">
                        <div id="harga_jualfeedback" class="invalid-feedback">
                            <?= $validation->getError('harga_jual'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" value="<?= old('stok'); ?>">
                        <div id="stokfeedback" class="invalid-feedback">
                            <?= $validation->getError('stok'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto_barang" class="col-sm-3 col-form-label">Foto Barang</label>
                    <div class="col-sm-2">
                        <img src="/img/default_image.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto_barang')) ? 'is-invalid' : ''; ?>" id="foto_barang" name="foto_barang" onchange="previewImg()">
                            <div id="foto_barangfeedback" class="invalid-feedback">
                                <?= $validation->getError('foto_barang'); ?>
                            </div>
                            <label class="custom-file-label" for="foto_barang">Pilih Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <a href="/barang" class="btn btn-warning btn-sm">Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm">Tambah barang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>