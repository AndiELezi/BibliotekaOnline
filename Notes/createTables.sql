x
CREATE TABLE users(
id int PRIMARY KEY AUTO_INCREMENT,
name varchar(30) not null,
surname varchar(30) not null,
username varchar(30) not null,
email varchar(40) not null,
mobile varchar(15),
password varchar(200) not null,
birthday date not null,
gender varchar(1) not null,
points int not null,
user_rights int not null,
profile_photo varchar(100),
activationStatus tinyint(1) not null,
securityString varchar(40) not null,
CONSTRAINT fk_user_rights FOREIGN KEY(user_rights) REFERENCES user_rights(id)
)


x
CREATE TABLE user_rights(
id int primary key AUTO_INCREMENT,  
description varchar(100) not null
)

x
CREATE TABLE author(
id int PRIMARY KEY AUTO_INCREMENT,
full_name varchar(30) not null,
birthplace varchar(30) not null,
birthday date not null,
contact varchar(50) not null
)

x
CREATE table book(
ISBN varchar(30) PRIMARY KEY,
title varchar(50) not null,
publication_year date not null,
publish_house int not null,
quantity int not null,
price int not null,
reservation_points int not null,
cover_photo varchar(100),
description varchar(200),
CONSTRAINT fk_publish_house FOREIGN KEY(publish_house) REFERENCES publish_house(id)
)

x
CREATE TABLE categories(
id int PRIMARY KEY AUTO_INCREMENT,
description varchar(50) not null
)

x
create table book_author(
book_id varchar(30) not null,
author_id int not null,
CONSTRAINT fk_book_id FOREIGN KEY (book_id) REFERENCES book(id),
CONSTRAINT fk_author_id FOREIGN KEY (author_id) REFERENCES author(id),
PRIMARY KEY (book_id,author_id)
)

x
create table book_categories(
book_id varchar(30) not null,
category_id int not null,
CONSTRAINT fk_book_ISBN FOREIGN KEY (book_id) REFERENCES book(ISBN),
CONSTRAINT fk_category_id FOREIGN KEY (category_id) REFERENCES categories(id),
PRIMARY KEY (book_id,category_id)
)