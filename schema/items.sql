DROP TABLE IF EXISTS items;

CREATE TABLE items (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    price INT NOT NULL,
    image VARCHAR(32),
    description VARCHAR(256),
    view INT DEFAULT 0
);

INSERT INTO items (name, price, image, description) VALUES ("魚", 100, "1.jpg", "食べごろです！");
INSERT INTO items (name, price, image, description) VALUES ("牡蠣", 500, "2.jpg", "ミルキー！！");
INSERT INTO items (name, price, description) VALUES ("昆布", 70, "ええ香りがします！");
INSERT INTO items (name, price, image, description) VALUES ("米", 200, "4.jpg", "日本人ならやっぱりこれ！");
