-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 02:00 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtechnology`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookdb`
--

CREATE TABLE `bookdb` (
  `acc_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` int(5) NOT NULL,
  `publisher` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookdb`
--

INSERT INTO `bookdb` (`acc_no`, `title`, `author`, `edition`, `publisher`) VALUES
('109bdg2', 'A Song of Ice and Fir', 'George R. R. Martin', 3, 'Bantam Books'),
('1221bd', 'Harry Potter', 'JK Rowling', 1, 'groot'),
('bk1001', 'To Kill a Mockingbird', 'Harper Lee', 2, 'J. B. Lippincott & Co.');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(10) NOT NULL,
  `empname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `empname`, `designation`, `salary`) VALUES
(101, 'Groot', 'Manager', 20000),
(102, 'Derik_Pinto', 'Admin', 54000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookdb`
--
ALTER TABLE `bookdb`
  ADD PRIMARY KEY (`acc_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
