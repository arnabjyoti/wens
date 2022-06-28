-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 12:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu_adrp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `u_id` int(30) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `address` varchar(200) NOT NULL,
  `est_date` date NOT NULL,
  `center_location` varchar(80) NOT NULL,
  `center_owner` varchar(50) NOT NULL,
  `center_in_chrg` varchar(50) NOT NULL,
  `theory_room` varchar(30) NOT NULL,
  `office_room` varchar(30) NOT NULL,
  `lab_room` varchar(30) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `pan` varchar(50) NOT NULL,
  `system_no` varchar(30) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_status` int(11) NOT NULL,
  `anx_2_status` int(30) NOT NULL,
  `anx2_request` int(11) NOT NULL DEFAULT 0,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`u_id`, `user_name`, `contact_no`, `email`, `password`, `address`, `est_date`, `center_location`, `center_owner`, `center_in_chrg`, `theory_room`, `office_room`, `lab_room`, `gst`, `pan`, `system_no`, `reg_date`, `user_status`, `anx_2_status`, `anx2_request`, `role`) VALUES
(1, 'adrp', '9876543210', '', '5f4dcc3b5aa765d61d8327deb882cf99', '', '0000-00-00', '', 'anil Chabua', 'anil chamuah', '5', '1', '5', 'GST265665', 'adrp545', '5', '2021-04-03 20:30:49', 1, 2, 0, 'admin'),
(20, 'CC001', '98765432105', 'CC001@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'tihu town, ward no.: 4, P.O.: tihu, District: nalbari, Assam', '2021-02-12', 'pathsala', 'arnab', 'john', '5', '1', '3', 'dfdh458', 'dfdfd778', '10', '2021-04-21 20:00:54', 1, 1, 0, 'client'),
(21, 'CC002', '9876543210', 'CC002@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'ghy', '2021-04-05', 'ghy', 'john', '', '', '', '', '', '', '', '2021-04-21 20:03:02', 1, 1, 0, 'client'),
(27, 'CC003', '9876543210', 'hnath7088&@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'ghrte', '2021-04-02', 'pathsala', 'john', '', '', '', '', '', '', '', '2021-04-30 19:55:34', 1, 0, 0, 'client'),
(28, 'CC109', '7002717483', 'doimukhcomputer@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tullan Complex, Doimukh Main Market, Dist. - Papum Pare, Arunachal Pradesh - 791112', '2018-10-10', 'Doimukh', 'Atul Pachani', 'Atul Pachani', '1', '1', '2', '', '', '10', '2021-06-15 14:29:05', 1, 1, 0, 'client'),
(29, 'CC110', '8258971267', 'cc110@adrp.in', 'a6cda77f27a81c0f7c99f6e1112bfa8d', '1st Floor, Danyi Complex, Naharlagun, Arunachal Pradesh - 791110', '2019-04-02', 'Naharlagun', 'Shristy Kumar Sharma', 'Shristy Kumar Sharma', '1', '1', '1', '', '', '5', '2021-06-15 17:09:12', 1, 1, 0, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `admsn_frm`
--

CREATE TABLE `admsn_frm` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `aplc_id` varchar(30) NOT NULL,
  `enrollment_id` varchar(40) NOT NULL,
  `anx_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fathers_name` varchar(60) NOT NULL,
  `father_contact_no` varchar(30) NOT NULL,
  `mother_name` varchar(60) NOT NULL,
  `mother_contact_no` varchar(30) NOT NULL,
  `cors_address` varchar(150) NOT NULL,
  `cors_land` varchar(100) NOT NULL,
  `cors_district` varchar(40) NOT NULL,
  `cors_state` varchar(30) NOT NULL,
  `cors_pin` varchar(30) NOT NULL,
  `pr_address` varchar(150) NOT NULL,
  `pr_land` varchar(100) NOT NULL,
  `pr_district` varchar(40) NOT NULL,
  `pr_state` varchar(30) NOT NULL,
  `pr_pin` varchar(30) NOT NULL,
  `education` varchar(100) NOT NULL,
  `course_strem` varchar(100) NOT NULL,
  `e_ins_name` varchar(100) NOT NULL,
  `e_board` varchar(100) NOT NULL,
  `pass_year` varchar(100) NOT NULL,
  `percent` varchar(50) NOT NULL,
  `blood_gr` varchar(30) NOT NULL,
  `alergic_to` varchar(100) NOT NULL,
  `severe_disease` varchar(60) NOT NULL,
  `emergency_name` varchar(50) NOT NULL,
  `emergency_contact_no` varchar(30) NOT NULL,
  `emergency_relation` varchar(30) NOT NULL,
  `stdnt_ocu` varchar(30) NOT NULL,
  `father_ocu` varchar(30) NOT NULL,
  `mother_ocu` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `sign` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `graduation` varchar(200) NOT NULL,
  `fee` varchar(40) NOT NULL,
  `form_date` date NOT NULL,
  `discount` varchar(30) NOT NULL,
  `certificate_status` varchar(40) NOT NULL,
  `cur_date` datetime NOT NULL DEFAULT current_timestamp(),
  `enrollment_apply_date` date NOT NULL,
  `theory_mark` varchar(30) NOT NULL,
  `prectical_mark` varchar(30) NOT NULL,
  `exam_date` date NOT NULL,
  `certificate_no` varchar(40) NOT NULL,
  `certificate_date` date NOT NULL,
  `fee_status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admsn_frm`
--

INSERT INTO `admsn_frm` (`id`, `u_id`, `aplc_id`, `enrollment_id`, `anx_id`, `name`, `dob`, `gender`, `nationality`, `contact_no`, `email`, `fathers_name`, `father_contact_no`, `mother_name`, `mother_contact_no`, `cors_address`, `cors_land`, `cors_district`, `cors_state`, `cors_pin`, `pr_address`, `pr_land`, `pr_district`, `pr_state`, `pr_pin`, `education`, `course_strem`, `e_ins_name`, `e_board`, `pass_year`, `percent`, `blood_gr`, `alergic_to`, `severe_disease`, `emergency_name`, `emergency_contact_no`, `emergency_relation`, `stdnt_ocu`, `father_ocu`, `mother_ocu`, `photo`, `sign`, `age`, `graduation`, `fee`, `form_date`, `discount`, `certificate_status`, `cur_date`, `enrollment_apply_date`, `theory_mark`, `prectical_mark`, `exam_date`, `certificate_no`, `certificate_date`, `fee_status`) VALUES
(66, 20, '001/APPL/1', '1', 64, 'KAMAL KALITA', '1995-02-01', 'Male', 'Indian', '0987654321', 'arnabthakuria@gmail.com', 'KANGKAN TALUKDAR', '0987654321', 'KAMINI DAS', '0987654321', 'PATHSALA, WARD NO.: 8 P.O.: BAJALI, P.S.: PATHSALA', 'NEAR BAJALI COLLEGE', 'BAJALI', 'ASSAM', '78341', 'PATHSALA, WARD NO.: 8 P.O.: BAJALI, P.S.: PATHSALA', 'NEAR BAJALI COLLEGE', 'BAJALI', 'ASSAM', '78341', 'Graduation', 'arts', 'bajali college', 'bhattadev university', '2016', '76', 'o+', 'dust', '', 'sailen kalita', '0987654321', 'father', 'Student', 'Pvt. Service', 'Housewife', '202106141623667318photo.jpg', '1623667318sign.jpg', '1623667318age.jpg', '', '1000', '2021-03-03', '0', '', '2021-06-14 16:11:57', '2021-06-14', '40', '45', '2021-06-03', '1', '2021-06-14', '0'),
(67, 20, '001/APPL/2', 'cc00121', 65, 'BIKASH DAS', '2021-06-14', 'Male', 'Indian', '0987654321', 'bikash@gmail.com', 'DIPAK DAS', '0987654321', 'NIRMALI DAS', '0987654321', 'PATHSALA, WARD NO.: 8 P.O.: BAJALI, P.S.: PATHSALA', 'NEAR BAJALI COLLEGE', 'BAJALI', 'ASSAM', '781371', 'PATHSALA, WARD NO.: 8 P.O.: BAJALI, P.S.: PATHSALA', 'NEAR BAJALI COLLEGE', 'BAJALI', 'ASSAM', '781371', 'Graduation', 'arts', 'bajali college', 'bhattadev university', '2011', '78', 'o+', 'dust', '', 'sailen kalita', '0987654321', 'uncle', 'Student', 'Govt. Service', 'Housewife', '202106141623688773photo.jpg', '1623688773sign.jpg', '1623688773age.jpg', '1623688773graduation.jpg', '2000', '2021-03-10', '10', '', '2021-06-14 22:09:32', '2021-06-14', '45', '40', '2021-06-14', 'CN/001/1001', '2021-06-14', 'Paid'),
(68, 20, '001/APPL/3', 'Anil/Test/4', 70, 'SANJAY KALITA', '1990-03-02', 'Male', 'Indian', '9876543210', 'arnabthakuria@gmail.com', 'KANGKAN TALUKDAR', '9876543210', 'NIRMALI DAS', '9876543210', 'PATHSALA, WARD NO.: 8 P.O.: BAJALI, P.S.: PATHSALA', 'NEAR BAJALI COLLEGE', 'BAJALI', 'ASSAM', '123456', 'PATHSALA, WARD NO.: 8 P.O.: BAJALI, P.S.: PATHSALA', 'NEAR BAJALI COLLEGE', 'BAJALI', 'ASSAM', '123456', 'Graduation', 'arts', 'bajali college', 'bhattadev university', '2011', '78', '', '', '', 'sailen kalita', '9876543210', 'uncle', 'Student', 'Govt. Service', 'Housewife', '202106141623694019photo.jpg', '1623694019sign.jpg', '1623694019age.jpg', '1623694019graduation.jpg', '7000', '2021-03-01', '10', '', '2021-06-14 23:36:58', '2021-06-14', '30', '40', '2021-06-15', 'CN001', '2021-06-15', '0'),
(69, 28, '109/APPL/1', '1092020LT0011001', 144, 'GYAMAR ANU', '1999-04-07', 'Female', 'Indian', '8729967631', 'doimukhcomputer@gmail.com', 'GYAMAR TAJE', '8729967631', 'GYAMAR  YALLER', '8729967631', 'NINPU VILLAGE', 'JAMPA', 'PAPUM PARE', 'ARUNACHAL PRADESH', '791112', 'NINPU VILLAGE', 'JAMPA', 'PAPUM PARE', 'ARUNACHAL PRADESH', '791112', 'HS', 'ARTS', 'open', 'CBSE', '2014', '70', '', '', '', 'Atul  Pachani', '8729967631', 'teacher', 'Student', 'Others', 'Housewife', '202106181623992721photo.jpg', '1623992721sign.jpg', '1623992721age.jpg', '1623992721graduation.jpg', '7500', '2020-01-29', '10', '', '2021-06-18 10:35:21', '2021-06-18', '35', '40', '2021-04-09', 'CN/109/1001', '2021-04-12', 'Paid'),
(70, 28, '109/APPL/2', '1092019LT0011002', 144, 'JORAM NYER', '1999-01-03', 'Male', 'Indian', '9862352564', 'doimukhcomputer@gmail.com', 'JORAM TAKO', '8787638632', 'LT JORAM OYU', '0000000', 'MIDPU II', 'DOIMUKH', 'PAPUM PARE', 'ARUNACHAL PRADESH', '791112', 'MIDPU II', 'DOIMUKH', 'PAPUM PARE', 'ARUNACHAL PRADESH', '791112', 'B Tech', 'B Tech Civil', 'NIT Arunachal Pradesh', 'NIT', '2020', '50', '', '', '', 'Joram Tako', '8787638632', 'Father', 'Student', 'Others', 'Others', '202106181624024881photo.jpg', '1624024881sign.jpeg', '1624024881age.jpeg', '1624024881graduation.jpeg', '7500', '2019-01-29', '10', '', '2021-06-18 19:31:21', '2021-06-18', '39', '40', '2021-04-09', 'CN/109/1002', '2021-04-12', '0'),
(71, 28, '109/APPL/3', '1092020MT0011003', 140, 'LITUM BAGRA', '1997-06-09', 'Male', 'Indian', '8119040258', 'doimukhcomputer@gmail.com', 'JUMLI BAGRA', '8794266629', 'JUMNYA BAGRA', '1234567890', 'MANI VILLAGE', 'AALO', 'WEST SIANG', 'Arunachal Pradesh', '791112', 'MANI VILLAGE', 'AALO', 'WEST SIANG', 'Arunachal Pradesh', '791112', 'BA', 'ARTS', 'RGU', 'RGU', '2019', '60', '', '', '', 'Atul  Pachani', '7002717483', 'teacher', 'Student', 'Business', 'Housewife', '202106191624111519photo.jpeg', '1624111519sign.jpeg', '1624111519age.jpeg', '1624111519graduation.jpeg', '5000', '2020-04-13', '10', '', '2021-06-19 19:35:19', '2021-06-19', '40', '40', '2021-04-09', 'CN/109/1003', '2021-04-12', '0'),
(72, 28, '109/APPL/4', '1092020LT0011004', 144, 'BIKI RANI', '1999-12-13', 'Female', 'Indian', '8259047098', 'doimukhcomputer@gmail.com', 'BIKI TAKO', '8259047098', 'BIKI YADAR', '123456789', 'DOIMUKH C SECTOR', 'MEDICAL COLONY', 'PAPUM PARE', 'ARUNACHAL PRADESH', '791112', 'DOIMUKH C SECTOR', 'MEDICAL COLONY', 'PAPUM PARE', 'ARUNACHAL PRADESH', '791112', 'BA', 'ARTS', 'RGU', 'RGU', '2020', '65', '', '', '', 'Atul  Pachani', '7002717483', 'teacher', 'Student', 'Business', 'Housewife', '202106191624112555photo.jpeg', '1624112555sign.jpeg', '1624112621age.jpeg', '1624112555graduation.jpeg', '7500', '2020-03-18', '10', '', '2021-06-19 19:52:35', '2021-06-19', '38', '39', '2021-04-09', '', '0000-00-00', '0'),
(73, 28, '109/APPL/5', '1092020MT0011005', 140, 'PUJI SANJAY', '1995-07-24', 'Male', 'Indian', '7005435142', 'doimukhcomputer@gmail.com', 'PUJI TALE', '7005435142', 'PUJI YECHAP', '45645465', 'BANK TINIALI', 'ITANAGAR', 'PAPUM PARE', 'ARUNACHAL PRADESH', '791112', 'BANK TINIALI', 'ITANAGAR', 'PAPUM PARE', 'ARUNACHAL PRADESH', '791112', 'HS', 'ARTS', 'RGU', 'CBSE', '2012', '55', '', '', '', 'Atul  Pachani', '7002717483', 'teacher', 'Student', 'Business', 'Housewife', '202106191624113424photo.jpeg', '1624113424sign.jpeg', '1624113424age.jpeg', '1624113424graduation.jpeg', '5000', '2020-04-13', '10', '', '2021-06-19 20:07:04', '2021-06-19', '40', '40', '2021-04-09', '', '0000-00-00', '0'),
(74, 28, '109/APPL/6', '1092019LT0011006', 144, 'RUTH NGURANG', '1998-08-12', 'Female', 'Indian', '8731915480', 'doimukhcomputer@gmail.com', 'LATE TADAR NGURANG', '000000', 'JAMRANG NGURANG', '452345343', 'RONO', 'VILLAGE', 'PAPUM PARE', 'Arunachal Pradesh', '791112', 'RONO', 'VILLAGE', 'PAPUM PARE', 'Arunachal Pradesh', '791112', 'BA', 'ARTS', 'RGU', 'RGU', '2019', '60', '', '', '', 'Atul  Pachani', '700717483', 'teacher', 'Student', 'Others', 'Housewife', '202106191624114784photo.jpeg', '1624114784sign.jpeg', '1624114784age.jpeg', '1624114784graduation.jpeg', '7500', '2019-09-19', '10', '', '2021-06-19 20:29:43', '2021-06-19', '35', '40', '2021-04-09', 'CN/109/1004', '2021-04-12', '0');

-- --------------------------------------------------------

--
-- Table structure for table `anx_2`
--

CREATE TABLE `anx_2` (
  `anx_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_fee` int(11) NOT NULL,
  `admission_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anx_2`
--

INSERT INTO `anx_2` (`anx_id`, `course_id`, `user_id`, `course_fee`, `admission_fee`) VALUES
(43, 1, 1, 100, 100),
(44, 2, 1, 200, 200),
(45, 3, 1, 300, 300),
(46, 4, 1, 400, 400),
(47, 5, 1, 500, 500),
(48, 6, 1, 600, 600),
(49, 7, 1, 700, 700),
(50, 8, 1, 800, 800),
(51, 9, 1, 900, 900),
(52, 10, 1, 1000, 1000),
(53, 11, 1, 1100, 1100),
(54, 12, 1, 1200, 1200),
(55, 13, 1, 1300, 1300),
(56, 14, 1, 100, 100),
(57, 15, 1, 200, 200),
(58, 16, 1, 300, 300),
(59, 17, 1, 400, 400),
(60, 18, 1, 100, 100),
(61, 19, 1, 200, 200),
(62, 20, 1, 300, 300),
(63, 21, 1, 100, 100),
(64, 1, 20, 1000, 1000),
(65, 2, 20, 2000, 2000),
(66, 3, 20, 3000, 3000),
(67, 4, 20, 4000, 4000),
(68, 5, 20, 5000, 5000),
(69, 6, 20, 6000, 6000),
(70, 7, 20, 7000, 7000),
(71, 8, 20, 8000, 8000),
(72, 9, 20, 9000, 9000),
(73, 10, 20, 10000, 10000),
(74, 11, 20, 11000, 11000),
(75, 12, 20, 12000, 12000),
(76, 13, 20, 13000, 13000),
(77, 14, 20, 100, 100),
(78, 15, 20, 1002, 1002),
(79, 16, 20, 1003, 1003),
(80, 17, 20, 1004, 1004),
(81, 18, 20, 1011, 1011),
(82, 19, 20, 1012, 1012),
(83, 20, 20, 1013, 1013),
(84, 21, 20, 12000, 500),
(85, 1, 21, 3000, 200),
(86, 2, 21, 2000, 200),
(87, 3, 21, 3200, 200),
(88, 4, 21, 3300, 200),
(89, 5, 21, 3400, 200),
(90, 6, 21, 3500, 200),
(91, 7, 21, 3600, 200),
(92, 8, 21, 3700, 200),
(93, 9, 21, 3800, 200),
(94, 10, 21, 3900, 200),
(95, 11, 21, 4900, 200),
(96, 12, 21, 4800, 200),
(97, 13, 21, 4700, 200),
(98, 14, 21, 4600, 200),
(99, 15, 21, 4400, 199),
(100, 16, 21, 4300, 200),
(101, 17, 21, 4100, 200),
(102, 18, 21, 4200, 200),
(103, 19, 21, 4000, 200),
(104, 20, 21, 5500, 200),
(105, 21, 21, 6000, 200),
(106, 1, 29, 1500, 500),
(107, 2, 29, 1500, 500),
(108, 3, 29, 2000, 500),
(109, 4, 29, 2500, 500),
(110, 5, 29, 3000, 500),
(111, 6, 29, 3000, 500),
(112, 7, 29, 3000, 500),
(113, 8, 29, 3000, 500),
(114, 9, 29, 3000, 500),
(115, 10, 29, 3000, 500),
(116, 11, 29, 3000, 500),
(117, 12, 29, 5000, 500),
(118, 13, 29, 3000, 500),
(119, 14, 29, 4500, 500),
(120, 15, 29, 6000, 500),
(121, 16, 29, 4500, 500),
(122, 17, 29, 8000, 500),
(123, 18, 29, 6000, 500),
(124, 19, 29, 10000, 500),
(125, 20, 29, 11000, 500),
(126, 21, 29, 12000, 500),
(127, 1, 28, 2500, 0),
(128, 2, 28, 2500, 0),
(129, 3, 28, 2500, 0),
(130, 4, 28, 2500, 0),
(131, 5, 28, 2500, 0),
(132, 6, 28, 2500, 0),
(133, 7, 28, 2500, 0),
(134, 8, 28, 2500, 0),
(135, 9, 28, 2500, 0),
(136, 10, 28, 2500, 0),
(137, 11, 28, 2500, 0),
(138, 12, 28, 3000, 0),
(139, 13, 28, 2500, 0),
(140, 14, 28, 5000, 0),
(141, 15, 28, 5000, 0),
(142, 16, 28, 5000, 0),
(143, 17, 28, 6000, 0),
(144, 18, 28, 7500, 0),
(145, 19, 28, 7500, 0),
(146, 20, 28, 9000, 0),
(147, 21, 28, 12000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `duration` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_code`, `course_name`, `duration`) VALUES
(1, 'ST 001', 'Computer Basics', '3'),
(2, 'ST 002', 'Desktop Publishing (DTP)', '3'),
(3, 'ST 003', 'Photo Editing', '3'),
(4, 'ST 004', 'Video Editing', '3'),
(5, 'ST 005', 'Tally', '3'),
(6, 'ST 006', 'HTML/DHTML', '3'),
(7, 'ST 007', 'Linux Basics', '3'),
(8, 'ST 008', 'DBMS/RDBMS', '3'),
(9, 'ST 009', 'Java Script/VB Script', '3'),
(10, 'ST 010', 'C/C++', '3'),
(11, 'ST 011', 'Visual Basic', '3'),
(12, 'ST 012', 'Hardware & Networking', '3'),
(13, 'ST 013', 'E-Office & Internet', '3'),
(14, 'MT 001', 'Certificate in Computer Science & Applications (CCSA)', '6'),
(15, 'MT 002', 'Certificate in Web Development (CWD)', '6'),
(16, 'MT 003', 'Certificate in Office Automation (COA)', '6'),
(17, 'MT 004', 'Certificate in Computer Hardware & Networking (CCHN)', '6'),
(18, 'LT 001', 'Diploma in Computer Science & Applications (DCSA)', '12'),
(19, 'LT 002', 'Diploma in Web & Application Programming (DWAP)', '12'),
(20, 'LT 003', 'Diploma in Computer Hardware & Networking (DCHN)', '12'),
(21, 'PG 001', 'Post Graduate Diploma in Computer Applications (PGDCA)', '12');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `percent` varchar(40) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `u_id` int(11) NOT NULL,
  `discount_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `percent`, `start`, `end`, `u_id`, `discount_status`) VALUES
(5, '10', '2021-06-14', '2021-07-13', 20, 'Approved'),
(6, '10', '2021-01-01', '2021-06-30', 28, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `fee_collect`
--

CREATE TABLE `fee_collect` (
  `fee_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `invoice_no` varchar(40) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `fee_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `due` int(50) NOT NULL,
  `total_paid` int(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_collect`
