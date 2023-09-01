-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 05:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vnit_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageId` int(11) NOT NULL,
  `imageName` varchar(256) NOT NULL,
  `time` time(6) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageId`, `imageName`, `time`, `date`, `user_id`) VALUES
(1, 'IMG_8943.JPG', '11:42:28.000000', '2023-02-08', 9),
(2, 'IMG_8943.JPG', '11:43:07.000000', '2023-02-08', 9),
(3, 'IMG_8943.JPG', '11:46:17.000000', '2023-02-08', 9),
(4, 'IMG_8943.JPG', '11:46:55.000000', '2023-02-08', 9),
(5, 'IMG_8943.JPG', '13:52:57.000000', '2023-02-08', 9),
(6, 'discord.png', '13:59:20.000000', '2023-02-08', 9),
(7, 'stay-positive-quotes-10.jpg', '20:26:26.000000', '2023-03-24', 9),
(8, 'WhatsApp Image 2023-02-15 at 18.50.17.jpg', '19:39:01.000000', '2023-08-14', 10);

-- --------------------------------------------------------

--
-- Table structure for table `image_rel`
--

CREATE TABLE `image_rel` (
  `post_id` int(11) NOT NULL,
  `image_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_rel`
--

INSERT INTO `image_rel` (`post_id`, `image_Id`) VALUES
(0, 0),
(0, 0),
(28, 3),
(29, 4),
(30, 5),
(31, 6),
(32, 7),
(34, 8);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `time` time(6) NOT NULL,
  `date` date NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `title` varchar(3000) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `time`, `date`, `user_id`, `title`, `content`) VALUES
