<?php
include_once("koneksi.php");

?>
<div class="form-group">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default" id="req-wilayah">Tambah User Pengguna</button>
                <!-- Modal Content -->
                <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Tambah Data User</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="?v=user_aksi" method="post" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-6">
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
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Nama Pengguna</label>
                                                <input type="text" name="nama" id="" class="form-control" placeholder="Nama user pengguna" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" name="username" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="text" name="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Level Pengguna</label>
                                                <select name="level" id="" class="form-control">
                                                    <option selected>Pilih</option>
                                                    <option value="0">Administrator</option>
                                                    <option value="1">Pengguna</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Status Aktif</label>
                                                <select name="status" id="" class="form-control">
                                                    <option selected>Pilih</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Non Aktif</option>
                                                </select>
                                            </div>
                                        </div>
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

                        <h5 class="card-title">Data Wilayah</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Wilayah</th>
                                    <th>Area</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = user();
                                $no = 1;
                                foreach ($a as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['username'] ?></td>
                                        <td>
                                            <?php
                                            if ($data['level'] == "0") {
                                                echo 'Administrator';
                                            } else {
                                                echo 'Petugas';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($data['actived'] == "1") {
                                                echo 'Aktif';
                                            } else {
                                                echo 'Non Aktif';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editWilayah" onclick="editableUser(this)" data-id="<?php echo $data['idUser'] . "~" . $data['nama'] . "~" . $data['username'] . "~" . $data['password'] . "~" . $data['actived'] . "~" . $data['level'] . "~" . $data['idPetugas'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                            <a href="?v=user_aksi&kode=<?php echo $data['idUser']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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

    <div class="modal fade" id="editWilayah" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Data Rute</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=user_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Petugas</label>
                                    <input type="hidden" name="id" id="editIdUser" readonly>
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
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Nama Pengguna</label>
                                    <input type="text" name="nama" id="editNama" class="form-control" placeholder="Nama user pengguna" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="editUsername" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password" id="editPass" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Level Pengguna</label>
                                    <select name="level" id="editLevel" class="form-control">
                                        <option selected>Pilih</option>
                                        <option value="0">Administrator</option>
                                        <option value="1">Pengguna</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Status Aktif</label>
                                    <select name="status" id="editActiv" class="form-control">
                                        <option selected>Pilih</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Non Aktif</option>
                                    </select>
                                </div>
                            </div>
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