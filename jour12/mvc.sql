-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 12 fév. 2025 à 08:55
-- Version du serveur : 10.3.39-MariaDB-0ubuntu0.20.04.2
-- Version de PHP : 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `duree` tinyint(4) NOT NULL,
  `unite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `nom`, `duree`, `unite`) VALUES
(1, 'créer un site internet en PHP', 2, 'mois'),
(2, 'blog sur le jardinage', 1, 'mois'),
(3, 'nouveau projet en informatique', 4, 'ans');

-- --------------------------------------------------------

--
-- Structure de la table `projets_technos`
--

CREATE TABLE `projets_technos` (
  `projet_id` int(11) NOT NULL,
  `techno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projets_technos`
--

INSERT INTO `projets_technos` (`projet_id`, `techno_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 1),
(2, 3),
(3, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `technos`
--

CREATE TABLE `technos` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `technos`
--

INSERT INTO `technos` (`id`, `nom`) VALUES
(1, 'PHP'),
(2, 'JS'),
(3, 'HTML'),
(4, 'React'),
(5, 'Nodejs');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'redacteur',
  `dt_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `dt_creation`) VALUES
(1, 'toto@yahoo.fr', '', 'redacteur', '2025-02-11 11:05:30'),
(2, 'titi@yahoo.fr', '$2y$10$jHzfzKJkFKdNvy9G1IAW/OYj4Rh7S15I.5VfTpKETZ.U8d9vZq6BC', 'redacteur', '2025-02-11 11:27:06'),
(3, 'toutou@yahoo.fr', '$2y$10$1RZyR.MsiLbuqwHbZT/24O.2WY5LSUbwZ0VTij9VUNyE2mJABRK5y', 'redacteur', '2025-02-11 11:38:38'),
(4, 'm@yahoo.fr', '$2y$10$pPeP6RdZDZx0CRZj39Wi.udXzqoQu6QBZ5cwqJNUImSitOyTqSiyu', 'redacteur', '2025-02-12 08:29:20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projets_technos`
--
ALTER TABLE `projets_technos`
  ADD KEY `projet_id` (`projet_id`),
  ADD KEY `techno_id` (`techno_id`);

--
-- Index pour la table `technos`
--
ALTER TABLE `technos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `technos`
--
ALTER TABLE `technos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projets_technos`
--
ALTER TABLE `projets_technos`
  ADD CONSTRAINT `projets_technos_ibfk_1` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `projets_technos_ibfk_2` FOREIGN KEY (`techno_id`) REFERENCES `technos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
