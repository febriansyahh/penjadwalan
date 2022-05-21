<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertTugas();
} elseif (isset($_POST['btnUbah'])) {
    updateTugas();
} else {
    if (isset($_GET['kode'])) {
        deleteTugas($_GET['kode']);
    }
}
