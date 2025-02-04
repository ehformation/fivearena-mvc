-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 04 fév. 2025 à 09:17
-- Version du serveur : 8.0.40
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fivearena`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int NOT NULL,
  `dateheure` datetime NOT NULL,
  `status` enum('en attente','confirmé','annulé','en cours','terminé') NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_terrain` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `dateheure`, `status`, `id_user`, `id_terrain`) VALUES
(2, '2024-09-10 15:00:00', 'en attente', 1, 1),
(10, '2025-01-08 17:49:00', 'confirmé', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

CREATE TABLE `terrain` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `adresse` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `surface` enum('pelouse','beton','sable','synthetique') NOT NULL,
  `options` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `terrain`
--

INSERT INTO `terrain` (`id`, `nom`, `prix`, `adresse`, `description`, `image`, `surface`, `options`) VALUES
(1, 'Stade des Champions', '150', '123 Rue du Stade, 75000 Paris', 'Terrain de football en pelouse naturelle avec vestiaires et tribunes.', 'stade_des_champions.jpg', 'pelouse', 'Vestiaires, Parking'),
(2, 'Complexe Sportif du Parc', '200', '456 Avenue des Sports, 75001 Paris', 'Grand terrain de football avec surface synthétique et équipements modernes.', 'complexe_sportif_du_parc.jpg', 'synthetique', 'Camera, Vestiaires, Tribunes'),
(3, 'Terrains Légende', '145', '123 rue du jardin', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro id natus officia veniam totam, iste facere voluptas nihil perferendis pariatur obcaecati sunt numquam tempore harum. Similique deleniti velit unde ipsa.', 'terrain.png', 'sable', 'Vestiaires, Parking');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `nom`, `prenom`, `tel`, `id_role`) VALUES
(1, 'jane.doe@gmail.com', '1234', 'Doe', 'Jane', '0987654321', 2),
(2, 'admin@fivearena.fr', '$2y$10$XzS.3xGagt3OZhUDKfVvgOrz9YAIherdgpd8jXg1bd9pUj6RqNpl6', 'Admin', 'elie', '0998877636', 1),
(3, 'john.doe@example.com', '1234', 'Doe', 'John', '0123456789', 2),
(4, 'aaa@aaa.fr', '$2y$10$IqL2.s4wf87lr7MFXOC/jeB2jmqp9YJXBbqTDam3JTMe80cfIiz..', 'Richard', 'Durant', '0908764653', 2),
(5, 'bbb@free.fr', '$2y$10$/rbc5UWm5d8NUzpFrD5qW.IqNuMNYHR6j.ePbcuIZOTqXueVbIfoO', 'PETIT', 'Roger', '0654553621', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_terrain` (`id_terrain`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `terrain`
--
ALTER TABLE `terrain`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `terrain_reservation_id` FOREIGN KEY (`id_terrain`) REFERENCES `terrain` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_reservation_id` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
