-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 avr. 2020 à 22:16
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ebayece`
--

-- --------------------------------------------------------

--
-- Structure de la table `collection_2`
--

DROP TABLE IF EXISTS `collection_2`;
CREATE TABLE IF NOT EXISTS `collection_2` (
  `id_item` int(50) NOT NULL,
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `collection_2`
--

INSERT INTO `collection_2` (`id_item`) VALUES
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Structure de la table `collection_3`
--

DROP TABLE IF EXISTS `collection_3`;
CREATE TABLE IF NOT EXISTS `collection_3` (
  `id_item` int(50) NOT NULL,
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `collection_3`
--

INSERT INTO `collection_3` (`id_item`) VALUES
(1),
(4);

-- --------------------------------------------------------

--
-- Structure de la table `coord_livraison`
--

DROP TABLE IF EXISTS `coord_livraison`;
CREATE TABLE IF NOT EXISTS `coord_livraison` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `num_tel` varchar(255) NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` int(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coord_livraison`
--

INSERT INTO `coord_livraison` (`id`, `num_tel`, `adresse1`, `adresse2`, `ville`, `code_postal`, `pays`) VALUES
(1, '0607080910', '1 rue de victor hugo', '2 rue de je sais pas ou', 'Paris', 75000, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `info_bancaire`
--

DROP TABLE IF EXISTS `info_bancaire`;
CREATE TABLE IF NOT EXISTS `info_bancaire` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `num_carte` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nom_sur_carte` varchar(255) NOT NULL,
  `date_expi` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `info_bancaire`
--

INSERT INTO `info_bancaire` (`id`, `num_carte`, `type`, `nom_sur_carte`, `date_expi`, `code`) VALUES
(1, '68540654106', 'Visa', 'claude', '02/24', '165');

-- --------------------------------------------------------

--
-- Structure de la table `les_items`
--

DROP TABLE IF EXISTS `les_items`;
CREATE TABLE IF NOT EXISTS `les_items` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `prix_souh` float DEFAULT NULL,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `categorie` int(5) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `les_items`
--

INSERT INTO `les_items` (`id`, `nom`, `description`, `prix`, `prix_souh`, `video`, `categorie`, `date_debut`, `date_fin`) VALUES
(1, 'Cheval', 'Le cheval, le cheval, le cheval c\'est trop génial', 5.5, NULL, 'video-item/cheval.mp4', 3, '0000-00-00', '0000-00-00'),
(2, 'Disque Dur', 'un disque tout dur', 15, NULL, 'video-item/disque-dur.mp4', 2, '0000-00-00', '0000-00-00'),
(3, 'Caftière', 'Une machine pour faire du café', 35, NULL, NULL, 1, '2020-05-19', '2020-05-22'),
(4, 'clavier', 'Un truc pour écrire', 5.3, NULL, NULL, 2, '2020-04-23', '2020-04-25');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_item` int(50) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `id_item`, `chemin`) VALUES
(1, 1, 'images/item/cheval.png'),
(2, 2, 'images/item/disque-dur.png'),
(3, 4, 'images/item/clavier.png'),
(4, 3, 'images/item/caftiere.png');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_acheteur` int(50) NOT NULL,
  `id_vendeur` int(50) NOT NULL,
  `id_item` int(50) NOT NULL,
  `montant` float NOT NULL,
  `date_livraison` date NOT NULL,
  `date_transaction` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_acheteur` (`id_acheteur`,`id_vendeur`,`id_item`),
  KEY `id_vendeur` (`id_vendeur`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_livraison` int(50) DEFAULT NULL,
  `id_carte` int(50) DEFAULT NULL,
  `id_collection` int(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `rank` int(5) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `photo_perso` varchar(255) DEFAULT NULL,
  `photo_background` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_carte` (`id_carte`),
  KEY `id_livraison` (`id_livraison`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `id_livraison`, `id_carte`, `id_collection`, `email`, `mdp`, `pseudo`, `rank`, `nom`, `prenom`, `photo_perso`, `photo_background`) VALUES
(1, NULL, NULL, NULL, 'admin@gmail.com', 'motdepasse', 'lebigboss', 3, 'ayllon', 'jorge', NULL, NULL),
(2, 1, 1, 2, 'jjjjj@gmail.com', 'jebois', 'jjgold', 1, 'goldman', 'jean-jacques', NULL, NULL),
(3, NULL, NULL, 3, 'jhonnn@gmail.com', 'jechante', 'holiday', 2, 'johnny', 'hallyday', 'images/acheteur/johnny-hallyday.png', 'images/acheteur/johnny-hallyday-back.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `collection_2`
--
ALTER TABLE `collection_2`
  ADD CONSTRAINT `collection_2_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `les_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `collection_3`
--
ALTER TABLE `collection_3`
  ADD CONSTRAINT `collection_3_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `les_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `les_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_acheteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`id_vendeur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`id_item`) REFERENCES `les_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_carte`) REFERENCES `info_bancaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`id_livraison`) REFERENCES `coord_livraison` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
