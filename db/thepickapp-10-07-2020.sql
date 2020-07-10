-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2020 at 11:58 AM
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
-- Database: `thepickapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

DROP TABLE IF EXISTS `adminusers`;
CREATE TABLE IF NOT EXISTS `adminusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `initial` varchar(2) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `accounttype` tinyint(4) NOT NULL COMMENT '1:admin,2:marketmanager',
  `status` tinyint(4) NOT NULL COMMENT '1:active,2:inactive',
  `markets` text DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `firstname`, `lastname`, `initial`, `email`, `password`, `accounttype`, `status`, `markets`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'The', 'PickApp', 'MD', 'admin@example.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, NULL, NULL, '2020-07-01 05:38:50', '2020-07-01 11:08:50'),
(8, 'Alice', 'Barnes', 'AB', 'ryv084hx5u@temporary-mail.net', 'f5f75389bdbeddbbd70ac31c0245e42e', 2, 1, '16,15', NULL, '2020-07-10 06:31:29', '2020-07-10 12:01:29'),
(9, 'Corey', 'Kruger', 'CK', 'frtjdeb80ea@temporary-mail.net', '3e066ccb0a54b36764895eff53ed687c', 2, 1, '13', NULL, '2020-07-10 01:03:45', '2020-07-10 06:33:45'),
(10, 'Venus', 'Parsons', 'VP', '5164lss9t58@temporary-mail.net', '9fdb3416d18a8becdd9039ff4bbc7674', 2, 1, '14,12', NULL, '2020-07-10 01:06:35', '2020-07-10 06:36:35'),
(11, 'Mary', 'Franke', 'MF', '3h8ifngflmy@temporary-mail.net', '354696898536312c465fba2a2ca39308', 2, 1, '11', NULL, '2020-07-10 01:08:58', '2020-07-10 06:38:58'),
(12, 'Dara', 'Phelps', 'DP', 'wal05hdgqhf@temporary-mail.net', '48e43487a37959b98d9eccef335bcf44', 2, 1, '10,9', NULL, '2020-07-10 01:11:39', '2020-07-10 06:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `businesstypes`
--

DROP TABLE IF EXISTS `businesstypes`;
CREATE TABLE IF NOT EXISTS `businesstypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1:active,2:inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesstypes`
--

INSERT INTO `businesstypes` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Prepared Foods', 1, '2020-04-20 15:44:13', '0000-00-00 00:00:00'),
(2, 'Foods', 1, '2020-04-20 15:51:24', '2020-04-20 21:21:24'),
(3, 'Wines', 1, '2020-04-20 15:44:57', '0000-00-00 00:00:00'),
(4, 'Others', 1, '2020-04-20 15:45:04', '0000-00-00 00:00:00'),
(5, 'Test Business', 1, '2020-05-10 18:12:46', '2020-05-10 23:42:46'),
(6, 'Edit Sample Category', 1, '2020-05-10 18:19:27', '2020-05-10 23:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bagel', 'bagel', 1, '2020-04-21 12:29:13', '0000-00-00 00:00:00'),
(2, 'Drinks', 'Drinks', 1, '2020-04-21 12:29:18', '0000-00-00 00:00:00'),
(3, 'Art', 'Art', 1, '2020-04-21 12:29:23', '0000-00-00 00:00:00'),
(4, 'Wrap', 'Wrap', 1, '2020-04-21 12:29:28', '0000-00-00 00:00:00'),
(5, 'Sweets', 'Sweets', 1, '2020-04-21 12:29:33', '0000-00-00 00:00:00'),
(6, 'Others', 'Others', 1, '2020-04-21 12:29:37', '0000-00-00 00:00:00'),
(7, 'Fruit', 'Fruit', 1, '2020-07-10 07:22:32', '0000-00-00 00:00:00'),
(8, 'Vegetable', 'Vegetable', 1, '2020-07-10 07:22:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `description` text DEFAULT NULL,
  `discount_type` tinyint(4) NOT NULL COMMENT '1:fixed,2:pecentage',
  `amount` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `vendor_id`, `code`, `description`, `discount_type`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'abcd', 'this is a simple text code', 1, 10, 1, '2020-04-26 11:43:32', '2020-04-26 17:13:32'),
(2, 4, 'tony', 'here is the new code', 2, 5, 1, '2020-04-26 10:57:03', '2020-04-26 16:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `availableqty` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `unit`, `price`, `availableqty`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, '6 KG/BAG', 25, 3, 1, '2020-05-16 12:31:18', '2020-05-16 18:01:18'),
(2, 3, 'BAG', 10, 19, 1, '2020-04-24 12:06:42', '2020-04-24 17:36:42'),
(3, 3, 'BTL', 10, 13, 1, '2020-05-10 11:37:28', '2020-05-10 17:07:28'),
(5, 3, '4 BTL/BAG', 25, 1, 1, '2020-05-10 06:41:51', '2020-05-10 12:11:51'),
(6, 3, '15 BTL/BAG', 13, 0, 1, '2020-04-24 12:06:42', '2020-04-24 17:36:42'),
(7, 5, '10 .5BU/BAG', 13, 0, 1, '2020-06-15 10:24:58', '2020-06-15 15:54:58'),
(8, 6, '.5BU', 5, 8, 1, '2020-06-15 11:27:53', '2020-06-15 16:57:53'),
(9, 6, '.5BU', 15, 122, 1, '2020-06-15 11:27:53', '2020-06-15 16:57:53'),
(10, 7, 'KG', 10, 45, 1, '2020-05-27 17:48:56', '2020-05-27 23:18:56'),
(11, 8, '.5BU', 200, 2, 1, '2020-07-01 06:14:58', '2020-07-01 11:44:58'),
(12, 9, '.5DZ', 133, 5, 1, '2020-07-06 09:32:39', '2020-07-06 15:02:39'),
(13, 10, 'BTL', 23, 4, 1, '2020-07-06 10:17:04', '2020-07-06 15:47:04'),
(14, 11, '.5BU', 20, 100, 1, '2020-07-10 04:05:00', '2020-07-10 09:35:00'),
(15, 12, '.5DZ', 10, 150, 1, '2020-07-10 04:07:29', '2020-07-10 09:37:29'),
(16, 13, 'BTL', 20, 150, 1, '2020-07-10 04:09:36', '2020-07-10 09:39:36'),
(17, 14, '10 KG/BOX', 10, 200, 1, '2020-07-10 04:18:30', '2020-07-10 09:48:30'),
(18, 15, 'KG', 30, 250, 1, '2020-07-10 04:29:36', '2020-07-10 09:59:36'),
(19, 16, 'KG', 10, 260, 1, '2020-07-10 04:31:54', '2020-07-10 10:01:54'),
(20, 17, '15 KG/BOX', 20, 159, 1, '2020-07-10 04:34:57', '2020-07-10 10:04:57'),
(21, 18, '.5BU', 20, 147, 1, '2020-07-10 04:37:16', '2020-07-10 10:07:16'),
(22, 19, '.5BU', 10, 148, 1, '2020-07-10 04:43:20', '2020-07-10 10:13:20'),
(23, 20, '56 KG/BOX', 20, 100, 1, '2020-07-10 05:37:19', '2020-07-10 11:07:19'),
(24, 22, 'KG', 10, 120, 1, '2020-07-10 05:40:17', '2020-07-10 11:10:17'),
(25, 23, '10 .5DZ/BAG', 25, 10, 1, '2020-07-10 06:01:19', '2020-07-10 11:31:19'),
(26, 24, '259 KG/BOX', 215, 10, 1, '2020-07-10 06:02:43', '2020-07-10 11:32:43'),
(27, 27, '58 KG/BOX', 125, 120, 1, '2020-07-10 06:24:01', '2020-07-10 11:54:01'),
(28, 28, '.5DZ', 14, 58, 1, '2020-07-10 06:25:04', '2020-07-10 11:55:04'),
(29, 29, 'KG', 10, 125, 1, '2020-07-10 06:26:38', '2020-07-10 11:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `marketimings`
--

DROP TABLE IF EXISTS `marketimings`;
CREATE TABLE IF NOT EXISTS `marketimings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `market_id` int(11) NOT NULL,
  `day` tinyint(4) NOT NULL,
  `openingtime` time DEFAULT NULL,
  `closingtime` time DEFAULT NULL,
  `slotinterval` int(11) DEFAULT NULL,
  `slotlimit` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketimings`
--

INSERT INTO `marketimings` (`id`, `market_id`, `day`, `openingtime`, `closingtime`, `slotinterval`, `slotlimit`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '09:00:00', '18:00:00', 15, 15, 1, '0000-00-00 00:00:00', '2020-06-15 16:54:45'),
(2, 5, 2, '09:00:00', '18:00:00', 15, 20, 1, '0000-00-00 00:00:00', '2020-06-15 16:55:15'),
(3, 5, 3, '09:00:00', '18:00:00', 30, 10, 1, '0000-00-00 00:00:00', '2020-06-15 16:54:58'),
(4, 5, 4, '09:00:00', '18:00:00', 15, 20, 0, '0000-00-00 00:00:00', '2020-06-15 16:55:02'),
(5, 5, 5, '09:00:00', '18:00:00', 45, 5, 0, '0000-00-00 00:00:00', '2020-06-15 16:55:06'),
(6, 5, 6, '09:00:00', '18:00:00', 15, 5, 0, '0000-00-00 00:00:00', '2020-06-15 16:55:09'),
(7, 5, 7, '09:00:00', '18:00:00', 15, 7, 0, '0000-00-00 00:00:00', '2020-06-15 16:55:12'),
(8, 1, 1, '09:00:00', '18:00:00', 15, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 2, '09:00:00', '18:00:00', 15, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 3, '09:00:00', '18:00:00', 15, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 4, '09:00:00', '18:00:00', 15, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 5, '09:00:00', '18:00:00', 15, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 6, '09:00:00', '18:00:00', 15, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 5, 7, '09:00:00', '18:00:00', 15, 0, 1, '0000-00-00 00:00:00', '2020-06-15 16:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `marketpopups`
--

DROP TABLE IF EXISTS `marketpopups`;
CREATE TABLE IF NOT EXISTS `marketpopups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketpopups`
--

INSERT INTO `marketpopups` (`id`, `vendor_id`, `market_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 5, '<p><b style=\"\"><font color=\"#ffffff\" style=\"background-color: rgb(255, 0, 102);\">Hello,</font></b></p><p><b style=\"\"><font color=\"#ffffff\" style=\"background-color: rgb(255, 0, 102);\">The order will be placed through the market and you need to pick up the items.&nbsp;</font></b></p>', 1, '2020-06-11 11:20:01', '2020-06-11 16:50:01'),
(2, 4, 4, '<p>sddasd</p>', 1, '2020-06-09 12:04:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

DROP TABLE IF EXISTS `markets`;
CREATE TABLE IF NOT EXISTS `markets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `location` text DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fee` double NOT NULL DEFAULT 5,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `title`, `status`, `location`, `lat`, `lng`, `image`, `description`, `fee`, `created_at`, `updated_at`) VALUES
(11, 'Grand Central Market', 1, 'New York, NY, USA', '40.7127753', '-74.0059728', '5f0808a1b6420.jpg', 'Great selection of anything you need right in grand central station - commuters can bring home dinner to cook or get some sushi or cheeses or bakery items for that long train ride (ours held us over on the new hav...', 15, '2020-07-10 00:50:17', '2020-07-10 06:20:17'),
(10, 'Union Square Green Market', 1, 'New York, NY, USA', '40.7127753', '-74.0059728', '5f0808288dc08.jpg', 'Bring your own coffee from home, or if you feel like spending $5, sip hot cider and nibble on fresh-baked goods as you stroll through the stalls of food and agriculture products from around the tri-state area.', 6, '2020-07-10 00:49:00', '2020-07-10 06:19:00'),
(9, 'New York Stock Exchange', 1, 'New York, NY, USA', '40.7127753', '-74.0059728', '5f08077b18836.jpg', 'The New York Stock Exchange (NYSE, nicknamed \"The Big Board\") is an American stock exchange located at 11 Wall Street, Lower Manhattan, New York City, New York.', 3, '2020-07-10 00:45:23', '2020-07-10 06:15:23'),
(12, 'Smorgasburg-Prospect Park', 1, 'New York, NY, USA', '40.7127753', '-74.0059728', '5f0808da8d40e.jpg', 'The diversity of the food types was amazing .It was certainly worth the long travel from New Jersey.My wife and I tried 3 different food stands plus the Ice cream stand that had cones with toasted marshmallows on...', 20, '2020-07-10 00:51:14', '2020-07-10 06:21:14'),
(13, 'Brooklyn Flea Market', 1, 'New York, NY, USA', '40.7127753', '-74.0059728', '5f08091c66d40.jpg', 'Great vendors, neat atmosphere and the food was amazing!\r\n', 14, '2020-07-10 00:52:20', '2020-07-10 06:22:20'),
(14, 'Artists & Fleas at Chelsea Market', 1, 'New York, NY, USA', '40.7127753', '-74.0059728', '5f080960c5598.jpg', 'Right off the High Line, and adjacent to the Chelsea Market and great restaurants.', 25, '2020-07-10 00:53:28', '2020-07-10 06:23:28'),
(15, 'Arthur Avenue Retail Market', 1, 'New York, NY, USA', '40.7127753', '-74.0059728', '5f0809b1151a1.jpg', 'Fresh meats, seafood, cheese, etc. as well as plenty of places to buy prepared foods or lunch dishes to consume at tables.', 9, '2020-07-10 00:54:49', '2020-07-10 06:24:49'),
(16, 'Fort Greene Flea', 1, 'New York, NY, USA', '40.7127753', '-74.0059728', '5f0809f8e094e.jpg', 'It’s a fun open space of local artists & creations including jewelry (lots of beautiful designers), all-natural skin line, cheeky canvas pouches, vintage clothing and more', 16, '2020-07-10 00:56:00', '2020-07-10 06:26:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `itemname` varchar(250) NOT NULL,
  `comment` text DEFAULT NULL,
  `unit` varchar(100) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `tax` double NOT NULL DEFAULT 0,
  `total` double NOT NULL,
  `sitefee` double NOT NULL DEFAULT 0,
  `vendoramount` double NOT NULL DEFAULT 0,
  `status` varchar(125) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `vendor_id`, `itemname`, `comment`, `unit`, `qty`, `price`, `tax`, `total`, `sitefee`, `vendoramount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Mayur', 'Nice Product', '10 .5BU/BAG', 3, 13, 1.17, 40.17, 2.01, 38.16, 'approved', '2020-05-17 18:59:10', '2020-05-18 00:29:10'),
(2, 2, 11, 'Banana', '', 'KG', 5, 10, 0, 50, 2.5, 47.5, 'approved', '2020-05-27 17:49:46', '2020-05-27 23:19:46'),
(3, 2, 4, 'Sample Test', '', '.5BU', 2, 15, 0, 30, 1.5, 28.5, 'approved', '2020-05-27 17:50:15', '2020-05-27 23:20:15'),
(4, 2, 4, 'Sample Test', '', '.5BU', 1, 5, 0, 5, 0.25, 4.75, 'approved', '2020-05-27 17:50:35', '2020-05-27 23:20:35'),
(5, 3, 4, 'Mayur', '', '10 .5BU/BAG', 1, 13, 0.39, 13.39, 0.67, 12.72, 'pending', '2020-06-12 04:54:58', '2020-06-19 14:39:55'),
(6, 4, 4, 'Sample Test', '', '.5BU', 1, 15, 0, 15, 0.75, 14.25, 'pending', '2020-06-19 05:57:53', '2020-06-19 14:39:33'),
(7, 4, 4, 'Sample Test', '', '.5BU', 1, 5, 0, 5, 0.25, 4.75, 'pending', '2020-06-19 05:57:53', '2020-06-19 14:39:39'),
(8, 5, 13, 'Bagel Test', '', '.5BU', 10, 200, 200, 2, 1.56, 0.44, 'approved', '2020-07-01 06:16:33', '2020-07-01 11:46:33'),
(9, 6, 13, 'Product 2', '', '.5DZ', 1, 133, 0, 133, 103.74, 29.26, 'pending', '2020-07-01 03:52:30', '2020-07-01 09:22:30'),
(17, 13, 13, 'Product 2', '', '.5DZ', 1, 133, 0, 133, 0, 133, 'approved', '2020-07-06 04:02:39', '2020-07-06 09:32:39'),
(16, 13, 13, 'sdsd', '', 'BTL', 2, 23, 0, 46, 0, 46, 'approved', '2020-07-06 04:02:39', '2020-07-06 09:32:39'),
(12, 8, 13, 'Product 2', '', '.5DZ', 1, 133, 0, 133, 0, 133, 'approved', '2020-07-05 23:36:41', '2020-07-06 05:06:41'),
(13, 9, 13, 'Product 2', '', '.5DZ', 1, 133, 0, 133, 0, 133, 'approved', '2020-07-06 10:03:24', '2020-07-06 15:33:24'),
(14, 11, 13, 'Product 2', '', '.5DZ', 2, 133, 0, 266, 0, 266, 'approved', '2020-07-05 23:48:01', '2020-07-06 05:18:01'),
(15, 12, 13, 'sdsd', '', 'BTL', 3, 23, 0, 69, 0, 69, 'approved', '2020-07-05 23:59:53', '2020-07-06 05:29:53'),
(18, 14, 13, 'sdsd', '', 'BTL', 1, 23, 0, 23, 0, 23, 'approved', '2020-07-06 04:47:04', '2020-07-06 10:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `total_items` double NOT NULL,
  `status` varchar(10) NOT NULL,
  `totalamount` double NOT NULL,
  `couponcode` varchar(15) DEFAULT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `fee` double NOT NULL DEFAULT 0,
  `grandtotal` double NOT NULL DEFAULT 0,
  `customer_id` varchar(250) DEFAULT NULL,
  `payment_method` varchar(250) DEFAULT NULL,
  `last4` int(4) DEFAULT NULL,
  `paymentstatus` varchar(15) NOT NULL DEFAULT 'unpaid',
  `pickup` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `market_id`, `vendor_id`, `total_items`, `status`, `totalamount`, `couponcode`, `discount`, `fee`, `grandtotal`, `customer_id`, `payment_method`, `last4`, `paymentstatus`, `pickup`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 0, 3, 'approved', 40.17, '', 0, 1.21, 41.38, 'cus_HISC8kDAvLrRl2', 'card_1GjrINBz8hwDGXwaW3OlfjLo', 1111, 'paid', NULL, '2020-05-17 19:00:21', '2020-05-18 00:30:21'),
(2, 12, 5, 0, 8, 'approved', 85, '', 0, 2.55, 87.55, 'cus_HMBk3t9jKcCAAz', 'card_1GnTN2Bz8hwDGXwauJzweoMk', 1111, 'paid', NULL, '2020-05-27 17:50:38', '2020-05-27 23:20:38'),
(3, 10, 3, 0, 1, 'pending', 13.39, '', 0, 0.4, 13.79, 'cus_HTBss2ri8LzoWb', 'card_1GuFUpBz8hwDGXwavz4CDn70', 1111, 'unpaid', '2020-06-20 17:00:00', '2020-06-15 10:39:29', '2020-06-15 16:09:29'),
(4, 5, 5, 0, 2, 'pending', 20, '', 0, 0.6, 20.6, 'cus_HISC8kDAvLrRl2', 'card_1GuGTkBz8hwDGXwaVfYEQwxC', 1111, 'unpaid', '2020-06-16 15:45:00', '2020-06-15 11:29:02', '2020-06-15 16:59:02'),
(5, 14, 7, 0, 10, 'approved', 2, '', 0, 66, 2, 'cus_HZ7S0qA5ppY5jb', 'card_1GzzDnBz8hwDGXwaqkyUUtPF', 4242, 'paid', '2020-12-12 12:00:00', '2020-07-01 06:16:34', '2020-07-01 11:46:34'),
(6, 14, 7, 0, 1, 'pending', 133, '', 0, 3.99, 136.99, 'cus_HZ7S0qA5ppY5jb', 'card_1H029BBz8hwDGXwaOx6Ev5Tq', 4242, 'unpaid', NULL, '2020-07-01 03:52:30', '2020-07-01 09:22:30'),
(7, 14, -1, 13, 3, 'pending', 179, '', 0, 16.11, 195.11, 'cus_HZ7S0qA5ppY5jb', 'card_1H1mAvBz8hwDGXwatutEpGiG', 4242, 'unpaid', '0000-00-00 00:00:00', '2020-07-06 10:19:06', '2020-07-06 15:49:06'),
(8, 14, -1, 13, 1, 'pending', 133, '', 0, 11.97, 144.97, 'cus_HZ7S0qA5ppY5jb', 'card_1H1mXLBz8hwDGXwaQPXN4TcW', 4242, 'paid', '0000-00-00 00:00:00', '2020-07-06 10:19:09', '2020-07-06 15:49:09'),
(9, 14, -1, 13, 1, 'pending', 133, '', 0, 11.97, 144.97, 'cus_HZ7S0qA5ppY5jb', 'card_1H1mZ4Bz8hwDGXwaphF0jOlu', 4242, 'paid', '0000-00-00 00:00:00', '2020-07-06 10:19:01', '2020-07-06 15:49:01'),
(11, 14, -1, 13, 2, 'pending', 266, '', 0, 23.94, 289.94, 'cus_HZ7S0qA5ppY5jb', 'card_1H1miJBz8hwDGXwaxrVZ9FCn', 4242, 'paid', '0000-00-00 00:00:00', '2020-07-06 10:18:57', '2020-07-06 15:48:57'),
(12, 14, -1, 13, 3, 'pending', 69, '', 0, 6.21, 75.21, 'cus_HZ7S0qA5ppY5jb', 'card_1H1mtoBz8hwDGXwaRFjWZg0x', 4242, 'paid', '0000-00-00 00:00:00', '2020-07-06 10:18:53', '2020-07-06 15:48:53'),
(14, 14, -1, 13, 1, 'pending', 23, '', 0, 2.07, 25.07, 'cus_HZ7S0qA5ppY5jb', 'card_1H1rNiBz8hwDGXwahYqHVBmZ', 4242, 'paid', '0000-00-00 00:00:00', '2020-07-06 04:47:04', '2020-07-06 10:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

DROP TABLE IF EXISTS `productimages`;
CREATE TABLE IF NOT EXISTS `productimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `sortorder` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `product_id`, `image`, `sortorder`) VALUES
(1, 5, '5ea6c46c145e2.jpg', 1),
(2, 5, '5ea6c46c1515c.jpg', 0),
(6, 6, '5ece67915d073.png', 0),
(7, 6, '5ece6791e1fc5.jpg', 1),
(8, 11, '5f08361a3f6cf.jpg', 0),
(9, 15, '5f083bfa69a9d.jpg', 0),
(10, 18, '5f083dc88ea70.jpg', 0),
(11, 19, '5f083f351227f.jpg', 0),
(12, 21, '5f084c44bb43e.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `markets` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `is_taxable` tinyint(4) NOT NULL DEFAULT 0,
  `tax` double NOT NULL DEFAULT 0,
  `is_comment` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `vendor_id`, `category_id`, `description`, `image`, `markets`, `status`, `is_taxable`, `tax`, `is_comment`, `created_at`, `updated_at`) VALUES
(1, 'Keyur Patel', 4, 3, 'Hello This is Just A Description ', NULL, NULL, 1, 0, 0, 0, '2020-04-20 19:33:55', '2020-04-21 01:03:55'),
(2, 'test', 4, 1, 'fdfdfdf', NULL, NULL, 1, 0, 0, 0, '2020-04-20 19:34:06', '2020-04-21 01:04:06'),
(3, 'sadasdasadfafadsa', 4, 3, 'adadasdasdsdasdas', NULL, NULL, 1, 0, 0, 0, '2020-04-21 13:17:46', '2020-04-21 01:17:46'),
(4, 'New Product', 4, 3, 'Hello This is a new Product', '5ea6c3b75163c.jpg', '2,3,1', 1, 1, 2, 0, '2020-05-18 12:22:56', '2020-05-18 12:22:56'),
(5, 'Mayur', 4, 3, 'aheheh', '5ece65ae2342f.jpg', '2,3,1', 1, 1, 3, 1, '2020-05-27 13:05:50', '2020-05-27 01:05:50'),
(6, 'Sample Test', 4, 3, 'Nice Description', '5ece555db55b9.jpg', '1,4,5', 1, 1, 0, 0, '2020-05-27 17:47:14', '2020-05-27 05:47:14'),
(7, 'Banana', 11, 6, 'Banana', '', '5', 1, 0, 0, 0, '2020-05-26 23:59:26', '2020-05-27 05:29:26'),
(8, 'Bagel Test', 13, 1, 'Bangel Description', '5efc29a5558ef.jpg', '7', 1, 1, 10, 0, '2020-07-01 06:13:57', '2020-07-01 06:13:57'),
(9, 'Product 2', 13, 3, 'sdsd', '5efc531cce84a.png', '7', 1, 0, 0, 0, '2020-07-01 03:40:52', '2020-07-01 09:10:52'),
(10, 'sdsd', 13, 1, 'sd', '5f02a8302f733.jpg', '7', 1, 0, 0, 0, '2020-07-05 22:57:28', '2020-07-06 04:27:28'),
(11, 'Artist and Craftsman Supply', 15, 3, 'There are several locations of this shop dotting Brooklyn, Queens and Manhattan, and the Park Slope locale is a Gotham favorite. Multiple rooms house an impressive selection of supplies and equipment for a variety of creative hobbies.', '5f08361a30c99.jpg', '15', 1, 0, 0, 0, '2020-07-10 04:04:18', '2020-07-10 09:34:18'),
(12, 'Bagel Yorker', 15, 1, 'Looking for authentic New York bagels at home? This delicious bagel recipe can be made at home', '5f0836c8c6d06.jpg', '15', 1, 1, 20, 0, '2020-07-10 04:07:12', '2020-07-10 09:37:12'),
(13, 'Eater NY', 15, 2, 'Ah, the Big Apple. Famous for its skyscraping high rises, hot dogs, theaters, neon-lit streets, cheesecakes, diverse cultural heritage and — you guessed it — cocktails.', '5f08373caadfe.jpg', '15,16', 1, 0, 0, 0, '2020-07-10 04:09:08', '2020-07-10 09:39:08'),
(14, 'Apple NY', 15, 7, 'Exceptional apples – with all the choices that allow you to provide customers with exactly what they want. We provide the best of New York’s crop along with select imported apples.', '5f08395ca433e.jpg', '15', 1, 1, 10, 0, '2020-07-10 04:18:12', '2020-07-10 09:48:12'),
(15, 'Salted Caramel & Peanut Tart', 16, 5, 'Salted Caramel & Peanut Tart\r\nCrunchy chocolate biscuit with salted caramel and a thin layer of roasted sticky nuts, covered with caramel mousse.', '5f083bfa5e4cc.jpg', '13', 1, 1, 15, 1, '2020-07-10 04:29:22', '2020-07-10 09:59:22'),
(16, 'Blueberries', 16, 8, 'void bruised blueberries, since they will spoil quickly, even in the fridge.', '5f083ce87ec7a.jpg', '12,13', 1, 0, 0, 0, '2020-07-10 10:03:20', '2020-07-10 10:03:20'),
(17, 'The Penicillin', 16, 2, 'Don’t let the medicinal name fool you. The Penicillin is as iconic to New York City as the Statue of Liberty herself.', '5f083d3466360.jpg', '13', 1, 1, 15, 1, '2020-07-10 04:34:36', '2020-07-10 10:04:36'),
(18, 'DaVinci Artist', 16, 3, 'A stone’s throw from SVA, DaVinci’s flagship deservingly prides itself on its knowledgeable staff and specialty selection. From drawing supplies to printmaking', '5f083dc87edd6.jpg', '12', 1, 1, 24, 1, '2020-07-10 04:37:04', '2020-07-10 10:07:04'),
(19, 'Manhatten Art', 17, 3, 'A great piece of Abstract Art can be a real talking point and can draw the eye wherever it hangs. Whether you re shopping high quality prints for your', '5f083f34f2d03.jpg', '10', 1, 0, 0, 0, '2020-07-10 04:43:09', '2020-07-10 10:13:09'),
(20, 'OVERNIGHT BAGELS', 17, 1, 'These bagels are chewy, crusty and properly dense New York Style Bagels.', '5f084bcf8ef07.jpg', '10', 1, 0, 0, 1, '2020-07-10 05:36:55', '2020-07-10 11:06:55'),
(21, 'Classic Cocktail Spirits', 17, 2, 'The extensive selection at Marketview Liquor means one place for all your cocktail, wine and beverage-creation needs.', '5f084c44b0c23.jpg', '10', 1, 1, 13, 0, '2020-07-10 05:38:52', '2020-07-10 11:08:52'),
(22, 'Strwberry', 17, 7, 'The garden strawberry (or simply strawberry; Fragaria × ananassa) is a widely grown hybrid species of the genus Fragaria', '5f084c8ce1404.jpg', '10', 1, 1, 5, 1, '2020-07-10 05:40:04', '2020-07-10 11:10:04'),
(23, 'Apricots', 18, 7, 'New York has a total of 87 acres devoted to apricot production, approximately 10 of which are located', '5f0851753b065.jpg', '11,9', 1, 1, 17, 1, '2020-07-10 06:01:01', '2020-07-10 11:31:01'),
(24, 'Beets', 18, 8, 'resh market growers have a wide range of varieties to select from. Root colors include red, golden, or alternating red and white ring', '5f0851c88074c.jpg', '11', 1, 0, 0, 0, '2020-07-10 06:02:24', '2020-07-10 11:32:24'),
(25, 'Cherries', 18, 7, 'Cherry consumption has always been good but recent information about the antioxidant health benefits has improved domestic consumption.', '5f0853d1e65fe.jpg', '9', 1, 1, 25, 0, '2020-07-10 06:11:05', '2020-07-10 11:41:05'),
(26, 'Artist Run', 18, 3, 'New York is increasingly under threat from the foliar disease Downy Mildew (Pseudoperonospora cubensis).', '5f08542021d20.jpg', '11,9', 1, 0, 0, 0, '2020-07-10 06:12:24', '2020-07-10 11:42:24'),
(27, 'Grapes', 19, 7, 'Grapes are thought to have been first cultivated more than 7,000 years ago near present-day Iran', '5f0856c9e4e3a.jpg', '13', 1, 1, 14, 0, '2020-07-10 06:23:45', '2020-07-10 11:53:45'),
(28, 'Eggplant', 19, 8, 'Eggplant is a commonly grown fresh market crop in New York, particularly for direct-sales such as farm stands', '5f08570cc59e7.jpg', '13', 1, 0, 0, 0, '2020-07-10 06:24:52', '2020-07-10 11:54:52'),
(29, 'Pistachio Chocolate Chip', 19, 5, 'Chocolate biscuit with chocolate chips and pistachios.', '5f08576a0dcc5.jpg', '13', 1, 1, 10, 0, '2020-07-10 06:26:26', '2020-07-10 11:56:26'),
(30, 'Inoreo', 19, 5, 'Oreo biscuit with chocolate brownie!', '5f0857abcbd66.jpg', '13', 1, 1, 8, 0, '2020-07-10 06:27:31', '2020-07-10 11:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `businesstype_id` int(11) NOT NULL,
  `businessname` varchar(250) NOT NULL,
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) NOT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `phonenumber` varchar(12) NOT NULL,
  `link` varchar(300) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `defaultmarket` int(11) DEFAULT 0,
  `defaultvendor` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `businesstype_id`, `businessname`, `address1`, `address2`, `zipcode`, `phonenumber`, `link`, `image`, `defaultmarket`, `defaultvendor`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'KP STORE', 'Shilalekh', 'Pal', '10001', '9638464855', NULL, '5eccfaa52bdd4.png', 0, 0, '2020-05-26 11:23:08', '2020-05-26 11:23:08'),
(2, 5, 0, '', 'Shilalekh', 'Pal Surat', '10016', '7874631566', NULL, '5ec1359f8e92e.jpg', 5, 0, '2020-06-15 11:23:02', '2020-06-15 16:53:02'),
(3, 7, 6, 'Vendor New', 'abcd', 'xyz', '10016', '9898598555', NULL, '', 0, 0, '2020-05-17 06:11:22', '2020-05-17 11:41:22'),
(4, 10, 0, '', '201 Shilalekh', 'pal', '10001', '9898598555', NULL, '5ece6ec5dc747.png', 5, 0, '2020-06-19 10:09:08', '2020-06-19 15:39:08'),
(5, 11, 6, 'New Vendor', 'Sample Address', 'Sample Address2', '10001', '9898598555', NULL, '5ecea289bc644.png', 0, 0, '2020-05-26 23:55:29', '2020-05-27 05:25:29'),
(6, 12, 0, '', 'Sample Address', 'Sample Address2', '10001', '9898598555', NULL, '5ecea5f04256f.png', 5, 0, '2020-05-27 17:42:30', '2020-05-27 23:12:30'),
(7, 14, 0, '', 'fgf', 'fgfg', '10001', '9898598555', NULL, '5efc294080aa0.png', 7, 0, '2020-07-01 09:05:36', '2020-07-01 14:35:36'),
(8, 13, 6, 'Hiral Test', 'rer', 're', '10001', '8866528764', 'http://localhost/thepickapp/users/generatelink/13_5794613', '5efc3bc2eab4e.png', 0, 0, '2020-07-01 11:29:11', '2020-07-01 11:29:11'),
(9, 15, 2, 'Destiny Planners', '900  Briercliff Road', 'Brooklyn,New York', '11219', '347-760-1235', 'http://localhost/thepickapp/users/generatelink/15_7387715', '5f081180e69d6.jpg', 0, 0, '2020-07-10 01:28:08', '2020-07-10 06:58:08'),
(10, 16, 2, 'Bennett Brothers', '366  Jarvisville Road', 'Lynbrook,New York', '11563', '516-872-1028', 'http://localhost/thepickapp/users/generatelink/16_2980085', '5f08132797ff8.jpg', 0, 0, '2020-07-10 01:35:11', '2020-07-10 07:05:11'),
(11, 17, 3, 'Rustler Steak House', '1728  Bingamon Branch Road', 'HOLTSVILLE,New York', '00501', '847-204-1486', 'http://localhost/thepickapp/users/generatelink/17_9826357', '5f0818da3f88c.jpg', 0, 0, '2020-07-10 01:59:30', '2020-07-10 07:29:30'),
(12, 18, 2, 'The Wiz', '4734  Shinn Street', 'New York', '10022', '212-745-9947', 'http://localhost/thepickapp/users/generatelink/18_7222194', '5f0819b7b17bc.jpg', 0, 0, '2020-07-10 02:03:11', '2020-07-10 07:33:11'),
(13, 19, 2, 'Schaak Electronics', '1251  Cherry Ridge Drive', 'Le Roy', '14482', '585-768-7041', 'http://localhost/thepickapp/users/generatelink/19_6511099', '5f0827f0050f8.jpg', 0, 0, '2020-07-10 03:03:52', '2020-07-10 08:33:52'),
(14, 20, 0, '', '4882  Renwick Drive', 'HOLTSVILLE,New York', '00501', '484-301-1709', NULL, '5f08298c8e859.jpg', 0, 0, '2020-07-10 03:10:44', '2020-07-10 08:40:44'),
(15, 21, 0, '', '1801  Bicetown Road', 'New York', '10011', '917-501-3490', NULL, '5f082d1d9b001.jpg', 0, 0, '2020-07-10 03:25:57', '2020-07-10 08:55:57'),
(16, 22, 0, '', '3570  Rosewood Lane', 'New York', '10022', '212-963-6012', NULL, '5f082deaeea2c.jpg', 0, 0, '2020-07-10 03:29:22', '2020-07-10 08:59:22'),
(17, 23, 0, '', '2919  Hinkle Deegan Lake Road', 'Syracuse', '13202', '607-233-5057', NULL, '5f082eb19a765.jpg', 0, 0, '2020-07-10 03:32:41', '2020-07-10 09:02:41'),
(18, 24, 0, '', '3748  Pallet Street', 'Tarrytown, New York', '10591', '914-333-1324', NULL, '5f082f83275d6.jpg', 11, 0, '2020-07-10 09:07:14', '2020-07-10 14:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(250) NOT NULL,
  `meta_value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_key`, `meta_value`, `created_at`, `update_at`) VALUES
(1, 'CONSUMER_COMMISSION', '9', '2020-07-03 04:00:00', '2020-07-03 09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `stripeaccounts`
--

DROP TABLE IF EXISTS `stripeaccounts`;
CREATE TABLE IF NOT EXISTS `stripeaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `access_token` varchar(250) NOT NULL,
  `livemode` varchar(20) DEFAULT NULL,
  `refresh_token` varchar(200) NOT NULL,
  `token_type` varchar(250) NOT NULL,
  `stripe_publishable_key` varchar(200) NOT NULL,
  `stripe_user_id` varchar(200) NOT NULL,
  `scope` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stripeaccounts`
--

INSERT INTO `stripeaccounts` (`id`, `user_id`, `access_token`, `livemode`, `refresh_token`, `token_type`, `stripe_publishable_key`, `stripe_user_id`, `scope`, `created_at`, `updated_at`) VALUES
(1, 4, 'sk_test_R3qBHzEargoEYozcREqXrsOe00eZVR373X', '0', 'rt_HISBgOjzFrkvMuJbTZHlSJcqv4BWb8M0w8SIoF0sQYhcz9ov', 'bearer', 'pk_test_uZZe6DTTidQ7u5u72w1Anmcp00zwHEwD3r', 'acct_1GjrF9DnMJT4bw0i', 'express', '2020-05-26 11:29:00', '2020-05-26 16:59:00'),
(2, 11, 'sk_test_WwIWu0pXIRU8BEXHK1zevbWN00wDh73iTV', '0', 'rt_HMBOLSWWtjYitF2CdjIvfiTNPQvVwCHWmSzJ9PAO9XaOH688', 'bearer', 'pk_test_sGvytGjMIfBqXRSNlhXlSCnU00t6exD364', 'acct_1GnT11IMYnnICosq', 'express', '2020-05-27 17:27:15', '0000-00-00 00:00:00'),
(3, 13, 'sk_test_51GzyWtKPS6fGwnc8XXapTlXtSFv2BddTOHh1t0QwmCGWPMs1qGVKUvMqsCYml45zhfU7zDQfgwrQU67mWjTeAej700Rt4O6h5F', '0', 'rt_HZ6lrqAG4fP2ycybp9JQl7AN61H4PO8Xcyobgl7ySIEAiUUj', 'bearer', 'pk_test_51GzyWtKPS6fGwnc8Dh7RJkILCZ8BYpRW5wxjhi0eiAn3xq6IRs2LhGI3zEQXOiJiaYKk6oNOFX1yNndV75oCc9t600j1mWHKoL', 'acct_1GzyWtKPS6fGwnc8', 'express', '2020-07-01 05:32:45', '0000-00-00 00:00:00'),
(4, 15, 'sk_test_51H3IU6EczkIWNs1mbsXR5RBHMn14XRUkhxdNQGSaw1VQpihtQCROqlROTkLvGBKprrJommLXVG352kh9jEbBmvtK00yJKliwvK', '0', 'rt_HcXbysvqAsb79BrTfjkZXNlZEDdCDXUcsy2im1WbVd45xKoW', 'bearer', 'pk_test_51H3IU6EczkIWNs1mJUCUwXMtDx3yXHk9u06MudRebmjfWyGQdSFv4dYxLAhxM31XxugsBad8K8HlpZUfREwUPZJY00NTm6xOjl', 'acct_1H3IU6EczkIWNs1m', 'express', '2020-07-10 09:28:11', '0000-00-00 00:00:00'),
(5, 16, 'sk_test_51H3IubJFHeN9YxuFyLFEE9Zetp6Cyd3JBEesVWz2mkcvBCsZKYixpXO0KwrIramuOMaLetg565lB2uu5d6j64M8l00iwHRbv6J', '0', 'rt_HcY2LqKaEajnVQVPzEswnhyiaQuxweSfnMKZQtSHZkytsosE', 'bearer', 'pk_test_51H3IubJFHeN9YxuFDL2Ft3Y6oVooUL41Ljwr1HiDs3mJN1i3iIiikrdyBE1ePhI5bE84Y704G4Qqk0916Xfcae9Z00wcSAJrE6', 'acct_1H3IubJFHeN9YxuF', 'express', '2020-07-10 09:55:08', '0000-00-00 00:00:00'),
(6, 17, 'sk_test_51H3J9uG3PINQhHjDY0gnuCs76JGl7qvJhtRYnYRk4dF0VdF7X93TrNhdarHTeeoOOesWila9QlpS1WpIvsjME93L005PuQsjMF', '0', 'rt_HcYIcZKiTNHbFt4keoOfk57xSXRW2jxtXMQx4abFzPvTXpvc', 'bearer', 'pk_test_51H3J9uG3PINQhHjDoaha7RrsIQJHb9jRFNHUaeFt6Cqah0OAfVnsyvTO4k4sdNyWJey6eg9268gijLdFfdL46Anr00WRBSFRJ3', 'acct_1H3J9uG3PINQhHjD', 'express', '2020-07-10 10:10:42', '0000-00-00 00:00:00'),
(7, 18, 'sk_test_51H3KL5IS9a3OabH820YdOPUQAEvr3Oo8y5qNj0Xz6xiq0KyRDjFeIDuSj5G6eaZVNqsQZrICtNJKNlMW9DqNNTE300tj8mzD9X', '0', 'rt_HcZWYnZ4EqDB1dj8TyBkkUivqiheca2t0cNNJNMji8pbsl6W', 'bearer', 'pk_test_51H3KL5IS9a3OabH8KSMA0VJJ38pwjTLPBFQUjI5kHIkT8i7fPnWIzUUIWua5N6ogzqNZRBJlNUwuOIropMsi4RRZ00ycDGiUXV', 'acct_1H3KL5IS9a3OabH8', 'express', '2020-07-10 11:27:19', '0000-00-00 00:00:00'),
(8, 19, 'sk_test_51H3KduFYvjyl5McRa67vEpSEAqYtpGm17496HQe9DdtvPomGDNU14hUBK64oRZO4qafTaey7laDrUa9XegS706ZW00CKLDYsFO', '0', 'rt_HcZu0OFYWEqjkS0aD6UjBI2OT9f74DVwuVBu2dWRnM5kf8oP', 'bearer', 'pk_test_51H3KduFYvjyl5McRTR1wzcGOFaHP2u4H8KtL1C6puOnqdzoTrUhMmUVZvcfKIS5H3hqK949hufBmWz2HV8WJjIge00bxR4sHO3', 'acct_1H3KduFYvjyl5McR', 'express', '2020-07-10 11:51:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stripecharges`
--

DROP TABLE IF EXISTS `stripecharges`;
CREATE TABLE IF NOT EXISTS `stripecharges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `charge_id` varchar(150) NOT NULL,
  `amount` double NOT NULL,
  `refund_id` varchar(150) DEFAULT NULL,
  `amount_refunded` double DEFAULT NULL,
  `created` varchar(100) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `livemode` varchar(5) DEFAULT NULL,
  `payment_method` varchar(150) NOT NULL,
  `receipt_url` text DEFAULT NULL,
  `status` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stripecharges`
--

INSERT INTO `stripecharges` (`id`, `order_id`, `user_id`, `charge_id`, `amount`, `refund_id`, `amount_refunded`, `created`, `currency`, `livemode`, `payment_method`, `receipt_url`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 5, 'ch_1GjrhcBz8hwDGXwa80UkWpvK', 41.38, NULL, 0, '1589741952', 'usd', '0', 'card_1GjrINBz8hwDGXwaW3OlfjLo', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1GjrhcBz8hwDGXwa80UkWpvK/rcpt_HIScIY7rB4bxU2SFSOdJuwA1cZD8so9', 'succeeded', '2020-05-17 18:59:13', '0000-00-00 00:00:00'),
(4, 2, 12, 'ch_1GnTOiBz8hwDGXwa5VSWRDql', 87.55, NULL, 0, '1590601836', 'usd', '0', 'card_1GnTN2Bz8hwDGXwauJzweoMk', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1GnTOiBz8hwDGXwa5VSWRDql/rcpt_HMBmNuGm6KiwxjbnmwZc8RsCHAUhToj', 'succeeded', '2020-05-27 17:50:38', '0000-00-00 00:00:00'),
(5, 5, 14, 'ch_1GzzFMBz8hwDGXwaEhorjIAF', 2, NULL, 0, '1593584200', 'usd', '0', 'card_1GzzDnBz8hwDGXwaqkyUUtPF', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1GzzFMBz8hwDGXwaEhorjIAF/rcpt_HZ7Uv4M8drbkbFvKvzUAcy8KmDYhHTl', 'succeeded', '2020-07-01 06:16:34', '0000-00-00 00:00:00'),
(6, 8, 14, 'ch_1H1mXNBz8hwDGXwafw7V6RBh', 144.97, NULL, 0, '1594012001', 'usd', '0', 'card_1H1mXLBz8hwDGXwaQPXN4TcW', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1H1mXNBz8hwDGXwafw7V6RBh/rcpt_HayUUd6FxhNGLpPvMLYPtQjpTom5HmE', 'succeeded', '2020-07-06 05:06:42', '0000-00-00 00:00:00'),
(7, 9, 14, 'ch_1H1mZ6Bz8hwDGXwafujOMgvZ', 144.97, NULL, 0, '1594012108', 'usd', '0', 'card_1H1mZ4Bz8hwDGXwaphF0jOlu', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1H1mZ6Bz8hwDGXwafujOMgvZ/rcpt_HayWo2ZBW4ZzfL4exPPlwjf91nI95zp', 'succeeded', '2020-07-06 05:08:28', '0000-00-00 00:00:00'),
(8, 12, 14, 'ch_1H1mtqBz8hwDGXwaFV2Dpu6B', 75.21, NULL, 0, '1594013394', 'usd', '0', 'card_1H1mtoBz8hwDGXwaRFjWZg0x', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1H1mtqBz8hwDGXwaFV2Dpu6B/rcpt_HayrYcYCBKCdodgP1UUJg0lYUUlLRhu', 'succeeded', '2020-07-06 05:29:54', '0000-00-00 00:00:00'),
(9, 13, 14, 'ch_1H1qgmBz8hwDGXwawxetMty0', 195.11, NULL, 0, '1594027960', 'usd', '0', 'card_1H1qgjBz8hwDGXwaoHcUZaTa', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1H1qgmBz8hwDGXwawxetMty0/rcpt_Hb2mYfJ6NReVl931hcuBPX0UMfbfevh', 'succeeded', '2020-07-06 09:32:40', '0000-00-00 00:00:00'),
(10, 14, 14, 'ch_1H1rNkBz8hwDGXwa8Ez9khaa', 25.07, NULL, 0, '1594030624', 'usd', '0', 'card_1H1rNiBz8hwDGXwahYqHVBmZ', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1H1rNkBz8hwDGXwa8Ez9khaa/rcpt_Hb3UGXCsUCtLF3S6NTHn9xm9Zvnvte6', 'succeeded', '2020-07-06 10:17:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stripecustomers`
--

DROP TABLE IF EXISTS `stripecustomers`;
CREATE TABLE IF NOT EXISTS `stripecustomers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `customer_id` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stripecustomers`
--

INSERT INTO `stripecustomers` (`id`, `user_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'cus_HISC8kDAvLrRl2', '2020-05-17 18:33:09', '0000-00-00 00:00:00'),
(2, 12, 'cus_HMBk3t9jKcCAAz', '2020-05-27 17:48:55', '0000-00-00 00:00:00'),
(3, 10, 'cus_HTBss2ri8LzoWb', '2020-06-15 10:24:57', '0000-00-00 00:00:00'),
(4, 14, 'cus_HZ7S0qA5ppY5jb', '2020-07-01 06:14:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stripetransfers`
--

DROP TABLE IF EXISTS `stripetransfers`;
CREATE TABLE IF NOT EXISTS `stripetransfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `transfer_id` varchar(150) NOT NULL,
  `reverse_transfer_id` varchar(150) DEFAULT NULL,
  `amount` double NOT NULL,
  `amount_reversed` double DEFAULT NULL,
  `created` varchar(10) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `destination` varchar(150) NOT NULL,
  `destination_payment` varchar(150) NOT NULL,
  `livemode` varchar(10) DEFAULT NULL,
  `transfer_group` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `code` varchar(15) NOT NULL,
  `iscontainer` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `code`, `iscontainer`, `status`, `created_at`, `updated_at`) VALUES
(1, '0.5 BU', '.5BU', 0, 1, '2020-04-21 12:33:28', '0000-00-00 00:00:00'),
(2, '0.5 DOZEN', '.5DZ', 0, 1, '2020-04-21 12:36:43', '2020-04-21 18:06:43'),
(3, 'BAG', 'BAG', 1, 1, '2020-04-21 12:37:21', '2020-04-21 18:07:21'),
(4, 'BOTTLE', 'BTL', 0, 1, '2020-04-21 12:36:37', '2020-04-21 18:06:37'),
(5, 'BOX', 'BOX', 1, 1, '2020-04-21 12:37:26', '2020-04-21 18:07:26'),
(6, 'Kilogram', 'KG', 0, 1, '2020-04-21 12:35:56', '0000-00-00 00:00:00'),
(7, 'Test Unit Test', 'TUT', 0, 1, '2020-05-10 20:13:16', '2020-05-11 01:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `initial` varchar(2) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `accounttype` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:superadmin,2:admin',
  `status` tinyint(4) NOT NULL COMMENT '1:active,2:inactive',
  `otp` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `initial`, `email`, `password`, `accounttype`, `status`, `otp`, `created_at`, `updated_at`) VALUES
(4, 'keyur', 'patel', 'KP', 'vendor@example.com', '251b1847fae3f1f3ae6bb775614ad7d7', 1, 1, NULL, '2020-05-23 11:50:29', '2020-05-23 17:20:29'),
(5, 'kinal', 'patel', 'KP', 'customer@example.com', 'a421e6b1f4ef36ee345db8db566d6b02', 2, 1, NULL, '2020-06-09 12:06:30', '2020-06-09 17:36:30'),
(15, 'Jessica', 'Crider', 'JC', 'n728d2qqio@temporary-mail.net', '3bbd1873056226d83e6371a24d340340', 1, 1, NULL, '2020-07-10 06:51:57', '0000-00-00 00:00:00'),
(16, 'Randy', 'Taylor', 'RT', 'fly2mmreb8@temporary-mail.net', '75b0007319606bd1384fcc5780d38b87', 1, 1, NULL, '2020-07-10 07:03:15', '0000-00-00 00:00:00'),
(17, 'Jennifer', 'Phillips', 'JP', 'ic7yrmu0xis@temporary-mail.net', '4e2bbe10d3fd94150cc61e97267b25f5', 1, 1, NULL, '2020-07-10 07:27:14', '0000-00-00 00:00:00'),
(18, 'Kay', 'Gold', 'KG', 'hgm8o5zlsvl@temporary-mail.net', '4f39c317d0a23cc20e9bf187204fccf3', 1, 1, NULL, '2020-07-10 07:31:45', '2020-07-10 13:01:45'),
(19, 'Orville', 'Lewis', 'OL', '4z0vdkxnptr@temporary-mail.net', 'f499803d069e0af46274c280bc7dd969', 1, 1, NULL, '2020-07-10 08:32:23', '0000-00-00 00:00:00'),
(20, 'Cory', 'Petry', 'CP', 'phxgly7pqoh@temporary-mail.net', '6d6567f5457be8b4ddae923621ca5ddc', 2, 1, NULL, '2020-07-10 08:38:38', '2020-07-10 14:08:38'),
(21, 'Janet', 'Aldridge', 'JA', 'htoz12h7q1@temporary-mail.net', 'f39252ca4b0b13fd15baf45122961956', 2, 1, NULL, '2020-07-10 08:54:39', '2020-07-10 14:24:39'),
(22, 'Taylor', 'Pineda', 'TP', 'arkp6bevjie@temporary-mail.net', '6833a26b234c3b6df0cc84fc82d07cfe', 2, 1, NULL, '2020-07-10 08:58:14', '0000-00-00 00:00:00'),
(23, 'Robert', 'Vestal', 'RV', 'udjs7g4js7t@temporary-mail.net', '240003dc038438ae84f3fccc9590706c', 2, 1, NULL, '2020-07-10 09:01:27', '0000-00-00 00:00:00'),
(24, 'Ariel', 'Johnson', 'AJ', 'vpz35pp7nro@temporary-mail.net', '05975762f2eab68948e700f5ffdc5b99', 2, 1, NULL, '2020-07-10 09:04:35', '2020-07-10 14:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `vendormarkets`
--

DROP TABLE IF EXISTS `vendormarkets`;
CREATE TABLE IF NOT EXISTS `vendormarkets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `isapprove` tinyint(4) NOT NULL DEFAULT 0,
  `sortorder` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendormarkets`
--

INSERT INTO `vendormarkets` (`id`, `vendor_id`, `market_id`, `status`, `isapprove`, `sortorder`, `created_at`, `updated_at`) VALUES
(11, 4, 2, 1, 1, 1, '2020-05-17 23:59:12', '2020-05-18 05:29:12'),
(13, 4, 3, 1, 1, NULL, '2020-05-17 20:50:40', '2020-05-18 02:20:40'),
(12, 4, 1, 0, 1, 1, '2020-05-27 17:21:38', '2020-05-27 22:51:38'),
(14, 7, 2, 1, 1, 0, '2020-05-17 23:59:12', '2020-05-18 05:29:12'),
(15, 7, 1, 1, 1, 0, '2020-05-27 17:21:38', '2020-05-27 22:51:38'),
(17, 4, 4, 0, 0, NULL, '2020-05-26 12:04:05', '2020-05-26 17:34:05'),
(18, 11, 5, 1, 1, NULL, '2020-05-27 17:46:00', '2020-05-27 23:16:00'),
(19, 4, 5, 1, 1, NULL, '2020-05-27 17:46:01', '2020-05-27 23:16:01'),
(31, 17, 10, 1, 1, NULL, '2020-07-10 10:11:35', '2020-07-10 15:41:35'),
(30, 16, 12, 1, 1, NULL, '2020-07-10 09:57:09', '2020-07-10 15:27:09'),
(29, 16, 13, 1, 1, NULL, '2020-07-10 09:56:26', '2020-07-10 15:26:26'),
(28, 15, 15, 1, 1, NULL, '2020-07-10 09:30:06', '2020-07-10 15:00:06'),
(26, 13, 7, 1, 1, 0, '2020-07-01 05:51:27', '2020-07-01 11:21:27'),
(27, 15, 16, 1, 1, NULL, '2020-07-10 09:29:55', '2020-07-10 14:59:55'),
(32, 18, 11, 1, 1, NULL, '2020-07-10 11:28:59', '2020-07-10 16:58:59'),
(33, 18, 9, 1, 1, NULL, '2020-07-10 11:28:21', '2020-07-10 16:58:21'),
(34, 19, 13, 1, 1, NULL, '2020-07-10 11:52:41', '2020-07-10 17:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `zipcodes`
--

DROP TABLE IF EXISTS `zipcodes`;
CREATE TABLE IF NOT EXISTS `zipcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zipcode` varchar(8) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `lng` varchar(30) NOT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zipcodes`
--

INSERT INTO `zipcodes` (`id`, `zipcode`, `lat`, `lng`, `city`, `state`, `created_at`, `updated_at`) VALUES
(1, '10001', '40.75065', '-73.996924', 'New York', 'NY', '2020-05-17 13:25:30', '0000-00-00 00:00:00'),
(2, '12345', '42.800004', '-73.920153', 'Schenectady', 'NY', '2020-05-17 13:25:43', '0000-00-00 00:00:00'),
(3, '10016', '40.745207', '-73.978018', 'New York', 'NY', '2020-05-17 13:35:52', '0000-00-00 00:00:00'),
(4, '11219', '40.632676', '-73.996924', 'Brooklyn', 'NY', '2020-07-10 06:58:08', '0000-00-00 00:00:00'),
(5, '11563', '40.657258', '-73.673781', 'Lynbrook', 'NY', '2020-07-10 07:05:11', '0000-00-00 00:00:00'),
(6, '00501', '40.810008', '-73.04009', 'Holtsville', 'NY', '2020-07-10 07:29:30', '0000-00-00 00:00:00'),
(7, '10022', '40.758614', '-73.967704', 'New York', 'NY', '2020-07-10 07:33:11', '0000-00-00 00:00:00'),
(8, '14482', '42.978883', '-77.971534', 'Le Roy', 'NY', '2020-07-10 08:33:52', '0000-00-00 00:00:00'),
(9, '10011', '40.742054', '-74.000366', 'New York', 'NY', '2020-07-10 08:55:57', '0000-00-00 00:00:00'),
(10, '13202', '43.043798', '-76.150674', 'Syracuse', 'NY', '2020-07-10 09:02:41', '0000-00-00 00:00:00'),
(11, '10591', '41.09007', '-73.841079', 'Tarrytown', 'NY', '2020-07-10 09:06:11', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
