-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 08:13 PM
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
-- Database: `trms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555555, 'adminuser@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-04 06:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblquery`
--

CREATE TABLE `tblquery` (
  `id` int(11) NOT NULL,
  `teacherId` int(11) DEFAULT NULL,
  `fName` varchar(200) DEFAULT NULL,
  `emailId` varchar(200) DEFAULT NULL,
  `mobileNumber` bigint(10) DEFAULT NULL,
  `Query` mediumtext DEFAULT NULL,
  `queryDate` timestamp NULL DEFAULT current_timestamp(),
  `teacherNote` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblquery`
--

INSERT INTO `tblquery` (`id`, `teacherId`, `fName`, `emailId`, `mobileNumber`, `Query`, `queryDate`, `teacherNote`) VALUES
(4, 7, 'Zerin', 'akbar@gmail.com', 1234567891, 'a', '2023-03-05 12:32:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `ID` int(10) NOT NULL,
  `Subject` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`ID`, `Subject`, `CreationDate`) VALUES
(1, 'CSE299', '2023-03-06 12:10:19'),
(2, 'CSE327', '2023-03-06 12:10:19'),
(3, 'EEE299', '2023-03-06 12:10:19'),
(4, 'ETE299', '2023-03-06 12:10:19'),
(5, 'EEE312', '2023-03-06 12:10:19'),
(6, 'CSE331', '2023-03-06 12:10:19'),
(7, 'CSE445', '2023-03-06 12:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `ID` int(10) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Picture` varchar(200) NOT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Qualifications` varchar(120) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `TeacherSub` varchar(120) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `teachingExp` varchar(10) DEFAULT NULL,
  `JoiningDate` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `isPublic` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`ID`, `Name`, `Picture`, `Email`, `MobileNumber`, `password`, `Qualifications`, `Address`, `TeacherSub`, `description`, `teachingExp`, `JoiningDate`, `RegDate`, `isPublic`) VALUES
(7, 'MD Akbar', 'a18103f3815ef3041b17e51c600f28241678018141.jpg', 'akbar@gmail.com', 1234567891, '81dc9bdb52d04dc20036dbd8313ed055', 'Ph.D. in Computer Engineering, University of Waterloo, Canada M.A.Sc. in Computer Engineering, University of Manitoba, C', 'Dhaka', 'CSE299', 'N/A', '15', '2023-03-05', '2023-03-04 13:07:45', 1),
(8, 'Asma Aktar', 'fac79f83aa770fc24148b6e4146678141678019031.png', 'asma@gmail.com', 1234567890, '81dc9bdb52d04dc20036dbd8313ed055', 'Ph.D. in Computer Engineering, University of Waterloo, Canada ,M.Sc. in Computer Engineering, University of Manitoba, Ca', 'Dhaka', 'EEE299', 'N/A', '5', '2023-03-05', '2023-03-05 12:22:09', 1),
(9, 'MD Naimul', '61a26faa6ecfa7162e6ec0e60845eea91678019270.jpg', 'naimul@gmail.com', 1234567899, '81dc9bdb52d04dc20036dbd8313ed055', 'Ph.D. in Computer Engineering, University of Waterloo, Canada M.A.Sc. in Computer Engineering, University of Manitoba, C', 'Dhaka', 'ETE299', 'N/A', '12', '2023-03-05', '2023-03-05 12:26:10', 1),
(10, 'MD Mizan ', '4a6bb3e013a678f56747de712115a6b11678773501.jpg', 'mizan@gmail.com', 193456781, '81dc9bdb52d04dc20036dbd8313ed055', 'BSC in CSE from BUBT,MSC in CSE  from DU', 'Dhaka', 'CSE445', 'N/A', '3', '2023-03-08', '2023-03-14 05:56:03', 0),
(11, 'Md Rohan', '', 'rohan@gmail.com', 1967745032, '827ccb0eea8a706c4c34a16891f84e7b', 'BSC in CSE (Buet) ,MSC in CSE (DU)', 'Dhaka', 'CSE445', 'N/A', '5', '2023-03-15', '2023-03-14 17:04:44', 1),
(12, 'MD Habib', '', 'habib@gmail.com', 1325789054, '698d51a19d8a121ce581499d7b701668', 'Bsc,Msc,PhD', 'Uttara ,Dhaka', 'CSE445', 'N/a', '10', '2023-05-22', '2023-05-24 15:39:49', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblquery`
--
ALTER TABLE `tblquery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid` (`teacherId`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Subject` (`Subject`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `subname` (`TeacherSub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblquery`
--
ALTER TABLE `tblquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblquery`
--
ALTER TABLE `tblquery`
  ADD CONSTRAINT `tid` FOREIGN KEY (`teacherId`) REFERENCES `tblteacher` (`ID`);

--
-- Constraints for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD CONSTRAINT `subname` FOREIGN KEY (`TeacherSub`) REFERENCES `tblsubjects` (`Subject`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
