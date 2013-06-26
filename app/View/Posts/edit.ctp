<h1>Edit Post</h1>
<?php 
echo $this->Form->create('Post',array('type'=>'post'));
echo $this->Form->input('title',array('label'=>'title'));
echo $this->Form->input('body',array('rows'=>3));

$category=array('general','news','tec');
echo $this->Form->label('Post.category_id','category');
echo $this->Form->select('Post.category_id',$category);

echo $this->Form->input('id',array('type'=>'hidden'));
echo $this->Form->end('Edit Post');

