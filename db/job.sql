-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2017 at 04:56 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `adminid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `CompanyId` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `CompanyName` varchar(30) DEFAULT NULL,
  `Description` text,
  `ContactNo` int(100) DEFAULT NULL,
  `approve` varchar(10) NOT NULL,
  PRIMARY KEY (`CompanyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `company`
--


-- --------------------------------------------------------

--
-- Table structure for table `con`
--

CREATE TABLE IF NOT EXISTS `con` (
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `con`
--


-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country` char(20) NOT NULL,
  `state` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `noti`
--

CREATE TABLE IF NOT EXISTS `noti` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `date` varchar(200) NOT NULL,
  `url` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `noti`
--


-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE IF NOT EXISTS `seeker` (
  `SeekerId` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(30) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `MidleName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` varchar(8) DEFAULT NULL,
  `State` varchar(20) DEFAULT NULL,
  `Address` text,
  `District` varchar(20) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `MobileNo` bigint(20) DEFAULT NULL,
  `LandNo` int(15) DEFAULT NULL,
  `Experience` int(20) DEFAULT NULL,
  `Skills` text,
  `FunArea` varchar(30) DEFAULT NULL,
  `BasicEdu` varchar(30) DEFAULT NULL,
  `MasterEdu` varchar(50) DEFAULT NULL,
  `ResumeName` varchar(20) DEFAULT NULL,
  `ImageName` varchar(20) DEFAULT NULL,
  `approve` varchar(10) NOT NULL,
  PRIMARY KEY (`SeekerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `seeker`
--


-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `state` char(20) NOT NULL,
  `district` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--


-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `vacancy` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyId` int(20) NOT NULL,
  `JobTitle` varchar(30) DEFAULT NULL,
  `Requirement` varchar(50) DEFAULT NULL,
  `Address` text,
  `Country` varchar(50) DEFAULT NULL,
  `State` varchar(20) DEFAULT NULL,
  `District` varchar(20) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `HRContact` bigint(20) DEFAULT NULL,
  `OfficeTel` bigint(20) DEFAULT NULL,
  `ProfileName` varchar(20) DEFAULT NULL,
  `ImageName` varchar(20) DEFAULT NULL,
  `experience` int(10) NOT NULL,
  PRIMARY KEY (`vacancy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `vacancy`
--

