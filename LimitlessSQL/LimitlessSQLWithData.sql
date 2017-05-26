
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2015 at 02:33 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a3200977_limitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(20) NOT NULL,
  `Middle_Name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Phone_Number` varchar(15) DEFAULT NULL,
  `Job_Title` varchar(20) NOT NULL,
  `Date_of_Hire` varchar(10) NOT NULL,
  `Wage` int(11) NOT NULL,
  `Vehicle_Number` int(11) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`),
  KEY `Ownership` (`Vehicle_Number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Phone_Number`, `Job_Title`, `Date_of_Hire`, `Wage`, `Vehicle_Number`) VALUES
(41, 'Anthony', '', 'Afonin', '971-215-1440', 'CEO', '2015-11-10', 70, 1),
(42, 'Neil', '', 'Larionov', '503-948-0070', 'Manager', '2015-11-23', 30, 2),
(43, 'Isak', '', 'Lisoff', '504-304-5930', 'Supervisor', '2015-11-23', 25, 3),
(44, 'Jacob', '', 'Smith', '543-654-7654', 'Sider', '2015-11-10', 15, 4),
(45, 'John', 'Johnny', 'Johnson', '353-234-5433', 'Sider', '2015-11-23', 12, 4),
(46, 'Paul', 'Eric', 'Johnson', '423-543-2345', 'Sider', '2015-11-16', 10, 5),
(47, 'Mike', '', 'Burkoff', '423-534-2345', 'Framer', '2015-11-09', 10, 8),
(48, 'Stephan', '', 'Snegireff', '432-543-5476', 'Carpenter', '2015-11-16', 15, 4),
(49, 'Archie', '', 'Junior', '432-546-7543', 'Carpenter', '2015-11-23', 15, 4),
(50, 'Greg', '', 'Johnon', '423-654-1234', 'Framer', '2015-11-10', 12, 4),
(51, 'Maxwell', 'Trent', 'Mccool', '765-234-6543', 'Supervisor', '2015-11-17', 15, 5),
(52, 'Patrick', 'Cesar', 'Pilson', '654-234-6754', 'Sider', '2015-11-17', 12, 5),
(53, 'Gilbert', 'Wes', 'Arbour', '321-534-6543', 'Framer', '2015-11-24', 12, 3),
(54, 'Jack', '', 'Rolen', '534-234-7654', 'Sider', '2015-11-11', 10, 5),
(55, 'Thad', '', 'Chung', '321-534-2345', 'Sider', '2015-11-17', 10, 7),
(56, 'Bret', '', 'Stumbo', '764-234-6432', 'Supervisor', '2015-11-16', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobsite`
--

