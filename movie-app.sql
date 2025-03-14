-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 08:59 AM
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
-- Database: `movie-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite_movies`
--

CREATE TABLE `favorite_movies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` varchar(50) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `poster_url` varchar(255) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite_movies`
--

INSERT INTO `favorite_movies` (`id`, `user_id`, `movie_id`, `movie_title`, `poster_url`, `added_at`) VALUES
(2, 1, 'tt31702438', 'Hello Mummy', 'https://m.media-amazon.com/images/M/MV5BZDE2MmMzZmEtNTVmOC00ZjZjLWIzNDYtMjE0ZTg0MTdhN2RjXkEyXkFqcGc@._V1_SX300.jpg', '2025-03-14 06:55:06'),
(3, 1, 'tt28069807', 'Disney Jr.\'s Ariel', 'https://m.media-amazon.com/images/M/MV5BZWM4OGJkYzMtNjBlMC00NzcwLTkxN2YtNzlkMzQ4MTUyOGQ5XkEyXkFqcGc@._V1_SX300.jpg', '2025-03-14 06:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Ashmi Anees', 'ashmianees12@gmail.com', '$2y$10$pFqz1ghW7fTnOkIJqK9Vaeyu/ajkJioYAUvE5X3f4RTqI/TihVO1i', '2025-03-14 05:45:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorite_movies`
--
ALTER TABLE `favorite_movies`
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
-- AUTO_INCREMENT for table `favorite_movies`
--
ALTER TABLE `favorite_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
