-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 11:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '2022-01-31 16:21:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseCode` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `courseUnit` varchar(255) DEFAULT NULL,
  `noofSeats` int(11) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCode`, `courseName`, `courseUnit`, `noofSeats`, `creationDate`, `updationDate`) VALUES
(13, 'CSE299', 'CSE 299 Junior Design Course', '1', 23, '2023-02-10 04:01:25', NULL),
(14, 'CSE327', 'CSE 327 Software Engineering', '2', 35, '2023-02-10 04:03:06', NULL),
(15, 'EEE299', 'EEE 299 Junior Design Project I', '3', 23, '2023-02-10 04:03:49', NULL),
(16, 'EEE312', 'EEE 312 Power Electronics', '4', 40, '2023-02-10 04:04:22', NULL),
(17, 'ETE299', 'ETE 299 Junior Design Project I', '5', 23, '2023-02-10 04:05:04', NULL),
(18, 'ETE331', 'ETE 331 Data Communications & Networks', '6', 35, '2023-02-10 04:05:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `enrollDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courseenrolls`
--

INSERT INTO `courseenrolls` (`id`, `studentRegno`, `pincode`, `session`, `department`, `level`, `semester`, `course`, `enrollDate`) VALUES
(9, '1', '279174', 13, 13, 1, 12, 13, '2023-02-21 05:16:59'),
(10, '2', '115999', 13, 14, 1, 12, 15, '2023-02-21 05:19:10'),
(11, '3', '665969', 13, 15, 1, 12, 17, '2023-02-21 05:19:50'),
(12, '4', '765881', 13, 13, 1, 12, 14, '2023-02-21 05:20:55'),
(13, '5', '897033', 13, 14, 1, 12, 15, '2023-02-21 05:21:40'),
(14, '12', '665197', 13, 15, 1, 12, 18, '2023-02-21 17:42:37'),
(15, '12', '665197', 13, 15, 0, 12, 17, '2023-02-23 13:27:40'),
(16, '12', '665197', 13, 15, 0, 12, 17, '2023-02-23 13:28:04'),
(17, '12', '665197', 13, 15, 0, 12, 17, '2023-02-23 13:28:28'),
(18, '2', '115999', 13, 14, 0, 12, 16, '2023-02-23 13:29:06'),
(19, '2', '115999', 13, 14, 1, 12, 16, '2023-02-23 13:30:13'),
(20, '11', '321510', 13, 14, 4, 12, 16, '2023-02-23 13:35:29'),
(21, '8', '437061', 13, 14, 6, 12, 16, '2023-03-01 07:04:48'),
(22, '1', '279174', 13, 13, 4, 12, 13, '2023-05-03 13:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `creationDate`) VALUES
(13, 'CSE', '2023-02-10 03:47:21'),
(14, 'EEE', '2023-02-10 03:47:33'),
(15, 'ETE', '2023-02-10 03:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `creationDate`) VALUES
(4, '1', '2023-02-23 13:33:47'),
(5, '2', '2023-02-23 13:41:18'),
(6, '3', '2023-02-23 13:41:20'),
(7, '4', '2023-02-23 13:41:25'),
(8, '5', '2023-02-23 13:41:27'),
(9, '6', '2023-02-23 13:41:30'),
(10, '7', '2023-02-23 13:41:32'),
(11, '8', '2023-02-23 13:41:35'),
(12, '9', '2023-02-23 13:41:38'),
(13, '10', '2023-02-23 13:41:41'),
(14, '11', '2023-02-23 13:41:43'),
(15, '12', '2023-02-23 13:41:45'),
(16, '13', '2023-02-23 13:41:48'),
(17, '14', '2023-02-23 13:41:51'),
(18, '15', '2023-02-23 13:41:53'),
(19, '16', '2023-02-23 13:41:55'),
(20, '17', '2023-02-23 13:41:58'),
(21, '18', '2023-02-23 13:42:00'),
(22, '19', '2023-02-23 13:42:03'),
(23, '20', '2023-02-23 13:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newstitle` varchar(255) DEFAULT NULL,
  `newsDescription` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newstitle`, `newsDescription`, `postingDate`) VALUES
(8, 'New Section List', 'CSE 299 Junior Design Course_Section: 1\r\nCSE 327 Software Engineering_Section: 2\r\nEEE 299 Junior Design Project I_Section 3\r\nEEE 312 Power Electronics_Section 4', '2023-02-23 13:45:18'),
(9, 'Registration ID & Pincode', 'Dear Students, your registration ID & Pincode are sent to your Main RDS', '2023-02-23 13:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `creationDate`, `updationDate`) VALUES
(12, 'Spring 2023', '2023-02-10 03:48:45', NULL),
(13, 'Summer 2023', '2023-05-03 17:52:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `creationDate`) VALUES
(13, '2023', '2023-02-10 04:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentRegno` varchar(255) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `studentName` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `cgpa` decimal(10,2) DEFAULT NULL,
  `creationdate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentRegno`, `studentPhoto`, `password`, `studentName`, `pincode`, `session`, `department`, `semester`, `cgpa`, `creationdate`, `updationDate`) VALUES
('1', '', 'c4ca4238a0b923820dcc509a6f75849b', 'Md Rahim', '279174', NULL, NULL, NULL, '3.50', '2023-02-21 05:03:47', NULL),
('10', NULL, 'd3d9446802a44259755d38e6d163e820', 'Ismam', '683801', NULL, NULL, NULL, NULL, '2023-02-21 16:51:59', NULL),
('11', NULL, '6512bd43d9caa6e02c990b0a82652dca', 'Faria Haq', '321510', NULL, NULL, NULL, NULL, '2023-02-21 16:59:56', NULL),
('12', '', 'c20ad4d76fe97759aa27a0c99bff6710', 'Kasfia Rahman', '665197', NULL, NULL, NULL, '3.20', '2023-02-21 17:11:56', NULL),
('2', '', 'c81e728d9d4c2f636f067f89cc14862c', 'Zerin Akter', '115999', NULL, NULL, NULL, '3.00', '2023-02-21 05:08:30', NULL),
('3', '', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Hasan Ali', '665969', NULL, NULL, NULL, '3.12', '2023-02-21 05:11:20', NULL),
('4', '', 'a87ff679a2f3e71d9181a67b7542122c', 'Nila Islam', '765881', NULL, NULL, NULL, '3.00', '2023-02-21 05:12:53', NULL),
('5', '', 'e4da3b7fbbce2345d7772b0674a318d5', 'Sadhin Sarkar', '897033', NULL, NULL, NULL, '3.80', '2023-02-21 05:13:44', NULL),
('6', '', '1679091c5a880faf6fb5e6087eb1b2dc', 'Manik Chowdhury', '383561', NULL, NULL, NULL, '3.90', '2023-02-21 16:03:38', NULL),
('7', '', '8f14e45fceea167a5a36dedd4bea2543', 'Jesica Akter', '365744', NULL, NULL, NULL, '3.12', '2023-02-21 16:10:12', NULL),
('8', NULL, 'c9f0f895fb98ab9159f51fd0297e236d', 'Arohi Mim', '437061', NULL, NULL, NULL, NULL, '2023-02-21 16:39:11', NULL),
('9', '', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'Bari Hasan', '871184', NULL, NULL, NULL, '2.89', '2023-02-21 16:46:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentRegno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
