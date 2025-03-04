-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3312
-- Generation Time: Aug 30, 2024 at 11:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccams_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `group_id`, `event_title`, `event_date`, `event_description`, `created_at`) VALUES
(1, 411777302, 'whine and dine ', '2024-10-16', 'Vineyard Party', '2024-08-20 05:52:09'),
(2, 411777302, 'Burnaboys performance in Kenya', '2024-12-04', 'At Uhuru Gardens', '2024-08-20 06:35:32'),
(3, 2923463582, 'rhumba night', '2024-08-23', 'all about rhumba', '2024-08-22 03:24:16'),
(4, 9576, 'Kahush Perfoms in JKUAT', '2024-09-29', ' at the Students Centre', '2024-08-22 05:52:24'),
(5, 9576, 'Lil Maina Perfoms in JKUAT', '2024-10-15', ' at the Students Centre', '2024-08-22 05:52:57'),
(6, 3217218, 'rhumba night', '2024-12-01', 'Mugithi rhumba night at Embassy Club', '2024-08-22 06:49:29'),
(7, 5883363786, 'first event', '2024-12-23', 'purpose to attend', '2024-08-22 07:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `group_members_table`
--

CREATE TABLE `group_members_table` (
  `id` int(11) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_members_table`
--

INSERT INTO `group_members_table` (`id`, `group_id`, `user_id`, `join_date`, `username`) VALUES
(5, 2822683936, 29789179135, '2024-08-18 09:37:45', 'Robin'),
(6, 2822683936, 29789179135, '2024-08-18 10:37:11', 'Robin'),
(7, 2822683936, 40077044, '2024-08-18 11:19:58', 'Future'),
(8, 602291, 54581, '2024-08-18 23:53:51', 'Irene'),
(9, 301, 11949115, '2024-08-19 02:29:20', 'Vincent'),
(10, 602291, 44899489480695890, '2024-08-19 07:49:40', 'Victor'),
(11, 8486821, 29789179135, '2024-08-19 07:54:12', 'Robin'),
(12, 6696599621, 11949115, '2024-08-19 17:47:08', 'Vincent'),
(13, 6696599621, 40077044, '2024-08-19 17:49:55', 'Future'),
(14, 6696599621, 54581, '2024-08-19 17:51:20', 'Irene'),
(15, 6696599621, 29789179135, '2024-08-19 18:06:08', 'Robin'),
(16, 411777302, 35318796958, '2024-08-20 06:33:34', 'Owen'),
(17, 411777302, 11949115, '2024-08-20 06:38:40', 'Vincent'),
(18, 411777302, 54581, '2024-08-20 06:41:09', 'Irene'),
(19, 9576, 29789179135, '2024-08-22 05:53:40', 'Robin'),
(20, 9576, 54581, '2024-08-22 05:54:30', 'Irene'),
(21, 9576, 40077044, '2024-08-22 05:55:26', 'Future'),
(22, 9576, 50459527930, '2024-08-22 06:46:24', 'Maggie');

-- --------------------------------------------------------

--
-- Table structure for table `group_table`
--

CREATE TABLE `group_table` (
  `groupid` bigint(19) NOT NULL,
  `group_name` varchar(19) NOT NULL,
  `category` varchar(10) NOT NULL,
  `profile` text NOT NULL,
  `group_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_table`
--

INSERT INTO `group_table` (`groupid`, `group_name`, `category`, `profile`, `group_image`) VALUES
(2, 'Traps House', 'Music', 'The migos....21 Savage!!!!!That&#039;sour people', 'uploads/groups/IMG_20230604_184224_702.jpg'),
(301, 'Bread of Christ', 'Religion', 'Christ is the only answer', 'uploads/groups/Screenshot_20230502-235103.png'),
(409, 'Traps House', 'Music', 'The migos....21 Savage!!!!!That&#039;sour people', 'uploads/groups/ricardo-rocha-TtsEBUkwPs8-unsplash.jpg'),
(900, 'Grooving', 'Dance', '\r\n\r\nAll about the groove!!!', 'uploads/groups/Screenshot_20230502-235103.png'),
(7640, 'Traps House', 'Music', 'The migos....21 Savage!!!!!That&#039;sour people', 'uploads/groups/20220916_141938.jpg'),
(9576, '254s Traps House', 'Music', 'The migos....21 Savage!!!!!That&#039;sour people', 'uploads/groups/download.png'),
(545340, 'Culture', 'Music', 'pop is the culture', 'uploads/groups/HOME (2).png'),
(602291, 'Great', 'Religion', 'Oversee scholarships', 'uploads/groups/WhatsApp Image 2023-11-10 at 11.10.18_eea0de7e,,,,dred.jpg'),
(2265916, 'Trap House', 'Music', 'The migos....21 Savage!!!!!That&#039;sour people', 'uploads/groups/photo for sale.jpg'),
(3217218, 'Singing in the Show', 'Music', 'All about singing and vibes', 'uploads/groups/download.png'),
(8486821, 'Gaming', 'Coding', 'You sure you want a challenge!!', 'uploads/groups/Screenshot_20230502-235615.png'),
(9792591, 'Traps House', 'Music', 'The migos....21 Savage!!!!!That&#039;sour people', 'uploads/groups/39.png'),
(11377481, 'Traps House', 'Music', 'The migos....21 Savage!!!!!That&#039;sour people', 'uploads/groups/download.png'),
(58924872, 'Traps House', 'Music', 'The migos....21 Savage!!!!!That&#039;sour people', 'uploads/groups/Screenshot_20221112-233902_Chrome.jpg'),
(411777302, 'QuavoHuncho', 'Music', 'We about to go  outta town, we about to go out around', 'uploads/groups/IMG_20230604_184224_702.jpg'),
(969129233, 'serving ', 'Religion', 'its our goal to serve you', 'uploads/groups/Screenshot_20230502-235615.png'),
(2822683936, 'Brad dance', 'Dance', 'all about dance', 'uploads/groups/Screenshot_20230502-235508.png'),
(2923463582, 'Hip Hop Dancers', 'Dance', 'Move those hips and hop on that dance trend...\r\nHip Hop culture will always be appreaciated by as', 'uploads/groups/IMG_20230604_184224_702.jpg'),
(5883363786, 'cal', 'Sports', 'uouput', 'uploads/groups/download.png'),
(6696599621, 'Marathoners', 'Sports', 'Hey, Hey, Hey, Hey, Hey .... Run for your life!!!', 'uploads/groups/Screenshot_20230401_022948_Photo Editor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts_table`
--

CREATE TABLE `posts_table` (
  `post_id` int(11) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts_table`
--

INSERT INTO `posts_table` (`post_id`, `group_id`, `user_id`, `post_content`, `post_image`, `post_date`) VALUES
(26, 545340, 40077044, 'cool DP', 'uploads/photo for sale.jpg', '2024-08-19 12:30:51'),
(27, 6696599621, 11949115, 'Fit for the day', 'uploads/Screenshot_20230401_022948_Photo Editor.jpg', '2024-08-19 17:43:01'),
(28, 6696599621, 11949115, 'The sun came out today', 'uploads/20220320_182423.jpg', '2024-08-19 17:44:01'),
(29, 6696599621, 11949115, 'look at this wonderfull dp!!!', 'uploads/photo for sale.jpg', '2024-08-19 17:45:35'),
(30, 6696599621, 54581, 'look at this wonderfull dp!!!', 'uploads/photo for sale.jpg', '2024-08-19 18:01:16'),
(31, 411777302, 54581, 'New Drip coming in hot!!!', 'uploads/IMG_20230604_184224_702.jpg', '2024-08-20 06:41:50'),
(32, 411777302, 54581, 'Tom Oxfords Innit?', 'uploads/Screenshot_20221218-072922_Instagram.jpg', '2024-08-20 06:44:28'),
(34, 2923463582, 29, 'Air Jordan&#039;s 1 Highs', 'uploads/IMG_20230604_184224_702.jpg', '2024-08-21 22:02:14'),
(35, 9576, 377982982003536, 'Wild n out Jacket from Nick Cannon!!!', 'uploads/Screenshot_20230401_022948_Photo Editor.jpg', '2024-08-22 05:50:18'),
(36, 9576, 377982982003536, 'Cool cactus Jack J1s highs', 'uploads/IMG_20230604_184224_702.jpg', '2024-08-22 05:51:00'),
(37, 3217218, 50459527930, 'This wallpaper fascinates me', 'uploads/Screenshot_20230912_194943_WhatsApp.jpg', '2024-08-22 06:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `userid` bigint(19) NOT NULL,
  `username` varchar(19) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`userid`, `username`, `email_address`, `password`, `phone_number`) VALUES
(29, 'Brad', 'brad@gmail.com', '12345', '07807677723'),
(54581, 'Irene', 'irene@gmail.com', '283', '0789278320'),
(11949115, 'Vincent', 'vincentanyanje@gmail.com', '123456', '0726101127'),
(40077044, 'Future', 'future@gmail.com', 'bb1', '0767519923'),
(29789179135, 'Robin', 'robinhood@gmail.com', '89a', '07648872987'),
(35318796958, 'Owen', 'kellyowens@gmail.com', '12345', '0789658429'),
(50459527930, 'Maggie', 'maggie3@gmail.com', '12345', '0789456734'),
(377982982003536, 'Stan', 'stan@gmail.com', '12345', '0790768893'),
(44899489480695890, 'Victor', 'victor@gmail.com', '12345', '0708385549');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `group_members_table`
--
ALTER TABLE `group_members_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `group_table`
--
ALTER TABLE `group_table`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `posts_table`
--
ALTER TABLE `posts_table`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_members_table`
--
ALTER TABLE `group_members_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts_table`
--
ALTER TABLE `posts_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_table` (`groupid`);

--
-- Constraints for table `group_members_table`
--
ALTER TABLE `group_members_table`
  ADD CONSTRAINT `group_members_table_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_table` (`groupid`),
  ADD CONSTRAINT `group_members_table_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`userid`);

--
-- Constraints for table `posts_table`
--
ALTER TABLE `posts_table`
  ADD CONSTRAINT `posts_table_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_table` (`groupid`),
  ADD CONSTRAINT `posts_table_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
