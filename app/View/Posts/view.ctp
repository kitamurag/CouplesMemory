<h1>View Post</h1>
<p><?php echo $post['Post']['title']; ?></p>
<p><small><?php echo $post['Post']['created'] ?></small></p>
<p><?php echo $post['Post']['body']; ?></p>

<h2>Comments</h2>
<?php foreach ($post['Comment'] as $comment) :?>
	<p><?php echo h($comment['body']); ?>by <?php echo h($comment['commenter']); ?>	
       <?php echo $this->Form->postLink('delete', array('controller' => 'comments', 'action' => 'delete',$comment['id'],$post['Post']['id']),array('confirm'=>'Are you sure?'));?>
	</p>
<?php endforeach; ?>

<h2>Add Comment</h2>
<?php 
echo $this->Form->create('Comment',array('action'=>'add'));
echo $this->Form->input('commenter');
echo $this->Form->input('body',array('rows'=>3));
echo $this->Form->input('post_id',array('type'=>'hidden','value'=>$post['Post']['id']));
echo $this->Form->end('Add Comment');
?>