-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2017 at 03:23 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `passcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `passcode`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `b_bal` bigint(10) NOT NULL,
  `b_date` date NOT NULL,
  `b_amt` int(10) NOT NULL,
  `b_p_id` int(10) NOT NULL,
  `b_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`b_bal`, `b_date`, `b_amt`, `b_p_id`, `b_no`) VALUES
(15, '2017-05-26', 15, 81, 114);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_name` varchar(100) NOT NULL,
  `d_clinic_addr1` varchar(100) NOT NULL,
  `d_clinic_addr2` varchar(100) NOT NULL,
  `d_city` varchar(100) NOT NULL,
  `d_pin` int(10) NOT NULL,
  `d_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_name`, `d_clinic_addr1`, `d_clinic_addr2`, `d_city`, `d_pin`, `d_admin`) VALUES
('b', 'b', 'b', 'b', 456, 'b'),
('c', 'b', 'b', 'b', 4, 'b'),
('a', 'a', 'a', 'a', 123, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'rec', 'rec');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `p_fname` varchar(100) NOT NULL,
  `p_mname` varchar(100) NOT NULL,
  `p_lname` varchar(100) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_phno` bigint(10) NOT NULL,
  `p_dob` date NOT NULL,
  `p_age` int(10) NOT NULL,
  `p_addr1` varchar(100) NOT NULL,
  `p_addr2` varchar(100) NOT NULL,
  `p_city` varchar(20) NOT NULL,
  `p_pin` int(100) NOT NULL,
  `p_area` varchar(10) NOT NULL,
  `p_sugg` varchar(10) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `patient` varchar(100) NOT NULL,
  `p_gender` varchar(10) NOT NULL,
  `p_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`p_fname`, `p_mname`, `p_lname`, `p_email`, `p_phno`, `p_dob`, `p_age`, `p_addr1`, `p_addr2`, `p_city`, `p_pin`, `p_area`, `p_sugg`, `doctor`, `patient`, `p_gender`, `p_id`, `date`) VALUES
('srushti', '', 'Upadhyay', '', 57856765, '0000-00-00', 0, '', '', '', 0, 'mulund', 'self', '', '', 'male', 59, '2016-06-22'),
('anagha', '', 'shastri', '', 234234, '0000-00-00', 0, '', '', '', 0, 'mulund', 'self', '', '', 'male', 61, '2016-06-22'),
('New', 'P', 'Patient', 'a@b.com', 789, '2016-08-28', 0, '', '', '', 0, 'mulund', 'self', '', '', 'male', 69, '2016-08-28'),
('shrushti', '2', 'Upadhyay', 'shrushtiupadhyay123@abcdefg.com', 2147483647, '2016-08-28', 0, 'aasdagdsah', 'sdasd', '', 0, 'mulund', 'self', '', '', 'male', 71, '2016-08-28'),
('Soham', '', 'Mistry', 'sohammistry@gmail.com', 2147483647, '2007-02-04', 9, '502,Matruchaya apartment,', 'Agar Road, Kalyan(West)', 'Mumbai', 0, 'mulund', 'self', '', '', 'male', 72, '2016-08-28'),
('Sonali', '', 'Varma', 'sonalivarma@yahoo.com', 2147483647, '2007-07-07', 9, 'mulund', 'west', 'mumbai', 0, 'thane', 'doctor', 'b', '', 'male', 73, '2016-08-28'),
('ashish', '', 'prabhudesai', '', 253, '2016-09-13', 0, 'faersf', 'asrefsr', 'mumbai', 0, 'mulund', 'self', '', '', 'male', 79, '2016-09-22'),
('q', '', 's', '', 535, '2016-09-12', 0, '', '', '', 0, 'mulund', 'self', '', '', 'male', 80, '2016-09-22'),
('Mamta', 'S', 'Matkar', '', 2147483647, '1999-03-10', 18, '502,Matruchaya apartment,', 'Agar Road, Kalyan(West)', 'Mumbai', 4213, 'mulund', 'self', '', '', 'male', 81, '2017-05-18'),
('Srushti', 'R', 'Upadhyay', '', 9769405866, '2017-05-16', 0, '502,Matruchaya apartment,', 'Agar Road, Kalyan(West)', 'Mumbai', 421301, 'mulund', 'self', '', '', 'male', 82, '2017-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pm_b_no` int(10) NOT NULL,
  `pm_date` date NOT NULL,
  `pm_amt` int(10) NOT NULL,
  `pm_id` int(10) NOT NULL,
  `excess` int(100) NOT NULL,
  `pending` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `test` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test`) VALUES
(0, 10),
(0, 10),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `v_no` int(10) NOT NULL,
  `v_p_id` int(5) NOT NULL,
  `v_date` date NOT NULL,
  `v_chkin` varchar(3) NOT NULL,
  `v_chkin_time` datetime(6) NOT NULL,
  `v_chkout` varchar(3) NOT NULL,
  `v_chkout_time` datetime(6) NOT NULL,
  `billed` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`v_no`, `v_p_id`, `v_date`, `v_chkin`, `v_chkin_time`, `v_chkout`, `v_chkout_time`, `billed`) VALUES
(172, 59, '2017-05-26', 'yes', '2017-05-26 15:44:33.000000', 'no', '0000-00-00 00:00:00.000000', 'y'),
(173, 61, '2017-05-26', 'yes', '2017-05-26 18:24:29.000000', 'no', '0000-00-00 00:00:00.000000', 'y'),
(174, 79, '2017-05-26', 'yes', '2017-05-26 18:25:04.000000', 'no', '0000-00-00 00:00:00.000000', 'y'),
(175, 72, '2017-05-26', 'yes', '2017-05-26 18:26:40.000000', 'no', '0000-00-00 00:00:00.000000', 'y'),
(176, 73, '2017-05-26', 'yes', '2017-05-26 18:27:49.000000', 'no', '0000-00-00 00:00:00.000000', 'y'),
(177, 81, '2017-05-26', 'yes', '2017-05-26 18:32:06.000000', 'no', '0000-00-00 00:00:00.000000', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `wait`
--

CREATE TABLE `wait` (
  `w_id` int(11) NOT NULL,
  `w_p_id` int(10) NOT NULL,
  `w_time` time(6) NOT NULL,
  `w_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`b_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`v_no`);

--
-- Indexes for table `wait`
--
ALTER TABLE `wait`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `b_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `patient_details`
--
ALTER TABLE `patient_details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `v_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `wait`
--
ALTER TABLE `wait`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
