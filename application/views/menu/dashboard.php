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
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fab fa-accessible-icon"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pasien</span>
                        <span class="info-box-number">
                            <?= $pasien->num_rows(); ?>
                            <!-- <small>%</small> -->
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-check"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Periksa</span>
                        <span class="info-box-number"><?= $periksa->num_rows();?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">User</span>
                        <span class="info-box-number"><?= $pengguna ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tablets"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Obat</span>
                        <span class="info-box-number">2,000</span>
                    </div>
                </div>
            </div> -->
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="card">
            <div class="card-header">
                <a href="#modal-tambah" data-toggle="modal" class="btn btn-primary">Tambah Periksa</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>NO. Antrian</th>
                            <th>Nama pasien</th>
                            <th>Keluhan</th>
                            <th>Tensi darah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($periksa->result() as $data ) {?>
                            <tr>
                                <td><?= $data->no_antri?></td>
                                <td><?= $data->nama_pasien?></td>
                                <td><?= $data->keluhan?></td>
                                <td><?= $data->tensi_darah?></td>
                                <td><?= $data->status?></td>
                                <td>
                                    <a href="<?= site_url('dashboard/hapus/').$data->id_periksa?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                                    <a href="<?= site_url('dashboard/cetak_noantrian/').$data->id_periksa?>" target="_blank" class="btn btn-default btn-sm"> <i class="fa fa-print"></i></a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Recap</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a href="<?= base_url('assets/template/') ?>#" class="dropdown-item">Action</a>
                                    <a href="<?= base_url('assets/template/') ?>#" class="dropdown-item">Another action</a>
                                    <a href="<?= base_url('assets/template/') ?>#" class="dropdown-item">Something else here</a>
                                    <a class="dropdown-divider"></a>
                                    <a href="<?= base_url('assets/template/') ?>#" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                </p>

                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>

                                <div class="progress-group">
                                    Add Products to Cart
                                    <span class="float-right"><b>160</b>/200</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <div class="progress-group">
                                    Complete Purchase
                                    <span class="float-right"><b>310</b>/400</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Visit Premium Page</span>
                                    <span class="float-right"><b>480</b>/800</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    Send Inquiries
                                    <span class="float-right"><b>250</b>/500</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                    <h5 class="description-header">$35,210.43</h5>
                                    <span class="description-text">TOTAL REVENUE</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                    <h5 class="description-header">$10,390.90</h5>
                                    <span class="description-text">TOTAL COST</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                    <h5 class="description-header">$24,813.53</h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block">
                                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                                    <h5 class="description-header">1200</h5>
                                    <span class="description-text">GOAL COMPLETIONS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>

<!-- modal tambah periksa -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title m-auto">Form tambah periksa</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('dashboard/tambah')?>" method="POST">
                    <div class="form-group">
                        <label>Pasien*</label>
                        <select name="idp" class="form-contol select2">
                            <option value="">--Pilih--</option>
                            <?php foreach ($pasien->result() as $data) { ?>
                                <option value="<?= $data->id_pasien?>"><?= $data->nama_pasien?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keluhan</label>
                        <input type="text" name="keluhan" class="form-control" placeholder="Keluhan pasien">
                    </div>
                    <div class="form-group">
                        <label>Tensi darah*</label>
                        <input type="number" min="0" name="tensi" class="form-control" placeholder="Keluhan pasien">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- PAGE SCRIPTS -->
<script src="<?= base_url('assets/template/') ?>dist/js/pages/dashboard2.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/template/') ?>plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        $('#example1').DataTable();
        $('.select2').select2();
    });
</script>