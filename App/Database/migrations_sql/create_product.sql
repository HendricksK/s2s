create table product (
	id int NOT NULL AUTO_INCREMENT,
	sku varchar(100),
	date_created timestamp DEFAULT now(),
	date_updated timestamp,
	stock int DEFAULT 0,
	PRIMARY KEY (id)
);