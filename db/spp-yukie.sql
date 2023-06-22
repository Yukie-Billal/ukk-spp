-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2023 at 09:55 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp-yukie`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulans`
--

CREATE TABLE `bulans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulans`
--

INSERT INTO `bulans` (`id`, `nama_bulan`, `created_at`, `updated_at`) VALUES
(1, 'Januari', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(2, 'Febuari', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(3, 'Maret', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(4, 'April', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(5, 'Mei', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(6, 'Juni', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(7, 'Juli', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(8, 'Agustus', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(9, 'September', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(10, 'Oktober', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(11, 'November', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(12, 'Desember', '2023-05-04 06:51:12', '2023-05-04 06:51:12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `exportpembayaran`
-- (See below for the actual view)
--
CREATE TABLE `exportpembayaran` (
`id` bigint unsigned
,`nama_petugas` varchar(35)
,`nisn` bigint unsigned
,`nis` varchar(10)
,`nama` varchar(35)
,`tgl_bayar` date
,`nama_bulan` varchar(255)
,`tahun_dibayar` varchar(255)
,`spp` varchar(26)
,`kelas` varchar(511)
);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetensi_keahlian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `kompetensi_keahlian`, `created_at`, `updated_at`) VALUES
(1, '10 RPL A', 'Rekayasa perangkat lunak', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(2, '10 RPL B', 'Rekayasa perangkat lunak', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(3, '10 RPL C', 'Rekayasa perangkat lunak', '2023-05-04 06:51:12', '2023-05-04 06:51:12');

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
(1, '2013_01_10_024449_create_roles_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_01_14_055638_create_bulans_table', 1),
(4, '2023_01_21_051456_create_spps_table', 1),
(5, '2023_01_21_053426_create_kelas_table', 1),
(6, '2023_01_21_053448_create_siswas_table', 1),
(7, '2023_01_21_053503_create_petugas_table', 1),
(8, '2023_01_21_064222_create_pembayarans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `pembayaran_id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED DEFAULT NULL,
  `nisn` bigint UNSIGNED NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bulan_dibayar` bigint UNSIGNED NOT NULL,
  `tahun_dibayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spp_id` bigint UNSIGNED NOT NULL,
  `jumlah_bayar` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`pembayaran_id`, `petugas_id`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `spp_id`, `jumlah_bayar`, `created_at`, `updated_at`) VALUES
(1, 2, 9602786665, '2023-05-04', 1, '2021', 1, 230000, '2023-05-04 08:10:05', '2023-05-04 08:10:05');

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
-- Stand-in structure for view `pertahun`
-- (See below for the actual view)
--
CREATE TABLE `pertahun` (
`Januari` varchar(33)
,`Februari` varchar(33)
,`Maret` varchar(33)
,`April` varchar(33)
,`Mei` varchar(33)
,`Juni` varchar(33)
,`Juli` varchar(33)
,`Agustus` varchar(33)
,`September` varchar(33)
,`Oktober` varchar(33)
,`November` varchar(33)
,`Desember` varchar(33)
,`totbulan` varchar(80)
);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` bigint UNSIGNED NOT NULL,
  `username` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `username`, `password`, `nama_petugas`, `alamat`, `no_telp`, `foto`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Petugas', '$2y$10$XmWgLzpL.yMZRkLM.6XKSezl5V9ZZWoCAZYwWx3wmZ.MJn1DZ6tQe', 'Effie Batz', '45350 Beahan Prairie Suite 623\nEast Christelle, NM 98716', '220.401.1727', NULL, 2, '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(2, 'Admin', '$2y$10$U/n.CHYQmc8Mw5hTOC0b3Oe4ZlNINxnQOH76EyCjGpJ3Ob/IJBT32', 'Dr. Aida Roob II', '318 Morar Radial\nNew Kaceychester, RI 10046', '+1-239-441-1685', NULL, 1, '2023-05-04 06:51:12', '2023-05-04 06:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `kode_role`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(2, 'Petugas', 'petugas', '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(3, 'Siswa', 'siswa', '2023-05-04 06:51:12', '2023-05-04 06:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` bigint UNSIGNED NOT NULL,
  `nis` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spp_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '3',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `alamat`, `no_telp`, `password`, `foto`, `spp_id`, `kelas_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1234567, '1', 'Yukie M Billal', '506 Edythe Tunnel\nNorth Delmer, KY 78230', '323.572.8321', '$2y$10$Uppy5BbnZqtYp0xZrQyXv.ggZiUJ5kBPf8CDgVHa6zzXlNbLv.lVO', NULL, 1, 1, 3, '2023-05-04 06:51:14', '2023-05-04 06:51:14'),
(61982307, '96253312', 'Alan Blick', '14272 Hammes Hollow Suite 736\nHadleyville, AK 39137-9302', '1-949-415-5757', '$2y$10$fqOTlGs5L/a4B5OX/QSZa.2bUXiCsLqfH66XLXL/pIxGTOJuAzI8i', NULL, 3, 1, 3, '2023-05-04 06:51:14', '2023-05-04 06:51:14'),
(2940566957, '12119043', 'Jessica Jaskolski', '29812 Erdman Gateway\nBlockshire, UT 28536-5310', '856-464-1252', '$2y$10$QLnJdB8aftQCgmTddJ455e5rnC6CWaC9lxdmvISKmDaZL/2bIzMSS', NULL, 2, 1, 3, '2023-05-04 06:51:14', '2023-05-04 06:51:14'),
(4419739006, '74526239', 'Kali Lesch', '90077 Metz Extension Suite 389\nSouth Norene, SC 36475', '+1-912-657-1565', '$2y$10$pB7V/.mskJgHJkLnni/nZuXMHnoWU0Jp63Iz9y8kcKTVOX5eRvtzO', NULL, 2, 2, 3, '2023-05-04 06:51:14', '2023-05-04 06:51:14'),
(4520360767, '08570896', 'Agustin Steuber', '209 Bahringer Spring Apt. 461\nZakaryburgh, PA 95912', '(773) 208-8958', '$2y$10$dbSG6ey1is8oq1sbyw8TIuJNO7wnPKvuKu.2mLC55jvDf8.n8/hVi', NULL, 1, 2, 3, '2023-05-04 06:51:14', '2023-05-04 06:51:14'),
(6104310247, '85904603', 'Jaiden Quitzon', '49795 Ziemann Courts\nLake Jarrell, HI 72622-7740', '+13513228536', '$2y$10$MtJ9yq/skwIajbRuNxIgeOVkFNhzX0CmisgHvEwPyrH7pgquXKMeK', NULL, 3, 2, 3, '2023-05-04 06:51:14', '2023-05-04 06:51:14'),
(6639277844, '47582503', 'Cristopher Predovic', '6240 DuBuque Neck\nWest Emeliaberg, PA 74378', '+1-386-461-2071', '$2y$10$IqlmBA.GemGwMX98/zWjseBJ2hyt/9Ms8rHka7ImzNFawFM/QEQPK', NULL, 2, 1, 3, '2023-05-04 06:51:14', '2023-05-04 06:51:14'),
(7706325052, '12947447', 'Kiana Johnston', '33557 Bria Isle\nAbernathybury, VA 35678-5682', '(854) 501-1143', '$2y$10$uw86DmCPBqCThAaS1ygNBuNSjYJPABoQoZrodxI4RjdbIPja8eiGm', NULL, 1, 1, 3, '2023-05-04 06:51:13', '2023-05-04 06:51:13'),
(8553737352, '24651216', 'Mr. Delmer Leffler Jr.', '51027 Serenity Street\nFloyfort, SD 21196-0320', '351-327-7242', '$2y$10$oo6jgyCGOw5en1DXtYFGyuuQStvOJC/dH3c/DXFlz09SJNWMxTf5G', NULL, 2, 3, 3, '2023-05-04 06:51:14', '2023-05-04 06:51:14'),
(8920081089, '28765050', 'Prof. Jaylon Spencer V', '27399 Wilmer Shoal Apt. 340\nErnserton, DE 52017-8292', '(272) 659-9585', '$2y$10$CqdlGkw4CBwcQRt06JiqX.jmMtRtYzNfpY7ymb/btGC370t64v9Yy', NULL, 3, 2, 3, '2023-05-04 06:51:13', '2023-05-04 06:51:13'),
(9602786665, '54451954', 'Isabel O\'Conner', '856 Eden Locks Apt. 938\nEast Dahliashire, LA 66451', '+1-256-455-8182', '$2y$10$lznvMoYfgxWU1LIGXdfQfe3xfvi0uF9e0.VDHDymSkwLnRV4jq.oa', NULL, 1, 1, 3, '2023-05-04 06:51:14', '2023-05-04 06:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun` int NOT NULL,
  `nominal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `tahun`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 2021, 230000, '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(2, 2020, 220000, '2023-05-04 06:51:12', '2023-05-04 06:51:12'),
(3, 2022, 230000, '2023-05-04 06:51:12', '2023-05-04 06:51:12');

-- --------------------------------------------------------

--
-- Structure for view `exportpembayaran`
--
DROP TABLE IF EXISTS `exportpembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `exportpembayaran`  AS SELECT `p`.`pembayaran_id` AS `id`, `ps`.`nama_petugas` AS `nama_petugas`, `s`.`nisn` AS `nisn`, `s`.`nis` AS `nis`, `s`.`nama` AS `nama`, `p`.`tgl_bayar` AS `tgl_bayar`, `b`.`nama_bulan` AS `nama_bulan`, `p`.`tahun_dibayar` AS `tahun_dibayar`, concat(`spp`.`tahun`,concat(' Rp.',`spp`.`nominal`)) AS `spp`, concat(`k`.`nama_kelas`,concat(' ',`k`.`kompetensi_keahlian`)) AS `kelas` FROM (((((`pembayarans` `p` join `petugas` `ps` on((`ps`.`petugas_id` = `p`.`petugas_id`))) join `siswa` `s` on((`s`.`nisn` = `p`.`nisn`))) join `bulans` `b` on((`b`.`id` = `p`.`bulan_dibayar`))) join `kelas` `k` on((`k`.`id` = `s`.`kelas_id`))) join `spp` on((`spp`.`id` = `s`.`spp_id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `pertahun`
--
DROP TABLE IF EXISTS `pertahun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pertahun`  AS SELECT ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 1) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `Januari`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 2) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `Februari`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 3) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `Maret`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 4) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `April`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 5) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `Mei`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 6) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `Juni`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 7) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `Juli`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 8) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `Agustus`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 9) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `September`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 10) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `Oktober`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 11) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `November`, ifnull((select sum(`pembayarans`.`jumlah_bayar`) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = 12) and (year(`pembayarans`.`tgl_bayar`) = year(now())))),'0') AS `Desember`, (select concat('Rp. ',format(sum(`pembayarans`.`jumlah_bayar`),0)) from `pembayarans` where ((month(`pembayarans`.`tgl_bayar`) = month(now())) and (year(`pembayarans`.`tgl_bayar`) = year(now())))) AS `totbulan``totbulan`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulans`
--
ALTER TABLE `bulans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `pembayarans_petugas_id_foreign` (`petugas_id`),
  ADD KEY `pembayarans_nisn_foreign` (`nisn`),
  ADD KEY `pembayarans_bulan_dibayar_foreign` (`bulan_dibayar`),
  ADD KEY `pembayarans_spp_id_foreign` (`spp_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`),
  ADD KEY `petugas_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`),
  ADD KEY `siswa_kelas_id_foreign` (`kelas_id`),
  ADD KEY `siswa_role_id_foreign` (`role_id`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulans`
--
ALTER TABLE `bulans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `pembayaran_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nisn` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9602786666;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_bulan_dibayar_foreign` FOREIGN KEY (`bulan_dibayar`) REFERENCES `bulans` (`id`),
  ADD CONSTRAINT `pembayarans_nisn_foreign` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayarans_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`petugas_id`),
  ADD CONSTRAINT `pembayarans_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `spp` (`id`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `siswa_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
