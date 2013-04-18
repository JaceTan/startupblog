CakePHP Startup Blog
====================

A CakePHP startup blog plugin for CakePHP2.0+

Purpose
-------

* Targeted at startups that use cakephp 2.0+ and want a simple blog.
* We reference github.com/blog
* We borrowed heavily from Neil Crookes, at (https://github.com/neilcrookes/CakePHP-Blog-Plugin)

Features
--------

* Blog posts
** Paginated across all filter types (see below)
** In/out RSS feed flag
* Filter by
** Categories (HABTM, hierarchy, only shows categories with posts in, displays number of posts in each category or one of its children)
** Year/month archive (based on created date/time, only shows months with posts in, grouped by year, displays number of posts in each month)
* RSS for all posts, or posts in a particular category
* Settings
** Meta title, description, keywords for the unfiltered list
* Authorship
** Integrate with user model to display authorship
* Integrated with 
** TinyMCE
* What we don't have:
** Tags
** Sticky Posts
** Archives

Customisations
--------------

Create custom views in your app directory e.g. app/views/plugins/blog/blog_posts/index.ctp

Requirements
------------

* CakePHP 2.0+ (so PHP5.2+)
* MySQL v4+
* CakePHP HABTM Counter Cache behavior (http://github.com/neilcrookes/CakePHP-HABTM-Counter-Cache-Plugin)
* TinyMCE Helper (https://github.com/CakeDC/TinyMCE)

Installation
------------

    git submodule add git@github.com:jacebeleren/startupblog.git app/Plugin/StartupBlog

or download from https://github.com/jacebeleren/startupblog

Route Configuration
-------------------

You can include the following line in APP/Config/routes.php
    include APP.'Plugin'.DS.'StartupBlog'.DS.'Config'.DS.'routes.php';

or CakePlugin::loadAll(array('StartupBlog'=>array('bootstrap' => false, 'routes' => true)));

or CakePlugin::load('StartupBlog', array('bootstrap' => false, 'routes' => true));

Database Management
-------------------

Run all the SQL scripts in StartupBlog/Config/Schema

Go to mydomain.com/blog

See:

* mydomain.com/admin/blog/posts for creating blog posts (and follow links to create the categories first)
* mydomain.com/admin/blog/settings for editing the settings (things like the index page title and RSS feed title etc)

(Requires your Routing.prefixes is includes 'admin')

Todo
----

* Custom blog post content implementations
* Improve the admin interface

All contributions welcome and will be attributed

Copyright
---------

Copyright Oppoin.com 2013

License
-------

The MIT License