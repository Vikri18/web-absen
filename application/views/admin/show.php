    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        
        <!-- Main content -->
        <section class="content">
        <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary mb-2" href="<?= base_url('admin/tambahmatkul'); ?>">Tambah Matkul</a>
                </div>
                <div class="card-body">


                    <div class="row">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Jam mulai</th>
                                    <th scope="col">Jam selesai</th>
                                    <th scope="col">Dosen</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data as $data_users) { ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $data_users['matkul']; ?></td>
                                    <td><?= $data_users['hari']; ?></td>
                                    <td><?= $data_users['jam_mulai']; ?></td>
                                    <td><?= $data_users['jam_selesai']; ?></td>
                                    <td><?= $data_users['dosen']; ?></td>
                                    <td>
                                        <a href="edit/<?= $data_users['id']; ?>" class="btn btn-warning btn-sm" ><i class="nav-icon fas fa-pencil-alt"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="delete/<?= $data_users['id']; ?>" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->