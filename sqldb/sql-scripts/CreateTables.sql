USE webDB;
CREATE TABLE users (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(80),
name VARCHAR(80),
password VARCHAR(80));