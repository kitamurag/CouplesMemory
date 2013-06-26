<?php 
class GuitarwarsController extends AppController{
	public $scaffold;

	public function index(){
		$this->set('guitarwars',$this->Guitarwar->find('all'));
	}

	public function view($id=null){
		if(!$id){
			throw new NotFoundException("id not found");
		}
		$guitarwar = $this->Guitarwar->findById($id);
		if(!$guitarwar){
			throw new NotFoundException("id not found");			
		}
		$this->set('guitarwar',$guitarwar);
	}

	public function add(){
		if($this->request->is('post')){
			$this->Guitarwar->create();
			if($this->Guitarwar->save($this->request->data)){
				$this->Session->setFlash('success');
				$this->redirect(array('action'=>'index'));			
			}else{
				$this->Session->setFlash('fail');				
			}
		}
	}

}