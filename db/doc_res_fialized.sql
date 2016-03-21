-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2016 at 11:12 AM
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
  `telephone_no` varchar(20) NOT NULL,
  `time_slot` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`appoinment_id`, `user_id`, `doctor_id`, `patient_name`, `patient_age`, `telephone_no`, `time_slot`) VALUES
(1, 4, 1, 'sajith', 22, '1991991991', ''),
(2, 3, 1, '', 0, '', 'T2'),
(3, 1, 11, '', 0, '', 'T9'),
(4, 1, 8, '', 0, '', 'T9'),
(5, 1, 7, '', 0, '', 'M4'),
(6, 1, 9, '', 0, '', 'T1'),
(7, 1, 9, '', 0, '', 'S4'),
(9, 1, 9, '', 0, '', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
`doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT '1',
  `specialization` longtext NOT NULL,
  `allocated_appointment_time` longtext NOT NULL,
  `charges_id` int(11) NOT NULL,
  `account_no` varchar(40) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `reserved_time_slots` longtext NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `user_id`, `availability`, `specialization`, `allocated_appointment_time`, `charges_id`, `account_no`, `bank`, `reserved_time_slots`, `Address`) VALUES
(1, 1, 1, 'Heart surgeon', 'M1,T2,T4,W4,L4,F4', 0, '', '0', ',M1,T2', ''),
(2, 5, 0, 'Dermatologist', '', 0, '', '0', '', ''),
(3, 3, 1, 'Psychiatrist', '', 0, '', '0', '', ''),
(4, 4, 1, 'Dermatologist', '', 0, '', '0', '', ''),
(5, 7, 1, '', '23', 1, '234', '0', '', ''),
(6, 8, 1, '0', 'asd', 2, '123', 'asd', '', ''),
(7, 9, 1, 'Heart surgeon', 'T1,L1,T2,M4,M5,W6,M7,S8,M9,W10,S11,W12,W14,Z14,W16,S16,Z16,L17,S17,S18,L19,F19,S19', 3, '234', 'asd', ',M4', ''),
(8, 11, 0, 'Heart surgeon', 'T9,T10', 4, '0987656432', 'com', ',T9', 'rtyrytryr'),
(9, 12, 1, 'Heart surgeon', 'T1,S1,T3,S4', 6, '12311231', '12313', ',T1,S4,S1', '222');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_charges`
--

CREATE TABLE IF NOT EXISTS `doctor_charges` (
`charges_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `channeling_fee` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `doctor_charges`
--

INSERT INTO `doctor_charges` (`charges_id`, `doctor_id`, `channeling_fee`) VALUES
(1, 5, 213),
(2, 6, 0),
(3, 7, 234),
(4, 8, 500),
(5, 1, 2000),
(6, 9, 600);

-- --------------------------------------------------------

--
-- Table structure for table `doc_pay`
--

CREATE TABLE IF NOT EXISTS `doc_pay` (
`pay_id` int(10) NOT NULL,
  `doc_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL,
  `appoi_no` int(11) NOT NULL DEFAULT '0',
  `tot_amnt` int(11) NOT NULL DEFAULT '0',
  `doc_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `doc_pay`
--

INSERT INTO `doc_pay` (`pay_id`, `doc_id`, `user_id`, `appoi_no`, `tot_amnt`, `doc_name`) VALUES
(2, 8, 11, 2, 1400, 'aaa aaa'),
(3, 9, 12, 4, 3000, 'nihal pererea');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE IF NOT EXISTS `donations` (
`donation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_loc` varchar(50) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `details` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `organ` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `user_id`, `user_name`, `user_loc`, `blood_group`, `details`, `date`, `organ`) VALUES
(1, 3, '', '', 'op', '', '2016-03-12 14:48:11', 'no organ'),
(2, 1, 'Aruna', '', 'b', 'c', '2016-03-12 15:10:50', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
`f_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gp_payments`
--

CREATE TABLE IF NOT EXISTS `gp_payments` (
  `gp_payment_id` int(11) NOT NULL,
  `gp_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `sent_at` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `reciever_id`, `title`, `message`, `sent_at`) VALUES
(1, 1, 6, 'fdg', 'dfg', '2016-03-11 22:36:26'),
(2, 1, 6, 'fdg', 'dfg', '2016-03-11 22:38:41'),
(3, 1, 2, 'ddf', 'fdsdf', '2016-03-11 22:38:54'),
(4, 1, 2, 'ddf', 'fdsdf', '2016-03-11 22:39:51'),
(5, 6, 2, 'ddf', 'fdsdf', '2016-03-11 22:49:45'),
(6, 2, 3, 'ddf', 'fdsdf', '2016-03-11 22:50:00'),
(7, 2, 1, 'ddf', 'fdsdf', '2016-03-11 22:51:44'),
(8, 3, 1, 'ddf', 'fdsdf', '2016-03-11 22:52:23'),
(9, 2, 6, 'ddf', 'fdsdf', '2016-03-11 22:53:00'),
(10, 1, 2, 'ddf', 'fdsdf', '2016-03-11 22:53:27'),
(11, 1, 3, 'ddf', 'fdsdf', '2016-03-11 22:53:55'),
(12, 1, -1, 'ddf', 'fdsdf', '2016-03-11 22:56:29'),
(13, 1, -1, 'ddf', 'fdsdf', '2016-03-11 22:57:03'),
(14, 1, 3, 'gfd', 'dfgf', '2016-03-11 23:15:45'),
(15, 1, 3, 'gfd', 'dfgf', '2016-03-12 13:48:53'),
(16, 1, 6, 'adsasd', 'gffgjhjjhgjghj', '2016-03-12 14:19:29'),
(17, 1, 6, 'adsasd', 'gffgjhjjhgjghj', '2016-03-12 14:35:56'),
(18, 1, 6, 'adsasd', 'gffgjhjjhgjghj', '2016-03-12 14:37:10'),
(19, 1, 6, 'adsasd', 'gffgjhjjhgjghj', '2016-03-12 14:38:04'),
(20, 1, 6, 'adsasd', 'gffgjhjjhgjghj', '2016-03-12 14:39:00'),
(21, 1, 6, 'adsasd', 'gffgjhjjhgjghj', '2016-03-12 14:39:28'),
(22, 1, 6, 'adsasd', 'gffgjhjjhgjghj', '2016-03-12 14:39:54'),
(23, 1, 6, 'adsasd', 'gffgjhjjhgjghj', '2016-03-12 14:40:12'),
(24, 1, 6, 'adsasd', 'gffgjhjjhgjghj', '2016-03-12 14:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `organs`
--

CREATE TABLE IF NOT EXISTS `organs` (
`organ_id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `organs`
--

INSERT INTO `organs` (`organ_id`, `name`) VALUES
(1, 'Heart'),
(2, 'Intestine'),
(3, 'Kidneys'),
(4, 'Liver'),
(5, 'Lungs'),
(6, 'Pancreas');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dob` date NOT NULL
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `patient_payments`
--

INSERT INTO `patient_payments` (`p_payment_id`, `user_id`, `appoinment_id`, `doctor_id`, `amount`, `date`) VALUES
(1, 3, 2, 1, 200, '2016-03-12 19:15:45'),
(2, 1, 3, 11, 700, '2016-03-17 21:08:48'),
(3, 1, 4, 8, 700, '2016-03-17 21:19:23'),
(4, 1, 5, 8, 700, '2016-03-18 04:36:44'),
(5, 1, 5, 7, 434, '2016-03-21 09:45:31'),
(6, 1, 6, 9, 800, '2016-03-21 09:50:47'),
(7, 1, 7, 9, 800, '2016-03-21 09:55:23'),
(8, 1, 8, 9, 600, '2016-03-21 10:00:19'),
(9, 1, 9, 9, 800, '2016-03-21 10:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE IF NOT EXISTS `time_slots` (
`id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `time_string` longtext NOT NULL,
  `appointment_string` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `name_with_initials` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `profile_img` longtext NOT NULL,
  `gender` varchar(1) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `is_active` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `name_with_initials`, `dob`, `email`, `profile_img`, `gender`, `user_type`, `is_active`, `password`, `contact_number`, `Address`) VALUES
(1, 'Aruna', 'Thomas', 'A.P.Thomasa', '0000-00-00', 'a@g.com', 'images/book1.jpg56dc3aa35ebca', 'm', 'P', 1, '722279e9e630b3e731464b69968ea4b4', '0716544554', '0'),
(2, 'Amjad', 'Nazeer', 'A.Nazeer', '0000-00-00', 'a@ss.com', '', 'f', 'P', 1, '25d55ad283aa400af464c76d713c07ad', '07112312313', '0'),
(3, 'Lasitha', 'weligampola', 'L.Weligampola', '0000-00-00', 'L@gmail.com', '', 'm', 'G', 1, '619d31582e776c75b35a045870e5221f', '', '0'),
(4, 'sajith', 'sudarshana', 'ss.sudarshana', '0000-00-00', 's@s.c', '', 'm', 'P', 1, '', '', '0'),
(5, 'bhagyani', 'balas', 'b.b.aaaaaaa', '0000-00-00', 'b@b.com', '', 'f', 'D', 1, '', '', '0'),
(6, 'udara', 'karunarathna', 'U.P.D Karunarathne', '0000-00-00', 'u@u.u', '', 'm', 'G', 0, '', '', '0'),
(9, 'asd', 'asd', '', '0000-00-00', 'asdasd@asd.asd', '', 'm', 'D', 2, '722279e9e630b3e731464b69968ea4b4', '1111111111', 'asd'),
(10, 'Lasitha', 'Prabodha', 'L.P.', '0000-00-00', 'email@email.com', '', 'M', 'A', 1, '722279e9e630b3e731464b69968ea4b4', '1231231231', 'qwe'),
(11, 'aaa', 'aaa', '', '1986-02-15', 'arunthms01@gmail.com', '', 'f', 'D', 1, '722279e9e630b3e731464b69968ea4b4', '0715566778', 'asdasdasd'),
(12, 'nihal', 'pererea', '', '1980-08-18', 'a@a.a', '', 'm', 'D', 1, '722279e9e630b3e731464b69968ea4b4', '1231231234', '111111');

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
-- Indexes for table `doc_pay`
--
ALTER TABLE `doc_pay`
 ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
 ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
 ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `g_physiciant`
--
ALTER TABLE `g_physiciant`
 ADD PRIMARY KEY (`gp_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `organs`
--
ALTER TABLE `organs`
 ADD PRIMARY KEY (`organ_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_payments`
--
ALTER TABLE `patient_payments`
 ADD PRIMARY KEY (`p_payment_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
 ADD PRIMARY KEY (`id`);

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
MODIFY `appoinment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `doctor_charges`
--
ALTER TABLE `doctor_charges`
MODIFY `charges_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doc_pay`
--
ALTER TABLE `doc_pay`
MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `g_physiciant`
--
ALTER TABLE `g_physiciant`
MODIFY `gp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `organs`
--
ALTER TABLE `organs`
MODIFY `organ_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_payments`
--
ALTER TABLE `patient_payments`
MODIFY `p_payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
