-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 15 avr. 2021 à 21:17
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `auraa`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcoach` varchar(255) DEFAULT NULL,
  `duree` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `nombremax` int(16) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `nombre_parti` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `act1` (`idcoach`)
) ENGINE=InnoDB AUTO_INCREMENT=85948 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `idcoach`, `duree`, `date`, `nombremax`, `type`, `description`, `lieu`, `nombre_parti`) VALUES
(1163, '12345672', '60', '23/04/2021', 100, 'Meditation', 'comfort -anti stress', 'par boulehia', 2),
(30827, '12345672', '120', '4/2/2021', 15, 'Respiration', 'Anti-Stress', 'Ain Drahem', 1),
(57212, '12345672', '60', '07/04/2021', 20, 'Pranayama', 'respiration', 'parc nahli', 0),
(79229, '12345672', '30', '4/6/2021', 20, 'Meditation', 'Anti Stress', 'montagne de boukarnin', 0),
(85749, '12345672', '120', '3/17/2021', 20, 'Yoga', 'meditation ', 'Parc Marsa', 0),
(85947, '12345672', '10', '4/2/2021', 120, 'Yoga', 'Yoga de rire', 'Parc Enahli', 0);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `nom_auteur` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `approuver` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `theme`, `nom_auteur`, `date`, `article`, `id_user`, `approuver`) VALUES
(7, 'test', 'teste', 'test', '01/04/2021', 'aura.pdf', '12345676', 1),
(8, 'Aura', 'Yoga', 'Chirine Nasri', '02/04/2021', 'aura.pdf', '12345672', 0),
(9, 'Bien Etre', 'Sport', 'Nour Hugo', '02/04/2021', 'bienetre.pdf', '12345672', 1),
(10, 'Abeditation', 'Sport', 'Nour Hugo', '02/04/2021', 'lebonheur.pdf', '12345672', 0),
(11, 'Bien Etre', 'sport', 'Mohamed', '02/04/2021', 'aura.pdf', '12345698', 0),
(12, 'Aura', 'Culture', 'Seifeddine', '02/04/2021', 'lebonheur.pdf', '12345698', 0);

-- --------------------------------------------------------

--
-- Structure de la table `challenge`
--

DROP TABLE IF EXISTS `challenge`;
CREATE TABLE IF NOT EXISTS `challenge` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nb_participants` int(11) NOT NULL,
  `id_niveau` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_niveau` (`id_niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `challenge`
--

