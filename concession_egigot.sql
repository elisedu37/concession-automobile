-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 24 Décembre 2020 à 13:50
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `concession_egigot`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id_personne` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `date` date NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `achat`
--

INSERT INTO `achat` (`id_personne`, `id_vehicule`, `date`, `prix`) VALUES
(1, 5, '2020-08-25', 249500),
(4, 1, '2020-09-15', 51000),
(5, 2, '2020-03-02', 2960000),
(8, 4, '2022-01-20', 150252),
(9, 3, '2021-02-04', 322800);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`) VALUES
(1, 'gigot', 'elise'),
(2, 'butin', 'marie'),
(3, 'fanguin', 'solene'),
(4, 'hamdi', 'mariem'),
(5, 'garel', 'bastien'),
(6, 'camacho', 'lea'),
(7, 'provot', 'lea'),
(8, 'schneider', 'valerie'),
(9, 'gigot', 'gerald'),
(10, 'gigot', 'florian\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id` int(11) NOT NULL,
  `immatriculation` text NOT NULL,
  `marque` text NOT NULL,
  `modele` text NOT NULL,
  `puissance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `immatriculation`, `marque`, `modele`, `puissance`) VALUES
(1, 'AB-123-CD', 'rang rover', 'discovery', 300),
(2, 'AA-000-AA', 'Aston Martin', 'One-77', 750),
(3, 'FA-235-FB', 'Rolls-Royce', 'White Ghost Limited', 638),
(4, 'AB-344-CA', 'Aston Martin', 'V8 Vantage', 375),
(5, 'PL-123-AK', 'Wiesmann ', 'Roadster MF5', 555);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id_personne`,`id_vehicule`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `achat_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `achat_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
