<?php echo $this->Form->create('Task',array('type'=>'post')); ?>
<?php 
echo $this->Form->input('Task.name',array('label'=>'title'));
echo $this->Form->input('Task.body',array('label'=>'detail'));
 ?>	
<?php echo $this->Form->end('save'); ?>