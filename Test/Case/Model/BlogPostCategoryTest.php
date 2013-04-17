<?php
App::uses('BlogPostCategory', 'StartupBlog.Model');

/**
 * BlogPostCategory Test Case
 *
 */
class BlogPostCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.startup_blog.blog_post_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BlogPostCategory = ClassRegistry::init('StartupBlog.BlogPostCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BlogPostCategory);

		parent::tearDown();
	}

}
