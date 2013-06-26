 <style>
	h1{
		font-size: 24px;
	}
	#container{
		margin: 0 auto;
	}
	#content{
		background: rgb(251,249,250);
	}
	#CommentAddForm{
		padding-top: 0;
	}
	#username{
		background: orange;
		float: right;
	}
	#username:before{
		content:'username:';
	}
	.grid_2{
		border:1px solid grey;		
		width:240px;
		height: 350px;
		float: left;
		margin-top: 5px;
		margin-left: 20px;
	}
	textarea{
		margin: 0;
		padding: 0;
		font-size: 120%;
		/*height: 30px;*/
		width: 100px;
		float: left;
	}
	.submit{
		float: right;
	}
	.textarea{
		margin: 0;
		/*padding: 0;*/
	}
	.photo{
		padding: 5px;
	}
	.photo img{
		border:1px solid grey;		
	}
	.comment{
		height: 150px;
		overflow-y: scroll;
	}
	.comment p{
		margin: 3px;
	}
	form div.submit{
		margin-top: 0;
	}
	.comment{
		margin: 3px;
		/*background: #789;*/
	}
	span.comment:before{
		content:'「';
	}
	span.comment:after{
		content:'」 by ';
	}
	nav{
		background: green;
	}
	nav ul{
		margin-left: 0;
		padding: 5px;
	}
	nav li{
		margin-left: 0;
		margin-right: 5px;
		border:1px solid white;
		text-decoration: none;
		display: inline;
	}
	li a{
		color:white;
		text-decoration: none;
	}
</style>

<div class="uploads">
	<header>
		<h1>しーちゃんかっぷる(0V0)うぴょ</h1>
		<nav>
			<ul>
				<li><?php echo $this->Html->link(__('写真一覧を表示する'),array('action'=>'index')); ?></li>
				<li><?php echo $this->Html->link(__('写真を追加する'),array('action'=>'add')); ?></li>
				<li><?php echo $this->Html->link(__('写真を削除する'),array('action'=>'delete')); ?></li>
				<div id="username">
					<li ><?php echo $username; ?></li>
					<li><?php echo $this->Html->link('logout', array('controller' => 'users', 'action' => 'logout'));?></li>
				</div>
			</ul>
		</nav>
	</header>
	<h2><?php echo '思い出の数々'; ?></h2>
	<?php foreach ($uploads as $upload): ?>
		<div class="grid_2">
			<section>
				<div class="photo">
				<?php echo $this->Html->image($upload['Upload']['file_name'], array('alt'=>'altText','width'=>'230px'));?>
				</div>
				<div class="comment">
					<?php foreach ($upload['Comment'] as $comment): ?>
						<p>
							<span class="comment"><?php echo $comment['body'] ?></span><?php echo $comment['commenter'];?>
						</p>
					<?php endforeach; ?>
					<?php 
						echo $this->Form->create('Comment',array('action'=>'add'));
						echo $this->Form->input('body',array('rows'=>1,'label'=>'','placeholder'=>'コメント',));
						echo $this->Form->input('upload_id',array('type'=>'hidden','value'=>$upload['Upload']['id']));
						echo $this->Form->input('commenter',array('type'=>'hidden','value'=>$username));
						echo $this->Form->end('投稿');
						// echo $this->Form->end('コメントを投稿する');
					?>
				</div><!-- comment -->
			</section>
		</div>
	<?php endforeach; ?>
</div><!-- uploads -->