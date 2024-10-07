-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojt_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_db`
--

CREATE TABLE `faculty_db` (
  `emp_id` varchar(11) NOT NULL,
  `f_name` text NOT NULL,
  `m_name` text NOT NULL,
  `l_name` text NOT NULL,
  `dob` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `contact_no` text NOT NULL,
  `position` text NOT NULL,
  `department` text NOT NULL,
  `password` text NOT NULL,
  `profile` text NOT NULL,
  `qrcode` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_db`
--

CREATE TABLE `file_db` (
  `file_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `file_directory` text NOT NULL,
  `remarks` text NOT NULL,
  `student_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_db`
--

INSERT INTO `file_db` (`file_id`, `file_name`, `file_directory`, `remarks`, `student_id`) VALUES
(1, 'TOR part 2.pdf', '../uploaded_files/TOR part 2.pdf', 'test1', '12-00016'),
(2, 'CSE Cirt.pdf', '../uploaded_files/CSE Cirt.pdf', 'test2', '12-00016'),
(4, 'DICT Cirt.pdf', '../uploaded_files/DICT Cirt.pdf', 'Ok', '12-00016');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_db`
--

CREATE TABLE `instructor_db` (
  `emp_id` varchar(11) NOT NULL,
  `f_name` text NOT NULL,
  `m_name` text NOT NULL,
  `l_name` text NOT NULL,
  `dob` text NOT NULL,
  `sex` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `contact_no` text NOT NULL,
  `position` text NOT NULL,
  `department` text NOT NULL,
  `password` text NOT NULL,
  `profile` text NOT NULL,
  `qrcode` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_db`
--

INSERT INTO `instructor_db` (`emp_id`, `f_name`, `m_name`, `l_name`, `dob`, `sex`, `address`, `email`, `contact_no`, `position`, `department`, `password`, `profile`, `qrcode`, `status`) VALUES
('551821', 'Juan', 'P', 'Dela Cruz', '1990-06-10', 'Male', 'Kasiglahan Village Rodriguez Rizal', 'juandelacruz@gmail.com', '09938491336', 'ICS Instructor', 'ICS', 'Admin123', '../profile/school-logo.png', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student_db`
--

CREATE TABLE `student_db` (
  `student_id` varchar(11) NOT NULL,
  `f_name` text NOT NULL,
  `m_name` text NOT NULL,
  `l_name` text NOT NULL,
  `dob` text NOT NULL,
  `sex` text NOT NULL,
  `address` text NOT NULL,
  `contact_no` text NOT NULL,
  `email` text NOT NULL,
  `course` text NOT NULL,
  `institute` text NOT NULL,
  `school_year` text NOT NULL,
  `password` text NOT NULL,
  `profile` text NOT NULL,
  `qrcode` text NOT NULL,
  `assigned_instructor` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_db`
--

INSERT INTO `student_db` (`student_id`, `f_name`, `m_name`, `l_name`, `dob`, `sex`, `address`, `contact_no`, `email`, `course`, `institute`, `school_year`, `password`, `profile`, `qrcode`, `assigned_instructor`, `status`) VALUES
('12-00016', 'Apple Joy', 'E', 'Cabuquin', '1993-11-25', 'Female', 'Dela Costa V Burgos Rodriguez Rizal', '09510967511', 'applejoycabuquin@gmail.com', 'BSIT', 'ICS', '2014-2015', 'Admin123', '../profile/awra.jpg', '', '551821', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_db`
--
ALTER TABLE `faculty_db`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `file_db`
--
ALTER TABLE `file_db`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `instructor_db`
--
ALTER TABLE `instructor_db`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `student_db`
--
ALTER TABLE `student_db`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `assigned_instructor` (`assigned_instructor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_db`
--
ALTER TABLE `file_db`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_db`
--
ALTER TABLE `file_db`
  ADD CONSTRAINT `file_db_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_db` (`student_id`);

--
-- Constraints for table `student_db`
--
ALTER TABLE `student_db`
  ADD CONSTRAINT `student_db_ibfk_1` FOREIGN KEY (`assigned_instructor`) REFERENCES `instructor_db` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
