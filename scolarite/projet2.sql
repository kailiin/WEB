SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE `projet2_notes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projet2_notes`;


-- --------------------------------------------------------

--
-- Table structure for table `affectations`
--

CREATE TABLE IF NOT EXISTS `affectations` (
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  PRIMARY KEY (`uid`,`gid`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `affectations`
--


-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `noet` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `filiere` varchar(20) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`eid`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `etudiants`
--


-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(100) COLLATE utf8_general_ci NOT NULL,
  `discipline` varchar(50) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`mid`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `modules`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

CREATE TABLE IF NOT EXISTS `groupes` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `intitule` varchar(100) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`gid`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `gid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `note` decimal(4,2) NOT NULL,
  PRIMARY KEY (`gid`,`eid`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notes`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_general_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_general_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_general_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_general_ci NOT NULL,
  `mdp` char(50) COLLATE utf8_general_ci NOT NULL,
  `type` enum('sco','ens') COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`userid`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

