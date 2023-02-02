-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 10:16 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nstuadmission2021-22`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_unit_scores`
--

CREATE TABLE `a_unit_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gst_app_id` int(11) NOT NULL,
  `gst_roll` int(11) DEFAULT NULL,
  `gst_total` double(7,4) NOT NULL,
  `hsc_gpa` double(7,4) NOT NULL,
  `hsc_score` double(7,4) NOT NULL,
  `ssc_gpa` double(7,4) NOT NULL,
  `ssc_score` double(7,4) NOT NULL,
  `total` double(7,4) NOT NULL,
  `gst_phy` double(7,4) DEFAULT NULL,
  `gst_che` double(7,4) DEFAULT NULL,
  `gst_mat` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_bio` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_eng` double(7,4) DEFAULT NULL,
  `gst_ban` double(7,4) DEFAULT NULL,
  `hsc_phy` double(7,4) DEFAULT NULL,
  `hsc_che` double(7,4) DEFAULT NULL,
  `hsc_mat` double(7,4) DEFAULT NULL,
  `hsc_bio` double(7,4) DEFAULT NULL,
  `hsc_eng` double(7,4) DEFAULT NULL,
  `hsc_ban` double(7,4) DEFAULT NULL,
  `ssc_phy` double(7,4) DEFAULT NULL,
  `ssc_che` double(7,4) DEFAULT NULL,
  `ssc_mat` double(7,4) DEFAULT NULL,
  `ssc_bio` double(7,4) DEFAULT NULL,
  `ssc_eng` double(7,4) DEFAULT NULL,
  `ssc_ban` double(7,4) DEFAULT NULL,
  `pass_year` int(11) DEFAULT 0,
  `birth_year` int(11) DEFAULT NULL,
  `merit` int(11) DEFAULT NULL,
  `quota` set('FFQ','TQ','PDQ','HQ','WQ','CPQ') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quota_merit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_unit_scores`
--
ALTER TABLE `a_unit_scores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gst_app_id` (`gst_app_id`),
  ADD UNIQUE KEY `gst_roll` (`gst_roll`),
  ADD KEY `gst_app_id_2` (`gst_app_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_unit_scores`
--
ALTER TABLE `a_unit_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
