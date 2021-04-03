CREATE DATABASE IF NOT EXISTS name_change;
USE name_change;

CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id,email)
);

INSERT INTO users (email, password) VALUES
    ('a@a.com', '$2y$10$fjcLRJva9k.vCOl5CbBH6.SHh.xTqXoAE/grOZvNQpBRWQaIgyewW');
