-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2017 at 03:28 PM
-- Server version: 5.6.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `created_at`, `updated_at`) VALUES
(1, 'Raina Senger IV', '2017-03-04 12:29:00', '2017-03-04 12:29:00'),
(2, 'Prof. Jack Bartell IV', '2017-03-04 12:29:00', '2017-03-04 12:29:00'),
(3, 'Jane Hauck', '2017-03-04 12:29:00', '2017-03-04 12:29:00'),
(4, 'Isom Stroman', '2017-03-04 12:29:00', '2017-03-04 12:29:00'),
(5, 'Theresa King', '2017-03-04 12:29:00', '2017-03-04 12:29:00'),
(6, 'Vivianne Watsica', '2017-03-04 12:39:54', '2017-03-04 12:39:54'),
(7, 'Jaqueline O''Reilly', '2017-03-04 12:39:54', '2017-03-04 12:39:54'),
(8, 'Kelly Heathcote Sr.', '2017-03-04 12:39:55', '2017-03-04 12:39:55'),
(9, 'Prof. Krystina Larson', '2017-03-04 12:39:55', '2017-03-04 12:39:55'),
(10, 'Corrine Herzog', '2017-03-04 12:39:55', '2017-03-04 12:39:55'),
(11, 'Werner Wolff', '2017-03-04 13:33:45', '2017-03-04 13:33:45'),
(12, 'Hermina Auer DVM', '2017-03-04 13:33:45', '2017-03-04 13:33:45'),
(13, 'Mallory Veum', '2017-03-04 13:33:45', '2017-03-04 13:33:45'),
(14, 'Kaleigh Thompson', '2017-03-04 13:33:45', '2017-03-04 13:33:45'),
(15, 'Prof. Jerrell Stokes DDS', '2017-03-04 13:33:45', '2017-03-04 13:33:45'),
(16, 'Napoleon Huel', '2017-03-04 13:33:45', '2017-03-04 13:33:45'),
(17, 'Velva Lueilwitz DVM', '2017-03-04 13:33:45', '2017-03-04 13:33:45'),
(18, 'Ashly Borer', '2017-03-04 13:33:45', '2017-03-04 13:33:45'),
(19, 'Emerson Langworth', '2017-03-04 13:33:45', '2017-03-04 13:33:45'),
(20, 'Mina Waters', '2017-03-04 13:33:45', '2017-03-04 13:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_19_123149_create_posts_table', 1),
(4, '2017_02_20_071645_create_user_post_likes_table', 1),
(5, '2017_03_04_144807_create_customers_table', 2),
(6, '2017_03_04_144916_create_order_statuses_table', 2),
(7, '2017_03_04_145011_create_products_table', 2),
(11, '2017_03_04_145238_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `status_id` mediumint(8) unsigned NOT NULL,
  `order_quantity` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `inward_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_product_id_foreign` (`product_id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_status_id_foreign` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `customer_id`, `status_id`, `order_quantity`, `inward_date`, `created_at`, `updated_at`) VALUES
(1, 7, 8, 5, 4, '2017-03-05 11:53:37', '2017-03-04 12:41:40', '2017-03-05 06:23:37'),
(2, 10, 6, 3, 4, '2017-03-05 11:53:37', '2017-03-04 12:41:40', '2017-03-05 06:23:37'),
(3, 10, 1, 2, 3, '2017-03-05 11:53:37', '2017-03-04 12:41:40', '2017-03-05 06:23:37'),
(4, 3, 1, 1, 4, '2017-03-05 11:53:37', '2017-03-04 12:41:40', '2017-03-05 06:23:37'),
(5, 4, 3, 5, 3, '2017-03-05 11:53:37', '2017-03-04 12:41:40', '2017-03-05 06:23:37'),
(6, 4, 7, 4, 4, '2017-03-05 11:48:23', '2017-03-04 13:33:22', '2017-03-05 06:18:23'),
(7, 9, 9, 1, 4, '2017-03-05 11:51:30', '2017-03-04 13:33:22', '2017-03-05 06:21:30'),
(8, 7, 8, 5, 3, '2017-03-05 11:51:17', '2017-03-04 13:33:22', '2017-03-05 06:21:17'),
(9, 5, 2, 3, 2, '2017-03-05 11:51:30', '2017-03-04 13:33:22', '2017-03-05 06:21:30'),
(10, 2, 1, 4, 2, '2017-03-05 11:48:23', '2017-03-04 13:33:22', '2017-03-05 06:18:23'),
(11, 17, 14, 4, 8, NULL, '2017-03-04 13:34:56', '2017-03-05 06:04:13'),
(12, 1, 2, 6, 5, NULL, '2017-03-04 13:34:56', '2017-03-05 06:04:13'),
(13, 6, 10, 5, 9, NULL, '2017-03-04 13:34:56', '2017-03-05 06:04:13'),
(14, 13, 11, 1, 2, NULL, '2017-03-04 13:34:56', '2017-03-05 06:04:13'),
(15, 11, 5, 6, 4, NULL, '2017-03-04 13:34:56', '2017-03-05 06:04:13'),
(16, 18, 5, 1, 6, '2017-03-05 11:46:01', '2017-03-04 13:34:56', '2017-03-05 06:16:01'),
(17, 5, 12, 5, 9, '2017-03-05 11:46:01', '2017-03-04 13:34:56', '2017-03-05 06:16:01'),
(18, 10, 19, 4, 5, '2017-03-05 11:46:01', '2017-03-04 13:34:56', '2017-03-05 06:16:01'),
(19, 4, 8, 6, 3, '2017-03-05 11:46:01', '2017-03-04 13:34:56', '2017-03-05 06:16:01'),
(20, 5, 10, 3, 5, '2017-03-05 11:46:01', '2017-03-04 13:34:56', '2017-03-05 06:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE IF NOT EXISTS `order_statuses` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Confirmed', '2017-03-04 10:30:01', '2017-03-04 10:30:01'),
(2, 'Shipped', '2017-03-04 10:30:01', '2017-03-04 10:30:01'),
(3, 'Cancelled', '2017-03-04 10:30:01', '2017-03-04 10:30:01'),
(4, 'Refunded', '2017-03-04 10:30:01', '2017-03-04 10:30:01'),
(5, 'Partly Shipped Order Complete', '2017-03-04 10:30:01', '2017-03-04 10:30:01'),
(6, 'Partly Shipped Order In-Complete', '2017-03-04 10:30:01', '2017-03-04 10:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `likes_count` int(10) unsigned NOT NULL DEFAULT '0',
  `comments_count` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `sku`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ZN1LgNJmoO', 'CtcPLvf56Th6zqE', 1, '2017-03-04 12:07:45', '2017-03-04 12:07:45'),
(2, 'y0KZ98dmSj', 'YLsohGx1tveqDRZ', 1, '2017-03-04 12:07:46', '2017-03-04 12:07:46'),
(3, '5thOPLeOSN', 'oSLYhZPik0i3qXN', 1, '2017-03-04 12:07:46', '2017-03-04 12:07:46'),
(4, 'ScaHgX4RKO', 'O7S90j0PQTvvWte', 1, '2017-03-04 12:07:46', '2017-03-04 12:07:46'),
(5, 'c7HWT478QK', 'jf8XKrlFsR42DcA', 1, '2017-03-04 12:07:46', '2017-03-04 12:07:46'),
(6, 'KZMq46UyWE', 'y6LknnkpDp1s1Gv', 1, '2017-03-04 12:27:49', '2017-03-04 12:27:49'),
(7, 'cspVLMprbQ', 'W8QZnSMgyzrmIn1', 1, '2017-03-04 12:27:49', '2017-03-04 12:27:49'),
(8, 'oCqURMHr0a', 'D5vpHScHVxrLGJt', 1, '2017-03-04 12:27:49', '2017-03-04 12:27:49'),
(9, '5fuPdNZ0y4', 'cehz8UM5ecNjLZ0', 1, '2017-03-04 12:27:49', '2017-03-04 12:27:49'),
(10, 'yNNoOkXKxl', 'zl4hkWx7i2vz6gp', 1, '2017-03-04 12:27:50', '2017-03-04 12:27:50'),
(11, 'AmTMHW4S7n', '9chZtig95pCRyVQ', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22'),
(12, 'k8aY5YgiCC', 'BYmk3ZJrVJ1oEYW', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22'),
(13, '4k4shPVgNb', 'FzYOffRnWnhacNM', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22'),
(14, '5MKE8LGPLK', 'PDa9L8FFKhUu2bK', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22'),
(15, 'HlLJgosyut', 'Eatv7lhvbnuK2He', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22'),
(16, 'sR4xpFofW8', 'gYR0vmbpf1kuIQP', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22'),
(17, 'fGeEpGrm57', '85pk1TrNVTT2oJ9', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22'),
(18, 'KprRLKstjz', '6q0l3vLHTRi0dLg', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22'),
(19, 'dE0bBGxgG2', 'BQ7aVHeqKTQZMRG', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22'),
(20, 'QdK1j8FNGj', 'qLYcqChRRY6i0BR', 1, '2017-03-04 13:34:22', '2017-03-04 13:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `password` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `is_active`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abuhuraira', 'Lakdawala', 'abu2602@gmail.com', '1', 1, '$2y$10$dR5lkddQA8gqkBaSyfV9weUTx/yIsiXUIa41Q3EKb2xmNmJiZeq5e', 'aFZBmCcfKHcp5zOZv37pKyDsdXbrf3O7GYRRQUqSJqDNijYbW1oCY52dIjVj', '2017-03-05 00:40:02', '2017-03-05 00:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_likes`
--

CREATE TABLE IF NOT EXISTS `user_post_likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_post_likes_user_id_foreign` (`user_id`),
  KEY `user_post_likes_post_id_foreign` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `order_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post_likes`
--
ALTER TABLE `user_post_likes`
  ADD CONSTRAINT `user_post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_post_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
