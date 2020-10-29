USE website;
CREATE TABLE users (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(80),
name VARCHAR(80),
password VARCHAR(80));

CREATE TABLE `userInfo`(
`user_id` int(6) NOT NULL,
`phone` int(10) NOT NULL,
`socialsecnumber` int(9) NOT NULL
 )