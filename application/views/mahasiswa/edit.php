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
            <div class="container-fluid">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1></h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/users'); ?>">Users</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit User</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container-fluid">


                        <div class="col-md-9 mx-auto">
                            <div class="card mx-auto">
                                <div class="card-header p-2">
                                    <h4>Edit User</h4>
                                </div>
                                <?php foreach($user as $u){ ?>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <form action="<?= base_url('admin/updateuser'); ?>" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $u->id ?>">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" name="nama"
                                                        id="nama" value="<?php echo $u->nama ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jurusan">Jurusan</label>
                                                    <input type="text" class="form-control" name="jurusan"
                                                        id="jurusan" value="<?php echo $u->jurusan ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" class="form-control" name="email"
                                                        id="email"  value="<?php echo $u->email ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select name="role" id="role" class="form-control" required>
                                                        <option value="">-- Pilih Role--</option>
                                                        <option value="1"<?php if($u->role=='1'): echo 'selected'; ?><?php endif; ?>>Admin</option>
                                                        <option value="2"<?php if($u->role=='2'): echo 'selected'; ?><?php endif; ?>>Dosen</option>
                                                        <option value="3"<?php if($u->role=='3'): echo 'selected'; ?><?php endif; ?>>Mahasiswa</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rfid">rfid</label>
                                                    <input type="number" class="form-control" name="rfid" id="rfid"
                                                    value="<?php echo $u->rfid ?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        id="password">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                            <?php } ?>
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