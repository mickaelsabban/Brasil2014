-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2013 at 11:14 PM
-- Server version: 5.1.63-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leasabba_euro2012`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bonus`
--

CREATE TABLE IF NOT EXISTS `Bonus` (
  `Bonus_id` int(2) NOT NULL AUTO_INCREMENT,
  `Bonus_name` varchar(20) NOT NULL,
  `Bonus_result` varchar(20) NOT NULL,
  PRIMARY KEY (`Bonus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Bonus`
--

INSERT INTO `Bonus` (`Bonus_id`, `Bonus_name`, `Bonus_result`) VALUES
(1, 'Winner', ''),
(2, 'Best_Striker', '');

-- --------------------------------------------------------

--
-- Table structure for table `Buteurs`
--

CREATE TABLE IF NOT EXISTS `Buteurs` (
  `Buteur_id` int(2) NOT NULL AUTO_INCREMENT,
  `Buteur_name` varchar(20) NOT NULL,
  PRIMARY KEY (`Buteur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Buteurs`
--

INSERT INTO `Buteurs` (`Buteur_id`, `Buteur_name`) VALUES
(1, 'Gomez'),
(2, 'Van Persie'),
(3, 'Ronaldo'),
(4, 'Klose'),
(5, 'Benzema'),
(6, 'Balotelli');

-- --------------------------------------------------------

--
-- Table structure for table `Endtimeinput`
--

CREATE TABLE IF NOT EXISTS `Endtimeinput` (
  `type_match` varchar(50) NOT NULL,
  `end_date` date NOT NULL,
  `coef` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Endtimeinput`
--

INSERT INTO `Endtimeinput` (`type_match`, `end_date`, `coef`) VALUES
('Poule', '2013-05-06', 1),
('Round Sixteen', '2013-05-06', 1),
('Quarter Final', '2013-05-10', 1.5),
('Semi Final', '2013-05-14', 2),
('Loser Final', '2013-05-14', 2),
('Final', '2013-05-25', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Equipes`
--

CREATE TABLE IF NOT EXISTS `Equipes` (
  `Equipe_id` int(2) NOT NULL AUTO_INCREMENT,
  `Equipe Name` varchar(20) NOT NULL,
  PRIMARY KEY (`Equipe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Equipes`
--

INSERT INTO `Equipes` (`Equipe_id`, `Equipe Name`) VALUES
(1, 'Allemagne'),
(2, 'Angleterre'),
(3, 'Croatie'),
(4, 'Danemark'),
(5, 'Espagne'),
(6, 'France'),
(7, 'Grece'),
(8, 'Italie'),
(9, 'Irlande'),
(10, 'Pays Bas'),
(11, 'Pologne'),
(12, 'Portugal'),
(13, 'Rep. Tcheque'),
(14, 'Russie'),
(15, 'Suede'),
(16, 'Ukraine');

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE IF NOT EXISTS `matchs` (
  `Id_match` int(2) NOT NULL AUTO_INCREMENT,
  `equipe_1` varchar(20) NOT NULL,
  `equipe_2` varchar(20) NOT NULL,
  `score_e1` int(2) DEFAULT NULL,
  `score_e2` int(2) DEFAULT NULL,
  `Type_match` varchar(50) NOT NULL,
  `Type_match2` varchar(20) NOT NULL,
  `ordre_affichage` int(3) NOT NULL,
  PRIMARY KEY (`Id_match`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`Id_match`, `equipe_1`, `equipe_2`, `score_e1`, `score_e2`, `Type_match`, `Type_match2`, `ordre_affichage`) VALUES
(1, 'Pologne', 'Grece', 1, 1, 'Poule', 'A', 1),
(2, 'Russie', 'Rep. Tcheque', 4, 1, 'Poule', 'A', 2),
(3, 'Pays-Bas', 'Danemark', 0, 1, 'Poule', 'B', 7),
(4, 'Allemagne', 'Portugal', 1, 0, 'Poule', 'B', 8),
(5, 'Espagne', 'Italie', 1, 1, 'Poule', 'C', 13),
(6, 'Irlande', 'Croatie', 1, 3, 'Poule', 'C', 14),
(7, 'France', 'Angleterre', 1, 1, 'Poule', 'D', 19),
(8, 'Ukraine', 'Suede', 2, 1, 'Poule', 'D', 20),
(9, 'Grece', 'Rep. tcheque', 1, 2, 'Poule', 'A', 3),
(10, 'Pologne', 'Russie', 1, 1, 'Poule', 'A', 4),
(11, 'Danemark', 'Portugal', 2, 3, 'Poule', 'B', 9),
(12, 'Pays-Bas', 'Allemagne', 1, 2, 'Poule', 'B', 10),
(13, 'Italie', 'Croatie', 1, 1, 'Poule', 'C', 15),
(14, 'Espagne', 'Irlande', 4, 0, 'Poule', 'C', 16),
(15, 'Ukraine', 'France', 0, 2, 'Poule', 'D', 21),
(16, 'Suede', 'Angleterre', 2, 3, 'Poule', 'D', 22),
(17, 'Grece', 'Russie', 1, 0, 'Poule', 'A', 5),
(18, 'Rep. Tcheque', 'Pologne', 1, 0, 'Poule', 'A', 6),
(19, 'Portugal', 'Pays-Bas', 2, 1, 'Poule', 'B', 11),
(20, 'Danemark', 'Allemagne', 1, 2, 'Poule', 'B', 12),
(21, 'Croatie', 'Espagne', 0, 1, 'Poule', 'C', 17),
(22, 'Italie', 'Irlande', 2, 0, 'Poule', 'C', 18),
(23, 'Angleterre', 'Ukraine', 1, 0, 'Poule', 'D', 23),
(24, 'Suede', 'France', 2, 0, 'Poule', 'D', 24),
(25, 'Rep. Tcheque', 'Portugal', 0, 1, 'Quarter Final', '', 25),
(26, 'Allemagne', 'Grece', 4, 2, 'Quarter Final', '', 26),
(27, 'Espagne', 'France', 2, 0, 'Quarter Final', '', 27),
(28, 'Angleterre', 'Italie', 0, 0, 'Quarter Final', '', 28),
(29, 'Espagne', 'Portugal', NULL, 0, 'Semi Final', '', 29),
(30, 'Allemagne', 'Italie', 1, 2, 'Semi Final', '', 30),
(31, 'Espagne', 'Italie', NULL, NULL, 'Final', '', 31);

-- --------------------------------------------------------

--
-- Table structure for table `Parieur`
--

CREATE TABLE IF NOT EXISTS `Parieur` (
  `id_parieur` int(2) NOT NULL AUTO_INCREMENT,
  `nom_parieur` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_parieur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Parieur`
--

INSERT INTO `Parieur` (`id_parieur`, `nom_parieur`, `email`, `password`) VALUES
(1, 'Mika', '', '$1$wrgxWXxd$SRIsY/hHD8K4JKT9GdIOE/'),
(2, 'Greg', '', '$1$WjuumyGD$XvufzwGXv.HBay/4MlRnj0'),
(3, 'Matt', '', '$1$YQkUdQnU$6B.F7ZrK/ptQ.i4xqueCJ/'),
(5, 'L', '', '$1$3D1FK1/L$r0Mn0DEXH8xGD7JK.tBSv0'),
(7, 'Boba', 'b@b.com', '$1$N1cqbEox$Z3uPcATrphTj3kUUCSo3O0'),
(8, 'Jj', 'n@n.com', '$1$v8Wfg7PT$Cf.bV1kM2G5h9YBQXusD..'),
(9, 'Mattcat', 'aaa@aaa', '$1$/bVrZ5GB$vRwNMUb7OH1uAenNVT2FW/');

-- --------------------------------------------------------

--
-- Table structure for table `Paris`
--

CREATE TABLE IF NOT EXISTS `Paris` (
  `parieur` int(2) NOT NULL AUTO_INCREMENT,
  `nb_but_e1_m1` int(2) DEFAULT NULL,
  `nb_but_e2_m1` int(2) DEFAULT NULL,
  `nb_but_e1_m2` int(2) DEFAULT NULL,
  `nb_but_e2_m2` int(2) DEFAULT NULL,
  `nb_but_e1_m3` int(2) DEFAULT NULL,
  `nb_but_e2_m3` int(2) DEFAULT NULL,
  `nb_but_e1_m4` int(2) DEFAULT NULL,
  `nb_but_e2_m4` int(2) DEFAULT NULL,
  `nb_but_e1_m5` int(2) DEFAULT NULL,
  `nb_but_e2_m5` int(2) DEFAULT NULL,
  `nb_but_e1_m6` int(2) DEFAULT NULL,
  `nb_but_e2_m6` int(2) DEFAULT NULL,
  `nb_but_e1_m7` int(2) DEFAULT NULL,
  `nb_but_e2_m7` int(2) DEFAULT NULL,
  `nb_but_e1_m8` int(2) DEFAULT NULL,
  `nb_but_e2_m8` int(2) DEFAULT NULL,
  `nb_but_e1_m9` int(2) DEFAULT NULL,
  `nb_but_e2_m9` int(2) DEFAULT NULL,
  `nb_but_e1_m10` int(2) DEFAULT NULL,
  `nb_but_e2_m10` int(2) DEFAULT NULL,
  `nb_but_e1_m11` int(2) DEFAULT NULL,
  `nb_but_e2_m11` int(2) DEFAULT NULL,
  `nb_but_e1_m12` int(2) DEFAULT NULL,
  `nb_but_e2_m12` int(2) DEFAULT NULL,
  `nb_but_e1_m13` int(2) DEFAULT NULL,
  `nb_but_e2_m13` int(2) DEFAULT NULL,
  `nb_but_e1_m14` int(2) DEFAULT NULL,
  `nb_but_e2_m14` int(2) DEFAULT NULL,
  `nb_but_e1_m15` int(2) DEFAULT NULL,
  `nb_but_e2_m15` int(2) DEFAULT NULL,
  `nb_but_e1_m16` int(2) DEFAULT NULL,
  `nb_but_e2_m16` int(2) DEFAULT NULL,
  `nb_but_e1_m17` int(2) DEFAULT NULL,
  `nb_but_e2_m17` int(2) DEFAULT NULL,
  `nb_but_e1_m18` int(2) DEFAULT NULL,
  `nb_but_e2_m18` int(2) DEFAULT NULL,
  `nb_but_e1_m19` int(2) DEFAULT NULL,
  `nb_but_e2_m19` int(2) DEFAULT NULL,
  `nb_but_e1_m20` int(2) DEFAULT NULL,
  `nb_but_e2_m20` int(2) DEFAULT NULL,
  `nb_but_e1_m21` int(2) DEFAULT NULL,
  `nb_but_e2_m21` int(2) DEFAULT NULL,
  `nb_but_e1_m22` int(2) DEFAULT NULL,
  `nb_but_e2_m22` int(2) DEFAULT NULL,
  `nb_but_e1_m23` int(2) DEFAULT NULL,
  `nb_but_e2_m23` int(2) DEFAULT NULL,
  `nb_but_e1_m24` int(2) DEFAULT NULL,
  `nb_but_e2_m24` int(2) DEFAULT NULL,
  `nb_but_e1_m25` int(2) DEFAULT NULL,
  `nb_but_e2_m25` int(2) DEFAULT NULL,
  `nb_but_e1_m26` int(2) DEFAULT NULL,
  `nb_but_e2_m26` int(2) DEFAULT NULL,
  `nb_but_e1_m27` int(2) DEFAULT NULL,
  `nb_but_e2_m27` int(2) DEFAULT NULL,
  `nb_but_e1_m28` int(2) DEFAULT NULL,
  `nb_but_e2_m28` int(2) DEFAULT NULL,
  `nb_but_e1_m29` int(2) DEFAULT NULL,
  `nb_but_e2_m29` int(2) DEFAULT NULL,
  `nb_but_e1_m30` int(2) DEFAULT NULL,
  `nb_but_e2_m30` int(2) DEFAULT NULL,
  `nb_but_e1_m31` int(2) DEFAULT NULL,
  `nb_but_e2_m31` int(2) DEFAULT NULL,
  `nb_but_e1_m32` int(2) DEFAULT NULL,
  `nb_but_e2_m32` int(2) DEFAULT NULL,
  `winner` varchar(20) DEFAULT NULL,
  `best_scorer` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`parieur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Paris`
--

INSERT INTO `Paris` (`parieur`, `nb_but_e1_m1`, `nb_but_e2_m1`, `nb_but_e1_m2`, `nb_but_e2_m2`, `nb_but_e1_m3`, `nb_but_e2_m3`, `nb_but_e1_m4`, `nb_but_e2_m4`, `nb_but_e1_m5`, `nb_but_e2_m5`, `nb_but_e1_m6`, `nb_but_e2_m6`, `nb_but_e1_m7`, `nb_but_e2_m7`, `nb_but_e1_m8`, `nb_but_e2_m8`, `nb_but_e1_m9`, `nb_but_e2_m9`, `nb_but_e1_m10`, `nb_but_e2_m10`, `nb_but_e1_m11`, `nb_but_e2_m11`, `nb_but_e1_m12`, `nb_but_e2_m12`, `nb_but_e1_m13`, `nb_but_e2_m13`, `nb_but_e1_m14`, `nb_but_e2_m14`, `nb_but_e1_m15`, `nb_but_e2_m15`, `nb_but_e1_m16`, `nb_but_e2_m16`, `nb_but_e1_m17`, `nb_but_e2_m17`, `nb_but_e1_m18`, `nb_but_e2_m18`, `nb_but_e1_m19`, `nb_but_e2_m19`, `nb_but_e1_m20`, `nb_but_e2_m20`, `nb_but_e1_m21`, `nb_but_e2_m21`, `nb_but_e1_m22`, `nb_but_e2_m22`, `nb_but_e1_m23`, `nb_but_e2_m23`, `nb_but_e1_m24`, `nb_but_e2_m24`, `nb_but_e1_m25`, `nb_but_e2_m25`, `nb_but_e1_m26`, `nb_but_e2_m26`, `nb_but_e1_m27`, `nb_but_e2_m27`, `nb_but_e1_m28`, `nb_but_e2_m28`, `nb_but_e1_m29`, `nb_but_e2_m29`, `nb_but_e1_m30`, `nb_but_e2_m30`, `nb_but_e1_m31`, `nb_but_e2_m31`, `nb_but_e1_m32`, `nb_but_e2_m32`, `winner`, `best_scorer`) VALUES
(1, 1, 1, 0, 2, 3, 1, 2, 0, 2, 0, 0, 1, 1, 1, 1, 2, 0, 2, 1, 0, 0, 1, 1, 1, 2, 1, 3, 0, 1, 3, 2, 3, 0, 2, 1, 1, 2, 1, 0, 2, 1, 1, 2, 1, 1, 0, 0, 0, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, NULL, NULL, 'Allemagne', ''),
(2, 2, 0, 3, 0, 3, 1, 3, 2, 1, 0, 0, 1, 2, 1, 0, 0, 1, 1, 2, 2, 1, 3, 3, 3, 1, 0, 4, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 2, 0, 3, 0, 3, 1, 0, 1, 1, 0, 2, 1, 2, 2, 0, 2, 1, 1, 1, 1, 2, 2, 1, NULL, NULL, NULL, NULL, 'Allemagne', 'Van Persie'),
(3, 1, 1, 2, 0, 2, 0, 3, 1, 2, 1, 0, 0, 3, 0, 1, 1, 1, 0, 1, 1, 0, 1, 2, 2, 1, 0, 2, 0, 0, 3, 0, 1, 0, 1, 2, 0, 1, 3, 0, 2, 0, 2, 1, 0, 1, 1, 0, 3, 0, 2, 2, 0, 1, 1, 2, 1, 1, 3, 3, 1, NULL, NULL, NULL, NULL, 'Espagne', 'Torres'),
(5, 1, 1, 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3, 3, 2, 2, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 3, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 'Allemagne', 'Balotelli'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ParisTemp`
--

CREATE TABLE IF NOT EXISTS `ParisTemp` (
  `parieur` int(2) NOT NULL AUTO_INCREMENT,
  `nb_but_e1_m1` int(2) DEFAULT NULL,
  `nb_but_e2_m1` int(2) DEFAULT NULL,
  `nb_but_e1_m2` int(2) DEFAULT NULL,
  `nb_but_e2_m2` int(2) DEFAULT NULL,
  `nb_but_e1_m3` int(2) DEFAULT NULL,
  `nb_but_e2_m3` int(2) DEFAULT NULL,
  `nb_but_e1_m4` int(2) DEFAULT NULL,
  `nb_but_e2_m4` int(2) DEFAULT NULL,
  `nb_but_e1_m5` int(2) DEFAULT NULL,
  `nb_but_e2_m5` int(2) DEFAULT NULL,
  `nb_but_e1_m6` int(2) DEFAULT NULL,
  `nb_but_e2_m6` int(2) DEFAULT NULL,
  `nb_but_e1_m7` int(2) DEFAULT NULL,
  `nb_but_e2_m7` int(2) DEFAULT NULL,
  `nb_but_e1_m8` int(2) DEFAULT NULL,
  `nb_but_e2_m8` int(2) DEFAULT NULL,
  `nb_but_e1_m9` int(2) DEFAULT NULL,
  `nb_but_e2_m9` int(2) DEFAULT NULL,
  `nb_but_e1_m10` int(2) DEFAULT NULL,
  `nb_but_e2_m10` int(2) DEFAULT NULL,
  `nb_but_e1_m11` int(2) DEFAULT NULL,
  `nb_but_e2_m11` int(2) DEFAULT NULL,
  `nb_but_e1_m12` int(2) DEFAULT NULL,
  `nb_but_e2_m12` int(2) DEFAULT NULL,
  `nb_but_e1_m13` int(2) DEFAULT NULL,
  `nb_but_e2_m13` int(2) DEFAULT NULL,
  `nb_but_e1_m14` int(2) DEFAULT NULL,
  `nb_but_e2_m14` int(2) DEFAULT NULL,
  `nb_but_e1_m15` int(2) DEFAULT NULL,
  `nb_but_e2_m15` int(2) DEFAULT NULL,
  `nb_but_e1_m16` int(2) DEFAULT NULL,
  `nb_but_e2_m16` int(2) DEFAULT NULL,
  `nb_but_e1_m17` int(2) DEFAULT NULL,
  `nb_but_e2_m17` int(2) DEFAULT NULL,
  `nb_but_e1_m18` int(2) DEFAULT NULL,
  `nb_but_e2_m18` int(2) DEFAULT NULL,
  `nb_but_e1_m19` int(2) DEFAULT NULL,
  `nb_but_e2_m19` int(2) DEFAULT NULL,
  `nb_but_e1_m20` int(2) DEFAULT NULL,
  `nb_but_e2_m20` int(2) DEFAULT NULL,
  `nb_but_e1_m21` int(2) DEFAULT NULL,
  `nb_but_e2_m21` int(2) DEFAULT NULL,
  `nb_but_e1_m22` int(2) DEFAULT NULL,
  `nb_but_e2_m22` int(2) DEFAULT NULL,
  `nb_but_e1_m23` int(2) DEFAULT NULL,
  `nb_but_e2_m23` int(2) DEFAULT NULL,
  `nb_but_e1_m24` int(2) DEFAULT NULL,
  `nb_but_e2_m24` int(2) DEFAULT NULL,
  `nb_but_e1_m25` int(2) DEFAULT NULL,
  `nb_but_e2_m25` int(2) DEFAULT NULL,
  `nb_but_e1_m26` int(2) DEFAULT NULL,
  `nb_but_e2_m26` int(2) DEFAULT NULL,
  `nb_but_e1_m27` int(2) DEFAULT NULL,
  `nb_but_e2_m27` int(2) DEFAULT NULL,
  `nb_but_e1_m28` int(2) DEFAULT NULL,
  `nb_but_e2_m28` int(2) DEFAULT NULL,
  `nb_but_e1_m29` int(2) DEFAULT NULL,
  `nb_but_e2_m29` int(2) DEFAULT NULL,
  `nb_but_e1_m30` int(2) DEFAULT NULL,
  `nb_but_e2_m30` int(2) DEFAULT NULL,
  `nb_but_e1_m31` int(2) DEFAULT NULL,
  `nb_but_e2_m31` int(2) DEFAULT NULL,
  `nb_but_e1_m32` int(2) DEFAULT NULL,
  `nb_but_e2_m32` int(2) DEFAULT NULL,
  `winner` varchar(20) DEFAULT NULL,
  `best_scorer` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`parieur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ParisTemp`
--

INSERT INTO `ParisTemp` (`parieur`, `nb_but_e1_m1`, `nb_but_e2_m1`, `nb_but_e1_m2`, `nb_but_e2_m2`, `nb_but_e1_m3`, `nb_but_e2_m3`, `nb_but_e1_m4`, `nb_but_e2_m4`, `nb_but_e1_m5`, `nb_but_e2_m5`, `nb_but_e1_m6`, `nb_but_e2_m6`, `nb_but_e1_m7`, `nb_but_e2_m7`, `nb_but_e1_m8`, `nb_but_e2_m8`, `nb_but_e1_m9`, `nb_but_e2_m9`, `nb_but_e1_m10`, `nb_but_e2_m10`, `nb_but_e1_m11`, `nb_but_e2_m11`, `nb_but_e1_m12`, `nb_but_e2_m12`, `nb_but_e1_m13`, `nb_but_e2_m13`, `nb_but_e1_m14`, `nb_but_e2_m14`, `nb_but_e1_m15`, `nb_but_e2_m15`, `nb_but_e1_m16`, `nb_but_e2_m16`, `nb_but_e1_m17`, `nb_but_e2_m17`, `nb_but_e1_m18`, `nb_but_e2_m18`, `nb_but_e1_m19`, `nb_but_e2_m19`, `nb_but_e1_m20`, `nb_but_e2_m20`, `nb_but_e1_m21`, `nb_but_e2_m21`, `nb_but_e1_m22`, `nb_but_e2_m22`, `nb_but_e1_m23`, `nb_but_e2_m23`, `nb_but_e1_m24`, `nb_but_e2_m24`, `nb_but_e1_m25`, `nb_but_e2_m25`, `nb_but_e1_m26`, `nb_but_e2_m26`, `nb_but_e1_m27`, `nb_but_e2_m27`, `nb_but_e1_m28`, `nb_but_e2_m28`, `nb_but_e1_m29`, `nb_but_e2_m29`, `nb_but_e1_m30`, `nb_but_e2_m30`, `nb_but_e1_m31`, `nb_but_e2_m31`, `nb_but_e1_m32`, `nb_but_e2_m32`, `winner`, `best_scorer`) VALUES
(1, 1, 1, 0, 2, 3, 1, 2, 0, 2, 0, 0, 1, 1, 1, 1, 2, 0, 2, 1, 0, 0, 1, 1, 1, 2, 1, 3, 0, 1, 3, 2, 3, 0, 2, 1, 1, 2, 1, 0, 2, 1, 1, 2, 1, 1, 0, 0, 0, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, NULL, NULL, 'Allemagne', ''),
(2, 2, 0, 3, 0, 3, 1, 3, 2, 1, 0, 0, 1, 2, 1, 0, 0, 1, 1, 2, 2, 1, 3, 3, 3, 1, 0, 4, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 2, 0, 3, 0, 3, 1, 0, 1, 1, 0, 2, 1, 2, 2, 0, 2, 1, 1, 1, 1, 2, 2, 1, NULL, NULL, NULL, NULL, 'Allemagne', 'Van Persie'),
(3, 1, 1, 2, 0, 2, 0, 3, 1, 2, 1, 0, 0, 3, 0, 1, 1, 1, 0, 1, 1, 0, 1, 2, 2, 1, 0, 2, 0, 0, 3, 0, 1, 0, 1, 2, 0, 1, 3, 0, 2, 0, 2, 1, 0, 1, 1, 0, 3, 0, 2, 2, 0, 1, 1, 2, 1, 1, 3, 3, 1, NULL, NULL, NULL, NULL, 'Espagne', 'Torres'),
(5, 1, 1, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 3, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 'Allemagne', 'Balotelli'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         