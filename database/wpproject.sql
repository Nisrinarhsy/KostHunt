-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 04:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `boarding_house`
--

CREATE TABLE `boarding_house` (
  `boarding_house_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `owner_phone_number` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boarding_house`
--

INSERT INTO `boarding_house` (`boarding_house_id`, `name`, `address`, `owner_id`, `price`, `owner_phone_number`, `description`, `image_url`) VALUES
(1, 'Kost Bambang', 'Jl. Pancoran', 4, 5000000.00, '+1234567895', 'Sample description for Kost Ipong', '../uploads/kost1.jpg'),
(2, 'Kost Mutiara', 'Jl. Mutiara No. 12', 4, 4500000.00, '+1234567896', 'Sample description for Kost Mutiara', '../uploads/kost2.jpg'),
(3, 'Kost Ceria', 'Jl. Ceria No. 34', 4, 4000000.00, '+1234567897', 'Sample description for Kost Ceria', '../uploads/kost4.jpg'),
(4, 'Kost Damai', 'Jl. Damai No. 56', 4, 4800000.00, '+1234567898', 'Sample description for Kost Damai', '../uploads/kost5.jpg'),
(5, 'Kost Harmoni', 'Jl. Harmoni No. 78', 4, 5200000.00, '+1234567899', 'Sample description for Kost Harmoni', '../uploads/kost6.jpg'),
(6, 'Kost Sejahtera', 'Jl. Sejahtera No. 90', 4, 4600000.00, '+1234567891', 'A cozy place for students', '../uploads/kost9.jpg'),
(7, 'Kost Bahagia', 'Jl. Bahagia No. 123', 4, 4300000.00, '+1234567892', 'Affordable rooms with good facilities', '../uploads/kost11.jpg'),
(8, 'Kost Sentosa', 'Jl. Sentosa No. 45', 4, 4900000.00, '+1234567893', 'Nearby to campus and market', '../uploads/kost5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `user_type` enum('regular','owner','admin') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `registration_date` datetime DEFAULT current_timestamp(),
  `last_login_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `name`, `contact_number`, `user_type`, `address`, `date_of_birth`, `gender`, `bio`, `registration_date`, `last_login_date`, `status`) VALUES
(1, 'user1', 'password1', 'user1@example.com', 'Budi Doremi', '987-654-3210', 'regular', 'Updated Address', '1990-01-01', 'female', 'Updated Bio', '2024-03-30 20:32:37', NULL, 'active'),
(2, 'user2', 'password2', 'user2@example.com', 'Bagas Dribble', '123456789', 'regular', 'Jl. Merdeka', '1998-02-12', 'male', 'Belajar Web Prog', '2024-03-30 20:32:37', NULL, 'active'),
(4, 'dicky', '$2y$10$eOHXiKzH8.DQ7LzSLbcg9uDsr4haW9OFAHPCZJVttbbKGNBBAhJEa', 'daditrianza@gmail.com', 'Dicky Aditrianza', '081368140190', 'admin', 'Jl. Pancoran Barat', '2003-07-16', 'male', 'Computer Science student', '2024-03-30 22:10:41', NULL, 'active'),
(5, 'samsepiol', '$2y$10$ZwNZz7b1s0w0HLwzWawfjexHqAxKG688eMwBJQcl1bmLdx0KDwmcS', 'test@example.com', 'Sam Sepiol', '08543216789', 'regular', '', '2024-04-01', 'male', 'Testing Register page', '2024-04-18 06:58:57', NULL, 'active'),
(7, 'User3', '$2y$10$w88nfB02L8yM9Ggu30pnquktWEntlkywUJRU7UwDxPvptjKAmVIXK', 'test@example.com', 'User tiga', '08543216789', 'regular', '', '2024-04-01', 'male', 'Testing Register page', '2024-04-18 07:06:37', NULL, 'active'),
(8, 'User4', '$2y$10$NiBC9.xfEqJLvzAWTCwCiOAW7QQAqiwI0VJ98Q5oA4r/N1QtdLRQi', 'test@example.com', 'User empat', '08543216789', 'regular', '', '2024-04-01', 'male', 'Testing Register page', '2024-04-18 07:09:36', NULL, 'active'),
(9, 'User5', '$2y$10$ImgjvwPjYoKmyB.CTpU3XuhJhfjxs/a4Tg6RjUhMa/JOytDrGJ2MG', 'test@example.com', 'User lima', '08543216789', 'regular', '', '2024-04-01', 'male', 'Testing Register page', '2024-04-18 07:10:21', NULL, 'active'),
(10, 'user6', '$2y$10$XBliIXsZEA3skM/4S5Xel.QUQ7ohSOO30naLN2azEShcgZS5ViWZu', 'test@examples.com', 'user enam', '08543216789', 'regular', '', '2024-04-08', 'male', 'Testing Register page', '2024-04-18 07:49:23', NULL, 'active'),
(11, 'user7', '$2y$10$8POYz7vFyC02D03bBEtKVuKk6et1fSHqlW2HTDz5ucT.ZXuSkuxkW', 'test@gmail.com', 'user tujuh', '08543216789', 'regular', '', '2024-04-09', 'male', '124', '2024-04-18 08:04:23', NULL, 'active'),
(12, 'user8', '$2y$10$Fo2E.frvZaBWi3EmoWbFpucIuIWV/qaUZzF1hTJlxnTsvzCnZPbhu', 'test123@example.com', 'user delapan', '0812777777', 'regular', '', '0000-00-00', 'male', '', '2024-04-19 05:53:52', NULL, 'active'),
(13, 'johndoe', '$2y$10$XP.5fg89cc9C3EE8K1HHkOsHM9BoaMrMwOs36aJW07t0IYnm2vmJC', 'johndoe@gmail.com', 'John Doe', '08543216789', 'owner', 'Jl. Pancoran Barat IV D No.81, RT.10/RW.1', '0000-00-00', 'male', '', '2024-04-19 06:25:12', NULL, 'active'),
(17, 'admin', '$2y$10$8N0.fqZ8W/kse.gGlu7/jeXDZ1y3QHVLlHmvW6RzS/qK4h4ULjJGK', 'admin@gmail.com', 'admin', '111111111111111', 'admin', '', '0000-00-00', 'male', '', '2024-04-21 21:22:10', NULL, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boarding_house`
--
ALTER TABLE `boarding_house`
  ADD PRIMARY KEY (`boarding_house_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boarding_house`
--
ALTER TABLE `boarding_house`
  MODIFY `boarding_house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boarding_house`
--
ALTER TABLE `boarding_house`
  ADD CONSTRAINT `boarding_house_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
