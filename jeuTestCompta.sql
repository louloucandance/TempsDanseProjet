-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 02 jan. 2018 à 17:24
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
(35, 'Hauts', '80.00', 'Depense', 'Exceptionnel', '2017-07-12', 'Costume', 'CB', 'Hauts a paillettes'),
(39, 'Jeanne dArc', '200.00', 'Recette', 'Annuel', '2017-10-10', 'Ecole', 'CQ', 'Les CM2, periode 1'),
(34, 'Robes', '132.12', 'Depense', 'Exceptionnel', '2017-07-08', 'Costume', 'ES', 'Robe bleue'),
(33, 'Impots', '150.27', 'Depense', 'Semestriel', '2017-07-01', 'Taxes', 'VI', 'Impot sur les societes'),
(37, 'Machine a vitre', '25.14', 'Depense', 'Exceptionnel', '2017-09-12', 'Entretien', 'CB', 'Holala, j aime pas le menage !'),
(38, 'Pages jaunes', '520.17', 'Depense', 'Annuel', '2017-09-13', 'Services Publicitaires', 'VI', 'PFFFF, quelle arnaque'),
(36, 'Gouter', '45.20', 'Depense', 'Exceptionnel', '2017-07-31', 'Divers', 'CB', 'Miam des gateaux'),
(40, 'SaintJoseph', '250.00', 'Recette', 'Annuel', '2017-12-01', 'Ecole', 'CQ', 'Grande section pour periode 2'),
(41, 'DanseAfricaine', '120.00', 'Recette', 'Bimestriel', '2017-12-20', 'Stages', 'ES', 'Stage bimestriel de danse africaine 12stagiaires x 10â‚¬.');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
