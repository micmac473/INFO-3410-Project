-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2016 at 12:21 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `junktrade`
--
CREATE DATABASE IF NOT EXISTS `junktrade` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `junktrade`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `itemid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `uploaddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `itemdescription` varchar(500) NOT NULL,
  `picture` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `userid`, `uploaddate`, `itemdescription`, `picture`) VALUES
(1, 1, '2016-11-26 08:38:21', 'House', '../img/house.jpg'),
(2, 2, '2016-11-26 08:38:21', 'Plane', '../img/easy.png'),
(3, 2, '2016-11-26 08:38:42', 'Land', '../img/nomoney.png'),
(4, 6, '2016-11-26 08:38:42', 'Fork', '../img/buddy.png');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `interests` varchar(100) DEFAULT NULL,
  `tradables` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `ratingNumber` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `requester` int(11) NOT NULL,
  `requestee` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `timerequested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `requester`, `requestee`, `item`, `timerequested`) VALUES
(1, 1, 5, 'Laptop', '2016-11-26 03:22:48'),
(2, 1, 2, 'Beyond Massa', '2016-11-26 03:22:48'),
(3, 6, 1, 'Calculator', '2016-11-26 03:23:13'),
(4, 10, 1, 'Flashdrive', '2016-11-26 03:23:13'),
(5, 1, 6, 'Phone', '2016-11-26 05:13:47'),
(6, 9, 1, 'Spoon', '2016-11-26 05:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `TransactionId` int(11) NOT NULL,
  `User1` int(11) NOT NULL,
  `User2` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `contact`, `address`, `password`) VALUES
(1, 'micmcm', 'Mickel', 'McMillan', 'mickelmcmillan@email.com', '1234567', 'Milner', '6918950f89321712a8641620423d8c7d25951c0c'),
(2, 'mikmon', 'Mikael', 'Montoute', 'mikaelmontoute@email.com', '9876543', 'Diego Martin', '16331e4442209ff309047eaec83430646490f038'),
(6, 'jamtart', 'Jamal', 'Winchester', 'jamalwinchester@email.com', '4517889', 'Tobago', '0942897430e12d98c4acafc63d50b91fda44ca38'),
(7, 'fesean', 'Shamar', 'Culzuc', 'shamarculzac@email.com', '485566', 'St.Vincent', '825cce7a7af23134328ca7a872a142337e0a07fc'),
(8, 'pinky', 'Justin', 'Cadougan', 'justincadougan@email.com', '7894686', 'St.Vincent', 'f1412f80e25ec11bef07414c2cfa8c84ce3fdf23'),
(9, 'kyledef', 'Kyle', 'DeFreitas', 'kyledefreitas@email.com', '455454', 'St.Vincent', '7103a38d7b345ad9dc1e25dd3b7dd606f84d2c0c'),
(10, 'shiva', 'Shiva', 'Ramoudith', 'shiveramoudith@email.com', '47558', 'Trinidad', '848b186485107266a3807096d328690f86a22c05'),
(34, 'franny', 'Francis', 'Darius', 'francis@email.com', '1234567899', 'Florida', '63ab89682d9a027b1f5c91f6b0ed347ef7dc9ac7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratingNumber`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
