<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'penjadwalan');

define('SITE_ROOT', realpath(dirname(__FILE__)));

$con = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to Connect');

function LoginUser()
{
    global $con;
    $sql_login = "SELECT * FROM `user` WHERE `actived`='1' AND `username`='" . $_POST['username'] . "' AND `password`='" . $_POST['password'] . "'";
    $query_login = mysqli_query($con, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);

    if ($jumlah_login >= 1) {
        session_start();
        $_SESSION["ses_username"] = $data_login["username"];
        $_SESSION["ses_nama"] = $data_login["nama"];
        $_SESSION["ses_level"] = $data_login["level"];
        $_SESSION["ses_idPetugas"] = $data_login['idPetugas'];
        $_SESSION["ses_idUser"] = $data_login['idUser'];

        echo "<script>alert('Login Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else {
        echo "<script>alert('Login Gagal!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=sign-in.php'>";
    }
}

function rute()
{
    global $con;
    $sql = "SELECT * FROM `rute`";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertRute()
{
    global $con;
    $sql = "INSERT INTO `rute`(`rute`, `t_awal`, `t_akhir`, `jarak`, `lokasi`, `keterangan`) VALUES(
                '" . $_POST['rute'] . "',
                '" . $_POST['tawal'] . "',
                '" . $_POST['takhir'] . "',
                '" . $_POST['jarak'] . "',
                '" . $_POST['lokasi'] . "',
                '" . $_POST['keterangan'] . "')";
    $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query_insert) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=rute'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=rute'>";
    }
}

function updateRute()
{
    global $con;

    $sql_ubah = "UPDATE rute SET
        rute='" . $_POST['rute'] . "',
        t_awal='" . $_POST['tawal'] . "',
        t_akhir='" . $_POST['takhir'] . "',
        jarak='" . $_POST['jarak'] . "',
        lokasi='" . $_POST['lokasi'] . "',
        keterangan='" . $_POST['keterangan'] . "'
        WHERE id_rute='" . $_POST['id'] . "'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=rute'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=rute'>";
    }
}

function deleteRute($id)
{
    global $con;

    $sql = "DELETE FROM rute WHERE id_rute = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=rute'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=rute'>";
    }
}

function wilayah()
{
    global $con;
    $sql = "SELECT * FROM `wilayah`";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertWilayah()
{
    global $con;
    //Untuk AJAX API KABUPATEN DAN PROVINSI
    // $sql = "INSERT INTO `rute`(`rute`, `t_awal`, `t_akhir`, `jarak`, `lokasi`, `keterangan`) VALUES(
    //             '" . $_POST['rute'] . "',
    //             '" . $_POST['tawal'] . "',
    //             '" . $_POST['takhir'] . "',
    //             '" . $_POST['jarak'] . "',
    //             '" . $_POST['lokasi'] . "',
    //             '" . $_POST['keterangan'] . "')";

    $sql = "INSERT INTO `wilayah`(`nama`, `area`, `alamat`, `keterangan`) VALUES(
                '" . $_POST['nama'] . "',
                '" . $_POST['area'] . "',
                '" . $_POST['alamat'] . "',
                '" . $_POST['keterangan'] . "')";
    $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query_insert) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=wilayah'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=wilayah'>";
    }
}

function updateWilayah()
{
    global $con;

    $sql_ubah = "UPDATE wilayah SET
        nama='" . $_POST['nama'] . "',
        area='" . $_POST['area'] . "',
        alamat='" . $_POST['alamat'] . "',
        keterangan='" . $_POST['keterangan'] . "'
        WHERE id_wilayah='" . $_POST['id'] . "'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=wilayah'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=wilayah'>";
    }
}

function deleteWilayah($id)
{
    global $con;

    $sql = "DELETE FROM wilayah WHERE id_wilayah = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=wilayah'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=wilayah'>";
    }
}

function petugas()
{
    global $con;
    $sql = "SELECT * FROM `petugas`";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getpetugas()
{
    global $con;
    $sql = "SELECT a.*, b.nama_kelompok FROM petugas a JOIN kelompok b ON a.id_kelompok=b.id_kelompok";
    $query = mysqli_query($con, $sql);
    return $query;
}


function maxKodePetugas()
{
    global $con;

    $carikode = mysqli_query($con, "SELECT MAX(kode_petugas) FROM petugas");
    $datakode = mysqli_fetch_array($carikode);
    $tahun = date('Y');
    if ($datakode) {
        // $nilaikode = substr($datakode[0], 3);
        $nilaikode = substr($datakode[0], 9);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;

        // $hasilkode = "PLDN" . str_pad($kode, 2, "0", STR_PAD_LEFT);
        $hasilkode = "PRT-" . $tahun . "-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
    } else {
        $hasilkode = "PRT-" . $tahun . "-001";
    }

    return $hasilkode;
}

function insertPetugas()
{
    global $con;
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `petugas`(`kode_petugas`, `nama`, `is_gender`, `alamat`, `no_hp`, `bagian`, `id_kelompok`, `status`, `registered`) VALUES(
                '" . $_POST['kode'] . "',
                '" . $_POST['nama'] . "',
                '" . $_POST['gender'] . "',
                '" . $_POST['alamat'] . "',
                '" . $_POST['nohp'] . "',
                '" . $_POST['bagian'] . "',
                '" . $_POST['kelompok'] . "',
                '1',
                '" . $date . "')";
    $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query_insert) {
        echo "<script>alert('Simpan Data Petugas Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=petugas'>";
    } else {
        echo "<script>alert('Simpan Data Petugas Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=petugas'>";
    }
}

