<?php
include_once("__DIR__ .  ../../koneksi.php");

// if (isset($_POST['btnSimpan'])) {
//     insertPetugas();
// } elseif (isset($_POST['btnUbah'])) {
//     updatePetugas();
// } else {
//     if (isset($_GET['kode'])) {
//         deletePetugas($_GET['kode']);
//     }
// }
if (isset($_POST['btnUbah'])) {
    updatePetugas();
} else {
    if (isset($_GET['kode'])) {
        deletePetugas($_GET['kode']);
    }
}
