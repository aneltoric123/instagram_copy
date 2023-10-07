-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2023 at 10:12 AM
-- Server version: 10.5.22-MariaDB-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aneltoric_instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_c` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_commented` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_c`, `content`, `date_commented`, `user_id`, `post_id`) VALUES
(72, 'test', '2023-09-27 09:21:38', 6, 73),
(80, 'test', '2023-09-28 09:09:30', 12, 72),
(83, 'test', '2023-09-28 09:10:10', 12, 74),
(99, 'test', '2023-09-28 09:28:38', 12, 89),
(100, 'test', '2023-09-28 09:29:02', 12, 89),
(104, 'test', '2023-09-28 09:32:20', 12, 91),
(106, 'test', '2023-09-28 09:33:20', 4, 92),
(107, 'test', '2023-10-03 08:12:18', 12, 74),
(108, 'test', '2023-10-03 08:40:52', 12, 84),
(109, 'Dobra slika!', '2023-10-05 09:59:18', 15, 122);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id_l` int(11) NOT NULL,
  `like_number` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id_l`, `like_number`, `user_id`, `post_id`) VALUES
(96, 1, 6, 72),
(97, 1, 6, 73),
(98, 2, 12, 73),
(150, 3, 9, 74),
(151, 2, 9, 72),
(152, 1, 9, 84),
(158, 1, 12, 89),
(161, 1, 4, 91),
(162, 1, 4, 92),
(163, 2, 12, 92),
(192, 1, 12, 93),
(196, 1, 12, 111),
(197, 1, 4, 122),
(198, 2, 4, 111),
(199, 2, 12, 122),
(201, 1, 15, 123),
(203, 2, 12, 123),
(204, 2, 4, 123),
(205, 4, 4, 74),
(206, 2, 16, 123),
(207, 4, 12, 74),
(208, 1, 12, 136),
(209, 2, 4, 136),
(210, 2, 6, 123);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_m` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_sent` varchar(20) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_m`, `content`, `date_sent`, `sender_id`, `receiver_id`) VALUES
(107, 'test', '05/10/2023 06:55:12', 4, 12),
(108, 'Zdravo!', '05/10/2023 10:00:54', 15, 4),
(120, 'hej', '07/10/2023 10:00:12', 4, 12),
(121, 'hej', '07/10/2023 10:01:15', 4, 9),
(122, 'hej', '07/10/2023 10:01:22', 4, 9),
(123, 'hej', '07/10/2023 10:05:13', 4, 15),
(124, 'test', '07/10/2023 10:05:48', 4, 9),
(125, 'test', '07/10/2023 10:05:53', 4, 6),
(126, 'test', '07/10/2023 10:05:58', 4, 7),
(127, 'hej', '07/10/2023 10:06:31', 6, 9),
(128, 'test', '07/10/2023 10:06:35', 6, 9),
(129, 'test', '07/10/2023 10:06:49', 6, 12),
(130, 'zdravo!', '07/10/2023 10:07:07', 6, 15),
(131, 'hej', '07/10/2023 10:07:40', 12, 4),
(132, 'hej', '07/10/2023 10:07:46', 12, 6),
(133, 'hej', '07/10/2023 10:12:01', 12, 9),
(134, 'kako si', '07/10/2023 10:12:22', 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_p` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_hashtag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_p`, `caption`, `date`, `filename`, `path`, `user_id`, `is_hashtag`) VALUES
(72, 'test', '2023-09-27 09:13:05', 'sdgtrf.png', 'Pictures/sdgtrf.png', 6, NULL),
(73, 'test', '2023-09-27 09:19:02', 'wallpaperflare.com_wallpaper.jpg', 'Pictures/wallpaperflare.com_wallpaper.jpg', 6, NULL),
(74, 'hi #test #nature', '2023-09-27 14:21:18', 'wallpaperflare.com_wallpaper (1).jpg', 'Pictures/wallpaperflare.com_wallpaper (1).jpg', 4, 1),
(84, 'test', '2023-09-28 09:12:20', 'Screenshot_2.png', 'Pictures/Screenshot_2.png', 9, NULL),
(89, 'test', '2023-09-28 09:28:34', 'sefdgf.png', 'Pictures/sefdgf.png', 12, NULL),
(91, 'test', '2023-09-28 09:32:11', '630878.jpg', 'Pictures/630878.jpg', 12, NULL),
(92, 'test', '2023-09-28 09:33:00', '629553.jpg', 'Pictures/629553.jpg', 12, NULL),
(93, 'test', '2023-10-03 08:41:49', 'sefdgf.png', 'Pictures/sefdgf.png', 12, NULL),
(111, '#nature', '2023-10-05 06:41:15', 'sfdg.png', 'Pictures/sfdg.png', 4, 1),
(122, '#test', '2023-10-05 09:21:55', 'sefdgf.png', 'Pictures/sefdgf.png', 4, 1),
(123, 'Imamo nov #logotip Kako je lep!', '2023-10-05 10:01:27', 'POLZELA.png', 'Pictures/POLZELA.png', 15, 1),
(136, '#nature', '2023-10-07 05:24:36', '20230930_065204.jpg', 'Pictures/20230930_065204.jpg', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `surname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_joined` datetime DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_u`, `name`, `surname`, `email`, `username`, `password`, `date_joined`, `bio`, `admin`) VALUES
(4, 'Simon', 'test', 'sedil13171@agrolivana.com', 'simon45_45', '$2y$10$ftllfQKe0o1v3kc/tZYCKuN4oAqjoZutYuC9cOd7e6Mr3pAqlLOdW', '2023-09-16 12:05:00', NULL, 0),
(6, 'ivo', 'jan', 'ivojan@gmail.com', 'ivojan', '$2y$10$gTTfFkSxg1ITl7FGhCvX1Oej2qPcUPcbb.cuC9c5fjX2jN3rONHcq', '2023-09-21 17:24:35', NULL, 0),
(7, 'david', 'novak', 'davidnovak@gmail.com', 'davidnovak', '$2y$10$w.c7EH.F6gRPu8M6srzL3O8UfESWjaUbNhU07qY62pYtUU82xOJh.', '2023-09-21 17:25:02', NULL, 0),
(8, 'evan', 'corneillus', 'evanscorneillus35@gmail.com', 'evan1234', '$2y$10$NsPIGnqt72Nzaj8GfG3P3uryQYmNXuvY11MxHnVDXu899T66VLJ.y', '2023-09-21 17:25:37', NULL, 0),
(9, 'Donald', 'Trump', 'donaldtrump@gmail.com', 'DonaldTrump', '$2y$10$kWsFGZ5Mygv127X18w.YTuKPiz.pkJByPkdgu2dSz9YrJHFmB0Wke', '2023-09-21 17:26:22', NULL, 0),
(12, 'Anel', 'test', 'toricanel928@gmail.com', 'aneltoric', '$2y$10$U9UHsbQexmZyC1wSClKTCeBf/AKj.ViDpOefkA7KeGqy3DvydHbWm', '2023-09-27 07:27:47', NULL, 1),
(15, 'Samo', 'Å½eleznik', 'samo.zeleznik5@gmail.com', 'samo123!', '$2y$10$0oaFEzuyHeD1qjdVv4cdtOqgO0uZ0073werJTJvz2cc92jOrXaiwi', '2023-10-05 09:58:45', NULL, 0),
(16, 'delete', 'user', 'delete@gmail.com', 'delete_user', '$2y$10$4yni4AleJ6MMIMPUah8kN.wuLYnWNdSI3lKAsx.4bFjfDFIYggWPm', '2023-10-06 18:33:06', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_follows`
--

CREATE TABLE `user_follows` (
  `id_uf` int(11) NOT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `following_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_follows`
--

INSERT INTO `user_follows` (`id_uf`, `follower_id`, `following_id`) VALUES
(22, 7, 9),
(23, 7, 4),
(31, 4, 9),
(32, 4, 7),
(39, 9, 4),
(42, 4, 6),
(45, 12, 4),
(46, 9, 12),
(47, 9, 6),
(48, 6, 9),
(49, 6, 12),
(53, 12, 6),
(54, 4, 12),
(55, 12, 9),
(59, 15, 4),
(60, 4, 15),
(61, 12, 15),
(62, 16, 15),
(63, 16, 12),
(64, 6, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `IX_Relationship1` (`user_id`),
  ADD KEY `IX_Relationship2` (`post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_l`),
  ADD KEY `IX_Relationship4` (`user_id`),
  ADD KEY `IX_Relationship5` (`post_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `IX_Relationship8` (`sender_id`),
  ADD KEY `IX_Relationship9` (`receiver_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `IX_Relationship3` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- Indexes for table `user_follows`
--
ALTER TABLE `user_follows`
  ADD PRIMARY KEY (`id_uf`),
  ADD KEY `IX_Relationship6` (`follower_id`),
  ADD KEY `IX_Relationship7` (`following_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_l` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_follows`
--
ALTER TABLE `user_follows`
  MODIFY `id_uf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Relationship1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_u`),
  ADD CONSTRAINT `Relationship2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id_p`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `Relationship4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_u`),
  ADD CONSTRAINT `Relationship5` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id_p`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `Relationship8` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id_u`),
  ADD CONSTRAINT `Relationship9` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id_u`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `Relationship3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_u`);

--
-- Constraints for table `user_follows`
--
ALTER TABLE `user_follows`
  ADD CONSTRAINT `Relationship6` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id_u`),
  ADD CONSTRAINT `Relationship7` FOREIGN KEY (`following_id`) REFERENCES `users` (`id_u`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
