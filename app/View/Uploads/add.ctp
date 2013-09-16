<div id="uploads">
	<?= $this->Form->create('Upload',array('action'=>'add','type'=>'file')); ?>
	<?= $this->Form->file('files.',array('type'=>'file','multiple')); ?>
        <?= $this->Form->end(__('アップロード')); ?>

        <img id="prevPhoto">
</div><!-- uploads -->