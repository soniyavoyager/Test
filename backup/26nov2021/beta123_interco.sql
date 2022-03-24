-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2021 at 06:20 AM
-- Server version: 5.6.51
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beta123_interco`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@interco.com', '$2y$10$x5xzgLMWEwngM7jeSkRdWeOQgae7UeN3W4r4KsGqn9k3Vq7ZJHN1K');

-- --------------------------------------------------------

--
-- Table structure for table `cmpny`
--

CREATE TABLE `cmpny` (
  `id` int(11) NOT NULL,
  `cmpny_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmpny`
--

INSERT INTO `cmpny` (`id`, `cmpny_name`) VALUES
(2, 'INTERNATIONAL AGENCIES'),
(3, 'DANZAS ON RENT'),
(4, 'NESTLE VACATED'),
(7, 'FOROOGHI PHARMACY'),
(10, 'INTERNATIONAL AGENCIES	');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `Emp_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `ot1` varchar(255) NOT NULL,
  `ot2` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `Emp_id`, `name`, `email`, `phone`, `designation`, `rate`, `ot1`, `ot2`) VALUES
(1, '455', 'MOKSEN', 'moksen@intercol.com', '9988776651', '', '100', '10', '10'),
(2, '567', 'ALLAUDDIN', 'allauddin@intercol.com', '9988776652', '', '100', '10', '10'),
(3, '2345', 'ALAMGIR', 'alamgir@intercol.com', '9988776653', 'IT', '200', '10', '10'),
(24, '0011', 'Test 0011', 'test0011@test.com', '9966885566', 'Test', '120', '10', '10'),
(27, '4555', 'INTERNATIONAL AGENCIES', 'soniya@gmail.com', '46546', 'IT', '534545', '54534', '5453');

-- --------------------------------------------------------

--
-- Table structure for table `jobcard_det`
--

