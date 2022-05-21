<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertKelompok();
} elseif (isset($_POST['btnUbah'])) {
    updateKelompok();
} else {
    if (isset($_GET['kode'])) {
        deleteKelompok($_GET['kode']);
    }
}
