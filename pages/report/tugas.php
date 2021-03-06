<?php
include_once("koneksi.php");
?>
<div class="form-group">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="pages/report/r_tugas.php" target="_blank" class="btn btn-secondary btn-secondary-800 mb-3"><b>Cetak Data</b></a>

                <!-- Modal Content -->
                <div class="card">
                    <div class="card-header">

                        <h6 class="card-title">Rekap Data Tugas</h6>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelompok</th>
                                    <th>Wilayah</th>
                                    <th>Jadwal</th>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = getTugas();
                                $no = 1;
                                foreach ($a as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $data['nama_kelompok'] ?></td>
                                        <td><?= $data['wilayah'] ?></td>
                                        <td><?= $data['nm_jadwal'] ?></td>
                                        <td><?= $data['tanggal'] ?></td>
                                        <td><?= $data['catatan_tugas'] ?></td>
                                        <td><?= $data['keterangan'] ?></td>
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