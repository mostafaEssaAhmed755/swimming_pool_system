-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 سبتمبر 2021 الساعة 22:45
-- إصدار الخادم: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pool`
--

-- --------------------------------------------------------

--
-- بنية الجدول `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance_time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance` enum('present','absent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'present',
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `coaches`
--

CREATE TABLE `coaches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification` bigint(20) NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` bigint(20) NOT NULL,
  `identification` bigint(20) NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joinDate` date DEFAULT NULL,
  `salary` bigint(20) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `fines`
--

CREATE TABLE `fines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `gymnastics`
--

CREATE TABLE `gymnastics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(58, '2014_10_12_000000_create_users_table', 1),
(59, '2014_10_12_100000_create_password_resets_table', 1),
(60, '2019_08_19_000000_create_failed_jobs_table', 1),
(61, '2020_08_1_0_create_jobs_table', 1),
(62, '2020_08_2_0_create_systems_table', 1),
(63, '2020_08_3_0_create_gymnastics_table', 1),
(64, '2020_08_4_0_create_coaches_table', 1),
(65, '2020_08_5_130557_create_student_table', 1),
(66, '2020_08_6_153100_create_employees_table', 1),
(67, '2020_08_7_042353_create_trainingdates_table', 1),
(68, '2021_08_10_133137_create_preparingsessions_table', 1),
(69, '2021_08_11_133955_create_preparingsessions_student_table', 1),
(70, '2021_08_8_124805_create_trainingsessions_table', 1),
(71, '2021_08_9_130917_create_trainingsession_student_table', 1),
(72, '2021_09_06_143531_create_tickets_table', 1),
(73, '2021_09_10_022022_create_attendances_table', 1),
(74, '2021_09_12_040902_create_fines_table', 1),
(75, '2021_09_12_220642_create_salaries_table', 1),
(76, '2021_09_16_205846_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'لوحة-التحكم', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(2, 'انظمة-الاشتراك', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(3, 'تعديل-نظام-الاشتراك', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(4, 'تشغيل-نظام-الاشتراك', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(5, 'كل-الجلسات', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(6, 'تحضير-جلسة', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(7, 'كل-المشتركين', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(8, 'اضافة-مشترك', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(9, 'تعديل-مشترك', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(10, 'حذف-مشترك', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(11, 'كل-الوظائف', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(12, 'اضافة-وظيفة', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(13, 'تعديل-وظيفة', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(14, 'حذف-وظيفة', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(15, 'كل-الموظفين', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(16, 'اضافة-موظف', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(17, 'تعديل-موظف', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(18, 'حذف-موظف', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(19, 'كل-التمارين', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(20, 'اضافة-تمرين', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(21, 'اضافة-موعد-تمرين', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(22, 'تعديل-تمرين', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(23, 'حذف-تمرين', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(24, 'كل-المدربين', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(25, 'اضافة-متدرب', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(26, 'تعديل-متدرب', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(27, 'حذف-متدرب', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(28, 'الحضور-والانصراف', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(29, 'المستخدمين', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(30, 'اضافة-مستخدم', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(31, 'تعديل-مستخدم', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(32, 'حذف-مستخدم', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(33, 'الصلاحيات', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(34, 'اضافة-صلاحية', 'web', '2021-09-17 20:43:53', '2021-09-17 20:43:53'),
(35, 'تعديل-صلاحية', 'web', '2021-09-17 20:43:54', '2021-09-17 20:43:54'),
(36, 'حذف-صلاحية', 'web', '2021-09-17 20:43:54', '2021-09-17 20:43:54');

-- --------------------------------------------------------

--
-- بنية الجدول `preparingsessions`
--

CREATE TABLE `preparingsessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coach_id` bigint(20) UNSIGNED NOT NULL,
  `gymnastic_id` bigint(20) UNSIGNED NOT NULL,
  `trainingdate_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `preparingsessions_student`
--

CREATE TABLE `preparingsessions_student` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `preparingsession_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'سوبر-ادمن', 'web', '2021-09-17 20:43:54', '2021-09-17 20:43:54');

-- --------------------------------------------------------

--
-- بنية الجدول `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=>ذكر,2=>أنثي',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `identification` bigint(20) NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire` date NOT NULL,
  `point` bigint(20) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `parentNam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentNum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_id` bigint(20) UNSIGNED NOT NULL,
  `gymnastic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `systems`
--

CREATE TABLE `systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 =>Monthly , 2 => Quarterly , 3 => midterm , 4 => annual',
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `systems`
--

INSERT INTO `systems` (`id`, `type`, `price`, `quantity`, `active`, `created_at`, `updated_at`) VALUES
(1, '1', 0, 0, 0, '2021-09-17 20:43:54', '2021-09-17 20:43:54'),
(2, '2', 0, 0, 0, '2021-09-17 20:43:54', '2021-09-17 20:43:54'),
(3, '3', 0, 0, 0, '2021-09-17 20:43:54', '2021-09-17 20:43:54'),
(4, '4', 0, 0, 0, '2021-09-17 20:43:54', '2021-09-17 20:43:54');

-- --------------------------------------------------------

