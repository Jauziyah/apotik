<?= $this->extend('admin/layout');;?>

<?= $this->section('admin_content');;?>


<?php if(session()->getFlashdata('pesan')): ?>
    <div
        class="alert alert-warning"
        role="alert"
    >
       <?= session()->getFlashdata('pesan');?>
    </div>
    
<?php endif ?>


<div class="d-flex justify-content-between align-items-center">
<h1>list Obat</h1>
<a href="<?= route_to('admin.obat_create_view');?>" class="btn btn-primary btn-sm py-2">Tambahkan Obat</a>
</div>

<div class="card shadow">
    <div class="card-body">
        <div
            class="table-responsive"
        >
            <table
                class="table table-striped table-hover border boder-secondary"
            >
                <thead>
                    <tr>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($obat_list as $obat): ?>
                        <td><?= $obat['nama_obat'];?></td>
                        <td><?= $obat['stok_obat'];?></td>
                        <td>
                            <a href="<?= route_to('admin.obat_update_view', $obat['id_obat']);?>" class="btn btn-warning">Update</a>
                            <a href="<?= route_to('admin.obat_detail_view', $obat['id_obat']);?>" class="btn btn-warning">detail</a>
                        </td>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<?= $this->endSection();;?>