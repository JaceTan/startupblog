<div class="blogSettings form">
<?php echo $this->Form->create('BlogSetting'); ?>
	<fieldset>
		<legend><?php echo __('Add Blog Setting'); ?></legend>
	<?php
		echo $this->Form->input('setting');
		echo $this->Form->input('setting_text');
		echo $this->Form->input('tip');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Blog Settings'), array('action' => 'index')); ?></li>
	</ul>
</div>
