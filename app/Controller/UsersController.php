<?php 
class UsersController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

	public function add(){
		if($this->request->is('post')){
			$this->User->create();
			if($this->User->save($this->request->data)){
				$this->Session->setFlash('Username has been saved.');
				$this->redirect(array('controller'=>'uploads','action'=>'index'));
			}else{
				$this->Session->setFlash('Unable to add your username.');				
			}
		}

	}

	public function login(){
		if($this->request->is('post')){
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirect());
			}else{
				$this->Session->setFlash('username or password is incorrect');
			}
		}
	}

	public function logout(){
		$this->Auth->logout();
		return $this->redirect('/');
	}
}