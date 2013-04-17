<?php
App::uses('StartupBlogAppController', 'StartupBlog.Controller');
/**
 * BlogPostCategories Controller
 *
 */
class BlogPostCategoriesController extends StartupBlogAppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BlogPostCategory->recursive = 0;
		$this->set('blogPostCategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlogPostCategory->exists($id)) {
			throw new NotFoundException(__('Invalid blog post category'));
		}
		$options = array('conditions' => array('BlogPostCategory.' . $this->BlogPostCategory->primaryKey => $id));
		$this->set('blogPostCategory', $this->BlogPostCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BlogPostCategory->create();
			if ($this->BlogPostCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The blog post category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog post category could not be saved. Please, try again.'));
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
		if (!$this->BlogPostCategory->exists($id)) {
			throw new NotFoundException(__('Invalid blog post category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BlogPostCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The blog post category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog post category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BlogPostCategory.' . $this->BlogPostCategory->primaryKey => $id));
			$this->request->data = $this->BlogPostCategory->find('first', $options);
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
		$this->BlogPostCategory->id = $id;
		if (!$this->BlogPostCategory->exists()) {
			throw new NotFoundException(__('Invalid blog post category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BlogPostCategory->delete()) {
			$this->Session->setFlash(__('Blog post category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Blog post category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
