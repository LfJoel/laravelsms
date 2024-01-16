-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 05:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_class_teacher`
--

DROP TABLE IF EXISTS `assign_class_teacher`;
CREATE TABLE `assign_class_teacher` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_class_teacher`
--

INSERT INTO `assign_class_teacher` (`id`, `class_id`, `teacher_id`, `status`, `is_delete`, `created_at`, `updated_at`, `created_by`) VALUES
(25, 8, 2, 0, 0, '2023-12-01 10:27:19', '2023-12-01 10:27:19', 1),
(26, 7, 2, 0, 0, '2023-12-02 10:26:18', '2023-12-02 10:26:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `is_delete` tinyint(4) DEFAULT 0 COMMENT '0:not , 1:yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `amount`, `status`, `created_by`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'abcde', 0, 0, 1, 1, '2023-11-25 11:22:53', '2023-11-25 12:03:17'),
(2, 'abcd', 2342343, 0, 1, 0, '2023-11-25 12:03:29', '2023-12-08 11:26:27'),
(3, '10 th', 0, 0, 1, 1, '2023-11-26 06:43:10', '2023-11-26 06:43:53'),
(4, 'tamil', 2343243, 0, 1, 0, '2023-11-26 06:47:13', '2023-12-08 11:26:19'),
(5, 'one', 32423423, 0, 1, 0, '2023-11-26 08:23:11', '2023-12-08 11:26:10'),
(6, 'two', 234823, 0, 1, 0, '2023-11-26 08:23:17', '2023-12-08 11:26:03'),
(7, 'three', 1000000, 0, 1, 0, '2023-11-26 08:23:22', '2023-12-08 11:25:54'),
(8, 'four', 60000, 0, 1, 0, '2023-11-26 08:23:28', '2023-12-08 11:25:47'),
(9, 'first standard', 100000, 0, 1, 0, '2023-12-08 11:23:15', '2023-12-08 11:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

DROP TABLE IF EXISTS `class_subject`;
CREATE TABLE `class_subject` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `created_by`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(45, 8, 14, 1, 0, 0, '2023-12-01 10:38:11', '2023-12-01 10:38:11'),
(46, 8, 13, 1, 0, 0, '2023-12-01 10:38:11', '2023-12-01 10:38:11'),
(47, 7, 15, 1, 0, 0, '2023-12-02 10:26:40', '2023-12-02 10:26:40'),
(48, 7, 16, 1, 0, 0, '2023-12-02 10:26:40', '2023-12-02 10:26:40'),
(49, 7, 17, 1, 0, 0, '2023-12-02 10:26:40', '2023-12-02 10:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_timetable`
--

DROP TABLE IF EXISTS `class_subject_timetable`;
CREATE TABLE `class_subject_timetable` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject_timetable`
--

INSERT INTO `class_subject_timetable` (`id`, `class_id`, `subject_id`, `week_id`, `start_time`, `end_time`, `room_number`, `created_at`, `updated_at`) VALUES
(44, 8, 46, 1, '16:01', '16:09', '1', '2023-12-01 10:38:51', '2023-12-01 10:38:51'),
(45, 8, 46, 2, '16:09', '16:08', '1', '2023-12-01 10:38:51', '2023-12-01 10:38:51'),
(46, 8, 13, 1, '16:18', '16:17', '1', '2023-12-01 10:45:58', '2023-12-01 10:45:58'),
(47, 8, 13, 2, '16:16', '18:15', '1', '2023-12-01 10:45:58', '2023-12-01 10:45:58'),
(48, 8, 14, 1, '16:20', '17:20', '1', '2023-12-01 10:50:38', '2023-12-01 10:50:38'),
(49, 8, 14, 2, '16:21', '17:20', '1', '2023-12-01 10:50:38', '2023-12-01 10:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `note`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'first term 2022/2023', '', 0, 1, '2023-12-01 13:58:01', '2023-12-01 14:23:47'),
(2, 'test 1', 'note 1 Updated', 0, 1, '2023-12-01 13:58:11', '2023-12-01 14:13:35'),
(3, 'first term 2023/2024', '', 0, 1, '2023-12-01 14:24:05', '2023-12-01 14:24:05'),
(4, 'first term 2024/2025', '', 0, 1, '2023-12-01 14:24:21', '2023-12-01 14:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

DROP TABLE IF EXISTS `exam_schedule`;
CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `start_time` varchar(25) DEFAULT NULL,
  `end_time` varchar(25) DEFAULT NULL,
  `room_number` varchar(25) DEFAULT NULL,
  `full_marks` varchar(25) DEFAULT NULL,
  `passing_mark` varchar(25) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `exam_id`, `class_id`, `subject_id`, `exam_date`, `start_time`, `end_time`, `room_number`, `full_marks`, `passing_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 1, 8, 14, '2023-12-02', '13:05', '15:05', '1', '100', '35', 1, '2023-12-02 07:35:58', '2023-12-02 07:35:58'),
(4, 1, 8, 13, '2023-12-02', '15:05', '17:05', '1', '100', '35', 1, '2023-12-02 07:35:58', '2023-12-02 07:35:58'),
(5, 3, 8, 14, '2024-01-02', '09:50', '11:47', '1', '100', '35', 1, '2023-12-02 10:17:39', '2023-12-02 10:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
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
-- Table structure for table `homework`
--

DROP TABLE IF EXISTS `homework`;
CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `homework_date` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `class_id`, `subject_id`, `homework_date`, `submission_date`, `description`, `document_file`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 7, 15, '0000-00-00', '0000-00-00', '<p><b>ertfe twtr rt y tey ty tey try rty</b></p>', '20231207012433g7y55mrbtiurqaztpojs.png', 1, 1, '2023-12-07 13:24:33', '2023-12-07 14:13:45'),
(3, 7, 16, '0000-00-00', '0000-00-00', '<p>hi</p>', '202312070126546exzownf5wflklqvsvew.png', 1, 1, '2023-12-07 13:26:54', '2023-12-07 14:13:47'),
(4, 8, 13, '2023-12-07', '2023-12-31', '<p>iuogoiuh</p>', NULL, 0, 1, '2023-12-07 14:08:10', '2023-12-07 14:12:17'),
(5, 7, 15, '2024-01-01', '2023-12-31', 'teacher update', NULL, 0, 2, '2023-12-07 14:54:51', '2023-12-07 15:08:27'),
(6, 8, 14, '2023-12-07', '2023-12-07', '<p>student homework</p>', '2023120704041122cmwytm1ei66zn9dd2e.png', 0, 1, '2023-12-07 16:04:11', '2023-12-07 16:04:11'),
(7, 8, 14, '2023-12-07', '2023-12-07', '<p>student homework</p>', '20231207040411ruw07mql1yzpgoxv6sro.png', 0, 1, '2023-12-07 16:04:11', '2023-12-07 16:04:11'),
(8, 8, 13, '2023-12-19', '2023-12-30', '<p>new</p>', NULL, 0, 1, '2023-12-07 16:06:55', '2023-12-07 16:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `homework_submit`
--

DROP TABLE IF EXISTS `homework_submit`;
CREATE TABLE `homework_submit` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homework_submit`
--

INSERT INTO `homework_submit` (`id`, `homework_id`, `student_id`, `description`, `document_file`, `created_at`, `updated_at`) VALUES
(1, 8, 3, '<p>i have attached document please check it</p>', '20231207043023mk4yhb20extdxiskz4du.png', '2023-12-07 16:30:23', '2023-12-07 16:30:23'),
(2, 4, 3, '<p>we have attached</p>', '202312070441030hbkkcack8optfek7ym5.png', '2023-12-07 16:41:03', '2023-12-07 16:41:03'),
(3, 7, 3, '<p>tjrgj</p>', '20231208061929pjvrlcwctb1lhdp0iob9.png', '2023-12-08 06:19:29', '2023-12-08 06:19:29'),
(4, 6, 3, '<p>new homework check</p>', '20231208100924jntryzyjzt3bkiqwp6pz.png', '2023-12-08 10:09:24', '2023-12-08 10:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grade`
--

DROP TABLE IF EXISTS `marks_grade`;
CREATE TABLE `marks_grade` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `percent_from` int(11) NOT NULL DEFAULT 0,
  `percent_to` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_grade`
--

INSERT INTO `marks_grade` (`id`, `name`, `percent_from`, `percent_to`, `created_at`, `updated_at`, `created_by`) VALUES
(3, 'E', 0, 35, '2023-12-05 15:30:27', '2023-12-05 15:31:27', 1),
(4, 'D', 35, 50, '2023-12-05 15:30:40', '2023-12-05 15:31:52', 1),
(5, 'C', 50, 70, '2023-12-05 15:30:53', '2023-12-05 15:30:53', 1),
(6, 'B', 70, 85, '2023-12-05 15:31:09', '2023-12-05 15:31:47', 1),
(7, 'A', 85, 100, '2023-12-05 15:31:41', '2023-12-05 15:31:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marks_register`
--

DROP TABLE IF EXISTS `marks_register`;
CREATE TABLE `marks_register` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_work` int(11) DEFAULT 0,
  `home_work` int(11) NOT NULL DEFAULT 0,
  `test_work` int(11) NOT NULL DEFAULT 0,
  `exam` int(11) NOT NULL DEFAULT 0,
  `full_marks` int(11) NOT NULL DEFAULT 0,
  `passing_mark` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_register`
--

INSERT INTO `marks_register` (`id`, `student_id`, `exam_id`, `class_id`, `subject_id`, `class_work`, `home_work`, `test_work`, `exam`, `full_marks`, `passing_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 8, 14, 22, 20, 20, 15, 100, 35, 1, '2023-12-09 15:44:48', '2023-12-10 11:42:23'),
(2, 3, 1, 8, 13, 20, 40, 20, 10, 100, 35, 1, '2023-12-09 15:45:00', '2023-12-10 11:40:12'),
(3, 3, 3, 8, 14, 20, 20, 20, 15, 100, 35, 1, '2023-12-09 15:54:03', '2023-12-09 15:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

DROP TABLE IF EXISTS `notice_board`;
CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `title`, `notice_date`, `publish_date`, `message`, `created_at`, `updated_at`, `created_by`) VALUES
(4, 'dsfdsf', '2023-12-06', '2024-01-08', 'rtrweat 4te t retre treyt ry r yre yarye yr y reya y', '2023-12-06 14:46:55', '2023-12-06 14:46:55', 1),
(5, 'uyu', '2023-12-25', '2023-12-30', 'rtytytrytrytytutut', '2023-12-06 15:27:38', '2023-12-06 15:27:38', 1),
(6, 'test', '2023-12-06', '2023-12-07', NULL, '2023-12-06 15:39:20', '2023-12-07 05:02:05', 1),
(7, 'test 1', '2023-12-23', '2023-12-19', 'rwetrtr wertrtrwe rwet rw  wetewt', '2023-12-06 15:42:09', '2023-12-06 15:42:09', 1),
(8, 'sports', '2023-12-07', '2023-12-07', 'hello this is my first note', '2023-12-07 06:56:09', '2023-12-07 06:56:09', 1),
(9, 'teacher note', '2023-12-07', '2023-12-07', 'hello teacher', '2023-12-07 07:18:01', '2023-12-07 07:18:01', 1),
(10, 'parent', '2023-12-07', '2023-12-07', 'hello parent', '2023-12-07 07:25:21', '2023-12-07 07:25:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board_message`
--

DROP TABLE IF EXISTS `notice_board_message`;
CREATE TABLE `notice_board_message` (
  `id` int(11) NOT NULL,
  `notice_board_id` int(11) DEFAULT NULL,
  `message_to` int(11) DEFAULT NULL COMMENT 'User Type',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice_board_message`
--

INSERT INTO `notice_board_message` (`id`, `notice_board_id`, `message_to`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 4, 3, NULL, '2023-12-06 14:46:55', '2023-12-06 14:46:55'),
(4, 4, 4, NULL, '2023-12-06 14:46:56', '2023-12-06 14:46:56'),
(5, 4, 2, NULL, '2023-12-06 14:46:56', '2023-12-06 14:46:56'),
(6, 5, 3, NULL, '2023-12-06 15:27:38', '2023-12-06 15:27:38'),
(7, 5, 4, NULL, '2023-12-06 15:27:38', '2023-12-06 15:27:38'),
(8, 5, 2, NULL, '2023-12-06 15:27:38', '2023-12-06 15:27:38'),
(12, 7, 3, NULL, '2023-12-06 15:42:09', '2023-12-06 15:42:09'),
(13, 6, 3, NULL, '2023-12-07 05:02:05', '2023-12-07 05:02:05'),
(14, 8, 3, NULL, '2023-12-07 06:56:09', '2023-12-07 06:56:09'),
(15, 8, 4, NULL, '2023-12-07 06:56:09', '2023-12-07 06:56:09'),
(16, 8, 2, NULL, '2023-12-07 06:56:09', '2023-12-07 06:56:09'),
(17, 9, 2, NULL, '2023-12-07 07:18:01', '2023-12-07 07:18:01'),
(18, 10, 4, NULL, '2023-12-07 07:25:21', '2023-12-07 07:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
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
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `stripe_key` varchar(500) DEFAULT NULL,
  `stripe_secret` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

DROP TABLE IF EXISTS `student_attendance`;
CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attendance_type` int(11) DEFAULT NULL COMMENT '1 : present , 2: absent , 3: late , 4 : half day',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `class_id`, `attendance_date`, `student_id`, `attendance_type`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 8, '2023-12-06', 3, 1, '2023-12-06 08:43:20', '2023-12-06 08:43:20', 1),
(2, 7, '2023-12-06', 19, 1, '2023-12-06 08:46:47', '2023-12-06 08:46:47', 1),
(3, 7, '2023-12-06', 18, 3, '2023-12-06 08:46:53', '2023-12-06 10:30:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

DROP TABLE IF EXISTS `student_fees`;
CREATE TABLE `student_fees` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT 0,
  `remaining_amount` int(11) DEFAULT 0,
  `paid_amount` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `is_payment` int(11) NOT NULL DEFAULT 0,
  `payment_data` text DEFAULT NULL,
  `stripe_session_id` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `class_id`, `student_id`, `total_amount`, `remaining_amount`, `paid_amount`, `created_at`, `updated_at`, `payment_type`, `remark`, `created_by`, `is_payment`, `payment_data`, `stripe_session_id`) VALUES
(1, 8, 3, 60000, 59966, 34, '2023-12-09 06:56:00', '2023-12-09 06:56:00', 'Stripe', NULL, 3, 0, NULL, NULL),
(2, 8, 3, 60000, 59966, 34, '2023-12-09 06:56:58', '2023-12-09 06:56:58', 'Stripe', NULL, 3, 0, NULL, NULL),
(3, 8, 3, 60000, 59980, 20, '2023-12-09 06:57:54', '2023-12-09 06:57:54', 'Stripe', NULL, 3, 0, NULL, NULL),
(4, 8, 3, 60000, 59976, 24, '2023-12-09 07:08:42', '2023-12-09 07:08:42', 'Stripe', NULL, 3, 0, NULL, NULL),
(5, 8, 3, 60000, 59976, 24, '2023-12-09 07:08:59', '2023-12-09 07:08:59', 'Stripe', NULL, 3, 0, NULL, NULL),
(6, 8, 3, 60000, 59976, 24, '2023-12-09 07:09:42', '2023-12-09 07:09:42', 'Stripe', NULL, 3, 0, NULL, NULL),
(7, 8, 3, 60000, 59967, 33, '2023-12-09 07:10:02', '2023-12-09 07:10:02', 'Stripe', NULL, 3, 0, NULL, NULL),
(8, 8, 3, 60000, 59965, 35, '2023-12-09 07:18:36', '2023-12-09 07:18:36', 'Stripe', NULL, 3, 0, NULL, NULL),
(9, 8, 3, 60000, 59965, 35, '2023-12-09 07:22:33', '2023-12-09 07:22:34', 'Stripe', NULL, 3, 0, NULL, 'cs_test_a1phoC8eWe2LXqmT5RDC6EmsFOd6An40HhjELh6OC8jjhxPAKw8FUg3PhL'),
(10, 8, 3, 60000, 59950, 50, '2023-12-09 07:31:10', '2023-12-09 07:31:10', 'Stripe', 'stripe charge test', 3, 0, NULL, 'cs_test_a1oxWEfML85JozNxCfVcmAKSepCaml0ZMEECyIg3dO3pjH0SuEmFdxHZui'),
(11, 8, 3, 60000, 59950, 50, '2023-12-09 07:31:10', '2023-12-09 07:31:10', 'Stripe', 'stripe charge test', 3, 0, NULL, 'cs_test_a1FhkvQctKHrAHcT6gb7xotzMtbeavtg9bOjTNnKesmYgL5TKlnMrxclfM'),
(12, 8, 3, 60000, 59966, 34, '2023-12-09 07:36:43', '2023-12-09 07:36:43', 'Stripe', NULL, 3, 0, NULL, 'cs_test_a1o9xW3tqtdu3sOPttVMJ5o3ZTHyeCUkC9leIzGv1ZePIVq2S57YPSR5nO'),
(13, 8, 3, 60000, 59966, 34, '2023-12-09 07:36:52', '2023-12-09 07:36:52', 'Stripe', NULL, 3, 0, NULL, 'cs_test_a1arMlUQqgE5webCq4HKgRnBmv9S3jsHH54xYoZHs201ZKtJ2cqoygR5Bw'),
(14, 8, 3, 60000, 59966, 34, '2023-12-09 07:39:21', '2023-12-09 07:39:21', 'Stripe', NULL, 3, 0, NULL, NULL),
(15, 8, 3, 60000, 59966, 34, '2023-12-09 07:39:36', '2023-12-09 07:39:36', 'Stripe', NULL, 3, 0, NULL, NULL),
(16, 8, 3, 60000, 59966, 34, '2023-12-09 07:39:45', '2023-12-09 07:39:46', 'Stripe', NULL, 3, 0, NULL, 'cs_test_a1s3yql9BaTMWbgxqzBeNgJXzANJPyCeZvo6FKdOMfBgUCZQ61Prks4625'),
(17, 8, 3, 60000, 59977, 23, '2023-12-09 07:41:12', '2023-12-09 07:41:13', 'Stripe', NULL, 3, 0, NULL, 'cs_test_a130jbxL7pRD6qKPhvUOgHKvm81pAqH5IivzOuGfQOEpqUheNxaLEU72JF'),
(18, 8, 3, 60000, 59966, 34, '2023-12-09 07:43:16', '2023-12-09 07:43:16', 'Stripe', NULL, 3, 0, NULL, 'cs_test_a1CLsxWpnpWH0v1tLpyKqyrcPgQw6xiWVobbvxvJAS8jf3lSDw829P8FMj'),
(19, 8, 3, 60000, 59966, 34, '2023-12-09 07:47:21', '2023-12-09 07:47:21', 'Stripe', NULL, 3, 0, NULL, 'cs_test_a1Av91t4C6fNxQ4notR9tOSRLJmDOxxVNmzlo6cruhTEWT5raE9eFkNh1z'),
(20, 8, 3, 60000, 59966, 34, '2023-12-09 07:48:40', '2023-12-09 07:48:40', 'Stripe', NULL, 3, 0, NULL, 'cs_test_a1zfhzdQMarfM4U3DplwYnO5hPam0aKkQm8hEArHnt8K5EVj51yKD0ISbg'),
(21, 8, 3, 60000, 59965, 35, '2023-12-09 08:51:01', '2023-12-09 08:51:01', 'Paypal', NULL, 4, 0, NULL, NULL),
(22, 8, 3, 60000, 59965, 35, '2023-12-09 08:51:26', '2023-12-09 08:51:26', 'Paypal', NULL, 4, 0, NULL, NULL),
(23, 8, 3, 60000, 59966, 34, '2023-12-09 08:51:39', '2023-12-09 08:51:39', 'Paypal', NULL, 4, 0, NULL, NULL),
(24, 8, 3, 60000, 59766, 234, '2023-12-09 08:52:14', '2023-12-09 08:52:14', 'Paypal', NULL, 4, 0, NULL, NULL),
(25, 8, 3, 60000, 59966, 34, '2023-12-09 09:01:45', '2023-12-09 09:03:56', 'Stripe', NULL, 4, 1, '{\"id\":\"cs_test_a1gw0pouOm8b44aWitzNuIm8xNmy0sujum1n8RQkKTO4FzaDdRXSKmT0gX\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":3400,\"amount_total\":3400,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/sms\\/school.com\\/parent\\/stripe\\/payment-error\\/3\",\"client_reference_id\":null,\"client_secret\":null,\"consent\":null,\"consent_collection\":null,\"created\":1702112503,\"currency\":\"inr\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"parent@gmail.com\",\"name\":\"fdgdfgf\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":\"parent@gmail.com\",\"expires_at\":1702198903,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3OLMRrSCvmGD3liW0dI5lDTw\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/sms\\/school.com\\/parent\\/stripe\\/payment-success\\/3\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null}', 'cs_test_a1gw0pouOm8b44aWitzNuIm8xNmy0sujum1n8RQkKTO4FzaDdRXSKmT0gX');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0:active , 1:inactive',
  `created_by` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not , 1:yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `type`, `status`, `created_by`, `is_delete`, `created_at`, `updated_at`) VALUES
(13, 'tamil', 'Theory', 0, 1, 0, '2023-12-01 10:37:13', '2023-12-01 10:37:13'),
(14, 'English', 'Theory', 0, 1, 0, '2023-12-01 10:37:25', '2023-12-01 10:37:25'),
(15, 'maths', 'Theory', 0, 1, 0, '2023-12-01 10:37:32', '2023-12-01 10:37:32'),
(16, 'science', 'Theory', 0, 1, 0, '2023-12-01 10:37:41', '2023-12-01 10:37:41'),
(17, 'social science', 'Theory', 0, 1, 0, '2023-12-01 10:37:51', '2023-12-01 10:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 2 COMMENT '1:admin, 2:teacher, 3:students, 4:parents',
  `admission_number` varchar(50) DEFAULT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `class_id` int(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `caste` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0 COMMENT '0: not deleted ,1: deleted',
  `status` int(11) DEFAULT 0 COMMENT '0:active ,1:inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



--
-- Table structure for table `week`
--

DROP TABLE IF EXISTS `week`;
CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_calendar_day` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `name`, `full_calendar_day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 1, NULL, NULL),
(2, 'Tuesday', 2, NULL, NULL),
(3, 'Wednesday', 3, NULL, NULL),
(4, 'Thursday', 4, NULL, NULL),
(5, 'Friday', 5, NULL, NULL),
(6, 'Saturday', 6, NULL, NULL),
(7, 'Sunday', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework_submit`
--
ALTER TABLE `homework_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_grade`
--
ALTER TABLE `marks_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_register`
--
ALTER TABLE `marks_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board_message`
--
ALTER TABLE `notice_board_message`
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
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `homework_submit`
--
ALTER TABLE `homework_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marks_grade`
--
ALTER TABLE `marks_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `marks_register`
--
ALTER TABLE `marks_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notice_board_message`
--
ALTER TABLE `notice_board_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
