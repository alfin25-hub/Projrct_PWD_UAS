-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2026 at 04:24 PM
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
-- Database: `loop_soul`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(50) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `product_id` int(100) DEFAULT NULL,
  `product_name` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `subtotal` double NOT NULL,
  `order_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Diproses','Dikirim','Selesai','Dibatalkan') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `id_users`, `product_id`, `product_name`, `full_name`, `phone`, `address`, `qty`, `price`, `subtotal`, `order_at`, `status`) VALUES
(12, 5, 1, 'Ag Berry Boo', 'qrqer', 'rarw', '34243', '1', 500000, 500000, '2026-06-21 03:04:01', 'Dibatalkan'),
(15, 5, 1, 'Ag Berry Boo', 'wani', '312', 'rwere', '3', 5000, 15000, '2026-06-21 06:00:31', 'Selesai'),
(18, 11, 4, 'Ag Jackfruit', 'asd', 'adsd', 'DW', '1', 5000, 5000, '2026-06-22 06:42:02', 'Dibatalkan'),
(19, 11, 4, 'Ag Jackfruit', 'asd', 'adsd', 'DW', '1', 5000, 5000, '2026-06-22 06:42:08', 'Dibatalkan'),
(20, 11, 4, 'Ag Jackfruit', 'asd', 'adsd', 'DW', '1', 5000, 5000, '2026-06-22 06:42:43', 'Dibatalkan'),
(22, 11, 4, 'Ag Jackfruit', 'dwnkjd', '21283', 'uuehqw\n', '1', 5000, 5000, '2026-06-22 12:19:38', 'Dibatalkan'),
(23, 11, 5, 'Ag Jeyifis', 'dwnkjd', '21283', 'fsrf', '2', 5000, 10000, '2026-06-22 13:16:49', 'Dibatalkan'),
(24, 11, 4, 'Ag Jackfruit', 'dqwdw', 'qwdw', 'jfyd', '1', 5000, 5000, '2026-06-22 14:01:09', 'Dibatalkan'),
(25, 11, 5, 'Ag Jeyifis', '323', 'erwr', 'rwer3', '1', 5000, 5000, '2026-06-22 15:35:03', 'Dibatalkan'),
(26, 11, 5, 'Ag Jeyifis', 'gfcrdxr', '2345678', 'bgycrxrdx', '1', 5000, 5000, '2026-06-23 02:33:57', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `frm_accessories`
--

CREATE TABLE `frm_accessories` (
  `id_frm_acc` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `product_type` varchar(20) NOT NULL,
  `deadline` date NOT NULL,
  `size` varchar(100) NOT NULL,
  `yarn_type` varchar(20) NOT NULL,
  `product_color` text NOT NULL,
  `special_request` text NOT NULL,
  `quantity` varchar(1000) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frm_accessories`
--

