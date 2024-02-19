-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 01:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfc-blockchain`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `identity_number` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `staff_for` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `identity_number`, `type`, `staff_for`, `email`, `password`, `status`, `created_at`) VALUES
(8, '576879', 'Staff', 'Library', 'staff@email.com', '123', 10, '2023-04-17 06:10:36'),
(10, '9999', 'Admin', '', 'admin@email.com', '123', 10, '2023-04-17 06:40:39'),
(32, '1800403', 'Student', '', 'psalm@gmail.com', '12345678', 1, '2023-04-29 17:25:07'),
(34, '1801589', 'Student', '', 'pogi@email.com', '12345678', 1, '2023-05-01 14:37:31'),
(35, '1801588', 'Student', '', 'alviarmarkshandon88@gmail.com', '12345678', 1, '2023-05-01 14:55:02'),
(36, '1801599', 'Student', '', 'wilmarkbobo@gmail.com', '12345678', 3, '2023-05-01 14:56:34'),
(38, '1800530', 'Student', '', 'applelaodinio@gmail.com', '080399asd', 1, '2023-05-01 18:25:06'),
(39, '220100372', 'Student', '', 'katherinemae.laodinio@gmail.com', '08012005asd', 1, '2023-05-01 19:08:02'),
(40, '13335', 'Student', '', 'qwe@email.com', '12345678', 3, '2023-05-01 19:10:57'),
(41, '220100423', 'Student', '', 'shanleylim30@gmail.com', '11300704', 1, '2023-05-01 19:38:57'),
(42, '220100004', 'Student', '', 'andezamarkangelo@gmail.com', 'angelo19', 1, '2023-05-01 19:46:52'),
(43, '220100666', 'Student', '', 'mauiquilab1@gmail.com', 'joanah01', 1, '2023-05-01 20:21:16'),
(44, '220100791', 'Student', '', 'angel3king2006@gmail.com', 'kapetayo', 1, '2023-05-01 21:08:40'),
(45, '22010057', 'Student', '', 'reinier2obedece@gmail.com', 'cloudyusiii', 1, '2023-05-01 21:37:36'),
(46, '220100729', 'Student', '', 'emeriereyes06@gmail.com', 'emsrie123', 1, '2023-05-01 21:41:22'),
(47, '220100195', 'Student', '', 'cindyestilo146@gmail.com', 'sweetcandy_05', 1, '2023-05-01 22:32:26'),
(48, '220100497', 'Student', '', 'francynedaylelusaya@gmail.com', 'francyne', 1, '2023-05-02 06:20:38'),
(49, '220100799', 'Student', '', 'karlfajardo648@gmail.com', 'hiluxxpu903', 1, '2023-05-02 06:22:08'),
(50, '220100971', 'Student', '', 'natividadlaarni92@gmail.com', '_arninatividad', 1, '2023-05-02 06:26:28'),
(51, '220100769', 'Student', '', 'romabelsrecto@gmail.com', 'MABELCUTIE', 1, '2023-05-02 06:33:00'),
(52, '220100379', 'Student', '', 'lageraerica579@gmail.com', 'chanyeol16', 1, '2023-05-02 07:47:57'),
(53, '220100506', 'Student', '', 'joyceflores2005@gmail.com', 'zxcvbnm123', 1, '2023-05-02 07:55:28'),
(54, '220100777', 'Student', '', 'kirbyannee@gmail.com', 'kirby2006', 1, '2023-05-02 07:58:02'),
(55, '220100778', 'Student', '', 'dominicsespene@gmail.com', 'dominic1124', 1, '2023-05-02 08:08:32'),
(56, '220100667', 'Student', '', 'jjahmillacrescini24@gmail.com', '09169361', 1, '2023-05-02 08:12:13'),
(57, '220100408', 'Student', '', 'macapanasstephanie17@gmail.com', 'june1517', 1, '2023-05-02 08:18:57'),
(58, '220100695', 'Student', '', 'jhayzel.campo@gmail.com', 'jhayzel1185', 1, '2023-05-02 08:21:57'),
(59, '220100740', 'Student', '', 'samanthashaneseda@gmail.com', 'SAMANTHA444', 1, '2023-05-02 08:25:19'),
(60, '2000-1-1', 'Faculty', '', 'faculty1@email.com', '@qwerty123', 1, '2023-05-02 09:16:26'),
(61, '220100272', 'Student', '', 'jeninot06@gmail.com', 'quokka0914', 1, '2023-05-02 10:01:14'),
(62, '12489412', 'Student', '', 'sample@email.com', '12345678', 0, '2023-05-02 11:10:46'),
(63, '1801088', 'Student', '', 'mendezdiana088@gmail.com', 'SECRET12345', 1, '2023-05-02 11:59:00'),
(64, '1800411', 'Student', '', 'jennyrosemendez41@gmail.com', '12345678', 1, '2023-05-02 12:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `identity_number` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL DEFAULT '',
  `time_in` datetime NOT NULL,
  `time_out` varchar(100) NOT NULL DEFAULT '',
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `type`, `card_id`, `identity_number`, `name`, `location`, `section`, `time_in`, `time_out`, `updated_at`) VALUES
(50, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4-CPE-A-TEC101', '2023-05-02 09:38:11', '2023-05-02 09:39:16', '2023-05-02 09:39:16'),
(51, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4-CPE-A-TEC101', '2023-05-02 09:39:45', '2023-05-02 09:54:02', '2023-05-02 09:54:02'),
(52, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4-CPE-A-TEC101', '2023-05-02 09:54:17', '2023-05-02 09:54:48', '2023-05-02 09:54:48'),
(53, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4-CPE-A-TEC101', '2023-05-02 09:55:14', '2023-05-02 09:56:33', '2023-05-02 09:56:33'),
(54, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4-CPE-A-TEC101', '2023-05-02 09:57:28', '2023-05-02 09:58:02', '2023-05-02 09:58:02'),
(55, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4-CPE-A-TEC101', '2023-05-02 09:59:03', '2023-05-02 09:59:34', '2023-05-02 09:59:34'),
(56, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4-CPE-A-TEC101', '2023-05-02 09:59:39', '2023-05-02 10:00:29', '2023-05-02 10:00:29'),
(57, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4-CPE-A-TEC101', '2023-05-02 10:00:57', '2023-05-02 10:01:47', '2023-05-02 10:01:47'),
(58, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4-CPE-A-TEC101', '2023-05-02 10:02:01', '1000-01-01 00:00:00', '2023-05-02 10:02:01'),
(59, 'Student', '131111172193', '220100372', 'Laodinio Katherine Mae Calara', 'Room', 'GRADE-11---HUMSS', '2023-05-02 10:54:43', '1000-01-01 00:00:00', '2023-05-02 10:54:43'),
(60, 'Student', '3519910191', '220100423', 'Mendoza Shanley Nicole Lim', 'Room', 'GRADE-11---HUMSS', '2023-05-02 10:57:01', '1000-01-01 00:00:00', '2023-05-02 10:57:01'),
(61, 'Student', '19521841191', '220100004', 'Andeza Mark Angelo Cadag', 'Room', 'GRADE-11---HUMSS', '2023-05-02 10:57:23', '1000-01-01 00:00:00', '2023-05-02 10:57:23'),
(62, 'Student', '131165224191', '220100666', 'Quilab Ma.Joanah Nicolas', 'Room', 'GRADE-11---HUMSS', '2023-05-02 10:58:04', '1000-01-01 00:00:00', '2023-05-02 10:58:04'),
(63, 'Student', '99119171193', '220100791', 'Tatlonghari Angel Garcia', 'Room', 'GRADE-11---HUMSS', '2023-05-02 10:58:26', '2023-05-02 11:05:56', '2023-05-02 11:05:56'),
(64, 'Student', '110233193171', '22010057', 'Obedece Reinier Cartaño', 'Room', 'GRADE-11---HUMSS', '2023-05-02 10:59:05', '1000-01-01 00:00:00', '2023-05-02 10:59:05'),
(65, 'Student', '115123172193', '220100729', 'Reyes Emerie Briguel', 'Room', 'GRADE-11---HUMSS', '2023-05-02 10:59:23', '2023-05-02 11:06:10', '2023-05-02 11:06:10'),
(66, 'Student', '19315910933', '220100195', 'Estilo Cindy Legaspi', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:00:05', '1000-01-01 00:00:00', '2023-05-02 11:00:05'),
(67, 'Student', '3112157193', '220100497', 'Lusaya Francyne Dayle Janas', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:00:19', '1000-01-01 00:00:00', '2023-05-02 11:00:19'),
(68, 'Student', '19585117167', '220100799', 'Fajardo Karl Christopher -', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:00:29', '1000-01-01 00:00:00', '2023-05-02 11:00:29'),
(69, 'Student', '51189194', '220100971', 'Natividad Laarni Francisco', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:00:38', '1000-01-01 00:00:00', '2023-05-02 11:00:38'),
(70, 'Student', '6774173193', '220100769', 'Recto Romabel Padillon', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:01:07', '1000-01-01 00:00:00', '2023-05-02 11:01:07'),
(71, 'Student', '14715342192', '220100379', 'Lagera Erica Angustia', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:01:16', '1000-01-01 00:00:00', '2023-05-02 11:01:16'),
(72, 'Student', '3551214246', '220100506', 'Nantes Leila Joyce Flores', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:03:26', '2023-05-02 11:06:18', '2023-05-02 11:06:18'),
(73, 'Student', '24317420523', '220100777', 'Taban-ud Kirby Anne A', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:03:50', '2023-05-02 11:04:21', '2023-05-02 11:04:21'),
(74, 'Student', '163511194', '220100778', 'Sespeñe Jan Dominic Brillantes', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:04:32', '1000-01-01 00:00:00', '2023-05-02 11:04:32'),
(75, 'Student', '9991255190', '220100667', 'Crescini Jahmilla Aguilar', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:04:44', '1000-01-01 00:00:00', '2023-05-02 11:04:44'),
(76, 'Student', '3232141193', '220100408', 'Macapanas Stephanie Oliveros', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:04:54', '1000-01-01 00:00:00', '2023-05-02 11:04:54'),
(77, 'Student', '131104135193', '220100695', 'Romero Jhayzel Campo', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:05:05', '1000-01-01 00:00:00', '2023-05-02 11:05:05'),
(78, 'Student', '2091521733', '220100740', 'Seda Samantha Maclang', 'Room', 'GRADE-11---HUMSS', '2023-05-02 11:05:17', '1000-01-01 00:00:00', '2023-05-02 11:05:17'),
(79, 'Student', '351954059', '1800411', 'MENDEZ JENNY ROSE ANDALIS', 'Room', '4IE-A', '2023-05-02 12:28:44', '2023-05-02 12:29:26', '2023-05-02 12:29:26'),
(80, 'Student', '351954059', '1800411', 'MENDEZ JENNY ROSE ANDALIS', 'Room', '4IE-A', '2023-05-02 12:30:48', '2023-05-02 12:32:10', '2023-05-02 12:32:10'),
(81, 'Student', '351954059', '1800411', 'MENDEZ JENNY ROSE ANDALIS', 'Library', '', '2023-05-02 12:32:21', '2023-05-02 12:33:22', '2023-05-02 12:33:22'),
(82, 'Student', '351954059', '1800411', 'MENDEZ JENNY ROSE ANDALIS', 'Library', '', '2023-05-02 12:33:31', '1000-01-01 00:00:00', '2023-05-02 12:33:31'),
(83, 'Student', '17924815194', '1801088', 'MENDEZ DIANA CONRADO', 'Library', '', '2023-05-02 12:39:19', '2023-05-02 12:39:58', '2023-05-02 12:39:58'),
(84, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4CPE-A', '2023-05-06 22:15:00', '2023-05-06 22:21:59', '2023-05-06 22:21:59'),
(85, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4CPE-A', '2023-05-06 22:38:49', '2023-05-06 23:03:03', '2023-05-06 23:03:03'),
(86, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '4CPE-A', '2023-05-06 23:03:09', '2023-05-07 21:47:40', '2023-05-07 21:47:40'),
(87, 'Student', '263615125', '1800403', 'Garlan Peter Psalm Ubas', 'Room', '10CPE-A-COC101', '2023-05-07 21:47:43', '2023-05-07 21:49:54', '2023-05-07 21:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `class_id` varchar(11) DEFAULT '',
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `subject`, `content`, `type`, `class_id`, `created_by`, `created_at`) VALUES
(22, 'depens', 'may 8', 'All', '', 'Admin', '2023-05-06 18:10:17'),
(23, 'staff message', 'test', 'Student', '', 'Library Staff', '2023-05-06 18:23:05'),
(24, 'Testing', '213123', 'Student', '11', 'Faculty Test S', '2023-05-06 19:00:05'),
(25, 'test', 'test', 'Student', '12', 'Faculty Test S.', '2023-05-07 23:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `card_id` varchar(20) NOT NULL,
  `identity_number` varchar(20) DEFAULT '',
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL DEFAULT '',
  `section` varchar(50) NOT NULL DEFAULT '',
  `time_in` varchar(50) NOT NULL DEFAULT '',
  `time_out` varchar(50) NOT NULL DEFAULT '',
  `hash` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `card_id`, `identity_number`, `name`, `location`, `section`, `time_in`, `time_out`, `hash`) VALUES
(1, '263615125', '213123', 'test', 'test', 'test', 'test', 'test', '0x47badb006988e20af887759e0acdd950422dfddfe9afb75916bc4f19c7634693\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `faculty_id`, `class_name`, `created_at`) VALUES
(10, '2000-1-1', 'GRADE-11---HUMSS', '2023-05-02 09:17:50'),
(11, '2000-1-1', '4-CPE-A-TEC101', '2023-05-02 09:18:14'),
(12, '2000-1-1', '4IE-A', '2023-05-02 12:02:21'),
(13, '2000-1-1', '10CPE-A-COC101', '2023-05-07 20:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `class_members`
--

CREATE TABLE `class_members` (
  `id` int(11) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `student_number` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_members`
