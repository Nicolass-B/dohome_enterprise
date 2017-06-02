-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 31 mai 2017 à 10:26
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dohome`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionneur`
--

CREATE TABLE `actionneur` (
  `Id_Actionneur` int(11) NOT NULL,
  `Etat_Actionneur` tinyint(1) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `ID_Capteurs` int(11) NOT NULL,
  `Type` text NOT NULL,
  `Valeur` float NOT NULL,
  `Date_Installation` datetime NOT NULL,
  `Etat_Batterie` int(11) NOT NULL,
  `ID_piece` int(11) DEFAULT NULL,
  `unite` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`ID_Capteurs`, `Type`, `Valeur`, `Date_Installation`, `Etat_Batterie`, `ID_piece`, `unite`) VALUES
(1, 'temp', 20, '2017-05-19 00:00:00', 100, 1, 'Celsius'),
(2, 'temp', 25, '2017-05-10 00:00:00', 100, 2, 'Celsius'),
(3, 'temp', 25, '2017-05-10 00:00:00', 100, 2, 'Celsius'),
(4, 'illum', 4300, '2017-05-01 00:00:00', 100, 3, 'Lux'),
(5, 'presence', -1, '2017-05-22 09:32:39', 100, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client_secondaire`
--

CREATE TABLE `client_secondaire` (
  `ID_Secondaire` int(11) NOT NULL,
  `mail` text NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `historique_capteurs`
--

CREATE TABLE `historique_capteurs` (
  `Id_mesure` int(11) NOT NULL,
  `Date_Mesure` date NOT NULL,
  `Valeur` float NOT NULL,
  `unite` varchar(3) NOT NULL,
  `ID_capteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `Id` int(11) NOT NULL,
  `nbpieces` int(11) NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `Nom` varchar(20) DEFAULT 'Maison'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`Id`, `nbpieces`, `ID_user`, `Nom`) VALUES
