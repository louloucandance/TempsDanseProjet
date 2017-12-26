-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 26 déc. 2017 à 19:31
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
-- Structure de la table `fréquence`
--

CREATE TABLE `fréquence` (
  `NomFrequence` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fréquence`
--

INSERT INTO `fréquence` (`NomFrequence`) VALUES
('Annuel'),
('Bimestriel'),
('Exceptionnel'),
('Hebdomadaire'),
('Mensuel'),
('Quotidien'),
('Semestriel'),
('Trimestriel');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fréquence`
--
ALTER TABLE `fréquence`
  ADD PRIMARY KEY (`NomFrequence`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
