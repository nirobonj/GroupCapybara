-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 05:18 PM
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
-- Database: `nail`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `booking_list_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date_transaction` date NOT NULL,
  `time_transaction` time NOT NULL,
  `date_booking` date NOT NULL,
  `time_booking` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`booking_list_id`, `shop_id`, `user_id`, `date_transaction`, `time_transaction`, `date_booking`, `time_booking`) VALUES
(1, 1, 6, '2024-09-18', '22:00:00', '2024-09-19', '14:00:00'),
(2, 1, 6, '2024-09-08', '18:00:00', '2024-10-20', '17:02:00'),
(3, 2, 7, '2024-09-18', '22:15:00', '2024-09-23', '11:00:00'),
(4, 2, 7, '2024-09-08', '18:00:00', '2024-09-25', '13:30:00'),
(5, 3, 7, '2024-09-20', '12:56:02', '2024-09-20', '19:55:00'),
(6, 3, 6, '2024-09-20', '13:01:34', '2024-10-01', '21:01:00'),
(7, 4, 6, '2024-09-20', '20:07:18', '2024-10-10', '20:00:00'),
(8, 4, 6, '2024-09-20', '20:11:05', '2024-09-22', '09:10:00'),
(9, 2, 6, '2024-09-21', '22:03:47', '2024-09-25', '12:05:00'),
(10, 1, 7, '2024-09-21', '22:06:07', '2024-09-25', '08:30:00'),
(11, 1, 6, '2024-09-21', '00:17:44', '2024-09-25', '18:20:00');

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
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `province_id`) VALUES
(1, 'เมืองนครปฐม', 1),
(2, 'นครชัยศรี', 1),
(3, 'สามพราน', 1),
(4, 'ดอนตูม', 1),
(5, 'บางเลน', 1),
(6, 'กำแพงแสน', 1),
(7, 'พุทธมณฑล', 1);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_13_110041_add_is_admin_column_to_users_table', 2),
(5, '2024_09_13_110312_add_is_admin_column_to_users_table', 3),
(6, '2024_09_14_125851_add_columns_to_users_table', 4),
(7, '2024_09_14_182433_add_columns_to_users_table', 5),
(8, '2024_09_15_104347_add_columns_to_users_table', 6);

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
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'นครปฐม');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `shop_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booking_list_id` int(11) NOT NULL,
  `detail` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`shop_id`, `user_id`, `booking_list_id`, `detail`, `rating`) VALUES
