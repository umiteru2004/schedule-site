drop database if exists exams_site;
create database exams_site default character set utf8 collate utf8_general_ci;
drop user if exists 'staff'@'localhost';
create user 'staff'@'localhost' identified by 'password';
grant all on exams_site.* to 'staff'@'localhost';
use exams_site;

create table exam (
	id int auto_increment primary key,
	subject varchar(200) not null,
	type varchar(200) not null,
	image longblob not null
);

create table customer (
	id int auto_increment primary key,
	name varchar(100) not null,
	login varchar(100) not null unique,
	password varchar(100) not null
);

insert into customer values(null, 'うみてる', 'umiteru2004', 'password');
