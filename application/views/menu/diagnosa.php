<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Diagnosa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Diagnosa</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- data periksa -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title m-auto"> Data Periksa pasien</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-responsive-md" id="table2">
                <thead>
                    <tr>
                        <th>No. Antrian</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>
                        <th>Tensi darah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($periksa as $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><a href="#modal-tambah<?= $data->id_periksa ?>" data-toggle="modal"><?= $data->nama_pasien ?></a> </td>
                            <td><?= $data->keluhan ?></td>
                            <td><?= $data->tensi_darah ?></td>
                            <td><?= $data->status ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Main data -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title m-auto">Data diagnosa pasien</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-responsive-md" id="table1">
                <thead>
                    <tr>
                        <th>Nama pasien</th>
                        <th>Diagnosa</th>
                        <th>Nama dokter</th>
                        <th>Action</th> <!-- action for dev-->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($diagnosa as $data) { ?>
                        <tr>
                            <td><?= $data->nama_pasien ?></td>
                            <td><?= $data->diagnosa ?></td>
                            <td><?= $data->nama_user ?></td>
                            <td>
                                <!-- hapus for dev -->
                                <a href="<?= site_url('diagnosa/hapus/') . $data->id_diagnosa ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                                <a href="<?= site_url('diagnosa/cetak_diagnosa/') . $data->id_diagnosa ?>" target="_blank" class="btn btn-default btn-sm"> <i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- form tambah diagnosa -->
<?php foreach ($periksa as $data) { ?>
    <div class="modal fade" id="modal-tambah<?= $data->id_periksa ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title m-auto">Form tambah diagnosa</h3>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('diagnosa/tambah') ?>" method="POST">
                        <input type="hidden" value="<?= $data->id_periksa ?>" name="idperiksa">
                        <div class="form-group">
                            <label>Nama pasien</label>
                            <input type="hidden" value="<?= $data->id_pasien ?>" name="idp">
                            <input type="text" class="form-control" placeholder="Nama Pasien" value="<?= $data->nama_pasien ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>keluhan</label>
                            <input type="text" class="form-control" placeholder="Keluhan" value="<?= $data->keluhan ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tensi darah</label>
                            <input type="number" class="form-control" placeholder="Tensi darah" value="<?= $data->tensi_darah ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Diagnosa</label>
                            <textarea name="diagnosa" class="form-control" placeholder="Diagnosa"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Obat</label>
                            <select name="obat" class="select2">
                                <option value="">---Pilih--</option>
                                <?php foreach ($obat as $data) { ?>
                                    <option value="<?= $data->id_obat ?>"><?= $data->nama_obat ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Saran</label>
                            <textarea name="saran" class="form-control" placeholder="Saran dokter"></textarea>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php } ?>


<!-- DataTables -->
<script src="<?= base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/template/') ?>plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        $('#table1').DataTable();
        $('#table2').DataTable();
        $('.select2').select2();
    });
</script>