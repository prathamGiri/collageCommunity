-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 08:40 PM
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
-- Table structure for table `circle_membership`
--

CREATE TABLE `circle_membership` (
  `circleId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `position` varchar(256) NOT NULL DEFAULT 'Member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `circle_membership`
--

INSERT INTO `circle_membership` (`circleId`, `userId`, `position`) VALUES
(1, 20, 'Member'),
(1, 19, 'Member'),
(1, 18, 'Member'),
(1, 16, 'Member'),
(1, 14, 'Member'),
(1, 12, 'Member');

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
(8, 'WhatsApp Image 2023-02-15 at 18.50.17.jpg', '19:39:01.000000', '2023-08-14', 10),
(9, 'Einstein1921_by_F_Schmutzer_2.jpg', '20:46:27.000000', '2023-10-10', 20),
(10, 'Oppenheimer_(cropped).jpg', '20:46:27.000000', '2023-10-10', 20),
(11, 'Fred_Hoyle.jpg', '20:46:27.000000', '2023-10-10', 20),
(12, 'Stephen_Hawking.StarChild.jpg', '20:46:27.000000', '2023-10-10', 20),
(13, 'ti membership.jpg', '16:46:18.000000', '2023-10-11', 19),
(14, 'david-holifield-kPxsqUGneXQ-unsplash.jpg', '13:42:31.000000', '2023-10-15', 19),
(15, 'david-holifield-kPxsqUGneXQ-unsplash.jpg', '13:43:22.000000', '2023-10-15', 19),
(16, 'support.png', '13:49:25.000000', '2023-10-15', 19),
(17, 'quality.png', '13:51:00.000000', '2023-10-15', 19),
(18, 'md-mahdi-cu1-a9LSmqo-unsplash.jpg', '13:52:35.000000', '2023-10-15', 19),
(19, 'support.png', '09:33:29.000000', '2023-10-17', 19),
(20, 'mixfruit.jpeg', '09:49:52.000000', '2023-10-17', 19),
(21, 'quality.png', '10:09:46.000000', '2023-10-17', 19),
(22, 'blackcurrentP.jpg', '15:24:14.000000', '2023-10-18', 19),
(23, 'blackcurrentP.jpg', '15:25:53.000000', '2023-10-18', 19),
(24, 'blackcurrentP.jpg', '15:28:03.000000', '2023-10-18', 19),
(25, 'blackcurrentP.jpg', '15:31:58.000000', '2023-10-18', 19),
(26, 'blackcurrentP.jpg', '15:32:26.000000', '2023-10-18', 19),
(27, 'blackcurrentP.jpg', '15:33:11.000000', '2023-10-18', 19),
(28, 'blackcurrentP.jpg', '15:33:56.000000', '2023-10-18', 19),
(29, 'blackcurrentP.jpg', '15:34:11.000000', '2023-10-18', 19),
(30, 'doublepatty.jpg', '15:34:59.000000', '2023-10-18', 19),
(31, 'doublepatty.jpg', '15:35:25.000000', '2023-10-18', 19),
(32, 'finger.jpg', '15:38:50.000000', '2023-10-18', 19),
(33, 'finger.jpg', '15:39:41.000000', '2023-10-18', 19),
(34, 'finger.jpg', '15:39:47.000000', '2023-10-18', 19),
(35, 'finger.jpg', '15:40:09.000000', '2023-10-18', 19),
(36, 'finger.jpg', '15:40:37.000000', '2023-10-18', 19),
(37, 'finger.jpg', '15:41:40.000000', '2023-10-18', 19),
(38, 'finger.jpg', '15:43:18.000000', '2023-10-18', 19),
(39, 'finger.jpg', '15:43:41.000000', '2023-10-18', 19),
(40, 'finger.jpg', '15:45:25.000000', '2023-10-18', 19),
(41, 'finger.jpg', '15:49:15.000000', '2023-10-18', 19),
(42, 'finger.jpg', '15:49:42.000000', '2023-10-18', 19),
(43, 'finger.jpg', '15:50:11.000000', '2023-10-18', 19),
(44, 'finger.jpg', '15:50:23.000000', '2023-10-18', 19),
(45, 'finger.jpg', '15:50:34.000000', '2023-10-18', 19),
(46, 'finger.jpg', '15:51:59.000000', '2023-10-18', 19),
(47, 'androidparty.png', '16:02:15.000000', '2023-10-18', 19),
(48, 'android_logo.png', '16:12:58.000000', '2023-10-18', 19),
(49, 'task_completed.png', '16:15:27.000000', '2023-10-18', 19),
(50, 'bg_compose_background.png', '16:17:41.000000', '2023-10-18', 19),
(51, 'bg_compose_background.png', '16:17:43.000000', '2023-10-18', 19),
(52, 'textured-black-background.jpg', '16:19:56.000000', '2023-10-18', 19),
(53, 'androidparty.png', '16:22:28.000000', '2023-10-18', 19),
(54, 'android_logo.png', '16:23:42.000000', '2023-10-18', 19),
(55, 'task_completed.png', '16:27:35.000000', '2023-10-18', 19),
(56, '1680615824550.jpg', '16:32:44.000000', '2023-10-18', 19),
(57, 'android_logo.png', '17:39:02.000000', '2023-10-18', 19),
(58, 'androidparty.png', '20:36:39.000000', '2023-10-19', 19);

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
(34, 8),
(35, 13),
(40, 14),
(41, 15),
(42, 16),
(43, 17),
(44, 18),
(45, 19),
(46, 20),
(47, 21),
(48, 22),
(49, 23),
(50, 24),
(51, 25),
(52, 26),
(53, 27),
(54, 28),
(55, 29),
(56, 30),
(57, 31),
(58, 32),
(59, 33),
(60, 34),
(61, 35),
(62, 36),
(63, 37),
(64, 38),
(65, 39),
(66, 40),
(67, 41),
(68, 42),
(69, 43),
(70, 44),
(71, 45),
(72, 46),
(73, 47),
(74, 48),
(75, 49),
(76, 50),
(77, 51),
(78, 52),
(79, 53),
(80, 54),
(81, 55),
(82, 56),
(83, 57),
(84, 58);

-- --------------------------------------------------------

--
-- Table structure for table `merch`
--

CREATE TABLE `merch` (
  `merchId` int(11) NOT NULL,
  `merchName` varchar(256) NOT NULL,
  `merchPrise` int(11) NOT NULL,
  `circleId` int(11) NOT NULL,
  `merchImg` varchar(256) NOT NULL,
  `sellCount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merch`
--

INSERT INTO `merch` (`merchId`, `merchName`, `merchPrise`, `circleId`, `merchImg`, `sellCount`) VALUES
(1, 'Tom And Jerry: Thinking Tom', 599, 1, '1687842433_3385347.jpg', 0),
(2, 'Looney Tunes: Hungry Taz', 599, 1, '1692456537_4282622.jpg', 0),
(3, 'Rick And Morty', 599, 1, '1677588943_8488101.jpg', 0),
(4, 'Griffindore', 599, 1, '1687421667_3304257.jpg', 0),
(5, 'Venom', 599, 1, '1692682996_2359327.jpg', 0),
(6, 'Naruto: Itachi', 599, 1, '1694178226_2656557.jpg', 0),
(7, 'Tom And Jerry: Crime', 599, 2, '1694178301_3982965.jpg', 0),
(8, 'I\'m An Engineer', 599, 2, '1694838120_6538684.jpg', 0),
(9, 'Conclusions', 599, 2, '1695358627_1908515.jpg', 0),
(10, 'Spider-Man:2029', 599, 2, '1694178388_9063738.jpg', 0),
(11, 'Society', 599, 2, '1694178186_3507628.jpg', 0),
(12, 'Miles Moralys:Logo', 599, 2, '1694178110_9192329.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `time` time(6) NOT NULL,
  `date` date NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `circleId` int(11) NOT NULL,
  `title` varchar(3000) NOT NULL,
  `content` longtext NOT NULL,
  `postType` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `time`, `date`, `user_id`, `circleId`, `title`, `content`, `postType`) VALUES
(1, '12:06:14.000000', '2022-06-11', 'max11', 1, 'why is snow white?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0),
(2, '12:06:14.000000', '2022-06-11', 'peter11', 2, 'why is moon round?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0),
(3, '26:10:11.000000', '2022-06-10', 'tom23', 1, 'what are bards?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0),
(4, '26:10:11.000000', '2022-06-10', 'john23', 2, 'what are showers?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0),
(21, '19:41:11.000000', '2023-01-27', '9', 1, 'tentative title', 'My name ins anthony gonsalvis me duniya me aakalye hu', 0),
(22, '10:33:13.000000', '2023-01-28', '9', 2, 'tentative title', '', 0),
(23, '10:33:45.000000', '2023-01-28', '9', 1, 'tentative title', 'jgh', 0),
(24, '17:16:45.000000', '2023-01-28', '9', 2, 'tentative title', 'my name is pratham gitpjos kaehrgibk rgnaiwngk', 0),
(25, '11:35:28.000000', '2023-01-30', '9', 1, 'tentative title', 'SDASFA', 0),
(26, '11:42:28.000000', '2023-02-08', '9', 2, 'tentative title', 'aerfvefa', 0),
(27, '11:43:07.000000', '2023-02-08', '9', 1, 'tentative title', 'ewf sef fesg', 0),
(28, '11:46:17.000000', '2023-02-08', '9', 2, 'tentative title', 'ewf sef fesg', 0),
(29, '11:46:55.000000', '2023-02-08', '9', 1, 'tentative title', 'fthnfh ttdnhnx', 2),
(30, '13:52:57.000000', '2023-02-08', '9', 2, 'tentative title', 'ascafef ewsf awg', 1),
(31, '13:59:20.000000', '2023-02-08', '9', 1, 'tentative title', 'i recenwrngonono mpkbrppjphskdvl lrhgl njd;jlpratuykjjaskj. samypsjy giri rexcenyler attenmfrd dh 20203,nsflvh hlg', 1),
(32, '20:26:26.000000', '2023-03-24', '9', 2, 'tentative title', 'xfbxfbxf  vvnnvn', 2),
(33, '16:14:09.000000', '2023-08-14', '9', 1, 'tentative title', 'jhrg iihs iodgb osfcjg klknfcbn kdfhfe', 0),
(34, '19:39:01.000000', '2023-08-14', '10', 2, 'tentative title', 'a memory of mine', 0),
(35, '16:46:18.000000', '2023-10-11', '19', 0, 'tentative title', '7it7i\r\nfiiy\r\n\r\ni\r\nii\r\n\r\ni\r\ni\r\ni\r\ni\r\ni\r\ni\r\ni', 0),
(36, '17:02:48.000000', '2023-10-11', '19', 0, 'tentative title', '', 0),
(37, '17:02:58.000000', '2023-10-11', '19', 0, 'tentative title', 'ljgofvnhsfo hb0th', 0),
(38, '13:25:02.000000', '2023-10-15', '19', 0, 'tentative title', 'DAFSDGKHJL;', 0),
(39, '13:41:17.000000', '2023-10-15', '19', 0, 'tentative title', 'dfasdfkghg jf k', 0),
(40, '13:42:31.000000', '2023-10-15', '19', 0, 'tentative title', 'wow', 0),
(41, '13:43:22.000000', '2023-10-15', '19', 0, 'tentative title', 'hehe', 0),
(42, '13:49:25.000000', '2023-10-15', '19', 0, 'tentative title', 'sadfgh,jk.', 0),
(43, '13:51:00.000000', '2023-10-15', '19', 0, 'tentative title', '', 0),
(44, '13:52:35.000000', '2023-10-15', '19', 0, 'tentative title', '', 0),
(45, '09:33:29.000000', '2023-10-17', '19', 0, 'tentative title', 'dfhgjhkgj', 0),
(46, '09:49:52.000000', '2023-10-17', '19', 1, 'tentative title', 'my name is cake', 0),
(47, '10:09:46.000000', '2023-10-17', '19', 1, 'tentative title', 'Hiring!!!!!', 1),
(48, '15:24:14.000000', '2023-10-18', '19', 1, 'tentative title', 'ewdfsgh,jhk.jlk/', 0),
(49, '15:25:53.000000', '2023-10-18', '19', 1, 'tentative title', 'ewdfsgh,jhk.jlk/', 0),
(50, '15:28:03.000000', '2023-10-18', '19', 1, 'tentative title', 'ewdfsgh,jhk.jlk/', 0),
(51, '15:31:58.000000', '2023-10-18', '19', 1, 'tentative title', 'ewdfsgh,jhk.jlk/', 0),
(52, '15:32:26.000000', '2023-10-18', '19', 1, 'tentative title', 'ewdfsgh,jhk.jlk/', 0),
(53, '15:33:11.000000', '2023-10-18', '19', 1, 'tentative title', 'ewdfsgh,jhk.jlk/', 0),
(54, '15:33:56.000000', '2023-10-18', '19', 1, 'tentative title', 'ewdfsgh,jhk.jlk/', 0),
(55, '15:34:11.000000', '2023-10-18', '19', 1, 'tentative title', 'ewdfsgh,jhk.jlk/', 0),
(56, '15:34:59.000000', '2023-10-18', '19', 1, 'tentative title', 'qwertyuijbvcx   aaaa', 0),
(57, '15:35:25.000000', '2023-10-18', '19', 1, 'tentative title', 'qwertyuijbvcx   aaaa', 0),
(58, '15:38:50.000000', '2023-10-18', '19', 1, 'tentative title', 'qwertyuijbvcx   aaaa', 0),
(59, '15:39:41.000000', '2023-10-18', '19', 1, 'tentative title', 'qwertyuijbvcx   aaaa', 0),
(60, '15:39:47.000000', '2023-10-18', '19', 1, 'tentative title', 'qwertyuijbvcx   aaaa', 0),
(61, '15:40:09.000000', '2023-10-18', '19', 0, 'tentative title', 'qwertyuijbvcx   aaaa', 0),
(62, '15:40:37.000000', '2023-10-18', '19', 0, 'tentative title', 'aaaaaaaaaaaaabbbbbbbbbbbbbb', 0),
(63, '15:41:40.000000', '2023-10-18', '19', 0, 'tentative title', 'qaqaqaqaqaqaqaq', 0),
(64, '15:43:18.000000', '2023-10-18', '19', 0, 'tentative title', 'qaqaqaqaqaqaqaq', 0),
(65, '15:43:41.000000', '2023-10-18', '19', 0, 'tentative title', 'qaqaqaqaqaqaqaq', 0),
(66, '15:45:25.000000', '2023-10-18', '19', 0, 'tentative title', 'v bnmnbvnb', 0),
(67, '15:49:15.000000', '2023-10-18', '19', 0, 'tentative title', 'blblblblblblblblblb', 0),
(68, '15:49:42.000000', '2023-10-18', '19', 0, 'tentative title', 'blblblblblblblblblb', 0),
(69, '15:50:11.000000', '2023-10-18', '19', 0, 'tentative title', 'qqqqqqqqwwwwwww', 0),
(70, '15:50:23.000000', '2023-10-18', '19', 0, 'tentative title', 'wewewewe', 0),
(71, '15:50:34.000000', '2023-10-18', '19', 0, 'tentative title', 'erererer', 0),
(72, '15:51:59.000000', '2023-10-18', '19', 1, 'tentative title', 'erererer', 1),
(73, '16:02:15.000000', '2023-10-18', '19', 1, 'tentative title', 'happy rakshabandhan!!', 0),
(74, '16:12:58.000000', '2023-10-18', '19', 1, 'tentative title', 'wefjgkhlij;', 0),
(75, '16:15:27.000000', '2023-10-18', '19', 1, 'tentative title', 'wqertyutuu', 0),
(76, '16:17:41.000000', '2023-10-18', '19', 1, 'tentative title', 'sdfgjlk', 0),
(77, '16:17:43.000000', '2023-10-18', '19', 1, 'tentative title', 'sdfgjlk', 0),
(78, '16:19:56.000000', '2023-10-18', '19', 1, 'tentative title', 'dsadfgkhkj', 0),
(79, '16:22:28.000000', '2023-10-18', '19', 1, 'tentative title', 'aetsrydtufyiuop', 0),
(80, '16:23:42.000000', '2023-10-18', '19', 1, 'tentative title', 'qwertyui', 0),
(81, '16:27:35.000000', '2023-10-18', '19', 1, 'tentative title', 'qwqwqw', 0),
(82, '16:32:44.000000', '2023-10-18', '19', 1, 'tentative title', 'waetrutiyou', 0),
(83, '17:39:02.000000', '2023-10-18', '19', 1, 'tentative title', 'Deep Swaroop is a land', 0),
(84, '20:36:39.000000', '2023-10-19', '19', 1, 'tentative title', 'new acchievement', 2);

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
  `circleBanner` varchar(3000) NOT NULL DEFAULT 'low_poly_banner_design_1711.jpg',
  `circleStatus` int(11) NOT NULL,
  `collegeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staticcircleinfo`
--

INSERT INTO `staticcircleinfo` (`circleId`, `circleName`, `circleLogo`, `circleDiscription`, `circleBanner`, `circleStatus`, `collegeId`) VALUES
(1, 'Naruto', '1680615824550.jpg', 'wryetufkg', 'low_poly_banner_design_1711.jpg', 0, 25),
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
  `profile_img` varchar(256) NOT NULL DEFAULT 'User_icon.png',
  `banner` varchar(256) NOT NULL DEFAULT 'low_poly_banner_design_1711.jpg',
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
(11, 'ZGVlcCBzd3Jvb3A=', 0, 'ZGVlcEBnbWFpbC5jb20=', '4c50249a3cfaa7b639f8693d0cc15021', 'User_icon.png', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0),
(12, 'QXl1c2ggVGFubmE=', 0, 'YXl1c2hAZ21haWwuY29t', '872d791d2175eaa4aada4f876933df73', 'User_icon.png', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0),
(14, 'VGVqYXMgaGFubQ==', 0, 'dGVqYXNAZ21haWwuY29t', 'dc9ac98f0f841f379c0c3c1ecc85e56a', 'User_icon.png', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0),
(16, 'YWRpdHlhIGdhbHBoYWRl', 0, 'YWRpdHlhQGdtYWlsLmNvbQ==', 'e51b2620f7b65bed95919b66168f7573', 'User_icon.png', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0),
(18, 'dXRrYXJzaCBnYWlrd2Fk', 0, 'dXRrYXJzaEBnbWFpbC5jb20=', '53a2b5b7021853cdc6cbd684e3baf0e7', 'User_icon.png', '', 'i do comady', 27, 'ECE', 2024, 'male', 21),
(19, 'RGhydXYgR3VwdGE=', 0, 'ZGhydXZAZ21haWwuY29t', 'fe30f57115a50f47746f8c12c3bbde2c', 'User_icon.png', 'low_poly_banner_design_1711.jpg', 'zsdxcfgvbhnj', 25, 'Electrical Engineering', 2024, 'male', 21),
(20, 'QXl1c2ggVGFubmE=', 0, 'dGFubmFAZ21haWwuY29t', '385ad81edd3cb6023360cfef4b46a523', 'User_icon.png', '', 'qaesrdtfygu', 25, 'Computer Science', 2024, 'male', 21),
(21, 'QXRoYXJ2IEJhbGtpc2g=', 0, 'YXRoYXJ2YUBnbWFpbC5jb20=', '0d02ba1bdc3bde610c8fcd27ae752467', 'User_icon.png', 'low_poly_banner_design_1711.jpg', 'i am a virgin', 25, 'Chemical Engineering', 2027, 'don&#039;t ', 21);

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
-- Table structure for table `threads_img_rel`
--

CREATE TABLE `threads_img_rel` (
  `post_id` int(11) NOT NULL,
  `image_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads_img_rel`
--

INSERT INTO `threads_img_rel` (`post_id`, `image_Id`) VALUES
(1, 12),
(2, 11),
(3, 10),
(4, 9);

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
-- Table structure for table `threads_posts`
--

CREATE TABLE `threads_posts` (
  `post_id` int(11) NOT NULL,
  `threadId` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(3000) NOT NULL,
  `content` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads_posts`
--

INSERT INTO `threads_posts` (`post_id`, `threadId`, `date`, `time`, `user_id`, `title`, `content`) VALUES
(1, 1, '2023-10-10', '20:39:24', 20, 'Stephan hawkins', 'Stephen William Hawking (8 January 1942 – 14 March 2018) was an English theoretical physicist, cosmologist, and author who, at the time of his death, was director of research at the Centre for Theoretical Cosmology at the University of Cambridge.[6][17][18] Between 1979 and 2009, he was the Lucasian Professor of Mathematics at Cambridge, widely viewed as one of the most prestigious academic posts in the world.'),
(2, 2, '2023-10-10', '20:39:24', 20, 'fred hoyle', 'Sir Fred Hoyle FRS (24 June 1915 – 20 August 2001)[1] was an English astronomer who formulated the theory of stellar nucleosynthesis and was one of the authors of the influential B2FH paper. He also held controversial stances on other scientific matters—in particular his rejection of the \"Big Bang\" theory (a term coined by him on BBC Radio) in favor of the \"steady-state model\", and his promotion of panspermia as the origin of life on Earth.[3][4][5] He spent most of his working life at the Institute of Astronomy at Cambridge and served as its director for six years.'),
(3, 7, '2023-10-10', '20:39:24', 20, 'J. Robert Oppenheimer', 'J. Robert Oppenheimer (born Julius Robert Oppenheimer; /ˈɒpənhaɪmər/ OP-ən-hy-mər; April 22, 1904 – February 18, 1967) was an American theoretical physicist and director of the Manhattan Project\'s Los Alamos Laboratory during World War II. He is often called the \"father of the atomic bomb\".\r\n\r\nBorn in New York City, Oppenheimer earned a bachelor of arts degree in chemistry from Harvard University in 1925 and a doctorate in physics from the University of Göttingen in Germany in 1927, where he studied under Max Born. After research at other institutions, he joined the physics department at the University of California, Berkeley, where he became a full professor in 1936. '),
(4, 8, '2023-10-10', '20:45:11', 20, 'Einstein family', 'The Einstein family is the family of physicist Albert Einstein (1879–1955). Einstein\'s great-great-great-great-grandfather, Jakob Weil, was his oldest recorded relative, born in the late 17th century, and the family continues to this day. Albert Einstein\'s great-great-grandfather, Löb Moses Sontheimer (1745–1831), was also the grandfather of the tenor Heinrich Sontheim (1820–1912) of Stuttgart.[1]\r\n\r\nAlbert\'s three children were from his relationship with his first wife, Mileva Marić, his daughter Lieserl being born a year before they married. Albert Einstein\'s second wife was Elsa Einstein, whose mother Fanny Koch was the sister of Albert\'s mother, and whose father, Rudolf Einstein, was the son of Raphael Einstein, a brother of Albert\'s paternal grandfather. Albert and Elsa were thus first cousins through their mothers and second cousins through their fathers.[2]');

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
(19, 6),
(20, 1),
(20, 4),
(20, 6),
(21, 2),
(21, 3),
(21, 8);

-- --------------------------------------------------------

--
-- Table structure for table `variablecircleinfo`
--

CREATE TABLE `variablecircleinfo` (
  `circleId` int(11) NOT NULL,
  `cMemberCount` int(255) NOT NULL,
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
(19, 0, 0),
(20, 0, 0),
(21, 0, 0);

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
-- Indexes for table `merch`
--
ALTER TABLE `merch`
  ADD PRIMARY KEY (`merchId`);

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
-- Indexes for table `threads_posts`
--
ALTER TABLE `threads_posts`
  ADD PRIMARY KEY (`post_id`);

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
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `merch`
--
ALTER TABLE `merch`
  MODIFY `merchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `threadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `threads_posts`
--
ALTER TABLE `threads_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
