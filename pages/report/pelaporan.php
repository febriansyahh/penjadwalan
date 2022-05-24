<?php
include_once("koneksi.php");
?>
<div class="form-group">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="pages/report/r_pelaporan.php" target="_blank" class="btn btn-secondary btn-secondary-800 mb-3"><b>Cetak Data</b></a>
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Rekap Pelaporan</h6>
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