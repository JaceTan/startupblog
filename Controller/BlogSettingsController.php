<?php
App::uses('StartupBlogAppController', 'StartupBlog.Controller');
/**
 * BlogSettings Controller
 *
 */
class BlogSettingsController extends StartupBlogAppController {
/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Text', 'Time');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BlogSetting->recursive = 0;
		$this->set('blogSettings', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BlogSetting->exists($id)) {
			throw new NotFoundException(__('Invalid blog setting'));
		}
		$options = array('conditions' => array('BlogSetting.' . $this->BlogSetting->primaryKey => $id));
		$this->set('blogSetting', $this->BlogSetting->find('first', $options));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BlogSetting->exists($id)) {
			throw new NotFoundException(__('Invalid blog setting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BlogSetting->save($this->request->data)) {
				$this->Session->setFlash(__('The blog setting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BlogSetting.' . $this->BlogSetting->primaryKey => $id));
			$this->request->data = $this->BlogSetting->find('first', $options);
		}
	}

}
