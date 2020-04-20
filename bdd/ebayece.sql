-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 15:40
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coord_livraison`
--

INSERT INTO `coord_livraison` (`id`, `num_tel`, `adresse1`, `adresse2`, `ville`, `code_postal`, `pays`) VALUES
(2, '0754369465', '25 rue de la droite', 'rien', 'Marseille', 13000, 'France'),
(4, '5095612976', '45 rue de la patisserie', 'a droite', 'Grenoble', 38000, 'France');

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
  `date_expi` date NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `info_bancaire`
--

INSERT INTO `info_bancaire` (`id`, `num_carte`, `type`, `nom_sur_carte`, `date_expi`, `code`) VALUES
(2, '68540654106', 'Visa', 'claude', '2024-12-12', '165'),
(4, '468053210', 'Paypal', 'Sardouu', '2023-06-15', '684');

-- --------------------------------------------------------

--
-- Structure de la table `lacollection`
--

DROP TABLE IF EXISTS `lacollection`;
CREATE TABLE IF NOT EXISTS `lacollection` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_item_1` int(50) DEFAULT NULL,
  `id_item_2` int(50) DEFAULT NULL,
  `id_item_3` int(50) DEFAULT NULL,
  `id_item_4` int(50) DEFAULT NULL,
  `id_item_5` int(50) DEFAULT NULL,
  `id_item_6` int(50) DEFAULT NULL,
  `id_item_7` int(50) DEFAULT NULL,
  `id_item_8` int(50) DEFAULT NULL,
  `id_item_9` int(50) DEFAULT NULL,
  `id_item_10` int(50) DEFAULT NULL,
  `id_item_11` int(50) DEFAULT NULL,
  `id_item_12` int(50) DEFAULT NULL,
  `id_item_13` int(50) DEFAULT NULL,
  `id_item_14` int(50) DEFAULT NULL,
  `id_item_15` int(50) DEFAULT NULL,
  `id_item_16` int(50) DEFAULT NULL,
  `id_item_17` int(50) DEFAULT NULL,
  `id_item_18` int(50) DEFAULT NULL,
  `id_item_19` int(50) DEFAULT NULL,
  `id_item_20` int(50) DEFAULT NULL,
  `id_item_21` int(50) DEFAULT NULL,
  `id_item_22` int(50) DEFAULT NULL,
  `id_item_23` int(50) DEFAULT NULL,
  `id_item_24` int(50) DEFAULT NULL,
  `id_item_25` int(50) DEFAULT NULL,
  `id_item_26` int(50) DEFAULT NULL,
  `id_item_27` int(50) DEFAULT NULL,
  `id_item_28` int(50) DEFAULT NULL,
  `id_item_29` int(50) DEFAULT NULL,
  `id_item_30` int(50) DEFAULT NULL,
  `id_item_31` int(50) DEFAULT NULL,
  `id_item_32` int(50) DEFAULT NULL,
  `id_item_33` int(50) DEFAULT NULL,
  `id_item_34` int(50) DEFAULT NULL,
  `id_item_35` int(50) DEFAULT NULL,
  `id_item_36` int(50) DEFAULT NULL,
  `id_item_37` int(50) DEFAULT NULL,
  `id_item_38` int(50) DEFAULT NULL,
  `id_item_39` int(50) DEFAULT NULL,
  `id_item_40` int(50) DEFAULT NULL,
  `id_item_41` int(50) DEFAULT NULL,
  `id_item_42` int(50) DEFAULT NULL,
  `id_item_43` int(50) DEFAULT NULL,
  `id_item_44` int(50) DEFAULT NULL,
  `id_item_45` int(50) DEFAULT NULL,
  `id_item_46` int(50) DEFAULT NULL,
  `id_item_47` int(50) DEFAULT NULL,
  `id_item_48` int(50) DEFAULT NULL,
  `id_item_49` int(50) DEFAULT NULL,
  `id_item_50` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lacollection`
--

INSERT INTO `lacollection` (`id`, `id_item_1`, `id_item_2`, `id_item_3`, `id_item_4`, `id_item_5`, `id_item_6`, `id_item_7`, `id_item_8`, `id_item_9`, `id_item_10`, `id_item_11`, `id_item_12`, `id_item_13`, `id_item_14`, `id_item_15`, `id_item_16`, `id_item_17`, `id_item_18`, `id_item_19`, `id_item_20`, `id_item_21`, `id_item_22`, `id_item_23`, `id_item_24`, `id_item_25`, `id_item_26`, `id_item_27`, `id_item_28`, `id_item_29`, `id_item_30`, `id_item_31`, `id_item_32`, `id_item_33`, `id_item_34`, `id_item_35`, `id_item_36`, `id_item_37`, `id_item_38`, `id_item_39`, `id_item_40`, `id_item_41`, `id_item_42`, `id_item_43`, `id_item_44`, `id_item_45`, `id_item_46`, `id_item_47`, `id_item_48`, `id_item_49`, `id_item_50`) VALUES
(2, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 4, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `les_items`
--

DROP TABLE IF EXISTS `les_items`;
CREATE TABLE IF NOT EXISTS `les_items` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_prop` int(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `prix_souh` float DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `categorie` int(5) NOT NULL,
  `type` int(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_vainqueur` int(50) DEFAULT NULL,
  `tentative` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`),
  KEY `id_prop` (`id_prop`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `les_items`
--

INSERT INTO `les_items` (`id`, `id_prop`, `nom`, `description`, `prix`, `prix_souh`, `video`, `categorie`, `type`, `date_debut`, `date_fin`, `id_vainqueur`, `tentative`) VALUES
(1, 3, 'Cheval', 'Le cheval, le cheval, le cheval c\'est trop génial', 5.5, NULL, 'video-item/cheval.mp4', 3, 1, '2020-05-21', '2020-05-28', NULL, 5),
(2, 3, 'Disque Dur', 'un disque tout dur', 15, NULL, 'video-item/disque-dur.mp4', 2, 2, '2020-06-05', '2020-06-29', NULL, 5),
(3, 3, 'Caftière', 'Une machine pour faire du café', 35, NULL, NULL, 1, 3, '2020-05-19', '2020-05-22', NULL, 5),
(4, 3, 'Clavier', 'un truc pour ecrire', 12, NULL, NULL, 2, 1, '2020-05-22', '2020-07-09', NULL, 5),
(5, 3, 'piece', 'piece de monnaie', 5.9, NULL, NULL, 1, 1, '2020-04-01', '2020-04-15', NULL, 5),
(6, 3, 'montre', 'montre luxueuse', 250, NULL, NULL, 3, 2, '2020-04-30', '2020-05-14', NULL, 5),
(7, 3, 'ordi', 'bon processeur', 450, NULL, NULL, 1, 2, '2020-04-01', '2020-04-02', NULL, 5),
(8, 3, 'souris', 'souris sans fil', 30, NULL, NULL, 3, 3, '2020-04-07', '2020-04-15', NULL, 5),
(9, 3, 'tableau', 'tableau paint par un peintre celebre', 200, NULL, NULL, 2, 3, '2020-04-15', '2020-04-24', NULL, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `id_item`, `chemin`) VALUES
(1, 1, 'images/item/cheval.png'),
(2, 2, 'images/item/disque-dur.png'),
(3, 4, 'images/item/clavier.png'),
(4, 3, 'images/item/caftiere.png'),
(5, 5, 'images/item/piece.png'),
(6, 6, 'images/item/montre.png'),
(7, 7, 'images/item/ordi.png'),
(8, 8, 'images/item/souris.png'),
(9, 9, 'images/item/item1.jpg');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `rang` int(5) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `photo_perso` varchar(255) DEFAULT NULL,
  `photo_background` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_carte` (`id_carte`),
  KEY `id_livraison` (`id_livraison`),
  KEY `id_collection` (`id_collection`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `id_livraison`, `id_carte`, `id_collection`, `email`, `mdp`, `pseudo`, `rang`, `nom`, `prenom`, `photo_perso`, `photo_background`) VALUES
(1, NULL, NULL, NULL, 'admin@gmail.com', 'motdepasse', 'lebigboss', 3, 'ayllon', 'jorge', 'admin.png', NULL),
(2, 2, 2, 2, 'jjjjj@gmail.com', 'jebois', 'jjgold', 1, 'goldman', 'jean-jacques', NULL, NULL),
(3, NULL, NULL, 3, 'jhonnn@gmail.com', 'jechante', 'holiday', 2, 'hallyday', 'johnny', 'images/vendeur/johnny-hallyday.png', 'images/vendeur/johnny-hallyday-back.png'),
(4, 4, 4, 4, 'michel@gmail.com', 'jesaute', 'dd', 1, 'wang', 'Michel', NULL, NULL),
(5, NULL, NULL, 5, 'admin@gmail.com', 'motdepasse', 'vendeurwang', 2, '', 'vendeur', 'vendeur.jpg', 'sell.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `les_items`
--
ALTER TABLE `les_items`
  ADD CONSTRAINT `les_items_ibfk_1` FOREIGN KEY (`id_prop`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `les_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_carte`) REFERENCES `info_bancaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`id_livraison`) REFERENCES `coord_livraison` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_5` FOREIGN KEY (`id_collection`) REFERENCES `lacollection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
