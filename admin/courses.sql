-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 08:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courses`
--

-- --------------------------------------------------------

--
-- Table structure for table `basiccp_modules`
--

CREATE TABLE `basiccp_modules` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Mode` varchar(255) NOT NULL,
  `module_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `size` varchar(255) NOT NULL,
  `download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basiccp_modules`
--

INSERT INTO `basiccp_modules` (`id`, `Title`, `Mode`, `module_Date`, `size`, `download`) VALUES
(1, 'Class-1', 'upload/8a1aac32b1.docx', '2023-03-05 00:00:00', '27056', '');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `batch_name` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `routine` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch_name`, `course_id`, `routine`, `size`, `download`) VALUES
(2, '  Batch-55', 4, 'upload/4051841f48.pdf', '909573', ''),
(6, '   Batch-59', 6, 'upload/d627cd58c5.pdf', '0', ''),
(7, 'Batch-56', 4, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `email` varchar(99) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `Name`, `email`, `subject`, `message`) VALUES
(1, 'sanjida sabiha', 'sasa@gmail.com', 'For Query', 'afdsfgbvnb');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `amount`, `course_id`, `image`, `description`) VALUES
(2, '$100', 5, 'upload/3e54531c49.jpg', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\" \"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain.'),
(3, '$500', 4, 'upload/ae72f7ed5a.jpg', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\" \"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain.'),
(4, '$1000', 6, 'upload/3a6239b2ec.jpg', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\" \"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain.');

-- --------------------------------------------------------

--
-- Table structure for table `course_plan`
--

CREATE TABLE `course_plan` (
  `id` int(255) NOT NULL,
  `Course_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_plan`
--

INSERT INTO `course_plan` (`id`, `Course_Name`) VALUES
(4, 'IELTS'),
(5, 'Basic Computer'),
(6, 'Spoken English');

-- --------------------------------------------------------

--
-- Table structure for table `ielts_modules`
--

CREATE TABLE `ielts_modules` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Mode` varchar(255) NOT NULL,
  `module_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `size` varchar(255) NOT NULL,
  `download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ielts_modules`
--

INSERT INTO `ielts_modules` (`id`, `Title`, `Mode`, `module_Date`, `size`, `download`) VALUES
(1, 'batch-2', 'upload/a46c40a5f9.docx', '2023-03-05 00:00:00', '0', ''),
(2, 'class3', 'upload/9bdb8489b8.docx', '2023-03-14 00:00:00', '164647', ''),
(3, 'class-4', 'upload/c9dfe4b6d9.pdf', '2023-03-15 00:00:00', '200634', '');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `notice_board` varchar(255) DEFAULT NULL,
  `noticeDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `size` varchar(255) NOT NULL,
  `download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `notice_board`, `noticeDate`, `size`, `download`) VALUES
(1, 'PHP', 'upload/9371ec3d51.pdf', '2023-02-09 18:00:00', '0', ''),
(2, 'India city on red alert for further rain', 'upload/c3b5303ff0.pdf', '2023-02-10 18:00:00', '813037', ''),
(3, 'City Council', 'upload/4a1f57a8aa.pdf', '2023-02-11 18:00:00', '447439', ''),
(4, 'holiday', 'upload/ff47c20a1f.pdf', '2023-03-13 18:00:00', '200634', '');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `routine` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `course_id`, `batch_id`, `routine`, `size`, `download`) VALUES
(6, 6, 6, 'upload/16922b2ed6.pdf', '198825', ''),
(7, 4, 2, 'upload/1dbb75adfe.pdf', '0', ''),
(8, 5, 7, 'upload/21d47a87df.docx', '15763', '');

-- --------------------------------------------------------

--
-- Table structure for table `spoken_modules`
--

CREATE TABLE `spoken_modules` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Mode` varchar(255) NOT NULL,
  `module_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `size` varchar(255) NOT NULL,
  `download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `email`, `course_id`, `mobile`, `password`, `status`) VALUES
(1, ' faisal', 'faisal@gmail.com', 4, '01710903032', '123456789', 'enroll'),
(9, ' tahmid', 'tahmid@gmail.com', 5, '01710903032', '12345678', 'enroll'),
(11, 'sanjida sabiha', 'sabiha@gmail.com', 4, '01312890301', '123456789', 'enroll'),
(12, 'nader', 'nader@gmail.com', 6, '012451254122', '123456789', 'enroll'),
(13, ' kamran', 'kamran@gmail.com', 5, '0189008000', '12345678', 'enroll'),
(14, ' kamran', 'kamran123@gmail.com', 5, '01686195607', '12345678', 'enroll'),
(15, ' sumaiya', 'sumaiya@gmail.com', 4, '01686195607', '12345678', 'enroll'),
(16, ' samiha', 'samiha@gmail.com', 4, '0179581100', '12345678', 'enroll');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `course_id`, `email`, `password`, `mobile`, `image`, `details`) VALUES
(3, 'Tabraiz ShamsiI', 4, 'neep123@gmail.com', '1234567890', '017172528000', 'upload/74c58f8a31.png', 'Hellw WorldD<br>'),
(5, 'Ahad Ahmed', 6, 'naderneep252000@gmail.com', '12345678', '01795811001', 'upload/f13b2855e1.png', 'Web Development<br>'),
(6, 'NeymarS', 5, 'neymarjHr@gmail.com', '12345678901', '01819710387', 'upload/a98fb805c1.jpg', 'PHHHGFG<br>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `usertype` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`, `email`, `mobile`, `gender`, `terms`, `usertype`) VALUES
(1, 'kamran', 'Chowdhury', 'user_123', '123456789', 'user@gmail.com', '01312890301', 'male', 'yes', 'staff'),
(2, 'admin', 'nader', 'nader_nihal', '123456789', 'admin@gmail.com', '01312890301', 'Male', 'yes', 'admin'),
(5, 'faisal', 'Mohammed', 'user_123', '12345678', 'faisal@gmail.com', '01710903032', 'Male', 'yes', 'staff'),
(6, 'kamran', 'chowdhury', 'kamran123', '12345678', 'kamran@gmail.com', '0171266435', 'Male', 'yes', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `message`) VALUES
(1, 'aDSfdfgg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basiccp_modules`
--
ALTER TABLE `basiccp_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course_plan`
--
ALTER TABLE `course_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ielts_modules`
--
ALTER TABLE `ielts_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basiccp_modules`
--
ALTER TABLE `basiccp_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_plan`
--
ALTER TABLE `course_plan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ielts_modules`
--
ALTER TABLE `ielts_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
