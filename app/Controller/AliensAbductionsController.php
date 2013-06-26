<?php 
class AliensAbductionsController extends AppController{
	public $scaffold;

	public function add(){
		if($this->request->is('post')){
			$this->AliensAbduction->create();
			if($this->AliensAbduction->save($this->request->data)){
				$this->Session->setFlash('Your post has been saved.');
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash('Unable to add your post.');
			}
		}		
	}
}