--
-- بنية الجدول `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `trainingdates`
--

CREATE TABLE `trainingdates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` enum('1','2','3','4','5','6','7') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=> السبت ,2=>الاحد , 3=>الاتنين , 4=> الثلاثاء , 5=> الاربعاء , 6=>الخميس , 7=>الجمعه ',
  `from` time NOT NULL,
  `to` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>unused,2=>Uses,3=>It was used',
  `gymnastic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `trainingsessions`
--

CREATE TABLE `trainingsessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coach_id` bigint(20) UNSIGNED NOT NULL,
  `gymnastic_id` bigint(20) UNSIGNED NOT NULL,
  `trainingdate_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `trainingsession_student`
--

CREATE TABLE `trainingsession_student` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `trainingsession_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$r2ie6Od8LwBrXa3YUh48yek78jEBu8hIEUA4D.DJTW6wXCH8ifRXK', NULL, '2021-09-17 20:43:54', '2021-09-17 20:43:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coaches_identification_unique` (`identification`),
  ADD UNIQUE KEY `coaches_mobile_unique` (`mobile`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_uid_unique` (`uid`),
  ADD UNIQUE KEY `employees_identification_unique` (`identification`),
  ADD UNIQUE KEY `employees_mobile_1_unique` (`mobile_1`),
  ADD UNIQUE KEY `employees_mobile_2_unique` (`mobile_2`),
  ADD KEY `employees_job_id_foreign` (`job_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gymnastics`
--
ALTER TABLE `gymnastics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `preparingsessions`
--
ALTER TABLE `preparingsessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preparingsessions_coach_id_foreign` (`coach_id`),
  ADD KEY `preparingsessions_gymnastic_id_foreign` (`gymnastic_id`),
  ADD KEY `preparingsessions_trainingdate_id_foreign` (`trainingdate_id`);

--
-- Indexes for table `preparingsessions_student`
--
ALTER TABLE `preparingsessions_student`
  ADD PRIMARY KEY (`student_id`,`preparingsession_id`),
  ADD KEY `preparingsessions_student_preparingsession_id_foreign` (`preparingsession_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_uid_unique` (`uid`),
  ADD UNIQUE KEY `student_identification_unique` (`identification`),
  ADD UNIQUE KEY `student_mobile_unique` (`mobile`),
  ADD KEY `student_system_id_foreign` (`system_id`),
  ADD KEY `student_gymnastic_id_foreign` (`gymnastic_id`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_uid_unique` (`uid`);

--
-- Indexes for table `trainingdates`
--
ALTER TABLE `trainingdates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainingdates_date_from_to_gymnastic_id_unique` (`date`,`from`,`to`,`gymnastic_id`),
  ADD KEY `trainingdates_gymnastic_id_foreign` (`gymnastic_id`);

--
-- Indexes for table `trainingsessions`
--
ALTER TABLE `trainingsessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainingsessions_coach_id_foreign` (`coach_id`),
  ADD KEY `trainingsessions_gymnastic_id_foreign` (`gymnastic_id`),
  ADD KEY `trainingsessions_trainingdate_id_foreign` (`trainingdate_id`);

--
-- Indexes for table `trainingsession_student`
--
ALTER TABLE `trainingsession_student`
  ADD PRIMARY KEY (`student_id`,`trainingsession_id`),
  ADD KEY `trainingsession_student_trainingsession_id_foreign` (`trainingsession_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gymnastics`
--
ALTER TABLE `gymnastics`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `preparingsessions`
--
ALTER TABLE `preparingsessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingdates`
--
ALTER TABLE `trainingdates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingsessions`
--
ALTER TABLE `trainingsessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `preparingsessions`
--
ALTER TABLE `preparingsessions`
  ADD CONSTRAINT `preparingsessions_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preparingsessions_gymnastic_id_foreign` FOREIGN KEY (`gymnastic_id`) REFERENCES `gymnastics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preparingsessions_trainingdate_id_foreign` FOREIGN KEY (`trainingdate_id`) REFERENCES `trainingdates` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `preparingsessions_student`
--
ALTER TABLE `preparingsessions_student`
  ADD CONSTRAINT `preparingsessions_student_preparingsession_id_foreign` FOREIGN KEY (`preparingsession_id`) REFERENCES `preparingsessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preparingsessions_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_gymnastic_id_foreign` FOREIGN KEY (`gymnastic_id`) REFERENCES `gymnastics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_system_id_foreign` FOREIGN KEY (`system_id`) REFERENCES `systems` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `trainingdates`
--
ALTER TABLE `trainingdates`
  ADD CONSTRAINT `trainingdates_gymnastic_id_foreign` FOREIGN KEY (`gymnastic_id`) REFERENCES `gymnastics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `trainingsessions`
--
ALTER TABLE `trainingsessions`
  ADD CONSTRAINT `trainingsessions_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trainingsessions_gymnastic_id_foreign` FOREIGN KEY (`gymnastic_id`) REFERENCES `gymnastics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trainingsessions_trainingdate_id_foreign` FOREIGN KEY (`trainingdate_id`) REFERENCES `trainingdates` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `trainingsession_student`
--
ALTER TABLE `trainingsession_student`
  ADD CONSTRAINT `trainingsession_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trainingsession_student_trainingsession_id_foreign` FOREIGN KEY (`trainingsession_id`) REFERENCES `trainingsessions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
