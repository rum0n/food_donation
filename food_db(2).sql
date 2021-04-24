-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 09:52 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_type_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pickuptime` time NOT NULL DEFAULT '12:00:00',
  `pickupdate` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `pickup_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `user_id`, `food_type_id`, `campaign_id`, `quantity`, `pickuptime`, `pickupdate`, `description`, `mobile_no`, `food_pic`, `pickup_address`, `lat`, `lon`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 2, '16:00:00', '2020-06-20 00:00:00', 'Help the poor by donate food', '01789865434', '1592563483how-to-make-dry-dog-food-more-appealing-to-your-dog-53bacc6b81ed7.jpg', 'Barlekha, Bangladesh', '24.707272', '92.19170179999999', 0, '2020-06-19 04:44:43', '2020-06-19 04:44:43'),
(2, 3, 4, 1, 3, '14:02:00', '2020-06-22 00:00:00', 'If you can\'t feed a hundred people, then just feed one.', '01771231232', '1592566239Fruit3.jpg', 'Tilagor, Sylhet, Bangladesh', '24.8995542', '91.903818', 1, '2020-06-19 05:30:39', '2020-06-19 06:24:44'),
(3, 3, 3, 1, 4, '11:00:00', '2020-06-23 00:00:00', 'If you can\'t feed a hundred people, then just feed one.', '01765816508', '1592566356driks22.jpg', 'Ambarkhana, Sylhet, Bangladesh', '24.9058852', '91.8720815', 0, '2020-06-19 05:32:37', '2020-06-19 05:32:37'),
(4, 3, 2, 1, 2, '15:00:00', '2020-06-23 00:00:00', 'If you can\'t feed a hundred people, then just feed one.', '01712300904', '1592566514fastfood5.jpg', 'Shahjalal Upashahar, Sylhet, Bangladesh', '24.8849412', '91.88672629999999', 2, '2020-06-19 05:35:14', '2020-06-19 06:25:26'),
(5, 4, 1, 1, 5, '15:00:00', '2020-06-24 00:00:00', 'If you can\'t feed a hundred people, then just feed one.', '01770126126', '1592566980download (3).jpg', 'Taltola Road, Sylhet, Bangladesh', '24.8908051', '91.8662609', 0, '2020-06-19 05:43:00', '2020-06-19 05:43:00'),
(6, 4, 2, 1, 2, '10:00:00', '2020-06-30 00:00:00', 'If you can\'t feed a hundred people, then just feed one.If you can\'t feed a hundred people, then just feed one.', '01771635050', '1592567080fast food1.jpeg', 'Subid Bazar, Sylhet, Bangladesh', '24.9068011', '91.8580514', 1, '2020-06-19 05:44:40', '2020-06-19 06:24:26'),
(7, 4, 4, 1, 3, '16:00:00', '2020-06-30 00:00:00', 'If you can\'t feed a hundred people, then just feed one.If you can\'t feed a hundred people, then just feed one.', '01823145134', '1592567269fruits1.jpg', 'Shibgonj, Sylhet, Bangladesh', '24.9015584', '91.8919141', 0, '2020-06-19 05:47:49', '2020-06-19 05:47:49'),
(8, 4, 3, 1, 2, '19:00:00', '2020-06-29 00:00:00', 'If you can\'t feed a hundred people, then just feed one.If you can\'t feed a hundred people, then just feed one.If you can\'t feed a hundred people, then just feed one.', '01911122245', '1592567345drinks.jpg', 'Shahi Eidgah, Sylhet, Bangladesh', '24.9050139', '91.8824544', 2, '2020-06-19 05:49:05', '2020-06-19 06:25:16'),
(9, 3, 4, 5, 5, '11:30:00', '2020-06-28 00:00:00', 'If you can\'t feed a hundred people, then just feed one.If you can\'t feed a hundred people, then just feed one.If you can\'t feed a hundred people, then just feed one.', '01765816508', '1592571993Fruit3.jpg', 'Modina Market Point, Sylhet - Sunamganj Highway, Sylhet, Bangladesh', '24.9103146', '91.84831729999999', 0, '2020-06-19 07:06:34', '2020-06-19 07:06:34'),
(10, 3, 2, 3, 5, '17:30:00', '2020-06-27 00:00:00', 'If you can\'t feed a hundred people, then just feed one.If you can\'t feed a hundred people, then just feed one.If you can\'t feed a hundred people, then just feed one.', '01765816508', '1592572085fastfood5.jpg', 'Lamabazar, Sylhet, Bangladesh', '24.8949078', '91.86049109999999', 0, '2020-06-19 07:08:06', '2020-06-19 07:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `food_types`
--

CREATE TABLE `food_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_types`
--

INSERT INTO `food_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dry Food', '2020-06-19 04:11:09', '2020-06-19 04:11:09'),
(2, 'Fast Food', '2020-06-19 04:11:22', '2020-06-19 04:11:22'),
(3, 'Drinks', '2020-06-19 04:11:37', '2020-06-19 04:11:37'),
(4, 'Fruits', '2020-06-19 04:15:11', '2020-06-19 04:15:11');

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
(6, '2020_01_16_141623_add_phone_column_to_user_table', 2),
(7, '2020_01_16_141905_add_address_column_to_user_table', 3),
(8, '2014_10_12_000000_create_users_table', 4),
(9, '2014_10_12_100000_create_password_resets_table', 4),
(10, '2019_12_11_110256_create_roles_table', 4),
(11, '2020_01_05_122659_create_donations_table', 4),
(12, '2020_01_06_062938_create_food_types_table', 4),
(13, '2020_03_26_154319_create_subscribers_table', 4),
(14, '2020_06_14_143038_create_our_campaigns_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `our_campaigns`
--

CREATE TABLE `our_campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_campaigns`
--

INSERT INTO `our_campaigns` (`id`, `name`, `picture`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Donate Food', '1592571244.jpg', 'Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind.Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind', '2020-06-19 06:16:47', '2020-06-19 06:54:04'),
(2, 'Donate Food for Orphans', '1592570090.jpg', 'Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind.Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind.', '2020-06-19 06:34:50', '2020-06-19 06:34:50'),
(3, 'Donate Food for Street Childreen', '1592570241.jpg', 'Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind.Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind.', '2020-06-19 06:37:21', '2020-06-19 06:37:21'),
(4, 'Donate Food In Old Age Home', '1592570603.JPG', 'Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind.Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind', '2020-06-19 06:43:23', '2020-06-19 06:43:23'),
(5, 'Donate Food in SOS Children\'s Village', '1592571148.jpg', 'Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind.Charity is a supreme virtue, and the great channel through which the mercy of God is passed onto mankind', '2020-06-19 06:52:28', '2020-06-19 06:52:28');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2020-06-19 18:00:00', NULL),
(2, 'Volunteer', 'volunteer', NULL, NULL),
(3, 'User', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'abc@gmail.com', '2020-06-19 04:07:23', '2020-06-19 04:07:23'),
(2, 'hasan@gmail.com', '2020-06-19 06:55:23', '2020-06-19 06:55:23'),
(3, 'redwan@gmail.com', '2020-06-19 06:56:12', '2020-06-19 06:56:12'),
(4, 'nahiyan@gmail.com', '2020-06-19 06:56:32', '2020-06-19 06:56:32'),
(5, 'salman@gmail.com', '2020-06-19 06:57:00', '2020-06-19 06:57:00'),
(6, 'shawon@gmail.com', '2020-06-19 06:57:26', '2020-06-19 06:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT 1,
  `pro_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `address`, `provider`, `provider_id`, `email_verified_at`, `is_approved`, `pro_pic`, `about`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, '2020-06-19 18:00:00', 1, 'default.png', NULL, '$2y$10$Xc4DWqXtaK0NHg.L7KJA3O3KJ4CKBHNrJvxhNaq2B273S7iLIjr5K', NULL, '2020-06-19 03:59:17', '2020-06-19 03:59:17'),
