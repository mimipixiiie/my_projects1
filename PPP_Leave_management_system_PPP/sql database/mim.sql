-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2017 at 06:13 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `Admin_Username` varchar(100) DEFAULT NULL,
  `Admin_Password` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `Admin_Username`, `Admin_Password`, `status`) VALUES
(1, 'a', 'a', 0);

-- --------------------------------------------------------



--
-- Table structure for table `employee_application`
--

CREATE TABLE `employee_application` (
  `id` int(11) NOT NULL,
  `Employee_Id` varchar(100) DEFAULT NULL,
  `cause` varchar(100) DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `LeaveStatus` varchar(50) DEFAULT NULL,
  `Status_Approve_Or_Not` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_application`
--

INSERT INTO `employee_application` (`id`, `Employee_Id`, `cause`, `ToDate`, `FromDate`, `LeaveStatus`, `Status_Approve_Or_Not`) VALUES
(5, '11', 'sickleave', '2017-07-29', '2017-07-27', '0', '0'),
(6, '1', 'sickleave', '2017-07-29', '2017-07-26', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee_database`
--

CREATE TABLE `employee_database` (
  `id` int(11) NOT NULL,
  `Employee_Id` varchar(100) DEFAULT NULL,
  `Security_Id` varchar(100) DEFAULT NULL,
  `Employee_Name` varchar(100) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `breaks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_database`
--

INSERT INTO `employee_database` (`id`, `Employee_Id`, `Security_Id`, `Employee_Name`, `Designation`, `password`, `status`, `breaks`) VALUES
(1, '11', '11', 'ewu', 'developer', NULL, 0, -1),
(2, '1', '1', '11', 'a', '1', 1, 16);

-- --------------------------------------------------------

--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `employee_application`
--
ALTER TABLE `employee_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_database`
--
ALTER TABLE `employee_database`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee_application`
--
ALTER TABLE `employee_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee_database`
--
ALTER TABLE `employee_database`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