--

INSERT INTO `class_members` (`id`, `class_id`, `student_number`, `created_at`) VALUES
(19, '11', '1800403', '2023-05-02 09:18:34'),
(20, '10', '220100971', '2023-05-02 09:19:48'),
(21, '10', '22010057', '2023-05-02 09:19:48'),
(22, '10', '220100004', '2023-05-02 09:19:48'),
(23, '10', '220100195', '2023-05-02 09:19:48'),
(24, '10', '220100372', '2023-05-02 09:19:48'),
(25, '10', '220100379', '2023-05-02 09:19:48'),
(26, '10', '220100408', '2023-05-02 09:19:48'),
(27, '10', '220100423', '2023-05-02 09:19:48'),
(28, '10', '220100497', '2023-05-02 09:19:48'),
(29, '10', '220100666', '2023-05-02 09:19:48'),
(30, '10', '220100667', '2023-05-02 09:19:48'),
(31, '10', '220100695', '2023-05-02 09:19:48'),
(32, '10', '220100729', '2023-05-02 09:19:48'),
(33, '10', '220100740', '2023-05-02 09:19:48'),
(34, '10', '220100769', '2023-05-02 09:19:48'),
(35, '10', '220100777', '2023-05-02 09:19:48'),
(36, '10', '220100778', '2023-05-02 09:19:48'),
(37, '10', '220100791', '2023-05-02 09:19:48'),
(38, '10', '220100799', '2023-05-02 09:19:48'),
(39, '10', '220100506', '2023-05-02 09:19:48'),
(40, '12', '1801088', '2023-05-02 12:02:37'),
(41, '12', '1800411', '2023-05-02 12:23:23'),
(45, '13', '1800403', '2023-05-07 20:35:39'),
(46, '13', '1800530', '2023-05-07 20:35:39'),
(47, '13', '1801588', '2023-05-07 20:35:39'),
(48, '13', '1801599', '2023-05-07 20:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `loc` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `loc`, `created_at`) VALUES
(1, 'Room', '2023-04-21 05:17:32'),
(2, 'Library', '2023-04-21 05:17:32'),
(3, 'Clinic', '2023-04-21 05:17:45'),
(4, 'General-Assembly', '2023-04-21 12:27:22'),
(5, 'Fun-run', '2023-04-21 12:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `scanned_rfid`
--

CREATE TABLE `scanned_rfid` (
  `id` int(11) NOT NULL,
  `scanned_id` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scanned_rfid`
--

INSERT INTO `scanned_rfid` (`id`, `scanned_id`, `updated_at`) VALUES
(1, 'No card id found', '2023-05-02 12:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `rfid` varchar(20) NOT NULL DEFAULT '',
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `ylevel` varchar(20) NOT NULL DEFAULT '',
  `dep` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `rejected` int(11) NOT NULL DEFAULT 0,
  `regform` text NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_number`, `rfid`, `lname`, `fname`, `mname`, `sex`, `birthdate`, `email`, `contact`, `ylevel`, `dep`, `course`, `type`, `status`, `rejected`, `regform`, `created_at`) VALUES
(36, '1800403', '263615125', 'Garlan', 'Peter Psalm', 'Ubas', 'Male', '2000-06-05', 'psalm@gmail.com', '09060554094', '4th', 'College of Engineering', 'BS in Computer Engineering', 'Student', 2, 0, '/uploaded/644ce273a5c2f-1800403-registration_form.pdf', '2023-04-29 17:25:07'),
(38, '1801589', '', 'shan', 'pogi', 'alviar', 'Male', '4214-11-12', 'pogi@email.com', '1241241', '4th', 'College of Computing Studies', 'BS in Information Technology', 'Student', 1, 0, '/uploaded/644f5e2bd44cb-1801589-registration_form.pdf', '2023-05-01 14:37:31'),
(39, '1801588', '', 'alviar', 'mark shandon', 'suarez', 'Male', '1998-11-28', 'alviarmarkshandon88@gmail.com', '09065784165', '4th', 'College of Engineering', 'BS in Computer Engineering', 'Student', 1, 0, '/uploaded/644f62461b05e-1801588-registration_form.pdf', '2023-05-01 14:55:02'),
(40, '1801599', '', 'castillo', 'wilmark', 'aguilar', 'Male', '1241-12-04', 'wilmarkbobo@gmail.com', '124124', '4th', 'College of Engineering', 'BS in Computer Engineering', 'Student', 3, 1, '/uploaded/644f62a220a01-1801599-registration_form.pdf', '2023-05-01 14:56:34'),
(41, '124124', '', 'shan', 'bae', 'hantonio', 'Male', '1111-11-11', 'hantonio@email.com', '1241241', '4th', 'College of Education', 'Bachelor of Elementary Education', 'Student', 3, 1, '/uploaded/644f9124b2f02-124124-registration_form.pdf', '2023-05-01 18:15:00'),
(42, '1800530', '', 'Laodinio', 'Apple Sheryl', 'Calara', 'Female', '1999-08-03', 'applelaodinio@gmail.com', '09066237465', '4th', 'College of Engineering', 'BS in Computer Engineering', 'Student', 1, 0, '/uploaded/644f9382a5844-1800530-registration_form.pdf', '2023-05-01 18:25:06'),
(43, '220100372', '131111172193', 'Laodinio', 'Katherine Mae', 'Calara', 'Female', '2005-01-08', 'katherinemae.laodinio@gmail.com', '09198367148', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/644f9d9263c0f-220100372-registration_form.pdf', '2023-05-01 19:08:02'),
(44, '13335', '', 'Fdfhh', 'Fgbvv', 'Fhhb', 'Male', '2023-04-12', 'qwe@email.com', '123456789', 'Grade 11', 'PNC-SHS', 'HUMSS', 'Student', 3, 1, '/uploaded/644f9e41721aa-13335-registration_form.pdf', '2023-05-01 19:10:57'),
(45, '220100423', '3519910191', 'Mendoza', 'Shanley Nicole', 'Lim', 'Female', '2004-08-30', 'shanleylim30@gmail.com', '09956509998', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/644fa4d1b19f4-220100423-registration_form.pdf', '2023-05-01 19:38:57'),
(46, '220100004', '19521841191', 'Andeza', 'Mark Angelo', 'Cadag', 'Male', '2005-09-19', 'andezamarkangelo@gmail.com', '09305237897', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/644fa6ac3ee54-220100004-registration_form.pdf', '2023-05-01 19:46:52'),
(47, '220100666', '131165224191', 'Quilab', 'Ma.Joanah', 'Nicolas', 'Female', '2006-01-01', 'mauiquilab1@gmail.com', '9263676469', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/644faebc9553f-220100666-registration_form.pdf', '2023-05-01 20:21:16'),
(48, '220100791', '99119171193', 'Tatlonghari', 'Angel', 'Garcia', 'Male', '2006-06-20', 'angel3king2006@gmail.com', '9691642773', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/644fb9d8c1665-220100791-registration_form.pdf', '2023-05-01 21:08:40'),
(49, '22010057', '110233193171', 'Obedece', 'Reinier', 'Cartaño', 'Male', '2006-06-14', 'reinier2obedece@gmail.com', '09469157553', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/644fc0a068841-22010057-registration_form.pdf', '2023-05-01 21:37:36'),
(50, '220100729', '115123172193', 'Reyes', 'Emerie', 'Briguel', 'Female', '2006-05-13', 'emeriereyes06@gmail.com', '09706510719', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/644fc1821d550-220100729-registration_form.pdf', '2023-05-01 21:41:22'),
(51, '220100195', '19315910933', 'Estilo', 'Cindy', 'Legaspi', 'Female', '2005-06-05', 'cindyestilo146@gmail.com', '09398144990', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/644fcd7a2e87c-220100195-registration_form.pdf', '2023-05-01 22:32:26'),
(52, '220100497', '3112157193', 'Lusaya', 'Francyne Dayle', 'Janas', 'Female', '2005-09-26', 'francynedaylelusaya@gmail.com', '09273972456', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/64503b36692bc-220100497-registration_form.pdf', '2023-05-02 06:20:38'),
(53, '220100799', '19585117167', 'Fajardo', 'Karl Christopher', '-', 'Male', '2005-10-05', 'karlfajardo648@gmail.com', '09393183085', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/64503b90be9ed-220100799-registration_form.pdf', '2023-05-02 06:22:08'),
(54, '220100971', '51189194', 'Natividad', 'Laarni', 'Francisco', 'Female', '2005-12-10', 'natividadlaarni92@gmail.com', '09565630533', 'Grade 11', 'College of Arts and Sciences', 'BS in Psychology', 'Student', 2, 0, '/uploaded/64503c949a0a4-220100971-registration_form.pdf', '2023-05-02 06:26:28'),
(55, '220100769', '6774173193', 'Recto', 'Romabel', 'Padillon', 'Female', '2006-10-04', 'romabelsrecto@gmail.com', '09163316430', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/64503e1c5b738-220100769-registration_form.pdf', '2023-05-02 06:33:00'),
(56, '220100379', '14715342192', 'Lagera', 'Erica', 'Angustia', 'Female', '2005-09-16', 'lageraerica579@gmail.com', '09154670425', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/64504fad7649f-220100379-registration_form.pdf', '2023-05-02 07:47:57'),
(57, '220100506', '3551214246', 'Nantes', 'Leila Joyce', 'Flores', 'Female', '2005-10-15', 'joyceflores2005@gmail.com', '09632289799', 'Grade 11', 'CI-TECH', 'STEM', 'Student', 2, 0, '/uploaded/64505170375bc-220100506-registration_form.pdf', '2023-05-02 07:55:28'),
(58, '220100777', '24317420523', 'Taban-ud', 'Kirby Anne', 'A', 'Female', '2006-05-18', 'kirbyannee@gmail.com', '09287744716', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/6450520acde51-220100777-registration_form.pdf', '2023-05-02 07:58:02'),
(59, '220100778', '163511194', 'Sespeñe', 'Jan Dominic', 'Brillantes', 'Male', '2005-11-24', 'dominicsespene@gmail.com', '09935129968', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/6450548009c76-220100778-registration_form.pdf', '2023-05-02 08:08:32'),
(60, '220100667', '9991255190', 'Crescini', 'Jahmilla', 'Aguilar', 'Male', '2006-10-24', 'jjahmillacrescini24@gmail.com', '09169361663', 'Grade 11', 'PNC-SHS', 'HUMSS', 'Student', 2, 0, '/uploaded/6450555d53a7e-220100667-registration_form.pdf', '2023-05-02 08:12:13'),
(61, '220100408', '3232141193', 'Macapanas', 'Stephanie', 'Oliveros', 'Female', '2006-06-15', 'macapanasstephanie17@gmail.com', '09755410323', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/645056f175e5b-220100408-registration_form.pdf', '2023-05-02 08:18:57'),
(62, '220100695', '131104135193', 'Romero', 'Jhayzel', 'Campo', 'Female', '2005-11-08', 'jhayzel.campo@gmail.com', '09084847003', 'Grade 11', 'PNC-SHS', 'HUMSS', 'Student', 2, 0, '/uploaded/645057a595ea3-220100695-registration_form.pdf', '2023-05-02 08:21:57'),
(63, '220100740', '2091521733', 'Seda', 'Samantha', 'Maclang', 'Female', '2006-05-02', 'samanthashaneseda@gmail.com', '09303916540', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 2, 0, '/uploaded/6450586f5a8b8-220100740-registration_form.pdf', '2023-05-02 08:25:19'),
(64, '2000-1-1', '', 'Faculty', 'Test', 'Sample', 'Male', '2000-05-06', 'faculty1@email.com', '092222221', '', 'College of Engineering', '', 'Faculty', 1, 0, '', '2023-05-02 09:16:26'),
(65, '220100272', '', 'GUARDIAN', 'PRINCESS JEN', 'INOT', 'Female', '2006-06-06', 'jeninot06@gmail.com', '09065767797', 'Grade 11', 'CI-TECH', 'HUMSS', 'Student', 1, 0, '/uploaded/64506eea7bc84-220100272-registration_form.pdf', '2023-05-02 10:01:14'),
(66, '12489412', '', 'sample', 'alviar', 'sssj', 'Male', '1998-02-11', 'sample@email.com', '123213213', 'Grade 12', 'CI-TECH', 'STEM', 'Student', 0, 0, '/uploaded/64507f36b83ff-12489412-registration_form.pdf', '2023-05-02 11:10:46'),
(67, '1801088', '17924815194', 'MENDEZ', 'DIANA', 'CONRADO', 'Female', '1999-06-02', 'mendezdiana088@gmail.com', '09610005874', '4th', 'College of Engineering', 'BS in Industrial Engineering', 'Student', 2, 0, '/uploaded/64508a841a792-1801088-registration_form.pdf', '2023-05-02 11:59:00'),
(68, '1800411', '351954059', 'MENDEZ', 'JENNY ROSE', 'ANDALIS', 'Male', '1999-11-12', 'jennyrosemendez41@gmail.com', '09352926719', '4th', 'College of Engineering', 'BS in Industrial Engineering', 'Student', 2, 0, '/uploaded/64508ed45adae-1800411-registration_form.pdf', '2023-05-02 12:17:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_members`
--
ALTER TABLE `class_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scanned_rfid`
--
ALTER TABLE `scanned_rfid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class_members`
--
ALTER TABLE `class_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scanned_rfid`
--
ALTER TABLE `scanned_rfid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
