-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2014 at 06:19 AM
-- Server version: 5.1.67-rel14.3-log
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `curlylox_fullsail`
--

-- --------------------------------------------------------

--
-- Table structure for table `boarders`
--

CREATE TABLE IF NOT EXISTS `boarders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientID` int(11) unsigned DEFAULT NULL,
  `teamID` int(11) unsigned DEFAULT NULL,
  `projectName` text,
  `projectDescription` text,
  `updatedDate` char(32) DEFAULT NULL,
  `dueDate` char(32) DEFAULT NULL,
  `status` char(32) DEFAULT NULL,
  `startDate` char(32) DEFAULT NULL,
  `projectCreator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teamID` (`teamID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `boarders`
--

INSERT INTO `boarders` (`id`, `clientID`, `teamID`, `projectName`, `projectDescription`, `updatedDate`, `dueDate`, `status`, `startDate`, `projectCreator`) VALUES
(1, NULL, NULL, 'Tara Thorne', '124 Beechwood Lane, Chambersburg PA, 17201', NULL, '04/01/2014', 'paid', '05/01/2014', 25),
(2, NULL, NULL, 'Charles Evans', '124 Beechwood Lane, Chambersburg PA, 17201', NULL, '02/01/2014', 'overdue', '03/31/2014', 25),
(3, NULL, NULL, 'Natalya De Luca', '471 Norland Avenue, Chambersburg PA, 17201', NULL, '03/01/2014', 'paid', '04/01/2014', 25),
(4, NULL, NULL, 'Anita Cantini', '471 Norland Avenue, Chambersburg PA, 17201', NULL, '03/01/2014', 'overdue', '03/29/2014', 25),
(5, NULL, NULL, 'Jordan Gilmore', '486 Mower Road, Chambersburg PA, 17201', NULL, '03/01/2014', 'paid', '04/01/2014', 25),
(6, NULL, NULL, 'Nigel Townsend', '124 Main Street, Chambersburg PA, 17201', NULL, '03/01/2014', 'paid', '04/01/2014', 25),
(7, NULL, NULL, 'Ashley Landis', '124 Main Street, Chambersburg PA, 17201', NULL, '03/01/2014', 'paid', '04/01/2014', 25);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientName` char(128) DEFAULT NULL,
  `primaryContact` int(11) unsigned DEFAULT NULL,
  `phone` text,
  `address` char(128) DEFAULT NULL,
  `city` char(32) DEFAULT NULL,
  `state` char(32) DEFAULT NULL,
  `zipcode` mediumint(9) DEFAULT NULL,
  `website` text,
  `email` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `clientName`, `primaryContact`, `phone`, `address`, `city`, `state`, `zipcode`, `website`, `email`) VALUES
