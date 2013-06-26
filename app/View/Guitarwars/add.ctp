<h1>Add Score</h1>
<?php 
echo $this->Form->create('Guitarwar');
echo $this->Form->input('name');
echo $this->Form->input('score');
echo $this->Form->file('screenshot');
echo $this->Form->end('save');
?>