function updatePetugas()
{
    global $con;

    $sql_ubah = "UPDATE petugas SET
        nama='" . $_POST['nama'] . "',
        is_gender='" . $_POST['gender'] . "',
        alamat='" . $_POST['alamat'] . "',
        no_hp='" . $_POST['no_hp'] . "',
        bagian='" . $_POST['bagian'] . "',
        id_kelompok='" . $_POST['kelompok'] . "'
        status='" . $_POST['status'] . "'
        WHERE id_petugas='" . $_POST['id'] . "'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    }
}

function deletePetugas($id)
{
    global $con;

    $sql = "DELETE FROM petugas WHERE id_petugas = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    $sqled = "DELETE FROM user WHERE idPetugas = '$id' ";
    $query_deleted = mysqli_query($con, $sqled);

    if ($query_delete && $query_deleted) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    }
}


function kelompok()
{
    global $con;
    $sql = "SELECT * FROM `kelompok`";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getkelompok()
{
    global $con;
    $sql = "SELECT * FROM kelompok a, wilayah b WHERE a.id_wilayah=b.id_wilayah";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertKelompok()
{
    global $con;
    $sql = "INSERT INTO `kelompok`(`nama_kelompok`, `id_wilayah`, `jumlah_anggota`) VALUES(
                '" . $_POST['kelompok'] . "',
                '" . $_POST['wilayah'] . "',
                '" . $_POST['jumlah'] . "')";
    $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query_insert) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=kelompok'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=kelompok'>";
    }
}

function updateKelompok()
{
    global $con;

    $sql_ubah = "UPDATE kelompok SET
        nama_kelompok='" . $_POST['kelompok'] . "',
        id_wilayah='" . $_POST['wilayah'] . "',
        jumlah_anggota='" . $_POST['jumlah'] . "'
        WHERE id_kelompok='" . $_POST['id'] . "'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=kelompok'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=kelompok'>";
    }
}

function deleteKelompok($id)
{
    global $con;

    $sql = "DELETE FROM kelompok WHERE id_kelompok = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=kelompok'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=kelompok'>";
    }
}

function jadwal()
{
    global $con;
    $sql = "SELECT * FROM `jadwal`";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getjadwal()
{
    global $con;
    // $sql = "SELECT a.*, b.nama_kelompok, c.rute, c.lokasi, d.nama FROM jadwal a JOIN kelompok b ON a.id_kelompok=b.id_kelompok JOIN rute c ON a.id_rute=c.id_rute JOIN wilayah d ON b.id_wilayah=d.id_wilayah";
    $sql = "SELECT a.*, b.nama_kelompok, c.rute, c.lokasi FROM jadwal a JOIN kelompok b ON a.id_kelompok=b.id_kelompok JOIN rute c ON a.id_rute=c.id_rute";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertJadwal()
{
    global $con;
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `jadwal`(`id_kelompok`, `nm_jadwal`, `tanggal`, `id_rute`, `catatan`, `tgl_input`) VALUES(
                '" . $_POST['kelompok'] . "',
                '" . $_POST['jadwal'] . "',
                '" . $_POST['tanggal'] . "',
                '" . $_POST['rute'] . "',
                '" . $_POST['catatan'] . "',
                '" . $date . "')";
    $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query_insert) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=jadwal'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=jadwal'>";
    }
}

function updateJadwal()
{
    global $con;

    $sql_ubah = "UPDATE jadwal SET
        id_kelompok='" . $_POST['kelompok'] . "',
        nm_jadwal='" . $_POST['nama'] . "',
        tanggal='" . $_POST['tanggal'] . "',
        id_rute='" . $_POST['rute'] . "',
        catatan='" . $_POST['catatan'] . "'
        WHERE id_jadwal='" . $_POST['id'] . "'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=jadwal'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=jadwal'>";
    }
}

function deleteJadwal($id)
{
    global $con;

    $sql = "DELETE FROM jadwal WHERE id_jadwal = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=jadwal'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=jadwal'>";
    }
}

