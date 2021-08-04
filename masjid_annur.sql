-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2021 at 05:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

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
  `id` int(11) NOT NULL,
  `id_kategori` char(6) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_acara`
--

INSERT INTO `kategori_acara` (`id`, `id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(2, 'KA-001', 'Tabligh Akbar', '2021-08-04 08:31:16', '2021-08-04 08:31:16'),
(3, 'KA-002', 'Ceramah Mingguan', '2021-08-04 08:31:30', '2021-08-04 08:31:30'),
(4, 'KA-003', 'Ceramah Bulanan', '2021-08-04 08:31:43', '2021-08-04 08:31:43'),
(5, 'KA-004', 'Pengajian Mingguan', '2021-08-04 08:31:58', '2021-08-04 08:31:58'),
(6, 'KA-005', 'Pengajian Bulanan', '2021-08-04 08:32:14', '2021-08-04 08:32:14');

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
  `id` int(11) NOT NULL,
  `tanggal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_acara` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_acara`
--

INSERT INTO `tb_acara` (`id`, `tanggal`, `nama_acara`, `id_kategori`, `created_at`, `updated_at`) VALUES
(1, '2021-08-27', 'Tabligh Akbar Bersama Ustadz Abdul Somad, Lc', 2, '2021-08-04 08:42:50', '2021-08-04 08:42:50'),
(2, '2021-11-19', 'Tetaplah Berbakti Kepada Orangtua', 3, '2021-08-04 08:44:08', '2021-08-04 08:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_jadwal`
--

