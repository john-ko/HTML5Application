use tnsdb;


create table products(
  id int (11) unsigned NOT NULL AUTO_INCREMENT,
  brand varchar(200) NOT NULL,
  name varchar(80) NOT NULL,
  color varchar (50) NOT NULL,
  price float(6,2),
  default_image varchar(200),
  details varchar(200),
  slug varchar(80) UNIQUE NOT NULL,
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
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  first_name varchar(100),
  last_name varchar(100),
  address varchar(100),
  city varchar(100),
  state varchar(100),
  zip  varchar(10),
  PRIMARY KEY(id)
);

create table product_orders(
  product_id int (11) unsigned NOT NULL,
  order_id int(11) unsigned NOT NULL,
  qty int (11) unsigned
);

create table orders(
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  customer_id int(11) unsigned,
  total float,
  subtotal float,
  tax float,
  shipping float,
  PRIMARY KEY(id)
);

create table zip_codes(
	zip varchar(5) NOT NULL,
	state varchar(2),
	city varchar(25),
	PRIMARY KEY(zip)
);

create table tax_rates(
	state varchar(2),
	zipcode varchar(5) NOT NULL,
	tax_region varchar(45),
	tax_rate decimal(10,6),
	PRIMARY KEY(zipcode)
);