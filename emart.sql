-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 11:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abdul', 'Razzaq', 'admin@gmail.com', '2022-07-10 01:55:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZDfT8Cw9IS', '2022-07-10 01:55:59', '2022-07-10 01:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `order_no`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nuts', 'snacks', 1, '1657437179.jpg', 1, '2022-07-10 02:12:59', '2022-07-16 13:32:14'),
(2, 'Nimko', 'nimko', 2, '1657437250.jpg', 1, '2022-07-10 02:14:10', '2022-07-10 02:14:16'),
(3, 'Sweets', 'sweets', 3, '1657437622.jpg', 1, '2022-07-10 02:20:22', '2022-07-10 02:21:33'),
(4, 'Fresh Cakes', 'fresh-cakes', 4, '1657437634.jpg', 1, '2022-07-10 02:20:34', '2022-07-10 02:25:41'),
(5, 'Dry Cakes', 'dry-cakes', 5, '1657437645.png', 1, '2022-07-10 02:20:45', '2022-07-10 02:21:34'),
(6, 'Jams', 'jams', 6, '1657437653.jpg', 1, '2022-07-10 02:20:53', '2022-07-10 02:21:35'),
(7, 'Pizza', 'pizza', 7, '1657437662.jpg', 1, '2022-07-10 02:21:02', '2022-07-10 02:21:36'),
(8, 'Biscuits', 'biscuits', 8, '1657438199.jpg', 1, '2022-07-10 02:29:59', '2022-07-10 02:30:04'),
(9, 'Drinks', 'drinks', 9, '1657438488.jpg', 1, '2022-07-10 02:34:48', '2022-07-10 02:36:05'),
(10, 'Others', 'others', 10, '1657438559.jpg', 1, '2022-07-10 02:35:59', '2022-07-10 02:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Zeeshan', 'zeeshan@gmail.com', 'This is a test message sent by zeeshan.', 0, '2022-07-21 02:43:55', '2022-07-21 02:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `coupen_codes`
--

CREATE TABLE `coupen_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupen_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupen_type` enum('F','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupen_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `expired_on` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupen_codes`
--

INSERT INTO `coupen_codes` (`id`, `coupen_code`, `coupen_type`, `coupen_value`, `cart_min_value`, `expired_on`, `status`, `created_at`, `updated_at`) VALUES
(1, 'JULSALE', 'P', 25, 20, '2022-07-31', 1, '2022-07-21 02:37:49', '2022-07-21 02:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boys`
--

INSERT INTO `delivery_boys` (`id`, `name`, `mobile`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ali', '03488410236', '$2y$10$OeHob3qiMnJH9nj0cTHIhOyhpSqgkVKYUW4eE9dekG3rKZ9ti6dI2', 1, '2022-07-21 02:27:43', '2022-07-21 02:27:56'),
(2, 'Akram', '03001234567', '$2y$10$qN5RfBKYCbBvJ/tNESX1jOSG.y9I0qXT/.h3pEcbIkJwo0nKe2Lv2', 1, '2022-07-21 02:28:20', '2022-07-21 02:28:26');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desecription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `instock` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `featured` int(11) NOT NULL DEFAULT 0,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('veg','nonveg') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `cat_id`, `name`, `slug`, `desecription`, `long_desc`, `image`, `weight`, `instock`, `status`, `featured`, `view_count`, `created_at`, `updated_at`, `type`) VALUES
(1, 1, 'Almonds', 'almonds', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;</div>\r\n<div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', '1657997663.jpg', 0.50, 20, 1, 0, 3, '2022-07-16 13:54:24', '2022-07-16 14:09:44', 'veg'),
(2, 1, 'Kajoo', 'kajoo', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;</div>\r\n<div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', '1657997713.jpg', 1.00, 30, 1, 0, 0, '2022-07-16 13:55:13', '2022-07-16 13:57:14', 'veg'),
(3, 1, 'Pista', 'pista', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;</div>\r\n<div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', '1657997753.jpg', 2.00, 10, 1, 0, 2, '2022-07-16 13:55:53', '2022-07-16 14:17:54', 'veg'),
(4, 1, 'Walnuts', 'walnuts', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>', '1657997801.webp', 0.20, 5, 1, 0, 2, '2022-07-16 13:56:41', '2022-07-16 14:12:12', 'veg'),
(5, 2, 'Gathia Nimko', 'gathia-nimko', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657998832.jpg', NULL, 10, 1, 0, 0, '2022-07-16 14:13:52', '2022-07-16 14:16:05', 'veg'),
(6, 2, 'Shahi Nimko', 'shahi-nimko', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657998873.jpg', NULL, 10, 1, 1, 1, '2022-07-16 14:14:33', '2022-07-17 02:40:05', 'veg'),
(7, 2, 'Crispy Nimko', 'crispy-nimko', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657998914.jpg', NULL, 2, 1, 0, 0, '2022-07-16 14:15:14', '2022-07-16 14:16:07', 'veg'),
(8, 2, 'Daal Moong Nimko', 'daal-moong-nimko', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>', '1657998957.jpg', NULL, 33, 1, 0, 0, '2022-07-16 14:15:57', '2022-07-16 14:16:08', 'veg'),
(9, 3, 'Gulab Jaman', 'gulab-jaman', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657999184.jpg', NULL, 20, 1, 1, 0, '2022-07-16 14:19:44', '2022-07-17 02:40:16', 'veg'),
(10, 3, 'Burfi', 'burfi', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657999223.png', NULL, 15, 1, 1, 5, '2022-07-16 14:20:23', '2022-07-21 03:15:21', 'veg'),
(11, 3, 'Multani Sohan Halwa', 'multani-sohan-halwa', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657999266.jpg', NULL, 12, 1, 0, 0, '2022-07-16 14:21:06', '2022-07-16 14:22:01', 'veg'),
(12, 3, 'Almond Patisa', 'almond-patisa', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657999310.jpg', NULL, 17, 1, 0, 0, '2022-07-16 14:21:50', '2022-07-16 14:25:06', 'veg'),
(13, 4, 'Pineapple Cake', 'pineapple-cake', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657999748.jpg', NULL, 30, 1, 0, 1, '2022-07-16 14:29:08', '2022-07-16 14:33:47', 'veg'),
(14, 4, 'Mango Cake', 'mango-cake', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657999794.jpg', NULL, 20, 1, 0, 0, '2022-07-16 14:29:54', '2022-07-16 14:33:29', 'veg'),
(15, 4, 'Real Chocolate Cake', 'real-chocolate-cake', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657999845.jpg', NULL, 36, 1, 0, 1, '2022-07-16 14:30:45', '2022-07-17 03:15:12', 'veg'),
(16, 4, 'Two in One Cake', 'two-in-one-cake', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1657999894.jpg', NULL, 14, 1, 1, 1, '2022-07-16 14:31:34', '2022-07-17 03:12:51', 'veg'),
(17, 5, 'Almond Dry Cake', 'almond-dry-cake', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>', '1658042559.jpg', NULL, 20, 1, 1, 0, '2022-07-17 02:22:39', '2022-07-17 02:40:54', 'veg'),
(18, 5, 'Pista Dry Cake', 'pista-dry-cake', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658042589.jpg', NULL, 15, 1, 0, 1, '2022-07-17 02:23:09', '2022-07-17 02:57:19', 'veg'),
(19, 5, 'Coffee Dry Cake', 'coffee-dry-cake', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>', '1658042635.jpg', NULL, 7, 1, 0, 2, '2022-07-17 02:23:55', '2022-07-17 02:28:43', 'veg'),
(21, 6, 'Apple Jam', 'apple-jam-2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>', '1658042792.jpg', NULL, 100, 1, 0, 1, '2022-07-17 02:26:32', '2022-07-21 03:14:37', 'veg'),
(22, 6, 'Mango Jam', 'mango-jam', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658042823.jpg', NULL, 50, 1, 0, 1, '2022-07-17 02:27:03', '2022-07-17 02:56:30', 'veg'),
(23, 6, 'Mix Fruit Jam', 'mix-fruit-jam', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658042851.jpg', NULL, 30, 1, 1, 0, '2022-07-17 02:27:31', '2022-07-17 02:41:05', 'veg'),
(24, 7, 'Chicken Pizza', 'chicken-pizza', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658042991.jpg', NULL, 43, 1, 1, 5, '2022-07-17 02:29:51', '2022-07-21 02:32:47', 'nonveg'),
(25, 7, 'Fajita Pizza', 'fajita-pizza', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658043025.jpg', NULL, 17, 1, 0, 0, '2022-07-17 02:30:25', '2022-07-17 02:31:21', 'nonveg'),
(26, 7, 'Bar B Q Pizza', 'bar-b-q-pizza', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658043061.jpg', NULL, 11, 1, 0, 0, '2022-07-17 02:31:01', '2022-07-17 02:31:22', 'nonveg'),
(27, 8, 'Cake Rusks', 'cake-rusks', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658043208.jpg', NULL, 29, 1, 0, 0, '2022-07-17 02:33:28', '2022-07-17 02:35:00', 'veg'),
(28, 8, 'Coconut Biscuit', 'coconut-biscuit', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658043239.jpg', NULL, 75, 1, 0, 1, '2022-07-17 02:33:59', '2022-07-21 03:15:09', 'veg'),
(29, 8, 'Pista Khatai', 'pista-khatai', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658043273.jpg', NULL, 27, 1, 1, 0, '2022-07-17 02:34:33', '2022-07-17 02:41:30', 'veg'),
(30, 9, 'Mango Slush', 'mango-slush', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658043384.jpg', NULL, 24, 1, 1, 1, '2022-07-17 02:36:25', '2022-07-21 03:01:00', 'veg'),
(31, 9, 'Peach Slush', 'peach-slush', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658043420.jpg', NULL, 200, 1, 0, 0, '2022-07-17 02:37:00', '2022-07-17 02:37:41', 'veg'),
(32, 9, 'Strawberry Slush', 'strawberry-slush', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">Lorem Ipsum</span></strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1658043454.jpg', NULL, 17, 1, 0, 0, '2022-07-17 02:37:34', '2022-07-17 02:37:43', 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `food_details`
--

CREATE TABLE `food_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_id` int(11) NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_details`
--

INSERT INTO `food_details` (`id`, `food_id`, `attribute`, `price`, `status`, `created_at`, `updated_at`) VALUES
(5, 4, '1 Kg', 1400, 1, '2022-07-16 14:11:18', '2022-07-16 14:11:18'),
(6, 3, 'Half Kg', 1300, 1, '2022-07-16 14:11:42', '2022-07-16 14:11:42'),
(7, 2, '1 Kg', 2800, 1, '2022-07-16 14:11:58', '2022-07-16 14:11:58'),
(8, 1, '1 Kg', 1500, 1, '2022-07-16 14:12:09', '2022-07-16 14:12:09'),
(9, 5, '1 Kg', 1500, 1, '2022-07-16 14:16:31', '2022-07-16 14:16:31'),
(10, 5, '500 gm', 800, 1, '2022-07-16 14:16:31', '2022-07-16 14:16:31'),
(11, 6, '1 Kg', 2000, 1, '2022-07-16 14:17:03', '2022-07-16 14:17:03'),
(12, 6, '500 gm', 1000, 1, '2022-07-16 14:17:03', '2022-07-16 14:17:03'),
(13, 7, '1 Kg', 500, 1, '2022-07-16 14:17:37', '2022-07-16 14:17:37'),
(14, 8, '1 Kg', 900, 1, '2022-07-16 14:17:50', '2022-07-16 14:17:50'),
(15, 9, '1 Kg', 900, 1, '2022-07-16 14:24:59', '2022-07-16 14:24:59'),
(16, 9, '500 gm', 500, 1, '2022-07-16 14:24:59', '2022-07-16 14:24:59'),
(17, 10, '1 Kg', 900, 1, '2022-07-16 14:25:21', '2022-07-16 14:25:21'),
(18, 10, '500 gm', 450, 1, '2022-07-16 14:25:21', '2022-07-16 14:25:21'),
(19, 11, '1 Kg', 1000, 1, '2022-07-16 14:25:49', '2022-07-16 14:25:49'),
(20, 11, '500 gm', 600, 1, '2022-07-16 14:25:49', '2022-07-16 14:25:49'),
(21, 12, '1 Kg', 900, 1, '2022-07-16 14:26:14', '2022-07-16 14:26:14'),
(22, 12, '500 gm', 450, 1, '2022-07-16 14:26:14', '2022-07-16 14:26:14'),
(23, 13, '2 Lb', 1000, 1, '2022-07-16 14:32:44', '2022-07-16 14:32:44'),
(24, 14, '2 Lb', 1000, 1, '2022-07-16 14:32:58', '2022-07-16 14:32:58'),
(25, 15, '2 Lb', 1000, 1, '2022-07-16 14:33:11', '2022-07-16 14:33:11'),
(26, 16, '2 Lb', 1000, 1, '2022-07-16 14:33:24', '2022-07-16 14:33:24'),
(27, 17, '2Lb', 1400, 1, '2022-07-17 02:24:10', '2022-07-17 02:24:10'),
(28, 18, '2Lb', 1400, 1, '2022-07-17 02:24:26', '2022-07-17 02:24:26'),
(29, 19, '2Lb', 1400, 1, '2022-07-17 02:24:39', '2022-07-17 02:24:39'),
(30, 21, '250 gm', 350, 1, '2022-07-17 02:28:04', '2022-07-17 02:28:04'),
(31, 22, '250 gm', 350, 1, '2022-07-17 02:28:24', '2022-07-17 02:28:24'),
(32, 23, '250 gm', 350, 1, '2022-07-17 02:28:36', '2022-07-17 02:28:36'),
(33, 24, 'Large', 800, 1, '2022-07-17 02:31:43', '2022-07-17 02:31:43'),
(34, 24, 'Small', 450, 1, '2022-07-17 02:31:43', '2022-07-17 02:31:43'),
(35, 25, 'Large', 800, 1, '2022-07-17 02:32:05', '2022-07-17 02:32:05'),
(36, 25, 'Small', 450, 1, '2022-07-17 02:32:05', '2022-07-17 02:32:05'),
(37, 26, 'Large', 800, 1, '2022-07-17 02:32:21', '2022-07-17 02:32:21'),
(38, 26, 'Small', 450, 1, '2022-07-17 02:32:21', '2022-07-17 02:32:21'),
(39, 27, '1 Kg', 750, 1, '2022-07-17 02:34:54', '2022-07-17 02:34:54'),
(40, 28, '1 Kg', 750, 1, '2022-07-17 02:35:09', '2022-07-17 02:35:09'),
(41, 29, '1 Kg', 750, 1, '2022-07-17 02:35:25', '2022-07-17 02:35:25'),
(42, 30, 'Medium', 100, 1, '2022-07-17 02:37:59', '2022-07-17 02:37:59'),
(43, 31, 'Medium', 100, 1, '2022-07-17 02:38:20', '2022-07-17 02:38:20'),
(44, 32, 'Medium', 100, 1, '2022-07-17 02:38:32', '2022-07-17 02:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `food_gallery`
--

CREATE TABLE `food_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foodid` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(34, '2014_10_12_000000_create_users_table', 1),
(35, '2014_10_12_100000_create_password_resets_table', 1),
(36, '2019_08_19_000000_create_failed_jobs_table', 1),
(37, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(38, '2021_12_12_133425_create_admins_table', 1),
(39, '2021_12_13_112303_create_categories_table', 1),
(40, '2021_12_17_102540_add_status_to_users', 1),
(41, '2021_12_17_104008_create_delivery_boys_table', 1),
(42, '2021_12_17_120307_create_coupen_codes_table', 1),
(43, '2021_12_18_114921_create_food_table', 1),
(44, '2021_12_21_140441_create_food_details_table', 1),
(45, '2021_12_24_120520_create_contacts_table', 1),
(46, '2021_12_28_122223_add_type_column_to_foods', 1),
(47, '2021_12_28_135534_create_cart_table', 1),
(48, '2022_01_03_113208_add_food_id_to_cart', 1),
(49, '2022_01_04_141600_create_orders_table', 1),
(50, '2022_01_04_141732_create_order_details_table', 1),
(51, '2022_01_04_142208_create_order_status_table', 1),
(52, '2022_01_04_152347_add_qty_column_to_order_details', 1),
(53, '2022_02_04_113936_add_slug_col_to_categories', 1),
(54, '2022_02_04_114059_add_slug_col_to_foods', 1),
(55, '2022_05_25_044309_create_rating_and_review_table', 1),
(56, '2022_05_25_053624_add_food_id_to_review_rating_table', 1),
(57, '2022_05_25_074756_add_image_field_to_categories_table', 1),
(58, '2022_05_26_062752_add_featured_column_to_foods', 1),
(59, '2022_05_29_043536_add_long_desc_and_stock_and_weight_col_to_foods', 1),
(60, '2022_06_01_045351_create_food_galleries_table', 1),
(61, '2022_06_02_045459_create_pages_table', 1),
(62, '2022_06_03_052450_create_quick_links_table', 1),
(63, '2022_07_02_062955_create_wishlist_table', 1),
(64, '2022_07_03_064548_add_view_count_to_foods', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `delivery_boy_id` int(11) DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `name`, `email`, `mobile`, `address`, `total_price`, `zip_code`, `delivery_boy_id`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Abdul Razzaq', 'abdul@emart.com', '03096021606', 'Thokar Niaz Baig, Multan Road Lahore', 1600, 55360, 1, 'paid', 4, '2022-07-21 02:32:47', '2022-07-21 02:34:34'),
(2, 1, 'Nawaz Ali', 'nawaz@gmail.com', '03451234567', 'Anarkali Bazar, Street 2 Shop no 05 Lahore', 337, 55360, 1, 'paid', 4, '2022-07-21 02:40:36', '2022-07-21 02:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `food_details_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `food_id`, `qty`, `food_details_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 24, 2, 33, 1600, '2022-07-21 02:32:47', '2022-07-21 02:32:47'),
(2, 2, 10, 1, 18, 450, '2022-07-21 02:40:36', '2022-07-21 02:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2022-07-10 01:55:59', '2022-07-10 01:55:59'),
(2, 'Packed', '2022-07-10 01:55:59', '2022-07-10 01:55:59'),
(3, 'Shipped', '2022-07-10 01:55:59', '2022-07-10 01:55:59'),
(4, 'Delivered', '2022-07-10 01:55:59', '2022-07-10 01:55:59'),
(5, 'Cancelled', '2022-07-10 01:55:59', '2022-07-10 01:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\', \'sans-serif\'; color: black;\">Random Text</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab.</span></strong></p>', '2022-07-17 02:48:35', '2022-07-17 02:48:35'),
(2, 'Our Mission', 'our-mission', '<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\', \'sans-serif\'; color: black;\">Random Text</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\"><strong><span style=\"font-size: 10.5pt; font-family: \'Open Sans\',\'sans-serif\'; color: black; font-weight: normal;\">You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template. On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly. To change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.</span></strong></p>\r\n<p style=\"margin: 0in; margin-bottom: .0001pt; text-align: justify; background: white;\">&nbsp;</p>', '2022-07-17 02:49:34', '2022-07-17 02:51:35');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quick_links`
--

CREATE TABLE `quick_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quick_links`
--

INSERT INTO `quick_links` (`id`, `title`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.facebook.com', '2022-07-17 02:52:22', '2022-07-17 02:52:22'),
(2, 'Twitter', 'https://www.twitter.com', '2022-07-17 02:52:37', '2022-07-17 02:52:37'),
(3, 'Instagram', 'https://www.instagram.com', '2022-07-17 02:52:46', '2022-07-17 02:52:46'),
(4, 'Youtube', 'https://www.youtube.com', '2022-07-17 02:52:58', '2022-07-17 02:52:58'),
(5, 'Whatsapp', 'https://www.whatsapp.com', '2022-07-17 02:53:08', '2022-07-17 02:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `rating_and_review`
--

CREATE TABLE `rating_and_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_and_review`
--

INSERT INTO `rating_and_review` (`id`, `userid`, `foodid`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 5, 'Very tasty product. Recommended.', '2022-07-21 03:01:59', '2022-07-21 03:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Abdul Razzaq', 'abdul@emart.com', '03096021606', NULL, '$2y$10$RPnlgvdSN0vFFsQYG1AFF.cqTrk3wxfl8eL6XKijwQ1Sfl9ZoF3lG', NULL, '2022-07-21 02:26:38', '2022-07-21 02:26:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupen_codes`
--
ALTER TABLE `coupen_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_details`
--
ALTER TABLE `food_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_gallery`
--
ALTER TABLE `food_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `quick_links`
--
ALTER TABLE `quick_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_and_review`
--
ALTER TABLE `rating_and_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupen_codes`
--
ALTER TABLE `coupen_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `food_details`
--
ALTER TABLE `food_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `food_gallery`
--
ALTER TABLE `food_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quick_links`
--
ALTER TABLE `quick_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating_and_review`
--
ALTER TABLE `rating_and_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
