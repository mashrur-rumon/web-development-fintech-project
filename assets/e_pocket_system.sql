-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 08:37 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_pocket_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_username` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_gender` varchar(255) NOT NULL,
  `a_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_password`, `a_username`, `a_email`, `a_gender`, `a_dob`) VALUES
(1, 'mashrur hossain', '111', 'mashrur', 'mh@gmail.com', 'Male', '1999-01-05'),
(2, 'ahmed shah', '222', 'ahmed', 'abc@gmail.com', 'Male', '2011-02-08'),
(3, 'hasan ali', '222', 'hasan', 'abc@gmail.com', 'Male', '2017-06-07'),
(4, 'rafi ss', '222', 'adil2', 'abc@gmail.com', 'Male', '2018-02-06'),
(5, 'rafi ss', '222', 'adil2', 'abc@gmail.com', 'Male', '2019-06-12'),
(6, 'rafi ss', '222', 'adil2', 'abc@gmail.com', 'Male', '2015-02-03'),
(7, 'rafi ss', '222', 'adil22', 'abc@gmail.com', 'Male', '2017-02-15'),
(8, 'rafi ss', '222', 'adil2', 'abc@gmail.com', 'Male', '2014-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_password` varchar(50) NOT NULL,
  `c_username` varchar(30) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_gender` varchar(10) NOT NULL,
  `c_dob` date NOT NULL,
  `c_credit` double DEFAULT 0,
  `vouchers` int(11) NOT NULL DEFAULT 0,
  `c_package` varchar(20) NOT NULL DEFAULT 'Basic',
  `c_assigned_manager` varchar(30) NOT NULL,
  `is_blocked` varchar(15) NOT NULL DEFAULT 'false',
  `warning` varchar(10) NOT NULL DEFAULT 'false',
  `markBan` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `c_name`, `c_password`, `c_username`, `c_email`, `c_gender`, `c_dob`, `c_credit`, `vouchers`, `c_package`, `c_assigned_manager`, `is_blocked`, `warning`, `markBan`) VALUES
(1, 'Shafin Ahmed', '123', 'shafin580', 'shafin@gmail.com', 'Male', '2020-12-01', 0, 0, 'Basic', 'rabbi', 'false', 'false', 'false'),
(2, 'rakib ahmed', '1234', 'rakib', 'rakib@gmail.com', 'Male', '2020-12-09', 0, 0, 'Basic', 'shafin', 'true', 'false', 'false'),
(3, 'Shafin Ahmed', '123456', 'shafin123', 'shafinahmed@580gmail.com', 'Male', '2020-12-21', 499, 6, 'Pro', '', 'false', 'false', 'false'),
(11, 'shafin alam', '123', 'shaf', 'shafin@gmail.com', 'Male', '2020-12-15', 0, 0, 'Basic', '', 'false', 'false', 'false'),
(12, 'Shafin Alam', '123', 'shafin147', 'shafinahmed580@gmail.com', 'Male', '2021-01-04', 0, 0, 'Basic', '', 'false', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `client_billing_account`
--

CREATE TABLE `client_billing_account` (
  `username` varchar(20) NOT NULL,
  `billing_account_name` varchar(20) NOT NULL,
  `billing_account_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_billing_account`
--

INSERT INTO `client_billing_account` (`username`, `billing_account_name`, `billing_account_number`) VALUES
('shafin580', 'Bkash', '4125896344'),
('shafin123', 'Bkash', '4654664642'),
('shafin123', 'DBBL', '4654664667'),
('shafin123', 'Nagad', '7412356985');

-- --------------------------------------------------------

--
-- Table structure for table `client_stock_products`
--

CREATE TABLE `client_stock_products` (
  `c_username` varchar(30) NOT NULL,
  `sp_id` varchar(10) NOT NULL,
  `sp_name` varchar(30) NOT NULL,
  `sp_price` double DEFAULT NULL,
  `sp_bought_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_stock_products`
--

INSERT INTO `client_stock_products` (`c_username`, `sp_id`, `sp_name`, `sp_price`, `sp_bought_qty`) VALUES
('shafin123', 'sp-001', 'pen', 3, 5),
('shafin123', 'sp-002', 'buiscuit', 4, 90),
('shafin123', 'sp-003', 'paper', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `co-client`
--

CREATE TABLE `co-client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `t_promotion` int(11) NOT NULL,
  `a_promotion` int(11) NOT NULL,
  `h_promotion` int(11) NOT NULL,
  `h_products` int(11) NOT NULL,
  `del_promotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co-client`
--

INSERT INTO `co-client` (`id`, `name`, `password`, `email`, `gender`, `username`, `dob`, `t_promotion`, `a_promotion`, `h_promotion`, `h_products`, `del_promotion`) VALUES
(3, 'shuvo alamin', '123', 'svo@gmail.com', 'male', 'Shuvo', '2020-12-09', 5, 2, 1, 0, 2),
(6, 'shuvo alamin', '123', 'svo.almin@gmail.com', 'Male', 'shuvoalamin', '3233-03-21', 0, 0, 0, 0, 0),
(7, 'shuvo alamin', '123', 'svo.almin@gmail.com', 'Male', 'shuvo5', '3433-03-04', 0, 0, 0, 0, 0),
(8, 'shuvo alamin', '123', 'svo.almin@gmail.com', 'Male', 'shuvo65', '2412-03-04', 0, 0, 0, 0, 0),
(9, 'shuvo alamin', '123', 'svo.almin@gmail.com', 'Male', 'shuvo3', '1212-02-12', 0, 0, 0, 0, 0),
(10, 'shuvo alamin', '1234', 'svo.almin@gmail.com', 'Male', 'shuvo8', '1221-12-23', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coclient`
--

CREATE TABLE `coclient` (
  `co_userName` varchar(30) NOT NULL,
  `co_warning` varchar(10) NOT NULL DEFAULT 'false',
  `co_markBan` varchar(10) NOT NULL DEFAULT 'false',
  `vouchers` int(11) NOT NULL,
  `co_credit` int(10) NOT NULL,
  `co_assigned` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coclient`
--

INSERT INTO `coclient` (`co_userName`, `co_warning`, `co_markBan`, `vouchers`, `co_credit`, `co_assigned`) VALUES
('shuvo234', 'false', 'true', 19, 0, ''),
('shafin123', 'false', 'true', 0, 10, ''),
('shuvo12', 'false', 'false', 0, 0, 'rabbi12'),
('shafin1234', 'false', 'false', 0, 0, 'rabbi12');

-- --------------------------------------------------------

--
-- Table structure for table `co_delete`
--

CREATE TABLE `co_delete` (
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_delete`
--

INSERT INTO `co_delete` (`name`, `product`, `p_price`, `id`) VALUES
('ss', 'mobile', '', 1),
('iphone', 'mobile', '', 2),
('shuvo alamin', 'Mobile', '', 3),
('shuvo alamin', 'Mobile', '23', 4),
('shuvo alamin', 'Mobile', '123', 5),
('shuvo alamin', 'Clothes', '123', 6),
('shuvo alamin', 'Clothes', '123', 7),
('shuvo alamin', 'Clothes', '123', 8),
('shuvo alamin', 'Clothes', '123', 9);

-- --------------------------------------------------------

--
-- Table structure for table `co_direct_buy`
--

CREATE TABLE `co_direct_buy` (
  `product` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_direct_buy`
--

INSERT INTO `co_direct_buy` (`product`, `number`) VALUES
('Pickaboo', 2),
('Daraz', 2);

-- --------------------------------------------------------

--
-- Table structure for table `co_hide`
--

CREATE TABLE `co_hide` (
  `Promotion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_hide`
--

INSERT INTO `co_hide` (`Promotion`) VALUES
('Promotion No: 2');

-- --------------------------------------------------------

--
-- Table structure for table `co_highlight`
--

CREATE TABLE `co_highlight` (
  `text` varchar(255) NOT NULL,
  `Promotion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_highlight`
--

INSERT INTO `co_highlight` (`text`, `Promotion`) VALUES
('sdasdasd', 'Promotion No: 2'),
('s', 'Mobile'),
('s', 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `co_limit`
--

CREATE TABLE `co_limit` (
  `number` varchar(255) NOT NULL,
  `c_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_limit`
--

INSERT INTO `co_limit` (`number`, `c_cat`) VALUES
('4', 'Mobile'),
('-2', 'Clothes'),
('23', 'Clothes'),
('321', 'Clothes');

-- --------------------------------------------------------

--
-- Table structure for table `co_notice`
--

CREATE TABLE `co_notice` (
  `text` varchar(255) NOT NULL,
  `Promotion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_notice`
--

INSERT INTO `co_notice` (`text`, `Promotion`) VALUES
('sadasd', 'Promotion No: 3');

-- --------------------------------------------------------

--
-- Table structure for table `co_stop`
--

CREATE TABLE `co_stop` (
  `name` varchar(255) NOT NULL,
  `Promotion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_stop`
--

INSERT INTO `co_stop` (`name`, `Promotion`) VALUES
('12323', 'Promotion No: 2'),
('12323', 'Promotion No: 2'),
('shuvo alamin', 'Promotion No: 2');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_type`) VALUES
('mashrur', '111', 'Admin'),
('rabbi12', '122', 'Manager'),
('rakib', '1234', 'Client'),
('shafin123', '123456', 'Client'),
('shuvo', '123', 'Co-Client');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `m_userName` varchar(30) NOT NULL,
  `m_email` varchar(30) NOT NULL,
  `m_password` varchar(30) NOT NULL,
  `m_dob` date NOT NULL,
  `m_gender` varchar(30) NOT NULL,
  `client_list` varchar(500) DEFAULT NULL,
  `co_client_list` varchar(500) DEFAULT NULL,
  `assign_admin` varchar(20) DEFAULT NULL,
  `is_approved` varchar(10) NOT NULL DEFAULT 'false',
  `is_blocked` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`m_id`, `m_name`, `m_userName`, `m_email`, `m_password`, `m_dob`, `m_gender`, `client_list`, `co_client_list`, `assign_admin`, `is_approved`, `is_blocked`) VALUES
(1, 'rabbi hossain', 'rabbi477', 'rabbi.hossain477@gmai.com', '123', '2020-09-04', 'male', 'shafin123,rakib', 'shuvo123,mashrur123', 'mashrur', 'false', 'false'),
(2, 'shafin ahmed', 'shafin234', 'shafin234@gmailcom', '234', '2020-08-05', 'male', 'shafin123,rakib', 'shuvo123,mashrur123', 'shuvo12', 'true', 'false'),
(3, 'rabbi hossain', 'rabbi12', 'rabbi.hossain471@gmail.com', '122', '2020-12-28', 'Male', NULL, NULL, NULL, 'true', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `n_id` int(11) NOT NULL,
  `n_name` varchar(255) NOT NULL,
  `n_date` date NOT NULL,
  `n_startTime` time NOT NULL,
  `n_endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`n_id`, `n_name`, `n_date`, `n_startTime`, `n_endTime`) VALUES
(1, 'hello', '2020-12-17', '14:12:00', '01:03:00'),
(3, 'super offer', '2020-12-06', '13:13:00', '13:14:00'),
(5, 'great deal', '2021-01-04', '04:37:00', '03:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `offered_products`
--

CREATE TABLE `offered_products` (
  `p_id` varchar(10) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `co_client_username` varchar(50) NOT NULL,
  `platform` varchar(30) NOT NULL,
  `discount` double NOT NULL,
  `is_approved` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offered_products`
--

INSERT INTO `offered_products` (`p_id`, `p_name`, `p_price`, `stock`, `co_client_username`, `platform`, `discount`, `is_approved`) VALUES
('p-001', 'iphone 12', 1200, 4, 'rabbi-int', 'amazon', 100, 'pending'),
('p-002', 'laptop', 1500, 14, 'rakib', 'daraz', 70, 'clear'),
('p-003', 'monitor', 20000, 0, 'ahmed', 'pickaboo', 500, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_duration` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`p_id`, `p_name`, `p_duration`, `p_price`) VALUES
(1, 'Basic', '3 months', '300 BDT'),
(2, 'Pro', '7 months', '500 BDT'),
(3, 'Ultimate', '12 months', '700 BDT');

-- --------------------------------------------------------

--
-- Table structure for table `set_and_delete`
--

CREATE TABLE `set_and_delete` (
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock_products`
--

CREATE TABLE `stock_products` (
  `sp_id` varchar(10) NOT NULL,
  `sp_name` varchar(25) NOT NULL,
  `sp_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_products`
--

INSERT INTO `stock_products` (`sp_id`, `sp_name`, `sp_price`) VALUES
('sp-001', 'pen', 3),
('sp-002', 'buiscuit', 4),
('sp-003', 'paper', 2);

-- --------------------------------------------------------

--
-- Table structure for table `timeset`
--

CREATE TABLE `timeset` (
  `v_name` varchar(255) NOT NULL,
  `v_date` varchar(255) NOT NULL,
  `v_startTime` varchar(255) NOT NULL,
  `v_endTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeset`
--

INSERT INTO `timeset` (`v_name`, `v_date`, `v_startTime`, `v_endTime`) VALUES
('Promotion No: 1', '2021-01-07', '17:03', '20:00'),
('Promotion No: 1', '2021-01-07', '17:03', '20:00'),
('Promotion No: 1', '2021-01-07', '17:03', '20:00'),
('Promotion No: 1', '2021-01-07', '17:03', '20:00'),
('Promotion No: 2', '2021-01-05', '22:35', '20:35'),
('Promotion No: 1', '2021-01-06', '21:27', '21:28');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `product_item` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `stock_action` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `username`, `product_id`, `product_item`, `price`, `stock_action`, `status`, `date`) VALUES
(4, 'shafin123', 'D', 'Deposite', 2000, NULL, 'Clear', '2020-12-16'),
(12, 'shafin123', 'D', 'Deposite', 500, NULL, 'Clear', '2020-12-18'),
(14, 'shafin123', 'P-Ultimate', 'Ultimate Package', 1000, NULL, 'Pending', '2020-12-18'),
(15, 'shafin123', 'W', 'Withdraw', 1000, NULL, 'Pending', '2020-12-18'),
(16, 'shafin123', 'D', 'Deposite', 1000, NULL, 'Clear', '2020-12-18'),
(17, 'shafin123', 'F', '01711382280', 1000, NULL, 'Clear', '2020-12-18'),
(18, 'shafin123', 'F', '01711382280', 500, NULL, 'Clear', '2020-12-18'),
(19, 'shafin123', 'F', '01711382280', 200, NULL, 'Clear', '2020-12-18'),
(20, 'shafin123', 'F', '01711382280', 100, NULL, 'Clear', '2020-12-18'),
(24, 'shafin123', 'D', 'Deposite', 5800, NULL, 'Clear', '2020-12-24'),
(33, 'shafin123', 'p-001', 'iphone 12', 1050, 'buy', 'Pending', '2020-12-24'),
(34, 'shafin123', 'p-002', 'laptop', 1380, 'buy', 'Pending', '2020-12-24'),
(35, 'shafin123', 'D', 'Deposite', 10000, NULL, 'Clear', '2020-12-24'),
(36, 'shafin123', 'p-001', 'iphone 12', 1050, 'buy', 'Pending', '2020-12-24'),
(41, 'shafin123', 'p-001', 'iphone 12', 1050, 'buy', 'Pending', '2020-12-26'),
(42, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-26'),
(43, 'shafin123', 'sp-001', 'pen', 60, 'sell', 'Pending', '2020-12-26'),
(44, 'shafin123', 'sp-002', 'buiscuit', 40, 'sell', 'Pending', '2020-12-26'),
(49, 'shafin123', 'sp-002', 'buiscuit-2', 8, 'sell', 'Pending', '2020-12-26'),
(50, 'shafin123', 'sp-002', 'buiscuit-20', 80, 'buy', 'Pending', '2020-12-26'),
(51, 'shafin123', 'P-Basic', 'Basic Package', 0, NULL, 'Pending', '2020-12-29'),
(52, 'shafin123', 'P-Pro', 'Pro Package', 500, NULL, 'Pending', '2020-12-29'),
(53, 'shafin123', 'P-Ultimate', 'Ultimate Package', 1000, NULL, 'Pending', '2020-12-29'),
(54, 'shafin123', 'sp-002', 'buiscuit-10', 40, 'buy', 'Pending', '2020-12-29'),
(55, 'shafin123', 'sp-002', 'buiscuit-50', 200, 'buy', 'Pending', '2020-12-29'),
(56, 'shafin123', 'W', 'Withdraw', 0, NULL, 'Pending', '2020-12-29'),
(57, 'shafin123', 'W', 'Withdraw', 0, NULL, 'Pending', '2020-12-29'),
(58, 'shafin123', 'W', 'Withdraw', 0, NULL, 'Pending', '2020-12-29'),
(59, 'shafin123', 'W', 'Withdraw', 50, NULL, 'Pending', '2020-12-29'),
(60, 'shafin123', 'D', 'Deposite', 50, NULL, 'Clear', '2020-12-29'),
(61, 'shafin123', 'F', '01711382280', 56, NULL, 'Clear', '2020-12-30'),
(62, 'shafin123', 'F', '01711382280', 40, NULL, 'Clear', '2020-12-30'),
(63, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-30'),
(64, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-30'),
(65, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-30'),
(66, 'shafin123', 'p-002', 'laptop', 1380, NULL, 'Pending', '2020-12-30'),
(67, 'shafin123', 'D', 'Deposite', 10000, NULL, 'Clear', '2020-12-30'),
(68, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-30'),
(69, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-30'),
(70, 'shafin123', 'p-002', 'laptop', 1430, NULL, 'Pending', '2020-12-30'),
(71, 'shafin123', 'p-002', 'laptop', 1430, NULL, 'Pending', '2020-12-30'),
(72, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-30'),
(73, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2020-12-30'),
(74, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2020-12-30'),
(75, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2020-12-30'),
(76, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2020-12-30'),
(77, 'shafin123', 'D', 'Deposite', 10000, NULL, 'Clear', '2020-12-30'),
(78, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2020-12-30'),
(79, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2020-12-30'),
(80, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2020-12-30'),
(81, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-30'),
(82, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2020-12-30'),
(83, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2020-12-30'),
(84, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-30'),
(85, 'shafin123', 'sp-002', 'buiscuit-4', 16, 'sell', 'Pending', '2020-12-30'),
(86, 'shafin123', 'sp-002', 'buiscuit-10', 40, 'sell', 'Pending', '2020-12-30'),
(87, 'shafin123', 'sp-002', 'buiscuit-10', 40, 'sell', 'Pending', '2020-12-30'),
(88, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2020-12-30'),
(89, 'shafin123', 'p-002', 'laptop', 1430, NULL, 'Pending', '2020-12-30'),
(90, 'shafin123', 'D', 'Deposite', 10000, NULL, 'Clear', '2020-12-30'),
(91, 'shafin123', 'W', 'Withdraw', 1000, NULL, 'Pending', '2020-12-30'),
(92, 'shafin123', 'F', '01711382280', 100, NULL, 'Clear', '2020-12-30'),
(93, 'shafin123', 'sp-001', 'pen-10', 30, 'buy', 'Pending', '2020-12-30'),
(94, 'shafin123', 'P-Pro', 'Pro Package', 500, NULL, 'Pending', '2020-12-30'),
(95, 'shafin123', 'P-Ultimate', 'Ultimate Package', 1000, NULL, 'Pending', '2020-12-30'),
(96, 'shafin123', 'W', 'Withdraw', 500, NULL, 'Clear', '2020-12-30'),
(97, 'shafin123', 'D', 'Deposite', 500, NULL, 'Clear', '2020-12-30'),
(98, 'shafin123', 'P-Pro', 'Pro Package', 500, NULL, 'Clear', '2020-12-30'),
(99, 'shafin123', 'P-Ultimate', 'Ultimate Package', 1000, NULL, 'Clear', '2021-01-01'),
(100, 'shafin123', 'sp-002', 'buiscuit-40', 160, 'buy', 'Pending', '2021-01-01'),
(101, 'shafin123', 'W', 'Withdraw', 10, NULL, 'Clear', '2021-01-01'),
(102, 'shafin123', 'D', 'Deposite', 10, NULL, 'Clear', '2021-01-01'),
(103, 'shafin123', 'F', '01711382280', 100, NULL, 'Clear', '2021-01-01'),
(104, 'shafin123', '', '', 0, NULL, 'Pending', '2021-01-01'),
(105, 'shafin123', '', '', 0, NULL, 'Pending', '2021-01-01'),
(106, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2021-01-01'),
(107, 'shafin123', 'p-001', 'iphone 12', 1050, NULL, 'Pending', '2021-01-01'),
(108, 'shafin123', 'sp-002', 'buiscuit-10', 40, 'sell', 'Pending', '2021-01-01'),
(109, 'shafin123', 'P-Pro', 'Pro Package', 500, NULL, 'Clear', '2021-01-01'),
(110, 'shafin123', 'sp-001', 'pen-5', 15, 'buy', 'Pending', '2021-01-01'),
(111, 'shafin123', 'W', 'Withdraw', 50, NULL, 'Clear', '2021-01-01'),
(112, 'shafin123', 'D', 'Deposite', 50, NULL, 'Clear', '2021-01-01'),
(113, 'shafin123', 'F', '01711382280', 50, NULL, 'Clear', '2021-01-01'),
(114, 'shafin123', 'p-001', 'iphone 12', 1100, NULL, 'Pending', '2021-01-01'),
(115, 'shafin123', 'p-002', 'laptop', 1380, NULL, 'Pending', '2021-01-01'),
(116, 'shafin123', 'sp-001', 'pen-10', 30, 'sell', 'Pending', '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `vouchar`
--

CREATE TABLE `vouchar` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `v_date` date NOT NULL,
  `v_startTime` time NOT NULL,
  `v_endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vouchar`
--

INSERT INTO `vouchar` (`v_id`, `v_name`, `v_date`, `v_startTime`, `v_endTime`) VALUES
(16, 'asfsf', '2020-12-02', '23:29:00', '23:29:00'),
(18, 'wow', '2021-01-12', '03:34:00', '03:36:00'),
(19, 'toto', '2020-12-29', '04:51:00', '04:51:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `client_billing_account`
--
ALTER TABLE `client_billing_account`
  ADD UNIQUE KEY `billing_account_number` (`billing_account_number`);

--
-- Indexes for table `co-client`
--
ALTER TABLE `co-client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_delete`
--
ALTER TABLE `co_delete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `offered_products`
--
ALTER TABLE `offered_products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `vouchar`
--
ALTER TABLE `vouchar`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `co-client`
--
ALTER TABLE `co-client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `co_delete`
--
ALTER TABLE `co_delete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `vouchar`
--
ALTER TABLE `vouchar`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