function tugas()
{
    global $con;
    $sql = "SELECT * FROM `tugas`";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getTugas()
{
    global $con;
    $sql = "SELECT a.*, b.nama, c.nama as wilayah, d.nm_jadwal, d.tanggal FROM tugas a, petugas b, wilayah c, jadwal d WHERE a.id_petugas=b.id_petugas AND a.id_wilayah=c.id_wilayah AND a.id_jadwal=d.id_jadwal AND a.id_tugas NOT IN (SELECT id_tugas FROM pelaporan) ORDER BY a.id_tugas DESC";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getTugasme($id)
{
    global $con;
    $sql = "SELECT a.*, b.nama, c.nama as wilayah, d.nm_jadwal, d.tanggal FROM tugas a, petugas b, wilayah c, jadwal d WHERE a.id_petugas=b.id_petugas AND a.id_wilayah=c.id_wilayah AND a.id_jadwal=d.id_jadwal AND a.id_petugas='$id' AND a.id_tugas NOT IN (SELECT id_tugas FROM pelaporan) ORDER BY a.id_tugas DESC ";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertTugas()
{
    global $con;
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `tugas`(`id_petugas`, `id_wilayah`, `id_jadwal`, `catatan_tugas`, `keterangan`, `submitted`) VALUES(
                '" . $_POST['petugas'] . "',
                '" . $_POST['wilayah'] . "',
                '" . $_POST['jadwal'] . "',
                '" . $_POST['catatan'] . "',
                '" . $_POST['keterangan'] . "',
                '" . $date . "')";
    $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query_insert) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=tugas'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=tugas'>";
    }
}

function updateTugas()
{
    global $con;

    $sql_ubah = "UPDATE tugas SET
        id_petugas ='" . $_POST['petugas'] . "',
        id_jadwal ='" . $_POST['jadwal'] . "',
        catatan_tugas ='" . $_POST['catatan'] . "',
        keterangan ='" . $_POST['keterangan'] . "'
        WHERE id_tugas ='" . $_POST['id'] . "'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=tugas'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=tugas'>";
    }
}

function deleteTugas($id)
{
    global $con;

    $sql = "DELETE FROM tugas WHERE id_tugas = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=tugas'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=tugas'>";
    }
}

function upload_file($namePost, $codePetugas)
{
    global $con;

    $getkode = "SELECT kode_petugas FROM petugas WHERE id_petugas = '" . $codePetugas . "' ";
    $query = mysqli_query($con, $getkode);
    $row = mysqli_fetch_row($query);
    $kode = $row[0];
    $ekstensi_diperbolehkan  = array('jpg', 'png', 'jpeg', 'pdf');
    $date = date('Y-m-d');
    $named = str_replace('-', '', $kode);
    
    $nama = $_FILES[$namePost]['name'];
    $x = explode('.', $nama);
    
    $ekstensi = strtolower(end($x));
    $namas = 'Pelaporan_' . $named . "_" . $date . "." . $ekstensi;
    
    $ukuran = $_FILES[$namePost]['size'];
    $file_tmp = $_FILES[$namePost]['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 41943040) {
            $destination_path = getcwd() . DIRECTORY_SEPARATOR . 'file_data\pelaporan' . '/';
            $target_path = $destination_path . $namas;
            @move_uploaded_file($file_tmp, $target_path);
            return $namas;
        } else {
            return;
        }
    } else {
        return;
    }
}

function insertPelaporan($upload)
{
    global $con;
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `pelaporan`(`id_tugas`, `id_petugas`, `catatan`, `file`, `submitted`) VALUES(
                '" . $_POST['tugas'] . "',
                '" . $_POST['petugas'] . "',
                '" . $_POST['catatan'] . "',
                '" . $upload . "',
                '" . $date . "')";
    $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query_insert) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=pelaporan'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=pelaporan'>";
    }
}


function updatePelaporan($upload)
{
    global $con;
    $id = $_POST['id'];
    $cekData = "SELECT `id_pelaporan`, `file` FROM `pelaporan` WHERE `id_pelaporan` = '$id'";
    $query = mysqli_query($con, $cekData);
    $row = mysqli_fetch_row($query);
    $id = $row[0];
    $file = $row[1];

    if($_FILES["fileUbah"] == NULL)
    {
        $sql_ubah = "UPDATE pelaporan SET
        id_tugas ='" . $_POST['tugas'] . "',
        id_petugas ='" . $_POST['petugas'] . "',
        catatan ='" . $_POST['catatan'] . "',
        WHERE id_pelaporan ='" . $_POST['id'] . "'";
        $query_ubah = mysqli_query($con, $sql_ubah);
    }else{
        if($upload != $file)
        {
            unlink('file_data/pelaporan/' . $file);

            $sql_ubah = "UPDATE pelaporan SET
            id_tugas ='" . $_POST['tugas'] . "',
            id_petugas ='" . $_POST['petugas'] . "',
            catatan ='" . $_POST['catatan'] . "',
            file ='" . $upload . "',
            WHERE id_pelaporan ='" . $_POST['id'] . "'";
            $query_ubah = mysqli_query($con, $sql_ubah);
        }
    }

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=pelaporan'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=pelaporan'>";
    }
}