CREATE TABLE `jobcard_det` (
  `job_d_id` int(11) NOT NULL,
  `job_id` varchar(200) NOT NULL,
  `categories` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcard_det`
--

INSERT INTO `jobcard_det` (`job_d_id`, `job_id`, `categories`) VALUES
(121, 'JBC21:012', '4'),
(120, 'JBC21:012', '3'),
(119, 'JBC21:012', '5'),
(118, 'JBC21:012', '6'),
(117, 'JBC21:012', '8'),
(116, 'JBC21:011', '12'),
(115, 'JBC21:011', '10'),
(114, 'JBC21:011', '9'),
(113, 'JBC21:010', '8'),
(112, 'JBC21:010', '7'),
(111, 'JBC21:009', '3'),
(110, 'JBC21:009', '2'),
(109, 'JBC21:009', '1'),
(108, 'JBC21:008', '3'),
(107, 'JBC21:008', '2'),
(106, 'JBC21:008', '1'),
(105, 'JBC21:007', '3'),
(104, 'JBC21:007', '2'),
(103, 'JBC21:007', '1'),
(102, 'JBC21:005', '4'),
(101, 'JBC21:005', '3'),
(100, 'JBC21:005', '2'),
(99, 'JBC21:005', '1'),
(98, 'JBC21:004', '10'),
(97, 'JBC21:004', '9'),
(96, 'JBC21:004', '8'),
(95, 'JBC21:004', '7'),
(94, 'JBC21:004', '6'),
(93, 'JBC21:004', '5'),
(92, 'JBC21:004', '4'),
(91, 'JBC21:004', '3'),
(90, 'JBC21:003', '3'),
(89, 'JBC21:003', '2'),
(88, 'JBC21:003', '1'),
(87, 'JBC21:002', '3'),
(86, 'JBC21:002', '2'),
(85, 'JBC21:002', '1'),
(84, 'JBC21:001', '3'),
(83, 'JBC21:001', '2'),
(82, 'JBC21:001', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jobcard_img_folders`
--

CREATE TABLE `jobcard_img_folders` (
  `f_id` int(11) NOT NULL,
  `jobcard_id` varchar(255) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcard_img_folders`
--

INSERT INTO `jobcard_img_folders` (`f_id`, `jobcard_id`, `folder_name`, `Category_id`) VALUES
(1, 'JBC21:002', '', 4),
(2, 'JBC21:002', '123456', 3),
(3, 'JBC21:002', '45789', 2),
(4, 'JBC21:002', 'folder_1', 1),
(5, 'JBC21:003', 'first', 3),
(6, 'JBC21:003', 'second', 2),
(7, 'JBC21:003', 'third', 2),
(8, 'JBC21:003', '1', 2),
(9, 'JBC21:003', '2', 2),
(10, 'JBC21:003', '3', 2),
(11, 'JBC21:004', 'ttt', 7),
(12, 'JBC21:004', 'first', 8),
(13, 'JBC21:004', 'W', 8),
(14, 'JBC21:009', 'hi', 2),
(15, 'JBC21:007', 'Folder', 3),
(16, 'JBC21:011', 'Folder', 12),
(17, 'JBC21:011', 'iphone', 12),
(18, 'JBC21:011', 'Jabajabajbajaba', 10),
(19, 'JBC21:011', 'jabajabajabajabajbajabajbajabja', 10);

-- --------------------------------------------------------

--
-- Table structure for table `jobcard_master`
--

CREATE TABLE `jobcard_master` (
  `id` int(11) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `card_date` varchar(255) NOT NULL,
  `comp_or_resi` varchar(255) NOT NULL,
  `plot` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `work_description` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL,
  `job_completed_date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcard_master`
--

INSERT INTO `jobcard_master` (`id`, `job_id`, `card_date`, `comp_or_resi`, `plot`, `site`, `location`, `work_description`, `status`, `job_completed_date`) VALUES
(30, 'JBC21:001', '08/11/2021', 'company', '1', '1', 'location', 'Good work', 'Completed', '16/11/2021'),
(31, 'JBC21:002', '08/11/2021', 'company', '2', '1', 'location', 'work desc', 'Completed', '15/11/2021'),
(32, 'JBC21:003', '08/11/2021', 'company', '1', '1', 'location', 'work desc', '', '15/11/2021'),
(33, 'JBC21:004', '15/11/2021', 'Residential', '', '1', 'test location ', 'test for intercol', 'Completed', '26/11/2021'),
(34, 'JBC21:005', '16/11/2021', 'Residential', '', '1', 'test', 'test', 'Completed', '16/11/2021'),
(35, 'JBC21:006', '', '', '', '', '', '', 'Completed', '16/11/2021'),
(36, 'JBC21:007', '19/11/2021', 'Company', '2', '1', 'Location123', 'Work Description..........', '', ''),
(37, 'JBC21:008', '30/11/2021', 'Company', '2', '1', 'Location123', 'Work description.....', '', ''),
(38, 'JBC21:009', '30/11/2021', 'Company', '2', '1', 'Location123', 'Work description.....', 'Completed', '26/11/2021'),
(39, 'JBC21:010', '24/11/2021', 'Residential', '', '1', 'location', 'desc', '', ''),
(40, 'JBC21:011', '30/11/2021', 'Company', '2', '1', 'ssss', 'qqqq', '', ''),
(41, 'JBC21:012', '29/11/2021', 'Company', '2', '1', 'loc', 'work', 'Completed', '24/11/2021');

-- --------------------------------------------------------

--
-- Table structure for table `job_card_img_det`
--

CREATE TABLE `job_card_img_det` (
  `job_img_id` int(11) NOT NULL,
  `jc_im_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_card_img_det`
--

INSERT INTO `job_card_img_det` (`job_img_id`, `jc_im_id`, `image`) VALUES
(98, '86', 'https://intercol.betaholder.com/material_img/scaled_9cdc7e66-5483-4cae-a1f5-c26e633bee235827378135903993316.jpg'),
(99, '87', 'https://intercol.betaholder.com/material_img/scaled_99468c08-f732-4a2e-b701-f70920a2e0d26926349734860451095.jpg'),
(100, '89', 'https://intercol.betaholder.com/material_img/scaled_d454ba14-65b7-41bf-84b6-3f0df8c7eca61882393547757206160.jpg'),
(101, '90', 'https://intercol.betaholder.com/material_img/scaled_image_picker4620487270630099410.jpg'),
(102, '91', 'https://intercol.betaholder.com/material_img/scaled_image_picker3215623656599767061.jpg'),
(103, '92', 'https://intercol.betaholder.com/material_img/scaled_9f5eb15f-cc6c-405a-a766-a8aa15fa67587679666992422948166.jpg'),
(104, '93', 'https://intercol.betaholder.com/material_img/scaled_image_picker2883366168775836645.jpg'),
(105, '94', 'https://intercol.betaholder.com/material_img/scaled_image_picker4410700186642897405.jpg'),
(106, '95', 'https://intercol.betaholder.com/material_img/scaled_d1feba3c-4254-4a77-a3a4-291b1fbd8fba8616020200883967626.jpg'),
(107, '96', 'https://intercol.betaholder.com/material_img/image_picker_96470C18-096C-4E8F-9C0C-C3B79679FBBE-6911-00000547DFD9BC2F.jpg'),
(108, '97', 'https://intercol.betaholder.com/material_img/image_picker_E6CDF8AF-E36E-4353-B20D-081ECAAB1809-6911-0000056481EECE4B.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_card_img_mst`
--

CREATE TABLE `job_card_img_mst` (
  `id` int(11) NOT NULL,
  `jobcard_id` varchar(255) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `job_card_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_card_img_mst`
--

INSERT INTO `job_card_img_mst` (`id`, `jobcard_id`, `folder_name`, `job_card_date`) VALUES
(87, 'JBC21:004', 'first', '2021-11-17'),
(86, 'JBC21:003', 'root', '2021-11-17'),
(88, 'JBC21:004', 'first', '2021-11-17'),
(89, 'JBC21:003', 'root', '2021-11-17'),
(90, 'JBC21:004', 'first', '2021-11-17'),
(91, 'JBC21:007', 'root', '2021-11-24'),
(92, 'JBC21:007', 'root', '2021-11-24'),
(93, 'JBC21:007', 'Folder', '2021-11-24'),
(94, 'JBC21:011', 'root', '2021-11-24'),
(95, 'JBC21:011', 'root', '2021-11-24'),
(96, 'JBC21:011', 'Folder', '2021-11-24'),
(97, 'JBC21:011', 'Folder', '2021-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`) VALUES
(1, 'CARPENTRY'),
(2, 'CLEANING'),
(3, 'ELECTRICAL'),
(4, 'GENERAL'),
(5, 'MASONARY'),
(6, 'PAINTING'),
(7, 'PLUMBING'),
(8, 'POLISHING'),
(9, 'SAFETY'),
(10, 'TOOLS'),
(12, 'WELDING');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `Segment` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `unit`, `rate`, `category`, `Segment`, `code`, `Quantity`) VALUES
(51, 'rtrt', '3', '300', '3', '2', '$56789', ''),
(50, 'TTT', '3', '300', '2', '2', '*1234#', '50'),
(52, 'Test', '2', '150.2', '4', '2', '#4527', ''),
(53, 'Goods', '4', '250.500', '3', '2', '&5454@', '');

-- --------------------------------------------------------

--
-- Table structure for table `meterial_req_details`
--

CREATE TABLE `meterial_req_details` (
  `m_r_did` int(11) NOT NULL,
  `met_d_id` varchar(255) NOT NULL,
  `meterial` varchar(255) NOT NULL,
  `meterial_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `met_rate` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meterial_req_details`
--

INSERT INTO `meterial_req_details` (`m_r_did`, `met_d_id`, `meterial`, `meterial_name`, `unit`, `unit_name`, `qty`, `met_rate`) VALUES
(55, 'METR21:006', '50', 'TTT', '3', 'pic', '1', '300.000'),
(54, 'METR21:005', '50', 'TTT', '3', 'pic', '2', '600.000'),
(49, 'METR21:002', '50', 'TTT', '3', 'pic', '2', '600.000'),
(50, 'METR21:002', '51', 'rtrt', '3', 'pic', '1', '300.000'),
(48, 'METR21:001', '53', 'Goods', '4', 'G', '1', '250.500');

-- --------------------------------------------------------

--
-- Table structure for table `meterial_req_master`
--

CREATE TABLE `meterial_req_master` (
  `id` int(11) NOT NULL,
  `met_id` varchar(255) NOT NULL,
  `m_c_date` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL,
  `jobcard_id` varchar(255) NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meterial_req_master`
--

INSERT INTO `meterial_req_master` (`id`, `met_id`, `m_c_date`, `status`, `jobcard_id`, `Category_id`) VALUES
(54, 'METR21:005', '2021-11-25', 'Pending', 'JBC21:011', 12),
(51, 'METR21:002', '2021-11-17', 'Approved', 'JBC21:004', 8),
(50, 'METR21:001', '2021-11-17', 'Pending', 'JBC21:004', 7),
(55, 'METR21:006', '2021-11-25', 'Pending', 'JBC21:011', 9);

-- --------------------------------------------------------

--
-- Table structure for table `Plot`
--

CREATE TABLE `Plot` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Plot`
--

INSERT INTO `Plot` (`id`, `name`) VALUES
(2, 'PLOT NO. 238 IN MINA SALMAN'),
(3, 'PLOT NO. 245 IN MINA SALMAN');

-- --------------------------------------------------------

--
-- Table structure for table `Product_category`
--

CREATE TABLE `Product_category` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product_category`
--

INSERT INTO `Product_category` (`id`, `product_name`) VALUES
(2, 'ADHESIVES'),
(3, 'SDD'),
(4, 'PLYWOOD');

-- --------------------------------------------------------

--
-- Table structure for table `Segment`
--

CREATE TABLE `Segment` (
  `id` int(11) NOT NULL,
  `seg_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Segment`
--

INSERT INTO `Segment` (`id`, `seg_name`) VALUES
(2, 'CARPENTRY'),
(12, 'cARPENTRY');

-- --------------------------------------------------------

--
-- Table structure for table `Site`
--

CREATE TABLE `Site` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `plot` int(111) NOT NULL,
  `compny` int(111) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Site`
--

INSERT INTO `Site` (`id`, `name`, `plot`, `compny`) VALUES
(1, 'ARABIAN GULF AGENCIES', 2, 2),
(2, 'DANZAS STORE', 3, 3),
(4, 'GULF AGENCIES', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` enum('manager','supervisor') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `position`) VALUES
(4, 'TEST', 'TEST', 'test@gmail.com', '8904499127', 'e10adc3949ba59abbe56e057f20f883e', 'supervisor'),
(22, 'soniya', 'James', 'ddd@gmail.com', '2141345555', 'd41d8cd98f00b204e9800998ecf8427e', 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `staff_roles`
--

CREATE TABLE `staff_roles` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `emp_view` varchar(100) NOT NULL,
  `emp_edit` varchar(100) NOT NULL,
  `emp_delete` varchar(100) NOT NULL,
  `cate_view` int(11) NOT NULL,
  `cate_edit` int(11) NOT NULL,
  `cate_delete` int(11) NOT NULL,
  `Com_view` int(11) NOT NULL,
  `Com_edit` int(11) NOT NULL,
  `Com_delete` int(11) NOT NULL,
  `plot_view` int(11) NOT NULL,
  `plot_edit` int(11) NOT NULL,
  `plot_delete` int(11) NOT NULL,
  `Site_m_view` int(11) NOT NULL,
  `Site_m_edit` int(11) NOT NULL,
  `Site_m_delete` int(11) NOT NULL,
  `unit_view` int(11) NOT NULL,
  `unit_edit` int(11) NOT NULL,
  `unit_delete` int(11) NOT NULL,
  `Segment_view` int(11) NOT NULL,
  `Segment_edit` int(11) NOT NULL,
  `Segment_delete` int(11) NOT NULL,
  `Product_c_view` int(11) NOT NULL,
  `Product_c_edit` int(11) NOT NULL,
  `Product_c_delete` int(11) NOT NULL,
  `Materials_view` int(11) NOT NULL,
  `Materials_edit` int(11) NOT NULL,
  `Materials_delete` int(11) NOT NULL,
  `Materials_r_view` int(11) NOT NULL,
  `Materials_r_edit` int(11) NOT NULL,
  `Materials_r_delete` int(11) NOT NULL,
  `Materials_r_approval` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_roles`
--

INSERT INTO `staff_roles` (`id`, `s_id`, `emp_view`, `emp_edit`, `emp_delete`, `cate_view`, `cate_edit`, `cate_delete`, `Com_view`, `Com_edit`, `Com_delete`, `plot_view`, `plot_edit`, `plot_delete`, `Site_m_view`, `Site_m_edit`, `Site_m_delete`, `unit_view`, `unit_edit`, `unit_delete`, `Segment_view`, `Segment_edit`, `Segment_delete`, `Product_c_view`, `Product_c_edit`, `Product_c_delete`, `Materials_view`, `Materials_edit`, `Materials_delete`, `Materials_r_view`, `Materials_r_edit`, `Materials_r_delete`, `Materials_r_approval`) VALUES
(1, 4, '1', '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 22, '1', '1', '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(2, 'Kg'),
(3, 'pic'),
(4, 'G');

-- --------------------------------------------------------

--
-- Table structure for table `work_shedule_detail`
--

CREATE TABLE `work_shedule_detail` (
  `id` int(11) NOT NULL,
  `w_s_m_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `work_hours` int(11) NOT NULL,
  `over_time1` int(11) NOT NULL,
  `over_time2` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_shedule_detail`
--

INSERT INTO `work_shedule_detail` (`id`, `w_s_m_id`, `date`, `work_hours`, `over_time1`, `over_time2`, `worker_id`, `status`) VALUES
(320, 133, '2021-11-25', 1, 2, 3, 2, 'active'),
(319, 132, '2021-11-25', 1, 2, 3, 1, 'active'),
(312, 125, '2021-11-25', 1, 0, 0, 24, 'active'),
(310, 123, '2021-11-24', 8, 7, 0, 2, 'active'),
(309, 123, '2021-11-23', 0, 0, 0, 2, 'active'),
(334, 147, '2021-11-26', 1, 2, 3, 1, 'active'),
(333, 146, '2021-11-26', 1, 2, 3, 1, 'active'),
(332, 145, '2021-11-26', 1, 2, 3, 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `work_shedule_master`
--

CREATE TABLE `work_shedule_master` (
  `id` int(11) NOT NULL,
  `jobcard_id` varchar(255) NOT NULL,
  `worker_id` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_shedule_master`
--

INSERT INTO `work_shedule_master` (`id`, `jobcard_id`, `worker_id`, `from_date`, `to_date`) VALUES
(133, 'JBC21:003', '2', '2021-11-25', '2021-11-25'),
(147, 'JBC21:011', '1', '2021-11-26', '2021-11-26'),
(132, 'JBC21:003', '1', '2021-11-25', '2021-11-25'),
(125, 'JBC21:007', '24', '2021-11-25', '2021-11-25'),
(146, 'JBC21:009', '1', '2021-11-26', '2021-11-26'),
(123, 'JBC21:009', '2', '2021-11-23', '2021-11-24'),
(145, 'JBC21:007', '1', '2021-11-26', '2021-11-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmpny`
--
ALTER TABLE `cmpny`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobcard_det`
--
ALTER TABLE `jobcard_det`
  ADD PRIMARY KEY (`job_d_id`);

--
-- Indexes for table `jobcard_img_folders`
--
ALTER TABLE `jobcard_img_folders`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `jobcard_master`
--
ALTER TABLE `jobcard_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_card_img_det`
--
ALTER TABLE `job_card_img_det`
  ADD PRIMARY KEY (`job_img_id`);

--
-- Indexes for table `job_card_img_mst`
--
ALTER TABLE `job_card_img_mst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meterial_req_details`
--
ALTER TABLE `meterial_req_details`
  ADD PRIMARY KEY (`m_r_did`);

--
-- Indexes for table `meterial_req_master`
--
ALTER TABLE `meterial_req_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Plot`
--
ALTER TABLE `Plot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Product_category`
--
ALTER TABLE `Product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Segment`
--
ALTER TABLE `Segment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Site`
--
ALTER TABLE `Site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_roles`
--
ALTER TABLE `staff_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_shedule_detail`
--
ALTER TABLE `work_shedule_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_shedule_master`
--
ALTER TABLE `work_shedule_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cmpny`
--
ALTER TABLE `cmpny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jobcard_det`
--
ALTER TABLE `jobcard_det`
  MODIFY `job_d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `jobcard_img_folders`
--
ALTER TABLE `jobcard_img_folders`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jobcard_master`
--
ALTER TABLE `jobcard_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `job_card_img_det`
--
ALTER TABLE `job_card_img_det`
  MODIFY `job_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `job_card_img_mst`
--
ALTER TABLE `job_card_img_mst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `meterial_req_details`
--
ALTER TABLE `meterial_req_details`
  MODIFY `m_r_did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `meterial_req_master`
--
ALTER TABLE `meterial_req_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `Plot`
--
ALTER TABLE `Plot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Product_category`
--
ALTER TABLE `Product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Segment`
--
ALTER TABLE `Segment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Site`
--
ALTER TABLE `Site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff_roles`
--
ALTER TABLE `staff_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work_shedule_detail`
--
ALTER TABLE `work_shedule_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `work_shedule_master`
--
ALTER TABLE `work_shedule_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
