-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 11:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty_paradise`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(30) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `Name`, `Email`, `Message`) VALUES
(1, 'Bulbul', 'bul4108@gmail.com', 'dfjvjdfc'),
(2, 'Bulbul', 'bul4108@gmail.com', 'fvxgfbb');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`) VALUES
(2, 'admin', '12345', 'admin@gmail.com', 1, '2019-10-13 16:36:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 'Male', 'Beauty products for male', '2020-10-08 08:58:42', '0000-00-00 00:00:00', 1),
(2, 'Female', 'Beauty products for female', '2020-10-08 08:58:57', '0000-00-00 00:00:00', 1),
(3, 'Baby', 'Beauty products for baby', '2020-10-08 08:59:09', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `id` int(11) NOT NULL,
  `order_number` varchar(100) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` varchar(20) DEFAULT NULL,
  `deliverytime` varchar(100) DEFAULT NULL,
  `paymentMethod` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `total` double DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Confirm, 1 = not confirm'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `order_number`, `order_date`, `order_time`, `deliverytime`, `paymentMethod`, `name`, `phone`, `address`, `total`, `discount`, `user_id`, `status`) VALUES
(1, '5f7ed6df09a8c', '2020-10-08', '03:07:43pm', '2.00', 'Cash On Delivery', 'Roman', '01521255051', '56/2 ,Mohakhali', 1250, 1, 2, 0),
(2, '5f7edebc46d73', '2020-10-08', '03:41:16pm', '5.00', 'Cash On Delivery', 'Oishee', '01884612019', '56/2 ,Mohakhali', 1235, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetails`
--

CREATE TABLE `tblorderdetails` (
  `id` int(11) NOT NULL,
  `order_number` varchar(100) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `unit_price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorderdetails`
--

INSERT INTO `tblorderdetails` (`id`, `order_number`, `p_id`, `unit_price`, `quantity`) VALUES
(1, '5f7ed6df09a8c', 1, 250, 10),
(2, '5f7edebc46d73', 8, 685, 1),
(3, '5f7edebc46d73', 6, 550, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `postDate` date NOT NULL,
  `postTime` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `postTitle` varchar(500) NOT NULL,
  `postDetails` longtext CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`id`, `user_id`, `postDate`, `postTime`, `image`, `postTitle`, `postDetails`, `status`) VALUES
(2, 2, '2020-10-08', '03:36:17pm', 'maxresdefault (1).jpg.jpg', 'Is Your Skin Sensitive or Sensitized? Hereâ€™s How to Know and How to Deal', 'If youâ€™d describe your skin as sensitive, youâ€™re not alone. The majority of people report having experienced some sort of skin irritationâ€”redness, burning, itchingâ€”at some point in their lives. But is the problem your delicate, reactive skin, or the products youâ€™ve been using on it? In this edition of our Doctorâ€™s Office series, Dr. Loretta Ciraldo, a board-certified dermatologist in Miami and the founder of Dr. Loretta skin care, explains how to tell whether your skin is truly sensitive or rather sensitizedâ€”and why knowing the difference is the key to a healthier complexion.\r\n\r\nSome studies estimate that up to 70% of women report having sensitive skin. More and more I am seeing women in their 20s through 40s who come to me with a several-month to several-year history of their skin being sensitive, red and even diagnosed as rosacea. In my clinical experience, the vast majority of these women donâ€™t truly have sensitive skin but instead have skin that has become sensitized, and this is almost always a reaction to certain ingredients in skin care products.\r\n\r\nSensitive vs. Sensitized Skin: How to Tell the Difference\r\nI reserve the diagnosis of sensitive skin for someone who has a long history of skin rashes. For example, when a patient comes to me with a history of childhood eczema, or knowing that they have specific allergies to topically applied ingredients (diagnosed when you have a skin patch test), or a skin biopsy that has shown rosacea, I categorize them as sensitive.\r\n\r\nItâ€™s my responsibility as a dermatologist to see if I can help my patients find a regimen and products that they can use that donâ€™t irritate or make them red, itchy or otherwise uncomfortable. I like to go through what they are using to see if possibly they are using products containing ingredients that may have sensitized their skin.\r\n\r\nIn my own practice, more than half of the people I see who come in believing they have sensitive skin or rosacea are able to manage irritation by avoiding problematic ingredients, so that we donâ€™t need to put them on any prescription medications. One good way to start on the journey to remedying sensitive skin is to simply pare down on your skin care products and then reintroduce products that are free of known sensitizing ingredients.\r\n\r\nWhich Ingredients Can Sensitize Skin?\r\nWhen it comes to ingredients, there are a few common culprits that can often make skin more sensitive. None of these are marketed to the consumer as active and beneficial ingredients but instead they are considered more â€œinactive.â€ The great news is that often eliminating these ingredients from your routine can bring your skin back to a more healthy, comfortable state:\r\n\r\nethyl alcohol, t-butyl alcohol, alcohol, isopropyl alcohol\r\nsodium lauryl sulfate, sodium laureth sulfate\r\nartificial fragrance, parfum\r\nparabens\r\nacetone\r\nFeeling Sensitive? Reboot Your Regimen\r\nIf skin is acutely sensitive, meaning it more recently became red, irritated or uncomfortable, I recommend following a simple two-step program twice daily for the first week, after which your skin may feel better and you can go on to rebuild a regimen that addresses your concerns (like acne and aging changes) without leaving your skin feeling sensitive.\r\n\r\nStep 1: Wash with a sulfate-free, fragrance-free cleanser or an unscented bar soap.\r\n\r\nStep 2:  After cleansing, apply a very thin layer of a healing ointment. These are generally well tolerated even by post-laser skin, which is in a very sensitized state. They are basically mostly petroleum, but what is most important about them is not the active ingredient but instead the absence of other sensitizing ingredients like the ones listed above.\r\n\r\nAfter two weeks, if your skin no longer feels sensitive, you can start to introduce a new product to your regimen every two weeks. If you want to use a retinol, AHA or vitamin C product, it is best to be sure that they donâ€™t have any of the previously mentioned problematic ingredients. Start to use these just one to three times a week for the first two weeks.\r\n\r\nShould a Product Ever Burn or Tingle?\r\nThereâ€™s a big difference between a product slightly tingling on application and it burning your skin. If your skin starts to feel like itâ€™s burning, take a look at the ingredients in the products you are using.\r\n\r\nYou should expect some ingredients, like retinol or L-ascorbic acid (vitamin C), to be associated with some tingling. When it comes to acids or retinol, more is not better. If your skin is feeling sensitive, use these products just once or twice a week and build up to more frequent application over time.\r\n\r\nSometimes it is the productâ€™s inactive ingredients that can cause burning or make you red and sensitive. The takeaway is this: If you skin feels sensitive, read the full list of ingredients in that product before you use it.\r\n\r\nI understand that itâ€™s a daunting task to read a full ingredient deck, but I truly believe that this is the key to resolving skin sensitivity in so many cases. Why? Because potentially problematic ingredients are not the ones being marketed, so youâ€™ve got to be a bit of a detective to see if you are inadvertently exposing your skin to the cause of your sensitivity. What you find may surprise youâ€”and you might even realize your skinâ€™s not the sensitive type after all.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL,
  `ProductTitle` longtext,
  `CategoryId` int(11) DEFAULT NULL,
  `Details` longtext CHARACTER SET utf8,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int(1) DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `ProductTitle`, `CategoryId`, `Details`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostImage`, `price`) VALUES
(1, 'Aichun Beauty Face Wash', 1, '<p>Best for face. Instant result. Try it now</p>', '2020-10-08 09:03:35', NULL, 1, 'd2bea11fc2e2d6a28fb584c64fa802e6.jpg_340x340q80.jpg_.jpg.jpg', 250),
(3, 'Bulldog Vegan beauty face wash', 1, '<p>This is the newest product of bulldog. try it out!</p>', '2020-10-08 09:15:40', NULL, 1, 'Bulldog-launches-new-skin-care-for-men-products-vegan-beauty-big-news_wrbm_large.jpg.jpg', 550),
(4, 'Neutrogena facial cleanser', 2, '<p>Best for oily skin... Try it now</p>', '2020-10-08 09:23:13', NULL, 1, 'neutrogena.jpg.jpg', 835),
(5, 'PONDS Face wash', 2, '<p>Best for face. Instant result. Try it now<br></p>', '2020-10-08 09:24:38', NULL, 1, 'wb_spotless_rosy_white_pack-932080.png.ulenscale.380x530.jpg.jpg', 235),
(6, 'Earth Mama Baby face, nose and cheek wash', 3, '<p>Best for your baby\'s soft skin</p>', '2020-10-08 09:26:29', NULL, 1, 'Earth-Mama-Organic-Facial-Baby-Cream-1.jpg.jpg', 550),
(8, 'Johnsons baby cream', 3, '<p>Best for your baby</p>', '2020-10-08 09:32:22', NULL, 1, '51cmL3arLrL._SL1200_.jpg.jpg', 685);

-- --------------------------------------------------------

--
-- Table structure for table `tblreplay`
--

CREATE TABLE `tblreplay` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `replay` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Is_Active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `Is_Active`) VALUES
(2, 'Oishee', 'oishee@gmail.com', '53456132194', '56/2 ,Mohakhali', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreplay`
--
ALTER TABLE `tblreplay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblreplay`
--
ALTER TABLE `tblreplay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
