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
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `NumAdh` int(3) NOT NULL,
  `Discipline` varchar(25) NOT NULL,
  `Niveau` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`NumAdh`, `Discipline`, `Niveau`) VALUES
(1, 'Jazz', 'Ado'),
(5, 'Jazz', 'Ado'),
(7, 'StreetJazz', 'Ado'),
(8, 'StreetJazz', 'Ado'),
(5, 'Pointe', 'Niveau1'),
(2, 'Pointe', 'Niveau2'),
(3, 'Pointe', 'Niveau2'),
(5, 'Classique', 'Preparatoire'),
(2, 'Classique', 'Superieur'),
(3, 'Classique', 'Superieur'),
(3, 'Jazz', 'Superieur'),
(4, 'Contemporain', 'Superieur'),
(6, 'BarreSol', 'Unique');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`NumAdh`,`Discipline`,`Niveau`),
  ADD KEY `Niveau` (`Niveau`),
  ADD KEY `Disc` (`Discipline`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `Disc` FOREIGN KEY (`Discipline`) REFERENCES `cours` (`Discipline`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Niv` FOREIGN KEY (`Niveau`) REFERENCES `cours` (`Niveau`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `NumAdh` FOREIGN KEY (`NumAdh`) REFERENCES `adherent` (`NumAdh`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
