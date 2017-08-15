-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 11:30 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vu`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(60) NOT NULL,
  `brand_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_description`, `image`, `created_at`, `updated_at`) VALUES
(14, 'Interwood Furniture Pakistan', 'Interwood Mobel is one of the largest furniture and appliances brand of Pakistan which offers a broad range of furniture and home accessories at large scale. Interwood Mobel was founded in 1947 in Lahore and has extended its services across the country, and now the brand has six showrooms across the country. The brand offers a broad range of product category including Office Furniture, Home Furniture, Kids Furniture, Kitchens, Doors, Wardrobes, Flooring and Life wares. - See more at: http://brandspakistan.pk/interwood-furniture-pakistan-single-brand-115.aspx#sthash.uJjv457y.dpuf', 'Interwood Furniture Pakistan.jpg', '2017-08-07 00:46:19', '2017-08-07 00:46:19'),
(15, 'Servis', 'Servis is a renowned old footwear brand established in 1959 with a single store in Lahore and now has the largest shoes retail stores network in Pakistan with over 450 retail outlets. Additionally, the brand also has 2500 independent dealers as well â€“ all this has made service a household name when it comes to any type of shoes for men women and kids. Service offers a massive category of shoes for the whole family with latest designs and manufactures with complete attention to detail.', 'brandmain44image1.jpg', '2017-08-07 01:29:00', '2017-08-07 01:29:00'),
(16, 'KFC', 'KFC is a fast food restaurant chain that is known for its fried chicken having headquarters in Louisville, Kentucky, United States. KFC franchise in Pakistan was started on the January 27, 1997 by Cupola Pakistan Limited. Now KFC has over 68 outlets in 19 cities all over Pakistan - with more than 5800 employees working. KFC is visited over and over again by thousands its loyal customers because of its - best-fried chicken and zinger burgers. KFC Pakistan if following a mission of to redefine its customersâ€™ experience by achieving ever superior standards in quality and customer care in hygienic and tasty fast food.', 'brandmain54image1.jpg', '2017-08-07 01:37:03', '2017-08-07 01:37:03'),
(17, 'Outfitters Pakistan', 'Outfitters Pakistan are a renowned urban clothing brand most popular among the youngsters, who likes to wear funky jeans, T-shirts and dress shirts to look in style. The brand is actually an international one, but working in Pakistan for many years and furnishing fashionable urban clothing to local customers. The vision of the brand is to anticipate and then satisfy people\'s desires to wear stylish modern wear to match up with current fashion trends.', 'brandmain29image1.jpg', '2017-08-07 01:45:44', '2017-08-07 01:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_by` int(50) NOT NULL,
  `comment_to` int(50) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_description` text NOT NULL,
  `pro_image` text NOT NULL,
  `price` text NOT NULL,
  `sale_price` text NOT NULL,
  `pro_brand` int(11) NOT NULL,
  `pro_status` tinyint(1) NOT NULL DEFAULT '1',
  `new_col` varchar(100) NOT NULL DEFAULT 'Faizan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_description`, `pro_image`, `price`, `sale_price`, `pro_brand`, `pro_status`, `new_col`) VALUES