(1, 1, 1, 'Maison');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `ID_Message` int(11) NOT NULL,
  `Titre` text NOT NULL,
  `Contenu` text NOT NULL,
  `ID_Expediteur` int(11) NOT NULL,
  `ID_Destinataire` int(11) NOT NULL,
  `Time_Stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`ID_Message`, `Titre`, `Contenu`, `ID_Expediteur`, `ID_Destinataire`, `Time_Stamp`) VALUES
(1, 'Essai 1', 'Aujourd\'hui il fait 25 degrés, c\'est beaucoup et c\'est pas facile de travailler dans ces conditions ! ', 2, 1, '2017-05-29 09:47:56'),
(2, 'Toto', 'toto est un pauvre petit', 1, 2, '2017-05-29 09:48:18'),
(3, 'Titi', 'Titi est un gentil pauv type !', 1, 2, '2017-05-29 09:48:46'),
(4, 'HAHAHHAHA', 'got lemonade ?', 2, 1, '2017-05-24 09:49:19'),
(5, 'Lets test this', 'like really test it', 2, 1, '2017-07-25 09:49:57'),
(7, 'Enore des tests', 'Nous avons un correcteur grammtical a droite', 3, 1, '2017-05-29 14:15:38'),
(8, 'Bla', 'Bla bla bla', 3, 1, '2016-07-29 14:15:51');

-- --------------------------------------------------------

--
-- Structure de la table `ownership_actio_scen`
--

CREATE TABLE `ownership_actio_scen` (
  `Id_Actionneur` int(11) NOT NULL,
  `ID_Scenarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ownership_capt_scen`
--

CREATE TABLE `ownership_capt_scen` (
  `ID_Capteurs` int(11) NOT NULL,
  `ID_Scenarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ownership_pièces_scen`
--

CREATE TABLE `ownership_pièces_scen` (
  `ID_pieces` int(11) NOT NULL,
  `ID_Scenarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE `pieces` (
  `ID_pieces` int(11) NOT NULL,
  `ID_Maison` int(11) NOT NULL,
  `Nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`ID_pieces`, `ID_Maison`, `Nom`) VALUES
(1, 1, 'Salon'),
(2, 1, 'Cuisine'),
(3, 1, 'Cuisine 2');

-- --------------------------------------------------------

--
-- Structure de la table `scenarios`
--

CREATE TABLE `scenarios` (
  `ID_Scénarios` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Nom_Scénarios` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `Adresse` text NOT NULL,
  `Is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `date_inscription` datetime NOT NULL,
  `date_naissance` datetime NOT NULL,
  `sexe` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `Mail`, `Prenom`, `Nom`, `telephone`, `mot_de_passe`, `Adresse`, `Is_admin`, `date_inscription`, `date_naissance`, `sexe`) VALUES
(1, 'test@gmail.xxx', 'Nicolas', 'Kiris', '064206969', 'azerty', 'no', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'test@test.com', 'Nicolas', 'Le Grand Génie', '064206969', 'azerty', 'no', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'admin', 'admin', 'admin', '064567890', 'admin', 'no', 1, '2017-05-22 00:46:57', '2017-05-22 00:47:00', 1),
(4, 'tic@tac.com', 'Antoine', 'dank', '098765432', 'azerty', 'no', 0, '2017-05-31 10:09:04', '2017-05-31 10:09:05', 1),
(5, 'toto@toto.com', 'Guillaume', 'Froger', '123456789', 'azerty', 'no', 0, '2017-05-31 10:09:43', '2017-05-31 10:09:44', 1),
(6, 'titi@tata.fr', 'Mat', 'ématiques', '098765543', 'azerty', 'no', 0, '2017-05-31 10:10:42', '2017-05-31 10:10:43', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD PRIMARY KEY (`Id_Actionneur`),
  ADD KEY `actionneur_user_id_fk` (`id_user`);

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`ID_Capteurs`),
  ADD KEY `capteurs_pieces_ID_pièces_fk` (`ID_piece`);

--
-- Index pour la table `client_secondaire`
--
ALTER TABLE `client_secondaire`
  ADD PRIMARY KEY (`ID_Secondaire`),
  ADD KEY `client_secondaire_user_id_fk` (`ID_USER`);

--
-- Index pour la table `historique_capteurs`
--
ALTER TABLE `historique_capteurs`
  ADD PRIMARY KEY (`Id_mesure`),
  ADD KEY `historique_capteurs_capteurs_ID_Capteurs_fk` (`ID_capteur`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `maison_user_id_fk` (`ID_user`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`ID_Message`),
  ADD KEY `messagerie_exp_user_id_fk` (`ID_Expediteur`),
  ADD KEY `messagerie_dest___fk` (`ID_Destinataire`);

--
-- Index pour la table `ownership_actio_scen`
--
ALTER TABLE `ownership_actio_scen`
  ADD PRIMARY KEY (`Id_Actionneur`,`ID_Scenarios`);

--
-- Index pour la table `ownership_capt_scen`
--
ALTER TABLE `ownership_capt_scen`
  ADD PRIMARY KEY (`ID_Capteurs`,`ID_Scenarios`);

--
-- Index pour la table `ownership_pièces_scen`
--
ALTER TABLE `ownership_pièces_scen`
  ADD PRIMARY KEY (`ID_pieces`,`ID_Scenarios`);

--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`ID_pieces`),
  ADD KEY `pieces_maison_Id_fk` (`ID_Maison`);

--
-- Index pour la table `scenarios`
--
ALTER TABLE `scenarios`
  ADD PRIMARY KEY (`ID_Scénarios`),
  ADD KEY `scénarios_user_id_fk` (`ID_User`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_Mail_uindex` (`Mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actionneur`
--
ALTER TABLE `actionneur`
  MODIFY `Id_Actionneur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `ID_Capteurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `client_secondaire`
--
ALTER TABLE `client_secondaire`
  MODIFY `ID_Secondaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `historique_capteurs`
--
ALTER TABLE `historique_capteurs`
  MODIFY `Id_mesure` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `ID_Message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `ownership_actio_scen`
--
ALTER TABLE `ownership_actio_scen`
  MODIFY `Id_Actionneur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pieces`
--
ALTER TABLE `pieces`
  MODIFY `ID_pieces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `scenarios`
--
ALTER TABLE `scenarios`
  MODIFY `ID_Scénarios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD CONSTRAINT `actionneur_user_id_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD CONSTRAINT `capteurs_pieces_ID_pièces_fk` FOREIGN KEY (`ID_piece`) REFERENCES `pieces` (`ID_pieces`);

--
-- Contraintes pour la table `client_secondaire`
--
ALTER TABLE `client_secondaire`
  ADD CONSTRAINT `client_secondaire_user_id_fk` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `historique_capteurs`
--
ALTER TABLE `historique_capteurs`
  ADD CONSTRAINT `historique_capteurs_capteurs_ID_Capteurs_fk` FOREIGN KEY (`ID_capteur`) REFERENCES `capteurs` (`ID_Capteurs`);

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `maison_user_id_fk` FOREIGN KEY (`ID_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `messagerie_dest___fk` FOREIGN KEY (`ID_Destinataire`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `messagerie_exp_user_id_fk` FOREIGN KEY (`ID_Expediteur`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD CONSTRAINT `pieces_maison_Id_fk` FOREIGN KEY (`ID_Maison`) REFERENCES `maison` (`Id`);

--
-- Contraintes pour la table `scenarios`
--
ALTER TABLE `scenarios`
  ADD CONSTRAINT `scénarios_user_id_fk` FOREIGN KEY (`ID_User`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
