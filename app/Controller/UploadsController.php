<?php
class UploadsController extends AppController{
	public function index(){
		// $this->Upload->recursive = 0;
		// $this->set('uploads',$this->paginate());
		$this->set('uploads',$this->Upload->find('all',array(
'order' => array('created' => 'desc')
			)));
		$this->set('username',$this->Auth->user('username'));
	}

	public function add(){
		$successFlg = false;
		if($this->request->is('post')){
			$files = $this->request->data['Upload']['files'];
			foreach ($files as $file) {
				$from = $file['tmp_name'];
				if(is_uploaded_file($from)){
					$to = WWW_ROOT . 'img' . DS . basename($file['name']);
					if(move_uploaded_file($from, $to)){
						$this->Upload->create();
						$data = array('Upload'=>array('file_name'=>$file['name']));
						if($this->Upload->save($data)){
							$this->Session->setFlash(__('The upload has been saved.'));
							$successFlg = true;
						}else{
							$this->Session->setFlash(__('The upload could not be saved.Please try again.'));
							$this->redirect(array('action'=>'add'));
						}
					}
				}
			}
		}
		if($successFlg){
			$this->redirect(array('action'=>'index'));
		}

	}

	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->Upload->delete($id)){
			$this->Session->setFlash('The photo has been deleted.');
			$this->redirect(array('action' => 'index'));
		}
	}

}
