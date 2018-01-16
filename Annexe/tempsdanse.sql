-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 30 déc. 2017 à 16:57
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
  `Montant` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`NumAdh`, `Nom`, `Prenom`, `DateNaissance`, `ModePaiement`, `FrequencePaiement`, `Reduction`, `Montant`) VALUES
(2, 'Arbre', 'Claude', '1992-08-08', 'CQ', 'Annuel', 'F1', '288'),
(3, 'Arbre', 'Charly', '1997-01-01', 'CQ', 'Annuel', NULL, '430'),
(4, 'Letronc', 'Valery', '2014-03-01', 'ES', 'Mensuel', NULL, '270'),
(5, 'CheneGrand', 'Andrea', '2013-02-02', 'ES', 'Mensuel', NULL, '270'),
(6, 'Sapin', 'Sacha', '2004-11-11', 'CQ', 'Bimestriel', 'CG', '450'),
(7, 'Foret', 'Ange', '1968-07-01', 'VI', 'Annuel', NULL, '600'),
(8, 'Selve', 'Lou', '2002-02-02', 'CQ', 'Semestriel', NULL, '430'),
(9, 'Bosquet', 'Stephane', '1992-01-02', 'CB', 'Bimestriel', 'F1', '540'),
(10, 'Bosquet', 'Morgan', '1992-01-02', 'CB', 'Semestriel', NULL, '600'),
(11, 'Bois-Vert', 'Solange', '1997-12-07', 'ES', 'Trimestriel', NULL, '500'),
(12, 'Pirouette', 'Meo', '2014-02-02', 'ES', 'Bimestriel', NULL, '320'),
(13, 'Adherent', 'Nouvel', '1997-12-07', 'ES', 'Trimestriel', NULL, '430');

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

