<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pasien</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Pasien</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="#modal-tambah" data-toggle="modal" class="btn btn-primary"> Tambah pasien baru</a>
            <a href="#" data-toggle="modal" class="btn btn-primary float-right"> Cetak surat rujukan</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-responsive-md">
                <thead>
                    <tr>
                        <th>NO. RM</th>
                        <th>Nama Pasien</th>
                        <th>No.Telp</th>
                        <th>Jenis kelamin</th>
                        <th>Usia</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pasien as $data) { ?>
                        <tr>
                            <td>
                                <a href="#"> <?= $data->no_rm ?></a>
                            </td>
                            <td><?= ucwords($data->nama_pasien) ?></td>
                            <td><?= $data->notelp ?></td>
                            <td><?= $data->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' ?></td>
                            <td><?= $data->umur ?></td>
                            <td><?= ucwords($data->alamat) ?></td>
                            <td>
                                <a href="<?= site_url('pasien/hapus/') . $data->id_pasien ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                <a href="#modal-ubah<?= $data->id_pasien ?>" data-toggle="modal" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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
                <h4 class="modal-title m-auto">Form tambah pasien</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('pasien/tambah') ?>" method="post">
                    <div class="form-group">
                        <label>NIK*</label>
                        <input type="number" min="0" class="form-control" name="nik" placeholder="NIK Pasien" required>
                    </div>
                    <div class="form-group">
                        <label>Nama pasien*</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Pasien" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin*</label>
                        <select name="jk" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Golongan darah <small>(optional)</small></label>
                        <select name="goldarah" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="ab">AB</option>
                            <option value="o">O</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama ibu kandung*</label>
                        <input type="text" class="form-control" name="namaibu" placeholder="Nama ibu kandung" required>
                    </div>
                    <div class="form-group">
                        <label>Umur*</label>
                        <input type="number" min="0" class="form-control" name="umur" placeholder="Umur pasien" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal lahir*</label>
                        <input type="date" class="form-control" name="tgllahir" required>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon <small>(optional)</small></label>
                        <input type="number" min="0" class="form-control" name="notelp" placeholder="Nomor telepon">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan <small>(optional)</small></label>
                        <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan Pasien">
                    </div>
                    <div class="form-group">
                        <label>Alamat*</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal ubah -->
<?php foreach ($pasien as $data) { ?>
    <div class="modal fade" id="modal-ubah<?= $data->id_pasien?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title m-auto">Form ubah pasien</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('pasien/ubah/').$data->id_pasien?>" method="POST">
                        <input type="hidden" value="<?= $data->id_pasien?>" name="id">
                        <div class="form-group">
                            <label>NO. RM</label>
                            <input type="text" min="0" class="form-control" name="norm" value="<?= $data->no_rm ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>NIK*</label>
                            <input type="number" min="0" class="form-control" name="nik" placeholder="NIK Pasien" value="<?= $data->NIK?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama pasien*</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Pasien" value="<?= $data->nama_pasien?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis kelamin*</label>
                            <select name="jk" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <option value="l" <?= $data->jenis_kelamin == 'l' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="p" <?= $data->jenis_kelamin == 'p' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Golongan darah <small>(optional)</small></label>
                            <select name="goldarah" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="a" <?= $data->gol_darah == 'a' ? 'selected' : '' ?>>A</option>
                                <option value="b" <?= $data->gol_darah == 'b' ? 'selected' : '' ?>>B</option>
                                <option value="ab" <?= $data->gol_darah == 'ab' ? 'selected' : '' ?>>AB</option>
                                <option value="o" <?= $data->gol_darah == 'o' ? 'selected' : '' ?>>O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama ibu kandung*</label>
                            <input type="text" class="form-control" name="namaibu" placeholder="Nama ibu kandung" value="<?= $data->nama_ibu_kandung?>" required>
                        </div>
                        <div class="form-group">
                            <label>Umur*</label>
                            <input type="number" min="0" class="form-control" name="umur" placeholder="Umur pasien" value="<?= $data->umur?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal lahir*</label>
                            <input type="date" class="form-control" name="tgllahir" value="<?= $data->tgl_lahir?>" required>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon <small>(optional)</small></label>
                            <input type="number" min="0" class="form-control" name="notelp" placeholder="Nomor telepon" value="<?= $data->notelp?>">
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan <small>(optional)</small></label>
                            <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan Pasien" value="<?= $data->pekerjaan?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat*</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat" required><?= $data->alamat?></textarea>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                            <button type="submit" class="btn btn-warning">Save changes</button>
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