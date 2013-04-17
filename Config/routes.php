<?php
/**
 * Routes file for CakePHP StartupBlog Plugin
 *
 * @author Neil Crookes <neil@crook.es>
 * @link http://www.neilcrookes.com http://neil.crook.es
 * @copyright (c) 2011 Neil Crookes
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */


Router::connect(
  '/blog/settings/*',
  array(
    'plugin' => 'startup_blog',
    'controller' => 'blog_settings',
  )
);

