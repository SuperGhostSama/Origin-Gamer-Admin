-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 22 nov. 2022 à 15:42
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `origingamer`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Graphic Card'),
(2, 'Processor'),
(3, 'Power Suply\r\n'),
(4, 'HDD Storage '),
(5, 'SSD Storage '),
(6, 'Cooler'),
(7, 'Case '),
(8, 'Mother Board');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `description`, `picture`, `user_id`, `category_id`) VALUES
(17, 'Cooler Master MasterLiquid ML240L V2 ARGB', 331, 492, 'Laborum Hic iste vo', '637c9a7e028f00.03863668Cooler Master MasterLiquid ML240L V2 ARGB.jpg', 10, 6),
(18, 'RTX 3070', 6000, 95, 'Ex temporibus molest', '637c9b1bd68a58.49359766RTX 3070.jpg', 11, 1),
(19, 'Raymond Barrera', 333, 527, 'Tempore sint magni ', '637c8046265ef7.63218000', 11, 6),
(20, 'Gigabyte Aorus C700 Glass', 4490, 208, 'Consequatur ut pari', '637c9a45ed95b6.18665690Gigabyte Aorus C700 Glass.jpg', 11, 7),
(21, 'Aristotle Bishop', 792, 327, 'Aliquam unde quo vel', '637c97eac4c6c6.27146473', 11, 6),
(22, 'Intel Core I5 10400', 72, 530, 'Sequi atque eos ab ', '637c9a938caeb5.66393479Intel Core I5 10400.jpg', 11, 2),
(23, 'Razer Tomahawk A1 Mid Tower', 3333, 365, 'Ullam in ut totam mo', '637c9a63152406.43110389Razer Tomahawk A1 Mid Tower.jpg', 11, 7),
(24, 'Giacomo Forbes', 201, 96, 'Sapiente beatae quo ', '637c97f9aa0eb1.22198692', 11, 6),
(25, 'SAMSUNG 980 PRO NVM GEN4 1000GB', 999, 638, 'Placeat quia explic', '637c9ae1642ad3.15027050SAMSUNG 980 PRO NVM GEN4 1000GB.jpg', 11, 5),
(26, 'Alimentations Corsair RM1000x 1000W', 665, 574, 'Porro eiusmod dolore', '637c9ac9624b84.51118870Alimentations Corsair RM1000x 1000W.jpg', 11, 3),
(27, 'Gigabyte Z690 UD DDR4', 678, 486, 'Voluptas magni volup', '637c9ab184d9c3.91766119Gigabyte Z690 UD DDR4.jpg', 11, 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'salah', '$2y$10$SS1npTn7QdL/mlfnRBzhg.0vtA2rGCrhu2H4PPfELtpMXzzsqGzhO', '2022-11-21 15:22:50'),
(7, 'test123', '$2y$10$SD.4qMuPmV6021qzM8WzueE0q025vk.kA8xHzRmh7/nFkJ0zIFad2', '2022-11-21 17:05:06'),
(8, 'You123', '$2y$10$HJuGtUf9SvQlor3r3eQvGeBSW4DdPHCJz76Izi5aG90PpbnGQzzuy', '2022-11-21 17:06:44'),
(9, 'Hamza123', '$2y$10$2B7.AqoKAdI6xCw24/spienY26vE5G2x7xb.FTXpuu7rYHfDBmuIC', '2022-11-21 17:20:01'),
(10, 'ZOO123', '$2y$10$pECCijr5DeAHuqpLxUGzr.Ed9DlXftAkfLfxd3fnQ/rOq/IaqC2We', '2022-11-21 20:20:11'),
(11, 'hhhhhh', '$2y$10$WNWgj8SKV63IEAPok.1mYu7bOpTrbGTI1blqzkUVMNem6hqgdb/b.', '2022-11-21 21:10:04'),
(12, 'salma', '$2y$10$.AsJu.ul5V55Q.Ib/n0yJ.rf8zbC1D0/Nuxdr97JPukB44DgDfwRC', '2022-11-22 15:35:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
