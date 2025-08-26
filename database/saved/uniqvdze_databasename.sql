-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2025 at 12:53 AM
-- Server version: 10.6.22-MariaDB-cll-lve-log
-- PHP Version: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniqvdze_databasename`
--

-- --------------------------------------------------------

--
-- Table structure for table `accademy_events`
--

CREATE TABLE `accademy_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `description` text NOT NULL,
  `banner` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `username` text DEFAULT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `referral_code`, `email`, `password`, `status`, `created_at`, `updated_at`, `name`, `phone`, `profile_photo`, `bank_name`, `account_name`, `account_number`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', '$2y$12$Lhc0MxT7hGnEYKpSOQbvp.O8T2HkmMhk0uYKZ9q32BU5DgwU2zBH.', NULL, '2025-08-20 21:30:00', '2025-08-21 01:30:00', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Adejare Michael', 'F85QOQ6E', 'michael@uniqueradiancerealtorsgroup.com', '$2y$12$Ww4r1X3TpJ3bQ3k2RVQRZO19WBTFaeMw7NiQqARkSprEi.BBsXuJS', '1', '2025-08-21 18:58:28', '2025-08-21 01:32:42', 'Micheal', NULL, NULL, NULL, NULL, NULL),
(3, 'Babalola Peter', 'NKIQSPFF', 'peter@uniqueradiancerealtorsgroup.com', '$2y$12$9q2dyS9V9hZxjFh2g9rOUelmY5y4esc1/Z4Qr9eesYp049uNyLugy', '1', '2025-08-21 18:58:58', '2025-08-21 01:44:30', 'Peter', NULL, NULL, NULL, NULL, NULL),
(4, 'Adega Adeleye', 'NKIQSPFF', 'ade@uniqueradiancerealtorsgroup.com', '$2y$12$aUOiRayshFE0o7dsaqz1qOI.rYRP/z.bqCcKJ1jWHf5a6oYUPzveC', '1', '2025-08-21 18:58:14', '2025-08-21 01:45:12', 'Ade', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1751880175),
('5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1751880175;', 1751880175),
('896e2c9759340deb4db245baa1167ccd24847455', 'i:1;', 1756071388),
('896e2c9759340deb4db245baa1167ccd24847455:timer', 'i:1756071388;', 1756071388),
('932e8b86521ff5418444c07f6462b8a4909b9aae', 'i:1;', 1756074423),
('932e8b86521ff5418444c07f6462b8a4909b9aae:timer', 'i:1756074423;', 1756074423),
('99d03ce6afff4f50b34fb60f0eda0c355ba5c9b9', 'i:1;', 1751966627),
('99d03ce6afff4f50b34fb60f0eda0c355ba5c9b9:timer', 'i:1751966627;', 1751966627),
('a3e5c433e294bf282f625ed04589c8cd6345f7f4', 'i:1;', 1755013014),
('a3e5c433e294bf282f625ed04589c8cd6345f7f4:timer', 'i:1755013014;', 1755013014),
('a8e447c068bbc3a5a9cbb1aa7c3f07cdc6633f58', 'i:1;', 1755091648),
('a8e447c068bbc3a5a9cbb1aa7c3f07cdc6633f58:timer', 'i:1755091648;', 1755091648),
('cb619cc5bde016851bbc69a55ad09c80cf45124c', 'i:1;', 1755091669),
('cb619cc5bde016851bbc69a55ad09c80cf45124c:timer', 'i:1755091669;', 1755091669),
('ea02785657a25b4a42fe0bd88d449915098ac002', 'i:1;', 1755089515),
('ea02785657a25b4a42fe0bd88d449915098ac002:timer', 'i:1755089515;', 1755089515),
('f679a93a5bf3ef990565b47b578d86d5ce4df80c', 'i:1;', 1753539241),
('f679a93a5bf3ef990565b47b578d86d5ce4df80c:timer', 'i:1753539241;', 1753539241);

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
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `referral_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Damilola Daniel', NULL, 'odd.cr8tives@gmail.com', 'Seeking Partnership', 'Test', '2025-08-21 02:43:00', '2025-08-21 02:43:00'),
(2, 'Marilynn Rutt', NULL, 'rutt.marilynn74@googlemail.com', 'Reliable SEO Services to Super Power Your SEO Ranking - on SeoBests.com', 'Hello from SeoBests,\r\n\r\nBoost your website’s SEO standings, expand your online exposure and build powerful backlinks!\r\nOrder the leading SEO services all on one platform - SeoBests.com\r\n\r\nExplore current SEO sales:\r\n50% SALE - Monthly SEO Backlinks + Get 5000 Backlinks FOR FREE:\r\n\r\nhttps://tiny.cc/SeoBests-Deals\r\n\r\nWe offer a lot of SEO services, 100+ offers online, and premium specialists:\r\n+ Elite Backlinks\r\n+ Monthly SEO Packages\r\n+ Powerful SEO Packages\r\n+ Backlink Strategy Pyramids\r\n+ Cheap SEO Services\r\n+ SEO for WordPress\r\n\r\nSeoBests.com - your top quality SEO services shop.', '2025-08-22 13:22:42', '2025-08-22 13:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `letter_of_intent_path` varchar(255) NOT NULL,
  `company_profile_path` varchar(255) NOT NULL,
  `property_details_path` varchar(255) NOT NULL,
  `status` enum('pending','under_review','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `company_description` varchar(255) DEFAULT NULL,
  `developer_id` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_items`
