-- Adminer 3.4.0 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `blog_post_categories_blog_posts`;
CREATE TABLE `blog_post_categories_blog_posts` (
  `blog_post_category_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  PRIMARY KEY (`blog_post_category_id`,`blog_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- 2013-04-17 13:15:46
