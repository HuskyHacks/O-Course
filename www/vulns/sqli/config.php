<?php
$servername = "webDB";
$username = "root";
$password = "rootpassword";
$dbname = "webdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
