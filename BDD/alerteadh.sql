-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 16 jan. 2018 à 10:11
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
-- Structure de la table `alerteadh`
--

CREATE TABLE `alerteadh` (
  `IdAlerte` int(11) NOT NULL,
  `NumAdh` int(3) NOT NULL,
  `Date` date NOT NULL,
  `Montant` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `alerteadh`
--

INSERT INTO `alerteadh` (`IdAlerte`, `NumAdh`, `Date`, `Montant`) VALUES
(6, 1, '2018-02-01', '32.00'),
(7, 1, '2018-03-01', '32.00'),
(8, 1, '2018-04-01', '32.00'),
(9, 1, '2018-05-01', '32.00'),
(10, 1, '2018-06-01', '32.00'),
(24, 2, '2018-03-01', '86.00'),
(25, 2, '2018-05-01', '86.00'),
(29, 3, '2018-03-01', '100.00'),
(30, 3, '2018-05-01', '100.00'),
(34, 4, '2018-03-01', '64.00'),
(35, 4, '2018-05-01', '64.00'),
(55, 7, '2018-02-01', '32.00'),
(56, 7, '2018-03-01', '32.00'),
(57, 7, '2018-04-01', '32.00'),
(58, 7, '2018-05-01', '32.00'),
(59, 7, '2018-06-01', '32.00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alerteadh`
--
ALTER TABLE `alerteadh`
  ADD PRIMARY KEY (`IdAlerte`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alerteadh`
--
ALTER TABLE `alerteadh`
  MODIFY `IdAlerte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
