-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2020 at 07:41 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 5.6.40

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `firstname`, `lastname`, `initial`, `email`, `password`, `accounttype`, `status`, `markets`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'The', 'PickApp', 'MD', 'admin@example.com', 'e6e061838856bf47e1de730719fb2609', 1, 1, NULL, NULL, '2020-05-27 13:49:17', '2020-05-27 19:19:17'),
(2, 'tester', 'test', 'TT', 'test@example.com', '148b7a4c120fab9e839387afa9015fcf', 1, 1, NULL, NULL, '2020-05-18 13:19:17', '2020-05-18 18:49:17'),
(3, 'marketi', 'manager', 'MM', 'market@example.com', '148b7a4c120fab9e839387afa9015fcf', 2, 1, '3,2,1', NULL, '2020-05-18 13:19:19', '2020-05-18 18:49:19'),
(4, 'Newmarket', 'Manager', 'NM', 'new@example.com', '148b7a4c120fab9e839387afa9015fcf', 2, 1, '2,4', NULL, '2020-05-26 12:03:06', '2020-05-26 17:33:06'),
(5, 'test', 'market', 'TM', 'testmarket@example.com', '148b7a4c120fab9e839387afa9015fcf', 2, 1, '3,2', NULL, '2020-05-18 13:19:27', '2020-05-18 18:49:27'),
(6, 'New', 'Market', 'NM', 'newmarket@example.com', 'c31e54d895f4cab990c0f9f36b2ad82e', 2, 1, '5,3,1', NULL, '2020-05-27 17:20:09', '2020-05-27 22:50:09');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `unit`, `price`, `availableqty`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, '6 KG/BAG', 25, 3, 1, '2020-05-16 12:31:18', '2020-05-16 18:01:18'),
(2, 3, 'BAG', 10, 19, 1, '2020-04-24 12:06:42', '2020-04-24 17:36:42'),
(3, 3, 'BTL', 10, 13, 1, '2020-05-10 11:37:28', '2020-05-10 17:07:28'),
(5, 3, '4 BTL/BAG', 25, 1, 1, '2020-05-10 06:41:51', '2020-05-10 12:11:51'),
(6, 3, '15 BTL/BAG', 13, 0, 1, '2020-04-24 12:06:42', '2020-04-24 17:36:42'),
(7, 5, '10 .5BU/BAG', 13, 1, 1, '2020-05-17 18:33:09', '2020-05-18 00:03:09'),
(8, 6, '.5BU', 5, 9, 1, '2020-05-27 17:48:56', '2020-05-27 23:18:56'),
(9, 6, '.5BU', 15, 123, 1, '2020-05-27 17:48:56', '2020-05-27 23:18:56'),
(10, 7, 'KG', 10, 45, 1, '2020-05-27 17:48:56', '2020-05-27 23:18:56');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `title`, `status`, `location`, `lat`, `lng`, `image`, `description`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'Market 1', 1, 'Surat Railway Station, Ved Rd, Railway Station Area, Varachha, Surat, Gujarat, India', '21.204946', '72.8407345', '5ec1b76b14f7d.jpg', 'Nice Market Place', 5, '2020-05-17 04:50:59', '2020-05-17 10:20:59'),
(2, 'Market 2', 1, NULL, NULL, NULL, NULL, NULL, 5, '2020-04-21 12:30:14', '0000-00-00 00:00:00'),
(3, 'Market 3', 1, NULL, NULL, NULL, '5eb83d2814398.jpg', NULL, 5, '2020-05-10 17:43:52', '2020-05-10 23:13:52'),
(4, 'Sample Market', 1, 'adajan', NULL, NULL, '5eb83eecb2f58.jpg', 'hello this is just a test description', 4, '2020-05-10 00:20:36', '2020-05-10 05:50:36'),
(5, 'Sarojini Naydu Vegetable Market', 1, 'Vidhyakunj Hindi Vidyalaya, Pankaj Nagar, Surat, Gujarat, India', '21.20946619999999', '72.78102', '5ec1b9a720b89.png', 'All types of vegetables available', 5, '2020-05-17 04:54:39', '2020-05-17 10:24:39'),
(6, 'New Market', 1, 'New York Railway Supply, Thornton Drive, Westlake, TX, USA', '32.967111', '-97.23012399999999', '5ece9fa102580.png', 'Test Location for Market', 5, '2020-05-26 23:43:05', '2020-05-27 05:13:05');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `vendor_id`, `itemname`, `comment`, `unit`, `qty`, `price`, `tax`, `total`, `sitefee`, `vendoramount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Mayur', 'Nice Product', '10 .5BU/BAG', 3, 13, 1.17, 40.17, 2.01, 38.16, 'approved', '2020-05-17 18:59:10', '2020-05-18 00:29:10'),
(2, 2, 11, 'Banana', '', 'KG', 5, 10, 0, 50, 2.5, 47.5, 'approved', '2020-05-27 17:49:46', '2020-05-27 23:19:46'),
(3, 2, 4, 'Sample Test', '', '.5BU', 2, 15, 0, 30, 1.5, 28.5, 'approved', '2020-05-27 17:50:15', '2020-05-27 23:20:15'),
(4, 2, 4, 'Sample Test', '', '.5BU', 1, 5, 0, 5, 0.25, 4.75, 'approved', '2020-05-27 17:50:35', '2020-05-27 23:20:35');

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
  `customer_id` varchar(250) DEFAULT NULL,
  `payment_method` varchar(250) DEFAULT NULL,
  `last4` int(4) DEFAULT NULL,
  `paymentstatus` varchar(15) NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `market_id`, `total_items`, `status`, `totalamount`, `couponcode`, `discount`, `fee`, `grandtotal`, `customer_id`, `payment_method`, `last4`, `paymentstatus`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 3, 'approved', 40.17, '', 0, 1.21, 41.38, 'cus_HISC8kDAvLrRl2', 'card_1GjrINBz8hwDGXwaW3OlfjLo', 1111, 'paid', '2020-05-17 19:00:21', '2020-05-18 00:30:21'),
(2, 12, 5, 8, 'approved', 85, '', 0, 2.55, 87.55, 'cus_HMBk3t9jKcCAAz', 'card_1GnTN2Bz8hwDGXwauJzweoMk', 1111, 'paid', '2020-05-27 17:50:38', '2020-05-27 23:20:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `product_id`, `image`, `sortorder`) VALUES
(1, 5, '5ea6c46c145e2.jpg', 1),
(2, 5, '5ea6c46c1515c.jpg', 0),
(6, 6, '5ece67915d073.png', 0),
(7, 6, '5ece6791e1fc5.jpg', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
(7, 'Banana', 11, 6, 'Banana', '', '5', 1, 0, 0, 0, '2020-05-26 23:59:26', '2020-05-27 05:29:26');

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
  `image` varchar(200) DEFAULT NULL,
  `defaultmarket` int(11) DEFAULT 0,
  `defaultvendor` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `businesstype_id`, `businessname`, `address1`, `address2`, `zipcode`, `phonenumber`, `image`, `defaultmarket`, `defaultvendor`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'KP STORE', 'Shilalekh', 'Pal', '10001', '9638464855', '5eccfaa52bdd4.png', 0, 0, '2020-05-26 11:23:08', '2020-05-26 11:23:08'),
(2, 5, 0, '', 'Shilalekh', 'Pal Surat', '10016', '7874631566', '5ec1359f8e92e.jpg', 3, 0, '2020-05-18 12:16:22', '2020-05-18 17:46:22'),
(3, 7, 6, 'Vendor New', 'abcd', 'xyz', '10016', '9898598555', '', 0, 0, '2020-05-17 06:11:22', '2020-05-17 11:41:22'),
(4, 10, 0, '', '201 Shilalekh', 'pal', '10001', '9898598555', '5ece6ec5dc747.png', 3, 0, '2020-05-27 13:47:40', '2020-05-27 19:17:40'),
(5, 11, 6, 'New Vendor', 'Sample Address', 'Sample Address2', '10001', '9898598555', '5ecea289bc644.png', 0, 0, '2020-05-26 23:55:29', '2020-05-27 05:25:29'),
(6, 12, 0, '', 'Sample Address', 'Sample Address2', '10001', '9898598555', '5ecea5f04256f.png', 5, 0, '2020-05-27 17:42:30', '2020-05-27 23:12:30');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stripeaccounts`
--

