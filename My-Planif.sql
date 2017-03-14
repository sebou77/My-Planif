-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 14 Mars 2017 à 10:59
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my-planif`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `idAbsence` bigint(20) UNSIGNED NOT NULL,
  `Debut` date NOT NULL,
  `Fin` date NOT NULL,
  `Raison` text NOT NULL,
  `idInfrastructure` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(65) NOT NULL,
  `prenom` varchar(65) NOT NULL,
  `adrMail` varchar(65) NOT NULL,
  `psd` varchar(65) NOT NULL,
  `pwd` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `idEntreprise` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(65) NOT NULL,
  `psd` varchar(65) NOT NULL,
  `pwd` varchar(65) NOT NULL,
  `prevision` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `infrastructure`
--

CREATE TABLE `infrastructure` (
  `idInfrastrucrure` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(65) NOT NULL,
  `psd` varchar(65) NOT NULL,
  `pwd` varchar(65) NOT NULL,
  `Horaire` varchar(65) NOT NULL,
  `Semaine` varchar(65) NOT NULL,
  `idEntreprise` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `plage`
--

CREATE TABLE `plage` (
  `idPlage` bigint(20) UNSIGNED NOT NULL,
  `jour` date NOT NULL,
  `idInfrastructure` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `plagehoraire`
--

CREATE TABLE `plagehoraire` (
  `idPlageHoraire` bigint(20) UNSIGNED NOT NULL,
  `Debut` datetime NOT NULL,
  `Fin` datetime NOT NULL,
  `Avertis` tinyint(1) NOT NULL,
  `idPlage` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(65) NOT NULL,
  `tempsReservation` varchar(65) NOT NULL,
  `idInfrastructure` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `idPlage` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`idAbsence`),
  ADD UNIQUE KEY `idAbsence` (`idAbsence`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `idClient` (`idClient`),
  ADD UNIQUE KEY `psd` (`psd`),
  ADD UNIQUE KEY `pwd` (`pwd`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idEntreprise`),
  ADD UNIQUE KEY `idEntreprise` (`idEntreprise`);

--
-- Index pour la table `infrastructure`
--
ALTER TABLE `infrastructure`
  ADD PRIMARY KEY (`idInfrastrucrure`),
  ADD UNIQUE KEY `idInfrastrucrure` (`idInfrastrucrure`);

--
-- Index pour la table `plage`
--
ALTER TABLE `plage`
  ADD PRIMARY KEY (`idPlage`),
  ADD UNIQUE KEY `idPlage` (`idPlage`);

--
-- Index pour la table `plagehoraire`
--
ALTER TABLE `plagehoraire`
  ADD PRIMARY KEY (`idPlageHoraire`),
  ADD UNIQUE KEY `idPlageHoraire` (`idPlageHoraire`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD UNIQUE KEY `idReservation` (`idReservation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `idAbsence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntreprise` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `infrastructure`
--
ALTER TABLE `infrastructure`
  MODIFY `idInfrastrucrure` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `plage`
--
ALTER TABLE `plage`
  MODIFY `idPlage` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `plagehoraire`
--
ALTER TABLE `plagehoraire`
  MODIFY `idPlageHoraire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
