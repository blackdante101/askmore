-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 11:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `askdante`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentstbl`
--

CREATE TABLE `commentstbl` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `pic` varchar(5000) NOT NULL,
  `uname` varchar(11) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `correct` varchar(10) NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentstbl`
--

INSERT INTO `commentstbl` (`id`, `question_id`, `pic`, `uname`, `comment_time`, `correct`, `content`) VALUES
(1, 18, 'upload/profile.png', 'FartBoi', '2020-07-19 13:41:56', '0', 'it was in 1957'),
(2, 21, 'upload/profile.png', 'Papa Smurf', '2020-07-19 13:47:02', '0', 'you can declare it using the $ sign like eg. $variable1'),
(3, 21, 'upload/profile.png', 'FartBoi', '2020-07-19 13:48:28', '0', 'thanks btw '),
(4, 20, 'upload/profile.png', 'Papa Smurf', '2020-07-19 13:51:26', '0', 'Probably in his early 30years'),
(5, 5, 'upload/profile.png', 'FartBoi', '2020-07-19 14:19:36', '0', 'it is a meme reference'),
(6, 5, 'upload/profile.png', 'FartBoi', '2020-07-19 14:19:50', '0', 'its a meme reference like means Lick Ma Balls \r\nIt has been used by a lotta youtubers just like Joe Mama joke'),
(7, 5, 'upload/profile.png', 'FartBoi', '2020-07-19 14:25:38', '0', 'that meme reference\'s dead'),
(8, 21, 'upload/profile.png', 'FartBoi', '2020-07-19 14:40:47', '0', 'I\'m Glad'),
(9, 20, 'upload/profile.png', 'FartBoi', '2020-07-19 17:05:26', '0', 'He does\'nt have a son '),
(10, 19, 'upload/profile.png', 'FartBoi', '2020-07-19 17:06:19', '0', 'Vybz Kartel'),
(11, 19, 'upload/profile.png', 'Papa Smurf', '2020-07-19 17:07:47', '0', 'i think it\'s shatta wale'),
(12, 17, 'upload/profile.png', 'Papa Smurf', '2020-07-19 17:11:14', '0', 'it\'s a slang '),
(13, 16, 'upload/profile.png', 'Papa Smurf', '2020-07-19 17:26:05', '0', 'it contains the same syntax \r\nyou can use while loop,for loop and others\r\n'),
(14, 21, 'upload/profile.png', 'Papa Smurf', '2020-07-19 17:28:52', '0', 'klsjfldkjfljd'),
(15, 21, 'upload/profile.png', 'FartBoi', '2020-07-19 17:30:49', '0', 'asadsdasdasdasdsdasd'),
(16, 20, 'upload/profile.png', 'Papa Smurf', '2020-07-19 17:38:05', '0', 'fsfdsf'),
(17, 19, 'upload/profile.png', 'Papa Smurf', '2020-07-19 17:38:29', '0', 'maybe stonebwoy'),
(18, 21, 'upload/profile.png', 'Papa Smurf', '2020-07-19 17:50:28', '0', 'fsfdsfdsfdsf'),
(19, 22, 'upload/profile.png', 'bdante101', '2020-07-23 11:43:13', '0', 'you shoud try\r\n<link rel=\"stylesheet\" href=\"file path\">'),
(20, 11, 'upload/profile.png', 'FartBoi', '2020-07-30 21:06:47', '0', 'arrays in programming starts from and index 0\r\n'),
(21, 12, 'upload/profile.png', 'FartBoi', '2020-07-30 21:10:38', '0', 'the series was released around 2015 on adult swim\r\n'),
(22, 6, 'upload/profile.png', 'FartBoi', '2020-07-31 11:06:58', '0', 'yeah that\'s sounds cool\r\nis it a song by falz ?'),
(23, 9, 'upload/profile/5f049e37b9f2d6.09195639.jpg', 'weniswenis', '2020-07-31 12:36:54', '0', 'you use base while or for loop \r\nplease read the documentation at python.org'),
(24, 27, 'upload/profile.png', 'Papa Smurf', '2020-10-11 12:00:29', '0', 'fsfds');

-- --------------------------------------------------------

--
-- Table structure for table `questiontbl`
--

CREATE TABLE `questiontbl` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `tag1` varchar(30) NOT NULL,
  `views` int(11) NOT NULL,
  `upvote` int(11) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `u_pic` varchar(100) NOT NULL,
  `u_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questiontbl`
--

