<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    // insertTugas();
    $a= $_FILES["file"];
    $b= $_POST["petugas"];
    insertPelaporan(upload_file($a, $b));
} elseif (isset($_POST['btnUbah'])) {
    $a = $_FILES["fileUbah"];
    $b = $_POST["petugas"];
    updatePelaporan(upload_file($a,$b));
} else {
    if (isset($_GET['kode'])) {
        deletePelaporan($_GET['kode']);
    }
}
