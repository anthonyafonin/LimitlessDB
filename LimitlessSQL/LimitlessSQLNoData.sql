
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2015 at 11:10 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

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
