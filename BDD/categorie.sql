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
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `Nom` varchar(25) NOT NULL,
  `Commentaire` varchar(140) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Nom`, `Commentaire`) VALUES
('--', ''),
('Costume', ''),
('Divers', ''),
('Materiel, gouter, travaux', ''),
('Services Publicitaires', 'Publicité, 1&1, La Poste, Téléphone'),
('Services Travaux', ''),
('Ecole', ''),
('Sous-Location', ''),
('Stages', ''),
('Factures et Charges', ''),
('Adherent', ''),
('Salaire', ''),
('CEA', ''),
('Loyer et foncier', ''),
('EDF', ''),
('Sud Ouest Mutualite', ''),
('Assurance MAIF', ''),
('Banque', ''),
('SACEM', ''),
('SPREE', ''),
('Location theatre', ''),
('Formation & interventions', ''),
('Rembousements et impayes', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Nom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
