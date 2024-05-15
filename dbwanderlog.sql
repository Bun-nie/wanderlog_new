-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 05:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwanderlog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcountry`
--

CREATE TABLE `tblcountry` (
  `countryid` int(10) NOT NULL,
  `countryname` varchar(100) NOT NULL,
  `visits` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcountry`
--

INSERT INTO `tblcountry` (`countryid`, `countryname`, `visits`) VALUES
(1, 'Afghanistan', 250652),
(2, 'Albania', 521144),
(3, 'Algeria', 145963),
(4, 'Andorra', 400838),
(5, 'Angola', 566365),
(6, 'Antigua and Barbuda', 234368),
(7, 'Argentina', 464706),
(8, 'Armenia', 170099),
(9, 'Australia', 629945),
(10, 'Austria', 399064),
(11, 'Azerbaijan', 165582),
(12, 'Bahamas', 167320),
(13, 'Bahrain', 123513),
(14, 'Bangladesh', 335871),
(15, 'Barbados', 530727),
(16, 'Belarus', 262043),
(17, 'Belgium', 624848),
(18, 'Belize', 309037),
(19, 'Benin', 196677),
(20, 'Bhutan', 615887),
(21, 'Bolivia', 487987),
(22, 'Bosnia and Herzegovina', 315946),
(23, 'Botswana', 470162),
(24, 'Brazil', 639027),
(25, 'Brunei', 553501),
(26, 'Bulgaria', 578010),
(27, 'Burkina Faso', 225510),
(28, 'Burundi', 480166),
(29, 'Cabo Verde', 371722),
(30, 'Cambodia', 494702),
(31, 'Cameroon', 256039),
(32, 'Canada', 522350),
(33, 'Central African Republic (CAR)', 407430),
(34, 'Chad', 202368),
(35, 'Chile', 574384),
(36, 'China', 458916),
(37, 'Colombia', 150419),
(38, 'Comoros', 572135),
(39, 'Congo-Brazzaville', 553531),
(40, 'Costa Rica', 577818),
(41, 'Croatia', 28475092),
(42, 'Cuba', 947582),
(43, 'Cyprus', 1028932),
(44, 'Czechia (Czech Republic)', 928351),
(45, 'Democratic Republic of Congo', 17264),
(46, 'Denmark', 837461),
(47, 'Djibouti', 102639),
(48, 'Dominica', 293847),
(49, 'Dominican Republic', 193758),
(50, 'Ecuador', 60291),
(51, 'Egypt', 283701),
(52, 'El Salvador', 947265),
(53, 'Equatorial Guinea', 342879),
(54, 'Erotrea', 342093),
(55, 'Estonia', 809834),
(56, 'Eswatini', 3892),
(57, 'Ethiopia', 342342),
(58, 'Fiji', 587954),
(59, 'Finland', 987342),
(60, 'France', 325434),
(61, 'Gabon', 424626),
(62, 'Gambia', 92836),
(63, 'Georgia', 283742),
(64, 'Germany', 3423463),
(65, 'Ghana', 29484),
(66, 'Greece', 4327492),
(67, 'Grenada', 84032),
(68, 'Guatemala', 5432549),
(69, 'Guinea', 342879),
(70, 'Guinea-Bissau', 87943),
(71, 'Guyana', 542356),
(72, 'Haiti', 34246),
(73, 'Honduras', 342809),
(74, 'Hungary', 2897134),
(75, 'Iceland', 1342879),
(76, 'India', 98754),
(77, 'Indonesia', 89743),
(78, 'Iran', 3489734),
(79, 'Iraq', 54653),
(80, 'Ireland', 234879),
(81, 'Israel', 893402),
(82, 'Italy', 8320342),
(83, 'Ivory Coast', 534265),
(84, 'Jamaica', 367341),
(85, 'Japan', 89345480),
(86, 'Jordan', 2465019),
(87, 'Kazakhstan', 3947501),
(88, 'Kenya', 104659),
(89, 'Kiribati', 2947302),
(90, 'Kosovo', 532909),
(91, 'Kuwait', 4392029),
(92, 'Kyrgyzstan', 5839204),
(93, 'Laos', 284963),
(94, 'Latvia', 248620),
(95, 'Lebanon', 90372),
(96, 'Lesotho', 198603),
(97, 'Liberia', 390482),
(98, 'Libya', 284039),
(99, 'Liechtenstein', 9386782),
(100, 'Lithuania', 839027),
(101, 'Luxembourg', 768402),
(102, 'Madagascar', 68926),
(103, 'Malawi', 801937),
(104, 'Malaysia', 384920),
(105, 'Maldives', 32869),
(106, 'Mali', 3428794),
(107, 'Malta', 983422),
(108, 'Marshall Islands', 879935),
(109, 'Mauritania', 472901),
(110, 'Mexico', 352893),
(111, 'Micronesia', 487934),
(112, 'Moldova', 348764),
(113, 'Monaco', 328973),
(114, 'Mongolia', 32894023),
(115, 'Montenegro', 89034),
(116, 'Morocco', 4580043),
(117, 'Mozambique', 8348027),
(118, 'Myanmar', 342879),
(119, 'Namibia', 54987),
(120, 'Nauru', 897345),
(121, 'Nepal', 3428795),
(122, 'Netherlands', 4385329),
(123, 'New Zealand', 37902536),
(124, 'Nicaragua', 7532705),
(125, 'Niger', 342879),
(126, 'Nigeria', 8709324),
(127, 'North Korea', 897342),
(128, 'North Macedonia', 134897),
(129, 'Norway', 8934520),
(130, 'Oman', 902374),
(131, 'Pakistan', 342798),
(132, 'Palau', 432098),
(133, 'Palestine', 43280),
(134, 'Panama', 3428034),
(135, 'Papua New Guinea', 940243),
(136, 'Paraguay', 8793424),
(137, 'Peru', 326932),
(138, 'Philippines', 1),
(139, 'Poland', 4179024),
(140, 'Portugal', 3270523),
(141, 'Qatar', 805023),
(142, 'Romania', 35095470),
(143, 'Russia', 8754034),
(144, 'Rwanda', 734324),
(145, 'Saint Kitts and Nevis', 5673564),
(146, 'Saint Lucia', 879504),
(147, 'Saint Vincent and the Grenadines', 9875),
(148, 'Samoa', 544287),
(149, 'San Marino', 9854032),
(150, 'Sao Tome and Principe', 3032984),
(151, 'Saudi Arabia', 43802),
(152, 'Senegal', 480247),
(153, 'Serbia', 173095),
(154, 'Seychelles', 74925),
(155, 'Sierra Leone', 53278),
(156, 'Singapore', 52763012),
(157, 'Slovakia', 985902),
(158, 'Slovenia', 94029),
(159, 'Solomon Islands', 48201),
(160, 'Somalia', 3029482),
(161, 'South Africa', 987342),
(162, 'South Korea', 117954),
(163, 'South Sudan', 41290285),
(164, 'Spain', 5028095),
(165, 'Sri Lanka', 5453287),
(166, 'Sudan', 9753420),
(167, 'Suriname', 5025454),
(168, 'Sweden', 893287),
(169, 'Switzerland', 532645),
(170, 'Syria', 75320),
(171, 'Taiwan', 5423479),
(172, 'Tajikistan', 7503224),
(173, 'Tanzania', 5732042),
(174, 'Thailand', 570323),
(175, 'Timor-Leste', 3455703),
(176, 'Togo', 573204),
(177, 'Tonga', 728304),
(178, 'Trinidad and Tobago', 4283029),
(179, 'Tunisia', 9820489),
(180, 'Turkey', 94028),
(181, 'Turkmenistan', 732975),
(182, 'Tuvalu', 53204895),
(183, 'Uganda', 5328708),
(184, 'Ukraine', 32479),
(185, 'United Arab Emirates (UAE)', 53270),
(186, 'United Kingdom (UK)', 479327),
(187, 'United States of America (USA)', 2147483647),
(188, 'Uruguay', 3427893),
(189, 'Uzbekistan', 873425),
(190, 'Vanuatu', 463268),
(191, 'Vatican City', 953656),
(192, 'Venezuela', 1004739),
(193, 'Vietnam', 3280340),
(194, 'Yemen', 53127),
(195, 'Zambia', 530235),
(196, 'Zimbabwe', 758927);

