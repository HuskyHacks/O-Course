USE webDB;
CREATE TABLE users (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(80),
name VARCHAR(80),
password VARCHAR(80));

CREATE TABLE `userID`(
`user_id` int(6) NOT NULL,
`male` int(6) NOT NULL,
`female` int(6) NOT NULL
 )