INSERT INTO `stripeaccounts` (`id`, `user_id`, `access_token`, `livemode`, `refresh_token`, `token_type`, `stripe_publishable_key`, `stripe_user_id`, `scope`, `created_at`, `updated_at`) VALUES
(1, 4, 'sk_test_R3qBHzEargoEYozcREqXrsOe00eZVR373X', '0', 'rt_HISBgOjzFrkvMuJbTZHlSJcqv4BWb8M0w8SIoF0sQYhcz9ov', 'bearer', 'pk_test_uZZe6DTTidQ7u5u72w1Anmcp00zwHEwD3r', 'acct_1GjrF9DnMJT4bw0i', 'express', '2020-05-26 11:29:00', '2020-05-26 16:59:00'),
(2, 11, 'sk_test_WwIWu0pXIRU8BEXHK1zevbWN00wDh73iTV', '0', 'rt_HMBOLSWWtjYitF2CdjIvfiTNPQvVwCHWmSzJ9PAO9XaOH688', 'bearer', 'pk_test_sGvytGjMIfBqXRSNlhXlSCnU00t6exD364', 'acct_1GnT11IMYnnICosq', 'express', '2020-05-27 17:27:15', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stripecharges`
--

INSERT INTO `stripecharges` (`id`, `order_id`, `user_id`, `charge_id`, `amount`, `refund_id`, `amount_refunded`, `created`, `currency`, `livemode`, `payment_method`, `receipt_url`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 5, 'ch_1GjrhcBz8hwDGXwa80UkWpvK', 41.38, NULL, 0, '1589741952', 'usd', '0', 'card_1GjrINBz8hwDGXwaW3OlfjLo', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1GjrhcBz8hwDGXwa80UkWpvK/rcpt_HIScIY7rB4bxU2SFSOdJuwA1cZD8so9', 'succeeded', '2020-05-17 18:59:13', '0000-00-00 00:00:00'),
(4, 2, 12, 'ch_1GnTOiBz8hwDGXwa5VSWRDql', 87.55, NULL, 0, '1590601836', 'usd', '0', 'card_1GnTN2Bz8hwDGXwauJzweoMk', 'https://pay.stripe.com/receipts/acct_1GfYy3Bz8hwDGXwa/ch_1GnTOiBz8hwDGXwa5VSWRDql/rcpt_HMBmNuGm6KiwxjbnmwZc8RsCHAUhToj', 'succeeded', '2020-05-27 17:50:38', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stripecustomers`
--

INSERT INTO `stripecustomers` (`id`, `user_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'cus_HISC8kDAvLrRl2', '2020-05-17 18:33:09', '0000-00-00 00:00:00'),
(2, 12, 'cus_HMBk3t9jKcCAAz', '2020-05-27 17:48:55', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `initial`, `email`, `password`, `accounttype`, `status`, `otp`, `created_at`, `updated_at`) VALUES
(4, 'keyur', 'patel', 'KP', 'vendor@example.com', '251b1847fae3f1f3ae6bb775614ad7d7', 1, 1, NULL, '2020-05-23 11:50:29', '2020-05-23 17:20:29'),
(5, 'kinal', 'patel', 'KP', 'customer@example.com', '148b7a4c120fab9e839387afa9015fcf', 2, 1, NULL, '2020-05-18 13:19:04', '2020-05-18 18:49:04'),
(7, 'vendor', 'new', 'VN', 'vendor2@example.com', '148b7a4c120fab9e839387afa9015fcf', 1, 1, NULL, '2020-05-18 13:19:07', '2020-05-18 18:49:07'),
(9, 'keyur', 'patel', 'KP', 'kp@example.com', 'c40a7d7a48c3af8bd7fb951b33489de2', 1, 1, NULL, '2020-05-21 19:38:18', '2020-05-22 01:08:18'),
(10, 'consumer', 'consumer', 'CC', 'consumer@example.com', '745a7b90b791da3e9409b9d83de6f836', 2, 1, NULL, '2020-05-26 19:59:59', '2020-05-27 01:29:59'),
(11, 'new', 'vendor', 'NV', 'newvendor@example.com', 'fcfadd86d788cb4bc7dd896739e1b9c0', 1, 1, NULL, '2020-05-26 23:54:49', '2020-05-27 05:24:49'),
(12, 'new', 'consumer', 'NC', 'newconsumer@example.com', 'd0f9c6217d648f8832567d16c3368ea4', 2, 1, NULL, '2020-05-27 00:09:12', '2020-05-27 05:39:12');

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
(19, 4, 5, 1, 1, NULL, '2020-05-27 17:46:01', '2020-05-27 23:16:01');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zipcodes`
--

INSERT INTO `zipcodes` (`id`, `zipcode`, `lat`, `lng`, `city`, `state`, `created_at`, `updated_at`) VALUES
(1, '10001', '40.75065', '-73.996924', 'New York', 'NY', '2020-05-17 13:25:30', '0000-00-00 00:00:00'),
(2, '12345', '42.800004', '-73.920153', 'Schenectady', 'NY', '2020-05-17 13:25:43', '0000-00-00 00:00:00'),
(3, '10016', '40.745207', '-73.978018', 'New York', 'NY', '2020-05-17 13:35:52', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
