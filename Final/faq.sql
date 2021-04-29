-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 29, 2021 at 11:46 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wdv441_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faqID` int(11) NOT NULL,
  `faqQuestion` text NOT NULL,
  `faqAnswer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqID`, `faqQuestion`, `faqAnswer`) VALUES
(1, 'Who is the best teacher?', 'Trick question, they all are.'),
(2, 'What is the best thing to do in 2021?', 'Go outside and be thankful that 2020 is over.'),
(3, 'If your job gave you a surprise three day paid break to rest and recuperate, what would you do with those three days?', '*Breaks into laughter* Oh wait...you were serious...I would um...I haven\'t thought about it...probably sit at home.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faqID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;