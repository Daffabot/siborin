-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2021 at 09:44 AM
-- Server version: 10.3.29-MariaDB-0+deb10u1
-- PHP Version: 7.3.29-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nesas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_gambar`
--

CREATE TABLE `tabel_gambar` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_gambar`
--

INSERT INTO `tabel_gambar` (`id`, `nama_file`) VALUES
(16, '6732ade20d453.png'),
(19, '6732ade20d751.png'),
(16, '6732ade20da47.png'),
(16, '6732ade20dcee.png'),
(16, '6732b31d6ec37.png');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_music`
--

CREATE TABLE `tabel_music` (
  `id` int(11) NOT NULL,
  `file_music` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_music`
--

INSERT INTO `tabel_music` (`id`, `file_music`) VALUES
(1, 'y2mate.com - LAGU SUBANG JAWARA Cipt ARRAB CLip Pawai alegoris ultah subang 71.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_text`
--

CREATE TABLE `tabel_text` (
  `id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structrure for table `video`
--

CREATE TABLE `tabel_video` (
    `id` INT PRIMARY KEY,
    `nama_file` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(8, 'admin', '$2y$10$IKEFWs4vK3ma97njsRPrnOFR3m8/gPbHQwZePlbsJxCS09VOeMqgW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_gambar`
--
ALTER TABLE `tabel_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_music`
--
ALTER TABLE `tabel_music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_text`
--
ALTER TABLE `tabel_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_gambar`
--
ALTER TABLE `tabel_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tabel_music`
--
ALTER TABLE `tabel_music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabel_text`
--
ALTER TABLE `tabel_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tabel_video`
--
ALTER TABLE `tabel_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
