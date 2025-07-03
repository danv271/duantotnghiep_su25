-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2025 at 03:50 AM
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
(1, 'Gender', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(2, 'Weight', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(3, 'Material', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(4, 'Brand', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(5, 'Gender', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(6, 'Style', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(7, 'Brand', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(8, 'Weight', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(9, 'Weight', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(10, 'Gender', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(11, 'Color', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(12, 'Weight', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(13, 'Style', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(14, 'Color', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(15, 'Size', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(16, 'Brand', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(17, 'Color', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(18, 'Style', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(19, 'Color', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(20, 'Weight', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(21, 'Color', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(22, 'Gender', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(23, 'Weight', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(24, 'Style', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(25, 'Gender', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(26, 'Style', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(27, 'Style', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(28, 'Gender', '2025-07-02 20:12:00', '2025-07-02 20:12:00');

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
(1, 9, 'voluptas', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(2, 10, 'in', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(3, 11, 'deleniti', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(4, 12, 'reprehenderit', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(5, 13, 'nostrum', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(6, 14, 'natus', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(7, 15, 'optio', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(8, 16, 'et', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(9, 17, 'ullam', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(10, 18, 'velit', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(11, 19, 'vel', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(12, 20, 'eaque', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(13, 21, 'et', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(14, 22, 'pariatur', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(15, 23, 'qui', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(16, 24, 'pariatur', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(17, 25, 'iusto', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(18, 26, 'eligendi', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(19, 27, 'autem', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(20, 28, 'autem', '2025-07-02 20:12:00', '2025-07-02 20:12:00');

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_quantity` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `total_quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 2, 16, 556028, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(2, 1, 14, 536915, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(3, 10, 4, 150906, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(4, 5, 7, 723496, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(5, 1, 11, 305423, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(6, 6, 5, 410811, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(7, 4, 19, 794215, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(8, 4, 10, 617831, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(9, 2, 19, 898620, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(10, 5, 10, 105504, '2025-07-02 20:12:01', '2025-07-02 20:12:01');

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
(1, 3, 11, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(2, 9, 8, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(3, 4, 12, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(4, 10, 7, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(5, 9, 13, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(6, 10, 14, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(7, 9, 10, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(8, 6, 12, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(9, 4, 16, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(10, 4, 14, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(11, 5, 17, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(12, 1, 12, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(13, 8, 1, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(14, 4, 5, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(15, 1, 3, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(16, 1, 8, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(17, 9, 19, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(18, 7, 1, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(19, 10, 2, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(20, 2, 20, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(21, 10, 16, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(22, 2, 12, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(23, 3, 10, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(24, 6, 15, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(25, 10, 18, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(26, 6, 5, 4, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(27, 5, 20, 4, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(28, 5, 5, 4, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(29, 2, 15, 4, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(30, 6, 14, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(31, 7, 5, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(32, 10, 3, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(33, 1, 5, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(34, 3, 20, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(35, 9, 3, 4, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(36, 7, 5, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(37, 4, 6, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(38, 5, 9, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(39, 1, 19, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(40, 8, 11, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(41, 4, 19, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(42, 9, 5, 4, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(43, 7, 6, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(44, 10, 17, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(45, 4, 8, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(46, 10, 2, 4, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(47, 7, 2, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(48, 3, 20, 4, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(49, 2, 5, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(50, 3, 10, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_category_id`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sit in', NULL, 'Ipsum nam nobis officiis quis et autem.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(2, 'aliquam nesciunt', NULL, 'Est sed blanditiis nostrum impedit aliquid commodi et.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(3, 'distinctio voluptatum', NULL, 'Autem hic numquam quas voluptatum.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(4, 'quae qui', NULL, 'In rerum atque aspernatur explicabo quae animi.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(5, 'rerum sunt', NULL, 'Perspiciatis nostrum soluta consequatur est iure itaque.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(6, 'sed quidem', NULL, 'Quos distinctio amet officia voluptas aut vero aut.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(7, 'aut velit', NULL, 'Explicabo ducimus molestiae est.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(8, 'qui explicabo', NULL, 'Qui praesentium ratione repellat porro cupiditate.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(9, 'quam veniam', NULL, 'Voluptatibus omnis dolor autem sit ex.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(10, 'optio blanditiis', NULL, 'Temporibus atque temporibus nisi nemo autem asperiores.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(11, 'officiis enim', NULL, 'At quis et mollitia sit eos non.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(12, 'pariatur sed', NULL, 'Debitis neque qui ut nisi deserunt qui omnis.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(13, 'voluptatem ea', NULL, 'Et voluptatum corrupti hic numquam unde praesentium dolores similique.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(14, 'odio sit', NULL, 'Ex pariatur et adipisci sed.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(15, 'aut aut', NULL, 'Enim pariatur repellat illo laborum illo.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(16, 'nihil illo', NULL, 'Non enim et inventore vitae.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(17, 'ut id', NULL, 'Cum a itaque eos.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(18, 'odio et', NULL, 'Vero quidem officia velit sit pariatur debitis sint.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(19, 'in dolore', NULL, 'Eum aut est tempora inventore et voluptatem.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(20, 'velit aut', NULL, 'Dignissimos necessitatibus quaerat placeat et consectetur omnis voluptas.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(21, 'iure sed', NULL, 'Et sit dolores et hic vero.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(22, 'quasi necessitatibus', NULL, 'Facere voluptas nesciunt nisi sit ut aliquid.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(23, 'libero voluptatem', NULL, 'Dolore omnis et sit quia quod.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(24, 'vel voluptatem', NULL, 'Adipisci sunt error iure est assumenda.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(25, 'voluptatibus et', NULL, 'Explicabo accusantium iure quo optio vel nesciunt.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(26, 'at id', NULL, 'Quas voluptatem tempora reiciendis delectus.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(27, 'accusantium dolore', NULL, 'Consequatur qui voluptatibus voluptatem incidunt.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(28, 'ipsa atque', NULL, 'Sapiente in et ea tenetur doloremque ea aut.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(29, 'ut nihil', NULL, 'Et odit veniam eos numquam esse.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(30, 'ad iste', NULL, 'Sint quis temporibus tenetur quia.', 'active', NULL, '2025-07-02 20:11:59', '2025-07-02 20:11:59');

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
(15, '2025_05_31_144703_create_carts_table', 1),
(16, '2025_05_31_144734_create_cart_items_table', 1),
(17, '2025_06_02_073710_create_products_images_table', 1),
(18, '2025_06_04_030718_add_avatar_to_users_table', 1),
(19, '2025_06_09_030306_create_otp_codes_tables', 1),
(20, '2025_06_25_153213_add_to_role_id_and_is_active_to_users_table', 1);

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
(1, 4, 'dora96@example.net', '+1-281-692-3296', '109 Legros Vista\nDonnellyshire, MA 40679-4944', 'Ex esse in debitis maiores nihil enim facilis aliquid.', 'shipped', 'paid', 'paypal', '199087.05', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(2, 6, 'tommie29@example.com', '1-501-297-3992', '80750 Harber Burgs\nLake Victoria, WY 41214', 'Saepe magnam quasi et natus ipsa pariatur in possimus.', 'cancelled', 'paid', 'paypal', '1629607.09', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(3, 4, 'wisozk.maxie@example.com', '872.248.6852', '48689 Goyette Flat Apt. 342\nJosieside, IN 74946', 'Ullam voluptates sunt quas dignissimos consequuntur debitis sequi nulla.', 'pending', 'unpaid', 'cash_on_delivery', '235123.29', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(4, 7, 'marilou24@example.net', '+18628350864', '245 Jaskolski Fields\nPort Vivienne, WI 01242-7655', 'Explicabo sit sit eum saepe.', 'shipped', 'paid', 'paypal', '1237490.93', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(5, 10, 'bspencer@example.net', '682-343-6201', '51022 Bradley Cliff Apt. 909\nKesslerhaven, KY 25063', 'Corporis porro sint voluptatum nihil.', 'shipped', 'unpaid', 'paypal', '567046.67', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(6, 10, 'rosella.barrows@example.org', '+1-321-758-5103', '6134 Electa Crossroad\nHymanport, WV 78459', 'Est ratione animi ut commodi et amet.', 'shipped', 'unpaid', 'credit_card', '1643088.37', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(7, 3, 'haag.ashly@example.net', '+1-458-673-8832', '36425 Amanda Shoal Suite 713\nHassanfurt, AK 86709-1457', 'Magni sit amet blanditiis earum non saepe.', 'pending', 'paid', 'paypal', '1098395.45', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(8, 9, 'king.thompson@example.org', '+18048361277', '150 Douglas Crossroad\nLake Dylan, VA 91602-0048', 'Sed ex soluta voluptates ad est.', 'cancelled', 'paid', 'cash_on_delivery', '740289.30', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(9, 2, 'ankunding.marie@example.org', '959.353.6760', '92011 Muhammad Fords Suite 633\nRaoultown, ME 55274', 'Qui architecto a unde voluptate repellendus.', 'processing', 'paid', 'paypal', '905421.10', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(10, 1, 'garrison.becker@example.org', '+1-830-586-0149', '96517 Gutmann Mountains Apt. 160\nSipesshire, CO 06639-2562', 'Nihil necessitatibus quasi delectus doloribus ducimus sunt libero reprehenderit.', 'cancelled', 'unpaid', 'cash_on_delivery', '1031005.30', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(11, 2, 'kuhlman.ophelia@example.org', '1-409-804-4210', '264 Gino Fords Suite 063\nHuelsview, KS 54149-7121', 'Ex explicabo cupiditate architecto corrupti eveniet maiores.', 'processing', 'paid', 'paypal', '662073.44', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(12, 2, 'laron.dooley@example.com', '1-985-216-8788', '5085 Giovani River\nDillonview, TX 14381', 'Magnam itaque eveniet est consectetur aut aliquid consequatur.', 'shipped', 'paid', 'credit_card', '1622533.08', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(13, 2, 'melvin06@example.com', '(530) 336-8387', '962 Hoppe Club Suite 704\nBeverlyhaven, CT 54997', 'Vel vel dolore molestiae nihil nostrum facilis ex voluptates.', 'processing', 'paid', 'cash_on_delivery', '1559386.30', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(14, 1, 'solon70@example.net', '+1.680.599.4532', '64889 Quigley Way\nNew Sabryna, RI 84906', 'Quae voluptatem repellat ipsa saepe provident.', 'cancelled', 'paid', 'credit_card', '1983535.73', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(15, 9, 'lolita.gaylord@example.net', '+13473993558', '39563 Enrique Rest Suite 837\nMiguelmouth, LA 69023-1614', 'Ipsam quae voluptatem mollitia a.', 'processing', 'paid', 'cash_on_delivery', '630887.24', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(16, 2, 'celia.cummings@example.org', '352-298-0897', '623 Miracle Bypass\nLake Enaburgh, VT 33876-4094', 'Fugit et quia aut iste nesciunt.', 'pending', 'unpaid', 'cash_on_delivery', '1143264.46', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(17, 4, 'hkeebler@example.org', '567.677.5802', '2407 Ledner Roads Suite 229\nKohlerville, HI 97959', 'Ea nostrum et quas fugiat qui.', 'pending', 'unpaid', 'cash_on_delivery', '356078.79', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(18, 8, 'keaton34@example.org', '+1-423-310-4828', '77353 Herzog Points Suite 064\nWest Asaburgh, VT 08393-0907', 'Rerum molestias sint quia sit.', 'shipped', 'unpaid', 'credit_card', '177160.83', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(19, 3, 'tillman41@example.com', '267.893.4456', '86741 Stuart Center Apt. 119\nWest Earnestinefurt, ND 70541-7744', 'Unde eius mollitia et eius officiis sit.', 'shipped', 'paid', 'paypal', '637299.34', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(20, 7, 'aniya.christiansen@example.net', '+1.615.284.9882', '43398 Delilah Route Apt. 811\nSporerfurt, OH 34902', 'Qui dignissimos voluptas nihil occaecati molestiae qui asperiores.', 'pending', 'paid', 'credit_card', '914751.98', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(21, 10, 'antwon.dibbert@example.net', '(989) 517-5122', '7730 Mohr Center Suite 123\nSouth Stephania, DC 55220', 'Sunt ipsa nobis voluptatem deleniti.', 'shipped', 'paid', 'cash_on_delivery', '248576.27', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(22, 3, 'crussel@example.org', '(701) 660-6389', '4275 Lynn Shoal\nNorth Marilynefort, TX 44420-9564', 'Accusantium delectus ea id vel nam quia.', 'cancelled', 'unpaid', 'cash_on_delivery', '1925828.53', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(23, 5, 'dmertz@example.net', '+1-434-383-1789', '380 Schoen Rapid\nMurrayville, KY 00102', 'Eum soluta ratione beatae error.', 'processing', 'unpaid', 'paypal', '1912559.02', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(24, 4, 'aschmitt@example.net', '+1-952-682-2002', '4977 Nikko Ways Apt. 630\nNew Lorenzburgh, AK 55945', 'Quis atque est est nobis animi voluptates asperiores.', 'cancelled', 'unpaid', 'credit_card', '1924337.46', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(25, 10, 'king.isadore@example.net', '385.943.3897', '3783 Boyer Common\nZemlakton, HI 71280', 'Eligendi qui atque consectetur rem ea reprehenderit ut.', 'pending', 'unpaid', 'cash_on_delivery', '1383986.47', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(26, 1, 'theodore09@example.net', '1-973-802-6743', '5592 Robel Fork\nCletusport, IL 11189-5820', 'Ullam nihil in et quia iure ex.', 'cancelled', 'paid', 'paypal', '1033226.64', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(27, 6, 'abbey19@example.net', '231-497-0460', '524 Vivienne Curve\nWuckertborough, WY 24159-0489', 'Et quidem aut illum consequatur deleniti voluptatem eligendi.', 'processing', 'unpaid', 'cash_on_delivery', '1003621.37', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(28, 3, 'boyle.adelia@example.net', '669-669-7363', '729 Americo Cape Apt. 225\nRhiannamouth, RI 26817', 'Vero doloribus provident rerum et magni neque.', 'shipped', 'unpaid', 'paypal', '939546.04', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(29, 5, 'jeramie.jast@example.com', '+1-678-244-7245', '12008 Ken Glens Apt. 129\nSouth Leilani, ND 61687', 'Iure culpa nam animi magnam maxime suscipit in ut.', 'pending', 'paid', 'paypal', '1798774.38', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(30, 1, 'deshaun.hermiston@example.com', '347.945.3459', '9725 Schulist Gateway Suite 423\nNorth Madysonfort, NH 37442', 'Ea exercitationem qui enim necessitatibus.', 'cancelled', 'unpaid', 'cash_on_delivery', '1342060.39', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(31, 4, 'gregorio94@example.net', '+1.304.339.6004', '551 Treutel Ford Suite 028\nPort Darwinfort, VA 67639-8256', 'Eos et quibusdam delectus quisquam nihil non quibusdam.', 'cancelled', 'unpaid', 'cash_on_delivery', '1486926.51', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(32, 3, 'lharvey@example.net', '(938) 765-3979', '642 Leo Neck\nLake Retachester, NC 17584', 'Quidem sunt tenetur fugit est neque soluta qui.', 'cancelled', 'unpaid', 'credit_card', '1764037.61', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(33, 8, 'estefania.schmidt@example.net', '1-260-755-5903', '575 Zechariah Plaza Apt. 546\nWest Bradlyland, AZ 35033-7093', 'Enim neque harum vitae.', 'cancelled', 'unpaid', 'cash_on_delivery', '1628232.18', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(34, 1, 'reuben.gaylord@example.org', '323-799-0498', '863 Cole Cliff Apt. 854\nSouth Rosalind, NE 92146', 'Ea est voluptate occaecati quia delectus.', 'pending', 'paid', 'credit_card', '296375.89', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(35, 4, 'reichert.irwin@example.org', '715.906.8721', '71707 Henry Greens\nWest Elinore, NE 42601', 'Facere nisi aut esse laborum.', 'shipped', 'paid', 'credit_card', '431260.79', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(36, 6, 'larson.erna@example.net', '+1-440-541-2901', '72907 Connelly Ridge\nNew Glennieborough, PA 50412', 'Molestias eveniet velit consequatur nisi animi.', 'shipped', 'paid', 'cash_on_delivery', '1962060.41', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(37, 6, 'enola07@example.org', '1-931-885-2101', '15091 Harvey Brooks\nGrimeshaven, ME 12756', 'Debitis eius pariatur voluptatem nihil non qui voluptatibus.', 'shipped', 'unpaid', 'credit_card', '1921652.29', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(38, 8, 'bcasper@example.org', '(334) 776-1479', '3721 Konopelski Row Suite 089\nJackieport, TX 62627', 'Quis et quo quae laborum.', 'processing', 'unpaid', 'credit_card', '1328613.57', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(39, 7, 'klocko.emiliano@example.com', '864-532-8275', '6123 Keely Locks Apt. 536\nJaylenview, DE 39985', 'Consequuntur ea cumque pariatur voluptate iste tempora.', 'pending', 'unpaid', 'credit_card', '637474.12', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(40, 7, 'vandervort.zetta@example.org', '234-512-9921', '98402 Charles Expressway\nSmithton, NY 94220', 'Eos rerum ipsum tempore aspernatur molestias.', 'cancelled', 'paid', 'paypal', '287016.24', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(41, 1, 'alysa.lesch@example.net', '+1-224-558-4306', '220 Ricardo Fields\nLake Herthafort, WI 18647-4336', 'Est quibusdam est dolore aperiam dolor quia et.', 'pending', 'paid', 'credit_card', '1608581.33', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(42, 9, 'ukuphal@example.org', '+1-863-341-4763', '3828 Elisha Crest Apt. 303\nEast Roselyn, AZ 98506', 'Officia quo sit rerum voluptatem labore ducimus id.', 'cancelled', 'unpaid', 'credit_card', '457769.03', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(43, 8, 'iboyle@example.org', '1-541-543-7911', '719 Erika Harbors Suite 645\nMacejkovictown, ID 46201', 'Natus at est magnam eveniet voluptate.', 'cancelled', 'unpaid', 'paypal', '1410529.23', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(44, 1, 'maverick11@example.com', '+1.334.571.7184', '64694 Laurence Ville Suite 202\nKutchborough, MO 65678', 'Unde expedita saepe dolor eligendi harum neque est.', 'pending', 'unpaid', 'cash_on_delivery', '1714575.05', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(45, 6, 'jean42@example.net', '626-441-6219', '54118 Hoppe Trafficway Apt. 275\nPort Samanta, MI 34193', 'Ratione deleniti itaque nihil fugiat ipsa quia qui.', 'shipped', 'paid', 'paypal', '264941.86', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(46, 2, 'pnolan@example.net', '614.564.1621', '4899 Leffler Place Apt. 025\nBechtelartown, RI 97287', 'Culpa qui error hic voluptatem voluptate voluptates eum.', 'cancelled', 'paid', 'credit_card', '1185253.89', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(47, 1, 'mckenzie.domenica@example.org', '678-976-9411', '759 Delta Courts Apt. 548\nSpencertown, HI 93411', 'Consectetur dolore qui molestiae aspernatur sint quia doloremque.', 'pending', 'paid', 'paypal', '1933222.56', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(48, 5, 'trever.waelchi@example.org', '+1-503-273-2780', '97666 Berta Coves\nAndersonberg, TX 56493', 'Non quos sunt qui quia voluptatem eveniet itaque minus.', 'pending', 'unpaid', 'paypal', '1032921.08', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(49, 7, 'ubruen@example.net', '620-364-6128', '828 Bret Landing\nEast Mableport, MO 66530', 'Fugit eligendi neque quae nihil.', 'cancelled', 'paid', 'credit_card', '1835769.68', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(50, 4, 'ejenkins@example.net', '+1-269-409-7907', '201 Schuster Summit\nBuckridgefurt, NE 14801', 'Corrupti quae rerum cum.', 'processing', 'unpaid', 'cash_on_delivery', '227696.75', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(51, 1, 'gottlieb.sydnee@example.com', '+16802726206', '6393 Jasper Lock Apt. 363\nFunkbury, FL 82212', 'Animi culpa saepe odit.', 'cancelled', 'unpaid', 'credit_card', '1130319.09', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(52, 9, 'jany72@example.com', '+1-580-620-5410', '31874 Susana Land\nNew Kiannafort, CA 20651', 'Modi voluptatem illum ut alias enim.', 'processing', 'paid', 'paypal', '687625.61', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(53, 1, 'anibal.rosenbaum@example.net', '+1.952.494.0144', '169 Yundt Crossing\nNorth Jonathanberg, WV 48821', 'Culpa non vitae illo cupiditate.', 'cancelled', 'paid', 'credit_card', '642496.97', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(54, 9, 'kirlin.laisha@example.com', '267-434-2333', '832 Hermiston Grove\nAlishabury, ND 10024-2884', 'Occaecati sint ipsum qui magnam.', 'shipped', 'unpaid', 'paypal', '1656324.19', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(55, 7, 'austen.reichel@example.org', '+1-681-582-0033', '1614 Fahey Isle Suite 241\nCrooksmouth, RI 57118', 'Quia iste unde excepturi voluptatibus non.', 'cancelled', 'unpaid', 'cash_on_delivery', '511033.01', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(56, 5, 'hills.ardith@example.org', '+17046367754', '6400 Kaylie Oval Suite 336\nNew Houstonside, OR 56160', 'Id molestiae rerum consequatur eaque ex pariatur.', 'cancelled', 'unpaid', 'cash_on_delivery', '302323.95', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(57, 9, 'weimann.olen@example.com', '+17076500821', '1519 Cormier Pike\nEast Fritzport, NH 90874-0148', 'Ex autem est reiciendis maxime blanditiis voluptatem.', 'pending', 'paid', 'credit_card', '220047.38', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(58, 5, 'barrows.maudie@example.org', '+1-220-550-2231', '200 Goyette Circles\nKrajcikside, HI 41055', 'Labore vitae nesciunt reprehenderit quas ut.', 'processing', 'paid', 'credit_card', '1913601.04', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(59, 5, 'jeff.erdman@example.com', '+1 (386) 961-2200', '4473 Streich Ferry\nNew Gregoria, AL 75879', 'Magnam quaerat asperiores est rerum molestiae dolore in.', 'processing', 'paid', 'credit_card', '1702088.45', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(60, 4, 'effie.haag@example.net', '+1 (330) 333-0212', '9846 Herman Shores\nPort Elliotberg, KY 37077', 'Dolorem enim eveniet hic dolores vitae.', 'pending', 'paid', 'cash_on_delivery', '659767.69', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(61, 10, 'ryann.walker@example.org', '689.595.0135', '68740 Shirley Stream\nSouth Alessandroburgh, AK 14131', 'Porro quia sit et facere quod.', 'shipped', 'unpaid', 'credit_card', '936815.89', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(62, 8, 'sauer.jacinto@example.org', '308-448-8840', '69335 Bo Islands\nWest Raoul, PA 50577', 'Delectus veniam quis inventore quia dolore molestiae veritatis.', 'processing', 'paid', 'cash_on_delivery', '1752573.02', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(63, 4, 'loyal.lind@example.com', '+1.689.760.5338', '9624 Wuckert Inlet\nWest Dimitriside, AR 71479-4975', 'Esse omnis minus eaque non adipisci sit ut.', 'processing', 'paid', 'cash_on_delivery', '995920.68', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(64, 6, 'hettie.lowe@example.com', '1-605-923-3460', '45263 Jordy Street\nEffertzchester, WY 14388-0929', 'Et mollitia incidunt aut asperiores aut id dicta.', 'cancelled', 'unpaid', 'cash_on_delivery', '1995859.03', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(65, 4, 'dicki.maurine@example.net', '562.767.0608', '4502 Jo Mews\nSouth Elian, NJ 26239', 'Enim accusamus distinctio doloribus quia.', 'cancelled', 'paid', 'cash_on_delivery', '1123582.08', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(66, 6, 'keith40@example.net', '(831) 419-3852', '35164 Harold Keys Apt. 463\nEast Kellyside, TX 61269-1126', 'Officiis ipsum iure cum accusamus voluptatem voluptatibus.', 'pending', 'unpaid', 'paypal', '1004551.06', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(67, 6, 'melvin16@example.net', '+1-814-324-5391', '76792 Will Shore Suite 588\nSouth Terranceport, NC 64346-1577', 'Et adipisci odio aut aperiam repudiandae.', 'cancelled', 'paid', 'credit_card', '864314.46', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(68, 9, 'hzulauf@example.net', '351.490.7805', '72060 Aubrey Drives\nSouth Felicity, MN 25774', 'Autem illo vero adipisci consequatur laboriosam.', 'shipped', 'unpaid', 'paypal', '816868.27', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(69, 8, 'delores28@example.com', '337-289-5287', '866 Medhurst Harbor\nEast Mayefort, HI 94146-9697', 'Doloribus earum dolor voluptas et.', 'pending', 'unpaid', 'credit_card', '552237.91', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(70, 10, 'rolfson.autumn@example.com', '1-316-845-4505', '9530 Ewald Lane\nOswaldview, KY 51269', 'Itaque reiciendis qui aut corporis.', 'cancelled', 'paid', 'cash_on_delivery', '1424116.41', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(71, 10, 'annamarie64@example.com', '+1-551-206-2024', '8392 Kattie Rapid Apt. 623\nAntwanstad, HI 14839-8987', 'Quas quia quae est dolor sit.', 'cancelled', 'paid', 'credit_card', '1525205.55', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(72, 3, 'cary.carter@example.com', '+1.585.745.9472', '832 Conroy Spur\nSouth Hattieshire, WY 92805', 'Debitis odio nisi est quae et fugit.', 'shipped', 'paid', 'cash_on_delivery', '1867743.41', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(73, 5, 'griffin.homenick@example.com', '+1-828-277-5429', '2400 Alfreda Falls Apt. 609\nShanahanbury, CO 14298-1277', 'Qui reiciendis reprehenderit doloribus amet fugiat.', 'cancelled', 'unpaid', 'paypal', '244226.23', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(74, 6, 'christiansen.cornelius@example.com', '918-400-9841', '179 Eldridge Land Suite 076\nNew Rowan, CO 79722-0894', 'Laborum est doloremque est sit molestias.', 'processing', 'unpaid', 'cash_on_delivery', '1232514.92', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(75, 2, 'kbahringer@example.net', '+1-689-639-8008', '694 Genoveva Trail\nLake Peggieview, TX 25919', 'Optio vero porro alias velit.', 'pending', 'paid', 'cash_on_delivery', '1378465.10', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(76, 2, 'moore.aiyana@example.net', '385-790-2664', '47225 Harvey Estate\nWest Giuseppeton, ME 77094', 'Eaque provident tempore voluptatem dignissimos.', 'cancelled', 'paid', 'cash_on_delivery', '425196.48', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(77, 10, 'kstiedemann@example.org', '+1.820.351.8516', '66486 Felipe Tunnel\nLake Santiago, UT 38594', 'Veniam ratione et dolore dolore porro ad vitae.', 'cancelled', 'unpaid', 'credit_card', '1908891.39', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(78, 2, 'alycia.deckow@example.com', '1-332-778-3990', '82906 Torphy Cove\nKraigborough, KS 70644-2386', 'Veniam fugit sit praesentium.', 'shipped', 'unpaid', 'paypal', '789805.98', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(79, 8, 'merle19@example.org', '+1-801-373-5865', '99187 Cummings Falls\nEast Isabellfurt, PA 32126', 'Alias maiores sint sit temporibus.', 'shipped', 'paid', 'paypal', '1677814.27', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(80, 4, 'dhane@example.com', '+1 (484) 717-8977', '24791 Bayer Coves Suite 518\nMaciland, AK 04080', 'Aperiam odit assumenda dolorum et accusamus consequatur quia aperiam.', 'cancelled', 'paid', 'paypal', '920590.22', '2025-07-02 20:12:00', '2025-07-02 20:12:00');

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
(1, 20, 9, '988.57', 3, '2965.71', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(2, 6, 6, '360.19', 3, '1080.57', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(3, 19, 13, '995.04', 2, '1990.08', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(4, 10, 8, '817.94', 5, '4089.70', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(5, 6, 5, '478.78', 2, '957.56', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(6, 14, 8, '817.94', 1, '817.94', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(7, 6, 5, '478.78', 5, '2393.90', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(8, 20, 1, '251.37', 2, '502.74', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(9, 15, 7, '191.02', 4, '764.08', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(10, 16, 19, '171.69', 1, '171.69', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(11, 6, 2, '375.64', 3, '1126.92', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(12, 7, 8, '817.94', 5, '4089.70', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(13, 12, 12, '476.89', 4, '1907.56', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(14, 17, 4, '309.40', 5, '1547.00', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(15, 11, 15, '484.53', 2, '969.06', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(16, 5, 9, '988.57', 5, '4942.85', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(17, 9, 14, '717.84', 1, '717.84', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(18, 18, 9, '988.57', 4, '3954.28', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(19, 20, 11, '125.34', 2, '250.68', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(20, 3, 20, '505.94', 2, '1011.88', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(21, 5, 5, '478.78', 1, '478.78', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(22, 19, 1, '251.37', 2, '502.74', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(23, 11, 17, '521.54', 3, '1564.62', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(24, 6, 4, '309.40', 2, '618.80', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(25, 5, 9, '988.57', 3, '2965.71', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(26, 10, 9, '988.57', 3, '2965.71', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(27, 3, 13, '995.04', 3, '2985.12', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(28, 11, 19, '171.69', 4, '686.76', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(29, 10, 15, '484.53', 3, '1453.59', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(30, 19, 7, '191.02', 5, '955.10', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(31, 16, 6, '360.19', 3, '1080.57', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(32, 9, 5, '478.78', 3, '1436.34', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(33, 13, 2, '375.64', 1, '375.64', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(34, 16, 16, '972.31', 1, '972.31', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(35, 19, 8, '817.94', 4, '3271.76', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(36, 11, 14, '717.84', 5, '3589.20', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(37, 5, 18, '150.48', 3, '451.44', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(38, 13, 19, '171.69', 1, '171.69', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(39, 6, 5, '478.78', 5, '2393.90', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(40, 9, 16, '972.31', 5, '4861.55', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(41, 12, 3, '725.01', 1, '725.01', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(42, 2, 12, '476.89', 2, '953.78', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(43, 20, 18, '150.48', 4, '601.92', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(44, 5, 5, '478.78', 3, '1436.34', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(45, 19, 17, '521.54', 4, '2086.16', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(46, 2, 19, '171.69', 3, '515.07', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(47, 11, 3, '725.01', 1, '725.01', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(48, 3, 11, '125.34', 4, '501.36', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(49, 4, 20, '505.94', 1, '505.94', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(50, 10, 5, '478.78', 1, '478.78', '2025-07-02 20:12:00', '2025-07-02 20:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `otp_codes`
--

CREATE TABLE `otp_codes` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 21, 'credit_card', '242.61', '2025-06-17 14:00:24', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(2, 22, 'paypal', '234.71', '2025-06-13 00:36:57', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(3, 23, 'cash_on_delivery', '327.22', '2025-06-17 13:27:25', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(4, 24, 'paypal', '228.84', '2025-06-15 21:27:54', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(5, 25, 'cash_on_delivery', '236.62', '2025-06-05 19:35:53', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(6, 26, 'cash_on_delivery', '300.53', '2025-06-17 22:03:20', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(7, 27, 'paypal', '337.16', '2025-06-19 11:21:21', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(8, 28, 'cash_on_delivery', '126.73', '2025-06-05 20:02:46', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(9, 29, 'credit_card', '50.68', '2025-06-25 17:41:54', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(10, 30, 'paypal', '308.59', '2025-06-11 00:49:20', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(11, 31, 'credit_card', '423.72', '2025-06-13 03:53:29', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(12, 32, 'credit_card', '120.28', '2025-06-10 16:52:22', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(13, 33, 'paypal', '177.44', '2025-07-01 05:15:03', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(14, 34, 'cash_on_delivery', '348.84', '2025-06-13 12:36:21', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(15, 35, 'paypal', '373.08', '2025-06-27 03:23:16', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(16, 36, 'paypal', '290.41', '2025-06-19 15:35:28', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(17, 37, 'cash_on_delivery', '182.68', '2025-06-27 03:15:11', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(18, 38, 'cash_on_delivery', '199.97', '2025-06-28 10:30:49', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(19, 39, 'paypal', '84.05', '2025-06-20 23:33:56', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(20, 40, 'paypal', '460.86', '2025-06-25 22:11:19', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(21, 41, 'credit_card', '188.85', '2025-06-26 15:52:23', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(22, 43, 'credit_card', '124.90', '2025-06-18 13:19:34', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(23, 45, 'cash_on_delivery', '251.53', '2025-07-01 07:13:36', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(24, 47, 'cash_on_delivery', '270.13', '2025-06-28 20:45:08', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(25, 49, 'paypal', '492.16', '2025-06-15 02:46:32', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(26, 51, 'paypal', '121.58', '2025-07-01 12:02:59', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(27, 53, 'cash_on_delivery', '201.79', '2025-06-30 21:55:43', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(28, 55, 'credit_card', '153.56', '2025-06-08 04:31:42', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(29, 57, 'cash_on_delivery', '479.16', '2025-06-13 04:09:58', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(30, 59, 'cash_on_delivery', '424.32', '2025-06-23 04:18:20', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(31, 61, 'paypal', '293.25', '2025-06-19 03:15:45', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(32, 63, 'credit_card', '244.97', '2025-06-23 04:59:17', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(33, 65, 'cash_on_delivery', '310.44', '2025-06-30 13:04:35', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(34, 67, 'paypal', '296.64', '2025-06-06 23:04:03', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(35, 69, 'paypal', '239.04', '2025-06-13 06:54:54', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(36, 71, 'paypal', '87.17', '2025-07-01 07:57:23', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(37, 73, 'paypal', '330.77', '2025-06-04 18:54:06', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(38, 75, 'cash_on_delivery', '85.94', '2025-06-17 03:07:40', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(39, 77, 'cash_on_delivery', '460.87', '2025-06-08 13:45:13', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(40, 79, 'cash_on_delivery', '496.39', '2025-06-18 16:18:25', '2025-07-02 20:12:00', '2025-07-02 20:12:00');

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
(1, 21, 42, 'VNPAY', 'failed', '273.62', 'BRL', '2024-11-04 15:34:22', NULL, '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(2, 22, 44, 'Stripe', 'success', '946.11', 'PAB', '2024-10-11 11:24:49', NULL, '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(3, 23, 46, 'PayPal', 'failed', '420.92', 'SSP', '2024-07-13 00:27:25', NULL, '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(4, 24, 48, 'PayPal', 'success', '829.15', 'BYN', '2024-11-25 22:53:17', 'Alias rerum placeat eius eligendi. Non eum quis voluptatem optio consequatur atque. Odio dolor iusto qui est quibusdam. Reprehenderit laborum debitis modi.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(5, 25, 50, 'PayPal', 'success', '834.02', 'THB', '2024-12-17 09:21:32', 'Ut enim earum odit nihil modi voluptate. Quae placeat officia qui exercitationem quia. Aliquam vel voluptatum velit. Earum quo ipsam hic sit.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(6, 26, 52, 'PayPal', 'success', '691.80', 'KES', '2025-03-23 13:41:07', NULL, '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(7, 27, 54, 'Stripe', 'success', '625.63', 'SOS', '2024-11-24 10:42:10', 'Vitae et beatae expedita animi itaque odio. Quam voluptatibus cum ducimus non. Doloremque molestiae ipsa aliquam qui nulla ut id omnis. Voluptas fugit est voluptatem eum odio error.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(8, 28, 56, 'Stripe', 'success', '805.98', 'TRY', '2024-11-15 18:40:26', 'Doloremque alias sunt perferendis aut quia veniam numquam deleniti. Sit sunt neque aut non quasi aliquid. Aut quo excepturi sit ex soluta id.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(9, 29, 58, 'PayPal', 'success', '199.54', 'XAF', '2025-03-15 06:19:46', 'Dignissimos officia impedit ut velit et qui quos. Repellendus atque cupiditate consectetur eaque earum corrupti nesciunt magni. Quo natus sit illum quasi soluta molestias nesciunt sapiente.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(10, 30, 60, 'VNPAY', 'success', '526.96', 'BGN', '2024-08-14 04:33:09', 'Dignissimos totam culpa odit. Et minima qui natus fugit assumenda. Et autem ratione alias temporibus incidunt aut dolor. Nulla a nemo aut mollitia temporibus.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(11, 31, 62, 'PayPal', 'pending', '521.30', 'BIF', '2024-12-08 18:44:50', NULL, '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(12, 32, 64, 'PayPal', 'failed', '298.32', 'HTG', '2025-02-06 14:12:00', 'Delectus quia et qui fuga consequatur. Optio sed dignissimos modi odio omnis corrupti. Saepe exercitationem nostrum asperiores placeat deserunt porro voluptatum.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(13, 33, 66, 'VNPAY', 'success', '999.14', 'SOS', '2024-08-03 03:11:28', 'Et dolorum dolores aut et. Id aliquam voluptatem officiis ex molestias est. Ut nostrum ratione nihil quia sapiente et ipsum. Molestiae ipsam consequatur ducimus in quasi.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(14, 34, 68, 'Stripe', 'failed', '555.79', 'LAK', '2024-10-30 12:48:19', NULL, '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(15, 35, 70, 'Stripe', 'failed', '169.04', 'BWP', '2025-02-04 00:32:11', NULL, '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(16, 36, 72, 'Stripe', 'pending', '809.49', 'AOA', '2025-05-08 04:38:13', NULL, '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(17, 37, 74, 'PayPal', 'pending', '761.85', 'VUV', '2024-10-14 14:06:55', 'Ut rerum voluptatem temporibus eos numquam laudantium et cum. Sequi suscipit quia molestiae rem odio corrupti similique. At alias minima non et.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(18, 38, 76, 'VNPAY', 'pending', '530.82', 'TRY', '2025-05-13 01:34:15', NULL, '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(19, 39, 78, 'PayPal', 'failed', '665.59', 'TRY', '2024-09-22 04:58:00', 'Ad voluptas dicta odio rerum voluptatem eligendi sed. Tempore dolorem et eveniet eligendi. Aut maxime tenetur ipsum repellendus minus ex.', '2025-07-02 20:12:00', '2025-07-02 20:12:00'),
(20, 40, 80, 'VNPAY', 'success', '381.26', 'LBP', '2025-03-08 17:50:06', 'Atque qui saepe architecto vitae animi quas. Nihil voluptatem occaecati aut sunt occaecati est dolor. Impedit placeat occaecati reprehenderit et. Et dicta eum aut ipsam.', '2025-07-02 20:12:00', '2025-07-02 20:12:00');

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
(1, 'et ipsum et', 'Qui nihil nisi rerum dolorem nam voluptatem facere pariatur. Qui dolores excepturi sit eius eius tenetur sed. Voluptatem odit voluptatum iusto est dignissimos quia tempore hic. Reprehenderit aliquam excepturi aut qui saepe praesentium.', 23, 831280, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(2, 'eum est est', 'Voluptatum totam voluptatibus totam velit. Dolor repellendus vitae voluptatum harum quia possimus aut. Consequuntur omnis atque voluptatem quae debitis aut quam. Dolorem recusandae ut sit non iusto.', 27, 503818, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(3, 'nobis sit repudiandae', 'Dolorem voluptate aut vero. Ut eius sed repellendus quas ut non aspernatur. Exercitationem vero laudantium cumque aliquam fugiat libero. Officiis perspiciatis consequuntur quo omnis.', 12, 462528, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(4, 'molestiae dolores accusamus', 'Et nobis quaerat nostrum qui minus quod. Non ut asperiores eligendi reiciendis. Accusantium optio nihil ipsum facere. Quisquam accusamus sed voluptatem incidunt.', 15, 76955, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(5, 'sit qui unde', 'Voluptas aut eveniet vel distinctio. Velit ut ducimus amet est rerum facilis. Quaerat ipsum tenetur aut consectetur ut tenetur. Non quis aspernatur voluptate sunt assumenda fugit.', 19, 856681, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(6, 'consequatur impedit aspernatur', 'Optio voluptatem quia ad et pariatur qui et. Voluptatem magnam ex aliquid eos consectetur sint et. Ea quidem voluptatem voluptatibus earum doloremque. Impedit fugit molestiae aut aliquam qui deserunt. Consequatur totam qui ut dolore omnis pariatur non.', 20, 922233, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(7, 'delectus nesciunt sed', 'Ducimus in doloribus quidem voluptas accusantium illo. Aut eum molestias velit consectetur. Qui ut cupiditate dolores voluptatem aliquam nobis tenetur. Fuga ipsam nobis praesentium labore nulla sed. Aut quis ipsam aperiam eos a.', 16, 829695, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(8, 'eum rerum suscipit', 'Officia ut ea recusandae est et. Rem optio eum debitis qui fuga ipsa. Reiciendis sunt voluptatibus voluptas cumque.', 12, 653684, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(9, 'labore tempore id', 'Qui atque sunt ratione fuga totam. Molestias id dolorem nostrum voluptas quidem. Ut est eligendi deserunt corporis omnis laudantium.', 17, 254096, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(10, 'enim impedit aut', 'Reiciendis modi est a dolores asperiores. Dolore nemo dolores tempore fuga necessitatibus exercitationem corrupti.', 1, 459273, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(11, 'minus magni voluptates', 'Quia illo in rerum deleniti rerum qui quis hic. Sed error architecto commodi sint quo. Magnam nihil et doloremque soluta. Rerum quidem sit qui cumque sit minima.', 3, 433304, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(12, 'qui dignissimos ea', 'Harum harum qui laborum quo. Nesciunt aut rerum voluptas accusantium non. Voluptas et libero aperiam esse. Occaecati voluptatem minima repudiandae porro earum. Quisquam ut vel est.', 16, 75606, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(13, 'aut ipsa laborum', 'Ut nesciunt rerum et. Est amet neque tempora repellendus nihil quia.', 3, 237885, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(14, 'ut quas blanditiis', 'Est sapiente quasi iste aliquid minima dolor voluptates. Nobis deserunt ipsum ex et delectus beatae. Ut sed nam provident laborum et ad omnis. Est reprehenderit adipisci nostrum ullam ut.', 14, 105577, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(15, 'totam reprehenderit non', 'Ab itaque cupiditate consequatur aliquid quas qui exercitationem. Ullam sapiente consectetur nihil nisi quod. Eos qui explicabo pariatur dolor. Quaerat ducimus perspiciatis quae quia recusandae distinctio velit blanditiis. Ullam nulla velit odit nihil officiis modi qui accusantium.', 14, 854895, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(16, 'et maxime quas', 'Est aperiam consequuntur rerum id neque. Delectus et rerum voluptate quia temporibus. Doloremque ut aut voluptate.', 8, 835715, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(17, 'animi optio laboriosam', 'Et et nihil distinctio quis molestiae. Eveniet eligendi et rem magni aliquam. Est qui consectetur eius qui deleniti possimus qui qui.', 17, 814211, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(18, 'fugiat porro sed', 'Tempora omnis sit autem ea dolorum. Explicabo sit odit provident facilis dolorem. Quasi molestiae est nesciunt.', 16, 331795, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(19, 'maxime quis sapiente', 'Asperiores nesciunt laborum eveniet eaque. Sit officia atque cum at eius laboriosam dignissimos. Amet perspiciatis neque doloribus eveniet velit magnam accusantium harum. Et et voluptatem rem minima.', 29, 461032, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(20, 'mollitia est fugiat', 'Non est sit ea sint. Consequuntur placeat veniam voluptate repudiandae est voluptatum adipisci earum. Consequatur voluptatum rerum animi et ut quod. Minus enim nemo et harum. Labore et sunt ex in.', 24, 459816, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(21, 'molestias vel veniam', 'Voluptates tempore voluptas maiores fuga non et quidem. Veniam explicabo quo similique vero omnis unde accusantium. Minima aliquam minus voluptatibus accusamus et. Quibusdam ipsum optio unde iste amet.', 25, 360690, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(22, 'quo nisi libero', 'Praesentium accusantium provident suscipit quis doloribus. Reiciendis dolorem tenetur natus non atque qui voluptatem. Corrupti ducimus fugiat in ratione aut autem. Qui nemo nam et voluptates.', 12, 419483, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(23, 'voluptatem eos magni', 'Accusantium ipsa neque magnam et minus. Totam ut sit fuga qui aut. Nesciunt a dolor architecto. Ut quis quae ipsum esse repellendus atque temporibus. Quia rerum non architecto ut reprehenderit dolore qui.', 17, 997388, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(24, 'dolor est aliquam', 'Sed debitis voluptate vel autem dolore consectetur. Fugiat eveniet quia molestiae quis et commodi in. Et enim est veniam praesentium magni aliquam est asperiores.', 16, 735441, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(25, 'hic placeat et', 'Qui enim voluptatem voluptatem esse. Aut quod quidem molestiae est. Molestiae ipsam ullam suscipit.', 1, 761115, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(26, 'praesentium et quia', 'Commodi et aliquam aut voluptate similique omnis temporibus non. Aut exercitationem dolorum aspernatur quibusdam. Maiores deserunt facere quia eos vero incidunt officiis.', 30, 352657, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(27, 'exercitationem voluptatum ut', 'Aut enim in minus. Id et magnam deserunt qui tempora veritatis. Voluptas modi et quaerat est ut quas sit non. Possimus cupiditate iste harum est.', 10, 570859, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(28, 'et illum dolore', 'Velit esse nesciunt dolores nobis iure. Et id tempore assumenda dolore voluptate. Architecto quod laborum a similique. Neque dolorem atque ea culpa cum et. Ad ipsam assumenda magni et.', 24, 693895, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(29, 'tenetur eligendi doloribus', 'Molestias rerum ducimus eos quod consequuntur fuga dolor. Officia exercitationem sit dolorem et eaque qui maxime. Voluptates atque vel rem itaque. Inventore est quis quam. Error maiores dolor voluptas.', 15, 736176, '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(30, 'est fugit ea', 'Consequatur ea rem porro id voluptas enim quam iure. Quas nulla dolores dolorem in id corporis.', 20, 886857, '2025-07-02 20:11:59', '2025-07-02 20:11:59');

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
(1, 1, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(2, 1, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(3, 1, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(4, 2, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(5, 2, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(6, 2, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(7, 3, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(8, 3, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(9, 3, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(10, 4, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(11, 4, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(12, 4, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(13, 5, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(14, 5, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(15, 5, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(16, 6, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(17, 6, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(18, 6, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(19, 7, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(20, 7, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(21, 7, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(22, 8, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(23, 8, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(24, 8, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(25, 9, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(26, 9, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(27, 9, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(28, 10, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(29, 10, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(30, 10, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(31, 11, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(32, 11, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(33, 11, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(34, 12, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(35, 12, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(36, 12, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(37, 13, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(38, 13, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(39, 13, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(40, 14, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(41, 14, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(42, 14, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(43, 15, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(44, 15, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(45, 15, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(46, 16, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(47, 16, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(48, 16, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(49, 17, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(50, 17, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(51, 17, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(52, 18, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(53, 18, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(54, 18, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(55, 19, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(56, 19, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(57, 19, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(58, 20, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(59, 20, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(60, 20, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(61, 21, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(62, 21, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(63, 21, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(64, 22, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(65, 22, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(66, 22, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(67, 23, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(68, 23, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(69, 23, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(70, 24, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(71, 24, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(72, 24, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(73, 25, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(74, 25, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(75, 25, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(76, 26, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(77, 26, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(78, 26, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(79, 27, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(80, 27, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(81, 27, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(82, 28, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(83, 28, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(84, 28, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(85, 29, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(86, 29, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(87, 29, 'images/products/', 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(88, 30, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(89, 30, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(90, 30, 'images/products/', 0, '2025-07-02 20:12:01', '2025-07-02 20:12:01');

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
(1, 'user', 'Quidem ut porro voluptatem blanditiis maiores in cum.', '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(2, 'user', 'Omnis ipsam sit est.', '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(3, 'admin', 'Repellendus voluptatem dolores pariatur vel dolore.', '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(4, 'staff', 'Corrupti voluptas nihil ipsa ipsam iste illum.', '2025-07-02 20:11:59', '2025-07-02 20:11:59'),
(5, 'staff', 'Tempora molestiae eum harum velit dolor et.', '2025-07-02 20:11:59', '2025-07-02 20:11:59');

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
('aU0cqfwwJDZXzevWhbUpURTt16Nzq2PXiHgmGyQI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHJDR2tJMkdtang2cnU2R05CQzZwZUZOQ0Y3dlZ1b29LZjBDcU0wOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTExOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvP2dpZHpsPUlJY1pQaF9VejBERENROVlseTdtMUtldmZjRVpjUUMwS00yWE93eDV6NU9CQ0ZTdl92Rm8ybXZjenNzaG5nV0JNSkFpUjMzN21NVE1sRHhzMTAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751512914),
('bnNoPvSqSXPY5JiuSw8OKcyCoGpWOFc0xoEqnYhf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2tiOGVtczJJemlvMmNhN0hIb1NMMVhNczFISklBQjBxMHR1UFR5MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly9hZGphY2VudC1vdXRzdGFuZGluZy12ZXJ0ZXgtYy50cnljbG91ZGZsYXJlLmNvbS9wcm9kdWN0LWRldGFpbHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751514505),
('DeOXtXTUeNxKSyHJfvDLfjMdiVTjOhF0FLr7xzb3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVg4dUM5S1ZZSlRlR3JlNUl4cFZCRHJMWkhJemV6NzlYcGRSbWMzbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9hZGphY2VudC1vdXRzdGFuZGluZy12ZXJ0ZXgtYy50cnljbG91ZGZsYXJlLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751513344),
('q6lqyZseMyd3qn8OOtwgbRb92nMFCmHMyfs3kC4P', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjk3YUtSYm5XUVg3QWpsWWEzNHRDYWVDVEN6SWJlekozU2NKcUpDOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751513291),
('ZDvh7OZABk0LJgr1GIJoXUwNsei4YORR5xv0xLg8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTFqaGRuMHcyMXA2MUs0dTFyOXF5Y0VVR3d5QWY2aDdhMGw2MFBxTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751513237);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `is_active`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 5, 1, 'Rhiannon Johns', 'mmuller@example.org', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', 'LLLrkEh0ep', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(2, 2, 1, 'Ms. Leola Barton', 'nstroman@example.org', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', 'ZwTjhXUtxO', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(3, 4, 1, 'Jazlyn Batz PhD', 'okuneva.jalen@example.org', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', '8HSiHuEIhT', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(4, 2, 1, 'Estel Heaney III', 'furman.lemke@example.org', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', 'Ps3gi1KhXw', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(5, 4, 1, 'Mrs. Emelia Jones', 'tpfannerstill@example.org', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', 'sSqiA80HmC', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(6, 2, 1, 'Cullen Zulauf', 'heidenreich.oran@example.org', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', '8AYY7gDTYY', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(7, 3, 1, 'Elmo Tillman', 'caesar99@example.net', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', 'qCRdLtwO1U', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(8, 2, 1, 'Mrs. Tia Hauck', 'idella69@example.net', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', 'NnsXg2qlZV', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(9, 2, 1, 'Gabriella Friesen', 'kira64@example.net', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', 'rMta2Sdd4U', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(10, 4, 1, 'Imelda Braun', 'gerhold.may@example.com', '2025-07-02 20:11:59', '$2y$12$vkBqamEnd1dwyURRG.7ikeJExTgb5rW62c3LHvkogf5FJo5alSNSq', 'BftQGVzl2W', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `product_id`, `price`, `stock_quantity`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, '251.37', 87, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(2, 12, '375.64', 56, 'active', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(3, 13, '725.01', 59, 'inactive', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(4, 14, '309.40', 93, 'inactive', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(5, 15, '478.78', 35, 'inactive', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(6, 16, '360.19', 8, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(7, 17, '191.02', 99, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(8, 18, '817.94', 74, 'inactive', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(9, 19, '988.57', 13, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(10, 20, '851.58', 14, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(11, 21, '125.34', 58, 'inactive', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(12, 22, '476.89', 55, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(13, 23, '995.04', 5, 'inactive', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(14, 24, '717.84', 53, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(15, 25, '484.53', 2, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(16, 26, '972.31', 98, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(17, 27, '521.54', 39, 'inactive', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(18, 28, '150.48', 26, 'active', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(19, 29, '171.69', 9, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL),
(20, 30, '505.94', 33, 'out_of_stock', '2025-07-02 20:11:59', '2025-07-02 20:11:59', NULL);

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
(1, 11, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(2, 9, 9, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(3, 5, 10, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(4, 7, 4, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(5, 3, 17, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(6, 8, 17, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(7, 6, 12, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(8, 16, 18, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(9, 3, 18, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(10, 6, 19, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(11, 3, 20, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(12, 17, 5, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(13, 18, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(14, 5, 6, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(15, 7, 15, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(16, 17, 12, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(17, 18, 16, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(18, 20, 11, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(19, 1, 18, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(20, 18, 16, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(21, 4, 14, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(22, 16, 19, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(23, 5, 12, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(24, 7, 20, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(25, 6, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(26, 2, 7, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(27, 8, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(28, 2, 11, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(29, 7, 1, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(30, 1, 12, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(31, 14, 10, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(32, 10, 16, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(33, 9, 6, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(34, 5, 12, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(35, 13, 13, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(36, 17, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(37, 10, 14, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(38, 20, 17, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(39, 11, 8, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(40, 19, 15, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(41, 3, 3, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(42, 11, 13, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(43, 15, 11, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(44, 7, 16, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(45, 7, 11, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(46, 12, 17, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(47, 6, 20, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(48, 14, 2, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(49, 5, 6, '2025-07-02 20:12:01', '2025-07-02 20:12:01'),
(50, 13, 18, '2025-07-02 20:12:01', '2025-07-02 20:12:01');

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

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
-- Indexes for table `otp_codes`
--
ALTER TABLE `otp_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otp_codes_email_index` (`email`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT for table `otp_codes`
--
ALTER TABLE `otp_codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

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
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
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
