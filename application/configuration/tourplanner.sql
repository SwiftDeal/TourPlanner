-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2015 at 06:38 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tourplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `package_id` int(11) DEFAULT NULL,
  `users` varchar(32) DEFAULT NULL,
  `transaction_id` varchar(32) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_id` (`package_id`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `experiances`
--

CREATE TABLE IF NOT EXISTS `experiances` (
  `user_id` int(11) DEFAULT NULL,
  `title` text,
  `description` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `user_id` int(11) DEFAULT NULL,
  `package_id` text,
  `description` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `user_id` int(11) DEFAULT NULL,
  `title` text,
  `description` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `item_id` int(11) DEFAULT NULL,
  `limit` text,
  `start` datetime DEFAULT NULL,
  `duration` text,
  `price` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `price` (`price`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `validity` tinyint(4) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `password` (`password`),
  KEY `validity` (`validity`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `phone`, `email`, `password`, `validity`, `id`, `live`, `deleted`, `created`, `modified`) VALUES
('Meraj Ahmad Siddiqui', '9990166950', 'msiddiqui.jmi@gmail.com', 'f7956b2763e6ff1741381e063233bb4d3c512568', 1, 1, 1, 0, '2015-10-03 18:21:59', '2015-10-03 18:21:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
