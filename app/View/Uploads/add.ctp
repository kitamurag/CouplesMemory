<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>	
	<ul>
		<li><?php echo $this->Html->link(__('New Upload'),array('action'=>'add')); ?></li>
	</ul>
</div><!-- actions -->
<div class="uploads form">
	<?php echo $this->Form->create('Upload',array('action'=>'add','type'=>'file')); ?>	
	<?php echo $this->Form->file('files.',array('type'=>'file','multiple')); ?>
	<?php echo $this->Form->end(__('Upload')); ?>
</div><!-- form -->
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>	
	<ul>
		<li><?php echo $this->Html->link(__('List Uploads'),array('action'=>'index')); ?></li>
	</ul>
</div><!-- actions -->