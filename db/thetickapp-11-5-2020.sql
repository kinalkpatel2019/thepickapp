-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2020 at 09:41 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `firstname`, `lastname`, `initial`, `email`, `password`, `accounttype`, `status`, `markets`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'Malay', 'Patel', 'MD', 'malay@example.com', 'c40a7d7a48c3af8bd7fb951b33489de2', 1, 1, NULL, NULL, '2020-05-10 16:52:14', '2020-05-10 22:22:14'),
(2, 'tester', 'test', 'TT', 'test@example.com', 'c40a7d7a48c3af8bd7fb951b33489de2', 1, 1, NULL, NULL, '2020-05-10 16:52:27', '2020-05-10 22:22:27'),
(3, 'marketi', 'manager', 'MM', 'market@example.com', '753e91286bebce0ddd63dc0bb65bb7b5', 2, 1, '1', NULL, '2020-05-10 17:08:22', '2020-05-10 22:38:22'),
(4, 'Newmarket', 'Manager', 'NM', 'new@example.com', 'c40a7d7a48c3af8bd7fb951b33489de2', 2, 1, '2', NULL, '2020-05-10 17:08:28', '2020-05-10 22:38:28'),
(5, 'test', 'market', 'TM', 'testmarket@example.com', 'c40a7d7a48c3af8bd7fb951b33489de2', 2, 1, '3,2', NULL, '2020-05-09 23:36:09', '2020-05-10 05:06:09');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bagel', 'bagel', 1, '2020-04-21 12:29:13', '0000-00-00 00:00:00'),
(2, 'Drinks', 'Drinks', 1, '2020-04-21 12:29:18', '0000-00-00 00:00:00'),
(3, 'Art', 'Art', 1, '2020-04-21 12:29:23', '0000-00-00 00:00:00'),
(4, 'Wrap', 'Wrap', 1, '2020-04-21 12:29:28', '0000-00-00 00:00:00'),
(5, 'Sweets', 'Sweets', 1, '2020-04-21 12:29:33', '0000-00-00 00:00:00'),
(6, 'Others', 'Others', 1, '2020-04-21 12:29:37', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `unit`, `price`, `availableqty`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, '6 KG/BAG', 25, 5, 1, '2020-04-22 06:17:53', '2020-04-22 11:47:53'),
(2, 3, 'BAG', 10, 19, 1, '2020-04-24 12:06:42', '2020-04-24 17:36:42'),
(3, 3, 'BTL', 10, 13, 1, '2020-05-10 11:37:28', '2020-05-10 17:07:28'),
(5, 3, '4 BTL/BAG', 25, 1, 1, '2020-05-10 06:41:51', '2020-05-10 12:11:51'),
(6, 3, '15 BTL/BAG', 13, 0, 1, '2020-04-24 12:06:42', '2020-04-24 17:36:42'),
(7, 5, '10 .5BU/BAG', 13, 7, 1, '2020-05-10 11:37:28', '2020-05-10 17:07:28');

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
  `image` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fee` double NOT NULL DEFAULT 5,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `title`, `status`, `location`, `image`, `description`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'Market 1', 1, NULL, NULL, NULL, 5, '2020-04-21 12:30:10', '0000-00-00 00:00:00'),
(2, 'Market 2', 1, NULL, NULL, NULL, 5, '2020-04-21 12:30:14', '0000-00-00 00:00:00'),
(3, 'Market 3', 1, NULL, '5eb83d2814398.jpg', NULL, 5, '2020-05-10 17:43:52', '2020-05-10 23:13:52'),
(4, 'Sample Market', 1, 'adajan', '5eb83eecb2f58.jpg', 'hello this is just a test description', 4, '2020-05-10 00:20:36', '2020-05-10 05:50:36');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `content`, `adminuser_id`, `created_at`) VALUES
(1, 'Nice Poster', '<p>Hello,</p><p><br></p><p>All member from thi akasksakd</p><p>Thanks</p>', 1, '2020-05-10 03:07:32'),
(2, 'Nice Poster', '<p>Hello,</p><p><br></p><p><b>Keyur Patel</b>&nbsp;here</p><p><br></p><p>Thx</p>', 1, '2020-05-10 03:07:58');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `vendor_id`, `itemname`, `unit`, `qty`, `price`, `tax`, `total`, `sitefee`, `vendoramount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Mayur', '10 .5BU/BAG', 4, 13, 1.56, 53.56, 2.68, 50.88, 'pending', '2020-05-10 06:07:28', '2020-05-10 11:37:28'),
(2, 2, 4, 'sadasdasadfafadsa', 'BTL', 1, 10, 0, 10, 0.5, 9.5, 'pending', '2020-05-10 06:07:28', '2020-05-10 11:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `total_items` double NOT NULL,
  `status` varchar(10) NOT NULL,
  `totalamount` double NOT NULL,
  `couponcode` varchar(15) DEFAULT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `fee` double NOT NULL DEFAULT 0,
  `grandtotal` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `market_id`, `total_items`, `status`, `totalamount`, `couponcode`, `discount`, `fee`, `grandtotal`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 5, 'pending', 63.56, '', 0, 1.91, 65.47, '2020-05-10 06:07:28', '2020-05-10 11:37:28');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `product_id`, `image`, `sortorder`) VALUES
