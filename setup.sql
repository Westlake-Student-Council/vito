-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 24, 2021 at 06:22 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `vito`
--

-- --------------------------------------------------------

--
-- Table structure for table `dialogues`
--

CREATE TABLE `dialogues` (
  `dialogue_id` int(11) NOT NULL,
  `inquirer_name` varchar(50) NOT NULL,
  `email_address` varchar(250) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(1000) NOT NULL DEFAULT '',
  `is_answered` tinyint(1) NOT NULL DEFAULT '0',
  `time_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dialogues`
--
ALTER TABLE `dialogues`
  ADD PRIMARY KEY (`dialogue_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dialogues`
--
ALTER TABLE `dialogues`
  MODIFY `dialogue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
