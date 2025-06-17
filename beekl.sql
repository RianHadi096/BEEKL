-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 08:42 PM
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
-- Database: `beekl`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) UNSIGNED NOT NULL,
  `postID` int(11) UNSIGNED DEFAULT NULL,
  `userID` int(5) UNSIGNED DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `postID`, `userID`, `content`, `created_at`) VALUES
(29, 24, 6, 'susis... wowowowow susis.... suami takut istri wkwkkw', '2025-06-11 15:36:03'),
(30, 24, 3, 'what am I going to do... but I can\'t do anything ... wkwkwkk', '2025-06-11 16:18:56'),
(31, 24, 3, '@test123 what am I going to do... but I cant.. do anything', '2025-06-11 16:19:42'),
(32, 24, 6, 'hey hey', '2025-06-12 06:51:50'),
(34, 1, 6, 'woi woi woi', '2025-06-17 06:34:11'),
(35, 22, 6, 'test123123', '2025-06-17 17:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(5) UNSIGNED NOT NULL,
  `userID` int(5) UNSIGNED NOT NULL,
  `postID` int(5) UNSIGNED NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeID`, `userID`, `postID`, `createdAt`) VALUES
(11, 4, 1, '2025-05-21 08:47:27'),
(13, 4, 10, '2025-05-21 08:48:32'),
(17, 1, 1, '2025-05-21 09:55:14'),
(21, 5, 10, '2025-05-26 14:50:53'),
(22, 5, 1, '2025-05-26 14:50:56'),
(24, 6, 22, '2025-05-26 18:29:04'),
(29, 6, 15, '2025-05-27 11:57:32'),
(30, 6, 1, '2025-05-27 14:13:32'),
(35, 3, 1, '2025-05-27 16:06:11'),
(36, 6, 12, '2025-06-12 16:25:18'),
(38, 6, 24, '2025-06-17 17:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2025-03-19-063036', 'App\\Database\\Migrations\\Test', 'default', 'App', 1742564449, 1),
(4, '2025-03-19-063201', 'App\\Database\\Migrations\\Users', 'default', 'App', 1742564449, 1),
(5, '2025-05-21-071134', 'App\\Database\\Migrations\\Likes', 'default', 'App', 1747813505, 2),
(9, '2025-05-27-072441', 'App\\Database\\Migrations\\Comment', 'default', 'App', 1748330992, 3),
(10, '2025-06-12-064414', 'App\\Database\\Migrations\\Notifications', 'default', 'App', 1749711579, 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationID` int(11) UNSIGNED NOT NULL,
  `userID` int(5) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationID`, `userID`, `type`, `message`, `isRead`, `created_at`) VALUES
(8, 6, 'post', 'created a new post with title: Intel\'s 13th-Gen Raptor Lake Processor', 1, '2025-06-17 11:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `postforum`
--

CREATE TABLE `postforum` (
  `postID` int(5) UNSIGNED NOT NULL,
  `userID` int(5) UNSIGNED NOT NULL,
  `titlePost` text NOT NULL,
  `content` longtext NOT NULL,
  `genre` set('Olahraga','Anime','Others','Politik','Film','Berita','Komedi','Buku','Teknologi','Otomotif') NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `comments` int(11) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postforum`
--

INSERT INTO `postforum` (`postID`, `userID`, `titlePost`, `content`, `genre`, `images`, `created_at`, `updated_at`, `views`, `likes`, `comments`) VALUES
(1, 1, 'tesete', 'kawai desune', 'Anime', '', '2025-05-05 09:35:43', '2025-06-17 06:34:11', NULL, 5, 1),
(6, 4, 'fufufafa', 'presiden kita wkwkkwkw', 'Politik', '', '2025-05-06 21:46:58', '2025-05-08 01:15:40', NULL, NULL, 0),
(7, 4, '???', 'Nothing??', 'Others', '', '2025-05-06 21:54:54', '2025-05-07 04:54:54', NULL, NULL, 0),
(8, 4, 'Buku Sejarah', 'Buku sejarah Indonesia', 'Buku', '', '2025-05-06 21:57:49', '2025-05-08 01:48:55', NULL, NULL, 0),
(10, 3, 'Intel Core i7 14th Gen', 'LOREM IPSUM.....', 'Teknologi', '', '2025-05-07 07:32:55', '2025-05-27 16:24:46', NULL, 2, 0),
(12, 3, 'asd', 'asdasd', 'Others', NULL, '2025-05-07 08:26:36', '2025-06-12 16:25:18', NULL, 1, 0),
(15, 3, 'test', 'game', 'Others', '1746665585_0eec92e9e421e855b7e7.jpg', '2025-05-07 17:53:05', '2025-05-27 11:57:32', NULL, 1, 0),
(16, 3, 'AO', 'mercenary skin', 'Others', '1746665789_8c720c055a43838508c1.jpg', '2025-05-07 17:56:29', '2025-05-08 00:56:39', NULL, NULL, 0),
(17, 3, 'test', 'test', 'Anime', '1747119918_712a126953145257291d.jpg', '2025-05-13 00:05:18', '2025-05-13 07:05:18', NULL, NULL, 0),
(18, 3, 'test', 'test', 'Olahraga', NULL, '2025-05-13 00:05:55', '2025-05-13 07:05:55', NULL, NULL, 0),
(19, 3, 'test', 'test', 'Olahraga', NULL, '2025-05-13 00:09:10', '2025-05-13 07:09:10', NULL, NULL, 0),
(20, 3, 'hahahah', 'hihihi', 'Komedi', NULL, '2025-05-13 00:12:43', '2025-05-13 07:12:43', NULL, NULL, 0),
(21, 3, 'kkkkk', 'kkkkkkk', 'Politik', NULL, '2025-05-15 03:06:55', '2025-05-15 10:06:55', NULL, NULL, 0),
(22, 6, 'yy', 'yy', 'Olahraga', NULL, '2025-05-26 11:27:50', '2025-06-17 17:35:51', NULL, 1, 1),
(23, 3, 'kawaiiiii', 'hello post', 'Anime', NULL, '2025-05-27 22:09:38', '2025-05-28 05:09:38', NULL, 0, 0),
(24, 6, 'Toyota Supra', 'The Toyota Supra (Japanese: トヨタ・スープラ, Hepburn: Toyota Sūpura) is a sports car and grand tourer manufactured and developed by the Toyota Motor Corporation beginning in 1978. The name \"supra\" is a definition from the Latin prefix, meaning \"above\", \"to surpass\" or \"go beyond\"', 'Otomotif', '1748413616_e8f6dfb9d960a933a9eb.jpg', '2025-05-27 23:26:56', '2025-06-17 17:35:44', NULL, 1, 4),
(25, 6, 'The Mummy (1999)', 'The Mummy is a 1999 American action-adventure film written and directed by Stephen Sommers, starring Brendan Fraser, Rachel Weisz, John Hannah, and Arnold Vosloo in the title role as the reanimated mummy. It is a remake of the 1932 film of the same name and part of the larger Universal Monsters franchise. The film follows adventurer and treasure hunter Rick O\'Connell as he travels to Hamunaptra, the City of the Dead, with librarian Evelyn Carnahan and her older brother Jonathan, where they accidentally awaken Imhotep, a cursed high priest with supernatural powers.', 'Film', '1749722363_388e07685443553f08e0.jpg', '2025-06-12 02:59:23', '2025-06-12 09:59:23', NULL, 0, 0),
(26, 3, 'test post', 'test', 'Teknologi', NULL, '2025-06-12 09:07:56', '2025-06-12 16:07:56', NULL, 0, 0),
(27, 6, 'test 123123', 'test', 'Olahraga', NULL, '2025-06-12 09:35:58', '2025-06-12 16:35:58', NULL, 0, 0),
(28, 6, 'Intel\'s 13th-Gen Raptor Lake Processor', 'Intel\'s 13th-Gen Raptor Lake processors will bring more cores, more connectivity, a revamped core architecture, support for PCIe 5.0 SSDs, and even an officialy-verified 6.0 GHz peak boost clock to bear. Intel claims that Raptor Lake will have a 15% gain in single-threaded performance and a 41% gain in multi-threaded compared to Alder Lake, and an overall \'40% performance scaling.\' These chips will arrive on October 20 to square off with AMD\'s Zen 4 Ryzen 7000 processors, setting the stage for a fierce battle for desktop PC supremacy — particularly for the crown of the best CPU for gaming as the Intel vs AMD rivalry enters a new stage.\r\n\r\nIntel\'s Alder Lake brought the company back from what had been a slow erosion of its leadership position in our CPU benchmarks rankings as AMD relentlessly iterated on its Ryzen processor lineup. AMD\'s string of innovations eventually culminated in an embarrassing loss of the performance crown for Intel as the Ryzen 5000 processors outclassed Intel\'s chips in every performance, price, and power metric that mattered back in 2020, capping Intel\'s decline from grace after incessant delays moving to its oft-delayed and seemingly doomed 10nm process node.', 'Teknologi', NULL, '2025-06-17 11:42:16', '2025-06-17 18:42:16', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notificationCount` int(11) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `createdAt`, `updatedAt`, `notificationCount`) VALUES
(1, 'rianhadi', 'rianhadi@xyz.com', '$2y$10$LASgy8ZnTzZu3HeRKv/x.egcxZTg4tMwsQcu2a5mBYKBq1qLhg65e', '2025-03-21 13:42:04', '2025-03-21 13:42:04', 0),
(2, 'rfamln', 'rfamln@xyz.com', '$2y$10$/4rvSf5atEP.DK.73O.Jl.ETA3AD34atF3aP7S4MQEnQz631W9IHK', '2025-03-22 13:40:18', '2025-03-22 13:40:18', 0),
(3, 'rianhadi2', 'rianhadi@online.com', '$2y$10$fEerAd05Z/c0a0CsR4mYMeaLbrYA2kuNRK68aQ/sEksUcaQX1Fdoy', '2025-04-23 04:06:57', '2025-04-23 04:06:57', 0),
(4, 'ygm', 'ygm123@gmail.com', '$2y$10$4TvjJjxXWRUK0Pg4p1pV4uM.6IcKiQCV4lpb/3o9xg3djt.FCloYS', '2025-04-24 17:15:07', '2025-04-24 17:15:07', 0),
(5, 'tester', 'test@online.com', '$2y$10$Hnpf6NhknobmLu5lw4I13Ow.6Xu8QgbWqX2vX1OBJPXTlNVNgtPH2', '2025-05-07 05:41:34', '2025-05-07 05:41:34', 0),
(6, 'test123', 'asdasd@online.com', '$2y$10$mVwn/5Aezv1CP1GpOcv0mu6Wqdg3jMPTt58cmQ3qcrDXz2V55OXTG', '2025-05-26 17:51:44', '2025-05-26 17:51:44', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `postID` (`postID`),
  ADD KEY `comments_ibfk_2` (`userID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`),
  ADD UNIQUE KEY `userID_postID` (`userID`,`postID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `notifications_for_user` (`userID`);

--
-- Indexes for table `postforum`
--
ALTER TABLE `postforum`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `postforum`
--
ALTER TABLE `postforum`
  MODIFY `postID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `postforum` (`postID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `postforum` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_for_user` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postforum`
--
ALTER TABLE `postforum`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
