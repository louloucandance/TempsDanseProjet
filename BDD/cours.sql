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
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `Discipline` varchar(25) NOT NULL COMMENT 'a selectionner dans discipline',
  `Niveau` varchar(25) NOT NULL COMMENT 'a selectionner dans niveau',
  `Jour` varchar(10) NOT NULL COMMENT 'a selectionner dans jour',
  `Heure` time NOT NULL DEFAULT '17:30:00' COMMENT 'au format hh:mm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`Discipline`, `Niveau`, `Jour`, `Heure`) VALUES
('BarreSol', 'Unique', 'Vendredi', '12:30:00'),
('Classique', 'Ado', 'Mercredi', '14:00:00'),
('Classique', 'Enfant', 'Samedi', '16:30:00'),
('Classique', 'Preparatoire', 'Mardi', '17:30:00'),
('Classique', 'Superieur', 'Mercredi', '18:45:00'),
('Contemporain', 'Ado', 'Mardi', '19:15:00'),
('Contemporain', 'Superieur', 'Jeudi', '18:30:00'),
('Eveil', 'Unique', 'Mercredi', '16:00:00'),
('Initiation', 'Unique', 'Jeudi', '17:30:00'),
('Jazz', 'Ado', 'Samedi', '14:15:00'),
('Jazz', 'Adulte', 'Vendredi', '20:00:00'),
('Jazz', 'Enfant', 'Vendredi', '17:30:00'),
('Jazz', 'Superieur', 'Samedi', '18:30:00'),
('Pointe', 'Niveau1', 'Samedi', '15:30:00'),
('Pointe', 'Niveau2', 'Mercredi', '17:30:00'),
('StreetJazz', 'Ado', 'Lundi', '17:30:00'),
('StreetJazz', 'Superieur', 'Lundi', '19:15:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`Discipline`,`Niveau`),
  ADD KEY `Jour` (`Jour`),
  ADD KEY `Niveau` (`Niveau`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `Discipline` FOREIGN KEY (`Discipline`) REFERENCES `discipline` (`NomDiscipline`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Jour` FOREIGN KEY (`Jour`) REFERENCES `jours` (`NomJours`),
  ADD CONSTRAINT `Niveau` FOREIGN KEY (`Niveau`) REFERENCES `niveau` (`NomNiveau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
