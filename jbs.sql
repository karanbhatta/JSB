-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2020 at 10:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `attribute_parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attribute_parent_id`) VALUES
(5, 'Blue', 2),
(6, 'White', 2),
(7, 'M', 3),
(8, 'L', 3),
(9, 'Green', 2),
(10, 'Black', 2),
(12, 'Grey', 2),
(13, 'S', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bank_transaction`
--

CREATE TABLE `bank_transaction` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `ac_name` varchar(100) NOT NULL,
  `cheque_no` bigint(20) NOT NULL,
  `date` varchar(100) NOT NULL,
  `transaction_type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `deposited_by` varchar(100) NOT NULL,
  `account_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `active`) VALUES
(6, 'ABC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`) VALUES
(6, 'XYZ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`) VALUES
(1, 'Dharmesh', '13', '10', 'Dhangadhi', '9898989898', 'Nepal', 'Hello guest', 'NPR');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_address`, `customer_phone`, `customer_email`, `active`) VALUES
(1, 'Dipendra Singh Bist', 'Dhangadhi', '9867739163', 'dipendrabist101@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `alternative_phone` varchar(100) DEFAULT NULL,
  `employee_id_no` int(11) DEFAULT NULL,
  `present_address` varchar(100) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(100) DEFAULT NULL,
  `picture` longtext DEFAULT NULL,
  `post` varchar(100) NOT NULL,
  `hire_date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `alternative_phone`, `employee_id_no`, `present_address`, `permanent_address`, `state`, `city`, `zip_code`, `picture`, `post`, `hire_date`, `status`, `user_id`) VALUES