(1, 5, '5ea6c46c145e2.jpg', 1),
(2, 5, '5ea6c46c1515c.jpg', 0);

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
  `status` tinyint(4) NOT NULL,
  `is_taxable` tinyint(4) NOT NULL DEFAULT 0,
  `tax` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `vendor_id`, `category_id`, `description`, `image`, `status`, `is_taxable`, `tax`, `created_at`, `updated_at`) VALUES
(1, 'Keyur Patel', 4, 3, 'Hello This is Just A Description ', NULL, 1, 0, 0, '2020-04-20 19:33:55', '2020-04-21 01:03:55'),
(2, 'test', 4, 1, 'fdfdfdf', NULL, 1, 0, 0, '2020-04-20 19:34:06', '2020-04-21 01:04:06'),
(3, 'sadasdasadfafadsa', 4, 3, 'adadasdasdsdasdas', NULL, 1, 0, 0, '2020-04-21 13:17:46', '2020-04-21 01:17:46'),
(4, 'New Product', 4, 3, 'Hello This is a new Product', '5ea6c3b75163c.jpg', 1, 1, 2, '2020-05-10 10:37:04', '2020-05-10 10:37:03'),
(5, 'Mayur', 4, 3, 'aheheh', '5ea6c6208ce20.jpg', 1, 1, 3, '2020-05-10 10:36:43', '2020-05-10 10:36:43');

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
  `phonenumber` varchar(12) NOT NULL,
  `defaultmarket` int(11) DEFAULT 0,
  `defaultvendor` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `businesstype_id`, `businessname`, `address1`, `address2`, `phonenumber`, `defaultmarket`, `defaultvendor`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 'KP STORE', 'Shilalekh', 'Pal', '9638464855', 0, 0, '2020-05-10 13:49:02', '2020-05-10 01:49:02'),
(2, 5, 0, '', 'Shilalekh', 'Pal Surat', '7874631566', 3, 0, '2020-05-10 12:32:37', '2020-05-10 18:02:37');

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
(1, 'CONSUMER_COMMISSION', '3', '2020-05-10 21:24:59', '2020-05-11 02:54:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `initial`, `email`, `password`, `accounttype`, `status`, `otp`, `created_at`, `updated_at`) VALUES
(4, 'keyur', 'patel', 'KP', 'admin@example.com', 'c40a7d7a48c3af8bd7fb951b33489de2', 1, 1, NULL, '2020-04-19 20:51:05', '2020-04-20 02:21:05'),
(5, 'kinal', 'patel', 'KP', 'kinal@example.com', '753e91286bebce0ddd63dc0bb65bb7b5', 2, 1, NULL, '2020-05-08 11:45:15', '2020-05-08 17:15:15');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendormarkets`
--

INSERT INTO `vendormarkets` (`id`, `vendor_id`, `market_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 4, 2, 1, '2020-05-09 20:23:33', '2020-05-10 01:53:33'),
(10, 4, 3, 1, '2020-05-09 20:23:33', '2020-05-10 01:53:33'),
(12, 4, 1, 1, '2020-05-09 20:23:33', '2020-05-10 01:53:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
