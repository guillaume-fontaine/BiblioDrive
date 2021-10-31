-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 31 oct. 2021 à 11:40
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliodrive`
--
CREATE DATABASE IF NOT EXISTS `bibliodrive` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bibliodrive`;
-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `noauteur` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`noauteur`, `nom`, `prenom`) VALUES
(1, 'JK', 'Rowling'),
(2, 'Le Bon', 'Gustave'),
(3, 'Hergé', '');

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE `emprunter` (
  `mel` varchar(40) NOT NULL,
  `nolivre` int(11) NOT NULL,
  `dateemprunt` date NOT NULL,
  `dateretour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `nolivre` int(11) NOT NULL,
  `noauteur` int(11) NOT NULL,
  `titre` varchar(128) NOT NULL,
  `isbn13` char(13) NOT NULL,
  `anneeparution` int(11) NOT NULL,
  `resume` text NOT NULL,
  `dateajout` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`nolivre`, `noauteur`, `titre`, `isbn13`, `anneeparution`, `resume`, `dateajout`, `image`) VALUES
(1, 1, 'Harry Potter à l\'école des sorciers', '2070584623', 2017, 'Ceci est un résumé.', '2020-12-23', 'Harry-Potter-a-l-ecole-des-sorciers.jpg'),
(2, 3, 'On a marché sur la lune', '9782203001169', 1930, 'Suite d\'Objectif Lune, nous retrouvons dans cet album nos héros à bord de la première fusée lunaire. Mais le vol est loin d\'être de tout repos : outre la présence involontaire des Dupondt (ce qui limite sérieusement les réserves d\'oxygène), des saboteurs sont également à bord. La fusée sera-t-elle de retour sur Terre à temps ? ', '2020-12-24', 'On-a-marche-sur-la-lune.jpeg'),
(3, 3, 'Tintin au Tibet', '9782203001190', 1930, 'Un avion de ligne à bord duquel le jeune Chinois Tchang se rendait en Europe s’est écrasé dans l’Himalaya. Tintin au Tibet (1960), pure histoire d’amitié, sans le moindre méchant, décrit la recherche désespérée à laquelle Tintin se livre pour retrouver son ami. Ce récit pathétique, qui rompt avec le ton extraverti des épisodes précédents, démontre que la fidélité et l’espoir sont capables de vaincre tous les obstacles, et que les préjugés - en l’occurrence, à l’égard de l’\"abominable homme des neiges\" - sont bien souvent le fruit de l’ignorance.', '2020-12-24', 'tintin-au-tibet.jpg'),
(4, 3, 'Tintin et les Picaros', '9782203001237', 1930, 'Nous retrouvons ici Tintin au San Theodoros, pays de L\'oreille cassée. La Castafiore, les Dupondt, Tournesol et Haddock ayant été arrêtés par le Général Tapioca, Tintin vole à leur secours. Réussissant à fuir avec Tournesol et Haddock, il aidera également Alcazar dans sa révolution. ', '2021-01-01', 'tintin-et-les-picaros.jpg'),
(5, 2, 'Psychologie des foules', '978-213054297', 1895, '« Les véritables bouleversements historiques ne sont pas ceux qui nous étonnent par leur grandeur et leur violence. Les seuls changements importants, ceux d\'où le renouvellement des civilisations découle, s\'opèrent dans les opinions, les conceptions et les croyances...\r\nL\'époque actuelle constitue un des moments critiques où la pensée humaine est en voie de transformation...\r\nLa connaissance de la psychologie des foules constitue la ressource de l\'homme d\'État, qui veut, non pas les gouverner - la chose est devenue aujourd\'hui bien difficile - mais tout au moins ne pas être trop complètement gouverné par elles. »\r\n\r\nLes idées exposée dans cet ouvrage, publié pour la première fois en 1895, semblèrent alors fort paradoxales. Pourtant, ce texte qui n\'a en rien été modifié dans les éditions successives, est devenu un classique, traduit dans de nombreuses langues. Sa lecture et son étude sont toujours d\'actualité et font partie de la formation de toutes les nouvelles générations de jeunes sociologues. ', '2021-01-04', 'psychologie-des-foules.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `mel` varchar(40) NOT NULL,
  `motdepasse` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(40) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `profil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`mel`, `motdepasse`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`, `profil`) VALUES
('capitaine.haddock@gmail.bzh', 'ouicapitaine', 'Haddock', 'Capitaine', 'rue du scorbut', 'ville', 666, 'Administrateur'),
('randomail@random.com', 'random', 'random', 'randint', '2 rue rand', 'RandomOrg', 4608, 'Client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`noauteur`);

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD PRIMARY KEY (`mel`,`nolivre`,`dateemprunt`),
  ADD KEY `fk_emprunter_livre` (`nolivre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`nolivre`),
  ADD KEY `fk_livre_auteur` (`noauteur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`mel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `noauteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `nolivre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `fk_emprunter_livre` FOREIGN KEY (`nolivre`) REFERENCES `livre` (`nolivre`),
  ADD CONSTRAINT `fk_emprunter_utilisateur` FOREIGN KEY (`mel`) REFERENCES `utilisateur` (`mel`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `fk_livre_auteur` FOREIGN KEY (`noauteur`) REFERENCES `auteur` (`noauteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
