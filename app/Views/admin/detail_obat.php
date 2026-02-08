<?= $this->extend('admin/layout'); ?>

<?= $this->section('admin_content'); ?>

<div class="card">
    <img class="card-img-top" src="<?= base_url('uploads/'. $data_obat['obat_image']); ?>" alt="<?= esc($data_obat['nama_obat']); ?>" />
    <div class="card-body">
        <h4 class="card-title"><?= esc($data_obat['nama_obat']); ?></h4>
        <p class="card-text"><strong>Kategori:</strong> <?= esc($data_obat['kategori_name'] ?? 'Tidak ada kategori'); ?></p>
        <p class="card-text"><strong>Stok:</strong> <?= esc($data_obat['stok_obat']); ?></p>
        <p class="card-text"><strong>Harga:</strong> Rp <?= number_format($data_obat['harga_obat'], 0, ',', '.'); ?></p>
        <p class="card-text"><strong>Keterangan:</strong> <?= esc($data_obat['keterangan_obat']); ?></p>
        <p class="card-text"><strong>Expired:</strong> <?= esc($data_obat['exp_obat']); ?></p>
    </div>
</div>

<?= $this->endSection(); ?>