(6, 'Jayant Bhatt', 'bhauneli111@gmail.com', '9862114444', '', 111, 'Attariya', 'Baitadi', 'P7', 'Attariya', '10900', 'assets/images/5f7d778188956.jpg', '', '1601489700', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Administrator', 'a:57:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:11:\"createOrder\";i:29;s:11:\"updateOrder\";i:30;s:9:\"viewOrder\";i:31;s:11:\"deleteOrder\";i:32;s:11:\"viewReports\";i:33;s:13:\"updateCompany\";i:34;s:11:\"viewProfile\";i:35;s:13:\"updateSetting\";i:36;s:12:\"createImport\";i:37;s:12:\"updateImport\";i:38;s:10:\"viewImport\";i:39;s:12:\"deleteImport\";i:40;s:10:\"viewReport\";i:41;s:10:\"createBank\";i:42;s:10:\"updateBank\";i:43;s:8:\"viewBank\";i:44;s:10:\"deleteBank\";i:45;s:13:\"createVehicle\";i:46;s:13:\"updateVehicle\";i:47;s:11:\"viewVehicle\";i:48;s:13:\"deleteVehicle\";i:49;s:12:\"createReturn\";i:50;s:12:\"updateReturn\";i:51;s:10:\"viewReturn\";i:52;s:12:\"deleteReturn\";i:53;s:14:\"createEmployee\";i:54;s:14:\"updateEmployee\";i:55;s:12:\"viewEmployee\";i:56;s:14:\"deleteEmployee\";}'),
(4, 'Account', 'a:16:{i:0;s:11:\"createBrand\";i:1;s:11:\"updateBrand\";i:2;s:9:\"viewBrand\";i:3;s:14:\"createCategory\";i:4;s:14:\"updateCategory\";i:5;s:12:\"viewCategory\";i:6;s:11:\"createStore\";i:7;s:11:\"updateStore\";i:8;s:9:\"viewStore\";i:9;s:13:\"createProduct\";i:10;s:13:\"updateProduct\";i:11;s:11:\"viewProduct\";i:12;s:11:\"createOrder\";i:13;s:11:\"updateOrder\";i:14;s:9:\"viewOrder\";i:15;s:11:\"viewReports\";}');

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `supplier_address` varchar(255) DEFAULT NULL,
  `supplier_phone` varchar(255) DEFAULT NULL,
  `date_time` varchar(255) DEFAULT NULL,
  `gross_amount` varchar(255) DEFAULT NULL,
  `service_charge_rate` varchar(255) DEFAULT NULL,
  `service_charge` varchar(255) DEFAULT NULL,
  `vat_charge_rate` varchar(255) DEFAULT NULL,
  `vat_charge` varchar(255) DEFAULT NULL,
  `net_amount` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `paid_status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `cheque_name` varchar(100) DEFAULT NULL,
  `cheque_no` bigint(20) DEFAULT NULL,
  `deposited_by` varchar(100) DEFAULT NULL,
  `paid_amount` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imports`
--

INSERT INTO `imports` (`id`, `bill_no`, `supplier_name`, `supplier_address`, `supplier_phone`, `date_time`, `gross_amount`, `service_charge_rate`, `service_charge`, `vat_charge_rate`, `vat_charge`, `net_amount`, `discount`, `paid_status`, `user_id`, `due_amount`, `bank_name`, `cheque_name`, `cheque_no`, `deposited_by`, `paid_amount`, `sid`) VALUES
(17, '55555', 'RIyasat', NULL, NULL, '1601814007', '12200.00', NULL, '0', NULL, '0', '12200.00', '0', 2, 1, 0, '', '', 0, '', 12200, 7),
(18, '555', 'RIyasat', NULL, NULL, '1601814041', '100.00', NULL, '0', NULL, '0', '100.00', '0', 2, 1, 0, '', '', 0, '', 100, 7);

-- --------------------------------------------------------

--
-- Table structure for table `imports_item`
--

CREATE TABLE `imports_item` (
  `id` int(11) NOT NULL,
  `import_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `s_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imports_item`
--

INSERT INTO `imports_item` (`id`, `import_id`, `product_id`, `qty`, `rate`, `amount`, `date`, `s_id`) VALUES
(35, 17, 10, '122', '100', '12200.00', '1601814007', ''),
(36, 18, 10, '1', '100', '100.00', '1601814041', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `paid_status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cheque_no` bigint(20) DEFAULT NULL,
  `cheque_name` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `deposited_by` varchar(100) DEFAULT NULL,
  `lot_no` varchar(100) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bill_no`, `customer_name`, `customer_address`, `customer_phone`, `customer_email`, `date_time`, `gross_amount`, `service_charge_rate`, `service_charge`, `vat_charge_rate`, `vat_charge`, `net_amount`, `paid_amount`, `due_amount`, `discount`, `paid_status`, `user_id`, `cheque_no`, `cheque_name`, `bank_name`, `deposited_by`, `lot_no`, `vehicle_no`) VALUES
(35, '  BILPR-3635', NULL, NULL, NULL, NULL, '1601959865', '200.00', '13', '26.00', '10', '20.00', '246.00', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '  2', 'Se1Kha1952');

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_item`
--

INSERT INTO `orders_item` (`id`, `order_id`, `product_id`, `qty`, `rate`, `amount`, `date`) VALUES
(109, 35, 10, '1', '100', '100.00', '0000-00-00'),
(110, 35, 10, '1', '100', '100.00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `attribute_value_id` text DEFAULT NULL,
  `brand_id` text NOT NULL,
  `category_id` text NOT NULL,
  `store_id` int(11) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `price`, `qty`, `image`, `description`, `attribute_value_id`, `brand_id`, `category_id`, `store_id`, `availability`) VALUES
(10, 'Pyaj Thulo', 'KG', '100', '4706', 'assets/images/product_image/5f7d77e18a672.jpg', '', 'null', '[\"6\"]', '[\"6\"]', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_return`
--

CREATE TABLE `product_return` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `paid_status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cheque_no` bigint(20) DEFAULT NULL,
  `cheque_name` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `deposited_by` varchar(100) DEFAULT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `waste_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_return`
--

INSERT INTO `product_return` (`id`, `bill_no`, `date_time`, `gross_amount`, `service_charge_rate`, `service_charge`, `vat_charge_rate`, `vat_charge`, `net_amount`, `paid_amount`, `due_amount`, `discount`, `paid_status`, `user_id`, `cheque_no`, `cheque_name`, `bank_name`, `deposited_by`, `vehicle_no`, `waste_type`) VALUES
(1, 'BILPR-4158', '1601057700', '10000.00', '13', '0', '10', '0', '10000.00', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Se1Kha1952', 'wastage'),
(2, 'BILPR-F2B0', '1601057700', '2500.00', '13', '0', '10', '0', '2500.00', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Se6Pa1012', 'wastage'),
(3, 'BILPR-54F1', '1601057700', '100.00', '13', '0', '10', '0', '100.00', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Se1Kha1952', 'wastage'),
(4, 'BILPR-51D0', '1601057700', '100.00', '13', '0', '10', '0', '100.00', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Se1Kha1952', 'Return');

-- --------------------------------------------------------

--
-- Table structure for table `return_items`
--

CREATE TABLE `return_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `waste_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `return_items`
--

INSERT INTO `return_items` (`id`, `order_id`, `product_id`, `qty`, `rate`, `amount`, `date`, `waste_type`) VALUES
(1, 1, 10, '10', '1000', '10000.00', '0000-00-00', 'wastage'),
(2, 2, 10, '25', '100', '2500.00', '0000-00-00', 'wastage'),
(3, 3, 10, '1', '100', '100.00', '0000-00-00', 'wastage'),
(4, 4, 10, '1', '100', '100.00', '0000-00-00', 'Return');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `bonus` int(11) DEFAULT NULL,
  `from_date` varchar(100) NOT NULL,
  `to_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_no` varchar(100) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `net_amount` int(11) NOT NULL,
  `cheque_no` bigint(20) NOT NULL,
  `cheque_name` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) NOT NULL,
  `deposited_by` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `bill_no`, `gross_amount`, `paid_amount`, `due_amount`, `paid_status`, `date_time`, `discount`, `net_amount`, `cheque_no`, `cheque_name`, `bank_name`, `deposited_by`, `user_id`, `vehicle_no`, `customer_name`) VALUES
(21, 1, '    88', 3125, 3125, 0, 1, '1601985534', 0, 3125, 0, '    ', '    ', '    ', 1, 'Se6Pa1012', 'Dipendra Singh Bist');

-- --------------------------------------------------------

--
-- Table structure for table `sales_item`
--

CREATE TABLE `sales_item` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_no` varchar(100) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_item`
--

INSERT INTO `sales_item` (`id`, `sales_id`, `vehicle_no`, `product_id`, `qty`, `rate`, `amount`, `customer_id`, `bill_no`, `date_time`) VALUES
(50, 21, 'Se6Pa1012', 10, 55, 55, 3025, 1, '    88', '1601985534'),
(51, 21, 'Se6Pa1012', 10, 1, 100, 100, 1, '    88', '1601985534');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `active`) VALUES
(4, 'abc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact`, `address`, `active`) VALUES
(7, 'RIyasat', 88888, 'Paliya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`) VALUES
(1, 'asdfghj', '$2y$10$mVz2KTw7OTx6DCoAB05/VOEQeOmVfbUd7VkJljDzwBD8vSjXhqw/i', 'admin@dd.com', 'asdfghj', 'guest', '9898989898', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(7, 6, 4),
(8, 7, 4),
(9, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(100) NOT NULL,
  `v_no` varchar(100) NOT NULL,
  `d_name` varchar(100) NOT NULL,
  `d_contact` varchar(100) NOT NULL,
  `cd_name` varchar(100) NOT NULL,
  `cd_contact` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `v_no`, `d_name`, `d_contact`, `cd_name`, `cd_contact`, `active`) VALUES
(1, 'Se6Pa1012', 'Dipendra Singh Bist', '9867739163', 'Karan Dev Bhatt', '2147483647', 1),
(3, 'se6pa2012', 'Karan Dev Bhatt', '9867739163', 'Karan Bhatt', '9867739163', 1),
(4, 'Se1Kha1952', 'Shambhu Bhatt', '9868720571', 'Gajendra Bhatt', '9848971700', 1);

-- --------------------------------------------------------

--
-- Table structure for table `walk_sales`
--

CREATE TABLE `walk_sales` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(100) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `net_amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walk_sales`
--

INSERT INTO `walk_sales` (`id`, `bill_no`, `gross_amount`, `paid_amount`, `due_amount`, `paid_status`, `date_time`, `discount`, `net_amount`, `user_id`, `customer_name`) VALUES
(1, '    BILPR-92D2', 60100, 6000, 54100, 1, '1601979669', 0, 60100, 1, '   KDB'),
(2, ' BILPR-AA5F', 0, 1000, 0, 1, '1602049864', 0, 0, 1, ' Karan');

-- --------------------------------------------------------

--
-- Table structure for table `walk_sales_item`
--

CREATE TABLE `walk_sales_item` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walk_sales_item`
--

INSERT INTO `walk_sales_item` (`id`, `sales_id`, `product_id`, `qty`, `rate`, `amount`, `date_time`) VALUES
(6, 1, 10, 1000, 60, 60000, '1601979670'),
(7, 1, 10, 1, 100, 100, '1601979670'),
(9, 2, 10, 10, 100, 1000, '1602049864');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_transaction`
--
ALTER TABLE `bank_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imports_item`
--
ALTER TABLE `imports_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_return`
--
ALTER TABLE `product_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_items`
--
ALTER TABLE `return_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_item`
--
ALTER TABLE `sales_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walk_sales`
--
ALTER TABLE `walk_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walk_sales_item`
--
ALTER TABLE `walk_sales_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bank_transaction`
--
ALTER TABLE `bank_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `imports_item`
--
ALTER TABLE `imports_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_return`
--
ALTER TABLE `product_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `return_items`
--
ALTER TABLE `return_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sales_item`
--
ALTER TABLE `sales_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `walk_sales`
--
ALTER TABLE `walk_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `walk_sales_item`
--
ALTER TABLE `walk_sales_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
