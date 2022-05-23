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
                        <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Penugasan</button>
                        <!-- Modal Content -->
                        <div class="card">
                            <div class="card-header">

                                <h5 class="card-title">Data Tugas</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Petugas</th>
                                            <th>Wilayah</th>
                                            <th>Jadwal</th>
                                            <th>Tanggal</th>
                                            <th>Catatan</th>
                                            <th>Keterangan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a = getTugas();
                                        $no = 1;
                                        foreach ($a as $key => $data) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['wilayah'] ?></td>
                                                <td><?= $data['nm_jadwal'] ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td><?= $data['catatan_tugas'] ?></td>
                                                <td><?= $data['keterangan'] ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editTugas" onclick="editableTugas(this)" data-id="<?php echo $data['id_tugas'] . "~" . $data['id_petugas'] . "~" . $data['id_wilayah'] . "~" . $data['id_jadwal'] . "~" . $data['catatan_tugas'] . "~" . $data['keterangan'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                                    <a href="?v=tugas_aksi&kode=<?php echo $data['id_tugas']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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
                        <!-- Modal Content -->
                        <div class="card">
                            <div class="card-header">

                                <h5 class="card-title">Data Tugas Individu</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Petugas</th>
                                            <th>Wilayah</th>
                                            <th>Jadwal</th>
                                            <th>Tanggal</th>
                                            <th>Catatan</th>
                                            <th>Keterangan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $b = getTugasme($data_id);
                                        $no = 1;
                                        foreach ($b as $key => $data) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['wilayah'] ?></td>
                                                <td><?= $data['nm_jadwal'] ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td><?= $data['catatan_tugas'] ?></td>
                                                <td><?= $data['keterangan'] ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editTugas" onclick="editableTugas(this)" data-id="<?php echo $data['id_tugas'] . "~" . $data['id_petugas'] . "~" . $data['id_wilayah'] . "~" . $data['id_jadwal'] . "~" . $data['catatan_tugas'] . "~" . $data['keterangan'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#clearTugas" onclick="selesaikanTugas(this)" data-id="<?php echo $data['id_tugas'] . "~" . $data['id_petugas'] . "~" . $data['catatan_tugas'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Selesaikan</a>
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
            # code...
            break;
    }
    ?>


    </body>


    </html>
    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Tambah Data Tugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=tugas_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Petugas</label>
                            <select class="form-select" name="petugas" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <?php
                                $a = petugas();
                                foreach ($a as $key => $value) {
                                    echo "<option value='" . $value["id_petugas"] . "'>" . $value["nama"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Wilayah</label>
                                    <select class="form-select" name="wilayah" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <?php
                                        $a = wilayah();
                                        foreach ($a as $key => $value) {
                                            echo "<option value='" . $value["id_wilayah"] . "'>" . $value["nama"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Jadwal</label>
                                    <select class="form-select" name="jadwal" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <?php
                                        $a = jadwal();
                                        foreach ($a as $key => $value) {
                                            echo "<option value='" . $value["id_jadwal"] . "'>" . $value["nm_jadwal"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Catatan</label><br>
                            <textarea name="catatan" class="form-control" id="" rows="3" placeholder="Masukkan catatan bila diperlukan"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label><br>
                            <textarea name="keterangan" class="form-control" id="" rows="3" placeholder="Masukkan keterangan"></textarea>
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

    <div class="modal fade" id="clearTugas" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Selesaikan Tugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="?v=tugas_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tugas</label>
                            <input type="hidden" id="clearId" name="id" class="form-control">
                            <input type="hidden" value="<?= $data_id ?>" name="petugas" class="form-control">
                            <input type="text" readonly id="cleartugas" name="id" class="form-control">
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
                        <button type="submit" name="btnClear" class="btn btn-secondary">Selesaikan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editTugas" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Tugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="?v=tugas_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Petugas</label>
                            <input type="hidden" id="editIdTugas" name="id">
                            <select class="form-select" name="petugas" id="editPetugas" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <?php
                                $a = petugas();
                                foreach ($a as $key => $value) {
                                    echo "<option value='" . $value["id_petugas"] . "'>" . $value["nama"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Wilayah</label>
                                    <select class="form-select" name="wilayah" id="editWilayah" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <?php
                                        $a = wilayah();
                                        foreach ($a as $key => $value) {
                                            echo "<option value='" . $value["id_wilayah"] . "'>" . $value["nama"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Jadwal</label>
                                    <select class="form-select" name="jadwal" id="editJadwal" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <?php
                                        $a = jadwal();
                                        foreach ($a as $key => $value) {
                                            echo "<option value='" . $value["id_jadwal"] . "'>" . $value["nm_jadwal"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Catatan</label><br>
                            <textarea name="catatan" class="form-control" id="editCatatan" rows="3" placeholder="Masukkan catatan bila diperlukan"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label><br>
                            <textarea name="keterangan" class="form-control" id="editKet" rows="3" placeholder="Masukkan keterangan"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="btnUbah" class="btn btn-secondary">Ubah</button>
                        </div>
                </form>
            </div>
        </div>
    </div>