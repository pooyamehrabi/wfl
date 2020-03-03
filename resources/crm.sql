-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.20 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5700
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table crm.courses
DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `presentation_date` datetime DEFAULT NULL,
  `start_course_date` datetime DEFAULT NULL,
  `course_time` varchar(5) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `students` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table crm.courses: 5 rows
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`course_id`, `course_name`, `teacher`, `presentation_date`, `start_course_date`, `course_time`, `description`, `image`, `students`) VALUES
	(2, 'Ennegram', '2', NULL, NULL, NULL, 'hi', 'course_no_image.png', NULL),
	(3, 'اناگرام', '1', NULL, NULL, NULL, 'Hi', 'course_no_image.png', NULL),
	(4, 'dsad', '1', NULL, NULL, NULL, 'fadfa', 'course_no_image.png', NULL),
	(5, 'Ø³Ù„Ø§Ù…', '', NULL, '1398-12-21 00:00:00', '21', '<p>ÛŒØ³Ø´Ø¨Ø³Ø´Ø¨Ø³Ø´ ÛŒØ´Ø³ÛŒØ³Ø´ÛŒØ´Ø³</p>\r\n<p>ÛŒØ´Ø³</p>\r\n<p>ÛŒØ³Ø´ ÛŒØ³Ø´</p>\r\n<p>ÛŒØ³Ø´ÛŒØ´Ø³Ø¨Ø´Ø³</p>', '', ''),
	(6, 'Ø³Ù„Ø§Ù…', '', NULL, '1398-12-21 00:00:00', '21', '<p>ÛŒØ³Ø´Ø¨Ø³Ø´Ø¨Ø³Ø´ ÛŒØ´Ø³ÛŒØ³Ø´ÛŒØ´Ø³</p>\r\n<p>ÛŒØ´Ø³</p>\r\n<p>ÛŒØ³Ø´ ÛŒØ³Ø´</p>\r\n<p>ÛŒØ³Ø´ÛŒØ´Ø³Ø¨Ø´Ø³</p>', '', ''),
	(7, 'Ø³Ù„Ø§Ù…', '', NULL, '1398-12-05 00:00:00', '', '', '', ''),
	(8, 'Ø³Ù„Ø§Ù… ÛŒØ³Ø´ÛŒØ´Ø³', '', NULL, '1398-12-13 00:00:00', '23', '<p>ÛŒØ´Ø³Ø¨Ø³Ø´Ø¨ Ø´Ø³Ø¨</p>\r\n<p>Ø¨Ø´</p>\r\n<p>Ø³Ø¨ Ø´Ø³Ø¨</p>\r\n<p>Ø³Ø´Ø¨Ø³Ø´Ø¨</p>\r\n<p>Ø³Ø´Ø¨</p>\r\n<p>Ø³Ø´Ø¨Ø´Ø³</p>', '1-hoGNUS8O9Zvqss65GYKiaA.jpg', ''),
	(9, 'Ø³Ù„Ø§Ù… ÛŒØ³Ø´ÛŒØ´Ø³', '', NULL, '1398-12-12 00:00:00', '', '', '', ''),
	(10, 'Ø³Ù„Ø§Ù… ÛŒØ³Ø´ÛŒØ´Ø³', '', NULL, '1398-12-12 00:00:00', '', '', '', ''),
	(11, 'Ø³Ù„Ø§Ù… ÛŒØ³Ø´ÛŒØ´Ø³', '', NULL, '1398-12-12 00:00:00', '', '', '', ''),
	(12, 'Ø³Ù„Ø§Ù… ÛŒØ³Ø´ÛŒØ´Ø³', '', NULL, '1398-12-12 00:00:00', '', '', '', '');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for table crm.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NID` varchar(10) DEFAULT '',
  `wp_username` varchar(40) DEFAULT '',
  `username` varchar(40) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT 'student',
  `firstname` varchar(20) NOT NULL DEFAULT '',
  `lastname` varchar(30) NOT NULL DEFAULT '',
  `birthday` varchar(30) DEFAULT '',
  `civil_status` varchar(10) DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `mobile_verified` tinyint(1) DEFAULT '0',
  `phone` varchar(20) DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `email_verified` tinyint(1) DEFAULT '0',
  `family_phone` varchar(20) DEFAULT '',
  `address` varchar(200) DEFAULT '',
  `degree` varchar(10) DEFAULT '',
  `study_field` varchar(200) DEFAULT '',
  `job_title` varchar(20) DEFAULT '',
  `experience` varchar(200) DEFAULT '',
  `about` varchar(500) DEFAULT '',
  `refree` varchar(20) DEFAULT '',
  `refree_name` varchar(20) DEFAULT '',
  `picture` varchar(20) DEFAULT '',
  `national_card` varchar(20) DEFAULT '',
  `permissions` varchar(400) DEFAULT '',
  `has_course` tinyint(1) NOT NULL DEFAULT '0',
  `settings` varchar(400) DEFAULT '',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `NID` (`NID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table crm.users: 3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `NID`, `wp_username`, `username`, `password`, `type`, `firstname`, `lastname`, `birthday`, `civil_status`, `mobile`, `mobile_verified`, `phone`, `email`, `email_verified`, `family_phone`, `address`, `degree`, `study_field`, `job_title`, `experience`, `about`, `refree`, `refree_name`, `picture`, `national_card`, `permissions`, `has_course`, `settings`) VALUES
	(6, '', '', 'pooya', '1234', 'admin', 'Ù¾ÙˆÛŒØ§', 'Ù…Ø­Ø±Ø§Ø¨ÛŒ', '', '', '09122147996', 1, '', 'mehrabi.pooya@gmail.com', NULL, '', 'ØªÙ‡Ø±Ø§Ù†', '', '', '', '', '', '', '', 'placeholder.png', '', '', 0, ''),
	(7, '', '', 'ehsan', 'ehsanpass', 'admin', 'Ø§Ø­Ø³Ø§Ù†', 'Ù…Ø­Ù…Ø¯ Ø¨ÛŒÚ¯Ù„Ùˆ', '', '', '09127388678', 0, '', 'ebeiglou@gmail.com', 0, '', '', '', '', '', '', '', '', '', '7.jpg', '7.gif', '', 0, ''),
	(8, '', '', 'user', 'user', 'accountant', 'ÙˆÙ„ÛŒØ¯', 'ÛŒÙˆÙ†Ø³', '', '', '', 0, '', '', 0, '', 'ØªÙ‡Ø±Ø§Ù†', '', '', '', '', '', '', '', 'placeholder.png', '', '', 0, '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table crm.users_courses
DROP TABLE IF EXISTS `users_courses`;
CREATE TABLE IF NOT EXISTS `users_courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `course_id` int(10) unsigned NOT NULL,
  `fee` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table crm.users_courses: 0 rows
/*!40000 ALTER TABLE `users_courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_courses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
