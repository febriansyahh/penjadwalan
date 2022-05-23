<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertWilayah();
} elseif (isset($_POST['btnUbah'])) {
    updateWilayah();
} else {
    if (isset($_GET['kode'])) {
        deleteWilayah($_GET['kode']);
    }
}
