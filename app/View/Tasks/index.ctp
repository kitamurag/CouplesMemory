<?php echo $this->Html->link('new task','/Tasks/create'); ?>
<?php echo $this->element('menu',array('current_page'=>'sample','hoge'=>10,'hoge_data'=>$tasks_data)); ?>
<?php echo $this->Html->link('link with text','posts/index',array('target'=>'_blank','class'=>'button')); ?>
<br>
<?php echo $this->Html->link(
	$this->Html->image('alexpic.jpg', array('alt' => 'altText')),
	array('controller' => 'controller', 'action' => 'action'),
	array('escape'=>false)
);?>

<h3><?php echo count($tasks_data) ?>件のタスクが未完了です。</h3>
<?php foreach($tasks_data as $row):?>
<?php echo $this->element('task',array('task'=>$row)); ?>
<?php endforeach; ?>
</table>