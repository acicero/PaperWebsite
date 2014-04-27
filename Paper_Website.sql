-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2014 at 03:13 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Paper_Website`
--

-- --------------------------------------------------------

--
-- Table structure for table `Paper`
--

CREATE TABLE IF NOT EXISTS `Paper` (
  `userid` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `paperid` int(5) NOT NULL,
  `reviewers_assigned1` int(5) NOT NULL,
  `paper_pdf` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `reviewers_assigned2` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`paperid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Paper`
--

INSERT INTO `Paper` (`userid`, `title`, `paperid`, `reviewers_assigned1`, `paper_pdf`, `status`, `reviewers_assigned2`, `date`) VALUES
(12345, 'PaperTitle1', 11111, 12346, 'fakefilepath', 0, 12347, '2014-04-01'),
(12345, 'PaperTitle2', 11112, 12346, 'fakefilepath', 0, 12347, '2014-04-01'),
(12345, 'PaperTitle3', 11113, 12346, 'fakefilepath', 0, 12347, '2014-04-01'),
(12345, 'PaperTitle4', 11114, 12346, 'fakefilepath', 0, 12347, '2014-04-01'),
(12345, 'PaperTitle5', 11115, 12346, 'fakefilepath', 0, 12347, '2014-04-01'),
(12345, 'PaperTitle6', 11116, 12346, 'fakefilepath', 0, 12347, '2014-04-01'),
(12345, 'PaperTitle7', 11117, 12346, 'fakefilepath', 0, 12347, '2014-04-02'),
(12345, 'PaperTitle8', 11118, 12348, 'fakefilepath', 0, 12347, '2014-04-03'),
(12345, 'PaperTitle9', 11119, 12346, 'fakefilepath', 0, 12347, '2014-04-05'),
(12346, 'PaperTitle1', 22222, 12347, 'fakefilepath', 0, 12348, '2014-04-15'),
(12346, 'PaperTitle2', 22223, 12347, 'fakefilepath', 0, 12348, '2014-04-13'),
(12347, 'PaperTitle1', 33333, 12348, 'fakefilepath', 0, 12346, '2014-04-21'),
(12347, 'PaperTitle2', 33334, 12348, 'fakefilepath', 0, 12346, '2014-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE IF NOT EXISTS `Reviews` (
  `reviewid` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `paperid` int(5) NOT NULL,
  `rating` int(1) NOT NULL,
  `written_to` int(5) NOT NULL,
  `review` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`reviewid`),
  UNIQUE KEY `userid` (`userid`,`paperid`),
  UNIQUE KEY `paperid` (`paperid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`reviewid`, `userid`, `paperid`, `rating`, `written_to`, `review`, `comment`) VALUES
(54321, 12346, 11111, 3, 12345, 'It was pretty adgohkadsfnkasdflknafdskln;afdslnkaldfns;ln;kfdasln;k fnldfs ln;kdsf ;nldsfkln; dfsnl; dfsnldfsnl dfsnldfsnlkdfsldfksln;fdksnl;kf dsnlk; fdslnfd nl dfsnl; kdfsnl;dkfs;n lfkdnl fdsknlfdksnl kfdn;lfdnlfdlfds', 'It was OKAY dsakjflkafdsjlkfdjs;fdjsfdkljs fdslf dl dfslj;k dfsjlk djsflkfdljkslf dsjk fdkjs fdskdf sk;d fkjsdf ks'),
(54322, 12346, 11112, 5, 12345, 'Best paper submittied ever. lkaj;sfdn;kasdgklnfavfk;lnasgklnasdgkgdsahadsgjkabdgs kjbdg sakjbgd sakjbgdsa bjk agsdkjbavkjbdsbvkjbkj dfsakbjd sfabkjvadskbj asdkbj dvsakbj', '10/10 would read again.\r\n\r\nfadsl;jkfad;lskjfadlskj\r\n\r\nFSAD;dfsa;lkfdsaj;lkfdsj\r\n\r\nShit ballsdafs;lkj;afdslkj;lkasd;lkjdfaslkjafsdlknavsdlnkavsdlknasvdlknlnksdval;knsdalk;nsdvlknsdflnksdvlkn');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `userid` int(10) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `permission` int(1) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userid`, `lname`, `fname`, `email`, `password`, `permission`) VALUES
(12345, 'Dick', 'Tricky', 'trickydick@aroo.com', '202cb962ac59075b964b07152d234b70', 1),
(12346, 'Johnson', 'Don', 'donjohnson@email.com', '47bce5c74f589f4867dbd57e9ca9f808', 2),
(12347, 'Jackson', 'Joe', 'joejackson@aol.com', '0cc175b9c0f1b6a831c399e269772661', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
