-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 avr. 2025 à 08:52
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cube_rr`
--

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

DROP TABLE IF EXISTS `ressource`;
CREATE TABLE IF NOT EXISTS `ressource` (
  `idRessource` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idRessource`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ressource`
--

INSERT INTO `ressource` (`idRessource`, `titre`, `contenu`, `idUtilisateur`) VALUES
(1, 'Mon Github', 'https://github.com/MKertane', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `motDePasse` varchar(100) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `motDePasse`) VALUES
(1, 'TEST', 'Johnny', '94ee059335e587e501cc4bf90613e0814f00a7b08bc7c648fd865a2af6a22cc2'),
(3, 'WRIGHT', 'Phoenix', '8693196abe65b32a3c18e10304e845d1c7286ddfe9212f958edb25721554203e'),
(4, 'HUNTER', 'Benjamin', '06659319dce5b93c72dc9fd5a6e52ca0c9aa14d30602a967c7afdaf81272ccc7'),
(5, 'KERTANE', 'Mamoun', '201e3d11338f0f3b068c46cfde2fee28107252d5dcd3924de74efe82bd7f3a23'),
(6, 'ROMANO', 'Nils', '2d3a6fb5daa5651f2826ac61a09137e28525dc554a22eb8cf1feb7e853dabe77');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD CONSTRAINT `ressource_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
