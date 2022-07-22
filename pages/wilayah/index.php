<?php
include_once("koneksi.php");

?>
<div class="form-group">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default" id="req-wilayah">Tambah Wilayah</button>
                <!-- Modal Content -->
                <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Tambah Data Wilayah</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="?v=wilayah_aksi" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Nama Wilayah</label>
                                        <input type="text" name="nama" id="" class="form-control" placeholder="Nama Wilayah" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Area</label>
                                        <input type="text" name="area" class="form-control" placeholder="Area">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Keterangan</label><br>
                                        <textarea name="keterangan" class="form-control" id="" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Maps Tower</label>
                                        <textarea name="maps" class="form-control" id="" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Koordinat</label>
                                        <input type="text" name="koordinat" class="form-control" placeholder="Source Maps">
                                    </div>
                                </div>
                                <!-- Using API AJAX U/ PROVINSI DAN KOTA -->
                                <!-- <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Nama Wilayah</label>
                                        <input type="text" name="nama" id="" class="form-control" placeholder="Nama Wilayah" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Provinsi</label>
                                        <select class="form-select form-select-sm" id="provinsi" name="provinsi" aria-label=".form-select-sm example">
                                            <option value="" selected>- Pilih -</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Kota</label>
                                        <select class="form-select form-select-sm" id="kabupaten" name="kota" aria-label=".form-select-sm example">
                                            <option value="" selected>- Pilih -</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label><br>
                                        <textarea name="keterangan" class="form-control" id="" rows="3"></textarea>
                                    </div>
                                </div> -->
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
                                    <th>Titik Lokasi</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = wilayah();
                                $no = 1;
                                foreach ($a as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['area'] ?></td>
                                        <td><?= $data['alamat'] ?></td>
                                        <td><?= $data['keterangan'] ?></td>
                                        <td>
                                            <a href="https://<?php echo $data['koordinat']; ?>" class='btn btn-secondary btn-sm' target='_blank'><i class="fa fa-map"></i> Maps</a>
                                        </td>
                                            <?php
                                            $maps = strtolower($data['maps']);
                                            ?>
                                        <td>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editWilayah" onclick="editableWilayah(this)" data-id="<?php echo $data['id_wilayah'] . "~" . $data['nama'] . "~" . $data['area'] . "~" . $data['alamat'] . "~" . $data['keterangan'] . "~" . $data['maps'] . "~" . $data['koordinat'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                            <a href="?v=wilayah_aksi&kode=<?php echo $data['id_wilayah']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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
                    <h2 class="h6 modal-title">Edit Data Wilayah</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=wilayah_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Wilayah</label>
                            <input type="hidden" name="id" id="editIdWilayah" class="form-control" placeholder="Rute">
                            <input type="text" name="nama" id="editNama" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Area</label>
                            <input type="text" name="area" id="editArea" class="form-control" placeholder="Titik Awal Rute">
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="editAlamat" class="form-control" placeholder="Titik Akhir Rute">
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label><br>
                            <textarea name="keterangan" class="form-control" id="editKeterangan" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Maps Tower</label>
                            <textarea name="maps" class="form-control" id="editMaps" rows="2"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Koordinat</label>
                            <input type="text" name="koordinat" id="editKoordinat" class="form-control" placeholder="Source Maps">
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