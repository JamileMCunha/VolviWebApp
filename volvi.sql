-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2019 at 12:09 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventHouseName` varchar(200) NOT NULL,
  `EventName` varchar(255) NOT NULL,
  `EventSize` int(11) NOT NULL,
  `EventDuration` time NOT NULL,
  `EventDate` datetime NOT NULL,
  `EventRole` varchar(100) NOT NULL,
  `EventInfo` varchar(255) NOT NULL,
  `EventID` int(11) NOT NULL,
  `EventEmail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventHouseName`, `EventName`, `EventSize`, `EventDuration`, `EventDate`, `EventRole`, `EventInfo`, `EventID`, `EventEmail`) VALUES
('GriffeenValley', 'Life Story Exercises', 40, '15:30:30', '2019-06-14 03:03:00', 'Participation in group chat with the elderlies', 'A day for you and your new friends to share your life stories ', 1, 'info@griffeenvalleynursinghome.com'),
('St.GladysPrivate', 'Bingo', 25, '02:00:00', '2019-08-02 15:00:00', 'Bingo Player', 'A lovely afternoon of joy playing bingo.', 2, 'info@silverstreamhealthcare.com'),
('St.GladysPrivate', 'Chess Day', 5, '03:00:00', '2019-06-25 13:00:00', 'Chess Player', 'A day to relax and enjoy a few chess games.', 5, 'info@silverstreamhealthcare.com'),
('TheCroft', 'Cleaning Day', 10, '02:00:00', '2019-02-02 11:00:00', 'Cleaning Helper', 'Needing helper to clean our lovely garden.', 6, 'admin@silverstream.ie'),
('SantaSabinaHouse', 'Gardening Day', 20, '02:00:00', '2019-05-25 13:00:00', 'Gardening Helper', 'Please join us to help us to take care of our garden.', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homedb`
--

CREATE TABLE `homedb` (
  `HomeID` int(11) NOT NULL,
  `HomeName` varchar(256) NOT NULL,
  `HomeAddress` varchar(255) NOT NULL,
  `HomePhone` int(11) NOT NULL,
  `HomeEmail` varchar(50) NOT NULL,
  `HomePassword` varchar(50) NOT NULL,
  `HomeAbout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homedb`
--

INSERT INTO `homedb` (`HomeID`, `HomeName`, `HomeAddress`, `HomePhone`, `HomeEmail`, `HomePassword`, `HomeAbout`) VALUES
(20, 'GriffeenValley', 'Esker Rd, Glebe, Lucan, Co. Dublin, K78 V208', 17849836, 'info@griffeenvalleynursinghome.com', 'pass1234', 'We accommodate 26 long stay residents with 20 single room'),
(21, 'Gaelchultur', '11 Clare St, Dublin 2', 17800090, 'info@siopa.ie', 'pass1234', 'We take care of elderly people as they are family to us.'),
(22, 'St.GladysPrivate', '53 Kimmage Rd Lower, Harold\'s Cross, Dublin 6W', 1880890423, 'info@silverstreamhealthcare.com', 'pass1234', 'Care decisions can be made gradually, as you grow older or your health declines. '),
(23, 'TheCroft', ' 2 Goldenbridge Walk, Inchicore, Dublin 8', 178903940, 'admin@silverstream.ie', 'pass1234', 'We recognise and appreciate that making a care decision can be challenging for you and your family.'),
(25, 'HomeCare', '25 Drumcondra', 12352362, 'Homecare@hotmail.com', 'pass12', 'Hello I am a home care'),
(26, 'SantaSabinaHouse', 'Navan Rd  Ashtown Dublin 7', 874556862, 'santasabina@dominicansisters.com', 'pass1234', 'Hello I am a home care');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Phone` int(30) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DoB` date NOT NULL,
  `About` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Photo` blob NOT NULL,
  `Vetting` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `FullName`, `Username`, `Phone`, `Address`, `Email`, `DoB`, `About`, `Password`, `Photo`, `Vetting`) VALUES
(31, 'Ailime Maciel', 'lih', 25635212, '30 NewMarket Square', 'ailime@hotmail.com', '1989-11-26', 'Hello, I am Ailime', 'pass1234', 0x41696c696d652e6a7067, 'N'),
(33, 'Jamile Maciel da Cunha', 'jam', 7665852, '124 Grace Park Heights, Drumcondra', 'jamile@gmail.com', '1994-10-26', 'hii I am Jamile', 'pass1234', '', 'N'),
(34, 'Jemaila Cunha', 'jem', 25252566, '124 Grace Park Heights, Drumcondra', 'jemaila@gmail.com', '1993-02-07', 'hii I am Jemaila', 'pass1234', 0x6a616d696c652e6a7067, 'N'),
(35, 'Ronaldo Tavares', 'ronaldo', 123654825, '54 Ballymun road', 'ronaldo@gmail.com', '1988-10-02', 'I am ronaldo, hello', 'pass1234', 0x726f6e616c646f2e6a7067, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `homedb`
--
ALTER TABLE `homedb`
  ADD PRIMARY KEY (`HomeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `homedb`
--
ALTER TABLE `homedb`
  MODIFY `HomeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
