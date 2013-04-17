<div class="blogPosts view">
<h2><?php  echo __('Blog Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Summary'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['summary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('In Rss'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['in_rss']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Description'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['meta_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keywords'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['meta_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($blogPost['BlogPost']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blog Post'), array('action' => 'edit', $blogPost['BlogPost']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Blog Post'), array('action' => 'delete', $blogPost['BlogPost']['id']), null, __('Are you sure you want to delete # %s?', $blogPost['BlogPost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('action' => 'add')); ?> </li>
	</ul>
</div>
