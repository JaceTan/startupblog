<div class="blogSettings view">
<h2><?php  echo __('Blog Setting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($blogSetting['BlogSetting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Setting'); ?></dt>
		<dd>
			<?php echo h($blogSetting['BlogSetting']['setting']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Setting Text'); ?></dt>
		<dd>
			<?php echo h($blogSetting['BlogSetting']['setting_text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tip'); ?></dt>
		<dd>
			<?php echo h($blogSetting['BlogSetting']['tip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($blogSetting['BlogSetting']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($blogSetting['BlogSetting']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blog Setting'), array('action' => 'edit', $blogSetting['BlogSetting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Blog Setting'), array('action' => 'delete', $blogSetting['BlogSetting']['id']), null, __('Are you sure you want to delete # %s?', $blogSetting['BlogSetting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Blog Settings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog Setting'), array('action' => 'add')); ?> </li>
	</ul>
</div>
