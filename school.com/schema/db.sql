-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 06:06 AM
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
(27, 7, 102, 0, 0, '2023-12-15 07:34:22', '2023-12-15 07:34:22', 101),
(28, 7, 2, 0, 0, '2023-12-15 07:34:22', '2023-12-15 07:34:22', 101),
(31, 10, 102, 0, 0, '2023-12-16 13:05:12', '2023-12-16 13:05:12', 101),
(32, 8, 102, 0, 0, '2023-12-16 13:10:22', '2023-12-16 13:10:22', 101),
(33, 8, 15, 0, 0, '2023-12-16 13:10:22', '2023-12-16 13:10:22', 101);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_date` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `file`, `status`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Dolorem fugit facere officiis et labore. Quasi et inventore sint rerum expedita velit enim. Aut distinctio rerum dicta inventore facilis voluptatem. Occaecati saepe quam enim aut nisi magni eos.', 'iure', 1, 280595993, '2023-12-14 09:29:00', '2023-12-14 09:29:00'),
(2, 3, 4, 'Eligendi mollitia consectetur ducimus deleniti cupiditate commodi. Qui est iste cumque. Officia modi eos voluptatem commodi. Facere commodi pariatur accusantium fuga est ut est.', 'deleniti', 1, 497836198, '2023-12-14 09:29:00', '2023-12-14 09:29:00'),
(3, 5, 6, 'Est consequatur sit non vitae perspiciatis incidunt. Harum dolorem non rerum nostrum. Ducimus aut et mollitia dolorum quos.', 'qui', 0, 828466979, '2023-12-14 09:29:01', '2023-12-14 09:29:01'),
(4, 7, 8, 'Nisi nihil et veritatis dignissimos quasi. Porro voluptatem eaque quod vitae excepturi incidunt nisi. Facilis corrupti sed quia.', 'facere', 0, 583837676, '2023-12-14 09:29:01', '2023-12-14 09:29:01'),
(5, 9, 10, 'Quis dignissimos est mollitia. Omnis quia et fuga facere sapiente consectetur. Qui mollitia dicta delectus quia laudantium.', 'eaque', 0, 1135450783, '2023-12-14 09:29:02', '2023-12-14 09:29:02'),
(6, 11, 12, 'Aliquid corrupti iste architecto deserunt magni adipisci cumque. Dolore exercitationem eaque voluptas. Laborum est corrupti officia ipsa.', 'quia', 1, 542873376, '2023-12-14 09:29:02', '2023-12-14 09:29:02'),
(7, 13, 14, 'Unde deleniti veritatis voluptatem reiciendis quisquam provident id. Quibusdam similique repellendus rem expedita omnis eum totam et. Sit veritatis omnis consequatur quidem. Qui vel in doloribus qui.', 'non', 1, 817143828, '2023-12-14 09:29:03', '2023-12-14 09:29:03'),
(8, 15, 16, 'Sunt qui sit et dolore et dignissimos quae. Dignissimos soluta quaerat unde dignissimos dolor. Expedita explicabo dolorem ipsum rerum quam soluta earum incidunt.', 'earum', 0, 684361341, '2023-12-14 09:29:03', '2023-12-14 09:29:03'),
(9, 17, 18, 'Placeat amet et rerum voluptatibus. Omnis commodi dolores voluptas ut nihil sunt minus. Pariatur vel laudantium sunt dolor et.', 'harum', 0, 602799634, '2023-12-14 09:29:04', '2023-12-14 09:29:04'),
(10, 19, 20, 'Aut sequi reiciendis nostrum possimus. Ab nemo dolorem et necessitatibus eligendi rem. Omnis quos recusandae nihil ut.', 'sit', 0, 1021258941, '2023-12-14 09:29:04', '2023-12-14 09:29:04'),
(11, 21, 22, 'Vitae totam laboriosam aspernatur. Excepturi voluptatem eligendi nihil et sit illo qui. Quia eligendi qui repellat voluptatem. Atque necessitatibus expedita sequi ex autem.', 'eum', 1, 1554910725, '2023-12-14 09:29:04', '2023-12-14 09:29:04'),
(12, 23, 24, 'Cumque accusamus qui laudantium ab ducimus optio beatae odio. Neque provident aut aliquam quia quod. Id quis eum est et unde. Corporis ex sit et animi dolor repellendus ratione aspernatur.', 'consequuntur', 0, 870993609, '2023-12-14 09:29:05', '2023-12-14 09:29:05'),
(13, 25, 26, 'Qui dicta modi quia eius eos et nihil iste. Saepe qui qui sint et consequatur exercitationem ducimus. Eius rerum quisquam veniam doloribus. Non cum ea quia repellat.', 'iusto', 0, 312138785, '2023-12-14 09:29:05', '2023-12-14 09:29:05'),
(14, 27, 28, 'Nulla voluptas omnis consequatur perferendis ut. Dolorem itaque praesentium tenetur illum autem officiis. Cupiditate natus dolor repellat expedita.', 'soluta', 1, 364856920, '2023-12-14 09:29:06', '2023-12-14 09:29:06'),
(15, 29, 30, 'Quaerat dolores incidunt nisi tempora ducimus quos. Quis et sequi facere iure eos. Aspernatur tenetur quae quis fuga. Pariatur doloremque repudiandae dolor.', 'reiciendis', 0, 1503625546, '2023-12-14 09:29:06', '2023-12-14 09:29:06'),
(16, 31, 32, 'Voluptates itaque autem autem nihil et provident. Nulla quo iste ipsam eos et voluptatem. Fugit rerum reprehenderit sint sed dolorem quo sed.', 'perferendis', 0, 870105549, '2023-12-14 09:29:07', '2023-12-14 09:29:07'),
(17, 33, 34, 'Rerum molestias nulla sequi nihil quae saepe. Reiciendis rerum non eum. Voluptatem eaque qui nostrum laborum. Sunt facere quia sed non pariatur officiis aliquid. Corporis rerum ea eum eos.', 'omnis', 0, 1248509970, '2023-12-14 09:29:07', '2023-12-14 09:29:07'),
(18, 35, 36, 'Dicta rerum iure eum quibusdam occaecati. Ea itaque in aperiam sed aut sit quia. Repellendus ab quis officiis nam tempore eos.', 'et', 0, 1258205711, '2023-12-14 09:29:07', '2023-12-14 09:29:07'),
(19, 37, 38, 'Id id quis corrupti. Consequatur hic perferendis optio culpa.', 'nostrum', 1, 1686177377, '2023-12-14 09:29:08', '2023-12-14 09:29:08'),
(20, 39, 40, 'Modi perferendis corrupti consequatur quis eos at beatae. Asperiores vitae omnis eum eveniet. Rerum necessitatibus nulla minima delectus dolore vel tempore.', 'consequatur', 1, 1370738967, '2023-12-14 09:29:08', '2023-12-14 09:29:08'),
(21, 41, 42, 'Neque et debitis laudantium maxime ea corrupti ullam. Velit corrupti quidem dolore voluptatem dolores quas nihil. Enim delectus inventore ullam.', 'et', 1, 181509164, '2023-12-14 09:29:09', '2023-12-14 09:29:09'),
(22, 43, 44, 'Nobis aut necessitatibus eos placeat repudiandae qui exercitationem. Saepe fugiat laboriosam error quo dolore. Id unde est possimus ipsam necessitatibus ducimus animi.', 'animi', 1, 812848199, '2023-12-14 09:29:09', '2023-12-14 09:29:09'),
(23, 45, 46, 'Id cum rem asperiores modi. Ex ad sint qui minima. Vitae sed ipsum nulla et illo nihil. Tenetur odio iusto fugit.', 'dicta', 1, 1150988360, '2023-12-14 09:29:10', '2023-12-14 09:29:10'),
(24, 47, 48, 'Aut rerum totam expedita voluptatem recusandae. Illum suscipit sequi expedita corporis esse laboriosam ea. Sapiente quod omnis omnis voluptatum ut et. Ut nostrum fugit temporibus quis.', 'et', 0, 451325579, '2023-12-14 09:29:10', '2023-12-14 09:29:10'),
(25, 49, 50, 'Quia esse ut maiores unde molestiae veritatis ut eum. Et blanditiis ut explicabo enim provident voluptatum quisquam. Sunt asperiores odio neque sit.', 'voluptates', 0, 357335078, '2023-12-14 09:29:10', '2023-12-14 09:29:10'),
(26, 51, 52, 'Et omnis ut quasi explicabo eum et hic. Id ea blanditiis impedit provident facilis voluptates. Ut ipsa earum molestias qui impedit voluptatem aut. Vel quasi qui minus sit ipsum voluptates.', 'molestiae', 1, 1024338853, '2023-12-14 09:29:11', '2023-12-14 09:29:11'),
(27, 53, 54, 'Asperiores est porro nobis quia ut quos. Possimus ratione voluptatibus sint rerum. Quam minima perferendis libero.', 'assumenda', 0, 1290042653, '2023-12-14 09:29:11', '2023-12-14 09:29:11'),
(28, 55, 56, 'Ipsum mollitia rem sint deleniti aut velit id laudantium. Minus impedit tempora neque quibusdam iste accusamus ea commodi.', 'quo', 1, 10011035, '2023-12-14 09:29:12', '2023-12-14 09:29:12'),
(29, 57, 58, 'Soluta quod nihil perferendis qui enim atque enim in. Quos qui assumenda magnam incidunt accusantium voluptatem et.', 'sequi', 0, 121394497, '2023-12-14 09:29:12', '2023-12-14 09:29:12'),
(30, 59, 60, 'Distinctio ipsam et eum. Repellendus architecto qui quasi ut quod nulla minima. Ducimus sequi voluptatem aliquid deleniti esse sed. Quasi beatae voluptatem reiciendis quos nobis aut.', 'sed', 0, 1143270342, '2023-12-14 09:29:13', '2023-12-14 09:29:13'),
(31, 61, 62, 'Ut doloribus delectus beatae magni. Quidem necessitatibus nulla voluptatum similique. Quam maiores qui nostrum voluptatem. Alias saepe assumenda laudantium omnis praesentium.', 'et', 0, 1304054651, '2023-12-14 09:29:13', '2023-12-14 09:29:13'),
(32, 63, 64, 'Unde recusandae enim ut rerum perferendis. Vel iure voluptatem sed sit illum porro ut. Itaque ea facere quis quibusdam dolores.', 'suscipit', 0, 479508855, '2023-12-14 09:29:13', '2023-12-14 09:29:13'),
(33, 65, 66, 'Sit nesciunt alias quibusdam. Non quaerat et eum aliquam exercitationem sapiente. Voluptas odio veniam neque sunt et beatae facere.', 'voluptatem', 1, 1136031849, '2023-12-14 09:29:14', '2023-12-14 09:29:14'),
(34, 67, 68, 'Iste quaerat ex perspiciatis quos labore nihil qui. Quasi recusandae occaecati a accusamus assumenda facilis dolore corrupti. Vitae et adipisci ea voluptatem excepturi doloremque.', 'perspiciatis', 1, 497240326, '2023-12-14 09:29:14', '2023-12-14 09:29:14'),
(35, 69, 70, 'Voluptatem dolores omnis quia. Officiis et quia quia laudantium et ut. Placeat provident consequatur mollitia et temporibus vero. Perferendis atque nobis recusandae minus.', 'libero', 0, 233700023, '2023-12-14 09:29:15', '2023-12-14 09:29:15'),
(36, 71, 72, 'Quos voluptatum reprehenderit dolor reprehenderit. Eos sit neque praesentium temporibus nisi ex adipisci. Nesciunt distinctio dolore soluta vero. Aut nihil mollitia amet quia.', 'ut', 0, 775498079, '2023-12-14 09:29:15', '2023-12-14 09:29:15'),
(37, 73, 74, 'Blanditiis dolorem laborum molestiae doloremque commodi quia vel. Sed et est minima vel ducimus praesentium animi voluptatum. Qui minus odit voluptates.', 'aut', 1, 884949619, '2023-12-14 09:29:16', '2023-12-14 09:29:16'),
(38, 75, 76, 'Et quas a quisquam dolores dolorum dolores minima. Aut dolorem consequatur officia et. Qui aliquid fuga et facere doloribus et. Voluptatem nihil quasi assumenda qui quidem autem maiores.', 'omnis', 0, 861208860, '2023-12-14 09:29:16', '2023-12-14 09:29:16'),
(39, 77, 78, 'Quasi qui deserunt laudantium. Et quam quia sunt minima iusto eos. Maiores quas dolorem perferendis deleniti aliquid. Esse et possimus et. Eligendi qui placeat et aut.', 'qui', 0, 246955355, '2023-12-14 09:29:16', '2023-12-14 09:29:16'),
(40, 79, 80, 'Minus et minus ad ea magnam. Et dignissimos iure illum ea. Sint molestias odio quia provident natus ut. Quisquam at quo corporis eos dolor excepturi excepturi molestias.', 'ea', 0, 61132533, '2023-12-14 09:29:17', '2023-12-14 09:29:17'),
(41, 81, 82, 'Earum aut ut sit hic a ut sint. Molestias assumenda iste est hic aspernatur. Eveniet vitae esse aliquam. Pariatur aut non eaque quam sit delectus.', 'laborum', 0, 1487529621, '2023-12-14 09:29:17', '2023-12-14 09:29:17'),
(42, 83, 84, 'Vel maxime voluptatem sed deserunt eius. Qui ut fugiat et cum et sint beatae. Impedit aut quia nesciunt tempora ullam expedita.', 'ea', 1, 1354577908, '2023-12-14 09:29:18', '2023-12-14 09:29:18'),
(43, 85, 86, 'Non placeat autem quis aut est quia itaque. Illum et consequatur omnis sit dicta quaerat.', 'natus', 1, 1338910292, '2023-12-14 09:29:18', '2023-12-14 09:29:18'),
(44, 87, 88, 'Enim aut fugit quia numquam corrupti placeat eveniet. Aut sit enim dolorem veritatis. Sit nisi labore sed amet et sed vel. Doloribus distinctio quia nobis eaque voluptatem. Dolorem quod non nesciunt.', 'incidunt', 0, 1317089606, '2023-12-14 09:29:19', '2023-12-14 09:29:19'),
(45, 89, 90, 'Ut maxime quod et tenetur impedit fuga. Corporis ea excepturi et animi ex numquam. Id ut dignissimos quas. A dolor ut quia.', 'quia', 0, 252869969, '2023-12-14 09:29:19', '2023-12-14 09:29:19'),
(46, 91, 92, 'Sed maiores exercitationem inventore rem doloremque esse. Sit sequi rerum dolor illo. Tempora omnis aut consequatur omnis velit numquam labore. Aliquam labore non amet repellat iusto fugiat quod.', 'eius', 1, 1196094683, '2023-12-14 09:29:20', '2023-12-14 09:29:20'),
(47, 93, 94, 'Blanditiis ea non alias ut. Et natus eligendi dolores qui inventore aut distinctio. Et esse similique quis commodi voluptatem asperiores animi.', 'illum', 1, 1436237557, '2023-12-14 09:29:20', '2023-12-14 09:29:20'),
(48, 95, 96, 'Unde provident ad alias dolorem magni. Sed iusto sit vel sapiente quia quibusdam molestias quae. Aut beatae tempore enim architecto. Sint cum necessitatibus quos et facere.', 'est', 0, 129501447, '2023-12-14 09:29:20', '2023-12-14 09:29:20'),
(49, 97, 98, 'Deserunt blanditiis qui ad consequatur ullam tempore et. Similique vero consectetur ex culpa amet totam est. Quam iusto eveniet at dignissimos error eos. Nihil adipisci soluta qui ex sed iusto.', 'consequatur', 0, 1025094565, '2023-12-14 09:29:21', '2023-12-14 09:29:21'),
(50, 99, 100, 'Temporibus alias magnam reprehenderit molestiae rerum laboriosam ea. Deleniti atque vitae sit ipsam. Est harum quod ut rerum quidem dolorum voluptas.', 'est', 0, 1251764452, '2023-12-14 09:29:21', '2023-12-14 09:29:21'),
(51, 4, 102, 'hi', NULL, 1, 1702567038, '2023-12-14 09:47:18', '2023-12-14 09:49:35'),
(52, 4, 102, 'hi', NULL, 1, 1702567884, '2023-12-14 10:01:24', '2023-12-14 10:01:28'),
(53, 101, 102, 'hi teacher , this is admin', NULL, 1, 1702567996, '2023-12-14 10:03:16', '2023-12-14 10:03:21'),
(54, 102, 101, '🙄', NULL, 1, 1703341740, '2023-12-23 08:59:00', '2023-12-24 08:48:41'),
(55, 101, 103, 'hi', NULL, 1, 1703427731, '2023-12-24 08:52:11', '2023-12-24 09:03:48'),
(56, 103, 101, 'hi', NULL, 1, 1703428432, '2023-12-24 09:03:52', '2023-12-24 09:04:02'),
(57, 103, 101, 'hi2', NULL, 1, 1703428459, '2023-12-24 09:04:19', '2023-12-24 09:04:32'),
(58, 103, 101, 'welcome', NULL, 1, 1703428480, '2023-12-24 09:04:40', '2023-12-24 09:05:53'),
(59, 104, 103, 'hi', NULL, 0, 1703495855, '2023-12-25 03:47:35', '2023-12-25 03:47:35'),
(60, 102, 103, 'hi student', NULL, 0, 1703507973, '2023-12-25 07:09:33', '2023-12-25 07:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

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
(4, '12 th', 100000, 0, 1, 0, '2023-11-26 06:47:13', '2023-12-16 11:23:59'),
(5, 'one', 32423423, 0, 1, 1, '2023-11-26 08:23:11', '2023-12-16 11:22:02'),
(6, 'two', 234823, 0, 1, 0, '2023-11-26 08:23:17', '2023-12-08 11:26:03'),
(7, 'three', 1000000, 0, 1, 0, '2023-11-26 08:23:22', '2023-12-08 11:25:54'),
(8, 'four', 60000, 0, 1, 0, '2023-11-26 08:23:28', '2023-12-08 11:25:47'),
(9, 'first standard', 100000, 0, 1, 0, '2023-12-08 11:23:15', '2023-12-08 11:23:53'),
(10, '11 th', 100000, 0, 101, 0, '2023-12-16 11:26:11', '2023-12-16 11:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

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
(47, 7, 15, 1, 0, 0, '2023-12-02 10:26:40', '2023-12-02 10:26:40'),
(48, 7, 16, 1, 0, 0, '2023-12-02 10:26:40', '2023-12-02 10:26:40'),
(49, 7, 17, 1, 0, 0, '2023-12-02 10:26:40', '2023-12-02 10:26:40'),
(50, 8, 14, 101, 0, 0, '2023-12-16 12:59:07', '2023-12-16 12:59:07'),
(51, 8, 13, 101, 0, 0, '2023-12-16 12:59:07', '2023-12-16 12:59:07'),
(52, 10, 14, 101, 0, 0, '2023-12-16 13:01:01', '2023-12-16 13:01:01'),
(53, 10, 15, 101, 1, 0, '2023-12-16 13:01:01', '2023-12-16 13:02:14'),
(54, 10, 18, 101, 0, 0, '2023-12-16 13:01:01', '2023-12-16 13:01:01'),
(55, 10, 17, 101, 0, 0, '2023-12-16 13:01:01', '2023-12-16 13:01:01'),
(56, 10, 13, 101, 0, 0, '2023-12-16 13:01:01', '2023-12-16 13:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_timetable`
--

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
(49, 8, 14, 2, '16:21', '17:20', '1', '2023-12-01 10:50:38', '2023-12-01 10:50:38'),
(50, 8, 45, 1, '13:46', '13:46', '1', '2023-12-15 07:16:24', '2023-12-15 07:16:24'),
(52, 10, 14, 1, '18:51', '18:51', '1', '2023-12-16 13:17:08', '2023-12-16 13:17:08'),
(53, 10, 14, 2, '18:47', '18:46', '2', '2023-12-16 13:17:08', '2023-12-16 13:17:08'),
(54, 10, 14, 3, '18:46', '18:46', '3', '2023-12-16 13:17:08', '2023-12-16 13:17:08'),
(55, 10, 14, 4, '18:47', '18:49', '4', '2023-12-16 13:17:08', '2023-12-16 13:17:08'),
(56, 10, 14, 5, '18:47', '20:46', '5', '2023-12-16 13:17:08', '2023-12-16 13:17:08'),
(57, 10, 14, 6, '18:46', '18:46', '6', '2023-12-16 13:17:08', '2023-12-16 13:17:08'),
(58, 10, 14, 7, '19:46', '18:46', '7', '2023-12-16 13:17:08', '2023-12-16 13:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

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
(4, 'first term 2024/2025', '', 0, 1, '2023-12-01 14:24:21', '2023-12-01 14:24:21'),
(5, 'second term', 'important', 1, 101, '2023-12-16 13:21:42', '2023-12-16 13:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

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
(5, 3, 8, 14, '2024-01-02', '09:50', '11:47', '1', '100', '35', 1, '2023-12-02 10:17:39', '2023-12-02 10:17:39'),
(6, 1, 10, 14, '2023-12-25', '19:19', '21:17', '1', '35', '35', 101, '2023-12-16 13:49:46', '2023-12-16 13:49:46');

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
-- Table structure for table `homework`
--

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
(5, 7, 15, '2024-01-01', '2023-12-31', 'teacher update', NULL, 1, 2, '2023-12-07 14:54:51', '2023-12-15 13:25:22'),
(6, 8, 14, '2023-12-07', '2023-12-07', '<p>student homework</p>', '2023120704041122cmwytm1ei66zn9dd2e.png', 0, 1, '2023-12-07 16:04:11', '2023-12-07 16:04:11'),
(7, 8, 14, '2023-12-07', '2023-12-07', '<p>student homework</p>', '20231207040411ruw07mql1yzpgoxv6sro.png', 0, 1, '2023-12-07 16:04:11', '2023-12-07 16:04:11'),
(8, 8, 13, '2023-12-19', '2023-12-30', '<p>new</p>', NULL, 0, 102, '2023-12-07 16:06:55', '2023-12-15 13:21:57'),
(9, 7, 16, '2023-12-15', '2023-12-15', '<p>new homework</p>', NULL, 0, 102, '2023-12-15 13:30:36', '2023-12-15 13:30:36'),
(10, 8, 14, '2023-12-16', '2023-12-17', '<p>new homework</p>', NULL, 1, 101, '2023-12-16 12:40:51', '2023-12-16 12:44:09'),
(11, 8, 13, '2023-12-25', '2023-12-25', 'hello this is new homework', NULL, 0, 101, '2023-12-25 04:58:04', '2023-12-25 04:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `homework_submit`
--

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
(4, 6, 3, '<p>new homework check</p>', '20231208100924jntryzyjzt3bkiqwp6pz.png', '2023-12-08 10:09:24', '2023-12-08 10:09:24'),
(5, 8, 103, '<p>submitted homework</p>', '202312160934294rtg6mslejzb5mucy5tr.jpg', '2023-12-16 09:34:29', '2023-12-16 09:34:29'),
(6, 6, 103, 'test homework submitted', '20231216093720t301bforztgxaydmv95k.jpg', '2023-12-16 09:37:20', '2023-12-16 09:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grade`
--

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
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_register`
--

INSERT INTO `marks_register` (`id`, `student_id`, `exam_id`, `class_id`, `subject_id`, `class_work`, `home_work`, `test_work`, `exam`, `full_marks`, `passing_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 8, 14, 22, 20, 20, 15, 100, 35, 1, '2023-12-09 15:44:48', '2023-12-10 11:42:23'),
(2, 3, 1, 8, 13, 20, 40, 20, 10, 100, 35, 1, '2023-12-09 15:45:00', '2023-12-10 11:40:12'),
(3, 3, 3, 8, 14, 20, 20, 20, 15, 100, 35, 1, '2023-12-09 15:54:03', '2023-12-09 15:54:03'),
(7, 103, 1, 8, 14, 20, 20, 20, 15, 100, 35, 101, '2023-12-15 07:35:27', '2023-12-15 07:35:27'),
(8, 103, 1, 8, 13, 20, 20, 20, 15, 100, 35, 101, '2023-12-15 07:37:09', '2023-12-15 07:37:09'),
(9, 103, 3, 8, 14, 21, 12, 21, 21, 100, 35, 102, '2023-12-15 13:35:31', '2023-12-15 13:35:31');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_12_13_074809_create_chat_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

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
(8, 'sports', '2023-12-07', '2023-12-07', 'hello this is my first note', '2023-12-07 06:56:09', '2023-12-07 06:56:09', 1),
(9, 'teacher note', '2023-12-07', '2023-12-07', 'hello teacher', '2023-12-07 07:18:01', '2023-12-07 07:18:01', 1),
(10, 'new notice', '2023-12-07', '2023-12-07', NULL, '2023-12-07 07:25:21', '2023-12-16 12:07:27', 101),
(11, 'cricket match tournament', '2023-12-15', '2023-12-15', 'cricket match tournament  for students', '2023-12-15 07:48:35', '2023-12-15 07:48:35', 101),
(12, 'vally ball match', '2023-12-16', '2023-12-16', 'vally ball match', '2023-12-16 12:10:10', '2023-12-16 12:10:10', 101);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board_message`
--

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
(13, 6, 3, NULL, '2023-12-07 05:02:05', '2023-12-07 05:02:05'),
(14, 8, 3, NULL, '2023-12-07 06:56:09', '2023-12-07 06:56:09'),
(15, 8, 4, NULL, '2023-12-07 06:56:09', '2023-12-07 06:56:09'),
(16, 8, 2, NULL, '2023-12-07 06:56:09', '2023-12-07 06:56:09'),
(17, 9, 2, NULL, '2023-12-07 07:18:01', '2023-12-07 07:18:01'),
(19, 11, 3, NULL, '2023-12-15 07:48:35', '2023-12-15 07:48:35'),
(20, 11, 4, NULL, '2023-12-15 07:48:35', '2023-12-15 07:48:35'),
(21, 11, 2, NULL, '2023-12-15 07:48:35', '2023-12-15 07:48:35'),
(22, 10, 4, NULL, '2023-12-16 12:07:27', '2023-12-16 12:07:27'),
(23, 12, 3, NULL, '2023-12-16 12:10:10', '2023-12-16 12:10:10'),
(24, 12, 4, NULL, '2023-12-16 12:10:10', '2023-12-16 12:10:10');

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
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `stripe_key` varchar(500) DEFAULT NULL,
  `stripe_secret` varchar(500) DEFAULT NULL,
  `fevicon_icon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `small_logo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `paypal_email`, `stripe_key`, `stripe_secret`, `fevicon_icon`, `logo`, `small_logo`, `created_at`, `updated_at`) VALUES
(1, 'school@gmail.com', '', '', '20231225060334zqvpgt1lndm4kmeps74a.ico', '20231225061957lp673idyimxiwc3vsi5w.png', '20231225061925rqtro3pqt5bueyi2d706.png', '2023-12-08 15:51:19', '2023-12-25 06:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

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
(3, 7, '2023-12-06', 18, 3, '2023-12-06 08:46:53', '2023-12-06 10:30:15', 1),
(4, 8, '2023-12-06', 103, 1, '2023-12-15 07:39:18', '2023-12-15 07:39:18', 101),
(5, 8, '2023-12-15', 103, 2, '2023-12-15 13:44:09', '2023-12-15 13:48:07', 102),
(6, 8, '2023-12-16', 103, 1, '2023-12-16 11:52:33', '2023-12-16 11:52:33', 101),
(7, 8, '2023-12-25', 103, 2, '2023-12-25 05:05:31', '2023-12-25 05:05:33', 101);

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

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
(25, 8, 3, 60000, 59966, 34, '2023-12-09 09:01:45', '2023-12-09 09:03:56', 'Stripe', NULL, 4, 1, '{\"id\":\"cs_test_a1gw0pouOm8b44aWitzNuIm8xNmy0sujum1n8RQkKTO4FzaDdRXSKmT0gX\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":3400,\"amount_total\":3400,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/sms\\/school.com\\/parent\\/stripe\\/payment-error\\/3\",\"client_reference_id\":null,\"client_secret\":null,\"consent\":null,\"consent_collection\":null,\"created\":1702112503,\"currency\":\"inr\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"parent@gmail.com\",\"name\":\"fdgdfgf\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":\"parent@gmail.com\",\"expires_at\":1702198903,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3OLMRrSCvmGD3liW0dI5lDTw\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/sms\\/school.com\\/parent\\/stripe\\/payment-success\\/3\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null}', 'cs_test_a1gw0pouOm8b44aWitzNuIm8xNmy0sujum1n8RQkKTO4FzaDdRXSKmT0gX'),
(26, 8, 103, 60000, 59999, 1, '2023-12-15 14:25:21', '2023-12-15 14:25:21', 'Paypal', 'test', 104, 0, NULL, NULL),
(27, 8, 103, 60000, 59996, 4, '2023-12-23 14:05:07', '2023-12-23 14:05:07', 'Paypal', '2', 103, 0, NULL, NULL),
(28, 8, 103, 60000, 59999, 1, '2023-12-25 05:13:26', '2023-12-25 05:13:26', 'Cash', 'text', 101, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

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
(16, 'science', 'Theory', 0, 1, 1, '2023-12-01 10:37:41', '2023-12-16 11:42:11'),
(17, 'social science', 'Theory', 0, 1, 0, '2023-12-01 10:37:51', '2023-12-01 10:37:51'),
(18, 'Practical', 'Practical', 0, 101, 0, '2023-12-16 11:43:01', '2023-12-16 11:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 2 COMMENT '1:admin, 2:teacher, 3:students, 4:parents',
  `admission_number` varchar(255) DEFAULT NULL,
  `roll_number` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0 COMMENT '0: not deleted, 1: deleted',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0: active, 1: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `admission_number`, `roll_number`, `class_id`, `gender`, `date_of_birth`, `caste`, `religion`, `mobile_number`, `admission_date`, `profile_pic`, `blood_group`, `height`, `weight`, `occupation`, `address`, `permanent_address`, `marital_status`, `qualification`, `work_experience`, `note`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Marge Runolfsson IV', 'Torphy', 'turcotte.ayden@example.net', '2023-12-14 09:29:00', '$2y$12$5BKeI6oqvqcn1o1Y0Dc7A.1MG9QAjEtd76jwr/FPEnBYdARNtjHzK', 'F9nMRdpsENQnfC2vjqXOgxq8OrnDmQ6SDWRrBway4nkI6UOsBZEAHcIqPxRF', 3, '36740754', '16108352', 3, 'Male', '1970-07-05', 'delectus', 'error', '380-985-2482', '2019-09-20', NULL, 'AB+', '154.88', '62.96', 'ipsum', '98125 Tremblay Field Apt. 133\nWest Luther, VA 66650', '6267 Yvonne Shoals Suite 727\nSouth Esmeraldafurt, MN 26715-9100', 'Married', 'cum', 'illo', 'Rerum quasi quidem voluptas exercitationem reprehenderit nihil tempore.', 0, 0, '2023-12-14 09:29:00', '2023-12-14 09:36:56'),
(2, NULL, 'Eldred Pacocha', 'Jenkins', 'darren35@example.net', '2023-12-14 09:29:00', '$2y$12$Y1uZJhcxLyIJYyWt81QeAe.bltH5HdOXr3K4SR5gUnOaysacxtxdu', 'yTRikyTanI', 2, '23734872', '67041834', 52, 'Male', '2021-03-29', 'qui', 'atque', '+1.763.568.3695', '2016-04-18', NULL, 'AB-', '178.87', '66.38', 'est', '33628 Edmund Crescent\nEast Gideonstad, OH 76934', '675 Amina Rapid\nEast Aronton, MS 53948', 'Single', 'nihil', 'aliquam', 'Fugit ut facere corporis eos vel ipsum.', 0, 1, '2023-12-14 09:29:00', '2023-12-14 09:29:00'),
(3, NULL, 'Mrs. Baby Ebert', 'Spinka', 'gudrun.beer@example.org', '2023-12-14 09:29:00', '$2y$12$.Lbm6CwCfFTdR2JCUBWY/uy2cvtasV3HCryDeZxqUyVTG4oD2a6t2', 'Y92j4xEv73', 4, '48191594', '36414729', 30, 'Female', '2022-07-13', 'magni', 'officia', '786.243.9693', '1982-11-24', NULL, 'O+', '188.88', '105.81', 'commodi', '1211 Denesik Walk Suite 737\nNew Altheaton, MD 56637-9225', '457 Kulas Crossing Apt. 493\nLake Maurine, MT 32806', 'Divorced', 'eius', 'quis', 'Sunt quod saepe voluptas est molestiae recusandae.', 0, 0, '2023-12-14 09:29:01', '2023-12-14 09:29:01'),
(4, NULL, 'Mr. Jordon Schultz', 'Cruickshank', 'ddamore@example.net', '2023-12-14 09:29:01', '$2y$12$yfl96A.wSBWwJmneOo2ycu2MP8SDd7REyHp2UnhUNbTB6SbC/Pkl2', 'QgKVO8TCJwo71nAK48qLWAwU4j2Spiz6kNVOlPpVMdplnGaFXg9O971IVmu7', 1, '71303794', '26872114', 13, 'Male', '2000-04-18', 'et', 'aut', '1-682-293-3545', '1992-05-10', NULL, 'O-', '173.3', '70.16', 'ex', '35121 Hettinger Dale Apt. 061\nLake Cordiachester, MI 67730-5676', '3148 Gislason Light\nSouth Hank, KY 61075', 'Divorced', 'doloremque', 'sint', 'Mollitia quisquam voluptas nostrum nihil assumenda doloribus consequatur.', 0, 0, '2023-12-14 09:29:01', '2023-12-14 10:02:31'),
(5, NULL, 'Dino Hermann I', 'Hane', 'elyssa19@example.org', '2023-12-14 09:29:01', '$2y$12$.x/Sk0Q8W6bWiTgjG184tOHw3EZ1TrAn0wpXmPbQLSSE7Akg4L43q', 'Lk6FeSLM8X', 3, '42573258', '57940809', 61, 'Male', '1990-11-28', 'inventore', 'excepturi', '(689) 474-7642', '2015-10-14', NULL, 'B+', '188.97', '122.73', 'incidunt', '43792 Karina Plains\nPort Keanuland, CO 83666-2354', '82398 Hand Highway\nKautzermouth, VT 51923-7276', 'Married', 'atque', 'odit', 'Eum provident vero iste dolores.', 0, 1, '2023-12-14 09:29:01', '2023-12-14 09:29:01'),
(6, NULL, 'Delmer Heaney', 'Rutherford', 'randall.jast@example.com', '2023-12-14 09:29:01', '$2y$12$/UJRlKipirlUdx8tuDTLBez32ecMJixpz3nGw7CX9nuKUXKyVuasK', 'XST0Zz43sW', 4, '53314073', '89354988', 63, 'Female', '1995-01-01', 'maiores', 'omnis', '+1-740-554-8506', '2007-08-30', NULL, 'A-', '197.12', '144.19', 'aut', '586 Wyman Greens\nPrestonfurt, CT 91507', '1970 Murphy Turnpike Suite 203\nLake Jeniferstad, FL 43032', 'Single', 'sed', 'nihil', 'Tempore magnam perferendis delectus ipsam eum earum sunt.', 0, 1, '2023-12-14 09:29:01', '2023-12-14 09:29:01'),
(7, NULL, 'Dayna Schaden', 'Douglas', 'kacie23@example.net', '2023-12-14 09:29:01', '$2y$12$ea496P7sn7v9jJmj22aZXOOi6EnVwhTrdK4/Xq/8iySIL3JDBalke', '84GznT68rH', 1, '85353684', '61048963', 66, 'Female', '1970-02-17', 'laboriosam', 'est', '(248) 838-3581', '1977-10-23', NULL, 'AB+', '159.48', '52.12', 'libero', '867 Clarissa Creek\nNorth Marques, OH 19966', '43010 Fae Canyon Suite 524\nEzekielfurt, VT 68551-2657', 'Single', 'et', 'in', 'Qui qui laboriosam quis sunt nobis.', 0, 0, '2023-12-14 09:29:02', '2023-12-14 09:29:02'),
(8, NULL, 'Mrs. Victoria Walsh II', 'Dicki', 'zwehner@example.net', '2023-12-14 09:29:02', '$2y$12$UIr.D53OQMWVkBR54UWx.OXalKjiAFjQIKbwixJMgfoAuuKQZue32', 'tJiwHog6lZ', 3, '66461493', '43001797', 12, 'Female', '1974-07-27', 'commodi', 'omnis', '1-215-526-1072', '2011-08-06', NULL, 'A+', '172.21', '110.82', 'facere', '51641 Elyse Field Apt. 771\nCasimirton, TX 92184', '80677 White Squares Suite 072\nEast Sherwood, OR 14292-2513', 'Married', 'quo', 'nemo', 'Eum aut vitae totam ut placeat.', 0, 0, '2023-12-14 09:29:02', '2023-12-14 09:29:02'),
(9, NULL, 'Dr. Maritza Murazik', 'Lowe', 'eino.bartell@example.org', '2023-12-14 09:29:02', '$2y$12$b8xdhDCePAVr616y1TtGVeY4iszOqzuCeuecVvOze2ktfZakvBPQK', 'cZjhS732Ui', 4, '67396944', '20667161', 21, 'Female', '1980-12-28', 'inventore', 'error', '+1-339-424-1192', '1984-12-02', NULL, 'B-', '154.37', '48.2', 'et', '3172 Williamson Glen\nFidelmouth, MO 56424', '97138 Dashawn Curve Suite 722\nNorth Linnea, CO 16836', 'Divorced', 'suscipit', 'porro', 'Voluptas veritatis laudantium ratione suscipit voluptatem voluptatem illo laboriosam.', 0, 1, '2023-12-14 09:29:02', '2023-12-14 09:29:02'),
(10, NULL, 'Elta Hauck', 'Buckridge', 'snader@example.org', '2023-12-14 09:29:02', '$2y$12$v2mkrjIzmvtzhIy/wKwjGOLh9UPOjkA4VlySzgCbQd.B.6qXr4YsK', '9DlM2ZKwFW', 1, '28651057', '16840355', 1, 'Female', '2002-05-13', 'dolorem', 'illo', '+1.484.688.4184', '1996-12-27', NULL, 'AB+', '161.96', '55.74', 'autem', '166 Greg Ports Suite 796\nHillardmouth, ME 74139-9644', '184 Dimitri Islands Apt. 465\nOrentown, GA 84214', 'Single', 'sint', 'nihil', 'Aut quasi necessitatibus minima nostrum.', 0, 1, '2023-12-14 09:29:02', '2023-12-14 09:29:02'),
(11, NULL, 'Dr. Cory Morissette', 'Champlin', 'wlowe@example.com', '2023-12-14 09:29:02', '$2y$12$Pww3fH2lFU38ADJDdY4oAu/S8wiVTY0REBGr5w5uuRYGGFoDFfNy2', 'IQKjxCCE5h', 4, '81333333', '13367535', 20, 'Female', '1986-10-16', 'harum', 'ut', '1-970-817-6854', '2008-05-17', NULL, 'O-', '171.1', '111.39', 'modi', '579 Hartmann Union\nKerlukestad, MD 29345', '337 Smith Mill\nNew Jude, AR 37846-1883', 'Married', 'et', 'modi', 'Natus in et animi quam eligendi fugit quia.', 0, 1, '2023-12-14 09:29:02', '2023-12-14 09:29:02'),
(12, NULL, 'Cale Ledner', 'Abbott', 'darius12@example.org', '2023-12-14 09:29:02', '$2y$12$1Eu7PLMh9nnkzw59cdY2CuZyvQeMCVW2Z99g57G3mb0jGpihEhAwy', 'SEzNGsSLKS', 4, '70543908', '16012778', 50, 'Male', '2019-01-20', 'mollitia', 'consequatur', '734.309.5158', '2011-06-21', NULL, 'A+', '177.29', '64.93', 'architecto', '421 O\'Connell Court Suite 537\nHegmannborough, DE 89185', '1049 Susana Groves Suite 989\nNew Wilhelmine, NH 81875-4546', 'Divorced', 'eos', 'similique', 'Dicta at et animi aut.', 0, 0, '2023-12-14 09:29:03', '2023-12-14 09:29:03'),
(13, NULL, 'Prof. Marcelino Armstrong', 'Berge', 'ghill@example.net', '2023-12-14 09:29:03', '$2y$12$SSZ1WPNvuSUHhGiJNH12GO2x/F5u3IcVjxfQHs8ipRgdKqX66Bbce', 'T5apDWpvTI', 4, '91170212', '22775208', 67, 'Female', '1991-06-04', 'autem', 'atque', '1-920-693-4904', '1982-02-25', NULL, 'B-', '190.08', '108.45', 'ut', '963 Aisha Crossroad\nSouth Mason, IN 88222-5334', '5294 Carmela Mission Suite 629\nNew Brielleborough, HI 72323', 'Married', 'natus', 'magnam', 'Optio aut nisi facere eveniet ipsam a.', 0, 1, '2023-12-14 09:29:03', '2023-12-14 09:29:03'),
(14, NULL, 'Jazlyn Carter', 'Davis', 'krystel92@example.net', '2023-12-14 09:29:03', '$2y$12$ApDra/2tSHzyIVKduorEaOjLIF/Zu2GiH.cpnpUuWCYVoIdEraZGy', 'sRWTWkfaaQ', 1, '41477806', '51296669', 9, 'Female', '2009-07-20', 'corporis', 'non', '+1-347-733-4544', '2010-02-23', NULL, 'B+', '160.76', '121.8', 'voluptatibus', '182 Zoe Neck\nSouth Fayberg, HI 60583', '587 Medhurst Dale Suite 710\nEast Estrellaland, MI 72273-4959', 'Single', 'voluptatem', 'aperiam', 'Laudantium tenetur alias dicta ut ut rerum minus.', 0, 0, '2023-12-14 09:29:03', '2023-12-14 09:29:03'),
(15, NULL, 'Asha Schmidt', 'Bashirian', 'fgleason@example.com', '2023-12-14 09:29:03', '$2y$12$yoU7ESkl7fihm6cnVMgXNeYH6JOEcbVhYxobMLtJ0s1q1vuLJ6ipa', '4VqfRoKdVy', 2, '14799542', '89620673', 0, 'Female', '1993-04-15', 'a', 'harum', '+1-856-283-9492', '1972-07-26', NULL, 'B-', '155.31', '80.15', 'perspiciatis', '6599 McClure Centers Apt. 143\nNorth Rosella, SC 63548', '4808 Glover Cliff Suite 129\nPort Helen, MO 68535-3957', 'Married', 'optio', 'sed', 'Consequatur fuga fugit expedita ut necessitatibus sed.', 0, 1, '2023-12-14 09:29:03', '2023-12-14 09:29:03'),
(16, NULL, 'Dylan Bernhard', 'Dooley', 'muller.merritt@example.org', '2023-12-14 09:29:03', '$2y$12$/PbauaeXh0dZTnQg./ZC0uCbbWXKQnOXlSmmZi.T1AKVIRBzOblxC', '0EzdpIQ2Bi', 1, '835313', '6506546', 44, 'Female', '2022-05-14', 'voluptates', 'nam', '804.540.0477', '1986-05-14', NULL, 'AB+', '159.82', '137.81', 'est', '926 Miller Gateway Apt. 511\nNew Annabelle, TN 26694', '86181 Elvis Fort Apt. 010\nNew Jayson, OR 07930-4088', 'Divorced', 'beatae', 'voluptatem', 'Provident deserunt labore aspernatur quis non non.', 0, 0, '2023-12-14 09:29:04', '2023-12-14 09:29:04'),
(17, NULL, 'Belle Bode', 'Block', 'joany.kertzmann@example.org', '2023-12-14 09:29:04', '$2y$12$jF0AgRc17wc0AvTTjtPYh.v251GuhlJVs4cT4KCvFJ0GBG58sZiEa', '6MrLGGy3Rt', 3, '83894573', '63155034', 48, 'Male', '2003-10-26', 'minima', 'ex', '+1-832-913-9129', '2010-08-09', NULL, 'B+', '186.9', '94.45', 'eligendi', '175 Christiansen Cove Apt. 988\nBellville, NV 45245-3493', '59560 Kamron Brook Suite 434\nEast Margarettamouth, WY 97341-6205', 'Single', 'placeat', 'voluptas', 'Omnis id alias molestiae.', 0, 1, '2023-12-14 09:29:04', '2023-12-14 09:29:04'),
(18, NULL, 'Furman Windler', 'Volkman', 'melvina.wehner@example.com', '2023-12-14 09:29:04', '$2y$12$XRMSbC1XZGZrGg49Fi0WL.ehkHmqbtXTlUACJF.unjgO2IU5yzTRu', 't33LLYRdB1', 1, '43741950', '85267519', 65, 'Female', '2000-09-06', 'optio', 'et', '(571) 660-3254', '2012-03-09', NULL, 'B+', '198.85', '66.42', 'maxime', '4164 Abbott Points\nLake Estella, DE 18910', '35380 Windler Walk\nEast Annettehaven, OH 84358', 'Married', 'quos', 'iusto', 'Laborum nobis porro rem aut corporis enim.', 0, 1, '2023-12-14 09:29:04', '2023-12-14 09:29:04'),
(19, NULL, 'Austyn Schmeler', 'Nikolaus', 'lesly87@example.net', '2023-12-14 09:29:04', '$2y$12$tAMM54CUP0b2VyAg5e6FGeG6IA54.HeXENfA0pnMDPhmIEaNgickW', 'gr1aGIZkUs', 1, '5834315', '22208832', 13, 'Female', '1982-08-24', 'nam', 'ex', '+1.413.400.7658', '2011-02-15', NULL, 'B-', '160.13', '60.11', 'et', '7315 Spencer Port Apt. 748\nEast Jennie, NE 23605-3923', '574 Cruickshank Way Suite 118\nNew Lafayette, AZ 10080-9491', 'Single', 'tempore', 'est', 'Provident sint non exercitationem iste quasi quidem rerum recusandae.', 0, 0, '2023-12-14 09:29:04', '2023-12-14 09:29:04'),
(20, NULL, 'Zachery Keebler', 'Buckridge', 'magdalena46@example.com', '2023-12-14 09:29:04', '$2y$12$cXsbKDrwCggG9yMnKB3mjunLzZDz5acMHhs7DDbilT.fHK.a9oVgW', 'uooGjPoEzI', 2, '82767690', '5251573', 89, 'Male', '1989-04-13', 'quibusdam', 'optio', '+1 (878) 950-8599', '2023-02-08', NULL, 'B-', '169.15', '85.6', 'veritatis', '798 Spencer Causeway Suite 835\nPort Shannaton, NC 69910', '3339 Tiana Centers Suite 014\nNorth Kenyattatown, DE 26641', 'Single', 'rerum', 'adipisci', 'Numquam porro quae voluptatem nisi.', 0, 1, '2023-12-14 09:29:04', '2023-12-14 09:29:04'),
(21, NULL, 'Prof. Corine Medhurst', 'Runolfsson', 'leopold.blick@example.com', '2023-12-14 09:29:04', '$2y$12$A60o3qltFhOpDjWCjbxzfeVYh76o7elNBB5vn1vPwLt1qh2P92VHC', 'bsjhtrtDf1', 1, '55294806', '86566231', 0, 'Male', '1982-01-03', 'in', 'ratione', '781-475-1221', '2016-01-08', NULL, 'A+', '198.15', '74.7', 'et', '62276 Jordi Garden Suite 514\nKerlukeborough, CA 20589-8041', '431 Ben Lock Apt. 295\nEast Ernestochester, SC 55909', 'Single', 'adipisci', 'dolor', 'Ut molestiae dignissimos illum facere soluta debitis ad.', 0, 1, '2023-12-14 09:29:05', '2023-12-14 09:29:05'),
(22, NULL, 'Prof. Dereck Ritchie', 'Rowe', 'dorcas05@example.com', '2023-12-14 09:29:05', '$2y$12$dR8LZUs8CmFkLuCyVNwfT.M5ERciLGcsXjBs5FAjYvUo61WYBdBKC', 'DWQ6ckCoDV', 4, '65363941', '99031479', 59, 'Male', '1983-01-04', 'omnis', 'voluptate', '(520) 571-6132', '2022-12-21', NULL, 'O-', '159.48', '96.32', 'est', '38196 Mallie Wells Suite 405\nEast Damien, WY 26008-1783', '98192 Armstrong Mountain\nCarrollview, WI 23114-6302', 'Single', 'aliquam', 'odit', 'Est magnam suscipit id dicta.', 0, 1, '2023-12-14 09:29:05', '2023-12-14 09:29:05'),
(23, NULL, 'Breanne Gleason', 'Waelchi', 'august.torphy@example.org', '2023-12-14 09:29:05', '$2y$12$TglIMKcspuhB4Up5VWzyNuRMFq.8DAph5AGP4ucESM9LbWCUPHEWW', 'Hj9JMOjL4N', 4, '45640296', '26253281', 0, 'Female', '1996-05-03', 'odio', 'voluptates', '831.923.2348', '1994-09-06', NULL, 'AB-', '186.75', '73.66', 'et', '262 Weimann Row Apt. 074\nBednarport, IA 69945-1912', '6939 Legros Summit Apt. 512\nSouth Cassandrestad, NM 43575-9586', 'Single', 'sit', 'et', 'Velit qui amet nihil odio mollitia voluptas nesciunt.', 0, 1, '2023-12-14 09:29:05', '2023-12-14 09:29:05'),
(24, NULL, 'Mr. Russel Macejkovic V', 'Kilback', 'kasandra69@example.net', '2023-12-14 09:29:05', '$2y$12$Gloy.x96sKsYeLGSK2sMle8Ie7L3zIcG31Rsv/9Rl287hWpVckY2e', 'hfZHCXj6nx', 3, '85576334', '13487255', 91, 'Male', '2012-12-07', 'ipsum', 'exercitationem', '534-692-3072', '1994-12-23', NULL, 'A-', '160', '48.23', 'et', '8498 Eden Lodge\nSouth Kattie, GA 61111', '5128 Langworth Crossing\nNorth Kamren, KS 38490-8757', 'Married', 'ullam', 'aperiam', 'Dolore ut sint repellat consequatur repellat esse et.', 0, 1, '2023-12-14 09:29:05', '2023-12-14 09:29:05'),
(25, NULL, 'Stanford Yundt', 'White', 'flo76@example.com', '2023-12-14 09:29:05', '$2y$12$/rtnRVuBe6EBeP0xwwLciO4.YPm6XmzkZQ3W2gJWLoNXk.0FzRBK.', 'quG0Nfvp5E', 1, '50955731', '97894484', 99, 'Male', '1990-03-03', 'perferendis', 'eius', '(863) 307-2744', '1988-07-18', NULL, 'A+', '182.34', '79.8', 'voluptatem', '5910 Kertzmann Tunnel\nOkunevashire, AL 64430-2620', '31371 Zelma Keys Suite 041\nLake Tressa, VA 04028', 'Married', 'et', 'rerum', 'Est maiores et saepe quidem quibusdam quis quo nulla.', 0, 0, '2023-12-14 09:29:05', '2023-12-14 09:29:05'),
(26, NULL, 'Miss Kaitlin Anderson III', 'Toy', 'zkoepp@example.com', '2023-12-14 09:29:05', '$2y$12$Vm.yC.y0CT1ncZkrt84KRuFylLX3dxd.GPkxnfuSnOCRIj4lhnmmS', 'QiZy0Uko9F', 3, '69293212', '94994053', 0, 'Female', '1993-09-08', 'delectus', 'neque', '+19307405429', '1973-09-30', NULL, 'O+', '168.32', '50.6', 'ea', '6556 Ondricka Overpass Apt. 204\nWest Bertha, MO 28868', '3166 Kuvalis Summit\nWilliamsonport, WV 75758', 'Divorced', 'velit', 'omnis', 'Quos reiciendis tempore labore fugit cupiditate et consequatur.', 0, 0, '2023-12-14 09:29:06', '2023-12-14 09:29:06'),
(27, NULL, 'Prof. Oliver Smith', 'Lebsack', 'nzemlak@example.com', '2023-12-14 09:29:06', '$2y$12$sobHISmXbqL./KNucavQ7eMYrrZaxfU8N.9U6nPL9aNFwWkBbYE9y', 'B0nxNIB6j2', 2, '53460012', '66535211', 24, 'Male', '2000-04-21', 'sunt', 'illo', '872-451-1644', '1974-02-23', NULL, 'B+', '179.88', '83.92', 'suscipit', '5093 Lee Divide Suite 096\nWinstonhaven, OR 32059-3656', '596 Shawn Estates Suite 384\nEast Jeromy, RI 86353-2943', 'Married', 'possimus', 'molestiae', 'Nostrum est quod animi qui.', 0, 0, '2023-12-14 09:29:06', '2023-12-14 09:29:06'),
(28, NULL, 'Bradly Bailey IV', 'Luettgen', 'zoey84@example.org', '2023-12-14 09:29:06', '$2y$12$67.yE2eC0g4NYUb0/E7r2.8pcigDKq6hLD/HfS.AJX/0NMVYZREO.', 'De9ADQP5cM', 3, '54440109', '88528319', 20, 'Female', '1995-05-02', 'cum', 'impedit', '1-248-226-9886', '1979-03-21', NULL, 'B-', '186.1', '95.96', 'recusandae', '322 Leora Course Apt. 300\nEast Alysonside, IL 51393', '144 Rhea Mountains Apt. 962\nRathmouth, HI 15012', 'Single', 'eveniet', 'velit', 'Quasi et est voluptatem molestiae ullam consequuntur.', 0, 1, '2023-12-14 09:29:06', '2023-12-14 09:29:06'),
(29, NULL, 'Katarina Trantow', 'Boyle', 'hharris@example.org', '2023-12-14 09:29:06', '$2y$12$6DaivUdjP05MOht96GKdRu.jcAakPQ8slTgRasbYEveq3gT5ch1h6', 'VBPf0DOpSb', 2, '20001200', '73723312', 29, 'Male', '2018-06-20', 'aut', 'quo', '1-630-860-9099', '1979-07-09', NULL, 'A+', '187.05', '43.53', 'vitae', '900 Nicole Bridge Apt. 728\nQuigleystad, CT 71662', '482 Schaden Path\nMarianburgh, ND 45280', 'Single', 'reprehenderit', 'vel', 'Laboriosam necessitatibus eius sunt.', 0, 0, '2023-12-14 09:29:06', '2023-12-14 09:29:06'),
(30, NULL, 'Mrs. Marilou Greenfelder II', 'Schmeler', 'karley27@example.com', '2023-12-14 09:29:06', '$2y$12$j4k8HPZtvCDKtqfDNyRh7OtQyyBNZGhLO1ALqxSVC1R1xA/4gw3Su', 'RVoUJpIC8Q', 4, '34074777', '82656846', 37, 'Female', '2004-08-09', 'necessitatibus', 'ea', '919.285.1330', '1990-09-03', NULL, 'A-', '169.75', '138.95', 'sint', '3482 Niko Place Suite 541\nMartinaside, MN 47119', '191 Kameron Harbor\nWest Akeemville, AK 22311-5072', 'Married', 'ipsum', 'accusantium', 'Omnis aliquam similique adipisci aut vero vel.', 0, 0, '2023-12-14 09:29:07', '2023-12-14 09:29:07'),
(31, NULL, 'Carolyn Donnelly', 'Labadie', 'mchristiansen@example.net', '2023-12-14 09:29:07', '$2y$12$TOfrpbbdqHYGbHLNrfHCxecd.fNkmhvhItAZv6mAOqpCQd8S81tqe', 'TlQgaGKAXc', 3, '81099701', '19224856', 20, 'Female', '1987-06-21', 'voluptatum', 'laudantium', '+1-475-880-3244', '1989-04-26', NULL, 'AB-', '199.87', '42.25', 'eos', '806 Walsh Burgs Apt. 912\nEast Christophe, KS 69517-4628', '856 Verona Plaza Suite 740\nNew Tyson, UT 81546-8621', 'Divorced', 'sit', 'eos', 'Laborum et quia voluptas officiis non delectus.', 0, 1, '2023-12-14 09:29:07', '2023-12-14 09:29:07'),
(32, NULL, 'Dr. Courtney Russel', 'Lynch', 'ygraham@example.org', '2023-12-14 09:29:07', '$2y$12$aqqgnDHXLNxvJQ3LAB91wOO3bEnfRpiTSAueWFpHH9BUdRPS.5NQK', 'dofJGlvjkA', 2, '23236842', '76465379', 72, 'Male', '1992-11-21', 'est', 'aut', '253-330-8585', '2013-12-29', NULL, 'A+', '180.87', '128.92', 'aut', '958 Berenice Plains Apt. 864\nSouth Gaetano, MD 34901', '7474 Legros Greens\nAbshireshire, SD 46500', 'Single', 'magni', 'qui', 'Tenetur officiis ut corrupti occaecati earum.', 0, 1, '2023-12-14 09:29:07', '2023-12-14 09:29:07'),
(33, NULL, 'Mr. Bud Feeney', 'Klein', 'garry.fadel@example.net', '2023-12-14 09:29:07', '$2y$12$lHa3XtmFTGKzMjVlx5K2muqBTjIPHki0p2KXtihODenBpidyCqQUW', 'NFTw7lzSe7', 3, '41307691', '67141952', 9, 'Male', '1987-03-14', 'nisi', 'saepe', '1-667-499-3444', '2001-08-12', NULL, 'B-', '174.48', '42.36', 'quos', '6788 Murphy Plain\nLueilwitzside, AZ 90716', '6724 Schumm Crescent Apt. 826\nWest Murphyberg, MI 22857-6503', 'Divorced', 'sit', 'sunt', 'Est architecto voluptates molestiae voluptatem ab tenetur.', 0, 0, '2023-12-14 09:29:07', '2023-12-14 09:29:07'),
(34, NULL, 'Skyla Marks V', 'Hirthe', 'gaylord39@example.net', '2023-12-14 09:29:07', '$2y$12$tgOHa/siZrH8nceu.wJPXemc390Z74gbQ.DxYDYGv9EdPq.q0OO4C', 'AwLxR8ObMh', 4, '51790638', '43692434', 37, 'Male', '1976-06-10', 'omnis', 'nostrum', '629.471.6142', '1970-09-09', NULL, 'O+', '156.12', '42.69', 'voluptas', '68581 Horacio Coves\nHestermouth, NC 34282-2806', '2506 Hirthe Manors\nLake Linneahaven, NC 02517', 'Single', 'accusamus', 'odit', 'Expedita et recusandae sint et.', 0, 1, '2023-12-14 09:29:07', '2023-12-14 09:29:07'),
(35, NULL, 'Dr. Timothy Fritsch DVM', 'West', 'eriberto.spencer@example.com', '2023-12-14 09:29:07', '$2y$12$qAmyx/NsJhGAFM9.vqT4negNjIxZenlD7CvtHZ4qY1IABPOCILMvO', 'M4FdNUqJKe', 3, '70788975', '57565857', 69, 'Female', '2009-10-27', 'dicta', 'facere', '865-750-0037', '1994-08-29', NULL, 'AB+', '189.97', '99.24', 'quo', '2805 Herzog Drives\nSouth Cletuston, OK 22541-4024', '3614 Solon Club\nEast Forestton, TX 04469-0798', 'Married', 'ut', 'odit', 'Quia sint temporibus culpa impedit eveniet odit aperiam.', 0, 1, '2023-12-14 09:29:08', '2023-12-14 09:29:08'),
(36, NULL, 'Euna Johns', 'Gibson', 'mann.nolan@example.net', '2023-12-14 09:29:08', '$2y$12$a7SmRLO9RFqbzua.zB49P.QJ/GFDaactElVSky8r5e1vhhe8Dmju6', 's6z1qYVap9', 3, '92658212', '39831602', 64, 'Male', '1987-12-01', 'aut', 'atque', '+16079174955', '2022-09-17', NULL, 'AB-', '185.64', '52.44', 'tempora', '52293 Yundt Mission\nHoegerborough, NM 96533-4022', '613 Pfeffer Expressway\nPort Pablo, MD 36981', 'Single', 'eligendi', 'officia', 'Aliquid alias hic sunt voluptas est quo voluptas.', 0, 0, '2023-12-14 09:29:08', '2023-12-14 09:29:08'),
(37, NULL, 'Meta Langosh', 'Will', 'jace34@example.com', '2023-12-14 09:29:08', '$2y$12$USTzyWZ16wEquQpoKgKLG.LUxqWYCvvCR5Ar.2VLNfYpH4VdMWsjS', '53nL9ZB8Dc', 1, '73942994', '32194190', 47, 'Male', '1992-11-28', 'illo', 'sapiente', '513.814.6345', '1997-11-12', NULL, 'AB+', '172.07', '40.1', 'sapiente', '227 Green Island\nJohannmouth, WY 07582-2134', '993 Hanna Drive\nHagenesshire, DC 37654', 'Married', 'quis', 'magni', 'Porro maiores ut et assumenda.', 0, 0, '2023-12-14 09:29:08', '2023-12-14 09:29:08'),
(38, NULL, 'Andre Schaden PhD', 'Sipes', 'fadel.coralie@example.com', '2023-12-14 09:29:08', '$2y$12$uzOOteE9217DaZzEAm71heCw369tbDqGCEACXxkuFLLyuytlvPC86', 'zAZnPuTyAk', 2, '55268772', '40388001', 39, 'Male', '2015-08-09', 'quos', 'eveniet', '+19714857932', '1988-07-16', NULL, 'A-', '160.68', '78.97', 'quaerat', '8973 Kemmer Pines\nJaynefort, NC 01946', '1140 Kuhn Lights\nMathildeton, ND 54456-5995', 'Married', 'id', 'fuga', 'Quod quae libero suscipit culpa facilis aliquam totam.', 0, 0, '2023-12-14 09:29:08', '2023-12-14 09:29:08'),
(39, NULL, 'Bryana Osinski', 'Moore', 'donny83@example.net', '2023-12-14 09:29:08', '$2y$12$l9.eBxOKvD0f.QH/alnL3.C.k9AolhsvJII2QEgt8tEnCA7L3.bwi', 'wZOYY2qrAA', 2, '75082971', '7671701', 55, 'Male', '1972-01-03', 'laborum', 'delectus', '+14585986952', '1982-11-11', NULL, 'AB-', '185.66', '102.65', 'nihil', '944 Harmony Extension\nNew Jennings, IA 88892-0567', '41883 Ziemann Way Apt. 755\nLake Eribertoport, ND 90467-9377', 'Married', 'alias', 'suscipit', 'Neque consequatur voluptate sed porro quia velit dolores.', 0, 1, '2023-12-14 09:29:08', '2023-12-14 09:29:08'),
(40, NULL, 'Noelia Mayert', 'Goodwin', 'murazik.vincenzo@example.net', '2023-12-14 09:29:08', '$2y$12$VpHUk0qUpzUHpMfCxeguLu4DDlrxqCfDCR/DA2sovt3.S93pONbG2', 'UfM3pdlnWr', 2, '73371864', '2477538', 5, 'Female', '2003-11-22', 'ducimus', 'numquam', '(417) 485-8440', '1998-09-15', NULL, 'B+', '162.17', '47.52', 'dicta', '9292 Maryse Center\nNew Beverly, NE 92650-5425', '51664 Bradtke Burg Suite 842\nRoobville, NM 43263', 'Married', 'nemo', 'voluptas', 'Sint consectetur rem et.', 0, 1, '2023-12-14 09:29:09', '2023-12-14 09:29:09'),
(41, NULL, 'Mrs. Cathryn Wiza', 'Gislason', 'wisozk.kennith@example.org', '2023-12-14 09:29:09', '$2y$12$FPVcr6neHcgsp.CHbuW56eF/ccP2VzTG939eaDUZN26KsES/TSoyq', 'cqx7LWha8k', 1, '58784895', '96867914', 29, 'Female', '1977-08-01', 'accusamus', 'vel', '559.437.9009', '2022-03-01', NULL, 'A-', '186.71', '132.6', 'hic', '9371 Marquardt Trail\nMadisentown, NE 71111-6731', '53301 Natasha Forges\nEast Deanberg, SC 52606-0742', 'Divorced', 'quibusdam', 'necessitatibus', 'Ut maxime amet aut vero voluptate sit eius.', 0, 0, '2023-12-14 09:29:09', '2023-12-14 09:29:09'),
(42, NULL, 'Mr. Eusebio Schiller Jr.', 'Pouros', 'toy.emilio@example.com', '2023-12-14 09:29:09', '$2y$12$QXXBNif9K64EftCilHEKoeOeXxY0KxADqBr5JeQqpKS16vASHCp1K', 'ofpaUmghqf', 4, '88931162', '55419082', 49, 'Female', '2004-09-11', 'odit', 'voluptates', '480.943.6082', '2011-08-05', NULL, 'O+', '183.62', '59.59', 'rem', '9233 Glover Station\nRowenaville, NV 68854', '575 John Cliffs\nEast Norene, ND 60282-4464', 'Single', 'aut', 'non', 'Ut et est reiciendis qui laboriosam laborum voluptatem.', 0, 1, '2023-12-14 09:29:09', '2023-12-14 09:29:09'),
(43, NULL, 'Maximilian Lakin', 'Gleichner', 'christa.kutch@example.com', '2023-12-14 09:29:09', '$2y$12$LZ5O5g/awJqtodNwR38HKe9ikkNB6yVt0oSlG//r7dD.L5CvG2idK', '2MLtdWp3oY', 4, '26166725', '84769596', 53, 'Male', '1992-10-13', 'quo', 'aut', '1-605-979-6553', '1998-05-10', NULL, 'AB-', '165.68', '91.7', 'facere', '52892 Durgan Hills Apt. 065\nPort Angelitashire, SC 43187', '4507 Lindgren Villages\nCaitlynchester, VA 54810-7185', 'Divorced', 'quia', 'velit', 'In iusto quos odit voluptatem voluptate dicta.', 0, 1, '2023-12-14 09:29:09', '2023-12-14 09:29:09'),
(44, NULL, 'Daisy Ondricka', 'Reynolds', 'hodkiewicz.rhea@example.com', '2023-12-14 09:29:09', '$2y$12$.YC/vmVXgdSS2TNxGJcgduGR02PduvQsFVJIckCSKsW4BmSehC/CC', 'r9OSypI1MD', 2, '6151074', '24359106', 85, 'Male', '1996-07-07', 'error', 'enim', '+15516704691', '2019-10-29', NULL, 'O-', '175.89', '63.89', 'et', '1236 Koepp Tunnel\nSallyborough, IA 62273-1913', '94252 Manuel Flats\nTraceyshire, ND 15904-9567', 'Single', 'voluptatibus', 'ex', 'Vel repellendus sunt qui mollitia alias laboriosam.', 0, 0, '2023-12-14 09:29:09', '2023-12-14 09:29:09'),
(45, NULL, 'Prof. Adolphus Muller DDS', 'Bednar', 'myriam.grant@example.org', '2023-12-14 09:29:10', '$2y$12$2Nf27DK.24aZClL4uuhhWemJdvV.e9ejzh03.qEPOtzpBtPclIeTm', 'tuGBWMgjnS', 1, '45934965', '90854081', 80, 'Female', '1990-02-28', 'sed', 'id', '937.214.3686', '2004-01-22', NULL, 'AB-', '198.26', '77.1', 'voluptatem', '514 Aliyah Inlet\nOletaborough, DC 87819', '812 Archibald Brook Apt. 080\nLake Ryann, MS 51880', 'Divorced', 'sed', 'ut', 'Qui numquam architecto omnis eius.', 0, 0, '2023-12-14 09:29:10', '2023-12-14 09:29:10'),
(46, NULL, 'Lesley Oberbrunner', 'Labadie', 'qdubuque@example.net', '2023-12-14 09:29:10', '$2y$12$xz4Xjhl.1IYQbmh79gqKZuBdZMMsq7GvUkB6KkYwQTkMzYFWmF5vi', 'ev7j20ueSs', 2, '13506801', '61825760', 14, 'Male', '1978-04-12', 'ratione', 'et', '(475) 719-3046', '1998-07-13', NULL, 'AB-', '188.36', '110.99', 'soluta', '3846 Ortiz Stravenue\nNew Brendenport, MD 27902', '83925 Hackett Unions Suite 388\nKerluketon, GA 89757-0509', 'Single', 'tempora', 'repellat', 'Molestias velit ut molestias sed ut.', 0, 1, '2023-12-14 09:29:10', '2023-12-14 09:29:10'),
(47, NULL, 'Dario Welch', 'Marvin', 'lesly.mueller@example.net', '2023-12-14 09:29:10', '$2y$12$r4cVCO7QF3Qb2vHxiTGJDeuDYEtr.AHm0iZLBjUsbt.ixuBQL7TwG', 'ufocjVOxkc', 1, '23004950', '24559952', 89, 'Female', '1999-04-02', 'voluptate', 'vel', '+1-325-410-5332', '1999-01-07', NULL, 'AB-', '188.93', '58.13', 'eum', '112 Lavina Expressway\nSouth D\'angelo, MS 58459', '6648 Greg Ranch\nSouth Rosario, AL 36329', 'Single', 'eius', 'blanditiis', 'Tempora ipsam nihil et reprehenderit.', 0, 1, '2023-12-14 09:29:10', '2023-12-14 09:29:10'),
(48, NULL, 'Virginia Bruen V', 'Mohr', 'eichmann.eugene@example.com', '2023-12-14 09:29:10', '$2y$12$DgSNYTtDVGRAm..NxqWlbe2AESoYO7aYK0iIVmMMQ2gExiIqN/2wO', 'm3uLuGnPoH', 2, '2010886', '96879185', 62, 'Male', '2018-07-27', 'consectetur', 'doloremque', '(209) 416-0389', '1995-12-08', NULL, 'AB-', '197.31', '61.17', 'labore', '40612 Twila Keys\nBartmouth, UT 15560-2673', '7378 Lilly Way Suite 598\nO\'Connerland, MI 80283', 'Single', 'minima', 'rem', 'Ad sed deserunt ab.', 0, 0, '2023-12-14 09:29:10', '2023-12-14 09:29:10'),
(49, NULL, 'Easter Nitzsche', 'Runte', 'jace11@example.org', '2023-12-14 09:29:10', '$2y$12$OzrpoFxtZ/daVr4UQcSMoOuPS/1e3mSZHP1DW5woFSlf0jwq7zsV6', 'pzomtWN6n8', 4, '73140929', '61171132', 34, 'Female', '1992-12-07', 'maiores', 'ut', '252-980-8575', '1984-11-18', NULL, 'O-', '170.82', '149.39', 'numquam', '60182 May Ridge Suite 220\nNorth Haileyshire, ND 77222', '756 Allen Fields\nNorth Destinychester, NC 39645-0838', 'Single', 'ut', 'laborum', 'Libero eos ullam voluptates consequatur.', 0, 1, '2023-12-14 09:29:11', '2023-12-14 09:29:11'),
(50, NULL, 'Franco Gerhold', 'Kling', 'birdie67@example.org', '2023-12-14 09:29:11', '$2y$12$ZnhQ1TkYrPSZy6.p9ob9NOanO1U7blEkwMRfQ25b6uiri2ypLhuKK', 'vqwKaDyigm', 4, '70214023', '60977075', 10, 'Male', '2017-08-09', 'nisi', 'aperiam', '+1.424.771.9927', '2021-05-04', NULL, 'AB-', '159.26', '98.77', 'nostrum', '777 Buckridge Course\nGleichnerland, WY 21906', '194 Jarrell Keys Apt. 306\nWillville, MS 40912', 'Divorced', 'quisquam', 'inventore', 'Facere explicabo eaque porro amet.', 0, 1, '2023-12-14 09:29:11', '2023-12-14 09:29:11'),
(51, NULL, 'Kaylee O\'Keefe IV', 'Kovacek', 'runolfsdottir.eulalia@example.net', '2023-12-14 09:29:11', '$2y$12$QJrI1tdNLwtwzta6gIZaHu6YtFqA5B35y1HNxlLTjv3XHLl.uxxR.', 'Hp3bu89xZk', 3, '88355816', '57778477', 52, 'Male', '2015-08-09', 'quasi', 'voluptatum', '+19092147942', '1978-02-22', NULL, 'O-', '172.1', '45.33', 'impedit', '31591 Ewell Crescent Apt. 020\nNew Alexandrinefurt, TX 14258', '6398 Haag Ridges Apt. 619\nRippintown, IL 01791-7291', 'Divorced', 'maxime', 'repellendus', 'Numquam eos est veniam et et exercitationem.', 0, 1, '2023-12-14 09:29:11', '2023-12-14 09:29:11'),
(52, NULL, 'Miss Lily Kihn', 'Littel', 'conn.marta@example.com', '2023-12-14 09:29:11', '$2y$12$BYQ/5pA6zPG8BWOcSx3bBeeyp68tQ9XDUGM0g0He7Vt/EZLfdgb5W', '4Z46jXDVsE', 3, '90821397', '95348275', 42, 'Male', '2012-08-21', 'qui', 'minima', '425.777.5210', '2005-05-28', NULL, 'A+', '150.26', '142.65', 'et', '7846 Lind Road\nHassiechester, MA 78613-8943', '80875 Gusikowski Causeway Suite 738\nBergeberg, CA 35735', 'Married', 'provident', 'quidem', 'Illo voluptas quas quaerat nihil nemo et.', 0, 1, '2023-12-14 09:29:11', '2023-12-14 09:29:11'),
(53, NULL, 'Laverna Blick I', 'Kreiger', 'celia.murray@example.net', '2023-12-14 09:29:11', '$2y$12$TcPLMmXijIGMYRLneae0EufLYoBryXFvO1CPO80r8RDNotc5y16be', 'CK6em4rChG', 4, '55237011', '58142804', 41, 'Male', '2015-04-01', 'dolores', 'necessitatibus', '863.721.9422', '2010-02-11', NULL, 'AB+', '181.12', '111.97', 'maiores', '68070 Denesik Drive\nNolanstad, LA 89667-2125', '41760 Keeling Fall\nBalistreribury, KY 69272', 'Divorced', 'quis', 'voluptas', 'Autem quam ut deleniti in aut aspernatur voluptatem.', 0, 0, '2023-12-14 09:29:11', '2023-12-14 09:29:11'),
(54, NULL, 'Dax Jenkins', 'Flatley', 'shields.ellsworth@example.org', '2023-12-14 09:29:11', '$2y$12$WlPHhpPZ7DItB1t89sM7EO6FkAoBFW8fQjWktlUVsEhJ1Ryzqfl9a', '7IzxVLZsIX', 4, '28397231', '95596137', 2, 'Male', '1973-04-28', 'laboriosam', 'omnis', '(678) 430-2289', '1985-04-11', NULL, 'O+', '177.55', '46.99', 'nihil', '56780 Erin Pass\nSouth Everettville, FL 92127', '25185 Rath Courts Suite 134\nFeeneyview, MI 87181-5273', 'Divorced', 'beatae', 'sed', 'Corrupti perspiciatis voluptas asperiores error ut quasi veritatis.', 0, 1, '2023-12-14 09:29:12', '2023-12-14 09:29:12'),
(55, NULL, 'Ms. Ellen Dibbert II', 'Corkery', 'lennie32@example.com', '2023-12-14 09:29:12', '$2y$12$.fyFfZdpW3./HcGJdIwmtekKyKB7LOM.Yf03549.e78r2AYzac0U2', '1SjXQiENl0', 2, '97175082', '3099324', 66, 'Female', '2000-01-31', 'facilis', 'ipsum', '351-389-9731', '1984-12-10', NULL, 'O-', '184.06', '108.54', 'enim', '8514 Schmeler Spring\nShayneburgh, OK 70100', '7217 Rey Burgs\nDorotheamouth, TN 37624', 'Divorced', 'in', 'nemo', 'Reprehenderit aut voluptas suscipit pariatur aliquid.', 0, 0, '2023-12-14 09:29:12', '2023-12-14 09:29:12'),
(56, NULL, 'Trevor Cole', 'Paucek', 'sporer.tara@example.com', '2023-12-14 09:29:12', '$2y$12$5W5X5/UZ/fsmTbOXxBNj5OXSABnnG5BqA3saYxUoWXjFn1YOxCyyO', 'ef0CGe60Uf', 3, '67447943', '20360325', 23, 'Male', '1982-10-05', 'accusantium', 'autem', '+1.407.876.2784', '2014-08-13', NULL, 'B-', '198.89', '46.88', 'vel', '16830 Lakin Islands\nJulioville, ME 76865', '698 O\'Keefe Ports Apt. 399\nDollybury, WY 58151', 'Divorced', 'eius', 'dolor', 'Voluptas ut debitis rem magnam ullam dicta adipisci.', 0, 1, '2023-12-14 09:29:12', '2023-12-14 09:29:12'),
(57, NULL, 'Jillian Hintz', 'Toy', 'jamey.botsford@example.net', '2023-12-14 09:29:12', '$2y$12$fhzoovE4eVcrfKvLC724DusOwlPErJBk94e0Vv.HdIePyySNq/V/a', 'eLsunuLlr2', 4, '42644494', '17023655', 54, 'Female', '1974-09-05', 'velit', 'tenetur', '1-651-541-0761', '1981-06-04', NULL, 'B+', '194', '146.28', 'hic', '226 Bartell Points Suite 186\nRolfsonfort, FL 61622', '96029 Juana Turnpike Suite 915\nNew Weldon, NE 17639', 'Married', 'distinctio', 'odit', 'Odio eum rem itaque sed.', 0, 0, '2023-12-14 09:29:12', '2023-12-14 09:29:12'),
(58, NULL, 'Zachariah Nikolaus Jr.', 'Mueller', 'ivandervort@example.com', '2023-12-14 09:29:12', '$2y$12$Lh./J/1YwjCsgULqaPGuk.H6Qh8zgUhKPK9vNx5YS3F16wLhYVQdS', 'IdUgpk6Qqj', 2, '20577611', '91780911', 63, 'Female', '1991-02-16', 'totam', 'sunt', '+1-531-415-7510', '1997-12-18', NULL, 'B-', '169.07', '116.29', 'quia', '51391 Emiliano Lodge Apt. 662\nWolffland, NJ 96863', '675 Adams Ports\nLethafort, TX 57365-6061', 'Single', 'dolorum', 'vitae', 'Similique nostrum sint labore non.', 0, 0, '2023-12-14 09:29:13', '2023-12-14 09:29:13'),
(59, NULL, 'Orval Hartmann', 'Stokes', 'michele.rippin@example.net', '2023-12-14 09:29:13', '$2y$12$GcJlofF1cFF9IIjBaa7YY..QYxbG1LB42sZb72gvwdqfvaKnQE0Aq', 'B7Yn4l4uOO', 2, '89347198', '18597291', 90, 'Female', '1971-12-25', 'quis', 'ipsam', '213.365.1038', '2011-06-06', NULL, 'O-', '173.44', '43.94', 'repellat', '6295 Zboncak Ferry\nWizaport, MS 23255-0191', '6268 McDermott Locks\nLake Rodrigohaven, MD 98520', 'Divorced', 'ab', 'praesentium', 'Temporibus pariatur ea hic ipsum nihil sapiente.', 0, 1, '2023-12-14 09:29:13', '2023-12-14 09:29:13'),
(60, NULL, 'Miss Drew Moen', 'Luettgen', 'tillman.elinore@example.com', '2023-12-14 09:29:13', '$2y$12$SneroMGK.08FX8W5O/mmze5Ho5kmrwBH/JwQiuTekshvPQoC2yTyq', 'SsxvNffxuO', 2, '59135577', '26557984', 90, 'Female', '2009-08-07', 'aspernatur', 'adipisci', '+1 (567) 517-0337', '1978-03-12', NULL, 'A-', '187.91', '88.12', 'harum', '81925 Anabel Well Apt. 285\nKevinburgh, MI 26396', '1082 Rolando Spring\nLake Kodyview, ID 60785-5868', 'Married', 'pariatur', 'laboriosam', 'Sit ipsam sit consequatur occaecati voluptatem aliquam.', 0, 0, '2023-12-14 09:29:13', '2023-12-14 09:29:13'),
(61, NULL, 'Jeffrey Koepp', 'Langworth', 'wlegros@example.org', '2023-12-14 09:29:13', '$2y$12$nHoujXnhB3aXHB8MPk5bcuL.7ABUV.VBRsLILdiz6/w47wC/Wvw7q', 's80iri72fq', 4, '19023041', '98354631', 59, 'Male', '2013-08-16', 'temporibus', 'nihil', '+1 (860) 790-0010', '1979-03-08', NULL, 'B+', '165.95', '127.96', 'reprehenderit', '9206 Dicki Crossing\nSouth Micah, MD 12176-7422', '23284 Billie Wall Suite 289\nNew Erna, WA 52572-7758', 'Divorced', 'et', 'inventore', 'Saepe est et labore sint error eos voluptatem ex.', 0, 1, '2023-12-14 09:29:13', '2023-12-14 09:29:13'),
(62, NULL, 'Celestino Murphy III', 'Hammes', 'ellis80@example.org', '2023-12-14 09:29:13', '$2y$12$rJe8Lh5CMLktzdwa3V54euSVnkh4FGYGdSiM45rEoMo6SJZLvTIke', 'DD7Yt5XXui', 1, '55290673', '15316539', 51, 'Male', '2000-10-28', 'voluptas', 'et', '(220) 698-9742', '1980-08-09', NULL, 'O-', '180.94', '60.48', 'expedita', '28063 Satterfield Rue\nWeberland, LA 93523', '3628 McCullough Coves Apt. 079\nEast Tess, IL 62729-9593', 'Single', 'fugit', 'laboriosam', 'Architecto deleniti est iste consequatur dolorem.', 0, 0, '2023-12-14 09:29:13', '2023-12-14 09:29:13'),
(63, NULL, 'Jackeline Swift', 'Corwin', 'george.conroy@example.net', '2023-12-14 09:29:13', '$2y$12$/SQxnpbfe7bjl1c.Lxoq0eNG4p19cjJCk0UWfQkQEYUdwPmp6aG0u', 'W55AkHFaBX', 4, '10581040', '709671', 97, 'Male', '1974-11-22', 'esse', 'eum', '667-908-4093', '1987-02-18', NULL, 'O+', '171', '66.51', 'sit', '925 O\'Conner Inlet Apt. 261\nReillystad, PA 52775-9154', '4984 Eladio Views Apt. 715\nAbbottport, CT 83642-5570', 'Single', 'sed', 'optio', 'Facere odit sint omnis nulla.', 0, 0, '2023-12-14 09:29:14', '2023-12-14 09:29:14'),
(64, NULL, 'Christina Schiller', 'Sawayn', 'margret82@example.com', '2023-12-14 09:29:14', '$2y$12$xPsAGB32lzutIx/zAdkWZulBxmWXxnhlEF/YsFWlnGG4Zc0OrvDaC', 'Zm9VazDk4H', 2, '99950732', '64721347', 79, 'Female', '1970-07-12', 'ut', 'quia', '386.572.0216', '1982-05-01', NULL, 'O-', '160.28', '100.52', 'delectus', '82230 Blanda Pine Suite 395\nSouth Lacey, IL 51286-3000', '292 Betty Islands\nWest Antoniettafurt, NH 89640', 'Married', 'et', 'sint', 'Dolorem enim vel ratione et esse iusto sint eum.', 0, 0, '2023-12-14 09:29:14', '2023-12-14 09:29:14'),
(65, NULL, 'Jaime Predovic', 'Mosciski', 'arnulfo91@example.com', '2023-12-14 09:29:14', '$2y$12$fGg82uKwdCHX5QFhzkSJ9.FBUhhIOdQJohh0nf7Gf9jNI83bCXl4y', 'v2sjQU45FW', 4, '43298987', '62039694', 83, 'Female', '1983-10-31', 'quisquam', 'quisquam', '+1-480-609-6690', '1981-06-22', NULL, 'AB+', '152.7', '106.81', 'accusamus', '703 Lula Lodge Apt. 752\nSouth Tracy, MI 17745', '2597 Huel Union Apt. 974\nLake Juana, SC 98594-9467', 'Married', 'occaecati', 'suscipit', 'Sed harum dolor autem neque fuga quisquam autem ab.', 0, 1, '2023-12-14 09:29:14', '2023-12-14 09:29:14'),
(66, NULL, 'Ezequiel Glover', 'Erdman', 'alta.thiel@example.com', '2023-12-14 09:29:14', '$2y$12$b7a8yIvjwMxrmaW8G.JuI.6Ooz8lHFGZ4ft9BMm8FdhdOp41VMqQa', 'ZCHu8FCPi0', 2, '71201333', '51420278', 10, 'Male', '2016-05-18', 'minima', 'suscipit', '1-726-654-8757', '1980-09-08', NULL, 'O+', '150.41', '123.45', 'iure', '27389 Harmony Shoals\nLylaport, RI 55831-5923', '4627 Ledner Forges Suite 722\nNew Rettabury, KS 34638', 'Single', 'nihil', 'deserunt', 'Incidunt quaerat quos architecto occaecati id et.', 0, 0, '2023-12-14 09:29:14', '2023-12-14 09:29:14'),
(67, NULL, 'Prof. Hermina Hane', 'Dicki', 'cecil.ziemann@example.org', '2023-12-14 09:29:14', '$2y$12$Sz0RgHwymSvDUdrIljHfa.xBHlPrD17rNxibI3OcAlnN6kzIWno5m', '17iJrmUifT', 4, '68120904', '99784039', 84, 'Female', '1977-07-01', 'facilis', 'molestiae', '+15406148439', '1999-09-16', NULL, 'AB-', '199.81', '54.31', 'labore', '3186 Edmond Wells Suite 416\nJastmouth, VT 03448-0713', '4404 Miller Prairie Suite 943\nJoannemouth, KY 08440-2813', 'Divorced', 'voluptatem', 'incidunt', 'Quasi quo sapiente veritatis officia.', 0, 1, '2023-12-14 09:29:14', '2023-12-14 09:29:14'),
(68, NULL, 'Prof. Edward Ward', 'Kilback', 'kuphal.frances@example.net', '2023-12-14 09:29:14', '$2y$12$pL7DGG.MxpYazEIaLJ9mRu8G0d4C2XIv.VIoap9YCAMYfihfOuqe.', 'cUM98IHsSn', 2, '29478926', '60913998', 47, 'Male', '1990-04-14', 'temporibus', 'cupiditate', '(540) 444-2359', '1988-11-10', NULL, 'O+', '197.61', '112.73', 'dolor', '98520 Rex Drive\nNorth Sheldon, OR 95801-9480', '884 Ryan Club Apt. 137\nOndrickafort, VT 77380-7868', 'Married', 'blanditiis', 'quis', 'Blanditiis et id sapiente eos.', 0, 1, '2023-12-14 09:29:15', '2023-12-14 09:29:15'),
(69, NULL, 'Dr. Deshaun Hessel', 'Turner', 'rogers.auer@example.org', '2023-12-14 09:29:15', '$2y$12$khZwqDx21UltHWaABclcu.5/F8Q01tFajHQoRVSj42v66qr4o0k6m', 'YM1EwixSqU', 3, '74801806', '83690867', 2, 'Female', '2008-06-06', 'deleniti', 'fugit', '1-513-216-0492', '1995-04-12', NULL, 'AB-', '186.82', '128.09', 'eos', '8059 Lavinia Port Suite 479\nWaelchiberg, CT 28711', '70074 Senger Turnpike Apt. 452\nJeanieburgh, RI 66763-3016', 'Married', 'vel', 'debitis', 'Autem quasi natus nam minus amet.', 0, 0, '2023-12-14 09:29:15', '2023-12-14 09:29:15'),
(70, NULL, 'Lavinia Leannon', 'Windler', 'oromaguera@example.org', '2023-12-14 09:29:15', '$2y$12$ID2kWLsSkvpryw/XpLhYROakWiNBSkikLiepL2uV9aw5o8onrRh3S', 'viWGGBzfYo', 2, '92046388', '24882665', 52, 'Female', '1996-09-22', 'et', 'debitis', '1-636-646-5480', '1970-11-07', NULL, 'AB-', '189.75', '110.75', 'rem', '638 Karlee Dam Apt. 858\nDaronfort, MA 27775', '6783 Eichmann Roads Apt. 088\nKurtmouth, ND 41921', 'Divorced', 'sequi', 'et', 'Quaerat sed dolores modi sit voluptatem ad dolor.', 0, 1, '2023-12-14 09:29:15', '2023-12-14 09:29:15'),
(71, NULL, 'Giovani Walsh Jr.', 'Bailey', 'qabernathy@example.net', '2023-12-14 09:29:15', '$2y$12$mG3aYKCzkGbS0exfp77nbOkjlDYWtlrNu6/eN1ttaUeZcW7.GuUJq', 'bVR9dH0sVm', 2, '27755645', '90327372', 83, 'Male', '1997-03-14', 'voluptatem', 'ea', '+1-678-751-6879', '1999-06-07', NULL, 'AB+', '185.51', '61.84', 'ratione', '14689 Merle Meadow\nDakotashire, DC 34248', '692 Wilford Via Apt. 738\nEmilyside, OR 34859-9487', 'Married', 'dicta', 'distinctio', 'Fuga consequatur quia molestias sed totam expedita accusamus.', 0, 0, '2023-12-14 09:29:15', '2023-12-14 09:29:15'),
(72, NULL, 'Carmen Glover', 'Dietrich', 'aurore32@example.com', '2023-12-14 09:29:15', '$2y$12$mByLMBYA.8tl.WUTgFoqSu6teGGvmSvEKJ7UEjGg5tinHubwS1/1y', 'HytKJElO1W', 4, '26645676', '76118369', 92, 'Male', '1980-11-18', 'fugiat', 'ea', '419-792-9754', '1974-10-23', NULL, 'A+', '190.33', '125.19', 'voluptas', '38312 Lesly Square\nNorth Gusttown, NY 49412', '64170 Fay Rapids\nNew Noemie, CA 00919', 'Single', 'qui', 'et', 'Ipsum ipsum rerum earum totam asperiores.', 0, 0, '2023-12-14 09:29:16', '2023-12-14 09:29:16'),
(73, NULL, 'Dr. Guadalupe O\'Kon', 'Cummings', 'jamie44@example.org', '2023-12-14 09:29:16', '$2y$12$BeDCbwVL.7zt13GfL0Byd.p76OHHnXKnA9M068eoWOyzVTCbegMAe', '62epFOzAiN', 1, '69936416', '34979616', 9, 'Female', '2017-01-03', 'nisi', 'et', '458.689.8589', '1995-11-19', NULL, 'AB+', '164.04', '148.57', 'amet', '5046 Hegmann Pines Suite 012\nPort Ova, AR 13880', '83298 Pouros Shoal\nPort Huntertown, HI 24832-5022', 'Divorced', 'dolor', 'eos', 'Ut et sint aut assumenda accusantium quia sunt.', 0, 1, '2023-12-14 09:29:16', '2023-12-14 09:29:16'),
(74, NULL, 'Quentin Hayes Sr.', 'Nikolaus', 'lubowitz.bria@example.org', '2023-12-14 09:29:16', '$2y$12$1PyfVeVqEmD/3L6Y465H3O8NyG7ztvNffU04RqYGovMnJLdU0ZulG', 'VgesBlWTj4', 4, '79294585', '50407707', 16, 'Male', '1985-05-12', 'quae', 'quos', '501-633-9439', '1980-07-26', NULL, 'AB-', '173.1', '69.64', 'et', '686 Brennan Pike\nShanelburgh, WI 80161', '12876 Zulauf Plains\nStehrmouth, TX 24829-7221', 'Married', 'ipsam', 'culpa', 'Eligendi minima quas sequi ad alias ea incidunt.', 0, 0, '2023-12-14 09:29:16', '2023-12-14 09:29:16'),
(75, NULL, 'Liliana Herman', 'Kuvalis', 'morissette.cullen@example.net', '2023-12-14 09:29:16', '$2y$12$ZuR0BEvr1KTw3r7eb0pcs.fTQg1YYXYBGIWTEFgzhypNhCu62.3ge', 't7Ikk9XCHv', 4, '47220203', '5885399', 82, 'Female', '2011-12-01', 'magnam', 'eius', '+1.845.722.2490', '2019-02-15', NULL, 'AB-', '191.98', '134.99', 'debitis', '1819 Abshire Passage\nWolffview, VT 37879-6922', '6849 Philip Well Suite 582\nLake Remington, NV 61012-9867', 'Single', 'blanditiis', 'quae', 'Ut nemo mollitia molestiae nihil.', 0, 1, '2023-12-14 09:29:16', '2023-12-14 09:29:16'),
(76, NULL, 'Colton Dicki', 'Beer', 'okon.deion@example.net', '2023-12-14 09:29:16', '$2y$12$.DwUxZnh9m59sem99Pwe4.3IPP79NSfcDtoO1HxBBVzqm8gs5mWbO', 'a9IQeWRgq6', 2, '33984444', '37062527', 73, 'Female', '2023-01-04', 'in', 'animi', '518.380.4017', '1989-06-10', NULL, 'A-', '189.77', '76.59', 'eaque', '5293 Farrell Valleys Apt. 662\nRosenbaumhaven, SD 81098-6925', '95732 Abshire River Suite 182\nKleinbury, AR 17210', 'Married', 'et', 'asperiores', 'Magni natus ut maxime facilis dolor delectus dolorem.', 0, 0, '2023-12-14 09:29:16', '2023-12-14 09:29:16'),
(77, NULL, 'Taurean Koss II', 'Schmeler', 'lexie.jerde@example.net', '2023-12-14 09:29:16', '$2y$12$MMkvNfaIf5UgkqpBVwV0Aub27bb.7wI5MKYTPx7kfL/uHmUISr8MK', 'ir3cIFr1vX', 1, '10917967', '10862133', 88, 'Male', '1976-04-28', 'neque', 'cupiditate', '+1.341.807.0510', '1977-09-22', NULL, 'B+', '155.97', '43.62', 'ad', '5137 Isom Manor Suite 859\nSheridantown, CA 14870', '94686 Deontae Drive Suite 633\nSouth Camron, UT 40714', 'Divorced', 'molestiae', 'facere', 'Omnis nesciunt quasi repellat eum.', 1, 1, '2023-12-14 09:29:17', '2023-12-16 04:34:52'),
(78, NULL, 'Miss Althea Stroman', 'Collier', 'maryam.schimmel@example.net', '2023-12-14 09:29:17', '$2y$12$XIekCJpB6T1KgrWsSe3scuPXe1dxZdTWmm1l2FAnC34RubJpUF9CS', 'PafhL9K91f', 2, '31240767', '89774611', 12, 'Male', '1981-10-17', 'at', 'veniam', '+1-501-864-2765', '1981-01-10', NULL, 'O-', '192.4', '144.67', 'eveniet', '296 Cremin Route Apt. 210\nPacochatown, NY 07479-5826', '9038 O\'Connell Crossroad Apt. 889\nLake Murlbury, FL 46024-9000', 'Married', 'quia', 'explicabo', 'Minus laudantium esse numquam velit similique.', 0, 1, '2023-12-14 09:29:17', '2023-12-14 09:29:17'),
(79, NULL, 'Morton Schmidt', 'Quitzon', 'wwehner@example.org', '2023-12-14 09:29:17', '$2y$12$enAx1E06RQ65PX3cV1fTaO0nLTSGKw5C2cY6965CSmBmddO5L98C2', 'utqd0xSMmU', 4, '52986734', '6541713', 92, 'Female', '1983-05-07', 'eum', 'reiciendis', '(682) 884-3598', '1990-07-11', NULL, 'A+', '163.83', '51.14', 'adipisci', '593 Gaylord Crescent Suite 830\nJasenborough, OR 92579-0858', '1001 Donny Skyway Apt. 286\nLake Maiya, UT 06386', 'Single', 'at', 'corporis', 'Veniam tempore eum eos quos explicabo.', 0, 1, '2023-12-14 09:29:17', '2023-12-14 09:29:17'),
(80, NULL, 'Mrs. Josianne Crooks', 'Moen', 'garrison79@example.com', '2023-12-14 09:29:17', '$2y$12$Dl3JQh8B.gQqm/HiZIug8OOvuP1Rom8JWc2M1FLOgdE1LUxbTDrsW', 'IxzXF93TLM', 4, '23070245', '69059661', 29, 'Male', '1987-12-28', 'voluptatibus', 'deleniti', '820-401-9487', '1991-09-15', NULL, 'A+', '184.45', '98.82', 'voluptas', '33264 Dax Viaduct\nPort Pearliechester, OH 64029-0464', '964 Ferry Harbors Apt. 331\nMavismouth, RI 08333', 'Divorced', 'non', 'qui', 'Optio porro libero consequatur sunt qui laborum.', 0, 1, '2023-12-14 09:29:17', '2023-12-14 09:29:17'),
(81, NULL, 'Korbin Abernathy', 'Hermann', 'kunze.freda@example.com', '2023-12-14 09:29:17', '$2y$12$L06zL3ao42RFP2mXkMZhaeGRUAgLs7tjbwovF3q3I1.mpW0ysoVPu', '17d0PYY71c', 1, '2943547', '35406878', 35, 'Male', '2016-10-08', 'animi', 'sit', '1-205-845-2118', '1970-04-20', NULL, 'O+', '174.67', '54.27', 'aperiam', '221 Filiberto Branch Suite 998\nNew Hope, NM 48314', '390 Watsica Rue\nMrazview, NV 12587', 'Divorced', 'quia', 'neque', 'Fuga est odio numquam reprehenderit qui unde nostrum.', 0, 0, '2023-12-14 09:29:18', '2023-12-14 09:29:18'),
(82, NULL, 'Gladys Ratke MD', 'Ullrich', 'amarvin@example.com', '2023-12-14 09:29:18', '$2y$12$e9Lm4t5ieN.Ket3FM81Vc.GWw7zIHMzEQ.q.1OrkcpGtQiyIAH4Tu', '0ozW0uwaJI', 1, '92585272', '12310073', 51, 'Male', '2005-02-03', 'ducimus', 'quo', '336.760.2607', '1971-04-20', NULL, 'AB-', '196.66', '111.65', 'culpa', '574 Zella Roads Suite 864\nCollierhaven, IL 59182', '973 Jaskolski Circle Suite 510\nNorth Bonnie, MO 41646-0574', 'Single', 'a', 'fuga', 'Totam soluta vero cum eos non laudantium.', 0, 1, '2023-12-14 09:29:18', '2023-12-14 09:29:18'),
(83, NULL, 'Adolfo Kautzer DVM', 'Luettgen', 'terry.anabel@example.net', '2023-12-14 09:29:18', '$2y$12$3LcdQ4KyWcw839FSKosmDeGm/ZAXPa433XaBicn95wTeQMCWdVl5i', 'q0FwmWFWsU', 2, '53792530', '84222545', 71, 'Female', '2017-03-31', 'ut', 'sapiente', '+1.463.591.8884', '2023-06-09', NULL, 'B-', '152.95', '84.37', 'aut', '12124 Terrill Plaza\nJenningsbury, CT 26750', '606 Shany Lock\nCharliemouth, NJ 83678', 'Single', 'neque', 'quia', 'Dolorem est unde possimus voluptatem perspiciatis quisquam saepe facere.', 0, 0, '2023-12-14 09:29:18', '2023-12-14 09:29:18'),
(84, NULL, 'Miss Marielle O\'Kon', 'Brown', 'kuhlman.sincere@example.com', '2023-12-14 09:29:18', '$2y$12$OYVnJnHgL.NsDTrOFz5eNO68TriWgvc43OHws1DOwIV9ktZBfaiuC', 'oGoqEE3kLn', 2, '51949978', '2614282', 84, 'Male', '2019-07-20', 'sunt', 'in', '+1-413-419-5855', '2009-07-06', NULL, 'B+', '176.24', '108.48', 'quibusdam', '34042 Hermiston Trail Apt. 401\nEladioside, AL 11784-0129', '789 Flatley Ville\nCaleville, AK 91808', 'Married', 'eveniet', 'cupiditate', 'Et quisquam nihil doloremque et sint eos aut.', 0, 0, '2023-12-14 09:29:18', '2023-12-14 09:29:18'),
(85, NULL, 'Bernard Koch', 'O\'Keefe', 'amanda65@example.net', '2023-12-14 09:29:18', '$2y$12$f3i2RrdNU/HX6jQlBBO.euLxpi7zWm.rmeUGbjE930VvlcLRwQ5La', 'HrToZAv5Lj', 3, '51579855', '39567215', 36, 'Female', '1983-09-10', 'velit', 'dicta', '+1-440-791-7097', '2010-12-08', NULL, 'O+', '176.42', '122.58', 'sunt', '1528 Bailey Club Apt. 790\nPacochastad, UT 07328-9398', '868 Westley Forks\nLake Theodora, CT 95325-8289', 'Married', 'rerum', 'illo', 'Quis est quia molestias debitis repellendus velit.', 0, 0, '2023-12-14 09:29:18', '2023-12-14 09:29:18'),
(86, NULL, 'Shana Ferry MD', 'Gleason', 'hlangworth@example.com', '2023-12-14 09:29:18', '$2y$12$h8Bg9AlIzgNaHPfHuVN.eeGiRPUlTBRT0xWtGzkbVlts0/Z74wbM.', 'hZPMqCUjra', 2, '56235829', '36961740', 47, 'Male', '1970-02-11', 'repellendus', 'inventore', '205-439-6154', '1972-09-29', NULL, 'O-', '183.35', '73.92', 'laborum', '4694 Malcolm Mills\nLake Yadira, NH 99030', '974 Flatley Circles\nHamillfurt, NE 83955-9477', 'Married', 'voluptate', 'amet', 'Consequatur sunt dolor rerum illum perspiciatis magnam totam.', 0, 1, '2023-12-14 09:29:19', '2023-12-14 09:29:19'),
(87, NULL, 'Barrett Reichel', 'Will', 'hegmann.major@example.net', '2023-12-14 09:29:19', '$2y$12$07cfDJOAP.OKKZ5dfyBfOOK7G5MT7ZXnlnlx3e2SBd9Gkrh/jviBq', 'LLPwOf7u8F', 2, '68745782', '25840348', 73, 'Male', '2020-08-03', 'sint', 'sapiente', '832.462.2749', '1971-01-11', NULL, 'A-', '172.55', '130.47', 'suscipit', '353 Velma Isle\nAbshireshire, OH 03610-3051', '3295 Veum Alley Suite 752\nNorth Chasestad, AL 06320-2223', 'Divorced', 'qui', 'provident', 'Inventore in molestiae earum.', 0, 1, '2023-12-14 09:29:19', '2023-12-14 09:29:19'),
(88, NULL, 'Mrs. Tess Williamson', 'Marquardt', 'karson91@example.net', '2023-12-14 09:29:19', '$2y$12$LsvZi6rYRvos9abR1Z8x8.AjCg2MI.UiZiCQsOzPrh39JMzvG0Csu', 'y9aZHqKdX1', 2, '20098131', '91420246', 18, 'Female', '1991-11-23', 'qui', 'et', '270.478.2967', '2019-01-18', NULL, 'AB+', '183.4', '95.14', 'sit', '5978 Dicki Drives\nWest Boyd, AK 58312', '492 Ida Squares Suite 447\nNew Kamron, DC 55832-2269', 'Single', 'omnis', 'nisi', 'Odio voluptate quas sequi est.', 0, 1, '2023-12-14 09:29:19', '2023-12-14 09:29:19'),
(89, NULL, 'Mae Fay DVM', 'Sipes', 'laisha93@example.org', '2023-12-14 09:29:19', '$2y$12$Kdm7BNoHWjACbgWMbBfeWOkFA8XBUCWAq5c.Q9h.h1dSjaaCoLAWK', 'T2Q5IfDCBj', 2, '42329442', '37115333', 48, 'Male', '1992-05-27', 'non', 'molestiae', '1-865-831-3069', '2018-08-15', NULL, 'B-', '160.61', '61.32', 'sint', '819 Dach Islands Suite 626\nForestborough, VA 34711-8127', '4698 Boyer Crossroad Apt. 560\nWest Tiaraview, MS 00118', 'Divorced', 'consequatur', 'quia', 'Eaque alias est dolorum omnis architecto maxime.', 0, 1, '2023-12-14 09:29:19', '2023-12-14 09:29:19');
INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `admission_number`, `roll_number`, `class_id`, `gender`, `date_of_birth`, `caste`, `religion`, `mobile_number`, `admission_date`, `profile_pic`, `blood_group`, `height`, `weight`, `occupation`, `address`, `permanent_address`, `marital_status`, `qualification`, `work_experience`, `note`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(90, NULL, 'Virginia Wintheiser V', 'Weimann', 'lkulas@example.com', '2023-12-14 09:29:19', '$2y$12$XHXcPW73BuJxE/FCZdVga.Ce2W6rJhZa3aarh0tYyukaCm/R2tDWK', '62c3toXQNP', 4, '11503076', '56074779', 13, 'Male', '2020-10-11', 'ratione', 'quaerat', '+1.971.259.8433', '1990-03-23', NULL, 'B-', '152.1', '75.47', 'quidem', '673 Dooley Forks\nNorth Lauryport, KS 51866-8230', '578 Keebler Ranch Apt. 273\nPort Gabetown, MA 02555', 'Single', 'molestias', 'quis', 'Facere cumque sit et tenetur voluptatem.', 0, 1, '2023-12-14 09:29:20', '2023-12-14 09:29:20'),
(91, NULL, 'Prof. Bertha Jenkins DDS', 'Hoeger', 'dixie.hodkiewicz@example.com', '2023-12-14 09:29:20', '$2y$12$f5PSZc5eLjbtrlbolxJhyecAsG76ArWi9aswQe6wvYd7tXdzd7Yv6', 'znGTALtbfD', 4, '20265707', '67322146', 10, 'Male', '2004-10-11', 'recusandae', 'modi', '+1 (662) 816-4669', '2012-06-10', NULL, 'AB+', '154.85', '97.46', 'ut', '55932 Rutherford Knoll Apt. 403\nLadariusshire, MS 34839', '4547 Dan Well\nPort Devon, TX 77866', 'Single', 'non', 'a', 'A mollitia aperiam quo fuga esse accusamus et qui.', 0, 1, '2023-12-14 09:29:20', '2023-12-14 09:29:20'),
(92, NULL, 'Mikel Tremblay', 'Kuvalis', 'michel.steuber@example.com', '2023-12-14 09:29:20', '$2y$12$eb4xfqZ28i1KzzoQqo7Gwe2wWPS8eQ87YzXsldxxs.w7QjwZfLb/m', 'TYEnrjAxPW', 2, '34804938', '15982341', 13, 'Male', '1981-09-18', 'pariatur', 'iusto', '630-504-2811', '1992-06-19', NULL, 'B-', '192.1', '143.34', 'voluptas', '90108 Rosario Rest Apt. 405\nLake Aliyahburgh, WY 09824-9806', '5804 Lexus Via Suite 009\nNew Javon, OH 84353-8203', 'Married', 'aut', 'maiores', 'Ut quasi sint enim molestiae dicta inventore.', 0, 0, '2023-12-14 09:29:20', '2023-12-14 09:29:20'),
(93, NULL, 'Coby Zulauf', 'Cremin', 'reece74@example.com', '2023-12-14 09:29:20', '$2y$12$lUt9kSQbARKlt8WQ6Lkc5u9CG4Aqw/F80192.FDddrubb8U45KBAO', 'd08gFt21rt', 2, '97790383', '2284433', 58, 'Female', '2011-02-04', 'aut', 'esse', '980-349-3951', '2004-06-17', NULL, 'AB+', '193.49', '76.95', 'est', '82786 Darron Ramp\nMelodychester, MA 95663', '10830 Reichel Alley\nBauchhaven, DC 68959', 'Single', 'iste', 'sit', 'Molestias commodi ut voluptatem accusantium.', 1, 0, '2023-12-14 09:29:20', '2023-12-22 08:31:37'),
(94, NULL, 'Margaretta Hermiston', 'Homenick', 'dullrich@example.com', '2023-12-14 09:29:20', '$2y$12$hQEMTxA6OQqlSJoj5DRwXuJN6sjZ9y4vLHjuO0LqZ0jstjrvWxsQa', '2VWDAHuhpZ', 3, '45550085', '20380158', 92, 'Female', '1997-03-06', 'velit', 'sequi', '+1-330-554-8037', '2014-08-30', NULL, 'A-', '192.7', '118.14', 'velit', '51948 Armstrong Estate Suite 709\nLake Carolland, NE 76491', '95370 Fabiola Hill\nEast Conner, TN 95243-5079', 'Married', 'eum', 'est', 'Dolores et fugiat praesentium illo dolor.', 0, 1, '2023-12-14 09:29:20', '2023-12-14 09:29:20'),
(95, NULL, 'Arlo Koch', 'Hills', 'bparisian@example.org', '2023-12-14 09:29:20', '$2y$12$uJ50hhhdgxwvUPFhtnlX0eNijBDGxceIPGMV7f.gd02K4wZwWntEe', 'ab44BMpIPl', 3, '7169252', '62466199', 30, 'Male', '2004-08-13', 'ut', 'modi', '380.234.1088', '2015-01-12', NULL, 'O+', '199.75', '87.99', 'et', '299 Eichmann Junctions\nDaronland, MA 17258', '2565 Donna Fort\nLake Juliusborough, PA 53121-1100', 'Married', 'dolor', 'suscipit', 'Vel sapiente quis laborum repudiandae quas soluta.', 0, 0, '2023-12-14 09:29:21', '2023-12-14 09:29:21'),
(96, NULL, 'Tressa Grant', 'Feeney', 'daniela.kirlin@example.org', '2023-12-14 09:29:21', '$2y$12$Vgxh7OuxAVPVyKaE5RcyPOEjZzUbNBgbhi1ABAX3/WVE3LB/rnF0C', 'l6Hq27jZe9', 1, '86129058', '59189187', 35, 'Male', '2023-10-16', 'sapiente', 'ut', '702-376-4627', '1978-07-08', NULL, 'A-', '151.73', '140.23', 'accusantium', '60835 Torp Orchard Apt. 318\nPort Myrtice, OK 24153', '9676 Rowland Stream\nCassinbury, ID 54765', 'Divorced', 'ut', 'aut', 'Quibusdam commodi ipsum debitis delectus iure vero omnis in.', 1, 1, '2023-12-14 09:29:21', '2023-12-22 07:59:20'),
(97, NULL, 'Percival Murphy', 'Schmidt', 'trisha.altenwerth@example.org', '2023-12-14 09:29:21', '$2y$12$LN8XtpBQ8n0qTPlUi3g.IOsd4G2EjI61YdicgT92wnqUSR26MbY2q', '5TuatTCUjn', 2, '68269959', '67798490', 0, 'Male', '1972-07-17', 'doloremque', 'velit', '+1-979-526-3585', '2009-01-24', NULL, 'A+', '170.2', '121.53', 'at', '635 Ebert Cliffs\nSouth Sisterfurt, FL 17963', '7650 Gislason Street Suite 477\nLake Alphonsobury, ID 01166-8654', 'Divorced', 'facilis', 'placeat', 'Odio magnam nam vel sit numquam.', 0, 0, '2023-12-14 09:29:21', '2023-12-14 09:29:21'),
(98, NULL, 'Mr. Wade Yost', 'Davis', 'pbeahan@example.org', '2023-12-14 09:29:21', '$2y$12$GRmQL.LV.xkx4.8niK0TpOJmVgjSkCpyIpoFdcIZ8vTUoDJhmMwWa', 'bAX4xgBliB', 4, '88771574', '29486275', 16, 'Male', '1982-03-29', 'tenetur', 'est', '231-342-3644', '2017-08-25', NULL, 'A+', '153.9', '138.92', 'aut', '5776 Betty Forges Apt. 585\nLennafort, MT 32754', '514 Ratke Squares Apt. 004\nOsbaldostad, SC 67949-4603', 'Married', 'non', 'tempore', 'Et in voluptatem officia sed fugiat id tempore.', 0, 0, '2023-12-14 09:29:21', '2023-12-14 09:29:21'),
(99, NULL, 'Adan Schmidt', 'Schmitt', 'carolyn45@example.com', '2023-12-14 09:29:21', '$2y$12$L5kgFWgP6rZVFN3zDwarp.QTDT3cLvT4wuR6A6pe0kELTdsA/LHFu', 'anratx7Vgg', 2, '41630752', '18098475', 13, 'Male', '1998-09-11', 'perspiciatis', 'reiciendis', '1-435-659-4615', '1976-08-09', NULL, 'B+', '168.58', '146.94', 'quia', '71256 Prosacco Landing\nStantonmouth, HI 36225', '3402 Mertz Viaduct\nHauckport, ID 73041', 'Married', 'asperiores', 'illo', 'Distinctio et illum aut repellendus.', 1, 0, '2023-12-14 09:29:21', '2023-12-22 08:30:39'),
(100, NULL, 'Prof. Brennan Crooks Sr.', 'Feil', 'webster72@example.com', '2023-12-14 09:29:21', '$2y$12$I959KkRU4scQwIJsk2JnU.2m.2lr3PzfW9hTt32S08V9/Ph5c8A1C', 'AZxK5lBmQW', 2, '83432059', '39206054', 73, 'Female', '2003-12-03', 'sed', 'labore', '(601) 601-3613', '2016-09-20', NULL, 'A-', '197.28', '142.23', 'non', '848 Earl Village Suite 349\nSouth Michelechester, MI 27605', '708 Vanessa Terrace\nWest Jakeborough, NM 47023-6854', 'Divorced', 'voluptatem', 'laboriosam', 'Quo sed quae explicabo sunt.', 0, 0, '2023-12-14 09:29:22', '2023-12-14 09:29:22'),
(101, NULL, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$GYqIFVRUe6i4aFRmIJW3s.H8MLkIloY0woxhJwv9Uci/Q3bBC4iM6', '3hhgKbOgzsGwRnFz5xAQpYD4jurs35gqOhXBIubblfzQQmih69rIFbhBuk72', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202312230812113b325cl5xslwkzww6ljx.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-12-14 09:40:12', '2024-01-03 08:56:07'),
(102, NULL, 'teacher', 'teacher', 'teacher@gmail.com', NULL, '$2y$12$oJELxCqN6FRE4KfOcX5UHefziyWx05muXj67eB6XX9WJyKXW1ddVG', '9JljP1PhmMuXihzE33a0qAjjWekQaHJHjm0kNOYRlFWyMgsVfYi5922xfkfh', 2, NULL, NULL, NULL, 'Male', '2023-12-14', NULL, NULL, '1234567890', '2023-12-14', '20231214031344pe7w2ubdf4zlhbuxape6.jpg', NULL, NULL, NULL, NULL, 'test', 'test', 'single', 'test', 'test', 'test', 0, 0, '2023-12-14 09:43:44', '2023-12-30 03:59:21'),
(103, 104, 'student', 'student', 'student@gmail.com', NULL, '$2y$12$.PmF6WWIj8Kyjuc8nmpfCuEKP3mEHTTYQZw64q.sgadpcSIsKFIuG', 'W6bnX6xlkOQIjxmeiOURcWIuXcy9b6qa3FUVRMFB0Rtc6goS4NvjVX6DLKqS', 3, '123234', '123123', 8, 'Male', '2023-12-14', 'awer', 'awe', '1234567890', '2023-12-14', '20231214031512cxqv7jkqokbnwjmzdzxa.jpg', 'aw', '12', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-12-14 09:44:56', '2023-12-25 03:43:33'),
(104, NULL, 'parent', 'parent', 'parent@gmail.com', NULL, '$2y$12$KkjibPw24.jbqAvz9uDhCuGFTNdOgGmkX7Z5EeEungKLBuXB2lhy.', 'JXxin8d3TZrY5t4b5L5Lh6FZZmw0NBZmkH4VabyswO8B8C09HWxkjnim3Yx4', 4, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '123567890', NULL, '20231214031550obmzzdkbozrz9rnr6nhv.jpg', NULL, NULL, NULL, 'parent', 'parent', NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-12-14 09:45:50', '2023-12-25 07:04:53'),
(105, NULL, 'joel', NULL, 'joel@gmail.com', NULL, '$2y$12$bRT74B2CQYDWMY3sjPgb5epZA2ajWMrV/mfCLYHaW8w3Raqk9M8Tm', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-12-16 04:31:48', '2023-12-16 04:33:35'),
(106, NULL, 'teacher', 'two', 'teachertwo@gmail.com', NULL, '$2y$12$aSQey/5s9zGrqbyacFee/OsWWYTpzKUv7fBlBSIwUAtaWQtPg2Cge', NULL, 2, NULL, NULL, NULL, 'Female', '2023-12-16', NULL, NULL, '6677885533', '2023-12-16', '20231216101556j8f2qtpkxpwulcrppnlf.jpg', NULL, NULL, NULL, NULL, 'test', 'test', 'single', 'test', 'test', 'test', 1, 0, '2023-12-16 04:45:57', '2023-12-16 04:49:57'),
(107, NULL, 'teacher', '4', 'sres@gmail.com', NULL, '$2y$12$2Uk.XbJhfk.GvO3QVydQVO3RXtbD.0JOHzL5cPlVMf5JyqMYI5c36', NULL, 2, NULL, NULL, NULL, 'Female', '2023-12-16', NULL, NULL, '1224534435', '2023-12-16', '2023121610232762vc6eifsebusyalpnvq.jpg', NULL, NULL, NULL, NULL, 'test', 'test', 'single', 'este', 'et', 'tes', 0, 0, '2023-12-16 04:53:27', '2023-12-16 04:53:27'),
(108, NULL, 'student', '1', 'student1@gmail.com', NULL, '$2y$12$sHNxfz0T8JAU9F2XXh6q4O9/7.GwVt8P.BbtPKHFHUulpB54aobZW', NULL, 3, '1', '1', 8, 'Male', '2023-12-01', 'sad', 'sad', '1234567890', '2023-12-01', '20231216104424xyowx5tgi8mlzudej1fh.jpg', '23', '23', '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-12-16 05:14:24', '2023-12-25 07:08:44'),
(109, NULL, 'L.F', 'Joel', 'joel2@gmail.com', NULL, '$2y$12$haCwLPc4xXFs/22J6suhAeg0wVdcDZw2nAVE4nR7tCvSsX6xx1JsS', NULL, 4, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '07810091873', NULL, '20231216105432rvslqotynoss9esdgn1f.jpg', NULL, NULL, NULL, 'fdfdg', 'No 2/224 , s v nagar, perumalpattu, thiruvallur-602024', NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-12-16 05:24:32', '2023-12-16 05:25:31'),
(110, NULL, 'super', 'admin', 'superadmin@gmail.com', NULL, '$2y$12$kYku31bs8LwGXFFWOZC0Cex6/SZl8Y.rmpknSlHLcIYpNfx.SXiG.', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20231222013003ag8jxef3q0xzddku0te8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-12-22 08:00:03', '2023-12-22 08:00:03'),
(111, NULL, 'a', 'b', 'a@gmail.com', NULL, '$2y$12$xPch4b11pkSCJQm50B80heHS/D4pbsqjtsBs4ZCjUzVfuY8OKPeeW', NULL, 3, '123456', '123456', 9, 'Male', '2023-12-30', 'ab', 'ab', '1234567890', '2023-12-30', NULL, 'a', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-12-30 04:00:37', '2023-12-30 04:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_receiver_id_foreign` (`receiver_id`),
  ADD KEY `chat_sender_id_receiver_id_index` (`sender_id`,`receiver_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `homework_submit`
--
ALTER TABLE `homework_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marks_grade`
--
ALTER TABLE `marks_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marks_register`
--
ALTER TABLE `marks_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notice_board_message`
--
ALTER TABLE `notice_board_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chat_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
