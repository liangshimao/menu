<<<<<<< HEAD
# Host: 10.1.65.41  (Version: 5.7.12-0ubuntu1)
# Date: 2017-01-15 16:06:10
# Generator: MySQL-Front 5.3  (Build 4.214)
=======
Ôªø# Host: 127.0.0.1  (Version 5.7.11)
# Date: 2017-01-07 00:57:07
# Generator: MySQL-Front 5.4  (Build 4.4)
# Internet: http://www.mysqlfront.de/
>>>>>>> 0709188171fa11e197ceb7d358b61bd259576feb

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

<<<<<<< HEAD
INSERT INTO `basic_user` VALUES (1,'admin','15700000000','14e1b600b1fd579f47433b88e8d85291','≥¨º∂π‹¿Ì‘±','2017-01-04 11:49:22','2017-01-06 13:32:24',0,'2017-02-03 16:53:48','127.0.0.1',1),(2,'smile','15724703695','9db06bcff9248837f86d1a6bcf41c9e7','¡∫ ¿√Ø','2017-01-04 13:24:59','2017-01-06 13:32:30',0,'2017-01-06 16:59:50','127.0.0.1',1);
=======
INSERT INTO `basic_user` VALUES (1,'admin','15000000000','9db06bcff9248837f86d1a6bcf41c9e7','ÁÆ°ÁêÜÂëò','2017-01-04 11:49:22','2017-01-07 00:29:28',0,'2017-01-07 00:30:26','127.0.0.1',1),(2,'smile','15724703695','9db06bcff9248837f86d1a6bcf41c9e7','Ê¢Å‰∏ñËåÇ','2017-01-04 13:24:59','2017-01-07 00:30:18',0,'2017-01-04 13:31:20','127.0.0.1',1);
>>>>>>> 0709188171fa11e197ceb7d358b61bd259576feb

#
# Structure for table "basic_waiter"
#

