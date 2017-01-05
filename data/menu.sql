# Host: 10.1.71.68  (Version: 5.7.12-0ubuntu1)
# Date: 2016-12-31 06:09:46
# Generator: MySQL-Front 5.3  (Build 4.214)

/*!40101 SET NAMES gb2312 */;

#
# Structure for table "basic_user"
#

DROP TABLE IF EXISTS `basic_user`;
CREATE TABLE `basic_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(11) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `realname` varchar(20) NOT NULL DEFAULT '',
  `add_time` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `del_flag` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `login_time` datetime DEFAULT NULL,
  `ip` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "basic_user"
#

INSERT INTO `basic_user` VALUES (1,'admin','15724703695','9db06bcff9248837f86d1a6bcf41c9e7','¡∫ ¿√Ø','2017-01-04 11:49:22','2017-01-04 13:24:31',0,'2017-01-04 17:59:28','127.0.0.1',1),(2,'smile','15724703694','9db06bcff9248837f86d1a6bcf41c9e7',' ¿√Ø','2017-01-04 13:24:59','2017-01-04 16:04:59',0,'2017-01-04 13:31:20','127.0.0.1',1);

#
# Structure for table "menu_food"
#

DROP TABLE IF EXISTS `menu_food`;
CREATE TABLE `menu_food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(255) NOT NULL DEFAULT '',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `add_time` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1',
  `del_flag` tinyint(3) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "menu_food"
#


#
# Structure for table "menu_type"
#

DROP TABLE IF EXISTS `menu_type`;
CREATE TABLE `menu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `add_time` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `del_flag` tinyint(3) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "menu_type"
#

INSERT INTO `menu_type` VALUES (1,'ªÁ≤À','2017-01-04 14:56:56','2017-01-04 14:56:56',0,0),(2,'Àÿ≤À','2017-01-04 14:57:13','2017-01-04 15:13:28',0,1);
