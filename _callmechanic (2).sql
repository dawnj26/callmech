-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 01:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `_callmechanic`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `mechanic_id`, `content`, `date_posted`) VALUES
(6, 20, 2, 'LOCATION?', '1674728925');

-- --------------------------------------------------------

--
-- Table structure for table `components_images`
--

CREATE TABLE `components_images` (
  `components_id` int(11) NOT NULL,
  `components_name` varchar(100) NOT NULL,
  `components_image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`mechid`, `mechName`, `mechEmail`, `mechaddr`, `mechno`, `mechpwd`, `mech_services`, `mech_pfp`, `mech_cover`, `business_permit`, `acc_status`) VALUES
(1, 'supra auto repair', 'supra@gmail.com', 'san jose, san nicolas, pangasinan', '0973512486', '123', 'General Repair,Ac Repair,Engine Work', 'logo6.jpg', 'logo6.jpg', 'business_permit.jpg', 'Approved'),
(2, 'chichis auto repair shop', 'chichiautorep@gmail.com', 'Sison Street, Urdaneta City, 2428 Pangasinan, Philippines', '09885736952', '123', 'General Repair, Oil Change', 'logo1.jpg', '', 'business_permit.jpg', 'Approved'),
(4, 'jordans auto repair shop', 'jordan@gmail.com', 'Laoac, Alcala, Pangasinan', '09356914769', '123', '', 'logo3.jpg', '', 'business_permit.jpg', 'Pending'),
(6, 'Yellow Bird Auto Center', 'ybbautocenter@gmail.com', 'Asingan, Pangasinan', '09885396472', '123', '', 'logo4.jpg', '', 'business_permit.jpg', 'Pending'),
(10, 'sza auto-repair shop', 'sza@gmail.com', 'Tayug, Pangasinan', '0123456789', '123', 'Maintenance, Oil Change, Battery Refill', 'p1.jpg', 'parking.jpg', 'business_permit.jpg', 'Approved'),
(11, 'hagsh', 'dsahg@gmail.com', 'sdfgsj', '2647', '123', 'Maintenance, Oil Change', 'p3.jpg', 'reg.jpg', 'business_permit.jpg', 'Approved'),
(12, 'patpat', 'jijicries@gmail.com', 'san jose snp', '0982736203', '123', 'change oil, tune up, maintenance', 'patriciajose.JPG', 'patriciajose.JPG', 'patriciajose.JPG', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `msg_sender` varchar(100) NOT NULL,
  `msg_reciever` varchar(100) NOT NULL,
  `msg_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `msg_sender`, `msg_reciever`, `msg_content`) VALUES
(20, 'Patricia Jose', 'chichis auto repair shop', 'Help, Im stuck here in PSU *CRIIII'),
(21, 'chichis auto repair shop', 'Patricia Jose', 'Exact Place Po?'),
(22, 'Patricia Jose', 'chichis auto repair shop', 'Dito po near sa harap mismo ng psu campus'),
(23, 'Patricia Jose', 'chichis auto repair shop', 'hehehe hii'),
(24, 'chichis auto repair shop', 'Patricia Jose', 'eme emerut'),
(26, 'Anji Carinan', 'chichis auto repair shop', 'helllppp'),
(29, 'chichis auto repair shop', 'Anji Carinan', 'hasdhgsa'),
(30, 'supra auto repair', 'Patricia Jose', 'gtgtgt'),
(31, 'supra auto repair', 'Patricia Jose', 'bvnmjb'),
(32, 'supra auto repair', 'Patricia Jose', 'hello'),
(33, 'Patricia Jose', 'supra auto repair', 'whyy?'),
(34, 'chichis auto repair shop', 'Patricia Jose', 'AHHHHHHH'),
(35, 'Patricia Jose', 'supra auto repair', 'qwjwh');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `content`, `date_created`) VALUES
(9, 12, '[ASAP] Looking for a mechanic near PSU Urdaneta Campus', '1672395031'),
(18, 12, '[ASAP] need a mechanic bagsakan area urdaneta', '1674101378'),
(19, 12, '[ASAP] nasiraan ulet', '1674102801'),
(20, 12, 'hello', '1674277980'),
(21, 12, 'sdhfghdf', '1674729133');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `mechanic_id`, `user_id`, `ratings`) VALUES
(1, 1, 12, 4),
(2, 1, 12, 5),
(3, 1, 12, 2),
(4, 1, 12, 5),
(5, 1, 12, 4),
(6, 2, 12, 3),
(7, 2, 12, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `birthdate`, `gender`, `contactno`, `email`, `password`, `profile_pic`) VALUES
(12, 'Patricia', 'Jose', '2002-08-13', 'Female', '09456073978', 'patriciamjose.2002@gmail.com', 'patpat123', 'IMG_8867.jpg'),
(25, 'jiji', 'cries', '2023-01-07', 'Female', '09774102637', 'akicarinan0216@gmail.com', '123456', ''),
(26, 'angelica', 'carinan', '2023-01-14', 'Female', '0977531682', 'anjicarinan@gmail.com', 'anji', ''),
(27, 'angelica', 'carinan', '2023-01-14', 'Female', '0977531682', 'anjicarinan11@gmail.com', 'lol', ''),
(28, 'Don', 'Ramos', '2023-02-01', 'Male', '017263', 'juanursua101@gmail.com', '', 'iphone13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `regno` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`regno`, `type`, `model`, `user_id`) VALUES
('', '', '', 25),
('FDS745', 'Car', 'Honda', 12);

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
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `msg_reciever` (`msg_reciever`),
  ADD KEY `msg_sender` (`msg_sender`);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `components_images`
--
ALTER TABLE `components_images`
  MODIFY `components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `mechid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`mechid`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `user_post` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`mechid`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `user_vehicle` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
