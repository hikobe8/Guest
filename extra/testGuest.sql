-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2015 年 12 月 17 日 13:33
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `testguest`
-- 
CREATE DATABASE `testguest` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `testguest`;

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
  `tg_reg_time` datetime NOT NULL COMMENT '\\\\注册时间',
  `tg_last_time` datetime NOT NULL COMMENT '\\\\最后登录时间',
  `tg_last_ip` varchar(20) NOT NULL COMMENT '\\\\最后登录ip',
  PRIMARY KEY  (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `tg_user`
-- 

INSERT INTO `tg_user` VALUES (1, 'a1d4a9cefebf3af4c0e1df7166c01e20ec7d036e', '刀哥', '7c4a8d09ca3762af61e59520943dc26494f8941b', '雨伞', '0cb0206b420005365d16b059ba66895a079c1860', 'daobao@126.com', '804007541', 'http://daobao.com', '15a8dc7df59a233236580941c09f4c3d5d39f8f0', '男', 'face/m12', '2015-12-16 21:14:56', '2015-12-16 21:14:56', '127.0.0.1');
INSERT INTO `tg_user` VALUES (2, '8e79d24ce5f2f4098ef82174a9a25562f6f3eeb7', '港湾', '7c4a8d09ca3762af61e59520943dc26494f8941b', '刀哥', 'ae83c115f9301708b06ff59fe4e0b91a8fce946b', '', '', '', 'bdab293ddd9d038ef56ec7d5932f61118ba3e4a7', '男', 'face/m01.gif', '2015-12-16 21:51:15', '2015-12-16 21:51:15', '127.0.0.1');
INSERT INTO `tg_user` VALUES (3, '7102d286f3b7310c6ab2a909e3c91dc7229f0d51', '余瑞', '7c4a8d09ca3762af61e59520943dc26494f8941b', '伏伏', '027003bee2d7e762b8f712bcd8bf39b38d9b7891', '794891343@qq.com', '', '', '', '男', 'face/m01.gif', '2015-12-17 19:15:26', '2015-12-17 19:15:26', '127.0.0.1');
INSERT INTO `tg_user` VALUES (4, 'd87df2b3f1a6fa3ffed8d2bd5c452dfc56c393b6', 'hikobe8', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yaya', 'b2a801fc1f6cdddb5df949c5126817cb5c8562ce', '79481234@qq.com', '', '', '', '男', 'face/m01.gif', '2015-12-17 21:01:49', '2015-12-17 21:01:49', '127.0.0.1');
