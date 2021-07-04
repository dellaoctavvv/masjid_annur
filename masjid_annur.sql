-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 02:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masjid_annur`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_acara`
--

CREATE TABLE `kategori_acara` (
  `id` varchar(36) NOT NULL,
  `id_kategori` char(6) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_acara`
--

INSERT INTO `kategori_acara` (`id`, `id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
('4a484c72-2821-11eb-809e-68f7284907af', 'KA-001', 'Kajian', '2020-11-16 01:35:01', '2020-11-16 01:35:01'),
('aba565ea-5d00-11eb-8240-c8d9d27d1491', 'KA-002', 'Tahlil Akbar', '2021-01-22 15:25:02', '2021-01-22 15:25:02');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_10_100805_create_tb_acara', 1),
(5, '2020_07_10_101811_create_tb_detail_jadwal', 2),
(6, '2020_07_10_102522_create_tb_dkm', 2),
(7, '2020_07_10_103100_create_tb_gaji', 2),
(8, '2020_07_10_103331_create_tb_katsum', 2),
(9, '2020_07_10_103604_create_tb_penyumbang', 2),
(10, '2020_07_10_103921_create_tb_saran', 2),
(11, '2020_07_10_104848_create_tb_transaksi', 2),
(12, '2020_07_10_105300_create_tb_ustadz', 2);

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
-- Table structure for table `tb_acara`
--

CREATE TABLE `tb_acara` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_acara` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_acara`
--

INSERT INTO `tb_acara` (`id`, `tanggal`, `nama_acara`, `id_kategori`, `created_at`, `updated_at`) VALUES
('ea1a20d4-2823-11eb-89b4-68f7284907af', '2020-11-12', 'cek 2ddfd', '4a484c72-2821-11eb-809e-68f7284907af', '2020-11-16 01:53:48', '2020-11-16 02:12:37'),
('941a5ce6-2826-11eb-be14-68f7284907af', '2020-11-28', 'apa aja', '4a484c72-2821-11eb-809e-68f7284907af', '2020-11-16 02:12:52', '2020-11-16 02:12:52'),
('15d1d69c-2827-11eb-b62c-68f7284907af', '2020-11-18', 'apa aja dahh', '4a484c72-2821-11eb-809e-68f7284907af', '2020-11-16 02:16:29', '2020-11-16 02:16:29'),
('c6d82f32-5d00-11eb-9127-c8d9d27d1491', '2021-01-25', 'tahlil', 'aba565ea-5d00-11eb-8240-c8d9d27d1491', '2021-01-22 15:25:48', '2021-01-22 15:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_jadwal`
--

CREATE TABLE `tb_detail_jadwal` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_acara` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ustadz` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_selesai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_detail_jadwal`
--

INSERT INTO `tb_detail_jadwal` (`id`, `id_acara`, `id_ustadz`, `waktu_mulai`, `waktu_selesai`, `materi`, `created_at`, `updated_at`) VALUES
('66a71134-282e-11eb-b1a9-68f7284907af', '941a5ce6-2826-11eb-be14-68f7284907af', '634e77da-c5c2-11ea-8d88-c8d9d27d1491', '13:12', '13:30', 'mengisi', '2020-11-16 03:08:52', '2020-11-16 03:08:52'),
('fbc625aa-5d05-11eb-92a1-c8d9d27d1491', 'c6d82f32-5d00-11eb-9127-c8d9d27d1491', 'a6dba24c-5d03-11eb-89c8-c8d9d27d1491', '12:30', '14:00', 'menjadi manusia yang berguna', '2021-01-22 16:03:04', '2021-01-22 16:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dkm`
--

CREATE TABLE `tb_dkm` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dkm` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_gaji` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dkm`
--

INSERT INTO `tb_dkm` (`id`, `id_dkm`, `nama`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `no_telpon`, `foto`, `id_gaji`, `created_at`, `updated_at`) VALUES
('eb570baa-5d03-11eb-af11-c8d9d27d1491', 'DK-001', 'dewo', 'laki-laki', '2021-01-07', 'hijnohujbg', '123456789876', '1611355697_vc.PNG', '629bd3a8-13b7-11eb-8ac5-68f7284907af', '2021-01-22 15:48:17', '2021-01-22 15:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_gaji` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id`, `id_gaji`, `jabatan`, `nominal`, `created_at`, `updated_at`) VALUES
('c9558f1a-c5cb-11ea-8d37-c8d9d27d1491', 'GJ-001', 'Marbot', 5000, '2020-07-13 15:16:03', '2020-11-16 00:24:46'),
('dbc1793e-13af-11eb-9046-c8d9d27d1491', 'GJ-002', 'jabatan', 1000, '2020-10-20 18:12:40', '2020-10-20 18:12:40'),
('629bd3a8-13b7-11eb-8ac5-68f7284907af', 'GJ-003', 'balal', 9000, '2020-10-21 02:06:31', '2020-10-21 02:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_katsum`
--

CREATE TABLE `tb_katsum` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_katsum` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_katsum` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_katsum`
--

INSERT INTO `tb_katsum` (`id`, `id_katsum`, `nama_katsum`, `created_at`, `updated_at`) VALUES
('ea40ddf0-2832-11eb-87d4-68f7284907af', 'KS-001', 'Sumbangan', '2020-11-16 03:41:10', '2020-11-16 03:42:22'),
('0ff647ba-2833-11eb-8e04-68f7284907af', 'KS-003', 'Kenceleng', '2020-11-16 03:42:14', '2020-11-16 03:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyumbang`
--

CREATE TABLE `tb_penyumbang` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penyumbang` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penyumbang` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_saran`
--

CREATE TABLE `tb_saran` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_saran`
--

INSERT INTO `tb_saran` (`id`, `nama`, `email`, `subjek`, `pesan`, `created_at`, `updated_at`) VALUES
('167b9f3a-5ca5-11eb-ba50-c8d9d27d1491', 'della', 'dellaoctavv@gmail.com', 'cc', 'masuk aja', '2021-01-22 04:29:28', '2021-01-22 04:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_katsum` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyumbang` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` bigint(20) NOT NULL DEFAULT 0,
  `kredit` bigint(20) NOT NULL DEFAULT 0,
  `jenis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_katsum`, `penyumbang`, `tanggal`, `keterangan`, `debit`, `kredit`, `jenis`, `created_at`, `updated_at`) VALUES
('f4eafcb0-2835-11eb-aa80-68f7284907af', NULL, NULL, '2020-11-17', 'untuk beli galon', 0, 20000, 'Pengeluaran', '2020-11-16 04:02:57', '2020-11-16 04:03:10'),
('3034a128-283a-11eb-863b-68f7284907af', '0ff647ba-2833-11eb-8e04-68f7284907af', NULL, '2020-11-17', NULL, 20000, 0, 'Pemasukan', '2020-11-16 04:33:14', '2020-11-16 04:33:14'),
('958253c2-283a-11eb-8218-68f7284907af', 'ea40ddf0-2832-11eb-87d4-68f7284907af', 'abah', '2020-11-17', 'nyumbang we', 100000, 0, 'Pemasukan', '2020-11-16 04:36:04', '2020-11-16 04:36:04'),
('9a7c44de-5c90-11eb-ac91-c8d9d27d1491', 'ea40ddf0-2832-11eb-87d4-68f7284907af', 'della', '2021-01-21', 'yuhu', 500000, 0, 'Pemasukan', '2021-01-22 02:02:50', '2021-01-22 02:02:50'),
('c090a11a-5c90-11eb-9038-c8d9d27d1491', NULL, NULL, '2021-01-24', 'beli mukenah dan sarung', 0, 250000, 'Pengeluaran', '2021-01-22 02:03:54', '2021-01-22 02:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ustadz`
--

CREATE TABLE `tb_ustadz` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ustadz` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_k` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_ustadz`
--

INSERT INTO `tb_ustadz` (`id`, `id_ustadz`, `nama`, `jenis_k`, `tgl_lahir`, `alamat`, `no_telpon`, `foto`, `created_at`, `updated_at`) VALUES
('634e77da-c5c2-11ea-8d88-c8d9d27d1491', 'US-001', 'Aku budak', 'laki-laki', '2020-07-14', 'abc', '0889', '1594724930_TS.PNG', '2020-07-13 14:08:50', '2020-11-16 00:24:30'),
('7449d3ec-5d00-11eb-9c41-c8d9d27d1491', 'US-002', 'dadan', 'laki-laki', '2021-01-24', 'jkndf', '123456789824', '1611354210_pp.PNG', '2021-01-22 15:23:30', '2021-01-22 15:23:30'),
('a6dba24c-5d03-11eb-89c8-c8d9d27d1491', 'US-003', 'Ustadz Jepri', 'laki-laki', '2021-01-23', 'jdwkdw', '987654321234', '1611355583_sk.PNG', '2021-01-22 15:46:23', '2021-01-22 15:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'della', 'dellaoctavvv@gmail.com', NULL, '$2y$10$je6I4iE4JsH/EhXhW.g/Uu/J9/hB6o9QpQGI7VqtPju.mjIELdjTm', NULL, '2020-07-09 14:07:15', '2021-01-22 15:12:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_acara`
--
ALTER TABLE `kategori_acara`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb_dkm`
--
ALTER TABLE `tb_dkm`
  ADD PRIMARY KEY (`id_dkm`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_katsum`
--
ALTER TABLE `tb_katsum`
  ADD PRIMARY KEY (`id_katsum`);

--
-- Indexes for table `tb_ustadz`
--
ALTER TABLE `tb_ustadz`
  ADD PRIMARY KEY (`id_ustadz`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
