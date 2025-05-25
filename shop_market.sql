-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 07:18 AM
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
-- Database: `shop_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`) VALUES
(1, 1, 'නීලකේෂි තෛලය', '~ නීලකේෂි තෛලය ~ \r\n\r\n🔹හිසකෙස් වල අග පැලීම වැළැක්වීම \r\n\r\n🔹හිසකෙස් අකලට වැටීම වැළැක්වීම \r\n\r\n🔹හිසකෙස් අවර්ණ වීම, දුර්වර්ණ වීම, සුදුවර්ණ වීම වැළැක්වීම\r\n\r\n🔹හිසමත හිස්සොරි ඇති වීම වැළැක්වීම\r\n\r\n🔹හිසකෙස් වර්ධනය වීම\r\n\r\n🔹හිසකෙස් ශක්තිමත් වීම\r\n\r\n🔹වැටුනු කෙස් වෙනුවට අලුත් කෙස් ලබා ගැනීම\r\n\r\nආදී කොට ගෙන හිසමත පවතින, හිස කෙස් ආශ්‍රිත ​ සියලු රෝග  තත්වයන් වළකා නිරෝගී කේශකලාපයක් ලබා ගැනීමට දේශීය ශාක සාර වලින් අනූන නීලකේෂී තෛලය භාවිතයෙන් හැකි වේ..\r\n\r\nභාවිතයට උපදෙස්:-\r\n\r\n🔺හිස් කබලට තෙල් යොදන්නේ නම් උදේ නෑමට  පැය දෙකකට පෙර තෙල්  දමා හොඳින් සම්බාහනය කර සෝදා හරින්න..\r\nනැති නම් හිසකෙස්  වලට පමණක් තෙල් යොදන්න..\r\n\r\n⭕ ඉතා සාර්ථක ප්‍රතිඵල ලැබීමට නම් උදේ නෑමට පෙර තෙල් දමා සම්බාහනය කිරීම කල යුතු බව සලකන්න..\r\n\r\n💠 කුරියර් සේවා මගින් ඔ⁣බේ නිවසටම ගෙන්වා ගත හැක.\r\n\r\nWhatsap - 0718892955\r\n\r\n🔴50ml විකුණුම් මිල 600/=\r\n         ඩිස්කවුන්ට් සහිතව විකුණුම් මිල 450/=\r\n\r\n🔴100ml විකුණුම් මිල 1100/=\r\n         ඩිස්කවුන්ට් සහිතව විකුණුම් මිල 750/=\r\n\r\n🔴200ml විකුණුම් මිල 1700/=\r\n         ඩිස්කවුන්ට් සහිතව විකුණුම් මිල 1400/=', '2025-04-25 06:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'නීලකේෂි තෛලය', 850.00, 'images/nilakeshi.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Dinitha jayawardhana ', 'dinitha5@gmail.com', '$2y$10$1lVsndb2aqg2.tPj67UCu.c9FjlAYmNcPcCVX8U/UCH0BF/tViEze');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