(28, 'Interwood Offering Flat 10% OFF on Sofa Sets', 'Interwood Offering the best discount on the best Sofa Sets 10% OFF in this Winter Season at its newly launched Outlet in Emporium Mall Johar Town Lahore. Interwood is one the oldest, leading and the best wood designer company which offers Luxurious Home Living, Office Furniture and everything in which wood can be used. Products and services offered by the Interwood are Life wares, Office Furnitures, Kitchens, Kitchen Appliances, Doors, Wardrobes and Interwood Economic Range Collection. But, now Interwood offering Flat 10% OFF on entire Sofa Sets available in Emporium Mall Outlet. The Collections of Sofa Sets available in Interwood Outlet are Marchetti single, double & three seater sofa sets, Chesterfield single, double and three seater sofa sets, Luton/Colum sofa set, Axis sofa set and many designs available in Interwood Outlet. So, first visit Emporium Mall Johar Town and then visit the Interwood and get the Interwood Luxurious and Branded Sofa Sets at Flat 10% OFF.', 'Interwood Furniture Pakistan.jpg', '1000', '9000', 14, 1, 'Faizan'),
(34, 'Interwood Offering Big Winter Sale from 16th Dec to 5th Jan', 'Interwood - A World Class Furniture Manufacturer is offering Big Winter Season Discount where you can avail the world\'s best wood products on discounted price from your nearest Interwood Outlets. Interwood wood brand founded in 1974 as Interwood Mobel Private Limited and mission is same from past to present; to offer the best quality products. Interwood is committed to the constant improvements in the design, style and quality and to deliver the best-valued products to the clientele. At the end of the year 2016, Interwood is offering Big Winter Sale where every product offered on discounted price and topped off the lists are Home Furniture, Kids Furniture, Office Furniture, Kitchens, Doors, Wardrobes, Laminate Flooring and Home Accessories. Interwood Big Winter Sale starts from 16th December 2016 and ends on 5th January 2017. So, guys you have a lot of days to grab your favourite wood products, visit your nearest Interwood Outlet or Order Online via the website and donâ€™t miss the Big Winter Sale.', 'DealsDetail580.jpg', '23432', '234234', 14, 0, 'Faizan'),
(35, 'Interwood Offering Big Winter Sale from 16th Dec to 5th Jan', 'Interwood - A World Class Furniture Manufacturer is offering Big Winter Season Discount where you can avail the world\'s best wood products on discounted price from your nearest Interwood Outlets. Interwood wood brand founded in 1974 as Interwood Mobel Private Limited and mission is same from past to present; to offer the best quality products. Interwood is committed to the constant improvements in the design, style and quality and to deliver the best-valued products to the clientele. At the end of the year 2016, Interwood is offering Big Winter Sale where every product offered on discounted price and topped off the lists are Home Furniture, Kids Furniture, Office Furniture, Kitchens, Doors, Wardrobes, Laminate Flooring and Home Accessories. Interwood Big Winter Sale starts from 16th December 2016 and ends on 5th January 2017. So, guys you have a lot of days to grab your favourite wood products, visit your nearest Interwood Outlet or Order Online via the website and donâ€™t miss the Big Winter Sale.', 'DealsDetail580.jpg', '30000', '25000', 14, 1, 'Faizan'),
(36, 'Interwood Offering Flat 10% Discount On Furniture', 'Bringing you the best comfort! Avail flat 10% discount on the most comfortable Interwood furniture solution. This offer is valid from 18th November to 7th Dec, only at EMPORIUM mall outlet. Interwood is going beyond providing experiences that add value to your kitchen home and life.\r\n\r\nInterwood Mobel Pvt. Ltd is Pakistan\'s first largest furniture manufacturing company with the different product range from office furniture to home furniture, kitchen and wardrobes, doors, educational furniture, wooden floors hotel furniture.\r\n\r\nThe best thing of interword that make it unique is its design, material used in manufacturing, that is no compromise on quality. Interwood designer manufacturer worked so hard and made it very easy for the end client/user, no matter what the room is, how much space avail, they provide you with the best solution under one roof. Now what you are waiting for go and get the best option, decorate your life with the best offer in Emporium Mall.', 'DealsDetail506.jpg', '15000', '13000', 14, 1, 'Faizan'),
(37, 'Interwood Celebrating Independence Day And Offering Discount', 'Interwood is celebrating the Independence Day and on this rejoicing day Interwood is offering discount. Are you looking for the new furniture? Got the new apartment or new home? Donâ€™t have the time to make it on order? Do you need readymade Furniture and home dÃ©cor? Then Interwood is the right place to visit and buy some beautiful and breathtaking furniture. So You can avail the discount from 10 august to 21 august. Go to the store now and buy the best quality furniture now. Interwood is one of the leading companies that produce the furniture and other home goods. So, avail the opportunity today.', 'DealsDetail336.jpg', '10000', '2000', 14, 1, 'Faizan'),
(38, 'Servis Shoes Flat 50% OFF Sale', 'Servis shoes that has the largest retail footwear network in Pakistan known for its quality, trendy and at the same time affordable shoes â€“ has started a flat sale offer.\r\n\r\nAs we have enlightened our valued readers recently about the Servis shoes Nayee Collection Pe Sale was launched and now this time around - Servis is offering Flat 50% OFF.\r\n\r\nYes, you read it right Servis shoes is offering its customers to avail flat 50% off on shopping of their favorite articles from its new collection.', 'DealsDetail117.jpg', '5000', '2500', 15, 1, 'Faizan'),
(39, 'Servis Sab Se Bari Sale upto 50% OFF - Shop Now', 'Servis introduces the Sab Se Bari Sale upto 50% OFF on the whole collection of Men, Women and Kids in all your nearest outlets. Servis is one of the largest and leading footwear brands in Pakistan with more than 450 Retail Outlets in Pakistan. In Men Footwear Wardrobe, collections are Shoes and Moccasins, Sandals and Slippers, Sports and Activity Footwear and Shoe Brands are Cheetah, Calza, Don Carlos and N-Dure. In Servis Women Wardrobe, designs and styles are Heels, Pumps, Slippers, Sandals, Shoes, Moccasins, Sports and Activity Footwear and brand is Liza. In Kids Wardrobe, sections are divided into two categories - Boys and Girls, where all the latest and most featured series are displaying. Servis is also offering School Bags starting from 799/- only. Servis Sab Se Bari Sale upto 50% OFF is valid in stores only so rush to your nearest Servis Outlets and get in your hand the latest collection of Footwear, NOW!', 'DealsDetail673.jpg', '2000', '1000', 15, 1, 'Faizan'),
(40, 'Servis Shoes Sale 2016', 'Servis offers up to 50% off on Servis shoes and also giving 70% off on their other products Don Carlos, Cheetah, Calza, Liza, T.Z, Skooz, and N DURE.  Servis founded in January 1958. Servis started its services as a single retail footwear outlet and now the brand has a presence of more than 450 retail store. Servis has products for all age groups and for who have personal taste. Servis have lot of variety of shoes. Servis Pakistan is making various different category shoes including Athletics, Casual and Dress Shoes, Sandals & Slippers, Comfort, Fashion and more. Servis casual slipper is very comfortable because servis know the casual shoes should be soft and easy to use. Servis gives comfort to their customer. In sports many champion using servis joggers and in school children use Servis shoes. Servis is one of the famous and top fashion brands in Pakistan. Servis is a footwear fashion brand and always showcased their compilation for every season and events. Servis has delibertly shown casual footwear for college, office and university going guys. The summer shoes collection also have fancy chappal, sandal, and fleet sole half shoes. You will feel calm while walking and you will wear these summer shoes happily.  High quality shoes in several different categories with trendy designs and maximum comfort. Servis sandals may consist of only a slim sole and simple strap. Servis Shoes are available throughout Pakistan. Three generations connected through the thread that is cheerfulness, the journey continues on the road to â€˜think wellâ€™.', 'DealsDetail157.jpg', '3000', '1500', 15, 1, 'Faizan'),
(41, 'Servis SUB SAY BARI SALE up to 50% OFF', 'Servis SUB SAY BARI SALE up to 50% OFF on all entire stock, and This collection is valid on limited time only. Now your wait is over for sale because Servis is offering the sale of entire stock. Get ready to fight for the pair of shoes you want. Look stylish all day long and super cool over the weekend with the same shoe. The footwear brand has a wide range of sneakers for boys, Get this quirky pair of sneakers and let your feet feel like a celebrity.\r\n\r\nServis Shoes 2017 has also launched its new collection of Liza Shoes, Go through our complete Liza collection and choose your summer trend of 2017. For summer, they have a new sandle collection for kids, Adjustable strap that provides the perfect fit and grip to your childâ€™s feet. They have a complete collection of casual shoes which is perfect to wear in summer season. Hurry up guys and grab whatever you want at discount price.', 'DealsDetail1069.jpg', '500', '250', 15, 1, 'Faizan'),
(42, 'Enjoy 30% Discount on Every Tuesday at KFC', 'KFC Pakistan and NIB Bank is collaborating to make your every Tuesday is delicious and finger licking. Now, at Every Tuesday till 20th June 2017, you can avail the Flat 30% OFF on all your favorite KFC deals but, the discount is offering on NIB Bank Credit/Debit Card only. KFC offers the finger licking menus to customers such as Burgers, Promotional Deals, Everyday Affordable Value, Midnight Deals, Chicky Meals, Snacks and Beverages. The varieties of Burgers are Value Burger, Zinger Stacker, Mighty Zinger, Zinger and Krunch Burger. In Everyday Affordable Value, the deals are Zinger Strips, Rice & Spice, Chicken Piece, Chicken & Chips, Chicken & Rice and Twister. On the entire menu of KFC, you can enjoy Flat 30% OFF on your NIB Bank Credit/Debit Card on every Tuesday till 20th June 2017. Visit your nearest KFC restaurant or order online and enjoy your meal, now!', 'DealsDetail1111.jpg', '1000', '700', 16, 1, 'Faizan'),
(43, 'Enjoy KFC Wednesday Deal For Rs. 990 Only', 'KFC reveals the Wednesday Special Deal and feasting all its valued customers to come across nationwide and enjoy the delicious deal today. Wednesday deal is offering for four persons in Rs. 990 only. The foods include in the offer are 4 Hot & Spicy Zinger Burgers with 1.75 Liter Pepsi. KFC is a leading and renowned fast food provider in Pakistan who came into existence in 1997. Now, KFC is operating in all over the cities of Pakistan and have 68 outlets. The reason for its popularity is the devotion and passion for delivering the best hygiene food and delicious taste to its customers. Since many years, KFC is still following that mission and satisfying the customer with food and service. The special discounted deal is offering at nationwide outlets and valid on every Wednesday till 24th May 2017. So, visit your nearest KFC outlet, call or order online and enjoy this deal on every Wednesday.', 'DealsDetail1072.jpg', '1200', '990', 16, 1, 'Faizan'),
(44, 'KFC Remodeled Branch In Jehlum', 'KFC is now open in Jehlum with its new look, Good News! Now enjoy an enhanced dine-in experience with our remodeled KFC Jhelum outlet. The brand is offering Value Burger, zinger Stacker, Krunch Burger and zinger burger. The brand every time offer different deals with promotions. One piece of firecracker is at Rs 180, and two pieces of fire cracker with Pepsi in Rs 375. In Combos, Krunch Combo (Chicken Pc & Drink) in Rs 300 only.\r\n\r\nKrunch Combo (Fries & Drink) in Rs 300 only, Mighty Zinger Combo in Rs 600 only, Zinger Combo Deal in Rs 530 only The taste of KFC food is delicious and yummy. You will fall in love with the taste of KFC. They are offering snacks, midnight deals, snacks ad beverages. In sharing they have Mitao Bhook Bucket, Family Festival Add-On and Family Festival with different price charges. Must visit new Improved KFC Restaurant in Jehlum.', 'DealsDetail1046.jpg', '375', '300', 16, 1, 'Faizan'),
(45, 'KFC Wow Meal Buy 1 & Get 1 Free by Using Bank Alfalah Card | Enjoy Your Meal, NOW ', 'KFC and Bank Alfalah is now together and offering the 1+1 deal, buy Wow Meal and get Wow Meal free. The food menu includes in Wow Meal are Zinger Burger, 1 Piece of Chicken, 1 Regular Fries and 1 Regular Drink in Rs. 630 only. In the price of single, you will enjoy the double meal like 2 Zinger Burgers, 2 Pieces of Chicken, 2 Regular Fries and 2 Regular Drink in Rs. 630 only. The deal is valid only on Friday until the last Friday of April 2017. To avail, the double Wow Meal, use your Bank Alfalah card and enjoy the double deal is the single price. KFC has the long list of food menus like Zinger, Mighty Zinger, Zinger Stacker, MY5, Krunch Burger, Chicken Chawal, Twister, Chicken Dips, Krunch Chicken Combo, Zinger Strips and much more. Visit your nearest KFC and enjoy your meal, now!', 'DealsDetail966 (1).jpg', '800', '630', 16, 1, 'Faizan');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(50) NOT NULL,
  `rating_by` int(50) NOT NULL,
  `rating_to` int(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating`, `rating_by`, `rating_to`, `created_at`, `updated_at`) VALUES
(23, 3, 40, 44, '0000-00-00 00:00:00', '2017-08-07 02:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `subscribed`
--

CREATE TABLE `subscribed` (
  `sub_id` int(11) NOT NULL,
  `sub_brand` int(11) NOT NULL,
  `sub_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribed`
--

INSERT INTO `subscribed` (`sub_id`, `sub_brand`, `sub_by`) VALUES
(7, 14, 29),
(8, 16, 40);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `usertype` int(11) NOT NULL,
  `registerationdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL,
  `full_name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`user_id`, `name`, `password`, `emailid`, `contact`, `usertype`, `registerationdate`, `modifydate`, `full_name`, `status`) VALUES
(29, 'admin', '123', 'salman@admin.com', '', 0, '2017-02-01 06:17:12', '2017-04-16 23:06:02', 'salman saeed', 1),
(31, 'user', '123', 'salman@user.csd', '1234567', 1, '2017-08-06 03:53:51', '2017-08-06 03:53:51', 'salman saeed', 1),
(32, 'salman_saeed', '123', 'asofdnm@asfd.com', '', 0, '2017-02-01 06:35:54', '2017-08-07 02:00:09', 'salman saeed', 0),
(40, 'newUser', '123', 'newUser@fswdf.com', '345345', 1, '2017-08-06 11:13:51', '2017-08-06 11:13:51', 'full name here', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertypeid` int(11) NOT NULL,
  `typetitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertypeid`, `typetitle`) VALUES
(0, 'admin'),
(1, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_to` (`comment_to`),
  ADD KEY `comment_by` (`comment_by`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `pro_brand` (`pro_brand`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_to` (`rating_to`),
  ADD KEY `rating_to_2` (`rating_to`),
  ADD KEY `rating_by` (`rating_by`);

--
-- Indexes for table `subscribed`
--
ALTER TABLE `subscribed`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `sub_brand` (`sub_brand`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `user_id_3` (`user_id`),
  ADD KEY `usertype` (`usertype`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeid`),
  ADD KEY `usertypeid` (`usertypeid`),
  ADD KEY `usertypeid_2` (`usertypeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `subscribed`
--
ALTER TABLE `subscribed`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_to`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_by`) REFERENCES `userdetails` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`pro_brand`) REFERENCES `brands` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`rating_to`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`rating_by`) REFERENCES `userdetails` (`user_id`);

--
-- Constraints for table `subscribed`
--
ALTER TABLE `subscribed`
  ADD CONSTRAINT `subscribed_ibfk_1` FOREIGN KEY (`sub_brand`) REFERENCES `brands` (`id`);

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userdetails_ibfk_1` FOREIGN KEY (`usertype`) REFERENCES `usertype` (`usertypeid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
