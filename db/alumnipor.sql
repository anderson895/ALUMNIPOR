-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 05:47 AM
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
(31, 'profile_67b4d391d99cd5.25265862.jpg', 'mariz', 'loi', 'ricalde', '2001-02-18', '{\"companyName\":\"bini1\",\"address\":\"awdawd\",\"position\":\"gfsef\",\"start\":\"esfse\"}', '\"[{\\\"companyName\\\":\\\"bini 14\\\",\\\"address\\\":\\\"wadwad\\\",\\\"position\\\":\\\"efewfes\\\",\\\"start\\\":\\\"13awdaw\\\",\\\"end\\\":\\\"dawda\\\"},{\\\"companyName\\\":\\\"bini3\\\",\\\"address\\\":\\\"awdaw\\\",\\\"position\\\":\\\"esfsef\\\",\\\"start\\\":\\\"wad\\\",\\\"end\\\":\\\"awfd\\\"}]\"', '3123123', '2013', '2014', 19, 'BSCS', 'maloi@gmail.com', '129aecc7dbcd1af97ca80fd6507297bc486e0d4ac7acb0bc8f618fbf1b36823f', 1),
(32, 'profile_67b4d391d99cd5.25265862.jpg', 'mariz', 'loi', 'ricalde', '2001-02-18', '{\"companyName\":\"bini1\",\"address\":\"awdawd\",\"position\":\"gfsef\",\"start\":\"esfse\"}', '\"[{\\\"companyName\\\":\\\"bini 14\\\",\\\"address\\\":\\\"wadwad\\\",\\\"position\\\":\\\"efewfes\\\",\\\"start\\\":\\\"13awdaw\\\",\\\"end\\\":\\\"dawda\\\"},{\\\"companyName\\\":\\\"bini3\\\",\\\"address\\\":\\\"awdaw\\\",\\\"position\\\":\\\"esfsef\\\",\\\"start\\\":\\\"wad\\\",\\\"end\\\":\\\"awfd\\\"}]\"', '3123123', '2013', '2014', 19, 'BSCS', 'maloi@gmail.com', '129aecc7dbcd1af97ca80fd6507297bc486e0d4ac7acb0bc8f618fbf1b36823f', 1);

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
(16, 'campus 1', 'awawdaw', 1, 'campus_67b5529b72ff80.21106381.jpg'),
(17, 'campus 2', 'fthtfhft', 0, 'campus_67b552a9831de9.35349753.jpg'),
(18, 'campus 3', 'awfdawfse', 0, 'campus_67b553058113f6.17984709.jpg'),
(19, 'campus 4', 'fdhdfhdth', 1, 'campus_67b5535c117e09.65316633.jpeg');

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
  MODIFY `campus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
