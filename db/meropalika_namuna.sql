-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2024 at 05:32 AM
-- Server version: 8.0.37-0ubuntu0.22.04.3
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meropalika_namuna`
--

-- --------------------------------------------------------

--
-- Table structure for table `agricultures`
--

CREATE TABLE `agricultures` (
  `id` bigint UNSIGNED NOT NULL,
  `agricultural_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agriculture_categories`
--

CREATE TABLE `agriculture_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint UNSIGNED NOT NULL,
  `animal_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animal_categories`
--

CREATE TABLE `animal_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animal_farms`
--

CREATE TABLE `animal_farms` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `animan_cat_id` bigint UNSIGNED DEFAULT NULL,
  `animal_id` bigint UNSIGNED DEFAULT NULL,
  `fiscal_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_month_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_month_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anudaan_categories`
--

CREATE TABLE `anudaan_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anudaan_categories`
--

INSERT INTO `anudaan_categories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'anudan 1', '1', '2024-06-15 23:50:43', '2024-06-15 23:50:43'),
(2, 'anudan 2', '1', '2024-06-15 23:50:54', '2024-06-15 23:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `anudanns`
--

CREATE TABLE `anudanns` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bibran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `times` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `criteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daatrinikay_sahayog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beemas`
--

CREATE TABLE `beemas` (
  `id` bigint UNSIGNED NOT NULL,
  `beema_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anudaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beema_categories`
--

CREATE TABLE `beema_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `bill_no`, `date`, `full_name`, `address`, `phone`, `complete_status`, `remarks`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '१', '2081-2-17', NULL, NULL, NULL, NULL, NULL, '1', '2024-05-30 01:33:49', '2024-05-30 01:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` bigint UNSIGNED NOT NULL,
  `billing_id` bigint UNSIGNED DEFAULT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `billing_id`, `udhyog_id`, `product_id`, `unit_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, '0', '0', '0', '2024-05-30 01:33:49', '2024-05-30 01:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `biu_bijans`
--

CREATE TABLE `biu_bijans` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anudaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'daa', 'faa', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `damage_records`
--

CREATE TABLE `damage_records` (
  `id` bigint UNSIGNED NOT NULL,
  `quantity_damaged` int DEFAULT NULL,
  `production_batch_id` bigint UNSIGNED DEFAULT NULL,
  `damage_type_id` bigint UNSIGNED DEFAULT NULL,
  `damage_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reported_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_taken` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_damage` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `damagable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `damagable_id` bigint UNSIGNED NOT NULL,
  `production_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `damage_records`
--

INSERT INTO `damage_records` (`id`, `quantity_damaged`, `production_batch_id`, `damage_type_id`, `damage_date`, `reported_by`, `action_taken`, `notes`, `total_damage`, `created_at`, `updated_at`, `damagable_type`, `damagable_id`, `production_date`, `udhyog_id`) VALUES
(3, 100, NULL, 1, '2081-02-23', '1', NULL, NULL, 100, '2024-06-05 05:00:25', '2024-06-05 06:26:50', 'App\\Models\\InventoryProduct', 1, NULL, NULL),
(4, 33, NULL, 1, '2081-02-23', '1', NULL, NULL, 33, '2024-06-05 05:02:11', '2024-06-05 05:02:11', 'App\\Models\\InventoryProduct', 1, NULL, NULL),
(5, 33, NULL, 1, '2081-02-23', '1', NULL, NULL, 33, '2024-06-05 05:02:43', '2024-06-05 05:02:43', 'App\\Models\\InventoryProduct', 1, NULL, NULL),
(6, 444, NULL, 2, '2081-02-23', '1', NULL, NULL, 444, '2024-06-05 05:02:43', '2024-06-05 05:02:43', 'App\\Models\\InventoryProduct', 2, NULL, NULL),
(7, 44, NULL, 1, '2081-02-23', '1', NULL, NULL, 44, '2024-06-05 05:02:43', '2024-06-05 05:02:43', 'App\\Models\\InventoryProduct', 2, NULL, NULL),
(8, 33, NULL, 2, '2081-02-23', '1', NULL, NULL, 33, '2024-06-05 05:16:04', '2024-06-05 06:25:18', 'App\\Models\\RawMaterial', 3, NULL, NULL),
(9, 22, NULL, 2, '2081-02-23', '1', NULL, NULL, 22, '2024-06-05 05:16:04', '2024-06-05 05:16:04', 'App\\Models\\RawMaterial', 4, NULL, NULL),
(10, 33, NULL, 1, '2081-02-24', '1', NULL, NULL, 33, '2024-06-06 01:29:42', '2024-06-06 01:29:42', 'App\\Models\\InventoryProduct', 1, NULL, NULL),
(11, 33, NULL, 2, '2081-02-24', '1', NULL, NULL, 33, '2024-06-06 01:30:02', '2024-06-06 01:30:02', 'App\\Models\\InventoryProduct', 1, NULL, NULL),
(12, 33, NULL, 1, '2081-02-24', '1', NULL, NULL, 33, '2024-06-06 02:09:26', '2024-06-06 02:09:26', 'App\\Models\\InventoryProduct', 1, NULL, NULL),
(13, 2, NULL, 1, '2081-02-24', '1', NULL, NULL, 2, '2024-06-06 04:01:31', '2024-06-06 04:01:31', 'App\\Models\\InventoryProduct', 2, NULL, NULL),
(14, 23, NULL, 2, '2081-02-24', '1', NULL, NULL, 23, '2024-06-06 04:01:31', '2024-06-06 04:01:31', 'App\\Models\\InventoryProduct', 1, NULL, NULL),
(15, 12, NULL, 2, '2081-02-24', '1', NULL, NULL, 12, '2024-06-06 04:01:31', '2024-06-06 04:01:31', 'App\\Models\\InventoryProduct', 4, NULL, NULL),
(16, 2, NULL, 1, '2081-02-24', '1', NULL, NULL, 2, '2024-06-06 04:37:57', '2024-06-06 04:37:57', 'App\\Models\\InventoryProduct', 4, NULL, NULL),
(17, 33, NULL, 1, '2081-02-24', '1', NULL, NULL, 33, '2024-06-06 04:39:33', '2024-06-06 04:39:33', 'App\\Models\\InventoryProduct', 1, NULL, NULL),
(18, 33, NULL, 2, '2081-02-24', '1', NULL, NULL, 33, '2024-06-06 04:56:37', '2024-06-06 04:56:37', 'App\\Models\\InventoryProduct', 4, NULL, NULL),
(19, 2, NULL, 1, '2081-02-25', '1', NULL, NULL, 2, '2024-06-07 00:12:41', '2024-06-07 00:12:41', 'App\\Models\\InventoryProduct', 5, NULL, NULL),
(20, 2, NULL, 1, '2081-02-25', '1', NULL, NULL, 2, '2024-06-07 00:13:08', '2024-06-07 00:13:08', 'App\\Models\\InventoryProduct', 5, NULL, NULL),
(27, 33, 32, 1, '2081-02-27', '1', NULL, NULL, 33, '2024-06-09 00:06:16', '2024-06-09 00:06:16', 'App\\Models\\InventoryProduct', 5, NULL, NULL),
(32, 2, 34, 2, '2081-02-27', '1', NULL, NULL, 2, '2024-06-09 00:50:45', '2024-06-09 00:50:45', 'App\\Models\\InventoryProduct', 6, NULL, NULL),
(35, 2, NULL, 2, '2081-02-27', '1', NULL, NULL, 2, '2024-06-09 00:53:00', '2024-06-09 00:53:00', 'App\\Models\\RawMaterialName', 3, NULL, NULL),
(36, 2, NULL, 2, '2081-02-27', '1', NULL, NULL, 2, '2024-06-09 00:53:37', '2024-06-09 00:53:37', 'App\\Models\\RawMaterialName', 6, NULL, NULL),
(37, 2, 33, 2, '2081-02-28', '1', NULL, NULL, 2, '2024-06-10 00:29:08', '2024-06-10 00:29:08', 'App\\Models\\InventoryProduct', 5, '2081-2-26', NULL),
(38, 2, 35, 2, '2081-02-28', '1', NULL, NULL, 2, '2024-06-10 00:30:47', '2024-06-10 00:30:47', 'App\\Models\\InventoryProduct', 5, '2081-2-28', NULL),
(39, 2, NULL, 1, '2081-02-28', '1', NULL, NULL, 2, '2024-06-10 00:39:04', '2024-06-10 00:39:04', 'App\\Models\\RawMaterialName', 3, NULL, NULL),
(40, 2, NULL, 1, '2081-02-28', '1', NULL, NULL, 2, '2024-06-10 00:40:47', '2024-06-10 00:40:47', 'App\\Models\\RawMaterialName', 2, '28/02/2081', NULL),
(41, 33, NULL, 1, '2081-2-29', '1', NULL, NULL, 33, '2024-06-11 04:38:22', '2024-06-11 04:38:22', 'App\\Models\\InventoryProduct', 5, '2081-2-29', 2),
(42, 33, NULL, 1, '2081-2-29', '1', NULL, NULL, 33, '2024-06-11 04:43:07', '2024-06-11 04:43:07', 'App\\Models\\InventoryProduct', 5, '2081-2-29', 2),
(43, 2, NULL, 1, '22/02/2081', '1', NULL, NULL, 2, '2024-06-11 05:39:23', '2024-06-11 05:39:23', 'App\\Models\\RawMaterialName', 3, '29/02/2081', 2),
(44, 2, NULL, 1, '2081-2-30', '1', NULL, NULL, 2, '2024-06-12 00:34:01', '2024-06-12 00:34:01', 'App\\Models\\InventoryProduct', 10, '2081-2-30', 3),
(45, 2, NULL, 1, '15/02/2081', '1', NULL, NULL, 2, '2024-06-12 00:37:50', '2024-06-12 00:37:50', 'App\\Models\\RawMaterialName', 12, '22/02/2081', 3),
(46, 2, NULL, 1, '2081-2-30', '1', NULL, NULL, 2, '2024-06-12 00:38:31', '2024-06-12 00:38:41', 'App\\Models\\RawMaterialName', 12, '22/02/2081', 3),
(47, 2, 40, 1, '23/02/2081', '1', NULL, NULL, 2, '2024-06-12 01:17:52', '2024-06-12 01:17:52', 'App\\Models\\InventoryProduct', 13, '2081-2-30', 5),
(48, 2, NULL, 1, '2081-2-30', '1', NULL, NULL, 2, '2024-06-12 01:18:16', '2024-06-12 01:18:21', 'App\\Models\\RawMaterialName', 14, '30/02/2081', 5);

-- --------------------------------------------------------

--
-- Table structure for table `damage_types`
--

