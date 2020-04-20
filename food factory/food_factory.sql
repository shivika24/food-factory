-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 12:55 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `food_factory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `itemname` varchar(40) NOT NULL,
  `itemprice` int(30) NOT NULL,
  `itemcat` varchar(6) NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `email`, `itemname`, `itemprice`, `itemcat`) VALUES
(134, 'shivikasingla24@gmail.com', 'corn pizza', 325, 'veg'),
(136, 'shivikasingla24@gmail.com', 'noodles', 150, 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE IF NOT EXISTS `dish` (
  `sno` int(100) NOT NULL AUTO_INCREMENT,
  `remail` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `category` varchar(6) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`sno`, `remail`, `name`, `price`, `desc`, `pic`, `category`) VALUES
(1, 'dominoes@gmail.com', 'corn pizza', 325, 'Pizza is a savory dish of Italian origin, consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients baked at a high temperature, traditionally in a wood-fired oven', 'https://media1.s-nbcnews.com/i/newscms/2018_34/1362349/corn-pizza-today-082318-tease_e66a023068192549e8914023f4575766.jpg', 'veg'),
(2, 'dominoes@gmail.com', 'noodles', 150, 'Noodles are a type of food made from unleavened dough which is rolled flat and cut, stretched or extruded, into long strips or strings.', 'https://www.loveandoliveoil.com/wp-content/uploads/2015/03/soy-sauce-noodlesH2.jpg', 'veg'),
(3, 'dominoes@gmail.com', 'chicken wings', 460, 'A Buffalo wing, in the cuisine of the United States, is an unbreaded chicken wing section that is generally deep-fried then coated or dipped in a sauce consisting of a vinegar-based cayenne pepper hot sauce and melted butter prior to serving.', 'https://food.fnr.sndimg.com/content/dam/images/food/fullset/2019/2/19/1/FN_Air-Fryer-Chicken-Wings-H_s4x3.jpg.rend.hgtvcom.826.620.suffix/1550611553388.jpeg', 'nonveg'),
(4, 'dominoes@gmail.com', 'capsicum pizza', 200, 'Pizza is a savory dish of Italian origin, consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients baked at a high temperature, traditionally in a wood-fired oven', 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&w=1000&q=80', 'veg'),
(5, 'burgerking@gmail.com', 'burger ', 80, 'A hamburger is a sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun.', 'https://m.economictimes.com/thumb/msid-72863458,width-1200,height-900,resizemode-4,imgsize-731189/burger-thnkstck.jpg', 'veg'),
(6, 'gopals@gmail.com', 'fries', 130, 'French fries, or simply fries, chips, finger chips, or french-fried potatoes, are batonnet or allumette-cut deep-fried potatoes', 'mcdonalds.com/is/image/content/dam/usa/nfl/nutrition/items/hero/desktop/t-mcdonalds-Fries-Small-Medium.jpg', 'veg'),
(7, 'gopals1@gmail.com', 'passta', 200, 'Pasta is a type of food typically made from an unleavened dough of wheat flour mixed with water or eggs, and formed into sheets or other shapes, then cooked by boiling or baking.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSczPBaiYgfoJcI0VAwf1WWbcSr8Hv_lbJ9Ccqph1VBvHHArw__&usqp=CAU', 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `sno` int(255) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `hemail` varchar(50) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemprice` int(80) NOT NULL,
  `itemcat` varchar(6) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`sno`, `orderid`, `email`, `hemail`, `itemname`, `itemprice`, `itemcat`) VALUES
(20, '5e99383e19bdf', 'shivikasingla24@gmail.com', 'dominoes@gmail.com', 'corn pizza', 325, 'veg'),
(21, '5e99383e19bdf', 'shivikasingla24@gmail.com', 'dominoes@gmail.com', 'chicken wings', 460, 'nonveg'),
(22, '5e99383e19bdf', 'shivikasingla24@gmail.com', 'dominoes@gmail.com', 'noodles', 150, 'veg'),
(23, '5e99383e19bdf', 'shivikasingla24@gmail.com', 'dominoes@gmail.com', 'capsicum pizza', 200, 'veg'),
(24, '5e99383e19bdf', 'shivikasingla24@gmail.com', 'dominoes@gmail.com', 'corn pizza', 325, 'veg'),
(25, '5e99383e19bdf', 'shivikasingla24@gmail.com', 'dominoes@gmail.com', 'noodles', 150, 'veg'),
(26, '5e99383e19bdf', 'shivikasingla24@gmail.com', 'dominoes@gmail.com', 'noodles', 150, 'veg'),
(27, '5e99383e19bdf', 'shivikasingla24@gmail.com', 'dominoes@gmail.com', 'corn pizza', 325, 'veg'),
(28, '5e99480edb3f7', 'shivikasingla24@gmail.com', 'dominoes@gmail.com', 'corn pizza', 325, 'veg'),
(61, '5e998902f1f4a', 'deepalijindal04@gmail.com', 'dominoes@gmail.com', 'corn pizza', 325, 'veg'),
(62, '5e998902f1f4a', 'deepalijindal04@gmail.com', 'dominoes@gmail.com', 'chicken wings', 460, 'nonveg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `rname` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`rname`, `phone`, `email`, `password`, `address`, `dt`) VALUES
('burger king', '9123456781', 'burgerking@gmail.com', 'burger', 'sector 9 panchkula', '2020-04-17 08:47:13'),
('dominos pizza', '9876543210', 'dominoes@gmail.com', 'dominos', 'sector 20 panchkula', '2020-04-14 09:33:17'),
('Gopals', '9123456789', 'gopals1@gmail.com', '1111', 'sector 8 panchkula', '2020-04-14 10:34:57'),
('Gopals', '9123456789', 'gopals@gmail.com', 'gopals', 'sector 8 panchkula', '2020-04-14 10:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `pref` varchar(6) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(70) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `name`, `phone`, `pref`, `email`, `password`, `dt`) VALUES
(3, 'g', '9814735750', 'veg', 'deepalijindal04@gmail.com', '1111', '2020-04-14 07:39:11'),
(1, 'shivika', '9988655750', 'veg', 'shivikasingla24@gmail.com', 'shivika', '2020-04-14 07:05:01'),
(2, 'Galvin', '678899998', 'nonveg', 'shivikasingla67@gmail.com', '1111', '2020-04-14 07:33:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
