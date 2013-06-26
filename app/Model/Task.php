<!-- create table tasks(
	id int(11) NOT NULL AUTO_INCREMENT,
	name tinytext COLLATE utf8_unicode_ci NOT NULL,
	body text COLLATE utf8_unicode_ci NOT NULL,
	created datetime NOT NULL,
	modified datetime NOT NULL,
	PRIMARY key(id)
	)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; -->
<?php
class Task extends AppModel{

	public $hasMany = array('Note');

	public $validate = array(
		'name' => array(
			'rule' => array('maxLength',40),
			'required'   => true,
			'allowEmpty' => false,
			'message'    => 'タスク名を入力してください',
		),
		'body'=>array(
			'rule'       => array('maxLength',255),
			'required'   => true,
			'allowEmpty' => false,
			'message'    => '詳細を入力してください'
		),
	);

} 