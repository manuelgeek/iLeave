-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2016 at 12:54 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ileave`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`, `no`) VALUES
('Dan Makori', 'makori@yahoo.com', 'MakoriDan.,.,', 1),
('Garvon Momanyi', 'momanyigarvon@gmail.com', 'hockeygasm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
`id` int(5) NOT NULL,
  `rand` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `sday` varchar(20) NOT NULL,
  `smon` varchar(20) NOT NULL,
  `syear` varchar(20) NOT NULL,
  `zday` varchar(20) NOT NULL,
  `zmon` varchar(20) NOT NULL,
  `zyear` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `aprove` varchar(20) NOT NULL,
  `ended` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `rand`, `email`, `type`, `sday`, `smon`, `syear`, `zday`, `zmon`, `zyear`, `message`, `aprove`, `ended`) VALUES
(9, '453609', 'momanyigarvon@gmail.com', 'Maternal', '1', '1', '2016', '1', '1', '2017', 'for realy, i got twins admin', 'ACCEPT', 'STOP'),
(10, '719871', 'emashmagak@gmail.com', 'Emergency', '1', '1', '2016', '1', '1', '2017', 'geek, i am tired. code nuh run', 'REJECT', 'STOP'),
(11, '522825', 'emashmagak@gmail.com', 'Maternal', '1', '3', '2016', '14', '10', '2016', 'mi ni mngoriii', 'REJECT', 'STOP'),
(12, '514185', 'emashmagak@gmail.com', 'Maternal', '1', '4', '2016', '11', '11', '2016', 'geek manu...weweeee', 'ACCEPT', 'STOP'),
(13, '341823', 'emashmagak@gmail.com', 'Emergency', '5', '3', '2016', '16', '10', '2016', 'try this active leave', 'ACCEPT', 'STOP'),
(16, '122239', 'emashmagak@gmail.com', 'Annual', '1', '1', '2016', '1', '1', '2017', 'latest one', 'ACCEPT', 'STOP'),
(20, '284661', 'emashmagak@gmail.com', 'Sick', '1', '1', '2016', '1', '11', '2016', 'test all', 'REJECT', 'STOP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `payroll` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `phone_2` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `payroll`, `password`, `phone`, `photo`, `phone_2`, `gender`) VALUES
(6, 'Garvon Momanyi', 'momanyigarvon@gmail.com', '90765', '$2y$10$jAfhM1qeqTmC/s5h8fR6E.7kJbzx6eKZabNtTfw2ZCZmtWTYxMvra', '', '', '', ''),
(2, 'Michael Deya', 'deyam@live.com', '67890', '$2y$10$EAIqpdAQPywswIw.7noOgOpaw22KeT/rgoI1DamUyRg7ZUKxifgle', '', '', '', ''),
(3, 'Silali Gibson', 'silali@gmail.com', '54321', '$2y$10$HkLCGRaxzIltysgnDDVP4Oh5xs2DjCg7b2v2YS7Ew2Dh2sHJKdelG', '', '', '', ''),
(4, 'Humphrey Otieno', 'humphrey@yahoo.com', '56789', '$2y$10$mPGavAQndSs3FVAlVXdUP.PRS23iDQZxP5mF5JHWBW1O22qYvh2y.', '', '', '', ''),
(5, 'Magak Emmanuel', 'emashmagak@gmail.com', '12345', '$2y$10$7X.uEt9fiB0dyNxmr6le2Of379kP8F6H8j6e3jdzs/iMPNZSdIIeu', '0722334455', '143344.jpg', '0724540039', 'MALE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
