# Host: localhost  (Version 5.5.5-10.1.34-MariaDB)
# Date: 2024-01-10 17:07:17
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
  `shift` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daysOfWork` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "account"
#

INSERT INTO `account` VALUES (1,'admin','1234',NULL,NULL,'Active','Admin',NULL,NULL,NULL,NULL,NULL,NULL),(2,'doctor','1234','John','Doe','Active','Doctor',NULL,1,NULL,1,NULL,NULL),(3,'hnurse','1234','Jane','Gray','Active','Head Nurse',NULL,NULL,NULL,1,'01:30:00',NULL),(4,'nurse','12','James','Reid','Active','Nurse',NULL,NULL,3,1,'Morning','Mon, Tue, Wed, Thu, Fri'),(5,'staffs','574439','qq','bbeee','Inactive','Staff',NULL,NULL,NULL,1,NULL,NULL),(6,'qqrr','662608','qw','ew','Inactive','Officer',NULL,NULL,NULL,1,NULL,NULL),(7,'sample','677777','rewq','qwer','Inactive','Admin',NULL,NULL,NULL,1,NULL,NULL),(8,'Nic','447549','Mike','Santiago','Inactive','Nurse',NULL,NULL,3,1,'Afternoon','Mon, Wed, Fri, Sun'),(9,'Mike','123','Mark','Suarez','Active','Nurse',NULL,NULL,3,1,'Morning','Mon, Thu, Sun'),(10,'Butch','124003','Dexter','Romualdez','Inactive','Nurse',NULL,NULL,3,1,'Afternoon','Mon, Wed, Fri'),(11,'Nico','12345','Dominic','Braganza','Active','Nurse',NULL,NULL,3,2,'Afternoon','Wed'),(12,'Doc2','998910','Frank','Smith','Inactive','Doctor',NULL,1,NULL,NULL,NULL,NULL),(13,'testnurse','688357','aa','aa','Inactive','Nurse',NULL,NULL,3,1,'Night Shift','Wed, Sat');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "attendance"
#

INSERT INTO `attendance` VALUES (1,4,'11:46:09','16:43:06','2023-12-13','Out');

#
# Structure for table "department"
#

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "department"
#

INSERT INTO `department` VALUES (1,'Emergency Room'),(2,'Laboratory'),(3,'Station');

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
  `dateAdded` date DEFAULT NULL,
  `monitoredBy` int(11) DEFAULT NULL,
  `timeAdded` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "follow_up"
#

INSERT INTO `follow_up` VALUES (1,3,'36','140/80','50','96','90','Alnix','Patient is now resting ','Observation','2023-11-28',9,'23:00:'),(2,0,'','','','','','','','','2023-11-28',9,'00:00:'),(3,0,'','','','','','','','','2023-11-28',9,'00:00:'),(4,5,'40','140/80','50','96','90','Alnix','Patient is stable','Observation','2023-11-28',9,'23:09:'),(5,5,'40','140/80','50','96','90','qweqweqw','fsfsefsdf','fsdfsdf','2023-11-28',9,'23:58:'),(6,5,'40','140/80','99','96','90','dasdsada','weqweqw','dweqwe','2023-11-29',11,'23:59:'),(7,0,'11','11','11','11','11','11','11','11','2023-11-29',0,'1:45'),(8,0,'11','11','11','11','11','11','11','11','2023-11-29',0,'1:45'),(9,0,'11','11','11','11','11','11','11','11','2023-11-29',4,'1:49'),(10,5,'22','22','22','22','22','22','22','22','2023-11-29',4,'1:50'),(11,9,'37','140/80','50','96','140','benadril','patient is now recovering from asthma','under observation','2023-12-07',9,'15:41'),(12,9,'36','130/90','60','96','120','benadril','patient is  responsive to prescribe  medications ','Observation  for  allergic  reaction','2023-12-07',9,'19:41'),(13,9,'36','160/90','60','98','70','benadril','some  allergic  reaction','vintolin','2023-12-07',9,'23:41'),(14,9,'15','170/90','70','96','61','benadril','patient is critical at this time','Revive','2023-12-07',9,'18:58'),(15,9,'50','170/100','70','99','90','benadril','patient is on fire','patient  is now on fire','2023-12-07',9,'21:03'),(16,5,'100','200','300','200','100','100','cjckf','100','2023-12-13',11,'12:12'),(17,11,'11','11','11','11','11','lklk','lkl','lkk','2024-01-10',9,'05:02'),(18,11,'77','77','7','77','77','77','77','77','2024-01-10',9,'17:07'),(19,11,'88','88','88','88','88','88','88','8','2024-01-10',9,'22:03');

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
  `room` varchar(255) DEFAULT NULL,
  `departmentId` int(11) DEFAULT NULL,
  `nurseId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "medical_record"
