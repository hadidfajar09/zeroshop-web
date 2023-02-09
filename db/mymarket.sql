-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 04:44 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(3, 'Hadidfajar', 'zeronine09@gmail.com', NULL, '$2y$10$tm/3j9x/dXqUcDcbZlbCJ.ZoO8OBKHrkC/ghG0dysqpVihFevNNp.', NULL, NULL, '202112240731111.png', NULL, '2021-12-24 15:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Logitech', 'logitech', 'upload/brand/1720011847355484.png', NULL, NULL),
(2, 'Moonton', 'moonton', 'upload/brand/1720012262967119.jpg', NULL, NULL),
(3, 'My Signature', 'my-signature', 'upload/brand/1720012749907127.jpg', NULL, NULL),
(4, 'Yonex', 'yonex', 'upload/brand/1720012766248333.png', NULL, NULL),
(5, 'tess', 'tess', 'upload/brand/1757056878676069.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_ind`, `category_name_en`, `category_slug_ind`, `category_slug_en`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Permainan', 'Game', 'permainan', 'game', 'fa fa-gamepad', NULL, NULL),
(2, 'Makanan & Minuman', 'Food & Drink', 'makanan-&-minuman', 'food-&-drink', 'fa fa-cutlery', NULL, NULL),
(3, 'Kesehatan', 'Health', 'kesehatan', 'health', 'fa fa-medkit', NULL, NULL),
(4, 'Komputer & Aksesories', 'Computers & Accessories', 'komputer-&-aksesories', 'computers-&-accessories', 'fa fa-laptop', NULL, NULL),
(5, 'Olahraga', 'Sport', 'olahraga', 'sport', 'fa fa-bicycle', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_valid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_valid`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ABID', 1, '2022-12-08', 1, '2021-12-26 03:02:30', '2022-10-31 19:54:06'),
(4, 'FAJARNET', 5, '2022-03-31', 1, '2022-03-22 23:16:08', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_22_111329_create_sessions_table', 1),
(7, '2021_11_22_133226_create_admins_table', 1),
(8, '2021_11_25_171114_create_brands_table', 1),
(9, '2021_11_26_220921_create_categories_table', 1),
(10, '2021_11_27_094441_create_sub_categories_table', 1),
(11, '2021_11_28_095935_create_sub_sub_categories_table', 1),
(12, '2021_11_29_001844_create_products_table', 1),
(13, '2021_11_29_004615_create_multi_imgs_table', 1),
(14, '2021_12_04_173513_create_sliders_table', 1),
(15, '2021_12_19_010511_create_wistlists_table', 1),
(16, '2021_12_21_173135_create_coupons_table', 1),
(17, '2021_12_22_112247_create_shippings_table', 1),
(18, '2021_12_23_163400_create_ship_districts_table', 1),
(19, '2021_12_24_095806_create_ship_states_table', 2),
(20, '2022_11_08_133308_create_shipping_addresses_table', 3),
(21, '2022_12_08_064429_create_orders_table', 4),
(22, '2022_12_08_075036_create_order_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/product/multi/1720012567081424.jpeg', '2021-12-24 15:43:29', NULL),
(2, 1, 'upload/product/multi/1720012567459311.jpeg', '2021-12-24 15:43:29', NULL),
(3, 2, 'upload/product/multi/1720018406315276.jpg', '2021-12-24 17:16:18', NULL),
(4, 2, 'upload/product/multi/1748275954889724.jpg', '2021-12-24 17:16:18', '2022-10-31 23:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` int(11) DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_ind` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_ind` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_ind` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_ind`, `product_name_en`, `product_slug_ind`, `product_slug_en`, `product_code`, `product_qty`, `product_tags_ind`, `product_tags_en`, `product_size_ind`, `product_size_en`, `product_color_ind`, `product_color_en`, `selling_price`, `discount_price`, `short_desc_ind`, `short_desc_en`, `long_desc_ind`, `long_desc_en`, `product_thumbnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 'Diamond Murah', 'Chiep Diamond', 'diamond-murah', 'chiep-diamond', '00000001', '10000', 'mobile', 'mobile', '10dm,20dm,30dm,40dm', '10dm,20dm,30dm,40dm', NULL, NULL, '50000', '1000', 'Diamond Termurah', 'CHiep Termurah', '<p>Dear HRD PT. Tek.id</p>\r\n\r\n<p>I&#39;m Hadiid interested in applying for a job vacancy in this company as advertised on the Telegram IT locker Channel.<br />\r\nDuring college I was active in several projects for making website applications (Laravel 8) and android-based applications (Kotlin) using Restful API, some of which can be accessed online. Now I&#39;m building an online store website application.<br />\r\nI am optimistic that this experience can be taken into consideration so that I can be placed as part of your company.<br />\r\nAttached I include my CV where I include the portfolio website link<br />\r\nhttps://hadiid.znnews.my.id/</p>\r\n\r\n<p>Send regards for success&hellip;<br />\r\nHadiid Fajar</p>', '<p>Dear HRD PT. Tek.id</p>\r\n\r\n<p>I&#39;m Hadiid interested in applying for a job vacancy in this company as advertised on the Telegram IT locker Channel.<br />\r\nDuring college I was active in several projects for making website applications (Laravel 8) and android-based applications (Kotlin) using Restful API, some of which can be accessed online. Now I&#39;m building an online store website application.<br />\r\nI am optimistic that this experience can be taken into consideration so that I can be placed as part of your company.<br />\r\nAttached I include my CV where I include the portfolio website link<br />\r\nhttps://hadiid.znnews.my.id/</p>\r\n\r\n<p>Send regards for success&hellip;<br />\r\nHadiid Fajar</p>', 'upload/product/thumbnail/1720012566677005.jpg', 1, 1, 1, 1, 1, '2021-12-24 15:43:29', NULL),
(2, 4, 5, 5, 6, 'YONEX NANORAY 70 LIGHT RUDY HARTONO RAKET BADMINTON ASLI', 'YONEX NANORAY 70 LIGHT RUDY HARTONO RAKET BADMINTON ORIGINAL', 'yonex-nanoray-70-light-rudy-hartono-raket-badminton-asli', 'yonex-nanoray-70-light-rudy-hartono-raket-badminton-original', '0909', '100', 'murah', 'chiep', 'Arcsaber,Nanoray', 'Arcsaber,Nanoray', 'Hitam,Merah', 'Black,Red', '500000', '100000', 'MURAH COK', 'CHIERP BRO', '<p>dadasdasd</p>', '<p>dsaasdas</p>', 'upload/product/thumbnail/1720018405784277.jpg', 1, 1, 1, 1, 1, '2021-12-24 17:16:17', '2021-12-24 17:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9cKMaL9JBjvBDTq3ATpv650PSyttQnHCkcezcnZV', 20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiQ3F6VEdLck92QURyWndTU3RvaG1MU2dhbk1ZckxrVDBvUmxSeHY2TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIwO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkdG0vM2o5eC9kWHFVY0RjYlpsYkNKLlpvTzhPQktIcmtDL2doRzBkeXNxcFZpaEZldk5OcC4iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHRtLzNqOXgvZFhxVWNEY2JabGJDSi5ab084T0JLSHJrQy9naEcwZHlzcXBWaWhGZXZOTnAuIjtzOjQ6ImNhcnQiO2E6MTp7czo3OiJkZWZhdWx0IjtPOjI5OiJJbGx1bWluYXRlXFN1cHBvcnRcQ29sbGVjdGlvbiI6Mjp7czo4OiIAKgBpdGVtcyI7YToyOntzOjMyOiI3MmQzODJiNjkyOGYwNjM1ZmM1OGNjYzgwYmZjOGM3MCI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjExOntzOjU6InJvd0lkIjtzOjMyOiI3MmQzODJiNjkyOGYwNjM1ZmM1OGNjYzgwYmZjOGM3MCI7czoyOiJpZCI7czoxOiIxIjtzOjM6InF0eSI7czoxOiIyIjtzOjQ6Im5hbWUiO3M6MTM6IkRpYW1vbmQgTXVyYWgiO3M6NToicHJpY2UiO2Q6NDkwMDA7czo2OiJ3ZWlnaHQiO2Q6MTtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6Mjp7czo4OiIAKgBpdGVtcyI7YTozOntzOjU6ImltYWdlIjtzOjQ1OiJ1cGxvYWQvcHJvZHVjdC90aHVtYm5haWwvMTcyMDAxMjU2NjY3NzAwNS5qcGciO3M6NToiY29sb3IiO047czo0OiJzaXplIjtzOjQ6IjEwZG0iO31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6NzoidGF4UmF0ZSI7aTowO3M6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0NjoiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGRpc2NvdW50UmF0ZSI7aTowO3M6ODoiaW5zdGFuY2UiO3M6NzoiZGVmYXVsdCI7fXM6MzI6IjgzMGVhZjM2ZmQ5YjFiYWE5NDk1N2ZjMTVkMDhkNjg5IjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6MTE6e3M6NToicm93SWQiO3M6MzI6IjgzMGVhZjM2ZmQ5YjFiYWE5NDk1N2ZjMTVkMDhkNjg5IjtzOjI6ImlkIjtzOjE6IjIiO3M6MzoicXR5IjtzOjE6IjEiO3M6NDoibmFtZSI7czo1NjoiWU9ORVggTkFOT1JBWSA3MCBMSUdIVCBSVURZIEhBUlRPTk8gUkFLRVQgQkFETUlOVE9OIEFTTEkiO3M6NToicHJpY2UiO2Q6NDAwMDAwO3M6Njoid2VpZ2h0IjtkOjE7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjI6e3M6ODoiACoAaXRlbXMiO2E6Mzp7czo1OiJpbWFnZSI7czo0NToidXBsb2FkL3Byb2R1Y3QvdGh1bWJuYWlsLzE3MjAwMTg0MDU3ODQyNzcuanBnIjtzOjU6ImNvbG9yIjtzOjU6IkhpdGFtIjtzOjQ6InNpemUiO3M6ODoiQXJjc2FiZXIiO31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6NzoidGF4UmF0ZSI7aTowO3M6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0NjoiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGRpc2NvdW50UmF0ZSI7aTowO3M6ODoiaW5zdGFuY2UiO3M6NzoiZGVmYXVsdCI7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1675662147);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'Sulawesi Selatan', '2021-12-25 07:32:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_post` int(11) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE `ship_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Makassar', '2021-12-25 07:33:01', NULL),
(2, 1, 'Gowa', '2021-12-25 12:18:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

CREATE TABLE `ship_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Limbung', NULL, '2021-12-25 15:22:22'),
(3, 1, 1, 'Tamalate', '2021-12-25 13:14:06', NULL),
(4, 1, 1, 'Talasapang', '2021-12-25 15:30:25', '2022-03-22 22:52:42'),
(5, 1, 2, 'Pallangga', '2021-12-25 15:30:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider/1720012619104703.jpg', 'GLASSTEA-ESPORT', 'Tim divisi ML', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_ind`, `subcategory_name_en`, `subcategory_slug_ind`, `subcategory_slug_en`, `created_at`, `updated_at`) VALUES
(1, 1, 'MOBA', 'MOBA', 'moba', 'moba', NULL, NULL),
(2, 1, 'FPS', 'FPS', 'fps', 'fps', NULL, NULL),
(3, 2, 'Siap Saji', 'Junk Food', 'siap-saji', 'junk-food', NULL, NULL),
(4, 3, 'Obat', 'Medicine', 'obat', 'medicine', NULL, NULL),
(5, 5, 'Bulutangkis', 'Badminton', 'bulutangkis', 'badminton', NULL, NULL),
(6, 5, 'Sepak Bola', 'Football', 'sepak-bola', 'football', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_ind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_ind`, `subsubcategory_name_en`, `subsubcategory_slug_ind`, `subsubcategory_slug_en`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mobile Legends', 'Mobile Legends', 'mobile-legends', 'mobile-legends', NULL, NULL),
(2, 1, 1, 'DOTA 2', 'DOTA 2', 'dota-2', 'dota-2', NULL, NULL),
(3, 1, 2, 'Valaront', 'Valaront', 'valaront', 'valaront', NULL, NULL),
(4, 2, 3, 'Mie Instan', 'Noddles Instant', 'mie-instan', 'noddles-instant', NULL, NULL),
(5, 3, 4, 'Flu', 'Flu', 'flu', 'flu', NULL, NULL),
(6, 5, 5, 'Racket', 'Racket', 'racket', 'racket', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(20, 'HADIID', 'hadidfajar@rocketmail.com', '085796124090', NULL, '$2y$10$tm/3j9x/dXqUcDcbZlbCJ.ZoO8OBKHrkC/ghG0dysqpVihFevNNp.', NULL, NULL, NULL, NULL, '202112240400CamScanner 09-11-2020 21.19.42 - Page 1 (1).jpg', NULL, '2021-12-25 13:10:49'),
(21, 'Zeronine09', 'user@gmail.com', '08080808', NULL, '$2y$10$fhHZ3nlBQrNgU9QNR17uc.MBfSUmEYRQHX8h7pHd89sK9HWt26X52', NULL, NULL, NULL, NULL, NULL, '2021-12-24 11:55:24', '2021-12-24 11:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `wistlists`
--

CREATE TABLE `wistlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wistlists`
--

INSERT INTO `wistlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 20, 2, '2022-10-25 23:56:41', NULL),
(5, 20, 1, '2023-02-05 19:06:16', NULL);

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_states`
--
ALTER TABLE `ship_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wistlists`
--
ALTER TABLE `wistlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ship_districts`
--
ALTER TABLE `ship_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ship_states`
--
ALTER TABLE `ship_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wistlists`
--
ALTER TABLE `wistlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
