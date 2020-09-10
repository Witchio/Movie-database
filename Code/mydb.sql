-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 17 juil. 2020 à 07:01
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `movieProject`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Science-fiction'),
(2, 'action'),
(3, 'Romance'),
(4, 'Thriller'),
(5, 'Drama');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `release_date` date NOT NULL,
  `synopsis` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `poster` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `release_date`, `synopsis`, `category_id`, `poster`) VALUES
(1, 'Inception', '2010-07-08', 'Inception is a mind-breaking science-fiction movie', 1, 'posters/Inception.jpg'),
(3, 'Avatar', '2009-12-10', 'On the lush alien world of Pandora live the ', 2, 'posters/Avatar.jpg'),
(9, 'Jurassic Park', '1993-06-09', 'A pragmatic paleontologist visiting an almost complete theme park is tasked with protecting a couple of kids after a power failure causes the park\'s cloned dinosaurs to run loose.', 1, 'posters/JurassicPark.jpg'),
(12, 'Transformers', '2007-06-12', 'The fate of humanity is at stake when two races of robots, the good Autobots and the villainous Decepticons, bring their war to Earth. The robots have the ability to change into different mechanical objects as they seek the key to ultimate power. Only a human youth, Sam Witwicky (Shia LaBeouf) can save the world from total destruction.', 1, 'posters/transformers.jpg'),
(13, 'Interstellar', '2014-10-26', 'Set in a dystopian future where humanity is struggling to survive, the film follows a group of astronauts who travel through a wormhole near Saturn in search of a new home for humanity. Brothers Christopher and Jonathan Nolan wrote the screenplay, which had its origins in a script Jonathan developed in 2007.', 1, 'posters/Interstellar.jpg'),
(14, 'Titanic', '1997-11-18', 'Titanic tells the fictional story of two class-crossed lovers who meet aboard the disaster-bound ship, fall in love, and then struggle to survive the grizzly sinking all within the context of a true-to-detail retelling of the actual disaster.', 5, 'posters/Titanic.jpg'),
(15, 'Sixth Sens', '1999-08-02', 'Young Cole Sear (Haley Joel Osment) is haunted by a dark secret: he is visited by ghosts. Cole is frightened by visitations from those with unresolved problems who appear from the shadows. He is too afraid to tell anyone about his anguish, except child psychologist Dr. Malcolm Crowe (Bruce Willis). As Dr. Crowe tries to uncover the truth about Cole\'s supernatural abilities, the consequences for client and therapist are a jolt that awakens them both to something unexplainable.', 4, 'posters/sixthSense.jpg'),
(16, 'La La Land', '2016-08-31', 'While navigating their careers in Los Angeles, a pianist and an actress fall in love while attempting to reconcile their aspirations for the future. Aspiring actress serves lattes to movie stars in between auditions and jazz musician Sebastian scrapes by playing cocktail-party gigs in dingy bars.', 3, 'posters/laLaLand.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE `playlist` (
  `playlist_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `playlist`
--

INSERT INTO `playlist` (`playlist_id`, `movie_id`) VALUES
(1, 1),
(1, 3),
(1, 1),
(1, 3),
(1, 1),
(1, 3),
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `date`, `user_id`) VALUES
(1, 'Playlist1', '2020-07-15', 1),
(14, 'rock', '2020-07-16', 1),
(16, 'metal', '2020-07-16', 1),
(17, 'rock', '2020-07-16', 1),
(20, 'test', '2020-07-16', 5),
(21, 'yeeee', '2020-07-16', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Mitchio', 'WEBER', 'webermitchio@hotmail.com', '$2y$10$CWtoj05M58N4DkGVycOG2.DakxSiRM0I46z.4YZOmyWCaxI9L0ywy'),
(5, 'Tom', 'Hanks', 't.hanks@gmail.com', '$2y$10$19odudprMzdeR5vk3NVCz.nXIfXeDPx/AXEZzdsx2sefZLQB2rl3C'),
(6, 'tom', 'cruise', 'tom.cruise@gmail.com', '$2y$10$dYk5dJoIV38F4f7BGKjEp.lZlIjfb6wVyLzZumLC2051x4tDM1RM2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `playlist_ibfk_2` (`movie_id`);

--
-- Index pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`),
  ADD CONSTRAINT `playlist_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Contraintes pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
