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
  `course_duration` varchar(5) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `students` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table crm.courses: 4 rows
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`course_id`, `course_name`, `teacher`, `presentation_date`, `start_course_date`, `course_duration`, `description`, `image`, `students`) VALUES
	(18, 'Ù‡Ø¯Ù', '7', '2020-03-03 16:19:00', '2020-03-15 16:19:00', '45', '<p>Ø³Ø´ÛŒØ³ ÛŒØ´Ø³ÛŒØ³Ø´ ÛŒ</p>\r\n<p>Ø³Ø´ÛŒØ´Ø³</p>\r\n<p>Ø¨Ø´Ø³</p>\r\n<p>Ø¨Ø³Ø´</p>\r\n<p>Ø¨</p>\r\n<p>Ø³Ø´</p>\r\n<p>ÛŒØ´Ø³ÛŒØ³Ø´Ø¨Ø´Ø³Ø¨Ø³Ø´Ø¨Ø³Ø´Ø¨Ø´Ø³Ø¨Ø³Ø´ÛŒ</p>', '18.jpg', ''),
	(16, 'Ù‡Ø¯Ù', '', '2020-03-02 16:08:00', '2020-03-16 16:08:00', '54', '<p>fasdas</p>', '16.jpg', ''),
	(17, 'Ù‡Ø¯Ù', '', '2020-03-17 16:13:00', '2020-03-02 16:13:00', '12', '<p>fsdsd</p>', '17.jpg', ''),
	(15, 'Ù‡Ø¯Ù', '', '2020-02-24 16:01:00', '2020-03-08 16:01:00', '45', '<p>Ø³Ù„Ø§Ù…</p>', '', '');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for table crm.tickets
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_openner` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_body` varchar(500) DEFAULT NULL,
  `category` varchar(30) NOT NULL DEFAULT 'open',
  `status` varchar(10) NOT NULL DEFAULT 'open',
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table crm.tickets: 0 rows
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

-- Dumping structure for table crm.ticket_answers
DROP TABLE IF EXISTS `ticket_answers`;
CREATE TABLE IF NOT EXISTS `ticket_answers` (
  `answer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` int(10) unsigned NOT NULL DEFAULT '0',
  `body` varchar(400) DEFAULT NULL,
  `owner` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table crm.ticket_answers: 0 rows
/*!40000 ALTER TABLE `ticket_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_answers` ENABLE KEYS */;

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
	(6, '', '', 'pooya', '1234', 'admin', 'Ù¾ÙˆÛŒØ§', 'Ù…Ø­Ø±Ø§Ø¨ÛŒ', '', '', '09122147996', 1, '', 'mehrabi.pooya@gmail.com', NULL, '', 'ØªÙ‡Ø±Ø§Ù†', '', '', '', '', 'Ø³Ù„Ø§Ù… Ø§Ø³Ù… Ù…Ù† Ù¾ÙˆÛŒØ§ Ø§Ø³Øª', '', '', 'placeholder.png', '', '', 0, ''),
	(7, '', '', 'ehsan', 'ehsanpass', 'admin', 'Ø§Ø­Ø³Ø§Ù†', 'Ù…Ø­Ù…Ø¯ Ø¨ÛŒÚ¯Ù„Ùˆ', '', '', '09127388678', 0, '', 'ebeiglou@gmail.com', 0, '', '', '', '', '', '', 'Ø´Ø³Ø¨Ø³Ø´Ø¨ Ø¨Ø´Ø³', '', '', '7.jpg', '7.jpg', '', 0, ''),
	(8, '', '', 'user', 'user', 'accountant', 'ÙˆÙ„ÛŒØ¯', 'ÛŒÙˆÙ†Ø³', '', '', '', 0, '', '', 0, '', 'ØªÙ‡Ø±Ø§Ù†', '', '', '', '', '', '', '', 'placeholder.png', '', '', 0, '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table crm.users_courses
DROP TABLE IF EXISTS `users_courses`;
CREATE TABLE IF NOT EXISTS `users_courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `course_id` int(10) unsigned NOT NULL,
  `confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `fee` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table crm.users_courses: 1 rows
/*!40000 ALTER TABLE `users_courses` DISABLE KEYS */;
INSERT INTO `users_courses` (`id`, `user_id`, `course_id`, `confirmed`, `fee`) VALUES
	(1, 6, 18, 0, 0);
/*!40000 ALTER TABLE `users_courses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
