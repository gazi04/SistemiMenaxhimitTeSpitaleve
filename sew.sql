-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2024 at 10:54 AM
-- Server version: 11.6.2-MariaDB
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `personal_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_number`, `personal_id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'A00000001', 'pasi', 'adminNmae', 'admin@gmail.com', '2024-12-06 14:17:04', '2024-12-06 14:17:04'),
(3, 'A00000002', '1234', 'gazmend', 'gazi@gmail.com', '2024-12-10 14:02:09', '2024-12-10 14:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `departaments`
--

CREATE TABLE `departaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departaments`
--

INSERT INTO `departaments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'gjinekologjisdfgdsfg', 'asdfasdflajsd;lf', '2024-12-06 13:53:52', '2024-12-08 14:48:15'),
(9, 'test Departamenti', 'departamenti pare i regjistruar', '2024-12-08 13:06:26', '2024-12-08 13:06:26'),
(10, 'depRi', 'departamenti i ri', '2024-12-08 13:13:36', '2024-12-08 13:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `personal_id` varchar(10) NOT NULL,
  `departament_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `id_number`, `personal_id`, `departament_id`, `first_name`, `last_name`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'D00000001', '722906', 1, 'doki', 'asdfasdf', '044339875', 'dokidoki@gmail.com', '2024-12-06 14:17:04', '2024-12-06 14:17:04'),
(3, 'D00000002', '1233312', 9, 'Test', 'blablalba', '3942834', 'bla@gmail.com', '2024-12-10 16:28:13', '2024-12-10 16:28:13');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2024_12_05_090045_create_departaments_table', 2),
(3, '2024_12_05_085441_create_doctors_table', 3),
(4, '2024_12_05_085459_create_patients_table', 4),
(5, '2024_12_05_085613_create_receptionists_table', 5),
(6, '2024_12_06_120620_create_admins_table', 6),
(7, '2024_12_06_121311_create_technologists_table', 7),
(8, '2024_12_05_085520_create_nurses_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `personal_id` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `id_number`, `personal_id`, `first_name`, `last_name`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'N00000001', '837469', 'motraMedicinale', 'hajri', '044783837', 'nurse1@gmail.com', '2024-12-06 14:17:04', '2024-12-06 14:17:04'),
(2, 'N00000002', '847653', 'Ardina', 'Syla', '45681376', 'Ardi.syl@gmail.com', '2024-12-09 16:19:24', '2024-12-09 16:19:24');

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `personal_id` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `id_number`, `personal_id`, `first_name`, `last_name`, `gender`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'P00000001', '123123', 'dimal', 'hajrizi', 1, '045123987', 'dimal.hajrizi@gmail.com', '2024-12-06 14:17:04', '2024-12-06 14:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `personal_id` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `id_number`, `personal_id`, `first_name`, `last_name`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'R00000001', '830285', 'recepsionistja', 'mbiemri', '045819004', 'rece@icloud.com', '2024-12-06 14:17:04', '2024-12-06 14:17:04'),
(2, 'R00000002', '6637362', 'receptionistti', 'numri 2', '02283412', 'email@gmail.com', '2024-12-10 16:31:13', '2024-12-10 16:31:13');

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
('2ec6C9mWm9ExGal8bduBa28CPdWa84iuP6pEBdL8', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUzA4TlQwUjNzRUxxWnF4V1FodDc2bkpTTWxycG1QZHJJQ3NONUM4RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1733856176);

-- --------------------------------------------------------

--
-- Table structure for table `technologists`
--

CREATE TABLE `technologists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `personal_id` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technologists`
--

INSERT INTO `technologists` (`id`, `id_number`, `personal_id`, `first_name`, `last_name`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'T00000001', '529484', 'teknologi', 'per analiza', '049812874', 'teki@hotmail.com', '2024-12-06 14:17:04', '2024-12-06 14:17:04'),
(2, 'T00000002', '123124', 'techno', 'aaa', '045523498', 'tech@gmail.com', '2024-12-10 16:33:29', '2024-12-10 16:33:29');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departaments`
--
ALTER TABLE `departaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_doctor_id_unique` (`id_number`),
  ADD UNIQUE KEY `doctors_personal_id_unique` (`personal_id`),
  ADD UNIQUE KEY `doctors_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD KEY `doctors_departament_id_foreign` (`departament_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nurses_nurse_id_unique` (`id_number`),
  ADD UNIQUE KEY `nurses_personal_id_unique` (`personal_id`),
  ADD UNIQUE KEY `nurses_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `nurses_email_unique` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_patient_id_unique` (`id_number`),
  ADD UNIQUE KEY `patients_personal_id_unique` (`personal_id`),
  ADD UNIQUE KEY `patients_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `receptionists_receptionists_id_unique` (`id_number`),
  ADD UNIQUE KEY `receptionists_personal_id_unique` (`personal_id`),
  ADD UNIQUE KEY `receptionists_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `receptionists_email_unique` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `technologists`
--
ALTER TABLE `technologists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `technologists_technologist_id_unique` (`id_number`),
  ADD UNIQUE KEY `technologists_personal_id_unique` (`personal_id`),
  ADD UNIQUE KEY `technologists_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `technologists_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departaments`
--
ALTER TABLE `departaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `technologists`
--
ALTER TABLE `technologists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_departament_id_foreign` FOREIGN KEY (`departament_id`) REFERENCES `departaments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
