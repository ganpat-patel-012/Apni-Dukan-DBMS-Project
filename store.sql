-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 09:40 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `showInvoice _to_emp` ()  NO SQL
select invoice_id,CONCAT(c_fname, ' ', c_lname) as cname,CONCAT(e_fname, ' ', e_lname) as ename, invoice_date,total_after_tax from invoice i, customer c, employee e where c.c_mobile=i.c_mobile and e.e_id=i.e_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showInvoice_to_customer` (IN `cm` BIGINT)  NO SQL
SELECT invoice_id,CONCAT(e.e_fname, ' ', e.e_lname) AS name,total_after_tax,invoice_date FROM invoice i,employee e where i.e_id=e.e_id and c_mobile=cm$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `pswd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pswd`) VALUES
('admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(40) NOT NULL,
  `cat_des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`) VALUES
(1001, 'Toys', 'This category contains Toys.'),
(1002, 'Gifts', 'This category contains Gifts.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` bigint(25) NOT NULL,
  `calltime` varchar(25) NOT NULL,
  `comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `calltime`, `comments`) VALUES
(1, 'Ganpat', 'gapu8540@gmail.com', 9672836724, 'Afternoon', 'Feedback occurs when outputs of a system are routed back as inputs as part of a chain of cause-and-effect that forms a circuit or loop.[1] The system can then be said to feed back into itself. The notion of cause-and-effect has to be handled carefully when applied to feedback systems.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_fname` varchar(25) NOT NULL,
  `c_lname` varchar(25) NOT NULL,
  `c_mobile` bigint(25) NOT NULL,
  `c_pswd` varchar(25) NOT NULL,
  `c_address` varchar(40) NOT NULL,
  `c_gender` char(1) NOT NULL,
  `c_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_fname`, `c_lname`, `c_mobile`, `c_pswd`, `c_address`, `c_gender`, `c_dob`) VALUES
