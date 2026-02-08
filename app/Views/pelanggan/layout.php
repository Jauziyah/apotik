<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('bootstrap/bootstrap-icons.css');?>">

</head>
<body>
    <nav class="nav justify-content-start align-items-center py-2 px-3 bg-secondary">
        <h4><a href="" class="nav-link text-white">Beranda</a></h4>
    </nav>
    
    <div class="container-fluid">
        <?= $this->renderSection('pelanggan_content');;?>
    </div>
</body>
</html>