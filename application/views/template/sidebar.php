<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <!-- <center> -->
            <a href="#" class="d-block"><?= $nama; ?></a>
            <!-- </center> -->
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php if ($this->session->userdata('akses') === '3') { ?>
                <li class="nav-item">
                    <a href="<?= base_url('mahasiswa'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('mahasiswa/profile'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

            <?php } else  if ($this->session->userdata('akses') === '1') { ?>
                <li class="nav-item">
                    <a href="<?= base_url('admin'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/users'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/matakuliah'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Mata Kuliah
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/alat'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-microchip"></i>
                        <p>
                            Device
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/alat'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>
                            Log Activity
                        </p>
                    </a>
                </li>

            <?php } else  if ($this->session->userdata('akses') === '2') { ?>
                <li class="nav-item">
                    <a href="<?= base_url('dosen'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('dosen/profile'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('dosen/matakuliah'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Mata Kuliah
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('dosen'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            Absen
                        </p>
                    </a>
                </li>
            <?php } ?>
        </ul>

    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>