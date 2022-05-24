<?php
include_once("koneksi.php");
?>
<div class="form-group">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Rekap Data Jadwal</h5>
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
                                        <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                                        <td><?= $data['rute'] ?></td>
                                        <td><?= $data['catatan'] ?></td>

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