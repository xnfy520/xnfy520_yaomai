# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.9)
# Database: xnfy520_yaomai
# Generation Time: 2013-09-06 01:43:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table xnfy520_yaomai_address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_address`;

CREATE TABLE `xnfy520_yaomai_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `description` varchar(255) NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL,
  `start` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `initiate_price` float(10,2) DEFAULT '0.00',
  `average_price` float(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_address` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_address` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_address` (`id`, `name`, `level`, `pid`, `sort`, `publish`, `description`, `create_date`, `modify_date`, `start`, `initiate_price`, `average_price`)
VALUES
	(1,'北京市',1,0,99,1,'',1374887663,1375843711,1,30.00,2.00),
	(2,'天津市',1,0,99,1,'',1374887771,1375942113,0,10.00,1.00),
	(3,'重庆市',1,0,99,1,'',1374887793,1375942121,0,20.00,2.00),
	(4,'上海市',1,0,99,1,'',1374887804,1375845886,0,40.00,2.00),
	(5,'湖北省',1,0,99,1,'',1374889070,1374891318,0,0.00,0.00),
	(6,'武汉市',2,5,99,1,'',1374889891,1374897291,0,20.00,100.00),
	(7,'洪山区',3,6,99,1,'',1374890059,1375846144,0,0.00,1.00),
	(8,'青山区',3,6,99,1,'',1374890447,1375846150,0,0.00,2.00),
	(9,'硚口区',3,6,99,1,'',1374890466,1375846156,0,0.00,3.00),
	(10,'汉阳区',3,6,99,1,'',1374890477,1375846161,0,0.00,4.00),
	(11,'湖南省',1,0,99,1,'',1374891343,0,0,0.00,0.00),
	(12,'海淀区',2,1,99,1,'',1374894128,0,0,20.00,40.00),
	(13,'天门市',2,5,99,1,'',1374909460,1374910024,0,20.00,120.00),
	(14,'朝阳区',2,1,99,1,'',1375845641,0,0,0.00,1.00),
	(15,'昌平区',2,1,99,1,'',1375845745,1375845764,0,0.00,4.00),
	(16,'大兴区',2,1,99,1,'',1375845758,0,0,0.00,7.00),
	(17,'宝山区',2,4,99,1,'',1375845807,0,0,0.00,2.00),
	(18,'嘉定区',2,4,99,1,'',1375845818,0,0,0.00,10.00);

