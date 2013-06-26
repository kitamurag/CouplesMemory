CREATE TABLE roles(
 id int(4) NOT NULL AUTO_INCREMENT,
 name varchar(255) NOT NULL,
 created datetime DEFAULT NULL,
 modified datetime DEFAULT NULL,
 PRIMARY KEY(id)
);

CREATE TABLE users(
 id int(4) unsigned NOT NULL AUTO_INCREMENT,
 username varchar(255) NOT NULL,
 password varchar(255) NOT NULL, 
 role_id int(4) not null,
 created datetime DEFAULT NULL,
 modified datetime DEFAULT NULL,
 PRIMARY KEY(id)
);

