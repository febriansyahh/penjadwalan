<?php
include_once("koneksi.php");
?>
<div class="form-group">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Tambah Jadwal</button>
                <!-- Modal Content -->
                <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Tambah Data Jadwal</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="?v=jadwal_aksi" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Kelompok</label>
                                        <select class="form-select form-select-sm" name="kelompok" aria-label=".form-select-sm">
                                            <option value="" selected>Pilih</option>
                                            <?php
                                            $a = kelompok();
                                            foreach ($a as $key => $value) {
                                                echo "<option value='" . $value["id_kelompok"] . "'>" . $value["nama_kelompok"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Jadwal</label>
                                        <input type="text" name="jadwal" id="" class="form-control" placeholder="Nama Jadwal">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Tanggal</label>
                                                <input type="date" name="tanggal" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Rute</label>
                                                <select class="form-select form-select-sm" name="rute" aria-label=".form-select-sm">
                                                    <option value="" selected>Pilih</option>
                                                    <?php
                                                    $rute = rute();
                                                    foreach ($rute as $row) {
                                                        echo "<option value='" . $row["id_rute"] . "'>" . $row["rute"] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Catatan</label><br>
                                        <textarea name="catatan" class="form-control" id="" rows="3"></textarea>
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
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title">Data Jadwal</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jadwal</th>
                                    <th>Kelompok</th>
                                    <th>Tanggal</th>
                                    <th>Rute</th>
                                    <th>Catatan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = getjadwal();
                                $no = 1;
                                foreach ($a as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $data['nm_jadwal'] ?></td>
                                        <td><?= $data['nama_kelompok'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($data['tanggal']));?></td>
                                        <td><?= $data['rute'] ?></td>
                                        <td><?= $data['catatan'] ?></td>
                                        <td>
                                            <!-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editjadwal" onclick="editableJadwal(this)" data-id="<?php echo $data['id_jadwal'] . "~" . $data['id_rute'] . "~" . $data['id_kelompok'] . "~" . $data['nm_jadwal'] . "~" . $data['tanggal'] . "~" . $data['id_rute'] . "~" . $data['catatan'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a> -->
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editjadwal" onclick="editableJadwal(this)" data-id="<?php echo $data['id_jadwal'] . "~" . $data['id_rute'] . "~" . $data['id_kelompok'] . "~" . $data['nm_jadwal'] . "~" . $data['tanggal'] . "~" . $data['id_rute'] . "~" . $data['catatan'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                            <a href="?v=jadwal_aksi&kode=<?php echo $data['id_jadwal']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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

    </body>


    </html>

    <div class="modal fade" id="editjadwal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Data Rute</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=jadwal_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Jadwal</label>
                                    <input type="hidden" name="id" id="editIdJadwal" class="form-control" placeholder="Rute">
                                    <input type="text" name="nama" id="editNamaJadwal" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Kelompok</label>
                                    <select class="form-select form-select-sm" name="kelompok" id="editIdkelompok" aria-label=".form-select-sm">
                                        <option value="" selected>Pilih</option>
                                        <?php
                                        $a = kelompok();
                                        foreach ($a as $key => $value) {
                                            echo "<option value='" . $value["id_kelompok"] . "'>" . $value["nama_kelompok"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Rute</label>
                                    <select class="form-select form-select-sm" name="rute" id="editIdRute" aria-label=".form-select-sm">
                                        <option value="" selected>Pilih</option>
                                        <?php
                                        $rute = rute();
                                        foreach ($rute as $key => $data) {
                                            echo "<option value='" . $data["id_rute"] . "'>" . $data["rute"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" id="editTanggal" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Catatan</label><br>
                            <textarea name="catatan" class="form-control" id="editCatatan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="btnUbah" class="btn btn-secondary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>