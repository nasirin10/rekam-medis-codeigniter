<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cetak diagnosa</title>

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">
</head>

<body>
    <!-- <section class="container"> -->
        <h1 class="text-center"> Laporan diagnosa</h1>
        <p class="text-center"> <?php date_default_timezone_set('Asia/jakarta');
                                echo date('j, F Y') ?></p>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nama Pasien</th>
                    <th>Diagnosa</th>
                    <th>Obat</th>
                    <th>Saran</th>
                    <th>Dokter</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $diagnosa->nama_pasien ?></td>
                    <td><?= $diagnosa->diagnosa ?></td>
                    <td><?= $diagnosa->nama_obat ?></td>
                    <td><?= $diagnosa->saran ?></td>
                    <td><?= $diagnosa->nama_user ?></td>
                </tr>
            </tbody>
        </table>
    <!-- </section> -->


</body>

</html>