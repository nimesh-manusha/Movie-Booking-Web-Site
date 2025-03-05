-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 10:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savoy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `movie_id`, `name`, `email`, `seats`, `total`) VALUES
(1, 6, 'fsaefre', NULL, 12, 0),
(2, 3, 'pp', NULL, 2, 0),
(3, 3, 'pp', NULL, 2, 0),
(4, 3, 'pp', NULL, 2, 0),
(5, 1, 'arrtgfdcxd', NULL, 17, 0),
(6, 3, 'dgdfgsdf', NULL, 12, 18000),
(7, 1, 'fgdsg', NULL, 12, 18000),
(8, 1, 'fgdsg', NULL, 12, 18000),
(9, 1, 'fgdsg', NULL, 12, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `release_date` date NOT NULL,
  `description` text NOT NULL,
  `available_seats` int(11) DEFAULT 100,
  `mvtle` varchar(200) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `image`, `rating`, `release_date`, `description`, `available_seats`, `mvtle`, `price`) VALUES
(1, 'KINGDOM OF THE PLANET OF THE APES', './assets/images/ph/n1.jpg', 4.5, '2024-05-20', 'A new chapter of the Apes saga, focusing on a future where apes and humans collide.', 47, 'https://www.youtube.com/watch?v=V0VJ0CXB31U', 1500),
(2, 'INSIDE OUT 2', './assets/images/ph/n2.jpg', 4, '2024-06-12', 'The sequel to Inside Out, delving deeper into the emotional world of Riley as she grows up.', 100, '', 1500),
(3, 'UNDER PARIS', './assets/images/ph/n3.jpg', 4.7, '2024-08-05', 'A gripping mystery set beneath the streets of Paris in the underground catacombs.', 82, '', 1500),
(4, 'GODZILLA X KONG: THE NEW EMPIRE', './assets/images/ph/n4.jpg', 4.8, '2024-07-15', 'Godzilla and Kong face off again in a battle for supremacy as a new enemy emerges.', 100, '', 1500),
(5, 'IF', './assets/images/ph/n5.jpg', 4.3, '2024-04-30', 'An imaginative exploration of life, dreams, and the meaning of existence.', 100, '', 1500),
(6, 'CIVIL WAR', './assets/images/ph/n6.jpg', 4.2, '2024-03-10', 'A tense political thriller set during a civil war where allegiances and loyalties are tested.', 88, '', 1500),
(7, 'THE ROUNDUP: NO WAY OUT', './assets/images/ph/n7.jpg', 4.6, '2024-09-02', 'A crime drama about a detective facing his toughest case yet in the bustling streets of the city.', 100, '', 1500),
(8, 'ULTRAMAN: RISING', './assets/images/ph/n8.jpg', 4.4, '2024-11-05', 'The iconic Japanese superhero Ultraman returns to face new enemies and save the world.', 100, '', 1500),
(9, 'THE LAST KUMITE', './assets/images/ph/n9.jpg', 4.1, '2024-02-20', 'An epic martial arts tournament where warriors fight for honor and glory.', 100, '', 1500),
(10, 'THE WATCHERS', './assets/images/ph/n10.jpg', 4, '2024-01-18', 'A sci-fi thriller where mysterious beings observe humanity from afar, influencing their fate.', 100, '', 1500),
(11, 'ATLAS', './assets/images/ph/n11.jpg', 4.5, '2024-05-23', 'A brilliant counterterrorism analyst with a deep distrust of AI discovers it might be her only hope when a mission to capture a renegade robot goes awry.', 100, '', 1500),
(12, 'ALIENOID: RETURN TO THE FUTURE', './assets/images/ph/n12.jpg', 4.7, '2024-06-15', 'A sci-fi adventure where humanity must confront alien invaders from the future to save the planet.', 100, '', 1500),
(13, 'dsfassdf', 'dsfsdf22', 111, '2024-09-18', 'fsdfsadfsdfsdf', 122, 'sdfadsfasdf', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` varchar(10) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `roll`) VALUES
(1, 'admin@gmail.com', '1213', 'a', 'admin'),
(2, 'adqmin@gmail.com', '1233', 'a', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
