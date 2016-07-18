-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2015 年 12 月 28 日 12:15
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `test`
-- 
CREATE DATABASE `test` DEFAULT CHARACTER SET gb2312 COLLATE gb2312_chinese_ci;
USE `test`;
-- 
-- 数据库: `testguest`
-- 
CREATE DATABASE `testguest` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `testguest`;

-- --------------------------------------------------------

-- 
-- 表的结构 `tg_message`
-- 

CREATE TABLE `tg_message` (
  `tg_id` mediumint(8) unsigned NOT NULL auto_increment COMMENT 'id',
  `tg_fromuser` varchar(20) NOT NULL COMMENT '发信人',
  `tg_touser` varchar(20) NOT NULL COMMENT '收信人',
  `tg_content` varchar(200) NOT NULL COMMENT '信息内容',
  `tg_date` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY  (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `tg_message`
-- 

INSERT INTO `tg_message` VALUES (1, '余瑞', '狗伏17', '狗伏17，你是sb', '2015-12-28 17:55:32');

-- --------------------------------------------------------

-- 
-- 表的结构 `tg_user`
-- 

CREATE TABLE `tg_user` (
  `tg_id` mediumint(8) unsigned NOT NULL auto_increment COMMENT '\\\\用户id',
  `tg_uniqid` char(40) NOT NULL COMMENT '\\\\用户唯一标识符',
  `tg_username` varchar(20) NOT NULL COMMENT '\\\\用户名',
  `tg_password` char(40) NOT NULL COMMENT '\\\\密码',
  `tg_question` varchar(20) NOT NULL COMMENT '\\\\密码提示',
  `tg_answer` char(40) NOT NULL COMMENT '\\\\密码提示答案',
  `tg_email` varchar(40) default NULL COMMENT '\\\\邮箱',
  `tg_qq` varchar(10) default NULL COMMENT '\\\\QQ',
  `tg_url` varchar(40) default NULL COMMENT '\\\\网址',
  `tg_active` char(40) NOT NULL COMMENT '\\\\激活账户的唯一标识符',
  `tg_sex` char(1) NOT NULL COMMENT '\\\\性别',
  `tg_face` char(12) NOT NULL COMMENT '\\\\头像',
  `tg_level` tinyint(1) unsigned NOT NULL default '0',
  `tg_reg_time` datetime NOT NULL COMMENT '\\\\注册时间',
  `tg_last_time` datetime NOT NULL COMMENT '\\\\最后登录时间',
  `tg_last_ip` varchar(20) NOT NULL COMMENT '\\\\最后登录ip',
  `tg_login_count` int(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

-- 
-- 导出表中的数据 `tg_user`
-- 

INSERT INTO `tg_user` VALUES (10, '41b359791aa848d3f82a1896de0339cfeaf13635', '伏伏1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '刀包', 'f234d5fb8fc9acfc9390016f483a02320d3e4086', '794894526@fufu.com', '', '', '', '男', 'face/m10.gif', 0, '2015-12-18 17:10:42', '2015-12-18 17:10:42', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (14, 'b6f57fc64995b3567b8e937aeb8752db81b30419', '狗伏2', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m26.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (15, 'cf2eb97e840f30c3d7487594eb834ba18890d091', '狗伏3', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m27.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (12, 'b6977385a64f91fef5cb1972cca7ba00c6439bbc', '狗伏0', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m24.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (13, '2ab47aeb17657b177a81c5b188a4a01958a36356', '狗伏1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m25.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (6, '4e8a12d2162fcb0829b0577186e2589b40153b12', '炎日', '7c4a8d09ca3762af61e59520943dc26494f8941b', '哈哈', 'c63fa56c867dddd2942101070a09e24c98d061fe', '', '', '', 'b949be5d7403d7b9c555537c67b2c59974b030fa', '男', 'face/m10.gif', 0, '2015-12-16 17:48:49', '2015-12-16 17:48:49', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (7, 'b5bf5b3719e92fd6ae3d6357f83e6df1dbdf9792', '张全蛋', '7c4a8d09ca3762af61e59520943dc26494f8941b', '富土康', '5085b9a8e67d38f7fb28b21cf3c8107020e768be', 'zhao@123.com', '12345678', 'http://zhaoquandan.com', 'f82c7634ac781c586c1f80f88f0251e365dab3e9', '男', 'face/m02', 0, '2015-12-17 10:49:54', '2015-12-17 10:49:54', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (8, 'ac953db60e466eb5d65a39d2e2c147fe83af87d4', '磊炮', '7c4a8d09ca3762af61e59520943dc26494f8941b', '磊炮', 'a1915b009cd4ddd4e50336b20df09e22f0f721cf', '7945123@163.com', '4578154512', 'http://leipao.com', '28e8b84f9db2d21d9fcd656209be78a74a0efd44', '男', 'face/m06', 0, '2015-12-17 11:07:32', '2015-12-17 11:07:32', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (9, '6dd186faaf1342c663f35a5b429b99f402c506f1', '余瑞', '7c4a8d09ca3762af61e59520943dc26494f8941b', '伏伏', 'de171f8d2f09c4a5fb0bb1a58d6ff81a4dd97b1e', '794891343@qq.com', '794891343', 'http://hikobe8.com', '', '男', 'face/m06.gif', 1, '2015-12-17 11:29:48', '2015-12-28 14:57:38', '127.0.0.1', 4);
INSERT INTO `tg_user` VALUES (11, 'abccdf0b5d984fbaf8536c0faeacfe30c9532753', '伏伏2', '7c4a8d09ca3762af61e59520943dc26494f8941b', '伏伏', 'f234d5fb8fc9acfc9390016f483a02320d3e4086', '794894526@fufu.com', '', '', '', '男', 'face/m10.gif', 0, '2015-12-18 17:11:58', '2015-12-18 17:11:58', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (16, '80a7eb15198e2af6a7befad355114e3c486e93c6', '狗伏4', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m28.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (17, 'a25aa97c06546c0955ffa8109416cf9fc5b4b651', '狗伏5', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m29.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (18, 'c5a85c496e08dd9cd791cbb9c5f7700bfbc7601d', '狗伏6', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m30.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (19, '3c54a1cdcb466e258f243778ea1ecb76fba15b9f', '狗伏7', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m31.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (20, '2bde9549267b0e8fbff459290d341140fdda6031', '狗伏8', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m32.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (21, 'e71b5195e95c6f68bc8f459d79575b3f5f2f31a7', '狗伏9', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m33.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (22, '83235a08689bdf4042dc7bff4c259c305b837254', '狗伏10', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m34.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (23, '3ac29e11199409f5cb9dbd85456213d164fc1c66', '狗伏11', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m35.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (24, 'eaaac3af1e5ea968775493cb43cf1ddb620fe3e6', '狗伏12', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m36.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (25, '6d56977761e2ef0508b98e17a817cb07255e5f03', '狗伏13', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m37.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (26, 'afc596980ddc2b5e9bd2babfba8adadb8411527b', '狗伏14', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m38.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (27, '6ed3724fd8dd32f98e938cf5622ec0e37cc4e098', '狗伏15', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m39.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (28, '6274357c6285407cf4869089d0330ef47c4046c8', '狗伏16', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m40.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (29, 'c4e656b7cab6bf68a03d130c735deecb30357fb3', '狗伏17', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m41.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (30, 'abe91c2924f979c087c8aae7400b4a1260838ece', '狗伏18', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m42.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (31, '9cb784a6b4c49ff1a3dd704a59a6f9b62949ebc5', '狗伏19', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m43.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (32, 'd3b4ce5ce9e189d5cfc31ef2a77ba6bf21acdbc9', '狗伏20', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m44.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (33, 'a00510feb56b531635b153f628d2f1ecbd7b9a14', '狗伏21', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m45.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (34, '1303e1f0eb2c2059a2d95b0500a707410e5230ed', '狗伏22', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '7945613210', 'http://m123.com', '', '男', 'face/m12.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (35, '99a74cfb968e1f9ee8080059d963c6fca1660e28', '狗伏23', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '12345678', '', '', '女', 'face/m17.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (36, '03f473a926eeb8fafe37675494ed56be93aa5404', '狗伏24', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m48.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (37, 'ed36f0f691d31d4c8ff2444e88c40b9015a26089', '狗伏25', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m49.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (38, 'c1654c1219c683709573f89af26bd6b205d453f2', '狗伏26', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m50.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (39, 'f9e66f195bc6b3bf4e8d3788f21044db2eeb4d73', '狗伏27', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m51.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (40, 'a06dcd7bd79caaba65fabde95a03dcdeadfe5e55', '狗伏28', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m52.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
INSERT INTO `tg_user` VALUES (41, '3778bf41640acb2357b0cfbf3d2a8f2ba9f0740f', '狗伏29', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狗伏', '哈鸡儿', 'fufu@hajier.com', '', '', '', '女', 'face/m53.gif', 0, '2015-12-18 17:57:43', '2015-12-18 17:57:43', '127.0.0.1', 0);
