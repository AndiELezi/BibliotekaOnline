-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 12:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `full_name` varchar(50) NOT NULL,
  `birthplace` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `full_name`, `birthplace`, `birthday`, `contact`) VALUES
(28, 'Sebastian Junger', 'America', '1962-01-17', 'unknown'),
(29, 'Brian Harbert', 'America', '1947-06-29', 'unknown'),
(30, 'Kevin J.Anderson', 'America', '0000-00-00', ' 35556255451'),
(31, 'Suzane Collins', 'America', '1899-01-06', 'unknown'),
(32, 'Veronica Roth', 'America', '1925-01-06', 'veronica@gmail.com'),
(33, 'Stephenie Mayer', 'America', '1988-12-06', 'unknown'),
(34, 'Thomas Reye', 'England', '1998-10-01', ' 35566854'),
(35, 'Nicholas Sparks', 'France', '1700-12-06', 'unknown'),
(36, 'Dudley Pope', 'Americ', '1789-12-06', 'unknown'),
(37, 'Robert Alia', 'England', '1800-10-07', 'unknown'),
(38, 'Hammond Innes', 'Australia', '1757-12-06', ' 355684512'),
(39, 'Louise Erdrich', 'France', '1889-12-06', 'unknown'),
(40, 'Ursula K.Le Guin', 'England', '1887-11-06', 'unknown'),
(41, 'L.J.Smith', 'America', '1895-12-06', 'unknown'),
(42, 'Makato Shinkai', 'Japan', '1998-12-06', 'unknown'),
(43, 'George R.R. Martin', 'America', '1975-12-06', 'unknown'),
(44, 'Niven Larry', 'Germany', '1655-01-06', 'unknown');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(30) NOT NULL,
  `title` varchar(75) NOT NULL,
  `publication_year` date NOT NULL,
  `publish_house` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `reservation_points` int(11) NOT NULL,
  `cover_photo` varchar(150) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `monthly_likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `title`, `publication_year`, `publish_house`, `quantity`, `price`, `reservation_points`, `cover_photo`, `description`, `likes`, `monthly_likes`) VALUES
('9780007548293', 'Song Of Ice & Fire 5 Dance Dragons Pt 2', '2015-12-02', 22, 20, 15, 0, 'SongOfIceFire5DanceDragonsPt21590097114.jpg', 'The future of the Seven Kingdoms hangs in the balance.In King\'s Landing the Queen Regent, Cersei Lannister, awaits trial, abandoned by all those she trusted; while in the eastern city of Yunkai her brother Tyrion has been sold as a slave. From the Wall, having left his wife and the Red Priestess Melisandre under the protection of Jon Snow, Stannis Baratheon marches south to confront the Boltons at Winterfell. But beyond the Wall the wildling armies are massing for an assault...On all sides bitter conflicts are reigniting, played out by a grand cast of outlaws and priests, soldiers and skinchangers, nobles and slaves. The tides of destiny will inevitably lead to the greatest dance of all.', 0, 0),
('9780060515102', 'The Painted Drum', '2005-11-06', 8, 25, 12, 25, 'ThePaintedDrum1590093978.jpg', 'While appraising the estate of a New Hampshire family descended from a North Dakota Indian agent, Faye Travers is startled to discover a rare moose skin and cedar drum fashioned long ago by an Ojibwe artisan. And so begins an illuminating journey both backward and forward in time, following the strange passage of a powerful yet delicate instrument, and revealing the extraordinary lives it has touched and defined.', 0, 0),
('9780060742690', 'A Death in Belmont', '2007-02-01', 10, 26, 15, 0, 'ADeathinBelmont1590075314.jpg', 'The quiet suburb of Belmont, Massacuusetts, is in the grip of fear. The Boston Strangler murders have taken place nearby, and now there is another shocking sex crime, right in Belmont. The victim is Bessie Goldberg, a middle-aged woman who had hired a cleaning man to help out around the house on that fall day in 1963. He is a black man named Roy Smith. He did the appointed chores, collected his money and left a receipt on the kitchen table. Neighbors will say that he looked furtive when he walked down the street, that he was in a hurry, that he stopped to buy cigarettes, that he looked over his shoulder. They didn\'t see a black man in Belmont very often, so, of course, they noticed him. So the story went, and on these slender threads, and his own checkered history, Roy Smith is convicted of the Belmont murder and sent to prison.', 0, 0),
('9780061013515', 'The Perfect Storm: A True Story of Men Against the Sea', '2001-02-01', 8, 50, 4, 10, 'ThePerfectStormATrueStoryofMenAgainsttheSea1590074052.jpg', 'October 1991. It was \"the perfect storm\"--a tempest that may happen only once in a century--a nor\'easter created by so rare a combination of factors that it could not possibly have been worse. Creating waves ten stories high and winds of 120 miles an hour, the storm whipped the sea to inconceivable levels few people on Earth have ever witnessed. Few, except the six-man crew of the Andrea Gail, a commercial fishing boat tragically headed towards its hellish center.', 0, 0),
('9780062345219', 'Four: A Divergent Collection', '2015-01-05', 13, 3, 20, 0, 'FourADivergentCollection1590077852.jpg', 'Two years before Beatrice Prior made her choice, the sixteen-year-old son of Abnegation\'s faction leader did the same. Tobias\'s transfer to Dauntless is a chance to begin again. Here, he will not be called the name his parents gave him. Here, he will not let fear turn him into a cowering child.', 0, 0),
('9780316024969', 'New Moon (The Twilight Saga)', '2015-01-05', 14, 19, 12, 0, 'NewMoonTheTwilightSaga1590078296.jpg', 'For Bella Swan, there is one thing more important than life itself: Edward Cullen. But being in love with a vampire is even more dangerous than Bella could ever have imagined. Edward has already rescued Bella from the clutches of one evil vampire, but now, as their daring relationship threatens all that is near and dear to them, they realize their troubles may be just beginning.', 0, 0),
('9780316160209', 'Eclipse (Twilight)', '2017-01-05', 14, 20, 12, 20, 'EclipseTwilight1590078608.jpg', 'As Seattle is ravaged by a string of mysterious killings and a malicious vampire continues her quest for revenge, Bella once again finds herself surrounded by danger. In the midst of it all, she is forced to choose between her love for Edward and her friendship with Jacob-knowing that her decision has the potential to ignite the ageless struggle between vampire and werewolf.', 0, 0),
('9780316387842', 'The Chemist', '1888-03-05', 14, 20, 25, 50, 'TheChemist1590079060.jpg', 'She used to work for the U.S. government, but very few people ever knew that. An expert in her field, she was one of the darkest secrets of an agency so clandestine it doesn\'t even have a name. And when they decided she was a liability, they came for her without warning.', 0, 0),
('9780345240118', 'A Hole in Space', '1974-12-02', 23, 21, 15, 10, 'AHoleinSpace1590097740.jpg', '1974 story collection from Larry Niven. 1975 Locus Poll Award, Best Single Author Collection (Place: 2). Collects nine stories and one essay, including: Rammer, The Alibi Machine, The Last Days of the Permanent Floating Riot Club, A Kind of Murder, All the Bridges Rusting, There Is a Tide, Bigger Than Worlds (essay), $16,940.00, The Hole Man (winner, 1975 Hugo Award; 1975 Locus Poll Award, Best Short Story (Place: 2)), The Fourth Profession (nominated, 1972 Hugo Award).', 0, 0),
('9780393010466', 'Fire', '2001-02-01', 9, 20, 12, 0, 'Fire1590074639.jpg', 'The events explored in Fire focus on \"people confronting situations that could easily destroy them,\" and as he demonstrated in The Perfect Storm, Sebastian Junger is skilled at breaking such situations down to their core elements. In this exciting book, he reports on raging forest fires in the Western U.S, war zones in Kosovo and Afghanistan, the deadly diamond trade in Sierra Leone, the plight of travelers kidnapped by guerrillas in Kashmir, the last living whale harpooner on the Caribbean isla', 0, 0),
('9780394484662', 'The Golden Soak', '1954-11-06', 17, 20, 13, 20, 'TheGoldenSoak1590093491.jpg', 'From the author of TARGET ANTARCTICA and ISVIK, a story of a man who fakes his own death and starts out for a new life prospecting for gold in Australia, only to find that he is not the only person with an interest in the derelict Golden Soak mine', 0, 0),
('9780439023481', 'The Hunger Games', '2014-01-05', 12, 15, 20, 0, 'TheHungerGames1590077438.jpg', 'In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV.', 0, 0),
('9780553573404', 'A Game Of Thrones', '2010-12-02', 22, 20, 12, 0, 'AGameOfThrones1590096563.jpg', 'Winter is coming. Such is the stern motto of House Stark, the northernmost of the fiefdoms that owe allegiance to King Robert Baratheon in far-off King’s Landing. There Eddard Stark of Winterfell rules in Robert’s name. There his family dwells in peace and comfort: his proud wife, Catelyn; his sons Robb, Brandon, and Rickon; his daughters Sansa and Arya; and his bastard son, Jon Snow. Far to the north, behind the towering Wall, lie savage Wildings and worse—unnatural things relegated to myth during the centuries-long summer, but proving all too real and all too deadly in the turning of the season.', 0, 0),
('9780553573428', 'A Game Of Swords', '2014-12-02', 22, 20, 15, 0, 'AGameOfSwords1590096933.jpg', 'Here is the third volume in George R. R. Martin’s magnificent cycle of novels that includes A Game of Thrones and A Clash of Kings. As a whole, this series comprises a genuine masterpiece of modern fantasy, bringing together the best the genre has to offer. Magic, mystery, intrigue, romance, and adventure fill these pages and transport us to a world unlike any we have ever experienced. Already hailed as a classic, George R. R. Martin’s stunning series is destined to stand as one of the great achievements of imaginative fiction.', 0, 0),
('9780765322722', 'The winds of dune', '2009-01-05', 11, 15, 10, 0, 'TORBooks1590076345.jpg', 'With their usual skill, Brian Herbert and Kevin Anderson have taken ideas left behind by Frank Herbert and filled them with living characters and a true sense of wonder. Where Paul of Dune picked up the saga directly after the events of Dune, The Winds of Dune begins after the events of Dune Messiah.', 0, 0),
('9780935526912', 'Ramage & the Rebels (The Lord Ramage Novels)', '2000-01-01', 16, 50, 12, 40, 'RamagetheRebelsTheLordRamageNovels1590080840.jpg', 'A sinking British ship, her crew and passengers—men and women alike—ruthlessly murdered at the hands of a French privateer. This is the nightmare Ramage and the crew of the Calypso stumble upon while engaged in a sweep for freebooters in the waters off Jamaica. Supported by his men in a thirst for righteous vengeance, Ramage sets sail to bring the murderers to justice.', 0, 0),
('9781416509639', 'Earthsea: Tehanu', '2004-11-06', 18, 30, 12, 30, 'EarthseaTehanu1590094427.jpg', 'Years ago, they had escaped together from the sinister Tombs of Atuan—she, an isolated young priestess; he, a powerful wizard. Now she is a farmer\'s widow, having chosen for herself the simple pleasures of an ordinary life. And he is a broken old man, mourning the powers lost to him through no choice of his own.', 0, 0),
('9781416998402', 'The Night of the Solstice', '2010-11-06', 19, 10, 5, 20, 'TheNightoftheSolstice1590094805.jpg', 'When Claudia Hodges-Bradley meets a fox, she knows it will be an extraordinary day. Not just any fox, this vixen is the magical familiar of the sorceress Morgana Shee. For years Morgana has guarded the solitary gate between Earth and the Wildworld, a shimmering parallel universe where legends still live. She alone holds the secret of the mirrors that serve as the last passage to enchantment. But Morgana has been betrayed and imprisoned in Wildworld, and the fox is determined to recruit the Hodges-Bradley kids for the rescue mission.', 0, 0),
('9781455520633', 'The Longest Ride', '1898-03-05', 15, 20, 25, 25, 'TheLongestRide1590079780.jpg', 'From the dark days of WWII to present-day North Carolina, this New York Times bestseller shares the lives of two couples overcoming destructive secrets and finding joy together', 0, 0),
('9783770427062', 'Weathering With You', '2019-12-02', 21, 20, 10, 25, 'WeatheringWithYou1590096036.jpg', 'A high-school boy who has run away to Tokyo befriends a girl who appears to be able to manipulate the weather.', 1, 1),
('9788491462538', 'Your Name', '2015-12-02', 20, 19, 10, 25, 'YourName1590095585.jpg', 'Mitsuha, a high school girl living in a rural town deep in the mountains, has a dream that she is a boy living an unfamiliar life in Tokyo. Taki, a high school boy living in Tokyo, dreams that he is a girl living in the mountains. As they realize they are changing places, their encounter sets the cogs of fate into motion. Written by director Makoto Shinkai, the work has become a global phenomenon!', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_id` varchar(30) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
('9780007548293', 43),
('9780060515102', 39),
('9780060742690', 28),
('9780061013515', 28),
('9780062345219', 32),
('9780316024969', 33),
('9780316160209', 33),
('9780316387842', 33),
('9780316387842', 34),
('9780345240118', 44),
('9780393010466', 28),
('9780394484662', 38),
('9780439023481', 31),
('9780553573404', 43),
('9780553573428', 43),
('9780765322722', 29),
('9780765322722', 30),
('9780935526912', 36),
('9780935526912', 37),
('9781416509639', 40),
('9781416998402', 41),
('9781455520633', 35),
('9783770427062', 42),
('9788491462538', 42);

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `book_id` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`book_id`, `category_id`) VALUES
('9780007548293', 1),
('9780007548293', 4),
('9780007548293', 5),
('9780007548293', 6),
('9780060515102', 1),
('9780060515102', 2),
('9780060742690', 3),
('9780060742690', 5),
('9780061013515', 1),
('9780061013515', 3),
('9780061013515', 5),
('9780062345219', 1),
('9780062345219', 4),
('9780062345219', 6),
('9780316024969', 2),
('9780316160209', 2),
('9780316387842', 3),
('9780345240118', 5),
('9780393010466', 5),
('9780394484662', 1),
('9780394484662', 4),
('9780439023481', 1),
('9780439023481', 4),
('9780439023481', 5),
('9780439023481', 6),
('9780553573404', 1),
('9780553573404', 4),
('9780553573404', 5),
('9780553573404', 6),
('9780553573428', 1),
('9780553573428', 4),
('9780553573428', 5),
('9780553573428', 6),
('9780765322722', 1),
('9780765322722', 6),
('9780935526912', 1),
('9780935526912', 5),
('9781416509639', 1),
('9781416509639', 4),
('9781416509639', 6),
('9781416998402', 1),
('9781416998402', 6),
('9781416998402', 7),
('9781455520633', 2),
('9781455520633', 5),
('9783770427062', 1),
('9783770427062', 2),
('9783770427062', 4),
('9783770427062', 5),
('9783770427062', 6),
('9783770427062', 7),
('9788491462538', 1),
('9788491462538', 2),
('9788491462538', 4),
('9788491462538', 5),
('9788491462538', 6),
('9788491462538', 7);

