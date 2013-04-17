<?php
App::uses('BlogPost', 'StartupBlog.Model');

/**
 * BlogPost Test Case
 *
 */
class BlogPostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.startup_blog.blog_post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BlogPost = ClassRegistry::init('StartupBlog.BlogPost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BlogPost);

		parent::tearDown();
	}

}
