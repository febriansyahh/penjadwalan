-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 08:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `nm_jadwal` varchar(60) NOT NULL,
  `tanggal` date NOT NULL,
  `id_rute` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelompok`, `nm_jadwal`, `tanggal`, `id_rute`, `catatan`, `tgl_input`) VALUES
(1, 1, 'KRG21Kudus', '2022-05-21', 2, 'Karangbener to Gondangmanis', '2022-05-21 03:58:00'),
(2, 1, 'DW27Kudus', '2022-06-27', 3, 'Dawe to Grobogan', '2022-06-27 06:50:01'),
(3, 3, 'KRG27Kudus', '2022-06-27', 2, 'Karangbener to Gondangmanis', '2022-06-27 06:50:35'),
(4, 3, 'DW28Kudus', '2022-06-28', 3, 'Dawe to Gebog', '2022-06-27 06:50:56'),
(5, 3, 'PAT29Pati', '2022-06-29', 4, 'Kayen to Grobogan', '2022-06-27 06:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `nama_kelompok` varchar(60) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `nama_kelompok`, `id_wilayah`, `jumlah_anggota`) VALUES
(1, 'MS 1', 1, 3),
(3, 'MS 2', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id_pelaporan` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`id_pelaporan`, `id_tugas`, `id_petugas`, `catatan`, `file`, `status`, `submitted`) VALUES
(1, 1, 1, 'ini coba', 'Pelaporan_PRT2022001_2022-05-23.pdf', 1, '2022-05-23 08:43:12'),
(2, 3, 1, 'clear', '', 0, '2022-06-27 07:07:32'),
(3, 2, 1, 'jaringan aman clear', 'Pelaporan_PRT2022001_2022-07-14.jpg', 1, '2022-07-14 06:29:57'),
(4, 7, 1, 'clear', 'Pelaporan_PRT2022001_2022-07-16.jpeg', 1, '2022-07-16 12:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `kode_petugas` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `is_gender` int(2) NOT NULL COMMENT 'gender 0 -> wanita 1 ->pria',
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `bagian` varchar(200) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT 'status aktif 0->non 1->aktif',
  `registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `kode_petugas`, `nama`, `is_gender`, `alamat`, `no_hp`, `bagian`, `id_kelompok`, `status`, `registered`) VALUES
(1, 'PRT-2022-001', 'Shodiq', 0, 'Kandangmas', '08980689478', 'leader', 1, 0, '2022-05-23 05:03:34'),
(2, 'PRT-2022-002', 'Matori Al Ikhsan', 1, 'Karangmalang', '08980689478', 'leader', 3, 1, '2022-06-27 06:36:42'),
(3, 'PRT-2022-003', 'Firmansyah', 1, 'Pati', '089649452825', 'anggota', 3, 1, '2022-06-27 06:38:37'),
(4, 'PRT-2022-004', 'Tulus', 1, 'Kaliwungu', '08976547896', 'anggota', 3, 1, '2022-06-27 06:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `rute` varchar(200) NOT NULL,
  `t_awal` varchar(200) NOT NULL,
  `t_akhir` varchar(200) NOT NULL,
  `jarak` int(11) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `rute`, `t_awal`, `t_akhir`, `jarak`, `lokasi`, `keterangan`) VALUES
(2, 'Karangbener', '14KDS035', '14KDS013', 5600, 'Karangbener to Gondangmanis', 'MS Proyek'),
(3, 'Dawe', '14KDS125', '14KDS120', 4300, 'Dawe to Gebog', ''),
(4, 'Kayen', 'DF14PAT015', 'DF14GRO010', 8500, 'Kayen to Grobogan', '');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `catatan_tugas` varchar(200) NOT NULL,
  `deadline` date DEFAULT NULL,
  `keterangan` text NOT NULL,
  `submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_petugas`, `id_wilayah`, `id_jadwal`, `catatan_tugas`, `deadline`, `keterangan`, `submitted`) VALUES
(2, 1, 1, 1, '', '2022-07-21', '', '2022-06-27 07:03:08'),
(3, 1, 6, 5, 'jaringan down kayen to grobogan', '2022-07-28', '', '2022-06-27 07:03:50'),
(4, 3, 2, 3, '', '2022-01-30', '', '2022-06-27 07:04:07'),
(5, 3, 6, 5, 'support', '2022-01-12', '', '2022-06-27 07:04:28'),
(6, 1, 6, 5, 'cek jaringan', '2022-07-22', '', '2022-06-30 04:47:04'),
(7, 1, 6, 5, 'qwertyyuioplkjhg', '2022-07-26', 'mnbvcxxzz', '2022-07-16 12:36:32'),
(8, 3, 1, 1, 'YA COBA KALI INI', '2022-07-27', 'COBA TAMBAH DEADLINE', '2022-07-21 16:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `actived` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL,
  `registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nama`, `username`, `password`, `actived`, `level`, `idPetugas`, `registered`) VALUES
(1, 'Administrator', 'admin', 'admin', 1, 0, 0, '2022-05-19 00:00:00'),
(3, 'Shodiq', 'shodiq', '123', 1, 1, 1, '2022-05-23 06:38:27'),
(4, 'Matori Al Ikhsan', 'ikhsan', '123', 1, 1, 2, '2022-06-27 07:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `maps` text NOT NULL,
  `koordinat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama`, `area`, `alamat`, `keterangan`, `maps`, `koordinat`) VALUES
(1, 'Kudus', '14KDS035', 'Karangbener Kecamatan Bae Kudus', 'Coba', '/maps/embed?pb=!1m18!1m12!1m3!1d15847.55957931713!2d110.8672131!3d-6.7832521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c52d5ac49401%3A0x98bc171685ba90ea!2sUniversitas%20Muria%20Kudus!5e0!3m2!1sid!2sid!4v1658125617051!5m2!1sid!2sid', 'g.page/muriakudus?share'),
(2, 'Kudus 2', 'DF14KDS013', 'Gang 15 Undaan Lor Kecamatan undaan', '', '', 'goo.gl/maps/Hq4TkKTKrbG7X7SWA'),
(3, 'Demak', 'DF14DMK076', 'Kuncir Kecamatan Wonosalam Kabupaten Demak', '', '', ''),
(4, 'Grobogan', 'DF14GRO030', 'Grobogan Kota', '', '', ''),
(5, 'Jepara', 'DF14JPR032', 'Mayong Kecamtan Mayong Jepara', '', '', ''),
(6, 'Pati', 'DF14PAT056', 'Kayen Kecamatan Kayen Kabupaten Pati', '', '/maps/embed?pb=!1m18!1m12!1m3!1d15847.55957931713!2d110.8672131!3d-6.7832521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c52d5ac49401%3A0x98bc171685ba90ea!2sUniversitas%20Muria%20Kudus!5e0!3m2!1sid!2sid!4v1658125617051!5m2!1sid!2sid', 'g.page/muriakudus?share');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_api`
--

CREATE TABLE `wilayah_api` (
  `id_wilayah` int(11) NOT NULL,
  `nm_wilayah` varchar(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id_pelaporan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- Indexes for table `wilayah_api`
--
ALTER TABLE `wilayah_api`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wilayah_api`
--
ALTER TABLE `wilayah_api`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