-- --------------------------------------------------------

--
-- Table structure for table `book_favourite`
--

CREATE TABLE `book_favourite` (
  `id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favourite_time` date NOT NULL,
  `book_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_favourite`
--

INSERT INTO `book_favourite` (`id`, `book_id`, `user_id`, `favourite_time`, `book_type`) VALUES
(25, '9788491462538', 15, '2020-05-25', 'offlineBook'),
(26, '9783770427062', 15, '2020-05-25', 'offlineBook');

-- --------------------------------------------------------

--
-- Table structure for table `book_like`
--

CREATE TABLE `book_like` (
  `id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_time` date NOT NULL,
  `book_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_like`
--

INSERT INTO `book_like` (`id`, `book_id`, `user_id`, `like_time`, `book_type`) VALUES
(29, '9788491462538', 15, '2020-05-25', 'offlineBook'),
(30, '9783770427062', 15, '2020-05-25', 'offlineBook'),
(31, '9788491462538', 20, '2020-05-25', 'offlineBook'),
(32, '9788491462538', 19, '2020-05-25', 'offlineBook'),
(33, '9788491462538', 22, '2020-05-25', 'offlineBook'),
(34, '9788491462538', 21, '2020-05-25', 'offlineBook');

-- --------------------------------------------------------

--
-- Table structure for table `book_online_categories`
--

CREATE TABLE `book_online_categories` (
  `book_online_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_online_categories`
--

INSERT INTO `book_online_categories` (`book_online_id`, `category_id`) VALUES
(67, 1),
(68, 1),
(68, 5),
(69, 1),
(69, 6),
(70, 2),
(71, 5),
(72, 1),
(72, 5),
(73, 4),
(73, 7),
(74, 1),
(74, 7),
(74, 2),
(75, 1),
(75, 7),
(76, 1),
(77, 4),
(77, 1),
(78, 1),
(78, 5),
(79, 1),
(79, 3),
(80, 1),
(80, 2),
(80, 6),
(81, 1),
(81, 5),
(81, 6),
(82, 4),
(82, 1),
(82, 5),
(83, 1),
(83, 5),
(84, 1),
(84, 5),
(84, 6),
(84, 3),
(85, 4),
(86, 4);

-- --------------------------------------------------------

--
-- Table structure for table `book_reservation`
--

CREATE TABLE `book_reservation` (
  `user_id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `reservation_time` date NOT NULL,
  `returnTime` date NOT NULL,
  `delay_fine` int(11) NOT NULL,
  `taken` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_reservation`
--

INSERT INTO `book_reservation` (`user_id`, `book_id`, `reservation_time`, `returnTime`, `delay_fine`, `taken`) VALUES
(15, '9780316024969', '2020-05-28', '2020-05-30', 6, 0),
(15, '9788491462538', '2020-05-26', '2020-05-28', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `description`) VALUES
(1, 'adventure'),
(2, 'romance'),
(3, 'thriller'),
(4, 'action'),
(5, 'mystery'),
(6, 'sci-fi'),
(7, 'comedy');

-- --------------------------------------------------------

--
-- Table structure for table `hall_booking`
--

CREATE TABLE `hall_booking` (
  `library_hall` int(11) NOT NULL,
  `seat_number` int(11) NOT NULL,
  `reservation_start_time` timestamp NULL DEFAULT NULL,
  `reservation_end_time` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hall_structure`
--

CREATE TABLE `hall_structure` (
  `structure_id` int(11) NOT NULL,
  `library_hall` int(11) DEFAULT NULL,
  `row_numbers` int(11) DEFAULT NULL,
  `separation_1` int(11) DEFAULT NULL,
  `separation_2` int(11) DEFAULT NULL,
  `separation_3` int(11) DEFAULT NULL,
  `separation_4` int(11) DEFAULT NULL,
  `separation_5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall_structure`
--

INSERT INTO `hall_structure` (`structure_id`, `library_hall`, `row_numbers`, `separation_1`, `separation_2`, `separation_3`, `separation_4`, `separation_5`) VALUES
(1, 1, 5, 3, 3, 4, NULL, NULL),
(2, 2, 5, 2, 2, 3, 3, NULL),
(3, 3, 6, 4, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `library_halls`
--

CREATE TABLE `library_halls` (
  `id` int(11) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `open_seats` int(11) NOT NULL,
  `librarian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_halls`
--

INSERT INTO `library_halls` (`id`, `name`, `capacity`, `open_seats`, `librarian_id`) VALUES
(1, 'Salla 1', 50, 50, 1),
(2, 'Salla 2', 50, 50, 15),
(3, 'Salla 3', 60, 60, 12);

-- --------------------------------------------------------

--
-- Table structure for table `online_books`
--

CREATE TABLE `online_books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `publish_date` date NOT NULL,
  `likes` int(11) NOT NULL,
  `cover_photo` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `book_path` varchar(150) DEFAULT NULL,
  `monthly_likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_books`
--

INSERT INTO `online_books` (`id`, `user_id`, `title`, `publish_date`, `likes`, `cover_photo`, `description`, `book_path`, `monthly_likes`) VALUES
(67, 15, 'The Monk Who Sold His Ferrari', '2020-05-22', 0, 'The Monk Who Sold His Ferrari1590099788.jpg', 'The Monk Who Sold His Ferrari is a self-help classic telling the story of fictional lawyer Julian Mantle, who sold his mansion and Ferrari to study the seven virtues of the Sages of Sivana in the Himalayan mountains.', 'The Monk Who Sold His Ferrari1590099788.pdf', 0),
(68, 15, 'The Girl With The Dragon Tatoo', '2020-05-22', 0, 'The Girl With The Dragon Tatoo1590100340.jpg', 'Harriet Vanger, a scion of one of Sweden’s wealthiest families disappeared over forty years ago. All these years later, her aged uncle continues to seek the truth. He hires Mikael Blomkvist, a crusading journalist recently trapped by a libel conviction, to investigate. He is aided by the pierced and tattooed punk prodigy Lisbeth Salander. ', 'The Girl With The Dragon Tatoo1590100340.pdf', 0),
(69, 15, 'Kingdom Of Ash', '2020-05-22', 0, 'Kingdom Of Ash1590100715.jpg', 'Aelin Galathynius has vowed to save her people ― but at a tremendous cost. Locked within an iron coffin by the Queen of the Fae, Aelin must draw upon her fiery will as she endures months of torture.', 'Kingdom Of Ash1590100715.pdf', 0),
(70, 15, 'The Great Gatsby', '2020-05-22', 0, 'The Great Gatsby1590101151.jpg', 'The Great Gatsby, F. Scott Fitzgerald\'s third book, stands as the supreme achievement of his career. This exemplary novel of the Jazz Age has been acclaimed by generations of readers.', 'The Great Gatsby1590101151.pdf', 0),
(71, 15, 'Rediscovering the Kingdom', '2020-05-22', 0, 'Rediscovering the Kingdom1590101602.jpg', 'With spiritual perception and carefully crafted words Myles Munroe exposes the religious layers that have filtered out and obscured God\'s original plan for man. From the very beginning God\'s plan for His creation was centered on our being in relationship with Him', 'Rediscovering the Kingdom1590101602.pdf', 0),
(72, 20, 'Heart Of Darkness', '2020-05-22', 0, 'Heart Of Darkness1590101959.jpg', 'Heart of Darkness, a novel by Joseph Conrad, was originally a three-part series in Blackwood\'s Magazine in 1899. It is a story within a story, following a character named Charlie Marlow, who recounts his adventure to a group of men onboard an anchored ship.', 'Heart Of Darkness1590101959.pdf', 0),
(73, 20, 'One Hundred Years Of Solitude', '2020-05-22', 0, 'One Hundred Years Of Solitude1590102395.jpg', 'The brilliant, bestselling, landmark novel that tells the story of the Buendia family, and chronicles the irreconcilable conflict between the desire for solitude and the need for love—in rich, imaginative prose that has come to define an entire genre known as \"magical realism.\"', 'One Hundred Years Of Solitude1590102395.pdf', 0),
(74, 20, 'Poetry For Students', '2020-05-22', 0, 'Poetry For Students1590102754.jpg', 'Give students the tools they need to make books and authors a meaningful part of their lives by introducing them to one of our \"For Students\" literary references. These resources are specially crafted to meet the curricular needs of high school and undergraduate college students and their teachers as well as the interests of general readers and researchers', 'Poetry For Students1590102754.pdf', 0),
(75, 20, 'Beyond Good And Evil', '2020-05-22', 0, 'Beyond Good And Evil1590103018.jpg', 'Beyond Good and Evil confirmed Nietzsche\'s position as the towering European philosopher of his age. The work dramatically rejects the tradition of Western thought with its notions of truth and God, good and evil', 'Beyond Good And Evil1590103018.pdf', 0),
(76, 20, 'Gulliver\'s Travels', '2020-05-22', 0, 'Gullivers Travels1590103237.jpg', 'For the last 250 years people everywhere have enjoyed reading about Lemuel Gulliver\'s travels in the strange countries of Lilliput and Brobdingnag. The people of these countries, with all their curiously human failings, come to life in Martin Aitchison\'s vivid illustrations. Here is a story to make you laugh - but to make you think, too.', 'Gullivers Travels1590103237.pdf', 0),
(77, 20, 'Oliver Twist', '2020-05-22', 0, 'Oliver Twist1590103941.jpg', 'A gripping portrayal of London\'s dark criminal underbelly, published in Penguin Classics with an introduction by Philip Horne.', 'Oliver Twist1590103941.pdf', 0),
(78, 19, 'The Last Of Mohicans', '2020-05-22', 0, 'The Last Of Mohicans1590104617.jpg', 'The world\'s best-loved children\'s stories set in large type for easy reading.', 'The Last Of Mohicans1590104617.pdf', 0),
(79, 19, 'The Brothers Karamazov', '2020-05-22', 0, 'The Brothers Karamazov1590104981.jpg', 'The Brothers Karamasov is a murder mystery, a courtroom drama, and an exploration of erotic rivalry in a series of triangular love affairs involving the “wicked and sentimental” Fyodor Pavlovich Karamazov and his three sons―the impulsive and sensual Dmitri; the coldly rational Ivan; and the healthy, red-cheeked young novice Alyosha.', 'The Brothers Karamazov1590104981.pdf', 0),
(80, 19, 'Anne Of Green Gables', '2020-05-22', 0, 'Anne Of Green Gables1590105164.jpg', 'As soon as Anne Shirley arrives at the snug white farmhouse called Green Gables, she is sure she wants to stay forever . . . but will the Cuthberts send her back to to the orphanage? Anne knows she\'s not what they expected—a skinny girl with fiery red hair and a temper to match.', 'Anne Of Green Gables1590105164.pdf', 0),
(81, 19, 'David Copperfield', '2020-05-22', 0, 'David Copperfield1590105346.jpg', 'David Copperfield is the story of a young man\'s adventures on his journey from an unhappy and impoverished childhood to the discovery of his vocation as a successful novelist.', 'David Copperfield1590105346.pdf', 0),
(82, 19, 'The Island Of Doctor Moreau', '2020-05-22', 0, 'The Island Of Doctor Moreau1590105638.jpg', 'Ranked among the classic novels of the English language and the inspiration for several unforgettable movies, this early work of H. G. Wells was greeted in 1896 by howls of protest from reviewers, who found it horrifying and blasphemous', 'The Island Of Doctor Moreau1590105638.pdf', 0),
(83, 22, 'Tarzan Of The Apes', '2020-05-22', 0, 'Tarzan Of The Apes1590106129.jpg', '\r\nTarzan of the Apes is a novel written by Edgar Rice Burroughs, the first in a series of books about the title character Tarzan. It was first published in the pulp magazine All-Story Magazine in October, 1912.', 'Tarzan Of The Apes1590106129.pdf', 0),
(84, 22, 'Dubliners', '2020-05-22', 0, 'Dubliners1590106264.jpg', 'This work of art reflects life in Ireland at the turn of the last century, and by rejecting euphemism, reveals to the Irish their unromantic realities. Each of the 15 stories offers glimpses into the lives of ordinary Dubliners, and collectively they paint a portrait of a nation.', 'Dubliners1590106264.pdf', 0),
(85, 21, 'How To Sell Yourself', '2020-05-22', 0, 'How To Sell Yourself1590106464.jpg', 'No matter what field one may be in, there is a need to market oneself, and Girard, bestselling author of \"How to Sell Anything to Anybody,\" reveals important sales secrets for everyday life.', 'How To Sell Yourself1590106464.pdf', 0),
(86, 21, 'How Successful People think', '2020-05-22', 0, 'How Successful People think1590106720.jpg', 'No matter what field one may be in, there is a need to market oneself, and Girard, bestselling author of \"How to Sell Anything to Anybody,\" reveals important sales secrets for everyday life.', 'How Successful People think1590106720.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `publish_house`
--

CREATE TABLE `publish_house` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publish_house`
--

INSERT INTO `publish_house` (`id`, `name`) VALUES
(8, 'Harper Torch/HarperCollins'),
(9, 'W. W. Norton & Company'),
(10, 'Harper Perennial'),
(11, 'TOR Books'),
(12, 'Scholastic Press'),
(13, 'Katherine Tegen Books'),
(14, 'Little Brown'),
(15, 'Grand Central Publishing'),
(16, 'Mcbooks Press'),
(17, 'Knopf'),
(18, 'Pocket Books'),
(19, 'Aladdin'),
(20, 'Planeta DeAgostini '),
(21, 'Egmont Manga'),
(22, 'Bantam'),
(23, 'Ballantine Books');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `review_time` date DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `book_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `book_id`, `review_time`, `description`, `book_type`) VALUES
(60, 20, '9788491462538', '2020-05-25', 'super super super super liber', 'offlineBook'),
(62, 19, '9788491462538', '2020-05-25', 'Please boycott the inevitable American remake. I know that Kimi No Na Wa made a lot of money so therefore I know automatically that the remake will come and it will be a Hollywood con job (think Ghost In The Shell SHUDDER).\n\nKimi No Na Wa to me is an extremely well written and well thought story with amazing visuals. The bond between the characters, even in animation was something else. It was beautiful.\n\nThe world does not need an American remake.', 'offlineBook'),
(63, 22, '9788491462538', '2020-05-25', 'With that said, it is too bad that Hollywood has picked this up. Not that I will be watching that remake, but I cringe already at the thought of Hollywood hack and remake specialist giving this an American swirl. All the cliches of bad remaking and safe corporate changes will be applied. Aaaarrrggghh', 'offlineBook'),
(66, 21, '9788491462538', '2020-05-25', 'With success comes cash hounds and mercenaries of course. Worst of them all is JJ Abrams from Hollywood. He has been given the task of remaking Kimi No Na Wa. OH NO! The feeling will disappear, the underlying sense of humanity will disappear, the story will be set in (I am guessing) Dallas Texas or some similar dump, the girl will be wearing long prairie skirt like a good Jewish girl and we will all ask why didnt Hollywood learn a lesson from the American remake of Ghost In The Shell which was a', 'offlineBook');

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
  `gender` varchar(10) NOT NULL,
  `points` int(11) NOT NULL,
  `user_rights` int(11) NOT NULL,
  `profile_photo` varchar(100) DEFAULT NULL,
  `activationStatus` tinyint(1) NOT NULL,
  `securityString` varchar(40) NOT NULL,
  `recoverPasswordToken` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `mobile`, `password`, `birthday`, `gender`, `points`, `user_rights`, `profile_photo`, `activationStatus`, `securityString`, `recoverPasswordToken`) VALUES
(15, 'Andi', 'elezi', 'andi06121998', 'andielezi52@gmail.com', '+355684934250', '$2y$10$mCQdF6ERPR9K.oeifvG0DOdvXy./72eJgf6pma2BBpQuh74/N.J86', '1998-06-12', 'Male', 5485, 3, 'andi06121998gjfdioykhlsuwrepqta.jpg', 1, 'm3noby6hwfu80icjz2lktevsp71rdag4x5q9', NULL),
(19, 'Ardit', 'Kallaku', 'silence', 'ardit.kallaku@fshnstudent.info', '+355681122334', '$2y$10$9F50q0p7pXOS.VQLkLoU1eXgKuKTfQRiC1I1vVDDZq13YyDpWXHV6', '2020-01-01', 'Male', 1004, 3, 'silenceeqjophuyktrafgliwds.jpg', 1, '45g28ob1a9wkl03x6njprevqdtficzmhusy7', NULL),
(20, 'Artenc', 'Cerumi', 'techno', 'artenc.cerumi8891@gmail.com', '+35556949250', '$2y$10$AaNUNpkRHb8RoZrDBw9TeOmfiw15Ff3f5DY87ZXHAzzVPjwHMhq1u', '2020-01-01', 'Male', 1000, 3, NULL, 1, 'ds4lzngaqpm9e7516i2fcov8rxk30jytuhbw', NULL),
(21, 'Elvis', 'Ademi', 'venom', 'Elvis.Ademi@fshnstudent.ifno', '+355684934265', '$2y$10$vlrElUomCmzljewPzaXqm.n59Gi53N7hPzsiN1H80UAU29wYm/5Ou', '1998-12-06', 'Male', 0, 3, NULL, 1, 'khdruv9iocae4f60p2gnblqyx5sjmw73z81t', NULL),
(22, 'Amaro', 'Kajo', 'cyrez', 'amaro.kajo@fshnstudent.info', '+355684934000', '$2y$10$F2L91ZTzT6FPjHdx5o1E4euD4pmhYoSoKPMHJeDwYt6vjIlxXs3Qm', '1998-02-06', 'Male', 0, 3, NULL, 1, 'nt43k6mg5lbhp0wzv8qrafj7ycedou921sxi', NULL),
(23, 'Biblioteka', 'Online', 'system', 'Horizone.Event@gmail.com', NULL, '$2y$10$VMtBjvKkdFXdDHcVVf20ZutGMMC2xZpCyjhHPHbuD5vZLmfZCGJQK', '2000-01-01', 'Other', 0, 3, NULL, 1, 'e0bogtks6il3xpj91qdrm27yvn84acw5fuzh', NULL),
(24, 'Librarian', 'Test', 'librarian', 'andi.elezi@fshnstudent.info', NULL, '$2y$10$A/9WLSQ0Ffq/m9C7.l1GOuAiPrDaeTF6of8jgIz9kjLcgLZBUtvQG', '2020-01-01', 'Male', 0, 2, NULL, 1, 'wjgfnc483vmoekyxha07p9tisbzr6qd5u12l', NULL);

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_author_book`
-- (See below for the actual view)
--
CREATE TABLE `v_author_book` (
`author_Id` int(11)
,`full_name` varchar(50)
,`birthplace` varchar(30)
,`birthday` date
,`contact` varchar(50)
,`ISBN` varchar(30)
,`title` varchar(75)
,`publication_year` date
,`quantity` int(11)
,`price` int(11)
,`reservation_points` int(11)
,`cover_photo` varchar(150)
,`description` varchar(1000)
,`likes` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_book_categories`
-- (See below for the actual view)
--
CREATE TABLE `v_book_categories` (
`ISBN` varchar(30)
,`title` varchar(75)
,`c_description` varchar(50)
,`publication_year` date
,`publish_house` int(11)
,`quantity` int(11)
,`price` int(11)
,`reservation_points` int(11)
,`cover_photo` varchar(150)
,`description` varchar(1000)
,`likes` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_online_books_categories`
-- (See below for the actual view)
--
CREATE TABLE `v_online_books_categories` (
`id` int(11)
,`user_id` int(11)
,`title` varchar(75)
,`c_description` varchar(50)
,`publish_date` date
,`likes` int(11)
,`cover_photo` varchar(150)
,`description` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_publish_house_book`
-- (See below for the actual view)
--
CREATE TABLE `v_publish_house_book` (
`ISBN` varchar(30)
,`title` varchar(75)
,`cover_photo` varchar(150)
,`name` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user_online_books`
-- (See below for the actual view)
--
CREATE TABLE `v_user_online_books` (
`user_id` int(11)
,`name` varchar(30)
,`surname` varchar(30)
,`username` varchar(30)
,`email` varchar(40)
,`mobile` varchar(15)
,`birthday` date
,`gender` varchar(10)
,`points` int(11)
,`user_rights` int(11)
,`profile_photo` varchar(100)
,`book_id` int(11)
,`title` varchar(75)
,`publish_date` date
,`likes` int(11)
,`cover_photo` varchar(150)
,`description` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure for view `v_author_book`
--
DROP TABLE IF EXISTS `v_author_book`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_author_book`  AS  select `author`.`id` AS `author_Id`,`author`.`full_name` AS `full_name`,`author`.`birthplace` AS `birthplace`,`author`.`birthday` AS `birthday`,`author`.`contact` AS `contact`,`book`.`ISBN` AS `ISBN`,`book`.`title` AS `title`,`book`.`publication_year` AS `publication_year`,`book`.`quantity` AS `quantity`,`book`.`price` AS `price`,`book`.`reservation_points` AS `reservation_points`,`book`.`cover_photo` AS `cover_photo`,`book`.`description` AS `description`,`book`.`likes` AS `likes` from ((`author` join `book_author` on(`author`.`id` = `book_author`.`author_id`)) join `book` on(`book`.`ISBN` = `book_author`.`book_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_book_categories`
--
DROP TABLE IF EXISTS `v_book_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_book_categories`  AS  select `b`.`ISBN` AS `ISBN`,`b`.`title` AS `title`,`c`.`description` AS `c_description`,`b`.`publication_year` AS `publication_year`,`b`.`publish_house` AS `publish_house`,`b`.`quantity` AS `quantity`,`b`.`price` AS `price`,`b`.`reservation_points` AS `reservation_points`,`b`.`cover_photo` AS `cover_photo`,`b`.`description` AS `description`,`b`.`likes` AS `likes` from ((`categories` `c` join `book_categories` `bc` on(`c`.`id` = `bc`.`category_id`)) join `book` `b` on(`b`.`ISBN` = `bc`.`book_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_online_books_categories`
--
DROP TABLE IF EXISTS `v_online_books_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_online_books_categories`  AS  select `ob`.`id` AS `id`,`ob`.`user_id` AS `user_id`,`ob`.`title` AS `title`,`c`.`description` AS `c_description`,`ob`.`publish_date` AS `publish_date`,`ob`.`likes` AS `likes`,`ob`.`cover_photo` AS `cover_photo`,`ob`.`description` AS `description` from ((`categories` `c` join `book_online_categories` `boc` on(`c`.`id` = `boc`.`category_id`)) join `online_books` `ob` on(`ob`.`id` = `boc`.`book_online_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_publish_house_book`
--
DROP TABLE IF EXISTS `v_publish_house_book`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_publish_house_book`  AS  select `book`.`ISBN` AS `ISBN`,`book`.`title` AS `title`,`book`.`cover_photo` AS `cover_photo`,`publish_house`.`name` AS `name` from (`book` join `publish_house` on(`book`.`publish_house` = `publish_house`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_online_books`
--
DROP TABLE IF EXISTS `v_user_online_books`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user_online_books`  AS  select `users`.`id` AS `user_id`,`users`.`name` AS `name`,`users`.`surname` AS `surname`,`users`.`username` AS `username`,`users`.`email` AS `email`,`users`.`mobile` AS `mobile`,`users`.`birthday` AS `birthday`,`users`.`gender` AS `gender`,`users`.`points` AS `points`,`users`.`user_rights` AS `user_rights`,`users`.`profile_photo` AS `profile_photo`,`online_books`.`id` AS `book_id`,`online_books`.`title` AS `title`,`online_books`.`publish_date` AS `publish_date`,`online_books`.`likes` AS `likes`,`online_books`.`cover_photo` AS `cover_photo`,`online_books`.`description` AS `description` from (`users` join `online_books` on(`users`.`id` = `online_books`.`user_id`)) ;

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
-- Indexes for table `book_favourite`
--
ALTER TABLE `book_favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_like`
--
ALTER TABLE `book_like`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `hall_structure`
--
ALTER TABLE `hall_structure`
  ADD PRIMARY KEY (`structure_id`),
  ADD KEY `fk_library_hall_structure` (`library_hall`);

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
  ADD KEY `fk_user_on_id` (`user_id`);

--
-- Indexes for table `publish_house`
--
ALTER TABLE `publish_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_review_id` (`user_id`),
  ADD KEY `fk_book_review_id` (`book_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `book_favourite`
--
ALTER TABLE `book_favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `book_like`
--
ALTER TABLE `book_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hall_structure`
--
ALTER TABLE `hall_structure`
  MODIFY `structure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `library_halls`
--
ALTER TABLE `library_halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `online_books`
--
ALTER TABLE `online_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `publish_house`
--
ALTER TABLE `publish_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD CONSTRAINT `fk_book_ISBN` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hall_structure`
--
ALTER TABLE `hall_structure`
  ADD CONSTRAINT `fk_library_hall_structure` FOREIGN KEY (`library_hall`) REFERENCES `library_halls` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `online_books`
--
ALTER TABLE `online_books`
  ADD CONSTRAINT `fk_user_online_book` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `free_seats` ON SCHEDULE EVERY 1 MINUTE STARTS '2020-05-17 22:20:15' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM hall_booking WHERE reservation_end_time<CURRENT_TIMESTAMP$$

CREATE DEFINER=`root`@`localhost` EVENT `freeBookReservation` ON SCHEDULE EVERY 1 DAY STARTS '2020-05-18 22:20:10' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
		UPDATE book SET quantity=quantity+1 WHERE ISBN IN (SELECT book_id FROM book_reservation WHERE reservation_time<CURRENT_DATE AND taken=0);
		DELETE FROM book_reservation WHERE reservation_time <CURRENT_DATE AND taken=0;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
