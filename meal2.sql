-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2017 at 03:20 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meal2`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_meal`
--

CREATE TABLE IF NOT EXISTS `daily_meal` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `un` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `taka` varchar(1000) NOT NULL,
  `link` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=482 ;

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `un` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `day` int(2) NOT NULL,
  `night` int(2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2537 ;

-- --------------------------------------------------------

--
-- Table structure for table `meal_balance`
--

CREATE TABLE IF NOT EXISTS `meal_balance` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `un` varchar(1000) NOT NULL,
  `month` varchar(1000) NOT NULL,
  `taka` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=498 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `un` varchar(1000) NOT NULL,
  `valid` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;
