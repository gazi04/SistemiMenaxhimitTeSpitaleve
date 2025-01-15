-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2025 at 01:57 PM
-- Server version: 11.6.2-MariaDB
-- PHP Version: 8.3.15

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
  `is_employed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_number`, `personal_id`, `name`, `email`, `is_employed`, `created_at`, `updated_at`) VALUES
(3, 'A00000002', '1234', 'gazmend', 'gazi@gmail.com', 1, '2024-12-10 14:02:09', '2024-12-16 10:08:45'),
(4, 'A00000003', '1234', 'tt', 'tt@gmail.com', 1, '2024-12-12 06:29:15', '2025-01-10 12:42:11'),
(5, 'A00000004', '123123', 'gaz', 'gaz@gmail.com', 1, '2024-12-20 04:13:02', '2024-12-20 04:32:18'),
(6, 'A00000005', '44411', 'tt111', 'asdf@gmail.com', 1, '2024-12-20 04:55:36', '2024-12-20 04:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `diagnoses_id` bigint(20) UNSIGNED DEFAULT NULL,
  `therapy_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `diagnoses_id`, `therapy_id`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, NULL, '2025-01-08 10:00:00', '2025-01-08 12:00:00', 'pending', '2025-01-08 19:01:20', '2025-01-08 19:01:20'),
(2, 1, 5, NULL, NULL, '2025-01-08 10:00:00', '2025-01-08 12:00:00', 'pending', '2025-01-08 19:06:51', '2025-01-08 19:06:51'),
(3, 1, 5, NULL, NULL, '2025-01-09 10:00:00', '2025-01-09 12:00:00', 'pending', '2025-01-08 19:18:24', '2025-01-08 19:18:24'),
(4, 1, 1, NULL, NULL, '2025-01-09 10:00:00', '2025-01-09 12:00:00', 'pending', '2025-01-09 06:46:31', '2025-01-09 06:46:31'),
(5, 1, 1, NULL, NULL, '2025-01-16 14:00:00', '2025-01-16 16:00:00', 'pending', '2025-01-09 13:56:09', '2025-01-09 13:56:09'),
(6, 1, 3, NULL, NULL, '2025-01-17 14:00:00', '2025-01-17 16:00:00', 'pending', '2025-01-10 06:08:11', '2025-01-10 06:08:11'),
(7, 1, 1, NULL, NULL, '2025-01-10 14:00:00', '2025-01-10 16:00:00', 'pending', '2025-01-10 12:17:07', '2025-01-10 12:17:07'),
(8, 1, 3, NULL, NULL, '2025-01-11 18:00:00', '2025-01-11 20:00:00', 'pending', '2025-01-11 16:28:08', '2025-01-11 16:28:08'),
(9, 6, 3, NULL, NULL, '2025-01-14 12:00:00', '2025-01-14 14:00:00', 'pending', '2025-01-11 16:53:27', '2025-01-11 16:53:27'),
(10, 1, 3, NULL, NULL, '2025-01-15 08:00:00', '2025-01-15 10:00:00', 'pending', '2025-01-15 05:43:35', '2025-01-15 05:43:35'),
(11, 1, 3, NULL, NULL, '2025-01-15 12:00:00', '2025-01-15 14:00:00', 'pending', '2025-01-15 10:53:25', '2025-01-15 10:53:25'),
(12, 1, 3, 5, 3, '2025-01-15 14:00:00', '2025-01-15 16:00:00', 'completed', '2025-01-15 12:56:52', '2025-01-15 13:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 'test', 'departamenti', '2024-12-08 13:13:36', '2024-12-20 04:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `notes` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `patient_id`, `doctor_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'shkeputje e ligameteve ne krahun e djatht', '2025-01-09 12:44:28', '2025-01-09 12:44:28'),
(2, 1, 3, 'ffd', '2025-01-14 15:57:00', '2025-01-14 15:57:00'),
(3, 1, 3, 'dhimbje koke', '2025-01-15 13:22:47', '2025-01-15 13:22:47'),
(4, 1, 3, 'dhimbje koke', '2025-01-15 13:36:03', '2025-01-15 13:36:03'),
(5, 1, 3, 'dhimbje koke', '2025-01-15 13:37:44', '2025-01-15 13:37:44');

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
  `is_employed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `id_number`, `personal_id`, `departament_id`, `first_name`, `last_name`, `phone_number`, `email`, `is_employed`, `created_at`, `updated_at`) VALUES
(1, 'D00000001', '722906', 1, 'doki', 'do', '044339875', 'dokidoki@gmail.com', 1, '2024-12-06 14:17:04', '2025-01-09 13:05:49'),
(3, 'D00000002', '1233312', 10, 'Test', 'blablalba', '0443942834', 'bla@gmail.com', 1, '2024-12-10 16:28:13', '2025-01-05 15:01:51'),
(5, 'D00000003', '999876', 1, 'www', 'pp', '044673265', 'saa@gmail.com', 1, '2024-12-20 11:03:33', '2024-12-20 12:16:08'),
(6, 'D00000004', '12543', 9, 'eee', 'eee', '84351345', 'edit@gmail.com', 1, '2024-12-20 11:05:37', '2024-12-20 11:05:37');

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
(8, '2024_12_05_085520_create_nurses_table', 8),
(9, '2024_12_15_100818_add_status_to_staff_tables', 9),
(10, '2024_12_15_100819_add_status_to_staff_tables', 10),
(11, '0001_01_01_000001_create_cache_table', 11),
(12, '0001_01_01_000002_create_jobs_table', 11),
(13, '2024_12_05_085715_create_receptions_table', 11),
(14, '2024_12_05_085723_create_tests_table', 11),
(15, '2024_12_05_085842_create_therapies_table', 11),
(16, '2024_12_05_085926_create_diagnoses_table', 11),
(17, '2024_12_05_090011_create_appointments_table', 11),
(18, '2024_12_05_090037_create_stock_table', 11),
(19, '2024_12_05_090100_create_reports_table', 11),
(20, '2024_12_25_220406_add_verification_email_to_patient_table', 11),
(21, '2025_01_08_195958_update_appointments_table', 12),
(22, '2025_01_09_140049_create_diagnoses_table', 13),
(23, '2025_01_09_143433_create_therapies_table', 13),
(24, '2025_01_13_180328_add_therapy_and_diagnose_to_appointments', 14);

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
  `is_employed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `id_number`, `personal_id`, `first_name`, `last_name`, `phone_number`, `email`, `is_employed`, `created_at`, `updated_at`) VALUES