#

INSERT INTO `medical_record` VALUES (1,2,2,'kjhkhjk','kjhkjh','kjhkjhkj','Blood Type A+',1,'lkjkljl','2023-11-14','Discharged',NULL,1,NULL),(3,3,2,'suspected allergies','Seafoods, Dust,pollen','Antihestamin','Blood Type A+',3,'rest  adn drink anti allergy meds','2023-11-14','Discharged',NULL,1,NULL),(5,3,2,'asthma','chicken','alnix','Blood Type A+',1,'meds','2023-11-14','Admitted',NULL,1,11),(6,3,2,'sdasdasd','asddasda','sadasdas','Blood Type B+',4,'sdadasda','2023-11-28','Admitted','13',1,4),(7,3,2,'sdasdasd','asddasda','sadasdas','Blood Type B+',4,'sdadasda','2023-11-28','Admitted','13',1,9),(8,3,2,'Allergies','Cetirizine','Alnix','Blood Type AB+',4,'Rest','2023-11-28','Admitted','13',1,10),(9,4,2,'suspected asthma','seafood','benadril','Blood Type A+',4,'patient under observation with 2-3 hrs','2023-12-07','Admitted','12',1,9),(10,5,2,'aa','aa','aa','Blood Type A-',3,'aa','2023-12-13','Admitted','aa',1,NULL),(11,6,12,'jj','jj','jj','Blood Type A+',1,'kk','2023-12-13','Admitted','jj',1,9);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "patient"
#

INSERT INTO `patient` VALUES (2,'kjhkjhkj','2023-12-31','Male','lkjkl','jlkjlk','jlkjlk','lkjlkj@sdsdsds.dsd','lkjlkjlk','lkjlkjlk','jlkjlkj','lkjlkj','lkjlkjlk','lkjlkj','lkjlkjkl','2023-12-31','kjhlkjhjl','Admitted'),(3,'Durc  Balasa','1999-10-24','Male','Brgy Paho','Cadiz City','0976342123','durc@gmail.com','Maria Balasa','Mother','0987212134','','','','','','','Admitted'),(4,'Andrie','1999-09-09','Male','Brgy Paho','Cadiz City','09217361238','k','Mark Alibu','Father','0987212134','Philhealth','12344456','435678','Durc','1998-08-09','3234556','Admitted'),(5,'nbew','2023-12-31','Male','aa','aa','aa','aa','aa','aa','aa','aa','aa','aa','aa','2023-12-31','aa','Admitted'),(6,'kjhkj','2023-12-31','Male','kj','kjk','kj','j','j','j','j','j','j','j','j','2023-12-31','hj','Admitted'),(7,'22','2023-12-13','Male','dff','rr','rr','rt','rr','tr','ff',NULL,NULL,NULL,NULL,NULL,NULL,'Admitted');

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

#
# Structure for table "task"
#

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `mrId` int(11) DEFAULT NULL,
  `context` text,
  `hnurseId` int(11) DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `dateNeeded` date DEFAULT NULL,
  `timeNeeded` time DEFAULT NULL,
  `nurseId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "task"
#

INSERT INTO `task` VALUES (5,11,'jkhkjhkj ---',3,'2024-01-09','Done','2024-12-31','12:59:00',9),(6,11,'lksjdslkfjs',3,'2024-01-09','Pending','2024-12-31','12:59:00',9);
