DROP TABLE IF EXISTS mycarts;

CREATE TABLE mycarts (
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    num INT NOT NULL
);

INSERT INTO mycarts (user_id, item_id, num) VALUES (1, 1, 2);
INSERT INTO mycarts (user_id, item_id, num) VALUES (1, 2, 1);
