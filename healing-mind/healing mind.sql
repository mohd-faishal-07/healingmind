-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 08:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healingmind`

-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Cardiology', 'cardiology.jpg', 'Yes', 'Yes'),
(5, 'Dental', 'dental.jpg', 'Yes', 'Yes'),
(6, 'Neurology', 'neurology.jpg', 'Yes', 'Yes'),
(7, 'Neurosurgery', 'neurosurgery.avif', 'No', 'Yes'),
(8, 'Othopadics', 'orthopadics.jpg', 'No', 'Yes');
(9, 'Otolaryngology', 'Otolaryngology.jpg', 'No', 'Yes');


-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(4, 'Computed Tomography Scan (CT Scan)', 'A procedure that uses a computer linked to an x-ray machine to make a series of detailed pictures of areas inside the body.', '760.00/-', 'ctscan.jpg', 7, 'Yes', 'Yes'),
(5, 'Electrocardiogram (ECG)', 'An electrocardiogram (ECG) is a simple test that can be used to check your hearts rhythm and electrical activity.', '100.00/-', 'ecg.jpg', 4, 'Yes', 'Yes'),
(6, ' bone densitometry', 'A bone density test is used to measure bone mineral content and density.', '140.00/-', 'bonedensity.jpg', 8, 'Yes', 'Yes'),
(7, 'X-radiation (x-ray)', 'X-rays are a form of electromagnetic radiation, similar to visible light.', '320.00/-', 'xray.jpg', 7, 'No', 'Yes'),
(8, 'Echocardiogram (ultrasound)', 'Ultrasound is an imaging method that uses sound waves to produce images of structures within your body. ', '450.00/-', 'ultrasound.jpg', 4, 'No', 'Yes'),
(9, 'Magnetic resonance imaging (MRI)', 'MRI is a noninvasive way for your doctor to examine your organs, tissues and skeletal system.', '2750.00/-', 'mri.jpg', 6, 'No', 'Yes'),
(10, 'Endoscopy', 'It is a procedure used to visually examine your upper digestive system.', '700.00/-',  'endoscopy.jpg', 8, 'No', 'Yes'),
(11, 'Audiometry', 'It is a procedure used to visually examine your upper digestive system.', '1200.00/-', 'audiometry.jpg', 9, 'No', 'Yes')
(12, 'Tooth Fillings', 'A filling is used to treat a small hole, or cavity, in a tooth.', '300.00/-',  'toothfilling.jpg', 5, 'No', 'Yes'),
(13, 'Tooth X-ray', 'Dental X-rays (radiographs) are internal images of your teeth and jaws.', '400.00/-', 'toothxray.jpg', 5, 'No', 'Yes')

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `service` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `persons` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `booking_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id`, `service`, `price`, `persons`, `total`, `bookig_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `appointment_date`) VALUES
(1, 'Audiometry', '1200.00', 1, '1200.00', '2023-04-07', 'Booked', 'abc', '8976546878', 'abc@gmail.com', '197 sector-12', '2023-04-08')

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(25) NOT NULL,
  `mobile` varchar(10) UNSIGNED NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `mobile`, `password`) VALUES
('Mohd faishal', '7814556309', '123456')
--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

