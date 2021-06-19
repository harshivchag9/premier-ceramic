-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 10:33 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE `premierdb`;
--
-- Database: `premierdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `orderid` varchar(16) NOT NULL,
  `fristname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `houseno` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `orderid`, `fristname`, `lastname`, `houseno`, `street`, `city`, `zipcode`, `state`, `country`, `phone`, `email`) VALUES
(1, '1EA97DE85EB634D5', 'harshiv', 'chag', '103d', 'vardhman nagar', 'jamnagar', 361120, 'gujarat', 'india ', 922751999, 'harshivchag@gmail.com'),
(3, '29E11DC359BAD383', 'h', '123', '123', 'patel colony', 'jamnagar', 361008, 'gujarat', 'india', 2147483647, 'h123@gmail.com'),
(4, '0E2DB0CB2C464590', 'harshiv', 'chag', 'hauag', 'gsvgav gyhva ', 'jamnagar', 361001, 'gujarat', 'india', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `blogimage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `date`, `description`, `blogimage`) VALUES
(2, 'hey', '17-Feb-2019', 'harshiv', 'img/blog/52f2dcc7b542a5678436bd4b0af7adc4PDFtoMP4converter.gif'),
(17, 'harshiv', '17-Feb-2019', 'chag', 'img/blog/edd1005da686f4fd440afccc650721eeBatman-Wallpaper-075-1920x1200.jpg'),
(18, 'hello', '17-Feb-2019', 'hello', 'img/blog/07bb8bfb55292734aaa0014919ac4c4cbattlefield_4_naval_strike-t2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `resume_file` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `User_id` int(30) NOT NULL,
  `Product_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `User_id`, `Product_id`, `quantity`, `date`) VALUES