(1, 'Full Sail University', 5, '407-679-0100', '3300 University Blvd', 'Orlando', 'FL', 32828, 'www.fullsail.edu', NULL),
(2, 'FakeCo', 5, '555-555-5555', '1234 Nowhere Ave.', 'Busytown', 'NY', 13126, 'www.fakeco.com', NULL),
(3, 'CodeInfused', 5, '555-263-3387', NULL, NULL, NULL, 32792, 'www.codeinfused.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientID` int(11) unsigned DEFAULT NULL,
  `teamID` int(11) unsigned DEFAULT NULL,
  `projectName` text,
  `quantity` int(11) DEFAULT NULL,
  `status` char(32) DEFAULT NULL,
  `projectCreator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teamID` (`teamID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`id`, `clientID`, `teamID`, `projectName`, `quantity`, `status`, `projectCreator`) VALUES
(1, NULL, NULL, 'Purina Omolene #500 Horse Feed', 5, 'ordered', 25),
(2, NULL, NULL, 'Purina Omolene #400 Horse Feed', 3, 'Ordered', 25),
(3, NULL, NULL, 'Purina Omolene #300 Horse Feed', 5, 'ordered', 25),
(4, NULL, NULL, 'Purina Omolene #300 Horse Feed', 5, 'ordered', 25),
(5, NULL, NULL, 'Purina Omolene #300 Horse Feed', 5, 'ordered', 25),
(6, NULL, NULL, 'PurinaÂ® Strategy Healthy Edge Horse Feed', 6, 'urgent', 25),
(7, NULL, NULL, 'Alfalfa', 1, 'Urgent', 25),
(8, NULL, NULL, 'Timothy', 1, 'Urgent', 25),
(9, NULL, NULL, 'Alfalfa/Timothy', 1, 'Urgent', 25),
(10, NULL, NULL, 'Purina Equine Junior Horse Feed', 5, 'ordered', 25),
(11, NULL, NULL, 'Purina Equine Adult Horse Feed', 5, 'ordered', 25),
(12, NULL, NULL, 'Purina Equine Senior Horse Feed', 5, 'ordered', 25),
(13, NULL, NULL, 'Purina Equine Senior Active Healthy Edge Horse Feed', 5, 'ordered', 25),
(14, NULL, NULL, 'Purina Ultium Competition Horse Formula', 5, 'ordered', 25),
(15, NULL, NULL, 'Purina Ultium Growth Horse Formula', 5, 'ordered', 25),
(16, NULL, NULL, 'Purina FreedomFlex Joint Health Product', 5, 'ordered', 25),
(17, NULL, NULL, 'Purina HydraSalt Salt Supplement', 5, 'ordered', 25);

-- --------------------------------------------------------

--
-- Table structure for table `horses`
--

CREATE TABLE IF NOT EXISTS `horses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `yob` int(4) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `projectCreator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `horses`
--

INSERT INTO `horses` (`id`, `name`, `yob`, `breed`, `gender`, `owner`, `projectCreator`) VALUES
(1, 'Rey Castellano NE', 2006, 'Andalusian', 'Stallion', '1', 25),
(2, 'Rembrandt NE', 2006, 'Friesian', 'Stallion', '2', 25),
(3, 'Nightshades Gypsy King', 2006, 'Gypsy Vanner', 'Stallion', '3', 25),
(4, 'Raerzara', 2006, 'Andalusian', 'Mare', '4', 25),
(5, 'Adelheid', 2006, 'Andalusian', 'Mare', '4', 25);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientID` int(11) unsigned DEFAULT NULL,
  `teamID` int(11) unsigned DEFAULT NULL,
  `projectName` text,
  `projectDescription` text,
  `updatedDate` char(32) DEFAULT NULL,
  `dueDate` char(32) DEFAULT NULL,
  `status` char(32) DEFAULT NULL,
  `startDate` char(32) DEFAULT NULL,
  `projectCreator` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teamID` (`teamID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `clientID`, `teamID`, `projectName`, `projectDescription`, `updatedDate`, `dueDate`, `status`, `startDate`, `projectCreator`) VALUES
(1, 1, NULL, 'Task Management App', 'Create a project manager as a rich web application, utilizing jQuery and server-side restful actions accessed via ajax.  Features incorporated should be UX-centric, following the functional specifications provided by the SFW2 contact.', NULL, NULL, 'active', NULL, 11),
(2, 1, NULL, 'WFP Final Project', 'A project concept to be defined and executed with flawless precision and professionalism by the student with the help of Full Sail University''s outstanding educational team.', NULL, NULL, 'active', NULL, 11),
(3, 3, NULL, 'Learning JavaScript', 'Become a ninja with JavaScript.', NULL, NULL, 'delayed', NULL, 5),
(4, 2, NULL, 'No Ones Project', 'This job is worked on by very scary testing ghosts who make sure that content is limited correctly.', NULL, NULL, 'delayed', NULL, 5),
(27, NULL, NULL, 'Student Test', 'This is an emergency test of the student project adding system for SFW2.', NULL, NULL, 'active', 'Wed, 27 Jul 2011 00:17:05 GMT', 11),
(35, NULL, NULL, 'test', 'test', NULL, '2014-03-30', 'unpaid', NULL, 25),
(36, NULL, NULL, 'test', 'test test', NULL, NULL, 'test', NULL, 25),
(37, NULL, NULL, 'test', 'test', NULL, '03/31/2014', 'test', NULL, 25),
(38, NULL, NULL, 'Test', 'Test', NULL, '05/04/2014', 'paid', NULL, 25),
(39, NULL, NULL, 'Test', 'test', NULL, '03/31/2014', 'paid', NULL, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `projectID` int(11) unsigned DEFAULT NULL,
  `taskeeID` int(11) unsigned DEFAULT NULL,
  `taskCreator` int(11) unsigned DEFAULT NULL,
  `taskName` text,
  `taskDescription` text,
  `specs` text,
  `status` char(32) DEFAULT 'active',
  `priority` int(32) unsigned DEFAULT NULL,
  `updatedDate` char(32) DEFAULT NULL,
  `dueDate` char(32) DEFAULT NULL,
  `startDate` char(32) DEFAULT NULL,
  `hourlyRate` char(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projectID` (`projectID`),
  KEY `taskeeID` (`taskeeID`),
  KEY `creator` (`taskCreator`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `projectID`, `taskeeID`, `taskCreator`, `taskName`, `taskDescription`, `specs`, `status`, `priority`, `updatedDate`, `dueDate`, `startDate`, `hourlyRate`) VALUES
(1, 1, 11, 5, 'Creative Brief', 'Prepare creative pitch for the client.  Due date is the client meeting and project kickoff.  Creative document needs:  feature specifications, wireframes, design compositions, style guide, project planning chart.', NULL, 'active', 1, NULL, NULL, NULL, NULL),
(2, 1, 11, 5, 'Prototype', 'Develop the HTML and CSS prototype foundation of the project.  Goal is to ready all necessary HTML, CSS, and image elements before client side or server side development begins.', NULL, 'active', 2, NULL, NULL, NULL, NULL),
(3, 1, 11, 5, 'Development Milestone', 'First major project milestone, as agreed on with client.  Functionality to have done:  user signup, user login and logout, template loading for landing page and application, initial dashboard content for application.', NULL, 'active', 3, NULL, NULL, NULL, NULL),
(4, 1, 11, 5, 'Revisions', 'Revisit all functionality specifications originally planned, and determine current project status.  Schedule client meeting for any revision needs or scope changes before final product launch.', NULL, 'active', 4, NULL, NULL, NULL, NULL),
(5, 1, 11, 5, 'Launch', 'Deploy application and remove beta access from live tests.  Hand off all assets to client per contract needs and finalize work.', NULL, 'active', 5, NULL, NULL, NULL, NULL),
(6, 2, 11, 5, 'Brainstorm Final Project Concept', 'Before WFP begins, the student should come up with a few ideas for a final project that they would like to leave Full Sail with.  The final project is an opportunity to showcase design and development skills to the industry using whatever you are passionate about.  Get started early!', NULL, 'active', 1, NULL, NULL, NULL, NULL),
(7, 4, 11, 11, 'Blah', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL),
(9, 1, 11, 11, 'Return Test', NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(128) DEFAULT NULL,
  `description` text,
  `website` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `website`) VALUES
(1, 'Scripting For Web', 'This team out of the Full Sail University office in Orlando is focused on the development of projects for WDD instructors on the campus.  The team consists of 1 student.', 'http://www.fullsail.com');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE IF NOT EXISTS `training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horseid` int(11) NOT NULL,
  `session` text NOT NULL,
  `workon` text NOT NULL,
  `last` date NOT NULL,
  `next` date NOT NULL,
  `projectCreator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `horseid`, `session`, `workon`, `last`, `next`, `projectCreator`) VALUES
(1, 1, 'Rey needs to work on lead changes.', 'Rey needs to work on lead changes.', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teamID` int(11) unsigned DEFAULT NULL,
  `user_n` char(32) NOT NULL,
  `user_p` char(64) NOT NULL,
  `salt` char(8) NOT NULL,
  `first_name` char(32) NOT NULL,
  `last_name` char(32) NOT NULL,
  `email` text NOT NULL,
  `phone` char(32) DEFAULT NULL,
  `city` char(32) DEFAULT NULL,
  `state` char(32) DEFAULT NULL,
  `zipcode` mediumint(6) DEFAULT NULL,
  `avatar` text,
  `role` char(32) DEFAULT NULL,
  `stable` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_n` (`user_n`),
  KEY `teamID` (`teamID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `teamID`, `user_n`, `user_p`, `salt`, `first_name`, `last_name`, `email`, `phone`, `city`, `state`, `zipcode`, `avatar`, `role`, `stable`) VALUES
(11, NULL, 'student', '1bb683a667421569331ec524f095bbc37e8351118b2ae7cb50d17aacf535f487', '264c8c38', 'Slicky', 'Coder', 'student@fullsail.edu', NULL, 'Orlando', 'FL', 32792, NULL, NULL, ''),
(5, NULL, 'codeinfused', '01756509456b8ed2112b0c034c315b458d9fc4baae65c4e636eba1cb4a5f688b', '11054932', 'Michael', 'Smotherman', 'msmotherman@fullsail.com', '555-555-5555', NULL, NULL, NULL, NULL, NULL, ''),
(25, NULL, 'curlylox82', 'e926964b17eabf6fc17d479855243029493aa2a79598de3dad89612fb4789cf3', 'ea56e022', 'Tara', 'Thorne', 'curlylox1982@gmail.com', '(717) 360-9531', 'Chambersburg', 'Pennsylvanua', 17201, '', NULL, 'Nightshade Estates');

-- --------------------------------------------------------

--
-- Table structure for table `userslink`
--

CREATE TABLE IF NOT EXISTS `userslink` (
  `userID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  KEY `userID` (`userID`),
  KEY `projectID` (`projectID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userslink`
--

INSERT INTO `userslink` (`userID`, `projectID`) VALUES
(11, 1),
(11, 2),
(5, 1),
(11, 3),
(11, 28),
(11, 29),
(11, 30),
(11, 31),
(11, 32),
(11, 33),
(11, 34),
(25, 35),
(25, 36),
(25, 37),
(25, 38),
(25, 39),
(25, 1),
(25, 1),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(25, 8),
(25, 9),
(25, 10),
(25, 11),
(25, 12),
(25, 13),
(25, 14),
(25, 15),
(25, 16),
(25, 17),
(25, 1),
(25, 2),
(25, 3),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(0, 1),
(0, 1),
(0, 1),
(0, 2),
(0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
