<?php
App::uses('StartupBlogAppController', 'StartupBlog.Controller');
App::uses('ValuesToTextHelper', 'StartupBlog.Helper');
/**
 * BlogPosts Controller
 *
 */
class BlogPostsController extends StartupBlogAppController {

/**
   * Components this controller uses
   *
   * @var array
   */
	public $components = array('RequestHandler');

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Text', 'Time', 'StartupBlog.Reader', 'StartupBlog.Blog', 'TinyMCE.TinyMCE');


/**
 * Default pagination options
 *
 * @var array
 */
	public $paginate = array(
		'limit' => 10,
		'order' => array(
			'BlogPost.created DESC'
		),
		'recursive' => 0,
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('blogSettings', ClassRegistry::init('StartupBlog.BlogSetting')->getSettings());
	}

/**
 * Index action handles all blog post index views, whether filtered by
 * category, tag or archive, or rendered as HTML or RSS
 */
	public function index() {
		$this->log("reach here1");
		$this->paginate['conditions'][]['BlogPost.published'] = 1;
		if ($this->RequestHandler->isRss()) {
			// Add RSS condition to default options defined in paginate
			$options = array_merge(
				$this->paginate,
				array('conditions' => array('BlogPost.in_rss' => 1))
			);

			// Fetch blog posts according to the current mode: category, tag or
			// default
			switch ($this->_filtered()) {
				case 'category':
					$options = Set::merge($options, $this->_category());
					$blogPosts = $this->BlogPost->find('byCategory', $options);
					break;
				default:
					$this->log("reach here");
					$blogPosts = $this->BlogPost->find('all', $options);
					break;
			}
			$this->set(compact('blogPosts'));
			return;
		}
$this->log("reach here2");
		switch ($this->_filtered()) {
			case 'category':
				$this->paginate = Set::merge($this->paginate, array('byCategory'), $this->_category());
				break;
		}
$this->log("reach here3");
		$blogPosts = $this->paginate();

		$this->set(compact('blogPosts'));
$this->log("reach here4");
		$this->_setArchivesCategoriesAndTags();

	}

/**
 * Returns the current filter mode, either 'category', 'tag' or 'archive'
 * determined by the params in the URL.
 *
 * @return string
 */
	protected function _filtered() {
		if (!empty($this->params['category'])) {
			return 'category';
		}
		return false;
	}

/**
 * Finds and sets the selected category in the view. Returns the conditions
 * where the lft value is between the selected category's lft and rght value.
 * Called from index() action for both HTML and RSS views
 *
 * @return array
 */
	protected function _category() {
		$category = $this->BlogPost->BlogPostCategory->find('first', array(
			'conditions' => array(
			'slug' => $this->params['category']
			)
		));

		if (!$category) {
			throw new NotFoundException(__('Invalid Blog Post Category'));
		}

		$this->set(compact('category'));

		$options['conditions'][]['BlogPostCategory.lft BETWEEN ? AND ?'] = array(
			$category['BlogPostCategory']['lft'],
			$category['BlogPostCategory']['rght'],
		);

		return $options;
	}


	/**
	* View a blog post
	*/
	public function view() {
		if (empty($this->params['slug'])) {
			throw new NotFoundException(__('Invalid Blog Post'));
		}
		$blogPost = $this->BlogPost->find('forView', array(
			'conditions' => array(
				'BlogPost.slug' => $this->params['slug'],
			)
		));
		if (!$blogPost) {
			throw new NotFoundException(__('Invalid Blog Post'));
		}
		$this->set(compact('blogPost'));
		$this->_setArchivesCategoriesAndTags();
	}

	/**
	* Fetch the data for archives, categories and tags and set them as available
	* in the View so they can be rendered on the index and view pages.
	*/
	public function _setArchivesCategoriesAndTags() {

		if (!$categories = Cache::read('blog_categories')) {
			// getMenuWithUnderCounts() is a method on the HabtmCounterCache Behavior
			// which returns a nest list of categories, in a format that can be 
			// rendered by the BlogHelper::menu method, with the number of posts in
			// each category, or a it's child categories, next to the category name.
			$categories = $this->BlogPost->getMenuWithUnderCounts('BlogPostCategory', array('url' => array('slug' => 'category')));
			Cache::write('blog_categories', $categories);
		}
$this->log('any categories??');
			$this->log($categories);
		// Set the selected keys in the options that are sent to the methods which
		// fetch the archives, categories and tags, to the selected value according
		// to the current mode. This is so when the data is rendered, we can
		// indicate the current selected one, if any.
		switch ($this->_filtered()) {
			case 'category':
				list($categories) = $this->_setSelectedCategory($categories, $this->params['category']);
				break;
			default:
				break;
		}
		$this->set(compact('categories'));
	}

/**
 * Recursively traverses the passed categories and sets the 'selected' => true
 * and 'parent-selected' => true in the categories array. This has to be done
 * after the list of categories is fetched, and not in the find method, which
 * would have been nicer, so that the categories array can be cached, and we
 * don't have to fetch them for each page view.
 *
 * @param $categories array A nested array of categories returned by the 
 * HabtmCounterCache::getMenuWithUnderCounts() method
 * @param $selected string The slug of the selected category
 * @return array An array with 2 keys, the first containing the modified
 * nested array of categories passed in, and the second with the
 * $parentSelected value set to tru or false for the current node in the
 * nested list. The latter is only used to set the parent-selected key in the
 * internal iterations of the nested list, so does not need to be captured
 * from the external call to this function - it's only used when the fucntion
 * calls itself.
 */
	protected function _setSelectedCategory($categories, $selected) {
		// Initalise this to false, if a category is identified as the selected,
		// category, it is set to true below and then passed back up the levels of
		// recursion so that parent-selected keys can be set.
		$parentSelected = false;

		foreach ($categories as $k => $category) {

			// Set the children and parent-selected keys by calling this method again
			// with the category's children passed into the $categories parameter.
			list ($categories[$k]['children'], $categories[$k]['parent-selected']) = $this->_setSelectedCategory($category['children'], $selected);

			// Check the data against the selected key in the options parameter and
			// set the selected key to true, and the parent selected variable, ready
			// for passing back up the levels of recursion.
			if ($categories[$k]['url']['category'] == $selected) {
				$categories[$k]['selected'] = true;
				$parentSelected = true;
			}
		}
		return array($categories, $parentSelected);
	}

// The following methods are pretyy much just the baked admin CRUD actions.
// The only difference is we use generateTreeList() to generate the
// categories that can be selected in the add/edit blog post actions, so we
// can visualise the hierarchy of categories.
/**
 * admin index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BlogPost->recursive = 0;
		$this->set('blogPosts', $this->paginate());
	}


/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BlogPost->create();
			if ($this->BlogPost->save($this->request->data)) {
				$this->Session->setFlash(__('The blog post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog post could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BlogPost->exists($id)) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BlogPost->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The blog post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id));
			$this->request->data = $this->BlogPost->find('first', $options);
		}
		$blogPostCategories = $this->BlogPost->BlogPostCategory->generateTreeList();
		$this->set(compact('blogPostCategories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->BlogPost->id = $id;
		if (!$this->BlogPost->exists()) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BlogPost->delete()) {
			$this->Session->setFlash(__('Blog post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Blog post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
