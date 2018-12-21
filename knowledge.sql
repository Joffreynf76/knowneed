-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 19 déc. 2018 à 12:34
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `knowledge`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `labelCategory` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `labelCategory`) VALUES
(1, 'PHP'),
(2, 'HTML'),
(3, 'Javascript'),
(4, 'Angular'),
(5, 'React'),
(6, 'Symfony'),
(7, 'Laravel'),
(8, 'Wordpress'),
(9, 'Bootstrap'),
(10, 'Java'),
(11, 'CSS');

-- --------------------------------------------------------

--
-- Structure de la table `resources`
--

CREATE TABLE `resources` (
  `idResources` int(11) NOT NULL,
  `nameResources` varchar(255) DEFAULT NULL,
  `dateResources` date DEFAULT NULL,
  `user_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `resources`
--

INSERT INTO `resources` (`idResources`, `nameResources`, `dateResources`, `user_idUser`) VALUES
(4, 'TutoVM.pdf', '2018-12-19', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nameUser` varchar(45) DEFAULT NULL,
  `firstnameUser` varchar(45) DEFAULT NULL,
  `emailUser` varchar(255) DEFAULT NULL,
  `passwordUser` char(100) DEFAULT NULL,
  `roleUser` varchar(45) DEFAULT 'novice',
  `answerUser` int(11) DEFAULT NULL,
  `descriptionUser` longtext,
  `likeUser` int(11) DEFAULT '0',
  `dislikeUser` int(11) DEFAULT '0',
  `loginUser` int(11) DEFAULT '0',
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nameUser`, `firstnameUser`, `emailUser`, `passwordUser`, `roleUser`, `answerUser`, `descriptionUser`, `likeUser`, `dislikeUser`, `loginUser`, `picture`) VALUES
(4, 'Hunter', 'Connor', 'connor.hunter@example.com', '$2y$10$ishMDJNdM5K/BGEFVOOzDea4vAYi84fjsj6Ngjgx9BJ9p4H2bXkWq', 'novice', NULL, 'php master and symfony beginner', 1, 0, 14, ''),
(5, 'Henry', 'Anna', 'anna.henry@example.com', '$2y$10$etqb6N0z9hCL4SmiQoL37O5Vu92tD0ABK3P5K13eTufVsXJr7qD.C', 'novice', NULL, NULL, 0, 0, 5, ''),
(6, 'Dunn', 'Hazel', 'hazel.dunn@example.com', '$2y$10$qlBdnEV2sm6/ifUHe3gjBuBEfTDjFSaLXfOJbx1CRY4ulq3c5xRnS', 'novice', NULL, NULL, 0, 0, 6, ''),
(7, 'Chapman', 'Jordan', 'jordan.chapman@example.com', '$2y$10$miUVhTRuVZxUhrmn225s6O7jTb8X20kZebCZkJviDRTau1ucVMTDG', 'novice', NULL, NULL, 0, 0, 1, 'jordan.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user_has_category`
--

CREATE TABLE `user_has_category` (
  `user_idUser` int(11) NOT NULL,
  `category_idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_has_category`
--

INSERT INTO `user_has_category` (`user_idUser`, `category_idCategory`) VALUES
(4, 1),
(4, 2),
(4, 11);

-- --------------------------------------------------------

--
-- Structure de la table `user_has_user`
--

CREATE TABLE `user_has_user` (
  `user_idUser` int(11) NOT NULL,
  `user_idUser1` int(11) NOT NULL,
  `message` longtext,
  `title` varchar(45) DEFAULT NULL,
  `reference` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_has_user`
--

INSERT INTO `user_has_user` (`user_idUser`, `user_idUser1`, `message`, `title`, `reference`) VALUES
(4, 5, 'Problème !!!<br><br>Quoi ?', 'Question php', '9718fc1224'),
(6, 4, 'how insert an image ?<br><br><img ...><br><br>img<br><br>thanks<br><br>Hazel:good<br><br>Connor:bye<br><br>Hazel : have a nice day<br><br>Connor : message<br><br>Connor : thanks', 'Bug ', 'ec656d2b33');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`idResources`),
  ADD KEY `fk_resources_user1_idx` (`user_idUser`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `user_has_category`
--
ALTER TABLE `user_has_category`
  ADD PRIMARY KEY (`user_idUser`,`category_idCategory`),
  ADD KEY `fk_user_has_category_category1_idx` (`category_idCategory`),
  ADD KEY `fk_user_has_category_user_idx` (`user_idUser`);

--
-- Index pour la table `user_has_user`
--
ALTER TABLE `user_has_user`
  ADD KEY `fk_user_has_user_user2_idx` (`user_idUser1`),
  ADD KEY `fk_user_has_user_user1_idx` (`user_idUser`),
  ADD KEY `user_idUser` (`user_idUser`,`user_idUser1`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `resources`
--
ALTER TABLE `resources`
  MODIFY `idResources` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `fk_resources_user1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_category`
--
ALTER TABLE `user_has_category`
  ADD CONSTRAINT `fk_user_has_category_category1` FOREIGN KEY (`category_idCategory`) REFERENCES `category` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_category_user` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_user`
--
ALTER TABLE `user_has_user`
  ADD CONSTRAINT `fk_user_has_user_user1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_user_user2` FOREIGN KEY (`user_idUser1`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
