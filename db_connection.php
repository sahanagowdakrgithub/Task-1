<?php
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "user_authentication";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
