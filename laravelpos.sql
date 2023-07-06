-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 12:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Cedrick', 'Sioco', NULL, '+639455873986', 'Sual, Pangasinan', 'customers/FOWHM2WGaJnScivv3nh5B72C4oChBWUjXFSrVwLb.jpg', 3, '2023-06-29 23:04:37', '2023-06-29 23:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_19_081616_create_products_table', 1),
(5, '2020_04_22_181602_add_quantity_to_products_table', 1),
(6, '2020_04_24_170630_create_customers_table', 1),
(7, '2020_04_27_054355_create_settings_table', 1),
(8, '2020_04_30_053758_create_user_cart_table', 1),
(9, '2020_05_04_165730_create_orders_table', 1),
(14, '2020_05_04_165749_create_order_items_table', 2),
(15, '2020_05_04_165822_create_payments_table', 2),
(16, '2022_03_21_125336_change_price_column', 2),
(17, '2023_06_27_070231_create_sales_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(22, 5, 3, '2023-06-29 23:23:19', '2023-06-29 23:23:19'),
(23, NULL, 3, '2023-06-29 23:26:43', '2023-06-29 23:26:43'),
(24, NULL, 3, '2023-06-29 23:27:42', '2023-06-29 23:27:42'),
(25, NULL, 3, '2023-06-29 23:27:58', '2023-06-29 23:27:58'),
(26, NULL, 3, '2023-06-29 23:28:16', '2023-06-29 23:28:16'),
(27, NULL, 3, '2023-06-29 23:28:29', '2023-06-29 23:28:29'),
(28, NULL, 3, '2023-06-29 23:29:07', '2023-06-29 23:29:07'),
(29, NULL, 3, '2023-06-29 23:33:37', '2023-06-29 23:33:37'),
(30, NULL, 3, '2023-06-04 16:29:44', '2023-07-04 16:29:44'),
(31, NULL, 3, '2023-07-04 16:54:59', '2023-07-04 16:54:59'),
(32, NULL, 3, '2023-07-05 16:00:55', '2023-07-05 16:00:55'),
(33, NULL, 3, '2023-07-05 16:52:32', '2023-07-05 16:52:32'),
(34, NULL, 3, '2023-07-05 19:09:37', '2023-07-05 19:09:37'),
(35, NULL, 3, '2023-07-06 00:34:00', '2023-07-06 00:34:00'),
(36, NULL, 3, '2023-07-06 00:36:39', '2023-07-06 00:36:39'),
(37, NULL, 3, '2023-07-06 00:38:22', '2023-07-06 00:38:22'),
(38, NULL, 3, '2023-07-06 00:49:34', '2023-07-06 00:49:34'),
(39, NULL, 3, '2023-07-06 00:50:01', '2023-07-06 00:50:01'),
(40, NULL, 3, '2023-07-06 00:50:07', '2023-07-06 00:50:07'),
(48, NULL, 3, '2023-07-06 01:16:31', '2023-07-06 01:16:31'),
(49, NULL, 3, '2023-07-06 01:18:52', '2023-07-06 01:18:52'),
(50, NULL, 3, '2023-07-06 01:19:26', '2023-07-06 01:19:26'),
(51, NULL, 3, '2023-07-06 01:23:36', '2023-07-06 01:23:36'),
(52, NULL, 3, '2023-07-06 02:31:57', '2023-07-06 02:31:57'),
(53, NULL, 3, '2023-07-06 02:32:25', '2023-07-06 02:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(14,4) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `price`, `quantity`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 45.0000, 1, 22, 21, '2023-06-29 23:23:19', '2023-06-29 23:23:19'),
(2, 50.0000, 1, 22, 12, '2023-06-29 23:23:19', '2023-06-29 23:23:19'),
(3, 75.0000, 1, 22, 14, '2023-06-29 23:23:19', '2023-06-29 23:23:19'),
(4, 70.0000, 1, 22, 19, '2023-06-29 23:23:19', '2023-06-29 23:23:19'),
(5, 500.0000, 10, 23, 12, '2023-06-29 23:26:43', '2023-06-29 23:26:43'),
(6, 150.0000, 5, 23, 15, '2023-06-29 23:26:43', '2023-06-29 23:26:43'),
(7, 200.0000, 1, 24, 18, '2023-06-29 23:27:42', '2023-06-29 23:27:42'),
(8, 120.0000, 2, 25, 20, '2023-06-29 23:27:58', '2023-06-29 23:27:58'),
(9, 65.0000, 1, 25, 16, '2023-06-29 23:27:58', '2023-06-29 23:27:58'),
(10, 90.0000, 2, 26, 21, '2023-06-29 23:28:16', '2023-06-29 23:28:16'),
(11, 30.0000, 1, 26, 15, '2023-06-29 23:28:16', '2023-06-29 23:28:16'),
(12, 30.0000, 1, 27, 15, '2023-06-29 23:28:29', '2023-06-29 23:28:29'),
(13, 140.0000, 2, 27, 19, '2023-06-29 23:28:29', '2023-06-29 23:28:29'),
(14, 60.0000, 1, 28, 20, '2023-06-29 23:29:07', '2023-06-29 23:29:07'),
(15, 75.0000, 1, 28, 14, '2023-06-29 23:29:07', '2023-06-29 23:29:07'),
(16, 30.0000, 1, 28, 15, '2023-06-29 23:29:07', '2023-06-29 23:29:07'),
(17, 50.0000, 1, 28, 12, '2023-06-29 23:29:07', '2023-06-29 23:29:07'),
(18, 250.0000, 1, 28, 17, '2023-06-29 23:29:07', '2023-06-29 23:29:07'),
(19, 200.0000, 1, 28, 18, '2023-06-29 23:29:07', '2023-06-29 23:29:07'),
(20, 70.0000, 1, 28, 19, '2023-06-29 23:29:07', '2023-06-29 23:29:07'),
(21, 4600.0000, 23, 29, 18, '2023-06-29 23:33:37', '2023-06-29 23:33:37'),
(22, 30.0000, 1, 30, 15, '2023-07-04 16:29:44', '2023-07-04 16:29:44'),
(23, 45.0000, 1, 30, 13, '2023-07-04 16:29:44', '2023-07-04 16:29:44'),
(24, 50.0000, 1, 30, 12, '2023-07-04 16:29:44', '2023-07-04 16:29:44'),
(25, 135.0000, 3, 31, 21, '2023-07-04 16:54:59', '2023-07-04 16:54:59'),
(26, 100.0000, 2, 32, 12, '2023-07-05 16:00:55', '2023-07-05 16:00:55'),
(27, 75.0000, 1, 32, 14, '2023-07-05 16:00:55', '2023-07-05 16:00:55'),
(28, 540.0000, 3, 33, 22, '2023-07-05 16:52:32', '2023-07-05 16:52:32'),
(29, 45.0000, 1, 34, 13, '2023-07-05 19:09:37', '2023-07-05 19:09:37'),
(30, 50.0000, 1, 34, 12, '2023-07-05 19:09:37', '2023-07-05 19:09:37'),
(31, 75.0000, 1, 34, 14, '2023-07-05 19:09:37', '2023-07-05 19:09:37'),
(32, 70.0000, 1, 35, 19, '2023-07-06 00:34:00', '2023-07-06 00:34:00'),
(33, 140.0000, 2, 36, 19, '2023-07-06 00:36:39', '2023-07-06 00:36:39'),
(34, 360.0000, 2, 37, 22, '2023-07-06 00:38:22', '2023-07-06 00:38:22'),
(35, 360.0000, 2, 38, 22, '2023-07-06 00:49:34', '2023-07-06 00:49:34'),
(36, 140.0000, 2, 39, 25, '2023-07-06 00:50:01', '2023-07-06 00:50:01'),
(37, 140.0000, 2, 40, 25, '2023-07-06 00:50:07', '2023-07-06 00:50:07'),
(49, 140.0000, 2, 48, 25, '2023-07-06 01:16:31', '2023-07-06 01:16:31'),
(50, 45.0000, 1, 48, 21, '2023-07-06 01:16:31', '2023-07-06 01:16:31'),
(51, 60.0000, 1, 49, 20, '2023-07-06 01:18:52', '2023-07-06 01:18:52'),
(52, 60.0000, 1, 50, 20, '2023-07-06 01:19:26', '2023-07-06 01:19:26'),
(53, 120.0000, 2, 51, 20, '2023-07-06 01:23:36', '2023-07-06 01:23:36'),
(54, 180.0000, 1, 52, 22, '2023-07-06 02:31:57', '2023-07-06 02:31:57'),
(55, 70.0000, 1, 52, 25, '2023-07-06 02:31:57', '2023-07-06 02:31:57'),
(56, 120.0000, 1, 52, 24, '2023-07-06 02:31:57', '2023-07-06 02:31:57'),
(57, 70.0000, 1, 53, 19, '2023-07-06 02:32:25', '2023-07-06 02:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(14,4) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `order_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 240.0000, 22, 3, '2023-06-29 23:23:19', '2023-06-29 23:23:19'),
(2, 650.0000, 23, 3, '2023-06-29 23:26:43', '2023-06-29 23:26:43'),
(3, 200.0000, 24, 3, '2023-06-29 23:27:42', '2023-06-29 23:27:42'),
(4, 185.0000, 25, 3, '2023-06-29 23:27:58', '2023-06-29 23:27:58'),
(5, 120.0000, 26, 3, '2023-06-29 23:28:16', '2023-06-29 23:28:16'),
(6, 170.0000, 27, 3, '2023-06-29 23:28:29', '2023-06-29 23:28:29'),
(7, 735.0000, 28, 3, '2023-06-29 23:29:07', '2023-06-29 23:29:07'),
(8, 4600.0000, 29, 3, '2023-06-29 23:33:37', '2023-06-29 23:33:37'),
(9, 125.0000, 30, 3, '2023-07-04 16:29:44', '2023-07-04 16:29:44'),
(10, 135.0000, 31, 3, '2023-07-04 16:54:59', '2023-07-04 16:54:59'),
(11, 200.0000, 32, 3, '2023-07-05 16:00:55', '2023-07-05 16:00:55'),
(12, 540.0000, 33, 3, '2023-07-05 16:52:32', '2023-07-05 16:52:32'),
(13, 100.0000, 34, 3, '2023-07-05 19:09:37', '2023-07-05 19:09:37'),
(14, 50.0000, 35, 3, '2023-07-06 00:34:00', '2023-07-06 00:34:00'),
(15, 140.0000, 40, 3, '2023-07-06 00:50:07', '2023-07-06 00:50:07'),
(16, 60.0000, 49, 3, '2023-07-06 01:18:52', '2023-07-06 01:18:52'),
(17, 60.0000, 50, 3, '2023-07-06 01:19:26', '2023-07-06 01:19:26'),
(18, 370.0000, 52, 3, '2023-07-06 02:31:57', '2023-07-06 02:31:57'),
(19, 70.0000, 53, 3, '2023-07-06 02:32:25', '2023-07-06 02:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `barcode` varchar(191) NOT NULL,
  `price` decimal(14,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `barcode`, `price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Choco Cookies', 'Delicious chocolate-flavored cookies with a crunchy texture.', 'products/vYcqqbiKleRvtHYc4f2cJIbiGQl25zzMhHbxbWAa.jpg', '12345678901234', 50.00, 84, 1, '2023-06-29 22:39:18', '2023-07-05 19:09:37'),
(13, 'Vanilla Cookies', 'Classic vanilla-flavored cookies, perfect for any occasion.', 'products/ZkNqrigQm40ro5WGH9SSxdjZfs9rpGtLeK0XK5yS.jpg', '23456789012345', 45.00, 78, 1, '2023-06-29 22:40:04', '2023-07-05 19:09:37'),
(14, 'Miltea', 'Refreshing milk tea with a unique blend of flavors.', 'products/srtCiEqf1d5fupL3DgNp7KcU8PuazRC31HYXru86.jpg', '45678901234567', 75.00, 86, 1, '2023-06-29 22:40:54', '2023-07-05 19:09:37'),
(15, 'Soda', 'Carbonated beverage available in various fruity flavors.', 'products/dkWPYTqbr0p5AyJu5jDWjoDwXyVkG7YfF8DvUNiV.jpg', '56789012345678', 30.00, 141, 1, '2023-06-29 22:41:42', '2023-07-04 16:29:44'),
(16, 'Coffee', 'Rich and aromatic coffee brewed to perfection.', 'products/8jYFyjqJNoWc4mt4JTNzAISbyR375vbTi5usKaL8.jpg', '67890123456789', 65.00, 119, 1, '2023-06-29 22:42:14', '2023-06-29 23:27:58'),
(17, 'Red Velvet Cake', 'Decadent red velvet cake with creamy frosting.', 'products/nbSqqrVVH0HXOREzO8hiFR03H7FqkuOCY2RUqCNt.jpg', ': 78901234567890', 250.00, 24, 1, '2023-06-29 22:43:00', '2023-06-29 23:29:07'),
(18, 'Fruity Cake', 'Light and fruity cake with a burst of flavors', 'products/tp78AGFzmv4H4zWMcEljORoSg8Lc2vzawuNNRqrb.jpg', '89012345678901', 200.00, 5, 1, '2023-06-29 22:43:54', '2023-06-29 23:33:37'),
(19, 'Eggpie', 'Traditional Filipino pastry filled with a creamy egg custard.', 'products/FW1JPNh43JyC3d2zbZTwqzqTMfl7lZRgycb1smsk.jpg', '90123456789012', 70.00, 52, 1, '2023-06-29 22:44:46', '2023-07-06 02:32:25'),
(20, 'Matcha Cookies', 'A delightful blend of matcha and buttery goodness in each bite.', 'products/vkk4uh1WFs94E3d5WImY6tqYJJtK9mbmbtPmszL9.jpg', '34567890123456', 60.00, 63, 1, '2023-06-29 22:54:11', '2023-07-06 01:23:36'),
(21, 'Fruity Pancake', 'Fluffy pancakes topped with a medley of fresh fruits.', 'products/E86wmR3gWFcCi4wazG0atehVF4QfPcrj4JdPcsin.jpg', '01234567890123', 45.00, 43, 1, '2023-06-29 23:21:20', '2023-07-06 01:16:31'),
(22, 'Strawberry Cheesecake', 'Creamy delight with fresh strawberries', 'products/0PL2P1wyM0rBZ3PlyT1RhyAktZVM5pt32OC1EBpz.jpg', '67890123456787', 180.00, 24, 1, '2023-07-05 16:26:52', '2023-07-06 02:31:57'),
(23, 'Blueberry Muffin', 'Bursting with juicy blueberries', 'products/zrpioiICbH34fSIwzDr1Pmgb7oMKDZJ1A6Ds00B2.jpg', '78901234567890', 50.00, 48, 1, '2023-07-05 16:54:21', '2023-07-05 16:54:21'),
(24, 'Roll Cake', 'Delicate and flavorful rolled cake', 'products/katnGTKXnxxeyslMRCq0eUwF9LgJPveICb3pzKHY.jpg', '23456789012344', 120.00, 17, 1, '2023-07-05 16:55:32', '2023-07-06 02:31:57'),
(25, 'Banana Smoothie', 'Refreshing blend of bananas and cream', 'products/p6pMkDbJGBQm2Dbllay4PKS57GSGQaGP1ckLwrnE.jpg', '89012345678902', 70.00, 18, 1, '2023-07-05 16:58:33', '2023-07-06 02:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_sales` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'POS Solutions', '2023-06-25 14:42:23', '2023-06-29 23:32:40'),
(2, 'currency_symbol', '₱', '2023-06-25 14:42:23', '2023-06-25 15:21:22'),
(3, 'app_description', NULL, '2023-06-25 15:21:22', '2023-06-25 15:21:22'),
(4, 'warning_quantity', '10', '2023-06-25 15:21:22', '2023-06-29 23:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Allainea', 'Atendido', 'admin@example.com', NULL, '$2y$10$KYDgChIvZyuyXXoPcZhQJ.L14ySM25Gnc2PZ1W5jzNfO2.HlHHfXe', NULL, '2023-06-26 13:22:24', '2023-06-26 13:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_barcode_unique` (`barcode`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD KEY `user_cart_user_id_foreign` (`user_id`),
  ADD KEY `user_cart_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
