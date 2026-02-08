<?= $this->extend('admin/layout');;?>

<?= $this->section('admin_content');;?>

<div class="d-flex justify-content-between align-items-center">
<h1>Kategori</h1>
<a href="<?= route_to('admin.kategori_create_view');?>" class="btn btn-primary btn-sm py-2">Tambahkan Kategori</a>
</div>

<?php if(session()->getFlashdata('pesan')): ?>
    <div
        class="alert alert-warning"
        role="alert"
    >
       <?= session()->getFlashdata('pesan');?>
    </div>
    
<?php endif ?>

<div
    class="table-responsive"
>
    <table
        class="table table-striped table-hover border border-secondary"
    >
        <thead>
            <tr>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kategori_list as $kategori): ?>
                <tr>
                    <td><?= $kategori['nama_kategori'];?></td>
                    <td>
                        <form action="<?= route_to('admin.kategori_delete', $kategori['id_kategori']);?>" method="post">
                            <?= csrf_field();?>
                            <button class="btn btn-warning" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection();;?>