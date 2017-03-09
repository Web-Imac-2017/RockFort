-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 09 Mars 2017 à 15:44
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vinylestore`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_commande` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère commande',
  `adresse` text NOT NULL,
  `ville` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `nom`, `contenu`, `image`) VALUES
(2, 'Le chapitre 165 de TWD... On en parle ?', 'La mort d\'un des personnages principaux imminente?', 'imaaage'),
(3, 'Qui est le mailleur leader... Rick ou Negan ?', 'La mort d\'un des personnages principaux imminente?', 'imaaage'),
(6, 'Tupac vs Biggie', 'Brooklyn vs Los Angeles', 'imaaage'),
(8, 'Death Row vs Bad Boy', 'East Coast vs West Coast', 'imaaage'),
(9, 'Death Row vs Bad Boy', 'Tupac et Biggie', 'East Coast vs West Coast');

-- --------------------------------------------------------

--
-- Structure de la table `article_tag`
--

CREATE TABLE `article_tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_article` int(11) UNSIGNED NOT NULL,
  `id_tag` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article_tag`
--

INSERT INTO `article_tag` (`id`, `id_article`, `id_tag`) VALUES
(1, 2, 14),
(2, 2, 15),
(3, 2, 16),
(4, 3, 14),
(5, 3, 15),
(6, 3, 16),
(13, 6, 14),
(14, 6, 15),
(15, 6, 16),
(19, 8, 14),
(20, 8, 15),
(21, 8, 16),
(22, 9, 14),
(23, 9, 15),
(24, 9, 16);

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom`, `description`, `image`) VALUES
(3, 'Michael Jackson', 'Artiste de varieté le plus courroner de tous les temps', 'image'),
(4, 'Notorious BIG', 'la star du label Bad Boy', 'image');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_client` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère utilisateur',
  `date` datetime NOT NULL,
  `ttc` float NOT NULL,
  `valide` int(11) NOT NULL DEFAULT '0' COMMENT '''0'' = en cours  ''1'' = validé'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `date`, `ttc`, `valide`) VALUES
(3, 87, '2017-03-07 19:22:39', 0, 0),
(4, 87, '2017-03-07 19:23:16', 0, 0),
(5, 87, '2017-03-07 19:45:20', 100, 0),
(6, 87, '2017-03-07 19:51:19', 100, 0),
(7, 87, '2017-03-07 19:52:06', 99.99, 0),
(8, 87, '2017-03-07 19:52:33', 99.99, 0),
(9, 87, '2017-03-07 19:54:44', -199.98, 0),
(10, 87, '2017-03-07 19:55:17', 199.98, 0),
(11, 87, '2017-03-07 20:03:24', 199.98, 0),
(12, 87, '2017-03-07 20:03:37', 199.98, 0),
(13, 87, '2017-03-07 20:04:16', 199.98, 0),
(14, 87, '2017-03-07 20:05:00', 199.98, 1),
(15, 87, '2017-03-07 20:29:21', 199.98, 1),
(16, 87, '2017-03-07 20:30:18', 199.98, 1),
(17, 87, '2017-03-07 20:31:32', 199.98, 1),
(18, 87, '2017-03-08 19:03:47', 199.98, 1),
(19, 87, '2017-03-08 19:04:42', 199.98, 1),
(20, 87, '2017-03-08 19:05:40', 199.98, 1),
(21, 87, '2017-03-08 19:05:53', 199.98, 1),
(22, 87, '2017-03-08 19:07:57', 199.98, 1),
(23, 87, '2017-03-08 19:09:29', 199.98, 1),
(24, 87, '2017-03-08 19:10:25', 199.98, 1),
(25, 87, '2017-03-08 19:10:53', 199.98, 1),
(26, 87, '2017-03-08 19:13:31', 199.98, 1),
(27, 87, '2017-03-08 19:52:50', 199.98, 1),
(28, 87, '2017-03-08 19:54:30', 199.98, 1),
(29, 87, '2017-03-08 19:54:53', 199.98, 1),
(30, 87, '2017-03-08 19:55:32', 199.98, 1),
(31, 87, '2017-03-08 19:55:51', 199.98, 1),
(32, 87, '2017-03-08 19:58:53', 199.98, 1),
(33, 87, '2017-03-09 14:26:41', 199.98, 1),
(34, 87, '2017-03-09 14:31:54', 199.98, 1),
(35, 87, '2017-03-09 14:32:45', 199.98, 1),
(36, 87, '2017-03-09 14:35:50', 199.98, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_commande` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère commande',
  `id_produit` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère produit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande_produit`
--

INSERT INTO `commande_produit` (`id`, `id_commande`, `id_produit`) VALUES
(5, 8, 49),
(6, 9, 49),
(8, 9, 54),
(9, 10, 49),
(11, 10, 54),
(12, 11, 49),
(14, 11, 54),
(15, 12, 49),
(17, 12, 54),
(18, 13, 49),
(20, 13, 54),
(21, 14, 49),
(23, 14, 54),
(24, 15, 49),
(26, 15, 54),
(27, 16, 49),
(29, 16, 54),
(30, 17, 49),
(32, 17, 54),
(33, 18, 49),
(35, 18, 54),
(36, 19, 49),
(38, 19, 54),
(39, 20, 49),
(41, 20, 54),
(42, 21, 49),
(44, 21, 54),
(45, 22, 49),
(47, 22, 54),
(48, 23, 49),
(50, 23, 54),
(51, 24, 49),
(53, 24, 54),
(54, 25, 49),
(56, 25, 54),
(57, 26, 49),
(59, 26, 54),
(60, 27, 49),
(62, 27, 54),
(63, 28, 49),
(65, 28, 54),
(66, 29, 49),
(68, 29, 54),
(69, 30, 49),
(71, 30, 54),
(72, 31, 49),
(74, 31, 54),
(75, 32, 49),
(77, 32, 54),
(78, 33, 49),
(80, 33, 54),
(81, 34, 49),
(83, 34, 54),
(84, 35, 49),
(86, 35, 54),
(87, 36, 49),
(89, 36, 54);

-- --------------------------------------------------------

--
-- Structure de la table `commande_utilisateur`
--

CREATE TABLE `commande_utilisateur` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_commande` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère commande',
  `id_utilisateur` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande_utilisateur`
--

INSERT INTO `commande_utilisateur` (`id`, `id_commande`, `id_utilisateur`) VALUES
(1, 3, 87),
(2, 4, 87),
(3, 5, 87),
(4, 6, 87),
(5, 7, 87),
(6, 8, 87),
(7, 9, 87),
(8, 10, 87),
(9, 11, 87),
(10, 12, 87),
(11, 13, 87),
(12, 14, 87),
(13, 15, 87),
(14, 16, 87),
(15, 17, 87),
(16, 18, 87),
(17, 19, 87),
(18, 20, 87),
(19, 21, 87),
(20, 22, 87),
(21, 23, 87),
(22, 24, 87),
(23, 25, 87),
(24, 26, 87),
(25, 27, 87),
(26, 28, 87),
(27, 29, 87),
(28, 30, 87),
(29, 31, 87),
(30, 32, 87),
(31, 33, 87),
(32, 34, 87),
(33, 35, 87),
(34, 36, 87);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) UNSIGNED NOT NULL,
  `contenu` text NOT NULL,
  `id_utilisateur` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère utilisateur',
  `id_produit` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère produit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) UNSIGNED NOT NULL,
  `note` int(11) NOT NULL,
  `id_produit` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère produit',
  `id_utilisateur` int(11) UNSIGNED NOT NULL COMMENT 'clé étrangère utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(7) NOT NULL COMMENT 'type produit (platine, vinyle, album)',
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` text,
  `musique` text,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `type`, `nom`, `description`, `image`, `musique`, `prix`) VALUES
