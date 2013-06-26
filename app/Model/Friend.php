<?php 
class Friend extends AppModel{
	public $virtualFields = array(
		'full_name' => 'concat(Friend.first_name," ",Friend.last_name)'
	);

	public $validate = array(
		'first_name' => array(
			'rule1'=>array(
				'rule'      => 'existOnly4',
				'required'  => true,
				'allowEmpty'=> false,
				'message'   => '5peoples'
				),
			'rule2'=>array(
				'rule'      => array('between',2,32),
				'message'   => '名前は2文字以上32文字以内で入力してください'
			)
		)

	);

	public function existOnly4($check){
		var_dump($check['first_name']); 
		$existing_count = $this->find('count',array(
				'conditions' => array('Friend.first_name' => $check['first_name'])
		));
		return $existing_count < 5;
	}
} 