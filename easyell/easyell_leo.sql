-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.0.96-community-nt - MySQL Community Edition (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出  表 easyell_zcj.group 结构
DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL auto_increment,
  `groupName` varchar(20) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `createid` int(11) NOT NULL,
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 正在导出表  easyell_zcj.group 的数据：1 rows
DELETE FROM `group`;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` (`id`, `groupName`, `updatetime`, `adminid`, `createid`, `description`) VALUES
	(1, 'helloword', 1000000000, 1, 1, 'hellohellohellohellohellohello');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;


-- 导出  表 easyell_zcj.group_user 结构
DROP TABLE IF EXISTS `group_user`;
CREATE TABLE IF NOT EXISTS `group_user` (
  `id` int(11) NOT NULL,
  `groupid` int(11) default NULL,
  `userid` int(11) NOT NULL,
  `projectid` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 正在导出表  easyell_zcj.group_user 的数据：13 rows
DELETE FROM `group_user`;
/*!40000 ALTER TABLE `group_user` DISABLE KEYS */;
INSERT INTO `group_user` (`id`, `groupid`, `userid`, `projectid`) VALUES
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
/*!40000 ALTER TABLE `group_user` ENABLE KEYS */;


-- 导出  表 easyell_zcj.item 结构
DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL auto_increment,
  `description` varchar(255) default NULL,
  `title` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `posterid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `createdate` int(11) NOT NULL,
  `updatedate` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- 正在导出表  easyell_zcj.item 的数据：5 rows
DELETE FROM `item`;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`id`, `description`, `title`, `status`, `posterid`, `type`, `projectid`, `createdate`, `updatedate`) VALUES
	(1, '1111111111111111', 'one', 0, 1, 0, 1, 10000101, 10000101),
	(2, '22222222222', 'two', 0, 2, 1, 1, 10000101, 10000101),
	(3, '333333333', 'three', 1, 3, 0, 1, 10000101, 10000101),
	(4, 'test item2 createtime', 'testtitle', 1, 1, 1, 1, 10000101, 1424745236),
	(5, 'test item2 createtime', 'testtitle', 1, 1, 1, 1, 10000101, 1424745536),
	(6, 'test item2 desctiption', 'testtitle', 1, 1, 1, 1, 10000101, 10000101),
	(7, 'test item2 createtime', 'testtitle', 1, 1, 1, 1, 10000101, 10000101),
	(8, 'test item2 createtime', 'testtitle', 1, 1, 1, 1, 1424744809, 1424744809),
	(9, 'test item2 createtime', 'testtitle', 1, 1, 1, 1, 1424745076, 1424745076),
	(10, 'test item2 createtime', 'testtitle', 1, 1, 1, 1, 1424745124, 1424745124),
	(11, 'test item2 createtime', 'testtitle', 1, 1, 1, 1, 1424745331, 1424745331),
	(12, 'test item2 createtime', 'testtitle', 1, 1, 1, 1, 1424745523, 1424745523);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;


-- 导出  表 easyell_zcj.item_user 结构
DROP TABLE IF EXISTS `item_user`;
CREATE TABLE IF NOT EXISTS `item_user` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 正在导出表  easyell_zcj.item_user 的数据：7 rows
DELETE FROM `item_user`;
/*!40000 ALTER TABLE `item_user` DISABLE KEYS */;
INSERT INTO `item_user` (`id`, `itemid`, `ownerid`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 1),
	(4, 2, 3),
	(5, 2, 4),
	(6, 3, 1),
	(7, 3, 5);
/*!40000 ALTER TABLE `item_user` ENABLE KEYS */;


-- 导出  表 easyell_zcj.project 结构
DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL auto_increment,
  `projectname` varchar(20) NOT NULL,
  `groupid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `createrid` int(11) NOT NULL,
  `description` varchar(45) default NULL,
  `createdate` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- 正在导出表  easyell_zcj.project 的数据：2 rows
DELETE FROM `project`;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`id`, `projectname`, `groupid`, `adminid`, `createrid`, `description`, `createdate`) VALUES
	(1, 'oneproject', 1, 1, 1, 'oneoneoneoneone', 1000000001),
	(2, 'twoproject', 1, 2, 2, 'twotwotwotwp', 1110000000);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;


-- 导出  表 easyell_zcj.user 结构
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL auto_increment,
  `account` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `avatar` varchar(255) default NULL,
  `Email` varchar(255) default NULL,
  `Phone` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- 正在导出表  easyell_zcj.user 的数据：16 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `account`, `username`, `password`, `avatar`, `Email`, `Phone`) VALUES
	(1, 'guoshencheng', 'guoshencheng', '123456', 'agasf', 'asdfaghjkwerw', '13738167171'),
	(2, 'zhouyunge', 'zhouyunge', '123456', 'agasf', 'asdfaghjkwerw', '11111111111'),
	(3, 'zhouchunjie', 'zhouchunjie', '123456', 'agasf', 'asdfaghjkwerw', '22222222222'),
	(4, 'dingliangliang', 'dingliangliang', '123456', 'agasf', 'asdfaghjkwerw', '33333333333'),
	(5, 'oneacount', 'oneusername', 'onepassword', 'oneavatar', 'oneEmail', '55555555555'),
	(6, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(7, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(8, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(9, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(10, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(11, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(12, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(13, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(14, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(15, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone'),
	(16, 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
