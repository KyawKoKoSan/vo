-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 10:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visibleone_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('0','1','2') NOT NULL DEFAULT '2',
  `photo` varchar(255) NOT NULL DEFAULT '''default.png''',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `photo`, `created_at`) VALUES
(1, 'Test', 'test@mail.com', '$2y$10$qpujHKfKIhG4C2s99HoMeORUlOtGg0hk5PCAtq8sZauFlS.ew4sCC', '0', 'profile.jpg', '2024-06-08 06:57:11'),
(2, 'editor', 'editor@mail.com', '$2y$10$KINzRochSMbVOnGSBYJJseyRI34ioWIEjGjCBU2z4a99285/IdYL6', '1', 'default.png', '2024-06-08 07:06:41'),
(3, 'viewer1', 'viewer@mail.com', '$2y$10$ktuCIXr6jkF9u/GiGCsm7efMB3e2iGUrcVi1UY3GSxwzeqgI0T8nS', '2', 'default.png', '2024-06-08 07:07:03'),
(4, 'test1', 'test1@mail.com', '$2y$10$4GLJrb2EAl7PY0kVServcOS7JiM7owc/FAvQzSw4DNc8LSD32FUHm', '2', 'default.png', '2024-06-08 07:27:30'),
(5, 'test2', 'test2@mail.com', '$2y$10$BgkIES2M92EYn9P1OGH2dustGqZxJxj8YB/h9MKTC8xptwRC9vBZK', '2', 'default.png', '2024-06-08 07:27:52'),
(6, 'editor test3', 'test3@mail.com', '$2y$10$RQpf/cfxKLCR9W/3e.qkduP4NoUScgTFsFhPhiz2IX6.agUKkbHdC', '2', 'default.png', '2024-06-08 07:28:13'),
(10, 'test edtior', 'testdone@mail.com', '$2y$10$Dp1db6/8OfRAb5xlOAzXD.jKrloOoMGJSHD6ZRceUOrF3orIT4F8a', '2', 'default.png', '2024-06-08 08:08:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
