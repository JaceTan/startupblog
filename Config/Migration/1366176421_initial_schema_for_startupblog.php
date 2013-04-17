<?php
class InitialSchemaForStartupBlog extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'blog_post_categories' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'meta_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'meta_description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'meta_keywords' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'rss_channel_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'rss_channel_description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'blog_post_count' => array('type' => 'integer', 'null' => false, 'default' => '0'),
					'under_blog_post_count' => array('type' => 'integer', 'null' => false, 'default' => '0'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'slug' => array('column' => 'slug', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'blog_post_categories_blog_posts' => array(
					'blog_post_category_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'blog_post_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'indexes' => array(
						'PRIMARY' => array('column' => array('blog_post_category_id', 'blog_post_id'), 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'blog_posts' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'summary' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'body' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'published' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
					'in_rss' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
					'meta_title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'meta_description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'meta_keywords' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'created_by' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'modified_by' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
				'blog_settings' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'setting' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'setting_text' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'tip' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'value' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'setting_text_UNIQUE' => array('column' => 'setting_text', 'unique' => 1),
						'setting_UNIQUE' => array('column' => 'setting', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'blog_post_categories', 'blog_post_categories_blog_posts', 'blog_posts', 'blog_settings'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		$data = array(
			'0' => array(
					'id' => 1,
					'setting' => 'meta_title',
					'setting_text' => 'Meta Title',
					'tip' => '',
					'value' => 'Startup Blog',
					'modified' => NULL
				),

			'1' => array(
					'id' => 2,
					'setting' => 'meta_description',
					'setting_text' => 'Meta Description',
					'tip' => '',
					'value' => '',
					'modified' => NULL
				),

			'2' => array(
					'id' => 3,
					'setting' => 'meta_keywords',
					'setting_text' => 'Meta Keywords',
					'tip' => '',
					'value' => '',
					'modified' => NULL
				),

			'3' => array(
					'id' => 4,
					'setting' => 'rss_channel_title',
					'setting_text' => 'RSS Channel Title',
					'tip' => '',
					'value' => 'Startup Blog',
					'modified' => NULL
				),

			'4' => array(
					'id' => 5,
					'setting' => 'rss_channel_description',
					'setting_text' => 'RSS Channel Description',
					'tip' => '',
					'value' => '',
					'modified' => NULL
				),

			'5' => array(
					'id' => 6,
					'setting' => 'show_summary_on_post_view',
					'setting_text' => 'Show post summary on post detail page?',
					'tip' => "'Yes' or 'No'",
					'value' => 'No',
					'modified' => NULL
				),

			'6' => array(
					'id' => 7,
					'setting' => 'show_categories_on_post_view',
					'setting_text' => 'Show post categories on post detail page?',
					'tip' => "'Yes' or 'No'",
					'value' => 'No',
					'modified' => NULL
				),

			'7' => array(
					'id' => 8,
					'setting' => 'show_tags_on_post_view',
					'setting_text' => 'Show post tags on post detail page?',
					'tip' => "'Yes' or 'No'",
					'value' => 'Yes',
					'modified' => NULL
				),

			'8' => array(
					'id' => 9,
					'setting' => 'use_summary_or_body_on_post_index',
					'setting_text' => 'Use the summary or the post body on the post index page?',
					'tip' => "'Summary' or 'Body'",
					'value' => 'Summary',
					'modified' => NULL
				),

			'9' => array(
					'id' => 10,
					'setting' => 'use_summary_or_body_in_rss_feed',
					'setting_text' => 'Use the summary or the post body in the RSS feed?',
					'tip' => "'Summary' or 'Body'",
					'value' => 'Body',
					'modified' => NULL
				),

			'10' => array(
					'id' => 11,
					'setting' => 'published_format_on_post_index',
					'setting_text' => 'Published date/time format on post index page',
					'tip' => "e.g. 'd M Y' see php.net/date",
					'value' => '<\s\p\a\n \c\l\a\s\s="\d\a\y">d</\s\p\a\n> <\s\p\a\n \c\l\a\s\s="\m\o\n\t\h">M</\s\p\a\n> <\s\pa\n \c\l\a\s\s="\y\e\a\r">y</\s\p\a\n>',
					'modified' => NULL
				),

			'11' => array(
					'id' => 12,
					'setting' => 'published_format_on_post_view',
					'setting_text' => 'Published date/time format on post view page',
					'tip' => "e.g. 'd M Y' see php.net/date",
					'value' => '<\s\p\a\n \c\l\a\s\s="\d\a\y">d</\s\p\a\n> <\s\p\a\n \c\l\a\s\s="\m\o\n\t\h">M</\s\p\a\n> <\s\p\a\n \c\l\a\s\s="\y\e\a\r">y</\s\p\a\n>',
					'modified' => NULL
				),

			'12' => array(
					'id' => 13,
					'setting' => 'og:site_name',
					'setting_text' => 'Open Graph: Site Name',
					'tip' => '',
					'value' => 'Startup Blog',
					'modified' => NULL
				),

			'13' => array(
					'id' => 14,
					'setting' => 'fb_admins',
					'setting_text' => 'Facebook Admins',
					'tip' => '',
					'value' => '',
					'modified' => NULL
				),

			'14' => array(
					'id' => 15,
					'setting' => 'use_disqus',
					'setting_text' => 'Use Disqus',
					'tip' => "'Yes' or 'No'",
					'value' => 'No',
					'modified' => NULL
				),

			'15' => array(
					'id' => 16,
					'setting' => 'disqus_shortname',
					'setting_text' => 'Disqus Shortname',
					'tip' => '',
					'value' => '',
					'modified' => NULL
				),

			'16' => array(
					'id' => 17,
					'setting' => 'disqus_developer',
					'setting_text' => 'Disqus Developer Mode',
					'tip' => "'Yes' or 'No'",
					'value' => 'Yes',
					'modified' => NULL
				),

			'17' => array(
					'id' => 18,
					'setting' => 'show_share_links',
					'setting_text' => 'Show the share buttons on blog posts?',
					'tip' => "'Yes' or 'No'",
					'value' => 'Yes',
					'modified' => NULL
				)
		);


		$blogSettingModel = ClassRegistry::init('StartupBlog.BlogSetting');
		$blogSettingModel->saveMany($data);
		return true;
	}
}
