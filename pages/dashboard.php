         <?php
            switch ($data_level) {
                case '0':
            ?>
                 <div class="row mt-4">
                     <div class="col-12 col-sm-6 col-xl-4 mb-4">
                         <div class="card border-0 shadow">
                             <div class="card-body">
                                 <div class="row d-block d-xl-flex align-items-center">
                                     <?php
                                        $petugas = countPetugas();
                                        ?>
                                     <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                         <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                             <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                             </svg>
                                         </div>
                                         <div class="d-sm-none">
                                             <h2 class="h5">Petugas</h2>
                                             <h3 class="fw-extrabold mb-1"><?= $petugas ?></h3>
                                         </div>
                                     </div>
                                     <div class="col-12 col-xl-7 px-xl-0">
                                         <div class="d-none d-sm-block">
                                             <h2 class="h6 text-gray-400 mb-0">Petugas</h2>
                                             <h3 class="fw-extrabold mb-2"><?= $petugas ?></h3>
                                         </div>
                                         <br>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-12 col-sm-6 col-xl-4 mb-4">
                         <div class="card border-0 shadow">
                             <div class="card-body">
                                 <div class="row d-block d-xl-flex align-items-center">
                                     <?php
                                        $tugas = countTugas();
                                        ?>
                                     <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                         <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                             <i class="fas fa-file-alt fa-2xl"></i>
                                         </div>
                                         <div class="d-sm-none">
                                             <h2 class="fw-extrabold h5">Penugasan</h2>
                                             <h3 class="mb-1"><?= $tugas[0] ?></h3>
                                         </div>
                                     </div>
                                     <div class="col-12 col-xl-7 px-xl-0">
                                         <div class="d-none d-sm-block">
                                             <h2 class="h6 text-gray-400 mb-0">Penugasan</h2>
                                             <h3 class="fw-extrabold mb-2"><?= $tugas[0] ?></h3>
                                         </div>
                                         <small class="d-flex align-items-center text-gray-500">
                                             Per Bulan <?= $tugas[1] ?>
                                         </small>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-12 col-sm-6 col-xl-4 mb-4">
                         <div class="card border-0 shadow">
                             <div class="card-body">
                                 <div class="row d-block d-xl-flex align-items-center">
                                     <?php
                                        $pl = countPelaporan();
                                        ?>
                                     <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                         <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                             <i class="fas fa-file-invoice fa-2xl"></i>
                                         </div>
                                         <div class="d-sm-none">
                                             <h2 class="fw-extrabold h5"> Pelaporan</h2>
                                             <h3 class="mb-1"><?= $pl[0] ?></h3>
                                         </div>
                                     </div>
                                     <div class="col-12 col-xl-7 px-xl-0">
                                         <div class="d-none d-sm-block">
                                             <h2 class="h6 text-gray-400 mb-0"> Pelaporan</h2>
                                             <h3 class="fw-extrabold mb-2"><?= $pl[0] ?></h3>
                                         </div>
                                         <small class="text-gray-500">
                                             Per Bulan <?= $pl[1] ?>
                                         </small>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="form-group">
                     <div class="card mt-4">
                         <h5 class="text-center mt-4 mb-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><b>SELAMAT DATANG DI<br> SISTEM INFORMASI PENJADWALAN</b></h5>
                         <center>
                             <img src="assets/img/rps.png" alt="Admin" style="width:auto; height:200px;" class="mb-4">
                         </center>
                     </div>

                     <div class="form-group mt-5">
                         <span class="label label-info label-inline mr-2" style="font-size: 15px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff; width:25%">Pelaporan Terbaru</span>
                         <hr class="cust-hr" style="border-top:4px solid #2e74d6;">
                     </div>
                 </div>

                 <div class="form-group mb-4">
                     <?php
                        $plp = pelaporanDash();
                        foreach ($plp as $key => $value) {
                        ?>
                         <div class="card mt-2" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                             <div class="row mt-3 mb-3" style="padding-left:10px">
                                 <div class="col-3 ml-3">
                                     <?= $value["nama"] ?> - <?= $value["bagian"] ?>
                                 </div>
                                 <div class="col-5">
                                     Tugas : <?= $value["catatan_tugas"] ?> <br>
                                     Pelaporan : <?= $value["catatan"] ?>
                                 </div>
                                 <div class="col-4 text-center">
                                     <a href="<?php echo "file_data/pelaporan/" . $value['file'] ?>" target="_blank"><img src="assets/img/icon/file-cursor.png" alt="" style="width:45px; height: 45px;" target="_blank"></a>
                                 </div>
                             </div>
                         </div>
                     <?php
                        }
                        ?>
                 </div>
             <?php
                    break;

                case '1':
                ?>
                 <div class="form-group">
                     <div class="card mt-4">
                         <h5 class="text-center mt-4 mb-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><b>SELAMAT DATANG DI<br> SISTEM INFORMASI PENJADWALAN</b></h5>
                         <center>
                             <img src="assets/img/layanan.png" alt="Admin" style="width:200px; height:200px;" class="mb-4">
                         </center>
                         <h5 class="text-center mt-4 mb-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><b>PT. RIZKI PRIMA SAKTI</b></h5>
                     </div>

                     <div class="form-group mt-5">
                         <span class="label label-info label-inline mr-2" style="font-size: 15px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff; width:25%">Pelaporan Tugas</span>
                         <hr class="cust-hr" style="border-top:4px solid #2e74d6;">
                     </div>
                 </div>

                 <div class="form-group mb-4">
                     <?php
                        $plp = dashMe();
                        foreach ($plp as $key => $value) {
                        ?>
                         <div class="card mt-2" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
                             <div class="row mt-3 mb-3" style="padding-left:10px">
                                 <div class="col-3 ml-3">
                                     <?= $value["nama"] ?> - <?= $value["bagian"] ?>
                                 </div>
                                 <div class="col-3">
                                     Tugas : <?= $value["catatan_tugas"] ?> <br>
                                     Pelaporan : <?= $value["catatan"] ?>
                                 </div>
                                 <div class="col-2">
                                     Tgl. Submit : <?= date("d-m-Y", strtotime($value["submitted"])) ?> <br>
                                 </div>
                                 <div class="col-4 text-center">
                                     <a href="<?php echo "file_data/pelaporan/" . $value['file'] ?>" target="_blank"><img src="assets/img/icon/file-cursor.png" alt="" style="width:45px; height: 45px;" target="_blank"></a>
                                 </div>
                             </div>
                         </div>
                     <?php
                        }
                        ?>
                 </div>
         <?php
                    break;
            }
            ?>