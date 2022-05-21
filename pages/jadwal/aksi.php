<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertJadwal();
} elseif (isset($_POST['btnUbah'])) {
    updateJadwal();
} else {
    if (isset($_GET['kode'])) {
        deleteJadwal($_GET['kode']);
    }
}
