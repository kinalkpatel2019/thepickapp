-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2020 at 12:25 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thetickapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `content` text NOT NULL,
  `adminuser_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `content`, `adminuser_id`, `created_at`) VALUES
(1, 'Nice Poster', '<p>Hello,</p><p><br></p><p>All member from thi akasksakd</p><p>Thanks</p>', 1, '2020-05-10 03:07:32'),
(2, 'Nice Poster', '<p>Hello,</p><p><br></p><p><b>Keyur Patel</b>&nbsp;here</p><p><br></p><p>Thx</p>', 1, '2020-05-10 03:07:58'),
(3, 'Greetings From Me', '<p>Hello,</p><p>All This is your Market manager Speaking!<br></p>', 3, '2020-05-17 03:45:27'),
(4, 'Sample Test Message to all Consumer', '<p>Hello,</p><p>All consumer,</p><p><br></p><p>This is just a sample message from admin!....<br></p>', 1, '2020-05-26 23:44:09'),
(5, 'A message from Market Manager', '<p>Hello,</p><p><br></p><p>This is your market manager. </p><p>Thanks.<br></p>', 6, '2020-05-26 23:52:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
