<h2>Add Post</h2>
<p><?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add'));?></p>
<h2>List Posts</h2>
<table>
	<tr>
		<th>id</th>
		<th>title</th>
		<th>action</th>
		<th>created</th>
	</tr>
	<?php foreach ($posts as $post):?>
		<tr>
			<td><?php echo $post['Post']['id']; ?></td>
			<td><?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view',$post['Post']['id']));?></td>
			<td><?php echo $this->Html->link('edit', array('controller' => 'posts', 'action' => 'edit',$post['Post']['id']));?>
				<?php echo $this->Form->postLink('delete', array('controller' => 'posts', 'action' => 'delete',$post['Post']['id']),array('confirm'=>'Are you sure?'));?>
			</td>
			<td><?php echo $post['Post']['created']; ?>	</td>	
		</tr>
	 <?php endforeach; ?>
	 <?php unset($post); ?>
</table>