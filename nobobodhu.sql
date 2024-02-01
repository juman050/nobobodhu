-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 07:03 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nobobodhu`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `user_from`, `user_to`) VALUES
(2, 3, 2),
(5, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `user_id`, `interest_id`, `status`) VALUES
(16, 5, 2, 0),
(17, 4, 2, 0),
(18, 3, 1, 0),
(19, 2, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `sent_at` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `message`, `sender_id`, `recipient_id`, `conversation_id`, `seen`, `sent_at`, `deleted`) VALUES
(24, 'hi', 2, 5, 5, 0, '2018-05-13 09:06:19', 0),
(25, 'hi', 5, 2, 5, 0, '2018-05-13 09:08:28', 0),
(26, 'hlw', 2, 5, 5, 0, '2018-05-13 09:08:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sc_users`
--

CREATE TABLE `sc_users` (
  `sc_user_id` int(11) NOT NULL,
  `sc_user_name` varchar(100) NOT NULL,
  `sc_user_email` varchar(50) NOT NULL,
  `sc_user_full_name` varchar(100) NOT NULL,
  `sc_user_password` varchar(255) NOT NULL,
  `sc_user_type` enum('super_admin','admin') NOT NULL DEFAULT 'super_admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_users`
--

INSERT INTO `sc_users` (`sc_user_id`, `sc_user_name`, `sc_user_email`, `sc_user_full_name`, `sc_user_password`, `sc_user_type`) VALUES
(1, 'admin', 'admin@admin.com', 'Mr. Admin', 'e10adc3949ba59abbe56e057f20f883e', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `setting_title` varchar(100) NOT NULL,
  `setting_value` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_title`, `setting_value`, `date`) VALUES
(1, 'logo-header', 'b1f2a52ca1956c536f47ae6abf305f82.png', '2017-11-09 01:18:11'),
(2, 'logo-footer', '43ac860d562782f4dc5284c66c0cbaa6.png', '2017-11-09 01:20:20'),
(3, 'address', '<p>Unit #238A - 8275 92nd Street</p>\r\n<p>Delta, BC V4G</p>', '2018-04-25 12:03:19'),
(4, 'email', 'info@nobobodhu.com', '2018-04-25 12:03:19'),
(5, 'phone', '+604-946-1198', '2018-04-25 12:03:19'),
(6, 'fb-link', '#', '2018-04-25 12:03:19'),
(7, 'tw-link', '#', '2018-04-25 12:03:19'),
(8, 'ln-link', '#', '2018-04-25 12:03:19'),
(9, 'insta-link', '#', '2018-04-25 12:03:19'),
(10, 'map-lat', '24.90778795930209', '2018-04-25 12:03:19'),
(11, 'map-lan', '91.85876548290253', '2018-04-25 12:03:19'),
(12, 'hour-of-operation', '<li><p>Monday 9AM–5PM</p></li>\r\n<li><p>Tuesday 9AM–5PM</p></li>\r\n<li><p>Wednesday 9AM–5PM</p></li>\r\n<li><p>Thursday 9AM–5PM</p></li>\r\n<li><p>Friday 9AM–5PM</p></li>\r\n<li><p>Saturday Closed</p></li>\r\n<li><p>Sunday Closed</p></li>', '2018-04-25 12:03:19'),
(13, 'pre-loader', '0', '2018-04-25 12:03:19'),
(14, 'pre-loader-img', '3ac90ebeb6a0c98cb563eace00cd6784.gif', '2017-11-10 11:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_title` varchar(100) NOT NULL,
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_title`, `inserted`, `updated`, `deleted`) VALUES
(1, 'phone', '2018-02-19 08:42:02', '2018-02-19 08:45:40', 0),
(2, 'php', '2018-02-20 09:34:34', '2018-02-20 09:34:34', 0),
(3, 'html', '2018-02-20 09:34:40', '2018-02-20 09:34:40', 0),
(4, 'wordpress', '2018-02-20 09:34:47', '2018-02-20 09:34:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  `gender` varchar(50) NOT NULL,
  `account_created_by` varchar(50) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `have_children` varchar(100) NOT NULL,
  `height` varchar(50) NOT NULL,
  `body_type` varchar(50) NOT NULL,
  `hair_color` varchar(30) NOT NULL,
  `eye_color` varchar(30) NOT NULL,
  `complexion` varchar(30) NOT NULL,
  `disabilities` varchar(100) NOT NULL,
  `zodiac_sign` varchar(100) NOT NULL,
  `blood_group` varchar(30) NOT NULL,
  `education` varchar(100) NOT NULL,
  `major_subject` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `annual_income` varchar(100) NOT NULL,
  `work_place` varchar(50) NOT NULL,
  `mother_tongue` varchar(50) NOT NULL,
  `about_yourself` varchar(255) NOT NULL,
  `family_background` varchar(255) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `number_of_brothers` varchar(50) NOT NULL,
  `number_of_sisters` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `residency_status` varchar(50) NOT NULL,
  `city_of_residence` varchar(50) NOT NULL,
  `state_of_residence` varchar(50) NOT NULL,
  `country_of_origin` varchar(50) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `preferance_age_from` varchar(30) NOT NULL,
  `preferance_age_to` varchar(30) NOT NULL,
  `preferance_height_from` varchar(30) NOT NULL,
  `preferance_height_to` varchar(30) NOT NULL,
  `preferance_gender` varchar(30) NOT NULL,
  `preferance_country` varchar(50) NOT NULL,
  `preferance_marital_status` varchar(30) NOT NULL,
  `preferance_have_children` varchar(30) NOT NULL,
  `preferance_religion` varchar(30) NOT NULL,
  `preferance_complexion` varchar(50) NOT NULL,
  `preferance_body_type` varchar(30) NOT NULL,
  `preferance_education` varchar(50) NOT NULL,
  `preferance_profession` varchar(50) NOT NULL,
  `preferance_residence` varchar(50) NOT NULL,
  `preferance_mother_tongue` varchar(50) NOT NULL,
  `preferance_origin` varchar(50) NOT NULL,
  `preferance_residency_status` varchar(50) NOT NULL,
  `preferance_state` varchar(50) NOT NULL,
  `preferance_district` varchar(50) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `photo_access` tinyint(1) NOT NULL DEFAULT '0',
  `inserted` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `is_login` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `mobile_number`, `email`, `password`, `birthday`, `gender`, `account_created_by`, `marital_status`, `have_children`, `height`, `body_type`, `hair_color`, `eye_color`, `complexion`, `disabilities`, `zodiac_sign`, `blood_group`, `education`, `major_subject`, `profession`, `annual_income`, `work_place`, `mother_tongue`, `about_yourself`, `family_background`, `father`, `mother`, `number_of_brothers`, `number_of_sisters`, `district`, `country`, `postal_code`, `residency_status`, `city_of_residence`, `state_of_residence`, `country_of_origin`, `religion`, `preferance_age_from`, `preferance_age_to`, `preferance_height_from`, `preferance_height_to`, `preferance_gender`, `preferance_country`, `preferance_marital_status`, `preferance_have_children`, `preferance_religion`, `preferance_complexion`, `preferance_body_type`, `preferance_education`, `preferance_profession`, `preferance_residence`, `preferance_mother_tongue`, `preferance_origin`, `preferance_residency_status`, `preferance_state`, `preferance_district`, `user_photo`, `photo_access`, `inserted`, `updated`, `deleted`, `active`, `is_login`) VALUES
(1, 'user', 'legend', '', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-05-09 00:00:00', 'Female', 'Brothers', 'Married', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bangladesh', '', '', '', '', '', '', '', '', '', '', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0),
(2, 'user', 'two', '54354354', 'user@test.com', 'e10adc3949ba59abbe56e057f20f883e', '1999-05-14 00:00:00', 'Male', 'Self', 'Married', '2', '9', 'slim', '', '', 'fair', '', '', 'b+', 'bsc', '', 'Engineer', '5', '', 'Bangla', 'about me', '', '', '', '', '', 'Sylhet', 'Bangladesh', '3100', '', '', '', '', 'Muslim', '18', '20', '4.9', '5.5', 'Female', 'Bangladesh', 'UnMarried', '2', 'Muslim', '', 'average', 'bsc', 'Doctor', '', 'Bangla', '', '1', '', 'Sylhet', 'GsNCBNJ11.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(3, 'mahbub', 'amhed', '', 'mdjmahbub0@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1999-05-05 00:00:00', 'Male', 'Self', 'UnMarried', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bangladesh', '', '', '', '', '', 'Muslim', '18', '20', '4.1', '5', 'Male', '', 'Married', '', 'Muslim', '', '', '', '', '', '', '', '', '', '', 'GsNCBNJ1.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(4, 'emon', 'ahmed', '', 'emon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1999-05-16 00:00:00', 'Male', 'Self', 'UnMarried', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bangladesh', '', '', '', '', '', '', '18', '20', '4.1', '5', 'Female', 'Bangladesh', 'UnMarried', '', 'Muslim', '', '', '', '', '', 'Bangla', 'Bangladesh', '', '', 'Sylhet', 'SWM-0000-quarter-pounder-cube-ads-300x250-12302014-v1.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(5, 'jorina', 'banu', '', 'jorina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-05-05 00:00:00', 'Female', 'Self', 'UnMarried', '', '5.3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bangladesh', '', '', '', '', '', 'Muslim', '18', '20', '4.1', '5', 'Male', 'Bangladesh', 'UnMarried', '', '', '', '', '', '', '', '', '', '', '', '', '264.png', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sc_users`
--
ALTER TABLE `sc_users`
  ADD PRIMARY KEY (`sc_user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sc_users`
--
ALTER TABLE `sc_users`
  MODIFY `sc_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
