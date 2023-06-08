-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 11:38 AM
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
-- Database: `uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70'),
(3, 'admin1', '6172');

-- --------------------------------------------------------

--
-- Table structure for table `attn`
--

CREATE TABLE `attn` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `atten` varchar(50) NOT NULL,
  `at_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attn`
--

INSERT INTO `attn` (`id`, `st_id`, `atten`, `at_date`) VALUES
(244, 12, 'present', '2023-02-09'),
(245, 12, 'present', '2023-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `at_student`
--

CREATE TABLE `at_student` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `st_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `at_student`
--

INSERT INTO `at_student` (`id`, `name`, `st_id`) VALUES
(36, 'Zerin', 12);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `education` varchar(100) DEFAULT NULL,
  `contact` int(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `username`, `password`, `name`, `email`, `birthday`, `gender`, `education`, `contact`, `address`) VALUES
(14, 'akbar', '81dc9bdb52d04dc20036dbd8313ed055', 'Md Akbar', 'akbar@gmail.com', '1984-01-12', 'Male', 'BSc in CSE from North South University', 1234567891, 'Dhaka'),
(15, 'hasan12', '202cb962ac59075b964b07152d234b70', 'Md Hasan', 'hasan@gmail.com', '1985-01-21', 'Male', 'MSc in EEE from North South University', 1234567891, 'Dhaka'),
(16, 'ak', '1234', 'Md Ak', 'ak@gmail.com', '1987-01-01', 'Male', 'BSc in CSE from North South University', 1234567891, 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `marks` int(5) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `st_id`, `marks`, `sub`, `semester`) VALUES
(71, 12, 93, 'CSE299', '1st'),
(76, 12, 82, 'CSE327', '2nd'),
(77, 1, 93, 'CSE327', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `st_info`
--

CREATE TABLE `st_info` (
  `st_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `program` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `st_info`
--

INSERT INTO `st_info` (`st_id`, `name`, `password`, `email`, `bday`, `program`, `contact`, `gender`, `address`, `img`) VALUES
(1, 'Md Rahim', 'c4ca4238a0b923820dcc509a6f75849b', 'r@gmail.com', '1995-01-01', 'CSE', '1234567891', 'Male', 'Dhaka', 'E529A818-8075-C917-DE9B-A40D122B9593.png'),
(2, 'Zerin Akter', 'c81e728d9d4c2f636f067f89cc14862c', 'z@gmail.com', '1999-01-21', 'EEE', '1122334456', 'Female', 'Dhaka', 'A48637F4-C18B-AF60-6AB7-35D2ED01AB6A.png'),
(3, 'Hasan Ali', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'h@gmail.com', '1998-12-02', 'ETE', '9901910101', 'Male', 'Dhaka', '5A44C2F3-178C-C1AA-07D5-847F77CC1E5A.png'),
(4, 'Nila Islam', 'a87ff679a2f3e71d9181a67b7542122c', 'n@gmail.com', '1998-08-04', 'CSE', '1122334450', 'Female', 'Dhaka', 'BA824E8D-ADDD-D3BD-1200-5F6BE083730B.png'),
(5, 'Sadhin Sarkar', 'e4da3b7fbbce2345d7772b0674a318d5', 's@gmail.com', '1997-04-14', 'EEE', '1122334459', 'Male', 'Dhaka', 'C0FB8DA0-45E7-B435-3B08-60D89E78C184.png'),
(6, 'Manik Chowdhury', '1679091c5a880faf6fb5e6087eb1b2dc', 'm@gmail.com', '1998-09-18', 'ETE', '1122334054', 'Male', 'Dhaka', '4D3243A8-359D-7313-C137-B8079B1CB476.png'),
(7, 'Jesica Akter', '8f14e45fceea167a5a36dedd4bea2543', 'j@gmail.com', '1998-07-02', 'CSE', '1234567891', 'Female', 'Dhaka', '973CB152-EB53-F037-9CB7-40A506693AAF.png'),
(8, 'Arohi Mim', 'c9f0f895fb98ab9159f51fd0297e236d', 'a@gmail.com', '1999-01-14', 'EEE', '1122334411', 'Female', 'Dhaka', 'C0C912B8-ADC3-0585-D5AA-A1FEA78B864A.jpg'),
(9, 'Bari Hasan', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'b@gmail.com', '1999-08-23', 'ETE', '1122334045', 'Male', 'Dhaka', 'EE972E60-617F-15E8-9F72-FFABD2F55753.jpg'),
(10, 'Ismam ', 'd3d9446802a44259755d38e6d163e820', 'i@gmail.com', '1998-01-01', 'CSE', '1122334400', 'Male', 'Dhaka', '68EBEB05-F036-B845-6AAF-3CC3591F0953.jpg'),
(11, 'Faria Haq', '6512bd43d9caa6e02c990b0a82652dca', 'f@gmail.com', '1999-10-21', 'EEE', '9901910100', 'Female', 'Dhaka', '51FA8ABE-64F8-7738-B572-3C8D90D88E41.jpg'),
(12, 'Kasfia Rahman', 'c20ad4d76fe97759aa27a0c99bff6710', 'k@gmail.com', '1998-05-14', 'ETE', '1122334540', 'Female', 'Dhaka', '5ED54CC5-382D-E89A-1601-24D704CBC2C9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attn`
--
ALTER TABLE `attn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `at_student`
--
ALTER TABLE `at_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_info`
--
ALTER TABLE `st_info`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attn`
--
ALTER TABLE `attn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `at_student`
--
ALTER TABLE `at_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
