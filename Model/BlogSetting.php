<?php
App::uses('StartupBlogAppModel', 'StartupBlog.Model');
/**
 * BlogSetting Model
 *
 */
class BlogSetting extends StartupBlogAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'setting';

/**
* The cache key used to cache the settings with
*
* @var string
*/
	protected $_cacheKey = 'blog_settings';

/**
* Clears cache files after saving
*
*/
	public function afterSave() {
		Cache::delete($this->_cacheKey);
	}


/**
* Returns the an array of setting => value pairs. Handles caching.
*
* @return array
*/
	public function getSettings() {
		if ($blogSettings = Cache::read($this->_cacheKey)) {
			return $blogSettings;
		}
		$blogSettings = $this->find('list', array(
			'fields' => array('setting', 'value')
		));
		Cache::write($this->_cacheKey, $blogSettings);
		return $blogSettings;
	}


}
