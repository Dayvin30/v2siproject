-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 08 déc. 2021 à 10:22
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `v2si`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `IDIntervention` int(11) NOT NULL,
  `DateIntervention` date NOT NULL,
  PRIMARY KEY (`IDIntervention`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Email` varchar(50) DEFAULT NULL,
  `Mdp` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Email`, `Mdp`) VALUES
('dayvin30@gmail.com', '55555'),
('fzfranck@gmail.com', '55555');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `IDIntervenant` int(11) NOT NULL,
  `TypeCompetence` varchar(20) NOT NULL,
  PRIMARY KEY (`IDIntervenant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

DROP TABLE IF EXISTS `intervenant`;
CREATE TABLE IF NOT EXISTS `intervenant` (
  `IDIntervenant` int(11) NOT NULL,
  `NomIntervenant` varchar(12) NOT NULL,
  `PrenomIntervenant` varchar(12) NOT NULL,
  PRIMARY KEY (`IDIntervenant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `IDIntervention` int(11) NOT NULL AUTO_INCREMENT,
  `PrenomClient` varchar(50) DEFAULT NULL,
  `NomClient` varchar(50) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Numero` varchar(50) DEFAULT NULL,
  `DateIntervention` date NOT NULL,
  `HeureIntervention` varchar(50) NOT NULL,
  `LieuIntervention` varchar(100) NOT NULL,
  `BesoinIntervention` varchar(50) DEFAULT NULL,
  `Statut` varchar(20) NOT NULL,
  `Commentaire` varchar(100) NOT NULL,
  `Document` varchar(100) NOT NULL,
  PRIMARY KEY (`IDIntervention`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`IDIntervention`, `PrenomClient`, `NomClient`, `Email`, `Numero`, `DateIntervention`, `HeureIntervention`, `LieuIntervention`, `BesoinIntervention`, `Statut`, `Commentaire`, `Document`) VALUES
(1, ' Saisir un prenom...', ' Saisir un nom...', 'Saisir une adresse email...', ' Saisir un numero...', '2021-12-01', '09:00', ' Saisir une adresse...', 'Selectionnez le besoin', 'aucun', 'aucun', 'aucun'),
(65, 'azed', 'zae', 'fzadze@gmail.com', '0695915040', '2021-11-27', '14:28', 'azdeaz', 'ProblÃ¨me logiciel', 'A venir', 'Aucun', 'Aucun'),
(64, 'azed', 'zae', 'fzadze@gmail.com', '0695915040', '2021-11-27', '14:28', 'azdeaz', 'ProblÃ¨me logiciel', 'A venir', 'Aucun', 'Aucun'),
(63, 'azed', 'zae', 'fzadze@gmail.com', '0695915040', '2021-11-27', '14:28', 'azdeaz', 'ProblÃ¨me logiciel', 'A venir', 'Aucun', 'Aucun'),
(125, 'azer', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '22:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(123, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(124, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(121, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(122, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(119, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(120, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(118, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(117, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(116, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(115, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(114, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun'),
(113, 'Dayvin', 'Zahout', 'dayvin30@gmail.com', '0695915043', '2021-12-15', '20:30', '38 rue de Paris 93260 les lilas', 'aucun', 'aucun', 'aucun', 'aucun');

-- --------------------------------------------------------

--
-- Structure de la table `outils`
--

DROP TABLE IF EXISTS `outils`;
CREATE TABLE IF NOT EXISTS `outils` (
  `TypeOutils` int(11) NOT NULL,
  PRIMARY KEY (`TypeOutils`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
