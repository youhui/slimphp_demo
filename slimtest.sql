

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `gender` tinyint(2) NOT NULL DEFAULT '0' COMMENT '性别;0:保密,1:男,2:女',
  `age` tinyint(3) NOT NULL DEFAULT '0' COMMENT '年龄',
  `job` varchar(200) DEFAULT NULL COMMENT '工作',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

LOCK TABLES `user` WRITE;


INSERT INTO `user` (`id`, `name`, `gender`, `age`, `job`)
VALUES
	(1,'ken1',0,20,'computer'),
	(2,'ken2',1,22,'design'),
	(3,'ken3',0,21,'computer'),
	(4,'ken4',1,30,'programming'),
	(5,'ken5',0,29,'programming'),
	(6,'ken6',1,27,'design'),
	(7,'ken7',0,22,'sales'),
	(8,'ken8',1,25,'programming'),
	(9,'ken9',1,25,'sales');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

