<?= $this->extend('admin/layout');; ?>

<?= $this->section('admin_content');; ?>

<div class="d-flex justify-content-between align-items-center">
    <h1>Create Obat</h1>
</div>

<form action="<?= route_to('admin.obat_create');?>" method="post" enctype="multipart/form-data">
    <?= csrf_field();?>
    <div class="card shadow">
        <div class="card-body">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingObatNamaInput" name="nama_obat" inputmode="nama_obat" autocomplete="nama_obat" placeholder="<?= lang('Auth.nama_obat') ?>" value="<?= old('nama_obat') ?>">
                <label for="floatingObatNamaInput">Nama Obat</label>
            </div>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingObatKeteranganInput" name="keterangan_obat" inputmode="keterangan_obat" autocomplete="keterangan_obat" placeholder="<?= lang('Auth.keterangan_obat') ?>" value="<?= old('keterangan_obat') ?>">
                <label for="floatingObatKeteranganInput">Keterangan Obat</label>
            </div>
            
            <div class="form-floating mb-2">
                <div class="mb-3">
                    <label for="exp_obat" class="form-label">Tanggal Kadaluarsa</label>
                    <input
                        type="date"
                        class="form-control"
                        name="exp_obat"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Stok Obat</label>
                <input
                    type="number"
                    class="form-control"
                    name="stok_obat"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                    onblur="if(this.value < 1) this.value = 1"
                />
            </div>
            

            <div class="mb-3">
                <label for="harga_obat" class="form-label">Harga Obat</label>
                <input
                    type="number"
                    class="form-control"
                    name="harga_obat"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                    onblur="if(this.value < 1) this.value = 500"
                />
            </div>

            <div class="mb-3">
                <div class="form-check">
                <?php foreach($kategori_list as $kategori):?>
                    <input 
                    class="form-check-input" 
                    type="checkbox"
                    name="kategori_obat[]" 
                    value="<?= $kategori['id_kategori'];?>" id="" />
                    <label class="form-check-label" for=""><?= $kategori['nama_kategori'];?></label>
                </div>
                <?php endforeach ?>
            </div>

            <div class="mb-3">
                <label for="obat_image" class="form-label">Pilih Obat Image</label>
                <input
                    type="file"
                    class="form-control"
                    name="obat_image"
                    id=""
                    placeholder=""
                    aria-describedby="fileHelpId"
                />
               
            </div>
            

        </div>
    </div>
    <button class="btn btn-primary my-2" type="submit">Tambahkan</button>
</form>
<?= $this->endSection();; ?>