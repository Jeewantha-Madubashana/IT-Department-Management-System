-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 11:27 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_reg_no` varchar(18) NOT NULL,
  `admin_full_name` varchar(100) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_reg_no`, `admin_full_name`, `admin_email`, `admin_password`, `is_deleted`) VALUES
('001', 'B.Gajasingha', 'dir@it.com', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lec_reg_no` varchar(18) NOT NULL,
  `lec_full_name` varchar(100) NOT NULL,
  `lec_email` varchar(50) NOT NULL,
  `lec_password` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lec_reg_no`, `lec_full_name`, `lec_email`, `lec_password`, `is_deleted`) VALUES
('001', 'W.M Jayasekara', 'jayasekata@it.com', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_reg_no` varchar(50) NOT NULL,
  `stud_full_name` varchar(50) NOT NULL,
  `stud_contact_no` varchar(50) NOT NULL,
  `stud_sex` varchar(50) NOT NULL,
  `stud_address` varchar(50) NOT NULL,
  `stud_bday` varchar(50) NOT NULL,
  `stud_nic_no` varchar(50) NOT NULL,
  `stud_library_card_no` varchar(50) NOT NULL,
  `acadamic_year` varchar(50) NOT NULL,
  `current_year` varchar(50) NOT NULL,
  `track` varchar(50) DEFAULT NULL,
  `full_part` varchar(50) NOT NULL,
  `stud_email` varchar(50) NOT NULL,
  `stud_password` varchar(50) NOT NULL,
  `stud_is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_reg_no`, `stud_full_name`, `stud_contact_no`, `stud_sex`, `stud_address`, `stud_bday`, `stud_nic_no`, `stud_library_card_no`, `acadamic_year`, `current_year`, `track`, `full_part`, `stud_email`, `stud_password`, `stud_is_deleted`) VALUES
('', '', '', '', '', '', '', '', '', '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0),
('BAD-IT-2017-F-0003', 'I.P.J.M Karubarathna', '0714874141', 'Male', 'Daragala, Welimada', '1995-12-24', '953592851v', '2017/IT/3742', '2016-2017', 'First', 'Developer', 'Full', 'jmk@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
('BAD-IT-2017-F-0005', 'I.P.J.M Karubarathna', '0714874141', 'Male', 'Daragala, Welimada', '1995-12-24', '953592851v', '2017/IT/3742', '2016-2017', 'First', 'Developer', 'Full', 'jmk325@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `is_deleted`) VALUES
(8, 'Sanduni', 'Imeshika', 'sad@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0000-00-00 00:00:00', 0),
(9, 'mac', 'mac@gmail.com', 'mac@gmail.com', '347ead6348e936507920c15d2ae8266ac6ce9b49', '0000-00-00 00:00:00', 0),
(10, 'jjjjjj', 'hmjm', 'jmk@abc.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_reg_no`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lec_reg_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_reg_no`),
  ADD UNIQUE KEY `no.` (`stud_reg_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
