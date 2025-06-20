-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 08:36 PM
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
(9, 8, 'post', 'created a new post with title: fww', 1, '2025-06-19 06:46:36'),
(10, 8, 'like', 'namain liked your post', 1, '2025-06-19 06:46:39'),
(11, 8, 'comment', 'namain commented on your post', 1, '2025-06-19 06:46:44'),
(12, 8, 'post', 'created a new post with title: dccs', 1, '2025-06-19 07:23:10'),
(13, 8, 'post', 'created a new post with title: cdsdc', 1, '2025-06-19 07:23:20'),
(14, 8, 'like', 'namain liked your post', 1, '2025-06-19 08:26:59'),
(15, 9, 'post', 'created a new post with title: cxcx', 0, '2025-06-19 08:28:03'),
(16, 8, 'like', 'namain liked your post', 0, '2025-06-19 09:02:11'),
(17, 8, 'comment', 'namain commented on your post', 0, '2025-06-19 09:03:21'),
(18, 8, 'comment', 'namain commented on your post', 0, '2025-06-19 09:06:22'),
(19, 8, 'like', 'namain liked your post', 0, '2025-06-19 10:47:12'),
(20, 8, 'like', 'namain liked your post', 0, '2025-06-19 10:47:38'),
(21, 8, 'like', 'namain liked your post', 0, '2025-06-19 10:47:52'),
(22, 8, 'like', 'namain liked your post', 0, '2025-06-19 10:47:59'),
(23, 8, 'like', 'namain liked your post', 0, '2025-06-19 10:48:04');

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
(30, 8, 'dccs', 'csdcsc', 'Olahraga', NULL, '2025-06-19 07:23:10', '2025-06-19 18:24:09', NULL, 0, 0),
(31, 8, 'cdsdc', 'csdcs', 'Olahraga', NULL, '2025-06-19 07:23:20', '2025-06-19 14:23:20', NULL, 0, 0),
(32, 9, 'cxcx', 'csd', 'Anime', NULL, '2025-06-19 08:28:03', '2025-06-19 15:28:03', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_premium` tinyint(1) DEFAULT 0,
  `avatar_frame` varchar(100) DEFAULT NULL,
  `dark_mode` tinyint(1) DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notificationCount` int(11) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_premium`, `avatar_frame`, `dark_mode`, `createdAt`, `updatedAt`, `notificationCount`) VALUES
(7, 'rh096', 'o38EM+HN+JZS3OixwLNsxUL11MyPNfF0BHc3H3ejXBk=', '$2y$10$QfrTVwuCQNDlTzpMsA4/ue538ASp1tz8YBV4Kph080zA.rUfNG.ye', 0, NULL, 0, '2025-06-19 10:00:10', '2025-06-19 10:00:10', 0),
(8, 'namain', 'CnS3Pr6uibFpePEybXCddRmEYy+ofv/5+UhiTbFf8gA=', '$2y$10$e/PWO9waEpsy7sc1hEaRUubuLy4sZrT.lPzP0e8gK9y6hCg5RVrbG', 1, 'rainbow', 1, '2025-06-19 13:46:19', '2025-06-19 18:26:03', 0),
(9, 'jaka', 'IfIgiLOqcJVZ23M2560gkwN2HEW7tEnRoSzwEJrTqzs=', '$2y$10$al0Fq8pmC06cQYIMdoZ.vev7SoH.kvVkc7bW93pJRVaHLHjVHvVXS', 0, NULL, 0, '2025-06-19 15:27:49', '2025-06-19 15:27:49', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `comments_ibfk_1` (`postID`),
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
  MODIFY `commentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `postforum`
--
ALTER TABLE `postforum`
  MODIFY `postID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `postforum` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
