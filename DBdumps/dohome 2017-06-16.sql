-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 16 juin 2017 à 10:00
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
  `ID_Actionneur` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ID_piece` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `Date_Installation` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `Nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `ID_Capteurs` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL,
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
  `ID_USER` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `historique_capteurs`
--

CREATE TABLE `historique_capteurs` (
  `Id_mesure` int(11) NOT NULL,
  `Date_Mesure` datetime NOT NULL,
  `Valeur` float NOT NULL,
  `unite` varchar(3) NOT NULL,
  `ID_capteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique_capteurs`
--

INSERT INTO `historique_capteurs` (`Id_mesure`, `Date_Mesure`, `Valeur`, `unite`, `ID_capteur`) VALUES
(1, '2017-06-06 09:40:58', 20, 'C', 1),
(2, '2017-06-06 09:41:12', 21, 'C', 1),
(3, '2017-06-06 09:41:21', 23, 'C', 1),
(4, '2017-06-06 09:41:30', 26, 'C', 1);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id_maison` int(11) NOT NULL,
  `nbpieces` int(11) NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `Nom` varchar(20) DEFAULT 'Maison',
  `superficie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`id_maison`, `nbpieces`, `ID_user`, `Nom`, `superficie`) VALUES
(1, 1, 1, 'Maison', 120),
(2, 0, 2, 'Villa Plage', 420),
(3, 0, 1, 'Villa Plage', 69),
(5, 1, 3, 'Appart', 110),
(6, 0, NULL, 'test', 20),
(7, 0, 1, 'test', 20),
(8, 0, 2, 'Appartement', 255);

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
(8, 'Bla', 'Bla bla bla', 3, 1, '2016-07-29 14:15:51'),
(9, 'Hello ! ', 'mouhahahahaha !', 1, 3, '2017-06-04 13:07:35');

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
  `Nom` text NOT NULL,
  `superficie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`ID_pieces`, `ID_Maison`, `Nom`, `superficie`) VALUES
(1, 1, 'Salon', 15),
(2, 1, 'Cuisine', 10),
(3, 1, 'Cuisine 2', 31),
(4, 3, 'Salon', 20),
(5, 3, 'entrée', 5),
(6, 2, 'cuisine', 35),
(7, 2, 'cuisine', 35),
(8, 7, 'test2', 10),
(9, 8, 'Salon', 60);

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
-- Structure de la table `type_act`
--

CREATE TABLE `type_act` (
  `typename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_act`
--

INSERT INTO `type_act` (`typename`) VALUES
('Chauffage'),
('Clim'),
('Moteur'),
('Porte'),
('Ventilateur'),
('Volets');

-- --------------------------------------------------------

--
-- Structure de la table `type_capt`
--

CREATE TABLE `type_capt` (
  `typename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_capt`
--

INSERT INTO `type_capt` (`typename`) VALUES
('bruit'),
('humidite'),
('illum'),
('presence'),
('temp'),
('vent');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `Adresse` text NOT NULL,
  `Is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `date_inscription` datetime NOT NULL,
  `date_naissance` datetime NOT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `Mail`, `Prenom`, `Nom`, `telephone`, `mot_de_passe`, `Adresse`, `Is_admin`, `date_inscription`, `date_naissance`, `sexe`, `avatar`) VALUES
