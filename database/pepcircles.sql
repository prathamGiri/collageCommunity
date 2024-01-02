-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 09:32 PM
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
-- Database: `pepcircles`
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
(19, 3),
(19, 10),
(19, 13),
(19, 18),
(19, 20),
(24, 10);

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
(1, 12, 'Member'),
(20, 19, 'Member'),
(10, 19, 'Member');

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
(28, 'Yeshwantrao Chavan College of Engineering', 'Nagpur', 'Maharashtra', 'India'),
(29, 'Indian Institute Of Management, Ahmedabad', 'Ahmedabad', 'Gujarat', 'India'),
(30, 'Indian Institute Of Technology, Bombay', 'Mumbai', 'Maharashtra', 'India');

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
(58, 'androidparty.png', '20:36:39.000000', '2023-10-19', 19),
(59, 'enrg.png', '10:09:59.000000', '2023-12-11', 19),
(60, 'pexels-cesar-perez-733745.jpg', '10:13:26.000000', '2023-12-11', 19),
(61, 'ercclub.jpg', '10:13:37.000000', '2023-12-11', 19),
(62, 'chem.png', '10:13:48.000000', '2023-12-11', 19),
(63, 'aerologo.png', '10:13:58.000000', '2023-12-11', 19),
(64, 'images.jpeg', '10:14:11.000000', '2023-12-11', 19),
(65, 'newlogo.png', '10:14:26.000000', '2023-12-11', 19),
(66, 'Logo_Eloquence - Eloquence- The Soft Skills Club of IIMA.png', '10:14:55.000000', '2023-12-11', 19),
(67, 'image - Aishwarya A Pai.png', '10:15:13.000000', '2023-12-11', 19),
(68, 'image - Aishwarya A Pai.png', '10:15:27.000000', '2023-12-11', 19),
(69, 'CLUB 3.0 LOGO - Balaji R.png', '10:15:45.000000', '2023-12-11', 19),
(70, 'Beta logo - Binaykiya Rishabh Rajkumar.jpeg', '10:15:59.000000', '2023-12-11', 19),
(71, 'Acads Council - Logo - Ajit Agrawal.png', '10:16:12.000000', '2023-12-11', 19),
(72, 'logo_dark - Gudipati Madan Kumar.png', '10:16:27.000000', '2023-12-11', 19),
(73, 'main_ccc_7Logo1657371182.png', '10:16:56.000000', '2023-12-11', 19),
(74, 'shell.png', '10:17:10.000000', '2023-12-11', 19),
(75, 'hallabol.png', '10:17:27.000000', '2023-12-11', 19),
(76, 'thinkindia.png', '10:17:41.000000', '2023-12-11', 19),
(77, 'tesla.png', '10:17:59.000000', '2023-12-11', 19),
(78, 'ivlabs.png', '12:38:03.000000', '2023-12-11', 19),
(79, 'pexels-cesar-perez-733745.jpg', '11:10:25.000000', '2023-12-16', 19),
(80, '1662798865989.jpeg', '11:11:37.000000', '2023-12-16', 19),
(81, 'shell.png', '19:09:34.000000', '2023-12-18', 19),
(82, 'shell.png', '19:09:37.000000', '2023-12-18', 19),
(83, 'shell.png', '19:09:37.000000', '2023-12-18', 19),
(84, 'shell.png', '19:09:37.000000', '2023-12-18', 19),
(85, 'shell.png', '19:09:38.000000', '2023-12-18', 19),
(86, 'shell.png', '19:09:38.000000', '2023-12-18', 19),
(87, 'shell.png', '19:09:38.000000', '2023-12-18', 19),
(88, 'shell.png', '19:09:38.000000', '2023-12-18', 19),
(89, 'shell.png', '19:09:38.000000', '2023-12-18', 19),
(90, 'shell.png', '19:09:38.000000', '2023-12-18', 19),
(91, 'shell.png', '19:09:40.000000', '2023-12-18', 19),
(92, 'shell.png', '19:09:40.000000', '2023-12-18', 19),
(93, 'shell.png', '19:09:40.000000', '2023-12-18', 19),
(94, 'shell.png', '19:09:44.000000', '2023-12-18', 19),
(95, 'shell.png', '19:09:44.000000', '2023-12-18', 19),
(96, 'shell.png', '19:09:45.000000', '2023-12-18', 19),
(97, 'shell.png', '19:09:45.000000', '2023-12-18', 19),
(98, 'shell.png', '19:09:45.000000', '2023-12-18', 19),
(99, 'shell.png', '19:09:45.000000', '2023-12-18', 19),
(100, 'shell.png', '19:09:45.000000', '2023-12-18', 19),
(101, 'shell.png', '19:09:45.000000', '2023-12-18', 19),
(102, 'shell.png', '19:09:45.000000', '2023-12-18', 19),
(103, 'shell.png', '19:09:46.000000', '2023-12-18', 19),
(104, 'shell.png', '19:09:46.000000', '2023-12-18', 19),
(105, 'shell.png', '19:09:46.000000', '2023-12-18', 19),
(106, 'shell.png', '19:09:46.000000', '2023-12-18', 19),
(107, 'shell.png', '19:09:46.000000', '2023-12-18', 19),
(108, 'shell.png', '19:09:46.000000', '2023-12-18', 19),
(109, 'shell.png', '19:09:47.000000', '2023-12-18', 19),
(110, 'shell.png', '19:09:47.000000', '2023-12-18', 19),
(111, 'shell.png', '19:09:47.000000', '2023-12-18', 19),
(112, 'shell.png', '19:09:47.000000', '2023-12-18', 19),
(113, 'shell.png', '19:09:47.000000', '2023-12-18', 19),
(114, 'shell.png', '19:09:48.000000', '2023-12-18', 19),
(115, 'pexels-cesar-perez-733745.jpg', '19:09:55.000000', '2023-12-18', 19),
(116, 'pexels-cesar-perez-733745.jpg', '19:09:56.000000', '2023-12-18', 19),
(117, 'Logo_Eloquence - Eloquence- The Soft Skills Club of IIMA.png', '19:11:44.000000', '2023-12-18', 19),
(118, '0852c825-36c.jpg', '19:13:52.000000', '2023-12-18', 19),
(119, 'aerologo.png', '19:16:14.000000', '2023-12-18', 19),
(120, '1662798865989.jpeg', '19:17:33.000000', '2023-12-18', 19),
(121, 'pexels-cesar-perez-733745.jpg', '12:52:17.000000', '2024-01-02', 19),
(122, '1662798865989.jpeg', '16:50:28.000000', '2024-01-02', 19),
(123, 'Acads Council - Logo - Ajit Agrawal.png', '16:56:58.000000', '2024-01-02', 19),
(124, 'enrg.png', '18:04:41.000000', '2024-01-02', 19),
(125, 'image - Aishwarya A Pai.png', '18:05:05.000000', '2024-01-02', 19),
(126, 'pexels-cesar-perez-733745.jpg', '21:00:32.000000', '2024-01-02', 19);

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
(84, 58),
(85, 79),
(86, 80),
(96, 121),
(97, 122),
(99, 123),
(100, 124),
(101, 125),
(102, 126);

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
(12, 'Miles Moralys:Logo', 599, 2, '1694178110_9192329.jpg', 0),
(13, 'Thinking Tom', 599, 10, '1687842433_3385347.jpg', 0),
(14, 'Looney Tunes', 599, 10, '1694838120_6538684.jpg', 0),
(15, 'Gryffindor', 599, 10, '1687421667_3304257.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `merch_order`
--

CREATE TABLE `merch_order` (
  `m_order_id` int(11) NOT NULL,
  `merchId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `size` varchar(256) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merch_order`
--

INSERT INTO `merch_order` (`m_order_id`, `merchId`, `user_id`, `size`, `qty`, `status`) VALUES
(1, 15, 19, 'xl', 1, 0),
(2, 15, 19, 's', 1, 0),
(3, 15, 19, 'm', 1, 0),
(4, 15, 19, 'm', 1, 0),
(5, 15, 19, 'l', 1, 0),
(6, 15, 19, 'm', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg_track`
--

CREATE TABLE `msg_track` (
  `post_id` int(11) NOT NULL,
  `threadId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `msg_track`
--

INSERT INTO `msg_track` (`post_id`, `threadId`, `user_id`, `is_read`) VALUES
(31, 17, 19, 1),
(32, 17, 19, 1),
(32, 17, 23, 0),
(32, 17, 24, 1),
(33, 17, 19, 1),
(33, 17, 23, 0),
(33, 17, 24, 1),
(34, 17, 19, 1),
(34, 17, 23, 0),
(34, 17, 24, 1),
(35, 17, 19, 1),
(35, 17, 23, 0),
(35, 17, 24, 1),
(36, 17, 19, 1),
(36, 17, 23, 0),
(36, 17, 24, 1),
(37, 17, 19, 1),
(37, 17, 23, 0),
(37, 17, 24, 1),
(38, 17, 19, 1),
(38, 17, 23, 0),
(38, 17, 24, 1),
(39, 17, 19, 1),
(39, 17, 23, 0),
(39, 17, 24, 1),
(40, 17, 19, 1),
(40, 17, 23, 0),
(40, 17, 24, 1),
(41, 17, 19, 1),
(41, 17, 23, 0),
(41, 17, 24, 1),
(42, 17, 19, 1),
(42, 17, 23, 0),
(42, 17, 24, 1),
(43, 17, 19, 1),
(43, 17, 23, 0),
(43, 17, 24, 1),
(44, 17, 19, 1),
(44, 17, 23, 0),
(44, 17, 24, 1),
(45, 17, 19, 1),
(45, 17, 23, 0),
(45, 17, 24, 1),
(46, 17, 19, 1),
(46, 17, 23, 0),
(46, 17, 24, 1),
(47, 17, 19, 1),
(47, 17, 23, 0),
(47, 17, 24, 1),
(48, 17, 19, 1),
(48, 17, 23, 0),
(48, 17, 24, 1),
(49, 17, 19, 1),
(49, 17, 23, 0),
(49, 17, 24, 1),
(50, 17, 19, 1),
(50, 17, 23, 0),
(50, 17, 24, 1),
(51, 17, 19, 1),
(51, 17, 23, 0),
(51, 17, 24, 1),
(52, 17, 19, 1),
(52, 17, 23, 0),
(52, 17, 24, 1),
(53, 17, 19, 1),
(53, 17, 23, 0),
(53, 17, 24, 1),
(54, 17, 19, 1),
(54, 17, 23, 0),
(54, 17, 24, 1),
(55, 17, 19, 1),
(55, 17, 23, 0),
(55, 17, 24, 1),
(56, 17, 19, 1),
(56, 17, 23, 0),
(56, 17, 24, 1),
(57, 17, 19, 1),
(57, 17, 23, 0),
(57, 17, 24, 1),
(58, 17, 19, 1),
(58, 17, 23, 0),
(58, 17, 24, 1),
(59, 17, 19, 1),
(59, 17, 23, 0),
(59, 17, 24, 1),
(60, 17, 19, 1),
(60, 17, 23, 0),
(60, 17, 24, 1),
(61, 17, 19, 1),
(61, 17, 23, 0),
(61, 17, 24, 1),
(62, 17, 19, 1),
(62, 17, 23, 0),
(62, 17, 24, 1),
(63, 17, 19, 1),
(63, 17, 23, 0),
(63, 17, 24, 1),
(64, 17, 19, 1),
(64, 17, 23, 0),
(64, 17, 24, 1),
(65, 17, 19, 1),
(65, 17, 23, 0),
(65, 17, 24, 1),
(66, 17, 19, 1),
(66, 17, 23, 0),
(66, 17, 24, 1),
(67, 17, 19, 1),
(67, 17, 23, 0),
(67, 17, 24, 1),
(68, 17, 19, 1),
(68, 17, 23, 0),
(68, 17, 24, 1),
(69, 17, 19, 1),
(69, 17, 23, 0),
(69, 17, 24, 1),
(70, 17, 19, 1),
(70, 17, 23, 0),
(70, 17, 24, 1),
(71, 17, 19, 1),
(71, 17, 23, 0),
(71, 17, 24, 1),
(72, 17, 19, 1),
(72, 17, 23, 0),
(72, 17, 24, 1),
(73, 17, 19, 1),
(73, 17, 23, 0),
(73, 17, 24, 1),
(74, 17, 19, 1),
(74, 17, 23, 0),
(74, 17, 24, 1),
(75, 17, 19, 1),
(75, 17, 23, 0),
(75, 17, 24, 1),
(76, 17, 19, 1),
(76, 17, 23, 0),
(76, 17, 24, 1),
(76, 17, 19, 1),
(76, 17, 23, 0),
(76, 17, 24, 1),
(76, 17, 19, 1),
(76, 17, 23, 0),
(76, 17, 24, 1),
(79, 17, 19, 1),
(79, 17, 23, 0),
(79, 17, 24, 1),
(79, 17, 19, 1),
(79, 17, 23, 0),
(79, 17, 24, 1),
(79, 17, 19, 1),
(79, 17, 23, 0),
(79, 17, 24, 1),
(79, 17, 19, 1),
(79, 17, 23, 0),
(79, 17, 24, 1),
(79, 17, 19, 1),
(79, 17, 23, 0),
(79, 17, 24, 1),
(79, 17, 19, 1),
(79, 17, 23, 0),
(79, 17, 24, 1),
(85, 17, 19, 1),
(85, 17, 23, 0),
(85, 17, 24, 1),
(85, 17, 19, 1),
(85, 17, 23, 0),
(85, 17, 24, 1),
(85, 17, 19, 1),
(85, 17, 23, 0),
(85, 17, 24, 1),
(88, 17, 19, 1),
(88, 17, 23, 0),
(88, 17, 24, 1),
(88, 17, 19, 1),
(88, 17, 23, 0),
(88, 17, 24, 1),
(90, 17, 19, 1),
(90, 17, 23, 0),
(90, 17, 24, 1),
(90, 17, 19, 1),
(90, 17, 23, 0),
(90, 17, 24, 1),
(90, 17, 19, 1),
(90, 17, 23, 0),
(90, 17, 24, 1),
(90, 17, 19, 1),
(90, 17, 23, 0),
(90, 17, 24, 1),
(90, 17, 19, 1),
(90, 17, 23, 0),
(90, 17, 24, 1),
(90, 17, 19, 1),
(90, 17, 23, 0),
(90, 17, 24, 1),
(90, 17, 19, 1),
(90, 17, 23, 0),
(90, 17, 24, 1),
(97, 17, 19, 1),
(97, 17, 23, 0),
(97, 17, 24, 1),
(97, 17, 19, 1),
(97, 17, 23, 0),
(97, 17, 24, 1),
(97, 17, 19, 1),
(97, 17, 23, 0),
(97, 17, 24, 1),
(97, 17, 19, 1),
(97, 17, 23, 0),
(97, 17, 24, 1),
(97, 17, 19, 1),
(97, 17, 23, 0),
(97, 17, 24, 1),
(97, 17, 19, 1),
(97, 17, 23, 0),
(97, 17, 24, 1),
(103, 17, 19, 1),
(103, 17, 23, 0),
(103, 17, 24, 1),
(103, 17, 19, 1),
(103, 17, 23, 0),
(103, 17, 24, 1),
(103, 17, 19, 1),
(103, 17, 23, 0),
(103, 17, 24, 1),
(103, 17, 19, 1),
(103, 17, 23, 0),
(103, 17, 24, 1),
(103, 17, 19, 1),
(103, 17, 23, 0),
(103, 17, 24, 1),
(108, 17, 19, 1),
(108, 17, 23, 0),
(108, 17, 24, 1),
(109, 17, 19, 1),
(109, 17, 23, 0),
(109, 17, 24, 1),
(110, 17, 19, 1),
(110, 17, 23, 0),
(110, 17, 24, 1),
(111, 17, 19, 1),
(111, 17, 23, 0),
(111, 17, 24, 1),
(112, 17, 19, 1),
(112, 17, 23, 0),
(112, 17, 24, 1),
(113, 17, 19, 1),
(113, 17, 23, 0),
(113, 17, 24, 1),
(114, 17, 19, 1),
(114, 17, 23, 0),
(114, 17, 24, 1),
(115, 17, 19, 1),
(115, 17, 23, 0),
(115, 17, 24, 1),
(116, 17, 19, 1),
(116, 17, 23, 0),
(116, 17, 24, 0),
(117, 17, 19, 1),
(117, 17, 23, 0),
(117, 17, 24, 0),
(118, 17, 19, 1),
(118, 17, 23, 0),
(118, 17, 24, 0),
(119, 17, 19, 1),
(119, 17, 23, 0),
(119, 17, 24, 0),
(120, 17, 19, 1),
(120, 17, 23, 0),
(120, 17, 24, 0),
(121, 17, 19, 1),
(121, 17, 23, 0),
(121, 17, 24, 0),
(122, 17, 19, 1),
(122, 17, 23, 0),
(122, 17, 24, 0),
(123, 17, 19, 1),
(123, 17, 23, 0),
(123, 17, 24, 0),
(124, 17, 19, 1),
(124, 17, 23, 0),
(124, 17, 24, 0);

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
(96, '12:52:17.000000', '2024-01-02', '19', 10, 'tentative title', 'happy new yeatr', 0),
(97, '16:50:28.000000', '2024-01-02', '19', 10, 'tentative title', 'happy new year guys', 0),
(98, '16:56:32.000000', '2024-01-02', '19', 10, 'tentative title', 'yo dude', 0),
(99, '16:56:58.000000', '2024-01-02', '19', 10, 'tentative title', 'qwqwqwq', 0),
(100, '18:04:41.000000', '2024-01-02', '19', 10, 'tentative title', 'Achieved a Milestone', 2),
(101, '18:05:05.000000', '2024-01-02', '19', 10, 'tentative title', 'new course added', 1),
(102, '21:00:32.000000', '2024-01-02', '19', 10, 'tentative title', 'new machines hurrey', 2);

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
  `collegeId` int(11) NOT NULL,
  `followerCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staticcircleinfo`
--

INSERT INTO `staticcircleinfo` (`circleId`, `circleName`, `circleLogo`, `circleDiscription`, `circleBanner`, `circleStatus`, `collegeId`, `followerCount`) VALUES
(10, 'S.H.E.L.L.', 'shell.png', 'S.H.E.L.L. is the Hacker Community of VNIT. This is a club where like-minded hacking enthusiasts can come together and share knowledge and mentor those looking to break into the field. If you&#039;re interested, let&#039;s get together and expand on our knowledge by cooperating in lectures, hands-on labs and group discussions about all things related to cybersecurity!', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(11, 'Halla Bol', 'hallabol.png', 'Wouldn&#039;t life be bland without drama? Halla Bol, the dramatics society of VNIT brings in your life, just the right amount of drama to spice up your life. The club has always aimed for the stars and has many conquests in its name. The club owes its success to the four pillars, namely Street, Stage, Mime and Film Making. Street brings with it the loudest voice of the society and the club as it tackles touchy and pressing issues with such fiery conviction, it leaves one pondering about the matter on hand. Stage; an act of finesse, brings forward the wide range of emotions, heart wrenching dilaogues and mesmerising set ups to the audience. And, where words fall short, actions speak out, through Mime, an art which screams talent and wonderment with each movement, be it a hand wave or a full blown somersault. When all the parameters mentioned above are recorded with camera to produce a motion picture, Film Making plays it&#039;s part. Film Making is nothing but giving an eye-friendly screen appearance to a story. Halla Bol tries the very best to give you a wholesome experience, and hopes to keep on doing so.', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(12, 'Think India', 'thinkindia.png', 'We at Think India have felt the need to bind the students with an Indian nationalistic string to harness this part of national treasure in furthering our aim of national reconstruction.Students from IISc, IIMB, NIMHANS and NLSIU joined together to create a joint forum for the students from premier institutes of India in 2006. A formal forum took placed at the Art of Living Ashram , Bengaluru in 2007.', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(13, 'TESLA', 'tesla.png', 'Tesla Club of Innovation is a club of Visvesvaraya National Institute of Technology. We are a team of aspiring engineers. We make the best of what we have. Our club is inclined towards working on innovative and new projects.', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(14, 'IvLabs', 'ivlabs.png', 'We are a group of students, pursuing our engineering dreams. IvLabs serves as a platform for students from different engineering backgrounds to collaborate and work together with utmost team spirit and avidity to bring innovative ideas into reality. Being in such an environment, young minds approach real life problems and come up with astonishing ideas, which highlights the objectives of our lab.', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(15, 'Ashlesha Astronomy Club', 'astro.png', 'We are the official Astronomy Club of VNIT Nagpur where we try to explore the horizons with the aid of our Engineering and Managing skills. From overnight stargazing to the screening of nerdy SciFis, we have hailed in every aspect to develop the interest of engineers in space and astronomy. From Studying About Astronomy , Cosmology and Astrophysics to working on Projects , It&#039;s You who will decide the limits of club. Wanna hone you amateur skills in Astronomy? Look no further you have reached your destination! Welcome to Astro Club VNIT', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(16, 'Prayas', 'prayaas.png', 'Prayaas is the social club of VNIT. We started with the motto of “ONE CAN’T HELP EVERYONE BUT EVERYONE CAN HELP SOMEONE”. We began with 10 in number in September 2006 and grew to hundreds who have come under one roof to serve the needy. Each and Every activity we do inculcates a sense of responsibility in contributing for a better society along with self development. We are engaged in activities like teaching, blood donation camps, Joy of Giving Week, NGO visits, Science Exhibition for the school students of Nagpur and many more which act as a driving force for our next move. If you think you need a platform to reach out to people and create impact, you fit in here.', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(17, 'IEEE VNIT', 'ieee.png', '​IEEE is the world’s largest technical professional organization dedicated to advancing technology for the benefit of humanity.IEEE and its members inspire a global community to innovate for a better tomorrow.We, the VNIT branch of IEEE conduct workshops ,guest lectures to encourage and inspire students towards technology .', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(18, 'ECELL VNIT', 'ecell.png', 'The Entrepreneurship Cell of VNIT is run by the students of VNIT, Nagpur inculcates entrepreneurship values and business outlook amongst its members. It aims at a holistic development of all its members through round the year events such as ‘Startup Weekend’ powered by Google for Entrepreneurs, Mozilla Web Design workshop, and ‘Jugaad!’. E-Cell also supports and incubates many startups.', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(19, 'MAG', 'mag.png', 'We’re the official Magazine Committee (or since most of you recognize us by our swanky title: mag.com, we’d prefer to use that in substitution) of VNIT. Our job includes everything from designing, editing and writing the official college magazine: Insight, to hosting and executing the literary events and to making the newsletters for the college. Work at mag.com is all about learning and having fun.(Our USP is that everyone is treated an equal at mag be it a first or final year; we don&#039;t believe in &#039;Sirs&#039; and &#039;Ma&#039;ams&#039;!)', 'low_poly_banner_design_1711.jpg', 0, 25, 0),
(21, 'Agile', 'main_ccc_7Logo1657371182.png', 'Agile- Computer &amp; Connectivity Club (CCC) takes pride in connecting and empowering people at IIMA through technology. The student-run club manages IT infrastructure on campus, builds applications &amp; websites, and debriefs innovations in the tech space. The club also undertakes activities - organizing elections, getting the best laptop deals, managing printers and systems, along with hosting fun events like gaming nights.', 'low_poly_banner_design_1711.jpg', 0, 29, 0),
(22, 'Abacus', 'logo_dark - Gudipati Madan Kumar.png', 'Analytics and AI-Foster a culture of Data-Driven problem solving through puzzles and competitions pan India &amp; promote Industry Interactions', 'low_poly_banner_design_1711.jpg', 0, 29, 0),
(23, 'ACADS COUNCIL', 'Acads Council - Logo - Ajit Agrawal.png', 'The Academic Council assists students at IIMA navigate their rigourous academic journey and acts as a liaison between students, administration, and faculty', 'low_poly_banner_design_1711.jpg', 0, 29, 0),
(24, 'Club 3.0', 'CLUB 3.0 LOGO - Balaji R.png', 'We are a group of passionate Web 3.0 enthusiasts assimilating knowledge of the next internet for IIMAWe are a group of passionate Web 3.0 enthusiasts assimilating knowledge of the next internet for IIMA', 'low_poly_banner_design_1711.jpg', 0, 29, 0),
(25, 'DECIBEL, THE MUSIC CLUB OF IIMA', 'image - Aishwarya A Pai.png', 'Everything music at IIM Ahmedabad', 'low_poly_banner_design_1711.jpg', 0, 29, 0),
(26, 'Eloquence', 'Logo_Eloquence - Eloquence- The Soft Skills Club of IIMA.png', 'We are the soft skills club of IIMA. We strive to make budding leaders great communicators, not just good speakers!', 'low_poly_banner_design_1711.jpg', 0, 29, 0),
(27, 'Web and Coding Club', '0852c825-36c.jpg', 'Web and Coding Club is one of the biggest clubs of IIT Bombay. As a part of the Institute Technical Council, we aim to provide a gateway for the people in our institute to join the coding Community. We create a platform which allows students to gain assistance and mentorship to enhance their coding ability. Our aim is to propagate the enthusiasm for coding in the institute and especially amongst freshmen. We believe that every student here at IITB should have an opportunity to learn how to code and develop a passion for it. The secret of getting ahead is getting started and we aim to provide every student with the right start.', 'low_poly_banner_design_1711.jpg', 0, 30, 0),
(28, 'Electronics and Robotics Club', '2cd8bf5c-eafb-409b-8a04-f62f94ccd58d-20604612_1755124687848245_1629621352894722960_9ULd6Hv.jpg', 'We are a club that satiates the techie you all possess! The Electronics and Robotics Club was born from the two of its parent clubs, 2017 being the year of christening.\r\n\r\nAs a club, we organize events like Hackathons, Competitions, Workshops, Group Discussions, etc. throughout the year. We also have tutorials and blogs and we are ALWAYS open for contributions.', 'low_poly_banner_design_1711.jpg', 0, 30, 0),
(29, 'Finance Club', '2cd8bf5c-eafb-409b-8a04-f62f94ccd58d-b2d616e8-fce.jpg.jpg', 'Finance Club IIT Bombay provides the students a platform to explore everything old and new in finance. We organise events and competitions related to stocks, investments, crypto-currencies, fintech etc - you name it! Whether you&#039;re looking to further improve on your finance knowledge and skills or learn from scratch, we&#039;re here for you. We&#039;ve held workshops with companies like BlackStone, Goldman Sachs, WorldQuant and gone on field trips to Bombay Stock Exchange. A few of our recent initiatives include the Equity Research Competition, Finsearch, Investimania, Cryptonite, etc.', 'low_poly_banner_design_1711.jpg', 0, 30, 0),
(30, 'Krittika', '06711b8c-711.png', 'Every one of us is amazed by the spectacle of the night sky and feels curious about its mysteries that lay hidden in plain sight. But very few follow it up as they grow up. At Krittika, we provide you an opportunity to do just that. Krittika is IIT Bombay’s focal point for amateur astronomers and casual stargazers alike.', 'low_poly_banner_design_1711.jpg', 0, 30, 0),
(31, 'Analytics club', 'c2e5e7fc-d81.jpg', 'Welcome to Analytics club, IIT Bombay! Analytics Club aims to keep the students well-aware of the possible career options related to Analytics and help them make wise decisions about their future. Analytics Club will provide students the opportunity to explore analytics through its various sessions, online activities, and workshops.', 'low_poly_banner_design_1711.jpg', 0, 30, 0),
(32, 'Aeromodelling Club', 'cededa86-63ce-4e5b-81e5-0cfcf1748631-PicsArt_05-06-06.58.58.jpg.jpg', 'Ever wondered what makes stuff airborne? Ever harboured a dream to sail to the tune of the winds?\r\n\r\nAeromodelling is a science for some, a sport for many...but for us, it is a hobby. We, at Aeromodelling Club, IIT Bombay are a group of aeromodelling and aviation enthusiasts sharing a unique passion for flying and an innate desire to push the bounds of airspace like they have never been before.\r\n\r\nCome be a part of us, to celebrate Aviation!', 'low_poly_banner_design_1711.jpg', 0, 30, 0);

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
  `age` int(11) NOT NULL,
  `last_activity_timestamp` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staticcustomerinfo`
--

INSERT INTO `staticcustomerinfo` (`user_id`, `user_name`, `mobile`, `email`, `password`, `profile_img`, `banner`, `about`, `collegeId`, `course`, `graduating_year`, `gender`, `age`, `last_activity_timestamp`) VALUES
(9, 'UHJhdGhhbSBHaXJp', 0, 'cHJhdGhhbS5naXJpMDJAZ21haWwuY29t', '164a48e142551453efaf0806a26a58ed', 'User_icon.png', '516664.jpg', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 2024, 'Male', 0, '0000-00-00 00:00:00.000000'),
(10, 'UHJhdGhhbSBHaXJp', 0, 'cHJhdGhhbUBnbWFpbC5jb20=', '164a48e142551453efaf0806a26a58ed', 'User_icon.png', '516664.jpg', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 25, '', 2024, 'Male', 0, '0000-00-00 00:00:00.000000'),
(11, 'ZGVlcCBzd3Jvb3A=', 0, 'ZGVlcEBnbWFpbC5jb20=', '4c50249a3cfaa7b639f8693d0cc15021', 'User_icon.png', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0, '0000-00-00 00:00:00.000000'),
(12, 'QXl1c2ggVGFubmE=', 0, 'YXl1c2hAZ21haWwuY29t', '872d791d2175eaa4aada4f876933df73', 'User_icon.png', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0, '0000-00-00 00:00:00.000000'),
(14, 'VGVqYXMgaGFubQ==', 0, 'dGVqYXNAZ21haWwuY29t', 'dc9ac98f0f841f379c0c3c1ecc85e56a', 'User_icon.png', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0, '0000-00-00 00:00:00.000000'),
(16, 'YWRpdHlhIGdhbHBoYWRl', 0, 'YWRpdHlhQGdtYWlsLmNvbQ==', 'e51b2620f7b65bed95919b66168f7573', 'User_icon.png', '', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0, '0000-00-00 00:00:00.000000'),
(18, 'dXRrYXJzaCBnYWlrd2Fk', 0, 'dXRrYXJzaEBnbWFpbC5jb20=', '53a2b5b7021853cdc6cbd684e3baf0e7', 'User_icon.png', '', 'i do comady', 27, 'ECE', 2024, 'male', 21, '0000-00-00 00:00:00.000000'),
(19, 'Dhruv Gupta', 0, 'ZGhydXZAZ21haWwuY29t', 'fe30f57115a50f47746f8c12c3bbde2c', 'User_icon.png', 'low_poly_banner_design_1711.jpg', 'zsdxcfgvbhnj', 25, 'Electrical Engineering', 2024, 'male', 21, '2024-01-03 01:45:41.000000'),
(20, 'QXl1c2ggVGFubmE=', 0, 'dGFubmFAZ21haWwuY29t', '385ad81edd3cb6023360cfef4b46a523', 'User_icon.png', '', 'qaesrdtfygu', 25, 'Computer Science', 2024, 'male', 21, '0000-00-00 00:00:00.000000'),
(21, 'QXRoYXJ2IEJhbGtpc2g=', 0, 'YXRoYXJ2YUBnbWFpbC5jb20=', '0d02ba1bdc3bde610c8fcd27ae752467', 'User_icon.png', 'low_poly_banner_design_1711.jpg', 'i am a virgin', 25, 'Chemical Engineering', 2027, 'don&#039;t ', 21, '0000-00-00 00:00:00.000000'),
(22, 'cHJhdGhhbSBnaXJp', 0, 'cHJhdGhhbTAyQGdtYWlsLmNvbQ==', '164a48e142551453efaf0806a26a58ed', 'User_icon.png', 'low_poly_banner_design_1711.jpg', 'hehe', 27, 'Electrical Engineering', 2025, 'male', 21, '0000-00-00 00:00:00.000000'),
(24, 'pratham giru', 0, 'Z2lydUBnbWFpbC5jb20=', '2c4584fd665342be149c7fdc8a3f0b6f', 'User_icon.png', 'low_poly_banner_design_1711.jpg', 'QWRkIGEgZGVzY3JpcHRpb24gdG8gdGVsbCB1cyBhYm91dCB5b3Vyc2VsZg==', 0, '', 0, '', 0, '2023-12-19 18:36:25.000000');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `threadId` int(11) NOT NULL,
  `circleId` int(11) NOT NULL,
  `threadName` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`threadId`, `circleId`, `threadName`, `status`) VALUES
(1, 1, 'Pain Arc', 0),
(2, 1, 'Final Arc', 0),
(3, 1, 'Chunin Exam Arc', 0),
(4, 1, 'Nine Tails Arc', 0),
(5, 2, 'Titan', 0),
(6, 2, 'Zeke and Eren', 0),
(7, 2, 'Mikasa', 0),
(8, 2, 'Armin', 0),
(10, 1, 'shipunden', 0),
(11, 1, 'shipunden', 0),
(12, 1, 'shipunden', 0),
(13, 1, 'poiuyt', 0),
(14, 1, 'blablblab', 1),
(15, 1, 'chunin exam', 1),
(16, 2, 'eren', 1),
(17, 10, 'Hackit', 0),
(18, 13, 'E-Car', 0);

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
(4, 9),
(5, 59),
(6, 60),
(7, 61),
(8, 62),
(9, 63),
(10, 64),
(11, 65),
(13, 66),
(14, 67),
(15, 68),
(16, 69),
(17, 70),
(18, 71),
(19, 72),
(20, 73),
(21, 74),
(22, 75),
(23, 76),
(24, 77),
(25, 78),
(75, 81),
(76, 82),
(76, 82),
(76, 82),
(79, 85),
(79, 85),
(79, 85),
(79, 85),
(79, 85),
(79, 85),
(85, 91),
(85, 91),
(85, 91),
(88, 94),
(88, 94),
(90, 96),
(90, 96),
(90, 96),
(90, 96),
(90, 96),
(90, 96),
(90, 96),
(97, 103),
(97, 103),
(97, 103),
(97, 103),
(97, 103),
(97, 103),
(103, 109),
(103, 109),
(103, 109),
(103, 109),
(103, 109),
(108, 114),
(109, 115),
(110, 116),
(111, 117),
(112, 118),
(114, 119),
(115, 120);

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
(19, 1),
(19, 14),
(19, 15),
(19, 16),
(19, 18),
(23, 17),
(19, 17),
(24, 17);

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
  `content` varchar(3000) NOT NULL,
  `replyTo` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads_posts`
--

INSERT INTO `threads_posts` (`post_id`, `threadId`, `date`, `time`, `user_id`, `title`, `content`, `replyTo`) VALUES
(116, 17, '2023-12-19', '15:13:10', 19, 'tentative title', 'Anyone Online', -1),
(117, 17, '2023-12-19', '15:17:39', 19, 'tentative title', 'doesnt seem like it', -1),
(118, 17, '2023-12-19', '18:46:08', 19, 'tentative title', 'wertyku', -1),
(119, 17, '2023-12-19', '18:46:37', 19, 'tentative title', 'poiuyt', -1),
(120, 17, '2023-12-19', '18:52:34', 19, 'tentative title', 'esrth', -1),
(121, 17, '2023-12-19', '18:55:36', 19, 'tentative title', 'qwerty', -1),
(122, 17, '2023-12-19', '18:55:48', 19, 'tentative title', 'poiuytr', -1),
(123, 17, '2023-12-19', '18:56:28', 19, 'tentative title', 'tgbyhbtfv', 122),
(124, 17, '2023-12-19', '19:06:59', 19, 'tentative title', 'popolili', 123);

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
(21, 8),
(22, 4),
(22, 5),
(22, 6),
(23, 4),
(23, 5),
(23, 6);

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
(21, 0, 0),
(22, 0, 0),
(23, 0, 0),
(24, 0, 0);

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
-- Indexes for table `merch_order`
--
ALTER TABLE `merch_order`
  ADD PRIMARY KEY (`m_order_id`);

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
  MODIFY `collegeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `merch`
--
ALTER TABLE `merch`
  MODIFY `merchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `merch_order`
--
ALTER TABLE `merch_order`
  MODIFY `m_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `preferenceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staticcircleinfo`
--
ALTER TABLE `staticcircleinfo`
  MODIFY `circleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `staticcustomerinfo`
--
ALTER TABLE `staticcustomerinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `threadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `threads_posts`
--
ALTER TABLE `threads_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
