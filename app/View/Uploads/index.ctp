<div id="photo" class="clearfix">
	<div class="grid_12">
		<p class="username">
			<?=$username;?>
			<?= $this->Html->link(
			    'ログアウト',
			    array('controller' => 'users', 'action' => 'logout')
			); ?>
		</p>
	</div>
	<?php foreach ($uploads as $photo):?>
		<?php $uploadId = $photo['Upload']['id']; ?>
		<?php $img = $photo['Upload']['file_name']; ?>
		<?php $created = $photo['Upload']['created']; ?>
		<?php $comments = $photo['Comment'];?>

		<div class="grid_3">
			<div class="post">
				<?= $this->Html->image($img); ?>
				<p class="created"><?= substr($created, 0,10)  ; ?></p>
				<span class="close">
					<?php echo $this->Form->postLink(
		                '×',
		                array('action' => 'delete', $uploadId),
		                array('confirm' => 'この写真を削除してもいいですか？'));
	           		 ?>
           		 </span>
				<div class="commentForm">

					<?= $this->Form->create('Comment',array('action'=>'add')); ?>
					<input type="text" name="data[Comment][body]" value="" placeholder="コメント" id="CommentBody">
					<?= $this->Form->input('upload_id', array('type' => 'hidden','value'=>$uploadId)); ?>
					<?= $this->Form->input('commenter', array('type' => 'hidden','value'=>$username)); ?>
					<?= $this->Form->end(); ?>

				</div><!-- commentForm -->
				<div class="commentView">
				<?php foreach($comments as $comment): ?>
					<!-- <?php print_r($comment); ?> -->
					<p>
						<?= $comment['body']; ?>
						<?= $comment['commenter']; ?>
					</p>
				<?php endforeach; ?>
				</div><!-- commentView -->
			</div><!-- /post -->
		</div><!-- grid3 -->

	<?php endforeach; ?>
</div><!-- /photo -->





<div id="uploads">
	<div id="uploadsForm">
		<h1>写真をアップロード</h1>
		<?= $this->Form->create('Upload',array('action'=>'add','type'=>'file')); ?>
		<?= $this->Form->file('files.',array('type'=>'file','multiple')); ?>
	    <?= $this->Form->end(__('アップロード')); ?>
	</div>
	<div id="prevPhoto"></div>
</div><!-- uploads -->