(1, '12:06:14.000000', '2022-06-11', 'max11', 'why is snow white?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, '12:06:14.000000', '2022-06-11', 'peter11', 'why is moon round?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, '26:10:11.000000', '2022-06-10', 'tom23', 'what are bards?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4, '26:10:11.000000', '2022-06-10', 'john23', 'what are showers?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(21, '19:41:11.000000', '2023-01-27', '9', 'tentative title', 'My name ins anthony gonsalvis me duniya me aakalye hu'),
(22, '10:33:13.000000', '2023-01-28', '9', 'tentative title', ''),
(23, '10:33:45.000000', '2023-01-28', '9', 'tentative title', 'jgh'),
(24, '17:16:45.000000', '2023-01-28', '9', 'tentative title', 'my name is pratham gitpjos kaehrgibk rgnaiwngk'),
(25, '11:35:28.000000', '2023-01-30', '9', 'tentative title', 'SDASFA'),
(26, '11:42:28.000000', '2023-02-08', '9', 'tentative title', 'aerfvefa'),
(27, '11:43:07.000000', '2023-02-08', '9', 'tentative title', 'ewf sef fesg'),
(28, '11:46:17.000000', '2023-02-08', '9', 'tentative title', 'ewf sef fesg'),
(29, '11:46:55.000000', '2023-02-08', '9', 'tentative title', 'fthnfh ttdnhnx'),
(30, '13:52:57.000000', '2023-02-08', '9', 'tentative title', 'ascafef ewsf awg'),
(31, '13:59:20.000000', '2023-02-08', '9', 'tentative title', 'i recenwrngonono mpkbrppjphskdvl lrhgl njd;jlpratuykjjaskj. samypsjy giri rexcenyler attenmfrd dh 20203,nsflvh hlg'),
(32, '20:26:26.000000', '2023-03-24', '9', 'tentative title', 'xfbxfbxf  vvnnvn'),
(33, '16:14:09.000000', '2023-08-14', '9', 'tentative title', 'jhrg iihs iodgb osfcjg klknfcbn kdfhfe'),
(34, '19:39:01.000000', '2023-08-14', '10', 'tentative title', 'a memory of mine');

-- --------------------------------------------------------

--
-- Table structure for table `staticcircleinfo`
--

CREATE TABLE `staticcircleinfo` (
  `circleId` int(11) NOT NULL,
  `circleName` char(250) NOT NULL,
  `circleLogo` varchar(3000) NOT NULL,
  `circleDiscription` varchar(5000) NOT NULL,
  `circleBanner` varchar(3000) NOT NULL,
  `circleInstitute` varchar(3000) NOT NULL,
  `city` char(250) NOT NULL,
  `state` char(250) NOT NULL,
  `country` char(250) NOT NULL,
  `circleStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staticcircleinfo`
--

INSERT INTO `staticcircleinfo` (`circleId`, `circleName`, `circleLogo`, `circleDiscription`, `circleBanner`, `circleInstitute`, `city`, `state`, `country`, `circleStatus`) VALUES
(1, 'Naruto', '1680615824550.jpg', 'wryetufkg', '', '', '', '', '', 0),
(2, 'Attack On Titan', 'IMG_8943.JPG', 'wesrdtfyg', '', '', '', '', '', 1),
(3, 'agnipankh', 'agnipankh.jpg', 'defgrthyjuhkh,jhmvcn h,jhgcnfbx', '', '', '', '', '', 0),
(4, 'Don Quixote', 'don-quixote.jpg', 'defgrthyjuhkh,jhmvcn h,jhgcnfbx', '', '', '', '', '', 0),
(5, 'Elon Musk', 'elon-musk.jpg', 'defgrthyjuhkh,jhmvcn h,jhgcnfbx', '', '', '', '', '', 0),
(6, 'Ramanujan', 'the-man-who-knew-infinity.jpeg', 'defgrthyjuhkh,jhmvcn h,jhgcnfbx', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staticcustomerinfo`
--

CREATE TABLE `staticcustomerinfo` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `profile_img` varchar(256) NOT NULL DEFAULT 'User_id.php',
  `banner` varchar(256) NOT NULL,
  `about` longtext NOT NULL DEFAULT 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==',
  `institute` varchar(3000) NOT NULL,
  `city` varchar(3000) NOT NULL,
  `state` varchar(3000) NOT NULL,
  `country` varchar(3000) NOT NULL,
  `graduating_year` int(4) NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staticcustomerinfo`
--

INSERT INTO `staticcustomerinfo` (`user_id`, `user_name`, `mobile`, `email`, `password`, `profile_img`, `banner`, `about`, `institute`, `city`, `state`, `country`, `graduating_year`, `gender`) VALUES
(9, 'UHJhdGhhbSBHaXJp', 0, 'cHJhdGhhbS5naXJpMDJAZ21haWwuY29t', '164a48e142551453efaf0806a26a58ed', 'User_icon.png', '516664.jpg', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 'vnit', 'nagpur', 'maharashtra', 'india', 2024, 'Male'),
(10, 'UHJhdGhhbSBHaXJp', 0, 'cHJhdGhhbUBnbWFpbC5jb20=', '164a48e142551453efaf0806a26a58ed', 'User_icon.png', '516664.jpg', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 'VNIT', 'Nagpur', 'Maharashtra', 'India', 2024, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `variablecircleinfo`
--

CREATE TABLE `variablecircleinfo` (
  `circleId` int(11) NOT NULL,
  `cMemberId` int(255) NOT NULL,
  `cMemberCount` int(255) NOT NULL,
  `cFollowerId` int(255) NOT NULL,
  `cFollowerCount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variablecustomerinfo`
--

CREATE TABLE `variablecustomerinfo` (
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `variablecustomerinfo`
--

INSERT INTO `variablecustomerinfo` (`user_id`, `community_id`, `post_id`) VALUES
(4, 0, 0),
(5, 0, 0),
(6, 0, 0),
(7, 0, 0),
(8, 0, 0),
(9, 0, 0),
(10, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `staticcircleinfo`
--
ALTER TABLE `staticcircleinfo`
  ADD PRIMARY KEY (`circleId`);

--
-- Indexes for table `staticcustomerinfo`
--
ALTER TABLE `staticcustomerinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `staticcircleinfo`
--
ALTER TABLE `staticcircleinfo`
  MODIFY `circleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staticcustomerinfo`
--
ALTER TABLE `staticcustomerinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
