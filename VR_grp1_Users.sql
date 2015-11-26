-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 13 Novembre 2015 à 11:58
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `webDynamique`
--

-- --------------------------------------------------------

--
-- Structure de la table `VR_grp1_Users`
--

CREATE TABLE `VR_grp1_Users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `REGISTRATION_DATE` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `VR_grp1_Users`
--

INSERT INTO `VR_grp1_Users` (`ID`, `NAME`, `FIRST_NAME`, `EMAIL`, `PASSWORD`, `REGISTRATION_DATE`) VALUES
(1, 'Marteau', 'Tony', 'tony.marteau@outlook.com', 'pn03cnt9', '2015-11-13'),
(2, 'test', 'test', 'test@test.fr', '098f6bcd4621d373cade4e832627b4f6', '2015-11-13');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `VR_grp1_Users`
--
ALTER TABLE `VR_grp1_Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `VR_grp1_Users`
--
ALTER TABLE `VR_grp1_Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
