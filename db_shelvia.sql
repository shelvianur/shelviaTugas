-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 06:30 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` char(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(1, '123456789', 'Shelvia Nur Widiastuti', 'shelvianurwidi@gmail.com', 'RPL', '5d6be658bbe30.png'),
(2, '123456798', 'Riska Nur Ajijah', 'kakauzman@gmail.com', 'Multimedia', '5d6be6629e7bd.png'),
(3, '123456987', 'Alya Jilan Dalilah', 'alyong@gmail.com', 'Akutansi', '5d6be66e110aa.png'),
(4, '123459876', 'Suci Siti Halimatusyadiah', 'icusee@gmail.com', 'Teknik Kimia', '5d6be67b443ed.png'),
(5, '123498765', 'Anisa Oktaviani', 'nisaaa@gmail.com', 'Akutansi', '5d6be68855849.jpg'),
(6, '13987654', 'Wahyu Andrian', 'andrianwahyu7@gmail.com', 'RPL', '5d6be69574f38.png'),
(7, '101234567', 'Kim Sohyun', 'sohyun123@gmail.com', 'Teater', '5d6be6a5c5fd6.png'),
(8, '152340987', 'Triandy Febriansyah Permana', 'triandy26@gmail.com', 'RPL', '5d6be6b3aa1b8.jpg'),
(9, '105432678', 'Maverick Vinales', 'vinalles12@gmail.com', 'Balapan', '5d6be6c49f1d2.png'),
(11, '000000001', 'Bapa kujril alias kudanil', 'kudanil@yahoo.com', 'RPL', '5d6beea52fc36.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'shelvia', '$2y$10$HlbJ.5mYFX7Oi5gseVGN/eyES4sxEEWVmtaxKjjhbaXYVPa0wBaXG'),
(2, 'sel', '$2y$10$RuONe3hZ7vyVP/QZeJdeLuYdlaovB7Z3iKFI.8Y/J3EmaiLxBMFRy'),
(4, 'aku', '$2y$10$Ds9X4BqnE4/l.7H/DLCPqOlZovdpGAX0fj/JRPUclID2yKNNv5LiW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
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
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