(48, 'Kit', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(49, 'Kit', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(50, 'Kit', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(54, 'Platine', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(55, 'Platine', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(56, 'Platine', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(57, 'Platine', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(58, 'Vinyle', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(59, 'Vinyle', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(60, 'Vinyle', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(61, 'Vinyle', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(62, 'Album', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(63, 'Album', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(64, 'Album', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(65, 'Vinyle', 'This time around', 'Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ', 'image', 'musique', 99.99),
(66, 'Vinyle', 'Tabloid Junkie', 'Chanson 100% réalisé par MJ dans l\'album HISTORY', 'imagehei', 'Le meilleur son de l\'album HISTORY', 299);

-- --------------------------------------------------------

--
-- Structure de la table `produit_artiste`
--

CREATE TABLE `produit_artiste` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_produit` int(11) UNSIGNED NOT NULL,
  `id_artiste` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit_artiste`
--

INSERT INTO `produit_artiste` (`id`, `id_produit`, `id_artiste`) VALUES
(87, 48, 3),
(88, 48, 4),
(89, 49, 3),
(90, 49, 4),
(91, 50, 3),
(92, 50, 4),
(99, 54, 3),
(100, 54, 4),
(101, 55, 3),
(102, 55, 4),
(103, 56, 3),
(104, 56, 4),
(105, 57, 3),
(106, 57, 4),
(107, 58, 3),
(108, 58, 4),
(109, 59, 3),
(110, 59, 4),
(111, 60, 3),
(112, 60, 4),
(113, 61, 3),
(114, 61, 4),
(115, 62, 3),
(116, 62, 4),
(117, 63, 3),
(118, 63, 4),
(119, 64, 3),
(120, 64, 4),
(121, 65, 3),
(122, 65, 4),
(123, 66, 3);

-- --------------------------------------------------------

--
-- Structure de la table `produit_tag`
--

CREATE TABLE `produit_tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_produit` int(11) UNSIGNED NOT NULL,
  `id_tag` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit_tag`
--

INSERT INTO `produit_tag` (`id`, `id_produit`, `id_tag`) VALUES
(132, 48, 9),
(133, 48, 10),
(134, 48, 11),
(135, 48, 13),
(136, 49, 9),
(137, 49, 10),
(138, 49, 11),
(139, 49, 13),
(140, 50, 9),
(141, 50, 10),
(142, 50, 11),
(143, 50, 13),
(156, 54, 9),
(157, 54, 10),
(158, 54, 11),
(159, 54, 12),
(160, 55, 9),
(161, 55, 10),
(162, 55, 11),
(163, 55, 12),
(164, 56, 9),
(165, 56, 10),
(166, 56, 11),
(167, 56, 12),
(168, 57, 9),
(169, 57, 10),
(170, 57, 11),
(171, 57, 12),
(172, 58, 9),
(173, 58, 10),
(174, 58, 11),
(175, 58, 12),
(176, 59, 9),
(177, 59, 10),
(178, 59, 11),
(179, 59, 12),
(180, 60, 9),
(181, 60, 10),
(182, 60, 11),
(183, 60, 12),
(184, 61, 9),
(185, 61, 10),
(186, 61, 11),
(187, 61, 12),
(188, 62, 9),
(189, 62, 10),
(190, 62, 11),
(191, 62, 12),
(192, 63, 9),
(193, 63, 10),
(194, 63, 11),
(195, 63, 12),
(196, 64, 9),
(197, 64, 10),
(198, 64, 11),
(199, 64, 12),
(200, 65, 9),
(201, 65, 10),
(202, 65, 11),
(203, 65, 12),
(204, 66, 9);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `nom`) VALUES
(9, 'KingOfPop'),
(10, 'EastCoast'),
(11, 'BigPopa'),
(12, 'EpicRecord'),
(13, 'BadBoyRecords'),
(14, 'TWD'),
(15, 'Rick'),
(16, 'Carl'),
(17, 'HISTORY'),
(18, 'JFK'),
(19, 'MarilynMonroe');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'client' COMMENT 'le type de l''utilisateur, admin ou user',
  `identifiant` varchar(10) NOT NULL COMMENT 'identifiant pour se connecter',
  `motDePasse` varchar(12) NOT NULL COMMENT 'mdp pour connexion',
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` text NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `region` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `pays` varchar(10) NOT NULL DEFAULT 'France'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `type`, `identifiant`, `motDePasse`, `nom`, `prenom`, `mail`, `adresse`, `region`, `ville`, `pays`) VALUES
(87, 'client', 'identifian', 'mdp', 'nom', 'prenom', 'mail', '', '', '', ''),
(88, 'admin', 'Miles', 'Miles', 'Morales', 'Miles', 'mail', '', '', '', ''),
(89, 'admin', 'Walter', 'Peter', 'Parker', 'Peter', 'Peter', '', '', '', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-commande` (`id_client`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `commande_utilisateur`
--
ALTER TABLE `commande_utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `produit_artiste`
--
ALTER TABLE `produit_artiste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_artiste` (`id_artiste`),
  ADD KEY `id_produit_2` (`id_produit`,`id_artiste`),
  ADD KEY `id_produit_3` (`id_produit`,`id_artiste`);

--
-- Index pour la table `produit_tag`
--
ALTER TABLE `produit_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_tag` (`id_tag`),
  ADD KEY `id_tag_2` (`id_tag`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT pour la table `commande_utilisateur`
--
ALTER TABLE `commande_utilisateur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT pour la table `produit_artiste`
--
ALTER TABLE `produit_artiste`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT pour la table `produit_tag`
--
ALTER TABLE `produit_tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse-commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `utilisateur-commande` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `commande_produit-commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `commande_produit-produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `commande_utilisateur`
--
ALTER TABLE `commande_utilisateur`
  ADD CONSTRAINT `commande_utilisateur-commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `commande_utilisateur-utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire-produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `commentaire-utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note-produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `note-utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `produit_artiste`
--
ALTER TABLE `produit_artiste`
  ADD CONSTRAINT `produit_artiste-artiste` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id`);

--
-- Contraintes pour la table `produit_tag`
--
ALTER TABLE `produit_tag`
  ADD CONSTRAINT `produit_tag-tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
