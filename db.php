<?php
$servername = "localhost";
$username = "madrasah_user";       // বা আপনার prefix সহ cPanel username
$password = "Radiya@2022";
$dbname = "madrasah_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