(1, 'test@gmail.xxx', 'Nicolas', 'Kiris', '064206969', 'azerty', 'no', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, ''),
(2, 'test@test.com', 'Nicolas', 'Le Grand Génie', '064206969', 'azerty', 'no', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, ''),
(3, 'admin', 'admin', 'admin', '064567890', 'admin', 'no', 1, '2017-05-22 00:46:57', '2017-05-22 00:47:00', '1', ''),
(4, 'tic@tac.com', 'Antoine', 'dank', '098765432', 'azerty', 'no', 0, '2017-05-31 10:09:04', '2017-05-31 10:09:05', '1', ''),
(5, 'toto@toto.com', 'Guillaume', 'Froger', '123456789', 'azerty', 'no', 0, '2017-05-31 10:09:43', '2017-05-31 10:09:44', '1', ''),
(6, 'titi@tata.fr', 'Mat', 'ématiques', '098765543', 'azerty', 'no', 0, '2017-05-31 10:10:42', '2017-05-31 10:10:43', '1', ''),
(7, 'juste@juste.com', 'tt', 'test', '0908077070', '123456789', '53 bis boulevard roger salengros 93130 noisy-le-sec', 0, '2017-06-13 14:38:00', '1935-09-07 00:00:00', 'homme', ''),
(8, 'tr@tr.com', 'tre', 'tttttteeee', '0890651060', 'azerty', 'zrezter', 0, '2017-06-13 14:39:00', '1998-04-17 00:00:00', 'femme', ''),
(9, 'test@teegsdxst.com', 'stop plait', 'marche', '2898498456', 'azerty', 'aztregdfhjtrfgc', 0, '2017-06-13 15:41:25', '2006-07-07 00:00:00', 'homme', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD PRIMARY KEY (`ID_Actionneur`),
  ADD KEY `actionneur_user_id_fk` (`id_user`),
  ADD KEY `actionneur_type_act_typename_fk` (`type`);

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`ID_Capteurs`),
  ADD KEY `capteurs_pieces_ID_pièces_fk` (`ID_piece`),
  ADD KEY `capteurs_type_capt_typename_fk` (`Type`);

--
-- Index pour la table `client_secondaire`
--
ALTER TABLE `client_secondaire`
  ADD PRIMARY KEY (`ID_Secondaire`),
  ADD KEY `client_secondaire_user_id_fk` (`ID_USER`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_maison`),
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
-- Index pour la table `type_act`
--
ALTER TABLE `type_act`
  ADD PRIMARY KEY (`typename`);

--
-- Index pour la table `type_capt`
--
ALTER TABLE `type_capt`
  ADD PRIMARY KEY (`typename`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_Mail_uindex` (`Mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actionneur`
--
ALTER TABLE `actionneur`
  MODIFY `ID_Actionneur` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `historique_capteurs`
--
ALTER TABLE `historique_capteurs`
  MODIFY `Id_mesure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `id_maison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `ID_Message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `ownership_actio_scen`
--
ALTER TABLE `ownership_actio_scen`
  MODIFY `Id_Actionneur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pieces`
--
ALTER TABLE `pieces`
  MODIFY `ID_pieces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `scenarios`
--
ALTER TABLE `scenarios`
  MODIFY `ID_Scénarios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD CONSTRAINT `actionneur_type_act_typename_fk` FOREIGN KEY (`type`) REFERENCES `type_act` (`typename`);

--
-- Contraintes pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD CONSTRAINT `capteurs_pieces_ID_pièces_fk` FOREIGN KEY (`ID_piece`) REFERENCES `pieces` (`ID_pieces`),
  ADD CONSTRAINT `capteurs_type_capt_typename_fk` FOREIGN KEY (`Type`) REFERENCES `type_capt` (`typename`);

--
-- Contraintes pour la table `client_secondaire`
--
ALTER TABLE `client_secondaire`
  ADD CONSTRAINT `client_secondaire_user_id_fk` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `historique_capteurs`
--
ALTER TABLE `historique_capteurs`
  ADD CONSTRAINT `historique_capteurs_capteurs_ID_Capteurs_fk` FOREIGN KEY (`ID_capteur`) REFERENCES `capteurs` (`ID_Capteurs`);

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `maison_user_id_fk` FOREIGN KEY (`ID_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `messagerie_dest___fk` FOREIGN KEY (`ID_Destinataire`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `messagerie_exp_user_id_fk` FOREIGN KEY (`ID_Expediteur`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD CONSTRAINT `pieces_maison_Id_fk` FOREIGN KEY (`ID_Maison`) REFERENCES `maison` (`id_maison`);

--
-- Contraintes pour la table `scenarios`
--
ALTER TABLE `scenarios`
  ADD CONSTRAINT `scénarios_user_id_fk` FOREIGN KEY (`ID_User`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
