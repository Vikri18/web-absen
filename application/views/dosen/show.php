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
                <div class="">
                   
                
                <div class="card-body">


                    <div class="row">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data as $data_users) { ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $data_users['nama']; ?></td>
                                    <td><?= $data_users['jurusan']; ?></td>
                                    <td>
                                        <a href="lihatmatkul/<?= $data_users['id']; ?>" class="btn btn-warning btn-sm" >Lihat Mata kuliah</a>
                                        
                                        
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