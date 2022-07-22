<?php
include_once("koneksi.php");
?>
<div class="form-group">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Tambah Rute</button>
                <!-- Modal Content -->
                <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Tambah Data Rute</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="?v=rute_aksi" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Rute</label>
                                        <input type="text" name="rute" id="" class="form-control" placeholder="Rute">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Titik Awal</label>
                                                <input type="text" name="tawal" id="" class="form-control" placeholder="Titik Awal Rute">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Titik Akhir</label>
                                                <input type="text" name="takhir" id="" class="form-control" placeholder="Titik Akhir Rute">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Jarak</label>
                                                <input type="text" name="jarak" id="" class="form-control" placeholder="Titik Awal Rute">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Lokasi</label>
                                                <input type="text" name="lokasi" id="" class="form-control" placeholder="Titik Akhir Rute">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label><br>
                                        <textarea name="keterangan" class="form-control" id="" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Titik Koordinat</label><br>
                                        <textarea name="koordinat" class="form-control" id="" rows="3"></textarea>
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

                        <h5 class="card-title">Data Rute</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rute</th>
                                    <th>Titik</th>
                                    <!-- <th>Titik Akhir</th> -->
                                    <th>Jarak</th>
                                    <th>Lokasi</th>
                                    <th>Keterangan</th>
                                    <th>Koordinat</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = rute();
                                $no = 1;
                                foreach ($a as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $data['rute'] ?></td>
                                        <td><?= $data['t_awal'] . " - " . $data['t_akhir'] ?></td>
                                        <td><?= $data['jarak'] ?></td>
                                        <td><?= $data['lokasi'] ?></td>
                                        <td><?= $data['keterangan'] ?></td>
                                        <td>
                                            <a href="https://<?php echo $data['koordinat']; ?>" class='btn btn-secondary btn-sm' target='_blank'><i class="fa fa-map"></i> Maps</a>
                                        </td>
                                        <td>
                                            <?php
                                            $maps = strtolower($data['maps']);
                                            ?>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editRute" onclick="editableRute(this)" data-id="<?php echo $data['id_rute'] . "~" . $data['rute'] . "~" . $data['t_awal'] . "~" . $data['t_akhir'] . "~" . $data['jarak'] . "~" . $data['lokasi'] . "~" . $data['lokasi'] . "~" . $data['maps'] . "~" . $data['koordinat'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                            <!-- <a href="" class="btn btn-danger btn-sm">Hapus</a> -->
                                            <a href="?v=rute_aksi&kode=<?php echo $data['id_rute']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="editRute" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Data Rute</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=rute_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Rute</label>
                            <input type="hidden" name="id" id="editId" class="form-control" placeholder="Rute">
                            <input type="text" name="rute" id="editRutenama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi Titik</label>
                            <input type="text" name="koordinat" id="editKoor" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Titik Awal</label>
                                    <input type="text" name="tawal" id="editTitikAwal" class="form-control" placeholder="Titik Awal Rute">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Titik Akhir</label>
                                    <input type="text" name="takhir" id="editTitikAkhir" class="form-control" placeholder="Titik Akhir Rute">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Jarak</label>
                                    <input type="text" name="jarak" id="editJarak" class="form-control" placeholder="Titik Awal Rute">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Lokasi</label>
                                    <input type="text" name="lokasi" id="editLokasi" class="form-control" placeholder="Titik Akhir Rute">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label><br>
                            <textarea name="keterangan" class="form-control" id="editKet" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Maps</label><br>
                            <textarea name="maps" class="form-control" id="editMaps" rows="3"></textarea>
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