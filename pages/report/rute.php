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

                        <h5 class="card-title">Rekap Data Rute</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rute</th>
                                    <th>Titik Awal</th>
                                    <th>Titik Akhir</th>
                                    <th>Jarak</th>
                                    <th>Lokasi</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = rute();
                                $no = 1;
                                foreach ($a as $key => $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $data['rute'] ?></td>
                                        <td><?= $data['t_awal'] ?></td>
                                        <td><?= $data['t_akhir'] ?></td>
                                        <td><?= $data['jarak'] ?></td>
                                        <td><?= $data['lokasi'] ?></td>
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