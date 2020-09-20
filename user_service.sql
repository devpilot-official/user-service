-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2020 at 12:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Muhammed', 'Salaudeen', 'mr.salaudeen.official@gmail.com', '$2y$10$51aV0RU8t3aXpmtzucKQUu5DCizn5PnEHkM9v/d7K2IEXRdOve3Xq', '2020-09-20 21:49:13', '2020-09-20 21:49:13'),
(2, 'Muhammed', 'Salaudeen', 'salaudeen.official@gmail.com', '$2y$10$W6QP3bz/Iby0s2pw/q9d.ezXRcMLp5xFeOfRZHQSq8BLsSAdPYMu.', '2020-09-20 22:06:05', '2020-09-20 22:06:05'),
(3, 'Rafaela', 'Paucek', 'jast.frances@gottlieb.info', '$2y$10$vlHE.xiymw3fsL2A7NJwU.tzaCK40OwyrFvOfwauTjpXbVwMtePbG', '2020-09-20 22:08:13', '2020-09-20 22:08:13'),
(4, 'Arlie', 'Bernier', 'cierra64@hotmail.com', '$2y$10$bISe0EyzP2bd9MhstlpId.Y8cVYbWSa539Z1dUeVJv/qrmvg4RVhq', '2020-09-20 22:08:15', '2020-09-20 22:08:15'),
(5, 'Dagmar', 'Sipes', 'gutmann.gerardo@gmail.com', '$2y$10$KTAX4WHwLbZiKCAurZvNCudScj38sVHjaj3c6MBrcQmn6tjVqhbMG', '2020-09-20 22:08:16', '2020-09-20 22:08:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
