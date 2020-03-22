<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Kasir</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">kasir</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="#modal-tambah" data-toggle="modal" class="btn btn-primary"> Tambah kasir</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama admin</th>
                        <th>Jenis kelamin</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kasir as $data) { ?>
                        <tr>
                            <td><?= $data->NIP ?></td>
                            <td><?= ucwords($data->nama_user) ?></td>
                            <td><?= $data->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' ?></td>
                            <td><?= $data->notelp ?></td>
                            <td><?= $data->alamat ?></td>
                            <td>
                                <form action="<?= site_url('pengguna/hapus/') . $data->id_user ?>" method="POST">
                                    <button type="submit" class="btn btn-danger btn-sm" name="hkasir"> <i class="fa fa-trash"></i></button>
                                    <a href="#modal-ubah<?= $data->id_user ?>" data-toggle="modal" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i></a>
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
                <h4 class="modal-title m-auto">Form tambah kasir</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('pengguna/tambah') ?>" method="POST">
                    <div class="form-group">
                        <label>Nama kasir*</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Kasir" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin*</label>
                        <select name="jk" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon*</label>
                        <input type="number" min="0" class="form-control" name="notelp" placeholder="Nomor telepon kasir" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat*</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="tkasir">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal ubah -->
<?php foreach ($kasir as $data) { ?>
    <div class="modal fade" id="modal-ubah<?= $data->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title m-auto"> Form ubah kasir</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('pengguna/ubah/') . $data->id_user ?>" method="post">
                        <input type="hidden" name="id" value="<?= $data->id_user ?>">

                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" placeholder="Nama Kasir" value="<?= $data->NIP?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama kasir*</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Kasir" value="<?= $data->nama_user?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis kelamin*</label>
                            <select name="jk" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="l" <?= $data->jenis_kelamin == 'l' ? 'selected':'' ?>>Laki-laki</option>
                                <option value="p" <?= $data->jenis_kelamin == 'p' ? 'selected':'' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon*</label>
                            <input type="number" min="0" class="form-control" name="notelp" placeholder="Nomor telepon kasir" value="<?= $data->notelp?>" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat*</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat" required><?= $data->alamat?></textarea>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                            <button type="submit" class="btn btn-warning" name="ukasir"> Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- modal detail -->


<!-- DataTables -->
<script src="<?= base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(function() {
        $('#example1').DataTable();
    });
</script>