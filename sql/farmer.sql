-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 05:09 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `farm_users`
--

CREATE TABLE `farm_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `nick_name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sessionID` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `character_birth_day` int(11) NOT NULL,
  `character_money` float NOT NULL DEFAULT 20,
  `experience` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 1,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `dateModify` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farm_users`
--

INSERT INTO `farm_users` (`user_id`, `nick_name`, `password`, `sessionID`, `user_email`, `character_birth_day`, `character_money`, `experience`, `level`, `dateCreated`, `dateModify`) VALUES
(1, 'Valdas', '$2y$10$VVu.A0bMoegCQJ8Y8QIotuYu96s6VktfT1CsNvANHcMkFKDhLsC/q', 975200271, 'wild30973@gmail.com', 1592743711, 20, 0, 1, '2020-06-21 13:48:31', '2020-06-21 13:48:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farm_users`
--
ALTER TABLE `farm_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nick_name` (`nick_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farm_users`
--
ALTER TABLE `farm_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
