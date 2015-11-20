-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 20 Novembre 2015 à 09:30
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
-- Structure de la table `VR_grp1_Jeux`
--

CREATE TABLE `VR_grp1_Jeux` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `AGE` int(255) NOT NULL,
  `TYPE` varchar(10) NOT NULL,
  `JOUEUR` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `STOCK` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `VR_grp1_Jeux`
--

INSERT INTO `VR_grp1_Jeux` (`ID`, `NOM`, `DESCRIPTION`, `IMAGE`, `AGE`, `TYPE`, `JOUEUR`, `QUANTITE`, `STOCK`) VALUES
(2, 'Uno', 'Jeux de carte', 'Jeux de carte', 3, 'CARTE', 8, 5, 4),
(3, 'Monopoly', 'description du monopoly', 'description du monopoly', 10, 'SOCIETE', 6, 3, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `VR_grp1_Jeux`
--
ALTER TABLE `VR_grp1_Jeux`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `VR_grp1_Jeux`
--
ALTER TABLE `VR_grp1_Jeux`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