(2, 2, 'Volunteer', 'volunteer@gmail.com', '01911234678', 'Sylhet', NULL, NULL, '2020-06-25 18:00:00', 1, '1592567731.jpg', 'Student', '$2y$10$L6BbNVqO1CWG/rviOiCnMuwIwVPtpWMOVVRSWVbb4MiiV.X/O5OIa', NULL, '2020-06-19 04:01:29', '2020-06-19 05:55:31'),
(3, 3, 'User', 'user@gmail.com', '01987664354', 'Sylhet', NULL, NULL, '2020-06-19 18:00:00', 1, '1592562773.jpeg', 'Student', '$2y$10$H9m9VoqxgzOuPKuxmIi4zOG0P8sBFXSY6UR8xm8RDLiyYyycUPXL6', NULL, '2020-06-19 04:03:06', '2020-06-19 04:32:54'),
(4, 3, 'jewel', 'jewel@gmail.com', '01770126126', 'Amberkhana', NULL, NULL, '2020-06-21 18:00:00', 1, '1592566784.jpg', 'Student', '$2y$10$6lSNB2DWwwx0QeMfoeQ2NOqtN5X1b72e8UBELqArkIf4EtTokIKZe', NULL, '2020-06-19 05:36:12', '2020-06-19 05:39:45'),
(5, 3, 'user2', 'user2@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 'default.png', NULL, '$2y$10$FAjn0ZFZ8ZNEh0VNBMEOm.S5CG75vH6K7pA1StbBfEAODZiyh9R/e', NULL, '2020-06-20 12:12:51', '2020-06-20 12:12:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_types`
--
ALTER TABLE `food_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_campaigns`
--
ALTER TABLE `our_campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food_types`
--
ALTER TABLE `food_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `our_campaigns`
--
ALTER TABLE `our_campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
