-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 08:49 PM
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
-- Database: `learn-online-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_logs`
--

CREATE TABLE `access_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `actionName` varchar(100) DEFAULT NULL,
  `workingDomain` varchar(100) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `reference` varchar(150) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_logs`
--

INSERT INTO `access_logs` (`id`, `userId`, `actionName`, `workingDomain`, `note`, `reference`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'Successful Login Attempt', 'System', '', NULL, 2, 2, '2024-10-19 18:11:17', '2024-10-19 18:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `access_permission`
--

CREATE TABLE `access_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `userRole` varchar(100) DEFAULT NULL,
  `permission` varchar(100) DEFAULT NULL,
  `accessPermissionStatus` varchar(10) DEFAULT 'ACTIVE',
  `createdBy` int(11) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_permission`
--

INSERT INTO `access_permission` (`id`, `userRole`, `permission`, `accessPermissionStatus`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 'ADMIN', 'question', 'ACTIVE', NULL, NULL, '2024-10-19 18:30:26', '2024-10-19 18:30:26'),
(2, 'ADMIN', 'add-question', 'ACTIVE', NULL, NULL, '2024-10-19 18:30:30', '2024-10-19 18:30:30'),
(3, 'ADMIN', 'store-question', 'ACTIVE', NULL, NULL, '2024-10-19 18:30:35', '2024-10-19 18:30:35'),
(4, 'ADMIN', 'show-question', 'ACTIVE', NULL, NULL, '2024-10-19 18:30:39', '2024-10-19 18:30:39'),
(5, 'ADMIN', 'edit-question', 'ACTIVE', NULL, NULL, '2024-10-19 18:30:43', '2024-10-19 18:30:43'),
(6, 'ADMIN', 'update-question', 'ACTIVE', NULL, NULL, '2024-10-19 18:30:47', '2024-10-19 18:30:47'),
(7, 'ADMIN', 'delete-question', 'ACTIVE', NULL, NULL, '2024-10-19 18:30:52', '2024-10-19 18:30:52'),
(8, 'ADMIN', 'gat-all-question', 'ACTIVE', NULL, NULL, '2024-10-19 18:30:55', '2024-10-19 18:30:55'),
(9, 'ADMIN', 'answerkey', 'ACTIVE', NULL, NULL, '2024-10-19 18:31:01', '2024-10-19 18:31:01'),
(10, 'ADMIN', 'add-answerkey', 'ACTIVE', NULL, NULL, '2024-10-19 18:31:07', '2024-10-19 18:31:07'),
(11, 'ADMIN', 'store-answerkey', 'ACTIVE', NULL, NULL, '2024-10-19 18:31:12', '2024-10-19 18:31:12'),
(12, 'ADMIN', 'show-answerkey', 'ACTIVE', NULL, NULL, '2024-10-19 18:31:18', '2024-10-19 18:31:18'),
(13, 'ADMIN', 'edit-answerkey', 'ACTIVE', NULL, NULL, '2024-10-19 18:31:23', '2024-10-19 18:31:23'),
(14, 'ADMIN', 'update-answerkey', 'ACTIVE', NULL, NULL, '2024-10-19 18:31:28', '2024-10-19 18:31:28'),
(15, 'ADMIN', 'delete-answerkey', 'ACTIVE', NULL, NULL, '2024-10-19 18:31:34', '2024-10-19 18:31:34'),
(16, 'ADMIN', 'gat-all-answerkey', 'ACTIVE', NULL, NULL, '2024-10-19 18:31:35', '2024-10-19 18:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `access_register`
--

CREATE TABLE `access_register` (
  `id` int(11) NOT NULL,
  `entityCategory` varchar(50) DEFAULT NULL,
  `titleNote` varchar(255) DEFAULT NULL,
  `entityId` int(11) DEFAULT NULL,
  `visitorIP` varchar(15) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answerkey`
--

CREATE TABLE `answerkey` (
  `id` int(11) NOT NULL,
  `answerBody` varchar(100) DEFAULT NULL,
  `answerType` varchar(100) DEFAULT NULL,
  `answerkeyStatus` varchar(20) DEFAULT NULL,
  `entityObjectOrder` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(50) DEFAULT NULL,
  `peopleCategory` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT 'uploads/images/persons/dummy-person-photo.png',
  `email` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `contactNo` varchar(11) DEFAULT NULL,
  `shortJobDescription` varchar(1000) DEFAULT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `facultyName` varchar(100) DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `departmentName` varchar(100) DEFAULT NULL,
  `passingYear` varchar(4) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `officeName` varchar(100) DEFAULT NULL,
  `committeeName` varchar(100) DEFAULT NULL,
  `committee_id` int(11) DEFAULT NULL,
  `profileLink` varchar(255) DEFAULT NULL,
  `joinDate` timestamp NULL DEFAULT NULL,
  `employmentType` varchar(50) DEFAULT NULL,
  `peopleStatus` varchar(50) DEFAULT 'ACTIVE',
  `peopleOrder` int(11) DEFAULT NULL,
  `websiteValidity` varchar(50) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `position` varchar(50) DEFAULT NULL,
  `institutionName` varchar(100) DEFAULT NULL,
  `centerName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission` varchar(100) DEFAULT NULL,
  `permissionStatus` varchar(10) DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `permission`, `permissionStatus`, `created_at`, `updated_at`) VALUES
(1, 'question', 'ACTIVE', NULL, NULL),
(2, 'add-question', 'ACTIVE', NULL, NULL),
(3, 'store-question', 'ACTIVE', NULL, NULL),
(4, 'show-question', 'ACTIVE', NULL, NULL),
(5, 'edit-question', 'ACTIVE', NULL, NULL),
(6, 'update-question', 'ACTIVE', NULL, NULL),
(7, 'delete-question', 'ACTIVE', NULL, NULL),
(8, 'gat-all-question', 'ACTIVE', NULL, NULL),
(9, 'answerkey', 'ACTIVE', NULL, NULL),
(10, 'add-answerkey', 'ACTIVE', NULL, NULL),
(11, 'store-answerkey', 'ACTIVE', NULL, NULL),
(12, 'show-answerkey', 'ACTIVE', NULL, NULL),
(13, 'edit-answerkey', 'ACTIVE', NULL, NULL),
(14, 'update-answerkey', 'ACTIVE', NULL, NULL),
(15, 'delete-answerkey', 'ACTIVE', NULL, NULL),
(16, 'gat-all-answerkey', 'ACTIVE', NULL, NULL);

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
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `questionBody` varchar(100) DEFAULT NULL,
  `questionType` varchar(100) DEFAULT NULL,
  `questionStatus` varchar(20) DEFAULT NULL,
  `entityObjectOrder` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `roleStatus` varchar(10) DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `roleStatus`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'ACTIVE', NULL, NULL),
(2, 'Admin', 'ACTIVE', NULL, NULL),
(3, 'User ', 'ACTIVE', NULL, NULL),
(4, 'Guest', 'ACTIVE', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `system_key_table`
--

CREATE TABLE `system_key_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `infoKeyName` varchar(100) DEFAULT NULL,
  `infoKeyValue` varchar(1000) DEFAULT NULL,
  `infoKeyStatus` varchar(25) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `userContactNo` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `userRole` varchar(20) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `userType` varchar(20) DEFAULT NULL,
  `userStatus` varchar(15) DEFAULT 'INACTIVE',
  `systemUniqueId` int(11) DEFAULT NULL,
  `userPhoto` varchar(500) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `userContactNo`, `password`, `userRole`, `designation`, `department_id`, `department`, `userType`, `userStatus`, `systemUniqueId`, `userPhoto`, `createdBy`, `updatedBy`, `created_at`, `updated_at`) VALUES
(2, 'Saidur', 'saidur@eduinntech.com', '01852012518', '912ec803b2ce49e4a541068d495ab570', 'Admin', NULL, 9, 'EIT SU', NULL, 'ACTIVE', 20230922, 'uploads/images/user-profile/2_1694149624_user-pro-photo.png', 12, NULL, '2023-07-31 16:51:51', NULL),
(14, 'Miyaz Sabiq', 'sabiq@eduinntech.com', NULL, '912ec803b2ce49e4a541068d495ab570', 'User', 'Programmer', 9, 'EIT SU', NULL, 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Musab Al Wassi', 'musab@eduinntech.com', NULL, '912ec803b2ce49e4a541068d495ab570', 'User', 'Engineer', 9, 'EIT SU', NULL, 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Ellie Brooks', 'ellie.brooks@eit.su.bd', NULL, '912ec803b2ce49e4a541068d495ab570', 'Faculty Member', 'Assistant Professor', 15, 'Department Of Law', NULL, 'ACTIVE', 144, NULL, 2, NULL, '2024-08-31 04:22:39', '2024-08-31 04:22:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_logs`
--
ALTER TABLE `access_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_permission`
--
ALTER TABLE `access_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_register`
--
ALTER TABLE `access_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answerkey`
--
ALTER TABLE `answerkey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_logs`
--
ALTER TABLE `access_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `access_permission`
--
ALTER TABLE `access_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `access_register`
--
ALTER TABLE `access_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answerkey`
--
ALTER TABLE `answerkey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
