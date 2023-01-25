-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 05:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_paket1_2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan_perjalanan`
--

CREATE TABLE `catatan_perjalanan` (
  `id` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `waktu` varchar(128) NOT NULL,
  `lokasi` varchar(512) NOT NULL,
  `suhu_tubuh` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan_perjalanan`
--

INSERT INTO `catatan_perjalanan` (`id`, `id_user`, `tanggal`, `waktu`, `lokasi`, `suhu_tubuh`) VALUES
(1, 2, '2023-01-18', '16:08', 'bengkel', 35),
(2, 2, '2023-01-10', '13:39', 'bengkel 2', 40),
(3, 3, '2023-01-19', '14:12', 'bengkel 3', 20),
(4, 3, '2023-01-17', '13:15', 'bengkel 4', 33);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `nik` int(64) NOT NULL,
  `nama_lengkap` varchar(512) NOT NULL,
  `foto` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nik`, `nama_lengkap`, `foto`) VALUES
(2, 12345678, 'Uyiz Dofukizi', '2023-01-0709-26-52amAvatar-Profile-PNG-Picture.png'),
(3, 1111111, 'Uyiz Dofukizi 2', '2023-01-0901-56-04pm147140.png'),
(4, 222222, 'Uyiz Dofukizi 3', '2023-01-0901-56-42pmavatar-png-1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan_perjalanan`
--
ALTER TABLE `catatan_perjalanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan_perjalanan`
--
ALTER TABLE `catatan_perjalanan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
