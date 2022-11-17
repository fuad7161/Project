-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 03:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(6) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `cradit` int(6) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `cradit`, `duration`, `creation_date`) VALUES
(26, 'BGE', 'CSE101', 2, '5', '2022-11-16 05:41:38'),
(28, 'Algorithm', 'CSE012', 5, '6', '2022-11-14 14:32:10'),
(29, 'CompilerDesign', 'CSE307', 3, '6', '2022-11-16 05:40:58'),
(30, 'OS', 'CSE303', 3, '6', '2022-11-16 05:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `course` varchar(30) NOT NULL,
  `batch` int(4) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `course`, `batch`, `city`, `state`, `creation_date`) VALUES
(25, 'Fuadul', 'Hasan', 'fuadul202@gmail.com', 'dsfss', 5, 'Dhakka', 'Gobra', '2022-11-14 13:49:27'),
(26, 'Fuadul', 'Hasan', 'fuadul202@gmail.com', 'DBMS', 6, 'Dhaka', 'Gobra', '2022-11-13 20:32:00'),
(27, 'amit', 'bormon', 'amit@gmail.com', 'GDT', 20, 'Dhaka', 'Gobra', '2022-11-13 21:11:43'),
(29, 'Bishowrup', 'Mollik', 'bishowrup@gmail.com', 'DS', 2018, 'Gopalganj', 'sodor', '2022-11-14 13:13:12'),
(30, 'Rony', 'Ahmed', 'rony@gmail.com', 'Algorithm', 2018, 'Chadpur', 'bora', '2022-11-14 13:14:06'),
(31, 'Banna', 'Hossen', 'banna@gmail.com', 'Data_structure', 20, 'khulna', 'gorom', '2022-11-14 14:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(6) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `course` varchar(30) NOT NULL,
  `batch` int(4) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `firstname`, `lastname`, `email`, `course`, `batch`, `city`, `state`, `creation_date`) VALUES
(26, 'fatah', 'rahman', 'fatah@gmail.com', 'BFR', 45, 'Dhaka', 'Gobra', '2022-11-13 21:13:07'),
(28, 'Fatema', 'Akter', 'fatema@gmail.com', 'SAD', 19, 'Foridpur', 'nagarkanda', '2022-11-14 14:34:36'),
(29, 'Abu', 'Bokor', 'abu@gmail.com', 'DBMS', 2018, 'Khulna', 'Chopi', '2022-11-16 05:14:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
