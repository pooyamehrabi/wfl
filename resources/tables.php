<?php
include_once 'config.php';

$db_link = mysqli_connect($server, $username, $password, $database);

// Create Students Table
$sql = 'CREATE TABLE `Student` (
          `StudentID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
          `FirstName` VARCHAR(25),
          `LastName` VARCHAR(25) NOT NULL,
          PRIMARY KEY (`StudentID`)
        ) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci';
if ($db_link->query($sql) === TRUE) {
  echo "Table Student created successfully";
} else {
  echo "Error creating table: " . $db_link->error;
}

// Create Courses Table
$sql = 'CREATE TABLE `Course` (
          `CourseID` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
          `Code` VARCHAR(10) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
          `Name` VARCHAR(100) NOT NULL,
          PRIMARY KEY (`CourseID`)
        ) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci';

if ($db_link->query($sql) === TRUE) {
  echo "Table Course created successfully";
} else {
  echo "Error creating table: " . $db_link->error;
}

// Create Skills Table
$sql = 'CREATE TABLE `Skill` (
          `SkillID` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
          `Code` VARCHAR(10) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL,
          `Name` VARCHAR(100) NOT NULL,
          PRIMARY KEY (`SkillID`)
        ) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci';
if ($db_link->query($sql) === TRUE) {
  echo "Table Skill created successfully";
} else {
  echo "Error creating table: " . $db_link->error;
}

$sql = 'CREATE TABLE `CourseMembership` (
            `Student` INT UNSIGNED NOT NULL,
            `Course` SMALLINT UNSIGNED NOT NULL,
            PRIMARY KEY (`Student`, `Course`),
            CONSTRAINT `Constr_CourseMembership_Student_fk`
                FOREIGN KEY `Student_fk` (`Student`) REFERENCES `Student` (`StudentID`)
                ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `Constr_CourseMembership_Course_fk`
                FOREIGN KEY `Course_fk` (`Course`) REFERENCES `Course` (`CourseID`)
                ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=INNODB CHARACTER SET ascii COLLATE ascii_general_ci';
if ($db_link->query($sql) === TRUE) {
  echo "Table CourseMembership created successfully";
} else {
  echo "Error creating table: " . $db_link->error;
}

$sql = 'CREATE TABLE `SkillList` (
          `Student` INT UNSIGNED NOT NULL,
          `Skill` SMALLINT UNSIGNED NOT NULL,
          PRIMARY KEY (`Student`, `Skill`),
          CONSTRAINT `Constr_SkillMembership_Student_fk`
              FOREIGN KEY `Student_fk` (`Student`) REFERENCES `Student` (`StudentID`)
              ON DELETE CASCADE ON UPDATE CASCADE,
          CONSTRAINT `Constr_SkillMembership_Skill_fk`
              FOREIGN KEY `Skill_fk` (`Skill`) REFERENCES `Skill` (`SkillID`)
              ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=INNODB CHARACTER SET ascii COLLATE ascii_general_ci';
if ($db_link->query($sql) === TRUE) {
  echo "Table SkillList created successfully";
} else {
  echo "Error creating table: " . $db_link->error;
}



