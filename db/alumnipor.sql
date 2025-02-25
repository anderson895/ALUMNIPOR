-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 05:04 AM
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
-- Database: `alumnipor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(60) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_fullname` varchar(60) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_fullname`, `admin_status`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Gian Dela Rosa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumni_id` int(11) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `mname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) NOT NULL,
  `bday` date NOT NULL,
  `current_work` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`current_work`)),
  `previous_work` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`previous_work`)),
  `student_no` text NOT NULL,
  `year_enrolled` varchar(60) NOT NULL,
  `year_graduated` varchar(60) NOT NULL,
  `campus` int(11) NOT NULL,
  `course` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=deleted,1=existing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `profile_picture`, `fname`, `mname`, `lname`, `bday`, `current_work`, `previous_work`, `student_no`, `year_enrolled`, `year_graduated`, `campus`, `course`, `email`, `password`, `status`) VALUES
(30, 'profile_67b542fc35fdb0.45857716.jpg', 'jane', '', 'de leon', '2000-02-12', '{\"companyName\":\"GMA\",\"address\":\"awdawdawdaw\",\"position\":\"artist\",\"start\":\"july\"}', '\"[{\\\"companyName\\\":\\\"abs\\\",\\\"address\\\":\\\"awdawdawdwad\\\",\\\"position\\\":\\\"artist\\\",\\\"start\\\":\\\"aug\\\",\\\"end\\\":\\\"dec\\\"},{\\\"companyName\\\":\\\"tv5\\\",\\\"address\\\":\\\"awda\\\",\\\"position\\\":\\\"singer\\\",\\\"start\\\":\\\"may\\\",\\\"end\\\":\\\"jun\\\"},{\\\"companyName\\\":\\\"company 3\\\",\\\"address\\\":\\\"sta.rosa 2\\\",\\\"position\\\":\\\"awdawd\\\",\\\"start\\\":\\\"dawd\\\",\\\"end\\\":\\\"fthtf\\\"}]\"', 'scawfdaw', '2015', '2020', 16, 'BSIT', 'janedel@gmail.com', '7017b9b076dee3755d8ef8d61bae230f131a46cd27373d7608a942d9cb6bdfea', 1),
(31, 'profile_67b4d391d99cd5.25265862.jpg', 'mariz', 'loi', 'ricalde', '2001-02-18', '{\"companyName\":\"bini1\",\"address\":\"awdawd\",\"position\":\"gfsef\",\"start\":\"esfse\"}', '\"[{\\\"companyName\\\":\\\"bini 14\\\",\\\"address\\\":\\\"wadwad\\\",\\\"position\\\":\\\"efewfes\\\",\\\"start\\\":\\\"13awdaw\\\",\\\"end\\\":\\\"dawda\\\"},{\\\"companyName\\\":\\\"bini3\\\",\\\"address\\\":\\\"awdaw\\\",\\\"position\\\":\\\"esfsef\\\",\\\"start\\\":\\\"wad\\\",\\\"end\\\":\\\"awfd\\\"}]\"', '3123123', '2013', '2014', 19, 'BSCS', 'maloi@gmail.com', '129aecc7dbcd1af97ca80fd6507297bc486e0d4ac7acb0bc8f618fbf1b36823f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_id` int(11) NOT NULL,
  `campus_name` varchar(60) NOT NULL,
  `campus_description` text NOT NULL,
  `campus_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=deleted,1=existing',
  `campus_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_id`, `campus_name`, `campus_description`, `campus_status`, `campus_image`) VALUES
(16, 'Polytechnic University of the Philippines - San Juan', 'Established in 2008, this campus is located in Addition Hills, San Juan City', 1, 'campus_67b5529b72ff80.21106381.jpg'),
(17, 'campus 2', 'fthtfhft', 0, 'campus_67b552a9831de9.35349753.jpg'),
(18, 'campus 3', 'awfdawfse', 0, 'campus_67b553058113f6.17984709.jpg'),
(19, 'Sta. Mesa, Manila', 'fdhdfhdth', 0, 'campus_67b5535c117e09.65316633.jpeg'),
(21, 'PUP Main - A. Mabini Campus, Sta. Mesa, Manila', 'A. Mabini This is the main campus of the University located at Sta. Mesa, Manila. Here you can find the offices of the University Executive Officials, the Ninoy Aquino Library and Learning Resources Center, the PUP Pylon, PUP Gym and open courts, PUP Grandstand and Oval, the Obelisk, Nemesio E. Prudente Freedom Park, A. Mabini Shrine, Lagoon, Laboratory High School, Interfaith Chapel, Charlie del Rosario Student Development Center, the Amphitheater and various academic program offices.', 1, 'campus_67bd3f10e604a1.17860144.jpg'),
(22, 'Polytechnic University of the Philippines - Parañaque', 'Bachelor of Science in Computer Engineering (BSCpE) Bachelor of Science in Hospitality Management (BSHM) Bachelor of Science in Information Technology (BSIT) Bachelor of Science in Office Administration (BSOA) Diploma in Office Management Technology Legal Office Management (DOMTLOM)', 1, 'campus_67bd4008ddd854.63730365.jpg'),
(23, 'Polytechnic University of the Philippines (PUP Mulanay, Quez', 'The second branch located in the Quezon province.', 1, 'campus_67bd40441c7b68.67472340.jpg'),
(24, 'Polytechnic University of the Philippines (Biñan Campus)', 'The PUP Binan Campus was established through a Memorandum of Agreement between the Municipality of Biñan and the Polytechnic University of the Philippines on September 15, 2009.  It endeavors to provide a transformative education that will serve as a significant avenue for life-altering experiences, fulfilling every student’s dream of becoming a professional in the fields of information technology, education, social science, business, and engineering.  PUP Biñan, at its core, commits to inculcating in students appropriate values, molding them into responsible citizens who would contribute significantly to the community and society.', 1, 'campus_67bd40cf195491.96827897.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `campus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
