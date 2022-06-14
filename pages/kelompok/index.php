<?php
include_once("koneksi.php");
?>
<div class="form-group">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Tambah Kelompok</button>
                <!-- Modal Content -->
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title">Data Kelompok</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelompok</th>
                                    <th>Wilayah</th>
                                    <th>Jumlah Anggota</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = getkelompok();
                                $no = 1;
                                foreach ($a as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $data['nama_kelompok'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['jumlah_anggota'] ?></td>
                                        <td>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editKelompok" onclick="editableKelompok(this)" data-id="<?php echo $data['id_kelompok'] . "~" . $data['id_wilayah'] . "~" . $data['nama_kelompok'] . "~" . $data['jumlah_anggota']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                            <!-- <a href="" class="btn btn-danger btn-sm">Hapus</a> -->
                                            <a href="?v=kelompok_aksi&kode=<?php echo $data['id_kelompok']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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
                    <h2 class="h6 modal-title">Tambah Data Kelompok</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=kelompok_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kelompok</label>
                            <input type="text" name="kelompok" id="" class="form-control" placeholder="Nama Kelompok" required>
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
                                            echo "<option value='" . $value["id_wilayah"] . "'>" . $value["id_wilayah"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Jumlah Anggota</label>
                                    <input type="text" name="jumlah" id="" class="form-control" placeholder="Jumlah Anggota Kelompok">
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

    <div class="modal fade" id="editKelompok" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Data Kelompok</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=kelompok_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kelompok</label>
                            <input type="hidden" name="id" id="editId" class="form-control" placeholder="Rute">
                            <input type="text" name="kelompok" id="editNamakel" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Titik Awal</label>
                            <select class="form-select form-select-sm" name="wilayah" id="editIdWil" aria-label=".form-select-sm example">
                                <option value="" selected>Pilih</option>
                                <?php
                                $a = wilayah();
                                foreach ($a as $key => $value) {
                                    echo "<option value='" . $value["id_wilayah"] . "'>" . $value["nama"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah Anggota</label>
                            <input type="text" name="jumlah" id="editJumlah" class="form-control">
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