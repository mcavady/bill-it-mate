-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2015 at 02:52 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `billitmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
`bug_id` int(255) NOT NULL,
  `bug_start_date` date NOT NULL,
  `bug_end_date` date NOT NULL,
  `bug_title` varchar(255) NOT NULL,
  `bug_description` varchar(255) NOT NULL,
  `bug_worker_id` int(11) NOT NULL,
  `bug_attachments` varchar(255) NOT NULL,
  `bug_time_estimate` int(255) NOT NULL,
  `bug_percent_complete` int(3) NOT NULL,
  `bug_project_id` int(3) DEFAULT NULL,
  `bug_project_name` varchar(255) DEFAULT NULL,
  `bug_time_remaining` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67565 ;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`bug_id`, `bug_start_date`, `bug_end_date`, `bug_title`, `bug_description`, `bug_worker_id`, `bug_attachments`, `bug_time_estimate`, `bug_percent_complete`, `bug_project_id`, `bug_project_name`, `bug_time_remaining`) VALUES
(67564, '2014-06-12', '2014-06-12', 'bug 1', 'bug one testing', 64, '', 100, 0, NULL, 'woo commerce', 100);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `project_id` int(255) NOT NULL DEFAULT '0',
  `project_name` varchar(255) DEFAULT NULL,
  `project_item` varchar(255) DEFAULT NULL,
  `project_startdate` date DEFAULT NULL,
  `project_completion_date` date DEFAULT NULL,
  `job_itemestimate` int(11) NOT NULL,
  `job_itemcompletiondate` date NOT NULL,
  `project_bugs` int(255) DEFAULT NULL,
  `job_bugstartdate` date NOT NULL,
  `job_bugcompleteddate` date NOT NULL,
  `project_bugtimeestimate` int(255) DEFAULT NULL,
  `job_project` varchar(255) NOT NULL,
  `project_worker` varchar(255) DEFAULT NULL,
  `project_percent_complete` int(255) DEFAULT NULL,
  `project_company` varchar(255) DEFAULT NULL,
  `project_description` varchar(255) DEFAULT NULL,
  `project_time_estimate` int(255) DEFAULT NULL,
  `project_tickets_count` int(255) DEFAULT NULL,
  `project_tickets_time_estimate` int(255) DEFAULT NULL,
  `project_timeestimate` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int(255) NOT NULL,
  `ticket_project_name` varchar(255) NOT NULL,
  `ticket_start_date` date NOT NULL,
  `ticket_finish_date` date NOT NULL,
  `ticket_worker_id` int(255) NOT NULL,
  `ticket_title` varchar(255) NOT NULL,
  `ticket_description` varchar(255) NOT NULL,
  `ticket_percent_complete` int(3) DEFAULT NULL,
  `ticket_time_estimate` int(255) DEFAULT NULL,
  `ticket_time_remaining` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `signupdate` date NOT NULL,
  `phonenumber` int(255) NOT NULL,
  `banned` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `role` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `jobs_id` int(255) NOT NULL,
  `tickets_id` int(255) NOT NULL,
  `isLoggedIn` int(2) NOT NULL,
  `user_project_total` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
 ADD PRIMARY KEY (`bug_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
 ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
 ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `member_username` (`username`,`token`,`phonenumber`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
MODIFY `bug_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67565;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
