<?php
include_once("koneksi.php");
?>
<div class="form-group">
    <br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Laporan</button> -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Laporan Pelaporan</h5>
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