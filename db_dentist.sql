-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 06:31 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dentist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(12) NOT NULL,
  `page` varchar(32) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `page`, `content`) VALUES
(1, 'About', ''),
(2, 'Email', ''),
(3, 'Facebook', ''),
(4, 'Contact', ''),
(5, 'Location', ''),
(6, 'Terms and Condition', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointments`
--

CREATE TABLE `tbl_appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `request_date` date NOT NULL,
  `request_time` varchar(35) NOT NULL,
  `service_id` text NOT NULL,
  `cancel_reason` text NOT NULL,
  `cancel_date` varchar(35) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT 0,
  `cancel_by` int(11) NOT NULL,
  `is_calendar` int(11) NOT NULL,
  `is_payment` int(11) NOT NULL,
  `is_new` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctors`
--

CREATE TABLE `tbl_doctors` (
  `doctor_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `times` varchar(50) NOT NULL,
  `timee` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `off` text NOT NULL,
  `monday` int(11) NOT NULL,
  `tuesday` int(11) NOT NULL,
  `wednesday` int(11) NOT NULL,
  `thursday` int(11) NOT NULL,
  `friday` int(11) NOT NULL,
  `saturday` int(11) NOT NULL,
  `sunday` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `is_promo` int(1) NOT NULL,
  `services` text NOT NULL,
  `discount` varchar(12) NOT NULL,
  `start` varchar(100) NOT NULL,
  `end` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `event` varchar(100) NOT NULL,
  `offer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `dcu` date NOT NULL,
  `findings` varchar(250) NOT NULL,
  `remarks` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_information`
--

CREATE TABLE `tbl_information` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_installment`
--

CREATE TABLE `tbl_installment` (
  `installmen_id` int(12) NOT NULL,
  `service_id` int(12) NOT NULL,
  `amount` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE `tbl_offer` (
  `id` int(11) NOT NULL,
  `service` varchar(250) NOT NULL,
  `price` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `installment` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_offer`
--

INSERT INTO `tbl_offer` (`id`, `service`, `price`, `description`, `installment`, `photo`) VALUES
(1, 'Oral Dental Consultation', '300', 'Oral Dental Consultation of the patient', '', 'code128-Count01234567-.png'),
(2, 'Radiograph', '500', 'Radiograph of patient', '', 'code128-Count01234567-.png'),
(3, 'Oral Prophylaxis', '700', 'Oral Prophylaxis moderate heavy treatment', '', 'code128-Count01234567-.png'),
(4, 'Fluoride Application', '600', 'Fluoride treatment', '', 'code128-Count01234567-.png'),
(5, 'Restoration', '800', 'Restoration of teeth', '', 'code128-Count01234567-.png'),
(6, 'Extraction', '800', 'A procedure to remove a tooth from the gum socket.', '', 'code128-Count01234567-.png'),
(7, 'Orthodontics braces', '50000', 'Treatment for ortho', '', 'code128-Count01234567-.png'),
(8, 'Teeth Whitening', '3000', 'Teeth whitening involves bleaching your teeth to make them lighter.', '', 'code128-Count01234567-.png'),
(9, 'Root canal treatment', '4500', 'Used to treat infection at the center of a tooth.', '', 'code128-Count01234567-.png'),
(10, 'Veneers', '3000', 'Custom shell of tooth-colored materials designed to cover the front surface of teeth', '', 'code128-Count01234567-.png'),
(11, 'Crowns', '3000', 'Crowns are used to protect, cover and restore the shape of your teeth.', '', 'code128-Count01234567-.png'),
(14, 'Dentures', '4000', 'Dentures are artificial teeth and gums that are formed to your mouth and created by your dentists to replace lost or removed natural teeth. ', '', 'code128-Count01234567-.png'),
(16, 'Crowns 2', '2000', 'The crowns', '', 'code128-Count01234567-.png'),
(17, 'Crowns 2', '2000', 'The crowns', '', 'code128-Count01234567-.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `service_id` text NOT NULL,
  `payment_date` date NOT NULL,
  `service_charge` varchar(35) NOT NULL,
  `pay_amount` varchar(35) NOT NULL,
  `balance` varchar(35) NOT NULL,
  `installment` varchar(12) NOT NULL,
  `is_installment` varchar(5) NOT NULL,
  `payment_status` text NOT NULL,
  `is_paid` int(1) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `promo_id` int(12) NOT NULL,
  `event_id` int(12) NOT NULL,
  `title` varchar(50) NOT NULL,
  `service_id` int(12) NOT NULL,
  `percentage` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signup`
--

CREATE TABLE `tbl_signup` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `pass` varchar(100) NOT NULL,
  `type` varchar(250) NOT NULL,
  `is_balance` int(1) NOT NULL,
  `is_confirm` int(11) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_signup`
--

INSERT INTO `tbl_signup` (`id`, `firstname`, `lastname`, `sex`, `birthday`, `address`, `email`, `password`, `pass`, `type`, `is_balance`, `is_confirm`, `date_registered`) VALUES
(1, 'Administrator ', 'LCL', '', '', 'Cavite City', 'lcldental@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 'admin', 0, 1, '2022-11-19 04:49:14'),
(3154, 'Sample', 'Sample', 'Female', '1999-10-15', 'Dasmariñas, Cavite', 'sample', '21232f297a57a5a743894a0e4a801fc3', '', 'patient', 0, 1, '2022-11-30 08:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prescription`
--

CREATE TABLE `tb_prescription` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `prescription` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_information`
--
ALTER TABLE `tbl_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_installment`
--
ALTER TABLE `tbl_installment`
  ADD PRIMARY KEY (`installmen_id`);

--
-- Indexes for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_prescription`
--
ALTER TABLE `tb_prescription`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  MODIFY `doctor_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_information`
--
ALTER TABLE `tbl_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_installment`
--
ALTER TABLE `tbl_installment`
  MODIFY `installmen_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  MODIFY `promo_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3209;

--
-- AUTO_INCREMENT for table `tb_prescription`
--
ALTER TABLE `tb_prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
