use tnsdb;


create table products(
id int (11) unsigned NOT NULL AUTO_INCREMENT,
brand varchar(200) NOT NULL,
name varchar(80) NOT NULL,
color varchar (50) NOT NULL,
price float(6,2),
default_image varchar(200),
details varchar(200),
slug varchar(80) UNIQUE DEFAULT "",
gender varchar(25),
category varchar(50),
PRIMARY KEY(id)
);

create table product_images(
product_id int (11) unsigned NOT NULL,
image_id int (11) unsigned NOT NULL
);

create table images(
id int(11) unsigned NOT NULL,
url varchar(200),
PRIMARY KEY(id)
);

create table customers(
id int(11) unsigned NOT NULL,
first_name varchar(100),
last_name varchar(100),
address varchar(100),
city varchar(100),
state varchar(100),
zip  varchar(10)
);

create table customers_orders(
customer_id int (11) unsigned NOT NULL,
order_id int(11) unsigned NOT NULL,
total float,
shipping float
);

create table orders(
id int(11) unsigned,
product_id int(11) unsigned ,
qty int (11) unsigned
);

