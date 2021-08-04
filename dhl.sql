-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 04, 2021 at 03:47 PM
-- Server version: 8.0.24
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispatchers`
--

CREATE TABLE `dispatchers` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastname` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispatchers`
--

INSERT INTO `dispatchers` (`id`, `firstname`, `email`, `phone`, `image`, `status`, `created_at`, `updated_at`, `lastname`) VALUES
(1, 'Goodness ', 'goody@gmail.com', '08133627619', '_image1627834274.jpg', 1, '2021-08-01 12:26:19', '2021-08-01 15:11:14', 'Chienhiura'),
(2, 'Daniel', 'danielikeogu28@gmail.com', '09087575645', '', 1, '2021-08-03 18:18:43', '2021-08-03 18:18:43', 'Miracle');

-- --------------------------------------------------------

--
-- Table structure for table `dispatcher_items`
--

CREATE TABLE `dispatcher_items` (
  `id` bigint UNSIGNED NOT NULL,
  `dispatcher_id` int NOT NULL,
  `item_id` int NOT NULL,
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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `TrackID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_weight` double NOT NULL,
  `item_cost` double NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dod` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `c_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `TrackID`, `item_name`, `item_weight`, `item_cost`, `owner_name`, `owner_email`, `owner_address`, `owner_phone`, `doc`, `dod`, `r_address`, `r_phone`, `r_name`, `r_email`, `status`, `c_location`, `image`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(1, 'DT-001', 'Pencil', 1, 200, 'Emmanuel', 'ikeogu322@gmail.com', 'OwKdlkfjwej', '08133627610', '12-06-2021', '2021-08-02', 'Joking place', '08133627619', 'Daniel Ikeogu', 'daniel@gmail.com', 2, 'Calabar', '_image1627829389.jpg', '_image1627829389.jpg', '', '2021-08-01 13:49:49', '2021-08-01 14:58:00'),
(5, 'DT-00', 'HP Elite Book', 12, 300, 'Emmanuel', 'goody@gmail.com', 'uturu eluoro achara, house xxxxx.', '08133627610', '2021-07-26', '2021-08-17', 'Back of Genesis', '08133627619', 'Daniel Ikeogu', 'age@mail.com', 1, '', '_image1628018868.jpg', NULL, NULL, '2021-08-03 18:27:48', '2021-08-04 06:35:45'),
(6, 'DT-006', 'Mac Book', 12, 500, 'Chikwado Chika', 'goody@gmail.com', 'uturu eluoro achara, house xxxxx.', '09012376236', '2021-07-26', '2021-08-02', 'Back of Genesis', '08133627610', 'Daniel Ikeogu', 'ikeogu322@gmail.com', 2, '', '_image1628019567.jpg', NULL, NULL, '2021-08-03 18:39:27', '2021-08-04 06:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `item_photos`
--

CREATE TABLE `item_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_31_053016_create_items_table', 2),
(5, '2021_07_31_073139_create_dispatchers_table', 2),
(6, '2021_08_01_164233_create_dispatcher_items_table', 3),
(7, '2021_08_03_095904_create_item_photos_table', 4);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '2',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Emmanuel', 'ikeogu32@gmail.com', '08133627610', 1, NULL, '$2y$10$lo4hVqfdGDTMQpHsYtsZouMLC9m50iePXUurfSkHwD959Wpd/AGJS', NULL, '2021-07-31 03:00:36', '2021-08-03 10:14:43', 1),
(2, 'Goodness Chienhiura', 'goody@gmail.com', '08133627656', 2, NULL, '$2y$10$hXvI.UWAnBbbJHoKOlMJgumjGqMhfrGbwc0L5rKxcaB.1CLtJQjYS', NULL, '2021-08-03 10:14:16', '2021-08-03 10:14:39', 1),
(18, 'Daniel', 'danielikeogu28@gmail.com', '08133627619', 2, NULL, '$2y$10$ylfZH8BPu0/i1HaWuR28UeSvu41HS5O3zmJwVSOW04I96hWC1RDNC', NULL, '2021-08-03 11:31:41', '2021-08-03 11:44:49', 1),
(20, 'Nnebuchi', 'nnebuchiosigbo340@gmail.com', '08083549952', 2, NULL, '$2y$10$rVuqfxqsQzx48mgWYWrFnu0JcUQXBGQ/OUDtAh2QsHQjYwmtDvemm', NULL, '2021-08-03 18:05:55', '2021-08-03 18:07:08', 1),
(22, 'Ikeogu Emmanuel Chidera', 'ikeogu322@gmail.com', '08133627611', 1, NULL, '$2y$10$0x7t25.azody60N0x6Y9Zer4ND8WnRMJEwT0fDCL29WJPT7IQkQuy', NULL, '2021-08-03 18:12:04', '2021-08-03 18:12:04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatchers`
--
ALTER TABLE `dispatchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatcher_items`
--
ALTER TABLE `dispatcher_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_trackid_unique` (`TrackID`);

--
-- Indexes for table `item_photos`
--
ALTER TABLE `item_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispatchers`
--
ALTER TABLE `dispatchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dispatcher_items`
--
ALTER TABLE `dispatcher_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_photos`
--
ALTER TABLE `item_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