(137, 2, 83, 10, '2019-02-08'),
(142, 4, 81, 2, '2019-02-28'),
(144, 1, 81, 1, '2019-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cformid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cformid`, `fname`, `lname`, `email`, `subject`, `message`, `remark`, `status`) VALUES
(1, 'harshiv', 'chag', 'harshivchag@gmail.com', 'rate negotiate', 'I am interested to buy your product. my need is 5000 boxes. can we negotiate.', 'sent acknowledgment', 1),
(2, 'cfhs', 'hvh', 'hvh', 'vhv', 'vhv', 'njb', 1),
(4, 'harshivchag', 'harshivchag', 'harshivchag@gmail.com', 'naa', 'cayjvdcbasj adjdcghad cdaiyhjnad fugbfnas fsafdghas dnsvfdhas c adgcjasbchsd  hsd b ugsj v uvbj g uvbkghu bsk fh', 'hayfga', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactdetail`
--

CREATE TABLE `contactdetail` (
  `id` int(2) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `address3` varchar(100) NOT NULL,
  `address4` varchar(100) NOT NULL,
  `callcenternumber` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `addressmap` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactdetail`
--

INSERT INTO `contactdetail` (`id`, `address1`, `address2`, `address3`, `address4`, `callcenternumber`, `email`, `addressmap`) VALUES
(1, 'VARDHMAN MARKETING', 'NEAR APSRA CINEMA', 'TOWN HALL', 'JAMNAGAR - 361001', '9227519999', 'premierceramic@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d413.6438747157462!2d70.07302889254265!3d22.469073972042423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39576abdc9c866bf%3A0xdc090739c979ac8!2sVardhman+Marketing!5e0!3m2!1sen!2sin!4v1551633028186\" width=\"950\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `path` varchar(500) NOT NULL,
  `imgname` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`path`, `imgname`) VALUES
('23c2bf336731da7bb2c0994214dbd5f4', 'tiles/23c2bf336731da7bb2c0994214dbd5f43_The_Elder_Scrolls_V_Skyrim.jpg'),
('74311cb0e954c00b8dbf62947a2ea7a0', '74311cb0e954c00b8dbf62947a2ea7a09200.jpg'),
('2c336630193ea90ac4d2c3445a2238ee', '2c336630193ea90ac4d2c3445a2238ee9200.jpg'),
('1937ed12a7c2a7ba450708a789e8c293', '1937ed12a7c2a7ba450708a789e8c2939200.jpg'),
('harshiv', '114a9a714914c76c7994c503b9c88c6e9200.jpg'),
('hello', '9ca74ae0203552c8d722096edcec449249344.jpg'),
('hello', '93645be63e7691a57b65d088e305f9b949344.jpg'),
('hello', 'baa8c8d0a574d15adc9d43612869323949344.jpg'),
('hello', '45599995acdfcbd92985774f0582eaa849344.jpg'),
('hello', '6b6991e3c056b12e42284c785069600649344.jpg'),
('hello', 'c63d242ef355cf2c448053d48268f1d949344.jpg'),
('hello', '9f5075a2e6535d241727fa75df0b493549344.jpg'),
('hello', '34f3ce788564fe17713818ff56eec64849344.jpg'),
('hello', 'd1f50accb088e0d3653ae9903cff1f0149344.jpg'),
('hello', '807c2cc70d59f09e6b3d99aa49c5199d49344.jpg'),
('hello', '9b53be6ada0f565dbced22597430789549344.jpg'),
('hello', '412ab6adaf382a309a46239aa6a4d51049344.jpg'),
('hello', 'a4dd5eff50b834cd274b18eb3499c35f49344.jpg'),
('hello', 'afa34bf1b29699098d1902d48d0ebece49344.jpg'),
('hello', 'f1243272661a3e4a2ec3efe9a1b06a7449344.jpg'),
('1', '42d77cb53788e9963688aa22591e83489200.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `id` int(11) NOT NULL,
  `orderid` varchar(16) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `payment` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`id`, `orderid`, `product_id`, `user_id`, `quantity`, `date`, `payment`, `status`) VALUES
(46, '1EA97DE85EB634D5', 81, 1, 1, '26-Feb-2019', 1, 'Placed'),
(47, '1EA97DE85EB634D5', 83, 1, 1, '26-Feb-2019', 1, 'Placed'),
(53, '29E11DC359BAD383', 81, 4, 2, '28-Feb-2019', 0, 'payment'),
(54, 'F668BD04D1A6CFC2', 81, 4, 2, '28-Feb-2019', 0, 'payment'),
(55, '0E2DB0CB2C464590', 81, 4, 2, '28-Feb-2019', 1, 'Placed'),
(56, 'CB2653F548F87095', 81, 4, 2, '06-Mar-2019', 0, 'payment'),
(57, '999DF4CE78B966DE', 81, 4, 2, '06-Mar-2019', 1, 'Placed'),
(58, 'A9E18CB5DD9D3AB4', 86, 1, 1, '06-Mar-2019', 1, 'Placed'),
(59, '045752BC5C7F705C', 81, 1, 1, '07-Mar-2019', 0, 'checkout');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `ORDERID` varchar(100) NOT NULL,
  `TXNID` varchar(100) NOT NULL,
  `TXNAMOUNT` int(10) NOT NULL,
  `PAYMENTMODE` varchar(100) NOT NULL,
  `CURRENCY` varchar(100) NOT NULL,
  `TXNDATE` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `RESPCODE` varchar(100) NOT NULL,
  `RESPMSG` varchar(100) NOT NULL,
  `GATEWAYNAME` varchar(100) NOT NULL,
  `BANKTXNID` varchar(100) NOT NULL,
  `BANKNAME` varchar(100) NOT NULL,
  `CHECKSUMHASH` varchar(108) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `ORDERID`, `TXNID`, `TXNAMOUNT`, `PAYMENTMODE`, `CURRENCY`, `TXNDATE`, `STATUS`, `RESPCODE`, `RESPMSG`, `GATEWAYNAME`, `BANKTXNID`, `BANKNAME`, `CHECKSUMHASH`) VALUES
(1, '1EA97DE85EB634D5', '20190226111212800110168482400272238', 502, 'DC', 'INR', '2019-02-26 19:57:34.0', 'TXN_SUCCESS', '01', 'Txn Success', 'HDFC', '4036217121962950', 'Bank', '1rKHPExWSsQ48AKq1bpMQNj5kRf5aRIWkaudQEMRgpe9ercbTv4heTPvUbr2GOSA91JMGyArD/qpauIsRmNITsTMKHYRsOokBKiMoXQKvmg='),
(2, '0E2DB0CB2C464590', '20190228111212800110168633500286814', 384, 'PPI', 'INR', '2019-02-28 16:20:25.0', 'TXN_SUCCESS', '01', 'Txn Success', 'WALLET', '6416800', 'WALLET', 'jfCZb3iQm4z/XT827BufIfcpWzH+V/87TfrL6863ZfDxQBdaG2Ps5P1CUgUjdweY8iaYZgHttgWcr0Rap5RvmJ8d7mUayPQCrVGTJD/YX08='),
(3, '999DF4CE78B966DE', '20190306111212800110168589000295617', 384, 'PPI', 'INR', '2019-03-06 09:59:36.0', 'TXN_SUCCESS', '01', 'Txn Success', 'WALLET', '6443140', 'WALLET', '/kBI444hPIlJFpYTGu9uKdLOl9m+cJXFW2cFaEFf0cQ6unBYG1sbDk9r0xUGBOpL3oc8fGZU06ysE3aWhNZdem/s5+/hqhRvR8rhJCR6sww='),
(4, 'A9E18CB5DD9D3AB4', '20190306111212800110168331200293361', 316, 'DC', 'INR', '2019-03-06 23:25:13.0', 'TXN_SUCCESS', '01', 'Txn Success', 'HDFC', '4036217121962950', 'Bank', 'e2BbeyJ2pNRZCUBWaxmpYI8SUbqqX/5X6Y2urDfGT27tGW4tfgqN5qgYUcMvUYvXH/c34iX2/ROGmkQb0mU8vdVqY5nHHZ0Ru87nX4G/fxA=');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `usage` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `pieceinbox` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `thickness` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `productimg` varchar(500) NOT NULL,
  `product_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_id`, `product_name`, `color`, `type`, `usage`, `stock`, `price`, `pieceinbox`, `weight`, `thickness`, `size`, `productimg`, `product_status`) VALUES
