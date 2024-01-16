-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 07:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycureer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sajjadhossan608@gmail.com', '2024-01-11 03:39:04', '$2a$12$V9tD0lsBjzh1ERncvHWiF.UXmrkC4BebpMVBQfv2WUH8UG7mWTZHS', 'admin', NULL, '2024-01-11 03:39:04', '2024-01-11 03:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `bankaccounts`
--

CREATE TABLE `bankaccounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upozilla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `bname`, `district`, `upozilla`, `address`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Rangpur', 'Rangpur', 'Rangpur Sadar', 'Medical More, Dhap', 1767295313, '2024-01-11 03:41:48', '2024-01-11 03:41:48'),
(2, 'Warehouse', 'warehouse', 'Keraniganj', 'Keraniganj', 1478523695, '2024-01-11 04:34:52', '2024-01-11 04:34:52'),
(3, 'Chittagong', 'Chittagong', 'Chittagong Sadar', 'Chittagong', 1636547895, '2024-01-11 04:39:34', '2024-01-11 04:39:34'),
(4, 'Sylhet', 'Sylhet', 'Sunamganj Sadar', 'Sunamganj Sylhet', 1596598565, '2024-01-11 06:17:28', '2024-01-11 06:17:28'),
(5, 'Khulna', 'Khulna', 'Khulna Sadar', 'Khulna', 1548632555, '2024-01-11 06:24:47', '2024-01-11 06:24:47'),
(6, 'Dhaka', 'Dhaka', 'Dhaka Sadar', 'Purana Paltan, Sharif Plaza', 1254789632, '2024-01-13 05:44:29', '2024-01-13 05:44:29');

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
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `branch_name`, `manager_name`, `father_name`, `mother_name`, `contact`, `email`, `nid`, `address`, `birthday`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Rangpur', 'Rokon Hasan', 'Rafiqul Islam', 'Rita Chowdhury', '01648596325', 'rangpur@gmail.com', '578475655151', 'Paglapir, Rangpur', '2024-01-22', '$2y$10$GRxnFCaE.0obhMnKLHMbHOU.dUtTjZArTfeyRxV.L1R7MP0EgidXG', '2024-01-11 03:49:53', '2024-01-11 03:49:53'),
(2, 'Warehouse', 'Lemon Shah', 'Azizul Haque', 'Lipi Begum', '01236547896', 'warehouse@gmail.com', '452152152451', 'Keraniganj, Dhaka', '2024-01-10', '$2y$10$vgwDQlWGDAcmHrENNoN1Iu7eUvVF53MST9dbMwTOqw2b6aZ25NDR.', '2024-01-11 04:36:12', '2024-01-11 04:36:12'),
(3, 'Chittagong', 'Siam', 'Momidul Islam', 'Lavli Begum', '01457896596', 'chittagong@gmail.com', '578475655145', 'Chittagong Sadar', '2024-01-02', '$2y$10$sd53YtVv3scNjzUdFCSZHuFWpvTkN/WfuNRq6Vyx5CObd7NkaH14G', '2024-01-11 04:41:35', '2024-01-11 04:41:35'),
(4, 'Sylhet', 'Shah Ali', 'Rahmat Ali', 'Shayamoli Akther', '01563256325', 'sylhet@gmail.com', '632598563254', 'Sunamganj Sylhet', '2024-01-15', '$2y$10$xoLVxmmSPo3G5f2YWZRA6.BbaSnnbVVc31ErTY.yUIOUG12gTwXIO', '2024-01-11 06:18:41', '2024-01-11 06:18:41'),
(5, 'Khulna', 'Khokon', 'Khoka', 'Kiara advani', '01547896526', 'khulna@gmail.com', '54685485415', 'Khulna Sadar', '2024-01-10', '$2y$10$WsYaiBvxDbzuMOtEEP9F3enCzbk9S4p.xcv.Ls7tpcX3VQUekx9Qi', '2024-01-11 06:26:35', '2024-01-11 06:26:35'),
(6, 'Dhaka', 'Masud Rana', 'Motaharul Islam', 'Momina Begum', '01478523698', 'dhaka@gmail.com', '548754875484', 'Purana Paltan, Dhaka', '2000-01-02', '$2y$10$cvpXymP0GNOm5cs7TWSdpeqBitSPUNuUjjke9uA2eM6NNf5xyHC4m', '2024-01-13 05:45:53', '2024-01-13 05:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `marchents`
--

CREATE TABLE `marchents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upozilla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `current_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marchents`
--

