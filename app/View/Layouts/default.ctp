<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset(); ?>
	<title>
		<?= $title_for_layout; ?>
	</title>
	<?= $this->fetch('meta');?>
	<? // $this->fetch('css');?>
	<?=	$this->Html->css('reset');?>
	<?=	$this->Html->css('text');?>
	<?=	$this->Html->css('960_12_col');?>
	<?=	$this->Html->css('style');?>
	<?	// echo $this->Html->meta('icon');?>
</head>
<body>

	<div id="container" class="container_12">

		<div id="header" >
			<div class="grid_7">
				<h1><?= $this->Html->link('Couples Memory', '/'); ?></h1>
			</div><!-- grid_7 -->
			<div class="grid_5">
				<nav>
					<ul class="action" >
						<li>
							<button id="buttonUpload">写真をアップロード</button>
						</li>
					</ul>
				</nav>
			</div><!-- gird_5 -->
		</div><!-- header -->

		<div id="content" class="clearfix">
			<?= $this->Session->flash(); ?>
			<?= $this->fetch('content'); ?>
		</div><!-- content -->

		<footer>

		</footer>

	</div><!-- container -->

	<!-- 	<?= $this->element('sql_dump'); ?> -->
	<!-- script -->
	<?= $this->Html->script('jquery'); ?>
	<?= $this->Html->script('jquery.idTabs.min'); ?>
	<?= $this->Html->script('canvasResize/binaryajax');?>
	<?= $this->Html->script('canvasResize/exif');?>
	<?= $this->Html->script('canvasResize/canvasResize');?>
	<script>
		$(function(){

			//flashMessage
			setTimeout(function(){
				$('#flashMessage').fadeOut('slow');
			},800);

            $('input[type=file]').change(function(e){
            	$('#prevPhoto').empty();
            	var photos = e.target.files;
            	$.each(photos,function(){
					canvasResize(this,{
	                    width:200,
	                    height:200,
	                    crop:false,
	                    quality:80,
	                    callback:function(data,width,height){
	                    	var img = new Image();
	                    	img.onload = function(){
	                    		$(this)
		                    		.css({
		                    			'margin':'10px',
		                    			'width' :width,
		                    			'height':height,
		                    			'display':'none'
		                    		})
		                    		.appendTo('#prevPhoto')
		                    		.fadeIn(600);
	                    	};
	                    	$(img).attr('src',data);
	                 	}
	                });
				})
            });

			$('input[type=text]').change(function(){
				$('form').trigger('submit');
			});

			var post ={

				container:$('.post'),

				init:function(){
					// this.createCloseButton();
					this.toggleCloseButton();
				},

				// createCloseButton:function(){
				// 	var $this = this;

				// 	$('<span>',{
				// 		'text':'×',
				// 		'class':'close',
				// 	})
				// 		.css({'display':'none'})
				// 		.prependTo(this.container);
				// },

				toggleCloseButton:function(){
					this.container.hover(function(){
						$(this).find('span.close:first')
							.fadeToggle(600);

					},function(){
						$(this).find('span.close:first')
							.fadeToggle(600);
					});
				}

			};
			post.init();

			var uploadForm = {
				container:$('#uploads'),

				init:function(){
					$('#buttonUpload').click(function(){
						uploadForm.container.slideDown(600);
						uploadForm.createCloseButton();
					})
				},

				createCloseButton:function(){
					var $this = this;
					$('<span>',{
						text:'×',
						class:'close'
					})
						.prependTo(this.container)
						.click(function(){
							$this.container.slideUp(600);
							$('#prevPhoto').empty();
						});
				}

			};
			uploadForm.init();

		});
	</script>
</body>
</html>
