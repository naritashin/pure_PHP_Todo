create database php_lesson;

create table todos (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
todo varchar(30),
created_at timestamp not null default current_timestamp,
updated_at timestamp not null default current_timestamp on update current_timestamp,
deleted_at datetime NULL DEFAULT NULL,
PRIMARY KEY(id)
);

create table users (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
name varchar(30),
password varchar(100),
created_at timestamp not null default current_timestamp,
updated_at timestamp not null default current_timestamp on update current_timestamp,
PRIMARY KEY(id)
);