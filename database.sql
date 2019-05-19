-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2018 at 08:54 AM
-- Server version: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `YLife`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `brID` int(11) NOT NULL,
  `brName` varchar(100) NOT NULL,
  `brManager` varchar(20) NOT NULL,
  `brCity` varchar(100) NOT NULL,
  `brCategory` varchar(100) NOT NULL,
  `brCode` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`brID`, `brName`, `brManager`, `brCity`, `brCategory`, `brCode`) VALUES
(1, 'Fatehpur', '1\r\n', 'Fatehpur', 'Head Office', 'YLFRBL001');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cID` int(11) NOT NULL,
  `cName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cID`, `cName`) VALUES
(1, 'FMCG'),
(2, 'Herbal Medicine'),
(3, 'Agro Products'),
(4, 'Beauty care');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `imgName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

-- --------------------------------------------------------

--
-- Table structure for table `level_income_company`
--

CREATE TABLE `level_income_company` (
  `levelID` int(11) NOT NULL,
  `direct_joining` int(11) NOT NULL,
  `self_team` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `income` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_income_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `level_income_selfteam`
--

CREATE TABLE `level_income_selfteam` (
  `levelID` int(11) NOT NULL,
  `direct_joining` int(11) NOT NULL,
  `self_team` int(11) NOT NULL,
  `purchase_bv` int(11) NOT NULL,
  `income` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_income_selfteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MemID` int(11) NOT NULL,
  `MemType` char(1) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Pass` varchar(10) NOT NULL,
  `Sponsor` int(11) NOT NULL,
  `Active` char(1) NOT NULL,
  `Father_husband` varchar(100) NOT NULL,
  `Gender` char(1) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `Occupation` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `cStatus` varchar(1) NOT NULL,
  `lcBranch` int(11) NOT NULL,
  `Rgdate` datetime NOT NULL,
  `Balance` int(11) NOT NULL,
  `Bank` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `Account` varchar(20) NOT NULL,
  `IFSC` varchar(20) NOT NULL,
  `Pancard` varchar(20) NOT NULL,
  `nominee_name` varchar(100) NOT NULL,
  `nominee_guardian` varchar(100) NOT NULL,
  `nominee_address` varchar(255) NOT NULL,
  `nominee_dob` varchar(20) NOT NULL,
  `nominee_relation` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemID`, `MemType`, `Name`, `Email`, `Contact`, `Pass`, `Sponsor`, `Active`, `Father_husband`, `Gender`, `DOB`, `Occupation`, `Address`, `City`, `State`, `Country`, `Pincode`, `cStatus`, `lcBranch`, `Rgdate`, `Balance`, `Bank`, `Branch`, `Account`, `IFSC`, `Pancard`, `nominee_name`, `nominee_guardian`, `nominee_address`, `nominee_dob`, `nominee_relation`) VALUES
(1, 'A', 'Admin YLIFE', '', '9996933880', '1234', 0, 'Y', '', '', '', '', '', '', '', '', '', 'Y', 1, '2018-03-06 00:00:00', 0, '', '', '', '', 'ABC12345', 'Prashant Sachan', 'Virendra sachan', 'Kanpur, UP, India', '01/10/1996', 'Father');

-- --------------------------------------------------------

--
-- Table structure for table `member_downline`
--

CREATE TABLE `member_downline` (
  `id` int(11) NOT NULL,
  `memID` int(11) NOT NULL,
  `sponsorID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL,
  `memStatus` char(1) NOT NULL,
  `ef_sponsors` int(11) NOT NULL,
  `ef_selfteam` int(11) NOT NULL,
  `ef_companyteam` int(11) NOT NULL,
  `purchase_bv` int(11) NOT NULL,
  `selfteam_level` int(11) NOT NULL,
  `companyteam_level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_downline`
--

INSERT INTO `member_downline` (`id`, `memID`, `sponsorID`, `parentID`, `memStatus`, `ef_sponsors`, `ef_selfteam`, `ef_companyteam`, `purchase_bv`, `selfteam_level`, `companyteam_level`) VALUES
(1, 1, 0, 0, 'Y', 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_downline_temp`
--

CREATE TABLE `member_downline_temp` (
  `id` int(11) NOT NULL,
  `memID` int(11) NOT NULL,
  `sponsorID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL,
  `total_company_sponsor` int(11) NOT NULL,
  `ef_company_sponsor` int(11) NOT NULL,
  `total_level_sponsor` int(11) NOT NULL,
  `ef_level_sponsor` int(11) NOT NULL,
  `total_company_selfteam` int(11) NOT NULL,
  `ef_company_selfteam` int(11) NOT NULL,
  `total_level_selfteam` int(11) NOT NULL,
  `ef_level_selfteam` int(11) NOT NULL,
  `total_company_team` int(11) NOT NULL,
  `ef_company_team` int(11) NOT NULL,
  `total_fund` int(11) NOT NULL,
  `weaklyfund` int(11) NOT NULL,
  `start_from` date NOT NULL,
  `end_upto` date NOT NULL,
  `memStatus` char(1) NOT NULL,
  `memDate` datetime NOT NULL,
  `company_level` int(11) NOT NULL,
  `selfteam_level` int(11) NOT NULL,
  `total_purchase` int(11) NOT NULL,
  `ef_purchase` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oID` int(11) NOT NULL,
  `memID` int(11) NOT NULL,
  `pID` int(11) NOT NULL,
  `brID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uPrice` int(11) NOT NULL,
  `tPrice` int(11) NOT NULL,
  `oDate` datetime NOT NULL,
  `oStatus` char(1) NOT NULL,
  `dDate` datetime NOT NULL,
  `pMethod` char(1) NOT NULL,
  `pStatus` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oID`, `memID`, `pID`, `brID`, `qty`, `uPrice`, `tPrice`, `oDate`, `oStatus`, `dDate`, `pMethod`, `pStatus`) VALUES
(1, 1, 1, 1, 10, 1299, 12990, '2018-03-17 08:43:55', 'D', '0000-00-00 00:00:00', 'C', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Category` int(11) NOT NULL,
  `SubCategory` int(11) NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL,
  `DP` int(11) NOT NULL,
  `BV` int(11) NOT NULL,
  `ProductCode` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Price` varchar(10) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `ProductType` char(1) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pID`, `Name`, `Category`, `SubCategory`, `Description`, `DP`, `BV`, `ProductCode`, `Price`, `image`, `ProductType`) VALUES
(1, 'Yuva Life Amrit', 2, 1, '<h1>Yuva Life Amrit</h1>\r\n\r\n<p>Complete health products</p>\r\n', 1250, 1100, '100011', '1299', 'IMG-20180121-WA0002.jpg', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stID` int(11) NOT NULL,
  `brID` int(11) NOT NULL,
  `prID` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `stock_report`
--

CREATE TABLE `stock_report` (
  `stID` int(11) NOT NULL,
  `brID` int(11) NOT NULL,
  `prID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `stDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `cID` int(11) NOT NULL,
  `SubName` varchar(100) NOT NULL,
  `Category` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcat`
--

-- --------------------------------------------------------

--
-- Table structure for table `temp_transactions`
--

CREATE TABLE `temp_transactions` (
  `id` int(11) NOT NULL,
  `memID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trID` int(11) NOT NULL,
  `memID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

-- --------------------------------------------------------

--
-- Table structure for table `widthraw`
--

CREATE TABLE `widthraw` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `pr_date` datetime NOT NULL,
  `cStatus` char(1) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widthraw`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`brID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgID`);

--
-- Indexes for table `level_income_company`
--
ALTER TABLE `level_income_company`
  ADD PRIMARY KEY (`levelID`);

--
-- Indexes for table `level_income_selfteam`
--
ALTER TABLE `level_income_selfteam`
  ADD PRIMARY KEY (`levelID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemID`);

--
-- Indexes for table `member_downline`
--
ALTER TABLE `member_downline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_downline_temp`
--
ALTER TABLE `member_downline_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stID`);

--
-- Indexes for table `stock_report`
--
ALTER TABLE `stock_report`
  ADD PRIMARY KEY (`stID`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `temp_transactions`
--
ALTER TABLE `temp_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trID`);

--
-- Indexes for table `widthraw`
--
ALTER TABLE `widthraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `brID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `level_income_company`
--
ALTER TABLE `level_income_company`
  MODIFY `levelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `level_income_selfteam`
--
ALTER TABLE `level_income_selfteam`
  MODIFY `levelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member_downline`
--
ALTER TABLE `member_downline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member_downline_temp`
--
ALTER TABLE `member_downline_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_report`
--
ALTER TABLE `stock_report`
  MODIFY `stID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp_transactions`
--
ALTER TABLE `temp_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `widthraw`
--
ALTER TABLE `widthraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
