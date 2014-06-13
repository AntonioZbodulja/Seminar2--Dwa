-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2014 at 05:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vacator`
--

-- --------------------------------------------------------

--
-- Table structure for table `karakteristike`
--

CREATE TABLE IF NOT EXISTS `karakteristike` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `idoglasa` varchar(30) COLLATE utf8_bin NOT NULL,
  `grijanje` tinyint(1) NOT NULL DEFAULT '0',
  `tv` tinyint(1) NOT NULL DEFAULT '0',
  `internet` tinyint(1) NOT NULL DEFAULT '0',
  `kabelska` tinyint(1) NOT NULL DEFAULT '0',
  `kupaonica` tinyint(1) NOT NULL DEFAULT '0',
  `kuhinja` tinyint(1) NOT NULL DEFAULT '0',
  `dozvoljeniljubimci` tinyint(1) NOT NULL DEFAULT '0',
  `klima` tinyint(1) NOT NULL DEFAULT '0',
  `terasa` tinyint(1) NOT NULL DEFAULT '0',
  `perilicarublja` tinyint(1) NOT NULL DEFAULT '0',
  `hladnjak` tinyint(1) NOT NULL DEFAULT '0',
  `perilicasuda` tinyint(1) NOT NULL DEFAULT '0',
  `pusenjedozvoljeno` tinyint(1) NOT NULL DEFAULT '0',
  `osiguranparking` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idoglasa` (`idoglasa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=155 ;

--
-- Dumping data for table `karakteristike`
--

INSERT INTO `karakteristike` (`ID`, `idoglasa`, `grijanje`, `tv`, `internet`, `kabelska`, `kupaonica`, `kuhinja`, `dozvoljeniljubimci`, `klima`, `terasa`, `perilicarublja`, `hladnjak`, `perilicasuda`, `pusenjedozvoljeno`, `osiguranparking`) VALUES
(99, 'VIuDLwCCRM4ad4zCivkN3E44XC', 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, '0nRKEAChiJl2gh8fpdBD5YOp7yn', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1),
(101, '5EQECW7oopCBLxqwyi9R68SPh3d', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(102, 'ixED9j8Di5qq6lAeo1dMwBqhk3M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(103, '9RpuQYS9KRiDHufF3lPsDnDJO4', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(104, 'IpoN6MNQ8LgtxIgOvtLrLmeryfC', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(110, 'kPFP8RCiTqhksudEavwuRtOzTQb', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0),
(111, 'lcrgIyXtszEd2lJjqtV753rt0E', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0),
(112, 'pKz9EIG1dndwHsw7bbsMgglY2V1', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0),
(114, 'njbfu9d5MdKvIAYmhSCZWaUdF3y', 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1),
(118, 'wxZcAK25oCOXiFp17Pq1czV9pSx', 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0),
(120, 'XBChGr7xzobTjOhs7wmNJTV1lKU', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(123, 'QeOVYqCAyWYv9ve9Tkdsm8iWD9j', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1),
(124, 'scFYpc0W9HDd3aDZWyCZ9mEsyxm', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1),
(125, 'waIdiGdju6Z0bGTgZ6fxZBTOLT', 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0),
(126, 'yEjZskw7SQuDFaNg9MyecDmd9c', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 1),
(130, 'Y2VqmRnapzZzuCRSqYAMz7fwM0r', 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 1),
(131, 'Mc9du5htkwwACZWLcraKrngKbK', 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1),
(132, 'm2gGQ1UwIGJSp5WBVPf1I1T0Lg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0),
(133, 'aupEVAD5A7DCfhfdwNOltTcXJhI', 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1),
(134, 'umJozHPOILtMf3Kw1xeJnF3EaqM', 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1),
(135, 'MRYSxrDMWNwTyD1EubV1l8CucK', 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0),
(136, '9GqdTnKTUOLiUkVv6Mc9du5htkw', 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(137, 'B2M91uIU8d6YOcw6nT4uGhlR4Or', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(138, 'YTEGgrCAWEK0sCgNNVThoGQkfuQ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, 'XtQhqHksMXj4BV8BZRCZxs8JmXv', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0),
(140, 'hBARTeSgiEN7A5dqlgtDGnoIaa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(141, '9UQaSv7bo3egE7TK8PjsNLdK71', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(142, 'kDF43L1zfCdX1q5eWTYQ8gJLae', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, 'zD6NI5DD4aVJBtHpN6bvCD4nwb', 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(146, 'qz4JHwyu80T1YR2UUpsdbw7Auwv', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(147, '4gzhC6NjnR9L3T5HS1ALyD70jx', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(148, '1Q5DWp84kH0ohWzBoR89LFA0Z4e', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(149, 'yPvsa8xRxyATw1eht1zgdvbw7Y', 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(150, 'vNJbgZul0fpjXrrGPU4zPufzGxt', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(151, 'M1EoP7FD86xbiHDvo8LA26jSjP5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1),
(152, 'BgT9JfZpcNlHHeq8sqbhcG5f9S', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0),
(153, '9GOjnEyj3uiMaOM6bIc55Lj6k4i', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1),
(154, 'dkioniLFSmXdPKG0ObjvVTGHLz8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `karakteristikepobrisane`
--

CREATE TABLE IF NOT EXISTS `karakteristikepobrisane` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `idoglasa` varchar(30) COLLATE utf8_bin NOT NULL,
  `grijanje` tinyint(1) NOT NULL DEFAULT '0',
  `tv` tinyint(1) NOT NULL DEFAULT '0',
  `internet` tinyint(1) NOT NULL DEFAULT '0',
  `kabelska` tinyint(1) NOT NULL DEFAULT '0',
  `kupaonica` tinyint(1) NOT NULL DEFAULT '0',
  `kuhinja` tinyint(1) NOT NULL DEFAULT '0',
  `dozvoljeniljubimci` tinyint(1) NOT NULL DEFAULT '0',
  `klima` tinyint(1) NOT NULL DEFAULT '0',
  `terasa` tinyint(1) NOT NULL DEFAULT '0',
  `perilicarublja` tinyint(1) NOT NULL DEFAULT '0',
  `hladnjak` tinyint(1) NOT NULL DEFAULT '0',
  `perilicasuda` tinyint(1) NOT NULL DEFAULT '0',
  `pusenjedozvoljeno` tinyint(1) NOT NULL DEFAULT '0',
  `osiguranparking` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idoglasa` (`idoglasa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `karakteristikepobrisane`
--

INSERT INTO `karakteristikepobrisane` (`ID`, `idoglasa`, `grijanje`, `tv`, `internet`, `kabelska`, `kupaonica`, `kuhinja`, `dozvoljeniljubimci`, `klima`, `terasa`, `perilicarublja`, `hladnjak`, `perilicasuda`, `pusenjedozvoljeno`, `osiguranparking`) VALUES
(1, 'q6rW3KJdhtCRuId5tt5BDbkCLP', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nazivkategorije` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nazivkategorije` (`nazivkategorije`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`ID`, `nazivkategorije`) VALUES
(1, 'Apartman'),
(3, 'Hostel'),
(2, 'Hotel'),
(4, 'Kamp'),
(5, 'Ostalo');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(80) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(80) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `korisnickoime` varchar(50) COLLATE utf8_bin NOT NULL,
  `broj` varchar(40) COLLATE utf8_bin NOT NULL,
  `lozinka` varchar(80) COLLATE utf8_bin NOT NULL,
  `idkorisnika` varchar(80) COLLATE utf8_bin NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `potvrden` tinyint(1) NOT NULL DEFAULT '0',
  `datumregistracije` date NOT NULL,
  `brojobjavljenihoglasa` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`,`korisnickoime`),
  UNIQUE KEY `idkorisnika` (`idkorisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=26 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ID`, `ime`, `prezime`, `email`, `korisnickoime`, `broj`, `lozinka`, `idkorisnika`, `admin`, `potvrden`, `datumregistracije`, `brojobjavljenihoglasa`) VALUES
(19, 'Antonio', 'Zbodulja', 'admin123@loc.coom', 'admin', '01 123241', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'aHCBKW8i2BgTK2tv65LHO6zB5US', 0, 1, '2014-05-16', 0),
(20, 'fshfh', 'hfsfs', 'hfsahshfashashf@gmail.com', 'hfsfshfs', '049 fshfhs', '123', '6EJ6d7oZ6xSWKuUiA4HTDSZ3k0XF', 0, 0, '2014-05-17', 0),
(21, 'Matija', 'Zbodulja', 'gwgrwg@jdgdj', '31341', '049 123', '123', 'xtrGCjCzrHkRtJOnIYMuAxr250wlGuf', 0, 0, '2014-05-17', 0),
(22, 'Matija', 'fwefw', 't0nc3k4312@hotmail.com', 'admin23', '040 1234', '123456', 'TvdWUbrAg7y5WThNoCPyATUI0MM7', 0, 0, '2014-05-17', 0),
(23, 'efwg', 'gjdgjdgj', 'admin123@loc.c', 'admin54', '031 123', '123456', 'lFnpksoRQONwZUsnmvGS2Nl0DvMefQ', 0, 0, '2014-05-17', 0),
(24, 'dedÄÄ‡Å¡Å¾Ä‘', 'dedÄÄ‡Å¡Å¾Ä‘', 'ffff@b.k', 'dedÄÄ‡Å¡Å¾Ä‘', '051 78', '123456', '2PhKgT3nrDHbioGf21Y9nR30yKSog2', 0, 0, '2014-05-17', 0),
(25, 'Matija', 'Aadgdaga', 'vex141sfbsfbsf4@gmail.com', 'admin43', '047 123', 'e10adc3949ba59abbe56e057f20f883e', 'fNprIe6YBB46Z69MttGv9UxdC9', 0, 0, '2014-05-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnicipobrisani`
--

CREATE TABLE IF NOT EXISTS `korisnicipobrisani` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(80) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(80) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `korisnickoime` varchar(50) COLLATE utf8_bin NOT NULL,
  `broj` varchar(40) COLLATE utf8_bin NOT NULL,
  `lozinka` varchar(80) COLLATE utf8_bin NOT NULL,
  `idkorisnika` varchar(80) COLLATE utf8_bin NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `potvrden` tinyint(1) NOT NULL DEFAULT '0',
  `datumregistracije` date NOT NULL,
  `brojobjavljenihoglasa` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`,`korisnickoime`),
  UNIQUE KEY `idkorisnika` (`idkorisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dumping data for table `korisnicipobrisani`
--

INSERT INTO `korisnicipobrisani` (`ID`, `ime`, `prezime`, `email`, `korisnickoime`, `broj`, `lozinka`, `idkorisnika`, `admin`, `potvrden`, `datumregistracije`, `brojobjavljenihoglasa`) VALUES
(1, 'Ante', 'Antić', 'qwe@qwe.qwe', 'ante', '020 23423', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tUHvrEc8IyF8ur37uER9X32RAY3', 0, 1, '2014-06-11', 0),
(3, 'Josip', 'asda', 'qwe@qwe.qwe', 'josip', '021 2333', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'eoqwQfpdcWjuvi4UuGbBlWB8PpOB', 0, 1, '2014-06-11', 0),
(4, 'juko', 'jasda', 'qwe@qwe.qwe', 'yxcv', '020 222', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'u80T1YR2UUpsdbw7Auwv44gzhC6Nj', 0, 1, '2014-06-11', 0),
(5, 'asyx', 'asyx', 'qwe@qwe.qwe', 'yxas', '021 123', '601f1889667efaebb33b8c12572835da3f027f78', 'gYZoB6qqv2mJH7fqqc55mBkPLb', 0, 1, '2014-06-11', 0),
(6, 'ivan', 'ivanic', 'qwe@qwe.qwe', 'vcxy', '01 123123', '601f1889667efaebb33b8c12572835da3f027f78', '2JeSay9FVhteL0spFkMx6mGt2FTyW', 0, 1, '2014-06-11', 0),
(7, 'fdsa', 'fdsa', 'qwe@qwe.qwe', 'fdsa', '01 123123', '601f1889667efaebb33b8c12572835da3f027f78', 'dJ0aSBSHwfxSDNeycNE3En1eZ73qF7Yu', 0, 1, '2014-06-11', 0),
(8, 'oiuo', 'ouiu', 'qwe@qwe.qwe', 'mnbv', '021 12312', '601f1889667efaebb33b8c12572835da3f027f78', 'XvLpKS6V4MOE2rMzdBk8Isjk8J3ByD', 0, 1, '2014-06-11', 0),
(9, 'lklk', 'lklk', 'qwe@qwe.qwe', 'lklk', '023 123', '601f1889667efaebb33b8c12572835da3f027f78', 'qOizma1tvjGdIcSujiIx9AM3zw9', 0, 1, '2014-06-11', 0),
(10, 'opop', 'opop', 'qwe@qwe.qwe', 'opop', '042 123123', '601f1889667efaebb33b8c12572835da3f027f78', '7WaczCc9wrlEz7WbORQHQppHKYr78gks', 0, 1, '2014-06-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `oglasi`
--

CREATE TABLE IF NOT EXISTS `oglasi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `kratkiopis` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `dugiopis` text COLLATE utf8_bin NOT NULL,
  `cijena` int(11) NOT NULL DEFAULT '1',
  `grad` varchar(60) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `brojosoba` int(11) NOT NULL DEFAULT '1',
  `povrsina` int(11) NOT NULL DEFAULT '1',
  `brojzvjezdica` int(11) NOT NULL DEFAULT '1',
  `brojsoba` int(11) NOT NULL DEFAULT '1',
  `korisnickoime` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `udaljenostcentramjesta` int(11) NOT NULL DEFAULT '1',
  `brojlezaja` int(11) NOT NULL DEFAULT '1',
  `minimalanbrojnocenja` int(11) NOT NULL DEFAULT '1',
  `idoglasa` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `blizinaplaze` int(11) NOT NULL DEFAULT '1',
  `brojtelefona` varchar(14) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `idzupanije` int(11) NOT NULL DEFAULT '1',
  `idkategorije` int(11) NOT NULL DEFAULT '1',
  `aktivan` tinyint(1) NOT NULL DEFAULT '1',
  `lokacija` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idoglasa` (`idoglasa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=171 ;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`ID`, `naslov`, `kratkiopis`, `dugiopis`, `cijena`, `grad`, `brojosoba`, `povrsina`, `brojzvjezdica`, `brojsoba`, `korisnickoime`, `udaljenostcentramjesta`, `brojlezaja`, `minimalanbrojnocenja`, `idoglasa`, `blizinaplaze`, `brojtelefona`, `idzupanije`, `idkategorije`, `aktivan`, `lokacija`) VALUES
(106, 'Ovo je neki naslov oglasa', '1sffhfs', 'sfhfshsfh', 22, '121313', 2, 4123, 4, 4, 'admin', 32, 2, 4, 'VIuDLwCCRM4ad4zCivkN3E44XC', 323, '049 121313', 1, 2, 0, ''),
(107, 'eqgqe', 'gqegeq', 'Iznajmljuju se Apartamani u novo renoviranoj kući koja je dovršena 2014rnrnrnOd namještaja je sve novo kreveti,ležajevi i kuhinje uređeno vrhunsko i kvalitetnornrnKlima,LCD-TV W-LANrnrnUgodan ambijentrnrnrnSvaki Apartman ima svoju terasu i poseban ulaz.rnrnu dvoristu se nalazi roštilj koji je dostupan svim gostima ,kuca sernrnnalazi u mirnom naselju koje ima pogled na more ...rnrnOsigurano parkirno mjestornrnUdaljenost do plaze 300 m i do centra 200mrnrnKapazitet Apartmana jernrnApartaman 1rnkategorizacija ****rn4 Braćna Ležaja OdvojenarnKuhinjarnVeliki Dnevni boravakrn2 KupaonernTerasa Ogromna sa pogledom na more', 2, 'gwrgrwg', 1, 0, 0, 2, 'admin', 0, 2, 3, '0nRKEAChiJl2gh8fpdBD5YOp7yn', 0, '0 0', 14, 1, 1, 'ivane brlic mazuranic 12, zagreb'),
(109, 'qgrqgq', 'rgrqgqrgqr', 'qrgqrgqrg', 3, 'fhgwrhrhw', 3, 0, 0, 2, 'admin', 0, 7, 3, 'ixED9j8Di5qq6lAeo1dMwBqhk3M', 0, '048 123', 14, 1, 1, ''),
(110, 'rwhwrhwr', 'hrwhwrh', 'wrhrwhwrh', 32, '1wgw', 4, 23, 4, 2, 'admin', 43, 4, 43, '9RpuQYS9KRiDHufF3lPsDnDJO4', 3114, '020 3131414', 10, 4, 1, ''),
(111, 'rwhwrhwr', 'hrwhwrh', 'wrhrwhwrh', 32, '1wgw', 4, 23, 4, 2, 'admin', 43, 4, 43, 'IpoN6MNQ8LgtxIgOvtLrLmeryfC', 3114, '020 3131414', 10, 4, 1, ''),
(117, 'Iznajmljujem dvosobni stan u PoreÄu ', 'Iznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\n', 'Iznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu ', 300, 'PoreÄ', 4, 60, 3, 2, 'admin', 350, 4, 5, 'kPFP8RCiTqhksudEavwuRtOzTQb', 200, '0 435343', 4, 1, 1, ''),
(118, 'Iznajmljujem dvosobni stan u Poreču ', 'Iznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\n', 'Iznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču ', 300, 'Poreč', 4, 60, 3, 2, 'admin', 350, 4, 5, 'lcrgIyXtszEd2lJjqtV753rt0E', 200, '0 435343', 4, 1, 1, ''),
(119, 'Iznajmljujem dvosčćžđč ', 'čžččžčžč\r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\n', 'Iznajmljujem dvosobni stan u Poreču čžčžžččžččžžččžžččžčIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču \r\nIznajmljujem dvosobni stan u Poreču ', 300, 'Poreč', 4, 60, 3, 2, 'admin', 350, 4, 5, 'pKz9EIG1dndwHsw7bbsMgglY2V1', 200, '0800 435343', 4, 1, 1, ''),
(121, 'Ovo je neki naslov oglasa1', 'Bla bla', '12131313', 43, 'Zagreb', 2, 54, 3, 3, 'admin', 32, 3, 2, 'njbfu9d5MdKvIAYmhSCZWaUdF3y', 34, '023 1234', 5, 1, 1, ''),
(127, 'hrwhwrh', 'wrhrwh', 'wrhwrh', 2, 'qgdfgfs', 2, 2, 1, 2, 'admin', 2, 1, 2, 'XBChGr7xzobTjOhs7wmNJTV1lKU', 2, '048 222', 3, 4, 1, ''),
(130, 'kzrrwhw', 'zkzrk', 'zrkzrk', 2, '1313', 2, 33, 5, 3, 'admin', 33, 4, 2, 'QeOVYqCAyWYv9ve9Tkdsm8iWD9j', 33, '051 1213', 5, 3, 1, ''),
(131, 'sfnfnfs', 'nfsn', 'sfnsfnsf', 3, '12131', 3, 212, 4, 2, 'admin', 312, 2, 3, 'scFYpc0W9HDd3aDZWyCZ9mEsyxm', 31, '022 123', 3, 3, 1, ''),
(132, 'geqgeq', 'geqg', 'qegqegeq', 23, 'dwgw', 2, 33, 3, 2, 'admin', 3, 4, 3, 'waIdiGdju6Z0bGTgZ6fxZBTOLT', 3, '022 1234', 4, 3, 1, ''),
(133, 'wswss', 'swws', 'wswsws', 2, 'www', 3, 3, 2, 2, 'admin', 4, 1, 3, 'yEjZskw7SQuDFaNg9MyecDmd9c', 4, '048 3333', 2, 3, 1, ''),
(137, 'Smještaj u Vinkovcima', 'Smještaj u centru Vinkovaca...', 'Smještaj u centru Vinkovaca...', 3, 'Vinkovci', 2, 34, 1, 2, 'admin', 34, 3, 3, 'Y2VqmRnapzZzuCRSqYAMz7fwM0r', 11, '049 34343', 17, 5, 1, ''),
(138, 'Smještaj u Dubrovniku', 'Smještaj u Dubrovniku...', 'Smještaj u Dubrovniku..', 4, 'Dubrovnik', 5, 54, 3, 4, 'admin', 44, 5, 5, 'Mc9du5htkwwACZWLcraKrngKbK', 3, '040 45454', 3, 5, 1, ''),
(139, 'Smještaj - Kuća u Dubrovniku', 'Smještaj - Kuća u Dubrovniku...', 'Smještaj - Kuća u Dubrovniku...', 4, 'Dubrovnik', 5, 545, 3, 4, 'admin', 44, 8, 4, 'm2gGQ1UwIGJSp5WBVPf1I1T0Lg', 333, '049 4545', 3, 5, 1, ''),
(140, 'Zadar', 'Smještaj u Zadru', 'Smještaj u centru Zadra', 4, 'Zadar', 4, 34, 5, 3, 'admin', 23, 3, 4, 'aupEVAD5A7DCfhfdwNOltTcXJhI', 23, '033 34343', 19, 5, 1, ''),
(141, 'fgertgrg', 'trgrtgrt', 'referge', 45, 'rtev', 3, 43, 4, 4, 'admin43', 33, 6, 4, 'umJozHPOILtMf3Kw1xeJnF3EaqM', 23, '052 4542', 2, 5, 1, ''),
(142, '1234', 'ntente', 'ntenetnten', 33, 'begebeg', 4, 55, 1, 3, 'admin', 44, 3, 3, 'MRYSxrDMWNwTyD1EubV1l8CucK', 44, '047 234', 4, 1, 1, ''),
(143, 'grwgrwg', 'grwgrwg', 'grwgwg', 33, 'bwr', 3, 33, 2, 2, 'admin', 33, 2, 3, '9GqdTnKTUOLiUkVv6Mc9du5htkw', 33, '048 2121', 2, 1, 1, ''),
(144, 'wgrw', 'gwrgwrg', 'wrgwrg', 12, 'qegqeg', 3, 45, 0, 3, 'admin', 43, 3, 1, 'B2M91uIU8d6YOcw6nT4uGhlR4Or', 34, '0 ', 2, 1, 1, ''),
(145, '12245', 'fwrhbwr', 'nrwnwrn', 33, 'asd', 0, 0, 0, 2, 'admin', 0, 2, 2, 'YTEGgrCAWEK0sCgNNVThoGQkfuQ', 0, '0 0', 10, 1, 1, ''),
(146, 'rqehrhhq', 'qrhrqh', 'rqhqrh', 32, 'wrgrw', 0, 0, 0, 2, 'admin', 0, 3, 3, 'XtQhqHksMXj4BV8BZRCZxs8JmXv', 0, '0 0', 2, 1, 1, ''),
(147, 'qgqhqrh', 'qrhrqh', 'qehrqhrq', 22, 'hgwrhrwh', 0, 0, 0, 2, 'admin', 0, 3, 2, 'hBARTeSgiEN7A5dqlgtDGnoIaa', 0, '0 0', 2, 1, 1, ''),
(148, 'rqgrqgrq', 'gqrgrqg', 'qrgrqgq', 2, 'qgrqg', 0, 0, 0, 2, 'admin', 0, 2, 3, '9UQaSv7bo3egE7TK8PjsNLdK71', 0, '0 0', 9, 1, 1, ''),
(151, 'Smještaj u Splitu', 'Ovo je kratki opis', 'Ovo je dugi opis', 33, 'Split', 3, 43, 2, 2, 'admin', 45, 2, 2, 'zD6NI5DD4aVJBtHpN6bvCD4nwb', 55, '021 1234', 14, 5, 1, ''),
(160, 'Oglas za Dubrovnik', 'Oglas za Dubrovnik', 'Oglas za Dubrovnik', 57, 'Dubrovnik', 3, 77, 3, 4, 'admin', 76, 4, 4, 'wxZcAK25oCOXiFp17Pq1czV9pSx', 65, '022 1234', 3, 1, 1, ''),
(162, 'drdrdr', 'ddrdrdrdr', 'drdrdr', 45, '4ret', 4, 4545, 1, 4, 'admin', 44, 5, 5, 'qz4JHwyu80T1YR2UUpsdbw7Auwv', 44, '043 4545', 17, 5, 1, 'Ilica 23, Zagreb'),
(163, 'utzuzuz', 'uzuzuz', 'uzuzuuz', 7, 'ututut', 6, 0, 0, 7, 'admin', 0, 2, 6, '4gzhC6NjnR9L3T5HS1ALyD70jx', 0, '0 0', 19, 4, 1, ''),
(164, 'oglas1', 'izizizi', 'ziziziz', 7, 'uzuzu', 7, 0, 0, 7, 'admin', 0, 1, 7, '1Q5DWp84kH0ohWzBoR89LFA0Z4e', 0, '0 0', 19, 5, 1, ''),
(169, 'rewq', 'asdasd', 'asdas', 2, '2dd', 2, 2, 0, 2, 'yxas', 0, 2, 2, '9GOjnEyj3uiMaOM6bIc55Lj6k4i', 0, '0 0', 19, 2, 1, ''),
(170, 'vcxy', 'vcxy', 'adasdas', 2, 'dfdf', 2, 0, 0, 2, 'vcxy', 0, 4, 2, 'dkioniLFSmXdPKG0ObjvVTGHLz8', 0, '0 0', 17, 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `oglasipobrisani`
--

CREATE TABLE IF NOT EXISTS `oglasipobrisani` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `kratkiopis` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `dugiopis` text COLLATE utf8_bin NOT NULL,
  `cijena` int(11) NOT NULL DEFAULT '1',
  `grad` varchar(60) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `brojosoba` int(11) NOT NULL DEFAULT '1',
  `povrsina` int(11) NOT NULL DEFAULT '1',
  `brojzvjezdica` int(11) NOT NULL DEFAULT '1',
  `brojsoba` int(11) NOT NULL DEFAULT '1',
  `korisnickoime` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `udaljenostcentramjesta` int(11) NOT NULL DEFAULT '1',
  `brojlezaja` int(11) NOT NULL DEFAULT '1',
  `minimalanbrojnocenja` int(11) NOT NULL DEFAULT '1',
  `idoglasa` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `blizinaplaze` int(11) NOT NULL DEFAULT '1',
  `brojtelefona` varchar(14) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `idzupanije` int(11) NOT NULL DEFAULT '1',
  `idkategorije` int(11) NOT NULL DEFAULT '1',
  `aktivan` tinyint(1) NOT NULL DEFAULT '1',
  `lokacija` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idoglasa` (`idoglasa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `oglasipobrisani`
--

INSERT INTO `oglasipobrisani` (`ID`, `naslov`, `kratkiopis`, `dugiopis`, `cijena`, `grad`, `brojosoba`, `povrsina`, `brojzvjezdica`, `brojsoba`, `korisnickoime`, `udaljenostcentramjesta`, `brojlezaja`, `minimalanbrojnocenja`, `idoglasa`, `blizinaplaze`, `brojtelefona`, `idzupanije`, `idkategorije`, `aktivan`, `lokacija`) VALUES
(1, 'Iznajmljujem dvosobni stan u PoreÄu ', 'Iznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\n', 'Iznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu \r\nIznajmljujem dvosobni stan u PoreÄu ', 300, 'PoreÄ', 4, 60, 3, 2, 'admin', 350, 4, 5, 'MX07lz2NzcoJGI4woqwfWbIv2l8', 200, '0 ', 4, 1, 1, ''),
(2, 'qwer', 'afdsfsd', 'sdfsdfsd', 3, '23123', 2, 0, 0, 2, 'ante', 0, 1, 3, 'yPvsa8xRxyATw1eht1zgdvbw7Y', 0, '0 0', 18, 2, 1, ''),
(3, 'qwer', 'qweqw', 'cqwcqwc', 2, 'weqwe', 2, 2, 0, 2, 'ante', 0, 3, 2, 'vNJbgZul0fpjXrrGPU4zPufzGxt', 0, '0 0', 18, 2, 1, ''),
(4, 'asdf', 'asdf', 'asdf', 2, '2323d', 2, 2, 0, 2, 'josip', 0, 2, 2, 'M1EoP7FD86xbiHDvo8LA26jSjP5', 0, '0 0', 18, 2, 1, ''),
(5, 'yxcv', 'yxvvv', 'yxcyxcyxc', 2, '23', 2, 0, 0, 3, 'yxcv', 0, 2, 2, 'BgT9JfZpcNlHHeq8sqbhcG5f9S', 0, '0 0', 17, 2, 1, ''),
(6, 'rewq', 'asdasd', 'asdas', 2, '2dd', 2, 2, 0, 2, 'yxas', 0, 2, 2, '9GOjnEyj3uiMaOM6bIc55Lj6k4i', 0, '0 0', 19, 2, 1, ''),
(7, 'vcxy', 'vcxy', 'adasdas', 2, 'dfdf', 2, 0, 0, 2, 'vcxy', 0, 4, 2, 'dkioniLFSmXdPKG0ObjvVTGHLz8', 0, '0 0', 17, 2, 1, ''),
(8, 'rtzu', 'erwe', 'fwefwef', 2, 'wewe', 2, 0, 0, 2, 'fdsa', 0, 2, 2, 'VLCXPVgzZh8EIhkrSUqEODwvmp', 0, '0 0', 12, 2, 1, ''),
(9, 'wqeqwe', 'qweqwe', 'qweqweq', 2, '2dd2', 2, 0, 0, 2, 'mnbv', 0, 4, 2, 'sQiDiNtaKeMOKMXULwdjN3gnit', 0, '0 0', 16, 2, 1, ''),
(10, 'lklk', 'dfsdfsd', 'sdfsdfwdf', 2, 'fe', 2, 0, 0, 2, 'lklk', 0, 2, 2, 'a61qZS8xgQCjHjXQxa5ItIv2KP', 0, '0 0', 18, 2, 1, ''),
(11, 'poiu', 'gchdgfdf', 'dfgfdgfdg', 2, 'qrer', 2, 0, 0, 2, 'opop', 0, 2, 2, 'q6rW3KJdhtCRuId5tt5BDbkCLP', 0, '0 0', 16, 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE IF NOT EXISTS `slike` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(45) COLLATE utf8_bin NOT NULL,
  `idoglasa` varchar(30) COLLATE utf8_bin NOT NULL,
  `glavnaslika` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=141 ;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`ID`, `link`, `idoglasa`, `glavnaslika`) VALUES
(17, 'upload/20140525_1401051617.jpg', 'VIuDLwCCRM4ad4zCivkN3E44XC', 0),
(18, 'upload/20140525_1401051655.jpg', 'VIuDLwCCRM4ad4zCivkN3E44XC', 1),
(37, 'upload/admin_20140601_1401633247(1).jpg', 'QeOVYqCAyWYv9ve9Tkdsm8iWD9j', 1),
(42, 'upload/admin_20140601_1401633610(1).jpg', 'scFYpc0W9HDd3aDZWyCZ9mEsyxm', 1),
(77, 'upload/admin_20140601_1401638496(1).jpg', 'm2gGQ1UwIGJSp5WBVPf1I1T0Lg', 1),
(78, 'upload/admin_20140601_1401638496(2).jpg', 'm2gGQ1UwIGJSp5WBVPf1I1T0Lg', 0),
(81, 'upload/admin_20140601_1401638496(5).jpg', 'm2gGQ1UwIGJSp5WBVPf1I1T0Lg', 0),
(82, 'upload/admin_20140601_1401638552(1).jpg', 'aupEVAD5A7DCfhfdwNOltTcXJhI', 1),
(106, 'upload/admin_20140601_1401647206(1).jpg', 'umJozHPOILtMf3Kw1xeJnF3EaqM', 1),
(107, 'upload/admin_20140601_1401647206(2).jpg', 'umJozHPOILtMf3Kw1xeJnF3EaqM', 0),
(108, 'upload/admin_20140601_1401647206(3).jpg', 'umJozHPOILtMf3Kw1xeJnF3EaqM', 0),
(109, 'upload/admin_20140601_1401647210(4).jpg', 'umJozHPOILtMf3Kw1xeJnF3EaqM', 0),
(110, 'upload/admin_20140601_1401647210(5).jpg', 'umJozHPOILtMf3Kw1xeJnF3EaqM', 0),
(111, 'upload/admin_20140601_1401647280(3).jpg', 'aupEVAD5A7DCfhfdwNOltTcXJhI', 0),
(112, 'upload/admin_20140601_1401647280(4).jpg', 'aupEVAD5A7DCfhfdwNOltTcXJhI', 0),
(114, 'upload/admin_20140601_1401647321(2).jpg', 'aupEVAD5A7DCfhfdwNOltTcXJhI', 0),
(115, 'upload/admin_20140603_1401810528(1).jpg', 'MRYSxrDMWNwTyD1EubV1l8CucK', 1),
(116, 'upload/admin_20140603_1401810528(2).jpg', 'MRYSxrDMWNwTyD1EubV1l8CucK', 0),
(117, 'upload/admin_20140603_1401810528(3).jpg', 'MRYSxrDMWNwTyD1EubV1l8CucK', 0),
(118, 'upload/admin_20140603_1401811616(1).jpg', '9GqdTnKTUOLiUkVv6Mc9du5htkw', 1),
(119, 'upload/admin_20140603_1401811616(2).jpg', '9GqdTnKTUOLiUkVv6Mc9du5htkw', 0),
(121, 'upload/admin_20140604_1401896870(1).jpg', 'B2M91uIU8d6YOcw6nT4uGhlR4Or', 1),
(122, 'upload/admin_20140604_1401896870(2).jpg', 'B2M91uIU8d6YOcw6nT4uGhlR4Or', 0),
(123, 'upload/admin_20140604_1401897167(1).jpg', 'YTEGgrCAWEK0sCgNNVThoGQkfuQ', 1),
(124, 'upload/admin_20140604_1401897167(2).jpg', 'YTEGgrCAWEK0sCgNNVThoGQkfuQ', 0),
(125, 'upload/admin_20140604_1401897478(1).jpg', 'XtQhqHksMXj4BV8BZRCZxs8JmXv', 1),
(126, 'upload/admin_20140604_1401897478(2).jpg', 'XtQhqHksMXj4BV8BZRCZxs8JmXv', 0),
(127, 'upload/admin_20140604_1401897478(3).jpg', 'XtQhqHksMXj4BV8BZRCZxs8JmXv', 0),
(131, 'upload/admin_20140605_1401962799(1).jpg', 'zD6NI5DD4aVJBtHpN6bvCD4nwb', 1),
(132, 'upload/admin123_20140611_1402506954(1).jpg', 'kDF43L1zfCdX1q5eWTYQ8gJLae', 1),
(133, 'upload/admin123_20140611_1402506954(2).gif', 'kDF43L1zfCdX1q5eWTYQ8gJLae', 0),
(134, 'upload/ante_20140611_1402508054(1).gif', 'yPvsa8xRxyATw1eht1zgdvbw7Y', 1),
(135, 'upload/ante_20140611_1402508054(2).gif', 'yPvsa8xRxyATw1eht1zgdvbw7Y', 0),
(136, 'upload/ante_20140611_1402508993(1).gif', 'vNJbgZul0fpjXrrGPU4zPufzGxt', 1),
(137, 'upload/josip_20140611_1402509688(1).gif', 'M1EoP7FD86xbiHDvo8LA26jSjP5', 1),
(138, 'upload/yxcv_20140611_1402510100(1).gif', 'BgT9JfZpcNlHHeq8sqbhcG5f9S', 1),
(139, 'upload/yxas_20140611_1402510651(1).gif', '9GOjnEyj3uiMaOM6bIc55Lj6k4i', 1),
(140, 'upload/vcxy_20140611_1402511442(1).gif', 'dkioniLFSmXdPKG0ObjvVTGHLz8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slikepobrisane`
--

CREATE TABLE IF NOT EXISTS `slikepobrisane` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(45) COLLATE utf8_bin NOT NULL,
  `idoglasa` varchar(30) COLLATE utf8_bin NOT NULL,
  `glavnaslika` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slikepobrisane`
--

INSERT INTO `slikepobrisane` (`ID`, `link`, `idoglasa`, `glavnaslika`) VALUES
(1, 'upload/lklk_20140611_1402512856(1).gif', 'a61qZS8xgQCjHjXQxa5ItIv2KP', 1),
(2, 'upload/opop_20140611_1402513118(1).gif', 'q6rW3KJdhtCRuId5tt5BDbkCLP', 1),
(3, 'upload/opop_20140611_1402513118(2).gif', 'q6rW3KJdhtCRuId5tt5BDbkCLP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `zupanija`
--

CREATE TABLE IF NOT EXISTS `zupanija` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `naziv` (`naziv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=22 ;

--
-- Dumping data for table `zupanija`
--

INSERT INTO `zupanija` (`ID`, `naziv`) VALUES
(1, 'Bjelovarsko-bilogorska'),
(2, 'Brodsko-posavska'),
(3, 'Dubrovačko-neretvanska'),
(20, 'Grad Zagreb'),
(4, 'Istarska'),
(5, 'Karlovačka'),
(6, 'Koprivničko-križevačka'),
(7, 'Krapinsko-zagorska'),
(8, 'Ličko-senjska'),
(9, 'Međimurska'),
(10, 'Osječko-baranjska'),
(11, 'Požeško-slavonska'),
(12, 'Primorsko-goranska'),
(13, 'Sisačko-moslavačka'),
(14, 'Splitsko-dalmatinska'),
(16, 'Varaždinska'),
(17, 'Virovitičko-podravska'),
(18, 'Vukovarsko-srijemska'),
(19, 'Zadarska'),
(21, 'Zagrebačka'),
(15, 'Šibensko-kninska');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
