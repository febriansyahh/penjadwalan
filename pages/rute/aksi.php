<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertRute();
} elseif (isset($_POST['btnUbah'])) {
    updateRute();
} else {
    if (isset($_GET['kode'])) {
        deleteRute($_GET['kode']);
    }
}
