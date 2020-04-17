x
CREATE TABLE book_reservation(
user_id int not null,
book_id varchar(30) not null,
reservation_time timestamp not null,
returnTime date not null,
delay_fine int not null,
PRIMARY KEY (user_id, book_id),
CONSTRAINT fk_user_id_br FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_book_id_br FOREIGN KEY(book_id) REFERENCES book(ISBN)
)

x
create TABLE hall_booking(
library_hall int not null,
booking_date timestamp not null,
user_id int not null,
PRIMARY KEY (library_hall, user_id),
CONSTRAINT fk_library_hall FOREIGN KEY (library_hall) REFERENCES library_halls(id),
CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id)
)

x
CREATE TABLE library_halls(
id int PRIMARY KEY AUTO_INCREMENT,
capacity int not null,
open_seats int not null,
librarian_id int not null,
CONSTRAINT fk_librarian_id FOREIGN KEY(librarian_id) REFERENCES users(id)
)

x
CREATE TABLE publish_house (
id int PRIMARY KEY AUTO_INCREMENT,
name varchar(40) not null
)


x
CREATE TABLE 'seats' (
id int PRIMARY KEY not null,
library_hall_id int not null,
statusi BOOLEAN not null,
CONSTRAINT fk_library_hall_id FOREIGN KEY (library_hall_id) REFERENCES library_halls(id)

)

x
CREATE TABLE 'online_books'(
id int PRIMARY KEY AUTO_INCREMENT,
user_id int not null,
category_id int not null,
title varchar(40) not null,
publish_date date not null,
likes int not null,
cover_photo varchar(100),
description varchar(200),
CONSTRAINT fk_user_on_id FOREIGN KEY (user_id) REFERENCES users(id),
CONSTRAINT fk_category_online_id FOREIGN KEY (category_id) REFERENCES (categories)(id)

)

x
CREATE TABLE 'review'(
id_review int PRIMARY KEY AUTO_INCREMENT,
user_id int not null,
id_book int not null,
time_review date not null,
description varchar (100) not null,
liked BOOLEAN not null,
CONSTRAINT fk_user_review_id  FOREIGN KEY (user_id) REFERENCES users(id),
CONSTRAINT fk_book_review_id  FOREIGN KEY (id_book) REFERENCES online_books(id)
)