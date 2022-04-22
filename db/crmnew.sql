-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2022 at 07:08 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_block` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_block`, `created_at`, `updated_at`) VALUES
(1, 'Jodie Daren', 'admin@admin.com', NULL, '$2y$10$BY4JYtqZJCPY.t9w8xJcsevoO6HBJR8BNrUzVwf3q4W27EpvbNZGm', NULL, 0, '2022-04-19 04:01:01', '2022-04-20 23:36:42'),
(2, 'Vivianne Daugherty III', 'fpadberg@example.com', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7rNOlTD9Dc', 0, '2022-04-19 04:01:02', '2022-04-19 04:01:02'),
(3, 'Tremayne Sawayn', 'dicki.mitchell@example.net', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9TzqHuq2jK', 0, '2022-04-19 04:01:02', '2022-04-19 04:01:02'),
(4, 'Ashleigh Littel DDS', 'greenfelder.carolyne@example.org', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'I6SYOZsFLa', 0, '2022-04-19 04:01:02', '2022-04-19 04:01:02'),
(5, 'Deonte Lowe', 'cstoltenberg@example.net', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'puf0YxgP12', 0, '2022-04-19 04:01:03', '2022-04-19 04:01:03'),
(6, 'Destini Bogan', 'ttromp@example.org', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'X0xQ2xQ34z', 0, '2022-04-19 04:01:03', '2022-04-19 04:01:03'),
(7, 'Wyman O\'Hara', 'gerard.mclaughlin@example.com', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QCRMRlkf6j', 0, '2022-04-19 04:01:03', '2022-04-19 04:01:03'),
(8, 'Prof. Maynard Quitzon Sr.', 'bmccullough@example.com', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SOlDSTWMEs', 0, '2022-04-19 04:01:03', '2022-04-19 04:01:03'),
(9, 'Abdiel Reichel', 'carmine80@example.com', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sbGzfWo3A7', 0, '2022-04-19 04:01:04', '2022-04-19 04:01:04'),
(10, 'Harmony Kuvalis', 'gisselle.crona@example.net', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xE5K6Pgt01', 0, '2022-04-19 04:01:04', '2022-04-19 04:01:04'),
(11, 'Prof. Alejandrin Goodwin', 'nico.towne@example.com', '2022-04-19 04:01:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JkjOtvKKw6', 0, '2022-04-19 04:01:04', '2022-04-19 04:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `name_prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `name_prefix`, `first_name`, `last_name`, `email`, `phone`, `start_date`, `end_date`, `title`, `grade`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'Allen', 'Oconnor', 'dowumupu@mailinator.com', '+1 (247) 266-4884', '2020-04-17', '2015-12-16', 'Dignissimos ex ut mo', 'B', 1, '2022-04-22 05:58:25', '2022-04-22 07:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1: new, 2: ongoing,3: completed,4: cancelled	',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `project_id`, `customer_name`, `customer_email`, `customer_mobile`, `customer_phone`, `customer_company`, `company_website`, `customer_address`, `customer_country`, `customer_state`, `customer_pin`, `customer_city`, `subject`, `message`, `assigned_to`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 'Claudia Golden', 'moxub@mailinator.com', 'Doloribus quod conse', '+1 (619) 217-5552', 'Young Franco Plc', 'Rojas and Campos Inc', 'Exercitation aute re', 'Sapiente id sed sed', 'Nisi eius porro reru', 'Ducimus molestias e', 'Voluptate quas et au', 'In cum culpa eligend', '<p>Similique non dolore</p>', '3', 2, '2022-04-21 06:16:13', '2022-04-21 02:34:33'),
(4, 2, 'Madeson Snider', 'hasylate@mailinator.com', 'Deleniti quae volupt', '+1 (809) 191-1762', 'Armstrong Howard Traders', 'Ware Gilmore Inc', 'Voluptatem Illum s', 'Nam dolore consequat', 'Numquam maiores assu', 'Mollit ut proident', 'Eu voluptates in qui', 'Consectetur eius repo', '<p>Placeat enim exceptt</p>', '3', 2, '2022-04-02 00:24:42', '2022-04-21 02:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `lead_feedback`
--

CREATE TABLE `lead_feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `lead_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminder_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminder_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_feedback`
--

INSERT INTO `lead_feedback` (`id`, `lead_id`, `user_id`, `comment`, `reminder_date`, `reminder_time`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 'test comment', '2022-04-29', '19:19', 1, '2022-04-20 06:17:36', '2022-04-20 06:19:27');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_14_133537_create_admins_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2022_04_18_114824_create_projects_table', 1),
(6, '2022_04_19_092202_create_leads_table', 1),
(7, '2022_04_19_092553_create_lead_feedback_table', 1),
(8, '2022_04_22_102807_create_certificates_table', 2),
(9, '2022_04_22_102956_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_flag` int NOT NULL DEFAULT '0' COMMENT '0 is unread, 1 is read',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `type`, `title`, `message`, `route`, `read_flag`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 8, NULL, 'New user created', 'New user created', 'admin.user.index', 0, NULL, '2022-04-22 06:43:38', '2022-04-22 06:43:38');

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1: new, 2: ongoing,3: completed,4: cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `client_id`, `price`, `start_date`, `end_date`, `deadline`, `description`, `progress`, `files`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Quo necessitatibus e', 'quo-necessitatibus-e-2', NULL, '133', '2000-05-11', '2000-10-17', '1990-09-03', 'Ut quos anim ea sit', 'todo', '1650456208.Screenshot from 2021-11-15 17-08-36.png', 1, '2022-04-20 06:20:52', '2022-04-20 06:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `is_verified` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1: active, 0: inactive',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `otp`, `country`, `state`, `city`, `address`, `pin`, `dob`, `image`, `is_verified`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'John Doe 2', 'abc@gmail.com', NULL, '8899654123', NULL, 'India', 'mumbai', 'pune', 'prasanta nagar', '788563', '1987-12-05', '1650368275.download.jpeg', NULL, 1, NULL, NULL, '2022-04-19 06:07:55', '2022-04-21 00:11:55'),
(4, 'Mary Bradshaw', 'heti@mailinator.com', NULL, 'Voluptatem iusto ill', NULL, 'Dolore est ipsam mag', 'Amet ipsa quos rep', 'Nam eos enim cupidi', 'Consectetur ut dese', 'Veniam dolor et nis', '2014-11-17', '1650628610.play-img.png', NULL, 1, NULL, NULL, '2022-04-22 06:26:50', '2022-04-22 06:26:50'),
(5, 'Craig Thomas', 'puqemax@mailinator.com', NULL, 'Aut eaque vitae moll', NULL, 'Minus in sit delect', 'Adipisicing aut qui', 'Non reiciendis commo', 'Libero qui sint est', 'Nisi optio quisquam', '1973-09-16', '1650628931.play-img.png', NULL, 1, NULL, NULL, '2022-04-22 06:32:11', '2022-04-22 06:32:11'),
(6, 'Emmanuel Wiggins', 'vameharu@mailinator.com', NULL, 'Aut aliquip distinct', NULL, 'Consequatur proiden', 'Placeat sunt accusa', 'Quos omnis consequat', 'Aliquid quaerat quis', 'Eveniet voluptatum', '2013-03-08', '1650628977.mobileApp.png', NULL, 1, NULL, NULL, '2022-04-22 06:32:57', '2022-04-22 06:32:57'),
(8, 'Chaney Mcpherson', 'rumufasahy@mailinator.com', NULL, 'Hic dolore excepteur', NULL, 'Nesciunt labore Nam', 'Necessitatibus ea et', 'Incididunt illo cons', 'Sit aute nihil et o', 'Est esse necessitati', '1984-03-15', '1650629617.main-logo.png', NULL, 1, NULL, NULL, '2022-04-22 06:43:37', '2022-04-22 06:43:37');

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
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificates_start_date_unique` (`start_date`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leads_customer_mobile_unique` (`customer_mobile`);

--
-- Indexes for table `lead_feedback`
--
ALTER TABLE `lead_feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lead_feedback_reminder_time_unique` (`reminder_time`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lead_feedback`
--
ALTER TABLE `lead_feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
