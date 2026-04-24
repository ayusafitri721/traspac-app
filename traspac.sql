-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2026 at 09:08 AM
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
-- Database: `traspac`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(2, 'Kristen', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(3, 'Katolik', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(4, 'Hindu', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(5, 'Buddha', '2026-04-22 00:16:13', '2026-04-22 00:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `eselon`
--

CREATE TABLE `eselon` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eselon`
--

INSERT INTO `eselon` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'I', 'I', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(2, 'II', 'II', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(3, 'III', 'III', '2026-04-22 00:16:13', '2026-04-22 00:16:13');

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
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'IV/e', 'IV/e', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(2, 'IV/a', 'IV/a', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(3, 'III/c', 'III/c', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(4, 'III/b', 'III/b', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(5, 'II/d', 'II/d', '2026-04-22 00:16:13', '2026-04-22 00:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Direktur', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(2, 'Manager HR', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(3, 'Manager IT', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(4, 'Staff Admin', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(5, 'Staff Finance', '2026-04-22 00:16:13', '2026-04-22 00:16:13');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_01_01_000001_create_agama_table', 2),
(6, '2026_01_01_000002_create_golongan_table', 2),
(7, '2026_01_01_000003_create_eselon_table', 2),
(8, '2026_01_01_000004_create_jabatan_table', 2),
(9, '2026_01_01_000005_create_unit_kerja_table', 2),
(10, '2026_01_01_000006_create_pegawai_table', 2),
(11, '2026_01_01_000007_create_users_table', 2);

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
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_id` bigint UNSIGNED NOT NULL,
  `golongan_id` bigint UNSIGNED NOT NULL,
  `eselon_id` bigint UNSIGNED NOT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL,
  `unit_kerja_id` bigint UNSIGNED NOT NULL,
  `tempat_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `agama_id`, `golongan_id`, `eselon_id`, `jabatan_id`, `unit_kerja_id`, `tempat_tugas`, `no_hp`, `npwp`, `foto`, `created_at`, `updated_at`) VALUES
(1, '198700001', 'Pegawai 1', 'Kota 2', '2000-04-22', 'L', 'Alamat contoh 1', 2, 2, 2, 2, 2, 'Kantor Pusat', '081200000001', 'NPWP-00001', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(2, '198700002', 'Pegawai 2', 'Kota 3', '1999-04-22', 'P', 'Alamat contoh 2', 3, 3, 3, 3, 3, 'Kantor Pusat', '081200000002', 'NPWP-00002', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(3, '198700003', 'Pegawai 3', 'Kota 4', '1998-04-22', 'L', 'Alamat contoh 3', 4, 4, 1, 4, 4, 'Kantor Pusat', '081200000003', 'NPWP-00003', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(4, '198700004', 'Pegawai 4', 'Kota 5', '1997-04-22', 'P', 'Alamat contoh 4', 5, 5, 2, 5, 5, 'Kantor Pusat', '081200000004', 'NPWP-00004', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(5, '198700005', 'Pegawai 5', 'Kota 1', '1996-04-22', 'L', 'Alamat contoh 5', 1, 1, 3, 1, 1, 'Kantor Pusat', '081200000005', 'NPWP-00005', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(6, '198700006', 'Pegawai 6', 'Kota 2', '1995-04-22', 'P', 'Alamat contoh 6', 2, 2, 1, 2, 2, 'Kantor Pusat', '081200000006', 'NPWP-00006', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(7, '198700007', 'Pegawai 7', 'Kota 3', '1994-04-22', 'L', 'Alamat contoh 7', 3, 3, 2, 3, 3, 'Kantor Pusat', '081200000007', 'NPWP-00007', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(8, '198700008', 'Pegawai 8', 'Kota 4', '1993-04-22', 'P', 'Alamat contoh 8', 4, 4, 3, 4, 4, 'Kantor Pusat', '081200000008', 'NPWP-00008', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(9, '198700009', 'Pegawai 9', 'Kota 5', '1992-04-22', 'L', 'Alamat contoh 9', 5, 5, 1, 5, 5, 'Kantor Pusat', '081200000009', 'NPWP-00009', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(10, '198700010', 'Pegawai 10', 'Kota 1', '1991-04-22', 'P', 'Alamat contoh 10', 1, 1, 2, 1, 1, 'Kantor Pusat', '081200000010', 'NPWP-00010', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(11, '198700011', 'Pegawai 11', 'Kota 2', '1990-04-22', 'L', 'Alamat contoh 11', 2, 2, 3, 2, 2, 'Kantor Pusat', '081200000011', 'NPWP-00011', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(12, '198700012', 'Pegawai 12', 'Kota 3', '1989-04-22', 'P', 'Alamat contoh 12', 3, 3, 1, 3, 3, 'Kantor Pusat', '081200000012', 'NPWP-00012', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(13, '198700013', 'Pegawai 13', 'Kota 4', '1988-04-22', 'L', 'Alamat contoh 13', 4, 4, 2, 4, 4, 'Kantor Pusat', '081200000013', 'NPWP-00013', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(14, '198700014', 'Pegawai 14', 'Kota 5', '1987-04-22', 'P', 'Alamat contoh 14', 5, 5, 3, 5, 5, 'Kantor Pusat', '081200000014', 'NPWP-00014', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(15, '198700015', 'Pegawai 15', 'Kota 1', '1986-04-22', 'L', 'Alamat contoh 15', 1, 1, 1, 1, 1, 'Kantor Pusat', '081200000015', 'NPWP-00015', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(16, '198700016', 'Pegawai 16', 'Kota 2', '1985-04-22', 'P', 'Alamat contoh 16', 2, 2, 2, 2, 2, 'Kantor Pusat', '081200000016', 'NPWP-00016', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(17, '198700017', 'Pegawai 17', 'Kota 3', '1984-04-22', 'L', 'Alamat contoh 17', 3, 3, 3, 3, 3, 'Kantor Pusat', '081200000017', 'NPWP-00017', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(18, '198700018', 'Pegawai 18', 'Kota 4', '1983-04-22', 'P', 'Alamat contoh 18', 4, 4, 1, 4, 4, 'Kantor Pusat', '081200000018', 'NPWP-00018', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(19, '198700019', 'Pegawai 19', 'Kota 5', '1982-04-22', 'L', 'Alamat contoh 19', 5, 5, 2, 5, 5, 'Kantor Pusat', '081200000019', 'NPWP-00019', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(20, '198700020', 'Pegawai 20', 'Kota 1', '1981-04-22', 'P', 'Alamat contoh 20', 1, 1, 3, 1, 1, 'Kantor Pusat', '081200000020', 'NPWP-00020', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(21, '198700021', 'Pegawai 21', 'Kota 2', '1980-04-22', 'L', 'Alamat contoh 21', 2, 2, 1, 2, 2, 'Kantor Pusat', '081200000021', 'NPWP-00021', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(22, '198700022', 'Pegawai 22', 'Kota 3', '1979-04-22', 'P', 'Alamat contoh 22', 3, 3, 2, 3, 3, 'Kantor Pusat', '081200000022', 'NPWP-00022', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(23, '198700023', 'Pegawai 23', 'Kota 4', '1978-04-22', 'L', 'Alamat contoh 23', 4, 4, 3, 4, 4, 'Kantor Pusat', '081200000023', 'NPWP-00023', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(24, '198700024', 'Pegawai 24', 'Kota 5', '1977-04-22', 'P', 'Alamat contoh 24', 5, 5, 1, 5, 5, 'Kantor Pusat', '081200000024', 'NPWP-00024', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(25, '198700025', 'Pegawai 25', 'Kota 1', '1976-04-22', 'L', 'Alamat contoh 25', 1, 1, 2, 1, 1, 'Kantor Pusat', '081200000025', 'NPWP-00025', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13');

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
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Direksi', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(2, 'Human Resource', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(3, 'Information Technology', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(4, 'Finance', '2026-04-22 00:16:13', '2026-04-22 00:16:13'),
(5, 'Operasional', '2026-04-22 00:16:13', '2026-04-22 00:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'admin@traspac.local', NULL, '$2y$12$a6MsD9/nCWcjxJYgd/TJYOto.xWuk6y9RMpSnonjDO929JmJB6K1C', 'admin', NULL, '2026-04-22 00:16:13', '2026-04-22 00:16:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eselon`
--
ALTER TABLE `eselon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_nip_unique` (`nip`),
  ADD KEY `pegawai_agama_id_foreign` (`agama_id`),
  ADD KEY `pegawai_golongan_id_foreign` (`golongan_id`),
  ADD KEY `pegawai_eselon_id_foreign` (`eselon_id`),
  ADD KEY `pegawai_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `pegawai_unit_kerja_id_foreign` (`unit_kerja_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eselon`
--
ALTER TABLE `eselon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `agama` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_eselon_id_foreign` FOREIGN KEY (`eselon_id`) REFERENCES `eselon` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_golongan_id_foreign` FOREIGN KEY (`golongan_id`) REFERENCES `golongan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_unit_kerja_id_foreign` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerja` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
