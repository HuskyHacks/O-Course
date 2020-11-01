USE website;
CREATE TABLE users (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(80),
name VARCHAR(80),
password VARCHAR(80));

CREATE TABLE `userInfo`(
`user_id` varchar(6) NOT NULL,
`phone` varchar(7) NOT NULL,
`socialsecnumber` varchar(9) NOT NULL,
`description` varchar(40) NOT NULL;
 )