-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 12, 2021 at 08:52 PM
-- Server version: 10.2.31-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fireonli_thadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `email`, `password`, `name`, `image`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryImage` varchar(255) NOT NULL,
  `singleItemPrice` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`categoryId`, `categoryName`, `categoryImage`, `singleItemPrice`, `description`) VALUES
(1, 'samosa', 'https://static.toiimg.com/thumb/61050397.cms?imgsize=246859&width=800&height=800', '5', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. '),
(2, 'kachodi', 'https://thumbs.dreamstime.com/b/kachori-indian-fried-street-food-39612141.jpg', '10', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. '),
(3, 'Bhujiya', 'https://4.imimg.com/data4/MU/IA/MY-8216899/bhujiya-namkeen-500x500.jpg', '10', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(4, 'Potato Chips - India\'s Magic Masala', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQz71OzUOrpilVs2mxmSYj5I1sy9hTDBZJp4GKhpZd7DsTlhfCy7BX0VaNSc0TbsHWCoTZ88DVif5hPwlZIAJxyJmXF2Kw2IUMjPI2PIUok&usqp=CAE', '15', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(5, 'Potato Chips - Calm Cream & Onion', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRnL465RqHuSC9fE80L4kS1UDYtD0jpnjc5KvAyDw3sOP6oMtNUd8f7QqX7qTXA0AyBE67l6J3-CyatUbiwu2Dkz2PPZasnDWdYTOnfvd4&usqp=CAE', '10', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(6, 'Potato Chips - American Style Cream & Onion Flavour', 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQ5TM_JU7rYMXISpRJSv6FO9a4nmo4r4FGyZmbePWMrtLvjth6bqXZSwp8AkZdCxh4pjP3ohIsshFtxLRC9JUAQlNGp43AQehoIn9q4Vk86&usqp=CAE', '14', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(7, 'Instant Popcorn - Golden Sizzle', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTBeaxpjF8y7OlJEp6Y7scDWzsl9to3TzBR72mSGxah7Iqs0Hltyg7sNlO3dkp1ByEDp8eSB80iWMkXSW4qlhEmn97tOiiiQfpbXfCl_Jo&usqp=CAE', '18', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(8, 'Namkeen - PuffcornYummy Cheese', 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTjHl7c_eO64l_mnTK42Di6McMbgsqsAYqS2xRKoX_FDJgVCjuvDYuzMYDtCnzYH3zo5NE09OdhWOMftY_oZjCWJ9TZbjryDkBvoWiu0Gj7&usqp=CAE', '20', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(9, 'Namkeen - Masala Munch', 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTMqtWgBBcT4zZ6919KgQ_pZhzAr5JdWhA5lJ4xLuo4yX-yPJIriwZryArnBXEEBqy53BOmJg4T6fG5suqLnUxJ_38XePwbegTk0z1k-Q&usqp=CAE', '25', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(10, 'Spicy Treat', 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcShiL93qOto1UPosjFhgAZfaa0tAzjVeyEFdCGt1FnQnnMnWqy8iTrr_ywJuxFjsVYxN0N6bxGjqvCCdh_8seiGvzlJk2I0OMBixTIR2zR5hHRseEOmSg3zXQ&usqp=CAE', '15', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(11, 'Spicy Treat', 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTcP8dHZ0SaUBwmKZJpT_EuhYfBw2UAymIS7gyVsRHInKQzISA8HXBUbea6WXRNzupbj3DaDMu9M187RbQiGrl8RND9DUz1J6Kac26xQboJ&usqp=CAE', '10', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(12, 'Marie Biscut', 'https://4.imimg.com/data4/NO/FW/MY-4385644/marie-biscuits-500x500.jpg', '10', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(13, 'Bikaneri Bhujiya', 'https://5.imimg.com/data5/TH/OP/MY-10296228/bikaneri-bhujiya-500x500.jpg', '25', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(14, 'cappuccino', 'https://5.imimg.com/data5/TX/CB/GLADMIN-42824534/cappuccino-coffee-500x500.png', '20', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(15, 'Crispy Backed Chips', 'https://wholefully.com/wp-content/uploads/2018/08/baked-vegetable-chips-hero-800x1198-1-720x540.jpg', '16', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(16, 'Pin Coffee', 'https://i.pinimg.com/564x/81/41/76/814176ffd68fb3b0f4e73bfeb58e6dad.jpg', '18', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(17, 'Red Tea', 'https://www.kitchenstewardship.com/wp-content/uploads/2019/10/KS_BENEFITS_OF_ROOIBOS-2.jpg', '30', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(18, 'Butter Biscut', 'https://www.cookingwithmykids.co.uk/wp-content/uploads/2019/06/chocolate-fork-biscuits-17.jpg', '22', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(19, 'Aloo Bhujiya', 'https://3.imimg.com/data3/AP/JT/MY-5895487/aloo-bhujiya-250x250.jpg', '5', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(20, 'Perfect Chips', 'https://images.immediate.co.uk/production/volatile/sites/2/2020/01/Chips-10c2e39-scaled.jpg?quality=90&crop=4px%2C1178px%2C1966px%2C846px&resize=960%2C408', '25', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(21, 'Hot Coffee', 'https://img-global.cpcdn.com/recipes/a23874d50065f84c/400x400cq70/photo.jpg', '15', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(22, 'Cream Biscut', 'https://img-global.cpcdn.com/recipes/5783324921430016/1200x630cq70/photo.jpg', '17', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(23, 'Basen Ki Namkeen', 'https://img-global.cpcdn.com/recipes/e872575070eeb8a1/751x532cq70/%E0%A4%AC%E0%A5%87%E0%A4%B8%E0%A4%A8-%E0%A4%95%E0%A5%87-%E0%A4%A8%E0%A4%AE%E0%A4%95%E0%A5%80%E0%A4%A8-%E0%A4%B8%E0%A5%87%E0%A4%B5-%E0%A4%AD%E0%A5%81%E0%A4%9C%E0%A4%BF%E0%A4%AF%E0%A4%BE-besa', '20', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(24, 'Triple Cooked Chips', 'https://upload.wikimedia.org/wikipedia/en/thumb/8/8e/Heston%27s_Triple_Cooked_Chips.jpg/1200px-Heston%27s_Triple_Cooked_Chips.jpg', '10', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e'),
(25, 'Green Tea', 'https://i0.wp.com/cdn-prod.medicalnewstoday.com/content/images/articles/269/269538/green-tea-in-a-cup.jpg?w=1155&h=978', '30', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mainOfferProduct`
--

