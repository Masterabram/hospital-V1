-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2016 at 07:09 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hosy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookappointment`
--

CREATE TABLE IF NOT EXISTS `bookappointment` (
  `name` varchar(30) NOT NULL,
  `tell` varchar(10) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `address` varchar(15) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `problemcat` varchar(20) DEFAULT NULL,
  `age` int(12) DEFAULT NULL,
  `problemdsc` varchar(150) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookappointment`
--

INSERT INTO `bookappointment` (`name`, `tell`, `email`, `address`, `date`, `sex`, `status`, `time`, `problemcat`, `age`, `problemdsc`, `timestamp`) VALUES
('Abraham', '0790463533', 'abramogol@gmail.com', 'ksm', '1/11/1111', 'm', 'single', '11:30', NULL, NULL, NULL, '2016-04-17 20:38:26'),
('Abraham', '0790463533', 'abramogol@gmail.com', 'ksm', '1/11/1111', 'male', 'single', '11:30', 'emotional', 18, 'null', '2016-04-17 20:43:04'),
('Abraham Ogol', '0790463533', 'abramogol@gmail.com', 'ksm', '19/11/1998', 'MALE', 'single', '11:30', 'Emotional', 11, '<p>111</p>', '2016-04-18 02:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `inde` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` varchar(200) NOT NULL,
  PRIMARY KEY (`inde`),
  UNIQUE KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`inde`, `timestamp`, `comment`) VALUES