INSERT INTO `frm_accessories` (`id_frm_acc`, `id_users`, `product_type`, `deadline`, `size`, `yarn_type`, `product_color`, `special_request`, `quantity`, `order_date`) VALUES
(7, 8, 'Cincin', '2026-06-21', '12', 'Tali Giok', 'dqwdw', '2e12e', '12', '2026-06-21 13:06:27'),
(9, 11, 'Cincin', '2026-06-24', '145', 'Benang Non Elastis', 'mejikuhibiniu', 'saddaw', '12', '2026-06-23 02:36:25'),
(10, 11, 'Cincin', '2026-06-26', '145', 'Benang Elastis', '123456789', '123456789', '123', '2026-06-24 13:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `frm_crochet`
--

CREATE TABLE `frm_crochet` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `product_type` varchar(50) NOT NULL,
  `deadline` date NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(100) NOT NULL,
  `budget` double NOT NULL,
  `special_request` text NOT NULL,
  `quantity` varchar(1000) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frm_crochet`
--

INSERT INTO `frm_crochet` (`id`, `id_users`, `product_type`, `deadline`, `size`, `color`, `budget`, `special_request`, `quantity`, `order_date`) VALUES
(24, 8, 'Amigurumi', '2026-06-23', '6', 'dawdwq', 0, '123', '213', '2026-06-21 13:15:34'),
(25, 8, 'Amigurumi', '2026-06-21', '6', 'nhbgbsvrf', 0, '3e432e12', '213', '2026-06-21 13:49:53'),
(26, 8, 'Amigurumi', '2026-06-21', 'dqedewde', 'cewfwecdew', 0, 'fwedwedw', '2', '2026-06-21 13:53:15'),
(27, 10, 'Hair Clip', '2026-06-26', '1', 'merah', 10000, 'no ada', '123', '2026-06-21 15:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `photo`, `category`) VALUES
(1, 'Ag Berry Boo', 'Warna:\r\nUkuran:', 5000, 'amigurumi/ag_berry_boo.jpeg', 'Amigurumi'),
(3, 'ag frogie', 'Warna:\r\nUkuran:', 2500, 'amigurumi/ag_frogie.jpeg', 'Amigurumi'),
(4, 'Ag Jackfruit', 'Warna:\r\nUkuran:', 5000, 'amigurumi/ag_jackyfruit.jpeg', 'Amigurumi'),
(5, 'Ag Jeyifis', 'Warna:\r\nUkuran:', 5000, 'amigurumi/ag_jeyifis.jpeg', 'Amigurumi'),
(6, 'Lil\' Cowbie', 'Warna:\r\nUkuran:', 5000, 'amigurumi/ag_lil\'_cowbie.jpeg', 'Amigurumi'),
(7, 'Mini Mushroom', 'Warna:\r\nUkuran:', 5000, 'amigurumi/ag_mini_mushroom.jpeg', 'Amigurumi'),
(8, 'Oscar\'s Pikies', 'Warna:\r\nUkuran:', 5000, 'amigurumi/ag_oscar\'s_pikies.jpeg', 'Amigurumi'),
(10, 'Honey Bee', 'Warna:\r\nUkuran:', 2000, 'cincin/cc_honey_bee.jpeg', 'Cincin'),
(11, 'Sanrio', 'Warna: \r\nUkuran:', 2000, 'cincin/cc_sanrio.jpeg', 'Cincin'),
(12, 'Wildberry', 'Warna:\r\nUkruan:', 2000, 'cincin/cc_wildberry.jpeg', 'Cincin'),
(13, 'Dreamy Daisy', 'Warna:\r\nUkuran:', 12000, 'gelang_kaki/gk_dreamy_daisy.jpeg', 'Gelang Kaki'),
(14, 'Fully Beads', 'Warna:\r\nUkuran:', 12000, 'gelang_kaki/gk_fully_beads.jpeg', 'Gelang Kaki'),
(15, 'Pearl', 'Warna:\r\nUkuran:', 12000, 'gelang_kaki/gk_pearl.jpeg', 'Gelang Kaki'),
(16, 'Wild Berry', 'Warna:\r\nUkuran:', 12000, 'gelang_kaki/gk_wildberry.jpeg', 'Gelang Kaki'),
(17, 'Dreamy Daisy', 'Warna:\r\nUkuran:', 10000, 'gelang_tangan/gt_dreamy_daisy.jpeg', 'Gelang Tangan'),
(18, 'Four Flower', 'Warna:\r\nUkuran:', 10000, 'gelang_tangan/gt_four_flower.jpeg', 'Gelang Tangan'),
(19, 'Honey Bee', 'Warna:\r\nUkuran:', 10000, 'gelang_tangan/gt_honey_bee.jpeg', 'Gelang Tangan'),
(20, 'Monchrome Beads', 'Warna:\r\nUkuran:', 10000, 'gelang_tangan/gt_monchrome_beads.jpeg', 'Gelang Tangan'),
(21, 'Pearl', 'Warna:\r\nUkuran:', 10000, 'gelang_tangan/gt_pearl.jpeg', 'Gelang Tangan'),
(22, 'Simple Braid', 'Warna:\r\nUkuran:', 10000, 'gelang_tangan/gt_simple_braid.jpeg', 'Gelang Tangan'),
(23, 'Sunset', 'Warna:\r\nUkuran:', 10000, 'gelang_tangan/gt_sunset.jpeg', 'Gelang Tangan'),
(24, 'Wildberry', 'Warna:\r\nUkuran:', 10000, 'gelang_tangan/gt_wildberry.jpeg', 'Gelang Tangan'),
(25, 'Rapunzel Flower', 'Warna:\r\nUkuran:', 20000, 'hair_clip/hc_rapunzel_flower.jpeg', 'Hair Clip'),
(26, 'Sprout', 'Warna:\r\nUkuran:', 20000, 'Hair_clip/hc_sprout.jpeg', 'Hair Clip'),
(27, 'Sun Flower', 'Warna:\r\nUkuran:', 20000, 'hair_clip/hc_sunflower.jpeg', 'Hair Clip'),
(28, 'Telur', 'Warna:\r\nUkuran:', 20000, 'hair_clip/hc_telur.jpeg', 'Hair Clip'),
(29, 'Tulip', 'Warna:\r\nUkuran:', 20000, 'hair_clip/hc_tulip.jpeg', 'Hair Clip'),
(30, 'XXX', 'Warna:\r\nUkuran:', 20000, 'hair_clip/hc_xxx.jpeg', 'Hair Clip'),
(32, 'Color Pop', 'Warna:\r\nUkuran:', 1500, 'cincin/cc_color_pop.jpeg', 'Cincin'),
(33, 'Grape', 'Warna:\r\nUkuran:', 1500, 'cincin/cc_grape.jpeg', 'Cincin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `full_name`, `email`, `phone_number`, `address`, `username`, `password`, `created_at`, `role`) VALUES
(5, 'ALFIN', 'alfin25@itbss.ac.id', '6437461836398101', 'siantan', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2026-06-20 08:26:47', 'admin'),
(8, 'wani', 'wani123@gmail.com', '1234567890', 'Sambas', 'wani123', '81dc9bdb52d04dc20036dbd8313ed055', '2026-06-21 03:54:56', 'admin'),
(10, 'sasi', 'sasi123@gmail.com', '2567923864378232', 'sungai jawi', 'sasi', '81dc9bdb52d04dc20036dbd8313ed055', '2026-06-21 15:42:51', 'user'),
(11, 'Alfin ', 'alfin123@gmail.com', '083153437434', 'Jl. Hosana Fortuna No. B23 Sungai Raya', 'alfin321', '81dc9bdb52d04dc20036dbd8313ed055', '2026-06-22 05:32:40', 'user'),
(12, 'Susi', 'susi1234@gmail.com', '081263638653', 'Jl. Purnama ll', 'Susi321', '81dc9bdb52d04dc20036dbd8313ed055', '2026-06-24 14:01:55', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_checkout_user` (`id_users`),
  ADD KEY `fk_checkout_product` (`product_id`);

--
-- Indexes for table `frm_accessories`
--
ALTER TABLE `frm_accessories`
  ADD PRIMARY KEY (`id_frm_acc`),
  ADD KEY `fk_acc_user` (`id_users`);

--
-- Indexes for table `frm_crochet`
--
ALTER TABLE `frm_crochet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_crochet_user` (`id_users`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `frm_accessories`
--
ALTER TABLE `frm_accessories`
  MODIFY `id_frm_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `frm_crochet`
--
ALTER TABLE `frm_crochet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `fk_checkout_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_checkout_user` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `frm_accessories`
--
ALTER TABLE `frm_accessories`
  ADD CONSTRAINT `fk_acc_user` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `frm_crochet`
--
ALTER TABLE `frm_crochet`
  ADD CONSTRAINT `fk_crochet_user` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