INSERT INTO `challenge` (`id`, `titre`, `type`, `description`, `img`, `date_debut`, `date_fin`, `nb_participants`, `id_niveau`) VALUES
(1, 'yoga', 'valide', 'exercice de respiration', 'hello', '2021-04-01', '2021-04-10', 5, 1),
(2, 'meditation', 'valide', 'reflexion', 'hello', '2021-04-09', '2021-04-22', 3, 1),
(4, 'exercice', 'valide', 'ecrire trois chose que tu aimes dans ta vie', 'hello', '2021-04-09', '2021-04-15', 2, 1),
(5, 'anxiete', 'valide', 'sortie nature', 'hello', '2021-03-30', '2021-04-10', 0, 1),
(6, 'insomnie', 'valide', 'exercice respiration', 'hello', '2021-03-30', '2021-04-10', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) NOT NULL,
  `id_article` int(16) NOT NULL,
  `commentaire` longtext NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `com1` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_user`, `id_article`, `commentaire`, `date`) VALUES
(3, '10', 3, 'azazaazaaz', '31/03/2021');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `champ` text NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `type`, `id_user`, `email`, `champ`, `date`, `etat`) VALUES
(108, 'Reclamation', '12345698', 'seifeddine.bensalah@esprit.tn', 'je veux reclamer un evenement ', '2021-04-06', 'non vérifié'),
(109, 'Avis', '12345698', 'seifeddine.bensalah@esprit.tn', 'un evenement ', '2021-04-06', 'non vérifié'),
(110, 'Contact', '12345698', 'seifeddine.bensalah@esprit.tn', 'un evenement ', '2021-04-06', 'non vérifié');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210414143900', '2021-04-14 15:13:14', 455),
('DoctrineMigrations\\Version20210414151115', '2021-04-14 15:13:14', 91),
('DoctrineMigrations\\Version20210414161404', '2021-04-14 16:14:15', 105),
('DoctrineMigrations\\Version20210414162211', '2021-04-14 16:22:19', 90),
('DoctrineMigrations\\Version20210414162757', '2021-04-14 16:28:07', 71),
('DoctrineMigrations\\Version20210415170145', '2021-04-15 17:02:30', 435);

-- --------------------------------------------------------

--
-- Structure de la table `entraide`
--

DROP TABLE IF EXISTS `entraide`;
CREATE TABLE IF NOT EXISTS `entraide` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ent1` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entraide`
--

INSERT INTO `entraide` (`id`, `question`, `categorie`, `id_user`, `date`, `email`) VALUES
(48, 'sss', 'Bien-être', '12345673', '2021-04-01', 'seifeddine.bensalah@yahoo.fr'),
(49, 'test', 'Santé', '12345673', '2021-04-07', 'seifeddine.bensalah@yahoo.fr'),
(50, 'tttt', 'Santé', '12345673', '2021-04-07', 'seifeddine.bensalah@yahoo.fr'),
(51, '1212', 'Santé', '12345673', '2021-04-06', 'seifeddine.bensalah@yahoo.fr'),
(52, '1112', 'Santé', '12345670', '2021-04-07', 'seifseif@gmail.com'),
(53, '1111', 'Santé', '12345676', '2021-04-06', 'rafik@gmail.com'),
(54, 'AZAZ', 'Santé', '12345670', '2021-04-07', 'seifseif@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_classement`
--

DROP TABLE IF EXISTS `ligne_classement`;
CREATE TABLE IF NOT EXISTS `ligne_classement` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `id_client` varchar(255) DEFAULT NULL,
  `id_niveau` int(11) DEFAULT NULL,
  `position` int(10) NOT NULL,
  `nb_points` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`),
  KEY `id_niveau` (`id_niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_classement`
--

INSERT INTO `ligne_classement` (`id`, `id_client`, `id_niveau`, `position`, `nb_points`) VALUES
(1, '12345670', 1, 2, 100),
(2, '12345671', 1, 3, 50),
(3, '12345698', 1, 1, 375);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `titre`) VALUES
(1, 'aa'),
(3, 'bb'),
(4, 'cc');

-- --------------------------------------------------------

--
-- Structure de la table `objectif`
--

DROP TABLE IF EXISTS `objectif`;
CREATE TABLE IF NOT EXISTS `objectif` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `reponse` int(11) NOT NULL,
  `dateDebut` varchar(50) NOT NULL,
  `duree` int(11) NOT NULL,
  `idClient` varchar(255) DEFAULT NULL,
  `mailchecked` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `icone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_objcli` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objectif`
--

