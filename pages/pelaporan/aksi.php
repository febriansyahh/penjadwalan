<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    // insertTugas();
    $a= $_FILES["file"];
    $b= $_POST["petugas"];
    insertPelaporan(upload_file($a, $b));
} elseif (isset($_POST['btnUbah'])) {
    updateTugas();
} else {
    if (isset($_GET['kode'])) {
        deleteTugas($_GET['kode']);
    }
}
