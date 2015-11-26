-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 20 Novembre 2015 à 09:29
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
(3, 1, 2, '2015-11-18 22:29:00', '2015-11-18 15:29:00'),
(4, 1, 3, '2015-11-18 22:29:00', '2015-11-18 15:29:00'),
(5, 1, 2, '2015-11-19 15:56:00', '2015-11-19 15:56:00'),
(6, 1, 3, '2015-11-19 15:57:00', '2015-11-19 15:57:00'),
(7, 1, 3, '2015-11-19 15:58:00', '2015-11-19 15:58:00'),
(8, 1, 2, '2015-11-19 15:59:00', '2015-11-19 15:59:00'),
(9, 1, 2, '2015-11-19 16:00:00', '2015-11-19 16:00:00'),
(10, 1, 2, '2015-11-19 16:01:00', '2015-11-19 16:01:00'),
(11, 1, 2, '2015-11-19 16:01:00', '2015-11-19 16:01:00'),
(12, 1, 3, '2015-11-19 16:02:00', '2015-11-19 16:02:00'),
(13, 1, 2, '2015-11-19 16:02:00', '2015-11-19 16:02:00'),
(14, 1, 3, '2015-11-19 20:02:00', '2015-11-19 10:02:00'),
(15, 1, 3, '2015-11-19 20:02:00', '2015-11-19 10:02:00'),
(16, 1, 2, '2015-11-19 20:04:00', '2015-11-19 15:04:00'),
(17, 1, 3, '2015-11-19 20:04:00', '2015-11-19 15:04:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `VR_grp1_Reservation`
--
ALTER TABLE `VR_grp1_Reservation`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `VR_grp1_Reservation`
--
ALTER TABLE `VR_grp1_Reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