--

CREATE TABLE `dropdown_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropdown_items`
--

INSERT INTO `dropdown_items` (`id`, `menu_item_id`, `parent_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(38, 11, NULL, 'Building Projects', 'building-projects', '2025-08-20 18:57:54', '2025-08-20 18:57:54'),
(39, 11, NULL, 'Land Projects', 'land-projects', '2025-08-20 18:57:54', '2025-08-20 18:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `event_date` date NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` enum('past','upcoming') NOT NULL DEFAULT 'past',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `generate_codes`
--

CREATE TABLE `generate_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generate_codes`
--

INSERT INTO `generate_codes` (`id`, `user_id`, `code`, `referral_code`, `created_at`, `updated_at`) VALUES
(1, 2, 'NKIQSPFF', '', '2025-08-21 01:39:29', '2025-08-21 01:39:29'),
(2, 3, 'ZLZXLPTR', 'NKIQSPFF', '2025-08-21 01:44:30', '2025-08-21 01:44:30'),
(3, 4, 'LVDSF9UN', 'NKIQSPFF', '2025-08-21 01:45:12', '2025-08-21 01:45:12');

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
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Home', 'home', '2025-06-28 11:13:17', '2025-06-28 11:35:22'),
(4, 'About us', 'about-us', '2025-06-28 11:16:54', '2025-06-28 11:35:56'),
(9, 'Realtors', 'realtors', '2025-06-28 11:41:19', '2025-07-05 03:43:12'),
(10, 'Developers', 'developers', '2025-06-28 11:41:24', '2025-07-05 03:44:46'),
(11, 'Partner Firms', 'partner-firms', '2025-07-05 03:47:37', '2025-08-20 18:57:54'),
(12, 'URRG Academy', 'urrg-academy', '2025-07-05 03:48:12', '2025-08-20 19:01:41'),
(13, 'Event', 'event', '2025-08-20 19:08:45', '2025-08-20 19:08:45');

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
(4, '2025_06_28_064836_create_admins_table', 2),
(5, '2025_06_28_113307_create_menu_items_table', 3),
(6, '2025_06_28_113349_create_dropdown_items_table', 3),
(7, '2025_06_28_130508_create_properties_table', 4),
(8, '2025_06_28_131346_create_realtors_table', 4),
(9, '2025_07_05_104433_add_fields_to_users_table', 5),
(10, '2025_07_05_105804_create_users_with_registration_fields', 6),
(11, '2025_07_07_105622_create_generate_codes_table', 7),
(12, '2025_07_07_110211_create_referral_trackings_table', 8),
(13, '2025_07_07_114325_create_generate_codes_table', 9),
(14, '2025_07_23_184652_add_status_to_users_table', 10),
(15, '2025_07_25_000547_add_payment_fields_to_users_table', 10),
(16, '2025_07_25_010000_add_avatar_to_users_table', 10),
(17, '2025_07_25_152521_create_commissions_table', 10),
(18, '2025_07_25_153158_create_wallets_table', 10),
(19, '2025_07_28_111551_create_events_table', 11),
(20, '2025_07_28_141559_create_developers_table', 11),
(21, '2025_07_28_211700_add_realtor_id_to_users_table', 11),
(22, '2025_08_02_181256_create_realtor_sequences_table', 11),
(23, '2025_08_09_205053_add_referral_code_to_commissions_table', 11),
(24, '2025_08_13_193421_add_logo_company_developerid_to_developers_table', 12),
(25, '2025_08_13_225414_create_properties_table', 13),
(26, '2025_08_13_231723_create_projects_table', 13),
(27, '2025_08_14_001947_create_events_table', 14),
(28, '2025_08_14_002047_create_event_images_table', 14),
(29, '2025_08_14_012146_create_accademy_events_table', 14),
(30, '2025_08_14_081544_create_team_leads_table', 14),
(31, '2025_08_20_110004_update_admins_table', 15),
(32, '2025_08_20_131815_add_referral_code_to_admins_table', 15),
(33, '2025_08_20_134246_add_referral_code_to_generate_codes_table', 15),
(34, '2025_08_20_211644_create_referral_logs_table', 16),
(35, '2025_08_20_000000_create_generate_codes_table', 17),
(36, '2025_08_20_215222_create_contacts_table', 18),
(37, '2025_08_20_225925_add_admin_id_to_commissions_table', 19),
(38, '2025_08_21_165431_add_sold_properties_to_users_table', 20);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `developer_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` enum('upcoming','ongoing','completed') NOT NULL DEFAULT 'upcoming',
  `cover_image` varchar(255) DEFAULT NULL,
  `number_of_units` int(11) DEFAULT NULL,
  `price_per_unit` decimal(15,2) DEFAULT NULL,
  `documents_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `developer_id` bigint(20) UNSIGNED NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `category` enum('house','land','apartment') NOT NULL DEFAULT 'house',
  `status` enum('pending','approved','rejected','sold') NOT NULL DEFAULT 'pending',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `toilets` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realtors`
--

CREATE TABLE `realtors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `referral_link` varchar(255) NOT NULL,
  `upline_referral` varchar(255) DEFAULT NULL,
  `commission` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realtor_sequences`
--

CREATE TABLE `realtor_sequences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_prefix` varchar(255) NOT NULL,
  `last_sequence` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `realtor_sequences`
--

INSERT INTO `realtor_sequences` (`id`, `date_prefix`, `last_sequence`, `created_at`, `updated_at`) VALUES
(1, '20250820', 1, '2025-08-21 01:46:38', '2025-08-21 01:46:38'),
(2, '20250823', 2, '2025-08-23 20:03:11', '2025-08-23 20:03:11'),
(3, '20250824', 1, '2025-08-25 02:25:39', '2025-08-25 02:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `referral_logs`
--

CREATE TABLE `referral_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `referrer_id` bigint(20) UNSIGNED NOT NULL,
  `referrer_type` varchar(255) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_logs`
--

INSERT INTO `referral_logs` (`id`, `user_id`, `referrer_id`, `referrer_type`, `level`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'App\\Models\\Admin', 1, '2025-08-21 01:46:38', '2025-08-21 01:46:38'),
(2, 2, 4, 'App\\Models\\Admin', 1, '2025-08-23 20:03:12', '2025-08-23 20:03:12'),
(3, 3, 4, 'App\\Models\\Admin', 1, '2025-08-23 20:20:50', '2025-08-23 20:20:50'),
(4, 4, 4, 'App\\Models\\Admin', 1, '2025-08-25 02:25:39', '2025-08-25 02:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `referral_trackings`
--

CREATE TABLE `referral_trackings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referral_code_id` bigint(20) UNSIGNED NOT NULL,
  `referred_user_id` bigint(20) UNSIGNED NOT NULL,
  `commission_earned` decimal(10,2) NOT NULL DEFAULT 0.00,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('0yEuRyJNcTNn8dDvmmgqQlXI4uvwgngkoAUj274G', NULL, '52.10.230.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.19582', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHdJZ0xZd0hMdktuVmZuOGpXVWpiWkZ6NkExOUtVMjRUWGFod0M4SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnVuaXF1ZXJhZGlhbmNlcmVhbHRvcnNncm91cC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756138251),
('309yOW9uWiitjfFeQdxsPzL5S2xW3Gisnujh12NF', NULL, '149.57.180.139', 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/120.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTg2bkJ6WEhYWEl5akowTVFIa0lKS0R5MnpnNDA5S1h4OHViWlZnYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vc3RhZ2dpbmcudW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756179139),
('5nIqOg3noEkUIY6aG7hkyu0M0LIIonyGHnQn6XTw', NULL, '35.87.23.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUdCQUw0WmJFd0NRb0RMeGFHenJLbDI4ampsWHRGNjBwbWMwQ2k1SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756120669),
('7RA807hb2mbDyYyWN78G6eXKEoQNDUA2DdKzq5pe', NULL, '43.153.102.138', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNER4SDhNZmtibFJ0ZExzM01qQTBybnJnV1ByQkllNktOUXE1RGRuTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756137359),
('8Ce8zaYZeJkxQiKe7uTsonL5t9aUcuovyckFI8tP', NULL, '15.204.182.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTRmZ1ZnYk15VXlISDVvZlNRMjdzVXNSQjI4VEZVbHg3RmpkblY5dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756153595),
('9z9Yl3a3t8eMQ79BcJWmEtS1xLx2BVnBnitNCE4u', NULL, '35.165.145.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.19582', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUxOa2lIZkd6WE5EdUlNVTgxMmtVSjdBWjdjMmRmTk5nQjNyOXRXdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756138804),
('amG1VUOD8uxR0ORplAAFKBNfoaXmTdTz2TJeulnN', NULL, '212.227.127.151', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWRQN0hJUk5GSnFPeHE5SVR5R2Y4R2JnSGc1aFRPUUlheHZjaU1wSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnVuaXF1ZXJhZGlhbmNlcmVhbHRvcnNncm91cC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756073606),
('BzzcuCjYjfG8ebrPjB6738EdfDFEOtFmjroiFpmN', NULL, '102.88.114.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTlV0cDFkOXhyZUhEb0RlOWlyeG5LTnJRV0luVkJ5ZWVZSGNYbk5paiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1756070630),
('ctBTetrTynhkWT20sNgJBfvC6g0nXxH6pEsvr1VL', NULL, '20.171.207.21', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlhGMU9VZ2ZNS3IwOW1mNnhvdGN5MlF2cTF0NFJRVWE1ekgzbG5DRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS9sYW5kLXByb2plY3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1756131697),
('DkcyytPNEiRKAGXRTAHbLZLBgSD02l0MW2QZhG3K', NULL, '44.252.110.126', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzE0aEhJaVA5SWNiSXEwY090Rld1cjJnQkp1a21ReHdZZVBuZVVRVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756120501),
('EEessvJFjrqAbyqnCZY9LNJBZw1ff1J3A3BQlV9g', NULL, '94.247.172.129', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYlIwQ2hDYmdmNXdHMTVkYlY4YVN0eUJYZmZxYzliakRTdEVTQXVhdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1756150380),
('In7c7OcYjdjzmu5CBdB0R6LIKirwd9hQI54N5Qjw', NULL, '185.191.171.7', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ2FDT0pQSDhuR1hwWXdaSnBrS1g3dkhjd0d3dGN0WG1iZzltNWVIQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756118892),
('IOlZA8a0l62To8dx0OZ3clydrsQkaeXAZMteSCov', NULL, '170.106.110.146', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0ZaM1BZaXV0RXJiYUZYVFBJZzZKMVBkdkR4eVNVSUFVRkNnZHBQQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756090129),
('KE2fP9sknKhFHieF7CGfHu8AS8WFXVP9IQIMK16p', NULL, '43.135.211.148', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMW9FeEJzQnZJeldLcUlsSlBJeUpIb3lHSjhOU2draWVSN0YyeE5ZeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnVuaXF1ZXJhZGlhbmNlcmVhbHRvcnNncm91cC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756115016),
('KU7vbKXcSbcbT8SmmYtuCjT2qTZYHvFhK0xunb5s', NULL, '35.87.23.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNW9wa3dYaUNHeUJDZEpjOE02N0lBakl6YnZjS0lJaEt6WFRMSUVUayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756120668),
('md2tfu96nItPNicmllJ5Hxjac2xI8KNuBpX4LBnQ', NULL, '18.224.192.118', 'Mozilla/5.0 zgrab/0.x', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXlya3R0YXlJdG5qTFA4RjV3R082aUQzREZuRDVwYUJQclRyVmtRRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756164291),
('nf5nz88gnqPbquEELAWffeciWUeHucNObAxJB7ra', NULL, '94.247.172.129', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiR0pyWnZkOVVXOUZlQTBuWlRybTFrN1BvbzFYNTNCbUFuNElISEpiUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1756150350),
('OeAVhgNiUEVfvqlyYVIHtAbAjB8ARqr5hnuwwbLz', NULL, '198.235.24.97', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVFxemE3Sk5Ibm1FSnNqSHJuVlhtaG1TTXo5eE9jMlFiSmV1UFE5TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS9zaGVsbC5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167546),
('oLqBvc3LYDdWqQRMIXIqlm7ssA2ZGeJuUz4NFjpe', NULL, '43.157.179.227', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkY3RXo0ZGVVSzh4Wk1XQjh6VWVhRGNBZGNxQTd1UjZLVGllVFVBWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnVuaXF1ZXJhZGlhbmNlcmVhbHRvcnNncm91cC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756137331),
('PzfCEQFj8A3B7zUEfvkjSQsCkKciFmxgsOattgeX', NULL, '102.89.47.34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDAxSHNRTHBVNTdpT1B5bjVlUW01RjFEZDB3em9nUlZSQWI0THRQSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vc3RhZ2dpbmcudW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS9wdWJsaWMiO319', 1756074316),
('pzP4w7IKc4C9mLZtpUFVb6ywOetwUNwxTPL0jB4m', NULL, '198.235.24.13', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDd0RkMxMnlxTXBiS2RoOFNCU0tQbmNYTnl1OVI0OTRhVEZXcTVTMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS93ZWJzaGVsbC5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756167546),
('sgStmETHmFigkMTMoXujyRdUNDaz0s0YJUokdtLF', NULL, '212.227.127.151', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHVzU3RkcGlkTzExWENNd1k4V2hlS2N2b2ZEa0YySmN4UGVRSmozUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS9hZHMudHh0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1756073607),
('sPyqlRwzO3QBjG6MVn9GvmHvxPL3U3vpn31fl5C4', 4, '102.89.47.34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVjN6TFoxem1YbEg4WE10OFpod3RrZGdZRm9EVXZzcGNRbHpiaHEwTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS9hZG1pbi9kYXNoYm9hcmQiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1756074416),
('tdQqRq3XD3InJR6XJy3rac72UqwL8bI9CmfKf6Rf', NULL, '34.220.100.76', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.19582', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTBpRVpyTnl1NjJWTFVVdTZ2eFR3UGFkalJkV2NtSk5ZbkZZSEtMWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756138972),
('TFozibw2G1UmGXyUnQpkmc7slF2B6x7yMLnyD2Jb', NULL, '198.235.24.13', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGNneUhTVDJhekdzRkREYTAzR1c4Y1FrazdCRWNGaE1XbHpSbnhIUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS9zaGVsbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756167546),
('uJiywUqJFdQ63lfn5Ufcv5lolxgI8hUCpqoIY4Y8', NULL, '43.157.50.58', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUYwY3hwMjk1ZHNoWldGSGJHOGo5dDBHSmE4ZlVhd0JRUG5JWlVEbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756115008),
('UwR5G9fE97F8Njs6ox5BeX1dO0tJ4URfD1Jke713', NULL, '49.51.233.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXpEVnNCeXc3WVh4UUlQUTk1cjdqN3ZNTTB2SmJFMUQ5bXJLa01xdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnVuaXF1ZXJhZGlhbmNlcmVhbHRvcnNncm91cC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756090175),
('VgCCVUWlrs7BPwOh4X8sukJGZ1p61ZhSkQFt4x7f', NULL, '85.208.96.208', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1lIYWJ5bXZ2S2E5Q2hZNndoWWlRN0YxcjJZS1lpQzZZb0ZCSEhXeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS9hYm91dC11cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756177443),
('vumSFgHxqL6vTAwMbX2WirY830Vz4iauzp4NjXa4', NULL, '44.252.110.126', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXBCcVgzWjNrVzVORG9ucDBJRmJuQkZuYlJXYms1NzNoUm9sb1VQQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756120503),
('w7XfxPqAv77SYkAn7lp4HlDdOsJSXaUYehU71v0D', NULL, '54.212.219.195', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.19582', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWW9DNGxSa0w3RFBQeE11NzhNNVFqWkpad25ERDhZYnMyUmdTUDRBQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnVuaXF1ZXJhZGlhbmNlcmVhbHRvcnNncm91cC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1756138341),
('WZXf4SfYaYb8QQMTlkekeSweLQLyVWTn8fzsdr7m', NULL, '205.210.31.49', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2R6bWd6T0c1TVR5dXV0cWJ6Y3BJVExWQ0xaOTBUSVpmNVNqaURpVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS93ZWJzaGVsbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756167266),
('ybmuNT1Ff0k6r7B97TDuDZJfdXWDBTzfMjuljdva', NULL, '102.88.114.141', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNGRhMFVJVWtqUEJZdkhCYXJXaWxHYVl2M2VSc2ZPc1hSRjAxZzRHSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbS90ZWFtLWxlYWRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1756072293),
('yWFjeCXoifxiTgwYsFKlSvBnFX3PrKzA6LvJXQzM', NULL, '147.185.132.219', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0pmSjNCaDJySXFmRXl4dkRwZ1N6VWhnQ1VCdnNnakJFUEdIcHJyQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdW5pcXVlcmFkaWFuY2VyZWFsdG9yc2dyb3VwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1756158183);

-- --------------------------------------------------------

--
-- Table structure for table `team_leads`
--

CREATE TABLE `team_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_leads`
--

INSERT INTO `team_leads` (`id`, `fullname`, `post`, `picture`, `created_at`, `updated_at`) VALUES
(5, 'Adejare Micheal Adetomiwa', 'President', 'team_leads/1755885271_Mike.jpg', '2025-08-22 21:43:13', '2025-08-22 21:54:31'),
(6, 'Adega Adeleye Isaac', 'Head of Administration', 'team_leads/1755885250_ade.jpg', '2025-08-22 21:43:51', '2025-08-22 21:54:10'),
(7, 'Babalola Olaniyi Peter', 'Chief Operating Officer', 'team_leads/1755885172_Peter.jpg', '2025-08-22 21:44:22', '2025-08-22 21:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `realtor_id` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `state_of_residence` varchar(255) NOT NULL,
  `referral_code` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sold_properties` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `upline_referral` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `realtor_id`, `firstname`, `lastname`, `email`, `phone`, `state_of_residence`, `referral_code`, `experience`, `email_verified_at`, `password`, `status`, `sold_properties`, `remember_token`, `created_at`, `updated_at`, `bank_name`, `account_name`, `account_number`, `payment_method`, `dob`, `address`, `upline_referral`, `photo`) VALUES
(1, 'URR08202501', 'Eshanokpe', 'Daniel', 'eshanokpe@gmail.com', '08139267960', 'Lagos', '748B20CF', 'Below 6 months', '2025-08-21 02:46:54', '$2y$12$Jxi.XO/jlAuNkztdn2M17Os6XU.OgBOs2vGH1r3VylNaKBN4KDKxW', 'active', 0, NULL, '2025-08-21 01:46:38', '2025-08-21 01:46:38', NULL, NULL, NULL, NULL, NULL, NULL, 'ZLZXLPTR', NULL),
(4, 'URR08242501', 'Damilola', 'Oladokun', 'odd.cr8tives@gmail.com', '08100740457', 'odd.cr8tives@gmail.com', '19AE669D', '1 year - 3 years', '2025-08-25 02:26:03', '$2y$12$syKDHz8bz5Ge7zESfNwM5Oyqm6cCdLmBs0.CGCkoueYuXNOpnz90e', 'active', 0, NULL, '2025-08-25 02:25:39', '2025-08-25 02:26:03', NULL, NULL, NULL, NULL, NULL, NULL, 'LVDSF9UN', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `balance` decimal(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `user_email`, `balance`, `created_at`, `updated_at`) VALUES
(1, 3, 'peter@uniqueradiancerealtorsgroup.com', 0.00, '2025-08-21 01:46:38', '2025-08-21 01:46:38'),
(2, 4, 'ade@uniqueradiancerealtorsgroup.com', 0.00, '2025-08-23 20:03:12', '2025-08-25 02:25:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accademy_events`
--
ALTER TABLE `accademy_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH,
  ADD UNIQUE KEY `email` (`email`) USING HASH;

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
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commissions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `developers_developer_id_unique` (`developer_id`) USING HASH;

--
-- Indexes for table `dropdown_items`
--
ALTER TABLE `dropdown_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dropdown_items_slug_unique` (`slug`),
  ADD KEY `dropdown_items_menu_item_id_foreign` (`menu_item_id`),
  ADD KEY `dropdown_items_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_images_event_id_foreign` (`event_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `generate_codes`
--
ALTER TABLE `generate_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generate_codes_code_unique` (`code`) USING HASH,
  ADD KEY `generate_codes_user_id_foreign` (`user_id`);

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
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_items_name_unique` (`name`),
  ADD UNIQUE KEY `menu_items_slug_unique` (`slug`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_developer_id_foreign` (`developer_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_property_code_unique` (`property_code`) USING HASH,
  ADD KEY `properties_developer_id_foreign` (`developer_id`);

--
-- Indexes for table `realtors`
--
ALTER TABLE `realtors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `realtors_phone_unique` (`phone`),
  ADD UNIQUE KEY `realtors_email_unique` (`email`),
  ADD UNIQUE KEY `realtors_referral_link_unique` (`referral_link`);

--
-- Indexes for table `realtor_sequences`
--
ALTER TABLE `realtor_sequences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `realtor_sequences_date_prefix_unique` (`date_prefix`) USING HASH;

--
-- Indexes for table `referral_logs`
--
ALTER TABLE `referral_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referral_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `referral_trackings`
--
ALTER TABLE `referral_trackings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referral_trackings_referral_code_id_foreign` (`referral_code_id`),
  ADD KEY `referral_trackings_referred_user_id_foreign` (`referred_user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `team_leads`
--
ALTER TABLE `team_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_realtor_id_unique` (`realtor_id`),
  ADD KEY `users_firstname_lastname_index` (`firstname`,`lastname`),
  ADD KEY `users_referral_code_index` (`referral_code`),
  ADD KEY `users_state_of_residence_index` (`state_of_residence`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accademy_events`
--
ALTER TABLE `accademy_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dropdown_items`
--
ALTER TABLE `dropdown_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generate_codes`
--
ALTER TABLE `generate_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realtors`
--
ALTER TABLE `realtors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realtor_sequences`
--
ALTER TABLE `realtor_sequences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `referral_logs`
--
ALTER TABLE `referral_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referral_trackings`
--
ALTER TABLE `referral_trackings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_leads`
--
ALTER TABLE `team_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dropdown_items`
--
ALTER TABLE `dropdown_items`
  ADD CONSTRAINT `dropdown_items_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dropdown_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `dropdown_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `referral_trackings`
--
ALTER TABLE `referral_trackings`
  ADD CONSTRAINT `referral_trackings_referral_code_id_foreign` FOREIGN KEY (`referral_code_id`) REFERENCES `generate_codes` (`id`),
  ADD CONSTRAINT `referral_trackings_referred_user_id_foreign` FOREIGN KEY (`referred_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