INSERT INTO `objectif` (`id`, `description`, `reponse`, `dateDebut`, `duree`, `idClient`, `mailchecked`, `image`, `updated_at`, `icone`) VALUES
(50, 'Je veux attribuer la note X à ma journée', 1, '2021-04-15', 8, '12345675', 0, NULL, '2021-04-14 16:28:17', '/assets/img/Chirine/meditation.jpg'),
(51, 'Je veux attribuer la note X à ma journée', 1, '2021-04-28', 8, '12345698', 0, NULL, '2021-04-14 16:32:52', '/assets/img/Chirine/pas.jpg'),
(52, 'Je veux attribuer la note X à ma journée', 1, '2021-04-29', 8, '87654321', 1, NULL, '2021-04-15 09:07:47', '/assets/img/Chirine/eau.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `objectif_pred`
--

DROP TABLE IF EXISTS `objectif_pred`;
CREATE TABLE IF NOT EXISTS `objectif_pred` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `duree` int(11) NOT NULL,
  `idAdmin` varchar(255) DEFAULT NULL,
  `icone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ObjAd` (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objectif_pred`
--

INSERT INTO `objectif_pred` (`id`, `description`, `duree`, `idAdmin`, `icone`) VALUES
(2, 'Je veux attribuer la note X à ma journée', 10, '12345698', 'note.png'),
(3, 'Je veux parler à X personnes', 3, '12345698', 'parler.png'),
(4, 'Je veux lire pendant X heures', 25, '12345698', 'lire.png'),
(5, 'Je veux diminuer mon temps d ecran à X heures', 2, '12345698', 'ecran.png'),
(6, 'Je veux faire X milles pas', 7, '12345698', 'pas.png'),
(7, 'Je veux faire X minutes de meditation', 20, '12345698', 'meditation.png'),
(8, 'Je veux me concentrer X heures sur mon travail', 7, '12345698', 'travail.png'),
(9, 'Je veux regarder X documentaires', 5, '12345698', 'docu.png');

-- --------------------------------------------------------

--
-- Structure de la table `participationactivté`
--

DROP TABLE IF EXISTS `participationactivté`;
CREATE TABLE IF NOT EXISTS `participationactivté` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `id_client` varchar(255) NOT NULL,
  `id_activite` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participationactivté`
--

INSERT INTO `participationactivté` (`id`, `id_client`, `id_activite`, `rating`) VALUES
(5, '12345670', 1163, NULL),
(6, '12345698', 30827, 4),
(7, '12345698', 1163, 4),
(8, '12345698', 1163, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `participationtherapie`
--

DROP TABLE IF EXISTS `participationtherapie`;
CREATE TABLE IF NOT EXISTS `participationtherapie` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `id_client` varchar(255) NOT NULL,
  `id_therapie` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participationtherapie`
--

INSERT INTO `participationtherapie` (`id`, `id_client`, `id_therapie`, `rating`) VALUES
(9, '12345670', 96425, NULL),
(10, '12345698', 23313, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `participation_challenge`
--

DROP TABLE IF EXISTS `participation_challenge`;
CREATE TABLE IF NOT EXISTS `participation_challenge` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `id_challenge` int(11) DEFAULT NULL,
  `id_client` varchar(255) DEFAULT NULL,
  `etat` varchar(255) NOT NULL,
  `nb_points` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_challenge_2` (`id_challenge`,`id_client`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participation_challenge`
--

INSERT INTO `participation_challenge` (`id`, `id_challenge`, `id_client`, `etat`, `nb_points`) VALUES
(9, 2, '12345698', 'joined', 0),
(10, 1, '12345698', 'joined', 0);

-- --------------------------------------------------------

--
-- Structure de la table `propoact`
--

DROP TABLE IF EXISTS `propoact`;
CREATE TABLE IF NOT EXISTS `propoact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcoach` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `nombremax` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `nombre_parti` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90839 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `propoact`
--

INSERT INTO `propoact` (`id`, `idcoach`, `duree`, `date`, `nombremax`, `type`, `description`, `lieu`, `nombre_parti`) VALUES
(39118, '12345672', '60', '4/2/2021', 10, 'Yoga', 'Yoga de rire', 'Parc Boulehya', 0),
(90838, '12345672', '360', '4/22/2021', 50, 'Relaxation', 'Anti depression', 'Parc Menzah 1', 0);

-- --------------------------------------------------------

--
-- Structure de la table `proptherapie`
--

DROP TABLE IF EXISTS `proptherapie`;
CREATE TABLE IF NOT EXISTS `proptherapie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `nombremax` int(11) NOT NULL,
  `idcoach` varchar(255) NOT NULL,
  `nombre_parti` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97646 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `proptherapie`
--

INSERT INTO `proptherapie` (`id`, `sujet`, `date`, `lieu`, `nombremax`, `idcoach`, `nombre_parti`) VALUES
(80265, 'Anxiete', '4/29/2021', 'La Soukra', 30, '12345672', 0),
(64266, 'Stress ', '4/23/2021', 'Maison de jeunes Menzah 6', 15, '12345672', 0),
(97645, 'chommage ', '4/9/2021', 'Ghazela', 25, '12345672', 0),
(75595, 'Insomnie ', '4/27/2021', 'Esprit', 20, '12345672', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rep1` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

DROP TABLE IF EXISTS `suivi`;
CREATE TABLE IF NOT EXISTS `suivi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` int(11) NOT NULL,
  `idClient` varchar(255) DEFAULT NULL,
  `idObjectif` int(11) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_SuivCli` (`idClient`),
  KEY `fk_SuivObj` (`idObjectif`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suivi`
--

INSERT INTO `suivi` (`id`, `valeur`, `idClient`, `idObjectif`, `date`, `color`) VALUES
(59, 14, '15012207', 50, '15/04/2021', '#94C045'),
(60, 21, '87654321', 50, '16/04/2021', '#E99B2A'),
(61, 11, '87654323', 50, '17/04/2021', '#E94A2A'),
(62, 14, '87654312', 50, '18/04/2021', '#E9E92A'),
(63, 5, '12345123', 50, '19/04/2021', '#2A3AE9');

-- --------------------------------------------------------

--
-- Structure de la table `therapie`
--

DROP TABLE IF EXISTS `therapie`;
CREATE TABLE IF NOT EXISTS `therapie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(254) NOT NULL,
  `date` varchar(255) NOT NULL,
  `lieu` varchar(254) NOT NULL,
  `nombremax` int(11) NOT NULL,
  `idcoach` varchar(254) NOT NULL,
  `nombre_parti` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23314 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `therapie`
--

INSERT INTO `therapie` (`id`, `sujet`, `date`, `lieu`, `nombremax`, `idcoach`, `nombre_parti`) VALUES
(1250, 'Accident Mortel', '4/16/2021', 'Maison de jeunes', 20, '12345672', 0),
(5033, 'Depression', '4/21/2021', 'Maison de jeunes Soukra', 20, '12345672', 0),
(20179, 'Accident de voiture', '25/03/2021', 'Maison de jeunes', 20, '12345672', 0),
(23313, 'Insomnie', '25/03/2021', 'centre Makni', 10, '12345672', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `rme` varchar(255) NOT NULL DEFAULT 'N',
  `picture` varchar(255) NOT NULL,
  `sms` varchar(255) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `tel`, `specialite`, `adresse`, `role`, `rme`, `picture`, `sms`) VALUES
('12341231', 'Nour', 'nasri', 'seifff@gmail.coma', 'afc677037be3d92324fa6597d6c1506b534e306b', '98123498', '', 'Beja ', 'Client', 'N', 'f3W9_.jpg', 'N'),
('12341234', 'seif', 'bouraoui', 'seifedd@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '98123123', '', 'Aouina', 'Client', 'Y', 'Seifeddine.jpg', 'N'),
('12345123', 'Seif', 'ben ali', 'seifeddine@esprit.tn', 'afc677037be3d92324fa6597d6c1506b534e306b', '23123321', '', 'Aouina', 'Client', 'Y', 'Seifeddine.jpg', 'N'),
('12345634', 'nour', 'dekhil', 'nour@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '23123765', '', 'Manouba ', 'Client', 'Y', 'Seifeddine.jpg', 'N'),
('12345670', 'Ben Salah', 'Seifeddine', 'seifseif@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '23123124', '', 'Gabes', 'Client', 'Y', 'Seifeddine.jpg', 'N'),
('12345671', 'nour', 'manaai', 'nour.manai@esprit.tn', 'afc677037be3d92324fa6597d6c1506b534e306b', '23232314', '', 'Soukra', 'Client', 'Y', 'default.jpg', 'N'),
('12345672', 'seifeddine', 'Ben Salah', 'seifeddine.bensalah10@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '95223112', 'Yoga', '', 'CoachV', 'Y', 'coach.jpg', 'N'),
('12345673', 'ahmed', 'hasnaoui', 'seifeddine.bensalah@yahoo.fr', 'afc677037be3d92324fa6597d6c1506b534e306b', '23123126', '', 'aouina', 'Client', 'N', 'default.jpg', 'N'),
('12345674', 'ala', 'kaaniche', 'seif@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '53232323', 'Meditation', '', 'CoachNV', 'N', 'default.jpg', 'N'),
('12345675', 'khalil', 'fekih', 'seif@yahoo.fr', 'afc677037be3d92324fa6597d6c1506b534e306b', '23123127', 'Yoga', '', 'CoachNV', 'N', 'default.jpg', 'N'),
('12345676', 'bouchnek', 'rafik', 'rafik@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '23232323', 'Meditation', '', 'CoachV', 'Y', 'Seifeddine.jpg', 'N'),
('12345678', 'Seifeddine', 'BenSalah S', 'seifeddine.bensalah@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '95227678', '', '', 'SAdmin', 'Y', 'Seifeddine.jpg', 'N'),
('12345698', 'seif', 'Dekhil', 'seifeddine.bensalah@esprit.tn', 'afc677037be3d92324fa6597d6c1506b534e306b', '56123123', '', 'Menzah 4', 'Client', 'Y', 'personne.jpg', 'N'),
('15012207', 'sinen', 'Ahmed', 'ahmedsnene1@gmail.com', 'b6a607362b0608b8fbb5c22cdc1e5793ed2c823a', '21117052', '', '', 'Admin', 'Y', 'Seifeddine.jpg', 'N'),
('23232323', 'Mohamed', 'nasri', 'aa@gmal.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '23123123', '', 'Menzah 4', 'Client', 'N', 'Seifeddine.jpg', 'N'),
('87654312', 'seif', 'koubaa', 'seif@gmail.fr', 'afc677037be3d92324fa6597d6c1506b534e306b', '23987654', '', 'Menzah 4', 'Client', 'Y', 'Seifeddine.jpg', 'N'),
('87654321', 'nour', 'kaaniche', 'ss@gmaaa.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '70123123', '', 'Menzah 1', 'Client', 'N', 'Seifeddine.jpg', 'N'),
('87654323', 'chirine', 'mdimagh', 'seifedda@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '98989899', '', 'Ben Arous', 'Client', 'Y', 'Seifeddine.jpg', 'N'),
('87687656', 'akram', 'ben salah', 'seifff@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '57098123', '', 'Beja ', 'Client', 'Y', 'ijje_hey.jpg', 'N'),
('87687687', 'khalil', 'mdimagh', 'seifsei@gmail.com', 'afc677037be3d92324fa6597d6c1506b534e306b', '50123123', '', 'Manouba ', 'Client', 'Y', 'Seifeddine.jpg', 'N');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `act1` FOREIGN KEY (`idcoach`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `challenge`
--
ALTER TABLE `challenge`
  ADD CONSTRAINT `id_niveau` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id`);

--
-- Contraintes pour la table `entraide`
--
ALTER TABLE `entraide`
  ADD CONSTRAINT `ent1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `ligne_classement`
--
ALTER TABLE `ligne_classement`
  ADD CONSTRAINT `id_client1` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `ligne_classement_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id`);

--
-- Contraintes pour la table `objectif`
--
ALTER TABLE `objectif`
  ADD CONSTRAINT `fk_objcli` FOREIGN KEY (`idClient`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `objectif_pred`
--
ALTER TABLE `objectif_pred`
  ADD CONSTRAINT `fk_ObjAd` FOREIGN KEY (`idAdmin`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `participation_challenge`
--
ALTER TABLE `participation_challenge`
  ADD CONSTRAINT `id_challenge` FOREIGN KEY (`id_challenge`) REFERENCES `challenge` (`id`),
  ADD CONSTRAINT `id_client` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `rep1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD CONSTRAINT `fk_SuivCli` FOREIGN KEY (`idClient`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_SuivObj` FOREIGN KEY (`idObjectif`) REFERENCES `objectif` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
