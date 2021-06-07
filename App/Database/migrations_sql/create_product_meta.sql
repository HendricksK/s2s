create table product_meta (
	id int NOT NULL AUTO_INCREMENT,
    type varchar(25),
    value text,
    product_id int,
    product_sku varchar(100),
    FOREIGN KEY (product_id) REFERENCES product(id),
    PRIMARY KEY (id)
);
