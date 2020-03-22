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
                <h1 class="m-0 text-dark">Obat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Obat</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- data info box -->
<section class="content">
    <div class="row">
        <div class="col-12 col-sm-4 com-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"> <i class="fa fa-tablets"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> Stok In bulan ini</span>
                    <span class="info-box-number"><?= $stokin->num_rows()?></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 com-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"> <i class="fa fa-tablets"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> Total obat</span>
                    <span class="info-box-number"><?= $obat->num_rows()?></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 com-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"> <i class="fa fa-tablets"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> Penjualan obat bulan ini</span>
                    <span class="info-box-number">3</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- stokin obat -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data StokIn obat</h3><br>
            <a href="#modal-stokin" class="btn btn-info" data-toggle="modal">StokIn</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="stok-in">
                <thead>
                    <tr>
                        <th>Nama obat</th>
                        <th>Jumlah masuk</th>
                        <th>Supplier</th>
                        <th>Harga supplier</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stokin->result() as $data) { ?>
                        <tr>
                            <td><?= $data->nama_obat ?></td>
                            <td><?= $data->quantity_stokin ?></td>
                            <td><?= $data->supplier_stokin ?></td>
                            <td><?= $data->harga_supplier_stokin ?></td>
                            <td>
                                <form action="<?= site_url('obat/hapus/') . $data->id_stokin ?>" method="post">
                                    <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- data obat -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Data Obat</h3> <br>
            <a href="#modal-tambah" data-toggle="modal" class="btn btn-primary">Tambah Obat</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>Nama obat</th>
                        <th>Jumlah</th>
                        <th>Supplier</th>
                        <th>Harga supplier</th>
                        <th>Harga jual</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($obat->result() as $data) { ?>
                        <tr>
                            <td><?= $data->nama_obat ?></td>
                            <td><?= $data->quantity ?></td>
                            <td><?= $data->supplier ?></td>
                            <td><?= $data->harga_supplier ?></td>
                            <td><?= $data->harga_jual ?></td>
                            <td>
                                <form action="<?= site_url('obat/hapus/') . $data->id_obat ?>" method="POST">
                                    <button type="submit" name="hobat" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                    <a href="#modal-ubah<?= $data->id_obat ?>" data-toggle="modal" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i></a>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<!-- modal tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title m-auto"> Form tambah obat</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('obat/tambah') ?>" method="POST">
                    <div class="form-group">
                        <label>Nama obat</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama obat">
                    </div>
                    <div class="form-group">
                        <label> Jumlah</label>
                        <input type="number" min="0" class="form-control" name="qty" placeholder="Jumlah obat perpcs">
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" class="form-control" name="supplier" placeholder="Nama supplier">
                    </div>
                    <div class="form-group">
                        <label>Harga Supplier</label>
                        <input type="number" min="0" name="hsupplier" class="form-control" placeholder="Harga dari supplier">
                    </div>
                    <div class="form-group">
                        <label>Harga jual</label>
                        <input type="number" min="0" name="hjual" class="form-control" placeholder="Harga jual">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="tobat">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal ubah -->
<?php foreach ($obat->result() as $data) { ?>
    <div class="modal fade" id="modal-ubah<?= $data->id_obat ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title m-auto"> Form tambah obat</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('obat/ubah/') . $data->id_obat ?>" method="POST">
                        <input type="hidden" value="<?= $data->id_obat ?>" name="id">
                        <div class="form-group">
                            <label>Nama obat</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama obat" value="<?= $data->nama_obat ?>">
                        </div>
                        <div class="form-group">
                            <label> Jumlah</label>
                            <input type="number" min="0" class="form-control" name="qty" placeholder="Jumlah obat perpcs" value="<?= $data->quantity ?>">
                        </div>
                        <div class="form-group">
                            <label>Supplier</label>
                            <input type="text" class="form-control" name="supplier" placeholder="Nama supplier" value="<?= $data->supplier ?>">
                        </div>
                        <div class="form-group">
                            <label>Harga Supplier</label>
                            <input type="number" min="0" name="hsupplier" class="form-control" placeholder="Harga dari supplier" value="<?= $data->harga_supplier ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Harga jual</label>
                            <input type="number" min="0" name="hjual" class="form-control" placeholder="Harga jual" value="<?= $data->harga_jual ?>">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-warning" name="oubah">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- modal tambah stokin -->
<div class="modal fade" id="modal-stokin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title m-auto"> Form StokIn</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('obat/tambah') ?>" method="POST">
                    <div class="form-group">
                        <label>Nama obat</label>
                        <select name="idobat" class="select2">
                            <option value="">--Pilih--</option>
                            <?php foreach ($obat->result() as $data) { ?>
                                <option value="<?= $data->id_obat ?>"><?= $data->nama_obat ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Jumlah</label>
                        <input type="number" min="0" name="qty" class="form-control" placeholder="Jumlah obat perpcs">
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" class="form-control" name="supplier" placeholder="Nama supplier">
                    </div>
                    <div class="form-group">
                        <label>Harga Supplier</label>
                        <input type="number" min="0" name="hsupplier" class="form-control" placeholder="Harga dari supplier">
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

<!-- DataTables -->
<script src="<?= base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/template/') ?>plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        $('#example1').DataTable();
        $('#stok-in').DataTable();
        $('.select2').select2();
    });
</script>