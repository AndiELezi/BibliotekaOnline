-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 06:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `birthplace` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `publication_year` date NOT NULL,
  `publish_house` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `reservation_points` int(11) NOT NULL,
  `cover_photo` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_id` varchar(30) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `book_id` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_reservation`
--

CREATE TABLE `book_reservation` (
  `user_id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `reservation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `returnTime` date NOT NULL,
  `delay_fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hall_booking`
--

CREATE TABLE `hall_booking` (
  `library_hall` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `library_halls`
--

CREATE TABLE `library_halls` (
  `id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `open_seats` int(11) NOT NULL,
  `librarian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_books`
--

CREATE TABLE `online_books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `publish_date` date NOT NULL,
  `likes` int(11) NOT NULL,
  `cover_photo` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publish_house`
--

CREATE TABLE `publish_house` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `time_review` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `library_hall_id` int(11) NOT NULL,
  `statusi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `points` int(11) NOT NULL,
  `user_rights` int(11) NOT NULL,
  `profile_photo` varchar(100) DEFAULT NULL,
  `activationStatus` tinyint(1) NOT NULL,
  `securityString` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `mobile`, `password`, `birthday`, `gender`, `points`, `user_rights`, `profile_photo`, `activationStatus`, `securityString`) VALUES
(6, 'Ardit', 'Kallaku', 'ak', 'kallaku.ardit@gmail.com', NULL, '$2y$10$XQw1sLNpJWKZUe7izRgqfeDkVwiDl0MZjxERY0lZFr82faqai1l7S', '1999-09-06', 'M', 0, 3, NULL, 1, 'om7nh8k5d4prxwbctl9sif630zjgvae1qu2y');

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `description`) VALUES
(1, 'Administrator'),
(2, 'Librarian'),
(3, 'Perdorues normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_publish_house` (`publish_house`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`book_id`,`author_id`),
  ADD KEY `fk_author_id` (`author_id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`book_id`,`category_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `book_reservation`
--
ALTER TABLE `book_reservation`
  ADD PRIMARY KEY (`user_id`,`book_id`),
  ADD KEY `fk_book_id_br` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall_booking`
--
ALTER TABLE `hall_booking`
  ADD PRIMARY KEY (`library_hall`,`user_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `library_halls`
--
ALTER TABLE `library_halls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_librarian_id` (`librarian_id`);

--
-- Indexes for table `online_books`
--
ALTER TABLE `online_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_on_id` (`user_id`),
  ADD KEY `fk_category_online_id` (`category_id`);

--
-- Indexes for table `publish_house`
--
ALTER TABLE `publish_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `fk_user_review_id` (`user_id`),
  ADD KEY `fk_book_review_id` (`id_book`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_library_hall_id` (`library_hall_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_rights` (`user_rights`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_halls`
--
ALTER TABLE `library_halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_books`
--
ALTER TABLE `online_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publish_house`
--
ALTER TABLE `publish_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_publish_house` FOREIGN KEY (`publish_house`) REFERENCES `publish_house` (`id`);

--
-- Constraints for table `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD CONSTRAINT `fk_book_ISBN` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `book_reservation`
--
ALTER TABLE `book_reservation`
  ADD CONSTRAINT `fk_book_id_br` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `fk_user_id_br` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hall_booking`
--
ALTER TABLE `hall_booking`
  ADD CONSTRAINT `fk_library_hall` FOREIGN KEY (`library_hall`) REFERENCES `library_halls` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `library_halls`
--
ALTER TABLE `library_halls`
  ADD CONSTRAINT `fk_librarian_id` FOREIGN KEY (`librarian_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `online_books`
--
ALTER TABLE `online_books`
  ADD CONSTRAINT `fk_category_online_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_user_on_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_book_review_id` FOREIGN KEY (`id_book`) REFERENCES `online_books` (`id`),
  ADD CONSTRAINT `fk_user_review_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `fk_library_hall_id` FOREIGN KEY (`library_hall_id`) REFERENCES `library_halls` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_rights` FOREIGN KEY (`user_rights`) REFERENCES `user_rights` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
