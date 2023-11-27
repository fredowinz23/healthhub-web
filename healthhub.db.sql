# Host: localhost  (Version 5.5.5-10.1.34-MariaDB)
# Date: 2023-11-20 17:24:27
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "account"
#

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `Id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactive',
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'Customer',
  `dateAdded` date DEFAULT NULL,
  `drSpecialtyId` int(11) DEFAULT NULL,
  `nHeadNurseId` int(11) DEFAULT NULL,
  `departmentId` int(11) DEFAULT NULL,
  `shiftStart` time DEFAULT NULL,
  `shiftEnd` time DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "account"
#

INSERT INTO `account` VALUES (1,'admin','1234',NULL,NULL,'Active','Admin',NULL,NULL,NULL,NULL,NULL,NULL),(2,'doctor','12','John','Doe','Active','Doctor',NULL,1,NULL,NULL,NULL,NULL),(3,'hnurse','1234','Jane','Gray','Active','Head Nurse',NULL,NULL,NULL,1,'01:30:00','01:30:00'),(4,'nurse','12','James','Reid','Active','Nurse',NULL,NULL,3,1,'01:38:00','13:38:00'),(5,'staffs','574439','qq','bbeee','Inactive','Staff',NULL,NULL,NULL,NULL,NULL,NULL),(6,'qqrr','662608','qw','ew','Inactive','Officer',NULL,NULL,NULL,NULL,NULL,NULL),(7,'sample','677777','rewq','qwer','Inactive','Admin',NULL,NULL,NULL,NULL,NULL,NULL),(8,'Nic','447549','Mike','Santiago','Inactive','Nurse',NULL,NULL,3,0,'07:00:00','16:00:00'),(9,'Mike','123','Mark','Suarez','Active','Nurse',NULL,NULL,3,0,'08:00:00','17:55:00'),(10,'Butch','124003','Dexter','Romualdez','Inactive','Nurse',NULL,NULL,3,0,'21:49:00','18:49:00');

#
# Structure for table "attendance"
#

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nurseId` int(11) DEFAULT NULL,
  `timeIn` time DEFAULT NULL,
  `timeOut` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'In',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "attendance"
#

INSERT INTO `attendance` VALUES (6,4,'01:05:52',NULL,'2023-11-13','In'),(7,8,'18:52:20','18:54:01','2023-11-14','Out'),(8,9,'18:52:23','18:57:50','2023-11-14','Out');

#
# Structure for table "department"
#

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "department"
#

INSERT INTO `department` VALUES (1,'Emergency Room'),(2,'Laboratory');

#
# Structure for table "follow_up"
#

DROP TABLE IF EXISTS `follow_up`;
CREATE TABLE `follow_up` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `mrId` int(11) DEFAULT NULL,
  `temperature` varchar(255) DEFAULT NULL,
  `bloodPressure` varchar(255) DEFAULT NULL,
  `respiratoryRate` varchar(255) DEFAULT NULL,
  `oxygen` varchar(255) DEFAULT NULL,
  `cardiacRate` varchar(255) DEFAULT NULL,
  `medications` varchar(255) DEFAULT NULL,
  `observations` varchar(255) DEFAULT NULL,
  `recommendations` text,
  `dateAdded` varchar(255) DEFAULT NULL,
  `monitoredBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "follow_up"
#

INSERT INTO `follow_up` VALUES (1,1,'kjhkj','hkjhkj','hkj','hkjh','kjhkj','hkjh','kjhkjh','kjhkj','2023-11-14 11:04:43',2),(2,2,'qq','lkjklj','kjlkj','lkjklj','lkjklj','lkjlkj','lkjklj','lkjklj','2023-11-14 12:42:23',2),(3,2,'kjhkjh','kjhkjh','jkhkjh','kjhkjh','kjhkjh','kjhkjh','kjhkjhk','kjhkj','2023-11-14 12:43:09',2),(4,2,'kjhjkh','kjhkjh','kjhkj','hkjh','kjhkjh','kjhkj','kjhkj','hkjhkj','2023-11-14 12:50:54',2),(5,2,'kjhkjh','kjhkjh','kjhkjh','kjhkjh','kjhkjh','kjhkjh','kjhkjh','kjhkj','2023-11-14 12:51:50',4),(6,3,'40','160','50','80','70','Alnix','Patient is having problems breathing','Assess','2023-11-14 19:04:49',9);

#
# Structure for table "medical_record"
#

DROP TABLE IF EXISTS `medical_record`;
CREATE TABLE `medical_record` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `patientId` int(11) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `reasonForAdmission` varchar(255) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `medications` varchar(255) DEFAULT NULL,
  `bloodType` varchar(255) DEFAULT NULL,
  `symptomId` int(11) DEFAULT NULL,
  `doctorsOrders` text,
  `dateAdded` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Admitted',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "medical_record"
#

INSERT INTO `medical_record` VALUES (1,2,2,'kjhkhjk','kjhkjh','kjhkjhkj','Blood Type A+',1,'lkjkljl','2023-11-14','Discharged'),(3,3,2,'suspected allergies','Seafoods, Dust,pollen','Antihestamin','Blood Type A+',3,'rest  adn drink anti allergy meds','2023-11-14','Discharged'),(5,3,2,'asthma','chicken','alnix','Blood Type A+',1,'meds','2023-11-14','Admitted');

#
# Structure for table "patient"
#

DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `emergencyContactName` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `emergencyPhoneNumber` varchar(255) DEFAULT NULL,
  `insuranceProvider` varchar(255) DEFAULT NULL,
  `policyNumber` varchar(255) DEFAULT NULL,
  `groupNumber` varchar(255) DEFAULT NULL,
  `subscriberName` varchar(255) DEFAULT NULL,
  `subscriberDob` varchar(255) DEFAULT NULL,
  `subscriberId` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Admitted',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "patient"
#

INSERT INTO `patient` VALUES (2,'kjhkjhkj','2023-12-31','Male','lkjkl','jlkjlk','jlkjlk','lkjlkj@sdsdsds.dsd','lkjlkjlk','lkjlkjlk','jlkjlkj','lkjlkj','lkjlkjlk','lkjlkj','lkjlkjkl','2023-12-31','kjhlkjhjl','Discharged'),(3,'Durc  Balasa','1999-10-24','Male','Brgy Paho','Cadiz City','0976342123','durc@gmail.com','Maria Balasa','Mother','0987212134','','','','','','','Admitted');

#
# Structure for table "specialty"
#

DROP TABLE IF EXISTS `specialty`;
CREATE TABLE `specialty` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "specialty"
#

INSERT INTO `specialty` VALUES (1,'Pediatrics'),(2,'Cardiology');

#
# Structure for table "symptom"
#

DROP TABLE IF EXISTS `symptom`;
CREATE TABLE `symptom` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "symptom"
#

INSERT INTO `symptom` VALUES (1,'Sore throats'),(3,'sample'),(4,'fever');
