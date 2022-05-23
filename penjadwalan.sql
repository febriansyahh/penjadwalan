-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 09:18 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 1, 'jadwal satu', '2022-05-21', 2, 'ini coba', '2022-05-21 03:58:00');

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
(1, 'Kelompok satu', 1, 6);

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
(1, 1, 1, 'ini coba', 'Pelaporan_PRT2022001_2022-05-23.pdf', 1, '2022-05-23 08:43:12');

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
(1, 'PRT-2022-001', 'Yudha', 1, 'Ploso', '08980689478', 'Jaringan', 1, 1, '2022-05-23 05:03:34');

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
(2, 'Rute Pertama', 'KDS-01', 'KDS-13', 430, 'Jalan Pangeran Puger', 'Pengumuman keterangan');

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
  `keterangan` text NOT NULL,
  `submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_petugas`, `id_wilayah`, `id_jadwal`, `catatan_tugas`, `keterangan`, `submitted`) VALUES
(1, 1, 1, 1, 'coba', 'coba', '2022-05-23 06:03:21');

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
(3, 'Yudha', 'yudha', '123', 1, 1, 1, '2022-05-23 06:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama`, `area`, `alamat`, `keterangan`) VALUES
(1, 'Ploso', 'Sekitar AKBID', 'Ploso ', 'Coba');

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
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelaporan`
--
ALTER TABLE `pelaporan`
  MODIFY `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wilayah_api`
--
ALTER TABLE `wilayah_api`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