CREATE TABLE `tbl_mainOfferProduct` (
  `mainOfferProductId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(555) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mainOfferProduct`
--

INSERT INTO `tbl_mainOfferProduct` (`mainOfferProductId`, `title`, `category`, `description`, `image`, `price`) VALUES
(1, 'Top Offer', 'first', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 'https://previews.123rf.com/images/appler/appler1904/appler190400031/121870569-discount-offer-tropical-summer.jpg', '255'),
(2, 'Best Offer', 'first', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 'https://images.vexels.com/media/users/3/143034/preview2/d47ed8267c3c99117d3ea731b5fba618-summer-offer-promo-poster.jpg', '225'),
(3, 'Holi Offer', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://png.pngtree.com/png-clipart/20190617/original/pngtree-the-mall-discount-offer-label-summer-sale-png-image_3891449.jpg', '600'),
(4, 'Buy 1 get 3 more', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://assets.gopaisa.com/unsafe/0x0/https://gpcdn.ams3.cdn.digitaloceanspaces.com/deals/summer-discount-offer-flat-30-80-off-1463812627.png', '100'),
(5, 'Dhmaka Offer', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://previews.123rf.com/images/uniyok/uniyok1812/uniyok181200011/121164809-template-design-banner-for-christmas-offer-new-year-layout-with-santa-hat-decor-for-holiday-winter-s.jpg', '95'),
(6, 'Maza Offer ', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://www.featurepics.com/StockImage/20131127/christmas-offer-banner-stock-illustration-2862177.jpg', '65'),
(7, 'Slash Offer ', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://image.freepik.com/free-vector/big-sale-special-offer-banner-design-red-ribbon_1262-16778.jpg', '654'),
(8, 'Doooooom Offer', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://cdn1.vectorstock.com/i/1000x1000/96/35/grand-offer-sale-and-discount-banner-template-vector-14299635.jpg', '52'),
(9, 'Lucky Offer', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://image.freepik.com/free-vector/discount-sale-price-tag-design_1017-15624.jpg', '90'),
(10, 'More Draw Offer', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://image.freepik.com/free-vector/sale-banner-template-mega-deal-discount-offer_23-2148240399.jpg', '45'),
(11, 'Chaska Offer', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://www.pngitem.com/pimgs/m/518-5189052_special-offer-hd-png-download.png', '150'),
(12, 'Neet Offer', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://cdn4.vectorstock.com/i/1000x1000/52/23/boxing-day-sale-banner-design-with-discount-offer-vector-27845223.jpg', '250'),
(13, 'Dhamaka Offer ', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://image.freepik.com/free-vector/advertising-sale-tag-label-with-60-discount-offer-white-b_1302-17338.jpg', '450'),
(14, 'Top Offer', 'first', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://ak.picdn.net/shutterstock/videos/16367953/thumb/7.jpg', '88'),
(15, 'Best Offer', 'second', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://image.freepik.com/free-vector/mega-sale-tag-label-with-60-discount-offer-white-backgrou_1302-17337.jpg', '99'),
(16, 'All Free Offer', 'second', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://i.pinimg.com/originals/5f/b9/ce/5fb9cea8aa53bf2a4582829ddc46997c.jpg', '73'),
(17, 'Get 5 Free More 10 ', 'second', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://cdn5.vectorstock.com/i/1000x1000/36/69/26th-january-happy-republic-day-india-sale-vector-23353669.jpg', '150'),
(18, 'Buy 10 Free Tea', 'second', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://cdn2.vectorstock.com/i/1000x1000/53/01/happy-diwali-sale-background-with-mandala-vector-17775301.jpg', '45'),
(19, 'Lohri Offer', 'second', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://cdn2.vectorstock.com/i/1000x1000/53/01/happy-diwali-sale-background-with-mandala-vector-17775301.jpg', '66'),
(20, 'Diwali Offer', 'second', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://image.freepik.com/free-vector/bogo-buy-one-get-one-free-sale-banner_1017-17475.jpg', '200'),
(21, 'Boooooom Offer', 'second', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'https://www.stevebizblog.com/wp-content/uploads/2018/12/sale-1726235_640.jpg', '215');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(11) NOT NULL,
  `productId` varchar(255) NOT NULL,
  `offerId` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `quantity` varchar(225) DEFAULT NULL,
  `userId` varchar(255) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `paymentStatus` varchar(255) NOT NULL,
  `paymentMode` varchar(255) NOT NULL,
  `createAt` varchar(255) NOT NULL,
  `deliveryAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `productId`, `offerId`, `amount`, `quantity`, `userId`, `orderStatus`, `paymentStatus`, `paymentMode`, `createAt`, `deliveryAddress`) VALUES
(36, '7', '', '18', '1', '21', 'New Order', 'Pending', 'Cash', '2021-01-21 11:02:10', 'Jpr'),
(37, '9', '', '25', '1', '14', 'New Order', 'Pending', 'Online', '2021-01-29 21:13:15', 'Kota'),
(38, '2', '', '10', '1', '14', 'New Order', 'Pending', 'Cash', '2021-02-01 13:49:00', 'Jaipur Rajasthan'),
(39, '4', '', '15', '1', '14', 'New Order', 'Pending', 'Cash', '2021-02-03 21:20:59', 'Ggj'),
(40, '6', '', '14', '1', '14', 'New Order', 'Pending', 'Cash', '2021-02-03 21:21:17', 'Yitxi'),
(41, '5', '', '10', '1', '14', 'New Order', 'Pending', 'Cash', '2021-02-03 21:22:10', 'Fjxfjx'),
(42, '6', '', '14', '1', '14', 'New Order', 'Pending', 'Cash', '2021-02-03 21:24:53', 'Jgccg'),
(43, '12', '', '10', '1', '14', 'New Order', 'Pending', 'Cash', '2021-02-03 21:42:56', 'Vm gm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subOfferProduct`
--

CREATE TABLE `tbl_subOfferProduct` (
  `subOfferProductId` int(11) NOT NULL,
  `categoryId` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `mainOfferProductId` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subOfferProduct`
--

INSERT INTO `tbl_subOfferProduct` (`subOfferProductId`, `categoryId`, `quantity`, `mainOfferProductId`) VALUES
(1, '1', '5', '1'),
(2, '2', '20', '1'),
(3, '12', '5', '1'),
(4, '22', '8', '1'),
(5, '5', '22', '2'),
(6, '9', '10', '2'),
(7, '7', '20', '2'),
(8, '4', '23', '2'),
(9, '3', '3', '2'),
(10, '1', '23', '3'),
(11, '2', '5', '3'),
(12, '3', '5', '3'),
(13, '4', '20', '3'),
(14, '5', '5', '3'),
(15, '5', '5', '3'),
(16, '8', '22', '4'),
(17, '1', '10', '4'),
(18, '2', '20', '4'),
(19, '3', '23', '5'),
(20, '4', '3', '5'),
(21, '15', '23', '5'),
(22, '11', '5', '5'),
(23, '12', '5', '6'),
(24, '16', '20', '6'),
(25, '17', '5', '6'),
(26, '5', '8', '6'),
(27, '9', '22', '7'),
(28, '14', '10', '7'),
(29, '11', '20', '7'),
(30, '18', '23', '8'),
(31, '16', '3', '9'),
(32, '20', '23', '9'),
(33, '22', '5', '10'),
(34, '25', '5', '10'),
(35, '1', '20', '10'),
(36, '8', '5', '11'),
(37, '9', '8', '11'),
(38, '1', '22', '12'),
(39, '25', '10', '12'),
(40, '11', '20', '12'),
(41, '12', '23', '12'),
(42, '13', '3', '13'),
(43, '16', '23', '13'),
(44, '15', '5', '13'),
(45, '14', '5', '14'),
(46, '1', '20', '14'),
(47, '8', '5', '14'),
(48, '1', '8', '14'),
(49, '2', '22', '15'),
(50, '11', '10', '15'),
(51, '5', '20', '15'),
(52, '9', '23', '16'),
(53, '6', '3', '16'),
(54, '4', '23', '16'),
(55, '3', '5', '16'),
(56, '2', '5', '17'),
(57, '7', '20', '17'),
(58, '11', '5', '17'),
(59, '16', '8', '17'),
(60, '18', '22', '18'),
(61, '5', '10', '18'),
(62, '17', '20', '18'),
(63, '22', '23', '18'),
(64, '20', '3', '19'),
(65, '14', '23', '19'),
(66, '8', '5', '19'),
(67, '9', '5', '19'),
(68, '6', '20', '20'),
(69, '3', '5', '20'),
(70, '2', '8', '20'),
(71, '1', '22', '20'),
(72, '14', '10', '21'),
(73, '4', '20', '21'),
(74, '8', '23', '22'),
(75, '5', '3', '22'),
(76, '2', '23', '22'),
(77, '10', '5', '22'),
(78, '9', '20', '22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `email`, `mobile`, `password`, `createdAt`) VALUES
(14, 'Anil kumar', 'anil@gmail.com', '9982669294', 'e10adc3949ba59abbe56e057f20f883e', '2021-01-12 21:53:01'),
(15, 'Mahaveer sharma', 'sharmamahaveer152@gmail.com', '+919588804', '4e8eaab5d4ca4bada3876cb0cd440ea2', '2021-01-13 08:58:10'),
(16, 'Sonu', 'sonu@gmail.com', '7665103103', 'e10adc3949ba59abbe56e057f20f883e', '2021-01-13 11:11:52'),
(17, 'Sanwar', 'sanwarjat738@gmail.com', '9829293142', 'a36b0dcd1e6384abc0e1867860ad3ee3', '2021-01-17 10:12:58'),
(18, 'Suresh poonia ', 'Sureshpoonia207@gmail.com', '9929292622', '695b88bed1533088df4a73ae233aba8d', '2021-01-17 10:50:17'),
(19, 'Lala', 'Ankitkumar70038@gmail.com', '7004838058', 'a36b0dcd1e6384abc0e1867860ad3ee3', '2021-01-19 12:28:47'),
(20, 'Abinash', 'abinash@gmail.com', '8003079649', 'e10adc3949ba59abbe56e057f20f883e', '2021-01-21 00:11:19'),
(21, 'Mahaveer', 'inforbmtec1@gmail.com', '9649506877', 'a055354e23ed9552d005e2150d605f6c', '2021-01-21 11:00:42'),
(22, 'Sony', 'Sony@gmail.com', '9982669542', 'e10adc3949ba59abbe56e057f20f883e', '2021-01-29 21:36:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `tbl_mainOfferProduct`
--
ALTER TABLE `tbl_mainOfferProduct`
  ADD PRIMARY KEY (`mainOfferProductId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `tbl_subOfferProduct`
--
ALTER TABLE `tbl_subOfferProduct`
  ADD PRIMARY KEY (`subOfferProductId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_mainOfferProduct`
--
ALTER TABLE `tbl_mainOfferProduct`
  MODIFY `mainOfferProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_subOfferProduct`
--
ALTER TABLE `tbl_subOfferProduct`
  MODIFY `subOfferProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
