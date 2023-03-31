-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 03:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CateID` int(11) NOT NULL,
  `CategoryName` varchar(150) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CateID`, `CategoryName`, `Description`) VALUES
(1, 'Điện Thoại', 'ĐT'),
(2, 'Laptop', 'Siêu bền, đẹp'),
(3, 'TV', 'Siêu đẹp');

-- --------------------------------------------------------

--
-- Table structure for table `oderdetail`
--

CREATE TABLE `oderdetail` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `oderdetail`
--

INSERT INTO `oderdetail` (`OrderID`, `ProductID`, `Quantity`) VALUES
(1, 1, 12),
(2, 2, 25),
(3, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `oderproduct`
--

CREATE TABLE `oderproduct` (
  `OderID` int(11) NOT NULL,
  `OderDate` datetime NOT NULL,
  `ShipDate` datetime NOT NULL,
  `ShipName` varchar(150) NOT NULL,
  `ShipAddress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `oderproduct`
--

INSERT INTO `oderproduct` (`OderID`, `OderDate`, `ShipDate`, `ShipName`, `ShipAddress`) VALUES
(1, '2023-03-12 09:04:24', '2023-03-12 09:04:24', 'Nguyen Van A', 'Thu Duc'),
(2, '2023-03-12 16:47:49', '2023-03-12 16:47:49', 'Nguyen Van B', 'Quan 6'),
(3, '2023-03-12 16:58:14', '2023-03-12 16:58:14', 'Nguyen Van C', 'Quan 4');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(150) NOT NULL,
  `CateID` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CateID`, `Price`, `Quantity`, `Description`, `Picture`) VALUES
(0, 'Dell', 2, 345563, 25, ' Siêu bền, đẹp', 'https://th.bing.com/th/id/R.5b9624063cd4192e92b4471063dd9dd9?rik=aairTdURE%2fHQ6Q&pid=ImgRaw&r=0'),
(1, 'Điện Thoại', 1, 123000, 12, 'Điện thoại thông minh', 'https://th.bing.com/th/id/OIP.1PRqQxpcjs1sfTNSC-YR3AHaD0?pid=ImgDet&rs=1'),
(2, 'Laptop', 2, 1234567, 25, 'Laptop siêu đẹp ', 'https://th.bing.com/th/id/OIP.EcmI3oLa7BILgWVdVhaA_QHaE7?pid=ImgDet&rs=1'),
(3, 'Television', 3, 766553, 123, 'Siêu mỏng, full HD', 'https://i5.walmartimages.ca/images/Large/827/786/6000199827786.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(5) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Email`, `Password`) VALUES
(1, 'Admin', 'dieu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CateID`);

--
-- Indexes for table `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `oderproduct`
--
ALTER TABLE `oderproduct`
  ADD PRIMARY KEY (`OderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CateID` (`CateID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`CateID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD CONSTRAINT `oderdetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `oderproduct` (`OderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oderdetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
