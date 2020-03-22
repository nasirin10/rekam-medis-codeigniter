<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cetak antrian</title>

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">
</head>

<body>
    <section class="container">
        <div class="row">
            <img src="<?= base_url('assets/img/logo.jpg') ?>" class="brand-link m-auto" width="200" height="200">
        </div>
        <div class="row my-3">
            <h3 class="m-auto">Rekam Medis keluarga sejahtera</h3>
        </div>
        <div class="row">
            <h4 class="m-auto"> <?= $periksa->nama_pasien ?></h4>
        </div>
        <div class="row">
            <h1 class="m-auto"><?= $periksa->no_antri?></h1>
        </div>
        <div class="row my-3">
            <h3 class="m-auto"><?= $periksa->created ?></h3>
        </div>
    </section>
</body>

</html>