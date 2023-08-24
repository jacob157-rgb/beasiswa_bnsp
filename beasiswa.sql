-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2023 at 07:10 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_beasiswa`
--

CREATE TABLE `data_beasiswa` (
  `id` int NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sem` int NOT NULL,
  `ipk` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_beasiswa` enum('Akademik','Non Akademik') COLLATE utf8mb4_general_ci NOT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status_ajuan` enum('Belum di verifikasi','Sudah diverifikasi') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_beasiswa`
--

INSERT INTO `data_beasiswa` (`id`, `name`, `email`, `nohp`, `sem`, `ipk`, `jenis_beasiswa`, `berkas`, `status_ajuan`) VALUES
(1, 'ad', 'jacobjokey@gmail.com', '123412341234', 4, '340', 'Akademik', 'pdf.pdf', 'Belum di verifikasi'),
(2, 'ad', 'jacobjokey@gmail.com', '123412341234', 4, '340', 'Akademik', 'pdf.pdf', 'Belum di verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(8, 'Admin', 'admin@mail.com', '$2y$10$EmaUuTMyxNRpkNpic1uk1O.a0JoQwe.7QgRyXP3Rprd0HQNVPVojq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_beasiswa`
--
ALTER TABLE `data_beasiswa`
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
-- AUTO_INCREMENT for table `data_beasiswa`
--
ALTER TABLE `data_beasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
