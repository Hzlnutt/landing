-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 06:06 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preserve`
--

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `Id_Tiket` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Id_Transportasi` int(100) NOT NULL,
  `Total` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiket_bus`
--

CREATE TABLE `tiket_bus` (
  `Id_Transportasi` int(11) NOT NULL,
  `Jenis_Transportasi` varchar(100) NOT NULL,
  `Nama_Transportasi` varchar(50) NOT NULL,
  `Harga` varchar(10000) NOT NULL,
  `Seat` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiket_kereta`
--

CREATE TABLE `tiket_kereta` (
  `Id_Transportasi` int(11) NOT NULL,
  `Jenis_Transportasi` varchar(100) NOT NULL,
  `Nama_Transportasi` varchar(50) NOT NULL,
  `Harga` varchar(10000) NOT NULL,
  `Seat` int(100) NOT NULL,
  `Gerbong` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiket_pesawat`
--

CREATE TABLE `tiket_pesawat` (
  `Id_Transportasi` int(100) NOT NULL,
  `Jenis_Transportasi` varchar(100) NOT NULL,
  `Nama_Transportasi` varchar(50) NOT NULL,
  `Maskapai` varchar(50) NOT NULL,
  `Harga` mediumtext NOT NULL,
  `Seat` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_Login` int(100) NOT NULL,
  `name` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_Login`, `name`, `username`, `password`, `role`) VALUES
(1, 'Timothy', 'Timothy', '12345678', 'Admin'),
(2, 'Zioles', 'Zioles', '12345', 'User'),
(3, '', '', '$2y$10$H7rR.amPTF.XSgwBM9WPb.pCFHorE5htkIgbeoaX80d4MsrOwHVKu', '');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `Id_Wisata` int(100) NOT NULL,
  `Nama_Wisata` varchar(100) NOT NULL,
  `Jenis_Wisata` varchar(50) NOT NULL,
  `Lokasi_Wisata` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`Id_Tiket`);

--
-- Indexes for table `tiket_bus`
--
ALTER TABLE `tiket_bus`
  ADD PRIMARY KEY (`Id_Transportasi`);

--
-- Indexes for table `tiket_kereta`
--
ALTER TABLE `tiket_kereta`
  ADD PRIMARY KEY (`Id_Transportasi`);

--
-- Indexes for table `tiket_pesawat`
--
ALTER TABLE `tiket_pesawat`
  ADD PRIMARY KEY (`Id_Transportasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_Login`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`Id_Wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `Id_Tiket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket_bus`
--
ALTER TABLE `tiket_bus`
  MODIFY `Id_Transportasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket_kereta`
--
ALTER TABLE `tiket_kereta`
  MODIFY `Id_Transportasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket_pesawat`
--
ALTER TABLE `tiket_pesawat`
  MODIFY `Id_Transportasi` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_Login` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `Id_Wisata` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
