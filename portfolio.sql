-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 12 月 21 日 05:38
-- サーバのバージョン： 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Musical'),
(3, 'Adventure'),
(4, 'Family'),
(6, 'Fantasy'),
(7, 'Drama'),
(8, 'Suspense'),
(10, 'Animation'),
(12, 'Action'),
(13, 'Science-Fiction'),
(14, 'Biography'),
(15, 'Horror'),
(17, 'Comedy'),
(18, 'Thriller');

-- --------------------------------------------------------

--
-- テーブルの構造 `cinemas`
--

CREATE TABLE `cinemas` (
  `cinema_id` int(11) NOT NULL,
  `cinema_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `cinemas`
--

INSERT INTO `cinemas` (`cinema_id`, `cinema_name`) VALUES
(3, 'Ayala Center Cebu'),
(4, 'SM CEBU CITY'),
(5, 'SM CITY CONSOLATION'),
(6, 'SM SEASIDE'),
(7, 'Gaisano Country Mall '),
(8, 'Robinsons Galleria');

-- --------------------------------------------------------

--
-- テーブルの構造 `moviecate`
--

CREATE TABLE `moviecate` (
  `moca_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `moviecate`
--

INSERT INTO `moviecate` (`moca_id`, `movie_id`, `category_id`) VALUES
(1, 6, 6),
(2, 6, 12),
(3, 6, 13),
(4, 7, 3),
(5, 7, 10),
(6, 7, 17),
(7, 11, 3),
(8, 11, 10),
(9, 11, 12),
(10, 12, 3),
(11, 12, 12),
(12, 12, 13),
(13, 68, 7),
(14, 69, 7);

-- --------------------------------------------------------

--
-- テーブルの構造 `moviecinema`
--

CREATE TABLE `moviecinema` (
  `moci_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `mc_quantity` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `moviecinema`
--

INSERT INTO `moviecinema` (`moci_id`, `movie_id`, `cinema_id`, `price`, `mc_quantity`, `start_date`, `end_date`, `status`) VALUES
(11, 6, 7, 240, 100, '2018-12-05', '2019-01-12', 'playing'),
(12, 6, 4, 240, 226, '2018-12-05', '2019-01-12', 'playing'),
(13, 7, 3, 240, 197, '2018-11-21', '2018-12-29', 'playing'),
(14, 7, 4, 240, 246, '2018-11-21', '2018-12-29', 'playing'),
(15, 11, 3, 240, 100, '2018-12-12', '2019-01-19', 'playing'),
(16, 11, 4, 230, 95, '2018-12-12', '2019-01-19', 'playing'),
(17, 11, 5, 230, 100, '2018-12-12', '2019-01-19', 'playing'),
(18, 11, 8, 230, 100, '2018-12-12', '2019-01-19', 'playing'),
(19, 11, 7, 230, 100, '2018-12-12', '2019-01-19', 'playing'),
(20, 12, 3, 240, 150, '2018-12-12', '2019-01-19', 'playing'),
(21, 12, 4, 240, 148, '2018-12-12', '2019-01-19', 'playing'),
(22, 12, 5, 240, 150, '2018-12-12', '2019-01-19', 'playing'),
(23, 12, 7, 240, 150, '2018-12-12', '2019-01-19', 'playing'),
(24, 12, 8, 240, 150, '2018-12-12', '2019-01-19', 'playing'),
(25, 68, 4, 240, 97, '2018-12-12', '2019-01-19', 'playing'),
(26, 69, 4, 240, 100, '2018-11-28', '2019-01-05', 'playing'),
(28, 71, 4, 220, 100, '0000-00-00', '0000-00-00', ''),
(29, 71, 5, 220, 100, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(50) NOT NULL,
  `directory` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `directory`) VALUES
(6, 'Mortal Engines', 'upload/mortalengines.jpg'),
(7, 'Ralph Breaks the Internet : Wreck - it Ralph 2', 'upload/ralph.jpeg'),
(11, 'SPIDER-MAN in to the Spider-Verse', 'upload/spider-man.jpg'),
(12, 'AQUAMAN', 'upload/aqaman.jpg'),
(68, 'BEN IS BACK', 'upload/ben.jpg'),
(69, 'Three words to forever', 'upload/three.jpg'),
(71, 'Pokemon The Movie', '/Applications/XAMPP/xamppfiles/temp/phpdNVHwk');

-- --------------------------------------------------------

--
-- テーブルの構造 `reservations`
--

CREATE TABLE `reservations` (
  `reserve_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `moci_id` int(11) NOT NULL,
  `reservestatus` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `schedule` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `reservations`
--

INSERT INTO `reservations` (`reserve_id`, `user_id`, `moci_id`, `reservestatus`, `quantity`, `total`, `schedule`) VALUES
(18, 6, 15, 'confirm', 4, 880, '2018-12-11'),
(19, 6, 16, 'confirm', 2, 440, '2018-12-24'),
(21, 2, 17, 'confirm', 3, 660, '2018-12-20'),
(22, 2, 12, 'confirm', 3, 720, '2018-12-14'),
(23, 8, 12, 'confirm', 2, 480, '2018-12-10'),
(32, 8, 21, 'confirm', 2, 480, '2018-12-19'),
(37, 8, 12, 'confirm', 1, 240, '2018-12-22'),
(38, 8, 16, 'confirm', 5, 1150, '2018-12-22'),
(39, 8, 25, 'pending', 3, 720, '2018-12-22');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `password`, `email`, `status`) VALUES
(1, 'Urara', 'Yasaki', 'ringo2121apple', 'urua.kurorua14@gmail.com', 'admin'),
(2, 'Mio', 'Shimabukuro', '827ccb0eea8a706c4c34a16891f84e7b', 'mio1215@gmail.com', 'user'),
(6, 'Mai', 'Tamashiro', '3d2172418ce305c7d16d4b05597c6a59', 'mai0216@gmail.com', 'user'),
(7, 'Nagisa', 'Ishida', 'b59c67bf196a4758191e42f76670ceba', 'nagisa1215@gmail.com', 'user'),
(8, 'Kanako', 'Taira', '222', 'kanako0413@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`cinema_id`);

--
-- Indexes for table `moviecate`
--
ALTER TABLE `moviecate`
  ADD PRIMARY KEY (`moca_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `moviecinema`
--
ALTER TABLE `moviecinema`
  ADD PRIMARY KEY (`moci_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `cinema_id` (`cinema_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `moci_id` (`moci_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `cinema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `moviecate`
--
ALTER TABLE `moviecate`
  MODIFY `moca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `moviecinema`
--
ALTER TABLE `moviecinema`
  MODIFY `moci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
