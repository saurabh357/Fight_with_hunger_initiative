-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 02:26 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `password`, `created_at`) VALUES
(16303031, 'sumi', 'sumi@gmail.com', 'sumi@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-07-25 20:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(200) NOT NULL,
  `name` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(2, 'Educational', '2020-08-19 00:10:11'),
(3, 'Travels', '2020-08-19 10:42:39'),
(4, 'Blogs', '2020-08-19 12:52:08'),
(6, 'Sports', '2020-08-19 14:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `donners`
--

CREATE TABLE `donners` (
  `u_ID` int(200) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `Created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donners`
--

INSERT INTO `donners` (`u_ID`, `Name`, `Email`, `Username`, `Password`, `Phone`, `Address`, `City`, `Town`, `Created_at`) VALUES
(1, 'Dhaka', 'sumi@gmail.com', 'sumi', '8cb2237d0679ca88db6464eac60da96345513964', '01741563470', 'Dhaka', '', '', '0000-00-00 00:00:00.000000'),
(2, 'Dhaka', 'rubynur512@gmail.com', 'ruby', '8cb2237d0679ca88db6464eac60da96345513964', '01785686282', 'Dhaka', '', '', '0000-00-00 00:00:00.000000'),
(3, 'Uttara', 'shakila@gmail.com', 'Shakila', '7c4a8d09ca3762af61e59520943dc26494f8941b', '01753636353', 'Uttara', '', '', '0000-00-00 00:00:00.000000'),
(4, 'dhaka', 'shanta@gmail.com', 'shanta', '8cb2237d0679ca88db6464eac60da96345513964', '01744567', 'Dhaka', '', '', '0000-00-00 00:00:00.000000'),
(5, 'Dhaka', 'sakila@gmail.com', 'sakil', '8cb2237d0679ca88db6464eac60da96345513964', '907863567856468', 'Dhaka', '', '', '2020-08-18 16:18:33.132473');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `donner_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `donner_id`, `title`, `content`, `photo`, `created_at`) VALUES
(1, 2, 0, 'fghhhh', 'gygjhgjhgjh', NULL, '2020-08-19 11:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `r_id` int(200) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Town` varchar(6) NOT NULL,
  `Created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`r_id`, `Name`, `Email`, `Username`, `Password`, `Phone`, `Address`, `City`, `Town`, `Created_at`) VALUES
(1, 'Abdullahpur', 'shakila@gmail.com', 'Shakila', '8cb2237d0679ca88db6464eac60da9', '01711373266', 'Dhaka', '', '', '0000-00-00 00:00:00'),
(2, 'Bogra', 'masfiq@gmail.com', 'masfiq', '8cb2237d0679ca88db6464eac60da9', '017165893077', 'Bogora', '', '', '0000-00-00 00:00:00'),
(3, 'dhaka', 'sakila@gmail.com', 'sakila', '8cb2237d0679ca88db6464eac60da9', '01785686282', 'dhaka', '', '', '0000-00-00 00:00:00'),
(4, 'Mirpur', 'shanta@gmail.com', 'shanta', '8cb2237d0679ca88db6464eac60da9', '017655556', 'Mirpur', '', '', '0000-00-00 00:00:00'),
(5, 'dhaka', 'shuvra@gmail.com', 'shuvra', '8cb2237d0679ca88db6464eac60da9', '096543333', 'Dhaka', '', '', '0000-00-00 00:00:00'),
(6, 'Dhaka', 'sakil@gmail.com', 'sakil', '8cb2237d0679ca88db6464eac60da9', '4567889', 'Dhaka', '', '', '0000-00-00 00:00:00'),
(7, 'Dhaka', 'rufdaifa@gmail.com', 'rudaifa', '8cb2237d0679ca88db6464eac60da9', '09854345566', 'Dhaka', '', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donners`
--
ALTER TABLE `donners`
  ADD PRIMARY KEY (`u_ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16303032;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donners`
--
ALTER TABLE `donners`
  MODIFY `u_ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `r_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
