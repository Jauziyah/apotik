<?= $this->extend('admin/layout');; ?>

<?= $this->section('admin_content');; ?>

<div class="d-flex justify-content-between align-items-center">
    <h1>Tambahkan Kategori</h1>
</div>

<form action="<?= route_to('admin.kategori_create_view'); ?>">
    <div class="card shadow">
        <div class="card-body">
                <?= csrf_field();?>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control <?= $validation->hasError('nama_kategori') ? 'is-invalid' : '';?>" id="floatingKategoriInput" name="nama_kategori" inputmode="nama_kategori" autocomplete="nama_kategori" placeholder="<?= lang('Auth.nama_kategori') ?>" value="<?= old('nama_kategori') ?>">
                    <label for="floatingKategoriInput">Nama Kategori</label>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_kategori'); ?>
                    </div>
                </div>
        </div>
    </div>

    <button class="btn btn-primary my-2" type="submit">Tambahkan Kategori</button>
</form>


<?= $this->endSection();; ?>