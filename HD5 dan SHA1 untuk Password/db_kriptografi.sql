-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 04:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kriptografi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_hash`
--

CREATE TABLE `tb_hash` (
  `id_hash` int(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hash`
--

INSERT INTO `tb_hash` (`id_hash`, `nama`, `username`, `password`, `keterangan`) VALUES
(1, 'Kho Min Shee', '24c9e15e52afc47c225b757e7bee1f9d', '9461db5a7628ab258970dbb6449c3c9e', 'MD5'),
(2, 'Shi Min Nul', '7e58d63b60197ceb55a1c487989a3720', '73f60745c9dcdde2d47e2f932e836998', 'MD5'),
(3, 'Go Mi Nam', 'user3', 'Go Mi Nam', 'None'),
(4, 'Adam Jordan', '06e6eef6adf2e5f54ea6c43c376d6d36605f810e', 'b34b83f2afea6a15d01bd609b18aed12f689db2f', 'SHA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_hash`
--
ALTER TABLE `tb_hash`
  ADD PRIMARY KEY (`id_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_hash`
--
ALTER TABLE `tb_hash`
  MODIFY `id_hash` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
