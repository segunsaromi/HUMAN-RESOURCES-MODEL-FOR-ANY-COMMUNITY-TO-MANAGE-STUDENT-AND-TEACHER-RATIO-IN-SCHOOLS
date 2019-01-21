-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2018 at 08:20 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lagoseduboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_tbl`
--

CREATE TABLE `assign_tbl` (
  `SN` int(255) NOT NULL,
  `assign_id` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_subject` varchar(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_tbl`
--

INSERT INTO `assign_tbl` (`SN`, `assign_id`, `teacher_id`, `teacher_name`, `teacher_subject`, `school_id`, `school_name`) VALUES
(3, 'ASS94944', 'TCH41856', 'OLUWASEGUN SAROMI', 'AGRICULTURAL SCIENCE', 'SCH36212', 'SEGUN INTERNATION COMP SCHOOL'),
(4, 'ASS81830', 'TCH38360', 'HABIB SANGOTEDO', 'ENGLISH LANGUAGE', 'SCH70411', 'FUTURE PRIMARY SCHOOL ABEOKUTA'),
(6, 'ASS35611', 'TCH47582', 'FEMI ADESINA', 'PHYSICAL HEALTH EDUCATION', 'SCH36212', 'SEGUN INTERNATION COMP SCHOOL'),
(7, 'ASS94851', 'TCH44831', 'LAWAL ADEBITE', 'MATHEMATICS', 'SCH36212', 'SEGUN INTERNATION COMP SCHOOL');

-- --------------------------------------------------------

--
-- Table structure for table `school_tbl`
--

CREATE TABLE `school_tbl` (
  `SN` int(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_location` varchar(255) NOT NULL,
  `school_contact` varchar(255) NOT NULL,
  `school_address` varchar(255) NOT NULL,
  `student_population` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_tbl`
--

INSERT INTO `school_tbl` (`SN`, `school_id`, `school_name`, `school_location`, `school_contact`, `school_address`, `student_population`) VALUES
(1, 'SCH12228', 'SAINT SAVIOURS SCHOOL INT', 'IJEGUN', '09022399063', 'BLOCK 50 IJAYE HOUSING ESTATE', '12000'),
(2, 'SCH70411', 'FUTURE PRIMARY SCHOOL ABEOKUTA', 'IFAKO-IJAIYE', '23456787678', 'BLOCK 50 IJAYE HOUSING ESTATE', '300'),
(3, 'SCH36212', 'SEGUN INTERNATION COMP SCHOOL', 'AGEGE', '08022399063', 'BLOCK 50 IJAYE HOUSING ESTATE', '100');

-- --------------------------------------------------------

--
-- Table structure for table `standard_tbl`
--

CREATE TABLE `standard_tbl` (
  `SN` int(255) NOT NULL,
  `standard_id` varchar(255) NOT NULL,
  `standard_name` varchar(255) NOT NULL,
  `standard_ratio` varchar(255) NOT NULL,
  `active` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standard_tbl`
--

INSERT INTO `standard_tbl` (`SN`, `standard_id`, `standard_name`, `standard_ratio`, `active`) VALUES
(1, 'STA78195', 'WORLD', '100', 1),
(2, 'STA21489', 'LAGOS STANDARD', '200', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE `teacher_tbl` (
  `SN` int(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_contact` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_subject` varchar(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`SN`, `teacher_id`, `teacher_name`, `teacher_contact`, `teacher_email`, `teacher_subject`, `status`) VALUES
(3, 'TCH41856', 'OLUWASEGUN SAROMI', '08022399000', 'segun@gmail.com', 'AGRICULTURAL SCIENCE', 1),
(4, 'TCH38360', 'HABIB SANGOTEDO', '09876545632', 'habib@gmail.com', 'ENGLISH LANGUAGE', 1),
(5, 'TCH44831', 'LAWAL ADEBITE', '09876563254', 'lawal@gmail.com', 'MATHEMATICS', 1),
(6, 'TCH47582', 'FEMI ADESINA', '08044556789', 'femi@yahoo.com', 'PHYSICAL HEALTH EDUCATION', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'LAGB1759', 'segun_saromi@yahoo.com', '5c80565db6f29da0b01aa12522c37b32f121cbe47a861ef7f006cb22922dffa1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_tbl`
--
ALTER TABLE `assign_tbl`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `school_tbl`
--
ALTER TABLE `school_tbl`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `standard_tbl`
--
ALTER TABLE `standard_tbl`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_tbl`
--
ALTER TABLE `assign_tbl`
  MODIFY `SN` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school_tbl`
--
ALTER TABLE `school_tbl`
  MODIFY `SN` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `standard_tbl`
--
ALTER TABLE `standard_tbl`
  MODIFY `SN` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `SN` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