function deletePelaporan($id)
{
    global $con;

    $sql = "DELETE FROM pelaporan WHERE id_pelaporan = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=pelaporan'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=pelaporan'>";
    }
}


function registrasi()
{
    global $con;

    $date = date("Y-m-d H:i:s");
    $getid = "SELECT id_petugas, kode_petugas, nama FROM petugas WHERE kode_petugas = '". $_POST['petugas'] ."'";
    $query = mysqli_query($con, $getid);
    $row = mysqli_fetch_row($query);
    $idPetugas = $row[0];
    $kode = $row[1];
    $nama = $row[2];

    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];

    if($row == NULL){
        echo "<script>alert('Registrasi Gagal, Kode anda tidak terdaftar)</script>";
        echo "<meta http-equiv='refresh' content='0; url=sign-in.php'>";
    }else{
        if($pass != $confirm)
        {
            echo "<script>alert('Registrasi Gagal, Repassword anda tidak sesuai')</script>";
            echo "<meta http-equiv='refresh' content='0; url=sign-in.php'>";
        }else{
            $sql = "INSERT INTO `user`(`nama`, `username`, `password`, `actived`, `level`, `idPetugas`, `registered`) VALUES(
                    '" . $nama . "',
                    '" . $_POST['username'] . "',
                    '" . $_POST['password'] . "',
                    '1',
                    '1',
                    '" . $idPetugas . "',
                    '" . $date . "')";
            $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());

            if ($query_insert) {
                echo "<script>alert('Simpan Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=sign-in.php'>";
            } else {
                echo "<script>alert('Simpan Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=sign-in.php'>";
            }
        }
    }
}


function user()
{
    global $con;
    $sql = "SELECT * FROM user";
    $query = mysqli_query($con,$sql);
    return $query;
}

function insertUser()
{
    global $con;

    $date = date("Y-m-d H:i:s");
    $getid = "SELECT id_petugas, kode_petugas, nama FROM petugas WHERE id_petugas = '" . $_POST['petugas'] . "'";
    $query = mysqli_query($con, $getid);
    $row = mysqli_fetch_row($query);
    $idPetugas = $row[0];
    $kode = $row[1];
    $nama = $row[2];

    $sql = "INSERT INTO `user`(`nama`, `username`, `password`, `actived`, `level`, `idPetugas`, `registered`) VALUES(
            '" . $nama . "',
            '" . $_POST['username'] . "',
            '" . $_POST['password'] . "',
            '" . $_POST['status'] . "',
            '" . $_POST['level'] . "',
            '" . $_POST['petugas'] . "',
            '" . $date . "')";
    $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query_insert) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    }
}

function updateUser()
{
    global $con;

    $sql_ubah = "UPDATE user SET
        nama ='" . $_POST['nama'] . "',
        username ='" . $_POST['username'] . "',
        password ='" . $_POST['password'] . "',
        actived ='" . $_POST['actived'] . "',
        level ='" . $_POST['level'] . "',
        idPetugas ='" . $_POST['petugas'] . "'
        WHERE idUser ='" . $_POST['id'] . "'";
    $query_ubah = mysqli_query($con, $sql_ubah);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    }
}

function deleteUser($id)
{
    global $con;

    $sql = "DELETE FROM user WHERE idUser = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=user'>";
    }
}

function getPelaporan()
{
    global $con;
    $sql = "SELECT a.*, d.nama as petugas, b.catatan_tugas, b.keterangan, c.nm_jadwal, c.tanggal FROM pelaporan a, tugas b, jadwal c, petugas d WHERE a.id_tugas=b.id_tugas AND a.id_petugas=d.id_petugas AND b.id_jadwal=c.id_jadwal ";
    $query = mysqli_query($con, $sql);
    return $query;
}

function confirmPelaporan($id)
{
    global $con;

    $sql = "UPDATE `pelaporan` SET `status` = '1' WHERE `id_pelaporan` = '$id' ";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "<script>alert('Konfirmasi Pelaporan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=pelaporan'>";
    } else {
        echo "<script>alert('Konfirmasi Pelaporan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?v=pelaporan'>";
    }
}

function getProvinsi()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://dev.farizdotid.com/api/daerahindonesia/provinsi',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic Og=='
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true);
}

?>