(81, 'harshiv', 'red', 'GVT', 'Floor Tiles', '102', '150', '10', '15', '12mm', '18x12', 'E109', 0),
(83, 'hello', 'blue', 'GVT', 'Parking Tiles', '100', '250', '9', '15', '10mm', '24x12', 'E108', 0),
(85, 'are', 'white', 'Digital Tiles', 'Alivation Tiles', '966', '1699', '19', '26', '12mm', '300x300(1x1)', 'E114', 0),
(86, 'you', 'red', 'Digital Tiles', 'Kitchen Tiles', '556', '255', '9', '12', '8mm', '800x1200(2x4)', 'E112', 0),
(87, '??', 'purple', 'Double Charge', 'Wall Tiles', '121', '999', '15', '19', '8mm', '600x600(2x2)', 'E110', 0),
(88, 'Parking 1205', 'Gray', 'Double Charge', 'Wall Tiles', '2000', '250', '10', '12', '10mm', '300x300(1x1)', 'E111', 0),
(100, '1', 'Blue', 'Double Charge', 'Wall Tiles', '1', '1', '2', '1', '8mm', '600x600(2x2)', 'E107', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_photo`
--

CREATE TABLE `product_photo` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_photo`
--

INSERT INTO `product_photo` (`id`, `product_id`, `image`) VALUES
(14, 'E107', 'img/tiles/bef564e6442afd0a4debae28fe75fee64986715b721db0f15bf1cb75f4e17a373_The_Elder_Scrolls_V_Skyrim.jpg'),
(25, 'E107', 'img/tiles/30e77a8079f20ad25892328194ea526cbad508b40419ff72be619597302325a949344.jpg'),
(26, 'E108', 'img/tiles/de04d788811f26133ea9c6cc2a982805bad508b40419ff72be619597302325a949344.jpg'),
(28, 'E109', 'img/tiles/7553ab00397882228b98da6bdda733debad508b40419ff72be619597302325a949344.jpg'),
(29, 'E114', 'img/tiles/b43f0229a75221015971a378507c71ef4986715b721db0f15bf1cb75f4e17a373_The_Elder_Scrolls_V_Skyrim.jpg'),
(30, 'E112', 'img/tiles/6839c8635ad076e53cad0bf0fc0be62eebcaa8e0e0bbaae7ee45ab8250ede69e3_The_Elder_Scrolls_V_Skyrim.jpg'),
(32, 'E111', 'img/tiles/36fdac85f3f81184ddb7860f1eb9bb6cebcaa8e0e0bbaae7ee45ab8250ede69e3_The_Elder_Scrolls_V_Skyrim.jpg'),
(33, 'E110', 'img/tiles/9f3077adc334cd36fe17a1a2d21b1c97EXCEL PDF.jpg'),
(34, '102C', 'img/tiles/d4a0acb51f9a081d15cdb9bcba8813aeEXCEL PDF.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `recent_id` int(11) NOT NULL,
  `recent_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`recent_id`, `recent_no`, `product_id`, `user_id`) VALUES
(78, 3, 83, 4),
(79, 1, 86, 4),
(80, 2, 88, 4),
(81, 1, 81, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pswrd` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `username`, `email`, `pswrd`, `role`) VALUES
(1, 'harshivchag', 'harshivchag@gmail.com', 'SEByc2hpdjE3MTE=', 'admin'),
(4, 'harshivchag', 'h1@gmail.com', 'SEByc2hpdjE3MTE=', 'admin'),
(7, 'deepakchag', 'h2@gmail.com', 'SEByc2hpdjE3MTE=', 'marketing'),
(9, 'harshivchag', 'h3@gmail.com', 'SEByc2hpdjE3MTE=', 'production');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `address`, `City`, `State`, `Country`, `lat`, `lng`) VALUES
(38, 'Vardhman Marketing', 'Near Apsra cinema , Town hall Jamnagar , gujarat , india', 'jamnagar', 'Gujarat', 'india', 22.470001, 70.071632),
(58, 'Kalyan Polytechnic', 'Near Sekhpat ', 'jamnagar', 'gujarat', 'India', 22.495043, 70.213394),
(59, 'satya sai ', 'near palace ground', 'jamnagar', 'gujarat', 'india', 22.476364, 70.056213);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `User_id` int(20) NOT NULL,
  `Product_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `User_id`, `Product_id`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 83);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cformid`);

--
-- Indexes for table `contactdetail`
--
ALTER TABLE `contactdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`recent_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cformid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `recent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
