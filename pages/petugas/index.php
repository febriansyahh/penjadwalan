<?php
include_once("koneksi.php");
$getkode = maxKodePetugas();
?>
<div class="form-group">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Tambah Petugas</button>
                <!-- Modal Content -->
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title">Data Petugas</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Induk Petugas</th>
                                    <th>Nama</th>
                                    <th>Gender</th>
                                    <th>Bagian</th>
                                    <th>Kelompok</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = getpetugas();
                                $no = 1;
                                foreach ($a as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $data['kode_petugas'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td>
                                            <?php if ($data['is_gender'] == '0') {
                                                echo 'Perempuan';
                                            } else {
                                                echo 'Pria'
                                            ?>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?= $data['bagian'] ?></td>
                                        <td><?= $data['nama_kelompok'] ?></td>
                                        <td>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detail" onclick="detPetugas(this)" data-id="<?php echo $data['id_petugas'] . "~" . $data['kode_petugas'] . "~" . $data['nama'] . "~" . $data['is_gender'] . "~" . $data['alamat'] . "~" . $data['no_hp'] . "~" . $data['bagian'] . "~" . $data['nama_kelompok'] . "~" . $data['status']  ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editpetugas" onclick="editablePetugas(this)" data-id="<?php echo $data['id_petugas'] . "~" . $data['kode_petugas'] . "~" . $data['nama'] . "~" . $data['is_gender'] . "~" . $data['alamat'] . "~" . $data['no_hp'] . "~" . $data['bagian'] . "~" . $data['id_kelompok'] . "~" . $data['status']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                            <a href="?v=petugas_aksi&kode=<?php echo $data['id_petugas']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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
    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Tambah Data Petugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=petugas_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kode Petugas</label>
                            <input type="text" name="kode" value="<?= $getkode ?>" class="form-control" readonly>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="Nama Petugas">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option selected>Pilih</option>
                                        <option value="1">Pria</option>
                                        <option value="0">Wanita</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">No Handphone</label>
                            <input type="text" name="nohp" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Bagian</label>
                            <!-- <input type="text" name="bagian" class="form-control"> -->
                            <select name="bagian" class="form-control" id="" required>
                                <option selected>Pilih</option>
                                <option value="leader">Leader</option>
                                <option value="anggota">Joniter (Anggota)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Regu Kelompok</label>
                            <select name="kelompok" name="kelompok" class="form-control" id="">
                                <option selected>Pilih</option>
                                <option value="0">Non Kelompok</option>
                                <?php
                                $a = kelompok();
                                foreach ($a as $key => $value) {
                                    echo "<option value='" . $value["id_kelompok"] . "'>" . $value["nama_kelompok"] . "</option>";
                                }
                                ?>
                            </select>
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

    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Detail Data Petugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">No Induk Petugas</label>
                                <input type="text" name="kelompok" id="detKode" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="kelompok" id="detNama" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="kelompok" id="detIsgender" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="kelompok" id="detAlamat" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">No Handphone</label>
                                <input type="text" name="kelompok" id="detNohp" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Bagian</label>
                                <input type="text" name="kelompok" id="detBagian" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Kelompok</label>
                                <input type="text" name="kelompok" id="detNmkel" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="text" name="kelompok" id="detStatus" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editpetugas" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Data Petugas</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="?v=petugas_aksi" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Kode Petugas</label>
                                <input type="hidden" name="id" id="editIdPetugas" class="form-control">
                                <input type="text" name="kode" id="editKode" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="editNama" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="gender" id="editIsgender" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="1">Pria</option>
                                    <option value="0">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" id="editAlamat" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">No Handphone</label>
                                <input type="text" name="nohp" id="editNohp" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Bagian</label>
                                <input type="text" name="bagian" id="editBagian" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Kelompok</label>
                                <select class="form-select form-select-sm" name="kelompok" id="editIdkel" aria-label=".form-select-sm example">
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
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="gender" id="editStatus" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Non Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="btnUbah" class="btn btn-secondary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>