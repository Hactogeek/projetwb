-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 22 Novembre 2015 à 11:05
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
-- Structure de la table `VR_grp1_Commande`
--

CREATE TABLE `VR_grp1_Commande` (
  `ID` int(11) NOT NULL,
  `IDUSER` int(11) NOT NULL,
  `IDJEUX` int(11) NOT NULL,
  `DATERECUP` datetime NOT NULL,
  `DATERETOUR` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Uno', 'Jeux de carte', 'Jeux de carte', 3, 'CARTE', 8, 5, 9),
(3, 'Monopoly', 'description du monopoly', 'description du monopoly', 10, 'SOCIETE', 6, 3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `VR_grp1_Panier`
--

CREATE TABLE `VR_grp1_Panier` (
  `ID` int(11) NOT NULL,
  `IDUSER` int(11) NOT NULL,
  `IDJEUX` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `VR_grp1_Panier`
--

INSERT INTO `VR_grp1_Panier` (`ID`, `IDUSER`, `IDJEUX`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `VR_grp1_Reservation`
--

CREATE TABLE `VR_grp1_Reservation` (
  `ID` int(11) NOT NULL,
  `IDUSER` int(11) NOT NULL,
  `IDJEUX` int(11) NOT NULL,
  `DATERESA` datetime NOT NULL,
  `DATERECUP` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `VR_grp1_Reservation`
--

INSERT INTO `VR_grp1_Reservation` (`ID`, `IDUSER`, `IDJEUX`, `DATERESA`, `DATERECUP`) VALUES
(10, 1, 2, '2015-11-19 16:01:00', '2015-11-19 16:01:00'),
(11, 1, 2, '2015-11-19 16:01:00', '2015-11-19 16:01:00'),
(12, 1, 3, '2015-11-19 16:02:00', '2015-11-19 16:02:00'),
(13, 1, 2, '2015-11-19 16:02:00', '2015-11-19 16:02:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `VR_grp1_Users`
--

INSERT INTO `VR_grp1_Users` (`ID`, `NAME`, `FIRST_NAME`, `EMAIL`, `PASSWORD`, `REGISTRATION_DATE`) VALUES
(1, 'Marteau', 'Tony', 'tony.marteau@outlook.com', 'bbd91c223cdc46183f3735308d287d32', '2015-11-13'),
(2, 'test', 'test', 'test@test.fr', '098f6bcd4621d373cade4e832627b4f6', '2015-11-13'),
(3, 'Test1', 'Test1', 'test1@test.fr', '5a105e8b9d40e1329780d62ea2265d8a', '2015-11-18'),
(4, 'test', 'test', 'test2@test.fr', '098f6bcd4621d373cade4e832627b4f6', '2015-11-20');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `VR_grp1_Commande`
--
ALTER TABLE `VR_grp1_Commande`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `VR_grp1_Jeux`
--
ALTER TABLE `VR_grp1_Jeux`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `VR_grp1_Panier`
--
ALTER TABLE `VR_grp1_Panier`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `VR_grp1_Reservation`
--
ALTER TABLE `VR_grp1_Reservation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `VR_grp1_Users`
--
ALTER TABLE `VR_grp1_Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `VR_grp1_Commande`
--
ALTER TABLE `VR_grp1_Commande`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `VR_grp1_Jeux`
--
ALTER TABLE `VR_grp1_Jeux`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `VR_grp1_Panier`
--
ALTER TABLE `VR_grp1_Panier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `VR_grp1_Reservation`
--
ALTER TABLE `VR_grp1_Reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `VR_grp1_Users`
--
ALTER TABLE `VR_grp1_Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
