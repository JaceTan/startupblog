<div class="blogPosts form">
<?php echo $this->Form->create('BlogPost'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Blog Post'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('summary');
		echo $this->Form->input('body');
		echo $this->Form->input('published');
		echo $this->Form->input('in_rss');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_description');
		echo $this->Form->input('meta_keywords');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Blog Posts'), array('action' => 'index')); ?></li>
	</ul>
</div>