/*!40000 ALTER TABLE `xnfy520_yaomai_address` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_addresss
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_addresss`;

CREATE TABLE `xnfy520_yaomai_addresss` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `by_user` int(10) unsigned NOT NULL,
  `consignee` varchar(255) NOT NULL DEFAULT '',
  `where_id` tinyint(1) unsigned NOT NULL,
  `where_text` varchar(255) NOT NULL DEFAULT '',
  `street` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `cellphone` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_addresss` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_addresss` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_addresss` (`id`, `by_user`, `consignee`, `where_id`, `where_text`, `street`, `zip`, `cellphone`, `phone`, `create_date`, `status`)
VALUES
	(28,42,'小小胖',12,'北京市 海淀区','极地','234234','13565656566','',1376298647,0),
	(19,41,'小小胖',13,'湖北省 天门市','木脑壳sfe','2342432','13434343444','',1375952667,0),
	(23,41,'小小新',2,'天津市','sfe','3242434','13535353535','',1376105142,0),
	(24,41,'新新',2,'天津市','234243','2343242','13636363636','',1376105273,0),
	(29,45,'小胖',12,'北京市 海淀区','不知道','234234','13454545454','',1378342025,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_addresss` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_advert_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_advert_category`;

CREATE TABLE `xnfy520_yaomai_advert_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_advert_category` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_advert_category` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_advert_category` (`id`, `name`, `type`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(7,'首页团购产品','global_right_side_advert',1,99,'',1358471276,1376725476),
	(6,'首页设计师产品','global_left_side_advert',1,99,'',1358471269,1376725470),
	(5,'首页轮播广告','index_wheel_sowing_advert',1,99,'',1358471173,1358472087),
	(9,'微信公众号','global_right_side_adverts',1,99,'',1376726747,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_advert_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_advert_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_advert_list`;

CREATE TABLE `xnfy520_yaomai_advert_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_advert_list` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_advert_list` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_advert_list` (`id`, `pid`, `name`, `image`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(13,5,'index2','20130817154631941.jpg','http://www.www.www',1,99,'',1358473772,1376725593),
	(12,5,'index1','20130817154618585.jpg','',1,99,'',1358473754,1376725581),
	(11,6,'left1','20130817154649284.jpg','',1,99,'',1358473643,1376725610),
	(10,7,'right1','20130817154721245.jpg','',1,99,'',1358473626,1376725643),
	(25,9,'11212','20130817161916422.jpg','',1,99,'',1376727558,0),
	(18,7,'right2','20130817154730937.jpg','',1,99,'',1358478385,1376725651),
	(22,6,'left','20130817154640748.jpg','',1,1,'',1358478902,1376725601),
	(23,7,'right','20130817154711991.jpg','http://www.eee.ccc',1,1,'',1358478920,1376725634);

/*!40000 ALTER TABLE `xnfy520_yaomai_advert_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_blogroll
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_blogroll`;

CREATE TABLE `xnfy520_yaomai_blogroll` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_blogroll` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_blogroll` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_blogroll` (`id`, `name`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(1,'淘乐惠1','http://www.taoleh.net/',1,255,'全网最真诚的免费抽奖活动平台',0,1358392099),
	(3,'童学汇','http://www.tongxueh.com',1,255,'',0,1350286806),
	(4,'凡至尚品','http://www.whfzsp.com',1,255,'',0,0),
	(5,'江陵郡都','http://www.tl-jljd.com',1,255,'',0,0),
	(6,'苏州百随','http://www.baiziyan.com',1,255,'',0,1358392403),
	(7,'逸菲凡','http://www.hbyff.com',1,255,'',0,0),
	(8,'问鼎世纪','http://www.wdsjgg.com',1,255,'',0,1350286807),
	(9,'湖北只启生物化工','http://www.hbzhiqi.com',1,255,'',0,0),
	(10,'生物工程学院','http://jdgcx.whsw.cn/',1,255,'',0,0),
	(11,'优路美新型建材','http://www.whumroad.com',1,255,'',0,0),
	(12,'优路美新型建材','http://www.whumroad.com',1,255,'',0,0),
	(13,'591论文网','http://www.591papers.com',1,255,'',0,0),
	(14,'珀莱科技','http://www.tacitispa.com',1,255,'',0,0),
	(15,'朗捷物流','http://hmu046078.chinaw3.com/',1,255,'',0,0),
	(16,'雷俊网盟','http://www.leijunnet.com/',1,255,'',0,0),
	(17,'中科开物','http://www.zkkwgro.com',1,255,'',0,0),
	(18,'长江一号','http://www.whcjyh.com',1,255,'',0,0),
	(19,'创新教育','http://www.88cx.cn',1,255,'',0,0),
	(20,'开信商贸','http://www.2009kx.com',1,255,'',0,0),
	(21,'神宇租车','http://www.whsyzc.cn',1,255,'',0,0),
	(22,'朗肯节能','http://www.langken.net',1,255,'',0,0),
	(23,'随时有外卖','http://www.langken.net',1,255,'sdfsdfsdfsdf',0,1358392769);

/*!40000 ALTER TABLE `xnfy520_yaomai_blogroll` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_carts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_carts`;

CREATE TABLE `xnfy520_yaomai_carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `by_user` int(10) unsigned NOT NULL,
  `by_comodity` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_carts` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_carts` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_carts` (`id`, `by_user`, `by_comodity`, `quantity`, `create_date`, `type`)
VALUES
	(32,41,10026,12,1376103298,1),
	(33,41,10020,6,1376103306,1),
	(34,41,10019,2,1376103315,1);

/*!40000 ALTER TABLE `xnfy520_yaomai_carts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_commodity_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_commodity_category`;

CREATE TABLE `xnfy520_yaomai_commodity_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_commodity_category` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_category` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_commodity_category` (`id`, `name`, `sort`, `publish`, `description`, `create_date`, `modify_date`)
VALUES
	(1,'床',99,1,'',1374566718,NULL),
	(2,'沙发',99,1,'',1374566731,NULL),
	(3,'桌子',99,1,'',1374566742,NULL),
	(4,'椅子',99,1,'',1374566749,NULL),
	(5,'柜子',99,1,'',1374566757,NULL),
	(6,'灯具',99,1,'',1374566771,NULL);

/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_commodity_consult
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_commodity_consult`;

CREATE TABLE `xnfy520_yaomai_commodity_consult` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `by_commodity` int(11) NOT NULL,
  `by_merchant` int(10) unsigned NOT NULL,
  `by_user` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_commodity_consult` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_consult` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_commodity_consult` (`id`, `pid`, `by_commodity`, `by_merchant`, `by_user`, `message`, `create_date`)
VALUES
	(18,0,10006,69877664,32,'helloworldheihei',1357720509),
	(21,0,10011,69877664,32,'介个好吃不？我想买介个',1358909804),
	(22,21,10011,69877664,30,'很好吃，很好吃，很好吃',1358909846),
	(20,18,10006,69877664,30,'hello worlds',1358908485),
	(23,0,10011,69877664,32,'helloithink....',1358909993),
	(24,0,10011,69877664,32,'sdfsdfsdfsdfsdf',1358909998),
	(25,0,10011,69877664,32,'sdfsdfsdfsdf',1358910004),
	(26,23,10011,69877664,30,'rwerwerwerw',1358910107),
	(27,24,10011,69877664,30,'3433t3t',1358910112),
	(28,0,10011,69877664,32,'【味道零食】友臣金丝肉松饼 皮薄馅多 吃过',1358910326),
	(40,0,10012,69877664,32,'介个好不好呢？？？？？？',1359613668),
	(41,0,10012,69877664,32,'不错不错不错不错不错',1359686202),
	(42,41,10012,69877664,30,'谢谢',1359690899);

/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_consult` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_commodity_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_commodity_details`;

CREATE TABLE `xnfy520_yaomai_commodity_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(1000) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  `did` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_commodity_details` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_details` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_commodity_details` (`id`, `name`, `image`, `icon`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`, `did`)
VALUES
	(1,'声明风格','20130801092931291.jpg',NULL,'',1,99,'<span style=\"font-family:Simsun;line-height:20px;white-space:normal;\">当代的经典闺房风格轮廓，更新的外观相比背台词。在一系列的颜色。</span>',1374807443,1375320572,10027),
	(3,'贴心的设计','20130801090438365.jpg',NULL,'',1,99,'<span style=\"font-family:Simsun;line-height:20px;white-space:normal;\">每一个角度考虑，手臂，手出身的腿和角褶背面滚动。一个美丽的独立的一块。</span>',1374808752,1375320369,10027),
	(4,'真正的奢侈品','20130801092708836.jpg',NULL,'',1,99,'<span style=\"font-family:Simsun;line-height:20px;white-space:normal;\">这真的是舒适 - 具有弹性，但支持静坐和综合座垫无缝完成。豪华比利时天鹅绒。</span>',1375320435,0,10027),
	(5,'在英国手工制作','20130801092727944.jpg',NULL,'',1,99,'<span style=\"font-family:Simsun;line-height:20px;white-space:normal;\">整个集合在英国由手工精心制作的，我们的家庭式经营的制造商。混合和匹配，不拘一格的外观颜色。</span>',1375320454,0,10027);

/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_commodity_evaluate
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_commodity_evaluate`;

CREATE TABLE `xnfy520_yaomai_commodity_evaluate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `by_user` int(10) unsigned NOT NULL,
  `by_order_id` int(10) unsigned NOT NULL,
  `by_order` varchar(255) NOT NULL,
  `by_commodity` int(10) unsigned NOT NULL,
  `specification` int(10) NOT NULL,
  `star` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `message` text,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_commodity_evaluate` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_evaluate` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_commodity_evaluate` (`id`, `by_user`, `by_order_id`, `by_order`, `by_commodity`, `specification`, `star`, `message`, `create_date`, `modify_date`, `enable`)
VALUES
	(27,32,67,'5395215455',10006,0,5,'默认好评！',1359525621,1359613352,1),
	(28,32,67,'5395215455',10012,0,3,'从发货到收到挺快的！外包装那些都包的很严实！还送了个贴心的购物袋！就是打开铁罐包装的时候！发现那有易拉环的密封铁块自己 掉开了还是怎么了！都不用我碰易拉环自己就开了！这点我有点意外！希望包装盒更加严实点！别再出现类似情况！让购买的顾客也安 心点！事后和店家交流！态度还是挺好的！给好评！',1359525621,1359709243,1),
	(29,32,67,'5395215455',10012,106,5,'默认好评！',1359525621,1359613352,1),
	(30,32,68,'8539503355',10012,0,3,'非常非常好，非常非常',1359535853,1359709239,1),
	(31,32,68,'8539503355',10001,108,2,'不错，给4分',1359535853,1359602715,1),
	(32,32,68,'8539503355',10015,0,1,'真是烂，垃圾',1359535853,1359604920,1);

/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_evaluate` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_commodity_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_commodity_images`;

CREATE TABLE `xnfy520_yaomai_commodity_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lid` int(10) unsigned NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `bys` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_commodity_images` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_images` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_commodity_images` (`id`, `lid`, `image`, `bys`)
VALUES
	(109,10018,'20130723175912146.jpg',1),
	(110,10018,'20130724085505205.jpg',1),
	(112,10018,'20130724090050598.jpg',1),
	(113,10018,'20130724090626629.jpg',1),
	(114,10018,'20130724090632437.jpg',1),
	(115,10019,'20130724141312453.jpg',1),
	(116,10020,'20130724145802155.jpg',1),
	(117,10020,'20130724151458945.jpg',1),
	(140,4,'20130801103604429.jpg',2),
	(134,10028,'20130726113558323.jpg',1),
	(121,10023,'20130725094623886.jpg',1),
	(122,10023,'20130725094629963.jpg',1),
	(123,10023,'20130725094634363.jpg',1),
	(127,10026,'20130725102339204.jpg',1),
	(126,10025,'20130725095801736.jpg',1),
	(128,10026,'20130725102403484.jpg',1),
	(138,10027,'20130801103230566.jpg',1),
	(139,4,'20130801103553470.jpg',2),
	(137,10027,'20130801093031748.jpg',1),
	(136,10027,'20130801093016654.jpg',1),
	(141,4,'20130801103723227.jpg',2),
	(142,4,'20130801103746913.jpg',2),
	(143,1,'20130801104759973.jpg',2),
	(144,2,'20130801104808322.jpg',2),
	(145,3,'20130801104817727.jpg',2),
	(146,1,'20130801104847152.jpg',2),
	(147,2,'20130801104911141.jpg',2);

/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_commodity_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_commodity_list`;

CREATE TABLE `xnfy520_yaomai_commodity_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(255) NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `price` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `details` text,
  `p1` mediumtext,
  `p2` mediumtext,
  `p3` mediumtext,
  `stylist_id` int(11) unsigned DEFAULT NULL,
  `stylist_say` varchar(255) DEFAULT NULL,
  `measure` double(10,2) unsigned DEFAULT '0.00',
  `sales_volume` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_commodity_list` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_list` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_commodity_list` (`id`, `no`, `pid`, `cid`, `name`, `image`, `enable`, `recommend`, `sort`, `views`, `price`, `create_date`, `modify_date`, `description`, `details`, `p1`, `p2`, `p3`, `stylist_id`, `stylist_say`, `measure`, `sales_volume`)
VALUES
	(10023,'5186174731',2,43,'seffefef','20130725094616728.jpg',1,0,99,1,30.00,1374716815,1374803818,'1','2',NULL,NULL,'[{\"ssss\":\"3333\"}]',1,'sefsfsfsef',0.00,0),
	(10019,'1276464731',1,30,'床子类3床子类3床子类3床子类3','20130724141309784.jpg',1,0,99,1,40.00,1374646721,1376020284,'','','[{\"11111q\":\"11111\"},{\"2q\":\"2222\"},{\"3q\":\"33333\"}]',NULL,NULL,0,'',2.00,0),
	(10020,'0909464731',1,33,'床子类2床子类2床子类2床子类2床子类2床子类2','20130724145758526.jpg',1,0,99,2,30.00,1374649090,1376020275,'','sefsfsf','[{\"sef\":\"1\"},{\"fefwefwf\":\"2\"},{\"3333\":\"2222\"}]','[{\"bbbb\":\"2222\"},{\"cccc\":\"33333\"},{\"dddd\":\"44444\"},{\"eeee\":\"55555\"}]','[{\"qqqqq\":\"1111\"},{\"aaaaa\":\"22222\"},{\"zzzzzzz\":\"33333\"}]',0,'',1.00,0),
	(10025,'6847174731',3,45,'34343','20130725095755632.jpg',1,0,99,0,330.00,1374717486,1374803830,'efeefe','',NULL,NULL,NULL,0,'',0.00,0),
	(10026,'3309174731',1,33,'床子类1床子类1床子类1床子类1床子类1床子类1','20130725102335932.jpg',1,0,99,16,340.00,1374719033,1375263012,'sffefef','r32r32r',NULL,NULL,NULL,1,'232342424',3.00,0),
	(10028,'1679084731',3,45,'sefsfsefsef','20130726113550803.jpg',1,0,99,0,20.00,1374809761,NULL,'','',NULL,NULL,NULL,0,'',0.00,0),
	(10027,'3784084731',3,46,'fefefefef','20130801093007542.jpg',1,0,99,0,30.00,1374804873,1375843437,'sfefe','<strong style=\"margin:0px;padding:0px;font-family:Simsun;white-space:normal;line-height:30px;font-size:13px;\">为什么店Made.com</strong><span style=\"font-family:Simsun;line-height:20px;white-space:normal;\"></span> \r\n<div style=\"margin:0px;padding:0px 0px 0px 20px;background-image:url(http://localhost/xnfy520_yaomai/home/Tpl/default/Public/image/19.png);font-family:Simsun;line-height:20px;white-space:normal;background-position:8px 6px;background-repeat:no-repeat no-repeat;\">\r\n	伟大的设计，提供高达70％的折扣典型的高街价格\r\n</div>\r\n<div style=\"margin:0px;padding:0px 0px 0px 20px;background-image:url(http://localhost/xnfy520_yaomai/home/Tpl/default/Public/image/19.png);font-family:Simsun;line-height:20px;white-space:normal;background-position:8px 6px;background-repeat:no-repeat no-repeat;\">\r\n	100％安全交易和回报做文章，免费\r\n</div>\r\n<div style=\"margin:0px;padding:0px 0px 0px 20px;background-image:url(http://localhost/xnfy520_yaomai/home/Tpl/default/Public/image/19.png);font-family:Simsun;line-height:20px;white-space:normal;background-position:8px 6px;background-repeat:no-repeat no-repeat;\">\r\n	最后，因为你可以信任我们-我们已经交付了数千满意的客户遍布全国。通过他们的家弗里克卡\r\n</div>','[{\"\\u5f97\\u5230\\u8fd9\\u4e2a\\u51fa\\u52a8\":\"8 - 10\\u5468\\u4e4b\\u5185\"},{\"\\u6807\\u51c6\\u4ea4\\u8d27\\u4ef7\":\"\\u00a30.00\\uff08300\\u82f1\\u9551\\u4ee5\\u4e0a\\u7684\\u8ba2\\u5355\\u514d\\u8d39\\uff09\"}]','[{\"\\u4e00\\u822c\\u5c3a\\u5bf8\":\"W174\\u6240\\u8ff0D94\\u6240\\u8ff0H89\"},{\"\\u5ea7\\u4f4d\\u9ad8\\u5ea6\":\"46\\u5398\\u7c73\"},{\"\\u5176\\u4ed6\\u5c3a\\u5bf8\":\"8 - 10\\u5468\\u4e4b\\u5185\"},{\"\\u5305\\u88c5\\u5c3a\\u5bf8\":\"\\u5ea7\\u4f4d\\u5bbd\\u5ea6 - 114\\u5398\\u7c73\\uff0c\\u5ea7\\u6905\\u6df1\\u5ea6 - 62\\u5398\\u7c73\"}]','[{\"\\u6846\\u67b6\":\"\\u5b9e\\u5fc3\\u6866\\u6728\"},{\"\\u817f\":\"\\u5b9e\\u5fc3\\u5c71\\u6bdb\\u6989\\u6728 - \\u53e4\\u8463\\u5b8c\\u6210\"},{\"\\u60ac\\u6302\":\"\\u6cc9\"},{\"\\u586b\\u5145\":\"\\u6ce1\\u6cab\\uff0836kg\\/cbm\\uff09\"},{\"\\u5e03\":\"70\\uff05\\u6da4\\u7eb6\\uff0c30\\uff05\\u68c9\\u5929\\u9e45\\u7ed2 - \\u5bcc\\u8c6a\\u84dd\\u8272\"},{\"\\u62a4\\u7406\":\"\\u56fa\\u5b9a\\u5ea7\\u5957 - \\u4e13\\u4e1a\\u62a4\\u7406\"},{\"\\u88c5\\u914d\":\"\\u5bb9\\u6613\"},{\"\\u91cd\\u91cf\":\"47\\u5343\\u514b\"}]',2,'关于加斯顿沙发和爱心座椅是一个老派的，迷人的氛围。试想一下，这些曲线，色彩是复杂的，是蛋糕上的樱桃天',22.00,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_commodity_parameter
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_commodity_parameter`;

CREATE TABLE `xnfy520_yaomai_commodity_parameter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `cid` int(10) NOT NULL,
  `lid` int(11) NOT NULL,
  `parameter_key` varchar(255) NOT NULL,
  `parameter_value` varchar(255) NOT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_commodity_parameter` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_parameter` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_commodity_parameter` (`id`, `pid`, `cid`, `lid`, `parameter_key`, `parameter_value`, `sort`, `enable`)
VALUES
	(1,0,0,10019,'sfesf','3333',99,1),
	(2,0,0,10019,'2222','222333',99,1);

/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_parameter` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_commodity_specification
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_commodity_specification`;

CREATE TABLE `xnfy520_yaomai_commodity_specification` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `cid` int(10) NOT NULL,
  `lid` int(10) unsigned NOT NULL,
  `specification` varchar(255) NOT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `original_cost` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  `current_price` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  `inventory` int(10) unsigned NOT NULL,
  `integral` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table xnfy520_yaomai_commodity_subclass
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_commodity_subclass`;

CREATE TABLE `xnfy520_yaomai_commodity_subclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(10) NOT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_commodity_subclass` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_subclass` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_commodity_subclass` (`id`, `name`, `pid`, `sort`, `publish`, `description`, `create_date`, `modify_date`)
VALUES
	(30,'床子类1',1,99,1,'',1356156752,1374803342),
	(32,'沙发子类1',2,99,1,'',1356158231,1374803373),
	(33,'床子类2',1,99,1,'',1356161177,1374803348),
	(34,'桌子子类1',3,99,1,'',1356161185,1374803407),
	(35,'床子类3',1,99,1,'',1356161193,1374803354),
	(36,'柜子子类1',5,99,1,'',1356161205,1374803447),
	(37,'椅子子类1',4,99,1,'',1356161222,1374803429),
	(38,'椅子子类2',4,99,1,'',1356161229,1374803435),
	(39,'柜子子类2',5,99,1,'',1356161297,1374803453),
	(40,'柜子子类3',5,99,1,'',1356161311,1374803459),
	(41,'沙发子类2',2,99,1,'',1356501705,1374803379),
	(42,'灯具子类1',6,99,1,'',1357276331,1374803602),
	(43,'沙发子类3',2,99,1,'',1357276371,1374803385),
	(45,'桌子子类2',3,99,1,'',1357276527,1374803560),
	(46,'桌子子类3',3,99,1,'',1357276538,1374803553),
	(47,'床子类4',1,99,1,'',1375255809,NULL),
	(48,'床子类5',1,99,1,'',1375255819,NULL);

/*!40000 ALTER TABLE `xnfy520_yaomai_commodity_subclass` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_contribute
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_contribute`;

CREATE TABLE `xnfy520_yaomai_contribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no` char(10) NOT NULL,
  `themeid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `publication_date` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `revision` varchar(255) NOT NULL,
  `pages` varchar(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `publish` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `CreateDate` int(10) unsigned NOT NULL DEFAULT '0',
  `ModifyDate` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(255) unsigned NOT NULL DEFAULT '99',
  `recommend` tinyint(1) unsigned NOT NULL,
  `author` varchar(255) NOT NULL,
  `downloads` int(10) unsigned NOT NULL DEFAULT '0',
  `poi` varchar(255) NOT NULL,
  `views` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_contribute` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_contribute` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_contribute` (`id`, `no`, `themeid`, `title`, `name`, `alias`, `image`, `file`, `publisher`, `publication_date`, `price`, `folio`, `revision`, `pages`, `format`, `isbn`, `description`, `details`, `userid`, `publish`, `status`, `CreateDate`, `ModifyDate`, `sort`, `recommend`, `author`, `downloads`, `poi`, `views`)
VALUES
	(16,'4274797929',2,'Simple schizophrenia revisited: Its schizophrenic body image deviation','Open Journal of Applied Sciences','OJOAS','20121127092135940.jpg','','erg','eg','erg','egeg','erg','er','ergeg','geg','Simple schizophrenia revisited: Its schizophrenic body image deviation','Book Catalog:<br />\r\nChapter Introduction to the <br />\r\nirst section of contemporary French philosophy: philosophical writing philosophy <br />\r\nsection II, Foucault biography the   madness the formation of   the first of the <br />\r\nsecond chapter of <br />\r\nthe history of madness with madness rational first section of <br />\r\nSection II of the writings of its ideological development. <br />\r\nthree madness Zhu relative to <br />\r\nthe fourth quarter of madness therapy <br />\r\nSection V mental hospital birth of   the first section of the <br />\r\nthird chapter of the body, authority and discipline <br />\r\n\"non-physical\" punishment from torture to the <br />\r\nsecond power and the body of <br />\r\nthe third quarter of disciplinary power <br />\r\nof modern society with discipline means of the fourth quarter is the\r\n                fourth chapter of the disciplinary society discourse, words of knowledge, truth, discourse and power\r\n                the first section of \"sexual repression\" discourse and sexology\r\n                Section II Foucault\'s theory of power\r\n                section III powers Chapter V of',1,1,1,1353979299,1354071139,99,1,'Zhang',0,'10.4236/ojpsych.2012.224051, November 27 2011',0),
	(11,'9374697912',3,'Section II of the writings of its ideological development. ','Neuroscience & Medicine','NM','20121127091843867.jpg','','sef','sef','sf','sef','sf','sfs','sefsef','fsfs','Section II of the writings of its ideological development. ','Book Catalog:<br />\r\nChapter Introduction to the <br />\r\nirst section of contemporary French philosophy: philosophical writing philosophy <br />\r\nsection II, Foucault biography the   madness the formation of   the first of the <br />\r\nsecond chapter of <br />\r\nthe history of madness with madness rational first section of <br />\r\nSection II of the writings of its ideological development. <br />\r\nthree madness Zhu relative to <br />\r\nthe fourth quarter of madness therapy <br />\r\nSection V mental hospital birth of   the first section of the <br />\r\nthird chapter of the body, authority and discipline <br />\r\n\"non-physical\" punishment from torture to the <br />\r\nsecond power and the body of <br />\r\nthe third quarter of disciplinary power <br />\r\nof modern society with discipline means of the fourth quarter is the\r\n                fourth chapter of the disciplinary society discourse, words of knowledge, truth, discourse and power\r\n                the first section of \"sexual repression\" discourse and sexology\r\n                Section II Foucault\'s theory of power\r\n                section III powers Chapter V of',1,1,1,1353979126,1354071194,99,1,'Chen',0,'10.4236/ojpsych.2012.224051, November 27 2013',6),
	(10,'5292397720',2,'Economy Economy Economy','Low Carbon Economy','LCE','20121127091631239.jpg','兰abc.pdf','sdf1','sdf1','sdf1','sdf1','sdf1','sdf1','sdf1','sdf1','Theory to guide practice - many students do not know the correct pronunciation hair bad sound, and then the mother tongue instead caused. This book by the English voice of Chinese and English voice contrast theoretical knowledge learning ...ssssssssssssss','Book Catalog:<br />\r\nChapter Introduction to the <br />\r\nirst section of contemporary French philosophy: philosophical writing philosophy <br />\r\nsection II, Foucault biography the   madness the formation of   the first of the <br />\r\nsecond chapter of <br />\r\nthe history of madness with madness rational first section of <br />\r\nSection II of the writings of its ideological development. <br />\r\nthree madness Zhu relative to <br />\r\nthe fourth quarter of madness therapy <br />\r\nSection V mental hospital birth of   the first section of the <br />\r\nthird chapter of the body, authority and discipline <br />\r\n\"non-physical\" punishment from torture to the <br />\r\nsecond power and the body of <br />\r\nthe third quarter of disciplinary power <br />\r\nof modern society with discipline means of the fourth quarter is the\r\n                fourth chapter of the disciplinary society discourse, words of knowledge, truth, discourse and power\r\n                the first section of \"sexual repression\" discourse and sexology\r\n                Section II Foucault\'s theory of power\r\n                section III powers Chapter V of',1,1,1,1353977201,1354071196,99,1,'Feng',5,'10.4236/ojpsych.2012.224051, November 27 2012',0),
	(12,'4274297915',4,'AA has been indexed by several world class databases, for more information, please access the follow','Theoretical Economics Letters','TEL','20121127091910330.jpg','','sefs','fesfes','fs','esfse','fs','fsf','fsfse','fse','AA has been indexed by several world class databases, for more information, please access the following links:','sfsfse',1,1,1,1353979152,1354071193,99,1,'Myung-Sun Kim',0,'0',0),
	(13,'1330197920',5,'Reiko Koide, Yuya Nishi, Nobuaki Morita','Wireless Sensor Network','WSN','20121127092000822.jpg','','f','fsef','fs','efes','sfs','s','fsf','sef','Reiko Koide, Yuya Nishi, Nobuaki Morita','Book Catalog:<br />\r\nChapter Introduction to the <br />\r\nirst section of contemporary French philosophy: philosophical writing philosophy <br />\r\nsection II, Foucault biography the   madness the formation of   the first of the <br />\r\nsecond chapter of <br />\r\nthe history of madness with madness rational first section of <br />\r\nSection II of the writings of its ideological development. <br />\r\nthree madness Zhu relative to <br />\r\nthe fourth quarter of madness therapy <br />\r\nSection V mental hospital birth of   the first section of the <br />\r\nthird chapter of the body, authority and discipline <br />\r\n\"non-physical\" punishment from torture to the <br />\r\nsecond power and the body of <br />\r\nthe third quarter of disciplinary power <br />\r\nof modern society with discipline means of the fourth quarter is the\r\n                fourth chapter of the disciplinary society discourse, words of knowledge, truth, discourse and power\r\n                the first section of \"sexual repression\" discourse and sexology\r\n                Section II Foucault\'s theory of power\r\n                section III powers Chapter V of',1,1,1,1353979202,1354071191,99,1,'Yang',0,'10.4236/ojpsych.2012.224051, November 27 1999',0),
	(14,'8450697923',6,'Behavioral inhibition in female college students with schizotypal traits: An event-related potential','Journal of Information Security','JOIS','20121127092027451.jpg','','se','sfsef','fse','f','fs','fs','fsfs','fs','Behavioral inhibition in female college students with schizotypal traits: An event-related potential study','sefesfesf',1,1,1,1353979230,1354071179,99,1,'Qiaohui Yang, Keiko Ikemoto',0,'10.4236/ojpsych.2012.224051, November 27 2009',1),
	(15,'3446997925',7,'OJAS has been indexed by several world class databases, for more information, please access the foll','Advances in Biological Chemistry','AIBC','20121127092049215.jpg','','sef','sef','sef','sf','sef','sefsf','sfsf','se','OJAS has been indexed by several world class databases, for more information, please access the following links:','Book Catalog:<br />\r\nChapter Introduction to the <br />\r\nirst section of contemporary French philosophy: philosophical writing philosophy <br />\r\nsection II, Foucault biography the   madness the formation of   the first of the <br />\r\nsecond chapter of <br />\r\nthe history of madness with madness rational first section of <br />\r\nSection II of the writings of its ideological development. <br />\r\nthree madness Zhu relative to <br />\r\nthe fourth quarter of madness therapy <br />\r\nSection V mental hospital birth of   the first section of the <br />\r\nthird chapter of the body, authority and discipline <br />\r\n\"non-physical\" punishment from torture to the <br />\r\nsecond power and the body of <br />\r\nthe third quarter of disciplinary power <br />\r\nof modern society with discipline means of the fourth quarter is the\r\n                fourth chapter of the disciplinary society discourse, words of knowledge, truth, discourse and power\r\n                the first section of \"sexual repression\" discourse and sexology\r\n                Section II Foucault\'s theory of power\r\n                section III powers Chapter V of',1,1,1,1353979252,1354071177,99,1,'Yun',0,'10.4236/ojpsych.2012.224051, November 27 2010',0),
	(17,'3164597933',2,'DNA methylation of the Monoamine Oxidases A and B genes in postmortem brains of subjects with schizo','English voice systems cognitive construct tutorial','EVSCCT','20121127092211654.jpg','','er','tetet','tet','te','etet','t','ete','ete','DNA methylation of the Monoamine Oxidases A and B genes in postmortem brains of subjects with schizophrenia','Book Catalog:<br />\r\nChapter Introduction to the <br />\r\nirst section of contemporary French philosophy: philosophical writing philosophy <br />\r\nsection II, Foucault biography the   madness the formation of   the first of the <br />\r\nsecond chapter of <br />\r\nthe history of madness with madness rational first section of <br />\r\nSection II of the writings of its ideological development. <br />\r\nthree madness Zhu relative to <br />\r\nthe fourth quarter of madness therapy <br />\r\nSection V mental hospital birth of   the first section of the <br />\r\nthird chapter of the body, authority and discipline <br />\r\n\"non-physical\" punishment from torture to the <br />\r\nsecond power and the body of <br />\r\nthe third quarter of disciplinary power <br />\r\nof modern society with discipline means of the fourth quarter is the\r\n                fourth chapter of the disciplinary society discourse, words of knowledge, truth, discourse and power\r\n                the first section of \"sexual repression\" discourse and sexology\r\n                Section II Foucault\'s theory of power\r\n                section III powers Chapter V of',1,1,1,1353979334,1354071134,99,0,'WEI',0,'10.4236/ojpsych.2012.224051, November 27 2012',0),
	(18,'3345399687',2,'Contributeinfo','Contributeinfo','Contribute','20121127141437721.jpg','','Contributeinfo','ContributeiContributeinfonfo','Contributeinfo','Contribute','Contributeinfo','Contribute','Contributeinfo','Contributeinfo','Contributeinfo','Contributeinfo',1,1,1,1353996879,1354071136,99,1,'Contributeinfo',0,'Contributeinfo',0),
	(19,'1198099690',2,'utionsutions','utions','utions','20121127141500310.jpg','','utions','utions','utions','utions','utions','utions','utions','utions','utions','<span style=\"color:#FFFFFF;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:28px;white-space:normal;background-color:#FDA04E;\">utions</span>',1,1,1,1353996903,1354071118,99,1,'utions',0,'utions',0),
	(22,'7694207986',5,'American Journal of Plant Sciences  has been indexed by several world class databases, for more info','American Journal of Plant Sciences','AJPS','20121203095332360.png','','hello world','October 2012','951','sdfsfs','','556','','666-55-556-88','ISI Web of Knowledge\r\nThere are 14 citations for articles published in AJPS journal as of July, 2012 based on the ISI Web of Knowledge. Please click the following links to see the screenshot:\r\nscreenshot 1, screenshot 2','<p style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:0px;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:20px;white-space:normal;background-color:#FFFFFF;text-align:justify;\">\r\n	<span style=\"font-family:Verdana;\"><strong>American Journal of Plant Sciences</strong>&nbsp; has been indexed by several world class databases, for more information, please access the following links:<br />\r\n<br />\r\n</span> \r\n</p>\r\n<p style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:0px;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:20px;white-space:normal;background-color:#FFFFFF;text-align:justify;\">\r\n	<span style=\"font-family:Verdana;\"><strong>ISI Web of Knowledge<br />\r\n</strong>There are&nbsp;14 citations for articles published in&nbsp;AJPS journal as of July, 2012 based on the ISI Web of Knowledge. Please click the following links to see the screenshot:<br />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/ISI120705/AJPS-1.png\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">screenshot 1</a>,&nbsp;<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/ISI120705/AJPS-2.png\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">screenshot 2</a><br />\r\n<br />\r\n</span> \r\n</p>\r\n<p style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:0px;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:20px;white-space:normal;background-color:#FFFFFF;text-align:justify;\">\r\n	<span style=\"font-family:Verdana;\"><a target=\"_blank\" href=\"http://scholar.google.com/\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><strong>Google Scholar</strong></a><strong><br />\r\n</strong>There are&nbsp;40 citations for&nbsp;articles published in&nbsp;AJPS journal as of July, 2012 based on the statistics from Google Scholar.&nbsp;<strong>The Impact Factor (IF) is 0.19</strong>.<br />\r\n</span> \r\n</p>',1,1,1,1354079861,1354499621,99,0,'William Stephan, Louis J. Banas, Matthew Bennett, ',0,'10.4236/wjns.2012.24035, November 28 2012',0);

/*!40000 ALTER TABLE `xnfy520_yaomai_contribute` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_evaluate
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_evaluate`;

CREATE TABLE `xnfy520_yaomai_evaluate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `evaluate` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `details` text NOT NULL,
  `uid` int(11) unsigned NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `create_date` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table xnfy520_yaomai_favorites_commodity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_favorites_commodity`;

CREATE TABLE `xnfy520_yaomai_favorites_commodity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `by_user` int(10) unsigned NOT NULL,
  `by_commodity` int(10) unsigned NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `xnfy520_yaomai_favorites_commodity` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_favorites_commodity` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_favorites_commodity` (`id`, `by_user`, `by_commodity`, `create_date`)
VALUES
	(5,32,10012,1357697076),
	(7,32,10016,1358322514),
	(8,32,10002,1358322525);

/*!40000 ALTER TABLE `xnfy520_yaomai_favorites_commodity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_favorites_merchant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_favorites_merchant`;

CREATE TABLE `xnfy520_yaomai_favorites_merchant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `by_user` int(10) unsigned NOT NULL,
  `by_merchant` int(10) unsigned NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `xnfy520_yaomai_favorites_merchant` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_favorites_merchant` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_favorites_merchant` (`id`, `by_user`, `by_merchant`, `create_date`)
VALUES
	(11,32,69877664,1358324232),
	(12,32,69877665,1359017380);

/*!40000 ALTER TABLE `xnfy520_yaomai_favorites_merchant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_folk_custom_direction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_folk_custom_direction`;

CREATE TABLE `xnfy520_yaomai_folk_custom_direction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_folk_custom_direction` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_folk_custom_direction` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_folk_custom_direction` (`id`, `name`, `image`, `icon`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(10,'华北民俗','20130116112249459.jpg','20130116101456969.png','http://www.www.www',1,99,'wwwefwefwfwf',1358216659,1358306570),
	(11,'华东民俗','20130116112041523.jpeg','20130116101536641.png','http://333.33.33',1,99,'标准',1358220402,1358306443),
	(12,'华南民俗','20130116112053277.jpg','20130116101600646.png','',1,99,'',1358222169,1358306456),
	(13,'华中民俗','20130116112333617.jpg','20130116101616887.png','',1,99,'',1358222391,1358306615),
	(14,'西北民俗','20130116112111799.jpg','20130116101650920.png','',1,99,'',1358222402,1358306472),
	(15,'西南民俗','20130116112119690.jpg','20130116101705119.png','',1,99,'',1358222431,1358306480),
	(16,'东北民俗','20130116112126974.jpg','20130116101720423.png','',1,99,'',1358222467,1358306487);

/*!40000 ALTER TABLE `xnfy520_yaomai_folk_custom_direction` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_folk_custom_information
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_folk_custom_information`;

CREATE TABLE `xnfy520_yaomai_folk_custom_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `details` text,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_folk_custom_information` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_folk_custom_information` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_folk_custom_information` (`id`, `pid`, `cid`, `sid`, `name`, `publish`, `recommend`, `sort`, `details`, `views`, `create_date`, `modify_date`)
VALUES
	(31,10,18,1,'抗癌食物有哪些 内地癌症分布图引恐慌',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\"><strong>抗癌食物有哪些呢？</strong></span>\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——</span><a href=\"http://www.gdcct.com/product/5089.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\"><span style=\"margin:0px;padding:0px;\">南瓜</span></a></strong></span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　含极丰富的维生素Ａ、维生素Ｃ，还含有钙质和纤维素、色氨酸－Ｐ等，可预防肥胖、糖尿病、高血压和高胆固醇血症，是预防癌症的好食品。</span>\r\n</p>\r\n</span><span style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\"></span>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——紫薯</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　如果人体内活性氧和自由基产生过剩，就会引起肝功能障碍。日本科研人员发现，紫薯具有抗氧化和消除氧自由基的作用，因此可以减轻肝功能障碍。患有慢性肝炎等肝功能障碍的患者，不妨每天饮用100毫升左右紫薯汁，对肝功能的恢复有好处。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——麦麸</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　麦麸是小麦主要营养成分的仓库，含有Ｂ族维生素、硒、镁等矿物质，很多植物纤维。有利于防治大肠癌、糖尿病、高脂高胆固醇血症、便秘、痔疮等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——酸奶</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　荷兰国立癌症基金会进行的流行病学调查研究表明，每天饮用酸奶可有效预防乳腺癌。酸牛奶中高活性乳酸菌和嗜热链球菌的产物，具有干预人体内肠肝循环的功能。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">研究证实，对脂肪吸收量小的女性比脂肪吸收量多的女性患乳腺癌的机率少得多。此外，酸牛奶可以增加人体免疫球蛋白的数量，利于提高抗体的免疫功能，从而降低乳腺癌的发生。专家建议，女性应养成每天喝一杯酸奶的习惯。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——萝卜及胡萝卜</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　含有大量维生素Ｃ，胡萝卜还含有丰富的胡萝卜素，所以它们具有极好的防癌作用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——蘑菇</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　营养丰富，含有人体必需的氨基酸、多种维生素和矿物质，含硒和丰富的维生素Ｄ，能增强人体免疫力，有利于预防胃癌和食管癌。</span>\r\n</p>',5,1358315820,0),
	(27,10,18,1,'中医养生之道 肝脏排毒不好怎么办',1,1,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">肝脏排毒不好怎么办？中医指出，肝脏是人体内最大的解毒器官，体内产生的毒物、废物，吃进去的毒物、有损肝脏的药物等等都必须依靠肝脏解毒，如果肝脏排毒不好，体内就会积累很多毒素，身体健康也会受到影响。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>肝脏是否有毒的检查方法</strong></span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　1.指甲表面有凸起的棱线，或是向下凹陷。中医认为“肝主筋”，指甲是“筋”的一部分，所以毒素在肝脏蓄积时，指甲上会有明显的信号。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　2.偏头痛，脸部的两侧长痘痘，还会出现痛经。脸部两侧以及小腹，是肝经和它的搭档胆经的“一亩三分地”，一旦肝的排毒不畅快，自己的后院就会先着火。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　3.乳腺出现增生，经前乳腺的胀痛明显增加。乳腺属于肝经循行路线上的要塞，一旦肝经中有“毒”存在，乳腺增生随即产生，尤其在经血即将排出时，会因气血的充盛而变得胀痛明显。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　4.情绪容易抑郁。肝脏是体内调控情绪的脏器，一旦肝内的毒不能及时排出，阻塞气的运行，就会产生明显的不良情绪。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>肝脏排毒不好怎么办？</strong></span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　食疗养生方法：</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　1.<a href=\"http://www.gdcct.com/product/7113.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">枸杞</a>提升肝脏的耐受性。除了排毒之外，还应该提升肝脏抵抗毒素的能力。这种食物首推枸杞，它具有很好的保护肝脏的作用，可以提升肝脏对毒素的耐受性。食用时以咀嚼着吃最好，每天吃一小把。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　2.吃青色的食物。按中医五行理论，青色的食物可以通达肝气，起到很好的疏肝、解郁、缓解情绪作用，属于帮助肝脏排毒的食物。中医专家推荐青色的橘子或柠檬，连皮做成青橘果汁或是青柠檬水，直接饮用就好。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　3.吃用灵芝排毒法。灵芝能促进肝脏对药物、毒物的代谢，对于中毒性肝炎有确切的疗效。尤其是慢性肝炎，灵芝可明显消除头晕、乏力、恶心、肝区不适等症状，并可有效地改善肝功能，使各项指标趋于正常。所以，灵芝可用于治疗慢性中毒、各类慢性肝炎、肝硬化、肝功能障碍。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>肝脏排毒穴位</strong></span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　按压肝脏排毒要穴，是指太冲穴，位置在足背第一、二跖骨结合部之前的凹陷中。用拇指按揉3~5分钟，感觉轻微酸胀即可。不要用太大的力气，两只脚交替按压。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>其他：</strong></span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>眼泪排毒法</strong></span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　相较于从不哭泣的男人，女人寿命更长，这不能不说和眼泪有关系。中医早已有了这个认识，而且也被西方医学所证实。作为排泄液的泪液，同汗液和尿液一样，里面确实有一些对身体有害的生化毒素。所以，难受时、委屈时、压抑时就干脆哭出来吧。对于那些“乐天派”，周末的午后看一部悲情的电影，让泪水随着情节流淌也是一种主动排毒方式。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>改善肝脏供血</strong></span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　俗话说:\"肝藏血\"。意思是白天活动时，血流向四肢，晚上睡觉时，血藏于肝脏。这句话被现代的动物实验所证实，研究表明:直立体位时肝脏血流量减少40%。运动时肝脏血流量减少80-85%。因此平卧体位时肝脏供血较丰富。另外慢性肝炎也常导致肝血流降低，粘度增加。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>保持正常体重</strong></span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　体重过重会让肝脏工作更辛苦，罹患脂肪肝的机率也会升高。如果全身脂肪减少，肝脏的脂肪也会减少，甚至明显下降肝病病人升高的肝功能指数。“如果不是B肝或C肝带原者，一般人肝指数轻度升高，多为脂肪肝引起的，”台北荣总肠胃科主治医师黄以信说。理想减重方式就是均衡饮食加上规律运动。</span> \r\n</p>',6,1358241133,1358297774),
	(28,10,19,2,'养生常识 酸碱性食物分别有哪些？',1,1,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">真正的养生是要把握营养平衡，如何做到营养平衡，首先就要学会分辨酸碱性食物分别有哪些？只有注意所摄入的营养量是否过多过少，才能保持生理上的酸碱平衡，防止酸中毒。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　随着高速的经济发展，人们物质生活水平的提高，越来越多的人体处于酸性体质、酸碱失调的状态。因为人们日常生活里吃白米白面和肉类多了，吃蔬菜和<a href=\"http://www.gdcct.com/list/003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">水果</a>少了；吃油性和高脂肪含量的食品多了，喝碳酸性饮料多了，精神压力大了镲。多种原因，如不正常的饮食习惯、生活步调失调以及环境污染，都易使人们的体质变成酸性。随之而来的害处是，人体内很多生物酶的效率下降，免疫功能下降，导致容易被细菌或病毒感染；血液粘度上升，流动性下降，影响血液微循环的效率，容易引起心血管疾病等等，有研究显示大部分疾病易发于酸性体质的人身上。所以，平日应该好好关注所摄取的食物，是否有使人体有酸性过度的倾向。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么是酸性食物</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　进入机体的碳水化合物、蛋白质、脂肪等营养素是酸性物质，如猪肉、牛肉、鸡肉、鱼类、虾、鸡蛋黄、大米、大麦、小麦、糙米、紫菜、柿子等。这些食物在代谢过程中不断产生酸性物质，但都被血液中的缓冲物质所中和，不至于使人体内部环境呈酸性。同时机体每日排出大量的酸性物质，以维持体内酸碱平衡。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么是碱性食物</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　机体代谢产物中碱性物质较少，主要来自食物，如牛奶、鸡蛋白、大豆、小豆、豆腐、菠菜、黄瓜、茄子、胡萝卜、藕、洋葱、甘薯、土豆、海带、葡萄、香蕉、苹果、橘子、梨、西瓜、大蒜、茶叶、等碱性食物。它们在机体内被氧化分解为无机盐和气体，其中无机盐为可溶性物质，即成为碱性物质，能中和酸性物质，维持人体体液的正常酸碱平衡。</span>\r\n</p>',0,1358241249,0),
	(29,12,30,2,'抗癌食物有哪些 内地癌症分布图引恐慌',1,1,99,'<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\"><strong>抗癌食物有哪些呢？</strong></span> \r\n</p>\r\n<span style=\"white-space:normal;margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\"> \r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——</span><a href=\"http://www.gdcct.com/product/5089.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\"><span style=\"margin:0px;padding:0px;\">南瓜</span></a></strong></span> \r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　含极丰富的维生素Ａ、维生素Ｃ，还含有钙质和纤维素、色氨酸－Ｐ等，可预防肥胖、糖尿病、高血压和高胆固醇血症，是预防癌症的好食品。</span> \r\n</p>\r\n</span><span style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\"></span> \r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——紫薯</span></strong></span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　如果人体内活性氧和自由基产生过剩，就会引起肝功能障碍。日本科研人员发现，紫薯具有抗氧化和消除氧自由基的作用，因此可以减轻肝功能障碍。患有慢性肝炎等肝功能障碍的患者，不妨每天饮用100毫升左右紫薯汁，对肝功能的恢复有好处。</span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——麦麸</span></strong></span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　麦麸是小麦主要营养成分的仓库，含有Ｂ族维生素、硒、镁等矿物质，很多植物纤维。有利于防治大肠癌、糖尿病、高脂高胆固醇血症、便秘、痔疮等。</span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——酸奶</span></strong></span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　荷兰国立癌症基金会进行的流行病学调查研究表明，每天饮用酸奶可有效预防乳腺癌。酸牛奶中高活性乳酸菌和嗜热链球菌的产物，具有干预人体内肠肝循环的功能。</span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">研究证实，对脂肪吸收量小的女性比脂肪吸收量多的女性患乳腺癌的机率少得多。此外，酸牛奶可以增加人体免疫球蛋白的数量，利于提高抗体的免疫功能，从而降低乳腺癌的发生。专家建议，女性应养成每天喝一杯酸奶的习惯。</span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——萝卜及胡萝卜</span></strong></span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　含有大量维生素Ｃ，胡萝卜还含有丰富的胡萝卜素，所以它们具有极好的防癌作用。</span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">抗癌食物——蘑菇</span></strong></span> \r\n</p>\r\n<p style=\"white-space:normal;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　营养丰富，含有人体必需的氨基酸、多种维生素和矿物质，含硒和丰富的维生素Ｄ，能增强人体免疫力，有利于预防胃癌和食管癌。</span> \r\n</p>',0,1358241346,1358297692),
	(30,11,24,2,'大寒是哪天 大寒桃花开 “冬藏”转“春生”大寒是哪天 大寒桃花开 “冬藏”转“春生”',1,1,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">“大寒”是一年中的最后一个节气，每到这个时节，人们便开始忙着除旧布新，腌制年肴，准备年货，这个时候该怎么养生呢？大寒桃花开，大寒过后便是一年春开始，因此养生需由“冬藏”转“春生”。</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>大寒节气介绍</strong></span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　大寒是二十四节气之一。每年1月20日前&nbsp;后太阳到达黄经300°时为大寒。《月令七十二候集解》：“十二月中，解见前（小寒）。”《授时通考?天时》引《三礼义宗》：“大寒为中者，上形于小寒，故谓之大……寒气之逆极，故谓大寒。”这时寒潮南下频繁，是中国大部分地区一年中的最冷时期，风大，低温，地面积雪不化，呈现出冰天雪地、天寒地冻的严寒景象。这个时期，铁路、邮电、石油、海上运输等部门要特别注意及早采取预防大风降温、大雪等灾害性天气的措施。农业上要加强牲畜和越冬作物的防寒防冻。&nbsp;2013年的大寒是1月20日，大寒日该怎么养生呢？</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<br />\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">　　<strong>“冬藏”转“春生”</strong></span><span style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\"></span> \r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<br />\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　在冬季，如果能恰当地选择既美味，又具有补益身体的食物，无疑更易被接受。中医认为，冬季养生在饮食上首选温补类食物，比如：鸡肉、羊肉、牛肉等，其次可选一些平补类的食物，比如：莲子、芡实、苡仁、赤豆、大枣、银耳等。还可多吃点黄绿色的蔬菜，像：胡<a href=\"http://www.gdcct.com/product/5684.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">萝卜</a>、油菜、菠菜等。由于“大寒”时期又适逢春节，一般家庭都会准备丰富的节日食物，此时还要注意避免饥饱失调，同时也可多吃点具有健脾消滞功效的食物，如：淮山、山楂、柚子等，还可多喝点小米粥、健脾祛湿粥等进行调理。　　</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　“大寒”节气又是感冒等呼吸道疾病的高发期，适当多吃点温散风寒的食物，可防御风寒的侵扰。比如：在日常饮食中常用的生姜、大葱、辣椒、花椒、桂皮等，都具有发散风寒的功效。如果人因外感风寒轻度感冒时，还可选用“生姜加红糖水”来治疗，具有较好疗效。&nbsp;</span> \r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　大寒是二十四节气之尾，也是冬季即将结束之季，隐隐中已可感受到大地回春的迹象。因此大家养生需由“冬藏”转“春生”，荤素均匀，养好身体为来年做准备。</span> \r\n</p>',1,1358241375,1358297734),
	(32,10,18,1,'素食的好处有哪些 生菜女士菜叶裹胸来提倡',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">素食的好处有哪些呢？现代人高油脂、高蛋白的食用方式已经影响到他们的健康问题，适时的选择素食可让大家减轻身体的负担，帮助保持健康的身体。近日美国加州洛杉矶街头出现了“生菜女士”，“生菜女士”们用菜叶裹胸来提倡素食，也引起了大家对素食的注意。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>素食的好处有哪些？</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>营养均衡远离疾病</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<a href=\"http://www.gdcct.com/list/001003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">蔬菜</a>是纤维的基本来源，它把废物排出人体。肉类不含纤维。一项研究发现：人吃了高纤维食物得病的风险低于42%。保持丰富蔬菜饮食的人，对便秘、痔疮和痉挛性结肠等疾病的发病率往往较低。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>减轻身体负担远离毒素</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　我们的饮食中95%的农药残留来自于肉类、鱼类和奶类制品（据环保局估计）。特别是鱼类，含有致癌物（多氯联苯，DDT）和重金属（汞，砷，铅，镉），而且这些物质无法通过蒸煮或冷冻消除。肉类和奶类制品中也含有类固醇和激素。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　而水果和蔬菜的汁液中含有自然的植物化学物质可以帮助我们排毒。放弃肉类有助于清除体内那些使内脏系统超负荷工作而致病的毒素（环境污染物、农药、防腐剂）。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>节能保护环境&nbsp;</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　现在的肉食都是来自畜牧业，畜禽生长过程中要消耗几倍的粮食、草料和干净的淡水，饲料的加工、运输、投放、养殖场地的清洁、畜禽的屠宰、肉食的加工、包装、运输等等，要消耗很多能源。而我们的淡水资源、土地资源、石油、煤炭等能源越来越紧。生产过程中的碳排放以及肉食包装用的塑料材料还会造成严重的环境污染。我们减少肉食，就实现了节能减排。　&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>长寿防癌</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\">通过对很多长寿老人的采访都知道其实这些人是素食注意，通过调查也显示素食注意比经常吃肉的人寿命会长很多，中国人的饮食习惯其实在全球来讲是比较健康的，所以患上癌症或是心脏病的可能行相对较低。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>拥有好气色远离心脏病</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\">吃素食的好处中不可不说的就是改变人的气色，因为素食中的热量比较低，另外不太可能会心脏病或是高血压这类的疾病，因为</span><span style=\"margin:0px;padding:0px;\">不含蔬果饱和的脂肪酸和胆固醇，这样的饮食结构心脏是非常喜欢的，因为过高的脂肪和胆固醇会让人更容易患上心血管疾病。</span>\r\n</p>',0,1358315851,0),
	(33,10,18,1,'健康养生常识 脚部变化诊疾病',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">脚部的秘密你知道吗？脚部的很多穴位都是与身体相关的，下面就让小编教你一些健康养生常识，让你通过脚部的变化给自己诊断身体有哪些毛病，提早发现，及时弥补，防患于未然。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>1、寒脚</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　问题症结：这种情况多发生在女性身上。女性的核心身体温度会比男性低，所以即使她们很健康，对寒冷也会很敏感。40岁以上的女性如果有寒腿的现象，那可能是甲状腺功能不足，因为甲状腺会调节身体温度和新陈代谢。此外，循环不畅也是原因之一。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　解决办法：绝缘的天然材料保暖最管用。如果你有除了寒脚之外的健康问题，建议你去看医生。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>2、脚趾稍微下陷，有勺子形状的压痕</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　问题症结：这是贫血的表现。因为没有足够的血红蛋白(一种存在于运送氧的血细胞中的富含铁的<a href=\"http://www.gdcct.com/product/11092.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">蛋白质</a>)引起的。内部出血(如溃疡)或严重的月经不正常也可以引发贫血。贫血时，指甲也会出现相同的状况：颜色和甲床都会呈现苍白。而且指甲易碎，脚总是感到寒冷。疲劳是贫血的首要症状，其他症状包括站立时呼吸短促、头晕或头痛。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　解决办法：通过全血细胞计数检查可以诊断贫血。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>3、脚指甲厚重、发黄</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　问题症结：这是由指甲下面的霉菌感染而引起的。甲癣患者通常毫无知觉，所以会持续好几年都不会发觉。但是这种感染很快会波及到全部的脚趾甲甚至手指甲，导致指甲发出难闻的味道，颜色变深。糖尿病患者、有循环问题和免疫系统问题的人容易感染该疾病。如果老年人走路有问题，有时候也可能是这个问题，但是不易被人们发觉。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　解决办法：看专业的治脚的医生或经常去医生那里做治疗。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>4、无法治愈的脚掌疼痛</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　问题症结：这是糖尿病的主要表现。升高的血糖浓度会导致脚部神经的破坏，表现为由压力或不小心的摩擦而引起的刮伤、切伤或刺激。糖尿病的其他表现还有经常口渴、尿频、易疲劳、视力模糊、易饥饿或体重减轻。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　解决办法：马上治疗溃疡，并做个糖尿病的检查。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>5、脚关节疼痛</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　问题症结：风湿性关节炎，通常首先会被小关节如脚趾和手指节感受到的一种关节性病变，疼痛的同时通常伴有肿胀和僵硬，而且这种疼痛是对称性的。风湿性关节炎多发于女性，女性的患病率是男性的4倍。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　解决办法：需要做过全面检查来确定关节疼痛的原因。有很多药物和疗法可以治愈关节炎。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>6、大脚趾突然增大</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　问题症结：可能是痛风，这是关节炎的一种，通常由过多尿酸引起。尿酸通常存在于体温较低的身体部位，而全身体最凉快的地方莫过于离心脏最远的大脚趾。40到50岁的男性、绝经后的女性更易患有痛风。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　解决办法：向医生咨询通过饮食和药物治疗。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>7、双脚麻木</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　问题症结：双脚没有知觉，这是由周围神经病变引起的。周围神经病变有很多原因，但是两个首要原因是糖尿病和滥用酒精。化学疗法也是另一个原因。更严重的是这种麻木会延伸到手，让你感觉似乎戴着手套似的。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　解决办法：看医生，找出原因。虽然周围神经病变没有治疗方法，但是可以通过镇痛剂和抗抑郁药来缓解疼痛症状。</span>\r\n</p>',0,1358315870,0),
	(34,10,18,1,'小寒节气推介：4款冬季养生汤',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">小寒节气是最冷的节气，这样的气候怎样给自己御寒进补呢？小编推介4款适合冬季的养生汤，让你和你的家人一冬暖到春，来试试吧！</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">冬季养生汤——虫草花杞子猪瘦肉炖水鱼</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　功效：滋阴益气&nbsp;强身壮体</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　天气寒冷，助餐的汤饮上宜有强壮身体兼收敛镇静的功效，水鱼是我们传统名贵的水产品，它除了含有易吸收的铁外，还含有天然形态的对铁吸收有重要作用的维生素B12、叶酸、维生素B6等，对人的生长和激素代谢有重要作用的锌，大量对骨、齿生长有重要作用的钙等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　材料：虫草花30克、杞子20克、猪瘦肉50克、水鱼400克、生姜4片。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　烹制：水鱼由售者宰洗处理净，切块；杞子稍浸泡。一起下炖盅，加冷开水1250毫升(约5碗量)，加盖隔水炖约3小时，进饮方下盐，为3~4人用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">冬季养生汤——</span></strong></span><a href=\"http://www.gdcct.com/product/5648.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\"><span style=\"margin:0px;padding:0px;\"><strong>胡萝卜</strong></span></a><span style=\"margin:0px;padding:0px;\"><strong>排骨汤</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　功效：胡萝卜素可刺激人体新陈代谢，促进血液循环，维持呼吸道黏膜的完整性，保护气管、支气管和肺脏。β-胡萝卜素有强抗氧化能力，有间接防癌功效。内含大量的维生素A是修复肝脏的重要营养素，长期喝酒、熬夜、服药的人尤其需要补充。排骨肥瘦适宜，不会摄入过多胆固醇，并且还具有滋阴壮阳、益精补血的功效，内含的大量磷酸钙、骨胶原、骨黏蛋白等，为强身健体、补充钙质的好材料。陈皮有和中治胃、消食补气的功效，和大肉一起食用，平时怕吃油腻消化不良的人便也可享用了。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">冬季养生汤——淮杞圆肉炖乌鸡</span></strong></span><span style=\"margin:0px;padding:0px;\"></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	　　功效：可提高生理机能、延缓衰老、强筋健骨。对防治骨质疏松、佝偻病、妇女缺铁性贫血症等有明显功效。\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<br />\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　材料：桂圆肉6钱，淮山2两，枸杞1两，乌鸡半只，瘦肉4两</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　做法：桂圆泡水软化，乌鸡去头去屁股去皮去多余脂肪，切成两半，瘦肉同乌鸡一起川烫，锅中注入8分满水，水开后，放入所有材料，以大火煮20分钟，转至小火煮3小时40分钟即可。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<br />\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\"><strong>冬季养生汤——灵芝黄芪煲猪蹄筋</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\">功效：益气血&nbsp;通经络&nbsp;强筋骨</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\">冬季往往是风湿关节炎、类风湿关节炎等症的高发期。此类病症多为寒湿侵袭、痹阻经络关节所致。灵芝黄芪煲猪蹄筋有益气血、通经络、养心脾、强筋骨之功，尤宜此时多进饮。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\">材料：灵芝15克，黄芪20克，黄精、鸡血藤各18克(中药店有售)，猪蹄筋100克，生姜3片。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\">烹制：药材浸泡、洗净;猪蹄筋用温水浸泡，酒洗后，一起下瓦煲，加清水2000毫升(约8碗量)，武火滚沸后改为文火煲至2小时，下盐便可。为3人用，或1人1日分2次进饮。</span>\r\n</p>',0,1358315891,0),
	(35,10,18,1,'毛豆炒鸡蛋怎么做好吃',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<strong>毛豆炒鸡蛋怎么做好吃</strong>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	食材：毛豆200克、鸡蛋3个。\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	制作步骤：\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	1． 剥出毛豆米洗干净。\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	2． 锅中放少量清水，水开后加一小勺盐，然后将毛豆米倒入，煮3-4分钟后即可捞出。\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	3． 鸡蛋打散后加少许盐搅拌。\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	4． 炒锅洗净，烧干水分后倒入食用油烧热，加些生姜丝爆香，将煮好的毛豆米沥干水分后，倒入锅中，加盐炒一下。\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	5． 倒入鸡蛋液，绕锅底转一圈，等蛋液凝固了翻炒几下即可起锅。\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	　　这个冬天，吃了好多的肉食，偶尔也要让肠道洗洗澡，吃些清淡口味的。这道毛豆炒鸡蛋就非常合适。不知道毛豆炒鸡蛋怎么做好吃的朋友看了本文，想必也掌握了。\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<a href=\"http://news.gdcct.com/chufang\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">美食厨房</span></a><span style=\"margin:0px;padding:0px;color:#000000;\">还有很多好吃又容易烹饪的菜谱，还想学做菜的同学，停下你匆忙的脚步，学美食菜谱吧！！</span>\r\n</p>',0,1358315911,0),
	(36,10,18,2,'三招教您怎样挑选健康黑木耳',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;line-height:21px;\">最近阴霾天挺多，空气污染严重，不少朋友说要多吃黑木耳而。或许你还不知道吧？</span><span style=\"margin:0px;padding:0px;\">黑<a href=\"http://www.gdcct.com/product/5884.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">木耳</a>可有“素中之王”的美誉！顾名思义，黑木耳的营养与功效是十分高的。然而现在市面上一些黑心商家却经常会用墨汁将普通地耳染黑冒充黑木耳，在选购挑选木耳的时候，我们应该注意些什么呢？怎样才能挑选到健康的黑木耳呢？小编教你三招！</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;line-height:21px;\">　<b>　</b></span><span style=\"margin:0px;padding:0px;\"><b>第一招：辨颜色</b></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;line-height:21px;\">　　</span><span style=\"margin:0px;padding:0px;line-height:21px;\">黑木耳名字叫黑木耳，但颜色并非是越黑越好。我们在购买黑木耳的时候，要仔细观察黑木耳的颜色，通过颜色来区别真假。我们要知道，真正的黑木耳，它的正面是黑褐色的，并不是纯黑色，背面则是灰白色的，而普通地耳则是黄褐色。用硫酸镁浸泡过的木耳则两面都呈黑褐色</span>。<span style=\"margin:0px;padding:0px;\">因此黑木耳并非越黑越好。那些黑心商家</span><span style=\"margin:0px;padding:0px;line-height:21px;\">通常会将地耳倒入盛满热水的铁锅里，然后放入一定量的墨汁，这样就能够将原本黄褐色的地耳变成黑色的“黑木耳”。目前，这种假冒的黑木耳在网上销售较多，而销售真正黑木耳的网上商城并不多，仅村村通商城等少数几家商城。大家买回黑木耳之后，如果是</span><span style=\"margin:0px;padding:0px;line-height:21px;\">“加工”过的“黑木耳”，只要泡在清水中，就会发现水</span><span style=\"margin:0px;padding:0px;line-height:21px;\">很快</span><span style=\"margin:0px;padding:0px;line-height:21px;\">会变成墨黑色。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;line-height:21px;\">　　</span><span style=\"margin:0px;padding:0px;\"><b>第二招：闻气味</b></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;line-height:21px;\">　　第二招就是闻气味了。正常的</span><span style=\"margin:0px;padding:0px;line-height:21px;\">黑木耳气味十分自然，有股大自然的清香味，而那些掺假的木耳会觉得有股墨汁的腥臭味。那些黑心</span><span style=\"margin:0px;padding:0px;line-height:21px;\">商贩为欺骗顾客，一般都是使用普通地耳用墨汁浸泡之后冒充黑木耳。普通地耳是用锯末、秸秆撒上地耳菌人工繁殖的，甚至只要是潮湿的地方，它也能自我繁殖，根本说不上什么营养，成本十分低，一斤地耳顶多十几元。然而，地耳一经墨汁染色后就能摇身一变高富帅，成为“营养丰富”的“黑木耳”，价值也随之飙升，每斤五六十元不等。大家在购买的时候，一定要注意辨别。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;line-height:21px;\">　　</span><span style=\"margin:0px;padding:0px;line-height:21px;\"><b>第三招：尝口感</b></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;line-height:21px;\">　　还有就是</span><span style=\"margin:0px;padding:0px;line-height:21px;\">，由于黑木耳的吸溶性很强，很多其他物质，包括糖、盐等都能吸收进去。所以经常在粉尘环境下工作的人，要多吃黑木耳。最近网传，<a href=\"http://news.gdcct.com/shipin/201301/2972\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">黑木耳还可以防PM2.5</span></a>。然而，一些黑心的商贩会使用化学制剂硫酸镁浸泡以增加黑木耳的重量，这样一斤黑木耳能长“胖”两三斤。</span><span style=\"margin:0px;padding:0px;line-height:21px;\">真木耳嚼起来清香可口，而经过硫酸镁浸泡过的木耳又苦又涩，难以下咽。</span><span style=\"margin:0px;padding:0px;line-height:21px;\">硫酸镁</span><span style=\"margin:0px;padding:0px;line-height:21px;\">作为一种化学制剂，经常被作为泻药使用，法律规定是严禁添加到食品中去的。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;line-height:21px;\">　　看完这三招，你知道如何挑选黑木耳了吗？</span>\r\n</p>',0,1358315937,0),
	(37,10,18,2,'健康饮食小常识推介 人一生只能吃9吨？',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">最近网传：人一生只能吃9吨，吃完就先死。你相信这个说法吗？人到底吃多少怎样吃才健康？食尚资讯告诉你健康饮食小常识，让你健康长寿一辈子。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">传闻有道理吗？</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　中国传统谚语称“吃饭七分饱,健康活到老”，尽管“九吨论”不尽正确，但专家表示，这个段子客观上也提醒人们不要暴饮暴食。现代都市人的一大问题就是吃得太多太好，导致营养过剩，容易引发各种“富贵病”，如高血脂、高血压等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　来自英国伦敦大学健康与老龄化研究所一项最新的研究显示，少吃40%可以让你延寿20年，少吃对心血管疾病、癌症以及神经元退变等老年化疾病也相当有效。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">健康饮食小常识</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　现在开始思考自己的饮食习惯：你是减肥主义者么？你的饭量是否只有别人的几分之一？你是美食爱好者么？你是否看见美味的食物就控制不住自己的食欲呢？你是个应酬狂人么？你的饮食规律是否掌握在应酬对象的手里呢？……现代人对于吃有太多的无奈了，健康在这种无奈之中被理所当然&nbsp;的忽略了！事实上我们的身体每天需要多少营养和食物是比较稳定的，为了你的革命本钱，根据下面的公式计算一下自己每天的标准饭量吧！&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　从事低体力活动：标准体重×30＝所需热量（千卡）；&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　从事中等体力活动：标准体重×（35~40）＝所需热量（千卡）；&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　从事重体力活动：标准体重×（45~60）＝所需热量（千卡）&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家曾做过一个试验，将试验对象分为两组，一组事先由医生明确告知标准的进食量，而另一组毫不知情。在同样的就餐环境中，用一样大的碗盛饭，结果在两组人都自我感觉“吃饱了”的情况下，不知情的一组吃的食物大大超过了标准的膳食摄入量，事先有了标准的一组则饭量正常。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　这说明环境对人们的进食量有着很大的影响。这个环境可能是你餐具的大小，也可能是你就餐的气氛或者就餐的心情等等。虽然专家们总在告诫人们吃饭吃七八成饱就可以了，但是这个衡量的标准很主观，极易受到环境因素的影响。要改变这种感觉偏差也不难，可以预先算出自己的标准膳食摄入量，做到“心中有数”，这样不管是遇上“吃嘛嘛香”或“食欲不佳”，就可以“以不变应万变”，把握合理的饮食标准。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　一般人一天总共摄入1700千卡的热量就可以了，相当于5两左右米饭、半斤左右的肉、一斤左右的蔬菜和<a href=\"http://www.gdcct.com/list/003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">水果</span></a>。但从事不同职业的人，总热量有一些差别，具体而言，从事低体力活动：标准体重×30＝所需热量(千卡)；从事中等体力活动：标准体重×（35~40)＝所需热量(千卡)；从事重体力活动：标准体重×（45~60)＝所需热量(千卡)。(注：个人标准体重=身高(厘米)—105)&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　当然，这个主食数量还要和每天的活动量“挂上钩”，如果活动量多一些，就要相应增加主食量。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家教你控制饭量：&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　作为饮食营养学领域的著名学者，沃辛克教授在饮食与心理的关系方面进行了多年的研究。对于合理饮食、控制食欲和减少热量摄入等问题，他提出了如下建议：&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　1.在容积相同的前提下，用细长高挑的容器盛装食品要比用低矮粗壮的容器好，前者能够帮助人们控制食量，减少热量摄入。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　2.用透明容器盛装食物有利于防止多吃。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　3.将食物放在厨房、冰箱、食品柜等距离日常起居和工作场所较远的地方有利于控制食欲。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　4.购买食品时尽量避免一次性购入太多，以免造成“堆放”效应。因为人们看到食品较多时，就想尽快将其吃掉。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　5.有意制造单调、有序的视觉效果，避免“杂货店”效应。实验证明，人们在吃东西时，单调的食物颜色能限制食欲。另外，将不同食品分门别类地有序摆放比混合堆放好。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　6.在餐厅就餐时，不要被菜单上那些经过精巧构思的菜名吸引而提高内心的期望值。因为过高的期望会产生先入为主的效应，从而为随后的“大快朵颐”埋下伏笔。</span>\r\n</p>',0,1358315969,0),
	(38,10,18,2,'空腹能喝牛奶吗？什么食物不能空腹吃',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">人饿的时候就会看到什么都想往嘴里塞，但是有些食物不能空腹吃，空腹吃这些食物会造成身体的某些不适。有很多人都会提出疑问，空腹能喝<a href=\"http://www.gdcct.com/product/6027.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">牛奶</a>吗？什么食物不能空腹吃呢？</span>\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么不能空腹吃——牛奶、豆浆</strong></span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　这两种食物中含有大量的蛋白质，空腹饮用，蛋白质将“被迫”转化为热能消耗掉，起不到营养滋补作用。正确的饮用方法是与点心、面饼等含面粉的食品同食，或餐后两小时再喝，或睡前喝均可。</span>\r\n</p>\r\n</span><span style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\"></span>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么不能空腹吃——糖</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　糖是一种极易消化吸收的食品，空腹大量吃糖，人体短时间内不能分泌足够的胰岛素来维持血糖的正常值，使血液中的血糖骤然升高容易导致眼疾。而且糖属酸性食品，空腹吃糖还会破坏机体内的酸碱平衡和各种微生物的平衡，对健康不利。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么不能空腹吃——<a href=\"http://news.gdcct.com/jiankang/201211/2451\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">山楂 橘子</span></a></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　含有大量的有机酸、果酸、山楂酸、枸橼酸等，空腹食用，会使胃酸猛增，对胃黏膜造成不良刺激，使胃胀满、嗳气、吐酸水。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么不能空腹吃——大蒜</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　大蒜含有强烈辛辣味的大蒜素，空腹食蒜，会对胃黏膜、肠壁造成强烈的刺激，引起胃肠痉挛、绞痛。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么不能空腹吃——白薯</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　白薯中含有单宁和胶质，会刺激胃壁分泌更多胃酸，引起烧心等不适感。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么不能空腹吃——茶</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　空腹饮茶能稀释胃液，降低消化功能，还会引起“茶醉”，表现为心慌、头晕、头痛、乏力、站立不稳等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么不能空腹吃——白酒</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　空腹饮酒会刺激胃黏膜，久之易引起胃炎、胃溃疡等疾病。另外，人空腹时，本身血糖就低，此时饮酒，人体很快出现低血糖，脑组织会因缺乏葡萄糖的供应而发生功能性障碍，出现头晕、心悸、出冷汗及饥饿感，严重者会发生低血糖昏迷。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>什么不能空腹吃——酸奶</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　空腹饮用酸奶，会使酸奶的保健作用减弱，而饭后两小时饮用，或睡前喝，既有滋补保健、促进消化作用，又有排气通便作用。<a href=\"http://news.gdcct.com/jiankang/201212/2376\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">酸奶有最佳的饮用时间</span></a>。</span>\r\n</p>',0,1358315986,0),
	(39,10,18,2,'大雾天气危害大 权威医生防护六对策',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">近日，大雾天气席卷全国各地，多地PM2.5指数直逼最大值，空气质量达到六级严重污染，这样的大雾天气也给大家带去了各种疾病，大雾天气危害大，如何防护最重要，权威医生教你六对策。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">对策一：戴口罩</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　戴口罩是大家第一个能想到的办法。如果天气指标是超过PM2.5。面对仅2.5微米的小颗粒，普通的棉纱口罩除了挡挡灰尘和心理作用外，基本起不到什么作用，无论你戴了多厚的棉纱口罩。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家建议，在选择N95口罩要买正规合格的，同时要戴一下，买与自己脸型大小匹配的型号，要最大程度地贴紧皮肤，让污染颗粒不能进入。N95口罩不能洗，取下后，要等里面干燥后再对折收起来了，以免呼吸的潮气让口罩滋生细菌。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　老年人和有心血管疾病的人要避免佩戴，因为其为专业抗病毒气溶胶口罩，密闭性好，戴上后容易呼吸困难，缺氧而感到头昏，同时年青人也不宜佩戴时间过长，当感觉不适时就要及时取下来。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">对策二：</span><a href=\"http://news.gdcct.com/chufang/201301/2982\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">清肺汤对抗大雾天气</span></a></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　空气有毒，除了要戴口罩、紧闭门窗、多在身边放一些绿色植物等措施以外，多喝清肺汤也成了重点，猪血<a href=\"http://www.gdcct.com/product/5884.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\"><span style=\"margin:0px;padding:0px;\">木耳</span></a>清肺汤、润肺银耳羹、川贝炖雪梨、雪耳百合排骨汤等都是不错的选择。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">对策三：进入室内必做三件事</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　雾霾天必须要出门的话，进入室内后就要将附着在我们身体上的霾及时清理掉，以防止PM2.5对人体的危害。清理的方法很简单，做三件事：洗脸、漱口、清理鼻腔。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　洗脸最好用温水，可以将附着在皮肤上的阴霾颗粒有效清洁干净；漱口的目的是清除附着在口腔的脏东西；最关键的是清理鼻腔。专家教给大家一个简单易学的清理鼻腔的方法：洗净双手后，捧温水，用鼻子轻轻吸水并迅速擤鼻涕，反复几次，鼻腔的脏东西就全部清理干净了。值得注意的是，清理鼻腔时，一定要轻轻吸水，避免呛咳。家长在给儿童清理鼻腔时，可以用干净棉签蘸水，反复清洗。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">对策四：别抽烟了</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　环保组织达尔问自然求知社曾发布《北京部分餐厅室内烟草烟雾污染情况报告》显示，在没有禁烟规定的餐厅和实施部分区域禁烟的餐厅中，PM2.5浓度平均值约为全面禁烟餐厅的2倍。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　卷烟、雪茄和烟斗在不完全燃烧的情况下会产生很多微小的颗粒物，悬浮在空气中，有害物质就附着在这些细颗粒物上。这是烟草烟雾的主要成分。这些颗粒绝大部分直径只有1微米左右，属于PM2.5的范畴。烟草烟雾含有7000多种化合物，其中包括69种致癌物和172种有害物质。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　所以，这种天气下，烟民们就不要再雪上加霜了。</span>\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">对策五：有心脑血管、呼吸系统疾病的人更要少出门</span></strong></span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　这种天气，减少出门是自我保护最有效的办法，尤其是有心脑血管、呼吸系统疾病的人群，更要尽量少出门。老年人要取消晨练。老人和孩子最好在家中休息、娱乐，等到灰霾散去，出太阳后再出门。</span>\r\n</p>\r\n</span><span style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\"></span>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">对策六：外出尽量别骑车</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　这两天，习惯骑车上班或出门的人，尽量就改换别的交通工具，实在不行，那就骑慢一点。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　骑车时尽量避开早上交通拥挤的高峰期，因为汽车排出的废气里有很多没有完全燃烧透的化学元素，随着空气里面细小颗粒漂浮着，骑车时，是要让肺过度地去代偿，给身体器官供氧，需要吸入更大量空气，在这种天气下，空气是被严重污染的，骑车越快，吸入的化学成份越多。所以，这两天，实在要骑车出门的话，就不要着急，尽量避开车多的路段。</span>\r\n</p>',0,1358316006,0),
	(40,10,18,2,'警惕冬季进补饮食误区',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">民间盛传“冬天补一补&nbsp;，三春可擒虎”，冬季进补没有错，但是要补得恰当，如果一不小心走进冬季进补饮食误区，不仅擒不到老虎，还会搭上自己的性命，因此，冬季进补需谨慎。冬季进补有哪些饮食误区呢？</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">误区一：多多益善</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　任何补药服用过量都有害，“多吃补药，有病治病，无病强身”的说法是很不科学的。过量进补会加重脾胃、肝脏负担。夏季人们常吃冷饮、冷冻食品，多有脾胃功能减弱的现象。入秋即大量进补，会骤然加重脾胃及肝脏的负担，使长期处于疲弱的消化器官难以承受，导致消化系统功能紊乱。如过量服用参茸类补品还可引起腹胀、不思饮食等副作用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">误区二：地域不分“滥补”</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　我国幅员辽阔，地理环境各异，人们生活方式不同，同属冬季，西北地区与东南沿海地区的气候迥然有别。因此，专家指出，千万不要地域不分“滥补”。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　冬季的西北、东北地区天气寒冷，进补宜大温大热之味，如羊肉、狗肉、鹿肉等，补品中如人参酒、参茸酒等，强壮补身，御寒助阳确有作用。</span><span style=\"margin:0px;padding:0px;\">而长江以南地区虽已入冬，但气温较北方地区要温和的多，进补宜清淡甘温之味，如鸡、鸭、鹅等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家提醒，长江以南地区的人们如果多食羊肉、狗肉、鹿肉等容易燥热动火，出现咽痛、口疮、鼻出血等症状。雨量较少且气候偏燥的地带，也是少用为佳，应以干润生津之品如百合、荸荠、莲藕、梨等果蔬为宜。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">误区三：凡补必肉</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　夏季过后，脾胃尚未完全恢复到正常功能，因此过于油腻的食物不易消化吸收。另外，肉类消化过程中的某些“副产品”，以及过多的脂肪、糖类等往往是心脑血管病等老年常见病、多发病的病因。但饮食清淡也不是不补，尤其是<a href=\"http://www.gdcct.com/list/001003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\"><span style=\"margin:0px;padding:0px;\">蔬菜</span></a>类更不容忽视。所以，秋冬季在适当食用牛肉、羊肉进补的同时，不应忽视蔬菜和水果，它们可以为人体提供多种维生素和微量元素。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">误区四：补得太早</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　中医认为，最好的进补时间是从“冬至”开始，到“三九”结束，一共27天。这时进补可以为来年春天预防传染病、增进体质打下基础。但很多人一进立冬，就已经迫不及待地开始进补，这时天气还非常干燥，补多了很容易破坏身体气血平衡。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　<strong><span style=\"margin:0px;padding:0px;\">　误区五：虚实不分</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　进补要先分清自身体质，中医的治疗原则是虚者进补，不是虚症病人不宜进补，要辨证施补。即使是虚证，也有气虚、血虚、阳虚、阴虚之分，人体器官又有心虚、肺虚、肝虚、脾虚、肾虚等不同，进补前最好先向专业医生咨询，结合各种补药的性能特点，对症施用。如热性体质者就不适合服用人参、鹿茸、海马等温热性的药物。</span>\r\n</p>',0,1358316020,0),
	(41,10,18,2,'手机进水了怎么办?可用吹风机吹吗?',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">裤兜里的手机一不小心“洗了个澡”，手机进水了怎么办？如果处理不当，你心爱的手机就要报废了，怎么才能有效的抢救你的进水手机呢？可用吹风机吹吗？食尚资讯详细步骤帮你抢救进水手机。</span>\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>一、&nbsp;在断电的情况下掉进没有腐蚀性的液体</strong>。这种情况基本可以认定机器没有损坏。但是可能液晶屏会比较难看。&nbsp;</span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　1&nbsp;用力甩干，但别把机器甩掉。&nbsp;</span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　2&nbsp;如果液晶屏上没有什么痕迹，按第一点的第3条处理。&nbsp;</span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　3&nbsp;如果屏幕上有东西残留并且很严重，千万不要按第一点第3条处理，因为这样处理后的电子电路虽然能够正常工作，但屏幕可能挺难看的。可送到就近的维修部处理或自行动手拆开机器清理。&nbsp;</span>\r\n</p>\r\n</span><span style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\"></span>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>二、&nbsp;在通电的情况下掉进清水，这种情况一般不需要拆机处理。&nbsp;</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　1&nbsp;尽快断电。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　2&nbsp;用力甩干，但别把机器甩掉，主意要把屏幕内的水甩出来。如果屏幕残留有水滴，干后会有痕迹。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　3&nbsp;放在台灯，射灯等轻微热源下让水分慢慢散去。这个过程需要六个小时以上。切勿心急使用电吹风等强热源。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　经过这三步处理后，接通电源基本可以正常工作了。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>三、&nbsp;在通电的时候掉进非清水，或不管是否通电掉入腐蚀性液体或粘稠的液体或其它部清洁的液体。</strong>这种情况最麻烦了。但是适当处理后机器复原的机会也是很大的。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　1&nbsp;尽快断电</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　2&nbsp;如果是掉入腐蚀性液体（如海水），马上把机器用清水冲洗。或者把机器浸入清水中并设法把内部的腐蚀性液体稀析。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　3&nbsp;尽快拆开机器。但拆机的时候要慢慢来。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　4&nbsp;用酒精或者专业的洗机水清洗干净。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　5&nbsp;拼装。或者把你拆开的东西整堆交给维修点。让维修点为你再次清理以及拼装。</span>\r\n</p>',0,1358316038,0),
	(42,10,18,2,'中国古代的酒文化',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<span style=\"margin:0px;padding:0px;\">中国酿酒、饮酒的历史悠久，从考古发掘看，大约在五千年前的龙山文化早期，已开始用谷物酿酒。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<span style=\"margin:0px;padding:0px;\">古人用“甘露”、“玉液”、“琼浆”称呼酒，用“酒龙”、“酒神”、“酒仙”等称呼会喝酒的人，足见人们对酒的喜爱程度。平日就餐饮酒，可以调节心理平衡；佳节良辰，亲朋相聚，欢宴共饮，可以交流思想，密切关系；亲朋远去，以酒饯行，可表依依深情；客自远方来，备酒接风洗尘，略表款款厚意；适逢知己，千杯恨少；将士出征，以酒壮行；凯旋归来，以酒庆功；喜事临门，以酒庆贺……总之，事事处处离不开<span style=\"margin:0px;padding:0px;color:red;\"><a href=\"http://www.gdcct.com/list/009006/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">酒水</span></a></span></span><span style=\"margin:0px;padding:0px;\">。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<b>祭祀、丧葬与酒</b>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<span style=\"margin:0px;padding:0px;\">从远古以来，酒是祭祀时的必备用品之一。我国各民族普遍都有用酒祭祀祖先，在丧葬时用酒举行一些仪式的习俗。人死后，亲朋好友都要来吊祭死者，汉族的习俗是</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">吃斋饭</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，也有的地方称为吃</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">豆腐饭</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，这就是葬礼期间的举办的酒席。虽然都是吃素，但酒还是必不可少的。有的少数民族则在吊丧时持酒肉前往，如苗族人家听到丧信后，同寨的人一般都要赠送丧家几斤酒及其大米，香烛等物，亲戚送的酒物则更多些，如女婿要送二十来斤白酒，一头猪。丧家则要设酒宴招待吊者。云南怒江地区的怒族，村中若有人病亡，各户带酒前来吊丧，巫师灌酒于死者嘴内，众人各饮一杯酒，称此为</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">离别酒</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">。汉族人在清明节为死者上坟，必带酒肉。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<b>婚姻与酒</b>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<span style=\"margin:0px;padding:0px;\">南方的</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">女儿酒</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，最早记载为晋人嵇含所著的《方草木状》说南方人生下女儿才数岁，便开始酿酒，酿成酒后，埋藏于池塘底部，待女儿出嫁之时才取出供宾客饮用。装酒的坛子雕上各种花卉图案，人物鸟兽，山水亭榭，等到女儿出嫁时，取出酒坛，请画匠用油彩画出</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">百戏</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，如</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">八仙过海</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">龙凤呈祥</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">嫦娥奔月</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">等，并配以吉祥如意，花好月圆的</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">彩头</span><span style=\"margin:0px;padding:0px;\">\"\"</span><span style=\"margin:0px;padding:0px;\">喜酒</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，往往是婚礼的代名词，置办喜酒即办婚事，去喝喜酒，也就是去参加婚礼。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">交杯酒</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，是我国婚礼程序中的一个传统仪节，在唐代即有交杯酒这一名称，到了宋代，在礼仪上，盛行用彩丝将两只酒杯相联，并绾成同心结之类的彩结，夫妻互饮一盏，或夫妻传饮，表示夫妻相爱。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">回门酒</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，结婚的第二天，新婚夫妇要</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">回门</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，即回到娘家探望长辈，娘家要置宴款待，俗称</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">回门酒</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">。回门酒只设午餐一顿，酒后夫妻双双回家。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<b>劝酒</b>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;text-indent:21pt;\">\r\n	<span style=\"margin:0px;padding:0px;\">中国人的好客，在酒席上发挥得淋沥尽致。人与人的感情交流往往在敬酒时得到升华。中国人敬酒时，往往都想对方多喝点酒，以表示自己尽到了主人之谊，客人喝得越多，主人就越高兴，说明客人看得起自己，如果客人不喝酒，主人就会觉和有失面子。有人总结到，劝人饮酒有如下几种方式：</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">文敬</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">、</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">武敬</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">、</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">罚敬</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">。这些做法有其淳朴民风遗存的一面，也有一定的负作用。</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">文敬</span><span style=\"margin:0px;padding:0px;\">\"</span><span style=\"margin:0px;padding:0px;\">，是传统酒德的一种体现，也即有礼有节地劝客人饮酒。酒席开始，主人往往在讲上几句话后，便开始了第一次敬酒。这时，宾主都要起立，主人先将杯中的酒一饮而尽，并将空酒杯口朝下，说明自己已经喝完，以示对客人的尊重。客人一般也要喝完。在席间，主人往往还分别到各桌去敬酒。</span>\r\n</p>',0,1358316059,0),
	(43,10,18,2,'有口臭怎么办？4个饮食小偏方来帮你',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">对外而言，口臭会影响人际交往，对自己而言，口臭可能是你身体产生毛病发出的警报，有口臭怎么办？你知道口臭是由什么引起的吗？下面就让小编教你4个饮食小偏方，帮你解决口臭困扰。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">口臭产生的原因：</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　不少人都以为口臭仅是口腔的问题，却不知，口臭的真正原因，很有可能是身体内其它疾病而引起的症状。口臭主要是从体内发出的一种气味，很明显的反应了身体内在的情况表现，那么就一起来具体了解，哪些情况易导致出现口臭。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　便秘：食物中有很多无法被人体吸收的残渣、毒素、沙砾等有害物质，这些物质进入肠道后很容易引起便秘的发生，便秘会导致肠道内的残渣无法正常的排出，使人体污浊之气不能顺利下行，侵蚀脏腑功能，从而从口中散发出一股难闻的气味。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　人体内机体失调：当身体出现内分泌失调或者脾胃该能失调则会导致积食不化，宿食停滞，而产生一些有害物质及细菌，使肠胃内的秽浊之气横冲直上，污染到口腔环境，导致口升异味。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　火气大：生活没有规律、饮食不规律、压力大等，随着生活水平的提高，一些快捷的东西也越来越接近人们的生活，而这些不健康的生活习惯都容易导致体内肝火旺盛，而引起出现口臭。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">去除口臭饮食小偏方</span></strong></span><span style=\"margin:0px;padding:0px;\"><strong>：药膳粥</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　藿香粥：将藿香加入米中煮粥，有清除口臭，并兼有治脾胃、吐逆及开胃进食之效。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　麦门冬粥：将麦冬加入米中煮粥，重在养阴，有治潮热、口干、心烦之功效。适合阴虚口臭患者。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　薄荷粥：将薄荷加入米中煮粥，有通关节利咽喉，令人口香之功。清除口臭兼有止痰漱、发汗、消食、下气、去舌苔之效。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\"><strong><span style=\"margin:0px;padding:0px;\">　　去除口臭饮食小偏方</span><span style=\"margin:0px;padding:0px;\">：</span><span style=\"margin:0px;padding:0px;\">茶</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<a href=\"http://www.gdcct.com/product/8579.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">茉莉花茶</span></a>薄荷茶：用茉莉花、薄荷(叶)开水冲泡，清热利咽，有芳香除臭作用。</span><span style=\"margin:0px;padding:0px;\"></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　大黄茶：清热解毒，泻下作用。适用于有便秘、口干、口臭、目赤、喉痛患者。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　藿香茶：藿香用开水冲泡，适合口气重，有健脾胃消积滞作用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<strong><span style=\"margin:0px;padding:0px;\">　　去除口臭饮食小偏方</span><span style=\"margin:0px;padding:0px;\">：</span></strong><span style=\"margin:0px;padding:0px;\">多摄取蜂蜜</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　蜂蜜具有非常好的通肠润肺、化消去腐的作用，对于治疗便秘有非常好的功效，对便秘引起的口臭具有非常好的帮助，女性多食用，还能起到淡斑养颜的效果。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<strong><span style=\"margin:0px;padding:0px;\">　　去除口臭饮食小偏方</span><span style=\"margin:0px;padding:0px;\">：</span><span style=\"margin:0px;padding:0px;\">多摄取新鲜的水果蔬菜</span></strong>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<strong>　　</strong><span style=\"margin:0px;padding:0px;\">新鲜的水果蔬菜中不仅含有各种丰富的矿物质以及维生素，帮助补充身体所需营养外，还能有效帮助减少便秘的发生，帮助清新口气。</span>\r\n</p>',0,1358316136,0),
	(44,10,18,2,'高血压病患的饮食与注意事项',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">近年来高血压病患者越来越小龄化，大家平时有注意自己的饮食吗？高血压病患者又如何通过饮食控制病情，高血压病患的饮食与注意事项你知道多少呢？</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>日常饮食如何预防高血压？</strong></span>\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>1.适量摄入蛋白质</strong></span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　蛋白质的适量摄入对有效的调控血压是功不可没的所以高血压的饮食要适量补充体内所需的蛋白质。高血压病人每日蛋白质的量以每公斤体重1克为宜，其中植物蛋白应占50%最好用大豆蛋白。大豆蛋白虽无降压作用，但能防止脑中风的发生。每周还应吃两三次鱼类蛋白质，可改善血管弹性和通透性，增加尿、钠排出，从而降低血压。这也是重要的高血压的饮食搭配。</span>\r\n</p>\r\n</span><span style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\"></span>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>2.限制脂肪的摄入</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　过多脂肪的摄入会在很大程度上使患者的血压进一步升高，对有效的缓解病情非常不利，所以高血压的饮食要限制膳食中动物脂肪的摄入，烹调时，多采用<a href=\"http://www.gdcct.com/list/004/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">植物油</a>，胆固醇限制在每日三百毫克以下。可多吃一些鱼，海鱼含有不饱和脂肪酸，能使胆固醇氧化，从而降低血浆胆固醇，还可延长血小板的凝聚，抑制血栓形成，预防中风，还含有较多的亚油酸，对增加微血管的弹性，预防血管破裂，防止高血压并发症有一定作用。这是常见的高血压的饮食搭配要求。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><a href=\"http://news.gdcct.com/jiankang/201301/1376\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">高血压病患不能吃什么</span></a>？</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　高血压患者不能吃油腻和辛辣的食物。常见的辛辣食物有葱、大蒜、生姜、芥末、韭菜、辣椒、桂皮、八角、洋葱等，高血压患者尤其不能食用辣椒。辣椒属于热性食物，倘若高血压患者有发热、便秘、疼痛等症状，食用辣椒后会加重症状，抵消降压药物起到的疗效。</span>\r\n</p>',14,1358316151,0),
	(45,10,18,2,'宝宝消化不良饮食该怎么办？',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">宝宝消化不良饮食该怎么办？是很多妈妈关心的问题！宝宝消化不良，主要是由于饮食不当引起，所以应该调节饮食，尽量要少食多餐有原则，辅食要软烂易消化，可多给宝宝喝粥。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>宝宝消化不良的主要原因：</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　宝宝消化不良是婴幼儿最常见的胃肠道疾病。宝宝消化不良根本原因是免疫功能差，对病毒细菌的抵抗力弱，当肠道受到感染时，便很容易感染消化不良。同时，如果宝宝喂食太多，造成积食也会引起宝宝消化不良，另外，过敏体质，感冒等也会伴有消化不良的症状。宝宝急性消化不良期间，要适当短期禁食，一般不超过8小时。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>如何预防宝宝消化不良</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>1.注意食物搭配</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　妈妈在宝宝的日常饮食中，要特别的注意食物之间的合理搭配，并不是所有的食物都可以搭配食用的。对于消化不良腹泻的宝宝而言，蛋白质与淀粉、<a href=\"http://www.gdcct.com/list/001003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">蔬菜</a>与水果都不是有益的搭配，同时牛奶最好不要与三餐同用，以免影响到肠胃的正常功能。除此之外还有糖与蛋白质或淀粉，这些食物也最好不要一块食用，否则的话会导致宝宝腹泻的情况更加严重。对付胃肠胀气</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　还有很多宝宝在腹泻期间还会因此而导致出现胀气的情况，专家提醒，当气体产生过多，可用一新鲜柠檬榨成汁加约1.14升的温水让宝宝喝下，这样可以有效的平衡体内的ph值。在小儿消化不良腹泻的时候，妈妈还要注意食物的卫生，否则的话小儿腹泻的情况会更加的严重。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>2.<a href=\"http://news.gdcct.com/jiankang/201212/2742\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">禁忌的食物</span></a></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　在宝宝腹泻的期间妈妈还要特别的注意一些禁忌的食物，有些食物是不适合宝宝在腹泻期间食用的。比如像精制的糖类、面包、蛋糕、通心粉、乳制品等，除此之外还有像蕃茄、青椒、碳酸饮料、洋芋片、垃圾食物、油炸食物、辛辣食物等，这些食物在宝宝腹泻期间必须要禁止食用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　同时妈妈还要注意，宝宝腹泻的时候应该尽量的多吃清淡的食物，对于一些多盐的食物也要注意避免食用。像加工食品、垃圾食物等食物中都含有大量的盐，食用后会刺激粘膜分泌过量，从而导致蛋白质消化不良。同时对于花生、扁豆及大豆等食物在宝宝腹泻期间也要注意减少食用，以免导致胀气的情况。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>3.保持饮食均衡</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　妈妈要注意，在日常生活中一定要注意让宝宝养成均衡的饮食习惯，这样不仅能够有效的预防以及治疗消化不良腹泻的情况，同时还有利于宝宝更好的生长发育。在保持饮食均衡的基础上，妈妈还要注意让宝宝多吃一些富含有纤维素的食物，日入像新鲜水果蔬菜及全麦等谷类等，这些食物中所含有的纤维素可有效的调节宝宝的肠胃，让其更加正常的工作。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　但是在腹泻期间要注意，这些富含有纤维素的食物要尽量的避免食用，以免导致腹泻的情况更加的严重。同时在日常的饮食中，还要让宝宝养成细嚼慢咽的饮食习惯，这样也有利于宝宝肠胃功能的健康，千万不要狼吞虎咽。</span>\r\n</p>',0,1358316171,0),
	(46,10,18,2,'小心！如何鉴别过期一次性筷子',1,1,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">在中国吃饭夹<a href=\"http://www.gdcct.com/list/001003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\"><span style=\"margin:0px;padding:0px;\">蔬菜</span></a>怎少得了筷子呢？在外用餐很多人都选择使用所谓“卫生、方便”的一次性筷子，可是这些一次性筷子就一定卫生吗？一次性筷子也有保质期，所以大家要小心，如何鉴别发霉一次性筷子呢？</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">使用霉变筷子会诱发肝癌</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　据专家介绍，一次性筷子时间长了会滋生各种霉菌，如果长期使用霉变的一次性筷子，轻者可能导致感染性腹泻、呕吐等消化系统疾病。严重发霉的筷子会滋生“黄曲霉素”，该物质已经被广泛认定可诱发肝癌。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家还提醒说，不少市民在吃面时喜欢将筷子放在煮面的汤里烫一烫，认为可以起到彻底杀菌的作用，其实这样杀菌的效果是很有限。筷子只有在100℃的沸水里煮5分钟以上，才能达到理想的杀菌效果，较理想的杀菌方式是使用高温消毒柜。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　此外，与一次性筷子相比，家用筷子更容易变质。因为家用筷子使用的频率高，且长期用水洗涤，导致筷子的含水量特别高，很容易成为细菌生长的温床。如黄色葡萄球菌、大肠杆菌等。长期将筷子摆放在橱柜内，则可能让筷子变质的几率提高五倍以上。一般来说，筷子使用半年就应该更新换代了。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">如何鉴别过期一次性筷子？</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　首先，在拿到一次性筷子时，一定先要观察它的外包装。包装上是否印有生产厂家的名称、商标及联系方式。那些注明高温消毒、颜色过白的一次性筷子是不可信的；</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　其次，还要看一下筷子的颜色，质量过关的筷子颜色均匀，不会出现过黑、过黄的现象。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　最后，一定要闻一下筷子的气味，如果筷子上有股酸酸的硫磺气味，那么最好还是不要使用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　那么，如何才能在使用一次性筷子时不“中毒”呢&nbsp;?&nbsp;最简单的方法就是用凉水清洗筷子表面，减少残留的二氧化硫。再者，就是彻底杜绝这种百害无一利的一次性筷子，自带餐具，最好是能够杀菌消毒的。现在市面上有很多抗菌类的不锈钢餐具，这种能够抵挡细菌的餐具对于经常外出就餐的人来说是非常必要的。而一种从里到外全是用能够抗菌的不锈钢制成的朗维抗菌不锈钢餐具或许是您的上佳选择。餐具中没有任何危害身体的元素，对容易滋生的大肠杆菌、金黄色葡萄球菌杀菌率也是达到99%以上。市场中不乏滥竽充数的抗菌餐具，建议大家在购买的时候一定要认准品牌。</span>\r\n</p>',0,1358316185,1358321919),
	(47,10,18,2,'鱼翅是什么?鱼翅也有健康隐患',1,1,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">近日香港一处厂房楼顶出现“鱼翅盖楼”，这一“景观”着实惊讶到大家了，鱼翅是什么呢？这昂贵的鱼翅就一定有营养吗？其实鱼翅也有健康隐患。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">鱼翅是什么？</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　鲨鱼翅在民间通常以“鱼翅”简称。作为中国传统的名贵食品之一，始见于《宋会要》，是山珍海味中的一种，“鲍参翅肚”中的“翅”所指的正是鱼翅。鱼翅以鲨鱼的鳍制成，通常<a href=\"http://www.gdcct.com/product/6503.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\"><span style=\"margin:0px;padding:0px;\">煲鸡汤</span></a>时可加入，一起煮成鱼翅羹。有说中国人食用鱼翅的习惯源于郑和。《本草纲目》载“（鲛鱼）背上有鬣，腹下有翅，味并肥美，南人珍之”，香港则为目前全球最大的鱼翅转口站及销售点。日本亦有生产人造鱼翅（素翅）。鲨鱼翅本身无味且营养价值不高，但由于人们长时间捕杀鲨鱼获取鱼翅，如今鲨鱼已经因此岌岌可危，这对海洋平衡产生了负面影响。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">研究发现&nbsp;</span></strong></span><span style=\"margin:0px;padding:0px;\"><strong>吃鱼翅抗癌不科学</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\">有书写道：鲨鱼是世界上惟一不患癌症的动物，其体内含有的角鲨烯有抗癌作用。自此，鲨鱼软骨会抗癌的说法通过书籍、文章、网站和销售商广为流传。但是，科学家在2000年就发现鲨鱼也会得癌症。2000年3月6日路透社的消息报道，美国科学家约翰·哈斯巴格在美国第91届的美国抗癌学会年会上指出，鲨鱼是会患癌症的。哈斯巴格是任职于美国国家癌症机构的学者，他发现了软骨鱼类所患的40种癌症，其中有23种癌症是来自于各种鲨鱼，他推翻了以前关于鲨鱼不长癌的说法，鲨鱼其实还是会长癌的，其中有些还是直接长在软骨中，所以鱼翅抗癌说令人怀疑。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　而且，也有一些学者认为，就算鲨鱼不会得人类所患的某种癌症，也不能因此而断定鲨鱼制品能够治疗人类的癌症。又比如说，猫和马并不会得前列腺癌，那么吃了猫和马的前列腺是否就能够预防前列腺癌？研究表明这是不可能的。无论如何，鲨鱼是会长癌的，企图以吃昂贵鲨鱼骨粉来抗癌的消费者要三思了。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　<strong><span style=\"margin:0px;padding:0px;\">　鲨鱼体内聚积汞</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　近年，根据泰国、澳大利亚、新西兰和丹麦等国家的科研人员对一些鲨鱼鱼翅进行详细调查分析，发现鱼翅中含有大量的汞，食用后危害相当严重。尤其是孕妇，若摄入过多，不仅可导致流产、死胎，会影响幸存胎儿大脑和神经细胞的生长，使他们患上“先天性水俣病”，此病因多发于日本水俣湾而得名。轻者患儿的注意力、记忆力、语言能力和脑的其他功能发育迟延；重则可导致幼儿发育不良、智力低下、畸形，甚至脑瘫痪死亡。科学家还提醒，即使母亲摄入的汞不多，胎儿的发育也可能发生迟延。即便非妊娠期的育龄妇女，摄入多量的甲基汞也不利优生，严重的可导致不育。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　对上述严重后果，绝大部分食客并不知情。研究认为，鱼翅之所以含有多量汞，主要来自鲨鱼的生活环境海水的污染。实验表明，水体中的汞极易在微生物作用下，转化为吸收率高、毒性较强、易溶于水的甲基汞。甲基汞能在水中迅速扩散，并在水生生物中逐级累积，而鲨鱼处于食物链最高层位，所以甲基汞会最终大量积聚在其体内。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　因此，专家告诫人们：“当你花高价买来鱼翅想大补一次时，买回的可能只是对自身的伤害。”</span>\r\n</p>',3,1358316206,1358321925),
	(48,10,18,2,'偏头痛吃什么好 病患饮食需注意',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">偏头痛吃什么好，病患饮食需注意。偏头痛不好受，痛起来真要命，偏头痛了怎么办？日常饮食需注意，从饮食下手，减少疾病带给自己的痛楚。</span>\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　偏头痛是由于头部血管收缩功能紊乱导致的疾病，中青年人的发病率约占10%，以女性居多。偏头痛的发作有很多因素，包括家族遗传、神经系统及环境因素等。早在上世纪60年代，国外研究人员就发现，不少偏头痛与饮食习惯有密不可分的联系，称为“饮食性偏头痛”。</span>\r\n</p>\r\n</span><span style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\"></span>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>偏头痛吃什么好？</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>1.记录饮食日记，找出根源</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　找出引起偏头痛的食物并非易事，因为实际情况因人而异，不同的人对食物的反应也不同。为解决这个问题，可以尝试记录饮食日记，按时间顺序写下每天摄入的食物名称，一旦头痛发作，可以从之前24小时内的记录中锁定“嫌疑者”，重复几次，就能找到真正的“罪魁祸首”。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>2.适量补充有益的营养成分</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　瘦肉、谷类、<a href=\"http://www.gdcct.com/product/5847.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">黄豆</a>、花生等属于B族维生素，能保护心血管和神经系统，舒解压力、缓和情绪。研究表明，每晚摄入3毫克B族维生素，能使偏头痛的发病率降低约50%。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　猕猴桃、芥菜等果蔬含有丰富的维生素C，具有良好的抗氧化功效，能维持紧张状态下正常的人体代谢，有利于减轻因情绪紧张诱发的偏头痛。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　谷类、花椰菜、豆腐以及坚果，如葵花子、杏仁、腰果、榛子等，富含微量元素镁，具有松弛肌肉、舒张血管的作用。“美国头痛基金会”建议，偏头痛患者应每天补充500～750毫克镁。值得注意的是，过量摄入镁元素会引起腹泻。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　<strong>　偏头痛需远离的食物</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　(1)含高酪胺的食物，如咖啡，巧克力，奶制品。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　(2)动物脂肪，其诱发偏头痛占全部食物因素的49.8%，严格控制此为食物可防止偏头痛发作。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　(3)酒精饮料：特别是红色葡萄酒，白酒，柠檬汁，柑橘，冰淇淋等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　(4)牛肉香肠，肉类腌制品，酱油等。</span>\r\n</p>',0,1358316227,0),
	(49,10,18,2,'毒胶囊到底有多大危害　赵普毒胶囊事件持续发酵',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">毒胶囊事件持续发酵，央视主持人赵普首次回应毒胶囊事件，赵普表示，整个工业明胶产业链被曝光，肯定触动一些人、一些利益集团的利益。13种毒胶囊有哪些？毒胶囊到底有多大危害呢？</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>13种毒胶囊有哪些？</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　青海省格拉丹东药业脑康泰胶囊110820439.064mg/kg&nbsp;　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　青海省格拉丹东药业愈伤灵胶囊10082053.46mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　长春海外制药盆炎净胶囊2011020115.22mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　长春海外制药苍耳子鼻炎胶囊2011090317.65mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　长春海外制药&nbsp;通便灵胶囊2010060137.26mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　丹东市通远药业人工牛黄甲硝唑胶囊2011120310.48mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　吉林省辉南天宇药业抗病毒胶囊0911023.54mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　四川蜀中制药阿莫西林胶囊1201012.69mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　四川蜀中制药&nbsp;诺氟沙星胶囊09110123.58&nbsp;mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　修正药业羚羊感冒胶囊1009014.44mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　通化金马药业清热通淋胶囊2011100787.57mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　通化盛和药业胃康灵胶囊11100351.45mg/kg　　</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　通化颐生药业炎立消胶囊110601181.54mg/kg</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>毒胶囊到底有多大危害</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　中国毒理学会副理事长、军事医学科学院毒物药物研究所研究员廖明阳表示，铬有毒性，但从现有资料和报道来看，“铬超标胶囊”一般不会引起人体铬急性中毒和慢性铬蓄积。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　廖明阳说，人体内有三价铬和六价铬，三价铬、六价铬摄入到体内是一个氧化还原的过程。国内外的大量研究资料证明，三价铬的毒性比较小，而六价铬如果长时间、大剂量摄入的话，可以引起肾脏损害，还可能有致突变、致癌等作用。人体铬的主要排泄是通过肾脏排泄。一般来说，一个健康成年人每天通过肾脏排放铬的能力可达到约0.2毫克。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　他说：“从现有有关铬的安全性资料、报道中的胶囊铬最大含量以及病人每天摄入的胶囊数来看，一般认为不会引起人体铬急性中毒和慢性铬蓄积。不过，对企业这种违法行为我们要严厉谴责，也希望国家主管部门对此依法严肃处理，确保人们用药安全。”</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　人体每天摄入多少铬是安全的？中国疾病预防控制中心营养所研究员、卫生部微量元素营养重点实验室主任杨晓光表示，从营养学来讲，铬是人体必需的微量元素，缺了铬可能在血糖控制等方面都会出问题。中国营养学会制定的中国居民膳食营养素参考摄入量里，推荐每天铬摄入量为儿童0.01毫克、成年人0.05毫克，同时还制定了安全最大可耐受剂量，即儿童每人每天0.2毫克、成年人0.5毫克。也就是说，在这个范围以下是安全的，超过这个范围就可能对机体产生不良影响。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　国家药典委员会首席专家钱忠直说，对于铬的测定，美国药典和日本药典都没有规定，欧洲药典规定是10毫克／千克，而我们中国药典规定的是2毫克／千克，实际上就是要杜绝工业皮革的下脚料混入制造胶囊的原料，把铬作为标记物来控制工业明胶的混入。目前中国药典的空心胶囊的标准，可以说是最严格的标准。</span>\r\n</p>',0,1358316280,0),
	(50,10,18,2,'蛇年运程大解析 周公解梦梦见蛇',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">2013年快到了，蛇年还远吗？你想知道蛇年的运程吗？蛇年梦见蛇是凶兆还是吉兆呢，又代表了什么意思？周公解梦帮你解开蛇年梦见蛇的谜团。来年好运哦！</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>周公解梦原版有关蛇的内容如下：</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　龙蛇杀人主大凶，蛇咬人主得大财，蛇入怀中生贵子，蛇行水内主迁荣</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　龙蛇入门主得财，龙蛇入灶有官至，蛇化龙行贵人助，妇人见龙生贵子，</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\">蛇随人去妻外心，蛇入谷道主口舌，蛇绕身者生贵子，蛇多者主阴司事</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　鸟走蛇来人引荐；乌蛇践物失禄位；龟蛇相同主生财</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　蛇赤黑主口舌吉，蛇黄白主有官事；</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\"><strong>现代释梦：</strong></span>\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;梦见一对蛇&nbsp;——&nbsp;很快会分家。</span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;商人梦见一对蛇&nbsp;——&nbsp;能发大财。</span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;梦见蛇咬你自己&nbsp;——&nbsp;要交好运，生活会丰裕。</span>\r\n</p>\r\n</span><span style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\"></span>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;女人梦见蛇，并把它抱在怀里，预示会喜得贵子。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;女人梦见一条死蛇在咬自己，表示有人打着朋友的幌子恶意陷害她。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;女人梦见自己的手指被蛇咬出血，暗示梦者自己和孩子都有可能会病倒，平常要注意饮食健康，要荤素平衡，多吃<a href=\"http://www.gdcct.com/list/001003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">蔬菜</a>和水果；</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;梦见蛇咬自己妻子&nbsp;——&nbsp;是不祥之兆，会遇到忧愁不幸。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;梦见敌人被蛇咬伤&nbsp;——&nbsp;敌人会互相残杀，最后两败俱伤。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;梦见打死蛇&nbsp;——&nbsp;能征服敌人。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;梦见蛇钻进洞里&nbsp;——&nbsp;家里会被偷窃或被劫。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;梦见蛇捕捉老鼠或青蛙&nbsp;——&nbsp;会有不幸的消息。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　·&nbsp;梦见蛇与猫争斗&nbsp;——&nbsp;所有的灾难都会过去</span>\r\n</p>',6,1358316302,0),
	(51,10,18,2,'长期喝酒有危害　禁酒令颁得好',1,1,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">又到一年年末了，寒冷的天气少不了喝<a href=\"http://www.gdcct.com/list/009006/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">酒</a>助兴这一环节，而日前中央军委却下发通知，明确要求不安排宴请，不喝酒，不上高档菜肴。此“禁酒令”一出，小编不禁拍手叫好，禁酒令颁得好啊，喝酒有危害，身体最重要。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>喝酒的危害</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>１、铜墙铁胃也敌不过烈酒三杯</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　不用怀疑，一次超量饮酒就会引发急性胃炎的不适症状，而连续大量摄取酒精，则势必会引起更严重的慢性胃炎和胃溃疡。即使你一向以钢铁胃着称，宿醉之后仍能龙腾虎跃，但酒精也会秉承滴水穿石的坚持精神，相信我们，伤害的出现只是时间早晚问题。</span>\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>2、结石和痛风：</strong></span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　有关资料还表明，萎缩性胃炎、泌尿系统结石等患者，大量喝酒会导致旧病复发或加重病情。这是因为酿造酒的大麦芽汁中含有钙、草酸、乌核苷酸和嘌呤核苷酸等，它们相互作用，能使人体中的尿酸量增加一倍多，不但促进胆肾结石形成，而且可诱发痛风症。</span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>3、胃肠炎：</strong></span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　大量喝酒，使胃黏膜受损，造成胃炎和消化性溃疡，出现上腹不适、食欲不振、腹胀和反酸等症状。</span>\r\n</p>\r\n</span><span style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\"></span>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>4、酒精对大脑攻击</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　酒精除了过分锻炼了你的肝脏机能以外，对大脑的伤害也是明显的。想想每次宿醉醒来，那要命的头痛晕眩就是最好的证明。实际上，过量酒精会让大脑皮质萎缩，造成大脑功能障碍和意识障碍等。而长期过量饮酒则会造成慢性酒精中毒，表现为性格改变，精神异常，定向力差，记忆力减退等。都说酒精是兴奋剂，其实是最大的误解，酒精的作用根本就是在麻痹大脑，假使你不想提前出现老年痴呆症状，那就给自己定时定量吧。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>5、比心更易受伤的，是肝！</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　相信我们不说你也知道，饮酒过量最受伤的莫过于肝脏。因为酒精在体内90％以上是通过肝脏代谢的，其代谢产物及它所造成的肝细胞代谢紊乱，是引起酒精性肝损伤的主因。据研究，正常人平均天天喝下40克-80克酒精，10年即可出现酒精性肝病，如平均天天喝下160克，8-10年就可发生肝硬化！。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>6、男人的“大事”</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　小酌怡情，豪饮却是不折不扣的“性”趣杀手，过量饮入的酒精会使男性血中睾丸酮水平下降，性欲减退，还可以通过毒害睾丸等生殖器官，降低雄性激素水平，并且通过造成肝功能异常，引起对雌性激素的灭活作用降低，致使雌性激素蓄积、雄性激素削弱，让男人从此“难振雄风”。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>7、最后，甚至不放过你的下一代</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　除了袭击你的性能力，酗酒还会毫不留情地对珍贵的精子“痛下杀手”。英国科学家最近发现酒中含有的8-prenylnaringenin（异戊二烯基三羟黄烷酮）可以模仿雌性激素的功能，影响精子的行动能力，生育能力也因而大打折扣。即便受到酒精损伤的精子使卵子受孕，也有可能会生出畸形怪胎或“婴儿酒综合症”病人。这样的孩子爱哭闹、智力差，长大后也易酒精成瘾。由于爸爸常在周末喝得醉醺醺的，因而这样的孩子也被称为“星期天婴儿”。想成为新好爸爸的你请从此在消遣列表上删除豪饮这一项。</span>\r\n</p>',2,1358316321,1358321917),
	(52,10,18,2,'圣诞节由来及习俗 圣诞节的饮食文化',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">你知道圣诞节的由来及习俗吗？那你又知道圣诞节有什么样的饮食文化吗？圣诞节你有错过这些美食吗？下面就跟小编一起走进西方国家的这个传统节日看个究竟吧！</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>圣诞节的由来&nbsp;</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　确实年份虽然已无从考察，但大多数考古学家都认为应该是在划分世纪的那一年（即公元前一年），只不过正确的出生日期无法确定。因此早期的基督教徒便以罗马帝国时期的密司拉教派，在每年一二月二十五日纪念太阳神诞辰的第一天定为【圣诞节】。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　所以圣诞节在宗教上是基督教徒纪念耶诞生的一个重要节日。&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　根据圣经的记载，耶稣诞生在犹太的一座小城－－伯利恒。马利亚，也就是耶稣的母亲，因圣灵的感动而怀孕，在梦中天使加百列向她显现，告诉她，她将要生下神的儿子，他要被称为耶稣。就在与丈夫约瑟返往家乡时，所有的旅店客满，因此马利亚被迫在马槽生下耶稣。遥远的东方有三博士得到神的启示，追随天上的一颗明亮星星找到了耶稣，俯伏拜他，揭开宝盒，拿出黄金、乳香、没药为礼物献给他。在伯特利野地的牧差人也听到天使的声音从天上发出，向他们款耶稣降生的佳音。&nbsp;</span>\r\n</p>\r\n<span style=\"margin:0px;padding:0px;color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n<p>\r\n	　　<strong>圣诞节习俗</strong>\r\n</p>\r\n<p>\r\n	　　西方人以红、绿、白三色为圣诞色，圣诞节来临时家家户户都要用圣诞色来装饰。红色的有圣诞花和圣诞蜡烛。绿色的是圣诞树。它是圣诞节的主要装饰品，用砍伐来的杉、柏一类呈塔形的常青树装饰而成。上面悬挂着五颜六色的彩灯、礼物和纸花，还点燃着圣诞蜡烛。\r\n</p>\r\n<p>\r\n	　　红色与白色相映成趣的是圣诞老人，他是圣诞节活动中最受欢迎的人物。西方儿童在圣诞夜临睡之前，要在壁炉前或枕头旁放上一只袜子，等候圣诞老人在他们入睡后把礼物放在袜子内。在西方，扮演圣诞老人也是一种习俗。\r\n</p>\r\n<p>\r\n	　　圣诞习俗数量众多，包括世俗，宗教，国家，圣诞相关，国与国之间差别很大。大部分人熟悉的圣诞符号及活动，如圣诞树，圣诞火腿，圣诞柴，冬青，槲寄生以及互赠礼物，都是基督教传教士从早期Asatru异教的冬至假日Yule里吸收而来。对冬至的庆祝早在基督教到达北欧之前就在那里广为进行了，今天圣诞节一词在斯堪的纳维亚语里依然是异教的jul（或yule）。圣诞树被认为最早出现在德国。\r\n</p>\r\n<p>\r\n	　　教宗额我略一世没有试图去禁止流行的异教节日，而是允许基督教的教士对它们赋予基督教的意义重新解释，他允许了大部分的习俗继续存在，只是稍加修正，甚至保持原样。宗教及政府当局与庆祝者之间的交易使圣诞节得以继续。在基督教神权统治繁荣的地区，如克伦威尔治下的英格兰和早期新英格兰殖民地，庆祝活动是被禁止的3。在俄国革命后，圣诞庆祝被苏联苏维埃共产党政权禁止了75年。即使在现今一些基督教派里，例如耶和华见证人、一些基要派和清教徒组织，仍旧把圣诞节看作没有圣经认可的异教徒节日，并拒绝庆祝。\r\n</p>\r\n<p>\r\n	　　自从圣诞庆祝习俗在北欧流行后，结合着北半球冬季的圣诞装饰和圣诞老人神话出现了。\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>圣诞节的饮食文化</strong></span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　圣诞节必吃火<a href=\"http://www.gdcct.com/product/4281.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">鸡</a>的风俗在西方已有300多年的历史了。据说在1602年的圣诞节，大批来自西方的移民抵达美洲大陆。当时，那里物产贫乏，只有遍布山野的火鸡，于是他们便捉火鸡作为过节的主菜。因此圣诞大餐里，除了火腿、蔬菜、葡萄干布丁、水果饼、鸡尾酒之外，也少不了火鸡。&nbsp;西方人的圣诞大餐是烤鹅，而非火鸡。奥大利人爱在平安夜里，全家老小约上亲友成群结队地到餐馆去吃一顿圣诞大餐，其中，火鸡、腊鸡、烧牛仔肉和猪腿必不可少，同时伴以名酒。更多各国<a href=\"http://news.gdcct.com/meishi/201212/2736\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">圣诞节</span><span style=\"margin:0px;padding:0px;color:#0000FF;\">特色美食</span></a>文化分享。</span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>圣诞节的意义&nbsp;</strong></span>\r\n</p>\r\n<p>\r\n	<span style=\"margin:0px;padding:0px;\">　　圣诞节对传统的基督徒来说，是在庆祝耶稣的诞生。他们会在圣诞节的早上去做圣诞礼拜，以纪念耶稣和发扬基督的精神。不过一般的人已把它看成一种大众化的民俗活动，是一个大家分享彼此对於家人、朋友甚至於他人的爱与关怀的日子。它也象徵著人们对於仁爱、喜乐、和平、忍耐、感恩、银善、信实、温柔以及节制的期望。印象中，圣诞节似乎应该在皑皑白雪中度过的节日，但是有趣的是，对住在南半球的人门，例甘澳洲或南美洲的人们而言，圣诞节可是夏日的节庆呦！</span>\r\n</p>\r\n</span>',0,1358316382,0),
	(53,10,18,2,'日本诺如病毒感染者死亡 如何预防受感染',1,1,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">日本诺如病毒疫情来势汹汹，已引起6名病患死亡，近日刚刚抵达美国南部海港的“皇冠公主”号豪华邮轮上有96名乘客和6名船员感染诺如病毒，引发肠胃不适，症状主要是呕吐、腹泻和发烧。诺如病毒感染者的饮食需要注意什么呢？如何预防受感染？</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>诺如病毒感染者的症状</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　诺如病毒感染引起胃肠炎，胃肠炎是指胃、小肠和大肠的炎症。胃肠炎的症状是恶心、呕吐、腹部痉挛性腹泻。部分人主诉有头痛、发热、寒战、肌肉疼痛。症状通常持续1-2天。普遍感到病情严重，一日多次剧烈呕吐。症状一般摄入病毒后24-48小时出现，但是暴露后12小时也可能出现症状。没有证据表明感染者能成为长期病毒携带者，但是从发病到康复后2周感染者的粪便和呕吐物中可以检出病毒。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>怎样预防受诺如病毒感染</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>首先要了解传播方式——诺如病毒如何传播</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　感染者粪便和呕吐物中可以发现诺如病毒，主要是通过几种方式感染诺如病毒：</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　食用诺如病毒污染的食物或饮用诺如病毒污染的饮料；</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　接触诺如病毒污染的物体或表面，然后手接触到口；</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　直接接触到感染者(如照顾病人，与病人同餐或使用相同的餐具)。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　食物和饮料很容易被诺如病毒污染，因为病毒很小，而且摄入不到100个病毒就能使人发病。食物可以被污染的手、呕吐物或粪便污染的物体表面直接污染，或者通过附近呕吐物细小飞沫污染。尽管病毒在人体外很难繁殖，但是一旦存在食品或水中，就能引起疾病。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　有些食品在送至饭店或商店前可能被污染。一些暴发是由于食用从污染的水中捕获的牡蛎。其它产品如色拉和冰冻水果也可能在来源地被污染。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>为什么诺如病毒感染对食品加工者很重要？</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　患诺如病毒性胃肠炎的食品加工者对其它人更加危险，因为其它很多人食用他们加工的<a href=\"http://www.gdcct.com/list/008/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">食品饮料</a>。因为病毒很小，患病的食品加工者很容易污染加工的食物。其它食用污染食物的人可能生病，引起暴发。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">诺如病毒性胃肠炎暴发发生在饭店、游船、育儿室、医院、学校、宴会厅、夏令营和家庭聚餐，即那些食用由他人加工水、食物的地方。据估计半数的食物相关的疾病暴发由诺如病毒引起。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>诺如病毒性胃肠炎能治愈吗？</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　病程自限，一般为2～3天，恢复后无后遗症。然而不能喝足够多水来补充呕吐、腹泻丢失水分的人可能出现脱水，需要特殊的医学观察。这些人包括儿童、年老者和不能自理的所有年龄段人。</span>\r\n</p>',0,1358316398,1358321922),
	(54,10,18,2,'塑化剂是什么 塑化剂的危害 酱油醋也含塑化剂？',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">塑化剂是什么，塑化剂的危害，<a href=\"http://www.gdcct.com/product/7713.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\"><span style=\"margin:0px;padding:0px;\">酱油</span></a>醋也含塑化剂？近日一条关于酱油醋含塑化剂的微博再次掀起了塑化剂风波。塑化剂也由白酒行业延伸至酱油醋。我们的日常饮食也不安全了？塑化剂是否存在于我们的日常调料中呢？</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">塑化剂是什么</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　塑化剂（plasticizer），又称增塑剂、可塑剂，种类多达百余种，使用最普遍的是一群称为邻苯二甲酸酯类的化合物，常温下为无色透明的油状液体，难溶于水易溶于有机溶剂，它可以增加材料的柔软性，常常使用在不同的对象上，其效果也不相同，越软的塑料成品所需添加的塑化剂越多。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">塑化剂的危害</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　塑化剂毒性胜过三聚氰胺20倍！塑化剂会造成基因毒性，会伤害人类基因，长期食用对心血管系统危害最大，对肝脏和泌尿系统也有很大伤害，而且被毒害之后，还会透过基因遗传给下一代。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　塑化剂DEHP的作用类似于人工荷尔蒙，会危害男性生殖能力并促使女性性早熟，长期大量摄取会导致肝癌。由于幼儿正处于内分泌系统生殖系统发育期，DEHP对幼儿带来的潜在危害会更大。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　1、可能会造成小孩性别错乱，包括生殖器变短小、性征不明显。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　2、邻苯二甲酸酯可能影响胎儿和婴幼儿体内荷尔蒙分泌，引发激素失调，有可能导致儿童性早熟。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　除了违法添加在食品，还有没有哪些地方有塑化剂？</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">塑化剂存在环境中许多地方，包括：</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　1.&nbsp;塑胶制品：被加在塑胶容器、塑胶袋、保鲜膜、泡面的油包、塑胶拼接地板、电线塑胶外皮或塑胶材质的医疗用品等塑胶制品中；塑化剂会经由食品外包装或保鲜膜之塑胶包材或容器渗出而污染食物，或在微波、蒸煮、加热或盛装油脂含量较高的食物时，更易渗出而污染食物，亦会逸散于空气中，冷凝后吸附于室内灰尘。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　2.&nbsp;定香剂：被用来作「定香剂」，可存在于有香味的化妆品、保养品或卫浴用品中等；</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　3.&nbsp;制药：用于药品与保健食品的膜衣、胶囊、悬浮液&nbsp;……&nbsp;等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><span style=\"margin:0px;padding:0px;\">在日常生活中注意以下几个方面，可以避免塑化剂的污染：</span></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　1.&nbsp;少塑胶：</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　(1).&nbsp;少喝市售&nbsp;塑胶杯&nbsp;装的饮料，尽量使用不锈钢杯或马克杯。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　(2).&nbsp;少用&nbsp;塑胶袋、塑胶容器、塑胶膜&nbsp;盛装热食或微波加热；超商购买的便当若包装有塑胶盒或薄膜，要避免高温微波，或另以瓷器或玻璃器皿盛装后再加热。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　(3).&nbsp;少用保鲜膜进行微波或蒸煮，也不要用以包装油性食物。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　(4).&nbsp;少让儿童在&nbsp;塑胶巧拼地板&nbsp;上吃东西、玩耍、睡觉。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　(5).&nbsp;不给儿童未标示「不含塑化剂」的&nbsp;塑胶玩具、奶嘴&nbsp;。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　2.&nbsp;少香味&nbsp;：减少使用含香料的化妆品、保养品、个人卫生用品等，例如香水，香味较强的口红、乳霜、指甲油、妊娠霜、洗发精、香皂、洗衣剂、厨房卫浴之清洁用品等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　3.&nbsp;少吃不必要的保健食品或药品&nbsp;。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　4.&nbsp;少吃加工食品&nbsp;，例如：加工的果汁、果冻、零食，各种含人工馅料的蛋糕、点心、饼干等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　5.&nbsp;少吃动物脂肪、油脂类、内脏&nbsp;。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　6.&nbsp;多洗手&nbsp;，尤其是吃东西前，洗掉手上所沾的塑化剂。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　7.&nbsp;多喝白开水&nbsp;，取代瓶装饮料、市售冷饮或含糖饮料。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　8.&nbsp;多吃天然新鲜蔬果&nbsp;（已知可以加速塑化剂排出）。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　9.&nbsp;多运动&nbsp;，例如健走、跑步，加速新陈代谢。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　10&nbsp;喝母乳&nbsp;，避免使用安抚奶嘴。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong><a href=\"http://news.gdcct.com/shipin/201212/2807\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">酱油醋是否存在塑化剂</span></a></strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　日前，《国际金融报》记者走访上海家乐福、卜蜂莲花等多家大型商超后发现，在市场上销售的几十种酱油、醋等产品中，并没有标明塑化剂的含量。但在记者所留意观察的数十种塑料包装的瓶装与袋装调味品中，只有黄花园与乌江涪陵榨菜(002507,股吧)旗下的几款调味品，在其外包装上写明了“食用品塑料包装生产许可编号”或“包装生产许可证号”。</span>\r\n</p>',0,1358316416,0),
	(55,10,18,2,'风吹雪花飘 寒冬孕妇能不能吃火锅',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">不知不觉已过冬至，风吹雪花飘，天气越来越冷，寒冬中吃点火锅，方便又暖身，但是孕妇能不能吃火锅呢？医生叮嘱各位准妈妈，吃火锅可致胎儿畸形，孕妇们要小心哦！</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>孕妇能吃火锅吗</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　对于孕妇这样的特殊群体能不能吃火锅的问题一直有争论，不少孕妈妈也很疑惑到底孕妇能不能吃火锅。专家称，孕妇并不是完全不能吃火锅，可以适当吃火锅，但要注意吃火锅的次数，尽量少吃。并且，孕妇在吃火锅时有诸多注意事项。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>孕妇要少吃火锅的原因</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　平时我们吃火锅，高脂肪的肉类从未少过，还有一些豆制品以及<a href=\"http://www.gdcct.com/list/001003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">蔬菜</a>等。肉类脂肪多，吃多了易肥胖，而涮肉的汤汁中嘌呤含量很高。据医生介绍，高嘌呤、高脂肪、高热量食物如果摄取过多，对健康人的肾脏会产生一定的副作用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　火锅原料是羊肉、牛肉、猪肉甚至狗肉，这些生肉片中都可能含有弓形虫的幼虫以及其他家畜或家禽的寄生虫，肉眼看不见。吃火锅时如果不把肉食彻底煮熟，人食用后可能会受到寄生虫的传染，也给母体造成危害。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　火锅汤料往往口味较重，有的还是中药火锅，孕妇怀孕早期的饮食应以清淡为主，整个怀孕期间都应避免中药性质的的饮食。另外，吃火锅时经常生熟食混在一起，可能诱发消化道炎症或肠寄生虫病。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　孕妈妈们不用过多的担心，这些是不正当的食用火锅可能会引起的危害，只要适当食用火锅，避免经常吃，注意卫生，绝对不会影响妈妈和宝宝的健康。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>孕妇吃火锅不当对胎儿的影响</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　孕妇在吃火锅时，不等生肉完全煮熟就吃，可能对胎儿产生不良的影响。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　生肉片中可能含有弓形虫的幼虫，孕妇如果吃了没有煮熟煮透的生肉，感染了弓形虫病毒后，自身并无太大感觉，但可通过胎盘传染给胎儿，影响胎儿脑的发育，严重者还可造成流产、脑积水等。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家建议，吃火锅的时候把食物煮熟、煮透了再吃，不过于频繁地吃火锅，就不会对孕妈妈和宝宝的健康产生不良影响了。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>孕妇吃火锅的注意事项</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　火锅虽味美，但在吃火锅时要注意卫生，讲究科学。一要注意选料新鲜，以免发生食物中毒。二要掌握好火候，食物若在锅里烧的时间过长，会导致营养成分损坏，并失去鲜味;若不等火候烧开就吃，又易引起消化道疾病。同时，还应注意不要滚汤吃，否则易烫伤口腔和食道的黏膜。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　小编提醒喜欢吃火锅的孕妇们，最好选择在家里吃火锅，这样不仅可以控制汤料的味道，尽量不要过于辛辣或味道太过刺激，而且也可以确保食物的卫生。但要注意，火锅汤底切忌反复使用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>孕妇怎么吃火锅最健康</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>火锅太远勿强伸手</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　假如火锅的位置距自己太远，不要勉强伸手灼食物，以免加重腰背压力，导致腰背疲倦及酸痛，最好请丈夫或朋友代劳。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>加双筷子免沾菌</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　准妈妈应尽量避免用同一双筷子取生食物及进食，这样容易将生食上沾染的细菌带进肚里，而造成泻肚及其他疾病。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>自家火锅最卫生</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　准妈妈喜爱吃火锅，最好自己在家准备，除汤底及材料应自己安排外，食物卫生也是最重要的。切记，无论在酒楼或在家吃火锅时，任何食物一定要灼至熟透，才可进食。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>降低食量助消化</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　怀孕期间可能会出现呕吐反胃现象，因此胃部的消化能力自然降低。吃火锅时，准妈妈若胃口不佳，应减慢进食速度及减少进食分量，以免食后消化不了，引致不适。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>多放些蔬菜</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　火锅作料不仅有肉、鱼及动物内脏等食物，还必须先后放入较多的蔬菜。蔬菜含大量维生素及叶绿素，其性多偏寒凉，不仅能消除油腻，补充冬季人体维生素的不足，还有清凉、解毒、去火的作用，但放入的蔬菜不要久煮，才有消火作用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>适量放些豆腐</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　豆腐是含有石膏的一种豆制品，在火锅内适当放入豆腐，不仅能补充多种微量元素的摄入，而且还可发挥石膏的清热泻火、除烦、止渴的作用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>加些白莲</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　白莲不仅富含多种营养素，怎样避免吃火锅长胖，也是人体调补的良药。火锅内适当加入白莲，这种荤素结合有助于均衡营养，有益健康，加入的白莲最好不要抽弃莲子心，因为莲子心有清心泻火的作用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>可以放点生姜</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　生姜能调味、抗寒，火锅内可放点不去皮的生姜，因姜皮辛凉，夏天吃火锅，有散火除热的作用。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>吃火锅后饮杯清茶</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　这不仅可解腻清口，而且还有清火作用，但在吃过大鱼大肉的火锅后，不宜马上饮茶，以防茶中鞣酸与蛋白质结合，影响营养物质的吸收及发生便秘。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>吃些水果</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　一般来说吃火锅三四十分钟后可吃些水果。水果性凉，有良好的消火作用，餐后只要吃上一两个水果就可防止“上火”。</span>\r\n</p>',0,1358316432,0),
	(56,10,18,2,'圣诞节送什么礼物 浪漫泡芙的由来',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">圣诞节你想到送什么礼物了吗？泡芙如何呢？你不要小看这简单的泡芙哦，来听听泡芙的由来吧，泡芙有什么浪漫故事呢？送礼物的时候把这段故事也带上，美味的食物加上美妙的故事，一定会给你和你的爱人带来不一样的圣诞节。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　<strong>　泡芙的由来</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　泡芙发源自法国，据说是一对特别恩爱的小夫妻发明的。这其中还有一段耐人寻味的浪漫故事——上个世纪法国有许多农场，农场主都是当地特别有权势的人。在法国北部的一个大农场里，农场主的女儿看上了一名替主人放牧的小伙子，但是很快，他们甜蜜的爱情被父亲发现，并责令把那名小伙子赶出农场永远不得和女孩见面。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　女孩苦苦哀求父亲，最后，农场主出了个题目，要他们把“牛奶装到蛋里面”。如果他们在三天内做到，就允许他们在一起，否则，小伙子将被发配到很远很远的法国南部。聪明的小伙子和姑娘在糕点房里做出了一种大家都没见过的点心——外面和<a href=\"http://www.gdcct.com/list/002003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">鸡蛋</a>壳一样酥脆，并且有着鸡蛋的色泽，而且主要的原料也是鸡蛋，里面的馅料是结了冻的牛奶。独特的点心赢得了农场主的认可，后来女孩和小伙子成为甜蜜的夫妻，并在法国北部开了一个又一个售卖甜蜜和爱心的小店。小伙子名字的第一个发音是“泡”，姑娘名字的最后一个发音是“芙”，因此，他们发明的小点心就被取名叫“泡芙”。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　据说当时法国新人喜结连礼时婚宴上一定要有这种甜蜜的小点心，后来流传到英国，所有上层贵族下午茶和晚茶中最缺不了的也是泡芙。</span>\r\n</p>',0,1358316448,0),
	(57,10,18,2,'健康冬季减肥方法 莫成减肥活骷髅',1,1,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">1.73米，体重只有27公斤，一个重量相当于年龄8岁孩童的成年人，你可以想象吗？俄裔摩纳哥女子瓦莱丽娅·莱维汀现年39岁，由于疯狂的节食减肥，她最终患上一种极端的厌食症，让她从一个健康漂亮的少女变成了现在的样子。因此大家冬季减肥药使用健康的方法，莫成减肥活骷髅。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　最佳减肥食物</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>一、</strong><a href=\"http://www.gdcct.com/product/5261.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\"><strong>玉米</strong></a></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　相信很多女孩子都喜欢吃玉米吧，玉米不仅含有丰富的钙、磷、镁、铁及维生素A、B1、B2、B6、E和胡萝卜素等，还富含纤维质、常食玉米降低胆固醇并软化血管，减低血脂，从而起到瘦身的作用哦。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>二、葱蒜</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　洋葱中含有环蒜氨酸和硫氨酸等化合物，有益于血栓的溶解。洋葱几乎不含脂肪，能抑制高脂肪饮食引起的胆固醇升高，有益于改善动脉粥样硬化。葱中提取出的葱素，能治疗心血管硬化。大蒜能降低血清总胆固醇还能治疗肥胖。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>三、土豆</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　土豆的营养成分非常丰富，能润肠和促进脂类、胆固醇代谢。常吃土豆不用担心脂肪过剩，因为它只含有0.1%的脂肪。每天多吃土豆可以减少脂肪的摄入，使多余的脂肪渐渐代谢掉哦。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>四、酸奶</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　早上起床洗漱后，第一件事喝杯暖开水，第二件事情就是喝一大杯酸奶（200毫升左右），再吃一片全麦面包/一碗燕麦粥。买低糖酸奶或低脂酸奶（脂肪含量1.0~1.5%）当然可以。如果没有，用蛋白质含量&gt;2.3%的普通酸奶也没有关系。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　注意不要买蛋白质含量&gt;1.0%的，那不是真正的酸奶。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　注意酸奶最好提前一小时从冰箱里面拿出来温着。喝太凉的酸奶可能引起拉肚子或肚子痛。可以把它倒进一个盛过热水的小碗里面，很快就温暖了。但不要用微波加热以免把宝贵的乳酸菌杀死。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>最佳减肥运动</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　继“江南style”“航母style”后，网络上各种style都出来了，这些style也被减肥界列入减肥动作领域，瘦腰、瘦腿、美臂等，想减肥，赶快跟着潮起来，练练各种Style吧。</span>\r\n</p>',1,1358316585,1358321921),
	(58,10,18,2,'2012年度健康菜单排行榜',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">2012年度健康菜单排行榜正式公布。哪些食物最健康，哪些食物具有排毒功能，哪些食物能够增强免疫力，哪些食物又有抗氧化效果.......食尚资讯特邀权威医生及营养师共同为你推荐最有效最有利于健康的菜单表，来看看健康菜单排行榜有哪些食物吧！</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>获奖名单：</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　“最健康”的食物是：糙米</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　“最具有排毒功效”的食物是：地瓜</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　“最能增强免疫力”的食物是：<a href=\"http://www.gdcct.com/product/6349.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">洋葱</a></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　“最具有抗氧化效果”的食物是：茶</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　“最能促进新陈代谢”的食物是：柠檬</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　“最能舒缓压力”的食物是：莲子</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　你记住了这些健康菜单了吗？平时可以多吃哦！</span>\r\n</p>',0,1358316605,0),
	(59,10,18,2,'改掉三大坏习惯 元旦放假不疲劳',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">2013年元旦放假三天，周末两天，再加上周一给自己放个假，一不小心就放了6天假，6天你打算怎么过呢？是不是每次都觉得放完假不但没能休息到，反而疲惫不堪，下面就让小编教你防疲劳妙招，改掉三大坏习惯，元旦放假不疲劳。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>坏习惯一——凌晨睡觉中午起床</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　上班期间总是要六七点钟就起床，难得放假当然要玩得尽兴再睡觉，反正不用上班，睡到十一点再起床也没问题。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家点评：白天是大自然给人类安排的活动时间，熬夜后睡到中午才起，等于把自己的整个生物钟硬是往后拖了几个小时，反自然之道而行，当然对身体不好。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　按照人的生理周期，每天凌晨0-3点是深睡眠时间，也是最好的睡眠时段。任何人都不要耽误这3个小时的黄金睡眠期。这就意味着人们要在22：00-22：30之间必须睡觉，然后在凌晨0-3点处于深睡眠状态。很多人在进入深睡眠后，雷打不动，听不见撬门声。这也正是为什么在凌晨3个小时发案率最高的重要原因。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　医学研究表明，生长激素分泌的旺盛期、人表皮细胞的新陈代谢最活跃的时间均在凌晨0-3点之间。这个时候不睡，对处于生长发育期的孩子而言，是一种压制身体增长的行为;这个时候不眠，将影响细胞再生的速度，导致肌肤老化。这种恐怖的后果会直接反映在女士们的脸庞上。孩子们要想长高，女士们如想保持自己脸部皮肤好，就要务必养成在22：30左右入睡的习惯，最好在凌晨0-3点处于深睡眠状态中。古语“丑时屋檐矮三寸”，这是形容在午夜1-3点钟，万籁俱寂，大自然静悄悄，连房檐都懒洋洋地垂头三寸在“睡觉”，人更应如此。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>坏习惯二——早餐午餐合二为一</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　放假了，不像在上班时还能到饭堂吃饭，自己也懒得做饭。干脆把早餐和午餐合在一起叫快餐外卖，再不行就吃点零食顶肚。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家点评：早餐和午餐“二合一”，这时的饭量往往比平时多。胃部在空了接近半天后一下子要接下这么大的工作任务，很可能应付不过来，出现胃痛、腹胀等不适。在饿了这么久以后，身体对营养的吸收会更加“猛”，而快餐和零食的营养成分往往不太均衡，以高脂肪、高糖分居多。放假在家要多吃<a href=\"http://www.gdcct.com/list/003/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">水果</a>蔬菜，保持饮食平衡。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>坏习惯三——空调房上网打发时间</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　外面人太多，一出去就一身汗，还不如在家里吹空调，上网、看电视多放松。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家点评：上班时已经长时间坐着，如果放假时也成天坐着，对颈椎健康不利。空调房内空气不流通，长时间待在里面对心脑血管也不好。由于汗液可以把身体里的废物、毒素带出体外，在恒温的舒适环境中待得太久也不利于身体的新陈代谢，而且久而久之身体的适应能力会下降。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　元旦放假提早做好安排吧，别让这些坏习惯坏了你舒适的假期。</span>\r\n</p>',0,1358316623,0),
	(60,10,18,1,'冬天吃辣要注意 冬天如何吃辣不上火',1,0,99,'',0,1358316642,0),
	(61,10,18,1,'揭秘40天速生鸡的危害',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\"><a href=\"http://www.gdcct.com/product/4281.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">鸡</a>肉因其肉质细嫩、滋味鲜美受到了大家的推崇，鸡身上的各个部位更是被烹饪成各种美味佳肴，出现在人们的餐桌上。但是近日央视曝光速生鸡养殖黑幕：<a href=\"http://news.gdcct.com/shipin/201212/2756\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#333333;text-decoration:initial;\"><span style=\"margin:0px;padding:0px;color:#0000FF;\">40天长5斤添违禁药物</span></a>。这些速生鸡对我们人体有什么危害呢？小心你身边的速生鸡哦！</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　</span><span style=\"margin:0px;padding:0px;\"><strong>速生鸡的危害</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　为了提高肉鸡生长速度和饲料报酬,养鸡生产中大量使用抗生素和化学合成药物,这不仅严重危害人类的健康，更严重加剧了鸡肉风味和品质的下降，长期大量饲用抗生素、激素，虽然带来了经济效益，但存在种种弊端：造成鸡免疫力下降，导致细菌耐药性的发生和药物残留，并通过食物链影响人类健康和破坏生态平衡，造成不良后果。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<br />\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　经常食用含有抗生素的食品，即使是微量的，也能使人出现荨麻疹等过敏性疾病；另一方面，时常摄入含有抗生素的食品，可使某些菌株产生耐药性，从而带来预防与治疗某些人畜疾病的困难。特别是氯霉素极易损害人类骨髓的造血功能，并由此导致再生障碍性贫血的发生。而激素的作用更强，人类长期食用含有激素的食品，即使含量甚微，亦会明显影响机体的激素平衡，而且有致癌危险，对幼儿可造成发育异常。曾有报道指出，“相当于10毫克雌二醇的乙烯雌醇残留物，就会使内分泌肿瘤活化，从而引起更年期妇女患肿瘤的危险。”&nbsp;</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>速生鸡对小孩的危害</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　激素作用于鸡会残留在鸡体内和产生许多副产物，人吃了相当于直接摄取激素或副产物危害较大，会扰乱人体激素正常分泌，尤其是对儿童。有的激素还会使细胞生长过快，提前衰老，所以还是吃土鸡比较好。长期吃容易致体质差，小孩早熟，影响发育。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>速生鸡对孕妇的危害</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　孕妇产后即面临两大任务：一是产妇本身身体恢复；二是哺乳，喂养宝宝。两个方面均需要营养，因此饮食营养对于月子里的产妇尤其重要。不小心食用了速生鸡，不仅影响大人的身体恢复，而且会造成幼儿发育异常。</span>\r\n</p>',0,1358316659,0),
	(62,10,18,1,'别吃错东西 鱼的4种错误吃法',1,0,99,'<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\"><a href=\"http://www.gdcct.com/list/002004/index.htm\" target=\"_blank\" style=\"margin:0px;padding:0px;color:#0000FF;\">鱼类</a>所含有的营养价值是毋庸置疑的，鱼富含生长发育所需的最主要营养物质——蛋白质，鱼类蛋白质包含各种必需的氨基酸，是人类的优质蛋白食物，而且鱼类优于禽畜产品，更易消化吸收。但是鱼也不能乱吃，4种错误吃法会让你惹上致命重疾。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>1.擅吃鱼胆解毒不成反中毒</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　鱼胆是一味中药，中医常用它来治疗目赤胆痛、喉痹、恶疮等症。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　民间也因此流传吃鱼胆可以清热解毒、明目止咳的说法，所以尽管鱼胆味苦，总有人跃跃欲试。擅吃鱼胆极其危险，极易引发中毒甚至危及生命。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　专家指出，鱼的胆汁中含有水溶性“鲤醇硫酸酯钠”等具有极强毒性的毒素，这些毒素既耐热，又不会被酒精所破坏，因而无论将鱼胆烹熟、生吞，或是用酒送服，均可发生中毒。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　鱼胆中毒发病快，病情险恶，病死率高。中毒较轻者表现为恶心、呕吐、腹痛、腹泻等症状，严重者会出现肝大、黄疸、肝区压痛、少尿或无尿、肾区叩痛等症状，如果抢救不及时，可造成肝肾功能衰竭直至死亡。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　而患者中毒程度一般与鱼胆的胆汁多少有关，因此吞食较大鱼的胆更易发生中毒。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>2.生吃鱼片得“肝吸虫病”</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　很多人都喜欢生鱼片的鲜嫩美味，殊不知生吃鱼片对肝脏很不利，极易感染肝吸虫病，甚至诱发肝癌。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　据营养、健康方面的专家介绍，肝吸虫病是以肝胆病变为主的一种寄生虫病，人通过吃生的或半熟的含肝吸虫活囊蚴的淡水鱼虾和淡水螺类被感染的几率极高，目前我国仅在广东省就有数以百万计的肝吸虫患者，其中不少人正是因为生吃鱼虾而染病。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　其临床症状以疲乏、上腹不适、消化不良、腹痛、腹泻、肝区隐痛、肝肿大、头晕等较为常见，严重感染者在晚期可造成肝硬变腹水，甚至死亡。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>3、空腹吃鱼可能导致“痛风”</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　在减肥(减肥食品)风潮日盛的今天，不少人喜欢只吃菜不吃饭，空腹吃鱼更是司空见惯的事情，但这却很可能导致痛风发作。痛风是由于嘌呤代谢紊乱导致血尿酸增加而引起组织损伤的疾病。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　而绝大多数鱼本身富含嘌呤，如果空腹大量摄入含嘌呤的鱼肉，却没有足够的碳水化合物来分解，人体酸碱平衡就会失调，容易诱发痛风或加重痛风病患者的病情。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　<strong>4、活杀现吃残留毒素危害身体</strong></span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　一般人都认为吃鱼越新鲜越好，因此喜欢活杀现吃，认为这样才能保证鱼的鲜美和营养。但这实际上是一个认识误区。无论是人工饲养的鱼类或野生的鱼类，体内都含有一定的有毒物质。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　活杀现吃，鱼体内的有毒物质往往来不及完全排除，鱼身上的寄生虫和细菌也没有完全死亡，这些残留毒素很可能对身体造成危害。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　此外，活杀现吃的鱼蛋白没有完全分解，营养成分不充分，口感也并非最好。</span>\r\n</p>\r\n<p style=\"color:#1A1A1A;font-family:宋体;font-size:14px;line-height:24px;white-space:normal;background-color:#FAFDFF;\">\r\n	<span style=\"margin:0px;padding:0px;\">　　不可否认，鱼的确是很好的健康食品，但食鱼有道，才能对你的健康真正有益。</span>\r\n</p>',0,1358316675,0),
	(63,10,18,1,'【饮食禁忌】冬季羊肉补身有禁忌',1,0,99,'',0,1358316686,0),
	(64,10,18,1,'小心！气虚者慎食萝卜 7类营养食物过犹不及',1,0,99,'',0,1358316694,0),
	(65,10,18,1,'韩剧大热香蕉牛奶 香蕉可与牛奶同食？',1,0,99,'',0,1358316706,0),
	(66,10,18,1,'味精的危害：炒菜放味精有禁忌',1,1,99,'',4,1358316714,1358321911),
	(67,10,18,1,'【宝宝饮食】冬季怎么呵护易生病宝宝',1,0,99,'',1,1358316721,0),
	(68,10,18,1,'【防疲劳妙招】如何缓解眼睛疲劳',1,1,99,'',1,1358316728,1358321909),
	(69,10,18,1,'【病患饮食】哮喘病人冬季吃什么好',1,0,99,'',0,1358316737,0),
	(70,10,18,1,'便秘怎么办？多吃粗粮多运动',1,0,99,'',1,1358316745,0),
	(71,10,18,1,'止咳小偏方：咳嗽吃什么？',1,0,99,'',0,1358316752,0),
	(72,10,18,1,'【饮食减肥】这些减肥方法会让你毁容（下）',1,1,99,'',1,1358316760,1358321908),
	(73,10,18,1,'【饮食减肥】这些减肥方法会让你毁容（上）',1,0,99,'',0,1358316767,0),
	(74,10,18,1,'蜂蜜变毒药 不能喝蜂蜜的3种人',1,0,99,'',0,1358316775,0),
	(75,10,18,1,'医生揭秘6个经典健康谎言 鱼油有益健康？',1,1,99,'',4,1358316784,1358321906),
	(76,10,18,1,'健康饮食：“末日假期”如何吃得健康',1,1,99,'',13,1358316791,1358321913),
	(77,10,18,1,'易失眠朋友注意：诱导失眠食物大公开',1,0,99,'',0,1358316800,0),
	(78,10,18,1,'【乐活生活妙招】白衣服泛黄轻松搞定',1,1,99,'',3,1358316806,1358321904),
	(79,10,18,1,'新妈妈要注意：10个错误的坐月子饮食调养',1,0,99,'',0,1358316813,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_folk_custom_information` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_folk_custom_provinces
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_folk_custom_provinces`;

CREATE TABLE `xnfy520_yaomai_folk_custom_provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(10) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_folk_custom_provinces` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_folk_custom_provinces` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_folk_custom_provinces` (`id`, `pid`, `name`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(17,10,'北京',1,99,'',1358228110,1358303289),
	(18,10,'天津',1,99,'',1358228125,0),
	(19,10,'河北',1,99,'',1358228132,0),
	(20,10,'山西',1,99,'',1358228138,0),
	(21,10,'内蒙古',1,99,'',1358228144,0),
	(22,11,'浙江',1,99,'',1358228158,0),
	(23,11,'福建',1,99,'',1358228167,0),
	(24,11,'江苏',1,99,'',1358228173,1358300120),
	(25,11,'安徽',1,99,'',1358228179,0),
	(26,11,'山东',1,99,'',1358228185,0),
	(27,11,'江西',1,99,'',1358228193,0),
	(28,11,'上海',1,99,'',1358228200,0),
	(29,12,'广东',1,99,'',1358228229,0),
	(30,12,'广西',1,99,'',1358228240,0),
	(31,12,'海南',1,99,'',1358228246,0),
	(32,13,'湖南',1,99,'',1358228320,0),
	(33,13,'湖北',1,99,'',1358228325,1358300076),
	(34,13,'河南',1,99,'',1358228335,0),
	(35,14,'新疆',1,99,'',1358228346,0),
	(36,14,'陕西',1,99,'',1358228353,0),
	(37,14,'甘肃',1,99,'',1358228358,0),
	(38,14,'青海',1,99,'',1358228364,0),
	(39,14,'宁夏',1,99,'',1358228369,0),
	(40,15,'四川',1,99,'',1358228377,0),
	(41,15,'贵州',1,99,'',1358228382,0),
	(42,15,'云南',1,99,'',1358228388,0),
	(43,15,'重庆',1,99,'',1358228396,0),
	(44,15,'西藏',1,99,'',1358228401,0),
	(45,16,'黑龙江',1,99,'',1358228408,0),
	(46,16,'吉林',1,99,'',1358228415,0),
	(47,16,'辽宁',1,99,'',1358228420,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_folk_custom_provinces` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_folkways_area
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_folkways_area`;

CREATE TABLE `xnfy520_yaomai_folkways_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `description` varchar(255) NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_folkways_area` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_folkways_area` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_folkways_area` (`id`, `name`, `level`, `pid`, `sort`, `publish`, `description`, `create_date`, `modify_date`)
VALUES
	(1,'华中',0,0,99,1,'',1354763156,1354937175),
	(2,'华南',0,0,99,1,'',1354774028,0),
	(3,'华北',0,0,99,1,'',1354774125,0),
	(4,'西南',0,0,99,1,'',1354774165,1354864146),
	(5,'西北',0,0,99,1,'',1354774220,0),
	(6,'华东',0,0,99,1,'',1354864879,1354935498),
	(7,'河南省',1,1,99,1,'',1354929265,1354950276),
	(8,'湖北省',1,1,99,1,'',1354929498,1354932004),
	(9,'广东省',1,2,99,1,'',1354930014,1354935530),
	(10,'广西省',1,2,99,1,'',1354930062,0),
	(11,'海南省',1,2,99,1,'',1354930076,0),
	(13,'武汉市',2,8,99,1,'',1354935653,1354935674),
	(14,'青山区',3,13,99,1,'',1354936696,1354950256),
	(15,'洪山区',3,13,99,1,'',1354936719,1354950260),
	(17,'吉林省',1,3,99,1,'',1354944660,0),
	(20,'天门市',2,8,99,1,'',1354955348,1354955665),
	(21,'潜江市',2,8,99,1,'',1354955399,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_folkways_area` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_groupon_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_groupon_category`;

CREATE TABLE `xnfy520_yaomai_groupon_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_groupon_category` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_groupon_category` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_groupon_category` (`id`, `name`, `sort`, `publish`, `description`, `create_date`, `modify_date`)
VALUES
	(1,'床',99,1,'',1374723315,1374723396),
	(2,'沙发',99,1,'',1374723347,NULL),
	(3,'桌子',99,1,'',1374723361,NULL),
	(4,'椅子',99,1,'',1374723372,NULL),
	(5,'柜子',99,1,'',1374723379,NULL),
	(6,'灯具',99,1,'',1374723385,NULL);

/*!40000 ALTER TABLE `xnfy520_yaomai_groupon_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_groupon_commodity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_groupon_commodity`;

CREATE TABLE `xnfy520_yaomai_groupon_commodity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(255) NOT NULL,
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `org_price` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  `price` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  `details` text,
  `measure` double(10,2) unsigned DEFAULT '0.00',
  `expiration_date` int(11) unsigned NOT NULL,
  `sales_volume` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_groupon_commodity` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_groupon_commodity` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_groupon_commodity` (`id`, `no`, `pid`, `name`, `image`, `enable`, `recommend`, `sort`, `views`, `org_price`, `price`, `create_date`, `modify_date`, `details`, `measure`, `expiration_date`, `sales_volume`)
VALUES
	(1,'7772374731',1,'世友地板 大美木豆实木','20130725141254579.jpg',1,1,99,0,320.00,30.00,1374732777,1376102779,'seffsfsfsf',20.00,1381420800,0),
	(2,'8482374731',1,'世友地板 大美木豆实木复合地板 包送货到家','20130725142523748.jpg',1,1,99,0,200.00,190.00,1374732848,1376102769,'<div style=\"text-align:center;\">\r\n	<img src=\"/xnfy520_yaomai/Public/js/kindeditor/attached/image/20130801/20130801134326_27109.jpg\" alt=\"\" style=\"line-height:1.5;\" /> \r\n</div>\r\n<br />\r\n<div style=\"text-align:center;\">\r\n	<img src=\"/xnfy520_yaomai/Public/js/kindeditor/attached/image/20130801/20130801134345_37124.jpg\" alt=\"\" style=\"line-height:1.5;\" /> \r\n</div>',10.00,1377792000,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_groupon_commodity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_help_center_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_help_center_category`;

CREATE TABLE `xnfy520_yaomai_help_center_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_help_center_category` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_help_center_category` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_help_center_category` (`id`, `name`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(1,'关于我们',1,99,'',1358326906,1374546989),
	(2,'新手指南',1,99,'',1358326944,1374546194),
	(3,'物流运输',1,99,'',1358326950,1374546261),
	(4,'今后服务',1,99,'',1358326957,1374546255),
	(5,'购物帮助',1,99,'',1374546273,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_help_center_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_help_center_information
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_help_center_information`;

CREATE TABLE `xnfy520_yaomai_help_center_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `details` text,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_help_center_information` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_help_center_information` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_help_center_information` (`id`, `pid`, `name`, `publish`, `sort`, `details`, `views`, `create_date`, `modify_date`)
VALUES
	(80,1,'公司简介',1,99,'<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	要买电子商务成立于2007年，上海建配龙企业集团全资控股，上海易饰嘉网络科技有限公司注册域名的专业电子商务企业。<br style=\"margin:0px;padding:0px;\" />\r\n要买电子商务由易饰嘉开发和运营，为为网www.homevv.com，2010年正式上线，以“综合类网上商城”为主要定位的全新一代生活消费服务的电子商务平台。\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	要买现在业务跨越B2C（商家对个人）和B2B2C（商家-商家-个人）两大部分。旗下主营版块包括为为商城(B2C)、要买商城(B2B2C)、要买计算、要买软件、要买物流和为为国际旅行社等。\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	要买网以“在家就可以逛的超市”为网站口号，倡导“鼠标点亮生活，畅享品质购物”的现代生活理念，以常年“满就减”的惠民让利政策为网站特色。销售的商品涵盖：食品日用、美妆百货、母婴百货、数码家电、家居建材、时尚保健、运动办公、旅游机票、汽车户外、图书音像等所有日常消费领域。\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	要买网以商品丰富多彩，极具竞争力的价格，以人为本的服务，内诚于心外信于人的商业道德，自上线以来就受到网友的肯定和好评。\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	要买网拥有强大的自主开发团队和构建先进的技术平台，凭借与复旦软件园紧密型战略合作伙伴的优势资源，以雄厚的互联网精英人才实力，自主研发位居国内领先地位，集互联网、物联网、传统行业、电子商务于一体的经营网络平台和运营管理软件系统。拥有具有自主知识产权、国内外领先的十多项现代物流软件、电子商务交易软件等数十项国家专利。\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	要买将开发的全国领先的智能化仓库和自有的强大物联网体系相结合，以线上上百万的SKU和线下数个超过1500㎡的网货体验馆相结合，将云计算技术和服务客户终端相结合，保证为为网的核心竞争力，确保优质商品在第一时间低成本、快速安全配送，提供满意服务，让消费者放心享受现代网购的实惠和便捷。\r\n</p>',0,1358328247,1375238601),
	(81,1,'CEO致辞',1,99,'<img src=\"file://C:/Users/johnson/Desktop/ltw/images/map01.png\" />',0,1358328271,1374546354),
	(82,1,'诚聘英才',1,99,'<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	为为网成立于2007年，2010年正式上线，拥有软件开发、网站运营、网上商城管理等高级人才数百人，致力打造生活消费的现代电子商务网站，商品门类齐全，包括：食品、日用百货、数码通信、美容美妆、亲子母婴、家用电器、居家生活、休闲运动、办公用品、建材家具、票务酒店、仓储物流等所有消费领域\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	“为为网”凭借自身优势资源和优质服务平台，与国内外数十家知名企业建立了长期、稳定良好的合作关系，“为为网”成功入驻复旦软件园，与复旦软件园结为战略合作伙伴。\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	公司地址：中国上海市宝山区长逸路15号国际家居馆B馆6楼<br style=\"margin:0px;padding:0px;\" />\r\n邮编：200441<br style=\"margin:0px;padding:0px;\" />\r\n联系人：刘先生<br style=\"margin:0px;padding:0px;\" />\r\n人力资源E-mail：hr@homevv.com\r\n</p>\r\n<br style=\"margin:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\" />\r\n<div class=\"dd-line\" style=\"margin:0px;padding:0px;border-bottom-width:1px;border-bottom-style:dashed;border-bottom-color:#333333;height:1px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n</div>\r\n<br style=\"margin:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	<strong style=\"margin:0px;padding:0px;\">采购经理</strong><br style=\"margin:0px;padding:0px;\" />\r\n职位要求：<br style=\"margin:0px;padding:0px;\" />\r\n1.负责食品饮料，生活日用，美妆护肤，家用电器，休闲时尚，图书音像其中一板块采购管理<br style=\"margin:0px;padding:0px;\" />\r\n2.具有丰富的商品知识，熟悉采购管理运作流程，了解行业相关法规及质量体系标准；<br style=\"margin:0px;padding:0px;\" />\r\n3.丰富的上游供应商资源，良好的合作关系以及合同谈判能力 ；<br style=\"margin:0px;padding:0px;\" />\r\n4.具有良好的个人沟通技巧，包括部门内和跨部门间的组织协调；<br style=\"margin:0px;padding:0px;\" />\r\n5.具有良好的职业道德和较强的服务、团队、敬业精神，能承受一定工作压力；<br style=\"margin:0px;padding:0px;\" />\r\n6.熟练使用offce等办公软件；<br style=\"margin:0px;padding:0px;\" />\r\n7.适应出差。<br style=\"margin:0px;padding:0px;\" />\r\n可以直接发简历至：hr@homevv.com\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;background-color:#FFFFFF;\">\r\n	<strong style=\"margin:0px;padding:0px;\">行政前台</strong><br style=\"margin:0px;padding:0px;\" />\r\n任职资格：<br style=\"margin:0px;padding:0px;\" />\r\n1.一年以上相关行政前台工作经验（优秀应届生亦可）；<br style=\"margin:0px;padding:0px;\" />\r\n2.职业形象，端庄大方，普通话标准；<br style=\"margin:0px;padding:0px;\" />\r\n3.大专及其以上学历，行政、中文、文秘、管理或相关专业；<br style=\"margin:0px;padding:0px;\" />\r\n4.熟练使用Microsoft office，打字熟练 ；<br style=\"margin:0px;padding:0px;\" />\r\n5.语言表述沟通能力强，思路清晰，具备良好的文字表达能力；<br style=\"margin:0px;padding:0px;\" />\r\n6.为人热情，工作认真，强烈责任心，承受较强工作压力。<br style=\"margin:0px;padding:0px;\" />\r\n可以直接发简历至：hr@homevv.com\r\n</p>',0,1358328376,1375238574),
	(95,1,'联系我们',1,99,'',0,1374546400,0),
	(83,2,'注册新用户',1,99,'<h3 style=\"margin:0px;padding:0px;color:#DF4D16;font-size:14px;font-family:Arial, 宋体;line-height:25px;white-space:normal;\">\r\n	<br />\r\n</h3>',0,1358328447,1374546420),
	(84,2,'订购家具流程',1,99,'<h3 style=\"margin:0px;padding:0px;color:#DF4D16;font-size:14px;font-family:Arial, 宋体;line-height:25px;white-space:normal;\">\r\n	<br />\r\n</h3>',0,1358328464,1374546439),
	(85,2,'付款方式',1,99,'<h3 style=\"margin:0px;padding:0px 0px 5px;color:#DF4D16;font-size:14px;font-family:Arial, 宋体;line-height:25px;white-space:normal;\">\r\n	<br />\r\n</h3>',0,1358328478,1374546455),
	(86,2,'常见问题解答',1,99,'<h3 style=\"margin:0px;padding:0px 0px 5px;color:#DF4D16;font-size:14px;font-family:Arial, 宋体;line-height:25px;white-space:normal;\">\r\n	<br />\r\n</h3>',0,1358328499,1374546472),
	(87,3,'收货指南',1,99,'<br />',0,1358328519,1374546493),
	(88,3,'物流配送',1,99,'<br />',0,1358328535,1374546509),
	(90,4,'如何申请退款',1,99,'<h3 style=\"margin:0px;padding:0px 0px 5px;color:#DF4D16;font-size:14px;font-family:Arial, 宋体;line-height:25px;white-space:normal;\">\r\n	<br />\r\n</h3>',0,1358328587,1375241168),
	(91,4,'维修补件说明',1,99,'<h3 style=\"margin:0px;padding:0px 0px 5px;color:#DF4D16;font-size:14px;font-family:Arial, 宋体;line-height:25px;white-space:normal;\">\r\n	<br />\r\n</h3>',0,1358328646,1374546638),
	(92,5,'正品保障',1,99,'<h3 style=\"margin:0px;padding:0px 0px 5px;color:#DF4D16;font-size:14px;font-family:Arial, 宋体;line-height:25px;white-space:normal;\">\r\n	<br />\r\n</h3>',0,1358328657,1374546612),
	(96,5,'注册协议',1,99,'',0,1374546654,0),
	(97,5,'隐私保护',1,99,'',0,1374546674,0),
	(98,5,'免责声明',1,99,'<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\">\r\n	<strong style=\"margin:0px;padding:0px;\">您在接受本网站服务之前，请务必仔细阅读本声明。您访问本网站以及通过各类方式利用本网站，都将被视作是对本声明全部内容的认可。</strong>\r\n</p>\r\n<br style=\"margin:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\" />\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\">\r\n	1、您从事与本网站相关的行为（包括但不限于访问浏览、利用、转载、宣传介绍），必须以善意且谨慎的态度行事；您不得故意或者过失的损害本网站的各类合法权益，不得利用本网站以任何方式直接或者间接地违反中华人民共和国法律、国际公约以及社会公德。\r\n</p>\r\n<br style=\"margin:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\" />\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\">\r\n	2、本网站刊载的各类文章、广告、您在本网站发表的观点以及以链接形式推荐的其他网站内容，仅为提供更多信息以参考使用或者学习交流，并不代表本网站的立场和观点。\r\n</p>\r\n<br style=\"margin:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\" />\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\">\r\n	3、本网站若因线路及本网站控制范围外的硬件故障或因本网站订定系统停机维护期间而导致暂停服务，于暂停服务期间给用户造成的一切损失，本网站不承担任何法律责任。\r\n</p>\r\n<br style=\"margin:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\" />\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\">\r\n	4、如因不可抗力或其他无法控制的原因造成网站销售系统崩溃或无法正常使用，从而导致网上交易无法完成或丢失有关的信息、记录等，网站将不承担责任。但是我们将会尽合理的可能协助处理善后事宜，并努力使客户减少可能遭受的经济损失。\r\n</p>\r\n<br style=\"margin:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\" />\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\">\r\n	5、除本网站注明之服务条款外，其他一切因使用本网站而引致之任何意外、疏忽、诽谤、版权或知识产权侵犯及其所造成的损失（包括因下载而感染电脑病毒），本网站不承担任何法律责任。\r\n</p>\r\n<br style=\"margin:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\" />\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;font-family:Simsun;line-height:24px;white-space:normal;\">\r\n	6、本站可以按买方的要求代办相关运输手续，但我们的责任义务仅限于按时发货，遇到物流意外时协助买方查询，不承担任何物流提供给顾客之外的赔偿，一切查询索赔事宜均按照物流的规定办理。在物流全程查询期限未满之前，买方不得要求赔偿。提醒买方一定核实好收货详细地址和收货人电话，以免耽误送货。\r\n</p>',0,1374546712,1375241204);

/*!40000 ALTER TABLE `xnfy520_yaomai_help_center_information` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_home_grown_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_home_grown_product`;

CREATE TABLE `xnfy520_yaomai_home_grown_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `invoice` tinyint(1) unsigned NOT NULL,
  `qs` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `brand` varchar(255) DEFAULT NULL,
  `producing_area` varchar(255) DEFAULT NULL,
  `date_of_manufacture` varchar(255) NOT NULL,
  `deliver_region` varchar(255) DEFAULT NULL,
  `details` text NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_home_grown_product` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_home_grown_product` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_home_grown_product` (`id`, `cid`, `name`, `image`, `enable`, `recommend`, `invoice`, `qs`, `brand`, `producing_area`, `date_of_manufacture`, `deliver_region`, `details`, `create_date`, `modify_date`)
VALUES
	(29,0,'蔬菜类','',1,0,0,0,NULL,NULL,'',NULL,'',1356313376,NULL),
	(30,0,'肉类','',1,0,0,0,NULL,NULL,'',NULL,'',1356313384,NULL),
	(31,0,'豆制品','',1,0,0,0,NULL,NULL,'',NULL,'',1356313401,NULL),
	(32,0,'干货','',1,0,0,0,NULL,NULL,'',NULL,'tyutyytityut',1356313412,1356313790),
	(35,0,'asfasfsf','',1,0,0,0,'无','','','全国配送','',1356494320,NULL),
	(36,0,'567567657','',1,0,0,0,'无','','','全国配送','',1356494437,NULL),
	(37,0,'rrtyrty','',1,0,0,0,'无','','','全国配送','',1356498717,NULL),
	(38,0,'adfasfdasf','',1,0,0,0,'无','','','全国配送','erttutu',1356498787,NULL),
	(39,29,'asdfasdfa','',1,0,0,0,'无','','','全国配送','',1356499197,NULL);

/*!40000 ALTER TABLE `xnfy520_yaomai_home_grown_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_home_grown_product_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_home_grown_product_category`;

CREATE TABLE `xnfy520_yaomai_home_grown_product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_home_grown_product_category` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_home_grown_product_category` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_home_grown_product_category` (`id`, `name`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(29,'蔬菜类',1,99,'',1356313376,NULL),
	(30,'肉类',1,99,'',1356313384,NULL),
	(31,'豆制品',1,99,'',1356313401,NULL),
	(32,'干货',1,99,'tyutyytityut',1356313412,1356313790);

/*!40000 ALTER TABLE `xnfy520_yaomai_home_grown_product_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_index_recommend
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_index_recommend`;

CREATE TABLE `xnfy520_yaomai_index_recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `commodity_id` int(10) unsigned NOT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_index_recommend` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_index_recommend` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_index_recommend` (`id`, `type`, `commodity_id`, `sort`)
VALUES
	(1,2,10019,99),
	(2,2,10027,99),
	(3,3,10028,99),
	(4,3,10020,99),
	(5,3,10026,99);

/*!40000 ALTER TABLE `xnfy520_yaomai_index_recommend` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_information_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_information_category`;

CREATE TABLE `xnfy520_yaomai_information_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '9999',
  `description` varchar(255) DEFAULT NULL,
  `CreateDate` int(10) unsigned NOT NULL,
  `ModifyDate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_information_category` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_information_category` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_information_category` (`id`, `name`, `image`, `publish`, `sort`, `description`, `CreateDate`, `ModifyDate`)
VALUES
	(1,'Conference','',1,99,'',1353548825,1353551480),
	(2,'News','',1,99,'',1353548860,1353551411),
	(3,'About Us','',1,99,'',1353548873,1353551501),
	(4,'Resources','',1,99,'',1353551512,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_information_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_information_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_information_list`;

CREATE TABLE `xnfy520_yaomai_information_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '9999',
  `details` text,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `CreateDate` int(10) unsigned NOT NULL,
  `ModifyDate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_information_list` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_information_list` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_information_list` (`id`, `cid`, `name`, `image`, `publish`, `sort`, `details`, `views`, `CreateDate`, `ModifyDate`)
VALUES
	(1,1,'All Subjects','',1,99,'<div style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;margin-top:0px;margin-bottom:0px;font-weight:bold;font-size:14px;\">\r\n	<strong><span style=\"color:#009900;\">Conferences Technically Co-Sponsored by Scientific Research Publishing (SCIRP)</span></strong> \r\n</div>\r\n<ul style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">\r\n	<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n		<a href=\"http://www.engii.org/cite2012/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2012 Conference on Information Technology in Education (CITE), Dec.27-29, 2012, Hainan Island, China</span></a> \r\n	</li>\r\n	<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n		<a href=\"http://www.engii.org/csse2012/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2012 International Conference on Computer Science and Software Engineering (CSSE), Dec.29-31, 2012, Hainan Island, China</span></a> \r\n	</li>\r\n	<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n		<a href=\"http://www.engii.org/peec2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2013 Power and Energy Engineering Conference (PEEC), Dec.31, 2012 - Jan.2, 2013, Hainan Island, China</span></a> \r\n	</li>\r\n	<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n		<a href=\"http://www.engii.org/ptt2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2013 International Conference on Pollution and Treatment Technology (PTT), Jan.2-4, 2013, Hainan Island, China</span></a> \r\n	</li>\r\n	<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n		<a href=\"http://www.engii.org/cip2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2013 Conference on Image Processing (CIP), Jan.4-6, 2013, Hainan Island, China</span></a> \r\n	</li>\r\n	<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n		<a href=\"http://www.engii.org/ccsb2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2013 Conference on Computational and Systems Biology (CCSB), Jan.6-8, 2013, Hainan Island, China</span></a> \r\n	</li>\r\n	<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n		<a href=\"http://www.engii.org/qec2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2013 Quantitative Economics Conference, Jan.8-10, 2013, Hainan Island, China</span></a> \r\n	</li>\r\n	<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n		<a href=\"http://www.engii.org/cn2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;\"><span style=\"color:#185faf;\"><span style=\"color:#666666;\">2013 Conference on Nanomaterials, Jan.10-12, 2013, Hainan Island, China</span><br />\r\n<br />\r\n</span></a><a href=\"http://www.engii.org/cn2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"> \r\n		<div style=\"margin-top:25px;margin-bottom:0px;font-weight:bold;font-size:14px;display:inline !important;\">\r\n			<span style=\"color:#009900;\">Scientific Research Publishing (SCIRP) will publish the proceedings for the following conferences</span> \r\n		</div>\r\n</a> \r\n		<ul style=\"color:#185FAF;list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">\r\n			<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n				<a href=\"http://www.scirp.org/conf/cepph2012/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2012 Conference on Environmental Pollution and Public Health (CEPPH)</span></a> \r\n			</li>\r\n			<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n				<a href=\"http://www.scirp.org/conf/wbm2012/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2012 Conference on Web Based Business Management (WBM)</span></a> \r\n			</li>\r\n			<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n				<a href=\"http://www.engii.org/cet2012/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2012 World Congress on Engineering and Technology (CET)</span></a> \r\n			</li>\r\n			<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n				<a href=\"http://www.scirp.org/conf/ebm2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2013 The Conference on Engineering and Business Management (EBM)</span></a> \r\n			</li>\r\n			<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n				<a href=\"http://www.creativedu.org/2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2013 Conference on Creative Education (CCE)</span></a> \r\n			</li>\r\n			<li style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;\">\r\n				<a href=\"http://www.psychconf.org/2013/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\"><span style=\"color:#666666;\">2013 Conference on Psychology and Social Harmony (CPSH)</span></a> \r\n			</li>\r\n		</ul>\r\n	</li>\r\n</ul>',20,1353551669,1353911600),
	(2,3,'About Us','20121123115011865.jpg',1,99,'<div style=\"text-align:center;\">\r\n	<strong style=\"color:#E53333;\"><img src=\"/xnfy520_demos/Public/js/kindeditor/attached/image/20121123/20121123060508_54942.jpg\" alt=\"\" /></strong> \r\n</div>\r\n<span style=\"color:#E53333;\"><strong> What is SCIRP?</strong></span><br />\r\n<span style=\"color:#666666;\">Scientific Research Publishing (SCIRP) is one of the largest Open Access journal publishers. It is currently publishing more than 200 open access, online, peer-reviewed journals covering a wide range of academic disciplines. SciRP serves the worldwide academic communities and contributes to the progress and application of science, by delivering superior scientific publications and scientific information solution provider that enable advancement in scientific research. More than 5,000 professional editorial board members support our publishing activities, and 32,000 authors already published with SciRP.</span><br />\r\n<br />\r\n<span style=\"color:#E53333;\"><strong></strong></span><span style=\"color:#E53333;\"><strong>What is Open Access? </strong></span><br />\r\n<span style=\"color:#666666;\">All original research papers published by SCIRP are made freely and permanently accessible online immediately upon publication. To be able to provide open access journals, SciRP defrays operation costs from authors and subscription charges only for its printed version. Open access publishing allows an immediate, world-wide, barrier-free, open access to the full text of research papers, which is in the best interests of the scientific community. </span><br />\r\n<span style=\"color:#666666;\"> · High visibility for maximum global exposure with open access publishing model</span><br />\r\n<span style=\"color:#666666;\"> · Rigorous peer review of research papers\r\n    · Prompt faster publication with less cost</span><br />\r\n<span style=\"color:#666666;\"> · Guaranteed targeted, multidisciplinary audience</span><br />\r\n<br />\r\n<strong><span style=\"color:#E53333;\"></span></strong><strong><span style=\"color:#E53333;\">Publication Ethics Statement</span></strong><br />\r\n<span style=\"color:#666666;\">SCIRP is committed to maintaining high standards through a rigorous peer-review together with strict ethical policies. Any infringements of professional ethical codes, such as plagiarism, fraudulent use of data, bogus claims of authorship, should be taken very seriously by the editors with zero tolerance.</span>',21,1353551712,1353651098),
	(3,3,'Job Posting','',1,99,'<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;color:#003366;font-weight:bold;font-size:13pt;\">Technical Editors</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Posted: July 25, 2012</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Contact:&nbsp;</span><a href=\"maillto:job@scirp.org\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">job@scirp.org</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Company Overview</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Scientific Research Publishing (SRP) is an academic publisher of open access journals. SRP is currently publishing more than 200 peer-reviewed and open-access scientific journals. All SRP journals are available at&nbsp;</span><a href=\"http://www.scirp.org/journal\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">http://www.scirp.org/journal</a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">&nbsp;. Founded in 2007, SRP has offices in California, Shanghai, Hong Kong and Wuhan. We are currently looking for candidates as Technical Editors in our Wuhan office.</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;color:#003366;font-weight:bold;font-size:13pt;\">Roles &amp; Responsibilities&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">•	Organize and manage peer-review process&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">•	Request revisions from authors&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">•	Perform other duties as assigned&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;color:#003366;font-weight:bold;font-size:13pt;\">Required Qualifications&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">•	Master or PhD degree required&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">•	Proficient command of English in reading and writing&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">•	Major in Biology , Medicine, Physics, Geology, and other related fields</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">•	Previous experience in scientific paper writing or reviewing is desirable&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">•	Ability to work independently&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;color:#003366;font-weight:bold;font-size:13pt;\">Application Procedure&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">If you are interested in this position, please send your resumes to:&nbsp;</span><a href=\"maillto:job@scirp.org\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">job@scirp.org</a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">.</span>',20,1353551765,0),
	(5,4,'For Authors','',1,99,'<p style=\"list-style-type:none;padding-top:0px;padding-right:10px;padding-bottom:0px;padding-left:10px;margin-top:15px;margin-bottom:0px;font-family:Verdana, Arial, Helvetica, sans-serif;text-align:justify;white-space:normal;float:left;line-height:24px;font-size:14px;\">\r\n	<span style=\"color:#FF3300;font-weight:bold;\">Submission Policy</span>&nbsp;<br />\r\nPapers submitted to Scientific Research Publishing must contain original material. The submitted paper, or any translation of it, must neither be published, nor be submitted for publication elsewhere. Violations of these rules will normally result in an immediate rejection of the submission without further review.<br />\r\nContributions should be written in English and include a 100-300 words abstract.<br />\r\nThe publisher welcomes the following types of contributions:<br />\r\n• Original research articles<br />\r\n• Review articles, providing a comprehensive review on a scientific topic<br />\r\nAll manuscripts and any supplementary material should be submitted via the journal\'s online submission and peer-review systems at&nbsp;<a href=\"http://papersubmission.scirp.org/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">http://papersubmission.scirp.org/</a>&nbsp;Please follow the instructions given on this site.\r\n</p>\r\n<p style=\"list-style-type:none;padding-top:0px;padding-right:10px;padding-bottom:0px;padding-left:10px;margin-top:15px;margin-bottom:0px;font-family:Verdana, Arial, Helvetica, sans-serif;text-align:justify;white-space:normal;float:left;line-height:24px;font-size:14px;\">\r\n	<span style=\"color:#FF3300;font-weight:bold;\">Authors\' Rights&nbsp;</span><br />\r\nAt Scientific Research Publishing, we\'re dedicated to protecting your rights as an author, and ensuring that any and all legal information and copyright regulations are addressed. Whether an author is published with Scientific Research Publishing or any other publisher, we hold ourselves and our colleagues to the highest standards of ethics, responsibility and legal obligation.&nbsp;<br />\r\nYou can post your version of your journal article on your personal web page or the web site of your institution, provided that you include a link to the journal\'s home page or the article’s DOI and include a complete citation for the article. As a journal author, you retain rights for a large number of author uses, including use by your employing institute or company. These rights are retained and permitted without the need to obtain specific permission from Scientific Research Publishing.\r\n</p>\r\n<p style=\"list-style-type:none;padding-top:0px;padding-right:10px;padding-bottom:0px;padding-left:10px;margin-top:15px;margin-bottom:0px;font-family:Verdana, Arial, Helvetica, sans-serif;text-align:justify;white-space:normal;float:left;line-height:24px;font-size:14px;\">\r\n	<span style=\"color:#FF3300;font-weight:bold;\">SCIRP Publication Ethics Statement</span>&nbsp;<br />\r\nSCIRP takes the responsibility to enforce a rigorous peer-review together with ethical policies and standards to the field of scholarly Publication. SCIRP takes cases of plagiarism, data falsification and inappropriate authorship credit very seriously and our editors will have a zero tolerance to such behaviors.\r\n</p>',6,1353551842,1354072672),
	(6,4,'Translation Rights','',1,99,'<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">On this page, we\'ve selected some newly-published and bestselling titles recommended for translation. Click on New and Bestselling Titles for a list of titles published during the last 3 months. For older bestsellers, you can browse through our titles at&nbsp;</span><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;color:#ff0000;\">Scientific Research Publishing.</span><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Reading Copies</strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Please download and complete the \"Request for Reading Copy\" form, and return it to us via post, fax or email. If the rights for the title you\'re interested in are available, we\'ll be more than happy to send you a reading copy with a three-month option.&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Join our Mailing List!</strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">To receive regular updates on&nbsp;</span><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;color:#ff0000;\">SCIRP</span><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">&nbsp;titles available for translation, simply download and complete the \"Join our Mailing List\" form and return it to us via post, fax or email. Alternatively, you can also email us at service@scirp.org with your contact details, indicating the subject areas of interest.&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">PERMISSION RIGHTS</strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Please contact&nbsp;</span><a href=\"mailto:service@scirp.org\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">service@scirp.org</a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:left;white-space:normal;background-color:#FFFFFF;\">.</span>',2,1353551912,1354071658),
	(7,2,'84 journals from SCIRP have been added into Open Access Journals Search Engine (OAJSE)','',1,255,'<div style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\">\r\n	84 journals from Scientific Research Publishing have been included in&nbsp;Open Access Journals Search Engine (OAJSE) since Sept, 2012. Please see the following link for more details:&nbsp;\r\n</div>\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;text-align:left;white-space:normal;font-size:13px;line-height:normal;background-color:#FFFFFF;\"><a href=\"http://oajse.com/\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">http://oajse.com/</a><br />\r\n<br />\r\n</span><a href=\"http://oajse.com/\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">The Open Access Journals Search Engine (OAJSE)&nbsp;</a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">service covers free, full text, quality controlled journals. We aim to cover journals in all subjects that are published in English language. There are now 4,775 journals in the directory. All are searchable at article level.</span>',8,1353554169,1353646953),
	(8,2,'47 academic journals from SCIRP have been included in the British Library','',1,99,'<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;font-size:larger;\">47 academic journals from Scientific Research Publishing have been included in&nbsp;</span><a target=\"_blank\" href=\"http://explore.bl.uk/primo_library/libweb/action/search.do?dscnt=0&amp;vl(10130439UI0)=any&amp;scp.scps=scope%3A%28BLCONTENT%29&amp;tab=local_tab&amp;dstmp=1348736355210&amp;srt=rank&amp;mode=Advanced&amp;vl(1UIStartWith1)=contains&amp;indx=1&amp;tb=t&amp;vl(41497491UI2)=any&amp;vl(freeText0)=&amp;fn=search&amp;vid=BLVU1&amp;vl(freeText2)=&amp;frbg=&amp;ct=search&amp;vl(10130438UI1)=any&amp;vl(1UIStartWith2)=contains&amp;dum=true&amp;vl(1UIStartWith0)=contains&amp;vl(46690061UI3)=all_items&amp;Submit=Search&amp;vl(freeText1)=\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><span style=\"font-size:larger;\">the British Library</span></a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;font-size:larger;\">&nbsp;since Sept. 2012.&nbsp;<br />\r\n<br />\r\nThe British Library is the national library of the United Kingdom and one of the world’s greatest libraries. Our collections include more than 150 million items, in over 400 languages, to which three million new items are added every year. We house books, magazines, manuscripts, maps, music scores, newspapers, patents, databases, philatelic items, prints and drawings and sound recordings.</span>',4,1353647078,0),
	(9,2,'Three journals from SCIRP have been included in MathSciNet','',1,99,'<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">There are three journals included in MathSciNet, please click the following links for more details:</span><span style=\"font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;font-family:Verdana;\"><br />\r\n<br />\r\n</span><span lang=\"EN-US\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">\r\n<div style=\"font-family:Calibri, sans-serif;font-size:11pt;\">\r\n	<a target=\"_blank\" href=\"http://www.ams.org/mathscinet/search/newj.html\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">Open Journal of Statistics</a><br />\r\n<a target=\"_blank\" href=\"http://www.ams.org/mathscinet/search/newj.html\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">Open Journal of Discrete Mathematics</a>\r\n</div>\r\n<div style=\"font-family:Calibri, sans-serif;font-size:11pt;\">\r\n	<a target=\"_blank\" href=\"http://www.ams.org/mathscinet/search/newj.html\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">Applied Mathematics</a>\r\n</div>\r\n<br />\r\n<div>\r\n	<span style=\"color:#222222;font-family:arial, sans-serif;line-height:16px;font-size:small;\"><a target=\"_blank\" href=\"http://www.ams.org/mathscinet/index.html\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">MathSciNet</a>: AMS database of more than a million reviews and abstracts of math publications (requires subscription).</span>\r\n</div>\r\n</span>',5,1353647109,0),
	(10,2,'Some papers have been indexed by PubMed','',1,99,'<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Some papers from 10 SCIRP journals have been indexed by Pubmed. Click the following links for more details:</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>International Journal of Clinical Medicine</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/ijcm.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=2158-284X\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=2158-284X</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>Journal of Cancer Therapy</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/jct.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=2151-1934\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=2151-1934</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>Journal of Biomedical Science and Engineering</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/jbise1.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot1</a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">&nbsp;</span><a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/jbise2.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot1&nbsp;</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=1937-6871\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=1937-6871</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>Advances in Bioscience and Biotechnology</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/abb.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=2156-8456\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=2156-8456</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>Computational Molecular Bioscience</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/cmb.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=2165-3445\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=2165-3445</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>Journal of Biomaterials and Nanobiotechnology</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/jbnb.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=2158-7027\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=2158-7027</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>Open Journal of Preventive Medicine</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/ojpm.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=2162-2477\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=2162-2477</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>Health</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/health.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=1949-4998\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=1949-4998</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>Neuroscience &amp; Medicine</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/health.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=2158-2912\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=2158-2912</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><em>World Journal of Cardiovascular Diseases</em></strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirp.org/imagesForEmail/abstract/pubmed120711/health.jpg\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">ScreenShot</a><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=2164-5329\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">www.ncbi.nlm.nih.gov/pubmed?term=2164-5329</a>',4,1353647133,0),
	(11,2,'163 journals from SCIRP have been indexed by Scirus','',1,99,'<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">163 journals from Scientific Research Publishing have been indexed&nbsp;by&nbsp;Scirus since May, 2012.&nbsp;</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a target=\"_blank\" href=\"http://www.scirus.com/srsapp/\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Scirus</a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">&nbsp;is a comprehensive science-specific search engine. Like&nbsp;CiteSeerX&nbsp;and&nbsp;Google Scholar, it is focused on scientific information. Unlike CiteSeerX, Scirus is not only for computer sciences and IT and not all of the results include full text. It also sends its scientific search results to&nbsp;Scopus, an abstract and citation database covering scientific research output globally.</span>',4,1353647152,0),
	(12,2,'SCIRP E-journals database has been listed in more than 120 university libraries in China','',1,99,'<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">SCIRP E-journals database has been listed&nbsp;in&nbsp;more than 120 university&nbsp;libraries in China,&nbsp;including Tsinghua University, Shanghai Jiaotong University, Fudan University and&nbsp;Nankai University, etc..</span>',5,1353647171,0),
	(13,2,'Ulrichsweb.com indexed SCIRP journals','',1,99,'<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Some of SCIRP journals have been indexed by&nbsp;San Jose State University (SJSU:&nbsp;</span><a href=\"http://library.sjsu.edu/electronic-journals-index/electronic-journals-index\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">http://library.sjsu.edu/electronic-journals-index/electronic-journals-index</a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:25px;text-align:left;white-space:normal;background-color:#FFFFFF;\">&nbsp;) since 2012.</span>',19,1353647197,1354071311),
	(4,3,'Contact Us','',1,99,'<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;color:#666666;\">Foshan Dongnuo Ceramics Co., Ltd.&nbsp;</span><br style=\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\" />\r\n<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;color:#666666;\">Add:Xinjing Industry Zone, Xiaotang Town,Nanhai District,Foshan City,Guangdong province,China</span><br style=\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\" />\r\n<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;color:#666666;\">Tel:0086-757-86668106&nbsp;</span><br style=\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\" />\r\n<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;color:#666666;\">Fax: 0086-757-85335888&nbsp;</span><br style=\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\" />\r\n<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;color:#666666;\">E-mail: info@dongnuo-tiles.com&nbsp;</span><br style=\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\" />\r\n<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\"><span style=\"color:#666666;\">dnexport@yahoo.cn</span><br />\r\n<span style=\"color:#666666;\"></span></span><br style=\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\" />\r\n<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;color:#666666;\">By metro&nbsp;</span><br style=\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\" />\r\n<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;color:#666666;\">From Guangzhou to Foshan 30minutes</span><br style=\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\" />\r\n<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;color:#666666;\">By taxi</span><br style=\"padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;\" />\r\n<span style=\"font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:normal;white-space:normal;color:#666666;\">From metro station to our showroom 20minutes</span>',2,1353658098,0),
	(16,1,' Earth & Environmental Sciences','',1,99,'<strong>EPPH2011</strong> International conference on Environmental Pollution and Public Health<br />\r\nConference Submission Deadline: Dec. 16, 2010<br />\r\nhttp://www.icbbe.org/epph2011/<br />\r\n<br />\r\n<strong></strong><strong>CEPPH2010</strong> Conference on Environmental Pollution and Public Health<br />\r\nConference Submission Deadline: July 1, 2010<br />\r\nhttp://www.scirp.org/conf/cepph2010/',0,1353911512,1353912650),
	(17,1,'Medicine & Healthcare','',1,99,'',2,1353912558,0),
	(18,1,'Biomedical & Life Sciences','',1,99,'<b style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_conferenceShortName\">iCBBE2011</span></b><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;</span><span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_conferenceFullName\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">International Conference on Bioinformatics and Biomedical Engineering</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Conference Submission Deadline:&nbsp;</span><span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_submissionDeadline\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Dec. 16, 2010</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_HyperLink_conferenceWebSite\" href=\"http://www.icbbe.org/2011\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">http://www.icbbe.org/2011</a>',1,1353912685,0),
	(19,1,'Computer Science & Communications','',1,99,'<b>CIICT2010</b>&nbsp;&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_conferenceFullName\">2010 China-Ireland International Conference on Information and Communications Technologies</span><br />\r\nConference Submission Deadline:&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_submissionDeadline\">Aug.8, 2010</span><br />\r\n<a id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_HyperLink_conferenceWebSite\" href=\"http://www.scirp.org/conf/ciict2010/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">http://www.scirp.org/conf/ciict2010/<br />\r\n<br />\r\n</a><b>iTAP2010</b>&nbsp;&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl01_Label_conferenceFullName\">International Conference on Internet Technology and Applications</span><br />\r\nConference Submission Deadline:&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl01_Label_submissionDeadline\">Mar.22, 2010</span><br />\r\n<a id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl01_HyperLink_conferenceWebSite\" href=\"http://www.itapconf.org/2010/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">http://www.itapconf.org/2010/<br />\r\n<br />\r\n</a><b>iTAP2011</b>&nbsp;&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl02_Label_conferenceFullName\">International Conference on Internet Technology and Applications</span><br />\r\nConference Submission Deadline:&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl02_Label_submissionDeadline\">Feb.20, 2011</span><br />\r\n<a id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl02_HyperLink_conferenceWebSite\" href=\"http://www.itapconf.org/2011/Home.aspx\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">http://www.itapconf.org/2011/Home.aspx<br />\r\n<br />\r\n</a><b>WiCOM2010</b>&nbsp;&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl03_Label_conferenceFullName\">International Conference on Wireless Communications, Networking and Mobile Computing</span><br />\r\nConference Submission Deadline:&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl03_Label_submissionDeadline\">Feb.28, 2010</span><br />\r\n<a id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl03_HyperLink_conferenceWebSite\" href=\"http://www.wicom-meeting.org/2010/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">http://www.wicom-meeting.org/2010/<br />\r\n</a>',1,1353912760,0),
	(20,1,'Chemistry & Materials Science','',1,99,'',0,1353912778,1354072724),
	(21,1,'Physics & Mathematics','',1,99,'<b style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\"><span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_conferenceShortName\">SOPO2011</span></b><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;</span><span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_conferenceFullName\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">International Symposium on Photonics and Optoelectronics</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Conference Submission Deadline:&nbsp;</span><span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_submissionDeadline\" style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">Oct.20, 2010</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\" />\r\n<a id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_HyperLink_conferenceWebSite\" href=\"http://www.scirp.org/conf/sopo2011/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:left;white-space:normal;background-color:#FFFFFF;\">http://www.scirp.org/conf/sopo2011/</a>',0,1353912794,0),
	(22,1,'Business & Economics','',1,99,'<b>EBM2011</b>&nbsp;&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_conferenceFullName\">The Conference on Engineering and Business Management</span><br />\r\nConference Submission Deadline:&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_Label_submissionDeadline\">Dec.6, 2010</span><br />\r\n<a id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl00_HyperLink_conferenceWebSite\" href=\"http://www.scirp.org/conf/ebm2011/home.aspx\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">http://www.scirp.org/conf/ebm2011/home.aspx<br />\r\n<br />\r\n</a><b>WBM2010</b>&nbsp;&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl01_Label_conferenceFullName\">Conference on Web Based Business Management</span><br />\r\nConference Submission Deadline:&nbsp;<span id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl01_Label_submissionDeadline\">Jun.10, 2010</span><br />\r\n<a id=\"ctl00_ContentPlaceHolder1_userControl_showConferences_DataList_showConferences_ctl01_HyperLink_conferenceWebSite\" href=\"http://www.scirp.org/conf/wbm2010/Home.aspx\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#185FAF;\">http://www.scirp.org/conf/wbm2010/Home.aspx</a>',0,1353912828,0),
	(23,1,'Social Sciences & Humanities','',1,99,'',0,1353912841,1354071407),
	(24,3,' Call for Special Issue Proposals','',1,99,'<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;line-height:24px;text-align:justify;white-space:normal;background-color:#FFFFFF;\"><strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">Call for Special Issue Proposals</strong><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">In order to better serve our academic community and deal with more focused topics with high current interest, special issues are welcome at any time during the year in any fields of science or social science subjects. They should be organized by recognized experts in the area and attract articles of the highest quality.</span>\r\n<div style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;margin-top:25px;\">\r\n	<strong>Proposals for Special Issue should include the following:</strong>\r\n</div>\r\n<ol style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-left:25px;margin-top:2px;margin-bottom:5px;\">\r\n	<li>\r\n		A suggested title for the Special Issue\r\n	</li>\r\n	<li>\r\n		The journal for which the Special Issue is intended\r\n	</li>\r\n	<li>\r\n		Proposed Aims and Scope, giving an overview of the Special Issue\'s intended focus and a list of the topics to be covered\r\n	</li>\r\n	<li>\r\n		The Guest Editors who are willing to manage the Special Issue, including their names, emails, affiliations, and a short biography (one paragraph) of each of the Guest Editors\r\n	</li>\r\n</ol>\r\n<p style=\"list-style-type:none;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-bottom:0px;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">\r\n	All proposals should be submitted to&nbsp;<a href=\"mailto:service@scirp.org\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#FF3300;\">service@scirp.org</a>, and they are subject to approval by the journal editorial board.\r\n</p>\r\n</span>',2,1354087762,1354088071),
	(25,3,'Call for New Journal Proposals','',1,99,'<strong style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">Scientific Research Publishing</strong><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">&nbsp;(SCIRP,&nbsp;</span><a href=\"http://www.scirp.org/\" target=\"_blank\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#FF3300;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">http://www.scirp.org</a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">&nbsp;) is an organization specialized in the service of scientific journals publications. All the papers published by SCIRP journals are peer reviewed and openly accessible to the public through their online versions.</span>\r\n<div style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;margin-top:25px;\">\r\n	In order to better serve our academic community, new journal proposals are welcome at any time during the year in any fields of science or social science subjects.\r\n</div>\r\n<div style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;margin-top:25px;\">\r\n	<strong>Proposals for new journals should include the following items:</strong>\r\n</div>\r\n<ol style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-left:25px;margin-top:2px;margin-bottom:5px;\">\r\n	<li>\r\n		Journal title<span style=\"color:red;\">*</span>\r\n	</li>\r\n	<li>\r\n		Specific aim &amp; scopes<span style=\"color:red;\">*</span>\r\n	</li>\r\n	<li>\r\n		Proposed editorial board\r\n	</li>\r\n	<li>\r\n		Journal audience\r\n	</li>\r\n	<li>\r\n		Competing journals\r\n	</li>\r\n</ol>\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">(</span><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;color:red;\">*</span><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">marked options are essential, others can be proposed later on).</span><br style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">Please send your brief CV along with your proposal to&nbsp;</span><a href=\"mailto:service@scirp.org\" style=\"outline-style:none;outline-width:initial;outline-color:initial;text-decoration:none;color:#FF3300;font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">service@scirp.org</a><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif;line-height:22px;text-align:justify;white-space:normal;background-color:#FFFFFF;\">.</span>',6,1354088094,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_information_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_instation_message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_instation_message`;

CREATE TABLE `xnfy520_yaomai_instation_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `by_user` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `message_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_instation_message` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_instation_message` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_instation_message` (`id`, `by_user`, `name`, `details`, `type`, `message_type`, `status`, `create_date`)
VALUES
	(19,41,'hello','world',1,1,1,1375778203),
	(18,41,'这又是一个','<strong>能收到吧,嘿嘿</strong>',1,1,1,1375776089);

/*!40000 ALTER TABLE `xnfy520_yaomai_instation_message` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_integral_exchange_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_integral_exchange_logs`;

CREATE TABLE `xnfy520_yaomai_integral_exchange_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `by_user` int(10) unsigned NOT NULL,
  `by_gift_id` int(10) unsigned NOT NULL,
  `exchange_flag` int(10) unsigned NOT NULL,
  `exchange_time` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_integral_exchange_logs` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_integral_exchange_logs` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_integral_exchange_logs` (`id`, `by_user`, `by_gift_id`, `exchange_flag`, `exchange_time`, `status`, `name`, `username`)
VALUES
	(8,32,99,0,1358842732,0,'礼品99','xnfy51220'),
	(7,32,100,0,1355000000,0,'兑换礼品','xnfy51220'),
	(9,32,98,0,1358842737,0,'兑换礼品6','xnfy51220'),
	(10,32,96,1,1358700000,0,'兑换礼品2','xnfy51220'),
	(11,32,97,2,1358842748,1,'礼品4','xnfy51220'),
	(27,32,99,0,1358934417,0,'礼品99','xnfy51220'),
	(41,32,98,0,1358999668,0,'兑换礼品6','xnfy51220'),
	(42,32,100,0,1358999678,0,'兑换礼品','xnfy51220'),
	(43,32,98,0,1359083851,0,'兑换礼品6','xnfy51220');

/*!40000 ALTER TABLE `xnfy520_yaomai_integral_exchange_logs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_integral_gift_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_integral_gift_category`;

CREATE TABLE `xnfy520_yaomai_integral_gift_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_integral_gift_category` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_integral_gift_category` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_integral_gift_category` (`id`, `name`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(1,'蔬菜类',1,99,'',1358326906,1358740672),
	(2,'肉类',1,99,'',1358326944,1358740684),
	(3,'豆植品',1,99,'',1358326950,1358740693),
	(4,'干货',1,99,'',1358326957,1358740701),
	(53,'山货',1,99,'',1358740708,0),
	(56,'食油',1,99,'',1358753092,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_integral_gift_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_integral_gift_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_integral_gift_list`;

CREATE TABLE `xnfy520_yaomai_integral_gift_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `recommend` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `details` text,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  `need_integral` int(10) unsigned NOT NULL,
  `inventory` int(10) unsigned NOT NULL,
  `exchange` int(10) unsigned NOT NULL,
  `exchange_restriction` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_integral_gift_list` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_integral_gift_list` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_integral_gift_list` (`id`, `pid`, `name`, `image`, `recommend`, `publish`, `sort`, `details`, `views`, `create_date`, `modify_date`, `need_integral`, `inventory`, `exchange`, `exchange_restriction`)
VALUES
	(96,4,'兑换礼品2','20130121145951279.jpg',1,1,99,'<h3 style=\"margin:0px;padding:0px;color:#ED6C1B;font-size:12px;line-height:30px;font-family:Arial, 宋体;white-space:normal;\">\r\n	注意：\r\n</h3>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;line-height:23px;color:#323333;font-family:Arial, 宋体;white-space:normal;\">\r\n	1、本商品并非网站直接发货，会员兑换后的1－2个工作日，网站工作人员将从合作商家采购下单， 具体到货时间取决于商城的发货时间， 发货后会站内信通知会员，请您留意；<br style=\"margin:0px;padding:0px;\" />\r\n2、如果缺货，我们会在1~2个工作日把积分返回到您的账户，并站内信提醒；<br style=\"margin:0px;padding:0px;\" />\r\n3、本价格已经包含快递费，如果您填写的收货地址是合作商家快递无法到达的，我们将会在1~2个工作日把积分返回到您的账户；<br style=\"margin:0px;padding:0px;\" />\r\n4、只能使用论坛所获积分兑换；<br style=\"margin:0px;padding:0px;\" />\r\n5、本礼品是网站从第三方网站采购发货，因采购价格时常有些变动，为了方便操作，网站和会员双方均不需要作差价补偿。\r\n</p>',13,1358751608,1358932514,33,64,2,1),
	(97,2,'礼品4','20130121150037473.jpg',0,1,99,'<h3 style=\"margin:0px;padding:0px;color:#ED6C1B;font-size:12px;line-height:30px;font-family:Arial, 宋体;white-space:normal;\">\r\n	注意：\r\n</h3>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;line-height:23px;color:#323333;font-family:Arial, 宋体;white-space:normal;\">\r\n	1、本商品并非网站直接发货，会员兑换后的1－2个工作日，网站工作人员将从合作商家采购下单， 具体到货时间取决于商城的发货时间， 发货后会站内信通知会员，请您留意；<br style=\"margin:0px;padding:0px;\" />\r\n2、如果缺货，我们会在1~2个工作日把积分返回到您的账户，并站内信提醒；<br style=\"margin:0px;padding:0px;\" />\r\n3、本价格已经包含快递费，如果您填写的收货地址是合作商家快递无法到达的，我们将会在1~2个工作日把积分返回到您的账户；<br style=\"margin:0px;padding:0px;\" />\r\n4、只能使用论坛所获积分兑换；<br style=\"margin:0px;padding:0px;\" />\r\n5、本礼品是网站从第三方网站采购发货，因采购价格时常有些变动，为了方便操作，网站和会员双方均不需要作差价补偿。\r\n</p>',10,1358751639,1358820884,12,658,8,2),
	(98,53,'兑换礼品6','20130121150100870.jpg',1,1,99,'<h3 style=\"margin:0px;padding:0px;color:#ED6C1B;font-size:12px;line-height:30px;font-family:Arial, 宋体;white-space:normal;\">\r\n	注意：\r\n</h3>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;line-height:23px;color:#323333;font-family:Arial, 宋体;white-space:normal;\">\r\n	1、本商品并非网站直接发货，会员兑换后的1－2个工作日，网站工作人员将从合作商家采购下单， 具体到货时间取决于商城的发货时间， 发货后会站内信通知会员，请您留意；<br style=\"margin:0px;padding:0px;\" />\r\n2、如果缺货，我们会在1~2个工作日把积分返回到您的账户，并站内信提醒；<br style=\"margin:0px;padding:0px;\" />\r\n3、本价格已经包含快递费，如果您填写的收货地址是合作商家快递无法到达的，我们将会在1~2个工作日把积分返回到您的账户；<br style=\"margin:0px;padding:0px;\" />\r\n4、只能使用论坛所获积分兑换；<br style=\"margin:0px;padding:0px;\" />\r\n5、本礼品是网站从第三方网站采购发货，因采购价格时常有些变动，为了方便操作，网站和会员双方均不需要作差价补偿。\r\n</p>',22,1358751670,1358932516,11,85,14,0),
	(95,1,'【陕西特产】秦美猕猴桃黄金果400g 奇异果 水果之王','20130121144325525.jpg',1,1,99,'<h3 style=\"margin:0px;padding:0px;color:#ED6C1B;font-size:12px;line-height:30px;font-family:Arial, 宋体;white-space:normal;\">\r\n	注意：\r\n</h3>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;line-height:23px;color:#323333;font-family:Arial, 宋体;white-space:normal;\">\r\n	1、本商品并非网站直接发货，会员兑换后的1－2个工作日，网站工作人员将从合作商家采购下单， 具体到货时间取决于商城的发货时间， 发货后会站内信通知会员，请您留意；<br style=\"margin:0px;padding:0px;\" />\r\n2、如果缺货，我们会在1~2个工作日把积分返回到您的账户，并站内信提醒；<br style=\"margin:0px;padding:0px;\" />\r\n3、本价格已经包含快递费，如果您填写的收货地址是合作商家快递无法到达的，我们将会在1~2个工作日把积分返回到您的账户；<br style=\"margin:0px;padding:0px;\" />\r\n4、只能使用论坛所获积分兑换；<br style=\"margin:0px;padding:0px;\" />\r\n5、本礼品是网站从第三方网站采购发货，因采购价格时常有些变动，为了方便操作，网站和会员双方均不需要作差价补偿。\r\n</p>',10,1358750613,1358932521,99,27,2,0),
	(99,56,'礼品99','20130121161701572.jpg',1,1,99,'<h3 style=\"margin:0px;padding:0px;color:#ED6C1B;font-size:12px;line-height:30px;font-family:Arial, 宋体;white-space:normal;\">\r\n	注意：\r\n</h3>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;line-height:23px;color:#323333;font-family:Arial, 宋体;white-space:normal;\">\r\n	1、本商品并非网站直接发货，会员兑换后的1－2个工作日，网站工作人员将从合作商家采购下单， 具体到货时间取决于商城的发货时间， 发货后会站内信通知会员，请您留意；<br style=\"margin:0px;padding:0px;\" />\r\n2、如果缺货，我们会在1~2个工作日把积分返回到您的账户，并站内信提醒；<br style=\"margin:0px;padding:0px;\" />\r\n3、本价格已经包含快递费，如果您填写的收货地址是合作商家快递无法到达的，我们将会在1~2个工作日把积分返回到您的账户；<br style=\"margin:0px;padding:0px;\" />\r\n4、只能使用论坛所获积分兑换；<br style=\"margin:0px;padding:0px;\" />\r\n5、本礼品是网站从第三方网站采购发货，因采购价格时常有些变动，为了方便操作，网站和会员双方均不需要作差价补偿。\r\n</p>',32,1358756237,1358932524,3,9979,20,0),
	(100,56,'兑换礼品','20130121162804475.jpg',0,1,99,'<h3 style=\"margin:0px;padding:0px;color:#ED6C1B;font-size:12px;line-height:30px;font-family:Arial, 宋体;white-space:normal;\">\r\n	注意：\r\n</h3>\r\n<p style=\"margin-top:0px;margin-bottom:0px;padding:0px;line-height:23px;color:#323333;font-family:Arial, 宋体;white-space:normal;\">\r\n	1、本商品并非网站直接发货，会员兑换后的1－2个工作日，网站工作人员将从合作商家采购下单， 具体到货时间取决于商城的发货时间， 发货后会站内信通知会员，请您留意；<br style=\"margin:0px;padding:0px;\" />\r\n2、如果缺货，我们会在1~2个工作日把积分返回到您的账户，并站内信提醒；<br style=\"margin:0px;padding:0px;\" />\r\n3、本价格已经包含快递费，如果您填写的收货地址是合作商家快递无法到达的，我们将会在1~2个工作日把积分返回到您的账户；<br style=\"margin:0px;padding:0px;\" />\r\n4、只能使用论坛所获积分兑换；<br style=\"margin:0px;padding:0px;\" />\r\n5、本礼品是网站从第三方网站采购发货，因采购价格时常有些变动，为了方便操作，网站和会员双方均不需要作差价补偿。\r\n</p>',15,1358756902,1358759332,1,56,6,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_integral_gift_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_integral_limit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_integral_limit`;

CREATE TABLE `xnfy520_yaomai_integral_limit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `first_num` varchar(255) DEFAULT NULL,
  `last_num` varchar(255) DEFAULT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_integral_limit` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_integral_limit` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_integral_limit` (`id`, `name`, `publish`, `first_num`, `last_num`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(54,'1-3000',1,'1','3000',99,'',1358739491,1358758372),
	(55,'3000-4000',1,'3000','4000',99,'',1358739554,1358758389),
	(56,'4000-5000',1,'4000','5000',99,'',1358739578,1358758405),
	(57,'5000-6000',1,'5000','6000',99,'',1358739599,0),
	(58,'6000-8000',1,'6000','8000',99,'',1358739619,0),
	(59,'8000-10000',1,'8000','10000',99,'',1358739680,0),
	(60,'10000以上',1,'','10000',99,'',1358739699,1358739791);

/*!40000 ALTER TABLE `xnfy520_yaomai_integral_limit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_last_update
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_last_update`;

CREATE TABLE `xnfy520_yaomai_last_update` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_last_update` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_last_update` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_last_update` (`id`, `name`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(30,'森马男棉衣休闲保暖加厚男士可脱','http://www.demohour.com/projects/314175',1,99,'',1358412250,1358413151),
	(29,'美特斯邦威正品 高档男士冬季加','http://www.demohour.com/projects/303526',1,99,'',1358412229,1358413166),
	(28,'秋冬新款 唐狮正品加厚磨毛衬衫','http://www.demohour.com/projects/300566',1,99,'',1358412208,1358413178),
	(27,'法国啄木鸟正品  男士休闲裤 ','http://www.demohour.com/projects/299062',1,99,'',1358412174,1358413185),
	(26,'宝宝益智早教53粒盒装新款彩色','http://zhe.juanpi.com/item/11blsc',1,99,'',1358412104,1358413196);

/*!40000 ALTER TABLE `xnfy520_yaomai_last_update` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_links`;

CREATE TABLE `xnfy520_yaomai_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `link` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `CreateDate` int(10) unsigned NOT NULL,
  `ModifyDate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_links` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_links` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_links` (`id`, `name`, `publish`, `sort`, `link`, `description`, `CreateDate`, `ModifyDate`)
VALUES
	(1,'Paper Submission',1,99,'http://www.163.com','sdfsdfdsf',1353553023,1353553289),
	(2,'Manuscript Tracking System',1,99,'','',1353553033,0),
	(3,'Call for Special Issue Proposals',1,99,'','',1353553044,0),
	(4,'Call for New Journal Proposals',1,99,'','',1353553057,1353647233);

/*!40000 ALTER TABLE `xnfy520_yaomai_links` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_member_order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_member_order`;

CREATE TABLE `xnfy520_yaomai_member_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `out_trade_no` varchar(100) NOT NULL,
  `total_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `create_date` int(11) NOT NULL,
  `pay_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `alipay_data` text,
  `ebank_data` text,
  `commodity_type` tinyint(1) unsigned NOT NULL,
  `commodity_data` text,
  `abolish` tinyint(1) unsigned DEFAULT '0',
  `address` varchar(255) DEFAULT NULL,
  `other_data` text,
  `abolish_date` int(10) unsigned DEFAULT NULL,
  `abolish_dispose` tinyint(1) unsigned DEFAULT '0',
  `shipments_data` text,
  `manual_data` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_member_order` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_member_order` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_member_order` (`id`, `uid`, `username`, `out_trade_no`, `total_fee`, `create_date`, `pay_type`, `alipay_data`, `ebank_data`, `commodity_type`, `commodity_data`, `abolish`, `address`, `other_data`, `abolish_date`, `abolish_dispose`, `shipments_data`, `manual_data`)
VALUES
	(1,42,'tianyun1','8182546731',2420.00,1376452818,0,NULL,NULL,1,'[{\"id\":\"55\",\"by_user\":\"42\",\"by_comodity\":\"10026\",\"quantity\":\"7\",\"create_date\":\"1376452803\",\"type\":\"1\",\"Commodity\":{\"id\":\"10026\",\"no\":\"3309174731\",\"pid\":\"1\",\"cid\":\"33\",\"name\":\"\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\",\"image\":\"20130725102335932.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"340.00\",\"create_date\":\"1374719033\",\"modify_date\":\"1375263012\",\"description\":\"sffefef\",\"stylist_id\":\"1\",\"stylist_say\":\"232342424\",\"measure\":\"3.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"127\",\"lid\":\"10026\",\"image\":\"20130725102339204.jpg\",\"bys\":\"1\"},{\"id\":\"128\",\"lid\":\"10026\",\"image\":\"20130725102403484.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":{\"id\":\"1\",\"name\":\"\\u9b4f\\u6e05\",\"image\":\"20130724160944667.jpg\",\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"\",\"create_date\":\"1374653299\",\"modify_date\":\"1374653388\"}},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"2380.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"2380.00\",\"price_total\":\"2,420.00\",\"logistics\":\"140.00\",\"delivery_price\":\"20.00\",\"coupon\":\"100.00\"}',NULL,0,NULL,NULL),
	(2,42,'tianyun1','6092546731',2910.00,1376452906,0,NULL,NULL,1,'[{\"id\":\"56\",\"by_user\":\"42\",\"by_comodity\":\"10020\",\"quantity\":\"100\",\"create_date\":\"1376452895\",\"type\":\"1\",\"Commodity\":{\"id\":\"10020\",\"no\":\"0909464731\",\"pid\":\"1\",\"cid\":\"33\",\"name\":\"\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\",\"image\":\"20130724145758526.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"30.00\",\"create_date\":\"1374649090\",\"modify_date\":\"1376020275\",\"description\":\"\",\"stylist_id\":\"0\",\"stylist_say\":\"\",\"measure\":\"1.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"116\",\"lid\":\"10020\",\"image\":\"20130724145802155.jpg\",\"bys\":\"1\"},{\"id\":\"117\",\"lid\":\"10020\",\"image\":\"20130724151458945.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":null},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"3000.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"3000.00\",\"price_total\":\"2,910.00\",\"logistics\":\"60.00\",\"delivery_price\":\"20.00\",\"coupon\":\"150.00\"}',NULL,0,NULL,NULL),
	(3,42,'tianyun1','0459546731',2400.00,1376459540,0,NULL,NULL,1,'[{\"id\":\"57\",\"by_user\":\"42\",\"by_comodity\":\"10019\",\"quantity\":\"60\",\"create_date\":\"1376458981\",\"type\":\"1\",\"Commodity\":{\"id\":\"10019\",\"no\":\"1276464731\",\"pid\":\"1\",\"cid\":\"30\",\"name\":\"\\u5e8a\\u5b50\\u7c7b3\\u5e8a\\u5b50\\u7c7b3\\u5e8a\\u5b50\\u7c7b3\\u5e8a\\u5b50\\u7c7b3\",\"image\":\"20130724141309784.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"40.00\",\"create_date\":\"1374646721\",\"modify_date\":\"1376020284\",\"description\":\"\",\"stylist_id\":\"0\",\"stylist_say\":\"\",\"measure\":\"2.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"115\",\"lid\":\"10019\",\"image\":\"20130724141312453.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":null},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"2400.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"2400.00\",\"price_total\":\"2,400.00\",\"logistics\":\"100.00\",\"delivery_price\":\"20.00\",\"coupon\":\"100.00\"}',NULL,0,NULL,NULL),
	(4,42,'tianyun1','8479546731',150.00,1376459748,0,NULL,NULL,1,'[{\"id\":\"58\",\"by_user\":\"42\",\"by_comodity\":\"10020\",\"quantity\":\"3\",\"create_date\":\"1376459727\",\"type\":\"1\",\"Commodity\":{\"id\":\"10020\",\"no\":\"0909464731\",\"pid\":\"1\",\"cid\":\"33\",\"name\":\"\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\",\"image\":\"20130724145758526.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"30.00\",\"create_date\":\"1374649090\",\"modify_date\":\"1376020275\",\"description\":\"\",\"stylist_id\":\"0\",\"stylist_say\":\"\",\"measure\":\"1.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"116\",\"lid\":\"10020\",\"image\":\"20130724145802155.jpg\",\"bys\":\"1\"},{\"id\":\"117\",\"lid\":\"10020\",\"image\":\"20130724151458945.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":null},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"90.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"90.00\",\"price_total\":\"150.00\",\"logistics\":\"60.00\",\"delivery_price\":\"20.00\",\"coupon\":\"0\"}',NULL,0,NULL,NULL),
	(5,42,'tianyun1','2690646731',480.00,1376460962,0,NULL,NULL,1,'[{\"id\":\"59\",\"by_user\":\"42\",\"by_comodity\":\"10026\",\"quantity\":\"1\",\"create_date\":\"1376459846\",\"type\":\"1\",\"Commodity\":{\"id\":\"10026\",\"no\":\"3309174731\",\"pid\":\"1\",\"cid\":\"33\",\"name\":\"\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\",\"image\":\"20130725102335932.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"340.00\",\"create_date\":\"1374719033\",\"modify_date\":\"1375263012\",\"description\":\"sffefef\",\"stylist_id\":\"1\",\"stylist_say\":\"232342424\",\"measure\":\"3.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"127\",\"lid\":\"10026\",\"image\":\"20130725102339204.jpg\",\"bys\":\"1\"},{\"id\":\"128\",\"lid\":\"10026\",\"image\":\"20130725102403484.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":{\"id\":\"1\",\"name\":\"\\u9b4f\\u6e05\",\"image\":\"20130724160944667.jpg\",\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"\",\"create_date\":\"1374653299\",\"modify_date\":\"1374653388\"}},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"340.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"340.00\",\"price_total\":\"480.00\",\"logistics\":\"140.00\",\"delivery_price\":\"20.00\",\"coupon\":\"0\"}',NULL,0,NULL,NULL),
	(6,42,'tianyun1','0201646731',1500.00,1376461020,0,NULL,NULL,1,'[{\"id\":\"60\",\"by_user\":\"42\",\"by_comodity\":\"10026\",\"quantity\":\"4\",\"create_date\":\"1376461010\",\"type\":\"1\",\"Commodity\":{\"id\":\"10026\",\"no\":\"3309174731\",\"pid\":\"1\",\"cid\":\"33\",\"name\":\"\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\",\"image\":\"20130725102335932.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"340.00\",\"create_date\":\"1374719033\",\"modify_date\":\"1375263012\",\"description\":\"sffefef\",\"stylist_id\":\"1\",\"stylist_say\":\"232342424\",\"measure\":\"3.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"127\",\"lid\":\"10026\",\"image\":\"20130725102339204.jpg\",\"bys\":\"1\"},{\"id\":\"128\",\"lid\":\"10026\",\"image\":\"20130725102403484.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":{\"id\":\"1\",\"name\":\"\\u9b4f\\u6e05\",\"image\":\"20130724160944667.jpg\",\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"\",\"create_date\":\"1374653299\",\"modify_date\":\"1374653388\"}},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"1360.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"1360.00\",\"price_total\":\"1,500.00\",\"logistics\":\"140.00\",\"delivery_price\":\"20.00\",\"coupon\":\"0\"}',NULL,0,NULL,NULL),
	(7,42,'tianyun1','4051646731',1200.00,1376461504,0,NULL,NULL,1,'[{\"id\":\"61\",\"by_user\":\"42\",\"by_comodity\":\"10027\",\"quantity\":\"4\",\"create_date\":\"1376461475\",\"type\":\"1\",\"Commodity\":{\"id\":\"10027\",\"no\":\"3784084731\",\"pid\":\"3\",\"cid\":\"46\",\"name\":\"fefefefef\",\"image\":\"20130801093007542.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"30.00\",\"create_date\":\"1374804873\",\"modify_date\":\"1375843437\",\"description\":\"sfefe\",\"stylist_id\":\"2\",\"stylist_say\":\"\\u5173\\u4e8e\\u52a0\\u65af\\u987f\\u6c99\\u53d1\\u548c\\u7231\\u5fc3\\u5ea7\\u6905\\u662f\\u4e00\\u4e2a\\u8001\\u6d3e\\u7684\\uff0c\\u8ff7\\u4eba\\u7684\\u6c1b\\u56f4\\u3002\\u8bd5\\u60f3\\u4e00\\u4e0b\\uff0c\\u8fd9\\u4e9b\\u66f2\\u7ebf\\uff0c\\u8272\\u5f69\\u662f\\u590d\\u6742\\u7684\\uff0c\\u662f\\u86cb\\u7cd5\\u4e0a\\u7684\\u6a31\\u6843\\u5929\",\"measure\":\"22.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"136\",\"lid\":\"10027\",\"image\":\"20130801093016654.jpg\",\"bys\":\"1\"},{\"id\":\"137\",\"lid\":\"10027\",\"image\":\"20130801093031748.jpg\",\"bys\":\"1\"},{\"id\":\"138\",\"lid\":\"10027\",\"image\":\"20130801103230566.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":[{\"id\":\"1\",\"name\":\"\\u58f0\\u660e\\u98ce\\u683c\",\"image\":\"20130801092931291.jpg\",\"icon\":null,\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"<span style=\\\"font-family:Simsun;line-height:20px;white-space:normal;\\\">\\u5f53\\u4ee3\\u7684\\u7ecf\\u5178\\u95fa\\u623f\\u98ce\\u683c\\u8f6e\\u5ed3\\uff0c\\u66f4\\u65b0\\u7684\\u5916\\u89c2\\u76f8\\u6bd4\\u80cc\\u53f0\\u8bcd\\u3002\\u5728\\u4e00\\u7cfb\\u5217\\u7684\\u989c\\u8272\\u3002<\\/span>\",\"create_date\":\"1374807443\",\"modify_date\":\"1375320572\",\"did\":\"10027\"},{\"id\":\"3\",\"name\":\"\\u8d34\\u5fc3\\u7684\\u8bbe\\u8ba1\",\"image\":\"20130801090438365.jpg\",\"icon\":null,\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"<span style=\\\"font-family:Simsun;line-height:20px;white-space:normal;\\\">\\u6bcf\\u4e00\\u4e2a\\u89d2\\u5ea6\\u8003\\u8651\\uff0c\\u624b\\u81c2\\uff0c\\u624b\\u51fa\\u8eab\\u7684\\u817f\\u548c\\u89d2\\u8936\\u80cc\\u9762\\u6eda\\u52a8\\u3002\\u4e00\\u4e2a\\u7f8e\\u4e3d\\u7684\\u72ec\\u7acb\\u7684\\u4e00\\u5757\\u3002<\\/span>\",\"create_date\":\"1374808752\",\"modify_date\":\"1375320369\",\"did\":\"10027\"},{\"id\":\"4\",\"name\":\"\\u771f\\u6b63\\u7684\\u5962\\u4f88\\u54c1\",\"image\":\"20130801092708836.jpg\",\"icon\":null,\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"<span style=\\\"font-family:Simsun;line-height:20px;white-space:normal;\\\">\\u8fd9\\u771f\\u7684\\u662f\\u8212\\u9002 - \\u5177\\u6709\\u5f39\\u6027\\uff0c\\u4f46\\u652f\\u6301\\u9759\\u5750\\u548c\\u7efc\\u5408\\u5ea7\\u57ab\\u65e0\\u7f1d\\u5b8c\\u6210\\u3002\\u8c6a\\u534e\\u6bd4\\u5229\\u65f6\\u5929\\u9e45\\u7ed2\\u3002<\\/span>\",\"create_date\":\"1375320435\",\"modify_date\":\"0\",\"did\":\"10027\"},{\"id\":\"5\",\"name\":\"\\u5728\\u82f1\\u56fd\\u624b\\u5de5\\u5236\\u4f5c\",\"image\":\"20130801092727944.jpg\",\"icon\":null,\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"<span style=\\\"font-family:Simsun;line-height:20px;white-space:normal;\\\">\\u6574\\u4e2a\\u96c6\\u5408\\u5728\\u82f1\\u56fd\\u7531\\u624b\\u5de5\\u7cbe\\u5fc3\\u5236\\u4f5c\\u7684\\uff0c\\u6211\\u4eec\\u7684\\u5bb6\\u5ead\\u5f0f\\u7ecf\\u8425\\u7684\\u5236\\u9020\\u5546\\u3002\\u6df7\\u5408\\u548c\\u5339\\u914d\\uff0c\\u4e0d\\u62d8\\u4e00\\u683c\\u7684\\u5916\\u89c2\\u989c\\u8272\\u3002<\\/span>\",\"create_date\":\"1375320454\",\"modify_date\":\"0\",\"did\":\"10027\"}],\"Stylist\":{\"id\":\"2\",\"name\":\"\\u6768\\u6587\\u6bc5\",\"image\":\"20130724161001644.jpg\",\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"\",\"create_date\":\"1374653345\",\"modify_date\":\"1374653404\"}},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"120.00\"},{\"id\":\"62\",\"by_user\":\"42\",\"by_comodity\":\"10028\",\"quantity\":\"9\",\"create_date\":\"1376461491\",\"type\":\"1\",\"Commodity\":{\"id\":\"10028\",\"no\":\"1679084731\",\"pid\":\"3\",\"cid\":\"45\",\"name\":\"sefsfsefsef\",\"image\":\"20130726113550803.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"20.00\",\"create_date\":\"1374809761\",\"modify_date\":null,\"description\":\"\",\"stylist_id\":\"0\",\"stylist_say\":\"\",\"measure\":\"0.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"134\",\"lid\":\"10028\",\"image\":\"20130726113558323.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":null},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"180.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"300.00\",\"price_total\":\"1,200.00\",\"logistics\":\"900.00\",\"delivery_price\":\"20.00\",\"coupon\":\"0\"}',NULL,0,NULL,NULL),
	(8,42,'tianyun1','4782646731',480.00,1376462874,0,NULL,NULL,1,'[{\"id\":\"63\",\"by_user\":\"42\",\"by_comodity\":\"10026\",\"quantity\":\"1\",\"create_date\":\"1376462867\",\"type\":\"1\",\"Commodity\":{\"id\":\"10026\",\"no\":\"3309174731\",\"pid\":\"1\",\"cid\":\"33\",\"name\":\"\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\",\"image\":\"20130725102335932.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"340.00\",\"create_date\":\"1374719033\",\"modify_date\":\"1375263012\",\"description\":\"sffefef\",\"stylist_id\":\"1\",\"stylist_say\":\"232342424\",\"measure\":\"3.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"127\",\"lid\":\"10026\",\"image\":\"20130725102339204.jpg\",\"bys\":\"1\"},{\"id\":\"128\",\"lid\":\"10026\",\"image\":\"20130725102403484.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":{\"id\":\"1\",\"name\":\"\\u9b4f\\u6e05\",\"image\":\"20130724160944667.jpg\",\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"\",\"create_date\":\"1374653299\",\"modify_date\":\"1374653388\"}},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"340.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"340.00\",\"price_total\":\"480.00\",\"logistics\":\"140.00\",\"delivery_price\":\"20.00\",\"coupon\":\"0\"}',NULL,0,NULL,NULL),
	(9,42,'tianyun1','0378986731',1450.00,1376898730,0,NULL,NULL,1,'[{\"id\":\"64\",\"by_user\":\"42\",\"by_comodity\":\"10026\",\"quantity\":\"4\",\"create_date\":\"1376733965\",\"type\":\"1\",\"Commodity\":{\"id\":\"10026\",\"no\":\"3309174731\",\"pid\":\"1\",\"cid\":\"33\",\"name\":\"\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\\u5e8a\\u5b50\\u7c7b1\",\"image\":\"20130725102335932.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"1\",\"price\":\"340.00\",\"create_date\":\"1374719033\",\"modify_date\":\"1375263012\",\"description\":\"sffefef\",\"stylist_id\":\"1\",\"stylist_say\":\"232342424\",\"measure\":\"3.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"127\",\"lid\":\"10026\",\"image\":\"20130725102339204.jpg\",\"bys\":\"1\"},{\"id\":\"128\",\"lid\":\"10026\",\"image\":\"20130725102403484.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":{\"id\":\"1\",\"name\":\"\\u9b4f\\u6e05\",\"image\":\"20130724160944667.jpg\",\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"\",\"create_date\":\"1374653299\",\"modify_date\":\"1374653388\"}},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"1360.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"2\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"1360.00\",\"price_total\":\"1450.00\",\"logistics\":\"140.00\",\"delivery_price\":\"200.00\",\"coupon\":\"50.00\"}',NULL,0,NULL,NULL),
	(10,42,'tianyun1','3309986731',2870.00,1376899033,3,NULL,NULL,1,'[{\"id\":\"65\",\"by_user\":\"42\",\"by_comodity\":\"10023\",\"quantity\":\"100\",\"create_date\":\"1376899019\",\"type\":\"1\",\"Commodity\":{\"id\":\"10023\",\"no\":\"5186174731\",\"pid\":\"2\",\"cid\":\"43\",\"name\":\"seffefef\",\"image\":\"20130725094616728.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"1\",\"price\":\"30.00\",\"create_date\":\"1374716815\",\"modify_date\":\"1374803818\",\"description\":\"1\",\"stylist_id\":\"1\",\"stylist_say\":\"sefsfsfsef\",\"measure\":\"0.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"121\",\"lid\":\"10023\",\"image\":\"20130725094623886.jpg\",\"bys\":\"1\"},{\"id\":\"122\",\"lid\":\"10023\",\"image\":\"20130725094629963.jpg\",\"bys\":\"1\"},{\"id\":\"123\",\"lid\":\"10023\",\"image\":\"20130725094634363.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":{\"id\":\"1\",\"name\":\"\\u9b4f\\u6e05\",\"image\":\"20130724160944667.jpg\",\"link\":\"\",\"publish\":\"1\",\"sort\":\"99\",\"description\":\"\",\"create_date\":\"1374653299\",\"modify_date\":\"1374653388\"}},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"3000.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"3\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"3000.00\",\"price_total\":\"2870.00\",\"logistics\":\"20.00\",\"delivery_price\":\"200.00\",\"coupon\":\"150.00\"}',NULL,0,NULL,'{\"remarks\":\"\\u809d\\u810f\",\"update_date\":1376903272}'),
	(11,42,'tianyun1','3291438731',140.00,1378341923,0,NULL,NULL,1,'[{\"id\":\"35\",\"by_user\":\"42\",\"by_comodity\":\"10019\",\"quantity\":\"1\",\"create_date\":\"1378341904\",\"type\":\"1\",\"Commodity\":{\"id\":\"10019\",\"no\":\"1276464731\",\"pid\":\"1\",\"cid\":\"30\",\"name\":\"\\u5e8a\\u5b50\\u7c7b3\\u5e8a\\u5b50\\u7c7b3\\u5e8a\\u5b50\\u7c7b3\\u5e8a\\u5b50\\u7c7b3\",\"image\":\"20130724141309784.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"1\",\"price\":\"40.00\",\"create_date\":\"1374646721\",\"modify_date\":\"1376020284\",\"description\":\"\",\"stylist_id\":\"0\",\"stylist_say\":\"\",\"measure\":\"2.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"115\",\"lid\":\"10019\",\"image\":\"20130724141312453.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":null},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"40.00\"}]',0,'{\"id\":\"28\",\"by_user\":\"42\",\"consignee\":\"\\u5c0f\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u6781\\u5730\",\"zip\":\"234234\",\"cellphone\":\"13565656566\",\"phone\":\"\",\"create_date\":\"1376298647\",\"status\":\"0\"}','{\"use_address\":\"28\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"40.00\",\"price_total\":\"140.00\",\"logistics\":\"100.00\",\"delivery_price\":\"200.00\",\"coupon\":\"0\"}',NULL,0,NULL,NULL),
	(12,45,'123456','7302438731',90.00,1378342037,0,NULL,NULL,1,'[{\"id\":\"36\",\"by_user\":\"45\",\"by_comodity\":\"10020\",\"quantity\":\"1\",\"create_date\":\"1378341994\",\"type\":\"1\",\"Commodity\":{\"id\":\"10020\",\"no\":\"0909464731\",\"pid\":\"1\",\"cid\":\"33\",\"name\":\"\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\\u5e8a\\u5b50\\u7c7b2\",\"image\":\"20130724145758526.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"2\",\"price\":\"30.00\",\"create_date\":\"1374649090\",\"modify_date\":\"1376020275\",\"description\":\"\",\"stylist_id\":\"0\",\"stylist_say\":\"\",\"measure\":\"1.00\",\"sales_volume\":\"0\",\"CommodityImages\":[{\"id\":\"116\",\"lid\":\"10020\",\"image\":\"20130724145802155.jpg\",\"bys\":\"1\"},{\"id\":\"117\",\"lid\":\"10020\",\"image\":\"20130724151458945.jpg\",\"bys\":\"1\"}],\"CommodityDetails\":null,\"Stylist\":null},\"CIDir\":\"CommodityList\",\"URL\":\"Commodity\",\"xiaoji\":\"30.00\"}]',0,'{\"id\":\"29\",\"by_user\":\"45\",\"consignee\":\"\\u5c0f\\u80d6\",\"where_id\":\"12\",\"where_text\":\"\\u5317\\u4eac\\u5e02 \\u6d77\\u6dc0\\u533a\",\"street\":\"\\u4e0d\\u77e5\\u9053\",\"zip\":\"234234\",\"cellphone\":\"13454545454\",\"phone\":\"\",\"create_date\":\"1378342025\",\"status\":\"0\"}','{\"use_address\":\"29\",\"payment_model\":\"1\",\"payment\":\"1\",\"delivery\":\"1\",\"ask_for_date\":\"\",\"invoice_type\":\"\\u5546\\u4e1a\\u96f6\\u552e\\u53d1\\u7968\",\"invoice_rise\":\"\\u4e2a\\u4eba\",\"invoice_info\":\"\",\"commodity_total\":\"30.00\",\"price_total\":\"90.00\",\"logistics\":\"60.00\",\"delivery_price\":\"200.00\",\"coupon\":\"0\"}',NULL,0,NULL,NULL);

/*!40000 ALTER TABLE `xnfy520_yaomai_member_order` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_member_order_
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_member_order_`;

CREATE TABLE `xnfy520_yaomai_member_order_` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `by_user` int(10) unsigned NOT NULL,
  `out_trade_no` varchar(255) NOT NULL,
  `trade_no` varchar(255) DEFAULT '',
  `total_fee` float(10,2) unsigned DEFAULT '0.00',
  `buyer_email` varchar(255) DEFAULT '',
  `buyer_id` varchar(255) DEFAULT '',
  `trade_status` varchar(255) DEFAULT '',
  `gmt_create` varchar(255) DEFAULT '',
  `gmt_payment` varchar(255) DEFAULT '',
  `notify_time` varchar(255) DEFAULT '',
  `quantity` int(11) NOT NULL,
  `create_date` int(11) NOT NULL,
  `WAIT_BUYER_PAY` varchar(255) DEFAULT '',
  `WAIT_SELLER_SEND_GOODS` varchar(255) DEFAULT '',
  `WAIT_BUYER_CONFIRM_GOODS` varchar(255) DEFAULT '',
  `TRADE_FINISHED` varchar(255) DEFAULT '',
  `commodity_infos` text NOT NULL,
  `address_infos` text NOT NULL,
  `delivery_time` varchar(255) NOT NULL,
  `shippers` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_member_order_` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_member_order_` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_member_order_` (`id`, `by_user`, `out_trade_no`, `trade_no`, `total_fee`, `buyer_email`, `buyer_id`, `trade_status`, `gmt_create`, `gmt_payment`, `notify_time`, `quantity`, `create_date`, `WAIT_BUYER_PAY`, `WAIT_SELLER_SEND_GOODS`, `WAIT_BUYER_CONFIRM_GOODS`, `TRADE_FINISHED`, `commodity_infos`, `address_infos`, `delivery_time`, `shippers`)
VALUES
	(67,32,'5395215455','2013013060105904',0.11,'xnfy520@163.com','2088102703343045','TRADE_FINISHED','2013-01-30 13:59:15','2013-01-30 13:59:23','2013-01-30 14:00:15',4,1359525541,'2013-01-30 13:59:15','2013-01-30 13:59:23','2013-01-30 13:59:49','2013-01-30 14:00:15','{\"1\":{\"id\":\"10006\",\"no\":\"6674476511\",\"pid\":\"23\",\"cid\":\"30\",\"by_user\":\"30\",\"name\":\"\\u535c\\u73c2 \\u9ed1\\u5de7\\u514b\\u529b \\u677e\\u9732\\u5de7\\u514b\\u529b \\u624b\\u5de5\\u5de7\\u514b\\u529b \\u7687\\u5ba4\\u9ea6\\u9999600\\u514b\",\"alias\":\"\\u624b\\u5de5\\u5de7\\u514b\\u529b\",\"image\":\"20130123091010634.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"invoice\":\"0\",\"qs\":\"0\",\"brand\":\"\",\"default_specification\":\"800\\u514b\\/\\u76d2\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u5929\\u95e8\\u5e02\",\"date_of_manufacture\":\"2012-12-04\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"187\",\"original_cost\":\"75.00\",\"current_price\":\"0.02\",\"inventory\":\"774\",\"sales_volume\":\"0\",\"create_date\":\"1356570184\",\"modify_date\":\"1356846993\",\"integral\":\"66\",\"work_off\":\"0\",\"where_id\":\"20\",\"buy_quantity\":\"1\",\"merchant_no\":\"69877664\",\"total_price\":\"0.02\",\"total_integral\":66},\"2\":{\"id\":\"10012\",\"no\":\"7806676531\",\"pid\":\"23\",\"cid\":\"41\",\"by_user\":\"30\",\"name\":\"\\u535c\\u73c2 \\u7ecf\\u51788\\u53e3\\u5473\\u677e\\u9732\\u5de7\\u514b\\u529b\\u793c\\u76d2 \\u624b\\u5de5\\u5de7\\u514b\\u529b 800\\u514b\\u514d\\u90ae\",\"alias\":\"\\u677e\\u9732\\u5de7\\u514b\\u529b\",\"image\":\"20130123090243614.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"0\",\"qs\":\"1\",\"brand\":\"\\u65b0\\u7586\",\"default_specification\":\"360g\\/\\u4e00\\u76d2\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"date_of_manufacture\":\"\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"266\",\"original_cost\":\"99.50\",\"current_price\":\"0.01\",\"inventory\":\"977\",\"sales_volume\":\"0\",\"create_date\":\"1356766087\",\"modify_date\":\"1358487439\",\"integral\":\"97\",\"work_off\":\"0\",\"where_id\":\"22\",\"buy_quantity\":\"2\",\"merchant_no\":\"69877664\",\"CommoditySpecification\":{\"id\":\"106\",\"pid\":\"23\",\"cid\":\"41\",\"lid\":\"10012\",\"specification\":\"\\u89c4\\u683c\\u4e00\",\"sort\":\"32\",\"enable\":\"1\",\"original_cost\":\"99.00\",\"current_price\":\"0.04\",\"inventory\":\"967\",\"integral\":\"10\"},\"total_price\":\"0.08\",\"total_integral\":20},\"3\":{\"id\":\"10012\",\"no\":\"7806676531\",\"pid\":\"23\",\"cid\":\"41\",\"by_user\":\"30\",\"name\":\"\\u535c\\u73c2 \\u7ecf\\u51788\\u53e3\\u5473\\u677e\\u9732\\u5de7\\u514b\\u529b\\u793c\\u76d2 \\u624b\\u5de5\\u5de7\\u514b\\u529b 800\\u514b\\u514d\\u90ae\",\"alias\":\"\\u677e\\u9732\\u5de7\\u514b\\u529b\",\"image\":\"20130123090243614.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"0\",\"qs\":\"1\",\"brand\":\"\\u65b0\\u7586\",\"default_specification\":\"360g\\/\\u4e00\\u76d2\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"date_of_manufacture\":\"\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"266\",\"original_cost\":\"99.50\",\"current_price\":\"0.01\",\"inventory\":\"977\",\"sales_volume\":\"0\",\"create_date\":\"1356766087\",\"modify_date\":\"1358487439\",\"integral\":\"97\",\"work_off\":\"0\",\"where_id\":\"22\",\"buy_quantity\":\"1\",\"merchant_no\":\"69877664\",\"total_price\":\"0.01\",\"total_integral\":97}}','{\"id\":\"39\",\"by_user\":\"32\",\"name\":\"\\u5218\\u521a\",\"provinces\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"street\":\"\\u5c0f\\u521a\",\"zip\":\"344563\",\"mobile\":\"18694069880\",\"pre_phone\":\"\",\"phone\":\"\",\"create_date\":\"1359191585\",\"status\":\"1\"}','只工作日送货',NULL),
	(68,32,'8539503355','2013013060408304',0.10,'xnfy520@163.com','2088102703343045','TRADE_FINISHED','2013-01-30 16:42:44','2013-01-30 16:42:54','2013-01-30 16:50:45',6,1359535350,'2013-01-30 16:42:44','2013-01-30 16:42:54','2013-01-30 16:49:55','2013-01-30 16:50:45','{\"1\":{\"id\":\"10012\",\"no\":\"7806676531\",\"pid\":\"23\",\"cid\":\"41\",\"by_user\":\"30\",\"name\":\"\\u535c\\u73c2 \\u7ecf\\u51788\\u53e3\\u5473\\u677e\\u9732\\u5de7\\u514b\\u529b\\u793c\\u76d2 \\u624b\\u5de5\\u5de7\\u514b\\u529b 800\\u514b\\u514d\\u90ae\",\"alias\":\"\\u677e\\u9732\\u5de7\\u514b\\u529b\",\"image\":\"20130123090243614.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"0\",\"qs\":\"1\",\"brand\":\"\\u65b0\\u7586\",\"default_specification\":\"360g\\/\\u4e00\\u76d2\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"date_of_manufacture\":\"\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"267\",\"original_cost\":\"99.50\",\"current_price\":\"0.01\",\"inventory\":\"976\",\"sales_volume\":\"0\",\"create_date\":\"1356766087\",\"modify_date\":\"1358487439\",\"integral\":\"97\",\"work_off\":\"0\",\"where_id\":\"22\",\"buy_quantity\":\"1\",\"merchant_no\":\"69877664\",\"CommoditySpecification\":{\"id\":\"108\",\"pid\":\"23\",\"cid\":\"41\",\"lid\":\"10012\",\"specification\":\"\\u89c4\\u683c\\u4e09\",\"sort\":\"99\",\"enable\":\"1\",\"original_cost\":\"33.00\",\"current_price\":\"0.03\",\"inventory\":\"650\",\"integral\":\"30\"},\"total_price\":\"0.03\",\"total_integral\":30},\"2\":{\"id\":\"10001\",\"no\":\"6674476531\",\"pid\":\"24\",\"cid\":\"35\",\"by_user\":\"26\",\"name\":\"\\u65b0\\u7528\\u6237\\u5546\\u54c1\\u4e8c\",\"alias\":\"\\u68a8\\u5b50\",\"image\":\"20130123090458760.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"0\",\"qs\":\"1\",\"brand\":\"\",\"default_specification\":\"960m\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u5929\\u95e8\\u5e02\",\"date_of_manufacture\":\"2012-12-01\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"1\",\"original_cost\":\"33.00\",\"current_price\":\"0.02\",\"inventory\":\"33\",\"sales_volume\":\"0\",\"create_date\":\"1356744766\",\"modify_date\":\"1357281897\",\"integral\":\"78\",\"work_off\":\"0\",\"where_id\":\"20\",\"buy_quantity\":\"2\",\"merchant_no\":\"69877665\",\"total_price\":\"0.04\",\"total_integral\":156},\"3\":{\"id\":\"10015\",\"no\":\"9587637531\",\"pid\":\"24\",\"cid\":\"34\",\"by_user\":\"26\",\"name\":\"\\u590f\\u5b63\\u98df\\u54c1\",\"alias\":\"\\u590f\\u5b63\",\"image\":\"20130123090446547.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"1\",\"qs\":\"1\",\"brand\":\"\",\"default_specification\":\"\\u4e00\\u6846\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u6b66\\u6c49\\u5e02 \\u6b66\\u660c\\u533a\",\"date_of_manufacture\":\"2012-12-30\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"9\",\"original_cost\":\"99.00\",\"current_price\":\"0.01\",\"inventory\":\"5353\",\"sales_volume\":\"0\",\"create_date\":\"1357367859\",\"modify_date\":null,\"integral\":\"567\",\"work_off\":\"0\",\"where_id\":\"13\",\"buy_quantity\":\"3\",\"merchant_no\":\"69877665\",\"total_price\":\"0.03\",\"total_integral\":1701}}','{\"id\":\"39\",\"by_user\":\"32\",\"name\":\"\\u5218\\u521a\",\"provinces\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"street\":\"\\u5c0f\\u521a\",\"zip\":\"344563\",\"mobile\":\"18694069880\",\"pre_phone\":\"\",\"phone\":\"\",\"create_date\":\"1359191585\",\"status\":\"1\"}','工作日、双休日与假日均可送货',NULL),
	(73,32,'8593175672','2013013060408303',0.01,'','','WAIT_SELLER_SEND_GOODS','','','',1,1359612775,'','','','','{\"1\":{\"id\":\"10012\",\"no\":\"7806676531\",\"pid\":\"23\",\"cid\":\"41\",\"by_user\":\"30\",\"name\":\"\\u535c\\u73c2 \\u7ecf\\u51788\\u53e3\\u5473\\u677e\\u9732\\u5de7\\u514b\\u529b\\u793c\\u76d2 \\u624b\\u5de5\\u5de7\\u514b\\u529b 800\\u514b\\u514d\\u90ae\",\"alias\":\"\\u677e\\u9732\\u5de7\\u514b\\u529b\",\"image\":\"20130123090243614.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"0\",\"qs\":\"1\",\"brand\":\"\\u65b0\\u7586\",\"default_specification\":\"360g\\/\\u4e00\\u76d2\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"date_of_manufacture\":\"\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"283\",\"original_cost\":\"99.50\",\"current_price\":\"0.01\",\"inventory\":\"976\",\"sales_volume\":\"1\",\"create_date\":\"1356766087\",\"modify_date\":\"1358487439\",\"integral\":\"97\",\"work_off\":\"0\",\"where_id\":\"22\",\"buy_quantity\":\"1\",\"merchant_no\":\"69877664\",\"total_price\":\"0.01\",\"total_integral\":97}}','{\"id\":\"39\",\"by_user\":\"32\",\"name\":\"\\u5218\\u521a\",\"provinces\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"street\":\"\\u5c0f\\u521a\",\"zip\":\"344563\",\"mobile\":\"18694069880\",\"pre_phone\":\"\",\"phone\":\"\",\"create_date\":\"1359191585\",\"status\":\"1\"}','只工作日送货','31;30'),
	(75,32,'560426','',0.20,'','','WAIT_SELLER_SEND_GOODS','','','',12,1361166420,'','','','','{\"1\":{\"id\":\"10012\",\"no\":\"7806676531\",\"pid\":\"23\",\"cid\":\"41\",\"by_user\":\"30\",\"name\":\"\\u535c\\u73c2 \\u7ecf\\u51788\\u53e3\\u5473\\u677e\\u9732\\u5de7\\u514b\\u529b\\u793c\\u76d2 \\u624b\\u5de5\\u5de7\\u514b\\u529b 800\\u514b\\u514d\\u90ae\",\"alias\":\"\\u677e\\u9732\\u5de7\\u514b\\u529b\",\"image\":\"20130123090243614.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"0\",\"qs\":\"1\",\"brand\":\"\\u65b0\\u7586\",\"default_specification\":\"360g\\/\\u4e00\\u76d2\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"date_of_manufacture\":\"\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"351\",\"original_cost\":\"99.50\",\"current_price\":\"0.01\",\"inventory\":\"975\",\"sales_volume\":\"1\",\"create_date\":\"1356766087\",\"modify_date\":\"1358487439\",\"integral\":\"97\",\"work_off\":\"0\",\"where_id\":\"22\",\"buy_quantity\":\"2\",\"merchant_no\":\"69877664\",\"CommoditySpecification\":{\"id\":\"107\",\"pid\":\"23\",\"cid\":\"41\",\"lid\":\"10012\",\"specification\":\"\\u89c4\\u683c\\u4e8c\",\"sort\":\"35\",\"enable\":\"1\",\"original_cost\":\"11.00\",\"current_price\":\"0.05\",\"inventory\":\"949\",\"integral\":\"20\"},\"total_price\":\"0.10\",\"total_integral\":40},\"2\":{\"id\":\"10013\",\"no\":\"8026586531\",\"pid\":\"27\",\"cid\":\"37\",\"by_user\":\"30\",\"name\":\"\\u539f\\u4ea7\\u5730\\u7279\\u7ea7\\u5927\\u7ea2\\u888d 250\\u514b \\u9999\\u9ad8\\u5473\\u6d53\\u6696\\u8eab\\u517b\\u80c3,\\u964d\\u4e09\\u9ad8\\u5168\\u56fd\\u514d\\u90ae \\u4e70\\u4e09\\u9001\\u4e00\",\"alias\":\"\\u9999\\u9ad8\\u5473\\u6d53\",\"image\":\"20130123090344223.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"1\",\"qs\":\"1\",\"brand\":\"\\u5348\\u5b50\\u8336\\u795e\",\"default_specification\":\"250\\u514b\\/\\u7f50\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u6b66\\u6c49\\u5e02\",\"date_of_manufacture\":\"2012-11-30\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"65\",\"original_cost\":\"198.00\",\"current_price\":\"0.01\",\"inventory\":\"945\",\"sales_volume\":\"0\",\"create_date\":\"1356856208\",\"modify_date\":null,\"integral\":\"88\",\"work_off\":\"0\",\"where_id\":\"13\",\"buy_quantity\":\"3\",\"merchant_no\":\"69877664\",\"total_price\":\"0.03\",\"total_integral\":264},\"3\":{\"id\":\"10014\",\"no\":\"8602827531\",\"pid\":\"23\",\"cid\":\"30\",\"by_user\":\"26\",\"name\":\"\\u65b0\\u5546\\u54c1\\u4e61\\u5473\\u4e00\",\"alias\":\"\\u6a58\\u5b50\",\"image\":\"20130123090425401.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"1\",\"qs\":\"1\",\"brand\":\"\",\"default_specification\":\"465\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u6b66\\u6c49\\u5e02 \\u785a\\u53e3\\u533a\",\"date_of_manufacture\":\"2012-12-31\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"8\",\"original_cost\":\"99.00\",\"current_price\":\"0.01\",\"inventory\":\"8\",\"sales_volume\":\"0\",\"create_date\":\"1357282068\",\"modify_date\":null,\"integral\":\"77\",\"work_off\":\"0\",\"where_id\":\"13\",\"buy_quantity\":\"3\",\"merchant_no\":\"69877665\",\"total_price\":\"0.03\",\"total_integral\":231},\"4\":{\"id\":\"10009\",\"no\":\"6674476534\",\"pid\":\"24\",\"cid\":\"36\",\"by_user\":\"30\",\"name\":\"\\u539f\\u4ea7\\u5730\\u7279\\u7ea7\\u5927\\u7ea2\\u888d 250\\u514b \\u9999\\u9ad8\\u5473\\u6d53\\u6696\\u8eab\\u517b\\u80c3,\\u964d\\u4e09\\u9ad8\",\"alias\":\"\\u7279\\u7ea7\\u5927\\u7ea2\\u888d\",\"image\":\"20130123090334549.jpg\",\"enable\":\"1\",\"recommend\":\"1\",\"invoice\":\"0\",\"qs\":\"0\",\"brand\":\"\\u535c\\u73c2\",\"default_specification\":\"600\\u514b\\/\\u76d2\",\"producing_area\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"date_of_manufacture\":\"2012-12-02\",\"deliver_region\":\"\\u5168\\u56fd\\u914d\\u9001\",\"sort\":\"99\",\"views\":\"31\",\"original_cost\":\"44.00\",\"current_price\":\"0.01\",\"inventory\":\"62\",\"sales_volume\":\"0\",\"create_date\":\"1356657577\",\"modify_date\":\"1357367728\",\"integral\":\"54\",\"work_off\":\"0\",\"where_id\":\"22\",\"buy_quantity\":\"4\",\"merchant_no\":\"69877664\",\"total_price\":\"0.04\",\"total_integral\":216}}','{\"id\":\"39\",\"by_user\":\"32\",\"name\":\"\\u5218\\u521a\",\"provinces\":\"\\u6e56\\u5317\\u7701 \\u8346\\u95e8\\u5e02\",\"street\":\"\\u5c0f\\u521a\",\"zip\":\"344563\",\"mobile\":\"18694069880\",\"pre_phone\":\"\",\"phone\":\"\",\"create_date\":\"1359191585\",\"status\":\"1\"}','只工作日送货','30;26');

/*!40000 ALTER TABLE `xnfy520_yaomai_member_order_` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_member_order_2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_member_order_2`;

CREATE TABLE `xnfy520_yaomai_member_order_2` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `total_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `out_trade_no` varchar(100) NOT NULL DEFAULT '',
  `trade_no` varchar(100) DEFAULT '',
  `trade_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_date` int(11) NOT NULL,
  `pay_date` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT '',
  `commodity_type` tinyint(1) unsigned NOT NULL,
  `pay_type` tinyint(1) unsigned NOT NULL,
  `commodity_data` text NOT NULL,
  `abolish` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `commodity_id` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_member_order_2` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_member_order_2` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_member_order_2` (`id`, `uid`, `total_fee`, `out_trade_no`, `trade_no`, `trade_status`, `create_date`, `pay_date`, `username`, `commodity_type`, `pay_type`, `commodity_data`, `abolish`, `commodity_id`)
VALUES
	(1,41,0.01,'4246216731','',1,1376126424,NULL,'tianyun',4,1,'{\"id\":\"4\",\"no\":\"8830284731\",\"name\":\"\\u4eba\\u5ea7\\u6c99\\u53d1\",\"image\":\"20130801101431473.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"30.00\",\"create_date\":\"1374820388\",\"modify_date\":\"1375323705\",\"description\":\"\",\"details\":\"wwwww\",\"p1\":null,\"p2\":null,\"p3\":null,\"stylist_id\":\"0\",\"stylist_say\":\"\",\"measure\":\"0.00\",\"subscribe\":\"20\",\"expiration_date\":\"1380816000\",\"sales_volume\":\"0\",\"subscribe_volume\":\"0\",\"subscription\":\"20.00\",\"votes\":\"[{\\\"commodity_id\\\":\\\"4\\\",\\\"by_user\\\":\\\"41\\\"}]\",\"vote\":\"16\",\"CommodityImages\":[{\"id\":\"139\",\"lid\":\"4\",\"image\":\"20130801103553470.jpg\",\"bys\":\"2\"},{\"id\":\"140\",\"lid\":\"4\",\"image\":\"20130801103604429.jpg\",\"bys\":\"2\"},{\"id\":\"141\",\"lid\":\"4\",\"image\":\"20130801103723227.jpg\",\"bys\":\"2\"},{\"id\":\"142\",\"lid\":\"4\",\"image\":\"20130801103746913.jpg\",\"bys\":\"2\"}],\"VoteDetails\":null,\"Stylist\":null}',1,4),
	(5,42,0.01,'0218536731','',0,1376358120,NULL,'tianyun1',4,1,'{\"id\":\"4\",\"no\":\"8830284731\",\"name\":\"\\u4eba\\u5ea7\\u6c99\\u53d1\",\"image\":\"20130801101431473.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"30.00\",\"create_date\":\"1374820388\",\"modify_date\":\"1376290076\",\"description\":\"\",\"details\":\"wwwww\",\"p1\":null,\"p2\":null,\"p3\":null,\"stylist_id\":\"0\",\"stylist_say\":\"\",\"measure\":\"0.00\",\"subscribe\":\"20\",\"expiration_date\":\"1378483200\",\"sales_volume\":\"0\",\"subscribe_volume\":\"0\",\"subscription\":\"20.00\",\"votes\":\"[{\\\"commodity_id\\\":\\\"4\\\",\\\"by_user\\\":\\\"41\\\"},{\\\"commodity_id\\\":\\\"4\\\",\\\"by_user\\\":\\\"42\\\"}]\",\"vote\":\"17\",\"CommodityImages\":[{\"id\":\"139\",\"lid\":\"4\",\"image\":\"20130801103553470.jpg\",\"bys\":\"2\"},{\"id\":\"140\",\"lid\":\"4\",\"image\":\"20130801103604429.jpg\",\"bys\":\"2\"},{\"id\":\"141\",\"lid\":\"4\",\"image\":\"20130801103723227.jpg\",\"bys\":\"2\"},{\"id\":\"142\",\"lid\":\"4\",\"image\":\"20130801103746913.jpg\",\"bys\":\"2\"}],\"VoteDetails\":null,\"Stylist\":null}',0,4),
	(4,41,0.01,'5252926731','',0,1376292526,NULL,'tianyun',4,1,'{\"id\":\"4\",\"no\":\"8830284731\",\"name\":\"\\u4eba\\u5ea7\\u6c99\\u53d1\",\"image\":\"20130801101431473.jpg\",\"enable\":\"1\",\"recommend\":\"0\",\"sort\":\"99\",\"views\":\"0\",\"price\":\"30.00\",\"create_date\":\"1374820388\",\"modify_date\":\"1376290076\",\"description\":\"\",\"details\":\"wwwww\",\"p1\":null,\"p2\":null,\"p3\":null,\"stylist_id\":\"0\",\"stylist_say\":\"\",\"measure\":\"0.00\",\"subscribe\":\"20\",\"expiration_date\":\"1378483200\",\"sales_volume\":\"0\",\"subscribe_volume\":\"0\",\"subscription\":\"20.00\",\"votes\":\"[{\\\"commodity_id\\\":\\\"4\\\",\\\"by_user\\\":\\\"41\\\"}]\",\"vote\":\"16\",\"CommodityImages\":[{\"id\":\"139\",\"lid\":\"4\",\"image\":\"20130801103553470.jpg\",\"bys\":\"2\"},{\"id\":\"140\",\"lid\":\"4\",\"image\":\"20130801103604429.jpg\",\"bys\":\"2\"},{\"id\":\"141\",\"lid\":\"4\",\"image\":\"20130801103723227.jpg\",\"bys\":\"2\"},{\"id\":\"142\",\"lid\":\"4\",\"image\":\"20130801103746913.jpg\",\"bys\":\"2\"}],\"VoteDetails\":null,\"Stylist\":null}',0,4);

/*!40000 ALTER TABLE `xnfy520_yaomai_member_order_2` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_merchant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_merchant`;

CREATE TABLE `xnfy520_yaomai_merchant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `by_user` int(10) unsigned NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `sign` varchar(255) DEFAULT NULL,
  `notice` text,
  `promotion` text,
  `where` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `qq1` varchar(255) DEFAULT NULL,
  `qq2` varchar(255) DEFAULT NULL,
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_date` int(10) unsigned DEFAULT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  `details` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_merchant` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_merchant` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_merchant` (`id`, `no`, `name`, `by_user`, `banner`, `sign`, `notice`, `promotion`, `where`, `phone`, `qq1`, `qq2`, `enable`, `status`, `create_date`, `modify_date`, `details`)
VALUES
	(9,'69877664','我的店铺',30,'20121228160006231.jpg','20121221085937201.gif','<p>\r\n	<strong><em><u><s>sdfdsfsdfsdfsdfsdfsdfsdfsdf</s></u></em></strong> \r\n</p>','234324234','15','15107113051','1826222','87524020',1,1,1355985632,NULL,'<p>\r\n	<span style=\"color:#CC33E5;background-color:#CCCCCC;font-size:18px;font-family:\'Courier New\';\"><strong><em><u><s>ttytyutyutyutyu</s></u></em></strong></span> ftghfghfhfhfh<img src=\"http://localhost/HelloWorld/Public/js/kindeditor/plugins/emoticons/images/1.gif\" border=\"0\" alt=\"\" /><img src=\"http://api.map.baidu.com/staticimage?center=121.473704%2C31.230393&zoom=11&width=558&height=360&markers=121.473704%2C31.230393&markerStyles=l%2CA\" alt=\"\" />\r\n</p>'),
	(10,'69877665','新的店铺',26,'20130104144220303.jpg','20130104144226962.jpg','asf','asfasfsadfsaf','20','15636930183','','1565454',1,1,1356677896,NULL,NULL),
	(11,'77578585','',33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1358587577,NULL,NULL),
	(12,'44979695','乐点',39,'20130201135545285.png','20130201135452585.jpg','商铺公告','商铺公告商铺公告商铺公告商铺公告','25','15387132472','','',1,1,1359697944,NULL,NULL);

/*!40000 ALTER TABLE `xnfy520_yaomai_merchant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_merchant_advert
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_merchant_advert`;

CREATE TABLE `xnfy520_yaomai_merchant_advert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `by_user` int(10) unsigned NOT NULL,
  `name` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '9999',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_merchant_advert` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_merchant_advert` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_merchant_advert` (`id`, `by_user`, `name`, `image`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(1,1,'1','20121123105535572.jpg','http://helloworld.com',0,99,'',1351910666,1356662153),
	(2,1,'2','20121123105546654.jpg','',1,99,'',1351910711,1353639348),
	(3,1,'3','20121123105555665.jpg','',1,99,'',1351910762,1353639358),
	(4,1,'4','20121103104611234.jpg','',0,99,'',1351910774,1353640642),
	(5,1,'5','20121103104621335.jpg','',0,99,'',1351910784,1353640643),
	(6,2,'11','20121128151748691.jpg','http://helloworld.com',1,99,'',1351910806,1354087361),
	(7,2,'22','20121103104701605.jpg','http://sdfsf.com',1,99,'',1351910824,1351920143),
	(8,2,'33','20121121084648276.jpg','',1,99,'',1351910835,1353458811),
	(9,30,'广告1','20121222083741315.jpg','http://www.www.www',1,99,'hello',1356069630,1356137850),
	(11,30,'safasfasfd','20121222090859322.jpg','',1,99,'gerg',1356138544,0),
	(12,26,'22','20130104144243139.jpg','',1,99,'',1357281766,0),
	(13,26,'33','20130104144254325.jpg','',1,99,'',1357281775,0),
	(14,39,'22','20130201135753718.jpg','',1,99,'',1359698278,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_merchant_advert` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_node
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_node`;

CREATE TABLE `xnfy520_yaomai_node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `node_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `CreateDate` int(10) unsigned NOT NULL DEFAULT '0',
  `ModifyDate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_node` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_node` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_node` (`id`, `pid`, `node_type`, `name`, `level`, `publish`, `sort`, `description`, `CreateDate`, `ModifyDate`)
VALUES
	(21,0,'Home','前台项目',1,1,99,'',1354688305,1354699469);

/*!40000 ALTER TABLE `xnfy520_yaomai_node` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_other_links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_other_links`;

CREATE TABLE `xnfy520_yaomai_other_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_other_links` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_other_links` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_other_links` (`id`, `name`, `image`, `icon`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(23,'诚信网站','20130117144007369.png',NULL,'',1,99,'',1358399754,1358404809),
	(22,'中国文明网传播文明','20130117131532789.png',NULL,'',1,99,'',1358399734,0),
	(21,'不良信息举报中心','20130117131450872.png',NULL,'',1,99,'',1358399692,0),
	(20,'经营性网站备案信息','20130117131243793.png',NULL,'',1,99,'',1358399564,0),
	(18,'深圳网络警察报警平台','20130117115359234.png',NULL,'',1,99,'',1358399399,0),
	(19,'公共信息安全网络监察','20130117131211358.png',NULL,'',1,99,'',1358399534,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_other_links` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_product_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_product_category`;

CREATE TABLE `xnfy520_yaomai_product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `CreateDate` int(10) unsigned NOT NULL,
  `ModifyDate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table xnfy520_yaomai_product_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_product_list`;

CREATE TABLE `xnfy520_yaomai_product_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//食材ID',
  `cid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '//食材名称',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99' COMMENT '//排序',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '//是否发布',
  `onindex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `details` text COMMENT '//食材描述',
  `image` varchar(255) DEFAULT '',
  `views` int(10) unsigned NOT NULL,
  `CreateDate` int(10) unsigned NOT NULL,
  `ModifyDate` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000',
  `series_list_id` int(10) unsigned NOT NULL,
  `seasons_list_id` int(10) unsigned NOT NULL,
  `filler_list_id` int(10) unsigned NOT NULL,
  `fabric_list_id` int(10) unsigned NOT NULL,
  `specification_list_id` int(10) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `hotsell` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table xnfy520_yaomai_provinces
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_provinces`;

CREATE TABLE `xnfy520_yaomai_provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `description` varchar(255) NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_provinces` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_provinces` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_provinces` (`id`, `name`, `level`, `pid`, `sort`, `publish`, `description`, `create_date`, `modify_date`)
VALUES
	(1,'华中',0,0,99,1,'',1354763156,1356663069),
	(2,'华南',0,0,99,1,'',1354774028,1356662235),
	(3,'华北',0,0,99,1,'',1354774125,0),
	(4,'西南',0,0,99,0,'',1354774165,1356666899),
	(5,'西北',0,0,99,0,'',1354774220,1356666898),
	(6,'华东',0,0,99,0,'',1354864879,1356666888),
	(7,'河南省',1,1,99,1,'',1354929265,1356662313),
	(8,'湖北省',1,1,99,1,'',1354929498,1354932004),
	(9,'广东省',1,2,99,0,'',1354930014,1358216518),
	(10,'广西省',1,2,99,1,'',1354930062,0),
	(11,'海南省',1,2,99,1,'',1354930076,0),
	(22,'荆门市',2,8,99,1,'',1356665390,0),
	(13,'武汉市',2,8,99,1,'',1354935653,1354935674),
	(14,'武昌区',3,13,99,1,'',1354936696,1357276219),
	(15,'江汉区',3,13,99,1,'',1354936719,1357276228),
	(17,'吉林省',1,31,99,1,'',1354944660,1359679083),
	(20,'天门市',2,8,99,1,'',1354955348,1354955665),
	(21,'潜江市',2,8,99,1,'',1354955399,0),
	(23,'洪山区',3,13,99,1,'',1357276237,0),
	(24,'江岸区',3,13,99,1,'',1357276244,0),
	(25,'汉阳区',3,13,99,1,'',1357276250,0),
	(26,'硚口区',3,13,99,1,'',1357276256,0),
	(27,'青山区',3,13,99,1,'',1357276262,0),
	(28,'东西湖区',3,13,99,1,'',1357276268,0),
	(29,'江夏区',3,13,99,1,'',1357276274,0),
	(30,'蔡甸区',3,13,99,1,'',1357276281,0),
	(31,'东北',0,0,99,1,'',1359679068,0),
	(32,'河北省',1,3,99,1,'',1359679107,0),
	(33,'山西省',1,3,99,1,'',1359679119,0),
	(34,'内蒙古',1,3,99,1,'',1359679148,0),
	(35,'辽宁省',1,31,99,1,'',1359679168,0),
	(36,'黑龙江省',1,31,99,1,'',1359679213,0),
	(37,'江苏省',1,6,99,1,'',1359679298,0),
	(38,'浙江省',1,6,99,1,'',1359679310,0),
	(39,'安徽省',1,6,99,1,'',1359679319,0),
	(40,'福建省',1,6,99,1,'',1359679329,0),
	(41,'江西省',1,6,99,1,'',1359679338,0),
	(42,'山东省',1,6,99,1,'',1359679347,0),
	(43,'湖南省',1,1,99,1,'',1359679383,0),
	(44,'四川省',1,4,99,1,'',1359679411,0),
	(45,'贵州省',1,4,99,1,'',1359679420,0),
	(46,'云南省',1,4,99,1,'',1359679429,0),
	(47,'西藏',1,4,99,1,'',1359679450,0),
	(48,'陕西省',1,5,99,1,'',1359679461,1359679467),
	(49,'甘肃省',1,5,99,1,'',1359679483,0),
	(50,'青海省',1,5,99,1,'',1359679503,0),
	(51,'宁夏',1,5,99,1,'',1359679518,0),
	(52,'新疆',1,5,99,1,'',1359679526,0),
	(53,'北京市',1,3,99,1,'',1359679709,1359679814),
	(54,'上海市',1,6,99,1,'',1359679721,1359679806),
	(55,'天津市',1,3,99,1,'',1359679734,1359679797),
	(56,'重庆市',1,4,99,1,'',1359679784,0),
	(57,'郑州市',2,7,99,1,'',1359679950,0),
	(58,'开封市',2,7,99,1,'',1359679962,0),
	(59,'长春市',2,17,99,1,'',1359684227,0),
	(60,'吉林市',2,17,99,1,'',1359684398,0),
	(61,'南关区',3,59,99,1,'',1359684417,0),
	(62,'四平市',2,17,99,1,'',1359684510,0),
	(63,'辽源市',2,17,99,1,'',1359684530,0),
	(64,'平顶山市',2,7,99,1,'',1359684696,0),
	(65,'洛阳市',2,7,99,1,'',1359684702,0),
	(66,'商丘市',2,7,99,1,'',1359684709,0),
	(67,'安阳市',2,7,99,1,'',1359684715,0),
	(68,'新乡市',2,7,99,1,'',1359684723,0),
	(69,'许昌市',2,7,99,1,'',1359684729,0),
	(70,'鹤壁市',2,7,99,1,'',1359684737,0),
	(71,'焦作市',2,7,99,1,'',1359684743,0),
	(72,'濮阳市',2,7,99,1,'',1359684750,0),
	(73,'漯河市',2,7,99,1,'',1359684757,0),
	(74,'三门峡市',2,7,99,1,'',1359684765,0),
	(75,'周口市',2,7,99,1,'',1359684772,0),
	(76,'驻马店市',2,7,99,1,'',1359684778,0),
	(77,'南阳市',2,7,99,1,'',1359684786,0),
	(78,'信阳市',2,7,99,1,'',1359684796,0),
	(79,'中原区',3,57,99,1,'',1359684825,0),
	(80,'二七区',3,57,99,1,'',1359684832,0),
	(81,'金水区',3,57,99,1,'',1359684847,0),
	(82,'通化市',2,17,99,1,'',1359688619,0),
	(83,'白山市 ',2,17,99,1,'',1359688680,0),
	(84,'松原市 ',2,17,99,1,'',1359688690,0),
	(85,'白城市',2,17,99,1,'',1359688701,0),
	(86,'延边朝鲜族自治州',2,17,99,1,'',1359688721,0),
	(87,'长白山管理委员会 ',2,17,99,1,'',1359688732,0),
	(88,'朝阳区',3,59,99,1,'',1359696000,0),
	(89,'宽城区',3,59,99,1,'',1359696017,0),
	(90,'绿园区',3,59,99,1,'',1359696027,0),
	(91,'双阳区',3,59,99,1,'',1359696535,0),
	(92,'二道区',3,59,99,1,'',1359696559,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_provinces` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_role`;

CREATE TABLE `xnfy520_yaomai_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL DEFAULT '0',
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_role` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_role` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_role` (`id`, `name`, `publish`, `sort`, `description`, `create_date`, `modify_date`, `level`)
VALUES
	(1,'管理员',1,99,'',1355103113,1374551955,0),
	(16,'会员',1,99,'',1355880397,1374551962,5);

/*!40000 ALTER TABLE `xnfy520_yaomai_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_role_user`;

CREATE TABLE `xnfy520_yaomai_role_user` (
  `roleid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_role_user` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_role_user` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_role_user` (`roleid`, `userid`)
VALUES
	(1,1),
	(2,11),
	(2,13),
	(2,14);

/*!40000 ALTER TABLE `xnfy520_yaomai_role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_search_key
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_search_key`;

CREATE TABLE `xnfy520_yaomai_search_key` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `counts` int(10) unsigned NOT NULL DEFAULT '0',
  `create_date` int(10) unsigned NOT NULL DEFAULT '0',
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_search_key` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_search_key` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_search_key` (`id`, `name`, `counts`, `create_date`, `modify_date`)
VALUES
	(11,'经典',1,1374456772,1374456772),
	(12,'巧克',1,1374456781,1374456781);

/*!40000 ALTER TABLE `xnfy520_yaomai_search_key` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_season_when_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_season_when_category`;

CREATE TABLE `xnfy520_yaomai_season_when_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_season_when_category` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_season_when_category` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_season_when_category` (`id`, `name`, `sort`, `publish`, `description`, `create_date`, `modify_date`)
VALUES
	(38,'冬季',99,1,'',1356314881,NULL),
	(37,'夏季',99,1,'',1356314871,NULL),
	(36,'秋季',99,1,'',1356314864,NULL),
	(35,'春季',99,1,'',1356314857,NULL),
	(39,'1',99,1,'',1356325461,NULL),
	(40,'456',99,1,'',1356325467,NULL),
	(41,'2',99,1,'',1356325477,NULL),
	(42,'3',99,1,'',1356325482,NULL),
	(43,'453',99,1,'',1356325488,NULL),
	(44,'4535',99,1,'',1356325495,NULL),
	(45,'4565',99,1,'',1356325503,NULL),
	(46,'65',99,1,'',1356325510,NULL),
	(47,'546',99,1,'',1356325517,NULL),
	(48,'4563',99,1,'',1356325590,NULL),
	(49,'45378',99,1,'',1356325597,NULL),
	(50,'76',99,1,'',1356325601,NULL),
	(51,'786',99,1,'',1356325607,NULL),
	(52,'45',99,1,'',1356325612,NULL),
	(53,'764',99,1,'',1356325620,NULL),
	(54,'ip',99,1,'',1356325648,NULL),
	(55,'dfgh',99,1,'',1356325653,NULL);

/*!40000 ALTER TABLE `xnfy520_yaomai_season_when_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_series_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_series_list`;

CREATE TABLE `xnfy520_yaomai_series_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `CreateDate` int(10) unsigned NOT NULL DEFAULT '0',
  `ModifyDate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_series_list` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_series_list` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_series_list` (`id`, `name`, `publish`, `sort`, `description`, `CreateDate`, `ModifyDate`)
VALUES
	(8,'林',0,99,'heihei00088888999',1352188333,1352356675),
	(7,'67868',1,99,'',1352188168,1352277648),
	(6,'678768',1,99,'7686dfsdfsf',1352188161,1352277652),
	(5,'asfsadf',1,99,'ssadf67876888',1352107541,1352354442),
	(9,'rty',1,99,'67868768',1352188390,1352356673),
	(10,'okok8888',1,99,'sdfsfdsfsdfsfsfsfsdf8787',1352188512,1352357600),
	(20,'6788786',1,99,'',1352278035,1352527818);

/*!40000 ALTER TABLE `xnfy520_yaomai_series_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_soft_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_soft_category`;

CREATE TABLE `xnfy520_yaomai_soft_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '9999',
  `description` varchar(255) DEFAULT NULL,
  `CreateDate` int(10) unsigned NOT NULL,
  `ModifyDate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_soft_category` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_soft_category` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_soft_category` (`id`, `name`, `image`, `publish`, `sort`, `description`, `CreateDate`, `ModifyDate`)
VALUES
	(10,'heiha','20121121111933352.gif',1,99,'',1353468026,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_soft_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_stylist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_stylist`;

CREATE TABLE `xnfy520_yaomai_stylist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_stylist` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_stylist` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_stylist` (`id`, `name`, `image`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(1,'魏清','20130724160944667.jpg','',1,99,'',1374653299,1374653388),
	(2,'杨文毅','20130724161001644.jpg','',1,99,'',1374653345,1374653404);

/*!40000 ALTER TABLE `xnfy520_yaomai_stylist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_system_announcement
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_system_announcement`;

CREATE TABLE `xnfy520_yaomai_system_announcement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_system_announcement` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_system_announcement` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_system_announcement` (`id`, `name`, `image`, `icon`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`)
VALUES
	(28,'sefesf','',NULL,'http://hello.com',1,99,'sefsfsf',1376904447,1376905039),
	(27,'sefes','',NULL,'',1,99,'sefsfsefsef',1376904431,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_system_announcement` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_template_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_template_list`;

CREATE TABLE `xnfy520_yaomai_template_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `details` text,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_template_list` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_template_list` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_template_list` (`id`, `name`, `title`, `publish`, `sort`, `details`, `views`, `create_date`, `modify_date`)
VALUES
	(1,'老土网注册协议','',1,99,'<span style=\"font-family:Arial, 宋体;line-height:normal;white-space:normal;\">1、服务条款的确认和接纳 服务涉及到的产品的所有权以及相关软件的知识产权归公司所有。公司所提供的服务必须按照其发布的公司章程，服务条款和操作规则严格执行。本服务条款的效力范围及于公司的一切产品和服务，用户在享受公司任何单项服务时，应当受本服务条款的约束。用户通过进入注册程序并点击\"我接受\"的按钮，即表示用户与公司已达成协议，自愿接受本服务条款的所有内容。 当用户使用各单项服务时，用户的使用行为视为其对该单项服务的服务条款以及公司在该单项服务中发出的各类公告的同意。 <br />\r\n2、服务简介 公司运用自己的操作系统通过国际互联网络为用户提供各项服务。<br />\r\n用户必须： （1）提供设备，包括个人电脑一台、调制解调器一个及配备上网装置。 <br />\r\n（2）个人上网和支付与此服务有关的电话费用。 考虑到产品服务的重要性，用户同意： <br />\r\n（1）提供及时、详尽及准确的个人资料。 <br />\r\n（2）不断更新注册资料，符合及时、详尽准确的要求。所有原始键入的资料将引用为注册资料。 另外，用户可授权公司向第三方透露其注册资料，否则公司不能公开用户的姓名、住址、出件地址、电子邮箱、帐号。<br />\r\n除非： <br />\r\n（1）用户要求公司或授权某人通过电子邮件服务透露这些信息。 <br />\r\n（2）相应的法律、法规要求及程序服务需要公司提供用户的个人资料。 如果用户提供的资料不准确，不真实，不合法有效，公司保留结束用户使用各项服务的权利。用户在享用各项服务的同时，同意接受提供的各类信息服务。<br />\r\n3、服务条款的修改 公司有权在必要时修改本服务条款以及各单项服务的相关条款。用户在享受单项服务时，应当及时查阅了解修改的内容，并自觉遵守本服务条款以及该单项服务的相关条款。 <br />\r\n4、服务修订 公司保留随时修改或中断服务而不需通知用户的权利。用户接受公司行使修改或中断服务的权利，公司不需对用户或第三方负责。 5、用户隐私制度 尊重用户个人隐私是公司的一项基本政策。所以，作为对以上第二点个人注册资料分析的补充，公司一定不会公开、修改或透露用户的注册资料及保存在各项服务中的非公开内容，除非公司在诚信的基础上认为透露这些信息在以下几种情况是必要的： <br />\r\n（1）遵守有关法律规定，包括在国家有关机关查询时，提供用户在的网页上发布的信息内容及其发布时间、互联网地址或者域名。 <br />\r\n（2）保持维护的知识产权和其他重要权利。<br />\r\n（3）在紧急情况下竭力维护用户个人和社会大众的隐私安全。 <br />\r\n（4）根据本条款相关规定或者认为必要的其他情况下。 <br />\r\n6、用户的帐号、密码和安全性 您一旦注册成功成为用户，您将得到一个密码和帐号。如果您未保管好自己的帐号和密码而对您、或第三方造成的损害，您将负全部责任。另外，每个用户都要对其帐户中的所有活动和事件负全责。您可随时改变您的密码和图标，也可以结束旧的帐户重开一个新帐户。用户同意若发现任何非法使用用户帐号或安全漏洞的情况，立即通告公司。 <br />\r\n7、拒绝提供担保和免责声明 用户明确同意使用服务的风险由用户个人承担。公司明确表示不提供任何类型的担保，不论是明确的或隐含的，但是对商业性的隐含担保，特定目的和不违反规定的适当担保除外。公司不担保服务一定能满足用户的要求，也不担保服务不会受中断，对服务的及时性、安全性、真实性、出错发生都不作担保。公司拒绝提供任何担保，包括信息能否准确、及时、顺利地传送。用户理解并接受下载或通过产品服务取得的任何信息资料取决于用户自己，并由其承担系统受损、资料丢失以及其它任何风险。公司对在服务网上得到的任何商品购物服务、交易进程、招聘信息，都不作担保。用户不会从公司收到口头或书面的意见或信息，也不会在这里作明确担保。 <br />\r\n8、有限责任 公司对直接、间接、偶然、特殊及继起的损害不负责任，这些损害来自：不正当使用产品服务，在网上购买商品或类似服务，在网上进行交易，非法使用服务或用户传送的信息有所变动。这些损害会导致公司形象受损，所以公司早已提出这种损害的可能性。 <br />\r\n9、虚拟社区信息的储存及限制 公司不对用户所发布信息的删除或储存失败负责。公司保留判定用户的行为是否符合虚拟社区服务条款的要求和精神的权利，如果用户违背了服务条款的规定，则中断其虚拟社区服务的帐号。在本社区内，无论是用户原创或是用户得到著作权人授权转载的作品，用户上载的行为即意味着用户或用户代理的著作权人授权公司对上载作品享有不可撤销的永久的使用权和收益权，但用户或原著作权人仍保有上载作品的著作权。<br />\r\n10、用户管理 用户单独承担发布内容的责任。 用户对服务的使用是根据所有适用于服务的地方法律、国家法律和国际法律标准的。用户承诺： <br />\r\n（1）在的网页上发布信息或者利用的服务时必须符合中国有关法规(部分法规请见附录)，不得在的网页上或者利用的服务制作、复制、发布、传播以下信息： 　<br />\r\n(a)反对宪法所确定的基本原则的； 　　<br />\r\n(b) 危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的； 　　<br />\r\n(c) 损害国家荣誉和利益的； 　　<br />\r\n(d) 煽动民族仇恨、民族歧视，破坏民族团结的； 　　<br />\r\n(e) 破坏国家宗教政策，宣扬邪教和封建迷信的； 　　<br />\r\n(f) 散布谣言，扰乱社会秩序，破坏社会稳定的； 　　<br />\r\n(g) 散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的； 　　<br />\r\n(h) 侮辱或者诽谤他人，侵害他人合法权益的； 　　<br />\r\n(i) 含有法律、行政法规禁止的其他内容的。 <br />\r\n（2）在的网页上发布信息或者利用的服务时还必须符合其他有关国家和地区的法律规定以及国际法的有关规定。 <br />\r\n（3）不利用的服务从事以下活动： 　　<br />\r\n(a) 未经允许，进入计算机信息网络或者使用计算机信息网络资源的； 　　<br />\r\n(b) 未经允许，对计算机信息网络功能进行删除、修改或者增加的； 　　<br />\r\n(c) 未经允许，对进入计算机信息网络中存储、处理或者传输的数据和应用程序进行删除、修改或者增加的； 　　<br />\r\n(d) 故意制作、传播计算机病毒等破坏性程序的； 　　<br />\r\n(e) 其他危害计算机信息网络安全的行为。 <br />\r\n（4）不以任何方式干扰的服务。 <br />\r\n（5）遵守的所有其他规定和程序。 用户须对自己在使用服务过程中的行为承担法律责任。用户承担法律责任的形式包括但不限于：对受到侵害者进行赔偿，以及在公司首先承担了因用户行为导致的行政处罚或侵权损害赔偿责任后，用户应给予公司等额的赔偿。用户理解，如果发现其网站传输的信息明显属于上段第(1)条所列内容之一，依据中国法律，有义务立即停止传输，保存有关记录，向国家有关机关报告，并且删除含有该内容的地址、目录或关闭服务器。 用户使用电子公告服务，包括电子布告牌、电子白板、电子论坛、网络聊天室和留言板等以交互形式为上网用户提供信息发布条件的行为，也须遵守本条的规定以及将专门发布的电子公告服务规则，上段中描述的法律后果和法律责任同样适用于电子公告服务的用户。若用户的行为不符合以上提到的服务条款，公司将作出独立判断立即取消用户服务帐号。<br />\r\n11、保障 用户同意保障和维护公司全体成员的利益，负责支付由用户使用超出服务范围引起的律师费用，违反服务条款的损害补偿费用，其它人使用用户的电脑、帐号而产生的费用。用户或者使用用户帐号的其他人在进行游戏过程中侵犯第三方知识产权及其他权利而导致被侵权人索赔的，由用户承担责任。 <br />\r\n12、结束服务 用户或公司可随时根据实际情况中断服务。公司有权单方不经通知终止向用户提供某一项或多项服务；用户有权单方不经通知终止接受公司的服务。 结束用户服务后，用户使用服务的权利立即终止。从那时起，公司不再对用户承担任何义务。 <br />\r\n13、通知 所有发给用户的通知都可通过电子邮件、常规的信件或在网站显著位置公告的方式进行传送。公司将通过上述方法之一将消息传递给用户，告知他们服务条款的修改、服务变更、或其它重要事情。同时，公司保留对申请了163.com免费邮箱的用户投放商业性广告的权利。<br />\r\n14、参与广告策划 在公司许可下用户可在他们发表的信息中加入宣传资料或参与广告策划，在各项服务上展示他们的产品。任何这类促销方法，包括运输货物、付款、服务、商业条件、担保及与广告有关的描述都只是在相应的用户和广告销售商之间发生。公司不承担任何责任，公司没有义务为这类广告销售负任何一部分的责任。<br />\r\n15、内容的所有权 内容的定义包括：文字、软件、声音、相片、录象、图表；在广告中的全部内容；电子邮件系统的全部内容；虚拟社区服务为用户提供的商业信息。所有这些内容均属于公司，并受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在公司和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。<br />\r\n16、法律 用户和公司一致同意有关本协议以及使用的服务产生的争议交由仲裁解决，但是有权选择采取诉讼方式，并有权选择受理该诉讼的有管辖权的法院。若有任何服务条款与法律相抵触，那这些条款将按尽可能接近的方法重新解析，而其它条款则保持对用户产生法律效力和影响。<br />\r\n17、通行证所含服务的信息储存及安全 公司对通行证上所有服务将尽力维护其安全性及方便性，但对服务中出现信息删除或储存失败不承担任何负责。另外我们保留判定用户的行为是否符合服务条款的要求的权利，如果用户违背了通行证服务条款的规定，将会中断其通行证服务的帐号。<br />\r\n18、青少年用户特别提示 青少年用户必须遵守全国青少年网络文明公约： 要善于网上学习，不浏览不良信息；要诚实友好交流，不侮辱欺诈他人；要增强自护意识，不随意约会网友；要维护网络安全，不破坏网络秩序；要有益身心健康，不沉溺虚拟时空。</span>',0,1361172287,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_template_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_theme
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_theme`;

CREATE TABLE `xnfy520_yaomai_theme` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `CreateDate` int(10) unsigned NOT NULL,
  `ModifyDate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_theme` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_theme` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_theme` (`id`, `name`, `publish`, `sort`, `description`, `CreateDate`, `ModifyDate`)
VALUES
	(1,'Earth & Environmental Sciences',1,99,'',1353548160,1353548241),
	(2,'Medicine & Healthcare',1,99,'',1353548249,0),
	(3,'Biomedical & Life Sciences',1,99,'',1353548257,0),
	(4,'Computer Science & Communications',1,99,'',1353548268,0),
	(5,'Chemistry & Materials Science',1,99,'',1353548275,0),
	(6,'Engineering',1,99,'',1353548284,0),
	(7,'Physics & Mathematics',1,99,'',1353548291,0),
	(8,'Business & Economics',1,99,'',1353548300,0),
	(9,'Social Sciences & Humanities',1,99,'',1353548307,0);

/*!40000 ALTER TABLE `xnfy520_yaomai_theme` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_trystatus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_trystatus`;

CREATE TABLE `xnfy520_yaomai_trystatus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `WAIT_BUYER_PAY` int(11) DEFAULT NULL,
  `WAIT_SELLER_SEND_GOODS` int(11) DEFAULT NULL,
  `WAIT_BUYER_CONFIRM_GOODS` int(11) DEFAULT NULL,
  `TRADE_FINISHED` int(11) DEFAULT NULL,
  `fails` int(11) unsigned DEFAULT '0',
  `success` int(10) unsigned DEFAULT '0',
  `datas` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_trystatus` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_trystatus` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_trystatus` (`id`, `WAIT_BUYER_PAY`, `WAIT_SELLER_SEND_GOODS`, `WAIT_BUYER_CONFIRM_GOODS`, `TRADE_FINISHED`, `fails`, `success`, `datas`)
VALUES
	(1,4,4,4,4,0,27,'0');

/*!40000 ALTER TABLE `xnfy520_yaomai_trystatus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_user`;

CREATE TABLE `xnfy520_yaomai_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//用户ID',
  `username` varchar(30) NOT NULL COMMENT '//用户名',
  `nickname` varchar(20) DEFAULT NULL,
  `truename` varchar(10) DEFAULT NULL,
  `password` char(32) NOT NULL COMMENT '//用户密码',
  `email` varchar(20) NOT NULL,
  `qq` varchar(11) DEFAULT NULL,
  `phone` varchar(18) DEFAULT NULL,
  `birthday` varchar(10) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `regdate` int(10) unsigned NOT NULL COMMENT '//注册时间',
  `regip` char(15) NOT NULL COMMENT '//注册IP',
  `logindate` int(10) unsigned NOT NULL COMMENT '//登录时间',
  `loginip` char(15) NOT NULL COMMENT '//登录IP',
  `checktime` int(10) unsigned NOT NULL,
  `checkstatus` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `roleid` int(10) unsigned NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  `audit` tinyint(1) NOT NULL DEFAULT '0',
  `integral` int(10) unsigned NOT NULL DEFAULT '0',
  `sign_in_count` int(10) unsigned NOT NULL DEFAULT '0',
  `sign_in_time` int(10) unsigned NOT NULL,
  `id_image` varchar(255) DEFAULT '',
  `sina` varchar(255) DEFAULT '',
  `tencent` varchar(255) DEFAULT '',
  `where_id` tinyint(3) unsigned DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `coupons` text,
  `check_email_time` int(10) unsigned DEFAULT NULL,
  `check_pwd_time` int(10) unsigned DEFAULT NULL,
  `tencent_qq_nickname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_user` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_user` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_user` (`id`, `username`, `nickname`, `truename`, `password`, `email`, `qq`, `phone`, `birthday`, `status`, `regdate`, `regip`, `logindate`, `loginip`, `checktime`, `checkstatus`, `roleid`, `avatar`, `modify_date`, `audit`, `integral`, `sign_in_count`, `sign_in_time`, `id_image`, `sina`, `tencent`, `where_id`, `last_login`, `sex`, `coupons`, `check_email_time`, `check_pwd_time`, `tencent_qq_nickname`)
VALUES
	(1,'admins','admins','admins','e10adc3949ba59abbe56e057f20f883e','xnfy520@qq.com','','','',1,1337050409,'127.0.0.1',1378285311,'::1',0,0,1,'20121212092156482.jpg',0,0,20,4,1359082033,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(19,'xnfy520','xnfy520','xnfy520','e10adc3949ba59abbe56e057f20f883e','xnfy520@163.com','','','1989-08-09',1,1355278894,'127.0.0.1',1375680926,'::1',0,0,16,'',0,0,0,0,0,'','','',0,1375671813,0,'',NULL,NULL,NULL),
	(20,'koobar','koobar','koobar','e10adc3949ba59abbe56e057f20f883e','koobar@163.com','','','',1,1355279004,'127.0.0.1',1355279004,'127.0.0.1',0,0,16,'',0,0,5,1,1359084084,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(21,'hellos','','hellos','e10adc3949ba59abbe56e057f20f883e','123456@qq.cccc','','','',1,1354329010,'168.136.55.66',1356935408,'127.0.0.1',0,0,16,'20121217115427860.jpg',1355795868,0,0,0,0,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(22,'ertretert','ertretert','ertretert','5eab3332a2257174bdcf8457674b2608','ertrert@tretert.ert','','','',1,1355294566,'127.0.0.1',1356504184,'',0,0,16,'',0,0,5,1,1359095257,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(23,'6576575','6576575','哈喽','872969df8e3b04a37a385d44a4a5c419','567567@wqew.we','','','',1,1355294644,'199.168.111.115',1355381233,'',0,0,16,'20130125104335613.jpg',1355294849,0,5,1,1359083101,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(24,'helloworld','helloworld','helloworld','e10adc3949ba59abbe56e057f20f883e','helloworld@qq.com','','','',1,1355303050,'',0,'199.11.159.110',0,0,16,'',0,0,0,0,0,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(25,'dsfasdf','dsfasdf','dsfasdf','0003788a14516099beb76deee2266f6d','ertetretert@esre.er','','','',1,1355303210,'127.0.0.1',0,'',0,0,16,'',0,0,5,1,1359085236,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(29,'sfwefwfw','sfwefwfw','','a92eb042f792151119ee4e16f90c19ac','werewr@dfge.ertet','','','',1,1355799253,'sfwefwfw',0,'',0,0,16,'',0,0,0,0,0,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(32,'xnfy51220','雪念飞叶','元如枫','c33367701511b4f6020ec61ded352059','xnfy5s20@qq.com','182065888','','2013-01-01',1,1357183379,'127.0.0.1',1361148183,'127.0.0.1',0,0,16,'20130122171656202.png',0,0,3063,21,1361148188,'','','',0,NULL,0,'[{\"commodity_id\":\"3\",\"time\":1376064000}]',NULL,NULL,NULL),
	(34,'lzlt001','lzlt001','李华','c6d809f87a040593bd8c9b54f972db33','qq@qq.com','','','',1,1358760498,'192.168.1.125',1358760861,'192.168.1.125',0,0,16,NULL,0,0,5,1,1358760550,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(36,'xiaoxin','xiaoxin','','e10adc3949ba59abbe56e057f20f883e','xiaoxin@qq.com','','','',1,1359679994,'127.0.0.1',1359683759,'192.168.1.222',0,0,16,'',0,0,0,0,0,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(37,'zhangqing','zhangqing','','e10adc3949ba59abbe56e057f20f883e','zhangqing@qq.com','','','',1,1359683928,'127.0.0.1',1359684355,'192.168.1.110',0,0,16,'',0,0,0,0,0,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(38,'whldcy','whldcy','乐点','e10adc3949ba59abbe56e057f20f883e','whldcy@qq.com','','','',1,1359697735,'192.168.1.110',1359697735,'192.168.1.110',0,0,16,'20130201134910688.jpg',0,0,5,1,1359697766,'','','',0,NULL,0,'',NULL,NULL,NULL),
	(41,'tianyun','tianyun','','96e79218965eb72c92a549dd5a330112','tianyun@qq.com',NULL,'','2013-07-01',1,1375670886,'::1',1376270802,'::1',0,0,16,NULL,1375671552,0,0,0,0,'','','',12,1376115991,1,'[{\"commodity_id\":\"3\",\"time\":1375977600},{\"commodity_id\":\"2\",\"time\":1375977600},{\"commodity_id\":\"1\",\"time\":1375977600},{\"commodity_id\":\"4\",\"time\":1375977600}]',NULL,NULL,NULL),
	(42,'tianyun1','tianyun1','','7fa8282ad93047a4d6fe6111c93b308a','182065881@qq.com','','','',1,1375670917,'::1',1378341873,'::1',0,0,16,'',0,0,0,0,0,'','','',0,1376896019,0,'[]',NULL,NULL,NULL),
	(43,'tianyun2','tianyun2',NULL,'96e79218965eb72c92a549dd5a330112','tianyun2@qq.com',NULL,NULL,NULL,1,1375670961,'::1',1376033262,'::1',0,0,16,NULL,0,0,0,0,0,'','','',0,1375670961,0,'',NULL,NULL,NULL),
	(45,'123456','123456',NULL,'e10adc3949ba59abbe56e057f20f883e','123456@qq.com',NULL,NULL,NULL,1,1378341971,'::1',1378341971,'::1',0,0,16,NULL,0,0,0,0,0,'','','',0,NULL,0,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `xnfy520_yaomai_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_vote_commodity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_vote_commodity`;

CREATE TABLE `xnfy520_yaomai_vote_commodity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `price` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `details` text,
  `p1` mediumtext,
  `p2` mediumtext,
  `p3` mediumtext,
  `stylist_id` int(11) unsigned DEFAULT NULL,
  `stylist_say` varchar(255) DEFAULT NULL,
  `measure` double(10,2) unsigned DEFAULT '0.00',
  `subscribe` int(10) unsigned NOT NULL DEFAULT '0',
  `expiration_date` int(10) unsigned NOT NULL,
  `sales_volume` int(10) unsigned DEFAULT '0',
  `subscribe_volume` int(10) unsigned DEFAULT '0',
  `subscription` double(10,2) unsigned NOT NULL DEFAULT '0.00',
  `votes` text,
  `vote` int(10) unsigned DEFAULT '0',
  `production_tracking` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_vote_commodity` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_vote_commodity` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_vote_commodity` (`id`, `no`, `name`, `image`, `enable`, `recommend`, `sort`, `views`, `price`, `create_date`, `modify_date`, `description`, `details`, `p1`, `p2`, `p3`, `stylist_id`, `stylist_say`, `measure`, `subscribe`, `expiration_date`, `sales_volume`, `subscribe_volume`, `subscription`, `votes`, `vote`, `production_tracking`)
VALUES
	(1,'9129174731','设票商品1','20130801101531829.jpg',1,1,99,0,10.00,1374710000,1376037716,'sfefs','sefsfsfs','[{\"aa\":\"111\"}]','[{\"vvvv\":\"2222\"}]','[{\"cccc\":\"3333\"}]',2,'333333',34.00,30,1380211200,0,0,333.00,'[{\"commodity_id\":\"1\",\"by_user\":\"41\"},{\"commodity_id\":\"1\",\"by_user\":\"42\"}]',4,NULL),
	(2,'5841274731','人座沙发，黄昏灰','20130801101513824.jpg',1,0,99,0,343.00,1374721485,1376035865,'w','ws','[{\"33\":\"rrrr\"}]','[{\"www\":\"333\"}]',NULL,1,'sefesf',30.00,110,1377878400,0,0,20.00,'[{\"commodity_id\":\"2\",\"by_user\":\"41\"}]',3,NULL),
	(3,'2706374731','黄昏灰黄昏灰黄昏灰黄昏灰黄昏灰','20130801101456630.jpg',1,0,99,1,10.00,1374736072,1376276124,'','',NULL,NULL,NULL,0,'',0.00,20,1377187200,0,0,202.00,'[{\"commodity_id\":\"3\",\"by_user\":\"41\"},{\"commodity_id\":\"3\",\"by_user\":\"32\"},{\"commodity_id\":\"3\",\"by_user\":\"42\"}]',14,NULL),
	(4,'8830284731','人座沙发s','20130801101431473.jpg',1,0,99,0,30.00,1374820388,1376387012,'','wwwww',NULL,NULL,NULL,0,'',0.00,20,1378483200,0,0,20.00,'[{\"commodity_id\":\"4\",\"by_user\":\"41\"},{\"commodity_id\":\"4\",\"by_user\":\"42\"}]',17,NULL);

/*!40000 ALTER TABLE `xnfy520_yaomai_vote_commodity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table xnfy520_yaomai_vote_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xnfy520_yaomai_vote_details`;

CREATE TABLE `xnfy520_yaomai_vote_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '99',
  `description` varchar(255) DEFAULT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `modify_date` int(10) unsigned NOT NULL DEFAULT '0',
  `did` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `xnfy520_yaomai_vote_details` WRITE;
/*!40000 ALTER TABLE `xnfy520_yaomai_vote_details` DISABLE KEYS */;

INSERT INTO `xnfy520_yaomai_vote_details` (`id`, `name`, `image`, `icon`, `link`, `publish`, `sort`, `description`, `create_date`, `modify_date`, `did`)
VALUES
	(2,'sefesfesfsef','20130726142828906.jpg',NULL,'',1,99,'sefsfsfsf',1374820111,0,2);

/*!40000 ALTER TABLE `xnfy520_yaomai_vote_details` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