CREATE TABLE `damage_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `damage_types`
--

INSERT INTO `damage_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'कुहिएको', '2024-06-05 01:47:22', '2024-06-06 23:13:33'),
(2, 'फुटेको', '2024-06-05 01:55:11', '2024-06-06 23:13:51'),
(3, 'हराएको', '2024-06-05 01:55:23', '2024-06-06 23:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `datri_nikais`
--

CREATE TABLE `datri_nikais` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amounts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `help` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contactor_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactor_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_dealer` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `name`, `email`, `phone`, `address`, `udhyog_id`, `created_at`, `updated_at`, `contactor_name`, `contactor_phone`, `is_dealer`) VALUES
(1, 'test update', 'admin1@gmail.com', '9849649679', 'manhdtr', NULL, '2024-06-09 02:24:44', '2024-06-09 02:28:59', NULL, NULL, 0),
(3, 'राम व्यापारी', 'ramdealer@gmail.com', '9849649679', 'थी लसुन आलूको  अचार', 2, '2024-06-11 02:14:09', '2024-06-19 23:13:52', NULL, NULL, 0),
(4, 'राम लामा', 'ramlamadealer@gmail.com', '88888888888', 'नुवाकोट नेपाल', 2, '2024-06-11 02:15:41', '2024-06-19 23:15:19', NULL, NULL, 0),
(6, 'alu dealer update', 'aludealer@gmail.com', '9849649679', 'manhdtr', 3, '2024-06-11 23:40:07', '2024-06-11 23:40:19', NULL, NULL, 0),
(7, 'papad dealer', 'papaddealer@gmail.com', '88888888888', 'पेप्सी कोल', 5, '2024-06-12 00:58:02', '2024-06-12 00:58:02', NULL, NULL, 0),
(8, 'राम अचार होम', 'ramacharhome@gmail.com', '9849649679', 'धादिंग नेपाल', 2, '2024-06-19 23:44:54', '2024-06-19 23:44:54', 'राम', '98667668758', 1);

-- --------------------------------------------------------

--
-- Table structure for table `debit_credits`
--

CREATE TABLE `debit_credits` (
  `id` bigint UNSIGNED NOT NULL,
  `voucher_id` bigint UNSIGNED DEFAULT NULL,
  `lekha_sirsak_id` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dramount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cramount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalcramt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totaldramt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `province_id` bigint UNSIGNED NOT NULL,
  `district_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `district_en`, `district_np`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bhojpur', 'भोजपुर', NULL, NULL),
(2, 1, 'Dhankuta', 'धनकुटा', NULL, NULL),
(3, 1, 'Ilam', 'इलाम', NULL, NULL),
(4, 1, 'Jhapa', 'झापा', NULL, NULL),
(5, 1, 'Khotang', 'खोटाङ', NULL, NULL),
(6, 1, 'Morang', 'मोरङ', NULL, NULL),
(7, 1, 'Okhaldhunga', 'ओखलढुङ्गा', NULL, NULL),
(8, 1, 'Panchthar', 'पाँचथर', NULL, NULL),
(9, 1, 'Sankhuwasabha', 'संखुवासभा', NULL, NULL),
(10, 1, 'Solukhumbu', 'सोलुखुम्बु', NULL, NULL),
(11, 1, 'Sunsari', 'सुनसरी', NULL, NULL),
(12, 1, 'Taplejung', 'ताप्लेजुङ', NULL, NULL),
(13, 1, 'Tehrathum', 'तेह्रथुम', NULL, NULL),
(14, 1, 'Udayapur', 'उदयपुर', NULL, NULL),
(15, 2, 'Parsa', 'पर्सा', NULL, NULL),
(16, 2, 'Bara', 'बारा', NULL, NULL),
(17, 2, 'Rautahat', 'रौतहट', NULL, NULL),
(18, 2, 'Sarlahi', 'सर्लाही', NULL, NULL),
(19, 2, 'Dhanusa', 'धनुषा', NULL, NULL),
(20, 2, 'Siraha', 'सिराहा', NULL, NULL),
(21, 2, 'Mahottari', 'महोत्तरी', NULL, NULL),
(22, 2, 'Saptari', 'सप्तरी', NULL, NULL),
(23, 3, 'Sindhuli', 'सिन्धुली', NULL, NULL),
(24, 3, 'Ramechhap', 'रामेछाप', NULL, NULL),
(25, 3, 'Dolakha', 'दोलखा', NULL, NULL),
(26, 3, 'Bhaktapur', 'भक्तपुर', NULL, NULL),
(27, 3, 'Dhading', 'धादिङ', NULL, NULL),
(28, 3, 'Kathmandu', 'काठमाडौं', NULL, NULL),
(29, 3, 'Kavrepalanchok', 'काभ्रेपलाञ्चोक', NULL, NULL),
(30, 3, 'Lalitpur', 'ललितपुर', NULL, NULL),
(31, 3, 'Nuwakot', 'नुवाकोट', NULL, NULL),
(32, 3, 'Rasuwa', 'रसुवा', NULL, NULL),
(33, 3, 'Sindhupalchowk', 'सिन्धुपाल्चोक', NULL, NULL),
(34, 3, 'Chitwan', 'चितवन', NULL, NULL),
(35, 3, 'Makwanpur', 'मकवानपुर', NULL, NULL),
(36, 4, 'Baglung', 'बागलुङ', NULL, NULL),
(37, 4, 'Gorkha', 'गोरखा', NULL, NULL),
(38, 4, 'Kaski', 'कास्की', NULL, NULL),
(39, 4, 'Lamjung', 'लमजुङ', NULL, NULL),
(40, 4, 'Manang', 'मनाङ', NULL, NULL),
(41, 4, 'Mustang', 'मुस्ताङ', NULL, NULL),
(42, 4, 'Myagdi', 'म्याग्दी', NULL, NULL),
(43, 4, 'Nawalparasi', 'नवलपुर', NULL, NULL),
(44, 4, 'Parbat', 'पर्वत', NULL, NULL),
(45, 4, 'Syangja', 'स्याङ्जा', NULL, NULL),
(46, 4, 'Tanahun', 'तनहुँ', NULL, NULL),
(47, 5, 'Kapilvastu', 'कपिलवस्तु', NULL, NULL),
(48, 5, 'Parasi', 'परासी', NULL, NULL),
(49, 5, 'Rupandehi', 'रुपन्देही', NULL, NULL),
(50, 5, 'Arghakhanchi', 'अर्घाखाँची', NULL, NULL),
(51, 5, 'Gulmi', 'गुल्मी', NULL, NULL),
(52, 5, 'Palpa', 'पाल्पा', NULL, NULL),
(53, 5, 'Dang', 'दाङ देउखुरी', NULL, NULL),
(54, 5, 'Pyuthan', 'प्युठान', NULL, NULL),
(55, 5, 'Rolpa', 'रोल्पा', NULL, NULL),
(56, 5, 'Eastern Rukum (East)', 'रुकुम (पूर्वी)', NULL, NULL),
(57, 5, 'Banke', 'बाँके', NULL, NULL),
(58, 5, 'Bardiya', 'बर्दिया', NULL, NULL),
(59, 5, 'Western Rukum (West)', 'रूकुम (पश्चिम)', NULL, NULL),
(60, 6, 'Salyan', 'सल्यान', NULL, NULL),
(61, 6, 'Dolpa', 'डोल्पा', NULL, NULL),
(62, 6, 'Humla', 'हुम्ला', NULL, NULL),
(63, 6, 'Jumla', 'जुम्ला', NULL, NULL),
(64, 6, 'Kalikot', 'कालिकोट', NULL, NULL),
(65, 6, 'Mugu', 'मुगु', NULL, NULL),
(66, 6, 'Surkhet', 'सुर्खेत', NULL, NULL),
(67, 6, 'Dailekh', 'दैलेख', NULL, NULL),
(68, 6, 'Jajarkot', 'जाजरकोट', NULL, NULL),
(69, 7, 'Kailali', 'कैलाली', NULL, NULL),
(70, 7, 'Acham', 'अछाम', NULL, NULL),
(71, 7, 'Darcula', 'डोटी', NULL, NULL),
(72, 7, 'Bajhan', 'बझाङ', NULL, NULL),
(73, 7, 'Bajura', 'बाजुरा', NULL, NULL),
(74, 7, 'Kanchanpur', 'कञ्चनपुर', NULL, NULL),
(75, 7, 'Dadeldhura', 'डडेल्धुरा', NULL, NULL),
(76, 7, 'Baitadi', 'बैतडी', NULL, NULL),
(77, 7, 'Darchula', 'दार्चुला', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `farm_id` bigint UNSIGNED DEFAULT NULL,
  `types` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `farm_id`, `types`, `purpose`, `date`, `amount`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 2, '0', 'पारिश्रमिक खर्च', '2081-03-13', '222', NULL, '2024-06-16 00:08:47', '2024-06-16 00:08:47'),
(2, 2, '1', 'ढुवानी खर्च', '2081-03-12', '23', '3232322', '2024-06-16 00:10:55', '2024-06-16 00:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `expepses`
--

CREATE TABLE `expepses` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `profile_id` bigint UNSIGNED DEFAULT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiscal_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baali_cat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_month_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_month_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biubijan_detail` text COLLATE utf8mb4_unicode_ci,
  `total_biubijan_amount` text COLLATE utf8mb4_unicode_ci,
  `mesinary_detail` text COLLATE utf8mb4_unicode_ci,
  `total_mesinary_amount` text COLLATE utf8mb4_unicode_ci,
  `mal_bibran_detail` text COLLATE utf8mb4_unicode_ci,
  `total_mal_bibran_amount` text COLLATE utf8mb4_unicode_ci,
  `worker_detail` text COLLATE utf8mb4_unicode_ci,
  `schedule_detail` text COLLATE utf8mb4_unicode_ci,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seed_batch_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `user_id`, `profile_id`, `unique_id`, `fiscal_year`, `block_id`, `full_name`, `mobile`, `land_id`, `baali_cat`, `baali`, `start_month_id`, `end_month_id`, `start_date`, `end_date`, `biubijan_detail`, `total_biubijan_amount`, `mesinary_detail`, `total_mesinary_amount`, `mal_bibran_detail`, `total_mal_bibran_amount`, `worker_detail`, `schedule_detail`, `added_by`, `seed_batch_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', '0', '[]', '0', '[]', '0', NULL, NULL, '1', NULL, '2024-06-15 23:46:46', '2024-06-15 23:46:46'),
(2, 1, NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[[null,\"Magnam itaque nulla\",\"Adipisci qui modi ad\",\"NaN\",\"Obcaecati officia cu\"],[null,\"Odit iusto non repud\",\"Odit et velit ut pla\",\"NaN\",\"Nihil voluptatum har\"],[null,\"Et nostrum veniam e\",\"Voluptates commodo i\",\"NaN\",\"In molestias velit i\"],[null,\"Optio est praesenti\",\"Qui sint eaque sed d\",\"NaN\",\"Error sequi est ex\"]]', '0', '[[null,\"Qui architecto amet\",\"Debitis esse laborum\",\"NaN\",\"Quidem dolores recus\"],[null,\"Aperiam dolorum nost\",\"Cillum in quia nobis\",\"NaN\",\"Ullam quia irure ut\"],[null,\"Rerum aspernatur sin\",\"Dolore quae enim qui\",\"NaN\",\"Ut reiciendis mollit\"],[null,\"Pariatur Consequatu\",\"In aliquid sit volu\",\"NaN\",\"Placeat ipsam dolor\"]]', '0', '[[null,\"46\",\"67\",\"3082\",\"Sit debitis sit co\"],[null,\"62\",\"83\",\"5146\",\"Nostrum temporibus r\"],[null,\"9\",\"66\",\"594\",\"Tempore earum conse\"]]', '8822', NULL, NULL, '1', NULL, '2024-06-16 00:08:11', '2024-06-16 00:08:11'),
(3, 1, NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[[null,\"Excepturi dolorum co\",\"Voluptate quasi Nam\",\"NaN\",\"Eveniet illo est ea\"]]', '0', '[[null,\"Occaecat quidem ut e\",\"Sint exercitation co\",\"NaN\",\"Voluptatum ad veniam\"]]', '0', '[[null,\"35\",\"10\",\"350\",\"Enim consequuntur bl\"]]', '350', NULL, NULL, '1', NULL, '2024-06-16 10:37:23', '2024-06-16 10:37:23'),
(4, 1, NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, NULL, '[[null,\"Eos temporibus sit\",\"2\",\"NaN\",\"Debitis voluptas ven\"]]', '0', '[[null,\"Ullam quos animi au\",\"Temporibus vel porro\",\"NaN\",\"In sed dolore exerci\"]]', '0', '[[\"mol 2\",\"67\",\"92\",\"6164\",\"Consequat Ut error\"]]', '6164', NULL, NULL, '1', NULL, '2024-06-16 22:50:09', '2024-06-16 22:50:09'),
(5, 1, NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, '2', '3', '2081-03-12', '2081-03-27', '[[null,\"22\",\"22\",\"484\",\"Repudiandae molestia\"]]', '484', '[[\"Qui ducimus qui ips\",\"22\",\"22\",\"484\",\"Iusto magni mollit n\"]]', '484', '[[\"mol 2\",\"69\",\"1\",\"69\",\"Sequi nulla ex rerum\"]]', '69', NULL, NULL, '1', 16, '2024-06-16 22:52:28', '2024-06-16 22:52:28'),
(6, 1, NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[[null,\"Voluptate suscipit q\",\"Quis voluptates est\",\"NaN\",\"Consequuntur asperio\"]]', '0', '[[null,\"Nam et consequuntur\",\"Facere et assumenda\",\"NaN\",\"Aut ut consequat Re\"]]', '0', '[[null,\"99\",\"16\",\"1584\",\"Itaque do eos sed n\"]]', '1584', '[\"16\",\"15\",\"14\"]', NULL, '1', 17, '2024-06-16 22:57:24', '2024-06-16 22:57:24'),
(7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[[\"Qui ducimus qui ips\",\"22\",\"22\",\"484\",\"Assumenda voluptas m\"]]', '484', '[[\"mol 1\",\"1\",\"59\",\"59\",\"Et qui omnis et dolo\"]]', '59', '[\"15\",\"14\",\"12\"]', NULL, '1', 18, '2024-06-16 23:36:07', '2024-06-16 23:36:07'),
(8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[[\"Qui ducimus qui ips\",\"22\",\"22\",\"484\",\"Quas enim pariatur\"],[\"Qui ducimus qui ips\",\"222\",\"22\",\"4884\",\"Qui voluptatum bland\"],[\"Qui ducimus qui ips\",\"22\",\"22\",\"484\",\"Aut numquam aut et v\"]]', '5852', '[[\"mol 1\",\"12\",\"80\",\"960\",\"Voluptas cupiditate\"],[\"mol 1\",\"18\",\"10\",\"180\",\"Ullamco aliquid sed\"],[\"mol 1\",\"32\",\"21\",\"672\",\"Enim modi minus expe\"]]', '1812', '[\"15\",\"12\",\"10\"]', NULL, '1', 19, '2024-06-17 00:37:42', '2024-06-17 00:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint UNSIGNED NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` decimal(10,2) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worker_list_id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `post_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int UNSIGNED DEFAULT NULL,
  `download_count` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance_titles`
--

CREATE TABLE `finance_titles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finance_titles`
--

INSERT INTO `finance_titles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'कच्चा माल को लागत', 1, '2024-06-16 01:50:24', '2024-06-16 01:52:18'),
(2, 'कामदारको ज्याला', 1, '2024-06-16 01:52:43', '2024-06-16 01:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `fiscals`
--

CREATE TABLE `fiscals` (
  `id` bigint UNSIGNED NOT NULL,
  `fiscal_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiscal_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fiscals`
--

INSERT INTO `fiscals` (`id`, `fiscal_np`, `fiscal_en`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '1', '2024-05-27 05:34:31', '2024-05-27 05:34:31'),
(2, '3030', '5050', '1', '2024-05-30 05:29:25', '2024-05-30 05:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `general_families`
--

CREATE TABLE `general_families` (
  `id` bigint UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `family_detail` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_families`
--

INSERT INTO `general_families` (`id`, `unique_id`, `user_id`, `family_detail`, `status`, `created_at`, `updated_at`) VALUES
(2, '27081207', 4, NULL, 1, '2024-05-27 02:27:07', '2024-05-27 02:27:07'),
(3, '27091031', 5, NULL, 1, '2024-05-27 03:25:31', '2024-05-27 03:25:31'),
(4, '27101648', 10, NULL, 1, '2024-05-27 04:31:48', '2024-05-27 04:31:48'),
(5, '27101709', 11, NULL, 1, '2024-05-27 04:32:09', '2024-05-27 04:32:09'),
(6, '27101746', 12, NULL, 1, '2024-05-27 04:32:46', '2024-05-27 04:32:46'),
(7, '27101807', 13, NULL, 1, '2024-05-27 04:33:07', '2024-05-27 04:33:07'),
(8, '28114534', NULL, NULL, 1, '2024-05-28 06:00:34', '2024-05-28 06:00:34'),
(9, '28115435', NULL, NULL, 1, '2024-05-28 06:09:36', '2024-05-28 06:09:36'),
(10, '28121928', NULL, NULL, 1, '2024-05-28 06:34:29', '2024-05-28 06:34:29'),
(11, '29154035', 18, NULL, 1, '2024-05-29 09:55:35', '2024-05-29 09:55:35'),
(12, '29154321', 19, NULL, 1, '2024-05-29 09:58:21', '2024-05-29 09:58:21'),
(13, '29155527', 22, NULL, 1, '2024-05-29 10:10:27', '2024-05-29 10:10:27'),
(14, '29155601', 23, NULL, 1, '2024-05-29 10:11:01', '2024-05-29 10:11:01'),
(15, '29155635', 24, NULL, 1, '2024-05-29 10:11:35', '2024-05-29 10:11:35'),
(16, '30061459', 27, NULL, 1, '2024-05-30 00:29:59', '2024-05-30 00:29:59'),
(17, '30065118', 28, NULL, 1, '2024-05-30 01:06:18', '2024-05-30 01:06:18'),
(18, '30092623', 29, NULL, 1, '2024-05-30 03:41:23', '2024-05-30 03:41:23'),
(19, '30092906', 30, NULL, 1, '2024-05-30 03:44:06', '2024-05-30 03:44:06'),
(20, '30093428', 33, NULL, 1, '2024-05-30 03:49:28', '2024-05-30 03:49:28'),
(21, '30105137', 34, NULL, 1, '2024-05-30 05:06:38', '2024-05-30 05:06:38'),
(22, '13053416', 35, NULL, 1, '2024-06-12 23:49:17', '2024-06-12 23:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `general_lands`
--

CREATE TABLE `general_lands` (
  `id` bigint UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_lands`
--

INSERT INTO `general_lands` (`id`, `unique_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '27071219', '3', '2024-05-27 01:27:19', '2024-05-27 01:27:19'),
(2, '27081207', '4', '2024-05-27 02:27:07', '2024-05-27 02:27:07'),
(3, '27091031', '5', '2024-05-27 03:25:31', '2024-05-27 03:25:31'),
(4, '27101648', '10', '2024-05-27 04:31:48', '2024-05-27 04:31:48'),
(5, '27101709', '11', '2024-05-27 04:32:09', '2024-05-27 04:32:09'),
(6, '27101746', '12', '2024-05-27 04:32:46', '2024-05-27 04:32:46'),
(7, '27101807', '13', '2024-05-27 04:33:07', '2024-05-27 04:33:07'),
(8, '28114534', NULL, '2024-05-28 06:00:34', '2024-05-28 06:00:34'),
(9, '28115435', NULL, '2024-05-28 06:09:36', '2024-05-28 06:09:36'),
(10, '28121928', NULL, '2024-05-28 06:34:29', '2024-05-28 06:34:29'),
(11, '29154035', '18', '2024-05-29 09:55:35', '2024-05-29 09:55:35'),
(12, '29154321', '19', '2024-05-29 09:58:21', '2024-05-29 09:58:21'),
(13, '29155527', '22', '2024-05-29 10:10:27', '2024-05-29 10:10:27'),
(14, '29155601', '23', '2024-05-29 10:11:01', '2024-05-29 10:11:01'),
(15, '29155635', '24', '2024-05-29 10:11:35', '2024-05-29 10:11:35'),
(16, '30061459', '27', '2024-05-30 00:29:59', '2024-05-30 00:29:59'),
(17, '30065118', '28', '2024-05-30 01:06:18', '2024-05-30 01:06:18'),
(18, '30092623', '29', '2024-05-30 03:41:23', '2024-05-30 03:41:23'),
(19, '30092906', '30', '2024-05-30 03:44:06', '2024-05-30 03:44:06'),
(20, '30093428', '33', '2024-05-30 03:49:28', '2024-05-30 03:49:28'),
(21, '30105137', '34', '2024-05-30 05:06:38', '2024-05-30 05:06:38'),
(22, '13053416', '35', '2024-06-12 23:49:17', '2024-06-12 23:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `general_profiles`
--

CREATE TABLE `general_profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_palika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_profiles`
--

INSERT INTO `general_profiles` (`id`, `user_id`, `unique_id`, `full_name`, `email`, `mobile`, `occupation`, `blood_group`, `gender`, `marital_status`, `dob`, `permanent_state`, `permanent_district`, `permanent_palika`, `permanent_ward`, `image`, `status`, `added_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 4, '27081207', 'superadmin', 'admin1@gmail.com', '43434', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-27 02:27:07', '2024-05-27 02:27:07'),
(3, 5, '27091031', 'profile name', 'testemail@gmail.com', '9899890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-27 03:25:31', '2024-05-27 03:25:31'),
(4, 10, '27101648', 'test role', 'r8676@gmail.com', '08907098', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-27 04:31:48', '2024-05-27 04:31:48'),
(5, 11, '27101709', 'bajebocyfa', 'tizi@mailinator.com', 'In fugit laborum E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-27 04:32:09', '2024-05-27 04:32:09'),
(6, 12, '27101746', 'superadmin', 'admin1@gmail.com', 'tryetyrter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-27 04:32:46', '2024-05-27 04:32:46'),
(7, 13, '27101807', 'guhek', 'lugu@mailinator.com', 'Esse iste non occae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-27 04:33:07', '2024-05-27 04:33:07'),
(8, NULL, '28114534', 'sinupupa', 'rupis@mailinator.com', 'In quaerat pariatur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-28 06:00:34', '2024-05-28 06:00:34'),
(9, NULL, '28115435', 'nyhijyj', 'kujuv@mailinator.com', 'Quis nulla est sunt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-28 06:09:36', '2024-05-28 06:09:36'),
(10, NULL, '28121928', 'moxygub', 'wifup@mailinator.com', 'Libero velit tenetu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-28 06:34:29', '2024-05-28 06:34:29'),
(11, 18, '29154035', 'nituw', 'vavywyni@mailinator.com', 'Nostrud deserunt Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-29 09:55:35', '2024-05-29 09:55:35'),
(12, 19, '29154321', 'fizyqevi', 'puqo@mailinator.com', 'Et similique volupta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-29 09:58:21', '2024-05-29 09:58:21'),
(13, 22, '29155527', 'gedijytaw', 'fusoc@mailinator.com', 'Porro vero ad conseq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-29 10:10:27', '2024-05-29 10:10:27'),
(14, 23, '29155601', 'cudiryfybi', 'biqusyjy@mailinator.com', 'Eaque dolorem sit se', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-29 10:11:01', '2024-05-29 10:11:01'),
(15, 24, '29155635', 'koridek', 'perapumyr@mailinator.com', 'Dolore repudiandae a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-29 10:11:35', '2024-05-29 10:11:35'),
(16, 27, '30061459', 'test role', 'test12@gmail.com', '0098973773', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-30 00:29:59', '2024-05-30 00:29:59'),
(17, 28, '30065118', 'mangal tamang', 'mangaletamang22@gmail.com', '645464454', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-30 01:06:18', '2024-05-30 01:06:18'),
(18, 29, '30092623', 'superadmin@gmail.com', 'admin1@gmail.com', 'tryetyrter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-30 03:41:23', '2024-05-30 03:41:23'),
(19, 30, '30092906', 'musojylewa', 'wibow@mailinator.com', 'Accusamus ut cum lab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-30 03:44:06', '2024-05-30 03:44:06'),
(20, 33, '30093428', 'qebugepen', 'xoxave@mailinator.com', 'Omnis qui est omnis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-30 03:49:28', '2024-05-30 03:49:28'),
(21, 34, '30105137', 'test role permission', 'testrolepermission@gmail.com', 'tryetyrter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-05-30 05:06:38', '2024-05-30 05:06:38'),
(22, 35, '13053416', 'test role', 'testrole@gmail.com', '0098973773', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-06-12 23:49:17', '2024-06-12 23:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `general_workers`
--

CREATE TABLE `general_workers` (
  `id` bigint UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` text COLLATE utf8mb4_unicode_ci,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `gender` text COLLATE utf8mb4_unicode_ci,
  `worker_types` text COLLATE utf8mb4_unicode_ci,
  `time` text COLLATE utf8mb4_unicode_ci,
  `salary_type` text COLLATE utf8mb4_unicode_ci,
  `salary` text COLLATE utf8mb4_unicode_ci,
  `occupation` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_workers`
--

INSERT INTO `general_workers` (`id`, `unique_id`, `user_id`, `full_name`, `mobile`, `gender`, `worker_types`, `time`, `salary_type`, `salary`, `occupation`, `created_at`, `updated_at`) VALUES
(1, '27071219', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 01:27:19', '2024-05-27 01:27:19'),
(2, '27081207', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 02:27:07', '2024-05-27 02:27:07'),
(3, '27091031', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 03:25:31', '2024-05-27 03:25:31'),
(4, '27101648', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 04:31:48', '2024-05-27 04:31:48'),
(5, '27101709', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 04:32:09', '2024-05-27 04:32:09'),
(6, '27101746', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 04:32:46', '2024-05-27 04:32:46'),
(7, '27101807', '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27 04:33:07', '2024-05-27 04:33:07'),
(8, '28114534', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-28 06:00:34', '2024-05-28 06:00:34'),
(9, '28115435', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-28 06:09:36', '2024-05-28 06:09:36'),
(10, '28121928', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-28 06:34:29', '2024-05-28 06:34:29'),
(11, '29154035', '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 09:55:35', '2024-05-29 09:55:35'),
(12, '29154321', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 09:58:21', '2024-05-29 09:58:21'),
(13, '29155527', '22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 10:10:27', '2024-05-29 10:10:27'),
(14, '29155601', '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 10:11:01', '2024-05-29 10:11:01'),
(15, '29155635', '24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 10:11:35', '2024-05-29 10:11:35'),
(16, '30061459', '27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 00:29:59', '2024-05-30 00:29:59'),
(17, '30065118', '28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 01:06:18', '2024-05-30 01:06:18'),
(18, '30092623', '29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 03:41:23', '2024-05-30 03:41:23'),
(19, '30092906', '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 03:44:06', '2024-05-30 03:44:06'),
(20, '30093428', '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 03:49:28', '2024-05-30 03:49:28'),
(21, '30105137', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 05:06:38', '2024-05-30 05:06:38'),
(22, '13053416', '35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-12 23:49:17', '2024-06-12 23:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint UNSIGNED NOT NULL,
  `raw_material_id` bigint UNSIGNED NOT NULL,
  `stock_quantity` int DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `raw_material_id`, `stock_quantity`, `last_updated`, `created_at`, `updated_at`) VALUES
(1, 3, 2998, '2024-06-11 00:47:10', '2024-06-06 09:33:02', '2024-06-12 23:55:17'),
(3, 2, 1007, '2024-06-11 00:47:19', '2024-06-06 10:11:08', '2024-06-12 23:55:09'),
(4, 6, 392, '2024-06-06 23:55:46', '2024-06-06 23:55:31', '2024-06-11 23:28:43'),
(5, 12, 2842, '2024-06-17 23:21:45', '2024-06-11 23:21:51', '2024-06-17 23:21:45'),
(6, 13, 5502, '2024-06-17 23:14:01', '2024-06-11 23:34:51', '2024-06-17 23:14:01'),
(7, 14, 1, '2024-06-12 00:55:37', '2024-06-12 00:54:41', '2024-06-12 01:18:16'),
(8, 7, -1459, '2024-06-18 06:33:56', '2024-06-18 06:03:07', '2024-06-19 01:12:22'),
(9, 8, 411, '2024-06-18 06:15:02', '2024-06-18 06:14:54', '2024-06-19 04:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_equipment_categories`
--

CREATE TABLE `inventory_equipment_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_equipment_categories`
--

INSERT INTO `inventory_equipment_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'upakaran kisim 1', '2024-05-28 00:35:12', '2024-05-28 00:35:12'),
(2, 'upakar kisim 2', '2024-05-28 00:35:37', '2024-05-28 00:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_fuel_categories`
--

CREATE TABLE `inventory_fuel_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_fuel_categories`
--

INSERT INTO `inventory_fuel_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'indhan kisim 2', '2024-05-28 00:36:24', '2024-05-28 00:36:24'),
(2, 'indhan kisim 1', '2024-05-28 00:36:44', '2024-05-28 00:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_irrigation_categories`
--

CREATE TABLE `inventory_irrigation_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_irrigation_categories`
--

INSERT INTO `inventory_irrigation_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'sichai kisim', '2024-05-28 00:35:58', '2024-05-28 00:35:58'),
(2, 'sichai kisim 2', '2024-05-28 00:36:10', '2024-05-28 00:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_land_categories`
--

CREATE TABLE `inventory_land_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_land_categories`
--

INSERT INTO `inventory_land_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'jamin kisim 2', '2024-05-28 00:34:16', '2024-05-28 00:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_products`
--

CREATE TABLE `inventory_products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `stock_quantity` int DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `total_produced` bigint DEFAULT NULL,
  `alert_days` bigint DEFAULT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `production_batch_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_products`
--

INSERT INTO `inventory_products` (`id`, `name`, `description`, `image`, `price`, `stock_quantity`, `unit_id`, `created_at`, `updated_at`, `expiry_date`, `total_produced`, `alert_days`, `udhyog_id`, `production_batch_id`) VALUES
(5, 'आलु चिप्स', NULL, NULL, '233.00', 2158, 2, '2024-06-06 22:56:27', '2024-06-17 03:36:18', NULL, NULL, 2, NULL, NULL),
(6, 'पापड', 'आँप  मसला  आलु  कुहिएको   फुटेको  हराएको  जम्मा संख्या थमन थारु  पेप्सी कोल  कच्चा पदार्थ   मूला  गाँजर पापड', '/upload_file/inventory_product/1717739551_1315193117_Screenshot from 2024-06-02 12-00-55.png', '417.00', 1863, 1, '2024-06-07 00:07:31', '2024-06-12 23:55:09', NULL, NULL, 1, NULL, NULL),
(7, 'फ्रेन्च फ्राई', 'ewewew', NULL, '417.00', 36, 2, '2024-06-07 02:08:24', '2024-06-10 01:37:04', NULL, NULL, 2, NULL, NULL),
(8, 'आलूको  अचार', 'फाइनान्सको शीर्षक छान्नुहोस् जम्मा ru  मलको जम्मा मूल्य रु  aaap को yo जम्मा मूल्य कछा पदार्थको विवरण क्षतीको विवरण जम्मा चेक क्याश ब्याच नं जम्मा एडमिन होइन भन्ने अचार आलु चिप्स दुध पापड हैब्रिड बिउ राम लामा नुवाकोट नेपाल सीता नमुना सप्लैर सीता बुढाथोकी नमुना अधिकारी बिराट नगर आँप मुला नुन तेल मेथी लसुन आलूको  अचार', NULL, '417.00', 556, 1, '2024-06-11 03:56:50', '2024-06-19 23:10:49', '2024-06-19 18:15:00', NULL, 2, 2, NULL),
(9, 'खुर्सानी तिलको अचार', 'फाइनान्सको शीर्षक छान्नुहोस् जम्मा ru  मलको जम्मा मूल्य रु  aaap को yo जम्मा मूल्य कछा पदार्थको विवरण क्षतीको विवरण जम्मा चेक क्याश ब्याच नं जम्मा एडमिन होइन भन्ने अचार आलु चिप्स दुध पापड हैब्रिड बिउ राम लामा नुवाकोट नेपाल सीता नमुना सप्लैर सीता बुढाथोकी नमुना अधिकारी बिराट नगर आँप मुला नुन तेल मेथी लसुन आलूको  अचार', NULL, '417.00', 4514, 1, '2024-06-11 03:57:14', '2024-06-19 23:11:53', '2024-06-19 18:15:00', NULL, 2, 2, NULL),
(10, 'alu chips update', 'eqeqwq', NULL, '575.00', 1031, 1, '2024-06-11 23:51:08', '2024-06-18 01:04:25', '2024-06-11 18:15:00', NULL, 2, 3, NULL),
(11, 'alu chips', 'eqeqwq', NULL, '575.00', 3543, 1, '2024-06-11 23:54:05', '2024-06-18 00:43:04', NULL, NULL, 2, 3, NULL),
(12, 'anarase papad', '212122', NULL, '417.00', 12, 1, '2024-06-12 00:56:23', '2024-06-12 00:56:23', '2024-06-11 18:15:00', NULL, 2, 5, NULL),
(13, 'dhading paapd', '22222', NULL, '575.00', 232, 1, '2024-06-12 00:56:48', '2024-06-12 01:17:52', '2024-06-11 18:15:00', NULL, 2, 5, NULL),
(14, 'पुदिना पातको अचार', 'फाइनान्सको शीर्षक छान्नुहोस् जम्मा ru  मलको जम्मा मूल्य रु  aaap को yo जम्मा मूल्य कछा पदार्थको विवरण क्षतीको विवरण जम्मा चेक क्याश ब्याच नं जम्मा एडमिन होइन भन्ने अचार आलु चिप्स दुध पापड हैब्रिड बिउ राम लामा नुवाकोट नेपाल सीता नमुना सप्लैर सीता बुढाथोकी नमुना अधिकारी बिराट नगर आँप मुला नुन तेल मेथी लसुन आलूको  अचार', NULL, '22.00', 55, 1, '2024-06-17 01:01:07', '2024-06-19 23:12:31', '2024-06-19 18:15:00', NULL, 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_store_categories`
--

CREATE TABLE `inventory_store_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_store_categories`
--

INSERT INTO `inventory_store_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'goda kisim', '2024-05-28 00:34:44', '2024-05-28 00:34:44'),
(2, 'godam kisim 2', '2024-05-28 00:34:56', '2024-05-28 00:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `karyatalika_bibrans`
--

CREATE TABLE `karyatalika_bibrans` (
  `id` bigint UNSIGNED NOT NULL,
  `farm_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_team` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyatalika_bibrans`
--

INSERT INTO `karyatalika_bibrans` (`id`, `farm_id`, `title`, `start_date`, `end_date`, `complete_status`, `working_team`, `remarks`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'eww', '2081-03-27', '2081-03-20', '1', '9', NULL, '/upload_file/farm/1718517292_1433409226_handywheel.jpg', '2024-06-16 00:09:52', '2024-06-16 00:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `land_lists`
--

CREATE TABLE `land_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `land_id` bigint UNSIGNED NOT NULL,
  `kita_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_palika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ekai_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalbigaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalkattha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totaldhur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalropani` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalaana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalpaisa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totaldam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lekha_sirsaks`
--

CREATE TABLE `lekha_sirsaks` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lekha_sirsaks`
--

INSERT INTO `lekha_sirsaks` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'शेयर', '1', NULL, NULL),
(2, 'कोष हिसाब', '1', NULL, NULL),
(3, 'निक्षेप', '1', NULL, NULL),
(4, 'नगद', '1', NULL, NULL),
(5, 'बैंक', '1', NULL, NULL),
(6, 'लिएको ऋण', '1', NULL, NULL),
(7, 'लिनुपर्ने हिसाब', '1', NULL, NULL),
(8, 'लगानी', '1', NULL, NULL),
(9, 'सम्पती', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `local_levels`
--

CREATE TABLE `local_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `local_level_id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `govt_level_id` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_govt_type_id` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_name_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dist_id` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_province_id` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_dist_id` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_local_id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mal_bibrans`
--

CREATE TABLE `mal_bibrans` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anudaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mal_bibrans`
--

INSERT INTO `mal_bibrans` (`id`, `title`, `anudaan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mol 1', NULL, '1', '2024-06-15 23:49:57', '2024-06-15 23:49:57'),
(2, 'mol 2', NULL, '1', '2024-06-15 23:50:06', '2024-06-15 23:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `mesinaries`
--

CREATE TABLE `mesinaries` (
  `id` bigint UNSIGNED NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ekai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tools` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `criteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mesinaries`
--

INSERT INTO `mesinaries` (`id`, `purpose`, `ekai`, `tools`, `criteria`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Qui praesentium sit', '12', 'Qui ducimus qui ips', 'Optio est eiusmod', '1', '2024-05-27 05:26:52', '2024-05-27 05:26:52');

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
(1, '2014_10_11_105235_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2019_12_15_071518_create_provinces_table', 1),
(8, '2019_12_15_071519_create_districts_table', 1),
(9, '2019_12_15_080304_create_palikas_table', 1),
(10, '2022_08_16_051100_create_settings_table', 1),
(11, '2022_09_08_111850_create_notifications_table', 1),
(12, '2022_12_05_105826_create_files_table', 1),
(13, '2023_01_11_080036_create_units_table', 1),
(14, '2023_07_19_103704_create_general_profiles_table', 1),
(15, '2023_07_20_053953_create_general_families_table', 1),
(16, '2023_07_20_102813_create_general_lands_table', 1),
(17, '2023_07_20_102814_create_land_lists_table', 1),
(18, '2023_07_20_102815_create_general_workers_table', 1),
(19, '2023_07_21_080707_create_beema_categories_table', 1),
(20, '2023_07_21_080738_create_worker_types_table', 1),
(21, '2023_07_21_080739_create_worker_positions_table', 1),
(22, '2023_07_21_080740_create_state_months_table', 1),
(23, '2023_07_21_080741_create_animal_categories_table', 1),
(24, '2023_07_21_080742_create_animals_table', 1),
(25, '2023_07_21_080743_create_agriculture_categories_table', 1),
(26, '2023_07_21_080744_create_agricultures_table', 1),
(27, '2023_07_21_080745_create_beemas_table', 1),
(28, '2023_07_21_080746_create_talims_table', 1),
(29, '2023_07_21_080747_create_mal_bibrans_table', 1),
(30, '2023_07_21_080748_create_anudaan_categories_table', 1),
(31, '2023_07_21_080748_create_anudanns_table', 1),
(32, '2023_07_21_080749_create_datri_nikais_table', 1),
(33, '2023_07_21_083150_create_worker_lists_table', 1),
(34, '2023_08_21_070005_create_categories_table', 1),
(35, '2023_08_22_071502_create_local_levels_table', 1),
(36, '2023_08_22_083010_create_biu_bijans_table', 1),
(37, '2023_08_22_083108_create_mesinaries_table', 1),
(38, '2023_08_22_083227_create_sangrachanas_table', 1),
(39, '2023_09_03_062256_create_farms_table', 1),
(40, '2023_09_03_074622_create_karyatalika_bibrans_table', 1),
(41, '2023_09_03_082224_create_fiscals_table', 1),
(42, '2023_09_03_115509_create_expenses_table', 1),
(43, '2023_09_04_100426_create_months_table', 1),
(44, '2023_09_04_101405_create_ritus_table', 1),
(45, '2023_12_13_065949_create_expepses_table', 1),
(46, '2024_01_12_064710_create_inventory_land_categories_table', 1),
(47, '2024_01_12_064738_create_inventory_store_categories_table', 1),
(48, '2024_01_12_064758_create_inventory_equipment_categories_table', 1),
(49, '2024_01_12_064846_create_inventory_irrigation_categories_table', 1),
(50, '2024_01_12_064918_create_inventory_fuel_categories_table', 1),
(51, '2024_01_13_073912_create_blocks_table', 1),
(52, '2024_01_13_104712_create_properties_table', 1),
(53, '2024_01_14_065259_create_animal_farms_table', 1),
(54, '2024_01_25_110040_create_udhyogs_table', 1),
(55, '2024_01_25_110041_create_products_table', 1),
(56, '2024_01_26_055109_create_billings_table', 1),
(57, '2024_02_02_064239_create_billing_details_table', 1),
(58, '2024_02_19_112834_create_voucher_categories_table', 1),
(59, '2024_02_20_102728_create_lekha_sirsaks_table', 1),
(60, '2024_02_20_103333_create_vouchers_table', 1),
(61, '2024_02_29_073426_create_debit_credits_table', 1),
(62, '2025_09_05_091118_create_permission_tables', 2),
(63, '2024_05_28_073743_create_udhyog_achars_table', 3),
(64, '2024_05_31_053320_add_columns_to_vouchers_table', 4),
(65, '2024_05_31_051713_create_vouchar_dr_crs_table', 5),
(66, '2024_05_31_064822_vouchar_dr_crs', 6),
(67, '2024_06_02_074750_add_udhyog_id_to_worker_positions_table', 7),
(68, '2024_06_02_074841_add_udhyog_id_to_worker_list_table', 7),
(69, '2024_06_02_074918_add_udhyog_id_to_worker_types_table', 7),
(70, '2024_06_03_101243_create_suppliers_table', 8),
(71, '2024_06_03_114253_create_raw_materials_table', 9),
(72, '2024_06_04_052128_create_inventory_products_table', 10),
(73, '2024_06_04_062424_create_production_batches_table', 11),
(74, '2024_06_04_104435_create_production_batch_raw_materials_table', 12),
(75, '2024_06_05_052048_create_damage_types_table', 13),
(76, '2024_06_05_051623_create_damage_records_table', 14),
(77, '2024_06_05_060112_update_damage_records_table', 15),
(78, '2024_06_06_062125_create_production_batch_products_table', 16),
(79, '2024_06_06_110218_create_raw_material_names_table', 17),
(80, '2024_06_06_144057_create_inventories_table', 18),
(81, '2024_06_09_074314_create_dealers_table', 19),
(82, '2024_06_09_073434_create_sales_orders_table', 20),
(83, '2024_06_09_073933_create_sales_order_items_table', 21),
(84, '2024_06_12_072711_create_training_people_table', 22),
(85, '2024_06_12_073552_create_person_training_table', 23),
(86, '2024_06_12_115350_create_training_phases_table', 24),
(87, '2024_06_13_064840_create_seed_types_table', 25),
(88, '2024_06_13_064428_create_seeds_table', 26),
(89, '2024_06_14_053900_create_seasons_table', 27),
(90, '2024_06_14_051526_create_seed_batches_table', 28),
(91, '2024_06_14_064952_create_seed_batch_productions_table', 29),
(92, '2024_06_16_064218_create_fianance_titles_table', 30),
(93, '2024_06_19_055526_create_production_batch_workers_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 1),
(25, 'App\\Models\\User', 1),
(26, 'App\\Models\\User', 1),
(27, 'App\\Models\\User', 1),
(28, 'App\\Models\\User', 1),
(29, 'App\\Models\\User', 1),
(30, 'App\\Models\\User', 1),
(31, 'App\\Models\\User', 1),
(32, 'App\\Models\\User', 1),
(33, 'App\\Models\\User', 1),
(34, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 1),
(36, 'App\\Models\\User', 1),
(37, 'App\\Models\\User', 1),
(38, 'App\\Models\\User', 1),
(39, 'App\\Models\\User', 1),
(40, 'App\\Models\\User', 1),
(41, 'App\\Models\\User', 1),
(42, 'App\\Models\\User', 1),
(43, 'App\\Models\\User', 1),
(44, 'App\\Models\\User', 1),
(45, 'App\\Models\\User', 1),
(46, 'App\\Models\\User', 1),
(47, 'App\\Models\\User', 1),
(48, 'App\\Models\\User', 1),
(49, 'App\\Models\\User', 1),
(50, 'App\\Models\\User', 1),
(51, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 1),
(53, 'App\\Models\\User', 1),
(54, 'App\\Models\\User', 1),
(55, 'App\\Models\\User', 1),
(56, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 1),
(58, 'App\\Models\\User', 1),
(59, 'App\\Models\\User', 1),
(60, 'App\\Models\\User', 1),
(61, 'App\\Models\\User', 1),
(62, 'App\\Models\\User', 1),
(63, 'App\\Models\\User', 1),
(64, 'App\\Models\\User', 1),
(65, 'App\\Models\\User', 1),
(66, 'App\\Models\\User', 1),
(67, 'App\\Models\\User', 1),
(68, 'App\\Models\\User', 1),
(69, 'App\\Models\\User', 1),
(70, 'App\\Models\\User', 1),
(71, 'App\\Models\\User', 1),
(72, 'App\\Models\\User', 1),
(73, 'App\\Models\\User', 1),
(74, 'App\\Models\\User', 1),
(75, 'App\\Models\\User', 1),
(76, 'App\\Models\\User', 1),
(77, 'App\\Models\\User', 1),
(78, 'App\\Models\\User', 1),
(79, 'App\\Models\\User', 1),
(80, 'App\\Models\\User', 1),
(81, 'App\\Models\\User', 1),
(82, 'App\\Models\\User', 1),
(83, 'App\\Models\\User', 1),
(84, 'App\\Models\\User', 1),
(85, 'App\\Models\\User', 1),
(86, 'App\\Models\\User', 1),
(87, 'App\\Models\\User', 1),
(88, 'App\\Models\\User', 1),
(89, 'App\\Models\\User', 1),
(90, 'App\\Models\\User', 1),
(91, 'App\\Models\\User', 1),
(92, 'App\\Models\\User', 1),
(93, 'App\\Models\\User', 1),
(94, 'App\\Models\\User', 1),
(95, 'App\\Models\\User', 1),
(96, 'App\\Models\\User', 1),
(97, 'App\\Models\\User', 1),
(98, 'App\\Models\\User', 1),
(99, 'App\\Models\\User', 1),
(100, 'App\\Models\\User', 1),
(101, 'App\\Models\\User', 1),
(102, 'App\\Models\\User', 1),
(103, 'App\\Models\\User', 1),
(104, 'App\\Models\\User', 1),
(105, 'App\\Models\\User', 1),
(106, 'App\\Models\\User', 1),
(107, 'App\\Models\\User', 1),
(108, 'App\\Models\\User', 1),
(109, 'App\\Models\\User', 1),
(110, 'App\\Models\\User', 1),
(111, 'App\\Models\\User', 1),
(112, 'App\\Models\\User', 1),
(113, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 28),
(7, 'App\\Models\\User', 28),
(8, 'App\\Models\\User', 28),
(9, 'App\\Models\\User', 28),
(10, 'App\\Models\\User', 28),
(11, 'App\\Models\\User', 28),
(12, 'App\\Models\\User', 28),
(13, 'App\\Models\\User', 28),
(14, 'App\\Models\\User', 28),
(15, 'App\\Models\\User', 28),
(16, 'App\\Models\\User', 28),
(17, 'App\\Models\\User', 28),
(18, 'App\\Models\\User', 28),
(19, 'App\\Models\\User', 28),
(20, 'App\\Models\\User', 28),
(21, 'App\\Models\\User', 28),
(22, 'App\\Models\\User', 28),
(23, 'App\\Models\\User', 28),
(24, 'App\\Models\\User', 28),
(25, 'App\\Models\\User', 28),
(26, 'App\\Models\\User', 28),
(27, 'App\\Models\\User', 28),
(28, 'App\\Models\\User', 28),
(29, 'App\\Models\\User', 28),
(30, 'App\\Models\\User', 28),
(31, 'App\\Models\\User', 28),
(32, 'App\\Models\\User', 28),
(33, 'App\\Models\\User', 28),
(34, 'App\\Models\\User', 28),
(35, 'App\\Models\\User', 28),
(36, 'App\\Models\\User', 28),
(37, 'App\\Models\\User', 28),
(38, 'App\\Models\\User', 28),
(39, 'App\\Models\\User', 28),
(40, 'App\\Models\\User', 28),
(41, 'App\\Models\\User', 28),
(45, 'App\\Models\\User', 28),
(46, 'App\\Models\\User', 28),
(47, 'App\\Models\\User', 28),
(49, 'App\\Models\\User', 28),
(50, 'App\\Models\\User', 28),
(51, 'App\\Models\\User', 28),
(52, 'App\\Models\\User', 28),
(53, 'App\\Models\\User', 28),
(54, 'App\\Models\\User', 28),
(55, 'App\\Models\\User', 28),
(56, 'App\\Models\\User', 28),
(57, 'App\\Models\\User', 28),
(59, 'App\\Models\\User', 28),
(60, 'App\\Models\\User', 28),
(62, 'App\\Models\\User', 28),
(63, 'App\\Models\\User', 28),
(65, 'App\\Models\\User', 28),
(66, 'App\\Models\\User', 28),
(68, 'App\\Models\\User', 28),
(69, 'App\\Models\\User', 28),
(71, 'App\\Models\\User', 28),
(72, 'App\\Models\\User', 28),
(74, 'App\\Models\\User', 28),
(75, 'App\\Models\\User', 28),
(77, 'App\\Models\\User', 28),
(78, 'App\\Models\\User', 28),
(80, 'App\\Models\\User', 28),
(83, 'App\\Models\\User', 28),
(86, 'App\\Models\\User', 28),
(89, 'App\\Models\\User', 28),
(90, 'App\\Models\\User', 28),
(92, 'App\\Models\\User', 28),
(93, 'App\\Models\\User', 28),
(94, 'App\\Models\\User', 28),
(95, 'App\\Models\\User', 28),
(96, 'App\\Models\\User', 28),
(97, 'App\\Models\\User', 28),
(98, 'App\\Models\\User', 28),
(99, 'App\\Models\\User', 28),
(1, 'App\\Models\\User', 35),
(4, 'App\\Models\\User', 35),
(5, 'App\\Models\\User', 35),
(6, 'App\\Models\\User', 35),
(7, 'App\\Models\\User', 35),
(8, 'App\\Models\\User', 35),
(9, 'App\\Models\\User', 35),
(10, 'App\\Models\\User', 35),
(11, 'App\\Models\\User', 35),
(12, 'App\\Models\\User', 35),
(13, 'App\\Models\\User', 35),
(14, 'App\\Models\\User', 35),
(15, 'App\\Models\\User', 35),
(16, 'App\\Models\\User', 35),
(17, 'App\\Models\\User', 35),
(18, 'App\\Models\\User', 35),
(19, 'App\\Models\\User', 35),
(20, 'App\\Models\\User', 35),
(21, 'App\\Models\\User', 35),
(22, 'App\\Models\\User', 35),
(23, 'App\\Models\\User', 35),
(24, 'App\\Models\\User', 35),
(25, 'App\\Models\\User', 35),
(26, 'App\\Models\\User', 35),
(27, 'App\\Models\\User', 35),
(28, 'App\\Models\\User', 35),
(29, 'App\\Models\\User', 35),
(30, 'App\\Models\\User', 35),
(31, 'App\\Models\\User', 35),
(32, 'App\\Models\\User', 35),
(33, 'App\\Models\\User', 35),
(34, 'App\\Models\\User', 35),
(35, 'App\\Models\\User', 35),
(36, 'App\\Models\\User', 35),
(37, 'App\\Models\\User', 35),
(38, 'App\\Models\\User', 35),
(39, 'App\\Models\\User', 35),
(40, 'App\\Models\\User', 35),
(41, 'App\\Models\\User', 35),
(42, 'App\\Models\\User', 35),
(43, 'App\\Models\\User', 35),
(44, 'App\\Models\\User', 35),
(45, 'App\\Models\\User', 35),
(46, 'App\\Models\\User', 35),
(47, 'App\\Models\\User', 35),
(48, 'App\\Models\\User', 35),
(49, 'App\\Models\\User', 35),
(50, 'App\\Models\\User', 35),
(51, 'App\\Models\\User', 35),
(52, 'App\\Models\\User', 35),
(53, 'App\\Models\\User', 35),
(54, 'App\\Models\\User', 35),
(55, 'App\\Models\\User', 35),
(56, 'App\\Models\\User', 35),
(57, 'App\\Models\\User', 35),
(58, 'App\\Models\\User', 35),
(59, 'App\\Models\\User', 35),
(60, 'App\\Models\\User', 35),
(61, 'App\\Models\\User', 35),
(62, 'App\\Models\\User', 35),
(63, 'App\\Models\\User', 35),
(64, 'App\\Models\\User', 35),
(65, 'App\\Models\\User', 35),
(66, 'App\\Models\\User', 35),
(67, 'App\\Models\\User', 35),
(68, 'App\\Models\\User', 35),
(69, 'App\\Models\\User', 35),
(70, 'App\\Models\\User', 35),
(71, 'App\\Models\\User', 35),
(72, 'App\\Models\\User', 35),
(73, 'App\\Models\\User', 35),
(74, 'App\\Models\\User', 35),
(75, 'App\\Models\\User', 35),
(76, 'App\\Models\\User', 35),
(77, 'App\\Models\\User', 35),
(78, 'App\\Models\\User', 35),
(79, 'App\\Models\\User', 35),
(80, 'App\\Models\\User', 35),
(81, 'App\\Models\\User', 35),
(82, 'App\\Models\\User', 35),
(83, 'App\\Models\\User', 35),
(84, 'App\\Models\\User', 35),
(85, 'App\\Models\\User', 35),
(86, 'App\\Models\\User', 35),
(87, 'App\\Models\\User', 35),
(88, 'App\\Models\\User', 35),
(89, 'App\\Models\\User', 35),
(90, 'App\\Models\\User', 35),
(91, 'App\\Models\\User', 35),
(92, 'App\\Models\\User', 35),
(93, 'App\\Models\\User', 35),
(94, 'App\\Models\\User', 35),
(95, 'App\\Models\\User', 35),
(96, 'App\\Models\\User', 35),
(97, 'App\\Models\\User', 35),
(98, 'App\\Models\\User', 35),
(99, 'App\\Models\\User', 35),
(100, 'App\\Models\\User', 35),
(101, 'App\\Models\\User', 35),
(102, 'App\\Models\\User', 35),
(103, 'App\\Models\\User', 35),
(104, 'App\\Models\\User', 35),
(105, 'App\\Models\\User', 35),
(106, 'App\\Models\\User', 35),
(107, 'App\\Models\\User', 35),
(108, 'App\\Models\\User', 35),
(109, 'App\\Models\\User', 35),
(110, 'App\\Models\\User', 35),
(111, 'App\\Models\\User', 35),
(112, 'App\\Models\\User', 35),
(113, 'App\\Models\\User', 35);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(7, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 15),
(7, 'App\\Models\\User', 16),
(8, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(3, 'App\\Models\\User', 24),
(7, 'App\\Models\\User', 25),
(7, 'App\\Models\\User', 26),
(8, 'App\\Models\\User', 27),
(8, 'App\\Models\\User', 28),
(2, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 31),
(2, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 33),
(7, 'App\\Models\\User', 34),
(3, 'App\\Models\\User', 35);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` bigint UNSIGNED NOT NULL,
  `month_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month_en`, `month_np`, `created_at`, `updated_at`) VALUES
(1, 'January', 'बैशाख', NULL, NULL),
(2, 'February', 'जेष्ठ', NULL, NULL),
(3, 'March', 'असार', NULL, NULL),
(4, 'April', 'साउन', NULL, NULL),
(5, 'May', 'भदौ', NULL, NULL),
(6, 'June', 'असोज', NULL, NULL),
(7, 'July', 'कार्तिक', NULL, NULL),
(8, 'August', 'मंसिर', NULL, NULL),
(9, 'September', 'पुष', NULL, NULL),
(10, 'October', 'माघ', NULL, NULL),
(11, 'November', 'फाल्गुन', NULL, NULL),
(12, 'December', 'चैत्र', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `palikas`
--

CREATE TABLE `palikas` (
  `id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `palika_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `palika_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `palikas`
--

INSERT INTO `palikas` (`id`, `district_id`, `palika_en`, `palika_np`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bhojpur Municipality', 'भोजपुर नगरपालिका', NULL, NULL),
(2, 1, 'Shadanand Municipality', 'षडानन्द नगरपालिका', NULL, NULL),
(3, 1, 'Aamchok Rural Municipality', 'आमचोक गाउँपालिका', NULL, NULL),
(4, 1, 'Tyamke Maiyum', 'ट्याम्केमैयुम गाउँपालिका', NULL, NULL),
(5, 1, 'Arun Rural Municipality', 'अरुण गाउँपालिका', NULL, NULL),
(6, 1, 'Pauwadungma Rural Municipality', 'पौवादुङमा गाउँपालिका', NULL, NULL),
(7, 1, 'Salpasilichho Rural Municipality', 'साल्पासिलिछो गाउँपालिका', NULL, NULL),
(8, 1, 'Hatuwagadhi Rural Municipality', 'हतुवागढी गाउँपालिका', NULL, NULL),
(9, 1, 'Ramprasad Rai Rural Municipality', 'रामप्रसाद राई गाउँपालिका', NULL, NULL),
(10, 2, 'Paakhribas Municipality', 'पाख्रिबास नगरपालिका', NULL, NULL),
(11, 2, 'Dhankuta Municipality', 'धनकुटा नगरपालिका', NULL, NULL),
(12, 2, 'Mahalaxmi Municipality', 'महालक्ष्मी नगरपालिका', NULL, NULL),
(13, 2, 'Sangurigadhi Rural Municipality', 'सागुरीगढी गाउँपालिका', NULL, NULL),
(14, 2, 'Sahidbhumi Rural Municipality', 'सहीदभूमि गाउँपालिका', NULL, NULL),
(15, 2, 'Chhathar Jorpati Rural Municipality', 'छथर जोरपाटी गाउँपालिका', NULL, NULL),
(16, 2, 'Chaubise Rural Municipality', 'चौविसे गाउँपालिका', NULL, NULL),
(17, 3, 'Iilam Municipality', 'ईलाम नगरपालिका', NULL, NULL),
(18, 3, 'Deumaai Municipality', 'देउमाई नगरपालिका', NULL, NULL),
(19, 3, 'Maai Municipality', 'माई नगरपालिका', NULL, NULL),
(20, 3, 'Suryodaya Municipality', 'सूर्योदय नगरपालिका', NULL, NULL),
(21, 3, 'Phakphokthum Rural Municipality', 'फाकफोकथुम गाउँपालिका', NULL, NULL),
(22, 3, 'Mai Jogmai Rural Municipality', 'माईजोगमाई गाउँपालिका', NULL, NULL),
(23, 3, 'Chulachuli Rural Municipality', 'चुलाचुली गाउँपालिका', NULL, NULL),
(24, 3, 'Rong Rural Municipality', 'रोङ गाउँपालिका', NULL, NULL),
(25, 3, 'Mangsebung Rural Municipality', 'माङसेबुङ गाउँपालिका', NULL, NULL),
(26, 3, 'Sandakpur Rural Municipality', 'सन्दकपुर गाउँपालिका', NULL, NULL),
(27, 4, 'Mechinagar Municipality', 'मेचीनगर नगरपालिका', NULL, NULL),
(28, 4, 'Damak Municipality', 'दमक नगरपालिका', NULL, NULL),
(29, 4, 'Kankai Municipality', 'कन्काई नगरपालिका', NULL, NULL),
(30, 4, 'Bhadrapur Municipality', 'भद्रपुर नगरपालिका', NULL, NULL),
(31, 4, 'Arjundhara Municipality', 'अर्जुनधारा नगरपालिका', NULL, NULL),
(32, 4, 'Shivasatakshi Municipality', 'शिवसताक्षी नगरपालिका', NULL, NULL),
(33, 4, 'Gauraadaha Municipality', 'गौरादह नगरपालिका', NULL, NULL),
(34, 4, 'Birtamod Municipality', 'विर्तामोड नगरपालिका', NULL, NULL),
(35, 4, 'Kamal Rural Municipality', 'कमल गाउँपालिका', NULL, NULL),
(36, 4, 'Buddha Shanti Rural Municipality', 'बुद्धशान्ति गाउँपालिका', NULL, NULL),
(37, 4, 'Kachankawal Rural Municipality', 'कचनकवल गाउँपालिका', NULL, NULL),
(38, 4, 'Jhapa Rural Municipality', 'झापा गाउँपालिका', NULL, NULL),
(39, 4, 'Barhadashi Rural Municipality', 'बाह्रदशी गाउँपालिका', NULL, NULL),
(40, 4, 'Gaurigunj Rural Municipality', 'गौरीगंज गाउँपालिका', NULL, NULL),
(41, 5, 'Haldibari Rural Municipality', 'हल्दीवारी गाउँपालिका', NULL, NULL),
(42, 5, 'Rupakot Majhuwagadhi Municipality', 'रुपाकोट मझुवागढ़ी नगरपालिका', NULL, NULL),
(43, 5, 'Khotehang Rural Municipality', 'खोटेहाङ गाउँपालिका', NULL, NULL),
(44, 5, 'Diprung Rural Municipality', 'दिप्रुङ गाउँपालिका', NULL, NULL),
(45, 5, 'Aiselukharka Rural Municipality', 'ऐसेलुखर्क गाउँपालिका', NULL, NULL),
(46, 5, 'Jantedhunga Rural Municipality', 'जन्तेढुंगा गाउँपालिका', NULL, NULL),
(47, 5, 'Kepilasgadhi Rural Municipality', 'केपिलासगढी गाउँपालिका', NULL, NULL),
(48, 5, 'Barahpokhari Rural Municipality', 'बराहपोखरी गाउँपालिका', NULL, NULL),
(49, 5, 'Lamidanda Rural Municipality', 'लामीडाँडा गाउँपालिका', NULL, NULL),
(50, 6, 'Sakela Rural Municipality', 'साकेला गाउँपालिका', NULL, NULL),
(51, 6, 'Biratnagar Sub-Metropolitan', 'विराटनगर उपमहानगरपालिका', NULL, NULL),
(52, 6, 'Belbari Municipality', 'बेलबारी नगरपालिका', NULL, NULL),
(53, 6, 'Letang Municipality', 'लेटांग नगरपालिका', NULL, NULL),
(54, 6, 'Pathari Sanischari Municipality', 'पथरी शनिश्चरे नगरपालिका', NULL, NULL),
(55, 6, 'Rangeli Municipality', 'रंगेली नगरपालिका', NULL, NULL),
(56, 6, 'Ratuwamaai Municipality', 'रतुवामाई नगरपालिका', NULL, NULL),
(57, 6, 'Sunwarsi Municipality', 'सुनवर्षी नगरपालिका', NULL, NULL),
(58, 6, 'Urlabari Municipality', 'उर्लाबारी नगरपालिका', NULL, NULL),
(59, 6, 'Sundarharaicha Municipality', 'सुन्दरहरैचा नगरपालिका', NULL, NULL),
(60, 6, 'Jahada Rural Municipality', 'जहदा गाउँपालिका', NULL, NULL),
(61, 6, 'Budi Ganga Rural Municipality', 'बुढीगंगा गाउँपालिका', NULL, NULL),
(62, 6, 'Katahari Rural Municipality', 'कटहरी गाउँपालिका', NULL, NULL),
(63, 6, 'Dhanpalthan Rural Municipality', 'धनपालथान गाउँपालिका', NULL, NULL),
(64, 6, 'Kanepokhari Rural Municipality', 'कानेपोखरी गाउँपालिका', NULL, NULL),
(65, 6, 'Gramthan Rural Municipality', 'ग्रामथान गाउँपालिका', NULL, NULL),
(66, 6, 'Kerabari Rural Municipality', 'केरावारी गाउँपालिका', NULL, NULL),
(67, 6, 'Miklajung Rural Municipality', 'मिक्लाजुङ गाउँपालिका', NULL, NULL),
(68, 7, 'Siddhicharan Municipality', 'सिद्दिचरण नगरपालिका', NULL, NULL),
(69, 7, 'Manebhanjyang Rural Municipality', 'मानेभञ्ज्याङ गाउँपालिका', NULL, NULL),
(70, 7, 'Champadevi Rural Municipality', 'चम्पादेवी गाउँपालिका', NULL, NULL),
(71, 7, 'Sunkoshi Rural Municipality', 'सुनकोशी गाउँपालिका', NULL, NULL),
(72, 7, 'Molung Rural Municipality', 'मोलुङ गाउँपालिका', NULL, NULL),
(73, 7, 'Chisankhugadhi Rural Municipality', 'चिसंखुगढी गाउँपालिका', NULL, NULL),
(74, 7, 'Khiji Demba Rural Municipality', 'खिजिदेम्बा गाउँपालिका', NULL, NULL),
(75, 7, 'Likhu Rural Municipality', 'लिखु गाउँपालिका', NULL, NULL),
(76, 8, 'Fidim Municipality', 'फिदिम नगरपालिका', NULL, NULL),
(77, 8, 'Miklajung Rural Municipality', 'मिक्लाजुङ गाउँपालिका', NULL, NULL),
(78, 8, 'nda Rural Municipality', 'फाल्गुनन्द गाउँपालिका', NULL, NULL),
(79, 8, 'Hilihang Rural Municipality', 'हिलिहाङ गाउँपालिका', NULL, NULL),
(80, 8, 'Phalelung Rural Municipality', 'फालेलुङ गाउँपालिका', NULL, NULL),
(81, 8, 'Yangwarak Rural Municipality', 'याङवरक गाउँपालिका', NULL, NULL),
(82, 8, 'Tumbewa Rural Municipality', 'तुम्बेवा गाउँपालिका', NULL, NULL),
(83, 8, 'Tumbewa Rural Municipality', 'तुम्बेवा गाउँपालिका', NULL, NULL),
(84, 9, 'Chainpur Municipality', 'चैनपुर नगरपालिका', NULL, NULL),
(85, 9, 'Dharmadevi Municipality', 'धर्मदेवी नगरपालिका', NULL, NULL),
(86, 9, 'Khandwari Municipality', 'खांदवारी नगरपालिका', NULL, NULL),
(87, 9, 'Maadi Municipality', 'मादी नगरपालिका', NULL, NULL),
(88, 9, 'Panchkhapan Municipality', 'पाँचखपन नगरपालिका', NULL, NULL),
(89, 9, 'Makalu Rural Municipality', 'मकालु गाउँपालिका', NULL, NULL),
(90, 9, 'Silichong Rural Municipality', 'सिलीचोङ गाउँपालिका', NULL, NULL),
(91, 9, 'Sabhapokhari Rural Municipality', 'सभापोखरी गाउँपालिका', NULL, NULL),
(92, 9, 'Chichila Rural Municipality', 'चिचिला गाउँपालिका', NULL, NULL),
(93, 9, 'Bhot Khola Rural Municipality', 'भोटखोला गाउँपालिका', NULL, NULL),
(94, 10, 'Solududhkunda Municipality', 'सोलुदुधकुण्ड नगरपालिका', NULL, NULL),
(95, 10, 'Dudhakaushika Rural Municipality', 'दुधकौशिका गाउँपालिका', NULL, NULL),
(96, 10, 'Necha Salyan Rural Municipality', 'नेचासल्यान गाउँपालिका', NULL, NULL),
(97, 10, 'Maha Kulung Rural Municipality', 'महाकुलुङ गाउँपालिका', NULL, NULL),
(98, 10, 'Sotang Rural Municipality', 'सोताङ गाउँपालिका', NULL, NULL),
(99, 10, 'Khumbu Pasang Lhamu Rural Municipality', 'खुम्बु पासाङल्हमु गाउँपालिका', NULL, NULL),
(100, 10, 'Likhu Pike Rural Municipality', 'लिखुपिके गाउँपालिका', NULL, NULL),
(101, 11, 'Iitahari Sub-Metropolitan', 'ईटहरी उपमहानगरपालिका', NULL, NULL),
(102, 11, 'Dharan Sub-Metropolitan', 'धरान उपमहानगरपालिका', NULL, NULL),
(103, 11, 'Inaruwa Municipality', 'इनरुवा नगरपालिका', NULL, NULL),
(104, 11, 'Duhabi Municipality', 'दुहवी नगरपालिका', NULL, NULL),
(105, 11, 'Ramdhuni Municipality', 'रामधुनी नगरपालिका', NULL, NULL),
(106, 11, 'Baraha Municipality', 'बराह नगरपालिका', NULL, NULL),
(107, 11, 'Koshi Rural Municipality', 'कोशी गाउँपालिका', NULL, NULL),
(108, 11, 'Harinagara Rural Municipality', 'हरिनगरा गाउँपालिका', NULL, NULL),
(109, 11, 'Bhokraha Rural Municipality', 'भोक्राहा गाउँपालिका', NULL, NULL),
(110, 11, 'Dewanganj Rural Municipality', 'देवानगन्ज गाउँपालिका', NULL, NULL),
(111, 11, 'Gadhi Rural Municipality', 'गढी गाउँपालिका', NULL, NULL),
(112, 11, 'Barju Rural Municipality', 'बर्जु गाउँपालिका', NULL, NULL),
(113, 12, 'Fungling Municipality', 'फुंलिंग नगरपालिका', NULL, NULL),
(114, 12, 'Sirijangha Rural Municipality', 'सिरीजङ्घा गाउँपालिका', NULL, NULL),
(115, 12, 'Aathrai Triveni Rural Municipality', 'आठराई त्रिवेणी गाउँपालिका', NULL, NULL),
(116, 12, 'Pathibhara Yangwarak Rural Municipality', 'पाथीभरा याङवरक गाउँपालिका', NULL, NULL),
(117, 12, 'Meringden Rural Municipality', 'मेरिङदेन गाउँपालिका', NULL, NULL),
(118, 12, 'Sidingwa Rural Municipality', 'सिदिङ्वा गाउँपालिका', NULL, NULL),
(119, 12, 'Phaktanglung Rural Municipality', 'फाक्ताङ्लुङ गाउँपालिका', NULL, NULL),
(120, 12, 'Maiwa Khola Rural Municipality', 'मैवाखोला गाउँपालिका', NULL, NULL),
(121, 12, 'Mikwa Khola Rural Municipality', 'मिक्वाखोला गाउँपालिका', NULL, NULL),
(122, 13, 'Myanglung Municipality', 'म्यांगलुंग नगरपालिका', NULL, NULL),
(123, 13, 'Laligurans Municipality', 'लालीगुराँस नगरपालिका', NULL, NULL),
(124, 13, 'Aathrai Rural Municipality', 'आठराई गाउँपालिका', NULL, NULL),
(125, 13, 'Phedap Rural Municipality', 'फेदाप गाउँपालिका', NULL, NULL),
(126, 13, 'Chhathar Rural Municipality', 'छथर गाउँपालिका', NULL, NULL),
(127, 13, 'Menchayayem Rural Municipality', 'मेन्छयायेम गाउँपालिका', NULL, NULL),
(128, 14, 'Katari Municipality', 'कटारी नगरपालिका', NULL, NULL),
(129, 14, 'Chaudandigadhi Municipality', 'चौदण्डीगढी नगरपालिका', NULL, NULL),
(130, 14, 'Triyuga Municipality', 'त्रियुगा नगरपालिका', NULL, NULL),
(131, 14, 'Belakaa Municipality', 'वेलका नगरपालिका', NULL, NULL),
(132, 14, 'Udayapurgadhi Rural Municipality', 'उदयपुरगढी गाउँपालिका', NULL, NULL),
(133, 14, 'Rautamai Rural Municipality', 'रौतामाई गाउँपालिका', NULL, NULL),
(134, 14, 'Tapli Rural Municipality', 'ताप्ली गाउँपालिका', NULL, NULL),
(135, 14, 'Limchungbung Rural Municipality', 'लिम्चुङबुङ गाउँपालिका', NULL, NULL),
(136, 15, 'Birganj Sub-Metropolitan', 'बिरगंज उपमहानगरपालिका', NULL, NULL),
(137, 15, 'Pokhariya Municipality', 'पोखरिया नगरपालिका', NULL, NULL),
(138, 15, 'Sakhuwa Prasauni Rural Municipality', 'सखुवा प्रसौनी गाउँपालिका', NULL, NULL),
(139, 15, 'Jagarnathpur Rural Municipality', 'जगरनाथपुर गाउँपालिका', NULL, NULL),
(140, 15, 'Chhipaharmai Rural Municipality', 'छिपहरमाई गाउँपालिका', NULL, NULL),
(141, 15, 'Bindabasini Rural Municipality', 'बिन्दबासिनी गाउँपालिका', NULL, NULL),
(142, 15, 'Paterwa Sugauli Rural Municipality', 'पटेर्वा सुगौली गाउँपालिका', NULL, NULL),
(143, 15, 'Jira Bhavani Rural Municipality', 'जिरा भवानी गाउँपालिका', NULL, NULL),
(144, 15, 'Kalikamai Rural Municipality', 'कालिकामाई गाउँपालिका', NULL, NULL),
(145, 15, 'Pakaha Mainpur Rural Municipality', 'पकाहा मैनपुर गाउँपालिका', NULL, NULL),
(146, 15, 'Thori Rural Municipality', 'ठोरी गाउँपालिका', NULL, NULL),
(147, 15, 'Dhobini Rural Municipality', 'धोबीनी गाउँपालिका', NULL, NULL),
(148, 16, 'Kalaiya Sub-Metropolitan', 'कलैया उपमहानगरपालिका', NULL, NULL),
(149, 16, 'Jitpur Simara Sub-Metropolitan', 'जितपुरसिमरा उपमहानगरपालिका', NULL, NULL),
(150, 16, 'Kolhavi Municipality', 'कोल्हवी नगरपालिका', NULL, NULL),
(151, 16, 'Nijgadh Municipality', 'निजगढ नगरपालिका', NULL, NULL),
(152, 16, 'Mahagadhimaai Municipality', 'महागढ़ीमाई नगरपालिका', NULL, NULL),
(153, 16, 'Simraungadh Municipality', 'सिम्रौनगढ नगरपालिका', NULL, NULL),
(154, 16, 'Subarna Rural Municipality', 'सुवर्ण  गाउँपालिका', NULL, NULL),
(155, 16, 'Adarsha Kotwal Rural Municipality', 'आदर्श कोतवाल गाउँपालिका', NULL, NULL),
(156, 16, 'Baragadhi Rural Municipality', 'बारागढी गाउँपालिका', NULL, NULL),
(157, 16, 'Pheta Rural Municipality', 'फेटा गाउँपालिका', NULL, NULL),
(158, 16, 'Karaiyamai Rural Municipality', 'करैयामाई गाउँपालिका', NULL, NULL),
(159, 16, 'Prasauni Rural Municipality', 'प्रसौनी गाउँपालिका', NULL, NULL),
(160, 16, 'Bishrampur Rural Municipality', 'विश्रामपुर गाउँपालिका', NULL, NULL),
(161, 16, 'Devtal Rural Municipality', 'देवताल गाउँपालिका', NULL, NULL),
(162, 16, 'Parawanipur Rural Municipality', 'परवानीपुर गाउँपालिका', NULL, NULL),
(163, 17, 'Chandrapur Municipality', 'चंद्रपुर नगरपालिका', NULL, NULL),
(164, 17, 'Garuda Municipality', 'गरुडा नगरपालिका', NULL, NULL),
(165, 17, 'Gaur Municipality', 'गौर नगरपालिका', NULL, NULL),
(166, 17, 'Rajpur Rural Municipality', 'राजपुर गाउँपालिका', NULL, NULL),
(167, 17, 'Paroha Rural Municipality', 'परोहा गाउँपालिका', NULL, NULL),
(168, 17, 'Iishnaath Rural Municipality', 'ईशनाथ गाउँपालिका', NULL, NULL),
(169, 17, 'Fatuwabijayapur Rural Municipality', 'फतुवाबिजयपुर गाउँपालिका', NULL, NULL),
(170, 17, 'Maulapur Rural Municipality', 'मौलापुर गाउँपालिका', NULL, NULL),
(171, 17, 'Madhav Narayan Rural Municipality', 'माधव नारायण गाउँपालिका', NULL, NULL),
(172, 17, 'Katahariya Rural Municipality', 'कटहरिया गाउँपालिका', NULL, NULL),
(173, 17, 'Gujara Rural Municipality', 'गुजरा गाउँपालिका', NULL, NULL),
(174, 17, 'Gadhimaai Rural Municipality', 'गढीमाई गाउँपालिका', NULL, NULL),
(175, 17, 'Durga Bhagwati Rural Municipality', 'दुर्गा भगवती गाउँपालिका', NULL, NULL),
(176, 17, 'Devahi Gonahi Rural Municipality', 'देवाही गोनाही गाउँपालिका', NULL, NULL),
(177, 17, 'Brindavan Rural Municipality', 'वृन्दावन गाउँपालिका', NULL, NULL),
(178, 18, 'Iishworpur Municipality', 'ईश्वोरपुर नगरपालिका', NULL, NULL),
(179, 18, 'Malangawa Municipality', 'मलंगवा नगरपालिका', NULL, NULL),
(180, 18, 'Lalbandi Municipality', 'लालबन्दी नगरपालिका', NULL, NULL),
(181, 18, 'Haripur Municipality', 'हरिपुर नगरपालिका', NULL, NULL),
(182, 18, 'Haripurwa Municipality', 'हरिपुर्वा नगरपालिका', NULL, NULL),
(183, 18, 'Harivan Municipality', 'हरिवन नगरपालिका', NULL, NULL),
(184, 18, 'Barhathawa Municipality', 'बरहथवा नगरपालिका', NULL, NULL),
(185, 18, 'Balaraa Municipality', 'बलरा नगरपालिका', NULL, NULL),
(186, 18, 'Godaita Municipality', 'गोडेटा नगरपालिका', NULL, NULL),
(187, 18, 'Bagmati Municipality', 'बागमती नगरपालिका', NULL, NULL),
(188, 18, 'Bishnu Rural Municipality', 'विष्णु गाउँपालिका', NULL, NULL),
(189, 18, 'Ramnagar Rural Municipality', 'रामनगर गाउँपालिका', NULL, NULL),
(190, 18, 'Bramhapuri Rural Municipality', 'ब्रह्मपुरी गाउँपालिका', NULL, NULL),
(191, 18, 'Dhankaul Rural Municipality', 'धनकौल गाउँपालिका', NULL, NULL),
(192, 18, 'Chandranagar Rural Municipality', 'चन्द्रनगर गाउँपालिका', NULL, NULL),
(193, 18, 'Chakraghatta Rural Municipality', 'चक्रघट्टा गाउँपालिका', NULL, NULL),
(194, 18, 'Kabilasi Rural Municipality', 'कविलासी गाउँपालिका', NULL, NULL),
(195, 18, 'Kaudena Rural Municipality', 'कौडेना गाउँपालिका', NULL, NULL),
(196, 18, 'Basbariya Rural Municipality', 'बसबरिया गाउँपालिका', NULL, NULL),
(197, 19, 'Janakpurdham Sub-Metropolitan', 'जनकपुरधाम उपमहानगरपालिका', NULL, NULL),
(198, 19, 'Kshireshwornath Municipality', 'क्षिरेश्वरनाथ नगरपालिका', NULL, NULL),
(199, 19, 'Ganeshman Charnath Municipality', 'गणेशमान चारनाथ नगरपालिका', NULL, NULL),
(200, 19, 'Dhanushadham Municipality', 'धनुषाधाम नगरपालिका', NULL, NULL),
(201, 19, 'Nagarain Municipality', 'नगराइन नगरपालिका', NULL, NULL),
(202, 19, 'Vedeha Municipality', 'विदेह नगरपालिका', NULL, NULL),
(203, 19, 'Mithila Municipality', 'मिथिला नगरपालिका', NULL, NULL),
(204, 19, 'Shahidnagar Municipality', 'शहिदनगर नगरपालिका', NULL, NULL),
(205, 19, 'Sabaila Municipality', 'सबैला नगरपालिका', NULL, NULL),
(206, 19, 'Aaurahi Rural Municipality', 'औरही गाउँपालिका', NULL, NULL),
(207, 19, 'Hansapur Rural Municipality', 'हंसपुर गाउँपालिका', NULL, NULL),
(208, 19, 'Laksminiya Rural Municipality', 'लक्ष्मीनिया गाउँपालिका', NULL, NULL),
(209, 19, 'Mukhiyapatti Musaharmiya Rural Municipality', 'मुखियापट्टी मुसहरमिया गाउँपालिका', NULL, NULL),
(210, 19, 'Mithila Bihari Rural Municipality', 'मिथिला बिहारी गाउँपालिका', NULL, NULL),
(211, 19, 'Bateshwar Rural Municipality', 'बटेश्वर गाउँपालिका', NULL, NULL),
(212, 19, 'Janak Nandini Rural Municipality', 'जनकनन्दिनी गाउँपालिका', NULL, NULL),
(213, 19, 'Kamala Siddhidaatri Rural Municipality', 'कमला सिद्धिदत्री गाउँपालिका', NULL, NULL),
(214, 19, 'Dhanauji Rural Municipality', 'धनौजी गाउँपालिका', NULL, NULL),
(215, 20, 'Lahaan Municipality', 'लहान नगरपालिका', NULL, NULL),
(216, 20, 'Dhangadhimaai Municipality', 'धनगढीमाई नगरपालिका', NULL, NULL),
(217, 20, 'Siraha Municipality', 'सिरहा नगरपालिका', NULL, NULL),
(218, 20, 'Golbajar Municipality', 'गोलबजार नगरपालिका', NULL, NULL),
(219, 20, 'Michaiyan Municipality', 'मिचैयाँ नगरपालिका', NULL, NULL),
(220, 20, 'Kalyanpur Municipality', 'कल्याणपुर नगरपालिका', NULL, NULL),
(221, 20, 'Bhagawanpur Rural Municipality', 'भगवानपुर गाउँपालिका', NULL, NULL),
(222, 20, 'Aaurahi Rural Municipality', 'औरही गाउँपालिका', NULL, NULL),
(223, 20, 'Bishnupur Rural Municipality', 'विष्णुपुर गाउँपालिका', NULL, NULL),
(224, 20, 'Bariyarpatti Rural Municipality', 'बरियारपट्टी गाउँपालिका', NULL, NULL),
(225, 20, 'Laksmipur Patari Rural Municipality', 'लक्ष्मीपुर पतारी गाउँपालिका', NULL, NULL),
(226, 20, 'Naraha Rural Municipality', 'नरहा गाउँपालिका', NULL, NULL),
(227, 20, 'Sakhuwanankarkatti Rural Municipality', 'सखुवानान्कारकट्टी गाउँपालिका', NULL, NULL),
(228, 20, 'Arnama Rural Municipality', 'अर्नमा गाउँपालिका', NULL, NULL),
(229, 20, 'Nawarajpur Rural Municipality', 'नवराजपुर गाउँपालिका', NULL, NULL),
(230, 20, 'Sukhipur Rural Municipality', 'सुखीपुर गाउँपालिका', NULL, NULL),
(231, 20, 'Karjanha Rural Municipality', 'कर्जन्हा गाउँपालिका', NULL, NULL),
(232, 21, 'Jaleshwor Municipality', 'जलेश्वर नगरपालिका', NULL, NULL),
(233, 21, 'Bardibas Municipality', 'बर्दिबास नगरपालिका', NULL, NULL),
(234, 21, 'Gaushala Municipality', 'गौशाला नगरपालिका', NULL, NULL),
(235, 21, 'Ekdara Rural Municipality', 'एकडारा गाउँपालिका', NULL, NULL),
(236, 21, 'Sonama Rural Municipality', 'सोनमा गाउँपालिका', NULL, NULL),
(237, 21, 'Samsi Rural Municipality', 'साम्सी गाउँपालिका', NULL, NULL),
(238, 21, 'Loharpatti Rural Municipality', 'लोहारपट्टी गाउँपालिका', NULL, NULL),
(239, 21, 'Ramgopalpur Rural Municipality', 'रामगोपालपुर गाउँपालिका', NULL, NULL),
(240, 21, 'Mahottari Rural Municipality', 'महोत्तरी गाउँपालिका', NULL, NULL),
(241, 21, 'Manara Rural Municipality', 'मनरा गाउँपालिका', NULL, NULL),
(242, 21, 'Matihani Rural Municipality', 'मटिहानी गाउँपालिका', NULL, NULL),
(243, 21, 'Bhangaha Rural Municipality', 'भंगाहा गाउँपालिका', NULL, NULL),
(244, 21, 'Balawa Rural Municipality', 'बलवा गाउँपालिका', NULL, NULL),
(245, 21, 'Pipara Rural Municipality', 'पिपरा गाउँपालिका', NULL, NULL),
(246, 21, 'Aaurahi Rural Municipality', 'औरही गाउँपालिका', NULL, NULL),
(247, 22, 'Rajbiraj Municipality', 'राजविराज नगरपालिका', NULL, NULL),
(248, 22, 'Kanchanrup Municipality', 'कन्चंरूप नगरपालिका', NULL, NULL),
(249, 22, 'Daakneshwori Municipality', 'डाक्नेश्वरी नगरपालिका', NULL, NULL),
(250, 22, 'Bodebarsain Municipality', 'बोदेबरसाईन नगरपालिका', NULL, NULL),
(251, 22, 'Khadak Municipality', 'खडक नगरपालिका', NULL, NULL),
(252, 22, 'Shambhunath Municipality', 'शम्भुनाथ नगरपालिका', NULL, NULL),
(253, 22, 'Surunga Municipality', 'सुरुङ्गा नगरपालिका', NULL, NULL),
(254, 22, 'Hanumannagar kankalini Municipality', 'हनुमाननगर कन्कालिनी नगरपालिका', NULL, NULL),
(255, 22, 'Krishnasawaran Rural Municipality', 'कृष्णासवरन गाउँपालिका', NULL, NULL),
(256, 22, 'Chhinnamasta Rural Municipality', 'छिन्नमस्ता गाउँपालिका', NULL, NULL),
(257, 22, 'Mahadeva Rural Municipality', 'महादेवा गाउँपालिका', NULL, NULL),
(258, 22, 'Saptakoshi Rural Municipality', 'सप्तकोशी गाउँपालिका', NULL, NULL),
(259, 22, 'Tirhut Rural Municipality', 'तिरहुत गाउँपालिका', NULL, NULL),
(260, 22, 'Tilathi Koiladi Rural Municipality', 'तिलाठी कोईलाडी गाउँपालिका', NULL, NULL),
(261, 22, 'Rupani Rural Municipality', 'रुपनी गाउँपालिका', NULL, NULL),
(262, 22, 'Belhi Chapena Rural Municipality', 'बेल्ही चपेना गाउँपालिका', NULL, NULL),
(263, 22, 'Bishnupur Rural Municipality', 'बिष्णुपुर गाउँपालिका', NULL, NULL),
(264, 22, 'Aagnisaira Krishnasawaran Rural Municipality', 'अग्निसाइर कृष्णासवरन गाउँपालिका', NULL, NULL),
(265, 22, 'Balan-Bihul Rural Municipality', 'बलान-बिहुल गाउँपालिका', NULL, NULL),
(266, 23, 'Kamalamaai Municipality', 'कमलामाई नगरपालिका', NULL, NULL),
(267, 23, 'Dudhauli Municipality', 'दुधौली नगरपालिका', NULL, NULL),
(268, 23, 'Golanjor Rural Municipality', 'गोलन्जोर गाउँपालिका', NULL, NULL),
(269, 23, 'Ghyanglekh Rural Municipality', 'घ्याङलेख गाउँपालिका', NULL, NULL),
(270, 23, 'Tinpatan Rural Municipality', 'तिनपाटन गाउँपालिका', NULL, NULL),
(271, 23, 'Phikkal Rural Municipality', 'फिक्कल गाउँपालिका', NULL, NULL),
(272, 23, 'Marin Rural Municipality', 'मरिण गाउँपालिका', NULL, NULL),
(273, 23, 'Sunkoshi Rural Municipality', 'सुनकोशी गाउँपालिका', NULL, NULL),
(274, 23, 'Hariharpurgadhi Rural Municipality', 'हरिहरपुरगढी गाउँपालिका', NULL, NULL),
(275, 24, 'Manthali Municipality', 'मन्थली नगरपालिका', NULL, NULL),
(276, 24, 'Ramechhap Municipality', 'रामेछाप नगरपालिका', NULL, NULL),
(277, 24, 'Umakunda Rural Municipality', 'उमाकुण्ड गाउँपालिका', NULL, NULL),
(278, 24, 'Khandadevi Rural Municipality', 'खाँडादेवी गाउँपालिका', NULL, NULL),
(279, 24, 'Gokulganga Rural Municipality', 'गोकुलगङ्गा गाउँपालिका', NULL, NULL),
(280, 24, 'Doramba Rural Municipality', 'दोरम्बा गाउँपालिका', NULL, NULL),
(281, 24, 'Likhu Tamakoshi Rural Municipality', 'लिखु तामाकोशी गाउँपालिका', NULL, NULL),
(282, 24, 'Sunapati Rural Municipality', 'सुनापती गाउँपालिका', NULL, NULL),
(283, 25, 'Jiri Municipality', 'जिरी नगरपालिका', NULL, NULL),
(284, 25, 'Bhimeshwor Municipality', 'भीमेश्वर नगरपालिका', NULL, NULL),
(285, 25, 'Kalinchok Rural Municipality', 'कालिन्चोक गाउँपालिका', NULL, NULL),
(286, 25, 'Gaurishankar Rural Municipality', 'गौरिशंकर गाउँपालिका', NULL, NULL),
(287, 25, 'Tamakoshi Rural Municipality', 'तामाकोशी गाउँपालिका', NULL, NULL),
(288, 25, 'Melung Rural Municipality', 'मेलुङ गाउँपालिका', NULL, NULL),
(289, 25, 'Bigu Rural Municipality', 'विगु गाउँपालिका', NULL, NULL),
(290, 25, 'Baiteshwar Rural Municipality', 'वैतेश्वर गाउँपालिका', NULL, NULL),
(291, 25, 'Shailung Rural Municipality', 'शैलुङ गाउँपालिका', NULL, NULL),
(292, 26, 'Changunarayan Municipality', 'चाँगुनारायण नगरपालिका', NULL, NULL),
(293, 26, 'Bhaktapur Municipality', 'भक्तपुर नगरपालिका', NULL, NULL),
(294, 26, 'Madhyapur Thimi Municipality', 'मध्यपुर थिमी नगरपालिका', NULL, NULL),
(295, 26, 'Suryavinayak Municipality', 'सूर्यविनायक नगरपालिका', NULL, NULL),
(296, 27, 'Dhunibensi Municipality', 'धुनीबेंशी नगरपालिका', NULL, NULL),
(297, 27, 'Nilkantha Municipality', 'नीलकण्ठ नगरपालिका', NULL, NULL),
(298, 27, 'Khaniyabas Rural Municipality', 'खनियाबास गाउँपालिका', NULL, NULL),
(299, 27, 'Gajuri Rural Municipality', 'गजुरी गाउँपालिका', NULL, NULL),
(300, 27, 'Galchhi Rural Municipality', 'गल्छी गाउँपालिका', NULL, NULL),
(301, 27, 'Gangajamuna Rural Municipality', 'गङ्गाजमुना गाउँपालिका', NULL, NULL),
(302, 27, 'Jwalamukhi Rural Municipality', 'ज्वालामूखी गाउँपालिका', NULL, NULL),
(303, 27, 'Thakre Rural Municipality', 'थाक्रे गाउँपालिका', NULL, NULL),
(304, 27, 'Netrawati Dabjong Rural Municipality', 'नेत्रावती डबजोङ गाउँपालिका', NULL, NULL),
(305, 27, 'Benighat Rorang Rural Municipality', 'बेनीघाट रोराङ्ग गाउँपालिका', NULL, NULL),
(306, 27, 'Ruby Valley Rural Municipality', 'रुवी भ्याली गाउँपालिका', NULL, NULL),
(307, 27, 'Siddhalekh Rural Municipality', 'सिद्धलेक गाउँपालिका', NULL, NULL),
(308, 27, 'Tripura Sundari Rural Municipality', 'त्रिपुरासुन्दरी गाउँपालिका', NULL, NULL),
(309, 28, 'Kathmandu Metropolitan', 'काठमाडौँ महानगरपालिका', NULL, NULL),
(310, 28, 'Kageshwori Manohara Municipality', 'कागेश्वरी मनोहरा नगरपालिका', NULL, NULL),
(311, 28, 'Kirtipur Municipality', 'कीर्तिपुर नगरपालिका', NULL, NULL),
(312, 28, 'Gokarneshwor Municipality', 'गोकर्णेश्वोर नगरपालिका', NULL, NULL),
(313, 28, 'Chandragiri Municipality', 'चन्द्रागिरी नगरपालिका', NULL, NULL),
(314, 28, 'Tokha Municipality', 'टोखा नगरपालिका', NULL, NULL),
(315, 28, 'Tarkeshwor Municipality', 'तार्केश्वोर नगरपालिका', NULL, NULL),
(316, 28, 'Dakshinkali Municipality', 'दक्षिणकाली नगरपालिका', NULL, NULL),
(317, 28, 'Nagarjun Municipality', 'नागार्जुन नगरपालिका', NULL, NULL),
(318, 28, 'Budhanilkantha Municipality', 'बुढानिलकण्ठ नगरपालिका', NULL, NULL),
(319, 28, 'Sankharapur Municipality', 'शंखारापुर नगरपालिका', NULL, NULL),
(320, 29, 'Dhulikhel Municipality', 'धुलिखेल नगरपालिका', NULL, NULL),
(321, 29, 'Banepa Municipality', 'बनेपा नगरपालिका', NULL, NULL),
(322, 29, 'Panauti Municipality', 'पनौती नगरपालिका', NULL, NULL),
(323, 29, 'Panchkhal Municipality', 'पाँचखाल नगरपालिका', NULL, NULL),
(324, 29, 'Namobudha Municipality', 'नमोबुद्ध नगरपालिका', NULL, NULL),
(325, 29, 'Khanikhola Rural Municipality', 'खानीखोला गाउँपालिका', NULL, NULL),
(326, 29, 'Chaunri Deurali Rural Municipality', 'चौंरी देउराली गाउँपालिका', NULL, NULL),
(327, 29, 'Temal Rural Municipality', 'तेमाल गाउँपालिका', NULL, NULL),
(328, 29, 'Bethanchok Rural Municipality', 'बेथानचोक गाउँपालिका', NULL, NULL),
(329, 29, 'Bhumlu Rural Municipality', 'भुम्लु गाउँपालिका', NULL, NULL),
(330, 29, 'Mandandeupur Municipality', 'मण्डनदेउपुर नगरपालिका', NULL, NULL),
(331, 29, 'Mahabharat Rural Municipality', 'महाभारत गाउँपालिका', NULL, NULL),
(332, 29, 'Roshi Rural Municipality', 'रोशी गाउँपालिका', NULL, NULL),
(333, 30, 'Lalitpur Metropolitan', 'ललितपुर महानगरपालिका', NULL, NULL),
(334, 30, 'Godawari Municipality', 'गोदावरी नगरपालिका', NULL, NULL),
(335, 30, 'Mahalaksmi Municipality', 'महालक्ष्मी नगरपालिका', NULL, NULL),
(336, 30, 'Konjyosom Rural Municipality', 'कोन्ज्योसोम गाउँपालिका', NULL, NULL),
(337, 30, 'Bagmati Rural Municipality', 'बाग्मती गाउँपालिका', NULL, NULL),
(338, 30, 'Mahankal Rural Municipality', 'महाङ्काल गाउँपालिका', NULL, NULL),
(339, 31, 'Bidur Municipality', 'विदुर नगरपालिका', NULL, NULL),
(340, 31, 'Belkotgadhi Municipality', 'बेलकोटगढी नगरपालिका', NULL, NULL),
(341, 31, 'Kakani Rural Municipality', 'ककनी गाउँपालिका', NULL, NULL),
(342, 31, 'Kispang Rural Municipality', 'किस्पाङ गाउँपालिका', NULL, NULL),
(343, 31, 'Tadi Rural Municipality', 'तादी गाउँपालिका', NULL, NULL),
(344, 31, 'Tarkeshwar Rural Municipality', 'तारकेश्वर गाउँपालिका', NULL, NULL),
(345, 31, 'Dupcheshwar Rural Municipality', 'दुप्चेश्वर गाउँपालिका', NULL, NULL),
(346, 31, 'Panchakanya Rural Municipality', 'पञ्चकन्या गाउँपालिका', NULL, NULL),
(347, 31, 'Likhu Rural Municipality', 'लिखु गाउँपालिका', NULL, NULL),
(348, 31, 'Myagang Rural Municipality', 'मेघांग गाउँपालिका', NULL, NULL),
(349, 31, 'Shivapuri Rural Municipality', 'शिवपुरी गाउँपालिका', NULL, NULL),
(350, 31, 'Suryagadhi Rural Municipality', 'सुर्यगढी गाउँपालिका', NULL, NULL),
(351, 32, 'Uttargaya Rural Municipality', 'उत्तरगया गाउँपालिका', NULL, NULL),
(352, 32, 'Kalika Rural Municipality', 'कालिका गाउँपालिका', NULL, NULL),
(353, 32, 'Gosaikund Rural Municipality', 'गोसाईकुण्ड गाउँपालिका', NULL, NULL),
(354, 32, 'Naukunda Rural Municipality', 'नौकुण्ड गाउँपालिका', NULL, NULL),
(355, 32, 'Parbatikunda Rural Municipality', 'पार्वतीकुण्ड गाउँपालिका', NULL, NULL),
(356, 32, 'Aamachodingmo Rural Municipality', 'आमाछोदिङमो गाउँपालिका', NULL, NULL),
(357, 33, 'Chautara Sangachowkgadhi Municipality', 'चौतारा साँगाचोकगढी नगरपालिका', NULL, NULL),
(358, 33, 'Barhabise Municipality', 'वाह्रबिसे नगरपालिका', NULL, NULL),
(359, 33, 'Melamchi Municipality', 'मेलम्ची नगरपालिका', NULL, NULL),
(360, 33, 'Indrawati Rural Municipality', 'र्इन्द्रावती गाउँपालिका', NULL, NULL),
(361, 33, 'Jugal Rural Municipality', 'जुगल गाउँपालिका', NULL, NULL),
(362, 33, 'Panchpokhari Thangpal Rural Municipality', 'पाँचपोखरी थाङपाल गाउँपालिका', NULL, NULL),
(363, 33, 'Balephi Rural Municipality', 'बलेफी गाउँपालिका', NULL, NULL),
(364, 33, 'Bhotekoshi Rural Municipality', 'भोटेकोशी गाउँपालिका', NULL, NULL),
(365, 33, 'Lisankhu Pakhar Rural Municipality', 'लिसंखु पाखर गाउँपालिका', NULL, NULL),
(366, 33, 'Sunkoshi Rural Municipality', 'सुनकोशी गाउँपालिका', NULL, NULL),
(367, 33, 'Helambu Rural Municipality', 'हेलम्बु गाउँपालिका', NULL, NULL),
(368, 33, 'Tripura Sundari Rural Municipality', 'त्रिपुरासुन्दरी गाउँपालिका', NULL, NULL),
(369, 34, 'Bharatpur Metropolitan', 'भरतपुर महानगरपालिका', NULL, NULL),
(370, 34, 'Kalika Municipality', 'कालिका नगरपालिका', NULL, NULL),
(371, 34, 'Khairhani Municipality', 'खैरहनी नगरपालिका', NULL, NULL),
(372, 34, 'Madi Municipality', 'माडी नगरपालिका', NULL, NULL),
(373, 34, 'Ratnnagar Municipality', 'रत्ननगर नगरपालिका', NULL, NULL),
(374, 34, 'Rapti Municipality', 'राप्ती नगरपालिका', NULL, NULL),
(375, 34, 'Ichchhakamana Rural Municipality', 'इच्छाकामना गाउँपालिका', NULL, NULL),
(376, 35, 'Chitwan Rural Municipality', 'हेटौंडा उपमहानगरपालिका', NULL, NULL),
(377, 35, 'Madi Rural Municipality', 'थाहा नगरपालिका', NULL, NULL),
(378, 35, 'Rapti Rural Municipality', 'ईन्द्र सरोवर गाउँपालिका', NULL, NULL),
(379, 35, 'Madi Rural Municipality', 'कैलाश गाउँपालिका', NULL, NULL),
(380, 35, 'Rapti Rural Municipality', 'बकैया गाउँपालिका', NULL, NULL),
(381, 35, 'Madi Rural Municipality', 'बाग्मती गाउँपालिका', NULL, NULL),
(382, 35, 'Rapti Rural Municipality', 'भीमफेदी गाउँपालिका', NULL, NULL),
(383, 35, 'Madi Rural Municipality', 'मकवानपुरगढी गाउँपालिका', NULL, NULL),
(384, 35, 'Rapti Rural Municipality', 'मनहरी गाउँपालिका', NULL, NULL),
(385, 35, 'Madi Rural Municipality', 'राक्सिराङ्ग गाउँपालिका', NULL, NULL),
(386, 36, 'Baglung Municipality', 'बागलुङ नगरपालिका', NULL, NULL),
(387, 36, 'Galkot Municipality', 'गल्कोट नगरपालिका', NULL, NULL),
(388, 36, 'Jaimini Municipality', 'जैमिनी नगरपालिका', NULL, NULL),
(389, 36, 'Dhorpatan Municipality', 'ढोरपाटन नगरपालिका', NULL, NULL),
(390, 36, 'Bareng Rural Municipality', 'वरेङ गाउँपालिका', NULL, NULL),
(391, 36, 'Kathekhola Rural Municipality', 'काठेखोला गाउँपालिका', NULL, NULL),
(392, 36, 'Tamankhola Rural Municipality', 'तमानखोला गाउँपालिका', NULL, NULL),
(393, 36, 'Tarakhola Rural Municipality', 'ताराखोला गाउँपालिका', NULL, NULL),
(394, 36, 'Nisikhola Rural Municipality', 'निसीखोला गाउँपालिका', NULL, NULL),
(395, 36, 'Badigad Rural Municipality', 'वडिगाड गाउँपालिका', NULL, NULL),
(396, 37, 'Gorkha Municipality', 'गोरखा नगरपालिका', NULL, NULL),
(397, 37, 'Palungtar Municipality', 'पालुंगटार नगरपालिका', NULL, NULL),
(398, 37, 'Barpak Sulikot Rural Municipality', 'बारपाक सुलीकोट गाउँपालिका', NULL, NULL),
(399, 37, 'Siranchok Rural Municipality', 'सिरानचोक गाउँपालिका', NULL, NULL),
(400, 37, 'Ajirkot Rural Municipality', 'अजिरकोट गाउँपालिका', NULL, NULL),
(401, 37, 'Aarughat Rural Municipality', 'आरूघाट गाउँपालिका', NULL, NULL),
(402, 37, 'Gandaki Rural Municipality', 'गण्डकी गाउँपालिका', NULL, NULL),
(403, 37, 'Chum Nubri Rural Municipality', 'चुम नुव्री गाउँपालिका', NULL, NULL),
(404, 37, 'Dharche Rural Municipality', 'धार्चे गाउँपालिका', NULL, NULL),
(405, 37, 'Bhimsen Thapa Rural Municipality', 'भिमसेनथापा गाउँपालिका', NULL, NULL),
(406, 37, 'Shahid Lakhan Rural Municipality', 'शहिद लखन गाउँपालिका', NULL, NULL),
(407, 38, 'Pokhara Lekhnath Metropolitan', 'पोखरा लेखनाथ महानगरपालिका', NULL, NULL),
(408, 38, 'Annapurna Rural Municipality', 'अन्नपुर्ण गाउँपालिका', NULL, NULL),
(409, 38, 'Machhapuchhre Rural Municipality', 'माछापुछ्रे गाउँपालिका', NULL, NULL),
(410, 38, 'Madi Rural Municipality', 'मादी गाउँपालिका', NULL, NULL),
(411, 38, 'Rupa Rural Municipality', 'रूपा गाउँपालिका', NULL, NULL),
(412, 39, 'Besishahar Municipality', 'बेसीशहर नगरपालिका', NULL, NULL),
(413, 39, 'Madhyanepal Municipality', 'मध्यनेपाल नगरपालिका', NULL, NULL),
(414, 39, 'Rainas Municipality', 'राईनास नगरपालिका', NULL, NULL),
(415, 39, 'Sundarbazar Municipality', 'सुन्दरबजार नगरपालिका', NULL, NULL),
(416, 39, 'Kwaholasothar Rural Municipality', 'क्व्होलासोथार गाउँपालिका', NULL, NULL),
(417, 39, 'Dudhpokhari Rural Municipality', 'दूधपोखरी गाउँपालिका', NULL, NULL),
(418, 39, 'Dordi Rural Municipality', 'दोर्दी गाउँपालिका', NULL, NULL),
(419, 39, 'Marsyangdi Rural Municipality', 'मर्स्याङदी गाउँपालिका', NULL, NULL),
(420, 39, 'Chame Rural Municipality', 'चामे गाउँपालिका', NULL, NULL),
(421, 40, 'Narpa Bhumi Rural Municipality', 'नार्पा भूमी गाउँपालिका', NULL, NULL),
(422, 40, 'Nason Rural Municipality', 'नासोँ गाउँपालिका', NULL, NULL),
(423, 40, 'Manang Disyang Rural Municipality', 'मनाङ डिस्याङ गाउँपालिका', NULL, NULL),
(424, 41, 'Gharapjhong Rural Municipality', 'घरपझोङ गाउँपालिका', NULL, NULL),
(425, 41, 'Thasang Rural Municipality', 'थासाङ गाउँपालिका', NULL, NULL),
(426, 41, 'Lomanthang Rural Municipality', 'लोमन्थाङ गाउँपालिका', NULL, NULL),
(427, 41, 'Baragung Muktichhetra Rural Municipality', 'बारागुङ मुक्तिक्षेत्र गाउँपालिका', NULL, NULL),
(428, 41, 'Lo-Ghekar Damodarkunda Rural Municipality', 'लो-घेकर दामोदरकुण्ड गाउँपालिका', NULL, NULL),
(429, 42, 'Beni Municipality', 'बेनी नगरपालिका', NULL, NULL),
(430, 42, 'Annapurna Rural Municipality', 'अन्नपुर्ण गाउँपालिका', NULL, NULL),
(431, 42, 'Dhaulagiri Rural Municipality', 'धवलागिरी गाउँपालिका', NULL, NULL),
(432, 42, 'Mangala Rural Municipality', 'मंगला गाउँपालिका', NULL, NULL),
(433, 42, 'Malika Rural Municipality', 'मालिका गाउँपालिका', NULL, NULL),
(434, 42, 'Raghuganga Rural Municipality', 'रघुगंगा गाउँपालिका', NULL, NULL),
(435, 43, 'Kawasoti Municipality', 'कावासोती नगरपालिका', NULL, NULL),
(436, 43, 'Gaindakot Municipality', 'गैंडाकोट नगरपालिका', NULL, NULL),
(437, 43, 'Devchuli Municipality', 'देवचुली नगरपालिका', NULL, NULL),
(438, 43, 'Bardghat Municipality', 'बर्दघाट नगरपालिका', NULL, NULL),
(439, 43, 'Madhyabindu Municipality', 'मध्यविन्दु नगरपालिका', NULL, NULL),
(440, 43, 'Ramgram Municipality', 'रामग्राम नगरपालिका', NULL, NULL),
(441, 43, 'Sunbal Municipality', 'सुनवल नगरपालिका', NULL, NULL),
(442, 43, 'Hupsekot Rural Municipality', 'हुप्सेकोट गाउँपालिका', NULL, NULL),
(443, 43, 'Sarabal Rural Municipality', 'सरावल गाउँपालिका', NULL, NULL),
(444, 43, 'Binayi Triveni Rural Municipality', 'विनयी त्रिवेणी गाउँपालिका', NULL, NULL),
(445, 43, 'Bulingtar Rural Municipality', 'बुलिङटार गाउँपालिका', NULL, NULL),
(446, 43, 'Baudikali Rural Municipality', 'बौदीकाली गाउँपालिका', NULL, NULL),
(447, 43, 'Pratappur Rural Municipality', 'प्रतापपुर गाउँपालिका', NULL, NULL),
(448, 43, 'Palhinandan Rural Municipality', 'पाल्हीनन्दन गाउँपालिका', NULL, NULL),
(449, 44, 'Kusma Municipality', 'कुश्मा नगरपालिका', NULL, NULL),
(450, 44, 'Phalebas Municipality', 'फलेवास नगरपालिका', NULL, NULL),
(451, 44, 'Jaljala Rural Municipality', 'जलजला गाउँपालिका', NULL, NULL),
(452, 44, 'Painyu Rural Municipality', 'पैयूं गाउँपालिका', NULL, NULL),
(453, 44, 'Mahashila Rural Municipality', 'महाशिला गाउँपालिका', NULL, NULL),
(454, 44, 'Modi Rural Municipality', 'मोदी गाउँपालिका', NULL, NULL),
(455, 44, 'Bihadi Rural Municipality', 'विहादी गाउँपालिका', NULL, NULL),
(456, 45, 'Galyang Municipality', 'गल्याङ नगरपालिका', NULL, NULL),
(457, 45, 'Chapakot Municipality', 'चापाकोट नगरपालिका', NULL, NULL),
(458, 45, 'Putalibazar Municipality', 'पुतलीबजार नगरपालिका', NULL, NULL),
(459, 45, 'Bhirkot Municipality', 'भीरकोट नगरपालिका', NULL, NULL),
(460, 45, 'Waling Municipality', 'वालिङ नगरपालिका', NULL, NULL),
(461, 45, 'Arjun Chaupari Rural Municipality', 'अर्जुन चौपारी गाउँपालिका', NULL, NULL),
(462, 45, 'Aandhikhola Rural Municipality', 'आँधीखोला गाउँपालिका', NULL, NULL),
(463, 45, 'Kaligandaki Rural Municipality', 'कालीगण्डकी गाउँपालिका', NULL, NULL),
(464, 45, 'Phedikhola Rural Municipality', 'फेदीखोला गाउँपालिका', NULL, NULL),
(465, 45, 'Biruwa Rural Municipality', 'विरुवा गाउँपालिका', NULL, NULL),
(466, 45, 'Harinas Rural Municipality', 'हरीनास गाउँपालिका', NULL, NULL),
(467, 46, 'Bhanu Municipality', 'भानु नगरपालिका', NULL, NULL),
(468, 46, 'Bhimad Municipality', 'भिमाद नगरपालिका', NULL, NULL),
(469, 46, 'Vyas Municipality', 'व्यास नगरपालिका', NULL, NULL),
(470, 46, 'ShuklaGandaki Municipality', 'शुक्लागण्डकी नगरपालिका', NULL, NULL),
(471, 46, 'Aanbu Khaireni Rural Municipality', 'आँबुखैरेनी गाउँपालिका', NULL, NULL),
(472, 46, 'Rishing Rural Municipality', 'ऋषिङ्ग गाउँपालिका', NULL, NULL),
(473, 46, 'Ghiring Rural Municipality', 'घिरिङ गाउँपालिका', NULL, NULL),
(474, 46, 'Devghat Rural Municipality', 'देवघाट गाउँपालिका', NULL, NULL),
(475, 46, 'Myagde Rural Municipality', 'म्याग्दे गाउँपालिका', NULL, NULL),
(476, 46, 'Bandipur Rural Municipality', 'बन्दिपुर गाउँपालिका', NULL, NULL),
(477, 47, 'Kapilvastu Municipality', 'कपिलवस्तु नगरपालिका', NULL, NULL),
(478, 47, 'Buddhabhumi Municipality', 'बुद्धभुमि नगरपालिका', NULL, NULL),
(479, 47, 'Shivaraj Municipality', 'शिवराज नगरपालिका', NULL, NULL),
(480, 47, 'Maharajgunj Municipality', 'महाराजगंज नगरपालिका', NULL, NULL),
(481, 47, 'Krishnanagar Municipality', 'कृष्णनगर नगरपालिका', NULL, NULL),
(482, 47, 'Baanganga Municipality', 'बाणगंगा नगरपालिका', NULL, NULL),
(483, 47, 'Mayadevi Rural Municipality', 'मायादेवी गाउँपालिका', NULL, NULL),
(484, 47, 'Yasodhara Rural Municipality', 'यसोधरा गाउँपालिका', NULL, NULL),
(485, 47, 'Shuddhodhan Rural Municipality', 'शुद्धोधन गाउँपालिका', NULL, NULL),
(486, 47, 'Bijaynagar Rural Municipality', 'विजयनगर गाउँपालिका', NULL, NULL),
(487, 48, 'Triveni Susta Rural Municipality', 'त्रिवेणी सुस्ता गाउँपालिका', NULL, NULL),
(488, 48, 'Pratappur Rural Municipality', 'प्रतापपुर गाउँपालिका', NULL, NULL),
(489, 48, 'Sarawal Rural Municipality', 'सरावल गाउँपालिका', NULL, NULL),
(490, 48, 'Palhi Nandan Rural Municipality', 'पाल्हीनन्दन गाउँपालिका', NULL, NULL),
(491, 49, 'Butwal Sub-Metropolitan', 'बुटवल उपमहानगरपालिका', NULL, NULL),
(492, 49, 'Devdaha Municipality', 'देवदह नगरपालिका', NULL, NULL),
(493, 49, 'Lumbini sanskritik Municipality', 'लुम्बिनी सांस्कृतिक नगरपालिका', NULL, NULL),
(494, 49, 'SainaMaina Municipality', 'सैनामैना नगरपालिका', NULL, NULL),
(495, 49, 'Siddarthanagar Municipality', 'सिद्दार्थनगर नगरपालिका', NULL, NULL),
(496, 49, 'Tilottama Municipality', 'तिलोत्तमा नगरपालिका', NULL, NULL),
(497, 49, 'Gaidhawa Rural Municipality', 'गैडहवा गाउँपालिका', NULL, NULL),
(498, 49, 'Kanchan Rural Municipality', 'कञ्चन गाउँपालिका', NULL, NULL),
(499, 49, 'Kotahimai Rural Municipality', 'कोटहीमाई गाउँपालिका', NULL, NULL),
(500, 49, 'Marchawarimai Rural Municipality', 'मर्चवारीमाई गाउँपालिका', NULL, NULL),
(501, 49, 'Mayadevi Rural Municipality', 'मायादेवी गाउँपालिका', NULL, NULL),
(502, 49, 'Om Satiya Rural Municipality', 'ओमसतीया गाउँपालिका', NULL, NULL),
(503, 49, 'Rohini Rural Municipality', 'रोहिणी गाउँपालिका', NULL, NULL),
(504, 49, 'Sammarimai Rural Municipality', 'सम्मरीमाई गाउँपालिका', NULL, NULL),
(505, 49, 'Siyari Rural Municipality', 'सियारी गाउँपालिका', NULL, NULL),
(506, 49, 'Shuddhodhan Rural Municipality', 'शुद्धोधन गाउँपालिका', NULL, NULL),
(507, 50, 'Sandhikharka Municipality', 'सन्धिखर्क नगरपालिका', NULL, NULL),
(508, 50, 'Shitganga Municipality', 'शितगंगा नगरपालिका', NULL, NULL),
(509, 50, 'Bhumikasthan Municipality', 'भूमिकास्थान नगरपालिका', NULL, NULL),
(510, 50, 'Chhatradev Rural Municipality', 'छत्रदेव गाउँपालिका', NULL, NULL),
(511, 50, 'Pandini Rural Municipality', 'पाणिनी गाउँपालिका', NULL, NULL),
(512, 50, 'Malarani Rural Municipality', 'मालारानी गाउँपालिका', NULL, NULL),
(513, 51, 'Musikot Municipality', 'मुसिकोट नगरपालिका', NULL, NULL),
(514, 51, 'Resunga Municipality', 'रेसुंगा नगरपालिका', NULL, NULL),
(515, 51, 'Isma Rural Municipality', 'ईस्मा गाउँपालिका', NULL, NULL),
(516, 51, 'Kaligandaki Rural Municipality', 'कालीगण्डकी गाउँपालिका', NULL, NULL),
(517, 51, 'Gulmi Durbar Rural Municipality', 'गुल्मीदरवार गाउँपालिका', NULL, NULL),
(518, 51, 'Satyawati Rural Municipality', 'सत्यवती गाउँपालिका', NULL, NULL),
(519, 51, 'Chandrakot Rural Municipality', 'चन्द्रकोट गाउँपालिका', NULL, NULL),
(520, 51, 'Ruru Rural Municipality', 'रुरु गाउँपालिका', NULL, NULL),
(521, 51, 'Chhatrakot Rural Municipality', 'छत्रकोट गाउँपालिका', NULL, NULL),
(522, 51, 'Dhurkot Rural Municipality', 'धुर्कोट गाउँपालिका', NULL, NULL),
(523, 51, 'Madane Rural Municipality', 'मदाने गाउँपालिका', NULL, NULL),
(524, 51, 'Malika Rural Municipality', 'मालिका गाउँपालिका', NULL, NULL),
(525, 52, 'Rampur Municipality', 'रामपुर नगरपालिका', NULL, NULL),
(526, 52, 'Tansen Municipality', 'तानसेन नगरपालिका', NULL, NULL),
(527, 52, 'Nisdi Rural Municipality', 'निस्दी गाउँपालिका', NULL, NULL),
(528, 52, 'Purbakhola Rural Municipality', 'पूर्वखोला गाउँपालिका', NULL, NULL),
(529, 52, 'Rambha Rural Municipality', 'रम्भा गाउँपालिका', NULL, NULL),
(530, 52, 'Mathagadhi Rural Municipality', 'माथागढी गाउँपालिका', NULL, NULL),
(531, 52, 'Tinau Rural Municipality', 'तिनाउ गाउँपालिका', NULL, NULL),
(532, 52, 'Bagnaskali Rural Municipality', 'वगनासकाली गाउँपालिका', NULL, NULL),
(533, 52, 'Ribdikot Rural Municipality', 'रिब्दीकोट गाउँपालिका', NULL, NULL),
(534, 52, 'Rainadevi Chhahara Rural Municipality', 'रैनादेवी छहरा गाउँपालिका', NULL, NULL),
(535, 53, 'Tulsipur Sub-Metropolitan', 'तुलसीपुर उपमहानगरपालिका', NULL, NULL),
(536, 53, 'Ghorahi Sub-Metropolitan', 'घोराही उपमहानगरपालिका', NULL, NULL),
(537, 53, 'Lamahi Municipality', 'लमही नगरपालिका', NULL, NULL),
(538, 53, 'Banglachuli Rural Municipality', 'वंगलाचुली गाउँपालिका', NULL, NULL),
(539, 53, 'Dangisharan Rural Municipality', 'दंगीशरण गाउँपालिका', NULL, NULL),
(540, 53, 'Gadhawa Rural Municipality', 'गढवा गाउँपालिका', NULL, NULL),
(541, 53, 'Rajpur Rural Municipality', 'राजपुर गाउँपालिका', NULL, NULL),
(542, 53, 'Rapti Rural Municipality', 'राप्ती गाउँपालिका', NULL, NULL),
(543, 53, 'Shantinagar Rural Municipality', 'शान्तिनगर गाउँपालिका', NULL, NULL),
(544, 53, 'Babai Rural Municipality', 'बबई गाउँपालिका', NULL, NULL),
(545, 54, 'Pyuthan Municipality', 'प्युठान नगरपालिका', NULL, NULL),
(546, 54, 'Swargadwari Municipality', 'स्वर्गद्वारी नगरपालिका', NULL, NULL),
(547, 54, 'Gaumukhi Rural Municipality', 'गौमुखी गाउँपालिका', NULL, NULL),
(548, 54, 'Mandavi Rural Municipality', 'माण्डवी गाउँपालिका', NULL, NULL),
(549, 54, 'Sarumarani Rural Municipality', 'सरुमारानी गाउँपालिका', NULL, NULL),
(550, 54, 'Mallarani Rural Municipality', 'मल्लरानी गाउँपालिका', NULL, NULL),
(551, 54, 'Naubahini Rural Municipality', 'नौबहिनी गाउँपालिका', NULL, NULL),
(552, 54, 'Jhimaruk Rural Municipality', 'झिमरुक गाउँपालिका', NULL, NULL),
(553, 54, 'Airawati Rural Municipality', 'ऐरावती गाउँपालिका', NULL, NULL),
(554, 55, 'Rolpa Municipality', 'रोल्पा नगरपालिका', NULL, NULL),
(555, 55, 'Triveni Rural Municipality', 'त्रिवेणी गाउँपालिका', NULL, NULL),
(556, 55, 'Duikholi Rural Municipality', 'दुइखोली गाउँपालिका', NULL, NULL),
(557, 55, 'Madi Rural Municipality', 'माडी गाउँपालिका', NULL, NULL),
(558, 55, 'Runtigadhi Rural Municipality', 'रुन्टीगढी गाउँपालिका', NULL, NULL),
(559, 55, 'Lungri Rural Municipality', 'लुङ्ग्री गाउँपालिका', NULL, NULL),
(560, 55, 'Sukidaha Rural Municipality', 'सुकिदह गाउँपालिका', NULL, NULL),
(561, 55, 'Sunchhahari Rural Municipality', 'सुनछहरी गाउँपालिका', NULL, NULL),
(562, 55, 'Suwarnawati Rural Municipality', 'सुबर्णवती गाउँपालिका', NULL, NULL),
(563, 55, 'Thawang Rural Municipality', 'थवाङ गाउँपालिका', NULL, NULL),
(564, 56, 'Musikot Municipality', 'मुसिकोट नगरपालिका', NULL, NULL),
(565, 56, 'Chaurjahari Municipality', 'चौरजहारी नगरपालिका', NULL, NULL),
(566, 56, 'Aathbiskot Municipality', 'आठबिसकोट नगरपालिका', NULL, NULL),
(567, 56, 'Putha Uttarganga Rural Municipality', 'पुठा उत्तरगंगा गाउँपालिका', NULL, NULL),
(568, 56, 'Bhume Rural Municipality', 'भूमे गाउँपालिका', NULL, NULL),
(569, 56, 'Sisne Rural Municipality', 'सिस्ने गाउँपालिका', NULL, NULL),
(570, 57, 'Nepalgunj Sub-Metropolitan', 'नेपालगंज उपमहानगरपालिका', NULL, NULL),
(571, 57, 'Kohalpur Municipality', 'कोहलपुर नगरपालिका', NULL, NULL),
(572, 57, 'Narainapur Rural Municipality', 'नरैनापुर गाउँपालिका', NULL, NULL),
(573, 57, 'Raptisonari Rural Municipality', 'राप्ती सोनारी गाउँपालिका', NULL, NULL),
(574, 57, 'Baijnath Rural Municipality', 'वैजनाथ गाउँपालिका', NULL, NULL),
(575, 57, 'Khajura Rural Municipality', 'खजुरा गाउँपालिका', NULL, NULL),
(576, 57, 'Duduwa Rural Municipality', 'डुडुवा गाउँपालिका', NULL, NULL),
(577, 57, 'Janaki Rural Municipality', 'जानकी गाउँपालिका', NULL, NULL),
(578, 58, 'Gulariya Municipality', 'गुलरिया नगरपालिका', NULL, NULL),
(579, 58, 'Madhuvan Municipality', 'मधुवन नगरपालिका', NULL, NULL),
(580, 58, 'Rajapur Municipality', 'राजापुर नगरपालिका', NULL, NULL),
(581, 58, 'Thakurbaba Municipality', 'ठाकुरबाबा नगरपालिका', NULL, NULL),
(582, 58, 'Bansgadhi Municipality', 'बाँसगढी नगरपालिका', NULL, NULL),
(583, 58, 'Barbardiya Municipality', 'बारबर्दिया नगरपालिका', NULL, NULL),
(584, 58, 'Badhaiyatal Rural Municipality', 'बढैयाताल गाउँपालिका', NULL, NULL),
(585, 58, 'Geruwa Rural Municipality', 'गेरुवा गाउँपालिका', NULL, NULL),
(586, 59, 'Sani Bheri Rural Municipality', 'सानीभेरी गाउँपालिका', NULL, NULL),
(587, 59, 'Tribeni Rural Municipality', 'त्रिवेणी गाउँपालिका', NULL, NULL),
(588, 59, 'Banphikot Rural Municipality', 'बाँफिकोट गाउँपालिका', NULL, NULL),
(589, 60, 'Sharda Municipality', 'शारदा नगरपालिका', NULL, NULL),
(590, 60, 'Bagchaur Municipality', 'बागचौर नगरपालिका', NULL, NULL),
(591, 60, 'Bangad Kupinde Municipality', 'बनगाड कुपिन्ड़े नगरपालिका', NULL, NULL),
(592, 60, 'Kalimati Rural Municipality', 'कालीमाटी गाउँपालिका', NULL, NULL),
(593, 60, 'Tribeni Rural Municipality', 'त्रिवेणी गाउँपालिका', NULL, NULL),
(594, 60, 'Kapurkot Rural Municipality', 'कपुरकोट गाउँपालिका', NULL, NULL),
(595, 60, 'Chhatreshwari Rural Municipality', 'छत्रेश्वरी गाउँपालिका', NULL, NULL),
(596, 60, 'Dhorchaur Rural Municipality', 'ढोरचौर गाउँपालिका', NULL, NULL),
(597, 60, 'Kumakhmalika Rural Municipality', 'कुमाखमालिका गाउँपालिका', NULL, NULL),
(598, 60, 'Darma Rural Municipality', 'दार्मा गाउँपालिका', NULL, NULL),
(599, 61, 'Thuli Bheri Municipality', 'ठुली भेरी नगरपालिका', NULL, NULL),
(600, 61, 'Tripurasundari Municipality', 'त्रिपुरासुन्दरी नगरपालिका', NULL, NULL),
(601, 61, 'Dolpo Buddha Rural Municipality', 'डोल्पो बुद्ध गाउँपालिका', NULL, NULL),
(602, 61, 'She Phoksundo Rural Municipality', 'शे फोक्सुन्डो गाउँपालिका', NULL, NULL),
(603, 61, 'Jagadulla Rural Municipality', 'जगदुल्ला गाउँपालिका', NULL, NULL),
(604, 61, 'Mudkechula Rural Municipality', 'मुड्केचुला गाउँपालिका', NULL, NULL),
(605, 61, 'Kaike Rural Municipality', 'काईके गाउँपालिका', NULL, NULL),
(606, 61, 'Chharka Tangsong Rural Municipality', 'छार्का ताङसोङ गाउँपालिका', NULL, NULL),
(607, 62, 'Simkot Rural Municipality', 'सिमकोट गाउँपालिका', NULL, NULL),
(608, 62, 'Namkha Rural Municipality', 'नाम्खा गाउँपालिका', NULL, NULL),
(609, 62, 'Kharpunath Rural Municipality', 'खार्पुनाथ गाउँपालिका', NULL, NULL),
(610, 62, 'Sarkegad Rural Municipality', 'सर्केगाड गाउँपालिका', NULL, NULL),
(611, 62, 'Chankheli Rural Municipality', 'चंखेली गाउँपालिका', NULL, NULL),
(612, 62, 'Adanchuli Rural Municipality', 'अदानचुली गाउँपालिका', NULL, NULL),
(613, 62, 'Tanjakot Rural Municipality', 'ताँजाकोट गाउँपालिका', NULL, NULL),
(614, 63, 'ChandanNath Municipality', 'चन्दननाथ नगरपालिका', NULL, NULL),
(615, 63, 'Kankasundari Rural Municipality', 'कनकासुन्दरी गाउँपालिका', NULL, NULL),
(616, 63, 'Sinja Rural Municipality', 'सिंजा गाउँपालिका', NULL, NULL),
(617, 63, 'Hima Rural Municipality', 'हिमा गाउँपालिका', NULL, NULL),
(618, 63, 'Tila Rural Municipality', 'तिला गाउँपालिका', NULL, NULL),
(619, 63, 'Guthichaur Rural Municipality', 'गुठिचौर गाउँपालिका', NULL, NULL),
(620, 63, 'Tatopani Rural Municipality', 'तातोपानी गाउँपालिका', NULL, NULL),
(621, 63, 'Patarasi Rural Municipality', 'पातारासी गाउँपालिका', NULL, NULL),
(622, 64, 'Khadachakra Municipality', 'खाडाचक्र नगरपालिका', NULL, NULL),
(623, 64, 'Raskot Municipality', 'रास्कोट नगरपालिका', NULL, NULL),
(624, 64, 'Tilagufa Municipality', 'तिलागुफा नगरपालिका', NULL, NULL),
(625, 64, 'Pachaljharana Rural Municipality', 'पचालझरना गाउँपालिका', NULL, NULL),
(626, 64, 'Sanni Triveni Rural Municipality', 'सान्नी त्रिवेणी गाउँपालिका', NULL, NULL),
(627, 64, 'Narharinath Rural Municipality', 'नरहरिनाथ गाउँपालिका', NULL, NULL),
(628, 64, 'Shubha Kalika Rural Municipality', 'शुभ कालिका गाउँपालिका', NULL, NULL),
(629, 64, 'Mahawai Rural Municipality', 'महावै गाउँपालिका', NULL, NULL),
(630, 64, 'Palata Rural Municipality', 'पलाता गाउँपालिका', NULL, NULL),
(631, 65, 'Chayanath Rara Municipality', 'छायाँनाथ रारा नगरपालिका', NULL, NULL),
(632, 65, 'Mugum Karmarong Rural Municipality', 'मुगुम कार्मारोंग गाउँपालिका', NULL, NULL),
(633, 65, 'Soru Rural Municipality', 'सोरु गाउँपालिका', NULL, NULL),
(634, 65, 'Khatyad Rural Municipality', 'खत्याड गाउँपालिका', NULL, NULL),
(635, 66, 'Birendranagar Municipality', 'बीरेन्द्रनगर नगरपालिका', NULL, NULL),
(636, 66, 'Bheriganga Municipality', 'भेरीगंगा नगरपालिका', NULL, NULL),
(637, 66, 'Gurbhakot Municipality', 'गुर्भाकोट नगरपालिका', NULL, NULL),
(638, 66, 'Panchapuri Municipality', 'पंचपुरी नगरपालिका', NULL, NULL),
(639, 66, 'Lekhbeshi Municipality', 'लेकबेशी नगरपालिका', NULL, NULL),
(640, 66, 'Chaukune Rural Municipality', 'चौकुने गाउँपालिका', NULL, NULL),
(641, 66, 'Barahatal Rural Municipality', 'बराहताल गाउँपालिका', NULL, NULL),
(642, 66, 'Chingad Rural Municipality', 'चिङ्गाड गाउँपालिका', NULL, NULL),
(643, 66, 'Simta Rural Municipality', 'सिम्ता गाउँपालिका', NULL, NULL),
(644, 67, 'Narayan Municipality', 'नारायण नगरपालिका', NULL, NULL),
(645, 67, 'Dullu Municipality', 'दुल्लु नगरपालिका', NULL, NULL),
(646, 67, 'Chamunda Bindrasaini Municipality', 'चामुण्डा बिन्द्रासैनी नगरपालिका', NULL, NULL),
(647, 67, 'AathBis Municipality', 'आठबीस नगरपालिका', NULL, NULL),
(648, 67, 'Bhagawatimai Rural Municipality', 'भगवतीमाई गाउँपालिका', NULL, NULL),
(649, 67, 'Gurans Rural Municipality', 'गुराँस गाउँपालिका', NULL, NULL),
(650, 67, 'Dungeshwar Rural Municipality', 'डुंगेश्वर गाउँपालिका', NULL, NULL),
(651, 67, 'Naumule Rural Municipality', 'नौमुले गाउँपालिका', NULL, NULL),
(652, 67, 'Mahabu Rural Municipality', 'महावु गाउँपालिका', NULL, NULL),
(653, 67, 'Bhairabi Rural Municipality', 'भैरवी गाउँपालिका', NULL, NULL),
(654, 67, 'Thantikandh Rural Municipality', 'ठाँटीकाँध गाउँपालिका', NULL, NULL),
(655, 68, 'Bheri Municipality', 'भेरी नगरपालिका', NULL, NULL),
(656, 68, 'Chhedagad Municipality', 'छेडागाड नगरपालिका', NULL, NULL),
(657, 68, 'Triveni Nalgad Municipality', 'त्रिवेणी नलगाड नगरपालिका', NULL, NULL),
(658, 68, 'Kushe Rural Municipality', 'कुसे गाउँपालिका', NULL, NULL),
(659, 68, 'Junichande Rural Municipality', 'जुनीचाँदे गाउँपालिका', NULL, NULL),
(660, 68, 'Barekot Rural Municipality', 'बारेकोट गाउँपालिका', NULL, NULL),
(661, 68, 'Shivalaya Rural Municipality', 'शिवालय गाउँपालिका', NULL, NULL),
(662, 69, 'Dhangadhi Sub-Metropolitan', 'धनगढी उपमहानगरपालिका', NULL, NULL),
(663, 69, 'Tikapur Municipality', 'टिकापुर नगरपालिका', NULL, NULL),
(664, 69, 'Ghodaghodi Municipality', 'घोडाघोडी नगरपालिका', NULL, NULL),
(665, 69, 'Lamkhichuha Municipality', 'लम्किचुहा नगरपालिका', NULL, NULL),
(666, 69, 'Bhajani Municipality', 'भजनी नगरपालिका', NULL, NULL),
(667, 69, 'Godawari Municipality', 'गोदावरी नगरपालिका', NULL, NULL),
(668, 69, 'Gauriganga Municipality', 'गौरीगंगा नगरपालिका', NULL, NULL),
(669, 69, 'Janaki Rural Municipality', 'जानकी गाउँपालिका', NULL, NULL),
(670, 69, 'Bardagoriya Rural Municipality', 'बर्गगोरिया गाउँपालिका', NULL, NULL),
(671, 69, 'Mohanyal Rural Municipality', 'मोहन्याल गाउँपालिका', NULL, NULL),
(672, 69, 'Kailari Rural Municipality', 'कैलारी गाउँपालिका', NULL, NULL),
(673, 69, 'Joshipur Rural Municipality', 'जोशीपुर गाउँपालिका', NULL, NULL),
(674, 69, 'Chure Rural Municipality', 'चुरे गाउँपालिका', NULL, NULL),
(675, 70, 'Mangalsen Municipality', 'मंगलसेन नगरपालिका', NULL, NULL),
(676, 70, 'Kamalbazar Municipality', 'कमलबजार नगरपालिका', NULL, NULL),
(677, 70, 'Sanfebagar', 'साँफेबगर नगरपालिका', NULL, NULL),
(678, 70, 'Panchadeval Binayak Municipality', 'पंचदेवल विनायक नगरपालिका', NULL, NULL),
(679, 70, 'Chaurpati Rural Municipality', 'चौरपाटी गाउँपालिका', NULL, NULL);
INSERT INTO `palikas` (`id`, `district_id`, `palika_en`, `palika_np`, `created_at`, `updated_at`) VALUES
(680, 70, 'Mellekh Rural Municipality', 'मेल्लेख गाउँपालिका', NULL, NULL),
(681, 70, 'Bannigadi Jayagad Rural Municipality', 'बान्नीगडीजैगड गाउँपालिका', NULL, NULL),
(682, 70, 'Ramaroshan Rural Municipality', 'रामारोशन गाउँपालिका', NULL, NULL),
(683, 70, 'Dhankari Rural Municipality', 'ढँकारी गाउँपालिका', NULL, NULL),
(684, 70, 'Turmakhand Rural Municipality', 'तुर्माखाँद गाउँपालिका', NULL, NULL),
(685, 71, 'Dipayal Silgadi Municipality', 'दिपायल सिलगडी नगरपालिका', NULL, NULL),
(686, 71, 'Shikhar Municipality', 'शिखर नगरपालिका', NULL, NULL),
(687, 71, 'Purbichauki Rural Municipality', 'पूर्वीचौकी गाउँपालिका', NULL, NULL),
(688, 71, 'Badikedar Rural Municipality', 'बड्डी केदार गाउँपालिका', NULL, NULL),
(689, 71, 'Jorayal Rural Municipality', 'जोरायल गाउँपालिका', NULL, NULL),
(690, 71, 'Sayal Rural Municipality', 'सायल गाउँपालिका', NULL, NULL),
(691, 71, 'Aadarsha Rural Municipality', 'आदर्श गाउँपालिका', NULL, NULL),
(692, 71, 'K.I. Singh Rural Municipality', 'केआईसिंह गाउँपालिका', NULL, NULL),
(693, 71, 'Bogatan-Phudsil Rural Municipality', 'वोगटान–फुड्सिल गाउँपालिका', NULL, NULL),
(694, 72, 'JayaPrithivi Municipality', 'जयपृथिवी नगरपालिका', NULL, NULL),
(695, 72, 'Bungal Municipality', 'बुंगल नगरपालिका', NULL, NULL),
(696, 72, 'Talkot Rural Municipality', 'तलकोट गाउँपालिका', NULL, NULL),
(697, 72, 'Masta Rural Municipality', 'मष्टा गाउँपालिका', NULL, NULL),
(698, 72, 'Thalara Rural Municipality', 'थलारा गाउँपालिका', NULL, NULL),
(699, 72, 'Khaptad Chhanna Rural Municipality', 'खप्तड छान्ना गाउँपालिका', NULL, NULL),
(700, 72, 'Bitthadchir Rural Municipality', 'बित्थडचिर गाउँपालिका', NULL, NULL),
(701, 72, 'Surma Rural Municipality', 'सुर्मा गाउँपालिका', NULL, NULL),
(702, 72, 'Chhabis Pathibhera Rural Municipality', 'छब्बीसपाथिभेरा गाउँपालिका', NULL, NULL),
(703, 72, 'Durgathali Rural Municipality', 'दुर्गाथली गाउँपालिका', NULL, NULL),
(704, 72, 'Kedarsyu Rural Municipality', 'केदारस्यु गाउँपालिका', NULL, NULL),
(705, 72, 'Kanda Saipal Rural Municipality', 'काँडा सइपाल गाउँपालिका', NULL, NULL),
(706, 73, 'Badimalika Municipality', 'बडीमालिका नगरपालिका', NULL, NULL),
(707, 73, 'Triveni Municipality', 'त्रिवेणी नगरपालिका', NULL, NULL),
(708, 73, 'Budhiganga Municipality', 'बुढीगंगा नगरपालिका', NULL, NULL),
(709, 73, 'Budhinanda Municipality', 'बुढीनन्दा नगरपालिका', NULL, NULL),
(710, 73, 'Gaumul Rural Municipality', 'गौमुल गाउँपालिका', NULL, NULL),
(711, 73, 'Swami Kartik Khapar Rural Municipality', 'स्वामिकार्तिक खापर गाउँपालिका', NULL, NULL),
(712, 73, 'Khaptad Chhededaha Rural Municipality', 'खप्तड छेडेदह गाउँपालिका', NULL, NULL),
(713, 73, 'Himali Rural Municipality', 'हिमाली गाउँपालिका', NULL, NULL),
(714, 73, 'Swami Kartik Khapar Rural Municipality', 'स्वामिकार्तिक खापर गाउँपालिका', NULL, NULL),
(715, 74, 'Bhimdatta Municipality', 'भिमदत्त नगरपालिका', NULL, NULL),
(716, 74, 'Punarbas Municipality', 'पुनर्बास नगरपालिका', NULL, NULL),
(717, 74, 'Bedkot Municipality', 'बेदकोट नगरपालिका', NULL, NULL),
(718, 74, 'Mahakali Municipality', 'महाकाली नगरपालिका', NULL, NULL),
(719, 74, 'Shuklafata Municipality', 'शुक्लाफाटा नगरपालिका', NULL, NULL),
(720, 74, 'Belauri Municipality', 'बेलौरी नगरपालिका', NULL, NULL),
(721, 74, 'Krishnapur Municipality', 'कृष्णपुर नगरपालिका', NULL, NULL),
(722, 74, 'Beldandi Rural Municipality', 'बेलडाँडी गाउँपालिका', NULL, NULL),
(723, 74, 'Laljhadi Rural Municipality', 'लालझाँडी गाउँपालिका', NULL, NULL),
(724, 75, 'Amargadhi Municipality', 'अमरगढी नगरपालिका', NULL, NULL),
(725, 75, 'Parshuram Municipality', 'परशुराम नगरपालिका', NULL, NULL),
(726, 75, 'Aalitaal Rural Municipality', 'आलिताल गाउँपालिका', NULL, NULL),
(727, 75, 'Bhageshwar Rural Municipality', 'भागेश्वर गाउँपालिका', NULL, NULL),
(728, 75, 'Navadurga Rural Municipality', 'नवदुर्गा गाउँपालिका', NULL, NULL),
(729, 75, 'Ajaymeru Rural Municipality', 'अजयमेरु गाउँपालिका', NULL, NULL),
(730, 75, 'Ganyapadhura Rural Municipality', 'गन्यापधुरा गाउँपालिका', NULL, NULL),
(731, 76, 'Dasharathchand Municipality', 'दशरथचन्द नगरपालिका', NULL, NULL),
(732, 76, 'Patan Municipality', 'पाटन नगरपालिका', NULL, NULL),
(733, 76, 'Melauli Municipality', 'मेलौली नगरपालिका', NULL, NULL),
(734, 76, 'Puchaundi Municipality', 'पुचौडी नगरपालिका', NULL, NULL),
(735, 76, 'Surnaya Rural Municipality', 'सुर्नया गाउँपालिका', NULL, NULL),
(736, 76, 'Sigas Rural Municipality', 'सिगास गाउँपालिका', NULL, NULL),
(737, 76, 'Shivanath Rural Municipality', 'शिवनाथ गाउँपालिका', NULL, NULL),
(738, 76, 'Pancheshwar Rural Municipality', 'पञ्चेश्वर गाउँपालिका', NULL, NULL),
(739, 76, 'Dogdakedar Rural Municipality', 'दोगडाकेदार गाउँपालिका', NULL, NULL),
(740, 76, 'Dilashaini Rural Municipality', 'डिलाशैनी गाउँपालिका', NULL, NULL),
(741, 77, 'Mahakali Municipality', 'महाकाली नगरपालिका', NULL, NULL),
(742, 77, 'Shailyashikhar Municipality', 'शैल्यशिखर नगरपालिका', NULL, NULL),
(743, 77, 'Malikarjun Rural Municipality', 'मालिकार्जुन गाउँपालिका', NULL, NULL),
(744, 77, 'Api Himal Rural Municipality', 'अपि हिमाल गाउँपालिका', NULL, NULL),
(745, 77, 'Duhu Rural Municipality', 'दुहु गाउँपालिका', NULL, NULL),
(746, 77, 'Naugad Rural Municipality', 'नौगाड गाउँपालिका', NULL, NULL),
(747, 77, 'Marma Rural Municipality', 'मार्मा गाउँपालिका', NULL, NULL),
(748, 77, 'Lekam Rural Municipality', 'लेकम गाउँपालिका', NULL, NULL),
(749, 77, 'Byas Rural Municipality', 'ब्याँस गाउँपालिका', NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'cerate', 'web', '2024-05-29 00:50:07', '2024-05-29 03:31:13'),
(4, 'delete', 'web', '2024-05-29 03:21:39', '2024-05-29 03:31:02'),
(5, 'view', 'web', '2024-05-29 03:21:44', '2024-05-29 03:30:56'),
(6, 'edit', 'web', '2024-05-29 03:21:49', '2024-05-29 03:30:49'),
(7, 'view users', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(8, 'create users', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(9, 'edit users', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(10, 'delete users', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(11, 'view posts', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(12, 'create posts', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(13, 'edit posts', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(14, 'delete posts', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(15, 'publish posts', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(16, 'unpublish posts', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(17, 'view settings', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(18, 'update settings', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(19, 'view categories', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(20, 'create categories', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(21, 'edit categories', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(22, 'delete categories', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(23, 'view roles', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(24, 'create roles', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(25, 'edit roles', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(26, 'delete roles', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(27, 'assign roles', 'web', '2024-05-29 05:04:22', '2024-05-29 05:04:22'),
(28, 'delete user', 'web', '2024-05-29 05:17:57', '2024-05-29 05:17:57'),
(29, 'edit user', 'web', '2024-05-29 05:21:15', '2024-05-29 05:21:15'),
(30, 'view role', 'web', '2024-05-29 05:32:02', '2024-05-29 05:32:02'),
(31, 'edit role', 'web', '2024-05-29 05:32:57', '2024-05-29 05:32:57'),
(32, 'delete role', 'web', '2024-05-29 05:33:09', '2024-05-29 05:33:09'),
(33, 'create industry', 'web', '2024-05-29 05:55:59', '2024-05-29 05:55:59'),
(34, 'edit industry', 'web', '2024-05-29 05:56:16', '2024-05-29 05:56:16'),
(35, 'delete industry', 'web', '2024-05-29 05:56:22', '2024-05-29 05:56:22'),
(36, 'view industry', 'web', '2024-05-29 06:23:22', '2024-05-29 06:23:22'),
(37, 'view main setup', 'web', '2024-05-29 10:35:33', '2024-05-29 10:35:33'),
(38, 'view fiscal year', 'web', '2024-05-29 10:35:50', '2024-05-29 23:52:34'),
(39, 'view unit setup', 'web', '2024-05-29 10:36:02', '2024-05-29 10:36:02'),
(40, 'view machinery', 'web', '2024-05-29 10:36:25', '2024-05-29 23:58:21'),
(41, 'view Physical structure setup', 'web', '2024-05-29 10:36:52', '2024-05-29 10:36:52'),
(42, 'view worker setup', 'web', '2024-05-29 10:37:27', '2024-05-29 10:37:27'),
(43, 'create fiscal year', 'web', '2024-05-29 10:38:48', '2024-05-29 23:52:59'),
(44, 'delete fiscal year', 'web', '2024-05-29 10:39:07', '2024-05-29 10:39:07'),
(45, 'edit fiscal year', 'web', '2024-05-29 10:39:17', '2024-05-29 10:39:17'),
(46, 'edit unit', 'web', '2024-05-29 10:39:43', '2024-05-29 10:39:43'),
(47, 'create unit', 'web', '2024-05-29 10:39:52', '2024-05-29 10:39:52'),
(48, 'delete unit', 'web', '2024-05-29 10:40:07', '2024-05-29 10:40:07'),
(49, 'create machinery', 'web', '2024-05-29 10:40:49', '2024-05-29 10:40:49'),
(50, 'edit machinery', 'web', '2024-05-29 10:40:58', '2024-05-29 10:40:58'),
(51, 'delete machinary', 'web', '2024-05-29 10:41:18', '2024-05-29 10:41:18'),
(52, 'create Physical structure', 'web', '2024-05-29 10:41:48', '2024-05-29 10:41:48'),
(53, 'edit Physical structure', 'web', '2024-05-29 10:41:55', '2024-05-29 10:41:55'),
(54, 'delete Physical structure', 'web', '2024-05-29 10:42:06', '2024-05-29 10:42:06'),
(55, 'create worker', 'web', '2024-05-29 10:43:02', '2024-05-29 10:43:02'),
(56, 'edit worker', 'web', '2024-05-29 10:43:10', '2024-05-29 10:43:10'),
(57, 'delete worker', 'web', '2024-05-29 10:43:18', '2024-05-29 10:43:18'),
(58, 'create Finance Management', 'web', '2024-05-29 10:46:26', '2024-05-29 10:46:26'),
(59, 'edit Finance Management', 'web', '2024-05-29 10:46:31', '2024-05-29 10:46:31'),
(60, 'delete Finance Management', 'web', '2024-05-29 10:46:38', '2024-05-29 10:46:38'),
(61, 'view Finance Management', 'web', '2024-05-29 10:46:44', '2024-05-29 10:46:44'),
(62, 'create inventory', 'web', '2024-05-29 10:47:49', '2024-05-29 10:47:49'),
(63, 'view inventory', 'web', '2024-05-29 10:48:01', '2024-05-29 10:48:01'),
(64, 'delete inventory', 'web', '2024-05-29 10:48:08', '2024-05-29 10:48:08'),
(65, 'view Property breakdown', 'web', '2024-05-29 10:48:56', '2024-05-29 10:48:56'),
(66, 'edit Property breakdown', 'web', '2024-05-29 10:49:02', '2024-05-29 10:49:02'),
(67, 'delete Property breakdown', 'web', '2024-05-29 10:49:07', '2024-05-29 10:49:07'),
(68, 'view billing', 'web', '2024-05-29 10:49:28', '2024-05-29 10:49:28'),
(69, 'edit billing', 'web', '2024-05-29 10:49:39', '2024-05-29 10:49:39'),
(70, 'delete billing', 'web', '2024-05-29 10:49:46', '2024-05-29 10:49:46'),
(71, 'create billing', 'web', '2024-05-29 10:49:52', '2024-05-29 10:49:52'),
(72, 'view business', 'web', '2024-05-29 10:51:42', '2024-05-29 10:51:42'),
(73, 'view account title', 'web', '2024-05-29 10:52:39', '2024-05-29 10:52:39'),
(74, 'create account title', 'web', '2024-05-29 10:52:50', '2024-05-29 10:52:50'),
(75, 'delete account title', 'web', '2024-05-29 10:52:59', '2024-05-29 10:52:59'),
(76, 'edit account title', 'web', '2024-05-29 10:53:09', '2024-05-29 10:53:09'),
(77, 'create Voucher type', 'web', '2024-05-29 10:53:58', '2024-05-29 10:53:58'),
(78, 'edit Voucher type', 'web', '2024-05-29 10:54:05', '2024-05-29 10:54:05'),
(79, 'delete Voucher type', 'web', '2024-05-29 10:54:11', '2024-05-29 10:54:11'),
(80, 'view Voucher type', 'web', '2024-05-29 10:54:18', '2024-05-29 10:54:18'),
(81, 'view Grants and training', 'web', '2024-05-29 10:55:27', '2024-05-29 10:55:27'),
(82, 'create grant', 'web', '2024-05-29 10:56:03', '2024-05-29 10:56:03'),
(83, 'view grant', 'web', '2024-05-29 10:56:09', '2024-05-29 10:56:09'),
(84, 'delete grant', 'web', '2024-05-29 10:56:15', '2024-05-29 10:56:15'),
(85, 'edit grant', 'web', '2024-05-29 10:56:22', '2024-05-29 10:56:22'),
(86, 'create training', 'web', '2024-05-29 10:56:52', '2024-05-29 10:56:52'),
(87, 'view training', 'web', '2024-05-29 10:57:00', '2024-05-29 10:57:00'),
(88, 'edit training', 'web', '2024-05-29 10:57:07', '2024-05-29 10:57:07'),
(89, 'delete training', 'web', '2024-05-29 10:57:15', '2024-05-29 10:57:15'),
(90, 'view report', 'web', '2024-05-29 10:57:46', '2024-05-29 10:57:46'),
(91, 'view setting', 'web', '2024-05-29 22:59:56', '2024-05-29 22:59:56'),
(92, 'view Physical structure', 'web', '2024-05-29 23:26:47', '2024-05-29 23:26:47'),
(93, 'view worker', 'web', '2024-05-29 23:28:39', '2024-05-29 23:28:39'),
(94, 'create Property breakdown', 'web', '2024-05-29 23:40:31', '2024-05-29 23:40:31'),
(95, 'view anudan', 'web', '2024-05-29 23:46:43', '2024-05-29 23:46:43'),
(96, 'create anudan', 'web', '2024-05-29 23:46:51', '2024-05-29 23:46:51'),
(97, 'edit anudan', 'web', '2024-05-29 23:46:58', '2024-05-29 23:46:58'),
(98, 'delete anudan', 'web', '2024-05-29 23:47:05', '2024-05-29 23:47:05'),
(99, 'delete machinery', 'web', '2024-05-29 23:59:36', '2024-05-29 23:59:36'),
(100, 'View Farmer Profile Report', 'web', '2024-05-30 04:07:14', '2024-05-30 04:07:14'),
(101, 'View Farm Report', 'web', '2024-05-30 04:09:28', '2024-05-30 04:09:28'),
(102, 'View Physical structure description', 'web', '2024-05-30 04:10:35', '2024-05-30 04:10:35'),
(103, 'View Machinery Report', 'web', '2024-05-30 04:18:44', '2024-05-30 04:18:44'),
(104, 'View Business Report', 'web', '2024-05-30 04:18:58', '2024-05-30 04:18:58'),
(105, 'View Income/expenditure Report', 'web', '2024-05-30 04:19:25', '2024-05-30 04:19:25'),
(106, 'View Physical Training Report', 'web', '2024-05-30 04:19:40', '2024-05-30 04:19:40'),
(107, 'View Insurance Report', 'web', '2024-05-30 04:19:49', '2024-05-30 04:19:49'),
(108, 'View Animal Report', 'web', '2024-05-30 04:19:58', '2024-05-30 04:19:58'),
(109, 'View Balinali Report', 'web', '2024-05-30 04:20:13', '2024-05-30 04:20:13'),
(110, 'view machinery setup', 'web', '2024-05-30 04:28:41', '2024-05-30 04:28:41'),
(111, 'view bussiness', 'web', '2024-05-30 04:33:41', '2024-05-30 04:33:41'),
(112, 'permission test', 'web', '2024-05-30 04:46:22', '2024-05-30 04:46:22'),
(113, 'view fiscal year setup', 'web', '2024-05-30 05:28:55', '2024-05-30 05:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_old`
--

CREATE TABLE `permissions_old` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_training`
--

CREATE TABLE `person_training` (
  `id` bigint UNSIGNED NOT NULL,
  `training_person_id` bigint UNSIGNED NOT NULL,
  `talim_id` bigint UNSIGNED NOT NULL,
  `training_phase_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `person_training`
--

INSERT INTO `person_training` (`id`, `training_person_id`, `talim_id`, `training_phase_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL, NULL),
(2, 4, 1, NULL, NULL, NULL),
(3, 5, 1, NULL, NULL, NULL),
(4, 6, 1, NULL, '2024-06-12 10:19:42', '2024-06-12 10:19:42'),
(5, 7, 1, NULL, '2024-06-12 10:19:42', '2024-06-12 10:19:42'),
(6, 8, 1, NULL, '2024-06-12 10:19:42', '2024-06-12 10:19:42'),
(7, 9, 1, NULL, '2024-06-12 10:19:42', '2024-06-12 10:19:42'),
(8, 10, 4, NULL, '2024-06-12 23:35:40', '2024-06-12 23:35:40'),
(9, 11, 4, NULL, '2024-06-12 23:35:40', '2024-06-12 23:35:40'),
(10, 12, 4, NULL, '2024-06-12 23:35:40', '2024-06-12 23:35:40'),
(11, 13, 4, NULL, '2024-06-12 23:35:40', '2024-06-12 23:35:40'),
(17, 19, 1, NULL, '2024-06-13 02:09:42', '2024-06-13 02:09:42'),
(18, 20, 1, NULL, '2024-06-13 02:12:03', '2024-06-13 02:12:03'),
(19, 21, 1, NULL, '2024-06-13 02:12:03', '2024-06-13 02:12:03'),
(20, 22, 1, NULL, '2024-06-13 02:12:03', '2024-06-13 02:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `person_training_phase`
--

CREATE TABLE `person_training_phase` (
  `id` bigint UNSIGNED NOT NULL,
  `training_person_id` bigint UNSIGNED NOT NULL,
  `talim_id` bigint UNSIGNED NOT NULL,
  `training_phase_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `person_training_phase`
--

INSERT INTO `person_training_phase` (`id`, `training_person_id`, `talim_id`, `training_phase_id`, `created_at`, `updated_at`) VALUES
(1, 19, 1, 19, '2024-06-13 02:09:42', '2024-06-13 02:09:42'),
(2, 20, 1, 21, '2024-06-13 02:12:03', '2024-06-13 02:12:03'),
(3, 21, 1, 21, '2024-06-13 02:12:03', '2024-06-13 02:12:03'),
(4, 22, 1, 19, '2024-06-13 02:12:03', '2024-06-13 02:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `production_batches`
--

CREATE TABLE `production_batches` (
  `id` bigint UNSIGNED NOT NULL,
  `batch_no` bigint DEFAULT NULL,
  `inventory_product_id` bigint UNSIGNED NOT NULL,
  `production_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_produced` int DEFAULT NULL,
  `raw_materials_used` json DEFAULT NULL,
  `expiry_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_alerted` tinyint(1) DEFAULT '0',
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_batches`
--

INSERT INTO `production_batches` (`id`, `batch_no`, `inventory_product_id`, `production_date`, `quantity_produced`, `raw_materials_used`, `expiry_date`, `is_alerted`, `udhyog_id`, `created_at`, `updated_at`) VALUES
(32, 1, 5, '2081-3-3', 2, NULL, '2081/03/32', 2, NULL, '2024-06-08 10:52:01', '2024-06-16 05:12:39'),
(33, 33, 5, '2081/02/27', 1, NULL, '2081/02/31', 2, NULL, '2024-06-08 10:52:48', '2024-06-10 04:54:44'),
(34, 34, 6, '2081/02/27', 660, NULL, '2081/02/31', 2, NULL, '2024-06-08 10:53:20', '2024-06-10 04:57:01'),
(35, 35, 5, '2081/02/28', 20, NULL, '2081/05/27', 22, NULL, '2024-06-10 00:29:49', '2024-06-10 04:46:18'),
(38, 38, 8, '2081-3-3', 233, NULL, '2081/03/01', 0, 3, '2024-06-11 23:28:43', '2024-06-16 05:58:24'),
(40, 40, 13, '2081-2-30', 232, NULL, '2081-2-30', 0, 5, '2024-06-12 00:57:26', '2024-06-12 00:57:33'),
(41, 41, 6, '2081-2-31', 760, NULL, '2081-2-31', 0, NULL, '2024-06-12 23:55:09', '2024-06-12 23:55:09'),
(42, 42, 9, '2081-2-31', 706, NULL, '2081-2-31', 0, NULL, '2024-06-12 23:55:17', '2024-06-12 23:55:17'),
(44, 43, 11, '2081/02/23', 776, NULL, '2081/03/32', 0, 3, '2024-06-16 06:00:05', '2024-06-16 06:03:43'),
(45, 45, 10, '2081/03/20', 22, NULL, '2081/03/26', 0, 3, '2024-06-16 06:06:50', '2024-06-16 06:06:50'),
(46, 46, 5, '2081/03/12', 33, NULL, '2081/03/29', 0, 3, '2024-06-17 03:34:55', '2024-06-17 03:34:55'),
(47, 46, 5, '2081/03/12', 33, NULL, '2081/03/29', 0, 3, '2024-06-17 03:36:18', '2024-06-17 03:36:18'),
(49, 49, 11, '2081/03/20', 222, NULL, '2081/03/28', 0, 3, '2024-06-18 00:43:04', '2024-06-18 00:43:04'),
(50, 50, 10, '2081/03/13', 222, NULL, '2081/03/27', 0, 3, '2024-06-18 01:01:55', '2024-06-18 01:01:55'),
(51, 50, 10, '2081/03/13', 222, NULL, '2081/03/27', 0, 3, '2024-06-18 01:03:50', '2024-06-18 01:03:50'),
(52, 50, 10, '2081/03/13', 222, NULL, '2081-03-27', 0, 3, '2024-06-18 01:04:25', '2024-06-18 01:04:25'),
(53, 53, 9, '2081-3-5', 3333, NULL, '2081-3-5', 0, 2, '2024-06-18 01:39:23', '2024-06-18 01:39:23'),
(54, 54, 9, '2081-3-6', 152, NULL, '2081-3-6', 0, 2, '2024-06-19 01:12:22', '2024-06-19 01:12:22'),
(55, 55, 14, '2081/03/28', 33, NULL, '2081/03/18', 0, 2, '2024-06-19 04:25:46', '2024-06-19 04:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `production_batch_products`
--

CREATE TABLE `production_batch_products` (
  `id` bigint UNSIGNED NOT NULL,
  `production_batch_id` bigint UNSIGNED NOT NULL,
  `inventory_product_id` bigint UNSIGNED NOT NULL,
  `quantity_produced` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_batch_products`
--

INSERT INTO `production_batch_products` (`id`, `production_batch_id`, `inventory_product_id`, `quantity_produced`, `created_at`, `updated_at`) VALUES
(1, 52, 10, 222, NULL, NULL),
(2, 53, 9, 3267, NULL, '2024-06-18 23:43:19'),
(3, 54, 9, 130, NULL, '2024-06-19 03:45:10'),
(4, 55, 14, 33, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_batch_raw_materials`
--

CREATE TABLE `production_batch_raw_materials` (
  `id` bigint NOT NULL,
  `production_batch_id` bigint UNSIGNED NOT NULL,
  `raw_material_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `unit_cost` float DEFAULT '0',
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `total_cost` float NOT NULL DEFAULT '0',
  `unit_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_batch_raw_materials`
--

INSERT INTO `production_batch_raw_materials` (`id`, `production_batch_id`, `raw_material_id`, `quantity`, `created_at`, `updated_at`, `unit_cost`, `supplier_id`, `total_cost`, `unit_id`) VALUES
(69, 33, 2, 33, '2024-06-08 16:37:48', '2024-06-08 16:37:48', 0, 14, 0, 1),
(70, 34, 6, 33, '2024-06-08 16:38:20', '2024-06-08 16:38:20', 0, 14, 0, 1),
(75, 32, 2, 33, '2024-06-09 05:11:52', '2024-06-09 05:11:52', 0, 14, 0, 1),
(77, 35, 3, 33, '2024-06-10 06:14:49', '2024-06-10 06:14:49', 0, 14, 0, 1),
(80, 38, 3, 33, '2024-06-12 05:13:43', '2024-06-12 05:13:43', 0, 14, 0, 1),
(81, 38, 6, 33, '2024-06-12 05:13:43', '2024-06-12 05:13:43', 0, 14, 0, 1),
(83, 40, 14, 1, '2024-06-12 06:42:26', '2024-06-12 06:42:26', 0, 14, 0, 1),
(84, 41, 2, 77, '2024-06-13 05:40:09', '2024-06-13 05:40:09', 0, 14, 0, 1),
(85, 42, 3, 293, '2024-06-13 05:40:17', '2024-06-13 05:40:17', 0, 14, 0, 1),
(87, 44, 12, 1, '2024-06-16 11:45:05', '2024-06-16 11:45:05', 0, 14, 0, 1),
(88, 44, 13, 880, '2024-06-16 11:45:05', '2024-06-16 11:45:05', 0, 14, 0, 1),
(89, 45, 12, 33, '2024-06-16 11:51:50', '2024-06-16 11:51:50', 0, 14, 0, 1),
(90, 47, 12, 33, '2024-06-17 09:21:18', '2024-06-17 09:21:18', 33, 14, 1089, 1),
(91, 47, 13, 3, '2024-06-17 09:21:18', '2024-06-17 09:21:18', 33, 15, 99, 2),
(94, 49, 7, 222, '2024-06-18 06:28:04', '2024-06-18 06:28:04', 33, 14, 7326, 1),
(95, 49, 11, 33, '2024-06-18 06:28:04', '2024-06-18 06:28:04', 33, 15, 1089, 1),
(96, 50, 7, 12, '2024-06-18 06:46:55', '2024-06-18 06:46:55', 33, 14, 396, 1),
(97, 50, 8, 33, '2024-06-18 06:46:55', '2024-06-18 06:46:55', 33, 14, 1089, 2),
(98, 51, 7, 12, '2024-06-18 06:48:50', '2024-06-18 06:48:50', 33, 14, 396, 1),
(99, 51, 8, 33, '2024-06-18 06:48:50', '2024-06-18 06:48:50', 33, 14, 1089, 2),
(100, 52, 7, 12, '2024-06-18 06:49:25', '2024-06-18 06:49:25', 33, 14, 396, 1),
(101, 52, 8, 33, '2024-06-18 06:49:25', '2024-06-18 06:49:25', 33, 14, 1089, 2),
(102, 53, 7, 180, '2024-06-18 07:24:23', '2024-06-18 07:24:23', 33, 12, 5940, 1),
(103, 54, 7, 565, '2024-06-19 06:57:22', '2024-06-19 06:57:22', 22, 13, 12430, 1),
(104, 54, 7, 899, '2024-06-19 06:57:22', '2024-06-19 06:57:22', 22, 19, 19778, 1),
(105, 54, 10, 160, '2024-06-19 06:57:22', '2024-06-19 06:57:22', 22, 19, 3520, 1),
(106, 55, 8, 33, '2024-06-19 10:10:46', '2024-06-19 10:10:46', 33, 12, 1089, 1),
(107, 55, 11, 3, '2024-06-19 10:10:46', '2024-06-19 10:10:46', 222, 13, 666, 2);

-- --------------------------------------------------------

--
-- Table structure for table `production_batch_worker_lists`
--

CREATE TABLE `production_batch_worker_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `production_batch_id` bigint UNSIGNED NOT NULL,
  `worker_list_id` bigint UNSIGNED NOT NULL,
  `hours_worked` int DEFAULT NULL,
  `days_worked` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_batch_worker_lists`
--

INSERT INTO `production_batch_worker_lists` (`id`, `production_batch_id`, `worker_list_id`, `hours_worked`, `days_worked`, `created_at`, `updated_at`) VALUES
(1, 54, 16, 32, 18, NULL, NULL),
(2, 54, 14, 98, 8, NULL, NULL),
(3, 54, 15, 36, 4, NULL, NULL),
(4, 54, 14, 28, 13, NULL, NULL),
(5, 55, 15, 8, NULL, NULL, NULL),
(6, 55, 14, NULL, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_inventories`
--

CREATE TABLE `product_inventories` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `production_batch_id` bigint UNSIGNED DEFAULT NULL,
  `cerated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `irrigation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint UNSIGNED NOT NULL,
  `province_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_en`, `province_np`, `created_at`, `updated_at`) VALUES
(1, 'Province 1', 'प्रदेश १', NULL, NULL),
(2, 'Province 2', 'प्रदेश २', NULL, NULL),
(3, 'Bagmati', 'बागमती प्रदेश', NULL, NULL),
(4, 'Gandaki', 'गण्डकी प्रदेश', NULL, NULL),
(5, 'Lumbini', 'लुम्बिनी प्रदेश', NULL, NULL),
(6, 'Karnali', 'कर्णाली प्रदेश', NULL, NULL),
(7, 'Sudurpaschim', 'सुदूरपश्चिम प्रदेश', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raw_material_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `supplier_id` bigint UNSIGNED DEFAULT NULL,
  `stock_quantity` int DEFAULT NULL,
  `unit_price` decimal(8,2) DEFAULT NULL,
  `expiry_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reorder_level` int DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_raw_materials` bigint DEFAULT NULL,
  `total_cost` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `name`, `raw_material_id`, `description`, `supplier_id`, `stock_quantity`, `unit_price`, `expiry_date`, `reorder_level`, `unit_id`, `udhyog_id`, `created_at`, `updated_at`, `total_raw_materials`, `total_cost`) VALUES
(11, NULL, 6, 'आँप  मसला  आलु  कुहिएको   फुटेको  हराएको  जम्मा संख्या थमन थारु  पेप्सी कोल  कच्चा पदार्थ   मूला  गाँजर', 7, 465, '100.00', '2024-06-07', NULL, 1, NULL, '2024-06-06 23:55:31', '2024-06-07 01:18:01', NULL, NULL),
(12, NULL, 2, 'asasa', 7, 323, '417.00', '2024-06-07', NULL, 1, NULL, '2024-06-07 03:53:02', '2024-06-07 03:53:02', NULL, NULL),
(13, NULL, 4, 'wqwwqqw', 7, 323, '417.00', '2024-06-07', NULL, 1, NULL, '2024-06-07 03:53:33', '2024-06-07 03:53:33', NULL, NULL),
(14, NULL, 3, 'wqw', 7, 4, '144.00', '2024-06-07', NULL, 1, NULL, '2024-06-07 03:54:29', '2024-06-07 03:54:29', NULL, NULL),
(15, NULL, 3, 'wwwwww', 13, 3232, '32232.00', '2024-06-11', NULL, 2, 2, '2024-06-11 00:21:41', '2024-06-11 00:47:10', NULL, NULL),
(16, NULL, 2, 'eeeee', 12, 323, '417.00', '33/33', NULL, 1, 2, '2024-06-11 00:26:50', '2024-06-11 00:26:50', NULL, NULL),
(18, NULL, 12, 'eeeee', 14, 323, '417.00', '22/22', NULL, 1, 3, '2024-06-11 23:21:51', '2024-06-11 23:21:51', NULL, NULL),
(19, NULL, 13, '323232', 14, 323, '417.00', '33/33', NULL, 2, 3, '2024-06-11 23:34:51', '2024-06-11 23:34:51', NULL, NULL),
(20, NULL, 14, '32323', 18, 2, '575.00', '2024-06-12', NULL, 2, 5, '2024-06-12 00:54:41', '2024-06-12 00:55:37', NULL, NULL),
(21, NULL, 12, 'Cum voluptatem dolo', 15, 610, '49.00', '25-Feb-2022', NULL, 2, 3, '2024-06-17 04:38:21', '2024-06-17 04:38:21', NULL, 29890),
(22, NULL, 12, NULL, 14, 462, '512.00', '19-Nov-1981', NULL, 1, 3, '2024-06-17 06:36:56', '2024-06-17 06:36:56', NULL, 236544),
(23, NULL, 13, NULL, 14, 123, '186.00', '19-Nov-1981', NULL, 1, 3, '2024-06-17 06:38:44', '2024-06-17 06:38:44', NULL, 22878),
(24, NULL, 13, NULL, 14, 577, '164.00', '03-Sep-1982', NULL, 1, 3, '2024-06-17 11:04:46', '2024-06-17 11:04:46', NULL, 94628),
(25, NULL, 13, NULL, 14, 615, '746.00', '28-Oct-1996', NULL, 2, 3, '2024-06-17 11:05:26', '2024-06-17 11:05:26', NULL, 458790),
(43, NULL, 7, NULL, 12, NULL, NULL, NULL, NULL, 1, 2, '2024-06-18 06:03:07', '2024-06-18 06:03:07', NULL, 0),
(44, NULL, 7, NULL, 12, 5, '81.00', '25-Jun-1994', NULL, 1, 2, '2024-06-18 06:11:57', '2024-06-18 06:11:57', NULL, 405),
(45, NULL, 8, NULL, NULL, 222, '972.00', NULL, NULL, 1, 2, '2024-06-18 06:14:54', '2024-06-18 06:14:54', NULL, 215784),
(46, NULL, 8, NULL, NULL, 222, '972.00', NULL, NULL, 1, 2, '2024-06-18 06:15:02', '2024-06-18 06:15:02', NULL, 215784),
(47, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2024-06-18 06:33:56', '2024-06-18 06:33:56', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_names`
--

CREATE TABLE `raw_material_names` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raw_material_names`
--

INSERT INTO `raw_material_names` (`id`, `name`, `unit_id`, `udhyog_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 'आँप', 1, NULL, NULL, '2024-06-06 06:13:22', '2024-06-06 06:13:22'),
(3, 'मसला', 1, NULL, NULL, '2024-06-06 06:14:03', '2024-06-06 06:14:03'),
(4, 'आलु', 1, NULL, NULL, '2024-06-06 06:14:12', '2024-06-06 06:14:12'),
(5, 'नुन', 1, NULL, NULL, '2024-06-06 06:14:30', '2024-06-06 06:14:30'),
(6, 'मूला', 1, NULL, NULL, '2024-06-06 23:53:25', '2024-06-06 23:53:25'),
(7, 'आँप', 1, 2, NULL, '2024-06-11 01:28:23', '2024-06-19 23:07:46'),
(8, 'मुला', 1, 2, NULL, '2024-06-11 01:29:41', '2024-06-19 23:08:08'),
(9, 'नुन', 1, 2, NULL, '2024-06-11 01:33:20', '2024-06-19 23:08:24'),
(10, 'तेल', 1, 2, NULL, '2024-06-11 01:33:42', '2024-06-19 23:08:43'),
(11, 'मेथी', 1, 2, NULL, '2024-06-11 01:34:34', '2024-06-19 23:09:04'),
(12, 'samsung 12 alu', 1, 3, NULL, '2024-06-11 23:17:24', '2024-06-11 23:21:12'),
(13, 'spinner', 1, 3, NULL, '2024-06-11 23:20:52', '2024-06-11 23:20:52'),
(14, 'banarase papad', 1, 5, NULL, '2024-06-12 00:53:50', '2024-06-12 00:53:50'),
(15, 'banarase paapd again', 1, 5, NULL, '2024-06-12 00:54:21', '2024-06-12 00:54:21'),
(16, 'लसुन', NULL, 2, NULL, '2024-06-19 23:09:23', '2024-06-19 23:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `ritus`
--

CREATE TABLE `ritus` (
  `id` bigint UNSIGNED NOT NULL,
  `ritu_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ritu_np` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ritus`
--

INSERT INTO `ritus` (`id`, `ritu_en`, `ritu_np`, `created_at`, `updated_at`) VALUES
(1, 'spring season', 'वसन्त ऋतु', NULL, NULL),
(2, 'summer season', 'ग्रीष्म ऋतु', NULL, NULL),
(3, 'rainy season', 'वर्षा ऋतु', NULL, NULL),
(4, 'autumn season', 'शरद ऋतु', NULL, NULL),
(5, 'winter season', 'हेमन्त ऋतु', NULL, NULL),
(6, 'winter season ', 'शिशिर ऋतु ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'editor', 'web', '2024-05-27 03:49:39', '2024-05-27 03:49:39'),
(3, 'user', 'web', '2024-05-27 03:49:39', '2024-05-27 03:49:39'),
(7, 'admin', 'web', '2024-05-29 02:23:27', '2024-05-29 02:23:27'),
(8, 'test teat', 'web', '2024-05-29 03:21:03', '2024-05-29 03:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles_old`
--

CREATE TABLE `roles_old` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 2),
(88, 2),
(89, 2),
(90, 2),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(97, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(103, 2),
(104, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(109, 2),
(110, 2),
(111, 2),
(112, 2),
(113, 2),
(1, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(80, 3),
(81, 3),
(82, 3),
(83, 3),
(84, 3),
(85, 3),
(86, 3),
(87, 3),
(88, 3),
(89, 3),
(90, 3),
(91, 3),
(92, 3),
(93, 3),
(94, 3),
(95, 3),
(96, 3),
(97, 3),
(98, 3),
(99, 3),
(100, 3),
(101, 3),
(102, 3),
(103, 3),
(104, 3),
(105, 3),
(106, 3),
(107, 3),
(108, 3),
(109, 3),
(110, 3),
(111, 3),
(112, 3),
(113, 3),
(1, 7),
(4, 7),
(5, 7),
(6, 7),
(7, 7),
(8, 7),
(9, 7),
(10, 7),
(11, 7),
(12, 7),
(13, 7),
(14, 7),
(15, 7),
(16, 7),
(17, 7),
(18, 7),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(24, 7),
(25, 7),
(26, 7),
(27, 7),
(28, 7),
(29, 7),
(30, 7),
(31, 7),
(32, 7),
(33, 7),
(34, 7),
(35, 7),
(36, 7),
(37, 7),
(38, 7),
(39, 7),
(40, 7),
(41, 7),
(42, 7),
(43, 7),
(44, 7),
(45, 7),
(46, 7),
(47, 7),
(48, 7),
(49, 7),
(50, 7),
(51, 7),
(52, 7),
(53, 7),
(54, 7),
(55, 7),
(56, 7),
(57, 7),
(58, 7),
(59, 7),
(60, 7),
(61, 7),
(62, 7),
(63, 7),
(64, 7),
(65, 7),
(66, 7),
(67, 7),
(68, 7),
(69, 7),
(70, 7),
(71, 7),
(72, 7),
(73, 7),
(74, 7),
(75, 7),
(76, 7),
(77, 7),
(78, 7),
(79, 7),
(80, 7),
(81, 7),
(82, 7),
(83, 7),
(84, 7),
(85, 7),
(86, 7),
(87, 7),
(88, 7),
(89, 7),
(90, 7),
(91, 7),
(92, 7),
(93, 7),
(94, 7),
(95, 7),
(96, 7),
(97, 7),
(98, 7),
(99, 7),
(100, 7),
(101, 7),
(102, 7),
(103, 7),
(104, 7),
(105, 7),
(106, 7),
(107, 7),
(108, 7),
(109, 7),
(110, 7),
(111, 7),
(112, 7),
(1, 8),
(7, 8),
(8, 8),
(10, 8),
(58, 8),
(61, 8),
(68, 8),
(71, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `dealer_id` bigint UNSIGNED NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0',
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `dealer_id`, `order_date`, `total_amount`, `order_status`, `payment_status`, `udhyog_id`, `created_at`, `updated_at`) VALUES
(23, 1, '2081-2-28', '12121.00', 0, 0, NULL, '2024-06-09 06:11:00', '2024-06-09 23:27:47'),
(24, 1, '2081-2-27', '12121.00', 0, 0, NULL, '2024-06-09 06:11:58', '2024-06-09 06:11:58'),
(25, 1, '2081-2-27', '222.00', 0, 0, NULL, '2024-06-09 06:12:52', '2024-06-09 06:12:52'),
(28, 1, '01/02/2081', '333.00', 0, 1, NULL, '2024-06-10 05:48:30', '2024-06-10 05:48:30'),
(29, 7, '16/02/2081', '22.00', 0, 0, NULL, '2024-06-12 00:58:35', '2024-06-12 00:58:35'),
(30, 7, '2081-2-30', '22.00', 0, 0, 5, '2024-06-12 01:05:15', '2024-06-12 01:09:33'),
(34, 3, '13/03/2081', '1452.00', 0, 0, 2, '2024-06-18 23:17:31', '2024-06-18 23:17:31'),
(35, 4, '32/03/2081', '726.00', 0, 0, 2, '2024-06-18 23:43:19', '2024-06-18 23:43:19'),
(36, 3, '32/03/2081', '726.00', 0, 0, 2, '2024-06-18 23:44:01', '2024-06-18 23:44:01'),
(37, 3, '25/03/2081', '726.00', 0, 0, 2, '2024-06-19 03:45:10', '2024-06-19 03:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_items`
--

CREATE TABLE `sales_order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `sales_order_id` bigint UNSIGNED NOT NULL,
  `inventory_product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `production_batch_id` bigint UNSIGNED DEFAULT NULL,
  `total_cost` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_order_items`
--

INSERT INTO `sales_order_items` (`id`, `sales_order_id`, `inventory_product_id`, `quantity`, `unit_price`, `is_complete`, `created_at`, `updated_at`, `unit_id`, `production_batch_id`, `total_cost`) VALUES
(5, 24, 6, 22, NULL, 0, '2024-06-09 06:11:58', '2024-06-09 06:11:58', NULL, NULL, NULL),
(6, 25, 6, 22, NULL, 0, '2024-06-09 06:12:52', '2024-06-09 06:12:52', NULL, NULL, NULL),
(7, 25, 5, 22, NULL, 0, '2024-06-09 06:12:52', '2024-06-09 06:12:52', NULL, NULL, NULL),
(8, 25, 7, 22, NULL, 0, '2024-06-09 06:12:52', '2024-06-09 06:12:52', NULL, NULL, NULL),
(23, 23, 7, 22, NULL, 0, '2024-06-09 23:44:16', '2024-06-09 23:44:16', NULL, NULL, NULL),
(27, 28, 6, 32, NULL, 1, '2024-06-10 05:48:30', '2024-06-10 05:48:30', NULL, NULL, NULL),
(28, 29, 12, 32, NULL, 0, '2024-06-12 00:58:35', '2024-06-12 00:58:35', NULL, NULL, NULL),
(29, 30, 12, 22, NULL, 0, '2024-06-12 01:05:15', '2024-06-12 01:05:15', NULL, NULL, NULL),
(31, 34, 9, 22, '33.00', 0, '2024-06-18 23:17:31', '2024-06-18 23:17:31', 1, 53, 726),
(32, 34, 9, 22, '33.00', 0, '2024-06-18 23:17:31', '2024-06-18 23:17:31', 1, 53, 726),
(33, 35, 9, 22, '33.00', 0, '2024-06-18 23:43:19', '2024-06-18 23:43:19', 1, 53, 726),
(34, 36, 9, 22, '33.00', 0, '2024-06-18 23:44:01', '2024-06-18 23:44:01', 1, 50, 726),
(35, 37, 9, 22, '33.00', 0, '2024-06-19 03:45:10', '2024-06-19 03:45:10', 1, 54, 726);

-- --------------------------------------------------------

--
-- Table structure for table `sangrachanas`
--

CREATE TABLE `sangrachanas` (
  `id` bigint UNSIGNED NOT NULL,
  `types` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `made_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_makeup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `use_of` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sangrachanas`
--

INSERT INTO `sangrachanas` (`id`, `types`, `bottom`, `length`, `width`, `area`, `made_date`, `type_of_makeup`, `use_of`, `user`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Voluptas est aperiam', 'Laboris natus consec', 'Enim sed voluptas to', 'Est ut dolor aspern', 'Qui ullam ea digniss', '12-Jun-1977', 'Ducimus consectetur', 'Eos cillum vitae mo', 'Quis distinctio Sae', 'Ipsum excepturi vol', '0', '2024-05-27 05:26:36', '2024-05-27 05:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Roary Howard', '2081-3-1', '2081-3-1', '2024-06-14 02:25:49', '2024-06-14 02:25:49'),
(3, 'Daryl Ford', '2081-3-1', '2081-3-1', '2024-06-14 02:32:46', '2024-06-14 02:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

CREATE TABLE `seeds` (
  `id` bigint UNSIGNED NOT NULL,
  `seed_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` float DEFAULT NULL,
  `unit` bigint UNSIGNED DEFAULT NULL,
  `seed_type_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seeds`
--

INSERT INTO `seeds` (`id`, `seed_name`, `cost`, `unit`, `seed_type_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Buckminster Finley test', 22, 2, 2, 'Do ut praesentium qu', 1, '2024-06-13 05:30:53', '2024-06-13 05:44:05'),
(2, 'Buckminster Finley', 22, 2, 1, NULL, 1, '2024-06-13 06:28:30', '2024-06-13 06:28:30'),
(3, 'Guy Melton', 124, 2, 1, 'ewrwerqr', 1, '2024-06-13 23:09:39', '2024-06-13 23:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `seed_batches`
--

CREATE TABLE `seed_batches` (
  `id` bigint UNSIGNED NOT NULL,
  `batch_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seed_id` bigint UNSIGNED DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `quantity_produced` int NOT NULL,
  `manufacturing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season_id` bigint UNSIGNED DEFAULT NULL,
  `land_area` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seed_batches`
--

INSERT INTO `seed_batches` (`id`, `batch_no`, `seed_id`, `unit_id`, `quantity_produced`, `manufacturing_date`, `expiry_date`, `season_id`, `land_area`, `created_at`, `updated_at`) VALUES
(2, NULL, 1, 1, 118, '2081-3-1', '2081-3-1', 1, 'Exercitation esse fu', '2024-06-14 03:41:02', '2024-06-14 03:41:02'),
(11, NULL, 1, 2, 436, '2081-3-2', '2081-3-2', 1, 'Accusantium corrupti', '2024-06-14 05:24:30', '2024-06-15 10:29:51'),
(15, NULL, 1, 2, 434, '2081-3-4', '2081-3-4', 1, 'Nemo id ut voluptate', '2024-06-16 22:50:09', '2024-06-16 22:50:09'),
(16, NULL, 1, 2, 152, '2081-3-4', '2081-3-4', 3, 'Dolor eum magnam est', '2024-06-16 22:52:28', '2024-06-16 22:52:28'),
(17, NULL, 2, 2, 567, '2081-3-4', '2081-3-4', 3, 'Sed laborum dolore c', '2024-06-16 22:57:24', '2024-06-16 22:57:24'),
(18, 'Corrupti hic offici', 3, 2, 536, '2081-3-4', '2081-3-4', 1, 'Dolorem omnis ex sim', '2024-06-16 23:36:07', '2024-06-16 23:36:07'),
(19, 'Suscipit aut asperio', 3, 2, 921, '2081-3-4', '2081-3-4', 1, 'Voluptas ipsum adipi', '2024-06-17 00:37:42', '2024-06-17 00:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `seed_batch_productions`
--

CREATE TABLE `seed_batch_productions` (
  `id` bigint UNSIGNED NOT NULL,
  `seed_id` bigint UNSIGNED DEFAULT NULL,
  `seed_batch_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seed_batch_productions`
--

INSERT INTO `seed_batch_productions` (`id`, `seed_id`, `seed_batch_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 253, '2024-06-14 03:41:02', '2024-06-14 03:41:02'),
(33, 3, 11, 57, '2024-06-14 05:24:30', '2024-06-14 05:24:30'),
(35, 2, 11, 12, '2024-06-15 10:29:51', '2024-06-15 10:29:51'),
(36, 1, 11, 12, '2024-06-15 10:29:51', '2024-06-15 10:29:51'),
(40, 1, 15, 395, '2024-06-16 22:50:09', '2024-06-16 22:50:09'),
(41, 2, 16, 289, '2024-06-16 22:52:28', '2024-06-16 22:52:28'),
(42, 3, 17, 461, '2024-06-16 22:57:24', '2024-06-16 22:57:24'),
(43, 1, 18, 593, '2024-06-16 23:36:07', '2024-06-16 23:36:07'),
(44, 2, 19, 485, '2024-06-17 00:37:42', '2024-06-17 00:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `seed_types`
--

CREATE TABLE `seed_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seed_types`
--

INSERT INTO `seed_types` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'la update gareko xu', 'description', 1, '2024-06-13 04:38:36', '2024-06-13 05:02:50'),
(2, 'Lionel Boyd', 'Inventore in a volup', 1, '2024-06-13 04:58:17', '2024-06-13 04:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_first_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_second_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci,
  `map` text COLLATE utf8mb4_unicode_ci,
  `site_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `contact_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_visit` int DEFAULT NULL,
  `social_profile_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_email`, `site_phone`, `site_mobile`, `site_first_address`, `site_second_address`, `site_description`, `map`, `site_url`, `meta_keyword`, `contact_title`, `contact_sub_title`, `contact_address_1`, `contact_address_2`, `contact_phone`, `contact_fax`, `contact_mobile`, `contact_email`, `contact_url`, `logo`, `no_of_visit`, `social_profile_fb`, `social_profile_twitter`, `social_profile_insta`, `social_profile_youtube`, `social_profile_linkedin`, `created_at`, `updated_at`) VALUES
(1, 'किसान सूचीकरण तथा व्यवस्थापन प्रणाली', 'thaman@softechfoundation.com', '9742867915', '9814618803', 'Kathmandu', 'Mid Baneshor KTM', 'Softech Content Management System ', NULL, 'http://127.0.0.1:8000/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state_months`
--

CREATE TABLE `state_months` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_info` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactor_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactor_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact_info`, `address`, `email`, `phone`, `contactor_name`, `contactor_phone`, `udhyog_id`, `created_at`, `updated_at`) VALUES
(7, 'थमन थारु', NULL, 'पेप्सी कोल', 'thaman@softechfoundationgmail.com', '981418803', 'ewew', 'ewewe', NULL, '2024-06-06 23:42:57', '2024-06-07 06:44:09'),
(8, 'la update gareko xu', NULL, 'manhdtr', 'admin1@gmail.com', '9849649679', NULL, 'ewewe', NULL, '2024-06-07 06:30:13', '2024-06-07 06:42:01'),
(9, 'Dominic Knowles', NULL, 'Irure facere et cons', 'halovuqah@mailinator.com', '+1 (943) 657-2929', NULL, '+1 (335) 731-3929', NULL, '2024-06-07 06:44:21', '2024-06-07 06:44:21'),
(11, 'achar supplier', NULL, 'manhdtr', 'adminee1@gmail.com', '9849649679', NULL, 'ewewe', NULL, '2024-06-10 23:13:29', '2024-06-10 23:13:29'),
(12, 'राम सीता सप्लैर', NULL, 'नुवाकोट नेपाल', 'ramsupplier@gmail.com', '9849649679', 'राम लामा', 'लामा', 2, '2024-06-10 23:14:14', '2024-06-19 23:02:26'),
(13, 'सीता सप्लैर', NULL, 'पेप्सी कोल', 'sitasupplier@gmail.com', '9849649679', 'सीता बुढाथोकी', 'बुढाथोकी', 2, '2024-06-10 23:46:20', '2024-06-19 23:05:26'),
(14, 'la update gareko xu', NULL, 'पेप्सी कोल', 'aluchips@gmail.com', '9849649679', NULL, 'ewewe', 3, '2024-06-11 22:52:07', '2024-06-11 22:52:07'),
(15, 'aluchips update', NULL, 'पेप्सी कोल', 'aeeqewdmin@gmail.com', '88888888888', 'Leah Conner', '+1 (335) 731-3929', 3, '2024-06-11 22:59:15', '2024-06-11 23:02:53'),
(18, 'banarase papad', NULL, 'पेप्सी कोल', 'papad@gmail.com', '9849649679', 'ewew', '+1 (335) 731-3929', 5, '2024-06-12 00:52:49', '2024-06-12 00:53:07'),
(19, 'नमुना सप्लैर', NULL, 'बिराट नगर', 'namunasupplier@gmailinator.com', '9999999999', 'नमुना अधिकारी', '9999999999', 2, '2024-06-17 00:58:28', '2024-06-19 23:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `talims`
--

CREATE TABLE `talims` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `trainer` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talims`
--

INSERT INTO `talims` (`id`, `title`, `duration`, `total_cost`, `start_date`, `end_date`, `description`, `trainer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Veniam qui saepe Na', 'Esse vitae possimus', 'In qui voluptas dolo', '2081-02-25', '2081-02-25', '<p>daada</p>', '[[\"Barclay Richards\",\"Quia sapiente ut dol\",\"Voluptatibus aut min\",\"+1 (645) 973-5709\",\"vazepomun@mailinator.com\",\"Fisher and Maddox Inc\"],[\"Audrey Hayden\",\"Delectus sapiente s\",\"Cumque officia volup\",\"+1 (412) 912-4774\",\"biba@mailinator.com\",\"Holmes Dorsey Plc\"]]', '1', '2024-06-07 03:17:39', '2024-06-13 00:40:28'),
(2, 'Totam ratione omnis', 'Irure aliquip deseru', 'Laborum in sunt aut', NULL, NULL, NULL, '[[\"Lester Hess\",\"Voluptatem id est o\",\"Mollit asperiores un\",\"+1 (317) 852-9308\",\"valuv@mailinator.com\",\"jeno@mailinator.com\"]]', '1', '2024-06-12 23:23:48', '2024-06-12 23:23:48'),
(3, 'Quod adipisci evenie', 'A ex error quasi est', 'Placeat voluptas ve', NULL, NULL, NULL, '[[\"Daquan Sanders\",\"Quidem et animi cil\",\"Distinctio Commodi\",\"+1 (205) 881-5352\",\"befenarid@mailinator.com\",\"vuke@mailinator.com\"]]', '0', '2024-06-12 23:24:54', '2024-06-12 23:24:54'),
(4, 'Dolores eiusmod proi', 'Consectetur velit n', 'Hic qui est qui et s', NULL, NULL, NULL, '[[\"Giselle Boyer\",\"Est elit in qui per\",\"Rerum quam deserunt\",\"+1 (624) 227-2703\",\"magucito@mailinator.com\",\"viwetac@mailinator.com\"]]', '0', '2024-06-12 23:25:25', '2024-06-12 23:25:25'),
(5, 'Dolores eiusmod proi', 'Consectetur velit n', 'Hic qui est qui et s', NULL, NULL, NULL, '[[\"Giselle Boyer\",\"Est elit in qui per\",\"Rerum quam deserunt\",\"+1 (624) 227-2703\",\"magucito@mailinator.com\",\"viwetac@mailinator.com\"]]', '0', '2024-06-12 23:28:10', '2024-06-12 23:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `training_people`
--

CREATE TABLE `training_people` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_people`
--

INSERT INTO `training_people` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'rerewwefewre', 'eeeeeeeee@email.com', '0998765467', 'thegana', '2024-06-12 04:04:49', '2024-06-12 05:41:34'),
(3, 'Madeson Richards', 'gikiwoxyru@mailinator.com', '+1 (978) 816-5754', 'tgeefff', '2024-06-12 04:27:05', '2024-06-12 05:41:44'),
(4, 'Mara Harrington', 'pedaguxacu@mailinator.com', '+1 (813) 194-5972', 'Et accusamus illo ve', '2024-06-12 04:32:11', '2024-06-12 04:32:11'),
(5, 'India Greene', 'rowexotys@mailinator.com', '+1 (577) 577-3004', 'Id recusandae Alias', '2024-06-12 04:32:11', '2024-06-12 04:32:11'),
(6, 'Xenos Juarez', 'faco@mailinator.com', '+1 (221) 142-6487', 'Libero nobis et nece', '2024-06-12 04:34:42', '2024-06-12 04:34:42'),
(7, 'Miriam Powell', 'jaca@mailinator.com', '+1 (717) 407-8236', 'Distinctio Aperiam', '2024-06-12 04:34:42', '2024-06-12 04:34:42'),
(8, 'Zeph Avery', 'xowa@mailinator.com', '+1 (805) 968-7416', 'Quo nostrud atque fu', '2024-06-12 04:34:42', '2024-06-12 04:34:42'),
(9, 'Mannix Knapp', 'tacy@mailinator.com', '+1 (414) 621-2027', 'Assumenda eu dolores', '2024-06-12 04:34:42', '2024-06-12 04:34:42'),
(10, 'Angelica Washington', 'mycimahon@mailinator.com', '+1 (581) 239-2563', 'Laboriosam ex nisi', '2024-06-12 23:35:40', '2024-06-12 23:35:40'),
(11, 'John Jennings', 'qorixizofe@mailinator.com', '+1 (408) 233-9971', 'Corrupti sit aut v', '2024-06-12 23:35:40', '2024-06-12 23:35:40'),
(12, 'Timon Burnett', 'xylydamuli@mailinator.com', '+1 (645) 752-9679', 'Tempora quaerat sequ', '2024-06-12 23:35:40', '2024-06-12 23:35:40'),
(13, 'Lani Huff', 'rozygirore@mailinator.com', '+1 (749) 633-5676', 'Quam aliquam beatae', '2024-06-12 23:35:40', '2024-06-12 23:35:40'),
(19, 'Silas Wilder', 'rokynum@mailinator.com', '+1 (336) 511-8995', 'Facere cumque volupt', '2024-06-13 02:09:42', '2024-06-13 02:09:42'),
(20, 'Savannah Jimenez', 'fywopus@mailinator.com', '+1 (856) 365-3256', 'Maiores perferendis', '2024-06-13 02:12:03', '2024-06-13 02:12:03'),
(21, 'Christen Villarreal', 'recev@mailinator.com', '+1 (442) 879-9314', 'Iure veniam reprehe', '2024-06-13 02:12:03', '2024-06-13 02:12:03'),
(22, 'Hiram Moran', 'vywybe@mailinator.com', '+1 (131) 861-4838', 'Fugit voluptas lore', '2024-06-13 02:12:03', '2024-06-13 02:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `training_phases`
--

CREATE TABLE `training_phases` (
  `id` bigint UNSIGNED NOT NULL,
  `talim_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_phases`
--

INSERT INTO `training_phases` (`id`, `talim_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, NULL, NULL, NULL, '2024-06-13 00:17:48', '2024-06-13 00:17:48'),
(5, NULL, NULL, NULL, '2024-06-13 00:17:48', '2024-06-13 00:17:48'),
(6, NULL, NULL, NULL, '2024-06-13 00:17:48', '2024-06-13 00:17:48'),
(7, NULL, NULL, NULL, '2024-06-13 00:17:48', '2024-06-13 00:17:48'),
(19, 1, 'Kirestin Black', 'Maiores laboris non', '2024-06-13 00:26:38', '2024-06-13 00:40:28'),
(20, 1, 'Gay Stokes', 'Inventore sapiente i', '2024-06-13 00:26:38', '2024-06-13 00:40:28'),
(21, 1, 'David Buckley', 'Eiusmod non modi mol', '2024-06-13 00:26:38', '2024-06-13 00:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `sales_order_id` bigint UNSIGNED DEFAULT NULL,
  `raw_material_id` bigint UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `remaining` float NOT NULL DEFAULT '0',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sales_order_id`, `raw_material_id`, `amount`, `remaining`, `payment_method`, `transaction_date`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '222222.00', 616400, NULL, NULL, 0, '2024-06-17 11:10:27', '2024-06-17 11:10:27'),
(2, NULL, NULL, '222222.00', 616400, NULL, NULL, 0, '2024-06-17 11:10:27', '2024-06-17 11:10:27'),
(3, NULL, NULL, '2222.00', 47234, NULL, NULL, 1, '2024-06-17 23:08:34', '2024-06-17 23:08:34'),
(4, NULL, NULL, '222222.00', 628674, NULL, NULL, 1, '2024-06-17 23:13:32', '2024-06-17 23:13:32'),
(5, NULL, NULL, '2222.00', 309378, NULL, NULL, 1, '2024-06-17 23:14:01', '2024-06-17 23:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `udhyogs`
--

CREATE TABLE `udhyogs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `udhyogs`
--

INSERT INTO `udhyogs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Achar', '1', '2024-05-31 09:49:52', '2024-05-31 09:49:52'),
(3, 'Alu Chips', '1', '2024-05-31 09:49:52', '2024-05-31 09:49:52'),
(4, 'Dudh', '1', '2024-05-31 09:51:07', '2024-05-31 09:51:07'),
(5, 'Papad', '1', '2024-05-31 09:51:07', '2024-05-31 09:51:07'),
(6, 'Hybrid Biu', '1', '2024-05-31 09:52:05', '2024-05-31 09:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `udhyog_achars`
--

CREATE TABLE `udhyog_achars` (
  `id` bigint UNSIGNED NOT NULL,
  `land_category` bigint UNSIGNED NOT NULL,
  `irrigation_category` bigint UNSIGNED NOT NULL,
  `fuel_category` bigint UNSIGNED NOT NULL,
  `equipment_category` bigint UNSIGNED NOT NULL,
  `store_category` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `udhyog_achars`
--

INSERT INTO `udhyog_achars` (`id`, `land_category`, `irrigation_category`, `fuel_category`, `equipment_category`, `store_category`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, 2, 2, '2024-05-28 04:06:55', '2024-05-28 04:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'kg', 'kg', '2024-05-27 05:27:05', '2024-06-06 22:54:11'),
(2, 'pc', 'pc', '2024-06-06 22:54:38', '2024-06-06 22:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_super` tinyint(1) DEFAULT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `forgotten_password_time` int DEFAULT NULL,
  `role` enum('superadmin','admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `username`, `mobile`, `role_super`, `role_id`, `forgotten_password_time`, `role`, `status`, `remember_token`, `created_at`, `updated_at`, `last_seen`, `last_login_at`, `last_login_ip`, `deleted_at`, `udhyog_id`) VALUES
(1, '11113321', 'Thaman Tharu', 'superadmin@gmail.com', NULL, '2024-05-26 23:47:55', '$2y$10$IFfdpxyZH1120/75t5M6JenN3KeXRFMF9fLo/repLDCGB9ylQXzmW', NULL, NULL, NULL, 'Thaman Tharu', NULL, 1, NULL, NULL, 'admin', 1, 'ImMitjdWLrIntrrX6IxHqH3ZS5HLXz3HYsAOSPBCfTq5cP26MBMkT8ZKVWhg', '2024-05-26 23:47:55', '2024-06-19 23:47:23', '2024-06-19 23:47:23', '2024-06-20 04:38:09', '::1', NULL, NULL),
(2, '11113322', 'User One', 'user@gmail.com', NULL, '2024-05-26 23:47:55', '$2y$10$VsslEgduTf.3Y2GO78igqO4D3a90X6gSGXEgHz79xc9OT3ATsrMly', NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, 'user', 1, NULL, '2024-05-26 23:47:55', '2024-05-26 23:47:55', NULL, NULL, NULL, NULL, NULL),
(4, '27081207', 'la update gareko xu', 'admin1@gmail.com', NULL, NULL, '$2y$10$CUOQIRYYwhp2cBVKEorwV.vw2XhIrBoYB4P8nC0tDhqEPGEuUa1WK', NULL, NULL, NULL, 'superadmin', '43434', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-27 02:27:07', '2024-05-27 02:27:14', NULL, NULL, NULL, '2024-05-27 02:27:14', NULL),
(5, '27091031', 'test role update', 'testemail@gmail.com', NULL, NULL, '$2y$10$DowliKiVJceexgZ2XQ8A6.Dv9OOOoYJGpCZlYmuXkMtBV7or/a1GK', NULL, NULL, NULL, 'profile name', '9899890', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-27 03:25:31', '2024-05-27 04:28:19', NULL, NULL, NULL, '2024-05-27 04:28:19', NULL),
(7, '27100910', 'test role', '879787885ww@gmail.com', NULL, NULL, '$2y$10$nJJmGTQpXwtu06UEB9GzEuaSIX1G8xCmLJRhpaczNTC7vdH0dfJOa', NULL, NULL, NULL, 'test rolw', '9787985885', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-27 04:24:10', '2024-05-27 04:28:15', NULL, NULL, NULL, '2024-05-27 04:28:15', NULL),
(8, '27101016', 'test role', '879787885ww@gmail.com', NULL, NULL, '$2y$10$nlgXJNmjQWTw9DVbx368qeZHHQjNhI4E6n/v5Ucn45RwDGgLjYwgG', NULL, NULL, NULL, 'test rolw', '9787985885', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-27 04:25:16', '2024-05-27 04:28:11', NULL, NULL, NULL, '2024-05-27 04:28:11', NULL),
(9, '27101351', 'test role', 'testrole@gmail.com', NULL, NULL, '$2y$10$0FwQ7FHb/ryWnvdaEFnsbuZIqmfSu7.ZlIMqDX0cBB7sT1pODhV92', NULL, NULL, NULL, 'test role', '97879686978', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-27 04:28:51', '2024-06-19 06:39:20', '2024-06-19 06:39:20', '2024-06-19 10:50:07', '::1', '2024-05-27 04:31:17', 3),
(10, '27101648', 'test role', 'r8676@gmail.com', NULL, NULL, '$2y$10$x4C5nUsoCTADmg68KLb3audOlMAj6ESkCXkQV1ihH.ZH2tRD1QW6e', NULL, NULL, NULL, 'test role', '08907098', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-27 04:31:48', '2024-05-27 04:33:23', NULL, NULL, NULL, '2024-05-27 04:33:23', NULL),
(11, '27101709', 'Jaquelyn Kelley', 'tizi@mailinator.com', '/upload_file/user_profile/1717062311_2029298306_Screenshot from 2024-05-26 10-26-31.png', NULL, '$2y$10$B6Aai2Z7GjgSKO9ZAJWD9ON9MFXvlIVJqCUI7tyMjvC72lKOU4zMy', NULL, NULL, NULL, 'bajebocyfa', 'In fugit laborum E', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-27 04:32:09', '2024-05-30 04:00:35', NULL, NULL, NULL, '2024-05-30 04:00:35', NULL),
(12, '27101746', 'samsung 12', 'admin1@gmail.com', NULL, NULL, '$2y$10$2gUC6CmchhB.8MPcUIzOk.wLkP/RE2PDefQ8ObPiBEcyb.NwbhaRq', NULL, NULL, NULL, 'superadmin', 'tryetyrter', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-27 04:32:46', '2024-05-27 04:33:17', NULL, NULL, NULL, '2024-05-27 04:33:17', NULL),
(13, '27101807', 'Winter Wong test', 'lugu@mailinator.com', NULL, NULL, '$2y$10$xtlppe9N7Ij6yt9mEzNduOeWOTvO35p5WhCS0rvgaJNRYE8psYOCW', NULL, NULL, NULL, 'guhek', 'Esse iste non occae', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-27 04:33:07', '2024-05-30 00:25:44', NULL, NULL, NULL, '2024-05-30 00:25:44', NULL),
(14, '28114534', 'Vladimir Alvarado', 'rupis@mailinator.com', '0', NULL, '$2y$10$/3Xas9zxHTkdfl0q0.0kFubS7NPjXfEgK4TknzfqIEqjwqdWacsOG', NULL, NULL, NULL, 'sinupupa', 'In quaerat pariatur', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-28 06:00:34', '2024-05-30 00:25:40', NULL, NULL, NULL, '2024-05-30 00:25:40', NULL),
(15, '28115435', 'Imogene Coleman', 'kujuv@mailinator.com', '/upload_file/user_profile/1716898602_241996656_Screenshot from 2024-05-26 10-26-31.png', NULL, '$2y$10$g93jgyyd2GEpe38zh4Pc9Odg5BztSJej8E.x8nm8BT3H8ydgz513u', NULL, NULL, NULL, 'nyhijyj', 'Quis nulla est sunt', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-28 06:09:36', '2024-05-30 00:25:36', NULL, NULL, NULL, '2024-05-30 00:25:36', NULL),
(16, '28121928', 'Heather Whitehead', 'wifup@mailinator.com', '/upload_file/user_profile/1716997063_531011193_handywheel.jpg', NULL, '$2y$10$mD.HSvFkiFl6KlKElgKeA.HqrXoxEKkCbRSWGyeiDHaeTTB.La.Zy', NULL, NULL, NULL, 'moxygub', 'Libero velit tenetu', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-28 06:34:29', '2024-05-30 00:25:34', NULL, NULL, NULL, '2024-05-30 00:25:34', NULL),
(18, '29154035', 'Genevieve Berry', 'vavywyni@mailinator.com', NULL, NULL, '$2y$10$DjIjW5srk//C9PeRhz/louYa0mVAWZ9lLG0UuRaRY/sSyaV3nvjPe', NULL, NULL, NULL, 'nituw', 'Nostrud deserunt Nam', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-29 09:55:35', '2024-05-29 10:10:44', NULL, NULL, NULL, '2024-05-29 10:10:44', NULL),
(19, '29154321', 'Judah Mendez', 'puqo@mailinator.com', NULL, NULL, '$2y$10$UMBhEFYDRsC8X1WxfSuuie6lFW2CdCfOiVH.ltqd8xgqBvq4UdDLu', NULL, NULL, NULL, 'fizyqevi', 'Et similique volupta', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-29 09:58:21', '2024-05-29 10:10:41', NULL, NULL, NULL, '2024-05-29 10:10:41', NULL),
(20, '29155311', 'Davis Bernard', 'tuwugabe@mailinator.com', NULL, NULL, '$2y$10$M7PzZRyWDNP29bg71Yll3O2av5KI9Mj0s6nVuIyoBwBlg0DO.UouK', NULL, NULL, NULL, 'bybuzonuz', 'Laborum similique re', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-29 10:08:11', '2024-05-29 10:10:38', NULL, NULL, NULL, '2024-05-29 10:10:38', NULL),
(21, '29155413', 'Fallon Hunter', 'fusoc@mailinator.com', NULL, NULL, '$2y$10$xT5wsnfJVmxa8feS.3Ze9.fthqVw4HA6jgsQ7gNNplguOiFa4.Ddy', NULL, NULL, NULL, 'gedijytaw', 'Porro vero ad conseq', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-29 10:09:13', '2024-05-29 10:10:34', NULL, NULL, NULL, '2024-05-29 10:10:34', NULL),
(22, '29155527', 'Fallon Hunter', 'fusoc@mailinator.com', NULL, NULL, '$2y$10$LAjuCBiq62x08XQZsWSG8eWle/wMS3RteAsO15Y47653MOWzXu/Ja', NULL, NULL, NULL, 'gedijytaw', 'Porro vero ad conseq', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-29 10:10:27', '2024-05-29 10:10:50', NULL, NULL, NULL, '2024-05-29 10:10:50', NULL),
(23, '29155601', 'Alfreda Zimmerman', 'biqusyjy@mailinator.com', NULL, NULL, '$2y$10$jUHNZK9GH4ZfpE3ncWarLOPEppYYmijeQiSotIyIOKmFmB8vp3gee', NULL, NULL, NULL, 'cudiryfybi', 'Eaque dolorem sit se', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-29 10:11:01', '2024-05-30 00:25:31', NULL, NULL, NULL, '2024-05-30 00:25:31', NULL),
(24, '29155635', 'Tobias Hughes', 'tatatavu@mailinator.com', '/upload_file/user_profile/1716998507_633448449_handywheel.jpg', NULL, '$2y$10$RuMNq9OmF3uncxTwKEixW.EjJwEJ/wBUtdXwt.isNjGWRD9Hb1Axi', NULL, NULL, NULL, 'koridek', 'Ea voluptas est eli', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-29 10:11:35', '2024-05-30 00:25:28', NULL, NULL, NULL, '2024-05-30 00:25:28', NULL),
(25, '30061131', 'test role', 'test12@gmail.com', NULL, NULL, '$2y$10$0MYsVbbdq5/S9BnUgY8uHeO6SDGVP9yngjWh3ia0T8KjiZfWM.AzS', NULL, NULL, NULL, 'test role', '0098973773', NULL, NULL, NULL, 'user', 1, NULL, '2024-05-30 00:26:31', '2024-05-30 03:46:45', '2024-05-30 00:50:48', '2024-05-30 06:16:57', '::1', '2024-05-30 03:46:45', NULL),
(26, '30061408', 'test role', 'test12@gmail.com', NULL, NULL, '$2y$10$OlNCuwSDg784DwFSQZXFdeA2ZcmUbyJ5FDsYCH4Eyc195UFLAFshS', NULL, NULL, NULL, 'test role', '0098973773', NULL, NULL, NULL, 'superadmin', 1, NULL, '2024-05-30 00:29:08', '2024-05-30 03:46:42', NULL, NULL, NULL, '2024-05-30 03:46:42', NULL),
(27, '30061459', 'test role', 'mangal12@gmail.com', '0', '2024-05-26 23:47:55', '$2y$10$pzp/w8RjpLYRluAIhQWBTOaTOV8iVbQCBAFey25T4h9VNiSjBCQZy', NULL, NULL, NULL, 'test role', '0098973773', 1, NULL, NULL, 'superadmin', 1, NULL, '2024-05-30 00:29:59', '2024-05-30 03:46:39', '2024-05-30 01:06:25', '2024-05-30 06:36:10', '::1', '2024-05-30 03:46:39', NULL),
(28, '30065118', 'magal tamang', 'mangaletamang22@gmail.com', '/upload_file/user_profile/1717061262_776173503_handywheel.jpg', NULL, '$2y$10$nsnbHrQs5CAE8LRdx1NPF.1/aZV0z0Nx2xOIrWM98NbGZQhvZ58AC', NULL, NULL, NULL, 'mangal tamang', '645464454', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-30 01:06:18', '2024-05-30 03:46:37', '2024-05-30 03:34:42', '2024-05-30 08:16:35', '::1', '2024-05-30 03:46:37', NULL),
(29, '30092623', 'la update gareko xu', 'admin1@gmail.com', '0', NULL, '$2y$10$WVpnKgk/q077x1JVupLS2uhhIYheK9UX2CScJznzfE.OTqcBMFdU6', NULL, NULL, NULL, 'superadmin@gmail.com', 'tryetyrter', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-30 03:41:23', '2024-05-30 03:42:15', NULL, NULL, NULL, '2024-05-30 03:42:15', NULL),
(30, '30092906', 'Leroy Suarez', 'wibow@mailinator.com', '0', NULL, '$2y$10$KDLO6NaQc/QKMG/YYRFbputgpDS2vUmwd1I7JIrSWND.xsCjogJYm', NULL, NULL, NULL, 'musojylewa', 'Accusamus ut cum lab', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-30 03:44:06', '2024-05-30 03:46:35', NULL, NULL, NULL, '2024-05-30 03:46:35', NULL),
(31, '30093209', 'Eve Miles', 'xoxave@mailinator.com', NULL, NULL, '$2y$10$Xnwq95488IxlDDMaDzg.B.xv5n/AKITlPY95wmK99NMq2puyM7lym', NULL, NULL, NULL, 'qebugepen', 'Omnis qui est omnis', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-30 03:47:09', '2024-05-30 03:59:57', NULL, NULL, NULL, '2024-05-30 03:59:57', NULL),
(32, '30093352', 'Eve Miles', 'xoxave@mailinator.com', NULL, NULL, '$2y$10$YWEMkt1uWY8gdL8C.fmyz.oJaePD4pw4T//bN8f3L/7BDWEMHvWpC', NULL, NULL, NULL, 'qebugepen', 'Omnis qui est omnis', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-30 03:48:52', '2024-05-30 03:58:25', NULL, NULL, NULL, '2024-05-30 03:58:25', NULL),
(33, '30093428', 'Eve Miles', 'xoxave@mailinator.com', '/upload_file/user_profile/1717061783_1705891572_Screenshot from 2024-05-26 10-26-31.png', NULL, '$2y$10$o/V4juAs5LRRgU0Fxakui.9js7wrb1D/p4PrjHA4/OuDpFXVUN27W', NULL, NULL, NULL, 'qebugepen', 'Omnis qui est omnis', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-30 03:49:28', '2024-05-30 03:58:08', NULL, NULL, NULL, '2024-05-30 03:58:08', NULL),
(34, '30105137', 'test role permission', 'testrolepermission@gmail.com', NULL, NULL, '$2y$10$.u4b1XbzBd.KVsw2K/HffeFpOn34hfVh6/ayBNFNCGYVOhjfE/uhC', NULL, NULL, NULL, 'test role permission', 'tryetyrter', NULL, NULL, NULL, NULL, 1, NULL, '2024-05-30 05:06:37', '2024-05-30 05:07:13', '2024-05-30 05:07:13', '2024-05-30 10:52:13', '::1', NULL, NULL),
(35, '13053416', 'test role test', 'acharudhyog@gmail.com', '/upload_file/user_profile/1718256856_825542239_Screenshot from 2024-05-26 10-26-31.png', NULL, '$2y$10$sNcjqtCdCDWnfwQ9sy6c8eWeOwa/rKkOry6WZvt/zeEsNyAItk/JC', NULL, NULL, NULL, 'test role', '0098973773', NULL, NULL, NULL, NULL, 1, NULL, '2024-06-12 23:49:16', '2024-06-19 22:56:59', '2024-06-19 22:56:59', '2024-06-20 04:39:23', '::1', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint UNSIGNED NOT NULL,
  `bhoucher_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiscal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_cr` decimal(15,2) DEFAULT NULL,
  `voucher_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_dr` decimal(15,2) DEFAULT NULL,
  `lekha_shirshak` bigint UNSIGNED DEFAULT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `bhoucher_no`, `date`, `fiscal`, `voucher_type`, `remarks`, `status`, `created_at`, `updated_at`, `total_cr`, `voucher_name`, `total_dr`, `lekha_shirshak`, `udhyog_id`) VALUES
(33, '1', '2081-2-25', '2', '1', NULL, '1', '2024-06-07 00:31:04', '2024-06-07 00:31:04', '800.00', 'खर्चा', '800.00', 1, NULL),
(35, '35', '2081-2-26', '2', '1', NULL, '1', '2024-06-07 22:40:21', '2024-06-07 22:40:21', '4.00', 'name', '4.00', 1, NULL),
(36, '36', '2081-2-26', '2', '1', NULL, '1', '2024-06-07 22:42:00', '2024-06-07 22:42:00', '4.00', 'name', '4.00', 1, NULL),
(37, '37', '2081-2-26', NULL, NULL, NULL, '1', '2024-06-07 22:43:14', '2024-06-07 22:43:14', '4.00', NULL, '4.00', NULL, NULL),
(38, '38', '2081-2-26', '2', '1', NULL, '1', '2024-06-07 22:51:24', '2024-06-07 22:51:24', '7.00', 'name', '7.00', 1, NULL),
(39, '39', '2081-2-26', NULL, NULL, NULL, '1', '2024-06-07 23:09:28', '2024-06-07 23:09:28', NULL, NULL, NULL, NULL, NULL),
(40, '40', '2081-3-3', '2', '1', NULL, '1', '2024-06-16 00:24:27', '2024-06-16 00:24:27', '4.00', '3', '4.00', 1, NULL),
(41, '41', '2081-3-3', '1', '1', 'Quo velit velit la', '1', '2024-06-16 00:25:08', '2024-06-16 00:25:08', '2.00', '3', '2.00', 7, NULL),
(54, '42', '2081-3-3', '2', '1', NULL, '1', '2024-06-16 00:47:13', '2024-06-16 00:47:13', '2.00', 'name', '2.00', 1, NULL),
(58, '57', '2081-3-3', '2', '1', NULL, '1', '2024-06-16 03:17:27', '2024-06-16 03:17:27', '2.00', 'name', '2.00', 1, 2),
(59, '59', '2081-3-3', '2', '1', NULL, '1', '2024-06-16 03:18:30', '2024-06-16 03:18:30', '2.00', 'name', '2.00', 1, 2),
(61, '60', '2081-3-3', '2', '1', NULL, '1', '2024-06-16 03:21:27', '2024-06-16 03:21:27', '4.00', 'name', '4.00', 1, 2),
(62, '62', '2081-3-3', '2', '1', NULL, '1', '2024-06-16 03:23:06', '2024-06-16 03:23:06', '4.00', 'name', '4.00', 1, 2),
(65, '63', '2081-3-3', '2', '1', NULL, '1', '2024-06-16 04:37:00', '2024-06-16 04:37:00', '2.00', 'Jessica Hardin', '2.00', 1, 3),
(66, '66', '2081-3-3', '1', '1', 'Voluptas est ex saep', '1', '2024-06-16 04:44:35', '2024-06-16 04:44:35', '2.00', 'Isaac Avila', '2.00', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_categories`
--

CREATE TABLE `voucher_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_categories`
--

INSERT INTO `voucher_categories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'खर्चा', '1', '2024-05-30 05:22:34', '2024-06-07 00:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_dr_crs`
--

CREATE TABLE `voucher_dr_crs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` bigint UNSIGNED DEFAULT NULL,
  `voucher_id` bigint UNSIGNED NOT NULL,
  `dr` decimal(15,2) DEFAULT NULL,
  `cr` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_dr_crs`
--

INSERT INTO `voucher_dr_crs` (`id`, `title`, `voucher_id`, `dr`, `cr`, `created_at`, `updated_at`) VALUES
(4, 2, 58, '2.00', '0.00', '2024-06-16 03:17:27', '2024-06-16 03:17:27'),
(5, 1, 58, '0.00', '2.00', '2024-06-16 03:17:27', '2024-06-16 03:17:27'),
(6, 1, 59, '2.00', '0.00', '2024-06-16 03:18:30', '2024-06-16 03:18:30'),
(7, 1, 59, '0.00', '2.00', '2024-06-16 03:18:30', '2024-06-16 03:18:30'),
(11, 1, 61, '2.00', '0.00', '2024-06-16 03:21:27', '2024-06-16 03:21:27'),
(12, 1, 61, '2.00', '0.00', '2024-06-16 03:21:27', '2024-06-16 03:21:27'),
(13, 2, 61, '0.00', '2.00', '2024-06-16 03:21:27', '2024-06-16 03:21:27'),
(14, 1, 62, '2.00', '0.00', '2024-06-16 03:23:06', '2024-06-16 03:23:06'),
(15, 2, 62, '2.00', '0.00', '2024-06-16 03:23:06', '2024-06-16 03:23:06'),
(16, 1, 62, '0.00', '2.00', '2024-06-16 03:23:06', '2024-06-16 03:23:06'),
(17, 1, 62, '0.00', '2.00', '2024-06-16 03:23:06', '2024-06-16 03:23:06'),
(20, 1, 65, '2.00', '0.00', '2024-06-16 04:37:00', '2024-06-16 04:37:00'),
(21, 1, 65, '0.00', '2.00', '2024-06-16 04:37:00', '2024-06-16 04:37:00'),
(22, 1, 66, '2.00', '0.00', '2024-06-16 04:44:35', '2024-06-16 04:44:35'),
(23, 2, 66, '0.00', '2.00', '2024-06-16 04:44:35', '2024-06-16 04:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `worker_lists`
--

CREATE TABLE `worker_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `worker_position_id` bigint UNSIGNED DEFAULT NULL,
  `work_type_id` bigint UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_of_joining` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bhatta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_lists`
--

INSERT INTO `worker_lists` (`id`, `udhyog_id`, `worker_position_id`, `work_type_id`, `full_name`, `mobile`, `gender`, `address`, `day_of_joining`, `salary`, `bhatta`, `image`, `created_at`, `updated_at`) VALUES
(10, 3, 8, NULL, 'aluchips', '1234567802', '1', 'manhdtr', '2081-02-21', '33333', '33333', NULL, '2024-06-03 00:16:44', '2024-06-03 00:16:44'),
(12, 4, NULL, NULL, 'dudh', '0898787868', '1', 'aluchips', '2081-02-21', '33333', '33333', NULL, '2024-06-03 00:58:25', '2024-06-03 00:58:25'),
(13, 6, 11, NULL, 'test teacher', '0987654321', '1', 'manhdtr', '2081-02-08', '33333', '33333', '/upload_file/worker_list/1717400651_488874764_Screenshot from 2024-06-02 12-00-55.png', '2024-06-03 01:59:12', '2024-06-03 01:59:12'),
(14, 2, 15, NULL, 'थमन थारु', '9787985885', '1', 'पेप्सी कोल', '2081-02-25', '20000', '200', '/upload_file/worker_list/1717741882_1021385568_Screenshot from 2024-05-26 10-26-31.png', '2024-06-07 00:46:23', '2024-06-07 00:46:23'),
(15, 2, 16, NULL, 'राम तामाङ्ग', '9802345232', '1', 'पेप्सी कोल', '2081-02-25', '200000', '33333', NULL, '2024-06-07 00:57:22', '2024-06-07 00:57:22'),
(16, 2, 17, NULL, 'श्याम तामांग', '0098973773', '1', 'पेप्सी कोल', '2081-02-25', '300000', '33333', '/upload_file/worker_list/1717742615_1792867222_Screenshot from 2024-05-26 10-26-31.png', '2024-06-07 00:58:36', '2024-06-07 00:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `worker_positions`
--

CREATE TABLE `worker_positions` (
  `id` bigint UNSIGNED NOT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `worker_id` bigint UNSIGNED DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bhatta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_positions`
--

INSERT INTO `worker_positions` (`id`, `udhyog_id`, `worker_id`, `salary`, `position`, `bhatta`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(8, 3, 13, '233', 'test', '233', 1, NULL, '2024-06-03 00:09:06', '2024-06-03 00:09:06'),
(9, 4, 14, '233', 'duth dune', '233', 1, NULL, '2024-06-03 01:00:34', '2024-06-03 01:00:34'),
(10, 5, 15, '233', 'test', '233', 1, NULL, '2024-06-03 01:57:53', '2024-06-03 01:57:53'),
(11, 6, 16, '233', 'test', '233', 1, NULL, '2024-06-03 01:58:36', '2024-06-03 01:58:36'),
(12, NULL, 15, NULL, 'test', NULL, 1, NULL, '2024-06-05 01:10:09', '2024-06-05 01:10:09'),
(13, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-06-05 01:10:09', '2024-06-05 01:10:09'),
(14, NULL, NULL, '333', NULL, NULL, 1, NULL, '2024-06-05 01:10:09', '2024-06-05 01:10:09'),
(15, 2, 18, '300000', 'प्रबन्धक', '2000', 1, NULL, '2024-06-07 00:44:55', '2024-06-07 00:44:55'),
(16, 2, 19, '150', 'कार्यकर्ता', NULL, 1, NULL, '2024-06-07 00:54:49', '2024-06-07 00:54:49'),
(17, 2, 20, '20000', 'कर्मचारी', '2000', 1, NULL, '2024-06-07 00:56:13', '2024-06-07 00:56:13'),
(18, NULL, 20, '233', 'test', '233', 1, NULL, '2024-06-07 04:26:05', '2024-06-07 04:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `worker_types`
--

CREATE TABLE `worker_types` (
  `id` bigint UNSIGNED NOT NULL,
  `udhyog_id` bigint UNSIGNED DEFAULT NULL,
  `types` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_types`
--

INSERT INTO `worker_types` (`id`, `udhyog_id`, `types`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(13, 3, 'आँप केलाउने', 1, NULL, '2024-06-02 23:57:15', '2024-06-07 00:40:13'),
(14, 4, 'dudh types', 1, NULL, '2024-06-03 01:00:09', '2024-06-03 01:00:09'),
(15, 5, 'hybrid biu', 1, NULL, '2024-06-03 01:55:46', '2024-06-03 01:55:46'),
(16, 6, 'test', 1, NULL, '2024-06-03 01:57:42', '2024-06-03 01:57:42'),
(18, 2, 'मासिक', 1, NULL, '2024-06-07 00:40:59', '2024-06-07 00:42:32'),
(19, 2, 'प्रति घण्टा', 1, NULL, '2024-06-07 00:41:28', '2024-06-07 00:44:00'),
(20, 2, 'कर्मचारी', 1, NULL, '2024-06-07 00:55:25', '2024-06-07 00:55:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agricultures`
--
ALTER TABLE `agricultures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agricultures_agricultural_id_foreign` (`agricultural_id`);

--
-- Indexes for table `agriculture_categories`
--
ALTER TABLE `agriculture_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `animal_categories`
--
ALTER TABLE `animal_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_farms`
--
ALTER TABLE `animal_farms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_farms_user_id_foreign` (`user_id`),
  ADD KEY `animal_farms_animan_cat_id_foreign` (`animan_cat_id`),
  ADD KEY `animal_farms_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `anudaan_categories`
--
ALTER TABLE `anudaan_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anudanns`
--
ALTER TABLE `anudanns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beemas`
--
ALTER TABLE `beemas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beema_categories`
--
ALTER TABLE `beema_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_details_billing_id_foreign` (`billing_id`),
  ADD KEY `billing_details_udhyog_id_foreign` (`udhyog_id`),
  ADD KEY `billing_details_product_id_foreign` (`product_id`),
  ADD KEY `billing_details_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `biu_bijans`
--
ALTER TABLE `biu_bijans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_added_by_foreign` (`added_by`);

--
-- Indexes for table `damage_records`
--
ALTER TABLE `damage_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `damage_records_damage_type_id_foreign` (`damage_type_id`),
  ADD KEY `damage_records_damagable_type_damagable_id_index` (`damagable_type`,`damagable_id`),
  ADD KEY `damage_records_ibfk_1` (`production_batch_id`),
  ADD KEY `udhyog_id` (`udhyog_id`);

--
-- Indexes for table `damage_types`
--
ALTER TABLE `damage_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datri_nikais`
--
ALTER TABLE `datri_nikais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dealers_email_unique` (`email`),
  ADD KEY `udhyog_id` (`udhyog_id`);

--
-- Indexes for table `debit_credits`
--
ALTER TABLE `debit_credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `debit_credits_voucher_id_foreign` (`voucher_id`),
  ADD KEY `debit_credits_lekha_sirsak_id_foreign` (`lekha_sirsak_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `expepses`
--
ALTER TABLE `expepses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farms_user_id_foreign` (`user_id`),
  ADD KEY `farms_profile_id_foreign` (`profile_id`),
  ADD KEY `seed_batch_id` (`seed_batch_id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_titles`
--
ALTER TABLE `finance_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiscals`
--
ALTER TABLE `fiscals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_families`
--
ALTER TABLE `general_families`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `general_families_unique_id_unique` (`unique_id`),
  ADD KEY `general_families_user_id_foreign` (`user_id`);

--
-- Indexes for table `general_lands`
--
ALTER TABLE `general_lands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `general_lands_unique_id_unique` (`unique_id`);

--
-- Indexes for table `general_profiles`
--
ALTER TABLE `general_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `general_profiles_unique_id_unique` (`unique_id`),
  ADD KEY `general_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `general_workers`
--
ALTER TABLE `general_workers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_raw_material_id_foreign` (`raw_material_id`);

--
-- Indexes for table `inventory_equipment_categories`
--
ALTER TABLE `inventory_equipment_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_fuel_categories`
--
ALTER TABLE `inventory_fuel_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_irrigation_categories`
--
ALTER TABLE `inventory_irrigation_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_land_categories`
--
ALTER TABLE `inventory_land_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_products`
--
ALTER TABLE `inventory_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_products_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `inventory_store_categories`
--
ALTER TABLE `inventory_store_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyatalika_bibrans`
--
ALTER TABLE `karyatalika_bibrans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyatalika_bibrans_farm_id_foreign` (`farm_id`);

--
-- Indexes for table `land_lists`
--
ALTER TABLE `land_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_lists_land_id_foreign` (`land_id`);

--
-- Indexes for table `lekha_sirsaks`
--
ALTER TABLE `lekha_sirsaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_levels`
--
ALTER TABLE `local_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `local_levels_local_level_id_unique` (`local_level_id`);

--
-- Indexes for table `mal_bibrans`
--
ALTER TABLE `mal_bibrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesinaries`
--
ALTER TABLE `mesinaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `palikas`
--
ALTER TABLE `palikas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `palikas_district_id_foreign` (`district_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permissions_old`
--
ALTER TABLE `permissions_old`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `person_training`
--
ALTER TABLE `person_training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_training_training_person_id_foreign` (`training_person_id`),
  ADD KEY `person_training_talim_id_foreign` (`talim_id`),
  ADD KEY `training_phase_id` (`training_phase_id`);

--
-- Indexes for table `person_training_phase`
--
ALTER TABLE `person_training_phase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `talim_id` (`talim_id`),
  ADD KEY `training_person_id` (`training_person_id`),
  ADD KEY `training_phase_id` (`training_phase_id`);

--
-- Indexes for table `production_batches`
--
ALTER TABLE `production_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_batches_inventory_product_id_foreign` (`inventory_product_id`),
  ADD KEY `udhyog_id` (`udhyog_id`);

--
-- Indexes for table `production_batch_products`
--
ALTER TABLE `production_batch_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_batch_products_production_batch_id_foreign` (`production_batch_id`),
  ADD KEY `production_batch_products_inventory_product_id_foreign` (`inventory_product_id`);

--
-- Indexes for table `production_batch_raw_materials`
--
ALTER TABLE `production_batch_raw_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_batch_raw_materials_production_batch_id_foreign` (`production_batch_id`),
  ADD KEY `production_batch_raw_materials_raw_material_id_foreign` (`raw_material_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `production_batch_worker_lists`
--
ALTER TABLE `production_batch_worker_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_batch_workers_production_batch_id_foreign` (`production_batch_id`),
  ADD KEY `production_batch_workers_worker_list_id_foreign` (`worker_list_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_udhyog_id_foreign` (`udhyog_id`);

--
-- Indexes for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_batch_id` (`production_batch_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raw_materials_supplier_id_foreign` (`supplier_id`),
  ADD KEY `raw_materials_unit_id_foreign` (`unit_id`),
  ADD KEY `raw_material_id` (`raw_material_id`),
  ADD KEY `udhyog_id` (`udhyog_id`);

--
-- Indexes for table `raw_material_names`
--
ALTER TABLE `raw_material_names`
  ADD PRIMARY KEY (`id`),
  ADD KEY `udhyog_id` (`udhyog_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `ritus`
--
ALTER TABLE `ritus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles_old`
--
ALTER TABLE `roles_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_orders_dealer_id_foreign` (`dealer_id`),
  ADD KEY `udhyog_id` (`udhyog_id`);

--
-- Indexes for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_order_items_inventory_product_id_foreign` (`inventory_product_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `sales_order_items_sales_order_id_foreign` (`sales_order_id`),
  ADD KEY `production_batch_id` (`production_batch_id`);

--
-- Indexes for table `sangrachanas`
--
ALTER TABLE `sangrachanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seeds`
--
ALTER TABLE `seeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seeds_seed_type_id_foreign` (`seed_type_id`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `seed_batches`
--
ALTER TABLE `seed_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seed_batches_season_id_foreign` (`season_id`),
  ADD KEY `seed_batches_seed_id_foreign` (`seed_id`),
  ADD KEY `seed_batches_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `seed_batch_productions`
--
ALTER TABLE `seed_batch_productions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seed_batch_productions_seed_id_foreign` (`seed_id`),
  ADD KEY `seed_batch_productions_seed_batch_id_foreign` (`seed_batch_id`);

--
-- Indexes for table `seed_types`
--
ALTER TABLE `seed_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_months`
--
ALTER TABLE `state_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD KEY `udhyog_id` (`udhyog_id`);

--
-- Indexes for table `talims`
--
ALTER TABLE `talims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_people`
--
ALTER TABLE `training_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_phases`
--
ALTER TABLE `training_phases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_phases_talim_id_foreign` (`talim_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_sales_order_id_foreign` (`sales_order_id`),
  ADD KEY `raw_material_id` (`raw_material_id`);

--
-- Indexes for table `udhyogs`
--
ALTER TABLE `udhyogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `udhyog_achars`
--
ALTER TABLE `udhyog_achars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `udhyog_achars_land_category_foreign` (`land_category`),
  ADD KEY `udhyog_achars_irrigation_category_foreign` (`irrigation_category`),
  ADD KEY `udhyog_achars_fuel_category_foreign` (`fuel_category`),
  ADD KEY `udhyog_achars_equipment_category_foreign` (`equipment_category`),
  ADD KEY `udhyog_achars_store_category_foreign` (`store_category`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_unique_id_unique` (`unique_id`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `udhyog_id` (`udhyog_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vouchers_lekha_shirshak_foreign` (`lekha_shirshak`),
  ADD KEY `udhyog_voucher` (`udhyog_id`);

--
-- Indexes for table `voucher_categories`
--
ALTER TABLE `voucher_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_dr_crs`
--
ALTER TABLE `voucher_dr_crs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_dr_crs_voucher_id_foreign` (`voucher_id`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `worker_lists`
--
ALTER TABLE `worker_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_lists_worker_position_id_foreign` (`worker_position_id`),
  ADD KEY `worker_lists_udhyog_id_foreign` (`udhyog_id`),
  ADD KEY `work_type` (`work_type_id`);

--
-- Indexes for table `worker_positions`
--
ALTER TABLE `worker_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_positions_worker_id_foreign` (`worker_id`),
  ADD KEY `worker_positions_udhyog_id_foreign` (`udhyog_id`);

--
-- Indexes for table `worker_types`
--
ALTER TABLE `worker_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_types_udhyog_id_foreign` (`udhyog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agricultures`
--
ALTER TABLE `agricultures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agriculture_categories`
--
ALTER TABLE `agriculture_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animal_categories`
--
ALTER TABLE `animal_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animal_farms`
--
ALTER TABLE `animal_farms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anudaan_categories`
--
ALTER TABLE `anudaan_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anudanns`
--
ALTER TABLE `anudanns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beemas`
--
ALTER TABLE `beemas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beema_categories`
--
ALTER TABLE `beema_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biu_bijans`
--
ALTER TABLE `biu_bijans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `damage_records`
--
ALTER TABLE `damage_records`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `damage_types`
--
ALTER TABLE `damage_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `datri_nikais`
--
ALTER TABLE `datri_nikais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `debit_credits`
--
ALTER TABLE `debit_credits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expepses`
--
ALTER TABLE `expepses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance_titles`
--
ALTER TABLE `finance_titles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fiscals`
--
ALTER TABLE `fiscals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_families`
--
ALTER TABLE `general_families`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `general_lands`
--
ALTER TABLE `general_lands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `general_profiles`
--
ALTER TABLE `general_profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `general_workers`
--
ALTER TABLE `general_workers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory_equipment_categories`
--
ALTER TABLE `inventory_equipment_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_fuel_categories`
--
ALTER TABLE `inventory_fuel_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_irrigation_categories`
--
ALTER TABLE `inventory_irrigation_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_land_categories`
--
ALTER TABLE `inventory_land_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_products`
--
ALTER TABLE `inventory_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inventory_store_categories`
--
ALTER TABLE `inventory_store_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyatalika_bibrans`
--
ALTER TABLE `karyatalika_bibrans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `land_lists`
--
ALTER TABLE `land_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lekha_sirsaks`
--
ALTER TABLE `lekha_sirsaks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `local_levels`
--
ALTER TABLE `local_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mal_bibrans`
--
ALTER TABLE `mal_bibrans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mesinaries`
--
ALTER TABLE `mesinaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `palikas`
--
ALTER TABLE `palikas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `permissions_old`
--
ALTER TABLE `permissions_old`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_training`
--
ALTER TABLE `person_training`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `person_training_phase`
--
ALTER TABLE `person_training_phase`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `production_batches`
--
ALTER TABLE `production_batches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `production_batch_products`
--
ALTER TABLE `production_batch_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `production_batch_raw_materials`
--
ALTER TABLE `production_batch_raw_materials`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `production_batch_worker_lists`
--
ALTER TABLE `production_batch_worker_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_inventories`
--
ALTER TABLE `product_inventories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `raw_material_names`
--
ALTER TABLE `raw_material_names`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ritus`
--
ALTER TABLE `ritus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles_old`
--
ALTER TABLE `roles_old`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sangrachanas`
--
ALTER TABLE `sangrachanas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seeds`
--
ALTER TABLE `seeds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seed_batches`
--
ALTER TABLE `seed_batches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `seed_batch_productions`
--
ALTER TABLE `seed_batch_productions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `seed_types`
--
ALTER TABLE `seed_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_months`
--
ALTER TABLE `state_months`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `talims`
--
ALTER TABLE `talims`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `training_people`
--
ALTER TABLE `training_people`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `training_phases`
--
ALTER TABLE `training_phases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `udhyogs`
--
ALTER TABLE `udhyogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `udhyog_achars`
--
ALTER TABLE `udhyog_achars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `voucher_categories`
--
ALTER TABLE `voucher_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher_dr_crs`
--
ALTER TABLE `voucher_dr_crs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `worker_lists`
--
ALTER TABLE `worker_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `worker_positions`
--
ALTER TABLE `worker_positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `worker_types`
--
ALTER TABLE `worker_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agricultures`
--
ALTER TABLE `agricultures`
  ADD CONSTRAINT `agricultures_agricultural_id_foreign` FOREIGN KEY (`agricultural_id`) REFERENCES `agriculture_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animal_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animal_farms`
--
ALTER TABLE `animal_farms`
  ADD CONSTRAINT `animal_farms_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_farms_animan_cat_id_foreign` FOREIGN KEY (`animan_cat_id`) REFERENCES `animal_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_farms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD CONSTRAINT `billing_details_billing_id_foreign` FOREIGN KEY (`billing_id`) REFERENCES `billings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billing_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billing_details_udhyog_id_foreign` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billing_details_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `damage_records`
--
ALTER TABLE `damage_records`
  ADD CONSTRAINT `damage_records_damage_type_id_foreign` FOREIGN KEY (`damage_type_id`) REFERENCES `damage_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `damage_records_ibfk_1` FOREIGN KEY (`production_batch_id`) REFERENCES `production_batches` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `damage_records_ibfk_2` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `dealers`
--
ALTER TABLE `dealers`
  ADD CONSTRAINT `dealers_ibfk_1` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `debit_credits`
--
ALTER TABLE `debit_credits`
  ADD CONSTRAINT `debit_credits_lekha_sirsak_id_foreign` FOREIGN KEY (`lekha_sirsak_id`) REFERENCES `lekha_sirsaks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `debit_credits_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farms`
--
ALTER TABLE `farms`
  ADD CONSTRAINT `farms_ibfk_1` FOREIGN KEY (`seed_batch_id`) REFERENCES `seed_batches` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `farms_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `general_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `farms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general_families`
--
ALTER TABLE `general_families`
  ADD CONSTRAINT `general_families_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general_profiles`
--
ALTER TABLE `general_profiles`
  ADD CONSTRAINT `general_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_raw_material_id_foreign` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_material_names` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory_products`
--
ALTER TABLE `inventory_products`
  ADD CONSTRAINT `inventory_products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `karyatalika_bibrans`
--
ALTER TABLE `karyatalika_bibrans`
  ADD CONSTRAINT `karyatalika_bibrans_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `land_lists`
--
ALTER TABLE `land_lists`
  ADD CONSTRAINT `land_lists_land_id_foreign` FOREIGN KEY (`land_id`) REFERENCES `general_lands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `palikas`
--
ALTER TABLE `palikas`
  ADD CONSTRAINT `palikas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `person_training`
--
ALTER TABLE `person_training`
  ADD CONSTRAINT `person_training_ibfk_1` FOREIGN KEY (`training_phase_id`) REFERENCES `training_phases` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `person_training_talim_id_foreign` FOREIGN KEY (`talim_id`) REFERENCES `talims` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `person_training_training_person_id_foreign` FOREIGN KEY (`training_person_id`) REFERENCES `training_people` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `person_training_phase`
--
ALTER TABLE `person_training_phase`
  ADD CONSTRAINT `person_training_phase_ibfk_1` FOREIGN KEY (`talim_id`) REFERENCES `talims` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `person_training_phase_ibfk_2` FOREIGN KEY (`training_person_id`) REFERENCES `training_people` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `person_training_phase_ibfk_3` FOREIGN KEY (`training_phase_id`) REFERENCES `training_phases` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `production_batches`
--
ALTER TABLE `production_batches`
  ADD CONSTRAINT `production_batches_ibfk_1` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `production_batches_inventory_product_id_foreign` FOREIGN KEY (`inventory_product_id`) REFERENCES `inventory_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_batch_products`
--
ALTER TABLE `production_batch_products`
  ADD CONSTRAINT `production_batch_products_inventory_product_id_foreign` FOREIGN KEY (`inventory_product_id`) REFERENCES `inventory_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_batch_products_production_batch_id_foreign` FOREIGN KEY (`production_batch_id`) REFERENCES `production_batches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_batch_raw_materials`
--
ALTER TABLE `production_batch_raw_materials`
  ADD CONSTRAINT `production_batch_raw_materials_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_batch_raw_materials_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `production_batch_raw_materials_production_batch_id_foreign` FOREIGN KEY (`production_batch_id`) REFERENCES `production_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_batch_raw_materials_raw_material_id_foreign` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_material_names` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `production_batch_worker_lists`
--
ALTER TABLE `production_batch_worker_lists`
  ADD CONSTRAINT `production_batch_workers_production_batch_id_foreign` FOREIGN KEY (`production_batch_id`) REFERENCES `production_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_batch_workers_worker_list_id_foreign` FOREIGN KEY (`worker_list_id`) REFERENCES `worker_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_udhyog_id_foreign` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD CONSTRAINT `product_inventories_ibfk_1` FOREIGN KEY (`production_batch_id`) REFERENCES `production_batches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_inventories_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `inventory_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD CONSTRAINT `raw_materials_ibfk_1` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_material_names` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `raw_materials_ibfk_2` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `raw_materials_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `raw_materials_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `raw_material_names`
--
ALTER TABLE `raw_material_names`
  ADD CONSTRAINT `raw_material_names_ibfk_1` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `raw_material_names_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD CONSTRAINT `sales_orders_dealer_id_foreign` FOREIGN KEY (`dealer_id`) REFERENCES `dealers` (`id`),
  ADD CONSTRAINT `sales_orders_ibfk_1` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  ADD CONSTRAINT `sales_order_items_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sales_order_items_ibfk_2` FOREIGN KEY (`production_batch_id`) REFERENCES `production_batches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_order_items_inventory_product_id_foreign` FOREIGN KEY (`inventory_product_id`) REFERENCES `inventory_products` (`id`),
  ADD CONSTRAINT `sales_order_items_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seeds`
--
ALTER TABLE `seeds`
  ADD CONSTRAINT `seeds_ibfk_1` FOREIGN KEY (`unit`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `seeds_seed_type_id_foreign` FOREIGN KEY (`seed_type_id`) REFERENCES `seed_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seed_batches`
--
ALTER TABLE `seed_batches`
  ADD CONSTRAINT `seed_batches_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `seed_batches_seed_id_foreign` FOREIGN KEY (`seed_id`) REFERENCES `seeds` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `seed_batches_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `seed_batch_productions`
--
ALTER TABLE `seed_batch_productions`
  ADD CONSTRAINT `seed_batch_productions_seed_batch_id_foreign` FOREIGN KEY (`seed_batch_id`) REFERENCES `seed_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seed_batch_productions_seed_id_foreign` FOREIGN KEY (`seed_id`) REFERENCES `seeds` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `training_phases`
--
ALTER TABLE `training_phases`
  ADD CONSTRAINT `training_phases_talim_id_foreign` FOREIGN KEY (`talim_id`) REFERENCES `talims` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `udhyog_achars`
--
ALTER TABLE `udhyog_achars`
  ADD CONSTRAINT `udhyog_achars_equipment_category_foreign` FOREIGN KEY (`equipment_category`) REFERENCES `inventory_equipment_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `udhyog_achars_fuel_category_foreign` FOREIGN KEY (`fuel_category`) REFERENCES `inventory_fuel_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `udhyog_achars_irrigation_category_foreign` FOREIGN KEY (`irrigation_category`) REFERENCES `inventory_irrigation_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `udhyog_achars_land_category_foreign` FOREIGN KEY (`land_category`) REFERENCES `inventory_land_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `udhyog_achars_store_category_foreign` FOREIGN KEY (`store_category`) REFERENCES `inventory_store_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles_old` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `udhyog_voucher` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `vouchers_lekha_shirshak_foreign` FOREIGN KEY (`lekha_shirshak`) REFERENCES `lekha_sirsaks` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `voucher_dr_crs`
--
ALTER TABLE `voucher_dr_crs`
  ADD CONSTRAINT `voucher_dr_crs_ibfk_1` FOREIGN KEY (`title`) REFERENCES `finance_titles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `voucher_dr_crs_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_lists`
--
ALTER TABLE `worker_lists`
  ADD CONSTRAINT `worker_lists_ibfk_1` FOREIGN KEY (`work_type_id`) REFERENCES `worker_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `worker_lists_udhyog_id_foreign` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`),
  ADD CONSTRAINT `worker_lists_worker_position_id_foreign` FOREIGN KEY (`worker_position_id`) REFERENCES `worker_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_positions`
--
ALTER TABLE `worker_positions`
  ADD CONSTRAINT `worker_positions_udhyog_id_foreign` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`),
  ADD CONSTRAINT `worker_positions_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `worker_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_types`
--
ALTER TABLE `worker_types`
  ADD CONSTRAINT `worker_types_udhyog_id_foreign` FOREIGN KEY (`udhyog_id`) REFERENCES `udhyogs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