INSERT INTO `marchents` (`id`, `user_id`, `primary_num`, `local_address`, `upozilla`, `district`, `division`, `created_at`, `updated_at`, `status`, `current_balance`) VALUES
(1, '1', '01767295333', 'Paglapir Rangpur', 'Rangpur Sadar', 'Rangpur', 'Rangpur', '2024-01-11 03:58:51', '2024-01-15 06:35:15', 'Marchent', '0'),
(2, '2', '01580452569', 'Sylhet, Sunamganj', 'Sylhet sadar', 'Sylhet', 'Sylhet', '2024-01-11 06:54:52', '2024-01-11 06:55:17', 'Marchent', NULL),
(3, '3', '01916910514', 'Khulna Sadar', 'Khulna', 'Khulna', 'Khulna', '2024-01-11 08:32:33', '2024-01-11 08:34:35', 'Marchent', NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_25_153859_create_parcel_infos_table', 1),
(6, '2023_12_26_012806_create_admins_table', 1),
(7, '2023_12_26_054731_create_parcel_users_table', 1),
(8, '2023_12_27_042700_create_branches_table', 1),
(9, '2023_12_27_050627_create_managers_table', 1),
(10, '2023_12_28_070214_create_moderators_table', 1),
(11, '2023_12_29_141330_create_marchents_table', 1),
(12, '2023_12_29_180258_create_mobilebankings_table', 1),
(13, '2023_12_30_015250_create_bankaccounts_table', 1),
(14, '2023_12_30_045703_create_pickups_table', 1),
(15, '2024_01_01_100141_add_date_to_pickups_table', 1),
(16, '2024_01_01_130214_add_status_to_marchents_table', 1),
(17, '2024_01_02_082032_create_riders_table', 1),
(18, '2024_01_03_082541_add_entry_by_to_parcel_infos_table', 1),
(19, '2024_01_03_085920_create_trakings_table', 1),
(20, '2024_01_03_113404_add_status_to_trakings_table', 1),
(21, '2024_01_03_123927_add_user_district_to_parcel_infos_table', 1),
(22, '2024_01_04_074614_add_cod_status_to_parcel_infos_table', 1),
(23, '2024_01_04_105723_add_receiving_add_to_parcel_infos_table', 1),
(24, '2024_01_05_080653_add_delivery_rider_to_parcel_infos_table', 1),
(25, '2024_01_06_093203_add_delivared_hub_to_parcel_infos_table', 1),
(26, '2024_01_06_210453_add_paid_cod_to_parcel_infos_table', 1),
(27, '2024_01_07_091546_add_cod_oneparcent_to_parcel_infos_table', 1),
(28, '2024_01_07_093607_add_current_balance_to_marchents_table', 1),
(29, '2024_01_07_154245_add_transaction_to_parcel_infos_table', 1),
(30, '2024_01_07_170001_create_transactions_table', 1),
(31, '2024_01_07_171420_add_status_to_transactions_table', 1),
(32, '2024_01_11_101826_add_pickup_to_pickups_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mobilebankings`
--

CREATE TABLE `mobilebankings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moderator_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parcel_infos`
--

CREATE TABLE `parcel_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policestation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchenge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entry_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `receiving_add` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_rider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivared_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_cod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_oneparcent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_infos`
--

INSERT INTO `parcel_infos` (`id`, `user_id`, `category`, `type`, `contact`, `name`, `address`, `district`, `policestation`, `cod`, `note`, `weight`, `exchenge`, `status`, `created_at`, `updated_at`, `entry_by`, `user_district`, `cod_status`, `receiving_add`, `delivery_rider`, `delivared_branch`, `paid_cod`, `delivery_charge`, `cod_oneparcent`, `transaction`) VALUES
(1, '1', 'express', 'point', '01245632563', 'Akash', 'Chittagong', 'Chittagong', 'Chittagong', '650', NULL, '6', NULL, 'delivared', '2024-01-11 04:31:35', '2024-01-11 04:49:26', 'marchent', 'Rangpur', 'paid', 'Chittagong', '2', 'Chittagong', '424', '220', '6', 'epcp5RKm'),
(2, '1', 'regular', 'home', '015551455444', 'Rustom', 'Sylhet, Sunamganj', 'Sylhet', 'Sylhet', '903', NULL, '9', NULL, 'delivared', '2024-01-11 06:15:38', '2024-01-15 06:35:15', 'manager', 'Rangpur', 'payment_request', 'Sylhet', '7', 'Sylhet', '614', '280', '9', 'hW7LG2sB'),
(3, '1', 'regular', 'home', '01547896523', 'Rokeya', 'Sylhet, sunamganj', 'Sylhet', 'Sylhet sadar', '609', NULL, '6', NULL, 'delivared', '2024-01-11 06:29:36', '2024-01-15 06:35:15', 'marchent', 'Rangpur', 'payment_request', 'Sylhet', '8', 'Sylhet', '373', '230', '6', 'hW7LG2sB'),
(4, '1', 'express', 'point', '01458965874', 'Ratul', 'Mongla, Khulna', 'Khulna', 'Khulna Sadar', '327', NULL, '7', NULL, 'pending', '2024-01-11 06:30:45', '2024-01-11 06:30:45', 'marchent', 'Rangpur', 'pending', NULL, NULL, NULL, NULL, NULL, '3', NULL),
(5, '1', 'express', 'point', '01695845969', 'Kaysar', 'Bagerhat, Khulna', 'Khulna', 'Khulna Sadar', '960', NULL, '5', NULL, 'pending', '2024-01-11 06:31:48', '2024-01-11 06:31:48', 'marchent', 'Rangpur', 'pending', NULL, NULL, NULL, NULL, NULL, '9', NULL),
(6, '2', 'regular', 'home', '01478523695', 'Rahmat Shah', 'Khulna Sadar', 'Khulna', 'Khulna', '9650', NULL, '3', NULL, 'Approved', '2024-01-11 06:56:26', '2024-01-11 10:53:41', 'marchent', 'Sylhet', 'pending', NULL, NULL, NULL, NULL, NULL, '96', NULL),
(7, '2', 'pickdrop', 'home', '01965874523', 'Jui', 'Chittagong', 'Chittagong', 'Chittagong', '920', 'take it Carefully', '2', NULL, 'Approved', '2024-01-11 06:58:06', '2024-01-11 10:53:43', 'marchent', 'Sylhet', 'pending', NULL, NULL, NULL, NULL, NULL, '9', NULL),
(8, '2', 'express', 'home', '01547859652', 'Sabbir', 'Chandpur, Khulna', 'Khulna', 'Khulna', '25500', NULL, '1', NULL, 'received', '2024-01-11 06:58:58', '2024-01-11 11:00:34', 'marchent', 'Sylhet', 'pending', 'Warehouse', NULL, NULL, NULL, NULL, '255', NULL),
(9, '2', 'pickdrop', 'point', '0154785968', 'Shihab Ahmed', 'keraniganj Dhaka', 'Dhaka', 'Dhaka', '1350', NULL, '1.5', NULL, 'sending', '2024-01-11 07:00:11', '2024-01-11 11:00:05', 'marchent', 'Sylhet', 'pending', 'Chittagong', NULL, NULL, NULL, NULL, '13', NULL),
(10, '2', 'regular', 'home', '01659555548', 'Misqat', 'Paglapir Rangpur', 'Rangpur', 'Rangpur Sadar', '640', NULL, '3', NULL, 'pending', '2024-01-11 07:05:20', '2024-01-11 07:05:20', 'marchent', 'Sylhet', 'pending', NULL, NULL, NULL, NULL, NULL, '6', NULL),
(11, '3', 'express', 'point', '015487521548', 'Shakib', 'Paglapir Rangpur', 'Rangpur', 'Rangpur Sadar', '320', NULL, '1', NULL, 'pending', '2024-01-11 08:51:59', '2024-01-11 08:51:59', 'marchent', 'Khulna', 'pending', NULL, NULL, NULL, NULL, NULL, '3', NULL),
(12, '3', 'regular', 'home', '01987456254', 'Rakib', 'Chittagong', 'Chittagong', 'Chittagong', '920', NULL, '3', NULL, 'pending', '2024-01-11 08:53:35', '2024-01-11 08:53:35', 'marchent', 'Khulna', 'pending', NULL, NULL, NULL, NULL, NULL, '9', NULL),
(13, '3', 'regular', 'home', '01362541548', 'Shofiqul', 'Sunamganj, Sylhet', 'Sylhet', 'Sylhet Sadar', '690', NULL, '2', NULL, 'pending', '2024-01-11 08:55:33', '2024-01-11 08:55:33', 'marchent', 'Khulna', 'pending', NULL, NULL, NULL, NULL, NULL, '6', NULL),
(14, '3', 'regular', 'home', '018452145875', 'Keramot', 'Sylhet, Sunamganj', 'Sylhet', 'Sylhet Sadar', '720', NULL, '3', NULL, 'pending', '2024-01-11 08:56:50', '2024-01-11 08:56:50', 'marchent', 'Khulna', 'pending', NULL, NULL, NULL, NULL, NULL, '7', NULL),
(15, '1', 'regular', 'home', '01548754125', 'rocky', 'kustia', 'Kustia', 'Kustia Sadar', '900', NULL, '6', NULL, 'pending', '2024-01-13 05:32:08', '2024-01-13 05:32:08', 'manager', 'Rangpur', 'pending', NULL, NULL, NULL, NULL, '230', NULL, NULL),
(16, '1', 'regular', 'home', '016655555151', 'Tufan', 'Purana Paltan', 'Dhaka', 'Dhaka Sadar', '640', NULL, '5', NULL, 'delivared', '2024-01-13 05:36:17', '2024-01-15 06:35:15', 'manager', 'Rangpur', 'payment_request', 'Dhaka', '13', 'Dhaka', '424', '210', '6', 'hW7LG2sB');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_users`
--

CREATE TABLE `parcel_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parcel_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
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
-- Table structure for table `pickups`
--

CREATE TABLE `pickups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upozilla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickups`
--

INSERT INTO `pickups` (`id`, `user_id`, `primary_num`, `local_address`, `upozilla`, `district`, `division`, `status`, `created_at`, `updated_at`, `date`, `rider`) VALUES
(4, '1', '01767295333', 'Paglapir Rangpur', 'Rangpur Sadar', 'Rangpur', 'Rangpur', 'Done', '2024-01-11 04:27:37', '2024-01-11 04:28:28', '2024-01-11', '1'),
(5, '2', '01580452569', 'Sylhet, Sunamganj', 'Sylhet sadar', 'Sylhet', 'Sylhet', '9', '2024-01-11 06:55:03', '2024-01-11 06:55:29', '2024-01-11', NULL),
(6, '3', '01916910514', 'Khulna Sadar', 'Khulna', 'Khulna', 'Khulna', 'pending', '2024-01-11 08:35:41', '2024-01-11 08:35:41', '2024-01-11', NULL),
(7, '1', '01767295333', 'Paglapir Rangpur', 'Rangpur Sadar', 'Rangpur', 'Rangpur', 'pending', '2024-01-16 05:07:04', '2024-01-16 05:07:04', '2024-01-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `name`, `email`, `email_verified_at`, `password`, `branch`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abdur Rahim', 'rahim@gmail.com', NULL, '$2y$10$4.mvt39y27ut2i6hWlYq4emoyYhIT/7DzTR864alkSFL9xRN/dM/W', 'Rangpur', '01767985965', NULL, '2024-01-11 04:20:43', '2024-01-11 04:20:43'),
(2, 'Haque', 'haque@gmail.com', NULL, '$2y$10$smbCxajY6dm/ajPPFL4MwOOmum2reb5wNakGJU.uMgoBpHcSgTj1G', 'Chittagong', '01654789652', NULL, '2024-01-11 04:42:45', '2024-01-11 04:42:45'),
(3, 'Akash', 'akash@gmail.com', NULL, '$2y$10$jeLxevnHQK.LGNtUFf4tPOLRIPo8QYFx0hsXMq47cmj6H04wZlhJ6', 'Rangpur', '01547848596', NULL, '2024-01-11 06:09:52', '2024-01-11 06:09:52'),
(4, 'Ahmed', 'ahmed@gmail.com', NULL, '$2y$10$mAEKdZKGdDEZYLB7nQR1K.h7ZsFl97HuWo1fEUzOIz4x/sGxhyRg2', 'Rangpur', '01658945784', NULL, '2024-01-11 06:10:29', '2024-01-11 06:10:29'),
(5, 'Ataur Rahman', 'ataur@gmail.com', NULL, '$2y$10$Q8ymyoqlqMjq9mizvntXkOnCYgi4NcoWRIGs0TLyqqmTbYtFQqX7G', 'Chittagong', '01964545151', NULL, '2024-01-11 06:11:58', '2024-01-11 06:11:58'),
(6, 'Rafi Rahman', 'rafi@gmail.com', NULL, '$2y$10$w8Zh3Nadd.0.u1d.bu456eor5fqu5/Eq/FxfyGJPb/4NGjocuhJPS', 'Chittagong', '016598565632', NULL, '2024-01-11 06:12:39', '2024-01-11 06:12:39'),
(7, 'Umar Faruk', 'faruk@gmail.com', NULL, '$2y$10$Jz/hau3LwDrBXsJOTvik4evJ.CLp.TQ3xWOLTt12FfumeFYzOBACS', 'Sylhet', '01546325655', NULL, '2024-01-11 06:22:13', '2024-01-11 06:22:13'),
(8, 'Shihab Ahmed', 'shihab@gmail.com', NULL, '$2y$10$CjKBtn/Kgezi0Tyhpaz7buuQN12FJZbfxANZOW7YlNpyIDRq6MduW', 'Sylhet', '015489632555', NULL, '2024-01-11 06:23:04', '2024-01-11 06:23:04'),
(9, 'Shovon', 'shovon@gmail.com', NULL, '$2y$10$bHQtGYu7Cjut6iqHno7QgOeCqygXhPM55VSz632i83GI0eXRH7Cny', 'Sylhet', '01458693625', NULL, '2024-01-11 06:23:37', '2024-01-11 06:23:37'),
(10, 'Kader Hasan', 'kader@gmail.com', NULL, '$2y$10$V8lUDuo0i6ew3vn9DQWPIeF/DGXnGA28d8xZckKYktSrjPniVGyeu', 'Khulna', '01478523695', NULL, '2024-01-11 08:37:17', '2024-01-11 08:37:17'),
(11, 'Kuddus Ahmed', 'kuddus@gmail.com', NULL, '$2y$10$xC748ksF2P9uW4a4No7omeenHpr3rKMrJbK3zaQONO1V/lRkCwMSW', 'Khulna', '01659554555', NULL, '2024-01-11 08:37:47', '2024-01-11 08:37:47'),
(12, 'Keramot Hasan', 'keramot@gmail.com', NULL, '$2y$10$Imdw2.8oUhGIGoqmMdPqxONhgfyFQwQc5XMGy5CuxfCxtPYr0n8Re', 'Khulna', '01958475425', NULL, '2024-01-11 08:38:31', '2024-01-11 08:38:31'),
(13, 'Rashid Khan', 'rashid@gmail.com', NULL, '$2y$10$jmRBMaN1zSE2L7.gnJLqyOyc5VkNbBen1upkiUQmBn6t8LmrHo5He', 'Dhaka', '01654875412', NULL, '2024-01-13 05:48:07', '2024-01-13 05:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `trakings`
--

CREATE TABLE `trakings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creat_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trakings`
--

INSERT INTO `trakings` (`id`, `user_id`, `parcel_id`, `description`, `creat_by`, `created_at`, `updated_at`, `status`) VALUES
(1, '1', '1', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 04:31:36', '2024-01-11 04:31:36', 'pending'),
(2, '1', '1', 'Parcel Approve By Mr. Rokon Hasan', 'Rangpur Hub Manager', '2024-01-11 04:31:45', '2024-01-11 04:31:45', 'Approved'),
(3, '1', '1', 'Parcel Was send From Rangpur To Warehouse', 'Rangpur Hub Manager ', '2024-01-11 04:38:16', '2024-01-11 04:38:16', 'sending'),
(4, '1', '1', 'Parcel Was received', 'Warehouse Hub Manager ', '2024-01-11 04:38:35', '2024-01-11 04:38:35', 'received'),
(5, '1', '1', 'Parcel Was send From Warehouse To Chittagong', 'Warehouse Hub Manager ', '2024-01-11 04:41:48', '2024-01-11 04:41:48', 'sending'),
(6, '1', '1', 'Parcel Was received', 'Chittagong Hub Manager ', '2024-01-11 04:42:10', '2024-01-11 04:42:10', 'received'),
(7, '1', '1', 'Rider Name Haque Contact 01654789652 Rider Assigned by Siam', 'Chittagong Hub Manager ', '2024-01-11 04:42:54', '2024-01-11 04:42:54', 'Rider Assigned'),
(8, '1', '1', 'Parcel Delivery Done By Rider Haque Contact 01654789652', 'Rider Haque', '2024-01-11 04:43:21', '2024-01-11 04:43:21', 'Delivared'),
(9, '1', '1', 'Parcel Cod Added Marchent Account. Account added Balance is 424 and Delivery charge is 220 and COD 1 % is 6', 'Added By Admin', '2024-01-11 04:47:41', '2024-01-11 04:47:41', 'Balance Added'),
(10, '1', '2', ' Parcel Entry By ', 'Rangpur Hub Manager', '2024-01-11 06:15:38', '2024-01-11 06:15:38', 'pending'),
(11, '1', '2', 'Parcel Approve By Mr. Rokon Hasan', 'Rangpur Hub Manager', '2024-01-11 06:19:16', '2024-01-11 06:19:16', 'Approved'),
(12, '1', '2', 'Parcel Was send From Rangpur To Warehouse', 'Rangpur Hub Manager ', '2024-01-11 06:20:23', '2024-01-11 06:20:23', 'sending'),
(13, '1', '2', 'Parcel Was received', 'Warehouse Hub Manager ', '2024-01-11 06:20:32', '2024-01-11 06:20:32', 'received'),
(14, '1', '2', 'Parcel Was send From Warehouse To Sylhet', 'Warehouse Hub Manager ', '2024-01-11 06:20:42', '2024-01-11 06:20:42', 'sending'),
(15, '1', '2', 'Parcel Was received', 'Sylhet Hub Manager ', '2024-01-11 06:21:14', '2024-01-11 06:21:14', 'received'),
(16, '1', '3', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 06:29:36', '2024-01-11 06:29:36', 'pending'),
(17, '1', '4', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 06:30:45', '2024-01-11 06:30:45', 'pending'),
(18, '1', '5', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 06:31:48', '2024-01-11 06:31:48', 'pending'),
(19, '2', '6', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 06:56:26', '2024-01-11 06:56:26', 'pending'),
(20, '2', '7', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 06:58:06', '2024-01-11 06:58:06', 'pending'),
(21, '2', '8', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 06:58:58', '2024-01-11 06:58:58', 'pending'),
(22, '2', '9', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 07:00:11', '2024-01-11 07:00:11', 'pending'),
(23, '2', '10', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 07:05:20', '2024-01-11 07:05:20', 'pending'),
(24, '3', '11', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 08:51:59', '2024-01-11 08:51:59', 'pending'),
(25, '3', '12', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 08:53:35', '2024-01-11 08:53:35', 'pending'),
(26, '3', '13', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 08:55:33', '2024-01-11 08:55:33', 'pending'),
(27, '3', '14', 'Parcel Inserted By Marchent', 'Marchent', '2024-01-11 08:56:50', '2024-01-11 08:56:50', 'pending'),
(28, '2', '6', 'Parcel Approve By Mr. Shah Ali', 'Sylhet Hub Manager', '2024-01-11 10:53:41', '2024-01-11 10:53:41', 'Approved'),
(29, '2', '7', 'Parcel Approve By Mr. Shah Ali', 'Sylhet Hub Manager', '2024-01-11 10:53:44', '2024-01-11 10:53:44', 'Approved'),
(30, '2', '8', 'Parcel Approve By Mr. Shah Ali', 'Sylhet Hub Manager', '2024-01-11 10:53:49', '2024-01-11 10:53:49', 'Approved'),
(31, '2', '9', 'Parcel Approve By Mr. Shah Ali', 'Sylhet Hub Manager', '2024-01-11 10:54:51', '2024-01-11 10:54:51', 'Approved'),
(32, '2', '9', 'Parcel Was send From Sylhet To Chittagong', 'Sylhet Hub Manager ', '2024-01-11 11:00:05', '2024-01-11 11:00:05', 'sending'),
(33, '2', '8', 'Parcel Was send From Sylhet To Warehouse', 'Sylhet Hub Manager ', '2024-01-11 11:00:09', '2024-01-11 11:00:09', 'sending'),
(34, '2', '8', 'Parcel Was received', 'Warehouse Hub Manager ', '2024-01-11 11:00:34', '2024-01-11 11:00:34', 'received'),
(35, '1', '15', ' Parcel Entry By ', 'Rangpur Hub Manager', '2024-01-13 05:32:08', '2024-01-13 05:32:08', 'pending'),
(36, '1', '16', ' Parcel Entry By ', 'Rangpur Hub Manager', '2024-01-13 05:36:17', '2024-01-13 05:36:17', 'pending'),
(37, '1', '3', 'Parcel Approve By Mr. Rokon Hasan', 'Rangpur Hub Manager', '2024-01-13 05:38:23', '2024-01-13 05:38:23', 'Approved'),
(38, '1', '3', 'Parcel Was send From Rangpur To Warehouse', 'Rangpur Hub Manager ', '2024-01-13 05:38:37', '2024-01-13 05:38:37', 'sending'),
(39, '1', '3', 'Parcel Was received', 'Warehouse Hub Manager ', '2024-01-13 05:39:09', '2024-01-13 05:39:09', 'received'),
(40, '1', '3', 'Parcel Was send From Warehouse To Sylhet', 'Warehouse Hub Manager ', '2024-01-13 05:40:40', '2024-01-13 05:40:40', 'sending'),
(41, '1', '3', 'Parcel Was received', 'Sylhet Hub Manager ', '2024-01-13 05:41:42', '2024-01-13 05:41:42', 'received'),
(42, '1', '2', 'Rider Name Umar Faruk Contact 01546325655 Rider Assigned by Shah Ali', 'Sylhet Hub Manager ', '2024-01-13 05:42:01', '2024-01-13 05:42:01', 'Rider Assigned'),
(43, '1', '2', 'Parcel Delivery Done By Rider Umar Faruk Contact 01546325655', 'Rider Umar Faruk', '2024-01-13 05:42:30', '2024-01-13 05:42:30', 'Delivared'),
(44, '1', '16', 'Parcel Approve By Mr. Rokon Hasan', 'Rangpur Hub Manager', '2024-01-13 05:43:22', '2024-01-13 05:43:22', 'Approved'),
(45, '1', '16', 'Parcel Was send From Rangpur To Warehouse', 'Rangpur Hub Manager ', '2024-01-13 05:43:38', '2024-01-13 05:43:38', 'sending'),
(46, '1', '16', 'Parcel Was received', 'Warehouse Hub Manager ', '2024-01-13 05:46:03', '2024-01-13 05:46:03', 'received'),
(47, '1', '16', 'Parcel Was send From Warehouse To Dhaka', 'Warehouse Hub Manager ', '2024-01-13 05:46:19', '2024-01-13 05:46:19', 'sending'),
(48, '1', '16', 'Parcel Was received', 'Dhaka Hub Manager ', '2024-01-13 05:46:59', '2024-01-13 05:46:59', 'received'),
(49, '1', '16', 'Rider Name Rashid Khan Contact 01654875412 Rider Assigned by Masud Rana', 'Dhaka Hub Manager ', '2024-01-13 05:48:18', '2024-01-13 05:48:18', 'Rider Assigned'),
(50, '1', '16', 'Parcel Delivery Done By Rider Rashid Khan Contact 01654875412', 'Rider Rashid Khan', '2024-01-13 05:48:55', '2024-01-13 05:48:55', 'Delivared'),
(51, '1', '16', 'Parcel Cod Added Marchent Account. Account added Balance is 424 and Delivery charge is 210 and COD 1 % is 6', 'Added By Admin', '2024-01-13 05:53:19', '2024-01-13 05:53:19', 'Balance Added'),
(52, '1', '3', 'Rider Name Shihab Ahmed Contact 015489632555 Rider Assigned by Shah Ali', 'Sylhet Hub Manager ', '2024-01-15 06:26:42', '2024-01-15 06:26:42', 'Rider Assigned'),
(53, '1', '3', 'Parcel Delivery Done By Rider Shihab Ahmed Contact 015489632555', 'Rider Shihab Ahmed', '2024-01-15 06:27:25', '2024-01-15 06:27:25', 'Delivared'),
(54, '1', '2', 'Parcel Cod Added Marchent Account. Account added Balance is 614 and Delivery charge is 280 and COD 1 % is 9', 'Added By Admin', '2024-01-15 06:32:17', '2024-01-15 06:32:17', 'Balance Added'),
(55, '1', '3', 'Parcel Cod Added Marchent Account. Account added Balance is 373 and Delivery charge is 230 and COD 1 % is 6', 'Added By Admin', '2024-01-15 06:34:25', '2024-01-15 06:34:25', 'Balance Added');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tnx_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `current_balance`, `pay_method`, `account_name`, `account_no`, `tnx_id`, `created_at`, `updated_at`, `status`) VALUES
(1, '1', '424', 'Mobile Bangking', 'Bkash', '01765986256', 'epcp5RKm', '2024-01-11 04:48:36', '2024-01-11 04:49:26', 'paid'),
(2, '1', '1411', 'Mobile Bangking', 'Bkash', '01548765211', 'hW7LG2sB', '2024-01-15 06:35:15', '2024-01-15 06:35:15', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Sajjad Hossan', 'sajjadhossan608@gmail.com', NULL, '$2y$10$8f6dWcxmoRPdjK.lDYBOl.JHYcpBal270iAlVriHcqtaPk.FuXoRW', NULL, '2024-01-11 03:10:22', '2024-01-11 03:10:22'),
(2, 'Back Bencher', 'bbencher616@gmail.com', NULL, '$2y$10$qbAytOd.hicvvJ8HnYIRUuIcQQE8qpFWhc2t5yNlQ77K2pV/DlKPO', NULL, '2024-01-11 06:46:06', '2024-01-11 06:46:06'),
(3, 'Rifat Hasan', 'rifat@gmail.com', NULL, '$2y$10$CalqCJV7wdTX94jjnxc73O8GiqRPOQMm4LTBbSlMsUTvMbkbBbKDm', NULL, '2024-01-11 08:31:58', '2024-01-11 08:31:58');

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
-- Indexes for table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marchents`
--
ALTER TABLE `marchents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobilebankings`
--
ALTER TABLE `mobilebankings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_infos`
--
ALTER TABLE `parcel_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_users`
--
ALTER TABLE `parcel_users`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pickups`
--
ALTER TABLE `pickups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `riders_email_unique` (`email`);

--
-- Indexes for table `trakings`
--
ALTER TABLE `trakings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marchents`
--
ALTER TABLE `marchents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `mobilebankings`
--
ALTER TABLE `mobilebankings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parcel_infos`
--
ALTER TABLE `parcel_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `parcel_users`
--
ALTER TABLE `parcel_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickups`
--
ALTER TABLE `pickups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trakings`
--
ALTER TABLE `trakings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