INSERT INTO `questiontbl` (`id`, `title`, `description`, `tag1`, `views`, `upvote`, `upload_time`, `u_pic`, `u_name`) VALUES
(1, 'Desktop vb.net developer,Frontend and backend developer', 'jkfsdkfdskfdskfdfk', 'IT', 0, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'FartBoi'),
(6, 'Whats my name ?', 'Pop daddy big juice got the club running', 'Hip-Hop', 4, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'bdante101'),
(7, 'What is Mechanics', 'dlkjfldkjfdlkfjdkflsjfkldjf', 'Engineering', 1, 0, '2020-10-11 09:33:40', 'upload/profile.png', 'Papa Smurf'),
(9, 'How Do I Enter A Loop ?', 'i ve been learning python for some time now ', 'Python', 7, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'Papa Smurf'),
(10, 'How do i declare variable in C++', 'dsjkfldkjfldskjf', 'C++', 2, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'weniswenis'),
(11, 'Where Does Arrays Start From ?', 'slfjdlfjkdklfjdflskfjds', 'Intro To Programming', 3, 0, '2020-10-11 09:33:40', 'upload/profile.png', 'Papa Smurf'),
(12, 'How old is rick and morty', 'sdfghjkxcvbnmdfghjk', 'Rick and Morty', 3, 0, '2020-10-11 09:33:40', 'upload/profile.png', 'Papa Smurf'),
(13, 'how is everyone doing ', 'sggdgdg', 'hello', 0, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'weniswenis'),
(14, 'Is Maths Related To Science', 'asdfghjklzxcvbnm', 'Unpopular Opinions', 0, 0, '2020-10-11 09:33:40', 'upload/profile.png', 'weniswenis'),
(15, 'how do i change my profile', 'dfghjklxcvbnm', 'help', 0, 0, '2020-10-11 09:28:39', 'upload/profile/5f049ca762c144.52287896.jpg', 'weniswenis'),
(16, 'how to loop with python', 'gfgfhfdgfgf', 'Python', 0, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'FartBoi'),
(18, 'When Did Ghana Gain Indepence', 'fldsfjdlkfjdlkjfdlkjfldfldkfjljfsk', 'Ghana', 2, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'FartBoi'),
(19, 'Who\'s The Best Dancehall Artiste Of 2020', 'shhfhdsjfdsfkjsdkfhdsjkfhkfjs', 'Dancehall', 4, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'FartBoi'),
(20, 'How Old Is Davido\'s Son', 'sdlfjkdsklfjdsklfjdlkf', 'Davido', 0, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'FartBoi'),
(21, 'How To Declare A Variable In Php', 'How do\' i declare a variable in php', 'Php', 1, 0, '2020-10-11 09:28:39', 'upload/profile.png', 'FartBoi'),
(22, 'How To Import An External CSS File ', 'i just started practicing Html and CSS a while ago\r\nbut i still find errors trying to import my external CSS file into my project.\r\n\r\n*************************************************\r\nThis was what i tried :\r\n\r\n<link rel=\'stylesheet\' href=\'css/main.cs\'>\r\n\r\n**************************************************', 'Css', 2, 0, '2020-10-11 09:33:40', 'upload/profile.png', 'bdante101'),
(23, 'Where Can I Get Full Angular Js Tutorials', 'lksjflksdjflksdjflksdjfdsklf', 'Angular Js', 1, 0, '2020-10-11 11:54:10', 'upload/profile.png', 'Papa Smurf'),
(26, 'How To Save Images Into Sql Database', 'lkfsdlfjdslgkjs', 'Php,MySql', 2, 0, '2020-10-11 11:58:22', 'upload/profile.png', 'Papa Smurf'),
(27, 'How To Download Free Movies ', 'kjfhkdsjfhksdjfksdjf', 'movies', 6, 0, '2020-10-11 12:00:17', 'upload/profile.png', 'Papa Smurf');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `pic` varchar(1000) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `pic`, `fname`, `lname`, `dob`, `username`, `pass`) VALUES
(2, 'upload/profile.png', 'Abukari', 'Einus', '2020-10-24', 'bdante101', 'amapani'),
(3, 'upload/profile.png', 'Abukari', 'Zaidan', '2004-07-17', 'zayzayy', 'pussyboi'),
(5, 'upload/profile.png', 'Kudus', 'Kudus', '2020-07-09', 'kudos', 'kudos'),
(6, 'upload/profile.png', 'Yakubu', 'Adam', '2010-06-04', 'Papa Smurf', 'papa2020'),
(13, 'upload/profile.png', 'Yakubu', 'Kudus', '2020-07-08', 'zayzayy', 'pussyboi'),
(16, 'upload/profile.png', 'Modecai', 'Rigby', '2020-07-17', 'Mostacks', 'fineboi'),
(18, 'upload/profile.png', 'pat', 'wewe', '2020-07-23', 'thefoxisthemostawesome', 'boiboi'),
(19, 'upload/profile/5f049e37b9f2d6.09195639.jpg', 'peter', 'johnson', '2020-07-23', 'weniswenis', 'padini'),
(24, 'upload/profile/5f0629b47b5394.38341312.jpg', 'bomba', 'bomba', '2020-07-24', 'bombaman', 'sunkissboi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentstbl`
--
ALTER TABLE `commentstbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questiontbl`
--
ALTER TABLE `questiontbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentstbl`
--
ALTER TABLE `commentstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `questiontbl`
--
ALTER TABLE `questiontbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
