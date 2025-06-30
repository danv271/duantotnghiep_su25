-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2025 at 10:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duantotnghiep_su25`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Weight', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(2, 'Brand', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(3, 'Style', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(4, 'Material', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(5, 'Style', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(6, 'Gender', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(7, 'Brand', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(8, 'Material', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(9, 'Brand', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(10, 'Style', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(11, 'Size', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(12, 'Weight', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(13, 'Brand', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(14, 'Material', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(15, 'Style', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(16, 'Size', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(17, 'Brand', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(18, 'Weight', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(19, 'Style', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(20, 'Color', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(21, 'Gender', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(22, 'Size', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(23, 'Pattern', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(24, 'Gender', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(25, 'Brand', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(26, 'Gender', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(27, 'Style', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(28, 'Style', '2025-06-03 02:51:03', '2025-06-03 02:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_values`
--

CREATE TABLE `attributes_values` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes_values`
--

INSERT INTO `attributes_values` (`id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 9, 'qui', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(2, 10, 'ut', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(3, 11, 'vitae', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(4, 12, 'enim', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(5, 13, 'explicabo', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(6, 14, 'a', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(7, 15, 'commodi', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(8, 16, 'magni', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(9, 17, 'rerum', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(10, 18, 'nobis', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(11, 19, 'aliquam', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(12, 20, 'voluptatem', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(13, 21, 'molestiae', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(14, 22, 'est', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(15, 23, 'sunt', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(16, 24, 'voluptatem', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(17, 25, 'dolor', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(18, 26, 'accusamus', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(19, 27, 'debitis', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(20, 28, 'exercitationem', '2025-06-03 02:51:03', '2025-06-03 02:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_quantity` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `total_quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 389302, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(2, 9, 3, 934017, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(3, 9, 12, 228200, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(4, 8, 4, 430145, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(5, 2, 18, 878921, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(6, 4, 6, 627312, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(7, 5, 4, 945549, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(8, 10, 4, 859091, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(9, 5, 5, 827752, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(10, 9, 13, 103703, '2025-06-03 02:51:04', '2025-06-03 02:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `variant_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 13, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(2, 6, 19, 1, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(3, 7, 17, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(4, 9, 13, 1, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(5, 3, 11, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(6, 1, 13, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(7, 1, 6, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(8, 10, 1, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(9, 10, 11, 1, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(10, 8, 2, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(11, 2, 20, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(12, 1, 19, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(13, 2, 6, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(14, 2, 5, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(15, 7, 18, 1, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(16, 1, 5, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(17, 1, 12, 1, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(18, 1, 14, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(19, 3, 8, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(20, 10, 4, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(21, 10, 7, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(22, 8, 12, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(23, 5, 17, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(24, 3, 7, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(25, 7, 6, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(26, 2, 6, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(27, 8, 2, 1, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(28, 7, 11, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(29, 5, 9, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(30, 1, 13, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(31, 5, 19, 1, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(32, 1, 7, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(33, 3, 6, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(34, 8, 6, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(35, 9, 1, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(36, 10, 6, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(37, 2, 5, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(38, 7, 2, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(39, 3, 8, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(40, 3, 2, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(41, 6, 15, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(42, 6, 6, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(43, 2, 7, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(44, 6, 18, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(45, 1, 13, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(46, 2, 2, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(47, 8, 20, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(48, 6, 11, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(49, 3, 2, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(50, 5, 20, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_category_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_category_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Accusantium autem delectus iusto tempore sint quia dolorem.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(2, NULL, 'Ut nesciunt omnis sint possimus itaque.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(3, NULL, 'Quis doloremque quia illum laborum sit at.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(4, NULL, 'Ducimus neque sunt nostrum consectetur suscipit eaque aspernatur officia.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(5, NULL, 'Sit nesciunt enim provident illum deleniti delectus optio nihil.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(6, NULL, 'Aut dolores rem possimus voluptatem exercitationem eligendi.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(7, NULL, 'Sed nam voluptatem tenetur labore non eum possimus.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(8, NULL, 'Dolorem in esse molestiae qui incidunt.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(9, NULL, 'Voluptatem doloribus porro eligendi doloremque quia voluptas.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(10, NULL, 'Earum eum ut mollitia est sequi.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(11, NULL, 'Ut expedita ea non qui.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(12, 2, 'Ut atque quia nulla minima inventore quia nesciunt.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(13, 4, 'Rem velit architecto quis.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(14, NULL, 'Incidunt officia sint omnis.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(15, 8, 'Quaerat possimus dolorum qui qui consequatur optio id.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(16, 2, 'Incidunt deserunt voluptas aliquam quia officiis et.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(17, 10, 'Porro qui sed ut expedita.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(18, 4, 'Rerum aliquid rerum quisquam enim non maxime.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(19, 6, 'Est necessitatibus molestias cumque sed et nemo aut.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(20, NULL, 'Est ad fugiat incidunt et natus.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(21, 10, 'Repudiandae delectus dolores consequuntur fugiat.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(22, 7, 'Sint voluptas et excepturi.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(23, 1, 'Totam doloremque possimus facere maxime enim.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(24, NULL, 'Accusamus ad et voluptas fugit sed quaerat reprehenderit quod.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(25, 1, 'Quis sed occaecati aut optio.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(26, 9, 'Perspiciatis dolor culpa deleniti velit ullam praesentium.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(27, 7, 'Ea ea aspernatur cum atque nihil quas.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(28, NULL, 'Est quod vel similique quisquam at velit et.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(29, NULL, 'Odio suscipit voluptas maxime sed.', 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(30, NULL, 'Nulla voluptas et ad.', 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_05_30_144348_create_roles_table', 1),
(4, '2025_05_30_144350_create_users_table', 1),
(5, '2025_05_30_144440_create_orders_table', 1),
(6, '2025_05_30_144441_create_payments_table', 1),
(7, '2025_05_30_144442_create_payment_transactions_table', 1),
(8, '2025_05_31_132814_create_categories_table', 1),
(9, '2025_05_31_132815_create_products_table', 1),
(10, '2025_05_31_132851_create_variants_table', 1),
(11, '2025_05_31_132852_create_order_details_table', 1),
(12, '2025_05_31_132952_create_attributes_table', 1),
(13, '2025_05_31_133033_create_attributes_values_table', 1),
(14, '2025_05_31_133144_create_variant_attributes_table', 1),
(15, '2025_05_31_144703_create_cart_table', 1),
(16, '2025_05_31_144734_create_cart_items_table', 1),
(17, '2025_06_03_043900_add_email_verified_at_to_users_table', 1),
(18, '2025_06_03_044224_add_remember_token_to_users_table', 1),
(19, '2025_06_03_092858_create_product_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` text COLLATE utf8mb4_unicode_ci,
  `status_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `type_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `user_phone`, `user_address`, `user_note`, `status_order`, `status_payment`, `type_payment`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 5, 'vickie.schaden@example.net', '+1 (801) 608-1065', '7550 Parisian Creek\nMaxinestad, IN 22083-2419', 'Eos non vitae ipsam.', 'shipped', 'paid', 'credit_card', '508140.17', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(2, 2, 'waters.johnson@example.net', '757-633-2644', '264 Rafael Trace\nWest Marlin, MO 79364', 'Ut quidem placeat ut quam.', 'cancelled', 'unpaid', 'credit_card', '196742.69', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(3, 2, 'wendy.bayer@example.org', '(678) 917-8599', '99031 Gonzalo Fort\nMorissetteview, VA 69252-7740', 'Magni cumque est inventore et quia.', 'processing', 'paid', 'paypal', '192947.04', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(4, 8, 'windler.harry@example.org', '1-640-662-6760', '67140 Yost Ridges\nFletchermouth, DC 60498', 'Beatae temporibus minima non alias dignissimos id sequi.', 'pending', 'unpaid', 'paypal', '1216510.63', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(5, 7, 'paucek.clovis@example.org', '+1 (385) 502-8471', '467 Adeline Prairie\nGroverchester, VT 57508-1210', 'Dignissimos in ab ipsum ea voluptas.', 'shipped', 'paid', 'cash_on_delivery', '1172976.58', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(6, 10, 'blick.leann@example.org', '+1.857.380.0970', '9258 Jast Corners\nEast Leo, MA 63773', 'Dolor nostrum consequatur excepturi ex ad corporis quae.', 'cancelled', 'paid', 'credit_card', '1389457.77', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(7, 7, 'haag.leopold@example.org', '+12397840595', '481 Thiel Corners Suite 660\nNorth Verla, PA 39089', 'Ratione deserunt quod est delectus quas rerum.', 'shipped', 'paid', 'paypal', '289104.15', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(8, 10, 'mack31@example.com', '(614) 264-5722', '98754 Rodriguez Station Suite 065\nTrompmouth, DC 52061-8227', 'Sunt alias eaque suscipit ducimus illum voluptas.', 'cancelled', 'paid', 'cash_on_delivery', '292398.92', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(9, 4, 'jay.kemmer@example.com', '+1.972.872.2237', '43315 Parker Rue\nSouth Brandystad, IL 31022-1019', 'Nobis voluptas ut quia expedita maxime debitis.', 'pending', 'unpaid', 'cash_on_delivery', '957886.16', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(10, 10, 'merritt.roob@example.net', '+1 (256) 234-4129', '653 Mohamed Parks Apt. 139\nCoralietown, AK 40714', 'Velit doloribus reiciendis qui velit illo omnis soluta.', 'pending', 'paid', 'cash_on_delivery', '1424597.32', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(11, 7, 'arnulfo.cartwright@example.net', '445.469.9770', '79280 Marquardt Mission\nNew Saige, AL 81419-1815', 'Alias eos non iste quos sit.', 'shipped', 'paid', 'credit_card', '1865745.74', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(12, 7, 'ronaldo.windler@example.com', '+1 (843) 857-1905', '41115 Fay Orchard Suite 670\nLake Orville, VA 70804-1171', 'Ut quasi qui voluptatem aut sapiente.', 'processing', 'paid', 'credit_card', '1453228.72', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(13, 3, 'armstrong.pierce@example.com', '+1-480-726-2921', '466 Velma Shores Apt. 790\nFosterberg, AZ 45722', 'At illo accusamus omnis quis.', 'cancelled', 'paid', 'paypal', '1764806.18', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(14, 6, 'zdach@example.org', '1-301-702-6886', '67350 Dudley Unions\nEast Nilsland, WV 68619-1104', 'Non tempora tenetur omnis nostrum exercitationem.', 'processing', 'paid', 'credit_card', '392662.66', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(15, 2, 'vilma15@example.net', '+1 (669) 687-3269', '5877 Spinka Inlet Apt. 198\nNorth Jettbury, OH 23602', 'Aut autem accusamus id quod explicabo.', 'cancelled', 'unpaid', 'credit_card', '1944608.15', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(16, 6, 'kellie46@example.org', '(404) 573-7203', '8137 Dennis Radial\nLarsonview, MD 24179', 'Voluptatem praesentium nulla iusto.', 'cancelled', 'paid', 'cash_on_delivery', '534008.73', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(17, 6, 'trever82@example.net', '(503) 501-0444', '21200 Christiansen Port\nLake Selinabury, RI 32061-0970', 'Ipsum illum laboriosam iusto temporibus quod.', 'processing', 'unpaid', 'cash_on_delivery', '1225592.05', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(18, 7, 'douglas.melissa@example.com', '820-420-6476', '51494 Betty Burgs Suite 952\nGradyfurt, NY 13080-8113', 'Est incidunt qui eius impedit excepturi.', 'processing', 'paid', 'cash_on_delivery', '947493.89', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(19, 4, 'alanis.walter@example.org', '937.499.9764', '720 Bogisich Flats Apt. 631\nNorth Kariannetown, GA 77401', 'Ex molestiae placeat et iure voluptatum.', 'cancelled', 'unpaid', 'paypal', '623441.88', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(20, 2, 'mayert.ashleigh@example.net', '+18433659113', '88037 Fahey Plains Apt. 140\nPort Stephany, ID 18515', 'Nisi molestias earum quaerat.', 'processing', 'paid', 'credit_card', '1372681.79', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(21, 3, 'estell17@example.net', '669-476-1512', '566 Krajcik Alley\nSchmittburgh, MO 26062-8998', 'Ut et enim aperiam porro assumenda ut aut.', 'processing', 'unpaid', 'paypal', '1009238.82', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(22, 9, 'amanda01@example.com', '+1-205-842-7172', '877 Berge Fall Suite 185\nEast Bernie, KS 93050', 'Non similique eum ea et quaerat similique veniam.', 'pending', 'paid', 'credit_card', '741046.16', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(23, 6, 'gislason.fatima@example.com', '234.891.2816', '6431 Blanca Knoll Suite 672\nAlbinberg, CT 82046-5541', 'Id est ad ut voluptas dolores libero rem.', 'pending', 'paid', 'paypal', '1727090.45', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(24, 1, 'mcrist@example.com', '1-845-458-7828', '4589 Okuneva Court Suite 323\nArielleport, ID 35204', 'Nostrum consequatur sit ut repellat itaque quas.', 'processing', 'unpaid', 'cash_on_delivery', '346176.98', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(25, 3, 'cschmeler@example.net', '+1-754-285-8205', '835 Zemlak Divide Apt. 414\nPort Emile, VT 79281', 'Eos aliquid debitis sit sapiente et maxime sequi exercitationem.', 'processing', 'paid', 'paypal', '166578.54', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(26, 5, 'strosin.flavio@example.com', '432.762.3387', '31936 Jast Greens Suite 185\nDouglasbury, WV 81517-1686', 'Aliquid repellat cum aspernatur molestiae consequatur eum qui.', 'processing', 'unpaid', 'credit_card', '784353.54', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(27, 7, 'blaze32@example.org', '667.586.1300', '679 Mona Cape Apt. 025\nEast Alberto, KS 05014', 'Animi sunt qui molestias nesciunt quod.', 'shipped', 'paid', 'paypal', '1899031.43', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(28, 2, 'hkihn@example.org', '413-969-6253', '15043 Shanahan Highway\nLake Ibrahimbury, NM 02723-4028', 'Enim numquam beatae cumque quae.', 'shipped', 'paid', 'cash_on_delivery', '121005.09', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(29, 3, 'dean.oconnell@example.com', '1-832-452-1308', '98930 Coy Skyway\nSouth Oliver, WY 53001', 'Aut dolore et et dignissimos aspernatur et.', 'processing', 'unpaid', 'cash_on_delivery', '1011180.07', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(30, 6, 'johns.orlando@example.org', '463-644-6818', '54779 Rodriguez Mission Apt. 170\nErdmanport, OH 07431', 'Asperiores error fugiat incidunt.', 'cancelled', 'unpaid', 'credit_card', '828931.16', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(31, 4, 'lesly88@example.org', '(906) 454-4490', '701 Kemmer Inlet\nLake Vernieshire, RI 41640-9113', 'Vel est eveniet ad ipsa pariatur.', 'processing', 'unpaid', 'paypal', '702969.53', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(32, 8, 'iwest@example.org', '+16409224205', '1987 Alexzander Keys Suite 049\nEthelmouth, NE 08780', 'Dicta ratione facere consequatur.', 'processing', 'paid', 'cash_on_delivery', '1773340.78', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(33, 10, 'marks.colten@example.com', '903.240.6706', '90612 Hope Motorway Suite 194\nPort Sebastianmouth, ND 89969-1382', 'Magni illo id sed exercitationem eligendi molestias maiores nulla.', 'cancelled', 'paid', 'cash_on_delivery', '1991517.69', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(34, 3, 'hstroman@example.net', '305.248.8740', '547 Greenfelder Mountain Apt. 947\nBryceburgh, LA 06834-5065', 'Hic sed itaque assumenda quas veritatis ut suscipit.', 'cancelled', 'paid', 'paypal', '1958748.00', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(35, 6, 'amira.padberg@example.com', '+1 (737) 939-0166', '598 Dickens Plains Apt. 277\nNorth Rhettburgh, NE 14918', 'Et quasi non quidem soluta.', 'cancelled', 'paid', 'cash_on_delivery', '389226.71', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(36, 9, 'pagac.izaiah@example.com', '1-240-481-0701', '6622 Kyle Skyway Apt. 290\nMayraborough, NM 48947-3413', 'Voluptatem et qui nemo amet.', 'shipped', 'unpaid', 'paypal', '553917.60', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(37, 5, 'ireichel@example.com', '(740) 218-7500', '371 Homenick Shoals Apt. 219\nHicklemouth, MD 70012', 'Facilis dolores voluptatem necessitatibus quasi quis assumenda eos.', 'pending', 'paid', 'credit_card', '652526.88', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(38, 6, 'oconnell.geovany@example.org', '1-559-273-3435', '223 Wiza Terrace\nAndersonstad, NC 51093-5171', 'Non expedita suscipit dolorem libero dolores eum.', 'pending', 'unpaid', 'credit_card', '135712.42', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(39, 1, 'irma.mckenzie@example.net', '+1-910-758-8583', '868 Toy Hill Apt. 676\nWintheiserbury, NJ 76900-5387', 'Omnis corrupti quo libero corporis doloremque.', 'processing', 'unpaid', 'paypal', '1221902.69', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(40, 9, 'nlesch@example.com', '315-575-4377', '340 Eriberto Mission\nNew Einarberg, CA 56112-8029', 'Voluptatibus a praesentium explicabo natus consectetur aut qui.', 'shipped', 'paid', 'paypal', '1452636.89', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(41, 10, 'era36@example.org', '+1-260-245-8214', '47478 Jamel Forks Apt. 752\nZechariahberg, WI 15248-6118', 'Vel omnis delectus dolor soluta cum et.', 'cancelled', 'unpaid', 'cash_on_delivery', '1459948.65', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(42, 6, 'greenholt.elfrieda@example.net', '1-619-274-1878', '229 Johns Village Suite 346\nHagenesland, RI 23825-2884', 'Voluptatem sit blanditiis omnis incidunt.', 'shipped', 'paid', 'paypal', '1201304.30', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(43, 7, 'zachary62@example.net', '+13318201439', '6267 Hintz Row Suite 200\nEdnaburgh, CA 30597-4462', 'Recusandae et sint rem est non.', 'cancelled', 'unpaid', 'credit_card', '1884644.66', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(44, 5, 'conn.alexandre@example.org', '1-407-898-2183', '989 Carlee Rapid Suite 799\nNorth Jackeline, NE 28856-3061', 'Incidunt impedit molestiae libero recusandae qui.', 'pending', 'paid', 'paypal', '438732.82', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(45, 7, 'antonia.rice@example.net', '463.772.0453', '2498 Joan Summit Apt. 346\nEast Quinten, HI 00799-0961', 'Assumenda voluptate vel quia.', 'cancelled', 'paid', 'paypal', '1069716.11', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(46, 7, 'herminia.hyatt@example.org', '(478) 850-8624', '967 Eusebio Point Suite 497\nLavernemouth, SD 70720-5854', 'Id est placeat cum molestias officia aliquid.', 'cancelled', 'paid', 'paypal', '748535.52', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(47, 7, 'kmills@example.com', '+12095015587', '673 Myah Stream\nTyshawntown, WI 54581', 'Voluptate illum eum sequi dolorum laudantium iusto sed.', 'processing', 'unpaid', 'credit_card', '1788474.42', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(48, 9, 'estella70@example.net', '+1-682-771-6175', '3886 Jeanie Island Suite 108\nRosalynfort, UT 05156', 'Soluta et omnis aut molestiae consequatur error iure.', 'shipped', 'paid', 'paypal', '305819.41', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(49, 6, 'precious.paucek@example.com', '539-688-7822', '76345 Adelbert Prairie Suite 804\nLeathastad, NC 36795-5212', 'Laborum molestiae voluptatem molestiae sequi reprehenderit quia.', 'processing', 'paid', 'paypal', '1849314.26', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(50, 8, 'ferry.mckayla@example.net', '+1.239.961.6779', '6065 Anastasia Mall\nYolandaville, NC 90300', 'Cupiditate eum laborum sint repellat.', 'shipped', 'unpaid', 'paypal', '916158.10', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(51, 6, 'oschinner@example.com', '(385) 532-5976', '8796 Zieme Dale Apt. 620\nLabadiehaven, RI 70481-3466', 'Velit dolores assumenda sint beatae sit.', 'processing', 'paid', 'credit_card', '1170843.42', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(52, 8, 'javier.pacocha@example.net', '430.526.1370', '5246 Spinka Mountain\nPort Clotilde, IA 66960-5023', 'Nostrum a fugiat dolorem porro sapiente sed dolorem.', 'processing', 'unpaid', 'credit_card', '603725.04', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(53, 9, 'emma57@example.org', '+1-440-366-4066', '6689 Brando Coves Apt. 218\nSouth Graceberg, NM 76688-8759', 'In placeat velit sit voluptas molestias voluptatum.', 'pending', 'paid', 'credit_card', '1206322.84', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(54, 2, 'kohler.vilma@example.org', '510-774-4628', '3661 Francisca Overpass Apt. 078\nPort Adrienhaven, ID 98206', 'Autem fugiat odit libero voluptate dolore quia ex.', 'shipped', 'paid', 'cash_on_delivery', '197352.66', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(55, 10, 'rosalind.price@example.org', '404-849-1018', '91984 Mohammad Freeway\nWest Nolanland, RI 89564-7249', 'Deleniti animi consequatur excepturi dolore dolores et ex doloremque.', 'shipped', 'paid', 'credit_card', '601025.40', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(56, 8, 'zcummings@example.net', '541.428.0752', '11040 Kessler Green\nBriellefort, MI 86553', 'Quidem eos iste facere quae dolores qui vel dolorem.', 'cancelled', 'unpaid', 'cash_on_delivery', '245741.40', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(57, 8, 'mlesch@example.com', '531.688.8203', '831 Violette Canyon\nEast Natasha, ND 16461-2792', 'Enim vero omnis est vel et et cumque.', 'cancelled', 'paid', 'cash_on_delivery', '208180.21', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(58, 7, 'russel.kozey@example.org', '+1-270-431-6125', '2051 Langosh Path Apt. 655\nNew Reillyshire, ID 99726', 'Voluptatem porro dolor corporis est libero architecto.', 'pending', 'paid', 'cash_on_delivery', '1797087.99', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(59, 4, 'braun.mose@example.org', '+1-845-210-6390', '8991 Norwood Glen\nNorth Shaniya, MI 11686-4986', 'Et praesentium exercitationem aspernatur eligendi.', 'pending', 'paid', 'credit_card', '913734.26', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(60, 2, 'ledner.ona@example.net', '1-559-878-7807', '19907 Tremblay Skyway\nMakenziehaven, RI 68285', 'Adipisci maxime laudantium tempora.', 'processing', 'unpaid', 'cash_on_delivery', '1113350.69', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(61, 9, 'peggie.hudson@example.org', '+1-316-904-4281', '63615 Bernier Bypass\nNew Donavonport, DE 57324-8054', 'Repudiandae autem qui provident quo similique corporis.', 'processing', 'paid', 'cash_on_delivery', '763290.12', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(62, 10, 'kirsten.herman@example.com', '541-352-9287', '754 Ankunding Summit Apt. 389\nKunzehaven, UT 33924', 'Laborum dolores velit dicta eos.', 'pending', 'paid', 'cash_on_delivery', '1756390.11', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(63, 3, 'magnolia80@example.org', '+1.863.475.0952', '509 Astrid Trail Apt. 626\nSouth Rebekah, UT 91498-3749', 'Minima consectetur quia quaerat unde odio.', 'pending', 'unpaid', 'cash_on_delivery', '963884.42', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(64, 9, 'trisha.hickle@example.net', '1-682-216-3210', '415 Liliane Run\nRaphaelleland, NE 71003', 'Veritatis facilis eveniet voluptatem harum dolores.', 'cancelled', 'paid', 'paypal', '1220386.19', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(65, 2, 'pete.hessel@example.com', '864.625.8875', '44310 Marcelino Burg\nSouth Ethan, CO 48340-6598', 'Sapiente qui deserunt commodi accusantium quia omnis.', 'cancelled', 'paid', 'cash_on_delivery', '1107243.30', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(66, 6, 'jaskolski.lura@example.org', '380.432.4170', '44795 Dillan Fort Apt. 329\nHillview, UT 38845', 'Aut dolorem vel sunt quod dolorem omnis explicabo.', 'processing', 'unpaid', 'paypal', '294376.32', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(67, 5, 'merl.hammes@example.com', '+1 (650) 468-6321', '98619 Brandyn Manors\nLake Jeramy, NC 12580', 'Dignissimos quasi aut voluptates eum.', 'shipped', 'paid', 'cash_on_delivery', '1497774.70', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(68, 3, 'paucek.mack@example.com', '+1 (779) 353-2261', '341 Schuppe Plaza Apt. 711\nGutmannhaven, LA 61688-8036', 'Labore eligendi impedit dolore est quod saepe quaerat.', 'shipped', 'paid', 'cash_on_delivery', '1409562.25', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(69, 9, 'duane.keebler@example.net', '+1-934-740-7754', '211 Alexys Centers Apt. 313\nLangoshside, MD 06106-3102', 'Numquam natus veritatis qui voluptatum.', 'shipped', 'paid', 'cash_on_delivery', '182059.08', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(70, 1, 'kchristiansen@example.net', '(608) 406-2494', '9392 Predovic Fork Apt. 946\nNorth Pattie, OK 35121-4266', 'Architecto sapiente architecto asperiores voluptatem repellat sed inventore.', 'cancelled', 'unpaid', 'paypal', '410789.32', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(71, 5, 'devan.huel@example.net', '530-364-4979', '13590 Nina Fall Suite 845\nHunterborough, ND 69066', 'Non doloremque est est est dolore.', 'pending', 'paid', 'cash_on_delivery', '684137.74', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(72, 1, 'tina.monahan@example.net', '872.346.8900', '226 Claudie Plains\nConsidineton, GA 28742-5109', 'Facere hic amet adipisci natus.', 'cancelled', 'paid', 'cash_on_delivery', '1356349.17', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(73, 9, 'barrows.emerson@example.com', '(817) 253-7757', '28786 Nienow Light Apt. 679\nSouth Jenniferchester, DE 12698', 'Aut et omnis libero nam repellendus ducimus eveniet.', 'cancelled', 'paid', 'credit_card', '1501488.04', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(74, 4, 'chasity.kihn@example.com', '+1-570-736-4051', '44622 Maximillian Via\nLangside, SD 05575-4229', 'Officia quia et voluptatem rerum.', 'cancelled', 'unpaid', 'cash_on_delivery', '569273.03', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(75, 2, 'ypadberg@example.org', '+17473158906', '5891 Stefan Glens\nPort Reid, MN 41794', 'Nemo eos dolorem ut et.', 'processing', 'unpaid', 'paypal', '447108.31', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(76, 3, 'diamond.connelly@example.net', '+1.757.948.1235', '98509 Columbus Mill Apt. 675\nLillymouth, MT 09597', 'Modi magnam ut saepe temporibus aliquid.', 'pending', 'unpaid', 'credit_card', '1644727.97', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(77, 8, 'gmitchell@example.org', '469.804.0356', '46291 Zboncak Corner\nLindgrenville, MT 81097-0454', 'Quia voluptates ab hic aut.', 'processing', 'unpaid', 'cash_on_delivery', '1980855.34', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(78, 4, 'zvon@example.com', '(480) 919-5052', '78713 Alexzander Forest Suite 171\nWest Madge, PA 59419', 'Fuga aperiam reprehenderit vel praesentium sit et nobis illum.', 'cancelled', 'unpaid', 'paypal', '617895.31', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(79, 5, 'margarete73@example.com', '+1-308-414-2864', '79759 Alfredo Ways Apt. 391\nSouth Charlenehaven, VA 64317', 'Reprehenderit doloremque nulla doloribus.', 'shipped', 'paid', 'paypal', '1790749.47', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(80, 3, 'victoria.lubowitz@example.com', '1-251-475-1852', '17102 Serenity Road\nEast Mablemouth, KY 66736-8862', 'Ut aliquam debitis cum quae natus.', 'pending', 'paid', 'cash_on_delivery', '888187.25', '2025-06-03 02:51:03', '2025-06-03 02:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED NOT NULL,
  `variant_price` decimal(15,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `variant_id`, `variant_price`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 10, 9, '877.85', 4, '3511.40', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(2, 15, 13, '683.27', 3, '2049.81', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(3, 7, 11, '417.27', 4, '1669.08', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(4, 11, 12, '509.15', 4, '2036.60', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(5, 4, 18, '148.18', 5, '740.90', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(6, 12, 20, '124.71', 4, '498.84', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(7, 14, 12, '509.15', 1, '509.15', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(8, 2, 5, '205.05', 3, '615.15', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(9, 13, 6, '711.05', 2, '1422.10', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(10, 16, 2, '377.94', 2, '755.88', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(11, 3, 20, '124.71', 4, '498.84', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(12, 7, 14, '580.09', 5, '2900.45', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(13, 14, 1, '676.29', 2, '1352.58', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(14, 19, 11, '417.27', 3, '1251.81', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(15, 17, 4, '147.15', 2, '294.30', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(16, 7, 3, '364.50', 5, '1822.50', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(17, 13, 12, '509.15', 2, '1018.30', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(18, 19, 17, '477.74', 1, '477.74', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(19, 16, 5, '205.05', 5, '1025.25', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(20, 14, 12, '509.15', 2, '1018.30', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(21, 18, 10, '682.26', 4, '2729.04', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(22, 13, 7, '871.71', 1, '871.71', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(23, 14, 15, '141.16', 3, '423.48', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(24, 10, 2, '377.94', 5, '1889.70', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(25, 14, 16, '112.07', 4, '448.28', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(26, 17, 3, '364.50', 4, '1458.00', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(27, 18, 20, '124.71', 3, '374.13', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(28, 17, 7, '871.71', 4, '3486.84', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(29, 14, 13, '683.27', 1, '683.27', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(30, 16, 19, '780.36', 4, '3121.44', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(31, 14, 16, '112.07', 2, '224.14', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(32, 20, 16, '112.07', 1, '112.07', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(33, 1, 5, '205.05', 1, '205.05', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(34, 10, 10, '682.26', 4, '2729.04', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(35, 12, 14, '580.09', 3, '1740.27', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(36, 3, 17, '477.74', 1, '477.74', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(37, 14, 1, '676.29', 4, '2705.16', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(38, 4, 1, '676.29', 4, '2705.16', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(39, 3, 3, '364.50', 1, '364.50', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(40, 10, 15, '141.16', 5, '705.80', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(41, 9, 16, '112.07', 5, '560.35', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(42, 12, 9, '877.85', 5, '4389.25', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(43, 6, 17, '477.74', 5, '2388.70', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(44, 11, 19, '780.36', 2, '1560.72', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(45, 1, 17, '477.74', 1, '477.74', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(46, 12, 19, '780.36', 2, '1560.72', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(47, 10, 18, '148.18', 2, '296.36', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(48, 16, 8, '282.22', 4, '1128.88', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(49, 7, 5, '205.05', 5, '1025.25', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(50, 4, 9, '877.85', 4, '3511.40', '2025-06-03 02:51:03', '2025-06-03 02:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_method`, `amount`, `payment_date`, `created_at`, `updated_at`) VALUES
(1, 21, 'credit_card', '253.38', '2025-05-10 12:26:51', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(2, 22, 'cash_on_delivery', '416.06', '2025-05-19 16:27:33', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(3, 23, 'cash_on_delivery', '344.93', '2025-05-15 12:06:23', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(4, 24, 'paypal', '286.46', '2025-05-07 00:34:51', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(5, 25, 'cash_on_delivery', '497.45', '2025-05-17 04:59:01', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(6, 26, 'paypal', '410.46', '2025-05-17 16:29:09', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(7, 27, 'cash_on_delivery', '188.94', '2025-05-19 13:03:51', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(8, 28, 'credit_card', '143.29', '2025-05-15 08:57:21', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(9, 29, 'paypal', '486.65', '2025-05-27 17:26:20', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(10, 30, 'cash_on_delivery', '205.74', '2025-05-05 16:42:31', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(11, 31, 'paypal', '314.92', '2025-05-30 00:45:54', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(12, 32, 'paypal', '181.12', '2025-05-04 14:40:55', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(13, 33, 'paypal', '131.29', '2025-05-16 16:27:54', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(14, 34, 'cash_on_delivery', '405.26', '2025-05-08 23:52:19', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(15, 35, 'paypal', '253.86', '2025-05-21 11:15:00', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(16, 36, 'credit_card', '340.50', '2025-05-12 10:21:00', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(17, 37, 'cash_on_delivery', '121.10', '2025-05-23 15:51:03', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(18, 38, 'credit_card', '146.68', '2025-05-08 18:25:54', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(19, 39, 'credit_card', '302.23', '2025-05-06 20:54:35', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(20, 40, 'credit_card', '149.83', '2025-05-08 07:55:13', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(21, 41, 'credit_card', '207.32', '2025-05-24 19:41:24', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(22, 43, 'paypal', '218.61', '2025-05-24 06:40:35', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(23, 45, 'paypal', '105.48', '2025-05-20 17:54:15', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(24, 47, 'credit_card', '398.84', '2025-05-25 06:21:32', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(25, 49, 'cash_on_delivery', '200.33', '2025-05-18 15:34:19', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(26, 51, 'credit_card', '284.07', '2025-05-30 23:03:27', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(27, 53, 'credit_card', '278.87', '2025-05-26 11:27:24', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(28, 55, 'credit_card', '270.49', '2025-05-21 10:53:25', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(29, 57, 'credit_card', '396.09', '2025-05-17 07:25:28', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(30, 59, 'credit_card', '83.61', '2025-05-15 01:16:37', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(31, 61, 'paypal', '369.93', '2025-05-04 21:39:04', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(32, 63, 'paypal', '209.02', '2025-05-18 13:44:33', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(33, 65, 'cash_on_delivery', '435.13', '2025-05-29 05:55:15', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(34, 67, 'cash_on_delivery', '414.10', '2025-05-12 07:35:18', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(35, 69, 'paypal', '358.09', '2025-06-02 13:25:59', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(36, 71, 'paypal', '204.32', '2025-05-31 22:14:42', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(37, 73, 'cash_on_delivery', '361.90', '2025-05-29 17:16:18', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(38, 75, 'credit_card', '260.86', '2025-05-28 02:39:29', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(39, 77, 'cash_on_delivery', '76.25', '2025-05-11 20:31:36', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(40, 79, 'cash_on_delivery', '252.90', '2025-05-12 13:04:26', '2025-06-03 02:51:03', '2025-06-03 02:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` timestamp NOT NULL,
  `response_transaction` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_transactions`
--

INSERT INTO `payment_transactions` (`id`, `payment_id`, `order_id`, `gateway`, `transaction_status`, `amount`, `currency`, `transaction_date`, `response_transaction`, `created_at`, `updated_at`) VALUES
(1, 21, 42, 'Stripe', 'failed', '131.36', 'BGN', '2025-06-01 05:38:47', 'Quas recusandae quisquam molestiae nisi sit. Eum excepturi dolore consequatur sit sint. Occaecati velit eius voluptas voluptatem hic cum et. Minus fugiat fuga doloribus alias dolorem.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(2, 22, 44, 'Stripe', 'failed', '913.29', 'RUB', '2024-10-04 02:41:22', 'Temporibus magni consequatur placeat nulla tenetur. Nesciunt occaecati sit impedit sunt recusandae magnam odio. Nisi officiis nihil atque cum eveniet a delectus enim. Reprehenderit quia sequi vitae.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(3, 23, 46, 'Stripe', 'failed', '259.71', 'GMD', '2025-01-28 09:55:40', 'Aut et omnis recusandae et esse rerum sint. Qui ea nulla provident aliquid voluptas aliquam ut. Repudiandae voluptatibus placeat totam sunt unde sed rerum at.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(4, 24, 48, 'Stripe', 'pending', '931.17', 'GMD', '2024-10-12 06:19:01', NULL, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(5, 25, 50, 'PayPal', 'pending', '115.10', 'BHD', '2025-04-09 16:01:38', 'Ea ea sed rerum eum. Recusandae illum molestias dolore praesentium veniam praesentium quia. Sed sint est quas et aut. Quia similique voluptatem eius aspernatur doloremque. Eaque aut quos natus est.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(6, 26, 52, 'PayPal', 'pending', '507.73', 'VES', '2024-11-08 04:33:22', 'Iste provident dicta repellat. Dicta quisquam quo neque sapiente optio. Facilis et quas totam id.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(7, 27, 54, 'PayPal', 'success', '908.50', 'BDT', '2025-01-04 12:20:48', NULL, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(8, 28, 56, 'VNPAY', 'pending', '113.23', 'BYN', '2025-05-04 04:11:46', NULL, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(9, 29, 58, 'PayPal', 'success', '716.27', 'OMR', '2024-12-24 20:51:43', NULL, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(10, 30, 60, 'Stripe', 'success', '879.42', 'TMT', '2025-05-20 19:20:32', 'Officiis labore vel dignissimos omnis modi enim corrupti. Beatae molestiae hic illum quisquam voluptas voluptate. Laudantium rerum odio optio quod voluptas. Earum alias rerum sit quo hic.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(11, 31, 62, 'PayPal', 'failed', '641.42', 'MYR', '2025-04-29 10:05:59', NULL, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(12, 32, 64, 'PayPal', 'failed', '483.24', 'BWP', '2024-09-14 16:23:05', NULL, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(13, 33, 66, 'Stripe', 'failed', '964.36', 'NGN', '2024-12-29 06:11:34', 'Dolore itaque enim fugiat hic magnam est at. Quas fugit voluptas repellendus aut ea quae aut. Dolores placeat est repellendus aut. Impedit deleniti enim et.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(14, 34, 68, 'VNPAY', 'success', '272.99', 'TWD', '2025-04-18 20:21:33', 'Illo est vero enim doloribus. Aut minus eveniet voluptas enim asperiores ad. Ipsum dolorem nobis doloribus asperiores voluptates.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(15, 35, 70, 'PayPal', 'failed', '953.69', 'LKR', '2024-06-21 13:55:54', 'Debitis quod saepe numquam odit repellendus qui rerum. Repellat consequatur commodi voluptatibus fugiat. Corporis quidem officiis consectetur odit praesentium.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(16, 36, 72, 'Stripe', 'failed', '710.86', 'MDL', '2024-11-08 21:15:17', 'Et dignissimos doloremque accusamus dolorem est. Illo minima cumque autem debitis earum consequuntur iure.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(17, 37, 74, 'Stripe', 'pending', '766.54', 'SOS', '2025-05-16 01:32:02', NULL, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(18, 38, 76, 'Stripe', 'pending', '964.81', 'FJD', '2024-10-29 03:35:04', NULL, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(19, 39, 78, 'PayPal', 'success', '732.13', 'CAD', '2025-02-13 04:52:57', 'Quia omnis aut quam corporis sit eveniet. Iure aut earum amet minus sed modi quia aut. Voluptatum rem ut voluptas autem quis. Voluptatem consequatur itaque necessitatibus dolorem omnis odit quisquam.', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(20, 40, 80, 'PayPal', 'pending', '982.92', 'MGA', '2024-10-14 19:21:41', NULL, '2025-06-03 02:51:03', '2025-06-03 02:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint UNSIGNED NOT NULL,
  `base_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `base_price`, `created_at`, `updated_at`) VALUES
(1, 'dolores eum eos', 'Consequatur earum vel ab quis exercitationem eum veniam et. Sit atque quas deleniti quo molestiae saepe. Minima amet et reiciendis dolores quaerat. Recusandae eos natus sint ut ipsam quam.', 27, 77876, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(2, 'beatae quasi ea', 'Placeat temporibus soluta esse nisi dolores et aperiam quia. Praesentium quia est numquam dicta est. Et fugiat rerum et consequuntur. Earum itaque quia officia est dolor praesentium vel.', 5, 336306, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(3, 'quod qui eligendi', 'Quisquam distinctio ut fugiat excepturi esse. Quisquam sed tenetur eius dolorem aperiam nisi aut. Impedit eum accusantium aut.', 9, 340722, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(4, 'ratione nisi sed', 'Ducimus fuga ipsum quis similique. Fuga placeat ab tempore assumenda deleniti. Dolorem consequatur veritatis consequatur velit.', 30, 506749, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(5, 'similique natus ipsa', 'Molestiae temporibus vel qui unde est. Voluptas ipsum voluptas nulla deserunt accusamus. Et magnam quos est sint velit consequatur ut. Quibusdam tenetur inventore ex nemo debitis unde rem corrupti.', 15, 657990, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(6, 'voluptatum fugit non', 'Voluptatem aliquam officiis eligendi. Ipsam sapiente sed delectus veniam. Eum nam rerum ut qui.', 27, 899347, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(7, 'quod eligendi provident', 'Temporibus nobis cumque officiis facilis aut quod esse. Ut quis non quis omnis fuga asperiores et.', 5, 950771, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(8, 'quae est ab', 'Cupiditate aut ut dolorum voluptatem fuga. Enim velit ipsa ratione et accusamus nihil. Optio eum numquam molestiae et omnis error pariatur.', 8, 946232, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(9, 'est at est', 'Ut qui itaque est minima. Consequatur ullam harum sit nulla consequatur. Minus sint voluptas et qui. Perferendis in ea ipsam cumque sit. Eos explicabo expedita reprehenderit labore.', 10, 261563, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(10, 'laudantium blanditiis blanditiis', 'Sunt numquam eligendi nam voluptatum temporibus deleniti et. Minima illo autem dicta veniam aut. Accusantium et hic blanditiis dolores aliquid nam. Deleniti placeat dicta aut veritatis odio ut aliquam.', 28, 179817, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(11, 'iure ea qui', 'Assumenda sit molestiae facilis sit unde voluptas aliquid. Reprehenderit et in enim quia tenetur quasi. Rerum qui beatae enim voluptatum rerum veritatis tempora et.', 23, 56627, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(12, 'dolore fugiat quo', 'Unde consequuntur est facilis. Nesciunt provident qui dolorum non quasi. Sint eum laudantium in numquam et cum.', 20, 984415, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(13, 'magnam quo repudiandae', 'Dolor non harum aperiam vero aut. Eos dolorum omnis enim non sit vero. Aut repellat reprehenderit et quia qui ea dolores. Hic odit facere fuga. Modi est quo distinctio explicabo harum natus qui.', 17, 335923, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(14, 'ducimus id tempore', 'Necessitatibus atque facere ex aliquid ducimus et ad. Consequatur officia reprehenderit quaerat fugiat aliquam. Debitis voluptates perspiciatis aliquam veniam doloremque possimus. Sunt tempore necessitatibus labore doloribus nostrum. Ullam dolore ut veniam rem animi officiis.', 10, 796587, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(15, 'error porro officia', 'Quia unde deleniti ratione reiciendis. Ea dolor accusamus facilis est illo. Beatae nesciunt sunt eaque ducimus et ipsa.', 6, 978182, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(16, 'sint alias laboriosam', 'Illum illum harum libero at animi. Aut quasi et labore voluptatem esse. Sed quia nihil sint voluptate.', 21, 855705, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(17, 'ducimus eligendi voluptatem', 'Quo dolorem consequatur nesciunt. Iusto sed esse et architecto dolorem cum vel. Aliquam sequi sit aut sunt vel. Sint nobis error sit ea dicta soluta.', 27, 514729, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(18, 'enim sit quis', 'Sint architecto suscipit dolorem ut et omnis itaque. Molestiae saepe consequatur perferendis et rerum. Est rem officiis assumenda commodi deserunt et atque inventore. Illum sit fugit quaerat ut.', 25, 28664, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(19, 'aliquid quia deserunt', 'Optio ut neque dolor explicabo. Consequuntur quo sit voluptatum. Velit commodi modi ipsam facilis illum. Voluptates consequatur delectus id eum sint consequatur quibusdam.', 18, 751999, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(20, 'omnis unde molestias', 'Quis eveniet asperiores et. Dolore sit ut dolorum veritatis et. Ratione quidem et maiores enim in quia et.', 23, 515673, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(21, 'quis reiciendis perferendis', 'Non iste in quidem et dolores vero. Possimus repellat repudiandae repudiandae accusamus voluptates est impedit. Et rerum id quaerat animi.', 5, 261773, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(22, 'quas voluptatem dolorem', 'Consequatur ipsam laudantium illum in. Neque laudantium ducimus officiis voluptas repellat vel. Qui architecto qui molestias odio.', 21, 234954, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(23, 'quo et earum', 'Fugit aliquid quo reprehenderit et quos. Autem commodi ut et. Quaerat omnis error reiciendis delectus delectus aliquam. Alias ipsam ratione temporibus quisquam ab ex odit.', 8, 889787, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(24, 'maiores veritatis tempora', 'Itaque molestias modi ducimus iusto cupiditate praesentium voluptatibus molestiae. Enim natus possimus adipisci similique vel. Rerum reprehenderit aperiam qui quaerat veniam tempora blanditiis velit. Veritatis recusandae laborum odit aut quod fugiat.', 5, 568160, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(25, 'voluptas harum et', 'Vel rerum hic aut. Eos suscipit et quos vero nemo. Consequatur est est consequatur vitae debitis. Qui debitis ut repellat dolor animi rerum quod nostrum.', 12, 477836, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(26, 'aliquam expedita at', 'Inventore ut unde magnam voluptatem eum. Iure dignissimos sit cum. Et quia enim fuga qui maiores et.', 17, 57451, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(27, 'et architecto odit', 'Omnis vero sunt sunt soluta qui maiores. Tempora rerum in expedita repellendus.', 14, 972662, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(28, 'eaque doloremque dolorem', 'Ut illum sapiente eum hic error. Error qui et non ratione qui. Nesciunt itaque voluptate dicta autem.', 27, 110352, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(29, 'id sit est', 'Perspiciatis perferendis delectus saepe tempora qui rem voluptatem. Autem nostrum est dolor. Numquam est et nisi minus porro quia.', 29, 244028, '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(30, 'et iste perferendis', 'Laudantium sint incidunt veniam itaque nobis nesciunt neque harum. Debitis consequatur sit incidunt. Delectus magnam nostrum temporibus quia omnis quia magni. Ipsum consequatur laboriosam et. Repudiandae esse asperiores qui officia sed officiis.', 18, 938760, '2025-06-03 02:51:02', '2025-06-03 02:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `path`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/products/', 1, '2025-06-03 02:52:07', '2025-06-03 02:52:07'),
(2, 1, 'images/products/', 0, '2025-06-03 02:52:07', '2025-06-03 02:52:07'),
(3, 1, 'images/products/', 0, '2025-06-03 02:52:07', '2025-06-03 02:52:07'),
(4, 2, 'images/products/', 0, '2025-06-03 02:53:10', '2025-06-03 02:53:10'),
(5, 2, 'images/products/', 1, '2025-06-03 02:53:10', '2025-06-03 02:53:10'),
(6, 2, 'images/products/', 0, '2025-06-03 02:53:10', '2025-06-03 02:53:10'),
(7, 3, 'images/products/', 1, '2025-06-03 02:54:13', '2025-06-03 02:54:13'),
(8, 3, 'images/products/', 0, '2025-06-03 02:54:13', '2025-06-03 02:54:13'),
(9, 3, 'images/products/', 1, '2025-06-03 02:54:13', '2025-06-03 02:54:13'),
(10, 4, 'images/products/', 0, '2025-06-03 02:55:17', '2025-06-03 02:55:17'),
(11, 4, 'images/products/', 1, '2025-06-03 02:55:17', '2025-06-03 02:55:17'),
(12, 4, 'images/products/', 0, '2025-06-03 02:55:17', '2025-06-03 02:55:17'),
(13, 5, 'images/products/', 1, '2025-06-03 02:56:20', '2025-06-03 02:56:20'),
(14, 5, 'images/products/', 0, '2025-06-03 02:56:20', '2025-06-03 02:56:20'),
(15, 5, 'images/products/', 0, '2025-06-03 02:56:20', '2025-06-03 02:56:20'),
(16, 6, 'images/products/', 0, '2025-06-03 02:57:23', '2025-06-03 02:57:23'),
(17, 6, 'images/products/', 0, '2025-06-03 02:57:23', '2025-06-03 02:57:23'),
(18, 6, 'images/products/', 0, '2025-06-03 02:57:23', '2025-06-03 02:57:23'),
(19, 7, 'images/products/', 1, '2025-06-03 02:58:26', '2025-06-03 02:58:26'),
(20, 7, 'images/products/', 0, '2025-06-03 02:58:26', '2025-06-03 02:58:26'),
(21, 7, 'images/products/', 1, '2025-06-03 02:58:26', '2025-06-03 02:58:26'),
(22, 8, 'images/products/', 0, '2025-06-03 02:59:29', '2025-06-03 02:59:29'),
(23, 8, 'images/products/', 0, '2025-06-03 02:59:29', '2025-06-03 02:59:29'),
(24, 8, 'images/products/', 0, '2025-06-03 02:59:29', '2025-06-03 02:59:29'),
(25, 9, 'images/products/', 0, '2025-06-03 03:00:32', '2025-06-03 03:00:32'),
(26, 9, 'images/products/', 0, '2025-06-03 03:00:32', '2025-06-03 03:00:32'),
(27, 9, 'images/products/', 0, '2025-06-03 03:00:32', '2025-06-03 03:00:32'),
(28, 10, 'images/products/', 0, '2025-06-03 03:01:36', '2025-06-03 03:01:36'),
(29, 10, 'images/products/', 1, '2025-06-03 03:01:36', '2025-06-03 03:01:36'),
(30, 10, 'images/products/', 0, '2025-06-03 03:01:36', '2025-06-03 03:01:36'),
(31, 11, 'images/products/', 0, '2025-06-03 03:02:39', '2025-06-03 03:02:39'),
(32, 11, 'images/products/', 1, '2025-06-03 03:02:39', '2025-06-03 03:02:39'),
(33, 11, 'images/products/', 0, '2025-06-03 03:02:39', '2025-06-03 03:02:39'),
(34, 12, 'images/products/', 0, '2025-06-03 03:03:43', '2025-06-03 03:03:43'),
(35, 12, 'images/products/', 1, '2025-06-03 03:03:43', '2025-06-03 03:03:43'),
(36, 12, 'images/products/', 0, '2025-06-03 03:03:43', '2025-06-03 03:03:43'),
(37, 13, 'images/products/', 1, '2025-06-03 03:04:46', '2025-06-03 03:04:46'),
(38, 13, 'images/products/', 0, '2025-06-03 03:04:46', '2025-06-03 03:04:46'),
(39, 13, 'images/products/', 0, '2025-06-03 03:04:46', '2025-06-03 03:04:46'),
(40, 14, 'images/products/', 0, '2025-06-03 03:05:49', '2025-06-03 03:05:49'),
(41, 14, 'images/products/', 0, '2025-06-03 03:05:49', '2025-06-03 03:05:49'),
(42, 14, 'images/products/', 0, '2025-06-03 03:05:49', '2025-06-03 03:05:49'),
(43, 15, 'images/products/', 0, '2025-06-03 03:06:52', '2025-06-03 03:06:52'),
(44, 15, 'images/products/', 0, '2025-06-03 03:06:52', '2025-06-03 03:06:52'),
(45, 15, 'images/products/', 0, '2025-06-03 03:06:52', '2025-06-03 03:06:52'),
(46, 16, 'images/products/', 1, '2025-06-03 03:07:55', '2025-06-03 03:07:55'),
(47, 16, 'images/products/', 0, '2025-06-03 03:07:55', '2025-06-03 03:07:55'),
(48, 16, 'images/products/', 1, '2025-06-03 03:07:55', '2025-06-03 03:07:55'),
(49, 17, 'images/products/', 0, '2025-06-03 03:08:58', '2025-06-03 03:08:58'),
(50, 17, 'images/products/', 1, '2025-06-03 03:08:58', '2025-06-03 03:08:58'),
(51, 17, 'images/products/', 1, '2025-06-03 03:08:58', '2025-06-03 03:08:58'),
(52, 18, 'images/products/', 0, '2025-06-03 03:10:02', '2025-06-03 03:10:02'),
(53, 18, 'images/products/', 0, '2025-06-03 03:10:02', '2025-06-03 03:10:02'),
(54, 18, 'images/products/', 1, '2025-06-03 03:10:02', '2025-06-03 03:10:02'),
(55, 19, 'images/products/', 0, '2025-06-03 03:11:05', '2025-06-03 03:11:05'),
(56, 19, 'images/products/', 1, '2025-06-03 03:11:05', '2025-06-03 03:11:05'),
(57, 19, 'images/products/', 1, '2025-06-03 03:11:05', '2025-06-03 03:11:05'),
(58, 20, 'images/products/', 0, '2025-06-03 03:12:08', '2025-06-03 03:12:08'),
(59, 20, 'images/products/', 0, '2025-06-03 03:12:08', '2025-06-03 03:12:08'),
(60, 20, 'images/products/', 1, '2025-06-03 03:12:08', '2025-06-03 03:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Id tempore doloremque veniam doloribus.', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(2, 'staff', 'Dolores sint dolorem qui ipsam quibusdam quo.', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(3, 'admin', 'Quod tempora earum consectetur ab id qui rerum repellendus.', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(4, 'staff', 'Aut rem suscipit commodi odio iure.', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(5, 'admin', 'Provident et quis doloremque facilis est at accusantium non.', '2025-06-03 02:51:02', '2025-06-03 02:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Lqqjr30JQ4BXFrZoFqZLZDdoCxGd9Oxjb2xYC6UE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFZsZGxMVnVOc2l1ZDBDYzhrcVFFUGp0U2wwYkExTWF5VmRXbG1HMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748944861);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `address`, `role_id`, `is_active`, `created_at`, `updated_at`, `email_verified_at`, `remember_token`) VALUES
(1, 'Aric Moen', 'lcollins@example.org', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 2, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', 'UL37xQAtv8'),
(2, 'Prof. Lonnie Koelpin Jr.', 'alaina.moore@example.net', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 1, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', 'AISZM21zGi'),
(3, 'Ms. Dakota Nitzsche III', 'white.brandyn@example.org', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 4, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', 'T04ZUY3ZYk'),
(4, 'Mozelle Hammes', 'streich.lauren@example.org', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 2, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', 'U4ej2guMHx'),
(5, 'Ernest Fay PhD', 'freeman92@example.org', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 1, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', '5HzbGwKjVL'),
(6, 'Jordon Ward', 'kuhn.maurice@example.com', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 4, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', '57O60BykXz'),
(7, 'Francisco Simonis PhD', 'dayton.west@example.org', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 2, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', 'rqHWkPS67e'),
(8, 'Ottilie Schaden', 'wellington.casper@example.net', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 2, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', 'QVl0u3oczf'),
(9, 'Mathias Feil IV', 'uweissnat@example.net', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 4, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', 'UIPy2gXkkr'),
(10, 'Opal Boehm', 'pierce.mills@example.net', NULL, '$2y$12$S3iQeCAGcoG9vVXCfGE05OnJUZWwqtMi.TFqLEQ0utCh89WgWtocC', NULL, 4, 1, '2025-06-03 02:51:02', '2025-06-03 02:51:02', '2025-06-03 02:51:02', 'eCoLhY9mnG');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `product_id`, `price`, `stock_quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, '676.29', 61, 'out_of_stock', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(2, 12, '377.94', 36, 'active', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(3, 13, '364.50', 39, 'out_of_stock', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(4, 14, '147.15', 34, 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(5, 15, '205.05', 9, 'inactive', '2025-06-03 02:51:02', '2025-06-03 02:51:02'),
(6, 16, '711.05', 95, 'active', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(7, 17, '871.71', 51, 'out_of_stock', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(8, 18, '282.22', 79, 'out_of_stock', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(9, 19, '877.85', 48, 'inactive', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(10, 20, '682.26', 57, 'active', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(11, 21, '417.27', 74, 'out_of_stock', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(12, 22, '509.15', 52, 'active', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(13, 23, '683.27', 2, 'out_of_stock', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(14, 24, '580.09', 96, 'inactive', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(15, 25, '141.16', 20, 'inactive', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(16, 26, '112.07', 31, 'inactive', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(17, 27, '477.74', 17, 'out_of_stock', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(18, 28, '148.18', 85, 'active', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(19, 29, '780.36', 48, 'inactive', '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(20, 30, '124.71', 81, 'inactive', '2025-06-03 02:51:03', '2025-06-03 02:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `variant_attributes`
--

CREATE TABLE `variant_attributes` (
  `variant_attributes_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED NOT NULL,
  `attribute_value_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variant_attributes`
--

INSERT INTO `variant_attributes` (`variant_attributes_id`, `variant_id`, `attribute_value_id`, `created_at`, `updated_at`) VALUES
(1, 11, 14, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(2, 18, 18, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(3, 7, 3, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(4, 18, 15, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(5, 15, 1, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(6, 9, 17, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(7, 18, 12, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(8, 16, 12, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(9, 3, 18, '2025-06-03 02:51:03', '2025-06-03 02:51:03'),
(10, 11, 8, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(11, 14, 6, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(12, 7, 13, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(13, 1, 17, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(14, 10, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(15, 16, 11, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(16, 11, 13, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(17, 20, 19, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(18, 13, 11, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(19, 2, 9, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(20, 15, 11, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(21, 16, 20, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(22, 2, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(23, 11, 6, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(24, 15, 20, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(25, 8, 10, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(26, 14, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(27, 9, 14, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(28, 16, 9, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(29, 8, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(30, 20, 2, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(31, 10, 19, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(32, 5, 4, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(33, 6, 5, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(34, 4, 20, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(35, 13, 7, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(36, 2, 9, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(37, 1, 3, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(38, 13, 8, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(39, 10, 18, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(40, 20, 13, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(41, 11, 18, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(42, 11, 15, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(43, 3, 19, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(44, 7, 19, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(45, 4, 20, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(46, 1, 9, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(47, 10, 17, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(48, 2, 12, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(49, 10, 20, '2025-06-03 02:51:04', '2025-06-03 02:51:04'),
(50, 17, 12, '2025-06-03 02:51:04', '2025-06-03 02:51:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes_values`
--
ALTER TABLE `attributes_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributes_values_attribute_id_foreign` (`attribute_id`);

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_variant_id_foreign` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_variant_id_foreign` (`variant_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_transactions_payment_id_foreign` (`payment_id`),
  ADD KEY `payment_transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `variant_attributes`
--
ALTER TABLE `variant_attributes`
  ADD PRIMARY KEY (`variant_attributes_id`),
  ADD KEY `variant_attributes_variant_id_foreign` (`variant_id`),
  ADD KEY `variant_attributes_attribute_value_id_foreign` (`attribute_value_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `attributes_values`
--
ALTER TABLE `attributes_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `variant_attributes`
--
ALTER TABLE `variant_attributes`
  MODIFY `variant_attributes_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributes_values`
--
ALTER TABLE `attributes_values`
  ADD CONSTRAINT `attributes_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD CONSTRAINT `payment_transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `products_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variant_attributes`
--
ALTER TABLE `variant_attributes`
  ADD CONSTRAINT `variant_attributes_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attributes_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `variant_attributes_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
