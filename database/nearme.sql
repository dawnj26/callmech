-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2024 at 10:59 AM
-- Server version: 11.6.2-MariaDB
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `callmechanic`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `date_posted` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `mechanic_id`, `content`, `date_posted`) VALUES
(7, 23, 14, 'hello\r\n', '1734354100'),
(8, 25, 15, 'hello po, please pm me', '1734357135'),
(9, 25, 15, 'just pm me', '1734357183'),
(10, 26, 1, 'locaTION PO?\r\n', '1734396798'),
(11, 27, 1, 'pm', '1734400672');

-- --------------------------------------------------------

--
-- Table structure for table `components_images`
--

CREATE TABLE `components_images` (
  `components_id` int(11) NOT NULL,
  `components_name` varchar(100) NOT NULL,
  `components_image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `components_images`
--

INSERT INTO `components_images` (`components_id`, `components_name`, `components_image`, `status`) VALUES
(3, 'logo', 'logo.png', 'Not Current'),
(4, 'logo', 'whitecar.png', 'Current'),
(5, 'background_img', 'ducati.png', 'register'),
(7, 'background_img', '0.png', 'login'),
(8, 'background_img', '2.png', 'Not Current'),
(9, 'background_img', 'mod.png', 'user_type');

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `mechid` int(11) NOT NULL,
  `mechName` varchar(500) NOT NULL,
  `mechEmail` varchar(200) NOT NULL,
  `mechaddr` varchar(500) NOT NULL,
  `mechno` varchar(11) NOT NULL,
  `mechpwd` varchar(100) NOT NULL,
  `mech_services` varchar(100) NOT NULL,
  `mech_pfp` varchar(100) NOT NULL,
  `mech_cover` varchar(100) NOT NULL,
  `business_permit` varchar(100) NOT NULL,
  `acc_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`mechid`, `mechName`, `mechEmail`, `mechaddr`, `mechno`, `mechpwd`, `mech_services`, `mech_pfp`, `mech_cover`, `business_permit`, `acc_status`) VALUES
