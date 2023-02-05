-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 08:41 AM
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
-- Database: `police`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_peserta` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` enum('l','p') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noujian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_peserta`, `nama`, `ttl`, `tb`, `jenkel`, `alamat`, `tensi`, `noujian`, `id_user`, `created_at`, `updated_at`) VALUES
(1001, 'Indra Batara', 'Cimahi, 17 Agustus 1991', '170cm / 75kg', 'l', 'Jl.Sangkuriang no.76 Cipageran Cimahii', '120/80', 'sda987', 3, '2022-12-23 19:34:46', '2022-12-23 19:34:46'),
(1002, 'Desi Lestari', 'Cimahi, 17 Agustus 1991', '170cm / 75kg', 'p', 'Jl.Sangkuriang no.7 Cipageran Cimahi', '120/80', 's234321', 4, '2022-12-23 19:35:29', '2022-12-23 22:47:03'),
(1007, 'Denis Aji', 'Contoh, 13 Agustus 1989', '170cm / 75kg', 'l', 'Jalan Aceh 43', '120/70', 'dfr342', 9, '2023-01-01 20:28:08', '2023-01-01 20:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test1s`
--

CREATE TABLE `test1s` (
  `id_test1` bigint(20) UNSIGNED NOT NULL,
  `id_peserta` bigint(20) UNSIGNED NOT NULL,
  `putaran` bigint(20) NOT NULL,
  `jarak` bigint(20) NOT NULL,
  `gerakan` bigint(20) NOT NULL,
  `tahun` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test1s`
--

INSERT INTO `test1s` (`id_test1`, `id_peserta`, `putaran`, `jarak`, `gerakan`, `tahun`, `created_at`, `updated_at`) VALUES
(7, 1001, 23, 43, 23, 2023, '2023-01-01 17:07:11', '2023-01-01 17:07:11'),
(8, 1001, 43, 23, 44, 2023, '2023-01-01 17:09:07', '2023-01-01 17:09:07'),
(9, 1002, 45, 34, 23, 2023, '2023-01-01 20:14:09', '2023-01-01 20:14:09'),
(10, 1002, 67, 45, 34, 2023, '2023-01-01 20:14:16', '2023-01-01 20:14:16'),
(13, 1007, 45, 34, 23, 2023, '2023-01-01 20:28:31', '2023-01-01 20:28:31'),
(14, 1007, 56, 45, 56, 2023, '2023-01-01 20:28:39', '2023-01-01 20:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `test2s`
--

CREATE TABLE `test2s` (
  `id_test2` bigint(20) UNSIGNED NOT NULL,
  `id_peserta` bigint(20) UNSIGNED NOT NULL,
  `item` enum('b1','b2','b3','b4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hgb` bigint(20) NOT NULL,
  `ngb` bigint(20) NOT NULL,
  `tahun` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test2s`
--

INSERT INTO `test2s` (`id_test2`, `id_peserta`, `item`, `hgb`, `ngb`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 1001, 'b1', 34, 54, 2023, '2022-12-31 04:48:46', '2022-12-31 04:48:46'),
(2, 1001, 'b2', 76, 56, 2023, '2022-12-31 04:50:59', '2022-12-31 04:50:59'),
(3, 1001, 'b3', 88, 34, 2023, '2022-12-31 04:51:10', '2022-12-31 04:51:10'),
(4, 1001, 'b4', 77, 34, 2023, '2022-12-31 04:51:18', '2022-12-31 04:51:18'),
(6, 1001, 'b1', 34, 54, 2023, '2023-01-01 17:27:59', '2023-01-01 17:27:59'),
(10, 1007, 'b1', 34, 45, 2023, '2023-01-01 20:29:01', '2023-01-01 20:29:01'),
(11, 1007, 'b1', 45, 67, 2023, '2023-01-01 20:29:09', '2023-01-01 20:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$TdLmZwqa3ma5nPEZHIRwxexO3FXe5Nw9/i5soNJmfS7a8qcgH6AD.', 'admin', NULL, NULL, NULL),
(3, 'sda987', '$2y$10$a5Fjx2FSSi.i1iVR6mxK4u4ccKljzYJ28T4PZe2165MdkbS9/3e8q', 'peserta', NULL, '2022-12-23 19:34:46', '2022-12-23 19:34:46'),
(4, 's234321', '$2y$10$89lkNBtiW4zB0byUWlaaNuHG7tVJvJym6MuWvd7N9U8qri8G7onJC', 'peserta', NULL, '2022-12-23 19:35:29', '2022-12-23 19:35:29'),
(9, 'dfr342', '$2y$10$MSAcETaz8Tg..HHBmrgG4uXfv76IBI63oiF0H/.RH22TCEq4AJW9G', 'peserta', NULL, '2023-01-01 20:28:08', '2023-01-01 20:28:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `test1s`
--
ALTER TABLE `test1s`
  ADD PRIMARY KEY (`id_test1`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `test2s`
--
ALTER TABLE `test2s`
  ADD PRIMARY KEY (`id_test2`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_peserta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test1s`
--
ALTER TABLE `test1s`
  MODIFY `id_test1` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `test2s`
--
ALTER TABLE `test2s`
  MODIFY `id_test2` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test1s`
--
ALTER TABLE `test1s`
  ADD CONSTRAINT `test1s_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `members` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test2s`
--
ALTER TABLE `test2s`
  ADD CONSTRAINT `test2s_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `members` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
