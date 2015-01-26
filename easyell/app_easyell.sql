-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2015 年 01 月 25 日 20:48
-- 服务器版本: 5.5.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_easyell`
--

-- --------------------------------------------------------

--
-- 表的结构 `Group`
--

CREATE TABLE IF NOT EXISTS `Group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(20) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `createid` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `Group`
--

INSERT INTO `Group` (`id`, `groupName`, `updatetime`, `adminid`, `createid`, `description`) VALUES
(1, 'helloword', 1000000000, 1, 1, 'hellohellohellohellohellohello');

-- --------------------------------------------------------

--
-- 表的结构 `Group_User`
--

CREATE TABLE IF NOT EXISTS `Group_User` (
  `id` int(11) NOT NULL,
  `groupid` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `projectid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Group_User`
--

INSERT INTO `Group_User` (`id`, `groupid`, `userid`, `projectid`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL),
(3, 1, 3, NULL),
(4, 1, 4, NULL),
(5, 1, 5, NULL),
(6, NULL, 1, 1),
(7, NULL, 2, 1),
(8, NULL, 3, 1),
(9, NULL, 1, 2),
(10, NULL, 2, 2),
(11, NULL, 3, 2),
(12, NULL, 4, 2),
(13, NULL, 5, 2);

-- --------------------------------------------------------

--
-- 表的结构 `Item`
--

CREATE TABLE IF NOT EXISTS `Item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `posterid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `Item`
--

INSERT INTO `Item` (`id`, `description`, `title`, `status`, `posterid`, `type`) VALUES
(1, '1111111111111111', 'one', 0, 1, 0),
(2, '22222222222', 'two', 0, 2, 1),
(3, '333333333', 'three', 1, 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `Item_User`
--

CREATE TABLE IF NOT EXISTS `Item_User` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Item_User`
--

INSERT INTO `Item_User` (`id`, `itemid`, `ownerid`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 2, 4),
(6, 3, 1),
(7, 3, 5);

-- --------------------------------------------------------

--
-- 表的结构 `Project`
--

CREATE TABLE IF NOT EXISTS `Project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectname` varchar(20) NOT NULL,
  `groupid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `createrid` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `createdate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `Project`
--

INSERT INTO `Project` (`id`, `projectname`, `groupid`, `adminid`, `createrid`, `description`, `createdate`) VALUES
(1, 'oneproject', 1, 1, 1, 'oneoneoneoneone', 1000000001),
(2, 'twoproject', 1, 2, 2, 'twotwotwotwp', 1110000000);

-- --------------------------------------------------------

--
-- 表的结构 `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `User`
--

INSERT INTO `User` (`id`, `account`, `username`, `password`, `avatar`, `Email`, `Phone`) VALUES
(1, 'guoshencheng', 'guoshencheng', '123456', 'agasf', 'asdfaghjkwerw', '13738167171'),
(2, 'zhouyunge', 'zhouyunge', '123456', 'agasf', 'asdfaghjkwerw', '11111111111'),
(3, 'zhouchunjie', 'zhouchunjie', '123456', 'agasf', 'asdfaghjkwerw', '22222222222'),
(4, 'dingliangliang', 'dingliangliang', '123456', 'agasf', 'asdfaghjkwerw', '33333333333'),
(5, 'oneacount', 'oneusername', 'onepassword', 'oneavatar', 'oneEmail', '55555555555');
