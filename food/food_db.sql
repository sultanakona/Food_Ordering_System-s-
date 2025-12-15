-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 07:59 AM
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
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(3, 'Shahed', 'a385d9e8d3b9d07483e610819de992510883b36b');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(21, 2, 5, '7up', 50, 1, '7up.jpg'),
(22, 2, 9, 'Chicken Biriyani', 380, 2, 'Chiken Biriyani.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 2, 'Nazmul Hasan', 'nazmulhasan@gmail.com', '0176245236', 'Improve needed');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'burger-1 (100 x 1) - ', 100, '2024-11-25', 'completed'),
(2, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'burger-1 (100 x 1) - burger-2 (120 x 1) - pizza-1 (100 x 1) - ', 320, '2024-11-25', 'completed'),
(3, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'burger-1 (100 x 1) - burger-2 (120 x 1) - ', 220, '2024-11-25', 'completed'),
(4, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'burger-1 (100 x 1) - burger-2 (120 x 1) - ', 220, '2024-11-25', 'completed'),
(5, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'burger-1 (100 x 1) - pizza-1 (100 x 1) - ', 200, '2024-11-25', 'pending'),
(6, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'pizza-1 (100 x 1) - ', 100, '2024-11-25', 'pending'),
(7, 2, 'Nazmul Hasan', '0176351415', 'nazmulhasan@gmail.com', 'cash on delivery', '3, 61, Mirpur, Dhaka, Dhaka, 1216, Bangladesh - 1216', 'Chocolate Cup Cake (200 x 3) - 7up (50 x 2) - Chicken Biriyani (380 x 3) - ', 1840, '2024-11-25', 'pending'),
(8, 3, 'Mahbub', '0171211265', 'mahbub@gmail.com', 'Bkash', '9, 36, Arambag, Dhaka, Dhaka, 1216, Bangladesh - 1216', 'Beef Biriyani (500 x 3) - Chicken Biriyani (380 x 2) - ', 2260, '2024-11-25', 'completed'),
(9, 2, 'Nazmul Hasan', '0176351415', 'nazmulhasan@gmail.com', 'cash on delivery', '3, 61, Mirpur, Dhaka, Dhaka, 1216, Bangladesh - 1216', 'Beef Biriyani (500 x 2) - Sprite (50 x 2) - Chicken Biriyani (380 x 1) - Chocolate Cup Cake (200 x 2) - ', 1880, '2024-11-26', 'completed'),
(10, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'Beef Biriyani (500 x 1) - ', 400, '2024-11-27', 'pending'),
(11, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'Carofel Platter (750 x 1) - ', 600, '2024-11-27', 'pending'),
(12, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'Chocolate Cup Cake (200 x 1) - ', 160, '2024-11-27', 'pending'),
(13, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'Carofel Platter (750 x 1) - ', 675, '2024-11-27', 'pending'),
(14, 1, 'user2', '0123654789', 'user2@gmail.com', 'cash on delivery', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212', 'Carofel Platter (750 x 1) - Chicken Biriyani (380 x 1) - ', 1017, '2024-11-27', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `sale_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `sale_count`) VALUES
(3, 'pizza-1', 'pizza', 100, 'pizza-1.png', 1),
(5, '7up', 'drinks', 50, '7up.jpg', 1),
(6, 'Beef Biriyani', 'main dish', 500, 'Beef Biriyani.jpg', 3),
(7, 'Chocolate Cup Cake', 'desserts', 200, 'Cake.jpg', 3),
(8, 'Carofel Platter', 'main dish', 750, 'caro.jpg', 3),
(9, 'Chicken Biriyani', 'main dish', 380, 'Chiken Biriyani.jpg', 4),
(10, 'Chessy Pizza', 'fast food', 400, 'Cheesey Pizza.jpg', 0),
(11, 'Chocolate Cake', 'desserts', 230, 'Ch.jpg', 0),
(12, 'Sprite', 'drinks', 50, 'Sprite.jpg', 1),
(13, 'MOJO', 'drinks', 45, 'mojo.jpg', 0),
(14, 'Maxican Burger', 'fast food', 360, 'Maxican burger.jpg', 0),
(15, 'Mutton Biriyani', 'main dish', 470, 'Mutton Biriyani.jpg', 0),
(16, 'Family Platter', 'main dish', 780, 'Family.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` int(11) NOT NULL,
  `promo_code_name` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `promo_code_name`, `amount`, `expire_date`) VALUES
(4, 'promo1', 20, '2024-11-30'),
(5, 'promo2', 10, '2024-11-29'),
(6, 'promo3', 5, '2024-11-30'),
(7, 'promo4', 6, '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `promo_usage`
--

CREATE TABLE `promo_usage` (
  `id` int(11) NOT NULL,
  `promo_code_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo_usage`
--

INSERT INTO `promo_usage` (`id`, `promo_code_id`, `user_id`) VALUES
(1, 4, 1),
(2, 5, 1),
(3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating_tbl`
--

CREATE TABLE `rating_tbl` (
  `id` int(11) NOT NULL,
  `rating_text` varchar(256) NOT NULL,
  `rating_user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_tbl`
--

INSERT INTO `rating_tbl` (`id`, `rating_text`, `rating_user_id`, `rating`, `username`) VALUES
(1, 'Good Food', 1, 5, 'user2'),
(2, 'Food quality is good', 2, 3, 'Nazmul Hasan'),
(3, 'rere', 2, 4, 'Nazmul Hasan'),
(4, 'Nice', 2, 3, 'Nazmul Hasan'),
(5, 'fdfdfdf', 2, 2, 'Nazmul Hasan'),
(6, 'rrrrrrrrrrrrrrrrrrr', 2, 0, 'Nazmul Hasan'),
(7, 'errrrrrrrrrrerere', 1, 4, 'user2'),
(8, 'DFUDIFUDIUEI', 4, 0, 'Swarna Mollick'),
(9, 'fgrrtr', 4, 0, 'Swarna Mollick'),
(10, 'gfggfd', 4, 2, 'Swarna Mollick');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(1, 'user2', 'user2@gmail.com', '0123654789', '8cb2237d0679ca88db6464eac60da96345513964', '9, c/32, arambag, mirpur, dhaka, dhaka, Bangladesh - 1212'),
(2, 'Nazmul Hasan', 'nazmulhasan@gmail.com', '0176351415', '5d3f5cfd4cec011c10d60f29039f05e23a44e37a', '3, 61, Mirpur, Dhaka, Dhaka, 1216, Bangladesh - 1216'),
(3, 'Mahbub', 'mahbub@gmail.com', '0171211265', '24104d6205fadd601155bde3140f9d5863bbce69', '9, 36, Arambag, Dhaka, Dhaka, 1216, Bangladesh - 1216'),
(4, 'Swarna Mollick', 'swarna@gmail.com', '0171234567', 'd6f3e326f43f80f21f03806ae9240eeed6b908f0', '1, 2, Sial Bari, Dhaka, Dhaka, 1216, Bangladesh - 1216');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_usage`
--
ALTER TABLE `promo_usage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promo_code_id` (`promo_code_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rating_tbl`
--
ALTER TABLE `rating_tbl`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promo_usage`
--
ALTER TABLE `promo_usage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating_tbl`
--
ALTER TABLE `rating_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `promo_usage`
--
ALTER TABLE `promo_usage`
  ADD CONSTRAINT `promo_usage_ibfk_1` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_codes` (`id`),
  ADD CONSTRAINT `promo_usage_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
