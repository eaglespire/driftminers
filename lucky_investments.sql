-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2022 at 09:53 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lucky_investments`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, '2022_06_24_140953_create_plans_table', 2);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `roi` bigint(20) NOT NULL,
  `minimum_investment` bigint(20) NOT NULL,
  `duration` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `roi`, `minimum_investment`, `duration`, `created_at`, `updated_at`) VALUES
(2, 'Veronica Wuckert', 'Id qui rerum ea hic non. Ipsa qui enim rerum iste ab. Quis quis et pariatur est debitis voluptate eum ipsam.', 466, 2383, 4, '2022-06-26 06:53:44', '2022-06-26 06:53:44'),
(3, 'Silver PlanFacade', 'Modi deleniti accusamus aut rerum aperiam facere. Non iste esse quis qui delectus consequatur nisi quis. Et aut blanditiis nesciunt dignissimos.', 4, 2500, 2, '2022-06-26 06:53:44', '2022-06-26 08:52:04'),
(5, 'Naomie Ledner', 'Quia quasi maiores consequuntur in adipisci quia odit. Fugiat illo modi non. Et laudantium ratione dolores est.', 387, 3076, 3, '2022-06-26 06:53:44', '2022-06-26 06:53:44'),
(6, 'Mia Bernhard', 'Est delectus inventore consequuntur et. Culpa est minima dicta dolorem sint. Et porro accusantium in est consectetur in illum. Odit ab est adipisci est sed.', 416, 1138, 3, '2022-06-26 06:53:44', '2022-06-26 06:53:44'),
(7, 'Gold PlanFacade', 'Vendiamet esse aut. Minci scillummy essi wiscin ad, quismolor. Quat conse ip ing feuisci veliquam doloreetuer commod. Wismolobore vulput amconsequis molum nismodit feuisis velit facillametum lenim. Vercincinis si irillamet veriliquat. Vullutat, essi iliquatiniat, magnis mincip tisiscipis nissectet etue atum wissis amconul vullan. Wismolobore wis quismolor lutpat is facincipit. Feuismo ero velit eugiatet.\r\n\r\nIng e dolorem. Qui ip lortio rit essi, atuerat nullaortis em niatuero. Em dolorpercin iriliquis, se lortin rit adiat blaorerit. Pit alis vendiamet wis quam.', 5, 1200, 5, '2022-06-26 06:54:02', '2022-06-26 06:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Harrison', 'Strosin', 'xmosciski', 'emmy11@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zQLT0qa3QLLoc5mQhIWLcgn0uymzYNnmRvM7HxwWwOvxU0lHPXNr7tzdx8Kc', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(2, 'Theodore', 'Walter', 'carolanne10', 'dameon93@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ROlg5ikxnv', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(3, 'Chasity', 'Collier', 'kaitlyn.romaguera', 'nikolaus.jerome@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0Jt3r8Fl9E', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(4, 'Pablo', 'Abbott', 'jamison15', 'labadie.fay@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NqFknnt7pN', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(5, 'Jeffry', 'Tremblay', 'sporer.thalia', 'nadia35@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'd4P8ObtUdM', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(6, 'Cierra', 'Ernser', 'fschamberger', 'amos.pacocha@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '59yR81rj9J', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(7, 'Wyatt', 'Goyette', 'princess30', 'schumm.evalyn@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6lIBVPIpZU', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(8, 'Kenya', 'Collins', 'ujerde', 'madalyn.lakin@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'u9DVYxtIFX', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(9, 'Kyle', 'Rath', 'zebert', 'icarter@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wAE70ccMpp', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(10, 'Roberta', 'Feest', 'tyrique45', 'roxane.wisoky@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NuoxPAFjEL', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(11, 'Barry', 'Collier', 'cummings.angelica', 'reinhold.feest@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lshtsqYcjS', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(12, 'Avis', 'Powlowski', 'tristin50', 'roob.bethel@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kSTm9viDnJ', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(13, 'Armando', 'Wisozk', 'thora.wilkinson', 'leffler.keven@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yGVuZbVmu6', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(14, 'Lane', 'Erdman', 'conroy.camden', 'charlie.bartell@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'J0ofjw868r', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(15, 'Zack', 'Koelpin', 'sarah.ward', 'btreutel@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aOVIcfSgcl', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(16, 'Lera', 'Nitzsche', 'ncassin', 'abigail.schultz@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'reQElItCIP', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(17, 'Elissa', 'Kub', 'letitia.little', 'vkohler@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '71YcJlFiH1', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(18, 'Selena', 'Huel', 'emelie.grady', 'kendra.oberbrunner@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tFRezcHyls', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(19, 'Dejah', 'Gislason', 'regan22', 'shirley59@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4IdDTq7Bkb', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(20, 'Westley', 'Rolfson', 'olson.mohamed', 'ines44@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HlhaAp2Sun', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(21, 'Lawson', 'Kreiger', 'legros.cassandre', 'jerod.baumbach@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gzHt6kTtiR', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(22, 'Garett', 'Schultz', 'jermain06', 'adah37@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'el419ypH56', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(23, 'Halle', 'Weber', 'hkessler', 'zelma.harris@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xdEVpnZffw', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(24, 'Alvena', 'Dicki', 'milo.keeling', 'daugherty.hallie@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NBb8UqEQai', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(25, 'Travis', 'Ryan', 'yhansen', 'hzieme@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dzSyI1m9U8', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(26, 'Hope', 'Koepp', 'amiya.schiller', 'carli.dibbert@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8tWNXIhRls', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(27, 'Katrine', 'Boehm', 'electa96', 'gcormier@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BGOJzbfa0k', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(28, 'Asha', 'Quigley', 'hillard.schneider', 'anolan@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'snIAn4PBCU', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(29, 'Delfina', 'Olson', 'ebechtelar', 'batz.angeline@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ltawCVe317', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(30, 'Jose', 'Heathcote', 'dsteuber', 'fausto.lynch@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QLlie5AnWr', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(31, 'Sandrine', 'Schulist', 'hortense01', 'hgrant@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bQPsGS2RP5', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(32, 'Yasmin', 'Reichert', 'miller.justus', 'wilmer.halvorson@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0MUeZ50aAE', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(33, 'Nora', 'Sporer', 'xdickinson', 'ikeebler@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zRYZtGHeBX', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(34, 'Abdullah', 'Rosenbaum', 'rosemarie57', 'jedediah64@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kVCoXvCbNe', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(35, 'Christiana', 'Pollich', 'haley.lea', 'brant.pacocha@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QrnMbvTTvo', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(36, 'Margie', 'Wolff', 'elyssa48', 'yvolkman@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mOymytKWHk', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(37, 'Micah', 'Wyman', 'prohaska.destiney', 'qgoyette@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wnwYHbgSR6', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(38, 'Josue', 'Jones', 'balistreri.shanny', 'gpollich@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7YrQhHKLPe', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(39, 'Jimmy', 'Gerhold', 'walker.zoey', 'zfeil@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8D3aD4CZhR', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(40, 'Gerry', 'Parisian', 'stokes.jeramie', 'blanda.pearl@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3bEcVPeIio', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(41, 'Kamren', 'Leannon', 'claudia67', 'xavier84@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QJKkDv6Jka', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(42, 'Felton', 'Howell', 'wmorissette', 'dayana24@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UBLUsUSBLT', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(43, 'Hipolito', 'Schowalter', 'franecki.jazmyne', 'veda.weissnat@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kyBbQ9r1At', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(44, 'Esther', 'Hodkiewicz', 'achristiansen', 'ramon.breitenberg@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Bgc6UjfYvF', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(45, 'Ismael', 'Herman', 'mekhi76', 'camille97@example.net', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fH1Xx6EvoE', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(46, 'Dakota', 'Labadie', 'minerva46', 'lilliana.shanahan@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7hr5XLZfMz', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(47, 'Carlotta', 'Quitzon', 'toy.laurence', 'maxime.larkin@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'w8P0F17iO2', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(48, 'Rose', 'Schaden', 'payton17', 'kassulke.zoey@example.org', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WYUXk1c1E3', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(49, 'Anderson', 'Zulauf', 'ruthe.koss', 'xmorissette@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WDlFojITMh', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(50, 'Estell', 'Stokes', 'heidi19', 'hlangosh@example.com', 0, '2022-06-22 16:26:10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fBPTJLHiPY', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(51, 'Lucky', 'Onomine', 'Lucky4real', 'luckyonomine@gmail.com', 1, '2022-06-22 16:26:10', '$2y$10$geMyJo2sTQdu6GN9ebkA5ebJcaPMQQBOfCWmjX15HiQ/O4S3DkRH2', 'tSXOQDPDEf', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(52, 'Shade', 'BestMan', 'IamShadeBestMan', 'dontshademe@gmail.com', 1, '2022-06-22 16:26:10', '$2y$10$pizQQ3B64EJw7RigWAKC8.YQfA6GV1jbdTsPqBrqDJxCKTFEM2MXG', 'MhuJMUkmKV', '2022-06-22 16:26:10', '2022-06-22 16:26:10'),
(53, 'Ansley', 'Stehr', 'lonie08', 'harley.fay@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ws38fRghkU', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(54, 'Angelita', 'Hessel', 'pdamore', 'wisoky.cyrus@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xrc5xI62c8', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(55, 'Baby', 'Fahey', 'dillon00', 'ybechtelar@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UdNTod87XN', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(56, 'Rafael', 'Wunsch', 'otha.goyette', 'chris.gulgowski@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'afMExKzhuz', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(57, 'Ottis', 'O\'Kon', 'eleanore.bergstrom', 'ivah.graham@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zGTleuHUMC', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(58, 'Armando', 'Gaylord', 'powlowski.donato', 'junior31@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zloQOP7GG2', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(59, 'Olin', 'Bradtke', 'rkeeling', 'teagan77@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mxFbkypX2K', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(60, 'Newton', 'Doyle', 'qadams', 'mueller.frieda@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3XmLnyln3E', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(61, 'Silas', 'Armstrong', 'roob.gregoria', 'brannon.beatty@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gI2Uwy8gQN', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(62, 'Chad', 'Waelchi', 'vernon18', 'romaguera.cecilia@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'j3adMu281Y', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(63, 'Korey', 'Torp', 'miller.solon', 'freida.jerde@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yKfwLSlOA5', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(64, 'Wendell', 'Swift', 'baumbach.hailey', 'mosciski.courtney@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mOBVEJU24P', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(65, 'Carmela', 'Muller', 'qlakin', 'elvera.gulgowski@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LHJxyitlnk', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(66, 'Zakary', 'Schinner', 'johann91', 'tweissnat@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tRIqLfmQ0n', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(67, 'Herbert', 'Feeney', 'djerde', 'yvonne.wilderman@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'k5JX95P066', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(68, 'Vernice', 'Lang', 'dejah.moen', 'verda.toy@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'F9yNaHAxGL', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(69, 'Trey', 'Wisoky', 'steuber.madalyn', 'franecki.conor@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OgoTsOypMg', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(70, 'Shanie', 'Runolfsdottir', 'egrady', 'guadalupe58@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8tidk7lVl8', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(71, 'Alessandro', 'Kemmer', 'anabel77', 'howell.stephon@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rczNDHuZOs', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(72, 'Jenifer', 'Mayer', 'eparker', 'birdie.buckridge@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MCcC6kwTPz', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(73, 'Arthur', 'Wolf', 'martin33', 'emilie40@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'B22kGcZ7Gp', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(74, 'Murl', 'McGlynn', 'lhegmann', 'king.alison@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dJZYHtWDi2', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(75, 'Hilario', 'Hagenes', 'antone92', 'wyost@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MALWxN9qyR', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(76, 'Mariela', 'Kiehn', 'xveum', 'bjerde@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JOJhd4dALo', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(77, 'Waino', 'Labadie', 'tdare', 'barbara46@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yvoQ2pBEuX', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(78, 'Garnet', 'Barton', 'otho.rice', 'sherman48@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1nwsuXjxSA', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(79, 'Alex', 'Nader', 'elinore.weber', 'egleason@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BpmGD8SRGq', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(80, 'Trenton', 'Ruecker', 'ed.rowe', 'enos32@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Oxwh3pzJym', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(81, 'Crystal', 'Schowalter', 'maxwell.frami', 'howell.uriah@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZNDgY2obAj', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(82, 'Amalia', 'Orn', 'dmills', 'albertha.weimann@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hBzUoOlRXq', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(83, 'Raquel', 'Turcotte', 'dooley.betsy', 'prussel@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RyyV1rDRjY', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(84, 'Ardella', 'Nienow', 'cgusikowski', 'zbotsford@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'k9iwp9wZf2', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(85, 'Myrtis', 'Erdman', 'johathan.haley', 'frederick.cartwright@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ovUUkqXyAT', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(86, 'Laurence', 'Schumm', 'quigley.audra', 'april46@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'K99KJNFK8V', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(87, 'Audie', 'Nicolas', 'natalie61', 'nheller@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eN6JSv5E0o', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(88, 'Corrine', 'Sawayn', 'schuster.cristopher', 'oortiz@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ahf6DpK2sB', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(89, 'Tressie', 'Simonis', 'krystal.batz', 'bernice23@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lp7qT3qMni', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(90, 'Bulah', 'Bergnaum', 'ztromp', 'mshields@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rwRIPhnLT1', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(91, 'Quincy', 'McLaughlin', 'fbernhard', 'cwilliamson@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'D79Nrjw5Tu', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(92, 'Kattie', 'Blick', 'bulah93', 'mosciski.janie@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gW6F3U6cfI', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(93, 'Marlin', 'Kautzer', 'maeve.christiansen', 'brooklyn.stiedemann@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'J3KHwGMUiL', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(94, 'Kali', 'Beer', 'lesly55', 'heaney.antonia@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PnoQCHh4Ui', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(95, 'Delpha', 'Tromp', 'moen.jamison', 'kling.kale@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oXlw5lW4fb', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(96, 'Ivory', 'Harvey', 'rachael36', 'brandi45@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AuQFhfxANo', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(97, 'Sammy', 'Heidenreich', 'ustokes', 'keenan.harber@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GsGIYdxFIl', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(98, 'Armand', 'Murray', 'britney.marvin', 'wallace.streich@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9XuUHju8u0', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(99, 'Juana', 'Wilderman', 'zieme.lennie', 'waters.lori@example.org', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SCqW1GG7Ia', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(100, 'Skye', 'Terry', 'johnston.kyler', 'wendy.tromp@example.com', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'S9NsfHvsbP', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(101, 'Roberta', 'Emmerich', 'melany24', 'nkirlin@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'E4gOcARZST', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(102, 'Hattie', 'Krajcik', 'amertz', 'lauryn06@example.net', 0, '2022-06-25 01:18:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'T6T0bD9vDY', '2022-06-25 01:18:39', '2022-06-25 01:18:39'),
(104, 'Janet', 'Gates', 'janet345', 'janet@mail.com', 0, NULL, '$2y$10$YZ7OstIII25EVb7h9QyYZOdMwYfKFXOSYF99YOCC8yYbtcnbmIFga', NULL, '2022-06-28 08:32:26', '2022-06-28 08:32:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
