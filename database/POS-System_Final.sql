-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2026 at 07:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Liza Sombrero', 'LZ@gmail.com', '09171234567', '2026-09-30 22:59:10'),
(2, 'Nadine Losestreak', 'NL@gmail.com', '09181234567', '2026-09-30 22:59:10'),
(3, 'Angela Roamer', 'roamgela@yahoo.com', '09191234567', '2026-09-30 22:59:10'),
(4, 'Kathrine Bernardino', 'kathdin@yahoo.com', '09201234567', '2026-09-30 22:59:10'),
(5, 'Mani Mendoza', 'MM@gmail.com.com', '09211234567', '2026-09-30 22:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock_quantity`, `image`, `created_at`) VALUES
(1, 'Classic Chocolate Chip Cookie', 45.00, 25, '1791559498_5aa52f3653492ab27c57.jpg', '2026-10-07 22:36:29'),
(2, 'Red Velvet Cookie', 50.00, 21, '1791559595_8de2e4d707941e6f5363.jpg', '2026-10-07 22:36:29'),
(3, 'Double Chocolate Cookie', 50.00, 20, '1791559639_0b8663779434d5f82a2c.webp', '2026-10-07 22:36:29'),
(4, 'Matcha with White Chocolate Cookie', 55.00, 18, '1791559774_8db6c0e1f2244207979e.jpg', '2026-10-07 22:36:29'),
(5, 'Oatmeal Raisin Cookie', 40.00, 25, '1791559890_3bf8b850efe9132e90c4.jpg', '2026-10-07 22:36:29'),
(6, 'Biscoff Cookie', 60.00, 12, '1791384470_eb9fd2086f284387ec30.jpg', '2026-10-07 14:47:49'),
(7, 'Crinkle Cookies', 15.00, 9, '1791560359_4cd0a7bfb4ab0b36369d.webp', '2026-10-09 15:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `sold_by` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `sold_by`, `quantity`, `total_price`, `created_at`) VALUES
(2, 2, 1, 1, 2, 100.00, '2026-10-09 15:01:34'),
(3, 2, 2, 1, 2, 100.00, '2026-10-09 15:02:42'),
(4, 1, 2, 1, 5, 225.00, '2026-10-09 16:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `avatar`, `created_at`, `password`) VALUES
(1, 'admin', 'Admin User', '1791562729_5455605e92b738464bd0.jpg', '2026-09-30 22:59:10', '$2y$10$WbdfOgvK42LRQxc0VxA7eeEBtq5mmHd4XbIat36Ff0wnqhht1Ww9e'),
(2, 'Ramram', 'Ramcel Nicole Manasis', '1791562253_38faaaa116e69a49df50.jpg', '2026-09-30 22:59:10', ''),
(3, 'ysa', 'Athena Ysabelle Mae Palomo', '1791562311_17d76261ce1eee3a696f.jpg', '2026-09-30 22:59:10', ''),
(7, 'Ashii', 'Asher Capellan', '1791562385_2dd518f5ceaaf1eda225.jpg', '2026-10-09 15:08:02', '$2y$10$L.3f0TAY.QNDrNvSRzIEZOpvUBEO.RlgWXtaL5XGjc8Ijk8e01cmq'),
(8, 'jai', 'Jirha C. Abit', '1791562650_1aa88dfab30abbfd5b99.jpg', '2026-10-09 16:17:03', '$2y$10$4f2q/sankbwNob0dQ/XMvecvqBr.9gVJ1Rnap57l3i3M5vq8T8./O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sales_product` (`product_id`),
  ADD KEY `fk_sales_customer` (`customer_id`),
  ADD KEY `fk_sales_user` (`sold_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_sales_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_sales_user` FOREIGN KEY (`sold_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
