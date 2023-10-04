-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 04:33 PM
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
-- Table structure for table `circle_following`
--

CREATE TABLE `circle_following` (
  `userId` int(11) NOT NULL,
  `circleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `circle_following`
--

INSERT INTO `circle_following` (`userId`, `circleId`) VALUES
(19, 1),
(19, 2),
(18, 1),
(18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `collegeId` int(11) NOT NULL,
  `collegeName` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `state` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`collegeId`, `collegeName`, `city`, `state`, `country`) VALUES
(1, 'Arvindbabu Deshmukh Arts Ciommerce College, Bharsingi', 'Nagpur', 'Maharashtra', 'India'),
(2, 'Dayanand Arya Women\'s College, Jaripatka', 'Nagpur', 'Maharashtra', 'India'),
(3, 'G. H. Raisoni College of Engineering, Nagpur', 'Nagpur', 'Maharashtra', 'India'),
(4, 'Government Institute of Forensic Science', 'Nagpur', 'Maharashtra', 'India'),
(5, 'Govindarao Sekaria Arth Vanijya College', 'Nagpur', 'Maharashtra', 'India'),
(6, 'Indian Institute of Information Technology, Nagpur', 'Nagpur', 'Maharashtra', 'India'),
(7, 'Indian Institute of Management', 'Nagpur', 'Maharashtra', 'India'),
(8, 'Jhulelal Institute of Technology', 'Nagpur', 'Maharashtra', 'India'),
(9, 'Karamvir Dadasaheb Kannamwar Engineering College, Nandanvan', 'Nagpur', 'Maharashtra', 'India'),
(10, 'Madhuribai Deshmukh Institute of Nursing Education Nagpur', 'Nagpur', 'Maharashtra', 'India'),
(11, 'Maharashtra Animal & Fishery Sciences University, Nagpur', 'Nagpur', 'Maharashtra', 'India'),
(12, 'Mahatma Gandhi Arts Commerce College, Parseoni', 'Nagpur', 'Maharashtra', 'India'),
(13, 'Mathuradas Mohta Science College, Nagpur', 'Nagpur', 'Maharashtra', 'India'),
(14, 'MP Deo Memorial Science College', 'Nagpur', 'Maharashtra', 'India'),
(15, 'Nagpur Institute of Technology, Katol road', 'Nagpur', 'Maharashtra', 'India'),
(16, 'Renuka Arts College, Ring Road', 'Nagpur', 'Maharashtra', 'India'),
(17, 'S. B. Jain Institute of Technology Management and Research', 'Nagpur', 'Maharashtra', 'India'),
(18, 'Seth Kesrimal Podwal Arts and Science college, Kamptee', 'Nagpur', 'Maharashtra', 'India'),
(19, 'Shri Ramdeobaba College of Engineering and Management', 'Nagpur', 'Maharashtra', 'India'),
(20, 'Sindhu College, Panchpavli Road', 'Nagpur', 'Maharashtra', 'India'),
(21, 'Smt. Manoramabai Mundle College of Architecture', 'Nagpur', 'Maharashtra', 'India'),
(22, 'Sri. Shivaji Science College, Congressnagar', 'Nagpur', 'Maharashtra', 'India'),
(23, 'The Rashtrasant Tukadoji Maharaj Nagpur University', 'Nagpur', 'Maharashtra', 'India'),
(24, 'Tirpude Institute of Management Education', 'Nagpur', 'Maharashtra', 'India'),
(25, 'Visvesvaraya National Institute of Technology, Nagpur', 'Nagpur', 'Maharashtra', 'India'),
(26, 'VMV Commerce JMT Arts JJP Science College, Wardhaman Nagar', 'Nagpur', 'Maharashtra', 'India'),
(27, 'VSPM\'s Dental College & research Centre', 'Nagpur', 'Maharashtra', 'India'),
(28, 'Yeshwantrao Chavan College of Engineering', 'Nagpur', 'Maharashtra', 'India');

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
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `preferenceId` int(11) NOT NULL,
  `preferenceTitle` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`preferenceId`, `preferenceTitle`) VALUES
(1, 'Music'),
(2, 'Drama'),
(3, 'Dance'),
(4, 'AI/ML'),
(5, 'Entreprenureship'),
(6, 'Programming'),
(7, 'Trading'),
(8, 'Litrature');

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
  `circleStatus` int(11) NOT NULL,
  `collegeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staticcircleinfo`
--

INSERT INTO `staticcircleinfo` (`circleId`, `circleName`, `circleLogo`, `circleDiscription`, `circleBanner`, `circleStatus`, `collegeId`) VALUES
(1, 'Naruto', '1680615824550.jpg', 'wryetufkg', '', 0, 25),
(2, 'Attack On Titan', 'IMG_8943.JPG', 'wesrdtfyg', '', 1, 25),
(3, 'agnipankh', 'agnipankh.jpg', 'defgrthyjuhkh,jhmvcn h,jhgcnfbx', '', 0, 25),
(4, 'Don Quixote', 'don-quixote.jpg', 'defgrthyjuhkh,jhmvcn h,jhgcnfbx', '', 0, 25),
(5, 'Elon Musk', 'elon-musk.jpg', 'defgrthyjuhkh,jhmvcn h,jhgcnfbx', '', 0, 25),
(6, 'Ramanujan', 'the-man-who-knew-infinity.jpeg', 'defgrthyjuhkh,jhmvcn h,jhgcnfbx', '', 0, 25),
(7, 'iitb', 'tt.jpg', 'sdfhf  dfh dfh', '', 0, 24),
(8, 'Pirate King', 'AM0017_1_1800x1800.webp', 'dsgfdgh, ggsfdgfhgj fhdgfhgj,h', '', 1, 24),
(9, 'ppp', 'AM0017_1_1800x1800.webp', 'odfcgvhbjknml', '', 0, 0);

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
  `collegeId` int(11) NOT NULL,
  `course` varchar(256) NOT NULL,
  `graduating_year` int(4) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staticcustomerinfo`
--

INSERT INTO `staticcustomerinfo` (`user_id`, `user_name`, `mobile`, `email`, `password`, `profile_img`, `banner`, `about`, `collegeId`, `course`, `graduating_year`, `gender`, `age`) VALUES
(9, 'UHJhdGhhbSBHaXJp', 0, 'cHJhdGhhbS5naXJpMDJAZ21haWwuY29t', '164a48e142551453efaf0806a26a58ed', 'User_icon.png', '516664.jpg', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 2024, 'Male', 0),
(10, 'UHJhdGhhbSBHaXJp', 0, 'cHJhdGhhbUBnbWFpbC5jb20=', '164a48e142551453efaf0806a26a58ed', 'User_icon.png', '516664.jpg', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 25, '', 2024, 'Male', 0),
(11, 'ZGVlcCBzd3Jvb3A=', 0, 'ZGVlcEBnbWFpbC5jb20=', '4c50249a3cfaa7b639f8693d0cc15021', 'User_id.php', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0),
(12, 'QXl1c2ggVGFubmE=', 0, 'YXl1c2hAZ21haWwuY29t', '872d791d2175eaa4aada4f876933df73', 'User_id.php', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0),
(13, '', 0, '', '', 'User_id.php', '', 'i Am a Valorant Noob', 0, 'Computer Science', 2024, 'male', 21),
(14, 'VGVqYXMgaGFubQ==', 0, 'dGVqYXNAZ21haWwuY29t', 'dc9ac98f0f841f379c0c3c1ecc85e56a', 'User_id.php', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0),
(15, '', 0, '', '', 'User_id.php', '', 'valorant noob', 25, 'Computer Science', 2024, 'male', 21),
(16, 'YWRpdHlhIGdhbHBoYWRl', 0, 'YWRpdHlhQGdtYWlsLmNvbQ==', 'e51b2620f7b65bed95919b66168f7573', 'User_id.php', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0),
(17, '', 0, '', '', 'User_id.php', '', 'Hehehehehe', 25, 'Electrical Engineering', 2024, 'male', 21),
(18, 'dXRrYXJzaCBnYWlrd2Fk', 0, 'dXRrYXJzaEBnbWFpbC5jb20=', '53a2b5b7021853cdc6cbd684e3baf0e7', 'User_id.php', '', 'i do comady', 27, 'ECE', 2024, 'male', 21),
(19, 'RGhydXYgR3VwdGE=', 0, 'ZGhydXZAZ21haWwuY29t', 'fe30f57115a50f47746f8c12c3bbde2c', 'User_id.php', '', 'zsdxcfgvbhnj', 25, 'Electrical Engineering', 2024, 'male', 21);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `threadId` int(11) NOT NULL,
  `circleId` int(11) NOT NULL,
  `threadName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`threadId`, `circleId`, `threadName`) VALUES
(1, 1, 'Pain Arc'),
(2, 1, 'Final Arc'),
(3, 1, 'Chunin Exam Arc'),
(4, 1, 'Nine Tails Arc'),
(5, 2, 'Titan'),
(6, 2, 'Zeke and Eren'),
(7, 2, 'Mikasa'),
(8, 2, 'Armin');

-- --------------------------------------------------------

--
-- Table structure for table `threads_membership`
--

CREATE TABLE `threads_membership` (
  `userId` int(11) NOT NULL,
  `threadId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads_membership`
--

INSERT INTO `threads_membership` (`userId`, `threadId`) VALUES
(0, 1),
(19, 2),
(19, 7),
(19, 8),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userpreferences`
--

CREATE TABLE `userpreferences` (
  `userId` int(11) NOT NULL,
  `preferenceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userpreferences`
--

INSERT INTO `userpreferences` (`userId`, `preferenceId`) VALUES
(14, 4),
(14, 5),
(14, 6),
(16, 1),
(16, 2),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 5),
(19, 6);

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
(10, 0, 0),
(11, 0, 0),
(12, 0, 0),
(14, 0, 0),
(16, 0, 0),
(18, 0, 0),
(19, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`collegeId`);

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
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`preferenceId`);

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
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`threadId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `collegeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `preferenceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staticcircleinfo`
--
ALTER TABLE `staticcircleinfo`
  MODIFY `circleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staticcustomerinfo`
--
ALTER TABLE `staticcustomerinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `threadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