(1, 'N00000001', '837469', 'motraMedicinale', 'hhhh', '049784009', 'hh@gmail.com', 1, '2024-12-06 14:17:04', '2024-12-20 13:31:04'),
(2, 'N00000002', '847653', 'Ardi', 'test', '45681376', 'Ardi.syl@gmail.com', 1, '2024-12-09 16:19:24', '2024-12-20 13:29:15'),
(4, 'N00000003', '1234', 'wtt', 'w', '12314412', 'w@gmail.com', 0, '2024-12-20 15:09:14', '2024-12-20 15:15:03'),
(5, 'N00000004', '2314', 'llll', 'laa', '123789014', 'lala@gmail.com', 1, '2024-12-20 16:12:11', '2024-12-20 16:12:11');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verification_token` varchar(255) DEFAULT NULL,
  `email_verified_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `id_number`, `personal_id`, `first_name`, `last_name`, `gender`, `phone_number`, `email`, `created_at`, `updated_at`, `email_verification_token`, `email_verified_at`) VALUES
(1, 'P00000001', '123123', 'dimal', 'hajrizi', 1, '045123987', 'dimal.hajrizi@gmail.com', '2024-12-06 14:17:04', '2024-12-06 14:17:04', NULL, '2025-01-01'),
(6, 'P00000002', '12342358', 'gazi', 'ha', 1, '045681376', 'gazmendhalili2016@gmail.com', '2024-12-25 07:26:33', '2025-01-09 05:08:46', NULL, '2025-01-09'),
(7, 'P00000003', '1324321', 'ttt', 'kkkk', 0, '923479832', 'tk@gmail.com', '2024-12-26 09:38:17', '2024-12-26 09:38:30', NULL, NULL),
(8, 'P00000004', '2314231', 'llll', 'uuuu', 1, '321784293', 'llu@gmail.com', '2024-12-26 09:50:20', '2024-12-26 11:37:55', NULL, '2024-12-26'),
(10, 'P00000005', '123890', 'pacienti1', 'pac1', 0, '045681372', 'pacienti1@gmail.com', '2025-01-14 17:01:53', '2025-01-14 17:06:07', NULL, '2025-01-14');

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
  `is_employed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `id_number`, `personal_id`, `first_name`, `last_name`, `phone_number`, `email`, `is_employed`, `created_at`, `updated_at`) VALUES
(1, 'R00000001', '830285', 'recepsionistja', 'mbiemri', '045819004', 'rece@icloud.com', 1, '2024-12-06 14:17:04', '2024-12-06 14:17:04'),
(2, 'R00000002', '6637362', 'receptionistti', 'arifi', '04975637', 'edit@gmail.com', 0, '2024-12-10 16:31:13', '2024-12-15 14:42:32'),
(4, 'R00000003', '56566', 'RR', 'rree', '012380412', 're@gmail.com', 1, '2024-12-20 15:43:19', '2024-12-20 15:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `receptions`
--

CREATE TABLE `receptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receptionists_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `notes` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
('8X5SpeR3YeAc8AS5M2kihI7ZJTVjUhUGLpQ6uMk3', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibXc3aGNjUUNqaTFGSUdVUG5MWk42RVVJNHJROG94S1VOY0dxNVQybiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5hZ2UvYXBwb2ludG1lbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1736939698),
('C64vlxp1dOsX3x64LoFp71FwVFT4VLBHZgryvqV3', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlUxVmM4MzN1OHlta1BXRTdXWmVzWU1QUnJnZzJ3RGtLdjFrZlhiTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wYXRpZW50P2lkPTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUzOiJsb2dpbl9kb2N0b3JfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1736948272),
('IZdRQWH4gnjGib5ntntgZHFhO6c6YnMg3FZf52hI', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEQ3aHgxZElrbDh0YmtGWXpLTEdwUTdYbjZnUlpwQWJQeUdZUVlZciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736939698);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(5,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `is_employed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technologists`
--

INSERT INTO `technologists` (`id`, `id_number`, `personal_id`, `first_name`, `last_name`, `phone_number`, `email`, `is_employed`, `created_at`, `updated_at`) VALUES
(1, 'T00000001', '529484', 'emriModifikuar', 'per analiza', '049812874', 'teki@gmail.com', 1, '2024-12-06 14:17:04', '2024-12-15 15:25:39'),
(2, 'T00000002', '123124', 'techno', 'aaa', '045523498', 'tech@gmail.com', 1, '2024-12-10 16:33:29', '2024-12-20 16:07:58'),
(3, 'T00000003', '983214', 'PP', 'ooo', '23409782', 'po@gmail.com', 0, '2024-12-20 16:13:45', '2024-12-20 16:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `technologist_id` bigint(20) UNSIGNED NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `results` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapies`
--

CREATE TABLE `therapies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `notes` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `therapies`
--

INSERT INTO `therapies` (`id`, `patient_id`, `doctor_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'daleron', '2025-01-15 13:22:47', '2025-01-15 13:22:47'),
(2, 1, 3, 'daleron', '2025-01-15 13:36:03', '2025-01-15 13:36:03'),
(3, 1, 3, 'daleron', '2025-01-15 13:37:44', '2025-01-15 13:37:44');

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
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_diagnoses_id_foreign` (`diagnoses_id`),
  ADD KEY `appointments_therapy_id_foreign` (`therapy_id`);

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
-- Indexes for table `departaments`
--
ALTER TABLE `departaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnoses_patient_id_foreign` (`patient_id`),
  ADD KEY `diagnoses_doctor_id_foreign` (`doctor_id`);

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
-- Indexes for table `receptions`
--
ALTER TABLE `receptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receptions_receptionists_id_foreign` (`receptionists_id`),
  ADD KEY `receptions_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stock_item_name_unique` (`item_name`);

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
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_patient_id_foreign` (`patient_id`),
  ADD KEY `tests_technologist_id_foreign` (`technologist_id`);

--
-- Indexes for table `therapies`
--
ALTER TABLE `therapies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `therapies_patient_id_foreign` (`patient_id`),
  ADD KEY `therapies_doctor_id_foreign` (`doctor_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departaments`
--
ALTER TABLE `departaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receptions`
--
ALTER TABLE `receptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technologists`
--
ALTER TABLE `technologists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapies`
--
ALTER TABLE `therapies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_diagnoses_id_foreign` FOREIGN KEY (`diagnoses_id`) REFERENCES `diagnoses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `appointments_therapy_id_foreign` FOREIGN KEY (`therapy_id`) REFERENCES `therapies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD CONSTRAINT `diagnoses_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `diagnoses_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_departament_id_foreign` FOREIGN KEY (`departament_id`) REFERENCES `departaments` (`id`);

--
-- Constraints for table `receptions`
--
ALTER TABLE `receptions`
  ADD CONSTRAINT `receptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `receptions_receptionists_id_foreign` FOREIGN KEY (`receptionists_id`) REFERENCES `receptionists` (`id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `tests_technologist_id_foreign` FOREIGN KEY (`technologist_id`) REFERENCES `technologists` (`id`);

--
-- Constraints for table `therapies`
--
ALTER TABLE `therapies`
  ADD CONSTRAINT `therapies_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `therapies_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