(1, 6, 1, 'คือเริ่ด', 5),
(3, 6, 2, 'สวยๆ วันนี้พาเพื่อนไปทำเพื่อนชอบมาก เดี๋ยวอาทิตย์หน้าพาเพื่อนไปอีกจ้า', 5),
(2, 7, 3, 'ก็ดีแต่แพง และทำช้าไปหน่อย แต่ก็ตรงเรฟ ขอหักดาวนิดนึงนะคะ', 4.5),
(1, 7, 4, 'สวยเป๊ะปัง คือนี่แหละ ถูกต้องที่สุดแล้ว', 5);

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
('QZ4X8S5hn2pZQpmMZnKOy6LdKWrEINPPnXoEtPJu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQkZIbU56c0VXYjBiQTRQbE5JZmxESnY4dTN4STlIY0dMSWNlRmtIUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYm9va2luZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1727018191),
('s5Njuew4z68oedbZlJ8kaP5658Tj7lYQAJKXVxxI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRjNaZ2dWdzd0aW5TVjlGQkZxRVN2c2w1bnZkWUVCZ01rMjhNTlJVTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYm9va2luZy8xIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1727018198),
('z6IEOMi1hA91wg0zQnm8FxkMe8ceGY0rqGjsn6BE', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidUhnOGhVbWJGODNkSVJ3bFdHVnBYbHBhR09LakVlTTZmUWhSWEd5cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYm9va2luZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO30=', 1727017831);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shop_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `promotion_detail` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `shop_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `shop_description` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pvc` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `clean_nail` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `images_name` varchar(30) DEFAULT NULL,
  `parts_img` varchar(100) DEFAULT NULL,
  `color_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `user_id`, `shop_name`, `promotion_detail`, `shop_address`, `shop_description`, `pvc`, `clean_nail`, `images_name`, `parts_img`, `color_img`) VALUES
(1, 1, 'Dailydivine by xviippa', '- SET DUO ! ทาสีพื้น 2 สี 2 คน หรือเก็บไว้ใช้ครั้งถัดไปได้ 199฿\r\n- BUFFET A! ทาสีพื้น + อะไหล่ไม่จำกัด 249฿\r\n- BUFFET B! ทาสีลูกแก้ว/กลิตเตอร์ + อะไหล่ไม่จำกัด 299฿', 'หอ VS หน้า ม.เกษตร กำแพงแสน', 'แม่ค้ามีประสบการณ์ สถานที่พร้อมรับลูกค้า และบริการ...', '150฿', '50-150฿ แล้วแต่กรณี', 'img01.png', 'parts.jpg', 'colors.jpg'),
(2, 2, 'friendlynail.kps', 'เล็บเจล\r\nทำเล็บสีพื้น 200฿ ฟรี!! แคร์เจล + อะไหล่ 2 นิ้ว\r\nทำเล็บเจลแคทอาย 250฿ ฟรี!! แคร์เจล + อะไหล่ 4 นิ้ว', 'หอ infinity หน้า ม.เกษตรกำแพงแสน', 'รับทำเล็บเจลค่า', '150฿', '50-150฿ แล้วแต่กรณี', 'img02.jpg', 'parts.jpg', 'colors.jpg'),
(3, 3, 'carafiona.nail', '-', 'หอนกฮูก 3 ตึก A หน้า ม.เกษตรกำแพงแสน', 'ทำเล็บกับร้านเรา ทุกคนจะต้องน่ารักแน่นอน', '120-150฿', '50-100฿ แล้วแต่กรณี', 'img03.jpg', 'parts.jpg', 'colors.jpg'),
(4, 4, 'minttynail', 'ทาสีเจล สีพื้น มือเท้า 300฿ เท่านั้น\r\nเพ้นท์ลาย 250 ทุกแบบ\r\nเฉพาะวันพุธและวันพฤหัสนี้เท่านั้นจ้า', 'ตึกพาญิชย์หน้าหอไอเพลส หน้า ม.เกษตรกำแพงแสน', 'คิดถึงเล็บ คิดถึงเรา', '150฿', '50-150฿ แล้วแต่กรณี', 'img04.png', 'parts.jpg', 'colors.jpg'),
(5, 5, 'nail.bybelle', '-', 'หอเคพีเขียว หน้า ม.เกษตรกำแพงแสน', 'รับทำเล็บ สนใจทัก DM สอบถามข้อมูลได้ค่ะ', '150฿', '50-150฿ แล้วแต่กรณี', 'img05.jpg', 'parts.jpg', 'colors.jpg'),
(6, 11, 'yamkhun.nail', '- เซตคู่รัก 199฿ + อะไหล่ฟรีไม่จำกัด', 'ตึกวิศวคอมพิวเตอร์ ห้อง E8403', 'สวยแน่ ถ้ากล้าลอง', '50฿', '50-150฿ แล้วแต่กรณี', 'img06.png', 'parts.jpg', 'colors.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `province_id`, `district_id`, `role`) VALUES
(1, 'xviippa', 'xviippa@ku.th', NULL, '$2y$12$dCqOB9z3VdsOc4SwiIlY3./4wNbkbme4RGW4BQCjB0fiw5A9MWNee', NULL, '2024-09-19 07:42:11', '2024-09-19 07:42:11', '0812345678', 1, 6, 'admin'),
(2, 'friendlynail.kps', 'friendlynail@gmail.com', NULL, '$2y$12$QYEB/Rh9QgiehO/5py8ImOee/WR4FfI3Eox4qhG6EZTPwlQwoj/p2', NULL, '2024-09-19 07:46:37', '2024-09-19 07:46:37', '0818765432', 1, 6, 'admin'),
(3, 'carafiona.nail', 'carafiona@gmail.com', NULL, '$2y$12$QAVHne7v5glnoFwg3QkQW.JW7axKl2FPRD0ktxKdL13jItHQdRSUS', NULL, '2024-09-19 07:55:34', '2024-09-19 07:55:34', '0814567823', 1, 6, 'admin'),
(4, 'minttynail', 'minttynail@gmail.com', NULL, '$2y$12$mbh8haLGvQ3ekAFCJyFHM.FgO92GTTs8FOX.yauGOCwi3Hg7.r24q', NULL, '2024-09-19 08:01:45', '2024-09-19 08:01:45', '0823456789', 1, 6, 'admin'),
(5, 'nail.bybelle', 'nail.bybelle@gmail.com', NULL, '$2y$12$Mw648A3GHjO/sEL5gqCkZ.sCqlSmWnbc7TxtfxfMqogajBlYQpQHW', NULL, '2024-09-19 08:10:44', '2024-09-19 08:10:44', '0898765432', 1, 6, 'admin'),
(6, 'hotdog', 'hotdog@ku.th', NULL, '$2y$12$fyyKHYAlLl9sZjC4shR6POeBolUueUb8zmxHAgzYBYN8dFHtQ.Bwi', NULL, '2024-09-19 08:15:22', '2024-09-19 08:15:22', '0811223344', 1, 6, 'user'),
(7, 'moodeng', 'moodeng@gmail.com', NULL, '$2y$12$E.2p6PzB544vJI5EwcbGQuSvttKRn8Pfxu5wlJn/bmJDbByZPvnuu', NULL, '2024-09-19 08:27:01', '2024-09-19 08:27:01', '0987654321', 1, 6, 'user'),
(11, 'yamkhun', 'yamkhun@gmail.com', NULL, '$2y$12$Q5k1/31y9ptfCdr6YTtH1OnIPqGLIZwC4nblOBKphZ1gGDqJG2ie6', NULL, '2024-09-22 07:07:22', '2024-09-22 07:07:22', '0815467894', 1, 6, 'admin'),
(12, 'hhh', 'hhh@gmail.com', NULL, '$2y$12$DBfu6CssEwJdR6SsPoTJAe7AmGhnqMkD3T55tgMSQqkC3WLwZxaYK', NULL, '2024-09-22 08:10:21', '2024-09-22 08:10:21', '0812345678', 1, 6, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`booking_list_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`booking_list_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `booking_list_id` (`booking_list_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_province_id_index` (`province_id`),
  ADD KEY `users_district_id_index` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `booking_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `booking_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD CONSTRAINT `booking_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `booking_list_ibfk_3` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `review_ibfk_4` FOREIGN KEY (`booking_list_id`) REFERENCES `booking_list` (`booking_list_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `review_ibfk_5` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`shop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