--

INSERT INTO `fee_collect` (`fee_id`, `u_id`, `student_id`, `invoice_no`, `amount`, `fee_date_time`, `due`, `total_paid`) VALUES
(36, 28, 69, '109/STINV/1', '3000', '2021-06-18 10:39:41', 3750, 3000),
(37, 28, 69, '109/STINV/2', '3750', '2021-06-18 10:40:16', 0, 6750),
(47, 20, 67, '001/STINV/1', '300', '2021-06-21 15:47:07', 1500, 300),
(48, 20, 67, '001/STINV/2', '100', '2021-06-21 15:47:18', 1400, 400),
(49, 20, 67, '001/STINV/3', '200', '2021-06-21 15:47:27', 1200, 600),
(50, 20, 67, '001/STINV/4', '1200', '2021-06-21 15:48:28', 0, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `payment_fee` varchar(30) NOT NULL,
  `tax` varchar(30) NOT NULL,
  `shipping` varchar(30) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `payment_date_time` date NOT NULL,
  `payment_curent_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `invoice_no`, `student_id`, `u_id`, `payment_mode`, `transaction_id`, `payment_fee`, `tax`, `shipping`, `total_amount`, `status`, `payment_date_time`, `payment_curent_date`) VALUES
(48, '001/INV/1', 66, 20, 'UPI ID', 'fghhfgfhgh', '100', '18', '100', '218', 'Success', '2021-06-13', '2021-06-14 16:14:55'),
(49, '001/INV/2', 67, 20, 'UPI ID', '12345', '180', '18', '100', '312.4', 'Success', '2021-06-14', '2021-06-14 23:21:36'),
(50, '001/INV/3', 68, 20, 'QR Code', '1123', '630', '18', '100', '843.4', 'Success', '2021-06-15', '2021-06-15 18:06:21'),
(51, '109/INV/1', 69, 28, 'QR Code', '117138250789', '675', '18', '100', '3020.5', 'Success', '2021-06-20', '2021-06-20 18:57:29'),
(52, '109/INV/1', 70, 28, 'QR Code', '117138250789', '675', '18', '100', '3020.5', 'Success', '2021-06-20', '2021-06-20 18:57:29'),
(53, '109/INV/1', 71, 28, 'QR Code', '117138250789', '450', '18', '100', '3020.5', 'Success', '2021-06-20', '2021-06-20 18:57:29'),
(54, '109/INV/1', 74, 28, 'QR Code', '117138250789', '675', '18', '100', '3020.5', 'Success', '2021-06-20', '2021-06-20 18:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `aca_quali` varchar(50) NOT NULL,
  `cmp_quali` varchar(50) NOT NULL,
  `date_of_join` date NOT NULL,
  `job_roll` varchar(50) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `staff_img` varchar(100) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `full_name`, `aca_quali`, `cmp_quali`, `date_of_join`, `job_roll`, `skill`, `staff_img`, `u_id`) VALUES
(49, 'ARNABJYOTI THAKURIA', 'Graduate', 'DCAM', '2021-04-01', 'PRO/ Counselor', '', '1619792491aa.png', 1),
(50, 'ARNABJYOTI THAKURIA', 'HS', 'DCAM', '2021-05-04', 'Faculty', 'C++', '1620629904aa.png', 20),
(51, 'Shristy Kumar Sharma', 'Post Graduate', 'PGDCA', '2019-04-02', 'Center In-Charge', '', '1623758181aa.jpg', 29),
(52, 'Atul Pachani', 'Post Graduate', 'MCA', '2018-10-10', 'Center In-Charge', '', '1623990232aa.jpg', 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `admsn_frm`
--
ALTER TABLE `admsn_frm`
  ADD PRIMARY KEY (`id`,`u_id`,`anx_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `anx_id` (`anx_id`);

--
-- Indexes for table `anx_2`
--
ALTER TABLE `anx_2`
  ADD PRIMARY KEY (`anx_id`,`course_id`,`user_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`,`u_id`,`student_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`,`u_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `fee_collect`
--
ALTER TABLE `fee_collect`
  ADD PRIMARY KEY (`fee_id`,`u_id`,`student_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`,`student_id`,`u_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`,`u_id`),
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `u_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `admsn_frm`
--
ALTER TABLE `admsn_frm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `anx_2`
--
ALTER TABLE `anx_2`
  MODIFY `anx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fee_collect`
--
ALTER TABLE `fee_collect`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admsn_frm`
--
ALTER TABLE `admsn_frm`
  ADD CONSTRAINT `admsn_frm_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `admin` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admsn_frm_ibfk_2` FOREIGN KEY (`anx_id`) REFERENCES `anx_2` (`anx_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anx_2`
--
ALTER TABLE `anx_2`
  ADD CONSTRAINT `anx_2_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anx_2_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `admin` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `admin` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `admsn_frm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `admin` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fee_collect`
--
ALTER TABLE `fee_collect`
  ADD CONSTRAINT `fee_collect_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `admsn_frm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fee_collect_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `admin` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `admsn_frm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `admin` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `admin` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
