-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2017 at 01:03 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crawler`
--

-- --------------------------------------------------------

--
-- Table structure for table `crawlers`
--

DROP TABLE IF EXISTS `crawlers`;
CREATE TABLE `crawlers` (
  `crawler_id` int(11) NOT NULL,
  `crawler_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crawlers`
--

INSERT INTO `crawlers` (`crawler_id`, `crawler_name`) VALUES
(1, 'abcdefgh');

-- --------------------------------------------------------

--
-- Table structure for table `crawlers_categories`
--

DROP TABLE IF EXISTS `crawlers_categories`;
CREATE TABLE `crawlers_categories` (
  `crawler_category_id` int(11) NOT NULL,
  `crawler_category_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crawlers_categories`
--

INSERT INTO `crawlers_categories` (`crawler_category_id`, `crawler_category_name`) VALUES
(1, 'abcdefgh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crawlers`
--
ALTER TABLE `crawlers`
  ADD PRIMARY KEY (`crawler_id`);

--
-- Indexes for table `crawlers_categories`
--
ALTER TABLE `crawlers_categories`
  ADD PRIMARY KEY (`crawler_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crawlers`
--
ALTER TABLE `crawlers`
  MODIFY `crawler_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `crawlers_categories`
--
ALTER TABLE `crawlers_categories`
  MODIFY `crawler_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
