-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 02:33 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `M_Id` int(10) NOT NULL,
  `RollNo` varchar(50) DEFAULT NULL,
  `Msg` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`M_Id`, `RollNo`, `Msg`, `Date`, `Time`) VALUES
(39, '1', 'Your Registration no: 1 and Pincode: 279174. Password is same as your RDS', '2023-02-21', '11:05:24'),
(40, '2', 'Your Registration no: 2 and Pincode: 115999. Password is same as your RDS', '2023-02-21', '11:10:38'),
(41, '3', 'Your Registration no: 3 and Pincode: 665969. Password is same as your RDS', '2023-02-21', '11:12:12'),
(42, '4', 'Your Registration no: 4 and Pincode: 	765881. Password is same as your RDS', '2023-02-21', '11:13:25'),
(43, '5', 'Your Registration no: 5 and Pincode: 897033. Password is same as your RDS', '2023-02-21', '11:14:16'),
(44, '6', 'Your Registration no: 6 and Pincode: 383561. Password is same as your RDS', '2023-02-21', '22:04:54'),
(45, '6', 'Your Registration no: 6 and Pincode: 383561. Password is same as your RDS', '2023-02-21', '22:10:22'),
(46, '7', 'Your Registration no: 7 and Pincode: 365744. Password is same as your RDS', '2023-02-21', '22:10:55'),
(47, '8', 'Your Registration no: 8 and Pincode: 437061. Password is same as your RDS', '2023-02-21', '22:40:04'),
(48, '9', 'Your Registration no: 9 and Pincode: 871184. Password is same as your RDS', '2023-02-21', '22:46:53'),
(49, '10', 'Your Registration no: 10 and Pincode: 683801. Password is same as your RDS', '2023-02-21', '22:52:56'),
(50, '11', 'Your Registration no: 11 and Pincode: 321510. Password is same as your RDS', '2023-02-21', '23:01:23'),
(51, '12', 'Your Registration no: 12 and Pincode: 665197. Password is same as your RDS', '2023-02-21', '23:12:25'),
(52, '1', '1', '2023-06-06', '18:06:54'),
(53, '2', '2', '2023-06-06', '18:25:24'),
(54, '1', 'hi', '2023-06-06', '18:27:23'),
(55, '2', 'hi', '2023-06-06', '18:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `RollNo` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `MobNo` bigint(11) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`RollNo`, `Name`, `Type`, `Category`, `EmailId`, `MobNo`, `Password`) VALUES
('1', 'Md Rahim', 'Student', NULL, 'r@gmail.com', 123456789, '1'),
('10', 'Ismam', 'Student', NULL, 'i@gmail.com', 1122334400, '10'),
('11', 'Faria Haq', 'Student', NULL, 'f@gmail.com', 9901910100, '11'),
('12', 'Kasfia Rahman', 'Student', NULL, 'k@gmail.com', 1122334540, '12'),
('2', 'Zerin Akter', 'Student', NULL, 'z@gmail.com', 1122334456, '2'),
('3', 'Hasan Ali', 'Student', NULL, 'h@gmail.com', 9901910101, '3'),
('4', 'Nila Islam', 'Student', NULL, 'n@gmail.com', 1122334450, '4'),
('5', 'Sadhin Islam', 'Student', NULL, 's@gmail.com', 1122334459, '5'),
('6', 'Manik Chowdhury', 'Student', NULL, 'm@gmail.com', 1122334054, '6'),
('7', 'Jesica Akter', 'Student', NULL, 'j@gmail.com', 123456789, '7'),
('70', 'Md ', 'Student', NULL, 'st@gmail.com', 123456700, '70'),
('8', 'Arohi Mim', 'Student', NULL, 'a@gmail.com', 1122334411, '8'),
('9', 'Bari Hasan', 'Student', NULL, 'b@gmail.com', 1122334045, '9'),
('ADMIN', 'admin', 'Admin', NULL, 'admin@gmail.com', 123456789, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`M_Id`),
  ADD KEY `RollNo` (`RollNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`RollNo`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `M_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
