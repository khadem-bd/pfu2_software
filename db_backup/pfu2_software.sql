-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 11:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfu2_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_beneficiary`
--

CREATE TABLE `address_beneficiary` (
  `id` int(255) NOT NULL,
  `sourcing` text DEFAULT NULL,
  `address` text NOT NULL,
  `country_of_origin` text NOT NULL,
  `weight_charge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_beneficiary`
--

INSERT INTO `address_beneficiary` (`id`, `sourcing`, `address`, `country_of_origin`, `weight_charge`) VALUES
(16, '=skUgQ1U', '=Ayay9WWgcXZOBCLzRHanlWZoBibvN3ajFmSgwSZ2FEIoR3NzACNykzN', 'BNVV', '==AM1YTM'),
(17, '==gcpFEIOBCcvh2U', 'gAFRggzNFBCLkF2bSBSZulmclhGdhtEI2cDN', '=sUV', '==AM1ITM'),
(18, '=4WahN3cvhEIrFme6FmU', '==QelNnclpEI3VmTgwSZ2FEIoR3M2AiN5gzN', 'BNVV', '==AM1MTM'),
(19, 'zNWa0NXan9GTgUmbpJ3T', '=EGZpJ3bsZEIsg2YhVmQg0GbhBFI0NXZXBCLkF2bSBCdzJXdo1GbFBSO4kzM', 'BNVV', '==AM1ITM');

-- --------------------------------------------------------

--
-- Table structure for table `card_beneficairy`
--

CREATE TABLE `card_beneficairy` (
  `id` int(200) NOT NULL,
  `card_number` varchar(200) NOT NULL,
  `card_holder_name` text NOT NULL,
  `exchange_rateD` float(11,2) NOT NULL,
  `exchange_rateP` float(11,2) NOT NULL,
  `card_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_beneficairy`
--

INSERT INTO `card_beneficairy` (`id`, `card_number`, `card_holder_name`, `exchange_rateD`, `exchange_rateP`, `card_type`) VALUES
(24, '==AIyEDN2ETN1ETM4QTO2czM', '==Qbhx2cJBCb15WatlWYo9WT', 95.05, 115.95, '==AIYVUTBBSe0l2Q'),
(25, '==AI1YTO2UjNzYjN5gDN', 'g0WayF2SgwWduF2d6lmU', 100.00, 115.95, '=ASQTlkV'),
(26, 'yMjN5gzN0UjNzITM', 'g4WahN3cvhEIrFme6FmU', 106.00, 0.00, 'yVGdzFWT'),
(27, '4kzN0UjN1YzMzkjN', '=4WahN3cvhEIsVXb6FmT', 98.50, 119.85, '=IXZ292YzlGR');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `shipping_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `name`, `contact_no`, `email_address`, `shipping_address`) VALUES
(220, 'PFU2-4-22', 'Riya Osman', '+8801626959965', 'osman.riya@gmail.com', 'Dhaka,Bangladesh '),
(221, 'PFU2-5-22', 'Ismail Hossain', '+880165969878', 'ismail.hossain@gmail.com', 'Dhaka, Bangladesh '),
(222, 'PFU2-6-22', 'Ridwanul Hasan ', '+8801515223656', 'ridwan.hasan@gmail.com', 'Chittagong,Bangladesh '),
(223, 'PFU2-7-22', 'Fahim Ahmed', '+8801956559698', 'fahim.ahmed@gmail.com', 'Chittagong, Bangladesh '),
(224, 'PFU2-8-22', 'Tofayel Ahmed', '+8801436656989', 'tofayel.ahmed@gmail.com', 'Dhaka, Bangladesh '),
(225, 'PFU2-9-22', 'Mujibur Rahman', '+8801672344444', 'rahmanmujibur@yahoo.com', 'Chattogram Bangladesh '),
(226, 'PFU2-10-22', 'Anwarul Mazhar', '+8801965563365', 'anwarul9671@gmail.com', 'Dhaka,Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `id_serial`
--

CREATE TABLE `id_serial` (
  `id` int(200) NOT NULL,
  `serial_no` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `id_serial`
--

INSERT INTO `id_serial` (`id`, `serial_no`) VALUES
(235, 1),
(236, 2),
(237, 3),
(238, 4),
(239, 5),
(240, 6),
(241, 7),
(242, 8),
(243, 9),
(244, 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(200) NOT NULL,
  `order_id` text NOT NULL,
  `customer_id` text NOT NULL,
  `product_desc` text NOT NULL,
  `color` text DEFAULT NULL,
  `size` text DEFAULT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `qty` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `advance` decimal(11,2) NOT NULL,
  `remaining` decimal(11,2) NOT NULL,
  `grand_total` decimal(11,2) NOT NULL,
  `product_url` text NOT NULL,
  `order_date` date NOT NULL,
  `country_of_origin` text NOT NULL,
  `status` text DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `product_desc`, `color`, `size`, `unit_price`, `qty`, `total_price`, `advance`, `remaining`, `grand_total`, `product_url`, `order_date`, `country_of_origin`, `status`) VALUES
(321, '#CUSORD-60161-10', 'PFU2-1-22', 'iPhone 13 case', 'Black', 'N/A', '2500.00', '1.00', '2500.00', '2000.00', '500.00', '9000.00', 'www.amazon.com/iPjhone', '2022-10-20', 'USA', 'purchased'),
(322, '#CUSORD-60161-10', 'PFU2-1-22', 'Nike Men\'s Shoe', 'White/Red', 'US9.5', '6500.00', '1.00', '6500.00', '5500.00', '1000.00', '9000.00', 'www.nike.com ', '2022-10-20', 'USA', 'purchased'),
(323, '#CUSORD-24254-10', 'PFU2-2-22', 'iPhone 13 case ', 'Blue', 'N/A', '1560.00', '1.00', '1560.00', '500.00', '1060.00', '10210.00', 'https://www.amazon.co.uk/ORNARTO-Compatible-Silicone-Covered-inch-Blue/dp/B09F3JZG7Z/ref=sr_1_1_sspa?crid=MUA3F71168N4&keywords=iphone+13+case+blue&qid=1666272291&qu=eyJxc2MiOiI1LjUzIiwicXNhIjoiNC45OCIsInFzcCI6IjQuNTYifQ%3D%3D&s=electronics&sprefix=iphone+13+case+bl%2Celectronics%2C1030&sr=1-1-spons&psc=1', '2022-10-20', 'USA', 'purchased'),
(324, '#CUSORD-24254-10', 'PFU2-2-22', 'Nike Men\'s running shoe', 'White/Beige', 'UK8.5', '8650.00', '1.00', '8650.00', '5500.00', '3150.00', '10210.00', 'www.nike.co.uk', '2022-10-20', 'UK', 'purchased'),
(325, '#CUSORD-59833-10', 'PFU2-3-22', 'asd', 'asd', 'asd', '100.00', '1.00', '100.00', '50.00', '50.00', '100.00', 'asd', '2022-10-20', 'USA', 'purchased'),
(326, '#CUSORD-14851-10', 'PFU2-4-22', ' Fitbit Versa 2 Health and Fitness Smartwatch ', ' Black/Carbon ', ' 	1.34 Inches', '20480.00', '1.00', '20480.00', '18560.00', '1920.00', '46460.00', 'https://www.amazon.com/Fitbit-Fitness-Smartwatch-Tracking-Included/dp/B07TWFVDWT/ref=sr_1_2?keywords=activity+trackers+and+smartwatches&pd_rd_r=86b23220-2b3d-4e1f-9726-b38f04bfb220&pd_rd_w=D5xDW&pd_rd_wg=XWjF7&pf_rd_p=33f8f65b-b95c-44af-8b89-e59e69e79828&pf_rd_r=RQH2V6KAYATV4GAQSBPT&qid=1666446295&qu=eyJxc2MiOiI1LjQ3IiwicXNhIjoiNC40NiIsInFzcCI6IjIuMDAifQ%3D%3D&sr=8-2', '2022-10-22', 'USA', 'purchased'),
(327, '#CUSORD-14851-10', 'PFU2-4-22', ' Google Pixel Watch - Android Smartwatch with Fitbit Activity Tracking ', ' Matte Black case with Obsidian Active ban ', ' 41 Millimeters ', '25980.00', '1.00', '25980.00', '22650.00', '3330.00', '46460.00', 'https://www.amazon.com/Google-Pixel-Watch-Smartwatch-Stainless/dp/B0BDSGHVMW/ref=sr_1_3?keywords=activity+trackers+and+smartwatches&pd_rd_r=86b23220-2b3d-4e1f-9726-b38f04bfb220&pd_rd_w=D5xDW&pd_rd_wg=XWjF7&pf_rd_p=33f8f65b-b95c-44af-8b89-e59e69e79828&pf_rd_r=RQH2V6KAYATV4GAQSBPT&qid=1666446432&qu=eyJxc2MiOiI1LjQ3IiwicXNhIjoiNC40NiIsInFzcCI6IjIuMDAifQ%3D%3D&sr=8-3', '2022-10-22', 'USA', 'purchased'),
(328, '#CUSORD-50225-10', 'PFU2-5-22', ' WHITIN Men\'s Minimalist Trail Runner ', 'Classic Black Gum', 'US 8', '6188.00', '1.00', '6188.00', '4500.00', '1688.00', '6188.00', 'https://www.amazon.com/dp/B07RMJKVB2/ref=redir_mobile_desktop?_encoding=UTF8&aaxitk=14949b1f8e949998736b8b0808c94b4f&content-id=amzn1.sym.53aae2ac-0129-49a5-9c09-6530a9e11786%3Aamzn1.sym.53aae2ac-0129-49a5-9c09-6530a9e11786&hsa_cr_id=2095217230801&pd_rd_plhdr=t&pd_rd_r=08c612b8-ba0c-4846-9eb8-3c37762e4582&pd_rd_w=HHnIL&pd_rd_wg=SoCUt&qid=1666503582&ref_=sbx_be_s_sparkle_lsi4d_asin_0_img&sr=1-1-a094db1c-5033-42c6-82a2-587d01f975e8&th=1&psc=1', '2022-10-23', 'USA', 'purchased'),
(329, '#CUSORD-9634-10', 'PFU2-2-22', 'Aveeno Baby Daily Moisture Lotion ', 'N/A', '8 fl. oz ', '825.00', '2.00', '1650.00', '1500.00', '150.00', '1650.00', 'https://www.amazon.com/Aveeno-Baby-Colloidal-Dimethicone-Fragrance-Free/dp/B005IHEAQA/ref=d_pd_sbs_sccl_2_5/147-0686344-0835514?pd_rd_w=ZZpqM&content-id=amzn1.sym.d8274306-8eaa-4da3-9175-aca6400f9aa9&pf_rd_p=d8274306-8eaa-4da3-9175-aca6400f9aa9&pf_rd_r=DJ62470SMDN5SDCBETNP&pd_rd_wg=20Wmu&pd_rd_r=711534c7-6a05-4165-8b97-9c67696b307b&pd_rd_i=B005IHEAQA&psc=1', '2022-10-23', 'USA', 'purchased'),
(330, '#CUSORD-99439-10', 'PFU2-6-22', 'Sceptre Curved 27\" Gaming Monitor 75Hz HDMI x2 VGA 98% sRGB Build-in Speakers', 'N/A', 'N/A', '19247.00', '1.00', '19247.00', '15000.00', '4247.00', '19247.00', 'https://www.amazon.com/Sceptre-Monitor-Speakers-Edge-Less-C275W-1920RN/dp/B08FRRNRXW/ref=sxin_15_pa_sp_search_thematic_sspa?content-id=amzn1.sym.643d1935-59b9-4ec1-86c7-654d6301fd85%3Aamzn1.sym.643d1935-59b9-4ec1-86c7-654d6301fd85&cv_ct_cx=pc+monitor&keywords=pc+monitor&pd_rd_i=B08FRRNRXW&pd_rd_r=6c889398-8d18-45ac-835b-5e528fe8aa8f&pd_rd_w=jUp0Y&pd_rd_wg=S4N3y&pf_rd_p=643d1935-59b9-4ec1-86c7-654d6301fd85&pf_rd_r=1R9E1GZR2YJ6HC0NGS74&qid=1666598880&qu=eyJxc2MiOiI3LjU5IiwicXNhIjoiNi44NSIsInFzcCI6IjYuMzcifQ%3D%3D&sprefix=pc+m%2Caps%2C315&sr=1-2-a73d1c8c-2fd2-4f19-aa41-2df022bcb241-spons&psc=1', '2022-10-24', 'USA', 'purchased'),
(331, '#CUSORD-39432-10', 'PFU2-7-22', 'Test Description', 'Black', 'US 8.5', '5260.00', '1.00', '5260.00', '4500.00', '760.00', '11760.00', 'www.amazon.com', '2022-10-25', 'USA', 'purchased'),
(332, '#CUSORD-39432-10', 'PFU2-7-22', 'Test Decsription', 'White', 'N/A', '6500.00', '1.00', '6500.00', '5500.00', '1000.00', '11760.00', 'www.adidas.com', '2022-10-25', 'USA', 'purchased'),
(333, '#CUSORD-99897-10', 'PFU2-8-22', 'This is a test description', '-', '-', '6568.00', '1.00', '6568.00', '4565.00', '2003.00', '6568.00', 'www.amazon.com', '2022-10-26', 'USA', 'purchased'),
(334, '#CUSORD-43047-10', 'PFU2-9-22', 'Test Description', '-', '-', '1560.00', '1.00', '1560.00', '950.00', '610.00', '1560.00', 'www.amazon.com', '2022-10-26', 'USA', 'purchased'),
(335, '#CUSORD-5629-10', 'PFU2-10-22', ' Frito-Lay Doritos & Cheetos Mix (40 Count) Variety Pack ', '-', '-', '3025.00', '1.00', '3025.00', '2600.00', '425.00', '3025.00', 'https://www.amazon.com/Frito-Lay-Doritos-Cheetos-Variety-Count/dp/B071LT3L25/ref=sr_1_3_mod_primary_new?crid=157FBQC6IJ3JQ&keywords=cheetos&qid=1666866002&qu=eyJxc2MiOiI2LjI0IiwicXNhIjoiNS45MCIsInFzcCI6IjUuNjgifQ%3D%3D&sbo=RZvfv%2F%2FHxDF%2BO5021pAnSA%3D%3D&sprefix=cheet%2Caps%2C429&sr=8-3', '2022-10-27', 'USA', 'purchased');

-- --------------------------------------------------------

--
-- Table structure for table `order_serial`
--

CREATE TABLE `order_serial` (
  `id` int(200) NOT NULL,
  `order_serial_no` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_serial`
--

INSERT INTO `order_serial` (`id`, `order_serial_no`) VALUES
(349, 1),
(350, 2),
(351, 3),
(352, 4),
(353, 5),
(354, 6),
(355, 7),
(356, 8),
(357, 9),
(358, 10),
(359, 11),
(360, 12),
(361, 13),
(362, 14),
(363, 15);

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `id` int(200) NOT NULL,
  `o_id` int(200) DEFAULT NULL,
  `customer_id` text DEFAULT NULL,
  `destination` text NOT NULL,
  `card_used` text NOT NULL,
  `currency_amount` text NOT NULL,
  `buying_UP` text NOT NULL,
  `buying_BDT` text NOT NULL,
  `gross_profit` text NOT NULL,
  `purchase_date` date NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`id`, `o_id`, `customer_id`, `destination`, `card_used`, `currency_amount`, `buying_UP`, `buying_BDT`, `gross_profit`, `purchase_date`, `note`) VALUES
(80, 321, 'PFU2-1-22', 'ST RK - USA', 'Mohaiminul Islam- City AMEX', 'USD95.05', '15', '1425.75', '1074.25', '2022-10-20', ''),
(81, 322, 'PFU2-1-22', 'ST RK - USA', 'Rizwanul Karim - VISA', 'USD100.00', '35', '3500', '3000', '2022-10-20', ''),
(82, 323, 'PFU2-2-22', 'Razzak Hossain - USA', 'Mohaiminul Islam- City AMEX', 'USD95.05', '10', '950.5', '609.5', '2022-10-20', ''),
(83, 324, 'PFU2-2-22', 'Shop N Air - UK', 'Mohaiminul Islam- City AMEX', 'BGP115.95', '65.66', '7613.277', '1036.723', '2022-10-20', ''),
(84, 326, 'PFU2-4-22', 'Orine Logistics - USA', 'Razzak Hossain - Master', 'USD106.00', '165.56', '17549.36', '2930.64', '2022-10-23', ''),
(85, 325, 'PFU2-3-22', 'Orine Logistics - USA', 'Mohaiminul Islam- City AMEX', 'USD95.05', '0.56', '53.23', '46.77', '2022-10-23', ''),
(86, 329, 'PFU2-2-22', 'Orine Logistics - USA', 'Mohaiminul Islam- City AMEX', 'USD95.05', '7.5', '712.88', '937.12', '2022-10-23', ''),
(87, 328, 'PFU2-5-22', 'ST RK - USA', 'Mohaiminul Islam- City AMEX', 'USD95.05', '45.65', '4339.03', '1848.97', '2022-10-24', ''),
(88, 327, 'PFU2-4-22', 'Orine Logistics - USA', 'Mohaiminul Islam- City AMEX', 'USD95.05', '250.56', '23815.73', '2164.27', '2022-10-24', ''),
(89, 332, 'PFU2-7-22', 'Orine Logistics - USA', 'Rizwanul Karim - VISA', 'USD100.00', '45.65', '4565.00', '1935.00', '2022-10-25', ''),
(90, 330, 'PFU2-6-22', 'Razzak Hossain - USA', 'Razzak Hossain - Master', 'USD106.00', '160.65', '17028.90', '2218.10', '2022-10-25', ''),
(91, 331, 'PFU2-7-22', 'Orine Logistics - USA', 'Mohaiminul Islam- City AMEX', 'USD95.05', '45.78', '4351.39', '908.61', '2022-10-25', ''),
(92, 335, 'PFU2-10-22', 'ST RK - USA', 'Nazmul Hossain- Discover', 'USD98.50', '22.65', '2231.02', '793.98', '2022-10-28', ''),
(93, 333, 'PFU2-8-22', 'Orine Logistics - USA', 'Nazmul Hossain- Discover', 'USD98.50', '56.95', '5609.58', '958.42', '2022-10-28', ''),
(94, 333, 'PFU2-8-22', 'Orine Logistics - USA', 'Nazmul Hossain- Discover', 'USD98.50', '56.95', '5609.58', '958.42', '2022-10-28', ''),
(95, 334, 'PFU2-9-22', 'ST RK - USA', 'Mohaiminul Islam- City AMEX', 'USD95.05', '8.98', '853.55', '706.45', '2022-10-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `contact_no`, `email`, `user_type`, `password`) VALUES
(15, 'gASbhx2cJBCb15WatlWYo9WT', 'gMDN3kjM3cTN5EDM4gzK', '=02bj5CbpFWbnBkct5WatlWYo9Wb', '=4WatRWQgIXZwV3U', '$2y$08$cWs3aFQqJmRGWXdmUVVieOsJ5jxA54wyZvBTUxuAQ9InWXAtDI1Xy'),
(16, '=ACIg0WayF2SgwWduF2d6lmU', 'gQDOxEDN5kTM4EDM4gzK', '=02bj5CbpFWbnB0auwWduF2d6lmc', '=4WatRWQgIXZwV3U', '$2y$08$cWs3aFQqJmRGWXdmUVVieOOvmervEMSxtuOYrdkWiyplTIuSdMWIu'),
(17, '==gbpF2cz9GSg4WYy1WS', '=IzM5gTMwYjM2EDM4gzK', '=02bj5CbpFWbnB0cz9Gau4WYy1Wa', '=4WatRWQ', '$2y$08$cWs3aFQqJmRGWXdmUVVieOOvmervEMSxtuOYrdkWiyplTIuSdMWIu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_beneficiary`
--
ALTER TABLE `address_beneficiary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_beneficairy`
--
ALTER TABLE `card_beneficairy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_serial`
--
ALTER TABLE `id_serial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_serial`
--
ALTER TABLE `order_serial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_beneficiary`
--
ALTER TABLE `address_beneficiary`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `card_beneficairy`
--
ALTER TABLE `card_beneficairy`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `id_serial`
--
ALTER TABLE `id_serial`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `order_serial`
--
ALTER TABLE `order_serial`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