(1, 'supra auto repair11', 'supra@gmail.com', 'san jose, san nicolas, pangasinan', '0973512486', '123', 'General Repair,Ac Repair,Engine Work', 'logo6.jpg', 'logo6.jpg', 'business_permit.jpg', 'Approved'),
(2, 'chichis auto repair shop', 'chichiautorep@gmail.com', 'Sison Street, Urdaneta City, 2428 Pangasinan, Philippines', '09885736952', '123', 'General Repair, Oil Change', 'logo1.jpg', '', 'business_permit.jpg', 'Approved'),
(4, 'jordans auto repair shop', 'jordan@gmail.com', 'Laoac, Alcala, Pangasinan', '09356914769', '123', '', 'logo3.jpg', '', 'business_permit.jpg', 'Pending'),
(6, 'Yellow Bird Auto Center', 'ybbautocenter@gmail.com', 'Asingan, Pangasinan', '09885396472', '123', '', 'logo4.jpg', '', 'business_permit.jpg', 'Approved'),
(10, 'sza auto-repair shop', 'sza@gmail.com', 'Tayug, Pangasinan', '0123456789', '123', 'Maintenance, Oil Change, Battery Refill', 'p1.jpg', 'parking.jpg', 'business_permit.jpg', 'Approved'),
(11, 'hagsh', 'dsahg@gmail.com', 'sdfgsj', '2647', '123', 'Maintenance, Oil Change', 'p3.jpg', 'reg.jpg', 'business_permit.jpg', 'Approved'),
(13, 'pagawaan', 'pagawaan@gmail.com', 'urdaneta', '099999999', '123', 'all around', '', '', '', 'Pending'),
(14, 'gawa11', 'g111@gmail.com', 'sison111', '12222221111', '', 'all111', 'profile_676147afd85a6.png', 'cover_676147afd949c.png', '5.jpg', 'pending'),
(15, 'auto supply ni yanna', 'yanyan@gmail.com', 'siso pangasinan', '0902552565', '123', 'all around', 'download (2).jpg', 'c.jpg', 'lovepik-blue-line-png-image_400742536_wh1200.png', 'Approved'),
(16, 'benZ', '123@fgmai.com', '123123123', '123123', '123', '123123123123', '', '', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `msg_sender` varchar(255) NOT NULL,
  `msg_receiver` varchar(255) NOT NULL,
  `msg_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `msg_sender`, `msg_receiver`, `msg_content`, `created_at`) VALUES
(1, 'Patricia Jose', 'supra auto repair11', 'ty', '2024-12-14 07:11:03'),
(2, 'Patricia Jose', 'supra auto repair11', 'yow', '2024-12-14 10:00:37'),
(3, 'Patricia Jose', 'supra auto repair11', 'blue sky', '2024-12-14 10:01:52'),
(4, 'Patricia Jose', 'supra auto repair11', 'can you help me', '2024-12-14 10:27:55'),
(5, 'Patricia Jose', 'supra auto repair11', 'pls help my car died', '2024-12-14 13:09:06'),
(6, 'supra auto repair11', 'Patricia Jose', 'ok', '2024-12-14 13:45:13'),
(7, 'supra auto repair11', 'Patricia Jose', 'going now', '2024-12-14 13:46:46'),
(8, 'gawa', 'PIA MARIE CUADE', 'hi', '2024-12-16 13:05:00'),
(9, 'gawa', 'PIA MARIE CUADE', 'hi', '2024-12-16 13:06:17'),
(10, 'gawa', 'PIA MARIE CUADE', 'huy', '2024-12-16 13:06:28'),
(11, 'donn3 quinto', 'supra auto repair11', 'asd', '2024-12-16 13:12:19'),
(12, 'donn3 quinto', 'supra auto repair11', 'asd', '2024-12-16 13:12:22'),
(13, 'donn3 quinto', 'supra auto repair11', '123', '2024-12-16 13:12:25'),
(14, 'Avery Eya', 'supra auto repair11', 'yow', '2024-12-16 13:13:33'),
(15, 'Avery Eya', 'supra auto repair11', '', '2024-12-16 13:13:36'),
(16, 'supra auto repair11', 'donn3 quinto', 'asd', '2024-12-16 13:34:57'),
(17, 'donn5 qwe', 'supra auto repair11', 'qwe', '2024-12-16 13:48:39'),
(18, 'supra auto repair11', 'donn5 qwe', '123', '2024-12-16 13:53:56'),
(19, 'supra auto repair11', 'donn5 qwe', '123', '2024-12-16 13:54:12'),
(20, 'supra auto repair11', 'donn5 qwe', '123', '2024-12-16 13:54:31'),
(21, 'supra auto repair11', 'donn5 qwe', '123', '2024-12-16 13:54:57'),
(22, 'supra auto repair11', 'donn5 qwe', '123', '2024-12-16 13:56:06'),
(23, 'supra auto repair11', 'donn5 qwe', '123', '2024-12-16 13:56:30'),
(24, 'supra auto repair11', 'donn5 qwe', '123', '2024-12-16 13:56:39'),
(25, 'Yanna Mae', 'supra auto repair11', 'hello', '2024-12-17 00:58:40'),
(26, 'Yanna Mae', 'supra auto repair', 'fu', '2024-12-17 01:03:07'),
(27, 'supra auto repair', 'Yanna Mae', 'hi', '2024-12-17 01:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mechanic_id` int(11) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `mechanic_id`, `message`, `type`, `created_at`) VALUES
(21, NULL, 1, 'donn3 quinto sent a message', 'chat', '2024-12-16 13:12:19'),
(22, NULL, 1, 'donn3 quinto sent a message', 'chat', '2024-12-16 13:12:22'),
(23, NULL, 1, 'donn3 quinto sent a message', 'chat', '2024-12-16 13:12:25'),
(24, NULL, 1, 'Avery Eya sent a message', 'chat', '2024-12-16 13:13:33'),
(25, NULL, 1, 'Avery Eya sent a message', 'chat', '2024-12-16 13:13:36'),
(26, NULL, 1, 'donn5 qwe sent a message', 'chat', '2024-12-16 13:48:39'),
(28, 36, NULL, 'supra auto repair sent a message', 'chat', '2024-12-16 13:56:39'),
(29, NULL, 1, 'Yanna Mae sent a message', 'chat', '2024-12-17 00:58:40'),
(30, NULL, 1, 'Yanna Mae rated you 4 stars', 'rating', '2024-12-17 00:58:47'),
(35, NULL, 1, 'Yanna Mae sent a message', 'chat', '2024-12-17 01:03:07'),
(36, 39, NULL, 'supra auto repair sent a message', 'chat', '2024-12-17 01:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `content`, `date_created`) VALUES
(22, 30, 'hello po need help\r\n', '1734353518'),
(23, 30, 'im here at urdaneta area\r\n', '1734353546'),
(24, 34, 'hellooooo', '1734354877'),
(25, 38, 'hello po need help\r\nnear SM rosales', '1734356377'),
(26, 39, 'looking for mechanic', '1734396731'),
(27, 39, 'lf mechanic around urdaneta', '1734400530');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `mechanic_id`, `user_id`, `ratings`) VALUES
(11, 1, 39, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `content`, `created_at`) VALUES
(1, 34, 'bad girl', '2024-12-17 10:08:03'),
(2, 34, '123', '2024-12-17 10:13:36'),
(3, 34, '123', '2024-12-17 10:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `birthdate`, `gender`, `contactno`, `email`, `password`, `profile_pic`) VALUES
(30, 'PIA MARIE123', 'CUADE', '2002-02-27', 'Female', '0222222222544', 'pia@gmail.com', '123', 'profile_67613f1b280e0.png'),
(31, 'donny', 'quinto', '2024-12-16', 'Male', '09560575513', 'donny@gmail.com', 'password', 'wallpaper.png'),
(33, 'donn3', 'quinto', '2024-12-17', 'Male', '123123123123', 'donn3@gmail.com', 'password', 'wallpaper.png'),
(34, 'Avery', 'Eya', '1999-01-19', 'Female', '09123456798', '21UR1425_ms@Psu.edu.ph', '123456', '1bdd7d87-33ac-48bd-bfaa-489f16c77fe7.jpg'),
(36, 'donn5', 'qwe', '2024-12-19', 'Male', '123123', 'qwe@gmail.com', '123', 'wallpaper.png'),
(37, 'yaya', 'ya', '2002-12-04', 'Female', '7747474744', 'y@gmail.com', '123', '1.1.jpg'),
(38, 'MARIE', 'CUADE', '2002-02-27', 'Female', '09545826547', 'marie@gmail.com', '123', '462543267_3777864292544428_1592064793591860734_n (1).jpg'),
(39, 'Yanna', 'Mae', '2001-12-04', 'Female', '0912345678', 'Yannamae@gmail.com', '12345', 'red_woman.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `regno` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `mechanic_id` (`mechanic_id`);

--
-- Indexes for table `components_images`
--
ALTER TABLE `components_images`
  ADD PRIMARY KEY (`components_id`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`mechid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `mechanic_fk` (`mechanic_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_post` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `mechanic_id` (`mechanic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_user_fk` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`regno`),
  ADD KEY `user_vehicle` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `components_images`
--
ALTER TABLE `components_images`
  MODIFY `components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `mechid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`mechid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `mechanic_fk` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`mechid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `user_post` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`mechid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `report_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `user_vehicle` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