CREATE TABLE `tb_detail_jadwal` (
  `id` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `id_ustadz` int(11) NOT NULL,
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
(1, 2, 3, '09:00', '00:00', 'Memperingati Maulid Nabi MUhammad SAW', '2021-08-04 08:46:40', '2021-08-04 08:46:40'),
(2, 2, 3, '10:15', '11:15', 'Berbakti Kepada Orangtua', '2021-08-04 08:48:18', '2021-08-04 08:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dkm`
--

CREATE TABLE `tb_dkm` (
  `id` int(11) NOT NULL,
  `id_dkm` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_dkm`
--

INSERT INTO `tb_dkm` (`id`, `id_dkm`, `nama`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `no_telpon`, `foto`, `id_gaji`, `created_at`, `updated_at`) VALUES
(2, 'DK-001', 'Ahmad Badar', 'laki-laki', '1977-02-10', 'Jl. Dr. Sutomo No.34', '081212345543', '1628091464_download (2).jpeg', 4, '2021-08-04 08:37:44', '2021-08-04 08:37:44'),
(3, 'DK-002', 'Tiyono', 'laki-laki', '1982-06-17', 'Jl. Balam', '08563345324', '1628091549_download (3).jpeg', 5, '2021-08-04 08:39:09', '2021-08-04 08:39:09'),
(4, 'DK-003', 'Sunarsih', 'perempuan', '1971-06-18', 'Jl. Simpang Tiga No.11', '08585676554', '1628091676_download (4).jpeg', 5, '2021-08-04 08:41:16', '2021-08-04 08:41:16'),
(5, 'DK-004', 'Satpam & Parkir', 'laki-laki', '1985-06-13', 'Jl. Bunga Harum', '081212345655', '1628092519_download (5).jpeg', 5, '2021-08-04 08:55:19', '2021-08-04 08:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id` int(11) NOT NULL,
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
(3, 'GJ-001', 'Bidang \'idarah (administrasi masjid)', 1000000, '2021-08-04 08:22:08', '2021-08-04 08:29:04'),
(4, 'GJ-002', 'Bidang \'imarah (kemakmuran masjid)', 1200000, '2021-08-04 08:29:48', '2021-08-04 08:29:48'),
(5, 'GJ-003', 'Bidang Ri\'ayah (pemeliharaan fisik)', 1500000, '2021-08-04 08:30:22', '2021-08-04 08:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_katsum`
--

CREATE TABLE `tb_katsum` (
  `id` int(11) NOT NULL,
  `id_katsum` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_katsum` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_katsum`
--

INSERT INTO `tb_katsum` (`id`, `id_katsum`, `nama_katsum`, `created_at`, `updated_at`) VALUES
(2, 'KS-001', 'Anak Yatim & Piatu', '2021-08-04 08:34:19', '2021-08-04 08:34:19'),
(3, 'KS-002', 'Masjid', '2021-08-04 08:34:51', '2021-08-04 08:34:51'),
(4, 'KS-003', 'Infaq', '2021-08-04 08:35:01', '2021-08-04 08:35:01'),
(6, 'KS-005', 'Santunan Warga', '2021-08-04 08:35:43', '2021-08-04 08:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyumbang`
--

CREATE TABLE `tb_penyumbang` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_katsum` int(11) DEFAULT NULL,
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
(1, 2, 'Hamba Allah', '2021-08-20', NULL, 200000, 0, 'Pemasukan', '2021-08-04 08:48:57', '2021-08-04 08:48:57'),
(2, 2, 'Hamba Allah', '2021-08-24', NULL, 500000, 0, 'Pemasukan', '2021-08-04 08:49:19', '2021-08-04 08:49:19'),
(3, 3, 'Hamba Allah', '2021-08-27', NULL, 500000, 0, 'Pemasukan', '2021-08-04 08:49:51', '2021-08-04 08:49:51'),
(4, 4, 'Hamba Allah', '2021-08-20', NULL, 250000, 0, 'Pemasukan', '2021-08-04 08:50:10', '2021-08-04 08:50:10'),
(5, 3, 'Hamba Allah', '2021-08-27', NULL, 2000000, 0, 'Pemasukan', '2021-08-04 08:50:41', '2021-08-04 08:50:41'),
(6, 6, 'Hamba Allah', '2021-08-28', NULL, 5000000, 0, 'Pemasukan', '2021-08-04 08:50:58', '2021-08-04 08:50:58'),
(7, NULL, NULL, '2021-09-02', 'Pembelian Karpet', 0, 1500000, 'Pengeluaran', '2021-08-04 08:51:28', '2021-08-04 08:51:28'),
(8, NULL, NULL, '2021-09-03', 'Pembelian Alat Kebersihan', 0, 200000, 'Pengeluaran', '2021-08-04 08:52:01', '2021-08-04 08:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ustadz`
--

CREATE TABLE `tb_ustadz` (
  `id` int(11) NOT NULL,
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
(3, 'US-001', 'Abdul Somad, Lc', 'laki-laki', '1977-05-18', 'Jl. Jend. Sudirman No. 85', '081313601234', '1628090217_images.jpeg', '2021-08-04 08:16:57', '2021-08-04 08:16:57'),
(4, 'US-002', 'Ismail Yusanto', 'laki-laki', '1979-06-13', 'Jl. Bunga Kertas, Pekanbaru', '085371670802', '1628090334_download.jpeg', '2021-08-04 08:18:54', '2021-08-04 08:18:54'),
(5, 'US-003', 'Adi Hidayat, Lc, MA,.', 'laki-laki', '1984-09-11', 'Pandenglang', '08116745662', '1628090488_download (1).jpeg', '2021-08-04 08:21:28', '2021-08-04 08:21:28');

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
(1, 'della', 'dellaoctavvv@gmail.com', NULL, '$2y$10$je6I4iE4JsH/EhXhW.g/Uu/J9/hB6o9QpQGI7VqtPju.mjIELdjTm', NULL, '2020-07-09 07:07:15', '2021-01-22 08:12:49');

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
-- Indexes for table `tb_acara`
--
ALTER TABLE `tb_acara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkat` (`id_kategori`);

--
-- Indexes for table `tb_detail_jadwal`
--
ALTER TABLE `tb_detail_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acara` (`id_acara`),
  ADD KEY `id_ustadz` (`id_ustadz`);

--
-- Indexes for table `tb_dkm`
--
ALTER TABLE `tb_dkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gaji` (`id_gaji`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_katsum`
--
ALTER TABLE `tb_katsum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyumbang`
--
ALTER TABLE `tb_penyumbang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_katsum` (`id_katsum`);

--
-- Indexes for table `tb_ustadz`
--
ALTER TABLE `tb_ustadz`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `kategori_acara`
--
ALTER TABLE `kategori_acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_acara`
--
ALTER TABLE `tb_acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_detail_jadwal`
--
ALTER TABLE `tb_detail_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_dkm`
--
ALTER TABLE `tb_dkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_katsum`
--
ALTER TABLE `tb_katsum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penyumbang`
--
ALTER TABLE `tb_penyumbang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_saran`
--
ALTER TABLE `tb_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_ustadz`
--
ALTER TABLE `tb_ustadz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_acara`
--
ALTER TABLE `tb_acara`
  ADD CONSTRAINT `idkat` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_acara` (`id`);

--
-- Constraints for table `tb_detail_jadwal`
--
ALTER TABLE `tb_detail_jadwal`
  ADD CONSTRAINT `tb_detail_jadwal_ibfk_1` FOREIGN KEY (`id_acara`) REFERENCES `tb_acara` (`id`),
  ADD CONSTRAINT `tb_detail_jadwal_ibfk_2` FOREIGN KEY (`id_ustadz`) REFERENCES `tb_ustadz` (`id`);

--
-- Constraints for table `tb_dkm`
--
ALTER TABLE `tb_dkm`
  ADD CONSTRAINT `tb_dkm_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `tb_gaji` (`id`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_katsum`) REFERENCES `tb_katsum` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
