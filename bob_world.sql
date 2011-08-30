drop database bob_world;
create database bob_world;
use bob_world;

create table post_categories
(
	id int not null auto_increment primary key,
	name varchar(50) not null
);

create table posts
(
	id int not null auto_increment primary key,
	cat_id int not null,
	title varchar(50) not null,
	contents text not null,
	date_posted datetime not null,
	foreign key ( cat_id ) references post_categories(id)
);

