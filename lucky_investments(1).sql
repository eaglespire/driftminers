-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2022 at 01:53 PM
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
-- Table structure for table `client_settings`
--

CREATE TABLE `client_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wallet_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `deposit_is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"6ef6ddd2-af8c-4c90-bc20-0286e7a6ecbf\",\"displayName\":\"App\\\\Notifications\\\\client\\\\ClientDBSubscriptionRequest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:52:\\\"App\\\\Notifications\\\\client\\\\ClientDBSubscriptionRequest\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"5fb991e2-8f6e-4da6-81ae-c3244bed835b\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659443834, 1659443834),
(2, 'default', '{\"uuid\":\"eb477be8-007f-4f39-8763-5078bab4fa5e\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRequest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:51;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRequest\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"2052cd2c-1172-4d5d-8a8e-cb1e7da975ea\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659443834, 1659443834),
(3, 'default', '{\"uuid\":\"dcecf4bf-2b40-4dee-8041-d39dbd06502e\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRequest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:52;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRequest\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"505a08bb-8570-44ef-9304-22c6d6f4ef75\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659443834, 1659443834),
(4, 'default', '{\"uuid\":\"473ac7d5-d671-473c-a5b7-ade03844dee2\",\"displayName\":\"App\\\\Notifications\\\\client\\\\ClientDBSubscriptionRejected\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:53:\\\"App\\\\Notifications\\\\client\\\\ClientDBSubscriptionRejected\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"474bcb5f-5792-43a5-b392-4fa391de5b88\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659443935, 1659443935),
(5, 'default', '{\"uuid\":\"16ac1dd9-a747-4191-8d19-2bbf6a18b8d4\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRejected\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:51;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:51:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRejected\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"13ee5efb-13e4-4452-933c-c35d6465399f\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659443935, 1659443935),
(6, 'default', '{\"uuid\":\"26aff0c8-f2f8-462c-a10d-c241f3c51c31\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRejected\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:52;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:51:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRejected\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"db34ee36-9e10-4fef-8d0c-0059e28b7b3f\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659443935, 1659443935),
(7, 'default', '{\"uuid\":\"2e686a15-a848-45f5-bdf8-415e302cd13b\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRequest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:51;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRequest\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"7bf41332-9cc2-4b76-b103-3fe47a9c616a\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659443963, 1659443963),
(8, 'default', '{\"uuid\":\"97ece19a-60fd-461a-bfc5-7a9578f8e177\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRequest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:52;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:50:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRequest\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"c6a32d4e-338b-41ef-8111-fa5564224231\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659443963, 1659443963),
(9, 'default', '{\"uuid\":\"a70034f9-f7d7-4c03-a85f-85f255258576\",\"displayName\":\"App\\\\Notifications\\\\client\\\\ClientDBSubscriptionRejected\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:53:\\\"App\\\\Notifications\\\\client\\\\ClientDBSubscriptionRejected\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"7343f66f-98cb-4f6d-b6cd-432ce1570662\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659444014, 1659444014),
(10, 'default', '{\"uuid\":\"51531107-1ee4-4156-8387-2b0a43bfa39e\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRejected\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:51;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:51:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRejected\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"5d29f505-f999-4b61-a567-70558ceca2ee\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659444014, 1659444014),
(11, 'default', '{\"uuid\":\"87a091ae-b6a6-42e9-8f66-dd0a142b87e9\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRejected\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:52;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:51:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionRejected\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"8b79f2bc-714b-4a68-ae37-5a8fb1834917\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659444014, 1659444014),
(12, 'default', '{\"uuid\":\"6f393dbb-204c-4a80-a705-22065047d062\",\"displayName\":\"App\\\\Notifications\\\\client\\\\ClientMailSubscriptionApproved\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:55:\\\"App\\\\Notifications\\\\client\\\\ClientMailSubscriptionApproved\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"066c8e81-0910-45de-a464-826b01fb167d\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"}}', 0, NULL, 1659444048, 1659444048),
(13, 'default', '{\"uuid\":\"179c77cd-6cb2-4e06-84b1-388d531ded88\",\"displayName\":\"App\\\\Notifications\\\\client\\\\ClientDBSubscriptionApproved\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:1;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:53:\\\"App\\\\Notifications\\\\client\\\\ClientDBSubscriptionApproved\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"d94ab22f-e61a-4088-a48e-ea7cb4e41e19\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659444048, 1659444048),
(14, 'default', '{\"uuid\":\"26129595-9775-4b44-8375-765e6a9dfc1a\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionApproved\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:51;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:51:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionApproved\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"977a06d4-63aa-476c-9305-f3e15379e4cd\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659444048, 1659444048),
(15, 'default', '{\"uuid\":\"191317ed-c8dc-47f8-9cdc-05f4ded32230\",\"displayName\":\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionApproved\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";a:1:{i:0;i:52;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:51:\\\"App\\\\Notifications\\\\admin\\\\AdminDBSubscriptionApproved\\\":2:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\UserFacade\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:2:\\\"id\\\";s:36:\\\"3129ede2-5281-4829-ac93-880e614d43c7\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:8:\\\"database\\\";}}\"}}', 0, NULL, 1659444048, 1659444048);

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
(5, '2022_06_24_140953_create_plans_table', 1),
(6, '2022_06_29_001736_create_jobs_table', 1),
(7, '2022_06_30_163924_create_deposits_table', 1),
(8, '2022_07_02_005514_create_minings_table', 1),
(9, '2022_07_02_233441_create_wallets_table', 1),
(10, '2022_07_04_011714_create_subscriptions_table', 1),
(11, '2022_07_19_010526_create_notifications_table', 1),
(12, '2022_07_21_032356_create_client_settings_table', 1),
(13, '2022_07_26_193932_create_withdrawals_table', 1),
(14, '2022_07_27_114817_create_transaction_histories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `minings`
--

CREATE TABLE `minings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profit` decimal(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1f09053c-b67e-493d-9281-b5f0c63b08a7', 'App\\Notifications\\admin\\AdminDBSubscriptionRequest', 'App\\Models\\UserFacade', 52, '{\"message\":\"You have a pending subscription request from Collin Carroll\",\"name\":\"Collin Carroll\"}', NULL, '2022-08-02 11:40:33', '2022-08-02 11:40:33'),
('472751f0-3f0f-482a-a166-e86796eccafa', 'App\\Notifications\\ClientWithdrawalDBRequest', 'App\\Models\\UserFacade', 51, '{\"name\":\"Collin Carroll\",\"message\":\"Collin Carroll with the email stuart.rowe@example.org has requested to withdraw $ 2500. He has a current balance of 7888.080\"}', NULL, '2022-08-02 12:21:49', '2022-08-02 12:21:49'),
('79e4b5d2-b4a8-48d6-9b21-f5eede9bafbd', 'App\\Notifications\\PaymentDBCompleted', 'App\\Models\\UserFacade', 1, '{\"message\":\"You will be paid tomorrow\"}', '2022-08-02 12:31:18', '2022-08-02 12:30:57', '2022-08-02 12:31:18'),
('91478793-386c-48c1-8455-149236810402', 'App\\Notifications\\ClientWithdrawalDBRequest', 'App\\Models\\UserFacade', 52, '{\"name\":\"Collin Carroll\",\"message\":\"Collin Carroll with the email stuart.rowe@example.org has requested to withdraw $ 2500. He has a current balance of 7888.080\"}', NULL, '2022-08-02 12:28:52', '2022-08-02 12:28:52'),
('c03cfe70-ed82-4fe0-ba13-c71431e7c035', 'App\\Notifications\\ClientDBWithdrawalAccepted', 'App\\Models\\UserFacade', 1, '{\"message\":\"You will be paid soon\"}', '2022-08-02 12:30:37', '2022-08-02 12:29:13', '2022-08-02 12:30:37'),
('c5f80e8d-81b7-4670-a303-a712e543576d', 'App\\Notifications\\admin\\AdminDBSubscriptionRequest', 'App\\Models\\UserFacade', 51, '{\"message\":\"You have a pending subscription request from Collin Carroll\",\"name\":\"Collin Carroll\"}', NULL, '2022-08-02 11:40:33', '2022-08-02 11:40:33'),
('dcd7d52a-c030-47c3-a182-81748dd59e33', 'App\\Notifications\\ClientWithdrawalDBResponse', 'App\\Models\\UserFacade', 1, '{\"message\":\"Your request has been sent but pending approval from the admin\"}', '2022-08-02 12:30:37', '2022-08-02 12:28:52', '2022-08-02 12:30:37'),
('ddec5389-7f20-4fab-ba95-a038316e4821', 'App\\Notifications\\ClientWithdrawalDBRequest', 'App\\Models\\UserFacade', 52, '{\"name\":\"Collin Carroll\",\"message\":\"Collin Carroll with the email stuart.rowe@example.org has requested to withdraw $ 2500. He has a current balance of 7888.080\"}', NULL, '2022-08-02 12:21:49', '2022-08-02 12:21:49'),
('e3a3439a-c53d-4464-93c3-7b495c4293b7', 'App\\Notifications\\client\\ClientDBSubscriptionRequest', 'App\\Models\\UserFacade', 1, '{\"message\":\"Your SubscriptionFacade request has being received but awaiting approval from the admin\"}', '2022-08-02 12:30:37', '2022-08-02 11:40:33', '2022-08-02 12:30:37'),
('ea20a818-602c-4c23-a2ce-6591339a2aae', 'App\\Notifications\\ClientDBWithdrawalRejected', 'App\\Models\\UserFacade', 1, '{\"message\":\"Declined\"}', '2022-08-02 12:30:37', '2022-08-02 12:28:33', '2022-08-02 12:30:37'),
('ef06fc0f-248d-47e0-ae72-2adb2b5b50e7', 'App\\Notifications\\client\\ClientDBSubscriptionRequest', 'App\\Models\\UserFacade', 1, '{\"message\":\"Your SubscriptionFacade request has being received but awaiting approval from the admin\"}', '2022-08-02 12:30:37', '2022-08-02 11:39:23', '2022-08-02 12:30:37'),
('fd04a6a1-6468-485f-83b3-bc4a8dbd6a9b', 'App\\Notifications\\ClientWithdrawalDBRequest', 'App\\Models\\UserFacade', 51, '{\"name\":\"Collin Carroll\",\"message\":\"Collin Carroll with the email stuart.rowe@example.org has requested to withdraw $ 2500. He has a current balance of 7888.080\"}', NULL, '2022-08-02 12:28:52', '2022-08-02 12:28:52');

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
(1, 'Ezequiel McGlynn DDS', 'Aliquid quia voluptate et ducimus reprehenderit quis in. Aut et eveniet aliquid temporibus neque ab accusantium. Facere perferendis facilis et illo tempora corporis possimus ratione.', 114, 2972, 4, '2022-08-02 11:32:24', '2022-08-02 11:32:24'),
(2, 'August Von', 'Omnis optio dolor sed iure quasi impedit sint. Sed et repellat architecto tempore sed enim. Molestiae non ducimus voluptatum dignissimos atque nisi.', 295, 3229, 1, '2022-08-02 11:32:24', '2022-08-02 11:32:24'),
(3, 'Richard Gleichner', 'Dolores cupiditate saepe minima quia mollitia quasi magni dignissimos. Reiciendis nam eveniet assumenda ullam nemo nostrum eum. Consequatur aut molestias sed non.', 440, 2463, 3, '2022-08-02 11:32:24', '2022-08-02 11:32:24'),
(4, 'Aliya West', 'Aut et non ipsam itaque corporis est molestias. Nihil vero quasi et voluptatem occaecati est. Animi officiis facere harum. Consequuntur odit rerum incidunt amet cum aut dolor.', 670, 183, 1, '2022-08-02 11:32:24', '2022-08-02 11:32:24'),
(5, 'Ayden Walker PhD', 'Commodi temporibus eum aliquid perspiciatis. Minus fugit animi magnam. Nihil id tempore quisquam aperiam. Necessitatibus enim odio omnis nihil. Est non magnam ipsam quo.', 782, 2610, 3, '2022-08-02 11:32:24', '2022-08-02 11:32:24'),
(6, 'Dangelo Hills', 'Id fugiat perferendis vel molestias expedita. Voluptatum quam consequatur iusto.', 485, 1549, 3, '2022-08-02 11:32:24', '2022-08-02 11:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `confirm_subscription` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `amount`, `confirm_subscription`, `start_date`, `end_date`, `plan_id`, `created_at`, `updated_at`) VALUES
(3, 1, 4500, 1, '2022-08-02 12:40:47', '2022-08-06 12:40:47', 1, '2022-08-02 11:40:33', '2022-08-02 11:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_histories`
--

CREATE TABLE `transaction_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('deposit','withdrawal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('completed','rejected','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(24,3) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_histories`
--

INSERT INTO `transaction_histories` (`id`, `type`, `status`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'withdrawal', 'pending', '2500.000', 1, '2022-08-02 12:21:48', '2022-08-02 12:21:48'),
(2, 'withdrawal', 'rejected', '2500.000', 51, '2022-08-02 12:28:33', '2022-08-02 12:28:33'),
(3, 'withdrawal', 'pending', '2500.000', 1, '2022-08-02 12:28:52', '2022-08-02 12:28:52'),
(4, 'withdrawal', 'completed', '2500.000', 1, '2022-08-02 12:30:57', '2022-08-02 12:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `is_admin`, `email_verified_at`, `password`, `track_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Collin Carroll', 'harber.wilton', 'stuart.rowe@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'XLJp9ogpsQMNWxaZDIpLvcpvnZqie2seokaWM7SmRw4acjNyZJGK449zibqo', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(2, 'Freda Ferry IV', 'elyssa.morar', 'meta72@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'trvagZdAML', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(3, 'Lera Schaefer MD', 'paris.jenkins', 'lebsack.maybelle@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'Q0nEitzvfr', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(4, 'Jamel Boyer', 'jordyn38', 'jody73@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'IBwQPzzRIX', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(5, 'Ms. Liana Stracke DVM', 'fkovacek', 'hintz.jacquelyn@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'LuSw492OOe', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(6, 'Geraldine Quitzon', 'breitenberg.robyn', 'zbecker@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'Uvq5MS2MJj', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(7, 'Hulda Buckridge', 'cwaters', 'conn.cleora@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'o5OvnAQ2m8', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(8, 'Graham Hintz', 'willa91', 'ford.hills@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'pQsn3nvkdK', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(9, 'Prof. Emory Metz', 'gibson.elton', 'xconsidine@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'UktVCejG3Y', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(10, 'Valerie Macejkovic', 'laron.kuhic', 'eloise75@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'JNrNr7YNtz', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(11, 'Viola Kirlin', 'loyal.feil', 'natalia.gleichner@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'i9Qzo4mud2', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(12, 'Karli Treutel', 'shanna.reynolds', 'viola59@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'MQRUc7gv2f', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(13, 'Mr. Cleveland Feil', 'zachary45', 'toberbrunner@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'lwxccfs5a2', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(14, 'Astrid Denesik', 'ogorczany', 'jerde.bernhard@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', '8PvezOGIxg', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(15, 'Tyrique Mosciski DDS', 'kelli26', 'veum.tony@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'YPkBKMVn8H', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(16, 'Rodolfo Marquardt', 'carmela.kuhic', 'rhoda38@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', '74PnXv8ogI', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(17, 'Dan Rath II', 'jennings52', 'hschmidt@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'Myf8oOkJfT', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(18, 'Eldred Reinger II', 'kuphal.blaise', 'nelda33@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'ZiTND9E2sj', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(19, 'Prof. Margie Crooks', 'lockman.rhea', 'joel.dubuque@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'kaNFj6H5ym', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(20, 'Lauriane Gleason', 'daisha93', 'ybruen@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'jk1ED42vZ9', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(21, 'Mrs. Yvette Walsh', 'jaskolski.yessenia', 'ophelia62@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'RLNdZGg9SM', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(22, 'Cassandre Lebsack', 'santiago.thiel', 'griffin50@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'QkHfThd3JA', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(23, 'Elroy Block PhD', 'hayes.izabella', 'felicia.schaefer@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'pAyA0usOwV', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(24, 'Elisa Bayer', 'dlegros', 'claudine.hills@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'N1yiHxQny6', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(25, 'Edgardo O\'Hara', 'mikel65', 'citlalli.yundt@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'J9GNwNKlxi', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(26, 'Ewald Dach', 'lavern48', 'connelly.romaine@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'IfFnBj3cum', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(27, 'Dr. Blanche Leuschke I', 'myrtice18', 'guido.morar@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', '7ZAeo1Cw1X', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(28, 'Mrs. Tess Cassin IV', 'bethel80', 'jamil.wunsch@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'HDZ1nsNP8T', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(29, 'Mr. Jacey Sipes', 'lempi.jacobs', 'tskiles@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', '2K9A2WHngb', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(30, 'Ericka Fadel', 'kleuschke', 'nhaley@example.org', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'kfQPb3GeAa', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(31, 'Al Balistreri', 'hahn.rafaela', 'london54@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'GcQbalvlCt', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(32, 'Hallie Nitzsche', 'xrippin', 'violet.kertzmann@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'nP6T96gJ66', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(33, 'Fermin O\'Reilly', 'friesen.erik', 'upton.mathew@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'H7fpW64pjM', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(34, 'Ms. Kasey Barton II', 'mayer.marty', 'maye.hamill@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'JZeQF0o7ai', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(35, 'Shania Von', 'zrunolfsdottir', 'anastasia.donnelly@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'QPFjQXwkkp', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(36, 'Prof. Pedro Lockman', 'delmer.grady', 'skylar.stokes@example.com', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'vRRLMdtRsD', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(37, 'Prof. Nathan Sipes V', 'lora.schaden', 'melba.barrows@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'H3AMdjAWcz', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(38, 'Mr. Ruben Sawayn', 'mason.mclaughlin', 'umueller@example.net', 0, '2022-08-02 11:32:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'VYo6CmHzm6', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(39, 'Cara Oberbrunner', 'natalia55', 'okeefe.annabelle@example.net', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'DrvI0f3WUD', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(40, 'Orpha Schuppe', 'hessel.colt', 'lakin.jody@example.net', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'g70mmcCOKK', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(41, 'Hillard Parisian', 'ora.runte', 'edgar.schroeder@example.org', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', '0r5aIRtoyw', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(42, 'Maurice Hoeger', 'dameon12', 'michele.herzog@example.org', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'CeEPyfmv1o', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(43, 'Elaina Christiansen', 'cbins', 'ibalistreri@example.com', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'XRIhQMDsu4', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(44, 'Weldon Gaylord', 'abbott.maverick', 'jada.kuhlman@example.net', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', '2Mm13BBb4P', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(45, 'Jane O\'Keefe', 'mara79', 'qblanda@example.net', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'xDJ6syjXnx', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(46, 'Constantin Ullrich', 'jonathon15', 'zemlak.cathryn@example.net', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', '1cucGWHcEa', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(47, 'Dr. Chandler Wilderman', 'frida.schoen', 'percy.sipes@example.net', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'BJg2v0ufRv', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(48, 'Francesco Willms', 'dbednar', 'meta.swaniawski@example.org', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'G5UwNsWPbZ', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(49, 'Mrs. Haylie Funk', 'dereck41', 'elisha.flatley@example.org', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'HC3BIZnD1f', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(50, 'Anya Mitchell', 'buckridge.ben', 'kavon.hermiston@example.org', 0, '2022-08-02 11:32:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 'lWMBhV1BrJ', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(51, 'Lucky Onomine', 'Lucky4real', 'luckyonomine@gmail.com', 1, '2022-08-02 11:32:23', '$2y$10$idigVvMy3Hf0gRxKqwru9OOsZAN/5X2QxPcDuepGwtjdkCswwuBZe', 'bestman4thejobistoquit', 'xwqHb4iw7f', '2022-08-02 11:32:23', '2022-08-02 11:32:23'),
(52, 'Shade BestMan', 'IamShadeBestMan', 'dontshademe@gmail.com', 1, '2022-08-02 11:32:23', '$2y$10$mtqEbEuoKMV0edaIR8ry6O3gC9IbB/TdWTDgam.c/tugM95GjFGse', 'sadelovesmoimoi44', 'xlyNVw48uN', '2022-08-02 11:32:23', '2022-08-02 11:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `balance` decimal(24,3) NOT NULL DEFAULT '0.000',
  `last_mining_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `balance`, `last_mining_date`, `created_at`, `updated_at`) VALUES
(1, 1, '5388.080', '2022-08-03 12:40:47', '2022-08-02 11:40:47', '2022-08-02 12:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(24,3) NOT NULL,
  `cryptocurrency_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_settings`
--
ALTER TABLE `client_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_settings_user_id_foreign` (`user_id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposits_plan_id_foreign` (`plan_id`),
  ADD KEY `deposits_user_id_foreign` (`user_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minings`
--
ALTER TABLE `minings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `minings_user_id_foreign` (`user_id`),
  ADD KEY `minings_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdrawals_user_id_foreign` (`user_id`),
  ADD KEY `withdrawals_subscription_id_foreign` (`subscription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_settings`
--
ALTER TABLE `client_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `minings`
--
ALTER TABLE `minings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_settings`
--
ALTER TABLE `client_settings`
  ADD CONSTRAINT `client_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deposits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `minings`
--
ALTER TABLE `minings`
  ADD CONSTRAINT `minings_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `minings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD CONSTRAINT `transaction_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `withdrawals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
