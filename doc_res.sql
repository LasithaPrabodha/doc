-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2016 at 07:53 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doc_res`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE IF NOT EXISTS `appoinments` (
`appoinment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `telephone_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
`doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `specialization` longtext NOT NULL,
  `allocated_appointment_time` varchar(20) NOT NULL,
  `charges_id` int(11) NOT NULL,
  `account_no` varchar(40) NOT NULL,
  `bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_charges`
--

CREATE TABLE IF NOT EXISTS `doctor_charges` (
`charges_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `channeling_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE IF NOT EXISTS `donations` (
  `donation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `details` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gp_payments`
--

CREATE TABLE IF NOT EXISTS `gp_payments` (
  `gp_payment_id` int(11) NOT NULL,
  `gp_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `g_physiciant`
--

CREATE TABLE IF NOT EXISTS `g_physiciant` (
`gp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qualifications` longtext NOT NULL,
  `acc_no` varchar(30) NOT NULL,
  `bank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_payments`
--

CREATE TABLE IF NOT EXISTS `patient_payments` (
`p_payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `appoinment_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` int(20) NOT NULL,
  `name_with_initials` int(30) NOT NULL,
  `email` int(30) NOT NULL,
  `profile_img` longtext NOT NULL,
  `gender` varchar(1) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `is_active` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
 ADD PRIMARY KEY (`appoinment_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
 ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_charges`
--
ALTER TABLE `doctor_charges`
 ADD PRIMARY KEY (`charges_id`);

--
-- Indexes for table `g_physiciant`
--
ALTER TABLE `g_physiciant`
 ADD PRIMARY KEY (`gp_id`);

--
-- Indexes for table `patient_payments`
--
ALTER TABLE `patient_payments`
 ADD PRIMARY KEY (`p_payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
MODIFY `appoinment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_charges`
--
ALTER TABLE `doctor_charges`
MODIFY `charges_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `g_physiciant`
--
ALTER TABLE `g_physiciant`
MODIFY `gp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_payments`
--
ALTER TABLE `patient_payments`
MODIFY `p_payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
