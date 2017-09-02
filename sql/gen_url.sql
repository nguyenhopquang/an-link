-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: rdbms
-- Generation Time: Jul 09, 2017 at 02:59 AM
-- Server version: 5.6.36-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DB3031806`
--

-- --------------------------------------------------------

--
-- Table structure for table `gen_url`
--

CREATE TABLE IF NOT EXISTS `gen_url` (
  `id` int(11) NOT NULL,
  `facebook_user_id` bigint(20) NOT NULL,
  `post_id` text COLLATE latin1_german1_ci NOT NULL,
  `hash_url` text COLLATE latin1_german1_ci NOT NULL,
  `hashtag` text COLLATE latin1_german1_ci NOT NULL,
  `url` text COLLATE latin1_german1_ci NOT NULL,
  `short_url` text COLLATE latin1_german1_ci NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `gen_url`
--

--
-- Indexes for table `gen_url`
--
ALTER TABLE `gen_url`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
