-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 11:43 AM
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
-- Database: `my_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL,
  `Department` varchar(30) NOT NULL,
  `pss` varchar(100) NOT NULL,
  `question` varchar(80) NOT NULL,
  `answer` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `trn_date`, `Department`, `pss`, `question`, `answer`) VALUES
(15, '1', 'Md Rahim', '2023-02-21 05:34:34', 'CSE', '1', 'what is your favorite color', 'Red'),
(16, '2', 'Zerin Akter', '2023-02-21 05:45:00', 'EEE', '2', 'what is your favorite color', 'Red'),
(17, '3', 'Hasan Ali', '2023-02-21 05:49:11', 'ETE', '3', 'what is your favorite color', 'Red'),
(18, '4', 'Nila Islam', '2023-02-21 05:52:32', 'CSE', '4', 'what is your favorite color', 'Red'),
(19, '5', 'Sadhin Sarkar', '2023-02-21 05:55:20', 'EEE', '5', 'what is your favorite color', 'Red'),
(20, '6', 'Manik Chowdhury', '2023-02-21 17:01:23', 'ETE', '6', 'what is your favorite color', 'Red'),
(21, '7', 'Jesica Akter', '2023-02-21 17:08:00', 'CSE', '7', 'what is your favorite color', 'Red'),
(22, '8', 'Arohi Mim', '2023-02-21 17:38:22', 'EEE', '8', 'what is your favorite color', 'Red'),
(23, '9', 'Bari Hasan', '2023-02-21 17:44:23', 'ETE', '9', 'what is your favorite color', 'Red'),
(24, '10', 'Ismam', '2023-02-21 17:50:31', 'CSE', '10', 'what is your favorite color', 'Red'),
(25, '11', 'Faria Haq', '2023-02-21 18:01:51', 'EEE', '11', 'what is your favorite color', 'Red'),
(26, '12', 'Kasfia Rahman', '2023-02-21 18:10:04', 'ETE', '12', 'what is your favorite color', 'Red');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