DROP TABLE IF EXISTS `basic_waiter`;
CREATE TABLE `basic_waiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `sex` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-ÔøΩÔøΩ 1-≈Æ',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `add_time` date DEFAULT NULL COMMENT 'ÔøΩÔøΩ÷∞ ±ÔøΩÔøΩ',
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0-ÔøΩÔøΩ÷∞ 1-ÔøΩÔøΩ÷∞',
  `sort` int(11) NOT NULL DEFAULT '0',
  `leave_time` date DEFAULT NULL COMMENT 'ÔøΩÔøΩ÷∞ ±ÔøΩÔøΩ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "basic_waiter"
#

<<<<<<< HEAD
INSERT INTO `basic_waiter` VALUES (1,'’≈»˝',0,'12000000000','ƒ˛Ω˙œÿ¥Û≤‹◊Ø','2017-01-06',1000.00,1,1,'2017-01-06'),(2,'¿ÓÀƒ',1,'13655055523','ƒ˛Ω˙œÿ¥Û≤‹◊Ø—”≥§«∞¥Â','2017-01-06',2000.00,1,3,'2017-01-06');
=======
INSERT INTO `basic_waiter` VALUES (3,'Âº†‰∏â',0,'15000000000','Ê≤≥ÂåóÁúÅÈÇ¢Âè∞Â∏ÇÂÆÅÊôãÂéø','2017-01-07',2500.00,1,0,'2017-01-07'),(4,'ÊùéÂõõ',1,'13655055523','Ê≤≥ÂåóÁúÅÈÇ¢Âè∞Â∏ÇÂÆÅÊôãÂéø','2016-11-30',3000.00,1,0,NULL);
>>>>>>> 0709188171fa11e197ceb7d358b61bd259576feb

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

INSERT INTO `menu_food` VALUES (1,1,'È±ºÈ¶ôËÇâ‰∏ù','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/da7c0e7340a17ba5808b2a4ece3b7bc4.jpg','Â•ΩÂêÉÂìàÂìà',15.00,'2017-01-06 00:17:36','2017-01-06 00:56:28',1,0,0),(2,1,'ÂÆ´‰øùÈ∏°‰∏Å','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/a37f5d63404f4aec805748d35feffc61.jpg','Êñ∞È≤úÁöÑËÇåËÇâÂì¶',13.00,'2017-01-06 00:18:21','2017-01-06 00:56:42',1,0,1),(3,4,'Ááï‰∫¨Âï§ÈÖí','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/de4bb7f04010718a8071b0d4e77d1600.jpg','Â•ΩÂñùÁöÑÂï§ÈÖí',5.00,'2017-01-06 00:55:42','2017-01-06 00:59:52',1,0,3),(4,4,'Á∫¢Êòü‰∫åÈîÖÂ§¥','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/89d32cb140d2130880bb4baf88b1b924.jpg','Á∫¢ÊòüÂ∞±ÊòØÂ•ΩÂñù',10.00,'2017-01-06 00:56:17','2017-01-06 00:58:46',1,0,4);

#
# Data for table "menu_food"
#

INSERT INTO `menu_food` VALUES (1,0,'','','',0.00,'2017-01-05 11:16:41','2017-01-05 11:16:41',1,1,0),(2,1,'”„œ„»‚Àø','','',20.00,'2017-01-05 11:26:03','2017-01-05 11:26:03',1,0,0),(3,1,'π¨±£º¶∂°','','',21.00,'2017-01-05 11:28:11','2017-01-05 11:28:11',1,0,0),(4,1,'ÀÆ÷Û»‚∆¨','','',34.00,'2017-01-05 11:31:19','2017-01-05 11:31:19',1,0,0),(5,2,'Àÿ≥¥”Õ¬Û','','',12.00,'2017-01-05 11:32:49','2017-01-05 11:32:49',1,0,0),(6,2,'ÃØº¶µ∞','','',10.00,'2017-01-05 11:35:12','2017-01-05 11:35:12',1,0,0),(7,4,'—‡æ©∆°æ∆','','',5.00,'2017-01-05 11:35:46','2017-01-05 11:35:46',1,0,0),(8,3,'¥Û∞Ë≤À','','',10.00,'2017-01-05 11:36:23','2017-01-05 11:36:23',1,0,0),(9,4,'∫Ï–«∂˛π¯Õ∑','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/06/a8c1274d400dbcb480ed8888cab6c089.jpg','',10.00,'2017-01-05 11:44:29','2017-01-06 09:31:11',1,0,0),(10,1,'æ©Ω¥»‚Àø','http://bmob-cdn-5781.b0.upaiyun.com/2017/01/05/07bb766240877df08026c67e1a760d38.jpg','',25.00,'2017-01-05 18:33:38','2017-01-05 18:33:38',1,0,0);

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
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
>>>>>>> 0709188171fa11e197ceb7d358b61bd259576feb

#
# Data for table "menu_type"
#

<<<<<<< HEAD
INSERT INTO `menu_type` VALUES (1,'ªÁ≤À','2017-01-04 14:56:56','2017-02-03 16:48:02',0,0),(2,'Àÿ≤À','2017-01-04 14:57:13','2017-01-04 15:13:28',0,1),(3,'¡π≤À','2017-01-05 11:29:25','2017-01-05 11:29:33',0,2),(4,'æ∆ÀÆ','2017-01-05 11:32:05','2017-01-05 11:32:05',0,3),(5,'÷˜ ≥','2017-01-06 14:27:37','2017-01-06 14:27:47',0,4);

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

=======
INSERT INTO `menu_type` VALUES (1,'Ëç§Ëèú','2017-01-04 14:56:56','2017-01-04 14:56:56',0,0),(2,'Á¥†Ëèú','2017-01-04 14:57:13','2017-01-04 15:13:28',0,1),(3,'ÂáâËèú','2017-01-06 00:16:18','2017-01-06 00:16:40',0,2),(4,'ÈÖíÊ∞¥','2017-01-06 00:16:26','2017-01-06 00:16:44',0,3);
>>>>>>> 0709188171fa11e197ceb7d358b61bd259576feb
