<<<<<<< HEAD
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
=======
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
>>>>>>> 28089a3 (Initial or updated commit)
