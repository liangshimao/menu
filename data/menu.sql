# Host: 127.0.0.1  (Version 5.7.11)
# Date: 2017-01-07 00:57:07
# Generator: MySQL-Front 5.4  (Build 4.4)
# Internet: http://www.mysqlfront.de/

/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "basic_user"
#

INSERT INTO `basic_user` VALUES (1,'admin','15000000000','9db06bcff9248837f86d1a6bcf41c9e7','管理员','2017-01-04 11:49:22','2017-01-07 00:29:28',0,'2017-01-07 00:30:26','127.0.0.1',1),(2,'smile','15724703695','9db06bcff9248837f86d1a6bcf41c9e7','梁世茂','2017-01-04 13:24:59','2017-01-07 00:30:18',0,'2017-01-04 13:31:20','127.0.0.1',1);

#
# Structure for table "basic_waiter"
#

DROP TABLE IF EXISTS `basic_waiter`;
CREATE TABLE `basic_waiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `sex` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-�� 1-Ů',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `add_time` date DEFAULT NULL COMMENT '��ְʱ��',
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0-��ְ 1-��ְ',
  `sort` int(11) NOT NULL DEFAULT '0',
  `leave_time` date DEFAULT NULL COMMENT '��ְʱ��',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "basic_waiter"
#

INSERT INTO `basic_waiter` VALUES (3,'张三',0,'15000000000','河北省邢台市宁晋县','2017-01-07',2500.00,1,0,'2017-01-07'),(4,'李四',1,'13655055523','河北省邢台市宁晋县','2016-11-30',3000.00,1,0,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "menu_food"
#

INSERT INTO `menu_food` VALUES (1,1,'鱼香肉丝','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/da7c0e7340a17ba5808b2a4ece3b7bc4.jpg','好吃哈哈',15.00,'2017-01-06 00:17:36','2017-01-06 00:56:28',1,0,0),(2,1,'宫保鸡丁','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/a37f5d63404f4aec805748d35feffc61.jpg','新鲜的肌肉哦',13.00,'2017-01-06 00:18:21','2017-01-06 00:56:42',1,0,1),(3,4,'燕京啤酒','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/de4bb7f04010718a8071b0d4e77d1600.jpg','好喝的啤酒',5.00,'2017-01-06 00:55:42','2017-01-06 00:59:52',1,0,3),(4,4,'红星二锅头','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/89d32cb140d2130880bb4baf88b1b924.jpg','红星就是好喝',10.00,'2017-01-06 00:56:17','2017-01-06 00:58:46',1,0,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "menu_type"
#

INSERT INTO `menu_type` VALUES (1,'荤菜','2017-01-04 14:56:56','2017-01-04 14:56:56',0,0),(2,'素菜','2017-01-04 14:57:13','2017-01-04 15:13:28',0,1),(3,'凉菜','2017-01-06 00:16:18','2017-01-06 00:16:40',0,2),(4,'酒水','2017-01-06 00:16:26','2017-01-06 00:16:44',0,3);
