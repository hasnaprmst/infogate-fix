-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 05:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infogate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankfile`
--

CREATE TABLE `bankfile` (
  `id_file` int(11) NOT NULL,
  `jenis_file` varchar(50) NOT NULL,
  `informasi_file` varchar(255) NOT NULL,
  `file_lampiran` text NOT NULL,
  `input_by` varchar(3) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `joblist`
--

CREATE TABLE `joblist` (
  `id` int(11) NOT NULL,
  `grup` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `PIC` varchar(250) NOT NULL,
  `status` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `target_time` time NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `agenda` varchar(15) NOT NULL,
  `file_lampiran` text NOT NULL,
  `file_report` text NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `input_by` varchar(3) NOT NULL,
  `report_by` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joblist`
--

INSERT INTO `joblist` (`id`, `grup`, `judul`, `deskripsi`, `PIC`, `status`, `start_date`, `end_date`, `target_time`, `kategori`, `agenda`, `file_lampiran`, `file_report`, `catatan`, `input_by`, `report_by`) VALUES
(1, 'INTERNAL', 'WEBSITE KEMENTERIAN (GOVERNMENT WEB)', '', 'IDM, HPA', 'OPEN', '2023-02-27', '2023-03-02', '09:00:00', 'TUGAS', 'AGENDA', '', '', '', 'IDM', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `initial_name` varchar(5) NOT NULL,
  `grup1` varchar(25) NOT NULL,
  `grup2` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `role`, `username`, `password`, `initial_name`, `grup1`, `grup2`) VALUES
(1, 'Ilma Dzakiah Mulia', 'Atasan', 'ilmadzm', '1234', 'IDM', 'BINALAVOTAS', 'BINWASNAKER & PHI'),
(2, 'Hasna Paramesti Ahmad', 'Atasan', 'hasnaprmst', '1234', 'HPA', 'BINALAVOTAS', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `user_ip` varbinary(16) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankfile`
--
ALTER TABLE `bankfile`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `joblist`
--
ALTER TABLE `joblist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankfile`
--
ALTER TABLE `bankfile`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joblist`
--
ALTER TABLE `joblist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
