-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 07:37 AM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` varchar(10) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `seller` bigint(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category_id`, `active`, `seller`, `created_at`, `updated_at`) VALUES
(5, 'Áo khoác', NULL, 4500000, NULL, 'clothes', 1, NULL, '2023-11-04 09:53:23', '2023-11-17 10:05:17'),
(6, 'Giày Nike', NULL, 1600000, NULL, 'shoes', 1, NULL, '2023-11-04 12:29:07', '2023-11-17 10:05:22'),
(7, 'Áo sơ mi', 'Áo sơ mi size XXL', 450000, 'https://pos.nvncdn.net/603305-98807/ps/20220514_SNyW5NxiPa0dPihEpckotfko.JPG', 'clothes', 1, NULL, '2023-11-17 09:09:41', '2023-11-17 10:05:26'),
(8, 'How the body works', 'Sách khoa học', 190000, 'https://cdn0.fahasa.com/media/catalog/product/i/m/image_192412.jpg', 'books', 1, NULL, '2023-11-17 09:19:52', '2023-11-17 10:05:30'),
(9, 'nguyenvu', 'fdsgsdfgdsfg', 345545, 'assets/uploads/294737811_5584319494944306_8580794540264765724_n.jpg', 'clothes', 1, NULL, '2023-11-17 11:30:28', '2023-11-17 12:28:04'),
(10, 'hướng đối tượng', 'gjfhgkjsdf', 1233330, 'assets/uploads/_logoBK.png', 'books', 1, NULL, '2023-11-17 12:28:29', '2023-11-17 12:28:29'),
(11, 'javascript', 'programming', 2345460, 'assets/uploads/braindownloadmeme.jpg', 'books', 1, NULL, '2023-11-17 12:36:43', '2023-11-17 12:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 0,
  `amountItems` tinyint(1) DEFAULT 0,
  `productsInCart` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `amountItems`, `created_at`, `updated_at`, `token`) VALUES
(21, 'khang', '$2y$10$CqzN8YYe9rvMJpGVQj.neuN4oTge6jyeREueoUIWx0G.fJrBeDh9S', 'quangkhangvnvn@gmail.com', 0, 0, NULL, '2023-11-24 15:11:24', '2023-11-24 17:32:49', NULL),
(22, 'khang2', '$2y$10$CqzN8YYe9rvMJpGVQj.neuN4oTge6jyeREueoUIWx0G.fJrBeDh9S', 'quangkhangvnvn@gmail.com', 0, 0, NULL, '2023-11-24 15:11:24', '2023-11-24 17:32:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
