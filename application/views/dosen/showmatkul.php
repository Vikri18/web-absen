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
                                foreach ($data as $matkul) { 
                                ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?php echo $matkul->matkul; ?></td>
                                    <td><?php echo $matkul->hari; ?></td>
                                    <td><?php echo $matkul->jam_mulai; ?></td>
                                    <td><?php echo $matkul->jam_selesai; ?></td>
                                    <td><?php echo $matkul->dosen; ?></td>
                                    <td>
        
                                        <a href="">aa</a>                                
                                    </td>
                                </tr>
                                <?php $i++;
                                }
                                 ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->