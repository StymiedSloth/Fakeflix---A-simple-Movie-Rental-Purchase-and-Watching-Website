-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2015 at 03:41 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `movierental`
--
CREATE DATABASE IF NOT EXISTS `movierental` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `movierental`;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `actor_id` int(11) NOT NULL,
  `actor_name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`actor_id`, `actor_name`) VALUES
(0, 'Bruce Willis'),
(1, 'Morgan Freeman'),
(2, 'Judi Dench'),
(3, 'Kate Winslet'),
(4, 'Zoe Saldana'),
(5, 'Brad Pitt'),
(6, 'Leonardo Di Caprio'),
(7, 'Tom Hanks'),
(8, 'Robert De Niro'),
(9, 'Johnny Depp'),
(10, 'Robert Downey Jr.'),
(11, 'Anthony Hopkins'),
(12, 'Christian Bale'),
(13, 'Denzel Washington'),
(14, 'Daniel Day-Lewis'),
(15, 'Gary Oldman'),
(16, 'Al Pacino'),
(17, 'Jack Nicholson'),
(18, 'Kevin Spacey'),
(19, 'Liam Neeson'),
(20, 'Edward Norton'),
(21, 'Michael Caine'),
(22, 'Christopher Walken'),
(23, 'Matt Damon'),
(24, 'Dustin Hoffman'),
(25, 'Robert Duvall'),
(26, 'Joaquin Phoenix'),
(27, 'Bryan Cranston'),
(28, 'Hugh Jackman'),
(29, 'Colin Firth'),
(30, 'Russell Crowe'),
(31, 'Christoph Waltz'),
(32, 'Ian McKellen'),
(33, 'Geoffrey Rush'),
(34, 'Ralph Fiennes'),
(35, 'Sean Penn'),
(36, 'Harrison Ford'),
(37, 'Mark Wahlberg'),
(38, 'Jeff Bridges'),
(39, 'Paul Giamatti'),
(40, 'Alan Rickman'),
(41, 'Viggo Mortensen'),
(42, 'Clint Eastwood'),
(43, 'Michael Fassbender'),
(44, 'George Clooney'),
(45, 'Bill Murray'),
(46, 'Bradley Cooper'),
(47, 'Tommy Lee Jones'),
(48, 'Ewan McGregor'),
(49, 'Jean Reno'),
(50, 'Javier Bardem'),
(51, 'Christopher Plummer'),
(52, 'Daniel Craig'),
(53, 'Joseph Gordon Levitt'),
(54, 'Jamie Foxx'),
(55, 'Ryan Potter'),
(56, 'Scott Adsit'),
(57, 'Daniel Henney'),
(58, 'Ben Kingsley'),
(59, 'Michelle Pfeiffer'),
(60, 'Tom Cruise'),
(61, 'Valeria Golino'),
(62, 'Sean Connery'),
(63, 'Alison Doody'),
(64, 'Robin Williams'),
(65, 'Robert sean Leonard'),
(66, 'Ray Liotta'),
(67, 'Jodie Foster'),
(68, 'Chris O Donnell'),
(69, 'Madeleine Stowe'),
(70, 'Chris Pratt'),
(71, 'Andey Serkis'),
(72, 'Jason Clarke'),
(73, 'Emily Blunt'),
(74, 'Sylvester Stallone'),
(75, 'Jason Statham'),
(76, 'Jim Carrey'),
(77, 'Maura Tierney'),
(78, 'Jeff Daniels'),
(79, 'Chris Miller'),
(80, 'Tom McGrath');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE IF NOT EXISTS `directors` (
  `director_id` int(11) NOT NULL,
  `director_name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`director_id`, `director_name`) VALUES
