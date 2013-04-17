<div class="blogSettings index">
	<h2><?php echo __('Blog Settings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('setting'); ?></th>
			<th><?php echo $this->Paginator->sort('setting_text'); ?></th>
			<th><?php echo $this->Paginator->sort('tip'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($blogSettings as $blogSetting): ?>
	<tr>
		<td><?php echo h($blogSetting['BlogSetting']['id']); ?>&nbsp;</td>
		<td><?php echo h($blogSetting['BlogSetting']['setting']); ?>&nbsp;</td>
		<td><?php echo h($blogSetting['BlogSetting']['setting_text']); ?>&nbsp;</td>
		<td><?php echo h($blogSetting['BlogSetting']['tip']); ?>&nbsp;</td>
		<td><?php echo h($blogSetting['BlogSetting']['value']); ?>&nbsp;</td>
		<td><?php echo h($blogSetting['BlogSetting']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $blogSetting['BlogSetting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $blogSetting['BlogSetting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $blogSetting['BlogSetting']['id']), null, __('Are you sure you want to delete # %s?', $blogSetting['BlogSetting']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Blog Setting'), array('action' => 'add')); ?></li>
	</ul>
</div>