(1, '2016-04-13 15:41:31', 'Submitt Comment'),
(2, '2016-04-13 15:44:22', 'atri haitumi'),
(3, '2016-04-21 20:28:38', 'hello  i am testing pegination\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `receptiomadd`
--

CREATE TABLE IF NOT EXISTS `receptiomadd` (
  `Sname` varchar(15) NOT NULL,
  `othername` varchar(20) NOT NULL,
  `ID` varchar(15) NOT NULL,
  `image` text,
  `email` varchar(11) DEFAULT NULL,
  `contact` int(14) NOT NULL,
  `sex` text NOT NULL,
  `address` varchar(11) DEFAULT NULL,
  `fuculty` varchar(12) DEFAULT NULL,
  `course` varchar(12) DEFAULT NULL,
  `dob` varchar(12) DEFAULT NULL,
  `health_info` varchar(200) DEFAULT NULL,
  `timein` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `ID_2` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptiomadd`
--

INSERT INTO `receptiomadd` (`Sname`, `othername`, `ID`, `image`, `email`, `contact`, `sex`, `address`, `fuculty`, `course`, `dob`, `health_info`, `timein`) VALUES
('Noreah', 'Joan', '12/3423/23', NULL, 'n@g.co.ke', 9049739, '{sex}', '3dfsfscz', NULL, NULL, NULL, NULL, '2016-04-03 05:06:56'),
('blasss', 'anms', '1223421', NULL, '1@gmail.com', 1344323, '{sex}', 'fewdfs', NULL, NULL, NULL, NULL, '2016-04-01 00:13:41'),
('odipo', 'stephen', '123', NULL, 'odipo@stima', 123456789, '{sex}', 'ngori stree', NULL, NULL, NULL, NULL, '2016-03-31 22:00:57'),
('odipo', 'stephen', '1233', 'example.jpg', 'odipo@stima', 123456789, '{sex}', 'ngori stree', NULL, NULL, NULL, 'very sick', '2016-04-26 09:01:19'),
('Admin', 'anms', '1298/12/4/', NULL, 'a@fd.co', 34567, '{sex}', '5332343', NULL, NULL, NULL, NULL, '2016-04-02 07:38:30'),
('odipo', 'stephen', '1321241', NULL, 'odipo@stima', 123456789, '{sex}', 'ngori stree', NULL, NULL, NULL, NULL, '2016-03-31 21:53:43'),
('Kweyu', 'Kevin', '1563312', NULL, 's@dt.com', 3456789, '{sex}', 'limhj', NULL, NULL, NULL, NULL, '2016-04-01 15:27:41'),
('Sarah', 'oyu', '21/12/1/2/1/12', NULL, 'sads@sds.co', 2147483647, '{sex}', 'nyawita', NULL, NULL, NULL, NULL, '2016-04-18 15:04:03'),
('VIN', 'OMPNDI', '23/2/3/232', NULL, 'V@X.com', 98765543, '{sex}', 'ewfdsfdsfds', NULL, NULL, NULL, NULL, '2016-04-02 17:27:36'),
('Dick', ' Dick', '234/234/344/555', NULL, 'dick@gmail.', 790463533, '{sex}', 'ngori stree', NULL, NULL, NULL, NULL, '2016-04-18 11:39:22'),
('lelele', 'lelelele', '343/fsd/34', NULL, 'sads@sds.co', 2147483647, '{sex}', '235232', NULL, NULL, NULL, NULL, '2016-04-02 17:45:16'),
('New', 'NEW', 'ci/000/12', NULL, 'abramogol@g', 790463533, 'M', 'nyawita', 'M', 'BSC IT', '1995/11/11', NULL, '2016-04-19 11:15:27'),
('steve', 'Ondeche', 'ci/00067/0', NULL, 'ondeche@gma', 790536722, '{sex}', 'luanda', NULL, NULL, NULL, NULL, '2016-03-31 21:00:40'),
('GEOFREY', 'KANINI', 'CI/00069/0', NULL, 'ge@gjkf.com', 2147483647, '{sex}', 'idp', NULL, NULL, NULL, NULL, '2016-04-04 07:14:17'),
('Alex', 'Kimeu', 'ci/00076/014', NULL, 'kimeualexis', 9876543, '{sex}', 'Ruaraka', NULL, NULL, NULL, NULL, '2016-04-05 07:40:51'),
('Adhiambo', 'Mary Emmaculate', 'CI/00094/0', NULL, 'emmaculatem', 700798605, '{sex}', 'Kisumu', NULL, NULL, NULL, NULL, '2016-04-01 07:41:25'),
('Abraham', 'Abraham Otieno', 'ci/00097/0', NULL, 'abramogol@g', 790463533, '{sex}', 'Nyawita', NULL, NULL, NULL, NULL, '2016-03-30 18:47:45'),
('EMMA ', 'MERCY', 'ci/03009/014', NULL, 'emmamercy17', 790765435, 'F', 'mac', 'M', 'BSC IT', '1995/12/12', NULL, '2016-04-29 06:20:16'),
('anan', 'dasda', 'ds/323', NULL, '232w@efe.co', 0, '{sex}', 'sdfds', NULL, NULL, NULL, NULL, '2016-04-02 17:28:48'),
('srsr', 'trds5t6', 'htdf6', NULL, 'cf@gmail.co', 2345678, '{sex}', 'ytfy', NULL, NULL, NULL, NULL, '2016-04-04 19:56:51'),
('djdsnf', 'dskjdsnf', 'sdkjnfds', NULL, 'sdjds@gmail', 0, '{sex}', 'ewfdsfdsfds', NULL, NULL, NULL, NULL, '2016-04-02 17:51:49'),
('emma', 'wendy3', 'wead', NULL, 'emmamercy17', 70, 'F', 'maseno', 'M', 'bsc.it', '2018/1/1', NULL, '2016-04-29 06:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `dob` date NOT NULL,
  `sex` text NOT NULL,
  `active` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contact` int(14) NOT NULL,
  `altcontact` int(14) DEFAULT NULL,
  `level` int(1) NOT NULL,
  `experience` text NOT NULL,
  `depertment` varchar(30) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `workhrs` varchar(20) DEFAULT NULL,
  `Prefrance` varchar(21) DEFAULT NULL,
  `timestamp` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `name`, `image`, `dob`, `sex`, `active`, `email`, `username`, `password`, `contact`, `altcontact`, `level`, `experience`, `depertment`, `qualification`, `workhrs`, `Prefrance`, `timestamp`) VALUES
(2, 'Abraham Ogol', NULL, '0000-00-00', 'M', '', 'abramogol@gmail.com', '', 'rdggds', 790463244, 2147483647, 5, 'ddsfd', 'Management', 'sfsdfsf', '4', 'D/N', '2016-04-05 01:23:26'),
(7, 'Kemondio', NULL, '0000-00-00', 'M', '', 'kimeualexis@gmail.com', 'alex_kimeu', 'sodapop254kim!', 790512720, 711374778, 2, '', 'Nurse', '', '4', 'D/N', '0000-00-00 00:00:00'),
(9, 'Obrien', 'example.jpg', '0000-00-00', 'M', '', 'obrien.makwata8@gmail.com', 'aom', 'aom123', 727857840, 718218398, 5, 'unique', 'Reception', 'Receptionist', '4', 'D/N', '2016-04-22 16:25:22'),
(5, 'Abraham Ogol', NULL, '0000-00-00', 'M', '', 'abramogol@gmail.com', 'doctor', 'doctor1', 790463244, 2147483647, 0, '', 'Management', '', '4', 'D/N', '2016-04-26 08:02:58'),
(8, 'steve', NULL, '0000-00-00', 'M', '', 'def@gmail.com', 'stdipsy', 'steve18286', 705806193, 2147483647, 1, 'very qualified', 'Nurse', 'certificate in dogs management', '16', 'D', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `ID` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `visit_id` int(10) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `age` int(3) DEFAULT NULL,
  `bp` varchar(5) DEFAULT NULL,
  `temp` varchar(5) DEFAULT NULL,
  `weight` varchar(5) DEFAULT NULL,
  `height` varchar(5) DEFAULT NULL,
  `symptoms` varchar(300) DEFAULT NULL,
  `notes` varchar(300) DEFAULT NULL,
  `prescription` varchar(50) DEFAULT NULL,
  `test1` varchar(14) DEFAULT NULL,
  `test2` varchar(14) DEFAULT NULL,
  `test3` varchar(14) DEFAULT NULL,
  `result1` varchar(30) DEFAULT NULL,
  `result2` varchar(30) DEFAULT NULL,
  `result3` varchar(30) DEFAULT NULL,
  `labnote` varchar(100) DEFAULT NULL,
  `checkout` int(20) DEFAULT NULL,
  `reception` varchar(14) DEFAULT NULL,
  `nurse` varchar(14) DEFAULT NULL,
  `doctor` varchar(14) DEFAULT NULL,
  `lab` varchar(14) DEFAULT NULL,
  `phermacy` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`visit_id`),
  KEY `visit_id` (`visit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`ID`, `name`, `visit_id`, `timestamp`, `age`, `bp`, `temp`, `weight`, `height`, `symptoms`, `notes`, `prescription`, `test1`, `test2`, `test3`, `result1`, `result2`, `result3`, `labnote`, `checkout`, `reception`, `nurse`, `doctor`, `lab`, `phermacy`) VALUES
('21/12/1/2/', 'Sarah Oyu', 35, '2016-04-21 18:05:29', NULL, '23', '12', '23', '54', 'fever,diarhea, rachael', 'signs of malaria', '', 'malaria', 'typhoid', '', 'positive', 'negative', '', '', 1461261929, '', 'Abraham Ogol', 'Abraham Ogol', 'Abraham Ogol', ''),
('12/3423/23', 'Noreah Joan', 36, '2016-04-27 09:11:37', NULL, '45', '45', '45', '43', '<p>edjkfbsdjfksodi;fljsdlfkhbdsiufjdsio</p>\r\n', '<p>weiuyhyfidsufkhdsfl8ds</p>\r\n', '<p>uwieahdsuhfwe8iufdjsfwe7d8oawisudhsgds</p>\r\n', 'null', 'null', '', NULL, NULL, NULL, NULL, NULL, '', 'Obrien', 'Abraham Ogol', NULL, NULL),
('CI/00069/0', 'GEOFREY KANINI', 37, '2016-04-21 18:05:25', NULL, '44', '6', '33', '76', 'fever , no other signs', 'no signs of sickness', 'panadol', 'null', 'null', '', NULL, NULL, NULL, NULL, 1461261925, '', 'Abraham Ogol', 'Abraham Ogol', NULL, ''),
('CI/00069/0', 'GEOFREY KANINI', 38, '2016-04-18 16:34:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
('ci/000/12', 'New NEW', 39, '2016-04-27 08:33:24', NULL, '43', '443', '44', '44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Abraham Ogol', NULL, NULL, NULL),
('234/234/34', 'Dick  Dick', 40, '2016-04-21 09:59:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
('ci/00067/0', 'Steve Ondeche', 41, '2016-04-21 11:29:03', NULL, '3333', '33', '22', '33', 'HFJDFJHFD', 'LKFLKDFJODF', '', 'malaria', 'malaria', '', 'PRESENT', '', '', '', 1461238143, '', 'Obrien', 'Obrien', 'Obrien', ''),
('CI/00069/0', 'GEOFREY KANINI', 42, '2016-04-21 11:26:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
('1298/12/4/', 'Admin Anms', 43, '2016-04-22 14:51:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Obrien', NULL, NULL, NULL, NULL),
('ci/00076/0', 'Alex Kimeu', 44, '2016-04-22 14:51:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Obrien', NULL, NULL, NULL, NULL),
('1563312', 'Kweyu Kevin', 45, '2016-04-27 08:31:46', NULL, '34', '32', '72', '130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abraham Ogol', 'Abraham Ogol', NULL, NULL, NULL),
('ci/000/12', 'New NEW', 46, '2016-04-27 07:47:25', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abraham Ogol', NULL, NULL, NULL, NULL),
('ci/000/12', 'New NEW', 47, '2016-04-27 07:47:36', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abraham Ogol', NULL, NULL, NULL, NULL),
('ci/000/12', 'New NEW', 48, '2016-04-27 09:12:17', 0, '323', '32', '32', '32', '<p>uwiesfsdiofyhew89sfdsfiudfds</p>\r\n', '<p>efkjdshfsdiofhlksd</p>\r\n', '', 'typhoid', 'null', '', NULL, NULL, NULL, NULL, NULL, 'Abraham Ogol', 'Abraham Ogol', 'Abraham Ogol', NULL, NULL),
('21/12/1/2/', 'Sarah Oyu', 49, '2016-04-29 06:13:50', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Obrien', NULL, NULL, NULL, NULL),
('1563312', 'Kweyu Kevin', 50, '2016-04-29 06:14:21', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Obrien', NULL, NULL, NULL, NULL),
('23/2/3/232', 'VIN OMPNDI', 51, '2016-04-29 06:42:31', 0, '77', '77', '77', '77', '<ol>\r\n	<li>fever</li>\r\n	<li>disesases</li>\r\n	<li>typhoid</li>\r\n</ol>\r\n', '<p>test recomended</p>\r\n', '', 'malaria', 'typhoid', '', NULL, NULL, NULL, NULL, NULL, 'Obrien', 'Obrien', 'Obrien', NULL, NULL),
('ci/03009/0', 'EMMA  MERCY', 52, '2016-04-29 06:37:49', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Obrien', NULL, NULL, NULL, NULL),
('ci/03009/0', 'EMMA  MERCY', 53, '2016-04-29 06:41:00', 0, '77', '77', '77', '77', '<p>er7uifjjasodfyiujaxzicguhjdszfohuickjaszxfhuc</p>\r\n', '<p>sdiofkhbdwsiulflzjhbcwujadsnfciujzx</p>\r\n', '<ol>\r\n	<li><em>panadol</em></li>\r\n	<li><em>malaria', 'null', 'null', '', NULL, NULL, NULL, NULL, 1461912060, 'Obrien', 'Obrien', 'Obrien', NULL, 'Obrien'),
('wead', 'Emma Wendy3', 54, '2016-04-29 06:57:27', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Obrien', NULL, NULL, NULL, NULL),
('wead', 'Emma Wendy3', 55, '2016-04-29 06:58:49', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Obrien', NULL, NULL, NULL, NULL),
('CI/00069/0', 'GEOFREY KANINI', 56, '2016-04-29 07:13:05', 0, '77', '340', '46', '8000', '<p>cbvfdbgfhjkhjhsjhsjhjshjh</p>\r\n', '<p>hgdhghgh</p>\r\n', '', 'typhoid', 'null', '', NULL, NULL, NULL, NULL, NULL, 'Obrien', 'Obrien', 'Obrien', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
