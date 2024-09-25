-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2024 at 06:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2024_09_14_013343_create_m_level_table', 1),
(24, '2024_09_14_015218_create_m_kategori_table', 1),
(25, '2024_09_14_015236_create_m_supplier_table', 1),
(26, '2024_09_14_020459_create_m_user_table', 1),
(27, '2024_09_14_030723_create_m_barang_table', 1),
(28, '2024_09_14_030857_create_t_penjualan_table', 1),
(29, '2024_09_14_030918_create_t_stok_table', 1),
(31, '2024_09_14_030956_create_t_penjualan_detail_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `barang_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `barang_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 2, 'BRG1', 'Barang 1', 40951, 90560, NULL, NULL),
(2, 2, 'BRG2', 'Barang 2', 16217, 68037, NULL, NULL),
(3, 2, 'BRG3', 'Barang 3', 27940, 93297, NULL, NULL),
(4, 4, 'BRG4', 'Barang 4', 13874, 93160, NULL, NULL),
(5, 2, 'BRG5', 'Barang 5', 47666, 98674, NULL, NULL),
(6, 5, 'BRG6', 'Barang 6', 15320, 60427, NULL, NULL),
(7, 2, 'BRG7', 'Barang 7', 29443, 96774, NULL, NULL),
(8, 5, 'BRG8', 'Barang 8', 12567, 81765, NULL, NULL),
(9, 4, 'BRG9', 'Barang 9', 24793, 86328, NULL, NULL),
(10, 4, 'BRG10', 'Barang 10', 36806, 76463, NULL, NULL),
(11, 3, 'BRG11', 'Barang 11', 15701, 68971, NULL, NULL),
(12, 2, 'BRG12', 'Barang 12', 15676, 78478, NULL, NULL),
(13, 5, 'BRG13', 'Barang 13', 13007, 70478, NULL, NULL),
(14, 1, 'BRG14', 'Barang 14', 26410, 76723, NULL, NULL),
(15, 1, 'BRG15', 'Barang 15', 27080, 82758, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` bigint UNSIGNED NOT NULL,
  `kategori_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_kode`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(1, 'ELEC', 'Elektronik', NULL, NULL),
(2, 'FURN', 'Furniture', NULL, NULL),
(3, 'FOOD', 'Makanan', NULL, NULL),
(4, 'CLOT', 'Pakaian', NULL, NULL),
(5, 'BOOK', 'Buku', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `level_id` bigint UNSIGNED NOT NULL,
  `level_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`level_id`, `level_kode`, `level_nama`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrator', NULL, NULL),
(2, 'MNG', 'Manager', NULL, NULL),
(3, 'STF', 'Staff/Kasir', NULL, NULL),
(4, 'CST', 'Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `supplier_id` bigint UNSIGNED NOT NULL,
  `supplier_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`supplier_id`, `supplier_kode`, `supplier_nama`, `supplier_alamat`, `created_at`, `updated_at`) VALUES
(1, 'SUP001', 'Supplier A', 'Jl. Meangga No. 1', NULL, NULL),
(2, 'SUP002', 'Supplier B', 'Jl. Pepaya No. 2', NULL, NULL),
(3, 'SUP003', 'Supplier C', 'Jl. Timun No. 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `username`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Administrator', '$2y$12$KeoQ2dwA.U2KLusYRjXPPuP8JS2dyNxbEGiPtgcljW2tQwpPaWqj6', NULL, NULL),
(2, 2, 'manager', 'Manager', '$2y$12$MeZ/VnTqhDgKVFEDQws4NO9fRwsyZu.B.8W3M5.k93sNLvekDkPbS', NULL, NULL),
(3, 3, 'staff', 'Staff/Kasir', '$2y$12$aQlmmTZr//HstdGh.6MOJO1rvgSVvPQWEVXDsUjFAYjgiaCheyu8S', NULL, NULL),
(7, 4, 'customer-1', 'Pelanggan Pertama', '$2y$12$x/g6rBID07c638why6m75eX82T0FQCjfjXhKGe6O9Yl4guZsSEk2i', NULL, '2024-09-14 02:01:28'),
(11, 2, 'manager_dua', 'Manager 2', '$2y$12$2jwTkbJiw9dTSjnkw4GvruIWgAHrxlXdxPTFTtrEUod/bBBLikZim', '2024-09-19 10:25:05', '2024-09-19 10:25:05'),
(12, 2, 'manager22', 'Manager Dua Dua', '$2y$12$il1i3ZJpxk1BsLMwGffxMOoD7UNJJz/Jr3FSEK/XvIMN.MLwFCleS', '2024-09-19 22:39:56', '2024-09-19 22:39:56'),
(15, 2, 'manager33', 'Manager Tiga Tiga', '$2y$12$6SvD6Z7.BSS.84XYgbAejumqPzn9P.adtoiQHeaCYBdAd1FpRBHz.', '2024-09-20 00:28:32', '2024-09-20 00:28:32'),
(16, 2, 'manager56', 'Manager55', '$2y$12$WN8pmpQPDgm0HFIJz5PbzuEj7YrotukRmx2WNUrNJGMMhOQsFYHsm', '2024-09-20 00:39:38', '2024-09-20 00:39:38'),
(19, 2, 'manager12', 'Manager11', '$2y$12$pBrF46szmHT644TVrcTR0eKpv0tkbQ0m/YZ/1LMYyVh8gsSliN/ea', '2024-09-20 00:51:42', '2024-09-20 00:51:42'),
(20, 2, 'manager11', 'Manager11', '$2y$12$aldDjpK1B0NXlqvtjx/xBu/Ffd.gEMXsgUgtM3MBH/bsDTZCpU9rm', '2024-09-20 00:53:43', '2024-09-20 00:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE `t_penjualan` (
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`penjualan_id`, `user_id`, `pembeli`, `penjualan_kode`, `penjualan_tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pembeli 1', 'PNJ1', '2024-09-09 06:03:49', NULL, NULL),
(2, 1, 'Pembeli 2', 'PNJ2', '2024-09-06 06:03:49', NULL, NULL),
(3, 1, 'Pembeli 3', 'PNJ3', '2024-08-21 06:03:49', NULL, NULL),
(4, 1, 'Pembeli 4', 'PNJ4', '2024-07-25 06:03:49', NULL, NULL),
(5, 1, 'Pembeli 5', 'PNJ5', '2024-07-01 06:03:49', NULL, NULL),
(6, 1, 'Pembeli 6', 'PNJ6', '2024-06-26 06:03:49', NULL, NULL),
(7, 1, 'Pembeli 7', 'PNJ7', '2024-06-09 06:03:49', NULL, NULL),
(8, 1, 'Pembeli 8', 'PNJ8', '2024-05-23 06:03:49', NULL, NULL),
(9, 1, 'Pembeli 9', 'PNJ9', '2024-05-10 06:03:49', NULL, NULL),
(10, 1, 'Pembeli 10', 'PNJ10', '2024-04-25 06:03:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan_detail`
--

CREATE TABLE `t_penjualan_detail` (
  `detail_id` bigint UNSIGNED NOT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan_detail`
--

INSERT INTO `t_penjualan_detail` (`detail_id`, `penjualan_id`, `barang_id`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 60342, 3, NULL, NULL),
(2, 1, 6, 86860, 7, NULL, NULL),
(3, 1, 13, 93165, 4, NULL, NULL),
(4, 2, 9, 90996, 6, NULL, NULL),
(5, 2, 12, 82428, 8, NULL, NULL),
(6, 2, 10, 90872, 4, NULL, NULL),
(7, 3, 6, 66065, 8, NULL, NULL),
(8, 3, 5, 70862, 6, NULL, NULL),
(9, 3, 8, 60456, 4, NULL, NULL),
(10, 4, 12, 94209, 1, NULL, NULL),
(11, 4, 8, 72625, 7, NULL, NULL),
(12, 4, 13, 82066, 7, NULL, NULL),
(13, 5, 6, 68275, 3, NULL, NULL),
(14, 5, 2, 64768, 10, NULL, NULL),
(15, 5, 2, 99720, 6, NULL, NULL),
(16, 6, 10, 73720, 1, NULL, NULL),
(17, 6, 11, 72935, 7, NULL, NULL),
(18, 6, 2, 90244, 4, NULL, NULL),
(19, 7, 3, 68856, 10, NULL, NULL),
(20, 7, 15, 66788, 10, NULL, NULL),
(21, 7, 1, 92415, 7, NULL, NULL),
(22, 8, 1, 78374, 5, NULL, NULL),
(23, 8, 15, 68943, 8, NULL, NULL),
(24, 8, 8, 60140, 2, NULL, NULL),
(25, 9, 3, 79336, 8, NULL, NULL),
(26, 9, 3, 81557, 6, NULL, NULL),
(27, 9, 12, 83739, 8, NULL, NULL),
(28, 10, 6, 96892, 4, NULL, NULL),
(29, 10, 8, 61570, 4, NULL, NULL),
(30, 10, 5, 82250, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_stok`
--

CREATE TABLE `t_stok` (
  `stok_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `stok_tanggal` datetime NOT NULL,
  `stok_jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stok`
--

INSERT INTO `t_stok` (`stok_id`, `supplier_id`, `barang_id`, `user_id`, `stok_tanggal`, `stok_jumlah`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2024-09-12 05:57:24', 90, NULL, NULL),
(2, 3, 2, 1, '2024-08-13 05:57:24', 80, NULL, NULL),
(3, 1, 3, 1, '2024-07-15 05:57:24', 89, NULL, NULL),
(4, 2, 4, 1, '2024-06-15 05:57:24', 91, NULL, NULL),
(5, 3, 5, 1, '2024-05-19 05:57:24', 49, NULL, NULL),
(6, 1, 6, 1, '2024-05-08 05:57:24', 95, NULL, NULL),
(7, 2, 7, 1, '2024-04-24 05:57:24', 34, NULL, NULL),
(8, 3, 8, 1, '2024-04-04 05:57:24', 50, NULL, NULL),
(9, 1, 9, 1, '2024-03-10 05:57:24', 77, NULL, NULL),
(10, 2, 10, 1, '2024-02-21 05:57:24', 91, NULL, NULL),
(11, 3, 11, 1, '2024-01-23 05:57:24', 18, NULL, NULL),
(12, 1, 12, 1, '2024-01-16 05:57:24', 99, NULL, NULL),
(13, 2, 13, 1, '2023-12-21 05:57:24', 15, NULL, NULL),
(14, 3, 14, 1, '2023-11-24 05:57:24', 45, NULL, NULL),
(15, 1, 15, 1, '2023-11-19 05:57:24', 76, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD UNIQUE KEY `m_barang_barang_kode_unique` (`barang_kode`),
  ADD KEY `m_barang_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD UNIQUE KEY `m_kategori_kategori_kode_unique` (`kategori_kode`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `m_level_level_kode_unique` (`level_kode`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `m_supplier_supplier_kode_unique` (`supplier_kode`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `m_user_username_unique` (`username`),
  ADD KEY `m_user_level_id_foreign` (`level_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `t_penjualan_user_id_foreign` (`user_id`);

--
-- Indexes for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `t_penjualan_detail_penjualan_id_index` (`penjualan_id`),
  ADD KEY `t_penjualan_detail_barang_id_index` (`barang_id`);

--
-- Indexes for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `t_stok_supplier_id_index` (`supplier_id`),
  ADD KEY `t_stok_barang_id_index` (`barang_id`),
  ADD KEY `t_stok_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `barang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `supplier_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `penjualan_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  MODIFY `detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_stok`
--
ALTER TABLE `t_stok`
  MODIFY `stok_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD CONSTRAINT `m_barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`) ON DELETE CASCADE;

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD CONSTRAINT `t_penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD CONSTRAINT `t_penjualan_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_penjualan_detail_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `t_penjualan` (`penjualan_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD CONSTRAINT `t_stok_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_stok_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `m_supplier` (`supplier_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_stok_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
