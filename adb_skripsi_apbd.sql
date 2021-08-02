-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 01:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adb_skripsi_apbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `belanja_desa`
--

CREATE TABLE `belanja_desa` (
  `id_belanja` int(11) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `jenis_belanja` varchar(100) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belanja_desa`
--

INSERT INTO `belanja_desa` (`id_belanja`, `tahun`, `jenis_belanja`, `jumlah`, `tanggal`) VALUES
(2, '2019', 'ego oktafanda', '900000', '2021-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `data_desa`
--

CREATE TABLE `data_desa` (
  `kodeDesa` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ibuKotaDesa` varchar(250) NOT NULL,
  `namaDesa` varchar(250) NOT NULL,
  `namaKecamatan` varchar(250) NOT NULL,
  `sebutanNamaDesa` varchar(50) NOT NULL,
  `nomorTeleponDesa` varchar(100) NOT NULL,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL,
  `logo` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_desa`
--

INSERT INTO `data_desa` (`kodeDesa`, `user_id`, `ibuKotaDesa`, `namaDesa`, `namaKecamatan`, `sebutanNamaDesa`, `nomorTeleponDesa`, `visi`, `misi`, `logo`, `status`) VALUES
('14.09.02.2028', 0, 'Jl. Utama Datuak Bandaro Lelo Budi', 'Pulau Banjar Kari', 'Kuantan Tengah', 'Desa', '0813 7844 0278', 'Menuju masyarakat Adil Makmur Sejahtera melalui Peningkatan Kualitas Sumber Daya Manusia yang Bercahaya , maju , aman dan agamis', '<ol><li>Meningkatkan Sarana dan Prasarana Pendidikan</li><li>Meningkatkan Sumber Daya Manusia</li><li>Meningkatkan Sapras Infrastruktur</li><li>Mengembangkan Usaha Kecil berbasis kelompok</li></ol>', 'assets/jpg/logo_desa/s.png', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `kodeDesa` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_belanja` int(11) NOT NULL,
  `id_pembiayaan` int(11) NOT NULL,
  `id_pendapatan` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembiayaan_desa`
--

CREATE TABLE `pembiayaan_desa` (
  `id_pembiayaan` int(11) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `jenis_pembiayaan` varchar(100) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembiayaan_desa`
--

INSERT INTO `pembiayaan_desa` (`id_pembiayaan`, `tahun`, `jenis_pembiayaan`, `jumlah`, `tanggal`) VALUES
(2, '2019', 'tete', '9999', '2021-06-26'),
(3, '2019', 'panji', '150000', '2021-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan_desa`
--

CREATE TABLE `pendapatan_desa` (
  `id_pendapatan` int(11) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `jenis_pendapatan` varchar(100) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendapatan_desa`
--

INSERT INTO `pendapatan_desa` (`id_pendapatan`, `tahun`, `jenis_pendapatan`, `jumlah`, `tanggal`) VALUES
(1, '2021', 'transfer dad', '9999', '2021-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'dooo', 'egooktafanda1097@gmail.com', 'dsdad', 0),
(3, 'panji anugrah', 'paanaj@gmail.com', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belanja_desa`
--
ALTER TABLE `belanja_desa`
  ADD PRIMARY KEY (`id_belanja`);

--
-- Indexes for table `data_desa`
--
ALTER TABLE `data_desa`
  ADD PRIMARY KEY (`kodeDesa`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `pembiayaan_desa`
--
ALTER TABLE `pembiayaan_desa`
  ADD PRIMARY KEY (`id_pembiayaan`);

--
-- Indexes for table `pendapatan_desa`
--
ALTER TABLE `pendapatan_desa`
  ADD PRIMARY KEY (`id_pendapatan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belanja_desa`
--
ALTER TABLE `belanja_desa`
  MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembiayaan_desa`
--
ALTER TABLE `pembiayaan_desa`
  MODIFY `id_pembiayaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendapatan_desa`
--
ALTER TABLE `pendapatan_desa`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
