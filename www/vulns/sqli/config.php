<?php
session_start();


$host = "mysql"; /* Host name */
$user = getenv("MYSQL_USER"); /* User */
$password = getenv("MYSQL_PASSWORD"); /* Password */
$dbname = getenv("MYSQL_DATABASE"); /* Database name */

// Connect to local MySql Database
$link = mysqli_connect($host, $user, $password, $dbname);

// Check the connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
