-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2016 at 05:42 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `data_dictionary`
--
CREATE DATABASE IF NOT EXISTS `data_dictionary` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `data_dictionary`;

-- --------------------------------------------------------

--
-- Table structure for table `counselling`
--

CREATE TABLE IF NOT EXISTS `counselling` (
  `Counselling_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Aherence_Preparation` date DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Adherence_Plan` varchar(45) DEFAULT NULL,
  `ARV_Support_Group` varchar(45) DEFAULT NULL,
  `Treatment_Supporter_Preparation` varchar(45) DEFAULT NULL,
  `ART_Education` varchar(60) DEFAULT NULL,
  `Why_Complete_Adherence` varchar(45) DEFAULT NULL,
  `Patient_Id` int(11) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Counselling_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `initiation`
--

CREATE TABLE IF NOT EXISTS `initiation` (
  `Initiation_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Prior_ART` varchar(4) NOT NULL,
  `Hiv_Enrolled` date DEFAULT NULL,
  `Eligible_For_ART` date DEFAULT NULL,
  `Eligible_And_Ready` date DEFAULT NULL,
  `Clinical_Stage` int(1) DEFAULT NULL,
  `CD4` varchar(60) DEFAULT NULL,
  `Cohort` date DEFAULT NULL,
  `Height` varchar(10) DEFAULT NULL,
  `Weight` varchar(10) DEFAULT NULL,
  `Start_ART` varchar(45) DEFAULT NULL,
  `Regimen` varchar(45) DEFAULT NULL,
  `Patient_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Initiation_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `initiation`
--

INSERT INTO `initiation` (`Initiation_Id`, `Prior_ART`, `Hiv_Enrolled`, `Eligible_For_ART`, `Eligible_And_Ready`, `Clinical_Stage`, `CD4`, `Cohort`, `Height`, `Weight`, `Start_ART`, `Regimen`, `Patient_Id`) VALUES
(1, 'Yes', '2016-02-17', '0000-00-00', '0000-00-00', 0, '123', '0000-00-00', '35', '120', 'this', 'adas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE IF NOT EXISTS `laboratory` (
  `Laboratory_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Test_Type` varchar(45) DEFAULT NULL,
  `Where` varchar(45) DEFAULT NULL,
  `Result` varchar(45) DEFAULT NULL,
  `Patient_Id` int(11) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Laboratory_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`Laboratory_Id`, `Test_Type`, `Where`, `Result`, `Patient_Id`, `Created_At`) VALUES
(1, 'Malaria test', 'Mbarara', 'Negative', 1, '2016-02-21 19:38:46'),
(2, 'Malaria test', 'Mbarara', '+++', 1, '2016-02-21 19:42:54'),
(3, 'HCG', 'Kampala', 'Positive', 1, '2016-02-21 19:43:23'),
(4, '', '', '', 1, '2016-02-21 20:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `Patient_Id` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(60) NOT NULL,
  `Last_Name` varchar(60) NOT NULL,
  `Sex` varchar(3) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `District` varchar(45) NOT NULL,
  `Subcounty` varchar(45) NOT NULL,
  `Parish` varchar(45) NOT NULL,
  `Village` varchar(45) NOT NULL,
  `Care_Entry_Point` varchar(60) NOT NULL,
  `Treatment_Supporter` varchar(60) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Patient_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Patient_Id`, `First_Name`, `Last_Name`, `Sex`, `Phone`, `Date_Of_Birth`, `District`, `Subcounty`, `Parish`, `Village`, `Care_Entry_Point`, `Treatment_Supporter`, `Created_At`) VALUES
(1, 'Davis', 'Byamugisha', 'M', '+256700561958', '2016-02-10', 'Mbarara', 'Kakoba', 'kakoba', 'kakoba', 'None', 'John', '2016-02-21 14:39:00'),
(2, 'Nanduttu', 'NTV', 'F', '+256700393643', '2016-02-17', 'Buganda', 'Koochi', 'Rweene', 'Kankole', 'Mugabi', 'None', '2016-02-21 20:55:29'),
(3, '', '', 'M', '9172398213', '0000-00-00', '', '', '', '', '', '', '2016-02-22 15:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `Review_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Scheduled` date DEFAULT NULL,
  `Next_View_Date` date DEFAULT NULL,
  `Weight` float DEFAULT NULL,
  `Function_At_Status` varchar(45) DEFAULT NULL,
  `WHO_Clinical_Stage` varchar(45) DEFAULT NULL,
  `Ceptrine` varchar(45) DEFAULT NULL,
  `Adherence` varchar(45) DEFAULT NULL,
  `Regimen` varchar(45) DEFAULT NULL,
  `Dosage` varchar(45) DEFAULT NULL,
  `VL` varchar(45) DEFAULT NULL,
  `CD4` varchar(45) DEFAULT NULL,
  `Doctor_Initials` varchar(45) DEFAULT NULL,
  `Patient_Id` int(11) DEFAULT NULL,
  `Created_At` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Review_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Review_Id`, `Date_Scheduled`, `Next_View_Date`, `Weight`, `Function_At_Status`, `WHO_Clinical_Stage`, `Ceptrine`, `Adherence`, `Regimen`, `Dosage`, `VL`, `CD4`, `Doctor_Initials`, `Patient_Id`, `Created_At`) VALUES
(1, '2016-02-09', '0000-00-00', 80, 'this one', '32', 'vsdf', '', 'adas', 'sdfsd', 'sdfsd', 'sdfsd', 'sdfsd', 1, '2016-02-21 20:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `Message_Id` int(11) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Send_Every` int(11) NOT NULL,
  PRIMARY KEY (`Message_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`Message_Id`, `Message`, `Send_Every`) VALUES
(1, 'This is a text message', 21600000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Full_Names` varchar(45) DEFAULT NULL,
  `Sex` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `User_Type` varchar(45) DEFAULT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Full_Names`, `Sex`, `Phone`, `Email`, `User_Type`, `Username`, `Password`) VALUES
(1, 'Collins Babylonian', 'M', '+256771897631', 'davisb256@gmail.com', 'Doctor', 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992'),
(2, 'Davis Byamugisha', 'M', '+256704899935', 'samuel.gisha@gmail.com', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `viral_load`
--

CREATE TABLE IF NOT EXISTS `viral_load` (
  `Viral_Load_Id` int(11) NOT NULL AUTO_INCREMENT,
  `VL_Numbers` varchar(45) DEFAULT NULL,
  `Date_Sample_Drawn` date DEFAULT NULL,
  `Date_Sample_Returned` date DEFAULT NULL,
  `Patient_Id` int(11) DEFAULT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Viral_Load_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `viral_load`
--

INSERT INTO `viral_load` (`Viral_Load_Id`, `VL_Numbers`, `Date_Sample_Drawn`, `Date_Sample_Returned`, `Patient_Id`, `Created_At`) VALUES
(1, '15723', '2016-02-19', '2016-03-19', 1, '2016-02-21 20:33:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
