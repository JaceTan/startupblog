<div class="blogPosts form">
<?php 
	echo $this->Form->create('BlogPost'); 
	$this->TinyMCE->editor(array('theme' => 'advanced', 'mode' => 'textareas'));
?>
	<fieldset>
		<legend><?php echo __('Admin Edit Blog Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('body');
		echo $this->Form->input('published');
		echo $this->Form->input('in_rss');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_description');
		echo $this->Form->input('meta_keywords');
		echo $this->Form->input('BlogPostCategory.BlogPostCategory',array(
			'label' => __('Category',true),
			'type' => 'select',
			'multiple' => 'checkbox',
			'options' => $blogPostCategories,
			'selected' => $this->Html->value('BlogPostCategory.id'),
		)); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BlogPost.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BlogPost.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('action' => 'index')); ?></li>
	</ul>
</div>
