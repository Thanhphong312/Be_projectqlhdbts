-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 06:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlhdtvt`
--

-- --------------------------------------------------------

--
-- Table structure for table `co_so_ha_tang`
--

CREATE TABLE `co_so_ha_tang` (
  `CSHT_MaCSHT` varchar(255) NOT NULL,
  `CSHT_TenCSHT` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `co_so_ha_tang`
--

INSERT INTO `co_so_ha_tang` (`CSHT_MaCSHT`, `CSHT_TenCSHT`, `created_at`, `updated_at`) VALUES
('CSHT_HUG_00118', 'HUG001', NULL, NULL),
('CSHT_HUG_00119', 'HUG002', NULL, NULL),
('CSHT_HUG_00120', 'HUG003', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `don_gia`
--

CREATE TABLE `don_gia` (
  `DG_MaDG` varchar(255) NOT NULL,
  `HD_MaHD` varchar(255) NOT NULL,
  `DG_Thang` varchar(255) NOT NULL,
  `DG_Nam` varchar(255) NOT NULL,
  `DG_Gia` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_gia`
--

INSERT INTO `don_gia` (`DG_MaDG`, `HD_MaHD`, `DG_Thang`, `DG_Nam`, `DG_Gia`, `created_at`, `updated_at`) VALUES
('DG1', 'HD1', 'DG_Thang_1', 'DG_Nam_1', '12000000', NULL, NULL),
('DG2', 'HD2', 'DG_Thang_2', 'DG_Nam_2', '5000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `don_vi`
--

CREATE TABLE `don_vi` (
  `DV_MaDV` varchar(255) NOT NULL,
  `DV_TenDV` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_vi`
--

INSERT INTO `don_vi` (`DV_MaDV`, `DV_TenDV`, `created_at`, `updated_at`) VALUES
('DV1', 'TTVT1', NULL, NULL),
('DV2', 'TTVT2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dvql_tram`
--

CREATE TABLE `dvql_tram` (
  `id` int(11) NOT NULL,
  `Ten_DV` varchar(255) NOT NULL,
  `Ten_NgQL` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dvql_tram`
--

INSERT INTO `dvql_tram` (`id`, `Ten_DV`, `Ten_NgQL`, `created_at`, `updated_at`) VALUES
(1, 'DV_01', 'Trần Thanh Hòa', '2023-06-08 09:56:16', '2023-06-08 09:56:16'),
(2, 'DV_02', 'Nguyễn Chiến Thắng', '2023-06-08 09:57:16', '2023-06-08 09:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_hop_dong`
--

CREATE TABLE `file_hop_dong` (
  `F_MaFile` varchar(255) NOT NULL,
  `HD_MaHD` varchar(255) NOT NULL,
  `F_Loai` varchar(255) NOT NULL,
  `F_NgayTao` date NOT NULL,
  `F_NgaySua` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_hop_dong`
--

INSERT INTO `file_hop_dong` (`F_MaFile`, `HD_MaHD`, `F_Loai`, `F_NgayTao`, `F_NgaySua`, `created_at`, `updated_at`) VALUES
('F1', 'HD1', 'PDF', '2023-05-30', '2023-05-30', NULL, NULL),
('F2', 'HD2', 'PDF', '2023-05-31', '2023-05-31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hop_dong`
--

CREATE TABLE `hop_dong` (
  `HD_MaHD` varchar(255) NOT NULL,
  `ND_MaND` bigint(20) UNSIGNED NOT NULL,
  `T_MaTram` varchar(255) NOT NULL,
  `DV_MaDV` varchar(255) NOT NULL,
  `HD_MaCSHT` varchar(255) NOT NULL,
  `T_TenTram` varchar(255) NOT NULL,
  `HD_NgayDangKy` date NOT NULL,
  `HD_NgayHetHan` date NOT NULL,
  `HD_NgayPhuLuc` date NOT NULL,
  `HD_GiaGoc` varchar(255) NOT NULL,
  `HD_GiaHienTai` varchar(255) NOT NULL,
  `HD_SoTaiKhoan` varchar(255) NOT NULL,
  `HD_TenCTK` varchar(255) NOT NULL,
  `HD_TenNH` varchar(255) NOT NULL,
  `HD_TenChuDauTu` varchar(255) NOT NULL,
  `HD_HDScan` varchar(255) NOT NULL,
  `Nguoiky` varchar(255) NOT NULL,
  `Khachhang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hop_dong`
--

INSERT INTO `hop_dong` (`HD_MaHD`, `ND_MaND`, `T_MaTram`, `DV_MaDV`, `HD_MaCSHT`, `T_TenTram`, `HD_NgayDangKy`, `HD_NgayHetHan`, `HD_NgayPhuLuc`, `HD_GiaGoc`, `HD_GiaHienTai`, `HD_SoTaiKhoan`, `HD_TenCTK`, `HD_TenNH`, `HD_TenChuDauTu`, `HD_HDScan`, `Nguoiky`, `Khachhang`, `created_at`, `updated_at`) VALUES
('HD1', 1, 'TLM001', 'DV1', 'CSHT_HUG_00118', 'Long_Binh_HUG', '2020-07-01', '2026-06-30', '2023-06-02', '1000000', '1200000', '564654546', 'Châu Thanh Nhã', 'ACB CN Hậu Giang', 'Nguyễn Thị Huỳnh Cầm', 'HD_Scan 1', 'Trần Thị Hòa', 'Trần Thị Hòa', NULL, '2023-06-07 20:10:22'),
('HD2', 1, 'TLM001', 'DV1', 'CSHT_HUG_00118', 'Long_Binh_HUG', '2020-07-01', '2026-06-30', '2023-06-01', '1000000', '1200000', '564654546', 'Nguyễn Thị Huỳnh Cầm', 'ACB CN Hậu Giang', 'Nguyễn Thị Huỳnh Cầm', 'HD_Scan 2', 'Trần Thanh Hòa', 'Trần Thanh Hòa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_24_150331_co_so_ha_tang', 1),
(6, '2023_05_24_150415_quyen', 1),
(7, '2023_05_24_150501_don_vi', 1),
(8, '2023_05_25_010415_nguoi_dung_don_vi', 1),
(9, '2023_05_25_010740_quyen_nguoi_dung', 1),
(10, '2023_05_25_025155_tram', 1),
(11, '2023_05_25_025210_hop_dong', 1),
(12, '2023_05_25_025248_don_gia', 1),
(13, '2023_05_25_025312_file_hop_dong', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung_don_vi`
--

CREATE TABLE `nguoi_dung_don_vi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ND_MaND` bigint(20) UNSIGNED NOT NULL,
  `DV_MaDV` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dung_don_vi`
--

INSERT INTO `nguoi_dung_don_vi` (`id`, `ND_MaND`, `DV_MaDV`, `created_at`, `updated_at`) VALUES
(1, 1, 'DV1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phu_luc`
--

CREATE TABLE `phu_luc` (
  `id` int(11) NOT NULL,
  `HD_MaHD` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `nguoi_ky` int(11) NOT NULL,
  `scan_phuluc` varchar(255) NOT NULL,
  `khanghang` varchar(255) NOT NULL,
  `PL_TenNH` varchar(255) NOT NULL,
  `PL_TenCTK` varchar(255) NOT NULL,
  `PL_SoTaiKhoan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `Q_MaQ` varchar(255) NOT NULL,
  `Q_TenQ` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`Q_MaQ`, `Q_TenQ`, `created_at`, `updated_at`) VALUES
('Q0', 'Admin', NULL, NULL),
('Q1', 'Người dùng đơn vị', NULL, NULL),
('Q2', 'Người dùng quản lí', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quyen_nguoi_dung`
--

CREATE TABLE `quyen_nguoi_dung` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Q_MaQ` varchar(255) NOT NULL,
  `ND_MaND` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen_nguoi_dung`
--

INSERT INTO `quyen_nguoi_dung` (`id`, `Q_MaQ`, `ND_MaND`, `created_at`, `updated_at`) VALUES
(1, 'Q0', 1, NULL, NULL),
(2, 'Q1', 2, NULL, NULL),
(3, 'Q2', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tram`
--

CREATE TABLE `tram` (
  `T_MaTram` varchar(255) NOT NULL,
  `CSHT_MaCSHT` varchar(255) NOT NULL,
  `T_TenTram` varchar(255) NOT NULL,
  `T_DiaChiTram` varchar(255) NOT NULL,
  `T_TinhTrang` varchar(255) NOT NULL,
  `toado` text NOT NULL,
  `Ma_DVQL` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tram`
--

INSERT INTO `tram` (`T_MaTram`, `CSHT_MaCSHT`, `T_TenTram`, `T_DiaChiTram`, `T_TinhTrang`, `toado`, `Ma_DVQL`, `created_at`, `updated_at`) VALUES
('TLM001', 'CSHT_HUG_00118', 'Long_Binh_HUG', 'Long Binh_Hau Giang', '1', 'QFRP+P6 Vị Thanh, Hậu Giang, Việt Nam', 1, NULL, NULL),
('TLM002', 'CSHT_HUG_00119', 'Vi_Thuy_HUG', 'Vi Thuy_Hau Giang', '0', 'QFRP+P6 Vị Thanh, Hậu Giang, Việt Nam', 1, NULL, NULL),
('TLM003', 'CSHT_HUG_00120', 'Long_My_HUG', 'Long My_HUG', '0', 'QFRP+P6 Vị Thanh, Hậu Giang, Việt Nam', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ND_MaND` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ND_GioiTinh` varchar(255) NOT NULL,
  `ND_DiaChi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `ND_SDT` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ND_MaND`, `name`, `ND_GioiTinh`, `ND_DiaChi`, `email`, `email_verified_at`, `password`, `ND_SDT`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ND_01', 'admin', 'Nam', 'Can Tho', 'admin@gmail.com', NULL, '$2y$10$YzX7O1nQayboyc/jl7wSD.9MK7uZ2XrKJzDAB4Nx4l0ulaUDlRgQ6', '123123', 'IPhUpjCUxqzZ4HohvaBgimO8WpPDHFase0cFHxzlP0mGrh1SGP3GVR7EVVv2', '2023-05-29 19:12:57', '2023-05-29 19:12:57'),
(2, 'ND_02', 'user1', 'Nam', 'Cao Bằng', 'user1@gmail.com', NULL, '$2y$10$27MLcBUyJjaIh1bR2Y13Lex.9LzwoCq19alvSbF/38l4PQhTYknfa', '1', NULL, '2023-06-06 00:11:15', '2023-06-06 00:11:15'),
(3, 'ND_03', 'user2', 'Nu', 'Cần Thơ', 'user2@gmail.com', NULL, '$2y$10$u9DISgazlaDazCzZwzp0eOdR30gjynIiaDlV5imOojkFj23TVc4JW', '2', NULL, '2023-06-06 00:11:55', '2023-06-06 00:11:55'),
(8, 'ND_04', 'ABC', 'Nam', 'ABC', 'huynphong09@gmail.com', NULL, '$2y$10$Klq/suY3bVw0AZA88C8FPuS0vCAY6UWVO2XRQQNpcb5px5C1fE03e', '123', NULL, '2023-06-07 20:36:25', '2023-06-07 20:36:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `co_so_ha_tang`
--
ALTER TABLE `co_so_ha_tang`
  ADD PRIMARY KEY (`CSHT_MaCSHT`);

--
-- Indexes for table `don_gia`
--
ALTER TABLE `don_gia`
  ADD PRIMARY KEY (`DG_MaDG`),
  ADD KEY `don_gia_hd_mahd_foreign` (`HD_MaHD`);

--
-- Indexes for table `don_vi`
--
ALTER TABLE `don_vi`
  ADD PRIMARY KEY (`DV_MaDV`);

--
-- Indexes for table `dvql_tram`
--
ALTER TABLE `dvql_tram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_hop_dong`
--
ALTER TABLE `file_hop_dong`
  ADD PRIMARY KEY (`F_MaFile`),
  ADD KEY `file_hop_dong_hd_mahd_foreign` (`HD_MaHD`);

--
-- Indexes for table `hop_dong`
--
ALTER TABLE `hop_dong`
  ADD PRIMARY KEY (`HD_MaHD`),
  ADD KEY `hop_dong_nd_mand_foreign` (`ND_MaND`),
  ADD KEY `hop_dong_t_matram_foreign` (`T_MaTram`),
  ADD KEY `hop_dong_dv_madv_foreign` (`DV_MaDV`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dung_don_vi`
--
ALTER TABLE `nguoi_dung_don_vi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_don_vi_nd_mand_foreign` (`ND_MaND`),
  ADD KEY `nguoi_dung_don_vi_dv_madv_foreign` (`DV_MaDV`);

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
-- Indexes for table `phu_luc`
--
ALTER TABLE `phu_luc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`Q_MaQ`);

--
-- Indexes for table `quyen_nguoi_dung`
--
ALTER TABLE `quyen_nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quyen_nguoi_dung_q_maq_foreign` (`Q_MaQ`),
  ADD KEY `quyen_nguoi_dung_nd_mand_foreign` (`ND_MaND`);

--
-- Indexes for table `tram`
--
ALTER TABLE `tram`
  ADD PRIMARY KEY (`T_MaTram`),
  ADD KEY `tram_csht_macsht_foreign` (`CSHT_MaCSHT`),
  ADD KEY `tram_dvql_tram_foreign` (`Ma_DVQL`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nd_sdt_unique` (`ND_SDT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dvql_tram`
--
ALTER TABLE `dvql_tram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nguoi_dung_don_vi`
--
ALTER TABLE `nguoi_dung_don_vi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phu_luc`
--
ALTER TABLE `phu_luc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quyen_nguoi_dung`
--
ALTER TABLE `quyen_nguoi_dung`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `don_gia`
--
ALTER TABLE `don_gia`
  ADD CONSTRAINT `don_gia_hd_mahd_foreign` FOREIGN KEY (`HD_MaHD`) REFERENCES `hop_dong` (`HD_MaHD`);

--
-- Constraints for table `file_hop_dong`
--
ALTER TABLE `file_hop_dong`
  ADD CONSTRAINT `file_hop_dong_hd_mahd_foreign` FOREIGN KEY (`HD_MaHD`) REFERENCES `hop_dong` (`HD_MaHD`);

--
-- Constraints for table `hop_dong`
--
ALTER TABLE `hop_dong`
  ADD CONSTRAINT `hop_dong_dv_madv_foreign` FOREIGN KEY (`DV_MaDV`) REFERENCES `don_vi` (`DV_MaDV`),
  ADD CONSTRAINT `hop_dong_nd_mand_foreign` FOREIGN KEY (`ND_MaND`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hop_dong_t_matram_foreign` FOREIGN KEY (`T_MaTram`) REFERENCES `tram` (`T_MaTram`);

--
-- Constraints for table `nguoi_dung_don_vi`
--
ALTER TABLE `nguoi_dung_don_vi`
  ADD CONSTRAINT `nguoi_dung_don_vi_dv_madv_foreign` FOREIGN KEY (`DV_MaDV`) REFERENCES `don_vi` (`DV_MaDV`),
  ADD CONSTRAINT `nguoi_dung_don_vi_nd_mand_foreign` FOREIGN KEY (`ND_MaND`) REFERENCES `users` (`id`);

--
-- Constraints for table `quyen_nguoi_dung`
--
ALTER TABLE `quyen_nguoi_dung`
  ADD CONSTRAINT `quyen_nguoi_dung_nd_mand_foreign` FOREIGN KEY (`ND_MaND`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quyen_nguoi_dung_q_maq_foreign` FOREIGN KEY (`Q_MaQ`) REFERENCES `quyen` (`Q_MaQ`);

--
-- Constraints for table `tram`
--
ALTER TABLE `tram`
  ADD CONSTRAINT `tram_csht_macsht_foreign` FOREIGN KEY (`CSHT_MaCSHT`) REFERENCES `co_so_ha_tang` (`CSHT_MaCSHT`),
  ADD CONSTRAINT `tram_dvql_tram_foreign` FOREIGN KEY (`Ma_DVQL`) REFERENCES `dvql_tram` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
