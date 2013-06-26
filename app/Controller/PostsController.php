<?php 
class PostsController extends AppController{
	public $helpers = array('Html','Form');

	public function index(){
		$this->set('posts',$this->Post->find('all'));
	}	

	public function view($id=null){
		if (!$id) {
			throw new NotFoundException("id not found");			
		}
		$post = $this->Post->findById($id);
		if(!$post){
			throw new NotFoundException("post not found");						
		}
		$this->set('post',$post);
	}

	public function add(){
		if($this->request->is('post')){
			$this->Post->create();
			var_dump($this->request->data);
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash('Your post has been saved.');
				// $this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash('Unable to add your post.');
			}
		}
	}

	public function edit($id = null){
		if(!$id){
			throw new NotFoundException('id not found');
		}
		$post = $this->Post->findById($id);
		if(!$post){
			throw new NotFoundException('post not found');
		}
		if($this->request->is('post') || $this->request->is('put')){
			$this->Post->id = $id;
			var_dump($this->Post);
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash('Your post has been updated.');
				// $this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash('Unable to update your post.');
			}
		}
		debug($this->request->data);
		if(!$this->request->data){
			$this->request->data = $post;
			debug($this->request->data);
		}
	}

	public function delete($id = null){
		if($this->request->is('get')){
	  		throw new MethodNotAllowedException();
		}
		if($this->Post->delete($id)){
			$this->Session->setFlash('Your post has been deleted.');
			$this->redirect(array('action'=>'index'));
		}

	}

}