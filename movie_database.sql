-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2022 at 04:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_img` varchar(255) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `movie_genre` varchar(255) NOT NULL,
  `movie_duration` int(11) NOT NULL,
  `movie_release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_img`, `movie_title`, `movie_genre`, `movie_duration`, `movie_release_date`) VALUES
(1, 'images/movie-image1.jpeg', 'The Lost City', 'Action, Adventure, Comedy', 112, '2022-03-25'),
(2, 'images/movie-image2.jpeg', 'The Outfit', 'Crime, Drama, Mystery', 106, '2022-03-18'),
(3, 'images/movie-image3.jpeg', 'X', 'Horror', 106, '2022-03-18'),
(4, 'images/movie-image4.jpeg', 'The Batman', 'Action, Crime, Mystery, Superhero', 176, '2022-03-04'),
(5, 'images/movie-image5.jpeg', 'Sonic the Hedgehog 2', 'Animation, Action, Comedy', 112, '2022-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `movies_cs`
--

CREATE TABLE `movies_cs` (
  `movie_id` int(11) NOT NULL,
  `movie_img` varchar(255) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `movie_genre` varchar(255) NOT NULL,
  `movie_duration` int(11) NOT NULL,
  `movie_release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies_cs`
--

INSERT INTO `movies_cs` (`movie_id`, `movie_img`, `movie_title`, `movie_genre`, `movie_duration`, `movie_release_date`) VALUES
(1, 'images/movie-image6.jpeg', 'Men', 'Horror', 0, '2022-05-20'),
(2, 'images/movie-image7.jpeg', 'Top Gun: Maverick', 'Action, Drama', 0, '2022-05-27'),
(3, 'images/movie-image8.jpeg', 'Jurassic World: Dominion', 'Action, Adventure, Science Fiction', 0, '2022-06-10'),
(4, 'images/movie-image9.jpeg', 'Lightyear', 'Animation, Adventure, Action, Science Fiction', 0, '2022-06-17'),
(5, 'images/movie-image10.webp', 'Doctor Strange in the Multiverse of Madness', 'Action, Adventure, Superhero', 126, '2022-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(1, 'kjm46384', 'kenyemays00@gmail.com', '4648856bd5e8770f3154ea1bdb0d5b6f', '2022-03-03 21:01:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `movies_cs`
--
ALTER TABLE `movies_cs`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies_cs`
--
ALTER TABLE `movies_cs`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
