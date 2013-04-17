-- Adminer 3.4.0 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `blog_settings`;
CREATE TABLE `blog_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` varchar(255) NOT NULL,
  `setting_text` varchar(255) NOT NULL,
  `tip` varchar(255) DEFAULT NULL,
  `value` text,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_text_UNIQUE` (`setting_text`),
  UNIQUE KEY `setting_UNIQUE` (`setting`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `blog_settings` (`id`, `setting`, `setting_text`, `tip`, `value`, `modified`) VALUES
(1,	'meta_title',	'Meta Title',	NULL,	'Startup Blog',	NULL),
(2,	'meta_description',	'Meta Description',	NULL,	'',	'0000-00-00 00:00:00'),
(3,	'meta_keywords',	'Meta Keywords',	NULL,	'',	NULL),
(4,	'rss_channel_title',	'RSS Channel Title',	NULL,	'Startup Blog',	NULL),
(5,	'rss_channel_description',	'RSS Channel Description',	NULL,	'',	NULL),
(6,	'show_summary_on_post_view',	'Show post summary on post detail page?',	'\'Yes\' or \'No\'',	'No',	NULL),
(7,	'show_categories_on_post_view',	'Show post categories on post detail page?',	'\'Yes\' or \'No\'',	'No',	NULL),
(8,	'show_tags_on_post_view',	'Show post tags on post detail page?',	'\'Yes\' or \'No\'',	'Yes',	NULL),
(9,	'use_summary_or_body_on_post_index',	'Use the summary or the post body on the post index page?',	'\'Summary\' or \'Body\'',	'Summary',	NULL),
(10,	'use_summary_or_body_in_rss_feed',	'Use the summary or the post body in the RSS feed?',	'\'Summary\' or \'Body\'',	'Body',	NULL),
(11,	'published_format_on_post_index',	'Published date/time format on post index page',	'e.g. \'d M Y\' see php.net/date',	'<\\s\\p\\a\\n \\c\\l\\a\\s\\s=\"\\d\\a\\y\">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s=\"\\m\\o\\n\\t\\h\">M</\\s\\p\\a\\n> <\\s\\pa\\n \\c\\l\\a\\s\\s=\"\\y\\e\\a\\r\">y</\\s\\p\\a\\n>',	NULL),
(12,	'published_format_on_post_view',	'Published date/time format on post view page',	'e.g. \'d M Y\' see php.net/date',	'<\\s\\p\\a\\n \\c\\l\\a\\s\\s=\"\\d\\a\\y\">d</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s=\"\\m\\o\\n\\t\\h\">M</\\s\\p\\a\\n> <\\s\\p\\a\\n \\c\\l\\a\\s\\s=\"\\y\\e\\a\\r\">y</\\s\\p\\a\\n>',	NULL),
(13,	'og:site_name',	'Open Graph: Site Name',	NULL,	'Startup Blog',	NULL),
(14,	'fb_admins',	'Facebook Admins',	NULL,	NULL,	NULL),
(15,	'use_disqus',	'Use Disqus',	'\'Yes\' or \'No\'',	'No',	NULL),
(16,	'disqus_shortname',	'Disqus Shortname',	NULL,	NULL,	NULL),
(17,	'disqus_developer',	'Disqus Developer Mode',	'\'Yes\' or \'No\'',	'Yes',	NULL),
(18,	'show_share_links',	'Show the share buttons on blog posts?',	'\'Yes\' or \'No\'',	'Yes',	NULL);

-- 2013-04-17 12:38:34
