<?php
App::uses('StartupBlogAppModel', 'StartupBlog.Model');
/**
 * BlogPost Model
 *
 */
class BlogPost extends StartupBlogAppModel {

	const DRAFT = "Draft";
	const PUBLISHED = "Published";

	public $actsAs = array(
		'HabtmCounterCache.HabtmCounterCache' => array(
			'counterScope' => array(
				'BlogPost.published' => 1
			),
			//'underCounterCache' => 'BlogPostCategory.under_blog_post_count'
		),
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'BlogPostCategory' => array(
			'className' => 'StartupBlog.BlogPostCategory',
			'joinTable' => 'blog_post_categories_blog_posts',
			'foreignKey' => 'blog_post_id',
			'associationForeignKey' => 'blog_post_category_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'published' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'in_rss' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

/**
 * Custom find type for finding all posts assigned to a category or any of its
 * children.
 *
 * @param array $state
 * @param array $query
 * @param array $results
 * @return array
 */
	protected function _findByCategory($state, $query = array(), $results = array()) {
		if ($state == 'before') {
			$query['conditions'][]['BlogPost.published'] = 1;

			$query['joins'] = array(
				array(
					'type' => 'INNER',
					'table' => 'blog_post_categories_blog_posts',
					'alias' => 'BlogPostCategoriesBlogPost',
					'conditions' => array(
						'BlogPost.id = BlogPostCategoriesBlogPost.blog_post_id'
					),
				),
				array(
					'type' => 'INNER',
					'table' => 'blog_post_categories',
					'alias' => 'BlogPostCategory',
					'conditions' => array(
						'BlogPostCategoriesBlogPost.blog_post_category_id = BlogPostCategory.id'
					),
				),
			);

			if (!isset($query['fields']) || $query['fields'] != 'COUNT(DISTINCT BlogPost.id)') {
				$query['group'] = 'BlogPost.id';
			}

			if (!isset($query['order'])) {
				$query['order'] = array(
					'BlogPost.sticky DESC',
					'BlogPost.created DESC'
				);
			}

			if (!isset($query['limit'])) {
				$query['limit'] = 10;
			}

			if (!isset($query['recursive'])) {
				$query['recursive'] = 0;
			}

			return $query;
		} else {
			return $results;
		}
	}

 /**
 * Custom find type for the post view page.
 *
 * @param array $state
 * @param array $query
 * @param array $results
 * @return array
 */
	protected function _findForView($state, $query = array(), $results = array()) {
		if ($state == 'before') {
			$query['conditions'][]['BlogPost.published'] = 1;
			$query['contain'] = array('BlogPostCategory' => array('order' => 'lft ASC'),);

			return $query;
		} else {

			$result = $results[0];

			foreach ($result['BlogPostCategory'] as $k => $blogPostCategory) {
				$result['BlogPostCategory'][$k] = array(
					'id' => $blogPostCategory['id'],
					'text' => $blogPostCategory['name'],
					'url' => array('category' => $blogPostCategory['slug']),
				);
			}
			return $result;
		}
	}

/**
 * Custom paginateCount method behaves as usual for normal find types but has
 * to do something special for the findByCategory custom find type.
 *
 * @param integer $conditions
 * @param integer $recursive
 * @param array $extra
 * @return integer
 */
	public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
		$options = array(
			'conditions' => $conditions,
			'recursive' => $recursive,
		);

		// Call the custom find type but add the field param for COUNT(DISTINCT)
		if (!empty($extra['type']) && in_array($extra['type'], array('byCategory'))) {
			$count = 'COUNT(DISTINCT BlogPost.id)';
			$options['fields'] = $count;
			$result = $this->find($extra['type'], $options);
			return $result[0][0][$count];
		}

		return $this->find('count', $options);
	}

/**
 * Custom find methods this model uses.
 *
 * @var array
 */
	public $findMethods = array(
		'byCategory' => true,
		'forView' => true,
	);

	public function afterSave() {
		Cache::delete('blog_categories');
	}

	public function afterDelete() {
		Cache::delete('blog_categories');
	}

}//end of class
