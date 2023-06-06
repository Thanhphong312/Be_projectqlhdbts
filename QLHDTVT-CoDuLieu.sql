-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 06, 2023 lúc 10:54 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlhdtvt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `co_so_ha_tang`
--

CREATE TABLE `co_so_ha_tang` (
  `CSHT_MaCSHT` varchar(255) NOT NULL,
  `CSHT_TenCSHT` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `co_so_ha_tang`
--

INSERT INTO `co_so_ha_tang` (`CSHT_MaCSHT`, `CSHT_TenCSHT`, `created_at`, `updated_at`) VALUES
('CSHT_HUG_00118', 'HUG001', NULL, NULL),
('CSHT_HUG_00119', 'HUG002', NULL, NULL),
('CSHT_HUG_00120', 'HUG003', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_gia`
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
-- Đang đổ dữ liệu cho bảng `don_gia`
--

INSERT INTO `don_gia` (`DG_MaDG`, `HD_MaHD`, `DG_Thang`, `DG_Nam`, `DG_Gia`, `created_at`, `updated_at`) VALUES
('DG1', 'HD1', 'DG_Thang_1', 'DG_Nam_1', '12000000', NULL, NULL),
('DG2', 'HD2', 'DG_Thang_2', 'DG_Nam_2', '5000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_vi`
--

CREATE TABLE `don_vi` (
  `DV_MaDV` varchar(255) NOT NULL,
  `DV_TenDV` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_vi`
--

INSERT INTO `don_vi` (`DV_MaDV`, `DV_TenDV`, `created_at`, `updated_at`) VALUES
('DV1', 'TTVT1', NULL, NULL),
('DV2', 'TTVT2', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `file_hop_dong`
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
-- Đang đổ dữ liệu cho bảng `file_hop_dong`
--

INSERT INTO `file_hop_dong` (`F_MaFile`, `HD_MaHD`, `F_Loai`, `F_NgayTao`, `F_NgaySua`, `created_at`, `updated_at`) VALUES
('F1', 'HD1', 'PDF', '2023-05-30', '2023-05-30', NULL, NULL),
('F2', 'HD2', 'PDF', '2023-05-31', '2023-05-31', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hop_dong`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hop_dong`
--

INSERT INTO `hop_dong` (`HD_MaHD`, `ND_MaND`, `T_MaTram`, `DV_MaDV`, `HD_MaCSHT`, `T_TenTram`, `HD_NgayDangKy`, `HD_NgayHetHan`, `HD_NgayPhuLuc`, `HD_GiaGoc`, `HD_GiaHienTai`, `HD_SoTaiKhoan`, `HD_TenCTK`, `HD_TenNH`, `HD_TenChuDauTu`, `HD_HDScan`, `created_at`, `updated_at`) VALUES
('HD1', 1, 'TLM001', 'DV1', 'CSHT_HUG_00118', 'Long_Binh_HUG', '2020-07-01', '2026-06-30', '2023-06-01', '1000000', '1200000', '564654546', 'Nguyễn Thị Huỳnh Cầm', 'ACB CN Hậu Giang', 'Nguyễn Thị Huỳnh Cầm', 'HD_Scan 1', NULL, NULL),
('HD2', 1, 'TLM001', 'DV1', 'CSHT_HUG_00118', 'Long_Binh_HUG', '2020-07-01', '2026-06-30', '2023-06-01', '1000000', '1200000', '564654546', 'Nguyễn Thị Huỳnh Cầm', 'ACB CN Hậu Giang', 'Nguyễn Thị Huỳnh Cầm', 'HD_Scan 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
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
-- Cấu trúc bảng cho bảng `nguoi_dung_don_vi`
--

CREATE TABLE `nguoi_dung_don_vi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ND_MaND` bigint(20) UNSIGNED NOT NULL,
  `DV_MaDV` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung_don_vi`
--

INSERT INTO `nguoi_dung_don_vi` (`id`, `ND_MaND`, `DV_MaDV`, `created_at`, `updated_at`) VALUES
(1, 1, 'DV1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `Q_MaQ` varchar(255) NOT NULL,
  `Q_TenQ` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`Q_MaQ`, `Q_TenQ`, `created_at`, `updated_at`) VALUES
('Q0', 'Admin', NULL, NULL),
('Q1', 'View-Import-Export', NULL, NULL),
('Q2', 'View-Export', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen_nguoi_dung`
--

CREATE TABLE `quyen_nguoi_dung` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Q_MaQ` varchar(255) NOT NULL,
  `ND_MaND` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen_nguoi_dung`
--

INSERT INTO `quyen_nguoi_dung` (`id`, `Q_MaQ`, `ND_MaND`, `created_at`, `updated_at`) VALUES
(1, 'Q1', 7, NULL, NULL),
(3, 'Q0', 1, NULL, NULL),
(4, 'Q2', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tram`
--

CREATE TABLE `tram` (
  `T_MaTram` varchar(255) NOT NULL,
  `CSHT_MaCSHT` varchar(255) NOT NULL,
  `T_TenTram` varchar(255) NOT NULL,
  `T_DiaChiTram` varchar(255) NOT NULL,
  `T_TinhTrang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tram`
--

INSERT INTO `tram` (`T_MaTram`, `CSHT_MaCSHT`, `T_TenTram`, `T_DiaChiTram`, `T_TinhTrang`, `created_at`, `updated_at`) VALUES
('TLM001', 'CSHT_HUG_00118', 'Long_Binh_HUG', 'Long Binh_Hau Giang', '1', NULL, NULL),
('TLM002', 'CSHT_HUG_00119', 'Vi_Thuy_HUG', 'Vi Thuy_Hau Giang', '0', NULL, NULL),
('TLM003', 'CSHT_HUG_00120', 'Long_My_HUG', 'Long My_HUG', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
  `ND_LoaiND` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ND_MaND`, `name`, `ND_GioiTinh`, `ND_DiaChi`, `email`, `email_verified_at`, `password`, `ND_SDT`, `ND_LoaiND`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ND_01', 'admin', 'Nam', 'Can Tho', 'admin@gmail.com', NULL, '$2y$10$YzX7O1nQayboyc/jl7wSD.9MK7uZ2XrKJzDAB4Nx4l0ulaUDlRgQ6', '123123', '', 'nUtvGelEltGAQuT5wkinuN7Y5hDrLQhKcKC12rJidnZhPXotrs0wvgr1hg1l', '2023-05-29 19:12:57', '2023-05-29 19:12:57'),
(6, 'ND_02', 'user1', 'Nam', 'Cao Bằng', 'user1@gmail.com', NULL, '$2y$10$27MLcBUyJjaIh1bR2Y13Lex.9LzwoCq19alvSbF/38l4PQhTYknfa', '1', '2', NULL, '2023-06-06 00:11:15', '2023-06-06 00:11:15'),
(7, 'ND_03', 'user2', 'Nu', 'Cần Thơ', 'user2@gmail.com', NULL, '$2y$10$u9DISgazlaDazCzZwzp0eOdR30gjynIiaDlV5imOojkFj23TVc4JW', '2', '1', NULL, '2023-06-06 00:11:55', '2023-06-06 00:11:55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `co_so_ha_tang`
--
ALTER TABLE `co_so_ha_tang`
  ADD PRIMARY KEY (`CSHT_MaCSHT`);

--
-- Chỉ mục cho bảng `don_gia`
--
ALTER TABLE `don_gia`
  ADD PRIMARY KEY (`DG_MaDG`),
  ADD KEY `don_gia_hd_mahd_foreign` (`HD_MaHD`);

--
-- Chỉ mục cho bảng `don_vi`
--
ALTER TABLE `don_vi`
  ADD PRIMARY KEY (`DV_MaDV`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `file_hop_dong`
--
ALTER TABLE `file_hop_dong`
  ADD PRIMARY KEY (`F_MaFile`),
  ADD KEY `file_hop_dong_hd_mahd_foreign` (`HD_MaHD`);

--
-- Chỉ mục cho bảng `hop_dong`
--
ALTER TABLE `hop_dong`
  ADD PRIMARY KEY (`HD_MaHD`),
  ADD KEY `hop_dong_nd_mand_foreign` (`ND_MaND`),
  ADD KEY `hop_dong_t_matram_foreign` (`T_MaTram`),
  ADD KEY `hop_dong_dv_madv_foreign` (`DV_MaDV`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dung_don_vi`
--
ALTER TABLE `nguoi_dung_don_vi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_don_vi_nd_mand_foreign` (`ND_MaND`),
  ADD KEY `nguoi_dung_don_vi_dv_madv_foreign` (`DV_MaDV`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`Q_MaQ`);

--
-- Chỉ mục cho bảng `quyen_nguoi_dung`
--
ALTER TABLE `quyen_nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quyen_nguoi_dung_q_maq_foreign` (`Q_MaQ`),
  ADD KEY `quyen_nguoi_dung_nd_mand_foreign` (`ND_MaND`);

--
-- Chỉ mục cho bảng `tram`
--
ALTER TABLE `tram`
  ADD PRIMARY KEY (`T_MaTram`),
  ADD KEY `tram_csht_macsht_foreign` (`CSHT_MaCSHT`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nd_sdt_unique` (`ND_SDT`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung_don_vi`
--
ALTER TABLE `nguoi_dung_don_vi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quyen_nguoi_dung`
--
ALTER TABLE `quyen_nguoi_dung`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `don_gia`
--
ALTER TABLE `don_gia`
  ADD CONSTRAINT `don_gia_hd_mahd_foreign` FOREIGN KEY (`HD_MaHD`) REFERENCES `hop_dong` (`HD_MaHD`);

--
-- Các ràng buộc cho bảng `file_hop_dong`
--
ALTER TABLE `file_hop_dong`
  ADD CONSTRAINT `file_hop_dong_hd_mahd_foreign` FOREIGN KEY (`HD_MaHD`) REFERENCES `hop_dong` (`HD_MaHD`);

--
-- Các ràng buộc cho bảng `hop_dong`
--
ALTER TABLE `hop_dong`
  ADD CONSTRAINT `hop_dong_dv_madv_foreign` FOREIGN KEY (`DV_MaDV`) REFERENCES `don_vi` (`DV_MaDV`),
  ADD CONSTRAINT `hop_dong_nd_mand_foreign` FOREIGN KEY (`ND_MaND`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hop_dong_t_matram_foreign` FOREIGN KEY (`T_MaTram`) REFERENCES `tram` (`T_MaTram`);

--
-- Các ràng buộc cho bảng `nguoi_dung_don_vi`
--
ALTER TABLE `nguoi_dung_don_vi`
  ADD CONSTRAINT `nguoi_dung_don_vi_dv_madv_foreign` FOREIGN KEY (`DV_MaDV`) REFERENCES `don_vi` (`DV_MaDV`),
  ADD CONSTRAINT `nguoi_dung_don_vi_nd_mand_foreign` FOREIGN KEY (`ND_MaND`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `quyen_nguoi_dung`
--
ALTER TABLE `quyen_nguoi_dung`
  ADD CONSTRAINT `quyen_nguoi_dung_nd_mand_foreign` FOREIGN KEY (`ND_MaND`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quyen_nguoi_dung_q_maq_foreign` FOREIGN KEY (`Q_MaQ`) REFERENCES `quyen` (`Q_MaQ`);

--
-- Các ràng buộc cho bảng `tram`
--
ALTER TABLE `tram`
  ADD CONSTRAINT `tram_csht_macsht_foreign` FOREIGN KEY (`CSHT_MaCSHT`) REFERENCES `co_so_ha_tang` (`CSHT_MaCSHT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
