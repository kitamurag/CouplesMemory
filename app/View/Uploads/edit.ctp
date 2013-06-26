<h1>Edit Post</h1>
<?php 
echo $this->Form->create('Upload',array('type'=>'upload'));
echo $this->Form->input('body');
echo $this->Form->input('id',array('type'=>'hidden'));
echo $this->Form->end('Edit Post');

