<?php
$servername = "localhost";
$username = "root";      // XAMPP এ ডিফল্ট ইউজার নেম
$password = "";          // XAMPP এ ডিফল্ট পাসওয়ার্ড ফাঁকা
$dbname = "madrasah_db"; // আপনার ডাটাবেজের নাম (নিজে তৈরি করবেন)

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
