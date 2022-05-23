<?php
include_once("koneksi.php");
?>
<div class="form-group">
    <br>
    <?php
    switch ($data_level) {
        case '0':
    ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Laporan</button>
                        <!-- Modal Content -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Data Pelaporan</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Petugas</th>
                                            <th>Penugasan</th>
                                            <th>Jadwal</th>
                                            <th>Tanggal</th>
                                            <th>Laporan</th>
                                            <th>Dikirim</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a = getPelaporan();
                                        $no = 1;
                                        foreach ($a as $key => $data) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?= $data['petugas'] ?></td>
                                                <td><?= $data['catatan_tugas'] ?></td>
                                                <td><?= $data['nm_jadwal'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                                                <td><?= $data['catatan'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($data['submitted'])); ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editPelaporan" onclick="editablePelaporan(this)" data-id="<?php echo $data['id_pelaporan'] . "~" . $data['id_tugas'] . "~" . $data['id_petugas'] . "~" . $data['catatan'] . "~" . $data['file'] . "~" . $data['submitted'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                                    <?php
                                                    if ($data['status'] == '0') {
                                                    ?>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#confirmPelaporan" onclick="confirmPelaporan(this)" data-id="<?php echo $data['id_pelaporan'] . "~" . $data['id_tugas'] . "~" . $data['id_petugas'] . "~" . $data['catatan'] . "~" . $data['file'] . "~" . $data['submitted'] . "~" . $data['petugas'] . "~" . $data['catatan_tugas'] ?>" class="btn btn-secondary btn-sm"><i class="fas fa-check"></i> Konfirmasi</a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-check"></i> <b>Terkonfirmasi</b></a>
                                                    <?php
                                                    }
                                                    ?>
                                                    <a href="?v=pelaporan_aksi&kode=<?php echo $data['id_pelaporan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        <?php
            break;

        case '1':
        ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Laporan</button>
                        <!-- Modal Content -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Data Pelaporan Individu</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Petugas</th>
                                            <th>Penugasan</th>
                                            <th>Jadwal</th>
                                            <th>Tanggal</th>
                                            <th>Laporan</th>
                                            <th>Dikirim</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a = getPelaporan();
                                        $no = 1;
                                        foreach ($a as $key => $data) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?= $data['petugas'] ?></td>
                                                <td><?= $data['catatan_tugas'] ?></td>
                                                <td><?= $data['nm_jadwal'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                                                <td><?= $data['catatan'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($data['submitted'])); ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editPelaporan" onclick="editablePelaporan(this)" data-id="<?php echo $data['id_pelaporan'] . "~" . $data['id_tugas'] . "~" . $data['id_petugas'] . "~" . $data['catatan'] . "~" . $data['file'] . "~" . $data['submitted'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                                    <a href="?v=pelaporan_aksi&kode=<?php echo $data['id_pelaporan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>

    <?php
            break;
    }
    ?>

    </body>


    </html>
    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Pelaporan Tugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=pelaporan_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tugas</label>
                            <input type="hidden" name="petugas" class="form-control" value="<?= $data_id ?>">
                            <select class="form-select" name="tugas" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <?php
                                $a = tugas();
                                foreach ($a as $key => $value) {
                                    echo "<option value='" . $value["id_tugas"] . "'>" . $value["catatan_tugas"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Catatan</label><br>
                            <textarea name="catatan" class="form-control" id="" rows="3" placeholder="Masukkan catatan pengerjaan tugas"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">File Tugas</label><br>
                            <input type="file" name="file" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="btnSimpan" class="btn btn-secondary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPelaporan" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Tugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="?v=pelaporan_aksi" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tugas</label>
                            <input type="hidden" name="id" class="form-control" id="editIdPelaporan">
                            <input type="hidden" name="petugas" class="form-control" id="editPetugas">
                            <select class="form-select" name="tugas" id="editTugas" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <?php
                                $a = tugas();
                                foreach ($a as $key => $value) {
                                    echo "<option value='" . $value["id_tugas"] . "'>" . $value["catatan_tugas"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Catatan</label><br>
                            <textarea name="catatan" class="form-control" id="editCatatan" rows="3" placeholder="Masukkan catatan pengerjaan tugas"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">File Tugas</label><br>
                            <input type="file" name="fileUbah" id="editFile" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="btnUbah" class="btn btn-secondary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="confirmPelaporan" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Konfirmasi Pelaporan Tugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="?v=pelaporan_aksi" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tugas</label>
                            <input type="hidden" name="id" class="form-control" id="cnfrmId">
                            <input type="text" name="tugas" class="form-control" id="cnfrmCttnTugas" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Petugas</label>
                            <input type="text" name="tugas" class="form-control" id="cnfrmNama" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Catatan</label><br>
                            <textarea name="catatan" class="form-control" id="cnfrmCatatan" rows="3" placeholder="Masukkan catatan pengerjaan tugas" readonly></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">File Pelaporan</label><br>
                            <div id="showFile"></div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="btnConfirm" class="btn btn-secondary">Konfirmasi Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>