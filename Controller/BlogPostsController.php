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
	public $helpers = array('Text', 'Time', 'StartupBlog.Reader');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BlogPost->recursive = 0;
		$this->set('blogPosts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BlogPost->exists($id)) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id));
		$this->set('blogPost', $this->BlogPost->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BlogPost->recursive = 0;
		$this->set('blogPosts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlogPost->exists($id)) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id));
		$this->set('blogPost', $this->BlogPost->find('first', $options));
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
			if ($this->BlogPost->save($this->request->data)) {
				$this->Session->setFlash(__('The blog post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id));
			$this->request->data = $this->BlogPost->find('first', $options);
		}
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
