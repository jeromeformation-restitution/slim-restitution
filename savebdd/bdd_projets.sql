-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 29 mars 2019 à 15:37
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_projets`
--
CREATE DATABASE IF NOT EXISTS `bdd_projets` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `bdd_projets`;

-- --------------------------------------------------------

--
-- Structure de la table `liste_languages`
--

DROP TABLE IF EXISTS `liste_languages`;
CREATE TABLE IF NOT EXISTS `liste_languages` (
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `liste_languages`
--

INSERT INTO `liste_languages` (`name`) VALUES
('JAVA'),
('PHP');

-- --------------------------------------------------------

--
-- Structure de la table `liste_projets`
--

DROP TABLE IF EXISTS `liste_projets`;
CREATE TABLE IF NOT EXISTS `liste_projets` (
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startedAt` date NOT NULL,
  `finishedAt` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `liste_projets`
--

INSERT INTO `liste_projets` (`name`, `description`, `languages`, `startedAt`, `finishedAt`, `image`, `slug`) VALUES
('Projet Slim', 'Slim provides a fast and powerful router that maps route callbacks to specific HTTP request methods and URIs. It supports parameters and pattern matching. ', '', '2019-03-12', '2019-03-30', 'slim.png', 'projet-slim');

-- --------------------------------------------------------

--
-- Structure de la table `projets_languages`
--

DROP TABLE IF EXISTS `projets_languages`;
CREATE TABLE IF NOT EXISTS `projets_languages` (
  `language_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projet_slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`language_name`,`projet_slug`),
  KEY `language_name` (`language_name`),
  KEY `projet_slug` (`projet_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projets_languages`
--

INSERT INTO `projets_languages` (`language_name`, `projet_slug`) VALUES
('PHP', 'projet-slim');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projets_languages`
--
ALTER TABLE `projets_languages`
  ADD CONSTRAINT `FK_language_name` FOREIGN KEY (`language_name`) REFERENCES `liste_languages` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_project_slug` FOREIGN KEY (`projet_slug`) REFERENCES `liste_projets` (`slug`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
