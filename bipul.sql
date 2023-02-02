-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2023 at 02:33 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bipul`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trash` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `roles`, `email`, `email_verified_at`, `password`, `remember_token`, `trash`, `created_at`, `updated_at`) VALUES
(5, 'Md. Iftekharul Alam Efat', 'super', 'iftekhar.iit@nstu.edu.bd', NULL, '$2y$10$ZqGdM9Bz4R5HNGX/GST6FuGoJqhfnqOhb5XlaFqbt5mN7yjIiekTy', NULL, '1', '2022-10-17 06:22:59', '2022-10-17 06:22:59'),
(6, 'Dr. Md Ashikur Rahman Khan', 'super', 'ashik@nstu.edu.bd', NULL, '$2y$10$VOsd6xRR0Q1GUgB1aCPG0Orozutmgb5A4v7x4jzSLc.TTzWXY4GVu', NULL, '1', '2022-10-17 06:24:56', '2022-10-17 06:24:56'),
(7, 'Md. Ashikur Rahman', 'admin', 'ashik0112@student.nstu.edu.bd', NULL, '$2y$10$mry.9FhwpfrJA8.VfNx8OuwULIc2WTJ0pGWEGE9UpJxHveooZlFVm', NULL, '1', '2022-10-17 06:26:57', '2022-10-17 06:26:57'),
(8, 'Md. Khalilur Rahman', 'super', 'khalilnstu@gmail.com', NULL, '$2y$10$R4VmnjUxI4wwEdRtsfPl7ehn/Acu1pGTswCooPCiY6K0Xam6mEgDS', NULL, '1', '2022-10-17 06:28:05', '2022-10-17 14:54:56'),
(9, 'Md. Jane Alam Adnan (mishu)', 'admin', 'janealam1112@student.nstu.edu.bd', NULL, '$2y$10$4O/Kz3ibVDUC4rrT6NjNaueYVzMadr79xAfUSX4c6moUQ1gZFd1oO', NULL, '1', '2022-10-17 06:29:56', '2022-10-17 06:29:56'),
(10, 'Md. Eusha Kadir', 'super', 'eusha@nstu.edu.bd', NULL, '$2y$10$hwh9mBbPAmAv2mYzD1nOHuXIpSWDxZl3N32BYl1ZQcGmoPRTyLUku', NULL, '1', '2022-10-17 06:32:13', '2022-10-17 06:32:13'),
(12, 'Nargis Akhter Helaly', 'spectacular', 'helaly@admin.nstu.edu.bd', NULL, '$2y$10$N6EnZCmLxDx4A.kqVklZueVtKW5QfhrbHG..urkCiC7iKi9utBrVi', NULL, '1', '2022-10-19 13:35:48', '2022-10-19 13:35:48'),
(13, 'Mohammad Jashim Uddin', 'spectacular', 'jashim_uu@admin.nstu.edu.bd', NULL, '$2y$10$ryOM5RFFm3SR9YT3FYIFbOR89pVtcyTOC42nogyaBpHdbbAy9PS2i', NULL, '1', '2022-10-19 13:46:09', '2023-01-14 19:35:39'),
(14, 'rakib', 'admin', 'rakib@gmail.com', NULL, '$2y$10$H6Y0RHghlOSu1vBzidF8dO.XMQ6ZIlRndFuVRVlmcJyhsGSH0Lb12', NULL, '0', '2023-01-14 11:56:13', '2023-01-14 19:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `email`, `phone`, `address`, `description`, `map`, `created_at`, `updated_at`) VALUES
(1, 'jane.alam1711027@gmail.com', '01766871976,01956523092', 'Kamalla, Cumilla', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem optio quod fuga doloremque voluptatum.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0450662731123!2d90.42329531498194!3d23.78140948457402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c796c76c1a8b%3A0x7ff1d179fba4c47c!2sPRAN%20Center!5e0!3m2!1sen!2sbd!4v1671959153292!5m2!1sen!2sbd', '2023-01-17 22:22:32', '2023-01-24 02:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_10_08_135129_create_admins_table', 1),
(5, '2023_01_15_014153_create_categories_table', 2),
(6, '2023_01_15_112350_create_sub_categories_table', 3),
(7, '2023_01_15_170700_create_products_table', 4),
(8, '2023_01_17_065805_create_sliders_table', 5),
(9, '2023_01_17_093500_create_about_us_table', 6),
(10, '2023_01_17_130336_create_factories_table', 7),
(11, '2023_01_17_135407_create_shops_table', 8),
(12, '2023_01_18_024618_create_awards_table', 9),
(13, '2023_01_18_030029_create_clients_table', 10),
(14, '2023_01_18_031433_create_blogs_table', 11),
(15, '2023_01_18_033956_create_messages_table', 12),
(16, '2023_01_18_040542_create_contact_us_table', 13),
(17, '2023_01_18_105347_create_galleries_table', 14),
(18, '2023_01_18_111304_create_partners_table', 15),
(19, '2023_01_18_113706_create_subscribes_table', 16),
(20, '2023_01_18_175140_create_settings_table', 17),
(21, '2023_01_19_124451_create_producat_ranges_table', 17),
(22, '2023_01_21_094706_create_pages_table', 18),
(23, '2023_01_23_004805_create_pages_table', 19),
(24, '2023_01_24_054720_create_t_v_c_s_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('iftekhar.iit@nstu.edu.bd', 'wk8w9bO9IlDszKjOt6RoKBJ5bPbroXFK8EEg4CiVUtGAdJFDz18l8bOMPzeiMj26', '2022-10-17 06:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fev_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `main_logo`, `fev_icon`, `fb_link`, `in_link`, `insta_link`, `youtube_link`, `twitter_link`, `created_at`, `updated_at`) VALUES
(1, 'Italiano', 'images/logo/405556main_logo.png', 'images/logo/190489fev_icon.ico', 'https://www.facebook.com/Janealamadnan/', 'https://www.linkedin.com/in/jane-alam-adnan/', 'https://www.instagram.com/adnannstu/', 'https://www.youtube.com/channel/UCqitTT2gLdOy7lq5WqUG4Rg', 'https://twitter.com/', '2023-01-19 08:17:41', '2023-01-19 08:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `phone`, `address`, `url`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kkhalil', NULL, NULL, 'https://www.youtube.com/', 'images/shop/743729shop.jpg', '2023-01-17 20:27:14', '2023-01-19 06:37:29', NULL),
(4, 'Milk Bread', NULL, NULL, 'https://www.youtube.com/', 'images/shop/156491shop.jpg', '2023-01-19 06:30:45', '2023-01-19 06:30:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
