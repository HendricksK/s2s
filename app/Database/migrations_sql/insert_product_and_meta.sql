INSERT INTO product
(sku, date_created, date_updated, stock)
VALUES('231jrei6', current_timestamp(), '0000-00-00 00:00:00', 100);

INSERT INTO product
(sku, date_created, date_updated, stock)
VALUES('qwas7894', current_timestamp(), '0000-00-00 00:00:00', 12);

INSERT INTO product_meta
(`type`, value, product_id, product_sku)
VALUES('img', 'https://raw.githubusercontent.com/HendricksK/s2s-img/main/img/original/products/231jrei6/231jrei6_2.jpg', 1, '231jrei6');

INSERT INTO product_meta
(`type`, value, product_id, product_sku)
VALUES('img', 'https://raw.githubusercontent.com/HendricksK/s2s-img/main/img/original/products/231jrei6/231jrei6_1.jpg', 1, '231jrei6');

INSERT INTO product_meta
(`type`, value, product_id, product_sku)
VALUES('color', 'red', 1, '231jrei6');

INSERT INTO product_meta
(`type`, value, product_id, product_sku)
VALUES('img', 'https://raw.githubusercontent.com/HendricksK/s2s-img/main/img/original/products/231jrei6/231jrei6_2.jpg', 1, 'qwas7894');

INSERT INTO product_meta
(`type`, value, product_id, product_sku)
VALUES('img', 'https://raw.githubusercontent.com/HendricksK/s2s-img/main/img/original/products/231jrei6/231jrei6_1.jpg', 1, 'qwas7894');

INSERT INTO product_meta
(`type`, value, product_id, product_sku)
VALUES('color', 'blue', 2, 'qwas7894');