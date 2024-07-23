-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 09:00 PM
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
-- Database: `ideas`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `idea_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Welcome', '2024-04-11 16:57:18', '2024-04-11 16:57:18'),
(2, 2, 4, 'I will join you', '2024-04-11 21:36:54', '2024-04-11 21:36:54'),
(3, 1, 3, 'We will hold your back', '2024-04-15 20:56:39', '2024-04-15 20:56:39'),
(4, 1, 7, 'Yeah bro, things ain\'t easy', '2024-04-16 00:05:58', '2024-04-16 00:05:58'),
(5, 2, 5, 'Fine, just a little bit rain', '2024-04-16 00:07:29', '2024-04-16 00:07:29'),
(6, 2, 8, 'Welcome, here we just code for fun!.....', '2024-04-24 14:51:02', '2024-04-24 14:51:02'),
(8, 1, 5, 'Thanks God, it\'s very nice', '2024-07-22 12:16:49', '2024-07-22 12:16:49'),
(9, 1, 9, 'It\'s already started...', '2024-07-22 13:21:41', '2024-07-22 13:21:41'),
(10, 1, 8, 'Welcome', '2024-07-22 13:22:27', '2024-07-22 13:22:27');

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
-- Table structure for table `follower_user`
--

CREATE TABLE `follower_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follower_user`
--

INSERT INTO `follower_user` (`user_id`, `follower_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-04-24 14:40:23', '2024-04-24 14:40:23'),
(1, 6, '2024-04-29 21:10:02', '2024-04-29 21:10:02'),
(3, 2, '2024-07-19 05:40:24', '2024-07-19 05:40:24'),
(2, 1, '2024-07-22 09:26:24', '2024-07-22 09:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'We code for fun', '2024-03-28 08:09:20', '2024-03-28 08:09:20'),
(3, 2, 'Hellow, i would like to join code for fun!', '2024-03-28 16:50:16', '2024-03-28 16:50:16'),
(4, 1, 'Please Join code for fun. We have something amazing.', '2024-04-05 08:42:59', '2024-04-05 09:41:21'),
(5, 1, 'Hey share with me how your week started?', '2024-04-16 00:03:19', '2024-04-16 00:03:19'),
(6, 1, 'We like to code for fun!', '2024-04-16 00:03:44', '2024-04-16 00:03:44'),
(7, 1, 'We still have alot of concept to be familiar with, now it\'s the time.', '2024-04-16 00:04:28', '2024-07-21 16:17:48'),
(8, 3, 'Hello guys, am new here. I need someone to lead me plz!, updated', '2024-04-24 14:46:47', '2024-05-31 10:33:56'),
(9, 2, 'Hello, Where you will spend this holiday?', '2024-07-22 13:20:41', '2024-07-22 13:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `idea_like`
--

CREATE TABLE `idea_like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_like`
--

INSERT INTO `idea_like` (`id`, `user_id`, `idea_id`, `created_at`, `updated_at`) VALUES
(4, 1, 3, '2024-05-01 14:47:35', '2024-05-01 14:47:35'),
(5, 1, 7, '2024-05-01 14:48:28', '2024-05-01 14:48:28'),
(6, 2, 5, '2024-05-26 12:13:18', '2024-05-26 12:13:18');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_14_142029_create_table_ideas', 2),
(9, '2024_03_14_144128_create_ideas_table', 3),
(10, '2024_03_21_231955_create_comments_table', 3),
(11, '2024_04_16_040749_add_bio_and_image_to_users', 4),
(12, '2024_04_23_013040_create_table_follower_users_table', 5),
(13, '2024_04_24_163159_create_follower_user_table', 5),
(14, '2024_04_30_140112_remove_likes_from_ideas', 6),
(15, '2024_04_30_141034_create_idea_like_table', 7),
(16, '2024_05_13_234056_add_is_adding_to_users', 8);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_follower_users`
--

CREATE TABLE `table_follower_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `bio`, `image`, `is_admin`) VALUES
(1, 'Pasaka Maile', 'mailepaskali@gmail.com', NULL, '$2y$12$JS5rNfcGFRLlROZQbnhlauVUoZGnfbmCaEOhDrwfRBGVlSiSwgHvS', NULL, '2024-03-24 18:27:35', '2024-05-22 17:09:44', 'The web Developer', 'profile/CaPdhDdWYCLbZnK3aHzXzsWXXLzZRSStLYKQypaX.jpg', 1),
(2, 'Magreth Therence', 'magreth@gmail.com', NULL, '$2y$12$5Qtv0h/cAnL8.EbC6eja6uLTX.Nes754AcuJ5W0fv5Z2DJeBDjTb6', NULL, '2024-03-28 08:54:27', '2024-04-22 16:03:05', 'Prayers, discpline and hardwork', NULL, 0),
(3, 'Pasaka', 'pasaka@gmail.com', NULL, '$2y$12$vTZ9qbz6yuONZNHKTKllpeVd16b7FR/UYg3uAeYkfe5Vc5qsPn/xm', NULL, '2024-04-24 14:45:52', '2024-04-26 19:06:23', 'Developer', 'profile/DeJ9qwAORP2j9SQg6goH1soVvJeDyu0GqBWvJJ0Q.jpg', 0),
(4, 'User', 'user@gmail.com', NULL, '$2y$12$YTSDfFqxqQhUpJOgDIAmS.ezzavur95AZRXZ34mw3ri5f9alICRpe', NULL, '2024-04-28 22:18:00', '2024-05-26 10:07:19', 'Hi there am using Ideas!', NULL, 0),
(5, 'User1', 'user1@gmail.com', NULL, '$2y$12$GmJQ9oFFe81oOxsnhllaHOQ.4IwOkbWekq8Kdep6RykaW2PA/ZaAu', NULL, '2024-04-28 22:29:18', '2024-04-28 22:29:18', NULL, NULL, 0),
(6, 'User2', 'user2@gmail.com', NULL, '$2y$12$yPFlZ0XIkDMNQLhZ.6uvF.4yYY5bQrlPDFB2yA4t.k4kVupn2IZ1G', NULL, '2024-04-28 22:34:02', '2024-04-28 22:34:02', NULL, NULL, 0),
(7, 'Maile', 'maile@gmail.com', NULL, '$2y$12$6hCTRLHj8bN1B5qR0FQQVuBvtpoFII98GSFTGSxsCgzrNo1vqXkJO', NULL, '2024-04-28 22:37:17', '2024-04-28 22:37:17', NULL, NULL, 0),
(8, 'Test User', 'testuser@gmail.com', NULL, '$2y$12$1Jds5Lyp9FJLzHZXs/ZrSeMaejlDlWY4b/fKXws8b7eI48Us2ca2G', NULL, '2024-05-05 04:21:02', '2024-05-05 04:21:02', NULL, NULL, 0),
(9, 'Omy', 'omy@gmail.com', NULL, '$2y$12$ryy6AIXVxNqQzsEEfEgRTOOULFX5EtnMLSCK5QGgkU0KVSTvHWSg6', NULL, '2024-05-13 16:25:09', '2024-05-13 16:25:09', NULL, NULL, 0),
(10, 'omy', 'omari@gmail.com', NULL, '$2y$12$UxGj52fGeHzVxKuFz.Kcpevjr9OVyZb/Vyiedu/y4wibwjeRTheQK', NULL, '2024-05-13 16:26:45', '2024-05-13 17:15:08', 'Networker', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follower_user`
--
ALTER TABLE `follower_user`
  ADD KEY `follower_user_user_id_foreign` (`user_id`),
  ADD KEY `follower_user_follower_id_foreign` (`follower_id`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ideas_user_id_foreign` (`user_id`);

--
-- Indexes for table `idea_like`
--
ALTER TABLE `idea_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_like_user_id_foreign` (`user_id`),
  ADD KEY `idea_like_idea_id_foreign` (`idea_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `table_follower_users`
--
ALTER TABLE `table_follower_users`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `idea_like`
--
ALTER TABLE `idea_like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_follower_users`
--
ALTER TABLE `table_follower_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follower_user`
--
ALTER TABLE `follower_user`
  ADD CONSTRAINT `follower_user_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follower_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `idea_like`
--
ALTER TABLE `idea_like`
  ADD CONSTRAINT `idea_like_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `idea_like_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
