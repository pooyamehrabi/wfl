-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for crm
DROP DATABASE IF EXISTS `crm`;
CREATE DATABASE IF NOT EXISTS `crm` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `crm`;

-- Dumping structure for table crm.courses
DROP TABLE IF EXISTS `Courses`;
CREATE TABLE IF NOT EXISTS `Courses` (
  `course_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `start_course_date` varchar(30) NOT NULL,
  `course_time` varchar(30) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `students` varchar(50) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Dumping data for table crm.courses: 0 rows
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for table crm.users
DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NID` varchar(10) DEFAULT '',
  `wp_username` varchar(40) DEFAULT '',
  `username` varchar(40) DEFAULT '',
  `password` varchar(40) DEFAULT '',
  `type` varchar(10) DEFAULT 'student',
  `firstname` varchar(20) DEFAULT '',
  `lastname` varchar(30) DEFAULT '',
  `birthday` varchar(30) DEFAULT '',
  `civil_status` varchar(10) DEFAULT '',
  `mobile` varchar(20) DEFAULT '',
  `mobile_verfied` tinyint(1) DEFAULT '0',
  `phone` varchar(20) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `email_verfied` tinyint(1) DEFAULT '0',
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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `email` (`email`),
  KEY `NID` (`NID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table crm.users: 1 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `NID`, `wp_username`, `username`, `password`, `type`, `firstname`, `lastname`, `birthday`, `civil_status`, `mobile`, `mobile_verfied`, `phone`, `email`, `email_verfied`, `family_phone`, `address`, `degree`, `study_field`, `job_title`, `experience`, `about`, `refree`, `refree_name`, `picture`, `national_card`) VALUES
	(6, '', '', 'pooya', '1234', 'student', 'Ù¾ÙˆÛŒØ§', 'Ù…Ø­Ø±Ø§Ø¨ÛŒ', '', '', '09122147996', NULL, '', 'mehrabi.pooya@gmail.com', NULL, '', '', '', '', '', '', '', '', '', '', '');
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
