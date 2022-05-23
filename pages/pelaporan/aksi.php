<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertPelaporan(upload_file('file', $_POST["petugas"]));

} elseif (isset($_POST['btnUbah'])) {
    $a = $_FILES["fileUbah"];
    $b = $_POST["petugas"];
    updatePelaporan(upload_file($a,$b));

} elseif (isset($_POST['btnConfirm'])) {
    confirmPelaporan($_POST['id']);

} else {
    if (isset($_GET['kode'])) {
        deletePelaporan($_GET['kode']);
    }
}
