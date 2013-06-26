<?php 
// create table aliens_abductions(
// 	id int(11) not null auto_increment,
// 	last_name varchar(30),
// 	first_name varchar(30),
// 	when_it_happend date,
// 	how_long varchar(30),
// 	how_many varchar(30),
// 	alien_description varchar(100),
// 	what_they_did varchar(100),
// 	fang_spotted varchar(10),
// 	other varchar(100),
// 	email varchar(50),
// 	created datetime default null,
// 	modified datetime default null
// );
class AliensAbduction extends AppModel{
	public $validate = array(
		'last_name' =>array(
			'rule'       => array('between',0,10),
			'allowEmpty' => false,
			'message'    => 'between 0 and 64',
		)
	);
}