(101, 'Ashutosh', 'Kumar', 9672836721, '12345', 'Udupi', 'm', '2019-11-13'),
(103, 'Deepak  K', 'Nayak', 9672836723, '12345', 'Manglore', 'm', '2019-11-18');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `addlog` AFTER INSERT ON `customer` FOR EACH ROW INSERT INTO customer_logs VALUES(null,NEW.c_mobile,'Customer Added',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deletelog` BEFORE DELETE ON `customer` FOR EACH ROW INSERT into customer_logs VALUES(null,Old.c_mobile,"Customer Deleted",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelog` BEFORE UPDATE ON `customer` FOR EACH ROW insert into customer_logs VALUES(null,NEW.c_mobile,"Customer Updated",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_logs`
--

CREATE TABLE `customer_logs` (
  `id` int(11) NOT NULL,
  `c_mobile` bigint(11) NOT NULL,
  `action` varchar(25) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_logs`
--

INSERT INTO `customer_logs` (`id`, `c_mobile`, `action`, `time`) VALUES
(1, 9672836723, 'New Customer Added', '2019-11-23 22:26:28'),
(2, 9672836724, 'New Customer Added', '2019-11-23 22:28:19'),
(3, 9672836724, 'Customer Updated', '2019-11-23 22:32:33'),
(4, 9672836724, 'Customer Deleted', '2019-11-23 22:34:53'),
(5, 9672836723, 'Customer Updated', '2019-11-24 11:35:18'),
(6, 9672836723, 'Customer Updated', '2019-11-24 11:35:45'),
(7, 9672836723, 'Customer Updated', '2019-11-24 11:49:12'),
(8, 9672836722, 'Customer Deleted', '2019-11-24 12:56:10'),
(9, 9672836723, 'Customer Updated', '2019-11-24 12:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `e_word` varchar(25) NOT NULL,
  `e_pswd` varchar(25) NOT NULL,
  `e_fname` varchar(25) NOT NULL,
  `e_lname` varchar(25) NOT NULL,
  `e_mobile` bigint(20) NOT NULL,
  `e_address` varchar(40) NOT NULL,
  `e_dob` date NOT NULL,
  `e_gender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_word`, `e_pswd`, `e_fname`, `e_lname`, `e_mobile`, `e_address`, `e_dob`, `e_gender`) VALUES
(1, 'air', '12345', 'Ganpat', 'Patel Luni', 9672836724, 'Udupi', '2000-04-24', 'm'),
(2, 'run', '12345', 'Raunak', 'C', 9672836725, 'Jodhpur', '1999-03-15', 'm'),
(3, 'go', '12345', 'Tarun', 'Patel', 9672836726, 'Barmer', '2019-11-12', 'm'),
(4, 'try', '12345', 'Raghav', 'Deep', 9672836727, 'Ajmer', '2019-11-06', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `c_mobile` bigint(25) NOT NULL,
  `total_before_tax` decimal(10,2) NOT NULL,
  `total_tax` decimal(10,2) NOT NULL,
  `tax_per` varchar(250) NOT NULL,
  `total_after_tax` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `e_id`, `invoice_date`, `c_mobile`, `total_before_tax`, `total_tax`, `tax_per`, `total_after_tax`) VALUES
(11, 1, '2019-11-17 04:44:41', 9672836721, '998.00', '19.96', '2', 1017.96),
(12, 2, '2019-11-17 06:35:20', 9672836721, '1497.00', '59.88', '4', 1556.88),
(13, 1, '2019-11-17 15:22:00', 9672836722, '1387.00', '69.35', '5', 1456.35),
(14, 2, '2019-11-18 03:51:59', 9672836721, '2334.00', '0.00', '', 2334.00),
(15, 1, '2019-11-18 13:28:15', 9672836721, '1996.00', '0.00', '', 1996.00),
(16, 1, '2019-11-21 07:23:48', 9672836722, '2554.00', '127.70', '5', 2681.70),
(17, 1, '2019-11-24 07:39:50', 9672836723, '3006.00', '180.36', '6', 3186.36);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `pro_id` varchar(25) NOT NULL,
  `pro_name` varchar(25) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `final_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `invoice_id`, `pro_id`, `pro_name`, `quantity`, `price`, `final_amount`) VALUES
(14, 11, '10001', 'Remote Control Car', '2.00', '499.00', '998.00'),
(15, 12, '10001', 'Remote Control Car', '3.00', '499.00', '1497.00'),
(16, 13, '10001', 'Remote Control Car', '2.00', '499.00', '998.00'),
(17, 13, '10002', 'Taj Mahal', '1.00', '389.00', '389.00'),
(18, 14, '10002', 'Taj Mahal', '6.00', '389.00', '2334.00'),
(19, 15, '10001', 'Remote Control Car', '4.00', '499.00', '1996.00'),
(20, 16, '10001', 'Remote Control Car', '4.00', '389.00', '1556.00'),
(21, 16, '10002', 'Taj Mahal', '2.00', '499.00', '998.00'),
(55, 17, '10003', 'Taj Mahal update', '6.00', '501.00', '3006.00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `print`
-- (See below for the actual view)
--
CREATE TABLE `print` (
`order_item_id` int(11)
,`invoice_id` int(11)
,`pro_id` varchar(25)
,`pro_name` varchar(25)
,`quantity` decimal(10,2)
,`price` decimal(10,2)
,`final_amount` decimal(10,2)
,`e_id` int(11)
,`invoice_date` timestamp
,`c_mobile` bigint(25)
,`total_before_tax` decimal(10,2)
,`total_tax` decimal(10,2)
,`tax_per` varchar(250)
,`total_after_tax` double(10,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(25) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pro_des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `cat_id`, `price`, `pro_des`) VALUES
(10001, 'Home Boss', 1002, 555, 'Cool'),
(10002, 'Taj Mahal update', 1001, 455, 'Gift to your loving ones now.'),
(10003, 'Taj Mahal', 1002, 501, 'Cooler than above one');

-- --------------------------------------------------------

--
-- Structure for view `print`
--
DROP TABLE IF EXISTS `print`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `print`  AS  select `o`.`order_item_id` AS `order_item_id`,`i`.`invoice_id` AS `invoice_id`,`o`.`pro_id` AS `pro_id`,`o`.`pro_name` AS `pro_name`,`o`.`quantity` AS `quantity`,`o`.`price` AS `price`,`o`.`final_amount` AS `final_amount`,`i`.`e_id` AS `e_id`,`i`.`invoice_date` AS `invoice_date`,`i`.`c_mobile` AS `c_mobile`,`i`.`total_before_tax` AS `total_before_tax`,`i`.`total_tax` AS `total_tax`,`i`.`tax_per` AS `tax_per`,`i`.`total_after_tax` AS `total_after_tax` from (`invoice` `i` join `order_item` `o`) where `i`.`invoice_id` = `o`.`invoice_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_mobile`);

--
-- Indexes for table `customer_logs`
--
ALTER TABLE `customer_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_mobile`),
  ADD UNIQUE KEY `e_id` (`e_id`),
  ADD UNIQUE KEY `e_word` (`e_word`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `o_1` (`invoice_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `p_1` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_logs`
--
ALTER TABLE `customer_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `o_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `p_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
