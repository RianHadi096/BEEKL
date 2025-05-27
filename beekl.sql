-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 06:38 PM
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
(35, 3, 1, '2025-05-27 16:06:11');

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
(9, '2025-05-27-072441', 'App\\Database\\Migrations\\Comment', 'default', 'App', 1748330992, 3);

-- --------------------------------------------------------

--
-- Table structure for table `postforum`
--

CREATE TABLE `postforum` (
  `postID` int(5) UNSIGNED NOT NULL,
  `userID` int(5) UNSIGNED NOT NULL,
  `titlePost` text NOT NULL,
  `content` varchar(1000) NOT NULL,
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
(1, 1, 'tesete', 'kawai desune', 'Anime', '', '2025-05-05 09:35:43', '2025-05-27 16:24:23', NULL, 5, 0),
(6, 4, 'fufufafa', 'presiden kita wkwkkwkw', 'Politik', '', '2025-05-06 21:46:58', '2025-05-08 01:15:40', NULL, NULL, 0),
(7, 4, '???', 'Nothing??', 'Others', '', '2025-05-06 21:54:54', '2025-05-07 04:54:54', NULL, NULL, 0),
(8, 4, 'Buku Sejarah', 'Buku sejarah Indonesia', 'Buku', '', '2025-05-06 21:57:49', '2025-05-08 01:48:55', NULL, NULL, 0),
(10, 3, 'Intel Core i7 14th Gen', 'LOREM IPSUM.....', 'Teknologi', '', '2025-05-07 07:32:55', '2025-05-27 16:24:46', NULL, 2, 0),
(12, 3, 'asd', 'asdasd', 'Others', NULL, '2025-05-07 08:26:36', '2025-05-27 16:04:01', NULL, 0, 0),
(15, 3, 'test', 'game', 'Others', '1746665585_0eec92e9e421e855b7e7.jpg', '2025-05-07 17:53:05', '2025-05-27 11:57:32', NULL, 1, 0),
(16, 3, 'AO', 'mercenary skin', 'Others', '1746665789_8c720c055a43838508c1.jpg', '2025-05-07 17:56:29', '2025-05-08 00:56:39', NULL, NULL, 0),
(17, 3, 'test', 'test', 'Anime', '1747119918_712a126953145257291d.jpg', '2025-05-13 00:05:18', '2025-05-13 07:05:18', NULL, NULL, 0),
(18, 3, 'test', 'test', 'Olahraga', NULL, '2025-05-13 00:05:55', '2025-05-13 07:05:55', NULL, NULL, 0),
(19, 3, 'test', 'test', 'Olahraga', NULL, '2025-05-13 00:09:10', '2025-05-13 07:09:10', NULL, NULL, 0),
(20, 3, 'hahahah', 'hihihi', 'Komedi', NULL, '2025-05-13 00:12:43', '2025-05-13 07:12:43', NULL, NULL, 0),
(21, 3, 'kkkkk', 'kkkkkkk', 'Politik', NULL, '2025-05-15 03:06:55', '2025-05-15 10:06:55', NULL, NULL, 0),
(22, 6, 'yy', 'yy', 'Olahraga', NULL, '2025-05-26 11:27:50', '2025-05-26 18:29:05', NULL, 1, 0);

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
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `createdAt`, `updatedAt`) VALUES
(1, 'rianhadi', 'rianhadi@xyz.com', '$2y$10$LASgy8ZnTzZu3HeRKv/x.egcxZTg4tMwsQcu2a5mBYKBq1qLhg65e', '2025-03-21 13:42:04', '2025-03-21 13:42:04'),
(2, 'rfamln', 'rfamln@xyz.com', '$2y$10$/4rvSf5atEP.DK.73O.Jl.ETA3AD34atF3aP7S4MQEnQz631W9IHK', '2025-03-22 13:40:18', '2025-03-22 13:40:18'),
(3, 'rianhadi2', 'rianhadi@online.com', '$2y$10$fEerAd05Z/c0a0CsR4mYMeaLbrYA2kuNRK68aQ/sEksUcaQX1Fdoy', '2025-04-23 04:06:57', '2025-04-23 04:06:57'),
(4, 'ygm', 'ygm123@gmail.com', '$2y$10$4TvjJjxXWRUK0Pg4p1pV4uM.6IcKiQCV4lpb/3o9xg3djt.FCloYS', '2025-04-24 17:15:07', '2025-04-24 17:15:07'),
(5, 'tester', 'test@online.com', '$2y$10$Hnpf6NhknobmLu5lw4I13Ow.6Xu8QgbWqX2vX1OBJPXTlNVNgtPH2', '2025-05-07 05:41:34', '2025-05-07 05:41:34'),
(6, 'test123', 'asdasd@online.com', '$2y$10$mVwn/5Aezv1CP1GpOcv0mu6Wqdg3jMPTt58cmQ3qcrDXz2V55OXTG', '2025-05-26 17:51:44', '2025-05-26 17:51:44');

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
  MODIFY `commentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `postforum`
--
ALTER TABLE `postforum`
  MODIFY `postID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- Constraints for table `postforum`
--
ALTER TABLE `postforum`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
