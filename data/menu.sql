# Host: 10.1.65.41  (Version: 5.7.12-0ubuntu1)
# Date: 2017-01-15 16:06:10
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "basic_user"
#

INSERT INTO `basic_user` VALUES (1,'admin','15700000000','14e1b600b1fd579f47433b88e8d85291','超级管理员','2017-01-04 11:49:22','2017-01-06 13:32:24',0,'2017-02-03 16:53:48','127.0.0.1',1),(2,'smile','15724703695','9db06bcff9248837f86d1a6bcf41c9e7','梁世茂','2017-01-04 13:24:59','2017-01-06 13:32:30',0,'2017-01-06 16:59:50','127.0.0.1',1);

#
# Structure for table "basic_waiter"
#

DROP TABLE IF EXISTS `basic_waiter`;
CREATE TABLE `basic_waiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `sex` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-男 1-女',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `add_time` date DEFAULT NULL COMMENT '入职时间',
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0-离职 1-在职',
  `sort` int(11) NOT NULL DEFAULT '0',
  `leave_time` date DEFAULT NULL COMMENT '离职时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "basic_waiter"
#

INSERT INTO `basic_waiter` VALUES (1,'张三',0,'12000000000','宁晋县大曹庄','2017-01-06',1000.00,1,1,'2017-01-06'),(2,'李四',1,'13655055523','宁晋县大曹庄延长前村','2017-01-06',2000.00,1,3,'2017-01-06');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "menu_food"
#

INSERT INTO `menu_food` VALUES (1,0,'','','',0.00,'2017-01-05 11:16:41','2017-01-05 11:16:41',1,1,0),(2,1,'鱼香肉丝','','',20.00,'2017-01-05 11:26:03','2017-01-05 11:26:03',1,0,0),(3,1,'宫保鸡丁','','',21.00,'2017-01-05 11:28:11','2017-01-05 11:28:11',1,0,0),(4,1,'水煮肉片','','',34.00,'2017-01-05 11:31:19','2017-01-05 11:31:19',1,0,0),(5,2,'素炒油麦','','',12.00,'2017-01-05 11:32:49','2017-01-05 11:32:49',1,0,0),(6,2,'摊鸡蛋','','',10.00,'2017-01-05 11:35:12','2017-01-05 11:35:12',1,0,0),(7,4,'燕京啤酒','','',5.00,'2017-01-05 11:35:46','2017-01-05 11:35:46',1,0,0),(8,3,'大拌菜','','',10.00,'2017-01-05 11:36:23','2017-01-05 11:36:23',1,0,0),(9,4,'红星二锅头','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/a8c1274d400dbcb480ed8888cab6c089.jpg','',10.00,'2017-01-05 11:44:29','2017-01-06 09:31:11',1,0,0),(10,1,'京酱肉丝','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/05/07bb766240877df08026c67e1a760d38.jpg','',25.00,'2017-01-05 18:33:38','2017-01-05 18:33:38',1,0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "menu_type"
#

INSERT INTO `menu_type` VALUES (1,'荤菜','2017-01-04 14:56:56','2017-02-03 16:48:02',0,0),(2,'素菜','2017-01-04 14:57:13','2017-01-04 15:13:28',0,1),(3,'凉菜','2017-01-05 11:29:25','2017-01-05 11:29:33',0,2),(4,'酒水','2017-01-05 11:32:05','2017-01-05 11:32:05',0,3),(5,'主食','2017-01-06 14:27:37','2017-01-06 14:27:47',0,4);

#
# Structure for table "order_order"
#

DROP TABLE IF EXISTS `order_order`;
CREATE TABLE `order_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `table_id` tinyint(3) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-ing  1-ed',
  `del_flag` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "order_order"
#


#
# Structure for table "order_order_detail"
#

DROP TABLE IF EXISTS `order_order_detail`;
CREATE TABLE `order_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `food_id` int(11) NOT NULL DEFAULT '0',
  `count` mediumint(9) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "order_order_detail"
#