CREATE TABLE `jobsite` (
  `Job_Number` int(11) NOT NULL AUTO_INCREMENT,
  `Job_Type` varchar(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Vehicle_Number` int(11) DEFAULT NULL,
  PRIMARY KEY (`Job_Number`),
  KEY `Assignment` (`Vehicle_Number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `jobsite`
--

INSERT INTO `jobsite` (`Job_Number`, `Job_Type`, `Address`, `Vehicle_Number`) VALUES
(19, 'Siding', '454 Franklin Avenue', 1),
(20, 'Siding', '818 Meadow Street ', 2),
(21, 'Framing', '664 Forest Street ', 3),
(22, 'Windows', '469 Harrison Street', 4),
(23, 'Demolition', '916 York Street ', 4),
(24, 'Siding', '834 Fawn Court ', 7),
(25, 'Framing', '610 5th Street East ', 8),
(26, 'Siding', '964 Church Street So', 0),
(27, 'Framing', '493 Bridle Court ', 0),
(28, 'Windows', '957 Monroe Street ', 0),
(29, 'Framing', '701 Route 27 ', 0),
(30, 'Demolition', '541 Evergreen Drive ', 0),
(31, 'Siding', '499 Lakeview Drive ', 0),
(32, 'Siding', '991 Route 4 ', 0),
(33, 'Framing', '544 Meadow Street ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Location` varchar(50) NOT NULL,
  `Vehicle_Number` int(11) DEFAULT NULL,
  PRIMARY KEY (`Location_ID`),
  KEY `VehicleLocation` (`Vehicle_Number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_ID`, `Location`, `Vehicle_Number`) VALUES
(7, 'Vehicle', 7),
(6, 'Warehouse', NULL),
(5, 'Vehicle', 5),
(4, 'Vehicle', 4),
(3, 'Vehicle', 3),
(2, 'Vehicle', 2),
(1, 'Vehicle', 1),
(8, 'Vehicle', 8);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `Maintenance_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(100) NOT NULL,
  `Date_In` date NOT NULL,
  `Date_Out` date NOT NULL,
  `Tool_Number` int(11) NOT NULL,
  `Location_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Maintenance_ID`),
  KEY `Schedule` (`Tool_Number`,`Location_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`Maintenance_ID`, `Description`, `Date_In`, `Date_Out`, `Tool_Number`, `Location_ID`) VALUES
(3, 'Replaced Head', '2015-11-17', '2015-11-19', 60, NULL),
(4, 'Replaced Saw Blade', '2015-11-03', '2015-11-16', 41, NULL),
(5, 'Tuned', '2015-11-09', '2015-11-19', 96, NULL),
(6, 'Tuned', '2015-11-02', '2015-11-26', 79, NULL),
(7, 'Replaced Blade', '2015-11-17', '2015-11-18', 50, NULL),
(8, 'Repaired power cord', '2015-11-16', '2015-11-19', 42, NULL),
(9, 'Tuned', '2015-11-23', '2015-11-18', 40, NULL),
(10, 'Faulty Connector Replaced', '2015-11-18', '2015-11-04', 43, NULL),
(11, 'Sharpened', '2015-11-02', '2015-11-07', 44, NULL),
(12, 'Fixed power', '0000-00-00', '0000-00-00', 39, NULL),
(13, 'Cleaned', '2015-11-01', '2015-11-11', 47, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `Tool_Number` int(11) NOT NULL AUTO_INCREMENT,
  `Tool_Name` varchar(50) NOT NULL,
  `Manufacturer` varchar(50) DEFAULT NULL,
  `Quality` varchar(20) NOT NULL,
  `Location_ID` int(11) NOT NULL,
  PRIMARY KEY (`Tool_Number`,`Location_ID`),
  KEY `ToolLocation` (`Location_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`Tool_Number`, `Tool_Name`, `Manufacturer`, `Quality`, `Location_ID`) VALUES
(32, 'Claw Hammer', 'Makita', 'New', 6),
(33, 'Tape Measure', '', 'Used', 6),
(34, 'Utility Knife', 'Hilti', 'New', 6),
(35, 'Chisel', '', 'Used', 6),
(36, 'Level', 'Metabo', 'New', 6),
(37, 'Screwdriver', '', 'New', 6),
(38, 'Layout Square', '', 'Worn out', 6),
(39, 'Compressor', 'ABM Tools', 'Broken', 6),
(40, 'Wrench', 'Fuller', 'Broken', 6),
(41, 'Hand Saw', 'Knipex', 'Rusted', 6),
(42, 'Skill Saw', 'Metabo', 'Weak', 6),
(43, 'Air Hose', '', 'Leaks', 6),
(44, 'Drill bits', '', 'Dull', 6),
(45, 'Hand Drill', 'Fein', 'New', 1),
(46, 'Ball Peen Hammer', 'Tyrolit', 'Old', 1),
(47, 'Square', 'Ryobi', 'Dull', 1),
(48, 'Hand Saw', 'DeWalt', 'Used', 1),
(49, 'Tacker', 'DeWalt', 'Dull', 1),
(50, 'Utility Knife', 'Dremel', 'Broken', 1),
(51, 'Pliers', 'Festool', 'New', 1),
(52, 'Clamp', 'Skil', 'Old', 1),
(53, 'Compressor', NULL, 'Broken', 1),
(54, 'Siding Gun', 'SawStop', 'Used', 1),
(55, 'Scraper', 'Mafell', 'New', 2),
(56, 'Hammer', 'Blount', 'Old', 2),
(57, 'Tool Belt', 'Panasonic', 'Dull', 2),
(58, 'Pliers', NULL, 'Used', 2),
(59, 'Tape Measure', NULL, 'Dull', 2),
(60, 'Hammer', NULL, 'Broken', 2),
(61, 'Snips', NULL, 'New', 2),
(62, 'Clamp', 'Makita', 'Old', 2),
(63, 'Shovel', 'Metabo', 'Broken', 2),
(64, 'Saw Table', NULL, 'Used', 2),
(65, 'Electric Drill', 'DeWalt', 'Broken', 3),
(66, 'Wrench', NULL, 'New', 3),
(67, 'Tool Box', NULL, 'Old', 3),
(68, 'Power Saw', NULL, 'New', 3),
(69, 'Saw Horse', 'Panasonic', 'Worn Down', 3),
(70, 'Tool Belt', 'Positec', 'Used', 3),
(71, 'Snips', 'Festool', 'New', 3),
(72, 'Tape Measure', 'Makita', 'Old', 3),
(73, 'Compressor', 'Metabo', 'Broken', 3),
(74, 'Siding Gun', NULL, 'Used', 3),
(75, 'Caulk Gun', NULL, 'New', 4),
(76, 'Step Ladder', 'MPF', 'New', 4),
(77, 'Concrete Saw', NULL, 'Poulan', 4),
(78, 'Tape Measure', 'DeWalt', 'New', 4),
(79, 'Tape Measure', 'Panasonic', 'Worn Down', 4),
(80, 'Hammer', 'Dremel', 'Used', 4),
(81, 'Snips', 'Festool', 'New', 4),
(82, 'Clamp', 'Skil', 'Old', 4),
(83, 'Compressor', 'Metabo', 'Broken', 4),
(84, 'Saw Table', 'SawStop', 'Used', 4),
(85, 'Core', 'Mafell', 'Used', 5),
(86, 'Radio', 'Metabo', 'Broken', 5),
(87, 'Tool Belt', 'Panasonic', 'Old', 5),
(88, 'Magnet', NULL, 'New', 5),
(89, 'Saw Horse', 'DeWalt', 'Dull', 5),
(90, 'Rock Drill', 'Ridgid', 'Used', 5),
(91, 'Chisel', NULL, 'Dull', 5),
(92, 'Vacuum', NULL, 'New', 5),
(93, 'Broom', NULL, 'Old', 5),
(94, 'Caulk Gun', NULL, 'New', 5),
(95, 'Broom', NULL, 'Broken', 7),
(96, 'Caulk Gun', NULL, 'Broken', 7),
(97, 'Tape Measure', 'Metabo', 'Old', 7),
(98, 'Power Saw', 'DeWalt', 'New', 7),
(99, 'Radio', 'DeWalt', 'Worn Down', 7),
(100, 'Hammer', NULL, 'Used', 7),
(101, 'Siding Gun', 'Festool', 'New', 7),
(102, 'Tape Measure', 'Skil', 'Used', 7),
(103, 'Compressor', 'Metabo', 'Old', 7),
(104, 'Siding Gun', NULL, 'New', 7),
(105, 'Tool Belt', 'Hilti', 'New', 8),
(106, 'Hammer', 'Blount', 'New', 8),
(107, 'Square', 'Panasonic', 'Dull', 8),
(108, 'Hand Saw', 'DeWalt', 'New', 8),
(109, 'Chisel', 'Panasonic', 'Dull', 8),
(110, 'Utility Knife', 'Positec', 'Used', 8),
(111, 'Pliers', 'Festool', 'Dull', 8),
(112, 'Tape Measure', '', 'New', 8),
(113, 'Compressor', 'Metabo', 'Old', 8),
(114, 'Siding Gun', 'SawStop', 'New', 8);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_Number` int(11) NOT NULL AUTO_INCREMENT,
  `Model` varchar(30) NOT NULL,
  `Make` varchar(30) NOT NULL,
  `Vehicle_Year` int(11) NOT NULL,
  PRIMARY KEY (`Vehicle_Number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_Number`, `Model`, `Make`, `Vehicle_Year`) VALUES
(1, 'Accord', 'Honda', 2012),
(2, 'Tundra', 'Toyota', 2014),
(3, 'Tacoma', 'Toyota', 2009),
(4, 'Ranger', 'Ford', 2007),
(5, 'Ranger', 'Ford', 2009),
(7, 'Tundra', 'Toyota', 2016),
(8, 'Ranger', 'Ford', 2005);
