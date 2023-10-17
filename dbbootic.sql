-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 oct. 2023 à 16:03
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbbootic`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie`
--

CREATE TABLE `t_categorie` (
  `id_categorie` int(3) NOT NULL,
  `Nom_categorie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_categorie`
--

INSERT INTO `t_categorie` (`id_categorie`, `Nom_categorie`) VALUES
(1, 'sacs'),
(2, 'casquettes'),
(3, 't_shirt'),
(4, 'sweats');

-- --------------------------------------------------------

--
-- Structure de la table `t_commande`
--

CREATE TABLE `t_commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) NOT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL DEFAULT 'en cours de traitement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_details_commande`
--

CREATE TABLE `t_details_commande` (
  `id_commande` int(3) NOT NULL,
  `id_produit` int(3) NOT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_membre`
--

CREATE TABLE `t_membre` (
  `id_memebre` int(3) NOT NULL COMMENT 'Ce champ correspond au \r\nnuméro du membre qui sera \r\nauto-généré et incrémenté',
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_produit`
--

CREATE TABLE `t_produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `id_categorie` int(3) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` enum('f','m','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_produit`
--

INSERT INTO `t_produit` (`id_produit`, `reference`, `id_categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(1, 'Casquette ', 2, 'Impression camouflage', 'Casquette camouflage, tendance pour les jeunes, agréable a porter en coton véritable\r\n', 'camouflage', 'M', '', 'casquette_camou.webp', 20, 100),
(2, 'Casquette ', 2, 'Rouge exotic', 'Casquette rouge en coton, agréable à porter', 'rouge', 'XS', '', 'casquette_rouge.webp', 20, 100),
(3, 'Tshirt ', 3, 'Rose masculin/feminin', 'Tshirt fuschia manches courtes à col rond', 'fushia', '40', '', 'ts_fuschia.webp', 25, 150),
(4, 'Tshirt ', 3, 'Violet d\'automne', 'Tshirt violet à manche courte en coton à col rond', 'violet', '42', '', 'ts_violet.webp', 25, 150),
(5, 'Sweat ', 4, 'Bleuet ', 'Sweat bleu à capuche manches longues', 'bleu', '40', '', 'sw_bleu.webp', 35, 200),
(6, 'Sweat ', 4, 'Orange du sud', 'Sweat orange à capuche manches longues', 'orange', '42', '', 'sw_orange.webp', 35, 250),
(7, 'Sac ', 1, 'Vert bouteille', 'Sac vert en tissu\r\nIl fera sensation partout', 'vert', 'mixte', '', 'sac_vert.webp', 50, 100),
(8, 'Sac ', 1, 'Jaune canarie', 'Sac jaune en tissu. \r\nIl sera de toutes vos sorties', 'jaune', 'mixte', '', 'sac_jaune.webp', 50, 100);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `FK_membre` (`id_membre`);

--
-- Index pour la table `t_details_commande`
--
ALTER TABLE `t_details_commande`
  ADD PRIMARY KEY (`id_commande`,`id_produit`),
  ADD KEY `FK_produit` (`id_produit`);

--
-- Index pour la table `t_membre`
--
ALTER TABLE `t_membre`
  ADD PRIMARY KEY (`id_memebre`);

--
-- Index pour la table `t_produit`
--
ALTER TABLE `t_produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `FK_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  MODIFY `id_categorie` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_commande`
--
ALTER TABLE `t_commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_membre`
--
ALTER TABLE `t_membre`
  MODIFY `id_memebre` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Ce champ correspond au \r\nnuméro du membre qui sera \r\nauto-généré et incrémenté';

--
-- AUTO_INCREMENT pour la table `t_produit`
--
ALTER TABLE `t_produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD CONSTRAINT `FK_membre` FOREIGN KEY (`id_membre`) REFERENCES `t_membre` (`id_memebre`);

--
-- Contraintes pour la table `t_details_commande`
--
ALTER TABLE `t_details_commande`
  ADD CONSTRAINT `FK_commande` FOREIGN KEY (`id_commande`) REFERENCES `t_commande` (`id_commande`),
  ADD CONSTRAINT `FK_produit` FOREIGN KEY (`id_produit`) REFERENCES `t_produit` (`id_produit`);

--
-- Contraintes pour la table `t_produit`
--
ALTER TABLE `t_produit`
  ADD CONSTRAINT `FK_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `t_categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
