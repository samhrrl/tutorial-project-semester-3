-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 jan. 2021 à 11:06
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quartier_du_haras`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `login` varchar(20) NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`login`, `mot_de_passe`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `categorie` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie`) VALUES
(1, 'jardinage'),
(2, 'bricolage'),
(3, 'electromenager'),
(4, 'autres'),
(5, 'categoriebidon'),
(6, 'pas de categorie');

-- --------------------------------------------------------

--
-- Structure de la table `compteur`
--

CREATE TABLE `compteur` (
  `id` int(11) NOT NULL,
  `objets_pretes` int(11) NOT NULL,
  `objets_empruntes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compteur`
--

INSERT INTO `compteur` (`id`, `objets_pretes`, `objets_empruntes`) VALUES
(1, 1, 0),
(2, 0, 0),
(3, 0, 1),
(4, 0, 0),
(5, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `login`, `password`) VALUES
(1, 'ZZZZZ', 'dac'),
(2, 'samhrrl', 'samsam'),
(3, 'aa', 'aaa'),
(4, 'ss', 'azerty'),
(5, 'armitude123', 'azertyuiop');

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

CREATE TABLE `coordonnees` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coordonnees`
--

INSERT INTO `coordonnees` (`id`, `nom`, `prenom`, `adresse`, `telephone`, `mail`) VALUES
(1, 'hrl', 'sam', '12 rue OK', '01000999', 'aa'),
(2, 'Hraouli', 'Samir', '75 rue des heurteaux', '0782546018', 'hraouli13@gmail.com'),
(3, 'AA', 'BB', 'CC', 'DD', 'EE'),
(4, 'ss', 'ss', '75 rue des heurteaux', '0782546018', 'hraouli13@gmail.com'),
(5, 'hrrl', 'sam', '12 rue Carnot', '0678125645', 'shraouli@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

CREATE TABLE `objets` (
  `id` int(11) NOT NULL,
  `nom_objet` varchar(50) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objets`
--

INSERT INTO `objets` (`id`, `nom_objet`, `id_categorie`, `description`) VALUES
(1, 'tondeuse à gazon', 1, 'très efficace pour l\'été quand la pelouse pousse...'),
(1, 'rateau', 1, 'pour éliminer l\'herbe'),
(1, 'machette', 2, 'détruit les murs, très utilisé pour les rénovations'),
(1, 'brouette', 1, 'transporte la terre'),
(1, 'micro onde', 3, 'Je prête un micro onde pour faire chauffer vos plats'),
(1, 'arrosoir', 1, 'Je prête mon arrosoir de jardin pour arroser des plantes'),
(1, '.rr.', 1, '.r.'),
(1, '.rr.', 1, '.r.'),
(1, '.TITRE.', 1, '.dES.'),
(1, '.jardin.', 1, '.paris.'),
(1, '.jardin.', 1, '.paris.'),
(1, '.jardin.', 1, '.paris.'),
(1, '.jardin.', 1, '.paris.'),
(1, '.jardin.', 1, '.paris.'),
(1, '.jardin.', 1, '.paris.'),
(1, '.jardin.', 1, '.paris.'),
(1, '.jardin.', 1, '.paris.'),
(1, '.jardin.', 1, '.paris.'),
(1, '.sceau.', 1, '.un beau sceau.'),
(1, '.lave vaisselle.', 3, '.fourni sans savon.'),
(1, '.ss.', 3, '.ss.'),
(1, '.ss.', 3, '.ss.'),
(1, '.ss.', 3, '.ss.'),
(1, '.ss.', 3, '.ss.'),
(1, '.ZZ.', 2, '.ZZ.'),
(1, '..', 1, '..');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `compteur`
--
ALTER TABLE `compteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `compteur`
--
ALTER TABLE `compteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
