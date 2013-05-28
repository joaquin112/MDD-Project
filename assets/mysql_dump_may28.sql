-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2013 at 11:26 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `MDD`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(2, '::1', 'safsa', '2013-05-21 23:23:13'),
(3, '::1', 'safsa', '2013-05-21 23:23:15'),
(4, '::1', 'safa', '2013-05-21 23:28:22'),
(5, '::1', 'safsaf', '2013-05-21 23:29:35'),
(6, '::1', 'sdgdsgds', '2013-05-21 23:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `default` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `default`) VALUES
(1, 'admin', 0),
(2, 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thoughts`
--

CREATE TABLE `thoughts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `imagepath` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `numcomments` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `rating` decimal(2,1) NOT NULL DEFAULT '0.0',
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `thoughts`
--

INSERT INTO `thoughts` (`id`, `title`, `url`, `imagepath`, `author`, `date`, `numcomments`, `category`, `rating`, `votes`) VALUES
(3, 'Can or Can''t', 'can-or-cant', 'http://www.thewellnesswarrior.com.au/wp-content/uploads/2012/02/positive-thinking-1.jpg', 1, 1369414703, 0, 'undefined', 0.0, 0),
(4, 'Think Positive', 'think-positive', 'http://www.talesofarantingginger.com/wp-content/uploads/2013/02/positive-quote.png', 1, 1369691089, 0, 'undefined', 0.0, 0),
(5, 'Think Positive...', 'think-positive', 'http://api.ning.com/files/A4SIjDw95N0AxBVVKrCTUk5XQGsDL0iubq8JHY0bFDIg0KSAjVlw-YLBFVmuw2lVWB4zVnrw9DnvG3JRlQgIuxOkDYALgdvI/positivetwo.jpg', 1, 1369693579, 0, 'undefined', 5.0, 1),
(6, 'Success is...', 'success-is', 'http://paulmitchellgold.files.wordpress.com/2012/10/success.jpg', 2, 1369699123, 0, 'undefined', 4.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `role_id` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'Joaquin', '$2a$08$/dvHNnPQdGt3eVLGtjZhee6mpVzc1jjy8jviSMBUM7fmjpYN5jQ9G', 'joaquin@joaquin.cc', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '0000-00-00 00:00:00', '2013-05-22 01:18:20', '2013-05-21 23:18:20'),
(2, 'admin', '$2a$08$sp0dtKoaZ7o6NR3xRrJTwOfanFZCf4.z1gJCBhAD05eJKJqkAib6C', 'admin@admin.com', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '2013-05-28 22:34:24', '2013-05-22 01:31:50', '2013-05-28 20:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('9f3e824cb34c3d20c53e29526ad9da62', 2, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.65 Safari/537.31', '::1', '2013-05-21 23:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `thoughtid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `userid`, `thoughtid`, `rating`, `time`) VALUES
(1, 2, 6, 5, 1369705349),
(2, 2, 5, 5, 1369705370);
