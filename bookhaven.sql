-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2026 at 02:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookhaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Edukasi', NULL, NULL),
(2, 'Kesehatan', NULL, NULL),
(3, 'Ekonomi', NULL, NULL),
(4, 'Kuliner', NULL, NULL),
(5, 'Teknologi', NULL, NULL),
(6, 'Komik', NULL, NULL),
(7, 'Puisi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `is_checked` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `user_id`, `produk_id`, `jumlah`, `is_checked`, `created_at`, `updated_at`) VALUES
(8, 7, 4, 1, 1, '2026-04-07 06:44:28', '2026-04-07 06:54:48'),
(19, 9, 12, 1, 1, '2026-04-07 14:15:08', '2026-04-07 14:15:08');

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
(1, '2026_02_23_144820_create_users_table', 1),
(2, '2026_02_23_145621_create_kategori_table', 1),
(3, '2026_02_23_145621_create_produk_table', 1),
(4, '2026_02_23_145622_create_keranjang_table', 1),
(5, '2026_02_23_145622_create_pesanan_table', 1),
(6, '2026_02_23_145622_create_transaksi_table', 1),
(7, '2026_02_23_145623_create_ulasan_table', 1),
(8, '2026_02_23_151217_create_pesanan_detail_table', 1),
(9, '2026_02_23_162242_create_sessions_table', 1),
(10, '2026_03_20_051947_create_cache_table', 1),
(11, '2026_03_25_142203_add_is_checked_to_keranjang_table', 1),
(12, '2026_03_26_090948_alter_staff_id_nullable_in_transaksi_table', 1),
(13, '2026_04_01_162618_add_deleted_at_to_produk_table', 1),
(14, '2026_04_03_204032_add_deleted_at_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `status` enum('menunggu_verifikasi','tidak_diproses','dibatalkan_sistem','diterima') NOT NULL DEFAULT 'menunggu_verifikasi',
  `no_resi` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `metode_pembayaran` enum('QRIS','Transfer Bank') NOT NULL,
  `metode_pengiriman` enum('JNE','J&T') NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `diproses_oleh` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `total_harga`, `status`, `no_resi`, `bukti_bayar`, `metode_pembayaran`, `metode_pengiriman`, `alamat`, `no_telepon`, `diproses_oleh`, `created_at`, `updated_at`) VALUES
(1, 3, 2106101.00, 'diterima', '2445566jne', 'bukti/2EmVjioI56P6bu0Gj8yvxb5dcEiPJ4E7qLgfyNFv.jpg', 'QRIS', 'JNE', 'jalan tanah baru, depok', '0837405333', 4, '2026-04-07 06:38:49', '2026-04-07 06:42:31'),
(2, 8, 121000.00, 'diterima', '23232323', 'bukti/981dqd5fKoicFH9Cg6vaoptshYAAYcT1HqFFbXbV.jpg', 'Transfer Bank', 'JNE', 'jalan jalan', '09383794', 4, '2026-04-07 06:40:51', '2026-04-07 06:42:41'),
(3, 7, 363000.00, 'diterima', '23232323', 'bukti/fDAm8tOezdR7TeYcXu7fh4SklrqKmpcZCRFd490R.jpg', 'Transfer Bank', 'J&T', 'jalan manggis 3', '0474493', 4, '2026-04-07 06:42:06', '2026-04-07 06:42:37'),
(4, 3, 4813733.00, 'diterima', '32323233', 'bukti/H4SjAfuL4AzYpdGZe2qMajXxD8oWWmvHX8lfNieR.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok', '0837405333', 4, '2026-04-07 14:54:17', '2026-04-08 07:07:38'),
(5, 3, 121000.00, 'menunggu_verifikasi', NULL, 'bukti/jIClbA91aZ8Eekf0m4zra0MJJBLVIxa6bjVXyI3P.jpg', 'Transfer Bank', 'J&T', 'jalan tanah baru, depok', '0837405333', NULL, '2026-04-07 15:33:07', '2026-04-07 15:33:07'),
(6, 3, 676767.00, 'tidak_diproses', NULL, 'bukti/NU8ZSsAOzbqzfF3gyYx3rUjfNSxLH0NWVMg781Xu.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok', '0837405333', 4, '2026-04-07 16:29:23', '2026-04-07 16:30:21'),
(7, 3, 232110.00, 'menunggu_verifikasi', NULL, 'bukti/3CyjuVeTDh7BE61wYv1zhKbq6HhAjmGQlXoA1mB9.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok', '0837405333', NULL, '2026-04-07 17:32:05', '2026-04-07 17:32:05'),
(8, 3, 1000000.00, 'tidak_diproses', NULL, 'bukti/Co2qEIbd8PlujYE9x1w4XbM6yCMoxup9OIq4k9xg.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok', '0837405333', 4, '2026-04-07 18:50:27', '2026-04-07 21:32:20'),
(9, 3, 2121233.00, 'menunggu_verifikasi', NULL, 'bukti/m1UiCb8sqRUJW1MyoJ4jmT3MktBQ3RAHdodd5Ogd.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok.', '081388448', NULL, '2026-04-07 21:56:39', '2026-04-07 21:56:39'),
(10, 3, 676767.00, 'menunggu_verifikasi', NULL, 'bukti/7iT4Nkk8LFA4HtrjNrZgbRjnFgcyfq0ErC84XKft.jpg', 'Transfer Bank', 'JNE', 'jalan tanah baru, depok.', '081388448', NULL, '2026-04-07 22:20:32', '2026-04-07 22:20:32'),
(11, 3, 277775.00, 'tidak_diproses', NULL, 'bukti/MeRgd3kH23b6h5ClGcY5589cpcSVijKyqvObwFZe.jpg', 'QRIS', 'JNE', 'jalan tanah baru, depok.', '081388448', 4, '2026-04-07 22:36:37', '2026-04-08 01:57:39'),
(12, 3, 334334.00, 'menunggu_verifikasi', NULL, 'bukti/5DiY1X8vA2aqBo9vh2vq1nm5JEAOIuIGCXEX2pKW.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok.', '081388448', NULL, '2026-04-07 23:49:40', '2026-04-07 23:49:40'),
(13, 3, 1706672.00, 'diterima', '242444', 'bukti/TtsMcwpMSrNGcVFNvRzT4O2vYBpordvn94xi83pi.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok.', '081388448', 4, '2026-04-07 23:51:36', '2026-04-08 01:57:34'),
(14, 3, 426668.00, 'menunggu_verifikasi', NULL, 'bukti/meiQuEUrgi8SaW2BmKpB64bX8Np2AWLgQHm924QA.jpg', 'Transfer Bank', 'J&T', 'jalan tanah baru, depok.', '081388448', NULL, '2026-04-08 03:10:14', '2026-04-08 03:10:14'),
(15, 3, 676767.00, 'menunggu_verifikasi', NULL, 'bukti/gANCw8EFMyT58uRIaOrQ6MVJ3kSraoc9T10AIO0n.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok.', '081388448', NULL, '2026-04-08 07:03:29', '2026-04-08 07:03:29'),
(16, 3, 121000.00, 'menunggu_verifikasi', NULL, 'bukti/c3hDX78X9drR0HQbN4SJPndXbjIPfeYYrBHCr6DY.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok.', '081388448', NULL, '2026-04-08 07:05:07', '2026-04-08 07:05:07'),
(17, 3, 73245.00, 'diterima', '122333', 'bukti/5n5KUH0K1RSGBhfje0A61naoDG60bximMXZbHsJW.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok.', '081388448', 4, '2026-04-08 07:13:46', '2026-04-08 07:14:04'),
(18, 3, 292001.00, 'diterima', '255336', 'bukti/yjclWwUZ6aDb71u63HXWtGbu9FHNb4ZBaLkYXVC8.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok.', '081388448', 4, '2026-04-08 18:09:35', '2026-04-08 18:10:48'),
(19, 3, 334334.00, 'menunggu_verifikasi', NULL, 'bukti/eThWy4WemTpWvcz3JXl86XamzDuzwE6D1RXWLoCF.jpg', 'QRIS', 'J&T', 'jalan tanah baru, depok.', '081388448', NULL, '2026-04-09 04:31:33', '2026-04-09 04:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id`, `order_id`, `produk_id`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 121000.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(2, 1, 12, 2, 1353534.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(3, 1, 3, 1, 213334.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(4, 1, 2, 1, 95000.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(5, 1, 10, 1, 323233.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(6, 2, 4, 1, 121000.00, '2026-04-07 06:40:51', '2026-04-07 06:40:51'),
(7, 3, 4, 3, 363000.00, '2026-04-07 06:42:06', '2026-04-07 06:42:06'),
(8, 4, 4, 1, 121000.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(9, 4, 5, 1, 55555.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(10, 4, 3, 1, 213334.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(11, 4, 8, 2, 4242466.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(12, 4, 7, 1, 13133.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(13, 4, 6, 1, 50001.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(14, 4, 2, 1, 95000.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(15, 4, 9, 1, 23244.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(16, 5, 4, 1, 121000.00, '2026-04-07 15:33:07', '2026-04-07 15:33:07'),
(17, 6, 12, 1, 676767.00, '2026-04-07 16:29:23', '2026-04-07 16:29:23'),
(18, 7, 4, 1, 121000.00, '2026-04-07 17:32:05', '2026-04-07 17:32:05'),
(19, 7, 5, 2, 111110.00, '2026-04-07 17:32:05', '2026-04-07 17:32:05'),
(20, 8, 11, 1, 1000000.00, '2026-04-07 18:50:27', '2026-04-07 18:50:27'),
(21, 9, 8, 1, 2121233.00, '2026-04-07 21:56:39', '2026-04-07 21:56:39'),
(22, 10, 12, 1, 676767.00, '2026-04-07 22:20:32', '2026-04-07 22:20:32'),
(23, 11, 5, 5, 277775.00, '2026-04-07 22:36:37', '2026-04-07 22:36:37'),
(24, 12, 3, 1, 213334.00, '2026-04-07 23:49:40', '2026-04-07 23:49:40'),
(25, 12, 4, 1, 121000.00, '2026-04-07 23:49:40', '2026-04-07 23:49:40'),
(26, 13, 3, 8, 1706672.00, '2026-04-07 23:51:36', '2026-04-07 23:51:36'),
(27, 14, 3, 2, 426668.00, '2026-04-08 03:10:15', '2026-04-08 03:10:15'),
(28, 15, 12, 1, 676767.00, '2026-04-08 07:03:29', '2026-04-08 07:03:29'),
(29, 16, 4, 1, 121000.00, '2026-04-08 07:05:07', '2026-04-08 07:05:07'),
(30, 17, 6, 1, 50001.00, '2026-04-08 07:13:46', '2026-04-08 07:13:46'),
(31, 17, 9, 1, 23244.00, '2026-04-08 07:13:46', '2026-04-08 07:13:46'),
(32, 18, 4, 2, 242000.00, '2026-04-08 18:09:35', '2026-04-08 18:09:35'),
(33, 18, 6, 1, 50001.00, '2026-04-08 18:09:35', '2026-04-08 18:09:35'),
(34, 19, 3, 1, 213334.00, '2026-04-09 04:31:33', '2026-04-09 04:31:33'),
(35, 19, 4, 1, 121000.00, '2026-04-09 04:31:33', '2026-04-09 04:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `toko` varchar(255) NOT NULL DEFAULT 'BrookHaven',
  `deskripsi` text NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `staff_id`, `kategori_id`, `nama`, `penulis`, `harga`, `stok`, `toko`, `deskripsi`, `tanggal_terbit`, `bahasa`, `jumlah_halaman`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 2, 'Diet Keto', 'Keto', 120000.00, 122, 'BrookHaven', 'Diet keto berisi kumpulan informasi tips diet ala keto yang dijamin berhasil aman dan tentram', '2026-04-01', 'Indenesia', 300, 'produk/JhCKcm8cMQtx7zDIWm18NWlt0HRGUIl0QKc0ZqEE.png', '2026-04-07 06:10:04', '2026-04-07 06:10:04', NULL),
(2, 4, 2, 'Consicous Diet', 'Unkown', 95000.00, 32, 'BrookHaven', 'Diet enak dan murah, disinilah tipsnya sangat manjur :)', '2026-04-03', 'Inggris', 233, 'produk/hyS7l9Dtb3m2WBScxSrt3Cdfhvrx6jRKtPGLVonq.png', '2026-04-07 06:14:57', '2026-04-08 07:07:38', NULL),
(3, 4, 2, 'Puasa yang Benar dan Sehat', 'Unkown', 213334.00, 23, 'BrookHaven', 'halo makasih', '2026-04-02', 'Inggris', 96, 'produk/Xa7SkfDfWoNOxMeWiXK7dfduNW9o7tglTlYi79ar.png', '2026-04-07 06:16:26', '2026-04-08 07:07:38', NULL),
(4, 4, 2, 'Diet Diabetes', 'Dr.Farhan', 121000.00, 88, 'BrookHaven', 'PUNYA DIABETES TAPI TETAP INGIN MAKAN ENAK? BISA! BUKAN MIMPI, BUKAN SEKADAR HARAPAN. Selama kadar gula darah terkontrol dan pengobatan dijalani dengan disiplin, menikmati makanan lezat tetap terbuka lebar. Diabetes bukan akhir dari kenikmatan hidup. Dengan pengelolaan yang tepat, kamu tetap bisa makan dengan aman, tenang, dan penuh rasa percaya diri.\r\n\r\nBuku ini hadir untuk membantah anggapan bahwa diet diabetes itu menyiksa. Kamu akan dipandu menjalani pola hidup sehat dengan cara yang lebih ringan, menyenangkan, dan realistis. Saatnya berhenti merasa takut dan frustrasi. Rawat tubuhmu, jaga pikiran tetap positif, pilih makanan bergizi, dan buktikan bahwa hidup berkualitas tetap bisa diraih meski hidup berdampingan dengan diabetes.', '2026-04-02', 'Inggris', 678, 'produk/fccWpRxGxolpHrJTf5j85Ovyo45QWmzmu5eKynXw.png', '2026-04-07 06:18:04', '2026-04-08 18:10:48', NULL),
(5, 4, 2, 'yorobun', 'Unkown', 55555.00, 212, 'BrookHaven', 'yorobun', '2026-04-03', 'Inggris', 123, 'produk/L8qgVwZ0KMj4FZT4r6PDh3jQn36prqV4tpHHGsqg.png', '2026-04-07 06:19:02', '2026-04-08 07:07:38', NULL),
(6, 4, 2, 'Happy Kids', 'Dr.Farhan', 50001.00, 76, 'BrookHaven', 'happy happy happy', '2026-04-04', 'Indonesia', 79, 'produk/imMWnHuKw6WBcKGRJ3fUkgBPWCJyjXwAr4oGNFpm.png', '2026-04-07 06:20:14', '2026-04-08 18:10:48', NULL),
(7, 4, 5, 'roblox', 'Unkown', 13133.00, 21, 'BrookHaven', 'halo roblox', '2026-04-01', 'Inggris', 324, 'produk/0U3zUTREVmQDlmItaYLedpGrntzF4TRF7rEbMrrs.png', '2026-04-07 06:21:05', '2026-04-08 07:07:38', '2026-04-08 07:00:29'),
(8, 4, 7, 'Pak-Puk-Puk dari Ibu', 'Unkown', 2121233.00, 210, 'BrookHaven', 'halo bang pram', '2026-04-06', 'Inggris', 222, 'produk/whl55IXAH0AJeMNbfPZUWGcA4J9mfc5dwMmrc5na.png', '2026-04-07 06:22:19', '2026-04-08 17:36:40', NULL),
(9, 4, 6, 'Sense Of Self', 'Unkown', 23244.00, 321, 'BrookHaven', 'w dsdzvzbtv rgsf', '2026-04-03', 'Inggris', 323, 'produk/hAIpeA17vUTvVbimfABLcLyaHxNEda466w5PKkAA.png', '2026-04-07 06:23:27', '2026-04-08 17:38:30', NULL),
(10, 4, 1, 'Biologi', 'Dr.Farhan', 323233.00, 0, 'BrookHaven', 'eaeevrgsvsdzdS TEST', '2026-04-04', 'Inggris', 33, 'produk/EM8Uj3MZZMCm7zeklJdVPdvIwSSGlVi9YyTbta4M.png', '2026-04-07 06:24:18', '2026-04-07 06:47:26', NULL),
(11, 4, 5, 'Minecraft Guide 1', 'Mojang', 1000000.00, 23, 'BrookHaven', 'debbgbyn', '2026-04-03', 'Inggris', 22, 'produk/dUdDQBq6Jq7kiWUEQ5JOXRbW5gIu2uaJK3ecxT3b.png', '2026-04-07 06:25:06', '2026-04-08 17:35:22', NULL),
(12, 4, 5, 'Minecraft Guide 2', 'Mojang', 676767.00, 232, 'BrookHaven', 'dvzrhdr6dgng', '2026-04-01', 'Inggris', 44, 'produk/5p4xVTnZ1aKeWWqAojiGZdG0xVBI2raVd82CeM30.png', '2026-04-07 06:25:56', '2026-04-08 17:35:13', NULL),
(13, 4, 3, 'Physycology Money', 'Pejabat', 1000000.00, 0, 'BrookHaven', 'pejabat korup', '2026-04-07', 'Inggris', 111, 'produk/zB0AdHCjvxf7K9aaHNJY5iACLze3HN2eqfrqy84m.png', '2026-04-08 05:00:06', '2026-04-08 17:34:52', NULL),
(14, 4, 3, 'Akuntasi', 'Unkown', 89000.00, 13, 'BrookHaven', 'belajar mengenai autansi di buku ini', '2026-04-08', 'Inggris', 200, 'produk/i1MG7fjZyBbAV4iKTafZusb6MrIZnVxYtMEGHCx2.png', '2026-04-08 15:04:49', '2026-04-08 15:04:49', NULL),
(15, 4, 4, 'Bakulan', 'Unkown', 55998.00, 12, 'BrookHaven', 'bakulan enak dan murah tips masknya ada di buku ini :)', '2026-04-08', 'Indonesia', 120, 'produk/n0JDbIFKOc8ZO3CfuMbHIx5fwqv2Oxu5cfKL6omz.png', '2026-04-08 17:37:58', '2026-04-08 17:37:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('r0iYw4MICQaEwftDTfCKdo5BWF51xTh92xG2JbgN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnBHbVVvRmJoOUdZU0FqdmZyNjY0ckN5MjBVOHFWV3hxTldaZ0RaVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1775734321);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `order_id`, `produk_id`, `staff_id`, `user_id`, `jumlah`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, 3, 1, 121000.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(2, 1, 12, NULL, 3, 2, 1353534.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(3, 1, 3, NULL, 3, 1, 213334.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(4, 1, 2, NULL, 3, 1, 95000.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(5, 1, 10, NULL, 3, 1, 323233.00, '2026-04-07 06:38:49', '2026-04-07 06:38:49'),
(6, 2, 4, NULL, 8, 1, 121000.00, '2026-04-07 06:40:51', '2026-04-07 06:40:51'),
(7, 3, 4, NULL, 7, 3, 363000.00, '2026-04-07 06:42:06', '2026-04-07 06:42:06'),
(8, 4, 4, NULL, 3, 1, 121000.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(9, 4, 5, NULL, 3, 1, 55555.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(10, 4, 3, NULL, 3, 1, 213334.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(11, 4, 8, NULL, 3, 2, 4242466.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(12, 4, 7, NULL, 3, 1, 13133.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(13, 4, 6, NULL, 3, 1, 50001.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(14, 4, 2, NULL, 3, 1, 95000.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(15, 4, 9, NULL, 3, 1, 23244.00, '2026-04-07 14:54:17', '2026-04-07 14:54:17'),
(16, 5, 4, NULL, 3, 1, 121000.00, '2026-04-07 15:33:07', '2026-04-07 15:33:07'),
(17, 6, 12, NULL, 3, 1, 676767.00, '2026-04-07 16:29:23', '2026-04-07 16:29:23'),
(18, 7, 4, NULL, 3, 1, 121000.00, '2026-04-07 17:32:05', '2026-04-07 17:32:05'),
(19, 7, 5, NULL, 3, 2, 111110.00, '2026-04-07 17:32:05', '2026-04-07 17:32:05'),
(20, 8, 11, NULL, 3, 1, 1000000.00, '2026-04-07 18:50:27', '2026-04-07 18:50:27'),
(21, 9, 8, NULL, 3, 1, 2121233.00, '2026-04-07 21:56:39', '2026-04-07 21:56:39'),
(22, 10, 12, NULL, 3, 1, 676767.00, '2026-04-07 22:20:32', '2026-04-07 22:20:32'),
(23, 11, 5, NULL, 3, 5, 277775.00, '2026-04-07 22:36:37', '2026-04-07 22:36:37'),
(24, 12, 3, NULL, 3, 1, 213334.00, '2026-04-07 23:49:40', '2026-04-07 23:49:40'),
(25, 12, 4, NULL, 3, 1, 121000.00, '2026-04-07 23:49:40', '2026-04-07 23:49:40'),
(26, 13, 3, NULL, 3, 8, 1706672.00, '2026-04-07 23:51:36', '2026-04-07 23:51:36'),
(27, 14, 3, NULL, 3, 2, 426668.00, '2026-04-08 03:10:15', '2026-04-08 03:10:15'),
(28, 15, 12, NULL, 3, 1, 676767.00, '2026-04-08 07:03:29', '2026-04-08 07:03:29'),
(29, 16, 4, NULL, 3, 1, 121000.00, '2026-04-08 07:05:07', '2026-04-08 07:05:07'),
(30, 17, 6, NULL, 3, 1, 50001.00, '2026-04-08 07:13:46', '2026-04-08 07:13:46'),
(31, 17, 9, NULL, 3, 1, 23244.00, '2026-04-08 07:13:46', '2026-04-08 07:13:46'),
(32, 18, 4, NULL, 3, 2, 242000.00, '2026-04-08 18:09:35', '2026-04-08 18:09:35'),
(33, 18, 6, NULL, 3, 1, 50001.00, '2026-04-08 18:09:35', '2026-04-08 18:09:35'),
(34, 19, 3, NULL, 3, 1, 213334.00, '2026-04-09 04:31:33', '2026-04-09 04:31:33'),
(35, 19, 4, NULL, 3, 1, 121000.00, '2026-04-09 04:31:33', '2026-04-09 04:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `user_id`, `produk_id`, `order_id`, `rating`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 8, 4, 2, 4, 'tips dari buku ini lumayan manjur', '2026-04-07 06:43:37', '2026-04-07 06:43:37'),
(2, 7, 4, 3, 5, 'buku ini bagus dan tipsnya juga keren', '2026-04-07 06:44:19', '2026-04-07 06:44:19'),
(3, 3, 4, 1, 3, 'ok tipsnya lumayan cuman agak basic untuk diketahui ya', '2026-04-07 06:45:10', '2026-04-07 06:45:10'),
(4, 3, 10, 1, 4, 'bukunya bagus ada beberapa poin yang disampaikan sangat mudah untuk dipahami, cuman harganya terlalu mahal ya', '2026-04-08 05:59:49', '2026-04-08 05:59:49'),
(5, 3, 3, 1, 1, 'buku ini sangat tidak rekomended untuk di beli.', '2026-04-08 18:22:14', '2026-04-08 18:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','staff','admin') NOT NULL DEFAULT 'user',
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `alamat`, `no_telepon`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'user1', 'user1@gmail.com', '$2y$12$KsU2zi4sBuwy5w5H/gYNm..Y355JKgRUv4AiN8QaUa2UjshUEF.Cy', 'user', 'jalan tanah baru, depok.', '081388448', NULL, '2026-04-07 05:40:08', '2026-04-07 20:39:34', NULL),
(4, 'Staff1', 'staff1@gmail.com', '$2y$12$cDO76SMR0jn86RinldM66OvXSCvFkUiIDUreC0dYIEggto5FPlTGS', 'staff', NULL, NULL, NULL, '2026-04-07 06:00:34', '2026-04-07 06:00:34', NULL),
(5, 'Admin', 'admin1@gmail.com', '$2y$12$ZqXpbW1B7UI0Lb.ZGsBrI.L15dJ9RqMu2VIaw/c.4sfULstFJuBHS', 'admin', NULL, NULL, NULL, '2026-04-07 06:00:38', '2026-04-07 06:05:31', NULL),
(6, 'admin2', 'admin2@gmail.com', '$2y$12$d4y2YLC7cIS89x1dW0ZnY.PabM95K64fu.KrWaOFFFOj5AWceIYw6', 'admin', NULL, NULL, NULL, '2026-04-07 06:06:10', '2026-04-07 06:07:07', NULL),
(7, 'user2', 'user2@gmail.com', '$2y$12$khVMBvUUsgwl6MmM16w8j.6Cig.poAQup1tGhcz5y7tvww0bl.URS', 'user', 'jalan manggis 3', '0474493', NULL, '2026-04-07 06:39:24', '2026-04-08 17:00:58', '2026-04-08 17:00:58'),
(8, 'user3', 'user3@gmail.com', '$2y$12$7uIDAwKjE5LZgMUQLjbU3.TbBLE/MGTGXur8ZDTzvjbZKtQ4.YQV6', 'user', 'jalan jalan', '09383794', NULL, '2026-04-07 06:39:51', '2026-04-07 06:40:38', NULL),
(9, 'user4', 'user4@gmail.com', '$2y$12$bjSQ0yMCzYgUaUfhXUvXVOsO8VMbRfDnDXyyq0yzHBzYYE.Rwuw4S', 'user', NULL, NULL, NULL, '2026-04-07 14:14:47', '2026-04-07 14:14:47', NULL),
(10, 'Lan', 'lanthegreat@gmail.com', '$2y$12$AJYZ5/xsM5QBzFoXHcZwlu/ONkVjBA28hSDWRP272AkWjU/h2EzI2', 'user', NULL, NULL, NULL, '2026-04-08 17:32:43', '2026-04-08 17:32:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keranjang_user_id_produk_id_unique` (`user_id`,`produk_id`),
  ADD KEY `keranjang_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_user_id_foreign` (`user_id`),
  ADD KEY `pesanan_diproses_oleh_foreign` (`diproses_oleh`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_detail_order_id_foreign` (`order_id`),
  ADD KEY `pesanan_detail_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_staff_id_foreign` (`staff_id`),
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_order_id_foreign` (`order_id`),
  ADD KEY `transaksi_produk_id_foreign` (`produk_id`),
  ADD KEY `transaksi_staff_id_foreign` (`staff_id`),
  ADD KEY `transaksi_user_id_foreign` (`user_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasan_user_id_foreign` (`user_id`),
  ADD KEY `ulasan_produk_id_foreign` (`produk_id`),
  ADD KEY `ulasan_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_diproses_oleh_foreign` FOREIGN KEY (`diproses_oleh`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_detail_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produk_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
