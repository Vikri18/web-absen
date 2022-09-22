    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <?= $this->session->flashdata('message'); ?>
            <div class="container-fluid">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>User Profile</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa'); ?>">Mahasiswa</a></li>
                                    <li class="breadcrumb-item active">User Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <h3 class="profile-username text-center"><?= $profile[0]['nama']; ?></h3>
                                        <p class="text-muted text-center"><?= $profile[0]['jurusan']; ?></p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Email : </b> <?= $profile[0]['email']; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <h4>Personal data</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="activity">
                                                <form action="<?= base_url('mahasiswa/updateprofile'); ?>" method="POST">
                                                <input type="hidden" name="profileID" value="<?= $profile[0]['id']; ?>">    
                                                <div class="form-group">
                                                        <label for="profileNama">Nama</label>
                                                        <input type="text" class="form-control" name="profileNama" id="profileNama" value="<?= $profile[0]['nama']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profileJurusan">Jurusan</label>
                                                        <input type="text" class="form-control" name="profileJurusan" id="profileJurusan" value="<?= $profile[0]['jurusan']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profileEmail">Email address</label>
                                                        <input type="email" class="form-control" name="profileEmail" id="profileEmail" aria-describedby="emailHelp" value="<?= $profile[0]['email']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profilePassword">Password</label>
                                                        <input type="password" class="form-control" name="profilePassword" id="profilePassword">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </section>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->