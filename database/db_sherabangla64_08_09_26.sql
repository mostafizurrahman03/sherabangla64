-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2026 at 07:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sherabangla64`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `user_id`, `name`, `slug`, `description`, `logo`, `sort_order`, `is_active`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', 'test', 'testjhhj', 'brands/v1RGe8WGqk1qtNnwVBG7jnjzZQFzRL3AF180c8EC.jpg', 1, 1, 'test', 'test', '2026-08-16 22:21:00', '2026-08-17 04:00:53'),
(2, 2, 'Islamic Studies', 'islamic-studies', 'ghh', 'brands/4qCv6Qe8CTLBkoxndnboOJDgYlllV126v8HDjGDl.jpg', 1, 1, 'test', 'hhgh', '2026-08-16 22:24:10', '2026-08-17 04:01:11');

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
('laravel-cache-dc44958e29ffba8b810d21377ae366b5', 'i:1;', 1788838111),
('laravel-cache-dc44958e29ffba8b810d21377ae366b5:timer', 'i:1788838111;', 1788838111);

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '2026-08-18 03:38:00', '2026-08-18 03:38:00'),
(2, NULL, '79f5aa23-58c7-4918-be0b-13fb32bb2608', '2026-08-18 03:58:21', '2026-08-18 03:58:21'),
(3, NULL, '1216ce80-a162-49f1-b330-4e82f8e8dc17', '2026-08-18 23:07:56', '2026-08-18 23:07:56'),
(4, NULL, '430d847b-bdad-454b-b112-2d69fea9cf13', '2026-08-18 23:07:58', '2026-08-18 23:07:58'),
(5, NULL, 'd13c60e6-ce8c-4788-9341-75819b983bef', '2026-08-19 21:20:18', '2026-08-19 21:20:18'),
(6, NULL, 'a18398af-595e-4540-b88d-cb51e1781dd4', '2026-08-20 03:28:09', '2026-08-20 03:28:09'),
(7, NULL, '97e8430c-3d36-4564-8c43-170cb546e468', '2026-08-21 21:33:07', '2026-08-21 21:33:07'),
(8, NULL, '10435f1b-5c62-41a8-96cb-5d4ccd31685c', '2026-08-21 21:44:14', '2026-08-21 21:44:14'),
(9, NULL, 'bc577b8d-4f5c-46da-91be-c0e7ff21fe9b', '2026-08-21 22:46:15', '2026-08-21 22:46:15'),
(10, NULL, '2827078a-c56f-4a18-9eef-fbe987891046', '2026-08-21 22:53:24', '2026-08-21 22:53:24'),
(11, NULL, 'c2950f2e-3a3d-4bdf-bfd8-1bf5e4dad6e1', '2026-08-22 02:29:56', '2026-08-22 02:29:56'),
(12, NULL, '066585f9-7e34-4b9c-a1d2-d7782cf7d371', '2026-08-22 04:30:49', '2026-08-22 04:30:49'),
(13, NULL, 'aff86eed-7c85-42ad-a6e5-9a526e223e2b', '2026-08-22 05:12:56', '2026-08-22 05:12:56'),
(14, NULL, '9dbab4ff-dfab-4fd1-9985-52ef320c2033', '2026-08-22 22:17:19', '2026-08-22 22:17:19'),
(15, NULL, '9793e8c5-ec92-4a07-b354-48133f2fbb76', '2026-08-22 22:27:14', '2026-08-22 22:27:14'),
(16, NULL, '592a97cd-88a4-4fd6-9987-450c3b98aadf', '2026-08-22 22:27:25', '2026-08-22 22:27:25'),
(17, NULL, 'd4d85a87-4d59-41fe-aecf-7ae3e0bbcb28', '2026-08-22 23:23:19', '2026-08-22 23:23:19'),
(18, NULL, '3ef492f5-3bf9-4463-9790-4bab3263193b', '2026-08-23 02:51:49', '2026-08-23 02:51:49'),
(19, NULL, 'dde1005a-4989-49a3-89b3-456ab4597d1c', '2026-08-23 03:25:36', '2026-08-23 03:25:36'),
(20, NULL, 'af46efc0-f7ee-4e35-874e-a100672a3645', '2026-08-23 03:31:09', '2026-08-23 03:31:09'),
(21, NULL, 'f969f624-ebac-4cb7-9ee8-50bedad9934b', '2026-08-23 05:13:25', '2026-08-23 05:13:25'),
(22, NULL, '2f100707-6cca-406b-87bb-6f97db231086', '2026-08-23 22:41:22', '2026-08-23 22:41:22'),
(23, NULL, '1acc67c8-c80c-4369-98c6-daf87488d807', '2026-08-23 22:53:17', '2026-08-23 22:53:17'),
(24, NULL, '1de16dd3-0b61-4836-a424-c2554a55645a', '2026-08-23 23:01:01', '2026-08-23 23:01:01'),
(25, NULL, 'b6b76eef-2342-4141-8d41-0b4881b915ce', '2026-08-23 23:01:20', '2026-08-23 23:01:20'),
(26, NULL, '92d14812-2661-4883-8a3d-8333a0b1aeaa', '2026-08-23 23:27:07', '2026-08-23 23:27:07'),
(27, NULL, '3fa1afe0-c9af-4264-b942-ad91d72814fd', '2026-08-24 04:23:20', '2026-08-24 04:23:20'),
(28, NULL, 'b13c4496-5c47-489c-98f0-1bf6f21dd0eb', '2026-08-24 22:21:34', '2026-08-24 22:21:34'),
(29, NULL, 'a6552b57-8f70-427f-866c-972f5c44acde', '2026-08-25 02:54:57', '2026-08-25 02:54:57'),
(30, NULL, '546896f1-1d62-4582-a1e1-fe92aa96d74f', '2026-08-26 21:18:10', '2026-08-26 21:18:10'),
(31, NULL, 'cb33aa80-8bf0-4f1e-a487-4a083d3ba2fc', '2026-08-26 21:18:36', '2026-08-26 21:18:36'),
(32, NULL, '35dc49ca-6eb7-4cfc-bff9-7d42152a686f', '2026-08-28 21:08:56', '2026-08-28 21:08:56'),
(33, NULL, '8d124efb-5df1-4768-ae76-002a42965208', '2026-08-28 22:25:25', '2026-08-28 22:25:25'),
(34, NULL, 'a243e25d-1b91-4f8e-a1f6-814bea55b46a', '2026-08-28 22:25:48', '2026-08-28 22:25:48'),
(35, NULL, '516ac9e5-8a6a-4fdf-b0c7-ef9213bbf7c5', '2026-08-30 01:40:30', '2026-08-30 01:40:30'),
(36, NULL, '7eb2692e-51fb-4f6a-8bbd-12e5174e470b', '2026-08-31 22:05:00', '2026-08-31 22:05:00'),
(37, NULL, '3fad2d9f-fbfd-4637-99d8-dc68ed86b774', '2026-09-01 21:59:13', '2026-09-01 21:59:13'),
(38, NULL, 'ab3d8e69-8e8d-4cfb-b279-f93459c941ee', '2026-09-02 21:18:58', '2026-09-02 21:18:58'),
(39, NULL, 'b3e3a182-55d5-4125-ade0-60c2f8f77efa', '2026-09-02 21:19:05', '2026-09-02 21:19:05'),
(40, NULL, 'fcaa69f6-290e-42c7-ac21-5df57d6d8557', '2026-09-04 21:52:11', '2026-09-04 21:52:11'),
(41, NULL, 'bc83577d-eaea-43d3-8c3c-396c8b79e500', '2026-09-05 21:48:25', '2026-09-05 21:48:25'),
(42, NULL, 'd79c09ba-48c4-4738-aca5-f9d172301c09', '2026-09-06 03:56:59', '2026-09-06 03:56:59'),
(43, NULL, 'cd40316f-bcdd-4a28-a437-4c80818243cb', '2026-09-06 03:57:08', '2026-09-06 03:57:08'),
(44, NULL, 'a58d4412-0093-4c9d-b09d-af85dbf324be', '2026-09-06 03:58:45', '2026-09-06 03:58:45'),
(45, NULL, '0e6d38ee-b40b-4884-8abe-e30eddbd7da6', '2026-09-06 03:59:31', '2026-09-06 03:59:31'),
(46, NULL, '91525c00-bada-44bd-b7c9-f79e675e88f1', '2026-09-06 04:06:46', '2026-09-06 04:06:46'),
(47, NULL, 'd909269e-08fd-4405-8f20-9bd475a127f3', '2026-09-06 04:10:53', '2026-09-06 04:10:53'),
(48, NULL, '54d57a69-88c6-4319-b95b-cc7a74d0c129', '2026-09-06 21:30:53', '2026-09-06 21:30:53'),
(49, NULL, 'bb3b9d1d-5dfc-4583-96f5-169878cb15f9', '2026-09-06 21:38:44', '2026-09-06 21:38:44'),
(50, NULL, '0df10fd1-54b6-49ba-b203-222468e860be', '2026-09-06 22:42:13', '2026-09-06 22:42:13'),
(51, NULL, '33fa4a9d-84ec-488b-8045-eaf4b1ec6dc1', '2026-09-07 21:26:55', '2026-09-07 21:26:55'),
(52, NULL, 'a72cc0f0-cee0-46c0-95fa-32f78c304861', '2026-09-07 21:27:13', '2026-09-07 21:27:13'),
(53, NULL, '585acbb2-391c-48aa-9db3-70ac184ebe12', '2026-09-07 21:27:22', '2026-09-07 21:27:22'),
(54, NULL, '78325093-6f05-40b8-8ccc-2cd56de8e949', '2026-09-07 21:28:21', '2026-09-07 21:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `unit_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(3, 11, 1, 1, 90.00, '2026-08-22 02:30:36', '2026-08-22 02:30:36'),
(4, 13, 5, 1, 50.00, '2026-08-22 06:30:47', '2026-08-22 06:30:47'),
(5, 1, 12, 1, 260.00, '2026-08-23 00:38:30', '2026-08-23 00:38:30'),
(6, 20, 6, 1, 450.00, '2026-08-23 03:31:40', '2026-08-23 03:31:40'),
(7, 20, 2, 1, 90.00, '2026-08-23 04:15:13', '2026-08-23 04:15:13'),
(8, 21, 12, 1, 260.00, '2026-08-23 05:24:22', '2026-08-23 05:24:22'),
(9, 21, 6, 1, 450.00, '2026-08-23 06:33:20', '2026-08-23 06:33:20'),
(10, 25, 4, 1, 120.00, '2026-08-23 23:08:54', '2026-08-23 23:08:54'),
(11, 27, 10, 1, 170.00, '2026-08-24 04:24:19', '2026-08-24 04:24:19'),
(12, 1, 20, 1, 180.00, '2026-09-02 05:47:51', '2026-09-02 05:47:51'),
(13, 1, 25, 2, 80.00, '2026-09-06 00:12:36', '2026-09-07 03:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `slug`, `description`, `image`, `sort_order`, `is_active`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 2, 'বাদাম', 'flmuul', NULL, 'categories/TIvarmpmkRLoQ3LhPPR1VPklTHqX1FFZgvTrqQ5R.webp', 0, 1, 'test', 'test', '2026-08-16 23:54:42', '2026-08-22 04:35:36'),
(2, 2, 'মসলা', 'msla', NULL, 'categories/6MEitkkdbHbhTkJa0DOBYDp88ZvC8J0pLLgWQkzT.jpg', 0, 1, NULL, NULL, '2026-08-19 03:33:37', '2026-08-19 03:33:37'),
(3, 2, 'আচার', 'mach-mangs', NULL, 'categories/dGGdIt48miSbdqsKgJ4wNf91AIIg0daEtWY3cfSI.jpg', 0, 1, NULL, NULL, '2026-08-19 03:36:41', '2026-08-22 04:34:39'),
(4, 2, 'চাল', 'dim-dudh-pnir', NULL, 'categories/vAsz67hGAutGiFVqon6ARer2REYF06Fe2avgAwEd.jpg', 0, 1, NULL, NULL, '2026-08-19 03:37:26', '2026-08-22 04:34:00'),
(5, 2, 'ঘি', 'sak-sbji', NULL, 'categories/1oegIrqf4JO43kS46EHJXIGYV5ZzDYhGQ9lrHNmb.jpg', 0, 1, NULL, NULL, '2026-08-19 03:38:02', '2026-08-22 04:33:41'),
(6, 2, 'তেল', 'tel-ghi-msla', NULL, 'categories/EaM9OebT1EtcQM2oRBavCDoIqv9cOlqErtCzyWvH.jpg', 0, 1, NULL, NULL, '2026-08-19 03:40:38', '2026-08-22 04:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_type` enum('PERCENTAGE','FIXED_AMOUNT','FREE_SHIPPING') NOT NULL,
  `discount_value` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `minimum_order_amount` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `max_discount_amount` decimal(19,4) DEFAULT NULL,
  `usage_limit` int(10) UNSIGNED DEFAULT NULL,
  `per_user_limit` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `thana_id` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone_number`, `password`, `district_id`, `thana_id`, `address`, `is_verified`, `is_active`, `last_login_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Asif', NULL, '+1 (127) 194-6545', NULL, 12, 104, 'KandaparaBazar', 0, 1, NULL, NULL, '2026-09-06 23:56:40', '2026-09-06 23:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `code`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(2, 1, 'Feni', 'ফেনী', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(5, 1, 'Noakhali', 'নোয়াখালী', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(6, 1, 'Chandpur', 'চাঁদপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(11, 1, 'Bandarban', 'বান্দরবান', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(13, 2, 'Pabna', 'পাবনা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(14, 2, 'Bogura', 'বগুড়া', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(15, 2, 'Rajshahi', 'রাজশাহী', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(16, 2, 'Natore', 'নাটোর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(19, 2, 'Naogaon', 'নওগাঁ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(20, 3, 'Jashore', 'যশোর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(22, 3, 'Meherpur', 'মেহেরপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(23, 3, 'Narail', 'নড়াইল', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(26, 3, 'Magura', 'মাগুরা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(27, 3, 'Khulna', 'খুলনা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(32, 4, 'Pirojpur', 'পিরোজপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(33, 4, 'Barisal', 'বরিশাল', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(34, 4, 'Bhola', 'ভোলা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(35, 4, 'Barguna', 'বরগুনা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(36, 5, 'Sylhet', 'সিলেট', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(40, 6, 'Narsingdi', 'নরসিংদী', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(41, 6, 'Gazipur', 'গাজীপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(44, 6, 'Tangail', 'টাঙ্গাইল', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(47, 6, 'Dhaka', 'ঢাকা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(50, 6, 'Madaripur', 'মাদারীপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(52, 6, 'Faridpur', 'ফরিদপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(56, 7, 'Nilphamari', 'নীলফামারী', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(59, 7, 'Rangpur', 'রংপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(61, 8, 'Sherpur', 'শেরপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(63, 8, 'Jamalpur', 'জামালপুর', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '', 1, NULL, '2026-09-02 09:24:28', '2026-09-02 09:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `districts123`
--

CREATE TABLE `districts123` (
  `id` int(10) UNSIGNED NOT NULL,
  `division` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `thana` varchar(255) NOT NULL,
  `postoffice` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts123`
--

INSERT INTO `districts123` (`id`, `division`, `district`, `thana`, `postoffice`, `postcode`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Dhaka', 'Demra', 'Demra', '1360', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(2, 'Dhaka', 'Dhaka', 'Demra', 'Matuail', '1362', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(3, 'Dhaka', 'Dhaka', 'Demra', 'Sarulia', '1361', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(4, 'Dhaka', 'Dhaka', 'Dhaka Cantt.', 'Dhaka CantonmentTSO', '1206', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(5, 'Dhaka', 'Dhaka', 'Dhamrai', 'Dhamrai', '1350', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(6, 'Dhaka', 'Dhaka', 'Dhamrai', 'Kamalpur', '1351', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(7, 'Dhaka', 'Dhaka', 'Dhanmondi', 'Jigatala TSO', '1209', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(8, 'Dhaka', 'Dhaka', 'Gulshan', 'Banani TSO', '1213', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(9, 'Dhaka', 'Dhaka', 'Gulshan', 'Gulshan Model Town', '1212', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(10, 'Dhaka', 'Dhaka', 'Jatrabari', 'Dhania TSO', '1232', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(11, 'Dhaka', 'Dhaka', 'Joypara', 'Joypara', '1330', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(12, 'Dhaka', 'Dhaka', 'Joypara', 'Narisha', '1332', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(13, 'Dhaka', 'Dhaka', 'Joypara', 'Palamganj', '1331', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(14, 'Dhaka', 'Dhaka', 'Keraniganj', 'Ati', '1312', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(15, 'Dhaka', 'Dhaka', 'Keraniganj', 'Dhaka Jute Mills', '1311', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(16, 'Dhaka', 'Dhaka', 'Keraniganj', 'Kalatia', '1313', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(17, 'Dhaka', 'Dhaka', 'Keraniganj', 'Keraniganj', '1310', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(18, 'Dhaka', 'Dhaka', 'Khilgaon', 'KhilgaonTSO', '1219', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(19, 'Dhaka', 'Dhaka', 'Khilkhet', 'KhilkhetTSO', '1229', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(20, 'Dhaka', 'Dhaka', 'Lalbag', 'Posta TSO', '1211', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(21, 'Dhaka', 'Dhaka', 'Mirpur', 'Mirpur TSO', '1216', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(22, 'Dhaka', 'Dhaka', 'Mohammadpur', 'Mohammadpur Housing', '1207', '2015-06-25 05:41:13', '2015-06-25 05:41:13'),
(23, 'Dhaka', 'Dhaka', 'Mohammadpur', 'Sangsad BhabanTSO', '1225', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(24, 'Dhaka', 'Dhaka', 'Motijheel', 'BangabhabanTSO', '1222', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(25, 'Dhaka', 'Dhaka', 'Motijheel', 'DilkushaTSO', '1223', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(26, 'Dhaka', 'Dhaka', 'Nawabganj', 'Agla', '1323', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(27, 'Dhaka', 'Dhaka', 'Nawabganj', 'Churain', '1325', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(28, 'Dhaka', 'Dhaka', 'Nawabganj', 'Daudpur', '1322', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(29, 'Dhaka', 'Dhaka', 'Nawabganj', 'Hasnabad', '1321', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(30, 'Dhaka', 'Dhaka', 'Nawabganj', 'Khalpar', '1324', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(31, 'Dhaka', 'Dhaka', 'Nawabganj', 'Nawabganj', '1320', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(32, 'Dhaka', 'Dhaka', 'New market', 'New Market TSO', '1205', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(33, 'Dhaka', 'Dhaka', 'Palton', 'Dhaka GPO', '1000', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(34, 'Dhaka', 'Dhaka', 'Ramna', 'Shantinagr TSO', '1217', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(35, 'Dhaka', 'Dhaka', 'Sabujbag', 'Basabo TSO', '1214', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(36, 'Dhaka', 'Dhaka', 'Savar', 'Amin Bazar', '1348', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(37, 'Dhaka', 'Dhaka', 'Savar', 'Dairy Farm', '1341', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(38, 'Dhaka', 'Dhaka', 'Savar', 'EPZ', '1349', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(39, 'Dhaka', 'Dhaka', 'Savar', 'Jahangirnagar Univer', '1342', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(40, 'Dhaka', 'Dhaka', 'Savar', 'Kashem Cotton Mills', '1346', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(41, 'Dhaka', 'Dhaka', 'Savar', 'Rajphulbaria', '1347', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(42, 'Dhaka', 'Dhaka', 'Savar', 'Savar', '1340', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(43, 'Dhaka', 'Dhaka', 'Savar', 'Savar Canttonment', '1344', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(44, 'Dhaka', 'Dhaka', 'Savar', 'Saver P.A.T.C', '1343', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(45, 'Dhaka', 'Dhaka', 'Savar', 'Shimulia', '1345', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(46, 'Dhaka', 'Dhaka', 'Sutrapur', 'Dhaka Sadar HO', '1100', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(47, 'Dhaka', 'Dhaka', 'Sutrapur', 'Gendaria TSO', '1204', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(48, 'Dhaka', 'Dhaka', 'Sutrapur', 'Wari TSO', '1203', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(49, 'Dhaka', 'Dhaka', 'Tejgaon', 'Tejgaon TSO', '1215', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(50, 'Dhaka', 'Dhaka', 'Tejgaon Industrial Area', 'Dhaka Politechnic', '1208', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(51, 'Dhaka', 'Dhaka', 'Uttara', 'Uttara Model TwonTSO', '1230', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(52, 'Dhaka', 'Faridpur', 'Alfadanga', 'Alfadanga', '7870', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(53, 'Dhaka', 'Faridpur', 'Bhanga', 'Bhanga', '7830', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(54, 'Dhaka', 'Faridpur', 'Boalmari', 'Boalmari', '7860', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(55, 'Dhaka', 'Faridpur', 'Boalmari', 'Rupatpat', '7861', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(56, 'Dhaka', 'Faridpur', 'Charbhadrasan', 'Charbadrashan', '7810', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(57, 'Dhaka', 'Faridpur', 'Faridpur Sadar', 'Ambikapur', '7802', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(58, 'Dhaka', 'Faridpur', 'Faridpur Sadar', 'Baitulaman Politecni', '7803', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(59, 'Dhaka', 'Faridpur', 'Faridpur Sadar', 'Faridpursadar', '7800', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(60, 'Dhaka', 'Faridpur', 'Faridpur Sadar', 'Kanaipur', '7801', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(61, 'Dhaka', 'Faridpur', 'Madukhali', 'Kamarkali', '7851', '2015-06-25 05:41:14', '2015-06-25 05:41:14'),
(62, 'Dhaka', 'Faridpur', 'Madukhali', 'Madukhali', '7850', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(63, 'Dhaka', 'Faridpur', 'Nagarkanda', 'Nagarkanda', '7840', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(64, 'Dhaka', 'Faridpur', 'Nagarkanda', 'Talma', '7841', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(65, 'Dhaka', 'Faridpur', 'Sadarpur', 'Bishwa jaker Manjil', '7822', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(66, 'Dhaka', 'Faridpur', 'Sadarpur', 'Hat Krishapur', '7821', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(67, 'Dhaka', 'Faridpur', 'Sadarpur', 'Sadarpur', '7820', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(68, 'Dhaka', 'Faridpur', 'Shriangan', 'Shriangan', '7804', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(69, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'B.O.F', '1703', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(70, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'B.R.R', '1701', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(71, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'Chandna', '1702', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(72, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'Gazipur Sadar', '1700', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(73, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'National University', '1704', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(74, 'Dhaka', 'Gazipur', 'Kaliakaar', 'Kaliakaar', '1750', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(75, 'Dhaka', 'Gazipur', 'Kaliakaar', 'Safipur', '1751', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(76, 'Dhaka', 'Gazipur', 'Kaliganj', 'Kaliganj', '1720', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(77, 'Dhaka', 'Gazipur', 'Kaliganj', 'Pubail', '1721', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(78, 'Dhaka', 'Gazipur', 'Kaliganj', 'Santanpara', '1722', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(79, 'Dhaka', 'Gazipur', 'Kaliganj', 'Vaoal Jamalpur', '1723', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(80, 'Dhaka', 'Gazipur', 'Kapashia', 'kapashia', '1730', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(81, 'Dhaka', 'Gazipur', 'Monnunagar', 'Ershad Nagar', '1712', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(82, 'Dhaka', 'Gazipur', 'Monnunagar', 'Monnunagar', '1710', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(83, 'Dhaka', 'Gazipur', 'Monnunagar', 'Nishat Nagar', '1711', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(84, 'Dhaka', 'Gazipur', 'Sreepur', 'Barmi', '1743', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(85, 'Dhaka', 'Gazipur', 'Sreepur', 'Bashamur', '1747', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(86, 'Dhaka', 'Gazipur', 'Sreepur', 'Boubi', '1748', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(87, 'Dhaka', 'Gazipur', 'Sreepur', 'Kawraid', '1745', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(88, 'Dhaka', 'Gazipur', 'Sreepur', 'Satkhamair', '1744', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(89, 'Dhaka', 'Gazipur', 'Sreepur', 'Sreepur', '1740', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(90, 'Dhaka', 'Gazipur', 'Sripur', 'Rajendrapur', '1741', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(91, 'Dhaka', 'Gazipur', 'Sripur', 'Rajendrapur Canttome', '1742', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(92, 'Dhaka', 'Gopalganj', 'Gopalganj Sadar', 'Barfa', '8102', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(93, 'Dhaka', 'Gopalganj', 'Gopalganj Sadar', 'Chandradighalia', '8013', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(94, 'Dhaka', 'Gopalganj', 'Gopalganj Sadar', 'Gopalganj Sadar', '8100', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(95, 'Dhaka', 'Gopalganj', 'Gopalganj Sadar', 'Ulpur', '8101', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(96, 'Dhaka', 'Gopalganj', 'Kashiani', 'Jonapur', '8133', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(97, 'Dhaka', 'Gopalganj', 'Kashiani', 'Kashiani', '8130', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(98, 'Dhaka', 'Gopalganj', 'Kashiani', 'Ramdia College', '8131', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(99, 'Dhaka', 'Gopalganj', 'Kashiani', 'Ratoil', '8132', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(100, 'Dhaka', 'Gopalganj', 'Kotalipara', 'Kotalipara', '8110', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(101, 'Dhaka', 'Gopalganj', 'Maksudpur', 'Batkiamari', '8141', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(102, 'Dhaka', 'Gopalganj', 'Maksudpur', 'Khandarpara', '8142', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(103, 'Dhaka', 'Gopalganj', 'Maksudpur', 'Maksudpur', '8140', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(104, 'Dhaka', 'Gopalganj', 'Tungipara', 'Patgati', '8121', '2015-06-25 05:41:15', '2015-06-25 05:41:15'),
(105, 'Dhaka', 'Gopalganj', 'Tungipara', 'Tungipara', '8120', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(106, 'Dhaka', 'Jamalpur', 'Dewangonj', 'Dewangonj', '2030', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(107, 'Dhaka', 'Jamalpur', 'Dewangonj', 'Dewangonj S. Mills', '2031', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(108, 'Dhaka', 'Jamalpur', 'Islampur', 'Durmoot', '2021', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(109, 'Dhaka', 'Jamalpur', 'Islampur', 'Gilabari', '2022', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(110, 'Dhaka', 'Jamalpur', 'Islampur', 'Islampur', '2020', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(111, 'Dhaka', 'Jamalpur', 'Jamalpur', 'Jamalpur', '2000', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(112, 'Dhaka', 'Jamalpur', 'Jamalpur', 'Nandina', '2001', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(113, 'Dhaka', 'Jamalpur', 'Jamalpur', 'Narundi', '2002', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(114, 'Dhaka', 'Jamalpur', 'Malandah', 'Jamalpur', '2011', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(115, 'Dhaka', 'Jamalpur', 'Malandah', 'Mahmoodpur', '2013', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(116, 'Dhaka', 'Jamalpur', 'Malandah', 'Malancha', '2012', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(117, 'Dhaka', 'Jamalpur', 'Malandah', 'Malandah', '2010', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(118, 'Dhaka', 'Jamalpur', 'Mathargonj', 'Balijhuri', '2041', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(119, 'Dhaka', 'Jamalpur', 'Mathargonj', 'Mathargonj', '2040', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(120, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Bausee', '2052', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(121, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Gunerbari', '2051', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(122, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Jagannath Ghat', '2053', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(123, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Jamuna Sar Karkhana', '2055', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(124, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Pingna', '2054', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(125, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Shorishabari', '2050', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(126, 'Dhaka', 'Kishoreganj', 'Bajitpur', 'Bajitpur', '2336', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(127, 'Dhaka', 'Kishoreganj', 'Bajitpur', 'Laksmipur', '2338', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(128, 'Dhaka', 'Kishoreganj', 'Bajitpur', 'Sararchar', '2337', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(129, 'Dhaka', 'Kishoreganj', 'Bhairob', 'Bhairab', '2350', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(130, 'Dhaka', 'Kishoreganj', 'Hossenpur', 'Hossenpur', '2320', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(131, 'Dhaka', 'Kishoreganj', 'Itna', 'Itna', '2390', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(132, 'Dhaka', 'Kishoreganj', 'Karimganj', 'Karimganj', '2310', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(133, 'Dhaka', 'Kishoreganj', 'Katiadi', 'Gochhihata', '2331', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(134, 'Dhaka', 'Kishoreganj', 'Katiadi', 'Katiadi', '2330', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(135, 'Dhaka', 'Kishoreganj', 'Kishoreganj Sadar', 'Kishoreganj S.Mills', '2301', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(136, 'Dhaka', 'Kishoreganj', 'Kishoreganj Sadar', 'Kishoreganj Sadar', '2300', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(137, 'Dhaka', 'Kishoreganj', 'Kishoreganj Sadar', 'Maizhati', '2302', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(138, 'Dhaka', 'Kishoreganj', 'Kishoreganj Sadar', 'Nilganj', '2303', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(139, 'Dhaka', 'Kishoreganj', 'Kuliarchar', 'Chhoysuti', '2341', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(140, 'Dhaka', 'Kishoreganj', 'Kuliarchar', 'Kuliarchar', '2340', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(141, 'Dhaka', 'Kishoreganj', 'Mithamoin', 'Abdullahpur', '2371', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(142, 'Dhaka', 'Kishoreganj', 'Mithamoin', 'MIthamoin', '2370', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(143, 'Dhaka', 'Kishoreganj', 'Nikli', 'Nikli', '2360', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(144, 'Dhaka', 'Kishoreganj', 'Ostagram', 'Ostagram', '2380', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(145, 'Dhaka', 'Kishoreganj', 'Pakundia', 'Pakundia', '2326', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(146, 'Dhaka', 'Kishoreganj', 'Tarial', 'Tarial', '2316', '2015-06-25 05:41:16', '2015-06-25 05:41:16'),
(147, 'Dhaka', 'Madaripur', 'Barhamganj', 'Bahadurpur', '7932', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(148, 'Dhaka', 'Madaripur', 'Barhamganj', 'Barhamganj', '7930', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(149, 'Dhaka', 'Madaripur', 'Barhamganj', 'Nilaksmibandar', '7931', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(150, 'Dhaka', 'Madaripur', 'Barhamganj', 'Umedpur', '7933', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(151, 'Dhaka', 'Madaripur', 'kalkini', 'Kalkini', '7920', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(152, 'Dhaka', 'Madaripur', 'kalkini', 'Sahabrampur', '7921', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(153, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Charmugria', '7901', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(154, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Habiganj', '7903', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(155, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Kulpaddi', '7902', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(156, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Madaripur Sadar', '7900', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(157, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Mustafapur', '7904', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(158, 'Dhaka', 'Madaripur', 'Rajoir', 'Khalia', '7911', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(159, 'Dhaka', 'Madaripur', 'Rajoir', 'Rajoir', '7910', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(160, 'Dhaka', 'Manikganj', 'Doulatpur', 'Doulatpur', '1860', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(161, 'Dhaka', 'Manikganj', 'Gheor', 'Gheor', '1840', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(162, 'Dhaka', 'Manikganj', 'Lechhraganj', 'Jhitka', '1831', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(163, 'Dhaka', 'Manikganj', 'Lechhraganj', 'Lechhraganj', '1830', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(164, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Barangail', '1804', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(165, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Gorpara', '1802', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(166, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Mahadebpur', '1803', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(167, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Manikganj Bazar', '1801', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(168, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Manikganj Sadar', '1800', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(169, 'Dhaka', 'Manikganj', 'Saturia', 'Baliati', '1811', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(170, 'Dhaka', 'Manikganj', 'Saturia', 'Saturia', '1810', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(171, 'Dhaka', 'Manikganj', 'Shibloya', 'Aricha', '1851', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(172, 'Dhaka', 'Manikganj', 'Shibloya', 'Shibaloy', '1850', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(173, 'Dhaka', 'Manikganj', 'Shibloya', 'Tewta', '1852', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(174, 'Dhaka', 'Manikganj', 'Shibloya', 'Uthli', '1853', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(175, 'Dhaka', 'Manikganj', 'Singari', 'Baira', '1821', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(176, 'Dhaka', 'Manikganj', 'Singari', 'joymantop', '1822', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(177, 'Dhaka', 'Manikganj', 'Singari', 'Singair', '1820', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(178, 'Dhaka', 'Munshiganj', 'Gajaria', 'Gajaria', '1510', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(179, 'Dhaka', 'Munshiganj', 'Gajaria', 'Hossendi', '1511', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(180, 'Dhaka', 'Munshiganj', 'Gajaria', 'Rasulpur', '1512', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(181, 'Dhaka', 'Munshiganj', 'Lohajong', 'Gouragonj', '1334', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(182, 'Dhaka', 'Munshiganj', 'Lohajong', 'Gouragonj', '1534', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(183, 'Dhaka', 'Munshiganj', 'Lohajong', 'Haldia SO', '1532', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(184, 'Dhaka', 'Munshiganj', 'Lohajong', 'Haridia', '1333', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(185, 'Dhaka', 'Munshiganj', 'Lohajong', 'Haridia DESO', '1533', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(186, 'Dhaka', 'Munshiganj', 'Lohajong', 'Korhati', '1531', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(187, 'Dhaka', 'Munshiganj', 'Lohajong', 'Lohajang', '1530', '2015-06-25 05:41:17', '2015-06-25 05:41:17'),
(188, 'Dhaka', 'Munshiganj', 'Lohajong', 'Madini Mandal', '1335', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(189, 'Dhaka', 'Munshiganj', 'Lohajong', 'Medini Mandal EDSO', '1535', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(190, 'Dhaka', 'Munshiganj', 'Munshiganj Sadar', 'Kathakhali', '1503', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(191, 'Dhaka', 'Munshiganj', 'Munshiganj Sadar', 'Mirkadim', '1502', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(192, 'Dhaka', 'Munshiganj', 'Munshiganj Sadar', 'Munshiganj Sadar', '1500', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(193, 'Dhaka', 'Munshiganj', 'Munshiganj Sadar', 'Rikabibazar', '1501', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(194, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Ichapur', '1542', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(195, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Kola', '1541', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(196, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Malkha Nagar', '1543', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(197, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Shekher Nagar', '1544', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(198, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Sirajdikhan', '1540', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(199, 'Dhaka', 'Munshiganj', 'Srinagar', 'Baghra', '1557', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(200, 'Dhaka', 'Munshiganj', 'Srinagar', 'Barikhal', '1551', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(201, 'Dhaka', 'Munshiganj', 'Srinagar', 'Bhaggyakul', '1558', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(202, 'Dhaka', 'Munshiganj', 'Srinagar', 'Hashara', '1553', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(203, 'Dhaka', 'Munshiganj', 'Srinagar', 'Kolapara', '1554', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(204, 'Dhaka', 'Munshiganj', 'Srinagar', 'Kumarbhog', '1555', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(205, 'Dhaka', 'Munshiganj', 'Srinagar', 'Mazpara', '1552', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(206, 'Dhaka', 'Munshiganj', 'Srinagar', 'Srinagar', '1550', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(207, 'Dhaka', 'Munshiganj', 'Srinagar', 'Vaggyakul SO', '1556', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(208, 'Dhaka', 'Munshiganj', 'Tangibari', 'Bajrajugini', '1523', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(209, 'Dhaka', 'Munshiganj', 'Tangibari', 'Baligao', '1522', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(210, 'Dhaka', 'Munshiganj', 'Tangibari', 'Betkahat', '1521', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(211, 'Dhaka', 'Munshiganj', 'Tangibari', 'Dighirpar', '1525', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(212, 'Dhaka', 'Munshiganj', 'Tangibari', 'Hasail', '1524', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(213, 'Dhaka', 'Munshiganj', 'Tangibari', 'Pura', '1527', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(214, 'Dhaka', 'Munshiganj', 'Tangibari', 'Pura EDSO', '1526', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(215, 'Dhaka', 'Munshiganj', 'Tangibari', 'Tangibari', '1520', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(216, 'Dhaka', 'Mymensingh', 'Bhaluka', 'Bhaluka', '2240', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(217, 'Dhaka', 'Mymensingh', 'Fulbaria', 'Fulbaria', '2216', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(218, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Duttarbazar', '2234', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(219, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Gaforgaon', '2230', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(220, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Kandipara', '2233', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(221, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Shibganj', '2231', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(222, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Usti', '2232', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(223, 'Dhaka', 'Mymensingh', 'Gouripur', 'Gouripur', '2270', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(224, 'Dhaka', 'Mymensingh', 'Gouripur', 'Ramgopalpur', '2271', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(225, 'Dhaka', 'Mymensingh', 'Haluaghat', 'Dhara', '2261', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(226, 'Dhaka', 'Mymensingh', 'Haluaghat', 'Haluaghat', '2260', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(227, 'Dhaka', 'Mymensingh', 'Haluaghat', 'Munshirhat', '2262', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(228, 'Dhaka', 'Mymensingh', 'Isshwargonj', 'Atharabari', '2282', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(229, 'Dhaka', 'Mymensingh', 'Isshwargonj', 'Isshwargonj', '2280', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(230, 'Dhaka', 'Mymensingh', 'Isshwargonj', 'Sohagi', '2281', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(231, 'Dhaka', 'Mymensingh', 'Muktagachha', 'Muktagachha', '2210', '2015-06-25 05:41:18', '2015-06-25 05:41:18'),
(232, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Agriculture Universi', '2202', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(233, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Biddyaganj', '2204', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(234, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Kawatkhali', '2201', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(235, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Mymensingh Sadar', '2200', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(236, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Pearpur', '2205', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(237, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Shombhuganj', '2203', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(238, 'Dhaka', 'Mymensingh', 'Nandail', 'Gangail', '2291', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(239, 'Dhaka', 'Mymensingh', 'Nandail', 'Nandail', '2290', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(240, 'Dhaka', 'Mymensingh', 'Phulpur', 'Beltia', '2251', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(241, 'Dhaka', 'Mymensingh', 'Phulpur', 'Phulpur', '2250', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(242, 'Dhaka', 'Mymensingh', 'Phulpur', 'Tarakanda', '2252', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(243, 'Dhaka', 'Mymensingh', 'Trishal', 'Ahmadbad', '2221', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(244, 'Dhaka', 'Mymensingh', 'Trishal', 'Dhala', '2223', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(245, 'Dhaka', 'Mymensingh', 'Trishal', 'Ram Amritaganj', '2222', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(246, 'Dhaka', 'Mymensingh', 'Trishal', 'Trishal', '2220', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(247, 'Dhaka', 'Narayanganj', 'Araihazar', 'Araihazar', '1450', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(248, 'Dhaka', 'Narayanganj', 'Araihazar', 'Gopaldi', '1451', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(249, 'Dhaka', 'Narayanganj', 'Baidder Bazar', 'Baidder Bazar', '1440', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(250, 'Dhaka', 'Narayanganj', 'Baidder Bazar', 'Bara Nagar', '1441', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(251, 'Dhaka', 'Narayanganj', 'Baidder Bazar', 'Barodi', '1442', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(252, 'Dhaka', 'Narayanganj', 'Bandar', 'Bandar', '1410', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(253, 'Dhaka', 'Narayanganj', 'Bandar', 'BIDS', '1413', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(254, 'Dhaka', 'Narayanganj', 'Bandar', 'D.C Mills', '1411', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(255, 'Dhaka', 'Narayanganj', 'Bandar', 'Madanganj', '1414', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(256, 'Dhaka', 'Narayanganj', 'Bandar', 'Nabiganj', '1412', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(257, 'Dhaka', 'Narayanganj', 'Fatullah', 'Fatulla Bazar', '1421', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(258, 'Dhaka', 'Narayanganj', 'Fatullah', 'Fatullah', '1420', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(259, 'Dhaka', 'Narayanganj', 'Narayanganj Sadar', 'Narayanganj Sadar', '1400', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(260, 'Dhaka', 'Narayanganj', 'Rupganj', 'Bhulta', '1462', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(261, 'Dhaka', 'Narayanganj', 'Rupganj', 'Kanchan', '1461', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(262, 'Dhaka', 'Narayanganj', 'Rupganj', 'Murapara', '1464', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(263, 'Dhaka', 'Narayanganj', 'Rupganj', 'Nagri', '1463', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(264, 'Dhaka', 'Narayanganj', 'Rupganj', 'Rupganj', '1460', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(265, 'Dhaka', 'Narayanganj', 'Siddirganj', 'Adamjeenagar', '1431', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(266, 'Dhaka', 'Narayanganj', 'Siddirganj', 'LN Mills', '1432', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(267, 'Dhaka', 'Narayanganj', 'Siddirganj', 'Siddirganj', '1430', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(268, 'Dhaka', 'Narshingdi', 'Belabo', 'Belabo', '1640', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(269, 'Dhaka', 'Narshingdi', 'Monohordi', 'Hatirdia', '1651', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(270, 'Dhaka', 'Narshingdi', 'Monohordi', 'Katabaria', '1652', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(271, 'Dhaka', 'Narshingdi', 'Monohordi', 'Monohordi', '1650', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(272, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Karimpur', '1605', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(273, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Madhabdi', '1604', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(274, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Narshingdi College', '1602', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(275, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Narshingdi Sadar', '1600', '2015-06-25 05:41:19', '2015-06-25 05:41:19'),
(276, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Panchdona', '1603', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(277, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'UMC Jute Mills', '1601', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(278, 'Dhaka', 'Narshingdi', 'Palash', 'Char Sindhur', '1612', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(279, 'Dhaka', 'Narshingdi', 'Palash', 'Ghorashal', '1613', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(280, 'Dhaka', 'Narshingdi', 'Palash', 'Ghorashal Urea Facto', '1611', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(281, 'Dhaka', 'Narshingdi', 'Palash', 'Palash', '1610', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(282, 'Dhaka', 'Narshingdi', 'Raypura', 'Bazar Hasnabad', '1631', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(283, 'Dhaka', 'Narshingdi', 'Raypura', 'Radhaganj bazar', '1632', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(284, 'Dhaka', 'Narshingdi', 'Raypura', 'Raypura', '1630', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(285, 'Dhaka', 'Narshingdi', 'Shibpur', 'Shibpur', '1620', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(286, 'Dhaka', 'Netrakona', 'Susung Durgapur', 'Susnng Durgapur', '2420', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(287, 'Dhaka', 'Netrakona', 'Atpara', 'Atpara', '2470', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(288, 'Dhaka', 'Netrakona', 'Barhatta', 'Barhatta', '2440', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(289, 'Dhaka', 'Netrakona', 'Dharmapasha', 'Dharampasha', '2450', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(290, 'Dhaka', 'Netrakona', 'Dhobaura', 'Dhobaura', '2416', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(291, 'Dhaka', 'Netrakona', 'Dhobaura', 'Sakoai', '2417', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(292, 'Dhaka', 'Netrakona', 'Kalmakanda', 'Kalmakanda', '2430', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(293, 'Dhaka', 'Netrakona', 'Kendua', 'Kendua', '2480', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(294, 'Dhaka', 'Netrakona', 'Khaliajuri', 'Khaliajhri', '2460', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(295, 'Dhaka', 'Netrakona', 'Khaliajuri', 'Shaldigha', '2462', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(296, 'Dhaka', 'Netrakona', 'Madan', 'Madan', '2490', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(297, 'Dhaka', 'Netrakona', 'Moddhynagar', 'Moddoynagar', '2456', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(298, 'Dhaka', 'Netrakona', 'Mohanganj', 'Mohanganj', '2446', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(299, 'Dhaka', 'Netrakona', 'Netrakona Sadar', 'Baikherhati', '2401', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(300, 'Dhaka', 'Netrakona', 'Netrakona Sadar', 'Netrakona Sadar', '2400', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(301, 'Dhaka', 'Netrakona', 'Purbadhola', 'Jaria Jhanjhail', '2412', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(302, 'Dhaka', 'Netrakona', 'Purbadhola', 'Purbadhola', '2410', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(303, 'Dhaka', 'Netrakona', 'Purbadhola', 'Shamgonj', '2411', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(304, 'Dhaka', 'Rajbari', 'Baliakandi', 'Baliakandi', '7730', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(305, 'Dhaka', 'Rajbari', 'Baliakandi', 'Nalia', '7731', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(306, 'Dhaka', 'Rajbari', 'Pangsha', 'Mrigibazar', '7723', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(307, 'Dhaka', 'Rajbari', 'Pangsha', 'Pangsha', '7720', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(308, 'Dhaka', 'Rajbari', 'Pangsha', 'Ramkol', '7721', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(309, 'Dhaka', 'Rajbari', 'Pangsha', 'Ratandia', '7722', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(310, 'Dhaka', 'Rajbari', 'Rajbari Sadar', 'Goalanda', '7710', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(311, 'Dhaka', 'Rajbari', 'Rajbari Sadar', 'Khankhanapur', '7711', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(312, 'Dhaka', 'Rajbari', 'Rajbari Sadar', 'Rajbari Sadar', '7700', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(313, 'Dhaka', 'Shariatpur', 'Bhedorganj', 'Bhedorganj', '8030', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(314, 'Dhaka', 'Shariatpur', 'Damudhya', 'Damudhya', '8040', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(315, 'Dhaka', 'Shariatpur', 'Gosairhat', 'Gosairhat', '8050', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(316, 'Dhaka', 'Shariatpur', 'Jajira', 'Jajira', '8010', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(317, 'Dhaka', 'Shariatpur', 'Naria', 'Bhozeshwar', '8021', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(318, 'Dhaka', 'Shariatpur', 'Naria', 'Gharisar', '8022', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(319, 'Dhaka', 'Shariatpur', 'Naria', 'Kartikpur', '8024', '2015-06-25 05:41:20', '2015-06-25 05:41:20'),
(320, 'Dhaka', 'Shariatpur', 'Naria', 'Naria', '8020', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(321, 'Dhaka', 'Shariatpur', 'Naria', 'Upshi', '8023', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(322, 'Dhaka', 'Shariatpur', 'Shariatpur Sadar', 'Angaria', '8001', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(323, 'Dhaka', 'Shariatpur', 'Shariatpur Sadar', 'Chikandi', '8002', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(324, 'Dhaka', 'Shariatpur', 'Shariatpur Sadar', 'Shariatpur Sadar', '8000', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(325, 'Dhaka', 'Sherpur', 'Bakshigonj', 'Bakshigonj', '2140', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(326, 'Dhaka', 'Sherpur', 'Jhinaigati', 'Jhinaigati', '2120', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(327, 'Dhaka', 'Sherpur', 'Nakla', 'Gonopaddi', '2151', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(328, 'Dhaka', 'Sherpur', 'Nakla', 'Nakla', '2150', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(329, 'Dhaka', 'Sherpur', 'Nalitabari', 'Hatibandha', '2111', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(330, 'Dhaka', 'Sherpur', 'Nalitabari', 'Nalitabari', '2110', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(331, 'Dhaka', 'Sherpur', 'Sherpur Shadar', 'Sherpur Shadar', '2100', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(332, 'Dhaka', 'Sherpur', 'Shribardi', 'Shribardi', '2130', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(333, 'Dhaka', 'Tangail', 'Basail', 'Basail', '1920', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(334, 'Dhaka', 'Tangail', 'Bhuapur', 'Bhuapur', '1960', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(335, 'Dhaka', 'Tangail', 'Delduar', 'Delduar', '1910', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(336, 'Dhaka', 'Tangail', 'Delduar', 'Elasin', '1913', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(337, 'Dhaka', 'Tangail', 'Delduar', 'Hinga Nagar', '1914', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(338, 'Dhaka', 'Tangail', 'Delduar', 'Jangalia', '1911', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(339, 'Dhaka', 'Tangail', 'Delduar', 'Lowhati', '1915', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(340, 'Dhaka', 'Tangail', 'Delduar', 'Patharail', '1912', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(341, 'Dhaka', 'Tangail', 'Ghatail', 'D. Pakutia', '1982', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(342, 'Dhaka', 'Tangail', 'Ghatail', 'Dhalapara', '1983', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(343, 'Dhaka', 'Tangail', 'Ghatail', 'Ghatial', '1980', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(344, 'Dhaka', 'Tangail', 'Ghatail', 'Lohani', '1984', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(345, 'Dhaka', 'Tangail', 'Ghatail', 'Zahidganj', '1981', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(346, 'Dhaka', 'Tangail', 'Gopalpur', 'Gopalpur', '1990', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(347, 'Dhaka', 'Tangail', 'Gopalpur', 'Hemnagar', '1992', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(348, 'Dhaka', 'Tangail', 'Gopalpur', 'Jhowail', '1991', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(349, 'Dhaka', 'Tangail', 'Kalihati', 'Ballabazar', '1973', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(350, 'Dhaka', 'Tangail', 'Kalihati', 'Elinga', '1974', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(351, 'Dhaka', 'Tangail', 'Kalihati', 'Kalihati', '1970', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(352, 'Dhaka', 'Tangail', 'Kalihati', 'Nagarbari', '1977', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(353, 'Dhaka', 'Tangail', 'Kalihati', 'Nagarbari SO', '1976', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(354, 'Dhaka', 'Tangail', 'Kalihati', 'Nagbari', '1972', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(355, 'Dhaka', 'Tangail', 'Kalihati', 'Palisha', '1975', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(356, 'Dhaka', 'Tangail', 'Kalihati', 'Rajafair', '1971', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(357, 'Dhaka', 'Tangail', 'Kashkaolia', 'Kashkawlia', '1930', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(358, 'Dhaka', 'Tangail', 'Madhupur', 'Dhobari', '1997', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(359, 'Dhaka', 'Tangail', 'Madhupur', 'Madhupur', '1996', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(360, 'Dhaka', 'Tangail', 'Mirzapur', 'Gorai', '1941', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(361, 'Dhaka', 'Tangail', 'Mirzapur', 'Jarmuki', '1944', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(362, 'Dhaka', 'Tangail', 'Mirzapur', 'M.C. College', '1942', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(363, 'Dhaka', 'Tangail', 'Mirzapur', 'Mirzapur', '1940', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(364, 'Dhaka', 'Tangail', 'Mirzapur', 'Mohera', '1945', '2015-06-25 05:41:21', '2015-06-25 05:41:21'),
(365, 'Dhaka', 'Tangail', 'Mirzapur', 'Warri paikpara', '1943', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(366, 'Dhaka', 'Tangail', 'Nagarpur', 'Dhuburia', '1937', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(367, 'Dhaka', 'Tangail', 'Nagarpur', 'Nagarpur', '1936', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(368, 'Dhaka', 'Tangail', 'Nagarpur', 'Salimabad', '1938', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(369, 'Dhaka', 'Tangail', 'Sakhipur', 'Kochua', '1951', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(370, 'Dhaka', 'Tangail', 'Sakhipur', 'Sakhipur', '1950', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(371, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Kagmari', '1901', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(372, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Korotia', '1903', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(373, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Purabari', '1904', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(374, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Santosh', '1902', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(375, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Tangail Sadar', '1900', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(376, 'Chittagong', 'Bandarban', 'Alikadam', 'Alikadam', '4650', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(377, 'Chittagong', 'Bandarban', 'Bandarban Sadar', 'Bandarban Sadar', '4600', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(378, 'Chittagong', 'Bandarban', 'Naikhong', 'Naikhong', '4660', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(379, 'Chittagong', 'Bandarban', 'Roanchhari', 'Roanchhari', '4610', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(380, 'Chittagong', 'Bandarban', 'Ruma', 'Ruma', '4620', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(381, 'Chittagong', 'Bandarban', 'Thanchi', 'Lama', '4641', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(382, 'Chittagong', 'Bandarban', 'Thanchi', 'Thanchi', '4630', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(383, 'Chittagong', 'Brahmanbaria', 'Akhaura', 'Akhaura', '3450', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(384, 'Chittagong', 'Brahmanbaria', 'Akhaura', 'Azampur', '3451', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(385, 'Chittagong', 'Brahmanbaria', 'Akhaura', 'Gangasagar', '3452', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(386, 'Chittagong', 'Brahmanbaria', 'Banchharampur', 'Banchharampur', '3420', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(387, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Ashuganj', '3402', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(388, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Ashuganj Share', '3403', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(389, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Brahamanbaria Sadar', '3400', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(390, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Poun', '3404', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(391, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Talshahar', '3401', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(392, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Chandidar', '3462', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(393, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Chargachh', '3463', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(394, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Gopinathpur', '3464', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(395, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Kasba', '3460', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(396, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Kuti', '3461', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(397, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Jibanganj', '3419', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(398, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Kaitala', '3417', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(399, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Laubfatehpur', '3411', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(400, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Nabinagar', '3410', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(401, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Rasullabad', '3412', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(402, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Ratanpur', '3414', '2015-06-25 05:41:22', '2015-06-25 05:41:22'),
(403, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Salimganj', '3418', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(404, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Shahapur', '3415', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(405, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Shamgram', '3413', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(406, 'Chittagong', 'Brahmanbaria', 'Nasirnagar', 'Fandauk', '3441', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(407, 'Chittagong', 'Brahmanbaria', 'Nasirnagar', 'Nasirnagar', '3440', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(408, 'Chittagong', 'Brahmanbaria', 'Sarail', 'Chandura', '3432', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(409, 'Chittagong', 'Brahmanbaria', 'Sarail', 'Sarial', '3430', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(410, 'Chittagong', 'Brahmanbaria', 'Sarail', 'Shahbajpur', '3431', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(411, 'Chittagong', 'Chandpur', 'Chandpur Sadar', 'Baburhat', '3602', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(412, 'Chittagong', 'Chandpur', 'Chandpur Sadar', 'Chandpur Sadar', '3600', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(413, 'Chittagong', 'Chandpur', 'Chandpur Sadar', 'Puranbazar', '3601', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(414, 'Chittagong', 'Chandpur', 'Chandpur Sadar', 'Sahatali', '3603', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(415, 'Chittagong', 'Chandpur', 'Faridganj', 'Chandra', '3651', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(416, 'Chittagong', 'Chandpur', 'Faridganj', 'Faridganj', '3650', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(417, 'Chittagong', 'Chandpur', 'Faridganj', 'Gridkaliandia', '3653', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(418, 'Chittagong', 'Chandpur', 'Faridganj', 'Islampur Shah Isain', '3655', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(419, 'Chittagong', 'Chandpur', 'Faridganj', 'Rampurbazar', '3654', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(420, 'Chittagong', 'Chandpur', 'Faridganj', 'Rupsha', '3652', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(421, 'Chittagong', 'Chandpur', 'Hajiganj', 'Bolakhal', '3611', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(422, 'Chittagong', 'Chandpur', 'Hajiganj', 'Hajiganj', '3610', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(423, 'Chittagong', 'Chandpur', 'Hayemchar', 'Gandamara', '3661', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(424, 'Chittagong', 'Chandpur', 'Hayemchar', 'Hayemchar', '3660', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(425, 'Chittagong', 'Chandpur', 'Kachua', 'Kachua', '3630', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(426, 'Chittagong', 'Chandpur', 'Kachua', 'Pak Shrirampur', '3631', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(427, 'Chittagong', 'Chandpur', 'Kachua', 'Rahima Nagar', '3632', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(428, 'Chittagong', 'Chandpur', 'Kachua', 'Shachar', '3633', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(429, 'Chittagong', 'Chandpur', 'Matlobganj', 'Kalipur', '3642', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(430, 'Chittagong', 'Chandpur', 'Matlobganj', 'Matlobganj', '3640', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(431, 'Chittagong', 'Chandpur', 'Matlobganj', 'Mohanpur', '3641', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(432, 'Chittagong', 'Chandpur', 'Shahrasti', 'Chotoshi', '3623', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(433, 'Chittagong', 'Chandpur', 'Shahrasti', 'Islamia Madrasha', '3624', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(434, 'Chittagong', 'Chandpur', 'Shahrasti', 'Khilabazar', '3621', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(435, 'Chittagong', 'Chandpur', 'Shahrasti', 'Pashchim Kherihar Al', '3622', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(436, 'Chittagong', 'Chandpur', 'Shahrasti', 'Shahrasti', '3620', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(437, 'Chittagong', 'Chittagong', 'Anawara', 'Anowara', '4376', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(438, 'Chittagong', 'Chittagong', 'Anawara', 'Battali', '4378', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(439, 'Chittagong', 'Chittagong', 'Anawara', 'Paroikora', '4377', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(440, 'Chittagong', 'Chittagong', 'Boalkhali', 'Boalkhali', '4366', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(441, 'Chittagong', 'Chittagong', 'Boalkhali', 'Charandwip', '4369', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(442, 'Chittagong', 'Chittagong', 'Boalkhali', 'Iqbal Park', '4365', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(443, 'Chittagong', 'Chittagong', 'Boalkhali', 'Kadurkhal', '4368', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(444, 'Chittagong', 'Chittagong', 'Boalkhali', 'Kanungopara', '4363', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(445, 'Chittagong', 'Chittagong', 'Boalkhali', 'Sakpura', '4367', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(446, 'Chittagong', 'Chittagong', 'Boalkhali', 'Saroatoli', '4364', '2015-06-25 05:41:23', '2015-06-25 05:41:23'),
(447, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Al- Amin Baria Madra', '4221', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(448, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Amin Jute Mills', '4211', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(449, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Anandabazar', '4215', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(450, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Bayezid Bostami', '4210', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(451, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chandgaon', '4212', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(452, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chawkbazar', '4203', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(453, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chitt. Cantonment', '4220', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(454, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chitt. Customs Acca', '4219', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(455, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chitt. Politechnic In', '4209', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(456, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chitt. Sailers Colon', '4218', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(457, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chittagong Airport', '4205', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(458, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chittagong Bandar', '4100', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(459, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chittagong GPO', '4000', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(460, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Export Processing', '4223', '2015-06-25 05:41:24', '2015-06-25 05:41:24');
INSERT INTO `districts123` (`id`, `division`, `district`, `thana`, `postoffice`, `postcode`, `created_at`, `updated_at`) VALUES
(461, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Firozshah', '4207', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(462, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Halishahar', '4216', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(463, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Halishshar', '4225', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(464, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Jalalabad', '4214', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(465, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Jaldia Merine Accade', '4206', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(466, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Middle Patenga', '4222', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(467, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Mohard', '4208', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(468, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'North Halishahar', '4226', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(469, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'North Katuli', '4217', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(470, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Pahartoli', '4202', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(471, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Patenga', '4204', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(472, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Rampura TSO', '4224', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(473, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Wazedia', '4213', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(474, 'Chittagong', 'Chittagong', 'East Joara', 'Barma', '4383', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(475, 'Chittagong', 'Chittagong', 'East Joara', 'Dohazari', '4382', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(476, 'Chittagong', 'Chittagong', 'East Joara', 'East Joara', '4380', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(477, 'Chittagong', 'Chittagong', 'East Joara', 'Gachbaria', '4381', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(478, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Bhandar Sharif', '4352', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(479, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Fatikchhari', '4350', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(480, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Harualchhari', '4354', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(481, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Najirhat', '4353', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(482, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Nanupur', '4351', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(483, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Narayanhat', '4355', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(484, 'Chittagong', 'Chittagong', 'Hathazari', 'Chitt.University', '4331', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(485, 'Chittagong', 'Chittagong', 'Hathazari', 'Fatahabad', '4335', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(486, 'Chittagong', 'Chittagong', 'Hathazari', 'Gorduara', '4332', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(487, 'Chittagong', 'Chittagong', 'Hathazari', 'Hathazari', '4330', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(488, 'Chittagong', 'Chittagong', 'Hathazari', 'Katirhat', '4333', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(489, 'Chittagong', 'Chittagong', 'Hathazari', 'Madrasa', '4339', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(490, 'Chittagong', 'Chittagong', 'Hathazari', 'Mirzapur', '4334', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(491, 'Chittagong', 'Chittagong', 'Hathazari', 'Nuralibari', '4337', '2015-06-25 05:41:24', '2015-06-25 05:41:24'),
(492, 'Chittagong', 'Chittagong', 'Hathazari', 'Yunus Nagar', '4338', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(493, 'Chittagong', 'Chittagong', 'Jaldi', 'Banigram', '4393', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(494, 'Chittagong', 'Chittagong', 'Jaldi', 'Gunagari', '4392', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(495, 'Chittagong', 'Chittagong', 'Jaldi', 'Jaldi', '4390', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(496, 'Chittagong', 'Chittagong', 'Jaldi', 'Khan Bahadur', '4391', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(497, 'Chittagong', 'Chittagong', 'Lohagara', 'Chunti', '4398', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(498, 'Chittagong', 'Chittagong', 'Lohagara', 'Lohagara', '4396', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(499, 'Chittagong', 'Chittagong', 'Lohagara', 'Padua', '4397', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(500, 'Chittagong', 'Chittagong', 'Mirsharai', 'Abutorab', '4321', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(501, 'Chittagong', 'Chittagong', 'Mirsharai', 'Azampur', '4325', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(502, 'Chittagong', 'Chittagong', 'Mirsharai', 'Bharawazhat', '4323', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(503, 'Chittagong', 'Chittagong', 'Mirsharai', 'Darrogahat', '4322', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(504, 'Chittagong', 'Chittagong', 'Mirsharai', 'Joarganj', '4324', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(505, 'Chittagong', 'Chittagong', 'Mirsharai', 'Korerhat', '4327', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(506, 'Chittagong', 'Chittagong', 'Mirsharai', 'Mirsharai', '4320', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(507, 'Chittagong', 'Chittagong', 'Mirsharai', 'Mohazanhat', '4328', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(508, 'Chittagong', 'Chittagong', 'Patia Head Office', 'Budhpara', '4371', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(509, 'Chittagong', 'Chittagong', 'Patia Head Office', 'Patia Head Office', '4370', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(510, 'Chittagong', 'Chittagong', 'Rangunia', 'Dhamair', '4361', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(511, 'Chittagong', 'Chittagong', 'Rangunia', 'Rangunia', '4360', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(512, 'Chittagong', 'Chittagong', 'Rouzan', 'B.I.T Post Office', '4349', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(513, 'Chittagong', 'Chittagong', 'Rouzan', 'Beenajuri', '4341', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(514, 'Chittagong', 'Chittagong', 'Rouzan', 'Dewanpur', '4347', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(515, 'Chittagong', 'Chittagong', 'Rouzan', 'Fatepur', '4345', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(516, 'Chittagong', 'Chittagong', 'Rouzan', 'Gahira', '4343', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(517, 'Chittagong', 'Chittagong', 'Rouzan', 'Guzra Noapara', '4346', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(518, 'Chittagong', 'Chittagong', 'Rouzan', 'jagannath Hat', '4344', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(519, 'Chittagong', 'Chittagong', 'Rouzan', 'Kundeshwari', '4342', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(520, 'Chittagong', 'Chittagong', 'Rouzan', 'Mohamuni', '4348', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(521, 'Chittagong', 'Chittagong', 'Rouzan', 'Rouzan', '4340', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(522, 'Chittagong', 'Chittagong', 'Sandwip', 'Sandwip', '4300', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(523, 'Chittagong', 'Chittagong', 'Sandwip', 'Shiberhat', '4301', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(524, 'Chittagong', 'Chittagong', 'Sandwip', 'Urirchar', '4302', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(525, 'Chittagong', 'Chittagong', 'Satkania', 'Baitul Ijjat', '4387', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(526, 'Chittagong', 'Chittagong', 'Satkania', 'Bazalia', '4388', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(527, 'Chittagong', 'Chittagong', 'Satkania', 'Satkania', '4386', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(528, 'Chittagong', 'Chittagong', 'Sitakunda', 'Barabkunda', '4312', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(529, 'Chittagong', 'Chittagong', 'Sitakunda', 'Baroidhala', '4311', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(530, 'Chittagong', 'Chittagong', 'Sitakunda', 'Bawashbaria', '4313', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(531, 'Chittagong', 'Chittagong', 'Sitakunda', 'Bhatiari', '4315', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(532, 'Chittagong', 'Chittagong', 'Sitakunda', 'Fouzdarhat', '4316', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(533, 'Chittagong', 'Chittagong', 'Sitakunda', 'Jafrabad', '4317', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(534, 'Chittagong', 'Chittagong', 'Sitakunda', 'Kumira', '4314', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(535, 'Chittagong', 'Chittagong', 'Sitakunda', 'Sitakunda', '4310', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(536, 'Chittagong', 'Comilla', 'Barura', 'Barura', '3560', '2015-06-25 05:41:25', '2015-06-25 05:41:25'),
(537, 'Chittagong', 'Comilla', 'Barura', 'Murdafarganj', '3562', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(538, 'Chittagong', 'Comilla', 'Barura', 'Poyalgachha', '3561', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(539, 'Chittagong', 'Comilla', 'Brahmanpara', 'Brahmanpara', '3526', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(540, 'Chittagong', 'Comilla', 'Burichang', 'Burichang', '3520', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(541, 'Chittagong', 'Comilla', 'Burichang', 'Maynamoti bazar', '3521', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(542, 'Chittagong', 'Comilla', 'Chandina', 'Chandia', '3510', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(543, 'Chittagong', 'Comilla', 'Chandina', 'Madhaiabazar', '3511', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(544, 'Chittagong', 'Comilla', 'Chouddagram', 'Batisa', '3551', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(545, 'Chittagong', 'Comilla', 'Chouddagram', 'Chiora', '3552', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(546, 'Chittagong', 'Comilla', 'Chouddagram', 'Chouddagram', '3550', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(547, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Comilla Contoment', '3501', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(548, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Comilla Sadar', '3500', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(549, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Courtbari', '3503', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(550, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Halimanagar', '3502', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(551, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Suaganj', '3504', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(552, 'Chittagong', 'Comilla', 'Daudkandi', 'Dashpara', '3518', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(553, 'Chittagong', 'Comilla', 'Daudkandi', 'Daudkandi', '3516', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(554, 'Chittagong', 'Comilla', 'Daudkandi', 'Eliotganj', '3519', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(555, 'Chittagong', 'Comilla', 'Daudkandi', 'Gouripur', '3517', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(556, 'Chittagong', 'Comilla', 'Davidhar', 'Barashalghar', '3532', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(557, 'Chittagong', 'Comilla', 'Davidhar', 'Davidhar', '3530', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(558, 'Chittagong', 'Comilla', 'Davidhar', 'Dhamtee', '3533', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(559, 'Chittagong', 'Comilla', 'Davidhar', 'Gangamandal', '3531', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(560, 'Chittagong', 'Comilla', 'Homna', 'Homna', '3546', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(561, 'Chittagong', 'Comilla', 'Laksam', 'Bipulasar', '3572', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(562, 'Chittagong', 'Comilla', 'Laksam', 'Laksam', '3570', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(563, 'Chittagong', 'Comilla', 'Laksam', 'Lakshamanpur', '3571', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(564, 'Chittagong', 'Comilla', 'Langalkot', 'Chhariabazar', '3582', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(565, 'Chittagong', 'Comilla', 'Langalkot', 'Dhalua', '3581', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(566, 'Chittagong', 'Comilla', 'Langalkot', 'Gunabati', '3583', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(567, 'Chittagong', 'Comilla', 'Langalkot', 'Langalkot', '3580', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(568, 'Chittagong', 'Comilla', 'Muradnagar', 'Bangra', '3543', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(569, 'Chittagong', 'Comilla', 'Muradnagar', 'Companyganj', '3542', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(570, 'Chittagong', 'Comilla', 'Muradnagar', 'Muradnagar', '3540', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(571, 'Chittagong', 'Comilla', 'Muradnagar', 'Pantibazar', '3545', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(572, 'Chittagong', 'Comilla', 'Muradnagar', 'Ramchandarpur', '3541', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(573, 'Chittagong', 'Comilla', 'Muradnagar', 'Sonakanda', '3544', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(574, 'Chittagong', 'Cox’s Bazar', 'Chiringga', 'Badarkali', '4742', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(575, 'Chittagong', 'Cox’s Bazar', 'Chiringga', 'Chiringga', '4740', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(576, 'Chittagong', 'Cox’s Bazar', 'Chiringga', 'Chiringga S.O', '4741', '2015-06-25 05:41:26', '2015-06-25 05:41:26'),
(577, 'Chittagong', 'Cox’s Bazar', 'Chiringga', 'Malumghat', '4743', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(578, 'Chittagong', 'Cox’s Bazar', 'Coxs Bazar Sadar', 'Coxs Bazar Sadar', '4700', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(579, 'Chittagong', 'Cox’s Bazar', 'Coxs Bazar Sadar', 'Eidga', '4702', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(580, 'Chittagong', 'Cox’s Bazar', 'Coxs Bazar Sadar', 'Zhilanja', '4701', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(581, 'Chittagong', 'Cox’s Bazar', 'Gorakghat', 'Gorakghat', '4710', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(582, 'Chittagong', 'Cox’s Bazar', 'Kutubdia', 'Kutubdia', '4720', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(583, 'Chittagong', 'Cox’s Bazar', 'Ramu', 'Ramu', '4730', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(584, 'Chittagong', 'Cox’s Bazar', 'Teknaf', 'Hnila', '4761', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(585, 'Chittagong', 'Cox’s Bazar', 'Teknaf', 'St.Martin', '4762', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(586, 'Chittagong', 'Cox’s Bazar', 'Teknaf', 'Teknaf', '4760', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(587, 'Chittagong', 'Cox’s Bazar', 'Ukhia', 'Ukhia', '4750', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(588, 'Chittagong', 'Feni', 'Chhagalnaia', 'Chhagalnaia', '3910', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(589, 'Chittagong', 'Feni', 'Chhagalnaia', 'Daraga Hat', '3912', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(590, 'Chittagong', 'Feni', 'Chhagalnaia', 'Maharajganj', '3911', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(591, 'Chittagong', 'Feni', 'Chhagalnaia', 'Puabashimulia', '3913', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(592, 'Chittagong', 'Feni', 'Dagonbhuia', 'Chhilonia', '3922', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(593, 'Chittagong', 'Feni', 'Dagonbhuia', 'Dagondhuia', '3920', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(594, 'Chittagong', 'Feni', 'Dagonbhuia', 'Dudmukha', '3921', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(595, 'Chittagong', 'Feni', 'Dagonbhuia', 'Rajapur', '3923', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(596, 'Chittagong', 'Feni', 'Feni Sadar', 'Fazilpur', '3901', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(597, 'Chittagong', 'Feni', 'Feni Sadar', 'Feni Sadar', '3900', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(598, 'Chittagong', 'Feni', 'Feni Sadar', 'Laskarhat', '3903', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(599, 'Chittagong', 'Feni', 'Feni Sadar', 'Sharshadie', '3902', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(600, 'Chittagong', 'Feni', 'Pashurampur', 'Fulgazi', '3942', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(601, 'Chittagong', 'Feni', 'Pashurampur', 'Munshirhat', '3943', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(602, 'Chittagong', 'Feni', 'Pashurampur', 'Pashurampur', '3940', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(603, 'Chittagong', 'Feni', 'Pashurampur', 'Shuarbazar', '3941', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(604, 'Chittagong', 'Feni', 'Sonagazi', 'Ahmadpur', '3932', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(605, 'Chittagong', 'Feni', 'Sonagazi', 'Kazirhat', '3933', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(606, 'Chittagong', 'Feni', 'Sonagazi', 'Motiganj', '3931', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(607, 'Chittagong', 'Feni', 'Sonagazi', 'Sonagazi', '3930', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(608, 'Chittagong', 'Khagrachari', 'Diginala', 'Diginala', '4420', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(609, 'Chittagong', 'Khagrachari', 'Khagrachari Sadar', 'Khagrachari Sadar', '4400', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(610, 'Chittagong', 'Khagrachari', 'Laxmichhari', 'Laxmichhari', '4470', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(611, 'Chittagong', 'Khagrachari', 'Mahalchhari', 'Mahalchhari', '4430', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(612, 'Chittagong', 'Khagrachari', 'Manikchhari', 'Manikchhari', '4460', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(613, 'Chittagong', 'Khagrachari', 'Matiranga', 'Matiranga', '4450', '2015-06-25 05:41:27', '2015-06-25 05:41:27'),
(614, 'Chittagong', 'Khagrachari', 'Panchhari', 'Panchhari', '4410', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(615, 'Chittagong', 'Khagrachari', 'Ramghar Head Office', 'Ramghar Head Office', '4440', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(616, 'Chittagong', 'Lakshmipur', 'Char Alexgander', 'Char Alexgander', '3730', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(617, 'Chittagong', 'Lakshmipur', 'Char Alexgander', 'Hajirghat', '3731', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(618, 'Chittagong', 'Lakshmipur', 'Char Alexgander', 'Ramgatirhat', '3732', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(619, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Amani Lakshimpur', '3709', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(620, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Bhabaniganj', '3702', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(621, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Chandraganj', '3708', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(622, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Choupalli', '3707', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(623, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Dalal Bazar', '3701', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(624, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Duttapara', '3706', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(625, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Keramatganj', '3704', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(626, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Lakshimpur Sadar', '3700', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(627, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Mandari', '3703', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(628, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Rupchara', '3705', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(629, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Alipur', '3721', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(630, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Dolta', '3725', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(631, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Kanchanpur', '3723', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(632, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Naagmud', '3724', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(633, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Panpara', '3722', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(634, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Ramganj', '3720', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(635, 'Chittagong', 'Lakshmipur', 'Raypur', 'Bhuabari', '3714', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(636, 'Chittagong', 'Lakshmipur', 'Raypur', 'Haydarganj', '3713', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(637, 'Chittagong', 'Lakshmipur', 'Raypur', 'Nagerdighirpar', '3712', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(638, 'Chittagong', 'Lakshmipur', 'Raypur', 'Rakhallia', '3711', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(639, 'Chittagong', 'Lakshmipur', 'Raypur', 'Raypur', '3710', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(640, 'Chittagong', 'Noakhali', 'Basurhat', 'Basur Hat', '3850', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(641, 'Chittagong', 'Noakhali', 'Basurhat', 'Charhajari', '3851', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(642, 'Chittagong', 'Noakhali', 'Begumganj', 'Alaiarpur', '3831', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(643, 'Chittagong', 'Noakhali', 'Begumganj', 'Amisha Para', '3847', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(644, 'Chittagong', 'Noakhali', 'Begumganj', 'Banglabazar', '3822', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(645, 'Chittagong', 'Noakhali', 'Begumganj', 'Bazra', '3824', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(646, 'Chittagong', 'Noakhali', 'Begumganj', 'Begumganj', '3820', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(647, 'Chittagong', 'Noakhali', 'Begumganj', 'Bhabani Jibanpur', '3837', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(648, 'Chittagong', 'Noakhali', 'Begumganj', 'Choumohani', '3821', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(649, 'Chittagong', 'Noakhali', 'Begumganj', 'Dauti', '3843', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(650, 'Chittagong', 'Noakhali', 'Begumganj', 'Durgapur', '3848', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(651, 'Chittagong', 'Noakhali', 'Begumganj', 'Gopalpur', '3828', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(652, 'Chittagong', 'Noakhali', 'Begumganj', 'Jamidar Hat', '3825', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(653, 'Chittagong', 'Noakhali', 'Begumganj', 'Joyag', '3844', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(654, 'Chittagong', 'Noakhali', 'Begumganj', 'Joynarayanpur', '3829', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(655, 'Chittagong', 'Noakhali', 'Begumganj', 'Khalafat Bazar', '3833', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(656, 'Chittagong', 'Noakhali', 'Begumganj', 'Khalishpur', '3842', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(657, 'Chittagong', 'Noakhali', 'Begumganj', 'Maheshganj', '3838', '2015-06-25 05:41:28', '2015-06-25 05:41:28'),
(658, 'Chittagong', 'Noakhali', 'Begumganj', 'Mir Owarishpur', '3823', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(659, 'Chittagong', 'Noakhali', 'Begumganj', 'Nadona', '3839', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(660, 'Chittagong', 'Noakhali', 'Begumganj', 'Nandiapara', '3841', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(661, 'Chittagong', 'Noakhali', 'Begumganj', 'Oachhekpur', '3835', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(662, 'Chittagong', 'Noakhali', 'Begumganj', 'Rajganj', '3834', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(663, 'Chittagong', 'Noakhali', 'Begumganj', 'Sonaimuri', '3827', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(664, 'Chittagong', 'Noakhali', 'Begumganj', 'Tangirpar', '3832', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(665, 'Chittagong', 'Noakhali', 'Begumganj', 'Thanar Hat', '3845', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(666, 'Chittagong', 'Noakhali', 'Chatkhil', 'Bansa Bazar', '3879', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(667, 'Chittagong', 'Noakhali', 'Chatkhil', 'Bodalcourt', '3873', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(668, 'Chittagong', 'Noakhali', 'Chatkhil', 'Chatkhil', '3870', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(669, 'Chittagong', 'Noakhali', 'Chatkhil', 'Dosh Gharia', '3878', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(670, 'Chittagong', 'Noakhali', 'Chatkhil', 'Karihati', '3877', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(671, 'Chittagong', 'Noakhali', 'Chatkhil', 'Khilpara', '3872', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(672, 'Chittagong', 'Noakhali', 'Chatkhil', 'Palla', '3871', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(673, 'Chittagong', 'Noakhali', 'Chatkhil', 'Rezzakpur', '3874', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(674, 'Chittagong', 'Noakhali', 'Chatkhil', 'Sahapur', '3881', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(675, 'Chittagong', 'Noakhali', 'Chatkhil', 'Sampara', '3882', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(676, 'Chittagong', 'Noakhali', 'Chatkhil', 'Shingbahura', '3883', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(677, 'Chittagong', 'Noakhali', 'Chatkhil', 'Solla', '3875', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(678, 'Chittagong', 'Noakhali', 'Hatiya', 'Afazia', '3891', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(679, 'Chittagong', 'Noakhali', 'Hatiya', 'Hatiya', '3890', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(680, 'Chittagong', 'Noakhali', 'Hatiya', 'Tamoraddi', '3892', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(681, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Chaprashir Hat', '3811', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(682, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Char Jabbar', '3812', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(683, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Charam Tua', '3809', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(684, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Din Monir Hat', '3803', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(685, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Kabirhat', '3807', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(686, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Khalifar Hat', '3808', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(687, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Mriddarhat', '3806', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(688, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Noakhali College', '3801', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(689, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Noakhali Sadar', '3800', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(690, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Pak Kishoreganj', '3804', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(691, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Sonapur', '3802', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(692, 'Chittagong', 'Noakhali', 'Senbag', 'Beezbag', '3862', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(693, 'Chittagong', 'Noakhali', 'Senbag', 'Chatarpaia', '3864', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(694, 'Chittagong', 'Noakhali', 'Senbag', 'Kallyandi', '3861', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(695, 'Chittagong', 'Noakhali', 'Senbag', 'Kankirhat', '3863', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(696, 'Chittagong', 'Noakhali', 'Senbag', 'Senbag', '3860', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(697, 'Chittagong', 'Noakhali', 'Senbag', 'T.P. Lamua', '3865', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(698, 'Chittagong', 'Rangamati', 'Barakal', 'Barakal', '4570', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(699, 'Chittagong', 'Rangamati', 'Bilaichhari', 'Bilaichhari', '4550', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(700, 'Chittagong', 'Rangamati', 'Jarachhari', 'Jarachhari', '4560', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(701, 'Chittagong', 'Rangamati', 'Kalampati', 'Betbunia', '4511', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(702, 'Chittagong', 'Rangamati', 'Kalampati', 'Kalampati', '4510', '2015-06-25 05:41:29', '2015-06-25 05:41:29'),
(703, 'Chittagong', 'Rangamati', 'kaptai', 'Chandraghona', '4531', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(704, 'Chittagong', 'Rangamati', 'kaptai', 'Kaptai', '4530', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(705, 'Chittagong', 'Rangamati', 'kaptai', 'Kaptai Nuton Bazar', '4533', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(706, 'Chittagong', 'Rangamati', 'kaptai', 'Kaptai Project', '4532', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(707, 'Chittagong', 'Rangamati', 'Longachh', 'Longachh', '4580', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(708, 'Chittagong', 'Rangamati', 'Marishya', 'Marishya', '4590', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(709, 'Chittagong', 'Rangamati', 'Naniachhar', 'Nanichhar', '4520', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(710, 'Chittagong', 'Rangamati', 'Rajsthali', 'Rajsthali', '4540', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(711, 'Chittagong', 'Rangamati', 'Rangamati Sadar', 'Rangamati Sadar', '4500', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(712, 'Khulna', 'Bagherhat', 'Bagerhat Sadar', 'Bagerhat Sadar', '9300', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(713, 'Khulna', 'Bagherhat', 'Bagerhat Sadar', 'P.C College', '9301', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(714, 'Khulna', 'Bagherhat', 'Bagerhat Sadar', 'Rangdia', '9302', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(715, 'Khulna', 'Bagherhat', 'Chalna Ankorage', 'Chalna Ankorage', '9350', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(716, 'Khulna', 'Bagherhat', 'Chalna Ankorage', 'Mongla Port', '9351', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(717, 'Khulna', 'Bagherhat', 'Chitalmari', 'Barabaria', '9361', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(718, 'Khulna', 'Bagherhat', 'Chitalmari', 'Chitalmari', '9360', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(719, 'Khulna', 'Bagherhat', 'Fakirhat', 'Bhanganpar Bazar', '9372', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(720, 'Khulna', 'Bagherhat', 'Fakirhat', 'Fakirhat', '9370', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(721, 'Khulna', 'Bagherhat', 'Fakirhat', 'Mansa', '9371', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(722, 'Khulna', 'Bagherhat', 'Kachua UPO', 'Kachua', '9310', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(723, 'Khulna', 'Bagherhat', 'Kachua UPO', 'Sonarkola', '9311', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(724, 'Khulna', 'Bagherhat', 'Mollahat', 'Charkulia', '9383', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(725, 'Khulna', 'Bagherhat', 'Mollahat', 'Dariala', '9382', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(726, 'Khulna', 'Bagherhat', 'Mollahat', 'Kahalpur', '9381', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(727, 'Khulna', 'Bagherhat', 'Mollahat', 'Mollahat', '9380', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(728, 'Khulna', 'Bagherhat', 'Mollahat', 'Nagarkandi', '9384', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(729, 'Khulna', 'Bagherhat', 'Mollahat', 'Pak Gangni', '9385', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(730, 'Khulna', 'Bagherhat', 'Morelganj', 'Morelganj', '9320', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(731, 'Khulna', 'Bagherhat', 'Morelganj', 'Sannasi Bazar', '9321', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(732, 'Khulna', 'Bagherhat', 'Morelganj', 'Telisatee', '9322', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(733, 'Khulna', 'Bagherhat', 'Rampal', 'Foylahat', '9341', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(734, 'Khulna', 'Bagherhat', 'Rampal', 'Gourambha', '9343', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(735, 'Khulna', 'Bagherhat', 'Rampal', 'Rampal', '9340', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(736, 'Khulna', 'Bagherhat', 'Rampal', 'Sonatunia', '9342', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(737, 'Khulna', 'Bagherhat', 'Rayenda', 'Rayenda', '9330', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(738, 'Khulna', 'Chuadanga', 'Alamdanga', 'Alamdanga', '7210', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(739, 'Khulna', 'Chuadanga', 'Alamdanga', 'Hardi', '7211', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(740, 'Khulna', 'Chuadanga', 'Chuadanga Sadar', 'Chuadanga Sadar', '7200', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(741, 'Khulna', 'Chuadanga', 'Chuadanga Sadar', 'Munshiganj', '7201', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(742, 'Khulna', 'Chuadanga', 'Damurhuda', 'Andulbaria', '7222', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(743, 'Khulna', 'Chuadanga', 'Damurhuda', 'Damurhuda', '7220', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(744, 'Khulna', 'Chuadanga', 'Damurhuda', 'Darshana', '7221', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(745, 'Khulna', 'Chuadanga', 'Doulatganj', 'Doulatganj', '7230', '2015-06-25 05:41:30', '2015-06-25 05:41:30'),
(746, 'Khulna', 'Jessore', 'Bagharpara', 'Bagharpara', '7470', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(747, 'Khulna', 'Jessore', 'Bagharpara', 'Gouranagar', '7471', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(748, 'Khulna', 'Jessore', 'Chaugachha', 'Chougachha', '7410', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(749, 'Khulna', 'Jessore', 'Jessore Sadar', 'Basundia', '7406', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(750, 'Khulna', 'Jessore', 'Jessore Sadar', 'Chanchra', '7402', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(751, 'Khulna', 'Jessore', 'Jessore Sadar', 'Churamankathi', '7407', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(752, 'Khulna', 'Jessore', 'Jessore Sadar', 'Jessore Airbach', '7404', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(753, 'Khulna', 'Jessore', 'Jessore Sadar', 'Jessore canttonment', '7403', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(754, 'Khulna', 'Jessore', 'Jessore Sadar', 'Jessore Sadar', '7400', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(755, 'Khulna', 'Jessore', 'Jessore Sadar', 'Jessore Upa-Shahar', '7401', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(756, 'Khulna', 'Jessore', 'Jessore Sadar', 'Rupdia', '7405', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(757, 'Khulna', 'Jessore', 'Jhikargachha', 'Jhikargachha', '7420', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(758, 'Khulna', 'Jessore', 'Keshabpur', 'Keshobpur', '7450', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(759, 'Khulna', 'Jessore', 'Monirampur', 'Monirampur', '7440', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(760, 'Khulna', 'Jessore', 'Noapara', 'Bhugilhat', '7462', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(761, 'Khulna', 'Jessore', 'Noapara', 'Noapara', '7460', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(762, 'Khulna', 'Jessore', 'Noapara', 'Rajghat', '7461', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(763, 'Khulna', 'Jessore', 'Sarsa', 'Bag Achra', '7433', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(764, 'Khulna', 'Jessore', 'Sarsa', 'Benapole', '7431', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(765, 'Khulna', 'Jessore', 'Sarsa', 'Jadabpur', '7432', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(766, 'Khulna', 'Jessore', 'Sarsa', 'Sarsa', '7430', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(767, 'Khulna', 'Jinaidaha', 'Harinakundu', 'Harinakundu', '7310', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(768, 'Khulna', 'Jinaidaha', 'Jinaidaha Sadar', 'Jinaidaha Cadet College', '7301', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(769, 'Khulna', 'Jinaidaha', 'Jinaidaha Sadar', 'Jinaidaha Sadar', '7300', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(770, 'Khulna', 'Jinaidaha', 'Kotchandpur', 'Kotchandpur', '7330', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(771, 'Khulna', 'Jinaidaha', 'Maheshpur', 'Maheshpur', '7340', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(772, 'Khulna', 'Jinaidaha', 'Naldanga', 'Hatbar Bazar', '7351', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(773, 'Khulna', 'Jinaidaha', 'Naldanga', 'Naldanga', '7350', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(774, 'Khulna', 'Jinaidaha', 'Shailakupa', 'Kumiradaha', '7321', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(775, 'Khulna', 'Jinaidaha', 'Shailakupa', 'Shailakupa', '7320', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(776, 'Khulna', 'Khulna', 'Alaipur', 'Alaipur', '9240', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(777, 'Khulna', 'Khulna', 'Alaipur', 'Belphulia', '9242', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(778, 'Khulna', 'Khulna', 'Alaipur', 'Rupsha', '9241', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(779, 'Khulna', 'Khulna', 'Batiaghat', 'Batiaghat', '9260', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(780, 'Khulna', 'Khulna', 'Batiaghat', 'Surkalee', '9261', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(781, 'Khulna', 'Khulna', 'Chalna Bazar', 'Bajua', '9272', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(782, 'Khulna', 'Khulna', 'Chalna Bazar', 'Chalna Bazar', '9270', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(783, 'Khulna', 'Khulna', 'Chalna Bazar', 'Dakup', '9271', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(784, 'Khulna', 'Khulna', 'Chalna Bazar', 'Nalian', '9273', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(785, 'Khulna', 'Khulna', 'Digalia', 'Chandni Mahal', '9221', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(786, 'Khulna', 'Khulna', 'Digalia', 'Digalia', '9220', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(787, 'Khulna', 'Khulna', 'Digalia', 'Gazirhat', '9224', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(788, 'Khulna', 'Khulna', 'Digalia', 'Ghoshghati', '9223', '2015-06-25 05:41:31', '2015-06-25 05:41:31'),
(789, 'Khulna', 'Khulna', 'Digalia', 'Senhati', '9222', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(790, 'Khulna', 'Khulna', 'Khulna Sadar', 'Atra Shilpa Area', '9207', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(791, 'Khulna', 'Khulna', 'Khulna Sadar', 'BIT Khulna', '9203', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(792, 'Khulna', 'Khulna', 'Khulna Sadar', 'Doulatpur', '9202', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(793, 'Khulna', 'Khulna', 'Khulna Sadar', 'Jahanabad Canttonmen', '9205', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(794, 'Khulna', 'Khulna', 'Khulna Sadar', 'Khula Sadar', '9100', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(795, 'Khulna', 'Khulna', 'Khulna Sadar', 'Khulna G.P.O', '9000', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(796, 'Khulna', 'Khulna', 'Khulna Sadar', 'Khulna Shipyard', '9201', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(797, 'Khulna', 'Khulna', 'Khulna Sadar', 'Khulna University', '9208', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(798, 'Khulna', 'Khulna', 'Khulna Sadar', 'Siramani', '9204', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(799, 'Khulna', 'Khulna', 'Khulna Sadar', 'Sonali Jute Mills', '9206', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(800, 'Khulna', 'Khulna', 'Madinabad', 'Amadee', '9291', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(801, 'Khulna', 'Khulna', 'Madinabad', 'Madinabad', '9290', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(802, 'Khulna', 'Khulna', 'Paikgachha', 'Chandkhali', '9284', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(803, 'Khulna', 'Khulna', 'Paikgachha', 'Garaikhali', '9285', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(804, 'Khulna', 'Khulna', 'Paikgachha', 'Godaipur', '9281', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(805, 'Khulna', 'Khulna', 'Paikgachha', 'Kapilmoni', '9282', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(806, 'Khulna', 'Khulna', 'Paikgachha', 'Katipara', '9283', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(807, 'Khulna', 'Khulna', 'Paikgachha', 'Paikgachha', '9280', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(808, 'Khulna', 'Khulna', 'Phultala', 'Phultala', '9210', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(809, 'Khulna', 'Khulna', 'Sajiara', 'Chuknagar', '9252', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(810, 'Khulna', 'Khulna', 'Sajiara', 'Ghonabanda', '9251', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(811, 'Khulna', 'Khulna', 'Sajiara', 'Sajiara', '9250', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(812, 'Khulna', 'Khulna', 'Sajiara', 'Shahapur', '9253', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(813, 'Khulna', 'Khulna', 'Terakhada', 'Pak Barasat', '9231', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(814, 'Khulna', 'Khulna', 'Terakhada', 'Terakhada', '9230', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(815, 'Khulna', 'Kustia', 'Bheramara', 'Allardarga', '7042', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(816, 'Khulna', 'Kustia', 'Bheramara', 'Bheramara', '7040', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(817, 'Khulna', 'Kustia', 'Bheramara', 'Ganges Bheramara', '7041', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(818, 'Khulna', 'Kustia', 'Janipur', 'Janipur', '7020', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(819, 'Khulna', 'Kustia', 'Janipur', 'Khoksa', '7021', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(820, 'Khulna', 'Kustia', 'Kumarkhali', 'Kumarkhali', '7010', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(821, 'Khulna', 'Kustia', 'Kumarkhali', 'Panti', '7011', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(822, 'Khulna', 'Kustia', 'Kustia Sadar', 'Islami University', '7003', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(823, 'Khulna', 'Kustia', 'Kustia Sadar', 'Jagati', '7002', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(824, 'Khulna', 'Kustia', 'Kustia Sadar', 'Kushtia Mohini', '7001', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(825, 'Khulna', 'Kustia', 'Kustia Sadar', 'Kustia Sadar', '7000', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(826, 'Khulna', 'Kustia', 'Mirpur', 'Amla Sadarpur', '7032', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(827, 'Khulna', 'Kustia', 'Mirpur', 'Mirpur', '7030', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(828, 'Khulna', 'Kustia', 'Mirpur', 'Poradaha', '7031', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(829, 'Khulna', 'Kustia', 'Rafayetpur', 'Khasmathurapur', '7052', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(830, 'Khulna', 'Kustia', 'Rafayetpur', 'Rafayetpur', '7050', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(831, 'Khulna', 'Kustia', 'Rafayetpur', 'Taragunia', '7051', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(832, 'Khulna', 'Magura', 'Arpara', 'Arpara', '7620', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(833, 'Khulna', 'Magura', 'Magura Sadar', 'Magura Sadar', '7600', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(834, 'Khulna', 'Magura', 'Mohammadpur', 'Binodpur', '7631', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(835, 'Khulna', 'Magura', 'Mohammadpur', 'Mohammadpur', '7630', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(836, 'Khulna', 'Magura', 'Mohammadpur', 'Nahata', '7632', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(837, 'Khulna', 'Magura', 'Shripur', 'Langalbadh', '7611', '2015-06-25 05:41:32', '2015-06-25 05:41:32'),
(838, 'Khulna', 'Magura', 'Shripur', 'Nachol', '7612', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(839, 'Khulna', 'Magura', 'Shripur', 'Shripur', '7610', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(840, 'Khulna', 'Meherpur', 'Gangni', 'Gangni', '7110', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(841, 'Khulna', 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7101', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(842, 'Khulna', 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7152', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(843, 'Khulna', 'Meherpur', 'Meherpur Sadar', 'Meherpur Sadar', '7100', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(844, 'Khulna', 'Meherpur', 'Meherpur Sadar', 'Mujib Nagar Complex', '7102', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(845, 'Khulna', 'Narail', 'Kalia', 'Kalia', '7520', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(846, 'Khulna', 'Narail', 'Laxmipasha', 'Baradia', '7514', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(847, 'Khulna', 'Narail', 'Laxmipasha', 'Itna', '7512', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(848, 'Khulna', 'Narail', 'Laxmipasha', 'Laxmipasha', '7510', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(849, 'Khulna', 'Narail', 'Laxmipasha', 'Lohagora', '7511', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(850, 'Khulna', 'Narail', 'Laxmipasha', 'Naldi', '7513', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(851, 'Khulna', 'Narail', 'Mohajan', 'Mohajan', '7521', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(852, 'Khulna', 'Narail', 'Narail Sadar', 'Narail Sadar', '7500', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(853, 'Khulna', 'Narail', 'Narail Sadar', 'Ratanganj', '7501', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(854, 'Khulna', 'Satkhira', 'Ashashuni', 'Ashashuni', '9460', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(855, 'Khulna', 'Satkhira', 'Ashashuni', 'Baradal', '9461', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(856, 'Khulna', 'Satkhira', 'Debbhata', 'Debbhata', '9430', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(857, 'Khulna', 'Satkhira', 'Debbhata', 'Gurugram', '9431', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(858, 'Khulna', 'Satkhira', 'kalaroa', 'Chandanpur', '9415', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(859, 'Khulna', 'Satkhira', 'kalaroa', 'Hamidpur', '9413', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(860, 'Khulna', 'Satkhira', 'kalaroa', 'Jhaudanga', '9412', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(861, 'Khulna', 'Satkhira', 'kalaroa', 'kalaroa', '9410', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(862, 'Khulna', 'Satkhira', 'kalaroa', 'Khordo', '9414', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(863, 'Khulna', 'Satkhira', 'kalaroa', 'Murarikati', '9411', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(864, 'Khulna', 'Satkhira', 'Kaliganj UPO', 'Kaliganj UPO', '9440', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(865, 'Khulna', 'Satkhira', 'Kaliganj UPO', 'Nalta Mubaroknagar', '9441', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(866, 'Khulna', 'Satkhira', 'Kaliganj UPO', 'Ratanpur', '9442', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(867, 'Khulna', 'Satkhira', 'Nakipur', 'Buri Goalini', '9453', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(868, 'Khulna', 'Satkhira', 'Nakipur', 'Gabura', '9454', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(869, 'Khulna', 'Satkhira', 'Nakipur', 'Habinagar', '9455', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(870, 'Khulna', 'Satkhira', 'Nakipur', 'Nakipur', '9450', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(871, 'Khulna', 'Satkhira', 'Nakipur', 'Naobeki', '9452', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(872, 'Khulna', 'Satkhira', 'Nakipur', 'Noornagar', '9451', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(873, 'Khulna', 'Satkhira', 'Satkhira Sadar', 'Budhhat', '9403', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(874, 'Khulna', 'Satkhira', 'Satkhira Sadar', 'Gunakar kati', '9402', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(875, 'Khulna', 'Satkhira', 'Satkhira Sadar', 'Satkhira Islamia Acc', '9401', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(876, 'Khulna', 'Satkhira', 'Satkhira Sadar', 'Satkhira Sadar', '9400', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(877, 'Khulna', 'Satkhira', 'Taala', 'Patkelghata', '9421', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(878, 'Khulna', 'Satkhira', 'Taala', 'Taala', '9420', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(879, 'Sylhet', 'Hobiganj', 'Azmireeganj', 'Azmireeganj', '3360', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(880, 'Sylhet', 'Hobiganj', 'Bahubal', 'Bahubal', '3310', '2015-06-25 05:41:33', '2015-06-25 05:41:33'),
(881, 'Sylhet', 'Hobiganj', 'Baniachang', 'Baniachang', '3350', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(882, 'Sylhet', 'Hobiganj', 'Baniachang', 'Jatrapasha', '3351', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(883, 'Sylhet', 'Hobiganj', 'Baniachang', 'Kadirganj', '3352', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(884, 'Sylhet', 'Hobiganj', 'Chunarughat', 'Chandpurbagan', '3321', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(885, 'Sylhet', 'Hobiganj', 'Chunarughat', 'Chunarughat', '3320', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(886, 'Sylhet', 'Hobiganj', 'Chunarughat', 'Narapati', '3322', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(887, 'Sylhet', 'Hobiganj', 'Hobiganj Sadar', 'Gopaya', '3302', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(888, 'Sylhet', 'Hobiganj', 'Hobiganj Sadar', 'Hobiganj Sadar', '3300', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(889, 'Sylhet', 'Hobiganj', 'Hobiganj Sadar', 'Shaestaganj', '3301', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(890, 'Sylhet', 'Hobiganj', 'Kalauk', 'Kalauk', '3340', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(891, 'Sylhet', 'Hobiganj', 'Kalauk', 'Lakhai', '3341', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(892, 'Sylhet', 'Hobiganj', 'Madhabpur', 'Itakhola', '3331', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(893, 'Sylhet', 'Hobiganj', 'Madhabpur', 'Madhabpur', '3330', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(894, 'Sylhet', 'Hobiganj', 'Madhabpur', 'Saihamnagar', '3333', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(895, 'Sylhet', 'Hobiganj', 'Madhabpur', 'Shahajibazar', '3332', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(896, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Digalbak', '3373', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(897, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Golduba', '3372', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(898, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Goplarbazar', '3371', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(899, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Inathganj', '3374', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(900, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Nabiganj', '3370', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(901, 'Sylhet', 'Moulvibazar', 'Baralekha', 'Baralekha', '3250', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(902, 'Sylhet', 'Moulvibazar', 'Baralekha', 'Dhakkhinbag', '3252', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(903, 'Sylhet', 'Moulvibazar', 'Baralekha', 'Juri', '3251', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(904, 'Sylhet', 'Moulvibazar', 'Baralekha', 'Purbashahabajpur', '3253', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(905, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Kamalganj', '3220', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(906, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Keramatnaga', '3221', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(907, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Munshibazar', '3224', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(908, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Patrakhola', '3222', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(909, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Shamsher Nagar', '3223', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(910, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Baramchal', '3237', '2015-06-25 05:41:34', '2015-06-25 05:41:34');
INSERT INTO `districts123` (`id`, `division`, `district`, `thana`, `postoffice`, `postcode`, `created_at`, `updated_at`) VALUES
(911, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Kajaldhara', '3234', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(912, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Karimpur', '3235', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(913, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Kulaura', '3230', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(914, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Langla', '3232', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(915, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Prithimpasha', '3233', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(916, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Tillagaon', '3231', '2015-06-25 05:41:34', '2015-06-25 05:41:34'),
(917, 'Sylhet', 'Moulvibazar', 'Moulvibazar Sadar', 'Afrozganj', '3203', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(918, 'Sylhet', 'Moulvibazar', 'Moulvibazar Sadar', 'Barakapan', '3201', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(919, 'Sylhet', 'Moulvibazar', 'Moulvibazar Sadar', 'Monumukh', '3202', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(920, 'Sylhet', 'Moulvibazar', 'Moulvibazar Sadar', 'Moulvibazar Sadar', '3200', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(921, 'Sylhet', 'Moulvibazar', 'Rajnagar', 'Rajnagar', '3240', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(922, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Kalighat', '3212', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(923, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Khejurichhara', '3213', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(924, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Narain Chora', '3211', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(925, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Satgaon', '3214', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(926, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Srimangal', '3210', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(927, 'Sylhet', 'Sunamganj', 'Bishamsarpur', 'Bishamsapur', '3010', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(928, 'Sylhet', 'Sunamganj', 'Chhatak', 'Chhatak', '3080', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(929, 'Sylhet', 'Sunamganj', 'Chhatak', 'Chhatak Cement Facto', '3081', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(930, 'Sylhet', 'Sunamganj', 'Chhatak', 'Chhatak Paper Mills', '3082', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(931, 'Sylhet', 'Sunamganj', 'Chhatak', 'Chourangi Bazar', '3893', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(932, 'Sylhet', 'Sunamganj', 'Chhatak', 'Gabindaganj', '3083', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(933, 'Sylhet', 'Sunamganj', 'Chhatak', 'Gabindaganj Natun Ba', '3084', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(934, 'Sylhet', 'Sunamganj', 'Chhatak', 'Islamabad', '3088', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(935, 'Sylhet', 'Sunamganj', 'Chhatak', 'jahidpur', '3087', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(936, 'Sylhet', 'Sunamganj', 'Chhatak', 'Khurma', '3085', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(937, 'Sylhet', 'Sunamganj', 'Chhatak', 'Moinpur', '3086', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(938, 'Sylhet', 'Sunamganj', 'Dhirai Chandpur', 'Dhirai Chandpur', '3040', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(939, 'Sylhet', 'Sunamganj', 'Dhirai Chandpur', 'Jagdal', '3041', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(940, 'Sylhet', 'Sunamganj', 'Duara bazar', 'Duara bazar', '3070', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(941, 'Sylhet', 'Sunamganj', 'Ghungiar', 'Ghungiar', '3050', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(942, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Atuajan', '3062', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(943, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Hasan Fatemapur', '3063', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(944, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Jagnnathpur', '3060', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(945, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Rasulganj', '3064', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(946, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Shiramsi', '3065', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(947, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Syedpur', '3061', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(948, 'Sylhet', 'Sunamganj', 'Sachna', 'Sachna', '3020', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(949, 'Sylhet', 'Sunamganj', 'Sunamganj Sadar', 'Pagla', '3001', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(950, 'Sylhet', 'Sunamganj', 'Sunamganj Sadar', 'Patharia', '3002', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(951, 'Sylhet', 'Sunamganj', 'Sunamganj Sadar', 'Sunamganj Sadar', '3000', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(952, 'Sylhet', 'Sunamganj', 'Tahirpur', 'Tahirpur', '3030', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(953, 'Sylhet', 'Sylhet', 'Balaganj', 'Balaganj', '3120', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(954, 'Sylhet', 'Sylhet', 'Balaganj', 'Begumpur', '3125', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(955, 'Sylhet', 'Sylhet', 'Balaganj', 'Brahman Shashon', '3122', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(956, 'Sylhet', 'Sylhet', 'Balaganj', 'Gaharpur', '3128', '2015-06-25 05:41:35', '2015-06-25 05:41:35'),
(957, 'Sylhet', 'Sylhet', 'Balaganj', 'Goala Bazar', '3124', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(958, 'Sylhet', 'Sylhet', 'Balaganj', 'Karua', '3121', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(959, 'Sylhet', 'Sylhet', 'Balaganj', 'Kathal Khair', '3127', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(960, 'Sylhet', 'Sylhet', 'Balaganj', 'Natun Bazar', '3129', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(961, 'Sylhet', 'Sylhet', 'Balaganj', 'Omarpur', '3126', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(962, 'Sylhet', 'Sylhet', 'Balaganj', 'Tajpur', '3123', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(963, 'Sylhet', 'Sylhet', 'Bianibazar', 'Bianibazar', '3170', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(964, 'Sylhet', 'Sylhet', 'Bianibazar', 'Churkai', '3175', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(965, 'Sylhet', 'Sylhet', 'Bianibazar', 'jaldup', '3171', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(966, 'Sylhet', 'Sylhet', 'Bianibazar', 'Kurar bazar', '3173', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(967, 'Sylhet', 'Sylhet', 'Bianibazar', 'Mathiura', '3172', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(968, 'Sylhet', 'Sylhet', 'Bianibazar', 'Salia bazar', '3174', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(969, 'Sylhet', 'Sylhet', 'Bishwanath', 'Bishwanath', '3130', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(970, 'Sylhet', 'Sylhet', 'Bishwanath', 'Dashghar', '3131', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(971, 'Sylhet', 'Sylhet', 'Bishwanath', 'Deokalas', '3133', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(972, 'Sylhet', 'Sylhet', 'Bishwanath', 'Doulathpur', '3132', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(973, 'Sylhet', 'Sylhet', 'Bishwanath', 'Singer kanch', '3134', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(974, 'Sylhet', 'Sylhet', 'Fenchuganj', 'Fenchuganj', '3116', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(975, 'Sylhet', 'Sylhet', 'Fenchuganj', 'Fenchuganj SareKarkh', '3117', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(976, 'Sylhet', 'Sylhet', 'Goainhat', 'Chiknagul', '3152', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(977, 'Sylhet', 'Sylhet', 'Goainhat', 'Goainhat', '3150', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(978, 'Sylhet', 'Sylhet', 'Goainhat', 'Jaflong', '3151', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(979, 'Sylhet', 'Sylhet', 'Gopalganj', 'banigram', '3164', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(980, 'Sylhet', 'Sylhet', 'Gopalganj', 'Chandanpur', '3165', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(981, 'Sylhet', 'Sylhet', 'Gopalganj', 'Dakkhin Bhadashore', '3162', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(982, 'Sylhet', 'Sylhet', 'Gopalganj', 'Dhaka Dakkhin', '3161', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(983, 'Sylhet', 'Sylhet', 'Gopalganj', 'Gopalgannj', '3160', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(984, 'Sylhet', 'Sylhet', 'Gopalganj', 'Ranaping', '3163', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(985, 'Sylhet', 'Sylhet', 'Jaintapur', 'Jainthapur', '3156', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(986, 'Sylhet', 'Sylhet', 'Jakiganj', 'Ichhamati', '3191', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(987, 'Sylhet', 'Sylhet', 'Jakiganj', 'Jakiganj', '3190', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(988, 'Sylhet', 'Sylhet', 'Kanaighat', 'Chatulbazar', '3181', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(989, 'Sylhet', 'Sylhet', 'Kanaighat', 'Gachbari', '3183', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(990, 'Sylhet', 'Sylhet', 'Kanaighat', 'Kanaighat', '3180', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(991, 'Sylhet', 'Sylhet', 'Kanaighat', 'Manikganj', '3182', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(992, 'Sylhet', 'Sylhet', 'Kompanyganj', 'Kompanyganj', '3140', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(993, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Birahimpur', '3106', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(994, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Jalalabad', '3107', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(995, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Jalalabad Cantoment', '3104', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(996, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Kadamtali', '3111', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(997, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Kamalbazer', '3112', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(998, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Khadimnagar', '3103', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(999, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Lalbazar', '3113', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(1000, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Mogla', '3108', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(1001, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Ranga Hajiganj', '3109', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(1002, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Shahajalal Science &', '3114', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(1003, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Silam', '3105', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(1004, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Sylhe Sadar', '3100', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(1005, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Sylhet Biman Bondar', '3102', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(1006, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Sylhet Cadet Col', '3101', '2015-06-25 05:41:36', '2015-06-25 05:41:36'),
(1007, 'Sylhet', 'Meherpur', 'Gangni', 'Gangni', '7110', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1008, 'Sylhet', 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7101', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1009, 'Sylhet', 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7152', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1010, 'Sylhet', 'Meherpur', 'Meherpur Sadar', 'Meherpur Sadar', '7100', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1011, 'Sylhet', 'Meherpur', 'Meherpur Sadar', 'Mujib Nagar Complex', '7102', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1012, 'Sylhet', 'Narail', 'Kalia', 'Kalia', '7520', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1013, 'Sylhet', 'Narail', 'Laxmipasha', 'Baradia', '7514', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1014, 'Sylhet', 'Narail', 'Laxmipasha', 'Itna', '7512', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1015, 'Sylhet', 'Narail', 'Laxmipasha', 'Laxmipasha', '7510', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1016, 'Sylhet', 'Narail', 'Laxmipasha', 'Lohagora', '7511', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1017, 'Sylhet', 'Narail', 'Laxmipasha', 'Naldi', '7513', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1018, 'Sylhet', 'Narail', 'Mohajan', 'Mohajan', '7521', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1019, 'Sylhet', 'Narail', 'Narail Sadar', 'Narail Sadar', '7500', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1020, 'Sylhet', 'Narail', 'Narail Sadar', 'Ratanganj', '7501', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1021, 'Sylhet', 'Satkhira', 'Ashashuni', 'Ashashuni', '9460', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1022, 'Sylhet', 'Satkhira', 'Ashashuni', 'Baradal', '9461', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1023, 'Sylhet', 'Satkhira', 'Debbhata', 'Debbhata', '9430', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1024, 'Sylhet', 'Satkhira', 'Debbhata', 'Gurugram', '9431', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1025, 'Sylhet', 'Satkhira', 'kalaroa', 'Chandanpur', '9415', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1026, 'Sylhet', 'Satkhira', 'kalaroa', 'Hamidpur', '9413', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1027, 'Sylhet', 'Satkhira', 'kalaroa', 'Jhaudanga', '9412', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1028, 'Sylhet', 'Satkhira', 'kalaroa', 'kalaroa', '9410', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1029, 'Sylhet', 'Satkhira', 'kalaroa', 'Khordo', '9414', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1030, 'Sylhet', 'Satkhira', 'kalaroa', 'Murarikati', '9411', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1031, 'Sylhet', 'Satkhira', 'Kaliganj UPO', 'Kaliganj UPO', '9440', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1032, 'Sylhet', 'Satkhira', 'Kaliganj UPO', 'Nalta Mubaroknagar', '9441', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1033, 'Sylhet', 'Satkhira', 'Kaliganj UPO', 'Ratanpur', '9442', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1034, 'Sylhet', 'Satkhira', 'Nakipur', 'Buri Goalini', '9453', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1035, 'Sylhet', 'Satkhira', 'Nakipur', 'Gabura', '9454', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1036, 'Sylhet', 'Satkhira', 'Nakipur', 'Habinagar', '9455', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1037, 'Sylhet', 'Satkhira', 'Nakipur', 'Nakipur', '9450', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1038, 'Sylhet', 'Satkhira', 'Nakipur', 'Naobeki', '9452', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1039, 'Sylhet', 'Satkhira', 'Nakipur', 'Noornagar', '9451', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1040, 'Sylhet', 'Satkhira', 'Satkhira Sadar', 'Budhhat', '9403', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1041, 'Sylhet', 'Satkhira', 'Satkhira Sadar', 'Gunakar kati', '9402', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1042, 'Sylhet', 'Satkhira', 'Satkhira Sadar', 'Satkhira Islamia Acc', '9401', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1043, 'Sylhet', 'Satkhira', 'Satkhira Sadar', 'Satkhira Sadar', '9400', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1044, 'Sylhet', 'Satkhira', 'Taala', 'Patkelghata', '9421', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1045, 'Sylhet', 'Satkhira', 'Taala', 'Taala', '9420', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1046, 'Barisal', 'Barguna', 'Amtali', 'Amtali', '8710', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1047, 'Barisal', 'Barguna', 'Bamna', 'Bamna', '8730', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1048, 'Barisal', 'Barguna', 'Barguna Sadar', 'Barguna Sadar', '8700', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1049, 'Barisal', 'Barguna', 'Barguna Sadar', 'Nali Bandar', '8701', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1050, 'Barisal', 'Barguna', 'Betagi', 'Betagi', '8740', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1051, 'Barisal', 'Barguna', 'Betagi', 'Darul Ulam', '8741', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1052, 'Barisal', 'Barguna', 'Patharghata', 'Kakchira', '8721', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1053, 'Barisal', 'Barguna', 'Patharghata', 'Patharghata', '8720', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1054, 'Barisal', 'Barishal', 'Agailzhara', 'Agailzhara', '8240', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1055, 'Barisal', 'Barishal', 'Agailzhara', 'Gaila', '8241', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1056, 'Barisal', 'Barishal', 'Agailzhara', 'Paisarhat', '8242', '2015-06-25 05:41:37', '2015-06-25 05:41:37'),
(1057, 'Barisal', 'Barishal', 'Babuganj', 'Babuganj', '8210', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1058, 'Barisal', 'Barishal', 'Babuganj', 'Barishal Cadet', '8216', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1059, 'Barisal', 'Barishal', 'Babuganj', 'Chandpasha', '8212', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1060, 'Barisal', 'Barishal', 'Babuganj', 'Madhabpasha', '8213', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1061, 'Barisal', 'Barishal', 'Babuganj', 'Nizamuddin College', '8215', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1062, 'Barisal', 'Barishal', 'Babuganj', 'Rahamatpur', '8211', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1063, 'Barisal', 'Barishal', 'Babuganj', 'Thakur Mallik', '8214', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1064, 'Barisal', 'Barishal', 'Barajalia', 'Barajalia', '8260', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1065, 'Barisal', 'Barishal', 'Barajalia', 'Osman Manjil', '8261', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1066, 'Barisal', 'Barishal', 'Barishal Sadar', 'Barishal Sadar', '8200', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1067, 'Barisal', 'Barishal', 'Barishal Sadar', 'Bukhainagar', '8201', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1068, 'Barisal', 'Barishal', 'Barishal Sadar', 'Jaguarhat', '8206', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1069, 'Barisal', 'Barishal', 'Barishal Sadar', 'Kashipur', '8205', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1070, 'Barisal', 'Barishal', 'Barishal Sadar', 'Patang', '8204', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1071, 'Barisal', 'Barishal', 'Barishal Sadar', 'Saheberhat', '8202', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1072, 'Barisal', 'Barishal', 'Barishal Sadar', 'Sugandia', '8203', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1073, 'Barisal', 'Barishal', 'Gouranadi', 'Batajor', '8233', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1074, 'Barisal', 'Barishal', 'Gouranadi', 'Gouranadi', '8230', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1075, 'Barisal', 'Barishal', 'Gouranadi', 'Kashemabad', '8232', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1076, 'Barisal', 'Barishal', 'Gouranadi', 'Tarki Bandar', '8231', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1077, 'Barisal', 'Barishal', 'Mahendiganj', 'Langutia', '8274', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1078, 'Barisal', 'Barishal', 'Mahendiganj', 'Laskarpur', '8271', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1079, 'Barisal', 'Barishal', 'Mahendiganj', 'Mahendiganj', '8270', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1080, 'Barisal', 'Barishal', 'Mahendiganj', 'Nalgora', '8273', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1081, 'Barisal', 'Barishal', 'Mahendiganj', 'Ulania', '8272', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1082, 'Barisal', 'Barishal', 'Muladi', 'Charkalekhan', '8252', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1083, 'Barisal', 'Barishal', 'Muladi', 'Kazirchar', '8251', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1084, 'Barisal', 'Barishal', 'Muladi', 'Muladi', '8250', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1085, 'Barisal', 'Barishal', 'Sahebganj', 'Charamandi', '8281', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1086, 'Barisal', 'Barishal', 'Sahebganj', 'kalaskati', '8284', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1087, 'Barisal', 'Barishal', 'Sahebganj', 'Padri Shibpur', '8282', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1088, 'Barisal', 'Barishal', 'Sahebganj', 'Sahebganj', '8280', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1089, 'Barisal', 'Barishal', 'Sahebganj', 'Shialguni', '8283', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1090, 'Barisal', 'Barishal', 'Uzirpur', 'Dakuarhat', '8223', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1091, 'Barisal', 'Barishal', 'Uzirpur', 'Dhamura', '8221', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1092, 'Barisal', 'Barishal', 'Uzirpur', 'Jugirkanda', '8222', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1093, 'Barisal', 'Barishal', 'Uzirpur', 'Shikarpur', '8224', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1094, 'Barisal', 'Barishal', 'Uzirpur', 'Uzirpur', '8220', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1095, 'Barisal', 'Bhola', 'Bhola Sadar', 'Bhola Sadar', '8300', '2015-06-25 05:41:38', '2015-06-25 05:41:38'),
(1096, 'Barisal', 'Bhola', 'Bhola Sadar', 'Joynagar', '8301', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1097, 'Barisal', 'Bhola', 'Borhanuddin UPO', 'Borhanuddin UPO', '8320', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1098, 'Barisal', 'Bhola', 'Borhanuddin UPO', 'Mirzakalu', '8321', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1099, 'Barisal', 'Bhola', 'Charfashion', 'Charfashion', '8340', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1100, 'Barisal', 'Bhola', 'Charfashion', 'Dularhat', '8341', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1101, 'Barisal', 'Bhola', 'Charfashion', 'Keramatganj', '8342', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1102, 'Barisal', 'Bhola', 'Doulatkhan', 'Doulatkhan', '8310', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1103, 'Barisal', 'Bhola', 'Doulatkhan', 'Hajipur', '8311', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1104, 'Barisal', 'Bhola', 'Hajirhat', 'Hajirhat', '8360', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1105, 'Barisal', 'Bhola', 'Hatshoshiganj', 'Hatshoshiganj', '8350', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1106, 'Barisal', 'Bhola', 'Lalmohan UPO', 'Daurihat', '8331', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1107, 'Barisal', 'Bhola', 'Lalmohan UPO', 'Gazaria', '8332', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1108, 'Barisal', 'Bhola', 'Lalmohan UPO', 'Lalmohan UPO', '8330', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1109, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Baukathi', '8402', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1110, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Gabha', '8403', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1111, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Jhalokathi Sadar', '8400', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1112, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Nabagram', '8401', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1113, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Shekherhat', '8404', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1114, 'Barisal', 'Jhalokathi', 'Kathalia', 'Amua', '8431', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1115, 'Barisal', 'Jhalokathi', 'Kathalia', 'Kathalia', '8430', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1116, 'Barisal', 'Jhalokathi', 'Kathalia', 'Niamatee', '8432', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1117, 'Barisal', 'Jhalokathi', 'Kathalia', 'Shoulajalia', '8433', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1118, 'Barisal', 'Jhalokathi', 'Nalchhiti', 'Beerkathi', '8421', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1119, 'Barisal', 'Jhalokathi', 'Nalchhiti', 'Nalchhiti', '8420', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1120, 'Barisal', 'Jhalokathi', 'Rajapur', 'Rajapur', '8410', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1121, 'Barisal', 'Patuakhali', 'Bauphal', 'Bagabandar', '8621', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1122, 'Barisal', 'Patuakhali', 'Bauphal', 'Bauphal', '8620', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1123, 'Barisal', 'Patuakhali', 'Bauphal', 'Birpasha', '8622', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1124, 'Barisal', 'Patuakhali', 'Bauphal', 'Kalaia', '8624', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1125, 'Barisal', 'Patuakhali', 'Bauphal', 'Kalishari', '8623', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1126, 'Barisal', 'Patuakhali', 'Dashmina', 'Dashmina', '8630', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1127, 'Barisal', 'Patuakhali', 'Galachipa', 'Galachipa', '8640', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1128, 'Barisal', 'Patuakhali', 'Galachipa', 'Gazipur Bandar', '8641', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1129, 'Barisal', 'Patuakhali', 'Khepupara', 'Khepupara', '8650', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1130, 'Barisal', 'Patuakhali', 'Khepupara', 'Mahipur', '8651', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1131, 'Barisal', 'Patuakhali', 'Patuakhali Sadar', 'Dumkee', '8602', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1132, 'Barisal', 'Patuakhali', 'Patuakhali Sadar', 'Moukaran', '8601', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1133, 'Barisal', 'Patuakhali', 'Patuakhali Sadar', 'Patuakhali Sadar', '8600', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1134, 'Barisal', 'Patuakhali', 'Patuakhali Sadar', 'Rahimabad', '8603', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1135, 'Barisal', 'Patuakhali', 'Subidkhali', 'Subidkhali', '8610', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1136, 'Barisal', 'Pirojpur', 'Banaripara', 'Banaripara', '8530', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1137, 'Barisal', 'Pirojpur', 'Banaripara', 'Chakhar', '8531', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1138, 'Barisal', 'Pirojpur', 'Bhandaria', 'Bhandaria', '8550', '2015-06-25 05:41:39', '2015-06-25 05:41:39'),
(1139, 'Barisal', 'Pirojpur', 'Bhandaria', 'Dhaoa', '8552', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1140, 'Barisal', 'Pirojpur', 'Bhandaria', 'Kanudashkathi', '8551', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1141, 'Barisal', 'Pirojpur', 'kaukhali', 'Jolagati', '8513', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1142, 'Barisal', 'Pirojpur', 'kaukhali', 'Joykul', '8512', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1143, 'Barisal', 'Pirojpur', 'kaukhali', 'Kaukhali', '8510', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1144, 'Barisal', 'Pirojpur', 'kaukhali', 'Keundia', '8511', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1145, 'Barisal', 'Pirojpur', 'Mathbaria', 'Betmor Natun Hat', '8565', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1146, 'Barisal', 'Pirojpur', 'Mathbaria', 'Gulishakhali', '8563', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1147, 'Barisal', 'Pirojpur', 'Mathbaria', 'Halta', '8562', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1148, 'Barisal', 'Pirojpur', 'Mathbaria', 'Mathbaria', '8560', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1149, 'Barisal', 'Pirojpur', 'Mathbaria', 'Shilarganj', '8566', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1150, 'Barisal', 'Pirojpur', 'Mathbaria', 'Tiarkhali', '8564', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1151, 'Barisal', 'Pirojpur', 'Mathbaria', 'Tushkhali', '8561', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1152, 'Barisal', 'Pirojpur', 'Nazirpur', 'Nazirpur', '8540', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1153, 'Barisal', 'Pirojpur', 'Nazirpur', 'Sriramkathi', '8541', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1154, 'Barisal', 'Pirojpur', 'Pirojpur Sadar', 'Hularhat', '8501', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1155, 'Barisal', 'Pirojpur', 'Pirojpur Sadar', 'Parerhat', '8502', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1156, 'Barisal', 'Pirojpur', 'Pirojpur Sadar', 'Pirojpur Sadar', '8500', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1157, 'Barisal', 'Pirojpur', 'Swarupkathi', 'Darus Sunnat', '8521', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1158, 'Barisal', 'Pirojpur', 'Swarupkathi', 'Jalabari', '8523', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1159, 'Barisal', 'Pirojpur', 'Swarupkathi', 'Kaurikhara', '8522', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1160, 'Barisal', 'Pirojpur', 'Swarupkathi', 'Swarupkathi', '8520', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1161, 'Rajshahi', 'Bogra', 'Alamdighi', 'Adamdighi', '5890', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1162, 'Rajshahi', 'Bogra', 'Alamdighi', 'Nasharatpur', '5892', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1163, 'Rajshahi', 'Bogra', 'Alamdighi', 'Santahar', '5891', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1164, 'Rajshahi', 'Bogra', 'Bogra Sadar', 'Bogra Canttonment', '5801', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1165, 'Rajshahi', 'Bogra', 'Bogra Sadar', 'Bogra Sadar', '5800', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1166, 'Rajshahi', 'Bogra', 'Dhunat', 'Dhunat', '5850', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1167, 'Rajshahi', 'Bogra', 'Dhunat', 'Gosaibari', '5851', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1168, 'Rajshahi', 'Bogra', 'Dupchachia', 'Dupchachia', '5880', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1169, 'Rajshahi', 'Bogra', 'Dupchachia', 'Talora', '5881', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1170, 'Rajshahi', 'Bogra', 'Gabtoli', 'Gabtoli', '5820', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1171, 'Rajshahi', 'Bogra', 'Gabtoli', 'Sukhanpukur', '5821', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1172, 'Rajshahi', 'Bogra', 'Kahalu', 'Kahalu', '5870', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1173, 'Rajshahi', 'Bogra', 'Nandigram', 'Nandigram', '5860', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1174, 'Rajshahi', 'Bogra', 'Sariakandi', 'Chandan Baisha', '5831', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1175, 'Rajshahi', 'Bogra', 'Sariakandi', 'Sariakandi', '5830', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1176, 'Rajshahi', 'Bogra', 'Sherpur', 'Chandaikona', '5841', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1177, 'Rajshahi', 'Bogra', 'Sherpur', 'Palli Unnyan Accadem', '5842', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1178, 'Rajshahi', 'Bogra', 'Sherpur', 'Sherpur', '5840', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1179, 'Rajshahi', 'Bogra', 'Shibganj', 'Shibganj', '5810', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1180, 'Rajshahi', 'Bogra', 'Sonatola', 'Sonatola', '5826', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1181, 'Rajshahi', 'Chapinawabganj', 'Bholahat', 'Bholahat', '6330', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1182, 'Rajshahi', 'Chapinawabganj', 'Chapinawabganj Sadar', 'Amnura', '6303', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1183, 'Rajshahi', 'Chapinawabganj', 'Chapinawabganj Sadar', 'Chapinawbganj Sadar', '6300', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1184, 'Rajshahi', 'Chapinawabganj', 'Chapinawabganj Sadar', 'Rajarampur', '6301', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1185, 'Rajshahi', 'Chapinawabganj', 'Chapinawabganj Sadar', 'Ramchandrapur', '6302', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1186, 'Rajshahi', 'Chapinawabganj', 'Nachol', 'Mandumala', '6311', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1187, 'Rajshahi', 'Chapinawabganj', 'Nachol', 'Nachol', '6310', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1188, 'Rajshahi', 'Chapinawabganj', 'Rohanpur', 'Gomashtapur', '6321', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1189, 'Rajshahi', 'Chapinawabganj', 'Rohanpur', 'Rohanpur', '6320', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1190, 'Rajshahi', 'Chapinawabganj', 'Shibganj U.P.O', 'Kansart', '6341', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1191, 'Rajshahi', 'Chapinawabganj', 'Shibganj U.P.O', 'Manaksha', '6342', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1192, 'Rajshahi', 'Chapinawabganj', 'Shibganj U.P.O', 'Shibganj U.P.O', '6340', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1193, 'Rajshahi', 'Joypurhat', 'Akkelpur', 'Akklepur', '5940', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1194, 'Rajshahi', 'Joypurhat', 'Akkelpur', 'jamalganj', '5941', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1195, 'Rajshahi', 'Joypurhat', 'Akkelpur', 'Tilakpur', '5942', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1196, 'Rajshahi', 'Joypurhat', 'Joypurhat Sadar', 'Joypurhat Sadar', '5900', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1197, 'Rajshahi', 'Joypurhat', 'kalai', 'kalai', '5930', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1198, 'Rajshahi', 'Joypurhat', 'Khetlal', 'Khetlal', '5920', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1199, 'Rajshahi', 'Joypurhat', 'panchbibi', 'Panchbibi', '5910', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1200, 'Rajshahi', 'Naogaon', 'Ahsanganj', 'Ahsanganj', '6596', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1201, 'Rajshahi', 'Naogaon', 'Ahsanganj', 'Bandai', '6597', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1202, 'Rajshahi', 'Naogaon', 'Badalgachhi', 'Badalgachhi', '6570', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1203, 'Rajshahi', 'Naogaon', 'Dhamuirhat', 'Dhamuirhat', '6580', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1204, 'Rajshahi', 'Naogaon', 'Mahadebpur', 'Mahadebpur', '6530', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1205, 'Rajshahi', 'Naogaon', 'Naogaon Sadar', 'Naogaon Sadar', '6500', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1206, 'Rajshahi', 'Naogaon', 'Niamatpur', 'Niamatpur', '6520', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1207, 'Rajshahi', 'Naogaon', 'Nitpur', 'Nitpur', '6550', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1208, 'Rajshahi', 'Naogaon', 'Nitpur', 'Panguria', '6552', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1209, 'Rajshahi', 'Naogaon', 'Nitpur', 'Porsa', '6551', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1210, 'Rajshahi', 'Naogaon', 'Patnitala', 'Patnitala', '6540', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1211, 'Rajshahi', 'Naogaon', 'Prasadpur', 'Balihar', '6512', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1212, 'Rajshahi', 'Naogaon', 'Prasadpur', 'Manda', '6511', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1213, 'Rajshahi', 'Naogaon', 'Prasadpur', 'Prasadpur', '6510', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1214, 'Rajshahi', 'Naogaon', 'Raninagar', 'Kashimpur', '6591', '2015-06-25 05:41:40', '2015-06-25 05:41:40'),
(1215, 'Rajshahi', 'Naogaon', 'Raninagar', 'Raninagar', '6590', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1216, 'Rajshahi', 'Naogaon', 'Sapahar', 'Moduhil', '6561', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1217, 'Rajshahi', 'Naogaon', 'Sapahar', 'Sapahar', '6560', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1218, 'Rajshahi', 'Natore', 'Gopalpur UPO', 'Abdulpur', '6422', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1219, 'Rajshahi', 'Natore', 'Gopalpur UPO', 'Gopalpur U.P.O', '6420', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1220, 'Rajshahi', 'Natore', 'Gopalpur UPO', 'Lalpur S.O', '6421', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1221, 'Rajshahi', 'Natore', 'Harua', 'Baraigram', '6432', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1222, 'Rajshahi', 'Natore', 'Harua', 'Dayarampur', '6431', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1223, 'Rajshahi', 'Natore', 'Harua', 'Harua', '6430', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1224, 'Rajshahi', 'Natore', 'Hatgurudaspur', 'Hatgurudaspur', '6440', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1225, 'Rajshahi', 'Natore', 'Laxman', 'Laxman', '6410', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1226, 'Rajshahi', 'Natore', 'Natore Sadar', 'Baiddyabal Gharia', '6402', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1227, 'Rajshahi', 'Natore', 'Natore Sadar', 'Digapatia', '6401', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1228, 'Rajshahi', 'Natore', 'Natore Sadar', 'Madhnagar', '6403', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1229, 'Rajshahi', 'Natore', 'Natore Sadar', 'Natore Sadar', '6400', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1230, 'Rajshahi', 'Natore', 'Singra', 'Singra', '6450', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1231, 'Rajshahi', 'Pabna', 'Banwarinagar', 'Banwarinagar', '6650', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1232, 'Rajshahi', 'Pabna', 'Bera', 'Bera', '6680', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1233, 'Rajshahi', 'Pabna', 'Bera', 'Kashinathpur', '6682', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1234, 'Rajshahi', 'Pabna', 'Bera', 'Nakalia', '6681', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1235, 'Rajshahi', 'Pabna', 'Bera', 'Puran Bharenga', '6683', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1236, 'Rajshahi', 'Pabna', 'Bhangura', 'Bhangura', '6640', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1237, 'Rajshahi', 'Pabna', 'Chatmohar', 'Chatmohar', '6630', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1238, 'Rajshahi', 'Pabna', 'Debottar', 'Debottar', '6610', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1239, 'Rajshahi', 'Pabna', 'Ishwardi', 'Dhapari', '6621', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1240, 'Rajshahi', 'Pabna', 'Ishwardi', 'Ishwardi', '6620', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1241, 'Rajshahi', 'Pabna', 'Ishwardi', 'Pakshi', '6622', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1242, 'Rajshahi', 'Pabna', 'Ishwardi', 'Rajapur', '6623', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1243, 'Rajshahi', 'Pabna', 'Pabna Sadar', 'Hamayetpur', '6602', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1244, 'Rajshahi', 'Pabna', 'Pabna Sadar', 'Kaliko Cotton Mills', '6601', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1245, 'Rajshahi', 'Pabna', 'Pabna Sadar', 'Pabna Sadar', '6600', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1246, 'Rajshahi', 'Pabna', 'Sathia', 'Sathia', '6670', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1247, 'Rajshahi', 'Pabna', 'Sujanagar', 'Sagarkandi', '6661', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1248, 'Rajshahi', 'Pabna', 'Sujanagar', 'Sujanagar', '6660', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1249, 'Rajshahi', 'Rajshahi', 'Bagha', 'Arani', '6281', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1250, 'Rajshahi', 'Rajshahi', 'Bagha', 'Bagha', '6280', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1251, 'Rajshahi', 'Rajshahi', 'Bhabaniganj', 'Bhabaniganj', '6250', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1252, 'Rajshahi', 'Rajshahi', 'Bhabaniganj', 'Taharpur', '6251', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1253, 'Rajshahi', 'Rajshahi', 'Charghat', 'Charghat', '6270', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1254, 'Rajshahi', 'Rajshahi', 'Charghat', 'Sarda', '6271', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1255, 'Rajshahi', 'Rajshahi', 'Durgapur', 'Durgapur', '6240', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1256, 'Rajshahi', 'Rajshahi', 'Godagari', 'Godagari', '6290', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1257, 'Rajshahi', 'Rajshahi', 'Godagari', 'Premtoli', '6291', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1258, 'Rajshahi', 'Rajshahi', 'Khod Mohanpur', 'Khodmohanpur', '6220', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1259, 'Rajshahi', 'Rajshahi', 'Lalitganj', 'Lalitganj', '6210', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1260, 'Rajshahi', 'Rajshahi', 'Lalitganj', 'Rajshahi Sugar Mills', '6211', '2015-06-25 05:41:41', '2015-06-25 05:41:41'),
(1261, 'Rajshahi', 'Rajshahi', 'Lalitganj', 'Shyampur', '6212', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1262, 'Rajshahi', 'Rajshahi', 'Putia', 'Putia', '6260', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1263, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Binodpur Bazar', '6206', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1264, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Ghuramara', '6100', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1265, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Kazla', '6204', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1266, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi Canttonment', '6202', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1267, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi Court', '6201', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1268, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi Sadar', '6000', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1269, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi University', '6205', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1270, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Sapura', '6203', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1271, 'Rajshahi', 'Rajshahi', 'Tanor', 'Tanor', '6230', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1272, 'Rajshahi', 'Sirajganj', 'Baiddya Jam Toil', 'Baiddya Jam Toil', '6730', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1273, 'Rajshahi', 'Sirajganj', 'Belkuchi', 'Belkuchi', '6740', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1274, 'Rajshahi', 'Sirajganj', 'Belkuchi', 'Enayetpur', '6751', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1275, 'Rajshahi', 'Sirajganj', 'Belkuchi', 'Rajapur', '6742', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1276, 'Rangpur', 'Dinajpur', 'Bangla Hili', 'Bangla Hili', '5270', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1277, 'Rangpur', 'Dinajpur', 'Biral', 'Biral', '5210', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1278, 'Rangpur', 'Dinajpur', 'Birampur', 'Birampur', '5266', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1279, 'Rangpur', 'Dinajpur', 'Birganj', 'Birganj', '5220', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1280, 'Rangpur', 'Dinajpur', 'Chrirbandar', 'Chrirbandar', '5240', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1281, 'Rangpur', 'Dinajpur', 'Chrirbandar', 'Ranirbandar', '5241', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1282, 'Rangpur', 'Dinajpur', 'Dinajpur Sadar', 'Dinajpur Rajbari', '5201', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1283, 'Rangpur', 'Dinajpur', 'Dinajpur Sadar', 'Dinajpur Sadar', '5200', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1284, 'Rangpur', 'Dinajpur', 'Khansama', 'Khansama', '5230', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1285, 'Rangpur', 'Dinajpur', 'Khansama', 'Pakarhat', '5231', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1286, 'Rangpur', 'Dinajpur', 'Maharajganj', 'Maharajganj', '5226', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1287, 'Rangpur', 'Dinajpur', 'Nababganj', 'Daudpur', '5281', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1288, 'Rangpur', 'Dinajpur', 'Nababganj', 'Gopalpur', '5282', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1289, 'Rangpur', 'Dinajpur', 'Nababganj', 'Nababganj', '5280', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1290, 'Rangpur', 'Dinajpur', 'Osmanpur', 'Ghoraghat', '5291', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1291, 'Rangpur', 'Dinajpur', 'Osmanpur', 'Osmanpur', '5290', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1292, 'Rangpur', 'Dinajpur', 'Parbatipur', 'Parbatipur', '5250', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1293, 'Rangpur', 'Dinajpur', 'Phulbari', 'Phulbari', '5260', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1294, 'Rangpur', 'Dinajpur', 'Setabganj', 'Setabganj', '5216', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1295, 'Rangpur', 'Gaibandha', 'Bonarpara', 'Bonarpara', '5750', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1296, 'Rangpur', 'Gaibandha', 'Bonarpara', 'saghata', '5751', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1297, 'Rangpur', 'Gaibandha', 'Gaibandha Sadar', 'Gaibandha Sadar', '5700', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1298, 'Rangpur', 'Gaibandha', 'Gobindaganj', 'Gobindhaganj', '5740', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1299, 'Rangpur', 'Gaibandha', 'Gobindaganj', 'Mahimaganj', '5741', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1300, 'Rangpur', 'Gaibandha', 'Palashbari', 'Palashbari', '5730', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1301, 'Rangpur', 'Gaibandha', 'Phulchhari', 'Bharatkhali', '5761', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1302, 'Rangpur', 'Gaibandha', 'Phulchhari', 'Phulchhari', '5760', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1303, 'Rangpur', 'Gaibandha', 'Saadullapur', 'Naldanga', '5711', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1304, 'Rangpur', 'Gaibandha', 'Saadullapur', 'Saadullapur', '5710', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1305, 'Rangpur', 'Gaibandha', 'Sundarganj', 'Bamandanga', '5721', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1306, 'Rangpur', 'Gaibandha', 'Sundarganj', 'Sundarganj', '5720', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1307, 'Rangpur', 'Kurigram', 'Bhurungamari', 'Bhurungamari', '5670', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1308, 'Rangpur', 'Kurigram', 'Chilmari', 'Chilmari', '5630', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1309, 'Rangpur', 'Kurigram', 'Chilmari', 'Jorgachh', '5631', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1310, 'Rangpur', 'Kurigram', 'Kurigram Sadar', 'Kurigram Sadar', '5600', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1311, 'Rangpur', 'Kurigram', 'Kurigram Sadar', 'Pandul', '5601', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1312, 'Rangpur', 'Kurigram', 'Kurigram Sadar', 'Phulbari', '5680', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1313, 'Rangpur', 'Kurigram', 'Nageshwar', 'Nageshwar', '5660', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1314, 'Rangpur', 'Kurigram', 'Rajarhat', 'Nazimkhan', '5611', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1315, 'Rangpur', 'Kurigram', 'Rajarhat', 'Rajarhat', '5610', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1316, 'Rangpur', 'Kurigram', 'Rajibpur', 'Rajibpur', '5650', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1317, 'Rangpur', 'Kurigram', 'Roumari', 'Roumari', '5640', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1318, 'Rangpur', 'Kurigram', 'Ulipur', 'Bazarhat', '5621', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1319, 'Rangpur', 'Kurigram', 'Ulipur', 'Ulipur', '5620', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1320, 'Rangpur', 'Lalmonirhat', 'Aditmari', 'Aditmari', '5510', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1321, 'Rangpur', 'Lalmonirhat', 'Hatibandha', 'Hatibandha', '5530', '2015-06-25 05:41:42', '2015-06-25 05:41:42'),
(1322, 'Rangpur', 'Lalmonirhat', 'Lalmonirhat Sadar', 'Kulaghat SO', '5502', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1323, 'Rangpur', 'Lalmonirhat', 'Lalmonirhat Sadar', 'Lalmonirhat Sadar', '5500', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1324, 'Rangpur', 'Lalmonirhat', 'Lalmonirhat Sadar', 'Moghalhat', '5501', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1325, 'Rangpur', 'Lalmonirhat', 'Patgram', 'Baura', '5541', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1326, 'Rangpur', 'Lalmonirhat', 'Patgram', 'Burimari', '5542', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1327, 'Rangpur', 'Lalmonirhat', 'Patgram', 'Patgram', '5540', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1328, 'Rangpur', 'Lalmonirhat', 'Tushbhandar', 'Tushbhandar', '5520', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1329, 'Rangpur', 'Nilphamari', 'Dimla', 'Dimla', '5350', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1330, 'Rangpur', 'Nilphamari', 'Dimla', 'Ghaga Kharibari', '5351', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1331, 'Rangpur', 'Nilphamari', 'Domar', 'Chilahati', '5341', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1332, 'Rangpur', 'Nilphamari', 'Domar', 'Domar', '5340', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1333, 'Rangpur', 'Nilphamari', 'Jaldhaka', 'Jaldhaka', '5330', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1334, 'Rangpur', 'Nilphamari', 'Kishoriganj', 'Kishoriganj', '5320', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1335, 'Rangpur', 'Nilphamari', 'Nilphamari Sadar', 'Nilphamari Sadar', '5300', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1336, 'Rangpur', 'Nilphamari', 'Nilphamari Sadar', 'Nilphamari Sugar Mil', '5301', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1337, 'Rangpur', 'Nilphamari', 'Syedpur', 'Syedpur', '5310', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1338, 'Rangpur', 'Nilphamari', 'Syedpur', 'Syedpur Upashahar', '5311', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1339, 'Rangpur', 'Panchagarh', 'Boda', 'Boda', '5010', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1340, 'Rangpur', 'Panchagarh', 'Chotto Dab', 'Chotto Dab', '5040', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1341, 'Rangpur', 'Panchagarh', 'Chotto Dab', 'Mirjapur', '5041', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1342, 'Rangpur', 'Panchagarh', 'Dabiganj', 'Dabiganj', '5020', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1343, 'Rangpur', 'Panchagarh', 'Panchagra Sadar', 'Panchagar Sadar', '5000', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1344, 'Rangpur', 'Panchagarh', 'Tetulia', 'Tetulia', '5030', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1345, 'Rangpur', 'Rangpur', 'Badarganj', 'Badarganj', '5430', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1346, 'Rangpur', 'Rangpur', 'Badarganj', 'Shyampur', '5431', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1347, 'Rangpur', 'Rangpur', 'Gangachara', 'Gangachara', '5410', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1348, 'Rangpur', 'Rangpur', 'Kaunia', 'Haragachh', '5441', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1349, 'Rangpur', 'Rangpur', 'Kaunia', 'Kaunia', '5440', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1350, 'Rangpur', 'Rangpur', 'Mithapukur', 'Mithapukur', '5460', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1351, 'Rangpur', 'Rangpur', 'Pirgachha', 'Pirgachha', '5450', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1352, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Alamnagar', '5402', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1353, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Mahiganj', '5403', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1354, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Rangpur Cadet Colleg', '5404', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1355, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Rangpur Carmiecal Col', '5405', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1356, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Rangpur Sadar', '5400', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1357, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Rangpur Upa-Shahar', '5401', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1358, 'Rangpur', 'Rangpur', 'Taraganj', 'Taraganj', '5420', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1359, 'Rangpur', 'Thakurgaon', 'Baliadangi', 'Baliadangi', '5140', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1360, 'Rangpur', 'Thakurgaon', 'Baliadangi', 'Lahiri', '5141', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1361, 'Rangpur', 'Thakurgaon', 'Jibanpur', 'Jibanpur', '5130', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1362, 'Rangpur', 'Thakurgaon', 'Pirganj', 'Pirganj', '5110', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1363, 'Rangpur', 'Thakurgaon', 'Pirganj', 'Pirganj', '5470', '2015-06-25 05:41:43', '2015-06-25 05:41:43');
INSERT INTO `districts123` (`id`, `division`, `district`, `thana`, `postoffice`, `postcode`, `created_at`, `updated_at`) VALUES
(1364, 'Rangpur', 'Thakurgaon', 'Rani Sankail', 'Nekmarad', '5121', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1365, 'Rangpur', 'Thakurgaon', 'Rani Sankail', 'Rani Sankail', '5120', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1366, 'Rangpur', 'Thakurgaon', 'Thakurgaon Sadar', 'Ruhia', '5103', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1367, 'Rangpur', 'Thakurgaon', 'Thakurgaon Sadar', 'Shibganj', '5102', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1368, 'Rangpur', 'Thakurgaon', 'Thakurgaon Sadar', 'Thakurgaon Road', '5101', '2015-06-25 05:41:43', '2015-06-25 05:41:43'),
(1369, 'Rangpur', 'Thakurgaon', 'Thakurgaon Sadar', 'Thakurgaon Sadar', '5100', '2015-06-25 05:41:44', '2015-06-25 05:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `districts_000`
--

CREATE TABLE `districts_000` (
  `id` int(11) NOT NULL,
  `division` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `upazila` varchar(100) DEFAULT NULL,
  `post_office` varchar(100) DEFAULT NULL,
  `post_code` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts_000`
--

INSERT INTO `districts_000` (`id`, `division`, `district`, `upazila`, `post_office`, `post_code`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Dhaka', 'Demra', 'Demra', '1360', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(2, 'Dhaka', 'Dhaka', 'Demra', 'Matuail', '1362', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(3, 'Dhaka', 'Dhaka', 'Demra', 'Sarulia', '1361', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(4, 'Dhaka', 'Dhaka', 'Dhaka Cantt.', 'Dhaka CantonmentTSO', '1206', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(5, 'Dhaka', 'Dhaka', 'Dhamrai', 'Dhamrai', '1350', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(6, 'Dhaka', 'Dhaka', 'Dhamrai', 'Kamalpur', '1351', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(7, 'Dhaka', 'Dhaka', 'Dhanmondi', 'Jigatala TSO', '1209', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(8, 'Dhaka', 'Dhaka', 'Gulshan', 'Banani TSO', '1213', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(9, 'Dhaka', 'Dhaka', 'Gulshan', 'Gulshan Model Town', '1212', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(10, 'Dhaka', 'Dhaka', 'Jatrabari', 'Dhania TSO', '1232', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(11, 'Dhaka', 'Dhaka', 'Joypara', 'Joypara', '1330', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(12, 'Dhaka', 'Dhaka', 'Joypara', 'Narisha', '1332', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(13, 'Dhaka', 'Dhaka', 'Joypara', 'Palamganj', '1331', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(14, 'Dhaka', 'Dhaka', 'Keraniganj', 'Ati', '1312', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(15, 'Dhaka', 'Dhaka', 'Keraniganj', 'Dhaka Jute Mills', '1311', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(16, 'Dhaka', 'Dhaka', 'Keraniganj', 'Kalatia', '1313', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(17, 'Dhaka', 'Dhaka', 'Keraniganj', 'Keraniganj', '1310', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(18, 'Dhaka', 'Dhaka', 'Khilgaon', 'KhilgaonTSO', '1219', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(19, 'Dhaka', 'Dhaka', 'Khilkhet', 'KhilkhetTSO', '1229', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(20, 'Dhaka', 'Dhaka', 'Lalbag', 'Posta TSO', '1211', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(21, 'Dhaka', 'Dhaka', 'Mirpur', 'Mirpur TSO', '1216', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(22, 'Dhaka', 'Dhaka', 'Mohammadpur', 'Mohammadpur Housing', '1207', '2015-06-25 11:41:13', '2015-06-25 11:41:13'),
(23, 'Dhaka', 'Dhaka', 'Mohammadpur', 'Sangsad BhabanTSO', '1225', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(24, 'Dhaka', 'Dhaka', 'Motijheel', 'BangabhabanTSO', '1222', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(25, 'Dhaka', 'Dhaka', 'Motijheel', 'DilkushaTSO', '1223', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(26, 'Dhaka', 'Dhaka', 'Nawabganj', 'Agla', '1323', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(27, 'Dhaka', 'Dhaka', 'Nawabganj', 'Churain', '1325', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(28, 'Dhaka', 'Dhaka', 'Nawabganj', 'Daudpur', '1322', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(29, 'Dhaka', 'Dhaka', 'Nawabganj', 'Hasnabad', '1321', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(30, 'Dhaka', 'Dhaka', 'Nawabganj', 'Khalpar', '1324', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(31, 'Dhaka', 'Dhaka', 'Nawabganj', 'Nawabganj', '1320', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(32, 'Dhaka', 'Dhaka', 'New market', 'New Market TSO', '1205', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(33, 'Dhaka', 'Dhaka', 'Palton', 'Dhaka GPO', '1000', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(34, 'Dhaka', 'Dhaka', 'Ramna', 'Shantinagr TSO', '1217', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(35, 'Dhaka', 'Dhaka', 'Sabujbag', 'Basabo TSO', '1214', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(36, 'Dhaka', 'Dhaka', 'Savar', 'Amin Bazar', '1348', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(37, 'Dhaka', 'Dhaka', 'Savar', 'Dairy Farm', '1341', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(38, 'Dhaka', 'Dhaka', 'Savar', 'EPZ', '1349', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(39, 'Dhaka', 'Dhaka', 'Savar', 'Jahangirnagar Univer', '1342', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(40, 'Dhaka', 'Dhaka', 'Savar', 'Kashem Cotton Mills', '1346', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(41, 'Dhaka', 'Dhaka', 'Savar', 'Rajphulbaria', '1347', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(42, 'Dhaka', 'Dhaka', 'Savar', 'Savar', '1340', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(43, 'Dhaka', 'Dhaka', 'Savar', 'Savar Canttonment', '1344', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(44, 'Dhaka', 'Dhaka', 'Savar', 'Saver P.A.T.C', '1343', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(45, 'Dhaka', 'Dhaka', 'Savar', 'Shimulia', '1345', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(46, 'Dhaka', 'Dhaka', 'Sutrapur', 'Dhaka Sadar HO', '1100', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(47, 'Dhaka', 'Dhaka', 'Sutrapur', 'Gendaria TSO', '1204', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(48, 'Dhaka', 'Dhaka', 'Sutrapur', 'Wari TSO', '1203', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(49, 'Dhaka', 'Dhaka', 'Tejgaon', 'Tejgaon TSO', '1215', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(50, 'Dhaka', 'Dhaka', 'Tejgaon Industrial Area', 'Dhaka Politechnic', '1208', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(51, 'Dhaka', 'Dhaka', 'Uttara', 'Uttara Model TwonTSO', '1230', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(52, 'Dhaka', 'Faridpur', 'Alfadanga', 'Alfadanga', '7870', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(53, 'Dhaka', 'Faridpur', 'Bhanga', 'Bhanga', '7830', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(54, 'Dhaka', 'Faridpur', 'Boalmari', 'Boalmari', '7860', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(55, 'Dhaka', 'Faridpur', 'Boalmari', 'Rupatpat', '7861', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(56, 'Dhaka', 'Faridpur', 'Charbhadrasan', 'Charbadrashan', '7810', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(57, 'Dhaka', 'Faridpur', 'Faridpur Sadar', 'Ambikapur', '7802', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(58, 'Dhaka', 'Faridpur', 'Faridpur Sadar', 'Baitulaman Politecni', '7803', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(59, 'Dhaka', 'Faridpur', 'Faridpur Sadar', 'Faridpursadar', '7800', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(60, 'Dhaka', 'Faridpur', 'Faridpur Sadar', 'Kanaipur', '7801', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(61, 'Dhaka', 'Faridpur', 'Madukhali', 'Kamarkali', '7851', '2015-06-25 11:41:14', '2015-06-25 11:41:14'),
(62, 'Dhaka', 'Faridpur', 'Madukhali', 'Madukhali', '7850', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(63, 'Dhaka', 'Faridpur', 'Nagarkanda', 'Nagarkanda', '7840', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(64, 'Dhaka', 'Faridpur', 'Nagarkanda', 'Talma', '7841', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(65, 'Dhaka', 'Faridpur', 'Sadarpur', 'Bishwa jaker Manjil', '7822', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(66, 'Dhaka', 'Faridpur', 'Sadarpur', 'Hat Krishapur', '7821', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(67, 'Dhaka', 'Faridpur', 'Sadarpur', 'Sadarpur', '7820', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(68, 'Dhaka', 'Faridpur', 'Shriangan', 'Shriangan', '7804', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(69, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'B.O.F', '1703', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(70, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'B.R.R', '1701', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(71, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'Chandna', '1702', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(72, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'Gazipur Sadar', '1700', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(73, 'Dhaka', 'Gazipur', 'Gazipur Sadar', 'National University', '1704', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(74, 'Dhaka', 'Gazipur', 'Kaliakaar', 'Kaliakaar', '1750', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(75, 'Dhaka', 'Gazipur', 'Kaliakaar', 'Safipur', '1751', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(76, 'Dhaka', 'Gazipur', 'Kaliganj', 'Kaliganj', '1720', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(77, 'Dhaka', 'Gazipur', 'Kaliganj', 'Pubail', '1721', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(78, 'Dhaka', 'Gazipur', 'Kaliganj', 'Santanpara', '1722', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(79, 'Dhaka', 'Gazipur', 'Kaliganj', 'Vaoal Jamalpur', '1723', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(80, 'Dhaka', 'Gazipur', 'Kapashia', 'kapashia', '1730', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(81, 'Dhaka', 'Gazipur', 'Monnunagar', 'Ershad Nagar', '1712', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(82, 'Dhaka', 'Gazipur', 'Monnunagar', 'Monnunagar', '1710', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(83, 'Dhaka', 'Gazipur', 'Monnunagar', 'Nishat Nagar', '1711', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(84, 'Dhaka', 'Gazipur', 'Sreepur', 'Barmi', '1743', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(85, 'Dhaka', 'Gazipur', 'Sreepur', 'Bashamur', '1747', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(86, 'Dhaka', 'Gazipur', 'Sreepur', 'Boubi', '1748', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(87, 'Dhaka', 'Gazipur', 'Sreepur', 'Kawraid', '1745', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(88, 'Dhaka', 'Gazipur', 'Sreepur', 'Satkhamair', '1744', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(89, 'Dhaka', 'Gazipur', 'Sreepur', 'Sreepur', '1740', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(90, 'Dhaka', 'Gazipur', 'Sripur', 'Rajendrapur', '1741', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(91, 'Dhaka', 'Gazipur', 'Sripur', 'Rajendrapur Canttome', '1742', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(92, 'Dhaka', 'Gopalganj', 'Gopalganj Sadar', 'Barfa', '8102', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(93, 'Dhaka', 'Gopalganj', 'Gopalganj Sadar', 'Chandradighalia', '8013', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(94, 'Dhaka', 'Gopalganj', 'Gopalganj Sadar', 'Gopalganj Sadar', '8100', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(95, 'Dhaka', 'Gopalganj', 'Gopalganj Sadar', 'Ulpur', '8101', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(96, 'Dhaka', 'Gopalganj', 'Kashiani', 'Jonapur', '8133', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(97, 'Dhaka', 'Gopalganj', 'Kashiani', 'Kashiani', '8130', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(98, 'Dhaka', 'Gopalganj', 'Kashiani', 'Ramdia College', '8131', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(99, 'Dhaka', 'Gopalganj', 'Kashiani', 'Ratoil', '8132', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(100, 'Dhaka', 'Gopalganj', 'Kotalipara', 'Kotalipara', '8110', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(101, 'Dhaka', 'Gopalganj', 'Maksudpur', 'Batkiamari', '8141', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(102, 'Dhaka', 'Gopalganj', 'Maksudpur', 'Khandarpara', '8142', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(103, 'Dhaka', 'Gopalganj', 'Maksudpur', 'Maksudpur', '8140', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(104, 'Dhaka', 'Gopalganj', 'Tungipara', 'Patgati', '8121', '2015-06-25 11:41:15', '2015-06-25 11:41:15'),
(105, 'Dhaka', 'Gopalganj', 'Tungipara', 'Tungipara', '8120', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(106, 'Dhaka', 'Jamalpur', 'Dewangonj', 'Dewangonj', '2030', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(107, 'Dhaka', 'Jamalpur', 'Dewangonj', 'Dewangonj S. Mills', '2031', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(108, 'Dhaka', 'Jamalpur', 'Islampur', 'Durmoot', '2021', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(109, 'Dhaka', 'Jamalpur', 'Islampur', 'Gilabari', '2022', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(110, 'Dhaka', 'Jamalpur', 'Islampur', 'Islampur', '2020', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(111, 'Dhaka', 'Jamalpur', 'Jamalpur', 'Jamalpur', '2000', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(112, 'Dhaka', 'Jamalpur', 'Jamalpur', 'Nandina', '2001', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(113, 'Dhaka', 'Jamalpur', 'Jamalpur', 'Narundi', '2002', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(114, 'Dhaka', 'Jamalpur', 'Malandah', 'Jamalpur', '2011', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(115, 'Dhaka', 'Jamalpur', 'Malandah', 'Mahmoodpur', '2013', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(116, 'Dhaka', 'Jamalpur', 'Malandah', 'Malancha', '2012', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(117, 'Dhaka', 'Jamalpur', 'Malandah', 'Malandah', '2010', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(118, 'Dhaka', 'Jamalpur', 'Mathargonj', 'Balijhuri', '2041', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(119, 'Dhaka', 'Jamalpur', 'Mathargonj', 'Mathargonj', '2040', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(120, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Bausee', '2052', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(121, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Gunerbari', '2051', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(122, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Jagannath Ghat', '2053', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(123, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Jamuna Sar Karkhana', '2055', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(124, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Pingna', '2054', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(125, 'Dhaka', 'Jamalpur', 'Shorishabari', 'Shorishabari', '2050', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(126, 'Dhaka', 'Kishoreganj', 'Bajitpur', 'Bajitpur', '2336', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(127, 'Dhaka', 'Kishoreganj', 'Bajitpur', 'Laksmipur', '2338', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(128, 'Dhaka', 'Kishoreganj', 'Bajitpur', 'Sararchar', '2337', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(129, 'Dhaka', 'Kishoreganj', 'Bhairob', 'Bhairab', '2350', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(130, 'Dhaka', 'Kishoreganj', 'Hossenpur', 'Hossenpur', '2320', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(131, 'Dhaka', 'Kishoreganj', 'Itna', 'Itna', '2390', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(132, 'Dhaka', 'Kishoreganj', 'Karimganj', 'Karimganj', '2310', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(133, 'Dhaka', 'Kishoreganj', 'Katiadi', 'Gochhihata', '2331', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(134, 'Dhaka', 'Kishoreganj', 'Katiadi', 'Katiadi', '2330', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(135, 'Dhaka', 'Kishoreganj', 'Kishoreganj Sadar', 'Kishoreganj S.Mills', '2301', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(136, 'Dhaka', 'Kishoreganj', 'Kishoreganj Sadar', 'Kishoreganj Sadar', '2300', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(137, 'Dhaka', 'Kishoreganj', 'Kishoreganj Sadar', 'Maizhati', '2302', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(138, 'Dhaka', 'Kishoreganj', 'Kishoreganj Sadar', 'Nilganj', '2303', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(139, 'Dhaka', 'Kishoreganj', 'Kuliarchar', 'Chhoysuti', '2341', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(140, 'Dhaka', 'Kishoreganj', 'Kuliarchar', 'Kuliarchar', '2340', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(141, 'Dhaka', 'Kishoreganj', 'Mithamoin', 'Abdullahpur', '2371', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(142, 'Dhaka', 'Kishoreganj', 'Mithamoin', 'MIthamoin', '2370', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(143, 'Dhaka', 'Kishoreganj', 'Nikli', 'Nikli', '2360', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(144, 'Dhaka', 'Kishoreganj', 'Ostagram', 'Ostagram', '2380', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(145, 'Dhaka', 'Kishoreganj', 'Pakundia', 'Pakundia', '2326', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(146, 'Dhaka', 'Kishoreganj', 'Tarial', 'Tarial', '2316', '2015-06-25 11:41:16', '2015-06-25 11:41:16'),
(147, 'Dhaka', 'Madaripur', 'Barhamganj', 'Bahadurpur', '7932', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(148, 'Dhaka', 'Madaripur', 'Barhamganj', 'Barhamganj', '7930', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(149, 'Dhaka', 'Madaripur', 'Barhamganj', 'Nilaksmibandar', '7931', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(150, 'Dhaka', 'Madaripur', 'Barhamganj', 'Umedpur', '7933', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(151, 'Dhaka', 'Madaripur', 'kalkini', 'Kalkini', '7920', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(152, 'Dhaka', 'Madaripur', 'kalkini', 'Sahabrampur', '7921', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(153, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Charmugria', '7901', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(154, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Habiganj', '7903', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(155, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Kulpaddi', '7902', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(156, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Madaripur Sadar', '7900', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(157, 'Dhaka', 'Madaripur', 'Madaripur Sadar', 'Mustafapur', '7904', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(158, 'Dhaka', 'Madaripur', 'Rajoir', 'Khalia', '7911', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(159, 'Dhaka', 'Madaripur', 'Rajoir', 'Rajoir', '7910', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(160, 'Dhaka', 'Manikganj', 'Doulatpur', 'Doulatpur', '1860', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(161, 'Dhaka', 'Manikganj', 'Gheor', 'Gheor', '1840', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(162, 'Dhaka', 'Manikganj', 'Lechhraganj', 'Jhitka', '1831', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(163, 'Dhaka', 'Manikganj', 'Lechhraganj', 'Lechhraganj', '1830', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(164, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Barangail', '1804', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(165, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Gorpara', '1802', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(166, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Mahadebpur', '1803', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(167, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Manikganj Bazar', '1801', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(168, 'Dhaka', 'Manikganj', 'Manikganj Sadar', 'Manikganj Sadar', '1800', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(169, 'Dhaka', 'Manikganj', 'Saturia', 'Baliati', '1811', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(170, 'Dhaka', 'Manikganj', 'Saturia', 'Saturia', '1810', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(171, 'Dhaka', 'Manikganj', 'Shibloya', 'Aricha', '1851', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(172, 'Dhaka', 'Manikganj', 'Shibloya', 'Shibaloy', '1850', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(173, 'Dhaka', 'Manikganj', 'Shibloya', 'Tewta', '1852', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(174, 'Dhaka', 'Manikganj', 'Shibloya', 'Uthli', '1853', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(175, 'Dhaka', 'Manikganj', 'Singari', 'Baira', '1821', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(176, 'Dhaka', 'Manikganj', 'Singari', 'joymantop', '1822', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(177, 'Dhaka', 'Manikganj', 'Singari', 'Singair', '1820', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(178, 'Dhaka', 'Munshiganj', 'Gajaria', 'Gajaria', '1510', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(179, 'Dhaka', 'Munshiganj', 'Gajaria', 'Hossendi', '1511', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(180, 'Dhaka', 'Munshiganj', 'Gajaria', 'Rasulpur', '1512', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(181, 'Dhaka', 'Munshiganj', 'Lohajong', 'Gouragonj', '1334', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(182, 'Dhaka', 'Munshiganj', 'Lohajong', 'Gouragonj', '1534', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(183, 'Dhaka', 'Munshiganj', 'Lohajong', 'Haldia SO', '1532', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(184, 'Dhaka', 'Munshiganj', 'Lohajong', 'Haridia', '1333', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(185, 'Dhaka', 'Munshiganj', 'Lohajong', 'Haridia DESO', '1533', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(186, 'Dhaka', 'Munshiganj', 'Lohajong', 'Korhati', '1531', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(187, 'Dhaka', 'Munshiganj', 'Lohajong', 'Lohajang', '1530', '2015-06-25 11:41:17', '2015-06-25 11:41:17'),
(188, 'Dhaka', 'Munshiganj', 'Lohajong', 'Madini Mandal', '1335', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(189, 'Dhaka', 'Munshiganj', 'Lohajong', 'Medini Mandal EDSO', '1535', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(190, 'Dhaka', 'Munshiganj', 'Munshiganj Sadar', 'Kathakhali', '1503', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(191, 'Dhaka', 'Munshiganj', 'Munshiganj Sadar', 'Mirkadim', '1502', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(192, 'Dhaka', 'Munshiganj', 'Munshiganj Sadar', 'Munshiganj Sadar', '1500', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(193, 'Dhaka', 'Munshiganj', 'Munshiganj Sadar', 'Rikabibazar', '1501', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(194, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Ichapur', '1542', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(195, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Kola', '1541', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(196, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Malkha Nagar', '1543', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(197, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Shekher Nagar', '1544', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(198, 'Dhaka', 'Munshiganj', 'Sirajdikhan', 'Sirajdikhan', '1540', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(199, 'Dhaka', 'Munshiganj', 'Srinagar', 'Baghra', '1557', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(200, 'Dhaka', 'Munshiganj', 'Srinagar', 'Barikhal', '1551', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(201, 'Dhaka', 'Munshiganj', 'Srinagar', 'Bhaggyakul', '1558', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(202, 'Dhaka', 'Munshiganj', 'Srinagar', 'Hashara', '1553', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(203, 'Dhaka', 'Munshiganj', 'Srinagar', 'Kolapara', '1554', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(204, 'Dhaka', 'Munshiganj', 'Srinagar', 'Kumarbhog', '1555', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(205, 'Dhaka', 'Munshiganj', 'Srinagar', 'Mazpara', '1552', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(206, 'Dhaka', 'Munshiganj', 'Srinagar', 'Srinagar', '1550', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(207, 'Dhaka', 'Munshiganj', 'Srinagar', 'Vaggyakul SO', '1556', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(208, 'Dhaka', 'Munshiganj', 'Tangibari', 'Bajrajugini', '1523', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(209, 'Dhaka', 'Munshiganj', 'Tangibari', 'Baligao', '1522', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(210, 'Dhaka', 'Munshiganj', 'Tangibari', 'Betkahat', '1521', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(211, 'Dhaka', 'Munshiganj', 'Tangibari', 'Dighirpar', '1525', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(212, 'Dhaka', 'Munshiganj', 'Tangibari', 'Hasail', '1524', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(213, 'Dhaka', 'Munshiganj', 'Tangibari', 'Pura', '1527', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(214, 'Dhaka', 'Munshiganj', 'Tangibari', 'Pura EDSO', '1526', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(215, 'Dhaka', 'Munshiganj', 'Tangibari', 'Tangibari', '1520', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(216, 'Dhaka', 'Mymensingh', 'Bhaluka', 'Bhaluka', '2240', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(217, 'Dhaka', 'Mymensingh', 'Fulbaria', 'Fulbaria', '2216', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(218, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Duttarbazar', '2234', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(219, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Gaforgaon', '2230', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(220, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Kandipara', '2233', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(221, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Shibganj', '2231', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(222, 'Dhaka', 'Mymensingh', 'Gaforgaon', 'Usti', '2232', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(223, 'Dhaka', 'Mymensingh', 'Gouripur', 'Gouripur', '2270', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(224, 'Dhaka', 'Mymensingh', 'Gouripur', 'Ramgopalpur', '2271', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(225, 'Dhaka', 'Mymensingh', 'Haluaghat', 'Dhara', '2261', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(226, 'Dhaka', 'Mymensingh', 'Haluaghat', 'Haluaghat', '2260', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(227, 'Dhaka', 'Mymensingh', 'Haluaghat', 'Munshirhat', '2262', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(228, 'Dhaka', 'Mymensingh', 'Isshwargonj', 'Atharabari', '2282', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(229, 'Dhaka', 'Mymensingh', 'Isshwargonj', 'Isshwargonj', '2280', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(230, 'Dhaka', 'Mymensingh', 'Isshwargonj', 'Sohagi', '2281', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(231, 'Dhaka', 'Mymensingh', 'Muktagachha', 'Muktagachha', '2210', '2015-06-25 11:41:18', '2015-06-25 11:41:18'),
(232, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Agriculture Universi', '2202', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(233, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Biddyaganj', '2204', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(234, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Kawatkhali', '2201', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(235, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Mymensingh Sadar', '2200', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(236, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Pearpur', '2205', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(237, 'Dhaka', 'Mymensingh', 'Mymensingh Sadar', 'Shombhuganj', '2203', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(238, 'Dhaka', 'Mymensingh', 'Nandail', 'Gangail', '2291', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(239, 'Dhaka', 'Mymensingh', 'Nandail', 'Nandail', '2290', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(240, 'Dhaka', 'Mymensingh', 'Phulpur', 'Beltia', '2251', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(241, 'Dhaka', 'Mymensingh', 'Phulpur', 'Phulpur', '2250', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(242, 'Dhaka', 'Mymensingh', 'Phulpur', 'Tarakanda', '2252', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(243, 'Dhaka', 'Mymensingh', 'Trishal', 'Ahmadbad', '2221', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(244, 'Dhaka', 'Mymensingh', 'Trishal', 'Dhala', '2223', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(245, 'Dhaka', 'Mymensingh', 'Trishal', 'Ram Amritaganj', '2222', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(246, 'Dhaka', 'Mymensingh', 'Trishal', 'Trishal', '2220', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(247, 'Dhaka', 'Narayanganj', 'Araihazar', 'Araihazar', '1450', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(248, 'Dhaka', 'Narayanganj', 'Araihazar', 'Gopaldi', '1451', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(249, 'Dhaka', 'Narayanganj', 'Baidder Bazar', 'Baidder Bazar', '1440', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(250, 'Dhaka', 'Narayanganj', 'Baidder Bazar', 'Bara Nagar', '1441', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(251, 'Dhaka', 'Narayanganj', 'Baidder Bazar', 'Barodi', '1442', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(252, 'Dhaka', 'Narayanganj', 'Bandar', 'Bandar', '1410', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(253, 'Dhaka', 'Narayanganj', 'Bandar', 'BIDS', '1413', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(254, 'Dhaka', 'Narayanganj', 'Bandar', 'D.C Mills', '1411', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(255, 'Dhaka', 'Narayanganj', 'Bandar', 'Madanganj', '1414', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(256, 'Dhaka', 'Narayanganj', 'Bandar', 'Nabiganj', '1412', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(257, 'Dhaka', 'Narayanganj', 'Fatullah', 'Fatulla Bazar', '1421', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(258, 'Dhaka', 'Narayanganj', 'Fatullah', 'Fatullah', '1420', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(259, 'Dhaka', 'Narayanganj', 'Narayanganj Sadar', 'Narayanganj Sadar', '1400', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(260, 'Dhaka', 'Narayanganj', 'Rupganj', 'Bhulta', '1462', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(261, 'Dhaka', 'Narayanganj', 'Rupganj', 'Kanchan', '1461', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(262, 'Dhaka', 'Narayanganj', 'Rupganj', 'Murapara', '1464', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(263, 'Dhaka', 'Narayanganj', 'Rupganj', 'Nagri', '1463', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(264, 'Dhaka', 'Narayanganj', 'Rupganj', 'Rupganj', '1460', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(265, 'Dhaka', 'Narayanganj', 'Siddirganj', 'Adamjeenagar', '1431', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(266, 'Dhaka', 'Narayanganj', 'Siddirganj', 'LN Mills', '1432', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(267, 'Dhaka', 'Narayanganj', 'Siddirganj', 'Siddirganj', '1430', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(268, 'Dhaka', 'Narshingdi', 'Belabo', 'Belabo', '1640', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(269, 'Dhaka', 'Narshingdi', 'Monohordi', 'Hatirdia', '1651', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(270, 'Dhaka', 'Narshingdi', 'Monohordi', 'Katabaria', '1652', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(271, 'Dhaka', 'Narshingdi', 'Monohordi', 'Monohordi', '1650', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(272, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Karimpur', '1605', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(273, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Madhabdi', '1604', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(274, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Narshingdi College', '1602', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(275, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Narshingdi Sadar', '1600', '2015-06-25 11:41:19', '2015-06-25 11:41:19'),
(276, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'Panchdona', '1603', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(277, 'Dhaka', 'Narshingdi', 'Narshingdi Sadar', 'UMC Jute Mills', '1601', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(278, 'Dhaka', 'Narshingdi', 'Palash', 'Char Sindhur', '1612', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(279, 'Dhaka', 'Narshingdi', 'Palash', 'Ghorashal', '1613', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(280, 'Dhaka', 'Narshingdi', 'Palash', 'Ghorashal Urea Facto', '1611', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(281, 'Dhaka', 'Narshingdi', 'Palash', 'Palash', '1610', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(282, 'Dhaka', 'Narshingdi', 'Raypura', 'Bazar Hasnabad', '1631', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(283, 'Dhaka', 'Narshingdi', 'Raypura', 'Radhaganj bazar', '1632', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(284, 'Dhaka', 'Narshingdi', 'Raypura', 'Raypura', '1630', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(285, 'Dhaka', 'Narshingdi', 'Shibpur', 'Shibpur', '1620', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(286, 'Dhaka', 'Netrakona', 'Susung Durgapur', 'Susnng Durgapur', '2420', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(287, 'Dhaka', 'Netrakona', 'Atpara', 'Atpara', '2470', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(288, 'Dhaka', 'Netrakona', 'Barhatta', 'Barhatta', '2440', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(289, 'Dhaka', 'Netrakona', 'Dharmapasha', 'Dharampasha', '2450', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(290, 'Dhaka', 'Netrakona', 'Dhobaura', 'Dhobaura', '2416', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(291, 'Dhaka', 'Netrakona', 'Dhobaura', 'Sakoai', '2417', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(292, 'Dhaka', 'Netrakona', 'Kalmakanda', 'Kalmakanda', '2430', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(293, 'Dhaka', 'Netrakona', 'Kendua', 'Kendua', '2480', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(294, 'Dhaka', 'Netrakona', 'Khaliajuri', 'Khaliajhri', '2460', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(295, 'Dhaka', 'Netrakona', 'Khaliajuri', 'Shaldigha', '2462', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(296, 'Dhaka', 'Netrakona', 'Madan', 'Madan', '2490', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(297, 'Dhaka', 'Netrakona', 'Moddhynagar', 'Moddoynagar', '2456', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(298, 'Dhaka', 'Netrakona', 'Mohanganj', 'Mohanganj', '2446', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(299, 'Dhaka', 'Netrakona', 'Netrakona Sadar', 'Baikherhati', '2401', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(300, 'Dhaka', 'Netrakona', 'Netrakona Sadar', 'Netrakona Sadar', '2400', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(301, 'Dhaka', 'Netrakona', 'Purbadhola', 'Jaria Jhanjhail', '2412', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(302, 'Dhaka', 'Netrakona', 'Purbadhola', 'Purbadhola', '2410', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(303, 'Dhaka', 'Netrakona', 'Purbadhola', 'Shamgonj', '2411', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(304, 'Dhaka', 'Rajbari', 'Baliakandi', 'Baliakandi', '7730', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(305, 'Dhaka', 'Rajbari', 'Baliakandi', 'Nalia', '7731', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(306, 'Dhaka', 'Rajbari', 'Pangsha', 'Mrigibazar', '7723', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(307, 'Dhaka', 'Rajbari', 'Pangsha', 'Pangsha', '7720', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(308, 'Dhaka', 'Rajbari', 'Pangsha', 'Ramkol', '7721', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(309, 'Dhaka', 'Rajbari', 'Pangsha', 'Ratandia', '7722', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(310, 'Dhaka', 'Rajbari', 'Rajbari Sadar', 'Goalanda', '7710', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(311, 'Dhaka', 'Rajbari', 'Rajbari Sadar', 'Khankhanapur', '7711', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(312, 'Dhaka', 'Rajbari', 'Rajbari Sadar', 'Rajbari Sadar', '7700', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(313, 'Dhaka', 'Shariatpur', 'Bhedorganj', 'Bhedorganj', '8030', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(314, 'Dhaka', 'Shariatpur', 'Damudhya', 'Damudhya', '8040', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(315, 'Dhaka', 'Shariatpur', 'Gosairhat', 'Gosairhat', '8050', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(316, 'Dhaka', 'Shariatpur', 'Jajira', 'Jajira', '8010', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(317, 'Dhaka', 'Shariatpur', 'Naria', 'Bhozeshwar', '8021', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(318, 'Dhaka', 'Shariatpur', 'Naria', 'Gharisar', '8022', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(319, 'Dhaka', 'Shariatpur', 'Naria', 'Kartikpur', '8024', '2015-06-25 11:41:20', '2015-06-25 11:41:20'),
(320, 'Dhaka', 'Shariatpur', 'Naria', 'Naria', '8020', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(321, 'Dhaka', 'Shariatpur', 'Naria', 'Upshi', '8023', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(322, 'Dhaka', 'Shariatpur', 'Shariatpur Sadar', 'Angaria', '8001', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(323, 'Dhaka', 'Shariatpur', 'Shariatpur Sadar', 'Chikandi', '8002', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(324, 'Dhaka', 'Shariatpur', 'Shariatpur Sadar', 'Shariatpur Sadar', '8000', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(325, 'Dhaka', 'Sherpur', 'Bakshigonj', 'Bakshigonj', '2140', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(326, 'Dhaka', 'Sherpur', 'Jhinaigati', 'Jhinaigati', '2120', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(327, 'Dhaka', 'Sherpur', 'Nakla', 'Gonopaddi', '2151', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(328, 'Dhaka', 'Sherpur', 'Nakla', 'Nakla', '2150', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(329, 'Dhaka', 'Sherpur', 'Nalitabari', 'Hatibandha', '2111', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(330, 'Dhaka', 'Sherpur', 'Nalitabari', 'Nalitabari', '2110', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(331, 'Dhaka', 'Sherpur', 'Sherpur Shadar', 'Sherpur Shadar', '2100', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(332, 'Dhaka', 'Sherpur', 'Shribardi', 'Shribardi', '2130', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(333, 'Dhaka', 'Tangail', 'Basail', 'Basail', '1920', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(334, 'Dhaka', 'Tangail', 'Bhuapur', 'Bhuapur', '1960', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(335, 'Dhaka', 'Tangail', 'Delduar', 'Delduar', '1910', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(336, 'Dhaka', 'Tangail', 'Delduar', 'Elasin', '1913', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(337, 'Dhaka', 'Tangail', 'Delduar', 'Hinga Nagar', '1914', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(338, 'Dhaka', 'Tangail', 'Delduar', 'Jangalia', '1911', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(339, 'Dhaka', 'Tangail', 'Delduar', 'Lowhati', '1915', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(340, 'Dhaka', 'Tangail', 'Delduar', 'Patharail', '1912', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(341, 'Dhaka', 'Tangail', 'Ghatail', 'D. Pakutia', '1982', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(342, 'Dhaka', 'Tangail', 'Ghatail', 'Dhalapara', '1983', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(343, 'Dhaka', 'Tangail', 'Ghatail', 'Ghatial', '1980', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(344, 'Dhaka', 'Tangail', 'Ghatail', 'Lohani', '1984', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(345, 'Dhaka', 'Tangail', 'Ghatail', 'Zahidganj', '1981', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(346, 'Dhaka', 'Tangail', 'Gopalpur', 'Gopalpur', '1990', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(347, 'Dhaka', 'Tangail', 'Gopalpur', 'Hemnagar', '1992', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(348, 'Dhaka', 'Tangail', 'Gopalpur', 'Jhowail', '1991', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(349, 'Dhaka', 'Tangail', 'Kalihati', 'Ballabazar', '1973', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(350, 'Dhaka', 'Tangail', 'Kalihati', 'Elinga', '1974', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(351, 'Dhaka', 'Tangail', 'Kalihati', 'Kalihati', '1970', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(352, 'Dhaka', 'Tangail', 'Kalihati', 'Nagarbari', '1977', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(353, 'Dhaka', 'Tangail', 'Kalihati', 'Nagarbari SO', '1976', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(354, 'Dhaka', 'Tangail', 'Kalihati', 'Nagbari', '1972', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(355, 'Dhaka', 'Tangail', 'Kalihati', 'Palisha', '1975', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(356, 'Dhaka', 'Tangail', 'Kalihati', 'Rajafair', '1971', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(357, 'Dhaka', 'Tangail', 'Kashkaolia', 'Kashkawlia', '1930', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(358, 'Dhaka', 'Tangail', 'Madhupur', 'Dhobari', '1997', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(359, 'Dhaka', 'Tangail', 'Madhupur', 'Madhupur', '1996', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(360, 'Dhaka', 'Tangail', 'Mirzapur', 'Gorai', '1941', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(361, 'Dhaka', 'Tangail', 'Mirzapur', 'Jarmuki', '1944', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(362, 'Dhaka', 'Tangail', 'Mirzapur', 'M.C. College', '1942', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(363, 'Dhaka', 'Tangail', 'Mirzapur', 'Mirzapur', '1940', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(364, 'Dhaka', 'Tangail', 'Mirzapur', 'Mohera', '1945', '2015-06-25 11:41:21', '2015-06-25 11:41:21'),
(365, 'Dhaka', 'Tangail', 'Mirzapur', 'Warri paikpara', '1943', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(366, 'Dhaka', 'Tangail', 'Nagarpur', 'Dhuburia', '1937', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(367, 'Dhaka', 'Tangail', 'Nagarpur', 'Nagarpur', '1936', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(368, 'Dhaka', 'Tangail', 'Nagarpur', 'Salimabad', '1938', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(369, 'Dhaka', 'Tangail', 'Sakhipur', 'Kochua', '1951', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(370, 'Dhaka', 'Tangail', 'Sakhipur', 'Sakhipur', '1950', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(371, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Kagmari', '1901', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(372, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Korotia', '1903', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(373, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Purabari', '1904', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(374, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Santosh', '1902', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(375, 'Dhaka', 'Tangail', 'Tangail Sadar', 'Tangail Sadar', '1900', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(376, 'Chittagong', 'Bandarban', 'Alikadam', 'Alikadam', '4650', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(377, 'Chittagong', 'Bandarban', 'Bandarban Sadar', 'Bandarban Sadar', '4600', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(378, 'Chittagong', 'Bandarban', 'Naikhong', 'Naikhong', '4660', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(379, 'Chittagong', 'Bandarban', 'Roanchhari', 'Roanchhari', '4610', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(380, 'Chittagong', 'Bandarban', 'Ruma', 'Ruma', '4620', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(381, 'Chittagong', 'Bandarban', 'Thanchi', 'Lama', '4641', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(382, 'Chittagong', 'Bandarban', 'Thanchi', 'Thanchi', '4630', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(383, 'Chittagong', 'Brahmanbaria', 'Akhaura', 'Akhaura', '3450', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(384, 'Chittagong', 'Brahmanbaria', 'Akhaura', 'Azampur', '3451', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(385, 'Chittagong', 'Brahmanbaria', 'Akhaura', 'Gangasagar', '3452', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(386, 'Chittagong', 'Brahmanbaria', 'Banchharampur', 'Banchharampur', '3420', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(387, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Ashuganj', '3402', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(388, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Ashuganj Share', '3403', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(389, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Brahamanbaria Sadar', '3400', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(390, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Poun', '3404', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(391, 'Chittagong', 'Brahmanbaria', 'Brahamanbaria Sadar', 'Talshahar', '3401', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(392, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Chandidar', '3462', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(393, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Chargachh', '3463', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(394, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Gopinathpur', '3464', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(395, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Kasba', '3460', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(396, 'Chittagong', 'Brahmanbaria', 'Kasba', 'Kuti', '3461', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(397, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Jibanganj', '3419', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(398, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Kaitala', '3417', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(399, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Laubfatehpur', '3411', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(400, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Nabinagar', '3410', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(401, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Rasullabad', '3412', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(402, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Ratanpur', '3414', '2015-06-25 11:41:22', '2015-06-25 11:41:22'),
(403, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Salimganj', '3418', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(404, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Shahapur', '3415', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(405, 'Chittagong', 'Brahmanbaria', 'Nabinagar', 'Shamgram', '3413', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(406, 'Chittagong', 'Brahmanbaria', 'Nasirnagar', 'Fandauk', '3441', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(407, 'Chittagong', 'Brahmanbaria', 'Nasirnagar', 'Nasirnagar', '3440', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(408, 'Chittagong', 'Brahmanbaria', 'Sarail', 'Chandura', '3432', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(409, 'Chittagong', 'Brahmanbaria', 'Sarail', 'Sarial', '3430', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(410, 'Chittagong', 'Brahmanbaria', 'Sarail', 'Shahbajpur', '3431', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(411, 'Chittagong', 'Chandpur', 'Chandpur Sadar', 'Baburhat', '3602', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(412, 'Chittagong', 'Chandpur', 'Chandpur Sadar', 'Chandpur Sadar', '3600', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(413, 'Chittagong', 'Chandpur', 'Chandpur Sadar', 'Puranbazar', '3601', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(414, 'Chittagong', 'Chandpur', 'Chandpur Sadar', 'Sahatali', '3603', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(415, 'Chittagong', 'Chandpur', 'Faridganj', 'Chandra', '3651', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(416, 'Chittagong', 'Chandpur', 'Faridganj', 'Faridganj', '3650', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(417, 'Chittagong', 'Chandpur', 'Faridganj', 'Gridkaliandia', '3653', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(418, 'Chittagong', 'Chandpur', 'Faridganj', 'Islampur Shah Isain', '3655', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(419, 'Chittagong', 'Chandpur', 'Faridganj', 'Rampurbazar', '3654', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(420, 'Chittagong', 'Chandpur', 'Faridganj', 'Rupsha', '3652', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(421, 'Chittagong', 'Chandpur', 'Hajiganj', 'Bolakhal', '3611', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(422, 'Chittagong', 'Chandpur', 'Hajiganj', 'Hajiganj', '3610', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(423, 'Chittagong', 'Chandpur', 'Hayemchar', 'Gandamara', '3661', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(424, 'Chittagong', 'Chandpur', 'Hayemchar', 'Hayemchar', '3660', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(425, 'Chittagong', 'Chandpur', 'Kachua', 'Kachua', '3630', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(426, 'Chittagong', 'Chandpur', 'Kachua', 'Pak Shrirampur', '3631', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(427, 'Chittagong', 'Chandpur', 'Kachua', 'Rahima Nagar', '3632', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(428, 'Chittagong', 'Chandpur', 'Kachua', 'Shachar', '3633', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(429, 'Chittagong', 'Chandpur', 'Matlobganj', 'Kalipur', '3642', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(430, 'Chittagong', 'Chandpur', 'Matlobganj', 'Matlobganj', '3640', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(431, 'Chittagong', 'Chandpur', 'Matlobganj', 'Mohanpur', '3641', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(432, 'Chittagong', 'Chandpur', 'Shahrasti', 'Chotoshi', '3623', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(433, 'Chittagong', 'Chandpur', 'Shahrasti', 'Islamia Madrasha', '3624', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(434, 'Chittagong', 'Chandpur', 'Shahrasti', 'Khilabazar', '3621', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(435, 'Chittagong', 'Chandpur', 'Shahrasti', 'Pashchim Kherihar Al', '3622', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(436, 'Chittagong', 'Chandpur', 'Shahrasti', 'Shahrasti', '3620', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(437, 'Chittagong', 'Chittagong', 'Anawara', 'Anowara', '4376', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(438, 'Chittagong', 'Chittagong', 'Anawara', 'Battali', '4378', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(439, 'Chittagong', 'Chittagong', 'Anawara', 'Paroikora', '4377', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(440, 'Chittagong', 'Chittagong', 'Boalkhali', 'Boalkhali', '4366', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(441, 'Chittagong', 'Chittagong', 'Boalkhali', 'Charandwip', '4369', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(442, 'Chittagong', 'Chittagong', 'Boalkhali', 'Iqbal Park', '4365', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(443, 'Chittagong', 'Chittagong', 'Boalkhali', 'Kadurkhal', '4368', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(444, 'Chittagong', 'Chittagong', 'Boalkhali', 'Kanungopara', '4363', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(445, 'Chittagong', 'Chittagong', 'Boalkhali', 'Sakpura', '4367', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(446, 'Chittagong', 'Chittagong', 'Boalkhali', 'Saroatoli', '4364', '2015-06-25 11:41:23', '2015-06-25 11:41:23'),
(447, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Al- Amin Baria Madra', '4221', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(448, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Amin Jute Mills', '4211', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(449, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Anandabazar', '4215', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(450, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Bayezid Bostami', '4210', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(451, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chandgaon', '4212', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(452, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chawkbazar', '4203', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(453, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chitt. Cantonment', '4220', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(454, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chitt. Customs Acca', '4219', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(455, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chitt. Politechnic In', '4209', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(456, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chitt. Sailers Colon', '4218', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(457, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chittagong Airport', '4205', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(458, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chittagong Bandar', '4100', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(459, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chittagong GPO', '4000', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(460, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Export Processing', '4223', '2015-06-25 11:41:24', '2015-06-25 11:41:24');
INSERT INTO `districts_000` (`id`, `division`, `district`, `upazila`, `post_office`, `post_code`, `created_at`, `updated_at`) VALUES
(461, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Firozshah', '4207', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(462, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Halishahar', '4216', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(463, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Halishshar', '4225', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(464, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Jalalabad', '4214', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(465, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Jaldia Merine Accade', '4206', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(466, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Middle Patenga', '4222', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(467, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Mohard', '4208', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(468, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'North Halishahar', '4226', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(469, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'North Katuli', '4217', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(470, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Pahartoli', '4202', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(471, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Patenga', '4204', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(472, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Rampura TSO', '4224', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(473, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Wazedia', '4213', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(474, 'Chittagong', 'Chittagong', 'East Joara', 'Barma', '4383', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(475, 'Chittagong', 'Chittagong', 'East Joara', 'Dohazari', '4382', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(476, 'Chittagong', 'Chittagong', 'East Joara', 'East Joara', '4380', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(477, 'Chittagong', 'Chittagong', 'East Joara', 'Gachbaria', '4381', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(478, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Bhandar Sharif', '4352', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(479, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Fatikchhari', '4350', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(480, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Harualchhari', '4354', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(481, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Najirhat', '4353', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(482, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Nanupur', '4351', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(483, 'Chittagong', 'Chittagong', 'Fatikchhari', 'Narayanhat', '4355', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(484, 'Chittagong', 'Chittagong', 'Hathazari', 'Chitt.University', '4331', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(485, 'Chittagong', 'Chittagong', 'Hathazari', 'Fatahabad', '4335', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(486, 'Chittagong', 'Chittagong', 'Hathazari', 'Gorduara', '4332', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(487, 'Chittagong', 'Chittagong', 'Hathazari', 'Hathazari', '4330', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(488, 'Chittagong', 'Chittagong', 'Hathazari', 'Katirhat', '4333', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(489, 'Chittagong', 'Chittagong', 'Hathazari', 'Madrasa', '4339', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(490, 'Chittagong', 'Chittagong', 'Hathazari', 'Mirzapur', '4334', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(491, 'Chittagong', 'Chittagong', 'Hathazari', 'Nuralibari', '4337', '2015-06-25 11:41:24', '2015-06-25 11:41:24'),
(492, 'Chittagong', 'Chittagong', 'Hathazari', 'Yunus Nagar', '4338', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(493, 'Chittagong', 'Chittagong', 'Jaldi', 'Banigram', '4393', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(494, 'Chittagong', 'Chittagong', 'Jaldi', 'Gunagari', '4392', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(495, 'Chittagong', 'Chittagong', 'Jaldi', 'Jaldi', '4390', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(496, 'Chittagong', 'Chittagong', 'Jaldi', 'Khan Bahadur', '4391', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(497, 'Chittagong', 'Chittagong', 'Lohagara', 'Chunti', '4398', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(498, 'Chittagong', 'Chittagong', 'Lohagara', 'Lohagara', '4396', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(499, 'Chittagong', 'Chittagong', 'Lohagara', 'Padua', '4397', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(500, 'Chittagong', 'Chittagong', 'Mirsharai', 'Abutorab', '4321', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(501, 'Chittagong', 'Chittagong', 'Mirsharai', 'Azampur', '4325', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(502, 'Chittagong', 'Chittagong', 'Mirsharai', 'Bharawazhat', '4323', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(503, 'Chittagong', 'Chittagong', 'Mirsharai', 'Darrogahat', '4322', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(504, 'Chittagong', 'Chittagong', 'Mirsharai', 'Joarganj', '4324', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(505, 'Chittagong', 'Chittagong', 'Mirsharai', 'Korerhat', '4327', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(506, 'Chittagong', 'Chittagong', 'Mirsharai', 'Mirsharai', '4320', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(507, 'Chittagong', 'Chittagong', 'Mirsharai', 'Mohazanhat', '4328', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(508, 'Chittagong', 'Chittagong', 'Patia Head Office', 'Budhpara', '4371', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(509, 'Chittagong', 'Chittagong', 'Patia Head Office', 'Patia Head Office', '4370', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(510, 'Chittagong', 'Chittagong', 'Rangunia', 'Dhamair', '4361', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(511, 'Chittagong', 'Chittagong', 'Rangunia', 'Rangunia', '4360', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(512, 'Chittagong', 'Chittagong', 'Rouzan', 'B.I.T Post Office', '4349', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(513, 'Chittagong', 'Chittagong', 'Rouzan', 'Beenajuri', '4341', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(514, 'Chittagong', 'Chittagong', 'Rouzan', 'Dewanpur', '4347', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(515, 'Chittagong', 'Chittagong', 'Rouzan', 'Fatepur', '4345', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(516, 'Chittagong', 'Chittagong', 'Rouzan', 'Gahira', '4343', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(517, 'Chittagong', 'Chittagong', 'Rouzan', 'Guzra Noapara', '4346', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(518, 'Chittagong', 'Chittagong', 'Rouzan', 'jagannath Hat', '4344', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(519, 'Chittagong', 'Chittagong', 'Rouzan', 'Kundeshwari', '4342', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(520, 'Chittagong', 'Chittagong', 'Rouzan', 'Mohamuni', '4348', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(521, 'Chittagong', 'Chittagong', 'Rouzan', 'Rouzan', '4340', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(522, 'Chittagong', 'Chittagong', 'Sandwip', 'Sandwip', '4300', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(523, 'Chittagong', 'Chittagong', 'Sandwip', 'Shiberhat', '4301', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(524, 'Chittagong', 'Chittagong', 'Sandwip', 'Urirchar', '4302', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(525, 'Chittagong', 'Chittagong', 'Satkania', 'Baitul Ijjat', '4387', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(526, 'Chittagong', 'Chittagong', 'Satkania', 'Bazalia', '4388', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(527, 'Chittagong', 'Chittagong', 'Satkania', 'Satkania', '4386', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(528, 'Chittagong', 'Chittagong', 'Sitakunda', 'Barabkunda', '4312', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(529, 'Chittagong', 'Chittagong', 'Sitakunda', 'Baroidhala', '4311', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(530, 'Chittagong', 'Chittagong', 'Sitakunda', 'Bawashbaria', '4313', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(531, 'Chittagong', 'Chittagong', 'Sitakunda', 'Bhatiari', '4315', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(532, 'Chittagong', 'Chittagong', 'Sitakunda', 'Fouzdarhat', '4316', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(533, 'Chittagong', 'Chittagong', 'Sitakunda', 'Jafrabad', '4317', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(534, 'Chittagong', 'Chittagong', 'Sitakunda', 'Kumira', '4314', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(535, 'Chittagong', 'Chittagong', 'Sitakunda', 'Sitakunda', '4310', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(536, 'Chittagong', 'Comilla', 'Barura', 'Barura', '3560', '2015-06-25 11:41:25', '2015-06-25 11:41:25'),
(537, 'Chittagong', 'Comilla', 'Barura', 'Murdafarganj', '3562', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(538, 'Chittagong', 'Comilla', 'Barura', 'Poyalgachha', '3561', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(539, 'Chittagong', 'Comilla', 'Brahmanpara', 'Brahmanpara', '3526', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(540, 'Chittagong', 'Comilla', 'Burichang', 'Burichang', '3520', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(541, 'Chittagong', 'Comilla', 'Burichang', 'Maynamoti bazar', '3521', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(542, 'Chittagong', 'Comilla', 'Chandina', 'Chandia', '3510', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(543, 'Chittagong', 'Comilla', 'Chandina', 'Madhaiabazar', '3511', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(544, 'Chittagong', 'Comilla', 'Chouddagram', 'Batisa', '3551', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(545, 'Chittagong', 'Comilla', 'Chouddagram', 'Chiora', '3552', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(546, 'Chittagong', 'Comilla', 'Chouddagram', 'Chouddagram', '3550', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(547, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Comilla Contoment', '3501', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(548, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Comilla Sadar', '3500', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(549, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Courtbari', '3503', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(550, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Halimanagar', '3502', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(551, 'Chittagong', 'Comilla', 'Comilla Sadar', 'Suaganj', '3504', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(552, 'Chittagong', 'Comilla', 'Daudkandi', 'Dashpara', '3518', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(553, 'Chittagong', 'Comilla', 'Daudkandi', 'Daudkandi', '3516', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(554, 'Chittagong', 'Comilla', 'Daudkandi', 'Eliotganj', '3519', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(555, 'Chittagong', 'Comilla', 'Daudkandi', 'Gouripur', '3517', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(556, 'Chittagong', 'Comilla', 'Davidhar', 'Barashalghar', '3532', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(557, 'Chittagong', 'Comilla', 'Davidhar', 'Davidhar', '3530', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(558, 'Chittagong', 'Comilla', 'Davidhar', 'Dhamtee', '3533', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(559, 'Chittagong', 'Comilla', 'Davidhar', 'Gangamandal', '3531', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(560, 'Chittagong', 'Comilla', 'Homna', 'Homna', '3546', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(561, 'Chittagong', 'Comilla', 'Laksam', 'Bipulasar', '3572', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(562, 'Chittagong', 'Comilla', 'Laksam', 'Laksam', '3570', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(563, 'Chittagong', 'Comilla', 'Laksam', 'Lakshamanpur', '3571', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(564, 'Chittagong', 'Comilla', 'Langalkot', 'Chhariabazar', '3582', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(565, 'Chittagong', 'Comilla', 'Langalkot', 'Dhalua', '3581', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(566, 'Chittagong', 'Comilla', 'Langalkot', 'Gunabati', '3583', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(567, 'Chittagong', 'Comilla', 'Langalkot', 'Langalkot', '3580', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(568, 'Chittagong', 'Comilla', 'Muradnagar', 'Bangra', '3543', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(569, 'Chittagong', 'Comilla', 'Muradnagar', 'Companyganj', '3542', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(570, 'Chittagong', 'Comilla', 'Muradnagar', 'Muradnagar', '3540', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(571, 'Chittagong', 'Comilla', 'Muradnagar', 'Pantibazar', '3545', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(572, 'Chittagong', 'Comilla', 'Muradnagar', 'Ramchandarpur', '3541', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(573, 'Chittagong', 'Comilla', 'Muradnagar', 'Sonakanda', '3544', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(574, 'Chittagong', 'Cox’s Bazar', 'Chiringga', 'Badarkali', '4742', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(575, 'Chittagong', 'Cox’s Bazar', 'Chiringga', 'Chiringga', '4740', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(576, 'Chittagong', 'Cox’s Bazar', 'Chiringga', 'Chiringga S.O', '4741', '2015-06-25 11:41:26', '2015-06-25 11:41:26'),
(577, 'Chittagong', 'Cox’s Bazar', 'Chiringga', 'Malumghat', '4743', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(578, 'Chittagong', 'Cox’s Bazar', 'Coxs Bazar Sadar', 'Coxs Bazar Sadar', '4700', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(579, 'Chittagong', 'Cox’s Bazar', 'Coxs Bazar Sadar', 'Eidga', '4702', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(580, 'Chittagong', 'Cox’s Bazar', 'Coxs Bazar Sadar', 'Zhilanja', '4701', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(581, 'Chittagong', 'Cox’s Bazar', 'Gorakghat', 'Gorakghat', '4710', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(582, 'Chittagong', 'Cox’s Bazar', 'Kutubdia', 'Kutubdia', '4720', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(583, 'Chittagong', 'Cox’s Bazar', 'Ramu', 'Ramu', '4730', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(584, 'Chittagong', 'Cox’s Bazar', 'Teknaf', 'Hnila', '4761', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(585, 'Chittagong', 'Cox’s Bazar', 'Teknaf', 'St.Martin', '4762', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(586, 'Chittagong', 'Cox’s Bazar', 'Teknaf', 'Teknaf', '4760', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(587, 'Chittagong', 'Cox’s Bazar', 'Ukhia', 'Ukhia', '4750', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(588, 'Chittagong', 'Feni', 'Chhagalnaia', 'Chhagalnaia', '3910', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(589, 'Chittagong', 'Feni', 'Chhagalnaia', 'Daraga Hat', '3912', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(590, 'Chittagong', 'Feni', 'Chhagalnaia', 'Maharajganj', '3911', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(591, 'Chittagong', 'Feni', 'Chhagalnaia', 'Puabashimulia', '3913', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(592, 'Chittagong', 'Feni', 'Dagonbhuia', 'Chhilonia', '3922', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(593, 'Chittagong', 'Feni', 'Dagonbhuia', 'Dagondhuia', '3920', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(594, 'Chittagong', 'Feni', 'Dagonbhuia', 'Dudmukha', '3921', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(595, 'Chittagong', 'Feni', 'Dagonbhuia', 'Rajapur', '3923', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(596, 'Chittagong', 'Feni', 'Feni Sadar', 'Fazilpur', '3901', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(597, 'Chittagong', 'Feni', 'Feni Sadar', 'Feni Sadar', '3900', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(598, 'Chittagong', 'Feni', 'Feni Sadar', 'Laskarhat', '3903', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(599, 'Chittagong', 'Feni', 'Feni Sadar', 'Sharshadie', '3902', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(600, 'Chittagong', 'Feni', 'Pashurampur', 'Fulgazi', '3942', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(601, 'Chittagong', 'Feni', 'Pashurampur', 'Munshirhat', '3943', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(602, 'Chittagong', 'Feni', 'Pashurampur', 'Pashurampur', '3940', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(603, 'Chittagong', 'Feni', 'Pashurampur', 'Shuarbazar', '3941', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(604, 'Chittagong', 'Feni', 'Sonagazi', 'Ahmadpur', '3932', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(605, 'Chittagong', 'Feni', 'Sonagazi', 'Kazirhat', '3933', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(606, 'Chittagong', 'Feni', 'Sonagazi', 'Motiganj', '3931', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(607, 'Chittagong', 'Feni', 'Sonagazi', 'Sonagazi', '3930', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(608, 'Chittagong', 'Khagrachari', 'Diginala', 'Diginala', '4420', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(609, 'Chittagong', 'Khagrachari', 'Khagrachari Sadar', 'Khagrachari Sadar', '4400', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(610, 'Chittagong', 'Khagrachari', 'Laxmichhari', 'Laxmichhari', '4470', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(611, 'Chittagong', 'Khagrachari', 'Mahalchhari', 'Mahalchhari', '4430', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(612, 'Chittagong', 'Khagrachari', 'Manikchhari', 'Manikchhari', '4460', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(613, 'Chittagong', 'Khagrachari', 'Matiranga', 'Matiranga', '4450', '2015-06-25 11:41:27', '2015-06-25 11:41:27'),
(614, 'Chittagong', 'Khagrachari', 'Panchhari', 'Panchhari', '4410', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(615, 'Chittagong', 'Khagrachari', 'Ramghar Head Office', 'Ramghar Head Office', '4440', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(616, 'Chittagong', 'Lakshmipur', 'Char Alexgander', 'Char Alexgander', '3730', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(617, 'Chittagong', 'Lakshmipur', 'Char Alexgander', 'Hajirghat', '3731', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(618, 'Chittagong', 'Lakshmipur', 'Char Alexgander', 'Ramgatirhat', '3732', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(619, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Amani Lakshimpur', '3709', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(620, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Bhabaniganj', '3702', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(621, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Chandraganj', '3708', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(622, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Choupalli', '3707', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(623, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Dalal Bazar', '3701', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(624, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Duttapara', '3706', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(625, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Keramatganj', '3704', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(626, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Lakshimpur Sadar', '3700', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(627, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Mandari', '3703', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(628, 'Chittagong', 'Lakshmipur', 'Lakshimpur Sadar', 'Rupchara', '3705', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(629, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Alipur', '3721', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(630, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Dolta', '3725', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(631, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Kanchanpur', '3723', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(632, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Naagmud', '3724', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(633, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Panpara', '3722', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(634, 'Chittagong', 'Lakshmipur', 'Ramganj', 'Ramganj', '3720', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(635, 'Chittagong', 'Lakshmipur', 'Raypur', 'Bhuabari', '3714', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(636, 'Chittagong', 'Lakshmipur', 'Raypur', 'Haydarganj', '3713', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(637, 'Chittagong', 'Lakshmipur', 'Raypur', 'Nagerdighirpar', '3712', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(638, 'Chittagong', 'Lakshmipur', 'Raypur', 'Rakhallia', '3711', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(639, 'Chittagong', 'Lakshmipur', 'Raypur', 'Raypur', '3710', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(640, 'Chittagong', 'Noakhali', 'Basurhat', 'Basur Hat', '3850', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(641, 'Chittagong', 'Noakhali', 'Basurhat', 'Charhajari', '3851', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(642, 'Chittagong', 'Noakhali', 'Begumganj', 'Alaiarpur', '3831', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(643, 'Chittagong', 'Noakhali', 'Begumganj', 'Amisha Para', '3847', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(644, 'Chittagong', 'Noakhali', 'Begumganj', 'Banglabazar', '3822', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(645, 'Chittagong', 'Noakhali', 'Begumganj', 'Bazra', '3824', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(646, 'Chittagong', 'Noakhali', 'Begumganj', 'Begumganj', '3820', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(647, 'Chittagong', 'Noakhali', 'Begumganj', 'Bhabani Jibanpur', '3837', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(648, 'Chittagong', 'Noakhali', 'Begumganj', 'Choumohani', '3821', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(649, 'Chittagong', 'Noakhali', 'Begumganj', 'Dauti', '3843', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(650, 'Chittagong', 'Noakhali', 'Begumganj', 'Durgapur', '3848', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(651, 'Chittagong', 'Noakhali', 'Begumganj', 'Gopalpur', '3828', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(652, 'Chittagong', 'Noakhali', 'Begumganj', 'Jamidar Hat', '3825', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(653, 'Chittagong', 'Noakhali', 'Begumganj', 'Joyag', '3844', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(654, 'Chittagong', 'Noakhali', 'Begumganj', 'Joynarayanpur', '3829', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(655, 'Chittagong', 'Noakhali', 'Begumganj', 'Khalafat Bazar', '3833', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(656, 'Chittagong', 'Noakhali', 'Begumganj', 'Khalishpur', '3842', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(657, 'Chittagong', 'Noakhali', 'Begumganj', 'Maheshganj', '3838', '2015-06-25 11:41:28', '2015-06-25 11:41:28'),
(658, 'Chittagong', 'Noakhali', 'Begumganj', 'Mir Owarishpur', '3823', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(659, 'Chittagong', 'Noakhali', 'Begumganj', 'Nadona', '3839', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(660, 'Chittagong', 'Noakhali', 'Begumganj', 'Nandiapara', '3841', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(661, 'Chittagong', 'Noakhali', 'Begumganj', 'Oachhekpur', '3835', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(662, 'Chittagong', 'Noakhali', 'Begumganj', 'Rajganj', '3834', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(663, 'Chittagong', 'Noakhali', 'Begumganj', 'Sonaimuri', '3827', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(664, 'Chittagong', 'Noakhali', 'Begumganj', 'Tangirpar', '3832', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(665, 'Chittagong', 'Noakhali', 'Begumganj', 'Thanar Hat', '3845', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(666, 'Chittagong', 'Noakhali', 'Chatkhil', 'Bansa Bazar', '3879', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(667, 'Chittagong', 'Noakhali', 'Chatkhil', 'Bodalcourt', '3873', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(668, 'Chittagong', 'Noakhali', 'Chatkhil', 'Chatkhil', '3870', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(669, 'Chittagong', 'Noakhali', 'Chatkhil', 'Dosh Gharia', '3878', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(670, 'Chittagong', 'Noakhali', 'Chatkhil', 'Karihati', '3877', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(671, 'Chittagong', 'Noakhali', 'Chatkhil', 'Khilpara', '3872', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(672, 'Chittagong', 'Noakhali', 'Chatkhil', 'Palla', '3871', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(673, 'Chittagong', 'Noakhali', 'Chatkhil', 'Rezzakpur', '3874', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(674, 'Chittagong', 'Noakhali', 'Chatkhil', 'Sahapur', '3881', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(675, 'Chittagong', 'Noakhali', 'Chatkhil', 'Sampara', '3882', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(676, 'Chittagong', 'Noakhali', 'Chatkhil', 'Shingbahura', '3883', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(677, 'Chittagong', 'Noakhali', 'Chatkhil', 'Solla', '3875', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(678, 'Chittagong', 'Noakhali', 'Hatiya', 'Afazia', '3891', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(679, 'Chittagong', 'Noakhali', 'Hatiya', 'Hatiya', '3890', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(680, 'Chittagong', 'Noakhali', 'Hatiya', 'Tamoraddi', '3892', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(681, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Chaprashir Hat', '3811', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(682, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Char Jabbar', '3812', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(683, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Charam Tua', '3809', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(684, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Din Monir Hat', '3803', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(685, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Kabirhat', '3807', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(686, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Khalifar Hat', '3808', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(687, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Mriddarhat', '3806', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(688, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Noakhali College', '3801', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(689, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Noakhali Sadar', '3800', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(690, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Pak Kishoreganj', '3804', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(691, 'Chittagong', 'Noakhali', 'Noakhali Sadar', 'Sonapur', '3802', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(692, 'Chittagong', 'Noakhali', 'Senbag', 'Beezbag', '3862', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(693, 'Chittagong', 'Noakhali', 'Senbag', 'Chatarpaia', '3864', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(694, 'Chittagong', 'Noakhali', 'Senbag', 'Kallyandi', '3861', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(695, 'Chittagong', 'Noakhali', 'Senbag', 'Kankirhat', '3863', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(696, 'Chittagong', 'Noakhali', 'Senbag', 'Senbag', '3860', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(697, 'Chittagong', 'Noakhali', 'Senbag', 'T.P. Lamua', '3865', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(698, 'Chittagong', 'Rangamati', 'Barakal', 'Barakal', '4570', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(699, 'Chittagong', 'Rangamati', 'Bilaichhari', 'Bilaichhari', '4550', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(700, 'Chittagong', 'Rangamati', 'Jarachhari', 'Jarachhari', '4560', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(701, 'Chittagong', 'Rangamati', 'Kalampati', 'Betbunia', '4511', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(702, 'Chittagong', 'Rangamati', 'Kalampati', 'Kalampati', '4510', '2015-06-25 11:41:29', '2015-06-25 11:41:29'),
(703, 'Chittagong', 'Rangamati', 'kaptai', 'Chandraghona', '4531', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(704, 'Chittagong', 'Rangamati', 'kaptai', 'Kaptai', '4530', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(705, 'Chittagong', 'Rangamati', 'kaptai', 'Kaptai Nuton Bazar', '4533', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(706, 'Chittagong', 'Rangamati', 'kaptai', 'Kaptai Project', '4532', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(707, 'Chittagong', 'Rangamati', 'Longachh', 'Longachh', '4580', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(708, 'Chittagong', 'Rangamati', 'Marishya', 'Marishya', '4590', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(709, 'Chittagong', 'Rangamati', 'Naniachhar', 'Nanichhar', '4520', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(710, 'Chittagong', 'Rangamati', 'Rajsthali', 'Rajsthali', '4540', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(711, 'Chittagong', 'Rangamati', 'Rangamati Sadar', 'Rangamati Sadar', '4500', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(712, 'Khulna', 'Bagherhat', 'Bagerhat Sadar', 'Bagerhat Sadar', '9300', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(713, 'Khulna', 'Bagherhat', 'Bagerhat Sadar', 'P.C College', '9301', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(714, 'Khulna', 'Bagherhat', 'Bagerhat Sadar', 'Rangdia', '9302', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(715, 'Khulna', 'Bagherhat', 'Chalna Ankorage', 'Chalna Ankorage', '9350', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(716, 'Khulna', 'Bagherhat', 'Chalna Ankorage', 'Mongla Port', '9351', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(717, 'Khulna', 'Bagherhat', 'Chitalmari', 'Barabaria', '9361', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(718, 'Khulna', 'Bagherhat', 'Chitalmari', 'Chitalmari', '9360', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(719, 'Khulna', 'Bagherhat', 'Fakirhat', 'Bhanganpar Bazar', '9372', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(720, 'Khulna', 'Bagherhat', 'Fakirhat', 'Fakirhat', '9370', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(721, 'Khulna', 'Bagherhat', 'Fakirhat', 'Mansa', '9371', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(722, 'Khulna', 'Bagherhat', 'Kachua UPO', 'Kachua', '9310', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(723, 'Khulna', 'Bagherhat', 'Kachua UPO', 'Sonarkola', '9311', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(724, 'Khulna', 'Bagherhat', 'Mollahat', 'Charkulia', '9383', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(725, 'Khulna', 'Bagherhat', 'Mollahat', 'Dariala', '9382', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(726, 'Khulna', 'Bagherhat', 'Mollahat', 'Kahalpur', '9381', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(727, 'Khulna', 'Bagherhat', 'Mollahat', 'Mollahat', '9380', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(728, 'Khulna', 'Bagherhat', 'Mollahat', 'Nagarkandi', '9384', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(729, 'Khulna', 'Bagherhat', 'Mollahat', 'Pak Gangni', '9385', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(730, 'Khulna', 'Bagherhat', 'Morelganj', 'Morelganj', '9320', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(731, 'Khulna', 'Bagherhat', 'Morelganj', 'Sannasi Bazar', '9321', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(732, 'Khulna', 'Bagherhat', 'Morelganj', 'Telisatee', '9322', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(733, 'Khulna', 'Bagherhat', 'Rampal', 'Foylahat', '9341', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(734, 'Khulna', 'Bagherhat', 'Rampal', 'Gourambha', '9343', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(735, 'Khulna', 'Bagherhat', 'Rampal', 'Rampal', '9340', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(736, 'Khulna', 'Bagherhat', 'Rampal', 'Sonatunia', '9342', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(737, 'Khulna', 'Bagherhat', 'Rayenda', 'Rayenda', '9330', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(738, 'Khulna', 'Chuadanga', 'Alamdanga', 'Alamdanga', '7210', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(739, 'Khulna', 'Chuadanga', 'Alamdanga', 'Hardi', '7211', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(740, 'Khulna', 'Chuadanga', 'Chuadanga Sadar', 'Chuadanga Sadar', '7200', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(741, 'Khulna', 'Chuadanga', 'Chuadanga Sadar', 'Munshiganj', '7201', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(742, 'Khulna', 'Chuadanga', 'Damurhuda', 'Andulbaria', '7222', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(743, 'Khulna', 'Chuadanga', 'Damurhuda', 'Damurhuda', '7220', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(744, 'Khulna', 'Chuadanga', 'Damurhuda', 'Darshana', '7221', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(745, 'Khulna', 'Chuadanga', 'Doulatganj', 'Doulatganj', '7230', '2015-06-25 11:41:30', '2015-06-25 11:41:30'),
(746, 'Khulna', 'Jessore', 'Bagharpara', 'Bagharpara', '7470', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(747, 'Khulna', 'Jessore', 'Bagharpara', 'Gouranagar', '7471', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(748, 'Khulna', 'Jessore', 'Chaugachha', 'Chougachha', '7410', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(749, 'Khulna', 'Jessore', 'Jessore Sadar', 'Basundia', '7406', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(750, 'Khulna', 'Jessore', 'Jessore Sadar', 'Chanchra', '7402', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(751, 'Khulna', 'Jessore', 'Jessore Sadar', 'Churamankathi', '7407', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(752, 'Khulna', 'Jessore', 'Jessore Sadar', 'Jessore Airbach', '7404', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(753, 'Khulna', 'Jessore', 'Jessore Sadar', 'Jessore canttonment', '7403', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(754, 'Khulna', 'Jessore', 'Jessore Sadar', 'Jessore Sadar', '7400', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(755, 'Khulna', 'Jessore', 'Jessore Sadar', 'Jessore Upa-Shahar', '7401', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(756, 'Khulna', 'Jessore', 'Jessore Sadar', 'Rupdia', '7405', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(757, 'Khulna', 'Jessore', 'Jhikargachha', 'Jhikargachha', '7420', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(758, 'Khulna', 'Jessore', 'Keshabpur', 'Keshobpur', '7450', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(759, 'Khulna', 'Jessore', 'Monirampur', 'Monirampur', '7440', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(760, 'Khulna', 'Jessore', 'Noapara', 'Bhugilhat', '7462', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(761, 'Khulna', 'Jessore', 'Noapara', 'Noapara', '7460', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(762, 'Khulna', 'Jessore', 'Noapara', 'Rajghat', '7461', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(763, 'Khulna', 'Jessore', 'Sarsa', 'Bag Achra', '7433', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(764, 'Khulna', 'Jessore', 'Sarsa', 'Benapole', '7431', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(765, 'Khulna', 'Jessore', 'Sarsa', 'Jadabpur', '7432', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(766, 'Khulna', 'Jessore', 'Sarsa', 'Sarsa', '7430', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(767, 'Khulna', 'Jinaidaha', 'Harinakundu', 'Harinakundu', '7310', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(768, 'Khulna', 'Jinaidaha', 'Jinaidaha Sadar', 'Jinaidaha Cadet College', '7301', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(769, 'Khulna', 'Jinaidaha', 'Jinaidaha Sadar', 'Jinaidaha Sadar', '7300', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(770, 'Khulna', 'Jinaidaha', 'Kotchandpur', 'Kotchandpur', '7330', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(771, 'Khulna', 'Jinaidaha', 'Maheshpur', 'Maheshpur', '7340', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(772, 'Khulna', 'Jinaidaha', 'Naldanga', 'Hatbar Bazar', '7351', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(773, 'Khulna', 'Jinaidaha', 'Naldanga', 'Naldanga', '7350', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(774, 'Khulna', 'Jinaidaha', 'Shailakupa', 'Kumiradaha', '7321', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(775, 'Khulna', 'Jinaidaha', 'Shailakupa', 'Shailakupa', '7320', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(776, 'Khulna', 'Khulna', 'Alaipur', 'Alaipur', '9240', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(777, 'Khulna', 'Khulna', 'Alaipur', 'Belphulia', '9242', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(778, 'Khulna', 'Khulna', 'Alaipur', 'Rupsha', '9241', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(779, 'Khulna', 'Khulna', 'Batiaghat', 'Batiaghat', '9260', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(780, 'Khulna', 'Khulna', 'Batiaghat', 'Surkalee', '9261', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(781, 'Khulna', 'Khulna', 'Chalna Bazar', 'Bajua', '9272', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(782, 'Khulna', 'Khulna', 'Chalna Bazar', 'Chalna Bazar', '9270', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(783, 'Khulna', 'Khulna', 'Chalna Bazar', 'Dakup', '9271', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(784, 'Khulna', 'Khulna', 'Chalna Bazar', 'Nalian', '9273', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(785, 'Khulna', 'Khulna', 'Digalia', 'Chandni Mahal', '9221', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(786, 'Khulna', 'Khulna', 'Digalia', 'Digalia', '9220', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(787, 'Khulna', 'Khulna', 'Digalia', 'Gazirhat', '9224', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(788, 'Khulna', 'Khulna', 'Digalia', 'Ghoshghati', '9223', '2015-06-25 11:41:31', '2015-06-25 11:41:31'),
(789, 'Khulna', 'Khulna', 'Digalia', 'Senhati', '9222', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(790, 'Khulna', 'Khulna', 'Khulna Sadar', 'Atra Shilpa Area', '9207', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(791, 'Khulna', 'Khulna', 'Khulna Sadar', 'BIT Khulna', '9203', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(792, 'Khulna', 'Khulna', 'Khulna Sadar', 'Doulatpur', '9202', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(793, 'Khulna', 'Khulna', 'Khulna Sadar', 'Jahanabad Canttonmen', '9205', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(794, 'Khulna', 'Khulna', 'Khulna Sadar', 'Khula Sadar', '9100', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(795, 'Khulna', 'Khulna', 'Khulna Sadar', 'Khulna G.P.O', '9000', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(796, 'Khulna', 'Khulna', 'Khulna Sadar', 'Khulna Shipyard', '9201', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(797, 'Khulna', 'Khulna', 'Khulna Sadar', 'Khulna University', '9208', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(798, 'Khulna', 'Khulna', 'Khulna Sadar', 'Siramani', '9204', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(799, 'Khulna', 'Khulna', 'Khulna Sadar', 'Sonali Jute Mills', '9206', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(800, 'Khulna', 'Khulna', 'Madinabad', 'Amadee', '9291', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(801, 'Khulna', 'Khulna', 'Madinabad', 'Madinabad', '9290', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(802, 'Khulna', 'Khulna', 'Paikgachha', 'Chandkhali', '9284', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(803, 'Khulna', 'Khulna', 'Paikgachha', 'Garaikhali', '9285', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(804, 'Khulna', 'Khulna', 'Paikgachha', 'Godaipur', '9281', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(805, 'Khulna', 'Khulna', 'Paikgachha', 'Kapilmoni', '9282', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(806, 'Khulna', 'Khulna', 'Paikgachha', 'Katipara', '9283', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(807, 'Khulna', 'Khulna', 'Paikgachha', 'Paikgachha', '9280', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(808, 'Khulna', 'Khulna', 'Phultala', 'Phultala', '9210', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(809, 'Khulna', 'Khulna', 'Sajiara', 'Chuknagar', '9252', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(810, 'Khulna', 'Khulna', 'Sajiara', 'Ghonabanda', '9251', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(811, 'Khulna', 'Khulna', 'Sajiara', 'Sajiara', '9250', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(812, 'Khulna', 'Khulna', 'Sajiara', 'Shahapur', '9253', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(813, 'Khulna', 'Khulna', 'Terakhada', 'Pak Barasat', '9231', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(814, 'Khulna', 'Khulna', 'Terakhada', 'Terakhada', '9230', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(815, 'Khulna', 'Kustia', 'Bheramara', 'Allardarga', '7042', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(816, 'Khulna', 'Kustia', 'Bheramara', 'Bheramara', '7040', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(817, 'Khulna', 'Kustia', 'Bheramara', 'Ganges Bheramara', '7041', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(818, 'Khulna', 'Kustia', 'Janipur', 'Janipur', '7020', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(819, 'Khulna', 'Kustia', 'Janipur', 'Khoksa', '7021', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(820, 'Khulna', 'Kustia', 'Kumarkhali', 'Kumarkhali', '7010', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(821, 'Khulna', 'Kustia', 'Kumarkhali', 'Panti', '7011', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(822, 'Khulna', 'Kustia', 'Kustia Sadar', 'Islami University', '7003', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(823, 'Khulna', 'Kustia', 'Kustia Sadar', 'Jagati', '7002', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(824, 'Khulna', 'Kustia', 'Kustia Sadar', 'Kushtia Mohini', '7001', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(825, 'Khulna', 'Kustia', 'Kustia Sadar', 'Kustia Sadar', '7000', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(826, 'Khulna', 'Kustia', 'Mirpur', 'Amla Sadarpur', '7032', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(827, 'Khulna', 'Kustia', 'Mirpur', 'Mirpur', '7030', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(828, 'Khulna', 'Kustia', 'Mirpur', 'Poradaha', '7031', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(829, 'Khulna', 'Kustia', 'Rafayetpur', 'Khasmathurapur', '7052', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(830, 'Khulna', 'Kustia', 'Rafayetpur', 'Rafayetpur', '7050', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(831, 'Khulna', 'Kustia', 'Rafayetpur', 'Taragunia', '7051', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(832, 'Khulna', 'Magura', 'Arpara', 'Arpara', '7620', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(833, 'Khulna', 'Magura', 'Magura Sadar', 'Magura Sadar', '7600', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(834, 'Khulna', 'Magura', 'Mohammadpur', 'Binodpur', '7631', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(835, 'Khulna', 'Magura', 'Mohammadpur', 'Mohammadpur', '7630', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(836, 'Khulna', 'Magura', 'Mohammadpur', 'Nahata', '7632', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(837, 'Khulna', 'Magura', 'Shripur', 'Langalbadh', '7611', '2015-06-25 11:41:32', '2015-06-25 11:41:32'),
(838, 'Khulna', 'Magura', 'Shripur', 'Nachol', '7612', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(839, 'Khulna', 'Magura', 'Shripur', 'Shripur', '7610', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(840, 'Khulna', 'Meherpur', 'Gangni', 'Gangni', '7110', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(841, 'Khulna', 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7101', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(842, 'Khulna', 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7152', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(843, 'Khulna', 'Meherpur', 'Meherpur Sadar', 'Meherpur Sadar', '7100', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(844, 'Khulna', 'Meherpur', 'Meherpur Sadar', 'Mujib Nagar Complex', '7102', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(845, 'Khulna', 'Narail', 'Kalia', 'Kalia', '7520', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(846, 'Khulna', 'Narail', 'Laxmipasha', 'Baradia', '7514', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(847, 'Khulna', 'Narail', 'Laxmipasha', 'Itna', '7512', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(848, 'Khulna', 'Narail', 'Laxmipasha', 'Laxmipasha', '7510', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(849, 'Khulna', 'Narail', 'Laxmipasha', 'Lohagora', '7511', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(850, 'Khulna', 'Narail', 'Laxmipasha', 'Naldi', '7513', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(851, 'Khulna', 'Narail', 'Mohajan', 'Mohajan', '7521', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(852, 'Khulna', 'Narail', 'Narail Sadar', 'Narail Sadar', '7500', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(853, 'Khulna', 'Narail', 'Narail Sadar', 'Ratanganj', '7501', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(854, 'Khulna', 'Satkhira', 'Ashashuni', 'Ashashuni', '9460', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(855, 'Khulna', 'Satkhira', 'Ashashuni', 'Baradal', '9461', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(856, 'Khulna', 'Satkhira', 'Debbhata', 'Debbhata', '9430', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(857, 'Khulna', 'Satkhira', 'Debbhata', 'Gurugram', '9431', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(858, 'Khulna', 'Satkhira', 'kalaroa', 'Chandanpur', '9415', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(859, 'Khulna', 'Satkhira', 'kalaroa', 'Hamidpur', '9413', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(860, 'Khulna', 'Satkhira', 'kalaroa', 'Jhaudanga', '9412', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(861, 'Khulna', 'Satkhira', 'kalaroa', 'kalaroa', '9410', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(862, 'Khulna', 'Satkhira', 'kalaroa', 'Khordo', '9414', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(863, 'Khulna', 'Satkhira', 'kalaroa', 'Murarikati', '9411', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(864, 'Khulna', 'Satkhira', 'Kaliganj UPO', 'Kaliganj UPO', '9440', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(865, 'Khulna', 'Satkhira', 'Kaliganj UPO', 'Nalta Mubaroknagar', '9441', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(866, 'Khulna', 'Satkhira', 'Kaliganj UPO', 'Ratanpur', '9442', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(867, 'Khulna', 'Satkhira', 'Nakipur', 'Buri Goalini', '9453', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(868, 'Khulna', 'Satkhira', 'Nakipur', 'Gabura', '9454', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(869, 'Khulna', 'Satkhira', 'Nakipur', 'Habinagar', '9455', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(870, 'Khulna', 'Satkhira', 'Nakipur', 'Nakipur', '9450', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(871, 'Khulna', 'Satkhira', 'Nakipur', 'Naobeki', '9452', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(872, 'Khulna', 'Satkhira', 'Nakipur', 'Noornagar', '9451', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(873, 'Khulna', 'Satkhira', 'Satkhira Sadar', 'Budhhat', '9403', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(874, 'Khulna', 'Satkhira', 'Satkhira Sadar', 'Gunakar kati', '9402', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(875, 'Khulna', 'Satkhira', 'Satkhira Sadar', 'Satkhira Islamia Acc', '9401', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(876, 'Khulna', 'Satkhira', 'Satkhira Sadar', 'Satkhira Sadar', '9400', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(877, 'Khulna', 'Satkhira', 'Taala', 'Patkelghata', '9421', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(878, 'Khulna', 'Satkhira', 'Taala', 'Taala', '9420', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(879, 'Sylhet', 'Hobiganj', 'Azmireeganj', 'Azmireeganj', '3360', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(880, 'Sylhet', 'Hobiganj', 'Bahubal', 'Bahubal', '3310', '2015-06-25 11:41:33', '2015-06-25 11:41:33'),
(881, 'Sylhet', 'Hobiganj', 'Baniachang', 'Baniachang', '3350', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(882, 'Sylhet', 'Hobiganj', 'Baniachang', 'Jatrapasha', '3351', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(883, 'Sylhet', 'Hobiganj', 'Baniachang', 'Kadirganj', '3352', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(884, 'Sylhet', 'Hobiganj', 'Chunarughat', 'Chandpurbagan', '3321', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(885, 'Sylhet', 'Hobiganj', 'Chunarughat', 'Chunarughat', '3320', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(886, 'Sylhet', 'Hobiganj', 'Chunarughat', 'Narapati', '3322', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(887, 'Sylhet', 'Hobiganj', 'Hobiganj Sadar', 'Gopaya', '3302', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(888, 'Sylhet', 'Hobiganj', 'Hobiganj Sadar', 'Hobiganj Sadar', '3300', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(889, 'Sylhet', 'Hobiganj', 'Hobiganj Sadar', 'Shaestaganj', '3301', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(890, 'Sylhet', 'Hobiganj', 'Kalauk', 'Kalauk', '3340', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(891, 'Sylhet', 'Hobiganj', 'Kalauk', 'Lakhai', '3341', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(892, 'Sylhet', 'Hobiganj', 'Madhabpur', 'Itakhola', '3331', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(893, 'Sylhet', 'Hobiganj', 'Madhabpur', 'Madhabpur', '3330', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(894, 'Sylhet', 'Hobiganj', 'Madhabpur', 'Saihamnagar', '3333', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(895, 'Sylhet', 'Hobiganj', 'Madhabpur', 'Shahajibazar', '3332', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(896, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Digalbak', '3373', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(897, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Golduba', '3372', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(898, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Goplarbazar', '3371', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(899, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Inathganj', '3374', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(900, 'Sylhet', 'Hobiganj', 'Nabiganj', 'Nabiganj', '3370', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(901, 'Sylhet', 'Moulvibazar', 'Baralekha', 'Baralekha', '3250', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(902, 'Sylhet', 'Moulvibazar', 'Baralekha', 'Dhakkhinbag', '3252', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(903, 'Sylhet', 'Moulvibazar', 'Baralekha', 'Juri', '3251', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(904, 'Sylhet', 'Moulvibazar', 'Baralekha', 'Purbashahabajpur', '3253', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(905, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Kamalganj', '3220', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(906, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Keramatnaga', '3221', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(907, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Munshibazar', '3224', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(908, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Patrakhola', '3222', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(909, 'Sylhet', 'Moulvibazar', 'Kamalganj', 'Shamsher Nagar', '3223', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(910, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Baramchal', '3237', '2015-06-25 11:41:34', '2015-06-25 11:41:34');
INSERT INTO `districts_000` (`id`, `division`, `district`, `upazila`, `post_office`, `post_code`, `created_at`, `updated_at`) VALUES
(911, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Kajaldhara', '3234', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(912, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Karimpur', '3235', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(913, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Kulaura', '3230', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(914, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Langla', '3232', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(915, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Prithimpasha', '3233', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(916, 'Sylhet', 'Moulvibazar', 'Kulaura', 'Tillagaon', '3231', '2015-06-25 11:41:34', '2015-06-25 11:41:34'),
(917, 'Sylhet', 'Moulvibazar', 'Moulvibazar Sadar', 'Afrozganj', '3203', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(918, 'Sylhet', 'Moulvibazar', 'Moulvibazar Sadar', 'Barakapan', '3201', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(919, 'Sylhet', 'Moulvibazar', 'Moulvibazar Sadar', 'Monumukh', '3202', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(920, 'Sylhet', 'Moulvibazar', 'Moulvibazar Sadar', 'Moulvibazar Sadar', '3200', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(921, 'Sylhet', 'Moulvibazar', 'Rajnagar', 'Rajnagar', '3240', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(922, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Kalighat', '3212', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(923, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Khejurichhara', '3213', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(924, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Narain Chora', '3211', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(925, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Satgaon', '3214', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(926, 'Sylhet', 'Moulvibazar', 'Srimangal', 'Srimangal', '3210', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(927, 'Sylhet', 'Sunamganj', 'Bishamsarpur', 'Bishamsapur', '3010', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(928, 'Sylhet', 'Sunamganj', 'Chhatak', 'Chhatak', '3080', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(929, 'Sylhet', 'Sunamganj', 'Chhatak', 'Chhatak Cement Facto', '3081', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(930, 'Sylhet', 'Sunamganj', 'Chhatak', 'Chhatak Paper Mills', '3082', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(931, 'Sylhet', 'Sunamganj', 'Chhatak', 'Chourangi Bazar', '3893', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(932, 'Sylhet', 'Sunamganj', 'Chhatak', 'Gabindaganj', '3083', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(933, 'Sylhet', 'Sunamganj', 'Chhatak', 'Gabindaganj Natun Ba', '3084', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(934, 'Sylhet', 'Sunamganj', 'Chhatak', 'Islamabad', '3088', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(935, 'Sylhet', 'Sunamganj', 'Chhatak', 'jahidpur', '3087', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(936, 'Sylhet', 'Sunamganj', 'Chhatak', 'Khurma', '3085', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(937, 'Sylhet', 'Sunamganj', 'Chhatak', 'Moinpur', '3086', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(938, 'Sylhet', 'Sunamganj', 'Dhirai Chandpur', 'Dhirai Chandpur', '3040', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(939, 'Sylhet', 'Sunamganj', 'Dhirai Chandpur', 'Jagdal', '3041', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(940, 'Sylhet', 'Sunamganj', 'Duara bazar', 'Duara bazar', '3070', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(941, 'Sylhet', 'Sunamganj', 'Ghungiar', 'Ghungiar', '3050', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(942, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Atuajan', '3062', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(943, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Hasan Fatemapur', '3063', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(944, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Jagnnathpur', '3060', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(945, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Rasulganj', '3064', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(946, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Shiramsi', '3065', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(947, 'Sylhet', 'Sunamganj', 'Jagnnathpur', 'Syedpur', '3061', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(948, 'Sylhet', 'Sunamganj', 'Sachna', 'Sachna', '3020', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(949, 'Sylhet', 'Sunamganj', 'Sunamganj Sadar', 'Pagla', '3001', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(950, 'Sylhet', 'Sunamganj', 'Sunamganj Sadar', 'Patharia', '3002', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(951, 'Sylhet', 'Sunamganj', 'Sunamganj Sadar', 'Sunamganj Sadar', '3000', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(952, 'Sylhet', 'Sunamganj', 'Tahirpur', 'Tahirpur', '3030', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(953, 'Sylhet', 'Sylhet', 'Balaganj', 'Balaganj', '3120', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(954, 'Sylhet', 'Sylhet', 'Balaganj', 'Begumpur', '3125', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(955, 'Sylhet', 'Sylhet', 'Balaganj', 'Brahman Shashon', '3122', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(956, 'Sylhet', 'Sylhet', 'Balaganj', 'Gaharpur', '3128', '2015-06-25 11:41:35', '2015-06-25 11:41:35'),
(957, 'Sylhet', 'Sylhet', 'Balaganj', 'Goala Bazar', '3124', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(958, 'Sylhet', 'Sylhet', 'Balaganj', 'Karua', '3121', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(959, 'Sylhet', 'Sylhet', 'Balaganj', 'Kathal Khair', '3127', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(960, 'Sylhet', 'Sylhet', 'Balaganj', 'Natun Bazar', '3129', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(961, 'Sylhet', 'Sylhet', 'Balaganj', 'Omarpur', '3126', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(962, 'Sylhet', 'Sylhet', 'Balaganj', 'Tajpur', '3123', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(963, 'Sylhet', 'Sylhet', 'Bianibazar', 'Bianibazar', '3170', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(964, 'Sylhet', 'Sylhet', 'Bianibazar', 'Churkai', '3175', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(965, 'Sylhet', 'Sylhet', 'Bianibazar', 'jaldup', '3171', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(966, 'Sylhet', 'Sylhet', 'Bianibazar', 'Kurar bazar', '3173', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(967, 'Sylhet', 'Sylhet', 'Bianibazar', 'Mathiura', '3172', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(968, 'Sylhet', 'Sylhet', 'Bianibazar', 'Salia bazar', '3174', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(969, 'Sylhet', 'Sylhet', 'Bishwanath', 'Bishwanath', '3130', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(970, 'Sylhet', 'Sylhet', 'Bishwanath', 'Dashghar', '3131', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(971, 'Sylhet', 'Sylhet', 'Bishwanath', 'Deokalas', '3133', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(972, 'Sylhet', 'Sylhet', 'Bishwanath', 'Doulathpur', '3132', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(973, 'Sylhet', 'Sylhet', 'Bishwanath', 'Singer kanch', '3134', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(974, 'Sylhet', 'Sylhet', 'Fenchuganj', 'Fenchuganj', '3116', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(975, 'Sylhet', 'Sylhet', 'Fenchuganj', 'Fenchuganj SareKarkh', '3117', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(976, 'Sylhet', 'Sylhet', 'Goainhat', 'Chiknagul', '3152', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(977, 'Sylhet', 'Sylhet', 'Goainhat', 'Goainhat', '3150', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(978, 'Sylhet', 'Sylhet', 'Goainhat', 'Jaflong', '3151', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(979, 'Sylhet', 'Sylhet', 'Gopalganj', 'banigram', '3164', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(980, 'Sylhet', 'Sylhet', 'Gopalganj', 'Chandanpur', '3165', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(981, 'Sylhet', 'Sylhet', 'Gopalganj', 'Dakkhin Bhadashore', '3162', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(982, 'Sylhet', 'Sylhet', 'Gopalganj', 'Dhaka Dakkhin', '3161', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(983, 'Sylhet', 'Sylhet', 'Gopalganj', 'Gopalgannj', '3160', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(984, 'Sylhet', 'Sylhet', 'Gopalganj', 'Ranaping', '3163', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(985, 'Sylhet', 'Sylhet', 'Jaintapur', 'Jainthapur', '3156', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(986, 'Sylhet', 'Sylhet', 'Jakiganj', 'Ichhamati', '3191', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(987, 'Sylhet', 'Sylhet', 'Jakiganj', 'Jakiganj', '3190', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(988, 'Sylhet', 'Sylhet', 'Kanaighat', 'Chatulbazar', '3181', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(989, 'Sylhet', 'Sylhet', 'Kanaighat', 'Gachbari', '3183', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(990, 'Sylhet', 'Sylhet', 'Kanaighat', 'Kanaighat', '3180', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(991, 'Sylhet', 'Sylhet', 'Kanaighat', 'Manikganj', '3182', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(992, 'Sylhet', 'Sylhet', 'Kompanyganj', 'Kompanyganj', '3140', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(993, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Birahimpur', '3106', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(994, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Jalalabad', '3107', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(995, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Jalalabad Cantoment', '3104', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(996, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Kadamtali', '3111', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(997, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Kamalbazer', '3112', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(998, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Khadimnagar', '3103', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(999, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Lalbazar', '3113', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(1000, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Mogla', '3108', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(1001, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Ranga Hajiganj', '3109', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(1002, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Shahajalal Science &', '3114', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(1003, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Silam', '3105', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(1004, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Sylhe Sadar', '3100', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(1005, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Sylhet Biman Bondar', '3102', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(1006, 'Sylhet', 'Sylhet', 'Sylhet Sadar', 'Sylhet Cadet Col', '3101', '2015-06-25 11:41:36', '2015-06-25 11:41:36'),
(1007, 'Sylhet', 'Meherpur', 'Gangni', 'Gangni', '7110', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1008, 'Sylhet', 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7101', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1009, 'Sylhet', 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7152', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1010, 'Sylhet', 'Meherpur', 'Meherpur Sadar', 'Meherpur Sadar', '7100', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1011, 'Sylhet', 'Meherpur', 'Meherpur Sadar', 'Mujib Nagar Complex', '7102', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1012, 'Sylhet', 'Narail', 'Kalia', 'Kalia', '7520', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1013, 'Sylhet', 'Narail', 'Laxmipasha', 'Baradia', '7514', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1014, 'Sylhet', 'Narail', 'Laxmipasha', 'Itna', '7512', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1015, 'Sylhet', 'Narail', 'Laxmipasha', 'Laxmipasha', '7510', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1016, 'Sylhet', 'Narail', 'Laxmipasha', 'Lohagora', '7511', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1017, 'Sylhet', 'Narail', 'Laxmipasha', 'Naldi', '7513', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1018, 'Sylhet', 'Narail', 'Mohajan', 'Mohajan', '7521', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1019, 'Sylhet', 'Narail', 'Narail Sadar', 'Narail Sadar', '7500', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1020, 'Sylhet', 'Narail', 'Narail Sadar', 'Ratanganj', '7501', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1021, 'Sylhet', 'Satkhira', 'Ashashuni', 'Ashashuni', '9460', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1022, 'Sylhet', 'Satkhira', 'Ashashuni', 'Baradal', '9461', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1023, 'Sylhet', 'Satkhira', 'Debbhata', 'Debbhata', '9430', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1024, 'Sylhet', 'Satkhira', 'Debbhata', 'Gurugram', '9431', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1025, 'Sylhet', 'Satkhira', 'kalaroa', 'Chandanpur', '9415', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1026, 'Sylhet', 'Satkhira', 'kalaroa', 'Hamidpur', '9413', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1027, 'Sylhet', 'Satkhira', 'kalaroa', 'Jhaudanga', '9412', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1028, 'Sylhet', 'Satkhira', 'kalaroa', 'kalaroa', '9410', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1029, 'Sylhet', 'Satkhira', 'kalaroa', 'Khordo', '9414', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1030, 'Sylhet', 'Satkhira', 'kalaroa', 'Murarikati', '9411', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1031, 'Sylhet', 'Satkhira', 'Kaliganj UPO', 'Kaliganj UPO', '9440', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1032, 'Sylhet', 'Satkhira', 'Kaliganj UPO', 'Nalta Mubaroknagar', '9441', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1033, 'Sylhet', 'Satkhira', 'Kaliganj UPO', 'Ratanpur', '9442', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1034, 'Sylhet', 'Satkhira', 'Nakipur', 'Buri Goalini', '9453', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1035, 'Sylhet', 'Satkhira', 'Nakipur', 'Gabura', '9454', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1036, 'Sylhet', 'Satkhira', 'Nakipur', 'Habinagar', '9455', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1037, 'Sylhet', 'Satkhira', 'Nakipur', 'Nakipur', '9450', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1038, 'Sylhet', 'Satkhira', 'Nakipur', 'Naobeki', '9452', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1039, 'Sylhet', 'Satkhira', 'Nakipur', 'Noornagar', '9451', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1040, 'Sylhet', 'Satkhira', 'Satkhira Sadar', 'Budhhat', '9403', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1041, 'Sylhet', 'Satkhira', 'Satkhira Sadar', 'Gunakar kati', '9402', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1042, 'Sylhet', 'Satkhira', 'Satkhira Sadar', 'Satkhira Islamia Acc', '9401', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1043, 'Sylhet', 'Satkhira', 'Satkhira Sadar', 'Satkhira Sadar', '9400', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1044, 'Sylhet', 'Satkhira', 'Taala', 'Patkelghata', '9421', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1045, 'Sylhet', 'Satkhira', 'Taala', 'Taala', '9420', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1046, 'Barisal', 'Barguna', 'Amtali', 'Amtali', '8710', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1047, 'Barisal', 'Barguna', 'Bamna', 'Bamna', '8730', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1048, 'Barisal', 'Barguna', 'Barguna Sadar', 'Barguna Sadar', '8700', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1049, 'Barisal', 'Barguna', 'Barguna Sadar', 'Nali Bandar', '8701', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1050, 'Barisal', 'Barguna', 'Betagi', 'Betagi', '8740', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1051, 'Barisal', 'Barguna', 'Betagi', 'Darul Ulam', '8741', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1052, 'Barisal', 'Barguna', 'Patharghata', 'Kakchira', '8721', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1053, 'Barisal', 'Barguna', 'Patharghata', 'Patharghata', '8720', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1054, 'Barisal', 'Barishal', 'Agailzhara', 'Agailzhara', '8240', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1055, 'Barisal', 'Barishal', 'Agailzhara', 'Gaila', '8241', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1056, 'Barisal', 'Barishal', 'Agailzhara', 'Paisarhat', '8242', '2015-06-25 11:41:37', '2015-06-25 11:41:37'),
(1057, 'Barisal', 'Barishal', 'Babuganj', 'Babuganj', '8210', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1058, 'Barisal', 'Barishal', 'Babuganj', 'Barishal Cadet', '8216', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1059, 'Barisal', 'Barishal', 'Babuganj', 'Chandpasha', '8212', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1060, 'Barisal', 'Barishal', 'Babuganj', 'Madhabpasha', '8213', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1061, 'Barisal', 'Barishal', 'Babuganj', 'Nizamuddin College', '8215', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1062, 'Barisal', 'Barishal', 'Babuganj', 'Rahamatpur', '8211', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1063, 'Barisal', 'Barishal', 'Babuganj', 'Thakur Mallik', '8214', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1064, 'Barisal', 'Barishal', 'Barajalia', 'Barajalia', '8260', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1065, 'Barisal', 'Barishal', 'Barajalia', 'Osman Manjil', '8261', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1066, 'Barisal', 'Barishal', 'Barishal Sadar', 'Barishal Sadar', '8200', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1067, 'Barisal', 'Barishal', 'Barishal Sadar', 'Bukhainagar', '8201', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1068, 'Barisal', 'Barishal', 'Barishal Sadar', 'Jaguarhat', '8206', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1069, 'Barisal', 'Barishal', 'Barishal Sadar', 'Kashipur', '8205', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1070, 'Barisal', 'Barishal', 'Barishal Sadar', 'Patang', '8204', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1071, 'Barisal', 'Barishal', 'Barishal Sadar', 'Saheberhat', '8202', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1072, 'Barisal', 'Barishal', 'Barishal Sadar', 'Sugandia', '8203', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1073, 'Barisal', 'Barishal', 'Gouranadi', 'Batajor', '8233', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1074, 'Barisal', 'Barishal', 'Gouranadi', 'Gouranadi', '8230', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1075, 'Barisal', 'Barishal', 'Gouranadi', 'Kashemabad', '8232', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1076, 'Barisal', 'Barishal', 'Gouranadi', 'Tarki Bandar', '8231', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1077, 'Barisal', 'Barishal', 'Mahendiganj', 'Langutia', '8274', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1078, 'Barisal', 'Barishal', 'Mahendiganj', 'Laskarpur', '8271', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1079, 'Barisal', 'Barishal', 'Mahendiganj', 'Mahendiganj', '8270', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1080, 'Barisal', 'Barishal', 'Mahendiganj', 'Nalgora', '8273', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1081, 'Barisal', 'Barishal', 'Mahendiganj', 'Ulania', '8272', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1082, 'Barisal', 'Barishal', 'Muladi', 'Charkalekhan', '8252', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1083, 'Barisal', 'Barishal', 'Muladi', 'Kazirchar', '8251', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1084, 'Barisal', 'Barishal', 'Muladi', 'Muladi', '8250', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1085, 'Barisal', 'Barishal', 'Sahebganj', 'Charamandi', '8281', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1086, 'Barisal', 'Barishal', 'Sahebganj', 'kalaskati', '8284', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1087, 'Barisal', 'Barishal', 'Sahebganj', 'Padri Shibpur', '8282', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1088, 'Barisal', 'Barishal', 'Sahebganj', 'Sahebganj', '8280', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1089, 'Barisal', 'Barishal', 'Sahebganj', 'Shialguni', '8283', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1090, 'Barisal', 'Barishal', 'Uzirpur', 'Dakuarhat', '8223', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1091, 'Barisal', 'Barishal', 'Uzirpur', 'Dhamura', '8221', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1092, 'Barisal', 'Barishal', 'Uzirpur', 'Jugirkanda', '8222', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1093, 'Barisal', 'Barishal', 'Uzirpur', 'Shikarpur', '8224', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1094, 'Barisal', 'Barishal', 'Uzirpur', 'Uzirpur', '8220', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1095, 'Barisal', 'Bhola', 'Bhola Sadar', 'Bhola Sadar', '8300', '2015-06-25 11:41:38', '2015-06-25 11:41:38'),
(1096, 'Barisal', 'Bhola', 'Bhola Sadar', 'Joynagar', '8301', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1097, 'Barisal', 'Bhola', 'Borhanuddin UPO', 'Borhanuddin UPO', '8320', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1098, 'Barisal', 'Bhola', 'Borhanuddin UPO', 'Mirzakalu', '8321', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1099, 'Barisal', 'Bhola', 'Charfashion', 'Charfashion', '8340', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1100, 'Barisal', 'Bhola', 'Charfashion', 'Dularhat', '8341', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1101, 'Barisal', 'Bhola', 'Charfashion', 'Keramatganj', '8342', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1102, 'Barisal', 'Bhola', 'Doulatkhan', 'Doulatkhan', '8310', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1103, 'Barisal', 'Bhola', 'Doulatkhan', 'Hajipur', '8311', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1104, 'Barisal', 'Bhola', 'Hajirhat', 'Hajirhat', '8360', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1105, 'Barisal', 'Bhola', 'Hatshoshiganj', 'Hatshoshiganj', '8350', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1106, 'Barisal', 'Bhola', 'Lalmohan UPO', 'Daurihat', '8331', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1107, 'Barisal', 'Bhola', 'Lalmohan UPO', 'Gazaria', '8332', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1108, 'Barisal', 'Bhola', 'Lalmohan UPO', 'Lalmohan UPO', '8330', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1109, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Baukathi', '8402', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1110, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Gabha', '8403', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1111, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Jhalokathi Sadar', '8400', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1112, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Nabagram', '8401', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1113, 'Barisal', 'Jhalokathi', 'Jhalokathi Sadar', 'Shekherhat', '8404', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1114, 'Barisal', 'Jhalokathi', 'Kathalia', 'Amua', '8431', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1115, 'Barisal', 'Jhalokathi', 'Kathalia', 'Kathalia', '8430', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1116, 'Barisal', 'Jhalokathi', 'Kathalia', 'Niamatee', '8432', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1117, 'Barisal', 'Jhalokathi', 'Kathalia', 'Shoulajalia', '8433', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1118, 'Barisal', 'Jhalokathi', 'Nalchhiti', 'Beerkathi', '8421', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1119, 'Barisal', 'Jhalokathi', 'Nalchhiti', 'Nalchhiti', '8420', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1120, 'Barisal', 'Jhalokathi', 'Rajapur', 'Rajapur', '8410', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1121, 'Barisal', 'Patuakhali', 'Bauphal', 'Bagabandar', '8621', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1122, 'Barisal', 'Patuakhali', 'Bauphal', 'Bauphal', '8620', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1123, 'Barisal', 'Patuakhali', 'Bauphal', 'Birpasha', '8622', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1124, 'Barisal', 'Patuakhali', 'Bauphal', 'Kalaia', '8624', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1125, 'Barisal', 'Patuakhali', 'Bauphal', 'Kalishari', '8623', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1126, 'Barisal', 'Patuakhali', 'Dashmina', 'Dashmina', '8630', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1127, 'Barisal', 'Patuakhali', 'Galachipa', 'Galachipa', '8640', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1128, 'Barisal', 'Patuakhali', 'Galachipa', 'Gazipur Bandar', '8641', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1129, 'Barisal', 'Patuakhali', 'Khepupara', 'Khepupara', '8650', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1130, 'Barisal', 'Patuakhali', 'Khepupara', 'Mahipur', '8651', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1131, 'Barisal', 'Patuakhali', 'Patuakhali Sadar', 'Dumkee', '8602', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1132, 'Barisal', 'Patuakhali', 'Patuakhali Sadar', 'Moukaran', '8601', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1133, 'Barisal', 'Patuakhali', 'Patuakhali Sadar', 'Patuakhali Sadar', '8600', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1134, 'Barisal', 'Patuakhali', 'Patuakhali Sadar', 'Rahimabad', '8603', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1135, 'Barisal', 'Patuakhali', 'Subidkhali', 'Subidkhali', '8610', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1136, 'Barisal', 'Pirojpur', 'Banaripara', 'Banaripara', '8530', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1137, 'Barisal', 'Pirojpur', 'Banaripara', 'Chakhar', '8531', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1138, 'Barisal', 'Pirojpur', 'Bhandaria', 'Bhandaria', '8550', '2015-06-25 11:41:39', '2015-06-25 11:41:39'),
(1139, 'Barisal', 'Pirojpur', 'Bhandaria', 'Dhaoa', '8552', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1140, 'Barisal', 'Pirojpur', 'Bhandaria', 'Kanudashkathi', '8551', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1141, 'Barisal', 'Pirojpur', 'kaukhali', 'Jolagati', '8513', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1142, 'Barisal', 'Pirojpur', 'kaukhali', 'Joykul', '8512', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1143, 'Barisal', 'Pirojpur', 'kaukhali', 'Kaukhali', '8510', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1144, 'Barisal', 'Pirojpur', 'kaukhali', 'Keundia', '8511', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1145, 'Barisal', 'Pirojpur', 'Mathbaria', 'Betmor Natun Hat', '8565', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1146, 'Barisal', 'Pirojpur', 'Mathbaria', 'Gulishakhali', '8563', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1147, 'Barisal', 'Pirojpur', 'Mathbaria', 'Halta', '8562', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1148, 'Barisal', 'Pirojpur', 'Mathbaria', 'Mathbaria', '8560', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1149, 'Barisal', 'Pirojpur', 'Mathbaria', 'Shilarganj', '8566', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1150, 'Barisal', 'Pirojpur', 'Mathbaria', 'Tiarkhali', '8564', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1151, 'Barisal', 'Pirojpur', 'Mathbaria', 'Tushkhali', '8561', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1152, 'Barisal', 'Pirojpur', 'Nazirpur', 'Nazirpur', '8540', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1153, 'Barisal', 'Pirojpur', 'Nazirpur', 'Sriramkathi', '8541', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1154, 'Barisal', 'Pirojpur', 'Pirojpur Sadar', 'Hularhat', '8501', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1155, 'Barisal', 'Pirojpur', 'Pirojpur Sadar', 'Parerhat', '8502', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1156, 'Barisal', 'Pirojpur', 'Pirojpur Sadar', 'Pirojpur Sadar', '8500', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1157, 'Barisal', 'Pirojpur', 'Swarupkathi', 'Darus Sunnat', '8521', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1158, 'Barisal', 'Pirojpur', 'Swarupkathi', 'Jalabari', '8523', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1159, 'Barisal', 'Pirojpur', 'Swarupkathi', 'Kaurikhara', '8522', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1160, 'Barisal', 'Pirojpur', 'Swarupkathi', 'Swarupkathi', '8520', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1161, 'Rajshahi', 'Bogra', 'Alamdighi', 'Adamdighi', '5890', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1162, 'Rajshahi', 'Bogra', 'Alamdighi', 'Nasharatpur', '5892', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1163, 'Rajshahi', 'Bogra', 'Alamdighi', 'Santahar', '5891', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1164, 'Rajshahi', 'Bogra', 'Bogra Sadar', 'Bogra Canttonment', '5801', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1165, 'Rajshahi', 'Bogra', 'Bogra Sadar', 'Bogra Sadar', '5800', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1166, 'Rajshahi', 'Bogra', 'Dhunat', 'Dhunat', '5850', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1167, 'Rajshahi', 'Bogra', 'Dhunat', 'Gosaibari', '5851', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1168, 'Rajshahi', 'Bogra', 'Dupchachia', 'Dupchachia', '5880', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1169, 'Rajshahi', 'Bogra', 'Dupchachia', 'Talora', '5881', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1170, 'Rajshahi', 'Bogra', 'Gabtoli', 'Gabtoli', '5820', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1171, 'Rajshahi', 'Bogra', 'Gabtoli', 'Sukhanpukur', '5821', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1172, 'Rajshahi', 'Bogra', 'Kahalu', 'Kahalu', '5870', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1173, 'Rajshahi', 'Bogra', 'Nandigram', 'Nandigram', '5860', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1174, 'Rajshahi', 'Bogra', 'Sariakandi', 'Chandan Baisha', '5831', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1175, 'Rajshahi', 'Bogra', 'Sariakandi', 'Sariakandi', '5830', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1176, 'Rajshahi', 'Bogra', 'Sherpur', 'Chandaikona', '5841', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1177, 'Rajshahi', 'Bogra', 'Sherpur', 'Palli Unnyan Accadem', '5842', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1178, 'Rajshahi', 'Bogra', 'Sherpur', 'Sherpur', '5840', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1179, 'Rajshahi', 'Bogra', 'Shibganj', 'Shibganj', '5810', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1180, 'Rajshahi', 'Bogra', 'Sonatola', 'Sonatola', '5826', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1181, 'Rajshahi', 'Chapinawabganj', 'Bholahat', 'Bholahat', '6330', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1182, 'Rajshahi', 'Chapinawabganj', 'Chapinawabganj Sadar', 'Amnura', '6303', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1183, 'Rajshahi', 'Chapinawabganj', 'Chapinawabganj Sadar', 'Chapinawbganj Sadar', '6300', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1184, 'Rajshahi', 'Chapinawabganj', 'Chapinawabganj Sadar', 'Rajarampur', '6301', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1185, 'Rajshahi', 'Chapinawabganj', 'Chapinawabganj Sadar', 'Ramchandrapur', '6302', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1186, 'Rajshahi', 'Chapinawabganj', 'Nachol', 'Mandumala', '6311', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1187, 'Rajshahi', 'Chapinawabganj', 'Nachol', 'Nachol', '6310', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1188, 'Rajshahi', 'Chapinawabganj', 'Rohanpur', 'Gomashtapur', '6321', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1189, 'Rajshahi', 'Chapinawabganj', 'Rohanpur', 'Rohanpur', '6320', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1190, 'Rajshahi', 'Chapinawabganj', 'Shibganj U.P.O', 'Kansart', '6341', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1191, 'Rajshahi', 'Chapinawabganj', 'Shibganj U.P.O', 'Manaksha', '6342', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1192, 'Rajshahi', 'Chapinawabganj', 'Shibganj U.P.O', 'Shibganj U.P.O', '6340', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1193, 'Rajshahi', 'Joypurhat', 'Akkelpur', 'Akklepur', '5940', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1194, 'Rajshahi', 'Joypurhat', 'Akkelpur', 'jamalganj', '5941', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1195, 'Rajshahi', 'Joypurhat', 'Akkelpur', 'Tilakpur', '5942', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1196, 'Rajshahi', 'Joypurhat', 'Joypurhat Sadar', 'Joypurhat Sadar', '5900', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1197, 'Rajshahi', 'Joypurhat', 'kalai', 'kalai', '5930', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1198, 'Rajshahi', 'Joypurhat', 'Khetlal', 'Khetlal', '5920', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1199, 'Rajshahi', 'Joypurhat', 'panchbibi', 'Panchbibi', '5910', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1200, 'Rajshahi', 'Naogaon', 'Ahsanganj', 'Ahsanganj', '6596', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1201, 'Rajshahi', 'Naogaon', 'Ahsanganj', 'Bandai', '6597', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1202, 'Rajshahi', 'Naogaon', 'Badalgachhi', 'Badalgachhi', '6570', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1203, 'Rajshahi', 'Naogaon', 'Dhamuirhat', 'Dhamuirhat', '6580', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1204, 'Rajshahi', 'Naogaon', 'Mahadebpur', 'Mahadebpur', '6530', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1205, 'Rajshahi', 'Naogaon', 'Naogaon Sadar', 'Naogaon Sadar', '6500', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1206, 'Rajshahi', 'Naogaon', 'Niamatpur', 'Niamatpur', '6520', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1207, 'Rajshahi', 'Naogaon', 'Nitpur', 'Nitpur', '6550', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1208, 'Rajshahi', 'Naogaon', 'Nitpur', 'Panguria', '6552', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1209, 'Rajshahi', 'Naogaon', 'Nitpur', 'Porsa', '6551', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1210, 'Rajshahi', 'Naogaon', 'Patnitala', 'Patnitala', '6540', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1211, 'Rajshahi', 'Naogaon', 'Prasadpur', 'Balihar', '6512', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1212, 'Rajshahi', 'Naogaon', 'Prasadpur', 'Manda', '6511', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1213, 'Rajshahi', 'Naogaon', 'Prasadpur', 'Prasadpur', '6510', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1214, 'Rajshahi', 'Naogaon', 'Raninagar', 'Kashimpur', '6591', '2015-06-25 11:41:40', '2015-06-25 11:41:40'),
(1215, 'Rajshahi', 'Naogaon', 'Raninagar', 'Raninagar', '6590', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1216, 'Rajshahi', 'Naogaon', 'Sapahar', 'Moduhil', '6561', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1217, 'Rajshahi', 'Naogaon', 'Sapahar', 'Sapahar', '6560', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1218, 'Rajshahi', 'Natore', 'Gopalpur UPO', 'Abdulpur', '6422', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1219, 'Rajshahi', 'Natore', 'Gopalpur UPO', 'Gopalpur U.P.O', '6420', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1220, 'Rajshahi', 'Natore', 'Gopalpur UPO', 'Lalpur S.O', '6421', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1221, 'Rajshahi', 'Natore', 'Harua', 'Baraigram', '6432', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1222, 'Rajshahi', 'Natore', 'Harua', 'Dayarampur', '6431', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1223, 'Rajshahi', 'Natore', 'Harua', 'Harua', '6430', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1224, 'Rajshahi', 'Natore', 'Hatgurudaspur', 'Hatgurudaspur', '6440', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1225, 'Rajshahi', 'Natore', 'Laxman', 'Laxman', '6410', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1226, 'Rajshahi', 'Natore', 'Natore Sadar', 'Baiddyabal Gharia', '6402', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1227, 'Rajshahi', 'Natore', 'Natore Sadar', 'Digapatia', '6401', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1228, 'Rajshahi', 'Natore', 'Natore Sadar', 'Madhnagar', '6403', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1229, 'Rajshahi', 'Natore', 'Natore Sadar', 'Natore Sadar', '6400', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1230, 'Rajshahi', 'Natore', 'Singra', 'Singra', '6450', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1231, 'Rajshahi', 'Pabna', 'Banwarinagar', 'Banwarinagar', '6650', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1232, 'Rajshahi', 'Pabna', 'Bera', 'Bera', '6680', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1233, 'Rajshahi', 'Pabna', 'Bera', 'Kashinathpur', '6682', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1234, 'Rajshahi', 'Pabna', 'Bera', 'Nakalia', '6681', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1235, 'Rajshahi', 'Pabna', 'Bera', 'Puran Bharenga', '6683', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1236, 'Rajshahi', 'Pabna', 'Bhangura', 'Bhangura', '6640', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1237, 'Rajshahi', 'Pabna', 'Chatmohar', 'Chatmohar', '6630', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1238, 'Rajshahi', 'Pabna', 'Debottar', 'Debottar', '6610', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1239, 'Rajshahi', 'Pabna', 'Ishwardi', 'Dhapari', '6621', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1240, 'Rajshahi', 'Pabna', 'Ishwardi', 'Ishwardi', '6620', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1241, 'Rajshahi', 'Pabna', 'Ishwardi', 'Pakshi', '6622', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1242, 'Rajshahi', 'Pabna', 'Ishwardi', 'Rajapur', '6623', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1243, 'Rajshahi', 'Pabna', 'Pabna Sadar', 'Hamayetpur', '6602', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1244, 'Rajshahi', 'Pabna', 'Pabna Sadar', 'Kaliko Cotton Mills', '6601', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1245, 'Rajshahi', 'Pabna', 'Pabna Sadar', 'Pabna Sadar', '6600', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1246, 'Rajshahi', 'Pabna', 'Sathia', 'Sathia', '6670', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1247, 'Rajshahi', 'Pabna', 'Sujanagar', 'Sagarkandi', '6661', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1248, 'Rajshahi', 'Pabna', 'Sujanagar', 'Sujanagar', '6660', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1249, 'Rajshahi', 'Rajshahi', 'Bagha', 'Arani', '6281', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1250, 'Rajshahi', 'Rajshahi', 'Bagha', 'Bagha', '6280', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1251, 'Rajshahi', 'Rajshahi', 'Bhabaniganj', 'Bhabaniganj', '6250', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1252, 'Rajshahi', 'Rajshahi', 'Bhabaniganj', 'Taharpur', '6251', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1253, 'Rajshahi', 'Rajshahi', 'Charghat', 'Charghat', '6270', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1254, 'Rajshahi', 'Rajshahi', 'Charghat', 'Sarda', '6271', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1255, 'Rajshahi', 'Rajshahi', 'Durgapur', 'Durgapur', '6240', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1256, 'Rajshahi', 'Rajshahi', 'Godagari', 'Godagari', '6290', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1257, 'Rajshahi', 'Rajshahi', 'Godagari', 'Premtoli', '6291', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1258, 'Rajshahi', 'Rajshahi', 'Khod Mohanpur', 'Khodmohanpur', '6220', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1259, 'Rajshahi', 'Rajshahi', 'Lalitganj', 'Lalitganj', '6210', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1260, 'Rajshahi', 'Rajshahi', 'Lalitganj', 'Rajshahi Sugar Mills', '6211', '2015-06-25 11:41:41', '2015-06-25 11:41:41'),
(1261, 'Rajshahi', 'Rajshahi', 'Lalitganj', 'Shyampur', '6212', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1262, 'Rajshahi', 'Rajshahi', 'Putia', 'Putia', '6260', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1263, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Binodpur Bazar', '6206', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1264, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Ghuramara', '6100', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1265, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Kazla', '6204', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1266, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi Canttonment', '6202', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1267, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi Court', '6201', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1268, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi Sadar', '6000', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1269, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi University', '6205', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1270, 'Rajshahi', 'Rajshahi', 'Rajshahi Sadar', 'Sapura', '6203', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1271, 'Rajshahi', 'Rajshahi', 'Tanor', 'Tanor', '6230', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1272, 'Rajshahi', 'Sirajganj', 'Baiddya Jam Toil', 'Baiddya Jam Toil', '6730', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1273, 'Rajshahi', 'Sirajganj', 'Belkuchi', 'Belkuchi', '6740', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1274, 'Rajshahi', 'Sirajganj', 'Belkuchi', 'Enayetpur', '6751', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1275, 'Rajshahi', 'Sirajganj', 'Belkuchi', 'Rajapur', '6742', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1276, 'Rangpur', 'Dinajpur', 'Bangla Hili', 'Bangla Hili', '5270', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1277, 'Rangpur', 'Dinajpur', 'Biral', 'Biral', '5210', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1278, 'Rangpur', 'Dinajpur', 'Birampur', 'Birampur', '5266', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1279, 'Rangpur', 'Dinajpur', 'Birganj', 'Birganj', '5220', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1280, 'Rangpur', 'Dinajpur', 'Chrirbandar', 'Chrirbandar', '5240', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1281, 'Rangpur', 'Dinajpur', 'Chrirbandar', 'Ranirbandar', '5241', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1282, 'Rangpur', 'Dinajpur', 'Dinajpur Sadar', 'Dinajpur Rajbari', '5201', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1283, 'Rangpur', 'Dinajpur', 'Dinajpur Sadar', 'Dinajpur Sadar', '5200', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1284, 'Rangpur', 'Dinajpur', 'Khansama', 'Khansama', '5230', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1285, 'Rangpur', 'Dinajpur', 'Khansama', 'Pakarhat', '5231', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1286, 'Rangpur', 'Dinajpur', 'Maharajganj', 'Maharajganj', '5226', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1287, 'Rangpur', 'Dinajpur', 'Nababganj', 'Daudpur', '5281', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1288, 'Rangpur', 'Dinajpur', 'Nababganj', 'Gopalpur', '5282', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1289, 'Rangpur', 'Dinajpur', 'Nababganj', 'Nababganj', '5280', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1290, 'Rangpur', 'Dinajpur', 'Osmanpur', 'Ghoraghat', '5291', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1291, 'Rangpur', 'Dinajpur', 'Osmanpur', 'Osmanpur', '5290', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1292, 'Rangpur', 'Dinajpur', 'Parbatipur', 'Parbatipur', '5250', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1293, 'Rangpur', 'Dinajpur', 'Phulbari', 'Phulbari', '5260', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1294, 'Rangpur', 'Dinajpur', 'Setabganj', 'Setabganj', '5216', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1295, 'Rangpur', 'Gaibandha', 'Bonarpara', 'Bonarpara', '5750', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1296, 'Rangpur', 'Gaibandha', 'Bonarpara', 'saghata', '5751', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1297, 'Rangpur', 'Gaibandha', 'Gaibandha Sadar', 'Gaibandha Sadar', '5700', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1298, 'Rangpur', 'Gaibandha', 'Gobindaganj', 'Gobindhaganj', '5740', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1299, 'Rangpur', 'Gaibandha', 'Gobindaganj', 'Mahimaganj', '5741', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1300, 'Rangpur', 'Gaibandha', 'Palashbari', 'Palashbari', '5730', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1301, 'Rangpur', 'Gaibandha', 'Phulchhari', 'Bharatkhali', '5761', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1302, 'Rangpur', 'Gaibandha', 'Phulchhari', 'Phulchhari', '5760', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1303, 'Rangpur', 'Gaibandha', 'Saadullapur', 'Naldanga', '5711', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1304, 'Rangpur', 'Gaibandha', 'Saadullapur', 'Saadullapur', '5710', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1305, 'Rangpur', 'Gaibandha', 'Sundarganj', 'Bamandanga', '5721', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1306, 'Rangpur', 'Gaibandha', 'Sundarganj', 'Sundarganj', '5720', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1307, 'Rangpur', 'Kurigram', 'Bhurungamari', 'Bhurungamari', '5670', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1308, 'Rangpur', 'Kurigram', 'Chilmari', 'Chilmari', '5630', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1309, 'Rangpur', 'Kurigram', 'Chilmari', 'Jorgachh', '5631', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1310, 'Rangpur', 'Kurigram', 'Kurigram Sadar', 'Kurigram Sadar', '5600', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1311, 'Rangpur', 'Kurigram', 'Kurigram Sadar', 'Pandul', '5601', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1312, 'Rangpur', 'Kurigram', 'Kurigram Sadar', 'Phulbari', '5680', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1313, 'Rangpur', 'Kurigram', 'Nageshwar', 'Nageshwar', '5660', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1314, 'Rangpur', 'Kurigram', 'Rajarhat', 'Nazimkhan', '5611', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1315, 'Rangpur', 'Kurigram', 'Rajarhat', 'Rajarhat', '5610', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1316, 'Rangpur', 'Kurigram', 'Rajibpur', 'Rajibpur', '5650', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1317, 'Rangpur', 'Kurigram', 'Roumari', 'Roumari', '5640', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1318, 'Rangpur', 'Kurigram', 'Ulipur', 'Bazarhat', '5621', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1319, 'Rangpur', 'Kurigram', 'Ulipur', 'Ulipur', '5620', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1320, 'Rangpur', 'Lalmonirhat', 'Aditmari', 'Aditmari', '5510', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1321, 'Rangpur', 'Lalmonirhat', 'Hatibandha', 'Hatibandha', '5530', '2015-06-25 11:41:42', '2015-06-25 11:41:42'),
(1322, 'Rangpur', 'Lalmonirhat', 'Lalmonirhat Sadar', 'Kulaghat SO', '5502', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1323, 'Rangpur', 'Lalmonirhat', 'Lalmonirhat Sadar', 'Lalmonirhat Sadar', '5500', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1324, 'Rangpur', 'Lalmonirhat', 'Lalmonirhat Sadar', 'Moghalhat', '5501', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1325, 'Rangpur', 'Lalmonirhat', 'Patgram', 'Baura', '5541', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1326, 'Rangpur', 'Lalmonirhat', 'Patgram', 'Burimari', '5542', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1327, 'Rangpur', 'Lalmonirhat', 'Patgram', 'Patgram', '5540', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1328, 'Rangpur', 'Lalmonirhat', 'Tushbhandar', 'Tushbhandar', '5520', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1329, 'Rangpur', 'Nilphamari', 'Dimla', 'Dimla', '5350', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1330, 'Rangpur', 'Nilphamari', 'Dimla', 'Ghaga Kharibari', '5351', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1331, 'Rangpur', 'Nilphamari', 'Domar', 'Chilahati', '5341', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1332, 'Rangpur', 'Nilphamari', 'Domar', 'Domar', '5340', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1333, 'Rangpur', 'Nilphamari', 'Jaldhaka', 'Jaldhaka', '5330', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1334, 'Rangpur', 'Nilphamari', 'Kishoriganj', 'Kishoriganj', '5320', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1335, 'Rangpur', 'Nilphamari', 'Nilphamari Sadar', 'Nilphamari Sadar', '5300', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1336, 'Rangpur', 'Nilphamari', 'Nilphamari Sadar', 'Nilphamari Sugar Mil', '5301', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1337, 'Rangpur', 'Nilphamari', 'Syedpur', 'Syedpur', '5310', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1338, 'Rangpur', 'Nilphamari', 'Syedpur', 'Syedpur Upashahar', '5311', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1339, 'Rangpur', 'Panchagarh', 'Boda', 'Boda', '5010', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1340, 'Rangpur', 'Panchagarh', 'Chotto Dab', 'Chotto Dab', '5040', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1341, 'Rangpur', 'Panchagarh', 'Chotto Dab', 'Mirjapur', '5041', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1342, 'Rangpur', 'Panchagarh', 'Dabiganj', 'Dabiganj', '5020', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1343, 'Rangpur', 'Panchagarh', 'Panchagra Sadar', 'Panchagar Sadar', '5000', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1344, 'Rangpur', 'Panchagarh', 'Tetulia', 'Tetulia', '5030', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1345, 'Rangpur', 'Rangpur', 'Badarganj', 'Badarganj', '5430', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1346, 'Rangpur', 'Rangpur', 'Badarganj', 'Shyampur', '5431', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1347, 'Rangpur', 'Rangpur', 'Gangachara', 'Gangachara', '5410', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1348, 'Rangpur', 'Rangpur', 'Kaunia', 'Haragachh', '5441', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1349, 'Rangpur', 'Rangpur', 'Kaunia', 'Kaunia', '5440', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1350, 'Rangpur', 'Rangpur', 'Mithapukur', 'Mithapukur', '5460', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1351, 'Rangpur', 'Rangpur', 'Pirgachha', 'Pirgachha', '5450', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1352, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Alamnagar', '5402', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1353, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Mahiganj', '5403', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1354, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Rangpur Cadet Colleg', '5404', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1355, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Rangpur Carmiecal Col', '5405', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1356, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Rangpur Sadar', '5400', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1357, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Rangpur Upa-Shahar', '5401', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1358, 'Rangpur', 'Rangpur', 'Taraganj', 'Taraganj', '5420', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1359, 'Rangpur', 'Thakurgaon', 'Baliadangi', 'Baliadangi', '5140', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1360, 'Rangpur', 'Thakurgaon', 'Baliadangi', 'Lahiri', '5141', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1361, 'Rangpur', 'Thakurgaon', 'Jibanpur', 'Jibanpur', '5130', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1362, 'Rangpur', 'Thakurgaon', 'Pirganj', 'Pirganj', '5110', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1363, 'Rangpur', 'Thakurgaon', 'Pirganj', 'Pirganj', '5470', '2015-06-25 11:41:43', '2015-06-25 11:41:43');
INSERT INTO `districts_000` (`id`, `division`, `district`, `upazila`, `post_office`, `post_code`, `created_at`, `updated_at`) VALUES
(1364, 'Rangpur', 'Thakurgaon', 'Rani Sankail', 'Nekmarad', '5121', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1365, 'Rangpur', 'Thakurgaon', 'Rani Sankail', 'Rani Sankail', '5120', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1366, 'Rangpur', 'Thakurgaon', 'Thakurgaon Sadar', 'Ruhia', '5103', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1367, 'Rangpur', 'Thakurgaon', 'Thakurgaon Sadar', 'Shibganj', '5102', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1368, 'Rangpur', 'Thakurgaon', 'Thakurgaon Sadar', 'Thakurgaon Road', '5101', '2015-06-25 11:41:43', '2015-06-25 11:41:43'),
(1369, 'Rangpur', 'Thakurgaon', 'Thakurgaon Sadar', 'Thakurgaon Sadar', '5100', '2015-06-25 11:41:44', '2015-06-25 11:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `code`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', NULL, 1, NULL, '2026-09-05 04:39:48', '2026-09-05 04:39:48'),
(2, 'Rajshahi', 'রাজশাহী', NULL, 1, NULL, '2026-09-05 04:39:48', '2026-09-05 04:39:48'),
(3, 'Khulna', 'খুলনা', NULL, 1, NULL, '2026-09-05 04:39:48', '2026-09-05 04:39:48'),
(4, 'Barisal', 'বরিশাল', NULL, 1, NULL, '2026-09-05 04:39:48', '2026-09-05 04:39:48'),
(5, 'Sylhet', 'সিলেট', NULL, 1, NULL, '2026-09-05 04:39:48', '2026-09-05 04:39:48'),
(6, 'Dhaka', 'ঢাকা', NULL, 1, NULL, '2026-09-05 04:39:48', '2026-09-05 04:39:48'),
(7, 'Rangpur', 'রংপুর', NULL, 1, NULL, '2026-09-05 04:39:48', '2026-09-05 04:39:48'),
(8, 'Mymensingh', 'ময়মনসিংহ', NULL, 1, NULL, '2026-09-05 04:39:48', '2026-09-05 04:39:48');

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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'test-menu', 1, '2026-08-17 03:56:16', '2026-08-17 03:56:16'),
(2, 2, 'Md. Asif Hossain', 1, '2026-08-23 23:07:43', '2026-08-23 23:07:43');

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
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_14_073225_add_two_factor_columns_to_users_table', 1),
(5, '2025_10_14_073306_create_personal_access_tokens_table', 1),
(6, '2025_10_18_061438_create_skills_table', 1),
(7, '2025_10_18_084715_create_projects_table', 1),
(23, '2026_08_10_050131_create_roles_table', 2),
(24, '2026_08_10_050140_create_permissions_table', 2),
(25, '2026_08_10_050149_create_role_permissions_table', 2),
(26, '2026_08_10_050202_create_users_table', 2),
(27, '2026_08_10_050232_create_menus_table', 2),
(28, '2026_08_10_050241_create_categories_table', 2),
(29, '2026_08_10_050250_create_sub_categories_table', 2),
(30, '2026_08_10_050259_create_brands_table', 2),
(32, '2026_08_10_050314_create_policies_table', 2),
(33, '2026_08_10_050322_create_products_table', 2),
(34, '2026_08_10_050329_create_product_images_table', 2),
(35, '0001_01_01_000050_create_carts_table', 3),
(36, '2026_08_20_034222_add_is_flash_and_is_best_to_products_table', 3),
(38, '2026_08_18_103351_create_settings_table', 5),
(39, '2026_08_10_050306_create_sliders_table', 6),
(45, '2026_08_27_094934_create_coupons_table', 7),
(48, '2026_08_31_053120_create_customers_table', 8),
(49, '2026_08_31_074723_create_orders_table', 9),
(50, '2026_08_31_074731_create_order_items_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(30) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `shipping_name` varchar(100) DEFAULT NULL,
  `shipping_phone` varchar(30) DEFAULT NULL,
  `shipping_email` varchar(100) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(30) NOT NULL DEFAULT 'PENDING',
  `order_status` varchar(30) NOT NULL DEFAULT 'PLACED',
  `subtotal` decimal(19,4) NOT NULL,
  `shipping_fee` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `discount_amount` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `grand_total` decimal(19,4) NOT NULL,
  `order_note` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `shipped_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `customer_id`, `coupon_id`, `coupon_code`, `shipping_name`, `shipping_phone`, `shipping_email`, `shipping_address`, `payment_method`, `payment_status`, `order_status`, `subtotal`, `shipping_fee`, `discount_amount`, `grand_total`, `order_note`, `ip_address`, `paid_at`, `shipped_at`, `delivered_at`, `created_at`, `updated_at`) VALUES
(1, 'ORD-20260907-1001', 2, 2, NULL, 'MR10', NULL, NULL, NULL, NULL, 'cod', 'pending', 'processing', 2250.0000, 0.0000, 0.0000, 2250.0000, 'no note', '::1', NULL, NULL, NULL, '2026-09-06 23:56:40', '2026-09-06 23:56:40'),
(2, 'ORD-CPEUT6VOBW-20260907', 2, 2, NULL, NULL, 'bbb', '01741285255', 'mostafizurrahmanripon03@gmail.com', 'yuuu', 'COD', 'PENDING', 'PROCESSING', 500.0000, 50.0000, 20.0000, 530.0000, NULL, '127.0.0.1', NULL, NULL, NULL, '2026-09-07 04:07:03', '2026-09-07 04:07:03'),
(3, 'ORD-1QLDBL58PA-20260907', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'COD', 'PENDING', 'PROCESSING', 700.0000, 70.0000, 20.0000, 750.0000, NULL, '127.0.0.1', NULL, NULL, NULL, '2026-09-07 04:22:08', '2026-09-07 04:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `orders_old`
--

CREATE TABLE `orders_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address_line` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `status` varchar(255) NOT NULL DEFAULT 'processing',
  `subtotal` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_old`
--

INSERT INTO `orders_old` (`id`, `order_number`, `user_id`, `customer_id`, `full_name`, `phone`, `address_line`, `city`, `area`, `payment_method`, `payment_status`, `status`, `subtotal`, `shipping_fee`, `discount`, `total`, `coupon_code`, `note`, `created_at`, `updated_at`) VALUES
(1, 'SB-260822-7EE32', 2, NULL, 'Asif', '01758040074', 'Mirpur1, Dhaka', 'Dhaka', 'Mirpur-1', 'cod', 'pending', 'processing', 450.00, 60.00, 0.00, 510.00, NULL, 'no note', '2026-08-21 23:07:54', '2026-08-21 23:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(19,4) NOT NULL,
  `discount_amount` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `total_price` decimal(19,4) NOT NULL,
  `return_status` varchar(20) NOT NULL DEFAULT 'NONE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `unit_price`, `discount_amount`, `total_price`, `return_status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Masala Combo', 5, 450.0000, 0.0000, 2250.0000, 'NONE', '2026-09-06 23:56:40', '2026-09-06 23:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_items_old`
--

CREATE TABLE `order_items_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `line_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items_old`
--

INSERT INTO `order_items_old` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `unit_price`, `line_total`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Masala Combo', 1, 450.00, 450.00, '2026-08-21 23:07:54', '2026-08-21 23:07:54');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'test-permission', 'test-permission', '2026-08-17 03:53:23', '2026-08-17 03:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `user_id`, `title`, `slug`, `description`, `sort_order`, `is_active`, `published_at`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 2, 'test-policy', 'test-policy', 'test-policy', 1, 1, '2026-08-17 09:52:00', 'test-policy', 'test-policy', '2026-08-17 03:52:37', '2026-08-17 03:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `full_desc` longtext DEFAULT NULL,
  `regular_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock_quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `low_stock_threshold` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `status` enum('draft','published','archived') NOT NULL DEFAULT 'draft',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_flash` tinyint(4) NOT NULL DEFAULT 0,
  `is_best` tinyint(4) NOT NULL DEFAULT 0,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `slug`, `sku`, `short_desc`, `full_desc`, `regular_price`, `sale_price`, `discount`, `category_id`, `sub_category_id`, `brand_id`, `image`, `stock_quantity`, `low_stock_threshold`, `status`, `is_featured`, `is_flash`, `is_best`, `sort_order`, `meta_title`, `meta_description`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'আমের আচার', 'test-product', NULL, 'test-product', 'test-product', 100.00, 90.00, 0.01, 1, 1, 1, 'products/yvEGXLN4SZeJmTVVwbBN7XulBEdXI7XrLGphaHHd.webp', 50, 5, 'draft', 1, 0, 0, 1, 'test-product', 'test-product', NULL, '2026-08-17 02:58:23', '2026-08-19 03:45:35'),
(2, 2, 'Chili Powder - 100 gm - (Bogra)', 'chili-powder-100-gm-bogra', NULL, 'বগুড়ার মরিচ গুড়াঃ \r\n\r\nরান্নায় স্বাদের জাদু নিয়ে এসে গেছে সেরা বাংলা ৬৪ এর সেরা সব মসলা। রান্নার সঠিক স্বাদ ও ঝাল নিশ্চিত করতে বগুড়ার বাছাইকৃত সেরা মরিচ থেকে প্রস্তুত সেরা বাংলা ৬৪ এর বগুড়ার মরিচ গুঁড়া।', 'বগুড়ার মরিচ গুড়াঃ \r\n\r\nরান্নায় স্বাদের জাদু নিয়ে এসে গেছে সেরা বাংলা ৬৪ এর সেরা সব মসলা। রান্নার সঠিক স্বাদ ও ঝাল নিশ্চিত করতে বগুড়ার বাছাইকৃত সেরা মরিচ থেকে প্রস্তুত সেরা বাংলা ৬৪ এর বগুড়ার মরিচ গুঁড়া।', 100.00, 90.00, 0.00, 2, NULL, 1, 'products/sUWIxRyjwNq3j3pBayWZKP7oUtq2KsOCmmRbtjKZ.png', 20, 5, 'draft', 0, 0, 0, 0, NULL, NULL, NULL, '2026-08-19 03:47:38', '2026-08-22 23:03:30'),
(3, 2, 'Cumin Powder - 200 gm - (Dinajpur)', 'cumin-powder-200-gm-dinajpur', NULL, 'দিনাজপুরের জিরার গুঁড়াঃ\r\n\r\nমশলা হিসেবে জিরা সুপরিচিত। খাবারকে সুস্বাদু ও সুগন্ধি করতে জিরার জুড়ি নেই। আমরা প্রতিদিন যত ধরনের খাবারের আইটেম তৈরি করি, তরকারি রান্না করি তার প্রায় প্রতিটিতে খাবারের মান দুর্দান্ত করার লক্ষ্যে রান্নায় জিরা গুঁড়ার ব্যবহার করতে হয়। এটি ছাড়া কোনো তরকারি সম্পর্কে ভাবা-ই যায়না।', 'দিনাজপুরের জিরার গুঁড়াঃ\r\n\r\nমশলা হিসেবে জিরা সুপরিচিত। খাবারকে সুস্বাদু ও সুগন্ধি করতে জিরার জুড়ি নেই। আমরা প্রতিদিন যত ধরনের খাবারের আইটেম তৈরি করি, তরকারি রান্না করি তার প্রায় প্রতিটিতে খাবারের মান দুর্দান্ত করার লক্ষ্যে রান্নায় জিরা গুঁড়ার ব্যবহার করতে হয়। এটি ছাড়া কোনো তরকারি সম্পর্কে ভাবা-ই যায়না।\r\n\r\nএছাড়াও জিরার কিছু গুণ আছে। জিরা ওজন কমাতে গুরুত্বপূর্ণ ভূমিকা রাখতে পারে। এটি শরীরের ক্ষতিকর চর্বি ও অস্বাস্থ্যকর কোলেস্টেরলের মাত্রা কমিয়ে ওজন কমাতে সহায়তা করে। আমরা আপনার প্রতিদিনের খাওয়ার জন্য আপনাকে সম্পূর্ণ তাজা এবং শীর্ষ মানের জিরা গুঁড়া সরবরাহ করছি।\r\n\r\nসেরা বাংলা ৬৪ এর জিরা গুঁড়ায় যা যা পাবেন\r\n\r\n* পরিশুদ্ধ জিরা গুঁড়ার নিশ্চয়তা\r\n\r\n* ১০০% ভেজালমুক্ত\r\n\r\n* গুণগত মানের জিরা থেকে প্রস্তুতকৃত\r\n\r\n* প্রাকৃতিক উপাদান ব্যবহৃত\r\n\r\n* স্বাস্থ্যসম্মত পণ্য\r\n\r\n* নিজস্ব তত্ত্বাবধানে প্রক্রিয়াজাত এবং প্যাকেজিংকৃত।', 310.00, 300.00, 0.00, 2, NULL, NULL, 'products/vV9nIs5bYRyKXMvAR4qjOehMzr4T98dDXbyCMbWt.jpg', 10, 5, 'draft', 0, 0, 0, 0, NULL, NULL, NULL, '2026-08-19 03:49:15', '2026-08-21 21:47:56'),
(4, 2, 'Ghee Combo', 'ghee-combo', NULL, 'মাত্র ১০০০ টাকায় পাবনার খাঁটি গাওয়া ঘি এর কম্বো অফার টি অর্ডার করে জিতে নিতে পারেন স্মার্টফোনসহ নানা আকর্ষণীয় পুরস্কার।\r\n\r\nসারা বাংলাদেশে ফ্রি ডেলিভারি তো থাকছেই। ফ্রি ডেলিভারি কুপন কোড \"FREEDELIVERY\"', 'মাত্র ১০০০ টাকায় পাবনার খাঁটি গাওয়া ঘি এর কম্বো অফার টি অর্ডার করে জিতে নিতে পারেন স্মার্টফোনসহ নানা আকর্ষণীয় পুরস্কার।\r\n\r\nসারা বাংলাদেশে ফ্রি ডেলিভারি তো থাকছেই। ফ্রি ডেলিভারি কুপন কোড \"FREEDELIVERY\"', 1000.00, 120.00, 0.00, 6, NULL, NULL, 'products/lsaL9G61jpeFpuvRLIakML0fZ471cYV9iEgRKtEM.jpg', 4, 5, 'draft', 0, 0, 0, 0, NULL, NULL, NULL, '2026-08-19 03:50:42', '2026-08-19 03:50:55'),
(5, 2, 'Organic Coconut Oil - 200 ml', 'organic-coconut-oil-200-ml', NULL, 'Organic Coconut Oil is Controls Hair Fall. In this Shera Bangla 64 Organic Coconut Oil 100% Pure, no other ingredients are used. It directly can be applied to hair and face. This bottle contains 180 ml oil. This Shera Bangla 64 Organic Coconut Oil can be used as DIY. You can be mixed it with any organic oils, as well as Directly can be applied.', 'Organic Coconut Oil is Controls Hair Fall. In this Shera Bangla 64 Organic Coconut Oil 100% Pure, no other ingredients are used. It directly can be applied to hair and face. This bottle contains 180 ml oil. This Shera Bangla 64 Organic Coconut Oil can be used as DIY. You can be mixed it with any organic oils, as well as Directly can be applied.\r\n\r\nHOW IT WORKS\r\nControls Hair Fall\r\nEncourages Hair Regrowth\r\nTreats Dandruff\r\nReduces Split Ends\r\nThickens Hair\r\nIs A Natural Conditioner\r\nDarkens Hair\r\nProtects Hair From Damage\r\nProvides Shiny Hair', 500.00, 500.00, 0.00, 5, NULL, NULL, 'products/gF5BjOW6QErrPd6I48oQ7G42WSXLRUjCVrIM7BwE.jpg', 1, 5, 'draft', 1, 1, 1, 0, NULL, NULL, NULL, '2026-08-19 03:52:07', '2026-08-22 23:26:53'),
(6, 2, 'Masala Combo', 'masala-combo', NULL, 'This is Asif', 'Not a product just the full Description', 500.00, 450.00, 0.00, 4, 1, 2, 'products/A1j4raOZ5iUkivlUH7Kmeq0f5npmEbTyqNukrqXb.jpg', 1, 5, 'draft', 1, 1, 1, 0, NULL, NULL, NULL, '2026-08-20 03:50:58', '2026-08-22 04:10:55'),
(7, 2, 'Balachaw - 80 gm -(Chattogram)', 'balachaw-80-gm-chattogram', NULL, 'উন্নত মানের এবং কাস্টম ইনগ্র্যাডিয়েন্ট দিয়ে প্রস্তুত ক্রিসপি বালাচাও এখন আপনার হাতের মুঠোয়। স্পেশাল কায়দায় বানানো বালাচাও এর স্বাদ অতুলনীয়। মাসালা, অনিওন এবং গার্লিক চিপসের অতুলনীয় কম্বিনেশন।', 'উন্নত মানের এবং কাস্টম ইনগ্র্যাডিয়েন্ট দিয়ে প্রস্তুত ক্রিসপি বালাচাও এখন আপনার হাতের মুঠোয়। স্পেশাল কায়দায় বানানো বালাচাও এর স্বাদ অতুলনীয়। মাসালা, অনিওন এবং গার্লিক চিপসের অতুলনীয় কম্বিনেশন।\r\n\r\nবালাচাও হচ্ছে এক প্রকার রেডি টু ইট ফুড। অনেকে সেটাকে ভর্তা বলে থাকে। যা মুলত চিংড়ি, পেয়াজ , রসুন,শুকনো মরিচ ও মশলার একটি মিশ্রণ। এটা ছোট থেকে বড় সবাই পছন্দ করে। এতে কোন প্রকার রান্নার ঝামেলা থাকে না। চিংড়ি শুটকি দিয়ে তৈরি করা ভাজা ভাজা এই আইটেমটি গরম গরম ভাতের সাথে খেতে দারুণ লাগে। স্বাদ বাড়ানোর জন্য ধনেপাতা কুচি,পুদিনাপাতা কুচি,কাচাঁমরিচ কুচি,খাঁটি সরিষার তেল এড করতে পারেন।\r\n\r\nআগেই বলেছি বালাচাও মুলত চট্টগ্রাম কক্সবাজারের একটি জনপ্রিয় খাবার। কিন্তু আমাদের দেশের চেয়ে বাইরে প্রচলন বেশি। দেশের খাবার দেশের মানুষেরা না খেলে কি করে হয় বলুন তো? যদি কেউ অন্তত একবার ও না খেয়ে থাকেন, তবে আজই ট্রাই করে দেখতে পারেন। এতোটাই স্বাদের বালাচাও না খেলে পরে আফসোস করবেন।', 150.00, 125.00, 0.00, 2, 1, NULL, 'products/Os6DscwzneNQ3vH0zfgkbKeQex9MQsEc88Njt6BV.jpg', 0, 5, 'draft', 1, 1, 1, 0, NULL, NULL, NULL, '2026-08-22 04:19:28', '2026-08-22 04:19:28'),
(8, 2, 'Biroi Rice - 1 kg - (Sunamganj)', 'biroi-rice-1-kg-sunamganj', NULL, 'সুনামগঞ্জের বিরই চালঃ\r\n\r\nবিরই চাল, নাম শুনলেই প্রাণ যেন জুড়িয়ে যায়। ছোটবেলায় গ্রামে গেলে কখনো এটা দিয়ে ক্ষীর কিংবা খিচুড়ি খেয়েছেন? খুব স্বাদের হয় কিন্তু। আর এর ভাত দিয়ে ভাজা বোয়াল মাছও খেতে অনেক মজা ।', 'সুনামগঞ্জের বিরই চালঃ\r\n\r\nবিরই চাল, নাম শুনলেই প্রাণ যেন জুড়িয়ে যায়। ছোটবেলায় গ্রামে গেলে কখনো এটা দিয়ে ক্ষীর কিংবা খিচুড়ি খেয়েছেন? খুব স্বাদের হয় কিন্তু। আর এর ভাত দিয়ে ভাজা বোয়াল মাছও খেতে অনেক মজা ।\r\n\r\nবিরই চাল কেন খাবেন ?\r\n\r\nনাজিরশাল চালের মতো চিকন ও বাদামি রঙের বিরই চাল সাদা চাল থেকে অনেক কম প্রসেসড। তাই স্বাস্থ্যের জন্য অত্যন্ত উপকারী ও গুরুত্ত্বপূর্ণ উপাদান সমৃদ্ধ। বিরই চাল এ সেসমস্ত ভিটামিন, মিনারেলস ও পুষ্টিগুণ থাকে যা সাদা চাল এ অনুপস্থিত থাকে।\r\n\r\nবিরই চালের গুনাগুনঃ (১) হোল গ্রেইন হিসেবে সর্বোচ্চ পুষ্টিমান সম্পন্ন (২) শর্করার পরিমান কম এবং প্রচুর ফাইবার সমৃদ্ধ যা ওজন হ্রাসে সহায়তা করে (৩) খনিজ ও ভিটামিন বি কমপ্লেক্স প্রচুর পরিমানে রয়েছে (৪) প্রাকৃতিক ফ্যাট এবং অ্যান্টিঅক্সিড্যান্টও রয়েছে। (৫) ইনসুলিন সংবেদনশীলতা বৃদ্ধিতে সহায়তা করে।', 100.00, 90.00, 0.00, 4, NULL, NULL, 'products/A4ohhOaC5Cfxjzsy358lsG8UZSepPi4vVUQpG63c.jpg', 0, 5, 'draft', 0, 1, 1, 0, NULL, NULL, NULL, '2026-08-22 04:20:41', '2026-08-22 04:20:41'),
(9, 2, 'Chili Powder (Sweet) - 200 gm - (Hathazari)', 'chili-powder-sweet-200-gm-hathazari', NULL, 'হাটহাজারীর মিষ্টি মরিচ গুড়াঃ\r\n\r\nদক্ষিণ এশিয়ার একমাত্র প্রাকৃতিক মৎস্য প্রজনন ক্ষেত্র হালদা নদীর অববাহিকায় চাষ হয় এই মরিচ, তাই এই মরিচ \'হালদা মরিচ\' নামে পরিচিত। এই হালদা মরিচের বিশেষ গুণ হলো এটি হালকা মিষ্টি। যারা ঝাল কম খান তারা এই মরিচ কেনার জন্য সারা বছর অপেক্ষায় থাকেন। হাটহাজারীর মিষ্টি মরিচের খ্যাতি এখন দেশ ছাড়িয়ে ছড়িয়ে পড়েছে বিদেশেও। মধ্যপ্রাচ্যের বিভিন্ন দেশে রফতানি হচ্ছে হাটহাজারীর ঐতিহ্যবাহী মিষ্টি মরিচ।', 'হাটহাজারীর মিষ্টি মরিচ গুড়াঃ\r\n\r\nদক্ষিণ এশিয়ার একমাত্র প্রাকৃতিক মৎস্য প্রজনন ক্ষেত্র হালদা নদীর অববাহিকায় চাষ হয় এই মরিচ, তাই এই মরিচ \'হালদা মরিচ\' নামে পরিচিত। এই হালদা মরিচের বিশেষ গুণ হলো এটি হালকা মিষ্টি। যারা ঝাল কম খান তারা এই মরিচ কেনার জন্য সারা বছর অপেক্ষায় থাকেন। হাটহাজারীর মিষ্টি মরিচের খ্যাতি এখন দেশ ছাড়িয়ে ছড়িয়ে পড়েছে বিদেশেও। মধ্যপ্রাচ্যের বিভিন্ন দেশে রফতানি হচ্ছে হাটহাজারীর ঐতিহ্যবাহী মিষ্টি মরিচ।\r\n\r\nহাটহাজারীর মরিচ দিয়ে রান্না করা তরকারি অত্যন্ত সুস্বাদু বলে গোটা দেশে এই মরিচের নামডাক আছে। হাটহাজারীর মরিচ ব্রিটিশ আমল থেকে গৃহিণী ও রন্ধন শিল্পীদের কাছে জনপ্রিয়।', 200.00, NULL, 0.00, 6, NULL, NULL, 'products/DPMSIVrlRFFCofJTODUmfQlpdqR96VjavDgyt6ha.jpg', 0, 5, 'draft', 1, 1, 1, 0, NULL, NULL, NULL, '2026-08-22 04:21:50', '2026-08-22 04:21:50'),
(10, 2, 'Chinigura Rice - 1 kg - (Dinajpur)', 'chinigura-rice-1-kg-dinajpur', NULL, 'দিনাজপুরের চিনিগুড়া চালঃ \r\n\r\nসুগন্ধি ধান/চাল উৎপাদনে দিনাজপুর জেলা অপ্রতিদ্বন্দ্বী। এ জেলায় নানাজাতের সুগন্ধি ধান জন্মে। তন্মধ্যে ব্রিধান-৩৪, জিরা কাটারী (চিনি গুঁড়া), জটা কাটারী, চিনি কাটারী, বেগুন বিচি ও ব্রিধান-৫০ উল্লেখযোগ্য।', 'দিনাজপুরের চিনিগুড়া চালঃ \r\n\r\nসুগন্ধি ধান/চাল উৎপাদনে দিনাজপুর জেলা অপ্রতিদ্বন্দ্বী। এ জেলায় নানাজাতের সুগন্ধি ধান জন্মে। তন্মধ্যে ব্রিধান-৩৪, জিরা কাটারী (চিনি গুঁড়া), জটা কাটারী, চিনি কাটারী, বেগুন বিচি ও ব্রিধান-৫০ উল্লেখযোগ্য।\r\n\r\nদিনাজপুর জেলার চিনিগুঁড়া জাতের ধান থেকে সুগন্ধি চাল পাওয়া যায়। অগ্রহায়ণ বা নভেম্বর মাসে এর ধান কাটা হয়ে থাকে। প্রক্রিয়াজাতের পর ডিসেম্বর মাসের শুরুতে চিনিগুঁড়া চাল বাজারে আসে। নতুন অবস্থায় এই চালে বেশ সুগন্ধ থাকে। তবে যত পুরোনো হতে থাকে, এর ঘ্রাণের মাত্রা কমতে থাকে।', 200.00, 170.00, 0.00, 1, NULL, NULL, 'products/U1aXLeht0FpAMNZuSZtKNS3FFOE7OtSyin2cKqWf.jpg', 50, 5, 'draft', 0, 0, 0, 0, NULL, NULL, NULL, '2026-08-22 04:24:12', '2026-08-22 04:24:12'),
(11, 2, 'Garlic Pickle - 400 gm - (Narayanganj)', 'garlic-pickle-400-gm-narayanganj', NULL, 'কাঁচা রসুন খেতে কষ্ট হয়?\r\n\r\nনিশ্চিন্তে খান এর আচার, উপকার পাবেন!\r\nরসুনের আচার স্বাদে যেমন লোভনীয়, উপকারিতাও অনেক।অ্যান্টিঅক্সিডেন্ট, অ্যান্টি-ব্যাকটেরিয়াল, অ্যান্টি-ভাইরাল এবং অ্যান্টিফাঙ্গাল বৈশিষ্ট্যে সমৃদ্ধ এই রসুনের আচার।', 'কাঁচা রসুন খেতে কষ্ট হয়?\r\n\r\nনিশ্চিন্তে খান এর আচার, উপকার পাবেন!\r\nরসুনের আচার স্বাদে যেমন লোভনীয়, উপকারিতাও অনেক।অ্যান্টিঅক্সিডেন্ট, অ্যান্টি-ব্যাকটেরিয়াল, অ্যান্টি-ভাইরাল এবং অ্যান্টিফাঙ্গাল বৈশিষ্ট্যে সমৃদ্ধ এই রসুনের আচার।\r\n\r\nরসুনের আচার উকারিতাঃ \r\n\r\n*  উচ্চ রক্তচাপের সমস্যা দূর করে। সেই সঙ্গে যক্ষ্মা রোগের হাত থেকে রক্ষা করে।\r\n\r\n* দেশি রসুনের আচার খেলে হজমশক্তি বাড়ায় ও কোষ্ঠকাঠিন্যের সমস্যা দূর করে। পাশাপাশি পরিপাকতন্ত্রের নানা সমস্যা দূর করে।\r\n\r\n* স্তন ক্যান্সার হওয়ার সম্ভাবনা কমায়। ডায়বেটিস নিয়ন্ত্রণে সহায়তা করে।\r\n\r\n* দেশি রসুনের আচার খেলে যায় রোগ প্রতিরোধ ক্ষমতা বাড়ানোর পাশাপাশি অ্যালিসিনের প্রাথমিক উপকারিতা হল ক্যান্সার রুখে দেওয়া।\r\n\r\n* চোখে ছানি পড়ার হাত থেকে রক্ষা করে।৭) দাদ, খোস-পাঁচড়া ধরণের চর্মরোগের হাত থেকে রক্ষা করে। পাশাপাশি চামড়ায় ফোসকা পড়ার যন্ত্রণা থেকে মুক্তি দেয়। ত্বককে বুড়িয়ে যাওয়ার হাত থেকে রক্ষা করে। ব্রণ সমস্যা দূরে রাখে।', 350.00, NULL, 0.00, 3, NULL, NULL, 'products/qzmtNifSorTkpJELZDweSECAtCCzOf4SY3F81lc1.png', 0, 5, 'draft', 0, 1, 1, 0, NULL, NULL, NULL, '2026-08-22 04:25:29', '2026-08-22 23:11:31'),
(12, 2, 'Ghee - 170 gm - (Pabna)', 'ghee-170-gm-pabna', NULL, 'পাবনার ঘিঃ \r\n\r\n\r\nপদ্মার ইলিশ আর পাবনার ঘি নতুন জামাইয়ের পাতে দিলে আর লাগে কি?’ ঘি নিয়ে এ প্রবাদ শুধু পাবনাই নয়, দেশের অনেক এলাকাতেই প্রচলিত। আর এই সোনার বাংলাদেশে পাবনা বিখ্যাত হলো খাঁটি ঘি এর জন্য। যান্ত্রিক শহরে আমরা নির্ভেজাল খাবারের স্বাদ প্রায় একদম ভুলতেই বসেছি। তাই আপনাদের জন্য আমরা ঘরে বসেই অনলাইনের মাধ্যমে দিচ্ছি খাঁটি ঘি এর নিশ্চয়তা।', 'পাবনার ঘিঃ \r\n\r\n\r\nপদ্মার ইলিশ আর পাবনার ঘি নতুন জামাইয়ের পাতে দিলে আর লাগে কি?’ ঘি নিয়ে এ প্রবাদ শুধু পাবনাই নয়, দেশের অনেক এলাকাতেই প্রচলিত। আর এই সোনার বাংলাদেশে পাবনা বিখ্যাত হলো খাঁটি ঘি এর জন্য। যান্ত্রিক শহরে আমরা নির্ভেজাল খাবারের স্বাদ প্রায় একদম ভুলতেই বসেছি। তাই আপনাদের জন্য আমরা ঘরে বসেই অনলাইনের মাধ্যমে দিচ্ছি খাঁটি ঘি এর নিশ্চয়তা।\r\n\r\nভেজালযুক্ত ঘি কীভাবে চিনবেন:\r\n\r\nআগেকার দিনে শীতের সকালে গরম ভাত আর খানিকটা ঘি একত্রে মিশিয়ে খাওয়া হতো। কিন্তু সেই দৃশ্য আজ বিরল। আগের দিনে ভেজাল ও ছিলো না তাই মানুষ খেতো ও প্রচুর। এখন তো সেই খাঁটি ঘি পাওয়াই দুষ্কর। ভেজাল ঘি খেয়ে মানুষের শারীরিক ক্ষতি হওয়ার সম্ভাবনা বেড়ে যাওয়ার ফলে মানুষ এখন ঘি জাতীয় খাদ্য খাওয়াও বন্ধ করে দিয়েছে। ঘিতে ভেজাল আছে আর কোনটাতে নেই, সেটা বোঝাও আমাদের জন্য এখন মুশকিল হয়ে গেছে। এখন সহজেই জানতে পারবেন ঘি খাঁটি না ভ্যাজাল? ঘি এর জারটা হাতে নিন। কেমন দেখতে পাচ্ছেন? জারের নিচের অংশে ঘি এর লেয়ার এবং উপরের দিকে তৈলাক্ত আবরণের লিকুইড। তাইনা? এর কারণ হচ্ছে এটা আসল ঘি না, এটা হচ্ছে এক ধরণের ‪‎বাটার ওয়েল ; অথচ তা বাজারে অনায়াসে বিক্রি করা হচ্ছে ঘি এর নামে। মানুষ প্রতারিত হচ্ছে না বুঝে।\r\n\r\nখাঁটি ঘিঃ\r\n\r\nখাঁটি ঘি এখনও পাওয়া সম্ভব, এবং তা কিনতে পারবেন অনলাইনে। ঘরে বসে অনলাইনে সেরা বাংলা ৬৪ এর মাধ্যমে অর্ডার করতে পারবেন ভালো মানের ঘি। এই ভেজালপূর্ন বাজারেও আমরাই দিচ্ছি খাঁটি ঘি, এবং তা পাবেন একমাত্র সেরা বাংলা ৬৪ এ।', 300.00, 260.00, 0.00, 5, NULL, NULL, 'products/4uErkBgUGuNK5QL9m637IrcVWgmKFahrBQyzDosj.png', 10, 5, 'draft', 0, 1, 1, 0, NULL, NULL, NULL, '2026-08-22 04:26:31', '2026-08-22 23:09:27'),
(13, 2, 'Ghee Combo', 'ghee-combo-1', NULL, 'মাত্র ১০০০ টাকায় পাবনার খাঁটি গাওয়া ঘি', 'মাত্র ১০০০ টাকায় পাবনার খাঁটি গাওয়া ঘি এর কম্বো অফার টি অর্ডার করে জিতে নিতে পারেন স্মার্টফোনসহ নানা আকর্ষণীয় পুরস্কার।\r\n\r\nসারা বাংলাদেশে ফ্রি ডেলিভারি তো থাকছেই। ফ্রি ডেলিভারি কুপন কোড \"FREEDELIVERY\"', 1000.00, NULL, 0.00, 2, NULL, NULL, 'products/iklZ4nyNWKsqUkSiya0QFNABXtFihxLjESIJzkOM.jpg', 10, 5, 'draft', 1, 0, 1, 0, NULL, NULL, NULL, '2026-08-22 04:27:30', '2026-08-22 04:27:30'),
(14, 2, 'Kalijira Rice - 1 kg - (Sunamganj)', 'kalijira-rice-1-kg-sunamganj', NULL, 'সুনামগঞ্জের কালোজিরা চালঃ\r\n\r\nআমাদের সোনার বাংলাদেশের কালোজিরা ধান থেকে উৎপাদিত কালোজিরা চাল পোলাও রান্নায় বেশী ব্যবহার করা হয়।', 'সুনামগঞ্জের কালোজিরা চালঃ\r\n\r\nআমাদের সোনার বাংলাদেশের কালোজিরা ধান থেকে উৎপাদিত কালোজিরা চাল পোলাও রান্নায় বেশী ব্যবহার করা হয়। স্বাদে-গন্ধে ভরা কালোজিরা চাল ছোট বাসমতী নামেও পরিচিত। মজার ব্যাপার হল এই চালে ভাত রান্নাও হয় যা ঝড়ঝড়ে, আঠালো নয়। নতুন অতিথিদের কালোজিরা চালের তৈরী পোলাও বা ভাত দিয়ে আপ্যায়ন করা গ্রাম বাঙলার প্রাচীন রীতি। সুস্বাদু এ চাল ফুটিয়ে পোলাও বা ভাতের সাথে আরও তৈরি হয় বিরিয়ানি, পায়েস, ফিরনি, জর্দাসহ মুখরোচক নানা খাবার। আপনার অতিথিদের সর্বোচ্চ আপ্যায়নের জন্য ব্যবহার করুন আমাদের নিজস্ব তদারকিতে উৎপাদিত সুনামগঞ্জের বিখ্যাত কালোজিরা চাল।', 170.00, NULL, 0.00, 1, NULL, NULL, 'products/THVkjpLO8yxEWDr8r7J4RTmkJWzZjWPhCDbLVtky.png', 20, 5, 'published', 1, 1, 0, 0, NULL, NULL, '2026-08-22 04:28:37', '2026-08-22 04:28:37', '2026-08-22 23:06:36'),
(15, 2, 'Mustard Oil - 1 Liter - (Gaibandha)', 'mustard-oil-1-liter-gaibandha', NULL, 'গাইবান্ধার সরিষার তেলঃ\r\n\r\nআপনি জানেন কি, ভেজাল সরিষার তেল বাজার দখল করায় কলু সম্প্রদায় প্রায় বিলু্িপ্তর পথে।', 'গাইবান্ধার সরিষার তেলঃ\r\n\r\nআপনি জানেন কি, ভেজাল সরিষার তেল বাজার দখল করায় কলু সম্প্রদায় প্রায় বিলু্িপ্তর পথে। কাঠের ঘানিতে খুলু(কলু) সম্প্রদায় দিন-রাত পরিশ্রম করে খাঁটি সরিষার তেল উৎপাদন করেন, কিন্তু তা কম দামী ভেজাল সরিষার তেলের সাথে পাল্লা দিতে না পেরে হারিয়ে যাচ্ছে আজ। সেরা বাংলা ৬৪ সরাসরি কলু সম্প্রদায়ের কাছ থেকে নিয়ে এসেছে সেই খাঁটি ও সেরা স্বাদ সম্পন্ন সেই তেল শুধুই আপনার জন্য।', 320.00, NULL, 0.00, 1, NULL, NULL, 'products/JRrrgSgYF0tlVcrPuLPs2aNvnV4xonRAWptlIxxX.png', 20, 5, 'draft', 1, 0, 1, 0, NULL, NULL, NULL, '2026-08-22 04:29:43', '2026-08-22 22:56:05'),
(16, 2, 'Mustard Oil - 5 Liter - (Gaibandha)', 'mustard-oil-5-liter-gaibandha', NULL, 'গাইবান্ধার সরিষার তেলঃ\r\n\r\nআপনি জানেন কি, ভেজাল সরিষার তেল বাজার দখল করায় কলু সম্প্রদায় প্রায় বিলু্িপ্তর পথে।', 'গাইবান্ধার সরিষার তেলঃ\r\n\r\nআপনি জানেন কি, ভেজাল সরিষার তেল বাজার দখল করায় কলু সম্প্রদায় প্রায় বিলু্িপ্তর পথে। কাঠের ঘানিতে খুলু(কলু) সম্প্রদায় দিন-রাত পরিশ্রম করে খাঁটি সরিষার তেল উৎপাদন করেন, কিন্তু তা কম দামী ভেজাল সরিষার তেলের সাথে পাল্লা দিতে না পেরে হারিয়ে যাচ্ছে আজ। সেরা বাংলা ৬৪ সরাসরি কলু সম্প্রদায়ের কাছ থেকে নিয়ে এসেছে সেই খাঁটি ও সেরা স্বাদ সম্পন্ন সেই তেল শুধুই আপনার জন্য।', 1550.00, NULL, 0.00, 1, NULL, NULL, 'products/gTYyJ0gZTFjvHhMdbRy3cpikEAfuGwqJdKl8gBxa.png', 20, 5, 'draft', 1, 1, 0, 0, NULL, NULL, NULL, '2026-08-22 04:30:43', '2026-08-22 22:24:19'),
(17, 2, 'Olive Pickle - 400 - gm (Narayanganj)', 'olive-pickle-400-gm-narayanganj', '2', 'জলপাই টক জাতীয় ফল, জলপাইয়ের আচার অনেক জনপ্রিয়। জলপাইয়ের আচার খাবারের স্বাদ বাড়িয়ে তোলে।', 'জলপাই টক জাতীয় ফল, জলপাইয়ের আচার অনেক জনপ্রিয়। জলপাইয়ের আচার খাবারের স্বাদ বাড়িয়ে তোলে। শীতকালীন এই ফলটি অনেকের কাছেই প্রিয়, বিশেষ করে এর আচার। তবে কাঁচা জলপাইয়ের অনেক উপকারিতা রয়েছে। এর সাথে আচারের উপকার রয়েছে যেগুলো অনেকেরই অজানা। জলপাইয়ের পুষ্টিগুণ আমাদের শরীরের জন্য কতটা উপকারী তা আজকের এই পোস্টে তুলে ধরব। জলপাই একটি পুষ্টিকর ফল যা আমাদের শরীর-স্বাস্থ্য ভালো রাখতে সাহায্য করে। পেটে সমস্যা, বদ-হজম দূর করার পাশাপাশি ঔষধি হিসেবেও কাজ করে।', 250.00, NULL, 0.00, 6, NULL, NULL, 'products/b0269iYgBfhxsUi0BEHSdE9yIfV8au8Swy3W6wJX.png', 10, 5, 'draft', 1, 1, 1, 0, NULL, NULL, NULL, '2026-08-22 04:32:24', '2026-09-05 22:44:48'),
(18, 2, 'ffff', 'ffff', NULL, 'fffff', '<p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\"><b>পাবনার ঘিঃ&nbsp;</b></p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\">পদ্মার ইলিশ আর পাবনার ঘি নতুন জামাইয়ের পাতে দিলে আর লাগে কি?’ ঘি নিয়ে এ প্রবাদ শুধু পাবনাই নয়, দেশের অনেক এলাকাতেই প্রচলিত। আর এই সোনার বাংলাদেশে পাবনা বিখ্যাত হলো খাঁটি ঘি এর জন্য। যান্ত্রিক শহরে আমরা নির্ভেজাল খাবারের স্বাদ প্রায় একদম ভুলতেই বসেছি। তাই আপনাদের জন্য আমরা ঘরে বসেই অনলাইনের মাধ্যমে দিচ্ছি খাঁটি ঘি এর নিশ্চয়তা।</p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\"><b>ভেজালযুক্ত ঘি কীভাবে চিনবেন:</b></p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\">আগেকার দিনে শীতের সকালে গরম ভাত আর খানিকটা ঘি একত্রে মিশিয়ে খাওয়া হতো। কিন্তু সেই দৃশ্য আজ বিরল। আগের দিনে ভেজাল ও ছিলো না তাই মানুষ খেতো ও প্রচুর। এখন তো সেই খাঁটি ঘি পাওয়াই দুষ্কর। ভেজাল ঘি খেয়ে মানুষের শারীরিক ক্ষতি হওয়ার সম্ভাবনা বেড়ে যাওয়ার ফলে মানুষ এখন ঘি জাতীয় খাদ্য খাওয়াও বন্ধ করে দিয়েছে। ঘিতে ভেজাল আছে আর কোনটাতে নেই, সেটা বোঝাও আমাদের জন্য এখন মুশকিল হয়ে গেছে। এখন সহজেই জানতে পারবেন ঘি খাঁটি না ভ্যাজাল? ঘি এর জারটা হাতে নিন। কেমন দেখতে পাচ্ছেন? জারের নিচের অংশে ঘি এর লেয়ার এবং উপরের দিকে তৈলাক্ত আবরণের লিকুইড। তাইনা? এর কারণ হচ্ছে এটা আসল ঘি না, এটা হচ্ছে এক ধরণের ‪‎বাটার ওয়েল ; অথচ তা বাজারে অনায়াসে বিক্রি করা হচ্ছে ঘি এর নামে। মানুষ প্রতারিত হচ্ছে না বুঝে।</p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\"><b>খাঁটি ঘিঃ</b></p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\">খাঁটি ঘি এখনও পাওয়া সম্ভব, এবং তা কিনতে পারবেন অনলাইনে। ঘরে বসে অনলাইনে সেরা বাংলা ৬৪ এর মাধ্যমে অর্ডার করতে পারবেন ভালো মানের ঘি। এই ভেজালপূর্ন বাজারেও আমরাই দিচ্ছি খাঁটি ঘি, এবং তা পাবেন একমাত্র সেরা বাংলা ৬৪ এ।</p>', 100.00, 90.00, 10.00, 3, 1, 1, 'products/xfPxzWqhjgJO9OE32FGI3zLX146LrXMD3TDFzXTL.png', 5, 5, 'published', 0, 1, 0, 0, NULL, NULL, '2026-08-29 04:26:44', '2026-08-29 00:10:41', '2026-08-29 05:42:42'),
(19, 2, 'test1222', 'test1222', NULL, 'tyyytty', '<p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\"><b>পাবনার ঘিঃ&nbsp;</b></p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\">পদ্মার ইলিশ আর পাবনার ঘি নতুন জামাইয়ের পাতে দিলে আর লাগে কি?’ ঘি নিয়ে এ প্রবাদ শুধু পাবনাই নয়, দেশের অনেক এলাকাতেই প্রচলিত। আর এই সোনার বাংলাদেশে পাবনা বিখ্যাত হলো খাঁটি ঘি এর জন্য। যান্ত্রিক শহরে আমরা নির্ভেজাল খাবারের স্বাদ প্রায় একদম ভুলতেই বসেছি। তাই আপনাদের জন্য আমরা ঘরে বসেই অনলাইনের মাধ্যমে দিচ্ছি খাঁটি ঘি এর নিশ্চয়তা।</p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\"><b>ভেজালযুক্ত ঘি কীভাবে চিনবেন:</b></p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\">আগেকার দিনে শীতের সকালে গরম ভাত আর খানিকটা ঘি একত্রে মিশিয়ে খাওয়া হতো। কিন্তু সেই দৃশ্য আজ বিরল। আগের দিনে ভেজাল ও ছিলো না তাই মানুষ খেতো ও প্রচুর। এখন তো সেই খাঁটি ঘি পাওয়াই দুষ্কর। ভেজাল ঘি খেয়ে মানুষের শারীরিক ক্ষতি হওয়ার সম্ভাবনা বেড়ে যাওয়ার ফলে মানুষ এখন ঘি জাতীয় খাদ্য খাওয়াও বন্ধ করে দিয়েছে। ঘিতে ভেজাল আছে আর কোনটাতে নেই, সেটা বোঝাও আমাদের জন্য এখন মুশকিল হয়ে গেছে। এখন সহজেই জানতে পারবেন ঘি খাঁটি না ভ্যাজাল? ঘি এর জারটা হাতে নিন। কেমন দেখতে পাচ্ছেন? জারের নিচের অংশে ঘি এর লেয়ার এবং উপরের দিকে তৈলাক্ত আবরণের লিকুইড। তাইনা? এর কারণ হচ্ছে এটা আসল ঘি না, এটা হচ্ছে এক ধরণের ‪‎বাটার ওয়েল ; অথচ তা বাজারে অনায়াসে বিক্রি করা হচ্ছে ঘি এর নামে। মানুষ প্রতারিত হচ্ছে না বুঝে।</p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\"><b>খাঁটি ঘিঃ</b></p><p style=\"margin: 0px 0px 10px; color: rgb(51, 51, 51); font-family: Ubuntu, sans-serif; font-size: 14px;\">খাঁটি ঘি এখনও পাওয়া সম্ভব, এবং তা কিনতে পারবেন অনলাইনে। ঘরে বসে অনলাইনে সেরা বাংলা ৬৪ এর মাধ্যমে অর্ডার করতে পারবেন ভালো মানের ঘি। এই ভেজালপূর্ন বাজারেও আমরাই দিচ্ছি খাঁটি ঘি, এবং তা পাবেন একমাত্র সেরা বাংলা ৬৪ এ।</p>', 100.00, 90.00, 10.00, 3, 1, 1, 'products/atfSLyQk2iJCzPn8wD6KgXf5POugz5RTdjLfKq1J.webp', 5, 5, 'published', 0, 1, 0, 0, NULL, NULL, '2026-08-29 04:41:19', '2026-08-29 04:41:19', '2026-08-29 05:42:20'),
(20, 2, 'test-all', 'test-all', NULL, 'test-all', '<p>test-all</p>', 200.00, 180.00, 10.00, 3, 1, 1, 'products/4aSw9tg2NkgcYfiMEOuNHNs92AUfgHWDTuBdTKIT.png', 10, 5, 'published', 0, 1, 0, 0, NULL, NULL, '2026-08-29 05:49:38', '2026-08-29 05:49:38', '2026-08-29 05:49:38'),
(21, 2, 'test data22', 'test-data22', NULL, 'kijhkjk', '<p><span style=\"font-weight: 700;\">Full Description</span></p>', 300.00, 270.00, 10.00, 3, 1, 1, 'products/P8H4f0ZazDbbWcUo37HngCFyI3zjtTObnV1knBxZ.webp', 100, 5, 'published', 0, 1, 0, 0, NULL, NULL, '2026-08-29 05:50:41', '2026-08-29 05:50:41', '2026-08-29 05:50:41'),
(22, 2, 'hgfhh', 'hgfhh', NULL, 'hhghgfhhgfhhg', '<p>gfhgfhhgfhfghh</p>', 400.00, 360.00, 10.00, 3, 1, 1, 'products/qE8Iub0eDV16xqfEfJEIPTP9iCbOSIcly1L3CXdA.jpg', 51, 5, 'published', 0, 1, 0, 0, NULL, NULL, '2026-08-29 05:51:36', '2026-08-29 05:51:36', '2026-08-29 05:51:36'),
(23, 2, 'testkk', 'testkk', NULL, 'kklkl', '<p>klklklkj</p>', 500.00, 450.00, 10.00, 3, 1, 1, 'products/klF9ZUOM0yy1f60TnlFUSa6nV5fMQvbztyYT1XSL.png', 80, 5, 'published', 0, 1, 0, 0, NULL, NULL, '2026-08-29 05:52:26', '2026-08-29 05:52:26', '2026-08-29 05:52:26'),
(24, 2, 'test-ghghg', 'test-ghghg', NULL, 'hghgfhgf', '<p>ghhgfhgfhg</p>', 300.00, 270.00, 10.00, 3, 1, 1, 'products/riSZD2lESoH1DvZ971D9UMnzwN495c588dMxsX7d.jpg', 100, 5, 'published', 0, 1, 0, 0, NULL, NULL, '2026-08-29 05:53:26', '2026-08-29 05:53:26', '2026-08-29 05:53:26'),
(25, 2, 'test data', 'test-data', NULL, 'jjhgjh', '<p>jhgjj</p>', 100.00, 80.00, 20.00, 3, 1, 1, 'products/3VXoxfXJ0HbbCuNb7lkHhSwoibUiOJgjHNbeVZDg.webp', 30, 5, 'published', 0, 1, 0, 0, NULL, NULL, '2026-08-29 05:54:16', '2026-08-29 05:54:16', '2026-08-29 05:54:16'),
(26, 2, 'jjhjgjhgj', 'jjhjgjhgj', '03713136', 'jhgjhgjh', '<p>jhgjhjhj</p>', 400.00, 400.00, 0.00, 3, NULL, 1, 'products/yRxoI2syl0upsNJYJB2lBntQcxlvGsxRKn3tMIJ0.webp', 50, 5, 'published', 0, 1, 0, 0, NULL, NULL, '2026-08-29 05:55:13', '2026-08-29 05:55:13', '2026-09-03 02:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `live_link` varchar(255) NOT NULL,
  `github_link` varchar(255) NOT NULL,
  `technlogies` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, 1, '2026-08-11 04:29:13', '2026-08-11 04:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
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
('blRJuYQ4I5VQjXkxMptQ3BSll2nFiK8s1bwLKLBb', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidGI5b2lDN2dZUER0WG1vTEFvN1VtYWlOc3hES05xOWVON2daU1plTiI7czoxNToiY2FydF9zZXNzaW9uX2lkIjtzOjM2OiI1NGQ1N2E2OS04OGM2LTQzMTktYjk1Yi1jYzdhNzRkMGMxMjkiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcHJvZHVjdHMvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRaTmxHYkNKLkhMazNvSW16TzgwNG5lVk9pYk1uZ1M2Lk1vV0NHVkM0dTFIdkZWSEFQeUNraSI7fQ==', 1788783220),
('JP1oSQVvrHDHMTaD9YJfeuyBJv34CBnctmS7Yk41', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.136.1 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOTFoUWY2clVxSzFWd0sxd1RWb2l6N3RndzdIaGdoNEFiTHhmdTFjSiI7czoxNToiY2FydF9zZXNzaW9uX2lkIjtzOjM2OiIzM2ZhNGE5ZC04NGVjLTQ4OGItODA0NS1lYWY0YjFlYzZkYzEiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1788838016),
('WnyFCWRZG1lNDjMRP3CSpkD4cnnoYdMr2UdehXhO', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQ1ZyTjdLZU92d3ZoaTJETnk1dkZOZWV4eVlXSENnRE9Sc1dZMkRNcyI7czoxNToiY2FydF9zZXNzaW9uX2lkIjtzOjM2OiJhNzJjYzBmMC1jZWUwLTQ2YzAtOTVmYS0zMmY3OGMzMDQ4NjEiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vb3JkZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRaTmxHYkNKLkhMazNvSW16TzgwNG5lVk9pYk1uZ1M2Lk1vV0NHVkM0dTFIdkZWSEFQeUNraSI7fQ==', 1788839973);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'string',
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `group`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'SheraBangla64', 'string', 'general', 0, '2026-08-21 22:23:45', '2026-08-23 03:47:59'),
(2, 'address', 'Dhaka, Bangladesh', 'text', 'general', 0, '2026-08-21 22:26:41', '2026-08-21 22:26:41'),
(3, 'email', 'info@example.com', 'string', 'general', 0, '2026-08-21 22:27:35', '2026-08-21 22:27:35'),
(4, 'secondary_email', 'support@example.com', 'string', 'general', 0, '2026-08-21 22:28:25', '2026-08-21 22:28:25'),
(5, 'phone_1', '+8801700000000', 'string', 'general', 0, '2026-08-21 22:29:17', '2026-08-22 23:05:29'),
(6, 'phone_2', '+8801800000000', 'string', 'general', 0, '2026-08-21 22:30:11', '2026-08-22 23:05:29'),
(7, 'whatsapp_number', '+8801900000000', 'string', 'general', 0, '2026-08-21 22:30:54', '2026-08-22 23:05:29'),
(8, 'logo', 'settings/z2aOW8sJWaPGTA6svgV1Xzhsi5DxhVgYcQ8K6NgO.png', 'image', 'general', 0, '2026-08-21 22:31:43', '2026-08-22 23:05:30'),
(9, 'favicon', 'settings/hocdhtYROK9hGF4B7jIed3MY9iuBRj5se17vt0Nt.png', 'image', 'general', 0, '2026-08-21 22:32:19', '2026-08-22 23:05:45'),
(10, 'og_image', 'settings/G7yT9xIfThW7SUI6ByzoYyhIoLYFNDAX2IRvXnij.png', 'image', 'general', 0, '2026-08-21 22:41:59', '2026-08-22 23:05:45'),
(11, 'copyright_text', 'All rights reserved.', 'text', 'general', 0, '2026-08-21 22:42:45', '2026-08-23 06:00:23'),
(12, 'facebook', 'https://facebook.com', 'url', 'social', 1, '2026-08-21 22:43:45', '2026-08-21 22:45:04'),
(13, 'instagram', 'https://instagram.com', 'url', 'social', 1, '2026-08-21 22:44:16', '2026-08-21 22:45:26'),
(14, 'whatsapp', 'https://wa.me/', 'url', 'social', 1, '2026-08-21 22:44:44', '2026-08-21 22:45:35'),
(15, 'messenger', 'https://m.me', 'url', 'social', 1, '2026-08-21 22:46:07', '2026-08-22 23:10:49'),
(16, 'tiktok', 'https://tiktok.com', 'url', 'social', 1, '2026-08-21 22:46:32', '2026-08-22 23:10:44'),
(17, 'twitter', 'https://twitter.com/', 'url', 'social', 1, '2026-08-21 22:46:58', '2026-08-22 23:10:44'),
(18, 'linkedin', 'https://linkedin.com/', 'url', 'social', 1, '2026-08-21 22:47:40', '2026-08-21 22:47:40'),
(19, 'sender_name', 'My Website', 'string', 'mail', 0, '2026-08-21 22:48:57', '2026-08-22 23:19:03'),
(20, 'sender_email', 'info@example.com', 'email', 'mail', 0, '2026-08-21 22:49:57', '2026-08-21 22:49:57'),
(21, 'recipient_email', 'admin@example.com', 'email', 'mail', 0, '2026-08-21 22:50:31', '2026-08-21 22:50:31'),
(22, 'mail_host', 'smtp.gmail.com', 'string', 'mail', 0, '2026-08-21 22:51:00', '2026-08-21 22:51:00'),
(23, 'smtp_username', 'example@gmail.com', 'string', 'mail', 0, '2026-08-21 22:51:26', '2026-08-21 22:51:26'),
(24, 'smtp_password', 'encrypted value', 'password', 'mail', 0, '2026-08-21 22:52:21', '2026-08-21 22:52:21'),
(25, 'mail_port', '587', 'integer', 'mail', 0, '2026-08-21 22:52:52', '2026-08-21 22:52:52'),
(26, 'mail_encryption', 'tls', 'string', 'mail', 0, '2026-08-21 22:53:20', '2026-08-21 22:53:20'),
(27, 'google_captcha_site_key', '25225566', 'string', 'integration', 0, '2026-08-21 22:53:51', '2026-08-21 22:53:51'),
(28, 'google_captcha_secret_key', '54656886', 'password', 'integration', 0, '2026-08-21 22:54:21', '2026-08-21 22:54:21'),
(29, 'google_tag_manager_header_code', '65466665', 'code', 'integration', 0, '2026-08-21 22:54:46', '2026-08-21 22:54:46'),
(30, 'google_tag_manager_body_code', '57575755', 'code', 'integration', 0, '2026-08-21 22:55:08', '2026-08-21 22:55:08'),
(31, 'facebook_pixel_code', '3545466', 'code', 'integration', 0, '2026-08-21 22:55:42', '2026-08-21 22:55:42'),
(32, 'tawk_chat_link', 'hghghhh/fjhhjj', 'url', 'integration', 0, '2026-08-21 22:56:26', '2026-08-21 22:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` varchar(255) NOT NULL DEFAULT 'main_slider',
  `image` varchar(255) NOT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `start_at` timestamp NULL DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `user_id`, `position`, `image`, `link_url`, `sort_order`, `is_active`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'main_slider', 'sliders/52Xjzs4YrKRBtRSb13dTL5gZDWid8b70EwajWJNF.png', NULL, 1, 1, NULL, NULL, '2026-08-26 23:27:14', '2026-08-26 23:58:41'),
(2, 2, 'main_slider', 'sliders/ltOXKSPh5BcMsgr8F6qIKLxjUoLkdsdZu1BQXsoz.png', NULL, 2, 1, NULL, NULL, '2026-08-26 23:34:59', '2026-08-26 23:39:34'),
(3, 2, 'side_top', 'sliders/sj6uZVPUyVjgsH1phnyqvoYxqhITfoAWx6sKSxyu.png', 'http://127.0.0.1:8000/product/test-product', 3, 1, NULL, NULL, '2026-08-26 23:35:33', '2026-08-26 23:59:21'),
(4, 2, 'side_bottom', 'sliders/TCSQ0oae5HoB8PlYh2WeFr46EiDzUGiURihKheNr.png', NULL, 4, 1, NULL, NULL, '2026-08-26 23:35:56', '2026-08-26 23:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `user_id`, `category_id`, `name`, `slug`, `description`, `image`, `sort_order`, `is_active`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'test data', 'subcategory-test-data', 'subcategory  test data', 'sub-categories/AcDo1rEFSZQiBdsV4sn0nYJl6t9KrmlXmIV5pFSm.jpg', 0, 1, 'subcategory  test', 'subcategory test', '2026-08-17 02:09:51', '2026-08-17 02:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `district_id` int(2) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `name`, `bn_name`, `district_id`, `code`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Debidwar', 'দেবিদ্বার', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(2, 'Barura', 'বরুড়া', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(3, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(4, 'Chandina', 'চান্দিনা', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(5, 'Chauddagram', 'চৌদ্দগ্রাম', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(6, 'Daudkandi', 'দাউদকান্দি', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(7, 'Homna', 'হোমনা', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(8, 'Laksam', 'লাকসাম', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(9, 'Muradnagar', 'মুরাদনগর', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(10, 'Nangalkot', 'নাঙ্গলকোট', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(11, 'Comilla Sadar', 'কুমিল্লা সদর', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(12, 'Meghna', 'মেঘনা', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(13, 'Monohargonj', 'মনোহরগঞ্জ', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(14, 'Sadarsouth', 'সদর দক্ষিণ', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(15, 'Titas', 'তিতাস', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(16, 'Burichang', 'বুড়িচং', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(17, 'Lalmai', 'লালমাই', 1, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(18, 'Chhagalnaiya', 'ছাগলনাইয়া', 2, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(19, 'Feni Sadar', 'ফেনী সদর', 2, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(20, 'Sonagazi', 'সোনাগাজী', 2, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(21, 'Fulgazi', 'ফুলগাজী', 2, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(22, 'Parshuram', 'পরশুরাম', 2, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(23, 'Daganbhuiyan', 'দাগনভূঞা', 2, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(24, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 3, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(25, 'Kasba', 'কসবা', 3, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(26, 'Nasirnagar', 'নাসিরনগর', 3, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(27, 'Sarail', 'সরাইল', 3, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(28, 'Ashuganj', 'আশুগঞ্জ', 3, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(29, 'Akhaura', 'আখাউড়া', 3, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(30, 'Nabinagar', 'নবীনগর', 3, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(31, 'Bancharampur', 'বাঞ্ছারামপুর', 3, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(32, 'Bijoynagar', 'বিজয়নগর', 3, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(33, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(34, 'Kaptai', 'কাপ্তাই', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(35, 'Kawkhali', 'কাউখালী', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(36, 'Baghaichari', 'বাঘাইছড়ি', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(37, 'Barkal', 'বরকল', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(38, 'Langadu', 'লংগদু', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(39, 'Rajasthali', 'রাজস্থলী', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(40, 'Belaichari', 'বিলাইছড়ি', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(41, 'Juraichari', 'জুরাছড়ি', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(42, 'Naniarchar', 'নানিয়ারচর', 4, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(43, 'Noakhali Sadar', 'নোয়াখালী সদর', 5, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(44, 'Companiganj', 'কোম্পানীগঞ্জ', 5, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(45, 'Begumganj', 'বেগমগঞ্জ', 5, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(46, 'Hatia', 'হাতিয়া', 5, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(47, 'Subarnachar', 'সুবর্ণচর', 5, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(48, 'Kabirhat', 'কবিরহাট', 5, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(49, 'Senbug', 'সেনবাগ', 5, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(50, 'Chatkhil', 'চাটখিল', 5, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(51, 'Sonaimori', 'সোনাইমুড়ী', 5, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(52, 'Haimchar', 'হাইমচর', 6, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(53, 'Kachua', 'কচুয়া', 6, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(54, 'Shahrasti', 'শাহরাস্তি	', 6, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(55, 'Chandpur Sadar', 'চাঁদপুর সদর', 6, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(56, 'Matlab South', 'মতলব দক্ষিণ', 6, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(57, 'Hajiganj', 'হাজীগঞ্জ', 6, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(58, 'Matlab North', 'মতলব উত্তর', 6, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(59, 'Faridgonj', 'ফরিদগঞ্জ', 6, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(60, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 7, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(61, 'Kamalnagar', 'কমলনগর', 7, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(62, 'Raipur', 'রায়পুর', 7, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(63, 'Ramgati', 'রামগতি', 7, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(64, 'Ramganj', 'রামগঞ্জ', 7, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(65, 'Rangunia', 'রাঙ্গুনিয়া', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(66, 'Sitakunda', 'সীতাকুন্ড', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(67, 'Mirsharai', 'মীরসরাই', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(68, 'Patiya', 'পটিয়া', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(69, 'Sandwip', 'সন্দ্বীপ', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(70, 'Banshkhali', 'বাঁশখালী', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(71, 'Boalkhali', 'বোয়ালখালী', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(72, 'Anwara', 'আনোয়ারা', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(73, 'Chandanaish', 'চন্দনাইশ', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(74, 'Satkania', 'সাতকানিয়া', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(75, 'Lohagara', 'লোহাগাড়া', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(76, 'Hathazari', 'হাটহাজারী', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(77, 'Fatikchhari', 'ফটিকছড়ি', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(78, 'Raozan', 'রাউজান', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(79, 'Karnafuli', 'কর্ণফুলী', 8, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(80, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 9, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(81, 'Chakaria', 'চকরিয়া', 9, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(82, 'Kutubdia', 'কুতুবদিয়া', 9, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(83, 'Ukhiya', 'উখিয়া', 9, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(84, 'Moheshkhali', 'মহেশখালী', 9, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(85, 'Pekua', 'পেকুয়া', 9, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(86, 'Ramu', 'রামু', 9, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(87, 'Teknaf', 'টেকনাফ', 9, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(88, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 10, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(89, 'Dighinala', 'দিঘীনালা', 10, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(90, 'Panchari', 'পানছড়ি', 10, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(91, 'Laxmichhari', 'লক্ষীছড়ি', 10, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(92, 'Mohalchari', 'মহালছড়ি', 10, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(93, 'Manikchari', 'মানিকছড়ি', 10, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(94, 'Ramgarh', 'রামগড়', 10, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(95, 'Matiranga', 'মাটিরাঙ্গা', 10, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(96, 'Guimara', 'গুইমারা', 10, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(97, 'Bandarban Sadar', 'বান্দরবান সদর', 11, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(98, 'Alikadam', 'আলীকদম', 11, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(99, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 11, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(100, 'Rowangchhari', 'রোয়াংছড়ি', 11, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(101, 'Lama', 'লামা', 11, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(102, 'Ruma', 'রুমা', 11, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(103, 'Thanchi', 'থানচি', 11, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(104, 'Belkuchi', 'বেলকুচি', 12, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(105, 'Chauhali', 'চৌহালি', 12, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(106, 'Kamarkhand', 'কামারখন্দ', 12, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(107, 'Kazipur', 'কাজীপুর', 12, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(108, 'Raigonj', 'রায়গঞ্জ', 12, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(109, 'Shahjadpur', 'শাহজাদপুর', 12, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(110, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 12, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(111, 'Tarash', 'তাড়াশ', 12, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(112, 'Ullapara', 'উল্লাপাড়া', 12, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(113, 'Sujanagar', 'সুজানগর', 13, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(114, 'Ishurdi', 'ঈশ্বরদী', 13, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(115, 'Bhangura', 'ভাঙ্গুড়া', 13, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(116, 'Pabna Sadar', 'পাবনা সদর', 13, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(117, 'Bera', 'বেড়া', 13, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(118, 'Atghoria', 'আটঘরিয়া', 13, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(119, 'Chatmohar', 'চাটমোহর', 13, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(120, 'Santhia', 'সাঁথিয়া', 13, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(121, 'Faridpur', 'ফরিদপুর', 13, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(122, 'Kahaloo', 'কাহালু', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(123, 'Bogra Sadar', 'বগুড়া সদর', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(124, 'Shariakandi', 'সারিয়াকান্দি', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(125, 'Shajahanpur', 'শাজাহানপুর', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(126, 'Dupchanchia', 'দুপচাচিঁয়া', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(127, 'Adamdighi', 'আদমদিঘি', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(128, 'Nondigram', 'নন্দিগ্রাম', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(129, 'Sonatala', 'সোনাতলা', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(130, 'Dhunot', 'ধুনট', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(131, 'Gabtali', 'গাবতলী', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(132, 'Sherpur', 'শেরপুর', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(133, 'Shibganj', 'শিবগঞ্জ', 14, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(134, 'Paba', 'পবা', 15, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(135, 'Durgapur', 'দুর্গাপুর', 15, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(136, 'Mohonpur', 'মোহনপুর', 15, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(137, 'Charghat', 'চারঘাট', 15, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(138, 'Puthia', 'পুঠিয়া', 15, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(139, 'Bagha', 'বাঘা', 15, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(140, 'Godagari', 'গোদাগাড়ী', 15, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(141, 'Tanore', 'তানোর', 15, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(142, 'Bagmara', 'বাগমারা', 15, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(143, 'Natore Sadar', 'নাটোর সদর', 16, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(144, 'Singra', 'সিংড়া', 16, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(145, 'Baraigram', 'বড়াইগ্রাম', 16, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(146, 'Bagatipara', 'বাগাতিপাড়া', 16, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(147, 'Lalpur', 'লালপুর', 16, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(148, 'Gurudaspur', 'গুরুদাসপুর', 16, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(149, 'Naldanga', 'নলডাঙ্গা', 16, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(150, 'Akkelpur', 'আক্কেলপুর', 17, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(151, 'Kalai', 'কালাই', 17, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(152, 'Khetlal', 'ক্ষেতলাল', 17, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(153, 'Panchbibi', 'পাঁচবিবি', 17, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(154, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 17, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(155, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 18, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(156, 'Gomostapur', 'গোমস্তাপুর', 18, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(157, 'Nachol', 'নাচোল', 18, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(158, 'Bholahat', 'ভোলাহাট', 18, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(159, 'Shibganj', 'শিবগঞ্জ', 18, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(160, 'Mohadevpur', 'মহাদেবপুর', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(161, 'Badalgachi', 'বদলগাছী', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(162, 'Patnitala', 'পত্নিতলা', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(163, 'Dhamoirhat', 'ধামইরহাট', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(164, 'Niamatpur', 'নিয়ামতপুর', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(165, 'Manda', 'মান্দা', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(166, 'Atrai', 'আত্রাই', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(167, 'Raninagar', 'রাণীনগর', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(168, 'Naogaon Sadar', 'নওগাঁ সদর', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(169, 'Porsha', 'পোরশা', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(170, 'Sapahar', 'সাপাহার', 19, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(171, 'Manirampur', 'মণিরামপুর', 20, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(172, 'Abhaynagar', 'অভয়নগর', 20, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(173, 'Bagherpara', 'বাঘারপাড়া', 20, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(174, 'Chougachha', 'চৌগাছা', 20, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(175, 'Jhikargacha', 'ঝিকরগাছা', 20, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(176, 'Keshabpur', 'কেশবপুর', 20, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(177, 'Jessore Sadar', 'যশোর সদর', 20, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(178, 'Sharsha', 'শার্শা', 20, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(179, 'Assasuni', 'আশাশুনি', 21, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(180, 'Debhata', 'দেবহাটা', 21, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(181, 'Kalaroa', 'কলারোয়া', 21, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(182, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 21, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(183, 'Shyamnagar', 'শ্যামনগর', 21, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(184, 'Tala', 'তালা', 21, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(185, 'Kaliganj', 'কালিগঞ্জ', 21, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(186, 'Mujibnagar', 'মুজিবনগর', 22, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(187, 'Meherpur Sadar', 'মেহেরপুর সদর', 22, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(188, 'Gangni', 'গাংনী', 22, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(189, 'Narail Sadar', 'নড়াইল সদর', 23, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(190, 'Lohagara', 'লোহাগড়া', 23, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(191, 'Kalia', 'কালিয়া', 23, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(192, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 24, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(193, 'Alamdanga', 'আলমডাঙ্গা', 24, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(194, 'Damurhuda', 'দামুড়হুদা', 24, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(195, 'Jibannagar', 'জীবননগর', 24, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(196, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 25, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(197, 'Kumarkhali', 'কুমারখালী', 25, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(198, 'Khoksa', 'খোকসা', 25, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(199, 'Mirpur', 'মিরপুর', 25, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(200, 'Daulatpur', 'দৌলতপুর', 25, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(201, 'Bheramara', 'ভেড়ামারা', 25, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(202, 'Shalikha', 'শালিখা', 26, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(203, 'Sreepur', 'শ্রীপুর', 26, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(204, 'Magura Sadar', 'মাগুরা সদর', 26, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(205, 'Mohammadpur', 'মহম্মদপুর', 26, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(206, 'Paikgasa', 'পাইকগাছা', 27, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(207, 'Fultola', 'ফুলতলা', 27, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(208, 'Digholia', 'দিঘলিয়া', 27, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(209, 'Rupsha', 'রূপসা', 27, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(210, 'Terokhada', 'তেরখাদা', 27, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(211, 'Dumuria', 'ডুমুরিয়া', 27, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(212, 'Botiaghata', 'বটিয়াঘাটা', 27, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(213, 'Dakop', 'দাকোপ', 27, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(214, 'Koyra', 'কয়রা', 27, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(215, 'Fakirhat', 'ফকিরহাট', 28, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(216, 'Bagerhat Sadar', 'বাগেরহাট সদর', 28, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(217, 'Mollahat', 'মোল্লাহাট', 28, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(218, 'Sarankhola', 'শরণখোলা', 28, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(219, 'Rampal', 'রামপাল', 28, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(220, 'Morrelganj', 'মোড়েলগঞ্জ', 28, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(221, 'Kachua', 'কচুয়া', 28, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(222, 'Mongla', 'মোংলা', 28, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(223, 'Chitalmari', 'চিতলমারী', 28, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(224, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 29, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(225, 'Shailkupa', 'শৈলকুপা', 29, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(226, 'Harinakundu', 'হরিণাকুন্ডু', 29, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(227, 'Kaliganj', 'কালীগঞ্জ', 29, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(228, 'Kotchandpur', 'কোটচাঁদপুর', 29, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(229, 'Moheshpur', 'মহেশপুর', 29, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(230, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 30, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(231, 'Kathalia', 'কাঠালিয়া', 30, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(232, 'Nalchity', 'নলছিটি', 30, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(233, 'Rajapur', 'রাজাপুর', 30, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(234, 'Bauphal', 'বাউফল', 31, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(235, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 31, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(236, 'Dumki', 'দুমকি', 31, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(237, 'Dashmina', 'দশমিনা', 31, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(238, 'Kalapara', 'কলাপাড়া', 31, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(239, 'Mirzaganj', 'মির্জাগঞ্জ', 31, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(240, 'Galachipa', 'গলাচিপা', 31, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(241, 'Rangabali', 'রাঙ্গাবালী', 31, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(242, 'Pirojpur Sadar', 'পিরোজপুর সদর', 32, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(243, 'Nazirpur', 'নাজিরপুর', 32, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(244, 'Kawkhali', 'কাউখালী', 32, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(245, 'Zianagar', 'জিয়ানগর', 32, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(246, 'Bhandaria', 'ভান্ডারিয়া', 32, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(247, 'Mathbaria', 'মঠবাড়ীয়া', 32, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(248, 'Nesarabad', 'নেছারাবাদ', 32, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(249, 'Barisal Sadar', 'বরিশাল সদর', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(250, 'Bakerganj', 'বাকেরগঞ্জ', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(251, 'Babuganj', 'বাবুগঞ্জ', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(252, 'Wazirpur', 'উজিরপুর', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(253, 'Banaripara', 'বানারীপাড়া', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(254, 'Gournadi', 'গৌরনদী', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(255, 'Agailjhara', 'আগৈলঝাড়া', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(256, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(257, 'Muladi', 'মুলাদী', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(258, 'Hizla', 'হিজলা', 33, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(259, 'Bhola Sadar', 'ভোলা সদর', 34, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(260, 'Borhan Sddin', 'বোরহান উদ্দিন', 34, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(261, 'Charfesson', 'চরফ্যাশন', 34, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(262, 'Doulatkhan', 'দৌলতখান', 34, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(263, 'Monpura', 'মনপুরা', 34, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(264, 'Tazumuddin', 'তজুমদ্দিন', 34, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(265, 'Lalmohan', 'লালমোহন', 34, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(266, 'Amtali', 'আমতলী', 35, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(267, 'Barguna Sadar', 'বরগুনা সদর', 35, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(268, 'Betagi', 'বেতাগী', 35, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(269, 'Bamna', 'বামনা', 35, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(270, 'Pathorghata', 'পাথরঘাটা', 35, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(271, 'Taltali', 'তালতলি', 35, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(272, 'Balaganj', 'বালাগঞ্জ', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(273, 'Beanibazar', 'বিয়ানীবাজার', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(274, 'Bishwanath', 'বিশ্বনাথ', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(275, 'Companiganj', 'কোম্পানীগঞ্জ', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(276, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(277, 'Golapganj', 'গোলাপগঞ্জ', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(278, 'Gowainghat', 'গোয়াইনঘাট', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(279, 'Jaintiapur', 'জৈন্তাপুর', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(280, 'Kanaighat', 'কানাইঘাট', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(281, 'Sylhet Sadar', 'সিলেট সদর', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(282, 'Zakiganj', 'জকিগঞ্জ', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(283, 'Dakshinsurma', 'দক্ষিণ সুরমা', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(284, 'Osmaninagar', 'ওসমানী নগর', 36, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(285, 'Barlekha', 'বড়লেখা', 37, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(286, 'Kamolganj', 'কমলগঞ্জ', 37, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(287, 'Kulaura', 'কুলাউড়া', 37, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(288, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 37, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(289, 'Rajnagar', 'রাজনগর', 37, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(290, 'Sreemangal', 'শ্রীমঙ্গল', 37, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(291, 'Juri', 'জুড়ী', 37, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(292, 'Nabiganj', 'নবীগঞ্জ', 38, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(293, 'Bahubal', 'বাহুবল', 38, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(294, 'Ajmiriganj', 'আজমিরীগঞ্জ', 38, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(295, 'Baniachong', 'বানিয়াচং', 38, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(296, 'Lakhai', 'লাখাই', 38, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(297, 'Chunarughat', 'চুনারুঘাট', 38, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(298, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 38, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(299, 'Madhabpur', 'মাধবপুর', 38, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(300, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(301, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(302, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(303, 'Chhatak', 'ছাতক', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(304, 'Jagannathpur', 'জগন্নাথপুর', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(305, 'Dowarabazar', 'দোয়ারাবাজার', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(306, 'Tahirpur', 'তাহিরপুর', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(307, 'Dharmapasha', 'ধর্মপাশা', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(308, 'Jamalganj', 'জামালগঞ্জ', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(309, 'Shalla', 'শাল্লা', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(310, 'Derai', 'দিরাই', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(311, 'Belabo', 'বেলাবো', 40, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(312, 'Monohardi', 'মনোহরদী', 40, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(313, 'Narsingdi Sadar', 'নরসিংদী সদর', 40, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(314, 'Palash', 'পলাশ', 40, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(315, 'Raipura', 'রায়পুরা', 40, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(316, 'Shibpur', 'শিবপুর', 40, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(317, 'Kaliganj', 'কালীগঞ্জ', 41, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(318, 'Kaliakair', 'কালিয়াকৈর', 41, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(319, 'Kapasia', 'কাপাসিয়া', 41, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(320, 'Gazipur Sadar', 'গাজীপুর সদর', 41, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(321, 'Sreepur', 'শ্রীপুর', 41, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(322, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 42, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(323, 'Naria', 'নড়িয়া', 42, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(324, 'Zajira', 'জাজিরা', 42, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(325, 'Gosairhat', 'গোসাইরহাট', 42, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(326, 'Bhedarganj', 'ভেদরগঞ্জ', 42, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(327, 'Damudya', 'ডামুড্যা', 42, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(328, 'Araihazar', 'আড়াইহাজার', 43, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(329, 'Bandar', 'বন্দর', 43, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(330, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 43, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(331, 'Rupganj', 'রূপগঞ্জ', 43, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(332, 'Sonargaon', 'সোনারগাঁ', 43, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(333, 'Basail', 'বাসাইল', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(334, 'Bhuapur', 'ভুয়াপুর', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(335, 'Delduar', 'দেলদুয়ার', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(336, 'Ghatail', 'ঘাটাইল', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(337, 'Gopalpur', 'গোপালপুর', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(338, 'Madhupur', 'মধুপুর', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(339, 'Mirzapur', 'মির্জাপুর', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(340, 'Nagarpur', 'নাগরপুর', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(341, 'Sakhipur', 'সখিপুর', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(342, 'Tangail Sadar', 'টাঙ্গাইল সদর', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(343, 'Kalihati', 'কালিহাতী', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(344, 'Dhanbari', 'ধনবাড়ী', 44, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(345, 'Itna', 'ইটনা', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(346, 'Katiadi', 'কটিয়াদী', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(347, 'Bhairab', 'ভৈরব', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(348, 'Tarail', 'তাড়াইল', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(349, 'Hossainpur', 'হোসেনপুর', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(350, 'Pakundia', 'পাকুন্দিয়া', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(351, 'Kuliarchar', 'কুলিয়ারচর', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(352, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(353, 'Karimgonj', 'করিমগঞ্জ', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(354, 'Bajitpur', 'বাজিতপুর', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(355, 'Austagram', 'অষ্টগ্রাম', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(356, 'Mithamoin', 'মিঠামইন', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(357, 'Nikli', 'নিকলী', 45, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(358, 'Harirampur', 'হরিরামপুর', 46, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(359, 'Saturia', 'সাটুরিয়া', 46, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(360, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 46, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(361, 'Gior', 'ঘিওর', 46, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(362, 'Shibaloy', 'শিবালয়', 46, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(363, 'Doulatpur', 'দৌলতপুর', 46, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(364, 'Singiar', 'সিংগাইর', 46, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(365, 'Savar', 'সাভার', 47, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(366, 'Dhamrai', 'ধামরাই', 47, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(367, 'Keraniganj', 'কেরাণীগঞ্জ', 47, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(368, 'Nawabganj', 'নবাবগঞ্জ', 47, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(369, 'Dohar', 'দোহার', 47, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(370, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 48, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(371, 'Sreenagar', 'শ্রীনগর', 48, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(372, 'Sirajdikhan', 'সিরাজদিখান', 48, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(373, 'Louhajanj', 'লৌহজং', 48, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(374, 'Gajaria', 'গজারিয়া', 48, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(375, 'Tongibari', 'টংগীবাড়ি', 48, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(376, 'Rajbari Sadar', 'রাজবাড়ী সদর', 49, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(377, 'Goalanda', 'গোয়ালন্দ', 49, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(378, 'Pangsa', 'পাংশা', 49, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(379, 'Baliakandi', 'বালিয়াকান্দি', 49, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(380, 'Kalukhali', 'কালুখালী', 49, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(381, 'Madaripur Sadar', 'মাদারীপুর সদর', 50, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(382, 'Shibchar', 'শিবচর', 50, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(383, 'Kalkini', 'কালকিনি', 50, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(384, 'Rajoir', 'রাজৈর', 50, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(385, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 51, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(386, 'Kashiani', 'কাশিয়ানী', 51, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(387, 'Tungipara', 'টুংগীপাড়া', 51, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(388, 'Kotalipara', 'কোটালীপাড়া', 51, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(389, 'Muksudpur', 'মুকসুদপুর', 51, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(390, 'Faridpur Sadar', 'ফরিদপুর সদর', 52, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(391, 'Alfadanga', 'আলফাডাঙ্গা', 52, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(392, 'Boalmari', 'বোয়ালমারী', 52, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(393, 'Sadarpur', 'সদরপুর', 52, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(394, 'Nagarkanda', 'নগরকান্দা', 52, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(395, 'Bhanga', 'ভাঙ্গা', 52, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(396, 'Charbhadrasan', 'চরভদ্রাসন', 52, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(397, 'Madhukhali', 'মধুখালী', 52, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(398, 'Saltha', 'সালথা', 52, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(399, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 53, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(400, 'Debiganj', 'দেবীগঞ্জ', 53, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(401, 'Boda', 'বোদা', 53, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(402, 'Atwari', 'আটোয়ারী', 53, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(403, 'Tetulia', 'তেতুলিয়া', 53, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(404, 'Nawabganj', 'নবাবগঞ্জ', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(405, 'Birganj', 'বীরগঞ্জ', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(406, 'Ghoraghat', 'ঘোড়াঘাট', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(407, 'Birampur', 'বিরামপুর', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(408, 'Parbatipur', 'পার্বতীপুর', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(409, 'Bochaganj', 'বোচাগঞ্জ', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(410, 'Kaharol', 'কাহারোল', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(411, 'Fulbari', 'ফুলবাড়ী', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(412, 'Dinajpur Sadar', 'দিনাজপুর সদর', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(413, 'Hakimpur', 'হাকিমপুর', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(414, 'Khansama', 'খানসামা', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(415, 'Birol', 'বিরল', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(416, 'Chirirbandar', 'চিরিরবন্দর', 54, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(417, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 55, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(418, 'Kaliganj', 'কালীগঞ্জ', 55, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(419, 'Hatibandha', 'হাতীবান্ধা', 55, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(420, 'Patgram', 'পাটগ্রাম', 55, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(421, 'Aditmari', 'আদিতমারী', 55, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(422, 'Syedpur', 'সৈয়দপুর', 56, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(423, 'Domar', 'ডোমার', 56, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(424, 'Dimla', 'ডিমলা', 56, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(425, 'Jaldhaka', 'জলঢাকা', 56, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(426, 'Kishorganj', 'কিশোরগঞ্জ', 56, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(427, 'Nilphamari Sadar', 'নীলফামারী সদর', 56, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(428, 'Sadullapur', 'সাদুল্লাপুর', 57, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(429, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 57, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(430, 'Palashbari', 'পলাশবাড়ী', 57, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(431, 'Saghata', 'সাঘাটা', 57, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(432, 'Gobindaganj', 'গোবিন্দগঞ্জ', 57, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(433, 'Sundarganj', 'সুন্দরগঞ্জ', 57, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(434, 'Phulchari', 'ফুলছড়ি', 57, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(435, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 58, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(436, 'Pirganj', 'পীরগঞ্জ', 58, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(437, 'Ranisankail', 'রাণীশংকৈল', 58, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(438, 'Haripur', 'হরিপুর', 58, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(439, 'Baliadangi', 'বালিয়াডাঙ্গী', 58, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(440, 'Rangpur Sadar', 'রংপুর সদর', 59, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(441, 'Gangachara', 'গংগাচড়া', 59, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(442, 'Taragonj', 'তারাগঞ্জ', 59, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(443, 'Badargonj', 'বদরগঞ্জ', 59, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(444, 'Mithapukur', 'মিঠাপুকুর', 59, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(445, 'Pirgonj', 'পীরগঞ্জ', 59, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(446, 'Kaunia', 'কাউনিয়া', 59, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(447, 'Pirgacha', 'পীরগাছা', 59, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(448, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 60, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(449, 'Nageshwari', 'নাগেশ্বরী', 60, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(450, 'Bhurungamari', 'ভুরুঙ্গামারী', 60, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(451, 'Phulbari', 'ফুলবাড়ী', 60, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(452, 'Rajarhat', 'রাজারহাট', 60, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(453, 'Ulipur', 'উলিপুর', 60, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(454, 'Chilmari', 'চিলমারী', 60, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(455, 'Rowmari', 'রৌমারী', 60, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(456, 'Charrajibpur', 'চর রাজিবপুর', 60, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(457, 'Sherpur Sadar', 'শেরপুর সদর', 61, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(458, 'Nalitabari', 'নালিতাবাড়ী', 61, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(459, 'Sreebordi', 'শ্রীবরদী', 61, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(460, 'Nokla', 'নকলা', 61, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(461, 'Jhenaigati', 'ঝিনাইগাতী', 61, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(462, 'Fulbaria', 'ফুলবাড়ীয়া', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(463, 'Trishal', 'ত্রিশাল', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(464, 'Bhaluka', 'ভালুকা', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(465, 'Muktagacha', 'মুক্তাগাছা', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(466, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(467, 'Dhobaura', 'ধোবাউড়া', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(468, 'Phulpur', 'ফুলপুর', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(469, 'Haluaghat', 'হালুয়াঘাট', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(470, 'Gouripur', 'গৌরীপুর', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(471, 'Gafargaon', 'গফরগাঁও', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(472, 'Iswarganj', 'ঈশ্বরগঞ্জ', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(473, 'Nandail', 'নান্দাইল', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(474, 'Tarakanda', 'তারাকান্দা', 62, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(475, 'Jamalpur Sadar', 'জামালপুর সদর', 63, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(476, 'Melandah', 'মেলান্দহ', 63, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(477, 'Islampur', 'ইসলামপুর', 63, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(478, 'Dewangonj', 'দেওয়ানগঞ্জ', 63, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(479, 'Sarishabari', 'সরিষাবাড়ী', 63, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(480, 'Madarganj', 'মাদারগঞ্জ', 63, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(481, 'Bokshiganj', 'বকশীগঞ্জ', 63, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(482, 'Barhatta', 'বারহাট্টা', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(483, 'Durgapur', 'দুর্গাপুর', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(484, 'Kendua', 'কেন্দুয়া', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(485, 'Atpara', 'আটপাড়া', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(486, 'Madan', 'মদন', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(487, 'Khaliajuri', 'খালিয়াজুরী', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(488, 'Kalmakanda', 'কলমাকান্দা', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(489, 'Mohongonj', 'মোহনগঞ্জ', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(490, 'Purbadhala', 'পূর্বধলা', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(491, 'Netrokona Sadar', 'নেত্রকোণা সদর', 64, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(492, 'Eidgaon', 'ঈদগাঁও', 9, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(493, 'Madhyanagar', 'মধ্যনগর', 39, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41'),
(494, 'Dasar', 'ডাসার', 50, NULL, 1, NULL, '2026-09-02 09:46:32', '2026-09-02 09:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `thanas_old`
--

CREATE TABLE `thanas_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `bn_name` varchar(100) DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_no`, `email_verified_at`, `password`, `remember_token`, `role_id`, `image`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Admin', 'admin@example.com', '01404755996', NULL, '$2y$12$ZNlGbCJ.HLk3oImzO804neVOibMngS6.MoWCGVC4u1HvFVHAPyCki', NULL, 1, NULL, 1, '2026-08-11 04:29:59', '2026-08-11 04:29:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userss`
--

CREATE TABLE `userss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userss`
--

INSERT INTO `userss` (`id`, `name`, `email`, `phone_no`, `email_verified_at`, `password`, `remember_token`, `role_id`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'Admin', 'admin@example.com', '01741285251', NULL, '$2y$12$ZNlGbCJ.HLk3oImzO804neVOibMngS6.MoWCGVC4u1HvFVHAPyCki', NULL, 1, NULL, 1, '2026-08-10 06:25:12', '2026-08-10 06:25:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`),
  ADD KEY `brands_user_id_foreign` (`user_id`);

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
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`),
  ADD KEY `coupons_is_active_index` (`is_active`),
  ADD KEY `coupons_valid_from_valid_to_index` (`valid_from`,`valid_to`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_number_unique` (`phone_number`),
  ADD KEY `customers_district_id_foreign` (`district_id`),
  ADD KEY `customers_thana_id_foreign` (`thana_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `districts123`
--
ALTER TABLE `districts123`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts_000`
--
ALTER TABLE `districts_000`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_user_id_foreign` (`user_id`);

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
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`),
  ADD KEY `user_id_foreign` (`user_id`);

--
-- Indexes for table `orders_old`
--
ALTER TABLE `orders_old`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_items_old`
--
ALTER TABLE `order_items_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `policies_slug_unique` (`slug`),
  ADD KEY `policies_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`),
  ADD KEY `product_images_user_id_foreign` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_user_id_foreign` (`user_id`),
  ADD KEY `sliders_position_index` (`position`),
  ADD KEY `sliders_is_active_index` (`is_active`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_user_id_foreign` (`user_id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `thanas_old`
--
ALTER TABLE `thanas_old`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thanas_code_unique` (`code`),
  ADD KEY `thanas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `districts123`
--
ALTER TABLE `districts123`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1370;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders_old`
--
ALTER TABLE `orders_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items_old`
--
ALTER TABLE `order_items_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT for table `thanas_old`
--
ALTER TABLE `thanas_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userss`
--
ALTER TABLE `userss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_thana_id_foreign` FOREIGN KEY (`thana_id`) REFERENCES `thanas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `policies`
--
ALTER TABLE `policies`
  ADD CONSTRAINT `policies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thanas`
--
ALTER TABLE `thanas`
  ADD CONSTRAINT `thanas_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thanas_old`
--
ALTER TABLE `thanas_old`
  ADD CONSTRAINT `thanas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `district_old` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
