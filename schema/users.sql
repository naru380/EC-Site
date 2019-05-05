DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    address VARCHAR(256),
    mail_address VARCHAR(128) NOT NULL,
    password VARCHAR(64) NOT NULL,
    is_valid BOOLEAN NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (name, address, mail_address, password, is_valid) VALUES ("love", "日本", "love@gmail.com", "peace", true);
INSERT INTO users (name, mail_address, password, is_valid) VALUES ("peace", "peace@gmail.com", "love", true);
