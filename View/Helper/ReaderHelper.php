<?php
App::uses('StartupBlogAppHelper', 'StartupBlog.View/Helper');
App::uses('BlogPost', 'StartupBlog.BlogPost');

class ReaderHelper extends StartupBlogAppHelper {
	public function saysStatus($value) {
		return ($value) ? BlogPost::PUBLISHED : BlogPost::DRAFT;
	}
} 