-- --------------------------------------------------------

--
-- Table structure for table `tblentry`
--

CREATE TABLE `tblentry` (
  `entryid` int(10) NOT NULL,
  `acctid` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblreviewcountry`
--

CREATE TABLE `tblreviewcountry` (
  `reviewid` int(10) NOT NULL,
  `acctid` int(10) NOT NULL,
  `countryid` int(10) NOT NULL,
  `reviewcontent` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `emailadd` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userid` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitcountry`
--

CREATE TABLE `tblvisitcountry` (
  `visitid` int(10) NOT NULL,
  `acctid` int(10) NOT NULL,
  `countryid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcountry`
--
ALTER TABLE `tblcountry`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `tblentry`
--
ALTER TABLE `tblentry`
  ADD PRIMARY KEY (`entryid`),
  ADD KEY `acctidentryfk` (`acctid`);

--
-- Indexes for table `tblreviewcountry`
--
ALTER TABLE `tblreviewcountry`
  ADD PRIMARY KEY (`reviewid`),
  ADD KEY `acctidfk` (`acctid`),
  ADD KEY `countryidfk` (`countryid`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`acctid`),
  ADD KEY `useridfk` (`userid`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tblvisitcountry`
--
ALTER TABLE `tblvisitcountry`
  ADD PRIMARY KEY (`visitid`),
  ADD KEY `acctidvisitfk` (`acctid`),
  ADD KEY `countryidvisitfk` (`countryid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcountry`
--
ALTER TABLE `tblcountry`
  MODIFY `countryid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `tblentry`
--
ALTER TABLE `tblentry`
  MODIFY `entryid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblreviewcountry`
--
ALTER TABLE `tblreviewcountry`
  MODIFY `reviewid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvisitcountry`
--
ALTER TABLE `tblvisitcountry`
  MODIFY `visitid` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblentry`
--
ALTER TABLE `tblentry`
  ADD CONSTRAINT `acctidentryfk` FOREIGN KEY (`acctid`) REFERENCES `tbluseraccount` (`acctid`);

--
-- Constraints for table `tblreviewcountry`
--
ALTER TABLE `tblreviewcountry`
  ADD CONSTRAINT `acctidfk` FOREIGN KEY (`acctid`) REFERENCES `tbluseraccount` (`acctid`),
  ADD CONSTRAINT `countryidfk` FOREIGN KEY (`countryid`) REFERENCES `tblcountry` (`countryid`);

--
-- Constraints for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD CONSTRAINT `useridfk` FOREIGN KEY (`userid`) REFERENCES `tbluserprofile` (`userid`);

--
-- Constraints for table `tblvisitcountry`
--
ALTER TABLE `tblvisitcountry`
  ADD CONSTRAINT `acctidvisitfk` FOREIGN KEY (`acctid`) REFERENCES `tbluseraccount` (`acctid`),
  ADD CONSTRAINT `countryidvisitfk` FOREIGN KEY (`countryid`) REFERENCES `tblcountry` (`countryid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
