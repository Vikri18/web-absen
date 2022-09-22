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

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Add New Device
                    </button>
                </div>
                <div class="card-body">


                    <div class="row">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Device Name</th>
                                    <th scope="col">Admission Time</th>
                                    <th scope="col">Home Time</th>
                                    <th scope="col">MAC Address</th>
                                    <th scope="col">Last Registration ID</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data as $alat) { ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $alat['nama']; ?></td>
                                        <td><?= $alat['jam_masuk']; ?></td>
                                        <td><?= $alat['jam_pulang']; ?></td>
                                        <td><?= $alat['MAC']; ?></td>
                                        <td><?= $alat['id_terakhir']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" onclick="editAlat('<?= $alat['id']; ?>', '<?= base_url('admin/editAlat'); ?>')"><i class="nav-icon fas fa-pencil-alt"></i></button>
                                            &nbsp;&nbsp;
                                            <button type="button" class="btn btn-danger btn-sm" onclick="hapusAlat('<?= $alat['id']; ?>', '<?= $alat['nama']; ?>')"><i class="nav-icon fas fa-trash-alt"></i></button>
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


    <!-- Modal Tambah Satuan Barang -->
    <div class="modal fade" id="mdltambahsupplier" tabindex="-1" aria-labelledby="mdltambahsupplier" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdltambahsupplier">Form Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="logicSupplier.php" method="POST">
                        <div class="form-group">
                            <label for="inNamaSupplier">Device Name</label>
                            <input type="text" class="form-control" id="inNamaSupplier" name="inNamaSupplier" required>
                        </div>
                        <div class="form-group">
                            <label for="inAlamatSup">Admission Time</label>
                            <input type="text" class="form-control" id="inAlamatSup" name="inAlamatSup" required>
                        </div>
                        <div class="form-group">
                            <label for="inNotelpsup">Home Time</label>
                            <input type="text" class="form-control" id="inNotelpsup" name="inNotelpsup" required>
                        </div>
                        <button type="submit" name="simpanSupplier" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Satuan Barang -->
    <div class="modal fade" id="mdlEditAlat" aria-labelledby="mdlEditAlat" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdlEditAlat">Form Edit Device</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="inedtDevice">Device Name</label>
                            <input type="text" class="form-control" id="inedtDevice" name="inedtDevice" required>
                            <input type="hidden" id="inedtIddevice" name="inedtIddevice">
                        </div>
                        <div class="form-group">
                            <label for="inedtJamdatang">Admission Time</label>
                            <input type="text" class="form-control" id="inedtJamdatang" name="inedtJamdatang" required>
                        </div>
                        <div class="form-group">
                            <label for="inedtJampulang">Home Time</label>
                            <input type="text" class="form-control" id="inedtJampulang" name="inedtJampulang" required>
                        </div>
                        <div class="form-group">
                            <label for="inedtMAc">MAC Address</label>
                            <input type="text" class="form-control" id="inedtMAc" name="inedtMAc" required>
                        </div>  
                        <button type="button" onclick="simpaneditAlat('<?= base_url('admin/submitUpdatealat'); ?>')" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Satuan Barang -->
    <div class="modal fade" id="mdlHapusSupplier" tabindex="-1" aria-labelledby="mdlHapusSupplier" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdlHapusSupplier"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idHpsSupplier">
                    <h3 id="modalTitlehapus"></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submitHapussupplier()" class="btn btn-danger">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>