(0, 'Martin Scorsese'),
(1, 'Steven Spielberg'),
(2, 'Paul Thomas Anderson'),
(3, 'David Fincher'),
(4, 'Terrence Malick'),
(5, 'Ethan Coen'),
(6, 'Darren Aronofsky'),
(7, 'Ridley Scott'),
(8, 'Francis Ford Coppola'),
(9, 'Steven Soderbergh'),
(10, 'Christopher Nolan'),
(11, 'Steve McQueen'),
(12, 'Roman Polanski'),
(13, 'Quentin Tarantino'),
(14, 'Wim Wenders'),
(15, 'Clint Eastwood'),
(16, 'Nicolas Winding Refn'),
(17, 'Woody Allen'),
(18, 'David Lynch'),
(19, 'Michael Mann'),
(20, 'Sam Mendes'),
(21, 'Michael Haneke'),
(22, 'Alfonso Cuarón'),
(23, 'Alejandro González Iñárritu'),
(24, 'Tim Burton'),
(25, 'Peter Jackson'),
(26, 'Pedro Almodóvar'),
(27, 'David Cronenberg'),
(28, 'James Cameron'),
(29, 'Wes Anderson'),
(30, 'Gaspar Noé'),
(31, 'Sofia Coppola'),
(32, 'Oliver Stone'),
(33, 'Lars von Trier'),
(34, 'Danny Boyle'),
(35, 'Tomas Alfredson'),
(36, 'David O. Russell'),
(37, 'Jim Jarmusch'),
(38, 'Aleksandr Sokurov'),
(39, 'Terry Gilliam'),
(40, 'Takeshi Kitano'),
(41, 'J J Abrams'),
(42, 'Zack Snyder'),
(43, 'Spike Lee'),
(44, 'Michel Gondry'),
(45, 'Spike Jonze'),
(46, 'Guillermo del Toro'),
(47, 'Leos Carax'),
(48, 'Mel Gibson'),
(49, 'Brian De Palma'),
(50, 'S S Rajamouli'),
(51, 'Trivikram Srnivas'),
(52, 'Sukumar'),
(53, 'Don Hall'),
(54, 'Chris Williams'),
(55, 'Richard Attenborough'),
(56, 'Barry Levinson'),
(57, 'Peter Weir'),
(58, 'Jonathan Demme'),
(59, 'Martin Brest'),
(60, 'James Gunn'),
(61, 'Bryan Singer'),
(62, 'Matt Reeves'),
(63, 'Doug Liman'),
(64, 'Patrick Hughes'),
(65, 'Tom Shadyac'),
(66, 'Bobby Farrely'),
(67, 'Peter farrely'),
(68, 'Peyton Reed'),
(69, 'Simon Smith'),
(70, 'Eric Darnell');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
`movie_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `price` varchar(20) NOT NULL,
  `purchase_price` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `image_link` varchar(200) NOT NULL,
  `trailer_link` varchar(200) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `wide_image` varchar(400) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='contains the movies list ' AUTO_INCREMENT=23 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `description`, `duration`, `price`, `purchase_price`, `rating`, `image_link`, `trailer_link`, `genre`, `wide_image`) VALUES
(1, 'Django Unchained', 'Django Unchained is a 2012 American western film written and directed by Quentin Tarantino. It is a highly stylized variation of the spaghetti Western, which takes place in the Old West and Antebellum South.', '165 min', '5', '20', 4, 'http://upload.wikimedia.org/wikipedia/en/8/8b/Django_Unchained_Poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/eUdM9vrCbow" frameborder="0" allowfullscreen></iframe>', 'Western', 'images/django.jpg'),
(2, 'Big Hero 6', 'An action comedy adventure about brilliant robotics prodigy Hiro Hamada, who finds himself in the grips of a criminal plot that threatens to destroy the fast-paced, high-tech city of San Fransokyo. With the help of his closest companion-a robot named Baymax-Hiro joins forces with a reluctant team of first-time crime fighters on a mission to save their city.', '105 min', '10', '25', 5, 'http://upload.wikimedia.org/wikipedia/en/4/4b/Big_Hero_6_%28film%29_poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/z3biFxZIJOQ" frameborder="0" allowfullscreen></iframe>', 'Comedy', 'images/bighero6.jpg'),
(3, 'Raging Bull', 'An emotionally self-destructive boxer''s journey through life, as the violence and temper that leads him to the top in the ring, destroys his life outside it.', '129 min', '10', '30', 4, 'http://upload.wikimedia.org/wikipedia/en/5/5f/Raging_Bull_poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/mHhzOM4gBIA" frameborder="0" allowfullscreen></iframe>', 'Drama', 'images/ragingbull.jpg'),
(4, 'Gandhi', 'Biography of Mohandas K. Gandhi, the lawyer who became the famed leader of the Indian revolts against the British rule through his philosophy of nonviolent protest.', '191 min', '12', '30', 4, 'http://upload.wikimedia.org/wikipedia/en/1/10/Gandhi-poster.png', '<iframe width="560" height="315" src="//www.youtube.com/embed/6oWqlb_TlLQ" frameborder="0" allowfullscreen></iframe>', 'Biography', 'images/gandhi.jpg'),
(5, 'Scarface', 'In 1980 Miami, a determined Cuban immigrant takes over a drug cartel while succumbing to greed.', '170 min', '15', '35', 4, 'http://upload.wikimedia.org/wikipedia/en/5/5c/Scarface.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/cv276Wg3e7I" frameborder="0" allowfullscreen></iframe>', 'Crime', 'images/scarface.jpg'),
(6, 'Rain Man', 'Selfish yuppie Charlie Babbitt''s father left a fortune to his savant brother Raymond and a pittance to Charlie; they travel cross-country.', '133 min', '14', '25', 4, 'http://upload.wikimedia.org/wikipedia/en/b/b2/Rain_Man_poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/mlNwXuHUA8I" frameborder="0" allowfullscreen></iframe>', 'Drama', 'images/rainman.jpg'),
(7, 'Indiana Jones and The Last Crusade', 'When Dr. Henry Jones Sr. suddenly goes missing while pursuing the Holy Grail, eminent archaeologist Indiana Jones must follow in his father''s footsteps and stop the Nazis.', '127 min', '15', '33', 5, 'http://upload.wikimedia.org/wikipedia/en/f/fc/Indiana_Jones_and_the_Last_Crusade_A.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/A7TaY8HWYd8" frameborder="0" allowfullscreen></iframe>', 'Action', 'images/indianajoneslc.jpg'),
(8, 'Dead Poets Society', 'English teacher John Keating inspires his students to a love of poetry and to seize the day.', '128 min', '9', '20', 4, 'http://upload.wikimedia.org/wikipedia/en/4/49/Dead_poets_society.jpg', '<iframe width="420" height="315" src="//www.youtube.com/embed/wrBk780aOis" frameborder="0" allowfullscreen></iframe>', 'Drama', 'images/deadpoetssociety.jpg'),
(9, 'Goodfellas', 'Henry Hill and his friends work their way up through the mob hierarchy.', '146 min', '18', '36', 5, 'http://upload.wikimedia.org/wikipedia/en/7/7b/Goodfellas.jpg', '<iframe width="853" height="480" src="//www.youtube.com/embed/2ilzidi_J8Q" frameborder="0" allowfullscreen></iframe>', 'Crime', 'images/goodfellas.jpg'),
(10, 'The Silence of the Lambs', 'A young F.B.I. cadet must confide in an incarcerated and manipulative killer to receive his help on catching another serial killer who skins his victims.', '118 min', '10', '33', 5, 'http://upload.wikimedia.org/wikipedia/en/8/86/The_Silence_of_the_Lambs_poster.jpg', '<iframe width="640" height="480" src="//www.youtube.com/embed/lQKs169Sl0I" frameborder="0" allowfullscreen></iframe>', 'Thriller', 'images/silenceoflambs.jpg'),
(11, 'Scent of a Woman', 'A prep school student needing money agrees to "babysit" a blind man, but the job is not at all what he anticipated.', '156 min', '15', '45', 4, 'http://upload.wikimedia.org/wikipedia/en/9/91/Scent_of_a_Woman.jpg', '<iframe width="640" height="480" src="//www.youtube.com/embed/dtP2YXQZrSM" frameborder="0" allowfullscreen></iframe>', 'Drama', 'images/scentofawoman.jpg'),
(12, 'The Last of the Mohicans', 'Three trappers protect a British Colonel''s daughters in the midst of the French and Indian War.', '112 min', '10', '33', 3, 'http://upload.wikimedia.org/wikipedia/en/d/dd/Mohicansposter.jpg', '<iframe width="853" height="480" src="//www.youtube.com/embed/PvD8rvCVjdM" frameborder="0" allowfullscreen></iframe>', 'Action', 'images/thelastofthemohicans.jpg'),
(13, 'Guardians of the Galaxy', 'A group of space criminals must work together to stop the fanatical villain Ronan the Accuser from destroying the galaxy.', '121  min', '15', '45', 4, 'http://upload.wikimedia.org/wikipedia/en/thumb/8/8f/GOTG-poster.jpg/220px-GOTG-poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/2LIQ2-PZBC8" frameborder="0" allowfullscreen></iframe>', 'Action', 'images/guardians.jpg'),
(14, 'X-Men: Days of Future Past', 'The X-Men send Wolverine to the past in a desperate effort to change history and prevent an event that results in doom for both humans and mutants.', '131  min', '10', '25', 4, 'http://upload.wikimedia.org/wikipedia/en/thumb/0/0c/X-Men_Days_of_Future_Past_poster.jpg/220px-X-Men_Days_of_Future_Past_poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/pK2zYHWDZKo" frameborder="0" allowfullscreen></iframe>', 'Action', 'images/xmendfp.jpg'),
(15, 'Dawn of the Planet of the Apes', 'Ten years after a pandemic disease, apes who have survived it are drawn into battle with a group of human survivors.', '130  min', '15', '30', 4, 'http://upload.wikimedia.org/wikipedia/en/thumb/7/77/Dawn_of_the_Planet_of_the_Apes.jpg/220px-Dawn_of_the_Planet_of_the_Apes.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/3sHMCRaS3ao" frameborder="0" allowfullscreen></iframe>', 'Action', 'images/dawnoftheplanetofapes.jpg'),
(16, 'Edge of Tomorrow', 'A military officer is brought into an alien war against an extraterrestrial enemy who can reset the day and know the future. When this officer is enabled with the same power, he teams up with a Special Forces warrior to try and end the war.', '113  min', '11', '31', 4, 'http://upload.wikimedia.org/wikipedia/en/thumb/f/f9/Edge_of_Tomorrow_Poster.jpg/220px-Edge_of_Tomorrow_Poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/fLe_qO4AE-M" frameborder="0" allowfullscreen></iframe>', 'Action', 'images/edgeoftomorrow.jpg'),
(17, 'The Expendables 3', 'Barney augments his team with new blood for a personal battle: to take down Conrad Stonebanks, the Expendables co-founder and notorious arms trader who is hell bent on wiping out Barney and every single one of his associates.', '126  min', '8', '20', 3, 'http://upload.wikimedia.org/wikipedia/en/thumb/5/55/Expendables_3_poster.jpg/220px-Expendables_3_poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/sTte6BQndTQ" frameborder="0" allowfullscreen></iframe>', 'Action', 'images/expendables3.jpg'),
(18, 'Liar Liar', 'A fast track lawyer can''t lie for 24 hours due to his son''s birthday wish after the lawyer turns his son down for the last time.', '86  min', '10', '20', 3, 'http://upload.wikimedia.org/wikipedia/en/thumb/3/3d/Liar_Liar_poster.JPG/220px-Liar_Liar_poster.JPG', '<iframe width="560" height="315" src="//www.youtube.com/embed/C1no75lpOiw" frameborder="0" allowfullscreen></iframe>', 'Comedy', 'images/liarliar.jpg'),
(19, 'Bruce Almighty', 'A guy who complains about God too often is given almighty powers to teach him how difficult it is to run the world.', '101  min', '10', '15', 5, 'http://upload.wikimedia.org/wikipedia/en/6/60/BruceAlmighty_poster.jpg', '<iframe width="420" height="315" src="//www.youtube.com/embed/0XBxoKumlqQ" frameborder="0" allowfullscreen></iframe>', 'Comedy', 'images/brucealmighty.jpg'),
(20, 'Dumb and Dumber to', '20 years since their first adventure, Lloyd and Harry go on a road trip to find Harry''s newly discovered daughter, who was given up for adoption.', '109  min', '10', '15', 3, 'http://upload.wikimedia.org/wikipedia/en/thumb/8/83/Dumb_and_Dumber_To_Poster.jpg/220px-Dumb_and_Dumber_To_Poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/lGXHVlEklgQ" frameborder="0" allowfullscreen></iframe>', 'Comedy', 'images/dadt.jpg'),
(21, 'Yes man', 'A guy challenges himself to say "yes" to everything for an entire year.', '104  min', '10', '15', 3, 'http://upload.wikimedia.org/wikipedia/en/thumb/7/71/YesMan2008poster.jpg/220px-YesMan2008poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/rvpsiIe2vBE" frameborder="0" allowfullscreen></iframe>', 'Comedy', 'images/yesman.jpg'),
(22, 'Penguins of Madagascar', 'Skipper, Kowalski, Rico and Private join forces with undercover organization The North Wind to stop the villainous Dr. Octavius Brine from destroying the world as we know it.', '92  min', '15', '25', 3, 'http://upload.wikimedia.org/wikipedia/en/thumb/5/5f/Penguins_of_Madagascar_poster.jpg/220px-Penguins_of_Madagascar_poster.jpg', '<iframe width="560" height="315" src="//www.youtube.com/embed/retX8Wj7JdM" frameborder="0" allowfullscreen></iframe>', 'Comedy', 'images/pom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actors`
--

