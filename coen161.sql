-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2017 at 05:32 AM
-- Server version: 5.5.52-MariaDB
-- PHP Version: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coen161`
--

-- --------------------------------------------------------

--
-- Table structure for table `camp_child`
--

CREATE TABLE `camp_child` (
  `id` int(10) UNSIGNED NOT NULL,
  `child` int(10) UNSIGNED NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `location` varchar(10) NOT NULL,
  `year` int(10) UNSIGNED NOT NULL,
  `summer1` tinyint(1) NOT NULL DEFAULT '0',
  `summer2` tinyint(1) NOT NULL DEFAULT '0',
  `summer3` tinyint(1) NOT NULL DEFAULT '0',
  `summer4` tinyint(1) NOT NULL DEFAULT '0',
  `winter1` tinyint(1) NOT NULL DEFAULT '0',
  `winter2` tinyint(1) NOT NULL DEFAULT '0',
  `paid` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camp_child`
--

INSERT INTO `camp_child` (`id`, `child`, `parent`, `location`, `year`, `summer1`, `summer2`, `summer3`, `summer4`, `winter1`, `winter2`, `paid`) VALUES
(1, 1, 1, 'washdc', 2017, 0, 1, 0, 1, 0, 0, 1),
(2, 2, 1, 'usc', 2017, 1, 0, 0, 0, 0, 1, 1),
(3, 3, 1, 'miami', 2017, 0, 0, 0, 0, 1, 0, 1),
(4, 4, 2, 'stanford', 2017, 0, 0, 1, 0, 0, 0, 1),
(5, 5, 2, 'stanford', 2017, 0, 0, 1, 1, 0, 0, 1),
(6, 6, 2, 'nyu', 2017, 0, 1, 0, 1, 0, 1, 1),
(7, 7, 7, 'usc', 2017, 1, 0, 0, 0, 0, 0, 1),
(8, 8, 9, 'usc', 2017, 0, 1, 0, 1, 0, 0, 1),
(9, 9, 9, 'nyu', 2017, 1, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `camp_info`
--

CREATE TABLE `camp_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(10) NOT NULL,
  `year` int(10) UNSIGNED NOT NULL,
  `priceS` int(10) UNSIGNED NOT NULL,
  `priceW` int(10) UNSIGNED NOT NULL,
  `summer1` int(10) UNSIGNED NOT NULL,
  `summer2` int(10) UNSIGNED NOT NULL,
  `summer3` int(10) UNSIGNED NOT NULL,
  `summer4` int(10) UNSIGNED NOT NULL,
  `winter1` int(10) UNSIGNED NOT NULL,
  `winter2` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camp_info`
--

INSERT INTO `camp_info` (`id`, `location`, `year`, `priceS`, `priceW`, `summer1`, `summer2`, `summer3`, `summer4`, `winter1`, `winter2`) VALUES
(1, 'nyu', 2017, 2340, 1170, 74, 74, 75, 74, 45, 44),
(2, 'usc', 2017, 2490, 1245, 73, 74, 75, 74, 45, 44),
(3, 'nw', 2017, 2145, 1072, 75, 75, 75, 75, 45, 45),
(4, 'stanford', 2017, 2580, 1290, 75, 75, 73, 74, 45, 45),
(5, 'philmont', 2017, 3640, 1820, 75, 75, 75, 75, 0, 0),
(6, 'miami', 2017, 4230, 2115, 75, 75, 75, 75, 0, 0),
(7, 'mit', 2017, 2000, 1000, 75, 75, 75, 75, 45, 45),
(8, 'medicine', 2017, 3130, 1565, 75, 75, 75, 75, 0, 0),
(9, 'washdc', 2017, 1650, 825, 75, 74, 75, 74, 45, 45);

-- --------------------------------------------------------

--
-- Table structure for table `child_info`
--

CREATE TABLE `child_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `dob` int(10) UNSIGNED NOT NULL,
  `gender` varchar(10) NOT NULL,
  `school` varchar(50) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `special` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_info`
--

INSERT INTO `child_info` (`id`, `parent`, `firstname`, `lastname`, `dob`, `gender`, `school`, `grade`, `special`) VALUES
(1, 1, 'Sarah', 'Jonzzle', 981187200, 'female', 'SCU', '11', ''),
(2, 1, 'Conner', 'Mong', 949564800, 'male', 'Kansas', '3', ''),
(3, 1, 'Travis', 'Roy', 1205132400, 'male', 'McGill', '5', ''),
(4, 2, 'Billy', 'Smith', 883728000, 'male', 'MLK Highschool', '8', ''),
(5, 2, 'John', 'Smith', 1046678400, 'male', 'JFK Highschool', '9', ''),
(6, 2, 'Michael', 'Brown', 1084345200, 'male', 'MLK Highschool', '8', ''),
(7, 7, 'Ronny', 'Brown', 981273600, 'male', 'Brown', '9', ''),
(8, 9, 'Pearce', 'Ropion', 918028800, 'male', 'scu', '11', ''),
(9, 9, 'sad', 'asd', 949478400, 'female', 'asd', '11', '');

-- --------------------------------------------------------

--
-- Table structure for table `forum_category`
--

CREATE TABLE `forum_category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_category`
--

INSERT INTO `forum_category` (`id`, `name`, `description`, `count`) VALUES
(1, 'Announcements', 'Get the latest camp and website updates here. We will post camp related information regarding the upcoming sessions and other related news.', 1),
(2, 'Introductions', 'Introduce yourself and your camper. Let us know who you are and start getting integrated into our camp community.', 1),
(3, 'Community', 'Become part of the community. Share your stories, your child\'s memories or ask general questions about the camps and its\' facilities.', 1),
(4, 'Support', 'Get help with registering your child or any of the website\'s functions. Ask specific questions about our camps and get to the answer you are looking for.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_replies`
--

CREATE TABLE `forum_replies` (
  `id` int(11) UNSIGNED NOT NULL,
  `epoch` int(10) UNSIGNED NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_replies`
--

INSERT INTO `forum_replies` (`id`, `epoch`, `parent`, `author`, `message`) VALUES
(1, 1488861960, 1, 1, 'Wow, the new site looks absolutely amazing. You guys did a bang up job and i am looking forward to using this forum.'),
(2, 1488954264, 1, 1, 'OMG I love this.'),
(3, 1488990407, 1, 1, 'How did you make that logo? It looks really cool.'),
(4, 1488990486, 1, 1, 'This is a reply'),
(5, 1489016126, 1, 2, 'Hey'),
(6, 1489282288, 1, 4, 'Cool website! Looking forward to what comes next!'),
(7, 1489388671, 15, 2, 'Oh really?');

-- --------------------------------------------------------

--
-- Table structure for table `forum_threads`
--

CREATE TABLE `forum_threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `epoch` int(10) UNSIGNED NOT NULL,
  `parent` int(11) UNSIGNED NOT NULL,
  `author` int(11) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `replies` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_threads`
--

INSERT INTO `forum_threads` (`id`, `epoch`, `parent`, `author`, `title`, `message`, `replies`) VALUES
(1, 1488861243, 1, 1, 'Welcome to the New Website', 'Welcome to our new website. We have been working very hard to get you a place to post your favorite memories and questions for the national community. We have completely redone both the front and back end. Enjoy!\r\n<br><br><div class="post-img"><img src="/projects/coen161/assets/images/favicon/favicon-128.png"></div>', 6),
(2, 1489383613, 2, 1, 'Im Pearce', 'Hello,\r\nMy name is Pearce and I go to SCU!', 0),
(15, 1489385569, 3, 1, 'Camp Counselor Arya', 'Hello everyone! I\'m Arya, one of the camp counselors that will be working at Stanford this summer. This summer should be a worthwhile experience for everyone and I can\'t wait to meet all of the new campers!', 1),
(16, 1489385660, 4, 1, 'Help MEH', 'I need support.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `memories_info`
--

CREATE TABLE `memories_info` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(40) DEFAULT NULL,
  `epoch` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memories_info`
--

INSERT INTO `memories_info` (`id`, `user_id`, `caption`, `epoch`) VALUES
(1, 2, '"What a great camp!" -Arya', 1489471440),
(2, 2, '"The kids had a blast!" -Arya', 1489471587),
(3, 2, '"Wonderful experience" -Arya', 1489471603),
(4, 2, '"Amazing!" -Arya', 1489471620),
(5, 2, '"Best camp ever!" -Arya', 1489471748),
(6, 2, '"The cabins were nice" -Arya', 1489471777),
(7, 2, '"Woohoooo!" -Arya', 1489471793),
(8, 2, '"Tubular!" -Arya', 1489471818),
(9, 2, '"Once in a lifetime experience!" -Arya', 1489471841),
(10, 2, '"Too much fun to handle" -Arya', 1489471874),
(11, 2, '"My child broke his leg" -Arya', 1489471929),
(12, 2, '"The kids had such a great time" -Arya', 1489611842),
(13, 9, '"Fun times!" -Pearce', 1489621195);

-- --------------------------------------------------------

--
-- Table structure for table `shop_availability`
--

CREATE TABLE `shop_availability` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_availability`
--

INSERT INTO `shop_availability` (`id`, `name`, `type`, `price`) VALUES
(1, 'T Shirt', 'Clothing', 15),
(2, 'Hoodie', 'Clothing', 40),
(3, 'Snapback', 'Clothing', 20),
(4, 'Scarves', 'Clothing', 20),
(5, 'Bandana', 'Clothing', 7.5),
(6, 'Backpack', 'Gear', 30),
(7, 'Computer Bag', 'Gear', 45),
(8, 'LEGO Mindstorm', 'Gear', 250),
(9, 'Rain Jacket', 'Clothing', 60),
(10, 'Water Bottle', 'Gear', 20.5),
(11, 'Earbuds', 'Accessories', 15),
(12, 'Smartphone Case', 'Accessories', 25),
(13, 'Poster', 'Accessories', 27.5),
(14, 'Stickers', 'Accessories', 2.5),
(15, 'Notebook', 'Accessories', 3.5),
(16, 'Flashdrive', 'Accessories', 12.5);

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

CREATE TABLE `shop_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `epoch` int(10) NOT NULL,
  `orderNum` int(10) UNSIGNED NOT NULL,
  `customer` varchar(20) NOT NULL,
  `item` varchar(20) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `totalSpent` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_order`
--

INSERT INTO `shop_order` (`id`, `epoch`, `orderNum`, `customer`, `item`, `quantity`, `totalSpent`) VALUES
(42, 1489289936, 1, 'Jackson Parsons', 'T Shirt', 1, 15),
(43, 1489289936, 1, 'Jackson Parsons', 'Hoodie', 1, 40),
(44, 1489289947, 2, 'Jackson Parsons', 'T Shirt', 1, 15),
(45, 1489289947, 2, 'Jackson Parsons', 'Hoodie', 1, 40),
(46, 1489289947, 2, 'Jackson Parsons', 'Snapback', 1, 20),
(47, 1489353805, 3, 'Jackson Parsons', 'Hoodie', 1, 40),
(48, 1489353805, 3, 'Jackson Parsons', 'Snapback', 1, 20),
(49, 1489353831, 4, 'Jackson Parsons', 'Scarves', 1, 20),
(50, 1489353831, 4, 'Jackson Parsons', 'Bandana', 1, 7.5),
(51, 1489354227, 5, 'Jackson Parsons', 'T Shirt', 99, 1485),
(52, 1489392183, 6, 'Arya Faili', 'Snapback', 1, 20),
(53, 1489467425, 7, 'Jackson Parsons', 'Hoodie', 1, 40),
(54, 1489467595, 8, 'Jackson Parsons', 'Hoodie', 1, 40),
(55, 1489467615, 9, 'Jackson Parsons', 'Hoodie', 1, 40),
(56, 1489467641, 10, 'Jackson Parsons', 'Hoodie', 1, 40),
(57, 1489467680, 11, 'Jackson Parsons', 'Hoodie', 1, 40),
(58, 1489467809, 12, 'Jackson Parsons', 'Hoodie', 1, 40),
(59, 1489467881, 13, 'Jackson Parsons', 'Hoodie', 1, 40),
(60, 1489467896, 14, 'Jackson Parsons', 'Hoodie', 1, 40),
(61, 1489467937, 15, 'Jackson Parsons', 'Hoodie', 1, 40),
(62, 1489468041, 16, 'Jackson Parsons', 'Hoodie', 1, 40),
(63, 1489468454, 17, 'Arya Faili', 'Snapback', 1, 20),
(64, 1489472907, 18, 'Jackson Parsons', 'LEGO Mindstorm', 5, 1250),
(65, 1489473134, 19, 'Jackson Parsons', 'LEGO Mindstorm', 5, 1250),
(66, 1489473157, 20, 'Jackson Parsons', 'LEGO Mindstorm', 5, 1062.5),
(67, 1489473615, 21, 'Jackson Parsons', 'LEGO Mindstorm', 5, 1250),
(68, 1489473687, 22, 'Jackson Parsons', 'LEGO Mindstorm', 5, 1250),
(69, 1489473734, 23, 'Jackson Parsons', 'LEGO Mindstorm', 5, 1250),
(70, 1489621140, 24, 'Pearce Ropion', 'Snapback', 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `firstname`, `lastname`, `username`, `email`, `phone`) VALUES
(1, 'Pearce', 'Ropion', 'Orcinuss', 'propion@scu.edu', '4159369874'),
(2, 'Arya', 'Faili', 'AFaili', 'afaili@scu.edu', '4155728220'),
(3, 'Sarah', 'Jonnzle', 'f', 'cx@3.com', '4444444444'),
(4, 'Jackson', 'Parsons', 'jparsons', 'jparsons@scu.edu', '1234567890'),
(5, 'Maxen', 'Chung', 'mhchung', 'mhchung@scu.edu', '0123456789'),
(6, 'Michael', 'Brewer', 'michaelbrewer', 'm2brewer@scu.edu', '4153209196'),
(7, 'Tom', 'Brown', 'Tommy', 'tommybrown@scu.edu', '4155557575'),
(8, 'John', 'Smith', 'John', 'jsmith@scu.edu', '4155757575'),
(9, 'Pearce', 'Ropion', 'Pearce', 'camp@scu.edu', '4159369874');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `email`, `password`) VALUES
(1, 'propion@scu.edu', '$2y$10$e5GEa7K3iH8DUUL5rFHI2e9U5fSoSI3bX1Ni8BQFv1QyaBo28l.uK'),
(2, 'afaili@scu.edu', '$2y$10$owkfb1u3zUdLOzi3D0La5.x7eTQl5sexvQoTmlN9HPN/La01lgzka'),
(3, 'cx@3.com', '$2y$10$88rEsHTNuBMS7nW.abgytuPd29o80t2gR2JZ/TCY.eOvS/NmGisJC'),
(4, 'jparsons@scu.edu', '$2y$10$5VH3rzcIU8ewClBfbJmp3ebB2AVLvGjtKtk48tG7qO3ik2ma6y.Eq'),
(5, 'mhchung@scu.edu', '$2y$10$VNDBFO0IJmUr4QH0s6YA2uB5u2nBRzoe7ztGKQBudHpwfda29nGba'),
(6, 'm2brewer@scu.edu', '$2y$10$XirHenjCX0k5YRDwswxSOO8/f6GJG25NgLxWbFAw64ZvCpEdiZmCm'),
(7, 'tommybrown@scu.edu', '$2y$10$Q9ye7WuAwn3N2rccX4RGm.qiPZEmboIVx1obzeJ8SeiGoEFs406jK'),
(8, 'jsmith@scu.edu', '$2y$10$8NXIbgB.XXbHw.sLHJ1pYeSSZuzXBE9xf0dwfSq7B..F9YlurxZwa'),
(9, 'camp@scu.edu', '$2y$10$mv.PoAdiggBgkHXntl7wOuJrRlPt6VbXaWij3WNzZvTyac3quTd0i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camp_child`
--
ALTER TABLE `camp_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camp_info`
--
ALTER TABLE `camp_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_info`
--
ALTER TABLE `child_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_category`
--
ALTER TABLE `forum_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_replies`
--
ALTER TABLE `forum_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_threads`
--
ALTER TABLE `forum_threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memories_info`
--
ALTER TABLE `memories_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_availability`
--
ALTER TABLE `shop_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camp_child`
--
ALTER TABLE `camp_child`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `camp_info`
--
ALTER TABLE `camp_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `child_info`
--
ALTER TABLE `child_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forum_replies`
--
ALTER TABLE `forum_replies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `forum_threads`
--
ALTER TABLE `forum_threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `memories_info`
--
ALTER TABLE `memories_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `shop_availability`
--
ALTER TABLE `shop_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
