-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 11:01 AM
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
-- Database: `orderfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'student', '$2y$10$mElcWP7WPF9oNbazzcdrfuJO61DBMbXX2aw9k1MgCNQUXPF9D6Qma');

-- --------------------------------------------------------

--
-- Table structure for table `menucategories`
--

CREATE TABLE `menucategories` (
  `Category_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menucategories`
--

INSERT INTO `menucategories` (`Category_ID`, `Name`) VALUES
(1, 'heavy meal'),
(2, 'dessert'),
(3, 'drink');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `Item_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Category_ID` int(11) DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`Item_ID`, `Name`, `Description`, `Price`, `Category_ID`, `ImageURL`) VALUES
(1, 'Chicken Burger', 'Chicken burger adalah sejenis burger yang menggunakan daging ayam sebagai bahan utamanya. Daging ayam ini biasanya diolah menjadi patty, kemudian dipanggang atau digoreng.', 30000.00, 1, '../images/chickenburger.jpg'),
(2, 'Fish Burger', 'Sejenis burger yang menggunakan ikan sebagai bahan utamanya. Ikan tersebut biasanya diolah menjadi patty, kemudian dipanggang atau digoreng. Ini adalah alternatif yang populer untuk burger daging, menawarkan rasa unik dan lebih ringan.', 25000.00, 1, '../images/fishburger.jpg'),
(3, 'Beef Burger', 'Hidangan yang terdiri dari patty daging sapi yang dibentuk dan dipanggang atau digoreng, yang kemudian disajikan di dalam sepotong roti. Ini adalah hidangan yang populer di seluruh dunia.', 35000.00, 1, '../images/beefburger.jpg'),
(4, 'Tuna Pizza', 'Variasi pizza yang menggunakan tuna sebagai salah satu bahan utamanya. Tuna ini bisa berupa tuna kalengan yang dihancurkan atau potongan tuna segar. Tuna tersebut biasanya dipadukan dengan saus tomat, keju, dan tambahan lainnya, menciptakan kombinasi rasa gurih dan sedikit pedas.', 55000.00, 1, '../images/tunapizza.jpg'),
(5, 'Supreme Pizza', 'Pizza yang terkenal dengan beragam bahan tambahan yang melimpah. Pizza ini biasanya berisi campuran daging, sayuran, dan rempah-rempah. Bahan-bahan yang umumnya ada pada supreme pizza meliputi sosis, pepperoni, jamur, paprika, bawang, dan olive. Semua komponen ini menciptakan rasa yang beragam dan lezat.', 60000.00, 1, '../images/supremepizza.jpg'),
(6, 'Smoked Cheese Pizza', 'Pizza yang khas dengan rasa keju yang diasap atau beraroma asap. Keju asap ini memberikan pizza rasa yang unik dan kaya. Selain keju asap, pizza ini bisa memiliki bahan tambahan lain seperti ham, jamur, dan saus tomat.', 58000.00, 1, '../images/smokedcheesepizza.jpg'),
(7, 'Strawberry Juice', 'Minuman segar yang dihasilkan dari buah stroberi yang matang. Jus ini dikenal karena rasa manis dan sedikit asamnya. Stroberi mengandung banyak vitamin C dan antioksidan.', 18000.00, 3, '../images/strawberryjuice.jpg'),
(8, 'Lemon Juice', 'Minuman yang dibuat dari perasan buah lemon. Rasanya sangat asam, yang memberikan kesegaran khas lemon. Jus lemon sering digunakan sebagai bahan dasar dalam berbagai minuman.', 16000.00, 3, '../images/lemonjuice.jpg'),
(9, 'Orange Juice', 'Minuman yang populer di seluruh dunia. Rasanya manis dan sedikit asam, dengan sentuhan segar dari buah jeruk. Jus jeruk mengandung banyak vitamin C.', 17000.00, 3, '../images/orangejuice.jpg'),
(10, 'Strawberry Ice Cream', 'Es krim ini dibuat dengan campuran stroberi segar atau sirup stroberi yang memberikan rasa manis dan sedikit asam. Es krim stroberi seringkali memiliki potongan-potongan buah stroberi yang memberikan tekstur tambahan.', 25000.00, 2, '../images/strawberryice.jpeg'),
(11, 'Vanilla Ice Cream', 'Varian klasik yang memiliki rasa vanila yang lezat. Rasa vanila berasal dari ekstrak vanila alami atau buah vanila. Es krim ini memiliki cita rasa lembut dan krimi yang mendukung berbagai toping atau saus.', 22000.00, 2, '../images/vanillaice.jpeg'),
(12, 'Chocolate Ice Cream', 'Es krim dengan rasa cokelat yang kaya dan menggugah selera. Biasanya dibuat dengan campuran cokelat yang meleleh dalam adonan es krim, memberikan rasa manis dan penuh cokelat.', 26000.00, 2, '../images/chocoice.jpeg'),
(13, 'Tiramisu', 'Sejenis kue atau pencuci mulut yang berasal dari Italia. Ini terbuat dari lapisan kue ladyfinger yang direndam dalam kopi, dengan lapisan krim keju mascarpone yang lembut di antara lapisan-lapisan kue.', 32000.00, 2, '../images/tiramisu.jpg'),
(14, 'Strawberry Milktea', 'Minuman yang menggabungkan rasa segar dari buah strawberry dengan kelezatan dari susu dan teh. Minuman ini dibuat dengan campuran teh hitam, susu, gula, dan sirup atau potongan buah strawberry. Rasanya manis, krimi, dan memiliki rasa teh yang ringan.', 28000.00, 3, '../images/strawberrymilktea.jpeg'),
(15, 'Waffle Ice Cream', 'Wafel hangat yang renyah yang disajikan dengan es krim. Wafel biasanya dipanggang segar dan memiliki tekstur yang garing di luar dan lembut di dalam.', 29000.00, 2, '../images/waffleice.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Item_ID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Order_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `User_ID`, `Item_ID`, `Quantity`, `Order_Date`) VALUES
(1, NULL, NULL, 1, '2023-10-23 05:14:57'),
(2, NULL, NULL, 2, '2023-10-23 05:46:22'),
(4, NULL, 2, 3, '2023-10-23 05:51:46'),
(5, NULL, NULL, 2, '2023-10-23 06:19:55'),
(6, NULL, NULL, 1, '2023-10-23 06:19:55'),
(7, NULL, NULL, 4, '2023-10-23 06:24:19'),
(8, NULL, NULL, 1, '2023-10-23 06:24:19'),
(9, NULL, NULL, 1, '2023-10-23 06:32:00'),
(10, NULL, NULL, 1, '2023-10-23 07:14:04'),
(11, NULL, NULL, 1, '2023-10-23 07:29:15'),
(12, NULL, NULL, 1, '2023-10-23 07:29:15'),
(13, NULL, NULL, 1, '2023-10-23 07:52:16'),
(14, NULL, NULL, 2, '2023-10-23 07:52:16'),
(15, NULL, NULL, 2, '2023-10-23 22:49:54'),
(16, NULL, NULL, 1, '2023-10-23 22:49:54'),
(17, NULL, 1, 1, '2023-10-24 03:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Gender` enum('male','female','other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Password`, `First_Name`, `Last_Name`, `Birthdate`, `Gender`) VALUES
(1, 'dino', '$2y$10$VupLInoFUx2KESrAAhnOc.ZpY6WG2efmXPKMG8F9DM4BwZ2mCrXOi', 'Dino', 'Oyen', '2023-10-24', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `menucategories`
--
ALTER TABLE `menucategories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`Item_ID`),
  ADD KEY `Category_ID` (`Category_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menucategories`
--
ALTER TABLE `menucategories`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `menucategories` (`Category_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `menuitems` (`Item_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