CREATE TABLE `catégorie` (
  `Nom` varchar(25) NOT NULL,
  `DureeVie` varchar(25) NOT NULL,
  `Commentaire` varchar(140) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `catégorie`
--

INSERT INTO `catégorie` (`Nom`, `DureeVie`, `Commentaire`) VALUES
('Entretien', 'Moyenne', ''),
('Costume', 'Moyenne', ''),
('Divers', 'Divers', ''),
('Taxes', 'Immédiat', ''),
('Services Publicitaires', 'Immédiat', ''),
('Services Travaux', 'Longue', '');

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
(3, 'Jazz', 'Adulte'),
(7, 'Jazz', 'Adulte'),
(9, 'Jazz', 'Adulte'),
(10, 'Jazz', 'Adulte'),
(11, 'Jazz', 'Adulte'),
(7, 'Pointe', 'Niveau2'),
(8, 'Pointe', 'Niveau2'),
(9, 'Pointe', 'Niveau2'),
(10, 'Pointe', 'Niveau2'),
(2, 'Contemporain', 'Superieur'),
(3, 'Contemporain', 'Superieur'),
(6, 'Contemporain', 'Superieur'),
(6, 'Jazz', 'Superieur'),
(7, 'Classique', 'Superieur'),
(7, 'Contemporain', 'Superieur'),
(8, 'Classique', 'Superieur'),
(9, 'Classique', 'Superieur'),
(10, 'Classique', 'Superieur'),
(11, 'Jazz', 'Superieur'),
(4, 'Eveil', 'Unique'),
(5, 'Eveil', 'Unique'),
(6, 'BarreSol', 'Unique'),
(7, 'BarreSol', 'Unique'),
(9, 'BarreSol', 'Unique'),
(10, 'BarreSol', 'Unique'),
(11, 'BarreSol', 'Unique'),
(12, 'Initiation', 'Unique'),
(13, 'Eveil', 'Unique'),
(13, 'Initiation', 'Unique');

-- --------------------------------------------------------

--
-- Structure de la table `compta`
--

CREATE TABLE `compta` (
  `Motif` varchar(50) NOT NULL,
  `Frequence` varchar(25) NOT NULL,
  `Montant` decimal(10,0) NOT NULL,
  `Date` date NOT NULL,
  `Commentaire` varchar(140) NOT NULL,
  `ModePaiement` varchar(2) NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compta`
--

INSERT INTO `compta` (`Motif`, `Frequence`, `Montant`, `Date`, `Commentaire`, `ModePaiement`, `Type`) VALUES
('PapierToilette', 'Quotidien', '1', '2017-12-20', 'Il est tout doux pour mes fesses hihihi', 'CB', 'Sortie');

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

-- --------------------------------------------------------

--
-- Structure de la table `discipline`
--

CREATE TABLE `discipline` (
  `NomDiscipline` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `discipline`
--

INSERT INTO `discipline` (`NomDiscipline`) VALUES
('BarreSol'),
('Classique'),
('Contemporain'),
('Eveil'),
('Initiation'),
('Jazz'),
('Pointe'),
('StreetJazz');

-- --------------------------------------------------------

--
-- Structure de la table `frequence`
--

CREATE TABLE `frequence` (
  `NomFrequence` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `frequence`
--

INSERT INTO `frequence` (`NomFrequence`) VALUES
('Annuel'),
('Bimestriel'),
('Exceptionnel'),
('Hebdomadaire'),
('Mensuel'),
('Quotidien'),
('Semestriel'),
('Trimestriel');

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

CREATE TABLE `jours` (
  `NomJours` varchar(10) NOT NULL COMMENT 'Nom des jours de la semaine'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jours`
--

INSERT INTO `jours` (`NomJours`) VALUES
('Dimanche'),
('Jeudi'),
('Lundi'),
('Mardi'),
('Mercredi'),
('Samedi'),
('Vendredi');

-- --------------------------------------------------------

--
-- Structure de la table `modepaiement`
--

CREATE TABLE `modepaiement` (
  `IdPaiement` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NomPaiement` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modepaiement`
--

INSERT INTO `modepaiement` (`IdPaiement`, `NomPaiement`) VALUES
('AU', 'Autre'),
('CB', 'Carte Banquaire'),
('CQ', 'Cheque'),
('CS', 'CouponSport'),
('CV', 'Cheques Vacances'),
('ES', 'Especes'),
('VI', 'Virement');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `NomNiveau` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`NomNiveau`) VALUES
('Ado'),
('Adulte'),
('Elementaire'),
('Enfant'),
('Niveau1'),
('Niveau2'),
('Preparatoire'),
('Superieur'),
('Unique');

-- --------------------------------------------------------

--
-- Structure de la table `reduction`
--

CREATE TABLE `reduction` (
  `IdReduc` varchar(2) NOT NULL DEFAULT '',
  `NomReduc` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reduction`
--

INSERT INTO `reduction` (`IdReduc`, `NomReduc`) VALUES
('CG', 'Conseil General 10%'),
('F1', 'FAMILLE 10% de reduc'),
('F2', 'FAMILLE 20% de reduc'),
('F3', 'FAMILLE 30% de reduc');

-- --------------------------------------------------------

--
-- Structure de la table `typecompta`
--

CREATE TABLE `typecompta` (
  `Type` varchar(25) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecompta`
--

INSERT INTO `typecompta` (`Type`) VALUES
('Entree'),
('Sortie');

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
-- Index pour la table `catégorie`
--
ALTER TABLE `catégorie`
  ADD PRIMARY KEY (`Nom`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`NumAdh`,`Discipline`,`Niveau`),
  ADD KEY `Niveau` (`Niveau`),
  ADD KEY `Disc` (`Discipline`);

--
-- Index pour la table `compta`
--
ALTER TABLE `compta`
  ADD PRIMARY KEY (`Motif`,`Frequence`,`Montant`,`Date`,`Type`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`Discipline`,`Niveau`),
  ADD KEY `Jour` (`Jour`),
  ADD KEY `Niveau` (`Niveau`);

--
-- Index pour la table `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`NomDiscipline`);

--
-- Index pour la table `frequence`
--
ALTER TABLE `frequence`
  ADD PRIMARY KEY (`NomFrequence`);

--
-- Index pour la table `jours`
--
ALTER TABLE `jours`
  ADD PRIMARY KEY (`NomJours`);

--
-- Index pour la table `modepaiement`
--
ALTER TABLE `modepaiement`
  ADD PRIMARY KEY (`IdPaiement`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`NomNiveau`);

--
-- Index pour la table `reduction`
--
ALTER TABLE `reduction`
  ADD PRIMARY KEY (`IdReduc`);

--
-- Index pour la table `typecompta`
--
ALTER TABLE `typecompta`
  ADD PRIMARY KEY (`Type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `NumAdh` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Numero Adherent genere automatiquement a la creation. De 0 a 999', AUTO_INCREMENT=14;
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

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `Disc` FOREIGN KEY (`Discipline`) REFERENCES `cours` (`Discipline`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Niv` FOREIGN KEY (`Niveau`) REFERENCES `cours` (`Niveau`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `NumAdh` FOREIGN KEY (`NumAdh`) REFERENCES `adherent` (`NumAdh`) ON DELETE CASCADE ON UPDATE CASCADE;

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
