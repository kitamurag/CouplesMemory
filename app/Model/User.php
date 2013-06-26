<?php
App::uses('AppModel', 'Model');
App::uses('AuthCompoment', 'Controller/Component');

/**
 * User Model
 *
 */
class User extends AppModel {

	public function beforeSave(){
		if(isset($this->data[$this->alias]['password'])){
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A username is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A password is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'role' => array(
		// 	'numeric' => array(
		// 		'rule' => array('inList',array('admin','author')),
		// 		'message' => 'Please enter a valid role',
		// 		'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

// /**
//  * belongsTo associations
//  *
//  * @var array
//  */
// 	public $belongsTo = array(
// 		'Role' => array(
// 			'className' => 'Role',
// 			'foreignKey' => 'role_id',
// 			'conditions' => '',
// 			'fields' => '',
// 			'order' => ''
// 		)
// 	);
}
