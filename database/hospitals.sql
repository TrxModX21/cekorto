-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2025 at 08:22 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u326823970_ortopedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `slug`, `images`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'RSUD Dr. Zainoel Abidin', 'rsud-dr-zainoel-abidin', NULL, 5.56479284, 95.33789383, '2024-11-17 15:46:39', '2024-11-17 15:46:39'),
(2, 'Rumah Sakit Umum Cempaka Lima', 'rumah-sakit-umum-cempaka-lima', NULL, 5.55257787, 95.33476929, '2025-01-08 02:05:34', '2025-01-08 02:05:34'),
(3, 'RSUD Meuraxa', 'rsud-meuraxa', NULL, 5.51834842, 95.31785119, '2025-01-08 02:08:54', '2025-01-08 02:08:54'),
(4, 'Rumah Sakit Teungku Fakinah', 'rumah-sakit-teungku-fakinah', NULL, 5.52991450, 95.30401167, '2025-01-08 02:09:55', '2025-01-08 02:10:19'),
(5, 'Rumah Sakit Bhayangkara Polda Aceh', 'rumah-sakit-bhayangkara-polda-aceh', NULL, 5.53051624, 95.29474756, '2025-01-08 02:11:15', '2025-01-08 02:11:15'),
(6, 'RSU Meutia', 'rsu-meutia', NULL, 5.55871419, 95.31759914, '2025-01-08 02:13:28', '2025-01-08 02:13:28'),
(7, 'Rumah Sakit Pertamedika Ummi Rosnati', 'rumah-sakit-pertamedika-ummi-rosnati', NULL, 5.54997323, 95.32680936, '2025-01-08 02:14:33', '2025-01-08 02:14:33'),
(8, 'Rumah Sakit Kesdam Iskandar Muda', 'rumah-sakit-kesdam-iskandar-muda', NULL, 5.55492097, 95.32458529, '2025-01-08 02:16:00', '2025-01-08 02:16:00'),
(9, 'Rumah Sakit Harapan Bunda', 'rumah-sakit-harapan-bunda', NULL, 5.54016001, 95.31005506, '2025-01-08 02:16:54', '2025-01-08 02:16:54'),
(10, 'Rumah Sakit Ibu dan Anak (RSIA) Aceh', 'rumah-sakit-ibu-dan-anak-rsia-aceh', NULL, 5.55039493, 95.31204289, '2025-01-08 02:17:44', '2025-01-08 02:17:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
