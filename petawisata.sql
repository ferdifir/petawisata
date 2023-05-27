-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2022 at 01:31 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petawisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Wisata Alam', NULL, NULL),
(2, 'Wisata Bahari', NULL, NULL),
(3, 'Wisata Budaya', NULL, NULL),
(4, 'Wisata Religi', NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2022_07_03_212510_create_category', 2),
(5, '2022_07_03_213052_create_wisata', 3),
(6, '2022_07_03_225646_create_pusat_oleh_oleh', 4);

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
-- Table structure for table `pusat_oleh_oleh`
--

CREATE TABLE `pusat_oleh_oleh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pict_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_recommended` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pusat_oleh_oleh`
--

INSERT INTO `pusat_oleh_oleh` (`id`, `name`, `description`, `latitude`, `longitude`, `location`, `pict_url`, `category`, `user_id`, `created_at`, `updated_at`, `status`, `is_recommended`) VALUES
(1, 'Cahaya pusat oleh-oleh 123', '-', '-7.75404206667602', '113.19293203955833', '65WV+95G, Jl. Soekarno - Hatta, Pilang, Kec. Kademangan, Kota Probolinggo, Jawa Timur 67221', '/storage/oleh-oleh/oleh-1656891359.png', 'Pusat oleh-oleh', 2, '2022-07-03 16:35:59', '2022-07-05 06:00:19', '1', '1');

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
  `is_admin` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `alamat`, `no_hp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$vjbQn.zTLlnXxkDZB4Z8OeAYUlPNRcb2QrPW3gq5oOmRTukLSpueW', '1', NULL, NULL, NULL, '2022-07-03 04:22:38', '2022-07-03 04:22:38'),
(2, 'User 1', 'user1@gmail.com', NULL, '$2y$10$gr7p.XCLc4vUhqsMWBj63eg/keHIqaHqI0PbRYKx/3BPThmzawIgW', '0', 'alamat', '081234000001', NULL, '2022-07-03 01:54:01', '2022-07-03 01:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pict_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_recommended` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id`, `name`, `description`, `latitude`, `longitude`, `location`, `pict_url`, `category_id`, `user_id`, `created_at`, `updated_at`, `status`, `is_recommended`) VALUES
(1, 'DANAU RANU 123', 'Danau eksotis, dengan panorama alam yang sangat indah di Probolinggo selanjutnya bernama Danau Ranu Agung. Daya tarik utamanya adalah sepanjang aliran air danau tersebut, di sampingnya terdapat gususan tebing batu yang sangat kokoh. \r\nDanau Ranu Agung memiliki kedalaman 40 meter, warna airnya didominasi oleh warna hijau. Dan asal usul Danau Ranu Agung dari danau vulkanik Gunung Lamongan. \r\nAktivitas wisata di Danau Ranu Agung yang paling populer adalah menjelajah kawasan tersebut dengan menggunakan perahu yang siap untuk disewakan kepada para pengunjung.', '-7.978036', '113.390345', 'Desa Ranu Agung, Kecamatan Tiris', '/storage/wisata/wisata-1656887006.jpg', 1, 2, '2022-07-03 15:23:26', '2022-07-05 05:51:05', '1', '1'),
(2, 'DANAU RANU 2092', 'Danau eksotis, dengan panorama alam yang sangat indah di Probolinggo selanjutnya bernama Danau Ranu Agung. Daya tarik utamanya adalah sepanjang aliran air danau tersebut, di sampingnya terdapat gususan tebing batu yang sangat kokoh. \r\nDanau Ranu Agung memiliki kedalaman 40 meter, warna airnya didominasi oleh warna hijau. Dan asal usul Danau Ranu Agung dari danau vulkanik Gunung Lamongan. \r\nAktivitas wisata di Danau Ranu Agung yang paling populer adalah menjelajah kawasan tersebut dengan menggunakan perahu yang siap untuk disewakan kepada para pengunjung.', '-7.978036', '113.390345', 'Desa Ranu Agung, Kecamatan Tiris', '/storage/wisata/wisata-1656887026.jpg', 1, 2, '2022-07-03 15:23:46', '2022-07-05 06:27:18', '1', '1'),
(3, 'BJBR', 'Tempat wisata di Probolinggo yang sangat inspiratif bernama BJBR Probolinggo, atau Bee Jay Bakau Resort. Dari namanya saja kita sudah bisa menangkap konten utamanya adalah hutan bakau, dan resort.\r\n\r\nKisah inspiratif BJBR adalah merubah hutan bakau yang biasa-biasa, apalagi di sekitar kawannya banyak sekali tumpukan sampah, kemudian dirubah menjadi destinasi wisata alam yang hits di Probolinggo.\r\n\r\nPara pengunjung direkomendasikan untuk menginap di resort yang nyaman di BJBR, karena saat malam tiba, suasana romantis, instagramable, berpadu dengan lampu yang berwarna-warni adalah suguhan wisata yang sulit digambarkan keindahannya.\r\n\r\nBJBR adalah wisata Probolinggo dengan citarasa wisata mancanegara, BJBR Probolinggo sangat recommended untuk destinasi wisata keluarga di akhir pekan.', '-7.7348996', '113.2207714', 'Pelabuhan Mayangan', '/storage/wisata/wisata-1656894317.jpg', 2, 2, '2022-07-03 17:25:17', '2022-07-05 04:29:38', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pusat_oleh_oleh`
--
ALTER TABLE `pusat_oleh_oleh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pusat_oleh_oleh_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wisata_category_id_foreign` (`category_id`),
  ADD KEY `wisata_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pusat_oleh_oleh`
--
ALTER TABLE `pusat_oleh_oleh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pusat_oleh_oleh`
--
ALTER TABLE `pusat_oleh_oleh`
  ADD CONSTRAINT `pusat_oleh_oleh_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `wisata_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
