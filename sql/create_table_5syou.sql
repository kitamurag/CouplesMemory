cakephp 5章SQL

create table bbs_thread(
tid int not null auto_increment,
subject tinytext not null,
body text not null,
primary key(tid)
)engine = myisam;

create table friends(
id int(11) not null auto_increment,
first_name tinytext collate utf8_unicode_ci not null,
last_name tinytext collate utf8_unicode_ci not null,
primary key(id)
)engine = myisam;

create table topics(
	id int(11) not null auto_increment,
	title tinytext collate utf8_unicode_ci not null,
	body tinytext collate utf8_unicode_ci not null,
	category_id int(11) not null,
	created datetime default null,
	modified datetime default null,
	primary key(id)
)engine = myisam;

create table categories(
	id int(11) not null auto_increment,
	name varchar(255),
	created datetime default null,
	modified datetime default null,
	primary key(id)
)engine = myisam;

drop table posts;
create table posts(
	id int not null auto_increment primary key,
	title varchar(50),
	body text,
	created datetime default null,
	modified datetime default null
);

insert into posts(title,body,created,modified) values
('title1','body1',now(),now()),
('title2','body2',now(),now()),
('title3','body3',now(),now());

create table tasks(
	id int(11) NOT NULL AUTO_INCREMENT,
	name tinytext COLLATE utf8_unicode_ci NOT NULL,
	body text COLLATE utf8_unicode_ci NOT NULL,
	created datetime NOT NULL,
	modified datetime NOT NULL,
	PRIMARY key(id)
	)ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE tasks 
ADD status INT NOT NULL DEFAULT 0 AFTER BODY,
ADD due_date DATE  NULL DEFAULT NULL AFTER status;


create table comments(
	id int not null auto_increment primary key,
	commenter varchar(255),
	body text,
	post_id int not null,
	created datetime default null,
	modified datetime default null
);

insert into comments(commenter,body,post_id,created,modified) values
('c 1','b 1',7,now(),now()),
('c 2','b 2',7,now(),now()),
('c 3','b 3',7,now(),now());

create table `notes`(
`id` INT NOT NULL AUTO_INCREMENT,
`task_id` INT NOT NULL,
`body` TINYTEXT NOT NULL,
`created` DATETIME NOT NULL,
`modified` DATETIME NOT NULL,
PRIMARY KEY(`id`)
)ENGINE = MyISAM;

create table `guitarwars`(
`id` INT NOT NULL AUTO_INCREMENT,
`name` varchar(255),
`score` INT,
`screenshot` varchar(64),
`created` DATETIME NOT NULL,
`modified` DATETIME NOT NULL,
PRIMARY KEY(`id`)
)ENGINE = MyISAM;

create table photos(
	id int not null auto_increment primary key,
	title varchar(50),
	body text,
	created datetime default null,
	modified datetime default null
);

-- test file uploads 
create table uploads(
	id int unsigned auto_increment primary key,
	file_name varchar(50),
	created datetime default null,
	modified datetime default null
);