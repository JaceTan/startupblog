<?php
/**
 * Routes file for CakePHP StartupBlog Plugin
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */

$name = "blog";
$controllers = array(
	'settings' => 'blog_settings', 
	'posts' => 'blog_posts', 
	'categories' => 'blog_post_categories'
);

foreach($controllers as $routeName => $controllerName) {
	Router::connect(
		"/:prefix/{$name}/{$routeName}",
		array(
			'plugin' => 'startup_blog',
			'controller' => $controllerName,
			'action' => 'index'
		)
	);

	Router::connect(
		"/:prefix/{$name}/{$routeName}/:action/*",
		array(
			'plugin' => 'startup_blog',
			'controller' => $controllerName,
		)
	);
}
