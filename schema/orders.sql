DROP TABLE IF EXISTS orders;

CREATE TABLE orders (
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    num INT NOT NULL,
    buy_at DATETIME NOT NULL
);

INSERT INTO orders (user_id, item_id, num, buy_at) VALUES (1, 1, 2, "2019-05-05 11:25:07");
INSERT INTO orders (user_id, item_id, num, buy_at) VALUES (1, 3, 1, "2019-05-05 11:25:07");
INSERT INTO orders (user_id, item_id, num, buy_at) VALUES (1, 3, 2, "2019-05-09 13:55:09");
