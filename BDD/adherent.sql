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
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `NumAdh` int(3) NOT NULL COMMENT 'Numero Adherent genere automatiquement a la creation. De 0 a 999',
  `Nom` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Nom, chaine de caractere de 25',
  `Prenom` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Prenom. Chaine de caractere de 25',
  `DateNaissance` date NOT NULL COMMENT 'Date de Naissance, au format AAAA/MM/JJ',
  `ModePaiement` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Mode de Paiement, récupéré dans la table Paiement',
  `FrequencePaiement` varchar(25) NOT NULL,
  `Reduction` varchar(2) DEFAULT NULL,
  `Montant` decimal(10,0) DEFAULT NULL,
  `DateInscription` date NOT NULL DEFAULT '2017-09-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`NumAdh`, `Nom`, `Prenom`, `DateNaissance`, `ModePaiement`, `FrequencePaiement`, `Reduction`, `Montant`, `DateInscription`) VALUES
(1, 'Afonso', 'Maelle', '2005-03-14', 'CQ', 'Mensuel', NULL, '320', '2017-09-01'),
(2, 'Anderson', 'Florence', '2003-08-04', 'CQ', 'Bimestriel', NULL, '430', '2017-09-01'),
(3, 'Arthur', 'Camille', '2000-09-30', 'CQ', 'Bimestriel', NULL, '500', '2017-09-01'),
(4, 'Artigau', 'Lea', '1997-10-11', 'CQ', 'Bimestriel', NULL, '320', '2017-09-01'),
(5, 'Ballans-Auge', 'Camille', '2007-09-26', 'CQ', 'Semestriel', 'CG', '450', '2017-09-01'),
(6, 'Ballans', 'Celine', '1980-02-25', 'CQ', 'Semestriel', 'F2', '160', '2017-09-01'),
(7, 'Baron', 'Emie', '2005-07-23', 'CQ', 'Mensuel', 'CG', '288', '2017-09-01'),
(8, 'Barrere', 'Laura', '2003-11-22', 'CQ', 'Annuel', NULL, '320', '2017-09-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`NumAdh`),
  ADD KEY `ModePaiement` (`ModePaiement`),
  ADD KEY `Reduction` (`Reduction`),
  ADD KEY `FrequencePaiement` (`FrequencePaiement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `NumAdh` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Numero Adherent genere automatiquement a la creation. De 0 a 999', AUTO_INCREMENT=9;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `Frequence` FOREIGN KEY (`FrequencePaiement`) REFERENCES `frequence` (`NomFrequence`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ModePaiement` FOREIGN KEY (`ModePaiement`) REFERENCES `modepaiement` (`IdPaiement`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Reduction` FOREIGN KEY (`Reduction`) REFERENCES `reduction` (`IdReduc`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