CREATE TABLE IF NOT EXISTS `movie_actors` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_actors`
--

INSERT INTO `movie_actors` (`movie_id`, `actor_id`) VALUES
(1, 6),
(1, 31),
(1, 54),
(2, 55),
(2, 56),
(2, 57),
(3, 8),
(4, 58),
(5, 16),
(5, 59),
(6, 24),
(6, 60),
(6, 61),
(7, 36),
(7, 62),
(7, 63),
(8, 64),
(8, 65),
(9, 8),
(9, 66),
(10, 67),
(10, 11),
(11, 16),
(11, 68),
(12, 14),
(12, 69),
(13, 70),
(13, 4),
(14, 28),
(15, 71),
(15, 72),
(16, 60),
(16, 73),
(17, 74),
(17, 36),
(18, 76),
(18, 77),
(19, 76),
(19, 1),
(20, 76),
(20, 78),
(21, 76),
(21, 46),
(22, 79),
(22, 80);

-- --------------------------------------------------------

--
-- Table structure for table `movie_directors`
--

CREATE TABLE IF NOT EXISTS `movie_directors` (
  `movie_id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_directors`
--

INSERT INTO `movie_directors` (`movie_id`, `director_id`) VALUES
(1, 0),
(1, 31),
(2, 53),
(2, 54),
(3, 0),
(4, 55),
(5, 49),
(6, 56),
(7, 1),
(8, 57),
(9, 0),
(10, 58),
(11, 59),
(12, 19),
(13, 60),
(14, 61),
(15, 62),
(16, 63),
(17, 64),
(18, 65),
(19, 65),
(20, 66),
(20, 67),
(21, 68),
(22, 69),
(22, 70);

-- --------------------------------------------------------

--
-- Table structure for table `movie_producers`
--

CREATE TABLE IF NOT EXISTS `movie_producers` (
  `movie_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_producers`
--

INSERT INTO `movie_producers` (`movie_id`, `producer_id`) VALUES
(1, 0),
(1, 51),
(2, 52),
(2, 53),
(3, 22),
(3, 12),
(4, 54),
(5, 55),
(6, 23),
(7, 56),
(7, 57),
(8, 58),
(9, 12),
(10, 59),
(10, 60),
(11, 61),
(12, 62),
(13, 63),
(14, 64),
(15, 65),
(16, 66),
(17, 67),
(18, 10),
(19, 68),
(20, 69),
(21, 70),
(22, 71),
(22, 72);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `is_rented` tinyint(1) NOT NULL,
  `date_ordered` date NOT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `movie_id`, `is_rented`, `date_ordered`, `due_date`) VALUES
(44, 2, 9, 1, '2014-11-22', '2014-11-29'),
(45, 2, 12, 1, '2014-11-22', '2014-11-29'),
(46, 2, 8, 0, '2014-11-22', '2114-11-29'),
(53, 3, 3, 1, '2014-11-22', '2014-11-29'),
(56, 4, 2, 1, '2014-11-22', '2014-11-29'),
(57, 2, 4, 1, '2014-11-22', '2014-11-29'),
(65, 4, 3, 1, '2014-12-04', '2014-12-11'),
(66, 4, 3, 0, '2014-12-04', '2114-12-04'),
(67, 1, 2, 1, '2014-12-04', '2014-12-11'),
(68, 1, 12, 0, '2014-12-04', '2114-12-04'),
(69, 1, 3, 0, '2014-12-04', '2114-12-04'),
(70, 1, 7, 1, '2014-12-05', '2014-12-12'),
(71, 1, 6, 0, '2014-12-05', '2114-12-05'),
(72, 1, 1, 0, '2014-12-05', '2114-12-05'),
(73, 2, 5, 0, '2014-12-05', '2114-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `producers`
--

CREATE TABLE IF NOT EXISTS `producers` (
  `producer_id` int(11) NOT NULL,
  `producer_name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producers`
--

INSERT INTO `producers` (`producer_id`, `producer_name`) VALUES
(0, 'Quentin Tarantino'),
(1, 'Harvey Weinstein'),
(2, 'Steven Spielberg'),
(3, 'Scott Rudin'),
(4, 'Kathleen Kennedy'),
(5, 'Sam Spiegel'),
(6, 'Francis Ford Coppola'),
(7, 'Eric Fellner'),
(8, 'Clint Eastwood'),
(9, 'Tim Bevan'),
(10, 'Brian Grazer'),
(11, 'Saul Zaentz'),
(12, 'Irwin Winkler'),
(13, 'Frank Marshall'),
(14, 'Hal B. Wallis'),
(15, 'Sydney Pollack'),
(16, 'Stanley Kramer'),
(17, 'David Puttnam'),
(18, 'Robert Wise'),
(19, 'Albert S. Ruddy'),
(20, 'Fred Roos'),
(21, 'Arthur Freed'),
(22, 'Robert Chartoff'),
(23, 'Mark Johnson'),
(24, 'James L.Brooks'),
(25, 'Peter Jackson'),
(26, 'Tom Rosenberg'),
(27, 'Graham King'),
(28, 'Barrie S.Osbrone'),
(29, 'Branko Lustig'),
(30, 'Jeremy Thomas'),
(31, 'David Brown'),
(32, 'Charles H. Joffe'),
(33, 'Ron Howard'),
(34, 'Donna Gigliotti'),
(35, 'Ismail Merchant'),
(36, 'Bruce Cohen'),
(37, 'Norman Jewison'),
(38, 'Ethan Coen'),
(39, 'Joel Coen'),
(40, 'Michael De Luca'),
(41, 'Douglas Wick'),
(42, 'Harold Hecht'),
(43, 'Bruce Davey'),
(44, 'William Wyler'),
(45, 'Steve Tisch'),
(46, 'Lawrence Bender'),
(47, 'Gary Frederickson'),
(48, 'Walter Mirisch'),
(49, 'Stanley R.Jaffe'),
(50, 'Michael Phillips'),
(51, 'Stacey Sher'),
(52, 'Roy Conli'),
(53, 'John Lasseter'),
(54, 'Richard Attenborough'),
(55, 'Martin Bregman'),
(56, 'Robert watts'),
(57, 'George Lucas'),
(58, 'Steven Haft'),
(59, 'Edward Saxon'),
(60, 'Kenneth Utt'),
(61, 'Martin Brest'),
(62, 'Hunt Lowry'),
(63, 'Kevin Feige'),
(64, 'Lauren Shuler'),
(65, 'Peter Chernin'),
(66, 'Erwin Stoff'),
(67, 'Avi Lerner'),
(68, 'Steve Koren'),
(69, 'Charles wessler'),
(70, 'David Heyman'),
(71, 'Mark Swift'),
(72, 'Lara Breay');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`customer_id` int(11) NOT NULL,
  `password` varchar(300) NOT NULL,
  `address` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`customer_id`, `password`, `address`, `dob`, `email`, `phone`, `firstname`, `lastname`) VALUES
(0, '21232f297a57a5a743894a0e4a801fc3', 'Fake avenue', '1914-11-03', 'admin', '1234567890', 'admin', 'rules'),
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'a', '2014-02-09', '1', '1213313133', 'A', 'B'),
(2, 'c4ca4238a0b923820dcc509a6f75849b', '2', '2014-11-02', '2', '1234567890', 'Vasu', 'Irneni'),
(3, 'c4ca4238a0b923820dcc509a6f75849b', '3', '2014-11-03', '3', '1234567890', 'Harshadeep', 'Reddy'),
(4, 'c4ca4238a0b923820dcc509a6f75849b', '4', '2014-11-02', '4', '1234567890', 'Ashish', 'Reddy'),
(5, '38WENApj3JtEw', '5', '2014-11-03', 'chaitanya@v.com', '1234567890', 'chaitanya', 'Vejendla'),
(6, '38CIAOJEKVD7Y', '6', '2014-11-02', 'user1@user1.com', '1234567890', 'User1', 'user1'),
(7, '38iPw8NFeQKMo', '7', '2014-11-03', 'User2@User2.com', '1234567890', 'User2', 'User2'),
(8, '38xZNVEHojjac', '8', '2014-11-02', 'User3@User3.com', '1234567890', 'User3', 'User3'),
(9, '38E8j8Pg0m/xs', '9', '2014-11-03', 'User4@User4.com', '1234567890', 'User4', 'User4'),
(10, '38Xoxo9Ovnl9o', '10', '2014-11-02', 'User5@User5.com', '1234567890', 'User5', 'User5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
 ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
 ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
 ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `producers`
--
ALTER TABLE `producers`
 ADD PRIMARY KEY (`producer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
