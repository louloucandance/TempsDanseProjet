-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 16 jan. 2018 à 10:12
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tempsdanse`
--

-- --------------------------------------------------------

--
-- Structure de la table `compta`
--

CREATE TABLE `compta` (
  `Id` int(11) NOT NULL,
  `Motif` varchar(50) NOT NULL,
  `Montant` decimal(10,2) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Frequence` varchar(25) NOT NULL,
  `Date` date NOT NULL,
  `Categorie` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ModePaiement` varchar(2) DEFAULT NULL,
  `Commentaire` varchar(140) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compta`
--

INSERT INTO `compta` (`Id`, `Motif`, `Montant`, `Type`, `Frequence`, `Date`, `Categorie`, `ModePaiement`, `Commentaire`) VALUES
(12, 'Ballans-Auge Camille', '260.00', 'Recette', 'Semestriel', '2018-01-01', 'Adherent', 'CQ', ''),
(2, 'Afonso Maelle', '42.00', 'Recette', 'Mensuel', '2017-09-01', 'Adherent', 'CQ', ''),
(3, 'Anderson Florence', '96.00', 'Recette', 'Bimestriel', '2017-09-01', 'Adherent', 'CQ', ''),
(4, 'Arthur Camille', '100.00', 'Recette', 'Bimestriel', '2017-09-01', 'Adherent', 'CQ', ''),
(5, 'Artigau Lea', '64.00', 'Recette', 'Bimestriel', '2017-09-01', 'Adherent', 'CQ', ''),
(6, 'Afonso Maelle', '32.00', 'Recette', 'Mensuel', '2017-10-01', 'Adherent', 'CQ', ''),
(7, 'Afonso Maelle', '32.00', 'Recette', 'Mensuel', '2017-11-01', 'Adherent', 'CQ', ''),
(8, 'Anderson Florence', '86.00', 'Recette', 'Bimestriel', '2017-11-01', 'Adherent', 'CQ', ''),
(9, 'Arthur Camille', '100.00', 'Recette', 'Bimestriel', '2017-11-01', 'Adherent', 'CQ', ''),
(10, 'Artigau Lea', '64.00', 'Recette', 'Bimestriel', '2017-11-01', 'Adherent', 'CQ', ''),
(11, 'Afonso Maelle', '32.00', 'Recette', 'Mensuel', '2017-12-01', 'Adherent', 'CQ', ''),
(13, 'Ballans-Auge Camille', '300.00', 'Recette', 'Semestriel', '2017-09-01', 'Adherent', 'CV', ''),
(14, 'Ballans Celine', '120.00', 'Recette', 'Semestriel', '2017-09-01', 'Adherent', 'CQ', ''),
(15, 'Ballans Celine', '50.00', 'Recette', 'Semestriel', '2018-01-01', 'Adherent', 'CV', ''),
(16, 'Baron Emie', '32.00', 'Recette', 'Mensuel', '2017-10-01', 'Adherent', 'CQ', ''),
(17, 'Baron Emie', '32.00', 'Recette', 'Mensuel', '2017-11-01', 'Adherent', 'CQ', ''),
(18, 'Baron Emie', '32.00', 'Recette', 'Mensuel', '2017-12-01', 'Adherent', 'CQ', ''),
(19, 'Afonso Maelle', '32.00', 'Recette', 'Mensuel', '2018-01-01', 'Adherent', 'CQ', ''),
(20, 'Anderson Florence', '86.00', 'Recette', 'Bimestriel', '2018-01-01', 'Adherent', 'CQ', ''),
(21, 'Arthur Camille', '100.00', 'Recette', 'Bimestriel', '2018-01-01', 'Adherent', 'CQ', ''),
(22, 'Artigau Lea', '64.00', 'Recette', 'Bimestriel', '2018-01-01', 'Adherent', 'CQ', ''),
(23, 'Baron Emie', '32.00', 'Recette', 'Mensuel', '2018-01-01', 'Adherent', 'CQ', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compta`
--
ALTER TABLE `compta`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compta`
--
ALTER TABLE `compta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
