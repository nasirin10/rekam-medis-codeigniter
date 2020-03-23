<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Rekam Medis</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/template/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucwords($this->session->userdata('nama')) ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link <?= $this->uri->segment(1) == '' | $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- pasien -->
                <li class="nav-item">
                    <a href="<?= site_url('pasien') ?>" class="nav-link <?= $this->uri->segment(1) == 'pasien' ? 'active' : '' ?>">
                        <i class="nav-icon fab fa-accessible-icon"></i>
                        <p>
                            Pasien
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>

                <!-- obat -->
                <li class="nav-item">
                    <a href="<?= site_url('obat') ?>" class="nav-link <?= $this->uri->segment(1) == 'obat' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tablets"></i>
                        <p>
                            Obat
                        </p>
                    </a>
                </li>

                <!-- pengguna -->
                <li class="nav-item has-treeview <?= $this->uri->segment(2) == 'kasir' | $this->uri->segment(2) == 'admin' | $this->uri->segment(2) == 'dokter' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pengguna
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('pengguna/kasir') ?>" class="nav-link <?= $this->uri->segment(2) == 'kasir' ? 'active' : '' ?>">
                                <i class="far fa-user nav-icon"></i>
                                <p>Kasir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('pengguna/admin') ?>" class="nav-link <?= $this->uri->segment(2) == 'admin' ? 'active' : '' ?>">
                                <i class="far fa-user nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('pengguna/dokter') ?>" class="nav-link <?= $this->uri->segment(2) == 'dokter' ? 'active' : '' ?>">
                                <i class="fas fa-user-md nav-icon"></i>
                                <p>Dokter</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- diagnosa -->
                <li class="nav-item">
                    <a href="<?= site_url('diagnosa') ?>" class="nav-link <?= $this->uri->segment(1) == 'diagnosa' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-diagnoses"></i>
                        <p>
                            Diagnosa
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>